<?php

/**
 * Class tds_leads
 */

class tds_leads extends td_block {

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

                /* @style_general_tds_leads */
                .tds_leads .tds-title {
                    margin-top: 0;
                    margin-bottom: 20px;
                    font-size: 22px;
                    line-height: 1.4; 
                    font-weight: 600; 
                }
                .tds_leads .tds-info:not(:empty) {
                    margin-bottom: 16px; 
                }
                .tds_leads .tds-messages {
                    padding: 8px 12px;
                    font-size: 12px;
                    line-height: 1.4;
                    color: #fff;
                    border-radius: 3px;
                    transition: opacity .2s ease-in-out;
                }
                .tds_leads .tds-messages:not(:last-child) {
                    margin-bottom: .4em;
                }
                .tds_leads .tds-messages-hiding {
                    opacity: 0;
                }
                .tds_leads .tds-messages-error {
                    background-color: #ec4d4d;
                }
                .tds_leads .tds-messages-success {
                    background-color: #6bc16f;
                }
                .tds_leads .tds-message:not(:last-child) {
                    margin-bottom: .4em;
                }
                .tds_leads .tds-email-bar {
                    display: flex;
                }
                .tds_leads .tds-input-wrap {
                    display: flex;
                    align-items: center;
                    flex: 1;
                }
                .tds_leads .tds-input {
                    height: 100%;
                    padding: 12px 15px;
                    line-height: 1;
                    border-width: 1px 0 1px 1px;
                }
                .tds_leads .tds-unsubscribe-txt {
                    width: 100%;
                    font-size: 13px;
                    line-height: 1.4;
                }
                .tds_leads .tds-submit-btn {
                    -webkit-appearance: none;
                    display: flex;
                    align-items: center;
                    width: 100%;
                    padding: 15px;
                    background-color: #4db2ec;
                    font-size: 13px;
                    line-height: 1;
                    color: #fff;
                    border-width: 0;
                    border-style: solid;
                    border-color: #000;
                    -webkit-transition: all 0.3s ease;
                    transition: all 0.3s ease;
                    outline: none;
                }
                .tds_leads .tds-input-wrap + .tds-submit-btn {
                    width: auto;
                }
                .tds_leads .tds-submit-btn:hover {
                    background-color: #222;
                }
                .tds_leads .tds-submit-btn-icon {
                    position: relative;
                }
                .tds_leads i.tds-submit-btn-icon {
                    font-size: 15px;
                    color: #fff;
                }
                .tds_leads .tds-submit-btn-icon-svg {
                    width: 15px;
                    height: auto;
                }
                .tds_leads .tds-submit-btn-icon-svg svg {
                    display: block;
                    fill: #fff;
                    -webkit-transition: all 0.3s ease;
                    transition: all 0.3s ease;
                }
                .tds_leads .tds-checkbox {
                    margin-top: 16px;
                    line-height: 1;
                }
                .tds_leads .tds-checkbox input {
                    display: none;
                }
                .tds_leads .tds-checkbox label {
                    display: flex;
                    align-items: center;
                    margin-bottom: 0;
                    cursor: pointer;
                }
                .tds_leads .tds-check {
                    position: relative;
                    width: 1em;
                    height: 1em;
                    margin-right: 8px;
                    background-color: #fff;
                    cursor: pointer;
                    border: 1px solid #ccc;
                    transition: all .3s ease-in-out;
                    flex-shrink: 0;
                }
                .tds_leads .tds-check:after {
                    content: '';
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    width: 0.5em;
                    height: 0.5em;
                    background-color: #4db2ec;
                    opacity: 0;
                    transition: all .3s ease;
                    pointer-events: none;
                }
                .tds_leads .tds-checkbox input:checked + label .tds-check:after {
                    opacity: 1;
                }
                .tds_leads .tds-check-title {
                    margin-top: -1px;
                    user-select: none;
                    -webkit-user-select: none;
                    font-size: 11px;
                    color: #444;
                }
                .tds_leads .tds-check-title a:hover {
                    color: #222;
                }
                
                
                
                /* @title_space */
                body .$unique_block_class .tds-title {
                    margin-bottom: @title_space;
                }
                
                
                
                /* @msg_space */
                body .$unique_block_class .tds-info:not(:empty) {
                    margin: @msg_space;
                }
                /* @msg_padd */
                body .$unique_block_class .tds-messages {
                    padding: @msg_padd;
                }
                
                /* @all_msg_succ_border */
                body .$unique_block_class .tds-messages-success {
                    border: @all_msg_succ_border @all_msg_succ_border_style @all_msg_succ_border_color;
                }
                /* @msg_succ_radius */
                body .$unique_block_class .tds-messages-success {
                    border-radius: @msg_succ_radius;
                }
                
                /* @all_msg_err_border */
                body .$unique_block_class .tds-messages-error {
                    border: @all_msg_err_border @all_msg_err_border_style @all_msg_err_border_color;
                }
                /* @msg_err_radius */
                body .$unique_block_class .tds-messages-error {
                    border-radius: @msg_err_radius;
                }
                
                
                
