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

$cat_fashion_id = td_demo_category::add_category(array(
	'category_name' => 'Fashion',
	'parent_id' => $cat_blog_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_fragrances_id = td_demo_category::add_category(array(
	'category_name' => 'Fragrances',
	'parent_id' => $cat_blog_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_guides_id = td_demo_category::add_category(array(
	'category_name' => 'Guides',
	'parent_id' => $cat_blog_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_hair_care_id = td_demo_category::add_category(array(
	'category_name' => 'Hair Care',
	'parent_id' => $cat_blog_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_skin_care_id = td_demo_category::add_category(array(
	'category_name' => 'Skin Care',
	'parent_id' => $cat_blog_id,
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
$post_td_post_fashion_outfit_ideas_to_try_from_instagram_this_week_id = td_demo_content::add_post(array(
	'title' => 'Fashion Outfit Ideas to Try From Instagram This Week',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_fashion_id,),
));

$post_td_post_expert_advice_the_best_retro_chic_fashion_for_fall_id = td_demo_content::add_post(array(
	'title' => 'Expert Advice: The Best Retro Chic Fashion for Fall',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_fashion_id,),
));

$post_td_post_style_spy_fashion_model_goes_casual_in_cargo_and_plaid_id = td_demo_content::add_post(array(
	'title' => 'Style Spy: Fashion Model Goes Casual in Cargo and Plaid',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_fashion_id,),
));

$post_td_post_what_to_wear_tonight_no_matter_what_youve_got_planned_id = td_demo_content::add_post(array(
	'title' => 'What to Wear Tonight, No Matter What You\'ve Got Planned',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_fashion_id,),
));

$post_td_post_inside_a_fashion_bloggers_fancy_apartment_id = td_demo_content::add_post(array(
	'title' => 'Inside a Fashion Blogger\'s Fancy Apartment',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_fashion_id,),
));

$post_td_post_top_tip_how_to_find_your_signature_scent_this_spring_id = td_demo_content::add_post(array(
	'title' => 'Top Tip: How to Find Your Signature Scent This Spring',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_fragrances_id,),
));

$post_td_post_summers_scent_track_best_warm_weather_fragrances_id = td_demo_content::add_post(array(
	'title' => 'Summer’s Scent Track: Best Warm Weather Fragrances',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_fragrances_id,),
));

$post_td_post_5_classic_perfumes_and_colognes_you_should_be_wearing_id = td_demo_content::add_post(array(
	'title' => '5 Classic Perfumes and Colognes You Should be Wearing',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_fragrances_id,),
));

$post_td_post_falling_in_love_with_fragrances_fresh_perfumes_id = td_demo_content::add_post(array(
	'title' => 'Falling in Love With Fragrances: Fresh Perfumes',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_fragrances_id,),
));

$post_td_post_3_perfume_testing_mistakes_youre_probably_making_id = td_demo_content::add_post(array(
	'title' => '3 Perfume Testing Mistakes You’re Probably Making',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_fragrances_id,),
));

$post_td_post_why_18_models_received_the_platinum_hair_award_id = td_demo_content::add_post(array(
	'title' => 'Why 18 Models Received the Platinum Hair Award',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_hair_care_id,),
));

$post_td_post_discover_these_sexy_hairstyles_that_men_love_id = td_demo_content::add_post(array(
	'title' => 'Discover These Sexy Hairstyles that Men Love',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_hair_care_id,),
));

$post_td_post_best_celebrity_hair_transformations_this_year_id = td_demo_content::add_post(array(
	'title' => 'Best Celebrity Hair Transformations This Year',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_hair_care_id,),
));

$post_td_post_the_secret_to_the_perfect_golden_hair_glow_id = td_demo_content::add_post(array(
	'title' => 'The Secret to the Perfect Golden Hair Glow',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_hair_care_id,),
));

$post_td_post_the_best_five_rules_for_amazing_hair_volume_id = td_demo_content::add_post(array(
	'title' => 'The Best Five Rules for Amazing Hair Volume',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_hair_care_id,),
));

$post_td_post_7_soaps_to_supercharge_your_daily_skincare_routine_id = td_demo_content::add_post(array(
	'title' => '7 Soaps to Supercharge Your Daily Skincare Routine',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_skin_care_id,),
));

$post_td_post_unisex_bronzer_high_protection_from_ultraviolets_id = td_demo_content::add_post(array(
	'title' => 'Unisex Bronzer: High Protection from Ultraviolets',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_skin_care_id,),
));

$post_td_post_expert_review_the_most_natural_looking_eyelashes_id = td_demo_content::add_post(array(
	'title' => 'Expert Review: The Most Natural Looking Eyelashes',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_skin_care_id,),
));

$post_td_post_5_skin_care_rituals_you_should_be_doing_before_bed_id = td_demo_content::add_post(array(
	'title' => '5 Skin Care Rituals You Should Be Doing Before Bed',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_skin_care_id,),
));

$post_td_post_the_best_products_for_your_absolute_best_skin_care_id = td_demo_content::add_post(array(
	'title' => 'The Best Products for Your Absolute Best Skin Care',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_skin_care_id,),
));

