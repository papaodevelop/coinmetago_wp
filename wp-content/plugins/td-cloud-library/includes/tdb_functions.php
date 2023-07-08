<?php

/**
 * globals to hold the state for all pages
 */
global $tdb_state_single_page, $tdb_state_single, $tdb_state_category, $tdb_state_author, $tdb_state_search, $tdb_state_date, $tdb_state_tag, $tdb_state_attachment;

// load the config
require_once "tdb_util.php";
require_once "tdb_config.php";
add_action('tdc_loaded', array('tdb_config', 'on_tdc_loaded'), 10); // the theme runs on 9 priority... so we can change stuff if we want


require_once "tdb_state_base.php";
require_once "tdb_state_template.php";
require_once "tdb_state_content.php";
require_once "tdb_state.php"; // state for the cloud template plugin, used on single post templates > autoload(inf) posts feature.
require_once "tdb_global_wp_query.php";


require_once "tdb_module.php";
require_once "tdb_ajax.php";
require_once "tdb_cpt.php"; // load the cpt things
require_once "tdb_menu.php"; // load the td menu shortcode support
require_once "tdb_term_meta.php"; // load taxonomies tdb term meta support

// The mobile detection library used.
if ( ! class_exists('Mobile_Detect', false)) {
	require_once 'Mobile_Detect.php';
}

// make the page state
require_once  TDB_TEMPLATE_BUILDER_DIR . "/state/page/tdb_state_single_page.php";
$tdb_state_single_page = new tdb_state_single_page();

// make the single post state
require_once  TDB_TEMPLATE_BUILDER_DIR . "/state/single/tdb_state_single.php";
$tdb_state_single = new tdb_state_single(); // the state already comes with default data

// the category state
require_once  TDB_TEMPLATE_BUILDER_DIR . "/state/category/tdb_state_category.php";
$tdb_state_category = new tdb_state_category(); // the state already comes with default data

// the author state
require_once  TDB_TEMPLATE_BUILDER_DIR . "/state/author/tdb_state_author.php";
$tdb_state_author = new tdb_state_author(); // the state already comes with default data

// the search state
require_once  TDB_TEMPLATE_BUILDER_DIR . "/state/search/tdb_state_search.php";
$tdb_state_search = new tdb_state_search(); // the state already comes with default data

// the date state
require_once  TDB_TEMPLATE_BUILDER_DIR . "/state/date/tdb_state_date.php";
$tdb_state_date = new tdb_state_date(); // the state already comes with default data

// the tag state
require_once  TDB_TEMPLATE_BUILDER_DIR . "/state/tag/tdb_state_tag.php";
$tdb_state_tag = new tdb_state_tag(); // the state already comes with default data

// the attachment state
require_once  TDB_TEMPLATE_BUILDER_DIR . "/state/attachment/tdb_state_attachment.php";
$tdb_state_attachment = new tdb_state_attachment(); // the state already comes with default data

// theme panel vue endpoint
require_once  TDB_TEMPLATE_BUILDER_DIR . "/includes/panel/tdb_panel_vue.php";

/**
 * Load the single state for now
 * - template_include runs after template_redirect!
 */
require_once  TDB_TEMPLATE_BUILDER_DIR . "/state/tdb_state_loader.php";
add_action('template_redirect', array('tdb_state_loader', 'on_template_redirect_load_state')); // we use this for front end. (we need the global wp_query)
add_action('tdc_loaded', array('tdb_state_loader', 'on_tdc_loaded_load_state')); // we use this for ajax and composer iframe. (we don't have the global wp_query while editing)

/**
 * Set the tdb_state
 */
$tdb_action = tdb_util::get_get_val( 'tdb_action' );
if ( false === $tdb_action ) {
    tdb_state::set_is_ajax( false );
} else {
    tdb_state::set_is_ajax( true );
}

/**
 * Modify the main query for wp templates pages
 * - we need to do this to set the shortcode posts limit and get the right pagination
 * - we need this on 'tdc_loaded' beacuse we need to use the is_live_editor_ajax/is_live_editor_iframe methods to check for composer's iframe and ajax rendering blocks @see tdc_state
 * - on tdc_init hook where this functions file is loaded we're to early to use this methods
 */
