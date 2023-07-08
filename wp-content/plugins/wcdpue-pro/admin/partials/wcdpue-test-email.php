<?php
// $_SERVER['DOCUMENT_ROOT'] doesn't always have the correct path if WordPress is installed in a subdirectory.
// require $_SERVER['DOCUMENT_ROOT'].'/wp-load.php';
// This method isn't elegant but it works no matter if WP is intalled in a root directory or subdirectory
require realpath( __DIR__ . '/../../../../../' ) . '/wp-load.php';

if ( ! class_exists( 'woocommerce' ) ) {
	wp_redirect( site_url( '/wp-admin/admin.php?page=wcdpue' ) );
	exit;
}

global $wpdb;

$permissions_table = TLD_WC_DOWNLOAD_PERMISSIONS_TABLE;

$random_download = $wpdb->get_results(
	"SELECT *
FROM $permissions_table
WHERE ( access_expires > NOW() OR access_expires IS NULL )
ORDER BY RAND()
Limit 1
"
);

if ( empty( $random_download ) ) {
	set_transient( 'wcdpue_test_email_sent', 'no-orders-found', 5 );
	wp_redirect( site_url( '/wp-admin/admin.php?page=wcdpue#tld-wcdpue-settings-tab-email' ) );
	exit;
}

$admin_email = get_bloginfo( 'admin_email' );

$details = array();

foreach ( $random_download as $random_download ) {
	$details = array(
		'product_id'       => $random_download->product_id,
		'order_id'         => $random_download->order_id,
		'order_key'        => $random_download->order_key,
		'user_email'       => $admin_email,
		'downloads_markup' => '<br/><br/><a href="#">Example download link (real links will be clickable)</a>',
		'download_names'   => 'Example download product name',
	);
}

$sent_status = Wcdpue_Customer_Email::wcdpue_send_email( $admin_email, $details );

if ( $sent_status === true ) {
	set_transient( 'wcdpue_test_email_sent', 'yes', 5 );
} else {
	set_transient( 'wcdpue_test_email_sent', 'no', 5 );
}

wp_redirect( site_url( '/wp-admin/admin.php?page=wcdpue#tld-wcdpue-settings-tab-email' ) );
exit;