$post_td_post_15_of_the_most_popular_make_up_tips_on_pinterest_id = td_demo_content::add_post(array(
	'title' => '15 of the Most Popular Make Up Tips on Pinterest',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_guides_id,),
));

$post_td_post_how_to_find_the_perfect_blush_for_your_complexion_id = td_demo_content::add_post(array(
	'title' => 'How to Find the Perfect Blush for Your Complexion',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_guides_id,),
));

$post_td_post_the_best_face_mask_to_grab_from_the_drugstore_id = td_demo_content::add_post(array(
	'title' => 'The Best Face Mask to Grab from the Drugstore',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_guides_id,),
));

$post_td_post_super_surreal_nail_art_the_sky_is_the_limit_id = td_demo_content::add_post(array(
	'title' => 'Super Surreal Nail Art: The Sky is the Limit',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_guides_id,),
));

$post_td_post_the_game_changers_best_liners_for_eye_contour_id = td_demo_content::add_post(array(
	'title' => 'The Game Changers: Best Liners for Eye Contour',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_guides_id,),
));


/*  ---------------------------------------------------------------------------- 
	PRODUCT CATEGORIES
*/
$p_cat_body_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Body',
	'parent_id' => 0,
	'description' => '',
));

$p_cat_eyes_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Eyes',
	'parent_id' => 0,
	'description' => '',
));

$p_cat_face_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Face',
	'parent_id' => 0,
	'description' => '',
));

$p_cat_lips_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Lips',
	'parent_id' => 0,
	'description' => '',
));

$p_cat_tools_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Tools',
	'parent_id' => 0,
	'description' => '',
));


/*  ---------------------------------------------------------------------------- 
	PRODUCT ATTRIBUTES
*/
$p_att_pa_color_id = td_woo_demo_product_attribute::add_woo_attribute( array(
	'attribute_name' => 'Color Select',
	'attribute_slug' => 'pa_color',
	'attribute_type' => 'color',
	'attribute_terms' => array(
		'Black' => '#000000',
		'Blue' => '#259ae8',
		'Gray' => '#969696',
		'Pink' => '#ff3a96',
		'Purple' => '#8639f9',
		'White' => '#ffffff',
	), 
	'order_by' => 'menu_order',
	'has_archives' => false
));

$p_att_pa_price_id = td_woo_demo_product_attribute::add_woo_attribute( array(
	'attribute_name' => 'Price',
	'attribute_slug' => 'pa_price',
	'attribute_type' => 'select',
	'attribute_terms' => array(
		'1-10','11-20','20-100'
	), 
	'order_by' => 'menu_order',
	'has_archives' => false
));


/*  ---------------------------------------------------------------------------- 
	PRODUCTS
*/
$product_professional_makeup_set_matte_eye_shadow_id = td_demo_content::add_product( array( 
	'title' => 'Professional Makeup Set Matte Eye Shadow',
	'file' => 'product_default.txt',
	'product_sku' => 'm40',
	'product_price' => '28',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '20-100' )
		), 
	), 
	'product_image_td_id' => 'td_pic_p_1',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_eyes_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>35 Color Professional Makeup Set<br />
Matte Eye Shadow<br />
Long-Lasting Mascara<br />
Pressed Powder Cheek Blusher</p>
',
	'product_type' => 'simple',
));

$product_silicone_replacement_pads_eyelash_curler_id = td_demo_content::add_product( array( 
	'title' => 'Silicone Replacement Pads Eyelash Curler',
	'file' => 'product_default.txt',
	'product_sku' => 'm39',
	'product_price' => '11.9',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'gray' )
		), 
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '11-20' )
		), 
	), 
	'product_image_td_id' => 'td_pic_p_2',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_body_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>The best eyelash curler technique, combined with a durable structure and super soft silicone pads that hug each and every Lash for amazing lift and curl.</p>
',
	'product_type' => 'simple',
));

$product_portable_angled_flat_foundation_makeup_brush_id = td_demo_content::add_product( array( 
	'title' => 'Portable Angled Flat Foundation Makeup Brush',
	'file' => 'product_default.txt',
	'product_sku' => 'm38',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'black' )
		), 
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1-10' )
		), 
	), 
	'product_price' => '5.5',
	'product_image_td_id' => 'td_pic_p_3',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_face_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>1 Piece Portable Angled Flat Foundation Makeup Brush<br />
Natural wood Buffing Foundation Cover<br />
Professional Makeup Brushes</p>
',
	'product_type' => 'simple',
));

$product_acrylic_french_stripe_nail_art_liner_brush_set_id = td_demo_content::add_product( array( 
	'title' => 'Acrylic French Stripe Nail Art Liner Brush Set',
	'file' => 'product_default.txt',
	'product_sku' => 'm37',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1-10' )
		), 
	), 
	'product_price' => '6.5',
	'product_image_td_id' => 'td_pic_p_4',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_lips_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>3Pcs Acrylic Liner Brush Set<br />