add_action('tdc_loaded', function() {

	/**
	 * DISQUS plugin compatibility
	 * this prevents disqus from loading on composer iframe/ajax requests and on autoloaded posts or if posts autoload feature is enabled
	 */
	if ( tdc_state::is_live_editor_iframe() ||
         tdc_state::is_live_editor_ajax() ||
         tdb_state::is_ajax()
    ) {
		add_filter( 'dsq_can_load', '__return_false' );
	}

	/**
     * DISQUS plugin compatibility
	 * this hook determines if a cloud single post template uses the 'tdb_single_comments' shortcode
     * ..and prevents disqus from trying to load if it doesn't use the 'tdb_single_comments' comments
	 */
	add_action( 'pre_get_posts', function( $query ) {

		if ( is_admin() ||
             ! $query->is_main_query() ||
             tdc_state::is_live_editor_ajax() ||
             tdc_state::is_live_editor_iframe() ||
             td_util::is_mobile_theme()
		)
			return;

		if ( is_single() ) {
		    //print_r($query);

			if ( isset( $query->query['post_type'] ) && $query->query['post_type'] !== 'post' ) {
			    return;
            }

			if ( isset( $query->query['name'] ) ) {
				$post_obj = get_page_by_path( $query->query['name'], OBJECT, 'post' );
			}

			$post_id = '';
			if ( !empty( $post_obj ) ) {
				$post_id = $post_obj->ID;
			}

			// check if we have a specific template set on the current post
			$td_post_theme_settings = td_util::get_post_meta_array( $post_id, 'td_post_theme_settings' );

			$tdb_template_id = '';

			if ( !empty( $td_post_theme_settings['td_post_template'] ) ) {
				$single_template_id = $td_post_theme_settings['td_post_template'];

				if ( td_global::is_tdb_template( $single_template_id ) ) {

					// make sure the template exists, maybe it was deleted or something
					if ( td_global::is_tdb_template( $single_template_id, true ) ) {

						$tdb_template_id = td_global::tdb_get_template_id($single_template_id);

					} else {
						// just reset the post template here, the panel default post template will kick in and load, if available
						$td_post_theme_settings['td_post_template'] = '';
						update_post_meta( $post_id, 'td_post_theme_settings', $td_post_theme_settings );
					}
				}
			} else {

                // read the global setting
                $default_template_id = td_util::get_option('td_default_site_post_template');

                // check the default template
                if ( td_global::is_tdb_template( $default_template_id ) ) {

                    // make sure the template exists, maybe it was deleted or something
                    if ( td_global::is_tdb_template( $default_template_id, true ) ) {

                        // load the default tdb template
                        $tdb_template_id = td_global::tdb_get_template_id($default_template_id);

                    } else {

                        // if we have an non-existent cloud template update the default site wide post template
                        td_util::update_option('td_default_site_post_template', '' );
                    }

                }
            }

			if ( !empty( $tdb_template_id ) ) {

				// load the cloud template
				$wp_query_template = new WP_Query( array(
						'p' => $tdb_template_id,
						'post_type' => 'tdb_templates',
					)
				);
			}

			// if we have a template look for the 'tdb_single_comments' shortcode
			if ( !empty( $wp_query_template ) && $wp_query_template->have_posts() ) {
				$tdb_single_comments = tdb_util::get_shortcode( $wp_query_template->post->post_content, 'tdb_single_comments' );

				if ( ! $tdb_single_comments || td_util::get_option('tdb_p_autoload_status', 'off' ) === 'on' ) {
					add_filter( 'dsq_can_load', '__return_false' );
				}
			}

		}

	});

	/**
	 * the autoload(infinite) posts script.
	 * it's needed and loaded just on frontend
	 */
	if ( !tdb_state::is_ajax() && !tdc_state::is_live_editor_ajax() && !tdc_state::is_live_editor_iframe() && !td_util::is_mobile_theme() ) {
		add_filter('wp_enqueue_scripts', function(){
			if ( TDB_DEPLOY_MODE == 'dev' ) {
				wp_enqueue_script( 'tdbAutoload', TDB_URL . '/assets/js/tdbAutoload.js', array( 'jquery', 'underscore' ), TD_CLOUD_LIBRARY, true);
			} else {
				wp_enqueue_script( 'tdb_js_posts_autoload', TDB_URL . '/assets/js/js_posts_autoload.min.js', array( 'jquery', 'underscore' ), TD_CLOUD_LIBRARY, true );
			}
		});
	}

	add_action( 'pre_get_posts', function( $query ) {
		if ( ! is_admin() && ! $query->is_main_query() )
			return;

		$orderby = $query->get('orderby');

		if ( 'tdb_template_type' == $orderby ) {
			$query->set( 'meta_key', 'tdb_template_type' );
		}

		$template_type = $query->get('template_type');

		$settings = array();

		if ( ! empty( $template_type ) ) {
		    $settings[] = array(
                'key' => 'tdb_template_type',
                'value' => $template_type
            );
		}

		$is_mobile_template = $query->get('is_mobile_template');

		if ( ! empty( $is_mobile_template ) ) {
		    if ( 'mobile' === $is_mobile_template ) {
		        $settings[] = array(
                    'key' => 'tdc_is_mobile_template',
                    'value' => 1
                );
		    } else if ( 'normal' === $is_mobile_template ) {

		        $settings[] = array(
                    'key' => 'tdc_is_mobile_template',
                    'value' => 1,
                    'compare' => 'NOT EXISTS',
                );
            }
		}

		if (!empty($settings)) {

		    $final_settings = [];
		    foreach ($settings as $setting) {
		        if ( !empty($final_settings)) {
		            $final_settings['relation'] = 'AND';
                }
		        $final_settings[] = $setting;
            }

            $query->set('meta_query', $final_settings );
        }
	});

    /**
     * - filter 'wpseo_title' is used by WordPress SEO plugin and, by default, it returns a seo title that hasn't the page number inside of it,
     * when it's used on td pages [those who have a custom pagination]. At that seo title is added the page info, and just for pages greater than 1
     */
    add_action( 'pre_get_posts', function($query) {

        if( is_page() && $query->is_main_query() ){

            $page_id = isset($query->queried_object) ? $query->queried_object->ID : $query->query_vars['page_id'];

            // load the page template
            $page_template = new WP_Query(array(
                    'p' => $page_id,
                    'post_type' => 'page',
                )
            );

            if (!empty($page_template)) {

                // get the page template
                $_wp_page_template = get_post_meta($page_id, '_wp_page_template', true);

	            $tdb_is_loop = isset( $page_template->post ) && tdb_util::get_shortcode( $page_template->post->post_content, 'tdb_loop' );
	            $tdb_is_loop_2 = isset( $page_template->post ) && tdb_util::get_shortcode($page_template->post->post_content, 'tdb_loop_2');

                // don't apply on page-pagebuilder-latest.php
                if ( 'page-pagebuilder-latest.php' !== $_wp_page_template & $tdb_is_loop === true || $tdb_is_loop_2 === true ) {
                    add_filter('wpseo_title', 'td_wpseo_title_for_loop', 11, 1);

                    function td_wpseo_title_for_loop($seo_title){

                        $td_page = (get_query_var('page')) ? get_query_var('page') : 1; //rewrite the global var
                        $td_paged = (get_query_var('paged')) ? get_query_var('paged') : 1; //rewrite the global var

                        if ($td_paged > $td_page) {
                            $local_paged = $td_paged;
                        } else {
                            $local_paged = $td_page;
                        }

                        // the custom title is when the pagination is greater than 1
                        if ($local_paged > 1) {
                            return $seo_title . ' - ' . __td('Page', TD_THEME_NAME) . ' ' . $local_paged;
                        }

                        return $seo_title;
                    }
                }
            }

        }

    } );

    /**
     * Head canonical links on pages with numbered pagination (loop shortcode).
     *
     */
    add_action( 'wp_head', function() {

        global $tdb_state_single_page;

        if( is_main_query() && is_page() ){

            global $wp_query;

            $page_id = isset($wp_query->queried_object) ? $wp_query->queried_object->ID : $wp_query->query_vars['page_id'];

            // load the page template
            $page_template = new WP_Query(array(
                    'p' => $page_id,
                    'post_type' => 'page',
                )
            );

            if (! empty($page_template)) {

                // get the page template
                $_wp_page_template = get_post_meta($page_id, '_wp_page_template', true);

                $tdb_is_loop_pagination = tdb_util::get_shortcode_att($page_template->post->post_content, 'tdb_loop','ajax_pagination');
                $tdb_is_loop_2_pagination = tdb_util::get_shortcode_att($page_template->post->post_content, 'tdb_loop_2','ajax_pagination');

                // don't apply on page-pagebuilder-latest.php
                if ( 'page-pagebuilder-latest.php' !== $_wp_page_template && $tdb_is_loop_pagination === 'numbered' ) {

                    $atts = array();

                    $limit = tdb_util::get_shortcode_att($page_template->post->post_content, 'tdb_loop', 'limit');
                    if (!empty($limit)) {
                        $atts['post_ids'] = $limit;
                    }
                    $offset = tdb_util::get_shortcode_att($page_template->post->post_content, 'tdb_loop', 'offset');
                    if (!empty($offset)) {
                        $atts['post_ids'] = $offset;
                    }
                    $post_ids = tdb_util::get_shortcode_att($page_template->post->post_content, 'tdb_loop', 'post_ids');
                    if (!empty($post_ids)) {
                        $atts['post_ids'] = $post_ids;
                    }

                    $atts = array(
                        'limit' => $limit,
                        'offset' => $offset,
                        'post_ids' => $post_ids
                    );

                    $loop_data = $tdb_state_single_page->loop->__invoke($atts);

                }

                // don't apply on page-pagebuilder-latest.php
                if ( 'page-pagebuilder-latest.php' !== $_wp_page_template && $tdb_is_loop_2_pagination === 'numbered' ) {

                    $atts = array();

                    $limit = tdb_util::get_shortcode_att($page_template->post->post_content, 'tdb_loop_2', 'limit');
                    if (!empty($limit)) {
                        $atts['post_ids'] = $limit;
                    }
                    $offset = tdb_util::get_shortcode_att($page_template->post->post_content, 'tdb_loop_2', 'offset');
                    if (!empty($offset)) {
                        $atts['post_ids'] = $offset;
                    }
                    $post_ids = tdb_util::get_shortcode_att($page_template->post->post_content, 'tdb_loop_2', 'post_ids');
                    if (!empty($post_ids)) {
                        $atts['post_ids'] = $post_ids;
                    }

                    $atts = array(
                        'limit' => $limit,
                        'offset' => $offset,
                        'post_ids' => $post_ids
                    );

                    $loop_data = $tdb_state_single_page->loop->__invoke($atts);

                }

                if (!empty($loop_data)) {

                    $max_page = (int)$loop_data ["loop_pagination"]['max_page'];

                    $td_page = get_query_var('page') ? get_query_var('page') : 1; //rewrite the global var
                    $td_paged = get_query_var('paged') ? get_query_var('paged') : 1; //rewrite the global var

                    $td_page = intval($td_page);
                    $td_paged = intval($td_paged);

                    //paged works on single pages, page - works on homepage
                    if ($td_paged > $td_page) {
                        $paged = $td_paged;
                    } else {
                        $paged = $td_page;
                    }

                    // Remove the wp action links
                    remove_action('wp_head', 'rel_canonical');
                    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');

                    if (class_exists('WPSEO_Frontend')) {
                        // Remove the canonical action of the Yoast SEO plugin
                        add_filter( 'wpseo_canonical', '__return_false' );
                    }

                    $td_current_page = '<link rel="canonical" href="' . get_pagenum_link($paged) . '"/>';
                    $td_prev_page = '<link rel="prev" href="' . get_pagenum_link($paged - 1) . '"/>';
                    $td_next_page = '<link rel="next" href="' . get_pagenum_link($paged + 1) . '"/>';

                    if ( td_util::is_amp() ){
                        $td_current_page = str_replace( '?amp', "", $td_current_page);
                        $td_prev_page = str_replace( '?amp', "", $td_prev_page);
                        $td_next_page = str_replace( '?amp', "", $td_next_page);
                    }

                    echo $td_current_page;

                    if ($paged > 1) {
                        echo $td_prev_page;
                    }
                    if ($paged < $max_page) {
                        echo $td_next_page;
                    }

                }

            }
        }
    }, 1);


    add_action( 'pre_get_posts', 'tdb_modify_main_query_for_wp_templates_page' );
    function tdb_modify_main_query_for_wp_templates_page( $query ) {

        // checking for main query ONLY ON frontend - Does not run on ajax or TDC iFrame!!!
        if( ( !is_admin() && $query->is_main_query() && !tdc_state::is_live_editor_ajax() && !tdc_state::is_live_editor_iframe()) ) {

            $template_id = '';

            $lang = '';
            if ( class_exists( 'SitePress', false ) ) {
                global $sitepress;
                $sitepress_settings = $sitepress->get_settings();
                if ( isset($sitepress_settings['custom_posts_sync_option'][ 'tdb_templates']) ) {
                    $translation_mode = (int)$sitepress_settings['custom_posts_sync_option']['tdb_templates'];
                    if (1 === $translation_mode) {
                        $lang = $sitepress->get_current_language();
                    }
                }
            }

            if ( is_tax() && ! td_util::is_mobile_theme() ) {

                $option_id = 'tdb_category_template' . $lang;
                $td_cpt_tax = td_util::get_option('td_cpt_tax');

                $queried_object = get_queried_object();

                if ( $queried_object instanceof WP_Term ) {

                    if (!empty($td_cpt_tax[$queried_object->taxonomy])) {
                        $tdb_tax_template = $td_cpt_tax[$queried_object->taxonomy][$option_id];
                        if ( td_global::is_tdb_template( $tdb_tax_template, true ) ) {
                            $template_id = td_global::tdb_get_template_id( $tdb_tax_template );
                        }
                    }
                }

            } else if ( is_category() && ! td_util::is_mobile_theme() ) {

                $current_category_obj = '';
                $current_category_id = '';

                if ( isset( $query->query['cat'] ) ) {
                    $current_category_obj = get_category( $query->query['cat'] );
                } elseif( isset( $query->query_vars['category_name'] ) ) {
                    $current_category_obj = get_category_by_slug( $query->query_vars['category_name'] );
                }

                if ( !empty( $current_category_obj ) ) {
                    $current_category_id = $current_category_obj->cat_ID;
                }

                $option_id = 'tdb_category_template';
                if (class_exists('SitePress', false )) {
                    global $sitepress;
                    $sitepress_settings = $sitepress->get_settings();
                    $translation_mode = (int) $sitepress_settings['custom_posts_sync_option'][ 'tdb_templates'];
                    if ( 1 === $translation_mode ) {
                        $option_id .= $sitepress->get_current_language();
                    }
                }

                // read the individual cat template
                $tdb_individual_category_template = td_util::get_category_option( $current_category_id, $option_id );


                // read the global template
                $tdb_category_template = td_options::get( $option_id );

//                if ( !empty( $tdb_individual_category_template ) && td_global::is_tdb_template( $tdb_individual_category_template, true ) ) {
//                    $template_id = td_global::tdb_get_template_id( $tdb_individual_category_template );
//                } else {
//                    if ( td_global::is_tdb_template( $tdb_category_template, true ) ) {
//                        $template_id = td_global::tdb_get_template_id( $tdb_category_template );
//                    }
//                }

                if ( empty($tdb_individual_category_template)) {
                    //get global option if individual is not tdb
                    if ( td_global::is_tdb_template( $tdb_category_template, true )) {
                        $template_id = td_global::tdb_get_template_id( $tdb_category_template );
                    }
                } else if ( td_global::is_tdb_template( $tdb_individual_category_template, true ) ) {
                    $template_id = td_global::tdb_get_template_id( $tdb_individual_category_template );
                }


            } elseif ( is_author() && ! td_util::is_mobile_theme() ) {

                $option_id = 'tdb_author_templates';
                if ( class_exists( 'SitePress', false ) ) {
                    global $sitepress;
                    $sitepress_settings = $sitepress->get_settings();
                    if ( isset($sitepress_settings['custom_posts_sync_option'][ 'tdb_templates']) ) {
                        $translation_mode = (int)$sitepress_settings['custom_posts_sync_option']['tdb_templates'];
                        if (1 === $translation_mode) {
                            $option_id .= $sitepress->get_current_language();
                        }
                    }
                }

	            // user templates
	            $tdb_author_templates = td_util::get_option( $option_id );
	            // author id
	            $author_id = '';
                if (!empty($query->query_vars['author'])) {
	                $author_id = $query->query_vars['author'];
                } else if(!empty($query->query_vars['author_name'])) {
                    $user = get_user_by('slug', $query->query_vars['author_name']);
                    if( $user ){
                        $author_id = $user->ID;
                    }
                }

                if ( !empty( $tdb_author_templates[$author_id] ) && td_global::is_tdb_template( $tdb_author_templates[$author_id], true ) ) {
	                // individual author template
	                $template_id = td_global::tdb_get_template_id( $tdb_author_templates[$author_id] );
                } else {
                    $option_id = 'tdb_author_template';
                    if ( class_exists( 'SitePress', false ) ) {
                        global $sitepress;
                        $sitepress_settings = $sitepress->get_settings();
                        if ( isset($sitepress_settings['custom_posts_sync_option'][ 'tdb_templates']) ) {
                            $translation_mode = (int)$sitepress_settings['custom_posts_sync_option']['tdb_templates'];
                            if (1 === $translation_mode) {
                                $option_id .= $sitepress->get_current_language();
                            }
                        }
                    }
                    // default template
                    $tdb_author_template = td_options::get( $option_id );
                    if ( td_global::is_tdb_template( $tdb_author_template, true ) ) {
                        $template_id = td_global::tdb_get_template_id( $tdb_author_template );
                    }
                }

            } elseif ( is_search() && ! td_util::is_mobile_theme() ) {

                $option_id = 'tdb_search_template';
                if ( class_exists( 'SitePress', false ) ) {
                    global $sitepress;
                    $sitepress_settings = $sitepress->get_settings();
                    if ( isset($sitepress_settings['custom_posts_sync_option'][ 'tdb_templates']) ) {
                        $translation_mode = (int)$sitepress_settings['custom_posts_sync_option']['tdb_templates'];
                        if (1 === $translation_mode) {
                            $option_id .= $sitepress->get_current_language();
                        }
                    }
                }

                // read the template
                $tdb_search_template = td_options::get( $option_id );
                if ( td_global::is_tdb_template( $tdb_search_template, true ) ) {
                    $template_id = td_global::tdb_get_template_id( $tdb_search_template );
                }

            } elseif ( is_date() && ! td_util::is_mobile_theme() ) {

                $option_id = 'tdb_date_template';
                if ( class_exists( 'SitePress', false ) ) {
                    global $sitepress;
                    $sitepress_settings = $sitepress->get_settings();
                    if ( isset($sitepress_settings['custom_posts_sync_option'][ 'tdb_templates']) ) {
                        $translation_mode = (int)$sitepress_settings['custom_posts_sync_option']['tdb_templates'];
                        if (1 === $translation_mode) {
                            $option_id .= $sitepress->get_current_language();
                        }
                    }
                }

                // read the template
                $tdb_date_template = td_options::get( $option_id );
                if ( td_global::is_tdb_template( $tdb_date_template, true ) ) {
                    $template_id = td_global::tdb_get_template_id( $tdb_date_template );
                }

            } elseif ( is_tag() && ! td_util::is_mobile_theme() ) {

                $template_found = false;

                $option_id = 'tdb_tag_templates';
                if ( class_exists( 'SitePress', false ) ) {
                    global $sitepress;
                    $sitepress_settings = $sitepress->get_settings();
                    if ( isset($sitepress_settings['custom_posts_sync_option'][ 'tdb_templates']) ) {
                        $translation_mode = (int)$sitepress_settings['custom_posts_sync_option']['tdb_templates'];
                        if (1 === $translation_mode) {
                            $option_id .= $sitepress->get_current_language();
                        }
                    }
                }

                $tdb_tag_templates = td_options::get( $option_id );
                if ( is_array( $tdb_tag_templates ) ) {
                    $queried_object = get_queried_object();
                    if ( $queried_object ) {
	                    foreach ( $tdb_tag_templates as $tdb_tag_template_id => $tags ) {
		                    if ( false !== strpos( $tags, $queried_object->slug ) && td_global::is_tdb_template( $tdb_tag_template_id, true ) ) {
			                    $template_found = true;
			                    $template_id = td_global::tdb_get_template_id( $tdb_tag_template_id );
		                    }
	                    }
                    }
                }

                if ( ! $template_found ) {

                    $option_id = 'tdb_tag_template';
                    if ( class_exists( 'SitePress', false ) ) {
                        global $sitepress;
                        $sitepress_settings = $sitepress->get_settings();
                        if ( isset($sitepress_settings['custom_posts_sync_option'][ 'tdb_templates']) ) {
                            $translation_mode = (int)$sitepress_settings['custom_posts_sync_option']['tdb_templates'];
                            if (1 === $translation_mode) {
                                $option_id .= $sitepress->get_current_language();
                            }
                        }
                    }

	                // read the default tag template
	                $tdb_tag_template = td_options::get( $option_id );

                    if ( td_global::is_tdb_template( $tdb_tag_template, true ) ) {
		                $template_id = td_global::tdb_get_template_id( $tdb_tag_template );
	                }
                }

            } elseif ( is_page() && ! td_util::is_mobile_theme() ) {

                $page_id = isset($query->queried_object) ? $query->queried_object->ID : $query->query_vars['page_id'];

                // load the page template
                $page_template = new WP_Query( array(
                        'p' => $page_id,
                        'post_type' => 'page',
                    )
                );

                if ( !empty( $page_template ) && $page_template->have_posts() ) {
                    $offset = tdb_util::get_shortcode_att( $page_template->post->post_content, 'tdb_loop','offset' );
                    tdb_state_template::set_template_loop_offset( (int)$offset );
                }
            }

            if ( !empty( $template_id ) ) {

                if ( class_exists('Mobile_Detect')) {
                    $mobile_detect = new Mobile_Detect();
                    if ( $mobile_detect->isMobile() ) {
                        $tdc_mobile_template_id = get_post_meta( $template_id, 'tdc_mobile_template_id', true );
                        if ( ! empty( $tdc_mobile_template_id ) && 'publish' === get_post_status( $tdc_mobile_template_id ) ) {
                            $template_id = $tdc_mobile_template_id;
                        }
                    }
                }

                // load the tdb template
                $wp_query_template = new WP_Query( array(
                        'p' => $template_id,
                        'post_type' => 'tdb_templates',
                    )
                );
            }

            // if we have a template
            if ( !empty( $wp_query_template ) && $wp_query_template->have_posts() ) {

                /**
                 * set the tdb_template_overwrite filter
                 * this runs in the theme and is used by plugins to tell the theme not to do the default modifications for the main query on category pages
                 * @see td_modify_main_query_for_category_page in ..\theme\includes\wp_booster\td_wp_booster_functions.php
                 */
                add_filter( 'tdb_category_template_query_overwrite', function() {
                    return true;
                });

                // set the template query
                tdb_state_template::set_wp_query( $wp_query_template );

                $limit = tdb_util::get_shortcode_att( $wp_query_template->post->post_content, 'tdb_loop','limit' );

                if ( empty($limit) )
                    $limit = get_option('posts_per_page');

                $offset = tdb_util::get_shortcode_att( $wp_query_template->post->post_content, 'tdb_loop','offset' );
                tdb_state_template::set_template_loop_offset( intval($offset) );

                // detect and handle pagination
                if ( $query->is_paged ) {

                    // if we have an offset, manually determine page query offset (offset + current page (minus one) x posts per page)
                    if ( !empty($offset) || $offset == '0')
                        $offset = (int)$offset + ( ($query->query_vars['paged']-1) * (int)$limit );
                }

                // exclude certain posts or pages from your posts loop
                $post_ids = tdb_util::get_shortcode_att( $wp_query_template->post->post_content, 'tdb_loop','post_ids' );

                if ( !empty($post_ids) ) {

                    // split posts ids string
                    $post_ids_array = explode (',', $post_ids);
                    $posts_not_in = array();
                    $posts_in = array();

                    // split ids
                    foreach ($post_ids_array as $post_id) {
                        $post_id = trim($post_id);

                        // check if the ID is actually a number
                        if (is_numeric($post_id)) {
                            if (intval($post_id) < 0) {
                                $posts_not_in[] = str_replace('-', '', $post_id);
                            } else {
                                $posts_in[] = $post_id;
                            }
                        }
                    }

                    // don't pass an empty post__in because it will return has_posts()
                    if (!empty($posts_in)) {
                        $query->set( 'post__in', $posts_in );
                        $query->set( 'orderby', 'post__in' );
                    }

                    // set the posts to exclude if any
                    if (!empty($posts_not_in)) {
                        $query->set( 'post__not_in', $posts_not_in );
                    }
                }

                // set post type
                $installed_post_types = tdb_util::get_shortcode_att($wp_query_template->post->post_content, 'tdb_loop', 'installed_post_types');

                if (!empty($installed_post_types)) {
                    $array_selected_post_types = array();
                    $expl_installed_post_types = explode(',', $installed_post_types);

                    foreach ($expl_installed_post_types as $val_this_post_type) {
                        if (trim($val_this_post_type) != '') {
                            $array_selected_post_types[] = trim($val_this_post_type);
                        }
                    }

                    $query->set( 'post_type', $array_selected_post_types );
                }

                $sort = tdb_util::get_shortcode_att( $wp_query_template->post->post_content, 'tdb_loop','sort' );
                switch ($sort) {
                    case 'oldest_posts':
                        $query->set( 'order', 'ASC' );
                        break;

                    case 'modified_date':
                        $query->set( 'orderby', 'post_modified' );
                        break;

                    case 'alphabetical_order':
                        $query->set( 'orderby', 'title' );
                        $query->set( 'order', 'ASC' );
                        break;

                    case 'popular':
                        $query->set( 'meta_key', td_page_views::$post_view_counter_key );
                        $query->set( 'orderby', 'meta_value_num' );
                        $query->set( 'order', 'DESC' );
                        break;

                    case 'popular7':
                        $query->set( 'meta_query', array(
                            'relation' => 'AND',
                            array(
                                'key'     => td_page_views::$post_view_counter_7_day_total,
                                'type'    => 'numeric'
                            ),
                            array(
                                'key'     => td_page_views::$post_view_counter_7_day_last_date,
                                'value'   => (date('U') - 604800), // current date minus 7 days
                                'type'    => 'numeric',
                                'compare' => '>'
                            )
                        ) );
                        $query->set( 'orderby', td_page_views::$post_view_counter_7_day_total );
                        $query->set( 'order', 'DESC' );
                        break;

                    case 'review_high':
                        $query->set( 'meta_key', 'td_review_key' );
                        $query->set( 'orderby', 'meta_value_num' );
                        $query->set( 'order',  'DESC' );
                        break;

                    case 'comment_count':
                        $query->set( 'orderby', 'comment_count' );
                        $query->set( 'order', 'DESC' );
                        break;
                }

                // locked content
                $locked_only = tdb_util::get_shortcode_att( $wp_query_template->post->post_content, 'tdb_loop','locked_only' );

                // set the query limit/offset/sort
                // except feeds
                if( empty( $query->is_feed ) ) {
                    $query->set('main_query_offset', true);
                    $query->set('offset', $offset);
                    $query->set('posts_per_page', $limit);

                    if ( defined('TD_SUBSCRIPTION') && !empty( $locked_only ) ) {
	                    $query->set( 'meta_key', 'tds_lock_content' );
                    }
                }

            }
        }
    }

    add_filter( 'found_posts', 'tdb_on_found_posts_adjust_offset_pagination', 10, 2 );
    function tdb_on_found_posts_adjust_offset_pagination( $found_posts, $query ) {

        if( $query->get('main_query_offset') ) {
            $offset = tdb_state_template::get_template_loop_offset();
            return $found_posts - $offset;
        }

        return $found_posts;
    }

    // fix dsq 'comments_template' action hook that does not return the path to the theme template file(original template passed as parameter) ...
    //... and breaks cloud library's tdb_single_comments shortcode functionality
	if ( class_exists( 'Disqus_Conditional_Load' ) ) {
		//add_filter( 'dsq_can_load', '__return_false' );
        // remove the dsq 'comments_template' > remove_disqus_template hook to prevent breaking cloud library's tdb_single_comments shortcode functionality
		remove_action( 'comments_template', array( dcl_instance()->public, 'remove_disqus_template' ), 15 );
	}

});


