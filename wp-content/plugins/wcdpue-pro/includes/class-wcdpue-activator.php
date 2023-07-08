<?php

/**
 * Fired during plugin activation.
 *
 * @link  https://uriahsvictor.com
 * @since 2.0.0
 *
 * @package    Wcdpue
 * @subpackage Wcdpue/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      2.0.0
 * @package    Wcdpue
 * @subpackage Wcdpue/includes
 * @author     Uriahs Victor <me@uriahsvictor.com>
 */
class Wcdpue_Activator {


	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since 2.0.0
	 */
	public static function activate() {
		self::wcdpue_setup_db();
		self::wcdpue_activate_cron_schedule();

	}

	/**
	 * Set up the plugin database table.
	 *
	 * Creates the different tables required by the plugin.
	 *
	 * @since 2.0.0
	 */
	public static function wcdpue_setup_db() {

		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}

		// https://wordpress.stackexchange.com/questions/218194/can-i-create-two-tables-at-single-time-while-installation-of-custom-plugin

		global $wpdb;
		$wcdpue_scheduled_tbl = TLD_WCDPUE_SCHEDULE_TABLE;
		$wcdpue_log_tbl       = TLD_WCDPUE_LOG_TABLE;

		//set table version
		$wcdpue_tbl_version = '2.0.0';

		if ( empty( get_option( 'wcdpue_tbl_version' ) ) || get_option( 'wcdpue_tbl_version' ) !== '2.0.0' ) {

			global $wpdb;
			include_once ABSPATH . 'wp-admin/includes/upgrade.php';
			$charset_collate = $wpdb->get_charset_collate();

			// create log table
			$log = "CREATE TABLE $wcdpue_log_tbl (
				id bigint(20) NOT NULL AUTO_INCREMENT,
				customer varchar(100),
				email varchar(50) NOT NULL,
				product_name varchar(500),
				status varchar(17) NOT NULL,
				time_stamp varchar(200) NOT NULL,
				PRIMARY KEY id  (id)
			) $charset_collate;";
			dbDelta( $log );

			$sql = "CREATE TABLE $wcdpue_scheduled_tbl (
				id bigint(20) NOT NULL AUTO_INCREMENT,
				product_id bigint(20),
				product_parent bigint(20) DEFAULT '0',
				order_id bigint(20),
				order_key varchar(200),
				user_email varchar(200) DEFAULT '',
				is_variable tinyint(1) DEFAULT '0',
				downloads_markup longtext,
				download_names longtext,
				PRIMARY KEY id  (id)
			) $charset_collate;";
			dbDelta( $sql );
		}

		// set log format
		update_option( 'wcdpue_log_date_format', 'd-m-Y H:i:s', false );
		// set default burst count
		update_option( 'wcdpue_email_bursts_count', 2, false );
		// set table version
		update_option( 'wcdpue_tbl_version', $wcdpue_tbl_version, false );
		// set optin option to not show by default
		update_option( 'wcdpue_opt_option', 'dont-show', false );

		// update old subject, content and WooCommerce style settings automatically
		$old_subject           = get_option( 'tld_wcdpue_email_subject' );
		$new_subject           = get_option( 'wcdpue_email_subject' );
		$old_body              = get_option( 'tld_wcdpue_settings_email_content' );
		$new_body              = get_option( 'wcdpue_settings_email_content' );
		$old_wc_style_settings = get_option( 'tld_wcdpue_wc_default_styles' );
		$new_wc_style_settings = get_option( 'wcdpue_wc_default_styles' );

		if ( ! empty( $old_subject ) && empty( $new_subject ) ) {
			add_option( 'wcdpue_email_subject', $old_subject, '', false );
		}

		if ( ! empty( $old_body ) && empty( $new_body ) ) {
			add_option( 'wcdpue_settings_email_content', $old_body, '', false );
		}

		if ( ! empty( $old_wc_style_settings ) && empty( $new_wc_style_settings ) ) {
			add_option( 'wcdpue_wc_default_styles', $old_wc_style_settings, '', false );
		}

		$wcdpue_first_install_version = get_option( 'wcdpue_first_install_version' );

		// Add the version the plugin was first installed at if it doesn't exist
		if ( $wcdpue_first_install_version === false ) {
			add_option( 'wcdpue_first_install_version', WCDPUE_VERSION, '', false );
		}

		$guest_purchases_notification = get_option( 'wcdpue_enable_notification_for_guest_purchases' );

		// If option doesn't exist, create it at install
		if ( $guest_purchases_notification === false ) {
			add_option( 'wcdpue_enable_notification_for_guest_purchases', 'on', '', false );
		}

	}

	/**
	 * Creates the cron event on plugin activation.
	 *
	 * Creates the cron event for sending scheduled mails.
	 *
	 * @since 2.0.0
	 */
	private static function wcdpue_activate_cron_schedule() {

		$wcdpue_current_recurrence = get_option( 'wcdpue_schedule_setting_value' );

		if ( ! empty( $wcdpue_current_recurrence ) ) {

			$wcdpue_active_cron_schedules = wp_get_schedules();

			foreach ( $wcdpue_active_cron_schedules as $key => $value ) {

				if ( $key === $wcdpue_current_recurrence ) {

					$wcdpue_cron_wait_time = $value['interval'];

				}
			}

			if ( ! wp_next_scheduled( 'wcdpue_email_send_burst' ) ) {
				wp_schedule_event( time() + $wcdpue_cron_wait_time, $wcdpue_current_recurrence, 'wcdpue_email_send_burst' );
			}
		} else {

			if ( ! wp_next_scheduled( 'wcdpue_email_send_burst' ) ) {
				wp_schedule_event( time(), 'wcdpue_cron', 'wcdpue_email_send_burst' );
			}
			update_option( 'wcdpue_schedule_setting_value', 'wcdpue_cron', false );

		}

	}

}
