<?php

/**
 * Class td_woo_product_image - shortcode for woocommerce single products images
 */
class td_woo_product_image extends td_block {

	public function get_custom_css() {
		// $unique_block_class
		$unique_block_class = $this->block_uid;

		$compiled_css = '';

		$raw_css =
            "<style>
            
                /* @general_style */
                body.woocommerce .td_woo_product_image div.woocommerce-product-gallery {
                    margin-bottom: 0;
                }
                body.woocommerce .td_woo_product_image .onsale {
                    top: 0;
                    left: 0;
                    padding: 10px;
                    min-width: 0;
                    min-height: 0;
                    background-color: #4db2ec;
                    font-size: 12px;
                    line-height: 1;
                    border: 0 solid #000;
                    border-radius: 0;
                }
                .td_woo_product_image {
                    display: flex;
                }
                .woocommerce div.product div.images .woocommerce-product-gallery__wrapper {
                    width: 100%;
                }
                .td_woo_product_image .elastislide-wrapper {
                    padding: 0;
                }
                .td_woo_product_image div.woocommerce-product-gallery .flex-control-thumbs {
                    border: 0 solid #000;
                }
                .td_woo_product_image div.woocommerce-product-gallery .flex-control-thumbs li img {
                    border: 0 solid #000;
                }
                .td_woo_product_image div.woocommerce-product-gallery div.elastislide-wrapper .flex-control-thumbs {
                    overflow: initial;
                    padding: 0;
                    white-space: nowrap;
                    line-height: 0;
                    transition: all 0.3s ease-in-out !important;
                }
                .td_woo_product_image div.woocommerce-product-gallery div.elastislide-wrapper .flex-control-thumbs li {
                    float: none;
                }
                .td_woo_product_image div.woocommerce-product-gallery div.elastislide-horizontal .flex-control-thumbs li {
                    display: inline-block;
                }
                .td_woo_product_image .elastislide-wrapper {
                    box-shadow: none;
                    border: 0 solid #000;
                }
                .td_woo_product_image .elastislide-wrapper nav span {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    background: rgba(0, 0, 0, 0.8);
                    font-size: 0;
                    text-indent: 0;
                    line-height: 0;
                }
                .td_woo_product_image .elastislide-wrapper nav span:after {
                    display: block;
                    position: relative;
                    font-family: 'newspaper';
                    line-height: 1;
                    color: #fff;
                }
                .td_woo_product_image .elastislide-horizontal nav span {
                    margin-top: 0;
                    transform: translateY(-50%);
                    -webkit-transform: translateY(-50%);
                }
                .td_woo_product_image .elastislide-horizontal nav .elastislide-prev:after {
                    content: '\\e802';
                }
                .td_woo_product_image .elastislide-horizontal nav .elastislide-next:after {
                    content: '\\e803';
                    left: 1px;
                }
                .td_woo_product_image .elastislide-vertical nav span {
                    margin-left: 0;
                    transform: translateX(-50%);
                    -webkit-transform: translateX(-50%);
                }
                .td_woo_product_image .elastislide-vertical nav .elastislide-prev:after {
                    content: '\\e804';
                }
                .td_woo_product_image .elastislide-vertical nav .elastislide-next:after {
                    content: '\\e801';
                }
                .pswp {
                    z-index: 10000;
                }
                .pswp .pswp__button:before {
                    display: none;
                }
                .pswp .pswp__button:after {
                    display: block;
                    position: absolute;
                    top: 50%;
                    -webkit-transform: translateY(-50%);
                    transform: translateY(-50%);
                    font-family: 'newspaper';
                    font-size: 24px;
                    line-height: 1;
                    color: #fff;
                }
                .pswp .pswp__button--arrow--left:after {
                    content: '\\e802';
                    left: 10px;
                }
                .pswp .pswp__button--arrow--right:after {
                    content: '\\e803';
                    right: 10px;
                }
                .pswp .pswp__ui--fit .pswp__caption,
                .pswp .pswp__ui--fit .pswp__top-bar {
                    background-color: transparent;
                }
                
                
                /* @carousel_normal */
                body.woocommerce div.product div.td_woo_product_image div.woocommerce-product-gallery ol.flex-control-thumbs {
                    display: flex;
                    flex-wrap: wrap;
                }
                body.woocommerce div.product div.td_woo_product_image div.woocommerce-product-gallery ol.flex-control-thumbs li {
                    clear: none;
                }
                
                /* @carousel_vertical */
                body.woocommerce .td_woo_product_image div.woocommerce-product-gallery {
                    display: flex;
                }
                body.woocommerce .td_woo_product_image div.woocommerce-product-gallery .flex-viewport {
                    flex: 1;
                    order: 1;
                }
                .td_woo_product_image .elastislide-carousel {
                    height: 100%;
                }
                .td_woo_product_image .elastislide-wrapper {
                    width: auto;
                    height: auto !important;
                    max-width: none !important;
                }
                .td_woo_product_image .elastislide-wrapper .flex-control-thumbs li {
                    width: 100%;
                    max-width: none !important;
                    max-height: none !important;
                }
                .woocommerce .td_woo_product_image .elastislide-wrapper .flex-control-thumbs li img {
                    max-width: none;
                    width: 90px;
                }
                body.woocommerce .td_woo_product_image .onsale {
                    left: 90px;
                }
                
                /* @sale_margin */
                body.woocommerce div.$unique_block_class .onsale {
                    margin: @sale_margin;
                }
                /* @sale_padding */
                body.woocommerce div.$unique_block_class .onsale {
                    padding: @sale_padding;
                }
                /* @sale_border */
                body.woocommerce div.$unique_block_class .onsale {
                    border-width: @sale_border;
                } 
                /* @sale_border_style */
                body.woocommerce div.$unique_block_class .onsale {
                    border-style: @sale_border_style;
                }     
                /* @sale_radius */
                body.woocommerce div.$unique_block_class .onsale {
                    border-radius: @sale_radius;
                }              
                
                /* @img_vertical */
                body.woocommerce .$unique_block_class.td_woo_product_image .elastislide-wrapper .flex-control-thumbs li img {
                    width: @img_vertical;
                }
                body.woocommerce .td_woo_product_image .onsale {
                    left: @img_vertical;
                }
                
                
                /* @slider_space */
                body.woocommerce div.$unique_block_class div.woocommerce-product-gallery ol.flex-control-thumbs {
                    margin-top: @slider_space;
                }
                /* @slider_space_h */
                .$unique_block_class .elastislide-wrapper {
                    margin-top: @slider_space_h;
                }
                /* @slider_space_v */
                .$unique_block_class .elastislide-wrapper {
                    margin-right: @slider_space_v;
                }
                /* @slider_padding */
                body.woocommerce div.$unique_block_class div.woocommerce-product-gallery ol.flex-control-thumbs {
                    padding: @slider_padding;
                }
                /* @slider_padding_hv */
                .$unique_block_class .elastislide-wrapper {
                    padding: @slider_padding_hv;
                }
                /* @slider_border */
                body.woocommerce div.$unique_block_class div.woocommerce-product-gallery ol.flex-control-thumbs {
                    border-width: @slider_border;
                }
                /* @slider_border_hv */
                .$unique_block_class .elastislide-wrapper {
                    border-width: @slider_border_hv;
                }
                /* @slider_border_style */
                body.woocommerce div.$unique_block_class div.woocommerce-product-gallery ol.flex-control-thumbs {
                    border-style: @slider_border_style;
                }
                /* @slider_border_style_hv */
                .$unique_block_class .elastislide-wrapper {
                    border-style: @slider_border_style_hv;
                }
                
                /* @imgs_on_row_h */
                body.woocommerce div.$unique_block_class div.woocommerce-product-gallery ol.flex-control-thumbs li {
                    width: @imgs_on_row_h !important;
                }
                /* @imgs_gap_h */
                body.woocommerce div.$unique_block_class div.woocommerce-product-gallery ol.flex-control-thumbs li {
                    padding-left: @imgs_gap_h;
                    padding-right: @imgs_gap_h;
                }
                body.woocommerce div.$unique_block_class div.woocommerce-product-gallery ol.flex-control-thumbs {
                    margin-left: -@imgs_gap_h;
                    margin-right: -@imgs_gap_h;
                }
                /* @imgs_gap_bottom */
                body.woocommerce div.$unique_block_class div.woocommerce-product-gallery ol.flex-control-thumbs li {
                    margin-bottom: @imgs_gap_bottom;
                }
				/* @padding */
				body.woocommerce div.$unique_block_class div.woocommerce-product-gallery ol.flex-control-thumbs li:nth-last-child(@padding) {
					margin-bottom: 0;
				}
                /* @imgs_opacity */
                body.woocommerce div.$unique_block_class div.woocommerce-product-gallery ol.flex-control-thumbs li img:not(.flex-active) {
                    opacity: @imgs_opacity;
                }
                /* @imgs_border */
                body.woocommerce div.$unique_block_class div.woocommerce-product-gallery ol.flex-control-thumbs li img {
                    border-width: @imgs_border;
                }
                /* @imgs_border_style */
                body.woocommerce div.$unique_block_class div.woocommerce-product-gallery ol.flex-control-thumbs li img {
                    border-style: @imgs_border_style;
                }
                /* @imgs_opacity_a */
                body.woocommerce div.$unique_block_class div.woocommerce-product-gallery ol.flex-control-thumbs li img.flex-active,
                body.woocommerce div.$unique_block_class div.woocommerce-product-gallery ol.flex-control-thumbs li img:hover {
                    opacity: @imgs_opacity_a;
                }
                /* @imgs_border_a */
                body.woocommerce div.$unique_block_class div.woocommerce-product-gallery ol.flex-control-thumbs li img.flex-active,
                body.woocommerce div.$unique_block_class div.woocommerce-product-gallery ol.flex-control-thumbs li img:hover {
                    border-width: @imgs_border_a;
                }
                /* @imgs_border_style_a */
                body.woocommerce div.$unique_block_class div.woocommerce-product-gallery ol.flex-control-thumbs li img.flex-active,
                body.woocommerce div.$unique_block_class div.woocommerce-product-gallery ol.flex-control-thumbs li img:hover {
                    border-style: @imgs_border_style_a;
                }
            
                /* @icon_size */
                .$unique_block_class .elastislide-wrapper nav span:after {
                    font-size: @icon_size;
                }
                /* @icon_spacing */
                .$unique_block_class .elastislide-wrapper nav span {
                    width: @icon_spacing;
                    height: @icon_spacing;
                }
            
            
            
                /* @sale_txt_color */
                body.woocommerce div.$unique_block_class .onsale {
                    color: @sale_txt_color;
                } 
                /* @sale_bg_color */
                body.woocommerce div.$unique_block_class .onsale {
                    background-color: @sale_bg_color;
                } 
                /* @sale_border_color */
                body.woocommerce div.$unique_block_class .onsale {
                    border-color: @sale_border_color;
                }
                
                /* @zoom_ico_color */
                body.woocommerce .$unique_block_class div.woocommerce-product-gallery .woocommerce-product-gallery__trigger:before {
                    border-color: @zoom_ico_color;
                }
                body.woocommerce .$unique_block_class div.woocommerce-product-gallery .woocommerce-product-gallery__trigger:after {
                    background-color: @zoom_ico_color;
                }
                /* @zoom_ico_color_h */
                body.woocommerce .$unique_block_class div.woocommerce-product-gallery .woocommerce-product-gallery__trigger:hover:before {
                    border-color: @zoom_ico_color_h;
                }
                body.woocommerce .$unique_block_class div.woocommerce-product-gallery .woocommerce-product-gallery__trigger:hover:after {
                    background-color: @zoom_ico_color_h;
                }
                /* @zoom_bg_color */
                body.woocommerce .$unique_block_class div.woocommerce-product-gallery .woocommerce-product-gallery__trigger {
                    background-color: @zoom_bg_color;
                }
                /* @zoom_bg_color_h */
                body.woocommerce .$unique_block_class div.woocommerce-product-gallery .woocommerce-product-gallery__trigger:hover {
                    background-color: @zoom_bg_color_h;
                }
                
                /* @slider_bg_color */
                body.woocommerce div.$unique_block_class div.woocommerce-product-gallery ol.flex-control-thumbs {
                    background-color: @slider_bg_color;
                }
                /* @slider_bg_color_hv */
                .$unique_block_class .elastislide-wrapper {
                    background-color: @slider_bg_color_hv;
                }
                /* @slider_border_color */
                body.woocommerce div.$unique_block_class div.woocommerce-product-gallery ol.flex-control-thumbs {
                    border-color: @slider_border_color;
                }
                /* @slider_border_color_hv */
                .$unique_block_class .elastislide-wrapper {
                    border-color: @slider_border_color_hv;
                }
                /* @imgs_border_color */
                body.woocommerce div.$unique_block_class div.woocommerce-product-gallery ol.flex-control-thumbs li img {
                    border-color: @imgs_border_color;
                }
                /* @imgs_border_color_a */
                body.woocommerce div.$unique_block_class div.woocommerce-product-gallery ol.flex-control-thumbs li img.flex-active,
                body.woocommerce div.$unique_block_class div.woocommerce-product-gallery ol.flex-control-thumbs li img:hover {
                    border-color: @imgs_border_color_a;
                }
                /* @nav_ico_color */
                .$unique_block_class .elastislide-wrapper nav span:after {
                    color: @nav_ico_color;
                }
                /* @nav_ico_color_h */
                .$unique_block_class .elastislide-wrapper nav span:hover:after {
                    color: @nav_ico_color_h;
                }
                /* @nav_bg_color */
                .$unique_block_class .elastislide-wrapper nav span {
                    background-color: @nav_bg_color;
                }
                /* @nav_bg_color_h */
                .$unique_block_class .elastislide-wrapper nav span:hover {
                    background-color: @nav_bg_color_h;
                }
                /* @modal_bg_color */
                .pswp .pswp__bg {
                    background-color: @modal_bg_color;
                }
                /* @modal_title_color */
                .pswp .pswp__caption__center {
                    color: @modal_title_color;
                }
                /* @modal_arrow_color */
                .pswp .pswp__button:after {
                    color: @modal_arrow_color;
                }
                /* @modal_arrow_color_h */
                .pswp .pswp__button:hover:after {
                    color: @modal_arrow_color_h;
                }
                
                
                /* @f_sale */
                body.woocommerce div.$unique_block_class .onsale {
                    @f_sale
                } 
            
            </style>";

		$td_css_res_compiler = new td_css_res_compiler( $raw_css );
		$td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

		$compiled_css .= $td_css_res_compiler->compile_css();
		return $compiled_css;
	}

