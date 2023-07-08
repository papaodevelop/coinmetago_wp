<?php
/**
 * Created by PhpStorm.
 * User: tagdiv
 * Date: 19.10.2015
 * Time: 15:04
 *
 * @package td-mobile-plugin
 */

/**
 * Class td_mobile_theme
 * Helper class used to interface the used detection library.
 */
class td_mobile_theme {

	const TDM_MOBILE_ON_DESKTOP = 'tdm_mobile_on_desktop';

	private static $td_theme_options = '';

	/**
	 * Directory name of the mobile theme.
	 * @var $mobile_dir string
	 */
	private static $mobile_dir = '/mobile';

	/**
	 * The detector object.
	 * @var object $mobile_detect object
	 */
	private static $mobile_detect;

	/**
	 * The absolute path to the mobile theme.
	 * @var string $mobile_dir_path
	 */
	static $mobile_dir_path;

	/**
	 * The remained uri path to the mobile theme.
	 * @var string $mobile_uri_path
	 */
	static $mobile_uri_path;

	/**
	 * The full url path to the main theme (It's internally used. It's public just for wp hook callback)
	 * It's computed on the 'setup_theme' wp hook, before mobile theme switching.
	 * @var string $main_uri_path
	 */
	static $main_uri_path;

	static $main_dir_path;

	/**
	 * this function returns a theme option
	 * @note this is similar with the theme @td_util::get_option but defined here because at the time the plugin is loaded and the mobile theme needs to be set we can't use @td_util::get_option
	 * @param $option_name - theme option name
	 *
	 * @return string - the theme option value
	 */
	static function get_option($option_name){

		$theme_options = get_option(self::$td_theme_options);
		if ( !empty( $theme_options[$option_name] ) ) {
			return $theme_options[$option_name];
		} else {
			return '';
		}

	}

	/**
	 * this function sets the theme options name @see td_mobile_theme::$td_theme_options
	 * @param $theme_name
	 */
	public static function set_theme_options($theme_name) {

		switch ($theme_name) {
			case 'Newspaper':
				self::$td_theme_options = 'td_011';
				break;
			case 'Newsmag':
				self::$td_theme_options = 'td_010';
				break;
		}

	}

	/**
	 * this function checks if the default wp amp plugins is enabled
	 * @return bool - true if amp is installed and enabled, false otherwise or if the old td-amp plugin is active
	 */
	static function is_amp_plugin_installed() {
		if ( defined('AMP__VERSION') && ! defined('TD_AMP') ) {
			return true;
		}

		return false;
	}

	/**
	 * this function uses the requests global to determine if a amp request was made
	 * @return bool - true if amp, false otherwise
	 */
	static function is_amp_request() {
		global $_REQUEST;

		if ( self::is_amp_plugin_installed() && isset( $_REQUEST[AMP_Theme_Support::SLUG] ) ){
			return true;
		}

		return false;
	}

	/**
	 * It detects the mobile.
	 * For some situations, especially for debugging, to force the mobile version of the theme for desktop agents.
	 * For this, it's enough to set the mobile version from theme panel and than call the function with $force_mobile_on_destop = true.
	 * Without parameter, this function detects just the mobile version.
	 *
	 * Example of $force_mobile_on_desktop = true, @see td-mobile-plugin.php
	 * The callback of the the_content wp hook:
	 *      add_filter('the_content', 'td_mobile_the_content', 999);
	 *
	 * It gets the mobile content of a page, on desktop agent.
	 *
	 * @param bool $force_mobile_on_desktop - Force the mobile version of the theme.
	 *
	 * @return bool
	 */
	public static function is_mobile($force_mobile_on_desktop = false) {
		if (!isset(self::$mobile_detect)) {
			self::$mobile_detect = new Mobile_Detect();
		}

		$current_theme = wp_get_theme();
		if ($current_theme !== null && is_a($current_theme, 'WP_Theme') === true) {
			$the_stylesheet = $current_theme->get_stylesheet();

			if (empty($the_stylesheet)) {
				$removed = remove_action('option_stylesheet', array('td_mobile_theme', 'mobile'));
				$the_stylesheet = get_option('stylesheet');

				if ($removed) {
					add_action('option_stylesheet', array('td_mobile_theme', 'mobile'));
				}
			}
			$theme_options = get_option('td_' . $the_stylesheet);

			$use_mobile_version_on_desktop = '';
			$option_key = self::TDM_MOBILE_ON_DESKTOP;

			if (is_array($theme_options) and array_key_exists($option_key, $theme_options)) {
				$use_mobile_version_on_desktop = $theme_options[ $option_key ];
			}

			//self::$is_mobile = ((self::$mobile_detect->isMobile() and ! self::$mobile_detect->isTablet()) or ! empty($use_mobile_version_on_desktop)) and ! is_admin();
			return ($force_mobile_on_desktop && !empty($use_mobile_version_on_desktop)) || (self::$mobile_detect->isMobile() && !self::$mobile_detect->isTablet());
		}
		return false;
	}

