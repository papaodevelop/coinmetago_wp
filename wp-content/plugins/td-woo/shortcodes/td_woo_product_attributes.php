<?php

/**
 * Class td_woo_product_attributes - shortcode for woocommerce single product page attributes
 */
class td_woo_product_attributes extends td_block {

    public function get_custom_css() {
        // $unique_block_class
        $unique_block_class = $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>
            
                /* @general_style */
                .td_woo_product_attributes table.shop_attributes {
                    margin: 0;
                    border: 1px solid #ededed;
                }
                .td_woo_product_attributes table.shop_attributes tr {
                    font-size: 13px;
                    border-bottom: 1px solid #ededed;
                }
                .td_woo_product_attributes table.shop_attributes tr:last-child {
                    border-bottom-width: 0 !important;
                }
                .td_woo_product_attributes table.shop_attributes tr:nth-child(even) {
                    background-color: #fcfcfc;
                }
                .td_woo_product_attributes table.shop_attributes th,
                .td_woo_product_attributes table.shop_attributes td {
                    padding: 7px 14px;
                    background: transparent !important;
                    border-bottom: 0;
                }
                .td_woo_product_attributes table.shop_attributes th {
                    border-width: 0 1px 0 0;
                    border-style: solid;
                    border-color: #ededed;
                }
                .td_woo_product_attributes table.shop_attributes td {
                    border-left: 0;
                }
                .td_woo_product_attributes table.shop_attributes td p {
                    padding: 0;
                }
                
                
            
                /* @label_padding */
                .$unique_block_class table.shop_attributes th {
                    padding: @label_padding;
                }
                /* @val_padding */
                .$unique_block_class table.shop_attributes td {
                    padding: @val_padding;
                }
                
                /* @label_horiz_left */
                .$unique_block_class table.shop_attributes th {
                    text-align: left;
                }
                /* @label_horiz_center */
                .$unique_block_class table.shop_attributes th {
                    text-align: center;
                }
                /* @label_horiz_right */
                .$unique_block_class table.shop_attributes th {
                    text-align: right;
                }
                
                /* @value_horiz_left */
                .$unique_block_class table.shop_attributes td {
                    text-align: left;
                }
                /* @value_horiz_center */
                .$unique_block_class table.shop_attributes td {
                    text-align: center;
                }
                /* @value_horiz_right */
                .$unique_block_class table.shop_attributes td {
                    text-align: right;
                }
                
                /* @box_border */
                .$unique_block_class table.shop_attributes {
                    border-width: @box_border;
                }
                /* @row_border */
                .$unique_block_class table.shop_attributes tr {
                    border-bottom-width: @row_border;
                }
                /* @sep_border */
                .$unique_block_class table.shop_attributes th {
                    border-width: 0 @sep_border 0 0 !important;
                }
                
                /* @row_bg_color */
                .$unique_block_class table.shop_attributes tr {
                    background-color: @row_bg_color;
                }
                /* @row_bg_color_a */
                .$unique_block_class table.shop_attributes tr:nth-child(even) {
                    background-color: @row_bg_color_a;
                }
                
                /* @label_color */
                .$unique_block_class table.shop_attributes th {
                    color: @label_color;
                }
                /* @value_color */
                .$unique_block_class table.shop_attributes td {
                    color: @value_color;
                }
                /* @border_color */
                .$unique_block_class table.shop_attributes {
                    border-color: @border_color;
                }
                .$unique_block_class table.shop_attributes tr {
                    border-bottom-color: @border_color;
                }
                .$unique_block_class table.shop_attributes th {
                    border-right-color: @border_color;
                }
                
                
                
                /* @f_header */
				.$unique_block_class .td-block-title a,
				.$unique_block_class .td-block-title span {
					@f_header
				}
                /* @f_label */
                .$unique_block_class table.shop_attributes th {
                    @f_label
                }
                /* @f_value */
                .$unique_block_class table.shop_attributes td {
                    @f_value
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



        // label padding
        $label_padding = $res_ctx->get_shortcode_att( 'label_padding' );
        $res_ctx->load_settings_raw( 'label_padding', $label_padding );
        if( $label_padding != '' && is_numeric( $label_padding ) ) {
            $res_ctx->load_settings_raw( 'label_padding', $label_padding . 'px' );
        }

        // value padding
        $val_padding = $res_ctx->get_shortcode_att( 'val_padding' );
        $res_ctx->load_settings_raw( 'val_padding', $val_padding );
        if( $val_padding != '' && is_numeric( $val_padding ) ) {
            $res_ctx->load_settings_raw( 'val_padding', $val_padding . 'px' );
        }

        // label horiz align
        $label_horiz = $res_ctx->get_shortcode_att( 'label_horiz' );
        if( $label_horiz == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'label_horiz_left', 1 );
        } else if( $label_horiz == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'label_horiz_center', 1 );
        } else if( $label_horiz == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'label_horiz_right', 1 );
        }

        // label horiz align
        $value_horiz = $res_ctx->get_shortcode_att( 'value_horiz' );
        if( $value_horiz == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'value_horiz_left', 1 );
        } else if( $value_horiz == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'value_horiz_center', 1 );
        } else if( $value_horiz == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'value_horiz_right', 1 );
        }


        // box border size
        $box_border = $res_ctx->get_shortcode_att( 'box_border' );
        $res_ctx->load_settings_raw( 'box_border', $box_border );
        if( $box_border != '' && is_numeric( $box_border ) ) {
            $res_ctx->load_settings_raw( 'box_border', $box_border . 'px' );
        }

        // row border size
        $row_border = $res_ctx->get_shortcode_att( 'row_border' );
        $res_ctx->load_settings_raw( 'row_border', $row_border );
        if( $row_border != '' && is_numeric( $row_border ) ) {
            $res_ctx->load_settings_raw( 'row_border', $row_border . 'px' );
        }

        // separator border size
        $sep_border = $res_ctx->get_shortcode_att( 'sep_border' );
        $res_ctx->load_settings_raw( 'sep_border', $sep_border );
        if( $sep_border != '' && is_numeric( $sep_border ) ) {
            $res_ctx->load_settings_raw( 'sep_border', $sep_border . 'px' );
        }


        /*-- COLORS -- */
        $res_ctx->load_settings_raw( 'row_bg_color', $res_ctx->get_shortcode_att( 'row_bg_color' ) );
        $res_ctx->load_settings_raw( 'row_bg_color_a', $res_ctx->get_shortcode_att( 'row_bg_color_a' ) );
        $res_ctx->load_settings_raw( 'label_color', $res_ctx->get_shortcode_att( 'label_color' ) );
        $res_ctx->load_settings_raw( 'value_color', $res_ctx->get_shortcode_att( 'value_color' ) );
        $res_ctx->load_settings_raw( 'border_color', $res_ctx->get_shortcode_att( 'border_color' ) );


        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_header' );
        $res_ctx->load_font_settings( 'f_label' );
        $res_ctx->load_font_settings( 'f_value' );

    }
    
    function __construct() {
        parent::disable_loop_block_features();
    }

    function render( $atts, $content = null ) {

        global $td_woo_state_single_product_page;

	    $attributes_data = $td_woo_state_single_product_page->product_attributes->__invoke($atts);
        
        parent::render($atts);

	    $buffy = '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';

	        //get the block css
	        $buffy .= $this->get_block_css();

	        //get the js for this block
	        $buffy .= $this->get_block_js();

            // block title wrap
            $buffy .= '<div class="td-block-title-wrap">';
                $buffy .= $this->get_block_title();
                $buffy .= $this->get_pull_down_filter();
            $buffy .= '</div>';

            $buffy .= '<div class="tdw-block-inner td-fix-index">';

                if ( !empty( $attributes_data['attributes_html'] ) ) {
                    $buffy .= $attributes_data['attributes_html'];
                }

            $buffy .= '</div>';

        $buffy .= '</div>';

        return $buffy;
    }
}

