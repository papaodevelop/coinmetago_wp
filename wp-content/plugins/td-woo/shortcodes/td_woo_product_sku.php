<?php

/**
 * Class td_woo_product_sku - shortcode for woocommerce single product page stock keeping unit
 */
class td_woo_product_sku extends td_block {

    public function get_custom_css() {
        // $unique_block_class
        $unique_block_class = $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>
            
                /* @add_space */
                .$unique_block_class .tdw-ps-text {
                    margin-right: @add_space;
                }
                 
                /* @content_align_horizontal_left */
                .$unique_block_class .tdw-block-inner {
                    text-align: left;
                }
                /* @content_align_horizontal_center */
                .$unique_block_class .tdw-block-inner {
                    text-align: center;
                }
                /* @content_align_horizontal_right */
                .$unique_block_class .tdw-block-inner {
                    text-align: right;
                }
                
                                
                /* @add_text_color */
                .$unique_block_class .tdw-ps-text {
                    color: @add_text_color;
                }
                /* @sku_color */
                .$unique_block_class .tdw-ps-sku {
                    color: @sku_color;
                }
                
                                
                /* @f_text */
                .$unique_block_class .tdw-ps-text {
                    @f_text
                }
                /* @f_sku */
                .$unique_block_class .tdw-ps-sku {
                    @f_sku
                }
                
            </style>";

        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

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
        $res_ctx->load_settings_raw( 'sku_color', $res_ctx->get_shortcode_att( 'sku_color' ) );


        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_text' );
        $res_ctx->load_font_settings( 'f_sku' );

    }
    
    function __construct() {
        parent::disable_loop_block_features();
    }

    function render($atts, $content = null) {

        global $td_woo_state_single_product_page;

	    $product_sku_data = $td_woo_state_single_product_page->product_sku->__invoke($atts);
        
        parent::render($atts);

        // add_text
        $add_text = rawurldecode( base64_decode( strip_tags ( $this->get_att( 'add_text' ) ) ) );
        $add_text_html = '';
        if ( !empty( $add_text ) ) {
            $add_text_html = '<span class="tdw-ps-text">' . $add_text . '</span>';
        }

	    // product type
	    $product_type = $product_sku_data['type'];

        $buffy = '';

        $buffy .= '<div class="' . $this->get_block_classes()  . '" ' . $this->get_block_html_atts() . '>';

	        //get the block css
	        $buffy .= $this->get_block_css();

	        //get the js for this block
	        $buffy .= $this->get_block_js();

            $buffy .= '<div class="tdw-block-inner td-fix-index">';

                $buffy .= '<div class="product_meta">';

                    if ( !empty($product_sku_data['sku']) || $product_type === 'variable' ) {
	                    $sku = ( !empty($product_sku_data['sku']) ) ? $product_sku_data['sku'] : 'N/A';
	                    $buffy .= '<span class="sku_wrapper">' . $add_text_html;
	                    $buffy .= ' <span class="tdw-ps-sku sku">' . $sku . '</span>';
	                    $buffy .= '</span>';
                    }

                $buffy .= '</div>';

            $buffy .= '</div>';

        $buffy .= '</div>';

        return $buffy;
    }
}