/**
 * resources loaded just on ajax autoloaded(infinite) posts
 */
if ( tdb_state::is_ajax() ) {

    // do not show the admin bar on autoload posts ajax calls
    add_filter('show_admin_bar', '__return_false');

    // enqueue for posts autoload(infinite) ajax loaded posts
    add_filter('wp_enqueue_scripts', function(){

        // load the js
        if ( TDB_DEPLOY_MODE == 'dev' ) {
            wp_enqueue_script( 'tdbAutoloadAjax', TDB_URL . '/assets/js/tdbAutoloadAjax.js', array( 'jquery' ), TD_CLOUD_LIBRARY, true);
        } else {
            wp_enqueue_script( 'tdb_js_posts_autoload_ajax', TDB_URL . '/assets/js/js_posts_autoload_ajax.min.js', array( 'jquery', 'underscore' ), TD_CLOUD_LIBRARY, true );
        }

        // load the css
        if ( TDB_DEPLOY_MODE == 'dev' ) {
            wp_enqueue_style( 'tdb_autoload_ajax', TDB_URL . '/td_less_style.css.php?part=less_ajax', false, TD_CLOUD_LIBRARY );
        } else {
            wp_enqueue_style( 'tdb_posts_autoload_ajax_style', TDB_URL . '/assets/css/tdb_less_ajax.css', false, TD_CLOUD_LIBRARY );
        }
    });

    // do not index '/?tdb_action=tdb_ajax' url - autoload article
    add_filter('wp_head', function(){
        echo '<meta name="robots" content="noindex, nofollow" />';
    },1);
}


/**
 * when posting a comment on a ajax autoloaded posts make sure the redirect sets the ajax state
 */
add_filter('comment_post_redirect', function( $url ){

	if ( strpos( $_SERVER["HTTP_REFERER"], '?tdb_action=tdb_ajax' ) !== false ) {
		$url = add_query_arg( 'tdb_action', 'tdb_ajax', $url );
	}

	return $url;
});


/**
 *  redirect the view template
 * - template_include runs after template_redirect
 * - RUNS BEFORE the one that we have in the theme @see on_td_wp_booster_functions.php
 * - The theme does nothing on single pages when it detects a template builder template so we have to do all the work here
 */
add_filter( 'template_include', 'tdb_on_template_include' );
function tdb_on_template_include( $original_template ) {

    $lang = '';
    if ( class_exists( 'SitePress', false ) ) {
        global $sitepress;
        $sitepress_settings = $sitepress->get_settings();
        if ( isset($sitepress_settings['custom_posts_sync_option'][ 'tdb_templates']) ) {
            $translation_mode = (int)$sitepress_settings['custom_posts_sync_option']['tdb_templates'];
            if (1 === $translation_mode) {
                $lang = $sitepress->get_current_language();
            }
        }
    }

    // we are viewing a single post template
    if ( is_singular( array( 'tdb_templates' ) ) && ! td_util::is_mobile_theme() ) {

        add_filter( 'the_content', function( $content ) {
            if ( td_util::is_template_header() ) {

                global $post;
                $tdb_template_type = get_post_meta( $post->ID, 'tdb_template_type', true );

                if ( 'header' === $tdb_template_type ) {
                    return '';
                }
                return $content;
            }
            return $content;
        });

        return TDB_TEMPLATE_BUILDER_DIR . '/wp_templates/tdb_view_template.php';
    }

    // we are viewing a category template
    if ( is_tax() && ! td_util::is_mobile_theme() ) {

        $current_term_id = get_queried_object()->term_id;
        $tax_query_var = get_query_var('taxonomy');
        $option_id = 'tdb_category_template' . $lang;
        $td_cpt_tax = td_util::get_option('td_cpt_tax');
        $tdb_individual_cpt_tax_template = get_term_meta( $current_term_id, $option_id, true );

        if ( ! empty( $tdb_individual_cpt_tax_template ) ) {
            $template_id = td_global::tdb_get_template_id($tdb_individual_cpt_tax_template);
        } elseif (!empty($tax_query_var) && !empty($td_cpt_tax[$tax_query_var])) {
            $tdb_tax_template = $td_cpt_tax[$tax_query_var][$option_id];
            if ( td_global::is_tdb_template( $tdb_tax_template, true ) ) {
                $template_id = td_global::tdb_get_template_id( $tdb_tax_template );
            }
        }

        // if we don't have a template return the original temp
        if ( !empty( $template_id ) ) {

            // load the tdb template
            $wp_query_template = new WP_Query( array(
                    'p' => $template_id,
                    'post_type' => 'tdb_templates',
                )
            );
        }

        // do not redirect the theme template if we don't find the template
        // the template was probably deleted or something
        if ( empty( $wp_query_template ) || !$wp_query_template->have_posts() ) {
            return $original_template; // do nothing if the template is not found!
        }

        tdb_state_template::set_wp_query( $wp_query_template );

        return TDB_TEMPLATE_BUILDER_DIR . '/wp_templates/tdb_view_category.php';
    }

    // we are viewing a single page template
    if ( is_singular( array( 'attachment' ) ) && ! td_util::is_mobile_theme() ) {

        $template_id = '';

        $option_id = 'tdb_attachment_template';
        if ( class_exists( 'SitePress', false ) ) {
            global $sitepress;
            $sitepress_settings = $sitepress->get_settings();
            if ( isset($sitepress_settings['custom_posts_sync_option'][ 'tdb_templates']) ) {
                $translation_mode = (int)$sitepress_settings['custom_posts_sync_option']['tdb_templates'];
                if (1 === $translation_mode) {
                    $option_id .= $sitepress->get_current_language();
                }
            }
        }

        // read template
        $tdb_attachment_template = td_options::get( $option_id );
        if ( td_global::is_tdb_template( $tdb_attachment_template, true ) ) {
            $template_id = td_global::tdb_get_template_id( $tdb_attachment_template );
        }

        if ( !empty( $template_id ) ) {

            if (class_exists('Mobile_Detect')) {
                $mobile_detect = new Mobile_Detect();
                if ( $mobile_detect->isMobile() ) {
                    $tdc_mobile_template_id = get_post_meta( $template_id, 'tdc_mobile_template_id', true );
                    if ( ! empty( $tdc_mobile_template_id ) ) {
                        $template_id = $tdc_mobile_template_id;
                    }
                }
            }

            // load the tdb template
            $wp_query_template = new WP_Query( array(
                    'p' => $template_id,
                    'post_type' => 'tdb_templates',
                )
            );
        }

        // do not redirect the theme template if we don't find the template
        // the template was probably deleted or something
        if ( empty( $wp_query_template ) || !$wp_query_template->have_posts() ) {
            return $original_template; // do nothing if the template is not found!
        }

        // save our template wp_query & load
        tdb_state_template::set_wp_query( $wp_query_template );

        // do the redirect
        return TDB_TEMPLATE_BUILDER_DIR . '/wp_templates/tdb_view_attachment.php';
    }

    // we are viewing a category template
    if ( is_category() && ! td_util::is_mobile_theme() ) {

        $template_id = '';
        $current_category_obj = '';

        $cat_query_var = get_query_var('cat');
        $category_name_query_var = get_query_var('category_name');
        $current_category_id = '';

        if ( !empty( $cat_query_var ) ) {
            $current_category_obj = get_category( $cat_query_var );
        } elseif( !empty( $category_name_query_var ) ) {
            $current_category_obj = get_category_by_slug( $category_name_query_var );
        }

        if ( !empty( $current_category_obj ) ) {
            $current_category_id = $current_category_obj->cat_ID;
        }

        $option_id = 'tdb_category_template' . $lang;

        // read the individual cat template
        $tdb_individual_category_template = td_util::get_category_option( $current_category_id, $option_id );

        // read the global template
        $tdb_category_template = td_options::get( $option_id );

        if ( empty( $tdb_individual_category_template ) ) {

            if ( td_global::is_tdb_template( $tdb_category_template, true ) ) {
                $template_id = td_global::tdb_get_template_id( $tdb_category_template );
            }

        } else {

            if ( td_global::is_tdb_template( $tdb_individual_category_template, true ) ) {
                $template_id = td_global::tdb_get_template_id( $tdb_individual_category_template );

            } else if ( 'theme_templates' === $tdb_individual_category_template ) {

                // do nothing if the template is not found!
                return $original_template;

            } else if ( td_global::is_tdb_template( $tdb_category_template, true ) ) {

	            // look and set the global cat cloud template if we have an individual category but it's not found
	            $template_id = td_global::tdb_get_template_id( $tdb_category_template );

            }
        }

        // if we don't have a template return the original temp
        if ( !empty( $template_id ) ) {

            if (class_exists('Mobile_Detect')) {
                $mobile_detect = new Mobile_Detect();
                if ( $mobile_detect->isMobile() ) {
                    $tdc_mobile_template_id = get_post_meta( $template_id, 'tdc_mobile_template_id', true );
                    if ( ! empty( $tdc_mobile_template_id ) ) {
                        $template_id = $tdc_mobile_template_id;
                    }
                }
            }

            // load the tdb template
            $wp_query_template = new WP_Query( array(
                    'p' => $template_id,
                    'post_type' => 'tdb_templates',
                )
            );
        }

        // do not redirect the theme template if we don't find the template
        // it was probably deleted or something
        if ( empty( $wp_query_template ) || !$wp_query_template->have_posts() ) {
            return $original_template; // do nothing if the template is not found!
        }

	    // save our template wp_query & load
	    tdb_state_template::set_wp_query( $wp_query_template );

        return TDB_TEMPLATE_BUILDER_DIR . '/wp_templates/tdb_view_category.php';
    }

    // we are viewing a author template
    if ( is_author() && ! td_util::is_mobile_theme() ) {

        $option_id = 'tdb_author_templates';
        if ( class_exists( 'SitePress', false ) ) {
            global $sitepress;
            $sitepress_settings = $sitepress->get_settings();
            if ( isset($sitepress_settings['custom_posts_sync_option'][ 'tdb_templates']) ) {
                $translation_mode = (int)$sitepress_settings['custom_posts_sync_option']['tdb_templates'];
                if (1 === $translation_mode) {
                    $option_id .= $sitepress->get_current_language();
                }
            }
        }

	    // user templates
	    $tdb_author_templates = td_util::get_option( $option_id );
	    // author id
	    $author_query_var = get_query_var('author');
	    $author_name_query_var = get_query_var('author_name');
	    $author_id = '';
	    if (!empty($author_query_var)) {
		    $author_id = $author_query_var;
	    } else if(!empty($author_name_query_var)) {
		    $user = get_user_by('login', $author_name_query_var);
            if( $user ){
                $author_id = $user->ID;
            }
	    }

	    if ( !empty( $tdb_author_templates[$author_id] ) && td_global::is_tdb_template( $tdb_author_templates[$author_id], true ) ) {
		    return TDB_TEMPLATE_BUILDER_DIR . '/wp_templates/tdb_view_author.php';
	    }

        $option_id = 'tdb_author_template';
        if ( class_exists( 'SitePress', false ) ) {
            global $sitepress;
            $sitepress_settings = $sitepress->get_settings();
            if ( isset($sitepress_settings['custom_posts_sync_option'][ 'tdb_templates']) ) {
                $translation_mode = (int)$sitepress_settings['custom_posts_sync_option']['tdb_templates'];
                if (1 === $translation_mode) {
                    $option_id .= $sitepress->get_current_language();
                }
            }
        }

        // read template
        $template_id = td_options::get( $option_id );
        if (td_global::is_tdb_template($template_id, true)) {
            return TDB_TEMPLATE_BUILDER_DIR . '/wp_templates/tdb_view_author.php';
        }
    }

    // we are viewing a search template
    if ( is_search() && ! td_util::is_mobile_theme() ) {

        $option_id = 'tdb_search_template';
        if ( class_exists( 'SitePress', false ) ) {
            global $sitepress;
            $sitepress_settings = $sitepress->get_settings();
            if ( isset($sitepress_settings['custom_posts_sync_option'][ 'tdb_templates']) ) {
                $translation_mode = (int)$sitepress_settings['custom_posts_sync_option']['tdb_templates'];
                if (1 === $translation_mode) {
                    $option_id .= $sitepress->get_current_language();
                }
            }
        }

        // read template
        $tdb_search_template = td_options::get( $option_id );
        if ( td_global::is_tdb_template( $tdb_search_template, true ) ) {
            return TDB_TEMPLATE_BUILDER_DIR . '/wp_templates/tdb_view_search.php';
        }

    }

    // we are viewing a date template
    if ( is_date() && ! td_util::is_mobile_theme() ) {

        $option_id = 'tdb_date_template';
        if ( class_exists( 'SitePress', false ) ) {
            global $sitepress;
            $sitepress_settings = $sitepress->get_settings();
            if ( isset($sitepress_settings['custom_posts_sync_option'][ 'tdb_templates']) ) {
                $translation_mode = (int)$sitepress_settings['custom_posts_sync_option']['tdb_templates'];
                if (1 === $translation_mode) {
                    $option_id .= $sitepress->get_current_language();
                }
            }
        }

        // read template
        $tdb_date_template = td_options::get( $option_id );
        if ( td_global::is_tdb_template( $tdb_date_template, true ) ) {
            return TDB_TEMPLATE_BUILDER_DIR . '/wp_templates/tdb_view_date.php';
        }

    }

    // we are viewing a tag template
    if ( is_tag() && ! td_util::is_mobile_theme() ) {

        $option_id = 'tdb_tag_templates';
        if ( class_exists( 'SitePress', false ) ) {
            global $sitepress;
            $sitepress_settings = $sitepress->get_settings();
            if ( isset($sitepress_settings['custom_posts_sync_option'][ 'tdb_templates']) ) {
                $translation_mode = (int)$sitepress_settings['custom_posts_sync_option']['tdb_templates'];
                if (1 === $translation_mode) {
                    $option_id .= $sitepress->get_current_language();
                }
            }
        }

        $tdb_tag_templates = td_options::get( $option_id );
        if ( is_array( $tdb_tag_templates ) ) {
            $queried_object = get_queried_object();
            foreach ( $tdb_tag_templates as $tdb_tag_template_id => $tags ) {
	            if ( $queried_object ) {
		            if ( false !== strpos( $tags, $queried_object->slug ) && td_global::is_tdb_template( $tdb_tag_template_id, true ) ) {
			            return TDB_TEMPLATE_BUILDER_DIR . '/wp_templates/tdb_view_tag.php';
		            }
                }
            }
        }

        $option_id = 'tdb_tag_template';
        if ( class_exists( 'SitePress', false ) ) {
            global $sitepress;
            $sitepress_settings = $sitepress->get_settings();
            if ( isset( $sitepress_settings['custom_posts_sync_option'][ 'tdb_templates'] ) ) {
                $translation_mode = (int) $sitepress_settings['custom_posts_sync_option']['tdb_templates'];
                if ( 1 === $translation_mode ) {
                    $option_id .= $sitepress->get_current_language();
                }
            }
        }

        // read template
        $tdb_tag_template = td_options::get( $option_id );
        if ( td_global::is_tdb_template( $tdb_tag_template, true ) ) {
            return TDB_TEMPLATE_BUILDER_DIR . '/wp_templates/tdb_view_tag.php';
        }

    }

    // we are viewing a 404 template
    if ( is_404() && ! td_util::is_mobile_theme() ) {

        $template_id = '';

        $option_id = 'tdb_404_template';
        if ( class_exists( 'SitePress', false ) ) {
            global $sitepress;
            $sitepress_settings = $sitepress->get_settings();
            if ( isset($sitepress_settings['custom_posts_sync_option'][ 'tdb_templates']) ) {
                $translation_mode = (int)$sitepress_settings['custom_posts_sync_option']['tdb_templates'];
                if (1 === $translation_mode) {
                    $option_id .= $sitepress->get_current_language();
                }
            }
        }

        // read template
        $tdb_404_template = td_options::get( $option_id );
        if ( td_global::is_tdb_template( $tdb_404_template, true ) ) {
            $template_id = td_global::tdb_get_template_id( $tdb_404_template );
        }

        if ( !empty( $template_id ) ) {

            if (class_exists('Mobile_Detect')) {
                $mobile_detect = new Mobile_Detect();
                if ( $mobile_detect->isMobile() ) {
                    $tdc_mobile_template_id = get_post_meta( $template_id, 'tdc_mobile_template_id', true );
                    if ( ! empty( $tdc_mobile_template_id ) ) {
                        $template_id = $tdc_mobile_template_id;
                    }
                }
            }

            // load the tdb template
            $wp_query_template = new WP_Query( array(
                    'p' => $template_id,
                    'post_type' => 'tdb_templates',
                )
            );
        }

        // do not redirect the theme template if we don't find the template
        // the template was probably deleted or something
        if ( empty( $wp_query_template ) || !$wp_query_template->have_posts() ) {
            return $original_template; // do nothing if the template is not found!
        }

        // save our template wp_query & load
        tdb_state_template::set_wp_query( $wp_query_template );

        // do the redirect
        return TDB_TEMPLATE_BUILDER_DIR . '/wp_templates/tdb_view_404.php';
    }

    // we are viewing a 404 template
    if ( is_page() && ! td_util::is_mobile_theme() ) {

        if (class_exists('Mobile_Detect')) {
            $mobile_detect = new Mobile_Detect();
            if ( $mobile_detect->isMobile() ) {
                $tdc_mobile_template_id = get_post_meta( get_the_ID(), 'tdc_mobile_template_id', true );

                if ( ! empty( $tdc_mobile_template_id ) ) {

                    if ( get_query_var( 'paged' ) ) {
                        $paged = get_query_var( 'paged' );
                    }
                    elseif ( get_query_var( 'page' ) ) {
                        $paged = get_query_var( 'page' );
                    }
                    else {
                        $paged = 1;
                    }

                    // load the tdb template
                    $wp_query_template = new WP_Query( array(
                            'p'         => $tdc_mobile_template_id,
                            'post_type' => 'page',
                            'paged' => $paged
                        )
                    );
                }
            }
        }

        // do not redirect the theme template if we don't find the template
        // the template was probably deleted or something
        if ( empty( $wp_query_template ) || !$wp_query_template->have_posts() ) {
            return $original_template; // do nothing if the template is not found!
        }

        // save our template wp_query & load
        tdb_state_template::set_wp_query( $wp_query_template );

        // do the redirect
        return TDB_TEMPLATE_BUILDER_DIR . '/wp_templates/tdb_view_page.php';
    }

    return $original_template;
}


