<?php
/**
 * Created by ra.
 * Date: 3/7/2016
 */




class tdc_util {

	static function generate_unique_id() {
		return td_global::td_generate_unique_id();
	}


	static function enqueue_js_files_array( $js_files_array, $dependency_array = array(), $url = TDC_URL, $ver = TD_COMPOSER ) {

		$last_js_file_id = '';
		foreach ( $js_files_array as $js_file_id => $js_file ) {
			if ( $last_js_file_id == '' ) {
				wp_enqueue_script( $js_file_id, $url . $js_file, $dependency_array, $ver, true ); // first, load it with jQuery dependency
			} else {
				wp_enqueue_script( $js_file_id, $url . $js_file, array( $last_js_file_id ), $ver, true );  // not first - load with the last file dependency
			}
			$last_js_file_id = $js_file_id;
		}
	}





	/**
	 * Shows a soft error. The site will run as usual if possible. If the user is logged in and has 'switch_themes'
	 * privileges this will also output the caller file path
	 * @param $file - The file should be __FILE__
	 * @param $function - __FUNCTION__
	 * @param $message - the error message
	 * @param $more_data - it will be print_r if available
	 */
	static function error($file, $function, $message, $more_data = '') {
		if (is_user_logged_in() and current_user_can('switch_themes')){

			echo '<br><br>wp booster error:<br>';
			echo $message;

			echo '<br>' . $file . ' > ' . $function;
			if (!empty($more_data)) {
				echo '<br><br><pre>';
				echo 'more data:' . PHP_EOL;
				print_r($more_data);
				echo '</pre>';
			}
		};
	}




	static function get_get_val($_get_name) {
		if (isset($_GET[$_get_name])) {
			return esc_html($_GET[$_get_name]); // xss - no html in get
		}

		return false;
	}



    static function get_current_url() {
        return "//".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    }


    /**
     * @updated on 25.5.2018 - allow the $atts['image'] to be either an ID or URL. This is done to allow the multi purpose shortcodes to load the default placeholder
     * image by URL, to avoid adding them to the media library just to get an ID
     * !WARNING: when it gets images by url, it does not return height and width for now...
     * @param $atts
     * @return array
     */
	static function get_image( $atts ) {
        $image_info = array(
            'url'    => '',
            'height' => '',
            'width'  => '',
            'title'  => get_the_title($atts['image']),
            'alt'    => get_post_meta($atts['image'], '_wp_attachment_image_alt', true)
        );

	    if (!is_numeric($atts['image'])) {
            $image_info['url'] = $atts['image'];
	        return $image_info;
        }

		$meta = wp_get_attachment_metadata( $atts['image'] );

//		var_dump($atts);
//		var_dump($meta);



		if ( is_array( $meta ) ) {
//			$image_info = array(
//				'url'    => wp_get_attachment_url( $atts['image'] ),
//				'height' => $meta['height'],
//				'width'  => $meta['width'],
//			);

			$image_info['url']    = wp_get_attachment_url( $atts['image'] );
            $image_info['height'] = $meta['height'];
            $image_info['width']  = $meta['width'];

			if ( isset( $atts['media_size_image_width'] ) && isset( $atts['media_size_image_height'] ) && ! empty( $meta['sizes'] ) && count( $meta['sizes'] ) ) {

				foreach ( $meta['sizes'] as $size_id => $size_settings ) {
					if ( $size_settings['width'] == $atts['media_size_image_width'] && $size_settings['height'] == $atts['media_size_image_height'] ) {

						$image_attributes = wp_get_attachment_image_src( $atts['image'], $size_id );
						if ( false !== $image_attributes ) {
//							$image_info['url']    = $image_attributes[0];
//							$image_info['width']  = $image_attributes[1];
//							$image_info['height'] = $image_attributes[2];
                            $image_info['url']    = $image_attributes[0];
                            $image_info['width']  = $image_attributes[1];
                            $image_info['height'] = $image_attributes[2];
						}
						break;
					}
				}
			}
		}

		return $image_info;
	}


