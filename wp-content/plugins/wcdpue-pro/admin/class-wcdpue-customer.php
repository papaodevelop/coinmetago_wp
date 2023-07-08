<?php

/**
 * The WCDPUE customer methods.
 *
 * @link  https://uriahsvictor.com
 * @since 2.0.0
 *
 * @package    Wcdpue
 * @subpackage Wcdpue/admin
 */

/**
 * The class responsible for building and fetching WooCommerce customer details.
 *
 * Reponsible for getting customer details
 *
 * @package    Wcdpue
 * @subpackage Wcdpue/admin
 * @author     Uriahs Victor <me@uriahsvictor.com>
 */

class Wcdpue_Customer {


	/**
	 * The WooCommerce download permissions table name.
	 *
	 * @access private
	 * @since  2.0.0
	 * @var    string The WooCommerce product download permissions table
	 */
	private $permissions_table = TLD_WC_DOWNLOAD_PERMISSIONS_TABLE;

	/**
	 * The plugin's schedule table.
	 *
	 * @access private
	 * @since  2.0.0
	 * @var    string The plugin's schedule table
	 */
	private $schedule_table = TLD_WCDPUE_SCHEDULE_TABLE;

	/**
	 * The rows from the DB for the download ids which was selected in the metabox.
	 *
	 * @access private
	 * @since  2.0.0
	 * @var    array The rows of results from the DB
	 */
	private $variable_product_download_rows_results = array();

	/**
	 * The rows from the DB for the download ids which was selected in the metabox.
	 *
	 * @access private
	 * @since  2.0.0
	 * @var    array The rows of results from the DB
	 */
	private $simple_product_download_rows_results = array();

	/**
	 * Set the updated downloadable product rows.
	 *
	 * Grabs and sets the rows from the DB for the passed $download_id which was selected in the metabox.
	 *
	 * @access private
	 * @param  int $download_id the product download id selected in metabox.
	 * @since  2.0.0
	 */
	protected function set_active_variable_product_download_rows( $download_id ) {
		global $wpdb;
		$rows = array();

		if ( self::wcdpue_allow_guest_customer_notification_emails() === true ) {

			$rows = $wpdb->get_results(
				"SELECT DISTINCT download_id, product_id, order_id, order_key, user_email, user_id
       FROM $this->permissions_table
       WHERE ( download_id = '$download_id' )
       AND ( access_expires > NOW() OR access_expires IS NULL )
       ORDER BY permission_id DESC
       "
			);

		} else {

			$rows = $wpdb->get_results(
				"SELECT DISTINCT download_id, product_id, order_id, order_key, user_email, user_id
       FROM $this->permissions_table
       WHERE ( download_id = '$download_id' )
       AND ( access_expires > NOW() OR access_expires IS NULL )
  	    AND ( user_id <> 0 )
       ORDER BY permission_id DESC
       "
			);

		}

		// foreach( $rows as $key => $row ){
		//     $user_id = $row->user_id;
		//     $user_meta = get_user_meta( $user_id, 'wcdpue_email_subscription_status', true );

		//     if( $user_meta === 'unsubscribed' ){
		//         unset($rows[$key]);
		//     }

		// }

		$rows = Wcdpue_Emails_Subscription::wcdpue_filter_unsubscribed_users( $rows );

		$this->variable_product_download_rows_results = $rows;
	}

	/**
	 * Set the updated downloadable product rows.
	 *
	 * Grabs and sets the rows from the DB for the passed $download_id which was selected in the metabox.
	 *
	 * @access private
	 * @param  int $id the product id.
	 * @since  2.0.0
	 */
	protected function set_active_simple_product_download_rows( $id ) {
		global $wpdb;
		$rows = array();

		if ( self::wcdpue_allow_guest_customer_notification_emails() === true ) {

			$rows = $wpdb->get_results(
				"SELECT DISTINCT product_id, order_id, order_key, user_email, user_id
          FROM $this->permissions_table
          WHERE ( product_id = $id )
          AND (access_expires > NOW() OR access_expires IS NULL )
          ORDER BY permission_id DESC
          "
			);

		} else {

			$rows = $wpdb->get_results(
				"SELECT DISTINCT product_id, order_id, order_key, user_email, user_id
          FROM $this->permissions_table
          WHERE ( product_id = $id )
          AND (access_expires > NOW() OR access_expires IS NULL )
  		  AND ( user_id <> 0 )
          ORDER BY permission_id DESC
          "
			);

		}

		// foreach( $rows as $key => $row ){
		//     $user_id = $row->user_id;
		//     $user_meta = get_user_meta( $user_id, 'wcdpue_email_subscription_status', true );

		//     if( $user_meta === 'unsubscribed' ){
		//         unset($rows[$key]);
		//     }

		// }

		$rows = Wcdpue_Emails_Subscription::wcdpue_filter_unsubscribed_users( $rows );

		// error_log(print_r($rows,true));
		$this->simple_product_download_rows_results = $rows;
	}

