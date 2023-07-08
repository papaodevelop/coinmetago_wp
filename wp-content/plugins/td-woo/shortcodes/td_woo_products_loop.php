<?php

/**
 * Class td_woo_products_loop - this works on all td woo templates pages that have a loop
 */

class td_woo_products_loop extends td_block {

    static function cssMedia( $res_ctx ) {

        /*-- GENERAL-- */
        $res_ctx->load_settings_raw( 'general_style', 1 );

        // modules per row
        $modules_limit = $res_ctx->get_shortcode_att('limit');
        $modules_on_row = $res_ctx->get_shortcode_att('modules_on_row');
        if ( $modules_on_row == '' ) {
            $modules_on_row = '100%';
        }
        $res_ctx->load_settings_raw( 'modules_on_row', $modules_on_row );
        $modules_number = str_replace('%','',$modules_on_row);
        $modulo_posts = (int)$modules_limit % intval((100/intval($modules_number)));

        // space
        $space = $res_ctx->get_shortcode_att('all_space');
        $res_ctx->load_settings_raw( 'all_space', $space );
        if ( $space != '' ) {
            if( is_numeric( $space ) ) {
                $res_ctx->load_settings_raw( 'all_space', $space . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'all_space', '40px' );
        }

        // modules clearfix
        $padding = 'padding';
        if ( $res_ctx->is( 'all' ) ) {
            $padding = 'padding_desktop';
        }
        switch ($modulo_posts) {
            case '0':
                $res_ctx->load_settings_raw( $padding,  '-n+' . intval(100/intval($modules_number)));
                break;
            case '1':
                $res_ctx->load_settings_raw( $padding,  '1' );
                break;
            case '2':
                $res_ctx->load_settings_raw( $padding,  '-n+2' );
                break;
            case '3':
                $res_ctx->load_settings_raw( $padding,  '-n+3' );
                break;
            case '4':
                $res_ctx->load_settings_raw( $padding,  '-n+4' );
                break;
            case '5':
                $res_ctx->load_settings_raw( $padding,  '-n+5' );
                break;
            case '6':
                $res_ctx->load_settings_raw( $padding,  '-n+6' );
                break;
            case '7':
                $res_ctx->load_settings_raw( $padding,  '-n+7' );
                break;
            case '8':
                $res_ctx->load_settings_raw( $padding,  '-n+8' );
                break;
        }

        // gap
        $gap = $res_ctx->get_shortcode_att('gap');
        $res_ctx->load_settings_raw( 'gap', $gap );
        if ( $gap == '' ) {
            $res_ctx->load_settings_raw( 'gap', '15px');
        } else if ( is_numeric( $gap ) ) {
            $res_ctx->load_settings_raw( 'gap', $gap / 2 .'px' );
        }

        // image width
        $img_width = $res_ctx->get_shortcode_att('img_width');
        if ( is_numeric( $img_width ) ) {
            $res_ctx->load_settings_raw( 'img_width', $img_width . '%' );
        } else {
            $res_ctx->load_settings_raw( 'img_width', $img_width );
        }

        // image_height
        $img_height = $res_ctx->get_shortcode_att('img_height');
        if ( is_numeric( $img_height ) ) {
            $res_ctx->load_settings_raw( 'img_height', $img_height . '%' );
        } else {
            $res_ctx->load_settings_raw( 'img_height', $img_height );
        }

        //image alignment
        $res_ctx->load_settings_raw( 'img_alignment', $res_ctx->get_shortcode_att('img_alignment') . '%' );

        // image position
        $img_pos = $res_ctx->get_shortcode_att('img_pos');
        if( $img_pos == '' || $img_pos == 'normal' || $img_pos == 'hidden' ) {
            $res_ctx->load_settings_raw( 'module_direction', 'column' );
        } else {
            $res_ctx->load_settings_raw( 'module_direction', 'row' );
        }
        if( $img_pos == 'right' ) {
            $res_ctx->load_settings_raw( 'img_last', 1 );
        } else {
            $res_ctx->load_settings_raw( 'img_first', 1 );
        }
        if( $img_pos == 'hidden' ) {
            $res_ctx->load_settings_raw( 'img_show', 'none' );
        } else {
            $res_ctx->load_settings_raw( 'img_show', 'block' );
        }


        // image space
        $img_space = $res_ctx->get_shortcode_att('img_space');
        $res_ctx->load_settings_raw( 'img_space', $img_space );
        if ( $img_space != '' && is_numeric( $img_space ) ) {
            $res_ctx->load_settings_raw( 'img_space', $img_space . 'px' );
        }

        // image radius
        $img_radius = $res_ctx->get_shortcode_att('img_radius');
        $res_ctx->load_settings_raw( 'img_radius', $img_radius );
        if ( $img_radius != '' && is_numeric( $img_radius ) ) {
            $res_ctx->load_settings_raw( 'img_radius', $img_radius . 'px' );
        }


        // sale tag margin
        $sale_margin = $res_ctx->get_shortcode_att('sale_margin');
        $res_ctx->load_settings_raw( 'sale_margin', $sale_margin );
        if ( $sale_margin != '' && is_numeric( $sale_margin ) ) {
            $res_ctx->load_settings_raw( 'sale_margin', $sale_margin . 'px' );
        }

        // sale tag padding
        $sale_padding = $res_ctx->get_shortcode_att('sale_padding');
        $res_ctx->load_settings_raw( 'sale_padding', $sale_padding );
        if ( $sale_padding != '' && is_numeric( $sale_padding ) ) {
            $res_ctx->load_settings_raw( 'sale_padding', $sale_padding . 'px' );
        }

        // sale tag border size
        $sale_border = $res_ctx->get_shortcode_att( 'sale_border' );
        $res_ctx->load_settings_raw( 'sale_border', $sale_border );
        if( $sale_border != '' && is_numeric( $sale_border ) ) {
            $res_ctx->load_settings_raw( 'sale_border', $sale_border . 'px' );
        }
        // sale tag border style
        $res_ctx->load_settings_raw( 'sale_border_style', $res_ctx->get_shortcode_att( 'sale_border_style'  ) );
        // sale tag border radius
        $sale_radius = $res_ctx->get_shortcode_att( 'sale_radius' );
        $res_ctx->load_settings_raw( 'sale_radius', $sale_radius );
        if( $sale_radius != '' && is_numeric( $sale_radius ) ) {
            $res_ctx->load_settings_raw( 'sale_radius', $sale_radius . 'px' );
        }


        // favorite button size
        $fav_size = 36;
        switch ( $res_ctx->get_shortcode_att('fav_size') ) {
            case '1':
                $fav_size = 28;
                break;
            case '2':
                $fav_size = 36;
                break;
            case '3':
                $fav_size = 40;
                break;
            case '4':
                $fav_size = 46;
                break;
        }
        $res_ctx->load_settings_raw( 'fav_size', $fav_size . 'px' );

        // favorite button space
        $fav_space = $res_ctx->get_shortcode_att('fav_space');
        $res_ctx->load_settings_raw( 'fav_space', $fav_space );
        if( $fav_space != '' && is_numeric( $fav_space ) ) {
            $res_ctx->load_settings_raw( 'fav_space', $fav_space . 'px' );
        }

        // meta info vertical align
        $meta_info_align = $res_ctx->get_shortcode_att('meta_info_align');
        $res_ctx->load_settings_raw( 'meta_info_align', $meta_info_align );

        // meta info horiz align
        $horiz_align = $res_ctx->get_shortcode_att('horiz_align');
        if( $horiz_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'horiz_align_left', 1 );
        } else if( $horiz_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'horiz_align_center', 1 );
        } else if( $horiz_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'horiz_align_right', 1 );
        }

        // meta info width
        $meta_info_width = $res_ctx->get_shortcode_att('meta_width');
        $res_ctx->load_settings_raw( 'meta_width', $meta_info_width );
        if( $meta_info_width != '' && is_numeric( $meta_info_width ) ) {
            $res_ctx->load_settings_raw( 'meta_width', $meta_info_width . 'px' );
        }

        // meta info margin
        $meta_margin = $res_ctx->get_shortcode_att('meta_margin');
        $res_ctx->load_settings_raw( 'meta_margin', $meta_margin );
        if ( is_numeric( $meta_margin ) ) {
            $res_ctx->load_settings_raw( 'meta_margin', $meta_margin . 'px' );
        }

        // meta info padding
        $meta_padding = $res_ctx->get_shortcode_att('meta_padding');
        $res_ctx->load_settings_raw( 'meta_padding', $meta_padding );
        if ( is_numeric( $meta_padding ) ) {
            $res_ctx->load_settings_raw( 'meta_padding', $meta_padding . 'px' );
        }

        // meta info border width
        $meta_info_border_size = $res_ctx->get_shortcode_att('meta_info_border_size');
        $res_ctx->load_settings_raw( 'meta_info_border_size', $meta_info_border_size );
        if ( is_numeric( $meta_info_border_size ) ) {
            $res_ctx->load_settings_raw( 'meta_info_border_size', $meta_info_border_size . 'px' );
        }

        // meta info border style
        $res_ctx->load_settings_raw( 'meta_info_border_style', $res_ctx->get_shortcode_att('meta_info_border_style') );


        // title space
        $title_space = $res_ctx->get_shortcode_att('title_space');
        $res_ctx->load_settings_raw( 'title_space', $title_space );
        if ( $title_space != '' && is_numeric( $title_space ) ) {
            $res_ctx->load_settings_raw( 'title_space', $title_space . 'px' );
        }

        // show excerpt
        $prod_excerpt = $res_ctx->get_shortcode_att('show_excerpt');
        $res_ctx->load_settings_raw( 'show_excerpt', $prod_excerpt );
        if( $prod_excerpt == '' ) {
            $res_ctx->load_settings_raw( 'show_excerpt', 'none' );

        }

        // excerpt space
        $art_excerpt = $res_ctx->get_shortcode_att('excerpt_space');
        $res_ctx->load_settings_raw( 'excerpt_space', $art_excerpt );
        if ( is_numeric( $art_excerpt ) ) {
            $res_ctx->load_settings_raw( 'excerpt_space', $art_excerpt . 'px' );
        }

        // show stars
        $res_ctx->load_settings_raw( 'show_stars', $res_ctx->get_shortcode_att('show_stars') );

        // stars size
        $stars_size = $res_ctx->get_shortcode_att('stars_size');
        $res_ctx->load_settings_raw( 'stars_size', $stars_size );
        if ( $stars_size != '' && is_numeric( $stars_size ) ) {
            $res_ctx->load_settings_raw( 'stars_size', $stars_size . 'px' );
        }

        // stars space
        $stars_space = $res_ctx->get_shortcode_att('stars_space');
        $res_ctx->load_settings_raw( 'stars_space', $stars_space );
        if ( $stars_space != '' && is_numeric( $stars_space ) ) {
            $res_ctx->load_settings_raw( 'stars_space', $stars_space . 'px' );
        }

        // price space
        $price_space = $res_ctx->get_shortcode_att('price_space');
        $res_ctx->load_settings_raw( 'price_space', $price_space );
        if ( $price_space != '' && is_numeric( $price_space ) ) {
            $res_ctx->load_settings_raw( 'price_space', $price_space . 'px' );
        }

        // meta info horiz align
