<?php

/**
 * Class td_woo_product_price - product price shortcode for woocommerce single product pages
 */
class td_woo_product_price extends td_block {

    public function get_custom_css() {
        // $unique_block_class
        $unique_block_class = $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>
            
                /* @general_style */
                .td_woo_product_price .tdw-pp-text,
                .td_woo_product_price .tdw-pp-price {
                    font-size: 24px;
                    font-weight: 700;
                }
                .td_woo_product_price .tdw-pp-price del {
                    font-size: 0.75em !important;
                    color: #9d9d9d;
                    opacity: 1;
                }
                
                
            
                /* @add_space */
                div.$unique_block_class .tdw-pp-text {
                    margin-right: @add_space;
                }
                
                /* @content_align_horizontal_left */
                div.$unique_block_class .tdw-block-inner {
                    text-align: left;
                }
                /* @content_align_horizontal_center */
                div.$unique_block_class .tdw-block-inner {
                    text-align: center;
                }
                /* @content_align_horizontal_right */
                div.$unique_block_class .tdw-block-inner {
                    text-align: right;
                }
                
                /* @add_text_color */
                div.$unique_block_class .tdw-pp-text {
                    color: @add_text_color;
                }
                /* @price_color */
                div.$unique_block_class .tdw-pp-price {
                    color: @price_color;
                }
                
                div.$unique_block_class .tdw-pp-price ins {
                    background: transparent;
                }
                
                /* @sale_price_color */
                div.$unique_block_class .tdw-pp-price ins {
                    color: @sale_price_color;
                }
                /* @old_price_color */
                div.$unique_block_class .tdw-pp-price del {
                    color: @old_price_color;
                }
                
                
                
                /* @f_text */
                div.$unique_block_class .tdw-pp-text {
                    @f_text
                }
                /* @f_price */
                div.$unique_block_class .tdw-pp-price {
                    @f_price
                }
                /* @f_old_price */
                div.$unique_block_class .tdw-pp-price del {
                    @f_old_price
                }
            
            </style>";

        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        /*-- GENERAL-- */
        $res_ctx->load_settings_raw( 'general_style', 1 );



        // additional text space
        $add_text = $res_ctx->get_shortcode_att( 'add_space' );
        $res_ctx->load_settings_raw( 'add_space', $add_text );
        if( $add_text != '' && is_numeric( $add_text ) ) {
            $res_ctx->load_settings_raw( 'add_space', $add_text . 'px' );
        }

        // horiz align
        $content_align_horizontal = $res_ctx->get_shortcode_att('content_align_horizontal');
        if( $content_align_horizontal == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'content_align_horizontal_left', 1 );
        } else if( $content_align_horizontal == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'content_align_horizontal_center', 1 );
        } else if( $content_align_horizontal == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'content_align_horizontal_right', 1 );
        }


        /*-- COLORS -- */
        $res_ctx->load_settings_raw( 'add_text_color', $res_ctx->get_shortcode_att( 'add_text_color' ) );
        $res_ctx->load_settings_raw( 'price_color', $res_ctx->get_shortcode_att( 'price_color' ) );
        $res_ctx->load_settings_raw( 'sale_price_color', $res_ctx->get_shortcode_att( 'sale_price_color' ) );
        $res_ctx->load_settings_raw( 'old_price_color', $res_ctx->get_shortcode_att( 'old_price_color' ) );


        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_text' );
        $res_ctx->load_font_settings( 'f_price' );
        $res_ctx->load_font_settings( 'f_old_price' );

    }
    
    function __construct() {
        parent::disable_loop_block_features();
    }

    function render($atts, $content = null) {

        global $td_woo_state_single_product_page;

	    $product_price_data = $td_woo_state_single_product_page->product_price->__invoke($atts);
        
        parent::render($atts);


        // add_text
        $add_text = rawurldecode( base64_decode( strip_tags ( $this->get_att( 'add_text' ) ) ) );
        $add_text_html = '';
        if ( ! empty( $add_text ) ) {
            $add_text_html = '<span class="tdw-pp-text">' . $add_text . '</span>';
        }


        $buffy = '';

        $buffy .= '<div class="' . $this->get_block_classes()  . '" ' . $this->get_block_html_atts() . '>';

	        //get the block css
	        $buffy .= $this->get_block_css();

	        //get the js for this block
	        $buffy .= $this->get_block_js();


            $buffy .= '<div class="tdw-block-inner td-fix-index">';

                $buffy .= $add_text_html;

		        $buffy .= '<span class="tdw-pp-price">' . $product_price_data['price'] . '</span>';

            $buffy .= '</div>';

        $buffy .= '</div>';

        return $buffy;
    }
}

