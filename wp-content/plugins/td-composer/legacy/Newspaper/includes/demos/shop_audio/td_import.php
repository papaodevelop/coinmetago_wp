<?php 



/*  ---------------------------------------------------------------------------- 
	CATEGORIES
*/
$cat_blog_id = td_demo_category::add_category(array(
	'category_name' => 'Blog',
	'parent_id' => 0,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_featured_id = td_demo_category::add_category(array(
	'category_name' => 'Featured',
	'parent_id' => 0,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_uncategorized_id = td_demo_category::add_category(array(
	'category_name' => 'Uncategorized',
	'parent_id' => 0,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));


/*  ---------------------------------------------------------------------------- 
	ATTACHMENTS
*/

/*  ---------------------------------------------------------------------------- 
	POSTS
*/
$post_new_sonos_update_dolby_atmos_controls_for_arc_battery_upgrade_for_roam_8_id = td_demo_content::add_post(array(
	'title' => 'Sonos Roam vs Sonos One: Which should you buy?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_blog_id,),
));

$post_new_sonos_update_dolby_atmos_controls_for_arc_battery_upgrade_for_roam_7_id = td_demo_content::add_post(array(
	'title' => 'LG\'s 2021 soundbars start to roll out, SP11RA leads the way with 7.1.4 channel',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_blog_id,),
));

$post_new_sonos_update_dolby_atmos_controls_for_arc_battery_upgrade_for_roam_6_id = td_demo_content::add_post(array(
	'title' => 'Audio Pro\'s C10 Mk II is a new AirPlay 2 and Google Cast multiroom speaker',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_blog_id,),
));

$post_new_sonos_update_dolby_atmos_controls_for_arc_battery_upgrade_for_roam_5_id = td_demo_content::add_post(array(
	'title' => 'Bang & Olufsen Beosound Emerge is one swanky looking bookshelf speaker',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_blog_id,),
));

$post_new_sonos_update_dolby_atmos_controls_for_arc_battery_upgrade_for_roam_4_id = td_demo_content::add_post(array(
	'title' => 'Sony wants to bring the boom to your room with new X-Series speaker range',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_blog_id,),
));

$post_new_sonos_update_dolby_atmos_controls_for_arc_battery_upgrade_for_roam_3_id = td_demo_content::add_post(array(
	'title' => 'Bang & Olufsen Beolab 28: These smart-looking smart speakers are future upgradeable',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_blog_id,),
));

$post_new_sonos_update_dolby_atmos_controls_for_arc_battery_upgrade_for_roam_2_id = td_demo_content::add_post(array(
	'title' => 'Denon and Marantz offer free solution to 120Hz Xbox AVR issue',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_blog_id,),
));

$post_new_sonos_update_dolby_atmos_controls_for_arc_battery_upgrade_for_roam_id = td_demo_content::add_post(array(
	'title' => 'New Sonos update: Dolby Atmos controls for Arc, battery upgrade for Roam',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_blog_id,),
));


/*  ---------------------------------------------------------------------------- 
	PAGES
*/
$page_contact_id = td_demo_content::add_page(array(
	'title' => 'Contact',
	'file' => 'contact.txt',
));

$page_terms_conditions_id = td_demo_content::add_page(array(
	'title' => 'Terms & Conditions',
	'file' => 'terms_conditions.txt',
));

$page_privacy_policy_id = td_demo_content::add_page(array(
	'title' => 'Privacy Policy',
	'file' => 'privacy_policy.txt',
));

$page_our_story_id = td_demo_content::add_page(array(
	'title' => 'Our Story',
	'file' => 'our_story.txt',
));

$page_homepage_id = td_demo_content::add_page(array(
	'title' => 'Homepage',
	'file' => 'homepage.txt',
	'homepage' => true,
));


/*  ---------------------------------------------------------------------------- 
	PRODUCT CATEGORIES
*/
$p_cat_accessories_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Accessories',
	'parent_id' => 0,
	'description' => '',
));

$p_cat_amplifiers_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Amplifiers',
	'parent_id' => 0,
	'description' => '',
));

$p_cat_speakers_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Speakers',
	'parent_id' => 0,
	'description' => '',
));

$p_cat_subwoofers_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Subwoofers',
	'parent_id' => 0,
	'description' => '',
));