	/**
	 * Sets the
	 *      'theme_root',
	 *      'theme_root_uri',
	 *      'setup_theme'
	 * for the mobile theme.
	 * These must be the necessary hooks to set up the theme settings (also see the 'setup_theme' callback function)
	 * The priority must be higher than any other previous settings, to overwrite them.
	 */
	private static function set_mobile_theme() {
	    // 'stylesheet_directory' has been added here to solve theme.json issue for mobile theme. Without this it is trying to find
        // the json file NOT inside of main theme directory path
	    add_action('stylesheet_directory', array(__CLASS__, 'mobile_stylesheet_directory'), 10, 3);
        add_action('template_directory', array(__CLASS__, 'mobile_stylesheet_directory'), 10, 3);

		add_action('setup_theme', array(__CLASS__, 'mobile_theme_setup'), 999);
		add_filter('theme_root', array(__CLASS__, 'mobile_theme_root'), 999, 1);
		add_filter('theme_root_uri', array(__CLASS__, 'mobile_theme_root_uri'), 999, 1);

		/**
		 * hook here to check the post mobile theme status
		 */
		add_action( 'setup_theme', function () {

			global $_SERVER;
			$req_scheme = is_ssl() ? 'https' : 'http';
			$post_id = url_to_postid( $req_scheme . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );

			// get the mob theme status from post meta
			$status = get_post_meta( $post_id, 'tdm_status', true );

			// if the mobile theme is disabled for this post remove the mobile theme setup actions/filters
			if ( $status === 'disabled' ) {
				remove_action('setup_theme', array(__CLASS__, 'mobile_theme_setup'), 999);
				remove_filter('theme_root', array(__CLASS__, 'mobile_theme_root'), 999);
				remove_filter('theme_root_uri', array(__CLASS__, 'mobile_theme_root_uri'), 999);
				remove_filter('the_content', 'td_mobile_get_the_content_for_vc', 9);
				remove_action('stylesheet_directory', array(__CLASS__, 'mobile_stylesheet_directory'));
            } else {
                remove_action('template_directory', array(__CLASS__, 'mobile_stylesheet_directory'));
            }

		}, 998);
	}

