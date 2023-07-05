<?php

/**
 * Class td_single_post_views
 */

class tdb_single_reading_time extends td_block {

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

                /* @style_general_reading_time */
                .tdb_single_reading_time {
                    line-height: 30px;
                    white-space: nowrap;
                }
                .tdb_single_reading_time svg,
                .tdb_single_reading_time svg * {
                  fill: #444;
                }
                
                
                /* @make_inline */
                .$unique_block_class {
                    display: inline-block;
                }
                /* @float_right */
                .$unique_block_class {
                  float: right;
                }
                
                /* @align_horiz_center */
                .$unique_block_class .tdb-block-inner {
                    text-align: center;
                }
                /* @align_horiz_right */
                .$unique_block_class .tdb-block-inner {
                    text-align: right;
                }
                
                /* @add_text_space_right */
                .$unique_block_class .tdb-add-text {
                    margin-right: @add_text_space_right;
                }
                /* @add_text_space_left */
                .$unique_block_class .tdb-add-text {
                    margin-left: @add_text_space_left;
                }
                
                /* @icon_size */
                .$unique_block_class i {
                    font-size: @icon_size;
                }
                /* @icon_svg_size */
                .$unique_block_class svg {
                    width: @icon_svg_size;
                }
                /* @icon_space */
                .$unique_block_class .tdb-views-icon {
                    margin-right: @icon_space;
                }
                /* @icon_align */
                .$unique_block_class .tdb-views-icon {
                    position: relative;
                    top: @icon_align;
                }
                
                
                
                /* @add_text_color */
                .$unique_block_class .tdb-add-text {
                    color: @add_text_color;
                }
                
                /* @read_time_color */
                .$unique_block_class {
                    color: @read_time_color;
                }
                .$unique_block_class svg,
                .$unique_block_class svg * {
                    fill: @read_time_color;
                }
                
                /* @icon_color */
                .$unique_block_class i {
                    color: @icon_color;
                }
                .$unique_block_class svg,
                .$unique_block_class svg * {
                    fill: @icon_color;
                }
                
                
                
                /* @f_views */
                .$unique_block_class {
                    @f_views
                }
                /* @f_add_txt */
                .$unique_block_class .tdb-add-text {
                    @f_add_txt
                }
                