/**
 * This hook is in the theme, it allows us to provide a redirect for the single pages on the front end
 * we run it on the post template if set and on the global template if no post template is set. Not the best solution...
 * in: the template id
 * out: the new template path
 */
add_filter('td_single_override', function($template_id) {

    if ( !empty($template_id) && class_exists('Mobile_Detect')) {
        $mobile_detect = new Mobile_Detect();
        if ( $mobile_detect->isMobile()) {
            $tdc_mobile_template_id = get_post_meta($template_id, 'tdc_mobile_template_id', true);
            if ( !empty($tdc_mobile_template_id) && 'publish' === get_post_status( $tdc_mobile_template_id ) ) {
                $template_id = $tdc_mobile_template_id;
            }
        }
    }

	/*
	 * Code from wp get_posts (previous was with WP_Query). Diff from previous WP_Query is that wmpl hooks on query without default wp_parse_args. That's why wp get_posts inside code is used
	 */
    $args = array(
        'p' => $template_id,
        'post_type' => 'tdb_templates'
    );

	$defaults = array(
		'numberposts'      => 5,
		'category'         => 0,
		'orderby'          => 'date',
		'order'            => 'DESC',
		'include'          => array(),
		'exclude'          => array(),
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'post',
		'suppress_filters' => true,
	);

	$parsed_args = wp_parse_args( $args, $defaults );
	if ( empty( $parsed_args['post_status'] ) ) {
		$parsed_args['post_status'] = ( 'attachment' == $parsed_args['post_type'] ) ? 'inherit' : 'publish';
	}
	if ( ! empty( $parsed_args['numberposts'] ) && empty( $parsed_args['posts_per_page'] ) ) {
		$parsed_args['posts_per_page'] = $parsed_args['numberposts'];
	}
	if ( ! empty( $parsed_args['category'] ) ) {
		$parsed_args['cat'] = $parsed_args['category'];
	}
	if ( ! empty( $parsed_args['include'] ) ) {
		$incposts                      = wp_parse_id_list( $parsed_args['include'] );
		$parsed_args['posts_per_page'] = count( $incposts );  // only the number of posts included
		$parsed_args['post__in']       = $incposts;
	} elseif ( ! empty( $parsed_args['exclude'] ) ) {
		$parsed_args['post__not_in'] = wp_parse_id_list( $parsed_args['exclude'] );
	}

	$parsed_args['ignore_sticky_posts'] = true;
	$parsed_args['no_found_rows']       = true;

	$wp_query_template = new WP_Query;
	$posts = $wp_query_template->query( $parsed_args );

    // do not redirect the theme template if we don't find the template
    // the template was probably deleted or something
    if (count($posts) === 0) {
	    return $template_id; // do nothing if the template is not found!
    }

    // save our template wp_query & load
    tdb_state_template::set_wp_query($wp_query_template);

    // do the redirect
    return TDB_TEMPLATE_BUILDER_DIR . '/wp_templates/tdb_view_single.php';
});


/**
 * JS: add tdb_globals to wp-admin
 */
add_filter('admin_head', function(){

    if ( td_util::is_mobile_theme() ) {
        return;
    }

    $tdb_globals = [
        'wpRestNonce' => wp_create_nonce('wp_rest'),
        'wpRestUrl' => rest_url(),
        'wpAdminUrl' => admin_url(),
        'permalinkStructure' => get_option('permalink_structure'),
        'tdbTemplateType' => tdc_util::get_get_val('tdbTemplateType'),
        'deployMode' => TDB_DEPLOY_MODE,
        'globalSettings' => [],
    ];

    foreach (['tdcSavingHistory'] as $item) {
        $existing_val = td_util::get_option($item);
        $tdb_globals['globalSettings'][$item] = empty($existing_val) ? false : $existing_val;
    }

    ?>
    <script>
        window.tdb_globals = <?php echo json_encode( $tdb_globals );?>;
    </script>

    <style>
        body.post-type-tdb_templates .page-title-action {
            display: none;
        }
    </style>
    <?php

	// add tdc_wm_global_colors js global
	$tdc_wm_global_colors = td_util::get_option(
		'tdc_wm_global_colors',
		array(
            'accent_color' => array(
                'name' => 'Theme Color',
                'color' => '#fff',
                'default' => true
            )
		)
	);

	// add tdc_wm_global_fonts js global
	$tdc_wm_global_fonts = td_util::get_option('tdc_wm_global_fonts' );

	if ( empty( $tdc_wm_global_fonts ) ) {
		$tdc_wm_global_fonts = array();
	}

    // add tdc_wm_custom_svg_icons js global
    $tdc_wm_custom_svg_icons = td_util::get_option('tdc_wm_custom_svg_icons');
    if( empty( $tdc_wm_custom_svg_icons ) ) {
        $tdc_wm_custom_svg_icons = array();
    }

	?>
    <script>
        window.tdc_wm_global_colors = <?php echo json_encode( $tdc_wm_global_colors ); ?>;
        window.tdc_wm_global_fonts = <?php echo json_encode( $tdc_wm_global_fonts ); ?>;
        window.tdc_wm_custom_svg_icons = <?php echo json_encode( $tdc_wm_custom_svg_icons ); ?>;
        var tdc_wm_global_colors_nonce = <?php echo json_encode( wp_create_nonce('tdc-wm-global-colors') ); ?>;
        var tdc_wm_custom_svg_icons_nonce = <?php echo json_encode( wp_create_nonce('tdc-wm-custom-svg-icons') ); ?>;
        var tdc_wm_global_fonts_nonce = <?php echo json_encode( wp_create_nonce('tdc-wm-global-fonts') ); ?>;
    </script>
	<?php

});

/**
 * JS: add the tdb_globals for frontend also..
 * @note: this is need for autoload(infinite) posts ajax calls
 */
add_filter('wp_head', function () {

    if ( td_util::is_mobile_theme() ) {
        return;
    }

    $tdb_globals = array (
        'wpRestNonce' => wp_create_nonce('wp_rest'),
        'wpRestUrl' => rest_url(),
        'permalinkStructure' => get_option('permalink_structure'),
        'globalSettings' => [],
    );

    foreach (['tdcSavingHistory'] as $item) {
        $existing_val = td_util::get_option($item);
        $tdb_globals['globalSettings'][$item] = empty($existing_val) ? false : $existing_val;
    }

    if ( ! tdb_state::is_ajax() ) {
        $tdb_globals['isAjax'] = false;
        $tdb_globals['isAdminBarShowing'] = is_admin_bar_showing();

        $tdb_p_autoload_scroll_percent = intval( td_util::get_option('tdb_p_autoload_scroll_percent', 50 ) );

        if ( tdb_util::check_in_range( $tdb_p_autoload_scroll_percent, 1, 100 ) ) {
	        $tdb_globals['autoloadScrollPercent'] = $tdb_p_autoload_scroll_percent;
        } else {
	        $tdb_globals['autoloadScrollPercent'] = 50;
        }

        global $post;

        if ( is_singular('post') ) {
	        $tdb_globals['postAutoloadStatus'] = td_util::get_option('tdb_p_autoload_status', 'off');
	        if ( !empty($post) ){
	            $tdb_globals['origPostEditUrl'] = get_edit_post_link($post->ID);
            }
        }

    } else {
	    $tdb_globals['isAjax'] = true;
    }

    ?>
    <script>
        window.tdb_globals = <?php echo json_encode( $tdb_globals );?>;
    </script>
    <?php
});


/**
 * add tdc website manager global colors style for admin/frontend
 */
add_filter( 'wp_head', 'tdc_website_manager_global_colors_style' );
add_filter( 'admin_head', 'tdc_website_manager_global_colors_style' );
function tdc_website_manager_global_colors_style() {

    // mobile theme exception
	if ( td_util::is_mobile_theme() ) {
		return;
	}

	// tdc website manager global colors style
	$tdc_wm_global_colors = td_util::get_option(
		'tdc_wm_global_colors',
		array(
            'accent_color' => array(
                'name' => 'Theme Color',
                'color' => '#fff',
                'default' => true
            )
		)
	);

	echo PHP_EOL;
	?>
    <style id="tdb-global-colors">
        <?php
			echo ':root {';
			foreach ( $tdc_wm_global_colors as $color_option_id => $color_data ) {
				 echo '--' . str_replace( '_', '-', $color_option_id ) . ': ' . $color_data['color'] . ';';
			}
			echo '}' . PHP_EOL;
		?>
    </style>
	<?php

	// tdc website manager global fonts style
	$tdc_wm_global_fonts = td_util::get_option('tdc_wm_global_fonts' );

	echo PHP_EOL;

    if ( !empty( $tdc_wm_global_fonts ) ) {
    ?>
    <style id="tdb-global-fonts">
        <?php
            echo ':root {';
            $font_family_list = td_util::get_font_family_list();
            foreach ( $tdc_wm_global_fonts as $font_option_id => $font_data ) {

                // get the font family name using global font key from font fam list
                $font_family = array_search( $font_data['key'], $font_family_list );

                if ( $font_family ) {
                    //echo '--' . str_replace( '_', '-', $font_option_id ) . ': ' . $font_family . ';';
                    echo '--' . $font_option_id . ': ' . $font_family . ';';
                }

            }
            echo '}' . PHP_EOL;
        ?>
    </style>
    <?php
    }

}

/**
 *  Get the template id to get icon fonts
 */
add_filter( 'tdc_filter_icon_fonts_post_id', function( $post_id ) {
	if ( tdb_state_template::has_wp_query() ) {
		return tdb_state_template::get_wp_query()->post->ID;
	}
	return $post_id;

}, 10, 1);


/**
 *  Get the template id to get google fonts
 */
add_filter( 'td_filter_google_fonts_post_id', function( $post_id ) {
	if ( tdb_state_template::has_wp_query() ) {
		return tdb_state_template::get_wp_query()->post->ID;
	}
	return $post_id;

}, 10, 1);


