<?php
/**
 * Created by PhpStorm.
 * User: tagdiv
 * Date: 13.07.2017
 * Time: 9:38
 */

class tds_menu_active2 extends td_style {

	private $unique_block_class;
    private $unique_style_class;
	private $atts = array();
	private $index_style;

	function __construct( $atts, $unique_block_class = '', $index_style = '') {
		$this->atts = $atts;
		$this->unique_block_class = $unique_block_class;
		$this->index_style = $index_style;
	}

	private function get_css() {

        $compiled_css = '';

        $unique_style_class = $this->unique_style_class;
        $general_block_class = (td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax()) ? '.tdc-row' : '';
        $unique_block_class = ((td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax()) ? '.tdc-row .tdc-column .' : '.') . $this->unique_block_class;


		$raw_css =
			"<style>

				/* @style_general_menu_active2 */
				$general_block_class .tds_menu_active2 .tdb-menu > li > a:after {
                  opacity: 0;
                  -webkit-transition: opacity 0.2s ease;
                  transition: opacity 0.2s ease;
                  background-color: transparent;
                  height: 100%;
                  width: 100%;
                  border: 3px solid #4db2ec;
                }
                $general_block_class .tds_menu_active2 .tdb-menu > li.current-menu-item > a:after,
                $general_block_class .tds_menu_active2 .tdb-menu > li.current-menu-ancestor > a:after,
                $general_block_class .tds_menu_active2 .tdb-menu > li.current-category-ancestor > a:after,
                $general_block_class .tds_menu_active2 .tdb-menu > li:hover > a:after,
                $general_block_class .tds_menu_active2 .tdb-menu > li.tdb-hover > a:after {
                  opacity: 1;
                }
                $general_block_class .tds_menu_active2 .tdb-menu-items-dropdown .td-subcat-more:after {
                  opacity: 0;
                  -webkit-transition: opacity 0.2s ease;
                  transition: opacity 0.2s ease;
                  background-color: transparent;
                  height: 100%;
                  width: 100%;
                  border: 3px solid #4db2ec;
                }
                $general_block_class .tds_menu_active2 .tdb-menu-items-dropdown:hover .td-subcat-more:after {
                  opacity: 1;
                }
                
                    
				
				/* @text_color_h */
				$unique_block_class .tdb-menu > li.current-menu-item > a,
				$unique_block_class .tdb-menu > li.current-menu-ancestor > a,
				$unique_block_class .tdb-menu > li.current-category-ancestor > a,
				$unique_block_class .tdb-menu > li:hover > a,
				$unique_block_class .tdb-menu > li.tdb-hover > a,
				$unique_block_class .tdb-menu-items-dropdown:hover .td-subcat-more {
					color: @text_color_h;
				}
				$unique_block_class .tdb-menu > li.current-menu-item > a .tdb-sub-menu-icon-svg svg,
				$unique_block_class .tdb-menu > li.current-menu-item > a .tdb-sub-menu-icon-svg svg *,
				$unique_block_class .tdb-menu > li.current-menu-ancestor > a .tdb-sub-menu-icon-svg svg,
				$unique_block_class .tdb-menu > li.current-menu-ancestor > a .tdb-sub-menu-icon-svg svg *,
				$unique_block_class .tdb-menu > li.current-category-ancestor > a .tdb-sub-menu-icon-svg svg,
				$unique_block_class .tdb-menu > li.current-category-ancestor > a .tdb-sub-menu-icon-svg svg *,
				$unique_block_class .tdb-menu > li:hover > a .tdb-sub-menu-icon-svg svg,
				$unique_block_class .tdb-menu > li:hover > a .tdb-sub-menu-icon-svg svg *,
				$unique_block_class .tdb-menu > li.tdb-hover > a .tdb-sub-menu-icon-svg svg,
				$unique_block_class .tdb-menu > li.tdb-hover > a .tdb-sub-menu-icon-svg svg *,
				$unique_block_class .tdb-menu-items-dropdown:hover .td-subcat-more .tdb-menu-more-icon-svg svg,
				$unique_block_class .tdb-menu-items-dropdown:hover .td-subcat-more .tdb-menu-more-icon-svg svg * {
					fill: @text_color_h;
				}
				
				/* @main_sub_color_h */
				$unique_block_class .tdb-menu > li.current-menu-item > a .tdb-sub-menu-icon,
				$unique_block_class .tdb-menu > li.current-menu-ancestor > a .tdb-sub-menu-icon,
				$unique_block_class .tdb-menu > li.current-category-ancestor > a .tdb-sub-menu-icon,
				$unique_block_class .tdb-menu > li:hover > a .tdb-sub-menu-icon,
				$unique_block_class .tdb-menu > li.tdb-hover > a .tdb-sub-menu-icon,
				$unique_block_class .tdb-menu-items-dropdown:hover .td-subcat-more .tdb-menu-more-icon {
					color: @main_sub_color_h;
				}
				$unique_block_class .tdb-menu > li.current-menu-item > a .tdb-sub-menu-icon-svg svg,
				$unique_block_class .tdb-menu > li.current-menu-item > a .tdb-sub-menu-icon-svg svg *,
				$unique_block_class .tdb-menu > li.current-menu-ancestor > a .tdb-sub-menu-icon-svg svg,
				$unique_block_class .tdb-menu > li.current-menu-ancestor > a .tdb-sub-menu-icon-svg svg *,
				$unique_block_class .tdb-menu > li.current-category-ancestor > a .tdb-sub-menu-icon-svg svg,
				$unique_block_class .tdb-menu > li.current-category-ancestor > a .tdb-sub-menu-icon-svg svg *,
				$unique_block_class .tdb-menu > li:hover > a .tdb-sub-menu-icon-svg svg,
				$unique_block_class .tdb-menu > li:hover > a .tdb-sub-menu-icon-svg svg *,
				$unique_block_class .tdb-menu > li.tdb-hover > a .tdb-sub-menu-icon-svg svg,
				$unique_block_class .tdb-menu > li.tdb-hover > a .tdb-sub-menu-icon-svg svg *,
				$unique_block_class .tdb-menu-items-dropdown:hover .td-subcat-more .tdb-menu-more-icon-svg svg,
				$unique_block_class .tdb-menu-items-dropdown:hover .td-subcat-more .tdb-menu-more-icon-svg svg * {
					fill: @main_sub_color_h;
				}
				
				/* @border_size */
				$unique_block_class .tdb-menu > li > a:after,
				$unique_block_class .tdb-menu-items-dropdown .td-subcat-more:after {
				    border-width: @border_size;
				}
				/* @border_style */
				$unique_block_class .tdb-menu > li > a:after,
				$unique_block_class .tdb-menu-items-dropdown .td-subcat-more:after {
				    border-style: @border_style;
				}
				/* @border_radius */
				$unique_block_class .tdb-menu > li > a:after,
				$unique_block_class .tdb-menu-items-dropdown .td-subcat-more:after {
				    border-radius: @border_radius;
				}
				
				/* @border_color */
				$unique_block_class .tdb-menu > li > a:after,
				$unique_block_class .tdb-menu-items-dropdown .td-subcat-more:after {
				    border-color: @border_color;
				}

			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->atts);

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

