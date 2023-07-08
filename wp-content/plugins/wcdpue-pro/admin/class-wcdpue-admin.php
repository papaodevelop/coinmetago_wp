<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link  https://uriahsvictor.com
 * @since 2.0.0
 *
 * @package    Wcdpue
 * @subpackage Wcdpue/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wcdpue
 * @subpackage Wcdpue/admin
 * @author     Uriahs Victor <me@uriahsvictor.com>
 */
class Wcdpue_Admin {


	/**
	 * The ID of this plugin.
	 *
	 * @since  2.0.0
	 * @access private
	 * @var    string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since  2.0.0
	 * @access private
	 * @var    string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 2.0.0
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version     The version of this plugin.
	 */
	public function __construct( $plugin_name = '', $version = '' ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since 2.0.0
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

		wp_enqueue_style( $this->plugin_name . '-metabox', plugin_dir_url( __FILE__ ) . 'css/metabox.css', array(), $this->version . TLD_WCDPUE_DEBUG ? time() : '', 'all' );
		wp_enqueue_style( $this->plugin_name . '-selectWoo', WCDPUE_SHARED_ASSETS_PATH . 'css/selectWoo.min.css', array(), $this->version . TLD_WCDPUE_DEBUG ? time() : '', 'all' );
		// wp_enqueue_style($this->plugin_name . '-styles', plugin_dir_url(__FILE__) . 'css/style.css', array(), $this->version . TLD_WCDPUE_DEBUG ? time() : '', 'all');
		wp_enqueue_style( $this->plugin_name . '-admin', plugin_dir_url( __FILE__ ) . 'css/wcdpue-admin.css', array(), $this->version . TLD_WCDPUE_DEBUG ? time() : '', 'all' );

		$current_screen = get_current_screen()->id;

		if ( $current_screen === 'toplevel_page_wcdpue' ) {
			global $wp_scripts;

			// get registered script object for jquery-ui and tell WordPress to load the theme from Google CDN
			$wcdpue_jquery_ui = $wp_scripts->query( 'jquery-ui-core' );

			$wcdpue_jquery_ui_protocol = is_ssl() ? 'https' : 'http';
			$wcdpue_jquery_ui_url      = "$wcdpue_jquery_ui_protocol://ajax.googleapis.com/ajax/libs/jqueryui/{$wcdpue_jquery_ui->ver}/themes/excite-bike/jquery-ui.min.css";
			wp_enqueue_style( 'jquery-ui-smoothness', $wcdpue_jquery_ui_url, false, null );
		}
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since 2.0.0
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

		// TODO enqueue scripts on needed pages
		wp_enqueue_script( $this->plugin_name . '-clipboardjs', plugin_dir_url( __FILE__ ) . 'js/clipboard.min.js', array(), $this->version . TLD_WCDPUE_DEBUG ? time() : '', false );
		wp_enqueue_script( $this->plugin_name . '-cookiejs', plugin_dir_url( __FILE__ ) . 'js/js.cookie.js', array(), $this->version . TLD_WCDPUE_DEBUG ? time() : '', false );
		wp_enqueue_script( $this->plugin_name . '-selectWoo', WCDPUE_SHARED_ASSETS_PATH . 'js/selectWoo.min.js', array( 'jquery' ), $this->version . TLD_WCDPUE_DEBUG ? time() : '', false );
		wp_enqueue_script( $this->plugin_name . '-admin', plugin_dir_url( __FILE__ ) . 'js/wcdpue-admin.js', array( 'jquery', 'wp-i18n' ), $this->version . TLD_WCDPUE_DEBUG ? time() : '', false );

		wp_set_script_translations( $this->plugin_name . '-admin', 'wcdpue' );

		wp_enqueue_script( 'jquery-ui-tabs' );
		wp_enqueue_script( 'jquery-ui-accordion' );
		wp_enqueue_script( 'jquery-ui-dialog' );
		wp_enqueue_script( 'jquery-effects-fade' );

	}

	/**
	 * Creates a custom cron schedule.
	 *
	 * @access  public
	 * @param   array $schedules list of schedules
	 * @example /admin/class-wcdpue-admin.php add_filter( 'wcdpue_custom_cron_schedule', 300 );
	 * @since   2.0.0
	 */
	public function wcdpue_custom_cron_schedule( $schedules ) {

		$schedules['wcdpue_cron'] = array(

			'interval' => apply_filters( 'wcdpue_custom_cron_schedule', 900 ),
			'display'  => __( 'Every 15 Minutes', 'wcdpue' ),

		);

		return $schedules;

	}

	/**
	 * Creates settings links.
	 *
	 * @access public
	 * @param  array $wcdpue_plugin_action_links List of action links
	 * @since  2.0.0
	 */
	public function wcdpue_create_action_links( $wcdpue_plugin_action_links ) {

		$wcdpue_action_link = array(
			'<a href="' . menu_page_url( 'wcdpue' ) . '">Settings</a>',
		);
		return array_merge( $wcdpue_action_link, $wcdpue_plugin_action_links );

	}