add_action('wp_before_admin_bar_render', 'tdb_on_before_admin_bar_render');
function tdb_on_before_admin_bar_render() {
    global $wp_admin_bar, $post, $wp_query;

    if ( td_util::is_mobile_theme() ) {
		return;
	}

	if ( is_user_logged_in() && current_user_can( 'manage_categories' ) && is_admin_bar_showing() ) {

	    if ( tdb_state_content::has_wp_query() ) {

            $tdbLoadDataFromId = '';
            switch ( tdb_state_template::get_template_type() ) {
                case 'single':
                case 'cpt':
                    $tdbLoadDataFromId = tdb_state_content::get_wp_query()->post->ID;
                    break;

                case 'category':
                case 'cpt_tax':
                    $tdbLoadDataFromId = tdb_state_content::get_wp_query()->queried_object_id;
                    break;

                case 'woo_archive':
                    if ( isset( tdb_state_content::get_wp_query()->queried_object ) ) {
	                    $tdbLoadDataFromId = tdb_state_content::get_wp_query()->queried_object->term_id;
                    } else {
	                    $term = get_term_by('slug', tdb_state_content::get_wp_query()->get('term'), tdb_state_content::get_wp_query()->get('taxonomy') );
	                    $tdbLoadDataFromId = $term->term_id;
                    }
                    break;

                case 'author':
                    $tdbLoadDataFromId = tdb_state_content::get_wp_query()->query_vars[ 'author' ];
                    break;

                case 'search':
                case 'woo_search_archive':
                    $tdbLoadDataFromId = tdb_state_content::get_wp_query()->query_vars['s'];
                    break;

                case 'date':
                    $tdbLoadDataFromId = tdb_state_content::get_wp_query()->query_vars[ 'year' ];
                    break;

                case 'tag':
                    $tdbLoadDataFromId = tdb_state_content::get_wp_query()->query_vars[ 'tag_id' ];
                    break;

                case 'woo_product':
                case 'attachment':
                    $tdbLoadDataFromId = tdb_state_content::get_wp_query()->queried_object->ID;
                    break;

                case 'woo_shop_base':
	                $tdbLoadDataFromId = wc_get_page_id('shop');
                    break;

            }


            $urlFromId = '';
            if (!empty($tdbLoadDataFromId)) {
                $urlFromId = '&tdbLoadDataFromId=' . $tdbLoadDataFromId;
            }

            // edit single page
            $wp_admin_bar->add_menu(
                array(
                    'id'    => 'tdb_template_builder',
                    'title' => 'Edit with TagDiv Composer<span class="td-mobile-title"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1536 1024"><path d="M1518.592 537.6l-494.592 460.8c-8.192 8.192-25.6 17.408-43.008 17.408-16.384 0-25.6-9.216-41.984-17.408l-171.008-171.008-179.2 171.008c-8.192 8.192-25.6 17.408-43.008 17.408-16.384 0-25.6-9.216-41.984-17.408l-486.4-460.8c-25.6-17.408-25.6-51.2 0-68.608l494.592-451.584c8.192-9.216 17.408-17.408 33.792-17.408 17.408 0 25.6 8.192 43.008 17.408l179.2 161.792 179.2-161.792c8.192-9.216 25.6-17.408 43.008-17.408 16.384 0 25.6 8.192 41.984 17.408l495.616 451.584c16.384 17.408 16.384 51.2-9.216 68.608zM1288.192 486.4l-272.384-256c-9.216-8.192-9.216-8.192-17.408-8.192s-17.408 0-17.408 8.192l-425.984 392.192-137.216-118.784 230.4-214.016-84.992-59.392c0-8.192-8.192-8.192-17.408-8.192-8.192 0-16.384 0-16.384 8.192l-273.408 256c-17.408 8.192-17.408 25.6-8.192 33.792l272.384 256c9.216 9.216 9.216 9.216 17.408 9.216s17.408 0 17.408-9.216l425.984-392.192 128 119.808-221.184 204.8 76.8 67.584c8.192 9.216 8.192 9.216 16.384 9.216 9.216 0 17.408 0 17.408-9.216l273.408-256c25.6-8.192 25.6-25.6 16.384-33.792z" fill="%23fff"></path></svg> Edit</span>',
                    'href'  => admin_url( 'post.php?post_id=' . tdb_state_template::get_wp_query()->post->ID . '&td_action=tdc&' . $urlFromId . '&tdbTemplateType=' . tdb_state_template::get_template_type() . '&prev_url=' . rawurlencode( tdc_util::get_current_url() ) ),
                    'meta'  => array(
                        'title' => 'Edit the template!'
                    ),
                )
            );

            if ( 'single' === tdb_state_template::get_template_type() ) {

                $td_post_theme_settings = td_util::get_post_meta_array( $tdbLoadDataFromId, 'td_post_theme_settings' );
                if ( empty( $td_post_theme_settings[ 'td_post_template' ] ) ) {

                    $default_template_id = td_util::get_option( 'td_default_site_post_template' );
                    if ( td_global::is_tdb_template( $default_template_id, true ) ) {
                        $default_template_id = td_global::tdb_get_template_id( $default_template_id );
                        $current_template    = '<span class="tdb-template-el-global-checked">Global</span> ' . get_the_title( $default_template_id );
                    } else {

                        if ( empty( $default_template_id ) ) {
                            $default_template_id = 'DEFAULT';
                        }
                        $current_template = '<span class="tdb-template-el-global-checked">Global</span> ' . $default_template_id;
                    }

                } else {
                    $current_template = get_the_title( tdb_state_template::get_wp_query()->post->ID );
                }

                $wp_admin_bar->add_menu(
                    array(
                        'id'    => 'tdb_template_single',
                        'title' => $current_template . '<span class="td-mobile-title">Template</span>',
                        'href'  => '#',
                        'meta'  => array(
                            'title' => 'Current Single Template',
                            'class' => 'singleid-' . $tdbLoadDataFromId
                        ),
                    )
                );

            } else if ( 'category' === tdb_state_template::get_template_type() ) {

                td_show_category_template_menu();

            } else if ( 'date' === tdb_state_template::get_template_type() ) {

                td_show_template_menu('date');

            } else if ( 'search' === tdb_state_template::get_template_type() ) {

                td_show_template_menu('search');

            } else if ( 'attachment' === tdb_state_template::get_template_type() ) {

                td_show_template_menu('attachment');

            } else if ( 'author' === tdb_state_template::get_template_type() ) {

                td_show_author_template_menu();

            } else if ( 'tag' === tdb_state_template::get_template_type() ) {

                td_show_tag_template_menu();

            } else if ( 'woo_product' === tdb_state_template::get_template_type()) {

                td_show_woo_product_template_menu();

            } else if ( 'woo_archive' === tdb_state_template::get_template_type() ) {

                td_show_woo_archive_template_menu();

            } else if ( 'woo_search_archive' === tdb_state_template::get_template_type()) {

                td_show_woo_search_archive_template_menu();

            } else if ( 'woo_shop_base' === tdb_state_template::get_template_type()) {

                td_show_woo_shop_base_template_menu();

            } else if ( 'cpt' === tdb_state_template::get_template_type() ) {

                td_show_cpt_template_menu(tdb_state_content::get_wp_query()->post->post_type);

            } else if ( 'cpt_tax' === tdb_state_template::get_template_type() ) {

                if ( isset( tdb_state_content::get_wp_query()->queried_object ) ) {
                    $term = tdb_state_content::get_wp_query()->queried_object;
                } else {
                    $term = get_term_by('slug', tdb_state_content::get_wp_query()->get('term'), tdb_state_content::get_wp_query()->get('taxonomy') );
                }

                if (!empty($term)) {
                    td_show_cpt_tax_template_menu($term);
                }
            }

            //var_dump(tdb_state_template::get_template_type()); die;
            // Add cloud library menu link
            $class_menu_item = '';

            if ( 'woo_product' === tdb_state_template::get_template_type() && (function_exists('is_product') && is_product()) ) {
                $class_menu_item = 'woo_productid-' . $post->ID;

            } else if ( 'woo_archive' === tdb_state_template::get_template_type() || ( ( function_exists('is_product_category') && is_product_category() ) || ( function_exists( 'is_product_tag' ) && is_product_tag() ) ) ) {
                $class_menu_item = 'woo_archive';

            } else if ( 'single' === tdb_state_template::get_template_type() || 'single' === tdb_state_template::get_template_type() || is_singular( 'post' ) ) {
                $class_menu_item = 'singleid-' . $post->ID;

            } else if ( 'category' === tdb_state_template::get_template_type() || 'category' === tdb_state_template::get_template_type() || is_category() ) {
                $queried_object = get_queried_object();
                if ( $queried_object instanceof WP_Term ) {
                    $class_menu_item = 'categoryid-' . $queried_object->term_id;
                }

            } else if ( '404' === tdb_state_template::get_template_type() || is_404() ) {
                $class_menu_item = '404';

            } else if ( 'date' === tdb_state_template::get_template_type() || is_date() ) {
                $class_menu_item = 'date';

            } else if (( 'woo_search_archive' === tdb_state_template::get_template_type() || is_search() ) && ( $wp_query->get( 'wc_query' ) )) {
                $class_menu_item = 'woo_search_archive';

            } else if (( 'search' === tdb_state_template::get_template_type() || is_search() ) && ( ! $wp_query->get( 'wc_query' ) )) {
                $class_menu_item = 'search';

            } else if ( 'attachment' === tdb_state_template::get_template_type() || is_singular( 'attachment' ) ) {
                $class_menu_item = 'attachment';

            } else if ( 'author' === tdb_state_template::get_template_type() || is_author() ) {
                $queried_object = get_queried_object();
                if ( $queried_object instanceof WP_User ) {
                    $class_menu_item = 'authorid-' . $queried_object->ID;
                }

            } else if ( 'tag' === tdb_state_template::get_template_type() || 'tag' === tdb_state_template::get_template_type() || is_tag() ) {
                $queried_object = get_queried_object();
                if ( $queried_object instanceof WP_Term ) {
                    $class_menu_item = 'tagid-' . $queried_object->term_id;
                }
            }

            if ( ! empty( $class_menu_item ) ) {
                $wp_admin_bar->add_menu(
                    array(
                        'id'    => 'tdb_template_load',
                        'title' => 'Cloud Library<span class="td-mobile-title">Cloud</span>',
                        'href'  => '#',
                        'meta'  => array(
                            'title' => 'Load template from TagDiv Cloud Library',
                            'class' => $class_menu_item
                        ),
                    )
                );
            }

        } elseif ( tdb_state_template::has_wp_query() ) {

            $tdb_template_type = get_post_meta($post->ID, 'tdb_template_type', true);
            if ( '404' === $tdb_template_type || is_404()) {

                if ( is_404() && ( empty(tdb_state_template::get_wp_query()->post->ID) || ! get_post(tdb_state_template::get_wp_query()->post->ID) instanceof WP_Post ) ) {
                    $wp_admin_bar->add_menu(
                        array(
                            'id'    => 'tdb_template_builder_disabled',
                            'title' => 'Edit with TagDiv Composer<span class="td-mobile-title"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1536 1024"><path d="M1518.592 537.6l-494.592 460.8c-8.192 8.192-25.6 17.408-43.008 17.408-16.384 0-25.6-9.216-41.984-17.408l-171.008-171.008-179.2 171.008c-8.192 8.192-25.6 17.408-43.008 17.408-16.384 0-25.6-9.216-41.984-17.408l-486.4-460.8c-25.6-17.408-25.6-51.2 0-68.608l494.592-451.584c8.192-9.216 17.408-17.408 33.792-17.408 17.408 0 25.6 8.192 43.008 17.408l179.2 161.792 179.2-161.792c8.192-9.216 25.6-17.408 43.008-17.408 16.384 0 25.6 8.192 41.984 17.408l495.616 451.584c16.384 17.408 16.384 51.2-9.216 68.608zM1288.192 486.4l-272.384-256c-9.216-8.192-9.216-8.192-17.408-8.192s-17.408 0-17.408 8.192l-425.984 392.192-137.216-118.784 230.4-214.016-84.992-59.392c0-8.192-8.192-8.192-17.408-8.192-8.192 0-16.384 0-16.384 8.192l-273.408 256c-17.408 8.192-17.408 25.6-8.192 33.792l272.384 256c9.216 9.216 9.216 9.216 17.408 9.216s17.408 0 17.408-9.216l425.984-392.192 128 119.808-221.184 204.8 76.8 67.584c8.192 9.216 8.192 9.216 16.384 9.216 9.216 0 17.408 0 17.408-9.216l273.408-256c25.6-8.192 25.6-25.6 16.384-33.792z" fill="%23fff"></path></svg> Edit</span>',
                            'href'  => '#',
                            'meta'  => array(
                                'title' => 'Please select a tagDiv Builder template.'
                            ),
                        )
                    );
                } else {
                    // edit template
                    $wp_admin_bar->add_menu(
                        array(
                            'id'    => 'tdb_template_builder',
                            'title' => 'Edit with TagDiv Composer<span class="td-mobile-title"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1536 1024"><path d="M1518.592 537.6l-494.592 460.8c-8.192 8.192-25.6 17.408-43.008 17.408-16.384 0-25.6-9.216-41.984-17.408l-171.008-171.008-179.2 171.008c-8.192 8.192-25.6 17.408-43.008 17.408-16.384 0-25.6-9.216-41.984-17.408l-486.4-460.8c-25.6-17.408-25.6-51.2 0-68.608l494.592-451.584c8.192-9.216 17.408-17.408 33.792-17.408 17.408 0 25.6 8.192 43.008 17.408l179.2 161.792 179.2-161.792c8.192-9.216 25.6-17.408 43.008-17.408 16.384 0 25.6 8.192 41.984 17.408l495.616 451.584c16.384 17.408 16.384 51.2-9.216 68.608zM1288.192 486.4l-272.384-256c-9.216-8.192-9.216-8.192-17.408-8.192s-17.408 0-17.408 8.192l-425.984 392.192-137.216-118.784 230.4-214.016-84.992-59.392c0-8.192-8.192-8.192-17.408-8.192-8.192 0-16.384 0-16.384 8.192l-273.408 256c-17.408 8.192-17.408 25.6-8.192 33.792l272.384 256c9.216 9.216 9.216 9.216 17.408 9.216s17.408 0 17.408-9.216l425.984-392.192 128 119.808-221.184 204.8 76.8 67.584c8.192 9.216 8.192 9.216 16.384 9.216 9.216 0 17.408 0 17.408-9.216l273.408-256c25.6-8.192 25.6-25.6 16.384-33.792z" fill="%23fff"></path></svg> Edit</span>',
                            'href'  => admin_url( 'post.php?post_id=' . tdb_state_template::get_wp_query()->post->ID . '&td_action=tdc&tdbTemplateType=' . tdb_state_template::get_template_type() . '&prev_url=' . rawurlencode( tdc_util::get_current_url() ) ),
                            'meta'  => array(
                                'title' => 'Edit the ' . tdb_state_template::get_template_type() . ' template.'
                            ),
                        )
                    );
                }

                td_show_template_menu('404');

            } else if ( 'footer' !== $tdb_template_type ) {

	            // edit template
	            $wp_admin_bar->add_menu(
		            array(
			            'id'    => 'tdb_template_builder',
			            'title' => 'Edit with TagDiv Composer<span class="td-mobile-title"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1536 1024"><path d="M1518.592 537.6l-494.592 460.8c-8.192 8.192-25.6 17.408-43.008 17.408-16.384 0-25.6-9.216-41.984-17.408l-171.008-171.008-179.2 171.008c-8.192 8.192-25.6 17.408-43.008 17.408-16.384 0-25.6-9.216-41.984-17.408l-486.4-460.8c-25.6-17.408-25.6-51.2 0-68.608l494.592-451.584c8.192-9.216 17.408-17.408 33.792-17.408 17.408 0 25.6 8.192 43.008 17.408l179.2 161.792 179.2-161.792c8.192-9.216 25.6-17.408 43.008-17.408 16.384 0 25.6 8.192 41.984 17.408l495.616 451.584c16.384 17.408 16.384 51.2-9.216 68.608zM1288.192 486.4l-272.384-256c-9.216-8.192-9.216-8.192-17.408-8.192s-17.408 0-17.408 8.192l-425.984 392.192-137.216-118.784 230.4-214.016-84.992-59.392c0-8.192-8.192-8.192-17.408-8.192-8.192 0-16.384 0-16.384 8.192l-273.408 256c-17.408 8.192-17.408 25.6-8.192 33.792l272.384 256c9.216 9.216 9.216 9.216 17.408 9.216s17.408 0 17.408-9.216l425.984-392.192 128 119.808-221.184 204.8 76.8 67.584c8.192 9.216 8.192 9.216 16.384 9.216 9.216 0 17.408 0 17.408-9.216l273.408-256c25.6-8.192 25.6-25.6 16.384-33.792z" fill="%23fff"></path></svg> Edit</span>',
			            'href'  => admin_url( 'post.php?post_id=' . tdb_state_template::get_wp_query()->post->ID . '&td_action=tdc&tdbTemplateType=' . tdb_state_template::get_template_type() . '&prev_url=' . rawurlencode( tdc_util::get_current_url() ) ),
			            'meta'  => array(
				            'title' => 'Edit the ' . tdb_state_template::get_template_type() . ' template.'
			            ),
		            )
	            );

            }

        } elseif (
            ( is_singular() && ! is_admin() ) ||
            is_singular( 'attachment' ) ||
            ( is_tax() && ! is_admin() ) ||
            ( is_category() && ! is_admin() ) ||
            ( is_author() && ! is_admin() ) ||
            ( is_search() && ! is_admin() ) ||
            ( is_date() && ! is_admin() ) ||
            ( is_tag() && ! is_admin() ) ||
            ( function_exists('is_product') && is_product() && ! is_admin() ) ||
            ( ( ( function_exists('is_product_category') && is_product_category() ) || ( function_exists( 'is_product_tag' ) && is_product_tag() ) || ( is_tax() && function_exists( 'taxonomy_is_product_attribute' ) && taxonomy_is_product_attribute( $wp_query->get( 'taxonomy' ) ) ) ) && ! is_admin() ) ||
            ( function_exists('is_shop') && is_shop() && ! is_admin() ) ||
            is_404()
        ) {

	        // Important! product first - because is_single

            if ( function_exists('is_product') && is_product() ) {
                td_show_woo_product_template_menu();

            } else if ( ( function_exists('is_product_category') && is_product_category() ) || ( function_exists( 'is_product_tag' ) && is_product_tag() ) || ( is_tax() && function_exists( 'taxonomy_is_product_attribute' ) && taxonomy_is_product_attribute( $wp_query->get( 'taxonomy' ) ) ) ) {
	            td_show_woo_archive_template_menu();

            } else if ( is_search() && $wp_query->get( 'wc_query' ) ) {
                td_show_woo_search_archive_template_menu();

            } else if ( function_exists('is_shop') && is_shop() ) {
                td_show_woo_shop_base_template_menu();

            } else if ( is_single() ) {

                $current_template = '';

                // display cloud templates for cpt in admin bar, even if global template is not set
                if ( $post->post_type !== 'post' ) {
                    td_show_cpt_template_menu($post->post_type);
                } else {
                    $td_post_theme_settings = td_util::get_post_meta_array($post->ID, 'td_post_theme_settings');
                    if (empty($td_post_theme_settings) || empty($td_post_theme_settings['td_post_template'])) {
                        $current_template = '<span class="tdb-template-el-global-checked">Global</span> STANDARD - ';
                        $default_template_id = td_util::get_option( 'td_default_site_post_template' );
                        if ( empty($default_template_id )) {
                            $current_template .= 'DEFAULT';
                        } else {
                            $current_template .= $default_template_id;
                        }
                    } else if ( !empty($td_post_theme_settings['td_post_template'])){
                        $current_template = $td_post_theme_settings['td_post_template'];
                    }

                    if ( !empty($current_template)) {

                        $wp_admin_bar->add_menu(
                            array(
                                'id'    => 'tdb_template_single',
                                'title' => $current_template . '<span class="td-mobile-title">Template</span>',
                                'href'  => '#',
                                'meta'  => array(
                                    'title' => 'Current Standard Template',
                                    'class' => 'singleid-' . $post->ID
                                ),
                            )
                        );

                        $wp_admin_bar->add_menu(
                            array(
                                'id'    => 'tdb_template_load',
                                'title' => 'Cloud Library<span class="td-mobile-title">Cloud</span>',
                                'href'  => '#',
                                'meta'  => array(
                                    'title' => 'Load template from TagDiv Cloud Library',
                                    'class' => 'singleid-' . $post->ID
                                ),
                            )
                        );
                    }
                }

            } else if (is_category()) {
                td_show_category_template_menu();
            } else if (is_tax()) {
                $term = get_queried_object();
                if( isset($term->taxonomy) ) {
                td_show_cpt_tax_template_menu($term);
                }
            } else if (is_404()) {
                td_show_template_menu('404');
            } else if (is_date()) {
                td_show_template_menu('date');
            } else if (is_search()) {
                td_show_template_menu('search');
            } else if (is_attachment()) {
                td_show_template_menu('attachment');
            } else if (is_author()) {
                td_show_author_template_menu();
            } else if (is_tag()) {
                td_show_tag_template_menu();
            }
        }
    }
}

