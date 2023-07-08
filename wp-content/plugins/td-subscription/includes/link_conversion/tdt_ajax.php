<?php

add_action( 'rest_api_init', function () {

	register_rest_route( 'tdt_link_conversion', '(?P<id>\d+)', array(
		'methods'  => 'GET',
		'callback' => function ($data) {
			global $wpdb;

			// set tracking id
			$tds_tracking_id = $data['id'];

			// get tracking data
			$results = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM tds_trackings WHERE id = %s LIMIT 1", $tds_tracking_id ), ARRAY_A );

			// set header
			header('Content-Type: text/html' );

			// process results
			if ( !empty( $results ) ) {

				// set tracking data
				$tdt_link_conversion_data = $results[0];

				// get click counter val
				$click_count_val = (int) $tdt_link_conversion_data['click_count'];

				// set tds tracker page html
				// add the tds tracker page html only for the first visit
				$tds_tracker_page_html = '';
				if ( $click_count_val === 0 ) {
					$tds_tracker_page_html = $tdt_link_conversion_data['page_html'];
				}

				// update click counter
				$click_count_val++;
				$wpdb->update(
					'tds_trackings', // $table
					array( 'click_count' => $click_count_val ), // $data
					array( 'id' => $tds_tracking_id ), // $where
					array( '%d' ), // $format
					array( '%s' ) // $where_format
				);

				echo
				'<!doctype html >
				<html lang="en-US">
				<body>
				<script type="text/javascript">
				
					window.tdt_link_conversion_data = ' . json_encode( $tdt_link_conversion_data ) . ';
				    
				    function redirect(timeout) {
				        setTimeout( function () {
				            window.location.replace( window.tdt_link_conversion_data.rdr_url );
				        }, timeout || 1500 );
				    }
				    
				    redirect(); // redirect
				    
				</script>
				<!-- tds tracker page html -->
				' . $tds_tracker_page_html . '
				</body>
				</html>';

				exit();

			} else {
				echo '
				<!doctype html >
				<html lang="en-US">
				<body>
					<h3>tdt_link_conversion_data with id: ' . $tds_tracking_id . ' not found !</h3>
				</body>
				</html>';

				exit();
			}

		},
		'args' => array(
			'id' => array(
				'validate_callback' => function( $param, $request, $key ) {
					return is_numeric( $param );
				}
			),
		),
		'permission_callback' => '__return_true'
	));

	register_rest_route( 'tdt-api', '/tdt-proxy/', array(
		'methods'  => 'POST',
		'callback' => array ( 'tdt_ajax', 'on_ajax_tdt_proxy' ),
		'permission_callback' => function() {
			return current_user_can('edit_posts');
		}
	));

});

class tdt_ajax {

	static function on_ajax_tdt_proxy( WP_REST_Request $request ) {
		$reply = [];

		$end_point = $request->get_param('endPoint');
		if ( empty( $end_point ) ) {
			$reply['error'] = array(
				array(
					'type' => 'API ERROR',
					'message' => 'No endPoint received. Please use tdsApi.run for proxy requests.',
					'debug_data' => $request
				)
			);
			die( json_encode( $reply ) );
		}

		switch ( $end_point ) {

			case 'link_trackers_get_all':
				$intern_result = self::link_trackers_get_all();
				break;

			case 'link_tracker_add_edit':
				$intern_result = self::link_tracker_add_edit($request);
				break;

			case 'link_tracker_delete':
				$intern_result = self::link_tracker_delete($request);
				break;

			case 'link_trackers_templates_get_all':
				$intern_result = self::link_trackers_templates_get_all();
				break;

			case 'link_trackers_templates_add':
				$intern_result = self::link_trackers_templates_add($request);
				break;

			case 'link_trackers_templates_delete':
				$intern_result = self::link_trackers_templates_delete($request);
				break;

			default:
				$intern_result['error'] = 'Invalid endPoint';
		}

		if ( empty( $intern_result['error'] ) ) {
			$reply = $intern_result;
		} else {
			$reply['error'] = array(
				array(
					'type' => 'API ERROR',
					'message' => $intern_result['error'],
					'debug_data' => $request
				)
			);
		}

		die( json_encode( $reply ) );

	}

	private static function link_trackers_get_all() {
		global $wpdb;

		$result = [];

		$results = $wpdb->get_results( "SELECT * FROM tds_trackings ORDER BY created_at DESC", ARRAY_A );

		if ( null !== $results ) {
			$result['tds_trackings'] = $results;
		} else {
			$result['error'][] = 'Failed to retrieve trackers !';
		}

		return $result;
	}

