<?php

/**
 * The WCDPUE customer email methods.
 *
 * @link  https://uriahsvictor.com
 * @since 2.0.0
 *
 * @package    Wcdpue
 * @subpackage Wcdpue/admin
 */

/**
 * The class responsible for building and fetching WooCommerce customer email details.
 *
 * Reponsible for creating customer emails
 *
 * @package    Wcdpue
 * @subpackage Wcdpue/admin
 * @author     Uriahs Victor <me@uriahsvictor.com>
 */

class Wcdpue_Customer_Email extends Wcdpue_Customer {


	/**
	 * Get the WooCommerce account URL.
	 *
	 * @access private
	 * @param  $trim whether or not to trim the URL protocol.
	 * @since  2.0.0
	 *
	 * @return string the account url.
	 */
	private static function get_wc_account_url( $trim = false ) {

		$url = esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) );

		if ( $trim ) {
			$url_parse = wp_parse_url( $url );
			$url       = $url_parse['host'] . $url_parse['path'];
		}

		return $url;

	}

	/**
	 * Gets the email subject from the DB.
	 *
	 * @access private
	 * @since  2.0.0
	 *
	 * @return string the email subject.
	 */
	private static function get_email_subject() {
		$subject = get_option( 'wcdpue_email_subject' );
		return ! empty( $subject ) ? $subject : __( 'A product you bought has been updated!', 'wcdpue' );
	}

	/**
	 * Gets the email body from the DB.
	 *
	 * @access private
	 * @since  2.0.0
	 *
	 * @return string the email body.
	 */
	private static function get_email_body() {
		$body = get_option( 'wcdpue_settings_email_content' );
		return ! empty( $body ) ? $body : __( 'There is a new update for one of your digital products! Log into your account to download it: ', 'wcdpue' ) . self::get_wc_account_url();
	}

	/**
	 * Get the product name.
	 *
	 * @access private
	 * @param  int $id the product id.
	 * @since  2.0.0
	 *
	 * @return string the product name.
	 */
	private static function get_product_name( $id ) {
		return get_the_title( $id );
	}

	/**
	 * Get the product image.
	 *
	 * @access private
	 * @param  int $id the product id.
	 * @since  2.0.0
	 *
	 * @return string the product image.
	 */
	private static function get_product_image( $id ) {
		return    wp_get_attachment_image( get_post_thumbnail_id( $id ), 'thumbnail', '', array( 'style' => 'font-family: Georgia; color: #697c52; font-style: italic; font-size: 20px;' ) );

	}

	/**
	 * Get the product url.
	 *
	 * @access private
	 * @param  int  $id   the product id.
	 * @param  bool $trim whether to trim the protocol from the url.
	 * @since  2.0.0
	 *
	 * @return string the product url.
	 */
	private static function get_product_url( $id, $trim = false ) {

		$url = get_permalink( $id );

		if ( $trim ) {
			$url_parse = wp_parse_url( $url );
			$url       = $url_parse['host'] . $url_parse['path'];
		}

		return $url;
	}

	/**
	 * Get the customer first name.
	 *
	 * @access private
	 * @param  int $order_id the order id.
	 * @since  2.0.0
	 *
	 * @return string the customer first name.
	 */
	private static function get_customer_fname( $order_id ) {
		return get_post_meta( $order_id, '_billing_first_name', true );
	}

	/**
	 * Get the customer last name.
	 *
	 * @access private
	 * @param  int $order_id the order id.
	 * @since  2.0.0
	 *
	 * @return string the customer last name.
	 */
	private static function get_customer_lname( $order_id ) {
		return get_post_meta( $order_id, '_billing_last_name', true );
	}

	/**
	 * Get the customer full name.
	 *
	 * @access private
	 * @param  int $order_id the order id.
	 * @since  2.0.0
	 *
	 * @return string the customer full name.
	 */
	private static function get_customer_full_name( $order_id ) {
		return self::get_customer_fname( $order_id ) . ' ' . self::get_customer_lname( $order_id );
	}

	/**
	 * Get what changed text for the downloadable product.
	 *
	 * @access private
	 * @param  int $id the post id.
	 * @since  2.0.8
	 *
	 * @return string the customer full name.
	 */
	private static function get_what_changed( $id ) {
		$what_changed = get_post_meta( $id, 'wcdpue_what_changed', true );

		if ( ! empty( $what_changed ) ) {
			return $what_changed;
		}
	}

	private static function create_product_display_table( $content ) {

		// We need to first extract the magic tags from the content.
		$status = preg_match_all( '/{product_table=([^a-z_{}=][0-9]{0,9}.+)}/', $content, $matches, PREG_SET_ORDER );

		if ( empty( $status ) ) {
			return $content;
		}

		$replaced = '';

		foreach ( $matches as $matched_tag ) {

			$product_ids_magic_tag = $matched_tag[0];
			$product_ids           = $matched_tag[1];

			// Then we split it to get single IDs
			$extracted_ids = explode( ',', $product_ids );

			$product_image = '';

			//TODO: Try creating another version of the magic tag which would not output the table CSS but instead let a user be able to center using the editor. The code below already has a good version, just try to create an alternative maybe using list items like before.

			$count             = 0;
			$number_of_columns = apply_filters( 'wcdpue_email_product_display_num_columns', 4 );

			foreach ( $extracted_ids as $key => $id ) {

				if ( $count === 0 ) {
					$row_start = '<tr>';
					$row_end   = '';
				} else {
					$row_start = '';
				}

				// Get the Woocommerce product
				$product = wc_get_product( $id );
				$count   = $count + 1;

				// Format 1

				$product_image .= $row_start . '<td align="center" style="min-height: 300px !important;">' . wp_get_attachment_image( get_post_thumbnail_id( $id ), 'thumbnail', '', array( 'style' => 'font-family: Georgia; color: #697c52; font-style: italic; font-size: 20px;' ) ) . '<br><a href="' . get_permalink( $id ) . '">' . $product->get_title() . '<br>' . $product->get_price_html() . '</a></td>' . $row_end;

				if ( $count === $number_of_columns ) {
					$row_end = '</tr>';
					$count   = 0;
				} else {
					$row_end = '';
				}

				// TODO Format 2

				// $tld_wcdpue_magic_product_img .= '<li style="text-align:center;float:left;margin:0 auto;list-style-type:none;width:32%;min-height:230px;word-wrap:break-word;">'. wp_get_attachment_image( get_post_thumbnail_id( $id ), "thumbnail", "", array( "style" => "font-family: Georgia; color: #697c52; font-style: italic; font-size: 20px;" ) ) . '<br>' . $tld_wcdpue_extract_magic_product->get_title() . '<br>' .$tld_wcdpue_extract_magic_product->get_price_html().'</li>';

			}

			// $wcdpue_email_format = esc_attr( get_option( 'wcdpue_wc_default_styles' ) );

			// TODO Add spacing between product images based on email format
			// if ( ! empty( $wcdpue_email_format ) ) {
			// 	$product_image = '<table width="600" border="0" cellspacing="0" cellpadding="0"><tbody>' . $product_image . '</tbody></table>';
			// } else {
			// 	$product_image = '<div>' . $product_image . '</div>';
			// }

			$product_image = '<table width="600" border="0" cellspacing="0" cellpadding="0"><tbody>' . $product_image . '</tbody></table>';

			// If this is the first iteration use the passed in content as the haystack.
			// But if its a subsequent iteration, use the previously replaced content as the haystack.
			if ( empty( $replaced ) ) {
				$replaced = str_replace( $product_ids_magic_tag, $product_image, $content );
			} else {
				$replaced = str_replace( $product_ids_magic_tag, $product_image, $replaced );
			}
		}

		return $replaced;
	}

	/**
	 * Replace plugin magic tags with their respective data.
	 *
	 * @access private
	 * @param  array $details   The product details
	 * @param  string $content  The product content
	 * @since  2.0.0
	 * @since  2.0.9 Refactored by removing unnecessary params.
	 *
	 * @return string email content with magic tags replaced with respective data.
	 */
	private static function wcdpue_replace_magictags( $details, $content ) {

		/**
		 * If this is a variable product we need to get the parent product ID since this is the ID used to save the post meta.
		 */
		$id               = ! empty( $details['is_variable'] ) ? $details['product_parent'] : $details['product_id'];
		$order_id         = $details['order_id'];
		$download_names   = $details['download_names'];
		$downloads_markup = $details['downloads_markup'];

		$replacements = array(
			'{account_url}'      => self::get_wc_account_url(),
			'{account_url_trim}' => self::get_wc_account_url( true ),
			'{product_name}'     => self::get_product_name( $id ),
			'{product_url}'      => self::get_product_url( $id ),
			'{product_url_trim}' => self::get_product_url( $id, true ),
			'{first_name}'       => self::get_customer_fname( $order_id ),
			'{last_name}'        => self::get_customer_lname( $order_id ),
			'{full_name}'        => self::get_customer_full_name( $order_id ),
			'{download_name}'    => $download_names,
			'{download_url}'     => $downloads_markup,
			'{product_img}'      => self::get_product_image( $id ),
			'{what_changed}'     => self::get_what_changed( $id ),
		);

		$replaced = str_replace( array_keys( $replacements ), array_values( $replacements ), $content );

		$replaced = self::create_product_display_table( $replaced );

		return $replaced;
	}

	/**
	 * Send the email to the customer.
	 *
	 * @access public
	 * @param  string $customer_email the customer email address.
	 * @param  array  $details        the customer purchase details.
	 * @since  2.0.0
	 */
	public static function wcdpue_send_email( $customer_email, $details = array() ) {

		global $woocommerce;

		$subject = self::wcdpue_replace_magictags( $details, self::get_email_subject() );
		$body    = self::wcdpue_replace_magictags( $details, self::get_email_body() );

		$log             = TLD_WCDPUE_LOG_TABLE;
		$log_date_format = get_option( 'wcdpue_log_date_format' );

		// Format blog current time to format user chose
		$current_time = current_time( $log_date_format );

		$details['current_time'] = $current_time;

		// Check whether to use default WooCommerce styles or bundled templates
		$wc_email_wrapper = esc_attr( get_option( 'wcdpue_wc_default_styles' ) );

		// If WooCommerce email styles are not being used
		if ( empty( $wc_email_wrapper ) ) {

			if ( wp_mail( $customer_email, $subject, $body, 'Content-Type: text/html; charset=UTF-8' ) ) {
				self::wcdpue_insert_log( $log, true, $details );
				return true;
			} else {
				self::wcdpue_insert_log( $log, false, $details );
				return false;
			}
		} else {

			// Get woocommerce mailer from instance
			$mailer = $woocommerce->mailer();

			// Wrap message using woocommerce html email template
			$wrapped_message = $mailer->wrap_message( $subject, $body );

			// Create new WC_Email instance
			$wc_email = new WC_Email;

			// Style the wrapped message with woocommerce inline styles
			$body = $wc_email->style_inline( $wrapped_message );

			// Send the email using WordPress mail function

			if ( wp_mail( $customer_email, $subject, $body, 'Content-Type: text/html; charset=UTF-8' ) ) {
				self::wcdpue_insert_log( $log, true, $details );
				return true;
			} else {
				self::wcdpue_insert_log( $log, false, $details );
				return false;
			}
		}

	}

	/**
	 * Insert the email send log into the databse
	 *
	 * @access public
	 * @param  string $log     the log table.
	 * @param  string $success if sending was sucessful.
	 * @param  string $details the customer purchase details.
	 * @since  2.0.0
	 */
	private static function wcdpue_insert_log( $log, $success = false, $details ) {

		global $wpdb;

		if ( $success ) {
			$wpdb->insert(
				$log,
				array(

					'customer'     => self::get_customer_full_name( $details['order_id'] ),
					'email'        => $details['user_email'],
					'product_name' => self::get_product_name( $details['product_id'] ),
					'status'       => 'Sent',
					'time_stamp'   => $details['current_time'],

				)
			);
		} else {
			$wpdb->insert(
				$log,
				array(

					'customer'     => self::get_customer_full_name( $details['order_id'] ),
					'email'        => $details['user_email'],
					'product_name' => self::get_product_name( $details['product_id'] ),
					'status'       => 'Failed',
					'time_stamp'   => $details['current_time'],

				)
			);
		}

	}

	/**
	 * Creates the initial data needed for variable product emails.
	 *
	 * @access public
	 * @param  int   $id                     the product id.
	 * @param  array $selected_downloads_ids the product download ids selected in metabox.
	 * @since  2.0.0
	 * @since  2.0.7 Changed method name from wcdpue_create_variable_product_email to wcdpue_create_variable_products_email
	 */
	public function wcdpue_create_variable_products_email( $id, $selected_downloads_ids ) {
		$this->wcdpue_insert_variable_download_order_details( $id, $selected_downloads_ids );
	}

	/**
	 * Creates the initial data needed for simple product emails.
	 *
	 * @access public
	 * @param  int    $id                      the product id.
	 * @param  array  $selected_downloads_ids  the product download ids selected in metabox.
	 * @param  string $sending_option_selected the sending option selected in metabox, schedule(false) or immediate(true).
	 * @since  2.0.0
	 * @since  2.0.7 Changed method name from wcdpue_create_simple_product_email to wcdpue_create_simple_products_email
	 */
	public function wcdpue_create_simple_products_email( $id, $selected_downloads_ids, $sending_option_selected ) {

		if ( $sending_option_selected === 'schedule' ) {
			$this->wcdpue_insert_simple_download_order_details( $id, $selected_downloads_ids, false );
		} else {
			$this->wcdpue_insert_simple_download_order_details( $id, $selected_downloads_ids, true );
		}

	}


}
