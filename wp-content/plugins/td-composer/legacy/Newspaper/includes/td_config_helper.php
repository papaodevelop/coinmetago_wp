<?php
/**
 * Created by PhpStorm.
 * User: marius
 * Date: 1/26/2018
 * Time: 3:27 PM
 */

class td_config_helper {

	// fonts atts
	static function get_map_block_font_array( $param_name, $font_header = false, $font_title = '', $group = '', $index_style = '', $class = '', $info_img = '', $info_descr = '', $toggle_enabled_by = '' ) {

		$params = td_fonts::get_block_font_params();

		array_unshift( $params, array(
				"param_name" => "font_settings",
				"type" => "font_settings",
				"value" => '',
				"class" => $class,
                "toggle_enabled_by" => $toggle_enabled_by
			)
		);

		if ( ! empty( $font_title ) ) {
			array_unshift( $params, array(
					"param_name" => "font_title",
					"type" => "font_title",
					"value" => $font_title,
					"class" => $class,
                    "info_img" => $info_img,
                    "description" => $info_descr,
                    "toggle_enabled_by" => $toggle_enabled_by
				)
			);
		}

		if ( $font_header ) {
			array_unshift( $params, array(
					"param_name" => "font_header",
					"type" => "font_header",
					"value" => '',
					"class" => $class,
                    "toggle_enabled_by" => $toggle_enabled_by
				)
			);
		}

		foreach ( $params as &$param ) {
			$param['param_name'] = $param_name . '_' . $param['param_name'];

			if ( ! empty( $group ) ) {
				$param['group'] = $group;
			}

			if ( ! empty( $index_style ) ) {
				$param['param_name'] .= '-' . $index_style;
			}

            if ( ! empty( $class ) ) {
                $param['class'] .= ' ' . $class;
            }

            if ( ! empty( $toggle_enabled_by ) ) {
                $param['toggle_enabled_by'] =  $toggle_enabled_by;
            }
		}
		return $params;
	}


	static function get_map_block_shadow_array( $param_name, $shadow_title, $shadow_size, $shadow_offset_h, $shadow_offset_v, $group = '', $index_style = '', $shadow_spread = 0, $shadow_header = true, $class = '', $info_img = '', $info_descr = '', $toggle_enabled_by = '' ) {
		$params = array(
		    array(
                "param_name" => "shadow_size",
                "type" => "textfield-responsive",
                "value" => '',
                "heading" => '',
                'class' => 'tdc-shadow-contr-textfield ' . $class,
                'description' => 'Change shadow size',
                'placeholder' => '',
                "toggle_enabled_by" => $toggle_enabled_by
            ),
            array(
                "param_name" => "shadow_offset_horizontal",
                "type" => "textfield-responsive",
                "value" => '',
                "heading" => '',
                'class' => 'tdc-shadow-contr-textfield ' . $class,
                'description' => 'Change shadow horizontal offset',
                'placeholder' => '',
                "toggle_enabled_by" => $toggle_enabled_by
            ),
            array(
                "param_name" => "shadow_offset_vertical",
                "type" => "textfield-responsive",
                "value" => '',
                "heading" => '',
                'class' => 'tdc-shadow-contr-textfield ' . $class,
                'description' => 'Change shadow vertical offset',
                'placeholder' => '',
                "toggle_enabled_by" => $toggle_enabled_by
            ),
            array(
                "param_name" => "shadow_spread",
                "type" => "textfield-responsive",
                "value" => '',
                "heading" => '',
                'class' => 'tdc-shadow-contr-textfield td-shadow-contr-spread ' . $class,
                'description' => 'Change shadow spread',
                'placeholder' => '',
                "toggle_enabled_by" => $toggle_enabled_by
            ),
            array(
                "param_name" => "shadow_color",
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "tdc-shadow-contr-color " . $class,
                "heading" => '',
                "value" => '',
                "description" => 'Change shadow color',
                "toggle_enabled_by" => $toggle_enabled_by
            ),
        );

        array_unshift( $params, array(
                "param_name" => "shadow_title",
                "type" => "shadow_title",
                "value" => $shadow_title,
                "class" => $class,
                "info_img" => $info_img,
                "description" => $info_descr,
                "toggle_enabled_by" => $toggle_enabled_by
            )
        );

        //echo $param_name . ': ' . $shadow_header . ';';

        if ( $shadow_header ) {
            array_unshift( $params, array(
                    "param_name" => "shadow_header",
                    "type" => "shadow_header",
                    "value" => '',
                    "class" => $class,
                    "toggle_enabled_by" => $toggle_enabled_by
                )
            );
        }

		foreach ( $params as &$param ) {

	        if( $param['param_name'] == 'shadow_size' ) {
                $param['placeholder'] = $shadow_size;
            } else if( $param['param_name'] == 'shadow_offset_horizontal' ) {
                $param['placeholder'] = $shadow_offset_h;
            } else if( $param['param_name'] == 'shadow_offset_vertical' ) {
                $param['placeholder'] = $shadow_offset_v;
            } else if( $param['param_name'] == 'shadow_spread' ) {
                $param['placeholder'] = $shadow_spread;
            }
            if ( ! empty( $group ) ) {
                $param['group'] = $group;
            }

	        $param['param_name'] = $param_name . '_' . $param['param_name'];

	        if ( ! empty( $index_style ) ) {
		        $param['param_name'] .= '-' . $index_style;
	        }

            if ( ! empty( $class ) ) {
                $param['class'] .= ' ' . $class;
            }

            if ( ! empty( $toggle_enabled_by ) ) {
                $param['toggle_enabled_by'] =  $toggle_enabled_by;
            }

        }
        return $params;
	}


