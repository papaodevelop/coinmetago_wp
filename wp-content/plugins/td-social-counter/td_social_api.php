<?php
class td_social_api {

    private static $caching_time = 10800;  // cache expire time - default 10800 = 3 hours

    /**
     * - decode the json data
     * @param $url
     * @return array|mixed|object|string
     */
    private function get_json($url) {
        $td_json = json_decode(td_remote_http::get_page($url, __CLASS__), true);
        if ($td_json === null and json_last_error() !== JSON_ERROR_NONE) {
            td_log::log(__FILE__, __FUNCTION__, 'Error decoding the json', $td_json);
            return 'Error decoding the json';
        }
        return $td_json;
    }

    /**
     * - parse all characters in a string and retrieve only the numeric ones
     * @param $td_string
     * @return string
     */
    private function extract_numbers_from_string($td_string) {
        $buffy = '';
        foreach (str_split($td_string) as $td_char) {
            if (is_numeric($td_char)) {
                $buffy .= $td_char;
            }
        }
        return $buffy;
    }


    /**
     * - check the cache, update it if necessary and return the service data (number of likes, followers, etc.)
     * @param $service_id
     * @param $user_id
     * @param string $access_token
     * @return array|bool|int|string
     */
    public function get_social_counter($service_id, $user_id, $access_token = '') {

        //in cache we save the service name followed by the user id (ex. facebook_envato)
        $service_cache_key = $service_id . '_' . $user_id;

        if (td_remote_cache::is_expired(__CLASS__, $service_cache_key) === true ) {
            //cache is expired - do a request
            $service_data = $this->get_service_data($service_id, $user_id, $access_token);

            //check if the cache is already set and the current cached value is > 0
            if ($service_data === 0) {
                $service_cached_data = td_remote_cache::get(__CLASS__, $service_cache_key);
                if ($service_cached_data !== false && $service_cached_data > 0){
                    //keep the cached value
                    $service_data = $service_cached_data;
                }
            }

            //set the cache - we don't use td_remote_cache::extend because td_remote_cache::is_expired returns true when the cache is not set
            td_remote_cache::set(__CLASS__, $service_cache_key , $service_data, self::$caching_time);

        } else {
            // cache is valid return the cached value
            $service_data = td_remote_cache::get(__CLASS__, $service_cache_key);
        }

        return $service_data;
    }