	/**
	 * @param $obj
	 * @param $css_compiler
	 * @param $raw_css
	 * @param $param_name
	 * @param $param_value
	 */
	static function set_responsive_css( $obj, $css_compiler, $raw_css, $param_name, $param_value ) {

		if ( ! empty( $param_value ) ) {

			$plain_css = '';

			// Detect base64 encoding
			if ( base64_decode( $param_value, true ) && base64_encode( base64_decode( $param_value, true ) ) === $param_value && mb_detect_encoding( base64_decode( $param_value, true ) ) === mb_detect_encoding( $param_value ) ) {

				$decoded_values = base64_decode( $param_value, true );
				$values = json_decode( $decoded_values, true );

				foreach ( $values as $media => $value ) {

					if ( '' !== $value ) {

						$tdm_css_compiler_media = 'tdm_css_compiler_' . $media;

						if ( ! property_exists( $obj, $tdm_css_compiler_media ) ) {
							$obj->$tdm_css_compiler_media = new td_css_compiler( $raw_css );
						}

						if ( ! isset( $obj->media_array ) ) {
							$obj->media_array = array();
						}

						if ( ! isset( $obj->media_array[ $media ] ) ) {
							$obj->media_array[ $media ] = array();
						}

						if ( array_key_exists( $media, td_global::$viewport_settings ) ) {
							if ( is_numeric( $value ) ) {
								$value .= 'px';
							}
							$obj->media_array[ $media ][ $param_name ] = $value;
						}
					}
				}

			// Show value as it is!
			} else {

				// Concatenate '.px' to the numeric values
				if ( is_numeric( $param_value ) ) {
					$param_value .= 'px';
				}

				$plain_css .= $param_value;
			}


			// Compile css

			if ( ! empty( $plain_css ) ) {
				$css_compiler->load_setting_raw( $param_name, $plain_css );
			}
		}
	}




	/**
	 * @param $obj
	 * @param $css_compiler
	 * @param $raw_css
	 * @param $param_name
	 * @param $param_value
	 */
	static function set_responsive_font_css( $obj, $css_compiler, $raw_css, $param_name, $param_value ) {

		$font_family_list = td_util::get_font_family_list( false );

		if ( ! empty( $param_value ) && is_array( $param_value ) ) {

			$plain_css = '';

			foreach ( $param_value as $prop_name => $prop_value ) {

				if ( ! empty( $prop_value ) ) {

					if ( base64_decode( $prop_value, true ) && base64_encode( base64_decode( $prop_value, true ) ) === $prop_value && mb_detect_encoding( base64_decode( $prop_value, true ) ) === mb_detect_encoding( $prop_value ) ) {

						$decoded_values = base64_decode( $prop_value, true );
						$values = json_decode( $decoded_values, true );

						foreach ( $values as $media => $value ) {

							if ( '' !== $value ) {

								$tdm_css_compiler_media = 'tdm_css_compiler_' . $media;

								if ( ! property_exists( $obj, $tdm_css_compiler_media ) ) {
									$obj->$tdm_css_compiler_media = new td_css_compiler( $raw_css );
								}
								if ( ! isset( $obj->media_array ) ) {
									$obj->media_array = array();
								}

								if ( ! isset( $obj->media_array[ $media ] ) ) {
									$obj->media_array[ $media ] = array();
								}

								if ( array_key_exists( $media, td_global::$viewport_settings ) ) {

									switch ( $prop_name ) {
										case 'font-family': $value = $font_family_list[ $value ]; break;
										case 'font-size':
										case 'line-height':
										case 'letter-spacing':
											if ( is_numeric( $value ) ) {
												$value .= 'px';
											}
											break;
									}

									if ( ! isset( $obj->media_array[ $media ][ $param_name ] ) ) {
										$obj->media_array[ $media ][ $param_name ] = '';
									}

									$obj->media_array[ $media ][ $param_name ] .= $prop_name . ':' . $value . ';';
								}
							}
						}

					// Show value as it is!
					} else {

						// Concatenate '.px' to the numeric values
						switch ( $prop_name ) {
							case 'font-family': $prop_value = $font_family_list[ $prop_value ]; break;
							case 'font-size':
							case 'line-height':
							case 'letter-spacing':
								if ( is_numeric( $prop_value ) ) {
									$prop_value .= 'px';
								}
								break;
						}

						$plain_css .= $prop_name . ':' . $prop_value . ';';
					}
				}
			}



			// Compile css

			if ( ! empty( $plain_css ) ) {
				$css_compiler->load_setting_raw( $param_name, $plain_css );
			}
		}
	}




