<?php

/**
 * Class td_single_date
 */

class tdb_mobile_search extends td_block {

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
                
                /* @style_general_mobile_search */
                .tdb_mobile_search {
                  margin-bottom: 0;
                  clear: none;
                }
                .tdb_mobile_search a {
                  display: inline-block !important;
                  position: relative;
                  text-align: center;
                  color: #4db2ec;
                }
                .tdb_mobile_search a > span {
                  display: flex;
                  align-items: center;
                  justify-content: center;
                }
                .tdb_mobile_search svg {
                  height: auto;
                }
                .tdb_mobile_search svg,
                .tdb_mobile_search svg * {
                  fill: #4db2ec;
                }
                #tdc-live-iframe .tdb_mobile_search a {
                  pointer-events: none;
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
                .$unique_block_class .tdb-header-search-button-mob i {
                    font-size: @icon_size;
                }
                /* @svg_size */
                .$unique_block_class .tdb-header-search-button-mob svg {
                    width: @svg_size;
                }
                /* @icon_padding */
                .$unique_block_class .tdb-header-search-button-mob i {
                    width: @icon_padding;
					height: @icon_padding;
					line-height:  @icon_padding;
                }
                /* @icon_svg_padding */
                .$unique_block_class .tdb-header-search-button-mob .tdb-mobile-search-icon-svg {
                    width: @icon_svg_padding;
					height: @icon_svg_padding;
					display: flex;
                    justify-content: center;
                }
                
                
                /* @icon_color */
                .$unique_block_class .tdb-header-search-button-mob {
                    color: @icon_color;
                }
                .$unique_block_class .tdb-header-search-button-mob svg,
                .$unique_block_class .tdb-header-search-button-mob svg * {
                    fill: @icon_color;
                }
                /* @icon_color_h */
                .$unique_block_class .tdb-header-search-button-mob:hover {
                    color: @icon_color_h;
                }
                