3D Tips Ultra-thin Line Drawing Pen<br />
Brushes Painting Tools</p>
',
	'product_type' => 'simple',
));

$product_stainless_steel_dual_heads_makeup_spatula_id = td_demo_content::add_product( array( 
	'title' => 'Stainless Steel Dual Heads Makeup Spatula',
	'file' => 'product_default.txt',
	'product_sku' => 'm36',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '11-20' )
		), 
	), 
	'product_price' => '12',
	'product_image_td_id' => 'td_pic_p_5',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_lips_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>Smooth and professional texture, easy to clean.<br />
Great tools for mixing your lipstick.<br />
Safe and durable, lightweight and convenient.</p>
',
	'product_type' => 'simple',
));

$product_makeup_brushes_cleaner_silicone_pad_id = td_demo_content::add_product( array( 
	'title' => 'Makeup Brushes Cleaner Silicone Pad',
	'file' => 'product_default.txt',
	'product_sku' => 'm35',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( 'blue','gray','pink','purple' )
		), 
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1-10' )
		), 
	), 
	'product_default_attributes' => array(
		'pa_color' => 'blue',
	),
	'product_price' => '7',
	'product_image_td_id' => 'td_pic_p_6',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_tools_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>Makeup Brushes Cleaner Silicone Pad Mat<br />
Cosmetic Eyebrow Brush Cleaner Tool<br />
Brush Washing Tool<br />
Scrubber Board<br />
Brush Cleaning Pad</p>
',
	'product_type' => 'variable',
));

$product_electric_heated_eyelash_curler_id = td_demo_content::add_product( array( 
	'title' => 'Electric Heated Eyelash Curler',
	'file' => 'product_default.txt',
	'product_sku' => 'm34',
	'product_price' => '22',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'pink','white' )
		), 
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '20-100' )
		), 
	), 
	'product_image_td_id' => 'td_pic_p_7',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_eyes_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>10 seconds preheating for long-lasting curling.<br />
The heating wire is made of nickel-chromium alloy, which has faster heating speed and wider heating area.</p>
',
	'product_type' => 'simple',
));

$product_2pcs_disposable_sterile_ear_piercing_unit_id = td_demo_content::add_product( array( 
	'title' => '2Pcs Disposable Sterile Ear Piercing Unit',
	'file' => 'product_default.txt',
	'product_sku' => 'm33',
	'product_price' => '15.9',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'blue' )
		), 
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '11-20' )
		), 
	), 
	'product_image_td_id' => 'td_pic_p_8',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_body_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>Individually packed and sterilized of this safe pierce tool, can help to avoid inflammation.<br />
Ear stud of this disposable ear piercing tool is made of friendly silver material, not allergic.</p>
',
	'product_type' => 'simple',
));

$product_eyebrow_trimmer_scissor_with_comb_id = td_demo_content::add_product( array( 
	'title' => 'Eyebrow Trimmer Scissor with Comb',
	'file' => 'product_default.txt',
	'product_sku' => 'm32',
	'product_price' => '12.4',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'black','pink' )
		), 
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '11-20' )
		), 
	), 
	'product_image_td_id' => 'td_pic_p_9',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_eyes_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>Eyebrow Trimmer Scissor with Comb<br />
Facial Hair Removal<br />
Grooming Shaping Shaver<br />
Cosmetic Makeup Accessories</p>
',
	'product_type' => 'simple',
));

$product_reusable_bamboo_makeup_remover_pads_id = td_demo_content::add_product( array( 
	'title' => 'Reusable Bamboo Makeup Remover Pads',
	'file' => 'product_default.txt',
	'product_sku' => 'm31',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( 'blue','gray','pink','white' )
		), 
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1-10' )
		), 
	), 
	'product_price' => '4.20',
	'product_image_td_id' => 'td_pic_p_10',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_body_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>Made of eco-friendly bamboo fiber material, it has good breathability, high absorbency, strong<br />
detergency, and it can help gently remove makeup.</p>
',
	'product_type' => 'variable',
));

$product_flawless_foundation_brush_for_liquid_make_up_id = td_demo_content::add_product( array( 
	'title' => 'Flawless Foundation Brush For Liquid Make Up',
	'file' => 'product_default.txt',
	'product_sku' => 'm30',
	'product_price' => '8.50',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'pink' )
		), 
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1-10' )
		), 
	), 
	'product_image_td_id' => 'td_pic_p_1',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_face_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>Rich bristles Makeup better.<br />
Petal brush handle design, easy to grasp.<br />
Three-dimensional diamond brush handle, easy to pick up and use.<br />
About 200,000 brushes with solid material.<br />
The brush passage won&#8217;t come off.</p>
',
	'product_type' => 'simple',
));

$product_eyebrow_inclined_flat_angled_eyeliner_id = td_demo_content::add_product( array( 
	'title' => 'Eyebrow Inclined Flat Angled Eyeliner',
	'file' => 'product_default.txt',
	'product_sku' => 'm29',
	'product_price' => '3.50',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'black' )
		), 
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1-10' )
		), 
	), 
	'product_image_td_id' => 'td_pic_p_2',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_eyes_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>Happy Makeup 5Pcs Black Eyebrow<br />
