<?php
/**
 * Created by PhpStorm.
 * User: tagdiv
 * Date: 13.07.2017
 * Time: 9:38
 */

class tds_newsletter7 extends td_style {

    private $unique_style_class;
    private $unique_block_class;
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

        $unique_block_class = '';
        if ( !empty( $this->unique_block_class ) ) {
            $unique_block_class = '.' . $this->unique_block_class;
        }

        $raw_css =
            "<style>

                /* @title_color */
                .$unique_style_class .tdn-title {
                    color: @title_color;
                }
                /* @title_space */
                .$unique_style_class .tdn-title {
                    margin-bottom: @title_space;
                }
                /* @description_color*/
                .$unique_style_class .tdn-descr {
                    color: @description_color;
                }
                /* @descr_space*/
                .$unique_style_class .tdn-descr {
                    margin-bottom: @descr_space;
                }
                /* @disclaimer_color */
                .$unique_style_class .tdn-disclaimer1 {
                    color: @disclaimer_color;
                }
                /* @disclaimer2_color */
                .$unique_style_class .tdn-disclaimer2 {
                    color: @disclaimer2_color;
                }


                /* @border_color1 */
                $unique_block_class:before {
                    background: repeating-linear-gradient(-45deg, @border_color1, @border_color1 19px, transparent 10px, transparent 30px, @border_color2 20px, @border_color2 46px, transparent 40px, transparent 57px);
                }


				/* @input_bar_display_column */
                .$unique_style_class .tdn-email-bar {
                    flex-direction: row;
                }
                .$unique_style_class .tdn-input-wrap {
                    margin-bottom: 0;
                }
                .$unique_style_class input[type=email] {
                    border-right-width: 0;
                }
                /* @input_bar_display_row */
                .$unique_style_class .tdn-email-bar {
                    flex-direction: column;
                }
                .$unique_style_class .tdn-input-wrap {
                    margin-bottom: 13px;
                }
                /* @input_text_color */
                .$unique_style_class input {
                    color: @input_text_color;
                }
                /* @input_placeholder_color */
                .$unique_style_class input::placeholder {
                    color: @input_placeholder_color;
                }
                .$unique_style_class input:-ms-input-placeholder {
                    color: @input_placeholder_color !important;
                }
                /* @input_bg_color */
                .$unique_style_class input {
                    background-color: @input_bg_color;
                }
                /* @input_border_size_column */
                .$unique_style_class input {
                    border-width: @input_border_size_column 0 @input_border_size_column @input_border_size_column;
                }
                /* @input_border_size_row */
                .$unique_style_class input {
                    border-width: @input_border_size_row;
                }
                /* @input_border_color */
                .$unique_style_class input {
                    border-color: @input_border_color;
                }
                /* @input_border_color_active */
                .$unique_style_class input:focus {
                    border-color: @input_border_color_active !important;
                }


