<?php
/**
 * Created by PhpStorm.
 * User: tagdiv
 * Date: 25.01.2018
 * Time: 15:30
 */

abstract class td_style {

	protected abstract function get_style_att( $att_name );

	protected abstract function render( $index_style = '' );

	protected function get_shortcode_att( $att_name, $index_style = '' ) {

        //we need to decode the square bracket case
        $attr_value = $this->get_att( $att_name, '', $index_style );
        if ( strpos($attr_value, 'td_encval') === 0 ) {
            $attr_value = str_replace('td_encval', '', $attr_value);
            $attr_value = base64_decode( $attr_value );
        }

        return $attr_value;
	}

	protected function get_att_name( $att_name, $style_class = '', $index_style = '' ) {
		if ( ! empty( $style_class ) ) {
			$att_name = $style_class . '-' . $att_name;
		}
		if ( ! empty( $index_style ) ) {
			$att_name .= '-' . $index_style;
		}
		return $att_name;
	}

	protected function get_att( $att_name, $style_class = '', $index_style = '' ) {
		$atts = $this->get_atts();
		if ( empty( $atts ) ) {
			td_util::error(__FILE__, get_class($this) . '->get_att(' . $att_name . ') Internal error: The atts are not set yet(AKA: the render template method was called without atts)');
			if (TDC_DEPLOY_MODE == 'dev') {
				die;
			}
		}

		$key = $this->get_att_name( $att_name, $style_class, $index_style );

		if ( ! isset( $atts[ $key ] ) ) {
			var_dump( $atts );
			td_util::error(__FILE__, 'Internal error: The system tried to use an att that does not exists! class_name: ' . get_class($this) . '  Att name: "' . $att_name . '" as "' . $key . '"');
			if (TDC_DEPLOY_MODE == 'dev') {
				die;
			}
		}

		return $atts[ $key ];
	}

	protected static function get_class_style( $class ) {
		return str_replace( '_', '-', $class );
	}

	protected static function get_group_style( $class ) {
		$styles = td_api_style::get_all();
		return str_replace( '_', '-', $styles[$class]['group'] );
	}

	protected function get_icon_att( $att_name, $index_style = '' ) {
	    $icon_class = $this->get_att($att_name, '', $index_style);
	    $svg_list = td_global::$svg_theme_font_list;

	    if( array_key_exists( $icon_class, $svg_list ) ) {
	        return $svg_list[$icon_class];
        }

	    return $icon_class;
    }

    protected function get_style($css) {
		$buffy = '';

		global $post;

		if (td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() || empty($post)) {
	    	$buffy = PHP_EOL . '<style>' . PHP_EOL . $css . PHP_EOL . '</style>';

		} else if (!empty($post)) {

	        $ref_id = $post->ID;

            if ( function_exists( 'is_buddypress' ) && is_buddypress() ) {
                $ref_id = get_queried_object_id();
            }

	        if ( class_exists( 'Mobile_Detect' ) ) {
		        $mobile_detect = new Mobile_Detect();
		        if ( $mobile_detect->isMobile() ) {

			        $ref_id = get_post_meta( $ref_id, 'tdc_mobile_template_id', true );
			        if ( empty( $ref_id ) ) {
				        $ref_id = $post->ID;
			        }
		        }
	        }
	        if ( ! empty( $ref_id ) ) {
		        $tda_essential_css = get_post_meta( $ref_id, 'tda_essential_css', true );
		        if ( empty( $tda_essential_css ) ) {
			        $buffy = PHP_EOL . '<style>' . PHP_EOL . $css . PHP_EOL . '</style>';
		        }
	        }
	    }
	    return $buffy;
    }
}
