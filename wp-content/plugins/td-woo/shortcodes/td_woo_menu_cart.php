<?php

class td_woo_menu_cart extends td_block {

    static function cssMedia( $res_ctx )
    {

        /*-- GENERAL-- */
        $res_ctx->load_settings_raw('general_style', 1);
        $icon = $res_ctx->get_icon_att('tdicon');
        if ($icon != '') {
            $res_ctx->load_settings_raw('icon_arrow', 1);
        } else {
            $res_ctx->load_settings_raw('text_arrow', 1);
        }


        // show cart
        if (tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe()) {
            $res_ctx->load_settings_raw('show_cart', $res_ctx->get_shortcode_att('show_cart'));
        }


        /*-- TOGGLE -- */
        // icon size
        $icon_size = $res_ctx->get_shortcode_att('icon_size');
        // icon size
        if( base64_encode( base64_decode( $icon ) ) == $icon ) {
            $res_ctx->load_settings_raw('icon_svg_size', $icon_size . 'px');
        } else {
            $res_ctx->load_settings_raw('icon_size', $icon_size . 'px');
        }

        // icon space
        $text_pos = $res_ctx->get_shortcode_att('toggle_txt_pos');
        $icon_space = $res_ctx->get_shortcode_att('icon_space');
        if ($text_pos == '') {
            $res_ctx->load_settings_raw('icon_space_right', $icon_space);
            if ($icon_space != '') {
                if (is_numeric($icon_space)) {
                    $res_ctx->load_settings_raw('icon_space_right', $icon_space . 'px');
                }
            } else {
                $res_ctx->load_settings_raw('icon_space_right', '12px');
            }
        } else if ($text_pos == 'before') {
            $res_ctx->load_settings_raw('icon_space_left', $icon_space);
            if ($icon_space != '') {
                if (is_numeric($icon_space)) {
                    $res_ctx->load_settings_raw('icon_space_left', $icon_space . 'px');
                }
            } else {
                $res_ctx->load_settings_raw('icon_space_left', '12px');
            }
        }

        // text vertical position
        $res_ctx->load_settings_raw('toggle_txt_align', $res_ctx->get_shortcode_att('toggle_txt_align') . 'px');

        // show count
        $res_ctx->load_settings_raw('show_count', $res_ctx->get_shortcode_att('show_count'));

        // show count
        $res_ctx->load_settings_raw('show_value', $res_ctx->get_shortcode_att('show_value'));

        // align toggle
        $toggle_horiz_align = $res_ctx->get_shortcode_att('toggle_horiz_align');
        if ($toggle_horiz_align == 'content-horiz-left') {
            $res_ctx->load_settings_raw('toggle_horiz_align_left', 1);
        } else if( $toggle_horiz_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw('toggle_horiz_align_center', 1);
        } else if( $toggle_horiz_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw('toggle_horiz_align_right', 1);
        }

        // make inline
        $res_ctx->load_settings_raw('inline', $res_ctx->get_shortcode_att('inline'));

        // float right
        $res_ctx->load_settings_raw('float_right', $res_ctx->get_shortcode_att('float_block'));



        /*-- CART -- */
        // cart offset
        $cart_offset = $res_ctx->get_shortcode_att('cart_offset');
        $res_ctx->load_settings_raw('cart_offset', $cart_offset);
        if( $cart_offset != '' && is_numeric( $cart_offset ) ) {
            $res_ctx->load_settings_raw('cart_offset', $cart_offset . 'px');
        }

        // cart width
        $cart_width = $res_ctx->get_shortcode_att('cart_width');
        $res_ctx->load_settings_raw('cart_width', $cart_width);
        if( $cart_width != '' && is_numeric( $cart_width ) ) {
            $res_ctx->load_settings_raw('cart_width', $cart_width . 'px');
        }

        // cart padding
        $cart_padding = $res_ctx->get_shortcode_att('cart_padding');
        $res_ctx->load_settings_raw('cart_padding', $cart_padding);
        if( $cart_padding != '' && is_numeric( $cart_padding ) ) {
            $res_ctx->load_settings_raw('cart_padding', $cart_padding . 'px');
        }
        // cart padding empty
        $cart_padding_e = $res_ctx->get_shortcode_att('cart_padding_e');
        $res_ctx->load_settings_raw('cart_padding_e', $cart_padding_e);
        if( $cart_padding_e != '' && is_numeric( $cart_padding_e ) ) {
            $res_ctx->load_settings_raw('cart_padding_e', $cart_padding_e . 'px');
        }

        // cart border size
        $cart_border = $res_ctx->get_shortcode_att('cart_border');
        $res_ctx->load_settings_raw('cart_border', $cart_border);
        if( $cart_border != '' && is_numeric( $cart_border ) ) {
            $res_ctx->load_settings_raw('cart_border', $cart_border . 'px');
        }

        // cart border style
        $cart_border_style = $res_ctx->get_shortcode_att( 'cart_border_style' );
        if( $cart_border_style != '' ) {
            $res_ctx->load_settings_raw( 'cart_border_style', $cart_border_style );
        }

        // cart border radius
        $cart_border_radius = $res_ctx->get_shortcode_att('cart_border_radius');
        $res_ctx->load_settings_raw('cart_border_radius', $cart_border_radius);
        if( $cart_border_radius != '' && is_numeric( $cart_border_radius ) ) {
            $res_ctx->load_settings_raw('cart_border_radius', $cart_border_radius . 'px');
        }

        // cart align
        $cart_horiz_align = $res_ctx->get_shortcode_att('cart_horiz_align');
        if( $cart_horiz_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw('cart_horiz_align_left', 1);
        } else if( $cart_horiz_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw('cart_horiz_align_center', 1);
        } else if( $cart_horiz_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw('cart_horiz_align_right', 1);
        }



        /*-- CART ITEMS LIST -- */
        // list bottom space
        $items_padd = $res_ctx->get_shortcode_att('items_padd');
        $res_ctx->load_settings_raw('items_padd', $items_padd);
        if( $items_padd != '' && is_numeric( $items_padd ) ) {
            $res_ctx->load_settings_raw('items_padd', $items_padd . 'px');
        }

        // list bottom border size
        $items_border = $res_ctx->get_shortcode_att('items_border');
        $res_ctx->load_settings_raw('items_border', $items_border);
        if( $items_border != '' && is_numeric( $items_border ) ) {
            $res_ctx->load_settings_raw('items_border', $items_border . 'px');
        }

        // list bottom border style
        $items_border_style = $res_ctx->get_shortcode_att( 'items_border_style' );
        if( $items_border_style != '' ) {
            $res_ctx->load_settings_raw( 'items_border_style', $items_border_style );
        }



        /*-- CART ITEMS -- */
        // items bottom space
        $item_space = $res_ctx->get_shortcode_att('item_space');
        $res_ctx->load_settings_raw('item_space', $item_space);
        if( $item_space != '' && is_numeric( $item_space ) ) {
            $res_ctx->load_settings_raw('item_space', $item_space . 'px');
        }
        // items padding
        $item_tb_padd_shortcode = $res_ctx->get_shortcode_att('item_tb_padd');
        $item_tb_padd = '';
        if( $item_tb_padd_shortcode != '' ) {
            if( is_numeric( $item_tb_padd_shortcode ) ) {
                $item_tb_padd = $item_tb_padd_shortcode;
            }
        } else {
            $item_tb_padd = '8';
        }
        $res_ctx->load_settings_raw('item_tb_padd', $item_tb_padd . 'px');

        $item_lr_padd = $res_ctx->get_shortcode_att('item_lr_padd');
        if( $item_lr_padd != '' ) {
            if ( is_numeric( $item_lr_padd ) ) {
                $res_ctx->load_settings_raw('item_lr_padd', $item_lr_padd . 'px');
            }
        } else {
            $res_ctx->load_settings_raw('item_lr_padd', '15px');
        }

        // items image width + space
        $image_width = $res_ctx->get_shortcode_att('image_width');
        $image_space = $res_ctx->get_shortcode_att('image_space');
        $res_ctx->load_settings_raw('image_width', $image_width . 'px');
        $res_ctx->load_settings_raw('image_left_padding', ( $image_width + $image_space ) . 'px');
        $res_ctx->load_settings_raw('item_min_height', ( $image_width + ( $item_tb_padd * 2 ) ) . 'px');

        // items image radius
        $image_radius = $res_ctx->get_shortcode_att('image_radius');
        $res_ctx->load_settings_raw('image_radius', $image_radius);
        if( $image_radius != '' && is_numeric( $image_radius ) ) {
            $res_ctx->load_settings_raw('image_radius', $image_radius . 'px');
        }

        // meta info vertical align
        $meta_info_vert = $res_ctx->get_shortcode_att('meta_info_vert');
        $res_ctx->load_settings_raw('meta_info_vert', $meta_info_vert);

        // quantity vertical align
        $res_ctx->load_settings_raw('qty_align', $res_ctx->get_shortcode_att('qty_align') . 'px');

        // variations top space
        $var_top = $res_ctx->get_shortcode_att('var_top');
        $res_ctx->load_settings_raw('var_top', $var_top);
        if( $var_top != '' && is_numeric( $var_top ) ) {
            $res_ctx->load_settings_raw('var_top', $var_top . 'px');
        }

        // subtotal padding
        $subtotal_padd = $res_ctx->get_shortcode_att('subtotal_padd');
        $res_ctx->load_settings_raw('subtotal_padd', $subtotal_padd);
        if( $subtotal_padd != '' && is_numeric( $subtotal_padd ) ) {
            $res_ctx->load_settings_raw('subtotal_padd', $subtotal_padd . 'px');
        }
        // subtotal horizontal align
        $subtotal_horiz = $res_ctx->get_shortcode_att('subtotal_horiz');
        if( $subtotal_horiz == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw('subtotal_horiz_align_left', 1);
        } else if( $subtotal_horiz == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw('subtotal_horiz_align_center', 1);
        } else if( $subtotal_horiz == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw('subtotal_horiz_align_right', 1);
        }

        // buttons group padding
        $btns_padd = $res_ctx->get_shortcode_att('btns_padd');
        $res_ctx->load_settings_raw('btns_padd', $btns_padd);
        if( $btns_padd != '' && is_numeric( $btns_padd ) ) {
            $res_ctx->load_settings_raw('btns_padd', $btns_padd . 'px');
        }
        // buttons gap
        $btn_gap = $res_ctx->get_shortcode_att('btn_gap');
        if( $btn_gap != '' && is_numeric( $btn_gap ) ) {
            $res_ctx->load_settings_raw('btn_gap', $btn_gap / 2 . 'px');
        }
        // buttons border radius
        $btn_radius = $res_ctx->get_shortcode_att('btn_radius');
        $res_ctx->load_settings_raw('btn_radius', $btn_radius);
        if( $btn_radius != '' && is_numeric( $btn_radius ) ) {
            $res_ctx->load_settings_raw('btn_radius', $btn_radius . 'px');
        }



        /*-- COLORS -- */
        // toggle
        $res_ctx->load_settings_raw('icon_color', $res_ctx->get_shortcode_att('icon_color'));
        $res_ctx->load_settings_raw('icon_color_h', $res_ctx->get_shortcode_att('icon_color_h'));

        $res_ctx->load_settings_raw('count_txt_color', $res_ctx->get_shortcode_att('count_txt_color'));
        $res_ctx->load_settings_raw('count_bg_color', $res_ctx->get_shortcode_att('count_bg_color'));

        $res_ctx->load_settings_raw('toggle_txt_color', $res_ctx->get_shortcode_att('toggle_txt_color'));
        $res_ctx->load_settings_raw('toggle_txt_color_h', $res_ctx->get_shortcode_att('toggle_txt_color_h'));

        // cart
        $res_ctx->load_settings_raw('cart_bg', $res_ctx->get_shortcode_att('cart_bg'));
        $res_ctx->load_settings_raw('cart_border_color', $res_ctx->get_shortcode_att('cart_border_color'));
        $res_ctx->load_settings_raw('cart_arrow_color', $res_ctx->get_shortcode_att('cart_arrow_color'));
        $res_ctx->load_shadow_settings( 6, 0, 2, 0, 'rgba(0, 0, 0, 0.2)', 'cart_shadow' );
        $res_ctx->load_settings_raw('cart_no_items_color', $res_ctx->get_shortcode_att('cart_no_items_color'));

        // cart items list
        $res_ctx->load_settings_raw('items_border_color', $res_ctx->get_shortcode_att('items_border_color'));

        // cart item
        $res_ctx->load_settings_raw('item_bg_color', $res_ctx->get_shortcode_att('item_bg_color'));
        $res_ctx->load_settings_raw('item_bg_color_h', $res_ctx->get_shortcode_att('item_bg_color_h'));
        $res_ctx->load_settings_raw('title_color', $res_ctx->get_shortcode_att('title_color'));
        $res_ctx->load_settings_raw('title_color_h', $res_ctx->get_shortcode_att('title_color_h'));
        $res_ctx->load_settings_raw('amount_color', $res_ctx->get_shortcode_att('amount_color'));
        $res_ctx->load_settings_raw('amount_color_h', $res_ctx->get_shortcode_att('amount_color_h'));
        $res_ctx->load_settings_raw('var_color', $res_ctx->get_shortcode_att('var_color'));
        $res_ctx->load_settings_raw('var_color_h', $res_ctx->get_shortcode_att('var_color_h'));
        $res_ctx->load_settings_raw('delete_color', $res_ctx->get_shortcode_att('delete_color'));
        $res_ctx->load_settings_raw('delete_color_h', $res_ctx->get_shortcode_att('delete_color_h'));

        // cart info
        $res_ctx->load_settings_raw('subtotal_color', $res_ctx->get_shortcode_att('subtotal_color'));

        $res_ctx->load_settings_raw('btn1_color', $res_ctx->get_shortcode_att('btn1_color'));
        $res_ctx->load_settings_raw('btn1_color_h', $res_ctx->get_shortcode_att('btn1_color_h'));
        $res_ctx->load_settings_raw('btn1_bg_color', $res_ctx->get_shortcode_att('btn1_bg_color'));
        $res_ctx->load_settings_raw('btn1_bg_color_h', $res_ctx->get_shortcode_att('btn1_bg_color_h'));

        $res_ctx->load_settings_raw('btn2_color', $res_ctx->get_shortcode_att('btn2_color'));
        $res_ctx->load_settings_raw('btn2_color_h', $res_ctx->get_shortcode_att('btn2_color_h'));
        $res_ctx->load_settings_raw('btn2_bg_color', $res_ctx->get_shortcode_att('btn2_bg_color'));
        $res_ctx->load_settings_raw('btn2_bg_color_h', $res_ctx->get_shortcode_att('btn2_bg_color_h'));



        /*-- FONTS -- */
        // toggle
        $res_ctx->load_font_settings( 'f_count' );
        $res_ctx->load_font_settings( 'f_toggle' );

        $res_ctx->load_font_settings( 'f_noitems' );

        // cart item
        $res_ctx->load_font_settings( 'f_title' );
        $res_ctx->load_font_settings( 'f_amount' );
        $res_ctx->load_font_settings( 'f_var' );

        // cart info
        $res_ctx->load_font_settings( 'f_subtotal' );
        $res_ctx->load_font_settings( 'f_btns' );
    }

