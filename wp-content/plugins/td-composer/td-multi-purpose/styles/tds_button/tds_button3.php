<?php
/**
 * Created by PhpStorm.
 * User: tagdiv
 * Date: 13.07.2017
 * Time: 11:44
 */

class tds_button3 extends td_style {

    private $unique_block_class;
    private $unique_style_class;
    private $atts = array();
    private $index_style;

    function __construct( $atts, $index_style = '', $unique_block_class = '') {
        $this->atts = $atts;
        $this->unique_block_class = $unique_block_class;
        $this->index_style = $index_style;
    }

    private function get_css() {

        $compiled_css = '';

        $unique_style_class = $this->unique_style_class;

        $unique_block_active_class = '';
        if ( ! empty( $this->unique_block_class ) ) {
            $unique_block_active_class = '.' . $this->unique_block_class . '.td-scroll-in-view .' . $unique_style_class;
        }

		$raw_css =
			"<style>

                /* @background_solid */
				body .$unique_style_class {
					background-color: @background_solid;
				}
				/* @background_gradient */
				body .$unique_style_class {
					@background_gradient
				}

				/* @background_hover_solid */
				body .$unique_style_class:before {
					background-color: @background_hover_solid;
				}
				.$unique_style_class:hover:before {
					opacity: 1;
				}
				/* @background_active_solid */
				$unique_block_active_class:before {
				    opacity: 1;
				}
				/* @background_hover_gradient */
				.$unique_style_class:before {
					@background_hover_gradient
				}
				.$unique_style_class:hover:before {
					opacity: 1;
				}
				/* @background_active_gradient */
				$unique_block_active_class:before {
				    opacity: 1;
				}

				/* @text_color_solid */
				.$unique_style_class .tdm-btn-text,
				.$unique_style_class i {
					color: @text_color_solid;
				}
				.$unique_style_class svg {
				    fill: @text_color_solid;
				}
				.$unique_style_class svg * {
				    fill: inherit;
				}
				/* @text_color_gradient */
				.$unique_style_class .tdm-btn-text,
				.$unique_style_class i {
					@text_color_gradient
					-webkit-background-clip: text;
					-webkit-text-fill-color: transparent;
				}
				html[class*='ie'] .$unique_style_class .tdm-btn-text,
				html[class*='ie'] .$unique_style_class i {
				    background: none;
					color: @text_color_gradient_1;
				}
				.$unique_style_class svg {
				    fill: @text_color_gradient_1;
				}
				.$unique_style_class svg * {
				    fill: inherit;
				}
				/* @text_hover_color */
				body .$unique_style_class:hover .tdm-btn-text,
				body .$unique_style_class:hover i {
					color: @text_hover_color;
				}
				body .$unique_style_class:hover svg {
				    fill: @text_hover_color;
				}
				body .$unique_style_class:hover svg *  {
				    fill: inherit;
				}
				/* @text_active_color */
				body $unique_block_active_class .tdm-btn-text,
				body $unique_block_active_class i {
					color: @text_active_color;
				}
				body $unique_block_active_class svg {
				    fill: @text_active_color;
				}
				body $unique_block_active_class svg *  {
				    fill: inherit;
				}
				/* @text_hover_gradient */
				body .$unique_style_class:hover .tdm-btn-text,
				body .$unique_style_class:hover i {
					-webkit-text-fill-color: unset;
					background: transparent;
					transition: none;
				}
				/* @text_active_gradient */
				body $unique_block_active_class .tdm-btn-text,
				body $unique_block_active_class .tdm-btn-text i {
					-webkit-text-fill-color: unset;
					background: transparent;
					transition: none;
				}

				/* @icon_color_solid */
				.$unique_style_class i {
					color: @icon_color_solid;
				    -webkit-text-fill-color: unset;
    				background: transparent;
				}
				.$unique_style_class svg {
				    fill: @icon_color_solid;
				}
				.$unique_style_class svg * {
				    fill: inherit;
				}
				/* @icon_color_gradient */
				.$unique_style_class i {
					@icon_color_gradient
					-webkit-background-clip: text;
					-webkit-text-fill-color: transparent;
				}
				html[class*='ie'] .$unique_style_class i {
				    background: none;
					color: @icon_color_gradient_1;
				}
				.$unique_style_class svg {
				    fill: @icon_color_gradient_1;
				}
				.$unique_style_class svg * {
				    fill: inherit;
				}

				/* @icon_hover_color */
				body .$unique_style_class:hover i {
					color: @icon_hover_color;
				}
				body .$unique_style_class:hover svg{
				    fill: @icon_hover_color;
				}
				body .$unique_style_class:hover svg * {
				    fill: inherit;
				}
				/* @icon_active_color */
				body $unique_block_active_class i {
					color: @icon_active_color;
				}
				body $unique_block_active_class svg {
				    fill: @icon_active_color;
				}
				body $unique_block_active_class svg + {
				    fill: inherit;
				}
				/* @icon_hover_gradient */
				body .$unique_style_class:hover i {
					-webkit-text-fill-color: unset;
					background: transparent;
					transition: none;
				}
				/* @icon_active_gradient */
				body $unique_block_active_class i  {
					-webkit-text-fill-color: unset;
					background: transparent;
					transition: none;
				}

                /* @button_icon_size */
				.$unique_style_class i {
					font-size: @button_icon_size;
				}
				/* @button_icon_svg_size */
				.$unique_style_class svg {
					width: @button_icon_svg_size;
                    height: auto;
				}
				/* @button_width */
                .$unique_style_class {
                    min-width: @button_width;
                }
                /* @button_padding */
                .$unique_style_class {
                    padding: @button_padding;
                    height: auto;
                    line-height: 1;
                }
				/* @icon_left_margin */
				body .$unique_style_class .tdm-btn-icon:last-child {
					margin-left: @icon_left_margin;
				}
				/* @icon_right_margin */
				body .$unique_style_class .tdm-btn-icon:first-child {
					margin-right: @icon_right_margin;
				}
				/* @border_radius */
				.$unique_style_class,
				.$unique_style_class:before {
					border-radius: @border_radius;
				}


				/* @shadow */
				.$unique_style_class {
					box-shadow: @shadow;
				}
				/* @shadow_hover */
				.$unique_style_class:hover {
					box-shadow: @shadow_hover;
				}
				/* @shadow_active */
				$unique_block_active_class {
					box-shadow: @shadow_hover;
				}
				
		
				
				/* @f_btn_text */
				.$unique_style_class {
					@f_btn_text
				}
				/* @f_btn_text_line_height */
				.$unique_style_class {
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

        $atts = $res_ctx->get_atts();
        $scroll_to_class = '';
        if( isset( $atts['scroll_to_class'] ) ) {
            $scroll_to_class = $res_ctx->get_shortcode_att('scroll_to_class');
        }

        // button width
        $button_width = $res_ctx->get_shortcode_att( 'button_width' );
        $res_ctx->load_settings_raw( 'button_width', $button_width );
        if( $button_width != '' ) {
            if( is_numeric( $button_width ) ) {
                $res_ctx->load_settings_raw( 'button_width', $button_width . 'px' );
            }
        }

        $button_padding = $res_ctx->get_shortcode_att('button_padding');
        $res_ctx->load_settings_raw( 'button_padding', $button_padding );
        if( $button_padding != '' && is_numeric( $button_padding ) ) {
            $res_ctx->load_settings_raw( 'button_padding', $button_padding . 'px' );
        }

        /*-- BACKGROUND-- */
        // background color
        $res_ctx->load_color_settings( 'background_color', 'background_solid', 'background_gradient', '', '', __CLASS__ );

        // background hover color
        $res_ctx->load_color_settings( 'background_hover_color', 'background_hover_solid', 'background_hover_gradient', '', '', __CLASS__ );
        if( $scroll_to_class != '' ) {
            $res_ctx->load_color_settings( 'background_hover_color', 'background_active_solid', 'background_active_gradient', '', '', __CLASS__ );
        }



        /*-- TEXT -- */
        // text color
        $res_ctx->load_color_settings( 'text_color', 'text_color_solid', 'text_color_gradient', 'text_color_gradient_1', '', __CLASS__ );

        // text hover color
        $text_hover_color = $res_ctx->get_style_att( 'text_hover_color', __CLASS__ );
        $res_ctx->load_settings_raw( 'text_hover_color', $text_hover_color);
        if ( !empty ($text_hover_color ) ) {
            $res_ctx->load_settings_raw( 'text_hover_gradient', 1 );
        }
        if( $scroll_to_class != '' ) {
            $res_ctx->load_settings_raw( 'text_active_color', $text_hover_color);
            if ( !empty ($text_hover_color ) ) {
                $res_ctx->load_settings_raw( 'text_active_gradient', 1 );
            }
        }



        /*-- ICON -- */
        $button_icon = $res_ctx->get_icon_att('button_tdicon' );
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
        if( $scroll_to_class != '' ) {
            $res_ctx->load_settings_raw( 'icon_active_color', $icon_hover_color);
            if ( !empty ($icon_hover_color ) ) {
                $res_ctx->load_settings_raw( 'icon_active_gradient', 1 );
            }
        }



        /*-- SHADOW -- */
        $res_ctx->load_shadow_settings( 16, 0, 2, 0, 'rgba(0, 0, 0, 0.1)', 'shadow', __CLASS__ );
        $res_ctx->load_shadow_settings( 26, 0, 2, 0, 'rgba(0, 0, 0, 0.1)', 'shadow_hover', __CLASS__ );
        if( $scroll_to_class != '' ) {
            $res_ctx->load_settings_raw( 'shadow_active', 1 );
        }



        /*-- BORDER -- */
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


        $button_text = td_util::get_custom_field_value_from_string($this->get_shortcode_att('button_text', $this->index_style));

        $icon = $this->get_icon_att('button_tdicon', $this->index_style);
        $icon_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $icon_data = 'data-td-svg-icon="' . $this->get_att( 'button_tdicon', $this->index_style ) . '"';
        }
        $icon_position = $this->get_shortcode_att('button_icon_position', $this->index_style);

        $target = '';
        if ( '' !== $this->get_shortcode_att('button_open_in_new_window', $this->index_style) ) {
            $target = ' target="_blank" ';
        }

        $button_url = td_util::get_custom_field_value_from_string($this->get_shortcode_att('button_url', $this->index_style));
        if ( '' == $button_url) {
            $button_url = '#';
        }

        //set rel attribute on button url
        $td_link_rel = '';
        if ( '' !== $this->get_shortcode_att('button_url_rel', $this->index_style) ) {
            $td_link_rel = ' rel="' . $this->get_shortcode_att('button_url_rel', $this->index_style) . '" ';
        }

        $buffy_icon = '';
        if ( !empty( $icon ) ) {
            if( base64_encode( base64_decode( $icon ) ) == $icon ) {
                $buffy_icon .= '<span class="tdm-btn-icon tdm-btn-icon-svg" ' . $icon_data . '>' . base64_decode( $icon ) . '</span>';
            } else {
                $buffy_icon .= '<i class="tdm-btn-icon ' . $icon . '"></i>';
            }
        }

        /**
         * Google Analytics tracking settings
         */
        $data_ga_event_cat = '';
        $data_ga_event_action = '';
        $data_ga_event_label = '';

        // don't add tracking options in td composer
        if ( !tdc_state::is_live_editor_ajax() && !tdc_state::is_live_editor_iframe() ) {
            $ga_event_category = $this->get_shortcode_att('ga_event_category');
            if ( ! empty( $ga_event_category ) ) {
                $data_ga_event_cat = ' data-ga-event-cat="' . $ga_event_category . '" ';
            }

            $ga_event_action = $this->get_shortcode_att('ga_event_action');
            if ( ! empty( $ga_event_action ) ) {
                $data_ga_event_action = ' data-ga-event-action="' . $ga_event_action . '" ';
            }

            $ga_event_label = $this->get_shortcode_att('ga_event_label');
            if ( ! empty( $ga_event_label ) ) {
                $data_ga_event_label = ' data-ga-event-label="' . $ga_event_label . '" ';
            }
        }

        /**
         * FB Pixel tracking settings
         */
        $data_fb_event_name = '';
        $data_fb_event_cotent_name = '';

        // don't add tracking options in td composer
        if ( !tdc_state::is_live_editor_ajax() && !tdc_state::is_live_editor_iframe() ) {
            $fb_event_name = $this->get_shortcode_att('fb_pixel_event_name');
            if ( ! empty( $fb_event_name ) ) {
                $data_fb_event_name = ' data-fb-event-name="' . $fb_event_name . '" ';
            }
            $fb_event_content_name = $this->get_shortcode_att('fb_pixel_event_content_name');
            if ( ! empty( $fb_event_content_name ) ) {
                $data_fb_event_cotent_name = ' data-fb-event-content-name="' . $fb_event_content_name . '" ';
            }
        }

        $buffy = $this->get_style($this->get_css());
        $buffy .= '<div class="' . self::get_group_style( __CLASS__ ) . ' td-fix-index">';
            $buffy .= '<a href="' . $button_url . '" class="' . self::get_class_style(__CLASS__) . ' tdm-btn ' . $this->get_shortcode_att('button_size', $this->index_style) . ' ' . $this->unique_style_class . '" ' . $td_link_rel . $target . $data_ga_event_cat . $data_ga_event_action . $data_ga_event_label . $data_fb_event_name . $data_fb_event_cotent_name . '>';
                if ( $icon_position == 'icon-before' ) {
                    $buffy .= $buffy_icon;
                }

                $buffy .= '<span class="tdm-btn-text">' . $button_text . '</span>';

                if ( $icon_position == '' ) {
                    $buffy .= $buffy_icon;
                }
            $buffy .= '</a>';
        $buffy .= '</div>';

		return $buffy;
	}

    function get_style_att( $att_name ) {
        return $this->get_att( $att_name ,__CLASS__, $this->index_style );
    }

    function get_atts() {
        return $this->atts;
    }
}