//        $horiz_align = $res_ctx->get_shortcode_att('horiz_align');
//        if( $horiz_align == 'content-horiz-left' ) {
//            $res_ctx->load_settings_raw( 'horiz_align_left', 1 );
//        } else if( $horiz_align == 'content-horiz-center' ) {
//            $res_ctx->load_settings_raw( 'horiz_align_center', 1 );
//        } else if( $horiz_align == 'content-horiz-right' ) {
//            $res_ctx->load_settings_raw( 'horiz_align_right', 1 );
//        }

        // button padding
        $btn_padding = $res_ctx->get_shortcode_att('btn_padding');
        $res_ctx->load_settings_raw( 'btn_padding', $btn_padding );
        if ( $btn_padding != '' && is_numeric( $btn_padding ) ) {
            $res_ctx->load_settings_raw( 'btn_padding', $btn_padding . 'px' );
        }

        // button border size
        $btn_border = $res_ctx->get_shortcode_att('btn_border');
        $res_ctx->load_settings_raw( 'btn_border', $btn_border );
        if ( $btn_border != '' && is_numeric( $btn_border ) ) {
            $res_ctx->load_settings_raw( 'btn_border', $btn_border . 'px' );
        }

        // button border style
        $btn_border_style = $res_ctx->get_shortcode_att('btn_border_style');
        $res_ctx->load_settings_raw( 'btn_border_style', $btn_border_style );

        // button border radius
        $btn_radius = $res_ctx->get_shortcode_att('btn_radius');
        $res_ctx->load_settings_raw( 'btn_radius', $btn_radius );
        if ( $btn_radius != '' && is_numeric( $btn_radius ) ) {
            $res_ctx->load_settings_raw( 'btn_radius', $btn_radius . 'px' );
        }

        // show button
        $res_ctx->load_settings_raw( 'show_btn', $res_ctx->get_shortcode_att('show_btn') );

        // pagination space
        $pag_space = $res_ctx->get_shortcode_att('pag_space');
        $res_ctx->load_settings_raw( 'pag_space', $pag_space );
        if( $pag_space != '' && is_numeric( $pag_space ) ) {
            $res_ctx->load_settings_raw( 'pag_space', $pag_space . 'px' );
        }
        // pagination padding
        $pag_padding = $res_ctx->get_shortcode_att('pag_padding');
        $res_ctx->load_settings_raw( 'pag_padding', $pag_padding );
        if( $pag_padding != '' && is_numeric( $pag_padding ) ) {
            $res_ctx->load_settings_raw( 'pag_padding', $pag_padding . 'px' );
        }
        // pagination border width
        $pag_border_width = $res_ctx->get_shortcode_att('pag_border_width');
        $res_ctx->load_settings_raw( 'pag_border_width', $pag_border_width );
        if( $pag_border_width != '' && is_numeric( $pag_border_width ) ) {
            $res_ctx->load_settings_raw( 'pag_border_width', $pag_border_width . 'px' );
        }
        // pagination border radius
        $pag_border_radius = $res_ctx->get_shortcode_att('pag_border_radius');
        $res_ctx->load_settings_raw( 'pag_border_radius', $pag_border_radius );
        if( $pag_border_radius != '' && is_numeric( $pag_border_radius ) ) {
            $res_ctx->load_settings_raw( 'pag_border_radius', $pag_border_radius . 'px' );
        }
        // next/prev icons size
        $pag_icons_size = $res_ctx->get_shortcode_att('pag_icons_size');
        $res_ctx->load_settings_raw( 'pag_icons_size', $pag_icons_size );
        if( $pag_icons_size != '' && is_numeric( $pag_icons_size ) ) {
            $res_ctx->load_settings_raw( 'pag_icons_size', $pag_icons_size . 'px' );
        }


        /*-- COLORS -- */
        $res_ctx->load_settings_raw( 'res_color', $res_ctx->get_shortcode_att('res_color') );
        $res_ctx->load_settings_raw( 'sale_txt_color', $res_ctx->get_shortcode_att('sale_txt_color') );
        $res_ctx->load_settings_raw( 'sale_txt_color_h', $res_ctx->get_shortcode_att('sale_txt_color_h') );
        $res_ctx->load_settings_raw( 'sale_bg_color', $res_ctx->get_shortcode_att('sale_bg_color') );
        $res_ctx->load_settings_raw( 'sale_bg_color_h', $res_ctx->get_shortcode_att('sale_bg_color_h') );
        $res_ctx->load_settings_raw('sale_border_color', $res_ctx->get_shortcode_att( 'sale_border_color' ));
        $res_ctx->load_settings_raw('sale_border_color_h', $res_ctx->get_shortcode_att( 'sale_border_color_h' ));

        $res_ctx->load_settings_raw( 'fav_ico_color', $res_ctx->get_shortcode_att('fav_ico_color') );
        $res_ctx->load_settings_raw( 'fav_ico_color_h', $res_ctx->get_shortcode_att('fav_ico_color_h') );
        $res_ctx->load_settings_raw( 'fav_bg', $res_ctx->get_shortcode_att('fav_bg') );
        $res_ctx->load_settings_raw( 'fav_bg_h', $res_ctx->get_shortcode_att('fav_bg_h') );
        $res_ctx->load_shadow_settings( 4, 1, 1, 0, 'rgba(0, 0, 0, 0.2)', 'fav_shadow' );

        $res_ctx->load_settings_raw( 'meta_bg', $res_ctx->get_shortcode_att('meta_bg') );
        $res_ctx->load_settings_raw( 'meta_border_color', $res_ctx->get_shortcode_att('meta_border_color') );

        $res_ctx->load_settings_raw( 'title_color', $res_ctx->get_shortcode_att('title_color') );
        $res_ctx->load_settings_raw( 'title_color_h', $res_ctx->get_shortcode_att('title_color_h') );

        $res_ctx->load_settings_raw( 'ex_txt', $res_ctx->get_shortcode_att('ex_txt') );

        $res_ctx->load_settings_raw( 'stars_full_color', $res_ctx->get_shortcode_att( 'stars_full_color' ) );
        $res_ctx->load_settings_raw( 'stars_empty_color', $res_ctx->get_shortcode_att( 'stars_empty_color' ) );

        $res_ctx->load_settings_raw( 'price_color', $res_ctx->get_shortcode_att('price_color') );
        $res_ctx->load_settings_raw( 'price_sale_color', $res_ctx->get_shortcode_att('price_sale_color') );
        $res_ctx->load_settings_raw( 'old_price_color', $res_ctx->get_shortcode_att('old_price_color') );

        $res_ctx->load_settings_raw( 'btn_txt_color', $res_ctx->get_shortcode_att('btn_txt_color') );
        $res_ctx->load_settings_raw( 'btn_txt_color_h', $res_ctx->get_shortcode_att('btn_txt_color_h') );
        $res_ctx->load_settings_raw( 'btn_bg_color', $res_ctx->get_shortcode_att('btn_bg_color') );
        $res_ctx->load_settings_raw( 'btn_bg_color_h', $res_ctx->get_shortcode_att('btn_bg_color_h') );
        $res_ctx->load_settings_raw( 'btn_border_color', $res_ctx->get_shortcode_att('btn_border_color') );
        $res_ctx->load_settings_raw( 'btn_border_color_h', $res_ctx->get_shortcode_att('btn_border_color_h') );

        $res_ctx->load_settings_raw( 'pag_text', $res_ctx->get_shortcode_att('pag_text') );
        $res_ctx->load_settings_raw( 'pag_bg', $res_ctx->get_shortcode_att('pag_bg') );
        $res_ctx->load_settings_raw( 'pag_border', $res_ctx->get_shortcode_att('pag_border') );
        $res_ctx->load_settings_raw( 'pag_h_text', $res_ctx->get_shortcode_att('pag_h_text') );
        $res_ctx->load_settings_raw( 'pag_h_bg', $res_ctx->get_shortcode_att('pag_h_bg') );
        $res_ctx->load_settings_raw( 'pag_h_border', $res_ctx->get_shortcode_att('pag_h_border') );
        $res_ctx->load_settings_raw( 'pag_a_text', $res_ctx->get_shortcode_att('pag_a_text') );
        $res_ctx->load_settings_raw( 'pag_a_bg', $res_ctx->get_shortcode_att('pag_a_bg') );
        $res_ctx->load_settings_raw( 'pag_a_border', $res_ctx->get_shortcode_att('pag_a_border') );


        /*-- LAYOUT -- */

        // results show
        $res_ctx->load_settings_raw( 'res_show', $res_ctx->get_shortcode_att('res_show') );

        // results padding
        $res_padding = $res_ctx->get_shortcode_att('res_padding');
        $res_ctx->load_settings_raw( 'res_padding', $res_padding );
        if( $res_padding != '' && is_numeric( $res_padding ) ) {
            $res_ctx->load_settings_raw( 'res_padding', $res_padding . 'px' );
        }

        // results text horizontal align
        $res_horiz_align = $res_ctx->get_shortcode_att('res_horiz_align');
        if( $res_horiz_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'res_horiz_align_left', 1 );
        } else if( $res_horiz_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'res_horiz_align_center', 1 );
        } else if( $res_horiz_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'res_horiz_align_right', 1 );
        }


        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_header' );
        $res_ctx->load_font_settings( 'f_res' );
        $res_ctx->load_font_settings( 'f_sale' );
        $res_ctx->load_font_settings( 'f_title' );
        $res_ctx->load_font_settings( 'f_ex' );
        $res_ctx->load_font_settings( 'f_price' );
        $res_ctx->load_font_settings( 'f_old_price' );
        $res_ctx->load_font_settings( 'f_btn' );
        $res_ctx->load_font_settings( 'f_more' );

    }

    public function get_custom_css() {
        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $unique_block_class = $this->block_uid;
        $unique_block_modal_class = $this->block_uid . '_m';

        $td_woo_url = TD_WOO_URL;

        $compiled_css = '';

        $raw_css =
            "<style>
            
                /* @general_style */
                .td_woo_products_loop .woocommerce-result-count {
                    float: none;
                }
                .td_woo_products_loop .tdw-block-inner {
                    display: flex;
                    flex-wrap: wrap;
                }
                .td_woo_products_loop .td_woo_product_module {
                    margin: 0 0 40px;
                    padding-bottom: 0;
                }
                .td_woo_products_loop .td-module-container {
                    display: flex;
                }
                .td_woo_products_loop .td-image-container {
                    flex: 0 0 auto;
                    width: 100%;
                    position: relative;
                    margin-bottom: 14px;
                }
                .td_woo_products_loop .td-module-thumb {
                    margin-bottom: 0;
                }
                .td_woo_products_loop .td-image-wrap {
                    display: block;
                    position: relative;
                    padding-bottom: 100%;
                }
                .td_woo_products_loop .td-thumb-css {
                    width: 100%;
                    height: 100%;
                    position: absolute;
                    background-size: cover;
                    background-position: center center;
                }
                .td_woo_products_loop .td-image-container img {
                    width: 100%;
                    display: block;
                }
                .td_woo_products_loop .td_woo_product_module .onsale {
                    top: 0;
                    left: auto;
                    right: 0;
                    margin: 0;
                    padding: 10px;
                    min-width: 0;
                    min-height: 0;
                    background-color: #4db2ec;
                    color: #fff;
                    position: absolute;
                    font-size: 12px;
                    line-height: 1;
                    border: 0 solid #000;
                    border-radius: 0;
                }
                .td_woo_products_loop .td_woo_product_module .td-favorite {
                    position: absolute;
                    bottom: 10px;
                    right: 10px;
                    width: 1em;
                    height: 1em;
                    background-color: #fff;
                    border-radius: 100%;
                    cursor: pointer;
                }
                .td_woo_products_loop .td_woo_product_module .td-favorite-ico {
                    display: block;
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    width: 0.556em;
                    height: auto;
                    fill: #000;
                    transition: opacity .2s ease-in-out;
                }
                .td_woo_products_loop .td_woo_product_module .td-favorite-ico-full {
                    opacity: 0;
                }
                .td_woo_products_loop .td_woo_product_module .td-favorite:hover .td-favorite-ico-empty,
                .td_woo_products_loop .td_woo_product_module .tdc-favorite-selected .td-favorite-ico-empty {
                    opacity: 0;
                }
                .td_woo_products_loop .td_woo_product_module .td-favorite:hover .td-favorite-ico-full,
                .td_woo_products_loop .td_woo_product_module .tdc-favorite-selected .td-favorite-ico-full {
                    opacity: 1;
                }
                .td_woo_products_loop .td-module-meta-info {
                    margin: 0;   
                    border-width: 0;
                    border-style: solid;
                    border-color: #000;
                }
                .td_woo_products_loop .td-module-title {
                    margin: 0 0 5px;
                    padding: 0;
                    font-family: 'Roboto', sans-serif;
                    font-size: 15px;
                    font-weight: 500;
                    line-height: 1.4;
                }
                body div.td_woo_products_loop .star-rating {
                    float: none;
                    display: inline-block;
                    margin: 0 0 6px;
                    width: auto;
                    height: auto;
                    font-family: star;
                    overflow: hidden;
                    position: relative;
                    line-height: 1;
                    font-size: 1em;
                }
                body div.td_woo_products_loop .star-rating:before,
                body div.td_woo_products_loop .star-rating span:before {
                    position: relative;
                    top: 0;
                    left: 0;
                    font-size: 12px;
                }
                body div.td_woo_products_loop .star-rating:before {
                    content: '\\73\\73\\73\\73\\73';
                    color: #d3ced2;
                    float: left;
                }
                body div.td_woo_products_loop .star-rating span:before {
                    content: '\\53\\53\\53\\53\\53';
                }
                body div.td_woo_products_loop .star-rating span {
                    padding-top: 0;
                    overflow: hidden;
                    float: left;
                    top: 0;
                    left: 0;
                    position: absolute;
                    font-size: 0;
                }
                div.td_woo_products_loop div.td_woo_product_module .price {
                    display: block;
                    margin-bottom: 18px;
                    font-family: Verdana, Geneva, sans-serif;
                    font-size: 13px;
                    line-height: 1.7;
                    font-weight: 500;
                    color: #111;
                }
                div.td_woo_products_loop div.td_woo_product_module .price del {
                    font-size: 0.85em !important;
                    color: #000;
                }
                div.td_woo_products_loop div.td_woo_product_module .price ins {
                    font-weight: inherit;
                    background: transparent;
                }               
                .td_woo_products_loop .td_woo_product_module a.button {
                    background: none #222;
                    font-size: 11px;
                    padding: 10px;
                    text-shadow: none;
                    color: #fff;
                    border-width: 0;
                    border-style: solid;
                    border-color: #000;
                    border-radius: 0;
                    box-shadow: none;
                }
                .td_woo_products_loop .td_woo_product_module a.button:hover {
                    background-color: #4db2ec;
                }
                .td_woo_products_loop .td_woo_product_module a.button.loading:after {
                    display: none;
                }
                .td_woo_products_loop .td_woo_product_module a.added_to_cart {
                    display: none;    
                }
                body:not(.woocommerce) .td_woo_products_loop .td_woo_product_module a.button.loading {
                    opacity: .25;
                }
                body:not(.woocommerce) .td_woo_products_loop .td_woo_product_module a.button.added:after {
                    content: '\\e017';
                    font-family: WooCommerce;
                    vertical-align: bottom;
                    margin-left: 0.53em;
                }
                .td_woo_products_loop .page-nav,
                .td_woo_products_loop .td-next-prev-wrap,
                .td_woo_products_loop .td-load-more-wrap {
                    margin-top: 40px;
                }
                .td_woo_products_loop .page-nav {
                    margin-bottom: 0;
                    display: block;
                }
                .td_woo_products_loop .td-next-prev-wrap a {
                    width: auto;
                    height: auto;
                    min-width: 25px;
                    min-height: 25px;
                }
                .td_woo_products_loop.tdc-no-posts .td_block_inner:after {
                    content: 'No results' !important;
                    width: 100%;
                }
                
                .td_woo_products_loop.tdc-no-posts .td_block_inner {
                    margin: 0;
                }
                
                .td_woo_products_loop .tdw-block-inner .td-woo-fix-block-inner-negative-margin {
                    margin-left: 15px;
                }
                
                
                
                /* @res_show */
                body .$unique_block_class .woocommerce-result-count {
                    display: @res_show;
                }
                /* @res_padding */
                body .$unique_block_class .woocommerce-result-count {
                    margin: @res_padding;
                }
                /* @res_horiz_align_left */
                body .$unique_block_class .woocommerce-result-count {
                    text-align: left;
                }
                /* @res_horiz_align_center */
                body .$unique_block_class .woocommerce-result-count {
                    text-align: center;
                }
                /* @res_horiz_align_right */
                body .$unique_block_class .woocommerce-result-count {
                    text-align: right;
                }
                
                
                
                /* @modules_on_row */
				body .$unique_block_class .td_woo_product_module {
					width: @modules_on_row;
                }
				/* @all_space */
				body .$unique_block_class .td_woo_product_module {
					margin-bottom: @all_space;
                }
				/* @padding_desktop */
				body .$unique_block_class .td_woo_product_module:nth-last-child(@padding_desktop) {
					margin-bottom: 0;
				}
				/* @padding */
				body .$unique_block_class .td_woo_product_module {
					margin-bottom: @all_space !important;
                }
				body .$unique_block_class .td_woo_product_module:nth-last-child(@padding) {
					margin-bottom: 0 !important;
				}
				/* @gap */
				body .$unique_block_class .td_woo_product_module {
					padding-left: @gap;
					padding-right: @gap;
				}
				body .$unique_block_class .tdw-block-inner {
					margin-left: -@gap;
					margin-right: -@gap;
				}
                
                
                /* @img_width */
				body .$unique_block_class .td-image-container {
				 	flex: 0 0 @img_width;
				 	width: @img_width;
			    }
				.ie10 .$unique_block_class .td-image-container,
				.ie11 .$unique_block_class .td-image-container {
				 	flex: 0 0 auto;
			    }
				/* @img_height */
				body .$unique_block_class .td-image-wrap {
					padding-bottom: @img_height;
				}
				/* @img_alignment */
				body .$unique_block_class .entry-thumb {
					background-position: center @img_alignment;
				}
				/* @module_direction */
				body .$unique_block_class .td-module-container {
					flex-direction: @module_direction;
                }
				/* @img_first */
				body .$unique_block_class .td-image-container {
					order: 1;
                }
				body .$unique_block_class .td-module-meta-info {
					order: 2;
                }
				/* @img_last */
				body .$unique_block_class .td-image-container {
					order: 2;
                }
				body .$unique_block_class .td-module-meta-info {
					order: 1;
                }
				/* @img_show */
				body .$unique_block_class .td-image-container {
					display: @img_show;
                }
                
				/* @img_space */
				body .$unique_block_class .td-image-container {
					margin-bottom: @img_space;
                }
                /* @img_radius */
				body .$unique_block_class .entry-thumb {
					border-radius: @img_radius;
                }
				/* @sale_margin */
				body .$unique_block_class .td_woo_product_module .onsale {
					margin: @sale_margin;
                }
				/* @sale_padding */
				body .$unique_block_class .td_woo_product_module .onsale {
					padding: @sale_padding;
                }
                /* @sale_border */
                body .$unique_block_class .td_woo_product_module .onsale {
                    border-width: @sale_border;
                } 
                /* @sale_border_style */
                body .$unique_block_class .td_woo_product_module .onsale {
                    border-style: @sale_border_style;
                }      
                /* @sale_radius */
                body .$unique_block_class .td_woo_product_module .onsale {
                    border-radius: @sale_radius;
                }  
                
                /* @fav_size */
                body .$unique_block_class .td_woo_product_module .td-favorite {
                    font-size: @fav_size;
                }
                /* @fav_space */
                body .$unique_block_class .td_woo_product_module .td-favorite {
                    bottom: @fav_space;
                    right: @fav_space;
                }
                
                /* @meta_info_align */
				body .$unique_block_class .td-module-meta-info {
				    display: flex;
				    flex-direction: column;
					justify-content: @meta_info_align;
				}
				/* @meta_width */
				body .$unique_block_class .td-module-meta-info {
					max-width: @meta_width;
				}
				/* @meta_margin */
				body .$unique_block_class .td-module-meta-info {
					margin: @meta_margin;
				}
				/* @meta_padding */
				body .$unique_block_class .td-module-meta-info {
					padding: @meta_padding;
				}
				/* @meta_info_border_size */
				body .$unique_block_class .td-module-meta-info {
					border-width: @meta_info_border_size;
				}
				/* @meta_info_border_style */
				body .$unique_block_class .td-module-meta-info {
					border-style: @meta_info_border_style;
				}
                
                
				/* @title_space */
				body .$unique_block_class .td-module-title {
					margin-bottom: @title_space;
                }
                
                /* @show_excerpt */
				.$unique_block_class .td-excerpt {
					display: @show_excerpt;
				}
                /* @excerpt_space */
				.$unique_block_class .td-excerpt {
					margin: @excerpt_space;
				}
				
				/* @show_stars */
				html body div.$unique_block_class .star-rating {
					display: @show_stars;
                }
				/* @stars_size */
				html body div.$unique_block_class .star-rating:before,
                html body div.$unique_block_class .star-rating span:before {
					font-size: @stars_size;
                }
				/* @stars_space */
				html body div.$unique_block_class .star-rating {
					margin-bottom: @stars_space;
                }
				/* @price_space */
				body div.$unique_block_class div.td_woo_product_module .price {
					margin-bottom: @price_space;
                }
                
               /* @horiz_align_left */
				.$unique_block_class .td-module-meta-info {
					align-items: flex-start;
                }
				.$unique_block_class .td-module-meta-info .td-module-title {
				    text-align: left;
				}
				/* @horiz_align_center */
				.$unique_block_class .td-module-meta-info {
					align-items: center;
                }
				.$unique_block_class .td-module-meta-info .td-module-title {
				    text-align: center;
				}
				/* @horiz_align_right */
				.$unique_block_class .td-module-meta-info {
					align-items: flex-end;
                }
				.$unique_block_class .td-module-meta-info .td-module-title {
				    text-align: right;
				}
                
				/* @btn_padding */
				body .$unique_block_class .td_woo_product_module a.button {
					padding: @btn_padding;
                }
				/* @btn_border */
				body .$unique_block_class .td_woo_product_module a.button {
					border-width: @btn_border;
                }
				/* @btn_border_style */
				body .$unique_block_class .td_woo_product_module a.button {
					border-style: @btn_border_style;
                }
				/* @btn_radius */
				body .$unique_block_class .td_woo_product_module a.button {
					border-radius: @btn_radius;
                }
				/* @show_btn */
				body .$unique_block_class .td_woo_product_module a.button {
					display: @show_btn;
                }
				
				/* @pag_space */
				.$unique_block_class .page-nav,
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap,
				.$unique_block_class .td-load-more-wrap {
					margin-top: @pag_space;
				}
				/* @pag_padding */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a,
				.$unique_block_class .page-nav a,
				.$unique_block_class .page-nav .current,
				.$unique_block_class .page-nav .extend,
				.$unique_block_class .page-nav .pages,
				.$unique_block_class .td-load-more-wrap a {
					padding: @pag_padding;
				}
				.$unique_block_class .page-nav .pages {
				    padding-right: 0;
				}
				/* @pag_border_width */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a,
				.$unique_block_class .page-nav a,
				.$unique_block_class .page-nav .current,
				.$unique_block_class .page-nav .extend,
				.$unique_block_class .page-nav .pages,
				.$unique_block_class .td-load-more-wrap a {
					border-width: @pag_border_width;
				}
				.$unique_block_class .page-nav .extend {
				    border-style: solid;
				    border-color: transparent;
				}
				.$unique_block_class .page-nav .pages {
				    border-style: solid;
				    border-color: transparent;
				    border-right-width: 0;
				}
				/* @pag_border_radius */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a,
				.$unique_block_class .page-nav a,
				.$unique_block_class .page-nav .current,
				.$unique_block_class .td-load-more-wrap a {
					border-radius: @pag_border_radius;
				}
				/* @pag_icons_size */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a,
				.$unique_block_class .td-load-more-wrap a i,
				.$unique_block_class .page-nav a i {
					font-size: @pag_icons_size;
				}
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap .td-next-prev-icon-svg svg,
				.$unique_block_class .page-nav .page-nav-icon-svg svg {
				    width: @pag_icons_size;
				    height: calc( @pag_icons_size + 1px );
				}
                
                /* @res_color */
                body .$unique_block_class .woocommerce-result-count {
                    color: @res_color;
                }
                
				/* @sale_txt_color */
				body .$unique_block_class .td_woo_product_module .onsale {
					color: @sale_txt_color;
                }
				/* @sale_txt_color_h */
				.body .$unique_block_class .td_woo_product_module:hover .onsale {
					color: @sale_txt_color_h;
                }
				/* @sale_bg_color */
				body .$unique_block_class .td_woo_product_module .onsale {
					background-color: @sale_bg_color;
                }
				/* @sale_bg_color_h */
				body .$unique_block_class .td_woo_product_module:hover .onsale {
					background-color: @sale_bg_color_h;
                }
                /* @sale_border_color */
                body .$unique_block_class .td_woo_product_module .onsale {
                    border-color: @sale_border_color;
                }
                /* @sale_border_color_h */
                body .$unique_block_class .td_woo_product_module:hover .onsale {
                    border-color: @sale_border_color_h;
                }
                
                /* @fav_ico_color */
                body .$unique_block_class .td_woo_product_module .td-favorite svg {
                    fill: @fav_ico_color;
                }
                /* @fav_ico_color_h */
                body .$unique_block_class .td_woo_product_module .td-favorite:hover svg {
                    fill: @fav_ico_color_h;
                }
                /* @fav_bg */
                body .$unique_block_class .td_woo_product_module .td-favorite {
                    background-color: @fav_bg;
                }
                /* @fav_bg_h */
                body .$unique_block_class .td_woo_product_module .td-favorite:hover {
                    background-color: @fav_bg_h;
                }
                /* @fav_shadow */
                body .$unique_block_class .td_woo_product_module .td-favorite {
                    box-shadow: @fav_shadow;
                }
                
				/* @meta_bg */
				body .$unique_block_class .td-module-meta-info {
					background-color: @meta_bg;
                }
				/* @meta_border_color */
				body .$unique_block_class .td-module-meta-info {
					border-color: @meta_border_color;
                }
                
				/* @title_color */
				body .$unique_block_class .td-module-title a {
					color: @title_color;
                }
				/* @title_color_h */
				body .$unique_block_class .td_woo_product_module:hover .td-module-title a {
					color: @title_color_h;
                }
                
                 /* @ex_txt */
				.$unique_block_class .td-excerpt {
					color: @ex_txt;
				}
                            
                /* @stars_full_color */
                html body div.$unique_block_class .star-rating span:before {
                    color: @stars_full_color;
                }     
                /* @stars_empty_color */
                html body div.$unique_block_class .star-rating:before {
                    color: @stars_empty_color;
                }
                
				/* @price_color */
				body div.$unique_block_class div.td_woo_product_module .price {
					color: @price_color;
                }
				/* @price_sale_color */
				body div.$unique_block_class div.td_woo_product_module .price ins {
					color: @price_sale_color;
                }
				/* @old_price_color */
				body div.$unique_block_class div.td_woo_product_module .price del {
					color: @old_price_color;
                }
                
				/* @btn_txt_color */
				body .$unique_block_class .td_woo_product_module a.button {
					color: @btn_txt_color;
                }
				/* @btn_txt_color_h */
				body .$unique_block_class .td_woo_product_module a.button:hover {
					color: @btn_txt_color_h;
                }
				/* @btn_bg_color */
				body .$unique_block_class .td_woo_product_module a.button {
					background-color: @btn_bg_color;
                }
				/* @btn_bg_color_h */
				body .$unique_block_class .td_woo_product_module a.button:hover {
					background-color: @btn_bg_color_h;
                }
				/* @btn_border_color */
				body .$unique_block_class .td_woo_product_module a.button {
					border-color: @btn_border_color;
                }
				/* @btn_border_color_h */
				body .$unique_block_class .td_woo_product_module a.button:hover {
					border-color: @btn_border_color_h;
                }
                
				/* @pag_text */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a,
				.$unique_block_class .page-nav a,
				.$unique_block_class .td-load-more-wrap a {
					color: @pag_text;
				}
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap .td-next-prev-icon-svg svg,
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap .td-next-prev-icon-svg svg *,
				.$unique_block_class .page-nav .page-nav-icon-svg svg ,
				.$unique_block_class .page-nav .page-nav-icon-svg svg * {
				    fill: @pag_text;
				}
				/* @pag_bg */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a,
				.$unique_block_class .page-nav a,
				.$unique_block_class .td-load-more-wrap a {    
					background-color: @pag_bg;
				}
				/* @pag_border */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a,
				.$unique_block_class .page-nav a,
				.$unique_block_class .td-load-more-wrap a {
					border-color: @pag_border;
				}
				/* @pag_h_text */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a:hover,
				.$unique_block_class .page-nav a:hover,
				.$unique_block_class .td-load-more-wrap a:hover {
					color: @pag_h_text;
				}
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a:hover .td-next-prev-icon-svg svg,
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a:hover .td-next-prev-icon-svg svg *,
				.$unique_block_class .page-nav a:hover .page-nav-icon-svg svg ,
				.$unique_block_class .page-nav a:hover .page-nav-icon-svg svg * {
				    fill: @pag_h_text;
				}
				/* @pag_h_bg */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a:hover,
				.$unique_block_class .page-nav a:hover,
				.$unique_block_class .td-load-more-wrap a:hover {    
					background-color: @pag_h_bg !important;
					border-color: @pag_h_bg !important;
				}
				/* @pag_h_border */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a:hover,
				.$unique_block_class .page-nav a:hover,
				.$unique_block_class .td-load-more-wrap a:hover {
					border-color: @pag_h_border !important;
				}
				/* @pag_a_text */
				.$unique_block_class .page-nav .current {
					color: @pag_a_text;
				}
				/* @pag_a_bg */
				.$unique_block_class .page-nav .current {    
					background-color: @pag_a_bg;
				}
				/* @pag_a_border */
				.$unique_block_class .page-nav .current {
					border-color: @pag_a_border;
				}
                
                /* @f_res */
                body .$unique_block_class .woocommerce-result-count {
                    @f_res
                }
                /* @f_header */
				.$unique_block_class .td-block-title a,
				.$unique_block_class .td-block-title span {
					@f_header
				}
                /* @f_sale */
				body .$unique_block_class .td_woo_product_module .onsale {
					@f_sale
                }
				/* @f_title */
				body .$unique_block_class .td-module-title {
				    @f_title
                }
                /* @f_ex */
				.$unique_block_class .td-excerpt {
					@f_ex
				}
				/* @f_price */
				body div.$unique_block_class div.td_woo_product_module .price {
					@f_price
                }
				/* @f_old_price */
			    body div.$unique_block_class div.td_woo_product_module .price del {
					@f_old_price
                }
				/* @f_btn */
				body .$unique_block_class .td_woo_product_module a.button {
					@f_btn
                }
				/* @f_more */
				.$unique_block_class .page-nav a,
				.$unique_block_class .page-nav span {
					@f_more
				}
            
            </style>";

        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();

        return $compiled_css;
    }

	// set block type to products
 	function __construct() {
	    //parent::disable_loop_block_features();
	    // @todo we only need to set this block for products for ajax requests..
		parent::set_products_block();
	}

    function render( $atts, $content = null ) {

        global $td_woo_state_single_product_page, $td_woo_state_archive_product_page, $td_woo_state_search_archive_product_page, $td_woo_state_shop_base_page;

	    $atts['td_woo_attributes_filters'] = array(); // we store the attributes filters here.. used in td_data_source to apply the filters for ajax pagination requests

	    // block_type
	    //$atts['block_type'] = get_class($this);

	    switch( tdb_state_template::get_template_type() ) { // @todo refactor switch below.. to process filters just once regardless of the template we're on...

            case 'woo_product':
	            $loop_data = $td_woo_state_single_product_page->loop->__invoke( $atts );

	            // set filters
	            if( !empty( $loop_data['filters'] ) && is_array( $loop_data['filters'] ) ) {
		            $loop_data_filters = $loop_data['filters'];
		            foreach ( $loop_data_filters as $tax => $tax_terms_filters_list ) {
			            $taxonomy = str_replace( 'tdw_', '', $tax );
			            switch ($taxonomy) {
				            case 'product_cat':
					            $atts['category'] = $tax_terms_filters_list;
					            //$atts['cat_operator'] = 'AND';
					            break;
				            case 'product_tag':
					            $atts['tag'] = $tax_terms_filters_list;
					            $atts['tag_operator'] = 'AND';
					            break;
				            case ( strpos( $taxonomy, 'pa_' ) !== false ):
					            $atts['td_woo_attributes_filters'][$taxonomy] = $tax_terms_filters_list;
					            break;
			            }
		            }
	            }

                break;

            case 'woo_search_archive':
	            $loop_data = $td_woo_state_search_archive_product_page->loop->__invoke( $atts );

	            // set filters
	            if( !empty( $loop_data['filters'] ) && is_array( $loop_data['filters'] ) ) {
		            $loop_data_filters = $loop_data['filters'];
		            foreach ( $loop_data_filters as $tax => $tax_terms_filters_list ) {
			            $taxonomy = str_replace( 'tdw_', '', $tax );
			            switch ($taxonomy) {
				            case 'product_cat':
					            $atts['category'] = $tax_terms_filters_list;
					            //$atts['cat_operator'] = 'AND';
					            break;
				            case 'product_tag':
					            $atts['tag'] = $tax_terms_filters_list;
					            $atts['tag_operator'] = 'AND';
					            break;
				            case ( strpos( $taxonomy, 'pa_' ) !== false ):
					            $atts['td_woo_attributes_filters'][$taxonomy] = $tax_terms_filters_list;
					            break;
			            }
		            }
	            }

	            break;

            case 'woo_archive':
                $loop_data = $td_woo_state_archive_product_page->loop->__invoke( $atts );

	            // add current term to block atts
	            if( !empty( $loop_data['current_queried_obj'] ) && is_object( $loop_data['current_queried_obj'] ) ) {
		            $atts['current_term_tax'] = $loop_data['current_queried_obj']->taxonomy; // cat or tag taxonomy
		            $atts['current_term'] = $loop_data['current_queried_obj']->slug; // cat or tag slug
	            }

	            // set filters
	            if( !empty( $loop_data['filters'] ) && is_array( $loop_data['filters'] ) ) {
	                $loop_data_filters = $loop_data['filters'];
		            foreach ( $loop_data_filters as $tax => $tax_terms_filters_list ) {
			            $taxonomy = str_replace( 'tdw_', '', $tax );
			            switch ($taxonomy) {
				            case 'product_cat':
					            $atts['category'] = $tax_terms_filters_list;
					            //$atts['cat_operator'] = 'AND';
                                break;
				            case 'product_tag':
					            //$atts['product_tag_slug'] = $tax_terms_filters_list;
					            $atts['tag'] = $tax_terms_filters_list;
					            $atts['tag_operator'] = 'AND';
					            break;
				            case ( strpos( $taxonomy, 'pa_' ) !== false ):
					            $atts['td_woo_attributes_filters'][$tax] = $tax_terms_filters_list;
					            break;
			            }
		            }
	            } else {
		            // set current term
		            if( !empty( $loop_data['current_queried_obj'] ) && is_object( $loop_data['current_queried_obj'] ) ) {
			            $atts['category'] = $loop_data['current_queried_obj']->slug;
		            }
                }
                break;

            case 'woo_shop_base':
		    default:
			    $loop_data = $td_woo_state_shop_base_page->loop->__invoke( $atts );

			    // apply td woo filters
			    $filters = $_GET;
			    if( !empty( $filters ) && is_array( $filters ) ) {
				    foreach ( $filters as $tax => $tax_terms_filters_list ) {
					    $taxonomy = str_replace( 'tdw_', '', $tax );
					    switch ($taxonomy) {
						    case 'product_cat':
							    $atts['category'] = $tax_terms_filters_list;
							    //$atts['cat_operator'] = 'AND';
							    break;
						    case 'product_tag':
							    $atts['tag'] = $tax_terms_filters_list;
							    $atts['tag_operator'] = 'AND';
							    break;
						    case ( strpos( $taxonomy, 'pa_' ) !== false ):
							    $atts['td_woo_attributes_filters'][$taxonomy] = $tax_terms_filters_list;
							    break;
					    }
				    }
			    }

			    break;

        }

	    // set sorting
	    $sort = $atts['sort'] ?? '';
	    $atts['sort'] = empty( $_GET['orderby'] ) ? $sort : wc_clean( wp_unslash( $_GET['orderby'] ) );

        parent::render( $atts );

        if( $this->get_att('block_template_id') != '' ) {
            $global_block_template_id = $this->get_att('block_template_id');
        } else {
            $global_block_template_id = td_options::get( 'tds_global_block_template', 'td_block_template_1' );
        }
        $td_css_cls_block_title = 'td-block-title';

        if ( $global_block_template_id === 'td_block_template_1' ) {
            $td_css_cls_block_title = 'block-title';
        }

        $additional_classes_array = array();

        // pagination
        $pagination = $this->get_att( 'ajax_pagination' );
        if( $pagination != '' && $pagination === 'numbered' ) {
            $additional_classes_array[] = 'tdb-numbered-pagination';
        }

        // output
        $buffy = '';

        $buffy .= '<div class="' . $this->get_block_classes( $additional_classes_array ) . '" ' . $this->get_block_html_atts() . '>';

            //get the block css
            $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();

            $custom_title = $this->get_att( 'custom_title' );
            if( $custom_title != '' ) {
                //get the title for this block
                $buffy .= '<div class="td-block-title-wrap">';
                    $buffy .= '<h4 class="' . $td_css_cls_block_title . '">';
                        $buffy .= '<span>' . $custom_title . '</span>';
                    $buffy .= '</h4>';
                $buffy .= '</div>';
            }

            // process filters
	        if ( ! ( tdc_state::is_live_editor_iframe() || tdc_state::is_live_editor_ajax() ) ) {

		        // render js
		        ob_start();

		        ?>
                <script>
                    jQuery().ready(function () {
                        var tdwLoopItem = new tdwLoop.item();
                        tdwLoopItem.blockUid = '<?php echo $this->block_uid; ?>';
                        tdwLoopItem.blockAtts = '<?php echo json_encode( $this->get_all_atts(), JSON_UNESCAPED_SLASHES | JSON_FORCE_OBJECT ); ?>';
                        tdwLoopItem.jqueryObj = jQuery('.<?php echo $this->block_uid ?>');
				        <?php if ( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) { ?>
                        tdwLoopItem.inComposer = true;
				        <?php } ?>
                        tdwLoop.addItem( tdwLoopItem );
                    });
                </script>
		        <?php
		        td_js_buffer::add_to_footer("\n" . td_util::remove_script_tag( ob_get_clean() ) );

            }

	        // offset
	        $offset = isset( $atts['offset'] ) ? intval($atts['offset']) : 0;

            // process count vars from loop data
            if ( isset( $loop_data['ids'] ) ) {

	            $total = intval($loop_data['total']) - $offset;
	            $per_page = $loop_data['per_page'];
	            $current = $loop_data['current_page'];

            // process count vars from $td_woo_loop_products_data global
            } elseif (
                tdb_state_template::get_template_type() === 'woo_shop_base' ||
                tdb_state_template::get_template_type() === 'page' ||
                !tdb_state_template::get_template_type()
            ) {
	            global $td_woo_loop_products_data;

	            /*
				 *  ex. $td_woo_loop_products_data
				 * Array
						(
							[ids] => Array
								(
									[0] => 7642
									[1] => 7639
								)

							[total] => 5
							[total_pages] => 3
							[per_page] => 2
							[current_page] => 1
						)
				 **/
	            //td_woo_util::pre_print_r($td_woo_loop_products_data);

	            $total = intval($td_woo_loop_products_data['total']) - $offset;
	            $per_page = $td_woo_loop_products_data['per_page'];
	            $current = $td_woo_loop_products_data['current_page'];
            }

            // results count
            $buffy .= '<div class="tdw-result-count">';
            $buffy .= '<p class="woocommerce-result-count">';
            if ( 0 >= intval( $total ) ) {
                $buffy .= __( 'No results to count', 'woocommerce' );
            } elseif ( 1 === intval( $total ) ) {
                $buffy .= __( 'Showing the single result', 'woocommerce' );
            } elseif ( $total <= $per_page || - 1 === $per_page ) {
                $buffy .= sprintf( _n( 'Showing all %d result', 'Showing all %d results', $total, 'woocommerce' ), $total );
            } else {
                $first = ( $per_page * $current ) - $per_page + 1;
                $last  = min( $total, $per_page * $current );
                $buffy .= sprintf( _nx( 'Showing %1$d &ndash; %2$d of %3$d result', 'Showing %1$d &ndash; %2$d of %3$d results', $total, 'with first and last result', 'woocommerce' ), $first, $last, $total );
            }
            $buffy .= '</p>';
            $buffy .= '</div>';

            // block inner
            $buffy .= '<div id=' . $this->block_uid . ' class="td_block_inner tdw-block-inner td-fix-index">';
	            // process products ids from loop data
	            if ( !empty( $loop_data['ids'] ) ) {
                    $buffy .= $this->inner( $loop_data['ids'] );
                // process products ids from td_query
	            } elseif (
	                    tdb_state_template::get_template_type() === 'woo_shop_base' ||
	                    tdb_state_template::get_template_type() === 'page' ||
                        !tdb_state_template::get_template_type()
                ) {
		            $buffy .= $this->inner( $this->td_query['ids'] );
                }
            $buffy .= '</div>';

            // pagination
            if ( $pagination != '' ) {
                if ( $pagination === 'numbered' ) {
	                if ( tdb_state_template::get_template_type() === 'woo_shop_base' ||
                         !tdb_state_template::get_template_type()
                    ){
		                $loop_data['loop_pagination']['paged'] = intval( $td_woo_loop_products_data['current_page'] );
		                $loop_data['loop_pagination']['max_page'] = intval( $td_woo_loop_products_data['total_pages'] ) - $offset;
                    }
                    $buffy .= $this->get_numbered_pagination( $loop_data['loop_pagination'] );
                } else {
                    $prev_icon = $this->get_icon_att('prev_tdicon');
                    $prev_icon_class = $this->get_att('prev_tdicon');
                    $next_icon = $this->get_icon_att('next_tdicon');
                    $next_icon_class = $this->get_att('next_tdicon');

                    $buffy .= $this->get_block_pagination($prev_icon, $next_icon, $prev_icon_class, $next_icon_class);
                }
            }

        $buffy .= '</div>';

        return $buffy;
    }

    function inner( $products_ids ) {

        $buffy = '';
        $td_block_layout = new td_block_layout();

        if ( !empty( $products_ids ) ) {
            foreach ( $products_ids as $products_id ) {
                $wp_post_product = get_post($products_id);
                $td_woo_product_module = new td_woo_product_module( $wp_post_product, $this->get_all_atts() );
                $buffy .= $td_woo_product_module->render();
            }
        }

        $buffy .= $td_block_layout->close_all_tags();

        return $buffy;

    }

    function get_numbered_pagination( $loop_pagination_data ) {

        $pagination_data  = $loop_pagination_data;
	    $pagenavi_options = $loop_pagination_data['pagenavi_options'];

        $buffy = '';

	    $total   = $pagination_data['max_page'];
	    $current = $pagination_data['paged'];
	    $base    = ( td_woo_util::is_ajax() ) ? esc_url_raw( add_query_arg( 'product-page', '%#%', !empty($pagination_data['base']) ? $pagination_data['base'] : '' ) ) : esc_url_raw( add_query_arg( 'product-page', '%#%', false ) );

	    $format  = '?product-page=%#%';

	    if ( $total > 1 ) {
		    $buffy .= '<div class="page-nav td-pb-padding-side">';

		    if ( td_woo_util::is_ajax() ) {
			    add_filter( 'get_pagenum_link', function ($url) {
				    return remove_query_arg( array( 'td_theme_name', 'v', 'td_woo_ajax' ), $url );
			    }, 10, 1 );
		    }

		    $buffy .= paginate_links(
			    apply_filters(
				    'woocommerce_pagination_args',
				    array(
					    'base'      => $base,
					    'format'    => $format,
					    'add_args'  => false,
					    'current'   => max( 1, $current ),
					    'total'     => $total,
					    'prev_text' => $pagination_data['previous_posts_link'],
					    'next_text' => $pagination_data['next_posts_link'],
					    'type'      => 'plain',
					    'end_size'  => 3,
					    'mid_size'  => 3,
				    )
			    )
		    );

		    $pages_text = str_replace("%CURRENT_PAGE%", number_format_i18n( $pagination_data['paged'] ), $pagenavi_options['pages_text'] );
		    $pages_text = str_replace("%TOTAL_PAGES%", number_format_i18n( $pagination_data['max_page'] ), $pages_text );

		    if ( !empty( $pages_text ) ) {
			    $buffy .= '<span class="pages">' . $pages_text . '</span>';
		    }

		    $buffy .= '<div class="clearfix"></div>';
		    $buffy .= '</div>';
	    }

        return $buffy;
    }

    function js_tdc_callback_ajax() {
        $buffy = '';

        // add a new composer block - that one has the delete callback
        $buffy .= $this->js_tdc_get_composer_block();

        ob_start();

        ?>
        <script>
            /* global jQuery:{} */
            (function () {
                var block = jQuery('.<?php echo $this->block_uid; ?>');
                blockClass = '.<?php echo $this->block_uid; ?>';
            })();
        </script>
        <?php

        return $buffy . td_util::remove_script_tag( ob_get_clean() );
    }

}
