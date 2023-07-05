<?php

/**
 * Class td_single_date
 */

class tdb_mobile_menu extends td_block {

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
                
                /* @style_general_mobile_menu */
                .tdb_mobile_menu {
                  margin-bottom: 0;
                  clear: none;
                }
                .tdb_mobile_menu a {
                  display: inline-block !important;
                  position: relative;
                  text-align: center;
                  color: #4db2ec;
                }
                .tdb_mobile_menu a > span {
                  display: flex;
                  align-items: center;
                  justify-content: center;
                }
                .tdb_mobile_menu svg {
                  height: auto;
                }
                .tdb_mobile_menu svg,
                .tdb_mobile_menu svg * {
                  fill: #4db2ec;
                }
                #tdc-live-iframe .tdb_mobile_menu a {
                  pointer-events: none;
                }
                .td-menu-mob-open-menu {
                  overflow: hidden;
                }
                .td-menu-mob-open-menu #td-outer-wrap {
                  position: static;
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
                    text-align: center;
                }
                /* @align_horiz_right */
                .$unique_block_class .tdb-block-inner {
                    text-align: right;
                }
                
                /* @icon_size */
                .$unique_block_class .tdb-mobile-menu-button i {
                    font-size: @icon_size;
                }
                /* @svg_size */
                .$unique_block_class .tdb-mobile-menu-button svg {
                    width: @svg_size;
                }
                /* @icon_padding */
                .$unique_block_class .tdb-mobile-menu-button i {
                    width: @icon_padding;
					height: @icon_padding;
					line-height:  @icon_padding;
                }
                /* @icon_svg_padding */
                .$unique_block_class .tdb-mobile-menu-button .tdb-mobile-menu-icon-svg {
                    width: @icon_svg_padding;
					height: @icon_svg_padding;
                }
                
                
                /* @icon_color */
                .$unique_block_class .tdb-mobile-menu-button {
                    color: @icon_color;
                }
                .$unique_block_class .tdb-mobile-menu-button svg,
                .$unique_block_class .tdb-mobile-menu-button svg * {
                    fill: @icon_color;
                }
                /* @icon_color_h */
                .$unique_block_class .tdb-mobile-menu-button:hover {
                    color: @icon_color_h;
                }
                .$unique_block_class .tdb-mobile-menu-button:hover svg,
                .$unique_block_class .tdb-mobile-menu-button:hover svg * {
                    fill: @icon_color_h;
                }
                
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'style_general_mobile_menu', 1 );
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



        /*-- ICON -- */
        $icon = $res_ctx->get_icon_att( 'tdicon' );
        // icon size
        $icon_size = $res_ctx->get_shortcode_att('icon_size');
        $res_ctx->load_settings_raw( 'icon_size', $icon_size . 'px');
        if( base64_encode( base64_decode( $icon ) ) == $icon ) {
            $res_ctx->load_settings_raw( 'svg_size', $icon_size . 'px' );
        }
        // icon padding
        $res_ctx->load_settings_raw('icon_padding', $icon_size * $res_ctx->get_shortcode_att('icon_padding') . 'px');
        if( base64_encode( base64_decode( $icon ) ) == $icon ) {
            $res_ctx->load_settings_raw('icon_svg_padding', $icon_size * $res_ctx->get_shortcode_att('icon_padding') . 'px');
        }



        /*-- COLORS -- */
        $res_ctx->load_settings_raw('icon_color', $res_ctx->get_shortcode_att('icon_color'));
        $res_ctx->load_settings_raw('icon_color_h', $res_ctx->get_shortcode_att('icon_color_h'));

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

            // icon
            $icon = $this->get_icon_att('tdicon');
            $tdicon_data = '';
            if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
                $tdicon_data = 'data-td-svg-icon="' . $this->get_att('tdicon') . '"';
            }
            $icon_html = '';
            if( $icon == '' ) {
                $icon_html = '<i class="tdb-mobile-menu-icon td-icon-mobile"></i>';
            } else {
                if( base64_encode( base64_decode( $icon ) ) == $icon ) {
                    $icon_html = '<span class="tdb-mobile-menu-icon tdb-mobile-menu-icon-svg" ' . $tdicon_data . '>' . base64_decode( $icon ) . '</span>';
                } else {
                    $icon_html = '<i class="tdb-mobile-menu-icon ' . $icon . '"></i>';
                }
            }


            //get the block css
            $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();


            $buffy .= '<div class="tdb-block-inner td-fix-index">';

                $buffy .= '<span class="tdb-mobile-menu-button">' . $icon_html . '</span>';

            $buffy .= '</div>';

        $buffy .= '</div> <!-- ./block -->';

        return $buffy;
    }

}