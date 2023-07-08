<?php
/**
 * Created by PhpStorm.
 * User: tagdiv
 * Date: 13.07.2017
 * Time: 9:38
 */

class tds_w_favorite2 extends td_style {

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
                .tds-w-favorite2 {
                    display: flex;
                    align-items: center;
                    position: relative;
                    background-color: #000;
                    padding: 10px 15px;
                    font-size: 13px;
                    line-height: 1.3;
                    color: #fff;
                    cursor: pointer;
                }
                .tds-w-favorite2:hover {
                    background-color: #4db2ec;
                }
                .tds-w-favorite2 .tds-w-pf-icos-wrap {
                    position: relative;
                }
                .tds-w-favorite2 .tds-w-pf-ico {
                    position: relative;
                    transition: opacity .2s ease-in-out;
                }
                .tds-w-favorite2 .tds-w-pf-ico-full {
                    position: absolute;
                    top: 0;
                    left: 0;
                    opacity: 0;
                    visibility: hidden;
                }
                .tds-w-favorite2 svg {
                    display: block;
                    height: auto;
                    fill: #fff;
                }
                .tds-w-favorite2 .tds-w-pf-txt-full {
                    display: none;
                }
                
                /* @show_full_text */
                .tds-w-favorite2.tdc-favorite-selected .tds-w-pf-txt-empty {
                    display: none;
                }
                .tds-w-favorite2.tdc-favorite-selected .tds-w-pf-txt-full {
                    display: block;
                }
                
                /* @show_full_icon */
                .tds-w-favorite2:hover .tds-w-pf-ico-empty,
                .tds-w-favorite2.tdc-favorite-selected .tds-w-pf-ico-empty {
                    opacity: 0;
                    visibility: hidden;
                }
                .tds-w-favorite2:hover .tds-w-pf-ico-full,
                .tds-w-favorite2.tdc-favorite-selected .tds-w-pf-ico-full {
                    opacity: 1;
                    visibility: visible;
                }
                
			    
			    /* @min_width */
			    body .$unique_style_class {
                    min-width: @min_width;
                }
			    /* @padding */
                body .$unique_style_class {
                    padding: @padding;
                }
			    /* @btn_horiz_align */
                body .$unique_style_class {
                    justify-content: @btn_horiz_align;
                }
			    /* @all_border_size */
                body .$unique_style_class {
                    border: @all_border_size @all_border_style @all_border_color;
                }
			    /* @border_radius */
                body .$unique_style_class {
                    border-radius: @border_radius;
                }
			    
			    /* @icon_size */
				body .$unique_style_class i {
				    font-size: @icon_size;
				}
                body .$unique_style_class svg {
                    width: @icon_size;
                }
				/* @txt_space_left */
				body .$unique_style_class .tds-w-pf-txts-wrap {
				    margin-left: @txt_space_left;
				}
				/* @txt_space_right */
				body .$unique_style_class .tds-w-pf-txts-wrap {
				    margin-right: @txt_space_right;
				}
				/* @vert_align */
				body .$unique_style_class .tds-w-pf-ico {
				    top: @vert_align;
				}
				
				
				/* @bg */
				body .$unique_style_class {
				    background-color: @bg;
				}
				/* @bg_h */
				body .$unique_style_class:hover {
				    background-color: @bg_h;
				}
				/* @border_color_h */
				body .$unique_style_class:hover {
				    border-color: @border_color_h;
				}
				/* @shadow */
				body .$unique_style_class {
				    box-shadow: @shadow;
				}
				
				/* @txt_color */
				body .$unique_style_class {
				    color: @txt_color;
				}
				body .$unique_style_class svg {
				    fill: @txt_color;
				}
				/* @txt_color_h */
				body .$unique_style_class:hover {
				    color: @txt_color_h;
				}
				body .$unique_style_class:hover svg {
				    fill: @txt_color_h;
				}
								
