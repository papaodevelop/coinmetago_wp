<?php
class tdm_block_socials extends td_block {

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
                
                /* @style_general_socials */
                .tdm_block.tdm_block_socials {
                  margin-bottom: 0;
                }
                .tdm-social-wrapper {
                  *zoom: 1;
                }
                .tdm-social-wrapper:before,
                .tdm-social-wrapper:after {
                  display: table;
                  content: '';
                  line-height: 0;
                }
                .tdm-social-wrapper:after {
                  clear: both;
                }
                .tdm-social-item-wrap {
                  display: inline-block;
                }
                .tdm-social-item {
                  position: relative;
                  display: inline-block;
                  vertical-align: middle;
                  -webkit-transition: all 0.2s;
                  transition: all 0.2s;
                  text-align: center;
                  -webkit-transform: translateZ(0);
                  transform: translateZ(0);
                }
                .tdm-social-item i {
                  font-size: 14px;
                  color: #4db2ec;
                  -webkit-transition: all 0.2s;
                  transition: all 0.2s;
                }
                .tdm-social-text {
                  display: none;
                  margin-top: -1px;
                  vertical-align: middle;
                  font-size: 13px;
                  color: #4db2ec;
                  -webkit-transition: all 0.2s;
                  transition: all 0.2s;
                }
                .tdm-social-item-wrap:hover i,
                .tdm-social-item-wrap:hover .tdm-social-text {
                  color: #000;
                }
                .tdm-social-item-wrap:last-child .tdm-social-text {
                  margin-right: 0 !important;
                }

                /* @float_right */
                .$unique_block_class {
                    float: right;
                    clear: none;
                }
				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'style_general_socials', 1 );

        // make inline
        $res_ctx->load_settings_raw('float_right', $res_ctx->get_shortcode_att('float_right'));

    }

    function render($atts, $content = null) {
        parent::render($atts);

        $this->shortcode_atts = shortcode_atts(
            array_merge(
                td_api_multi_purpose::get_mapped_atts( __CLASS__ ),
                td_api_style::get_style_group_params( 'tds_social' ))
            , $atts);

        $content_align_horizontal = $this->get_shortcode_att( 'content_align_horizontal' );
        $display_inline = $this->get_shortcode_att( 'display_inline' );

        $additional_classes = array();

        // display inline
        if( !empty ( $display_inline ) ) {
            $additional_classes[] = 'tdm-inline-block';
        }

        // content align horizontal
        if ( ! empty( $content_align_horizontal ) ) {
            $additional_classes[] = 'tdm-' . $content_align_horizontal;
        }

        $buffy = '';

        $buffy .= '<div class="tdm_block ' . $this->get_block_classes($additional_classes) . '" ' . $this->get_block_html_atts() . '>';

            //get the block css
            $buffy .= $this->get_block_css();

            // Get progress_bar_style_id
            $tds_social = $this->get_shortcode_att('tds_social');
            if ( empty( $tds_social ) ) {
                $tds_social = td_util::get_option( 'tds_social', 'tds_social1');
            }
            $tds_social_instance = new $tds_social( $this->shortcode_atts );
            $buffy .= $tds_social_instance->render();

        $buffy .= '</div>';

        return $buffy;
    }
}
