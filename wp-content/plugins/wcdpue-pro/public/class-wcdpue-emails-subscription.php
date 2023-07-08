<?php

/**
 * Unsubscribe or resubscribe to notification emails.
 *
 * @link  https://uriahsvictor.com
 * @since 2.0.6
 *
 * @package    Wcdpue
 * @subpackage Wcdpue/public
 */

/**
 *
 *
 * Allows users to unsubscribe or resubscribe to future emails
 *
 * @package    Wcdpue
 * @subpackage Wcdpue/public
 * @author     Uriahs Victor <me@uriahsvictor.com>
 */
class Wcdpue_Emails_Subscription {


	// TODO make the subscribing and unsubscribing per product
	// TODO move to admin folder
	// https://matrixwebdesigners.com/woocommerce/adding-version-number-woocommerce-downloads-table-using-custom-fields/

	/**
	 * Change the user subscription status from subscribed to unsubscribed
	 *
	 *
	 * @access public
	 * @since  2.0.6
	 */
	public static function wcdpue_change_user_email_subscription_status() {

		if ( ! is_user_logged_in() ) {
			self::wcdpue_logged_out_unsubscribe_attempt();
			exit();
		}

		if ( ! wp_verify_nonce( $_REQUEST['nonce'], 'wcdpue_unsubscribe_nonce' ) ) {
			exit( 'WCDPUE: Failed to verify nonce.' );
		}

		$logged_in_user_id = (int) get_current_user_id();

		$subscription_status = get_user_meta( $logged_in_user_id, 'wcdpue_email_subscription_status', true );

		if ( empty( $subscription_status ) ) {
			update_user_meta( $logged_in_user_id, 'wcdpue_email_subscription_status', 'unsubscribed' );
		} else {
			delete_user_meta( $logged_in_user_id, 'wcdpue_email_subscription_status' );
		}

		// Redirect back to downloads page
		wp_redirect( wc_get_account_endpoint_url( 'downloads' ) );
		exit();

	}

	/**
	 * Redirect user to login page if they're logged out
	 *
	 * @access public
	 * @since  2.0.6
	 */
	public static function wcdpue_logged_out_unsubscribe_attempt() {
		$site_url           = site_url( 'wp-login.php' );
		$downloads_endpoint = wc_get_account_endpoint_url( 'downloads' );
		$redirect           = $site_url . '?redirect_to=' . $downloads_endpoint;
		wp_redirect( $redirect );
		exit();
	}

	/**
	 * Filter a passed array of objects.
	 *
	 * Returns an array of objects excluding users that have unsubscribed from emails.
	 *
	 * @access public
	 * @since  2.0.6
	 * @param array $rows The array of objects to perform the filtering on.
	 * @return mixed
	 *
	 */
	public static function wcdpue_filter_unsubscribed_users( $rows ) {

		if ( empty( $rows ) ) {
			return array();
		}

		foreach ( $rows as $key => $row ) {
			$user_id = $row->user_id;
			// TODO also add check for if user unsubscribed at checkout
			$user_meta = get_user_meta( $user_id, 'wcdpue_email_subscription_status', true );

			if ( $user_meta === 'unsubscribed' ) {
				unset( $rows[ $key ] );
			}
		}

		return $rows;

	}

}