	/**
	 * Get the updated downloadable product row from DB.
	 *
	 * Grabs the rows from the DB for the passed $download_id which was selected in the metabox.
	 *
	 * @access private
	 * @since  2.0.0
	 */
	private function get_active_variable_product_download_rows() {
		return $this->variable_product_download_rows_results;
	}

	/**
	 * Get the updated downloadable product row from DB.
	 *
	 * Grabs the rows from the DB for the passed $download_id which was selected in the metabox.
	 *
	 * @access private
	 * @since  2.0.0
	 */
	private function get_active_simple_product_download_rows() {
		return $this->simple_product_download_rows_results;
	}

	/**
	 * Inserts customer simple download details into DB.
	 *
	 * Inserts details into scheduling table for simple product downloads
	 *
	 * @access protected
	 * @param  int   $id                     The product id.
	 * @param  array $selected_downloads_ids The product download ids selected in metabox.
	 * @param  bool  $now                    Whether to send the email immediately.
	 * @since  2.0.0
	 */
	protected function wcdpue_insert_simple_download_order_details( $id, $selected_downloads_ids, $now = false ) {

		// $downloads = array();

		$wcdpue_using_downloads_magictag = get_option( 'wcdpue_using_downloads_magictag' );

		$wcdpue_processed_emails = array();

		$this->set_active_simple_product_download_rows( $id );

		$active_download_purchases = $this->get_active_simple_product_download_rows();

		if ( empty( $active_download_purchases ) ) {
			return;
		}

		foreach ( $active_download_purchases as $active_download_purchase ) {

			$downloads = array();

			$customer_email = $active_download_purchase->user_email;
			$order_id       = $active_download_purchase->order_id;

			// If user has opted out for receiving email updates for the order in loop, don't send email.
			// TODO move this to set_active_simple_product_download_rows()
			if ( $this->wcdpue_customer_opted_out( $order_id, $id ) ) {
				$wcdpue_processed_emails[] = $customer_email;
				continue;
			}

			// Prevent the plugin from sending the same email to customers that may have multiple active purchases
			if ( in_array( $customer_email, $wcdpue_processed_emails ) ) {
				continue;
			}

			if ( ! empty( $wcdpue_using_downloads_magictag ) ) {

				$customer_details = get_user_by( 'email', $customer_email );
				$customer_id      = ! empty( $customer_details ) ? $customer_details->ID : '';

				// Logged in customer purchase
				if ( ! empty( $customer_id ) ) {
					$downloads = $this->build_customer_download_links( $selected_downloads_ids, $customer_id );
				}

				// Guest purchase
				if ( self::wcdpue_allow_guest_customer_notification_emails() === true && empty( $customer_id ) ) {
					$downloads = $this->build_guest_download_links( $selected_downloads_ids, $customer_email );
				}

				// If the option for allowing downloads in emails is checked
				// But the return is empty...skip sending for that user
				if ( empty( $downloads['downloads_markup'] ) ) {

					$wcdpue_processed_emails[] = $customer_email;

					// TODO Delete this debugging step

					// $blank_download_users = get_option('wcdpue_blank_download_users');
					// if( empty($blank_download_users) ){
					//     $blank_download_users = array();
					// }

					// $array = array(
					//     'product_id' => $active_download_purchase->product_id,
					//     'customer_email' => $customer_email,
					//     'user_email' => $active_download_purchase->user_email,
					//     'order_id' => $active_download_purchase->order_id,
					// );
					// $blank_download_users[] = $array;

					// Logger::create_log(0, $blank_download_users, '', 'log_blank_downloads');
					// update_option('wcdpue_blank_download_users', $blank_download_users);

					continue;
				}
			}

				$row_details = array(
					'product_id'       => $active_download_purchase->product_id,
					'product_parent'   => '',
					'order_id'         => $active_download_purchase->order_id,
					'order_key'        => $active_download_purchase->order_key,
					'user_email'       => $customer_email,
					'is_variable'      => '',
					'downloads_markup' => ! empty( $downloads ) ? $downloads['downloads_markup'] : '',
					'download_names'   => ! empty( $downloads ) ? $downloads['download_names'] : '',

				);

				// If immediately option is checked send the email now.
				if ( $now === true ) {

					$count       = (int) get_transient( 'wcdpue_immediately_sent_email_count' );
					$sent_status = Wcdpue_Customer_Email::wcdpue_send_email( $customer_email, $row_details );

					if ( $sent_status === true ) {
						set_transient( 'wcdpue_immediately_sent_email_count', $count + 1, 2 );
						$sent = get_transient( 'wcdpue_immediately_sent_email_count' );
						setcookie( 'wcdpue-send-count', $sent );
					}
				} else {

					(int) $count      = get_transient( 'wcdpue_simple_product_scheduled_email_count' );
					$scheduled_status = $this->wcdpue_insert_customer_row( $id, $row_details );

					if ( $scheduled_status === true ) {
						set_transient( 'wcdpue_simple_product_scheduled_email_count', $count + 1, 2 );
						$scheduled = get_transient( 'wcdpue_simple_product_scheduled_email_count' );
						setcookie( 'wcdpue-scheduled-count', $scheduled );
					}
				}

				// unset the row details at the end of each iteration
				unset( $row_details );

				$wcdpue_processed_emails[] = $customer_email;
		}
			unset( $wcdpue_processed_emails );

	}

