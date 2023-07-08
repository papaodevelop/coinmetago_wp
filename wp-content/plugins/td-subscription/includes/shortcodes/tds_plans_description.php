<?php

/**
 * Class tds_plans_description
 */

class tds_plans_description extends td_block {

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

                /* @style_general_tds_plans_description */
                .tds_plans_description {
                    margin-bottom: 0;
                    vertical-align: top;
                }
                .tds_plans_description .tds-block-inner {
                    display: flex;
                }
                .tds_plans_description .tds-plan-desc,
                .tds_plans_description .tds-pd-placeholder {
                    font-family: 'Open Sans', 'Open Sans Regular', sans-serif;
                    font-size: 16px;
                    line-height: 28px;
                }
                .tds_plans_description .tds-plan-desc {
                    -webkit-transform: translateZ(0);
                    transform: translateZ(0);
                    width: 100%;
                    color: #666;
                }
                .tds_plans_description .tds-show-plan-desc {
                    display: none;
                }
                .tds_plans_description .tds-show-plan-visible {
                    display: block;
                }
                .tds_plans_description .tds-pd-placeholder {
                    width: 0;
                    overflow: hidden;
                    white-space: nowrap;
                }
                
                /* @style_general_tds_plans_description_composer */
                .tds_plans_description .tds-pd-placeholder.tds-plan-placeholder-visible {
                    width: auto;
                    overflow: visible;
                }
                
                
                
                /* @inline */
                body .$unique_block_class {
                    display: inline-block;
                }
                
                /* @vert_align */
                body .$unique_block_class {
                    vertical-align: @vert_align;
                }
                
                /* @horiz_align */
                body .$unique_block_class .tds-plan-desc,
                body .$unique_block_class .tds-pd-placeholder {
                    text-align: @horiz_align;
                }
                
                
                
                /* @color */
                body .$unique_block_class .tds-plan-desc,
                body .$unique_block_class .tds-pd-placeholder {
                    color: @color;
                }
                
                /* @links_color */
                body .$unique_block_class .tds-plan-desc a {
                    color: @links_color;
                }
                /* @links_color_h */
                body .$unique_block_class .tds-plan-desc a:hover {
                    color: @links_color_h;
                }
                
                
                
                /* @f_descr */
                body .$unique_block_class .tds-plan-desc,
                body .$unique_block_class .tds-pd-placeholder {
                    @f_descr
                }

            </style>";

		$td_css_res_compiler = new td_css_res_compiler( $raw_css );
		$td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

		$compiled_css .= $td_css_res_compiler->compile_css();

		return $compiled_css;

	}

	static function cssMedia( $res_ctx ) {

        /*-- GENERAL STYLES -- */
        $res_ctx->load_settings_raw( 'style_general_tds_plans_description', 1 );

        if( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) {
            $res_ctx->load_settings_raw( 'style_general_tds_plans_description_composer', 1 );
        }



        /*-- LAYOUT -- */
        // display inline
        $res_ctx->load_settings_raw( 'inline', $res_ctx->get_shortcode_att('inline') );

        // vertical align
        $res_ctx->load_settings_raw('vert_align', $res_ctx->get_shortcode_att('vert_align'));

        // horizontal align
        $horiz_align = $res_ctx->get_shortcode_att('horiz_align');
        if( $horiz_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw('horiz_align', 'left');
        } else if( $horiz_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw('horiz_align', 'center');
        } else if( $horiz_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw('horiz_align', 'right');
        }



        /*-- COLORS -- */
        $res_ctx->load_settings_raw( 'color', $res_ctx->get_shortcode_att('color') );
        $res_ctx->load_settings_raw( 'links_color', $res_ctx->get_shortcode_att('links_color') );
        $res_ctx->load_settings_raw( 'links_color_h', $res_ctx->get_shortcode_att('links_color_h') );



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_descr' );

	}

	function __construct() {
		parent::disable_loop_block_features();
	}

	function render( $atts, $content = null ) {

        parent::render( $atts );


        // free plan description
        $free_descr = rawurldecode( base64_decode( strip_tags( $this->get_att('free_plan_desc' ) ) ) );
        $def_type_from_block_data = 'data-type-from-block="';
        if( !empty( $free_descr ) ) {
            $def_type_from_block_data .= 'free';
        }
        $def_type_from_block_data .= '"';

        // annual plan description
        $annual_descr = rawurldecode( base64_decode( strip_tags( $this->get_att('year_plan_desc' ) ) ) );

        // monthly plan description
        $monthly_descr = rawurldecode( base64_decode( strip_tags( $this->get_att('month_plan_desc' ) ) ) );

        // remove top border on Newsmag
        $block_classes = str_replace('td-pb-border-top', '', $this->get_block_classes());

        $buffy = '<div class="' . $block_classes . '" ' . $this->get_block_html_atts() . ' ' . $def_type_from_block_data . '>';

			$buffy .= $this->get_block_css(); // get block css
			$buffy .= $this->get_block_js(); // get block js


            $buffy .= '<div class="tds-block-inner td-fix-index">';

                if( $free_descr != '' ) {
                    $buffy .= '<div class="tds-plan-desc" data-type="year">';
                        $buffy .= $free_descr;
                    $buffy .= '</div>';
                } else {
                    if ( $annual_descr != '' ) {
                        $buffy .= '<div class="tds-plan-desc tds-show-plan-desc" data-type="year">';
                            $buffy .= $annual_descr;
                        $buffy .= '</div>';
                    }

                    if ( $monthly_descr != '' ) {
                        $buffy .= '<div class="tds-plan-desc tds-show-plan-desc" data-type="month">';
                            $buffy .= $monthly_descr;
                        $buffy .= '</div>';
                    }

                    $buffy .= '<div class="tds-plan-placeholder tds-pd-placeholder">placeholder text</div>';
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
                        planDescr = blockObj.find('.tds-show-plan-desc');

                    if( $defaultPlan.length && planDescr.length ) {
                        defaultPlanVal = $defaultPlan.val();
                    }

                    // set the active plan
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
                    planDescr = blockObj.find('.tds-show-plan-desc');

                if( $defaultPlan.length && planDescr.length ) {
                    defaultPlanVal = $defaultPlan.val();
                }

                // set the active plan
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