Inclined Flat Angled Brush Eyeliner<br />
Eye shadow Eye Brow Makeup Tool<br />
Professional Women Cosmetic</p>
',
	'product_type' => 'simple',
));

$product_colorful_blender_brushes_for_make_up_id = td_demo_content::add_product( array( 
	'title' => 'Colorful Blender Brushes for Make-up',
	'file' => 'product_default.txt',
	'product_sku' => 'm28',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( 'black','blue','pink','white' )
		), 
	), 
	'product_price' => '2.5',
	'product_image_td_id' => 'td_pic_p_3',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_face_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>Fashion latest design.<br />
Delicate craft, stunning.<br />
A perfect accessory.<br />
Toothbrush-type makeup brush.</p>
',
	'product_type' => 'variable',
));

$product_manicure_set_stainless_steel_10_in_1_nail_clippers_id = td_demo_content::add_product( array( 
	'title' => 'Manicure Set Stainless Steel 10 In 1 Nail Clippers',
	'file' => 'product_default.txt',
	'product_sku' => 'm27',
	'product_price' => '24.99',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '20-100' )
		), 
	), 
	'product_image_td_id' => 'td_pic_p_4',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_body_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>Barbs, nails, dead skin are easily cut off, fashionable and luxurious, hygienic and comfortable.</p>
',
	'product_type' => 'simple',
));

$product_electric_nail_drill_machine_35000_rpm_id = td_demo_content::add_product( array( 
	'title' => 'Electric Nail Drill Machine 35000 RPM',
	'file' => 'product_default.txt',
	'product_sku' => 'm26',
	'product_price' => '48',
	'product_image_td_id' => 'td_pic_p_5',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_tools_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>Electric Nail File<br />
LED Display Nail Tool<br />
Manicure Machine<br />
Nail Drill<br />
Bits Polisher</p>
',
	'product_type' => 'simple',
));

$product_double_color_waterproof_matte_glitter_lip_liner_id = td_demo_content::add_product( array( 
	'title' => 'Double Color Waterproof Matte Glitter Lip Liner',
	'file' => 'product_default.txt',
	'product_sku' => 'm25',
	'product_price' => '12.99',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'pink' )
		), 
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '11-20' )
		), 
	), 
	'product_image_td_id' => 'td_pic_p_6',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_lips_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>Give your lips a lasting long luscious color.<br />
Keep your lips soft and moisturized.<br />
Eyeliner pencil.</p>
',
	'product_type' => 'simple',
));

$product_20_colors_safe_cosmetic_flash_tattoo_painting_id = td_demo_content::add_product( array( 
	'title' => '20 Colors Safe Cosmetic Flash Tattoo Painting',
	'file' => 'product_default.txt',
	'product_sku' => 'm24',
	'product_price' => '8',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1-10' )
		), 
	), 
	'product_image_td_id' => 'td_pic_p_7',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_body_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>This paints is certified non-toxic and does not contain harmful chemicals. It is safe on to apply on your skin.<br />
20 vibrant colors and 2 shimmering shades.<br />
Suitable for any type of artistic makeup or special effects coloring.</p>
',
	'product_type' => 'simple',
));

$product_cute_convenient_eyelash_tape_cutter_id = td_demo_content::add_product( array( 
	'title' => 'Cute Convenient Eyelash Tape Cutter',
	'file' => 'product_default.txt',
	'product_sku' => 'm23',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( 'blue','pink','purple' )
		), 
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1-10' )
		), 
	), 
	'product_price' => '5',
	'product_image_td_id' => 'td_pic_p_8',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_tools_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>Cute Convenient Eyelash Tape Split Supply<br />
Micropore Paper Medical Tape Split<br />
Eyelash Extension Tool</p>
',
	'product_type' => 'variable',
));

$product_soft_silicone_eyelash_extension_lifting_pad_id = td_demo_content::add_product( array( 
	'title' => 'Soft Silicone Eyelash Extension Lifting Pad',
	'file' => 'product_default.txt',
	'product_sku' => 'm22',
	'product_price' => '11.9',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '11-20' )
		), 
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'blue' )
		), 
	), 
	'product_image_td_id' => 'td_pic_p_9',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_eyes_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>Soft silicone material, making you feel comfortable.<br />
Curved shape design, fit your eyes well.<br />
Perfect for professional salon use or home use.</p>
',
	'product_type' => 'simple',
));

$product_professional_eyelash_extension_tweezers_id = td_demo_content::add_product( array( 
	'title' => 'Professional Eyelash Extension Tweezers',
	'file' => 'product_default.txt',
	'product_sku' => 'm21',
	'product_price' => '12',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '11-20' )
		), 
	), 
	'product_image_td_id' => 'td_pic_p_10',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_tools_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>Stainless steel, light in weight and easy to handle tweezers.<br />
Does not cause hand fatigue.</p>
',
	'product_type' => 'simple',
));

