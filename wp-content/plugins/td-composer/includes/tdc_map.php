<?php
/**
 * Created by ra.
 * Date: 3/31/2016
 * Internal map file
 */

$block_general_params_array = td_config::get_map_block_general_array();

// Remove the 'Color presets' option on Newsmag
if ( 'Newsmag' === TD_THEME_NAME ) {
	foreach ($block_general_params_array as $key => $block_general_param) {
		if ( 'color_preset' === $block_general_param['param_name']) {
			array_splice($block_general_params_array, $key, 1);
			break;
		}
	}
}
function td_social_counter_title_tag() {
    $social_counter_title_tag = array();
    if( 'Newspaper' == TD_THEME_NAME ) {
        $social_counter_title_tag = array(
            array(
                "param_name" => "title_tag",
                "type" => "dropdown",
                "value" => array(
                    'Default - H4' => '',
                    'H1' => 'h1',
                    'H2' => 'h2',
                    'H3' => 'h3',
                    'Div' => 'div'
                ),
                "heading" => 'Title tag (SEO)',
                "description" => "",
                "holder" => "div",
                "class" => "tdc-dropdown-big",
                "info_img" => "https://cloud.tagdiv.com/help/title_seo.png",
            ),
        );

    }
    return $social_counter_title_tag;
}


/**
 * @param $param_name - param for which fonts' params will be rendered
 * @param $shadow_title
 * @param $shadow_size
 * @param $shadow_offset_h
 * @param $shadow_offset_v
 * @param string $group
 * @param string $index_style
 *
 * @return mixed
 */

function get_shadow_group_params( $param_name, $shadow_title, $shadow_size, $shadow_offset_h, $shadow_offset_v, $group = '', $index_style = '' ) {
    $params = tdc_config::$group_params[ 'shadow' ];

    foreach ( $params as &$param ) {

        if( $param['param_name'] == 'shadow_size' || $param['param_name'] == 'shadow_color' ) {
            $param['heading'] = $shadow_title . ' ' . $param['heading'];
        }

        if( $param['param_name'] == 'shadow_size' ) {
            $param['placeholder'] = $shadow_size;
        } else if( $param['param_name'] == 'shadow_offset_horizontal' ) {
            $param['value'] = $shadow_offset_h;

        } else if( $param['param_name'] == 'shadow_offset_vertical' ) {
            $param['value'] = $shadow_offset_v;
        }
        if ( ! empty( $group ) ) {
            $param['group'] = $group;
        }

        $param['param_name'] = $param_name . '_' . $param['param_name'];

        if ( ! empty( $index_style ) ) {
            $param['param_name'] .= '-' . $index_style;
        }

    }

    return $params;
}

$external_shortcodes = array(
	'td_block_social_counter' => array(
		"name" => 'Social Counter',
        "base" => 'td_block_social_counter',
        "class" => 'td_block_social_counter',
        "controls" => "full",
        "category" => __('Blocks', TD_THEME_NAME),
		'tdc_category' => 'External',
        'icon' => 'icon-pagebuilder-td_social_counter',
        'tdc_style_params' => array(
            'custom_title',
            'custom_url',
            'facebook',
            'twitter',
            'youtube',
            'instagram',
            'pinterest',
			'tiktok',
            'soundcloud',
            'rss',
            'rss_url',
            'el_class'
        ),
        "params" => array_merge(
			$block_general_params_array,
            td_social_counter_title_tag(),
            array(
                array(
                    "param_name" => "separator",
                    "type" => "horizontal_separator",
                    "value" => "",
                    "class" => ""
                ),
                array(
                    "param_name" => "facebook",
                    "type" => "textfield",
                    "value" => "",
                    "heading" => __("Facebook id", TD_THEME_NAME)/* . '&nbsp<a href="http://forum.tagdiv.com/tagdiv-social-counter-tutorial/" target="_blank">How to get the App Id and the Security Key</a>'*/,
                    "description" => "",
                    "holder" => "div",
                    "class" => "tdc-textfield-big"
                ),
				array(
					"param_name" => "manual_count_facebook",
					"type" => "textfield",
					"value" => "",
					"heading" => __("Facebook fixed count", TD_THEME_NAME),
					"description" => "Add a fixed likes count for facebook",
					"holder" => "div",
					"class" => "tdc-textfield-big"
				),
	            /*array(
		            "param_name" => "facebook_app_id",
		            "type" => "textfield",
		            "value" => "",
		            "heading" => __("Facebook App Id", TD_THEME_NAME),
		            "description" => "",
		            "holder" => "div",
		            "class" => "tdc-textfield-big"
	            ),
	            array(
		            "param_name" => "facebook_security_key",
		            "type" => "textfield",
		            "value" => "",
		            "heading" => __("Facebook Security Key", TD_THEME_NAME),
		            "description" => "",
		            "holder" => "div",
		            "class" => "tdc-textfield-big"
	            ),
	            array(
		            "param_name" => "facebook_access_token",
		            "type" => "textfield",
		            "value" => "",
		            "heading" => __("Facebook Access Token", TD_THEME_NAME) . '&nbsp;<a class="td_access_token facebook" href="#">Get Access Token</a><i class="td_access_token_info" style="display: none; color: #F00; margin-left: 10px">Please wait...</i>',
		            "description" => "",
		            "holder" => "div",
		            "class" => "tdc-textfield-big"
	            ),*/
                array(
                    "param_name" => "twitter",
                    "type" => "textfield",
                    "value" => "",
                    "heading" => __("Twitter id", TD_THEME_NAME),
                    "description" => "",
                    "holder" => "div",
                    "class" => "tdc-textfield-big"
                ),
				array(
					"param_name" => "manual_count_twitter",
					"type" => "textfield",
					"value" => "",
					"heading" => __("Twitter fixed count", TD_THEME_NAME),
					"description" => "Add a fixed followers count for twitter",
					"holder" => "div",
					"class" => "tdc-textfield-big"
				),
                array(
                    "param_name" => "youtube",
                    "type" => "textfield",
                    "value" => "",
                    "heading" => __("Youtube id", TD_THEME_NAME),
                    "description" => "User: www.youtube.com/user/<b style='color: #000'>ENVATO</b><br/>Channel: www.youtube.com/ <b style='color: #000'>channel/UCJr72fY4cTaNZv7WPbvjaSw</b><br><a href='https://forum.tagdiv.com/youtube-api-key/' target='_blank'>YouTube API Key guide</a>",
                    "holder" => "div",
                    "class" => "tdc-textfield-big"
                ),
				array(
					"param_name" => "manual_count_youtube",
					"type" => "textfield",
					"value" => "",
					"heading" => __("Youtube fixed count", TD_THEME_NAME),
					"description" => "Add a fixed followers count for youtube",
					"holder" => "div",
					"class" => "tdc-textfield-big"
				),
//                array(
//                    "param_name" => "vimeo",
//                    "type" => "textfield",
//                    "value" => "",
//                    "heading" => __("Vimeo id", TD_THEME_NAME),
//                    "description" => "",
//                    "holder" => "div",
//                    "class" => "tdc-textfield-big"
//                ),
//                array(
//                    "param_name" => "googleplus",
//                    "type" => "textfield",
//                    "value" => '',
//                    "heading" => __("Google Plus User", TD_THEME_NAME),
//                    "description" => "",
//                    "holder" => "div",
//                    "class" => "tdc-textfield-big"
//                ),
//				array(
//					"param_name" => "manual_count_googleplus",
//					"type" => "textfield",
//					"value" => "",
//					"heading" => __("Google+ fixed count", TD_THEME_NAME),
//					"description" => "Add a fixed followers count for google plus",
//					"holder" => "div",
//					"class" => "tdc-textfield-big"
//				),
                array(
                    "param_name" => "instagram",
                    "type" => "textfield",
                    "value" => '',
                    "heading" => __("Instagram User", TD_THEME_NAME),
                    "description" => "",
                    "holder" => "div",
                    "class" => "tdc-textfield-big"
                ),
				array(
					"param_name" => "manual_count_instagram",
					"type" => "textfield",
					"value" => "",
					"heading" => __("Instagram fixed count", TD_THEME_NAME),
					"description" => "Add a fixed followers count for instagram",
					"holder" => "div",
					"class" => "tdc-textfield-big"
				),
				array(
					"param_name" => "pinterest",
					"type" => "textfield",
					"value" => "",
					"heading" => __("Pinterest id", TD_THEME_NAME),
					"description" => "",
					"holder" => "div",
					"class" => "tdc-textfield-big"
				),
				array(
					"param_name" => "manual_count_pinterest",
					"type" => "textfield",
					"value" => "",
					"heading" => __("Pinterest fixed count", TD_THEME_NAME),
					"description" => "Add a fixed followers count for pinterest",
					"holder" => "div",
					"class" => "tdc-textfield-big"
				),
				array(
					"param_name" => "tiktok",
					"type" => "textfield",
					"value" => "",
					"heading" => __("TikTok username", TD_THEME_NAME),
					"description" => "User: @username OR @username/video_id",
					"holder" => "div",
					"class" => "tdc-textfield-big"
				),
				array(
					"param_name" => "manual_count_tiktok",
					"type" => "textfield",
					"value" => "",
					"heading" => __("TikTok fixed count", TD_THEME_NAME),
					"description" => "Add a fixed followers count for TikTok",
					"holder" => "div",
					"class" => "tdc-textfield-big"
				),
                array(
                    "param_name" => "soundcloud",
                    "type" => "textfield",
                    "value" => '',
                    "heading" => __("Soundcloud User", TD_THEME_NAME),
                    "description" => "",
                    "holder" => "div",
                    "class" => "tdc-textfield-big"
                ),
				array(
					"param_name" => "manual_count_soundcloud",
					"type" => "textfield",
					"value" => "",
					"heading" => __("Soundcloud fixed count", TD_THEME_NAME),
					"description" => "Add a fixed followers count for soundcloud",
					"holder" => "div",
					"class" => "tdc-textfield-big"
				),
                array(
                    "param_name" => "rss",
                    "type" => "textfield",
                    "value" => '',
                    "heading" => __("Feed subscriber count", TD_THEME_NAME),
                    "description" => "Write the number of followers",
                    "holder" => "div",
                    "class" => "tdc-textfield-big"
                ),
				array(
					"param_name" => "rss_url",
					"type" => "textfield",
					"value" => '',
					"heading" => __("Feed custom url", TD_THEME_NAME),
					"description" => "Custom url if using a RSS plugin ",
					"holder" => "div",
					"class" => "tdc-textfield-big"
				),
                array(
                    "param_name" => "open_in_new_window",
                    "type" => "dropdown",
                    "value" => array('- Same window -' => '', 'New window' => 'y'),
                    "heading" => __("Open in", TD_THEME_NAME),
                    "description" => "",
                    "holder" => "div",
                    "class" => "tdc-dropdown-extrabig"
                ),
				array(
					"param_name" => "social_rel",
					"type" => "dropdown",
					"value" => array(
						'Disable' => '',
						'Nofollow' => 'nofollow',
						'Noopener' => 'noopener',
						'Noreferrer' => 'noreferrer'
					),
					"heading" => "Set nofollow, noopener or noreferrer",
					"description" => "",
					"holder" => "div",
					"class" => "tdc-dropdown-big"
				),
                array(
                    "param_name" => "separator",
                    "type" => "horizontal_separator",
                    "value" => "",
                    "class" => ""
                ),
                array(
                    'param_name' => 'el_class',
                    'type' => 'textfield',
                    'value' => '',
                    'heading' => 'Extra class',
                    'description' => 'Style particular content element differently - add a class name and refer to it in custom CSS',
                    'class' => 'tdc-textfield-extrabig',
                    'group' => ''
                ),

                array(
                    "param_name" => "style",
                    "type" => "dropdown",
                    "value" => array('Default' => '', 'Style 1 - Default black' => 'style1', 'Style 2 - Default with border' => 'style2 td-social-font-icons', 'Style 3 - Default colored circle' => 'style3 td-social-colored', 'Style 4 - Default colored square' => 'style4 td-social-colored', 'Style 5 - Boxes with space' => 'style5 td-social-boxed', 'Style 6 - Full boxes' => 'style6 td-social-boxed', 'Style 7 - Black boxes' => 'style7 td-social-boxed', 'Style 8 - Boxes with border' => 'style8 td-social-boxed td-social-font-icons', 'Style 9 - Colored circles' => 'style9 td-social-boxed td-social-colored', 'Style 10 - Colored squares' => 'style10 td-social-boxed td-social-colored'),
                    "heading" => 'Style',
                    "description" => "Style of the Social Counter widget",
                    "holder" => "div",
                    "class" => "tdc-dropdown-extrabig",
                    "group"      => "Style",
                ),
                array(
                    "param_name" => "separator",
                    "type"       => "text_separator",
                    'heading'    => 'Colors',
                    "value"      => "",
                    "class"      => "",
                    "group"      => "Style",
                ),
                array(
                    "type"        => "colorpicker",
                    "holder"      => "div",
                    "class"       => "td-colorpicker-double-a",
                    "heading"     => 'Counters color',
                    "param_name"  => "counter_color",
                    "value"       => '',
                    "description" => '',
                    "group"       => "Style",
                ),
                array(
                    "type"        => "colorpicker",
                    "holder"      => "div",
                    "class"       => "td-colorpicker-double-b",
                    "heading"     => 'Counter hover color',
                    "param_name"  => "counter_color_h",
                    "value"       => '',
                    "description" => '',
                    "group"       => "Style",
                ),
                array(
                    "type"        => "colorpicker",
                    "holder"      => "div",
                    "class"       => "td-colorpicker-double-a",
                    "heading"     => 'Social network name color',
                    "param_name"  => "network_color",
                    "value"       => '',
                    "description" => '',
                    "group"       => "Style",
                ),
                array(
                    "type"        => "colorpicker",
                    "holder"      => "div",
                    "class"       => "td-colorpicker-double-b",
                    "heading"     => 'Social network name hover',
                    "param_name"  => "network_color_h",
                    "value"       => '',
                    "description" => '',
                    "group"       => "Style",
                ),
                array(
                    "type"        => "colorpicker",
                    "holder"      => "div",
                    "class"       => "td-colorpicker-double-a",
                    "heading"     => 'Buttons color',
                    "param_name"  => "btn_color",
                    "value"       => '',
                    "description" => '',
                    "group"       => "Style",
                ),
                array(
                    "type"        => "colorpicker",
                    "holder"      => "div",
                    "class"       => "td-colorpicker-double-b",
                    "heading"     => 'Buttons hover color ',
                    "param_name"  => "btn_color_h",
                    "value"       => '',
                    "description" => '',
                    "group"       => "Style",
                ),
                array(
                    "param_name" => "separator",
                    "type"       => "text_separator",
                    'heading'    => 'Fonts',
                    "value"      => "",
                    "class"      => "",
                    "group"      => "Style",
                ),
            ),
            td_config_helper::get_map_block_font_array( 'f_header', true, 'Block header', 'Style', '', '', 'https://cloud.tagdiv.com/help/module_font_block_header.png', ''),
            td_config_helper::get_map_block_font_array( 'f_counters', false, 'Counters text', 'Style'),
            td_config_helper::get_map_block_font_array( 'f_network', false, 'Social networks name text', 'Style'),
            td_config_helper::get_map_block_font_array( 'f_btn', false, 'Buttons text', 'Style', '', '', 'https://cloud.tagdiv.com/help/module_font_article_read.png', ''),

            array(
                array(
                    'param_name' => 'css',
                    'value' => '',
                    'type' => 'css_editor',
                    'heading' => 'Css',
                    'group' => 'Design options',
                ),
	            array(
	                'param_name' => 'tdc_css',
	                'value' => '',
	                'type' => 'tdc_css_editor',
	                'heading' => '',
	                'group' => 'Design options',
	            ),
            )
        )
	),

	'rev_slider' => array(
		'base' => 'rev_slider',
		'name' => __( 'Revolution Slider', 'td_composer' ),
		'icon' => 'icon-wpb-revslider',
		'category' => __( 'Content', 'td_composer' ),
		'tdc_category' => 'External',
		'description' => __( 'Place Revolution slider', 'td_composer' ),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Slider', 'td_composer' ),
				'param_name' => 'alias',
				'admin_label' => true,
				'value' => '',
				'save_always' => true,
				'description' => "<em>Place here the alias for embedding your slider <br><b>example: slider1</b></em>",
				'class' => '',
			),
//			array(
//				'type' => 'textfield',
//				'heading' => __( 'Extra class', 'td_composer' ),
//				'param_name' => 'el_class',
//				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'td_composer' ),
//				'value' => '',
//				'class' => 'tdc-textfield-extrabig',
//			),
		),
	),

