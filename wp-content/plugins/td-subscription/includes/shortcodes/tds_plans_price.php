<?php

/**
 * Class tds_plans_price
 */

class tds_plans_price extends td_block {

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

                /* @style_general_tds_plans_price */
                .tds_plans_price .tds-block-inner {
                    display: flex;
                    align-items: center;
                }
                .tds_plans_price .tds-plans-price,
                .tds_plans_price .tds-pp-placeholder {
                    align-items: baseline;
                    font-size: 32px;
                    line-height: 1.3;
                    font-weight: 700;
                }
                .tds_plans_price .tds-show-plan-price {
                    display: none;
                }
                .tds-show-plan-price-free {
                    display: flex;
                }
                .tds_plans_price .tds-show-plan-visible {
                    display: flex;
                }
                .tds_plans_price .tds-pp-placeholder {
                    display: flex;
                }
                .tds_plans_price .tds-pp-placeholder {
                    width: 1px;
                    overflow: hidden;
                    opacity: 0;
                    pointer-events: none;
                }
                
                /* @style_general_tds_plans_price_composer */
                .tds_plans_price .tds-pp-placeholder.tds-plan-placeholder-visible {
                    width: auto;
                    overflow: visible;
                    opacity: 1;
                }
                
                
                /* @currency_space */
                body .$unique_block_class .tds-plans-price .td-pp-currency {
                    margin: @currency_space;
                }
                
                /* @inline */
                .$unique_block_class {
                    display: inline-block;
                }
                
                /* @vert_align */
                .$unique_block_class {
                    vertical-align: @vert_align;
                }
                
                /* @horiz_align */
                body .$unique_block_class .tds-block-inner {
                    justify-content: @horiz_align;
                }
                
                
                /* @price_color */
                body .$unique_block_class .tds-plans-price,
                body .$unique_block_class .tds-pp-placeholder {
                    color: @price_color;
                }
                
                /* @curr_color */
                body .$unique_block_class .tds-plans-price .td-pp-currency,
                body .$unique_block_class .tds-pp-placeholder .td-pp-currency {
                    color: @curr_color;
                }
                
                
                /* @f_price */
                body .$unique_block_class .tds-plans-price,
                body .$unique_block_class .tds-pp-placeholder {
                    @f_price
                }
                
                /* @f_curr */
                body .$unique_block_class .td-pp-currency {
                    @f_curr
                }

            </style>";

		$td_css_res_compiler = new td_css_res_compiler( $raw_css );
		$td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

		$compiled_css .= $td_css_res_compiler->compile_css();

