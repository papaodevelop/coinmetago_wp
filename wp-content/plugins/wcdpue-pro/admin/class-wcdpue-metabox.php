<?php


/**
 * The contents of the plugin metabox.
 *
 * @link  https://uriahsvictor.com
 * @since 2.0.0
 *
 * @package    Wcdpue
 * @subpackage Wcdpue/admin
 */

/**
 * The metabox-specific functionality of the plugin.
 *
 * The necessary methods and HTML of the plugin product metabox
 *
 * @package    Wcdpue
 * @subpackage Wcdpue/admin
 * @author     Uriahs Victor <me@uriahsvictor.com>
 */
class Wcdpue_Metabox {


	/**
	 * The WCDPUE product class.
	 *
	 * @since  2.0.0
	 * @access private
	 * @var    object    $wcdpue_product_object    The WCDPUE product class with neccessary methods and properties.
	 */
	private $wcdpue_product_object;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 2.0.0
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version     The version of this plugin.
	 */
	public function __construct() {
		$this->wcdpue_product_object = new Wcdpue_Product();
	}

	/**
	 * Calculate individual variable product active customers.
	 *
	 * @access private
	 * @param  int $id The product id.
	 * @since  2.0.0
	 * @since  2.0.7 Changed method name from wcdpue_variable_product_customer_count_breakdown to wcdpue_variable_products_customer_count_breakdown
	 */
	private function wcdpue_variable_products_customer_count_breakdown( $id ) {

		$product_variation_ids = $this->wcdpue_product_object->wcdpue_get_product_children( $id );
		// rename id
		echo '<div id="wcdpue-variable-customer-count-breakdown" class="wcdpue-center-text"><p>';

		foreach ( $product_variation_ids as $product_variation_id ) {

			$is_downloadable = $this->wcdpue_product_object->wcdpue_wc_product( $product_variation_id )->is_downloadable();

			if ( $is_downloadable ) {

				echo '<small>' . get_the_title( $product_variation_id ) . ' has <span style="color: green; font-weight: bold;">';
				echo $this->wcdpue_product_object->wcdpue_count_customers_as( $product_variation_id, 'simple' );
				echo '</span> buyers <br/></small>';

			}
		}

		echo '</p></div>';

	}

	/**
	 * Output the simple product or simple subscription (WooCommerce Subscriptions) downloads.
	 *
	 * Creates input field for selecting downloads which were updated
	 *
	 * @access private
	 * @param  int $id The product id.
	 * @since  2.0.0
	 */
	private function wcdpue_output_simple_products_downloads( $id ) {

			echo '<div class="wcdpue-center-text"><select class="wcdpue-product-name-select wcdpue-center-text" name="wcdpue_download_ids[]" multiple="multiple">';
			//get array of download details for this product
			$wcdpue_product_downloads = $this->wcdpue_product_object->wcdpue_wc_product( $id )->get_downloads();
			//loop through array and get ID and name
		foreach ( $wcdpue_product_downloads as $key => $download ) {
			echo '<option value="' . $download['id'] . '">' . $download['name'] . '</option>';
		}

			echo '</select></div>';

	}

	/**
	 * Output the variable product downloads.
	 *
	 * Creates input field for selecting downloads which were updated
	 *
	 * @access private
	 * @param  int $id The product id.
	 * @since  2.0.0
	 * @since  2.0.7 Changed method name from wcdpue_output_variable_product_downloads to wcdpue_output_variable_products_downloads
	 */
	private function wcdpue_output_variable_products_downloads( $id ) {

		echo '<div class="wcdpue-center-text"><select class="wcdpue-product-name-select wcdpue-center-text" name="wcdpue_download_ids[]" multiple="multiple">';

		$product_variation_ids = $this->wcdpue_product_object->wcdpue_get_product_children( $id );

		foreach ( $product_variation_ids as $product_variation_id ) {
			$is_downloadable = $this->wcdpue_product_object->wcdpue_wc_product( $product_variation_id )->is_downloadable();
			$the_downloads   = $this->wcdpue_product_object->wcdpue_wc_product( $product_variation_id )->get_downloads();
			// check if this is a downloadable variation
			if ( $is_downloadable ) {
				//loop and get download name and id
				foreach ( $the_downloads as $object => $data ) {
					echo '<option value="' . $data['id'] . '">' . $data['name'] . '</option>';
				}
			}
		}

		echo '</select></div>';

	}