//	'td_woo_product_image' =>
//		array(
//			'map_in_td_composer' => true,
//			"name" => 'Woo Product Image',
//			"base" => "td_woo_product_image",
//			'tdc_category' => 'WooCommerce Single',
//			'params' => array()
//		),
//
//	'td_woo_product_image_bg' =>
//        array(
//            'map_in_td_composer' => true,
//            "name" => 'Woo Product Background Image',
//            "base" => "td_woo_product_image_bg",
//            'tdc_category' => 'WooCommerce Single',
//            'params' => array()
//        ),
//
//	'td_woo_product_price' =>
//		array(
//			'map_in_td_composer' => true,
//			"name" => 'Woo Product Price',
//			"base" => "td_woo_product_price",
//			'tdc_category' => 'WooCommerce Single',
//			'params' => array()
//		),
//
//	'td_woo_product_attributes' =>
//		array(
//			'map_in_td_composer' => true,
//			"name" => 'Woo Product Attributes',
//			"base" => "td_woo_product_attributes",
//			'tdc_category' => 'WooCommerce Single',
//			'params' => array()
//		),
//
//	'td_woo_product_description' =>
//		array(
//			'map_in_td_composer' => true,
//			"name" => 'Woo Product Description',
//			"base" => "td_woo_product_description",
//			'tdc_category' => 'WooCommerce Single',
//			'params' => array()
//		),
//
//	'td_woo_product_categories' =>
//		array(
//			'map_in_td_composer' => true,
//			"name" => 'Woo Product Categories',
//			"base" => "td_woo_product_categories",
//			'tdc_category' => 'WooCommerce Single',
//			'params' => array()
//		),
//
//	'td_woo_product_tags' =>
//		array(
//			'map_in_td_composer' => true,
//			"name" => 'Woo Product Tags',
//			"base" => "td_woo_product_tags",
//			'tdc_category' => 'WooCommerce Single',
//			'params' => array()
//		),
//
//	'td_woo_product_tabs' =>
//		array(
//			'map_in_td_composer' => true,
//			"name" => 'Woo Product Tabs',
//			"base" => "td_woo_product_tabs",
//			'tdc_category' => 'WooCommerce Single',
//			'params' => array()
//		),
//
//	'td_woo_product_sku' =>
//		array(
//			'map_in_td_composer' => true,
//			"name" => 'Woo Product SKU',
//			"base" => "td_woo_product_sku",
//			'tdc_category' => 'WooCommerce Single',
//			'params' => array()
//		),
//
//	'td_woo_add_to_cart' =>
//		array(
//			'map_in_td_composer' => true,
//			'base' => 'td_woo_add_to_cart',
//			'name' => 'Woo Add to Cart',
//			'category' => 'Content',
//			'tdc_category' => 'WooCommerce Single',
//			'params' => array()
//		),
//
//	'td_woo_product_reviews' =>
//		array(
//			'map_in_td_composer' => true,
//			'base' => 'td_woo_product_reviews',
//			'name' => 'Woo Product Reviews',
//			'category' => 'Content',
//			'tdc_category' => 'WooCommerce Single',
//			'params' => array()
//		),
//
//	'td_woo_product_rating' =>
//		array(
//			'map_in_td_composer' => true,
//			"name" => 'Woo Product Rating',
//			"base" => "td_woo_product_rating",
//			'tdc_category' => 'WooCommerce Single',
//			'params' => array()
//		),
//
//	'td_woo_product_notices' =>
//		array(
//			'map_in_td_composer' => true,
//			"name" => 'Woo Product Notices',
//			"base" => "td_woo_product_notices",
//			'tdc_category' => 'WooCommerce Single',
//			'params' => array()
//		),
//
//	'td_woo_title' =>
//		array(
//			'map_in_td_composer' => true,
//			'base' => 'td_woo_title',
//			'name' => 'Woo Page Title',
//			'category' => 'Content',
//			'tdc_category' => 'WooCommerce Common',
//            'params' => array()
//		),
//
//	'td_woo_breadcrumbs' =>
//		array(
//			'map_in_td_composer' => true,
//			'base' => 'td_woo_breadcrumbs',
//			'name' => 'Woo Breadcrumbs',
//			'category' => 'Content',
//			'tdc_category' => 'WooCommerce Common',
//            'params' => array()
//		),
//
//	'td_woo_add_to_cart_custom' =>
//		array(
//			'map_in_td_composer' => true,
//			"name" => 'Woo Custom Add To Cart',
//			"base" => "td_woo_add_to_cart_custom",
//			'tdc_category' => 'WooCommerce Common',
//			'params' => array()
//		),
//
//	'td_woo_products_loop' =>
//		array(
//			'map_in_td_composer' => true,
//			"name" => 'Woo Loop',
//			"base" => "td_woo_products_loop",
//			'tdc_category' => 'WooCommerce Common',
//			'params' => array()
//		),
//
//	'td_woo_loop_sorting_options' =>
//		array(
//			'map_in_td_composer' => true,
//			"name" => 'Woo Loop Sorting Options',
//			"base" => "td_woo_loop_sorting_options",
//			'tdc_category' => 'WooCommerce Common',
//			"params" => array()
//		),
//
//	'td_woo_attribute_filter' =>
//		array(
//			'map_in_td_composer' => true,
//			"name" => 'Woo Attribute Filters',
//			"base" => "td_woo_attribute_filter",
//			"class" => "",
//			"controls" => "full",
//			"category" => 'Blocks',
//			'tdc_category' => 'WooCommerce Common',
//			'icon' => '',
//			'params' => array()
//		),
//
//	'td_woo_filters_list' =>
//		array(
//			'map_in_td_composer' => true,
//			"name" => 'Woo Selected Filters',
//			"base" => "td_woo_filters_list",
//			"class" => "",
//			"controls" => "full",
//			"category" => 'Blocks',
//			'tdc_category' => 'WooCommerce Common',
//			'icon' => '',
//			'params' => array()
//		),
//
//	'td_woo_page_description' =>
//		array(
//			'map_in_td_composer' => true,
//			"name" => 'Woo Page Description',
//			"base" => "td_woo_page_description",
//			"class" => "",
//			"controls" => "full",
//			"category" => 'Blocks',
//			'tdc_category' => 'WooCommerce Common',
//			'icon' => '',
//			'params' => array()
//		),
//
//	'td_woo_products_live_search' =>
//		array(
//			'map_in_td_composer' => true,
//			"name" => 'Woo Products Live Search',
//			"base" => "td_woo_products_live_search",
//			'tdc_category' => 'Header shortcodes',
//			'params' => array()
//		),
//
//	'td_woo_menu_cart' =>
//		array(
//			'map_in_td_composer' => true,
//			"name" => 'Woo Menu Cart',
//			"base" => "td_woo_menu_cart",
//			"class" => "",
//			"controls" => "full",
//			"category" => 'Blocks',
//			'tdc_category' => 'Header shortcodes',
//			'icon' => 'icon-pagebuilder-td_woo_menu_cart',
//			'params' => array()
//		),
//
//	'td_woo_menu_login' =>
//		array(
//			'map_in_td_composer' => true,
//			"name" => 'Woo Menu Login',
//			"base" => "td_woo_menu_login",
//			"class" => "",
//			"controls" => "full",
//			"category" => 'Blocks',
//			'tdc_category' => 'Header shortcodes',
//			'icon' => 'icon-pagebuilder-td_woo_menu_login',
//			'params' => array()
//		),
//
//	'td_woo_archive_subcategories_list' =>
//		array(
//			'map_in_td_composer' => true,
//			"name" => 'Woo Archive Sucategories List',
//			"base" => "td_woo_archive_subcategories_list",
//			'tdc_category' => 'WooCommerce Archive',
//			"params" => array()
//		),
//
//	'td_woo_products_block' =>
//		array(
//			'map_in_td_composer'     => true,
//			"name"                   => 'Woo Product Block',
//			"base"                   => 'td_woo_products_block',
//			"category"               => 'Blocks',
//			'tdc_category'           => 'Blocks',
//			"params" => array()
//		),

// Example: Register an external shortcode BUT IMPLEMENTED in theme

//	'button' => array(
//		'external_shortcode' => true,
//		'base' => 'button',
//		'name' => 'button',
//		'params' => array(
//			array(
//				'type' => 'textfield',
//				'heading' => __( 'Label', 'td_composer' ),
//				'param_name' => 'label',
//				'description' => '',
//				'value' => '',
//				'class' => 'tdc-textfield-extrabig',
//			),
//			array(
//				'type' => 'textfield',
//				'heading' => __( 'Color', 'td_composer' ),
//				'param_name' => 'color',
//				'description' => '',
//				'value' => '',
//				'class' => 'tdc-textfield-extrabig',
//			),
//			array(
//				'type' => 'textfield',
//				'heading' => __( 'Size', 'td_composer' ),
//				'param_name' => 'size',
//				'description' => '',
//				'value' => '',
//				'class' => 'tdc-textfield-extrabig',
//			),
//			array(
//				'type' => 'textfield',
//				'heading' => __( 'Type', 'td_composer' ),
//				'param_name' => 'type',
//				'description' => '',
//				'value' => '',
//				'class' => 'tdc-textfield-extrabig',
//			),
//			array(
//				'type' => 'textfield',
//				'heading' => __( 'Target', 'td_composer' ),
//				'param_name' => 'target',
//				'description' => '',
//				'value' => '',
//				'class' => 'tdc-textfield-extrabig',
//			),
//			array(
//				'type' => 'textfield',
//				'heading' => __( 'Link', 'td_composer' ),
//				'param_name' => 'link',
//				'description' => '',
//				'value' => '',
//				'class' => 'tdc-textfield-extrabig',
//			),
//		),
//	),

// Example: Register an external shortcode WITHOUT implementation

//	'fake_button' => array(
//		'external_shortcode' => true,
//		'base' => 'fake_button',
//		'name' => 'fake_button',
//		'params' => array(
//			array(
//				'type' => 'textfield',
//				'heading' => __( 'Label', 'td_composer' ),
//				'param_name' => 'label',
//				'description' => '',
//				'value' => '',
//				'class' => 'tdc-textfield-extrabig',
//			),
//		),
//	)
);
tdc_mapper::set_external_shortcodes( $external_shortcodes );


// map the blocks from our themes
// 'tdc_loaded' hook is used because plugins register their shortcodes on this hook, and the list is displayed by frontend template on 'current_screen' hook
add_action('tdc_loaded', 'tdc_map_theme_blocks');
function tdc_map_theme_blocks() {
	foreach (td_api_block::get_all() as $block) {
		if (isset($block['map_in_td_composer']) && $block['map_in_td_composer'] === true ) { // map only shortcodes that have to appear in the composer
			tdc_mapper::map_shortcode($block);
		}
	}

	tdc_mapper::map_block_templates(td_api_block_template::get_all());
}


/**
 * overwrites the shortcode from the theme or just loads the shortcodes that come with the plugin
 * !!! USES THEME CODE
 * 'tdc_loaded' hook is used because plugins register their shortcodes on this hook, and the list is displayed by frontend template on 'current_screen' hook
 * @see td_global_blocks is from wp booster
 */
add_action('tdc_loaded', 'tdc_load_internal_shortcodes');
function tdc_load_internal_shortcodes() {
	tdc_global_blocks::add_lazy_shortcode('tdc_zone');
	tdc_global_blocks::add_lazy_shortcode('vc_row');
	tdc_global_blocks::add_lazy_shortcode('vc_column');
	tdc_global_blocks::add_lazy_shortcode('vc_row_inner');
	tdc_global_blocks::add_lazy_shortcode('vc_column_inner');
	tdc_global_blocks::add_lazy_shortcode('vc_raw_html');
	tdc_global_blocks::add_lazy_shortcode('vc_empty_space');
	tdc_global_blocks::add_lazy_shortcode('vc_widget_sidebar');
	tdc_global_blocks::add_lazy_shortcode('vc_separator');
	//include only when WooCommerce is active
	if (td_global::$is_woocommerce_installed === true ) {
		tdc_global_blocks::add_lazy_shortcode('tdc_woo_shortcodes');
	}
	//exclude tagdiv shortcodes when V.C. is active
	if (!td_util::is_vc_installed()) {
		tdc_global_blocks::add_lazy_shortcode('vc_single_image');
		tdc_global_blocks::add_lazy_shortcode('vc_wp_recentcomments');
		tdc_global_blocks::add_lazy_shortcode('vc_column_text');
	}
}


