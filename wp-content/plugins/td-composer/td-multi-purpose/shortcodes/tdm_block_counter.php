<?php
class tdm_block_counter extends td_block {

    protected $shortcode_atts = array(); //the atts used for rendering the current block

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
                
                /* @style_general_counter */
                .tdm-counter-wrap {
                  font-family: 'Roboto', sans-serif;
                }
                .tdm-counter-wrap .tdm-counter-title {
                  margin-top: 13px;
                  font-size: 20px;
                  font-weight: 500;
                  line-height: 21px;
                  color: #666;
                }
                .tdm-counter-wrap .tdm-counter-number {
                  font-size: 58px;
                  font-weight: 700;
                  line-height: 58px;
                }
                .tds-counter2 .tdm-counter-number {
                  display: inline-table;
                  width: 200px;
                  height: 100px;
                  padding: 20px 20px 0;
                  border-top-left-radius: 100px;
                  border-top-right-radius: 100px;
                  border: 10px solid #4db2ec;
                  border-bottom: 0;
                }
                .tds-counter2 .tdm-counter-number span {
                  display: table-cell;
                  vertical-align: bottom;
                }

			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {
        $res_ctx->load_settings_raw( 'style_general_counter', 1 );
    }

    function render($atts, $content = null) {
        parent::render($atts);

        $this->shortcode_atts = shortcode_atts(
            array_merge(
                td_api_multi_purpose::get_mapped_atts( __CLASS__ ),
                td_api_style::get_style_group_params( 'tds_counter' ))
            , $atts);

        $additional_classes = array();

        // content align horizontal
        $content_align_horizontal = $this->get_shortcode_att( 'content_align_horizontal' );
        if( ! empty( $content_align_horizontal ) ) {
            $additional_classes[] = 'tdm-' . $content_align_horizontal;
        }

        $buffy = '';

        $buffy .= '<div class="td_block_mp ' . $this->get_block_classes($additional_classes) . '" ' . $this->get_block_html_atts() . '>';

            //get the block css
            $buffy .= $this->get_block_css();

            // Get tds_counter_style_id
            $tds_tds_counter = $this->get_shortcode_att('tds_counter');
            if ( empty( $tds_tds_counter ) ) {
                $tds_tds_counter = td_util::get_option( 'tds_counter', 'tds_counter1');
            }
            $tds_tds_counter_instance = new $tds_tds_counter( $this->shortcode_atts );
            $buffy .= $tds_tds_counter_instance->render();

        $buffy .= '</div>';

        return $buffy;
    }
}