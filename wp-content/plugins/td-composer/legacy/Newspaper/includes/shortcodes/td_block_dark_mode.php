<?php

class td_block_dark_mode extends td_block {

    public function get_custom_css() {
        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $in_composer = td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax();
        $in_element = td_global::get_in_element();
        $unique_block_class_prefix = '';
        if( $in_element || $in_composer ) {
            $unique_block_class_prefix = 'tdc-row .';

            if( $in_element && $in_composer ) {
                $unique_block_class_prefix = 'tdc-row-composer .';
            }
        }
        $unique_block_class = $unique_block_class_prefix . $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>

                /* @style_general */
				.td_block_dark_mode .td_block_inner {
				    display: flex;
				    align-items: center;
				}
				.td_block_dark_mode .td-dm-add-txt {
				    font-size: 11px;
				}
				.td_block_dark_mode .td-dm-switch {
				    position: relative;
                    width: 3.286em;
                    height: 1.857em;
                    transition: .4s;
                    font-size: 14px;
                    cursor: pointer;
				}
				.td_block_dark_mode input {
				    display: none;
				}
				.td_block_dark_mode .td-dm-switch-bg {
				    position: absolute;
				    top: 0;
				    left: 0;
				    width: 100%;
				    height: 100%;
                    background-color: #ddd;
                    border: 0 solid #000;
                    border-radius: 100px;
				}
				.td_block_dark_mode .td-dm-switch-ico {
				    position: absolute;
				    left: 0.214em;
                    bottom: 0.214em;
                    height: 1.429em;
                    width: 1.429em;
                    background-color: white;
                    transition: all .4s;
                    border: 0 solid #000;
                    border-radius: 100%;
				}
				.td_block_dark_mode [class*='td-dm-ico'] {
				    position: absolute;
				    top: 50%;
				    left: 50%;
                    transition: all .3s;
				    transform: translate(-50%, -50%);
				}
				.td_block_dark_mode [class*='td-dm-ico'] i {
				    font-size: 1em;
                    transition: all .3s
				}
				.td_block_dark_mode [class*='td-dm-ico'] svg {
				    display: block;
				    width: 1em;
				}
				.td_block_dark_mode [class*='td-dm-ico'] svg,
				.td_block_dark_mode [class*='td-dm-ico'] svg * {
				    fill: #000;
                    transition: all .3s
				}
				.td_block_dark_mode .td-dm-ico-light {
				    opacity: 0;
				}
				.td_block_dark_mode input:checked + .td-dm-switch-bg + .td-dm-switch-ico {
				    transform: translateX(1.429em);
				}
				.td_block_dark_mode input:checked + .td-dm-switch-bg + .td-dm-switch-ico .td-dm-ico-dark {
				    opacity: 0;
				}
				.td_block_dark_mode input:checked + .td-dm-switch-bg + .td-dm-switch-ico .td-dm-ico-light {
				    opacity: 1;
				}	
				
				
				
				/* @inline */
				body .$unique_block_class {
				    display: inline-block;
				}
				/* @align_right */
				body .$unique_block_class {
				    float: right;
				}
				/* @horiz_align_left */
				body .$unique_block_class .td_block_inner {
				    justify-content: flex-start;
				}
				/* @horiz_align_center */
				body .$unique_block_class .td_block_inner {
				    justify-content: center;
				}
				/* @horiz_align_right */
				body .$unique_block_class .td_block_inner {
				    justify-content: flex-end;
				}
				
				/* @add_txt_space_right */
				body .$unique_block_class .td-dm-add-txt {
				    margin: 0 @add_txt_space_right 0 0;
				}
				/* @add_txt_space_left */
				body .$unique_block_class .td-dm-add-txt {
				    margin: 0 0 0 @add_txt_space_left;
				}
				
				/* @sw_border */
				body .$unique_block_class .td-dm-switch-bg {
				    border-width: @sw_border;
				}
				/* @sw_border_style */
				body .$unique_block_class .td-dm-switch-bg {
				    border-style: @sw_border_style;
				}
				/* @sw_border_radius */
				body .$unique_block_class .td-dm-switch-bg {
				    border-radius: @sw_border_radius;
				}
				
				/* @ico_size */
				body .$unique_block_class .td-dm-switch {
				    font-size: @ico_size;
				}
				/* @ico_border */
				body .$unique_block_class .td-dm-switch-ico {
				    border-width: @ico_border;
				}
				/* @ico_border_style */
				body .$unique_block_class .td-dm-switch-ico {
				    border-style: @ico_border_style;
				}
				/* @ico_border_radius */
				body .$unique_block_class .td-dm-switch-ico {
				    border-radius: @ico_border_radius;
				}
				
				
				/* @add_txt_color */
				body .$unique_block_class .td-dm-add-txt {
				    color: @add_txt_color;
				}
				
				/* @switch_bg */
				body .$unique_block_class .td-dm-switch-bg {
				    background-color: @switch_bg;
				}
				/* @switch_bg_a */
				body .$unique_block_class input:checked + .td-dm-switch-bg {
				    background-color: @switch_bg_a;
				}
				/* @switch_border_col */
				body .$unique_block_class .td-dm-switch-bg {
				    border-color: @switch_border_col;
				}
				/* @switch_border_col_a */
				body .$unique_block_class input:checked + .td-dm-switch-bg {
				    border-color: @switch_border_col_a;
				}
				/* @ico_color */
				body .$unique_block_class .td-dm-ico-dark i {
				    color: @ico_color;
				}
				body .$unique_block_class .td-dm-ico-dark svg,
				body .$unique_block_class .td-dm-ico-dark svg * {
				    fill: @ico_color;
				}
				/* @ico_color_a */
				body .$unique_block_class .td-dm-ico-light i {
				    color: @ico_color_a;
				}
				body .$unique_block_class .td-dm-ico-light svg,
				body .$unique_block_class .td-dm-ico-light svg * {
				    fill: @ico_color_a;
				}
				/* @ico_bg */
				body .$unique_block_class .td-dm-switch-ico {
				    background-color: @ico_bg;
				}
				/* @ico_bg_a */
				body .$unique_block_class input:checked + .td-dm-switch-bg + .td-dm-switch-ico {
				    background-color: @ico_bg_a;
				}
				/* @ico_border_col */
				body .$unique_block_class .td-dm-switch-ico {
				    border-color: @ico_border_col;
				}
				/* @ico_border_col_a */
				body .$unique_block_class input:checked + .td-dm-switch-bg + .td-dm-switch-ico {
				    border-color: @ico_border_col_a;
				}
				/* @ico_shadow */
				body .$unique_block_class .td-dm-switch-ico {
				    box-shadow: @ico_shadow;
				}
				
				
				/* @f_attr */
				body .$unique_block_class .td-dm-add-txt {
				    @f_attr
				}
				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        /*-- GENERAL -- */
        $res_ctx->load_settings_raw('style_general', 1);



        /*-- LAYOUT -- */
        // make inline
        $res_ctx->load_settings_raw('inline', $res_ctx->get_shortcode_att('inline'));
        // align to right
        $res_ctx->load_settings_raw('align_right', $res_ctx->get_shortcode_att('align_right'));
        // horizontal align
        $horiz_align = $res_ctx->get_shortcode_att('horiz_align');
        if( $horiz_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw('horiz_align_left', 1);
        } else if( $horiz_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw('horiz_align_center', 1);
        } else if( $horiz_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw('horiz_align_right', 1);
        }

        // additional text space
        $add_txt_pos = $res_ctx->get_shortcode_att('add_txt_pos');
        $add_txt_space = $res_ctx->get_shortcode_att('add_txt_space');
        if( $add_txt_pos == '' || $add_txt_pos == 'before' ) {
            $res_ctx->load_settings_raw('add_txt_space_right', $add_txt_space);
            if ( $add_txt_space == '' ) {
                $res_ctx->load_settings_raw('add_txt_space_right', '5px');
            } else {
                if( is_numeric($add_txt_space) ) {
                    $res_ctx->load_settings_raw('add_txt_space_right', $add_txt_space . 'px');
                }
            }
        } else {
            $res_ctx->load_settings_raw('add_txt_space_left', $add_txt_space);
            if ( $add_txt_space == '' ) {
                $res_ctx->load_settings_raw('add_txt_space_left', '5px');
            } else {
                if( is_numeric($add_txt_space) ) {
                    $res_ctx->load_settings_raw('add_txt_space_left', $add_txt_space . 'px');
                }
            }
        }

        // switch border size
        $sw_border = $res_ctx->get_shortcode_att('sw_border');
        $res_ctx->load_settings_raw('sw_border', $sw_border);
        if( $sw_border != '' && is_numeric($sw_border) ) {
            $res_ctx->load_settings_raw('sw_border', $sw_border . 'px');
        }
        // switch border style
        $res_ctx->load_settings_raw('sw_border_style', $res_ctx->get_shortcode_att('sw_border_style'));
        // switch border radius
        $sw_border_radius = $res_ctx->get_shortcode_att('sw_border_radius');
        $res_ctx->load_settings_raw('sw_border_radius', $sw_border_radius);
        if( $sw_border_radius != '' && is_numeric($sw_border_radius) ) {
            $res_ctx->load_settings_raw('sw_border_radius', $sw_border_radius . 'px');
        }

        // icons size
        $ico_size = $res_ctx->get_shortcode_att('ico_size');
        $res_ctx->load_settings_raw('ico_size', $ico_size);
        if( $ico_size != '' && is_numeric($ico_size) ) {
            $res_ctx->load_settings_raw('ico_size', $ico_size . 'px');
        }
        // icons border size
        $ico_border = $res_ctx->get_shortcode_att('ico_border');
        $res_ctx->load_settings_raw('ico_border', $ico_border);
        if( $ico_border != '' && is_numeric($ico_border) ) {
            $res_ctx->load_settings_raw('ico_border', $ico_border . 'px');
        }
        // icons border style
        $res_ctx->load_settings_raw('ico_border_style', $res_ctx->get_shortcode_att('ico_border_style'));
        // icons border radius
        $ico_border_radius = $res_ctx->get_shortcode_att('ico_border_radius');
        $res_ctx->load_settings_raw('ico_border_radius', $ico_border_radius);
        if( $ico_border_radius != '' && is_numeric($ico_border_radius) ) {
            $res_ctx->load_settings_raw('ico_border_radius', $ico_border_radius . 'px');
        }



        /*-- STYLE -- */
        $res_ctx->load_settings_raw('add_txt_color', $res_ctx->get_shortcode_att('add_txt_color'));

        $res_ctx->load_settings_raw('switch_bg', $res_ctx->get_shortcode_att('switch_bg'));
        $res_ctx->load_settings_raw('switch_bg_a', $res_ctx->get_shortcode_att('switch_bg_a'));
        $res_ctx->load_settings_raw('switch_border_col', $res_ctx->get_shortcode_att('switch_border_col'));
        $res_ctx->load_settings_raw('switch_border_col_a', $res_ctx->get_shortcode_att('switch_border_col_a'));
        $res_ctx->load_settings_raw('switch_bg_a', $res_ctx->get_shortcode_att('switch_bg_a'));
        $res_ctx->load_settings_raw('ico_color', $res_ctx->get_shortcode_att('ico_color'));
        $res_ctx->load_settings_raw('ico_color_a', $res_ctx->get_shortcode_att('ico_color_a'));
        $res_ctx->load_settings_raw('ico_bg', $res_ctx->get_shortcode_att('ico_bg'));
        $res_ctx->load_settings_raw('ico_bg_a', $res_ctx->get_shortcode_att('ico_bg_a'));
        $res_ctx->load_settings_raw('ico_border_col', $res_ctx->get_shortcode_att('ico_border_col'));
        $res_ctx->load_settings_raw('ico_border_col_a', $res_ctx->get_shortcode_att('ico_border_col_a'));
        $res_ctx->load_shadow_settings( 3, 0, 1, 0, 'rgba(0, 0, 0, .3)', 'ico_shadow' );



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_attr' );

    }


