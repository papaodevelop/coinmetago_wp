<?php
class tdm_block_call_to_action extends td_block {

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
                
                /* @style_general_call_to_action */
                @media (min-width: 768px) and (max-width: 1018px) {
                  .tdm_block_call_to_action .td-block-span9 {
                    width: 66.66666667%;
                  }
                  .tdm_block_call_to_action .td-block-span3 {
                    width: 33.33333333%;
                  }
                }
                @media (max-width: 767px) {
                  .tdm_block_call_to_action .td-block-span9 {
                    margin-bottom: 20px;
                  }
                }
                .tdm_block_call_to_action .tdm-title {
                  margin: 9px 0 10px 0;
                }
                .tdm_block_call_to_action .tdm-descr {
                  margin-bottom: 0;
                }
                .tdm_block_call_to_action .tds-title + .tdm-descr {
                  margin-bottom: 14px;
                }
                @media (min-width: 767px) {
                  .tdm_block_call_to_action .tds-button {
                    text-align: right !important;
                  }
                  .tdm_block_call_to_action.tdm-flip-yes .tds-button {
                    text-align: left !important;
                  }
                }
                .tdm_block_call_to_action .tdm-btn {
                  margin-top: 0;
                  max-width: 100%;
                  overflow: hidden;
                }
                .tdm_block_call_to_action .tdm-btn .tdm-btn-text {
                  text-overflow: ellipsis;
                  overflow: hidden;
                  max-width: 100%;
                  display: inline-block;
                  white-space: nowrap;
                }
                .tdm_block_call_to_action.tds_call_to_action2 {
                  padding: 13px 22px;
                }
				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {
        $res_ctx->load_settings_raw( 'style_general_call_to_action', 1 );
    }

    function render($atts, $content = null) {
        parent::render($atts);

        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $this->unique_block_class = $this->block_uid;

        $this->shortcode_atts = shortcode_atts(
			array_merge(
				td_api_multi_purpose::get_mapped_atts( __CLASS__ ),
                td_api_style::get_style_group_params( 'tds_call_to_action' ),
                td_api_style::get_style_group_params( 'tds_title' ),
                td_api_style::get_style_group_params( 'tds_button' ))
			, $atts);

        $class_style = $this->get_shortcode_att( 'tds_call_to_action' );
	    $content_align_horizontal = $this->get_shortcode_att( 'content_align_horizontal' );
        $content_align_vertical = $this->get_shortcode_att('content_align_vertical');
        $flip_content = $this->get_shortcode_att( 'flip_content' );

        $additional_classes = array();

        // class style
        if ( !empty( $class_style ) ) {
            $additional_classes[] = $class_style;
        }

        // flip-content
        if ( !empty( $flip_content ) ) {
            $additional_classes[] = 'tdm-flip-' . $flip_content;
        }

        // content align horizontal
        if ( !empty( $content_align_horizontal ) ) {
            $additional_classes[] = 'tdm-' . $content_align_horizontal;
        }

        // text align vertical
        if ( !empty($content_align_vertical ) ) {
            $additional_classes[] = 'tdm-' . $content_align_vertical;
        }


        $buffy = '';

        $buffy .= '<div class="tdm_block ' . $this->get_block_classes($additional_classes) . '" ' . $this->get_block_html_atts() . '>';

            //get the block css
            $buffy .= $this->get_block_css();

            // Get tds_call_to_action
            $tds_call_to_action = $this->get_shortcode_att('tds_call_to_action');
            if ( empty( $tds_call_to_action ) ) {
                $tds_call_to_action = td_util::get_option( 'tds_call_to_action', 'tds_call_to_action1' );
            }
            $tds_call_to_action_instance = new $tds_call_to_action( $this->shortcode_atts, $this->unique_block_class );
            $buffy .= $tds_call_to_action_instance->render();

        $buffy .= '</div>';


        return $buffy;
    }
}