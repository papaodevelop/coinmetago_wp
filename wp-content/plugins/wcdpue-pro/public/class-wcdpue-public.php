<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link  https://uriahsvictor.com
 * @since 1.0.0
 *
 * @package    Wcdpue
 * @subpackage Wcdpue/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wcdpue
 * @subpackage Wcdpue/public
 * @author     Uriahs Victor <me@uriahsvictor.com>
 */
class Wcdpue_Public {


	/**
	 * The ID of this plugin.
	 *
	 * @since  1.0.0
	 * @access private
	 * @var    string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since  1.0.0
	 * @access private
	 * @var    string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 1.0.0
	 * @param string $plugin_name The name of the plugin.
	 * @param string $version     The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wcdpue_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wcdpue_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wcdpue-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name . '-metabox', plugin_dir_url( __FILE__ ) . 'css/metabox.css', array(), $this->version . TLD_WCDPUE_DEBUG ? time() : '', 'all' );
		wp_enqueue_style( $this->plugin_name . '-selectWoo', WCDPUE_SHARED_ASSETS_PATH . 'css/selectWoo.min.css', array(), $this->version . TLD_WCDPUE_DEBUG ? time() : '', 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wcdpue_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wcdpue_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wcdpue-public.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name . '-selectWoo', WCDPUE_SHARED_ASSETS_PATH . 'js/selectWoo.min.js', array( 'jquery' ), $this->version . TLD_WCDPUE_DEBUG ? time() : '', false );

	}

	/**
	 * Adds custom checkout field to WooCommerce.
	 *
	 * Adds the opt out checkboxes.
	 *
	 * @access public
	 * @since  2.0.0
	 */
	public function wcdpue_add_checkout_field() {

		$cart                  = WC()->cart->get_cart();
		$wcdpue_product_object = new Wcdpue_Product();
		$wcdpue_outputted_ids  = array();
		$found                 = '';

		// check if there are downloadable products in cart
		foreach ( $cart as $cart_item ) {
			$id = $cart_item['product_id'];
			if ( $wcdpue_product_object->wcdpue_product_is_downloadable( $id ) ) {
				$found = true;
				break;
			}
		}

		// dont display field if no downloadable products are in cart
		if ( ! $found ) {
			return;
		}

		// backward compatibility with previously differently named option
		$wcdpue_allow_opt_out = get_option( 'wcdpue_allow_opt_out' );
		$wcdpue_opt_option    = get_option( 'wcdpue_opt_option' );

		$wcdpue_to_be_or_not_to_be = '';
		$wcdpue_notify             = '';

		if ( $wcdpue_opt_option === 'optin' ) {
			$wcdpue_to_be_or_not_to_be = sprintf( __( '%1$s DO %2$s', 'wcdpue' ), '<strong>', '</strong>' );
			$wcdpue_notify             = 'wcdpue_notify_optin_';
		}

		if ( $wcdpue_opt_option === 'optout' || ( $wcdpue_allow_opt_out === 'on' && $wcdpue_opt_option !== 'optin' ) ) {
			$wcdpue_to_be_or_not_to_be = sprintf( __( '%1$s DO NOT %2$s', 'wcdpue' ), '<strong>', '</strong>' );
			$wcdpue_notify             = 'wcdpue_notify_optout_';
		}

		echo '<div id="wcdpue_custom_checkout_field"><h2>' . __( 'Receive Update Notifications', 'wcdpue' ) . '</h2>';
		echo '<p>' . sprintf( __( 'You can receive email notifcations letting you know when a new version of your download is available. Select the products you %1$s want to receive update notifications for.</p>', 'wcdpue' ), $wcdpue_to_be_or_not_to_be );

		foreach ( $cart as $cart_item ) {

			$id           = $cart_item['product_id'];
			$product_name = $cart_item['data']->get_title();

			if ( ! $wcdpue_product_object->wcdpue_product_is_downloadable( $id ) ) {
				continue;
			}

			if ( in_array( $id, $wcdpue_outputted_ids ) ) {
				continue;
			}

			woocommerce_form_field(
				$wcdpue_notify . $id,
				array(
					'type'        => 'checkbox',
					'class'       => array( 'my-field-class form-row-wide' ),
					'label'       => $product_name,
					'placeholder' => __( 'Enter something' ),
				)
			);

			$wcdpue_outputted_ids[] = $id;

		}
		unset( $wcdpue_outputted_ids );

		echo '</div>';

	}

