<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class td_ig_personal {

	private static $instance = null;
	private static $td_instagram_connected_account = array();

	public static function get_instance(){
		if ( is_null(self::$instance) ) {
			self::$instance = new td_ig_personal();
		}
		return self::$instance;
	}

	public function __construct() {

		$td_instagram_settings = td_options::get_array('td_instagram_connected_account');

		if ( ! empty( $td_instagram_settings ) ) {
			self::$td_instagram_connected_account = $td_instagram_settings['connected_account'];

			// uncomment the line below to test token refresher cron job
			//self::$td_instagram_connected_account['expires_in_ts'] = time() + 43200; // set to expire in 12 hour
		}

		add_filter( 'cron_schedules', array( $this, 'add_3hours' ) );

		if ( !wp_next_scheduled( 'td_instagram_cron_job' ) ) {
			wp_schedule_event( time(), '3hours', 'td_instagram_cron_job' );
		}

		add_action( 'td_instagram_cron_job', array( $this, 'td_process_feeds_images' ) );

		// if the connected account token expires in less than 1 day we need to refresh token..
		if ( ! empty( self::$td_instagram_connected_account ) && isset(self::$td_instagram_connected_account['expires_in_ts']) ) {
			$expiration_date_timestamp = self::$td_instagram_connected_account['expires_in_ts'];
			$current_time = time();

			$time_until_token_expires = $expiration_date_timestamp - $current_time;

			// add the token refresher cron job
			if ( $time_until_token_expires < 86400 /* 1 day in seconds */ ) {
				add_action( 'td_instagram_cron_job', array( $this, 'td_token_refresher' ) );
			}
		}

		if( is_admin() ) {
			//add_action( 'wp_ajax_td_after_connection', array( $this, 'td_after_connection' ) );
			add_action( 'wp_ajax_td_save_account', array( $this, 'td_save_account' ) );
			add_action( 'wp_ajax_td_remove_account', array( $this, 'td_remove_account' ) );
		}
	}

	/**
	 * adds the 3 hours recurring event
	 * @param $schedules
	 * @return mixed
	 */
	function add_3hours( $schedules ) {
		$schedules['3hours'] = array(
			'interval' => 10800,
			'display' => __('Once every 3 hours')
		);
		return $schedules;
	}

	/*
	 * used to test an instagram account and generate a long lived access token after app authorization has been made
	 *
	 * @since 29.07.2020 - not used anymore ... ( the test and long-lived access token is made on https://tagdiv.com/td_instagram_api/v2/td-instagram-api-v2.php )
	 */
	function td_after_connection() {

		$reply = array(
			'status' => '',
			'account_data' => array(),
		);

		if ( isset( $_POST['access_token'] ) ) {

			$access_token = sanitize_text_field( $_POST['access_token'] );
			$account_data = $this->td_account_data_for_token( $access_token );

			if ( isset( $account_data['error_message'] ) ) {
				$reply['status'] = 'error - ' . $account_data['error_message'] . ' - on verifying access token';
				$account_data['access_token'] = $access_token;
				td_log::log(__FILE__, __FUNCTION__, 'instagram connect account > td_account_data_for_token ERROR', $account_data );
			} elseif ( $account_data !== false ) {

				// token exchange request ( this request will exchange the short lived access token to a long lived one.. )
				$url = 'https://graph.instagram.com/access_token?grant_type=ig_exchange_token&client_secret=' . self::$client_secret . '&access_token=' . $access_token;

				$args = array(
					'timeout' => 60,
					'sslverify' => false
				);
				$result = wp_remote_get( $url, $args );

				if ( ! is_wp_error( $result ) ) {
					$data = json_decode( $result['body'] );
				} else {
					$data = array();
				}

				/*
					successful response should be like:

					{
					  "access_token": "{access-token}",
					  "token_type": "{token-type}",
					  "expires_in": {expires-in}
					}
				*/

				if ( isset( $data->access_token ) ) {

					$account_data['access_token'] = $data->access_token;
					$account_data['token_type'] = $data->token_type;
					$account_data['expires_in'] = $data->expires_in;

					$reply['status'] = 'success - a long lived access token was successfully exchanged for the short lived one !';

				} elseif ( isset( $data->error ) ) {
					$reply['status'] = 'error - ' . $account_data['username'] . ' account short lived access token was successfully processed but the request for exchange it to a long lived access token has returned the following error: ' . $data->error->message;
					td_log::log(__FILE__, __FUNCTION__, 'access_token/ig_exchange_token', $data );
				}

				td_log::log(__FILE__, __FUNCTION__, 'instagram $account_data', $account_data );
				$reply['account_data'] = $account_data;

			} else {
				$reply['status'] = 'error - a successful connection could not be made.!';
			}
		}  else {
			$reply['status'] = 'error - no access_token provided!';
		}

		die( json_encode( $reply ) );
	}

	/*
	 * this function check's the validity of a user instagram access token
	 * @param $access_token
	 * @return bool|bool[] - array with the user name & id based on the access token / the instagram graph error / false if unknown data was received
	 */
	function td_account_data_for_token( $access_token ) {

		$return = array(
			'id' => false,
			'username' => false,
		);

		if ( empty( $access_token ) ) {
			return array(
				'error_message' => 'error - no access_token provided!'
			);
		}

		$url = 'https://graph.instagram.com/me?fields=id,username,media_count&access_token=' . $access_token;
		$args = array(
			'timeout' => 60,
			'sslverify' => false
		);
		$result = wp_remote_get( $url, $args );

		if ( ! is_wp_error( $result ) ) {
			$data = json_decode( $result['body'] );
		} else {
			$data = array();
		}

		if ( isset( $data->id ) ) {
			$return['id'] = $data->id;
			$return['username'] = $data->username;
		} elseif ( isset( $data->error ) && $data->error->type === 'OAuthRateLimitException' ) {
			$return['error_message'] = 'This account\'s access token is currently over the rate limit. Try removing this access token from all feeds and wait an hour before reconnecting.';
		} elseif ( isset( $data->error->message ) ) {
			$return['error_message'] = $data->error->message;
			td_log::log(__FILE__, __FUNCTION__, 'instagram connect account > td_account_data_for_token ERROR', $data );
		} else {
			$return = false;
		}

		return $return;
	}

	/*
	 * used to test and save a user instagram account via ajax
	 */
	function td_save_account() {

		$reply = array(
			'status' => '',
			'account_data' => array(),
		);

		if ( current_user_can( 'edit_posts' ) ) {

			$options = td_options::get_array('td_instagram_connected_account');
			$account_data = isset( $_POST['account_data'] ) ? $_POST['account_data'] : false;

			if ( $account_data !== false && is_array( $account_data ) ) {
				$access_token = isset( $account_data['access_token'] ) ? sanitize_text_field( $account_data['access_token'] ) : '';
			}

			$test_connection_data = $this->td_account_data_for_token( $access_token ); // verifies access token and returns account user id and username

			if ( isset( $test_connection_data['error_message'] ) ) {
				$reply['status'] = 'error - ' . $test_connection_data['error_message'] . ' - on verifying access token';
				td_log::log(__FILE__, __FUNCTION__, 'instagram > td_save_account $test_connection_data returned an error', $test_connection_data );
			} elseif ( $test_connection_data !== false ) {
				$options['connected_account'] = array(
					'access_token' => $access_token,
					'account_type' => 'basic',
					'user_id' => $test_connection_data['id'],
					'username' => $test_connection_data['username'],
					'expires_in' => isset( $account_data['expires_in'] ) ? (int) $account_data['expires_in']  : '',
					'expires_in_ts' => isset( $account_data['expires_in'] ) ? time() + (int) $account_data['expires_in'] : '',
					'token_type' => isset( $account_data['token_type'] ) ? $account_data['token_type'] : '',
					'media_count' => isset( $account_data['media_count'] ) ? (int) $account_data['media_count'] : ''
				);

				td_options::update_array('td_instagram_connected_account', $options);
				
				$reply['status'] = 'success - ' . $test_connection_data['username'] . ' instagram account was successfully connected!';

				$expires_in = 'N/A';
				if ( ! empty( $options['connected_account']['expires_in_ts'] ) ) {
					$human_readable_time_string = td_human_readable_ts( $options['connected_account']['expires_in_ts'] );
					if ( strpos( $human_readable_time_string, 'ago' ) === false ) {
						$expires_in = '<span style="color: #0a9e01;">expires in ' . $human_readable_time_string . '</span>';
					} else {
						$expires_in = '<span style="color: orangered;">expired ' . $human_readable_time_string . '</span>';
					}
				}

				$options['connected_account']['expires_in'] = $expires_in;
				$reply['account_data'] = $options['connected_account'];
				
			} else {
				$reply['status'] = 'error - a successful connection could not be made.!';
			}
			
		} else {
			$reply['status'] = 'error - user doesn\'t have admin rights!';
		}
		
		die( json_encode($reply) );
	}

	/*
	 * used to remove a user instagram account via ajax
	 */
	function td_remove_account() {

		$reply = array(
			'status' => '',
		);

		if ( isset( $_POST['account_id'] ) ) {

			$options = td_options::get_array('td_instagram_connected_account');
			if ( !empty( $options ) ) {

				if ( $_POST['account_id'] === $options['connected_account']['user_id'] ){

					// delete connected account data
					td_options::update_array('td_instagram_connected_account', array());

					// also delete account cached data
					$cache_key = 'td_instragram_tk_' . strtolower( $_POST['account_username'] );
					td_remote_cache::delete_item('td_instagram', $cache_key );

					$reply['status'] = 'success - ' . $_POST['account_username'] . ' account and associated cached data deleted';
				} else {
					$reply['status'] = 'warning - no connected account found with the given user id!';
				}

			} else {
				$reply['status'] = 'warning - no connected account found!';
			}
		} else {
			$reply['status'] = 'error - no account id provided!';
		}

		die( json_encode( $reply ) );
	}

	function td_get_parts( $whole ) {
		if ( substr_count ( $whole , '.' ) !== 2 ) {
			return $whole;
		}

		$parts = explode( '.', trim( $whole ) );
		$return = $parts[0] . '.' . base64_encode( $parts[1] ). '.' . base64_encode( $parts[2] );

		return substr( $return, 0, 40 ) . '.' . substr( $return, 40, 100 );
	}

	function td_maybe_clean( $maybe_dirty ) {
		if ( substr_count ( $maybe_dirty , '.' ) < 3 ) {
			return $maybe_dirty;
		}

		$parts = explode( '.', trim( $maybe_dirty ) );
		$last_part = $parts[2] . $parts[3];
		$cleaned = $parts[0] . '.' . base64_decode( $parts[1] ) . '.' . base64_decode( $last_part );

		return $cleaned;
	}

	function td_token_refresher() {

		// it shouldn't run if we don't have an instagram account connected
		$instagram_connected_account = self::$td_instagram_connected_account;

		$access_token = $instagram_connected_account['access_token'];

		$url = 'https://graph.instagram.com/refresh_access_token?grant_type=ig_refresh_token&&access_token=' . $access_token;
		$args = array(
			'timeout' => 60,
			'sslverify' => false
		);
		$response = wp_remote_get( $url, $args );
		$response = json_decode( wp_remote_retrieve_body( $response ), true );

		if ( ! empty( $response['expires_in'] ) && ! empty( $response['access_token'] ) ) {

			$instagram_connected_account['access_token'] = $response['access_token'];
			$instagram_connected_account['token_type'] = $response['token_type'];
			$instagram_connected_account['expires_in'] = $response['expires_in'];
			$instagram_connected_account['expires_in_ts'] = time() + (int) $response['expires_in'];

			$instagram_access_settings['connected_account'] = $instagram_connected_account;

			td_options::update_array('td_instagram_connected_account', $instagram_access_settings );
		}

		td_log::log(__FILE__, __FUNCTION__, 'CRON JOB Instagram token refresher run', $response );
	}

	function td_process_feeds_images() {

		td_log::log(__FILE__, __FUNCTION__, 'CRON JOB Instagram process feeds images run', array() );

		// get db saved instagram account settings
		$instagram_access_settings = td_options::get_array( 'td_instagram_connected_account');

		$instagram_connected_account = $instagram_access_settings['connected_account'] ?? array();

		// return here if we don't have a connected account
		if ( empty( $instagram_connected_account ) ) {
			// log this try..
			td_log::log( __FILE__, __FUNCTION__, 'no instagram account connected', '' );
			return;
		}

		// set the cache key
		$cache_key = 'td_instragram_tk_' . strtolower( $instagram_connected_account['username'] );

		// get cached user instagram data
		$instagram_data = td_remote_cache::get('td_instagram', $cache_key );

		if ( $instagram_data === false ) {
			// cache is not set
			// add a log entry and return here..
			td_log::log( __FILE__, __FUNCTION__, 'CRON JOB - ' . $instagram_connected_account['username'] . ' connected account cache data is not set!', '' );
			return;
		}

		// get stored user feeds
		$feeds = array();
		if ( isset( $instagram_data['user']['feeds'] ) ) {
			$feeds = $instagram_data['user']['feeds'];
		}

		// process each feed data and set the attachment id if feed media img was uploaded successfully
        if ( is_array( $feeds ) && ! empty( $feeds ) ) {
            foreach ( $feeds as $index => $feed ) {
	            $attachment_id = self::get_image($feed);
	            if ( $attachment_id !== false ) {
		            $feeds[$index]['attachment_id'] = $attachment_id;
	            }
            }
        }

        // set the cache with the new feeds data ( the the attachment id foreach feed media img should be set at this point so we update the cache data )
		$instagram_data['user']['feeds'] = $feeds;
		td_remote_cache::set('td_instagram', $cache_key, $instagram_data, 10800 ); // update and reset the cache

		// add a log entry
		td_log::log( __FILE__, __FUNCTION__, 'CRON JOB success - ' . $instagram_connected_account['username'] . ' connected account cache data reset!', td_remote_cache::get('td_instagram', $cache_key ) );

	}

	/**
	 * process feed image and upload it..
	 * @param $feed
	 * @return bool|mixed false on failure or the image attachment id if the feed img was successfully processed
	 */
	function get_image($feed) {

		// check item for media_url
		$media_url = self::get_media_url( $feed );
		$media_id = isset( $feed['id'] ) ? $feed['id'] : '';

		if ( !empty( $media_url ) ) {

			$new_file_name = explode( '?', $media_url );
			if ( strlen( basename( $new_file_name[0], '.jpg' ) ) > 10 ) {
				$new_file_name = basename( $new_file_name[0], '.jpg' );
			} else {
				$new_file_name = $media_id;
			}

			// check if the picture attachment was previously processed and return that att image id if so..
			$attachment = self::get_attachment($new_file_name);

			// if we find the image attachment return its id
			if ( $attachment !== false ) {
				return $attachment->ID;
			}

			// process image
			require_once(ABSPATH . 'wp-admin/includes/media.php');
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/image.php');

			// set variables for storage, fix file filename for query strings.
			$file_array = array();
			$file_array['name'] = $new_file_name . '.jpg';;

			// download file to temp location
			$file_array['tmp_name'] = download_url( $media_url );

			// if error storing temporarily, return the error.
			if ( is_wp_error( $file_array['tmp_name'] ) ) {
				@unlink( $file_array['tmp_name'] );
				td_log::log( __FILE__, __FUNCTION__,'item picture - is_wp_error $file_array - error storing temporarily', $media_url );
				return false;
			}

			// do the validation and storage stuff
			$attachment_id = media_handle_sideload( $file_array ); // $id of attachment or wp_error

			// if error storing permanently, unlink.
			if ( is_wp_error( $attachment_id ) ) {
				@unlink( $file_array['tmp_name'] );
				td_log::log( __FILE__, __FUNCTION__,'item picture - is_wp_error $attachment_id:  ', $attachment_id->get_error_messages() );
				return false;
			}

			return $attachment_id;

		}

		return false;

	}

	/**
	 * this function checks if the image was already uploaded using the image filename
	 * @param $name - the image file name
	 *
	 * @return bool|mixed - the attachment id if the image is found on site or false otherwise
	 */
	private static function get_attachment($name) {

		$args = array(
			'paged' => '1',
			'posts_per_page' => '1',
			'post_status' => 'inherit,private',
			'post_type' => 'attachment',
			'order' => 'ASC',
			'orderby' => 'date',
			's' => $name,
		);

		$get_attachment = new WP_Query( $args );

		if ( ! $get_attachment || ! isset( $get_attachment->posts, $get_attachment->posts[0] ) ) {
			return false;
		}

		return $get_attachment->posts[0];
	}

	/**
	 * @param array $feed
	 *
	 * @return string
	 */
	private static function get_media_url( $feed ) {

		if ( isset( $feed['media_type'] ) && ( $feed['media_type'] === 'CAROUSEL_ALBUM' || $feed['media_type'] === 'VIDEO' ) ) {
			if ( isset( $feed['thumbnail_url'] ) ) {
				return $feed['thumbnail_url'];
			} elseif ( $feed['media_type'] === 'CAROUSEL_ALBUM' && isset( $feed['media_url'] ) ) {
				return $feed['media_url'];
			}
		} else {
			if ( isset( $feed['media_url'] ) ) {
				return $feed['media_url'];
			}
		}

		return '';

	}

}

td_ig_personal::get_instance();