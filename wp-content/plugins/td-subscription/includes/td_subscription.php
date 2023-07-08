<?php
/**
 * td-subscription setup
 */

defined( 'ABSPATH' ) || exit;

class td_subscription {

    const SETTINGS = 'tds_settings';

	// single class instance
	protected static $_instance = null;

	// main td-subscription instance, ensures single load
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	// td_subscription constructor
	public function __construct() {
		$this->includes();
		$this->init();
	}

	// includes
	private function includes() {

		// load api
		require_once('tds_api.php');

		// load the utility class
		require_once "tds_util.php";

		// load the email notifications utility class
		require_once "tds_email_notifications.php";

		// load config
		require_once "tds_config.php";

		// load ajax requests callbacks ( rest api )
		require_once "tds_ajax.php";

		// tracking ajax ( rest api )
		require_once "link_conversion/tdt_ajax.php";

		// admin
		if ( $this->is_request( 'admin' ) ) {

			// admin class
			require_once('admin/tds_admin.php');

		}

		// frontend
		// load email locker
        require_once('frontend/tds_email_locker.php'); // @todo add in directory > email-locker/ ???

		// gutenberg blocks
        require_once('tds_gut.php');

        $tds_options = tds_util::get_tds_options();
		$cache_email = '';

		foreach ($tds_options as $tds_option) {
			switch ( $tds_option[ 'name' ] ) {
				case 'cache_email':
					$cache_email = $tds_option['value'];
					break;
			}
		}

		if ( empty( $cache_email ) ) {
		    // load tds form submission class
			if ( $this->is_request( 'tds-leads-form-submit' ) ) {
				require_once('tds_form_submission.php');
			}
        } else {
			require_once('tds_form_submission.php');
        }
	}

