<?php

/**
 * Class td_woo_product_notices - shortcode for woocommerce single product notices
 */
class td_woo_product_notices extends td_block {

    public function get_custom_css() {
        // $unique_block_class
        $unique_block_class = $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>
            
                /* @general_style */
                .td_woo_product_notices .woocommerce-notices-wrapper > * {
                    display: flex;
                    align-items: center;
                    margin: 0;
                    padding: 11px 20px;
                    background-color: #fcfcfc;
                    font-size: 12px;
                    line-height: 1.5;
                    border: 1px solid #ededed;
                }
                .td_woo_product_notices .woocommerce-notices-wrapper > *:before {
                    position: relative;
                    top: 0;
                    left: 0;
                    margin-right: 17px;
                    font-size: 20px;
                    line-height: 1;
                }
                body .td_woo_product_notices .woocommerce-notices-wrapper .button {
                    order: 2;
                    margin-left: auto;
                    padding: 9px 10px 10px;
                    background: none #222;
                    color: #fff;
                    border-radius: 0;
                    -webkit-transition: all 0.3s;
                    transition: all 0.3s;
                    white-space: nowrap;
                    font-size: 11px;
                    line-height: 1;
                }
                body .td_woo_product_notices .woocommerce-notices-wrapper .button:hover {
                    background-color: #4db2ec;
                }
                /* @error_type */
                .td_woo_product_notices .woocommerce-notices-wrapper .woocommerce-error li {
                    display: flex;
                    align-items: center;
                    flex: 1;
                    line-height: inherit;
                }
                
                
                /* @padding */
                body .$unique_block_class .woocommerce-notices-wrapper > * {
                    padding: @padding;
                }
                /* @border_size */
                body .$unique_block_class .woocommerce-notices-wrapper > * {
                    border-width: @border_size;
                }
                /* @border_style */
                body .$unique_block_class .woocommerce-notices-wrapper > * {
                    border-style: @border_style;
                }
                /* @border_radius */
                body .$unique_block_class .woocommerce-notices-wrapper > * {
                    border-radius: @border_radius;
                }
                
                /* @icon_space */
                body .$unique_block_class .woocommerce-notices-wrapper > *:before {
                    margin-right: @icon_space;
                }
                /* @icon_size */
                body .$unique_block_class .woocommerce-notices-wrapper > *:before {
                    font-size: @icon_size;
                }
                
                /* @btn_padding */
                body div.$unique_block_class .woocommerce-notices-wrapper .button {
                    padding: @btn_padding;
                }
                /* @btn_border_size */
                body div.$unique_block_class .woocommerce-notices-wrapper .button {
                    border-width: @btn_border_size;
                }
                /* @btn_border_style */
                body div.$unique_block_class .woocommerce-notices-wrapper .button {
                    border-style: @btn_border_style;
                }
                /* @btn_border_radius */
                body div.$unique_block_class .woocommerce-notices-wrapper .button {
                    border-radius: @btn_border_radius;
                }
                
                
                /* @bg_color */
                body .$unique_block_class .woocommerce-notices-wrapper > * {
                    background-color: @bg_color;
                }
                /* @border_color_s */
                body .$unique_block_class .woocommerce-notices-wrapper .woocommerce-message {
                    border-color: @border_color_s;
                }
                /* @border_color_e */
                body .$unique_block_class .woocommerce-notices-wrapper .woocommerce-error {
                    border-color: @border_color_e;
                }
                /* @border_color_n */
                body .$unique_block_class .woocommerce-notices-wrapper .woocommerce-info {
                    border-color: @border_color_n;
                }
                
                /* @icon_color_s */
                body .$unique_block_class .woocommerce-notices-wrapper .woocommerce-message:before {
                    color: @icon_color_s;
                }
                /* @icon_color_e */
                body .$unique_block_class .woocommerce-notices-wrapper .woocommerce-error:before {
                    color: @icon_color_e;
                }
                /* @icon_color_n */
                body .$unique_block_class .woocommerce-notices-wrapper .woocommerce-info:before {
                    color: @icon_color_n;
                }
                
                /* @txt_color */
                body .$unique_block_class .woocommerce-notices-wrapper > * {
                    color: @txt_color;
                }
                
                /* @btn_color */
                body div.$unique_block_class .woocommerce-notices-wrapper .button {
                    color: @btn_color;
                }
                /* @btn_color_h */
                body div.$unique_block_class .woocommerce-notices-wrapper .button:hover {
                    color: @btn_color_h;
                }
                /* @btn_bg_color */
                body div.$unique_block_class .woocommerce-notices-wrapper .button {
                    background-color: @btn_bg_color;
                }
                /* @btn_bg_color_h */
                body div.$unique_block_class .woocommerce-notices-wrapper .button:hover {
                    background-color: @btn_bg_color_h;
                }
                /* @btn_border_color */
                body div.$unique_block_class .woocommerce-notices-wrapper .button {
                    border-color: @btn_border_color;
                }
                /* @btn_border_color_h */
                body div.$unique_block_class .woocommerce-notices-wrapper .button:hover {
                    border-color: @btn_border_color_h;
                }
                
                
                /* @f_txt */
                body .$unique_block_class .woocommerce-notices-wrapper > * {
                    @f_txt
                }
                /* @f_btn */
                body div.$unique_block_class .woocommerce-notices-wrapper .button {
                    @f_btn
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

        $sample_data_type = $res_ctx->get_shortcode_att( 'sample_data_type' );
        if( $sample_data_type == 'error' ) {
            $res_ctx->load_settings_raw( 'error_type', 1 );
        }



        /*-- LAYOUT-- */
        // padding
        $padding = $res_ctx->get_shortcode_att( 'padding' );
        $res_ctx->load_settings_raw( 'padding', $padding );
        if( $padding != '' && is_numeric( $padding ) ) {
            $res_ctx->load_settings_raw( 'padding', $padding . 'px' );
        }
        // border size
        $border_size = $res_ctx->get_shortcode_att( 'border_size' );
        $res_ctx->load_settings_raw( 'border_size', $border_size );
        if( $border_size != '' && is_numeric( $border_size ) ) {
            $res_ctx->load_settings_raw( 'border_size', $border_size . 'px' );
        }
        // border style
        $border_style = $res_ctx->get_shortcode_att( 'border_style' );
        $res_ctx->load_settings_raw( 'border_style', $border_style );
        if( $border_style == '' ) {
            $res_ctx->load_settings_raw( 'border_style', 'solid' );
        }
        // border radius
        $border_radius = $res_ctx->get_shortcode_att( 'border_radius' );
        $res_ctx->load_settings_raw( 'border_radius', $border_radius );
        if( $border_radius != '' && is_numeric( $border_radius ) ) {
            $res_ctx->load_settings_raw( 'border_radius', $border_radius . 'px' );
        }

        // icon right space
        $icon_space = $res_ctx->get_shortcode_att( 'icon_space' );
        $res_ctx->load_settings_raw( 'icon_space', $icon_space );
        if( $icon_space != '' && is_numeric( $icon_space ) ) {
            $res_ctx->load_settings_raw( 'icon_space', $icon_space . 'px' );
        }
        // icon size
        $icon_size = $res_ctx->get_shortcode_att( 'icon_size' );
        $res_ctx->load_settings_raw( 'icon_size', $icon_size );
        if( $icon_size != '' && is_numeric( $icon_size ) ) {
            $res_ctx->load_settings_raw( 'icon_size', $icon_size . 'px' );
        }

        // button padding
        $btn_padding = $res_ctx->get_shortcode_att( 'btn_padding' );
        $res_ctx->load_settings_raw( 'btn_padding', $btn_padding );
        if( $btn_padding != '' && is_numeric( $btn_padding ) ) {
            $res_ctx->load_settings_raw( 'btn_padding', $btn_padding . 'px' );
        }
        // button border size
        $btn_border_size = $res_ctx->get_shortcode_att( 'btn_border_size' );
        $res_ctx->load_settings_raw( 'btn_border_size', $btn_border_size );
        if( $btn_border_size != '' && is_numeric( $btn_border_size ) ) {
            $res_ctx->load_settings_raw( 'btn_border_size', $btn_border_size . 'px' );
        }
        // button border style
        $btn_border_style = $res_ctx->get_shortcode_att( 'btn_border_style' );
        $res_ctx->load_settings_raw( 'btn_border_style', $btn_border_style );
        if( $btn_border_style == '' ) {
            $res_ctx->load_settings_raw( 'btn_border_style', 'solid' );
        }
        // button border radius
        $btn_border_radius = $res_ctx->get_shortcode_att( 'btn_border_radius' );
        $res_ctx->load_settings_raw( 'btn_border_radius', $btn_border_radius );
        if( $btn_border_radius != '' && is_numeric( $btn_border_radius ) ) {
            $res_ctx->load_settings_raw( 'btn_border_radius', $btn_border_radius . 'px' );
        }



        /*-- STYLE-- */
        $res_ctx->load_settings_raw( 'bg_color', $res_ctx->get_shortcode_att( 'bg_color' ) );
        $res_ctx->load_settings_raw( 'border_color_s', $res_ctx->get_shortcode_att( 'border_color_s' ) );
        $res_ctx->load_settings_raw( 'border_color_e', $res_ctx->get_shortcode_att( 'border_color_e' ) );
        $res_ctx->load_settings_raw( 'border_color_n', $res_ctx->get_shortcode_att( 'border_color_n' ) );

        $res_ctx->load_settings_raw( 'icon_color_s', $res_ctx->get_shortcode_att( 'icon_color_s' ) );
        $res_ctx->load_settings_raw( 'icon_color_e', $res_ctx->get_shortcode_att( 'icon_color_e' ) );
        $res_ctx->load_settings_raw( 'icon_color_n', $res_ctx->get_shortcode_att( 'icon_color_n' ) );
        $res_ctx->load_settings_raw( 'txt_color', $res_ctx->get_shortcode_att( 'txt_color' ) );

        $res_ctx->load_settings_raw( 'btn_color', $res_ctx->get_shortcode_att( 'btn_color' ) );
        $res_ctx->load_settings_raw( 'btn_color_h', $res_ctx->get_shortcode_att( 'btn_color_h' ) );
        $res_ctx->load_settings_raw( 'btn_bg_color', $res_ctx->get_shortcode_att( 'btn_bg_color' ) );
        $res_ctx->load_settings_raw( 'btn_bg_color_h', $res_ctx->get_shortcode_att( 'btn_bg_color_h' ) );
        $res_ctx->load_settings_raw( 'btn_border_color', $res_ctx->get_shortcode_att( 'btn_border_color' ) );
        $res_ctx->load_settings_raw( 'btn_border_color_h', $res_ctx->get_shortcode_att( 'btn_border_color_h' ) );



        /*-- FONTS-- */
        $res_ctx->load_font_settings( 'f_txt' );
        $res_ctx->load_font_settings( 'f_btn' );

    }
    
    function __construct() {
        parent::disable_loop_block_features();
    }

    function render($atts, $content = null) {

        global $td_woo_state_single_product_page;
	    $notices = $td_woo_state_single_product_page->product_notices->__invoke($atts);
        
        parent::render($atts);

        $buffy = '';

        if( $notices == '<div class="woocommerce-notices-wrapper"></div>' ) {
            return $buffy;
        }

        $buffy .= '<div class="' . $this->get_block_classes()  . '" ' . $this->get_block_html_atts() . '>';

	        //get the block css
	        $buffy .= $this->get_block_css();

	        //get the js for this block
	        $buffy .= $this->get_block_js();

            $buffy .= '<div class="tdb-block-inner td-fix-index">';

		    if ( ! empty( $notices ) ) {
			    $buffy .= $notices;
		    }

            $buffy .= '</div>';

        $buffy .= '</div>';

        return $buffy;
    }
}

