<?php
/**
 * Created by PhpStorm.
 * User: tagdiv
 * Date: 13.07.2017
 * Time: 9:38
 */

class tds_plans_switcher1 extends td_style {

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
                .tds-plans-switcher1 .tds-ps-switch-wrap {
                    position: relative;
                    display: flex;
                    align-items: center;
                }
				.tds-plans-switcher1 input {
				    position: absolute;
				    top: 0;
				    left: 0;
				    width: 100%;
				    height: 100%;
				    z-index: 10;
				    opacity: 0;
				    cursor: pointer;
				}
				.tds-plans-switcher1 .tds-ps-label {
				    font-family: 'Open Sans', 'Open Sans Regular', sans-serif;
				    font-size: 14px;
				    line-height: 1.3;
				    font-weight: 600;
				    color: #888;
				    transition: color .4s;
				    z-index: 100;
				}
				.tds-plans-switcher1 .tds-ps-label:empty {
				    display: none;
				}
				.tds-plans-switcher1 .tds-ps-label-annually {
				    padding-right: 12px;
				}
				.tds-plans-switcher1 .tds-ps-label-monthly {
				    padding-left: 12px;
				}
				.tds-plans-switcher1 .tds-ps-switch {
				    position: relative;
				    background-color: #2b7eff;
                    width: 3.286em;
                    height: 1.857em;
                    font-size: 14px;
                    border-radius: 100px;
                    cursor: pointer;
                    transition: all .4s ease-in-out;
                    -webkit-box-sizing: content-box;
                    -moz-box-sizing: content-box;
                    box-sizing: content-box;
				}
				.tds-plans-switcher1 .tds-ps-switch:after {
				    content: '';
				    position: absolute;
                    left: 0.214em;
                    bottom: 0.214em;
                    height: 1.429em;
                    width: 1.429em;
                    background-color: white;
                    border-radius: 100%;
                    transition: all .4s;
				}
				.tds-plans-switcher1 .tds-switcher-annually:checked + .tds-switcher-monthly {
				    display: block;
				}
				.tds-plans-switcher1 .tds-switcher-annually:checked + .tds-switcher-monthly + .tds-ps-label-annually + .tds-ps-switch:after {
                    transform: translateX(0);
				}
				.tds-plans-switcher1 .tds-switcher-annually:checked + .tds-switcher-monthly + .tds-ps-label-annually {
				    color: #111;
				}
				.tds-plans-switcher1 .tds-switcher-monthly:checked {
				    display: none;
				}
				.tds-plans-switcher1 .tds-switcher-monthly:checked + .tds-ps-label-annually + .tds-ps-switch:after {
                    transform: translateX(1.429em);
				}
				.tds-plans-switcher1 .tds-switcher-monthly:checked + .tds-ps-label-annually + .tds-ps-switch + .tds-ps-label-monthly {
				    color: #111;
				}
				
				
				
                /* @horiz_align */
                body .$unique_block_class .tds-block-inner {
                    justify-content: @horiz_align;
                }
                
                
                /* @switch_size */
                body .$unique_style_class .tds-ps-switch {
                    font-size: @switch_size;
                }                
                
                /* @all_border */
                body .$unique_style_class .tds-ps-switch {
                    border: @all_border @all_border_style @all_border_color;
                }
                /* @border_radius */
                body .$unique_style_class .tds-ps-switch {
                    border-radius: @border_radius;
                }
                
                
                /* @all_dot_border */
                body .$unique_style_class .tds-ps-switch:after {
                    border: @all_dot_border @all_dot_border_style @all_dot_border_color;
                }
                /* @dot_border_radius */
                body .$unique_style_class .tds-ps-switch:after {
                    border-radius: @dot_border_radius;
                }
                
                
                /* @label_space */
                body .$unique_style_class .tds-ps-label-annually {
                    padding-right: @label_space;
                }
                body .$unique_style_class .tds-ps-label-monthly {
                    padding-left: @label_space;
                }
                
                
                
                /* @bg_solid */
				body .$unique_style_class .tds-ps-switch {
					background-color: @bg_solid;
				}
				/* @bg_gradient */
				body .$unique_style_class .tds-ps-switch {
					@bg_gradient
				}
				
                
                /* @dot_bg_solid */
				body .$unique_style_class .tds-ps-switch:after {
					background-color: @dot_bg_solid;
				}
				/* @dot_bg_gradient */
				body .$unique_style_class .tds-ps-switch:after {
					@dot_bg_gradient
				}
				