	// block general fonts
	static function block_font() {
		return array_merge(
			array(
				array(
					"param_name" => "separator",
					"type" => "text_separator",
					'heading' => 'Block fonts',
					"value" => "",
					"class" => "",
					"group" => 'Style',
				)
			),
			self::get_map_block_font_array( 'f_header', true, 'Block header', 'Style', '', '', 'https://cloud.tagdiv.com/help/module_font_block_header.png', '' ),
			self::get_map_block_font_array( 'f_ajax', false, 'Ajax categories', 'Style', '', '', 'https://cloud.tagdiv.com/help/module_font_ajax.png', '' ),
			self::get_map_block_font_array( 'f_more', false, 'Load more button', 'Style', '', '', 'https://cloud.tagdiv.com/help/module_font_load_more.png', '' )
		);
	}


    // module slide fonts
    static function module_slide_font() {
        return array_merge(
            array(
                array(
                    "param_name" => "separator",
                    "type" => "text_separator",
                    'heading' => 'Module slide fonts',
                    "value" => "",
                    "class" => "tdc-separator-small",
                    "group" => 'Style',
                )
            ),
            self::get_map_block_font_array( 'msf_title', true, 'Article title', 'Style', '', '', 'https://cloud.tagdiv.com/help/module_font_article_title.png', '' ),
            self::get_map_block_font_array( 'msf_cat', false, 'Article category tag', 'Style', '', '', 'https://cloud.tagdiv.com/help/module_font_article_cat.png', '' ),
            self::get_map_block_font_array( 'msf_meta', false, 'Article meta info', 'Style', '', '', 'https://cloud.tagdiv.com/help/module_font_article_meta.png', '' )
        );
    }


