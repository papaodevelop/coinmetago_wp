<?php



class tdb_util {

    /**
     * debug kill that prints the calling function + class
     * @param string $message
     * @param array $debug_backtrace result of debug_backtrace()
     * @param string $get_called_class result of $get_called_class
     */
    static function kill ($message, $debug_backtrace = array(), $get_called_class = '') {


        echo $get_called_class . ' - : ' . $message . "\n";

        if (isset($debug_backtrace[0])) {

            if (isset($debug_backtrace[0]['file']) && isset($debug_backtrace[0]['line']) ) {
                echo 'File: ' . $debug_backtrace[0]['file'] . "\n";
                echo 'Line: ' . $debug_backtrace[0]['line'] . "\n";
            } else {
                print_r($debug_backtrace[0]);
            }


        } else {
            echo 'No debug_backtrace :( ';
        }
    }

    static function get_get_val($_get_name) {
        if (isset($_GET[$_get_name])) {
            return esc_html($_GET[$_get_name]); // xss - no html in get
        }

        return false;
    }

    static function get_shortcode_att( $content, $shortcode, $att ) {

        // parse content shortcode
        preg_match_all( '/\[(.*?)\]/', $content, $matches );

        // search for the shortcode
        if ( !empty( $matches[0] ) and is_array( $matches[0] ) ) {
            foreach ( $matches[0] as $match ) {
                if ( strpos( $match, $shortcode ) !== false ) {
                    $shortcode = $match;
                }
            }
        }

        // get the shortcode att if we have a shortcode match
        if ( !empty( $shortcode ) ) {
            $shortcode = str_replace( array( '[',']' ), '', $shortcode );
            $shortcode_atts = shortcode_parse_atts( $shortcode );

            if ( isset( $shortcode_atts[$att] ) ){
                return $shortcode_atts[$att];
            }
        }

        return '';
    }

    static function get_shortcode_atts( $content, $shortcode ) {

        // parse content shortcode
        preg_match_all( '/\[(.*?)\]/', $content, $matches );

        $shortcode_atts = array();

        // search for the shortcode
        if ( !empty( $matches[0] ) and is_array( $matches[0] ) ) {
            foreach ( $matches[0] as $match ) {
                if ( strpos( $match, $shortcode ) !== false ) {

                	$shortcode = $match;

                    // get the shortcode att if we have a shortcode match
			        if ( !empty( $shortcode ) ) {
			            $shortcode = str_replace( array( '[',']' ), '', $shortcode );
			            $parsed_shortcode_atts = shortcode_parse_atts( $shortcode );

			            foreach ( $parsed_shortcode_atts as $att => $val ) {
			            	if ( ! empty( $parsed_shortcode_atts[$att] ) ){
			                	$shortcode_atts[$att] = $parsed_shortcode_atts[$att];
				            }
			            }
			        }
                    break;
                }
            }
        }

        return $shortcode_atts;
    }

    static function get_shortcode_content( $content, $shortcode ) {

        // parse content shortcode
        preg_match_all( '/\[(.*?)\]/', $content, $matches );

        // search for the shortcode
        if ( !empty( $matches[0] ) and is_array( $matches[0] ) ) {
            foreach ( $matches[0] as $match ) {
                if ( strpos( $match, $shortcode ) !== false ) {
                	return $match;
                }
            }
        }

        return '';
    }

    static function get_shortcode( $content, $shortcode ) {

        // parse content shortcode
        preg_match_all( '/\[(.*?)\]/', $content, $matches );

        // search for the shortcode
        if ( !empty( $matches[0] ) and is_array( $matches[0] ) ) {
            foreach ( $matches[0] as $match ) {
                if ( strpos( $match, $shortcode ) !== false ) {
	                return true;
                }
            }
        }

        return false;
    }

    static function get_api_url($ext = 'api') {
    	$api_url = '';

	    if (TDB_CLOUD_LOCATION === 'local') {
		    $api_url = 'http://' . $_SERVER['SERVER_ADDR'] . '/td_cloud/' . $ext;
		    //$api_url = 'http://localhost/td_cloud/' . $ext;
	    } else {
	    	$cloud = get_option('tdb_work_cloud');
	    	if (empty($cloud) || 'false' === $cloud) {
	    	    $api_url = 'https://cloud.tagdiv.com/' . $ext;
		    } else {
	    	    $api_url = 'https://work-cloud.tagdiv.com/' . $ext;
		    }
	    }

	    return $api_url;
    }