$product_glue_grafted_eyelashes_dedicated_dryer_id = td_demo_content::add_product( array( 
	'title' => 'Glue Grafted Eyelashes Dedicated Dryer',
	'file' => 'product_default.txt',
	'product_sku' => 'm20',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( 'black','blue','white' )
		), 
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '20-100' )
		), 
	), 
	'product_default_attributes' => array(
		'pa_color' => 'black',
	),
	'product_price' => '25',
	'product_image_td_id' => 'td_pic_p_1',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_eyes_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>Soft horizontal wind direction.<br />
The air enters above and below, making the wind softer.<br />
Adjustable wind speed, 3 wind speed one button shift.</p>
',
	'product_type' => 'variable',
));

$product_long_lasting_waterproof_lipstick_pencil_id = td_demo_content::add_product( array( 
	'title' => 'Long Lasting Waterproof Lipstick Pencil',
	'file' => 'product_default.txt',
	'product_sku' => 'm19',
	'product_price' => '3.99',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'pink' )
		), 
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1-10' )
		), 
	), 
	'product_image_td_id' => 'td_pic_p_2',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_lips_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>Charming Lipstick Pencil<br />
Waterproof Long Lasting Matte Glitter<br />
Lip Liner<br />
Makeup Beauty Cosmetics</p>
',
	'product_type' => 'simple',
));

$product_painting_rainbow_multicolor_body_art_stick_id = td_demo_content::add_product( array( 
	'title' => 'Painting Rainbow Multicolor Body Art Stick',
	'file' => 'product_default.txt',
	'product_sku' => 'm18',
	'product_price' => '6.6',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1-10' )
		), 
	), 
	'product_image_td_id' => 'td_pic_p_3',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_body_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>Washable Body Painting Stick<br />
Makeup Rainbow Body Art<br />
Colored Pen<br />
Party Decoration</p>
',
	'product_type' => 'simple',
));

$product_single_head_highlight_concealer_pen_id = td_demo_content::add_product( array( 
	'title' => 'Single Head Highlight Concealer Pen',
	'file' => 'product_default.txt',
	'product_sku' => 'm17',
	'product_price' => '7',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'pink' )
		), 
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1-10' )
		), 
	), 
	'product_image_td_id' => 'td_pic_p_4',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_face_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>Provides medium to heavy coverage.<br />
Emollients keep eye area hydrated.<br />
Natural finish never looks caked-on or clumpy.</p>
',
	'product_type' => 'simple',
));

$product_pro_concealer_correction_contouring_stick_id = td_demo_content::add_product( array( 
	'title' => 'Pro Concealer Correction Contouring Stick',
	'file' => 'product_default.txt',
	'product_sku' => 'm16',
	'product_price' => '7.99',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'pink' )
		), 
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1-10' )
		), 
	), 
	'product_image_td_id' => 'td_pic_p_5',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_lips_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>Soft texture, long-lasting, brighten skin color.<br />
Makes your skin look much better.<br />
Full coverage, can make winkles and flaws invisible.</p>
',
	'product_type' => 'simple',
));

$product_face_makeup_cosmetic_concealer_palette_15_color_id = td_demo_content::add_product( array( 
	'title' => 'Face Makeup Cosmetic Concealer Palette 15 Color',
	'file' => 'product_default.txt',
	'product_sku' => 'm15',
	'product_price' => '5',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1-10' )
		), 
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'pink' )
		), 
	), 
	'product_image_td_id' => 'td_pic_p_6',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_face_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>An extensive range of 15 multiple vibrant long wear concealer color with different skin tones to create amazing looks.</p>
',
	'product_type' => 'simple',
));

$product_anti_wrinkle_whitening_moisturizer_repair_serum_id = td_demo_content::add_product( array( 
	'title' => 'Anti Wrinkle Whitening Moisturizer Repair Serum',
	'file' => 'product_default.txt',
	'product_sku' => 'm14',
	'product_price' => '18',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '11-20' )
		), 
	), 
	'product_image_td_id' => 'td_pic_p_7',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_body_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>It can promote the synthesis of skin collagen and decrease melanin deposition.<br />
Soothes the skin, helps the skin to restore whiteness, prevents the skin from aging, and leaves the skin white and supple.<br />
Improve skin resistance and enhance skin self-repair ability.</p>
',
	'product_type' => 'simple',
));

$product_pearl_glitter_powder_with_high_light_fragrance_id = td_demo_content::add_product( array( 
	'title' => 'Pearl Glitter Powder With High Light Fragrance',
	'file' => 'product_default.txt',
	'product_sku' => 'm13',
	'product_price' => '33',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '20-100' )
		), 
	), 
	'product_image_td_id' => 'td_pic_p_8',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_body_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>Light and transparent, brick and stone shining.<br />
Multi-colored and long-lasting.<br />
Delicate and powdery, make up in one second.<br />
It can be used for hair, eyes, neck and lips.</p>
',
	'product_type' => 'simple',
));