/*  ---------------------------------------------------------------------------- 
	PRODUCT ATTRIBUTES
*/
$p_att_pa_impedance_id = td_woo_demo_product_attribute::add_woo_attribute( array(
	'attribute_name' => 'Impedance',
	'attribute_slug' => 'pa_impedance',
	'attribute_type' => 'button',
	'attribute_terms' => array(
		'2Ω','4Ω','Dual 4Ω','Dual 8Ω'
	), 
	'order_by' => 'menu_order',
	'has_archives' => false
));

$p_att_pa_length_id = td_woo_demo_product_attribute::add_woo_attribute( array(
	'attribute_name' => 'Length',
	'attribute_slug' => 'pa_length',
	'attribute_type' => 'button',
	'attribute_terms' => array(
		'10m','15m','30m','50m','8m'
	), 
	'order_by' => 'menu_order',
	'has_archives' => false
));

$p_att_pa_power_id = td_woo_demo_product_attribute::add_woo_attribute( array(
	'attribute_name' => 'Power',
	'attribute_slug' => 'pa_power',
	'attribute_type' => 'button',
	'attribute_terms' => array(
		'1000W','100W','200W','400W','50W','70W'
	), 
	'order_by' => 'menu_order',
	'has_archives' => false
));

$p_att_pa_size_id = td_woo_demo_product_attribute::add_woo_attribute( array(
	'attribute_name' => 'Size (Inch)',
	'attribute_slug' => 'pa_size',
	'attribute_type' => 'button',
	'attribute_terms' => array(
		'10','12','15','6','8'
	), 
	'order_by' => 'menu_order',
	'has_archives' => false
));


/*  ---------------------------------------------------------------------------- 
	PRODUCTS
*/
$product_psw_108_powered_subwoofer_200w_id = td_demo_content::add_product( array( 
	'title' => 'PSW 108 - Powered Subwoofer 200W',
	'file' => 'product_default.txt',
	'product_sku' => '05-BOSE-0453',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_power_id,
			'name' => 'pa_power',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '100w' )
		), 
		array(
			'id' => $p_att_pa_impedance_id,
			'name' => 'pa_impedance',
			'value' => '',
			'position' => '1',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '2%cf%89','4%cf%89' )
		), 
		array(
			'id' => $p_att_pa_size_id,
			'name' => 'pa_size',
			'value' => '',
			'position' => '2',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '15' )
		), 
	), 
	'product_price' => '899',
	'product_image_td_id' => 'td_pic_p_1',
	'product_image_gallery_td_ids' => array( 'td_pic_p_1', 'td_pic_p_3', 'td_pic_p_4', 'td_pic_p_5', ),
	'product_categories' => array( $p_cat_subwoofers_id ),
	'short_description' => '<p>Suitable for computer subwoofer and 5.1 speaker subwoofer. The minimum rated power amplifier can not be pushed below 200W.</p>
',
	'product_type' => 'simple',
));

$product_psw_404_powered_subwoofer_100w_id = td_demo_content::add_product( array( 
	'title' => 'PSW 404 - Powered Subwoofer 100W',
	'file' => 'product_default.txt',
	'product_sku' => '05-BOSE-0352-4-1-1-1-1',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_power_id,
			'name' => 'pa_power',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '100w' )
		), 
		array(
			'id' => $p_att_pa_impedance_id,
			'name' => 'pa_impedance',
			'value' => '',
			'position' => '1',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '2%cf%89','4%cf%89' )
		), 
		array(
			'id' => $p_att_pa_size_id,
			'name' => 'pa_size',
			'value' => '',
			'position' => '2',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '15' )
		), 
	), 
	'product_price' => '199',
	'product_image_td_id' => 'td_pic_p_2',
	'product_image_gallery_td_ids' => array( 'td_pic_p_1', 'td_pic_p_3', 'td_pic_p_4', 'td_pic_p_5', ),
	'product_categories' => array( $p_cat_subwoofers_id ),
	'short_description' => '<p>Suitable for computer subwoofer and 5.1 speaker subwoofer. The minimum rated power amplifier can not be pushed below 200W.</p>
',
	'product_type' => 'simple',
));

