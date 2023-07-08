<?php

class tdb_user_form_submit extends td_block {

    public function get_custom_css() {

        // $unique_block_class
        $unique_block_class = $this->block_uid;

        $compiled_css = '';

        /** @noinspection CssInvalidAtRule */

        $raw_css =
            "<style>

                /* @style_general_tdb_user_form_submit */
                .tdb_user_form_submit {
                    transform: translateZ(0);
                    margin-bottom: 28px;
                    font-family: -apple-system,BlinkMacSystemFont,\"Segoe UI\",Roboto,Oxygen-Sans,Ubuntu,Cantarell,\"Helvetica Neue\",sans-serif;
                    font-size: 14px;
                }
                .tdb_user_form_submit .tdb-s-content {
                    min-height: auto;
                }
                .tdb_user_form_submit .tdb-s-form-footer {
                    margin-top: 0;
                }
                .tdb_user_form_submit .tdb-s-btn {
                    min-width: auto;
                }
                .tdb_user_form_submit .tdb-s-btn svg {
                    fill: #fff;
                }
                .tdb_user_form_submit .tdb-s-notif {
                    margin-bottom: 28px;
                }
                
                /* @style_general_tdb_user_form_submit_composer */
                .tdb_user_form_submit .tdb-block-inner {
                    pointer-events: none;
                }
                
                
                /* @padding */
                body .$unique_block_class .tdb-s-btn {
                    padding: @padding;
                }
                /* @min_width */
                body .$unique_block_class .tdb-s-btn {
                    min-width: @min_width;
                }
                /* @display_default */
                body .$unique_block_class {
                    display: block;
                }
                body .$unique_block_class .tdb-block-inner {
                    align-items: flex-start;
                }
                /* @display_inline */
                body .$unique_block_class {
                    display: inline-block;
                }
                /* @display_full */
                body .$unique_block_class {
                    display: block;
                }
                body .$unique_block_class .tdb-block-inner {
                    align-items: stretch;
                    display: flex;
                    flex-direction: column;
                }
                body .$unique_block_class .tdb-s-btn {
                  display: flex;
                  width: 100%;
                }
                /* @btn_radius */
                body .$unique_block_class .tdb-s-btn {
                    border-radius: @btn_radius;
                }
                /* @horiz_align */
                body .$unique_block_class .tdb-s-btn {
                    justify-content: @horiz_align;
                }
                
                /* @icon_size */
                body .$unique_block_class i {
                    font-size: @icon_size;
                }
                body .$unique_block_class svg {
                    width: @icon_size;
                }
                
                /* @icon_align */
                body .$unique_block_class .tds-pb-icon {
                    top: @icon_align;
                }
                
                /* @icon_space */
                body .$unique_block_class .tds-pb-icon {
                    margin: @icon_space;
                }
                
                /* @notif_radius */
                body .$unique_block_class .tdb-s-notif {
                    border-radius: @notif_radius;
                }
                
                /* @accent_color */
                body .$unique_block_class .tdb-s-btn {
                    background-color: @accent_color;
                }
                
                /* @btn_color */
                body .$unique_block_class .tdb-s-btn {
                    color: @btn_color;
                }
                body .$unique_block_class .tdb-s-btn svg {
                    fill: @btn_color;
                }
                /* @btn_color_h */
                body .$unique_block_class .tdb-s-btn:hover {
                    color: @btn_color_h;
                }
                body .$unique_block_class .tdb-s-btn:hover svg {
                    fill: @btn_color_h;
                }
                /* @btn_bg_h */
                body .$unique_block_class .tdb-s-btn:hover {
                    background-color: @btn_bg_h;
                }
                /* @all_border */
                body .$unique_block_class .tdb-s-btn {
                    border: @all_border @all_border_style @all_border_color;
                }
                 /* @border_color_h */
                body .$unique_block_class .tdb-s-btn:hover {
                    border-color: @border_color_h;
                }
                
                /* @notif_info_color */
                body .$unique_block_class .tdb-s-notif-info {
                    color: @notif_info_color;
                }
                /* @notif_info_bg */
                body .$unique_block_class .tdb-s-notif-info {
                    background-color: @notif_info_bg;
                }
                /* @notif_succ_color */
                body .$unique_block_class .tdb-s-notif-success {
                    color: @notif_succ_color;
                }
                /* @notif_succ_bg */
                body .$unique_block_class .tdb-s-notif-success {
                    background-color: @notif_succ_bg;
                }
                /* @notif_error_color */
                body .$unique_block_class .tdb-s-notif-error {
                    color: @notif_error_color;
                }
                /* @notif_error_bg */
                body .$unique_block_class .tdb-s-notif-error {
                    background-color: @notif_error_bg;
                }
                
                
                /* @f_text */
                body .$unique_block_class {
                    @f_text
                }

            </style>";

        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();

        return $compiled_css;

    }

