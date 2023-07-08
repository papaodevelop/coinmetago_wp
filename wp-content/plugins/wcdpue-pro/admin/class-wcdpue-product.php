<?php

/**
 * The WCDPUE product methods.
 *
 * @link  https://uriahsvictor.com
 * @since 2.0.0
 *
 * @package    Wcdpue
 * @subpackage Wcdpue/admin
 */

/**
 * The class responsible for building and fetching WooCommerce product details.
 *
 * Reponsible for getting product details
 *
 * @package    Wcdpue
 * @subpackage Wcdpue/admin
 * @author     Uriahs Victor <me@uriahsvictor.com>
 */
class Wcdpue_Product {



	/**
	 * The product id.
	 *
	 * @access private
	 * @since  2.0.0
	 * @var    int
	 */
	private $id = '';

	/**
	 * The posts table name.
	 *
	 * @access private
	 * @since  2.0.0
	 * @var    string The WordPress posts table.
	 */
	private $posts_table = TLD_WCDPUE_DB_POSTS_TABLE;

	/**
	 * The WooCommerce download permissions table name.
	 *
	 * @access private
	 * @since  2.0.0
	 * @var    string The WooCommerce product download permissions table
	 */
	private $permissions_table = TLD_WC_DOWNLOAD_PERMISSIONS_TABLE;

	/**
	 * Set the class properties.
	 *
	 * @access public
	 * @param  int $id The product id.
	 * @since  2.0.0
	 */
	public function __construct( $id = '' ) {
		$this->id = $id;
	}


	/**
	 * Returns the WooCommerce product object.
	 *
	 * @access public
	 * @param  int $id The product id.
	 * @return object The woocommerce product object.
	 * @since  2.0.0
	 */
	public function wcdpue_wc_product( $id ) {

		return wc_get_product( $id );

	}

	/**
	 * Returns the variable product children ids.
	 *
	 * Returns the individual variation ids
	 *
	 * @access public
	 * @param  array $id The product id.
	 * @return array The product ids.
	 * @since  2.0.0
	 */
	public function wcdpue_get_product_children( $id ) {

		if ( $this->wcdpue_is_variable_product( $id ) ) {
			return $this->wcdpue_wc_product( $id )->get_children();
		}

		if ( $this->wcdpue_is_variable_subscription_product( $id ) ) {
			return $this->wcdpue_wc_product( $id )->get_children();
		}

		return array();
	}

	/**
	 * Check if a product is downloadable.
	 *
	 * @access public
	 * @param  int $id The product id.
	 * @return bool If the product is downloadable.
	 * @since  2.0.0
	 */
	public function wcdpue_product_is_downloadable( $id ) {

		if ( $this->wcdpue_is_simple_product( $id ) ) {
			return $this->wcdpue_simple_product_is_downloadable( $id );
		} elseif ( $this->wcdpue_is_variable_product( $id ) ) {
			return $this->wcdpue_variable_product_is_downloadable( $id );
		} elseif ( $this->wcdpue_is_simple_subscription_product( $id ) ) {
			return $this->wcdpue_simple_subscription_product_is_downloadable( $id );
		} elseif ( $this->wcdpue_is_variable_subscription_product( $id ) ) {
			return $this->wcdpue_variable_subscription_product_is_downloadable( $id );
		}

	}

	/**
	 * Check if product is a simple product.
	 *
	 * @access public
	 * @param  int $id The product id.
	 * @return bool If the product is a simple product.
	 * @since  2.0.0
	 */
	public function wcdpue_is_simple_product( $id ) {

		$product = $this->wcdpue_wc_product( $id );

		if ( $product->is_type( 'simple' ) ) {
			return true;
		}

		return false;

	}

	/**
	 * Check if a simple product has downloads.
	 *
	 * @access public
	 * @param  int $id The product id.
	 * @return bool If the simple product has download files.
	 * @since  2.0.0
	 */
	public function wcdpue_simple_product_is_downloadable( $id ) {

		$product = $this->wcdpue_wc_product( $id );

		if ( $product->is_downloadable() ) {
			return true;
		} else {
			return false;
		}

	}