			    /* @icon_color */
				body .$unique_style_class i {
				    color: @icon_color;
				}
				body .$unique_style_class svg {
				    fill: @icon_color;
				}
			    /* @icon_color_h */
				body .$unique_style_class:hover i {
				    color: @icon_color_h;
				}
				body .$unique_style_class:hover svg {
				    fill: @icon_color_h;
				}
				
				
				/* @f_txt */
				body .$unique_style_class {
				    @f_txt
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

        if( $res_ctx->get_style_att('text_added', __CLASS__) != '' ) {
            $res_ctx->load_settings_raw( 'show_full_text', 1 );
        }

        if( $res_ctx->get_shortcode_att('tdicon_added') != '' ) {
            $res_ctx->load_settings_raw( 'show_full_icon', 1 );
        }



        /*-- LAYOUT -- */
        // min width
        $min_width = $res_ctx->get_style_att( 'min_width', __CLASS__ );
        $res_ctx->load_settings_raw( 'min_width', $min_width );
        if( $min_width != '' && is_numeric( $min_width ) ) {
            $res_ctx->load_settings_raw( 'min_width', $min_width . 'px' );
        }

        // padding
        $padding = $res_ctx->get_style_att( 'padding', __CLASS__ );
        $res_ctx->load_settings_raw( 'padding', $padding );
        if( $padding != '' && is_numeric( $padding ) ) {
            $res_ctx->load_settings_raw( 'padding', $padding . 'px' );
        }

        // horizontal align
        $btn_horiz_align = $res_ctx->get_style_att('btn_horiz_align', __CLASS__);
        if( $btn_horiz_align == '' || $btn_horiz_align == 'content-btn_horiz_align-left' ) {
            $res_ctx->load_settings_raw('btn_horiz_align', 'flex-start');
        } else if( $btn_horiz_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw('btn_horiz_align', 'center');
        } else if( $btn_horiz_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw('btn_horiz_align', 'flex-end');
        }

        // border size
        $all_border_size = $res_ctx->get_style_att( 'all_border_size', __CLASS__ );
        $res_ctx->load_settings_raw( 'all_border_size', $all_border_size );
        if( $all_border_size != '' && is_numeric( $all_border_size ) ) {
            $res_ctx->load_settings_raw( 'all_border_size', $all_border_size . 'px' );
        }

        // border style
        $all_border_style = $res_ctx->get_style_att( 'all_border_style', __CLASS__ );
        if( $all_border_style == '' ) {
            $res_ctx->load_settings_raw( 'all_border_style', 'solid' );
        } else {
            $res_ctx->load_settings_raw( 'all_border_style', $all_border_style );
        }

        // border radius
        $border_radius = $res_ctx->get_style_att( 'border_radius', __CLASS__ );
        $res_ctx->load_settings_raw( 'border_radius', $border_radius );
        if( $border_radius != '' && is_numeric( $border_radius ) ) {
            $res_ctx->load_settings_raw( 'border_radius', $border_radius . 'px' );
        }


        // icon size
        $res_ctx->load_settings_raw( 'icon_size', $res_ctx->get_style_att( 'icon_size', __CLASS__ ) . 'px' );

        // icon space
        $icon_pos = $res_ctx->get_style_att('icon_pos', __CLASS__);
        $icon_space = $res_ctx->get_style_att('icon_space', __CLASS__);
        if( $icon_pos == '' ) {
            $res_ctx->load_settings_raw( 'txt_space_left', $icon_space );
            if( $icon_space == '' ) {
                $res_ctx->load_settings_raw( 'txt_space_left', '10px' );
            } else {
                if( is_numeric($icon_space) ) {
                    $res_ctx->load_settings_raw( 'txt_space_left', $icon_space . 'px' );
                }
            }
        } else {
            $res_ctx->load_settings_raw( 'txt_space_right', $icon_space );
            if( $icon_space == '' ) {
                $res_ctx->load_settings_raw( 'txt_space_right', '10px' );
            } else {
                if( is_numeric($icon_space) ) {
                    $res_ctx->load_settings_raw( 'txt_space_right', $icon_space . 'px' );
                }
            }
        }

        // icon vertical align
        $res_ctx->load_settings_raw( 'vert_align', $res_ctx->get_style_att( 'vert_align', __CLASS__ ) . 'px' );



        /*-- COLORS -- */
        $res_ctx->load_settings_raw( 'bg', $res_ctx->get_style_att( 'bg', __CLASS__ ));
        $res_ctx->load_settings_raw( 'bg_h', $res_ctx->get_style_att( 'bg_h', __CLASS__ ));
        $all_border_color = $res_ctx->get_style_att( 'all_border_color', __CLASS__ );
        if( $all_border_color == '' ) {
            $res_ctx->load_settings_raw( 'all_border_color', '#000' );
        } else {
            $res_ctx->load_settings_raw( 'all_border_color', $all_border_color );
        }
        $res_ctx->load_settings_raw( 'border_color_h', $res_ctx->get_style_att( 'border_color_h', __CLASS__ ));
        $res_ctx->load_shadow_settings( 0, 0, 0, 0, 'rgba(0, 0, 0, .2)', 'shadow', __CLASS__ );

        $res_ctx->load_settings_raw( 'icon_color', $res_ctx->get_style_att( 'icon_color', __CLASS__ ));
        $res_ctx->load_settings_raw( 'icon_color_h', $res_ctx->get_style_att( 'icon_color_h', __CLASS__ ));

        $res_ctx->load_settings_raw( 'txt_color', $res_ctx->get_style_att( 'txt_color', __CLASS__ ));
        $res_ctx->load_settings_raw( 'txt_color_h', $res_ctx->get_style_att( 'txt_color_h', __CLASS__ ));



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_txt', __CLASS__ );

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

        // icon position
        $icon_pos = $this->get_style_att('icon_pos', __CLASS__);


        // texts
        $txt_init = $this->get_style_att('text_init', __CLASS__);
        $txt_added = $this->get_style_att('text_added', __CLASS__);

        $texts_html_buffy = '';
        if( $txt_init != '' || $txt_added != '' ) {
            $texts_html_buffy .= '<div class="tds-w-pf-txts-wrap">';
                if ( $txt_init != '' ) {
                    $texts_html_buffy .= '<div class="tds-w-pf-txt tds-w-pf-txt-empty">' . $txt_init . '</div>';
                }
                if ( $txt_added != '' ) {
                    $texts_html_buffy .= '<div class="tds-w-pf-txt tds-w-pf-txt-full">' . $txt_added . '</div>';
                }
            $texts_html_buffy .= '</div>';
        }

        $buffy = $this->get_style($this->get_css());

        $buffy .= '<div class="' . self::get_class_style( __CLASS__ ) . ' ' . $this->unique_style_class . ' ' . ( td_woo_util::is_product_favourite($product_id) ? 'tdc-favorite-selected' : '' ) . ' tdc-favorite td-fix-index" data-prod-id="' . $product_id . '">';

            if( $icon_pos == 'after' ) {
                $buffy .= $texts_html_buffy;
            }

            $buffy .= '<div class="tds-w-pf-icos-wrap">';
                if( $tdicon_svg != '' ) {
                    $buffy .= '<div class="tds-w-pf-ico tds-w-pf-ico-svg tds-w-pf-ico-empty" ' . $tdicon_data . '>' . $tdicon_svg . '</div>';
                } else {
                    $buffy .= '<i class="tds-w-pf-ico tds-w-pf-ico-empty '. $tdicon . '"></i>';
                }

                if( $tdicon_added_svg != '' ) {
                    $buffy .= '<div class="tds-w-pf-ico tds-w-pf-ico-svg tds-w-pf-ico-full" ' . $tdicon_added_data . '>' . $tdicon_added_svg . '</div>';
                } else {
                    $buffy .= '<i class="tds-w-pf-ico tds-w-pf-ico-full '. $tdicon_added . '"></i>';
                }
            $buffy .= '</div>';

            if( $icon_pos == '' ) {
                $buffy .= $texts_html_buffy;
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