$product_react_sub_deep_subwoofer_200w_id = td_demo_content::add_product( array( 
	'title' => 'REACT SUB - Deep Subwoofer 200W',
	'file' => 'product_default.txt',
	'product_sku' => '05-BOSE-0352-4-1-1-1',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_power_id,
			'name' => 'pa_power',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '200w' )
		), 
		array(
			'id' => $p_att_pa_impedance_id,
			'name' => 'pa_impedance',
			'value' => '',
			'position' => '1',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '2%cf%89','4%cf%89' )
		), 
		array(
			'id' => $p_att_pa_size_id,
			'name' => 'pa_size',
			'value' => '',
			'position' => '2',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '10' )
		), 
	), 
	'product_price' => '299',
	'product_image_td_id' => 'td_pic_p_3',
	'product_image_gallery_td_ids' => array( 'td_pic_p_1', 'td_pic_p_3', 'td_pic_p_4', 'td_pic_p_5', ),
	'product_categories' => array( $p_cat_subwoofers_id ),
	'short_description' => '<p>Suitable for computer subwoofer and 5.1 speaker subwoofer. The minimum rated power amplifier can not be pushed below 200W.</p>
',
	'product_type' => 'simple',
));

$product_dsw_pro_4_subwoofer_400w_8_inch_id = td_demo_content::add_product( array( 
	'title' => 'DSW PRO 4 - Subwoofer 400W 8 Inch',
	'file' => 'product_default.txt',
	'product_sku' => '05-BOSE-0352-4-1-1',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_power_id,
			'name' => 'pa_power',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '400w' )
		), 
		array(
			'id' => $p_att_pa_impedance_id,
			'name' => 'pa_impedance',
			'value' => '',
			'position' => '1',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '2%cf%89','4%cf%89' )
		), 
		array(
			'id' => $p_att_pa_size_id,
			'name' => 'pa_size',
			'value' => '',
			'position' => '2',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '8' )
		), 
	), 
	'product_price' => '299',
	'product_image_td_id' => 'td_pic_p_4',
	'product_image_gallery_td_ids' => array( 'td_pic_p_1', 'td_pic_p_3', 'td_pic_p_4', 'td_pic_p_5', ),
	'product_categories' => array( $p_cat_subwoofers_id ),
	'short_description' => '<p>Suitable for computer subwoofer and 5.1 speaker subwoofer. The minimum rated power amplifier can not be pushed below 300W.</p>
',
	'product_type' => 'simple',
));

$product_sds_12_subwoofer_home_theater_1000w_id = td_demo_content::add_product( array( 
	'title' => 'SDS 12 - Subwoofer Home Theater 1000W',
	'file' => 'product_default.txt',
	'product_sku' => '05-BOSE-0352-4-1',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_power_id,
			'name' => 'pa_power',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1000w' )
		), 
		array(
			'id' => $p_att_pa_impedance_id,
			'name' => 'pa_impedance',
			'value' => '',
			'position' => '1',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '4%cf%89' )
		), 
		array(
			'id' => $p_att_pa_size_id,
			'name' => 'pa_size',
			'value' => '',
			'position' => '2',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '12' )
		), 
	), 
	'product_price' => '550',
	'product_image_td_id' => 'td_pic_p_5',
	'product_image_gallery_td_ids' => array( 'td_pic_p_1', 'td_pic_p_3', 'td_pic_p_4', 'td_pic_p_5', ),
	'product_categories' => array( $p_cat_subwoofers_id ),
	'short_description' => '<p>Suitable for computer subwoofer and 5.1 speaker subwoofer. The minimum rated power amplifier can not be pushed below 300W.</p>
',
	'product_type' => 'simple',
));

$product_crown_xls_2000_drivecore_power_amplifier_id = td_demo_content::add_product( array( 
	'title' => 'Crown XLS 2000 - Drivecore Power Amplifier',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_power_id,
			'name' => 'pa_power',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '400w' )
		), 
	), 
	'product_price' => '899',
	'product_image_td_id' => 'td_pic_p_6',
	'product_image_gallery_td_ids' => array( 'td_pic_p_1', 'td_pic_p_3', 'td_pic_p_4', 'td_pic_p_5', ),
	'product_categories' => array( $p_cat_amplifiers_id ),
	'short_description' => '<p>Half a decade after the DX range redefined performance at its price point, it’s time to reimagine, reengineer and reinvigorate. The all-new DXA60 and DXA80 integrated amplifiers build on the foundations laid (and the Awards won) by DXA60 and DXA80, but with a fresh and progressive perspective.</p>
