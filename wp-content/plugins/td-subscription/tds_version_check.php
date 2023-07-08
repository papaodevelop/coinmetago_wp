<?php

/**
* Latest plugins crash when used with older theme versions
* Check for theme version and disable plugin functionality on old themes or themes that are not supported
* Display an admin notice and inform the user to update the plugin
* Introduced in Newspaper ver 11.2 and Newsmag ver 5.1
*/
class tds_version_check {

    // compatible theme versions
    static $theme_versions = array (
        'Newspaper' => '11.2',
        'Newsmag' => '5.1'
    );

    // current theme version
    static $theme_version;

	// current theme name
    static $theme_name;

    // tds version check init, sets the current theme version & name
    static function init() {

        // get current active theme
	    $current_theme = wp_get_theme();

        // child theme
        if ( $current_theme->parent() !== false ) {
            // set current parent theme version/name
            self::$theme_name = $current_theme->parent()->get( 'Name' );
            self::$theme_version = $current_theme->parent()->get( 'Version' );
        } else {
            // set current theme version/name
            self::$theme_name = $current_theme->get( 'Name' );
            self::$theme_version = $current_theme->get( 'Version' );
        }

    }

	/**
	 * Check if the plugin is compatible with the current theme version
	 * @return bool - on false display an admin_notice
	 */
    static function is_theme_version_compatible() {

        if ( self::$theme_version === '__td_deploy_version__' ) {
            return true;
        }

        if ( version_compare( self::$theme_version, self::$theme_versions[self::$theme_name], '<' ) ) {
            add_action( 'admin_notices', array( __CLASS__, 'on_admin_notice_theme_version' ) );
            return false;
        }

        return true;

    }

	/**
	 * Check if the plugin is compatible with the current active theme
	 * @return bool - on false display an admin_notice
	 */
	static function is_active_theme_compatible() {

		if ( !array_key_exists( self::$theme_name, self::$theme_versions ) ) {
			add_action( 'admin_notices', array( __CLASS__, 'on_admin_notice_theme' ) );
			return false;
		}

		return true;
	}

	/**
	 * Admin notice - the plugin is incompatible with current theme
	 */
	static function on_admin_notice_theme() {
		?>
        <div class="notice notice-error td-plugins-deactivated-notice">
            <p><strong>tagDiv Opt-In Builder</strong> - This plugin is not supported by the current theme!</p>
        </div>

		<?php
	}

	/**
	 * Admin notice - the plugin is incompatible with current theme version
	 */
    static function on_admin_notice_theme_version() {
        ?>
        <div class="notice notice-error td-plugins-deactivated-notice">
            <p><strong>tagDiv Opt-In Builder</strong> - This plugin requires <strong><?php echo self::$theme_name ?> v<?php echo self::$theme_versions[self::$theme_name] ?></strong> but the current installed version is <strong><?php echo self::$theme_name ?> v<?php echo self::$theme_version ?></strong>. </p>

            <p>To fix this:</p>

            <ul>
                <li> - Delete the tagDiv Opt-in Builder plugin via wp-admin</li>
                <li> - Install the version that is bundled with the theme from our Plugins Panel</li>
            </ul>
        </div>

        <?php
    }

}

// initialize tds_version_check
tds_version_check::init();