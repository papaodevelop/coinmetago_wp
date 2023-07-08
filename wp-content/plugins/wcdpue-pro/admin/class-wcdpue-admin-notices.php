<?php

/**
 * The admin notices class.
 *
 * @link  https://uriahsvictor.com
 * @since 2.0.0
 *
 * @package    Wcdpue
 * @subpackage Wcdpue/admin
 */

/**
 * Creates various admin notices from the plugin.
 *
 * Outputs various admin notices to WP dashboard if conditions are met.
 *
 * @package    Wcdpue
 * @subpackage Wcdpue/admin
 * @author     Uriahs Victor <me@uriahsvictor.com>
 */
class Wcdpue_Admin_Notices {



	  /**
	   * Checks if WooCommerce is active.
	   *
	   * @access public
	   * @since  2.0.0
	   */
	public function wcdpue_wc_active_notice() {

		if ( ! class_exists( 'woocommerce' ) ) {
			?>

			  <div class="notice notice-error is-dismissible">
				<?php echo sprintf( __( '%1$s%2$sWCDPUE NOTICE:%3$s WooCommerce is not activated, please activate it to use WCDPUE.', 'wcdpue' ), '<p>', '<b>', '</b>', '</p>' ); ?>
			  </div>
			  <?php

		}

	}


	/**
	 * WordPress Cron is disabled notice.
	 *
	 * @access public
	 * @since  2.0.0
	 */
	public function wcdpue_wp_cron_notice() {

		if ( ! defined( 'DISABLE_WP_CRON' ) ) {
			return;
		}

		$user_id = get_current_user_id();

		if ( get_user_meta( $user_id, 'wcdpue-wp-cron-notice-dismissed' ) ) {
			return;
		}

		$url = $_SERVER['REQUEST_URI'];

		if ( strpos( $url, '?' ) !== false ) {
			$redirect = $url . '&wcdpue-wp-cron-notice-dismissed';
		} else {
			$redirect = $url . '?wcdpue-wp-cron-notice-dismissed';
		}

		if ( DISABLE_WP_CRON ) {

			?>
			  <div class="notice notice-error">
			<?php echo sprintf( __( '%1$s%2$sWCDPUE NOTICE:%3$s The WordPress Cron seems is disabled on your website. This can cause issues with sending out product update emails with WCDPUE.<br/> If sending of emails is not working, then see %4$shere for solutions.%5$s%6$s%7$s', 'wcdpue' ), '<p>', '<b>', '</b>', '<a href="https://uriahsvictor.com/fix-wp-cron/" target="_blank">', '</a>', '<a style="float: right;" href="' . $redirect . '">Dismiss</a>', '</p>' ); ?>

			  </div>
			<?php

		}

	}

	/**
	 * Dismiss WordPress Cron disabled notice.
	 *
	 * @access public
	 * @since  2.0.0
	 */
	public function wcdpue_dismiss_cron_disabled_notice() {

		$user_id = get_current_user_id();
		if ( isset( $_GET['wcdpue-wp-cron-notice-dismissed'] ) ) {
			add_user_meta( $user_id, 'wcdpue-wp-cron-notice-dismissed', 'true', true );
		}

	}

	/**
	 * Checks to see if the cron schedule is firing.
	 *
	 * @access public
	 * @since  2.0.0
	 */
	public function wcdpue_cron_event_status_notice() {

		$user_id = get_current_user_id();

		if ( get_user_meta( $user_id, 'wcdpue-cron-event-status-notice-dismissed' ) ) {
			return;
		}

		$wcdpue_set_schedule_option = get_option( 'wcdpue_schedule_setting_value' );

		if ( empty( $wcdpue_set_schedule_option ) ) {
			return;
		}

		$wcdpue_next_task_hit = wp_next_scheduled( 'wcdpue_email_send_burst' );
		$wcdpue_current_time  = time();

		$all_website_schedules = wp_get_schedules();

		// get the current schedule set in plugin settings
		$wcdpue_set_schedule = $all_website_schedules[ $wcdpue_set_schedule_option ];

		// get the interval in minutes
		$wcdpue_set_schedule = (int) $wcdpue_set_schedule['interval'] / 60;

		// if plugin not activated cron event will not be present
		if ( ! $wcdpue_next_task_hit ) {
			return;
		}

		$wcdpue_cron_elapsed_time = ( $wcdpue_current_time - $wcdpue_next_task_hit ) / 60;
		$wcdpue_cron_elapsed_time = absint( $wcdpue_cron_elapsed_time );

		// sent excess elapsed time to be the schedule interval
		$wcdpue_cron_event_excess_elapsed_time = apply_filters( 'wcdpue_cron_event_excess_elapsed_time', $wcdpue_set_schedule );

		$url = $_SERVER['REQUEST_URI'];

		if ( strpos( $url, '?' ) !== false ) {
			$redirect = $url . '&wcdpue-cron-event-status-notice-dismissed';
		} else {
			$redirect = $url . '?wcdpue-cron-event-status-notice-dismissed';
		}

		// FIXME This fires on fresh installs of the plugin
		if ( $wcdpue_cron_elapsed_time >= $wcdpue_cron_event_excess_elapsed_time ) {

			?>
			<div class="notice notice-error">
			<?php echo sprintf( __( '%1$s%2$sWCDPUE NOTICE:%3$s There might be an issue preventing WCDPUE from sending emails. If product update emails are not sending(check email log to find out), <br/>then see %4$shere for solutions.%5$s%6$s%7$s', 'wcdpue' ), '<p>', '<b>', '</b>', '<a href="https://uriahsvictor.com/fix-wp-cron/" target="_blank">', '</a>', '<a style="float: right;" href="' . $redirect . '">Dismiss</a>', '</p>' ); ?>

			</div>
			<?php

		}

	}

	/**
	 * Dismiss wcdpue_cron not firing notice.
	 *
	 * @access public
	 * @since  2.0.0
	 */
	public function wcdpue_dismiss_wcdpue_event_not_firing_notice() {

		$user_id = get_current_user_id();
		if ( isset( $_GET['wcdpue-cron-event-status-notice-dismissed'] ) ) {
			add_user_meta( $user_id, 'wcdpue-cron-event-status-notice-dismissed', 'true', true );
		}

	}

}
