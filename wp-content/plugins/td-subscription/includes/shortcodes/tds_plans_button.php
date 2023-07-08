<?php

/**
 * Class tds_plans_button
 */

class tds_plans_button extends td_block {

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

                /* @style_general_tds_plans_button */
                .tds_plans_button .tds-block-inner {
                    display: flex;
                    flex-direction: column;
                }
                .tds_plans_button .tds-plans-btn {
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
                .tds_plans_button .tds-plans-btn:before {
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
                .tds_plans_button .tds-plans-btn:hover:before {
                    opacity: 1;
                }
                .tds_plans_button .tds-plans-btn[disabled] {
                    opacity: .7;
                    pointer-events: none;
                }
                .tds_plans_button .tds-pb-icon {
                    position: relative;
                }
                .tds_plans_button i {
                    font-size: 15px;
                }
                .tds_plans_button svg {
                    display: block;
                    width: 15px;
                    height: auto;
                }
                .tds_plans_button svg,
                .tds_plans_button svg * {
                    fill: #fff;
                    -webkit-transition: fill 0.3s ease;
                    transition: fill 0.3s ease;
                }
                
                /* @logged_in_styles */
                .tds_plans_button .td-block-missing-settings {
                    width: 100%;
                }
                
                
                /* @all_border */
                body .$unique_block_class .tds-plans-btn {
                    border: @all_border @all_border_style @all_border_color;
                }
                /* @border_radius */
                body .$unique_block_class .tds-plans-btn,
                body .$unique_block_class .tds-plans-btn:before {
                    border-radius: @border_radius;
                }
                
                /* @padding */
                body .$unique_block_class .tds-plans-btn {
                    padding: @padding;
                }
                
                /* @min_width */
                body .$unique_block_class .tds-plans-btn {
                    min-width: @min_width;
                }
                
                /* @display_default */
                body .$unique_block_class {
                    display: block;
                }
                body .$unique_block_class .tds-block-inner {
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
                body .$unique_block_class .tds-block-inner {
                    align-items: stretch;
                }
                
                /* @horiz_align */
                body .$unique_block_class .tds-plans-btn {
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
                
                
                /* @text_color */
                body .$unique_block_class .tds-plans-btn {
                    color: @text_color;
                }
                body .$unique_block_class svg,
                body .$unique_block_class svg * {
                    fill: @text_color;
                }
                /* @text_color_h */
                body .$unique_block_class .tds-plans-btn:hover {
                    color: @text_color_h;
                }
                body .$unique_block_class .tds-plans-btn:hover svg,
                body .$unique_block_class .tds-plans-btn:hover svg * {
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
                body .$unique_block_class .tds-plans-btn:hover i {
                    color: @icon_color_h;
                }
                html body .$unique_block_class .tds-plans-btn:hover svg,
                html body .$unique_block_class .tds-plans-btn:hover svg * {
                    fill: @icon_color_h;
                }
                
                /* @bg_solid */
                body .$unique_block_class .tds-plans-btn {
                    background: @bg_solid;
                }
                /* @bg_gradient */
                body .$unique_block_class .tds-plans-btn {
                    @bg_gradient
                }
                /* @bg_solid_h */
                body .$unique_block_class .tds-plans-btn:before {
                    background: @bg_solid_h;
                }
                /* @bg_gradient_h */
                body .$unique_block_class .tds-plans-btn:before {
                    @bg_gradient_h
                }
                
                /* @border_color_h */
                body .$unique_block_class .tds-plans-btn:hover {
                    border-color: @border_color_h;
                }
                
                /* @shadow */
                body .$unique_block_class .tds-plans-btn {
                    box-shadow: @shadow;
                }
                /* @shadow_h */
                body .$unique_block_class .tds-plans-btn:hover {
                    box-shadow: @shadow_h;
                }
                
                
                /* @f_txt */
                body .$unique_block_class .tds-plans-btn {
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
        $res_ctx->load_settings_raw( 'style_general_tds_plans_button', 1 );
        if ( is_user_logged_in() ) {
            $res_ctx->load_settings_raw('logged_in_styles', 1);
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

        // default plan
        $default_plan = $this->get_att('def_plan');

        // button text
		$button_text = $this->get_att('button_text' );
        if( $button_text == '' ) {
            $button_text = __td('Choose plan', TD_THEME_NAME);
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

        // remove top border on Newsmag
        $block_classes = str_replace('td-pb-border-top', '', $this->get_block_classes());

		$buffy = '<div class="' . $block_classes . '" ' . $this->get_block_html_atts() . '>';

			$buffy .= $this->get_block_css(); // get block css
			$buffy .= $this->get_block_js(); // get block js

			$current_user_id = get_current_user_id();

			$options = tds_ajax::get_all_options();
			if (!empty($options['options'])) {
				foreach ($options['options'] as $option) {
					switch ($option['name']) {
						case 'payment_page_id': $payment_page_id = $option['value']; break;
						case 'create_account_page_id': $create_account_page_id = $option['value']; break;
					}
				}
			}

            $buffy .= '<div class="tds-block-inner td-fix-index">';

				if (empty($payment_page_id) || !get_post($payment_page_id) instanceof WP_Post) {
                    $buffy .= td_util::get_block_error( 'Plans button', "Please set a valid payment page" );
				} else if (empty($create_account_page_id) || !get_post($create_account_page_id) instanceof WP_Post) {
                    $buffy .= td_util::get_block_error( 'Plans button', "Please set a valid create account page" );
				} else {
					$data_url_free = '';

					$free_plan = $this->get_att( 'free_plan' );

					if ( ! empty( $free_plan ) ) {
						$url_free = add_query_arg( 'plan_id', $free_plan, get_permalink( $payment_page_id ) );
						if ( ! empty( $_REQUEST[ 'ref_url' ] ) ) {
							$url_free = add_query_arg( 'ref_url', $_REQUEST[ 'ref_url' ], $url_free );
						}

						if (empty($current_user_id)) {
							$data_url_free = 'data-url-free="' . add_query_arg('ref_url', base64_encode( $url_free ), get_permalink($create_account_page_id)) . '"';
						} else {
							$data_url_free = 'data-url-free="' . $url_free . '"';
						}
					}

					if (!empty( $data_url_free)) {

					    $buffy .= '<button class="tds-plans-btn tds-choose-plan-type-free" data-type="free" ' . $data_url_free . '>';

                    } else {

					    $data_url_year  = '';
					    $data_url_month = '';

						$year_plan = $this->get_att( 'year_plan' );

						if ( ! empty( $year_plan ) ) {
							$url_year = add_query_arg( 'plan_id', $year_plan, get_permalink( $payment_page_id ) );
							if ( ! empty( $_REQUEST[ 'ref_url' ] ) ) {
								$url_year = add_query_arg( 'ref_url', $_REQUEST[ 'ref_url' ], $url_year );
							}

							if ( empty( $current_user_id ) ) {
								$data_url_year = 'data-url-year="' . add_query_arg( 'ref_url', base64_encode( $url_year ), get_permalink( $create_account_page_id ) ) . '"';
							} else {
								$data_url_year = 'data-url-year="' . $url_year . '"';
							}
						}

						$month_plan = $this->get_att( 'month_plan' );

						if ( ! empty( $month_plan ) ) {
							$url_month = add_query_arg( 'plan_id', $month_plan, get_permalink( $payment_page_id ) );
							if ( ! empty( $_REQUEST[ 'ref_url' ] ) ) {
								$url_month = add_query_arg( 'ref_url', $_REQUEST[ 'ref_url' ], $url_month );
							}

							if ( empty( $current_user_id ) ) {
								$data_url_month = 'data-url-month="' . add_query_arg( 'ref_url', base64_encode( $url_month ), get_permalink( $create_account_page_id ) ) . '"';
							} else {
								$data_url_month = 'data-url-month="' . $url_month . '"';
							}
						}

						$default_plan_class = '';
						$data_type = 'year';
                        if ( !empty($default_plan) ) {
                            $default_plan_class = 'tds-switcher-change';
                            switch ($default_plan) {
                                case 'monthly': $data_type = 'month'; break;
                                case 'annual': $data_type = 'year'; break;
                            }
                        }
						$buffy .= '<button class="tds-plans-btn tds-choose-plan-type ' . $default_plan_class . '" data-type="' . $data_type . '" ' . $data_url_year . ' ' . $data_url_month . '>';
					}

                        if ( $icon_pos == 'before' ) {
                            $buffy .= $buffy_icon;
                        }

                        $buffy .= '<span class="tds-pb-txt">' . $button_text . '</span>';

                        if ( $icon_pos == '' ) {
                            $buffy .= $buffy_icon;
                        }

					$buffy .= '</button>';
				}

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