                /* @btn_text_color */
                .$unique_style_class button {
                    color: @btn_text_color;
                }
                .$unique_style_class button .tdn-btn-icon-svg svg,
                .$unique_style_class button .tdn-btn-icon-svg svg * {
                    fill: @btn_text_color;
                }
                /* @btn_bg_color */
                .$unique_style_class button {
                    background-color: @btn_bg_color;
                }
                /* @btn_text_color_hover */
                .$unique_style_class button:hover {
                   color: @btn_text_color_hover;
                }
                .$unique_style_class button:hover .tdn-btn-icon-svg svg,
                .$unique_style_class button:hover .tdn-btn-icon-svg svg * {
                    fill: @btn_text_color_hover;
                }
                /* @btn_bg_color_hover */
                .$unique_style_class button:hover {
                    background-color: @btn_bg_color_hover;
                }
                /* @btn_border_size */
                .$unique_style_class button {
                    border-width: @btn_border_size;
                    border-style: solid;
                    border-color: #e1e1e1;
                }
                /* @btn_border_color */
                .$unique_style_class button {
                    border-color: @btn_border_color;
                }
                /* @btn_border_color_hover */
                .$unique_style_class button:hover {
                    border-color: @btn_border_color_hover;
                }
                /* @btn_icon_size */
                .$unique_style_class button .tdn-btn-icon {
                    font-size: @btn_icon_size;
                }
                /* @btn_icon_svg_size */
                .$unique_style_class button .tdn-btn-icon-svg svg {
                    width: @btn_icon_svg_size;
                }
                /* @btn_icon_align */
                .$unique_style_class button .tdn-btn-icon {
                    top: @btn_icon_align;
                }
                /* @btn_icon_space_left */
                .$unique_style_class button .tdn-btn-icon {
                    margin-left: @btn_icon_space_left;
                }
                /* @btn_icon_space_right */
                .$unique_style_class button .tdn-btn-icon {
                    margin-right: @btn_icon_space_right;
                }
                /* @btn_icon_color */
                .$unique_style_class button i {
                    color: @btn_icon_color;
                }
                .$unique_style_class button .tdn-btn-icon-svg svg,
                .$unique_style_class button .tdn-btn-icon-svg svg * {
                    fill: @btn_icon_color;
                }
                /* @btn_icon_color_hover */
                .$unique_style_class button:hover i {
                    color: @btn_icon_color_hover;
                }   
                .$unique_style_class button:hover .tdn-btn-icon-svg svg,
                .$unique_style_class button:hover .tdn-btn-icon-svg svg * {
                    fill: @btn_icon_color_hover;
                }


                /* @input_bar_border_radius_column */
                .$unique_style_class input {
                    border-radius: @input_bar_border_radius_column 0 0 @input_bar_border_radius_column;
                }
                .$unique_style_class button {
                    border-radius: 0 @input_bar_border_radius_column @input_bar_border_radius_column 0;
                }
                /* @input_bar_border_radius_row */
                .$unique_style_class input,
                .$unique_style_class button {
                    border-radius: @input_bar_border_radius_row;
                }
                
                
                /* @check_size */
                .$unique_style_class .av-checkbox+label .tdn-check {
                    width: @check_size;
                    height: @check_size;
                }
                .$unique_style_class .av-checkbox+label .tdn-check:after {
                    width: calc(@check_size - 10px);
                    height: calc(@check_size - 10px);
                }
                /* @check_space */
                .$unique_style_class .tdn-checkbox {
                    margin-bottom: @check_space;
                }
                /* @check_label_space */
                .$unique_style_class .av-checkbox+label .tdn-check-title {
                    margin-left: @check_label_space;
                }
                /* @check_border */
                .$unique_style_class .av-checkbox+label .tdn-check {
                    border-color: @check_border;
                }
                /* @check_accent */
                .$unique_style_class .av-checkbox+label .tdn-check:after {
                    background-color: @check_accent;
                }
                /* @check_label */
                .$unique_style_class .av-checkbox+label .tdn-check-title {
                    color: @check_label;
                }



