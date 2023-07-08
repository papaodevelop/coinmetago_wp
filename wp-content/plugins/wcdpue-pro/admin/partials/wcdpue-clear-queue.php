<?php

require $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php';

global $wpdb;

$wcdpue_schedule_table = TLD_WCDPUE_SCHEDULE_TABLE;

$wpdb->query(
	"TRUNCATE $wcdpue_schedule_table"
);

wp_redirect( home_url( '/wp-admin/options-general.php?page=wcdpue' ) );