$product_face_concealer_primer_cream_for_pores_id = td_demo_content::add_product( array( 
	'title' => 'Face Concealer Primer Cream for Pores',
	'file' => 'product_default.txt',
	'product_sku' => 'm12',
	'product_price' => '26',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '20-100' )
		), 
	), 
	'product_image_td_id' => 'td_pic_p_9',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_face_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>Face Concealer Cream<br />
Makeup Primer<br />
Invisible Pore Wrinkle Cover<br />
Pores Concealer Foundation<br />
Base Makeup</p>
',
	'product_type' => 'simple',
));

$product_light_pink_shimmer_contour_palette_id = td_demo_content::add_product( array( 
	'title' => 'Light Pink Shimmer Contour Palette',
	'file' => 'product_default.txt',
	'product_sku' => 'm11',
	'product_price' => '19.99',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '11-20' )
		), 
	), 
	'product_image_td_id' => 'td_pic_p_10',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_eyes_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>Product Features:<br />
3D Smooth, Soft, Brightening<br />
The texture is light &#038; smooth, adding delicate shimmer, which brings the skin into a 3D luster.</p>
<p>How to Use:<br />
Use a brush to dip appropriate  amount of powder, and gently rub  on the back of the hand, then apply to face.</p>
',
	'product_type' => 'simple',
));

$product_wound_scar_and_eyebrow_blocker_wax_id = td_demo_content::add_product( array( 
	'title' => 'Wound Scar and Eyebrow Blocker Wax',
	'file' => 'product_default.txt',
	'product_sku' => 'm10',
	'product_price' => '6.5',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'pink' )
		), 
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1-10' )
		), 
	), 
	'product_image_td_id' => 'td_pic_p_1',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_lips_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>Wax skin is makeup artist essential product.<br />
Skin wax can cover the eyebrows, can create scratches, cuts, wounds, or different makeup effects.<br />
How to use :<br />
1. Use alcohol glue daub on what you want to mask, and then wait a minute to dry.<br />
2. Use a tool to place the skin wax until the scar or blain hole cover completely.<br />
3. Use a little oil to modify skin wax.<br />
4. Wax color may be different of your skin color, so you can use face foundation to decorate the wax.</p>
',
	'product_type' => 'simple',
));

$product_face_concealer_primer_with_pore_cover_id = td_demo_content::add_product( array( 
	'title' => 'Face Concealer Primer with Pore Cover',
	'file' => 'product_default.txt',
	'product_sku' => 'm09',
	'product_price' => '13',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'pink' )
		), 
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '11-20' )
		), 
	), 
	'product_image_td_id' => 'td_pic_p_2',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_lips_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>Makeup Primer, invisible pores, smooth fine lines.<br />
Makes makeup look better and last longer.<br />
Can make the skin after makeup look smooth, helps you extend makeup effect, also can help you isolate skin damage.</p>
',
	'product_type' => 'simple',
));

$product_cleansing_facial_mask_stick_with_green_tea_id = td_demo_content::add_product( array( 
	'title' => 'Cleansing Facial Mask Stick with Green Tea',
	'file' => 'product_default.txt',
	'product_sku' => 'm08',
	'product_price' => '12.99',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'white' )
		), 
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '11-20' )
		), 
	), 
	'product_image_td_id' => 'td_pic_p_3',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_face_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>1. Face cleansing and controlling oil, repairing skin, refreshing and moisturizing<br />
2. Gentle hydration, improve acne skin, absorb oil, keep the oil and water balance<br />
3. A wash-off mud mask that exfoliates and moisturizes without irritation with a soft feeling. It gives moisture to the skin.<br />
4. Cleans pores, reduces blackheads, acne, and moisturizes the skin<br />
5. Refresh, Lightweight and non-greasy. Reduce pigmentation. Reduce yellowness and brighten skin tone</p>
',
	'product_type' => 'simple',
));

$product_gold_makeup_retractable_lip_eye_liner_id = td_demo_content::add_product( array( 
	'title' => 'Gold Makeup Retractable Lip Eye Liner',
	'file' => 'product_default.txt',
	'product_sku' => 'm07',
	'product_price' => '4.80',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1-10' )
		), 
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'black' )
		), 
	), 
	'product_image_td_id' => 'td_pic_p_4',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_lips_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>One side is lip brush, and the other side is eyebrow brush.<br />
Retractable and Portable: Convenient for your daily use at home or travel.<br />
Ergonomically designed, provide you a comfortable hand feeling.<br />
A great cosmetic tool and a wonderful gift.</p>
',
	'product_type' => 'simple',
));

$product_essential_multifunctional_makeup_brushes_id = td_demo_content::add_product( array( 
	'title' => 'Essential Multifunctional Makeup Brushes',
	'file' => 'product_default.txt',
	'product_sku' => 'm06',
	'product_price' => '6.99',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1-10' )
		), 
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'white' )
		), 
	), 
	'product_image_td_id' => 'td_pic_p_5',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_face_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>Soft brushes, provide an incredible touch and feel.<br />
