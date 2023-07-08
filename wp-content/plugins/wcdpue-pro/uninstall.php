<?php

/**
 * Uninstallation procedures of the plugin.
 *
 * @link  https://uriahsvictor.com
 * @since 2.0.0
 *
 * @package Wcdpue
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

$wcdpue_byebye = get_option( 'wcdpue_delete_db_settings' );

if ( ! empty( $wcdpue_byebye ) ) {

	delete_option( 'wcdpue_showed_welcome_screen' );

	delete_option( 'wcdpue_first_install_version' );
	delete_option( 'wcdpue_email_subject' );
	delete_option( 'wcdpue_settings_email_content' );
	delete_option( 'wcdpue_wc_default_styles' );
	delete_option( 'wcdpue_schedule_setting_value' );
	delete_option( 'wcdpue_using_downloads_magictag' );
	delete_option( 'wcdpue_enable_dokan_support' );
	delete_option( 'wcdpue_enable_notification_for_guest_purchases' );
	delete_option( 'wcdpue_email_bursts_count' );
	delete_option( 'wcdpue_log_date_format' );
	delete_option( 'wcdpue_delete_db_settings' );
	//delete_option( 'tld_wcdpue_activation_date' );
	delete_option( 'wcdpue_tbl_version' );
	delete_option( 'tld_table_version' ); // NOTE: old table option name prior to 1.4.0
	delete_option( 'wcdpue_show_immediately' );
	delete_option( 'wcdpue_allow_opt_out' );
	delete_option( 'wcdpue_show_unsubscribe_button_in_accounts' );
	delete_option( 'wcdpue_unsubscribe_button_text' );
	delete_option( 'wcdpue_subscribe_button_text' );
	delete_option( 'wcdpue_opt_option' );

	delete_metadata( 'user', 0, 'tld_wcdpue_review_dismiss', '', true );
	delete_metadata( 'user', 0, 'wcdpue-wp-cron-notice-dismissed', '', true );
	delete_metadata( 'user', 0, 'wcdpue-cron-event-status-notice-dismissed', '', true );
	delete_metadata( 'post', 0, 'wcdpue_notify_optin', '', true );
	delete_metadata( 'post', 0, 'wcdpue_notify_optout', '', true );
	delete_metadata( 'post', 0, 'wcdpue_notify_optin_none_selected', '', true );
	delete_metadata( 'post', 0, 'wcdpue_what_changed', '', true );

	// delete postmeta as well

	global $wpdb;
	$wcdpue_the_schedule_table = $wpdb->prefix . 'wcdpue_scheduled';
	$wcdpue_the_log_table      = $wpdb->prefix . 'wcdpue_log';
	$wpdb->query( "DROP TABLE IF EXISTS $wcdpue_the_schedule_table" );
	$wpdb->query( "DROP TABLE IF EXISTS $wcdpue_the_log_table" );

}
