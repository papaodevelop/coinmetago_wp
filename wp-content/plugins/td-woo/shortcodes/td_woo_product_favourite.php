<?php

/**
 * Class td_woo_product_favourite - shortcode for woocommerce favourite single product page
 */
class td_woo_product_favourite extends td_block {

    public function get_custom_css() {
        // $unique_block_class
        $unique_block_class = $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>

                /* @general_style_td_woo_product_favourite */
                .td_woo_product_favourite .tdw-block-inner {
                    display: flex;
                }
                
                
                /* @make_inline */
                .$unique_block_class {
                    display: inline-block;
                }
                /* @horiz_align */
                .$unique_block_class .tdw-block-inner {
                    justify-content: @horiz_align;
                }
                
            </style>";

        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        /*-- GENERAL-- */
        $res_ctx->load_settings_raw('general_style_td_woo_product_favourite', 1);



        /*-- LAYOUT -- */
        // make inline
        $res_ctx->load_settings_raw('make_inline', $res_ctx->get_shortcode_att('make_inline'));

        // horizontal align
        $horiz_align = $res_ctx->get_shortcode_att('horiz_align');
        if( $horiz_align == '' || $horiz_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw('horiz_align', 'flex-start');
        } else if( $horiz_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw('horiz_align', 'center');
        } else if( $horiz_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw('horiz_align', 'flex-end');
        }

    }

    function __construct() {
        parent::disable_loop_block_features();
    }

    function render($atts, $content = null) {

        parent::render($atts);

        global $td_woo_state_single_product_page;
	    $product_id_data = $td_woo_state_single_product_page->product_id->__invoke($atts);

        $this->unique_block_class = $this->block_uid;

        $this->shortcode_atts = shortcode_atts(
            array_merge(
                td_global_blocks::get_mapped_atts( __CLASS__ ),
                td_api_style::get_style_group_params( 'tds_w_favorite' )
            ), $atts );

        $tds_w_favorite = $this->get_att('tds_w_favorite');
        if ( empty( $tds_w_favorite ) ) {
            $tds_w_favorite = td_util::get_option( 'tds_w_favorite', 'tds_w_favorite1' );
        }
        $tds_w_favorite_instance = new $tds_w_favorite( $this->shortcode_atts, $this->unique_block_class );


        $buffy = '';

        $buffy .= '<div class="' . $this->get_block_classes()  . '" ' . $this->get_block_html_atts() . '>';

	        //get the block css
	        $buffy .= $this->get_block_css();

	        //get the js for this block
	        $buffy .= $this->get_block_js();


            $buffy .= '<div class="tdw-block-inner td-fix-index">';

                $buffy .= $tds_w_favorite_instance->render('', $product_id_data['p_id']);

            $buffy .= '</div>';

        $buffy .= '</div>';

        return $buffy;
    }
}