    /**
     * - retrieve the count for each service(likes, followers, etc)
     * @param $service_id
     * @param $user_id
     * @param $access_token
     * @return int
     */
    private function get_service_data($service_id, $user_id, $access_token) {
        $buffy_array = 0;

        switch ($service_id) {
            case 'facebook':

                $td_data = td_remote_http::get_page( "https://facebook.com/$user_id", __CLASS__ );

                if ( $td_data === false ) {

                	// log page html data not successful
                    td_log::log( __FILE__, __FUNCTION__, 'facebook page html data cannot be retrieved.', $user_id);

	                // try to get likes using fb business connected account if available
	                $page_likes_number = $this->get_page_data_from_connected_fb_account( 'fb', $user_id );
	                if ( $page_likes_number !== false ) {
		                $buffy_array = $page_likes_number;
	                }

                } else {
                    $pattern = '/PagesLikesCountDOMID[^>]+>(.*?)<\/a/s';
                    preg_match( $pattern, $td_data, $matches );

                    if ( !empty( $matches[1] ) ) {
                        $page_likes_number = $this->extract_numbers_from_string( strip_tags( $matches[1] ) );
                        $buffy_array = (int) $page_likes_number;

                        // log success
                        td_log::log( __FILE__, __FUNCTION__, 'facebook "' . $user_id . '" page likes data was retrieved successfully.', $buffy_array );

                    } else {

	                    // log no match found in page html data
                        td_log::log( __FILE__, __FUNCTION__, 'we haven\'t found a match in ' . $user_id . '\'s facebook page html data.', $td_data );

	                    // try to get page likes using fb business connected account if available
	                    $page_likes_number = $this->get_page_data_from_connected_fb_account( 'fb', $user_id );
	                    if ( $page_likes_number !== false ) {
		                    $buffy_array = $page_likes_number;
	                    }

                    }
                }

                break;

            case 'twitter':

                $twitter_worked = false;

                //check 1 via https
                $td_data = @$this->get_json("https://cdn.syndication.twimg.com/widgets/followbutton/info.json?screen_names=$user_id");

                if (is_array($td_data) && !empty($td_data[0]['followers_count'])) {
                    $buffy_array = (int) $td_data[0]['followers_count'];
                    $twitter_worked = true; //skip to twitter second check
                } else {
                    td_log::log(__FILE__, __FUNCTION__, 'twitter get_page method FAILED, we are trying again via the api', $td_data);
                }



                //check 2 via twitter api client - we only get here if the first check did not returned anything
                if ($twitter_worked === false) {
                    if (!class_exists('TwitterApiClient')) {
                        require_once 'twitter-client.php';
                        $Client = new TwitterApiClient;
                        $Client->set_oauth (YOUR_CONSUMER_KEY, YOUR_CONSUMER_SECRET, SOME_ACCESS_KEY, SOME_ACCESS_SECRET);
                        try {
                            $path = 'users/show';
                            $args = array ('screen_name' => $user_id);
                            $data = @$Client->call( $path, $args, 'GET' );
                            if (!empty($data['followers_count'])) {
                                $buffy_array = (int) $data['followers_count'];  //set the buffer
                            }
                        }
                        catch( TwitterApiException $Ex ){
                            //twitter rate limit will show here
                            //print_r($Ex);
                        }
                    }
                }


                break;

			//case 'vimeo':
			//    $td_data = td_remote_http::get_page("http://vimeo.com/$user_id", __CLASS__);
			//    $pattern = "/<b class=\"stat_list_count\">(.*?)<\/b>(\s+)<span class=\"stat_list_label\">likes<\/span>/";
			//    preg_match($pattern, $td_data, $matches);
			//    if (!empty($matches[1])) {
			//        $buffy_array = (int) $matches[1];
			//    }
			//
			//    break;

            case 'youtube':

                $url = "https://www.googleapis.com/youtube/v3/channels?part=statistics&key=" . td_remote_video::get_yt_api_key();

                $search_id = str_replace("channel/", "", $user_id);

                if (strpos($user_id, "channel/") === 0) {
                    $url .= "&id=$search_id";
                } else {
                    $url .= "&forUsername=$search_id";
                }

                $subscriberCount = 0;
                $td_data = @$this->get_json($url);

                if (is_array($td_data) && !empty($td_data['items'][0]['statistics']['subscriberCount'])) {
                    $subscriberCount = $td_data['items'][0]['statistics']['subscriberCount'];
                }

                if (!empty($subscriberCount)) {
                    $buffy_array = (int) $subscriberCount;
                }
                break;

			//case 'googleplus':
			//    $td_data = @$this->get_json("https://www.googleapis.com/plus/v1/people/$user_id?key=AIzaSyA1hsdPPNpkS3lvjohwLNkOnhgsJ9YCZWw");
			//    if (is_array($td_data) && !empty($td_data['circledByCount'])) {
			//        $buffy_array = (int) $td_data['circledByCount'];
			//    }else{
			//        $td_data = td_remote_http::get_page("https://plus.google.com/$user_id/posts", __CLASS__);
			//        $pattern = "/<span role=\"button\" class=\"d-s o5a\" tabindex=\"0\">(.*?)<\/span>/";
			//        preg_match($pattern, $td_data, $matches);
			//        if (!empty($matches[1])) {
			//            $expl_maches = explode(' ', trim($matches[1]));
			//            $buffy_array = str_replace(array('.', ','), array(''), $expl_maches[0]);
			//        }
			//    }
			//    break;

            case 'instagram':
                $td_data = td_remote_http::get_page("https://instagram.com/$user_id#", __CLASS__);
                //$pattern = "/followed_by\":(.*?),\"follows\":/";
                //$pattern = "/followed_by\"\:\{\"count\"\:(.*?)\}\,\"/";

                // get the serialized data string present in the page script
                $pattern = '/window\._sharedData = (.*);<\/script>/';
                preg_match( $pattern, $td_data, $matches );

	            $instagram_followed_by_data = false;
	            if ( !empty( $matches[1] ) ) {
		            $instagram_data = json_decode( $matches[1], true );
		            if ( !empty( $instagram_data['entry_data']['ProfilePage'][0]["graphql"]['user']["edge_followed_by"]['count'] ) ) {
			            $instagram_followed_by_data = (int) $instagram_data['entry_data']['ProfilePage'][0]["graphql"]['user']["edge_followed_by"]['count'];
		            }
	            }

                if ( $instagram_followed_by_data ) {

                	// set followers data
                    $buffy_array = $instagram_followed_by_data;

                    // log success
                    td_log::log( __FILE__, __FUNCTION__, 'instagram "' . $user_id . '" page followers count data was retrieved successfully.', $buffy_array );

                } else {

	                // log no match found in page html data
	                td_log::log( __FILE__, __FUNCTION__, 'we haven\'t found a match in ' . $user_id . '\'s instagram page html data.', $td_data );

	                // try to get followers count using fb business connected account if available
                    $page_likes_number = $this->get_page_data_from_connected_fb_account( 'ig', $user_id );
                    if ( $page_likes_number !== false ) {
	                    $buffy_array = $page_likes_number;
                    }

                }

                break;

            case 'pinterest':
                $td_data = td_remote_http::get_page("https://pinterest.com/$user_id", __CLASS__);
                $pattern = "/followers\" content=([^>]+)/is";
                preg_match_all($pattern, $td_data, $matches);
                if (!empty($matches[1][0])) {
                    $buffy_array = $this->extract_numbers_from_string($matches[1][0]);
                }
                break;

            case 'tiktok':
                $td_data = td_remote_http::get_page("https://www.tiktok.com/$user_id?lang=en",  __CLASS__);
                preg_match('/<script id="__NEXT_DATA__"([^>]+)>([^<]+)<\/script>/', $td_data, $matches);
                if ( !empty($matches) ) {
                    $td_data = json_decode($matches[2], false);
                    if (isset($td_data->props->pageProps->userInfo->stats->followerCount)) {
                        $buffy_array = (int) $td_data->props->pageProps->userInfo->stats->followerCount;
                    }
                } else {
                    $td_data = td_remote_http::get_page("https://www.tiktok.com/node/share/video/$user_id",  __CLASS__);
                    $pattern = '/followerCount":(.*),/U';
                    preg_match($pattern, $td_data, $matches);
                    if ( !empty($matches[1]) ) {
                        $buffy_array = $this->extract_numbers_from_string($matches[1]);
                    }

                }
                break;

            case 'soundcloud':
                $td_data = @$this->get_json("http://api.soundcloud.com/users/$user_id.json?client_id=97220fb34ad034b5d4b59b967fd1717e");
                if (is_array($td_data) && !empty($td_data['followers_count'])) {
                    $buffy_array = (int) $td_data['followers_count'];
                }
                break;

            case 'rss':
                $buffy_array = (int) $user_id;
                break;
        }

        return $buffy_array;
    }