                /* @display */
                body .$unique_block_class .tds-email-bar {
                    flex-direction: @display;
                }
                /* @gap1 */
                body .$unique_block_class .tds-input-wrap {
                    margin: 0 @gap1 0 0;
                }
                body .$unique_block_class .tds-input-wrap  + .tds-submit-btn {
                    margin: 0 0 0 @gap1;
                }
                /* @gap2 */
                body .$unique_block_class .tds-input-wrap  {
                    margin: 0 0 @gap2;
                }
                body .$unique_block_class .tds-input-wrap + .tds-submit-btn {
                    margin: @gap2 0 0;
                }
                
                

                /* @input_padd */
                body .$unique_block_class .tds-input {
                    padding: @input_padd;
                }
                /* @input_border */
                body .$unique_block_class .tds-input {
                    border-width: @input_border;
                }
                /* @input_border_style */
                body .$unique_block_class .tds-input {
                    border-style: @input_border_style;
                }
                /* @input_radius */
                body .$unique_block_class .tds-input {
                    border-radius: @input_radius;
                }
                
                

                /* @unsub_horiz_align */
                body .$unique_block_class .tds-unsubscribe-txt {
                    text-align: @unsub_horiz_align;
                }
                
                

                /* @btn_icon_size */
                body .$unique_block_class i.tds-submit-btn-icon {
                    font-size: @btn_icon_size;
                }
                body .$unique_block_class .tds-submit-btn-icon-svg {
                    width: @btn_icon_size;
                }
                /* @btn_icon_space_left */
                body .$unique_block_class .tds-submit-btn-icon {
                    margin-left: @btn_icon_space_left;
                }
                /* @btn_icon_space_right */
                body .$unique_block_class .tds-submit-btn-icon {
                    margin-right: @btn_icon_space_right;
                }
                /* @btn_icon_align */
                body .$unique_block_class .tds-submit-btn-icon {
                    top: @btn_icon_align;
                }
                
                /* @btn_padd */
                body .$unique_block_class .tds-submit-btn {
                    padding: @btn_padd;
                }
                /* @all_btn_border */
                body .$unique_block_class .tds-submit-btn {
                    border: @all_btn_border @all_btn_border_style @all_btn_border_color;
                }
                /* @btn_radius */
                body .$unique_block_class .tds-submit-btn {
                    border-radius: @btn_radius;
                }
                /* @btn_horiz_align */
                body .$unique_block_class .tds-submit-btn {
                    justify-content: @btn_horiz_align;
                }
                
                

                /* @pp_space */
                body .$unique_block_class .tds-checkbox {
                    margin-top: @pp_space;
                }             
                
                /* @pp_check_size */
                body .$unique_block_class .tds-checkbox label {
                    font-size: @pp_check_size;
                }
                /* @pp_check_space */
                body .$unique_block_class .tds-check {
                    margin-right: @pp_check_space;
                }
                /* @pp_check_radius */
                body .$unique_block_class .tds-check,
                body .$unique_block_class .tds-check:after {
                    border-radius: @pp_check_radius;
                }
                
                

                /* @title_color */
                body .$unique_block_class .tds-title {
                    color: @title_color;
                }  
                
                

                /* @msg_succ_color */
                body .$unique_block_class .tds-messages-success {
                    color: @msg_succ_color;
                }  
                /* @msg_succ_bg */
                body .$unique_block_class .tds-messages-success {
                    background-color: @msg_succ_bg;
                }  
                
                /* @msg_error_color */
                body .$unique_block_class .tds-messages-error {
                    color: @msg_error_color;
                } 
                /* @msg_err_bg */
                body .$unique_block_class .tds-messages-error {
                    background-color: @msg_err_bg;
                }  
                
                

                /* @input_color */
                body .$unique_block_class .tds-input {
                    color: @input_color;
                }  
                /* @input_place_color */
                body .$unique_block_class .tds-input::-webkit-input-placeholder {
                    color: @input_place_color;
                }
                body .$unique_block_class .tds-input::-moz-placeholder {
                    color: @input_place_color;
                }
                body .$unique_block_class .tds-input:-ms-input-placeholder {
                    color: @input_place_color;
                }
                body .$unique_block_class .tds-input:-moz-placeholder {
                    color: @input_place_color;
                }
                body .$unique_block_class .tds-input::placeholder {
                    color: @input_place_color;
                }
                /* @input_bg */
                body .$unique_block_class .tds-input {
                    background-color: @input_bg;
                }
                /* @input_bg_f */
                body .$unique_block_class .tds-input:focus {
                    background-color: @input_bg_f;
                }
                /* @input_border_color */
                body .$unique_block_class .tds-input {
                    border-color: @input_border_color;
                }
                /* @input_border_color_f */
                body .$unique_block_class .tds-input:focus {
                    border-color: @input_border_color_f;
                }
                
                

                /* @unsub_color */
                body .$unique_block_class .tds-unsubscribe-txt {
                    color: @unsub_color;
                }  
                
                

                /* @btn_color */
                body .$unique_block_class .tds-submit-btn {
                    color: @btn_color;
                }  
                body .$unique_block_class .tds-submit-btn-icon-svg svg {
                    fill: @btn_color;
                }
                /* @btn_color_h */
                body .$unique_block_class .tds-submit-btn:hover {
                    color: @btn_color_h;
                }  
                body .$unique_block_class .tds-submit-btn:hover .tds-submit-btn-icon-svg svg {
                    fill: @btn_color_h;
                }
                