        $res_ctx->load_settings_raw( 'style_general_menu_active2', 1 );

        // text hover color
        $res_ctx->load_settings_raw( 'text_color_h', $res_ctx->get_style_att( 'text_color_h', __CLASS__ ) );

        // sub menu icon hover color
        $res_ctx->load_settings_raw( 'main_sub_color_h', $res_ctx->get_style_att( 'main_sub_color_h', __CLASS__ ) );

        // border size
        $border_size = $res_ctx->get_style_att( 'border_size', __CLASS__ );
        $res_ctx->load_settings_raw( 'border_size', $border_size );
        if( $border_size != '' && is_numeric( $border_size ) ) {
            $res_ctx->load_settings_raw( 'border_size', $border_size . 'px' );
        }

        // border style
        $border_style = $res_ctx->get_style_att( 'border_style', __CLASS__ );
        if( $border_style == '' ) {
            $res_ctx->load_settings_raw( 'border_style', 'solid' );
        } else {
            $res_ctx->load_settings_raw( 'border_style', $border_style );
        }

        // border radius
        $border_radius = $res_ctx->get_style_att( 'border_radius', __CLASS__ );
        $res_ctx->load_settings_raw( 'border_radius', $border_radius );
        if( $border_radius != '' && is_numeric( $border_radius ) ) {
            $res_ctx->load_settings_raw( 'border_radius', $border_radius . 'px' );
        }

        // border color
        $res_ctx->load_settings_raw( 'border_color', $res_ctx->get_style_att( 'border_color', __CLASS__ ) );

    }

	function render( $index_style = '' ) {
		if ( ! empty( $index_style ) ) {
			$this->index_style = $index_style;
		}
        $this->unique_style_class = td_global::td_generate_unique_id();

		$buffy = $this->get_style($this->get_css());

		return $buffy;
	}

	function get_style_att( $att_name ) {
		return $this->get_att( $att_name ,__CLASS__, $this->index_style );
	}

	function get_atts() {
		return $this->atts;
	}
}
