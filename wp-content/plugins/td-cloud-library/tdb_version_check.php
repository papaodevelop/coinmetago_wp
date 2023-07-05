<?php

/**
 * Introduced in Newspaper 8.7.5 and Newsmag 4.4
 * - Check for PHP version, the plugin crashes on PHP 5.2.4 and lower
 * - Plugin crashes when used with older theme versions or other themes
 */
class tdb_version_check {

	// minimum compatible php version
	static $php_version = '5.4';

	// compatible theme versions
	static $theme_versions = array (
		'Newspaper' => '8.7.5',
		'Newsmag' => '4.4'
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
     * Check if the plugin is compatible with current version of PHP
	 * @return bool - on false display an admin_notice
	 */
	static function is_php_compatible() {

        if ( version_compare( phpversion(), self::$php_version, '<' ) ) {
	        add_action( 'admin_notices', array( __CLASS__, 'on_admin_notice_php_version' ) );
	        return false;
        }

		return true;
    }

	/**
     * Check if the plugin is compatible with the theme version
	 * @return bool - on false display an admin_notice
	 */
	static function is_theme_compatible() {

		if ( self::$theme_version === '__td_deploy_version__' ) {
			return true;
		}

		if ( version_compare(self::$theme_version, self::$theme_versions[self::$theme_name], '<' ) ) {
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

        // disable the 'Plugin activated.' message
		if ( isset( $_GET['activate'] ) )
            unset( $_GET['activate'] );

		?>
		<div class="notice notice-error td-plugins-deactivated-notice is-dismissible">
			<p><strong>tagDiv Cloud Library</strong> - Plugin deactivated. <br>This plugin is not supported by the current theme!</p>
		</div>

		<?php
	}


	/**
	 * Admin notice - the plugin is incompatible with current theme version
	 */
	static function on_admin_notice_theme_version() {
		?>
		<div class="notice notice-error td-plugins-deactivated-notice is-dismissible">
			<p><strong>tagDiv Cloud Library</strong> - This plugin requires <strong><?php echo self::$theme_name ?> v<?php echo self::$theme_versions[self::$theme_name] ?></strong> but the current installed version is <strong><?php echo self::$theme_name ?> v<?php echo self::$theme_version ?></strong>. </p>

			<p>To fix this:</p>

			<ul>
				<li> - Delete the tagDiv Cloud Library plugin via wp-admin</li>
				<li> - Install the version that is bundled with the theme from our Plugins Panel</li>
			</ul>
		</div>

		<?php
	}

	/**
	 * Admin notice - the plugin is incompatible current version of PHP
	 */
	static function on_admin_notice_php_version() {
		?>
        <div class="notice notice-error td-plugins-deactivated-notice is-dismissible">
            <p><strong>tagDiv Cloud Library</strong> - This plugin requires PHP v<?php echo self::$php_version ?> but the current PHP version is v<?php echo phpversion() ?>. </p>
        </div>

		<?php
	}

}
// initialize tdb_version_check
tdb_version_check::init();