Perfect for liquids, powders, or creams to produce a beautiful face and eye makeup application.<br />
Made of high quality wood and nylon material which offering a sense of luxury.<br />
Portable and convenient to use and carry.</p>
',
	'product_type' => 'simple',
));

$product_eyelash_glue_storage_container_id = td_demo_content::add_product( array( 
	'title' => 'Eyelash Glue Storage Container',
	'file' => 'product_default.txt',
	'product_sku' => 'm05',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( 'black','gray','pink','white' )
		), 
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1-10' )
		), 
	), 
	'product_price' => '5.5',
	'product_image_td_id' => 'td_pic_p_6',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_tools_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>Lightweight and portable, easy to use.<br />
Glue storage tank with built-in activated carbon.<br />
Can effectively dehumidify and seal the dry environment.<br />
It can keep the glue for a longer time.<br />
Made of high-quality materials, durable.</p>
',
	'product_type' => 'variable',
));

$product_professional_dual_makeup_eyebrow_comb_id = td_demo_content::add_product( array( 
	'title' => 'Professional Dual Makeup Eyebrow Comb',
	'file' => 'product_default.txt',
	'product_sku' => 'm04',
	'product_price' => '4.5',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1-10' )
		), 
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'black' )
		), 
	), 
	'product_image_td_id' => 'td_pic_p_7',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_tools_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>A perfect 2-in-one tool for shaping eyebrows and separating eyelashes, combing a comb and a brush.<br />
High quality material: the hair is made of soft fiber.<br />
Durable and easy to clean.<br />
Suitable for home &#038; salon use.</p>
',
	'product_type' => 'simple',
));

$product_shampoo_brushes_for_eyelash_extensions_id = td_demo_content::add_product( array( 
	'title' => 'Shampoo Brushes for Eyelash Extensions',
	'file' => 'product_default.txt',
	'product_sku' => 'm03',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( 'pink','white' )
		), 
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1-10' )
		), 
	), 
	'product_default_attributes' => array(
		'pa_color' => 'pink',
	),
	'product_price' => '6',
	'product_image_td_id' => 'td_pic_p_8',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_eyes_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>Eyelash Cleanser Brushes</p>
<p>Lash Shampoo Brushes for Eyelash Extensions</p>
<p>Cosmetic Brushes Peel Off</p>
<p>Blackhead Remover</p>
<p>Face Cleansing</p>
',
	'product_type' => 'variable',
));

$product_led_lamp_clip_eyebrow_tweezers_id = td_demo_content::add_product( array( 
	'title' => 'LED Lamp Clip Eyebrow Tweezers',
	'file' => 'product_default.txt',
	'product_sku' => 'm02',
	'product_price' => '12',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '11-20' )
		), 
	), 
	'product_image_td_id' => 'td_pic_p_9',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_tools_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>With LED Lamp Clip Eyebrow Tweezers<br />
Eyebrow Makeup Beauty Tools<br />
Hair Removal Clamp<br />
Mini Light Delicate Eyebrow Trimming</p>
',
	'product_type' => 'simple',
));

$product_pink_color_stainless_steel_eye_brow_clips_id = td_demo_content::add_product( array( 
	'title' => 'Pink Color Stainless Steel Eye Brow Clips',
	'file' => 'product_default.txt',
	'product_sku' => 'm01',
	'product_price' => '11',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'pink' )
		), 
		array(
			'id' => $p_att_pa_price_id,
			'name' => 'pa_price',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '11-20' )
		), 
	), 
	'product_image_td_id' => 'td_pic_p_10',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_tools_id ),
	'product_tags' => array( 'makeup','product','shop' ),
	'short_description' => '<p>2 Pcs Set Pink Color Stainless Steel Eye Brow Clips Hair Removal<br />
Eyebrow Tweezer<br />
Beauty Makeup Make up Tools<br />
7.3 X 0.8cm 16g</p>
',
	'product_type' => 'simple',
));


/*  ---------------------------------------------------------------------------- 
	MENUS
*/
$menu_td_demo_header_menu_id = td_demo_menus::create_menu('td-demo-header-menu', '');
$menu_td_demo_footer_menu_id = td_demo_menus::create_menu('td-demo-footer-menu', ''); 



/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/
$template_author_template_medicine_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Author Template - Shop Makeup',
	'file' => 'author_cloud_template.txt',
	'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_medicine_pro_id);


