<?php

/**
 * Class tds_leads_unsubscribe
 */

class tds_leads_unsubscribe extends td_block {

	public function get_custom_css() {

        // $unique_block_class
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

		/** @noinspection CssInvalidAtRule */
		$raw_css =
            "<style>

                /* @style_general_tds_leads_unsubscribe */
                .tds_leads_unsubscribe .tds-form {
                    display: flex;
                    flex-direction: column;
                }
                .tds_leads_unsubscribe .tds-unsub-btn {
                    position: relative;
                    display: flex;
                    align-items: center;
                    background-color: #4db2ec;
                    padding: 14px 24px 15px;
                    font-size: 13px;
                    line-height: 1;
                    color: #fff;
                    border: 0;
                    outline: none;
                    -webkit-appearance: none;
                    -webkit-transition: all 0.3s ease;
                    transition: all 0.3s ease;
                    transform: translateZ(0);
                }
                .tds_leads_unsubscribe .tds-unsub-btn:before {
                    content: '';
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: #222;
                    opacity: 0;
                    transition: opacity 0.3s ease;
                    z-index: -1;
                }
                .tds_leads_unsubscribe .tds-unsub-btn:hover:before {
                    opacity: 1;
                }
                .tds_leads_unsubscribe .tds-unsub-btn[disabled] {
                    opacity: .7;
                    pointer-events: none;
                }
                .tds_leads_unsubscribe .tds-pb-icon {
                    position: relative;
                }
                .tds_leads_unsubscribe i {
                    font-size: 15px;
                }
                .tds_leads_unsubscribe svg {
                    display: block;
                    width: 15px;
                    height: auto;
                }
                .tds_leads_unsubscribe svg,
                .tds_leads_unsubscribe svg * {
                    fill: #fff;
                    -webkit-transition: fill 0.3s ease;
                    transition: fill 0.3s ease;
                }
                
                
                /* @all_border */
                body .$unique_block_class .tds-unsub-btn {
                    border: @all_border @all_border_style @all_border_color;
                }
                /* @border_radius */
                body .$unique_block_class .tds-unsub-btn,
                body .$unique_block_class .tds-unsub-btn:before {
                    border-radius: @border_radius;
                }
                
                /* @padding */
                body .$unique_block_class .tds-unsub-btn {
                    padding: @padding;
                }
                
                /* @min_width */
                body .$unique_block_class .tds-unsub-btn {
                    min-width: @min_width;
                }
                
                /* @display_default */
                body .$unique_block_class {
                    display: block;
                }
                body .$unique_block_class .tds-form {
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
                body .$unique_block_class .tds-unsub-btn {
                    width: 100%;
                }
                
                /* @horiz_align */
                body .$unique_block_class .tds-unsub-btn {
                    justify-content: @horiz_align;
                }
                body .$unique_block_class .tds-form {
                    align-items: @horiz_align;
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
                
                
                /* @text_color */
                body .$unique_block_class .tds-unsub-btn {
                    color: @text_color;
                }
                body .$unique_block_class svg,
                body .$unique_block_class svg * {
                    fill: @text_color;
                }
                /* @text_color_h */
                body .$unique_block_class .tds-unsub-btn:hover {
                    color: @text_color_h;
                }
                body .$unique_block_class .tds-unsub-btn:hover svg,
                body .$unique_block_class .tds-unsub-btn:hover svg * {
                    fill: @text_color_h;
                }
                
                /* @icon_color */
                body .$unique_block_class i {
                    color: @icon_color;
                }
                html body .$unique_block_class svg,
                html body .$unique_block_class svg * {
                    fill: @icon_color;
                }
                /* @icon_color_h */
                body .$unique_block_class .tds-unsub-btn:hover i {
                    color: @icon_color_h;
                }
                html body .$unique_block_class .tds-unsub-btn:hover svg,
                html body .$unique_block_class .tds-unsub-btn:hover svg * {
                    fill: @icon_color_h;
                }
                
                /* @bg_solid */
                body .$unique_block_class .tds-unsub-btn {
                    background: @bg_solid;
                }
                /* @bg_gradient */
                body .$unique_block_class .tds-unsub-btn {
                    @bg_gradient
                }
                /* @bg_solid_h */
                body .$unique_block_class .tds-unsub-btn:before {
                    background: @bg_solid_h;
                }
                /* @bg_gradient_h */
                body .$unique_block_class .tds-unsub-btn:before {
                    @bg_gradient_h
                }
                
                /* @border_color_h */
                body .$unique_block_class .tds-unsub-btn:hover {
                    border-color: @border_color_h;
                }
                
                /* @shadow */
                body .$unique_block_class .tds-unsub-btn {
                    box-shadow: @shadow;
                }
                /* @shadow_h */
                body .$unique_block_class .tds-unsub-btn:hover {
                    box-shadow: @shadow_h;
                }
                
                
                /* @f_txt */
                body .$unique_block_class .tds-unsub-btn {
                    @f_txt
                }

            </style>";

		$td_css_res_compiler = new td_css_res_compiler( $raw_css );
		$td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

		$compiled_css .= $td_css_res_compiler->compile_css();

		return $compiled_css;

	}

	static function cssMedia( $res_ctx ) {

        /*-- GENERAL STYLES -- */
        $res_ctx->load_settings_raw( 'style_general_tds_leads_unsubscribe', 1 );



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
        // border radius
        $border_radius = $res_ctx->get_shortcode_att('border_radius');
        $res_ctx->load_settings_raw('border_radius', $border_radius);
        if( $border_radius != '' && is_numeric( $border_radius ) ) {
            $res_ctx->load_settings_raw('border_radius', $border_radius . 'px');
        }


        // padding
        $padding = $res_ctx->get_shortcode_att('padd');
        $res_ctx->load_settings_raw('padding', $padding);
        if( $padding != '' && is_numeric( $padding ) ) {
            $res_ctx->load_settings_raw('padding', $padding . 'px');
        }

        // min width
        $min_width = $res_ctx->get_shortcode_att('min_width');
        $res_ctx->load_settings_raw('min_width', $min_width);
        if( $min_width != '' && is_numeric( $min_width ) ) {
            $res_ctx->load_settings_raw('min_width', $min_width . 'px');
        }

        // display
        $display = $res_ctx->get_shortcode_att('display');
        if( $display == 'default' || $display == '' ) {
            $res_ctx->load_settings_raw('display_default', 1);
        } else if( $display == 'inline' ) {
            $res_ctx->load_settings_raw('display_inline', 1);
        } else if ( $display == 'full' ) {
            $res_ctx->load_settings_raw('display_full', 1);
        }

        // horizontal align
        $horiz_align = $res_ctx->get_shortcode_att('horiz_align');
        if( $horiz_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw('horiz_align', 'flex-start');
        } else if( $horiz_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw('horiz_align', 'center');
        } else if( $horiz_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw('horiz_align', 'flex-end');
        }


        // icon size
        $icon_size = $res_ctx->get_shortcode_att('icon_size');
        $res_ctx->load_settings_raw('icon_size', $icon_size);
        if( $icon_size != '' && is_numeric( $icon_size ) ) {
            $res_ctx->load_settings_raw('icon_size', $icon_size . 'px');
        }

        // icon space
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

        // icon vertical align
        $res_ctx->load_settings_raw('icon_align', $res_ctx->get_shortcode_att('icon_align') . 'px');



        /*-- STYLE -- */
        $res_ctx->load_settings_raw('text_color', $res_ctx->get_shortcode_att('text_color'));
        $res_ctx->load_settings_raw('text_color_h', $res_ctx->get_shortcode_att('text_color_h'));
        $res_ctx->load_settings_raw('icon_color', $res_ctx->get_shortcode_att('icon_color'));
        $res_ctx->load_settings_raw('icon_color_h', $res_ctx->get_shortcode_att('icon_color_h'));
        $res_ctx->load_color_settings( 'bg_color', 'bg_solid', 'bg_gradient' );
        $res_ctx->load_color_settings( 'bg_color_h', 'bg_solid_h', 'bg_gradient_h' );
        $all_border_color = $res_ctx->get_shortcode_att('all_border_color');
        if( $all_border_color != '' ) {
            $res_ctx->load_settings_raw('all_border_color', $all_border_color);
        } else {
            $res_ctx->load_settings_raw('all_border_color', '#000');
        }
        $res_ctx->load_settings_raw('border_color_h', $res_ctx->get_shortcode_att('border_color_h'));

        $res_ctx->load_shadow_settings( 0, 0, 0, 0, 'rgba(0, 0, 0, 0.2)', 'shadow' );
        $res_ctx->load_shadow_settings( 0, 0, 0, 0, 'rgba(0, 0, 0, 0.2)', 'shadow_h' );



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_txt' );

	}

	function __construct() {
		parent::disable_loop_block_features();
	}

	function render( $atts, $content = null ) {

        parent::render( $atts );


        /* -- flag to determine whether we are in composer or not -- */
        $in_composer = tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe();


        /* -- leads cookie -- */
        $tds_leads_cookie = !empty( $_COOKIE['tds_leads'] ) ? $_COOKIE['tds_leads'] : '';

        // flag to determine if the user has subscribed to any mailing list
        $tds_leads_cookie_subscribed = true;

        // if we are not in composer, the flag is set depending
        // on whether we are dealing with a form submit
        if( !$in_composer ) {

            if ( td_subscription::instance()->is_tds_form_submit() ) {

                // we are dealing with a form submit, so proceed if there are no errors
                if( !tds_form_submission::has_errors() ) {
                    // get the form submit result
                    $tds_form_submission_results = tds_form_submission::get_result();

                    // check to see if the form submit is a result of subscribing or unsubscribing from a mailing list
                    if( isset( $tds_form_submission_results['new_lead_data'] ) ) {
                        // if the form submit is a result of subscribing to a new mailing list,
                        // then add the mailing list id to the cookie string
                        if( $tds_leads_cookie == '' ) {
                            $tds_leads_cookie = $tds_form_submission_results['new_lead_data']['tds_list_id'];
                        } else {
                            $tds_leads_cookie .= ',' . $tds_form_submission_results['new_lead_data']['tds_list_id'];
                        }
                    } else if( isset( $tds_form_submission_results['unsubscribed'] ) ) {
                        // if the form submit is a result of unsubscribing, then check whether
                        // all the mailing lists were unsubscribed from, or just one
                        if( $tds_form_submission_results['removed_all'] ) {
                            // if all the mailing lists were unsubscribed from, then just hide the button
                            $tds_leads_cookie_subscribed = false;
                        } else {
                            // if only one mailing list was unsubscribed from, then remove its id
                            // from the cookie list
                            $tds_leads_cookie_new = explode(',', $tds_leads_cookie);

                            if( in_array( $tds_form_submission_results['unsubscribed'][0], $tds_leads_cookie_new ) ) {
                                unset( $tds_leads_cookie_new[array_search( $tds_form_submission_results['unsubscribed'][0], $tds_leads_cookie_new ) ] );

                                $tds_leads_cookie = implode(',', $tds_leads_cookie_new);
                            }
                        }
                    }
                }

            } else {

                // if we are not dealing with a form submit, then check whether
                // the leads cookie is empty, in which case hide the button
                if ( $tds_leads_cookie == '' ) {
                    $tds_leads_cookie_subscribed = false;
                }

            }

        }


        /* -- redirect url -- */
        $unsubscribe_rdr_url = $this->get_att('unsubscribe_rdr_url');


        /* -- button -- */
        // text
		$button_text = $this->get_att('button_text' );
        if( $button_text == '' ) {
            $button_text = 'Unsubscribe';
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

        // if the user has not subscribed to any mailing list, don't show the button
        if( !$tds_leads_cookie_subscribed ) {
            return $buffy;
        }


		$buffy .= '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';

			$buffy .= $this->get_block_css(); // get block css
			$buffy .= $this->get_block_js(); // get block js


            $buffy .= '<div class="tds-block-inner td-fix-index">';

                $buffy .= '<form class="tds-form" action="" method="post" name="">';
                    $buffy .= '<input type="hidden" name="subscribed" value="1">';
                    $buffy .= '<input type="hidden" name="list" value="' . $tds_leads_cookie . '">';
                    if( $unsubscribe_rdr_url != '' ) {
                        $buffy .= '<input type="url" name="rdr_url" value="' . $unsubscribe_rdr_url . '" style="display: none;">';
                    }

                    $buffy .= '<button class="tds-unsub-btn" type="submit" name="tds-subscribe">';
                        if ( $icon_pos == 'before' ) {
                            $buffy .= $buffy_icon;
                        }

                        $buffy .= '<span class="tds-pb-txt">' . $button_text . '</span>';

                        if ( $icon_pos == '' ) {
                            $buffy .= $buffy_icon;
                        }
                    $buffy .= '</button>';
                $buffy .= '</form>';

            $buffy .= '</div>';

		$buffy .= '</div>';

		return $buffy;
	}

    function js_tdc_callback_ajax() {
        $buffy = '';

        // add a new composer block - that one has the delete callback
        $buffy .= $this->js_tdc_get_composer_block();

        ob_start();

        ?>
        <script>
            /* global jQuery:{} */
            (function () {

                // check for the default plan selected in the plan switcher,
                // and set the active plan
                var $defaultPlan = jQuery('.tds-switcher:checked');

                if( $defaultPlan.length ) {

                    // set the active plan
                    tdsMain.setActivePlan($defaultPlan.val());

                }

            })();
        </script>
        <?php

        return $buffy . td_util::remove_script_tag( ob_get_clean() );
    }
}