	/**
	 * Creates the metabox fields.
	 *
	 * @access public
	 * @since  2.0.0
	 */
	public function wcdpue_metabox_fields() {
		$id                               = get_the_ID();
		$customer_count                   = $this->wcdpue_product_object->wcdpue_count_unique_customers( $id );
		$is_simple_product                = $this->wcdpue_product_object->wcdpue_is_simple_product( $id );
		$is_variable_product              = $this->wcdpue_product_object->wcdpue_is_variable_product( $id );
		$is_simple_subscription_product   = $this->wcdpue_product_object->wcdpue_is_simple_subscription_product( $id );
		$is_variable_subscription_product = $this->wcdpue_product_object->wcdpue_is_variable_subscription_product( $id );
		?>

		<div id="wcdpue-metabox-fields-wrapper">
				   <div class="wcdpue-center-text">
					<p style="font-weight: bold; font-size: 16px;"><?php _e( 'Notify Customers About This Update', 'wcdpue' ); ?></p>
				   <p>
				   <?php
					_e( 'Unique download access count: ', 'wcdpue' );
					echo $customer_count;
					?>
					</p>

				   </div>
		<div class="wcdpue-top-margin" >
		<?php

		// Breakdown customer count for variable products (Both normal variable products and WooCommerce Subscription variable products)
		if ( $is_variable_product || $is_variable_subscription_product ) {
			$this->wcdpue_variable_products_customer_count_breakdown( $id );
		}

		// Simple Products
		// Simple Subscription Products (WooCommerce Subscriptions)
		// Output downloads dropdown for simple products (Both normal simple products and WooCommerce Subscription simple products)
		if ( $is_simple_product || $is_simple_subscription_product ) {
			$this->wcdpue_output_simple_products_downloads( $id );
		}

		// List downloads for variable products (Both normal variable products and WooCommerce Subscription variable products)
		if ( $is_variable_product || $is_variable_subscription_product ) {
			$this->wcdpue_output_variable_products_downloads( $id );
		}

		?>
	  </div>
	  <div>
			<p id="wcdpue-what-changed-label"><?php _e( 'What Changed?', 'wcdpue' ); ?></p>
			<p id="wcdpue-what-changed-info"><?php _e( 'You need to have the {what_changed} variable inside your email template for this option to take effect.', 'wcdpue' ); ?></p>
			<textarea id="wcdpue-what-changed-textarea" type="textarea" name="wcdpue-what-changed" rows="4"> </textarea>
	  </div>
		<div class="wcdpue-top-margin wcdpue-center-text">

		  <?php if ( ( $is_simple_product || $is_simple_subscription_product ) && get_option( 'wcdpue_show_immediately' ) === 'on' ) { ?>
			<input type="radio" name="wcdpue-option-selected" value="schedule" checked><span style="margin-right: 10px;"><?php _e( 'Schedule', 'wcdpue' ); ?></span>
			<input type="radio" name="wcdpue-option-selected" value="immediately"><span style="margin-right: 10px;"><?php _e( 'Immediately', 'wcdpue' ); ?></span>
		  <?php } else { ?>
			<input style="display: none;" type="radio" name="wcdpue-option-selected" value="schedule" checked>
		  <?php } ?>
		</div>
		<div class="wcdpue-top-margin wcdpue-center-text" id="wcdpue-send-checkbox">
		<label>
		<input type="checkbox" name="wcdpue-send">
		<span><?php _e( 'Send Emails' ); ?></span>
		</label>
		</div>

		<p class="wcdpue-center-text" id="wcdpue-send-count"></p>
		</div>
		<?php

	}

}
