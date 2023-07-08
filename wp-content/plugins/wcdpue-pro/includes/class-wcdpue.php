<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link  https://uriahsvictor.com
 * @since 2.0.0
 *
 * @package    Wcdpue
 * @subpackage Wcdpue/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      2.0.0
 * @package    Wcdpue
 * @subpackage Wcdpue/includes
 * @author     Uriahs Victor <me@uriahsvictor.com>
 */
class Wcdpue {


	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since  2.0.0
	 * @access protected
	 * @var    Wcdpue_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since  2.0.0
	 * @access protected
	 * @var    string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since  2.0.0
	 * @access protected
	 * @var    string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since 2.0.0
	 */
	public function __construct() {
		if ( defined( 'WCDPUE_VERSION' ) ) {
			$this->version = WCDPUE_VERSION;
		} else {
			$this->version = '2.0.3';
		}
		$this->plugin_name = 'wcdpue';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Wcdpue_Loader. Orchestrates the hooks of the plugin.
	 * - Wcdpue_i18n. Defines internationalization functionality.
	 * - Wcdpue_Admin. Defines all hooks for the admin area.
	 * - Wcdpue_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since  2.0.0
	 * @access private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		include_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wcdpue-loader.php';

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		include_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wcdpue-logger.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		include_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wcdpue-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		include_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wcdpue-admin.php';

		/**
		 * The class responsible for outputting notices that occur in the admin area.
		 */
		include_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wcdpue-admin-notices.php';

		/**
		 * The class responsible for outputing the plugin metabox fields.
		 */
		include_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wcdpue-metabox.php';

		/**
		 * The class responsible for ochestrating the woocommerce product details.
		 */
		include_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wcdpue-product.php';

		/**
		 * The class responsible for ochestrating the woocommerce customer details.
		 */
		include_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wcdpue-customer.php';

		/**
		 * The class responsible for ochestrating the woocommerce customer email details. Extends Customer Class.
		 */
		include_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wcdpue-customer-email.php';

		/**
		 * The class responsible for sending the scheduled mails from the database.
		 */
		include_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wcdpue-scheduled-emails.php';

		/**
		 * The class responsible for displaying the plugin Log. Extends WP_List_Table Class.
		 */
		include_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/class-wcdpue-log-list.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		include_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-wcdpue-emails-subscription.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		include_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-wcdpue-public.php';

		$this->loader = new Wcdpue_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Wcdpue_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since  2.0.0
	 * @access private
	 */
	private function set_locale() {

		$plugin_i18n = new Wcdpue_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since  2.0.0
	 * @access private
	 */
	private function define_admin_hooks() {

		$plugin_admin     = new Wcdpue_Admin( $this->get_plugin_name(), $this->get_version() );
		$plugin_public    = new Wcdpue_Public( $this->get_plugin_name(), $this->get_version() );
		$scheduled_emails = new Wcdpue_Scheduled_Emails;
		$admin_notices    = new Wcdpue_Admin_Notices;

		$this->loader->add_action( 'wcdpue_email_send_burst', $scheduled_emails, 'wcdpue_send_scheduled_emails' );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'cron_schedules', $plugin_admin, 'wcdpue_custom_cron_schedule' );
		$this->loader->add_action( 'add_meta_boxes_product', $plugin_admin, 'wcdpue_create_metabox' );
		$this->loader->add_action( 'save_post_product', $plugin_admin, 'wcdpue_product_updated', 10, 3 );

		// Backward compatibility for old option name 'wcdpue_allow_opt_out'
		$wcdpue_allow_opt_out = get_option( 'wcdpue_allow_opt_out' );
		$wcdpue_opt_option    = get_option( 'wcdpue_opt_option' );

		if ( ( $wcdpue_opt_option !== 'dont-show' ) && ( ! empty( $wcdpue_allow_opt_out ) || ! empty( $wcdpue_opt_option ) ) ) {
			$this->loader->add_action( 'woocommerce_admin_order_data_after_billing_address', $plugin_admin, 'wcdpue_display_admin_order_meta' );
			$this->loader->add_action( 'woocommerce_review_order_before_submit', $plugin_public, 'wcdpue_add_checkout_field' );
			$this->loader->add_action( 'woocommerce_checkout_update_order_meta', $plugin_public, 'wcdpue_update_order_meta' );
		}

		$this->loader->add_action( 'admin_init', $admin_notices, 'wcdpue_dismiss_wcdpue_event_not_firing_notice' );
		$this->loader->add_action( 'admin_init', $admin_notices, 'wcdpue_dismiss_cron_disabled_notice' );
		$this->loader->add_action( 'admin_notices', $admin_notices, 'wcdpue_wc_active_notice' );
		$this->loader->add_action( 'admin_notices', $admin_notices, 'wcdpue_wp_cron_notice' );
		$this->loader->add_action( 'admin_notices', $admin_notices, 'wcdpue_cron_event_status_notice' );

		$this->loader->add_filter( 'plugin_action_links_wcdpue/wcdpue.php', $plugin_admin, 'wcdpue_create_action_links', 10, 4 );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since  2.0.0
	 * @access private
	 */
	private function define_public_hooks() {

		$plugin_public       = new Wcdpue_Public( $this->get_plugin_name(), $this->get_version() );
		$emails_subscription = new Wcdpue_Emails_Subscription();

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		$this->loader->add_action( 'dokan_product_edit_after_options', $plugin_public, 'wcdpue_dokan_metabox' );
		$this->loader->add_action( 'woocommerce_before_account_downloads', $plugin_public, 'wcdpue_subscribe_unsubscribe_button' );
		$this->loader->add_action( 'wp_ajax_wcdpue_change_user_email_subscription_status', $emails_subscription, 'wcdpue_change_user_email_subscription_status' );
		$this->loader->add_action( 'wp_ajax_nopriv_wcdpue_change_user_email_subscription_status', $emails_subscription, 'wcdpue_logged_out_unsubscribe_attempt' );
		// Not used, doc check comment in wcdpue_dokan_support()
		// $this->loader->add_action('dokan_product_updated', $plugin_public, 'wcdpue_dokan_support');

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since 2.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since  2.0.0
	 * @return string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since  2.0.0
	 * @return Wcdpue_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since  2.0.0
	 * @return string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