	/**
	 * @param $obj
	 * @param $css_compiler
	 * @param $raw_css
	 * @param $param_name
	 * @param $param_value
	 */
	static function set_responsive_shadow_css( $obj, $css_compiler, $raw_css, $param_name, $param_value ) {

		if ( ! empty( $param_value ) && is_array( $param_value ) ) {

			$plain_css = '';

			$shadow_offset_horizontal = $param_value[ 'shadow_offset_horizontal' ];
			if ( is_numeric( $shadow_offset_horizontal ) ) {
				$shadow_offset_horizontal .= 'px';
			}

			$shadow_offset_vertical = $param_value[ 'shadow_offset_vertical' ];
			if ( is_numeric( $shadow_offset_vertical ) ) {
				$shadow_offset_vertical .= 'px';
			}
			$shadow_size = $param_value[ 'shadow_size' ];
			$shadow_color = $param_value[ 'shadow_color' ];

			if ( base64_decode( $shadow_size, true ) && base64_encode( base64_decode( $shadow_size, true ) ) === $shadow_size && mb_detect_encoding( base64_decode( $shadow_size, true ) ) === mb_detect_encoding( $shadow_size ) ) {

				$shadow_size_decoded_values = base64_decode( $shadow_size, true );
				$shadow_size_values = json_decode( $shadow_size_decoded_values, true );

				foreach ( $shadow_size_values as $media => $value ) {

					if ( '' !== $value ) {

						$tdm_css_compiler_media = 'tdm_css_compiler_' . $media;

						if ( ! property_exists( $obj, $tdm_css_compiler_media ) ) {
							$obj->$tdm_css_compiler_media = new td_css_compiler( $raw_css );
						}
						if ( ! isset( $obj->media_array ) ) {
							$obj->media_array = array();
						}

						if ( ! isset( $obj->media_array[ $media ] ) ) {
							$obj->media_array[ $media ] = array();
						}

						if ( array_key_exists( $media, td_global::$viewport_settings ) ) {

							if ( ! isset( $obj->media_array[ $media ][ $param_name ] ) ) {
								$obj->media_array[ $media ][ $param_name ] = '';
							}

							if ( is_numeric( $value ) ) {
								$value .= 'px';
							}

							$obj->media_array[ $media ][ $param_name ] = $shadow_offset_horizontal . ' ' . $shadow_offset_vertical . ' ' . $value . ' ' . $shadow_color;
						}
					}
				}

			// Show value as it is!
			} else {

				// Concatenate '.px' to the numeric values
				if ( is_numeric( $shadow_size ) ) {
					$shadow_size .= 'px';
				}
				$plain_css = $shadow_offset_horizontal . ' ' . $shadow_offset_vertical . ' ' . $shadow_size . ' ' . $shadow_color;
			}


			// Compile css

			if ( ! empty( $plain_css ) ) {
				$css_compiler->load_setting_raw( $param_name, $plain_css );
			}
		}
	}