	static function enqueue_js_files_array($js_files_array, $dependency_array) {
		$last_js_file_id = '';
		foreach ($js_files_array as $js_file_id => $js_file) {
			if ($last_js_file_id == '') {
				wp_enqueue_script($js_file_id, TDB_URL . $js_file, $dependency_array, TD_CLOUD_LIBRARY, true); //first, load it with jQuery dependency
			} else {
				wp_enqueue_script($js_file_id, TDB_URL . $js_file, array($last_js_file_id), TD_CLOUD_LIBRARY, true);  //not first - load with the last file dependency
			}
			$last_js_file_id = $js_file_id;
		}
	}

	static function check_in_range( $int, $min, $max ){
		return ( $int >= $min && $int <= $max );
	}

	static function change_key($array, $old_key, $new_key) {

		if( !array_key_exists($old_key, $array) )
			return $array;

		$keys = array_keys($array);
		$keys[array_search($old_key, $keys)] = $new_key;

		return array_combine($keys, $array);
	}

	static function parse_template_shortcodes( &$content = null, $options = [] ) {

		$new_content = '';

		if ( preg_match_all( '/' . get_shortcode_regex() . '/s', $content, $matches, PREG_SET_ORDER ) ) {
			foreach ( $matches as &$shortcode ) {
				//var_dump($shortcode[ 2 ]);

				$attributes = shortcode_parse_atts( $shortcode[ 3 ] );

				//var_dump($matches);
				//var_dump($attributes);

				$wrapper_shortcode = false;

				if (strpos( $content, "[/" . $shortcode[ 2 ] . "]") > 0 ) {
					$wrapper_shortcode = true;
				}


				if ( ! empty( $shortcode[5] ) ) {
					$new_content .= '[' . $shortcode[2];

					if (is_array($attributes)) {
						self::parse_template_attr( $new_content, $shortcode[2], $attributes, $options );
					}

					$new_content .= ']';

					$new_content .= self::parse_template_shortcodes($shortcode[5], $options );

					$new_content .= '[/' . $shortcode[2] . ']';

				} else {

					$new_content .= '[' . $shortcode[2];

					if (is_array($attributes)) {
						self::parse_template_attr( $new_content, $shortcode[ 2 ], $attributes, $options );
					}

					$new_content .= ']';
					if ( $wrapper_shortcode ) {
						$new_content .= '[/' . $shortcode[ 2 ] . ']';
					}
				}
			}
			return $new_content;
		} else {
			return $content;
		}
	}

	private static function parse_template_attr( &$content, $shortcode, $attributes, $options = []) {

		// filter registered shortcodes to find properties which have specific types
		$filtered_shortcodes = [];

		foreach ( td_api_block::get_all() as $block_settings_key => $block_settings_value ) {
            if ( !empty( $block_settings_value['params'] ) ) {
	            foreach( $block_settings_value['params'] as $param ) {
		            if ( isset($param['type']) && 'attach_image' === $param['type'] ) {
		            	if ( empty( $filtered_shortcodes[$block_settings_key] ) ) {
		            		$filtered_shortcodes[$block_settings_key] = [$param['param_name']];
			            } else {
		            	    $filtered_shortcodes[$block_settings_key][] = $param['param_name'];
			            }
		            }
	            }
            }
		}


		foreach ( $attributes as $key => $val ) {
			if ( !empty( $options ) && array_key_exists('new_images', $options ) ) {

				switch ($key) {
					case 'tdc_css':
						$decoded_val = base64_decode($val);

						foreach ( $options['new_images'] as $img ) {
							$decoded_val = str_replace( substr( $img['uid'], 8 ), 'url(\"' . $img['url'] . '\")', $decoded_val );
						}

		                $val = base64_encode( $decoded_val );

						break;
				}

				if ( !empty( $filtered_shortcodes[$shortcode] ) ) {
					foreach ( $filtered_shortcodes[$shortcode] as $param_name ) {
						if ( $param_name === $key ) {
							foreach ( $options['new_images'] as $img ) {
								$img_val = substr( $img['uid'], 8 );
								if ( $val === $img_val ) {
									$val = $img['attachment_id'];
									break;
								}
							}
						}
					}
				}
			}

			$content .= " $key=\"$val\"";
		}
	}

	static function clean( $var ) {
		if ( is_array( $var ) ) {
			return array_map( array( __CLASS__, 'clean' ), $var );
		} else {
			return is_scalar( $var ) ? sanitize_text_field( $var ) : $var;
		}
	}

}
