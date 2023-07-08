<?php

/**
 * The scheduled email methods
 *
 * @link  https://uriahsvictor.com
 * @since 2.0.0
 *
 * @package    Wcdpue
 * @subpackage Wcdpue/admin
 */

/**
 * The class responsible for sending scheduled email updates.
 *
 * Reponsible for grabbing and sending the emails from the database
 *
 * @package    Wcdpue
 * @subpackage Wcdpue/admin
 * @author     Uriahs Victor <me@uriahsvictor.com>
 */

class Wcdpue_Scheduled_Emails {


	/**
	 * The plugin's schedule table
	 *
	 * @access private
	 * @since  2.0.0
	 * @var    string The plugin's schedule table
	 */
	private $schedule_table = TLD_WCDPUE_SCHEDULE_TABLE;

	/**
	 * Retrieve the scheduled emails from the database
	 *
	 * @access private
	 * @since  2.0.0
	 */
	private function wcdpue_get_scheduled_emails() {

		$wcdpue_email_bursts_count = esc_attr( get_option( 'wcdpue_email_bursts_count' ) );
		global $wpdb;

		return $wpdb->get_results(
			"SELECT * FROM $this->schedule_table
            ORDER BY id
            ASC LIMIT $wcdpue_email_bursts_count"
		);

	}

	/**
	 * Retrieve the scheduled emails from the database
	 *
	 * @access private
	 * @since  2.0.0
	 */
	public function wcdpue_send_scheduled_emails() {

		global $wpdb;
		$rows = $this->wcdpue_get_scheduled_emails();

		foreach ( $rows as $row ) {

			$row_details = array(

				'product_id'       => $row->product_id,
				'product_parent'   => $row->product_parent,
				'order_id'         => $row->order_id,
				'order_key'        => $row->order_key,
				'user_email'       => $row->user_email,
				'is_variable'      => $row->is_variable,
				'downloads_markup' => $row->downloads_markup,
				'download_names'   => $row->download_names,

			);

			Wcdpue_Customer_Email::wcdpue_send_email( $row->user_email, $row_details );

			//delete the current row in loop after mail sent, also delete any duplicate row
			$wpdb->delete(
				$this->schedule_table,
				array(
					'product_id'     => $row->product_id,
					'product_parent' => $row->product_parent,
					'order_id'       => $row->order_id,
					'order_key'      => $row->order_key,
					'user_email'     => $row->user_email,
				)
			);

			sleep( 5 ); //short breath, no rush.
		}

	}
}