	/**
	 * @param $obj
	 *
	 * @return string
	 */
	static function get_responsive_css( $obj ) {

		$compiled_css = '';

//		echo '<pre>';
//		var_dump($obj->media_array);
//		echo '</pre>';


		// This keep the order: all, landscape, portrait, phone.
		foreach ( td_global::$viewport_settings as $media => $media_settings ) {

			$tdm_css_compiler_media = 'tdm_css_compiler_' . $media;

			if ( property_exists( $obj, $tdm_css_compiler_media ) ) {

				foreach ( $obj->media_array[ $media ] as $param_name => $param_value ) {

					$obj->$tdm_css_compiler_media->load_setting_raw( $param_name, $param_value );
				}

				if ( 'all' === $media ) {
					$compiled_css .= $obj->$tdm_css_compiler_media->compile_css();
				} else {
					$compiled_css .= PHP_EOL . PHP_EOL . td_global::$viewport_settings[ $media ]['media_query'] . '{' . PHP_EOL;
					$compiled_css .= $obj->$tdm_css_compiler_media->compile_css();
					$compiled_css .= '}';
				}
			}
		}

		return $compiled_css;
	}


	/**
	 * Get the fonts required by icons. The required fonts are detected by parsing the post content.
	 *
	 * @param string $post_id
	 *
	 * @return array
	 */
	static function get_required_icon_fonts_ids( $post_id ) {

		$content = '';

		if ( td_util::is_template_header() && ! td_util::is_no_header() ) {
			$header_template_content = td_util::get_header_template_content();
			if (is_array($header_template_content)) {
				foreach ( $header_template_content as $header_template ) {
					$content .= $header_template;
				}
			}
		}

		if ( td_util::is_template_footer() && ! td_util::is_no_footer() ) {
			$content .= td_util::get_footer_template_content();
		}

		$post_content = get_post( $post_id )->post_content;
		if ( base64_decode( $post_content, true ) && base64_encode( base64_decode( $post_content, true ) ) === $post_content && mb_detect_encoding( base64_decode( $post_content, true ) ) === mb_detect_encoding( $post_content ) ) {
			$post_content = stripslashes( base64_decode( $post_content, true ));
		}
		$content .= $post_content;

		return self::get_content_icon_fonts_ids( $content );
	}


	static function get_content_icon_fonts_ids( $content ) {

		$font_list = array();

		$matched_fonts = array();
		preg_match_all('/\s(\w*)?tdicon(\w*)?\=\\"([^\\"]+)\\"/mi', $content, $matched_fonts);

//		echo '<pre>';
//		var_dump( $content );
//		var_dump( $matched_fonts );
//		echo '</pre>';
//		die;

		if ( !empty($matched_fonts) && is_array($matched_fonts) && 4 === count($matched_fonts)) {
			foreach ( $matched_fonts[3] as $font_value ) {
				$css_classes = explode( ' ', $font_value );

				if ( count( $css_classes ) ) {
					foreach ( $css_classes as $css_class ) {
						foreach ( tdc_config::$font_settings as $font_id => &$font_setting ) {
							if ( isset( $font_setting['family_class'] ) && $css_class === 'tdc-font-' . $font_setting['family_class'] && ! isset( $font_list[$font_id] ) ) {
								$font_setting['load'] = true;
								$font_list[$font_id] = $font_setting;
							}
						}
					}
				}
			}
		}

//		var_dump($font_list);
//		die;


		// Find icons for styles

		$matched_styles = array();
		preg_match_all('/\stds_(\w*)\=\\"([^\\"]+)\\"/mi', $content, $matched_styles);

//		echo '<pre>';
//		var_dump( $matched_styles );
//		echo '</pre>';
//		die;

		if ( ! empty($matched_styles ) && is_array($matched_styles) && 3 === count( $matched_styles )) {
			foreach ($matched_styles[2] as $matched_style) {

				$matched_fonts = array();
				preg_match_all('/\s(' . $matched_style .  '-)?tdicon(\w*)\=\\"([^\\"]+)\\"/mi', $content, $matched_fonts);

//				echo '<pre>';
//				var_dump( $matched_fonts );
//				echo '</pre>';
//				die;

				if ( !empty($matched_fonts) && is_array($matched_fonts) && 4 === count($matched_fonts)) {
					foreach ( $matched_fonts[3] as $font_value ) {
						$css_classes = explode( ' ', $font_value );

						if ( count( $css_classes ) ) {
							foreach ( $css_classes as $css_class ) {
								foreach ( tdc_config::$font_settings as $font_id => &$font_setting ) {
									if ( isset( $font_setting['family_class'] ) && $css_class === 'tdc-font-' . $font_setting['family_class'] && ! isset( $font_list[$font_id] ) ) {
										$font_setting['load'] = true;
										$font_list[$font_id] = $font_setting;
									}
								}
							}
						}
					}
				}
			}
		}

		return $font_list;
	}




