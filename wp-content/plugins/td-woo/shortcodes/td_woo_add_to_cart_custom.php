<?php

/**
 * Class td_woo_add_to_cart_custom - shortcode for adding a custom add to cart button
 */
class td_woo_add_to_cart_custom extends td_block {

    protected $shortcode_atts = array(); //the atts used for rendering the current block
    private $unique_block_class;

    public function get_custom_css() {
        // $unique_block_class
        $unique_block_class = $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>
                
                /* @general_style */
                .td_woo_add_to_cart_custom .tdw-btn {
                    display: inline-block;
                }
                
            
                /* @make_inline */
                .$unique_block_class {
                    display: inline-block;
                }
                
                /* @align_horiz_left */
                .$unique_block_class .tdw-block-inner {
                    text-align: left;
                }
                /* @align_horiz_center */
                .$unique_block_class .tdw-block-inner {
                    text-align: center;
                }
                /* @align_horiz_right */
                .$unique_block_class .tdw-block-inner {
                    text-align: right;
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



        // make inline
        $res_ctx->load_settings_raw( 'make_inline', $res_ctx->get_shortcode_att('make_inline') );

        // align horizontal
        $align_horiz = $res_ctx->get_shortcode_att('align_horiz');
        if( $align_horiz == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'align_horiz_left', 1 );
        } else if( $align_horiz == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'align_horiz_center', 1 );
        } else if( $align_horiz == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'align_horiz_right', 1 );
        }

    }
    
    function __construct() {
        parent::disable_loop_block_features();
    }

    function render($atts, $content = null) {

        parent::render($atts);
        global $td_woo_state_single_product_page;
	    $add_to_cart_custom_data = $td_woo_state_single_product_page->product_add_to_cart_custom->__invoke($atts);

        $this->unique_block_class = $this->block_uid;

        $this->shortcode_atts = shortcode_atts(
            array_merge(
                td_api_multi_purpose::get_mapped_atts( __CLASS__ ),
                td_api_style::get_style_group_params( 'tds_w_button' )
            ), $atts );

        // button text
        $btn_text = 'Custom add to cart';
        if( $this->get_att('button_text') != '' ) {
            $btn_text = $this->get_att('button_text');
        }

        // button icon
        $icon = $this->get_icon_att( 'button_tdicon' );
        $icon_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $tdicon_data = 'data-td-svg-icon="' . $this->get_att('button_tdicon') . '"';
        }
        $icon_position = $this->get_att( 'button_icon_position' );
        $buffy_icon = '';
        if ( !empty( $icon ) ) {
            if( base64_encode( base64_decode( $icon ) ) == $icon ) {
                $buffy_icon .= '<span class="tdw-btn-icon tdw-btn-icon-svg" ' . $icon_data . '>' . base64_decode( $icon ) . '</span>';
            } else {
                $buffy_icon .= '<i class="tdw-btn-icon ' . $icon . '"></i>';
            }
        }

        // button styles
        $tds_w_button = $this->get_att('tds_w_button');
        if ( empty( $tds_w_button ) ) {
            $tds_w_button = td_util::get_option( 'tds_w_button', 'tds_w_button1' );
        }
        $tds_w_button_instance = new $tds_w_button( $this->shortcode_atts, $this->unique_block_class );


        $buffy = '';

        $buffy .= '<div class="' . $this->get_block_classes(array(str_replace('_', '-', $tds_w_button)))  . '" ' . $this->get_block_html_atts() . '>';

	        //get the block css
	        $buffy .= $this->get_block_css();
            $buffy .= $tds_w_button_instance->render();

	        //get the js for this block
	        $buffy .= $this->get_block_js();


            $buffy .= '<div class="tdw-block-inner td-fix-index">';

                $buffy .= '<a class="tdw-btn" href="' . $add_to_cart_custom_data['product_add_to_cart_url'] . '" data-quantity="' . $add_to_cart_custom_data['quantity'] . '" class="' . $add_to_cart_custom_data['class'] . '" ' . $add_to_cart_custom_data['attributes'] . ' >';
                    if ( $icon_position == 'icon-before' ) {
                        $buffy .= $buffy_icon;
                    }

                    $buffy .= '<span class="tdw-btn-text">' . $btn_text . '</span>';

                    if ( $icon_position == '' ) {
                        $buffy .= $buffy_icon;
                    }
                $buffy .= '</a>';

            $buffy .= '</div>';

        $buffy .= '</div>';

        return $buffy;
    }
}