$rowColumns = array (
	array(
		'1/1' => '11'
	),
	array(
		'2/3 + 1/3' => '23_13',
	),
	array(
		'1/3 + 2/3' => '13_23',
	),
	array(
		'1/3 + 1/3 + 1/3' => '13_13_13',
	),
);

//if ( 'Newsmag' !== TD_THEME_NAME && is_plugin_active( 'td-multi-purpose/td-multi-purpose.php' ) ) {
if ( 'Newsmag' !== TD_THEME_NAME ) {
	$rowColumns = array_merge( $rowColumns, array(
		'1/2 + 1/2' => '12_12',
        '7/12 + 5/12' => '7_5',
		'5/12 + 7/12' => '5_7',
        '3/4 + 1/4' => '34_14',
        '1/4 + 3/4' => '14_34',
		'1/4 + 1/2 + 1/4' => '14_12_14',
        '1/4 + 1/4 + 1/4 + 1/4' => '14_14_14_14',
	));
}


$flexParams = array();
$flexOccupy = array();
$flexWidth = array();
if( 'Newspaper' === TD_THEME_NAME ) {
    $flexParams = array(
        array(
            "param_name" => "flex_layout",
            "type" => "dropdown-responsive",
            "value" => array(
                'Disabled' => 'block',
                'Columns' => 'row',
                'Row' => 'column',
            ),
            "heading" => 'Layout',
            "description" => "",
            "holder" => "div",
            'tdc_dropdown_images' => true,
            "class" => "tdc-visual-selector tdc-flex-selector tdc-flex-row-layout tdc-add-class",
            'group' => 'Layout',
            "info_img" => "https://cloud.tagdiv.com/help/row_layout_layout.png",
        ),
        array(
            "param_name" => "flex_layout_reverse",
            "type" => "checkbox-responsive",
            "value" => '',
            "heading" => "Reverse columns order",
            "description" => "",
            "holder" => "div",
            "class" => "tdc-flex-row-layout-checkbox tdc-flex-row-layout-checkbox-reverse",
            'group' => 'Layout',
            "info_img" => "https://cloud.tagdiv.com/help/row_layout_reverse.png",
        ),
        array(
            "param_name" => "flex_wrap",
            "type" => "checkbox-responsive",
            "value" => '',
            "heading" => "Wrap columns",
            "description" => "",
            "holder" => "div",
            "class" => "tdc-flex-row-layout-checkbox tdc-flex-row-layout-checkbox-wrap",
            'group' => 'Layout',
            "info_img" => "https://cloud.tagdiv.com/help/row_layout_wrap.png",
        ),
        array(
            "param_name" => "flex_horiz_align",
            "type" => "dropdown-responsive",
            "value" => array(
                'Start' => 'flex-start',
                'Center' => 'center',
                'End' => 'flex-end',
                'Space between' => 'space-between',
                'Space evenly' => 'space-evenly',
            ),
            "heading" => 'Horizontal align',
            "description" => "",
            "holder" => "div",
            'tdc_dropdown_images' => true,
            "class" => "tdc-visual-selector tdc-flex-selector tdc-flex-row-horiz-align tdc-add-class",
            'group' => 'Layout',
            "info_img" => "https://cloud.tagdiv.com/help/row_layout_align.png",
        ),
        array(
            "param_name" => "flex_vert_align",
            "type" => "dropdown-responsive",
            "value" => array(
                'Start' => 'flex-start',
                'Center' => 'center',
                'End' => 'flex-end',
                'Baseline' => 'baseline',
                'Stretch' => 'stretch',
            ),
            "heading" => 'Vertical align',
            "description" => "",
            "holder" => "div",
            'tdc_dropdown_images' => true,
            "class" => "tdc-visual-selector tdc-flex-selector tdc-flex-row-vert-align tdc-add-class",
            'group' => 'Layout',
            "info_img" => "https://cloud.tagdiv.com/help/row_layout_align.png",
        ),
        array(
            "param_name" => "separator",
            "type" => "horizontal_separator",
            "value" => "",
            "class" => "tdc-separator-small",
            "group" => "Layout"
        ),
        array(
            'param_name' => 'flex_order',
            'type' => 'textfield-responsive',
            'value' => '',
            'heading' => 'Order',
            'description' => '',
            'placeholder' => 'auto',
            'class' => 'tdc-textfield-small',
            "group" => "Layout",
            "info_img" => "https://cloud.tagdiv.com/help/row_layout_order.png",
        ),
    );

    $flexOccupy = array(
        array(
            "param_name" => "flex_grow",
            "type" => "dropdown-responsive",
            "value" => array(
                'Default' => 'default',
                'On' => 'on',
                'Off' => 'off',
            ),
            "heading" => 'Occupy remaining space in row',
            "description" => "",
            "holder" => "div",
            'tdc_dropdown_images' => true,
            "class" => "tdc-visual-selector tdc-flex-selector tdc-flex-grow tdc-add-class",
            'group' => 'Layout',
            "info_img" => "https://cloud.tagdiv.com/help/row_layout_width.png",
        ),
    );
    $flexWidth = array(
        array(
            'param_name' => 'flex_width',
            'type' => 'textfield-responsive',
            'value' => '',
            'heading' => 'Width',
            'description' => '',
            'placeholder' => '',
            'class' => 'tdc-textfield-small',
            "group" => "Layout",
            "info_img" => "https://cloud.tagdiv.com/help/row_layout_width.png",
        ),
    );
}


$zoneParams = array_merge(
    array(
        array(
            'param_name' => 'type',
            'type' => 'textfield',
            'value' => '',
            'heading' => 'Type',
            'description' => '',
            'class' => 'tdc-textfield-big',
        ),
        array(
            "param_name" => "row_full_height",
            "type" => "checkbox-responsive",
            "value" => '',
            "heading" => "Full height",
            "description" => "",
            "holder" => "div",
            "class" => "",
            "info_img" => "https://cloud.tagdiv.com/help/row_full_height.png",
        ),
        array(
            "param_name" => "row_parallax",
            "type" => "checkbox",
            "value" => '',
            "heading" => "Add parallax",
            "description" => "",
            "holder" => "div",
            "class" => "",
            "info_img" => "https://cloud.tagdiv.com/help/row_add_parallax.png",
        ),
        array(
            "param_name" => "row_fixed",
            "type" => "checkbox",
            "value" => '',
            "heading" => "Fixed background image",
            "description" => "",
            "holder" => "div",
            "class" => "",
            "info_img" => "https://cloud.tagdiv.com/help/row_fixed_background_image.png",
        ),
        array(
            "type" => "gradient",
            "holder" => "div",
            "class" => "",
            "heading" => 'Background gradient',
            "param_name" => "row_bg_gradient",
            "value" => '',
            "description" => '',
            "group" => "",
            "info_img" => "https://cloud.tagdiv.com/help/row_background_gradient.png",
        ),
    ),
    td_config_helper::get_map_block_shadow_array('zone_shadow', 'Shadow', 0, 0, 6, '', '', 0, true, '', 'https://cloud.tagdiv.com/help/row_shadow.png', '' ),
    array(
        array(
            "param_name" => "separator",
            "type" => "text_separator",
            "value" => "",
            "heading" => "Video background",
            "class" => ""
        ),

        array(
            'param_name' => 'video_background',
            'type' => 'textfield',
            'value' => '',
            'heading' => 'Youtube ID',
            'description' => '',
            'class' => 'tdc-textfield-big',
            "info_img" => "https://cloud.tagdiv.com/help/row_video_background.png",
        ),

		array(
			'param_name' => 'video_start',
			'type' => 'textfield',
			'value' => '',
			'heading' => 'Start video at',
			'description' => 'Add the time in seconds',
			'class' => 'tdc-textfield-small',
		),

        array(
            'param_name' => 'video_scale',
            'type' => 'textfield',
            'value' => '',
            'heading' => 'Scale',
            'description' => '',
            'class' => 'tdc-textfield-small',
        ),

        array(
            'param_name' => 'video_opacity',
            'type' => 'range',
            'value' => '1',
            'heading' => 'Opacity',
            'description' => '',
            'class' => 'tdc-textfield-small',
            'range_min' => '0',
            'range_max' => '1',
            'range_step' => '0.02',
        ),

        array(
            "param_name" => "separator",
            "type" => "horizontal_separator",
            "value" => "",
            "description" => "",
            "holder" => "div",
            "class" => "",
        ),

        array(
            'type' => 'textfield', // should have been vc_el_id but we use textfield
            'heading' => 'Zone ID',
            'param_name' => 'el_id',
            'description' => 'Make sure that this is unique on the page',
            'class' => 'tdc-textfield-extrabig',
        ),

        array(
            'type' => 'textfield',
            'heading' => 'Extra class',
            'param_name' => 'el_class',
            'description' => 'Add a class to this row',
            'class' => 'tdc-textfield-extrabig',
        ),

        array (
            'param_name' => 'css',
            'value' => '',
            'type' => 'css_editor',
            'heading' => 'Css',
            'group' => 'Design options',
        ),

        array (
            'param_name' => 'tdc_css',
            'value' => '',
            'type' => 'tdc_css_editor',
            'heading' => '',
            'group' => 'Design options',
        ),
    ),

    array(
        array(
            "param_name" => "separator",
            "type" => "text_separator",
            "value" => "",
            "heading" => "Zone specific parameters",
            "class" => "",
            'zone_group' => 'tdc_header_desktop',
        ),
        array(
            'param_name' => 'h_display',
            'heading' => 'Display',
            'type' => 'dropdown-responsive',
            'value' => array (
                'Default' => '',
                'Overlay' => 'absolute',
                'Fixed Top' => 'fixed',
                'Fixed Bottom' => 'fixed_bottom',
            ),
            'class' => 'tdc-dropdown-extrabig',
            'zone_group' => 'tdc_header_desktop',
        ),
    ),

    array(
        array(
            "param_name" => "separator",
            "type" => "text_separator",
            "value" => "",
            "heading" => "Zone specific parameters",
            "class" => "",
            'zone_group' => 'tdc_header_desktop_sticky',
        ),
        array(
            'param_name' => 'hs_sticky_type',
            'heading' => 'Sticky type',
            'type' => 'dropdown',
            'value' => array (
                'Always' => '',
                'Smart snap' => 'smart_snap',
            ),
            'class' => 'tdc-dropdown-big',
            'zone_group' => 'tdc_header_desktop_sticky',
            "info_img" => "https://cloud.tagdiv.com/help/zone_sticky.png",
        ),
        array(
            'param_name' => 'hs_sticky_offset',
            'type' => 'range-responsive',
            'value' => '100',
            'heading' => 'Sticky offset',
            'description' => 'Distance from top of the page when the menu is hiding',
            'class' => 'tdc-textfield-small',
            'range_min' => '-100',
            'range_max' => '200',
            'range_step' => '1',
            'zone_group' => 'tdc_header_desktop_sticky',
            "info_img" => "https://cloud.tagdiv.com/help/zone_sticky_offset.png",
        ),
        array(
            "param_name" => "separator",
            "type"       => "horizontal_separator",
            "value"      => "",
            "class"      => "tdc-separator-small",
            "group"       => '',
            'zone_group' => 'tdc_header_desktop_sticky',
        ),
        array(
            'param_name' => 'hs_transition_effect',
            'heading' => 'Transition effect',
            'type' => 'dropdown-responsive',
            'value' => array (
                'None' => '',
                'Opacity' => 'opacity',
                'Slide down' => 'slide',
            ),
            'class' => 'tdc-dropdown-big',
            'zone_group' => 'tdc_header_desktop_sticky',
            "info_img" => "https://cloud.tagdiv.com/help/zone_effect.png",
        ),
        array(
            'param_name' => 'hs_opacity',
            'type' => 'range-responsive',
            'value' => '1',
            'heading' => 'Opacity',
            'description' => '',
            'class' => 'tdc-textfield-small',
            'range_min' => '0',
            'range_max' => '1',
            'range_step' => '0.02',
            'zone_group' => 'tdc_header_desktop_sticky',
            "info_img" => "https://cloud.tagdiv.com/help/zone_opacity.png",
        ),
        array(
            'param_name' => 'hs_transitions_speed',
            'type' => 'range-responsive',
            'value' => '0.4',
            'heading' => 'Transition speed',
            'description' => '',
            'class' => 'tdc-textfield-small',
            'range_min' => '0.1',
            'range_max' => '10',
            'range_step' => '0.1',
            'zone_group' => 'tdc_header_desktop_sticky',
            "info_img" => "https://cloud.tagdiv.com/help/zone_speed.png",
        ),
    ),

    array(
        array(
            "param_name" => "separator",
            "type" => "text_separator",
            "value" => "",
            "heading" => "Zone specific parameters",
            "class" => "",
            'zone_group' => 'tdc_header_mobile',
        ),
        array(
            'param_name' => 'm_display',
            'heading' => 'Display',
            'type' => 'dropdown',
            'value' => array (
                'Default' => 'relative',
                'Overlay' => 'absolute',
                'Fixed Top' => 'fixed',
                'Fixed Bottom' => 'fixed_bottom',
            ),
            'class' => 'tdc-dropdown-extrabig',
            'zone_group' => 'tdc_header_mobile',
        ),
    ),

    array(
        array(
            "param_name" => "separator",
            "type" => "text_separator",
            "value" => "",
            "heading" => "Zone specific parameters",
            "class" => "",
            'zone_group' => 'tdc_header_mobile_sticky',
        ),
        array(
            'param_name' => 'ms_sticky_type',
            'heading' => 'Sticky type',
            'type' => 'dropdown',
            'value' => array (
                'Always' => '',
                'Smart snap' => 'smart_snap',
            ),
            'class' => 'tdc-dropdown-big',
            'zone_group' => 'tdc_header_mobile_sticky',
            "info_img" => "https://cloud.tagdiv.com/help/zone_sticky.png",
        ),
        array(
            'param_name' => 'ms_sticky_offset',
            'type' => 'range-responsive',
            'value' => '100',
            'heading' => 'Sticky offset',
            'description' => 'Distance from top of the page when the menu is hiding',
            'class' => 'tdc-textfield-small',
            'range_min' => '-100',
            'range_max' => '200',
            'range_step' => '1',
            'zone_group' => 'tdc_header_desktop_sticky',
            "info_img" => "https://cloud.tagdiv.com/help/zone_sticky_offset.png",
        ),
        array(
            "param_name" => "separator",
            "type"       => "horizontal_separator",
            "value"      => "",
            "class"      => "tdc-separator-small",
            "group"       => '',
            'zone_group' => 'tdc_header_mobile_sticky',
        ),
        array(
            'param_name' => 'ms_transition_effect',
            'heading' => 'Transition effect',
            'type' => 'dropdown',
            'value' => array (
                'None' => 'none',
                'Opacity' => 'opacity',
                'Slide down' => 'slide',
            ),
            'class' => 'tdc-dropdown-big',
            'zone_group' => 'tdc_header_mobile_sticky',
            "info_img" => "https://cloud.tagdiv.com/help/zone_effect.png",
        ),
        array(
            'param_name' => 'ms_opacity',
            'type' => 'range',
            'value' => '1',
            'heading' => 'Opacity',
            'description' => '',
            'class' => 'tdc-textfield-small',
            'range_min' => '0',
            'range_max' => '1',
            'range_step' => '0.02',
            'zone_group' => 'tdc_header_mobile_sticky',
            "info_img" => "https://cloud.tagdiv.com/help/zone_opacity.png",
        ),
        array(
            'param_name' => 'ms_transitions_speed',
            'type' => 'range',
            'value' => '0.4',
            'heading' => 'Transition speed',
            'description' => '',
            'class' => 'tdc-textfield-small',
            'range_min' => '0.1',
            'range_max' => '10',
            'range_step' => '0.1',
            'zone_group' => 'tdc_header_mobile_sticky',
            "info_img" => "https://cloud.tagdiv.com/help/zone_speed.png",
        ),
    )
);

