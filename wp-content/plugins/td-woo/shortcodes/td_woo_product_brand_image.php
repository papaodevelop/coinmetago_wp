<?php

/**
 * Class td_woo_product_brand_image - shortcode for displaying brands(product attribute) terms images on woocommerce single product page
 */

class td_woo_product_brand_image extends td_block {

	public function get_custom_css() {
		// $unique_block_class
		$unique_block_class = $this->block_uid;

		$compiled_css = '';

		$raw_css =
			"<style>
            
                /* @general_style_td_woo_product_brand_image */
                .td_woo_product_brand_image .tdw-block-inner {
                    display: flex;
                }
                .td_woo_product_brand_image .tdw-brand {
                    position: relative;
                    width: 48px;
                }
                .td_woo_product_brand_image .tdw-brand:before,
                .td_woo_product_brand_image .tdw-brand:after {
                    position: absolute;
                    bottom: 130%;
                    left: 50%;
                    transform: translateX(-50%);
                    transition: opacity 300ms linear, bottom 300ms linear;
                    visibility: hidden;
                    opacity: 0;
                    z-index: 999;
                    pointer-events: none;
                }
                .td_woo_product_brand_image .tdw-brand:before {
                    content: attr(data-tooltip);
                    margin-bottom: 5px;
                    padding: 7px;
                    min-width: 80px;
                    background-color: rgba(51, 51, 51, 0.9);
                    font-size: 13px;
                    line-height: 1.2;
                    text-align: center;
                    color: #fff;
                    border: 0 solid #000;
                    border-radius: 3px;
                }
                .td_woo_product_brand_image .tdw-brand:after {
                    content: '';
                    font-size: 0;
                    line-height: 0;
                    border-style: solid;
                    border-width: 5px 5px 0 5px;
                    border-color: rgba(51, 51, 51, 0.9) transparent transparent transparent;
                }
                .td_woo_product_brand_image .tdw-brand:hover:before,
                .td_woo_product_brand_image .tdw-brand:hover:after {
                    bottom: 120%;
                    visibility: visible;
                    opacity: 1;
                }
                .td_woo_product_brand_image .tdw-brand-img {
                    display: block;
                    width: 100%;
                    height: auto;
                }
                
                /* @show_tooltip */
                body .$unique_block_class.tdc-element-selected:not(.tdc-dragged) .tdw-brand:first-child:before,
                body .$unique_block_class.tdc-element-selected:not(.tdc-dragged) .tdw-brand:first-child:after {
                    bottom: 120%;
                    visibility: visible;
                    opacity: 1;
                }
                
                
                /* @make_inline */
                body .$unique_block_class {
                    display: inline-block;
                }
                
                /* @horiz_align */
                body .$unique_block_class .tdw-block-inner {
                    justify-content: @horiz_align;
                }
                
                /* @img_width */
                body .$unique_block_class .tdw-brand {
                    width: @img_width;
                }
                /* @img_padd */
                body .$unique_block_class .tdw-brand {
                    padding: @img_padd;
                }
                /* @all_img_border */
                body .$unique_block_class .tdw-brand {
                    border: @all_img_border @all_img_border_style @all_img_border_color;
                }
                /* @img_radius */
                body .$unique_block_class .tdw-brand,
                body .$unique_block_class .tdw-brand-img {
                    border-radius: @img_radius;
                }
                
                /* @tooltip_width */
                body .$unique_block_class .tdw-brand:before {
                    width: @tooltip_width;
                }
                /* @tooltip_padd */
                body .$unique_block_class .tdw-brand:before {
                    padding: @tooltip_padd;
                }
                /* @tooltip_radius */
                body .$unique_block_class .tdw-brand:before {
                    border-radius: @tooltip_radius;
                }
                
                
                /* @img_bg */
                body .$unique_block_class .tdw-brand {
                    background-color: @img_bg;
                }
                /* @img_bg_h */
                body .$unique_block_class a.tdw-brand:hover {
                    background-color: @img_bg_h;
                }
                /* @img_border_color_h */
                body .$unique_block_class a.tdw-brand:hover {
                    border-color: @img_border_color_h;
                }
                
                /* @tooltip_txt */
                body .$unique_block_class .tdw-brand:before {
                    color: @tooltip_txt;
                }
                /* @tooltip_bg */
                body .$unique_block_class .tdw-brand:before {
                    background-color: @tooltip_bg;
                }
                body .$unique_block_class .tdw-brand:after {
                    border-color: @tooltip_bg transparent transparent transparent;
                }
                /* @tooltip_shadow */
                body .$unique_block_class .tdw-brand:before {
                    box-shadow: @tooltip_shadow;
                }
                
                
                /* @f_tooltip */
                body .$unique_block_class .tdw-brand:before {
                    @f_tooltip
                }
                            
            </style>";

		$td_css_res_compiler = new td_css_res_compiler( $raw_css );
		$td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

		$compiled_css .= $td_css_res_compiler->compile_css();
		return $compiled_css;
	}