	// init
	private function init() {

		// load cpt
		add_action( 'init', array( __CLASS__, 'setup_environment' ) );

		// load plugin config/shortcodes
		add_action( 'tdc_loaded', array( 'tds_config', 'on_tdc_loaded' ), 10 );

		// email submission
		//if ( $this->is_request( 'tds-leads-form-submit' ) ) {}

		// load scripts
		add_action( 'wp_enqueue_scripts', function () {

			// load form submission js
			//if ( $this->is_request( 'tds-leads-form-submit' ) ) {
			//
			//	wp_register_script('tds-leads-form-submit', TDS_URL . '/assets/js/frontend/leads-form-submit.js', array( 'jquery' ), TD_SUBSCRIPTION, true );
			//	wp_enqueue_script('tds-leads-form-submit');
			//	wp_localize_script('tds-leads-form-submit','tds_leads_form_submit_data',
			//		array(
			//			'has_errors' => tds_form_submission::has_errors(),
			//			'errors' => tds_form_submission::get_errors(),
			//			'result' => tds_form_submission::get_result()
			//		)
			//	);
			//
			//}

            // load front css
            if ( TDS_DEPLOY_MODE == 'dev' ) {
                wp_enqueue_style( 'tds-front', TDS_URL . '/td_less_style.css.php?part=tds_front_main', false, TD_SUBSCRIPTION );
            } else {
                wp_enqueue_style( 'tds-front', TDS_URL . '/assets/css/tds-front.css', false, TD_SUBSCRIPTION_VERSION );
            }

			// load front js
			if ( $this->is_request( 'frontend' ) ) {

                // load the js
                if ( TDS_DEPLOY_MODE == 'dev' ) {
                    if ( class_exists( 'tdc_util', false ) ) {
                        tdc_util::enqueue_js_files_array( tds_config::$js_files_for_front, array( 'jquery', 'underscore' ), TDS_URL, TD_SUBSCRIPTION );
                    } else {
                        foreach ( tds_config::$js_files_for_front as $js_file_id => $js_file_url ) {
                            wp_enqueue_script( $js_file_id, TDS_URL . $js_file_url, array( 'jquery', 'underscore' ), TDS_URL, true );
                        }
                    }
                } else {
                    wp_enqueue_script( 'tds_js_files_for_front', TDS_URL . '/assets/js/js_files_for_front.min.js', array( 'jquery', 'underscore' ), TD_SUBSCRIPTION_VERSION, true );
                }

                //if ( class_exists( 'tdc_util', false ) ) {
                //    tdc_util::enqueue_js_files_array( tds_config::$js_files_for_front, array( 'jquery', 'underscore' ), TDS_URL, TD_SUBSCRIPTION );
                //} else {
                //
                //    foreach ( tds_config::$js_files_for_front as $js_file_id => $js_file_url ) {
                //        wp_enqueue_script( $js_file_id, TDS_URL . $js_file_url, array( 'jquery', 'underscore' ), TDS_URL, true );
                //    }
                //
                //}

			}

			if ( TDS_DEPLOY_MODE == 'dev' ) {
                wp_localize_script('tdsLeads','tds_js_globals',
                    array(
                        'wpRestNonce' => wp_create_nonce('wp_rest'),
                        'wpRestUrl' => rest_url(),
                        'permalinkStructure' => get_option('permalink_structure'),
                    )
                );
			} else {
			    wp_localize_script('tds_js_files_for_front','tds_js_globals',
                    array(
                        'wpRestNonce' => wp_create_nonce('wp_rest'),
                        'wpRestUrl' => rest_url(),
                        'permalinkStructure' => get_option('permalink_structure'),
                    )
                );
            }

		}, 11);

		// on activate..
		register_activation_hook( TDS_PLUGIN_FILE, function () {

			// register the cpt & tax
			self::setup_environment();

			// add the default locker
			self::add_default_locker(
				'tds_default_locker_id',
				array(
					'post_type' => 'tds_locker',
					'post_title' => 'Locker (default)',
					'post_name' => 'tds_default_locker'
				),
				array(
					'tds_locker_settings' => array(
						'tds_title' => 'This Content Is Only For Subscribers',
						'tds_message' => 'Please subscribe to unlock this content. Enter your email to get access.',
						'tds_input_placeholder' => 'Please enter your email address.',
						'tds_submit_btn_text' => 'Subscribe to unlock',
						'tds_after_btn_text' => 'Your email address is 100% safe from spam!',
						'tds_pp_msg' => 'I consent to processing of my data according to <a href="#">Terms of Use</a> & <a href="#">Privacy Policy</a>'
					),
					'tds_locker_preview' => array(),
					'tds_locker_access_settings' => array(
						'tds_locker_email_list' => get_option( 'default_term_tds_list' )
					),
				)
			);

			self::create_db();

			$current_version = tds_util::get_tds_option('version' );
			if ( empty( $current_version ) ) {
			    tds_util::set_tds_option('version', TD_SUBSCRIPTION_VERSION );
            } else {
			    require_once('tds_update.php');
                tds_update::update_settings( $current_version );
            }

			tds_ajax::create_wizard_pages();

			tds_ajax::create_general_settings();
			tds_ajax::create_emails_settings();

			flush_rewrite_rules();  // and... flush

            if ( ! wp_next_scheduled( 'tds_cron_hook' ) ) {
                //wp_schedule_event( time(), 'sixty_seconds', 'tds_cron_hook' );
                wp_schedule_event( time(), 'daily', 'tds_cron_hook' );
            }

		});

        //add_filter( 'cron_schedules', 'tds_add_cron_interval' );
        //function tds_add_cron_interval( $schedules ) {
        //    $schedules[ 'sixty_seconds' ] = array(
        //        'interval' => 60,
        //        'display'  => esc_html__( 'Every 60 Seconds' ),
        //    );
        //    return $schedules;
        //}

        //function tds_print_tasks() {
        //    echo '<pre>'; print_r( _get_cron_array() ); echo '</pre>';
        //    die;
        //}
        //tds_print_tasks();

		add_action( 'tds_cron_hook', function () {
            tds_util::get_subscriptions();
        });

		// on deactivate..
		register_deactivation_hook( __FILE__, function() {

		    wp_clear_scheduled_hook( 'tds_cron_hook' );

		    flush_rewrite_rules(); // flush permalinks
        });

		// exclude tds_email/tds_locker cpts from theme's cpt support
		add_filter( 'td_custom_post_types', function ( $td_cpts ) {
			$tds_email = array_search('tds_email', $td_cpts );
			if( $tds_email !== false ) {
				unset($td_cpts[$tds_email]);
			}
			$tds_locker = array_search('tds_locker', $td_cpts );
			if( $tds_locker !== false ) {
				unset($td_cpts[$tds_locker]);
			}
			return $td_cpts;
		}, 10, 1 );

		// add locker settings tab to theme post/page settings metabox
		add_filter( 'td_post_settings_tabs', array( __CLASS__, 'add_locker_settings_tab' ), 10, 1 );
		add_filter( 'td_page_settings_tabs', array( __CLASS__, 'add_locker_settings_tab' ), 10, 1 );

		// on admin
		if ( $this->is_request( 'admin' ) ) {

			// enqueue admin js/css
			add_action( 'admin_enqueue_scripts', function () {

			    wp_enqueue_script( 'jquery-ui-datepicker' );
			    //wp_register_style( 'jquery-ui', 'https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css' );
                wp_enqueue_style( 'jquery-ui' );

				// css for wp-admin/backend
				if ( TDS_DEPLOY_MODE == 'dev' ) {
					wp_enqueue_style( 'tds-admin', TDS_URL . '/td_less_style.css.php?part=tds_admin_main', false, TD_SUBSCRIPTION );
				} else {
					wp_enqueue_style( 'tds-admin', TDS_URL . '/assets/css/tds-admin.css', false, TD_SUBSCRIPTION_VERSION );
				}

			});

			// change view link in tds list taxonomies list table
			add_filter( 'term_link', function ( $termlink, $term, $taxonomy ) {

				if ( function_exists( 'get_current_screen' ) ) {

					// get the current screen
					$current_screen = get_current_screen();

					if ( $taxonomy === 'tds_list' && $current_screen->id === 'edit-tds_list' ) {

						$path = 'edit.php?post_type=tds_email&tds_list=' . $term->slug;
						$termlink = admin_url($path);

					}
				}

				return $termlink;

			}, 10, 3 );

			// add filter support on wp-admin tds_email cpt list
			add_action( 'restrict_manage_posts', function ( $post_type ) {

				if ( 'tds_email' === $post_type ) {

                    // output select html for emails lists dropdown filter
					echo '<select name="tds_list" id="tds_list" class="postform">';
					echo '<option value="">All Lists</option>';

					$tds_lists = get_terms(
						array(
							'taxonomy' => 'tds_list',
							'hide_empty' => false,
						)
					);

					foreach ( $tds_lists as $list ) {
						$selected = $_GET['tds_list'] ?? null;
						echo '<option value='. $list->slug, $selected == $list->slug ? ' selected="selected"' : '','>' . $list->name .'</option>';
					}

					echo "</select>";

                    // output select html for emails lists dropdown filter
                    echo '<select name="tds_validate_email" id="tds_validate_email" class="postform">';
                    echo '<option value="">All emails</option>';
                    $double_optin_options = array(
                        'yes',
                        'no',
                    );

                    foreach ( $double_optin_options as $double_optin_option ) {
                        $selected = $_GET['tds_validate_email'] ?? null;
                        $name = $double_optin_option === 'yes' ? 'Confirmed' : $double_optin_option;

                        // output each select option line, check against the last $_GET to show the current option selected
                        echo '<option value='. $double_optin_option, $selected == $double_optin_option ? ' selected="selected"' : '','>' . ucfirst($name) .'</option>';
                    }

                    echo "</select>";

				}

			});

            add_action( 'pre_get_posts', function( $query ) {
                if (!is_admin() && !$query->is_main_query())
                    return;

                if (isset($_GET['tds_validate_email']) && $_GET['tds_validate_email'] != '') {
                    $args = array(
                        'post_type'  => 'tds_email',
                        'post_status' => 'publish',
                        'meta_query' => array(
                            array(
                                'key'     => 'tds_validate_email',
                                'value'   => $_GET['tds_validate_email']  ,
                            ),
                        ),
                    );

                    $query->set('meta_query', $args );
                }

            });

            // add export leads csv button in the TOP tablenav for the tds_email list admin page
			add_action( 'manage_posts_extra_tablenav', function ($which) {

				// get the current screen
				$current_screen = get_current_screen();
				// if it's the emails listing page
				if ( isset( $current_screen->id ) && $current_screen->id === 'edit-tds_email' ) {
                     if ( 'top' === $which ) {

                        // build & display download button
                        $url = admin_url('edit.php');

                        //add tds_validate_email param to download csv based on confirmed (or not) emails
                        $tds_validate_email_param = '';
                        if (isset($_GET['tds_validate_email']) && $_GET['tds_validate_email'] != '') {
                            $tds_validate_email_param = '&tds_validate_email=' . $_GET['tds_validate_email'];
                        }

                        global $wp;
                        $query = $wp->query_string;
                        if ( $query ) { ?>
                            <div class="alignleft actions custom">
                            <?php $url .= '?' . $query . $tds_validate_email_param . '&tds_action=download_csv_file';
                            echo '<a href="' . $url . '" class="button button-primary button-lg csv-download-button" >Download CSV file</a>'; ?>
                            </div>
                        <?php }
                     }
                }

			});

			// handle export csv download btn action ..on current_screen
			add_action( 'current_screen', function ( $current_screen ) {

				if ( isset( $current_screen->id ) && $current_screen->id === 'edit-tds_email' ) {

					// hook later.. after wp env setup to have access to wp query
					add_action( 'wp', function () {

						if ( isset( $_GET['tds_action'] ) && $_GET['tds_action'] == 'download_csv_file' ) {

							global $wp_query;

							// query
							$emails = $wp_query->get_posts();

							// file creation
							$wp_filename = "tds_leads_" . date("d-m-y") . ".csv";

							// clean object
							ob_end_clean();

							// open file
							$wp_file = fopen( $wp_filename, "w" );

							// loop for insert data into csv file
							foreach ( $emails as $email ) {

                                // list
								$list = wp_get_post_terms( $email->ID, 'tds_list' );
                                $tds_validate_email = get_post_meta( $email->ID, 'tds_validate_email', true );

								$wp_array = array(
									"id"            => $email->ID,
									"date_created"  => $email->post_date,
									"email"         => $email->post_title,
									"list"          => implode( ',', array_column( $list, 'name' ) ),
                                    "confirmed"     => $tds_validate_email
								);

								// get locker id
								$locker_id = get_post_meta( $email->ID, 'tds_locker_id', true );

								// get locker cf name
								$locker_settings_meta = get_post_meta( $locker_id, 'tds_locker_settings', true );

								// custom fields data
								for ( $i = 1; $i <= 3; $i++ ) {

                                    // locker cf name
									//$locker_cf_name = !empty( $locker_settings_meta["tds_locker_cf_{$i}_name"] ) ? $locker_settings_meta["tds_locker_cf_{$i}_name"] : 'Locker Custom Field ' . $i;

                                    // cf value
									$cf_val = get_post_meta( $email->ID, "tds_locker_cf_{$i}", true );
									//if ( $cf_val === '' ) {
										//$cf_val = '-';
									//}

									//$wp_array["tds_locker_cf_{$i}"] = $locker_cf_name . ': ' . $cf_val;
									$wp_array["tds_locker_cf_{$i}"] = $cf_val;

								}

								fputcsv( $wp_file, $wp_array );

							}

							// close file
							fclose($wp_file);

							// download csv file
							header("Content-Description: File Transfer");
							header("Content-Disposition: attachment; filename=" . $wp_filename);
							header("Content-Type: application/csv;");
							readfile( $wp_filename );

							exit;

						}

					});

				}

			});

			// admin menu
			add_action( 'admin_menu', array( __CLASS__, 'admin_menu' ) );

			// replace trash with delete email link on tds email cpt post_row_actions
			add_filter( 'post_row_actions', array( __CLASS__, 'post_row_actions' ), 10, 2 );
			add_filter( 'bulk_actions-edit-tds_email', function ( $actions ) {

				$has_delete = ( isset( $actions['trash'] ) || isset( $actions['delete'] ) );

				unset( $actions['trash'], $actions['delete'] );

				if ( $has_delete ) {
					$actions['delete'] = 'Delete';
				}

				unset( $actions['edit'] );

				return $actions;

			});

			// tds email post type edit metaboxes
			add_action( 'add_meta_boxes', function () {
				global $wp_meta_boxes;

				// remove the default cpt 'Publish' & 'Slug' metaboxes
				remove_meta_box( 'submitdiv', 'tds_email', 'side' );
				remove_meta_box( 'slugdiv', 'tds_email', 'normal' );

				// add our custom status meta box
				add_meta_box( 'tds_email', 'Status', array( __CLASS__, 'print_status_meta_box' ), 'tds_email', 'side' );

				// only the expected metaboxes are shown on this screen
				$allowed_metaboxes = array( 'tds_listdiv', 'tds_email' );
				foreach ( $wp_meta_boxes['tds_email'] as $context => $metabox_contexts ) {
					foreach ( $metabox_contexts as $metabox_priorities ) {
						foreach ( array_keys( $metabox_priorities ) as $id ) {
							if ( !in_array( $id, $allowed_metaboxes, true ) ) {
								remove_meta_box( $id, 'tds_email', $context );
							}
						}
					}
				}

			}, PHP_INT_MAX );

			// admin notices
			add_filter( 'post_updated_messages', array( __CLASS__, 'post_updated_messages' ) );
			add_filter( 'bulk_post_updated_messages', array( __CLASS__, 'bulk_post_updated_messages' ), 10, 2 );

		}

		// add locked articles(posts) filter to cloud library loop blocks @see tdb_config::get_loop_map_filter_array()
		add_filter( 'td_cloud_library_loop_map_filter_array', array( __CLASS__, 'add_locked_posts_filter' ), 10, 2 );

		// add locked articles(posts) filter to td composer flex/big grid/slide blocks @see td_config::get_map_filter_array()
		add_filter( 'td_composer_map_filter_array', array( __CLASS__, 'add_locked_posts_filter' ), 10, 2 );

		// add locked articles(posts) filter wp query args to blocks @see td_data_source::get_wp_query()
		add_filter( 'td_data_source_blocks_query_args', array( __CLASS__, 'add_locked_posts_filter_args' ), 10, 2 );

        // add exclusive label to td composer flex/big grid/slide modules @see td_config::get_map_exclusive_label_array()
        add_filter( 'td_composer_map_exclusive_label_array', array( __CLASS__, 'add_exclusive_label_settings' ), 10, 4 );

        // add 'exclusive' class to td composer flex modules
        add_filter( 'td_composer_module_exclusive_class', array( __CLASS__, 'add_exclusive_class_on_modules' ), 10, 2 );

        // add 'exclusive' class to cloud library modules
        add_filter( 'td_cloud_library_module_exclusive_class', array( __CLASS__, 'add_exclusive_class_on_cloud_modules' ), 10, 2 );

		// add the save_filter callback option on post theme settings metabox..
		add_filter( 'td_post_theme_settings_mb_setup_options', array( __CLASS__, 'add_mb_setup_options' ) );

		// add translations
		add_action( 'after_setup_theme', function() {
			global $td_translation_map;

            $theme = '';
            if( defined('TD_THEME_NAME') ) {
                $theme = strtolower(TD_THEME_NAME);
            }

			$td_translation_map['Success'] = __('Success', $theme);
			$td_translation_map['Acknowledgment is required!'] = __('Acknowledgment is required!', $theme);
			$td_translation_map['Please fill in a valid email.'] = __('Please fill in a valid email.', $theme);
			$td_translation_map['Please fill in an email address.'] = __('Please fill in an email address.', $theme);
            $td_translation_map['My account'] = __('My account', $theme);
            $td_translation_map['Get into your account.'] = __('Get into your account.', $theme);
            $td_translation_map['My subscription account'] = __('My subscription account', $theme);
            $td_translation_map['Account details'] = __('Account details', $theme);
            $td_translation_map['Billing details'] = __('Billing details', $theme);
            $td_translation_map['Subscriptions'] = __('Subscriptions', $theme);
            $td_translation_map['My woo account'] = __('My woo account', $theme);
            $td_translation_map['Log out'] = __('Log out', $theme);
            $td_translation_map['Email address'] = __('Email address', $theme);
            $td_translation_map['Username'] = __('Username', $theme);
            $td_translation_map['Password'] = __('Password', $theme);
            $td_translation_map['must contain at least one lower case (a..z)'] = __('must contain at least one lower case (a..z)', $theme);
            $td_translation_map['must contain at least one upper case (A..Z)'] = __('must contain at least one upper case (A..Z)', $theme);
            $td_translation_map['must contain at least 6 characters in length'] = __('must contain at least 6 characters in length', $theme);
            $td_translation_map['Repeat password'] = __('Repeat password', $theme);
            $td_translation_map['Already have an account?'] = __('Already have an account?', $theme);
            $td_translation_map['Recover password'] = __('Recover password', $theme);
            $td_translation_map['Username or Email address'] = __('Username or Email address', $theme);
            $td_translation_map['Forgot password?'] = __('Forgot password?', $theme);
            $td_translation_map['Reset your password'] = __('Reset your password', $theme);
            $td_translation_map['The password reset key has expired.'] = __('The password reset key has expired.', $theme);
            $td_translation_map['The password reset key is invalid.'] = __('The password reset key is invalid.', $theme);
            $td_translation_map['New password *'] = __('New password *', $theme);
            $td_translation_map['Repeat new password *'] = __('Repeat new password *', $theme);
            $td_translation_map['Save password'] = __('Save password', $theme);
            $td_translation_map['Save password'] = __('Save password', $theme);
            $td_translation_map['Your account has been successfully activated!'] = __('Your account has been successfully activated!', $theme);
            $td_translation_map['Your account has already been activated!'] = __('Your account has already been activated!', $theme);
            $td_translation_map['Check your email for the correct activation link. This link is invalid.'] = __('Check your email for the correct activation link. This link is invalid.', $theme);
            $td_translation_map['Account activation'] = __('Account activation', $theme);
            $td_translation_map['Your account has already been activated!'] = __('Your account has already been activated!', $theme);
            $td_translation_map['Check your email for the correct activation link. This link is invalid.'] = __('Check your email for the correct activation link. This link is invalid.', $theme);
            $td_translation_map['Please enter a new password before proceeding.'] = __('Please enter a new password before proceeding.', $theme);
            $td_translation_map['Please confirm the new password before proceeding.'] = __('Please confirm the new password before proceeding.', $theme);
            $td_translation_map['Please make sure that the passwords match.'] = __('Please make sure that the passwords match.', $theme);
            $td_translation_map['The password has been reset successfully.'] = __('The password has been reset successfully.', $theme);
            $td_translation_map['Don\'t have an account?'] = __('Don\'t have an account?', $theme);
            $td_translation_map['Dashboard'] = __('Dashboard', $theme);
            $td_translation_map['Welcome to your account!'] = __('Welcome to your account!', $theme);
            $td_translation_map['Hello %1$s (not %2$s? %3$s)! From your account dashboard you can view your subscriptions and manage your account details.'] = __('Hello %1$s (not %2$s? %3$s)! From your account dashboard you can view your subscriptions and manage your account details.', $theme);
            $td_translation_map['Lost Password'] = __('Lost Password', $theme);
            $td_translation_map['Account settings'] = __('Account settings', $theme);
            $td_translation_map['Manage your account details.'] = __('Manage your account details.', $theme);
            $td_translation_map['Manage your billing details.'] = __('Manage your billing details.', $theme);
            $td_translation_map['First name'] = __('First name', $theme);
            $td_translation_map['Last name'] = __('Last name', $theme);
            $td_translation_map['Display name'] = __('Display name', $theme);
            $td_translation_map['Current password'] = __('Current password', $theme);
            $td_translation_map['(leave blank to leave unchanged)'] = __('(leave blank to leave unchanged)', $theme);
            $td_translation_map['New password'] = __('New password', $theme);
            $td_translation_map['Confirm new password'] = __('Confirm new password', $theme);
            $td_translation_map['Save changes'] = __('Save changes', $theme);
            $td_translation_map['All your subscriptions.'] = __('All your subscriptions.', $theme);
            $td_translation_map['Remaining publishing rights.'] = __('Remaining publishing rights', $theme);
            $td_translation_map['The number of articles you have left to publish across different post types.'] = __('The number of articles you have left to publish across different post types.', $theme);
            $td_translation_map['Plan'] = __('Plan', $theme);
            $td_translation_map['Payment type'] = __('Payment type', $theme);
            $td_translation_map['Price'] = __('Price', $theme);
            $td_translation_map['Status'] = __('Status', $theme);
            $td_translation_map['Months'] = __('Months', $theme);
            $td_translation_map['Start date'] = __('Start date', $theme);
            $td_translation_map['End date'] = __('End date', $theme);
            $td_translation_map['missing plan'] = __('missing plan', $theme);
            $td_translation_map['Bank transfer'] = __('Bank transfer', $theme);
            $td_translation_map['Free'] = __('Free', $theme);
            $td_translation_map['Active'] = __('Active', $theme);
            $td_translation_map['Trial'] = __('Trial', $theme);
            $td_translation_map['Blocked'] = __('Blocked', $theme);
            $td_translation_map['Closed'] = __('Closed', $theme);
            $td_translation_map['Canceled'] = __('Canceled', $theme);
            $td_translation_map['Not paid'] = __('Not paid', $theme);
            $td_translation_map['Awaiting payment'] = __('Awaiting payment', $theme);
            $td_translation_map['Subscription info'] = __('Subscription info', $theme);
            $td_translation_map['ID'] = __('ID', $theme);
            $td_translation_map['Name'] = __('Name', $theme);
            $td_translation_map['Company name'] = __('Company name', $theme);
            $td_translation_map['VAT'] = __('VAT', $theme);
            $td_translation_map['Address'] = __('Address', $theme);
            $td_translation_map['City'] = __('City', $theme);
            $td_translation_map['Country/State'] = __('Country/State', $theme);
            $td_translation_map['Email'] = __('Email', $theme);
            $td_translation_map['Postal code'] = __('Postal code', $theme);
            $td_translation_map['Direct bank transfer details'] = __('Direct bank transfer details', $theme);
            $td_translation_map['Account name'] = __('Account name', $theme);
            $td_translation_map['Account number'] = __('Account number', $theme);
            $td_translation_map['Bank name'] = __('Bank name', $theme);
            $td_translation_map['Routing number'] = __('Routing number', $theme);
            $td_translation_map['IBAN'] = __('IBAN', $theme);
            $td_translation_map['Bic/Swift'] = __('Bic/Swif', $theme);
            $td_translation_map['Instructions'] = __('Instructions', $theme);
            $td_translation_map['No subscription created.'] = __('No subscription created.', $theme);
            $td_translation_map['Choose plan'] = __('Choose plan', $theme);
            $td_translation_map['Payment methods'] = __('Payment methods', $theme);
            $td_translation_map['Direct Bank Transfer'] = __('Direct Bank Transfer', $theme);
            $td_translation_map['Payment method'] = __('Payment method', $theme);
            $td_translation_map['Total'] = __('Total', $theme);
            $td_translation_map['Period'] = __('Period', $theme);
            $td_translation_map['Subscription summary'] = __('Subscription summary', $theme);
            $td_translation_map['Phone'] = __('Phone', $theme);
            $td_translation_map['Postcode'] = __('Postcode', $theme);
            $td_translation_map['County'] = __('County', $theme);
            $td_translation_map['Town/City'] = __('Town/City', $theme);
            $td_translation_map['Street address'] = __('Street address', $theme);
            $td_translation_map['Country/Region'] = __('Country/Region', $theme);
            $td_translation_map['VAT Number'] = __('VAT Number', $theme);
            $td_translation_map['(optional)'] = __('(optional)', $theme);
            $td_translation_map['Billing details'] = __('Billing details', $theme);
            $td_translation_map['User information'] = __('User information', $theme);
            $td_translation_map['It seems that no available payment methods have been configured.'] = __('It seems that no available payment methods have been configured.', $theme);
            $td_translation_map['Thank you! We are delighted to see you here. Your subscription will be activated soon!'] = __('Thank you! We are delighted to see you here. Your subscription will be activated soon!', $theme);
            $td_translation_map['Our bank details'] = __('Our bank details', $theme);
            $td_translation_map['Your subscription details'] = __('Your subscription details', $theme);
            $td_translation_map['View subscription'] = __('View subscription', $theme);
            $td_translation_map['You have not selected a valid subscription plan.'] = __('You have not selected a valid subscription plan.', $theme);
            $td_translation_map['Field empty'] = __('Field empty', $theme);
            $td_translation_map['Empty first name'] = __('Empty first name', $theme);
            $td_translation_map['Empty last name'] = __('Empty last name', $theme);
            $td_translation_map['Empty country'] = __('Empty country', $theme);
            $td_translation_map['Empty address'] = __('Empty address', $theme);
            $td_translation_map['Empty city'] = __('Empty city', $theme);
            $td_translation_map['Empty county'] = __('Empty county', $theme);
            $td_translation_map['Empty postcode'] = __('Empty postcode', $theme);
            $td_translation_map['Empty phone'] = __('Empty phone', $theme);
            $td_translation_map['Empty email'] = __('Empty email', $theme);
            $td_translation_map['Email or username empty!'] = __('Email or username empty!', $theme);
            $td_translation_map['Pass empty!'] = __('Pass empty!', $theme);
            $td_translation_map['Username incorrect!'] = __('Username incorrect!', $theme);
            $td_translation_map['Invalid Pass Pattern!'] = __('Invalid Pass Pattern!', $theme);
            $td_translation_map['Retyped Pass incorrect!'] = __('Retyped Pass incorrect!', $theme);
            $td_translation_map['Please activate your account by following the link sent to your email address.'] = __('Please activate your account by following the link sent to your email address.', $theme);
            $td_translation_map['Resend activation link'] = __('Resend activation link', $theme);
            $td_translation_map['In order to have access to this section, you have to activate your account.'] = __('In order to have access to this section, you have to activate your account.', $theme);
            $td_translation_map['In order to update this filed, you have to activate your account.'] = __('In order to update this filed, you have to activate your account.', $theme);
            $td_translation_map['Email empty!'] = __('Email empty!', $theme);
            $td_translation_map['Username empty!'] = __('Username empty!', $theme);
            $td_translation_map['Pass pattern incorrect!'] = __('Pass pattern incorrect!', $theme);
            $td_translation_map['Retyped pass empty!'] = __('Retyped pass empty!', $theme);
            $td_translation_map['Retyped pass exactly!'] = __('Retyped pass exactly!', $theme);
            $td_translation_map['User already exists!'] = __('User already exists!', $theme);
            $td_translation_map['Email already exists!'] = __('Email already exists!', $theme);
            $td_translation_map['Your account could not be created.'] = __('Your account could not be created.', $theme);
            $td_translation_map['Please check your email (inbox or spam folder) to validate your account.'] = __('Please check your email (inbox or spam folder) to validate your account.', $theme);
            $td_translation_map['User empty!'] = __('User empty!', $theme);
            $td_translation_map['User does not exists!'] = __('User does not exists!', $theme);
            $td_translation_map['New activation link was generated. Please check your email (inbox or spam folder) to validate your account.'] = __('New activation link was generated. Please check your email (inbox or spam folder) to validate your account.', $theme);
            $td_translation_map['You must be logged out to view this page.'] = __('You must be logged out to view this page.', $theme);
            $td_translation_map['%s is a required field.'] = __('%s is a required field.', $theme);
            $td_translation_map['Cannot process %s field.'] = __('Cannot process %s field.', $theme);
            $td_translation_map['Please provide a valid email address.'] = __('Please provide a valid email address.', $theme);
            $td_translation_map['This email address is already registered.'] = __('This email address is already registered.', $theme);
            $td_translation_map['Please fill out all password fields.'] = __('Please fill out all password fields.', $theme);
            $td_translation_map['Please enter your current password.'] = __('Please enter your current password.', $theme);
            $td_translation_map['Please re-enter your password.'] = __('Please re-enter your password.', $theme);
            $td_translation_map['New passwords do not match.'] = __('New passwords do not match.', $theme);
            $td_translation_map['Your current password is incorrect.'] = __('Your current password is incorrect.', $theme);
            $td_translation_map['Account details changed successfully.'] = __('Account details changed successfully.', $theme);
            $td_translation_map['A new activation link has been sent to your email address!'] = __('A new activation link has been sent to your email address!', $theme);
            $td_translation_map['unlimited'] = __('unlimited', $theme);
            $td_translation_map['Pay with Stripe'] = __('Pay with Stripe', $theme);
            $td_translation_map['Cancel subscription'] = __('Cancel subscription', $theme);
            $td_translation_map['Please check your email and confirm subscription!'] = __('Please check your email and confirm subscription!', $theme);
            $td_translation_map['Successfully subscribed!'] = __('Successfully subscribed!', $theme);
            $td_translation_map['Successfully unsubscribed!'] = __('Successfully unsubscribed!', $theme);
            $td_translation_map['Cancel subscription'] = __('Cancel subscription', $theme);
            $td_translation_map['Enter promo code here'] = __('Enter promo code here', $theme);
            $td_translation_map['Apply'] = __('Apply', $theme);
            $td_translation_map['Coupon applied'] = __('Coupon applied', $theme);
            $td_translation_map['Uncaught Error: Something went wrong, please reload page and try again!'] = __('Uncaught Error: Something went wrong, please reload page and try again!', $theme);
            $td_translation_map['The coupon code you entered is invalid'] = __('The coupon code you entered is invalid', $theme);
            $td_translation_map['The coupon code you entered has reached its usage limit'] = __('The coupon code you entered has reached its usage limit', $theme);
            $td_translation_map['The coupon code you entered has expired'] = __('The coupon code you entered has expired', $theme);
            $td_translation_map['Coupon name is required !'] = __('Coupon name is required !', $theme);
            $td_translation_map['Please enter a coupon code first!'] = __('Please enter a coupon code first!', $theme);
            $td_translation_map['Invalid'] = __('Invalid', $theme);
            $td_translation_map['Applied'] = __('Applied', $theme);
            $td_translation_map['Remove'] = __('Remove', $theme);
            $td_translation_map['Price not set'] = __('Price not set', $theme);
            $td_translation_map['Grand Total'] = __('Grand Total', $theme);
            $td_translation_map['You already have a subscription, but it\'s still in waiting to be paid!'] = __('You already have a subscription, but it\'s still in waiting to be paid!', $theme);
            $td_translation_map['This subscription has been canceled and it will end on %END_DATE%.'] = __('This subscription has been canceled and it will end on %END_DATE%.', $theme);
            $td_translation_map['Go to checkout'] = __('Go to checkout', $theme);
            $td_translation_map['Stripe invoice details'] = __('Stripe invoice details', $theme);
            $td_translation_map['Stripe subscription details'] = __('Stripe subscription details', $theme);
            $td_translation_map['Current status'] = __('Current status', $theme);
            $td_translation_map['Initial Invoice Paid'] = __('Initial Invoice Paid', $theme);
            $td_translation_map['Subscription Create: Initial Invoice Paid'] = __('Subscription Create: Initial Invoice Paid', $theme);
            $td_translation_map['Subscription Create: Initial Invoice has been created'] = __('Subscription Create: Initial Invoice has been created', $theme);
            $td_translation_map['Subscription Create: Initial Invoice has been finalized, and it is ready to be paid'] = __('Subscription Create: Initial Invoice has been finalized, and it is ready to be paid', $theme);
            $td_translation_map['Subscription Update: Invoice Paid'] = __('Subscription Update: Invoice Paid', $theme);
            $td_translation_map['Subscription Renew: Invoice Paid'] = __('Subscription Renew: Invoice Paid', $theme);
            $td_translation_map['Subscription Renew: Invoice Finalized'] = __('Subscription Renew: Invoice Finalized', $theme);
            $td_translation_map['Subscription Renew: Invoice Created'] = __('Subscription Renew: Invoice Created', $theme);
            $td_translation_map['Subscription Renew: Invoice Upcoming'] = __('Subscription Renew: Invoice Upcoming', $theme);
            $td_translation_map['Subscription Expired: Invoice Voided(the first invoice was not paid)'] = __('Subscription Expired: Invoice Voided(the first invoice was not paid)', $theme);
            $td_translation_map['Subscription Deleted'] = __('Subscription Deleted', $theme);
            $td_translation_map['Subscription Create: Trialing'] = __('Subscription Create: Trialing', $theme);
            $td_translation_map['Subscription Canceled'] = __('Subscription Canceled', $theme);
            $td_translation_map['Subscription Create: Initial Invoice voided'] = __('Subscription Create: Initial Invoice voided', $theme);
            $td_translation_map['Subscription Renew: Invoice voided'] = __('Subscription Renew: Invoice voided', $theme);
            $td_translation_map['Subscription Update: Invoice voided'] = __('Subscription Update: Invoice voided', $theme);
            $td_translation_map['Invoice updated'] = __('Invoice updated', $theme);
            $td_translation_map['Trial End Renew failed due to missing a default payment method fro your account. Please consider adding a default payment method. You can use the "Stripe" button above to setup a payment for your account which will be used to pay subscriptions waiting to be paid.'] = __('Trial End Renew failed due to missing a default payment method fro your account. Please consider adding a default payment method. You can use the "Stripe" button above to setup a payment for your account which will be used to pay subscriptions waiting to be paid.', $theme);
            $td_translation_map['Subscription has been canceled and will end on: '] = __('Subscription has been canceled and will end on: ', $theme);
            $td_translation_map['Setup successful - You have successfully set up your payment method for future payments.'] = __('Setup successful - You have successfully set up your payment method for future payments.', $theme);
            $td_translation_map['Setup failed - We are sorry, there was an error setting up your payment method. Please try again with a different payment method.'] = __('Setup failed - We are sorry, there was an error setting up your payment method. Please try again with a different payment method.', $theme);
            $td_translation_map['Payment successful - Your latest subscription payment was completed successfully.'] = __('Payment successful - Your latest subscription payment was completed successfully.', $theme);
            $td_translation_map['Payment processing - Your latest subscription payment is being processed.'] = __('Payment processing - Your latest subscription payment is being processed.', $theme);
            $td_translation_map['Payment failed - We are sorry, there was an error processing your payment. Please try again with a different payment method.'] = __('Payment failed - We are sorry, there was an error processing your payment. Please try again with a different payment method.', $theme);
            $td_translation_map['View'] = __('View', $theme);
            $td_translation_map['Download'] = __('Download', $theme);
            $td_translation_map['Stripe invoice'] = __('Stripe invoice', $theme);
            $td_translation_map['N/A'] = __('N/A', $theme);
            $td_translation_map['Unpaid subscription.'] = __('Unpaid subscription.', $theme);
            $td_translation_map['Locked subscription.'] = __('Locked subscription.', $theme);
            $td_translation_map['Invalid subscription.'] = __('Invalid subscription.', $theme);
            $td_translation_map['Pay now'] = __('Pay now', $theme);
            $td_translation_map['Show more info'] = __('Show more info', $theme);
            $td_translation_map['Complete payment'] = __('Complete payment', $theme);

		}, 12 ); // hook later after td_config ( td_config hook runs on 11 priority )

        add_action( 'after_setup_theme', function () {
            $current_user = wp_get_current_user();
            if ( is_user_logged_in() && in_array('subscriber', $current_user->roles) ) {
                show_admin_bar(false);
            }
        });

        // add body classes
        add_filter( 'body_class', array( __CLASS__, 'add_body_classes' ) );

        add_action( 'wp_head', function() {

            $tds_options = tds_util::get_tds_options();
            $cache_email = '';

            foreach ($tds_options as $tds_option) {
                switch ( $tds_option[ 'name' ] ) {
                    case 'cache_email':
                        $cache_email = $tds_option[ 'value' ];
                        break;
                }
            }

            if (!empty($cache_email)) {

	            ob_start();
	            ?>

                <script>

                    function tdsLeadsChecker() {

                        ['tds_leads', 'tds_subs'].forEach((el) => {
                            let cookieId = el,
                                cookieVal = null,
                                cookieEQ = escape(cookieId) + "=",
                                ca = document.cookie.split(';');

                            for (var i = 0; i < ca.length; i++) {
                                let c = ca[i];
                                while (c.charAt(0) == ' ') {
                                    c = c.substring(1, c.length)
                                }
                                if (c.indexOf(cookieEQ) == 0) {
                                    cookieVal = unescape(c.substring(cookieEQ.length, c.length));
                                    break;
                                }
                            }
                            if (null !== cookieVal) {

                                let tdsForm = document.querySelector('.tds-form');

                                switch (el) {
                                    case 'tds_leads':
                                        if (null !== tdsForm) {
                                            let list = tdsForm.querySelector('input[name="list"]');
                                            if (null !== list && -1 !== cookieVal.split(',').indexOf(list.value)) {
                                                tdsForm.closest('.td_block_wrap').remove();
                                            }
                                        }
                                        break;

                                    case 'tds_subs':
                                        if (null !== tdsForm) {
                                            let input = tdsForm.querySelector('input[name="plans"]');
                                            if (null !== input ) {
                                                let cookiePlans = cookieVal.split(','),
                                                    inputPlans = input.value.split(','),
                                                    opened = inputPlans.filter(function(el) {
                                                        return -1 !== cookiePlans.indexOf(el);
                                                    });
                                                if (opened) {
                                                    tdsForm.closest('.td_block_wrap').remove();
                                                }
                                            }
                                        }
                                        break;

                                }
                            }
                        });

                    }

                </script>

	            <?php
	            echo ob_get_clean();
            }
        });

	}