    static function cssMedia( $res_ctx ) {

        /*-- GENERAL STYLES -- */
        $res_ctx->load_settings_raw( 'style_general_tdb_user_form_submit', 1 );
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $res_ctx->load_settings_raw( 'style_general_tdb_user_form_submit_composer', 1 );
        }



        /*-- LAYOUT -- */
        // border size
        $border_size = $res_ctx->get_shortcode_att('all_border');
        $res_ctx->load_settings_raw('all_border', $border_size);
        if( $border_size != '' && is_numeric( $border_size ) ) {
            $res_ctx->load_settings_raw('all_border', $border_size . 'px');
        }
        // border style
        $all_border_style = $res_ctx->get_shortcode_att('all_border_style');
        if( $all_border_style != '' ) {
            $res_ctx->load_settings_raw('all_border_style', $res_ctx->get_shortcode_att('all_border_style'));
        } else {
            $res_ctx->load_settings_raw('all_border_style', 'solid');
        }
        // buttons border radius
        $btn_radius = $res_ctx->get_shortcode_att('btn_radius');
        $res_ctx->load_settings_raw( 'btn_radius', $btn_radius );
        if( $btn_radius != '' && is_numeric( $btn_radius ) ) {
            $res_ctx->load_settings_raw( 'btn_radius', $btn_radius . 'px' );
        }

        // button padding
        $padding = $res_ctx->get_shortcode_att('padd');
        $res_ctx->load_settings_raw('padding', $padding);
        if( $padding != '' && is_numeric( $padding ) ) {
            $res_ctx->load_settings_raw('padding', $padding . 'px');
        }

        // button min width
        $min_width = $res_ctx->get_shortcode_att('min_width');
        $res_ctx->load_settings_raw('min_width', $min_width);
        if( $min_width != '' && is_numeric( $min_width ) ) {
            $res_ctx->load_settings_raw('min_width', $min_width . 'px');
        }

        // button display
        $display = $res_ctx->get_shortcode_att('display');
        if( $display == 'default' || $display == '' ) {
            $res_ctx->load_settings_raw('display_default', 1);
        } else if( $display == 'inline' ) {
            $res_ctx->load_settings_raw('display_inline', 1);
        } else if ( $display == 'full' ) {
            $res_ctx->load_settings_raw('display_full', 1);
        }

        // button horizontal align
        $horiz_align = $res_ctx->get_shortcode_att('horiz_align');
        if( $horiz_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw('horiz_align', 'flex-start');
        } else if( $horiz_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw('horiz_align', 'center');
        } else if( $horiz_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw('horiz_align', 'flex-end');
        }

        // button icon size
        $icon_size = $res_ctx->get_shortcode_att('icon_size');
        $res_ctx->load_settings_raw('icon_size', $icon_size);
        if( $icon_size != '' && is_numeric( $icon_size ) ) {
            $res_ctx->load_settings_raw('icon_size', $icon_size . 'px');
        }

        // button icon space
        $icon_pos = $res_ctx->get_shortcode_att('icon_pos');
        $icon_space = $res_ctx->get_shortcode_att('icon_space');
        if( $icon_pos == 'before' ) {
            if( $icon_space != '' ){
                if( is_numeric( $icon_space ) ) {
                    $res_ctx->load_settings_raw('icon_space', '0 ' . $icon_space . 'px 0 0');
                } else {
                    $res_ctx->load_settings_raw('icon_space', '0 ' . $icon_space . '0 0');
                }
            } else {
                $res_ctx->load_settings_raw('icon_space', '0 10px 0 0');
            }
        } else {
            if( $icon_space != '' ){
                if( is_numeric( $icon_space ) ) {
                    $res_ctx->load_settings_raw('icon_space', '0 0 0 ' . $icon_space . 'px');
                } else {
                    $res_ctx->load_settings_raw('icon_space', '0 0 0 ' . $icon_space);
                }
            } else {
                $res_ctx->load_settings_raw('icon_space', '0 0 0 10px');
            }
        }

        // button icon vertical align
        $res_ctx->load_settings_raw('icon_align', $res_ctx->get_shortcode_att('icon_align') . 'px');


        // notifications border radius
        $notif_radius = $res_ctx->get_shortcode_att('notif_radius');
        $res_ctx->load_settings_raw( 'notif_radius', $notif_radius );
        if( $notif_radius != '' && is_numeric( $notif_radius ) ) {
            $res_ctx->load_settings_raw( 'notif_radius', $notif_radius . 'px' );
        }



        /*-- COLORS -- */
        $accent_color = $res_ctx->get_shortcode_att('accent_color');
        $res_ctx->load_settings_raw( 'accent_color', $accent_color );

        $res_ctx->load_settings_raw( 'btn_color', $res_ctx->get_shortcode_att('btn_color') );
        $res_ctx->load_settings_raw( 'btn_color_h', $res_ctx->get_shortcode_att('btn_color_h') );
        $res_ctx->load_settings_raw( 'btn_bg_h', $res_ctx->get_shortcode_att('btn_bg_h') );
        $all_border_color = $res_ctx->get_shortcode_att('all_border_color');
        if( $all_border_color != '' ) {
            $res_ctx->load_settings_raw('all_border_color', $all_border_color);
        } else {
            $res_ctx->load_settings_raw('all_border_color', '#000');
        }
        $res_ctx->load_settings_raw('border_color_h', $res_ctx->get_shortcode_att('border_color_h'));

