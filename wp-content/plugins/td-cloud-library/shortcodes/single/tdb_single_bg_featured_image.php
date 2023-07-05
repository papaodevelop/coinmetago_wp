<?php

/**
 * Class td_single_featured_image
 */


class tdb_single_bg_featured_image extends td_block {
    public function get_custom_css() {
        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $in_composer = td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax();
        $in_element = td_global::get_in_element();
        $unique_block_class_prefix = '';
        if( $in_element || $in_composer ) {
            $unique_block_class_prefix = 'tdc-row .';

            if( $in_element && $in_composer ) {
                $unique_block_class_prefix = 'tdc-row-composer .';
            }
        }
        $unique_block_class = $unique_block_class_prefix . $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>

                /* @style_general_bg_featured_image */
                .tdb_single_bg_featured_image {
                  margin-bottom: 26px;
                  overflow: hidden;
                }
                .tdb-featured-image-bg {
                  background-color: #f1f1f1;
                  background-position: center center;
                }
                
                .tdb_single_bg_featured_image .tdb-caption-text {
                  z-index: 1;
                  text-align: left;
                  font-size: 11px;
                  font-style: italic;
                  font-weight: normal;
                  line-height: 17px;
                  color: #444;
                  display: block;
                }
                .tdb_single_bg_featured_image.tdb-content-horiz-center .tdb-caption-text {
                  text-align: center;
                  left: 0;
                  right: 0;
                  margin-left: auto;
                  margin-right: auto;
                }
                .tdb_single_bg_featured_image.tdb-content-horiz-right .tdb-caption-text {
                  text-align: right;
                  left:  auto;
                  right: 0;
                }
                
                /* @hide_img */
                .$unique_block_class {
                    display: none;
                }

                /* @image */
                .$unique_block_class .tdb-featured-image-bg {
                    background: url('@image');
                    background-size: cover;
                    background-repeat: no-repeat;
                }
                /* @image_alignment */
                .$unique_block_class .tdb-featured-image-bg {
                    background-position: center @image_alignment;
                }
                
                 /* @caption_margin */
                .$unique_block_class .tdb-caption-text {
                    margin: @caption_margin;
                }
                /* @caption_padding */
                .$unique_block_class .tdb-caption-text {
                    padding: @caption_padding;
                }
                /* @caption_pos */
                .$unique_block_class .tdb-caption-text {
                    position: absolute;
                    bottom: 0;
                    left: 0;
                }
                /* @caption_color */
                .$unique_block_class .tdb-caption-text {
                    color: @caption_color;
                }
                /* @caption_bg */
                .$unique_block_class .tdb-caption-text {
                    background-color: @caption_bg;
                }
                /* @caption_bg_gradient */
                .$unique_block_class .tdb-caption-text {
                    @caption_bg_gradient
                }
                
                
                /* @block_height */
                .$unique_block_class .tdb-featured-image-bg {
                    padding-bottom: @block_height;
                }
                
                /* @overlay_color */
                .$unique_block_class:after {
                    content: '';
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: @overlay_color;
                }
                /* @overlay_gradient */
                .$unique_block_class:after {
                    content: '';
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    @overlay_gradient
                }
                
                /* @img_circle */
                .$unique_block_class .tdb-featured-image-bg {
                    border-radius: 100%;
                    padding-bottom: 0;
                    height: @img_circle;
                    width: @img_circle;
                }
                .$unique_block_class:after {
                    height: @img_circle;
                    width: @img_circle;
                }
                .$unique_block_class .tdb-featured-image-bg:after,
                .$unique_block_class .tdb-featured-image-bg:before,
                .$unique_block_class:after {
                    position: absolute;
                    border-radius: 100%;
                }
                
                
                /* @img_static */
                html:not(.td-md-is-ios):not(.td-md-is-android)  .$unique_block_class .tdb-featured-image-bg {
                    background-attachment: scroll;
                }
                /* @img_fixed */
                html:not(.td-md-is-ios):not(.td-md-is-android) .$unique_block_class .tdb-featured-image-bg {
                    background-attachment: fixed;
                }
                
                /* @mix_type */
                .$unique_block_class .tdb-featured-image-bg:before {
                    content: '';
                    width: 100%;
                    height: 100%;
                    position: absolute;
                    opacity: 1;
                    transition: opacity 1s ease;
                    -webkit-transition: opacity 1s ease;
                    mix-blend-mode: @mix_type;
                    top: 0;
                    z-index: 1;
                }
                /* @color */
                .$unique_block_class .tdb-featured-image-bg:before {
                    background: @color;
                }
                /* @mix_gradient */
                .$unique_block_class .tdb-featured-image-bg:before {
                    @mix_gradient;
                }
                
                
                /* @mix_type_h */
                @media (min-width: 1141px) {
                    .$unique_block_class .tdb-featured-image-bg:after {
                        content: '';
                        width: 100%;
                        height: 100%;
                        position: absolute;
                        opacity: 0;
                        transition: opacity 1s ease;
                        -webkit-transition: opacity 1s ease;
                        mix-blend-mode: @mix_type_h;
                        top: 0;
                        z-index: 1;
                    }
                    .$unique_block_class:hover .tdb-featured-image-bg:after {
                        opacity: 1;
                    }
                }
                
                /* @color_h */
                .$unique_block_class .tdb-featured-image-bg:after {
                    background: @color_h;
                }
                /* @mix_gradient_h */
                .$unique_block_class .tdb-featured-image-bg:after {
                    @mix_gradient_h;
                }
                /* @mix_type_off */
                .$unique_block_class .tdb-featured-image-bg:hover:before {
                    opacity: 0;
                }
                    
                /* @effect_on */
                .$unique_block_class .tdb-featured-image-bg {
                    filter: @fe_brightness @fe_contrast @fe_saturate;
                    transition: all 1s ease;
                    -webkit-transition: all 1s ease;
                }
                /* @effect_on_h */
                @media (min-width: 1141px) {
                    .$unique_block_class.tdb-featured-image-bg:hover {
                        filter: @fe_brightness_h @fe_contrast_h @fe_saturate_h;
                    }
                }
                    
                </style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'style_general_bg_featured_image', 1 );