	/**
	 * update row actions
	 *
	 * @param array   $actions Array of actions.
	 * @param WP_Post $post Current post object.
	 * @return array
	 */
	public static function post_row_actions( $actions, $post ) {

		if ( 'tds_email' !== $post->post_type ) {
			return $actions;
		}

		unset( $actions['trash'] ); // removes the trash link
		unset( $actions['inline hide-if-no-js'] ); // remove quick edit action button

		$delete_url = esc_url( get_delete_post_link( $post->ID, '', true ) ) ;
		$delete_link = '<a rel="nofollow" href="' . $delete_url . '">' . __( 'Delete Lead Email' ) .'</a>'; // the delete tds email link

		$actions['delete'] = $delete_link;

		return $actions;
	}

	/**
	 * change messages when a tds_email cpt is updated
	 *
	 * @param  array $messages Array of messages.
	 * @return array
	 */
	public static function post_updated_messages( $messages ) {
		global $post;

		$messages['tds_email'] = array(
			0  => '', // unused.. messages start at index 1
			1  => __( 'Lead email updated.' ),
			2  => __( 'Custom field updated.' ),
			3  => __( 'Custom field deleted.' ),
			4  => __( 'Lead email updated.' ),
			5  => __( 'Revision restored.' ),
			6  => __( 'Lead email added.' ),
			7  => __( 'Lead email saved.' ),
			8  => __( 'Lead email submitted.' ),
			9  => sprintf( __( 'Lead email scheduled for: %s.' ), '<strong>' . date_i18n( 'M j, Y @ G:i', strtotime( $post->post_date ) ) . '</strong>' ),
			10 => __( 'Lead email draft updated.' ),
		);

		return $messages;
	}

	/**
	 * specifies custom bulk actions messages for tds_email cpt
	 *
	 * @param  array $bulk_messages Array of messages.
	 * @param  array $bulk_counts Array of how many objects were updated.
	 * @return array
	 */
	public static function bulk_post_updated_messages( $bulk_messages, $bulk_counts ) {
		$bulk_messages['tds_email'] = array(
			'updated'   => _n( 'Lead email updated.', '%s lead emails updated.', $bulk_counts['updated'] ),
			'locked'    => _n( 'Lead email not updated, somebody is editing it.', '%s lead emails not updated, somebody is editing them.', $bulk_counts['locked'] ),
			'deleted'   => _n( 'Lead email permanently deleted.', '%s lead emails permanently deleted.', $bulk_counts['deleted'] ),
			'trashed'   => _n( 'Lead email moved to the Trash.', '%s lead emails moved to the Trash.', $bulk_counts['deleted'] ),
			'untrashed' => _n( 'Lead email restored from the Trash.', '%s lead emails restored from the Trash.', $bulk_counts['untrashed'] ),
		);

		return $bulk_messages;
	}

	static function create_db() {
	    try {

	        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

		    global $wpdb;
		    $collate = $wpdb->has_cap( 'collation' ) ? $wpdb->get_charset_collate() : '';

	        maybe_create_table( 'tds_options', "CREATE TABLE `tds_options` (
                    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                    `name` VARCHAR(128) NOT NULL UNIQUE,                
                    `value` VARCHAR(128) NOT NULL,
                    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
               );"
            );

            // maybe change columns type
		    $wpdb->query( "ALTER TABLE `tds_options` MODIFY value LONGTEXT;" );

	        maybe_create_table( 'tds_companies', 'CREATE TABLE `tds_companies` (
                    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                    `company_name` VARCHAR(255) NOT NULL,                
                    `billing_cui` VARCHAR(255) NOT NULL,
                    `billing_j` VARCHAR(255) NOT NULL,
                    `billing_address` VARCHAR(255) NOT NULL,
                    `billing_city` VARCHAR(255) NOT NULL,
                    `billing_country` VARCHAR(255) NOT NULL,
                    `billing_email` VARCHAR(255) NOT NULL,
                    `billing_bank_account` VARCHAR(255) NOT NULL,
                    `billing_post_code` VARCHAR(255) NOT NULL,
                    `billing_vat_number` VARCHAR(255) NOT NULL,
                    `options` LONGTEXT,
                    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
                ) CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci'
            );