function td_show_category_template_menu() {
    global $wp_admin_bar;

    $global_title = '';
    $category_id = '';
    $is_global = false;
    $is_tdb_template = false;

    $template_id = td_api_category_template::get_current_category_template( $category_id,$is_global, $is_tdb_template );
    if ( $is_tdb_template ) {
        if ( $is_global ) {
            $global_title = '<span class="tdb-template-el-global-checked">Global</span> ';
        }
    } else {
        if ( $is_global ) {
            $global_title = '<span class="tdb-template-el-global-checked">Global</span> ';
        }
    }

    if ( empty( $template_id ) ) {
        $template_name = 'Category Template 1';
    } else if ( 0 === strpos( $template_id, 'td_category_template_' ) ) {
        $template_name = 'Category Template ' . str_replace('td_category_template_', '', $template_id );
    } else {
        $template_name = get_the_title( $template_id );
    }

    $current_template = $global_title . $template_name;

    if ( !empty( $current_template ) ) {

        $wp_admin_bar->add_menu(
            array(
                'id'    => 'tdb_template_category',
                'title' => $current_template . '<span class="td-mobile-title">Template</span>',
                'href'  => '#',
                'meta'  => array(
                    'title' => 'Current Category Template',
                    'class' => 'categoryid-' . $category_id
                ),
            )
        );

        $wp_admin_bar->add_menu(
            array(
                'id'    => 'tdb_template_load',
                'title' => 'Cloud Library<span class="td-mobile-title">Cloud</span>',
                'href'  => '#',
                'meta'  => array(
                    'title' => 'Load template from TagDiv Cloud Library',
                    'class' => 'categoryid-' . $category_id
                ),
            )
        );
    }
}

function td_show_author_template_menu() {
    global $wp_admin_bar;

    $is_global = false;
    $is_tdb_template = false;

    $queried_object = get_queried_object();
    if ( $queried_object instanceof WP_User ) {

        $global_title = '';
        $author_id = $queried_object->ID;
        $lang = '';
        if (class_exists('SitePress', false)) {
            global $sitepress;
            $sitepress_settings = $sitepress->get_settings();
            if ( isset($sitepress_settings['custom_posts_sync_option'][ 'tdb_templates']) ) {
                $translation_mode = (int)$sitepress_settings['custom_posts_sync_option']['tdb_templates'];
                if (1 === $translation_mode) {
                    $lang = $sitepress->get_current_language();
                }
            }
        }

        $option_id = 'tdb_author_templates' . $lang;
        $tdb_author_templates = td_util::get_option( $option_id );

        $tdb_individual_author_template = $tdb_author_templates[$author_id];

        if ( empty( $tdb_individual_author_template ) ) {
            $is_global = true;

            $tdb_author_template = td_util::get_option( 'tdb_author_template' );
            if ( !empty( $tdb_author_template ) && td_global::is_tdb_template( $tdb_author_template, true ) ) {
                $is_tdb_template = true;
                $template_id = td_global::tdb_get_template_id( $tdb_author_template );
            } else {
                $template_id = td_util::get_option( 'tds_author_page_layout' );
            }

        } else {

	        if ( td_global::is_tdb_template( $tdb_individual_author_template, true ) ) {
		        $is_tdb_template = true;
		        $template_id = td_global::tdb_get_template_id( $tdb_individual_author_template );
	        } else {
		        $template_id = td_util::get_option( 'tds_author_page_layout' );
	        }

        }


        if ( $is_global ) {
            $global_title = '<span class="tdb-template-el-global-checked">Global</span> ';
        }

        if ( $is_tdb_template) {
            $template_name = get_the_title( $template_id );
        } else {
            $template_name = 'Author Template ' . $template_id;
        }

        $current_template = $global_title . $template_name;

        if ( !empty( $current_template ) ) {

            $wp_admin_bar->add_menu(
                array(
                    'id'    => 'tdb_template_author',
                    'title' => $current_template . '<span class="td-mobile-title">Template</span>',
                    'href'  => '#',
                    'meta'  => array(
                        'title' => 'Current Author Template',
                        'class' => 'authorid-' . $author_id
                    ),
                )
            );

            $wp_admin_bar->add_menu(
                array(
                    'id'    => 'tdb_template_load',
                    'title' => 'Cloud Library<span class="td-mobile-title">Cloud</span>',
                    'href'  => '#',
                    'meta'  => array(
                        'title' => 'Load template from TagDiv Cloud Library',
                        'class' => 'authorid-' . $author_id
                    ),
                )
            );
        }
    }
}

function td_show_tag_template_menu() {
    global $wp_admin_bar;

    $is_global = false;
    $is_tdb_template = false;

    $queried_object = get_queried_object();
    if ( $queried_object instanceof WP_Term ) {

        $global_title = '';
        $lang = '';
        if (class_exists('SitePress', false)) {
            global $sitepress;
            $sitepress_settings = $sitepress->get_settings();
            if ( isset($sitepress_settings['custom_posts_sync_option'][ 'tdb_templates']) ) {
                $translation_mode = (int)$sitepress_settings['custom_posts_sync_option']['tdb_templates'];
                if (1 === $translation_mode) {
                    $lang = $sitepress->get_current_language();
                }
            }
        }

        $option_id = 'tdb_tag_templates' . $lang;

        $tdb_tag_templates = td_options::get( $option_id );
        if ( is_array( $tdb_tag_templates ) ) {
            $queried_object = get_queried_object();
            foreach ( $tdb_tag_templates as $tdb_tag_template_id => $tags ) {
	            if ( $queried_object ) {
		            if ( false !== strpos( $tags, $queried_object->slug ) && td_global::is_tdb_template( $tdb_tag_template_id, true ) ) {
			            $is_tdb_template = true;
			            $template_id = td_global::tdb_get_template_id( $tdb_tag_template_id );
		            }
                }
            }
        }

        if ( empty($template_id) ) {

            $is_global = true;
            $lang = '';
            if (class_exists('SitePress', false)) {
                global $sitepress;
                $sitepress_settings = $sitepress->get_settings();
                if ( isset($sitepress_settings['custom_posts_sync_option'][ 'tdb_templates']) ) {
                    $translation_mode = (int)$sitepress_settings['custom_posts_sync_option']['tdb_templates'];
                    if (1 === $translation_mode) {
                        $lang = $sitepress->get_current_language();
                    }
                }
            }

            $option_id = 'tdb_tag_template' . $lang;
            $tdb_tag_template = td_options::get( $option_id );

            if ( td_global::is_tdb_template( $tdb_tag_template, true ) ) {
                $is_tdb_template = true;
                $template_id = td_global::tdb_get_template_id( $tdb_tag_template );
            }
        }

        if ( empty( $template_id )) {
            $template_id = td_options::get('tds_tag_page_layout');
        }


        if ( $is_global ) {
            $global_title = '<span class="tdb-template-el-global-checked">Global</span> ';
        }

        if ( $is_tdb_template) {
            $template_name = get_the_title( $template_id );
        } else {
            $template_name = 'Tag Template ' . $template_id;
        }

        $current_template = $global_title . $template_name;

        if ( !empty($current_template)) {

            $wp_admin_bar->add_menu(
                array(
                    'id'    => 'tdb_template_tag',
                    'title' => $current_template . '<span class="td-mobile-title">Template</span>',
                    'href'  => '#',
                    'meta'  => array(
                        'title' => 'Current Tag Template',
                        'class' => 'tagid-' . $queried_object->term_id
                    ),
                )
            );

            $wp_admin_bar->add_menu(
                array(
                    'id'    => 'tdb_template_load',
                    'title' => 'Cloud Library<span class="td-mobile-title">Cloud</span>',
                    'href'  => '#',
                    'meta'  => array(
                        'title' => 'Load template from TagDiv Cloud Library',
                        'class' => 'tagid-' . $queried_object->term_id
                    ),
                )
            );
        }
    }
}

function td_show_woo_product_template_menu() {

    if ( !defined( 'TD_WOO' ) )
	    return;

	global $wp_admin_bar;

	$template_type = 'woo_product';

    $tdb_option_key = 'tdb_' . $template_type . '_template';

    $post_id = '';

    $queried_object = get_queried_object();
    if ( $queried_object instanceof WP_Post && 'product' === $queried_object->post_type ) {
        $post_id = $queried_object->ID;
        $td_post_theme_settings = td_util::get_post_meta_array( $post_id, 'td_post_theme_settings' );

        $template_id = null;
        if ( ! empty( $td_post_theme_settings[ 'td_post_template' ] ) ) {
            if ( td_global::is_tdb_template( $td_post_theme_settings[ 'td_post_template' ], true ) ) {
	            $template_id = td_global::tdb_get_template_id( $td_post_theme_settings[ 'td_post_template' ] );
            }
        }

        if ( empty( $template_id ) ) {
            $current_template = '<span class="tdb-template-el-global-checked">Global</span>';
            $default_template_id = td_util::get_option( $tdb_option_key );

            if ( td_global::is_tdb_template( $default_template_id, true ) ) {
                $current_template .= ' ' . get_the_title( td_global::tdb_get_template_id( $default_template_id ) );
            } else {
                $current_template .= ' DEFAULT';
            }

        } else {
            $current_template = get_the_title( $template_id );
        }
    }

	if ( ! empty( $current_template ) ) {

		$wp_admin_bar->add_menu(
			array(
				'id'    => 'tdb_template_' . $template_type,
				'title' => $current_template . '<span class="td-mobile-title">Template</span>',
				'href'  => '#',
				'meta'  => array(
					'title' => 'Current Standard Template',
					'class' => $template_type . 'id-' . $post_id
				),
			)
		);

		$wp_admin_bar->add_menu(
			array(
				'id'    => 'tdb_template_load',
				'title' => 'Cloud Library<span class="td-mobile-title">Cloud</span>',
				'href'  => '#',
				'meta'  => array(
					'title' => 'Load template from TagDiv Cloud Library',
					'class' => $template_type . 'id-' . $post_id
				),
			)
		);
	}
}

function td_show_woo_archive_template_menu() {

	if ( !defined( 'TD_WOO' ) )
		return;

    global $wp_admin_bar;

    $queried_object = get_queried_object();

    if ( $queried_object instanceof WP_Term ) {
        $term_id = $queried_object->term_id;

	    switch ( $queried_object->taxonomy ) {
		    case 'product_tag':
			    $tdb_option_key = 'tdb_woo_archive_tag_template';
			    break;
		    case taxonomy_is_product_attribute( $queried_object->taxonomy ):
			    $tdb_option_key = 'tdb_woo_archive_attribute_template';
			    break;
		    case 'product_cat':
		    default:
			    $tdb_option_key = 'tdb_woo_archive_template';
			    break;
	    }

        $tdb_woo_archive_template = get_term_meta( $term_id, $tdb_option_key, true );

        if ( empty( $tdb_woo_archive_template ) ) {
            $current_template = '<span class="tdb-template-el-global-checked">Global</span>';

	        // check for global prod attribute taxonomy template
            if ( $tdb_option_key === 'tdb_woo_archive_attribute_template' ) {

	            // check for global prod attribute taxonomy template
	            $tdb_pa_tax_woo_archive_attribute_template = td_options::get( 'tdb_woo_attribute_' . $queried_object->taxonomy . '_tax_template' );
	            if ( td_global::is_tdb_template( $tdb_pa_tax_woo_archive_attribute_template, true  ) ) {

		            // get the global prod attributes taxonomy tdb template
		            $default_template_id = $tdb_pa_tax_woo_archive_attribute_template;

	            } else {

		            // get the global prod attributes tdb template
		            $default_template_id = td_util::get_option( $tdb_option_key );

	            }

            } else {

	            // get the global tdb template
	            $default_template_id = td_util::get_option( $tdb_option_key );

            }

            if ( empty( $default_template_id ) ) {
                $current_template .= ' DEFAULT';
            } elseif ( td_global::is_tdb_template( $default_template_id, true ) ) {
                $current_template .= ' ' . get_the_title( td_global::tdb_get_template_id( $default_template_id ) );
            }

        } else {
            $current_template = get_the_title( td_global::tdb_get_template_id( $tdb_woo_archive_template ) );
        }
    }

	$template_type = 'woo_archive';
    if ( !empty( $current_template ) ) {

        $wp_admin_bar->add_menu(
            array(
                'id'    => 'tdb_template_' . $template_type,
                'title' => $current_template . '<span class="td-mobile-title">Template</span>',
                'href'  => '#',
                'meta'  => array(
                    'title' => 'Current ' . ucfirst( $template_type ) . ' Template',
                    'class' => $template_type . 'id-' . $term_id
                ),
            )
        );

        $wp_admin_bar->add_menu(
            array(
                'id'    => 'tdb_template_load',
                'title' => 'Cloud Library<span class="td-mobile-title">Cloud</span>',
                'href'  => '#',
                'meta'  => array(
                    'title' => 'Load template from TagDiv Cloud Library',
                    'class' => $template_type . 'id-' . $term_id
                ),
            )
        );
    }
}

function td_show_woo_shop_base_template_menu() {

	if ( !defined( 'TD_WOO' ) )
		return;

    global $wp_admin_bar;

    $global_title = '';
    $is_tdb_template = false;

    $template_type = 'woo_shop_base';

    $tdb_option_key = 'tdb_' . $template_type . '_template';

    $tdb_template = td_util::get_option( $tdb_option_key );

    if ( td_global::is_tdb_template( $tdb_template, true ) ) {
        $template_id = td_global::tdb_get_template_id( $tdb_template );
        $is_tdb_template = true;
    }

    if (empty($template_id)) {
        $template_name = 'Default';
    } else {
        if ( $is_tdb_template ) {
            $template_name = get_the_title( $template_id );
        } else {
            $template_name = ucfirst($template_type) . ' Template ' . $template_id;
        }
    }

    $current_template = $global_title . $template_name;

    if ( !empty($current_template)) {

        $menu_template_id = '';
        if ($is_tdb_template) {
            $menu_template_id = $template_id;
        }

        $wp_admin_bar->add_menu(
            array(
                'id'    => 'tdb_template_' . $template_type,
                'title' => $current_template . '<span class="td-mobile-title">Template</span>',
                'href'  => '#',
                'meta'  => array(
                    'title' => 'Current ' . ucfirst( $template_type ) . ' Template',
                    'class' => 'templateid-' . $menu_template_id
                ),
            )
        );

        $wp_admin_bar->add_menu(
            array(
                'id'    => 'tdb_template_load',
                'title' => 'Cloud Library<span class="td-mobile-title">Cloud</span>',
                'href'  => '#',
                'meta'  => array(
                    'title' => 'Load template from TagDiv Cloud Library',
                    'class' => $template_type
                ),
            )
        );
    }
}

function td_show_woo_search_archive_template_menu() {

	if ( !defined( 'TD_WOO' ) )
		return;

    global $wp_admin_bar;

    $global_title = '';
    $is_tdb_template = false;

    $template_type = 'woo_search_archive';

    $tdb_option_key = 'tdb_' . $template_type . '_template';

    $tdb_template = td_util::get_option( $tdb_option_key );

    if ( td_global::is_tdb_template( $tdb_template, true ) ) {
        $template_id = td_global::tdb_get_template_id( $tdb_template );
        $is_tdb_template = true;
    }

    if (empty($template_id)) {
        $template_name = 'Default';
    } else {
        if ( $is_tdb_template ) {
            $template_name = get_the_title( $template_id );
        } else {
            $template_name = ucfirst($template_type) . ' Template ' . $template_id;
        }
    }

    $current_template = $global_title . $template_name;

    if ( !empty($current_template)) {

        $menu_template_id = '';
        if ($is_tdb_template) {
            $menu_template_id = $template_id;
        }

        $wp_admin_bar->add_menu(
            array(
                'id'    => 'tdb_template_' . $template_type,
                'title' => $current_template . '<span class="td-mobile-title">Template</span>',
                'href'  => '#',
                'meta'  => array(
                    'title' => 'Current ' . ucfirst( $template_type ) . ' Template',
                    'class' => 'templateid-' . $menu_template_id
                ),
            )
        );

        $wp_admin_bar->add_menu(
            array(
                'id'    => 'tdb_template_load',
                'title' => 'Cloud Library<span class="td-mobile-title">Cloud</span>',
                'href'  => '#',
                'meta'  => array(
                    'title' => 'Load template from TagDiv Cloud Library',
                    'class' => $template_type
                ),
            )
        );
    }
}

