<?php
/**
 * Class tds_email_locker
 */

class tds_email_locker {

	protected static $_instance = null;

	private $is_locked_content = null;
	private $locker_id = null;
	private $content_lock_type = null;
	private $locker_leads_list_id = null;

	private $custom_slug = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function __construct() {

		// this callback renders the full ( set in post settings, via post meta ) post content lockers && partial lockers added in post content
		add_action( 'wp', array( $this, 'locker_init' ) ); // hook later on `wp`, after wp env setup to access the $post global

		// post content (partial) locker shortcode rendered @note this is used just as a flag for partial content lock
		add_shortcode( 'tds_partial_locker', function ( $atts, $content, $shortcode_tag ) {
			return ''; // do nothing when rendering
		});

		// locked content ( aka content locker ) shortcode render
		add_shortcode( 'tds_content_locker', function ( $atts, $content, $shortcode_tag ) {
			return $content; // just return the hidden content when rendering
		});

		add_action( 'save_post', function( $post_id, $post, $update ) {

			// Only set for post_type = post!
		    if ( 'tds_locker' === $post->post_type && 'publish' === $post->post_status ) {
		        update_post_meta( $post_id, 'tds_new_values', 1 );
		    }

		}, 10, 3 );

	}

	public function locker_init() {

		// check the show locked option and ...
		// ... lock posts for users logged-in and with 'edit_posts' capability(admins,editors,authors & contributors) only if the option is checked
		$tds_options = tds_util::get_tds_options();
		$show_locked = '';

		foreach ( $tds_options as $tds_option ) {
			if ( $tds_option['name'] == 'show_locked' ) {
				$show_locked = $tds_option['value'];
			}
		}

		if ( !empty( $show_locked ) && is_user_logged_in() && current_user_can('edit_posts') ) {
			return;
		}

		global $post;

		// return here if global $post is not set or if theme's utility class is not loaded
		if ( is_archive() || !$post ) {
			return;
		}

		// for cpts ... check the panel cpt locker status
		$post_type = get_post_type();
		if ( $post_type && ( $post_type !== 'post' && $post_type !== 'page' ) ) {

			$tds_custom_post_locker = '';
			if ( class_exists( 'td_util' ) ) {
				$tds_custom_post_locker = td_util::get_ctp_option( $post_type, 'tds_custom_post_locker' );
			}

			// return here if not enabled from panel
			if ( empty( $tds_custom_post_locker ) ) {
				return;
			}

		}

		// check content for partial lockers
		$tds_partial_locker = isset( $post->post_content ) && tds_util::get_shortcode( $post->post_content, 'tds_partial_locker' );
		//$tds_partial_locker = isset( $post->post_content ) && has_block( 'tds/partiallocker', $post->post_content );
		if ( $tds_partial_locker ) {

			$tds_locker_id = tds_util::get_shortcode_att( $post->post_content, 'tds_partial_locker', 'tds_locker_id' );
			$tds_lock_content = !empty( $tds_locker_id );

			// set content lock type
			tds_email_locker::instance()->set_content_lock_type('partial');

		// full content lock
		} else {

			// read post/page settings
			if ( is_page( $post->ID ) ) {

				$page_id = $post->ID;
				$meta_key = 'td_page';
				$td_page_template = get_post_meta( $page_id, '_wp_page_template', true );

				if ( !empty( $td_page_template ) && ( $td_page_template == 'page-pagebuilder-latest.php' ) ) {
					$meta_key = 'td_homepage_loop';
				}

				$td_page_meta = get_post_meta( $page_id, $meta_key, true );
				$tds_locker_settings = is_array( $td_page_meta ) ? $td_page_meta : array();

			} else {
				$td_post_meta = get_post_meta( $post->ID, 'td_post_theme_settings', true );
				$tds_locker_settings = is_array( $td_post_meta ) ? $td_post_meta : array();
			}

			// read content lock/locker id settings from post meta settings
			$tds_lock_content = !empty( $tds_locker_settings['tds_lock_content'] );
			$tds_locker_id = !empty( $tds_locker_settings['tds_locker'] ) ? $tds_locker_settings['tds_locker'] : false;

			// set content lock type @todo we'll see if it's needed .. we treat this case as default..
			//tds_email_locker::instance()->set_content_lock_type('full');

		}

		// process locked content ( aka content locker ) if no locker was loaded at this point
		if ( !$tds_lock_content ) { // if $tds_lock_content is false at this point we don't have a full or partial locker set ...

			$tds_content_locker = isset( $post->post_content ) && has_block( 'tds/contentlocker', $post->post_content );
			if ( $tds_content_locker ) {

				// parse post content blocks to find & set the locker id if it's set, otherwise set the default locker id
				$post_content_blocks = parse_blocks( $post->post_content );
				if ( !empty( $post_content_blocks ) && is_array( $post_content_blocks ) ) {
					foreach ( $post_content_blocks as $block ) {
						if ( $block['blockName'] === 'tds/contentlocker' && isset( $block['attrs']['tdsLockerId'] ) ) {
							$tds_locker_id = (int) $block['attrs']['tdsLockerId'];
						}
					}
				}

				// set the default locker if it was not set
				if ( empty( $tds_locker_id ) ) {
					$tds_locker_id = (int) get_option( 'tds_default_locker_id' );
				}

				$tds_lock_content = !empty( $tds_locker_id );

				// set content lock type
				tds_email_locker::instance()->set_content_lock_type('content');
			}
		}

		// Try to find the custom slug
		$tds_custom_slug = '';

		// Try to find locker by custom slug
		// If nothing found, let unchanged the $tds_locker_id
		$tds_lockers = get_posts([
			'post_type' => 'tds_locker',
            'post_status' => 'publish',
            'numberposts' => -1, // get all, no limit
		]);

		foreach ( $tds_lockers as $tds_locker ) {
			$tds_locker_types = get_post_meta( $tds_locker->ID, 'tds_locker_types', true );
            if ( !empty( $tds_locker_types['tds_locker_slug'] ) && $tds_locker_id == $tds_locker_types['tds_locker_slug'] ) {
                $tds_locker_id = $tds_locker->ID;
                $tds_custom_slug = $tds_locker_types['tds_locker_slug'];
                break;
            }
		}

		// read locker list from post meta
		$tds_locker_access_settings = get_post_meta( $tds_locker_id, 'tds_locker_access_settings', true );
		$tds_locker_email_list = !empty( $tds_locker_access_settings['tds_locker_email_list'] ) ? (int) $tds_locker_access_settings['tds_locker_email_list'] : false;

		if ( $tds_lock_content ) {

			if ( !$tds_locker_id ) {
				return;
			}

			$tds_locker_types = get_post_meta( $tds_locker_id, 'tds_locker_types', true );
			$tds_locker_payable = empty( $tds_locker_types[ 'tds_payable' ] ) ? false : true;

			if ( $tds_locker_payable ) {
				$tds_paid_subs_page_id = empty( $tds_locker_types[ 'tds_paid_subs_page_id' ] ) ? false : true;
				if ( !$tds_paid_subs_page_id ) {
					return;
				}

				$tds_paid_subs_plan_ids = empty( $tds_locker_types[ 'tds_paid_subs_plan_ids' ] ) ? false : true;
				if ( !$tds_paid_subs_plan_ids ) {
					return;
				}
			} else {
				if ( !$tds_locker_email_list ) {
					return;
				}
			}

		} else {
			return;
		}

		$tds_options = tds_util::get_tds_options();
		$cache_email = '';

		foreach ( $tds_options as $tds_option ) {
			switch ( $tds_option[ 'name' ] ) {
				case 'cache_email':
					$cache_email = $tds_option[ 'value' ];
					break;
			}
		}

		if ( $tds_locker_payable ) {

//			$lock_content = true;

//            $result = tds_util::get_subscriptions( get_current_user_id(), -1 );
//            if ( empty($result) || empty( $result['subscriptions'] ) ) {
//                $lock_content = true;
//            }

            // commented because $lock_content was always true
//            if ( $lock_content ) {

				// set content as locked
				tds_email_locker::instance()->set_content_locked();

				// set locker id
				tds_email_locker::instance()->set_locker_id( $tds_locker_id );

				// set custom slug
				tds_email_locker::instance()->set_custom_slug($tds_custom_slug);

				// add filter to replace content with locker
				add_filter( 'the_content', array( $this, 'lock_content' ) );

//			}

           // we need to add the body class only on locked content
            $is_locked = true;
            $result = tds_util::get_subscriptions( get_current_user_id(), -1 );
            if ( !empty( $result ) || !empty( $result[ 'subscriptions' ] ) ) {
                $subscriptions = $result['subscriptions'];
                foreach ( $subscriptions as $subscription ) {
                    $valid_plan = false;
                    // check plan
                    if ( !empty( $tds_locker_types['tds_paid_subs_plan_ids'] ) && is_array( $tds_locker_types['tds_paid_subs_plan_ids'] ) && in_array( $subscription['plan_id'], $tds_locker_types['tds_paid_subs_plan_ids'] ) ) {
                        $valid_plan = true;
                    }
                    if ( $valid_plan ) {
                        if ( in_array($subscription['status'], ['free', 'active', 'trial'])) {
                            $is_locked = false;
                        }
                    }
                }
            }
            if ( $is_locked ) {
                // add the class on body
                add_filter( 'body_class', function ( $classes ) {
                    $classes[] = 'td-content-locked';
                    return $classes;
                } );
            }

		} else {

			// process content access from cookie
			$tds_leads_cookie_lock_access = true;
			$tds_leads_cookie = !empty( $_COOKIE['tds_leads'] ) ? $_COOKIE['tds_leads'] : false;
			if ( $tds_leads_cookie ) {

				// get cookie lists
				$tds_leads_cookie_lists = explode( ',', $tds_leads_cookie );

				// check if locker access list is found in the leads cookie..
				// ... if it's found it means that the visitor has access to the list and content should not be blocked
				if ( in_array( $tds_locker_email_list, $tds_leads_cookie_lists ) ) {
					$tds_leads_cookie_lock_access = false;
				}

			}


            // if we are dealing with a form submit, then the flag set above will possibly be overwritten
            if ( td_subscription::instance()->is_tds_form_submit() ) {

                // proceed if there are no errors
                if( !tds_form_submission::has_errors() ) {

                    // get the form submit result
                    $tds_form_submission_results = tds_form_submission::get_result();

                    // check to see if the form submit is a result of subscribing or unsubscribing this mailing list
                    if( isset( $tds_form_submission_results['new_lead_data'] ) ) {
                        // if the form submit is a result of subscribing and this is the mailing list
                        // that has been subscribed to, then set the flag to true and display a success message
                        if( $tds_form_submission_results['new_lead_data']['tds_list_id'] == $tds_locker_email_list ) {
                            $tds_leads_cookie_lock_access = false;
                        }
                    } else if( isset( $tds_form_submission_results['unsubscribed'] ) ) {
                        // if the form submit is a result of unsubscribing and this is the mailing list
                        // that has been unsubscribed from, then set the flag to false and display a success message
                        if( in_array( $tds_locker_email_list, $tds_form_submission_results['unsubscribed'] ) ) {
                            $tds_leads_cookie_lock_access = true;
                        }
                    }

                }

            }


			// if content lock is set
			if ( $tds_leads_cookie_lock_access || !empty( $cache_email ) ) {

				// set content as locked
				tds_email_locker::instance()->set_content_locked();

				// set locker id
				tds_email_locker::instance()->set_locker_id( $tds_locker_id );

				// set custom slug
				tds_email_locker::instance()->set_custom_slug( $tds_custom_slug );

				// set locker leads list id
				tds_email_locker::instance()->set_locker_leads_list_id( $tds_locker_email_list );

                // add the class on body
                add_filter( 'body_class', function ( $classes ) {
                    $classes[] = 'td-content-locked';
                    return $classes;
                } );

				// add filter to replace content with locker
				add_filter( 'the_content', array( $this, 'lock_content' ) );

			}

		}

	}

