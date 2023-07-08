<?php
/**
 * Created by PhpStorm.
 * User: tagdiv
 * Date: 13.07.2017
 * Time: 9:38
 */

class tds_w_favorite1 extends td_style {

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

				/* @specific_style_tds_w_favorite1 */
                .tds-w-favorite1 {
                    position: relative;
                    background-color: #d1d1d1;
                    color: #000;
                    cursor: pointer;
                }
                .tds-w-favorite1 .tds-w-pf-ico {
                    transition: opacity .2s ease-in-out;
                }
                .tds-w-favorite1 .tds-w-pf-ico-full {
                    position: absolute;
                    top: 0;
                    left: 0;
                    opacity: 0;
                    visibility: hidden;
                }
                .tds-w-favorite1 i {
                    position: relative;
                    text-align: center;
                }
                .tds-w-favorite1 .tds-w-pf-ico-svg {
				    display: flex;
                    align-items: center;
                    justify-content: center;
                }
                .tds-w-favorite1 svg {
                    display: block;
                    height: auto;
                    fill: #000;
                }
                
                /* @show_full_icon */
                .tds-w-favorite1:hover .tds-w-pf-ico-empty,
                .tds-w-favorite1.tdc-favorite-selected .tds-w-pf-ico-empty {
                    opacity: 0;
                    visibility: hidden;
                }
                .tds-w-favorite1:hover .tds-w-pf-ico-full,
                .tds-w-favorite1.tdc-favorite-selected .tds-w-pf-ico-full {
                    opacity: 1;
                    visibility: visible;
                }
                
			    
			    /* @icon_size */
				body .$unique_style_class i {
				    font-size: @icon_size;
				}
                body .$unique_style_class svg {
                    width: @icon_size;
                }
				/* @icon_spacing */
				body .$unique_style_class .tds-w-pf-ico {
				    width: @icon_spacing;
				    height: @icon_spacing;
				    line-height: @icon_line_height;
				}
				/* @vert_align */
				body .$unique_style_class .tds-w-pf-ico {
				    top: @vert_align;
				}
                
			    /* @all_ico_border_size */
				body .$unique_style_class {
				    border: @all_ico_border_size @all_ico_border_style @all_ico_border_color;
				}
			    /* @ico_border_radius */
				body .$unique_style_class {
				    border-radius: @ico_border_radius;
				}
				
				
			    /* @icon_color */
				body .$unique_style_class {
				    color: @icon_color;
				}
				body .$unique_style_class svg {
				    fill: @icon_color;
				}
			    /* @icon_color_h */
				body .$unique_style_class:hover {
				    color: @icon_color_h;
				}
				body .$unique_style_class:hover svg {
				    fill: @icon_color_h;
				}
				
			    /* @icon_bg */
				body .$unique_style_class {
				    background-color: @icon_bg;
				}
			    /* @icon_bg_h */
				body .$unique_style_class:hover {
				    background-color: @icon_bg_h;
				}
			    /* @ico_border_color_h */
				body .$unique_style_class:hover {
				    border-color: @ico_border_color_h;
				}
				