$sticky_row = array();
if( 'Newspaper' === TD_THEME_NAME ) {
    $sticky_row = array_merge(
        array(
            array(
                "param_name" => "separator",
                "type" => "text_separator",
                "value" => "",
                "heading" => "Sticky row",
                "class" => ""
            ),
            array(
                "param_name" => "is_sticky",
                "type" => "checkbox",
                "value" => '',
                "heading" => "Sticky",
                "description" => "",
                "holder" => "div",
                "class" => "",
                "info_img" => "https://cloud.tagdiv.com/help/row_sticky.png",
            ),
            array (
                'param_name' => 'sticky_position',
                'heading' => 'Sticky position',
                'type' => 'dropdown',
                'value' => array (
                    'Top' => '',
                    'Bottom' => 'bottom',
                ),
                'class' => 'tdc-dropdown-big',
                "info_img" => "https://cloud.tagdiv.com/help/row_sticky_position.png",
            ),
            array(
                "param_name" => "separator",
                "type" => "horizontal_separator",
                "value" => "",
                "description" => "",
                "holder" => "div",
                "class" => "",
            ),
            array(
                "type" => "gradient",
                "holder" => "div",
                "class" => "",
                "heading" => 'Sticky row background gradient',
                "param_name" => "row_bg_gradient_s",
                "value" => '',
                "description" => '',
                "group" => "",
                "info_img" => "",
            ),
        ),
        td_config_helper::get_map_block_shadow_array('row_shadow_s', 'Sticky row shadow', 0, 0, 4, '', '',  0, true, '', '', '' )
    );
}

$rowParams = array_merge(
    array(
        // internal modifier - does not update atts
        array (
            'param_name' => 'tdc_row_columns_modifier',
            'heading' => 'Layout',
            'type' => 'dropdown',
            'value' => $rowColumns,
            'tdc_dropdown_images' => true, // show image selector instead of classic dropdown
            'class' => 'tdc-row-col-dropdown tdc-visual-selector',
            "info_img" => "https://cloud.tagdiv.com/help/row_layout.png",
        ),

        array(
            'param_name' => 'gap',
            'type' => 'textfield-responsive',
            'value' => '',
            'heading' => 'Columns gap',
            'description' => '',
            'class' => 'tdc-textfield-small',
            "info_img" => "https://cloud.tagdiv.com/help/row_columns_gap.png",
        ),

        array(
            "param_name" => "content_align_vertical",
            "type" => "dropdown",
            "value" => array(
                'Top' => 'content-vert-top',
                'Center' => 'content-vert-center',
                'Bottom' => 'content-vert-bottom'
            ),
            "heading" => 'Vertical align',
            "description" => "",
            "holder" => "div",
            'tdc_dropdown_images' => true,
            "class" => "tdc-visual-selector tdc-add-class",
            "info_img" => "https://cloud.tagdiv.com/help/row_vertical_align.png",
        ),

        array(
            "param_name" => "row_full_height",
            "type" => "checkbox-responsive",
            "value" => '',
            "heading" => "Full height",
            "description" => "",
            "holder" => "div",
            "class" => "",
            "info_img" => "https://cloud.tagdiv.com/help/row_full_height.png",
        ),

        array(
            "param_name" => "row_hide_on_pagination",
            "type" => "checkbox-responsive",
            "value" => '',
            "heading" => "Hide on pagination",
            "description" => "Hides this row on templates that are using pagination when you navigate to the page 2,3,4..",
            "holder" => "div",
            "class" => "",
            "info_img" => "https://cloud.tagdiv.com/help/row_hide_on_pagination.png",
        ),

        array(
            "param_name" => "row_parallax",
            "type" => "checkbox",
            "value" => '',
            "heading" => "Add parallax",
            "description" => "",
            "holder" => "div",
            "class" => "",
            "info_img" => "https://cloud.tagdiv.com/help/row_add_parallax.png",
        ),

        array(
            "param_name" => "row_anim_off",
            "type" => "checkbox",
            "value" => '',
            "heading" => "Turn off bg transition",
            "description" => "This option turn off the image transition on load",
            "holder" => "div",
            "class" => "",
            "info_img" => "https://cloud.tagdiv.com/help/row_turn_off_bg_transition.png",
        ),

        array(
            "param_name" => "row_fixed",
            "type" => "checkbox",
            "value" => '',
            "heading" => "Fixed background image",
            "description" => "",
            "holder" => "div",
            "class" => "",
            "info_img" => "https://cloud.tagdiv.com/help/row_fixed_background_image.png",
        ),
        array(
            "type" => "gradient",
            "holder" => "div",
            "class" => "",
            "heading" => 'Background gradient',
            "param_name" => "row_bg_gradient",
            "value" => '',
            "description" => '',
            "group" => "",
            "info_img" => "https://cloud.tagdiv.com/help/row_background_gradient.png",
        ),
    ),
    td_config_helper::get_map_block_shadow_array('row_shadow', 'Shadow', 0, 0, 6, '', '',  0, true, '', 'https://cloud.tagdiv.com/help/row_shadow.png', '' ),

    $sticky_row,
    array(

        array(
            "param_name" => "separator",
            "type" => "text_separator",
            "value" => "",
            "heading" => "Video background",
            "class" => ""
        ),

        array(
            'param_name' => 'video_background',
            'type' => 'textfield',
            'value' => '',
            'heading' => 'Youtube ID or self hosted url',
            'description' => '',
            'class' => 'tdc-textfield-extrabig',
            "info_img" => "https://cloud.tagdiv.com/help/row_video_background.png",
        ),
		array(
			'param_name' => 'video_start',
			'type' => 'textfield',
			'value' => '',
			'heading' => 'Start video at',
			'description' => 'Add the time in seconds',
			'class' => 'tdc-textfield-small',
		),
        array(
            'param_name' => 'video_scale',
            'type' => 'textfield',
            'value' => '',
            'heading' => 'Scale',
            'description' => '',
            'class' => 'tdc-textfield-small',
        ),

        array(
            'param_name' => 'video_opacity',
            'type' => 'range',
            'value' => '1',
            'heading' => 'Opacity',
            'description' => '',
            'class' => 'tdc-textfield-small',
            'range_min' => '0',
            'range_max' => '1',
            'range_step' => '0.02',
        ),

        array(
            "param_name" => "separator",
            "type" => "horizontal_separator",
            "value" => "",
            "description" => "",
            "holder" => "div",
            "class" => "",
        ),

        array (
            'param_name' => 'full_width',
            'heading' => 'Row stretch',
            'type' => 'dropdown',
            'value' => array (
                'Default' => '',
                'Stretch row' => 'stretch_row',
                'Stretch row and 1200px content' => 'stretch_row_1200 td-stretch-content',
                'Stretch row and 1400px content' => 'stretch_row_1400 td-stretch-content',
                'Stretch row and 1600px content' => 'stretch_row_1600 td-stretch-content',
                'Stretch row and 1800px content' => 'stretch_row_1800 td-stretch-content',
                'Stretch row and content' => 'stretch_row_content td-stretch-content',
                'Stretch row and content (with paddings)' => 'stretch_row_content_no_space td-stretch-content',
            ),
            'class' => 'tdc-row-stretch-dropdown tdc-dropdown-extrabig',
            "info_img" => "https://cloud.tagdiv.com/help/row_stretch.png",
        ),
        array(
            "param_name" => "stretch_off",
            "type" => "checkbox",
            "value" => '',
            "heading" => "Stretch row off",
            "description" => "",
            "holder" => "div",
            "class" => "",
            'group' => '',
            "info_img" => "https://cloud.tagdiv.com/help/row_stretch_row_off.png",
        ),

        array(
            'type' => 'textfield', // should have been vc_el_id but we use textfield
            'heading' => 'Row ID',
            'param_name' => 'el_id',
            'description' => 'Make sure that this is unique on the page',
            'class' => 'tdc-textfield-extrabig',
        ),

        array(
            'type' => 'textfield',
            'heading' => 'Extra class',
            'param_name' => 'el_class',
            'description' => 'Add a class to this row',
            'class' => 'tdc-textfield-extrabig',
        ),
        array(
            'param_name' => 'row_height',
            'type' => 'textfield-responsive',
            'value' => '',
            'heading' => 'Height',
            'description' => '',
            'placeholder' => 'auto',
            'class' => 'tdc-textfield-small',
            "info_img" => "https://cloud.tagdiv.com/help/row_height.png",
        ),
    ),

    td_util::get_display_restrictions_atts(),

    array(

	    array(
		    "type" => 'textfield-responsive',
		    "param_name" => 'svg_z_index',
		    "value" => '',
		    "heading" => 'Z-index',
		    "class" => 'tdc-textfield-small',
		    "description" => 'Optional - Choose a custom z-index',
		    "placeholder" => "0",
		    'group' => 'Divider',
	    ),
        array(
            "param_name" => "separator",
            "type" => "text_separator",
            "value" => "",
            "heading" => "Top",
            "class" => "",
            'group' => 'Divider',
        ),
	    array(
		    "param_name" => "row_divider_top",
		    "type" => "dropdown",
		    "value" => array(
			    'No divider' => '',
			    '01 - Smooth waves' => 'tdc-divider1',
			    '02 - Slope' => 'tdc-divider2',
			    '03 - Slopes' => 'tdc-divider3',
			    '04 - Triangle' => 'tdc-divider4',
			    '05 - Triangles' => 'tdc-divider5',
			    '06 - Side triangle' => 'tdc-divider6',
			    '07 - Side triangles' => 'tdc-divider7',
			    '08 - Waves' => 'tdc-divider8',
			    '09 - Mountain' => 'tdc-divider9',
			    '10 - Mountains' => 'tdc-divider10',
			    '11 - Ramp' => 'tdc-divider11',
			    '12 - Rounded' => 'tdc-divider12',
			    '13 - Rounded side' => 'tdc-divider13',
			    '14 - Rounded lines' => 'tdc-divider14',
			    '15 - Rounded sign' => 'tdc-divider15',
			    '16 - Triangle sign' => 'tdc-divider16',
			    '17 - Zipper' => 'tdc-divider17',
			    '18 - Small zipper' => 'tdc-divider18',
			    '19 - Clouds' => 'tdc-divider19',
			    '20 - Drops' => 'tdc-divider20',
		    ),
		    "heading" => 'Divider type',
		    "description" => "",
		    "holder" => "div",
		    'tdc_dropdown_images' => true,
		    "class" => "tdc-visual-selector tdc-add-class tdc-dividers-class tdc-dividers-class-top",
		    'group' => 'Divider',
            "info_img" => "https://cloud.tagdiv.com/help/row_divider.png",
	    ),
        array(
            "type" => 'textfield-responsive',
            "param_name" => 'svg_height_top',
            "value" => '',
            "heading" => 'Height',
            "class" => 'tdc-textfield-small',
            "description" => 'Optional - Choose a custom height for the separator',
            "placeholder" => "400",
            'group' => 'Divider',
            "info_img" => "https://cloud.tagdiv.com/help/row_divider_height.png",
        ),
        array(
            "type" => 'textfield-responsive',
            "param_name" => 'svg_width_top',
            "value" => '',
            "heading" => 'Width',
            "class" => 'tdc-textfield-small',
            "description" => 'Optional - Choose a custom height for the separator',
            "placeholder" => "1000",
            'group' => 'Divider',
            "info_img" => "https://cloud.tagdiv.com/help/row_divider_width.png",
        ),
        array(
            "param_name" => "svg_flip_top",
            "type" => "checkbox",
            "value" => '',
            "heading" => "Flip",
            "description" => "",
            "holder" => "div",
            "class" => "",
            'group' => 'Divider',
            "info_img" => "https://cloud.tagdiv.com/help/row_divider_flip.png",
        ),
        array(
            'param_name' => 'space_top',
            'type' => 'range-responsive',
            'value' => '0',
            'heading' => 'Space',
            'description' => '',
            'class' => 'tdc-textfield-small',
            'range_min' => '0',
            'range_max' => '200',
            'range_step' => '2',
            'group' => 'Divider',
            "info_img" => "https://cloud.tagdiv.com/help/row_divider_space.png",
        ),
        array(
            "param_name" => "separator",
            "type" => "horizontal_separator",
            "value" => "",
            "description" => "",
            "holder" => "div",
            "class" => "",
            'group' => 'Divider',
        ),
        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => 'Background color',
            "param_name" => "svg_background_color_top",
            "value" => '',
            "description" => '',
            'group' => 'Divider',
            "info_img" => "https://cloud.tagdiv.com/help/row_divider_color.png",
        ),
    ),
    td_config_helper::get_map_block_shadow_array('shadow_top', 'Shadow', 0, 0, 2, 'Divider', '', 0, true, 'td-row-divider-shadow'),

    array(
        array(
            "param_name" => "separator",
            "type" => "text_separator",
            "value" => "",
            "heading" => "Botttom",
            "class" => "",
            'group' => 'Divider',
        ),
	    array(
		    "param_name" => "row_divider_bottom",
		    "type" => "dropdown",
		    "value" => array(
			    'No divider' => '',
			    '01 - Smooth waves' => 'tdc-divider1',
			    '02 - Slope' => 'tdc-divider2',
			    '03 - Slopes' => 'tdc-divider3',
			    '04 - Triangle' => 'tdc-divider4',
			    '05 - Triangles' => 'tdc-divider5',
			    '06 - Side triangle' => 'tdc-divider6',
			    '07 - Side triangles' => 'tdc-divider7',
			    '08 - Waves' => 'tdc-divider8',
			    '09 - Mountain' => 'tdc-divider9',
			    '10 - Mountains' => 'tdc-divider10',
			    '11 - Ramp' => 'tdc-divider11',
			    '12 - Rounded' => 'tdc-divider12',
			    '13 - Rounded side' => 'tdc-divider13',
			    '14 - Rounded lines' => 'tdc-divider14',
			    '15 - Rounded sign' => 'tdc-divider15',
			    '16 - Triangle sign' => 'tdc-divider16',
			    '17 - Zipper' => 'tdc-divider17',
			    '18 - Small zipper' => 'tdc-divider18',
			    '19 - Clouds' => 'tdc-divider19',
			    '20 - Drops' => 'tdc-divider20',
		    ),
		    "heading" => 'Divider type',
		    "description" => "",
		    "holder" => "div",
		    'tdc_dropdown_images' => true,
		    "class" => "tdc-visual-selector tdc-add-class tdc-dividers-class",
		    'group' => 'Divider',
            "info_img" => "https://cloud.tagdiv.com/help/row_divider.png",
	    ),
        array(
            "type" => 'textfield-responsive',
            "param_name" => 'svg_height_bottom',
            "value" => '',
            "heading" => 'Height',
            "class" => 'tdc-textfield-small',
            "description" => 'Optional - Choose a custom height for the separator',
            "placeholder" => "400",
            'group' => 'Divider',
            "info_img" => "https://cloud.tagdiv.com/help/row_divider_height.png",
        ),
        array(
            "type" => 'textfield-responsive',
            "param_name" => 'svg_width_bottom',
            "value" => '',
            "heading" => 'Width',
            "class" => 'tdc-textfield-small',
            "description" => 'Optional - Choose a custom height for the separator',
            "placeholder" => "1000",
            'group' => 'Divider',
            "info_img" => "https://cloud.tagdiv.com/help/row_divider_width.png",
        ),
        array(
            "param_name" => "svg_flip_bottom",
            "type" => "checkbox",
            "value" => '',
            "heading" => "Flip",
            "description" => "",
            "holder" => "div",
            "class" => "",
            'group' => 'Divider',
            "info_img" => "https://cloud.tagdiv.com/help/row_divider_flip.png",
        ),
        array(
            'param_name' => 'space_bottom',
            'type' => 'range-responsive',
            'value' => '0',
            'heading' => 'Space',
            'description' => '',
            'class' => 'tdc-textfield-small',
            'range_min' => '0',
            'range_max' => '200',
            'range_step' => '2',
            'group' => 'Divider',
            "info_img" => "https://cloud.tagdiv.com/help/row_divider_space.png",
        ),
        array(
            "param_name" => "separator",
            "type" => "horizontal_separator",
            "value" => "",
            "description" => "",
            "holder" => "div",
            "class" => "",
            'group' => 'Divider',
        ),
        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => 'Background color',
            "param_name" => "svg_background_color_bottom",
            "value" => '',
            "description" => '',
            'group' => 'Divider',
            "info_img" => "https://cloud.tagdiv.com/help/row_divider_color.png",
        )
    ),
    td_config_helper::get_map_block_shadow_array('shadow_bot', 'Shadow', 0, 0, 2, 'Divider', '', 0, true, 'td-row-divider-shadow'),

    $flexParams,
    $flexWidth,

    array(
        array (
            'param_name' => 'css',
            'value' => '',
            'type' => 'css_editor',
            'heading' => 'Css',
            'group' => 'Design options',
        ),
        array (
            'param_name' => 'tdc_css',
            'value' => '',
            'type' => 'tdc_css_editor',
            'heading' => '',
            'group' => 'Design options',
        )
    )
);