	/**
	 * Inserts customer variable download details into DB.
	 *
	 * Inserts details into scheduling table for variable product downloads
	 *
	 * @access protected
	 * @param  int   $id                     the product id.
	 * @param  array $selected_downloads_ids the product download ids selected in metabox.
	 * @since  2.0.0
	 */
	protected function wcdpue_insert_variable_download_order_details( $id, $selected_downloads_ids ) {

		// $downloads = array();

		$wcdpue_using_downloads_magictag = get_option( 'wcdpue_using_downloads_magictag' );

		$wcdpue_processed_emails = array();

		foreach ( $selected_downloads_ids as $current_id ) {

			$this->set_active_variable_product_download_rows( $current_id );

			$active_download_purchases = $this->get_active_variable_product_download_rows();

			if ( empty( $active_download_purchases ) ) {
				continue;
			}

			foreach ( $active_download_purchases as $active_download_purchase ) {

				$downloads = array();

				$order_id = $active_download_purchase->order_id;

				$customer_email = $active_download_purchase->user_email;

				// If user has opted out of receiving email updates for the order in loop, don't send email.
				 // TODO move this to set_active_variable_product_download_rows()
				if ( $this->wcdpue_customer_opted_out( $order_id, $id ) ) {
					$wcdpue_processed_emails[] = $customer_email;
					continue;
				}

				 // Prevent the plugin from sending the same email to customers that may have multiple active purchases
				if ( in_array( $customer_email, $wcdpue_processed_emails ) ) {
					continue;
				}

				if ( ! empty( $wcdpue_using_downloads_magictag ) ) {

					$customer_details = get_user_by( 'email', $customer_email );
					$customer_id      = ! empty( $customer_details ) ? $customer_details->ID : '';

					 // Logged in customer purchase
					if ( ! empty( $customer_id ) ) {
						 $downloads = $this->build_customer_download_links( $selected_downloads_ids, $customer_id );
					}

					// Guest purchase
					if ( self::wcdpue_allow_guest_customer_notification_emails() === true && empty( $customer_id ) ) {
						 $downloads = $this->build_guest_download_links( $selected_downloads_ids, $customer_email );
					}

					// If the option for allowing downloads in emails is checked
					// But the return is empty...skip sending for that user
					if ( empty( $downloads['downloads_markup'] ) ) {
						$wcdpue_processed_emails[] = $customer_email;
						continue;
					}
				}

				$row_details = array(
					'product_id'       => $active_download_purchase->product_id,
					'product_parent'   => $id,
					'order_id'         => $active_download_purchase->order_id,
					'order_key'        => $active_download_purchase->order_key,
					'user_email'       => $customer_email,
					'is_variable'      => 1,
					'downloads_markup' => ! empty( $downloads ) ? $downloads['downloads_markup'] : '',
					'download_names'   => ! empty( $downloads ) ? $downloads['download_names'] : '',
				);

				(int) $count      = get_transient( 'wcdpue_variable_product_scheduled_email_count' );
				$scheduled_status = $this->wcdpue_insert_customer_row( $id, $row_details );

				if ( $scheduled_status === true ) {
					set_transient( 'wcdpue_variable_product_scheduled_email_count', $count + 1, 2 );
					$scheduled = get_transient( 'wcdpue_variable_product_scheduled_email_count' );
					setcookie( 'wcdpue-scheduled-count', $scheduled );
				}
				// unset the row details at the end of each iteration
				unset( $row_details );

				$wcdpue_processed_emails[] = $customer_email;
			}
		}
		unset( $wcdpue_processed_emails );

	}

