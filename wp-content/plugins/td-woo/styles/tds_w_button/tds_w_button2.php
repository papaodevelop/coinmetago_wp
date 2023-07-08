<?php
/**
 * Created by PhpStorm.
 * User: tagdiv
 * Date: 13.07.2017
 * Time: 9:39
 */

class tds_w_button2 extends td_style {

    private $unique_style_class;
    private $atts = array();
    private $index_style;

    function __construct( $atts, $unique_block_class = '', $index_style = '') {
        $this->atts = $atts;
        $this->unique_block_class = $unique_block_class;
        $this->index_style = $index_style;
    }

    private function get_css() {

        $compiled_css = '';

        $unique_style_class = $this->unique_style_class;
        $unique_block_class = $this->unique_block_class;

		$raw_css =
			"<style>

				/* @general_style */
				.tdw-btn,
                form.variations_form .single_add_to_cart_button {
                    display: inline-block;
                    font-family: 'Roboto', sans-serif;
                    text-align: center;
                    position: relative;
                    pointer-events: auto !important;
                    -webkit-appearance: none;
                    outline: none;
                    border: 0;
                    background: transparent;
                    padding: 0 16px;
                    font-size: 13px;
                    line-height: 29px;
                }
				.tdw-btn .tdw-btn-text {
                    vertical-align: middle;
                }
                .tdw-btn-icon {
                    vertical-align: middle;
                    pointer-events: none;
                    line-height: 1;
                }
				.tdw-btn i {
                    -webkit-transition: all 0.3s;
                    transition: all 0.3s;
                }
                .tdw-btn-icon-svg {
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                }
                .tdw-btn-icon-svg svg {
                    width: 13px;
                    height: auto;
                    transition: all 0.3s;
                    -webkit-transition: all 0.3s;
                }
				.tdw-btn .tdw-btn-icon:first-child {
                    margin-right: 14px;
                }
				.tdw-btn .tdw-btn-icon:last-child {
                    margin-left: 14px;
                }
				
				/* @specific_style */
                body.woocommerce div.tds-w-button2 .tdw-btn,
				body.woocommerce div.tds-w-button2 form.variations_form .single_add_to_cart_button {
                    position: relative;
                    color: #222;
                    border-color: #222;
                    -webkit-transition: all 0.3s;
                    transition: all 0.3s;
                }
                body.woocommerce div.tds-w-button2 svg,
                body.woocommerce div.tds-w-button2 svg * {
                    fill: #222;
                }
                body.woocommerce div.tds-w-button2 .tdw-btn:hover,
				body.woocommerce div.tds-w-button2 form.variations_form .single_add_to_cart_button:hover {
                    color: #4db2ec;
                    border-color: #4db2ec;
                }
                body.woocommerce div.tds-w-button2 .tdw-btn:hover svg,
                body.woocommerce div.tds-w-button2 .tdw-btn:hover svg * {
                    fill: #4db2ec;
                }
				body.woocommerce div.tds-w-button2 form.variations_form .single_add_to_cart_button {
				    background-color: transparent !important;
				}
                

                /* @button_width */
                .$unique_block_class .tdw-btn,
				body.woocommerce div.$unique_block_class form.variations_form button.single_add_to_cart_button {
                    min-width: @button_width;
                }
                /* @button_padding */
                body .$unique_block_class .tdw-btn,
				body.woocommerce div.$unique_block_class form.variations_form button.single_add_to_cart_button {
                    height: auto;
                    padding: @button_padding;
                }
				/* @button_icon_size */
				.$unique_block_class .tdw-btn i {
					font-size: @button_icon_size;
				}
				/* @button_icon_svg_size */
				.$unique_block_class .tdw-btn svg {
					width: @button_icon_svg_size;
				}
				/* @icon_left_margin */
				body .$unique_block_class .tdw-btn .tdw-btn-icon:last-child {
					margin-left: @icon_left_margin;
				}
				/* @icon_right_margin */
				body .$unique_block_class .tdw-btn .tdw-btn-icon:first-child {
					margin-right: @icon_right_margin;
				}
				
				/* @text_color */
				.$unique_block_class .tdw-block-inner .tdw-btn .tdw-btn-text,
				.$unique_block_class .tdw-btn i,
				body.woocommerce div.$unique_block_class form.variations_form button.single_add_to_cart_button {
					color: @text_color;
				}
				.$unique_block_class .tdw-btn .tdw-btn-icon-svg svg,
				.$unique_block_class .tdw-btn .tdw-btn-icon-svg svg * {
				    fill: @text_color;
				}
				/* @text_hover_color */
				body .$unique_block_class .tdw-block-inner .tdw-btn:hover .tdw-btn-text,
				body .$unique_block_class .tdw-block-inner .tdw-btn:hover i,
				body.woocommerce div.$unique_block_class form.variations_form button.single_add_to_cart_button:hover {
					color: @text_hover_color;
				}
				body .$unique_block_class .tdw-block-inner .tdw-btn:hover .tdw-btn-icon-svg svg,
				body .$unique_block_class .tdw-block-inner .tdw-btn:hover .tdw-btn-icon-svg svg * {
				    fill: @text_hover_color;
				}
				

				/* @icon_color_solid */
				.$unique_block_class .tdw-btn i {
					color: @icon_color_solid;
				    -webkit-text-fill-color: unset;
    				background: transparent;
				}
				.$unique_block_class .tdw-block-inner .tdw-btn .tdw-btn-icon-svg svg,
				.$unique_block_class .tdw-block-inner .tdw-btn .tdw-btn-icon-svg svg * {
				    fill: @icon_color_solid;
				}
				/* @icon_color_gradient */
				.$unique_block_class .tdw-btn i {
					@icon_color_gradient
					-webkit-background-clip: text;
					-webkit-text-fill-color: transparent;
				}
				.$unique_block_class .tdw-block-inner .tdw-btn .tdw-btn-icon-svg svg,
				.$unique_block_class .tdw-block-inner .tdw-btn .tdw-btn-icon-svg svg * {
				    fill: @icon_color_gradient_1;
				}
				html[class*='ie'] .$unique_block_class .tdw-btn i {
				    background: none;
					color: @icon_color_gradient_1;
				}

				/* @icon_hover_color */
				body .$unique_block_class .tdw-btn:hover i {
					color: @icon_hover_color;
				}
				body .$unique_block_class .tdw-block-inner .tdw-btn:hover .tdw-btn-icon-svg svg,
				body .$unique_block_class .tdw-block-inner .tdw-btn:hover .tdw-btn-icon-svg svg * {
				    fill: @icon_hover_color;
				}
				/* @icon_hover_gradient */
				body .$unique_block_class .tdw-btn:hover i {
					-webkit-text-fill-color: unset;
					background: transparent;
					transition: none;
				}


				/* @border_color_solid */
				body.woocommerce div.$unique_block_class .tdw-block-inner .tdw-btn,
				body.woocommerce div.$unique_block_class form.variations_form button.single_add_to_cart_button {
					border-color: @border_color_solid;
				}
				/* @border_color_params */
				body.woocommerce div.$unique_block_class .tdw-block-inner .tdw-btn,
				body.woocommerce div.$unique_block_class form.variations_form button.single_add_to_cart_button {
				    border-image: linear-gradient(@border_color_params);
				    border-image: -webkit-linear-gradient(@border_color_params);
				    border-image-slice: 1;
				    transition: none;
				}
				body.woocommerce div.$unique_block_class .tdw-block-inner .tdw-btn:hover,
				body.woocommerce div.$unique_block_class form.variations_form button.single_add_to_cart_button:hover {
				    border-image: linear-gradient(@border_hover_color, @border_hover_color);
				    border-image: -webkit-linear-gradient(@border_hover_color, @border_hover_color);
				    border-image-slice: 1;
				    transition: none;
				}
				/* @border_hover_color */
				body.woocommerce div.$unique_block_class .tdw-block-inner .tdw-btn:hover,
				body.woocommerce div.$unique_block_class form.variations_form button.single_add_to_cart_button:hover {
					border-color: @border_hover_color;
				}

				/* @border_size */
				.$unique_block_class .tdw-btn,
				body.woocommerce div.$unique_block_class form.variations_form button.single_add_to_cart_button {
					border-width: @border_size;
				}
				/* @border_style */
				.$unique_block_class .tdw-btn,
				body.woocommerce div.$unique_block_class form.variations_form button.single_add_to_cart_button {
					border-style: @border_style;
				}
				/* @border_radius */
				.$unique_block_class .tdw-btn,
				body.woocommerce div.$unique_block_class form.variations_form button.single_add_to_cart_button {
					border-radius: @border_radius;
				}



				/* @f_btn_text */
				.$unique_block_class .tdw-btn,
				body.woocommerce div.$unique_block_class form.variations_form button.single_add_to_cart_button {
					@f_btn_text
				}
				/* @f_btn_text_line_height */
				.$unique_block_class .tdw-btn,
				body.woocommerce div.$unique_block_class form.variations_form button.single_add_to_cart_button {
					height: auto;
				}

			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->atts, $this->index_style );

