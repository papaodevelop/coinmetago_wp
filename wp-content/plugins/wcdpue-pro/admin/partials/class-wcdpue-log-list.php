<?php


/**
 * The WCDPUE Log list.
 *
 * @link  https://uriahsvictor.com
 * @since 2.0.0
 *
 * @package    Wcdpue
 * @subpackage Wcdpue/admin
 */

/**
 * The class responsible for displaying the plugin's email log.
 *
 * @package    Wcdpue
 * @subpackage Wcdpue/admin
 * @author     Uriahs Victor <me@uriahsvictor.com>
 */

if ( ! class_exists( 'WP_List_Table' ) ) {
	include_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

class WCDPUE_LOG_List extends WP_List_Table {


	/**
	 * Class constructor
	 */
	public function __construct() {

		parent::__construct(
			array(
				'singular' => __( 'Log', 'wcdpue' ), //singular name of the listed records
				'plural'   => __( 'Logs', 'wcdpue' ), //plural name of the listed records
				'ajax'     => false, //should this table support ajax?

			)
		);

	}

	/**
	 * Retrieve log data from the database
	 *
	 * @param int $per_page
	 * @param int $page_number
	 *
	 * @return mixed
	 */
	public static function get_logs( $per_page = 10, $page_number = 1 ) {

		global $wpdb;

		$sql = "SELECT * FROM {$wpdb->prefix}wcdpue_log";

		if ( ! empty( $_REQUEST['orderby'] ) ) {
			$sql .= ' ORDER BY ' . esc_sql( $_REQUEST['orderby'] );
			$sql .= ! empty( $_REQUEST['order'] ) ? ' ' . esc_sql( $_REQUEST['order'] ) : ' ASC';
		} else {

			$sql .= ' ORDER BY id DESC';

			$sql .= " LIMIT $per_page";

			$sql .= ' OFFSET ' . ( $page_number - 1 ) * $per_page;
		}

		$result = $wpdb->get_results( $sql, 'ARRAY_A' );

		return $result;

	}

	/**
	 * Delete a log record.
	 *
	 * @param int $id log id
	 */
	public static function delete_log( $id ) {

		global $wpdb;

		$wpdb->delete(
			"{$wpdb->prefix}wcdpue_log",
			array( 'id' => $id ),
			array( '%d' )
		);

	}

	//TODO: PREFIX ALL FUNCTIONS WITH WCDPUE
	/**
	 * Returns the count of records in the database.
	 *
	 * @return null|string
	 */
	public static function record_count() {

		global $wpdb;

		$sql = "SELECT COUNT(*) FROM {$wpdb->prefix}wcdpue_log";

		return $wpdb->get_var( $sql );

	}

	/**
	 * Text displayed when no log data is available
	 */
	public function no_items() {

		_e( 'No logs found', 'sp' );

	}

	/**
	 * Method for name column
	 *
	 * @param array $item an array of DB data
	 *
	 * @return string
	 */
	function column_customer( $item ) {

		// create a nonce
		$delete_nonce = wp_create_nonce( 'wcdpue_delete_log' );

		$title = '<strong>' . $item['customer'] . '</strong>';

		$actions = array(
			'delete' => sprintf( '<a href="?page=%s&action=%s&customer=%s&_wpnonce=%s">Delete</a>', esc_attr( $_REQUEST['page'] ), 'delete', absint( $item['id'] ), $delete_nonce ),
		);

		return $title . $this->row_actions( $actions );
	}

	/**
	 * Render a column when no column specific method exists.
	 *
	 * @param array  $item
	 * @param string $column_name
	 *
	 * @return mixed
	 */
	public function column_default( $item, $column_name ) {
		switch ( $column_name ) {
			case 'email':
			case 'product_name':
			case 'status':
			case 'time_stamp':
				return $item[ $column_name ];
			default:
				return print_r( $item, true ); //Show the whole array for troubleshooting purposes
		}
	}

	/**
	 * Render the bulk edit checkbox
	 *
	 * @param array $item
	 *
	 * @return string
	 */
	function column_cb( $item ) {

		return sprintf(
			'<input type="checkbox" name="bulk-delete[]" value="%s" />',
			$item['id']
		);

	}

	/**
	 *  Associative array of columns
	 *
	 * @return array
	 */
	function get_columns() {
		$columns = array(
			'cb'           => '<input type="checkbox" />',
			'customer'     => __( 'Customer', 'wcdpue' ),
			'email'        => __( 'Email Address', 'wcdpue' ),
			'product_name' => __( 'Product Name', 'wcdpue' ),
			'status'       => __( 'Status', 'wcdpue' ),
			'time_stamp'   => __( 'Timestamp', 'wcdpue' ),
		);

		return $columns;
	}

	/* Columns to make sortable.
	*
	* @return array
	*/
	public function get_sortable_columns() {

		$sortable_columns = array(
			'customer'     => array( 'customer', false ),
			'email'        => array( 'email', false ),
			'product_name' => array( 'product_name', false ),
			'status'       => array( 'status', false ),
			'time_stamp'   => array( 'time_stamp', true ),
		);

		return $sortable_columns;

	}

	/**
	 * Returns an associative array containing the bulk action
	 *
	 * @return array
	 */

	public function get_bulk_actions() {

		$actions = array(
			'bulk-delete' => 'Delete',
		);

		return $actions;

	}

	/**
	 * Handles data query and filter, sorting, and pagination.
	 */
	public function prepare_items() {

		$this->_column_headers = $this->get_column_info();

		/**
	* Process bulk action
*/
		$this->process_bulk_action();

		$per_page     = $this->get_items_per_page( 'logs_per_page', 10 );
		$current_page = $this->get_pagenum();
		$total_items  = self::record_count();

		$this->set_pagination_args(
			array(
				'total_items' => $total_items, //WE have to calculate the total number of items
				'per_page'    => $per_page, //WE have to determine how many items to show on a page
			)
		);

		$this->items = self::get_logs( $per_page, $current_page );
	}

	public function process_bulk_action() {

		//Detect when a bulk action is being triggered...
		if ( 'delete' === $this->current_action() ) {

			// In our file that handles the request, verify the nonce.
			$nonce = esc_attr( $_REQUEST['_wpnonce'] );

			if ( ! wp_verify_nonce( $nonce, 'wcdpue_delete_log' ) ) {
				die( 'Go get a life script kiddies' );
			} else {
				self::delete_log( absint( $_GET['customer'] ) );

				wp_redirect( esc_url( add_query_arg() ) );
				exit;
			}
		}

		// If the delete bulk action is triggered
		if ( ( isset( $_POST['action'] ) && $_POST['action'] == 'bulk-delete' )
			|| ( isset( $_POST['action2'] ) && $_POST['action2'] == 'bulk-delete' )
		) {

			$delete_ids = esc_sql( $_POST['bulk-delete'] );

			// loop over the array of record IDs and delete them
			foreach ( $delete_ids as $id ) {
				self::delete_log( $id );

			}

			wp_redirect( esc_url( add_query_arg() ) );
			exit;
		}
	}

}

class WCDPUE_Log {


	// class instance
	static $instance;

	// customer WP_List_Table object
	public $customers_obj;

	// class constructor
	public function __construct() {
		add_filter( 'set-screen-option', array( __CLASS__, 'set_screen' ), 10, 3 );
		add_action( 'admin_menu', array( $this, 'plugin_menu' ) );
	}

	public static function set_screen( $status, $option, $value ) {
		return $value;
	}

	public function plugin_menu() {

		$hook = add_submenu_page(
			'wcdpue',
			'Email Log',
			'Email Log',
			'manage_options',
			'wcdpue_log',
			array( $this, 'plugin_settings_page' )
		);

		add_action( "load-$hook", array( $this, 'screen_option' ) );

	}

	/**
	 * Screen options
	 */
	public function screen_option() {

		$option = 'per_page';
		$args   = array(
			'label'   => 'Logs',
			'default' => 20,
			'option'  => 'logs_per_page',
		);

		add_screen_option( $option, $args );

		$this->logs_obj = new WCDPUE_LOG_List();
	}

	/**
	 * Plugin settings page
	 */
	public function plugin_settings_page() {
		?>
			<div class="wrap">
				<h2>SENDING LOG</h2>

				<div id="poststuff">
					<div id="post-body" class="metabox-holder columns-2">
						<div id="post-body-content">
							<div class="meta-box-sortables ui-sortable">
								<form method="post">
									<?php
									$this->logs_obj->prepare_items();
									$this->logs_obj->display();
									?>
								</form>
							</div>
						</div>
					</div>
					<br class="clear">
				</div>
			</div>
		<?php
	}

	/**
	 * Singleton instance
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

}

	add_action(
		'plugins_loaded',
		function () {
			WCDPUE_Log::get_instance();
		}
	);