	/**
	 * Disable loop block features. This block does not use a loop and it dosn't need to run a query.
	 */
	function __construct() {
		parent::disable_loop_block_features();
	}



    function render($atts, $content = null){
        parent::render($atts);

        // additional text
        $add_txt_pos = $this->get_att('add_txt_pos');
        $add_txt = $this->get_att('add_txt');
        $add_txt_html = '';
        if( $add_txt != '' ) {
            $add_txt_html = '<div class="td-dm-add-txt">' . $add_txt . '</div>';
        }

        // switch icons
        $light_icon = $this->get_icon_att('light_tdicon');
        $light_icon_html = '<span class="td-dm-ico-light">';
        if( $light_icon != '' ) {
            if( base64_encode( base64_decode( $light_icon ) ) == $light_icon ) {
                $light_icon_html .= base64_decode( $light_icon );
            } else {
                $light_icon_html .= '<i class="' . $light_icon . '"></i>';
            }
        }
        $light_icon_html .= '</span>';

        $dark_icon = $this->get_icon_att('dark_tdicon');
        $dark_icon_html = '<span class="td-dm-ico-dark">';
        if( $dark_icon != '' ) {
            if( base64_encode( base64_decode( $dark_icon ) ) == $dark_icon ) {
                $dark_icon_html .= base64_decode( $dark_icon );
            } else {
                $dark_icon_html .= '<i class="' . $dark_icon . '"></i>';
            }
        }
        $dark_icon_html .= '</span>';

        // check
        $switch_checked = '';
        if( isset( $_COOKIE['td_dark_mode'] ) ) {
            $switch_checked = 'checked';
        }


        $buffy = '';

	    $buffy .= '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';

		    //get the block js
		    $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();


            $buffy .= '<div id=' . $this->block_uid . ' class="td_block_inner">';

                if( $add_txt_pos == '' || $add_txt_pos == 'before' ) {
                    $buffy .= $add_txt_html;
                }

                $buffy .= '<label class="td-dm-switch" for="td-dm-input-' . $this->block_uid . '">';
                    $buffy .= '<input type="checkbox" id="td-dm-input-' . $this->block_uid . '" class="td-dm-input" ' . $switch_checked . '>';

                    $buffy .= '<div class="td-dm-switch-bg"></div>';

                    $buffy .= '<span class="td-dm-switch-ico">';
                        $buffy .= $dark_icon_html;
                        $buffy .= $light_icon_html;
                    $buffy .= '</span>';
                $buffy .= '</label>';

                if( $add_txt_pos == 'after' ) {
                    $buffy .= $add_txt_html;
                }

            $buffy .= '</div>';

        $buffy .= '</div>';
        return $buffy;
    }

    function inner($posts, $td_column_number = '') {

    }
}