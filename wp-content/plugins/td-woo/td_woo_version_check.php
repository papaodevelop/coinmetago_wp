<?php


/**
 * Latest plugins crash when used with older theme versions
 * Check for theme version and disable plugin functionality on old themes
 * Display an admin notice and inform the user to update the plugin
 */
class td_woo_version_check {

	static $theme_versions = array (
		'Newspaper' => '10.3.3'
	);

	/**
	 * Check if the plugin is compatible with the theme
	 * @return bool - on false display an admin_notice
	 */
	static function is_theme_version_compatible() {

		if ( TD_THEME_VERSION === '__td_deploy_version__' ||
             TD_DEPLOY_MODE === 'dev' ||
             TD_DEPLOY_MODE === 'demo'
        ) {
			return true;
		}

		if ( version_compare(TD_THEME_VERSION, self::$theme_versions[TD_THEME_NAME], '<' ) ) {
			add_action( 'admin_notices', array(__CLASS__, 'on_admin_notice_theme_version'));
			return false;
		}

		return true;
	}

	/**
	 * Check if the plugin is compatible with the current active theme
	 * @return bool - on false display an admin_notice
	 */
	static function is_active_theme_compatible() {

		if ( TD_THEME_NAME !== 'Newspaper' ) {
			add_action( 'admin_notices', array(__CLASS__, 'on_admin_notice_theme') );
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
            <p><strong>tagDiv Shop</strong> - This plugin is not supported by the <strong><?php echo TD_THEME_NAME?></strong> theme!</p>
        </div>

		<?php
	}

	/**
	 * Admin notice - the plugin is incompatible with current theme version
	 */
	static function on_admin_notice_theme_version() {
		?>
        <div class="notice notice-error">
            <p><strong>tagDiv Shop</strong> - This plugin requires <strong><?php echo TD_THEME_NAME?> v<?php echo self::$theme_versions[TD_THEME_NAME] ?></strong> but the current installed version is <strong><?php echo TD_THEME_NAME?> v<?php echo TD_THEME_VERSION?></strong>. </p>

            <p>To fix this:</p>

            <ol style="margin-left: 1em;">
                <li> Delete the tagDiv Shop plugin via wp-admin.</li>
                <li> Install the version that is bundled with the theme from theme's <a href="admin.php?page=td_theme_plugins">Plugins Panel</a>.</li>
            </ol>
        </div>

		<?php
	}

}