// Remove the 'Row stretch' option on Newsmag
if ( 'Newsmag' === TD_THEME_NAME ) {
	foreach ($rowParams as $key => $rowParam) {
		if ( 'full_width' === $rowParam['param_name']) {
			array_splice($rowParams, $key, 1);
			break;
		}
	}


	foreach ($rowParams as $key => $rowParam) {
		if ( 'row_hide_on_pagination' === $rowParam['param_name']) {
			array_splice($rowParams, $key, 1);
			break;
		}
	}

	foreach ($rowParams as $key => $rowParam) {
		if ( 'stretch_off' === $rowParam['param_name']) {
			array_splice($rowParams, $key, 1);
			break;
		}
	}

}


tdc_mapper::map_shortcode(
	array(
		'base' => 'tdc_zone',
		'name' => __('Zone' , 'td_composer'),
		'is_container' => true,
		'icon' => 'tdc-icon-row',
		'category' => __('Content', 'td_composer'),
		'description' => __('Zone description', 'td_composer'),
        'tdc_start_values'       => base64_encode(
            json_encode(
                array(
                    array(
                        "hs_transition_effect" => "slide",

                        "ms_transition_effect" => "slide",
                    )
                )
            )
        ),
        'tdc_style_params' => array(
            'video_background',
            'el_id',
            'el_class'
        ),
		'params' => $zoneParams
	)
);

tdc_mapper::map_shortcode(
	array(
		'base' => 'vc_row',
		'name' => __('Row' , 'td_composer'),
		'is_container' => true,
		'icon' => 'tdc-icon-row',
		'category' => __('Content', 'td_composer'),
		'description' => __('Row description', 'td_composer'),
        'tdc_style_params' => array(
            'video_background',
            'el_id',
            'el_class'
        ),
		'params' => $rowParams
	)
);

tdc_mapper::map_shortcode(
	array(
		'base' => 'vc_column',
		'name' => __('Column', 'td_composer' ),
		'icon' => 'tdc-icon-column',
		'is_container' => true,
		'content_element' => false, // hide from the list of elements on the ui
		'description' => __( 'Place content elements inside the column', 'td_composer' ),
        'tdc_style_params' => array(
        	'width',
            'el_class'
        ),
		'params' => array_merge(
		    array(
                array(
                    "param_name" => "is_sticky",
                    "type" => "checkbox",
                    "value" => '',
                    "heading" => "Sticky",
                    "description" => "",
                    "holder" => "div",
                    "class" => "",
                    "info_img" => "https://cloud.tagdiv.com/help/column_sticky.png",
                ),
                array (
                    'param_name' => 'vertical_align',
                    'heading' => 'Vertical align',
                    'type' => 'dropdown-responsive',
                    "description" => "Deprecated: Used on mobile to align elements in columns with display inline-block. Use Layout tab options instead.",
                    'value' => array (
                        'Default' => '',
                        'Top' => 'top',
                        'Middle' => 'middle',
                        'Bottom' => 'bottom',
                    ),
                    'class' => 'tdc-dropdown-big',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => 'Extra class',
                    'param_name' => 'el_class',
                    'description' => 'Add a class to this column',
                    'class' => 'tdc-textfield-extrabig'
                ),
                array(
                    'type' => 'textfield-responsive',
                    'heading' => 'Height',
                    'param_name' => 'column_height',
                    'description' => '',
                    'class' => 'tdc-textfield-small',
                    "info_img" => "https://cloud.tagdiv.com/help/row_height.png",
                ),
            ),

            td_util::get_display_restrictions_atts(),

            $flexParams,
            $flexWidth,

            $flexOccupy,
            array(
                array (
                    'param_name' => 'css',
                    'value' => '',
                    'type' => 'css_editor',
                    'heading' => 'Css',
                    'group' => 'Design options',
                ),
                array (
                    'param_name' => 'tdc_css',
                    'value' => '',
                    'type' => 'tdc_css_editor',
                    'heading' => '',
                    'group' => 'Design options',
                ),
            )
        )
	)
);

$innerRowColumns = array (
	array(
		'1/1' => '11'
	),
	array(
		'1/2 + 1/2' => '12_12'
	),
	array(
		'2/3 + 1/3' => '23_13'
	),
	array(
		'1/3 + 2/3' => '13_23'
	),
	array(
		'1/3 + 1/3 + 1/3' => '13_13_13'
	)
);

//if ( 'Newsmag' !== TD_THEME_NAME && is_plugin_active( 'td-multi-purpose/td-multi-purpose.php' ) ) {
if ( 'Newsmag' !== TD_THEME_NAME ) {
	$innerRowColumns = array_merge( $innerRowColumns, array(
		'7/12 + 5/12' => '7_5',
		'5/12 + 7/12' => '5_7',
        '3/4 + 1/4' => '34_14',
        '1/4 + 3/4' => '14_34',
		'1/4 + 1/2 + 1/4' => '14_12_14',
        '1/4 + 1/4 + 1/4 + 1/4' => '14_14_14_14',
	));
}

$absolute_width = array();
if( 'Newspaper' === TD_THEME_NAME ) {
    $absolute_width = array(
        array (
            'param_name' => 'absolute_width',
            'heading' => 'Absolute content width',
            'type' => 'dropdown',
            'value' => array (
                'Full width content' => '',
                '1068px content' => 'absolute_inner_1068 absolute_inner',
                '1200px content' => 'absolute_inner_1200 absolute_inner',
                '1400px content' => 'absolute_inner_1400 absolute_inner',
                '1600px content' => 'absolute_inner_1600 absolute_inner',
                '1800px content' => 'absolute_inner_1800 absolute_inner',
            ),
            'class' => 'tdc-dropdown-big',
            "info_img" => "https://cloud.tagdiv.com/help/inner_row_absolute_width.png",
        )
    );
}

tdc_mapper::map_shortcode(
	array(
		'base' => 'vc_row_inner',
		'name' => __('Inner Row', 'td_composer'),
		'content_element' => false, // hide from the list of elements on the ui
		'is_container' => true,
		'icon' => 'icon-wpb-row',
		'description' => __('Place content elements inside the inner row', 'td_composer'),
        'tdc_style_params' => array(
            'el_id',
            'el_class'
        ),
		'params' => array_merge(
		    array(

                // internal modifier - does not update atts
                array (
                    'param_name' => 'tdc_inner_row_columns_modifier',
                    'heading' => 'Layout',
                    'type' => 'dropdown',
                    'value' => $innerRowColumns,
                    'tdc_dropdown_images' => true, // show image selector instead of classic dropdown
                    'class' => 'tdc-innerRow-col-dropdown tdc-visual-selector',
                    "info_img" => "https://cloud.tagdiv.com/help/inner_row_layout.png",
                ),

                array(
                    'param_name' => 'gap',
                    'type' => 'textfield-responsive',
                    'value' => '',
                    'heading' => 'Inner columns gap',
                    'description' => '',
                    'class' => 'tdc-textfield-small',
                    "info_img" => "https://cloud.tagdiv.com/help/inner_row_gap.png",
                ),

                array(
                    "param_name" => "content_align_vertical",
                    "type" => "dropdown",
                    "value" => array(
                        'Top' => 'content-vert-top',
                        'Center' => 'content-vert-center',
                        'Bottom' => 'content-vert-bottom'
                    ),
                    "heading" => 'Vertical align',
                    "description" => "",
                    "holder" => "div",
                    'tdc_dropdown_images' => true,
                    "class" => "tdc-visual-selector tdc-add-class",
                    "info_img" => "https://cloud.tagdiv.com/help/inner_row_align.png",
                ),
                array(
                    "type" => "gradient",
                    "holder" => "div",
                    "class" => "",
                    "heading" => 'Background gradient',
                    "param_name" => "row_bg_gradient",
                    "value" => '',
                    "description" => '',
                    "group" => "",
                    "info_img" => "https://cloud.tagdiv.com/help/inner_row_background.png",
                ),
            ),
            td_config_helper::get_map_block_shadow_array('row_shadow', 'Shadow', 0, 0, 6, '', '', 0, true, '', 'https://cloud.tagdiv.com/help/inner_row_shadow.png', '' ),

            array(

                array(
                    "param_name" => "separator",
                    "type" => "horizontal_separator",
                    "value" => "",
                    "class" => ""
                ),

                array(
                    "param_name" => "absolute_position",
                    "type" => "checkbox-responsive",
                    "value" => '',
                    "heading" => __( "Absolute position",  'td_composer' ),
                    "description" => "",
                    "holder" => "div",
                    "class" => "",
                    "info_img" => "https://cloud.tagdiv.com/help/inner_row_absolute2.png",
                ),

                array (
                    'param_name' => 'absolute_align',
                    'heading' => 'Absolute position align',
                    'type' => 'dropdown',
                    'value' => array (
                        'Top' => '',
                        'Center' => 'center',
                        'Bottom' => 'bottom',
                    ),
                    'class' => 'tdc-dropdown-big',
                    "info_img" => "https://cloud.tagdiv.com/help/inner_row_absolute_align.png",
                )
            ),

            $absolute_width,

            array(
                array(
                    "param_name" => "separator",
                    "type" => "horizontal_separator",
                    "value" => "",
                    "class" => ""
                ),
                array(
                    'type' => 'textfield', // should have been vc_el_id but we use textfield
                    'heading' => 'Row ID',
                    'param_name' => 'el_id',
                    'description' => 'Make sure that this is unique on the page',
                    'class' => 'tdc-textfield-extrabig',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => 'Extra class',
                    'param_name' => 'el_class',
                    'description' => 'Add a class to this row',
                    'class' => 'tdc-textfield-extrabig',
                ),
                array(
                    'type' => 'textfield-responsive',
                    'heading' => 'Height',
                    'param_name' => 'inner_row_height',
                    'description' => '',
                    'class' => 'tdc-textfield-small',
                    "info_img" => "https://cloud.tagdiv.com/help/row_height.png",
                ),

            ),

            td_util::get_display_restrictions_atts(),

            $flexParams,
            $flexOccupy,

            array(
                array (
                    'param_name' => 'css',
                    'value' => '',
                    'type' => 'css_editor',
                    'heading' => 'Css',
                    'group' => 'Design options',
                ),
                array (
                    'param_name' => 'tdc_css',
                    'value' => '',
                    'type' => 'tdc_css_editor',
                    'heading' => '',
                    'group' => 'Design options',
                ),
            )
        )
	)
);

