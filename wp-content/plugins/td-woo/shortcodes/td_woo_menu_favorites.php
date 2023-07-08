<?php

class td_woo_menu_favorites extends td_block {

    static function cssMedia( $res_ctx ) {

        /*-- GENERAL-- */
        $res_ctx->load_settings_raw('general_style_td_woo_menu_favorites', 1);



        /*-- LAYOUT -- */
        // icon size
        $res_ctx->load_settings_raw('icon_size', $res_ctx->get_shortcode_att('icon_size') . 'px');

        // icon space
        $add_txt_pos = $res_ctx->get_shortcode_att('add_txt_pos');
        $icon_space = $res_ctx->get_shortcode_att('icon_space');
        if( $add_txt_pos == '' ) {
            $res_ctx->load_settings_raw('text_space_left', $icon_space);
            if( $icon_space == '' ) {
                $res_ctx->load_settings_raw('text_space_left', '12px');
            } else {
                if( is_numeric( $icon_space ) ) {
                    $res_ctx->load_settings_raw('text_space_left', $icon_space . 'px');
                }
            }
        } else {
            $res_ctx->load_settings_raw('text_space_right', $icon_space);
            if( $icon_space == '' ) {
                $res_ctx->load_settings_raw('text_space_right', '12px');
            } else {
                if( is_numeric( $icon_space ) ) {
                    $res_ctx->load_settings_raw('text_space_right', $icon_space . 'px');
                }
            }
        }


        // show count
        $show_count = $res_ctx->get_shortcode_att('show_count');
        if( $show_count == '' ) {
            $show_count = 'flex';
        }
        $res_ctx->load_settings_raw('show_count', $show_count);


        // horizontal align
        $horiz_align = $res_ctx->get_shortcode_att('horiz_align');
        if ($horiz_align == 'content-horiz-left') {
            $res_ctx->load_settings_raw('horiz_align', 'flex-start');
        } else if( $horiz_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw('horiz_align', 'center');
        } else if( $horiz_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw('horiz_align', 'flex-end');
        }

        // make inline
        $res_ctx->load_settings_raw('inline', $res_ctx->get_shortcode_att('inline'));

        // float right
        $res_ctx->load_settings_raw('float_right', $res_ctx->get_shortcode_att('float_block'));



        /*-- COLORS -- */
        $res_ctx->load_settings_raw('icon_color', $res_ctx->get_shortcode_att('icon_color'));
        $res_ctx->load_settings_raw('icon_color_h', $res_ctx->get_shortcode_att('icon_color_h'));

        $res_ctx->load_settings_raw('count_txt_color', $res_ctx->get_shortcode_att('count_txt_color'));
        $res_ctx->load_settings_raw('count_bg_color', $res_ctx->get_shortcode_att('count_bg_color'));

        $res_ctx->load_settings_raw('add_txt_color', $res_ctx->get_shortcode_att('add_txt_color'));
        $res_ctx->load_settings_raw('add_txt_color_h', $res_ctx->get_shortcode_att('add_txt_color_h'));



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_count' );
        $res_ctx->load_font_settings( 'f_add' );

    }