	/**
	 * Check if product is a variable product.
	 *
	 * @access public
	 * @param  int $id The product id.
	 * @return bool If the product is a variable product.
	 * @since  2.0.0
	 */
	public function wcdpue_is_variable_product( $id ) {

		$product = $this->wcdpue_wc_product( $id );

		// For some reason this method works for variable subscription products if we don't include
		// the ! $product->is_type( 'variable-subscription' )
		// We're creating a dedicated wcdpue_is_variable_subscription_product() method in case this stopped working at some point
		if ( $product->is_type( 'variable' ) && ! $product->is_type( 'variable-subscription' ) ) {
			return true;
		}

		return false;

	}

	/**
	 * Check if a variable product has downloads(is downloadable).
	 *
	 * This method checks to see if any of the product variations has the "downloadable" checkbox ticked
	 *
	 * @access public
	 * @param  int $id The product id.
	 * @return bool If the variable product has download files.
	 * @since  2.0.0
	 */
	public function wcdpue_variable_product_is_downloadable( $id ) {

		$product_variation_ids = $this->wcdpue_get_product_children( $id );

		foreach ( $product_variation_ids as $product_variation_id ) {

			$product = $this->wcdpue_wc_product( $product_variation_id );

			if ( $product->is_downloadable() ) {
				return true;
				break;
			}
		}

		return false;
	}

	/**
	 * Check if product is a simple subscription product(WooCommerce Subscriptions).
	 *
	 * @access public
	 * @param  int $id The product id.
	 * @return bool If the product is a simple subscription product.
	 * @since  2.0.7
	 */
	public function wcdpue_is_simple_subscription_product( $id ) {

		$product = $this->wcdpue_wc_product( $id );

		if ( $product->is_type( 'subscription' ) ) {
			return true;
		}

		return false;

	}

	/**
	 * Check if a simple subscription product has downloads.
	 *
	 * @access public
	 * @param  int $id The product id.
	 * @return bool If the simple subscription product has download files.
	 * @since  2.0.7
	 */
	public function wcdpue_simple_subscription_product_is_downloadable( $id ) {

		$product = $this->wcdpue_wc_product( $id );

		if ( $product->is_downloadable() ) {
			return true;
		} else {
			return false;
		}

	}

	/**
	 * Check if product is a variable subscription product (WooCommerce Subscriptions).
	 *
	 * @access public
	 * @param  int $id The product id.
	 * @return bool If the product is a variable subscription product.
	 * @since  2.0.7
	 */
	public function wcdpue_is_variable_subscription_product( $id ) {

		$product = $this->wcdpue_wc_product( $id );

		if ( $product->is_type( 'variable-subscription' ) ) {
			return true;
		}

		return false;

	}

	/**
	 * Check if a variable subscription product has downloads(is downloadable).
	 *
	 * This method checks to see if any of the product variations has the "downloadable" checkbox ticked
	 *
	 * @access public
	 * @param  int $id The product id.
	 * @return bool If the variable subscription product has download files.
	 * @since  2.0.7
	 */
	public function wcdpue_variable_subscription_product_is_downloadable( $id ) {

		$product_variation_ids = $this->wcdpue_get_product_children( $id );

		foreach ( $product_variation_ids as $product_variation_id ) {

			$product = $this->wcdpue_wc_product( $product_variation_id );

			if ( $product->is_downloadable() ) {
				return true;
				break;
			}
		}

		return false;
	}

	/**
	 * Count how many unique customers have download permissions
	 *
	 * @access public
	 * @param  int $id The product id.
	 * @return int The total number of unique customers with download permissions.
	 * @since  2.0.0
	 */
	public function wcdpue_count_unique_customers( $id ) {

		if ( $this->wcdpue_is_simple_product( $id ) ) { // simple product
			return $this->wcdpue_count_simple_products_customers( $id );
		} elseif ( $this->wcdpue_is_variable_product( $id ) ) { // variable product
			return $this->wcdpue_count_variable_products_customers( $id );
		} elseif ( $this->wcdpue_is_simple_subscription_product( $id ) ) { // simple subscription product
			return $this->wcdpue_count_simple_products_customers( $id );
		} elseif ( $this->wcdpue_is_variable_subscription_product( $id ) ) { // variable subscription product
			return $this->wcdpue_count_variable_products_customers( $id );
		}

	}

