<?php

/**
 * Class td_woo_loop_sorting_options - shortcode for woocommerce products loop sorting options dropdown
 */
class td_woo_loop_sorting_options extends td_block {

    public function get_custom_css() {
        // $unique_block_class
        $unique_block_class = $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>
            
                /* @general */
                .td_woo_loop_sorting_options .tdw-block-inner {
                    display: flex;
                    align-items: center;
                    flex-wrap: wrap;
                }
                .td_woo_loop_sorting_options .woocommerce-result-count,
                .td_woo_loop_sorting_options .woocommerce-ordering {
                    margin-bottom: 0;
                }
                .td_woo_loop_sorting_options .woocommerce-result-count {
                    flex: 1;
                }
                .td_woo_loop_sorting_options .woocommerce-ordering {
                    position: relative;
                    width: 280px; 
                }
                .td_woo_loop_sorting_options .woocommerce-ordering:after {
                    content: '\\e801';
                    position: absolute;
                    top: 50%;
                    transform: translateY(-50%);
                    right: 9px;
                    font-family: 'newspaper';
                    font-size: 14px;
                }
                .td_woo_loop_sorting_options .woocommerce-ordering select {
                    width: 100%;
                    padding: 5px 9px;
                    border-radius: 0;
                    border-color: #bfbfbf;
                    -webkit-appearance: none;
                    outline: none !important;
                    cursor: pointer;
                }
                
                /* @drop_left */
                body .$unique_block_class .tdw-block-inner {
                    justify-content: flex-start;
                }
                /* @drop_center */
                body .$unique_block_class .tdw-block-inner {
                    justify-content: center;
                }/* @drop_right */
                body .$unique_block_class .tdw-block-inner {
                    justify-content: flex-end;
                }
                
                /* @drop_width */
                body .$unique_block_class .woocommerce-ordering {
                    width: @drop_width;
                }
                /* @drop_padding */
                body .$unique_block_class .woocommerce-ordering select {
                    padding: @drop_padding;
                }
                /* @drop_arrow_size */
                body .$unique_block_class .woocommerce-ordering:after {
                    font-size: @drop_arrow_size;
                }
                /* @drop_border */
                body .$unique_block_class .woocommerce-ordering select {
                    border-width: @drop_border;
                }
                /* @drop_border_style */
                body .$unique_block_class .woocommerce-ordering select {
                    border-style: @drop_border_style;
                }
                /* @drop_border_radius */
                body .$unique_block_class .woocommerce-ordering select {
                    border-radius: @drop_border_radius;
                }
                
                /* @drop_color */
                body .$unique_block_class .woocommerce-ordering select {
                    color: @drop_color;
                }
                /* @drop_arrow_color */
                body .$unique_block_class .woocommerce-ordering:after {
                    color: @drop_arrow_color;
                }
                /* @drop_bg_color */
                body .$unique_block_class .woocommerce-ordering select {
                    background-color: @drop_bg_color;
                }
                /* @drop_bg_color_f */
                body .$unique_block_class .woocommerce-ordering select:active,
                body .$unique_block_class .woocommerce-ordering select:focus {
                    background-color: @drop_bg_color_f;
                }
                /* @drop_border_color */
                body .$unique_block_class .woocommerce-ordering select {
                    border-color: @drop_border_color;
                }
                /* @drop_border_color_f */
                body .$unique_block_class .woocommerce-ordering select:active,
                body .$unique_block_class .woocommerce-ordering select:focus {
                    border-color: @drop_border_color_f;
                }
                
                
                /* @f_drop */
                body .$unique_block_class .woocommerce-ordering select {
                    @f_drop
                }
            
            </style>";

        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        // general style
        $res_ctx->load_settings_raw('general', 1);

        // drop horiz align
        $drop_horiz = $res_ctx->get_shortcode_att( 'drop_horiz' );
        if( $drop_horiz == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'drop_left', 1 );
        } else if( $drop_horiz == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'drop_center', 1 );
        } else if( $drop_horiz == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'drop_right', 1 );
        }
        
        // dropdown width
        $drop_width = $res_ctx->get_shortcode_att('drop_width');
        $res_ctx->load_settings_raw( 'drop_width', $drop_width );
        if( $drop_width != '' && is_numeric( $drop_width ) ) {
            $res_ctx->load_settings_raw( 'drop_width', $drop_width . 'px' );
        }
        // dropdown padding
        $drop_padding = $res_ctx->get_shortcode_att('drop_padding');
        $res_ctx->load_settings_raw( 'drop_padding', $drop_padding );
        if( $drop_padding != '' && is_numeric( $drop_padding ) ) {
            $res_ctx->load_settings_raw( 'drop_padding', $drop_padding . 'px' );
        }
        // dropdown arrow size
        $drop_arrow_size = $res_ctx->get_shortcode_att('drop_arrow_size');
        $res_ctx->load_settings_raw( 'drop_arrow_size', $drop_arrow_size );
        if( $drop_arrow_size != '' && is_numeric( $drop_arrow_size ) ) {
            $res_ctx->load_settings_raw( 'drop_arrow_size', $drop_arrow_size . 'px' );
        }
        // dropdown border size
        $drop_border = $res_ctx->get_shortcode_att('drop_border');
        $res_ctx->load_settings_raw( 'drop_border', $drop_border );
        if( $drop_border != '' && is_numeric( $drop_border ) ) {
            $res_ctx->load_settings_raw( 'drop_border', $drop_border . 'px' );
        }
        // dropdown border style
        $drop_border_style = $res_ctx->get_shortcode_att('drop_border_style');
        $res_ctx->load_settings_raw( 'drop_border_style', $drop_border_style );
        if( $drop_border_style == '' ) {
            $res_ctx->load_settings_raw( 'drop_border_style', 'solid' );
        }
        // dropdown border radius
        $drop_border_radius = $res_ctx->get_shortcode_att('drop_border_radius');
        $res_ctx->load_settings_raw( 'drop_border_radius', $drop_border_radius );
        if( $drop_border_radius != '' && is_numeric( $drop_border_radius ) ) {
            $res_ctx->load_settings_raw( 'drop_border_radius', $drop_border_radius . 'px' );
        }



        /*-- COLORS -- */
        $res_ctx->load_settings_raw( 'drop_color', $res_ctx->get_shortcode_att('drop_color') );
        $res_ctx->load_settings_raw( 'drop_arrow_color', $res_ctx->get_shortcode_att('drop_arrow_color') );
        $res_ctx->load_settings_raw( 'drop_bg_color', $res_ctx->get_shortcode_att('drop_bg_color') );
        $res_ctx->load_settings_raw( 'drop_bg_color_f', $res_ctx->get_shortcode_att('drop_bg_color_f') );
        $res_ctx->load_settings_raw( 'drop_border_color', $res_ctx->get_shortcode_att('drop_border_color') );
        $res_ctx->load_settings_raw( 'drop_border_color_f', $res_ctx->get_shortcode_att('drop_border_color_f') );
        


        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_drop' );
    }
    
    function __construct() {
        parent::disable_loop_block_features();
    }

    function render($atts, $content = null) {

        global $td_woo_state_single_product_page, $td_woo_state_archive_product_page, $td_woo_state_search_archive_product_page, $td_woo_state_shop_base_page;

	    switch( tdb_state_template::get_template_type() ) {

		    case 'woo_product':
			    $sorting_options = $td_woo_state_single_product_page->sorting_options->__invoke($atts);
			    break;

		    case 'woo_archive':
			    $sorting_options = $td_woo_state_archive_product_page->sorting_options->__invoke($atts);;
			    break;

		    case 'woo_search_archive':
			    $sorting_options = $td_woo_state_search_archive_product_page->sorting_options->__invoke($atts);;
			    break;

		    case 'woo_shop_base':
			    $sorting_options = $td_woo_state_shop_base_page->sorting_options->__invoke($atts);;
			    break;

		    default:
			    $sorting_options = '';
	    }

        parent::render($atts);

        $buffy = '';

        $buffy .= '<div class="' . $this->get_block_classes()  . '" ' . $this->get_block_html_atts() . '>';

            //get the block css
            $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();

            $buffy .= '<div class="tdw-block-inner td-fix-index">';

                $buffy .= $sorting_options;

            $buffy .= '</div>';

        $buffy .= '</div>';

        return $buffy;
    }
}