',
	'product_type' => 'simple',
));

$product_adc_edge_x_power_amplifier_id = td_demo_content::add_product( array( 
	'title' => 'ADC Edge X - Power Amplifier',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_power_id,
			'name' => 'pa_power',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '400w' )
		), 
	), 
	'product_price' => '550',
	'product_image_td_id' => 'td_pic_p_1',
	'product_image_gallery_td_ids' => array( 'td_pic_p_1', 'td_pic_p_3', 'td_pic_p_4', 'td_pic_p_5', ),
	'product_categories' => array( $p_cat_amplifiers_id ),
	'short_description' => '<p>Half a decade after the DX range redefined performance at its price point, it’s time to reimagine, reengineer and reinvigorate. The all-new DXA60 and DXA80 integrated amplifiers build on the foundations laid (and the Awards won) by DXA60 and DXA80, but with a fresh and progressive perspective.</p>
',
	'product_type' => 'simple',
));

$product_evo_200dc_all_in_one_player_id = td_demo_content::add_product( array( 
	'title' => 'Evo 200DC - All-in-One Player',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_power_id,
			'name' => 'pa_power',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '200w' )
		), 
	), 
	'product_price' => '200',
	'product_image_td_id' => 'td_pic_p_2',
	'product_image_gallery_td_ids' => array( 'td_pic_p_1', 'td_pic_p_3', 'td_pic_p_4', 'td_pic_p_5', ),
	'product_categories' => array( $p_cat_amplifiers_id ),
	'short_description' => '<p>Half a decade after the DX range redefined performance at its price point, it’s time to reimagine, reengineer and reinvigorate. The all-new DXA60 and DXA80 integrated amplifiers build on the foundations laid (and the Awards won) by DXA60 and DXA80, but with a fresh and progressive perspective.</p>
',
	'product_type' => 'simple',
));

$product_azur_400c_network_player_id = td_demo_content::add_product( array( 
	'title' => 'Azur 400C - Network Player',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_power_id,
			'name' => 'pa_power',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '400w' )
		), 
	), 
	'product_price' => '740',
	'product_image_td_id' => 'td_pic_p_3',
	'product_image_gallery_td_ids' => array( 'td_pic_p_1', 'td_pic_p_3', 'td_pic_p_4', 'td_pic_p_5', ),
	'product_categories' => array( $p_cat_amplifiers_id ),
	'short_description' => '<p>Half a decade after the DX range redefined performance at its price point, it’s time to reimagine, reengineer and reinvigorate. The all-new DXA60 and DXA80 integrated amplifiers build on the foundations laid (and the Awards won) by DXA60 and DXA80, but with a fresh and progressive perspective.</p>
',
	'product_type' => 'simple',
));

$product_dxa80_integrated_stereo_amplifier_id = td_demo_content::add_product( array( 
	'title' => 'DXA80 - Integrated Stereo Amplifier',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_power_id,
			'name' => 'pa_power',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '100w' )
		), 
	), 
	'product_price' => '540',
	'product_image_td_id' => 'td_pic_p_4',
	'product_image_gallery_td_ids' => array( 'td_pic_p_1', 'td_pic_p_3', 'td_pic_p_4', 'td_pic_p_5', ),
	'product_categories' => array( $p_cat_amplifiers_id ),
	'short_description' => '<p>Half a decade after the DX range redefined performance at its price point, it’s time to reimagine, reengineer and reinvigorate. The all-new DXA60 and DXA80 integrated amplifiers build on the foundations laid (and the Awards won) by DXA60 and DXA80, but with a fresh and progressive perspective.</p>
',
	'product_type' => 'simple',
));

$product_500w_super_subwoofer_speaker_driver_unit_4ohm_id = td_demo_content::add_product( array( 
	'title' => '500W Super Subwoofer Speaker Driver Unit 4ohm',
	'file' => 'product_default.txt',
	'product_sku' => '05-BOSE-0352-4',
	'product_default_attributes' => array(
		'power' => '50W',
	),
	'product_price' => '295',
	'product_image_td_id' => 'td_pic_p_5',
	'product_image_gallery_td_ids' => array( 'td_pic_p_1', 'td_pic_p_3', 'td_pic_p_4', 'td_pic_p_5', ),
	'product_categories' => array( $p_cat_speakers_id ),
	'short_description' => '<p>Suitable for computer subwoofer and 5.1 speaker subwoofer. The minimum rated power amplifier can not be pushed below 300W.</p>
',
	'product_type' => 'simple',
));