	static function get_content_google_fonts_ids( $content ) {

		$font_list = array();

		$matches = array();
		preg_match_all('/f_\w+_font_(\w+)\=\\"([^\\"]+)\\"/mi', $content, $matches);

//		echo '<pre>';
//		var_dump( $matches );
//		echo '</pre>';

		if ( ! empty( $matches ) && is_array( $matches ) && 3 === count( $matches )) {

			foreach ( $matches[1] as $key => $font_param ) {

				if ( 'family' === $font_param ) {

					$font_value = $matches[2][$key];

					// Detect base64 encoding
					if ( base64_decode( $font_value, true ) && base64_encode( base64_decode( $font_value, true ) ) === $font_value && mb_detect_encoding( base64_decode( $font_value, true ) ) === mb_detect_encoding( $font_value ) ) {

						$decoded_values = base64_decode( $font_value, true );
						$values         = json_decode( $decoded_values, true );

						foreach ( $values as $media => $value ) {
							if ( is_numeric( $value ) ) {
								$font_list[] = $value;
							}
						}

					} else if ( is_numeric( $font_value ) ) {
						$font_list[] = $font_value;
					}
				}
			}
		}

		return array_unique( $font_list );
	}





    /**
     * try to load a placeholder image if it exists
     * @see tdc_config::$default_placeholder_images
     * @param $id_or_url
     * @return false|string
     */
	static function get_image_or_placeholder($id_or_url) {
	    if (is_numeric($id_or_url)) {
	        return wp_get_attachment_url( $id_or_url );
        }

	    return $id_or_url;
    }

    /**
     * gets the td composer edit page link
     * @param $post_id - the post id
     * @return mixed
     */
    static function get_edit_link( $post_id ) {

        $url = add_query_arg(
            [
                'post_id' => $post_id,
                'td_action' => 'tdc',
                'tdbTemplateType' => 'page',
                //'prev_url' => rawurlencode( get_edit_post_link( $post_id ) )
            ],
            admin_url( 'post.php' )
        );

        return $url;
    }