	/**
	 * Update order meta.
	 *
	 * Update order meta with values from checkboxes.
	 *
	 * @access public
	 * @since  2.0.0
	 */
	public function wcdpue_update_order_meta( $order_id ) {

		$wcdpue_optout_ids   = array();
		$wcdpue_optin_active = false;

		// we can't set a value for checkbox because of native WC behavior.
		// So we have to check $_POST array for our input name which also contains the product IDs
		foreach ( $_POST as $key => $value ) {

			if ( strpos( $key, 'wcdpue_notify_optout_' ) !== false ) {

				// get product ID which we set in the checkbox 'name' attribute
				 $id = substr( $key, 21 );

				 $wcdpue_optout_ids[] = $id;

				 update_post_meta( $order_id, 'wcdpue_notify_optout', $wcdpue_optout_ids );

			}

			if ( strpos( $key, 'wcdpue_notify_optin_' ) !== false ) {

				// get product ID which we set in the checkbox 'name' attribute
				 $id = substr( $key, 20 );
				//  FIXME Poor variable naming
				 $wcdpue_optout_ids[] = $id;

				 update_post_meta( $order_id, 'wcdpue_notify_optin', $wcdpue_optout_ids );

			}
		}

		unset( $wcdpue_optout_ids );

		// If optin option is active but customer didn't select any downloadables then assume they opted out
		$wcdpue_opt_option = get_option( 'wcdpue_opt_option' );

		if ( $wcdpue_opt_option === 'optin' ) {
			$wcdpue_optin_active = true;
		}

		$order_meta_optin = get_post_meta( $order_id, 'wcdpue_notify_optin' );
		if ( $wcdpue_optin_active === true && empty( $order_meta_optin ) ) {
			update_post_meta( $order_id, 'wcdpue_notify_optin_none_selected', true );
		}
	}

	 /**
	 * Add metabox to Dokan frontend.
	 *
	 * Outputs the metabox fields to dokan vendor dashboard.
	 *
	 * @access public
	 * @since  2.0.3
	 */
	public function wcdpue_dokan_metabox() {
		$dokan_support_enabled = get_option( 'wcdpue_enable_dokan_support' );
		if ( empty( $dokan_support_enabled ) ) {
			return;
		}
		$metabox = new Wcdpue_Metabox();
		echo $metabox->wcdpue_metabox_fields();
	}


	 /**
	 * Dokan support
	 *
	 * NOTE: Not used. Dokan seems to run `save_post_product` on product update which
	 * is what we're using to do the notifying to users. Kept just as a reference if this ever changes
	 *
	 * @access public
	 * @since  2.0.3
	 */
	public function wcdpue_dokan_support( $post_id ) {
		$admin = new Wcdpue_Admin();
		$admin->wcdpue_product_updated( $post_id, '', true );
	}

	 /**
	 * Unsubscribe and subscribe paragragh text
	 *
	 * @access public
	 * @since  2.0.6
	 */
	public static function wcdpue_subscribe_unsubscribe_text() {
		$text = __( 'Use the button below to unsubscribe or subscribe to update notifications for downloadable products.', 'wcdpue' );
		$text = apply_filters( 'wcdpue_subscribe_unsubscribe_info', $text );

		echo '<p>' . $text . '</p>';
	}

	/**
	 * Unsubscribe and subscribe button
	 *
	 * Button text is filterable
	 *
	 * @access public
	 * @since  2.0.6
	 */
	public static function wcdpue_subscribe_unsubscribe_button() {

		$show_button = get_option( 'wcdpue_show_unsubscribe_button_in_accounts' );

		if ( empty( $show_button ) ) {
			return;
		}

		$nonce   = wp_create_nonce( 'wcdpue_unsubscribe_nonce' );
		$user_id = get_current_user_id();
		$link    = admin_url( 'admin-ajax.php?action=wcdpue_change_user_email_subscription_status&nonce=' . $nonce );

		self::wcdpue_subscribe_unsubscribe_text();
		$button_text         = '';
		$subscription_status = get_user_meta( $user_id, 'wcdpue_email_subscription_status', true );

		// Empty option means that the user is subscribed. Because all users are subscribed by default
		// We only add a value to the DB when the user unsubscribes
		if ( empty( $subscription_status ) ) {
			$saved_button_text = get_option( 'wcdpue_unsubscribe_button_text' );

			if ( empty( $saved_button_text ) ) {
				$button_text = __( 'Unsubscribe', 'wcdpue' );

			} else {
				$button_text = $saved_button_text;
			}

			$button_text = apply_filters( 'wcdpue_unsubscribe_button_text', $button_text );
		} else {

			$saved_button_text = get_option( 'wcdpue_subscribe_button_text' );

			if ( empty( $saved_button_text ) ) {
				$button_text = __( 'Subscribe', 'wcdpue' );
			} else {
				$button_text = $saved_button_text;
			}

			$button_text = apply_filters( 'wcdpue_subscribe_button_text', $button_text );
		}

		echo "<a class='btn button wcdpue-subscribe-unsubscribe-btn' href='$link'>" . $button_text . '</a>';
	}

}