				/* @dot_shadow */
				body .$unique_style_class .tds-ps-switch:after {
					box-shadow: @dot_shadow;
				}
				
				
                /* @label_color */
				body .$unique_style_class .tds-ps-label {
					color: @label_color;
				}
                /* @label_color_a */
				body .$unique_style_class .tds-switcher-annually:checked + .tds-switcher-monthly + .tds-ps-label-annually,
				body .$unique_style_class .tds-switcher-monthly:checked + .tds-ps-label-annually + .tds-ps-switch + .tds-ps-label-monthly {
					color: @label_color_a;
				}
                
                
                /* @f_label */
                body .$unique_style_class .tds-ps-label {
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



        /*-- LAYOUT -- */
        // horizontal align
        $horiz_align = $res_ctx->get_style_att('horiz_align', __CLASS__);
        if( $horiz_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw('horiz_align', 'flex-start');
        } else if( $horiz_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw('horiz_align', 'center');
        } else if( $horiz_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw('horiz_align', 'flex-end');
        }


        // switch size
        $switch_size = $res_ctx->get_style_att( 'switch_size', __CLASS__ );
        if( $switch_size == '1' ) {
            $res_ctx->load_settings_raw( 'switch_size', '11px' );
        } else if( $switch_size == '2' ) {
            $res_ctx->load_settings_raw( 'switch_size', '14px' );
        } else if( $switch_size == '3' ) {
            $res_ctx->load_settings_raw( 'switch_size', '17px' );
        } else if( $switch_size == '4' ) {
            $res_ctx->load_settings_raw( 'switch_size', '19px' );
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


        // dot border size
        $all_dot_border = $res_ctx->get_style_att( 'all_dot_border', __CLASS__ );
        $res_ctx->load_settings_raw( 'all_dot_border', $all_dot_border);
        if ( $all_dot_border != '' && is_numeric( $all_dot_border ) ) {
            $res_ctx->load_settings_raw( 'all_dot_border', $all_dot_border . 'px' );
        }

        // dot border style
        $all_dot_border_style = $res_ctx->get_style_att( 'all_dot_border_style', __CLASS__ );
        $res_ctx->load_settings_raw( 'all_dot_border_style', $all_dot_border_style);
        if ( $all_dot_border_style == '' ) {
            $res_ctx->load_settings_raw( 'all_dot_border_style', 'solid' );
        }

        // dot border radius
        $dot_border_radius = $res_ctx->get_style_att( 'dot_border_radius', __CLASS__ );
        $res_ctx->load_settings_raw( 'dot_border_radius', $dot_border_radius);
        if ( $dot_border_radius != '' && is_numeric( $dot_border_radius ) ) {
            $res_ctx->load_settings_raw( 'dot_border_radius', $dot_border_radius . 'px' );
        }


        // labels space
        $label_space = $res_ctx->get_style_att( 'label_space', __CLASS__ );
        $res_ctx->load_settings_raw( 'label_space', $label_space);
        if ( $label_space != '' && is_numeric( $label_space ) ) {
            $res_ctx->load_settings_raw( 'label_space', $label_space . 'px' );
        }



        /*-- COLORS -- */
        $res_ctx->load_color_settings( 'bg_color', 'bg_solid', 'bg_gradient', '', '', __CLASS__ );

        $all_border_color = $res_ctx->get_style_att( 'all_border_color', __CLASS__ );
        $res_ctx->load_settings_raw( 'all_border_color', $all_border_color);
        if( $all_border_color == '' ) {
            $res_ctx->load_settings_raw( 'all_border_color', '#000');
        }

        $res_ctx->load_color_settings( 'dot_bg_color', 'dot_bg_solid', 'dot_bg_gradient', '', '', __CLASS__ );

        $all_dot_border_color = $res_ctx->get_style_att( 'all_dot_border_color', __CLASS__ );
        $res_ctx->load_settings_raw( 'all_dot_border_color', $all_dot_border_color);
        if( $all_dot_border_color == '' ) {
            $res_ctx->load_settings_raw( 'all_dot_border_color', '#000');
        }

        $res_ctx->load_shadow_settings( 3, 0, 1, 0, 'rgba(0, 0, 0, .3)', 'dot_shadow', __CLASS__ );

        $res_ctx->load_settings_raw( 'label_color', $res_ctx->get_style_att( 'label_color', __CLASS__ ));
        $res_ctx->load_settings_raw( 'label_color_a', $res_ctx->get_style_att( 'label_color_a', __CLASS__ ));



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

        // monthly plan text
        $monthly_txt = $this->get_style_att('monthly_txt');


        $buffy = $this->get_style($this->get_css());

        $buffy .= '<div class="tds-plans-switcher ' . self::get_class_style( __CLASS__ ) . ' ' . $this->unique_style_class . ' td-fix-index">';

            $buffy .= '<div class="tds-ps-switch-wrap">';
                $buffy .= '<input type="radio" class="tds-switcher tds-switcher-annually" id="tds-switcher-' . $this->unique_style_class . '-annual" name="tds_switcher" value="year" ' . ($default_plan == '' ? 'checked' : '') . '>';
                $buffy .= '<input type="radio" class="tds-switcher tds-switcher-monthly" id="tds-switcher-' . $this->unique_style_class . '-monthly" name="tds_switcher" value="month" ' . ($default_plan != '' ? 'checked' : '') . '>';

                $buffy .= '<div class="tds-ps-label tds-ps-label-annually">' . $annual_txt . '</div>';
                $buffy .= '<div class="tds-ps-switch"></div>';
                $buffy .= '<div class="tds-ps-label tds-ps-label-monthly">' . $monthly_txt . '</div>';
            $buffy .= '</div>';

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