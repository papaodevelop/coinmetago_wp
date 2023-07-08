<?php

/**
 * Fired during plugin deactivation
 *
 * @link  https://uriahsvictor.com
 * @since 2.0.0
 *
 * @package    Wcdpue
 * @subpackage Wcdpue/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      2.0.0
 * @package    Wcdpue
 * @subpackage Wcdpue/includes
 * @author     Uriahs Victor <me@uriahsvictor.com>
 */
class Wcdpue_Deactivator {


	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since 2.0.0
	 */
	public static function deactivate() {
		self::wcdpue_deactivate_schedule();
	}

	/**
	 * Deactivate the cron job.
	 *
	 * Destroy the cron job created by the plugin
	 *
	 * @since 2.0.0
	 */
	public static function wcdpue_deactivate_schedule() {

		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}

		$plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';

		check_admin_referer( "deactivate-plugin_{$plugin}" );

		wp_clear_scheduled_hook( 'wcdpue_email_send_burst' );

	}

}