        $compiled_css .= $td_css_res_compiler->compile_css();
		return $compiled_css;
	}

    /**
     * Callback pe media
     *
     * @param $res_ctx td_res_context
     */
    static function cssMedia( $res_ctx ) {

        /*-- GENERAL-- */
        $res_ctx->load_settings_raw( 'general_style', 1 );
        $res_ctx->load_settings_raw( 'specific_style', 1 );



        // button width
        $button_width = $res_ctx->get_shortcode_att( 'button_width' );
        $res_ctx->load_settings_raw( 'button_width', $button_width );
        if( $button_width != '' ) {
            if( is_numeric( $button_width ) ) {
                $res_ctx->load_settings_raw( 'button_width', $button_width . 'px' );
            }
        }

        // button padding
        $button_padding = $res_ctx->get_shortcode_att('button_padding');
        $res_ctx->load_settings_raw('button_padding', $res_ctx->get_shortcode_att('button_padding'));
        if( $button_padding != '' && is_numeric( $button_padding ) ) {
            $res_ctx->load_settings_raw('button_padding', $res_ctx->get_shortcode_att('button_padding') . 'px');
        }



        /*-- TEXT -- */
        // text color
        $res_ctx->load_settings_raw( 'text_color', $res_ctx->get_style_att( 'text_color', __CLASS__ ) );
        $res_ctx->load_settings_raw( 'text_hover_color', $res_ctx->get_style_att( 'text_hover_color', __CLASS__ ) );



        /*-- ICON -- */
        $button_icon = $res_ctx->get_icon_att('button_tdicon');
        // icon size
        $icon_size = $res_ctx->get_shortcode_att('button_icon_size' );
        if( base64_encode( base64_decode( $button_icon ) ) == $button_icon ) {
            $res_ctx->load_settings_raw( 'button_icon_svg_size', $icon_size );
            if( $icon_size != '' ) {
                if( is_numeric( $icon_size ) ) {
                    $res_ctx->load_settings_raw( 'button_icon_svg_size', $icon_size . 'px' );
                }
            }
        } else {
            $res_ctx->load_settings_raw( 'button_icon_size', $icon_size );
            if( $icon_size != '' ) {
                if( is_numeric( $icon_size ) ) {
                    $res_ctx->load_settings_raw( 'button_icon_size', $icon_size . 'px' );
                }
            }
        }

        // icon space
        if ( !empty ( $button_icon ) ) {
            $icon_space = $res_ctx->get_shortcode_att( 'button_icon_space' );

            if ( $res_ctx->get_shortcode_att( 'button_icon_position' ) === '') {
                if ( is_numeric( $icon_space ) ) {
                    $res_ctx->load_settings_raw( 'icon_left_margin', $icon_space . 'px' );
                } else {
                    $res_ctx->load_settings_raw( 'icon_left_margin', $icon_space );
                }
            } else {
                if ( is_numeric( $icon_space ) ) {
                    $res_ctx->load_settings_raw( 'icon_right_margin', $icon_space . 'px' );
                } else {
                    $res_ctx->load_settings_raw( 'icon_right_margin', $icon_space );
                }
            }
        }

        // icon color
        $res_ctx->load_color_settings( 'icon_color', 'icon_color_solid', 'icon_color_gradient', 'icon_color_gradient_1', '', __CLASS__ );

        // icon hover color
        $icon_hover_color = $res_ctx->get_style_att( 'icon_hover_color', __CLASS__ );
        $res_ctx->load_settings_raw( 'icon_hover_color', $icon_hover_color);
        if ( !empty ($icon_hover_color ) ) {
            $res_ctx->load_settings_raw( 'icon_hover_gradient', 1 );
        }



        /*-- BORDER -- */
        // border size
        $border_size = $res_ctx->get_style_att( 'border_size', __CLASS__ );
        $res_ctx->load_settings_raw( 'border_size', $border_size );
        if( $border_size != '' ) {
            if( is_numeric( $border_size ) ) {
                $res_ctx->load_settings_raw( 'border_size', $border_size . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'border_size', '2px' );
        }

        // border style
        $border_style = $res_ctx->get_style_att( 'border_style', __CLASS__ );
        $res_ctx->load_settings_raw( 'border_style', 'solid' );
        if( !empty( $border_style ) ) {
            $res_ctx->load_settings_raw( 'border_style', $border_style );
        }

        // border color
        $res_ctx->load_color_settings( 'border_color', 'border_color_solid', 'border_color_gradient', 'border_color_gradient_1', 'border_color_params', __CLASS__ );

        // border hover color
        $border_hover_color = $res_ctx->get_style_att( 'border_hover_color', __CLASS__ );
        if ( !empty( $border_hover_color ) ) {
            $res_ctx->load_settings_raw( 'border_hover_color', $border_hover_color);
        }

        // border radius
        $border_radius = $res_ctx->get_style_att( 'border_radius', __CLASS__ );
        $res_ctx->load_settings_raw( 'border_radius', $border_radius );
        if( $border_radius != '' ) {
            if( is_numeric( $border_radius ) ) {
                $res_ctx->load_settings_raw( 'border_radius', $border_radius . 'px' );
            }
        }



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_btn_text', __CLASS__ );
        $res_ctx->load_settings_raw( 'f_btn_text_line_height', $res_ctx->get_style_att( 'f_btn_text_font_line_height', __CLASS__ ) );

    }

    function render( $index_style = '' ) {

        if ( ! empty( $index_style ) ) {
            $this->index_style = $index_style;
        }
        $this->unique_style_class = td_global::td_generate_unique_id();

        $buffy = PHP_EOL . '<style>' . PHP_EOL . $this->get_css() . PHP_EOL . '</style>';

		return $buffy;
	}

    function get_style_att( $att_name ) {
	    return $this->get_att( $att_name, __CLASS__, $this->index_style );
    }

    function get_atts() {
        return $this->atts;
    }
}