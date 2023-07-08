<?php

add_action( 'rest_api_init', function (){
	register_rest_route( 'td-woo', '/do_job/', array(
		'methods'  => 'POST',
		'callback' => array ( 'td_woo_ajax', 'on_ajax_render_shortcode' ),
		'permission_callback' => '__return_true',
	));
});

class td_woo_ajax {
	static $_td_block__get_block_js_buffer = '';
	static $_td_block__get_block_uid = '';

	static function on_ajax_render_shortcode( WP_REST_Request $request ) {

		// get the $_POST parameters only
		$parameters = $request->get_body_params();

		// hook to set param blockUid
		add_action( 'td_block_set_unique_id', 'tdc_on_td_block_set_unique_id', 10, 1 );
		function tdc_on_td_block_set_unique_id( $by_ref_block_obj ) {
			td_woo_ajax::$_td_block__get_block_uid = $by_ref_block_obj->block_uid;
		}

		// hook td_block__get_block_js so we can receive the js for eval from the block when do_shortcode is called below
		add_action( 'td_block__get_block_js', 'tdc_on_td_block__get_block_js', 10, 1 );
		/*
		 * @param $by_ref_block_obj td_block
		 */
		function tdc_on_td_block__get_block_js( $by_ref_block_obj ) {
			td_woo_ajax::$_td_block__get_block_js_buffer .= $by_ref_block_obj->js_td_woo_callback_ajax();
			td_woo_ajax::$_td_block__get_block_uid = $by_ref_block_obj->block_uid;
		}

		$shortcode = $request->get_param( 'shortcode' );
		$parameters['shortcode'] = $shortcode;

		$reply_html = do_shortcode( $shortcode );

		// read the buffer that was set by the 'td_block__get_block_js' hook above
		if ( ! empty( self::$_td_block__get_block_js_buffer ) ) {
			$parameters['replyJsForEval'] = self::$_td_block__get_block_js_buffer;
		}

		$parameters['blockUid'] = self::$_td_block__get_block_uid;
		$parameters['replyHtml'] = $reply_html;

		die( json_encode( $parameters ) );

	}
}