	/**
	 * Creates the metabox.
	 *
	 * @access public
	 * @since  2.0.0
	 */
	public function wcdpue_create_metabox() {

		global $pagenow;
		$metabox               = new Wcdpue_Metabox();
		$wcdpue_product_object = new Wcdpue_Product();

		if ( $pagenow !== 'post-new.php' && $wcdpue_product_object->wcdpue_product_is_downloadable( get_the_ID() ) ) {

			add_meta_box(
				'wcdpue_metabox',
				__( 'Email Options', 'wcdpue' ),
				array( $metabox, 'wcdpue_metabox_fields' ),
				'',
				'side',
				'high'
			);

		};

	}

	/**
	 * Show opt out products in order admin view.
	 *
	 * Outputs the opted out products on the order details page in WC dashboard.
	 *
	 * @access public
	 * @since  2.0.0
	 */
	public function wcdpue_display_admin_order_meta( $order ) {
		$opt_out_ids = get_post_meta( $order->get_id(), 'wcdpue_notify_optout', true );
		$opt_in_ids  = get_post_meta( $order->get_id(), 'wcdpue_notify_optin', true );

		if ( empty( $opt_out_ids ) && empty( $opt_in_ids ) ) {
			return;
		}

			 $product_name = '';

		if ( ! empty( $opt_out_ids ) ) {
			foreach ( $opt_out_ids as $key => $value ) {
				 $product_name .= get_the_title( $value ) . '<br/>';

			}
			echo '<p><strong>' . __( 'Opted-out of updated notifications for:', 'wcdpue' ) . ':</strong><br/> ' . $product_name . '</p>';
		}
		if ( ! empty( $opt_in_ids ) ) {
			foreach ( $opt_in_ids as $key => $value ) {
				 $product_name .= get_the_title( $value ) . '<br/>';

			}
			echo '<p><strong>' . __( 'Opted-in to updated notifications for:', 'wcdpue' ) . ':</strong><br/> ' . $product_name . '</p>';
		}
	}

	/**
	 * Method fired on product update.
	 *
	 * Creates the email for sending or scheduling.
	 *
	 * @access public
	 * @param  int    $id     The post id.
	 * @param  object $post   The WP Post object.
	 * @param  bool   $update Whether this is an existing post being updated.
	 * @since  2.0.0
	 */
	public function wcdpue_product_updated( $id, $post, $update ) {
		// TODO: add conditions in such a way that Dokan will always work

		// save_post_product hook also runs on new product creation
		if ( ! isset( $_POST['wcdpue-send'] ) ) {
			return;
		}

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( wp_is_post_revision( $id ) ) {
			return;
		}

		if ( wp_is_post_autosave( $id ) ) {
			return;
		}

		// If new post bail
		// Plugin should only really run after a product has been created
		if ( ! $update ) {
			return;
		}

		$wcdpue_product = new Wcdpue_Product;

		$customer_count = (int) $wcdpue_product->wcdpue_count_unique_customers( $id );

		// If no buyers don't continue operation
		// TODO display a notice to user that no buyers are found
		if ( $customer_count < 1 ) {
			return;
		}

		if ( $_POST['wcdpue-send'] === 'on' ) {

			$times = did_action( 'save_post_product' );

			// Makes sure code only runs once on this hook
			if ( $times === 1 ) {

				// This should always be an array
				$selected_downloads_ids = array();

				if ( isset( $_POST['wcdpue_download_ids'] ) && ! empty( $_POST['wcdpue_download_ids'] ) ) {
					$selected_downloads_ids = (array) $_POST['wcdpue_download_ids']; // cast to an array
					$selected_downloads_ids = array_unique( $selected_downloads_ids );
				}

				if ( empty( $selected_downloads_ids ) ) {
					return;
				}

				$sending_option_selected = '';

				if ( isset( $_POST['wcdpue-option-selected'] ) && ! empty( $_POST['wcdpue-option-selected'] ) ) {
					$sending_option_selected = $_POST['wcdpue-option-selected'];
				}

				$wcdpue_product_object = new Wcdpue_Product();
				$customer_email_object = new Wcdpue_Customer_Email();

				$wcdpue_simple_product_is_downloadable   = $wcdpue_product_object->wcdpue_simple_product_is_downloadable( $id );
				$wcdpue_variable_product_is_downloadable = $wcdpue_product_object->wcdpue_variable_product_is_downloadable( $id );

				$wcdpue_simple_subscription_product_is_downloadable   = $wcdpue_product_object->wcdpue_simple_subscription_product_is_downloadable( $id );
				$wcdpue_variable_subscription_product_is_downloadable = $wcdpue_product_object->wcdpue_variable_subscription_product_is_downloadable( $id );

				if ( isset( $_POST['wcdpue-what-changed'] ) && ! empty( $_POST['wcdpue-what-changed'] ) ) {
					update_post_meta( $id, 'wcdpue_what_changed', wp_kses_post( $_POST['wcdpue-what-changed'] ) );
				}

				if ( $wcdpue_simple_product_is_downloadable || $wcdpue_simple_subscription_product_is_downloadable ) {
					$customer_email_object->wcdpue_create_simple_products_email( $id, $selected_downloads_ids, $sending_option_selected );
				} elseif ( $wcdpue_variable_product_is_downloadable || $wcdpue_variable_subscription_product_is_downloadable ) {
					$customer_email_object->wcdpue_create_variable_products_email( $id, $selected_downloads_ids );
				}
			}
		}

	}

}
