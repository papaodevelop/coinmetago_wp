<?php
/**
 * Created by PhpStorm.
 * User: tagdiv
 * Date: 13.07.2017
 * Time: 9:38
 */

class tds_plans_switcher2 extends td_style {

    private $unique_style_class;
	private $atts = array();
	private $index_style;

	function __construct( $atts, $unique_block_class = '', $index_style = '' ) {
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
				
				/* @specific_style */
				.tds-plans-switcher2 {
				    display: flex;
				    align-items: center;
				    background-color: #2b7eff;
				    padding: 4px;
				    border-radius: 200px;
				}
				.tds-plans-switcher2 .tds-ps-label {
				    cursor: pointer;
				}
				.tds-plans-switcher2 input {
				    display: none;
				}
				.tds-plans-switcher2 .tds-ps-label-txt {
				    position: relative; 
				    display: block;
				    padding: 13px 24px 14px;
                    font-family: 'Open Sans', 'Open Sans Regular', sans-serif;
				    line-height: 1;
				    font-weight: 600;
				    text-align: center;
				    color: #fff;
				    overflow: hidden;
				    transition: color .4s ease-in-out;
				}
				.tds-plans-switcher2 .tds-ps-label-txt:before {
				    content: '';
				    position: absolute;
				    top: 0;
				    left: 0;
				    width: 100%;
				    height: 100%;
				    background-color: #fff;
				    border-radius: 200px;
				    transition: transform .4s ease-in-out;
				    z-index: -1;
				}
				.tds-plans-switcher2 .tds-ps-label-annualy .tds-ps-label-txt:before {
				    transform: translateX(100%);
				}
				.tds-plans-switcher2 .tds-ps-label-monthly .tds-ps-label-txt:before {
				    transform: translateX(-100%);
				}
                .tds-plans-switcher2 input:checked + .tds-ps-label-txt {
                    color: #000;
                }
                .tds-plans-switcher2 input:checked + .tds-ps-label-txt:before {
                    transform: translateX(0);
                }
                
                
                
                /* @padding */
                body .$unique_style_class {
                    padding: @padding;
                }
                /* @all_border */
                body .$unique_style_class {
                    border: @all_border @all_border_style @all_border_color;
                }
                /* @border_radius */
                body .$unique_style_class {
                    border-radius: @border_radius;
                }
                /* @horiz_align */
                body .$unique_block_class .tds-block-inner {
                    justify-content: @horiz_align;
                }
                
                
                /* @label_padd */
                body .$unique_style_class .tds-ps-label-txt {
                    padding: @label_padd;
                }
                /* @all_label_border */
                body .$unique_style_class .tds-ps-label-txt:before {
                    border: @all_label_border @all_label_border_style @all_label_border_color;
                }
                /* @label_border_radius */
                body .$unique_style_class .tds-ps-label-txt:before {
                    border-radius: @label_border_radius;
                }
                
                
                
                /* @bg_solid */
				body .$unique_style_class {
					background-color: @bg_solid;
				}
				/* @bg_gradient */
				body .$unique_style_class {
					@bg_gradient
				}
				
				
                /* @label_color */
				body .$unique_style_class .tds-ps-label-txt {
					color: @label_color;
				}
                /* @label_color_a */
				body .$unique_style_class input:checked + .tds-ps-label-txt {
					color: @label_color_a;
				}
				
				/* @label_bg_solid */
				body .$unique_style_class .tds-ps-label-txt:before {
					background-color: @label_bg_solid;
				}
				/* @label_bg_gradient */
				body .$unique_style_class .tds-ps-label-txt:before {
					@label_bg_gradient
				}
                
                
                /* @f_label */
                body .$unique_style_class .tds-ps-label-txt {
                    @f_label
                }

			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->atts );