	        maybe_create_table( 'tds_payment_bank', 'CREATE TABLE `tds_payment_bank` (
                    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                    `account_name` VARCHAR(255) NOT NULL,
                    `account_number` VARCHAR(255) NOT NULL,
                    `bank_name` VARCHAR(255) NOT NULL,
                    `routing_number` VARCHAR(255) NOT NULL,
                    `iban` VARCHAR(255) NOT NULL,
                    `bic_swift` VARCHAR(255) NOT NULL,
                    `description` VARCHAR(1000) NOT NULL,                
                    `instruction` VARCHAR(1000) NOT NULL,
                    `is_active` TINYINT(1) NOT NULL,               
                    `options` LONGTEXT,                 
                    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP 
                ) CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci'
            );

	        maybe_create_table( 'tds_payment_paypal', "CREATE TABLE `tds_payment_paypal` (
                    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                    `client_id` VARCHAR(255) NOT NULL,
                    `is_active` TINYINT(1) NOT NULL,
                    `is_sandbox` TINYINT(1) NOT NULL,
                    `client_id_sandbox` VARCHAR(255) NOT NULL,
                    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
                )"
            );
		    maybe_add_column( 'tds_payment_paypal', 'is_sandbox', "ALTER TABLE `tds_payment_paypal` ADD COLUMN `is_sandbox` TINYINT(1) NOT NULL AFTER `is_active`" );
		    maybe_add_column( 'tds_payment_paypal', 'client_id_sandbox', "ALTER TABLE `tds_payment_paypal` ADD COLUMN `client_id_sandbox` VARCHAR(255) NOT NULL DEFAULT '' AFTER `is_active`" );

	        maybe_create_table( 'tds_payment_stripe', "CREATE TABLE `tds_payment_stripe` (
                    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                    `is_active` TINYINT(1) NOT NULL,
                    `is_sandbox` TINYINT(1) NOT NULL,
                    `secret_key` VARCHAR(255) NOT NULL,
                    `public_key` VARCHAR(255) NOT NULL,
                    `sandbox_secret_key` VARCHAR(255) NOT NULL,
                    `sandbox_public_key` VARCHAR(255) NOT NULL,
                    `webhook_endpoint` VARCHAR(255) NOT NULL,
                    `webhook_endpoint_secret` VARCHAR(255) NOT NULL,
                    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
                )"
            );
		    maybe_add_column( 'tds_payment_stripe', 'webhook_endpoint_secret', "ALTER TABLE `tds_payment_stripe` ADD COLUMN `webhook_endpoint_secret` VARCHAR(255) NOT NULL DEFAULT '' AFTER `sandbox_public_key`" );
		    maybe_add_column( 'tds_payment_stripe', 'webhook_endpoint', "ALTER TABLE `tds_payment_stripe` ADD COLUMN `webhook_endpoint` VARCHAR(255) NOT NULL DEFAULT '' AFTER `sandbox_public_key`" );

            maybe_create_table( 'tds_plans', "CREATE TABLE `tds_plans` (
                    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,				 
                    `name` VARCHAR(255) NOT NULL, 
                    `price` VARCHAR(255) NOT NULL, 
                    `months_in_cycle` VARCHAR(255) NOT NULL,
                    `trial_days` VARCHAR(255) NOT NULL DEFAULT 0,
                    `is_free` TINYINT(1) DEFAULT 0,
                    `options` LONGTEXT,
                    `list` VARCHAR(255) NOT NULL,
                    `publishing_limits` LONGTEXT,
                    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
                )"
            );
            maybe_add_column( 'tds_plans', 'publishing_limits', "ALTER TABLE `tds_plans` ADD COLUMN `publishing_limits` LONGTEXT AFTER `list`" );

            // link trackings
            maybe_create_table( 'tds_trackings', "CREATE TABLE `tds_trackings` (
                    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,				 
                    `rdr_url` VARCHAR(255) NOT NULL, 
                    `click_count` BIGINT(20) NOT NULL DEFAULT 0, 
                    `page_html` VARCHAR(2000) NOT NULL,
                    `notes` VARCHAR(255) NOT NULL DEFAULT '',
                    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
                )"
            );
		    maybe_add_column( 'tds_trackings', 'notes', "ALTER TABLE `tds_trackings` ADD COLUMN `notes` VARCHAR(255) NOT NULL DEFAULT '' AFTER `page_html`" );

		    maybe_create_table( 'tds_trackings_templates', "CREATE TABLE `tds_trackings_templates` (
                    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                    `name` VARCHAR(255) NOT NULL,
                    `page_html` VARCHAR(2000) NOT NULL,
                    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
                )"
            );
            tds_util::maybe_add_default_template();

            maybe_create_table( 'tds_subscriptions', "CREATE TABLE `tds_subscriptions` (
                    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,                				 
                    `plan_id` INT NOT NULL, 
                    `user_id` INT NOT NULL,
                    `ref_id` INT,
                    `billing_first_name` VARCHAR(50),     
                    `billing_last_name` VARCHAR(60),     
                    `billing_company_name` VARCHAR(500),     
                    `billing_cui` VARCHAR(50),
                    `billing_j` VARCHAR(50),
                    `billing_address` VARCHAR(500),
                    `billing_county` VARCHAR(50),
                    `billing_city` VARCHAR(50),
                    `billing_country` VARCHAR(50),
                    `billing_phone` VARCHAR(50),
                    `billing_email` VARCHAR(50),
                    `billing_bank_account` VARCHAR(50),
                    `billing_post_code` VARCHAR(50),
                    `billing_vat_number` VARCHAR(50),
                    `price` VARCHAR(50) NOT NULL,
                    `next_price` VARCHAR(50) DEFAULT '',   
                    `curr_name` VARCHAR(50) DEFAULT '',
                    `curr_pos` VARCHAR(30) DEFAULT '',
                    `curr_th_sep` VARCHAR(30) DEFAULT '',
                    `curr_dec_sep` VARCHAR(30) DEFAULT '',
                    `curr_dec_no` VARCHAR(30) DEFAULT '',
                    `payment_type` VARCHAR(50),
                    `status` VARCHAR(50) NOT NULL, 
                    `is_free` TINYINT(1) DEFAULT 0,
                    `last_months_in_cycle` VARCHAR(50),
                    `start_day` VARCHAR(50),                
                    `trial_days` VARCHAR(50) DEFAULT 0,                
                    `start_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    
                    `paypal_order_id` VARCHAR(50) DEFAULT '',
                    `paypal_order_intent` VARCHAR(50) DEFAULT '',
                    `paypal_order_status` VARCHAR(50) DEFAULT '',                
                    `paypal_order_payer_id` VARCHAR(50) DEFAULT '',
                    `paypal_order_payer_given_name` VARCHAR(50) DEFAULT '',
                    `paypal_order_payer_surname` VARCHAR(50) DEFAULT '',
                    `paypal_order_payer_email` VARCHAR(50) DEFAULT '',
                    `paypal_order_payee_id` VARCHAR(50) DEFAULT '',
                    `paypal_order_payee_email` VARCHAR(50) DEFAULT '',
                    `paypal_order_amount_currency_code` VARCHAR(50) DEFAULT '',
                    `paypal_order_amount_value` VARCHAR(50) DEFAULT '',
                    `paypal_order_info` TEXT DEFAULT '',
                    `paypal_order_create_time` VARCHAR(40) DEFAULT '',
                    `paypal_order_update_time` VARCHAR(40) DEFAULT '',
                    `paypal_order_capture_create_time` VARCHAR(40) DEFAULT '',
                    `paypal_order_capture_update_time` VARCHAR(40) DEFAULT '',
                    
                    `stripe_payment_intent` VARCHAR(255) DEFAULT '',
                    `stripe_payment_status` VARCHAR(255) DEFAULT '',
                    `stripe_payment_info` TEXT DEFAULT '',
                    `stripe_customer_id` VARCHAR(40) DEFAULT '',
                    `stripe_subscription_id` VARCHAR(40) DEFAULT '',
                    `stripe_invoice_details` TEXT DEFAULT '',
                    
                    `confirm_key` VARCHAR(40) DEFAULT '',                
                    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    `canceled` TINYINT NOT NULL DEFAULT 0,
                    
                    `coupon_id` INT NOT NULL DEFAULT 0,

                    `plan_posts_remaining` LONGTEXT
                ) CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci"
            );

            // maybe add the canceled column
		    maybe_add_column( 'tds_subscriptions', 'canceled', "ALTER TABLE `tds_subscriptions` ADD COLUMN `canceled` TINYINT NOT NULL DEFAULT 0 AFTER `created_at`" );
		    maybe_add_column( 'tds_subscriptions', 'stripe_subscription_id', "ALTER TABLE `tds_subscriptions` ADD COLUMN `stripe_subscription_id` VARCHAR(40) DEFAULT '' AFTER `stripe_payment_info`" );
            maybe_add_column( 'tds_subscriptions', 'stripe_customer_id', "ALTER TABLE `tds_subscriptions` ADD COLUMN `stripe_customer_id` VARCHAR(40) DEFAULT '' AFTER `stripe_payment_info`" );
            maybe_add_column( 'tds_subscriptions', 'stripe_invoice_details', "ALTER TABLE `tds_subscriptions` ADD COLUMN `stripe_invoice_details` TEXT DEFAULT '' AFTER `stripe_payment_info`" );

            // maybe change columns type
		    $wpdb->query( "ALTER TABLE `tds_subscriptions` MODIFY stripe_payment_intent VARCHAR(255);" );
		    $wpdb->query( "ALTER TABLE `tds_subscriptions` MODIFY stripe_payment_status VARCHAR(255);" );

            // coupons
		    maybe_create_table( 'tds_coupons', "CREATE TABLE `tds_coupons` (
                    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                    `name` VARCHAR(35) NOT NULL,                
                    `value` VARCHAR(35) NOT NULL,
                    `type` VARCHAR(35) NOT NULL,
                    `usage_limit` INT DEFAULT NUll,
                    `desc` VARCHAR(255) NOT NULL DEFAULT '',
                    `start_date` DATE NOT NULL,
                    `end_date` DATE NOT NULL
               );"
		    );

		    // maybe add the coupon_id column in subscriptions table
		    maybe_add_column( 'tds_subscriptions', 'coupon_id', "ALTER TABLE `tds_subscriptions` ADD COLUMN `coupon_id` INT NOT NULL DEFAULT 0 AFTER `canceled`" );

            // maybe add the plan_posts_remaining column in the subscriptions table
            maybe_add_column( 'tds_subscriptions', 'plan_posts_remaining', "ALTER TABLE `tds_subscriptions` ADD COLUMN `plan_posts_remaining` LONGTEXT AFTER `coupon_id`" );

            // billing details
            maybe_create_table( 'tds_billing', "CREATE TABLE `tds_billing` (
                    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                    `user_id` INT NOT NULL,
                    `billing_first_name` VARCHAR(50),     
                    `billing_last_name` VARCHAR(60),
                    `billing_company_name` VARCHAR(500),
                    `billing_vat_number` VARCHAR(50), 
                    `billing_address` VARCHAR(500),
                    `billing_country` VARCHAR(50),
                    `billing_city` VARCHAR(50),
                    `billing_county` VARCHAR(50),
                    `billing_post_code` VARCHAR(50),
                    `billing_phone` VARCHAR(50),
                    `billing_email` VARCHAR(50)
                );"
            );

        } catch (Exception $ex) {
            // do nothing, just catch the error
        }
    }

	/**
	 * type of request
	 *
	 * @param  string $type admin, ajax, cron, frontend or tds-leads-form-submit
	 * @return bool
	 */
	private function is_request( $type ) {

		switch ( $type ) {
			case 'admin':
				return is_admin();
			case 'ajax':
				return defined( 'DOING_AJAX' );
			case 'cron':
				return defined( 'DOING_CRON' );
			case 'frontend':
				return ( !is_admin() || defined( 'DOING_AJAX' ) ) &&
				       !defined( 'DOING_CRON' ) &&
				       !$this->is_rest_api_request();
			case 'tds-leads-form-submit':
				return $this->is_tds_form_submit();
		}

		return false;
	}

	/**
	 * returns true if the request is a non-legacy Rest api request
	 * @return bool
	 */
	public function is_rest_api_request() {

		if ( empty( $_SERVER['REQUEST_URI'] ) ) {
			return false;
		}

		$rest_prefix = trailingslashit( rest_get_url_prefix() );

		return ( false !== strpos( $_SERVER['REQUEST_URI'], $rest_prefix ) );
	}

	/**
	 * returns true if it's a submit for the tds_leads shortcode email form submit
	 * @return bool
	 */
	public function is_tds_form_submit() {
		return isset( $_POST['tds-subscribe'] );
	}

	/**
	 * setup tds environment - post types, taxonomies, endpoints
	 */
	public static function setup_environment() {

	    $current_version = tds_util::get_tds_option('version' );

        if ( empty( $current_version ) ) {
            tds_util::set_tds_option('version', TD_SUBSCRIPTION_VERSION );
        } else {
            require_once('tds_update.php');
            tds_update::update_settings( $current_version );
        }

		// register email lists tax
		self::register_taxonomy();

		// register email post type
		self::register_post_type(
			'tds_email',
			array(
				'public' => true,
				'label'  => 'Leads - Emails',
				'labels'  => array(
					'name'               => 'Leads - Emails',
					'singular_name'      => 'Leads - Email',
					'menu_name'          => 'Leads - Emails',
					'name_admin_bar'     => 'Leads - Email',
					'add_new'            => 'Add New',
					'add_new_item'       => 'Add New Email',
					'new_item'           => 'New Email',
					'edit_item'          => 'Edit Email',
					'all_items'          => 'Leads - Emails',
					'search_items'       => 'Search Emails',
					'not_found'          => 'No emails found.',
					'not_found_in_trash' => 'No emails found in Trash.'
				),
				'supports' => array( 'title' ),
				'show_in_admin_bar' => false,
				'show_in_nav_menus' => false,
				'publicly_queryable' => false,
				'hierarchical' => false,
				'exclude_from_search' => true,
				'capabilities' => array(
                    // edit_pages permission capability owned only by admins and editor
					'edit_post'          => 'edit_pages',
					'read_post'          => 'edit_pages',
					'delete_post'        => 'edit_pages',
					'edit_posts'         => 'edit_pages',
					'edit_others_posts'  => 'edit_pages',
					'delete_posts'       => 'edit_pages',
					'publish_posts'      => 'edit_pages',
					'read_private_posts' => 'edit_pages'
					//'create_posts' => 'do_not_allow', // @todo maybe hide the add new post link, as new posts are created programmatically??
				)
			)
		);

		// register locker post type
		self::register_post_type(
			'tds_locker',
			array(
				'public' => true,
				'label'  => 'Lockers',
				'labels'  => array(
					'name'               => 'Lockers',
					'singular_name'      => 'Locker',
					'menu_name'          => 'Lockers',
					'name_admin_bar'     => 'Locker',
					'add_new'            => 'Add New',
					'add_new_item'       => 'Add New Locker',
					'new_item'           => 'New Locker',
					'edit_item'          => 'Edit Locker',
					'all_items'          => 'Lockers',
					'search_items'       => 'Search Lockers',
					'not_found'          => 'No lockers found.',
					'not_found_in_trash' => 'No lockers found in Trash.'
				),
				'supports' => array( 'title' ),
				'show_in_admin_bar' => false,
				'show_in_nav_menus' => false,
				'show_in_menu' => 'edit.php?post_type=tds_email',
				'publicly_queryable' => false,
				'hierarchical' => false,
				'exclude_from_search' => true,
				'capabilities' => array(
					// edit_pages permission capability owned only by admins and editor
					'edit_post'          => 'edit_pages',
					'read_post'          => 'edit_pages',
					'delete_post'        => 'edit_pages',
					'edit_posts'         => 'edit_pages',
					'edit_others_posts'  => 'edit_pages',
					'delete_posts'       => 'edit_pages',
					'publish_posts'      => 'edit_pages',
					'read_private_posts' => 'edit_pages'
					//'create_posts' => 'do_not_allow', // @todo maybe hide the add new post link, as new posts are created programmatically??
				)
			)
		);

		// add default locker
		//self::add_default_locker(
		//	'tds_default_locker_id',
		//	array(
		//		'post_type' => 'tds_locker',
		//		'post_title' => 'Locker (default)',
		//		'post_name' => 'tds_default_locker'
		//	),
		//	array(
		//		'tds_locker_settings' => array(
		//			'tds_title' => 'This Content Is Only For Subscribers',
		//			'tds_message' => 'Please subscribe to unlock this content. Enter your email to get access.',
		//			'tds_input_placeholder' => 'Please enter your email address.',
		//			'tds_submit_btn_text' => 'Subscribe to unlock',
		//			'tds_after_btn_text' => 'Your email address is 100% safe from spam!',
		//			'tds_pp_msg' => 'I consent to processing of my data according to <a href="#">Terms of Use</a> & <a href="#">Privacy Policy</a>'
		//		),
		//		'tds_locker_preview' => array(),
		//		'tds_locker_access_settings' => array(
		//			'tds_locker_email_access' => get_option( 'default_term_tds_list' )
		//		),
		//	)
		//);

		// add locked column for post/page & cpts that have the lockers feature enabled
        //add_action( 'td_global_after', array( __CLASS__, 'add_locked_column' ) );
        self::add_locked_column();

        add_action( 'admin_menu', function() {

		    add_submenu_page('edit.php?post_type=tds_email', 'Subscriptions', 'Subscriptions', "manage_categories", "td_settings", function (){
				require_once TDS_PATH . '/includes/admin/templates/tds-settings.php';
			}, null, 6);

		    add_submenu_page('edit.php?post_type=tds_email', 'Link Tracker', 'Link Tracker', "manage_categories", "td_link_tracker", function (){
				require_once TDS_PATH . '/includes/admin/templates/link-tracker.php';
			}, null, 7);

		}, 11 );

        add_filter( 'display_post_states', function ( $post_states, $post ) {

            $tds_options = tds_util::get_tds_options();

            foreach ($tds_options as $tds_option) {
                switch ($tds_option['name']) {
                    case 'payment_page_id':
                        if ( $post->ID === intval($tds_option['value'])) {
                            $post_states[] = 'Checkout - Opt-In Builder';
                            return $post_states;
                        }
                        break;
                    case 'my_account_page_id':
                        if ( $post->ID === intval($tds_option['value'])) {
                            $post_states[] = 'My Account - Opt-In Builder';
                            return $post_states;
                        }
                        break;
                    case 'create_account_page_id':
                        if ( $post->ID === intval($tds_option['value'])) {
                            $post_states[] = 'Login/Register - Opt-In Builder';
                            return $post_states;
                        }
                        break;
                }
            }
            return $post_states;

        }, 10, 2);

        add_filter( 'manage_tds_locker_posts_columns', function ($columns) {
            $ordered_columns = [];
            foreach ($columns as $key => $column) {
                if ('date' === $key) {
                    $ordered_columns['slug'] = 'ID';
                    $ordered_columns['custom_slug'] = 'Custom Slug';
                    $ordered_columns[$key] = $column;
                    continue;
                }
                $ordered_columns[$key] = $column;
            }
            return $ordered_columns;
        }, 9);

        add_action( 'manage_tds_locker_posts_custom_column' , function ( $column, $post_id ) {
            switch ( $column ) {
                case 'slug' :
                    echo $post_id;
                    break;

                case 'custom_slug' :
                    $tds_locker_types = get_post_meta( $post_id, 'tds_locker_types', true );
                    if (!empty($tds_locker_types['tds_locker_slug'])) {
                        echo $tds_locker_types['tds_locker_slug'];
                    } else {
                        echo '';
                    }
                    break;
            }
        }, 10, 2);

        add_action( 'tds_menu_login_data', function() {

            global $wpdb;
            $my_account_page_id = $wpdb->get_var( "SELECT value FROM tds_options WHERE name = 'my_account_page_id'");

            if ( class_exists('SitePress') ) {
                $translated_my_account_page_id = apply_filters('wpml_object_id', $my_account_page_id, 'page');
                if ( !is_null($translated_my_account_page_id) ) {
                    $my_account_page_id = $translated_my_account_page_id;
                }
            }

	        $output = '';
            if ( false !== $my_account_page_id ) {
	            $my_account_permalink = get_permalink( $my_account_page_id );
	            if ( false !== $my_account_permalink ) {

	                $output .= '<ul class="tdw-wml-menu-list">';
                        $output .= '<li><a href="' . esc_url($my_account_permalink) . '">' . __td('My subscription account', TD_THEME_NAME) . '</a></li>';
                        $output .= '<li><a href="' . esc_url(add_query_arg('account_details', '', $my_account_permalink)) . '">' . __td('Account details', TD_THEME_NAME) . '</a></li>';
                        $output .= '<li><a href="' . esc_url(add_query_arg('subscriptions', '', $my_account_permalink)) . '">' . __td('Subscriptions', TD_THEME_NAME) . '</a></li>';
                    $output .= '</ul>';
	            }
            }

            echo $output;
        });

        add_action( 'template_redirect', function() {

            $my_account_page_id = tds_util::get_tds_option('my_account_page_id');
            $create_account_page_id = tds_util::get_tds_option('create_account_page_id');

            if ( class_exists('SitePress') ) {
                $translated_my_account_page_id = apply_filters('wpml_object_id', $my_account_page_id, 'page');
                $translated_create_account_page_id = apply_filters('wpml_object_id', $create_account_page_id, 'page');
                if ( !is_null($translated_my_account_page_id) ) {
                    $my_account_page_id = $translated_my_account_page_id;
                }
                if ( !is_null($translated_create_account_page_id) ) {
                    $create_account_page_id = $translated_create_account_page_id;
                }
            }

            if ( !is_null($my_account_page_id) && is_page($my_account_page_id) ) {

                if ( !is_user_logged_in() && !is_null($create_account_page_id) ) {
                    wp_redirect ( get_permalink($create_account_page_id) );
                    die;
                }

	            $_wpnonce = '';
	            if ( isset( $_REQUEST[ '_wpnonce' ] ) ) {
		            $_wpnonce = $_REQUEST[ '_wpnonce' ];
	            }

	            $_nonce = '';
	            if ( isset( $_REQUEST[ 'save-account-details-nonce' ] ) ) {
		            $_nonce = $_REQUEST[ 'save-account-details-nonce' ];
	            } else if ( isset( $_REQUEST[ 'save-account-billing-nonce' ] ) ) {
                    $_nonce = $_REQUEST[ 'save-account-billing-nonce' ];
                } else {
		            $_nonce = $_wpnonce;
	            }

	            if ( ! wp_verify_nonce( $_nonce, 'save_account_details' ) && ! wp_verify_nonce( $_nonce, 'save_account_billing' ) ) {
		            return;
	            }

	            if ( empty( $_POST[ 'action' ] ) || ( 'save_account_details' !== $_POST[ 'action' ] && 'save_account_billing' !== $_POST[ 'action' ] ) ) {
		            return;
	            }

	            nocache_headers();

	            $user_id = get_current_user_id();

	            if ( $user_id <= 0 ) {
		            return;
	            }

                if( 'save_account_details' === $_POST[ 'action' ] ) {

                    $tds_first_name      = ! empty( $_POST[ 'tds_first_name' ] ) ? tds_util::clean_param( wp_unslash( $_POST[ 'tds_first_name' ] ) ) : '';
                    $tds_last_name       = ! empty( $_POST[ 'tds_last_name' ] ) ? self::clean_field( wp_unslash( $_POST[ 'tds_last_name' ] ) ) : '';
                    $tds_display_name    = ! empty( $_POST[ 'tds_display_name' ] ) ? self::clean_field( wp_unslash( $_POST[ 'tds_display_name' ] ) ) : '';
                    $tds_email           = ! empty( $_POST[ 'tds_email' ] ) ? self::clean_field( wp_unslash( $_POST[ 'tds_email' ] ) ) : '';
                    $tds_current_pass    = ! empty( $_POST[ 'tds_current_pass' ] ) ? $_POST[ 'tds_current_pass' ] : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized, WordPress.Security.ValidatedSanitizedInput.MissingUnslash
                    $tds_new_pass        = ! empty( $_POST[ 'tds_new_pass' ] ) ? $_POST[ 'tds_new_pass' ] : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized, WordPress.Security.ValidatedSanitizedInput.MissingUnslash
                    $tds_retype_new_pass = ! empty( $_POST[ 'tds_retype_new_pass' ] ) ? $_POST[ 'tds_retype_new_pass' ] : '';
                    $save_pass           = true;
                    $tds_errors          = [];

                    $current_user       = get_user_by( 'id', $user_id );
                    $current_first_name = $current_user->first_name;
                    $current_last_name  = $current_user->last_name;
                    $current_email      = $current_user->user_email;

                    $user               = new stdClass();
                    $user->ID           = $user_id;
                    $user->first_name   = $tds_first_name;
                    $user->last_name    = $tds_last_name;
                    $user->display_name = $tds_display_name;

                    if (!headers_sent()) {
                        session_start();
                    }

                    unset($_SESSION['tds_errors']);
                    unset($_SESSION['tds_msg']);

                    // Prevent display name to be changed to email.
                    if ( is_email( $tds_display_name ) ) {
                        $tds_errors[] = 'Display name can not be changed.';
                    }

                    if (!empty($tds_errors)) {
                        $_SESSION[ 'tds_errors' ] = $tds_errors;
                        return;
                    }

                    $required_fields = array(
                        'tds_first_name'   => 'First name',
                        'tds_last_name'    => 'Last name',
                        'tds_display_name' => 'Display name',
                        'tds_email'        => 'Email address',
                    );

                    foreach ( $required_fields as $field_key => $field_name ) {
                        if ( empty( $_POST[ $field_key ] ) ) {
                            $tds_errors[] = sprintf( __td('%s is a required field.', TD_THEME_NAME), '<strong>' . esc_html( $field_name ) . '</strong>');
                        }
                    }

                    if (!empty($tds_errors)) {
                        $_SESSION[ 'tds_errors' ] = $tds_errors;
                        return;
                    }

                    if ( $tds_email ) {
                        $tds_email = sanitize_email( $tds_email );
                        if ( ! is_email( $tds_email ) ) {
                            $tds_errors[] = __td('Please provide a valid email address.', TD_THEME_NAME);
                        } elseif ( email_exists( $tds_email ) && $tds_email !== $current_user->user_email ) {
                            $tds_errors[] = __td('This email address is already registered.', TD_THEME_NAME);
                        }
                        $user->user_email = $tds_email;

                        if ( ! empty( $tds_current_pass ) && empty( $tds_new_pass ) && empty( $tds_retype_new_pass ) ) {
                            $tds_errors[] = __td('Please fill out all password fields.', TD_THEME_NAME);
                            $save_pass = false;
                        } elseif ( ! empty( $tds_new_pass ) && empty( $tds_current_pass ) ) {
                            $tds_errors[] = __td('Please enter your current password.', TD_THEME_NAME);
                            $save_pass = false;
                        } elseif ( ! empty( $tds_new_pass ) && empty( $tds_retype_new_pass ) ) {
                            $tds_errors[] = __td('Please re-enter your password.', TD_THEME_NAME);
                            $save_pass = false;
                        } elseif ( ( ! empty( $tds_new_pass ) || ! empty( $tds_retype_new_pass ) ) && $tds_new_pass !== $tds_retype_new_pass ) {
                            $tds_errors[] = __td('New passwords do not match.', TD_THEME_NAME);
                            $save_pass = false;
                        } elseif ( ! empty( $tds_new_pass ) && ! wp_check_password( $tds_current_pass, $current_user->user_pass, $current_user->ID ) ) {
                            $tds_errors[] = __td('Your current password is incorrect.', TD_THEME_NAME);
                            $save_pass = false;
                        }

                        if ( $tds_new_pass && $save_pass ) {
                            $user->user_pass = $tds_new_pass;
                        }
                    }

                    // check files & don't allow file uploads for unactivated accounts
	                if( !empty( $_FILES ) ) {
		                $tds_validate = get_user_meta( $user_id, 'tds_validate', true );
		                if ( !empty($tds_validate) && is_array($tds_validate) && empty($tds_validate['validation_time']) ) {
			                $tds_errors[] = sprintf( __td('Cannot process %s field.', TD_THEME_NAME ), '<strong>Profile picture</strong>' );
			                $tds_errors[] = __td('In order to update this filed, you have to activate your account.', TD_THEME_NAME );
		                }
                    }

                    if ( !empty($tds_errors) ) {
                        $_SESSION['tds_errors'] = $tds_errors;
                        return;
                    }

                    if ( !function_exists( 'wp_handle_upload' ) ) {
                        require_once( ABSPATH . '/wp-admin/includes/file.php' );
                    }
                    if( !function_exists( 'wp_generate_attachment_metadata' ) ) {
                        require_once( ABSPATH . '/wp-admin/includes/image.php' );
                    }

                    if( !empty( $_FILES ) ) {
                        foreach ( $_FILES as $field_name => $file_data ) {
                            if( $field_name == 'tdb-posts-form-file' ) {

                                $user_avatars = array();
                                $file_return = wp_handle_upload( $file_data, array( 'test_form' => false ) );

                                if( !isset( $file_return['error'] ) && !isset( $file_return['upload_error_handler'] ) ) {
                                    $filename = $file_return['file'];
                                    $attachment = array(
                                        'post_mime_type' => $file_return['type'],
                                        'post_title' => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
                                        'post_content' => '',
                                        'post_status' => 'inherit',
                                        'guid' => $file_return['url']
                                    );
                                    $attachment_id = wp_insert_attachment( $attachment, $file_return['url'] );
                                    $attachment_data = wp_generate_attachment_metadata( $attachment_id, $filename );
                                    wp_update_attachment_metadata( $attachment_id, $attachment_data );

                                    $user_avatars['media_id'] =  $attachment_id;
                                    $user_avatars['full'] =  $file_return['url'];
                                }

                                update_user_meta( $user->ID, 'td_user_avatars', $user_avatars );

                            }
                        }
                    }

                    wp_update_user( $user );

                    if (class_exists('WC_Customer', false)) {
                        $customer = new WC_Customer( $user->ID );

                        if ( $customer ) {
                            // Keep billing data in sync if data changed.
                            if ( is_email( $user->user_email ) && $current_email !== $user->user_email ) {
                                $customer->set_billing_email( $user->user_email );
                            }

                            if ( $current_first_name !== $user->first_name ) {
                                $customer->set_billing_first_name( $user->first_name );
                            }

                            if ( $current_last_name !== $user->last_name ) {
                                $customer->set_billing_last_name( $user->last_name );
                            }

                            $customer->save();
                        }
                    }

                    $_SESSION['tds_msg'] = __td('Account details changed successfully.', TD_THEME_NAME);

                } else if( 'save_account_billing' === $_POST[ 'action' ] ) {

                    $tds_billing_first_name   = ! empty( $_POST[ 'tds_billing_first_name' ] ) ? tds_util::clean_param( wp_unslash( $_POST[ 'tds_billing_first_name' ] ) ) : '';
                    $tds_billing_last_name    = ! empty( $_POST[ 'tds_billing_last_name' ] ) ? tds_util::clean_param( wp_unslash( $_POST[ 'tds_billing_last_name' ] ) ) : '';
                    $tds_billing_company_name = ! empty( $_POST[ 'tds_billing_company_name' ] ) ? tds_util::clean_param( wp_unslash( $_POST[ 'tds_billing_company_name' ] ) ) : '';
                    $tds_billing_vat_number   = ! empty( $_POST[ 'tds_billing_vat_number' ] ) ? tds_util::clean_param( wp_unslash( $_POST[ 'tds_billing_vat_number' ] ) ) : '';
                    $tds_billing_address      = ! empty( $_POST[ 'tds_billing_address' ] ) ? tds_util::clean_param( wp_unslash( $_POST[ 'tds_billing_address' ] ) ) : '';
                    $tds_billing_country      = ! empty( $_POST[ 'tds_billing_country' ] ) ? tds_util::clean_param( wp_unslash( $_POST[ 'tds_billing_country' ] ) ) : '';
                    $tds_billing_city         = ! empty( $_POST[ 'tds_billing_city' ] ) ? tds_util::clean_param( wp_unslash( $_POST[ 'tds_billing_city' ] ) ) : '';
                    $tds_billing_county       = ! empty( $_POST[ 'tds_billing_county' ] ) ? tds_util::clean_param( wp_unslash( $_POST[ 'tds_billing_county' ] ) ) : '';
                    $tds_billing_post_code    = ! empty( $_POST[ 'tds_billing_post_code' ] ) ? tds_util::clean_param( wp_unslash( $_POST[ 'tds_billing_post_code' ] ) ) : '';
                    $tds_billing_phone        = ! empty( $_POST[ 'tds_billing_phone' ] ) ? tds_util::clean_param( wp_unslash( $_POST[ 'tds_billing_phone' ] ) ) : '';
                    $tds_billing_email        = ! empty( $_POST[ 'tds_billing_email' ] ) ? tds_util::clean_param( wp_unslash( $_POST[ 'tds_billing_email' ] ) ) : '';
                    $tds_errors               = [];

                    if (!headers_sent()) {
                        session_start();
                    }

                    unset($_SESSION['tds_errors']);
                    unset($_SESSION['tds_msg']);

                    $required_fields = array(
                        'tds_billing_first_name' => 'First name',
                        'tds_billing_last_name'  => 'Last name',
                        'tds_billing_address'    => 'Street address',
                        'tds_billing_country'    => 'Country/Region',
                        'tds_billing_city'       => 'Town/City',
                        'tds_billing_country'    => 'Country',
                        'tds_billing_post_code'  => 'Postcode',
                        'tds_billing_phone'      => 'Phone',
                        'tds_billing_email'      => 'Email',
                    );

                    foreach ( $required_fields as $field_key => $field_name ) {
                        if ( empty( $_POST[ $field_key ] ) ) {
                            $tds_errors[] = sprintf( __td('%s is a required field.', TD_THEME_NAME), '<strong>' . esc_html( $field_name ) . '</strong>');
                        }
                    }

                    if (!empty($tds_errors)) {
                        $_SESSION[ 'tds_errors' ] = $tds_errors;
                        return;
                    }

                    if ( $tds_billing_email ) {
                        $tds_billing_email = sanitize_email( $tds_billing_email );
                        if ( ! is_email( $tds_billing_email ) ) {
                            $tds_errors[] = __td('Please provide a valid email address.', TD_THEME_NAME);
                        }
                    }

                    if (!empty($tds_errors)) {
                        $_SESSION[ 'tds_errors' ] = $tds_errors;
                        return;
                    }

                    $data_values = array(
                        'billing_first_name'   => $tds_billing_first_name,
                        'billing_last_name'    => $tds_billing_last_name,
                        'billing_company_name' => $tds_billing_company_name,
                        'billing_vat_number'   => $tds_billing_vat_number,
                        'billing_address'      => $tds_billing_address,
                        'billing_country'      => $tds_billing_country,
                        'billing_city'         => $tds_billing_city,
                        'billing_county'       => $tds_billing_county,
                        'billing_post_code'    => $tds_billing_post_code,
                        'billing_phone'        => $tds_billing_phone,
                        'billing_email'        => $tds_billing_email,
                    );

                    $data_format = array( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s' );

                    global $wpdb;
                    $wpdb->suppress_errors = true;

                    $billing_details_row_exists = $wpdb->get_results( $wpdb->prepare( "SELECT id FROM tds_billing WHERE user_id = %s", $user_id) );

                    if( $billing_details_row_exists !== null && count( $billing_details_row_exists ) ) {
                        $update_billing_details = $wpdb->update( 'tds_billing',
                            $data_values,
                            array( 'user_id' => $user_id ),
                            $data_format,
                            array( '%d' )
                        );
                    } else {
                        $data_values['user_id'] = $user_id;
                        $data_format[] = '%s';

                        $insert_billing_details = $wpdb->insert( 'tds_billing',
                            $data_values,
                            $data_format
                        );
                    }

                    $_SESSION['tds_msg'] = __td('Account billing details changed successfully.', TD_THEME_NAME);

                }
            }
        });

		add_action( 'tdc_register_post_metaboxes', function($td_custom_post_types) {

		    if (!empty($td_custom_post_types) && is_array($td_custom_post_types) ) {
		        if (in_array('tds_plan_exclude', $td_custom_post_types)) {
			        new WPAlchemy_MetaBox( array(
				        'id'       => 'td_post_theme_settings',
				        'title'    => 'PayPal Settings',
				        'types'    => array( 'tds_plan' ),
				        'priority' => 'high',
				        'template' => TDS_PATH . '/includes/admin/metaboxes/tds_plan_settings.php',
			        ) );
		        } else if (in_array('tds_product_exclude', $td_custom_post_types)) {
			        new WPAlchemy_MetaBox( array(
				        'id'       => 'td_post_theme_settings',
				        'title'    => 'PayPal Settings',
				        'types'    => array( 'tds_product' ),
				        'priority' => 'high',
				        'template' => TDS_PATH . '/includes/admin/metaboxes/tds_product_settings.php',
			        ) );
		        } else if (in_array('tds_subscription_exclude', $td_custom_post_types)) {
			        new WPAlchemy_MetaBox( array(
				        'id'       => 'td_post_theme_settings',
				        'title'    => 'PayPal Settings',
				        'types'    => array( 'tds_subscription' ),
				        'priority' => 'high',
				        'template' => TDS_PATH . '/includes/admin/metaboxes/tds_subscription_settings.php',
			        ) );
		        }
            }
        }, 10, 1);

		add_action( 'init', function() {
		    add_filter( 'td_custom_post_types', function($post_types) {
		        if (!empty($post_types) ) {

		            $post_id = null;
                    if (isset($_REQUEST['post']) || isset($_REQUEST['post_ID'])){
                        $post_id = empty($_REQUEST['post_ID']) ? $_REQUEST['post'] : $_REQUEST['post_ID'];

                        if (!empty($post_id)) {

                            switch ( get_post_type($post_id) ) {
                                case 'tds_product':
                                    if ( array_key_exists( 'tds_product', $post_types ) ) {
                                        return ['tds_product_exclude'];
                                    }
                                    break;

                                case 'tds_plan':
                                    if ( array_key_exists( 'tds_plan', $post_types ) ) {
                                        return ['tds_plan_exclude'];
                                    }
                                    break;

                                case 'tds_subscription':
                                    if ( array_key_exists( 'tds_subscription', $post_types ) ) {
                                        return ['tds_subscription_exclude'];
                                    }
                                    break;
                            }
                        }
                    }

                    if (isset($_REQUEST['post_type']) || isset($_REQUEST['post_type'])) {
                        switch ( $_REQUEST['post_type'] ) {
                            case 'tds_product':
                                if ( array_key_exists( 'tds_product', $post_types ) ) {
                                    return ['tds_product_exclude'];
                                }
                                break;

                            case 'tds_plan':
                                if ( array_key_exists( 'tds_plan', $post_types ) ) {
                                    return ['tds_plan_exclude'];
                                }
                                break;

                            case 'tds_subscription':
                                if ( array_key_exists( 'tds_subscription', $post_types ) ) {
                                    return ['tds_subscription_exclude'];
                                }
                                break;
                        }
                    }


                }
		        return $post_types;
            } );
        }, 9998, 1);

		// Add the custom columns to the tds_plan post type:
        add_filter( 'manage_tds_plan_posts_columns', function ($columns) {
            $columns['tds_paypal_plan_product'] = 'Product';
            $columns['tds_paypal_plan_status'] = 'Active';
            $columns['tds_payment_plan_sync'] = 'Sync';

            return $columns;
        });

        // Add the data to the custom columns for the tds_plan post type:
        add_action( 'manage_tds_plan_posts_custom_column' , function ( $column, $post_id ) {
            switch ( $column ) {

                case 'tds_paypal_plan_product' :
                    $td_post_theme_settings = td_util::get_post_meta_array($post_id, 'td_post_theme_settings');
                    if (empty($td_post_theme_settings[$column])) {
                        echo 'NOT SET';
                    } else {
                        $tds_product = get_post($td_post_theme_settings[$column]);
                        if ($tds_product instanceof WP_Post) {
                            echo $tds_product->post_name;
                        } else {
                            echo 'INVALID PRODUCT';
                        }
                    }
                    break;

                case 'tds_paypal_plan_status' :
                    $td_post_theme_settings = td_util::get_post_meta_array($post_id, 'td_post_theme_settings');
                    echo '<input type="checkbox" ' . (('ACTIVE' === $td_post_theme_settings[$column]) ? 'checked' : '') . ' disabled>';
                    break;

                case 'tds_payment_plan_sync' :
                    $paypal_plan_sync = get_post_meta($post_id, 'paypal_plan_sync', true);
                    echo '<input type="checkbox" ' . (empty($paypal_plan_sync) ? '' : 'checked') . ' disabled>';
                    break;

            }
        }, 10, 2 );

        // Add the custom columns to the tds_subscription post type:
        add_filter( 'manage_tds_subscription_posts_columns', function ($columns) {
            $columns['tds_payment_subscription_status'] = 'Active';
            $columns['tds_payment_subscription_sync'] = 'Sync';

            return $columns;
        });

        // Add the data to the custom columns for the tds_subscription post type:
        add_action( 'manage_tds_subscription_posts_custom_column' , function ( $column, $post_id ) {
            switch ( $column ) {

                case 'tds_payment_subscription_status' :
                    $td_post_theme_settings = td_util::get_post_meta_array($post_id, 'td_post_theme_settings');
                    echo '<input type="checkbox" ' . (('ACTIVE' === $td_post_theme_settings[$column]) ? 'checked' : '') . ' disabled>';
                    break;

                case 'tds_payment_subscription_sync' :
                    $payment_subscription_sync = get_post_meta($post_id, 'payment_subscription_sync', true);
                    echo '<input type="checkbox" ' . (empty($payment_subscription_sync) ? '' : 'checked') . ' disabled>';
                    break;

            }
        }, 10, 2 );

        //add_action( 'add_post_meta', 'td_subscription::tds_on_add_post_meta', 10, 3 );

        add_action( 'update_post_meta', 'td_subscription::tds_on_update_post_meta', 10, 4 );
		//add_action( 'updated_post_meta', 'td_subscription::tds_on_updated_post_meta', 10, 4 );

        add_action( 'init', function() {
            if ( isset( $_GET['action'] ) && 'tds_validate_email' === $_GET['action'] ) {
                if ( isset( $_GET['email'] ) && !empty( $_GET['email'] ) ) {

                    $email = $_GET['email'];

                    if ( is_email( $email ) ) {
                        $tds_email_post = tds_util::get_post_by_title( $email, 'tds_email' );

                        if ( $tds_email_post instanceof WP_Post ) {
                            $tds_validate_email = get_post_meta( $tds_email_post->ID, 'tds_validate_email', true );

                            if ( $tds_validate_email == 'no' ) {
                                update_post_meta( $tds_email_post->ID, 'tds_validate_email', 'yes' );
                            }
                        }

                    }
                }
            }
        }, 11 );

        add_action( 'login_form_rp', 'redirect_to_custom_password_reset' );
        add_action( 'login_form_resetpass', 'redirect_to_custom_password_reset' );
        function redirect_to_custom_password_reset() {
            if ( 'GET' == $_SERVER['REQUEST_METHOD'] ) {
                $login_register_page_id = tds_util::get_tds_option('create_account_page_id');

                if( is_null($login_register_page_id) ) {
                    return;
                } else {
                    $login_register_permalink = get_permalink($login_register_page_id);

                    if( false == $login_register_permalink ) {
                        return;
                    } else {
                        $tds_login_url = add_query_arg('password_reset_fail', '', $login_register_permalink);

                        // Verify key / login combo
                        $user = check_password_reset_key( $_REQUEST['key'], $_REQUEST['login'] );
                        if ( ! $user || is_wp_error( $user ) ) {
                            if ( $user && $user->get_error_code() === 'expired_key' ) {
                                wp_redirect( add_query_arg('expired_key', '', $tds_login_url) );
                            } else {
                                wp_redirect( add_query_arg('invalid_key', '', $tds_login_url) );
                            }
                            exit;
                        }
                
                        $tds_password_reset_url = add_query_arg('password_reset', '', $login_register_permalink);
                        $tds_password_reset_url = add_query_arg('login', esc_attr( $_REQUEST['login'] ), $tds_password_reset_url);
                        $tds_password_reset_url = add_query_arg('key', esc_attr( $_REQUEST['key'] ), $tds_password_reset_url);
                
                        wp_redirect( $tds_password_reset_url );
                    }
                }
                exit;
            }
        }
        
        add_action( 'login_init', function() {
            if ( isset( $_GET['action'] ) && 'tds_validate' === $_GET['action'] ) {
                $errors = new WP_Error();

                if ( isset( $_GET['login'] ) && !empty( $_GET['login'] ) && isset( $_GET['key'] ) && !empty( $_GET['key'] ) ) {

                    $has_error = false;

                    $login_register_page_id = tds_util::get_tds_option('create_account_page_id');
                    if (!is_null($login_register_page_id)) {
                        $login_register_permalink = get_permalink($login_register_page_id);
                    }

                    $login = sanitize_user( wp_unslash( $_GET['login'] ) );
			        $user = get_user_by( 'login', $login );

			        if (false === $user ) {
			            $has_error = true;
                    } else {
				        $key          = $_GET[ 'key' ];
				        $tds_validate = get_user_meta( $user->ID, 'tds_validate', true );

				        if ( ! empty( $tds_validate ) && is_array( $tds_validate ) ) {

				            if (! empty( $tds_validate[ 'validation_time' ] ) ) {
                                if ( false !== $login_register_permalink ) {
                                    wp_redirect( add_query_arg('account_activation', 'already_activated', $login_register_permalink) );
                                } else {
                                    $errors->add(
                                        'validate',
                                        __( 'Your account has already been validated!' ),
                                        'message'
                                    );
                                    login_header( __( 'Validate your subscription account' ), '', $errors );
                                    login_footer();
                                }
                                exit();
				            } else if (! empty( $tds_validate[ 'key' ] ) ) {
					            $valid_key = $tds_validate[ 'key' ];
					            if ( $valid_key !== $key ) {
						            $has_error = true;
					            }
				            }
				        }
			        }

                    if ($has_error) {

                        if ( false !== $login_register_permalink ) {
                            wp_redirect( add_query_arg('account_activation', 'invalid_link', $login_register_permalink) );
                        } else {
                            $errors->add(
                                'validate',
                                __( 'Check your email for the correct validation link. This link is invalid' ),
                                'message'
                            );
                            login_header( __( 'Validate your subscription account' ), '', $errors );
                            login_footer();
                        }
                        exit();

                    } else {
                        $tds_validate['validation_time'] = strtotime('now');
                        update_user_meta($user->ID, 'tds_validate', $tds_validate);

                        if ( false !== $login_register_permalink ) {
                            wp_redirect( add_query_arg('account_activation', 'success', $login_register_permalink) );
                        } else {
                            login_header( __( 'Validate your subscription account' ));

                            ?>

                            <p>Your subscription account has been successfully confirmed!</p>

                            <?php
                            login_footer();
                        }
                        exit();
                    }

                } else {

                    global $wpdb;
                    $my_account_page_id = $wpdb->get_var( "SELECT value FROM tds_options WHERE name = 'my_account_page_id'");

                    if ( class_exists('SitePress') ) {
                        $translated_my_account_page_id = apply_filters('wpml_object_id', $my_account_page_id, 'page');
                        if ( !is_null($translated_my_account_page_id) ) {
                            $my_account_page_id = $translated_my_account_page_id;
                        }
                    }

                    if ( false !== $my_account_page_id ) {
                        $my_account_permalink = get_permalink( $my_account_page_id );
                        if (false !== $my_account_permalink ) {
                            $errors->add(
                                'validate',
                                sprintf( __( 'Validation link invalid. Check your email for the validation link, then visit your <a href="%s">subscription account</a>.' ), $my_account_permalink ),
                                'message'
                            );
                        }
                    }

                }

                login_header( __( 'Validate your subscription account' ), '', $errors );
                login_footer();
                exit();
            }
        });

        global $pagenow;
        if ( isset( $pagenow ) && $pagenow == 'plugins.php' ) {
            add_action('admin_notices', 'td_subscription::add_plugins_page_notices');
		}

	}

	static function clean_field( $var ) {
        return is_scalar( $var ) ? sanitize_text_field( $var ) : $var;
    }

	static function add_plugins_page_notices() {
	    //if ( get_option( 'revslider-valid', 'false' ) != 'false' ) return;

		$plugins = get_plugins();

		foreach( $plugins as $plugin_id => $plugin ){
			$slug = dirname( $plugin_id );

			if ( empty($slug) || $slug !== 'td-subscription' ) {
			    continue;
            }

            remove_action( "after_plugin_row_$plugin_id", 'wp_plugin_update_row', 10, 2 );
			add_action( "after_plugin_row_$plugin_id", 'td_subscription::add_notice_update_row', 10, 2 );

			break;
		}

    }

	public static function add_notice_update_row( $file, $plugin_data ) {
        $current = get_site_transient( 'update_plugins' );
        if ( ! isset( $current->response[ $file ] ) ) {
            return false;
        }

        $response = $current->response[ $file ];

        $plugins_allowedtags = array(
            'a'       => array(
                'href'  => array(),
                'title' => array(),
            ),
            'abbr'    => array( 'title' => array() ),
            'acronym' => array( 'title' => array() ),
            'code'    => array(),
            'em'      => array(),
            'strong'  => array(),
        );

        $plugin_name = wp_kses( $plugin_data['Name'], $plugins_allowedtags );
        $plugin_slug = isset( $response->slug ) ? $response->slug : $response->id;

        //if ( isset( $response->slug ) ) {
        //    $details_url = self_admin_url( 'plugin-install.php?tab=plugin-information&plugin=' . $plugin_slug . '&section=changelog' );
        //} elseif ( isset( $response->url ) ) {
        //    $details_url = $response->url;
        //} else {
        //    $details_url = $plugin_data['PluginURI'];
        //}

        $details_url = 'https://tagdiv.com/tagdiv-opt-in-builder/';

        $details_url = add_query_arg(
            array(
                'TB_iframe' => 'true',
                'width'     => 600,
                'height'    => 800,
            ),
            $details_url
        );

        /** @var WP_Plugins_List_Table $wp_list_table */
        $wp_list_table = _get_list_table(
            'WP_Plugins_List_Table',
            array(
                'screen' => get_current_screen(),
            )
        );

        if ( is_network_admin() || ! is_multisite() ) {
            if ( is_network_admin() ) {
                $active_class = is_plugin_active_for_network( $file ) ? ' active' : '';
            } else {
                $active_class = is_plugin_active( $file ) ? ' active' : '';
            }

            $requires_php   = isset( $response->requires_php ) ? $response->requires_php : null;
            $compatible_php = is_php_version_compatible( $requires_php );
            $notice_type    = $compatible_php ? 'notice-warning' : 'notice-error';

            printf(
                '<tr class="plugin-update-tr%s" id="%s" data-slug="%s" data-plugin="%s">' .
                '<td colspan="%s" class="plugin-update colspanchange">' .
                '<div class="update-message notice inline %s notice-alt"><p>',
                $active_class,
                esc_attr( $plugin_slug . '-update' ),
                esc_attr( $plugin_slug ),
                esc_attr( $file ),
                esc_attr( $wp_list_table->get_column_count() ),
                $notice_type
            );

            if ( ! current_user_can( 'update_plugins' ) ) {
                printf(
                    /* translators: 1: Plugin name, 2: Details URL, 3: Additional link attributes, 4: Version number. */
                    __( 'There is a new version of %1$s available. <a href="%2$s" %3$s>View version %4$s details</a>.' ),
                    $plugin_name,
                    esc_url( $details_url ),
                    sprintf(
                        'class="thickbox open-plugin-details-modal" aria-label="%s"',
                        /* translators: 1: Plugin name, 2: Version number. */
                        esc_attr( sprintf( __( 'View %1$s version %2$s details' ), $plugin_name, $response->new_version ) )
                    ),
                    esc_attr( $response->new_version )
                );
            } elseif ( empty( $response->package ) ) {
                printf(
                    /* translators: 1: Plugin name, 2: Details URL, 3: Additional link attributes, 4: Version number. */
                    __( 'There is a new version of %1$s available. <a href="%2$s" %3$s>View version %4$s details</a>. <em>Automatic update is unavailable for this plugin.</em>' ),
                    $plugin_name,
                    esc_url( $details_url ),
                    sprintf(
                        'class="thickbox open-plugin-details-modal" aria-label="%s"',
                        /* translators: 1: Plugin name, 2: Version number. */
                        esc_attr( sprintf( __( 'View %1$s version %2$s details' ), $plugin_name, $response->new_version ) )
                    ),
                    esc_attr( $response->new_version )
                );
            } else {
                if ( $compatible_php ) {
                    printf(
                        /* translators: 1: Plugin name, 2: Details URL, 3: Additional link attributes, 4: Version number, 5: Update URL, 6: Additional link attributes. */
                        __( 'There is a new version of %1$s available. <a href="%2$s" %3$s>View version %4$s details</a> or <a href="%5$s" %6$s>update now</a>.' ),
                        $plugin_name,
                        esc_url( $details_url ),
                        sprintf(
                            'class="thickbox open-plugin-details-modal" aria-label="%s"',
                            /* translators: 1: Plugin name, 2: Version number. */
                            esc_attr( sprintf( __( 'View %1$s version %2$s details' ), $plugin_name, $response->new_version ) )
                        ),
                        esc_attr( $response->new_version ),
                        wp_nonce_url( self_admin_url( 'update.php?action=upgrade-plugin&plugin=' ) . $file, 'upgrade-plugin_' . $file ),
                        sprintf(
                            'class="update-link" aria-label="%s"',
                            /* translators: %s: Plugin name. */
                            esc_attr( sprintf( _x( 'Update %s now', 'plugin' ), $plugin_name ) )
                        )
                    );
                } else {
                    printf(
                        /* translators: 1: Plugin name, 2: Details URL, 3: Additional link attributes, 4: Version number 5: URL to Update PHP page. */
                        __( 'There is a new version of %1$s available, but it doesn&#8217;t work with your version of PHP. <a href="%2$s" %3$s>View version %4$s details</a> or <a href="%5$s">learn more about updating PHP</a>.' ),
                        $plugin_name,
                        esc_url( $details_url ),
                        sprintf(
                            'class="thickbox open-plugin-details-modal" aria-label="%s"',
                            /* translators: 1: Plugin name, 2: Version number. */
                            esc_attr( sprintf( __( 'View %1$s version %2$s details' ), $plugin_name, $response->new_version ) )
                        ),
                        esc_attr( $response->new_version ),
                        esc_url( wp_get_update_php_url() )
                    );
                    wp_update_php_annotation( '<br><em>', '</em>' );
                }
            }

            /**
             * Fires at the end of the update message container in each
             * row of the plugins list table.
             *
             * The dynamic portion of the hook name, `$file`, refers to the path
             * of the plugin's primary file relative to the plugins directory.
             *
             * @since 2.8.0
             *
             * @param array $plugin_data {
             *     An array of plugin metadata.
             *
             *     @type string $name        The human-readable name of the plugin.
             *     @type string $plugin_uri  Plugin URI.
             *     @type string $version     Plugin version.
             *     @type string $description Plugin description.
             *     @type string $author      Plugin author.
             *     @type string $author_uri  Plugin author URI.
             *     @type string $text_domain Plugin text domain.
             *     @type string $domain_path Relative path to the plugin's .mo file(s).
             *     @type bool   $network     Whether the plugin can only be activated network wide.
             *     @type string $title       The human-readable title of the plugin.
             *     @type string $author_name Plugin author's name.
             *     @type bool   $update      Whether there's an available update. Default null.
             * }
             * @param array $response {
             *     An array of metadata about the available plugin update.
             *
             *     @type int    $id          Plugin ID.
             *     @type string $slug        Plugin slug.
             *     @type string $new_version New plugin version.
             *     @type string $url         Plugin URL.
             *     @type string $package     Plugin update package URL.
             * }
             */
            do_action( "in_plugin_update_message-{$file}", $plugin_data, $response ); // phpcs:ignore WordPress.NamingConventions.ValidHookName.UseUnderscores

            echo '</p></div></td></tr>';
        }
    }

	// @todo seems not to be used .. check if it's still needed && maybe remove
	static function get_custom_page( $slug, $content = '' ) {
	    $check_page_exist = tds_util::get_post_by_title( $slug, 'page' );

        if ( empty($check_page_exist) ) {
            wp_insert_post(
                array(
                'comment_status' => 'close',
                'ping_status'    => 'close',
                'post_author'    => 1,
                'post_title'     => ucwords($slug),
                'post_name'      => strtolower(str_replace(' ', '-', trim($slug))),
                'post_status'    => 'publish',
                'post_content'   => $content,
                'post_type'      => 'page',
                )
            );
        }

        return tds_util::get_post_by_title( $slug, 'page' );
    }

	// @todo seems not to be used .. check if it's still needed && maybe remove
    static function get_payment_method_credentials( $method = 'paypal', &$info = [] ) {
	    $credentials = [
            $method => [
                'client_id' => '',
                'is_active' => '',
                'is_sandbox' => ''
            ]
        ];

	    global $wpdb;
		$tds = $wpdb->get_results("SELECT * FROM tds_payment_paypal LIMIT 1", ARRAY_A);

		if (!empty($tds[0])) {

		    $credentials[$method]['client_id'] = ( '1' === $tds[0]['is_sandbox'] ) ? $tds[0]['client_id_sandbox'] : $tds[0]['client_id'];
            $credentials[$method]['is_active'] = $tds[0]['is_active'];
            $credentials[$method]['is_sandbox'] = $tds[0]['is_sandbox'];

            $info = [];
        }

        return $credentials[$method];
    }

    // hook before update
    static function tds_on_update_post_meta( $meta_id, $post_id, $meta_key, $meta_value ) {

	    switch ( get_post_type($post_id) ) {

	        case 'tds_product':
                break;

            case 'tds_plan':
                if ( 'td_post_theme_settings' === $meta_key ) {

                    remove_action( 'update_post_meta', 'td_subscription::tds_on_update_post_meta');
                    $post_meta = td_util::get_post_meta_array($post_id, $meta_key);
                    foreach (array('tds_payment_plan_status', 'tds_payment_plan_product') as $item) {
                        if ($post_meta[$item] !== $meta_value[$item]) {
                            delete_post_meta( $post_id, 'payment_plan_sync' );
                            break;
                        }
                    }
                }
                break;

            case 'tds_subscription':
                if ( 'td_post_theme_settings' === $meta_key) {

                    remove_action( 'update_post_meta', 'td_subscription::tds_on_update_post_meta');
                    $post_meta = td_util::get_post_meta_array($post_id, $meta_key);
                    foreach (array('tds_payment_subscription_status', 'tds_payment_plan_id') as $item) {
                        if ($post_meta[$item] !== $meta_value[$item]) {
                            delete_post_meta( $post_id, 'payment_subscription_sync' );
                            break;
                        }
                    }
                }
                break;

        }

    }

    // @todo seems not to be used .. check if it's still needed && maybe remove
	static function paypal_change_subscription_status( $subscription_ids = [], $status = '' ) {
		if (empty($subscription_ids) || empty($status) || !in_array($status, array('activate', 'suspend'))) {
			return;
		}

		$method_credentials = self::get_payment_method_credentials();
        $tds_paypal_token = $method_credentials['token'];

		$mh = curl_multi_init();
		$curl_handlers = [];
		foreach ($subscription_ids as $subscription_id ) {
			//curl init
		    $curl = curl_init();

			//add the handles
			curl_multi_add_handle( $mh, $curl);
			$curl_handlers[] = $curl;

			//curl setup
		    curl_setopt( $curl, CURLOPT_URL, "https://api-m.sandbox.paypal.com/v1/billing/subscriptions/" . $subscription_id . "/" . $status );
		    curl_setopt( $curl, CURLOPT_HTTPHEADER,
			    array(
				    "Content-Type: application/json",
				    "Authorization: Bearer $tds_paypal_token"
			    )
		    );

		    curl_setopt( $curl, CURLOPT_SSL_VERIFYHOST, false );
		    curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, false );
		    curl_setopt( $curl, CURLOPT_POST, true );
		    curl_setopt( $curl, CURLOPT_POSTFIELDS, json_encode(array(
                "reason" => "change subscription status - tests"
            )));
		}

		//execute the multi handle
		do {
		    $status = curl_multi_exec($mh, $active);
		    if ($active) {
		        curl_multi_select($mh);
		    }
		} while ($active && $status == CURLM_OK);

		//close the handles
		foreach ($curl_handlers as $curl_handler) {
			curl_multi_remove_handle($mh, $curl_handler);
		}

		curl_multi_close($mh);
	}

	// @todo seems not to be used .. check if it's still needed && maybe remove
	static function payment_create_subscription($method, $settings = []) {

	    $result = [];

	    $need_settings = [ 'local_subscription_id', 'local_plan_id'];
	    foreach ($need_settings as $need_setting) {
	        if (empty($settings[$need_setting])) {
	            return $result;
            }
        }

        $tds_plan = get_post($settings['local_plan_id']);
	    if ( ! $tds_plan instanceof WP_Post || 'tds_plan' !== $tds_plan->post_type ) {
	        return $result;
        } else {
	        $td_post_settings = td_util::get_post_meta_array( $tds_plan->ID, 'td_post_theme_settings' );
	        $plan_id = $td_post_settings['tds_payment_plan_id'];
        }

		$method_credentials = self::get_payment_method_credentials();
        $tds_paypal_token = $method_credentials['token'];

        switch ($method) {

            case 'paypal':

                //curl init
                $curl = curl_init();

                //curl setup
                curl_setopt( $curl, CURLOPT_URL, "https://api-m.sandbox.paypal.com/v1/billing/subscriptions/");
                curl_setopt( $curl, CURLOPT_HTTPHEADER,
                    array(
                        "Content-Type: application/json",
                        "Authorization: Bearer $tds_paypal_token"
                    )
                );

                curl_setopt( $curl, CURLOPT_SSL_VERIFYHOST, false );
                curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, false );
                curl_setopt( $curl, CURLOPT_POST, true );
                curl_setopt( $curl, CURLOPT_POSTFIELDS, json_encode(array(
                    "plan_id" => $plan_id,
                    "quantity" => "20",
                    "shipping_amount" => [
                        "currency_code" => "USD",
                        "value" => "10.00"
                    ],
                )));

                //curl execute
                $response = curl_exec( $curl );
                $err      = curl_error( $curl );

                if ( $err ) {
                    $result[ 'error' ] = $err;
                } else {
                    $result[ 'response' ] = $response;
                    $response = json_decode($response, true );
                    if (!empty($response['id'])) {
                        tds_ajax::update_post_settings_meta($settings['local_subscription_id'], 'tds_payment_subscription_id', $response['id']);
                        update_post_meta($settings['local_subscription_id'], 'payment_subscription_sync', 1);
                    }
                    update_post_meta($settings['local_subscription_id'], 'payment_response_create_subscription', $response);
                }

                break;
        }


        return $result;
	}

	/**
	 * register core post types
	 */
	public static function register_post_type( $name, $options ) {

		if ( post_type_exists($name) ) {
			return;
		}

		register_post_type( $name, $options );

	}

	/**
	 * register core taxonomy
	 */
	public static function register_taxonomy() {

		if ( taxonomy_exists( 'tds_list' ) ) {
			return;
		}

		/**
		 * Add new taxonomy, NOT hierarchical (like tags)  and associate it to the tds_email (lead) custom post type
		 * https://developer.wordpress.org/reference/functions/register_taxonomy/
		 */
		$tds_list_labels = array(
			'name'                       => 'Leads - Lists',
			'singular_name'              => 'Leads - List',
			'search_items'               => 'Search Lists',
			'all_items'                  => 'All Lists',
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => 'Edit List',
			'update_item'                => 'Update List',
			'add_new_item'               => 'Add New List',
			'new_item_name'              => 'New List Name',
			'add_or_remove_items'        => 'Add or remove lists',
			'not_found'                  => 'No lists found.',
			'menu_name'                  => 'Leads - Lists',
		);
		$args = array(
			'hierarchical'          => true,
			'labels'                => $tds_list_labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'query_var'             => true,
			'default_term'          => 'Default List',
			'rewrite'               => array( 'slug' => 'tds_list' ),
		);
		register_taxonomy( 'tds_list', 'tds_email', $args );

	}

	/**
	 * adds locker on activation
	 *
	 * @param string $default_locker_option_id - option id
	 * @param array $post_info - post info
	 * @param array $post_meta - post meta data
	 */
	public static function add_default_locker( $default_locker_option_id, $post_info, $post_meta ) {

		global $wpdb;

		$slug = $post_info['post_name'];
		$post_type = $post_info['post_type'];

		$id = $wpdb->get_var("SELECT ID FROM " . $wpdb->posts . " WHERE post_name = '$slug' AND 
                    post_type = '" . $post_type . "' LIMIT 1");

		$default_locker_option_val = get_option( $default_locker_option_id );

		if ( !$id ) {
			$create = true;

			if ( !empty( $default_locker_option_val ) ) {
				$post_id = $wpdb->get_var("SELECT ID FROM " . $wpdb->posts . " WHERE ID = '$default_locker_option_val' AND 
                            post_type = '" . $post_type . "' LIMIT 1");
				if ( $post_id ) {
					$create = false;
				}

			}

			if ( $create ) {
				if ( !isset( $post_info['post_status'] ) ) {
					$post_info['post_status'] = 'publish';
				}

				// '@' here is to hide unexpected output while plugin activation
				$optionValue = @wp_insert_post( $post_info );
				$id = $optionValue;
				update_option( $default_locker_option_id, $optionValue );
			}
		} else {
			if ( empty ( $default_locker_option_val ) ) {
				update_option( $default_locker_option_id, $id );
			}
		}

		update_option( $default_locker_option_id, $id );

		// add meta
		foreach ( $post_meta as $post_meta_key => $post_meta_data ) {
			add_post_meta( $id, $post_meta_key, $post_meta_data );
		}

		return $id;

	}

	/**
	 * update admin menu
	 */
	public static function admin_menu() {
		global $menu;
		global $submenu;

		foreach( $menu as $index => $item ) {
			if ( isset( $item[2] ) && $item[2] === 'edit.php?post_type=tds_email' ) {
				$menu[$index][0] = 'Opt-In Builder';
				break;
			}
		}

	}

	/**
	 * adds `locked_only` filter to blocks params array ( filter to show exclusive posts only)
	 *
	 * hooked on 'td_composer_map_filter_array' in td-composer & 'td_cloud_library_loop_map_filter_array' filter in td-cloud-library
	 */
	public static function add_locked_posts_filter( $filters_array, $group ) {
		return array_merge(
			$filters_array,
			array(
				array(
					"param_name"  => "locked_only",
					"type"        => "checkbox",
					"value"       => '',
					"heading"     => "Show exclusive posts only",
					"description" => "",
					"holder"      => "div",
					"class"       => "",
					"info_img"    => "",
					'group'       => $group
				)
			)
		);
	}

	/**
	 * adds `locked_only` wp query args filter to blocks query ( filter to show exclusive posts only)
	 *
	 * hooked on 'td_data_source_blocks_query_args' in td-composer/legacy/common/wp_booster/td_data_source.php
	 */
	public static function add_locked_posts_filter_args( $td_query_args, $td_block_atts ) {

		// get block type
		$block_type = $td_block_atts['block_type'] ?? null;

		// the list of block types we target
		$block_types = array(
			'td_flex_block_1',
			'td_flex_block_2',
			'td_flex_block_3',
			'td_flex_block_4',
			'td_flex_block_5',
			'td_flex_block_6',
			'tdb_flex_block_builder',
			'td_block_big_grid_flex_1',
			'td_block_big_grid_flex_2',
			'td_block_big_grid_flex_3',
			'td_block_big_grid_flex_4',
			'td_block_big_grid_flex_5',
			'td_block_big_grid_flex_6',
			'td_block_big_grid_flex_7',
			'td_block_big_grid_flex_8',
			'td_block_big_grid_flex_9',
			'td_block_big_grid_flex_10',
            'tdb_header_search',
            'tdb_mobile_search'
		);
        // add exclusive filter for newsmag blocks
        if ( 'Newsmag' === TD_THEME_NAME ) {
            $block_types = array(
                'td_block_1',
                'td_block_2',
                'td_block_3',
                'td_block_4',
                'td_block_5',
                'td_block_6',
                'td_block_7',
                'td_block_8',
                'td_block_9',
                'td_block_10',
                'td_block_11',
                'td_block_12',
                'td_block_13',
                'td_block_14',
                'td_block_15',
                'td_block_16'
            );
        }


		if ( $block_type && in_array( $block_type, $block_types ) /*&& !( tdc_state::is_live_editor_iframe() || tdc_state::is_live_editor_ajax() )*/ ) {

			//echo '<pre class="td-container">';
			//echo '$td_query_args: ' . PHP_EOL;
			//print_r($td_query_args);
			//echo '$td_block_atts: ' . PHP_EOL;
			//echo 'locked_only: ';
			//var_dump($td_block_atts['locked_only']);
			//echo '</pre>';

			// locked content
			$locked_only = $td_block_atts['locked_only'] ?? null;
			if ( $locked_only ) {
				$td_query_args['meta_key'] = 'tds_lock_content';
			}

		}

		return $td_query_args;
	}

    /**
     * adds exclusive label params array
     *
     * hooked on 'get_map_exclusive_label_array' in td-composer & td-cloud-library
     */
    public static function add_exclusive_label_settings( $label_array, $index, $sep_small, $group ) {

        if( $index != '' ) {
            $index = '_' . $index;
        }

        $sep_class = '';
        if ( $sep_small ) {
            $sep_class = 'tdc-separator-small';
        }

        return array_merge(
            $label_array,
            array(
                array(
                    "param_name" => "separator",
                    "type" => "text_separator",
                    'heading' => 'Exclusive label',
                    "value" => "",
                    "class" => $sep_class,
                    "group" => $group,
                ),
                array(
                    "param_name" => "excl_show" . $index,
                    "type" => "dropdown-responsive",
                    "value" => array(
                        'Show' => 'inline-block',
                        'Hide' => 'none',
                    ),
                    "heading" => 'Show label',
                    "description" => "",
                    "holder" => "div",
                    "class" => "tdc-dropdown-big",
                    "group" => $group,
                    "info_img" => "",
                ),
                array(
                    "param_name" => "separator",
                    "type" => "horizontal_separator",
                    "value" => "",
                    "class" => "tdc-separator-small",
                    "group" => $group,
                ),
                array(
                    "param_name" => "excl_txt" . $index,
                    "type" => "textfield",
                    "value" => '',
                    "heading" => 'Text',
                    "description" => "",
                    "holder" => "div",
                    "class" => "tdc-textfield-big",
                    "placeholder" => "EXCLUSIVE",
                    "group" => $group,
                    "info_img" => "",
                ),
                array(
                    "param_name" => "separator",
                    "type" => "horizontal_separator",
                    "value" => "",
                    "class" => "tdc-separator-small",
                    "group" => $group,
                ),
                array(
                    "param_name" => "excl_margin" . $index,
                    "type" => "textfield-responsive",
                    "value" => '',
                    "heading" => 'Spacing',
                    "description" => "",
                    "holder" => "div",
                    "class" => "tdc-textfield-big",
                    "placeholder" => "0 8px 0 0",
                    "group" => $group,
                    "info_img" => "",
                ),
                array(
                    "param_name" => "excl_padd" . $index,
                    "type" => "textfield-responsive",
                    "value" => '',
                    "heading" => 'Padding',
                    "description" => "",
                    "holder" => "div",
                    "class" => "tdc-textfield-big",
                    "placeholder" => "4px 8px 2px",
                    "group" => $group,
                    "info_img" => "",
                ),
                array(
                    "param_name" => "all_excl_border" . $index,
                    "type" => "textfield-responsive",
                    "value" => '',
                    "heading" => 'Border size',
                    "description" => "",
                    "holder" => "div",
                    "class" => "tdc-textfield-big",
                    "placeholder" => "0",
                    "group" => $group,
                    "info_img" => "",
                ),
                array(
                    "param_name"  => "all_excl_border_style" . $index,
                    "type"        => "dropdown-responsive",
                    "value"       => array(
                        'Solid'  => 'solid',
                        'Dotted' => 'dotted',
                        'Dashed' => 'dashed',
                    ),
                    "heading"     => 'Border style',
                    "description" => "",
                    "holder"      => "div",
                    "class"       => "tdc-dropdown-big",
                    "group"       => $group,
                    "info_img" => "",
                ),
                array(
                    "param_name" => "excl_radius" . $index,
                    "type" => "textfield-responsive",
                    "value" => '',
                    "heading" => 'Border radius',
                    "description" => "",
                    "holder" => "div",
                    "class" => "tdc-textfield-big",
                    "placeholder" => "0",
                    "group" => $group,
                    "info_img" => "",
                ),
                array(
                    "param_name" => "separator",
                    "type" => "text_separator",
                    'heading' => 'Style',
                    "value" => "",
                    "class" => "tdc-separator-small",
                    "group" => $group,
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "tdc-colorpicker-double-a",
                    "heading" => 'Text color',
                    "param_name" => "excl_color" . $index,
                    "value" => '',
                    "description" => '',
                    "group" => $group,
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "tdc-colorpicker-double-b",
                    "heading" => 'Text hover color',
                    "param_name" => "excl_color_h" . $index,
                    "value" => '',
                    "description" => '',
                    "group" => $group,
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "tdc-colorpicker-double-a",
                    "heading" => 'Background color',
                    "param_name" => "excl_bg" . $index,
                    "value" => '',
                    "description" => '',
                    "group" => $group,
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "tdc-colorpicker-double-b",
                    "heading" => 'Background hover color',
                    "param_name" => "excl_bg_h" . $index,
                    "value" => '',
                    "description" => '',
                    "group" => $group,
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "tdc-colorpicker-double-a",
                    "heading" => 'Border color',
                    "param_name" => "all_excl_border_color" . $index,
                    "value" => '',
                    "description" => '',
                    "group" => $group,
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "tdc-colorpicker-double-b",
                    "heading" => 'Border hover color',
                    "param_name" => "excl_border_color_h" . $index,
                    "value" => '',
                    "description" => '',
                    "group" => $group,
                ),
                array(
                    "param_name" => "separator",
                    "type" => "horizontal_separator",
                    "value" => "",
                    "class" => "tdc-separator-small",
                    "group" => $group,
                ),
            ),
            td_config_helper::get_map_block_font_array( 'f_excl' . $index, true, 'Label text', $group )
        );

    }

    /**
     * adds 'exclusive' class to modules
     *
     * hooked on 'render' in td-composer/legacy/Newspaper/modules
     */
	public static function add_exclusive_class_on_modules( $additional_classes, $post ) {

        //$post_id = $post->ID;
        //live search case
        if ( is_array($post) && !empty($post) ) {
            $post_id = $post['post_id'];
        } else {
            $post_id = $post->ID;
        }

	    $locked_content_meta = get_post_meta($post_id, 'tds_lock_content');
	    if( $locked_content_meta ) {
            $additional_classes[] = 'td-module-exclusive';
        }

	    return $additional_classes;

    }

    /**
     * adds 'exclusive' class to modules
     *
     * hooked on 'render' in td-cloud-library/modules
     */
    public static function add_exclusive_class_on_cloud_modules( $additional_classes, $post ) {

        $locked_content_meta = get_post_meta($post['post_id'], 'tds_lock_content');
        if( $locked_content_meta ) {
            $additional_classes[] = 'td-module-exclusive';
        }

        return $additional_classes;

    }

	/**
	 * callback hooked to theme's post theme settings metabox setup options to add the save_filter callback option
	 *
	 * @param $mb_setup_options
	 *
	 * @return mixed
	 */
	public static function add_mb_setup_options( $mb_setup_options ) {
		$mb_setup_options['save_filter'] = array( __CLASS__, 'td_post_theme_settings_mb_save_filter' );
		return $mb_setup_options;
	}

	/**
	 * callback for td_post_theme_settings metabox > 'save_filter' option
	 *
	 * on post save.. this callback creates an individual tds lock content meta on post that will be used to filter posts via content lock
	 *
	 * @param $metabox_data_array
	 * @param $post_id
	 *
	 * @return mixed
	 */
	public static function td_post_theme_settings_mb_save_filter( $metabox_data_array, $post_id ) {

		// check for tds_lock_content key in meta box data..
		if ( array_key_exists( 'tds_lock_content', $metabox_data_array ) ) {
			update_post_meta( $post_id, 'tds_lock_content', $metabox_data_array['tds_lock_content'] );
		} else {
			delete_post_meta( $post_id, 'tds_lock_content' );
		}

		//print_r($metabox_data_array);
		//print_r($post_id);
		//exit; // exit here only to show you the output when saving

		return $metabox_data_array;
	}

	/**
	 * outputs the markup of the side meta box in the CPT post.php page.
	 *
	 * @param WP_Post $post - the post for which to output the box.
	 * @return void
	 */
	public static function print_status_meta_box( $post ) {

		$post_type        = $post->post_type;
		$post_type_object = get_post_type_object( $post_type );
		$can_publish      = current_user_can( $post_type_object->cap->publish_posts );

		?>
        <style>
            #tds_email .inside {
                margin: 0;
                padding: 0;
            }
        </style>
		<div class="submitbox" id="submitpost">
			<div id="minor-publishing">
				<div id="minor-publishing-actions">
                    <div id="save-action"></div>
					<div class="clear"></div>
				</div>
				<div id="misc-publishing-actions">
					<?php

					$date_string = __( '%1$s at %2$s' );
					$date_format = _x( 'M j, Y', 'publish box date format' );
					$time_format = _x( 'H:i', 'publish box time format' );

					if ( $post->ID !== 0 && 'publish' === $post->post_status ) {
						$stamp = 'Added on: %s';
						$date = sprintf(
							$date_string,
							date_i18n( $date_format, strtotime( $post->post_date ) ),
							date_i18n( $time_format, strtotime( $post->post_date ) )
						);
					} else { // not published or invalid post id
						$stamp = 'Add <b>immediately</b>';
						$date  = '';
					}

					if ( $can_publish ) :
						?>
						<div class="misc-pub-section curtime misc-pub-curtime">
							<span id="timestamp">
                                <?php printf( $stamp, '<b>' . $date . '</b>' ); ?>
                            </span>
						</div>
					<?php
					endif;

					?>
				</div>
			</div>
			<div id="major-publishing-actions">
				<div id="delete-action">
					<a class="submitdelete deletion" style="display: block !important;" href="<?php echo esc_url( get_delete_post_link( $post->ID, '', true ) ); ?>">Delete</a>
				</div>
				<div id="publishing-action">
                    <span class="spinner"></span>
                    <?php

                    if ( !in_array( $post->post_status, array( 'publish', 'future', 'private' ), true ) || 0 === $post->ID ) {
	                    if ( $can_publish ) {
		                    ?>
                            <input name="original_publish" type="hidden" id="original_publish" value="<?php esc_attr_e( 'Publish' ); ?>" />
		                    <?php submit_button( __( 'Add' ), 'primary large', 'publish', false ); ?>
		                    <?php
                        }
                    } else {
	                    ?>
                        <input name="original_publish" type="hidden" id="original_publish" value="<?php esc_attr_e( 'Update' ); ?>" />
	                    <?php submit_button( __( 'Update' ), 'primary large', 'save', false, array( 'id' => 'publish' ) ); ?>
	                    <?php
                    }

                    ?>
				</div>
				<div class="clear"></div>
			</div>
		</div>

		<?php

	}

	/**
     * @todo check if it's used/needed
     *
	 * @param $message
	 * @param string $notice_type
	 * @param array $data
	 */
	static function add_notice( $message, $notice_type = 'success', $data = array() ) {

	    $notices = WC()->session->get( 'wc_notices', array() );

        // Backward compatibility.
        if ( 'success' === $notice_type ) {
            $message = apply_filters( 'woocommerce_add_message', $message );
        }

        $message = apply_filters( 'woocommerce_add_' . $notice_type, $message );

        if ( ! empty( $message ) ) {
            $notices[ $notice_type ][] = array(
                'notice' => $message,
                'data'   => $data,
            );
        }

        WC()->session->set( 'wc_notices', $notices );
    }

	/**
     * add body classes
     *
	 * @param $classes
	 *
	 * @return array|mixed
	 */
    public static function add_body_classes( $classes ) {

        if ( tds_util::is_my_account_page() ) {
            $classes[] = 'tds-page';
            $classes[] = 'tds-my-account';
        } else if( tds_util::is_checkout_page() ) {
            $classes[] = 'tds-page';
            $classes[] = 'tds-checkout';
        } else if ( tds_util::is_login_register_page() ) {
            $classes[] = 'tds-page';
            $classes[] = 'tds-login-register';
        }

        return array_unique( $classes );

    }

	/**
     * filter callback hooked to theme's post/page theme settings metabox to add the locker settings tab
     *
	 * @param $td_settings_tabs - post/page settings tabs array
	 *
	 * @return mixed
	 */
    public static function add_locker_settings_tab( $td_settings_tabs ) {
	    return array_merge(
		    $td_settings_tabs,
		    array(
			    array(
				    'id' => 'tds_locker',
				    'name' => 'Locker',
				    'file' => TDS_PATH . '/includes/admin/metaboxes/tds_post_locker_settings.php',
			    )
		    )
	    );
    }

	/**
	 * this function adds the locked column & column data for post/page & cpts that have the lockers feature enabled
	 */
	public static function add_locked_column() {

		// get all the custom post types, except the built-in ones
		$td_custom_post_types = array_merge(
                get_post_types( array( '_builtin' => false ) ),
                array( 'post', 'page' ) // add posts & pages
        );
		foreach ( $td_custom_post_types as $cpt ) {

            $add_locked_column = false;
            if ( $cpt === 'post' || $cpt === 'page' ) {
	            $add_locked_column = true;
            } else {

	            $tds_custom_post_locker = '';
                if ( class_exists( 'td_util' ) ) {
	                $tds_custom_post_locker = td_util::get_ctp_option( $cpt, 'tds_custom_post_locker' );
                }

                if ( !empty( $tds_custom_post_locker ) ) {
                    $add_locked_column = true;
                }

            }

            if ( $add_locked_column ) {
	            add_filter( "manage_{$cpt}_posts_columns", array( __CLASS__, 'add_column' ) );
	            add_action( "manage_{$cpt}_posts_custom_column", array( __CLASS__, 'add_column_data' ), 10, 2 );
            }

        }

	}

    /**
     * callback function to add the locked column on manage_{$cpt}_posts_columns filter
     */
    public static function add_column( $columns ) {
	    $columns['locked'] = 'Locked';
	    return $columns;
    }

    /**
     * callback function to add the locked column data on manage_{$cpt}_posts_custom_column action
     */
    public static function add_column_data( $column, $post_id ) {

	    if ( $column === 'locked' ) {

		    $post_type = get_post_type( $post_id );

            // read post/page settings
            if ( $post_type === 'page' ) {

                $page_id = $post_id;
                $meta_key = 'td_page';
                $td_page_template = get_post_meta( $page_id, '_wp_page_template', true );

                if ( !empty( $td_page_template ) && ( $td_page_template == 'page-pagebuilder-latest.php' ) ) {
                    $meta_key = 'td_homepage_loop';
                }

                $td_page_meta = get_post_meta( $page_id, $meta_key, true );
                $tds_locker_settings = is_array( $td_page_meta ) ? $td_page_meta : array();

            } else {
	            $td_post_meta = get_post_meta( $post_id, 'td_post_theme_settings', true );
                $tds_locker_settings = is_array( $td_post_meta ) ? $td_post_meta : array();
            }

            $tds_lock_content = !empty( $tds_locker_settings['tds_lock_content'] );
            $tds_locker_id = !empty( $tds_locker_settings['tds_locker'] ) ? $tds_locker_settings['tds_locker'] : false;

            // get locker id in case we have a slug
            $locker = get_post($tds_locker_id);
            if ( is_null($locker) ) {
                $tds_lockers = get_posts([
                    'post_type' => 'tds_locker',
                    'post_status' => 'publish',
                    'numberposts' => -1, // get all, no limit
                ]);

                foreach ( $tds_lockers as $tds_locker ) {
                    $tds_locker_types = get_post_meta( $tds_locker->ID, 'tds_locker_types', true );
                    if ( !empty( $tds_locker_types['tds_locker_slug'] ) && $tds_locker_id == $tds_locker_types['tds_locker_slug'] ) {
                        $tds_locker_id = $tds_locker->ID;
                        break;
                    }
                }
            }

            if ( $tds_lock_content && $tds_locker_id ) {
                $tds_locker_types = get_post_meta( $tds_locker_id, 'tds_locker_types', true );
                $tds_locker_post = get_post( $tds_locker_id );
                $tds_locker_post_title = ( $tds_locker_post instanceof WP_Post ) ? $tds_locker_post->post_title : '';

                echo '<a href="' . get_edit_post_link( $tds_locker_id ) . '">' . $tds_locker_post_title . '</a><br>' . ( empty( $tds_locker_types['tds_payable'] ) ? '#email': '#subscription' );
            } else {
                echo 'No';
            }

	    }

    }

}
