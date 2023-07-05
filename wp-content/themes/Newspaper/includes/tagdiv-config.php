<?php

/**
 * Theme configuration
 *
 */

define("TD_THEME_NAME", "Newspaper");
define("TD_THEME_VERSION", "12.2");
define("TD_THEME_OPTIONS_NAME", "td_011");

//if no deploy mode is selected, we use the final deploy built
if (!defined('TD_DEPLOY_MODE')) {
    define("TD_DEPLOY_MODE", 'deploy');
}

$td_theme_version = get_transient( 'TD_THEME_VERSION' );
if ( false === $td_theme_version || TD_THEME_VERSION != $td_theme_version) {
   set_transient('TD_THEME_VERSION', TD_THEME_VERSION, 0);
   delete_transient('TD_CHECKED_LICENSE');
}

switch (TD_DEPLOY_MODE) {
    default:
        //deploy version - this is the version that we ship!
        define("TD_DEBUG_LIVE_THEME_STYLE", false);
        define("TD_DEBUG_IOS_REDIRECT", false);
        define("TD_DEBUG_USE_LESS", false);
        break;

    case 'dev':
        //dev version
        define("TD_DEBUG_LIVE_THEME_STYLE", true);
        define("TD_DEBUG_IOS_REDIRECT", false);
        define("TD_DEBUG_USE_LESS", true); //use less on dev
        break;

    case 'demo':
        //demo version
        define("TD_DEBUG_LIVE_THEME_STYLE", true);
		// remove themeforest iframe from ios devices on demo only!
		// not used anymore - live preview goes on select demos
        define("TD_DEBUG_IOS_REDIRECT", false);
        define("TD_DEBUG_USE_LESS", false);
        break;
}

do_action('td_config');

class tagdiv_config {