	static function cssMedia( $res_ctx ) {

		/*-- GENERAL-- */
		$res_ctx->load_settings_raw( 'general_style_td_woo_product_brand_image', 1 );

        if ( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) {
            $res_ctx->load_settings_raw('show_tooltip', $res_ctx->get_shortcode_att('show_tooltip'));
        }



        /*-- LAYOUT -- */
        // make inline
        $res_ctx->load_settings_raw('make_inline', $res_ctx->get_shortcode_att('make_inline'));

        // horizontal align
        $horiz_align = $res_ctx->get_shortcode_att('horiz_align');
        if( $horiz_align == '' || $horiz_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'horiz_align', 'flex-start' );
        } else if( $horiz_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'horiz_align', 'center' );
        } else if( $horiz_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'horiz_align', 'flex-end' );
        }


        // image size
        $img_width = $res_ctx->get_shortcode_att('img_width');
        $res_ctx->load_settings_raw('img_width', $img_width);
        if( $img_width != '' && is_numeric( $img_width ) ) {
            $res_ctx->load_settings_raw('img_width', $img_width . 'px');
        }

        // image padding
        $img_padd = $res_ctx->get_shortcode_att('img_padd');
        $res_ctx->load_settings_raw('img_padd', $img_padd);
        if( $img_padd != '' && is_numeric( $img_padd ) ) {
            $res_ctx->load_settings_raw('img_padd', $img_padd . 'px');
        }

        // image border size
        $all_img_border = $res_ctx->get_shortcode_att('all_img_border');
        $res_ctx->load_settings_raw('all_img_border', $all_img_border);
        if( $all_img_border != '' && is_numeric( $all_img_border ) ) {
            $res_ctx->load_settings_raw('all_img_border', $all_img_border . 'px');
        }

        // image border style
        $all_img_border_style = $res_ctx->get_shortcode_att('all_img_border_style');
        if( $all_img_border_style == '' ) {
            $res_ctx->load_settings_raw('all_img_border_style', 'solid');
        } else {
            $res_ctx->load_settings_raw('all_img_border_style', $all_img_border_style);
        }

        // image border radius
        $img_radius = $res_ctx->get_shortcode_att('img_radius');
        $res_ctx->load_settings_raw('img_radius', $img_radius);
        if( $img_radius != '' && is_numeric( $img_radius ) ) {
            $res_ctx->load_settings_raw('img_radius', $img_radius . 'px');
        }


        // tooltip min width
        $tooltip_width = $res_ctx->get_shortcode_att('tooltip_width');
        $res_ctx->load_settings_raw( 'tooltip_width', $tooltip_width );
        if( $tooltip_width != '' && is_numeric( $tooltip_width ) ) {
            $res_ctx->load_settings_raw( 'tooltip_width', $tooltip_width . 'px' );
        }
        // tooltip padding
        $tooltip_padd = $res_ctx->get_shortcode_att('tooltip_padd');
        $res_ctx->load_settings_raw( 'tooltip_padd', $tooltip_padd );
        if( $tooltip_padd != '' && is_numeric( $tooltip_padd ) ) {
            $res_ctx->load_settings_raw( 'tooltip_padd', $tooltip_padd . 'px' );
        }
        // tooltip border radius
        $tooltip_radius = $res_ctx->get_shortcode_att('tooltip_radius');
        $res_ctx->load_settings_raw( 'tooltip_radius', $tooltip_radius );
        if( $tooltip_radius != '' && is_numeric( $tooltip_radius ) ) {
            $res_ctx->load_settings_raw( 'tooltip_radius', $tooltip_radius . 'px' );
        }



        /*-- COLORS -- */
        $res_ctx->load_settings_raw('img_bg', $res_ctx->get_shortcode_att('img_bg'));
        $res_ctx->load_settings_raw('img_bg_h', $res_ctx->get_shortcode_att('img_bg_h'));
        $all_img_border_color = $res_ctx->get_shortcode_att('all_img_border_color');
        if( $all_img_border_color == '' ) {
            $res_ctx->load_settings_raw('all_img_border_color', '#000');
        } else {
            $res_ctx->load_settings_raw('all_img_border_color', $all_img_border_color);
        }
        $res_ctx->load_settings_raw('img_border_color_h', $res_ctx->get_shortcode_att('img_border_color_h'));

        $res_ctx->load_settings_raw( 'tooltip_txt', $res_ctx->get_shortcode_att('tooltip_txt') );
        $res_ctx->load_settings_raw( 'tooltip_bg', $res_ctx->get_shortcode_att('tooltip_bg') );
        $res_ctx->load_shadow_settings( 15, 0, 7, 0,  'rgba(0, 0, 0, 0.3)', 'tooltip_shadow' );



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_tooltip' );

	}

	function __construct() {
		parent::disable_loop_block_features();
	}

	function render( $atts, $content = null ) {

		global $td_woo_state_single_product_page;
		$product_brands_data = $td_woo_state_single_product_page->product_brand_img->__invoke( $atts );

		parent::render( $atts );


        $buffy = '';

        if( empty( $product_brands_data ) ) {
            return $buffy;
        }

		$buffy .= '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';
            //get the block css
            $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();


            $buffy .= '<div class="tdw-block-inner td-fix-index">';
                foreach ( $product_brands_data as $product_brand ) {
                    $open_tag = 'div';
                    $close_tag = 'div';

                    if( $product_brand['info']['url'] != '' ) {
                        $open_tag = 'a href="' . $product_brand['info']['url'] . '"';
                        $close_tag = 'a';
                    }

                    $buffy .= '<' . $open_tag . ' class="tdw-brand" data-tooltip="' . $product_brand['info']['name'] . '">';
                        $buffy .= '<img class="tdw-brand-img" src="' . $product_brand['img']['src'] . '" width="' . $product_brand['img']['width'] . '" height="' . $product_brand['img']['height'] . '" alt="' . $product_brand['info']['name'] . '" />';
                    $buffy .= '</' . $close_tag . '>';
                }
            $buffy .= '</div>';
		$buffy .= '</div>';

		return $buffy;
	}

}