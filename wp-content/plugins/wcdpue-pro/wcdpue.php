<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link    https://uriahsvictor.com
 * @since   2.0.0
 * @package Wcdpue
 *
 * @wordpress-plugin
 * Plugin Name:       WCDPUE
 * Plugin URI:        https://uriahsvictor.com
 * Description:       Inform customers when there is an update to their Woocommerce downloadable product via email.
 * Version:           2.0.10
 * Requires at least: 4.6
 * Tested up to:      5.8
 * Requires PHP: 5.6
 * Author:            Uriahs Victor
 * Author URI:        https://uriahsvictor.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wcdpue
 * Domain Path:       /languages
 * WC requires at least: 3.0
 * WC tested up to: 5.6
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 2.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WCDPUE_VERSION', '2.0.8' );

global $wpdb;
/**
 * The database prefix.
 */
define( 'TLD_WCDPUE_DB_PREFIX', $wpdb->prefix );

/**
 * The WordPress posts table.
 */
define( 'TLD_WCDPUE_DB_POSTS_TABLE', TLD_WCDPUE_DB_PREFIX . 'posts' );

/**
 * The WooCommerce permissions table.
 */
define( 'TLD_WC_DOWNLOAD_PERMISSIONS_TABLE', TLD_WCDPUE_DB_PREFIX . 'woocommerce_downloadable_product_permissions' );

/**
 * The table for scheduling emails.
 */
define( 'TLD_WCDPUE_SCHEDULE_TABLE', TLD_WCDPUE_DB_PREFIX . 'wcdpue_scheduled' );

/**
 * The log table.
 */
define( 'TLD_WCDPUE_LOG_TABLE', TLD_WCDPUE_DB_PREFIX . 'wcdpue_log' );

/**
 * Debug.
 */
define( 'TLD_WCDPUE_DEBUG', false );

if ( function_exists( 'wp_get_environment_type' ) ) {
	if ( wp_get_environment_type() === 'local' ) {
		define( 'TLD_WCDPUE_DEBUG', true );
	}
}

define( 'WCDPUE_PUBLIC_PATH', plugin_dir_url( __FILE__ ) . 'public/' );

define( 'WCDPUE_ADMIN_PATH', plugin_dir_url( __FILE__ ) . 'admin/' );

define( 'WCDPUE_SHARED_ASSETS_PATH', plugin_dir_url( __FILE__ ) . 'shared/' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wcdpue-activator.php
 */
function activate_wcdpue() {
	include_once plugin_dir_path( __FILE__ ) . 'includes/class-wcdpue-activator.php';
	Wcdpue_Activator::activate();
}

/**
* Shows the welcome after plugin activation.
*/

	require_once plugin_dir_path( __FILE__ ) . 'admin/partials/wcdpue-welcome-screen.php';

/**
* Creates the settings page.
*/

	require_once plugin_dir_path( __FILE__ ) . 'admin/partials/wcdpue-admin-display.php';


/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wcdpue-deactivator.php
 */
function deactivate_wcdpue() {
	include_once plugin_dir_path( __FILE__ ) . 'includes/class-wcdpue-deactivator.php';
	Wcdpue_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wcdpue' );
register_activation_hook( __FILE__, 'wcdpue_show_welcome_screen' );
register_deactivation_hook( __FILE__, 'deactivate_wcdpue' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wcdpue.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since 2.0.0
 */
function run_wcdpue() {
	$plugin = new Wcdpue();
	$plugin->run();

}
run_wcdpue();