                /* @btn_icon_color */
                body .$unique_block_class i.tds-submit-btn-icon {
                    color: @btn_icon_color;
                }  
                body .$unique_block_class .tds-submit-btn-icon-svg svg {
                    fill: @btn_icon_color;
                }
                /* @btn_icon_color_h */
                body .$unique_block_class .tds-submit-btn:hover i.tds-submit-btn-icon {
                    color: @btn_icon_color_h;
                }  
                body .$unique_block_class .tds-submit-btn:hover .tds-submit-btn-icon-svg svg {
                    fill: @btn_icon_color_h;
                }
                
                /* @btn_bg */
                body .$unique_block_class .tds-submit-btn {
                    background-color: @btn_bg;
                }  
                /* @btn_bg_h */
                body .$unique_block_class .tds-submit-btn:hover {
                    background-color: @btn_bg_h;
                }  
                
                /* @btn_border_color_h */
                body .$unique_block_class .tds-submit-btn:hover {
                    border-color: @btn_border_color_h;
                }  
                
                

                /* @pp_check_square */
                body .$unique_block_class .tds-check:after {
                    background-color: @pp_check_square;
                }  
                /* @pp_check_bg */
                body .$unique_block_class .tds-check {
                    background-color: @pp_check_bg;
                }  
                /* @pp_check_bg_c */
                body .$unique_block_class .tds-checkbox input:checked + label .tds-check {
                    background-color: @pp_check_bg_c;
                }  
                /* @pp_check_border_color */
                body .$unique_block_class .tds-check {
                    border-color: @pp_check_border_color;
                }  
                /* @pp_check_border_color_c */
                body .$unique_block_class .tds-checkbox input:checked + label .tds-check {
                    border-color: @pp_check_border_color_c;
                }  

                /* @pp_check_color */
                body .$unique_block_class .tds-check-title {
                    color: @pp_check_color;
                }  
                /* @pp_check_color_a */
                body .$unique_block_class .tds-check-title a {
                    color: @pp_check_color_a;
                }  
                /* @pp_check_color_a_h */
                body .$unique_block_class .tds-check-title a:hover {
                    color: @pp_check_color_a_h;
                }  
                
                

                /* @f_title */
                body .$unique_block_class .tds-title {
                    @f_title
                }  
                /* @f_msg */
                body .$unique_block_class .tds-message {
                    @f_msg
                }        
                /* @f_input */
                body .$unique_block_class .tds-input {
                    @f_input
                }       
                /* @f_unsub */
                body .$unique_block_class .tds-unsubscribe-txt {
                    @f_unsub
                }   
                /* @f_btn */
                body .$unique_block_class .tds-submit-btn {
                    @f_btn
                }      
                /* @f_pp */
                body .$unique_block_class .tds-check-title {
                    @f_pp
                }              

            </style>";

		$td_css_res_compiler = new td_css_res_compiler( $raw_css );
		$td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

		$compiled_css .= $td_css_res_compiler->compile_css();