    static function parse_content_for_mobile( &$content = null ) {

		$new_content = '';

		if ( preg_match_all( '/' . get_shortcode_regex() . '/s', $content, $matches, PREG_SET_ORDER ) ) {
			foreach ( $matches as &$shortcode ) {
//				var_dump($shortcode[ 2 ]);

				$attributes = shortcode_parse_atts( $shortcode[ 3 ] );

//				var_dump($matches);
//				var_dump($attributes);

				$wrapper_shortcode = false;

				if (strpos( $content, "[/" . $shortcode[ 2 ] . "]") > 0 ) {
					$wrapper_shortcode = true;
				}


				if ( ! empty( $shortcode[5] ) ) {
					$new_content .= '[' . $shortcode[2];

					if (is_array($attributes)) {
						self::parse_content_attr( $new_content, $shortcode[2], $attributes );
					}

					$new_content .= ']';

					$new_content .= self::parse_content_for_mobile($shortcode[5] );

					$new_content .= '[/' . $shortcode[2] . ']';

				} else {

					$new_content .= '[' . $shortcode[2];

					if (is_array($attributes)) {
						self::parse_content_attr( $new_content, $shortcode[ 2 ], $attributes );
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



	private static function parse_content_attr( &$content, $shortcode, $attributes) {
		foreach ( $attributes as $key => $val ) {

			if ( 'tdc_css' === $key ) {

				// Detect base64 encoding
				if ( base64_decode( $val, true ) && base64_encode( base64_decode( $val, true ) ) === $val && mb_detect_encoding( base64_decode( $val, true ) ) === mb_detect_encoding( $val ) ) {

					$decoded_values = base64_decode( $val, true );
					$values         = json_decode( $decoded_values, true );

					if ( isset( $values[ 'type' ] ) && 'gradient' === $values[ 'type' ] ) {
						$content .= " $key=\"$val\"";
						continue;
					}

					$final_values = [];

//					if ( ! isset( $values[ 'phone' ] ) && isset( $values[ 'all' ] ) ) {
//						$final_values[ 'phone' ] = $values[ 'all' ];
//					}

					if (isset( $values[ 'all' ])) {
						foreach ( $values['all'] as $key_all => $value_all ) {

							if (empty($final_values[ 'all' ])) {
								$final_values[ 'all' ] = [];
							}
							$final_values[ 'all' ][ $key_all ] = $value_all;

							if ( ! isset( $values[ 'phone' ][ $key_all ] ) ) {
								if (empty($final_values[ 'phone' ])) {
									$final_values[ 'phone' ] = [];
								}
								$final_values[ 'phone' ][ $key_all ] = $value_all;
							}
						}
					}


//					if ( isset( $values[ 'portrait' ] ) ) {
//						$final_values[ 'all' ] = $values[ 'portrait' ];
//					} else if ( isset( $values[ 'all' ] ) ) {
//						$final_values[ 'all' ] = $values[ 'all' ];
//					}

					if ( isset( $values[ 'portrait' ] ) ) {
						foreach ($values[ 'portrait' ] as $key_portrait => $value_portrait ) {
							if (empty($final_values[ 'all' ])) {
								$final_values[ 'all' ] = [];
							}
							$final_values[ 'all' ][ $key_portrait ] = $value_portrait;
						}
					} else if ( isset( $values[ 'all' ] ) ) {
						foreach ($values[ 'all' ] as $key_all => $value_all ) {
							if (empty($final_values[ 'all' ])) {
								$final_values[ 'all' ] = [];
							}
							$final_values[ 'all' ][ $key_all ] = $value_all;
						}
					}



//					if ( isset( $values[ 'phone' ] ) ) {
//						$final_values[ 'phone' ] = $values[ 'phone' ];
//					}

					if ( isset( $values[ 'phone' ] ) ) {
						foreach ($values[ 'phone' ] as $key_phone => $value_phone ) {
							if (empty($final_values[ 'phone' ])) {
								$final_values[ 'phone' ] = [];
							}
							$final_values[ 'phone' ][ $key_phone ] = $value_phone;
						}
					}

					if (!empty($values['phone_max_width'])) {
						$final_values['phone_max_width'] = $values['phone_max_width'];
					}


					$val = base64_encode( json_encode( $final_values ) );
				}

			} else {

				// Detect base64 encoding
				if ( base64_decode( $val, true ) && base64_encode( base64_decode( $val, true ) ) === $val && mb_detect_encoding( base64_decode( $val, true ) ) === mb_detect_encoding( $val ) ) {

					$decoded_values = base64_decode( $val, true );
					$values         = json_decode( $decoded_values, true );

					if ( isset( $values[ 'type' ] ) && 'gradient' === $values[ 'type' ] ) {
						$content .= " $key=\"$val\"";
						continue;
					}

					if ( ! isset( $values[ 'all' ] ) && ! isset( $values[ 'portrait' ] ) && ! isset( $values[ 'phone' ] )) {

						// we have not responsive value encoded - maybe an inline text
						$content .= " $key=\"$val\"";
						continue;
					}

					$final_values = [];

					if ( ! isset( $values[ 'phone' ] ) && isset( $values[ 'all' ] ) ) {
						$final_values[ 'phone' ] = $values[ 'all' ];
					}

					if ( isset( $values[ 'portrait' ] ) ) {
						$final_values[ 'all' ] = $values[ 'portrait' ];
					} else if ( isset( $values[ 'all' ] ) ) {
						$final_values[ 'all' ] = $values[ 'all' ];
					}

					if ( isset( $values[ 'phone' ] ) ) {
						$final_values[ 'phone' ] = $values[ 'phone' ];
					}

					$val = base64_encode( json_encode( $final_values ) );
				}
			}

			$content .= " $key=\"$val\"";
		}
	}


	static function get_api_url($ext = 'api') {
    	$api_url = '';

	    if ( defined('TDB_CLOUD_LOCATION') && TDB_CLOUD_LOCATION === 'local') {
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


    static function get_custom_pagination(
        $current_page,
        $num_pages,
        $url_param,
        $pages_to_show = 3,
        $classes = array(
            'wrapper' => '',
            'item' => '',
            'active' => '',
            'dots' => ''
        )
    ) {

        $buffy = '';


        // Set the start and end pages that need to be displayed
        $pages_to_show_minus_1 = $pages_to_show - 1;
        $half_page_start       = floor($pages_to_show_minus_1/2 );
        $half_page_end         = ceil($pages_to_show_minus_1/2 );
        $start_page            = $current_page - $half_page_start;

        if( $start_page <= 0 ) {
            $start_page = 1;
        }

        $end_page = $current_page + $half_page_end;
        if( ( $end_page - $start_page ) != $pages_to_show_minus_1 ) {
            $end_page = $start_page + $pages_to_show_minus_1;
        }

        if( $end_page > $num_pages ) {
            $start_page = $num_pages - $pages_to_show_minus_1;
            $end_page = $num_pages;
        }

        if( $start_page <= 0 ) {
            $start_page = 1;
        }


        // Build the pagination if the total number of pages is greater than 1
        if( $num_pages > 1 ) {
            $buffy .= '<div class="' . $classes['wrapper'] . '">';
                // Display the previous page link if the current page
                // is greater than the current page
                if( $current_page > 1 ) {
                    $buffy .= '<a href="' . self::get_custom_pagination_page_link( ($current_page - 1), $url_param ) . '" class="' . $classes['item'] . '"><i class="td-icon-left"></i></a>';
                }

                // If the current page number exceeds the maximum number of pages
                // allowed to be displayed, then show the first page and dots placeholder
                if( $start_page >= 2 && $pages_to_show < $num_pages ) {
                    $buffy .= '<a href="' . self::get_custom_pagination_page_link( 1, $url_param ) . '" class="' . $classes['item'] . '">1</a>';

                    if( $start_page > 2 ) {
                        $buffy .= '<span class="' . $classes['item'] . ' ' . $classes['dots'] . '">...</span>';
                    }
                }

                // Display the pages
                for( $page = $start_page; $page <= $end_page; $page++ ) {
                    if( $page == $current_page ) {
                        $buffy .= '<div class="' . $classes['item'] . ' ' . $classes['active'] . '">' . $page . '</div>';
                    } else {
                        $buffy .= '<a href="' . self::get_custom_pagination_page_link( $page, $url_param ) . '" class="' . $classes['item'] . '">' . $page . '</a>';
                    }
                }

                //
                if( $end_page < $num_pages ) {
                    if( $end_page + 1 < $num_pages ) {
                        $buffy .= '<div class="' . $classes['item'] . ' ' . $classes['dots'] . '">...</div>';
                    }

                    $buffy .= '<a href="' . self::get_custom_pagination_page_link( $num_pages, $url_param ) . '" class="' . $classes['item'] . '">' . $num_pages .'</a>';
                }

                // Display the next page link if the current page is not
                // equal to the last page
                if( $current_page < $num_pages ) {
                    $buffy .= '<a href="' . self::get_custom_pagination_page_link( ($current_page + 1), $url_param ) . '" class="' . $classes['item'] . '"><i class="td-icon-right"></i></a>';
                }
            $buffy .= '</div>';
        }

        return $buffy;

    }


    static function get_custom_pagination_page_link( $current_page, $url_param ) {

        return add_query_arg($url_param, $current_page, self::get_current_url());

    }
}
