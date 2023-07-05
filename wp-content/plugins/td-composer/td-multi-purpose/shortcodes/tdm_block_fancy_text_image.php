<?php
class tdm_block_fancy_text_image extends td_block {

	protected $shortcode_atts = array(); //the atts used for rendering the current block
    private $unique_block_class;

    public function get_custom_css() {

        $compiled_css = '';

        $unique_block_class = $this->unique_block_class;

        $raw_css =
            "<style>
                /* @style_general_fancy_text_image */
                .td_block_fancy_text .tdm-fancy-title {
                  font-family: 'Roboto', sans-serif;
                  font-size: 155px;
                  font-weight: bold;
                  line-height: 106px;
                  letter-spacing: -8px;
                  margin-top: -5px;
                  margin-bottom: -60px;
                }
                @media (min-width: 1019px) and (max-width: 1140px) {
                  .td_block_fancy_text .tdm-fancy-title {
                    font-size: 120px;
                    line-height: 80px;
                    letter-spacing: -6px;
                  }
                }
                @media (min-width: 768px) and (max-width: 1018px) {
                  .td_block_fancy_text .tdm-fancy-title {
                    font-size: 98px;
                    line-height: 70px;
                    letter-spacing: -4px;
                  }
                }
                @media (max-width: 767px) {
                  .td_block_fancy_text .tdm-fancy-title {
                    font-size: 72px;
                    line-height: 44px;
                    letter-spacing: -4px;
                    margin-top: 40px;
                    margin-bottom: -76px;
                  }
                }
                .td_block_fancy_text .tdm-fancy-title span {
                  display: block;
                  word-break: break-word;
                  padding: 10px 10px 47px 0;
                }
                .td_block_fancy_text .tdm-fancy-title1 {
                  color: #333;
                }
                .td_block_fancy_text .tdm-fancy-title2 {
                  color: #fff;
                  text-shadow: 2px 8px 27px rgba(0, 0, 0, 0.1);
                  top: -60px;
                  position: relative;
                }
                .td_block_fancy_text .tdm-btn {
                  margin-top: 10px;
                  margin-bottom: 10px;
                }
                @media (max-width: 767px) {
                  .td_block_fancy_text.tdm-flip-yes .tdm-fancy-title,
                  .td_block_fancy_text.tdm-flip-yes .tdm-image {
                    margin-top: 30px;
                  }
                }
                .td_block_fancy_text.tdm-content-horiz-center .tdm-fancy-title span {
                  margin: 0 auto;
                }
                .td_block_fancy_text.tdm-content-horiz-right .tdm-fancy-title span {
                  margin-left: auto;
                }
                

                /* @text1_color_solid */
				body .$unique_block_class .tdm-fancy-title1 {
					color: @text1_color_solid;
				}
				/* @text1_color_gradient */
				body .$unique_block_class .tdm-fancy-title1 {
					@text1_color_gradient
					-webkit-background-clip: text;
					-webkit-text-fill-color: transparent;
				}
				html[class*='ie'] .$unique_block_class .tdm-fancy-title1 {
				    background: none;
					color: @text1_color_gradient_1;
				}
				/* @text2_color_solid */
				body .$unique_block_class .tdm-fancy-title2 {
					color: @text2_color_solid;
				}
				/* @text2_color_gradient */
				body .$unique_block_class .tdm-fancy-title2 {
					@text2_color_gradient
					-webkit-background-clip: text;
					-webkit-text-fill-color: transparent;
				}
				html[class*='ie'] .$unique_block_class .tdm-fancy-title2 {
				    background: none;
					color: @text2_color_gradient_1;
				}
				/* @description_color */
				.$unique_block_class .tdm-descr {
				    color: @description_color;
				}

			    /* @icon_size */
				.$unique_block_class i {
				    font-size: @icon_size;
				    text-align: center;
				}
				/* @icon_spacing */
				.$unique_block_class i {
				    width: @icon_spacing;
				    height: @icon_spacing;
				    line-height: @icon_line_height;
				}
				/*@icon_display */
				.$unique_block_class {
				    display: table;
				}



				/* @f_title1 */
				.$unique_block_class .tdm-fancy-title1 {
					@f_title1
				}
				/* @f_title2 */
				.$unique_block_class .tdm-fancy-title2 {
					@f_title2
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

        $res_ctx->load_settings_raw( 'style_general_fancy_text_image', 1 );

        /*-- DESCRIPTION -- */
        $res_ctx->load_settings_raw( 'description_color', $res_ctx->get_shortcode_att( 'description_color' ) );



        /*-- TITLES -- */
        // Title 1 color
        $res_ctx->load_color_settings( 'text1_color', 'text1_color_solid', 'text1_color_gradient', 'text1_color_gradient_1', '' );
        $res_ctx->load_color_settings( 'text2_color', 'text2_color_solid', 'text2_color_gradient', 'text2_color_gradient_1', '' );



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_title1' );
        $res_ctx->load_font_settings( 'f_title2' );
        $res_ctx->load_font_settings( 'f_descr' );

    }

	function render($atts, $content = null) {
		parent::render($atts);

        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $this->unique_block_class = $this->block_uid;

		$this->shortcode_atts = shortcode_atts(
			array_merge(
				td_api_multi_purpose::get_mapped_atts( __CLASS__ ),
                td_api_style::get_style_group_params( 'tds_button' ))
			, $atts);

		$image = $this->get_shortcode_att( 'image' );
		$title1 = $this->get_shortcode_att( 'title1' );
		$title2 = $this->get_shortcode_att( 'title2' );
		$button_text = $this->get_shortcode_att( 'button_text' );
        $button_icon = $this->get_shortcode_att( 'button_tdicon' );
		$content_align_horizontal = $this->get_shortcode_att( 'content_align_horizontal' );
		$content_align_vertical = $this->get_shortcode_att( 'content_align_vertical' );
		$layout = $this->get_shortcode_att( 'layout' );
		$flip_content = $this->get_shortcode_att( 'flip_content' );
		$title_tag = $this->get_shortcode_att( 'title_tag' );
		$description = rawurldecode( base64_decode( strip_tags( $this->get_shortcode_att( 'description' ) ) ) );

        $image_width_html = '';
        $image_height_html = '';
        if( $image != '' ) {
            $info_img = wp_get_attachment_image_src($image, 'full');
            if (is_array($info_img)) {
                $image_width_html = ' width="' . $info_img[1] . '"';
                $image_height_html = ' height="' . $info_img[2] . '"';
            }
        }
//        var_dump($info_img);
		$additional_classes = array();

        // fancy text
        $additional_classes[] = 'td_block_fancy_text';

        // layout
        if( ! empty( $layout ) ) {
            $additional_classes[] = 'tdm-' . $layout;
        }

        // flip_content
        if ( ! empty( $flip_content ) ) {
            $additional_classes[] = 'tdm-flip-' . $flip_content;
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
		$buffy .= '<div class="tdm_block ' . $this->get_block_classes($additional_classes) . ' tdm-mobile-full" ' . $this->get_block_html_atts() . '>';

            //get the block css
            $buffy .= $this->get_block_css();

            // image
            $buffy_image = '';
            $buffy_image .= '<div class="td-block-span5 tdm-col tdm-col-img">';
            if ( ! empty( $image ) ) {
                $buffy_image .= '<img class="tdm-image" src="' . tdc_util::get_image_or_placeholder($image) . '"' . $image_width_html . $image_height_html . ' title="' . $title1 . '">';
            }
            $buffy_image .= '</div>';


            // text
            $buffy_text ='';
            $buffy_text .= '<div class="td-block-span7 tdm-col">';
                $buffy_text .= '<div class="tdm-text-wrap tdm-text-padding">';
                    $buffy_text .= '<' . $title_tag . ' class="tdm-fancy-title"><span class="tdm-fancy-title1">' . $title1 . '</span><span class="tdm-fancy-title2">' . $title2 . '</span></' . $title_tag . '>';
                    $buffy_text .= '<p class="tdm-descr">' . $description . '</p>';

                    if ( ! empty( $button_text ) || ! empty( $button_icon ) ) {
                        $tds_button = $this->get_shortcode_att('tds_button');
                        if ( empty( $tds_button ) ) {
                            $tds_button = td_util::get_option( 'tds_button', 'tds_button1' );
                        }
                        $tds_button_instance = new $tds_button( $this->shortcode_atts, '', $this->unique_block_class );
                        $buffy_text .= $tds_button_instance->render();
                    }
                $buffy_text .= '</div>';
            $buffy_text .= '</div>';

            $buffy .= '<div class="td-block-width">';
                $buffy .= '<div class="td-block-row tdm-row td-fix-index">';
                    if ( empty( $flip_content) ) {
                        $buffy .= $buffy_image;
                        $buffy .= $buffy_text;
                    } else {
                        $buffy .= $buffy_text;
                        $buffy .= $buffy_image;
                    }
                $buffy .= '</div>';
            $buffy .= '</div>';

		$buffy .= '</div>';


		return $buffy;
	}
}