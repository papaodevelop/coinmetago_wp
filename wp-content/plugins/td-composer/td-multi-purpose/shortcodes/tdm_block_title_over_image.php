<?php
class tdm_block_title_over_image extends td_block {

    protected $shortcode_atts = array(); //the atts used for rendering the current block
    private $unique_block_class;

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
                
                /* @style_general_title_over_image */
                .tds-title-over-image {
                  overflow: hidden;
                }
                .tds-title-over-image1 {
                  position: relative;
                  height: 0;
                  padding-bottom: 400px;
                  background-color: #f9f9f9;
                }
                .tds-title-over-image1 .tdm-title-over-image-info-wrap {
                  width: 100%;
                  padding: 24px 32px;
                }
                .tds-title-over-image1 .tdm-title-over-image-info,
                .tds-title-over-image1 .tdm-title-sub {
                  zoom: 1;
                  -webkit-transform: translate(0, 8px);
                  transform: translate(0, 8px);
                  -webkit-transition: all 0.15s 75ms cubic-bezier(0.25, 0.46, 0.45, 0.94);
                  transition: all 0.15s 75ms cubic-bezier(0.25, 0.46, 0.45, 0.94);
                }
                .tds-title-over-image1 .tdm-title {
                  margin: 0;
                }
                .tds-title-over-image1 .tdm-title-xxsm {
                  margin-top: 8px;
                  margin-bottom: 2px;
                }
                .tds-title-over-image1 .tdm-title-xsm {
                  margin-top: 6px;
                  margin-bottom: 1px;
                }
                .tds-title-over-image1 .tdm-title-sm {
                  margin-top: 4px;
                }
                .tds-title-over-image1 .tdm-title-bg {
                  margin-bottom: 12px;
                  line-height: 50px;
                }
                .tds-title-over-image1 .tdm-title-sub {
                  color: #555;
                  opacity: 0;
                }
                .tds-title-over-image1 .tdm-title-over-image-link {
                  display: block;
                  position: absolute;
                  top: 0;
                  left: 0;
                  width: 100%;
                  height: 100%;
                }
                .tds-title-over-image1 .tdm-title-over-image-overlay:before,
                .tds-title-over-image1 .tdm-title-over-image-overlay:after {
                  content: '';
                  position: absolute;
                  top: 0;
                  left: 0;
                  width: 100%;
                  height: 100%;
                  z-index: -1;
                  -webkit-transition: all 0.3s 0.1s cubic-bezier(0.455, 0.03, 0.515, 0.955);
                  transition: all 0.3s 0.1s cubic-bezier(0.455, 0.03, 0.515, 0.955);
                }
                .tds-title-over-image1 .tdm-title-over-image-overlay:after {
                  opacity: 0;
                }
                .tds-title-over-image1:hover .tdm-title-over-image-info,
                .tds-title-over-image1:hover .tdm-title-sub {
                  -webkit-transform: translate(0, 0);
                  transform: translate(0, 0);
                  -webkit-transition: all 0.3s 0.1s cubic-bezier(0.455, 0.03, 0.515, 0.955);
                  transition: all 0.3s 0.1s cubic-bezier(0.455, 0.03, 0.515, 0.955);
                }
                .tds-title-over-image1:hover .tdm-title-sub,
                .tds-title-over-image1:hover .tdm-title-over-image-overlay:after {
                  opacity: 1;
                }
                .tdm_block_title_over_image.tdm-content-vert-center .tds-title-over-image1 .tdm-title-over-image-info-wrap {
                  position: absolute;
                  top: calc(50% - 8px);
                  -webkit-transform: translateY(calc(-50% + 8px));
                  transform: translateY(calc(-50% + 8px));
                }
                .tdm_block_title_over_image.tdm-content-vert-bottom .tds-title-over-image1 .tdm-title-over-image-info-wrap {
                  position: absolute;
                  bottom: 0;
                }

				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {
        $res_ctx->load_settings_raw( 'style_general_title_over_image', 1 );
    }

	function render($atts, $content = null) {
		parent::render($atts);

        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $this->unique_block_class = $this->block_uid;

		$this->shortcode_atts = shortcode_atts(
			array_merge(
				td_api_multi_purpose::get_mapped_atts( __CLASS__ ),
                td_api_style::get_style_group_params( 'tds_title_over_image' ))
			, $atts);

		$content_align_horizontal = $this->get_shortcode_att( 'content_align_horizontal' );
        $content_align_vertical = $this->get_shortcode_att('content_align_vertical');

		$additional_classes = array();

		// content align horizontal
        if ( ! empty( $content_align_horizontal ) ) {
            $additional_classes[] = 'tdm-' . $content_align_horizontal;
        }

        // text align vertical
        if ( ! empty($content_align_vertical ) ) {
            $additional_classes[] = 'tdm-' . $content_align_vertical;
        }

		$buffy = '';

		$buffy .= '<div class="tdm_block ' . $this->get_block_classes($additional_classes) . '" ' . $this->get_block_html_atts() . '>';
            //get the block css
            $buffy .= $this->get_block_css();

            $buffy .= '<div class="td-block-row">';
                $buffy .= '<div class="td-block-span12 tdm-col">';
                    // Get tds_title_over_image
                    $tds_title_over_image = $this->get_shortcode_att('tds_title_over_image');
                    if ( empty( $tds_title_over_image ) ) {
                        $tds_title_over_image = td_util::get_option( 'tds_title_over_image', 'tds_title_over_image1' );
                    }
                    $tds_title_over_image_instance = new $tds_title_over_image( $this->shortcode_atts, $this->unique_block_class );

                    $buffy .= $tds_title_over_image_instance->render();
                $buffy .= '</div>';
            $buffy .= '</div>';

		$buffy .= '</div>';

		return $buffy;
	}
}