	/**
	 * Build download links for registered customers.
	 *
	 * Creates the download markup and download names to save to the DB
	 *
	 * @access private
	 * @param  array $selected_downloads_ids the product download ids selected in metabox.
	 * @param  int   $customer_id            the customer ID.
	 * @since  2.0.0
	 */
	private function build_customer_download_links( $selected_downloads_ids, $customer_id ) {

		// empty download markup variable
		$downloads_markup = '';

		// empty download names variable
		$download_names = '';

		//get current user in loop available downloads
		$customer_downloads = wc_get_customer_available_downloads( $customer_id );

		foreach ( $selected_downloads_ids as $download_id ) {

			foreach ( $customer_downloads as $download => $data ) {
				//get the download link only for product names which were selected from metabox
				if ( $data['download_id'] === $download_id ) {
					$downloads_markup .= '<br/><br/><a href="' . $data['download_url'] . '">' . $data['download_name'] . '</a><br/><br/>';
					$download_names   .= $data['download_name'] . ' ';
				}
			}
		}

		$downloads = array(
			'downloads_markup' => $downloads_markup,
			'download_names'   => $download_names,
		);

		return $downloads;
	}

	/**
	 * Build download links for guests customers.
	 *
	 * Creates the download markup and download names to save to the DB
	 *
	 * @access private
	 * @param  array $selected_downloads_ids the product download ids selected in metabox.
	 * @param  int   $customer_email         the guest customer email.
	 * @since  2.0.0
	 */
	private function build_guest_download_links( $selected_downloads_ids, $customer_email ) {

		global $wpdb;

		// empty download markup variable
		$downloads_markup = '';

		// empty download names variable
		$download_names = '';

		$guest_downloads = $wpdb->get_results(
			"SELECT DISTINCT download_id, product_id, order_id, order_key, user_email
        FROM $this->permissions_table
        WHERE ( user_email = '$customer_email' )
        -- AND ( user_id = 0) 
        AND ( access_expires > NOW() OR access_expires IS NULL )
        "
		);

		// AND ( user_id = 0) | Setting this would cause users who previously had an account but deleted to not have any downloads markup info

		$wcdpue_product = new Wcdpue_Product;
		$download_ids   = array();

		foreach ( $selected_downloads_ids as $download_id ) {

			foreach ( $guest_downloads as $guest_download ) {

				$product_object = $wcdpue_product->wcdpue_wc_product( $guest_download->product_id );

				// If by any chance an error is returned.
				if ( ! is_object( $product_object ) ) {

					// TODO Delete this debugging step

					// $fault_emails = get_option('wcdpue_fault_emails');
					// if( empty($fault_emails) ){
					//     $fault_emails = array();
					// }

					// $array = array(
					//     'product_id' => $guest_download->product_id,
					//     'customer_email' => $customer_email,
					//     'user_email' => $guest_download->user_email,
					//     'order_id' => $guest_download->order_id,
					// );
					// $fault_emails[] = $array;

					// Logger::create_log(0, $fault_emails);
					// update_option('wcdpue_fault_emails', $fault_emails);
					// ********

					// If this is not a an object continue to next interation so we don't throw an error.
					continue;
				}

				$product_downloads = $product_object->get_downloads();

				if ( $guest_download->download_id === $download_id && $customer_email === $guest_download->user_email ) {

					// prevent duplicates
					if ( in_array( $guest_download->download_id, $download_ids ) ) {
						 continue;
					}

					// TODO find built-in function to create download link instead of concatenating
					$downloads_markup .= '<br/><br/><a href="' . site_url( '/?download_file=' . $guest_download->product_id . '&order=' . $guest_download->order_key . '&email=' . $customer_email . '&key=' . $guest_download->download_id ) . '">' . $product_downloads[ $guest_download->download_id ]['name'] . '</a><br/><br/>';
					$download_names   .= $product_downloads[ $guest_download->download_id ]['name'] . ' ';

					 $download_ids[] = $guest_download->download_id;
				}
			}
		}

		$downloads = array(
			'downloads_markup' => $downloads_markup,
			'download_names'   => $download_names,
		);

		$wpdb->flush();

		return $downloads;
	}

