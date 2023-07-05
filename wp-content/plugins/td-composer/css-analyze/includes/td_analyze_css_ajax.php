<?php


add_action( 'rest_api_init', 'td_analyze_css_on_rest_api_init');
function td_analyze_css_on_rest_api_init() {
	$namespace = 'tda';
	register_rest_route($namespace, '/save_essential_css/', array(
		'methods'  => 'POST',
		'callback' => 'td_analyze_css_on_ajax_save_essential_css',
		'permission_callback' => '__return_true',
	));
	register_rest_route($namespace, '/delete_essential_css/', array(
		'methods'  => 'POST',
		'callback' => 'td_analyze_css_on_ajax_delete_essential_css',
		'permission_callback' => '__return_true',
	));
}


function td_analyze_css_on_ajax_save_essential_css( WP_REST_Request $request ) {

	    // permission check
    if ( ! current_user_can( 'edit_pages' ) ) {
        $reply['error'] = 'no permission';
        die( json_encode( $reply ) );
    }

    $post_id = $request->get_param( 'post_id' );
    if ( empty( $post_id ) ) {
        $reply['error'] = 'The post id is missing!';
        die( json_encode( $reply ) );
    }

    $essential_css = $request->get_param( 'essential_css' );
    if ( empty( $essential_css ) ) {
        $reply['error'] = 'The essential css is missing!';
        die( json_encode( $reply ) );
    }

    if ( ! defined( 'TD_ANALYZE_CSS_CACHE_DIR')) {
    	$reply['error'] = 'Cache dir not created!';
        die( json_encode( $reply ) );
    }

    $tda_essential_css = get_post_meta($post_id, 'tda_essential_css', true);

    if ( ! empty($tda_essential_css ) ) {
    	foreach ( [ 'critical', 'rest' ] as $val ) {
		    $file_path = TD_ANALYZE_CSS_CACHE_DIR . $post_id . '-tda-' . $val . '-css-' . $tda_essential_css . '.css';
		    if ( file_exists( $file_path ) ) {
			    unlink( $file_path );
		    }
	    }
    }

    $unique_id = $request->get_param( 'unique_id' );
    $critical_css = $request->get_param( 'critical_css' );
    $diff_css = $request->get_param( 'diff_css' );
    $rest_css = $request->get_param( 'rest_css' );
    $group_ids = $request->get_param( 'group_ids' );

    $result1 = update_post_meta($post_id, 'tda_essential_css', $unique_id);
    $result2 = update_post_meta($post_id, 'tda_critical_css', $critical_css);
    $result3 = update_post_meta($post_id, 'tda_diff_css', $diff_css);
    $result4 = update_post_meta($post_id, 'tda_group_ids', $group_ids);

    file_put_contents(TD_ANALYZE_CSS_CACHE_DIR . $post_id .'-tda-critical-css-' . $unique_id . '.css', $critical_css);
    file_put_contents(TD_ANALYZE_CSS_CACHE_DIR . $post_id .'-tda-rest-css-' . $unique_id . '.css', $rest_css);

    $reply['result'] = (empty($result1) || empty($result2) || empty($result3) || empty($result4)) ? 0 : 1;

    die( json_encode( $reply ) );
}


function td_analyze_css_on_ajax_delete_essential_css( WP_REST_Request $request ) {

	    // permission check
    if ( ! current_user_can( 'edit_pages' ) ) {
        $reply['error'] = 'no permission';
        die( json_encode( $reply ) );
    }

    $post_id = $request->get_param( 'post_id' );
    if ( empty( $post_id ) ) {
        $reply['error'] = 'The post id is missing!';
        die( json_encode( $reply ) );
    }

    if ( ! defined( 'TD_ANALYZE_CSS_CACHE_DIR')) {
    	$reply['error'] = 'Cache dir not created!';
        die( json_encode( $reply ) );
    }

    remove_filter('get_post_metadata', 'tda_filter_get_post_metadata');
    $tda_essential_css = get_post_meta($post_id, 'tda_essential_css', true);

    if ( ! empty($tda_essential_css )) {
    	foreach ( [ 'critical', 'rest' ] as $val ) {
		    $file_path = TD_ANALYZE_CSS_CACHE_DIR . $post_id . '-tda-' . $val . '-css-' . $tda_essential_css . '.css';
		    if ( file_exists( $file_path ) ) {
			    unlink( $file_path );
		    }
	    }
    }

    $result1 = delete_post_meta($post_id, 'tda_essential_css');
    $result2 = delete_post_meta($post_id, 'tda_critical_css');
    $result3 = delete_post_meta($post_id, 'tda_group_ids');

    $reply['result'] = (empty($result1) || empty($result2) || empty($result3)) ? 0 : 1;

    die( json_encode( $reply ) );
}