        global $tdb_state_single;
        $tdb_image_size = $res_ctx->get_shortcode_att( 'image_size' );
        $post_featured_image = $tdb_state_single->post_bg_featured_image->__invoke($tdb_image_size);

        if( $post_featured_image['featured_image_src'] == '' && $res_ctx->get_shortcode_att('hide_img') == 'yes' ) {
            $res_ctx->load_settings_raw('hide_img', 1);
        }

        // overlay color
        $res_ctx->load_color_settings( 'overlay', 'overlay_color', 'overlay_gradient', '', '' );

        if( $post_featured_image['featured_image_src'] != '' ) {
            // image
            $res_ctx->load_settings_raw('image', $post_featured_image['featured_image_src']);

            // image alignment
            $res_ctx->load_settings_raw( 'image_alignment', $res_ctx->get_shortcode_att('image_alignment') . '%' );

            /*-- CAPTION -- */
            // caption margin
            $caption_margin = $res_ctx->get_shortcode_att( 'caption_margin' );
            $res_ctx->load_settings_raw( 'caption_margin', $caption_margin );
            if( $caption_margin != '' ) {
                if( is_numeric( $caption_margin ) ) {
                    $res_ctx->load_settings_raw( 'caption_margin', $caption_margin . 'px' );
                }
            } else {
                $res_ctx->load_settings_raw( 'caption_margin', '6px 0 0' );
            }

            // caption padding
            $caption_padding = $res_ctx->get_shortcode_att( 'caption_padding' );
            $res_ctx->load_settings_raw( 'caption_padding', $caption_padding );
            if( $caption_padding != '' && is_numeric( $caption_padding ) ) {
                $res_ctx->load_settings_raw( 'caption_padding', $caption_padding . 'px' );
            }

            // caption position
            $caption_position = $res_ctx->get_shortcode_att( 'caption_pos' );
            $res_ctx->load_settings_raw('caption_pos', $caption_position);

            // caption color
            $res_ctx->load_settings_raw( 'caption_color', $res_ctx->get_shortcode_att( 'caption_color' ) );

            // caption background color
            $res_ctx->load_color_settings( 'caption_bg', 'caption_bg', 'caption_bg_gradient', '', '' );

            /*-- END CAPTION -- */

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
        }

        // block height
        $block_height = $res_ctx->get_shortcode_att( 'block_height' );
	    $img_height = $block_height;
        $res_ctx->load_settings_raw( 'block_height', $block_height );
        if( $block_height != '' ) {
            if ( is_numeric( $block_height ) ) {
                $res_ctx->load_settings_raw( 'block_height', $block_height . 'px' );
	            $img_height = $block_height . 'px';
            }
        } else {
            $res_ctx->load_settings_raw( 'block_height', '600px' );
	        $img_height = '600px';
        }

	    /*-- circle image -- */
	    $img_circle = $res_ctx->get_shortcode_att( 'img_circle' );
	    if ($img_circle == true) {
		    $res_ctx->load_settings_raw( 'img_circle', $img_height );
	    }

        //*-- fixed image -- */
        $img_fixed = $res_ctx->get_shortcode_att('img_fixed');
        if( $img_fixed != '' ) {
            $res_ctx->load_settings_raw('img_fixed', 1);
        } else {
            $res_ctx->load_settings_raw('img_static', 1);
        }

    }

    /**
     * Disable loop block features. This block does not use a loop and it doesn't need to run a query.
     */
    function __construct() {
        parent::disable_loop_block_features();
    }


    function render( $atts, $content = null ) {
        parent::render($atts); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query)

        global $tdb_state_single;
        $post_featured_image_data = $tdb_state_single->post_bg_featured_image->__invoke();

        // content align horizontal
        $content_align_horizontal = $this->get_att( 'caption_align_horiz' );
        if( !empty( $content_align_horizontal ) ) {
            $additional_classes[] = 'tdb-' . $content_align_horizontal;
        }

        $hide_caption = $this->get_att( 'hide_caption' );

        $buffy = ''; //output buffer

        $buffy .= '<div class="' . $this->get_block_classes($additional_classes) . '" ' . $this->get_block_html_atts() . '>';

            //get the block css
            $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();

            $alt = '';
            if ( !empty( $post_featured_image_data['alt'] ) ) {
                $alt = 'aria-label="' . $post_featured_image_data['alt'] . '"';
            }

            $buffy .= '<div class="tdb-featured-image-bg" ' . $alt . '></div>';
            //show caption
            if ( $post_featured_image_data['caption'] != '' && $hide_caption != 'yes') {
                $buffy .= '<span class="tdb-caption-text">' . $post_featured_image_data['caption'] . '</span>';
            }

        $buffy .= '</div>';

        return $buffy;
    }

}