        $compiled_css .= $td_css_res_compiler->compile_css();
		return $compiled_css;
	}

    /**
     * Callback pe media
     *
     * @param $responsive_context td_res_context
     * @param $atts
     */
    static function cssMedia( $res_ctx ) {

        /*-- GENERAL-- */
        $res_ctx->load_settings_raw( 'specific_style', 1 );



        /*-- LAYOUT-- */
        // switch padding
        $padding = $res_ctx->get_style_att( 'padd', __CLASS__ );
        $res_ctx->load_settings_raw( 'padding', $padding);
        if ( $padding != '' && is_numeric( $padding ) ) {
            $res_ctx->load_settings_raw('padding', $padding . 'px');
        }


        // switch border size
        $all_border = $res_ctx->get_style_att( 'all_border', __CLASS__ );
        $res_ctx->load_settings_raw( 'all_border', $all_border);
        if ( $all_border != '' && is_numeric( $all_border ) ) {
            $res_ctx->load_settings_raw( 'all_border', $all_border . 'px' );
        }

        // switch border style
        $all_border_style = $res_ctx->get_style_att( 'all_border_style', __CLASS__ );
        $res_ctx->load_settings_raw( 'all_border_style', $all_border_style);
        if ( $all_border_style == '' ) {
            $res_ctx->load_settings_raw( 'all_border_style', 'solid' );
        }

        // switch border radius
        $border_radius = $res_ctx->get_style_att( 'border_radius', __CLASS__ );
        $res_ctx->load_settings_raw( 'border_radius', $border_radius);
        if ( $border_radius != '' && is_numeric( $border_radius ) ) {
            $res_ctx->load_settings_raw( 'border_radius', $border_radius . 'px' );
        }


        // switch horizontal align
        $horiz_align = $res_ctx->get_style_att('horiz_align', __CLASS__);
        if( $horiz_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw('horiz_align', 'flex-start');
        } else if( $horiz_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw('horiz_align', 'center');
        } else if( $horiz_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw('horiz_align', 'flex-end');
        }

        // labels padding
        $label_padding = $res_ctx->get_style_att( 'label_padd', __CLASS__ );
        $res_ctx->load_settings_raw( 'label_padd', $label_padding);
        if ( $label_padding != '' && is_numeric( $label_padding ) ) {
            $res_ctx->load_settings_raw('label_padd', $label_padding . 'px');
        }


        // labels border size
        $all_label_border = $res_ctx->get_style_att( 'all_label_border', __CLASS__ );
        $res_ctx->load_settings_raw( 'all_label_border', $all_label_border);
        if ( $all_label_border != '' && is_numeric( $all_label_border ) ) {
            $res_ctx->load_settings_raw( 'all_label_border', $all_label_border . 'px' );
        }

        // labels border style
        $all_label_border_style = $res_ctx->get_style_att( 'all_label_border_style', __CLASS__ );
        $res_ctx->load_settings_raw( 'all_label_border_style', $all_label_border_style);
        if ( $all_label_border_style == '' ) {
            $res_ctx->load_settings_raw( 'all_label_border_style', 'solid' );
        }

        // labels border radius
        $label_border_radius = $res_ctx->get_style_att( 'label_border_radius', __CLASS__ );
        $res_ctx->load_settings_raw( 'label_border_radius', $label_border_radius);
        if ( $label_border_radius != '' && is_numeric( $label_border_radius ) ) {
            $res_ctx->load_settings_raw( 'label_border_radius', $label_border_radius . 'px' );
        }



        /*-- COLORS-- */
        $res_ctx->load_color_settings( 'bg_color', 'bg_solid', 'bg_gradient', '', '', __CLASS__ );

        $all_border_color = $res_ctx->get_style_att( 'all_border_color', __CLASS__ );
        $res_ctx->load_settings_raw( 'all_border_color', $all_border_color);
        if( $all_border_color == '' ) {
            $res_ctx->load_settings_raw( 'all_border_color', '#000');
        }


        $res_ctx->load_settings_raw( 'label_color', $res_ctx->get_style_att( 'label_color', __CLASS__ ));
        $res_ctx->load_settings_raw( 'label_color_a', $res_ctx->get_style_att( 'label_color_a', __CLASS__ ));

        $res_ctx->load_color_settings( 'label_bg_color', 'label_bg_solid', 'label_bg_gradient', '', '', __CLASS__ );

        $all_label_border_color = $res_ctx->get_style_att( 'all_label_border_color', __CLASS__ );
        $res_ctx->load_settings_raw( 'all_label_border_color', $all_label_border_color);
        if( $all_label_border_color == '' ) {
            $res_ctx->load_settings_raw( 'all_label_border_color', '#000');
        }



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_label', __CLASS__ );

    }

	function render( $index_style = '' ) {

		if ( ! empty( $index_style ) ) {
			$this->index_style = $index_style;
		}
        $this->unique_style_class = td_global::td_generate_unique_id();


        // default plan
        $default_plan = $this->get_att('def_plan');

        // annual plan text
        $annual_txt = $this->get_style_att('annual_txt');
        if( $annual_txt == '' ) {
            $annual_txt = 'Anually';
        }

        // annual plan text
        $monthly_txt = $this->get_style_att('monthly_txt');
        if( $monthly_txt == '' ) {
            $monthly_txt = 'Monthly';
        }


        $buffy = $this->get_style($this->get_css());

        $buffy .= '<div class="tds-plans-switcher ' . self::get_class_style( __CLASS__ ) . ' ' . $this->unique_style_class . ' td-fix-index">';

            $buffy .= '<label class="tds-ps-label tds-ps-label-annualy" for="' . self::get_class_style( __CLASS__ ) . '_annual">';
                $buffy .= '<input type="radio" class="tds-switcher" id="' . self::get_class_style( __CLASS__ ) . '_annual" name="tds_switcher" value="year" ' . ($default_plan == '' ? 'checked' : '') . '>';
                $buffy .= '<span class="tds-ps-label-txt">' . $annual_txt . '</span>';
            $buffy .= '</label>';

            $buffy .= '<label class="tds-ps-label tds-ps-label-monthly" for="' . self::get_class_style( __CLASS__ ) . '_monthly">';
                $buffy .= '<input type="radio" class="tds-switcher" id="' . self::get_class_style( __CLASS__ ) . '_monthly" name="tds_switcher" value="month" ' . ($default_plan != '' ? 'checked' : '') . '>';
                $buffy .= '<span class="tds-ps-label-txt">' . $monthly_txt . '</span>';
            $buffy .= '</label>';

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