	/**
	 * IF amp options are enabled from panel this function sets the paired mode and loads the mobile theme accordingly
	 * IF amp options are disabled, this sets and loads the mobile theme settings, on mobile devices
	 */
	static function set_the_theme() {

		if ( self::get_option('tdm_amp') !== '' ) {

			if ( self::is_amp_plugin_installed() ) {

				// accept sanitization
				add_filter( 'amp_validation_error_sanitized', function (){ return true; } );

				// this removes the amp options > validation submenu pages from admin menu && other validation messages
				add_action('init', function() {
					add_action( 'admin_menu', function (){
						remove_submenu_page( 'amp-options', 'edit.php?post_type=amp_validated_url' );
						remove_submenu_page( 'amp-options', esc_attr('edit-tags.php?taxonomy=amp_validation_error&post_type=amp_validated_url') );
					}, 999);
					add_action( 'wp_loaded', function (){
						remove_action( 'edit_form_top', 'AMP_Validation_Manager::print_edit_form_validation_status');
						remove_action( 'edit_form_top', 'AMP_Validated_URL_Post_Type::print_url_as_title');
						remove_action( 'all_admin_notices', 'AMP_Validation_Manager::print_plugin_notice' );

						remove_filter( 'dashboard_glance_items', 'AMP_Validated_URL_Post_Type::filter_dashboard_glance_items');
						remove_action( 'rightnow_end', 'AMP_Validated_URL_Post_Type::print_dashboard_glance_styles');

						remove_action( 'enqueue_block_editor_assets', 'AMP_Validation_Manager::enqueue_block_validation');
						remove_action( 'admin_bar_menu', 'AMP_Validation_Manager::add_admin_bar_menu_items', 101);

						// remove support for cloud templates post type
						remove_post_type_support( 'tdb_templates', AMP_Post_Type_Support::SLUG );

						// disable the all_templates_supported option to allow users to manually set amp support for templates and content types
						if ( AMP_Options_Manager::get_option( 'all_templates_supported' ) === true ) {
							AMP_Options_Manager::update_option( 'all_templates_supported', false );
						}

						// automatically set transitionl mode ( amp plugins ver 1.0.2 support )
						if ( AMP_Options_Manager::get_option( 'theme_support' ) !== 'transitional' ) {
							AMP_Options_Manager::update_option( 'theme_support', 'transitional' );
						} else {
							add_action( 'admin_print_styles', function (){
								?>

								<style type='text/css'>
									.amp-website-mode fieldset {
										display: none;
									}
								</style>

								<?php

							});
							add_action('admin_footer', function(){
								?>

								<script>
                                    ( function () {
                                        jQuery('.amp-website-mode > td').html('<div class="notice notice-info notice-alt inline"><p>Your install is configured via theme to use the Trasitional mode.</p></div>');
                                    }())
								</script>

								<?php
							});
						}

						// prevent amp validation on posts save
						remove_action( 'save_post', 'AMP_Validation_Manager::handle_save_post_prompting_validation' ); // classic editor
						remove_action( 'rest_api_init', 'AMP_Validation_Manager::add_rest_api_fields' ); // blocks editor

					});
				});

				// on admin add theme support for amp
				if ( is_admin() ) {
					/*
					if( wp_doing_ajax() ) {
						if ( self::is_amp_request() ) {
							self::set_mobile_theme();
						}
					}
					*/

					add_action( 'td_global_after', function (){
						// this adds theme support for amp in paired mode on admin
						add_theme_support(
							AMP_Theme_Support::SLUG,
							array(
								'paired' => true,
							)
						);
					});

					return;
				}

				// if 'Mobile Theme on Amp & Mobile' option is enabled from panel,
				// the mobile theme amp support is loaded on mobile devices & on ?amp requests
				if ( self::get_option('tdm_amp') === 'mobile_amp' ) {

					add_theme_support(
						AMP_Theme_Support::SLUG,
						array(
							'paired' => true,
						)
					);

					if( self::is_mobile(true) ) {
						self::set_mobile_theme();
					} else {
						if( self::is_amp_request() ) {
							self::set_mobile_theme();
						}
					}
				}

				// if 'Mobile Theme Just On Amp' option is enabled from panel,
				// the mobile theme amp support is loaded just on ?amp requests
				if( self::get_option('tdm_amp') === 'amp' ) {

					add_theme_support(
						AMP_Theme_Support::SLUG,
						array(
							'paired' => true,
						)
					);

					if ( self::is_amp_request() ) {
						self::set_mobile_theme();
					}
				}

			} else {
				// if the default wp amp plugin is not active reset mobile theme amp settings
				// we hook to 'td_global_after' to have access to theme's td_util
				add_action( 'td_global_after', function (){
					td_util::update_option( 'tdm_amp', '' );
				});
			}

		} else {

			// this function disables amp if the default wp amp plugin is used with the mobile theme plugin and amp settings are disabled in the mobile theme
			add_filter( 'amp_is_enabled', function ( $is_enabled ) {
				if (  self::is_amp_plugin_installed()  ) {
					$is_enabled = false;
				}
				return $is_enabled;
			} );

			// deprecated
            //if ( self::is_amp_plugin_installed() ) {
            //    add_action( 'after_setup_theme', function (){
            //        add_filter( 'amp_is_enabled', '__return_false' );
            //    }, 4);
            //}

			if ( self::is_mobile(true) && !is_admin() && !wp_is_json_request() ) {
				self::set_mobile_theme();
			}
		}
	}