				/* @f_title */
				.$unique_style_class .tdn-title {
					@f_title
				}
				/* @f_descr */
				.$unique_style_class .tdn-descr {
					@f_descr
				}
				/* @f_disclaimer */
				.$unique_style_class .tdn-disclaimer1 {
					@f_disclaimer
				}
				/* @f_disclaimer2 */
				.$unique_style_class .tdn-disclaimer2 {
					@f_disclaimer2
				}
				/* @f_input */
				.$unique_style_class input[type=email],
				.$unique_style_class button {
					@f_input
				}
				/* @f_btn */
				.$unique_style_class button {
					@f_btn
				}
				/* @f_check */
				.$unique_style_class .av-checkbox+label .tdn-check-title {
					@f_check
				}


			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->atts);

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    /**
     * Callback pe media
     *
     * @param $res_ctx - $responsive_context td_res_context
     */
    static function cssMedia( $res_ctx ) {

        /*-- IMAGE -- */
        $res_ctx->load_settings_raw( 'image_bg_color', $res_ctx->get_style_att( 'image_bg_color', __CLASS__ ) );



        /*-- BORDER -- */
        // border colors
        $border_color1 = $res_ctx->get_style_att( 'border_color1', __CLASS__ );
        $border_color2 = $res_ctx->get_style_att( 'border_color2', __CLASS__ );
        $res_ctx->load_settings_raw( 'border_color1', $border_color1 );
        $res_ctx->load_settings_raw( 'border_color2', $border_color2 );
        if( $border_color1 == '' ) {
            $res_ctx->load_settings_raw( 'border_color1', '#cc4745' );
        }
        if( $border_color2 == '' ) {
            $res_ctx->load_settings_raw( 'border_color2', '#1c69ad' );
        }



        /*-- TEXT -- */
        // title color
        $res_ctx->load_settings_raw( 'title_color', $res_ctx->get_style_att( 'title_color', __CLASS__ ) );
        // title space
        $title_space = $res_ctx->get_shortcode_att( 'title_space' );
        $res_ctx->load_settings_raw( 'title_space', $title_space );
        if( $title_space != '' && is_numeric( $title_space ) ) {
            $res_ctx->load_settings_raw( 'title_space', $title_space . 'px' );
        }
        // description color
        $res_ctx->load_settings_raw( 'description_color', $res_ctx->get_style_att( 'description_color', __CLASS__ ) );
        // description space
        $descr_space = $res_ctx->get_shortcode_att( 'descr_space' );
        $res_ctx->load_settings_raw( 'descr_space', $descr_space );
        if( $descr_space != '' && is_numeric( $descr_space ) ) {
            $res_ctx->load_settings_raw( 'descr_space', $descr_space . 'px' );
        }
        // disclaimer 1 color
        $res_ctx->load_settings_raw( 'disclaimer_color', $res_ctx->get_style_att( 'disclaimer_color', __CLASS__ ) );
        // disclaimer 2 color
        $res_ctx->load_settings_raw( 'disclaimer2_color', $res_ctx->get_style_att( 'disclaimer2_color', __CLASS__ ) );



        /*-- EMAIL INPUT BAR -- */
        // display
        $input_bar_display = $res_ctx->get_style_att( 'input_bar_display', __CLASS__ );
        if( $input_bar_display == '' ) {
            $res_ctx->load_settings_raw( 'input_bar_display_column', 1 );
        } else if ( $input_bar_display == 'row' ) {
            $res_ctx->load_settings_raw( 'input_bar_display_row', 1 );
        }
        // input text color
        $res_ctx->load_settings_raw( 'input_text_color', $res_ctx->get_style_att( 'input_text_color', __CLASS__ ) );
        // input placeholder color
        $res_ctx->load_settings_raw( 'input_placeholder_color', $res_ctx->get_style_att( 'input_placeholder_color', __CLASS__ ) );
        // input background color
        $res_ctx->load_settings_raw( 'input_bg_color', $res_ctx->get_style_att( 'input_bg_color', __CLASS__ ) );
        // input border size
        $input_bar_border_size = $res_ctx->get_style_att( 'input_border_size', __CLASS__ );
        if( $input_bar_display == '' ) {
            $res_ctx->load_settings_raw('input_border_size_column', $input_bar_border_size);
            if ($input_bar_border_size != '' && is_numeric($input_bar_border_size)) {
                $res_ctx->load_settings_raw('input_border_size_column', $input_bar_border_size . 'px');
            }
        } else if ( $input_bar_display == 'row' ) {
            $res_ctx->load_settings_raw('input_border_size_row', $input_bar_border_size);
            if ($input_bar_border_size != '' && is_numeric($input_bar_border_size)) {
                $res_ctx->load_settings_raw('input_border_size_row', $input_bar_border_size . 'px');
            }
        }
        // input border color
        $res_ctx->load_settings_raw( 'input_border_color', $res_ctx->get_style_att( 'input_border_color', __CLASS__ ) );
        // input border actve color
        $res_ctx->load_settings_raw( 'input_border_color_active', $res_ctx->get_style_att( 'input_border_color_active', __CLASS__ ) );
        // input bar border radius
        $input_bar_border_radius = $res_ctx->get_style_att( 'input_bar_border_radius', __CLASS__ );
        if( $input_bar_display == '' ) {
            $res_ctx->load_settings_raw( 'input_bar_border_radius_column', $input_bar_border_radius );
            if( $input_bar_border_radius != '' ) {
                if( is_numeric( $input_bar_border_radius ) ) {
                    $res_ctx->load_settings_raw( 'input_bar_border_radius_column', $input_bar_border_radius . 'px' );
                }
            }
        } else if ( $input_bar_display == 'row' ) {
            $res_ctx->load_settings_raw( 'input_bar_border_radius_row', $input_bar_border_radius );
            if( $input_bar_border_radius != '' ) {
                if( is_numeric( $input_bar_border_radius ) ) {
                    $res_ctx->load_settings_raw( 'input_bar_border_radius_row', $input_bar_border_radius . 'px' );
                }
            }
        }



        /*-- CHECKBOX -- */
        // checkbox size
        $check_size = $res_ctx->get_style_att( 'check_size', __CLASS__ );
        if( $check_size != '' && is_numeric( $check_size ) ) {
            $res_ctx->load_settings_raw( 'check_size', $check_size . 'px' );
        }
        // checkbox space
        $check_space = $res_ctx->get_style_att( 'check_space', __CLASS__ );
        if( $check_space != '' && is_numeric( $check_space ) ) {
            $res_ctx->load_settings_raw( 'check_space', $check_space . 'px' );
        }
        // checkbox label space
        $check_label_space = $res_ctx->get_style_att( 'check_label_space', __CLASS__ );
        if( $check_label_space != '' && is_numeric( $check_label_space ) ) {
            $res_ctx->load_settings_raw( 'check_label_space', $check_label_space . 'px' );
        }
        // checkbox border color
        $res_ctx->load_settings_raw( 'check_border', $res_ctx->get_style_att( 'check_border', __CLASS__ ) );
        // checkbox active accent color
        $res_ctx->load_settings_raw( 'check_accent', $res_ctx->get_style_att( 'check_accent', __CLASS__ ) );
        // checkbox label text color
        $res_ctx->load_settings_raw( 'check_label', $res_ctx->get_style_att( 'check_label', __CLASS__ ) );



        /*-- BUTTON -- */
        // button text color
        $res_ctx->load_settings_raw( 'btn_text_color', $res_ctx->get_style_att( 'btn_text_color', __CLASS__ ) );
        // button hover text color
        $res_ctx->load_settings_raw( 'btn_text_color_hover', $res_ctx->get_style_att( 'btn_text_color_hover', __CLASS__ ) );
        // button background color
        $res_ctx->load_settings_raw( 'btn_bg_color', $res_ctx->get_style_att( 'btn_bg_color', __CLASS__ ) );
        // button hover background color
        $res_ctx->load_settings_raw( 'btn_bg_color_hover', $res_ctx->get_style_att( 'btn_bg_color_hover', __CLASS__ ) );
        // input border size
        $btn_bar_border_size = $res_ctx->get_style_att( 'btn_border_size', __CLASS__ );
        $res_ctx->load_settings_raw( 'btn_border_size', $btn_bar_border_size );
        if( $btn_bar_border_size != '' && is_numeric( $btn_bar_border_size ) ) {
            $res_ctx->load_settings_raw( 'btn_border_size', $btn_bar_border_size . 'px' );
        }
        // button border color
        $res_ctx->load_settings_raw( 'btn_border_color', $res_ctx->get_style_att( 'btn_border_color', __CLASS__ ) );
        // button hover border color
        $res_ctx->load_settings_raw( 'btn_border_color_hover', $res_ctx->get_style_att( 'btn_border_color_hover', __CLASS__ ) );
        // button icon size
        $btn_icon = $res_ctx->get_icon_att('btn_tdicon');
        $btn_icon_size = $res_ctx->get_shortcode_att( 'btn_icon_size' );
        if ( base64_encode( base64_decode( $btn_icon ) ) == $btn_icon ) {
            $res_ctx->load_settings_raw( 'btn_icon_svg_size', $btn_icon_size );
            if( $btn_icon_size != '' && is_numeric( $btn_icon_size ) ) {
                $res_ctx->load_settings_raw( 'btn_icon_svg_size', $btn_icon_size . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'btn_icon_size', $btn_icon_size );
            if( $btn_icon_size != '' && is_numeric( $btn_icon_size ) ) {
                $res_ctx->load_settings_raw( 'btn_icon_size', $btn_icon_size . 'px' );
            }
        }$btn_icon_size = $res_ctx->get_shortcode_att( 'btn_icon_size' );
        $res_ctx->load_settings_raw( 'btn_icon_size', $btn_icon_size );
        if( $btn_icon_size != '' && is_numeric( $btn_icon_size ) ) {
            $res_ctx->load_settings_raw( 'btn_icon_size', $btn_icon_size . 'px' );
        }
        // button icon align
        $res_ctx->load_settings_raw( 'btn_icon_align', $res_ctx->get_shortcode_att( 'btn_icon_align' ) . 'px' );
        // button icon space
        $btn_icon_pos = $res_ctx->get_shortcode_att( 'btn_icon_pos' );
        $btn_icon_space = $res_ctx->get_shortcode_att( 'btn_icon_space' );
        if( $btn_icon_pos == '' || $btn_icon_pos == 'after' ) {
            $res_ctx->load_settings_raw( 'btn_icon_space_left', $btn_icon_space );
            if( $btn_icon_space != '' && is_numeric( $btn_icon_space ) ) {
                $res_ctx->load_settings_raw( 'btn_icon_space_left', $btn_icon_space . 'px' );
            }
        } else if ( $btn_icon_pos == 'before' ) {
            $res_ctx->load_settings_raw( 'btn_icon_space_right', $btn_icon_space );
            if( $btn_icon_space != '' && is_numeric( $btn_icon_space ) ) {
                $res_ctx->load_settings_raw( 'btn_icon_space_right', $btn_icon_space . 'px' );
            }
        }

        // button icon color
        $res_ctx->load_settings_raw( 'btn_icon_color', $res_ctx->get_style_att( 'btn_icon_color', __CLASS__ ) );
        // button hover icon color
        $res_ctx->load_settings_raw( 'btn_icon_color_hover', $res_ctx->get_style_att( 'btn_icon_color_hover', __CLASS__ ) );



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_title', __CLASS__ );
        $res_ctx->load_font_settings( 'f_descr', __CLASS__ );
        $res_ctx->load_font_settings( 'f_disclaimer', __CLASS__ );
        $res_ctx->load_font_settings( 'f_disclaimer2', __CLASS__ );
        $res_ctx->load_font_settings( 'f_input', __CLASS__ );
        $res_ctx->load_font_settings( 'f_btn', __CLASS__ );
        $res_ctx->load_font_settings( 'f_check', __CLASS__ );

    }

    function render( $index_style = '' ) {

        if ( ! empty( $index_style ) ) {
            $this->index_style = $index_style;
        }
        $this->unique_style_class = td_global::td_generate_unique_id();

        $title_text = $this->get_shortcode_att( 'title_text', $this->index_style);
        $title_tag = 'h3';
        $block_title_tag = $this->get_shortcode_att( 'title_tag', $this->index_style);
        if ( $block_title_tag != '' ) {
            $title_tag = $block_title_tag ;
        }
        $description = rawurldecode( base64_decode( strip_tags( $this->get_shortcode_att( 'description', $this->index_style ) ) ) );
        $disclaimer = $this->get_shortcode_att( 'disclaimer', $this->index_style);
        $disclaimer2 = $this->get_shortcode_att( 'disclaimer2', $this->index_style);
        $image = $this->get_style_att( 'image' );
        $input_placeholder = $this->get_shortcode_att('input_placeholder', $this->index_style);
        $btn_text = $this->get_shortcode_att('btn_text', $this->index_style);
        $btn_icon = $this->get_icon_att('btn_tdicon', $this->index_style);
        $btn_icon_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $btn_icon_data = 'data-td-svg-icon="' . $this->get_shortcode_att('btn_tdicon', $this->index_style) . '"';
        }
        $btn_icon_html = '';
        if( $btn_icon != '' ) {
            if( base64_encode( base64_decode( $btn_icon ) ) == $btn_icon ) {
                $btn_icon_html = '<span class="tdn-btn-icon tdn-btn-icon-svg" ' . $btn_icon_data . '>' . base64_decode( $btn_icon ) . '</span>';
            } else {
                $btn_icon_html = '<i class="tdn-btn-icon ' . $btn_icon . '"></i>';
            }
        }
        $btn_icon_pos = $this->get_shortcode_att('btn_icon_pos', $this->index_style);

        $embedded_form_type = $this->get_shortcode_att( 'embedded_form_type', $this->index_style );
        $embedded_form_code = rawurldecode( base64_decode( strip_tags( $this->get_shortcode_att( 'embedded_form_code', $this->index_style ) ) ) );

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
	    $data_fb_event_content_name = '';

	    // don't add tracking options in td composer
	    if ( !tdc_state::is_live_editor_ajax() && !tdc_state::is_live_editor_iframe() ) {
		    $fb_event_name = $this->get_shortcode_att('fb_pixel_event_name');
		    if ( ! empty( $fb_event_name ) ) {
			    $data_fb_event_name = ' data-fb-event-name="' . $fb_event_name . '" ';
		    }
		    $fb_event_content_name = $this->get_shortcode_att('fb_pixel_event_content_name');
		    if ( ! empty( $fb_event_content_name ) ) {
			    $data_fb_event_content_name = ' data-fb-event-content-name="' . $fb_event_content_name . '" ';
		    }
	    }

        $buffy = '';

        if ( ! empty($embedded_form_code) ) {

            $newsletter_data = $this->get_newsletter_action_att($embedded_form_code, $embedded_form_type);

            if ( $newsletter_data === false ) {
                $buffy .= td_util::get_block_error('Newsletter', '<strong>' . $embedded_form_type . ' > <em>embedded form code</em></strong> configuration is not correct.');
            } else {
                $buffy = PHP_EOL . '<style>' . PHP_EOL . $this->get_css() . PHP_EOL . '</style>';
                $buffy .= '<div class="' . self::get_group_style( __CLASS__ ) . ' ' . self::get_class_style(__CLASS__) . ' ' . $this->unique_style_class . ' tdn-style-bordered td-fix-index">';

                    if ( !empty( $image ) ) {
                        $buffy .= '<div class="tdn-image-wrap">';
                            $buffy .= '<img src="' . wp_get_attachment_url( $image ) . '" class="tdn-newsletter-image">';
                        $buffy .= '</div>';
                    }

                    $buffy .= '<div class="tdn-info-wrap">';
                        if( $title_text != '' || $description != '' ) {
                            $buffy .= '<div class="tdn-info">';
                            if( $title_text != '' ) {
                                $buffy .= '<' . $title_tag . ' class="tdn-title">' . $title_text . '</' . $title_tag . '>';
                            }

                            if( $description != '' ) {
                                $buffy .= '<p class="tdn-descr">' . $description . '</p>';
                            }
                            $buffy .= "</div>";
                        }

                        if (!empty ($embedded_form_type) && $embedded_form_type == 'mailchimp') {
                            $buffy .= '<form class="tdn-form" action="' . $newsletter_data['url'] . '" method="post" name="mc-embedded-subscribe-form" target="_blank">';
                                $buffy .= '<div class="tdn-email-bar">';
                                    $buffy .= '<div class="tdn-input-wrap">';
                                        $buffy .= '<input type="email" aria-label="email" name="EMAIL" placeholder="' . $input_placeholder . '" required>';
                                    $buffy .= "</div>";

                                    $buffy .= '<div class="tdn-btn-wrap">';
                                        $buffy .= '<button class="tdn-submit-btn" type="submit" name="subscribe" ' . $data_ga_event_cat . $data_ga_event_action . $data_ga_event_label . $data_fb_event_name . $data_fb_event_content_name . '>';
                                            if( $btn_icon_pos == 'before' ) {
                                                $buffy .= $btn_icon_html;
                                            }

                                            $buffy .= $btn_text;

                                            if( $btn_icon_pos == '' || $btn_icon_pos == 'after' ) {
                                                $buffy .= $btn_icon_html;
                                            }
                                        $buffy .= '</button>';
                                    $buffy .= "</div>";
                                $buffy .= "</div>";

                                if( $disclaimer != '' ) {
                                    $buffy .= '<div class="tdn-disclaimer tdn-disclaimer1">' . $disclaimer . '</div>';
                                }

                                //gdpr checkboxes
                                if ( !empty ($newsletter_data['item_array']) && is_array($newsletter_data['item_array']) ) {
                                    $buffy .= '<div class="tdn-checkbox-wrap">';
                                    foreach ( $newsletter_data['item_array'] as $id => $name ) {
                                        $buffy .= '<div class="tdn-checkbox">';
                                        $buffy .= '<input id="gdpr_' . $id . '" class="av-checkbox " name="gdpr[' . $id . ']" value="Y" type="checkbox">';
                                        $buffy .= '<label class="checkbox subfield" for="gdpr_' . $id . '">';
                                        $buffy .= '<span class="tdn-check"></span>';
                                        $buffy .= '<span class="tdn-check-title">' . $name . '</span>';
                                        $buffy .= '</label>';
                                        $buffy .= '</div>';
                                    };
                                    $buffy .= '</div>';
                                }
                            
                            $buffy .= "</form>";
                        } elseif (!empty ($embedded_form_type) && $embedded_form_type == 'mailerlite') {
                            $buffy .= '<form class="tdn-form" action="' . $newsletter_data['url'] . '" data-code="' . $newsletter_data['code'] . '" method="post" target="_blank">';
                                $buffy .= '<input type="hidden" name="ml-submit" value="1" />';

                                $buffy .= '<div class="tdn-email-bar">';
                                    $buffy .= '<div class="tdn-input-wrap">';
                                        $buffy .= '<input type="email" aria-label="email" name="fields[email]" placeholder="' . $input_placeholder . '" value="" autocomplete="email" x-autocompletetype="email" spellcheck="false" autocapitalize="off" autocorrect="off" required>';
                                    $buffy .= "</div>";

                                    $buffy .= '<div class="tdn-btn-wrap">';
	                                    $buffy .= '<button class="tdn-submit-btn" type="submit" name="subscribe" ' . $data_ga_event_cat . $data_ga_event_action . $data_ga_event_label . $data_fb_event_name . $data_fb_event_content_name . '>' . $btn_text . '</button>';
                                    $buffy .= "</div>";
                                $buffy .= "</div>";

                                if( $disclaimer != '' ) {
                                    $buffy .= '<div class="tdn-disclaimer tdn-disclaimer1">' . $disclaimer . '</div>';
                                }
                            $buffy .= "</form>";
                        } elseif (!empty ($embedded_form_type) && $embedded_form_type == 'feedburner') {
                            $buffy .= '<form class="tdn-form" action="//feedburner.google.com/fb/a/mailverify" method="post" target="_blank">';
                                $buffy .= '<input type="hidden" name="uri" value="' . $newsletter_data['id'] . '" />';
                                $buffy .= '<input type="hidden" name="loc" value="' . get_locale() . '" />';

                                $buffy .= '<div class="tdn-email-bar">';
                                    $buffy .= '<div class="tdn-input-wrap">';
                                        $buffy .= '<input type="email" aria-label="email" name="email" autocomplete="email" x-autocompletetype="email" spellcheck="false" autocapitalize="off" autocorrect="off" id="feedburner-email" placeholder="' . $input_placeholder . '" required>';
                                    $buffy .= "</div>";

                                    $buffy .= '<div class="tdn-btn-wrap">';
	                                    $buffy .= '<button class="tdn-submit-btn" type="submit" name="subscribe" ' . $data_ga_event_cat . $data_ga_event_action . $data_ga_event_label . $data_fb_event_name . $data_fb_event_content_name . '>' . $btn_text . '</button>';
                                    $buffy .= "</div>";
                                $buffy .= "</div>";

                                if( $disclaimer != '' ) {
                                    $buffy .= '<div class="tdn-disclaimer tdn-disclaimer1">' . $disclaimer . '</div>';
                                }
                            $buffy .= "</form>";
                        }

                        if( $disclaimer2 != '' ) {
                            $buffy .= '<div class="tdn-disclaimer tdn-disclaimer2">' . $disclaimer2 . '</div>';
                        }

                    $buffy .= '</div>';

                $buffy .= '</div>';
            }

        } else {
            $buffy .= td_util::get_block_error('Newsletter', '<strong><em>form code</em></strong> is empty. Please configure this block/widget by entering a <em>form code</em>');
        }

        return $buffy;
    }

    function get_newsletter_action_att( $newsletter_form_data, $newsletter_provider ) {

        switch ($newsletter_provider) {
            case 'mailchimp':

                $newsletter_data = array();

                preg_match( '/action="([^"]*?)"/i', $newsletter_form_data, $matched );

                if ( ! empty( $matched[1] ) && strpos( $newsletter_form_data, 'list-manage.com/subscribe') !== false ) {

                    $newsletter_data['url'] = $matched[1];

                    //get gdpr checkbox from mailchimp code
                    preg_match_all( '/id="gdpr_([^"]*)[^>]*>[^<]*<span[^>]*>([^<]*)/', $newsletter_form_data, $matched );
                    //run only if gdpr fields are enabled
                    if (! empty( $matched[1])) {

                        //arrays for ids and field name
                        $ids = $matched[1];
                        $id_names = $matched[2];

                        //count gdpr fields
                        foreach($matched[1] as $index=>$match) {
                            $newsletter_data['item_array'][$ids[$index]] = $id_names[$index];
                        }

                        return $newsletter_data;

                    }

                    return $newsletter_data;
                }

                return false;

                break;

            /*
            case 'aweber':
                return $newsletter_provider;
                break;
            */

            case 'mailerlite':

                $newsletter_data = array();

                preg_match( '/action="([^"]*?)"/i', $newsletter_form_data, $matched );

                if ( ! empty( $matched[1] ) && (strpos( $matched[1], 'static.mailerlite.com/webforms') !== false || strpos( $matched[1], 'app.mailerlite.com/webforms') !== false) ) {

                    $newsletter_data['url'] = $matched[1];

                        preg_match( '/data-code="([^"]*?)"/i', $newsletter_form_data, $matched );

                        if ( ! empty( $matched[1] ) ) {

                            $newsletter_data['code'] = $matched[1];

                            return $newsletter_data;
                        }

                    return false;
                }
                return false;

                break;

            case 'feedburner':

                $newsletter_data = array();

                if( ctype_alnum ($newsletter_form_data) ) {
                    // valid username, alphanumeric
                    $newsletter_data['id'] = $newsletter_form_data;

                    return $newsletter_data;
                }

                return false;

                break;
        }



        return '';
    }

    function get_style_att( $att_name ) {
        return $this->get_att( $att_name ,__CLASS__, $this->index_style );
    }

    function get_atts() {
        return $this->atts;
    }
}