    public function get_custom_css() {
        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $unique_block_class = $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>
            
                /* @general_style */
                .td_woo_menu_cart {
                    z-index: 998;
                    vertical-align: middle;
                }
                .td_woo_menu_cart .tdw-block-inner {
                    font-size: 0;
                    line-height: 0;
                }
                .td_woo_menu_cart .tdw-wmc-wrap {
                    display: inline-block;
                    position: relative;
                }
                .td_woo_menu_cart .tdw-wmc-link {
                    position: relative;
                    display: flex;
                    flex-wrap: wrap;
                }
                .td_woo_menu_cart .tdw-wmc-wrap:hover .tdw-wmc-widget {
                    opacity: 1;
                    visibility: visible;
                }
                .td_woo_menu_cart .tdw-wmc-icon-wrap {
                    position: relative;
                }
                .td_woo_menu_cart .tdw-wmc-icon {
                    display: block;
                    color: #000;
                }
                .td_woo_menu_cart .tdw-wmc-icon-svg {
                    line-height: 0;
                }
                .td_woo_menu_cart .tdw-wmc-icon-svg svg {
                    height: auto;
                }
                .td_woo_menu_cart .tdw-wmc-icon-svg svg,
                .td_woo_menu_cart .tdw-wmc-icon-svg svg * {
                    fill: #000;
                }
                .td_woo_menu_cart .tdw-wmc-count {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    position: absolute;
                    right: -5px;
                    top: -4px;
                    min-width: 16px;
                    min-height: 16px;
                    padding: 2px 4px;
                    background-color: #4db2ec;
                    font-size: 10px;
                    text-align: center;
                    line-height: 1;
                    color: #fff;
                    border-radius: 50px;
                }
                .td_woo_menu_cart .tdw-wmc-txt {
                    position: relative;
                    display: flex;
                    align-items: center;
                    font-size: 13px;
                    color: #000;
                }
                .td_woo_menu_cart .tdw-wmc-widget {
                    position: absolute;
                    top: 100%;
                    right: 0;
                    width: 290px;
                    opacity: 0;
                    visibility: hidden;
                    z-index: 10;
                    font-size: 14px;
                    line-height: 21px;
                    text-align: left;
                }
                .td_woo_menu_cart .tdw-wmc-widget:before {
                    content: '';
                    display: block;
                    width: 100%;
                    height: 18px;
                }
                .td_woo_menu_cart .tdw-wmc-widget .tdw-wmc-widget-inner {
                    background-color: #fff;
                    border-width: 0;
                    border-style: solid;
                    border-color: #000;
                }
                .td_woo_menu_cart:not(.tdw-wmc-empty) .tdw-wmc-widget .tdw-wmc-widget-inner {
                    padding: 7px 0 15px;
                }
                .td_woo_menu_cart.tdw-wmc-empty .tdw-wmc-widget .tdw-wmc-widget-inner {
                    padding: 15px;
                }
                .td_woo_menu_cart .tdw-wmc-widget .cart_list {
                    margin: 0;
                    padding-bottom: 7px;
                    border-bottom: 1px solid #eee;
                }
                .td_woo_menu_cart .tdw-wmc-widget .mini_cart_item {
                    margin: 0;
                    display: flex;
                    flex-wrap: wrap;
                    position: relative;
                    list-style-type: none;
                }
                .td_woo_menu_cart .tdw-wmc-widget .mini_cart_item:hover {
                    background-color: #f9f9f9;
                }
                .td_woo_menu_cart .tdw-wmc-widget .mini_cart_item:last-child {
                    margin-bottom: 0 !important;
                }
                .td_woo_menu_cart .tdw-wmc-widget .mini_cart_item .blockOverlay {
                    background: #fff !important;
                    opacity: 0.75 !important;
                }
                .td_woo_menu_cart .tdw-wmc-widget .mini_cart_item a:nth-child(2) {
                    display: flex;
                    flex: 1;
                    padding-right: 4px;
                    font-size: 11px;
                    font-weight: 600;
                    line-height: 1.3;
                    color: #000;
                }
                .td_woo_menu_cart .tdw-wmc-widget .mini_cart_item .variation {
                    order: 10;
                    width: 100%;
                    margin-block-start: 0;
                    margin-block-end: 0;
                    margin-top: 4px;
                    font-size: 9px;
                    font-style: italic;
                    line-height: 1.2;
                    color: #777;
                    border: none;
                }
                .td_woo_menu_cart .tdw-wmc-widget .mini_cart_item .variation p {
                    margin-bottom: 0;
                }
                .td_woo_menu_cart .tdw-wmc-widget .mini_cart_item .variation dt {
                    margin: 0;
                    padding: 0;
                    clear: left;
                    font-weight: normal;
                    float: left;
                }
                .td_woo_menu_cart .tdw-wmc-widget .mini_cart_item .variation dd {
                    margin: 0 0 0 5px;
                    padding: 0;
                    float: left;
                }
                .td_woo_menu_cart .tdw-wmc-widget .mini_cart_item a:nth-child(2):hover {
                    color:#4db2ec;
                }
                .td_woo_menu_cart .tdw-wmc-widget .mini_cart_item a:nth-child(2) img {
                    position: absolute;
                    left: 0;
                    top: 0;
                    margin-left: 0;
                }
                .td_woo_menu_cart .tdw-wmc-widget .remove_from_cart_button {
                    position: absolute;
                    width: auto;
                    height: auto;
                    font-size: 14px;
                    line-height: 1;
                    font-weight: 600;
                    color: #f26060 !important;
                    opacity: 0;
                    transition: all 0.3s ease;
                }
                .td_woo_menu_cart .tdw-wmc-widget .remove_from_cart_button:hover {
                    background-color: transparent;
                    color: #f26060 !important;
                }
                .td_woo_menu_cart .tdw-wmc-widget .mini_cart_item:hover .remove_from_cart_button {
                    opacity: 1;
                }
                .td_woo_menu_cart .tdw-wmc-widget .quantity {
                    position: relative;
                    align-self: flex-start;
                    font-size: 10px;
                    line-height: 1;
                    color: #999999;
                }
                .td_woo_menu_cart .tdw-wmc-widget .total {
                    margin: 0;
                    padding: 15px;
                    text-align: right;
                    font-size: 12px;
                    font-weight: 600;
                }
                .td_woo_menu_cart .tdw-wmc-widget .buttons {
                    display: flex;
                    justify-content: space-between;
                    margin: 0;
                    padding: 0 15px;
                }
                .td_woo_menu_cart .tdw-wmc-widget .buttons a {
                    display: inline-block;
                    width: calc(50% - 5px);
                    padding: 0 15px;
                    background-color: #222222;
                    font-family: 'Roboto', sans-serif;
                    font-size: 13px;
                    font-weight: 500;
                    line-height: 32px;
                    text-align: center;
                    color: #fff;
                    -webkit-transition: all 0.3s ease;
                    transition: all 0.3s ease;
                    border-radius: 0;
                    z-index: 1;
                }
                .td_woo_menu_cart .tdw-wmc-widget .buttons a:hover {
                    background-color: #777;
                    color: #fff;
                }
                .td_woo_menu_cart .tdw-wmc-widget .buttons .checkout {
                    background-color: #4db2ec;
                }
                .td_woo_menu_cart .tdw-wmc-widget .woocommerce-mini-cart__empty-message {
                    text-align: center;
                    margin-bottom: 0;
                    font-size: 12px;
                    color: #888;
                }
                
                /* @icon_arrow */
                .td_woo_menu_cart .tdw-wmc-icon-wrap:after {
                    content: '';
                    display: none;
                    position: absolute;
                    bottom: -18px;
                    left: 50%;
                    transform: translateX(-50%);
                    width: 0;
                    height: 0;
                    border-left: 6px solid transparent;
                    border-right: 6px solid transparent;
                    border-bottom: 6px solid #fff;
                    z-index: 11;
                }
                .td_woo_menu_cart .tdw-wmc-wrap:hover .tdw-wmc-icon-wrap:after {
                    display: block;
                }
                /* @text_arrow */
                .td_woo_menu_cart .tdw-wmc-txt:after {
                    content: '';
                    display: none;
                    position: absolute;
                    bottom: -18px;
                    left: 50%;
                    transform: translateX(-50%);
                    width: 0;
                    height: 0;
                    border-left: 6px solid transparent;
                    border-right: 6px solid transparent;
                    border-bottom: 6px solid #fff;
                    z-index: 11;
                }
                .td_woo_menu_cart .tdw-wmc-wrap:hover .tdw-wmc-txt:after {
                    display: block;
                }
                
            
                /* @show_cart */
                body .$unique_block_class.tdc-element-selected .tdw-wmc-widget {
                    opacity: 1;
                    visibility: visible;
                }
                body .$unique_block_class.tdc-element-selected .tdw-wmc-icon-wrap:after,
                body .$unique_block_class.tdc-element-selected .tdw-wmc-txt:after{
                    display: block;
                }
            
            
                /* @icon_size */
                body .$unique_block_class .tdw-wmc-icon {
                    font-size: @icon_size;
                }
                /* @icon_svg_size */
                body .$unique_block_class .tdw-wmc-icon-svg svg {
                    width: @icon_svg_size;
                }
                
                /* @icon_space_left */
                body .$unique_block_class .tdw-wmc-txt{
                    margin-right: @icon_space_left;
                }
                /* @icon_space_right */
                body .$unique_block_class .tdw-wmc-txt {
                    margin-left: @icon_space_right;
                }
                
                
                /* @toggle_txt_align */
                body .$unique_block_class .tdw-wmc-txt {
                    top: @toggle_txt_align;
                }
                
                /* @show_count */
                body .$unique_block_class .tdw-wmc-count {
                    display: @show_count;
                }
                /* @show_value */
                body .$unique_block_class .tdw-wmc-txt {
                    display: @show_value;
                }
                
                /* @toggle_horiz_align_left */
                body .$unique_block_class .td_block_inner {
                    text-align: left;
                }
                /* @toggle_horiz_align_center */
                body .$unique_block_class .td_block_inner {
                    text-align: center;
                }
                /* @toggle_horiz_align_right */
                body .$unique_block_class .td_block_inner {
                    text-align: right;
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
                
                
                /* @cart_offset */
                body .$unique_block_class .tdw-wmc-widget:before {
                    height: @cart_offset;
                }
                body .$unique_block_class .tdw-wmc-icon-wrap:after,
                body .$unique_block_class .tdw-wmc-txt:after {
                    bottom: -@cart_offset;
                }
                /* @cart_width */
                body .$unique_block_class .tdw-wmc-widget {
                    width: @cart_width;
                }
                /* @cart_padding */
                body .$unique_block_class:not(.tdw-wmc-empty) .tdw-wmc-widget .tdw-wmc-widget-inner {
                    padding: @cart_padding;
                }
                /* @cart_padding_e */
                body .$unique_block_class.tdw-wmc-empty .tdw-wmc-widget .tdw-wmc-widget-inner {
                    padding: @cart_padding_e;
                }
                /* @cart_border */
                body .$unique_block_class .tdw-wmc-widget .tdw-wmc-widget-inner {
                    border-width: @cart_border;
                }
                /* @cart_border_style */
                body .$unique_block_class .tdw-wmc-widget .tdw-wmc-widget-inner {
                    border-style: @cart_border_style;
                }
                /* @cart_border_radius */
                body .$unique_block_class .tdw-wmc-widget .tdw-wmc-widget-inner {
                    border-radius: @cart_border_radius;
                }
                /* @cart_horiz_align_left */
                body .$unique_block_class .tdw-wmc-widget {
                    left: 0;
                    right: auto;
                    transform: none;
                }
                /* @cart_horiz_align_center */
                body .$unique_block_class .tdw-wmc-widget {
                    left: 50%;
                    right: auto;
                    transform: translateX(-50%);
                }
                /* @cart_horiz_align_right */
                body .$unique_block_class .tdw-wmc-widget {
                    right: 0;
                    left: auto;
                    transform: none;
                }
                
                
                /* @items_padd */
                body .$unique_block_class .tdw-wmc-widget .cart_list {
                    padding: @items_padd;
                }
                /* @items_border */
                body .$unique_block_class .tdw-wmc-widget .cart_list {
                    border-bottom-width: @items_border;
                }
                /* @items_border_style */
                body .$unique_block_class .tdw-wmc-widget .cart_list {
                    border-bottom-style: @items_border_style;
                }
                
                
                /* @item_space */
                body .$unique_block_class .tdw-wmc-widget .mini_cart_item {
                    margin-bottom: @item_space;
                }
                /* @item_tb_padd */
                body .$unique_block_class .tdw-wmc-widget .mini_cart_item {
                    padding-top: @item_tb_padd;
                    padding-bottom: @item_tb_padd;
                }
                body .$unique_block_class .tdw-wmc-widget .mini_cart_item a:nth-child(2) img {
                    top: @item_tb_padd;
                }
                body .$unique_block_class .tdw-wmc-widget .remove_from_cart_button {
                    bottom: @item_tb_padd;
                }
                /* @item_lr_padd */
                body .$unique_block_class .tdw-wmc-widget .mini_cart_item {
                    padding-left: @item_lr_padd;
                    padding-right: @item_lr_padd;
                }
                body .$unique_block_class .tdw-wmc-widget .mini_cart_item a:nth-child(2) img {
                    left: @item_lr_padd;
                }
                body .$unique_block_class .tdw-wmc-widget .remove_from_cart_button {
                    right: @item_lr_padd;
                }
                /* @item_min_height */
                body .$unique_block_class .tdw-wmc-widget .mini_cart_item {
                    min-height: @item_min_height;
                }
                
                /* @image_width */
                body .$unique_block_class .tdw-wmc-widget .mini_cart_item a:nth-child(2) img {
                    width: @image_width;
                }
                /* @image_left_padding */
                body .$unique_block_class .tdw-wmc-widget .mini_cart_item a:nth-child(2),
                body .$unique_block_class .tdw-wmc-widget .mini_cart_item .variation {
                    padding-left: @image_left_padding;
                }
                /* @image_radius */
                body .$unique_block_class .tdw-wmc-widget .mini_cart_item a:nth-child(2) img {
                    border-radius: @image_radius;
                }
                /* @meta_info_vert */
                body .$unique_block_class .tdw-wmc-widget .mini_cart_item {
                    align-items: @meta_info_vert;
                }
                /* @qty_align */
                body .$unique_block_class .tdw-wmc-widget .quantity {
                    top: @qty_align;
                }
                /* @var_top */
                body .$unique_block_class .tdw-wmc-widget .mini_cart_item .variation {
                    margin-top: @var_top;
                }
                
                
                /* @subtotal_padd */
                body .$unique_block_class .tdw-wmc-widget .total {
                    padding: @subtotal_padd;
                }
                /* @subtotal_horiz_align_left */
                body .$unique_block_class .tdw-wmc-widget .total {
                    text-align: left;
                }
                /* @subtotal_horiz_align_center */
                body .$unique_block_class .tdw-wmc-widget .total {
                    text-align: center;
                }
                /* @subtotal_horiz_align_right */
                body .$unique_block_class .tdw-wmc-widget .total {
                    text-align: right;
                }
                
                /* @btns_padd */
                body .$unique_block_class .tdw-wmc-widget .buttons {
                    padding: @btns_padd;
                }
                /* @btn_gap */
                body .$unique_block_class .tdw-wmc-widget .buttons a {
                    width: calc(50% - @btn_gap);
                }
                /* @btn_radius */
                body .$unique_block_class .tdw-wmc-widget .buttons a {
                    border-radius: @btn_radius;
                }
                
                
                /* @icon_color */
                body .$unique_block_class .tdw-wmc-icon {
                    color: @icon_color;
                }
                body .$unique_block_class .tdw-wmc-icon-svg svg,
                body .$unique_block_class .tdw-wmc-icon-svg svg * {
                    fill: @icon_color;
                }
                /* @icon_color_h */
                body .$unique_block_class .tdw-wmc-wrap:hover .tdw-wmc-icon {
                    color: @icon_color_h;
                }
                body .$unique_block_class .tdw-wmc-wrap:hover .tdw-wmc-icon-svg svg,
                body .$unique_block_class .tdw-wmc-wrap:hover .tdw-wmc-icon-svg svg * {
                    fill: @icon_color_h;
                }
                
                /* @count_txt_color */
                body .$unique_block_class .tdw-wmc-count {
                    color: @count_txt_color;
                }
                /* @count_bg_color */
                body .$unique_block_class .tdw-wmc-count {
                    background-color: @count_bg_color;
                }
                
                /* @toggle_txt_color */
                body .$unique_block_class .tdw-wmc-txt {
                    color: @toggle_txt_color;
                }
                /* @toggle_txt_color_h */
                body .$unique_block_class .tdw-wmc-wrap:hover .tdw-wmc-txt {
                    color: @toggle_txt_color_h;
                }
                
                /* @cart_bg */
                body .$unique_block_class .tdw-wmc-widget .tdw-wmc-widget-inner {
                    background-color: @cart_bg;
                }
                body .$unique_block_class .tdw-wmc-widget .mini_cart_item .blockOverlay {
                    background-color: @cart_bg !important;
                }
                /* @cart_border_color */
                body .$unique_block_class .tdw-wmc-widget .tdw-wmc-widget-inner {
                    border-color: @cart_border_color;
                }
                /* @cart_arrow_color */
                body .$unique_block_class .tdw-wmc-icon-wrap:after,
                body .$unique_block_class .tdw-wmc-txt:after {
                    border-bottom-color: @cart_arrow_color;
                }
                /* @cart_shadow */
                body .$unique_block_class .tdw-wmc-widget .tdw-wmc-widget-inner {
                    box-shadow: @cart_shadow;
                }
                /* @cart_no_items_color */
                body .$unique_block_class .tdw-wmc-widget .woocommerce-mini-cart__empty-message {
                    color: @cart_no_items_color;
                }
                
                /* @items_border_color */
                body .$unique_block_class .tdw-wmc-widget .cart_list {
                    border-bottom-color: @items_border_color;
                }
                
                /* @item_bg_color */
                body .$unique_block_class .tdw-wmc-widget .mini_cart_item {
                    background-color: @item_bg_color;
                }
                /* @item_bg_color_h */
                body .$unique_block_class .tdw-wmc-widget .mini_cart_item:hover {
                    background-color: @item_bg_color_h;
                }
                /* @title_color */
                body .$unique_block_class .tdw-wmc-widget .mini_cart_item a:nth-child(2) {
                    color: @title_color;
                }
                /* @title_color_h */
                body .$unique_block_class .tdw-wmc-widget .mini_cart_item:hover a:nth-child(2) {
                    color: @title_color_h;
                }
                /* @amount_color */
                body .$unique_block_class .tdw-wmc-widget .quantity {
                    color: @amount_color;
                }
                /* @amount_color_h */
                body .$unique_block_class .tdw-wmc-widget .mini_cart_item:hover .quantity {
                    color: @amount_color_h;
                }
                /* @var_color */
                body .$unique_block_class .tdw-wmc-widget .mini_cart_item .variation {
                    color: @var_color;
                }
                /* @var_color_h */
                body .$unique_block_class .tdw-wmc-widget .mini_cart_item:hover .variation {
                    color: @var_color_h;
                }
                /* @delete_color */
                body .$unique_block_class .tdw-wmc-widget .remove_from_cart_button {
                    color: @delete_color !important;
                }
                /* @delete_color_h */
                body .$unique_block_class .tdw-wmc-widget .remove_from_cart_button:hover {
                    color: @delete_color_h !important;
                }
                
                /* @subtotal_color */
                body .$unique_block_class .tdw-wmc-widget .total {
                    color: @subtotal_color;
                }
                
                /* @btn1_color */
                body .$unique_block_class .tdw-wmc-widget .buttons a:first-child {
                    color: @btn1_color;
                }
                /* @btn1_color_h */
                body .$unique_block_class .tdw-wmc-widget .buttons a:first-child:hover {
                    color: @btn1_color_h;
                }
                /* @btn1_bg_color */
                body .$unique_block_class .tdw-wmc-widget .buttons a:first-child {
                    background-color: @btn1_bg_color;
                }
                /* @btn1_bg_color_h */
                body .$unique_block_class .tdw-wmc-widget .buttons a:first-child:hover {
                    background-color: @btn1_bg_color_h;
                }
                
                /* @btn2_color */
                body .$unique_block_class .tdw-wmc-widget .buttons .checkout {
                    color: @btn2_color;
                }
                /* @btn2_color_h */
                body .$unique_block_class .tdw-wmc-widget .buttons .checkout:hover {
                    color: @btn2_color_h;
                }
                /* @btn2_bg_color */
                body .$unique_block_class .tdw-wmc-widget .buttons .checkout {
                    background-color: @btn2_bg_color;
                }
                /* @btn2_bg_color_h */
                body .$unique_block_class .tdw-wmc-widget .buttons .checkout:hover {
                    background-color: @btn2_bg_color_h;
                }
                
                
                /* @f_count */
                body .$unique_block_class .tdw-wmc-count {
                    @f_count
                }
                /* @f_toggle */
                body .$unique_block_class .tdw-wmc-txt {
                    @f_toggle
                }
                /* @f_noitems */
                body .$unique_block_class .tdw-wmc-widget .woocommerce-mini-cart__empty-message {
                    @f_noitems
                }
                /* @f_title */
                body .$unique_block_class .tdw-wmc-widget .mini_cart_item a:nth-child(2) {
                    @f_title
                }
                /* @f_amount */
                body .$unique_block_class .tdw-wmc-widget .quantity {
                    @f_amount
                }
                /* @f_var */
                body .$unique_block_class .tdw-wmc-widget .mini_cart_item .variation {
                    @f_var
                }
                /* @f_subtotal */
                body .$unique_block_class .tdw-wmc-widget .total,
                body .$unique_block_class .tdw-wmc-widget strong {
                    @f_subtotal
                }
                /* @f_btns */
                body .$unique_block_class .tdw-wmc-widget .buttons a {
                    @f_btns
                }
                
            </style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();

        return $compiled_css;
    }

    function render($atts, $content = null) {

        parent::render($atts);

        global $woocommerce;
        $menu_cart = array();
        $price_decimal_separator = wc_get_price_decimal_separator();
		$price_thousand_separator = wc_get_price_thousand_separator();
		$price_decimals = wc_get_price_decimals();
        $price_format = get_woocommerce_price_format();

        $cart_subtotal = (float) $woocommerce->cart->subtotal;
        $original_cart_subtotal = $cart_subtotal;
        $negative_cart_subtotal = $cart_subtotal < 0;

        $cart_subtotal = apply_filters( 'raw_woocommerce_price', $negative_cart_subtotal ? $cart_subtotal * -1 : $cart_subtotal, $original_cart_subtotal );
        $cart_subtotal = apply_filters( 'formatted_woocommerce_price', number_format( $cart_subtotal, $price_decimals, $price_decimal_separator, $price_thousand_separator ), $cart_subtotal, $price_decimals, $price_decimal_separator, $price_thousand_separator, $original_cart_subtotal );

        $formatted_cart_subtotal = ( $negative_cart_subtotal ? '-' : '' ) . sprintf( $price_format, get_woocommerce_currency_symbol(), $cart_subtotal );

        $menu_cart['cart_count'] = $woocommerce->cart->cart_contents_count;
        $menu_cart['cart_subtotal'] = $formatted_cart_subtotal;

        ob_start();
        woocommerce_mini_cart();
        $menu_cart['cart_contents'] = ob_get_clean();

        if ( !$menu_cart['cart_count'] && ( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) ) {
            $sample_product_photo_src = TD_WOO_URL . '/assets/images/sample_product_photo.png';

            $sample_cart_subtotal = (float) 200;
            $original_sample_cart_subtotal = $sample_cart_subtotal;
            $negative_sample_cart_subtotal = $sample_cart_subtotal < 0;

            $sample_cart_subtotal = apply_filters( 'formatted_woocommerce_price', number_format( $sample_cart_subtotal, $price_decimals, $price_decimal_separator, $price_thousand_separator ), $sample_cart_subtotal, $price_decimals, $price_decimal_separator, $price_thousand_separator, $original_sample_cart_subtotal );

            $formatted_sample_cart_subtotal = ( $negative_sample_cart_subtotal ? '-' : '' ) . sprintf( $price_format, get_woocommerce_currency_symbol(), $sample_cart_subtotal );

            $menu_cart = array(
                'cart_count' => '3',
                'cart_subtotal' => $formatted_sample_cart_subtotal,
                'cart_contents' => '
                    <ul class="woocommerce-mini-cart cart_list product_list_widget">
						<li class="woocommerce-mini-cart-item mini_cart_item">
					        <a href="#" class="remove remove_from_cart_button" aria-label="Remove this item" data-product_id="" data-cart_item_key="" data-product_sku="">×</a>
					        <a href="#">
							    <img width="300" height="300" src="' . $sample_product_photo_src . '" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy">
							    Sample Product 1
                            </a>
                            <span class="quantity">1 × <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">' . get_woocommerce_currency_symbol() . '</span>50.00</span></span>
                        </li>
                        <li class="woocommerce-mini-cart-item mini_cart_item">
					        <a href="#" class="remove remove_from_cart_button" aria-label="Remove this item" data-product_id="" data-cart_item_key="" data-product_sku="">×</a>
					        <a href="#">
							    <img width="300" height="300" src="' . $sample_product_photo_src . '" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy">
							    Sample Product 2
                            </a>
                            <span class="quantity">3 × <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">' . get_woocommerce_currency_symbol() . '</span>25.00</span></span>
                        </li>
                        <li class="woocommerce-mini-cart-item mini_cart_item">
					        <a href="#" class="remove remove_from_cart_button" aria-label="Remove this item" data-product_id="" data-cart_item_key="" data-product_sku="">×</a>
					        <a href="#">
							    <img width="300" height="300" src="' . $sample_product_photo_src . '" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy">
							    Sample Product 3
                            </a>
                            <dl class="variation">
                                <dt class="variation-Color">Color:</dt>
                                <dd class="variation-Color"><p>Black</p></dd>
                                <dt class="variation-sad">Size:</dt>
                                <dd class="variation-sad"><p>M</p></dd>
                            </dl>
                            <span class="quantity">3 × <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">' . get_woocommerce_currency_symbol() . '</span>75.00</span></span>
                        </li>
					</ul>

	                <p class="woocommerce-mini-cart__total total">
		                <strong>Subtotal:</strong> <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">' . get_woocommerce_currency_symbol() . '</span>200.00</span>
                    </p>

                    <p class="woocommerce-mini-cart__buttons buttons"><a href="#" class="button wc-forward">View cart</a><a href="#" class="button checkout wc-forward">Checkout</a></p>
                '
            );
        }

        $show_version = $this->get_att('show_version');

        $additional_classes = array();
        if( $menu_cart['cart_count'] == 0 ) {
            $additional_classes[] = 'tdw-wmc-empty';
        } else if ( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) {
            if( $show_version == 'no_items' ) {
                $additional_classes[] = 'tdw-wmc-empty';
            }
        }

        // toggle icon
        $icon = $this->get_icon_att('tdicon');
        $icon_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $icon_data = 'data-td-svg-icon="' . $this->get_att('tdicon') . '"';
        }

        // toggle text
        $text_position = $this->get_att('toggle_txt_pos');
        $buffy_text = '<span class="tdw-wmc-txt">' . $menu_cart['cart_subtotal'] . '</span>';


        // cart with items
        $cart_normal = '';
        $cart_normal .= '<a class="tdw-wmc-link" href="' . wc_get_cart_url() . '">';
            if( $text_position == 'before' ) {
                $cart_normal .= $buffy_text;
            }

            if( $icon != '' ) {
                $cart_normal .= '<div class="tdw-wmc-icon-wrap">';
                    if( base64_encode( base64_decode( $icon ) ) == $icon ) {
                        $cart_normal .= '<span class="tdw-wmc-icon tdw-wmc-icon-svg" ' . $icon_data . '>' . base64_decode( $icon ) . '</span>';
                    } else {
                        $cart_normal .= '<i class="tdw-wmc-icon ' . $icon . '"></i>';
                    }

                    if( $menu_cart['cart_count'] > 0 ) {
                        $cart_normal .= '<span class="tdw-wmc-count">'. $menu_cart['cart_count'] . '</span>';
                    }
                $cart_normal .= '</div>';
            }

            if( $text_position == '' ) {
                $cart_normal .= $buffy_text;
            }
        $cart_normal .= '</a>';

        $cart_normal .= '<div class="tdw-wmc-widget">';
            $cart_normal .= '<div class="tdw-wmc-widget-inner">';
                $cart_normal .= $menu_cart['cart_contents'];
            $cart_normal .= '</div>';
        $cart_normal .= '</div>';


        // cart without items
        $cart_no_items = '';
        $cart_no_items .= '<a class="tdw-wmc-link" href="' . wc_get_cart_url() . '">';
            if( $text_position == 'before' ) {
                $cart_no_items .= '<span class="tdw-wmc-txt">0,00 ' . get_woocommerce_currency_symbol() . '</span>';
            }

            if( $icon != '' ) {
                $cart_no_items .= '<div class="tdw-wmc-icon-wrap">';
                    $cart_no_items .= '<i class="tdw-wmc-icon ' . $icon . '"></i>';
                    $cart_no_items .= '<span class="tdw-wmc-count">0</span>';
                $cart_no_items .= '</div>';
            }

            if( $text_position == '' ) {
                $cart_no_items .= '<span class="tdw-wmc-txt">0,00 ' . get_woocommerce_currency_symbol() . '</span>';
            }
        $cart_no_items .= '</a>';

        $cart_no_items .= '<div class="tdw-wmc-widget">';
            $cart_no_items .= '<div class="tdw-wmc-widget-inner">';
                $cart_no_items .= '<p class="woocommerce-mini-cart__empty-message">' . __td('No products in the cart.', TD_THEME_NAME) . '</p>';
            $cart_no_items .= '</div>';
        $cart_no_items .= '</div>';

        $buffy = ''; //output buffer

        $buffy .= '<div class="' . $this->get_block_classes($additional_classes) . '" ' . $this->get_block_html_atts() . '>';

		    //get the block js
		    $buffy .= $this->get_block_css();

		    //get the js for this block
		    $buffy .= $this->get_block_js();

		    ob_start();
		    ?>
		    <script>
                /* global _,jQuery: false */
                jQuery( document.body ).on(
                    'added_to_cart removed_from_cart',
                    function( e, fragments ) {

                        _.delay( function () {
                            var tdw_wmc_add_to_cart = jQuery( '.<?php echo $this->block_uid; ?> ' ),
                                tdw_wmc_icon_wrap = tdw_wmc_add_to_cart.find('.tdw-wmc-icon-wrap'),
                                tdw_wmc_count = tdw_wmc_add_to_cart.find('.tdw-wmc-count');

                            var cart_count = jQuery(tdw_wmc_add_to_cart).find('.tdw-wmc-widget-inner').data('cart_contents_count');
                            var cart_subtotal = jQuery(tdw_wmc_add_to_cart).find('.tdw-wmc-widget-inner').data('cart_subtotal');

                            if( parseInt(cart_count) > 0 ) {
                                if( tdw_wmc_count.length ) {
                                    tdw_wmc_count.text(cart_count);
                                } else {
                                    tdw_wmc_icon_wrap.append('<span class="tdw-wmc-count">' + cart_count + '</span>')
                                }
                            } else {
                                tdw_wmc_count.remove();
                            }

                            tdw_wmc_add_to_cart.find('.tdw-wmc-txt').text(cart_subtotal);

                            if ( parseInt(cart_count) === 0 ) {
                                tdw_wmc_add_to_cart.addClass('tdw-wmc-empty');
                            }

                        }, 100);

                    }
                );

                jQuery( window ).on( 'load', function() {
                    if ( tdDetect.isMobileDevice ) {
                        jQuery( '.<?php echo $this->block_uid ?> .tdw-wmc-link' ).on( 'click', function (event) {
                            event.preventDefault();
                        });
                    }
                });

		    </script>
		    <?php
		    td_js_buffer::add_to_footer( "\n" . td_util::remove_script_tag( ob_get_clean() ) );

            $buffy .= '<div id=' . $this->block_uid . ' class="tdw-block-inner">';
                $buffy .= '<div class="tdw-wmc-wrap">';
                    if ( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) {
                        if( $show_version == 'no_items' ) {
                            $buffy .= $cart_no_items;
                        } else {
                            $buffy .= $cart_normal;
                        }
                    } else {
                        $buffy .= $cart_normal;
                    }
                $buffy .= '</div>';
            $buffy .= '</div>';
        $buffy .= '</div>';

        return $buffy;
    }
}