tdc_mapper::map_shortcode(
	array(
		'base' => 'vc_column_inner',
		'name' => __( 'Inner Column', 'td_composer' ),
		'icon' => 'icon-wpb-row',
		'allowed_container_element' => false, // if it can contain other container elements (other blocks that have is_container = true)
		'content_element' => false, // hide from the list of elements on the ui
		'is_container' => true,
		'description' => __( 'Place content elements inside the inner column', 'td_composer' ),
        'tdc_style_params' => array(
        	'width',
            'el_class'
        ),
		'params' => array_merge(
		    array(
                array(
                    "param_name" => "is_sticky",
                    "type" => "checkbox",
                    "value" => '',
                    "heading" => "Sticky",
                    "description" => "",
                    "holder" => "div",
                    "class" => "",
                    "info_img" => "https://cloud.tagdiv.com/help/column_sticky.png",
                ),
                array (
                    'param_name' => 'vertical_align',
                    'heading' => 'Vertical align',
                    'type' => 'dropdown-responsive',
                    "description" => "Deprecated: Used on mobile to align elements in columns with display inline-block. Use Layout tab options instead.",
                    'value' => array (
                        'Default' => '',
                        'Top' => 'top',
                        'Middle' => 'middle',
                        'Bottom' => 'bottom',
                    ),
                    'class' => 'tdc-dropdown-big',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => 'Extra class',
                    'param_name' => 'el_class',
                    'description' => 'Add a class to this inner column',
                    'class' => 'tdc-textfield-extrabig',
                ),
                array(
                    'type' => 'textfield-responsive',
                    'heading' => 'Height',
                    'param_name' => 'column_height',
                    'description' => '',
                    'class' => 'tdc-textfield-small',
                    "info_img" => "https://cloud.tagdiv.com/help/row_height.png",
                ),
            ),

            td_util::get_display_restrictions_atts(),

            $flexParams,
            $flexWidth,
            $flexOccupy,

            array(
                array (
                    'param_name' => 'css',
                    'value' => '',
                    'type' => 'css_editor',
                    'heading' => 'Css',
                    'group' => 'Design options',
                ),
                array (
                    'param_name' => 'tdc_css',
                    'value' => '',
                    'type' => 'tdc_css_editor',
                    'heading' => '',
                    'group' => 'Design options',
                ),
            )
        )
	)
);
tdc_mapper::map_shortcode(
	array(
		'base' => 'vc_raw_html',
		'name' => __( 'Raw HTML', 'td_composer' ),
		'icon' => 'icon-wpb-raw-html',
		'category' => __( 'Content', 'td_composer' ),
		'tdc_category' => 'Extended',
		'description' => __( 'Raw html description', 'td_composer' ),
		'tdc_style_params' => array(
			'content',
			'el_class'
		),
		'params' => array(
			array(
				"param_name" => "content",
				"type" => "textarea_raw_html_ace",
				"holder" => "div",
				'class' => '',
				"heading" => 'HTML Code',
				"value" => base64_encode(__('Html code here! Replace this with any non empty raw html code and that\'s it', 'td_composer' ) ),
				"description" => 'Enter your content.'
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class', 'td_composer' ),
				'param_name' => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'td_composer' ),
				'value' => '',
				'class' => 'tdc-textfield-extrabig',
			),

			array (
				'param_name' => 'css',
				'value' => '',
				'type' => 'css_editor',
				'heading' => 'Css',
				'group' => 'Design options',
			),
			array (
				'param_name' => 'tdc_css',
				'value' => '',
				'type' => 'tdc_css_editor',
				'heading' => '',
				'group' => 'Design options',
			),
		),
	)
);

tdc_mapper::map_shortcode(
	array(
		'base' => 'vc_empty_space',
		'name' => __( 'Empty space', 'td_composer' ),
		'icon' => 'icon-wpb-empty-space',
		'category' => __( 'Content', 'td_composer' ),
		'tdc_category' => 'Extended',
		'description' => __( 'Empty space description', 'td_composer' ),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Height', 'td_composer' ),
				'param_name' => 'height',
				'description' => __( 'Custom height of the empty space', 'td_composer' ),
				'value' => '32px',
				'class' => 'tdc-textfield-extrabig',
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class', 'td_composer' ),
				'param_name' => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'td_composer' ),
				'value' => '',
				'class' => 'tdc-textfield-extrabig',
			),
			array(
				'param_name' => 'css',
				'value' => '',
				'type' => 'css_editor',
				'heading' => 'Css',
				'group' => 'Design options',
			),
			array(
				'param_name' => 'tdc_css',
				'value' => '',
				'type' => 'tdc_css_editor',
				'heading' => '',
				'group' => 'Design options',
			)
		)
	)
);

tdc_mapper::map_shortcode(
	array(
		'base' => 'vc_widget_sidebar',
		'name' => __( 'Widget sidebar', 'td_composer' ),
		'icon' => 'icon-wpb-layout_sidebar',
		'category' => __( 'Content', 'td_composer' ),
		'tdc_category' => 'Extended',
		'description' => __( 'Widget sidebar description', 'td_composer' ),
		'params' => array(
			array(
				'param_name' => 'sidebar_id',
				'heading' => 'Sidebar',
				'type' => 'dropdown',

				// The parameter is set at 'admin_head' action, there the global $wp_registered_sidebars being set (otherwise it could be set at 'init')
				// Important! Here is too early to use the global $wp_registered_sidebars, because it isn't set
				'value' => array(),
				'class' => 'tdc-widget-sidebar-dropdown tdc-dropdown-extrabig',
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class', 'td_composer' ),
				'param_name' => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'td_composer' ),
				'value' => '',
				'class' => 'tdc-textfield-extrabig',
			),
			array (
				'param_name' => 'css',
				'value' => '',
				'type' => 'css_editor',
				'heading' => 'Css',
				'group' => 'Design options',
			),
			array (
				'param_name' => 'tdc_css',
				'value' => '',
				'type' => 'tdc_css_editor',
				'heading' => '',
				'group' => 'Design options',
			),
		)
	)
);

tdc_mapper::map_shortcode(
	array(
		'base' => 'vc_separator',
		'name' => __( 'Separator', 'td_composer' ),
		'icon' => 'icon-wpb-empty-space',
		'category' => __( 'Content', 'td_composer' ),
		'tdc_category' => 'Extended',
		'description' => __( 'Separator description', 'td_composer' ),
		'tdc_style_params' => array(
			'el_class'
		),
		'params' => array(
			array(
				"param_name" => "color",
				"type" => "colorpicker",
				"value" => '#EBEBEB',
				"heading" => __( "Color", 'td_composer' ),
				"description" => "",
				"holder" => "div",
				"class" => "",
			),
			array(
				"param_name" => "align",
				"type" => "dropdown",
				"value" => array(
					'Center' => 'align_center',
					'Left' => 'align_left',
					'Right' => 'align_right',
				),
				"heading" => __( "Alignment", 'td_composer' ),
				"description" => "",
				"holder" => "div",
				"class" => "tdc-dropdown-big"
			),
			array(
				"param_name" => "style",
				"type" => "dropdown",
				"value" => array(
					'Border' => 'solid',
					'Dashed' => 'dashed',
					'Dotted' => 'dotted',
					'Double' => 'double',
					'Shadow' => 'shadow',
				),
				"heading" => __( "Style", 'td_composer' ),
				"description" => "",
				"holder" => "div",
				"class" => "tdc-dropdown-big"
			),
			array(
				"param_name" => "border_width",
				"type" => "dropdown",
				"value" => array(
					'1px' => '1',
					'2px' => '2',
					'3px' => '3',
					'4px' => '4',
					'5px' => '5',
					'6px' => '6',
					'7px' => '7',
					'8px' => '8',
					'9px' => '9',
					'10px' => '10',
				),
				"heading" => __( "Border width", 'td_composer' ),
				"description" => "",
				"holder" => "div",
				"class" => "tdc-dropdown-big"
			),
			array(
				"param_name" => "el_width",
				"type" => "dropdown",
				"value" => array(
					'100%' => '',
					'90%' => '90',
					'80%' => '80',
					'70%' => '70',
					'60%' => '60',
					'50%' => '50',
					'40%' => '40',
					'30%' => '30',
					'20%' => '20',
					'10%' => '10',
				),
				"heading" => __( "Element width", 'td_composer' ),
				"description" => "",
				"holder" => "div",
				"class" => "tdc-dropdown-big"
			),

			array(
				'param_name' => 'el_class',
				'type' => 'textfield',
				'value' => '',
				'heading' => 'Extra class',
				'description' => 'Style particular content element differently - add a class name and refer to it in custom CSS',
				'class' => 'tdc-textfield-extrabig'
			),

			array (
				'param_name' => 'css',
				'value' => '',
				'type' => 'css_editor',
				'heading' => 'Css',
				'group' => 'Design options',
			),
			array (
				'param_name' => 'tdc_css',
				'value' => '',
				'type' => 'tdc_css_editor',
				'heading' => '',
				'group' => 'Design options',
			),
		),
	)
);
//Map this block only when Woocommerce is active
if (td_global::$is_woocommerce_installed === true ) {
	tdc_mapper::map_shortcode(
		array(
			'base' => 'tdc_woo_shortcodes',
			'name' => __('Woo Shortcodes', 'td_composer'),
			'icon' => 'icon-wpb-raw-html',
			'category' => __('Content', 'td_composer'),
			'tdc_category' => 'External',
			'description' => __('Woo Shortcodes', 'td_composer'),
			'tdc_style_params' => array(
				'dropdown',
				'content',
				'el_class'
			),
			'params' => array_merge(array(
                    array(
                        'param_name' => 'woo_shortcode',
                        'heading' => 'Select Woo Shortcode',
                        'type' => 'dropdown',

                        // The parameter is set at 'admin_head' action, there the global $wp_registered_sidebars being set (otherwise it could be set at 'init')
                        // Important! Here is too early to use the global $wp_registered_sidebars, because it isn't set
                        'value' => array(
                            'Select woo shortcode' => "",
                            'New Products' => base64_encode('[products limit="4" columns="4" orderby="date" order="DESC" visibility="visible"]'),
                            'Featured Products' => base64_encode('[products limit="4" columns="4" visibility="featured" ]'),
                            'Best Selling Products' => base64_encode('[products limit="4" columns="4" best_selling="true" ]'),
                            'Most Popular "On-Sale" Products' => base64_encode('[products limit="4" columns="4" orderby="popularity" on_sale="true"]'),
                            'Products by Rating' => base64_encode('[top_rated_products limit="4" columns="4"] '),
                            'Products by Category Slug' => base64_encode('[product_category category="hoodies" limit="4" columns="4" orderby="date" order="desc"]'),
                            'Product Categories' => base64_encode('[product_categories number="4" columns="4"]'),
                        ),
                        'class' => 'tdc-dropdown-extrabig',
                    ),
                    array(
                        "param_name" => "content",
                        "type" => "do_shortcode_textfield",
                        "holder" => "div",
                        'class' => '',
                        "heading" => 'Selected shortcode',
                        "value" => '',
                        "description" => 'Modify the woocommerce shortcode attributes from the textfield (e.g. columns number, limit)'
                    ),

                    array(
                        "param_name" => "separator",
                        "type"       => "text_separator",
                        'heading'    => 'Layout',
                        "value"      => "",
                        "class"      => "",
                        "group"       => "",
                    ),
                    array(
                        "param_name"  => "gap",
                        "type"        => "textfield-responsive",
                        "value"       => '',
                        "heading"     => 'Products gap',
                        "description" => "",
                        "holder"      => "div",
                        "class"       => "tdc-textfield-small",
                        "placeholder" => "40",
                        "group"       => "",
                    ),
                    array(
                        "param_name"  => "space",
                        "type"        => "textfield-responsive",
                        "value"       => '',
                        "heading"     => 'Products bottom space',
                        "description" => "",
                        "holder"      => "div",
                        "class"       => "tdc-textfield-small",
                        "placeholder" => "40",
                        "group"       => "",
                    ),
                    array(
                        "param_name"  => "img_space",
                        "type"        => "textfield-responsive",
                        "value"       => '',
                        "heading"     => 'Image bottom margin',
                        "description" => "",
                        "holder"      => "div",
                        "class"       => "tdc-textfield-small",
                        "placeholder" => "8",
                        "group"       => "",
                    ),
                    array(
                        "param_name"  => "title_space",
                        "type"        => "textfield-responsive",
                        "value"       => '',
                        "heading"     => 'Title bottom margin',
                        "description" => "",
                        "holder"      => "div",
                        "class"       => "tdc-textfield-small",
                        "placeholder" => "0",
                        "group"       => "",
                    ),
                    array(
                        "param_name"  => "price_space",
                        "type"        => "textfield-responsive",
                        "value"       => '',
                        "heading"     => 'Price bottom margin',
                        "description" => "",
                        "holder"      => "div",
                        "class"       => "tdc-textfield-small",
                        "placeholder" => "7",
                        "group"       => "",
                    ),
                    array(
                        "param_name"  => "btn_padding",
                        "type"        => "textfield-responsive",
                        "value"       => '',
                        "heading"     => 'Button padding',
                        "description" => "",
                        "holder"      => "div",
                        "class"       => "tdc-textfield-big",
                        "placeholder" => "10px 10px 10px 10px",
                        "group"       => "",
                        "info_img" => "https://cloud.tagdiv.com/help/module_button_padding.png",
                    ),
                    array(
                        "param_name" => "separator",
                        "type" => "horizontal_separator",
                        "value" => "",
                        "class" => "tdc-separator-small",
                        "group" => '',
                    ),
                    array(
                        "param_name" => "horiz_align",
                        "type" => "dropdown",
                        "value" => array(
                            'Left' => 'content-horiz-left',
                            'Center' => 'content-horiz-center',
                            'Right' => 'content-horiz-right'
                        ),
                        "heading" => 'Horizontal align',
                        "description" => "",
                        "holder" => "div",
                        'tdc_dropdown_images' => true,
                        "class" => "tdc-visual-selector tdc-add-class",
                        "group"       => "",
                    ),
                    array(
                        "param_name" => "separator",
                        "type" => "horizontal_separator",
                        "value" => "",
                        "class" => "tdc-separator-small",
                        "group" => '',
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => __('Extra class', 'td_composer'),
                        'param_name' => 'el_class',
                        'description' => __('Style particular content element differently - add a class name and refer to it in custom CSS', 'td_composer'),
                        'value' => '',
                        'class' => 'tdc-textfield-extrabig',
                    ),

                    array(
                        "type"        => "colorpicker",
                        "holder"      => "div",
                        "class"       => "td-colorpicker-double-a",
                        "heading"     => 'Title color',
                        "param_name"  => "title_color",
                        "value"       => '',
                        "description" => '',
                        "group"       => "Style",
                    ),
                    array(
                        "type"        => "colorpicker",
                        "holder"      => "div",
                        "class"       => "td-colorpicker-double-b",
                        "heading"     => 'Title hover color',
                        "param_name"  => "title_color_h",
                        "value"       => '',
                        "description" => '',
                        "group"       => "Style",
                    ),
                    array(
                        "type"        => "colorpicker",
                        "holder"      => "div",
                        "class"       => "",
                        "heading"     => 'Price color',
                        "param_name"  => "price_color",
                        "value"       => '',
                        "description" => '',
                        "group"       => "Style",
                    ),
                    array(
                        "type"        => "colorpicker",
                        "holder"      => "div",
                        "class"       => "",
                        "heading"     => 'Old price color',
                        "param_name"  => "old_price_color",
                        "value"       => '',
                        "description" => '',
                        "group"       => "Style",
                    ),
                    array(
                        "param_name" => "separator",
                        "type"       => "text_separator",
                        'heading'    => 'Sale tag',
                        "value"      => "",
                        "class"      => "tdc-separator-small",
                        "group"       => "Style",
                    ),
                    array(
                        "type"        => "colorpicker",
                        "holder"      => "div",
                        "class"       => "td-colorpicker-double-a",
                        "heading"     => 'Text color',
                        "param_name"  => "sale_txt_color",
                        "value"       => '',
                        "description" => '',
                        "group"       => "Style",
                    ),
                    array(
                        "type"        => "colorpicker",
                        "holder"      => "div",
                        "class"       => "td-colorpicker-double-b",
                        "heading"     => 'Text hover color',
                        "param_name"  => "sale_txt_color_h",
                        "value"       => '',
                        "description" => '',
                        "group"       => "Style",
                    ),
                    array(
                        "type"        => "colorpicker",
                        "holder"      => "div",
                        "class"       => "td-colorpicker-double-a",
                        "heading"     => 'Background color',
                        "param_name"  => "sale_bg_color",
                        "value"       => '',
                        "description" => '',
                        "group"       => "Style",
                    ),
                    array(
                        "type"        => "colorpicker",
                        "holder"      => "div",
                        "class"       => "td-colorpicker-double-b",
                        "heading"     => 'Background hover color',
                        "param_name"  => "sale_bg_color_h",
                        "value"       => '',
                        "description" => '',
                        "group"       => "Style",
                    ),
                    array(
                        "param_name" => "separator",
                        "type"       => "text_separator",
                        'heading'    => 'Button',
                        "value"      => "",
                        "class"      => "tdc-separator-small",
                        "group"       => "Style",
                    ),
                    array(
                        "type"        => "colorpicker",
                        "holder"      => "div",
                        "class"       => "td-colorpicker-double-a",
                        "heading"     => 'Text color',
                        "param_name"  => "btn_txt_color",
                        "value"       => '',
                        "description" => '',
                        "group"       => "Style",
                        "info_img" => "https://cloud.tagdiv.com/help/module_button_color_text.png",
                    ),
                    array(
                        "type"        => "colorpicker",
                        "holder"      => "div",
                        "class"       => "td-colorpicker-double-b",
                        "heading"     => 'Text hover color',
                        "param_name"  => "btn_txt_color_h",
                        "value"       => '',
                        "description" => '',
                        "group"       => "Style",
                    ),
                    array(
                        "type"        => "colorpicker",
                        "holder"      => "div",
                        "class"       => "td-colorpicker-double-a",
                        "heading"     => 'Background color',
                        "param_name"  => "btn_bg_color",
                        "value"       => '',
                        "description" => '',
                        "group"       => "Style",
                        "info_img" => "https://cloud.tagdiv.com/help/module_button_color_bg.png",
                    ),
                    array(
                        "type"        => "colorpicker",
                        "holder"      => "div",
                        "class"       => "td-colorpicker-double-b",
                        "heading"     => 'Background hover color',
                        "param_name"  => "btn_bg_color_h",
                        "value"       => '',
                        "description" => '',
                        "group"       => "Style",
                    ),
                    array(
                        "param_name" => "separator",
                        "type"       => "text_separator",
                        'heading'    => 'Fonts',
                        "value"      => "",
                        "class"      => "",
                        "group"       => "Style",
                    )
                ),
                td_config_helper::get_map_block_font_array( 'f_title', true, 'Title text', 'Style' ),
                td_config_helper::get_map_block_font_array( 'f_price', false, 'Price text', 'Style'),
                td_config_helper::get_map_block_font_array( 'f_old_price', false, 'Old price text', 'Style'),
                td_config_helper::get_map_block_font_array( 'f_sale', false, 'Sale tag text', 'Style'),
                td_config_helper::get_map_block_font_array( 'f_btn', false, 'Button text', 'Style'),

                array(
                    array(
                        'param_name' => 'css',
                        'value' => '',
                        'type' => 'css_editor',
                        'heading' => 'Css',
                        'group' => 'Design options',
                    ),
                    array(
                        'param_name' => 'tdc_css',
                        'value' => '',
                        'type' => 'tdc_css_editor',
                        'heading' => '',
                        'group' => 'Design options',
                    ),
                )
            ),
		)

	);
}
$single_image_video_popup = array();
//if( 'Newspaper' === TD_THEME_NAME ) {
    $single_image_video_popup = array(
        array(
            "param_name" => "separator",
            "type" => "text_separator",
            'heading' => 'Video pop-up',
            "value" => "",
            "class" => "",
        ),
        array(
            "param_name"  => "video_popup",
            "type"        => "checkbox",
            "value"       => '',
            "heading"     => "Enable",
            "description" => "",
            "holder"      => "div",
            "class"       => "",
            "group"       => '',
            "info_img" => "https://cloud.tagdiv.com/help/layout_enable_video_pop-up.png",
        ),
        array(
            "param_name"  => "video_url",
            "type"        => "textfield",
            "value"       => '',
            "heading"     => 'Video url',
            "description" => "",
            "holder"      => "div",
            "class"       => "tdc-textfield-extrabig",
            "placeholder" => "",
            "group"       => "",
        ),
        array(
            "param_name"  => "autoplay_vid",
            "type"        => "checkbox",
            "value"       => 'yes',
            "heading"     => "Autoplay video",
            "description" => "When it is inactive, the sound will be ON",
            "holder"      => "div",
            "class"       => "",
            "group"       => ''
        ),
        array(
            "param_name" => "video_rec",
            "type" => "textarea_raw_html",
            "holder" => "div",
            "class" => "tdc-textarea-raw-small",
            "heading" => 'Ad',
            "value" => "",
            "description" => 'Paste your ad code here.',
            'group'      => '',
            "info_img" => "https://cloud.tagdiv.com/help/module_video_popup_ad.png",
        ),
        array(
            "param_name" => "spot_header",
            "type" => "spot_header",
            "value" => "",
            "class" => '',
            'group' => '',
        ),
        array(
            "param_name" => "video_rec_title",
            "type" => "textfield",
            "value" => '',
            "heading" => 'Ad title',
            "description" => "",
            "placeholder" => "- Advertisement -",
            "holder" => "div",
            "class" => "tdc-textfield-extrabig tdc-spot-controller tdc-spot-title",
            'group'      => '',
        ),
        array(
            "type"        => "colorpicker",
            "holder"      => "div",
            "class"       => "tdc-spot-controller tdc-spot-color",
            "heading"     => 'Ad title color',
            "param_name"  => "video_rec_color",
            "value"       => '',
            "description" => '',
            "group"       => "",
        ),
        array(
            "param_name"  => "video_icon_size",
            "type"        => "textfield-responsive",
            "value"       => '',
            "heading"     => 'Video icon size',
            "description" => "",
            "holder"      => "div",
            "class"       => "tdc-textfield-small",
            "placeholder" => "40",
            "group"       => "",
            "info_img" => "https://cloud.tagdiv.com/help/layout_video_icon_size.png",
        ),
        array(
            "param_name" => "separator",
            "type" => "text_separator",
            'heading' => 'Style',
            "value" => "",
            "class" => "tdc-separator-small",
            "group" => ""
        ),
        array(
            "param_name" => "video_bg",
            "holder"     => "div",
            "type"       => "gradient",
            'heading'    => "Background color",
            "value"      => "",
            "class"      => "",
            "group"      => "",
            "info_img" => "https://cloud.tagdiv.com/help/module_video_background.png",
        ),
        array(
            "param_name" => "video_overlay",
            "holder"     => "div",
            "type"       => "gradient",
            'heading'    => "Overlay color",
            "value"      => "",
            "class"      => "",
            "group"      => "",
            "info_img" => "https://cloud.tagdiv.com/help/module_video_overlay_color.png",
        ),
    );