		return $compiled_css;

	}

	static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'style_general_tds_leads', 1 );



        /*-- TITLE -- */
        // title space
        $title_space = $res_ctx->get_shortcode_att('title_space');
        $res_ctx->load_settings_raw('title_space', $title_space);
        if( $title_space != '' && is_numeric( $title_space ) ) {
            $res_ctx->load_settings_raw('title_space', $title_space . 'px');
        }



        /*-- MESSAGE -- */
        // message space
        $msg_space = $res_ctx->get_shortcode_att('msg_space');
        $res_ctx->load_settings_raw('msg_space', $msg_space);
        if( $msg_space != '' && is_numeric( $msg_space ) ) {
            $res_ctx->load_settings_raw('msg_space', $msg_space . 'px');
        }

        // message padding
        $msg_padd = $res_ctx->get_shortcode_att('msg_padd');
        $res_ctx->load_settings_raw('msg_padd', $msg_padd);
        if( $msg_padd != '' && is_numeric( $msg_padd ) ) {
            $res_ctx->load_settings_raw('msg_padd', $msg_padd . 'px');
        }

        // success messages border size
        $all_msg_succ_border = $res_ctx->get_shortcode_att('all_msg_succ_border');
        $res_ctx->load_settings_raw('all_msg_succ_border', $all_msg_succ_border);
        if( $all_msg_succ_border != '' && is_numeric( $all_msg_succ_border ) ) {
            $res_ctx->load_settings_raw('all_msg_succ_border', $all_msg_succ_border . 'px');
        }
        // success messages border style
        $res_ctx->load_settings_raw('all_msg_succ_border_style', $res_ctx->get_shortcode_att('all_msg_succ_border_style'));
        // success messages border radius
        $msg_succ_radius = $res_ctx->get_shortcode_att('msg_succ_radius');
        $res_ctx->load_settings_raw('msg_succ_radius', $msg_succ_radius);
        if( $msg_succ_radius != '' && is_numeric( $msg_succ_radius ) ) {
            $res_ctx->load_settings_raw('msg_succ_radius', $msg_succ_radius . 'px');
        }

        // error messages border size
        $all_msg_err_border = $res_ctx->get_shortcode_att('all_msg_err_border');
        $res_ctx->load_settings_raw('all_msg_err_border', $all_msg_err_border);
        if( $all_msg_err_border != '' && is_numeric( $all_msg_err_border ) ) {
            $res_ctx->load_settings_raw('all_msg_err_border', $all_msg_err_border . 'px');
        }
        // error messages border style
        $res_ctx->load_settings_raw('all_msg_err_border_style', $res_ctx->get_shortcode_att('all_msg_err_border_style'));
        // error messages border radius
        $msg_err_radius = $res_ctx->get_shortcode_att('msg_err_radius');
        $res_ctx->load_settings_raw('msg_err_radius', $msg_err_radius);
        if( $msg_err_radius != '' && is_numeric( $msg_err_radius ) ) {
            $res_ctx->load_settings_raw('msg_err_radius', $msg_err_radius . 'px');
        }



        /*-- INPUT & BUTTON -- */
        // display
        $display = $res_ctx->get_shortcode_att('display');
        $res_ctx->load_settings_raw('display', $display);

        // gap
        $gap = $res_ctx->get_shortcode_att('gap');
        if( $gap != '' && is_numeric( $gap ) ) {
            if( $display == 'row' || $display == '' ) {
                $res_ctx->load_settings_raw('gap1', ( $gap / 2 ) . 'px');
            } else {
                $res_ctx->load_settings_raw('gap2', ( $gap / 2 ) . 'px');
            }
        }



        /*-- INPUT -- */
        // input padding
        $input_padd = $res_ctx->get_shortcode_att('input_padd');
        $res_ctx->load_settings_raw('input_padd', $input_padd);
        if( $input_padd != '' && is_numeric( $input_padd ) ) {
            $res_ctx->load_settings_raw('input_padd', $input_padd . 'px');
        }

        // input border size
        $input_border = $res_ctx->get_shortcode_att('input_border');
        $res_ctx->load_settings_raw('input_border', $input_border);
        if( $input_border != '' && is_numeric( $input_border ) ) {
            $res_ctx->load_settings_raw('input_border', $input_border . 'px');
        }

        // input border style
        $res_ctx->load_settings_raw('input_border_style', $res_ctx->get_shortcode_att('input_border_style'));

        // input border radius
        $input_radius = $res_ctx->get_shortcode_att('input_radius');
        $res_ctx->load_settings_raw('input_radius', $input_radius);
        if( $input_radius != '' && is_numeric( $input_radius ) ) {
            $res_ctx->load_settings_raw('input_radius', $input_radius . 'px');
        }



        /*-- UNSUBSCRIBE MESSAGE -- */
        // unsubscribe message horizontal align
        $unsub_horiz_align = $res_ctx->get_shortcode_att('unsub_horiz_align');
        if( $unsub_horiz_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw('unsub_horiz_align', 'left');
        } else if( $unsub_horiz_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw('unsub_horiz_align', 'center');
        } else if( $unsub_horiz_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw('unsub_horiz_align', 'right');
        }



        /*-- BUTTON -- */
        $btn_icon_pos = $res_ctx->get_shortcode_att('btn_icon_pos');

        // button icon size
        $btn_icon_size = $res_ctx->get_shortcode_att('btn_icon_size');
        $res_ctx->load_settings_raw('btn_icon_size', $btn_icon_size);
        if( $btn_icon_size != '' && is_numeric( $btn_icon_size ) ) {
            $res_ctx->load_settings_raw('btn_icon_size', $btn_icon_size . 'px');
        }

        // button icon space
        $btn_icon_space = $res_ctx->get_shortcode_att('btn_icon_space');
        if( $btn_icon_pos == '' || $btn_icon_pos == 'after' ) {
            if( $btn_icon_space != '' ) {
                if( is_numeric( $btn_icon_space ) ) {
                    $res_ctx->load_settings_raw('btn_icon_space_left', $btn_icon_space . 'px');
                } else {
                    $res_ctx->load_settings_raw('btn_icon_space_left', $btn_icon_space);
                }
            } else {
                $res_ctx->load_settings_raw('btn_icon_space_left', '8px');
            }
        } else {
            if( $btn_icon_space != '' ) {
                if( is_numeric( $btn_icon_space ) ) {
                    $res_ctx->load_settings_raw('btn_icon_space_right', $btn_icon_space . 'px');
                } else {
                    $res_ctx->load_settings_raw('btn_icon_space_right', $btn_icon_space);
                }
            } else {
                $res_ctx->load_settings_raw('btn_icon_space_right', '8px');
            }
        }

        // button icon align
        $res_ctx->load_settings_raw('btn_icon_align', $res_ctx->get_shortcode_att('btn_icon_align') . 'px');

        // button padding
        $btn_padd = $res_ctx->get_shortcode_att('btn_padd');
        $res_ctx->load_settings_raw('btn_padd', $btn_padd);
        if( $btn_padd != '' && is_numeric( $btn_padd ) ) {
            $res_ctx->load_settings_raw('btn_padd', $btn_padd . 'px');
        }

        // button border size
        $all_btn_border = $res_ctx->get_shortcode_att('all_btn_border');
        $res_ctx->load_settings_raw('all_btn_border', $all_btn_border);
        if( $all_btn_border != '' && is_numeric( $all_btn_border ) ) {
            $res_ctx->load_settings_raw('all_btn_border', $all_btn_border . 'px');
        }

        // button border style
        $res_ctx->load_settings_raw('all_btn_border_style', $res_ctx->get_shortcode_att('all_btn_border_style'));

        // button border radius
        $btn_radius = $res_ctx->get_shortcode_att('btn_radius');
        $res_ctx->load_settings_raw('btn_radius', $btn_radius);
        if( $btn_radius != '' && is_numeric( $btn_radius ) ) {
            $res_ctx->load_settings_raw('btn_radius', $btn_radius . 'px');
        }

        // button horizontal align
        $btn_horiz_align = $res_ctx->get_shortcode_att('btn_horiz_align');
        if( $btn_horiz_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw('btn_horiz_align', 'flex-start');
        } else if( $btn_horiz_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw('btn_horiz_align', 'center');
        } else if( $btn_horiz_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw('btn_horiz_align', 'flex-end');
        }



        /*-- PRIVACY POLICY -- */
        // pp top space
        $pp_space = $res_ctx->get_shortcode_att('pp_space');
        $res_ctx->load_settings_raw('pp_space', $pp_space);
        if( $pp_space != '' && is_numeric( $pp_space ) ) {
            $res_ctx->load_settings_raw('pp_space', $pp_space . 'px');
        }

        // checkbox size
        $res_ctx->load_settings_raw('pp_check_size', $res_ctx->get_shortcode_att('pp_check_size') . 'px');
        // checkbox space
        $pp_check_space = $res_ctx->get_shortcode_att('pp_check_space');
        $res_ctx->load_settings_raw('pp_check_space', $pp_check_space);
        if( $pp_check_space != '' && is_numeric( $pp_check_space ) ) {
            $res_ctx->load_settings_raw('pp_check_space', $pp_check_space . 'px');
        }
        // checkbox border radius
        $pp_check_radius = $res_ctx->get_shortcode_att('pp_check_radius');
        $res_ctx->load_settings_raw('pp_check_radius', $pp_check_radius);
        if( $pp_check_radius != '' && is_numeric( $pp_check_radius ) ) {
            $res_ctx->load_settings_raw('pp_check_radius', $pp_check_radius . 'px');
        }



        /*-- COLORS -- */
        $res_ctx->load_settings_raw('title_color', $res_ctx->get_shortcode_att('title_color'));

        $res_ctx->load_settings_raw('msg_succ_color', $res_ctx->get_shortcode_att('msg_succ_color'));
        $res_ctx->load_settings_raw('msg_succ_bg', $res_ctx->get_shortcode_att('msg_succ_bg'));
        $all_msg_succ_border_color = $res_ctx->get_shortcode_att('all_msg_succ_border_color');
        if( $all_msg_succ_border_color != '' ) {
            $res_ctx->load_settings_raw('all_msg_succ_border_color', $all_msg_succ_border_color);
        } else {
            $res_ctx->load_settings_raw('all_msg_succ_border_color', '#000');
        }

        $res_ctx->load_settings_raw('msg_error_color', $res_ctx->get_shortcode_att('msg_error_color'));
        $res_ctx->load_settings_raw('msg_err_bg', $res_ctx->get_shortcode_att('msg_err_bg'));
        $all_msg_err_border_color = $res_ctx->get_shortcode_att('all_msg_err_border_color');
        if( $all_msg_err_border_color != '' ) {
            $res_ctx->load_settings_raw('all_msg_err_border_color', $all_msg_err_border_color);
        } else {
            $res_ctx->load_settings_raw('all_msg_err_border_color', '#000');
        }

        $res_ctx->load_settings_raw('input_color', $res_ctx->get_shortcode_att('input_color'));
        $res_ctx->load_settings_raw('input_place_color', $res_ctx->get_shortcode_att('input_place_color'));
        $res_ctx->load_settings_raw('input_bg', $res_ctx->get_shortcode_att('input_bg'));
        $res_ctx->load_settings_raw('input_bg_f', $res_ctx->get_shortcode_att('input_bg_f'));
        $res_ctx->load_settings_raw('input_border_color', $res_ctx->get_shortcode_att('input_border_color'));
        $res_ctx->load_settings_raw('input_border_color_f', $res_ctx->get_shortcode_att('input_border_color_f'));

        $res_ctx->load_settings_raw('unsub_color', $res_ctx->get_shortcode_att('unsub_color'));

        $res_ctx->load_settings_raw('btn_color', $res_ctx->get_shortcode_att('btn_color'));
        $res_ctx->load_settings_raw('btn_color_h', $res_ctx->get_shortcode_att('btn_color_h'));
        $res_ctx->load_settings_raw('btn_icon_color', $res_ctx->get_shortcode_att('btn_icon_color'));
        $res_ctx->load_settings_raw('btn_icon_color_h', $res_ctx->get_shortcode_att('btn_icon_color_h'));
        $res_ctx->load_settings_raw('btn_bg', $res_ctx->get_shortcode_att('btn_bg'));
        $res_ctx->load_settings_raw('btn_bg_h', $res_ctx->get_shortcode_att('btn_bg_h'));
        $all_btn_border_color = $res_ctx->get_shortcode_att('all_btn_border_color');
        if( $all_btn_border_color != '' ) {
            $res_ctx->load_settings_raw('all_btn_border_color', $all_btn_border_color);
        } else {
            $res_ctx->load_settings_raw('all_btn_border_color', '#000');
        }
        $res_ctx->load_settings_raw('btn_border_color_h', $res_ctx->get_shortcode_att('btn_border_color_h'));

        $res_ctx->load_settings_raw('pp_check_square', $res_ctx->get_shortcode_att('pp_check_square'));
        $res_ctx->load_settings_raw('pp_check_bg', $res_ctx->get_shortcode_att('pp_check_bg'));
        $res_ctx->load_settings_raw('pp_check_bg_c', $res_ctx->get_shortcode_att('pp_check_bg_c'));
        $res_ctx->load_settings_raw('pp_check_border_color', $res_ctx->get_shortcode_att('pp_check_border_color'));
        $res_ctx->load_settings_raw('pp_check_border_color_c', $res_ctx->get_shortcode_att('pp_check_border_color_c'));
        $res_ctx->load_settings_raw('pp_check_color', $res_ctx->get_shortcode_att('pp_check_color'));
        $res_ctx->load_settings_raw('pp_check_color_a', $res_ctx->get_shortcode_att('pp_check_color_a'));
        $res_ctx->load_settings_raw('pp_check_color_a_h', $res_ctx->get_shortcode_att('pp_check_color_a_h'));



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_title' );
        $res_ctx->load_font_settings( 'f_msg' );
        $res_ctx->load_font_settings( 'f_input' );
        $res_ctx->load_font_settings( 'f_unsub' );
        $res_ctx->load_font_settings( 'f_btn' );
        $res_ctx->load_font_settings( 'f_pp' );

	}

	function __construct() {
		parent::disable_loop_block_features();
	}

	function render( $atts, $content = null ) {

		parent::render( $atts );


        /* -- flag to determine whether we are in composer or not -- */
        $in_composer = tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe();


        /* -- mailing list -- */
        $tds_list = $this->get_att('list');

        /* -- double opt-in -- */
        $double_opt_in = $this->get_att('double_opt_in');

        /* -- message -- */
        // show in composer
        $message_composer = $this->get_att('msg_composer');

        /* -- unsubscribe message -- */
        $unsub_msg = rawurldecode( base64_decode( strip_tags( $this->get_att('unsub_msg') ) ) );

        // position
        $message_pos = $this->get_att('msg_pos');

        // text
        $message = '';


        /* -- leads cookie -- */
        // flag to determine if user already subscribed to the
        // mailing list that has been set in this shortcode
        $tds_leads_cookie_subscribed = false;
        $hide_btn_un = $this->get_att('hide_btn_un');
        $show_btn = true;

        $tds_validate_email = '';
        if ( isset( $_COOKIE['tds_leads_email'] ) && !empty( $_COOKIE['tds_leads_email'] ) ) {
            $tds_email_cookie = str_replace(',', '', $_COOKIE['tds_leads_email'] );
            $tds_email_post = tds_util::get_post_by_title( $tds_email_cookie, 'tds_email' );
            if ( $tds_email_post instanceof WP_Post ) {
                $tds_validate_email = get_post_meta( $tds_email_post->ID, 'tds_validate_email', true );
            }
        }

        if ( $double_opt_in =='yes' ) {
            $unsub_msg =  __td( 'Please check your email and confirm subscription!' );
            if ( $tds_validate_email == 'yes' ) {
                $unsub_msg = rawurldecode( base64_decode( strip_tags( $this->get_att('unsub_msg') ) ) );
            }
        }

        // check to see if we are in composer or not
        if( $in_composer ) {
            // if we are in composer, the subscribed flag is determined by the option
            // that lets you choose which version of the form to display
            $show_version = $this->get_att('show_version');
            if( $show_version == 'unsub' ) {
                $tds_leads_cookie_subscribed = true;

                //hide unsubscribe button
                if ($hide_btn_un == 'yes') {
                    $show_btn = false;
                }
            }

            // display the messages that the user has decided to be shown
            if( $message_composer == 'success' ) {
                $message .= '<div class="tds-messages tds-messages-success">';
                    $message .= '<div class="tds-message">Success!</div>';
                $message .= '</div>';
            } else if( $message_composer == 'error' ) {
                $message .= '<div class="tds-messages tds-messages-error">';
                    $message .= '<div class="tds-message">Error message</div>';
                    $message .= '<div class="tds-message">Another error message</div>';
                $message .= '</div>';
            }
        } else {

            // if we are not in composer, then the subscribed flag is determined
            // by the leads cookie
            $tds_leads_cookie = !empty( $_COOKIE['tds_leads'] ) ? $_COOKIE['tds_leads'] : false;

            // check if the leads cookie is set for the current mailing list
            if ( $tds_leads_cookie ) {
                // get cookie lists
                $tds_leads_cookie_lists = explode( ',', $tds_leads_cookie );

                if ( $double_opt_in =='yes' && $tds_validate_email == 'yes' ) {
                    $tds_leads_cookie_subscribed = true;
                }
                // check if mailing list is found in the leads cookie and if it's there
                // set the flag to true
                elseif ( in_array( $tds_list, $tds_leads_cookie_lists ) ) {
                    $tds_leads_cookie_subscribed = true;
                }
            }

            // if we are dealing with a form submit, then the flag set above will possibly be overwritten
            if ( td_subscription::instance()->is_tds_form_submit() ) {
                // we are dealing with a form submit, so check whether we have errors
                if( tds_form_submission::has_errors() ) {

                    // if the form submission has encountered an error,
                    // then display its message
                    $tds_form_submission_errors = tds_form_submission::get_errors();

                    $message .= '<div class="tds-messages tds-messages-error">';
                        foreach( $tds_form_submission_errors as $err_id => $err_msg ) {
                            $message .= '<div class="tds-message">' . $err_msg . '</div>';
                        }
                    $message .= '</div>';

                } else {
                    // there have been no errors

                    // get the form submit result
                    $tds_form_submission_results = tds_form_submission::get_result();

                    // check to see if the form submit is a result of subscribing or unsubscribing this mailing list
                    if( isset( $tds_form_submission_results['new_lead_data'] ) ) {
                        // if the form submit is a result of subscribing and this is the mailing list
                        // that has been subscribed to, then set the flag to true and display a success message
                        if( $tds_form_submission_results['new_lead_data']['tds_list_id'] == $tds_list ) {
                            $tds_leads_cookie_subscribed = true;

                            $message .= '<div class="tds-messages tds-messages-success">';
                            $message .= '<div class="tds-message">' . __td( 'Successfully subscribed!' ) . '</div>';
                            $message .= '</div>';

                        }
                    } else if( isset( $tds_form_submission_results['unsubscribed'] ) ) {
                        // if the form submit is a result of unsubscribing and this is the mailing list
                        // that has been unsubscribed from, then set the flag to false and display a success message
                        if( in_array( $tds_list, $tds_form_submission_results['unsubscribed'] ) ) {
                            $tds_leads_cookie_subscribed = false;

                            $message .= '<div class="tds-messages tds-messages-success">';
                                $message .= '<div class="tds-message">' . __td( 'Successfully unsubscribed!' ) . '</div>';
                            $message .= '</div>';
                        }
                    }

                }
            }

        }

        /* -- title -- */
        // text
		$title_text = $this->get_att('title_text' );

		// tag
        $title_tag = $this->get_att('title_tag');
        if( $title_tag == '' ) {
            $title_tag = 'h3';
        }

		/* -- input -- */
		$input_placeholder = $this->get_att('input_placeholder' );

        /* -- button -- */
        // text
		$btn_text_subscribe = $this->get_att('btn_text');
		$btn_text_unsubscribe = $this->get_att('btn_text_un');
        if ( !$tds_leads_cookie_subscribed ) {
            $btn_text = $btn_text_subscribe;

            if( $btn_text == '' ) {
                $btn_text = 'Subscribe';
            }
        } else {
            $btn_text = $btn_text_unsubscribe;

            if( $btn_text == '' ) {
                $btn_text = 'Unsubscribe';
            }

            //hide unsubscribe button
            if ($hide_btn_un == 'yes') {
                $show_btn = false;
            }
        }

		// icon
        $btn_icon = '';
        $btn_icon_data = '';
        $btn_icon_subscribe = $this->get_icon_att( 'btn_tdicon' );
        $btn_icon_subscribe_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $btn_icon_subscribe_data = 'data-td-svg-icon="' . $this->get_att('btn_tdicon') . '"';
        }
        $btn_icon_unsubscribe = $this->get_icon_att( 'btn_tdicon_un' );
        $btn_icon_unsubscribe_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $btn_icon_unsubscribe_data = 'data-td-svg-icon="' . $this->get_att('btn_tdicon_un') . '"';
        }

        if ( !$tds_leads_cookie_subscribed ) {
            if( $btn_icon_subscribe != '' ) {
                $btn_icon = $btn_icon_subscribe;
                $btn_icon_data = $btn_icon_subscribe_data;
            }
        } else {
            if( $btn_icon_unsubscribe != '' ) {
                $btn_icon = $btn_icon_unsubscribe;
                $btn_icon_data = $btn_icon_unsubscribe_data;
            }
        }

		$btn_icon_html = '';
		if( $btn_icon != '' ) {
            if( base64_encode( base64_decode( $btn_icon ) ) == $btn_icon ) {
                $btn_icon_html = '<span class="tds-submit-btn-icon tds-submit-btn-icon-svg" ' . $btn_icon_data . '>' . base64_decode( $btn_icon ) . '</span>';
            } else {
                $btn_icon_html = '<i class="tds-submit-btn-icon ' . $btn_icon . '"></i>';
            }
        }

		// icon position
        $btn_icon_pos = $this->get_att('btn_icon_pos');


        /* -- redirect urls -- */
        // subscribe url
        $successful_submit_rdr_url = $this->get_att('successful_submit_rdr_url');
        // unsubscribe url
        $unsubscribe_rdr_url = $this->get_att('unsubscribe_rdr_url');

        // remove top border on Newsmag
        $block_classes = str_replace('td-pb-border-top', '', $this->get_block_classes());


        /* -- privacy policy -- */
        // checkbox
        $pp_checkbox = $this->get_att('pp_checkbox');

        // message
		$pp_msg = rawurldecode( base64_decode( strip_tags( $this->get_att('pp_msg') ) ) );
        $pp_msg = td_util::parse_footer_texts($pp_msg);

        $show_captcha = td_util::get_option('tds_captcha');
        $captcha_site_key = td_util::get_option('tds_captcha_site_key');


		$buffy = '<div class="' . $block_classes . '" ' . $this->get_block_html_atts() . '>';

			$buffy .= $this->get_block_css(); // get block css
			$buffy .= $this->get_block_js(); // get block js

			$buffy .= '<div class="tds-block-inner td-fix-index">';

                // js render
                ob_start();
                ?>
                    <script>

                        jQuery().ready(function () {
                            var tdsLeadsItem = new tdsLeads.item();

                            // block unique ID
                            tdsLeadsItem.blockUid = '<?php echo $this->block_uid; ?>';
                            tdsLeadsItem.jqueryObj = jQuery('.<?php echo $this->block_uid ?>');

                            <?php if ( $in_composer ) { ?>
                                tdsLeadsItem.inComposer = true;
                            <?php } ?>

                            <?php if ( td_subscription::instance()->is_tds_form_submit() ) { ?>
                                tdsLeadsItem.isSubmit = true;

                                <?php if ( tds_form_submission::has_errors() ) { ?>
                                    tdsLeadsItem.submitHasErrors = true;
                                <?php } ?>

                                <?php if ( !( tdc_state::is_live_editor_ajax() && tdc_state::is_live_editor_iframe() ) ) { ?>
                                    var sumitMessages = jQuery('.<?php echo $this->block_uid ?> .tds-messages');

                                    if( sumitMessages.length ) {
                                        setTimeout(function () {
                                            sumitMessages.addClass('tds-messages-hiding');

                                            setTimeout(function () {
                                                sumitMessages.remove();
                                            }, 300);
                                        }, 3000);
                                    }
                                <?php } ?>
                            <?php } ?>

                            // info/error messages
                            tdsLeadsItem.messages = <?php echo json_encode( array(
		                        'ack_require' => __td( 'Acknowledgment is required!' ),
		                        'captcha_user_score' => __td( 'CAPTCHA user score failed. Please contact us!' ),
		                        'captcha_failed' => __td( 'CAPTCHA verification failed!' )
	                        ) ); ?>;

                            tdsLeads.addItem( tdsLeadsItem );

                        });

                    </script>
                <?php
                td_js_buffer::add_to_footer("\n" . td_util::remove_script_tag( ob_get_clean() ) );

                /* title display */
                if( $title_text != '' ) {
                    $buffy .= '<' . $title_tag . ' class="tds-title">' . $title_text . '</' . $title_tag . '>';
                }

                /* message display */
                if( ($message_pos == '' || $message_pos == 'title') ) {
                    $buffy .= '<div class="tds-info">';
                        if( $message != '' ) {
                            $buffy .= $message;
                        }
                    $buffy .= '</div>';
                }


                /* form */
                $buffy .= '<form class="tds-form" action="" method="post" name="">';

                    if( $tds_leads_cookie_subscribed ) {
                        /* unsubscribe input */
                        $buffy .= '<input type="hidden" name="subscribed" value="1">';
                    }
                    $buffy .= '<input type="hidden" name="list" value="' . $tds_list . '">';
                    $buffy .= '<input type="hidden" name="double_opt_in" value="' . ( !$tds_leads_cookie_subscribed ? $double_opt_in : '' ) . '">';
                    $buffy .= '<input type="url" name="rdr_url" value="' . ( !$tds_leads_cookie_subscribed ? $successful_submit_rdr_url : $unsubscribe_rdr_url ) . '" style="display: none;">';



                    $buffy .= '<div class="tds-email-bar">';

                        if( !$tds_leads_cookie_subscribed ) {
                            $buffy .= '<div class="tds-input-wrap">';
                            if ($show_captcha == 'show' && $captcha_site_key != '') {
                                $buffy .= '<input type="hidden"id="g-recaptcha-response-leads" name="g-recaptcha-response" data-sitekey="' . $captcha_site_key . '">';
                                $buffy .= '<input type="hidden" name="action" value="validate_captcha">';
                            }
                                /* email input */
                                $buffy .= '<input class="tds-input" type="email" name="email" aria-label="email" placeholder="' . $input_placeholder . '" required>';


                            $buffy .= "</div>";
                        } else if( $unsub_msg != '' ) {
                            $buffy .= '<div class="tds-input-wrap">';
                                $buffy .= '<div class="tds-unsubscribe-txt">' . $unsub_msg . '</div>';
                            $buffy .= "</div>";
                        }

                        // $show_btn - just for unsubscribe button
                        // the subscribe btn will be displayed
                        if ( $show_btn ){
                            /* button */
                            $buffy .= '<button class="tds-submit-btn" type="submit" name="tds-subscribe">';
                            if( $btn_icon_pos == 'before' && $btn_icon_html != '' ) {
                                $buffy .= $btn_icon_html;
                            }

                            $buffy .= $btn_text;

                            if( ( $btn_icon_pos == 'after' || $btn_icon_pos == '' ) && $btn_icon_html != '' ) {
                                $buffy .= $btn_icon_html;
                            }
                            $buffy .= '</button>';
                        }


                    $buffy .= "</div>";


                    /* privacy policy checkbox */
                    if ( !$tds_leads_cookie_subscribed  && $pp_checkbox != '' && $pp_msg != '' ) {
                        $buffy .= '<div class="tds-checkbox">';
                            $buffy .= '<input id="pp_checkbox_' . $this->block_uid . '" class="" name="" value="Y" type="checkbox">';
                            $buffy .= '<label class="checkbox subfield" for="pp_checkbox_' . $this->block_uid . '">';
                                $buffy .= '<span class="tds-check"></span>';
                                $buffy .= '<span class="tds-check-title">' . $pp_msg . '</span>';
                            $buffy .= '</label>';
                        $buffy .= '</div>';
                    }

                $buffy .= "</form>";


                /* message display */
                if( $message_pos == 'form' ) {
                    $buffy .= '<div class="tds-info">';
                        if( $message != '' ) {
                            $buffy .= $message;
                        }
                    $buffy .= '</div>';
                }

            $buffy .= '</div>';

		$buffy .= '</div>';

		return $buffy;
	}

}