                 /* @excl_show */
                .td-search-wrap-mob .td-module-exclusive .td-module-title a:before {
                    display: @excl_show;
                }
                /* @excl_txt */
                .td-search-wrap-mob .td-module-exclusive .td-module-title a:before {
                    content: '@excl_txt';
                }
                /* @excl_margin */
                .td-search-wrap-mob .td-module-exclusive .td-module-title a:before {
                    margin: @excl_margin;
                }
                /* @excl_padd */
                .td-search-wrap-mob .td-module-exclusive .td-module-title a:before {
                    padding: @excl_padd;
                }
                /* @all_excl_border */
                .td-search-wrap-mob .td-module-exclusive .td-module-title a:before {
                    border: @all_excl_border @all_excl_border_style @all_excl_border_color;
                }
                /* @excl_radius */
                .td-search-wrap-mob .td-module-exclusive .td-module-title a:before {
                    border-radius: @excl_radius;
                }
                /* @excl_color */
                .td-search-wrap-mob .td-module-exclusive .td-module-title a:before {
                    color: @excl_color;
                }
                /* @excl_color_h */
                .td-search-wrap-mob .td-module-exclusive:hover .td-module-title a:before {
                    color: @excl_color_h;
                }
                /* @excl_bg */
                .td-search-wrap-mob .td-module-exclusive .td-module-title a:before {
                    background-color: @excl_bg;
                }
                /* @excl_bg_h */
                .td-search-wrap-mob .td-module-exclusive:hover .td-module-title a:before {
                    background-color: @excl_bg_h;
                }
                /* @excl_border_color_h */
                .td-search-wrap-mob .td-module-exclusive:hover .td-module-title a:before {
                    border-color: @excl_border_color_h;
                }
                /* @f_excl */
                .td-search-wrap-mob .td-module-exclusive .td-module-title a:before {
                    @f_excl
                }
                
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'style_general_header_align', 1 );
        $res_ctx->load_settings_raw( 'style_general_mobile_search', 1 );

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

        // exclusive label
        if( !empty( has_filter('td_composer_map_exclusive_label_array', 'td_subscription::add_exclusive_label_settings') ) ) {
            // show exclusive label
            $excl_show = $res_ctx->get_shortcode_att('excl_show');
            $res_ctx->load_settings_raw( 'excl_show', $excl_show );
            if( $excl_show == '' ) {
                $res_ctx->load_settings_raw( 'excl_show', 'inline-block' );
            }

            // exclusive label text
            $res_ctx->load_settings_raw( 'excl_txt', $res_ctx->get_shortcode_att('excl_txt') );

            // exclusive label margin
            $excl_margin = $res_ctx->get_shortcode_att('excl_margin');
            $res_ctx->load_settings_raw( 'excl_margin', $excl_margin );
            if( $excl_margin != '' && is_numeric( $excl_margin ) ) {
                $res_ctx->load_settings_raw( 'excl_margin', $excl_margin . 'px' );
            }

            // exclusive label padding
            $excl_padd = $res_ctx->get_shortcode_att('excl_padd');
            $res_ctx->load_settings_raw( 'excl_padd', $excl_padd );
            if( $excl_padd != '' && is_numeric( $excl_padd ) ) {
                $res_ctx->load_settings_raw( 'excl_padd', $excl_padd . 'px' );
            }

            // exclusive label border size
            $excl_border = $res_ctx->get_shortcode_att('all_excl_border');
            $res_ctx->load_settings_raw( 'all_excl_border', $excl_border );
            if( $excl_border != '' && is_numeric( $excl_border ) ) {
                $res_ctx->load_settings_raw( 'all_excl_border', $excl_border . 'px' );
            }

            // exclusive label border style
            $res_ctx->load_settings_raw( 'all_excl_border_style', $res_ctx->get_shortcode_att('all_excl_border_style') );

            // exclusive label border radius
            $excl_radius = $res_ctx->get_shortcode_att('excl_radius');
            $res_ctx->load_settings_raw( 'excl_radius', $excl_radius );
            if( $excl_radius != '' && is_numeric( $excl_radius ) ) {
                $res_ctx->load_settings_raw( 'excl_radius', $excl_radius . 'px' );
            }


            $res_ctx->load_settings_raw( 'excl_color', $res_ctx->get_shortcode_att('excl_color') );
            $res_ctx->load_settings_raw( 'excl_color_h', $res_ctx->get_shortcode_att('excl_color_h') );
            $res_ctx->load_settings_raw( 'excl_bg', $res_ctx->get_shortcode_att('excl_bg') );
            $res_ctx->load_settings_raw( 'excl_bg_h', $res_ctx->get_shortcode_att('excl_bg_h') );
            $excl_border_color = $res_ctx->get_shortcode_att('all_excl_border_color');
            $res_ctx->load_settings_raw( 'all_excl_border_color', $excl_border_color );
            if( $excl_border_color == '' ) {
                $res_ctx->load_settings_raw( 'all_excl_border_color', '#000' );
            }
            $res_ctx->load_settings_raw( 'excl_border_color_h', $res_ctx->get_shortcode_att('excl_border_color_h') );


            $res_ctx->load_font_settings( 'f_excl' );
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


        $buffy = ''; // output buffer

        $buffy .= '<div class="' . $this->get_block_classes() . ' tdb-header-align" ' . $this->get_block_html_atts() . '>';

            // icon
            $icon = $this->get_icon_att('tdicon');
            $tdicon_data = '';
            if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
                $tdicon_data = 'data-td-svg-icon="' . $this->get_att('tdicon') . '"';
            }
            $icon_html = '';
            if( $icon == '' ) {
                $icon_html = '<i class="tdb-mobile-search-icon td-icon-search"></i>';
            } else {
                if( base64_encode( base64_decode( $icon ) ) == $icon ) {
                    $icon_html = '<span class="tdb-mobile-search-icon tdb-mobile-search-icon-svg" ' . $tdicon_data . '>' . base64_decode( $icon ) . '</span>';
                } else {
                    $icon_html = '<i class="tdb-mobile-search-icon ' . $icon . '"></i>';
                }
            }

            // get the block css
            $buffy .= $this->get_block_css();

            // get the js for this block
            $buffy .= $this->get_block_js();

            // render live_search js, this sets the mobile live search status
            if( $this->get_att('disable_live_search') === 'yes' ) {
	            ob_start();
	            ?>
                <script>
                    /* global jQuery:{} */
                    jQuery().ready( function () {
                        tdAjaxSearch._is_mob_live_search_active = false;
                    });
                </script>
	            <?php
	            td_js_buffer::add_to_footer("\n" . td_util::remove_script_tag( ob_get_clean() ) );
            }

            // we need block atts on ajax for post type exclusion
            if ( $this->get_att('exclude_pages') === 'yes' || $this->get_att('exclude_posts') === 'yes' ) {

                // render the JS
                ob_start();
                ?>
                <script>
                    jQuery().ready(function () {
                        tdAjaxSearch._blockAtts = '<?php echo json_encode($this->get_all_atts(), JSON_UNESCAPED_SLASHES); ?>';
                    });
                </script>
                <?php
                td_js_buffer::add_to_footer("\n" . td_util::remove_script_tag(ob_get_clean()));
            }

            $buffy .= '<div class="tdb-block-inner td-fix-index">';

                $buffy .= '<a class="tdb-header-search-button-mob dropdown-toggle" href="#" role="button" aria-label="Search" data-toggle="dropdown">' . $icon_html . '</a>';

            $buffy .= '</div>';

        $buffy .= '</div> <!-- ./block -->';

        return $buffy;
    }

}