//}
$tdc_api_blocks = array(
	array(
		'base' => 'vc_wp_recentcomments',
		'name' => __( 'Recent comments', 'td_composer' ),
		'icon' => 'icon-wpb-empty-space',
		'category' => __( 'Content', 'td_composer' ),
		'tdc_category' => 'Extended',
		'description' => __( 'Description', 'td_composer' ),
        'tdc_style_params' => array(
            'custom_title',
            'custom_url',
            'el_class'
        ),
        'tdc_start_values'       => base64_encode(
            json_encode(
                array(
                    array(
                        'com_divider' => 'dashed',
						'number' => 5
                    ),
                )
            )
        ),
		'params' => array_merge(
			$block_general_params_array,
	        array(
				array(
	                "param_name" => "number",
					"type" => "textfield",
					"value" => "",
					"heading" => 'Number of comments:',
					"description" => "Optional - a title for this block, if you leave it blank the block will not have a title",
					"holder" => "div",
					'class' => 'tdc-textfield-small'
	            ),

                array(
                    "param_name" => "separator",
                    "type"       => "text_separator",
                    'heading'    => 'Style',
                    "value"      => "",
                    "class"      => "",
                ),
                array(
                    "param_name"  => "com_margin",
                    "type"        => "textfield-responsive",
                    "value"       => '',
                    "heading"     => 'Comments margin',
                    "description" => "",
                    "holder"      => "div",
                    "class"       => "tdc-textfield-big",
                    "placeholder" => "10px 12px",
                    "group"       => "",
                ),
                array(
                    "param_name"  => "com_padding",
                    "type"        => "textfield-responsive",
                    "value"       => '',
                    "heading"     => 'Comments padding',
                    "description" => "",
                    "holder"      => "div",
                    "class"       => "tdc-textfield-big",
                    "placeholder" => "0 0 13px",
                    "group"       => "",
                ),
                array(
                    "param_name"  => "com_divider",
                    "type"        => "dropdown",
                    "value"       => array(
                        'None'   => '',
                        'Solid'  => 'solid',
                        'Dotted' => 'dotted',
                        'Dashed' => 'dashed',
                    ),
                    "heading"     => 'Comments divider',
                    "description" => "",
                    "holder"      => "div",
                    "class"       => "tdc-dropdown-big",
                    "group"       => "",
                ),
                array(
                    "type"        => "colorpicker",
                    "holder"      => "div",
                    "class"       => "",
                    "heading"     => 'Comments divider color',
                    "param_name"  => "com_divider_color",
                    "value"       => '#eaeaea',
                    "description" => '',
                    "group"       => "",
                ),
                array(
                    "param_name" => "separator",
                    "type"       => "horizontal_separator",
                    "value"      => "",
                    "class"      => "tdc-separator-small",
                    "group"       => '',
                ),
                array(
                    "type"        => "colorpicker",
                    "holder"      => "div",
                    "class"       => "",
                    "heading"     => 'Linking word color',
                    "param_name"  => "link_color",
                    "value"       => '',
                    "description" => '',
                    "group"       => "",
                ),
                array(
                    "type"        => "colorpicker",
                    "holder"      => "div",
                    "class"       => "",
                    "heading"     => 'Author name color',
                    "param_name"  => "auth_color",
                    "value"       => '',
                    "description" => '',
                    "group"       => "",
                ),
                array(
                    "type"        => "colorpicker",
                    "holder"      => "div",
                    "class"       => "",
                    "heading"     => 'Author name hover color',
                    "param_name"  => "auth_h_color",
                    "value"       => '',
                    "description" => '',
                    "group"       => "",
                ),
                array(
                    "type"        => "colorpicker",
                    "holder"      => "div",
                    "class"       => "",
                    "heading"     => 'Post title color',
                    "param_name"  => "title_color",
                    "value"       => '',
                    "description" => '',
                    "group"       => "",
                ),
                array(
                    "type"        => "colorpicker",
                    "holder"      => "div",
                    "class"       => "",
                    "heading"     => 'Post title hover color',
                    "param_name"  => "title_h_color",
                    "value"       => '',
                    "description" => '',
                    "group"       => "",
                ),
                array(
                    "param_name" => "separator",
                    "type"       => "horizontal_separator",
                    "value"      => "",
                    "class"      => "tdc-separator-small",
                    "group"       => '',
                ),
            ),
            td_config_helper::get_map_block_font_array( 'f_header', true, 'Block header', '', '', '', 'https://cloud.tagdiv.com/help/module_font_block_header.png', '' ),
            td_config_helper::get_map_block_font_array( 'f_link', false, 'Linking word text' ),
            td_config_helper::get_map_block_font_array( 'f_auth', false, 'Author name text' ),
            td_config_helper::get_map_block_font_array( 'f_title', false, 'Post title text' ),
            array(
                array(
                    "param_name" => "separator",
                    "type" => "horizontal_separator",
                    "value" => "",
                    "class" => ""
                ),
				array(
	                'param_name' => 'el_class',
	                'type' => 'textfield',
	                'value' => '',
	                'heading' => 'Extra class',
	                'description' => 'Style particular content element differently - add a class name and refer to it in custom CSS',
	                'class' => 'tdc-textfield-extrabig'
	            ),
				array (
	                'param_name' => 'css',
	                'value' => '',
	                'type' => 'css_editor',
	                'heading' => 'Css',
	                'group' => 'Design options',
	            ),
	            array (
	                'param_name' => 'tdc_css',
	                'value' => '',
	                'type' => 'tdc_css_editor',
	                'heading' => '',
	                'group' => 'Design options',
	            ),
	        )
		)
	),
	array(
		'base' => 'vc_column_text',
		'name' => __( 'Column text', 'td_composer' ),
		'icon' => 'icon-wpb-column-text',
		'category' => __( 'Content', 'td_composer' ),
		'tdc_category' => 'Extended',
		'description' => __( 'Column text description', 'td_composer' ),
        'tdc_style_params' => array(
            'custom_title',
            'custom_url',
            'content',
            'el_class'
        ),
		'params' => array_merge(
			$block_general_params_array,
			array(
				array(
					"param_name" => "content",
					"type" => "textarea_html",
					"holder" => "div",
					'class' => '',
					"heading" => 'Text',
					"value" => __('Html code here! Replace this with any non empty html code and that\'s it', 'td_composer' ),
					"description" => 'Enter your content'
				),
                array(
                    "param_name" => "separator",
                    "type"       => "text_separator",
                    'heading'    => 'Style',
                    "value"      => "",
                    "class"      => "",
                ),
                array(
                    "param_name"  => "post_color",
                    "type"        => "colorpicker",
                    "holder"      => "div",
                    "class"       => "",
                    "heading"     => 'Post content color',
                    "value"       => '',
                    "description" => '',
                ),
                array(
                    "param_name"  => "h_color",
                    "type"        => "colorpicker",
                    "holder"      => "div",
                    "class"       => "",
                    "heading"     => 'H1-6 color',
                    "value"       => '',
                    "description" => '',
                ),
                array(
                    "param_name"  => "a_color",
                    "type"        => "colorpicker",
                    "holder"      => "div",
                    "class"       => "",
                    "heading"     => 'Links color',
                    "value"       => '',
                    "description" => '',
                ),
                array(
                    "param_name"  => "a_hover_color",
                    "type"        => "colorpicker",
                    "holder"      => "div",
                    "class"       => "",
                    "heading"     => 'Links hover color',
                    "value"       => '',
                    "description" => '',
                ),
                array(
                    "param_name"  => "bq_color",
                    "type"        => "colorpicker",
                    "holder"      => "div",
                    "class"       => "",
                    "heading"     => 'Default blockquote color',
                    "value"       => '',
                    "description" => '',
                ),
                array(
                    "param_name" => "separator",
                    "type" => "horizontal_separator",
                    "value" => "",
                    "class" => "tdc-separator-small"
                ),
            ),
            td_config_helper::get_map_block_font_array( 'f_post', true, 'Post content' ),
            td_config_helper::get_map_block_font_array( 'f_h1', false, 'H1' ),
            td_config_helper::get_map_block_font_array( 'f_h2', false, 'H2' ),
            td_config_helper::get_map_block_font_array( 'f_h3', false, 'H3' ),
            td_config_helper::get_map_block_font_array( 'f_h4', false, 'H4' ),
            td_config_helper::get_map_block_font_array( 'f_h5', false, 'H5' ),
            td_config_helper::get_map_block_font_array( 'f_h6', false, 'H6' ),
            td_config_helper::get_map_block_font_array( 'f_list', false, 'Lists' ),
            td_config_helper::get_map_block_font_array( 'f_bq', false, 'Default blockquote' ),
            array(
				array(
					"param_name" => "separator",
					"type" => "horizontal_separator",
					"value" => "",
					"class" => ""
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Extra class', 'td_composer' ),
					'param_name' => 'el_class',
					'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'td_composer' ),
					'value' => '',
					'class' => 'tdc-textfield-extrabig',
				),
				array (
					'param_name' => 'css',
					'value' => '',
					'type' => 'css_editor',
					'heading' => 'Css',
					'group' => 'Design options',
				),
				array (
		            'param_name' => 'tdc_css',
		            'value' => '',
		            'type' => 'tdc_css_editor',
		            'heading' => '',
		            'group' => 'Design options',
		        ),
			)
		)
	),
	array(
		'base' => 'vc_single_image',
		'name' => __( 'Single background image', 'td_composer' ),
		'icon' => 'icon-wpb-empty-space',
		'category' => __( 'Content', 'td_composer' ),
		'tdc_category' => 'Extended',
		'description' => __( 'Single image description', 'td_composer' ),
        'tdc_style_params' => array(
            'image',
            'image_url',
            'open_in_new_window',
            'url_rel',
            'title_attr',
            'display_inline',
            'height',
            'width',
            'video_popup',
            'video_url',
            'video_rec',
            'video_rec_title',
            'ga_event_action',
            'ga_event_category',
            'ga_event_label',
            'fb_pixel_event_name',
            'fb_pixel_event_content_name',
            'el_class'
        ),
		'params' => array_merge(
            array(
                array(
                    "param_name" => "image",
                    "type" => "attach_image",
                    "value" => '',
                    "heading" => __( "Image", 'td_composer' ),
                    "description" => "",
                    "holder" => "div",
                    "class" => "",
                ),
                array(
                    "param_name" => "image_cf",
                    "type" => "textfield",
                    "value" => '',
                    "heading" => __( "External image", 'td_composer' ),
                    "description" => "",
                    "holder" => "div",
                    "class" => "tdc-textfield-extrabig"
                ),
                array(
                    "param_name" => "image_url",
                    "type" => "textfield",
                    "value" => '',
                    "heading" => __( "Image link", 'td_composer' ),
                    "description" => "",
                    "holder" => "div",
                    "class" => "tdc-textfield-extrabig"
                ),
                array(
                    "param_name" => "open_in_new_window",
                    "type" => "checkbox",
                    "value" => '',
                    "heading" => __( "Open in new window",  'td_composer' ),
                    "description" => "",
                    "holder" => "div",
                    "class" => "",
                ),
				array(
					"param_name" => "url_rel",
					"type" => "dropdown",
					"value" => array(
						'Disable' => '',
						'Nofollow' => 'nofollow',
						'Noopener' => 'noopener',
						'Noreferrer' => 'noreferrer'
					),
					"heading" => "Set rel attribute",
					"description" => "",
					"holder" => "div",
					"class" => "tdc-dropdown-big"
				),
                array(
                    'param_name' => 'title_attr',
                    'type' => 'textarea_raw_html',
                    'value' => '',
                    'heading' => 'Title attribute',
                    'description' => '',
                    'class' => 'tdc-textarea-extrasmall',
                ),
                array(
                    "param_name" => "display_inline",
                    "type" => "checkbox",
                    "value" => '',
                    "heading" => "Display inline",
                    "description" => "",
                    "holder" => "div",
                    "class" => "",
                ),
                array(
                    "param_name" => "separator",
                    "type"       => "horizontal_separator",
                    "value"      => "",
                    "class"      => "tdc-separator-small",
                ),
                array(
                    "param_name" => "height",
                    "type" => "textfield-responsive",
                    "value" => '',
                    "heading" => __( 'Image height', 'td_composer' ),
                    "description" => "Default height: 400px",
                    "holder" => "div",
                    "class" => "tdc-textfield-small",
                    "placeholder" => "400"
                ),
                array(
                    "param_name" => "width",
                    "type" => "textfield-responsive",
                    "value" => '',
                    "heading" => __( 'Image width', 'td_composer' ),
                    "description" => "Default width: 100%",
                    "holder" => "div",
                    "class" => "tdc-textfield-small",
                    "placeholder" => "100%"
                ),
                array(
                    "param_name" => "repeat",
                    "type" => "dropdown",
                    "value" => array(
                        'No Repeat' => '',
                        'Tile' => 'repeat',
                        'Tile Horizontally' => 'repeat-x',
                        'Tile Vertically' => 'repeat-y'
                    ),
                    "heading" => __( 'Image repeat', 'td_composer' ),
                    "description" => "",
                    "holder" => "div",
                    "class" => "tdc-dropdown-big",
                ),
                array(
                    "param_name" => "size",
                    "type" => "dropdown",
                    "value" => array(
                        'Cover' => '',
                        'Full Width' => '100% auto',
                        'Full Height' => 'auto 100%',
                        'Auto' => 'auto',
                        'Contain' => 'contain'
                    ),
                    "heading" => __( 'Image size', 'td_composer' ),
                    "description" => "",
                    "holder" => "div",
                    "class" => "tdc-dropdown-big",
                ),
                array(
                    "param_name" => "alignment",
                    "type" => "dropdown",
                    "value" => array(
                        'Top' => 'top',
                        'Center' => '',
                        'Bottom' => 'bottom'
                    ),
                    "heading" => __( 'Image alignment', 'td_composer' ),
                    "description" => "",
                    "holder" => "div",
                    "class" => "tdc-dropdown-big",
                ),
                array(
                    "param_name" => "style",
                    "type" => "dropdown",
                    "value" => array(
                        'Default' => '',
                        'Rounded' => 'style-rounded',
                        'Border' => 'style-border',
                        'Outline' => 'style-outline',
                        'Shadow' => 'style-shadow',
                        'Bordered Shadow' => 'style-bordered-shadow',
                        '3D Shadow' => 'style-3d-shadow',
                        'Round' => 'style-round',
                        'Round Border' => 'style-round-border',
                        'Round Outline' => 'style-round-outline',
                        'Round Shadow' => 'style-round-shadow',
                        'Round Border Shadow' => 'style-round-border-shadow',
                        'Circle' => 'style-circle',
                        'Circle Border' => 'style-circle-border',
                        'Circle Outline' => 'style-circle-outline',
                        'Circle Shadow' => 'style-circle-shadow',
                        'Circle Border Shadow' => 'style-circle-border-shadow',
                    ),
                    "heading" => __( 'Box style', 'td_composer' ),
                    "description" => "",
                    "holder" => "div",
                    "class" => "tdc-dropdown-big",
                ),
                array(
                    "param_name" => "overlay",
                    "holder" => "div",
                    "type" => "gradient",
                    'heading' => "Overlay color",
                    "value" => "",
                    "class" => "",
                ),
            ),

            $single_image_video_popup,

            td_config_helper::mix_blend('Effects'),
            td_config_helper::image_filters('Effects'),
            array(
                array(
                    "param_name" => "separator",
                    "type"       => "horizontal_separator",
                    "value"      => "",
                    "class"      => "tdc-separator-small",
                ),
                array(
                    'param_name' => 'el_class',
                    'type' => 'textfield',
                    'value' => '',
                    'heading' => 'Extra class',
                    'description' => 'Style particular content element differently - add a class name and refer to it in custom CSS',
                    'class' => 'tdc-textfield-extrabig'
                ),
                array(
                    'param_name' => 'css',
                    'value' => '',
                    'type' => 'css_editor',
                    'heading' => 'Css',
                    'group' => 'Design options',
                ),
                array(
                    'param_name' => 'tdc_css',
                    'value' => '',
                    'type' => 'tdc_css_editor',
                    'heading' => '',
                    'group' => 'Design options',
                ),
                array(
                    "param_name" => "separator",
                    "type" => "text_separator",
                    "heading" => 'Google analytics',
                    "value" => "",
                    "class" => "",
                    "group" => "Tracking"
                ),
                array(
                    'param_name' => 'ga_event_action',
                    "type" => "textfield",
                    "value" => '',
                    "heading" => 'GA Event Action',
                    "description" => "The Google Analytics Event Action",
                    'class' => 'tdc-textfield-big',
                    'group' => 'Tracking',
                ),
                array(
                    'param_name' => 'ga_event_category',
                    "type" => "textfield",
                    "value" => '',
                    "heading" => 'GA Event Category',
                    "description" => "The Google Analytics Event Category",
                    'class' => 'tdc-textfield-big',
                    'group' => 'Tracking',
                ),
                array(
                    'param_name' => 'ga_event_label',
                    "type" => "textfield",
                    "value" => '',
                    "heading" => 'GA Event Label',
                    "description" => "The Google Analytics Event Label",
                    'class' => 'tdc-textfield-big',
                    'group' => 'Tracking',
                ),
                array(
                    "param_name" => "separator",
                    "type" => "text_separator",
                    "heading" => 'Facebook pixel',
                    "value" => "",
                    "class" => "",
                    "group" => "Tracking"
                ),
                array(
                    'param_name' => 'fb_pixel_event_name',
                    "type" => "dropdown",
                    "value" => array(
                        'Select Event' => '',
                        'Lead' => 'Lead',
                        'View Content' => 'ViewContent',
                    ),
                    "heading" => 'Events',
                    "description" => "The Facebook Pixel Event Name. Thi setting is required in order to send tracking data to Facebook Pixel.",
                    "holder" => "div",
                    'class' => 'tdc-dropdown-big',
                    'group' => 'Tracking',
                ),
                array(
                    'param_name' => 'fb_pixel_event_content_name',
                    "type" => "textfield",
                    "value" => '',
                    "heading" => 'Content Name',
                    "description" => "The Facebook Pixel Event Content Name. Using this input you can specify a name for your content when sending the event to Facebook ( this is an optional setting )",
                    'class' => 'tdc-textfield-big',
                    'group' => 'Tracking',
                ),
            )
		),
	)
);