$product_400w_super_woofer_speaker_driver_unit_4ohm_86db_id = td_demo_content::add_product( array( 
	'title' => '400W Super Woofer Speaker Driver Unit 4 ohm',
	'file' => 'product_default.txt',
	'product_sku' => '05-BOSE-0352-5',
	'product_default_attributes' => array(
		'pa_power' => '400w',
	),
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_power_id,
			'name' => 'pa_power',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( '100w','200w','400w' )
		), 
	), 
	'product_price' => '45',
	'product_price' => '75',
	'product_price' => '120',
	'product_image_td_id' => 'td_pic_p_6',
	'product_image_gallery_td_ids' => array( 'td_pic_p_1', 'td_pic_p_3', 'td_pic_p_4', 'td_pic_p_5', ),
	'product_categories' => array( $p_cat_speakers_id ),
	'short_description' => '<p>Suitable for computer subwoofer and 5.1 speaker subwoofer. The minimum rated power amplifier can not be pushed below 300W.</p>
',
	'product_type' => 'variable',
));

$product_subwoofer_speaker_8_ohm_100w_audio_woofer_speaker_id = td_demo_content::add_product( array( 
	'title' => 'Subwoofer Speaker 8 Ohm 100W Audio Woofer Speaker',
	'file' => 'product_default.txt',
	'product_sku' => '05-BOSE-0352-8',
	'product_default_attributes' => array(
		'power' => '50W',
	),
	'product_price' => '60',
	'product_image_td_id' => 'td_pic_p_1',
	'product_image_gallery_td_ids' => array( 'td_pic_p_1', 'td_pic_p_3', 'td_pic_p_4', 'td_pic_p_5', ),
	'product_categories' => array( $p_cat_speakers_id ),
	'short_description' => '<p>Suitable for computer subwoofer and 5.1 speaker subwoofer. The minimum rated power amplifier can not be pushed below 30W.</p>
',
	'product_type' => 'simple',
));

$product_woofer_speaker_4_ohm_50w_car_audio_speaker_bass_loudspeaker_id = td_demo_content::add_product( array( 
	'title' => 'Woofer Speaker 4 Ohm 50W Car Audio Speaker Bass Loudspeaker',
	'file' => 'product_default.txt',
	'product_sku' => '05-BOSE-0352-3',
	'product_default_attributes' => array(
		'power' => '50W',
	),
	'product_price' => '112',
	'product_image_td_id' => 'td_pic_p_2',
	'product_image_gallery_td_ids' => array( 'td_pic_p_1', 'td_pic_p_3', 'td_pic_p_4', 'td_pic_p_5', ),
	'product_categories' => array( $p_cat_speakers_id ),
	'short_description' => '<p>Great for Outdoors and Shower. The silicone cases and interface design ensure Shockproof, Dustproof, level up to IPX5, can be used for shower or outdoor.</p>
',
	'product_type' => 'simple',
));

$product_hands_free_shower_speaker_bluetooth_and_waterproof_5w_id = td_demo_content::add_product( array( 
	'title' => 'Hands-Free Shower Speaker Bluetooth and Waterproof 5W',
	'file' => 'product_default.txt',
	'product_sku' => '05-BOSE-0352-2',
	'product_default_attributes' => array(
		'power' => '50W',
	),
	'product_price' => '45',
	'product_price' => '45',
	'product_price' => '45',
	'product_image_td_id' => 'td_pic_p_3',
	'product_image_gallery_td_ids' => array( 'td_pic_p_1', 'td_pic_p_3', 'td_pic_p_4', 'td_pic_p_5', ),
	'product_categories' => array( $p_cat_speakers_id ),
	'product_tags' => array( 'shower','speaker','waterproof' ),
	'short_description' => '<p>Great for Outdoors and Shower. The silicone cases and interface design ensure Shockproof, Dustproof, level up to IPX5, can be used for shower or outdoor.</p>
',
	'product_type' => 'simple',
));