		return $compiled_css;

	}

	static function cssMedia( $res_ctx ) {

        /*-- GENERAL STYLES -- */
        $res_ctx->load_settings_raw( 'style_general_tds_plans_price', 1 );

        if( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) {
            $res_ctx->load_settings_raw( 'style_general_tds_plans_price_composer', 1 );
        }



        /*-- LAYOUT -- */
        // currency space
//        $currency_pos = $res_ctx->get_shortcode_att('curr_pos');
//        $currency_space = $res_ctx->get_shortcode_att('curr_space');
//        if( $currency_pos == '' ) {
//            $res_ctx->load_settings_raw('currency_space', '0 ' . $currency_space . '0 0');
//            if( $currency_space != '' && is_numeric( $currency_space ) ) {
//                $res_ctx->load_settings_raw('currency_space', '0 ' . $currency_space . 'px 0 0');
//            }
//        } else {
//            $res_ctx->load_settings_raw('currency_space', '0 0 0 ' . $currency_space);
//            if( $currency_space != '' && is_numeric( $currency_space ) ) {
//                $res_ctx->load_settings_raw('currency_space', '0 0 0 ' . $currency_space . 'px');
//            }
//        }

        $currency_space = $res_ctx->get_shortcode_att('curr_space');
        $tds_options = tds_util::get_tds_options();
        $currency_pos = '';

        foreach ($tds_options as $tds_option) {
	        switch ( $tds_option[ 'name' ] ) {
		        case 'curr_pos':
		            $currency_pos = $tds_option[ 'value' ];
		            break;
	        }
        }
        if( $currency_space != '' && is_numeric( $currency_space ) ) {
            $currency_space .= 'px';
        }
        if (!empty($currency_space)) {
            if ( empty($currency_pos) || in_array($currency_pos, ['left', 'left_space'])) {
                $currency_space = '0 ' . $currency_space . ' 0 0';
            } else if (in_array($currency_pos, ['right', 'right_space'])) {
                $currency_space = '0 0 0 ' . $currency_space;
            }
            $res_ctx->load_settings_raw('currency_space', $currency_space );
        }




        // display inline
        $res_ctx->load_settings_raw( 'inline', $res_ctx->get_shortcode_att('inline') );

        // vertical align
        $res_ctx->load_settings_raw('vert_align', $res_ctx->get_shortcode_att('vert_align'));

        // horizontal align
        $horiz_align = $res_ctx->get_shortcode_att('horiz_align');
        if( $horiz_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw('horiz_align', 'flex-start');
        } else if( $horiz_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw('horiz_align', 'center');
        } else if( $horiz_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw('horiz_align', 'flex-end');
        }



        /*-- COLORS -- */
        $res_ctx->load_settings_raw('price_color', $res_ctx->get_shortcode_att('price_color'));
        $res_ctx->load_settings_raw('curr_color', $res_ctx->get_shortcode_att('curr_color'));



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_price' );
        $res_ctx->load_font_settings( 'f_curr' );

	}

	function __construct() {
		parent::disable_loop_block_features();
	}

	function render( $atts, $content = null ) {

        parent::render( $atts );

        // free plan
        $free_plan = $this->get_att('free_plan' );

        // default plan
        $default_plan = $this->get_att('def_plan');

        $def_type_from_block_data = 'data-type-from-block="';
        if( !empty( $free_descr ) ) {
            $def_type_from_block_data .= 'free';
        } else if( $default_plan == 'annual' ) {
            $def_type_from_block_data .= 'year';
        } else if ( $default_plan == 'monthly' ) {
            $def_type_from_block_data .= 'month';
        }
        $def_type_from_block_data .= '"';

        tds_util::get_currency_options($currency, $currency_pos, $currency_th_sep, $currency_dec_sep, $currency_dec_no);
        if (!empty($currency)) {
            $currency = tds_util::get_currency($currency, true);
        }

        $currency_html = '<div class="td-pp-currency">' . $currency . '</div>';

        // remove top border on Newsmag
        $block_classes = str_replace('td-pb-border-top', '', $this->get_block_classes());

        $buffy = '<div class="' . $block_classes . '" ' . $this->get_block_html_atts() . ' ' . $def_type_from_block_data . '>';

			$buffy .= $this->get_block_css(); // get block css
			$buffy .= $this->get_block_js(); // get block js

            $buffy .= '<div class="tds-block-inner td-fix-index">';

			    if (!empty($free_plan)) {

			        $free_plans = tds_config::get_plans('free', false);
			        $buffy .= '<div class="tds-plans-price tds-show-plan-price-free" data-type="free">';
                        $buffy .= '<div class="td-pp-price-txt">' . __td('Free', TD_THEME_NAME) . '</div>';
                    $buffy .= '</div>';

                } else {

			        $default_plan_class = '';
			        $year_plan = $this->get_att( 'year_plan' );
				    if ( ! empty( $year_plan ) ) {
					    $year_plans = tds_config::get_plans( 'year', false );

					    if (count($year_plans)) {
					        if ( 'annual' === $default_plan ) {
					            $default_plan_class .= ' tds-show-plan-price-visible';
                            }
						    $buffy .= '<div class="tds-plans-price tds-show-plan-price ' . $default_plan_class . '" data-type="year">';
                                if ( empty($currency_pos) || in_array($currency_pos, ['left', 'left_space'])) {
                                    $buffy .= $currency_html;
                                }

                                if (!empty( $year_plans[ $year_plan ])) {
	                                $buffy .= '<div class="td-pp-price-txt">' . number_format( $year_plans[ $year_plan ][ 'price' ], $currency_dec_no, $currency_dec_sep, $currency_th_sep ) . '</div>';

	                                if ( in_array( $currency_pos, [ 'right', 'right_space' ] ) ) {
		                                $buffy .= $currency_html;
	                                }
                                }
						    $buffy .= '</div>';
					    }
				    }

				    $default_plan_class = '';
				    $month_plan = $this->get_att( 'month_plan' );
				    if ( ! empty( $month_plan ) ) {
					    $month_plans = tds_config::get_plans( 'month', false );

					    if (count($month_plans)) {
					        if ( 'monthly' === $default_plan ) {
					            $default_plan_class .= ' tds-show-plan-price-visible';
                            }
	                        $buffy .= '<div class="tds-plans-price tds-show-plan-price ' . $default_plan_class . '" data-type="month">';
                                if ( empty($currency_pos) || in_array($currency_pos, ['left', 'left_space'])) {
                                    $buffy .= $currency_html;
                                }

                                if (!empty($month_plans[ $month_plan ])) {
	                                $buffy .= '<div class="td-pp-price-txt">' . number_format( $month_plans[ $month_plan ][ 'price' ], $currency_dec_no, $currency_dec_sep, $currency_th_sep ) . '</div>';

	                                if ( in_array( $currency_pos, [ 'right', 'right_space' ] ) ) {
		                                $buffy .= $currency_html;
	                                }
                                }
	                        $buffy .= '</div>';
                        }
				    }

                    $buffy .= '<div class="tds-plan-placeholder tds-pp-placeholder">' . $currency_html . '<div class="td-pp-price-txt">0</div></div>';

			    }

            $buffy .= '</div>';

		$buffy .= '</div>';


        if( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) {
            ob_start();

            ?>
            <script>
                /* global jQuery:{} */
                jQuery(window).on( 'load', function () {

                    // check for the default plan selected in the plan switcher,
                    // and set the active plan
                    var $defaultPlan = jQuery('.tds-switcher:checked'),
                        defaultPlanVal = 'year',
                        blockObj = jQuery('.<?php echo $this->block_uid ?>'),
                        planPrice = blockObj.find('.tds-show-plan-price');

                    if( $defaultPlan.length && planPrice.length ) {
                        defaultPlanVal = $defaultPlan.val();
                    }

                    tdsMain.setActivePlan(defaultPlanVal);

                });
            </script>
            <?php

            td_js_buffer::add_to_footer( "\n" . td_util::remove_script_tag( ob_get_clean() ) );
        }

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
                var $defaultPlan = jQuery('.tds-switcher:checked'),
                    defaultPlanVal = 'year',
                    blockObj = jQuery('.<?php echo $this->block_uid ?>'),
                    planPrice = blockObj.find('.tds-show-plan-price');

                if( $defaultPlan.length && planPrice.length ) {
                    defaultPlanVal = $defaultPlan.val();
                }

                tdsMain.setActivePlan(defaultPlanVal);

                // remove the empty block class, if there is any
                if( blockObj.hasClass('tdc-block-empty') ) {
                    blockObj.removeClass('tdc-block-empty');
                }

            })();


        </script>
        <?php

        return $buffy . td_util::remove_script_tag( ob_get_clean() );
    }
}