function td_show_template_menu($template_type) {
    global $wp_admin_bar;

    $global_title = '';
    $is_tdb_template = false;

    $lang = '';
    if (class_exists('SitePress', false)) {
        global $sitepress;
        $sitepress_settings = $sitepress->get_settings();
        if ( isset($sitepress_settings['custom_posts_sync_option'][ 'tdb_templates']) ) {
            $translation_mode = (int)$sitepress_settings['custom_posts_sync_option']['tdb_templates'];
            if (1 === $translation_mode) {
                $lang = $sitepress->get_current_language();
            }
        }
    }

    $tdb_option_key = 'tdb_' . $template_type . '_template' . $lang;
    $tds_option_key = 'tds_' . $template_type . '_page_layout';

    $tdb_template = td_util::get_option( $tdb_option_key );

    if ( td_global::is_tdb_template( $tdb_template, true ) ) {
        $template_id = td_global::tdb_get_template_id( $tdb_template );
        $is_tdb_template = true;
    } else {
        $template_id = td_util::get_option( $tds_option_key );
    }

    if (empty($template_id)) {
        $template_name = ucfirst($template_type) . ' Template 1';
    } else {
        if ( $is_tdb_template ) {
            $template_name = get_the_title( $template_id );
        } else {
            $template_name = ucfirst($template_type) . ' Template ' . $template_id;
        }
    }

    $current_template = $global_title . $template_name;

    if ( !empty($current_template)) {

        $menu_template_id = '';
        if ($is_tdb_template) {
            $menu_template_id = $template_id;
        }

        $wp_admin_bar->add_menu(
            array(
                'id'    => 'tdb_template_' . $template_type,
                'title' => $current_template . '<span class="td-mobile-title">Template</span>',
                'href'  => '#',
                'meta'  => array(
                    'title' => 'Current ' . ucfirst( $template_type ) . ' Template',
                    'class' => 'templateid-' . $menu_template_id
                ),
            )
        );

        $wp_admin_bar->add_menu(
            array(
                'id'    => 'tdb_template_load',
                'title' => 'Cloud Library<span class="td-mobile-title">Cloud</span>',
                'href'  => '#',
                'meta'  => array(
                    'title' => 'Load template from TagDiv Cloud Library',
                    'class' => $template_type
                ),
            )
        );
    }
}

function td_show_cpt_template_menu($template_type) {

    global $wp_admin_bar;

    $global_title = '';
    $is_tdb_template = false;

    $lang = '';
    if ( class_exists('SitePress', false ) ) {
        global $sitepress;
        $sitepress_settings = $sitepress->get_settings();
        if ( isset( $sitepress_settings['custom_posts_sync_option'][ 'tdb_templates'] ) ) {
            $translation_mode = (int)$sitepress_settings['custom_posts_sync_option']['tdb_templates'];
            if ( 1 === $translation_mode ) {
                $lang = $sitepress->get_current_language();
            }
        }
    }

    $td_cpt = td_util::get_option('td_cpt');
    $option_id = 'td_default_site_post_template' . $lang;

    $cpts = td_util::get_cpts();

    $queried_object = get_queried_object();
    if ( $queried_object instanceof WP_Post ) {
        $post_id = $queried_object->ID;
        $td_post_theme_settings = td_util::get_post_meta_array( $post_id, 'td_post_theme_settings' );
        $template_id = null;

        foreach ($cpts as $cpt) {
            if ( ! empty( $td_post_theme_settings[ 'td_post_template' ] ) ) {
                if ( td_global::is_tdb_template( $td_post_theme_settings[ 'td_post_template' ], true ) ) {
                    $template_id = td_global::tdb_get_template_id( $td_post_theme_settings[ 'td_post_template' ] );
                    $is_tdb_template = true;

                }
            } elseif ($template_type === $cpt->name && !empty($td_cpt[$cpt->name][$option_id])) {
                $default_template_id = $td_cpt[$cpt->name][$option_id];

                if ( td_global::is_tdb_template( $default_template_id, true ) ) {
                    $template_id = td_global::tdb_get_template_id( $default_template_id );
                    $global_title = '<span class="tdb-template-el-global-checked">Global</span> ';
                    $is_tdb_template = true;
                }
            }
        }

        if (empty($template_id)) {
            $template_name = strtoupper($template_type) . ' Template Default';
        } else {
            if ( $is_tdb_template ) {
                $template_name = get_the_title( $template_id );
            } else {
                $template_name = strtoupper($template_type) . ' Template ' . $template_id;
            }
        }
    }

    $current_template = $global_title . $template_name;

    if ( !empty($current_template)) {

        $menu_template_id = '';
        if ($is_tdb_template) {
            $menu_template_id = $template_id;
        }

        $wp_admin_bar->add_menu(
            array(
                'id'    => 'tdb_template_cpt',
                'title' => $current_template . '<span class="td-mobile-title">Template</span>',
                'href'  => '#',
                'meta'  => array(
                    'title' => 'Current ' . strtoupper( $template_type ) . ' Template',
                    'class' => 'cptid-' . $post_id
                ),
            )
        );

        $wp_admin_bar->add_menu(
            array(
                'id'    => 'tdb_template_load',
                'title' => 'Cloud Library<span class="td-mobile-title">Cloud</span>',
                'href'  => '#',
                'meta'  => array(
                    'title' => 'Load template from TagDiv Cloud Library',
                    'class' => 'cptid-' . $post_id
                ),
            )
        );
    }
}

function td_show_cpt_tax_template_menu($term) {

    global $wp_admin_bar;

    $global_title = '';
    $is_tdb_template = false;

    $lang = '';
    if ( class_exists('SitePress', false ) ) {
        global $sitepress;
        $sitepress_settings = $sitepress->get_settings();
        if ( isset( $sitepress_settings['custom_posts_sync_option'][ 'tdb_templates'] ) ) {
            $translation_mode = (int)$sitepress_settings['custom_posts_sync_option']['tdb_templates'];
            if ( 1 === $translation_mode ) {
                $lang = $sitepress->get_current_language();
            }
        }
    }

    $td_cpt_tax = td_util::get_option('td_cpt_tax');
    $option_id = 'tdb_category_template' . $lang;
    $tdb_individual_cpt_tax_template = get_term_meta( $term->term_id, $option_id, true );

    $ctaxes = td_util::get_ctaxes();

    foreach ($ctaxes as $ctax) {

        if ( !empty( $tdb_individual_cpt_tax_template ) ) {

            $template_id = td_global::tdb_get_template_id($tdb_individual_cpt_tax_template);
            $is_tdb_template = true;

        } elseif ($ctax->name === $term->taxonomy && !empty($td_cpt_tax[$ctax->name][$option_id])) {
                $default_template_id = $td_cpt_tax[$ctax->name][$option_id];
                if (td_global::is_tdb_template($default_template_id, true)) {
                    $template_id = td_global::tdb_get_template_id($default_template_id);
                    $global_title = '<span class="tdb-template-el-global-checked">Global</span> ';

                    $is_tdb_template = true;
                }
        }
    }

    if (empty($template_id)) {
        $template_name = strtoupper($term->taxonomy) . ' Template Default';
    } else {
        if ( $is_tdb_template ) {
            $template_name = get_the_title( $template_id );
        } else {
            $template_name = strtoupper($term->taxonomy) . ' Template ' . $template_id;
        }
    }

    $current_template = $global_title . $template_name;

    if ( !empty($current_template)) {

        $menu_template_id = '';
        if ($is_tdb_template) {
            $menu_template_id = $template_id;
        }

        $wp_admin_bar->add_menu(
            array(
                'id'    => 'tdb_template_cpt_tax',
                'title' => $current_template . '<span class="td-mobile-title">Template</span>',
                'href'  => '#',
                'meta'  => array(
                    'title' => 'Current ' . strtoupper( $term->taxonomy ) . ' Template',
                    'class' => 'templateid-' . $term->term_id
                ),
            )
        );

        $wp_admin_bar->add_menu(
            array(
                'id'    => 'tdb_template_load',
                'title' => 'Cloud Library<span class="td-mobile-title">Cloud</span>',
                'href'  => '#',
                'meta'  => array(
                    'title' => 'Load template from TagDiv Cloud Library',
                    'class' => 'cpt_tax'
                ),
            )
        );
    }
}

// add the load template button on the welcome screen of td-composer
add_action('tdc_welcome_panel_text', function() {
    if (tdc_util::get_get_val('tdbTemplateType') !== false) {
	    ?>
        <div class="tdc-start-tips">
            <p>OR</p>
        </div>
        <div class="tdc-sidebar-w-button tdb-load-template" title="Import Pre-designed Templates from tagDiv Cloud Library">Load Template</div>
        <?php
    }
});



add_action('admin_footer', 'tdb_on_wp_admin_footer');
function tdb_on_wp_admin_footer () {
    include_once( plugin_dir_path(__FILE__) . 'tdb_template_import.php');
}

if (is_user_logged_in()) {
	add_action( 'wp_footer', 'tdb_on_wp_admin_footer1' );
	function tdb_on_wp_admin_footer1() {
		require_once( plugin_dir_path(__FILE__) . 'tdb_template_import.php' );
	}
}


if (!empty($_GET['tdbTemplateType'])) {
    $tdbTemplateType = @$_GET['tdbTemplateType'];
}
if (!empty($_GET['post_type'])) {
    $post_type = @$_GET['post_type'];
}

if ( ! empty( $tdbTemplateType ) ||
     ( ! empty( $post_type ) && ( 'tdb_templates' === $post_type || 'page' === $post_type ) ) ||
     ( isset( $_GET['page'] ) && ( $_GET['page'] === 'td_theme_welcome' || $_GET['page'] === 'tdb_cloud_templates' || $_GET['page'] === 'td_theme_demos' || $_GET['page'] === 'td_theme_updates' || $_GET['page'] === 'td_licence_panel' ) ) ) {

    // enqueue for wp-admin
	add_action( 'admin_enqueue_scripts', function () {

		// load the css
		if ( TDB_DEPLOY_MODE == 'dev' ) {
			wp_enqueue_style( 'tdb_wp_admin', TDB_URL . '/td_less_style.css.php?part=wp_admin_main', false, TD_CLOUD_LIBRARY );
		} else {
			wp_enqueue_style( 'tdb_wp_admin', TDB_URL . '/assets/css/tdb_wp_admin.css', false, TD_CLOUD_LIBRARY );
		}

		// load the vue modal js
		if ( TDB_DEPLOY_MODE == 'dev' ) {
			tdb_util::enqueue_js_files_array( tdb_config::$js_files_vue_modals, array( 'jquery', 'underscore' ) );
		} else {
			wp_enqueue_script( 'tdb_js_files_vue_modals', TDB_URL . '/assets/js/js_files_vue_modals.min.js', array(
				'jquery',
				'underscore'
			), TD_CLOUD_LIBRARY, true );
		}

	}, 1011 ); // load them last after td-composer

    //enqueue files that must go at the end
    add_action( 'admin_enqueue_scripts', function () {

        if ( TDB_DEPLOY_MODE == 'dev' ) {
            tdb_util::enqueue_js_files_array( tdb_config::$js_files_vue_modals_last, array( 'jquery', 'underscore' ) );
        } else {
            wp_enqueue_script( 'js_files_vue_modals_last', TDB_URL . '/assets/js/js_files_vue_modals_last.min.js', array(
                'jquery',
                'underscore'
            ), TD_CLOUD_LIBRARY, true );
        }

    }, 1012 );
}



if (is_user_logged_in()) {

    // enqueue for wp-admin
	add_action( 'wp_enqueue_scripts', function () {

		// load the css
		if ( TDB_DEPLOY_MODE == 'dev' ) {
			wp_enqueue_style( 'tdb_wp_admin', TDB_URL . '/td_less_style.css.php?part=wp_admin_main', false, TD_CLOUD_LIBRARY );
		} else {
			wp_enqueue_style( 'tdb_wp_admin', TDB_URL . '/assets/css/tdb_wp_admin.css', false, TD_CLOUD_LIBRARY );
		}

		// load the vue modal js
		if ( TDB_DEPLOY_MODE == 'dev' ) {
			tdb_util::enqueue_js_files_array( tdb_config::$js_files_vue_modals, array( 'jquery', 'underscore' ) );
		} else {
			wp_enqueue_script( 'tdb_js_files_vue_modals', TDB_URL . '/assets/js/js_files_vue_modals.min.js', array(
				'jquery',
				'underscore'
			), TD_CLOUD_LIBRARY, true );
		}

	}, 11 ); // load them last after td-composer

	//enqueue files that must go at the end
	add_action( 'wp_enqueue_scripts', function () {

		if ( TDB_DEPLOY_MODE == 'dev' ) {
			tdb_util::enqueue_js_files_array( tdb_config::$js_files_vue_modals_last, array( 'jquery', 'underscore' ) );
		} else {
			wp_enqueue_script( 'js_files_vue_modals_last', TDB_URL . '/assets/js/js_files_vue_modals_last.min.js', array(
				'jquery',
				'underscore'
			), TD_CLOUD_LIBRARY, true );
		}

	}, 12 );
}


// enqueue files that must go at the end
add_action( 'admin_enqueue_scripts', function () {

	// load cloud templates vue js/css
	if ( isset( $_GET['page'] ) && $_GET['page'] === 'tdb_cloud_templates' ) {

		if ( TDB_DEPLOY_MODE == 'dev' ) {
			tdb_util::enqueue_js_files_array( tdb_config::$js_files_vue_cloud_templates, array( 'jquery', 'underscore' ) );
			wp_enqueue_style( 'tdb_style_cloud_templates', TDB_URL . '/td_less_style.css.php?part=wp_admin_cloud_templates', false, TD_CLOUD_LIBRARY );
		} else {
			wp_enqueue_script( 'tdb_js_files_vue_cloud_templates', TDB_URL . '/assets/js/js_files_vue_cloud_templates.min.js', array( 'jquery', 'underscore' ), TD_CLOUD_LIBRARY, true );
			wp_enqueue_style( 'tdb_style_cloud_templates', TDB_URL . '/assets/css/tdb_wp_admin_cloud_templates.css', false, TD_CLOUD_LIBRARY );
		}

	}

    // wp admin js files
    if ( TDB_DEPLOY_MODE == 'dev' ) {
        tdb_util::enqueue_js_files_array( tdb_config::$js_files_wp_admin, array( 'jquery', 'underscore' ) );
    } else {
        if ( !empty( $_GET['action'] ) && 'update-selected-themes' === @$_GET['action'] ) {
            return;
        }
        wp_enqueue_script( 'tdb_js_files_for_wp_admin', TDB_URL . '/assets/js/js_files_wp_admin.min.js', array(
            'jquery',
            'underscore'
        ), TD_CLOUD_LIBRARY, true );
    }

	// Vue files theme panel
	if ( isset( $_GET['page'] ) && $_GET['page'] === 'td_theme_panel' ) {
		if ( TDB_DEPLOY_MODE == 'dev' ) {
			tdb_util::enqueue_js_files_array( tdb_config::$js_files_vue_theme_panel, array( 'jquery', 'underscore' ) );
		} else {
			wp_enqueue_script( 'tdb_js_files_vue_theme_panel', TDB_URL . '/assets/js/js_files_vue_theme_panel.min.js', array(
				'jquery',
				'underscore'
			), TD_CLOUD_LIBRARY, true );
		}
	}

}, 1012 );


