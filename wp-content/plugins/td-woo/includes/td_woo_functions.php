<?php

global $td_woo_state_single_product_page, $td_woo_state_archive_product_page, $td_woo_state_search_archive_product_page, $td_woo_state_shop_base_page;

/* load the utility */
require_once "td_woo_util.php";

/* load the config */
require_once "td_woo_config.php";
add_action( 'tdc_loaded', array( 'td_woo_config', 'on_tdc_loaded' ), 9 );

/* load ajax */
add_action('tdc_loaded', function () {
	require_once('td_woo_ajax.php');
});

/* set state */
$td_woo_ajax = td_woo_util::get_get_val( 'td_woo_ajax' );
if ( false === $td_woo_ajax ) {
	td_woo_util::set_is_ajax( false );
} else {
	td_woo_util::set_is_ajax( true );
}

/* make the product page state */
require_once TD_WOO_DIR . "/state/td_woo_state_single_product_page.php";
$td_woo_state_single_product_page = new td_woo_state_single_product_page();

/* make the product archive page state */
require_once TD_WOO_DIR . "/state/td_woo_state_archive_product_page.php";
$td_woo_state_archive_product_page = new td_woo_state_archive_product_page();

/* make the product search archive page state */
require_once TD_WOO_DIR . "/state/td_woo_state_search_archive_product_page.php";
$td_woo_state_search_archive_product_page = new td_woo_state_search_archive_product_page();

/* make the shop base page state */
require_once TD_WOO_DIR . "/state/td_woo_state_shop_base_page.php";
$td_woo_state_shop_base_page = new td_woo_state_shop_base_page();