	private static function link_tracker_add_edit( WP_REST_Request $request ) {

		$result = [];

		$tracking_id = $request->get_param('trackingId');
		$tracking_url = $request->get_param('trackingRdrUrl');
		$tracking_click_count = $request->get_param('trackingClickCount');
		$tracking_page_html = $request->get_param('trackingPageHTML');
		$tracking_notes = $request->get_param('trackingNotes');

		// validate tracking url
		if ( empty( $tracking_url ) ) {
			$result['error'][] = 'Empty redirect url, please add redirect url.';
		} else {

			// remove all illegal characters from an url
			$tracking_url = filter_var( $tracking_url, FILTER_SANITIZE_URL );

			// validate url
			if ( filter_var( $tracking_url, FILTER_VALIDATE_URL ) ) {
				// is valid
			} else {
				$result['error'][] = 'Invalid redirect url';
			}
		}

		// validate click count
		if ( !is_numeric( $tracking_click_count ) ) {
			$result['error'][] = 'Invalid click count number';
		}

		// validate page html
		if ( empty( $tracking_page_html ) ) {
			$result['error'][] = 'Page HTML is empty';
		}

		if ( !empty( $result ) ) {
			// return error
		} else {
			global $wpdb;

			if ( empty( $tracking_id ) ) {

				$insert_result = $wpdb->insert( 'tds_trackings',
					array(
						'rdr_url'     => $tracking_url,
						'click_count' => 0,
						'page_html'   => $tracking_page_html,
						'notes'       => $tracking_notes,
					),
					array( '%s', '%s', '%s', '%s' )
				);

				if ( false !== $insert_result ) {
					$result['inserted_id'] = $wpdb->insert_id;
				} else {
					$result['error'] = $wpdb->last_error;
				}

			} else {

				$update_result = $wpdb->update( 'tds_trackings',
					array(
						'rdr_url'     => $tracking_url,
						'click_count' => $tracking_click_count,
						'page_html'   => $tracking_page_html,
						'notes'       => $tracking_notes,
					),
					array( 'id' => $tracking_id ),
					array( '%s', '%s', '%s', '%s' ),
					array( '%d' )
				);

				if ( false !== $update_result ) {
					$result['success'] = true;
				} else {
					$result['error'] = $wpdb->last_error;
				}
			}

		}

		return $result;
	}

	private static function link_tracker_delete( WP_REST_Request $request ) {
		global $wpdb;

		$result = [];
		$tracking_id = $request->get_param('trackingId');

		if ( empty( $tracking_id ) ) {
			$result['error'][] = 'Tracking id is required !';
		}

		$delete_result = $wpdb->delete(
			'tds_trackings',
			array( 'id' => $tracking_id ),
			array( '%d' )
		);

		if ( false !== $delete_result ) {
			$result['success'] = true;
		} else {
			$result['error'][] = $wpdb->last_error;
		}

		return $result;

	}

	private static function link_trackers_templates_get_all() {
		global $wpdb;

		$result = [];

		$results = $wpdb->get_results( "SELECT * FROM tds_trackings_templates ORDER BY created_at DESC", ARRAY_A );

		if ( null !== $results ) {
			$result['tds_trackings_templates'] = $results;
		} else {
			$result['error'][] = 'Failed to retrieve saved templates !';
		}

		return $result;
	}

	private static function link_trackers_templates_add( WP_REST_Request $request ) {
		global $wpdb;

		$result = [];

		$tpl_name = $request->get_param('tplName');
		$tpl_page_html = $request->get_param('tplPageHTML');

		// validate template page html
		if ( empty( $tpl_page_html ) ) {
			$result['error'][] = 'Template page html is empty';
		}

		if ( !empty( $result ) ) {
			// return error
		} else {
			$insert_result = $wpdb->insert( 'tds_trackings_templates',
				array(
					'name'      => $tpl_name,
					'page_html' => $tpl_page_html,
				),
				array( '%s', '%s' )
			);

			if ( false !== $insert_result ) {
				$result['inserted_id'] = $wpdb->insert_id;
			} else {
				$result['error'] = $wpdb->last_error;
			}

		}

		return $result;
	}

	private static function link_trackers_templates_delete( WP_REST_Request $request ) {
		global $wpdb;

		$result = [];
		$tpl_id = $request->get_param('tplId');

		if ( empty( $tpl_id ) ) {
			$result['error'][] = 'Template id is missing and it\'s required !';
		}

		$delete_result = $wpdb->delete('tds_trackings_templates', array( 'id' => $tpl_id ), array( '%d' ) );

		if ( false !== $delete_result ) {
			$result['success'] = true;
		} else {
			$result['error'] = $wpdb->last_error;
		}

		return $result;

	}

}