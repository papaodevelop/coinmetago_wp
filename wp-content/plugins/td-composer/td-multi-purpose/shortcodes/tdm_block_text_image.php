<?php
class tdm_block_text_image extends td_block {

    protected $shortcode_atts = array(); //the atts used for rendering the current block
    private $unique_block_class;

    public function get_custom_css() {

        $compiled_css = '';

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

        $raw_css =
            "<style>
                /* @style_general_text_image */
                @media (min-width: 767px) {
                  .tdm_block_text_image.tdm-text-image-extend-img {
                    margin-right: calc((-100vw + 100%) / 2);
                  }
                  .tdm_block_text_image.tdm-text-image-extend-img.tdm-flip-yes {
                    margin-right: 0;
                    margin-left: calc((-100vw + 100%) / 2);
                  }
                  .tdm_block_text_image.tdm-text-image-extend-img.tdm-flip-yes .tdm-col-img {
                    text-align: right;
                  }
                }
                @media (max-width: 767px) {
                  .tdm_block_text_image .tdm-col-img {
                    margin-top: 36px;
                  }
                  .tdm_block_text_image.tdm-flip-yes .tdm-col-img {
                    margin-top: 0;
                    margin-bottom: 15px;
                  }
                }
                .tdm_block_text_image .tdm-text-wrap {
                  padding-top: 20px;
                  padding-bottom: 20px;
                }
                .tdm_block_text_image .tdm-descr {
                  margin-bottom: 0;
                }
                .tdm_block_text_image .tds-button {
                  margin-top: 30px;
                }
                
                /* @description_color */
                .$unique_block_class .tdm-descr {
                    color: @description_color;
                }
                /* @links_color */
                .$unique_block_class .tdm-descr a {
                    color: @links_color;
                }
                
                
                /* @icon_align */
                .$unique_block_class i {
                    position: relative;
                    top: @icon_align;
                }



				/* @f_descr */
				.$unique_block_class .tdm-descr {
					@f_descr
				}

			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->shortcode_atts);

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    /**
     * Callback pe media
     *
     * @param $responsive_context td_res_context
     * @param $atts
     */
    static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'style_general_text_image', 1 );

        // description color
        $res_ctx->load_settings_raw( 'description_color', $res_ctx->get_shortcode_att( 'description_color' ) );
        $res_ctx->load_settings_raw( 'links_color', $res_ctx->get_shortcode_att( 'links_color' ) );

        // button icon vertical align
        $icon_align = $res_ctx->get_shortcode_att( 'icon_align' );
        if ( $icon_align != '0' ) {
            $res_ctx->load_settings_raw( 'icon_align', $icon_align . 'px');
        }



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_descr' );

    }

	function render($atts, $content = null) {
		parent::render($atts);

        $this->unique_block_class = $this->block_uid;

		$this->shortcode_atts = shortcode_atts(
			array_merge(
				td_api_multi_purpose::get_mapped_atts( __CLASS__ ),
                td_api_style::get_style_group_params( 'tds_title' ),
                td_api_style::get_style_group_params( 'tds_button' ))
			, $atts);

		$image = $this->get_shortcode_att( 'image' );
		$button_text = $this->get_shortcode_att( 'button_text' );
		$content_align_horizontal = $this->get_shortcode_att( 'content_align_horizontal' );
		$content_align_vertical = $this->get_shortcode_att( 'content_align_vertical' );
		$layout = $this->get_shortcode_att( 'layout' );
        $extend_image = $this->get_shortcode_att( 'extend_image' );
		$flip_content = $this->get_shortcode_att( 'flip_content' );
		$description = rawurldecode( base64_decode( strip_tags( $this->get_shortcode_att( 'description' ) ) ) );

        $image_url = '';
        $image_width_html = '';
        $image_height_html = '';
        if( $image != '' ) {
            $info_img = wp_get_attachment_image_src($image, 'full');
            if (is_array($info_img)) {
                $image_url = $info_img[0];
                $image_width_html = ' width="' . $info_img[1] . '"';
                $image_height_html = ' height="' . $info_img[2] . '"';
            }
        }

        $image_info = '';
        if ( '' !== $image ) {
            $image_info = tdc_util::get_image($atts);
        }
        $image_title = '';
        if( isset($image_info['title']) && $image_info['title'] !== '' ) {
            $image_title = ' title="' . $image_info['title'] .  '"';
        }
        $image_alt = '';
        if( isset($image_info['alt']) && $image_info['alt'] != '' ) {
            $image_alt = ' alt="' . $image_info['alt'] .  '"';
        }

		$additional_classes = array();

		//lazyload effect
        $tds_animation_stack = td_util::get_option('tds_animation_stack');
        if ( empty($tds_animation_stack) ) { //lazyload animation is ON
            $additional_classes[] = 'td-animation-stack';
        }

        // extend image
        if ( ! empty( $extend_image ) ) {
            $additional_classes[] = 'tdm-text-image-extend-img';
        }

        // flip-content
        if ( ! empty( $flip_content ) ) {
            $additional_classes[] = 'tdm-flip-' . $flip_content;
        }

        // layout
        if ( ! empty( $layout ) ) {
            $additional_classes[] = 'tdm-' . $layout;
        }

        // content align horizontal
        if ( ! empty( $content_align_horizontal ) ) {
            $additional_classes[] = 'tdm-' . $content_align_horizontal;
        }

        // text align vertical
        if ( ! empty( $content_align_vertical ) ) {
            $additional_classes[] = 'tdm-' . $content_align_vertical;
        }


		$buffy = '';
		$buffy .= '<div class="tdm_block ' . $this->get_block_classes($additional_classes) . '" ' . $this->get_block_html_atts() . '>';

            //get the block css
            $buffy .= $this->get_block_css();

            // image
            $buffy_image = '';
            $buffy_image .= '<div class="td-block-span6 tdm-col tdm-col-img">';
                if ( ! empty( $image ) ) {
                    if ( empty( $tds_animation_stack ) && ! td_util::tdc_is_live_editor_ajax() && ! td_util::tdc_is_live_editor_iframe() && !td_util::is_mobile_theme() && !td_util::is_amp() ) {
                        $buffy_image .= '<img class="tdm-image td-fix-index td-lazy-img" data-type="image_tag" data-img-url="' . $image_url . '" ' . $image_title . $image_alt . $image_width_html . $image_height_html . '>';

                    } else {
                        $buffy_image .= '<img class="tdm-image td-fix-index" src="' . tdc_util::get_image_or_placeholder($image) . '" ' . $image_title . $image_alt . $image_width_html . $image_height_html . ' alt="">';
                    }
                }
            $buffy_image .= '</div>';

            // text
            $buffy_text = '';
            $buffy_text .= '<div class="td-block-span6 tdm-col">';
                $buffy_text .= '<div class="tdm-text-wrap tdm-text-padding">';
                    // Get tds_title
                    $tds_title = $this->get_shortcode_att('tds_title');
                    if ( empty( $tds_title ) ) {
                        $tds_title = td_util::get_option( 'tds_title', 'tds_title1' );
                    }
                    $tds_title_instance = new $tds_title( $this->shortcode_atts );
                    $buffy_text .= $tds_title_instance->render();

                    $buffy_text .= '<p class="tdm-descr td-fix-index">' . $description . '</p>';

                    if ( ! empty( $button_text ) ) {
                        // Get tds_button
                        $tds_button = $this->get_shortcode_att('tds_button');
                        if ( empty( $tds_button ) ) {
                            $tds_button = td_util::get_option( 'tds_button', 'tds_button1' );
                        }
                        $tds_button_instance = new $tds_button( $this->shortcode_atts, '', $this->unique_block_class );
                        $buffy_text .= $tds_button_instance->render();
                    }
                $buffy_text .= '</div>';
            $buffy_text .= '</div>';

            $buffy .= '<div class="td-block-width tdm-fix-full">';
                $buffy .= '<div class="td-block-row tdm-row">';
                    if ( empty( $flip_content ) ) {
                        $buffy .= $buffy_text;
                        $buffy .= $buffy_image;
                    } else {
                        $buffy .= $buffy_image;
                        $buffy .= $buffy_text;
                    }
                $buffy .= '</div>';
            $buffy .= '</div>';

		$buffy .= '</div>';


		return $buffy;
	}
}