// check for V.C.
if (!td_util::is_vc_installed()) {
	foreach ($tdc_api_blocks as $tdc_api_block) {
		td_api_block::add($tdc_api_block['base'], $tdc_api_block);
		tdc_mapper::map_shortcode($tdc_api_block);
	}
}


function register_external_shortcodes() {

	global $shortcode_tags;
	require_once('shortcodes/tdc_external_shortcode.php' );

	// Overwrite the existing shortcode
	// In composer - a custom placeholder is used instead of the callback result
	// In frontend, for registered shortcodes - a wrapper is applied to the existing callback result
	// In frontend, for not registered shortcodes - a 'missing shortcode' placeholder is shown

	$mapped_shortcodes = tdc_mapper::get_mapped_shortcodes();

	foreach ( tdc_mapper::get_external_shortcodes() as $shortcode_tag => $shortcode_params ) {

		if ( isset( $shortcode_tags[ $shortcode_tag ] ) ) {

//			// The social counter plugin, even it is external shorcode, is our shortcode and we trust its js
			if ( 'td_block_social_counter' !== $shortcode_tag && false === strpos($shortcode_tag, 'td_woo_')) {
				add_shortcode( $shortcode_tag, 'tdc_proxy_external_shortcode' );
			}

		} else {
			add_shortcode( $shortcode_tag, 'tdc_proxy_missing_external_shortcode' );
		}

		// Important! We need to check the already mapped shortcodes, because social counter plugin comes, even it is external, it's our external plugin, and it does itself mapping
		if ( ! isset( $mapped_shortcodes[ $shortcode_tag ] ) ) {
			tdc_mapper::map_shortcode( $shortcode_params );
		}
	}
}

function tdc_proxy_external_shortcode($atts, $content, $tag) {
	$external_shortcode = new tdc_external_shortcode($tag);
	return $external_shortcode->render($atts, $content, $tag);
}

/**
 * Proxy function - to overwrite the existing shortcode
 */
function wrap_external_shortcodes() {

	foreach ( tdc_mapper::get_external_shortcodes() as $shortcode_tag => $shortcode_params ) {
		global $shortcode_tags;

		if ( ! isset( $shortcode_tags[ $shortcode_tag ] ) ) {

			// In frontend, for not registered shortcodes - a 'missing shortcode' info placeholder is shown
			add_shortcode( $shortcode_tag, 'tdc_proxy_missing_external_shortcode');
		}
	}
}

function tdc_proxy_missing_external_shortcode($atts, $content, $tag) {
	if ( current_user_can( 'administrator' ) ) {

		// The unique class 'td_uid_...' is just added to see that shortcode update in tagDiv composer
		return '<div class="td_block_wrap tdc-missing-external-shortcode ' . tdc_util::generate_unique_id() . '"><span>' . $tag . '</span>Missing shortcode. Activate plugin!</div>';
	}
	return '';
}

