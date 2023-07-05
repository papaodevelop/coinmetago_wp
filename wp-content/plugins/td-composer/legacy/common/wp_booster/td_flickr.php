<?php
/**
 * Created by PhpStorm.
 * User: tagdiv
 * Date: 30.12.2014
 * Time: 13:26
 */

class td_flickr {

    /**
     * Retrieves the YouTube API key from the themepannel
     *
     * @return string
     */
    static function get_flickr_api_key() {

        $flickr_api_key = '';
        if ( TDC_DEPLOY_MODE == 'dev' || TD_DEPLOY_MODE == 'demo' ) {
            $flickr_api_key = '41797974262d2f6cf165227851e5041d';
        } else {
            if( td_util::get_option('tds_flickr_api_key') != '' ) {
                $flickr_api_key = td_util::get_option('tds_flickr_api_key');
            }
        }

        return $flickr_api_key;
    }


    private static function get_option($option_name) {
        $option_contents = get_option($option_name);
        if( !is_array($option_contents) ) {
            $option_contents = array();
        }

        return $option_contents;
    }


	static function get_data($atts) {

		$source = 'photo_ids';
		if( isset( $atts['source'] ) ) {
            $source = $atts['source'];
        }

		$limit = '10';
        if( isset( $atts['limit'] ) && $atts['limit'] != '' && is_numeric($atts['limit']) ) {
            if( $atts['limit'] > 500 ) {
                $limit = 500;
            } else {
                $limit = $atts['limit'];
            }
        }

        $cache_timeout = 3 * HOUR_IN_SECONDS;
        if( isset( $atts['cache'] ) && $atts['cache'] == '0' ) {
            $cache_timeout = 0;
        } else {
            if( isset( $atts['cache_timeout'] ) && $atts['cache_timeout'] != '' ) {
                $cache_timeout = $atts['cache_timeout'];
            }
        }


        $buffy_array = array();

		switch ($source) {
            case 'photo_ids':
                $flickr_photo_pool = self::get_option('flickr_photo_pool');

                if ( !empty($atts[$source]) ) {

                    $photo_ids = array_map('trim', explode(",", $atts[$source]));

                    $uncached_pool_ids = array();
                    foreach ($photo_ids as $photo_id) {
                        if ( !isset($flickr_photo_pool[$photo_id]) ) {
                            $uncached_pool_ids[] = $photo_id;
                        }
                    }

                    if( !empty($uncached_pool_ids) ) {
                        $uncached_photos = self::api_get_photos_by_ids($uncached_pool_ids);

                        if( $uncached_photos !== FALSE ) {
                            if (empty($flickr_photo_pool)) {
                                $flickr_photo_pool = $uncached_photos;
                            } else {
                                $flickr_photo_pool = $flickr_photo_pool + $uncached_photos;
                            }

                            update_option('flickr_photo_pool', $flickr_photo_pool);
                        }
                    }

                    foreach ($photo_ids as $key => $photo_id) {
                        if( isset( $flickr_photo_pool[$photo_id] ) ) {
                            $buffy_array[$photo_id] = $flickr_photo_pool[$photo_id];
                        }
                    }
                } else {
                    return false;
                }

                break;

            case 'user_id':
            case 'album_id':
                $td_flicker_cache_data = self::get_option('td_flickr_' . $source);
                $flickr_photo_pool = self::get_option('flickr_photo_pool');

                if ( !empty($atts[$source]) ) {

                    if( !isset($td_flicker_cache_data[$atts[$source]])
                        || ( ( time() - $td_flicker_cache_data[$atts[$source]]['timestamp'] ) > $cache_timeout )
                        || $limit > count( $td_flicker_cache_data[$atts[$source]]['items'] ) ) {

                        if( $source == 'user_id' ) {
                            $flickr_data = self::api_get_user_photos($atts[$source], $limit);
                        } else if ( $source == 'album_id' ) {
                            $flickr_data = self::api_get_album_photos($atts[$source], $limit);
                        }

                        if( $flickr_data !== false ) {
                            foreach ($flickr_data as $photo_id => $photo_info) {
                                if ( !isset($flickr_photo_pool[$photo_id]) ) {
                                    $flickr_photo_pool[$photo_id] = $photo_info;
                                } else if ( ( time() - $flickr_photo_pool[$photo_id]['timestamp'] ) > $cache_timeout ) {
                                    $flickr_photo_pool[$photo_id] = $photo_info;
                                }
                            }
                            update_option('flickr_photo_pool', $flickr_photo_pool);

                            $td_flicker_cache_data[$atts[$source]]['items'] = $flickr_data;
                            $td_flicker_cache_data[$atts[$source]]['timestamp'] = time();
                            update_option('td_flickr_' . $source, $td_flicker_cache_data);
                        } else {
                            return false;
                        }

                    }

                    $buffy_array = array_slice($td_flicker_cache_data[$atts[$source]]['items'], 0, $limit );

                }

                break;

            case 'user_albums':
                $td_flicker_cache_data = self::get_option('td_flickr_' . $source);

                if ( !empty($atts['user_id']) ) {

                    if( !isset($td_flicker_cache_data[$atts['user_id']])
                        || ( ( time() - $td_flicker_cache_data[$atts['user_id']]['timestamp'] ) > $cache_timeout )
                        || $limit > count( $td_flicker_cache_data[$atts['user_id']]['items'] ) ) {

                        $flickr_data = self::api_get_user_albums($atts['user_id'], $limit);

                        if( $flickr_data !== false ) {
                            $td_flicker_cache_data[$atts['user_id']]['items'] = $flickr_data;
                            $td_flicker_cache_data[$atts['user_id']]['timestamp'] = time();
                            update_option('td_flickr_' . $source, $td_flicker_cache_data);
                        } else {
                            return false;
                        }
                    }

                    $buffy_array = array_slice($td_flicker_cache_data[$atts['user_id']]['items'], 0, $limit, true );

                }

                break;

            default:
                break;
        }

        if( !empty( $buffy_array ) ) {
            return $buffy_array;
        }
        return false;
	}