			    /* @ico_shadow */
				body .$unique_style_class {
				    box-shadow: @ico_shadow;
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
        $res_ctx->load_settings_raw( 'specific_style_tds_w_favorite1', 1 );

        if( $res_ctx->get_shortcode_att('tdicon_added') != '' ) {
            $res_ctx->load_settings_raw( 'show_full_icon', 1 );
        }



        /*-- LAYOUT -- */
        // icon size
        $res_ctx->load_settings_raw( 'icon_size', $res_ctx->get_style_att( 'icon_size', __CLASS__ ) . 'px' );

        // icon spacing
        $icon_spacing = $res_ctx->get_style_att( 'icon_size', __CLASS__ ) * $res_ctx->get_style_att( 'icon_spacing', __CLASS__ ) + intval($res_ctx->get_style_att( 'all_ico_border_size', __CLASS__ ) ) * 2 . 'px';
        $res_ctx->load_settings_raw('icon_spacing', $icon_spacing);

        // icon line height
        $res_ctx->load_settings_raw( 'icon_line_height', $res_ctx->get_style_att( 'icon_size', __CLASS__ ) * $res_ctx->get_style_att( 'icon_spacing', __CLASS__ ) . 'px' );

        // icon vertical align
        $res_ctx->load_settings_raw( 'vert_align', $res_ctx->get_style_att( 'vert_align', __CLASS__ ) . 'px' );

        // icon border size
        $all_ico_border_size = $res_ctx->get_style_att( 'all_ico_border_size', __CLASS__ );
        $res_ctx->load_settings_raw( 'all_ico_border_size', $all_ico_border_size );
        if( $all_ico_border_size != '' && is_numeric( $all_ico_border_size ) ) {
            $res_ctx->load_settings_raw( 'all_ico_border_size', $all_ico_border_size . 'px' );
        }

        // icon border style
        $all_ico_border_style = $res_ctx->get_style_att( 'all_ico_border_style', __CLASS__ );
        if( $all_ico_border_style == '' ) {
            $res_ctx->load_settings_raw( 'all_ico_border_style', 'solid' );
        } else {
            $res_ctx->load_settings_raw( 'all_ico_border_style', $all_ico_border_style );
        }

        // icon border radius
        $ico_border_radius = $res_ctx->get_style_att( 'ico_border_radius', __CLASS__ );
        $res_ctx->load_settings_raw( 'ico_border_radius', $ico_border_radius );
        if( $ico_border_radius == '' ) {
            $res_ctx->load_settings_raw( 'ico_border_radius', '100%' );
        } else {
            if( is_numeric( $ico_border_radius ) ) {
                $res_ctx->load_settings_raw( 'ico_border_radius', $ico_border_radius . 'px' );
            }
        }



        /*-- COLORS -- */
        $res_ctx->load_settings_raw( 'icon_color', $res_ctx->get_style_att( 'icon_color', __CLASS__ ));
        $res_ctx->load_settings_raw( 'icon_color_h', $res_ctx->get_style_att( 'icon_color_h', __CLASS__ ));
        $res_ctx->load_settings_raw( 'icon_bg', $res_ctx->get_style_att( 'icon_bg', __CLASS__ ));
        $res_ctx->load_settings_raw( 'icon_bg_h', $res_ctx->get_style_att( 'icon_bg_h', __CLASS__ ));
        $all_ico_border_color = $res_ctx->get_style_att( 'all_ico_border_color', __CLASS__ );
        if( $all_ico_border_color == '' ) {
            $res_ctx->load_settings_raw( 'all_ico_border_color', '#000' );
        } else {
            $res_ctx->load_settings_raw( 'all_ico_border_color', $all_ico_border_color );
        }
        $res_ctx->load_settings_raw( 'ico_border_color_h', $res_ctx->get_style_att( 'ico_border_color_h', __CLASS__ ));
        $res_ctx->load_shadow_settings( 0, 0, 0, 0, 'rgba(0, 0, 0, .2)', 'ico_shadow', __CLASS__ );

    }

	function render( $index_style = '', $product_id = '' ) {

		if ( ! empty( $index_style ) ) {
			$this->index_style = $index_style;
		}
        $this->unique_style_class = td_global::td_generate_unique_id();


        // icons
        $tdicon = $this->get_icon_att('tdicon');
        $tdicon_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $tdicon_data = 'data-td-svg-icon="' . $this->get_att('tdicon') . '"';
        }
        $tdicon_svg = '';
        if( base64_encode( base64_decode( $tdicon ) ) == $tdicon ) {
            $tdicon_svg = base64_decode( $tdicon );
        }

        $tdicon_added = $this->get_icon_att('tdicon_added');
        $tdicon_added_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $tdicon_added_data = 'data-td-svg-icon="' . $this->get_att('tdicon_added') . '"';
        }
        $tdicon_added_svg = '';
        if( base64_encode( base64_decode( $tdicon_added ) ) == $tdicon_added ) {
            $tdicon_added_svg = base64_decode( $tdicon_added );
        }


        $buffy = $this->get_style($this->get_css());

        $buffy .= '<div class="tds-w-pf-icos-wrap ' . self::get_class_style( __CLASS__ ) . ' ' . $this->unique_style_class . ' ' . ( td_woo_util::is_product_favourite($product_id) ? 'tdc-favorite-selected' : '' ) . ' tdc-favorite td-fix-index" data-prod-id="' . $product_id . '">';

            if( $tdicon_svg != '' ) {
                $buffy .= '<div class="tds-w-pf-ico tds-w-pf-ico-svg tds-w-pf-ico-empty" ' . $tdicon_data . '>' . $tdicon_svg . '</div>';
            } else {
                if( $tdicon != '' ) {
                    $buffy .= '<i class="tds-w-pf-ico tds-w-pf-ico-empty '. $tdicon . '"></i>';
                }
            }

            if( $tdicon_added_svg != '' ) {
                $buffy .= '<div class="tds-w-pf-ico tds-w-pf-ico-svg tds-w-pf-ico-full" ' . $tdicon_added_data . '>' . $tdicon_added_svg . '</div>';
            } else {
                if( $tdicon_added != '' ) {
                    $buffy .= '<i class="tds-w-pf-ico tds-w-pf-ico-full '. $tdicon_added . '"></i>';
                }
            }

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