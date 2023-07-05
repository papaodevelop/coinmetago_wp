<?php

/**
 * Class td_single_date
 */

class tdb_header_date extends td_block {

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
                
                /* @style_general_header_date */
                .tdb_header_date {
                  margin-bottom: 0;
                  clear: none;
                }
                .tdb_header_date .tdb-block-inner {
                  display: flex;
                  align-items: baseline;
                }
                .tdb_header_date .tdb-head-date-txt {
                  font-family: 'Open Sans', 'Open Sans Regular', sans-serif;
                  font-size: 11px;
                  line-height: 1;
                  color: #000;
                }
                
                /* @inline */
                .$unique_block_class {
                    display: inline-block;
                }
                /* @float_right */
                .$unique_block_class {
                    float: right;
                    clear: none;
                }
                /* @align_horiz_center */
                .$unique_block_class .tdb-block-inner {
                    justify-content: center;
                }
                /* @align_horiz_right */
                .$unique_block_class .tdb-block-inner {
                    justify-content: flex-end;
                }
                
                
                /* @date_color */
                .$unique_block_class .tdb-head-date-txt {
                    color: @date_color;
                }
                
                
                /* @f_date */
                .$unique_block_class .tdb-head-date-txt {
                    @f_date
                }
				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'style_general_header_date', 1 );
        $res_ctx->load_settings_raw( 'style_general_header_align', 1 );

        // make inline
        $res_ctx->load_settings_raw('inline', $res_ctx->get_shortcode_att('inline'));
        // align to right
        $res_ctx->load_settings_raw('float_right', $res_ctx->get_shortcode_att('float_right'));
        // horizontal align
        $align_horiz = $res_ctx->get_shortcode_att('align_horiz');
        if( $align_horiz == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw('align_horiz_center', 1);
        } else if( $align_horiz == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw('align_horiz_right', 1);
        }



        /*-- COLORS -- */
        $res_ctx->load_settings_raw('date_color', $res_ctx->get_shortcode_att('date_color'));



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_date' );

    }

    /**
     * Disable loop block features. This block does not use a loop and it doesn't need to run a query.
     */
    function __construct() {
        parent::disable_loop_block_features();
    }


    function render( $atts, $content = null ) {
        parent::render( $atts ); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query)


        $buffy = ''; //output buffer

        $buffy .= '<div class="' . $this->get_block_classes() . ' tdb-header-align" ' . $this->get_block_html_atts() . '>';

            $data_format = $this->get_att('format');
            $date_format_panel = td_util::get_option('tds_data_time_format');
            if ($data_format == '') {
                if( $date_format_panel != '' ) {
                    $data_format = $date_format_panel;
                } else {
                    $data_format = 'l, F j, Y';
                }
            }


            //get the block css
            $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();


            $buffy .= '<div class="tdb-block-inner td-fix-index">';
               
                //Note that composer stripslash pagebuilder content, so we need double backslash for date format to escape
                $buffy .= '<div class="tdb-head-date-txt">' . date_i18n($data_format) . '</div>';

            $buffy .= '</div>';

        $buffy .= '</div> <!-- ./block -->';

        return $buffy;
    }

}