/* load the state */
require_once  TD_WOO_DIR . "/state/td_woo_state_loader.php";
add_action('template_redirect', array('td_woo_state_loader', 'on_template_redirect_load_state'));
add_action('tdc_loaded', array('td_woo_state_loader', 'on_tdc_loaded_load_state'));
add_action('tdc_loaded', function() {

	add_action( 'wp', function () {

		// add woocommerce assets to the composer iframe, cloud templates ..  scripts / styles / wc body classes
		if ( is_singular('tdb_templates' ) || tdc_state::is_live_editor_iframe() ) {
			add_action( 'wp_enqueue_scripts', function (){
				$suffix  = defined( 'SCRIPT_DEBUG' ) ? '' : '.min';
				$version = constant( 'WC_VERSION' );

				$wc_single_product_js_path = plugins_url( 'assets/js/frontend/single-product' . $suffix . '.js', WC_PLUGIN_FILE );
				wp_register_script( 'wc-single-product', $wc_single_product_js_path, array( 'jquery' ), $version, true );
				wp_enqueue_script( 'wc-single-product' );

				$params = array(
					'flexslider'                => apply_filters(
						'woocommerce_single_product_carousel_options',
						array(
							'rtl'            => is_rtl(),
							'animation'      => 'slide',
							'smoothHeight'   => true,
							'directionNav'   => false,
							'controlNav'     => 'thumbnails',
							'slideshow'      => false,
							'animationSpeed' => 500,
							'animationLoop'  => false, // Breaks photoswipe pagination if true.
							'allowOneSlide'  => false,
						)
					),
					'zoom_enabled'              => apply_filters( 'woocommerce_single_product_zoom_enabled', get_theme_support( 'wc-product-gallery-zoom' ) ),
					'zoom_options'              => apply_filters( 'woocommerce_single_product_zoom_options', array() ),
					'photoswipe_enabled'        => apply_filters( 'woocommerce_single_product_photoswipe_enabled', get_theme_support( 'wc-product-gallery-lightbox' ) ),
					'photoswipe_options'        => apply_filters(
						'woocommerce_single_product_photoswipe_options',
						array(
							'shareEl'               => false,
							'closeOnScroll'         => false,
							'history'               => false,
							'hideAnimationDuration' => 0,
							'showAnimationDuration' => 0,
						)
					),
					'flexslider_enabled'        => apply_filters( 'woocommerce_single_product_flexslider_enabled', get_theme_support( 'wc-product-gallery-slider' ) ),
				);

				$params = apply_filters_deprecated( 'wc-single-product_params', array( $params ), '3.0.0', 'woocommerce_get_script_data' );

				wp_localize_script( 'wc-single-product', 'wc_single_product_params', apply_filters( 'wc_single_product_params', apply_filters( 'woocommerce_get_script_data', $params, 'wc-single-product' ) ) );

				$flexslider_js_path = plugins_url( 'assets/js/flexslider/jquery.flexslider' . $suffix . '.js', WC_PLUGIN_FILE );
				wp_register_script( 'flexslider', $flexslider_js_path, array( 'jquery' ), '2.7.2', true );
				wp_enqueue_script( 'flexslider' );

				wp_register_style(
					'woocommerce-general',
					plugins_url( 'assets/css/woocommerce.css', WC_PLUGIN_FILE ),
					'',
					$version,
					'all'
				);
				wp_enqueue_style( 'woocommerce-general' );
			});
			add_action( 'body_class', function ($classes) {
				$classes = (array) $classes;
				$classes[] = 'woocommerce';
				$classes[] = 'woocommerce-page';
				$classes[] = 'td-woo-variation-switches';

				if ( wp_is_mobile() ) {
					array_push( $classes, 'td-woo-variation-switches-mob' );
				}

				return array_unique( $classes );
			});
			add_filter( 'woocommerce_get_script_data', function ($params, $handle){
			    if ( $handle === 'wc-cart-fragments' ) {
			        $params = false;
                }
			    return $params;
            }, 10, 2);
		}
	});

	add_action( 'pre_get_posts', function( $query ) {

		// checking for main query ONLY ON frontend - Does not run on ajax or TDC iFrame!!!
		if( ( !is_admin() && $query->is_main_query() && !tdc_state::is_live_editor_ajax() && !tdc_state::is_live_editor_iframe()) ) {

			// single product template
			if ( is_singular() && $query->get('post_type') === 'product' && ! td_util::is_mobile_theme() ) {

			    // template id init
			    $template_id = '';

				// read template
				$tdb_woo_template = td_util::get_option( 'tdb_woo_product_template' );
				if ( td_global::is_tdb_template( $tdb_woo_template, true ) ) {
					$template_id = td_global::tdb_get_template_id( $tdb_woo_template );
				}

				// if we have a template set load it
				if ( !empty( $template_id ) ) {

					// load the tdb template
					$wp_query_template = new WP_Query( array(
							'p' => $template_id,
							'post_type' => 'tdb_templates',
						)
					);
				}

				// if we have a template
				if ( !empty( $wp_query_template ) && $wp_query_template->have_posts() ) {

					// parse content shortcodes
					preg_match_all( '/\[(.*?)]/', $wp_query_template->post->post_content, $matches );

					// td woo shortcodes flags
					$found_td_woo_product_reviews_shortcode = $found_td_woo_product_notices_shortcode = false;

					// search for the td_woo_product_reviews shortcode
					if ( !empty( $matches[0] ) and is_array( $matches[0] ) ) {

						foreach ( $matches[0] as $match ) {
							if ( strpos( $match, 'td_woo_product_reviews' ) !== false ) {
								$found_td_woo_product_reviews_shortcode = true;
							}
							if ( strpos( $match, 'td_woo_product_notices' ) !== false ) {
								$found_td_woo_product_notices_shortcode = true;
							}
						}

					}

					// add the woocommerce_product_tabs filter to remove the reviews tab if we have the td_woo_product_reviews shortcode in template's content
					if ( $found_td_woo_product_reviews_shortcode ) {
						add_filter( 'woocommerce_product_tabs', function ($product_tabs){

							if( isset( $product_tabs['reviews'] ) ) {
								unset( $product_tabs['reviews'] );
							}

							return $product_tabs;
						}, 11);
					}

					// remove the woocommerce_output_all_notices action if we have the td_woo_product_notices shortcode in template's content
					if ( $found_td_woo_product_notices_shortcode ) {
						remove_action( 'woocommerce_before_single_product', 'woocommerce_output_all_notices' );
					}

				}
			}
		}
	});

	// add wc frontend hooks on td composer
	if ( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) {
		wc()->frontend_includes();

		add_action( 'woocommerce_init', function (){
			wc_load_cart();
		});
	}

});