    public function get_custom_css() {
        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $unique_block_class = $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>
            
                /* @general_style_td_woo_menu_favorites */
                .td_woo_menu_favorites {
                    z-index: 998;
                    vertical-align: middle;
                }
                .td_woo_menu_favorites .tdw-block-inner {
                    display: flex;
                }
                .td_woo_menu_favorites .tdw-wmf-wrap {
                    display: flex;
                    align-items: center;
                    color: #000;
                }
                .td_woo_menu_favorites .tdw-wmf-icon-wrap {
                    position: relative;
                }
                .td_woo_menu_cart .tdw-wmf-icon svg {
                    display: block;
                    height: 0;
                    fill: #000;
                }
                .td_woo_menu_favorites .tdw-wmf-count {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    position: absolute;
                    right: -5px;
                    top: -4px;
                    width: 1.6em;
                    height: 1.6em;
                    background-color: #4db2ec;
                    padding-bottom: 1px;
                    font-size: 10px;
                    line-height: 1;
                    color: #fff;
                    border-radius: 100%;
                }
                .td_woo_menu_favorites .tdw-wmf-txt {
                    font-size: 13px;
                    line-height: 1.3; 
                }
                
                
                /* @icon_size */
                body .$unique_block_class .tdw-wmf-icon {
                    font-size: @icon_size;
                }
                body .$unique_block_class .tdw-wmf-icon svg {
                    width: @icon_size;
                }
                
                /* @text_space_left */
                body .$unique_block_class .tdw-wmf-txt {
                    margin-left: @text_space_left;
                }
                /* @text_space_right */
                body .$unique_block_class .tdw-wmf-txt {
                    margin-right: @text_space_right;
                }
                
                /* @show_count */
                body .$unique_block_class .tdw-wmf-count {
                    display: @show_count;
                }
                
                /* @horiz_align */
                body .$unique_block_class .tdw-block-inner {
                    justify-content: @horiz_align;
                }
                
                /* @inline */
                body .$unique_block_class {
                    display: inline-block;
                }
                /* @float_right */
                body .$unique_block_class {
                    float: right;
                    clear: none;
                }
                
                
                /* @add_txt_color */
                body .$unique_block_class .tdw-wmf-wrap {
                    color: @add_txt_color;
                }
                body .$unique_block_class .tdw-wmf-icon svg {
                    fill: @add_txt_color;
                }
                /* @add_txt_color_h */
                body .$unique_block_class a.tdw-wmf-wrap:hover {
                    color: @add_txt_color_h;
                }
                body .$unique_block_class a:hover .tdw-wmf-icon svg {
                    fill: @add_txt_color_h;
                }
                
                /* @icon_color */
                body .$unique_block_class .tdw-wmf-wrap i {
                    color: @icon_color;
                }
                body .$unique_block_class .tdw-wmf-icon svg {
                    fill: @icon_color;
                }
                /* @icon_color_h */
                body .$unique_block_class a.tdw-wmf-wrap:hover i {
                    color: @icon_color_h;
                }
                body .$unique_block_class a:hover .tdw-wmf-icon svg {
                    fill: @icon_color_h;
                }
                
                /* @count_txt_color */
                body .$unique_block_class .tdw-wmf-count {
                    color: @count_txt_color;
                }
                /* @count_bg_color */
                body .$unique_block_class .tdw-wmf-count {
                    background-color: @count_bg_color;
                }
                
                
                /* @f_add */
                body .$unique_block_class .tdw-wmf-txt {
                    @f_add
                }
                /* @f_count */
                body .$unique_block_class .tdw-wmf-count {
                    @f_count
                }
                
            </style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();

        return $compiled_css;
    }

    function render($atts, $content = null) {

        parent::render($atts);

        // url
        $url = $this->get_att('url');

        $open_in_new_window = '';
        if( $this->get_att('new_tab') != '' ) {
            $open_in_new_window = 'target="blank"';
        }


        // open/close tags
        $open_tag = 'div';
        $close_tag = 'div';
        if( $url != '' ) {
            $open_tag = 'a href="' . $url . '" ' . $open_in_new_window;
            $close_tag = 'a';
        }


        // icon
        $icon = $this->get_icon_att('tdicon');
        $icon_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $icon_data = 'data-td-svg-icon="' . $this->get_att('tdicon') . '"';
        }


        // additional text
        $add_txt_html_buffy = '';
        $add_txt = $this->get_att('add_txt');
        if( $add_txt != '' ) {
            $add_txt_html_buffy = '<div class="tdw-wmf-txt">' . $add_txt . '</div>';
        }

        $add_txt_pos = $this->get_att('add_txt_pos');


        // favorites count
        $favorite_products = td_woo_util::get_favourite_products();
        $favorite_products_count = count( $favorite_products );


        $buffy = ''; //output buffer

        $buffy .= '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';

		    //get the block js
		    $buffy .= $this->get_block_css();

		    //get the js for this block
		    $buffy .= $this->get_block_js();


            $buffy .= '<div id=' . $this->block_uid . ' class="tdw-block-inner">';
                $buffy .= '<' . $open_tag . ' class="tdw-wmf-wrap">';
                    if( $add_txt_pos == 'before' ) {
                        $buffy .= $add_txt_html_buffy;
                    }

                    if( $icon != '' ) {
                        $buffy .= '<div class="tdw-wmf-icon-wrap">';
                            if( base64_encode( base64_decode( $icon ) ) == $icon ) {
                                $buffy .= '<div class="tdw-wmf-icon tdw-wmf-icon-svg" ' . $icon_data . '>' . base64_decode( $icon ) . '</div>';
                            } else {
                                $buffy .= '<i class="tdw-wmf-icon ' . $icon . '"></i>';
                            }

                            $buffy .= '<div class="tdw-wmf-count">'. $favorite_products_count . '</div>';
                        $buffy .= '</div>';
                    }

                    if( $add_txt_pos == '' ) {
                        $buffy .= $add_txt_html_buffy;
                    }
                $buffy .= '</' . $close_tag . '>';
            $buffy .= '</div>';

        $buffy .= '</div>';

        return $buffy;
    }
}