	/**
	 * Count as a specified product type
	 *
	 * Count permissions quantity of a given id as a specific product type even though it is not that type of product.
	 *
	 * @access public
	 * @param  int    $id   The product id.
	 * @param  string $type The type of product to count as
	 * @return int The total number of unique customers with download permissions.
	 * @see    Wcdpue_Admin::wcdpue_variable_products_customer_count_breakdown() For usecase
	 * @since  2.0.0
	 */
	public function wcdpue_count_customers_as( $id, $type ) {

		if ( $type === 'simple' ) {
			return  $this->wcdpue_count_simple_products_customers( $id );
		} elseif ( $type === 'variable' ) {
			return  $this->wcdpue_count_variable_products_customers( $id );
		} elseif ( $type === 'subscription' ) {
			return  $this->wcdpue_count_simple_products_customers( $id );
		} elseif ( $type === 'variable-subscription' ) {
			return  $this->wcdpue_count_variable_products_customers( $id );
		}

	}

	/**
	 * Count unique customers for simple products including simple subscriptions (WooCommerce Subscriptions).
	 *
	 * Count how many unique customers have download permissions to the simple product or simple subscription product.
	 *
	 * @access private
	 * @param  int $id The product id.
	 * @return int The total number of unique customers with download permissions.
	 * @since  2.0.0
	 */
	private function wcdpue_count_simple_products_customers( $id ) {

		global $wpdb;
		$customer_count = 0;

		$allow_guest_customer_notifications = Wcdpue_Customer::wcdpue_allow_guest_customer_notification_emails();

		if ( $allow_guest_customer_notifications === true ) {

			$rows = $wpdb->get_results(
				"SELECT DISTINCT product_id, user_email, user_id
               FROM $this->permissions_table
               WHERE ( product_id = $id )
               AND ( access_expires > NOW() OR access_expires IS NULL )
               "
			);

		} else {

			$rows = $wpdb->get_results(
				"SELECT DISTINCT product_id, user_email, user_id 
               FROM $this->permissions_table
               WHERE ( product_id = $id )
               AND ( access_expires > NOW() OR access_expires IS NULL )
               AND ( user_id <> 0 )
               "
			);

		}

		// Remove unsubscribed users from list
		$customer_count = Wcdpue_Emails_Subscription::wcdpue_filter_unsubscribed_users( $rows );
		$customer_count = count( $customer_count );

		return $customer_count;

	}

	/**
	 * Count unique customers for variable product including variable subscription products (WooCommerce Subscriptions).
	 *
	 * Count how many unique customers have download permissions to the variable product.
	 *
	 * @access private
	 * @param  int $id The product id.
	 * @return int The total number of unique customers with download permissions.
	 * @since  2.0.0
	 * @since  2.0.7 Changed method name from wcdpue_count_variable_product_customers to wcdpue_count_variable_products_customers
	 */
	private function wcdpue_count_variable_products_customers( $id ) {

		global $wpdb;
		$customer_count                     = 0;
		$allow_guest_customer_notifications = Wcdpue_Customer::wcdpue_allow_guest_customer_notification_emails();

		$variable_product_ids = $wpdb->get_results(
			"SELECT ID
       FROM $this->posts_table
       WHERE ( post_parent = $id )
       AND ( post_type != 'revision' )
       "
		);

		$wcdpue_processed_email = array();

		foreach ( $variable_product_ids as $product_id ) {

			if ( $allow_guest_customer_notifications === true ) {

				$variable_permission_ids = $wpdb->get_results(
					"SELECT DISTINCT product_id, user_email, user_id
  					FROM $this->permissions_table
  					WHERE ( product_id = $product_id->ID )
  					AND (access_expires > NOW() OR access_expires IS NULL )
  					"
				);

			} else {

				$variable_permission_ids = $wpdb->get_results(
					"SELECT DISTINCT product_id, user_email, user_id
  					FROM $this->permissions_table
  					WHERE ( product_id = $product_id->ID )
  					AND (access_expires > NOW() OR access_expires IS NULL )
  					AND ( user_id <> 0 )
  					"
				);

			}

			// Remove unsubscribed users from list
			$variable_permission_ids = Wcdpue_Emails_Subscription::wcdpue_filter_unsubscribed_users( $variable_permission_ids );

			foreach ( $variable_permission_ids as $variable_permission_id ) {

				$customer_email = $variable_permission_id->user_email;

				if ( in_array( $customer_email, $wcdpue_processed_email ) ) {
					continue;
				}

				$customer_count++;

				$wcdpue_processed_email[] = $customer_email;
			}
		}

		unset( $wcdpue_processed_email );

		return $customer_count;

	}

}