add_filter( 'template_include', 'td_woo_on_template_include', 99 );
function td_woo_on_template_include( $original_template ) {

	// we are viewing a cloud template
	if ( is_singular( array( 'tdb_templates' ) ) ) {
		return TD_WOO_DIR . '/templates/td_woo_view_template.php';
	}

	$template_id = '';

	// we are viewing a single product template
	if ( is_singular( array( 'product' ) ) && ! td_util::is_mobile_theme() ) {

	    $is_global_template = false;

        // read template
        global $post;
        $td_post_theme_settings = td_util::get_post_meta_array( $post->ID, 'td_post_theme_settings' );
        if ( ! empty( $td_post_theme_settings[ 'td_post_template' ] ) ) {
            if ( td_global::is_tdb_template( $td_post_theme_settings[ 'td_post_template' ] )) {
	            if ( td_global::is_tdb_template( $td_post_theme_settings[ 'td_post_template' ], true ) ) {
		            $template_id = td_global::tdb_get_template_id( $td_post_theme_settings[ 'td_post_template' ] );
	            } else {

	                // the template is tdb, but it does not exist (maybe was deleted), so we reset post settings
		            $td_post_theme_settings[ 'td_post_template' ] = '';
		            $queried_object = get_queried_object();
		            update_post_meta( $queried_object->ID, 'td_post_theme_settings', $td_post_theme_settings );

		            $is_global_template = true;
	            }
            }
        } else {
            $is_global_template = true;
        }
        if ( $is_global_template ) {
            $tdb_woo_template = td_options::get( 'tdb_woo_product_template' );
            if ( td_global::is_tdb_template( $tdb_woo_template, true ) ) {
                $template_id = td_global::tdb_get_template_id( $tdb_woo_template );
            }
        }
	}

	// we are viewing a product category archive template
	if ( function_exists( 'is_product_category' ) && is_product_category() && !td_util::is_mobile_theme() ) {

		// read td woo archive(product category) template
        $option_id = 'tdb_woo_archive_template';
        $queried_object = get_queried_object();

		// check for individual td woo archive (product category) template
        $tdb_individual_woo_archive_cat_template = get_term_meta( $queried_object->term_id, $option_id, true );

        if ( ! empty( $tdb_individual_woo_archive_cat_template ) ) {
            $template_id = td_global::tdb_get_template_id($tdb_individual_woo_archive_cat_template);
        } else {
	        $tdb_global_woo_archive_cat_template = td_options::get( $option_id );
	        if ( td_global::is_tdb_template( $tdb_global_woo_archive_cat_template, true ) ) {
		        $template_id = td_global::tdb_get_template_id( $tdb_global_woo_archive_cat_template );
	        }
        }
	}

	// we are viewing a product tag archive template
	if ( function_exists( 'is_product_tag' ) && is_product_tag() && !td_util::is_mobile_theme() ) {

		// read td woo archive tag(product tag) template
        $option_id = 'tdb_woo_archive_tag_template';
        $queried_object = get_queried_object();

        // check for individual td woo archive tag(product tag) template
		$tdb_individual_woo_archive_tag_template = get_term_meta( $queried_object->term_id, $option_id, true );

        if ( ! empty( $tdb_individual_woo_archive_tag_template ) ) {
            $template_id = td_global::tdb_get_template_id($tdb_individual_woo_archive_tag_template);
        } else {
	        $tdb_global_woo_archive_tag_template = td_options::get( $option_id );
	        if ( td_global::is_tdb_template( $tdb_global_woo_archive_tag_template, true ) ) {
		        $template_id = td_global::tdb_get_template_id( $tdb_global_woo_archive_tag_template );
	        }
        }
	}

	global $wp_query;
	$queried_object = get_queried_object();

    // is wc query, is tax, we're not on mobile theme, and we have a queried object set
    if ( $wp_query->get( 'wc_query' ) && is_tax() && !empty( $queried_object ) && !td_util::is_mobile_theme() ) {

	    // we are viewing a product attribute archive template
	    if ( function_exists( 'taxonomy_is_product_attribute' ) && taxonomy_is_product_attribute( $queried_object->taxonomy ) ) {

		    // global woo archive attribute(product attribute) template option id
		    $option_id = 'tdb_woo_archive_attribute_template';

		    // get individual woo archive attribute(product attribute) template from term meta
    		$tdb_individual_woo_archive_attribute_template = get_term_meta( $queried_object->term_id, $option_id, true );

		    // check for individual prod attribute term template
            if ( !empty( $tdb_individual_woo_archive_attribute_template ) ) {
                $template_id = td_global::tdb_get_template_id( $tdb_individual_woo_archive_attribute_template );
            } else {

	            // check for global prod attribute taxonomy template
	            $tdb_pa_tax_woo_archive_attribute_template_option_id = 'tdb_woo_attribute_' . $queried_object->taxonomy . '_tax_template';
	            $tdb_pa_tax_woo_archive_attribute_template = td_options::get( $tdb_pa_tax_woo_archive_attribute_template_option_id );
	            if ( td_global::is_tdb_template( $tdb_pa_tax_woo_archive_attribute_template, true ) ) {
		            $template_id = td_global::tdb_get_template_id( $tdb_pa_tax_woo_archive_attribute_template );
	            } else {

                    // check for global prod attributes template
		            $tdb_global_woo_archive_attribute_template = td_options::get( $option_id );
		            if ( td_global::is_tdb_template( $tdb_global_woo_archive_attribute_template, true ) ) {
			            $template_id = td_global::tdb_get_template_id( $tdb_global_woo_archive_attribute_template );
		            }
                }
            }
	    }
    }

	// we are viewing a products search archive
	if ( is_search() && $wp_query->get( 'wc_query' ) && !td_util::is_mobile_theme() ) {

		// read template
		$tdb_woo_template = td_options::get( 'tdb_woo_search_archive_template' );
		if ( td_global::is_tdb_template( $tdb_woo_template, true ) ) {
			$template_id = td_global::tdb_get_template_id( $tdb_woo_template );
		}
	}

	// we are viewing a shop template
	elseif ( is_shop() && ! td_util::is_mobile_theme() ) {

		// read template
		$tdb_woo_template = td_options::get( 'tdb_woo_shop_base_template' );
		if ( td_global::is_tdb_template( $tdb_woo_template, true ) ) {
			$template_id = td_global::tdb_get_template_id( $tdb_woo_template );
		}
	}

	if ( !empty( $template_id ) ) {

	    if ( class_exists('Mobile_Detect' ) ) {
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

		// do not redirect the theme template if we don't find the template
		// it was probably deleted or something
		if ( empty( $wp_query_template ) || !$wp_query_template->have_posts() ) {
			return $original_template; // do nothing if the template is not found!
		}

		// save our template wp_query & load
		tdb_state_template::set_wp_query( $wp_query_template );

		// do the redirect
		return TD_WOO_DIR . '/templates/td_woo_view.php';
	}

	return $original_template;
}

/* load plugin's woocommerce templates */
add_filter( 'wc_get_template', function ( $template, $template_name, $args, $template_path, $default_path ) {

	// cart
	if ( $template_name === 'cart/cart.php' ) {
		return TD_WOO_DIR . '/templates/woocommerce/cart/cart.php';
	}

	// checkout
	if ( $template_name === 'checkout/form-checkout.php' ) {
	    return TD_WOO_DIR . '/templates/woocommerce/checkout/form-checkout.php';
	}

	return $template;

}, 10, 5 );

// this adds the woo template types to the existing templates
add_filter( 'tdb_template_types', function ( $tdb_template_types ) {

	$tdb_template_types = array_merge(
		$tdb_template_types,
		array(
			'woo_product',
			'woo_archive',
			'woo_search_archive',
			'woo_shop_base',
            // add tag && attributes woo templates which use the 'woo_archive' cloud tpl type
            'woo_archive_tag',
            'woo_archive_attribute'
		)
	);

	return $tdb_template_types;
});

// this adds the woo attributes template types to cloud templates
add_filter( 'td_woo_attributes_template_types', function ( $td_woo_attributes_template_types ) {

	// attributes taxonomies ... these are retrieved straight from the database
	$attributes_taxonomies = wc_get_attribute_taxonomies();
	if ( $attributes_taxonomies && is_array( $attributes_taxonomies ) ) {
		foreach ( $attributes_taxonomies as $att_tax ) {
            // add attribute taxonomy slug as tpl type if attribute has archives enabled
            if ( $att_tax->attribute_public ) {
	            $td_woo_attributes_template_types[] = wc_attribute_taxonomy_name( $att_tax->attribute_name );
            }
        }
    }

	return $td_woo_attributes_template_types;
});

// enqueue admin js/css
add_action( 'admin_enqueue_scripts', function () {

	// theme panel js
    if ( TDB_DEPLOY_MODE == 'dev' ) {
        if ( isset( $_GET['page'] ) && $_GET['page'] === 'td_theme_panel' ) {
            tdc_util::enqueue_js_files_array(td_woo_config::$js_panel_files, array('jquery', 'underscore'), TD_WOO_URL, TD_WOO);
        }
    } else {
        if ( isset( $_GET['page'] ) && $_GET['page'] === 'td_theme_panel' ) {
            wp_enqueue_script( 'td_woo_panel_admin_js', TD_WOO_URL . '/assets/js/js_panel_files.min.js', array( 'jquery', 'underscore' ), TD_WOO, true);
        }

    }

	// wp admin js
	//wp_enqueue_script( 'td_woo_admin_js', TD_WOO_URL . '/assets/js/admin/tdWooAdmin.js', array( 'jquery', 'underscore' ), TD_WOO, true);

	// css for wp-admin / backend
    if ( TD_WOO_DEPLOY_MODE == 'dev' ) {
        wp_enqueue_style( 'td-woo-wp-admin-td-panel', TD_WOO_URL . '/td_less_style.css.php?part=admin_style', false, TD_WOO );
    } else {
        wp_enqueue_style('td-woo-wp-admin-td-panel', TD_WOO_URL . '/assets/css/td-woo-wp-admin.css', false, TD_WOO, 'all');
    }
}, 1012 );

// enqueue front js/css
add_action( 'wp_enqueue_scripts', function () {

	if ( td_util::is_mobile_theme() ) {
		return;
	}

	// load js
    if (TD_WOO_DEPLOY_MODE == 'dev') {
        tdc_util::enqueue_js_files_array( td_woo_config::$js_external_files_for_front, array( 'jquery' ), TD_WOO_URL, TD_WOO );
    } else {
        wp_enqueue_script( 'tdw_external_js_files_for_front', TD_WOO_URL . '/assets/js/js_external_files_for_front.min.js', array( 'jquery' ), TD_WOO, true );
    }

}, 12);

// enqueue for front after td-composer
add_action( 'wp_enqueue_scripts', function () {

	if ( td_util::is_mobile_theme() ) {
		return;
	}

	// load the css
	if ( TD_WOO_DEPLOY_MODE == 'dev' ) {
		wp_enqueue_style( 'td-woo-front-style', TD_WOO_URL . '/td_less_style.css.php?part=front_style', false, TD_WOO );
	} else {
		wp_enqueue_style( 'td-woo-front-style', TD_WOO_URL . '/assets/css/td-woo-front.css', false, TD_WOO );
	}

	// load the js
	if ( TD_WOO_DEPLOY_MODE == 'dev' ) {
		tdc_util::enqueue_js_files_array( td_woo_config::$js_files_for_front, array( 'jquery', 'underscore' ), TD_WOO_URL, TD_WOO );
	} else {
		wp_enqueue_script( 'tdw_js_files_for_front', TD_WOO_URL . '/assets/js/js_files_for_front.min.js', array( 'jquery' ), TD_WOO, true );
	}

}, 1011 );

// add td woo specific body classes
add_filter( 'body_class', function ($classes) {
	array_push( $classes, 'td-woo-variation-switches' );
	return array_unique( $classes );
});

// wc product gallery zoom/lightbox/slider support
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

// tax meta fields
function td_tax_meta_fields( $field_id = false ) {
	$fields['color'] = array(
		array(
			'label' => 'Color',
			'desc'  => 'Choose a color',
			'id'    => 'product_attribute_color',
			'type'  => 'color'
		),
		array(
			'label' => 'Image',
			'desc'  => 'You may choose an image for multicolored use cases',
			'id'    => 'product_attribute_color_image',
			'type'  => 'image'
		)
	);

	$fields['image'] = array(
		array(
			'label' => 'Image',
			'desc'  => 'Choose an Image',
			'id'    => 'product_attribute_image',
			'type'  => 'image'
		)
	);

	if ( $field_id ) {
		return $fields[ $field_id ] ?? array();
	}

	return $fields;
}

// add tax meta
add_filter( 'admin_init', function () {

	$fields = td_tax_meta_fields();
	$attribute_taxonomies = wc_get_attribute_taxonomies();
	if ( $attribute_taxonomies ) {
		foreach ( $attribute_taxonomies as $tax ) {
			$product_attr_type = $tax->attribute_type;
			$taxonomy = wc_attribute_taxonomy_name( $tax->attribute_name );

			if ( in_array( $product_attr_type, array( 'color', 'image' ) ) ) {
			    td_woo_util::add_term_meta( $taxonomy, 'product', $fields[ $product_attr_type ] );
            }
        }
    }

});

// add product attributes types selector
add_filter( 'product_attributes_type_selector', function ($types) {
	$types['image'] = 'Image';
	$types['color'] = 'Color';
	$types['button'] = 'Button';
	return $types;
});

/*
 * ajax: updates attribute terms meta
 * @note used for color type attributes to update color terms meta
 */
add_action('wp_ajax_nopriv_td_woo_term_update', 'on_ajax_td_woo_term_update');
add_action('wp_ajax_td_woo_term_update', 'on_ajax_td_woo_term_update');
function on_ajax_td_woo_term_update() {

	$reply = array();

	// die if request is fake
	check_ajax_referer( 'td-woo', 'td_magic_token' );

	// check post data
	$td_woo_term = $_POST['td_woo_term'];
	$meta_type = $_POST['meta_type'];

	switch ( $meta_type ) {
        case 'color':
	        $td_woo_term_color = $_POST['td_woo_term_color'];
	        $status = update_term_meta( (int)$td_woo_term['term_id'], 'product_attribute_color', sanitize_hex_color($td_woo_term_color) );
	        break;
        case 'color_img':
	        $td_woo_term_img = $_POST['td_woo_term_img'];
	        $status = update_term_meta( (int)$td_woo_term, 'product_attribute_color_image', $td_woo_term_img );
	        break;
        default:
	        die( json_encode( array( 'status' => 'error - invalid or missing meta type - the term was NOT updated' ) ) );
    }

	// check update meta status
	if ( $status ) {
		$reply['status'] = 'success - the term was updated';
	} else {
		$reply['status'] = 'error - the term was NOT updated';
	}

	$reply['request_data'] = array(
	        'update_meta_status' => $status,
	        'meta_type' => $meta_type,
    );

	switch ( $meta_type ) {
		case 'color':
			$reply['request_data']['term'] = $td_woo_term;
			$reply['request_data']['term_img'] = $td_woo_term_color;
			break;
		case 'color_img':
			$reply['request_data']['term_id'] = $td_woo_term;
			$reply['request_data']['term_img'] = $td_woo_term_img;
			break;
	}

	die( json_encode( $reply ) );
}

// remove filter for automatically redirect to the product page instead of showing all the results
add_filter( 'woocommerce_redirect_single_search_result', '__return_false' );

// add woocommerce_add_to_cart_fragments filter .. fix for td_woo_menu_cart shortcode when removing a cart item
add_filter( 'woocommerce_add_to_cart_fragments', function( $fragments ) {

    if ( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) {
        return $fragments;
    }

	ob_start();
	woocommerce_mini_cart();
	$mini_cart = ob_get_clean();

	global $woocommerce;

    $price_decimal_separator = wc_get_price_decimal_separator();
    $price_thousand_separator = wc_get_price_thousand_separator();
    $price_decimals = wc_get_price_decimals();
    $price_format = get_woocommerce_price_format();

    $cart_subtotal = (float) $woocommerce->cart->subtotal;
    $original_cart_subtotal = $cart_subtotal;
    $negative_cart_subtotal = $cart_subtotal < 0;

    $cart_subtotal = apply_filters( 'raw_woocommerce_price', $negative_cart_subtotal ? $cart_subtotal * -1 : $cart_subtotal, $original_cart_subtotal );
    $cart_subtotal = apply_filters( 'formatted_woocommerce_price', number_format( $cart_subtotal, $price_decimals, $price_decimal_separator, $price_thousand_separator ), $cart_subtotal, $price_decimals, $price_decimal_separator, $price_thousand_separator, $original_cart_subtotal );

    $formatted_cart_subtotal = ( $negative_cart_subtotal ? '-' : '' ) . sprintf( $price_format, get_woocommerce_currency_symbol(), $cart_subtotal );

	$fragments = array();
	$fragments['div.tdw-wmc-widget-inner'] = '<div class="tdw-wmc-widget-inner" data-cart_contents_count="' . $woocommerce->cart->cart_contents_count . '" data-cart_subtotal="' . $formatted_cart_subtotal . '">' . $mini_cart . '</div>';

	return $fragments;
});

add_action( 'woocommerce_product_option_terms', function( $attribute_taxonomy, $i, $attribute ) {
	if ( in_array( $attribute_taxonomy->attribute_type, array( 'image', 'color', 'button' ) ) ) {
		?>
        <select multiple="multiple" data-placeholder="<?php esc_attr_e( 'Select terms', 'woocommerce' ); ?>" class="multiselect attribute_values wc-enhanced-select" name="attribute_values[<?php echo esc_attr( $i ); ?>][]">
			<?php
			$args      = array(
				'orderby'    => 'name',
				'hide_empty' => 0,
			);
			$all_terms = get_terms( $attribute->get_taxonomy(), apply_filters( 'woocommerce_product_attribute_terms', $args ) );
			if ( $all_terms ) {
				foreach ( $all_terms as $term ) {
					$options = $attribute->get_options();
					$options = ! empty( $options ) ? $options : array();
					echo '<option value="' . esc_attr( $term->term_id ) . '"' . wc_selected( $term->term_id, $options ) . '>' . esc_attr( apply_filters( 'woocommerce_product_attribute_term_name', $term->name, $term ) ) . '</option>';
				}
			}
			?>
        </select>
        <button class="button plus select_all_attributes"><?php esc_html_e( 'Select all', 'woocommerce' ); ?></button>
        <button class="button minus select_no_attributes"><?php esc_html_e( 'Select none', 'woocommerce' ); ?></button>
        <button class="button fr plus add_new_attribute"><?php esc_html_e( 'Add new', 'woocommerce' ); ?></button>
		<?php
	}
}, 20, 3);

// woocommerce cart page custom cross sells
remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 10);
add_action('woocommerce_after_cart', 'woocommerce_cross_sell_display', 10);