	/**
	 * Insert a row of customer downloadable purchase details into the DB.
	 *
	 * Adds a row to the scheduled table DB for later use in sending process.
	 *
	 * @access private
	 * @param  int   $id          the product id.
	 * @param  array $row_details the data to insert.
	 * @since  2.0.0
	 */
	private function wcdpue_insert_customer_row( $id, $row_details = array() ) {

		global $wpdb;

		$inserted = $wpdb->insert(
			$this->schedule_table,
			array(

				'product_id'       => $row_details['product_id'],
				'product_parent'   => $row_details['product_parent'],
				'order_id'         => $row_details['order_id'],
				'order_key'        => $row_details['order_key'],
				'user_email'       => $row_details['user_email'],
				'is_variable'      => $row_details['is_variable'],
				'downloads_markup' => $row_details['downloads_markup'],
				'download_names'   => $row_details['download_names'],

			)
		);

		if ( ! empty( $inserted ) ) {
			return true;
		} else {
			return false;
		}

	}

	/**
	 * Determine if customer opted out of emails.
	 *
	 * Determine if the customer has opted out of email notifications for particular order with id $order_id.
	 *
	 * @access private
	 * @param  int $order_id   the order id.
	 * @param  int $product_id the product id.
	 * @since  2.0.0
	 */
	private function wcdpue_customer_opted_out( $order_id, $product_id ) {

		$wcdpue_opted_out_product_ids = get_post_meta( $order_id, 'wcdpue_notify_optout', true );
		$wcdpue_opted_in_product_ids  = get_post_meta( $order_id, 'wcdpue_notify_optin', true );
		$wcdpue_optin_none_selected   = get_post_meta( $order_id, 'wcdpue_notify_optin_none_selected', true );

		// If no opt option exists for the order, then proceed with email operation.
		if ( empty( $wcdpue_opted_out_product_ids ) && empty( $wcdpue_opted_in_product_ids ) && empty( $wcdpue_optin_none_selected ) ) {
			return false;
		}

		// If this product is opted out for this order
		if ( in_array( $product_id, $wcdpue_opted_out_product_ids ) ) {
			return true;
		} elseif ( in_array( $product_id, $wcdpue_opted_in_product_ids ) === false && empty( $wcdpue_optin_none_selected ) ) {
			return true; //returning true because if the customer didn't opt-in, then they most likely don't want emails
		} elseif ( ! empty( $wcdpue_optin_none_selected ) ) { // if $wcdpue_optin_none_selected is set to true it means user selected no downloadables but the optin option is on
			return true;
		} else {
			return false;
		}

	}

	/**
	 * Check option for guest customer notification emails
	 *
	 * Determine whether or not to allow guest customer email notifications based on setting set by admin
	 *
	 * @access public
	 * @since  2.0.3
	 */
	public static function wcdpue_allow_guest_customer_notification_emails() {
			// Prior to that guest notification emails were happening by default
		$wcdpue_enable_notification_for_guest_purchases = get_option( 'wcdpue_enable_notification_for_guest_purchases' );

		$wcdpue_first_install_version = get_option( 'wcdpue_first_install_version' );

		// If option is checked in settings, allow sending of product update emails for guest customers
		if ( ! empty( $wcdpue_enable_notification_for_guest_purchases ) ) {
			return true;
		}

		// User may have uploaded plugin update from a version < v2.0.3 and then unchecked the option to allow
		// Guest customers update emails, so the option would exist in the database as an empty option (which means guest customers shouldn't receive update emails)
		// However $wcdpue_first_install_version would still be false. So we're checking this here
		if ( $wcdpue_first_install_version === false && $wcdpue_enable_notification_for_guest_purchases !== false ) {
			return false;
		}

		// If the option doesn't exist, allow guest notification emails.
		// We're checking $wcdpue_first_install_version is false because we introduced this new option in v2.0.3
		// So prior to that it wouldn't exist. The option would only exist if the user deactivated and reactivated it.
		// Uploading new plugins over old ones doesn't fire the activation hook, so the option wouldn't exist for those users.
		if ( $wcdpue_first_install_version === false ) {
			return true;
		}

		return false;
	}

}