	private static function build_url($farm, $server, $photo_id, $secret, $size) {

        return td_global::$http_or_https . '://farm' . $farm . '.staticflickr.com/' . $server . '/' . $photo_id . '_' . $secret . '_' . $size . '.jpg';

    }


	private static function api_get_photos_by_ids($photo_ids) {

        $buffy_photos = array();

        if( !empty( $photo_ids ) ) {

            foreach ( $photo_ids as $photo_id ) {
                $api_url = 'https://api.flickr.com/services/rest/?api_key=' . self::get_flickr_api_key() . '&format=php_serial&method=flickr.photos.getInfo&photo_id=' . $photo_id;
                $api_resp = unserialize(file_get_contents($api_url));

                if ($api_resp['stat'] == 'ok') {
                    $buffy_photos[$photo_id] = array(
                        'title' => $api_resp['photo']['title']['_content'],
                        'thumb_img' => self::build_url($api_resp['photo']['farm'], $api_resp['photo']['server'], $photo_id, $api_resp['photo']['secret'], 'z'),
                        'preview_img' => self::build_url($api_resp['photo']['farm'], $api_resp['photo']['server'], $photo_id, $api_resp['photo']['secret'], 'b'),
                        'full_img' => $api_resp['photo']['urls']['url'][0]['_content'],
                        'timestamp' => time(),
                    );
                }
            }
        }

        // return false on no photos
        if (!empty($buffy_photos)) {
            return $buffy_photos;
        }
        return false;
    }


    private static function api_get_photos_from_response($photos_array, $type) {

        $buffy_photos = array();

        foreach ( $photos_array['photo'] as $photo ) {
            if ( $photo['ispublic'] ) {
                $buffy_photos[$photo['id']] = array(
                    'title' => $photo['title'],
                    'thumb_img' => '',
                    'preview_img' => self::build_url($photo['farm'], $photo['server'], $photo['id'], $photo['secret'], 'b'),
                    'full_img' => '',
                    'timestamp' => time(),
                );

                if( $type == 'user' ) {
                    $buffy_photos[$photo['id']]['thumb_img'] = self::build_url($photo['farm'], $photo['server'], $photo['id'], $photo['secret'], 'z');
                    $buffy_photos[$photo['id']]['full_img'] = td_global::$http_or_https . '://flickr.com/photos/' . $photo['owner'] . '/' . $photo['id'];
                } else if ( $type == 'album' ) {
                    $buffy_photos[$photo['id']]['thumb_img'] = self::build_url($photo['farm'], $photo['server'], $photo['id'], $photo['secret'], 's');
                    $buffy_photos[$photo['id']]['full_img'] = td_global::$http_or_https . '://flickr.com/photos/' . $photos_array['owner'] . '/' . $photo['id'];
                }
            }
        }

        return $buffy_photos;

    }


    private static function api_get_user_photos($user_id, $limit) {

        $buffy_photos = array();

        if( !empty( $user_id ) ) {

            $api_url = 'https://api.flickr.com/services/rest/?api_key=' . self::get_flickr_api_key() . '&format=php_serial&method=flickr.people.getPhotos&user_id=' . $user_id . '&per_page=' . $limit;
            $api_resp = unserialize(file_get_contents($api_url));

            if ($api_resp['stat'] == 'ok') {
                $buffy_photos = self::api_get_photos_from_response($api_resp['photos'], 'user');
            }

        }

        if( !empty( $buffy_photos ) ) {
            return $buffy_photos;
        }
        return false;

    }


    static function api_get_album_photos($album_id, $limit = '') {

        $buffy_photos = array();

        $api_url = 'https://api.flickr.com/services/rest/?api_key=' . self::get_flickr_api_key() . '&format=php_serial&method=flickr.photosets.getPhotos&photoset_id=' . $album_id . '&per_page=' . $limit;
        $api_resp = unserialize(file_get_contents($api_url));;

        if ($api_resp['stat'] == 'ok') {
            $buffy_photos = self::api_get_photos_from_response($api_resp['photoset'], 'album');
        }

        if( !empty( $buffy_photos ) ) {
            return $buffy_photos;
        }
        return false;

    }


    private static function api_get_user_albums($user_id, $limit) {

        $buffy_albums = array();

        $api_url = 'https://api.flickr.com/services/rest/?api_key=' . self::get_flickr_api_key() . '&format=php_serial&method=flickr.photosets.getList&user_id=' . $user_id . '&per_page=' . $limit . '&primary_photo_extras=url_m';
        $api_resp = unserialize(file_get_contents($api_url));

        if ($api_resp['stat'] == 'ok') {
            foreach ( $api_resp['photosets']['photoset'] as $gallery ) {
                $buffy_albums[$gallery['id']] = array(
                    'title' => $gallery['title']['_content'],
                    'preview_img' => $gallery['primary_photo_extras']['url_m'],
                    'count_photos' => $gallery['count_photos'],
                    'count_views' => $gallery['count_views'],
                    'timestamp' => time(),
                );
            }
        }

        if( !empty( $buffy_albums ) ) {
            return $buffy_albums;
        }
        return false;

    }

}
