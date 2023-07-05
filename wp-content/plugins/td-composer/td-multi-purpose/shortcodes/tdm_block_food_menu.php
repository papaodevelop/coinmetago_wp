<?php
/**
 * Created by PhpStorm.
 * User: tagdiv
 * Date: 07.09.2017
 * Time: 14:20
 */

class tdm_block_food_menu extends td_block {

    protected $shortcode_atts = array(); //the atts used for rendering the current block

    public function get_custom_css() {
        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
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

        $raw_css =
            "<style>
                
                /* @style_general_food_menu */
				.tdm_block_food_menu .tdm-food-menu-wrap {
                  display: table;
                  width: 100%;
                }
                .tdm_block_food_menu .tdm-food-menu-wrap:after {
                  content: '';
                  display: table;
                  clear: both;
                }
                .tdm_block_food_menu .tdm-food-menu-image {
                  background-repeat: no-repeat;
                  background-size: cover;
                  background-position: center center;
                }
                .tdm_block_food_menu .tdm-food-menu-details {
                  display: table-cell;
                }
                .tdm_block_food_menu .tdm-title,
                .tdm_block_food_menu .tdm-food-menu-price {
                  display: inline-block;
                }
                .tdm_block_food_menu .tdm-food-menu-title-wrap {
                  margin: -1px 0 3px;
                }
                .tdm_block_food_menu .tdm-title {
                  width: 80%;
                  margin: 0;
                  font-size: 20px;
                  line-height: 20px;
                }
                @media (max-width: 767px) {
                  .tdm_block_food_menu .tdm-title {
                    font-size: 18px;
                    line-height: 18px;
                  }
                }
                .tdm_block_food_menu .tdm-food-menu-price {
                  width: 20%;
                  font-family: Verdana, BlinkMacSystemFont, -apple-system, \"Segoe UI\", Roboto, Oxygen, Ubuntu, Cantarell, \"Open Sans\", \"Helvetica Neue\", sans-serif;
                  font-size: 16px;
                  font-weight: 600;
                  text-align: right;
                }
                @media (max-width: 767px) {
                  .tdm_block_food_menu .tdm-food-menu-price {
                    font-size: 15px;
                  }
                }
                .tdm_block_food_menu .tdm-descr {
                  margin-bottom: 0;
                  font-size: 14px;
                  line-height: 20px;
                  color: #a5a5a5;
                }

				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {
        $res_ctx->load_settings_raw( 'style_general_food_menu', 1 );
    }

	function render($atts, $content = null) {
		parent::render($atts);

		$this->shortcode_atts = shortcode_atts(
			array_merge(
				td_api_multi_purpose::get_mapped_atts( __CLASS__ ),
				td_api_style::get_style_group_params( 'tds_food_menu' ))
			, $atts);

		$additional_classes = array();

		$buffy = '';

		$buffy .= '<div class="tdm_block ' . $this->get_block_classes($additional_classes) . '" ' . $this->get_block_html_atts() . '>';
            //get the block css
            $buffy .= $this->get_block_css();

            // Get food_menu
            $tds_food_menu = $this->get_shortcode_att('tds_food_menu');
            if ( empty( $tds_food_menu ) ) {
                $tds_food_menu = td_util::get_option( 'tds_food_menu', 'tds_food_menu1');
            }
            $tds_food_menu_instance = new $tds_food_menu( $this->shortcode_atts );
            $buffy .= $tds_food_menu_instance->render();

		$buffy .= '</div>';

		return $buffy;
	}
}