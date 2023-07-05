<?php
class tdm_block_testimonial extends td_block {

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
                
                /* @style_general_testimonial */
                .tdm_block_testimonial .tdm-testimonial-descr {
                  margin-bottom: 22px;
                  font-size: 15px;
                  line-height: 24px;
                }
                .tdm_block_testimonial .tdm-icon-quote-left {
                  margin-bottom: 6px;
                  font-size: 22px;
                  color: #888;
                }
                .tdm_block_testimonial .tdm-testimonial-image,
                .tdm_block_testimonial .tdm-testimonial-info2 {
                  display: inline-block;
                }
                .tdm_block_testimonial .tdm-testimonial-info {
                  display: inline-table;
                  vertical-align: top;
                }
                .tdm_block_testimonial .tdm-testimonial-info2 {
                  display: table-cell;
                  vertical-align: middle;
                }
                .tdm_block_testimonial .tdm-testimonial-image {
                  position: relative;
                  background-repeat: no-repeat;
                  background-size: cover;
                  background-position: center center;
                }
                .tdm_block_testimonial .tdm-testimonial-name {
                  margin: 0;
                  margin-bottom: -5px;
                  font-size: 20px;
                  line-height: 30px;
                }
                .tdm_block_testimonial .tdm-testimonial-job {
                  font-size: 13px;
                  line-height: 19px;
                  color: #a5a5a5;
                }
                .tdm_block_testimonial .tds-testimonial2 {
                  position: relative;
                }
                .tdm_block_testimonial .tds-testimonial2 .tdm-testimonial-descr {
                  padding-top: 22px;
                }
                .tdm_block_testimonial .tds-testimonial2 .tdm-icon-font {
                  position: absolute;
                  top: 0;
                  left: -10px;
                  font-size: 50px;
                  color: #f4f4f4;
                  z-index: -1;
                }
                .tdm_block_testimonial.tdm-content-horiz-center .tds-testimonial2 .tdm-icon-font {
                  left: 0;
                  right: 0;
                  margin: 0 auto;
                }
                .tdm_block_testimonial.tdm-content-horiz-right .tds-testimonial2 .tdm-icon-font {
                  left: auto;
                  right: -10px;
                }
                .tdm_block_testimonial .tds-testimonial3 .tdm-testimonial-descr {
                  background-color: #f8f8f8;
                  margin-bottom: 25px;
                  padding: 22px;
                  color: #444;
                }
                .tdm_block_testimonial .tds-testimonial3 .tdm-icon-font {
                  display: none;
                }
                .tdm_block_testimonial .tds-testimonial3 .tdm-testimonial-info {
                  position: relative;
                }
                .tdm_block_testimonial .tds-testimonial3 .tdm-testimonial-info:before {
                  content: '';
                  position: absolute;
                  top: -25px;
                  left: 12px;
                  width: 0;
                  height: 0;
                  border-style: solid;
                  border-width: 14px 14px 0 14px;
                  border-color: #F8F8F8 transparent transparent transparent;
                }
                .tdm_block_testimonial .tds-testimonial4 {
                  padding: 22px 24px;
                }
                .tdm_block_testimonial .tds-testimonial4 .tdm-testimonial-image {
                  margin-bottom: 17px;
                }
                .tdm_block_testimonial .tds-testimonial4 .tdm-testimonial-descr {
                  margin-bottom: 14px;
                }
				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {
        $res_ctx->load_settings_raw( 'style_general_testimonial', 1 );
    }

    function render($atts, $content = null) {
        parent::render($atts);

        $this->shortcode_atts = shortcode_atts(
			array_merge(
				td_api_multi_purpose::get_mapped_atts( __CLASS__ ),
                td_api_style::get_style_group_params( 'tds_testimonial' ))
			, $atts);

	    $content_align_horizontal = $this->get_shortcode_att( 'content_align_horizontal' );

        $additional_classes = array();

        // content align horizontal
        if ( ! empty( $content_align_horizontal ) ) {
            $additional_classes[] = 'tdm-' . $content_align_horizontal;
        }


        $buffy = '';

        $buffy .= '<div class="tdm_block ' . $this->get_block_classes($additional_classes) . '" ' . $this->get_block_html_atts() . '>';

            //get the block css
            $buffy .= $this->get_block_css();

            // Get progress_bar_style_id
            $tds_testimonial = $this->get_shortcode_att('tds_testimonial');
            if ( empty( $tds_testimonial ) ) {
                $tds_testimonial = td_util::get_option( 'tds_testimonial', 'tds_testimonial1');
            }
            $tds_testimonial_instance = new $tds_testimonial( $this->shortcode_atts );
            $buffy .= $tds_testimonial_instance->render();

        $buffy .= '</div>';


        return $buffy;
    }
}