$product_bose_50w_subwoofer_speaker_driver_audio_bass_id = td_demo_content::add_product( array( 
	'title' => 'Bose 50W Subwoofer Speaker Driver Audio Bass',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_power_id,
			'name' => 'pa_power',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( '50w','70w','100w' )
		), 
	), 
	'product_sku' => '05-BOSE-0352',
	'product_default_attributes' => array(
		'pa_power' => '50w',
	),
	'product_price' => '48.25',
	'product_price' => '55.25',
	'product_price' => '89',
	'product_image_td_id' => 'td_pic_p_4',
	'product_image_gallery_td_ids' => array( 'td_pic_p_1', 'td_pic_p_3', 'td_pic_p_4', 'td_pic_p_5', ),
	'product_categories' => array( $p_cat_speakers_id ),
	'product_tags' => array( 'bass','speaker','woofer' ),
	'short_description' => '<p>short description</p>
',
	'product_type' => 'variable',
));

$product_in_wall_and_in_ceiling_14awg_cl2_rated_speaker_id = td_demo_content::add_product( array( 
	'title' => 'In-Wall and In-Ceiling 14AWG CL2 Rated Speaker',
	'file' => 'product_default.txt',
	'product_sku' => 'CELL232-2',
	'product_default_attributes' => array(
		'pa_length' => '8m',
	),
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_length_id,
			'name' => 'pa_length',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( '8m','10m','15m','30m','50m' )
		), 
	), 
	'product_price' => '18',
	'product_image_td_id' => 'td_pic_p_5',
	'product_image_gallery_td_ids' => array( 'td_pic_p_1', 'td_pic_p_3', 'td_pic_p_4', 'td_pic_p_5', ),
	'product_categories' => array( $p_cat_accessories_id ),
	'short_description' => '<p>Our high performance subwoofer cable eliminates these problems by using gold plated, slotted RCA connectors to ensure a tight fit and pure signal transfer.</p>
',
	'product_type' => 'variable',
));

$product_premium_silver_cable_set_id = td_demo_content::add_product( array( 
	'title' => 'Premium Silver Cable Set',
	'file' => 'product_default.txt',
	'product_sku' => 'BAN12-1-1',
	'product_default_attributes' => array(
		'pa_length' => '8m',
	),
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_length_id,
			'name' => 'pa_length',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( '8m','10m','15m','30m','50m' )
		), 
	), 
	'product_price' => '18',
	'product_image_td_id' => 'td_pic_p_6',
	'product_image_gallery_td_ids' => array( 'td_pic_p_1', 'td_pic_p_3', 'td_pic_p_4', 'td_pic_p_5', ),
	'product_categories' => array( $p_cat_accessories_id ),
	'short_description' => '<p>Our high performance subwoofer cable eliminates these problems by using gold plated, slotted RCA connectors to ensure a tight fit and pure signal transfer.</p>
',
	'product_type' => 'variable',
));

$product_high_performance_12awg_speaker_wire_id = td_demo_content::add_product( array( 
	'title' => 'High Performance 12AWG Speaker Wire',
	'file' => 'product_default.txt',
	'product_sku' => 'BAN12-1',
	'product_default_attributes' => array(
		'pa_length' => '8m',
	),
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_length_id,
			'name' => 'pa_length',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( '8m','10m','15m','30m','50m' )
		), 
	), 
	'product_price' => '18',
	'product_image_td_id' => 'td_pic_p_1',
	'product_image_gallery_td_ids' => array( 'td_pic_p_1', 'td_pic_p_3', 'td_pic_p_4', 'td_pic_p_5', ),
	'product_categories' => array( $p_cat_accessories_id ),
	'short_description' => '<p>Our high performance subwoofer cable eliminates these problems by using gold plated, slotted RCA connectors to ensure a tight fit and pure signal transfer.</p>
',
	'product_type' => 'variable',
));

$product_audio_banana_plugs_5_pair_id = td_demo_content::add_product( array( 
	'title' => 'Audio Banana Plugs - 5 pair',
	'file' => 'product_default.txt',
	'product_sku' => 'BAN12',
	'product_default_attributes' => array(
		'pa_length' => '8m',
	),
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_length_id,
			'name' => 'pa_length',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( '8m','10m','15m','30m','50m' )
		), 
	), 
	'product_price' => '9.99',
	'product_image_td_id' => 'td_pic_p_2',
	'product_image_gallery_td_ids' => array( 'td_pic_p_1', 'td_pic_p_3', 'td_pic_p_4', 'td_pic_p_5', ),
	'product_categories' => array( $p_cat_accessories_id ),
	'short_description' => '<p>Our high performance subwoofer cable eliminates these problems by using gold plated, slotted RCA connectors to ensure a tight fit and pure signal transfer.</p>