	/**
	 * Helper function used by the 'wp_cache_check_mobile' function of the wp super cache plugin, to determine
	 * the proper cache key
	 *
	 * @param string $cache_key - the current cache key.
	 *
	 * @return string
	 */
	static function get_theme_setting($cache_key) {
		if (self::is_mobile()) {
			return 'mobile';
		}
		return 'normal';
	}

	/**
	 * Custom hook function used for the following wp hooks:
	 *      'stylesheet',
	 *      'template',
	 *      'option_template',
	 *      'option_stylesheet'
	 *
	 * @param string $theme - theme id.
	 *
	 * @return mixed
	 */
	static function mobile($theme) {
	    return apply_filters('td_mobile', '', $theme);
	}

	static function mobile_stylesheet_directory_uri($stylesheet_dir_uri, $stylesheet, $theme_root_uri) {
	    return rtrim($stylesheet_dir_uri, '/');
	}

	static function mobile_stylesheet_directory($stylesheet_dir, $stylesheet, $theme_root) {
	    $main_theme = wp_get_theme();
		$main_dir_path = $main_theme->get_template_directory();
        if ( td_mobile_theme::get_option('tdm_is_multisite') === 'yes' && is_multisite() ) {
            $main_dir_path = $main_theme->theme_root . '/themes' . get_template_directory();
        }
		$mobile_dir_path = TDC_PATH  . self::$mobile_dir;

        if ( file_exists( $mobile_dir_path ) ) {
	        return $main_dir_path;
        }
	    return $stylesheet_dir;
	}

	/**
	 * Hook function used for the wp 'theme_root' hook.
	 *
	 * @param string $theme_root - theme root path.
	 *
	 * @return string
	 */
	static function mobile_theme_root($theme_root) {
	    return self::$mobile_dir_path;
	}

	/**
	 * Hook function used for the wp 'theme_root_uri' hook.
	 *
	 * @param string $theme_root_uri - theme URI path.
	 *
	 * @return string
	 */
	static function mobile_theme_root_uri($theme_root_uri) {
		if (isset(self::$mobile_uri_path)) {
			return self::$mobile_uri_path;
		}
		return $theme_root_uri;
	}

	/**
	 * Hook function used for the wp 'setup_theme' hook.
	 * It executes before 'theme_root' and 'theme_root_uri'.
	 *
	 * The 'stylesheet', 'template', 'option_template', 'option_stylesheet' wp hooks are modified, so
	 * any existing settings can be saved before changes.
	 *
	 * The mobile theme directory path is set. It's too late to compute it on 'theme_root' or 'theme_root_uri' hooks,
	 * because they are called after 'theme_setup'.
	 */
	static function mobile_theme_setup() {
		$main_theme = wp_get_theme();
		$main_dir_path = $main_theme->get_template_directory();
        if ( td_mobile_theme::get_option('tdm_is_multisite') === 'yes' && is_multisite() ) {
            $main_dir_path = $main_theme->theme_root . '/themes' . get_template_directory();
        }
		$mobile_dir_path = TDC_PATH  . self::$mobile_dir;

		if ( file_exists( $mobile_dir_path ) ) {

			self::$main_dir_path = $main_dir_path;
			self::$mobile_dir_path = $mobile_dir_path;

			self::$main_uri_path = get_template_directory_uri();
			self::$mobile_uri_path = TDC_URL . self::$mobile_dir;

		} else {
			echo "The mobile theme path couldn't be set. Please check if you already have another mobile theme plugin active and disable it (ex. Jetpack Mobile Theme or similar). If you use a cache plugin clear it before checking the results.";
			die;
		}

		/*
		echo PHP_EOL;
		print_r(self::$main_dir_path);
		echo PHP_EOL;
		print_r(self::$mobile_dir_path);
		echo PHP_EOL;
		print_r(self::$main_uri_path);
		echo PHP_EOL;
		print_r(self::$mobile_uri_path);
		echo PHP_EOL;
		*/

		add_action('stylesheet', array(__CLASS__, 'mobile'));
		add_action('template', array(__CLASS__, 'mobile'));
		add_action('option_template', array(__CLASS__, 'mobile'));
		add_action('option_stylesheet', array(__CLASS__, 'mobile'));

		add_action('stylesheet_directory_uri', array(__CLASS__, 'mobile_stylesheet_directory_uri'), 10, 3);
	}
}