$template_404_template_shop_makeup_id = td_demo_content::add_cloud_template(array(
	'title' => '404 Template - Shop Makeup',
	'file' => '404_cloud_template.txt',
	'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_shop_makeup_id);


$template_date_template_shop_makeup_id = td_demo_content::add_cloud_template(array(
	'title' => 'Date Template - Shop Makeup',
	'file' => 'date_cloud_template.txt',
	'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_shop_makeup_id);


$template_tag_template_shop_makeup_id = td_demo_content::add_cloud_template(array(
	'title' => 'Tag Template - Shop Makeup',
	'file' => 'tag_cloud_template.txt',
	'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_shop_makeup_id);


$template_search_template_shop_gadgets_id = td_demo_content::add_cloud_template(array(
	'title' => 'Search Template - Shop Makeup',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_shop_gadgets_id);


$template_category_template_shop_makeup_id = td_demo_content::add_cloud_template(array(
	'title' => 'Category Template - Shop Makeup',
	'file' => 'cat_cloud_template.txt',
	'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_shop_makeup_id);


$template_footer_template_shop_makeup_id = td_demo_content::add_cloud_template(array(
	'title' => 'Footer Template - Shop Makeup',
	'file' => 'footer_cloud_template.txt',
	'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_shop_makeup_id);


$template_single_post_template_shop_makeup_id = td_demo_content::add_cloud_template(array(
	'title' => 'Single Post Template - Shop Makeup',
	'file' => 'post_cloud_template.txt',
	'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_post_template_shop_makeup_id);


$template_header_template_shop_makeup_id = td_demo_content::add_cloud_template(array(
	'title' => 'Header Template - Shop Makeup',
	'file' => 'header_cloud_template.txt',
	'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_shop_makeup_id);


update_post_meta( $template_header_template_shop_makeup_id, 'header_mobile_menu_id', $menu_td_demo_header_menu_id);


$template_woo_archive_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Woo Archive Template',
	'file' => 'woo_archive_cloud_template.txt',
	'template_type' => 'woo_archive',
));

td_demo_misc::update_global_woo_archive_template( 'tdb_template_' . $template_woo_archive_template_id);


$template_woo_search_archive_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Woo Search Archive Template',
	'file' => 'woo_search_archive_cloud_template.txt',
	'template_type' => 'woo_search_archive',
));

td_demo_misc::update_global_woo_search_archive_template( 'tdb_template_' . $template_woo_search_archive_template_id);


$template_woo_shop_base_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Woo Shop Base Template',
	'file' => 'woo_shop_base_cloud_template.txt',
	'template_type' => 'woo_shop_base',
));

td_demo_misc::update_global_woo_shop_base_template( 'tdb_template_' . $template_woo_shop_base_template_id);


$template_woo_product_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Woo Product Template',
	'file' => 'woo_product_cloud_template.txt',
	'template_type' => 'woo_product',
));

td_demo_misc::update_global_woo_product_template( 'tdb_template_' . $template_woo_product_template_id);



/*  ----------------------------------------------------------------------------
	PAGES
*/
$page_home_id = td_demo_content::add_page(array(
    'title' => 'Home',
    'file' => 'home.txt',
    'homepage' => true,
));


/*  ----------------------------------------------------------------------------
	MENUS ITEMS HEADER
*/
$menu_item_0_id = td_demo_menus::add_link(array(
    'title' => 'New',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_product_cat(array(
    'title' => 'Eyes',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'p_cat_id' => $p_cat_eyes_id,
    'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_product_cat(array(
    'title' => 'Face',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'p_cat_id' => $p_cat_face_id,
    'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_product_cat(array(
    'title' => 'Lips',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'p_cat_id' => $p_cat_lips_id,
    'parent_id' => ''
));

$menu_item_4_id = td_demo_menus::add_product_cat(array(
    'title' => 'Body',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'p_cat_id' => $p_cat_body_id,
    'parent_id' => ''
));

$menu_item_5_id = td_demo_menus::add_product_cat(array(
    'title' => 'Tools',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'p_cat_id' => $p_cat_tools_id,
    'parent_id' => ''
));

$menu_item_6_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Blog',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_blog_id,
    'parent_id' => ''
), true);



/*  ----------------------------------------------------------------------------
	MENUS ITEMS FOOTER
*/
$menu_item_0_id = td_demo_menus::add_link(array(
    'title' => 'Customer service',
    'add_to_menu_id' => $menu_td_demo_footer_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_link(array(
    'title' => 'Return policy',
    'add_to_menu_id' => $menu_td_demo_footer_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_link(array(
    'title' => 'Shipping',
    'add_to_menu_id' => $menu_td_demo_footer_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_link(array(
    'title' => 'Billing',
    'add_to_menu_id' => $menu_td_demo_footer_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_4_id = td_demo_menus::add_link(array(
    'title' => 'Privacy Policy',
    'add_to_menu_id' => $menu_td_demo_footer_menu_id,
    'url' => '#',
    'parent_id' => ''
));


/*  ---------------------------------------------------------------------------- 
	GENERAL SETTINGS
*/
td_demo_misc::update_background('', false);

td_demo_misc::update_background_mobile('td_pic_1');

td_demo_misc::update_background_login('td_pic_1');

td_demo_misc::update_background_header('');

td_demo_misc::update_background_footer('');

td_demo_misc::update_footer_text('');

td_demo_misc::update_logo(array('normal' => '','retina' => '','mobile' => '',));

td_demo_misc::update_footer_logo(array('normal' => '','retina' => '',));

td_demo_misc::add_social_buttons(array());

$generated_css = td_css_generator(); 
if ( function_exists('tdsp_css_generator') ) { 
	$generated_css .= tdsp_css_generator();
}
td_util::update_option( 'tds_user_compile_css', $generated_css );