',
	'product_type' => 'variable',
));

$product_audio_rca_audio_stereo_subwoofer_cable_mono_id = td_demo_content::add_product( array( 
	'title' => 'Audio RCA Audio Stereo & Subwoofer Cable Mono',
	'file' => 'product_default.txt',
	'product_sku' => 'CAB1222',
	'product_default_attributes' => array(
		'pa_length' => '15m',
	),
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_length_id,
			'name' => 'pa_length',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( '15m','30m','50m' )
		), 
	), 
	'product_price' => '19',
	'product_image_td_id' => 'td_pic_p_3',
	'product_image_gallery_td_ids' => array( 'td_pic_p_1', 'td_pic_p_3', 'td_pic_p_4', 'td_pic_p_5', ),
	'product_categories' => array( $p_cat_accessories_id ),
	'short_description' => '<p>Our high performance subwoofer cable eliminates these problems by using gold plated, slotted RCA connectors to ensure a tight fit and pure signal transfer.</p>
',
	'product_type' => 'variable',
));

$product_straight_wire_concerto_high_quality_subwoofer_cable_id = td_demo_content::add_product( array( 
	'title' => 'Straight Wire Concerto High Quality Subwoofer Cable',
	'file' => 'product_default.txt',
	'product_sku' => 'CAB12',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_length_id,
			'name' => 'pa_length',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( '15m','30m','50m' )
		), 
	), 
	'product_default_attributes' => array(
		'pa_length' => '15m',
	),
	'product_price' => '20',
	'product_image_td_id' => 'td_pic_p_4',
	'product_image_gallery_td_ids' => array( 'td_pic_p_1', 'td_pic_p_3', 'td_pic_p_4', 'td_pic_p_5', ),
	'product_categories' => array( $p_cat_accessories_id ),
	'short_description' => '<p>Our high performance subwoofer cable eliminates these problems by using gold plated, slotted RCA connectors to ensure a tight fit and pure signal transfer.</p>
',
	'product_type' => 'variable',
));


/*  ---------------------------------------------------------------------------- 
	MENUS
*/
$menu_td_demo_footer_menu_id = td_demo_menus::create_menu('td-demo-footer-menu', ''); 


