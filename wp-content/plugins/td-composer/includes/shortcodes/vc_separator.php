<?php
/**
 * Created by PhpStorm.
 * User: tagdiv
 * Date: 06.02.2017
 * Time: 11:23
 */

class vc_separator extends tdc_composer_block {

    private $atts;

    public function get_custom_css() {
        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $unique_block_class = $this->get_att('tdc_css_class');
        $unique_block_id = $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>
                /* @style_general_separator */
                .td_block_separator {
                  width: 100%;
                  align-items: center;
                  margin-bottom: 38px;
                  padding-bottom: 10px;
                }
                .td_block_separator span {
                  position: relative;
                  display: block;
                  margin: 0 auto;
                  width: 100%;
                  height: 1px;
                  border-top: 1px solid #EBEBEB;
                }
                .td_separator_align_left span {
                  margin-left: 0;
                }
                .td_separator_align_right span {
                  margin-right: 0;
                }
                .td_separator_dashed span {
                  border-top-style: dashed;
                }
                .td_separator_dotted span {
                  border-top-style: dotted;
                }
                .td_separator_double span {
                  height: 3px;
                  border-bottom: 1px solid #EBEBEB;
                }
                .td_separator_shadow > span {
                  position: relative;
                  height: 20px;
                  overflow: hidden;
                  border: 0;
                  color: #EBEBEB;
                }
                .td_separator_shadow > span > span {
                  position: absolute;
                  top: -30px;
                  left: 0;
                  right: 0;
                  margin: 0 auto;
                  height: 13px;
                  width: 98%;
                  border-radius: 100%;
                }
                html :where([style*='border-width']) {
                    border-style: none;
                }
				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->atts );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'style_general_separator', 1 );

    }

	function render($atts, $content = null) {
		parent::render($atts);

		$this->atts = shortcode_atts(
			array(
				'color' => '#EBEBEB',
				'align' => 'center',
				'style' => 'solid',
				'border_width' => '1',
				'el_width' => '100',

				'el_class' => '',
			), $atts, 'vc_separator' );

		$editing_class = '';
		if (tdc_state::is_live_editor_iframe() || tdc_state::is_live_editor_ajax()) {
			$editing_class = 'tdc-editing-vc_separator';
		}

		$buffer = '<div class="wpb_wrapper td_block_separator ' . $this->get_wrapper_class() . ' ' . $this->get_block_classes( array( $this->atts['el_class'], $editing_class ) ) . ' td_separator_' . $this->atts['style'] . ' td_separator_' . $this->atts['align'] . '">';

        if ( $this->atts['style'] === 'shadow' ) {

	        $css_box_shadow = 'box-shadow:0 10px 10px ' . $this->atts['border_width'] . 'px;';

		    $buffer .= '<span style="color:' . $this->atts['color'] . ';width:' . $this->atts['el_width'] . '%;">';
			$buffer .= '<span style="-moz-' . $css_box_shadow . ';-webkit-' . $css_box_shadow . '' . $css_box_shadow. '"></span>';
			$buffer .= '</span>';
        } else {
			$buffer .= '<span style="border-color:' . $this->atts['color'] . ';border-width:' . $this->atts['border_width'] . 'px;width:' . $this->atts['el_width'] . '%;"></span>';
		}

		$buffer .= $this->get_block_css() . '</div>';

		return  $buffer;
	}
}