            </style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'style_general_post_meta', 1 );
        $res_ctx->load_settings_raw( 'style_general_reading_time', 1 );



        /*-- LAYOUT -- */
        // display inline
        $res_ctx->load_settings_raw( 'make_inline', $res_ctx->get_shortcode_att('make_inline') );

        // float right
        $res_ctx->load_settings_raw( 'float_right', $res_ctx->get_shortcode_att('float_right') );

        // horizontal align
        $horiz_align = $res_ctx->get_shortcode_att('align_horiz');
        if( $horiz_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'align_horiz_center', 1 );
        } else if ( $horiz_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'align_horiz_right', 1 );
        }


        // additional text space
        $add_text_pos = $res_ctx->get_shortcode_att( 'add_text_pos' );
        $add_text_space = $res_ctx->get_shortcode_att( 'add_text_space' );
        if( $add_text_pos == '' ) {
            $res_ctx->load_settings_raw( 'add_text_space_right', $add_text_space );
            if( $add_text_space != '' && is_numeric( $add_text_space ) ) {
                $res_ctx->load_settings_raw( 'add_text_space_right', $add_text_space . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'add_text_space_left', $add_text_space );
            if( $add_text_space != '' && is_numeric( $add_text_space ) ) {
                $res_ctx->load_settings_raw( 'add_text_space_left', $add_text_space . 'px' );
            }
        }


        // icon size
        $icon = $res_ctx->get_icon_att('tdicon');
        $icon_size = $res_ctx->get_shortcode_att('icon_size');
        if( base64_encode( base64_decode( $icon ) ) == $icon ) {
            $res_ctx->load_settings_raw( 'icon_size', $icon_size );
            if( $icon_size != '' ) {
                if( is_numeric( $icon_size ) ) {
                    $res_ctx->load_settings_raw( 'icon_svg_size', $icon_size . 'px' );
                }
            } else {
                $res_ctx->load_settings_raw( 'icon_svg_size', '14px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'icon_size', $icon_size );
            if( $icon_size != '' ) {
                if( is_numeric( $icon_size ) ) {
                    $res_ctx->load_settings_raw( 'icon_size', $icon_size . 'px' );
                }
            } else {
                $res_ctx->load_settings_raw( 'icon_size', '14px' );
            }
        }

        // icon space
        $icon_space = $res_ctx->get_shortcode_att('icon_space');
        $res_ctx->load_settings_raw( 'icon_space', $icon_space );
        if( $icon_space != '' ) {
            if( is_numeric( $icon_space ) ) {
                $res_ctx->load_settings_raw( 'icon_space', $icon_space . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'icon_space', '5px' );
        }

        // icon_align
        $icon_align = $res_ctx->get_shortcode_att('icon_align');
        if ( $icon_align != 0 || !empty($icon_align) ) {
            $res_ctx->load_settings_raw( 'icon_align', $icon_align . 'px' );
        }



        /*-- COLORS -- */
        $res_ctx->load_settings_raw( 'read_time_color', $res_ctx->get_shortcode_att('read_time_color') );
        $res_ctx->load_settings_raw( 'add_text_color', $res_ctx->get_shortcode_att('add_text_color') );
        $res_ctx->load_settings_raw( 'icon_color', $res_ctx->get_shortcode_att('icon_color') );



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_views' );
        $res_ctx->load_font_settings( 'f_add_txt' );

    }

    /**
     * Disable loop block features. This block does not use a loop and it doesn't need to run a query.
     */
    function __construct() {
        parent::disable_loop_block_features();
    }


    function render( $atts, $content = null ) {

        parent::render( $atts ); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query)

        global $tdb_state_single;
        $post_reating_time_data = $tdb_state_single->post_reading_time->__invoke();


        // additional text
        $add_text_pos = $this->get_att( 'add_text_pos' );
        $add_text = $this->get_att( 'add_text' );
        $add_text_html = '';
        if( $add_text != '' ) {
            $add_text_html = '<span class="tdb-add-text">' . $add_text . '</span>';
        }

        // minuts text
        $minute_text = $this->get_att( 'minute_text' );
        $minute_text_html = '<span class="tdb-minute-text"> min.</span>';
        if( $minute_text != '' ) {
            $minute_text_html = '<span class="tdb-minute-text"> ' . $minute_text . '</span>';
        }

        // views icon
        $views_icon = $this->get_icon_att( 'tdicon' );
        $views_icon_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $views_icon_data = 'data-td-svg-icon="' . $this->get_att('tdicon') . '"';
        }
        $views_icon_html = '';
        if ( $views_icon != '' ) {
            if( base64_encode( base64_decode( $views_icon ) ) == $views_icon ) {
                $views_icon_html = '<span class="tdb-views-icon tdb-views-icon-svg" ' . $views_icon_data . '>' . base64_decode( $views_icon ) . '</span>';
            } else {
                $views_icon_html = '<i class="tdb-views-icon ' . $views_icon . '"></i>';
            }
        }


        $buffy = ''; //output buffer

        if( $post_reating_time_data == '' ) {
            return $buffy;
        }


        $buffy .= '<div class="' . $this->get_block_classes() . ' tdb-post-meta" ' . $this->get_block_html_atts() . '>';

            //get the block css
            $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();

            $buffy .= '<div class="tdb-block-inner td-fix-index">';
                $buffy .= $views_icon_html;

                if( $add_text_pos == '' ) {
                    $buffy .= $add_text_html;
                }

                $buffy .= '<span class="reading-time-number">' . $post_reating_time_data . '</span>';
                $buffy .= $minute_text_html;

                if( $add_text_pos == 'after' ) {
                    $buffy .= $add_text_html;
                }
            $buffy .= '</div>';
        $buffy .= '</div>';

        return $buffy;
    }

}