    // image mix blend effects
    static function mix_blend($group = 'Style') {
        return array(
            array(
                "param_name" => "separator",
                "type" => "text_separator",
                'heading' => 'Image effects / Blend modes',
                "value" => "",
                "class" => "",
                "group" => $group,
            ),
            array(
                "param_name" => "mix_color",
                "holder"     => "div",
                "type"       => "gradient",
                'heading'    => "Blend color/mode",
                "value"      => "",
                "class"      => "tdc-blend",
                "group"      => $group,
                "info_img" => "https://cloud.tagdiv.com/help/module_blend.png",
            ),
            array (
                'param_name' => 'mix_type',
                'heading' => '',
                'type' => 'dropdown',
                'value' => array (
                    'Off' => '',
                    'Color' => 'color',
                    'Screen' => 'screen',
                    'Multiply' => 'multiply',
                    'Overlay' => 'overlay',
                    'Hue' => 'hue',
                    'Lighten' => 'lighten',
                    'Darken' => 'darken',
                    'Hard-light' => 'hard-light',
                    'Saturation' => 'saturation',
                    'Color-burn' => 'color-burn',
                    'Color-dodge' => 'color-dodge',
                    'Difference' => 'difference',
                    'Exclusion' => 'exclusion',
                    'Luminosity' => 'luminosity',
                ),
                'class' => 'tdc-dropdown-big tdc-blend-mode',
                'group' => $group,
            ),
            array(
                'param_name' => 'fe_brightness',
                'type' => 'range',
                'value' => '1',
                'heading' => 'Brightness',
                'description' => '',
                'class' => 'tdc-textfield-small',
                'range_min' => '0',
                'range_max' => '3',
                'range_step' => '0.1',
                'group' => $group,
                "info_img" => "https://cloud.tagdiv.com/help/module_blend_brightness.png",
            ),
            array(
                'param_name' => 'fe_contrast',
                'type' => 'range',
                'value' => '1',
                'heading' => 'Contrast',
                'description' => '',
                'class' => 'tdc-textfield-small',
                'range_min' => '0',
                'range_max' => '3',
                'range_step' => '0.1',
                'group' => $group,
                "info_img" => "https://cloud.tagdiv.com/help/module_blend_contrast.png",
            ),
            array(
                'param_name' => 'fe_saturate',
                'type' => 'range',
                'value' => '1',
                'heading' => 'Saturate',
                'description' => '',
                'class' => 'tdc-textfield-small',
                'range_min' => '0',
                'range_max' => '3',
                'range_step' => '0.1',
                'group' => $group,
                "info_img" => "https://cloud.tagdiv.com/help/module_blend_saturate.png",
            ),
        );
    }

    // image mix blend effects
    static function image_filters($group = 'Style') {
        return array(
            array(
                "param_name" => "separator",
                "type"       => "text_separator",
                'heading'    => 'Hover',
                "value"      => "",
                "class"      => "tdc-separator-small",
                "group"       => $group,
            ),
            array(
                "param_name" => "mix_color_h",
                "holder"     => "div",
                "type"       => "gradient",
                'heading'    => "Blend color/mode",
                "value"      => "",
                "class"      => "tdc-blend",
                "group"      => $group,
                "info_img" => "https://cloud.tagdiv.com/help/module_blend.png",
            ),
            array (
                'param_name' => 'mix_type_h',
                'heading' => '',
                'type' => 'dropdown',
                'value' => array (
                    'Off' => '',
                    'Color' => 'color',
                    'Screen' => 'screen',
                    'Multiply' => 'multiply',
                    'Overlay' => 'overlay',
                    'Hue' => 'hue',
                    'Lighten' => 'lighten',
                    'Darken' => 'darken',
                    'Hard-light' => 'hard-light',
                    'Saturation' => 'saturation',
                    'Color-burn' => 'color-burn',
                    'Color-dodge' => 'color-dodge',
                    'Difference' => 'difference',
                    'Exclusion' => 'exclusion',
                    'Luminosity' => 'luminosity',
                ),
                'class' => 'tdc-dropdown-big tdc-blend-mode',
                'group' => $group,
            ),
            array(
                'param_name' => 'fe_brightness_h',
                'type' => 'range',
                'value' => '1',
                'heading' => 'Brightness',
                'description' => 'Lorem ipsum dolor sit amet',
                'class' => 'tdc-textfield-small',
                'range_min' => '0',
                'range_max' => '3',
                'range_step' => '0.1',
                'group' => $group,
                "info_img" => "https://cloud.tagdiv.com/help/module_blend_brightness.png",
            ),
            array(
                'param_name' => 'fe_contrast_h',
                'type' => 'range',
                'value' => '1',
                'heading' => 'Contrast',
                'description' => '',
                'class' => 'tdc-textfield-small',
                'range_min' => '0',
                'range_max' => '3',
                'range_step' => '0.1',
                'group' => $group,
                "info_img" => "https://cloud.tagdiv.com/help/module_blend_contrast.png",
            ),
            array(
                'param_name' => 'fe_saturate_h',
                'type' => 'range',
                'value' => '1',
                'heading' => 'Saturate',
                'description' => '',
                'class' => 'tdc-textfield-small',
                'range_min' => '0',
                'range_max' => '3',
                'range_step' => '0.1',
                'group' => $group,
                "info_img" => "https://cloud.tagdiv.com/help/module_blend_saturate.png",
            ),
        );
    }
}