add_filter( 'woocommerce_cross_sells_columns', 'cross_sells_columns' );
function cross_sells_columns() {
    return 4;
}
add_filter( 'woocommerce_cross_sells_total', 'cross_sells_total' );
function cross_sells_total() {
    return 4;
}

// woocommerce custom checkout
// login
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10 );
add_action( 'woocommerce_checkout_before_order_review_heading', 'woocommerce_checkout_custom_login', 10 );
function woocommerce_checkout_custom_login() {
    if ( is_user_logged_in() || 'no' === get_option( 'woocommerce_enable_checkout_login_reminder' ) ) {
        return;
    }
    ?>
    <div class="td-woo-coupon-wrap">
        <svg width="24" viewBox="0 0 32 32">
            <path d="M16 15.65c3.472 0 6.286-2.814 6.287-6.287-0.001-3.473-2.815-6.287-6.287-6.288-3.474 0.001-6.287 2.815-6.288 6.289 0.001 3.473 2.815 6.287 6.288 6.287zM16 5.574c2.091 0.004 3.784 1.695 3.786 3.788-0.003 2.091-1.695 3.783-3.786 3.787-2.092-0.004-3.784-1.696-3.788-3.787 0.004-2.093 1.697-3.784 3.788-3.788zM16 18.182c-6.536 0.003-11.991 4.6-13.318 10.743h2.575c1.273-4.742 5.597-8.244 10.744-8.243 5.146-0.002 9.469 3.5 10.742 8.243h2.576c-1.329-6.143-6.782-10.74-13.318-10.743z"></path>
        </svg>
        <p><?php esc_html_e( 'Returning customer?', 'woocommerce' ); ?></p>
        <a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ) ?>"><?php esc_html_e( 'Click here to login', 'woocommerce' )?></a>
    </div>
    <?php
}
// coupon code
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
add_action( 'woocommerce_checkout_before_order_review_heading', 'woocommerce_checkout_custom_coupon', 10 );
function woocommerce_checkout_custom_coupon() {
    if ( ! wc_coupons_enabled() ) {
        return;
    }
    ?>
    <div class="td-woo-coupon-wrap">
        <svg width="24" viewBox="0 0 512 512"><g><path d="M497.231,211.692c8.157,0,14.769-6.613,14.769-14.769v-78.769c0-8.157-6.613-14.769-14.769-14.769H14.769
			C6.613,103.385,0,109.997,0,118.154v78.769c0,8.157,6.613,14.769,14.769,14.769c24.431,0,44.308,19.876,44.308,44.308
			s-19.876,44.308-44.308,44.308C6.613,300.308,0,306.92,0,315.077v78.769c0,8.157,6.613,14.769,14.769,14.769h482.462
			c8.157,0,14.769-6.613,14.769-14.769v-78.769c0-8.157-6.613-14.769-14.769-14.769c-24.431,0-44.308-19.876-44.308-44.308
			S472.799,211.692,497.231,211.692z M482.462,328.362v50.715H172.308v-44.308c0-8.157-6.613-14.769-14.769-14.769
			s-14.769,6.613-14.769,14.769v44.308H29.538v-50.715c33.665-6.862,59.077-36.701,59.077-72.362s-25.412-65.501-59.077-72.362
			v-50.715h113.231v44.308c0,8.157,6.613,14.769,14.769,14.769s14.769-6.613,14.769-14.769v-44.308h310.154v50.715
			c-33.665,6.862-59.077,36.701-59.077,72.362S448.797,321.501,482.462,328.362z"/></g><g><path d="M157.538,221.538c-8.157,0-14.769,6.613-14.769,14.769v39.385c0,8.157,6.613,14.769,14.769,14.769
			s14.769-6.613,14.769-14.769v-39.385C172.308,228.151,165.695,221.538,157.538,221.538z"/></g>
        </svg>
        <p><?php esc_html_e( 'Have a coupon?', 'woocommerce' ); ?></p>
        <a href="<?php echo get_permalink( wc_get_page_id( 'cart' ) ) ?>"><?php esc_html_e( 'Enter your code', 'woocommerce' )?></a>
    </div>
    <?php
}

// fix for variation switches when @see https://iconicwp.com/blog/modify-ajax-variation-threshold/
add_filter( 'woocommerce_ajax_variation_threshold', function( $qty, $product ) {
	return 50;
}, 10, 2 );