        $notif_info_color = $res_ctx->get_shortcode_att('notif_info_color');
        $res_ctx->load_settings_raw( 'notif_info_color', $notif_info_color );
        if( !empty( $notif_info_color ) ) {
            $res_ctx->load_settings_raw('notif_info_bg', td_util::hex2rgba($notif_info_color, 0.08));
        }

        $notif_succ_color = $res_ctx->get_shortcode_att('notif_succ_color');
        $res_ctx->load_settings_raw( 'notif_succ_color', $notif_succ_color );
        if( !empty( $notif_succ_color ) ) {
            $res_ctx->load_settings_raw('notif_succ_bg', td_util::hex2rgba($notif_succ_color, 0.1));
        }

        $notif_error_color = $res_ctx->get_shortcode_att('notif_error_color');
        $res_ctx->load_settings_raw( 'notif_error_color', $notif_error_color );
        if( !empty( $notif_error_color ) ) {
            $res_ctx->load_settings_raw('notif_error_bg', td_util::hex2rgba($notif_error_color, 0.12));
        }



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_text' );

    }

    function __construct() {
        parent::disable_loop_block_features();
    }

    function render( $atts, $content = null ) {

        parent::render( $atts );


        // form group class
        $form_group_class = $this->get_att('group_class');
        if( $form_group_class != '' ) {
            $form_group_class = '.' . $form_group_class . ' ';
        }


        // Success URL
        //$success_url = $this->get_att( 'success_url' );


        /*-- CURRENT USER INFO -- */
        // Current user
        $current_user = wp_get_current_user();
        $current_user_id = $current_user->ID;
        $is_current_user_admin = in_array('administrator', $current_user->roles);


        /*-- SUBMIT BUTTON -- */
        // text
        $submit_btn_txt = $this->get_att('update_txt');
        if( $submit_btn_txt == '' ) {
            $submit_btn_txt = __td( 'Update', TD_THEME_NAME );
        }
        // icon
        $icon = $this->get_icon_att( 'tdicon' );
        $tdicon_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $tdicon_data = 'data-td-svg-icon="' . $this->get_att('tdicon') . '"';
        }
        $buffy_icon = '';
        if ( !empty( $icon ) ) {
            if( base64_encode( base64_decode( $icon ) ) == $icon ) {
                $buffy_icon .= '<span class="tds-pb-icon tds-pb-icon-svg" ' . $tdicon_data . '>' . base64_decode( $icon ) . '</span>';
            } else {
                $buffy_icon .= '<i class="tds-pb-icon ' . $icon . '"></i>';
            }
        }
        // icon position
        $icon_pos = $this->get_att('icon_pos' );


        $buffy = '';


        $buffy .= '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';

            $buffy .= $this->get_block_css(); // get block css

            $buffy .= $this->get_block_js(); // get block js


            $buffy .= '<div class="tdb-block-inner td-fix-index tdb-s-form tdb-s-content">';
                $buffy .= '<div class="tdb-s-form-footer">';
                    $buffy .= '<button class="tdb-s-btn" ' . ( !is_user_logged_in() ? 'disabled' : '' ) . '>';
                        if ( $icon_pos == 'before' ) {
                            $buffy .= $buffy_icon;
                        }
                        $buffy .= $submit_btn_txt;
                        if ( $icon_pos == '' ) {
                            $buffy .= $buffy_icon;
                        }
                    $buffy .= '</button>';
                $buffy .= '</div>';
            $buffy .= '</div>';


            if( !( tdc_state::is_live_editor_iframe() || tdc_state::is_live_editor_ajax() ) ) {
                ob_start();
                ?>
                <script>
                    /* global jQuery:{} */
                    jQuery(document).ready( function($) {

                        let uid = '<?php echo $this->block_uid ?>',
                            $blockObj = jQuery('.<?php echo $this->block_uid ?>');


                        let tdbCustomFormItem = new tdbCustomForms.item();
                        // block uid
                        tdbCustomFormItem.uid = uid;
                        // block object
                        tdbCustomFormItem.blockObj = $blockObj;
                        // form type
                        tdbCustomFormItem.formType = 'user';
                        // form group class
                        tdbCustomFormItem.formGroupClass = '<?php echo $form_group_class ?>';
                        // current user ID
                        tdbCustomFormItem.currentUserID = '<?php echo $current_user_id ?>';

                        tdbCustomForms.addItem(tdbCustomFormItem);

                    });

                </script>
                <?php
                td_js_buffer::add_to_footer( "\n" . td_util::remove_script_tag( ob_get_clean() ) );
            }

        $buffy .= '</div>';

        return $buffy;
    }


}