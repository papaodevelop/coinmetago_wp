<?php

/**
 * Class td_woo_product_rating - shortcode for woocommerce a single product rating
 */
class td_woo_product_rating extends td_block {

    public function get_custom_css() {
        // $unique_block_class
        $unique_block_class = $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>
            
                /* @general_style */
                .td_woo_product_rating .tdw-block-inner,
                body.woocommerce .td_woo_product_rating .woocommerce-product-rating {
                    display: flex;
                    align-items: center;
                    
                }
                body.woocommerce .td_woo_product_rating .woocommerce-product-rating {
                    margin-bottom: 0;
                    line-height: 1;
                }
                body.woocommerce .td_woo_product_rating .star-rating {
                    margin-top: 0;
                    width: auto;
                    height: auto;
                }
                body.woocommerce .td_woo_product_rating .star-rating:before,
                body.woocommerce .td_woo_product_rating .star-rating span:before {
                    position: relative;
                    font-size: 14px;
                }
                body.woocommerce .td_woo_product_rating .star-rating span {
                    padding-top: 0;
                    font-size: 0;
                }
                .td_woo_product_rating .woocommerce-review-link {
                    font-size: 13px;    
                }
                .td_woo_product_rating .woocommerce-review-link:hover {
                    color: #222;    
                }
                
                
                            
                /* @add_space */
                .$unique_block_class .tdw-pr-txt {
                    margin-right: @add_space;
                }
                            
                /* @content_align_horizontal_left */
                .$unique_block_class .tdw-block-inner {
                    justify-content: flex-start;
                }  
                /* @content_align_horizontal_center */
                .$unique_block_class .tdw-block-inner {
                    justify-content: center;
                }  
                /* @content_align_horizontal_right */
                .$unique_block_class .tdw-block-inner {
                    justify-content: flex-end;
                }
                            
                /* @stars_size */
                body.woocommerce div.$unique_block_class .star-rating:before,
                body.woocommerce div.$unique_block_class .star-rating span:before {
                    font-size: @stars_size;
                }  
                            
                /* @stars_margin */
                body.woocommerce div.$unique_block_class .star-rating:before,
                body.woocommerce div.$unique_block_class .star-rating span:before {
                    letter-spacing: @stars_margin;
                }     
                /* @stars_space */
                body.woocommerce div.$unique_block_class .star-rating {
                    margin-right: @stars_space;
                }   
                
                /* @link_show */
                div.$unique_block_class .woocommerce-review-link {
                    display: @link_show;
                }
                
                
                            
                /* @add_txt_color */
                .$unique_block_class .tdw-pr-txt {
                    color: @add_txt_color;
                }
                            
                /* @stars_full_color */
                body.woocommerce div.$unique_block_class .star-rating span:before {
                    color: @stars_full_color;
                }     
                /* @stars_empty_color */
                body.woocommerce div.$unique_block_class .star-rating:before {
                    color: @stars_empty_color;
                }
                            
                /* @link_color */
                div.$unique_block_class .woocommerce-review-link {
                    color: @link_color;
                }     
                /* @link_color_h */
                div.$unique_block_class .woocommerce-review-link:hover {
                    color: @link_color_h;
                }
                
                
                            
                /* @f_add */
                .$unique_block_class .tdw-pr-txt {
                    @f_add
                }           
                /* @f_link */
                div.$unique_block_class .woocommerce-review-link {
                    @f_link
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



        /*-- LAYOUT -- */
        // additional text space
        $res_ctx->load_settings_raw( 'add_space', $res_ctx->get_shortcode_att( 'add_space' ) . 'px' );

        // horizontal align
        $content_align_horizontal = $res_ctx->get_shortcode_att( 'content_align_horizontal' );
        if( $content_align_horizontal == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'content_align_horizontal_left', 1 );
        } else if( $content_align_horizontal == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'content_align_horizontal_center', 1 );
        } else if( $content_align_horizontal == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'content_align_horizontal_right', 1 );
        }

        // stars size
        $stars_size = $res_ctx->get_shortcode_att( 'stars_size' );
        $res_ctx->load_settings_raw( 'stars_size', $stars_size );
        if( $stars_size != '' && is_numeric( $stars_size ) ) {
            $res_ctx->load_settings_raw( 'stars_size', $stars_size . 'px' );
        }
        // stars margin
        $stars_margin = $res_ctx->get_shortcode_att( 'stars_margin' );
        if( $stars_margin != '' && is_numeric( $stars_margin ) ) {
            $res_ctx->load_settings_raw( 'stars_margin', $stars_margin . 'px' );
        }

        // stars right space
        $stars_space = $res_ctx->get_shortcode_att( 'stars_space' );
        $res_ctx->load_settings_raw( 'stars_space', $stars_space );
        if( $stars_space != '' && is_numeric( $stars_space ) ) {
            $res_ctx->load_settings_raw( 'stars_space', $stars_space . 'px' );
        }


        // link show
        $res_ctx->load_settings_raw( 'link_show', $res_ctx->get_shortcode_att( 'link_show' ) );



        /*-- COLORS -- */
        $res_ctx->load_settings_raw( 'add_txt_color', $res_ctx->get_shortcode_att( 'add_txt_color' ) );

        $res_ctx->load_settings_raw( 'stars_full_color', $res_ctx->get_shortcode_att( 'stars_full_color' ) );
        $res_ctx->load_settings_raw( 'stars_empty_color', $res_ctx->get_shortcode_att( 'stars_empty_color' ) );

        $res_ctx->load_settings_raw( 'link_color', $res_ctx->get_shortcode_att( 'link_color' ) );
        $res_ctx->load_settings_raw( 'link_color_h', $res_ctx->get_shortcode_att( 'link_color_h' ) );



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_add' );
        $res_ctx->load_font_settings( 'f_link' );

    }
    
    function __construct() {
        parent::disable_loop_block_features();
    }

    function render($atts, $content = null) {

        global $td_woo_state_single_product_page;
	    $product_rating = $td_woo_state_single_product_page->product_rating->__invoke($atts);
        
        parent::render($atts);

        $add_text_html = '';
        if( $this->get_att('add_text') != '' ) {
            $add_text_html = '<span class="tdw-pr-txt">' . rawurldecode( base64_decode( strip_tags( $this->get_att('add_text') ) ) ) . '</span>';
        }


        $buffy = '';

        if( $product_rating == '' ) {
            return $buffy;
        }

        $buffy .= '<div class="' . $this->get_block_classes()  . '" ' . $this->get_block_html_atts() . '>';

	        //get the block css
	        $buffy .= $this->get_block_css();

	        //get the js for this block
	        $buffy .= $this->get_block_js();


            $buffy .= '<div class="tdw-block-inner td-fix-index">';

                $buffy .= $add_text_html;

                if ( ! empty( $product_rating ) ) {
                    $buffy .= $product_rating;
                }

            $buffy .= '</div>';

        $buffy .= '</div>';

        return $buffy;
    }
}