// enqueue for front
add_action( 'wp_enqueue_scripts', function () {

    if ( td_util::is_mobile_theme() ) {
        return;
    }

    // load the css
    if ( TDB_DEPLOY_MODE == 'dev' ) {
        wp_enqueue_style( 'tdb_style_cloud_templates_front', TDB_URL . '/td_less_style.css.php?part=tdb_main', false, TD_CLOUD_LIBRARY );
    } else {
        wp_enqueue_style( 'tdb_style_cloud_templates_front', TDB_URL . '/assets/css/tdb_main.css', false, TD_CLOUD_LIBRARY );
    }

    // load the js
    if ( TDB_DEPLOY_MODE == 'dev' ) {
        tdb_util::enqueue_js_files_array( tdb_config::$js_files_for_front, array( 'jquery' ) );
    } else {
        wp_enqueue_script( 'tdb_js_files_for_front', TDB_URL . '/assets/js/js_files_for_front.min.js', array( 'jquery' ), TD_CLOUD_LIBRARY, true );
    }

    $gm_api_key = td_util::get_gm_api_key();
    if( $gm_api_key != '' ) {
        wp_enqueue_script( 'tdb_js_google_maps_api', 'https://maps.googleapis.com/maps/api/js?key=' . $gm_api_key . '&libraries=places', array( 'jquery' ), TD_CLOUD_LIBRARY, true );
    }

}, 1011 ); // load them last after td-composer


/**
 * Patch the theme panel and metaboxes with our builder templates.
 * Here we add the templates to the API so that we can see them in the panels
 */
function tdb_patch_panel() {
    if (is_admin()) {

        /**
         * patch single templates
         */
        $args = array(
            'post_type' => array('tdb_templates'),
            'meta_query' => array(
                array(
                    'key'     => 'tdb_template_type',
                    'value'   => 'single',
                ),
            ),
            'posts_per_page' => '-1'
        );

        if (class_exists('SitePress', false )) {

            // WPML bug - it doesn't use all the time 'suppress_filters' param (@see WPML forums)
            $args['suppress_filters'] = false;
        }

        /**
         * @var WP_Query
         */
        $wp_query_templates = new WP_Query( $args );

        if (!empty($wp_query_templates->posts)) {

            /**
             * @var $post WP_Post
             */
            foreach ($wp_query_templates->posts as $post) {

                if ( class_exists('SitePress', false )) {
                    global $sitepress;
                    $check = wpml_get_language_information( null, $post->ID );

                    if ( ! is_wp_error( $check )) {
                        $post_language_code =  $check['language_code'];

	                    if ( $post_language_code != $sitepress->get_current_language() ) {
		                    continue;
	                    }
                    }
                }

                // tdb_ is used as a prefix to filter it out in theme panel and show it only on post settings
                // why? we have to use the prefix to identify templates even when this plugin is off to load the default theme template in that case
                td_api_single_template::add('tdb_template_' . $post->ID,
                    array(
                        'file' => '',
                        'text' => $post->post_title,
                        'img' => TDB_URL . '/assets/images/single_template_placeholder.png',
                        'template_id' => $post->ID, // this key is used only on custom templates
                        'show_featured_image_on_all_pages' => false,
                        'bg_disable_background' => false,          // disable the featured image
                        'bg_box_layout_config' => 'auto',                // auto | td-boxed-layout | td-full-layout
                        'bg_use_featured_image_as_background' => false,   // uses the featured image as a background
                        'exclude_ad_content_top' => false,
                        'is_mobile_template' => get_post_meta( $post->ID, 'tdc_is_mobile_template', true)
                    )
                );
            }
        }
    }
}
tdb_patch_panel();


/**
 * remove comment form nonce on composer frame
 * fix for console error on single post comments shortcode addition
 */
add_action( 'comment_form', function() {
    if ( tdc_state::is_live_editor_iframe() || tdc_state::is_live_editor_ajax() ) {
        remove_action( 'comment_form', 'wp_comment_form_unfiltered_html_nonce' ); ;
    }
}, 9 );

if ( is_admin() ){
    add_filter( 'query_vars', function( $query_vars ) {

        $query_vars[] = 'meta_key';
        $query_vars[] = 'meta_value';
        $query_vars[] = 'template_type';
        $query_vars[] = 'is_mobile_template';

        return $query_vars;
    });
}

/**
 * this removes the wordpress 'hentry' class
 * we're quiting the 'hentry' microformat and rely on the json-ld(json linked data) format
 * @param $classes
 * @return array
 */
add_filter( 'post_class',function( $classes ){

    $classes = array_diff( $classes, array( 'hentry' ) );

    return $classes;
});


if ( td_global::$is_woocommerce_installed && !defined('TD_WOO') ) {
    add_filter('woocommerce_add_to_cart_fragments', 'tdb_woo_get_updated_menu_cart');
    function tdb_woo_get_updated_menu_cart( $fragments ) {

        global $woocommerce;
        $cart_count = $woocommerce->cart->cart_contents_count;
        $cart_subtotal = $woocommerce->cart->subtotal;
        if( $cart_subtotal == 0 ) {
            $cart_subtotal = '0,00 ' . get_woocommerce_currency();
        } else {
            $cart_subtotal .= ' ' . get_woocommerce_currency();
        }

        ob_start();
        woocommerce_mini_cart();
        $cart_contents = ob_get_clean();


        $fragments['.tdb-wmc-count'] = '<span class="tdb-wmc-count">' . $cart_count . '</span>';
        $fragments['.tdb-wmc-txt'] = '<span class="tdb-wmc-txt">' . $cart_subtotal . '</span>';
        $fragments['.tdb-wmc-widget-inner'] = '<div class="tdb-wmc-widget-inner">' . $cart_contents . '</span>';

        return $fragments;

    }
}

// add taxonomies tdb term meta support
add_filter( 'admin_init', function () {

	$fields = array(
        array(
            'label' => 'Color',
            'desc'  => 'Choose a color',
            'id'    => 'tdb_filter_color',
            'type'  => 'color'
        ),
        //array(
        //    'label' => 'Image',
        //    'desc'  => 'You may choose an image for multicolored use cases',
        //    'id'    => 'tdb_filter_color_image',
        //    'type'  => 'image'
        //),
		array(
			'label' => 'Image',
			'desc'  => 'Choose an Image',
			'id'    => 'tdb_filter_image',
			'type'  => 'image'
		)
    );

	$cpts = td_util::get_cpts();

	$taxonomies = array();
	foreach ( $cpts as $cpt ) {

        // get post type taxonomies
		$cpt_taxonomies = get_object_taxonomies( $cpt->name );

        // set ctp taxonomies
		if ( $cpt_taxonomies ) {
			$taxonomies[$cpt->name] = $cpt_taxonomies;
		}

    }

	$processed_taxes = array(); // used to keep track of taxonomies processed for each post type
    foreach ( $taxonomies as $post_type => $post_type_taxonomies ) {

        // for posts remove the default taxonomies
        if ( $post_type === 'post' ) {
	        $post_type_taxonomies = array_diff( $post_type_taxonomies, array( 'category', 'post_tag', 'post_format' ) );
        }

        foreach ( $post_type_taxonomies as $taxonomy ) {
	        new tdb_term_meta( $taxonomy, $post_type, $fields, !in_array( $taxonomy, $processed_taxes ) );
	        $processed_taxes[] = $taxonomy;
        }

    }

});

/**
 * Class tdb_method - fake callable for auto complete
 */
class tdb_method {
    /**
     * @param string $p1
     * @param string $p2
     * @param string $p3
     * @param string $p4
     * @return array | string
     */
    function __invoke($p1 = '', $p2 = '', $p3 = '', $p4 = '') {
        return '';
        // TODO: Implement __invoke() method.
    }
}

//
//add_action('admin_menu', 'custom_menu');
//function custom_menu() {
//
//    add_menu_page(
//        'TD Reviews',
//        'Reviews',
//        'edit_posts',
//        'tdc-reviews',
//        'show_menu_news',
//        'dashicons-media-spreadsheet'
//
//    );
//}
//function show_menu_news () {
//    echo 'News content';
//}
//
//function wpdocs_orders_function () {
//    echo 'News content ordersffff';
//}
//add_submenu_page( 'tdc-reviews', 'Existing WP Docs Orders', 'Existing WP Docs Orders', 'read', 'tdc-reviews-order', 'add_custom_taxonomies_tdc_criteria' );



/**
 * Adding the custom post types and the custom taxonomies for the reviews
 */
// Register Custom Post Type - Reviews
function custom_post_type_reviews() {

    $labels = array(
        'name'                  => _x( 'Reviews', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Reviews', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Reviews', 'text_domain' ),
        'name_admin_bar'        => __( 'Reviews', 'text_domain' ),
        'archives'              => __( 'Reviews Archives', 'text_domain' ),
        'attributes'            => __( 'Reviews Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Reviews:', 'text_domain' ),
        'all_items'             => __( 'Reviews', 'text_domain' ),
        'add_new_item'          => __( 'Add New Review', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Review', 'text_domain' ),
        'edit_item'             => __( 'Edit Review', 'text_domain' ),
        'update_item'           => __( 'Update Review', 'text_domain' ),
        'view_item'             => __( 'View Review', 'text_domain' ),
        'view_items'            => __( 'View Reviews', 'text_domain' ),
        'search_items'          => __( 'Search Review', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into review', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this review', 'text_domain' ),
        'items_list'            => __( 'Reviews list', 'text_domain' ),
        'items_list_navigation' => __( 'Reviews list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter reviews list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Reviews', 'text_domain' ),
        'description'           => __( 'Web development online reviews', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'revisions', 'custom-fields' ),
        'taxonomies'            => array( 'lessons' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 28,
        'menu_icon'             => 'dashicons-star-empty',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'capabilities' => array(
            'create_posts' => false, // Removes support for the "Add New" function ( use 'do_not_allow' instead of false for multisite set ups )
        ),
        'map_meta_cap' => true, // Set to `false`, if users are not allowed to edit/delete existing posts
    );
    register_post_type( 'tdc-review', $args );

}
add_action( 'init', 'custom_post_type_reviews', 0 );


// Register Custom Post Type Taxonomy - Review Emails
function add_custom_taxonomies_tdc_criteria() {
    register_taxonomy('tdc-review-criteria', 'tdc-review', array(
        'hierarchical' => false,
        'labels' => array(
            'name' => _x( 'Review Criteria', 'taxonomy general name' ),
            'singular_name' => _x( 'Review Criteria', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Review Criteria' ),
            'all_items' => __( 'All Review Criteria' ),
            'parent_item' => __( 'Parent Review Criteria' ),
            'parent_item_colon' => __( 'Parent Review Criteria:' ),
            'edit_item' => __( 'Edit Review Criteria' ),
            'update_item' => __( 'Update Review Criteria' ),
            'add_new_item' => __( 'Add New Review Criteria' ),
            'new_item_name' => __( 'New Review Criteria' ),
            'menu_name' => __( 'Criteria' ),
        ),
        // Control the slugs used for this taxonomy
        'rewrite' => array(
            'slug' => 'tdc-review-criteria', // This controls the base slug that will display before each term
            'with_front' => false, // Don't display the category base before "/tdc-review-criteria/"
            'hierarchical' => true // This will allow URL's like "/tdc-review-criteria/speed/fast/"
        ),
        'show_in_menu' => 'edit-tags.php?taxonomy=tdc-review-criteria&post_type=tdc_reviews',
    ));
}
add_action( 'init', 'add_custom_taxonomies_tdc_criteria', 0 );


// Register Custom Post Type - Review Emails
function custom_post_type_review_emails() {

    $labels = array(
        'name'                  => _x( 'Review Emails', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Review Emails', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Review Emails', 'text_domain' ),
        'name_admin_bar'        => __( 'Review Emails', 'text_domain' ),
        'archives'              => __( 'Review Emails Archives', 'text_domain' ),
        'attributes'            => __( 'Review Emails Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Review Emails:', 'text_domain' ),
        'all_items'             => __( 'Emails', 'text_domain' ),
        'add_new_item'          => __( 'New Review Email', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Review Email', 'text_domain' ),
        'edit_item'             => __( 'Edit Review Email', 'text_domain' ),
        'update_item'           => __( 'Update Review Email', 'text_domain' ),
        'view_item'             => __( 'View Review Email', 'text_domain' ),
        'view_items'            => __( 'View Reviews Email', 'text_domain' ),
        'search_items'          => __( 'Search Review Emails', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into review', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Review Emails', 'text_domain' ),
        'items_list'            => __( 'Review Emails list', 'text_domain' ),
        'items_list_navigation' => __( 'Review Emails list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter review emails list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Review Emails', 'text_domain' ),
        'description'           => __( 'The Review Emails', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
        'taxonomies'            => array( 'lessons' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => 'edit.php?post_type=tdc-review',
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-email-alt2',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type( 'tdc-review-email', $args );

}
add_action( 'init', 'custom_post_type_review_emails', 0 );


//Get the user IP
function get_the_user_ip() {

    if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {

        //check ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];

    } elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {

        //to check ip is pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

    } else {

        $ip = $_SERVER['REMOTE_ADDR'];

    }

    return apply_filters( 'wpb_get_ip', $ip );

}

//function objectToArray($obj) {
//    if (is_object($obj)):
//        $object = get_object_vars($obj);
//    endif;
//
//    return array_map('objectToArray', $object); // return the object, converted in array.
//}

// Reviews: Add custom box in the admin post
function tdc_review_show_stars_detail() {
    add_meta_box(
        'review_details_cf',
        'Review Ratings',
        'tdc_review_box',
        'tdc-review',
        'side',
        'low'
    );
}
function tdc_review_box() {
    $post_id = get_the_id();
    $ratings = get_post_meta($post_id, 'tdc-review-ratings', true);

    if( !empty( $ratings ) ) {
        foreach ( $ratings as $rating_id => $rating_data ) {
            echo $rating_data['name'] . ' (' . $rating_data['score'] . ' stars)';
            echo '<br>';
        }
    } else {
        echo 'No ratings available for this review.';
    }

}
add_action('admin_init', 'tdc_review_show_stars_detail');


/**
 * Add the custom columns to the tdc-review post type:
 */
add_filter( 'manage_tdc-review_posts_columns', 'set_custom_edit_tdc_review_columns' );
function set_custom_edit_tdc_review_columns($columns) {
    $columns['tdc_review_rating_overall'] = __td( 'Rating (overall)', TD_THEME_NAME );
    $columns['tdc_review_post_link'] = __td( 'Review for', TD_THEME_NAME );

    return $columns;
}

/**
 * Add the data to the custom columns for the tdc-review post type:
 */
add_action( 'manage_tdc-review_posts_custom_column' , 'custom_tdc_review_column', 10, 2 );
function custom_tdc_review_column( $column, $post_id ) {
    switch ( $column ) {

        case 'tdc_review_rating_overall' :
            $post_id = get_the_id();
            $ratings = get_post_meta($post_id, 'tdc-review-ratings', true);
            $ratings_average = 'No rating available';


            if( !empty( $ratings ) ) {
                $ratings_total = 0;

                foreach ( $ratings as $rating_id => $rating_data ) {
                    $ratings_total += $rating_data['score'];
                }

                $ratings_average = round( ( $ratings_total / count( $ratings ) ) * 2 ) / 2;
            }

            echo $ratings_average;

            break;

        case 'tdc_review_post_link' :
            $review_id = get_the_id();
            $post_id = get_post_meta($review_id, 'tdc-parent-post-id', true);

            $post_link = get_permalink($post_id);

            echo '<a href="' . $post_link .  '" target="_blank">' . get_the_title($post_id) . '</a> ';

            break;

    }
}


/**
 * Delete tdc-review-stars when deleting a review
 */
add_action( 'before_delete_post', function ($postID) {
    // Check if the deleted post is a 'tdc-review' post type
    if ( 'tdc-review' == get_post_type($postID) ) {
        $review_id = $postID;

        if ( 'revision' == get_post_type($review_id) ) {
            $review_id = wp_get_post_parent_id($review_id);
        }


        $review_post_id = get_post_meta($review_id, 'tdc-parent-post-id', true);
        if( !empty( $review_post_id ) ) {
            $post_linked_posts = get_post_meta($review_post_id, 'tdc-post-linked-posts', true);
            if( empty( $post_linked_posts ) ) {
                $post_linked_posts = array();
            }

            if( isset( $post_linked_posts['tdc-review'] ) ) {
                if( ( $key = array_search($review_id, $post_linked_posts['tdc-review']) ) !== false ) {
                    unset($post_linked_posts['tdc-review'][$key]);
                }

                update_post_meta($review_post_id, 'tdc-post-linked-posts', $post_linked_posts);
            }
        }
    }
});


// remove the tdb-loop-orderby query arg when it's empty
add_action( 'init', function (){
    global $_GET;

    if ( isset( $_GET['tdb-loop-orderby'] ) && empty( $_GET['tdb-loop-orderby'] ) ) {
	    wp_safe_redirect( remove_query_arg( array( 'tdb-loop-orderby' ) ) );
	    exit;
    }

});