	/**
	 * retrieve the page likes count trough fb graph api for connected fb/ig business accounts
	 *
	 * @param $service - fb/ig ( facebook or instagram )
	 * @param $page_username - facebook or instagram business page username
	 * @return false|int - the page likes count / false on failure or if no fb account is connected or no pages are found for the connected fb account
	 *
	 */
	private function get_page_data_from_connected_fb_account( $service, $page_username ) {

		// td_options fb_connected_account
		$td_options_fb_connected_account = td_options::get_array('td_fb_connected_account');

		// page likes init
		$page_likes = null;

		// check for a connected fb business account
		if ( !empty($td_options_fb_connected_account) ) {

			// fb connected account pages data
			$td_fb_account_pages = !empty( $td_options_fb_connected_account['fb_account_pages_data'] ) ? $td_options_fb_connected_account['fb_account_pages_data'] : array();

			if ( !empty($td_fb_account_pages) && is_array($td_fb_account_pages) ) {

				foreach ( $td_fb_account_pages as $page_data ) {

					// if any of the username/page id or page access token are not set in page data go further
					if ( !isset($page_data['username']) || !isset($page_data['id']) || !isset($page_data['page_access_token']) ) {
						continue;
					}

					// check service type and look for a page username match
					if ( $service === 'fb' ) {
						if ( strtolower($page_username) !== strtolower($page_data['username']) )
							continue;
					} elseif ( $service === 'ig' ) {
						$ig_page_username = !empty( $page_data['instagram_business_account'] ) ? $page_data['instagram_business_account']['username'] : false;
						if ( !$ig_page_username || $ig_page_username !== strtolower($page_username) )
							continue;
					}

					// if we have a match do a request using the page access token to get the page likes data
					if ( $service === 'fb' ) {
						// fb request data
						$page_id = $page_data['id'];
						$count_field = 'fan_count';
					} elseif ( $service === 'ig' ) {

						// ig request data
						if ( isset( $page_data['instagram_business_account'] ) && !empty( $page_data['instagram_business_account'] ) ) {
							$page_id = $page_data['instagram_business_account']['id'];
							$count_field = 'followers_count';
						} else {
							td_log::log( __FILE__, __FUNCTION__, '"' . $service . ' - ' . $page_username . '" - missing instagram_business_account in page data.', array() );
							break;
						}

					}

					// get page data ( do request )
					$fb_page_likes_data_api_url = 'https://graph.facebook.com/' . $page_id . '?fields=' . $count_field . '&access_token=' . $page_data['page_access_token'];
					$result = wp_remote_get( $fb_page_likes_data_api_url, array( 'timeout' => 60, 'sslverify' => false ) );

					if ( !is_wp_error($result) ) {

						// process result
						$page_data = json_decode( $result['body'] );

						if ( isset( $page_data->$count_field ) ) {
							td_log::log( __FILE__, __FUNCTION__, '"' . $service . ' - ' . $page_username . '" - facebook graph api page likes data was retrieved successfully.', $page_data->$count_field );
							$page_likes = (int) $page_data->$count_field;
						} else {
							// log missing fan count data
							td_log::log( __FILE__, __FUNCTION__, '"' . $service . ' - ' . $page_username . '" - facebook graph api page likes data request - missing fan count data.', $page_data );
						}

					} else {
						// log error
						td_log::log( __FILE__, __FUNCTION__, '"' . $service . ' - ' . $page_username . '" - facebook graph api page likes data request - error.', $result );
					}

					// break foreach loop on first match
					break;

				}

			}

		}

		return $page_likes ?: false;

	}

}