	public function set_locker_id($id) {
		$this->locker_id = $id;
	}

	public function set_locker_leads_list_id($id) {
		$this->locker_leads_list_id = $id;
	}

	public function set_content_locked() {
		$this->is_locked_content = true;
	}

	public function set_content_lock_type($type) {
		$this->content_lock_type = $type;
	}

	public function get_locker_id() {
		return $this->locker_id;
	}

	public function get_locker_leads_list_id() {
		return $this->locker_leads_list_id;
	}

	public function get_content_lock_type() {
		return $this->content_lock_type;
	}

	public function is_content_locked() {
		return $this->is_locked_content;
	}

	public function set_custom_slug($custom_slug) {
		$this->custom_slug = $custom_slug;
	}

	public function get_custom_slug() {
		return $this->custom_slug;
	}

	public function lock_content($content) {
		global $post;

		// do nothing when running for cloud templates
		// @todo maybe it's better to check here if it's 'post' post type..
		if( $post->post_type === 'tdb_templates' ) {
			return $content;
		}

		// bail if td composer's - td_global_blocks ( shortcodes render ) is not found
		// @note the td-subscription shortcodes are not registered if the td-composer plugin is not active
		if ( !class_exists( 'td_global_blocks' ) ) {

			tds_util::get_block_error(
				'tds_locker',
				'This block does not exist. Please activate the <span>tagDiv Composer</span> plugin in <a href="' . admin_url( 'admin.php?page=td_theme_plugins' ) . '" target="_blank">Theme Plugins</a>.'
			);

			return $content;
		}

		$tds_locker_id = tds_email_locker::instance()->get_locker_id();
		$tds_locker_types_meta = get_post_meta( $tds_locker_id, 'tds_locker_types', true );
		$tds_locker_settings_meta = get_post_meta( $tds_locker_id, 'tds_locker_settings', true );
		$tds_locker_styles_meta = get_post_meta( $tds_locker_id, 'tds_locker_styles', true );

		// get post permalink to redirect after submitting email to access content
		$post_permalink = get_permalink( $post->ID );

		$tds_locker_types_defaults = array(
			'tds_payable' => '',
		);

		// basic locker settings defaults
		$tds_locker_settings_defaults = array(
			'tds_title' => '',
			'tds_message' => '',
            'tds_input' => '',
			'tds_input_placeholder' => '',
			'tds_submit_btn_text' => '',
			'tds_after_btn_text' => '',
			'tds_pp_msg' => '',
		);

		// build locker styles defaults
		$tds_locker_styles_defaults = array(
            'tds_bg_color' => '',
            'all_tds_border' => '',
            'all_tds_border_color' => '',
            'all_tds_shadow' => '',
            'all_tds_shadow_color' => '',
            'tds_input_color_f' => '',
            'tds_input_bg_color' => '',
            'tds_input_bg_color_f' => '',
            'tds_input_border_color' => '',
            'tds_input_border_color_f' => '',
            'tds_submit_btn_text_color_h' => '',
            'tds_submit_btn_bg_color' => '',
            'tds_submit_btn_bg_color_h' => '',
            'tds_pp_checked_color' => '',
            'tds_pp_check_bg' => '',
            'tds_pp_check_bg_f' => '',
            'tds_pp_check_border_color' => '',
            'tds_pp_check_border_color_f' => '',
            'tds_pp_msg_links_color' => '',
            'tds_pp_msg_links_color_h' => '',
            'tds_general_font_family' => '',
            'tds_general_font_size' => '',
            'tds_general_font_line_height' => '',
            'tds_general_font_style' => '',
            'tds_general_font_weight' => '',
            'tds_general_font_transform' => '',
            'tds_general_font_spacing' => ''
		);
		foreach ( $tds_locker_settings_defaults as $setting_id => $val ) {
			// colors
			$tds_locker_styles_defaults[$setting_id . '_color'] = '';
			// fonts
			$tds_locker_styles_defaults[$setting_id . '_font_family'] = '';
			$tds_locker_styles_defaults[$setting_id . '_font_size'] = '';
			$tds_locker_styles_defaults[$setting_id . '_font_line_height'] = '';
			$tds_locker_styles_defaults[$setting_id . '_font_style'] = '';
			$tds_locker_styles_defaults[$setting_id . '_font_weight'] = '';
			$tds_locker_styles_defaults[$setting_id . '_font_transform'] = '';
			$tds_locker_styles_defaults[$setting_id . '_font_spacing'] = '';
		}

		$tds_locker_types = empty( $tds_locker_types_meta ) ? array() : $tds_locker_types_meta;
		$tds_locker_settings = empty( $tds_locker_settings_meta ) ? array() : $tds_locker_settings_meta;
		$tds_locker_styles = empty( $tds_locker_styles_meta ) ? array() : $tds_locker_styles_meta;

		// locker shortcode atts
		$tds_leads_list = tds_email_locker::instance()->get_locker_leads_list_id();

		$locker_shortcode_atts = array_merge(
			array_merge( $tds_locker_types_defaults, $tds_locker_types ),
			array_merge( $tds_locker_settings_defaults, $tds_locker_settings ),
			array_merge( $tds_locker_styles_defaults, $tds_locker_styles ),
			array(
				'tds_locker_id' => $tds_locker_id,
				'tds_leads_list' => empty( $tds_leads_list ) ? '' : $tds_leads_list,
				'tds_successful_submit_rdr_url' => $post_permalink,
				'b64_decode' => false,
			)
		);

		// content lock type
		switch ( tds_email_locker::instance()->get_content_lock_type() ) {
			case 'partial':

				if ( preg_match( '/\[tds_partial_locker (.*?)]/', $content, $matches ) ) {

					list( $content_before, $content_after ) = explode( $matches[0], $content, 2 );

					// apply the content locker wrapper
					$tds_locked_content = '<div class="tds-locked-content">' . $content_after . '</div>';

					// return content before locker + tds locker + locked content ( content after locker )
					return $content_before . td_global_blocks::get_instance('tds_locker')->render( $locker_shortcode_atts ) . $tds_locked_content;

				}

				break;
			case 'content':

				$pattern = get_shortcode_regex( array( 'tds_content_locker' ) );

				if ( preg_match( '/' . $pattern . '/s', $content, $matches ) ) {

					list( $content_before, $content_after ) = explode( $matches[0], $content, 2 );

					// apply the content locker wrapper
					$tds_locked_content = '<div class="tds-locked-content">' . $matches[5] . '</div>';

					// return content before locker + tds locker + locked content ( content after locker ) + content after
					return $content_before . td_global_blocks::get_instance('tds_locker')->render( $locker_shortcode_atts ) . $tds_locked_content . $content_after;

				}

				break;
			default: // full as default

				// apply the content locker wrapper to the full content
				$content = '<div class="tds-locked-content">' . $content . '</div>';

				// return tds locker + full locked content
				return td_global_blocks::get_instance('tds_locker')->render( $locker_shortcode_atts ) . $content;

		}

		return $content;

	}


}

tds_email_locker::instance();