	/**
	 * setup the global theme specific variables
	 * @depends tagdiv_global
	 */
	static function on_tagdiv_global_after_config() {

		/**
		 * theme plugins
		 */
		tagdiv_global::$theme_plugins_for_info_list = array (
			array(
				'name' => 'Revolution Slider',
				'img' => get_template_directory_uri() . '/includes/wp-booster/wp-admin/images/plugins/rev-slider.png',
				'text' => 'Build amazing slide presentations for your website with ease<br><a href="https://forum.tagdiv.com/how-to-install-revolution-slider-v5/" target="_blank">How to install v5</a>',
				'required_label' => 'optional', //the text for required/recommended label - used also as a class for label bg color
				'slug' => 'revslider',
				'td_show_in_theme_plugins' => false, // custom field used to show the plugin in theme's plugins list
			),
			//array(
			//	'name' => 'Visual Composer',
			//	'img' => get_template_directory_uri() . '/includes/wp-booster/wp-admin/images/plugins/visual-composer.png',
			//	'text' => 'Customize your pages and posts with this popular page builder<br><a href="https://forum.tagdiv.com/how-to-use-visual-composer/" target="_blank">Read more</a>',
			//	'required_label' => 'optional', //the text for required/recommended label - used also as a class for label bg color
			//	'slug' => 'js_composer'
			//)
		);
		tagdiv_global::$theme_plugins_list = array(
			array(
				'name' => 'tagDiv Composer', // The plugin name
				'slug' => 'td-composer', // The plugin slug (typically the folder name)
				'source' => 'https://cloud.tagdiv.com/td_plugins/td-composer/969f3bb4333afe45565e713582b6de14/td-composer.zip', // The plugin source
				'required' => true, // If false, the plugin is only 'recommended' instead of required
				'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' => '', // If set, overrides default API URL and points to an external URL
				'img' => get_template_directory_uri() . '/includes/wp-booster/wp-admin/images/plugins/td-composer.png',
				'text' => 'Create beautiful pages with this custom frontend drag and drop builder<br><a href="https://forum.tagdiv.com/tagdiv-composer-tutorial/" target="_blank">Read more</a>',
				'required_label' => 'required', //the text for required/recommended label - used also as a class for label bg color
				'td_activate' => false, // custom field used to activate the plugin
				'td_install' => false, // custom field used to install the plugin
				'td_class' => 'tdc_version_check', // class used to recognize the plugin is activated
				'td_install_in_welcome' => true, // custom field used to install/update/activate the plugin from theme welcome panel
				'td_show_in_theme_plugins' => true, // custom field used to show the plugin in theme's plugins list
                'td_demo_plugin' => false, // custom field used to show the plugin in theme's plugins list
            ),
			array(
				'name' => 'tagDiv Cloud Library', // The plugin name
				'slug' => 'td-cloud-library', // The plugin slug (typically the folder name)
				'source' => 'https://cloud.tagdiv.com/td_plugins/td-cloud-library/f41b1d596d81a0ab113b1f85139ed2c2/td-cloud-library.zip', // The plugin source
				'required' => true, // If false, the plugin is only 'recommended' instead of required
				'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' => '', // If set, overrides default API URL and points to an external URL
				'img' => get_template_directory_uri() . '/includes/wp-booster/wp-admin/images/plugins/cloud-templates.jpg',
				'text' => 'Access a huge collection of fully editable templates and elements',
				'required_label' => 'required', //the text for required/recommended label - used also as a class for label bg color
				'td_activate' => false, // custom field used to activate the plugin
				'td_install' => false, // custom field used to install the plugin
				'td_class' => 'tdb_version_check', // class used to recognize the plugin is activated
				'td_install_in_welcome' => true, // custom field used to install/update/activate the plugin from theme welcome panel
				'td_show_in_theme_plugins' => true, // custom field used to show the plugin in theme's plugins list
                'td_demo_plugin' => false, // custom field used to show the plugin in theme's plugins list
            ),
			array(
				'name' => 'tagDiv Social Counter', // The plugin name
				'slug' => 'td-social-counter', // The plugin slug (typically the folder name)
				'source' => 'https://cloud.tagdiv.com/td_plugins/td-social-counter/f70b7664cb5224295a91f7d2e89fc57e/td-social-counter.zip', // The plugin source
				'required' => true, // If false, the plugin is only 'recommended' instead of required
				'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' => '', // If set, overrides default API URL and points to an external URL
				'img' => get_template_directory_uri() . '/includes/wp-booster/wp-admin/images/plugins/social.png',
				'text' => 'Display your activity on social networks with style using this cool feature<br><a href="https://forum.tagdiv.com/tagdiv-social-counter-tutorial/" target="_blank">Read more</a>',
				'required_label' => 'optional', //the text for required/recommended label - used also as a class for label bg color
				'td_activate' => false, // custom field used to activate the plugin
				'td_install' => false, // custom field used to install the plugin
				'td_class' => 'td_social_counter_plugin', // class used to recognize the plugin is activated
				'td_install_in_welcome' => false, // custom field used to install/update/activate the plugin from theme welcome panel
				'td_show_in_theme_plugins' => true, // custom field used to show the plugin in theme's plugins list
                'td_demo_plugin' => false, // custom field used to show the plugin in theme's plugins list
            ),
			array(
				'name' => 'tagDiv Newsletter', // The plugin name
				'slug' => 'td-newsletter', // The plugin slug (typically the folder name)
				'source' => 'https://cloud.tagdiv.com/td_plugins/td-newsletter/b5d024fc3d2d7d1186882b920dc0e8be/td-newsletter.zip', // The plugin source
				'required' => false, // If false, the plugin is only 'recommended' instead of required
				'version' => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' => '', // If set, overrides default API URL and points to an external URL
				'img' => get_template_directory_uri() . '/includes/wp-booster/wp-admin/images/plugins/tagdiv-newsletter.png',
				'text' => 'tagDiv\'s Newsletter plugin, beautifully designed with over 8 styles',
				'required_label' => 'optional', //the text for required/recommended label - used also as a class for label bg color
				'td_activate' => false, // custom field used to activate the plugin
				'td_install' => false, // custom field used to install the plugin
				'td_class' => 'td_newsletter_version_check', // class used to recognize the plugin is activated
				'td_install_in_welcome' => false, // custom field used to install/update/activate the plugin from theme welcome panel
				'td_show_in_theme_plugins' => true, // custom field used to show the plugin in theme's plugins list
                'td_demo_plugin' => false, // custom field used to show the plugin in theme's plugins list
            ),
            array(
                'name' => 'tagDiv Opt-In Builder', // The plugin name
                'slug' => 'td-subscription', // The plugin slug (typically the folder name)
                'source' => 'https://cloud.tagdiv.com/td_plugins/td-subscription/td-subscription.zip', // The plugin source
                'required' => false, // If false, the plugin is only 'recommended' instead of required
                'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url' => '', // If set, overrides default API URL and points to an external URL
                'img' => get_template_directory_uri() . '/includes/wp-booster/wp-admin/images/plugins/tagdiv-optin.png',
                'text' => 'Generate leads & convert visitors to subscribers with opt-in content lockers',
                'required_label' => 'optional', //the text for required/recommended label - used also as a class for label bg color
                'td_activate' => false, // custom field used to activate the plugin
                'td_install' => false, // custom field used to install the plugin
                'td_class' => 'tds_version_check', // class used to recognize the plugin is activated
                'td_install_in_welcome' => false, // custom field used to install/update/activate the plugin from theme welcome panel
                'td_show_in_theme_plugins' => true, // custom field used to show the plugin in theme's plugins list
                'td_demo_plugin' => false, // custom field used to show the plugin in theme's plugins list
            ),
            array(
                'name' => 'tagDiv Shop', // The plugin name
                'slug' => 'td-woo', // The plugin slug (typically the folder name)
                'source' => 'https://cloud.tagdiv.com/td_plugins/td-woo/e847112a183ace2df79d0bbfd9d78b77/td-woo.zip', // The plugin source
                'required' => false, // If false, the plugin is only 'recommended' instead of required
                'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url' => '', // If set, overrides default API URL and points to an external URL
                'img' => get_template_directory_uri() . '/includes/wp-booster/wp-admin/images/plugins/tagdiv-shop.png',
                'text' => 'Activate for super powers and features on your WooCommerce website',
                'required_label' => 'optional', //the text for required/recommended label - used also as a class for label bg color
                'td_activate' => false, // custom field used to activate the plugin
                'td_install' => false, // custom field used to install the plugin
                'td_class' => 'td_woo_version_check', // class used to recognize the plugin is activated
                'td_install_in_welcome' => false, // custom field used to install/update/activate the plugin from theme welcome panel
                'td_show_in_theme_plugins' => true, // custom field used to show the plugin in theme's plugins list
                'td_demo_plugin' => false, // custom field used to show the plugin in theme's plugins list
            ),
			array(
				'name' => 'tagDiv Mobile Theme', // The plugin name
				'slug' => 'td-mobile-plugin', // The plugin slug (typically the folder name)
				'source' => 'https://cloud.tagdiv.com/td_plugins/td-mobile-plugin/95d7899533f233a2b9e1ea8f9e712022/td-mobile-plugin.zip', // The plugin source
				'required' => false, // If false, the plugin is only 'recommended' instead of required
				'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' => '', // If set, overrides default API URL and points to an external URL
				'img' => get_template_directory_uri() . '/includes/wp-booster/wp-admin/images/plugins/mobile.png',
				'text' => 'Make your website lighter and faster on all mobile devices<br><a href="https://forum.tagdiv.com/the-mobile-theme/" target="_blank">Read more</a>',
				'required_label' => 'optional', //the text for required/recommended label - used also as a class for label bg color
				'td_activate' => false, // custom field used to activate the plugin
				'td_install' => false, // custom field used to install the plugin
				'td_class' => 'td_mobile_theme', // class used to recognize the plugin is activated
				'td_install_in_welcome' => false, // custom field used to install/update/activate the plugin from theme welcome panel
				'td_show_in_theme_plugins' => true, // custom field used to show the plugin in theme's plugins list
                'td_demo_plugin' => false, // custom field used to show the plugin in theme's plugins list
            ),
			array(
				'name' => 'Official AMP for WP', // The plugin name
				'slug' => 'amp', // The plugin slug (typically the folder name)
				'required' => false, // If false, the plugin is only 'recommended' instead of required
				'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'img' => get_template_directory_uri() . '/includes/wp-booster/wp-admin/images/plugins/tagdiv-amp.png',
				'text' => 'Mobile Theme requires the AMP plugin to give your site the best results<br><a href="https://tagdiv.com/amp-newspaper-theme/" target="_blank">Read more</a>',
				'required_label' => 'optional', //the text for required/recommended label - used also as a class for label bg color
				'td_class' => 'AMP_Autoloader', // class used to recognize the plugin is activated
				'td_install_in_welcome' => false, // custom field used to install/update/activate the plugin from theme welcome panel
				'td_show_in_theme_plugins' => true, // custom field used to show the plugin in theme's plugins list
                'td_demo_plugin' => false, // custom field used to show the plugin in theme's plugins list
            ),
			array(
				'name' => 'WooCommerce', // The plugin name
				'slug' => 'woocommerce', // The plugin slug (typically the folder name)
				'required' => false, // If false, the plugin is only 'recommended' instead of required
				'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'img' => '',
				'text' => 'Read more',
				'required_label' => 'optional', //the text for required/recommended label - used also as a class for label bg color
				'td_class' => 'WooCommerce', // class used to recognize the plugin is activated
				'td_install_in_welcome' => false, // custom field used to install/update/activate the plugin from theme welcome panel
				'td_show_in_theme_plugins' => false, // custom field used to show the plugin in theme's plugins list
                'td_demo_plugin' => false, // custom field used to show the plugin in theme's plugins list
            ),
            array(
                'name' => 'tagDiv Standard Pack', // The plugin name
                'slug' => 'td-standard-pack', // The plugin slug (typically the folder name)
                'source' => 'https://cloud.tagdiv.com/td_plugins/td-standard-pack/7b24cfa58e9ab053c98d141038fd6ac7/td-standard-pack.zip', // The plugin source
                'required' => false, // If false, the plugin is only 'recommended' instead of required
                'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url' => '', // If set, overrides default API URL and points to an external URL
                'img' => get_template_directory_uri() . '/includes/wp-booster/wp-admin/images/plugins/standard-pack.jpg',
                'text' => 'Build your website fast and effortless without code. Perfect for beginners',
                'required_label' => 'optional', //the text for required/recommended label - used also as a class for label bg color
                'td_activate' => false, // custom field used to activate the plugin
                'td_install' => false, // custom field used to install the plugin
                'td_class' => 'tdsp_version_check', // class used to recognize the plugin is activated
                'td_install_in_welcome' => false, // custom field used to install/update/activate the plugin from theme welcome panel
                'td_show_in_theme_plugins' => true, // custom field used to show the plugin in theme's plugins list
                'td_demo_plugin' => false, // custom field used to show the plugin in theme's plugins list
            ),
			array(
				'name' => 'Advanced Custom Fields', // The plugin name
				'slug' => 'advanced-custom-fields', // The plugin slug (typically the folder name)
				'required' => false, // If false, the plugin is only 'recommended' instead of required
				'version' => '5.12.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'img' => get_template_directory_uri() . '/images/no-thumb/medium_large.png',
				'text' => 'Read more',
				'required_label' => 'optional', //the text for required/recommended label - used also as a class for label bg color
				'td_class' => 'ACF', // class used to recognize the plugin is activated
				'td_install_in_welcome' => false, // custom field used to install/update/activate the plugin from theme welcome panel
				'td_show_in_theme_plugins' => false, // custom field used to show the plugin in theme's plugins list
                'td_demo_plugin' => false, // custom field used to show the plugin in theme's plugins list
            ),
			array(
				'name' => 'Real Estate PRO Plugin', // The plugin name
				'slug' => 'td-demo-real-estate-pro', // The plugin slug (typically the folder name)
				'source' => 'https://cloud.tagdiv.com/td-demo-plugins/real-estate-pro/td-demo-real-estate-pro.zip', // The plugin source
				'required' => false, // If false, the plugin is only 'recommended' instead of required
				'version' => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' => '', // If set, overrides default API URL and points to an external URL
				'img' => get_template_directory_uri() . '/includes/wp-booster/wp-admin/images/plugins/tagdiv-realestate.jpg',
				'text' => 'tagDiv plugin with custom post types, taxonomies & custom fields and more for Real Estate PRO Demo.',
				'required_label' => 'optional', //the text for required/recommended label - used also as a class for label bg color
				'td_activate' => false, // custom field used to activate the plugin
				'td_install' => false, // custom field used to install the plugin
				'td_class' => 'td_real_estate_pro_demo_plugin', // class used to recognize the plugin is activated
				'td_install_in_welcome' => false, // custom field used to install/update/activate the plugin from theme welcome panel
				'td_show_in_theme_plugins' => false, // custom field used to show the plugin in theme's plugins list
				'td_demo_plugin' => true, // custom field used to show the plugin in theme's plugins list
			),
			array(
				'name' => 'Compass PRO Plugin', // The plugin name
				'slug' => 'td-demo-compass-pro', // The plugin slug (typically the folder name)
				'source' => 'https://cloud.tagdiv.com/td-demo-plugins/compass-pro/td-demo-compass-pro.zip', // The plugin source
				'required' => false, // If false, the plugin is only 'recommended' instead of required
				'version' => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' => '', // If set, overrides default API URL and points to an external URL
				'img' => get_template_directory_uri() . '/includes/wp-booster/wp-admin/images/plugins/tagdiv-compass.jpg',
				'text' => 'tagDiv plugin with custom post types, taxonomies & custom fields and more for Compass PRO Demo.',
				'required_label' => 'optional', //the text for required/recommended label - used also as a class for label bg color
				'td_activate' => false, // custom field used to activate the plugin
				'td_install' => false, // custom field used to install the plugin
				'td_class' => 'td_compass_pro_demo_plugin', // class used to recognize the plugin is activated
				'td_install_in_welcome' => false, // custom field used to install/update/activate the plugin from theme welcome panel
				'td_show_in_theme_plugins' => false, // custom field used to show the plugin in theme's plugins list
				'td_demo_plugin' => true, // custom field used to show the plugin in theme's plugins list
			),
            array(
                'name' => 'Eastcoast Check PRO Plugin', // The plugin name
                'slug' => 'td-demo-eastcoast-check-pro', // The plugin slug (typically the folder name)
                'source' => 'https://cloud.tagdiv.com/td-demo-plugins/eastcoast-check-pro/td-demo-eastcoast-check-pro.zip', // The plugin source
                'required' => false, // If false, the plugin is only 'recommended' instead of required
                'version' => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url' => '', // If set, overrides default API URL and points to an external URL
                'img' => get_template_directory_uri() . '/includes/wp-booster/wp-admin/images/plugins/tagdiv-eastcoast.jpg',
                'text' => 'tagDiv plugin with custom post types, taxonomies & custom fields and more for EastCoast Check PRO Demo.',
                'required_label' => 'optional', //the text for required/recommended label - used also as a class for label bg color
                'td_activate' => false, // custom field used to activate the plugin
                'td_install' => false, // custom field used to install the plugin
                'td_class' => 'td_eastcoast_check_pro_demo_plugin', // class used to recognize the plugin is activated
                'td_install_in_welcome' => false, // custom field used to install/update/activate the plugin from theme welcome panel
                'td_show_in_theme_plugins' => false, // custom field used to show the plugin in theme's plugins list
                'td_demo_plugin' => true, // custom field used to show the plugin in theme's plugins list
            ),
            array(
                'name' => 'Doctors PRO Plugin', // The plugin name
                'slug' => 'td-demo-doctors-pro', // The plugin slug (typically the folder name)
                'source' => 'https://cloud.tagdiv.com/td-demo-plugins/doctors-pro/td-demo-doctors-pro.zip', // The plugin source
                'required' => false, // If false, the plugin is only 'recommended' instead of required
                'version' => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url' => '', // If set, overrides default API URL and points to an external URL
                'img' => get_template_directory_uri() . '/includes/wp-booster/wp-admin/images/plugins/tagdiv-doctors.jpg',
                'text' => 'tagDiv plugin with custom post types, taxonomies & custom fields and more for Doctors PRO Demo.',
                'required_label' => 'optional', //the text for required/recommended label - used also as a class for label bg color
                'td_activate' => false, // custom field used to activate the plugin
                'td_install' => false, // custom field used to install the plugin
                'td_class' => 'td_doctors_pro_demo_plugin', // class used to recognize the plugin is activated
                'td_install_in_welcome' => false, // custom field used to install/update/activate the plugin from theme welcome panel
                'td_show_in_theme_plugins' => false, // custom field used to show the plugin in theme's plugins list
                'td_demo_plugin' => true, // custom field used to show the plugin in theme's plugins list
            ),
		);
	}
}
