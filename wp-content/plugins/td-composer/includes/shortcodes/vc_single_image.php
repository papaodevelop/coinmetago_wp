<?php
/**
 * Created by PhpStorm.
 * User: tagdiv
 * Date: 03.02.2017
 * Time: 16:06
 */

class vc_single_image extends td_block {

	public function get_custom_css() {
        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $unique_block_class = $this->block_uid;
        $unique_block_modal_class = $this->block_uid . '_m';

        $compiled_css = '';

        $raw_css =
            "<style>
                /* @style_general_single_image */
                @media (max-width: 767px) {
                  .td-stretch-content .td_block_single_image {
                    margin-right: -20px;
                    margin-left: -20px;
                  }
                }
                .td_block_single_image.td-image-video-modal {
                  cursor: pointer;
                }
                .td_block_single_image a {
                  display: block;
                }
                .td_block_single_image.td-no-img-custom-url a {
                  pointer-events: none;
                  cursor: default;
                }
                .vc_single_image a {
                  position: relative;
                }
                .td-single-image-style-rounded a,
                .td-single-image-style-rounded a:before,
                .td-single-image-style-rounded a:after {
                  border-radius: 4px;
                }
                .td-single-image-style-border,
                .td-single-image-style-round-border,
                .td-single-image-style-circle-border,
                .td-single-image-style-outline,
                .td-single-image-style-bordered-shadow,
                .td-single-image-style-round-outline,
                .td-single-image-style-round-border-shadow,
                .td-single-image-style-circle-outline,
                .td-single-image-style-circle-border-shadow {
                  margin-bottom: 22px;
                  background-color: #EBEBEB;
                }
                @media (max-width: 767px) {
                  .td-single-image-style-border,
                  .td-single-image-style-round-border,
                  .td-single-image-style-circle-border,
                  .td-single-image-style-outline,
                  .td-single-image-style-bordered-shadow,
                  .td-single-image-style-round-outline,
                  .td-single-image-style-round-border-shadow,
                  .td-single-image-style-circle-outline,
                  .td-single-image-style-circle-border-shadow {
                    margin-bottom: 32px;
                  }
                }
                .td-single-image-style-border,
                .td-single-image-style-round-border,
                .td-single-image-style-circle-border {
                  padding: 6px;
                }
                .td-single-image-style-outline,
                .td-single-image-style-bordered-shadow,
                .td-single-image-style-round-outline,
                .td-single-image-style-round-border-shadow,
                .td-single-image-style-circle-outline,
                .td-single-image-style-circle-border-shadow {
                  padding: 1px;
                }
                .td-single-image-style-outline a:before,
                .td-single-image-style-bordered-shadow a:before,
                .td-single-image-style-round-outline a:before,
                .td-single-image-style-round-border-shadow a:before,
                .td-single-image-style-circle-outline a:before,
                .td-single-image-style-circle-border-shadow a:before,
                .td-single-image-style-outline a:after,
                .td-single-image-style-bordered-shadow a:after,
                .td-single-image-style-round-outline a:after,
                .td-single-image-style-round-border-shadow a:after,
                .td-single-image-style-circle-outline a:after,
                .td-single-image-style-circle-border-shadow a:after {
                  content: '';
                  position: absolute;
                  top: 0;
                  left: 0;
                  width: 100%;
                  height: 100%;
                }
                .td-single-image-style-outline a:after,
                .td-single-image-style-bordered-shadow a:after,
                .td-single-image-style-round-outline a:after,
                .td-single-image-style-round-border-shadow a:after,
                .td-single-image-style-circle-outline a:after,
                .td-single-image-style-circle-border-shadow a:after {
                  color: #fff;
                  -webkit-box-shadow: inset 0px 0px 0px 6px;
                  box-shadow: inset 0px 0px 0px 6px;
                }
                .td-single-image-style-outline a:before,
                .td-single-image-style-bordered-shadow a:before,
                .td-single-image-style-round-outline a:before,
                .td-single-image-style-round-border-shadow a:before,
                .td-single-image-style-circle-outline a:before,
                .td-single-image-style-circle-border-shadow a:before {
                  color: #EBEBEB;
                  -webkit-box-shadow: inset 0px 0px 0px 7px;
                  box-shadow: inset 0px 0px 0px 7px;
                }
                .td-single-image-style-shadow a,
                .td-single-image-style-bordered-shadow a,
                .td-single-image-style-round-shadow a,
                .td-single-image-style-round-border-shadow a,
                .td-single-image-style-circle-shadow a,
                .td-single-image-style-circle-border-shadow a {
                  -webkit-box-shadow: 0 0 6px rgba(0, 0, 0, 0.1);
                  box-shadow: 0 0 6px rgba(0, 0, 0, 0.1);
                }
                .td-single-image-style-3d-shadow {
                  position: relative;
                }
                .td-single-image-style-3d-shadow:before,
                .td-single-image-style-3d-shadow:after {
                  content: '';
                  position: absolute;
                  bottom: 0;
                  height: 30%;
                  -webkit-box-shadow: 0 15px 10px rgba(0, 0, 0, 0.6);
                  box-shadow: 0 15px 10px rgba(0, 0, 0, 0.6);
                  z-index: 0;
                }
                .td-single-image-style-3d-shadow:before {
                  left: 5px;
                  right: 50%;
                  -webkit-transform: skewY(-6deg);
                  transform: skewY(-6deg);
                  -webkit-transform-origin: 0 0;
                  transform-origin: 0 0;
                }
                .td-single-image-style-3d-shadow:after {
                  left: 50%;
                  right: 5px;
                  -webkit-transform: skewY(6deg);
                  transform: skewY(6deg);
                  -webkit-transform-origin: 100% 0;
                  transform-origin: 100% 0;
                }
                .td-single-image-style-3d-shadow a {
                  z-index: 1;
                }
                .td-single-image-style-round,
                .td-single-image-style-round-border,
                .td-single-image-style-round-outline,
                .td-single-image-style-round-shadow,
                .td-single-image-style-round-border-shadow,
                .td-single-image-style-circle,
                .td-single-image-style-circle-border,
                .td-single-image-style-circle-outline,
                .td-single-image-style-circle-shadow,
                .td-single-image-style-circle-border-shadow {
                  border-radius: 50%;
                }
                .td-single-image-style-round a,
                .td-single-image-style-round-border a,
                .td-single-image-style-round-outline a,
                .td-single-image-style-round-shadow a,
                .td-single-image-style-round-border-shadow a,
                .td-single-image-style-circle a,
                .td-single-image-style-circle-border a,
                .td-single-image-style-circle-outline a,
                .td-single-image-style-circle-shadow a,
                .td-single-image-style-circle-border-shadow a,
                .td-single-image-style-round a:before,
                .td-single-image-style-round-border a:before,
                .td-single-image-style-round-outline a:before,
                .td-single-image-style-round-shadow a:before,
                .td-single-image-style-round-border-shadow a:before,
                .td-single-image-style-circle a:before,
                .td-single-image-style-circle-border a:before,
                .td-single-image-style-circle-outline a:before,
                .td-single-image-style-circle-shadow a:before,
                .td-single-image-style-circle-border-shadow a:before,
                .td-single-image-style-round a:after,
                .td-single-image-style-round-border a:after,
                .td-single-image-style-round-outline a:after,
                .td-single-image-style-round-shadow a:after,
                .td-single-image-style-round-border-shadow a:after,
                .td-single-image-style-circle a:after,
                .td-single-image-style-circle-border a:after,
                .td-single-image-style-circle-outline a:after,
                .td-single-image-style-circle-shadow a:after,
                .td-single-image-style-circle-border-shadow a:after {
                  border-radius: 50%;
                }
                .td-single-image-style-round-outline a:before,
                .td-single-image-style-round-border-shadow a:before,
                .td-single-image-style-circle-outline a:before,
                .td-single-image-style-circle-border-shadow a:before,
                .td-single-image-style-round-outline a:before:before,
                .td-single-image-style-round-border-shadow a:before:before,
                .td-single-image-style-circle-outline a:before:before,
                .td-single-image-style-circle-border-shadow a:before:before,
                .td-single-image-style-round-outline a:after:before,
                .td-single-image-style-round-border-shadow a:after:before,
                .td-single-image-style-circle-outline a:after:before,
                .td-single-image-style-circle-border-shadow a:after:before,
                .td-single-image-style-round-outline a:after,
                .td-single-image-style-round-border-shadow a:after,
                .td-single-image-style-circle-outline a:after,
                .td-single-image-style-circle-border-shadow a:after,
                .td-single-image-style-round-outline a:before:after,
                .td-single-image-style-round-border-shadow a:before:after,
                .td-single-image-style-circle-outline a:before:after,
                .td-single-image-style-circle-border-shadow a:before:after,
                .td-single-image-style-round-outline a:after:after,
                .td-single-image-style-round-border-shadow a:after:after,
                .td-single-image-style-circle-outline a:after:after,
                .td-single-image-style-circle-border-shadow a:after:after {
                  border-radius: 50%;
                }
                .td-single-image-style-circle a,
                .td-single-image-style-circle-border a,
                .td-single-image-style-circle-outline a,
                .td-single-image-style-circle-shadow a,
                .td-single-image-style-circle-border-shadow a {
                  height: 0;
                  padding-bottom: 100%;
                }
                .vc_single_image a {
                  width: 100%;
                  display: block;
                  background-size: cover;
                }
                
                /* @global */
				.$unique_block_class .td_single_image_bg {
				    z-index: 1;
				}
				/* @overlay */
				.$unique_block_class a:after {
				    content: '';
				    position: absolute;
				    top: 0;
				    left: 0;
				    width: 100%;
				    height: 100%;
				    background-color: @overlay;
				}
				/* @overlay_gradient */
				.$unique_block_class a:after {
				    content: '';
				    position: absolute;
				    top: 0;
				    left: 0;
				    width: 100%;
				    height: 100%;
				    @overlay_gradient
				}

				/* @height */
				.$unique_block_class .td_single_image_bg {
					height: @height;
					padding-bottom: 0;
				}
				/* @padding */
				.$unique_block_class .td_single_image_bg {
					height: auto;
					padding-bottom: @padding;
				}
				/* @width */
				.$unique_block_class {
					width: @width;
				}
				/* @display_inline */
				.$unique_block_class {
					display: inline-block;
				}
				/* @size */
				.$unique_block_class .td_single_image_bg {
				background-size: @size;
				}
				/* @repeat */
				.$unique_block_class .td_single_image_bg {
                background-repeat: @repeat;
				}
				/* @alignment */
				.$unique_block_class .td_single_image_bg {
                background-position: center @alignment;
				}
				/* @mix_type */
                .$unique_block_class .td_single_image_bg:before {
                    content: '';
                    width: 100%;
                    height: 100%;
                    position: absolute;
                    opacity: 1;
                    transition: opacity 1s ease;
                    -webkit-transition: opacity 1s ease;
                    mix-blend-mode: @mix_type;
                    z-index: 1;
                    top: 0;
                }
                /* @color */
                .$unique_block_class .td_single_image_bg:before {
                    background: @color;
                }
                /* @mix_gradient */
                .$unique_block_class .td_single_image_bg:before {
                    @mix_gradient;
                }
                
                
                /* @mix_type_h */
                @media (min-width: 1141px) {
                    .$unique_block_class .td_single_image_bg:after {
                        content: '';
                        width: 100%;
                        height: 100%;
                        position: absolute;
                        opacity: 0;
                        transition: opacity 1s ease;
                        -webkit-transition: opacity 1s ease;
                        mix-blend-mode: @mix_type_h;
                        z-index: 1;
                        top: 0;
                    }
                    .$unique_block_class:hover .td_single_image_bg:after {
                        opacity: 1;
                    }
                    .$unique_block_class .td_single_image_bg {
                        pointer-events: auto;
                    }
                }
                
                /* @color_h */
                .$unique_block_class .td_single_image_bg:after {
                    background: @color_h;
                }
                /* @mix_gradient_h */
                .$unique_block_class .td_single_image_bg:after {
                    @mix_gradient_h;
                }
                /* @mix_type_off */
                .$unique_block_class:hover .td_single_image_bg:before {
                    opacity: 0;
                }
                    
                /* @effect_on */
                .$unique_block_class .td_single_image_bg {
                    filter: @fe_brightness @fe_contrast @fe_saturate;
                    transition: all 1s ease;
                    -webkit-transition: all 1s ease;
                }
                /* @effect_on_h */
                @media (min-width: 1141px) {
                    .$unique_block_class:hover .td_single_image_bg {
                        filter: @fe_brightness_h @fe_contrast_h @fe_saturate_h;
                    }
                }
                
                
                /* @video_icon_size */
				.$unique_block_class .td-video-play-ico {
					width: @video_icon_size;
					height: @video_icon_size;
					font-size: @video_icon_size;
				}
                /* @video_rec_color */
				#td-video-modal.$unique_block_modal_class .td-vm-rec-title {
				    color: @video_rec_color;
				}
				/* @video_bg_color */
				#td-video-modal.$unique_block_modal_class .td-vm-content-wrap {
				    background-color: @video_bg_color;
				}
				/* @video_bg_gradient */
				#td-video-modal.$unique_block_modal_class .td-vm-content-wrap {
				    @video_bg_gradient
				}
				/* @video_overlay_color */
				#td-video-modal.$unique_block_modal_class .td-vm-overlay {
				    background-color: @video_overlay_color;
				}
				/* @video_overlay_gradient */
				#td-video-modal.$unique_block_modal_class .td-vm-overlay {
				    background-color: @video_overlay_gradient;
				}
				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'style_general_single_image', 1 );

	    // overlay color
        $res_ctx->load_color_settings( 'overlay', 'overlay', 'overlay_gradient', '', '' );

	    // height
	    $height = $res_ctx->get_shortcode_att('height');
	    if( empty( $height )) {
		    $res_ctx->load_settings_raw('height', '400px');
	    } else {
		    if ( is_numeric($height) ) {
			    $res_ctx->load_settings_raw('height', $height . 'px');
		    } else if(strpos($height, '%') == true) {
			    $res_ctx->load_settings_raw('padding', $height);
		    } else {
			    $res_ctx->load_settings_raw('height', $height);
		    }
	    }

	    // width
	    $width = $res_ctx->get_shortcode_att('width');
        if ( is_numeric($width) ) {
            $res_ctx->load_settings_raw('width', $width . 'px');
        } else {
            $res_ctx->load_settings_raw('width', $width);
        }

	    // display inline
	    $res_ctx->load_settings_raw('display_inline', $res_ctx->get_shortcode_att('display_inline'));

        // mix blend
        $mix_type = $res_ctx->get_shortcode_att('mix_type');
        if ( $mix_type != '' ) {
            $res_ctx->load_settings_raw('mix_type', $res_ctx->get_shortcode_att('mix_type'));
        }
        $res_ctx->load_color_settings( 'mix_color', 'color', 'mix_gradient', '', '' );

        $mix_type_h = $res_ctx->get_shortcode_att('mix_type_h');
        if ( $mix_type_h != '' ) {
            $res_ctx->load_settings_raw('mix_type_h', $res_ctx->get_shortcode_att('mix_type_h'));
        } else {
            $res_ctx->load_settings_raw('mix_type_off', 1);
        }
        $res_ctx->load_color_settings( 'mix_color_h', 'color_h', 'mix_gradient_h', '', '' );

        // effects
        $res_ctx->load_settings_raw('fe_brightness', 'brightness(1)');
        $res_ctx->load_settings_raw('fe_contrast', 'contrast(1)');
        $res_ctx->load_settings_raw('fe_saturate', 'saturate(1)');

        $fe_brightness = $res_ctx->get_shortcode_att('fe_brightness');
        if ($fe_brightness != '1') {
            $res_ctx->load_settings_raw('fe_brightness', 'brightness(' . $fe_brightness . ')');
            $res_ctx->load_settings_raw('effect_on', 1);
        }
        $fe_contrast = $res_ctx->get_shortcode_att('fe_contrast');
        if ($fe_contrast != '1') {
            $res_ctx->load_settings_raw('fe_contrast', 'contrast(' . $fe_contrast . ')');
            $res_ctx->load_settings_raw('effect_on', 1);
        }
        $fe_saturate = $res_ctx->get_shortcode_att('fe_saturate');
        if ($fe_saturate != '1') {
            $res_ctx->load_settings_raw('fe_saturate', 'saturate(' . $fe_saturate . ')');
            $res_ctx->load_settings_raw('effect_on', 1);
        }

        // effects hover
        $res_ctx->load_settings_raw('fe_brightness_h', 'brightness(1)');
        $res_ctx->load_settings_raw('fe_contrast_h', 'contrast(1)');
        $res_ctx->load_settings_raw('fe_saturate_h', 'saturate(1)');

        $fe_brightness_h = $res_ctx->get_shortcode_att('fe_brightness_h');
        $fe_contrast_h = $res_ctx->get_shortcode_att('fe_contrast_h');
        $fe_saturate_h = $res_ctx->get_shortcode_att('fe_saturate_h');

        if ($fe_brightness_h != '1') {
            $res_ctx->load_settings_raw('fe_brightness_h', 'brightness(' . $fe_brightness_h . ')');
            $res_ctx->load_settings_raw('effect_on_h', 1);
        }
        if ($fe_contrast_h != '1') {
            $res_ctx->load_settings_raw('fe_contrast_h', 'contrast(' . $fe_contrast_h . ')');
            $res_ctx->load_settings_raw('effect_on_h', 1);
        }
        if ($fe_saturate_h != '1') {
            $res_ctx->load_settings_raw('fe_saturate_h', 'saturate(' . $fe_saturate_h . ')');
            $res_ctx->load_settings_raw('effect_on_h', 1);
        }
        // make hover to work
        if ($fe_brightness_h != '1' || $fe_contrast_h != '1' || $fe_saturate_h != '1') {
            $res_ctx->load_settings_raw('effect_on', 1);
        }
        if ($fe_brightness != '1' || $fe_contrast != '1' || $fe_saturate != '1') {
            $res_ctx->load_settings_raw('effect_on_h', 1);
        }

        // image size
        $image_size = $res_ctx->get_shortcode_att('size');
        $res_ctx->load_settings_raw( 'size', $image_size );

        // image repeat
        $image_repeat = $res_ctx->get_shortcode_att('repeat');
        $res_ctx->load_settings_raw( 'repeat', $image_repeat );
        if ( $image_repeat == '') {
            $res_ctx->load_settings_raw( 'repeat', 'no-repeat' );
        }

        // image alignment
        $image_alignment = $res_ctx->get_shortcode_att('alignment');
        $res_ctx->load_settings_raw( 'alignment', $image_alignment );
        if ( $image_alignment == '') {
            $res_ctx->load_settings_raw( 'alignment', 'center' );
        }

        /*-- VIDEO MODAL -- */
        if( 'Newspaper' === TD_THEME_NAME ) {
            $video_icon_size = $res_ctx->get_shortcode_att('video_icon_size');
            if ( $video_icon_size != '' && is_numeric( $video_icon_size ) ) {
                $res_ctx->load_settings_raw( 'video_icon_size', $video_icon_size . 'px' );
            }
            $res_ctx->load_settings_raw( 'video_rec_color', $res_ctx->get_shortcode_att('video_rec_color') );
            $res_ctx->load_color_settings( 'video_bg', 'video_bg_color', 'video_bg_gradient', '', '' );
            $res_ctx->load_color_settings( 'video_overlay', 'video_overlay_color', 'video_overlay_gradient', '', '' );
        }

    }

	function render($atts, $content = null) {
		parent::render($atts);

		$atts = shortcode_atts(
			array(
				'image' => '',
				'image_width' => '',
				'image_height' => '',
				'image_cf' => '',
				'image_url' => '#',
				'open_in_new_window' => '',
				'height' => '',
				'repeat' => '',
				'size' => '',
				'alignment' => '',
				'style' => '',
				'el_class' => '',
				'ga_event_action' => '',
				'ga_event_category' => '',
				'ga_event_label' => '',
				'fb_pixel_event_name' => '',

                'video_popup' => '',
                'video_url' => '',
                'autoplay_vid' => 'yes',
                'video_rec' => '',
                'video_rec_title' => '',
                'video_rec_color' => '',
                'video_icon_size' => '',
                'video_bg' => '',
                'video_overlay' => ''
			), $atts, 'vc_single_image' );

		//$inline_css = ( (float) $atts['height'] >= 0.0 ) ? ' style="height: ' . esc_attr( $atts['height'] ) . '"' : '';

		$target = '';
		$no_custom_url = '';

		if ( '' !== $atts['open_in_new_window'] ) {
			$target = ' target="_blank" ';
		}

        $tds_animation_stack = td_util::get_option('tds_animation_stack');
        $td_animation_stack = '';
        if ( empty($tds_animation_stack) ) { //lazyload animation is ON
            $td_animation_stack = ' td-animation-stack';
        }

        //set rel attribute on img url
        $td_link_rel = '';
        if ('' !== $this->get_att('url_rel')) {
            $td_link_rel = ' rel="' . $this->get_att('url_rel') . '" ';
        }

        // title atrr
        $title_atrr = '';
        if ( $this->get_att('title_attr') != '' ) {
            $title_atrr = ' title="' . rawurldecode(base64_decode(strip_tags($this->get_att('title_attr')))) . '" ';

        }

        $video_popup = $atts[ 'video_popup' ];
        $video_url = $atts[ 'video_url' ];
		if ( '#' == $atts[ 'image_url' ] || ( '' != $video_popup && '' != $video_url ) ) {
			$no_custom_url = ' td-no-img-custom-url';
		}

		$editing_class = '';
		if (tdc_state::is_live_editor_iframe() || tdc_state::is_live_editor_ajax()) {
			$editing_class = 'tdc-editing-vc_single_image';
		}

		// external image
        $image_external = td_util::get_custom_field_value_from_string($atts['image_cf']);
		if (is_numeric($image_external)) {
            $image_external = wp_get_attachment_image_url($image_external, 'full');
        }

		if ( !empty($atts['image']) || '' !== $image_external ) {
		    if ( '' !== $image_external ) {
                $image_info['url'] = $image_external;
            } else {
                $image_info = tdc_util::get_image($atts);
            }
            /**
             * Google Analytics tracking settings
             */
            $data_ga_event_cat = '';
            $data_ga_event_action = '';
            $data_ga_event_label = '';

            /**
             * FB Pixel tracking settings
             */
            $data_fb_event_name = '';
            $data_fb_event_cotent_name = '';

            /**
             * Video pop-up
             */
            $video_popup_class = '';
            $video_popup_data = '';

            if( $video_popup != '' ) {

                if( $video_url != '' ) {
                    $video_source = td_video_support::detect_video_service($video_url);

                    $autoplay_vid = $atts[ 'autoplay_vid' ];

                    $video_popup_class = 'td-image-video-modal';
                    $video_popup_data = 'data-video-source="' . $video_source . '" data-video-autoplay="' . $autoplay_vid . '" data-video-url="'. esc_url( $video_url ) . '"';

                    $video_rec = '';
                    if( $atts[ 'video_rec' ] != '' ) {
                        $video_rec = rawurldecode( base64_decode( strip_tags( $atts[ 'video_rec' ] ) ) );
                    }
                    $video_rec_title = '';
                    if( $atts[ 'video_rec_title' ] != '' ) {
                        $video_rec_title = $atts[ 'video_rec_title' ];
                    }

                    $video_popup_ad = array(
                        'code' => $video_rec,
                        'title' => $video_rec_title
                    );

                    if( $video_popup_ad['code'] != '' ) {
                        $video_popup_data .= ' data-video-rec="' . base64_encode( json_encode($video_popup_ad) ) . '"';
                    }
                }

            }

            if ( empty( $no_custom_url ) ) {

                // don't add tracking options in td composer
                if ( !tdc_state::is_live_editor_ajax() && !tdc_state::is_live_editor_iframe() ) {
                    $ga_event_category = $this->get_att('ga_event_category');
                    if ( ! empty( $ga_event_category ) ) {
                        $data_ga_event_cat = ' data-ga-event-cat="' . $ga_event_category . '" ';
                    }

                    $ga_event_action = $this->get_att('ga_event_action');
                    if ( ! empty( $ga_event_action ) ) {
                        $data_ga_event_action = ' data-ga-event-action="' . $ga_event_action . '" ';
                    }

                    $ga_event_label = $this->get_att('ga_event_label');
                    if ( ! empty( $ga_event_label ) ) {
                        $data_ga_event_label = ' data-ga-event-label="' . $ga_event_label . '" ';
                    }
                }

                // don't add tracking options in td composer
                if ( !tdc_state::is_live_editor_ajax() && !tdc_state::is_live_editor_iframe() ) {
                    $fb_event_name = $this->get_att('fb_pixel_event_name');
                    if ( ! empty( $fb_event_name ) ) {
                        $data_fb_event_name = ' data-fb-event-name="' . $fb_event_name . '" ';
                    }
                    $fb_event_content_name = $this->get_att('fb_pixel_event_content_name');
                    if ( ! empty( $fb_event_content_name ) ) {
                        $data_fb_event_cotent_name = ' data-fb-event-content-name="' . $fb_event_content_name . '" ';
                    }
                }

            }

			$buffer = '<div class="wpb_wrapper td_block_single_image ' . $this->get_wrapper_class() . $no_custom_url . $td_animation_stack . ' ' . $this->get_block_classes( array(
					$atts['el_class'],
					$editing_class,
					'td-single-image-' . $atts['style']
				) ) . ' ' . $video_popup_class . '" ' . $video_popup_data . ' data-td-block-uid="' . $this->block_uid . '">';
            if( empty( $tds_animation_stack ) && !td_util::tdc_is_live_editor_ajax() && !td_util::tdc_is_live_editor_iframe() && !td_util::is_mobile_theme() && !td_util::is_amp() ) {
                $buffer .= '<a 
			class="td_single_image_bg td-lazy-img" 
			data-type="css_image" 
			data-img-url="' . $image_info['url'] . '"  
			href="' . esc_url($atts['image_url']) . '" ' . $target . $data_ga_event_cat . $data_ga_event_action . $data_ga_event_label . $data_fb_event_name . $data_fb_event_cotent_name . $td_link_rel . $title_atrr . ' >';
                if ($video_popup != '' && $video_url != '') {
                    $buffer .= '<span class="td-video-play-ico"><i class="td-icon-video-thumb-play"></i></span>';
                }
                $buffer .= '</a>';
            } else {
                $buffer .= '<a 
			class="td_single_image_bg" 
			style="background-image: url(\'' . $image_info['url'] . '\');' . '" 
			href="' . esc_url($atts['image_url']) . '" ' . $target . $data_ga_event_cat . $data_ga_event_action . $data_ga_event_label . $data_fb_event_name . $data_fb_event_cotent_name . $td_link_rel . $title_atrr . ' >';
                if ($video_popup != '' && $video_url != '') {
                    $buffer .= '<span class="td-video-play-ico"><i class="td-icon-video-thumb-play"></i></span>';
                }
                $buffer .= '</a>';
            }
			$buffer .= $this->get_block_css() . '</div>';

		} else {
			$info = '';
			if ( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
				$info = td_util::get_block_error('Single Background Image', 'Render failed - no image is selected' );
			}
			$buffer = '<div class="wpb_wrapper td_block_single_image ' . $this->get_wrapper_class() . '">' . $info . '</div>';
		}

		return  $buffer;
	}
}