	static function cssMedia( $res_ctx ) {

        $product_gallery = $res_ctx->get_shortcode_att('product_gallery');

        /*-- GENERAL-- */
        $res_ctx->load_settings_raw( 'general_style', 1 );
        if ( $product_gallery === '' ) {
            $res_ctx->load_settings_raw( 'carousel_normal', 1 );
        } else if ( $product_gallery === 'carousel_vertical' ) {
            $res_ctx->load_settings_raw( 'carousel_vertical', 1 );
        }



        /*-- SALE TAG -- */
        // sale tag margin
        $sale_margin = $res_ctx->get_shortcode_att( 'sale_margin' );
        $res_ctx->load_settings_raw( 'sale_margin', $sale_margin );
        if( $sale_margin != '' && is_numeric( $sale_margin ) ) {
            $res_ctx->load_settings_raw( 'sale_margin', $sale_margin . 'px' );
        }
        // sale tag padding
        $sale_padding = $res_ctx->get_shortcode_att( 'sale_padding' );
        $res_ctx->load_settings_raw( 'sale_padding', $sale_padding );
        if( $sale_padding != '' && is_numeric( $sale_padding ) ) {
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


        /*-- GALLERY SLIDER -- */
        // slider top space
        $slider_space = $res_ctx->get_shortcode_att('slider_space');
        if( $product_gallery === '' ) {
            $res_ctx->load_settings_raw('slider_space', $slider_space);
            if ($slider_space != '' && is_numeric($slider_space)) {
                $res_ctx->load_settings_raw('slider_space', $slider_space . 'px');
            }
        } else if( $product_gallery === 'carousel_horizontal' ) {
            $res_ctx->load_settings_raw('slider_space_h', $slider_space);
            if ($slider_space != '' && is_numeric($slider_space)) {
                $res_ctx->load_settings_raw('slider_space_h', $slider_space . 'px');
            }
        } else if( $product_gallery === 'carousel_vertical' ) {
            $res_ctx->load_settings_raw('slider_space_v', $slider_space);
            if ($slider_space != '' && is_numeric($slider_space)) {
                $res_ctx->load_settings_raw('slider_space_v', $slider_space . 'px');
            }
        }
        // img_vertical
        $img_vertical = $res_ctx->get_shortcode_att('img_vertical');
        $res_ctx->load_settings_raw('img_vertical', $img_vertical);
        if ( $img_vertical != '' && is_numeric( $img_vertical ) ) {
            $res_ctx->load_settings_raw('img_vertical', $img_vertical . 'px');
        }


        // slider padding
        $slider_padding = $res_ctx->get_shortcode_att('slider_padding');
        if( $product_gallery === '' ) {
            $res_ctx->load_settings_raw( 'slider_padding', $slider_padding );
            if( $slider_padding != '' && is_numeric( $slider_padding ) ) {
                $res_ctx->load_settings_raw( 'slider_padding', $slider_padding . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'slider_padding_hv', $slider_padding );
            if( $slider_padding != '' && is_numeric( $slider_padding ) ) {
                $res_ctx->load_settings_raw( 'slider_padding_hv', $slider_padding . 'px' );
            }
        }
        // slider border size
        $slider_border = $res_ctx->get_shortcode_att('slider_border');
        if( $product_gallery === '' ) {
            $res_ctx->load_settings_raw( 'slider_border', $slider_border );
            if( $slider_border != '' && is_numeric( $slider_border ) ) {
                $res_ctx->load_settings_raw( 'slider_border', $slider_border . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'slider_border_hv', $slider_border );
            if( $slider_border != '' && is_numeric( $slider_border ) ) {
                $res_ctx->load_settings_raw( 'slider_border_hv', $slider_border . 'px' );
            }
        }
        // slider border style
        $slider_border_style = $res_ctx->get_shortcode_att('slider_border_style');
        if( $product_gallery === '' ) {
            $res_ctx->load_settings_raw( 'slider_border_style', $slider_border_style );
            if( $slider_border_style == '' ) {
                $res_ctx->load_settings_raw( 'slider_border_style', 'solid' );
            }
        } else {
            $res_ctx->load_settings_raw( 'slider_border_style_hv', $slider_border_style );
            if( $slider_border_style == '' ) {
                $res_ctx->load_settings_raw( 'slider_border_style_hv', 'solid' );
            }
        }

        // images per row
        $imgs_on_row = $res_ctx->get_shortcode_att('imgs_on_row');
        if ( $imgs_on_row == '' ) {
            $imgs_on_row = '100%';
        }
        if( $product_gallery === '' || $product_gallery === 'carousel_horizontal' ) {
            $res_ctx->load_settings_raw( 'imgs_on_row_h', $imgs_on_row );
        }
        // modules clearfix
        $padding = 'padding';
        if( $product_gallery === '' ) {
            switch ($imgs_on_row) {
                case '100%':
                    $res_ctx->load_settings_raw( $padding,  '1' );
                    break;
                case '50%':
                    $res_ctx->load_settings_raw( $padding,  '-n+2' );
                    break;
                case '33.33333333%':
                    $res_ctx->load_settings_raw( $padding,  '-n+3' );
                    break;
                case '25%':
                    $res_ctx->load_settings_raw( $padding,  '-n+4' );
                    break;
                case '20%':
                    $res_ctx->load_settings_raw( $padding,  '-n+5' );
                    break;
                case '16.66666667%':
                    $res_ctx->load_settings_raw( $padding,  '-n+6' );
                    break;
                case '14.28571428%':
                    $res_ctx->load_settings_raw( $padding,  '-n+7' );
                    break;
                case '12.5%':
                    $res_ctx->load_settings_raw( $padding,  '-n+8' );
                    break;
                case '11.11111111%':
                    $res_ctx->load_settings_raw( $padding,  '-n+9' );
                    break;
                case '10%':
                    $res_ctx->load_settings_raw( $padding,  '-n+10' );
                    break;
            }
        } else if ( $product_gallery === 'carousel_vertical' ) {
            $res_ctx->load_settings_raw( $padding,  '1' );
        }


        // gap
        $imgs_gap = $res_ctx->get_shortcode_att('imgs_gap');
        if ( $imgs_gap != '' && is_numeric( $imgs_gap ) ) {
            if( $product_gallery === '' || $product_gallery === 'carousel_vertical' ) {
                $res_ctx->load_settings_raw('imgs_gap_bottom', $imgs_gap . 'px');
            }

            if( $product_gallery === '' || $product_gallery === 'carousel_horizontal' ) {
                $res_ctx->load_settings_raw('imgs_gap_h', $imgs_gap / 2 . 'px');
            } else if ( $product_gallery === 'carousel_vertical' ) {
                $res_ctx->load_settings_raw('imgs_gap_v', $imgs_gap / 2 . 'px');
            }
        }

        // images opacity
        $res_ctx->load_settings_raw('imgs_opacity', $res_ctx->get_shortcode_att('imgs_opacity'));
        // images border size
        $imgs_border = $res_ctx->get_shortcode_att('imgs_border');
        $res_ctx->load_settings_raw('imgs_border', $imgs_border);
        if( $imgs_border != '' && is_numeric( $imgs_border ) ) {
            $res_ctx->load_settings_raw('imgs_border', $imgs_border . 'px');
        }
        // images border style
        $res_ctx->load_settings_raw('imgs_border_style', $res_ctx->get_shortcode_att('imgs_border_style'));

        // images active opacity
        $res_ctx->load_settings_raw('imgs_opacity_a', $res_ctx->get_shortcode_att('imgs_opacity_a'));
        // images active border size
        $imgs_border_a = $res_ctx->get_shortcode_att('imgs_border_a');
        $res_ctx->load_settings_raw('imgs_border_a', $imgs_border_a);
        if( $imgs_border_a != '' && is_numeric( $imgs_border_a ) ) {
            $res_ctx->load_settings_raw('imgs_border_a', $imgs_border_a . 'px');
        }
        // images active border style
        $res_ctx->load_settings_raw('imgs_border_style_a', $res_ctx->get_shortcode_att('imgs_border_style_a'));


        // icon size
        $res_ctx->load_settings_raw( 'icon_size', $res_ctx->get_shortcode_att( 'icon_size' ) . 'px' );

        // icon spacing
        $res_ctx->load_settings_raw('icon_spacing', $res_ctx->get_shortcode_att( 'icon_size' ) * $res_ctx->get_shortcode_att( 'icon_spacing' ) . 'px');



        /*-- COLORS -- */
        $res_ctx->load_settings_raw('sale_txt_color', $res_ctx->get_shortcode_att( 'sale_txt_color' ));
        $res_ctx->load_settings_raw('sale_bg_color', $res_ctx->get_shortcode_att( 'sale_bg_color' ));
        $res_ctx->load_settings_raw('sale_border_color', $res_ctx->get_shortcode_att( 'sale_border_color' ));

        $res_ctx->load_settings_raw('zoom_ico_color', $res_ctx->get_shortcode_att( 'zoom_ico_color' ));
        $res_ctx->load_settings_raw('zoom_ico_color_h', $res_ctx->get_shortcode_att( 'zoom_ico_color_h' ));
        $res_ctx->load_settings_raw('zoom_bg_color', $res_ctx->get_shortcode_att( 'zoom_bg_color' ));
        $res_ctx->load_settings_raw('zoom_bg_color_h', $res_ctx->get_shortcode_att( 'zoom_bg_color_h' ));

        if( $product_gallery === '' ) {
            $res_ctx->load_settings_raw('slider_bg_color', $res_ctx->get_shortcode_att( 'slider_bg_color' ));
            $res_ctx->load_settings_raw('slider_border_color', $res_ctx->get_shortcode_att( 'slider_border_color' ));
        } else {
            $res_ctx->load_settings_raw('slider_bg_color_hv', $res_ctx->get_shortcode_att( 'slider_bg_color' ));
            $res_ctx->load_settings_raw('slider_border_color_hv', $res_ctx->get_shortcode_att( 'slider_border_color' ));
        }
        $res_ctx->load_settings_raw('imgs_border_color', $res_ctx->get_shortcode_att( 'imgs_border_color' ));
        $res_ctx->load_settings_raw('imgs_border_color_a', $res_ctx->get_shortcode_att( 'imgs_border_color_a' ));
        $res_ctx->load_settings_raw('nav_ico_color', $res_ctx->get_shortcode_att( 'nav_ico_color' ));
        $res_ctx->load_settings_raw('nav_ico_color_h', $res_ctx->get_shortcode_att( 'nav_ico_color_h' ));
        $res_ctx->load_settings_raw('nav_bg_color', $res_ctx->get_shortcode_att( 'nav_bg_color' ));
        $res_ctx->load_settings_raw('nav_bg_color_h', $res_ctx->get_shortcode_att( 'nav_bg_color_h' ));

        $res_ctx->load_settings_raw('modal_bg_color', $res_ctx->get_shortcode_att( 'modal_bg_color' ));
        $res_ctx->load_settings_raw('modal_title_color', $res_ctx->get_shortcode_att( 'modal_title_color' ));
        $res_ctx->load_settings_raw('modal_arrow_color', $res_ctx->get_shortcode_att( 'modal_arrow_color' ));
        $res_ctx->load_settings_raw('modal_arrow_color_h', $res_ctx->get_shortcode_att( 'modal_arrow_color_h' ));



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_sale' );

    }

	function __construct() {
		parent::disable_loop_block_features();
	}

	function render($atts, $content = null) {

		global $td_woo_state_single_product_page;

		$product_img_data = $td_woo_state_single_product_page->product_image->__invoke($atts);

		parent::render($atts);

		$product_gallery = $this->get_att('product_gallery');

		$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
		$wrapper_classes   = apply_filters(
			'woocommerce_single_product_image_gallery_classes',
			array(
				'woocommerce-product-gallery',
				'woocommerce-product-gallery--' . ( $product_img_data['with_images'] ? 'with-images' : 'without-images' ),
				'woocommerce-product-gallery--columns-' . absint( $columns ),
				'images',
			)
		);

		// data type
		$sample_data = $product_img_data['sample_data'];

		// $unique_block_class
		$unique_block_class = $this->block_uid;

		$buffy = '';

		$buffy .= '<div id="' . $unique_block_class . '" class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';

			//get the block css
			$buffy .= $this->get_block_css();

			//get the js for this block
			$buffy .= $this->get_block_js();

		    $style = '';
            if ( ! tdc_state::is_live_editor_ajax() and ! tdc_state::is_live_editor_iframe() ) {
	            $style = 'opacity: 0; transition: opacity .25s ease-in-out; width: 100%;';
            }

            if ( $sample_data || tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) {
	            $style .= 'width: 100%;';
            }

            if ( $product_img_data['on_sale'] ) {
	            $buffy .= apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale!', 'woocommerce' ) . '</span>', $product_img_data['product'], $product_img_data['product'] );
            }

			$buffy .= '<div class="' . esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ) . '" data-columns="' . esc_attr( $columns ) . '" style="' . $style . '">';
		        if ( $sample_data ) {
                    $buffy .= $product_img_data['sample_html'];
                } else {
                    $buffy .= '<figure class="woocommerce-product-gallery__wrapper">';

                        // images gallery ( .. it also displays the single main product image  )
			            $buffy .= $product_img_data['gallery_images_html'];

                    $buffy .= '</figure>';
		        }
			$buffy .= '</div>';

			if ( $product_gallery === 'carousel_horizontal' ) {
				ob_start();
				?>
                <script>
                    setTimeout( function(){
                        jQuery('.flex-control-thumbs').elastislide({
                            orientation : 'horizontal',
                            minItems : 3,
                            start : 0,
                        });
                    }, 200 );
                </script>
				<?php
				td_js_buffer::add_to_footer( "\n" . td_util::remove_script_tag( ob_get_clean() ) );
            }
			if ( $product_gallery === 'carousel_vertical' ) {
				ob_start();
				?>
                <script>
                    setTimeout( function(){
                        jQuery('.flex-control-thumbs').elastislide({
                            orientation : 'vertical',
                            minItems : 3,
                            start : 0,
                        });
                    }, 200 );
                </script>
				<?php
				td_js_buffer::add_to_footer( "\n" . td_util::remove_script_tag( ob_get_clean() ) );
            }

		$buffy .= '</div>';

		return $buffy;
	}

	function js_tdc_callback_ajax() {
		$buffy = '';

		$product_gallery = $this->get_att('product_gallery');

		// add a new composer block - that one has the delete callback
		$buffy .= $this->js_tdc_get_composer_block();

		ob_start();
		?>
        <script>
            /* global jQuery:{} */
            ( function () {
                /*
                 * Reinitialize the gallery.
                 */
                jQuery( '.<?php echo $this->block_uid; ?> .woocommerce-product-gallery' ).each( function() {
                    jQuery( this ).trigger( 'wc-product-gallery-before-init', [ this, wc_single_product_params ] );
                    jQuery( this ).wc_product_gallery( wc_single_product_params );
                    jQuery( this ).trigger( 'wc-product-gallery-after-init', [ this, wc_single_product_params ] );
                });

                <?php
                if ( $product_gallery === 'carousel_horizontal' ) { ?>
                    setTimeout( function(){
                        jQuery('.flex-control-thumbs').elastislide({
                            orientation : 'horizontal',
                            minItems : 3,
                            start : 0,
                        });
                    }, 200 );
                <?php
                }

                if ( $product_gallery === 'carousel_vertical' ) { ?>
                    setTimeout( function(){
                        jQuery('.flex-control-thumbs').elastislide({
                            orientation : 'vertical',
                            minItems : 3,
                            start : 0,
                        });
                    }, 200 );
                <?php
                } ?>
            })();
        </script>
        <?php

		return $buffy . td_util::remove_script_tag( ob_get_clean() );
	}

}