/*  ---------------------------------------------------------------------------- 
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_page(array(
	'title' => 'Our Story',
	'add_to_menu_id' => $menu_td_demo_footer_menu_id,
	'page_id' => $page_our_story_id,
	'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_page(array(
	'title' => 'Privacy Policy',
	'add_to_menu_id' => $menu_td_demo_footer_menu_id,
	'page_id' => $page_privacy_policy_id,
	'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_page(array(
	'title' => 'Terms & Conditions',
	'add_to_menu_id' => $menu_td_demo_footer_menu_id,
	'page_id' => $page_terms_conditions_id,
	'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_page(array(
	'title' => 'Contact',
	'add_to_menu_id' => $menu_td_demo_footer_menu_id,
	'page_id' => $page_contact_id,
	'parent_id' => ''
));

$menu_td_demo_header_menu_id = td_demo_menus::create_menu('td-demo-header-menu', ''); 


/*  ---------------------------------------------------------------------------- 
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_page(array(
	'title' => 'Home',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'page_id' => $page_homepage_id,
	'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_link(array(
    'title' => 'Catalog',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'url' => get_home_url() . '/shop',
    'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_product_cat(array(
	'title' => 'Speakers',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'p_cat_id' => $p_cat_speakers_id,
	'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_product_cat(array(
	'title' => 'Amplifiers',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'p_cat_id' => $p_cat_amplifiers_id,
	'parent_id' => ''
));

$menu_item_4_id = td_demo_menus::add_product_cat(array(
	'title' => 'Subwoofers',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'p_cat_id' => $p_cat_subwoofers_id,
	'parent_id' => ''
));

$menu_item_5_id = td_demo_menus::add_product_cat(array(
	'title' => 'Accessories',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'p_cat_id' => $p_cat_accessories_id,
	'parent_id' => ''
));

$menu_item_6_id = td_demo_menus::add_category(array(
	'title' => 'Blog',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_blog_id,
	'parent_id' => ''
));


/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/
$template_single_template_shop_audio_id = td_demo_content::add_cloud_template(array(
	'title' => 'Single Template - Shop Audio',
	'file' => 'post_cloud_template.txt',
	'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_shop_audio_id);


$template_404_template_shop_audio_id = td_demo_content::add_cloud_template(array(
	'title' => '404 Template - Shop Audio',
	'file' => '404_cloud_template.txt',
	'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_shop_audio_id);


$template_search_template_shop_audio_id = td_demo_content::add_cloud_template(array(
	'title' => 'Search Template - Shop Audio',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_shop_audio_id);


$template_author_template_shop_audio_id = td_demo_content::add_cloud_template(array(
	'title' => 'Author Template - Shop Audio',
	'file' => 'author_cloud_template.txt',
	'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_shop_audio_id);


$template_tag_template_shop_audio_id = td_demo_content::add_cloud_template(array(
	'title' => 'Tag Template - Shop Audio',
	'file' => 'tag_cloud_template.txt',
	'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_shop_audio_id);


$template_date_template_shop_audio_id = td_demo_content::add_cloud_template(array(
	'title' => 'Date Template - Shop Audio',
	'file' => 'date_cloud_template.txt',
	'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_shop_audio_id);


$template_category_template_shop_audio_id = td_demo_content::add_cloud_template(array(
	'title' => 'Category Template - Shop Audio',
	'file' => 'cat_cloud_template.txt',
	'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_shop_audio_id);


$template_shop_audio_woo_search_archive_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Shop Audio – Woo Search Archive Template',
	'file' => 'woo_search_archive_cloud_template.txt',
	'template_type' => 'woo_search_archive',
));

td_demo_misc::update_global_woo_search_archive_template( 'tdb_template_' . $template_shop_audio_woo_search_archive_template_id);


$template_shop_audio_woo_archive_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Shop Audio - Woo Archive Template',
	'file' => 'woo_archive_cloud_template.txt',
	'template_type' => 'woo_archive',
));

td_demo_misc::update_global_woo_archive_template( 'tdb_template_' . $template_shop_audio_woo_archive_template_id);


$template_footer_template_shop_audio_id = td_demo_content::add_cloud_template(array(
	'title' => 'Shop Audio - Footer Template',
	'file' => 'footer_cloud_template.txt',
	'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_shop_audio_id);


$template_shop_audio_woo_shop_base_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Shop Audio - Woo Shop Base Template',
	'file' => 'woo_shop_base_cloud_template.txt',
	'template_type' => 'woo_shop_base',
));

td_demo_misc::update_global_woo_shop_base_template( 'tdb_template_' . $template_shop_audio_woo_shop_base_template_id);


$template_header_template_shop_audio_id = td_demo_content::add_cloud_template(array(
	'title' => 'Shop Audio - Header Template',
	'file' => 'header_cloud_template.txt',
	'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_shop_audio_id);


update_post_meta( $template_header_template_shop_audio_id, 'header_mobile_menu_id', $menu_td_demo_header_menu_id);


$template_shop_audio_woo_product_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Shop Audio - Woo Product Template',
	'file' => 'woo_product_cloud_template.txt',
	'template_type' => 'woo_product',
));

td_demo_misc::update_global_woo_product_template( 'tdb_template_' . $template_shop_audio_woo_product_template_id);



/*  ---------------------------------------------------------------------------- 
	GENERAL SETTINGS
*/
td_demo_misc::update_background('', false);

td_demo_misc::update_background_mobile('tdx_pic_4');

td_demo_misc::update_background_login('');

td_demo_misc::update_background_header('');

td_demo_misc::update_background_footer('');

td_demo_misc::update_footer_text('');

td_demo_misc::update_logo(array('normal' => '','retina' => '','mobile' => '',));

td_demo_misc::update_footer_logo(array('normal' => '','retina' => '',));

td_demo_misc::add_social_buttons(array('facebook' => '#','grooveshark' => '#','instagram' => '#','lastfm' => '#','youtube' => '#',));

$generated_css = td_css_generator(); 
if ( function_exists('tdsp_css_generator') ) { 
	$generated_css .= tdsp_css_generator();
}
td_util::update_option( 'tds_user_compile_css', $generated_css );
