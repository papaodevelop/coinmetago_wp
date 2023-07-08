<?php
/**
 * File responsible for plugin welcome screen contents.
 *
 * @link  https://uriahsvictor.com
 * @since 2.0.0
 *
 * @package    Wcdpue
 * @subpackage Wcdpue/admin/partials
 */

defined( 'ABSPATH' ) or die( 'But why!?' );

/**
 * Set the transient.
 *
 * @since 2.0.0
 */
function wcdpue_show_welcome_screen() {
	 set_transient( 'wcdpue_welcome_screen_activation_redirect', true, 30 );
}

/**
 * Redirect to the welcome screen.
 *
 * @since 2.0.0
 */
function wcdpue_welcome_screen_do_activation_redirect() {
	// Bail if no activation redirect
	if ( ! get_transient( 'wcdpue_welcome_screen_activation_redirect' ) || get_option( 'wcdpue_showed_welcome_screen' ) ) {
		return;
	}

	// Delete the redirect transient
	delete_transient( 'wcdpue_welcome_screen_activation_redirect' );

	// Bail if activating from network, or bulk
	if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
		return;
	}

	// Redirect to welcome page
	wp_safe_redirect( add_query_arg( array( 'page' => 'wcdpue-welcome-to-awesome' ), admin_url( 'index.php' ) ) );

	update_option( 'wcdpue_showed_welcome_screen', true, false );

}
add_action( 'admin_init', 'wcdpue_welcome_screen_do_activation_redirect' );

/**
 * Contents of the welcome page.
 *
 * @since 2.0.0
 */
function wcdpue_welcome_screen_content() {  ?>
  <div class="wrap">
	<h2><?php _e( 'WooCommerce Downloadable Product Update E-mails', 'wcdpue' ); ?></h2>

	<h1>
	  <?php _e( 'Get started quickly with your brand new plugin!', 'wcdpue' ); ?>
	</h1>

	<h3><?php _e( 'Step 1 (Recommended):', 'wcdpue' ); ?></h3>
	<p><?php _e( 'Read plugin documentation', 'wcdpue' ); ?></p>
	<a href="http://uriahsvictor.com/wcdpue-pro-documentation/" class="button button-primary" target="_blank"><?php _e( 'Documentation', 'wcdpue' ); ?></a>
	<br>
	<h3><?php _e( 'Step 2 (Recommended):', 'wcdpue' ); ?></h3>
	<p><?php _e( 'Head over to the plugin settings page to configure your e-mail preferences.', 'wcdpue' ); ?></p>
	<a href="<?php menu_page_url( 'wcdpue' ); ?>" class="button button-primary" target="_blank"><?php _e( 'Settings page', 'wcdpue' ); ?></a>
	<br>
	<h3><?php _e( 'Step 3 (Recommended):', 'wcdpue' ); ?></h3>
	<p><?php _e( 'We highly recommend that you install and configure Post SMTP for better email deliverability.', 'wcdpue' ); ?></p>
	<a href="https://wordpress.org/plugins/post-smtp/" class="button button-primary" target="_blank"><?php _e( 'Get plugin', 'wcdpue' ); ?></a>
	<br>
	<p><strong><?php _e( 'Be sure to delete the Lite version of the plugin and all it\'s settings by select "Delete all plugin settings on uninstall?" on the WCDPUE Lite settings page and then deactivating and deleting it.', 'wcdpue' ); ?></strong></p>
  </div>
	<?php
}

/**
 * Create the welcome page menu item.
 *
 * @since 2.0.0
 */
function wcdpue_welcome_screen_pages() {
	add_dashboard_page(
		'WCDPUE PRO',
		'WCDPUE PRO Welcome Screen',
		'activate_plugins',
		'wcdpue-welcome-to-awesome', //try underscores
		'wcdpue_welcome_screen_content'
	);
}
add_action( 'admin_menu', 'wcdpue_welcome_screen_pages' );

/**
 * Delete the welcome page menu item.
 *
 * @since 2.0.0
 */
function wcdpue_welcome_screen_remove_menus() {
	 remove_submenu_page( 'index.php', 'wcdpue-welcome-to-awesome' );
}
add_action( 'admin_head', 'wcdpue_welcome_screen_remove_menus' );
