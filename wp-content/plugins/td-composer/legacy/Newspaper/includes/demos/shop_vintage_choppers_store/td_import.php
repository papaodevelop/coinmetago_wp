<?php 



/*  ---------------------------------------------------------------------------- 
	CATEGORIES
*/
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

$cat_news_id = td_demo_category::add_category(array(
	'category_name' => 'News',
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
$post_td_post_something_for_everyone_id = td_demo_content::add_post(array(
	'title' => 'Something for everyone',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_the_tenere_spirit_id = td_demo_content::add_post(array(
	'title' => 'The Ténéré spirit',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_the_2019_et_tour_id = td_demo_content::add_post(array(
	'title' => 'The 2019 ET tour',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_new_vibrant_colors_id = td_demo_content::add_post(array(
	'title' => 'New vibrant colors',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_desire_what_you_need_id = td_demo_content::add_post(array(
	'title' => 'Desire what you need',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_the_360_virtual_tour_id = td_demo_content::add_post(array(
	'title' => 'The 360 virtual tour',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_the_2020_mt_tour_id = td_demo_content::add_post(array(
	'title' => 'The 2020 MT tour',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_lighter_and_more_compact_id = td_demo_content::add_post(array(
	'title' => 'Lighter and more compact',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_award_winning_engine_id = td_demo_content::add_post(array(
	'title' => 'Award winning engine',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_about_the_booth_id = td_demo_content::add_post(array(
	'title' => 'About the booth',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_ride_to_the_next_level_id = td_demo_content::add_post(array(
	'title' => 'Ride to the next level',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_new_tt_series_2021_id = td_demo_content::add_post(array(
	'title' => 'New TT series 2021',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_discover_the_new_ty_id = td_demo_content::add_post(array(
	'title' => 'Discover the new TY',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_reach_the_next_horizon_id = td_demo_content::add_post(array(
	'title' => 'Reach the next horizon!',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_tune_to_victory_id = td_demo_content::add_post(array(
	'title' => 'Tune to victory',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_colaboration_with_cw_id = td_demo_content::add_post(array(
	'title' => 'Colaboration with CW',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_licensed_to_thrill_id = td_demo_content::add_post(array(
	'title' => 'Licensed to thrill',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_european_debut_of_tt_id = td_demo_content::add_post(array(
	'title' => 'European debut of TT',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_lighter_more_powerful_id = td_demo_content::add_post(array(
	'title' => 'Lighter, more powerful',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_go_further_and_faster_id = td_demo_content::add_post(array(
	'title' => 'Go further and faster',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_news_id,),
));


/*  ---------------------------------------------------------------------------- 
	PAGES
*/
$page_privacy_terms_id = td_demo_content::add_page(array(
    'title' => 'Privacy & Terms',
    'file' => 'privacy_terms.txt',
));

$page_news_id = td_demo_content::add_page(array(
	'title' => 'News',
	'file' => 'news.txt',
));

$page_contact_id = td_demo_content::add_page(array(
	'title' => 'Contact',
	'file' => 'contact.txt',
));

$page_company_history_id = td_demo_content::add_page(array(
	'title' => 'Company History',
	'file' => 'company_history.txt',
));

$page_home_id = td_demo_content::add_page(array(
	'title' => 'Home',
	'file' => 'home.txt',
	'homepage' => true,
));


/*  ---------------------------------------------------------------------------- 
	PRODUCT CATEGORIES
*/

/*  ---------------------------------------------------------------------------- 
	PRODUCT ATTRIBUTES
*/
$p_att_pa_brake_pads_id = td_woo_demo_product_attribute::add_woo_attribute( array(
	'attribute_name' => 'Brake pads',
	'attribute_slug' => 'pa_brake-pads',
	'attribute_type' => 'button',
	'attribute_terms' => array(
		'Metallic','Organic','Semi-metallic'
	), 
	'order_by' => 'menu_order',
	'has_archives' => false
));

$p_att_pa_chasis_id = td_woo_demo_product_attribute::add_woo_attribute( array(
	'attribute_name' => 'Chasis',
	'attribute_slug' => 'pa_chasis',
	'attribute_type' => 'button',
	'attribute_terms' => array(
		'Aluminium','Carbon fibre'
	), 
	'order_by' => 'menu_order',
	'has_archives' => false
));

$p_att_pa_color_id = td_woo_demo_product_attribute::add_woo_attribute( array(
	'attribute_name' => 'Color',
	'attribute_slug' => 'pa_color',
	'attribute_type' => 'color',
	'attribute_terms' => array(
		'Black' => '#000000',
		'Blue' => '#1e73be',
		'Brown' => '#dd9933',
		'Red' => '#dd3333',
		'White' => '#ffffff',
	), 
	'order_by' => 'menu_order',
	'has_archives' => false
));


/*  ---------------------------------------------------------------------------- 
	PRODUCTS
*/
$product_diplomatic_tt_id = td_demo_content::add_product( array( 
	'title' => 'Diplomatic TT',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( 'black','blue','brown','red','white' )
		), 
		array(
			'id' => $p_att_pa_chasis_id,
			'name' => 'pa_chasis',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( 'aluminium','carbon-fibre' )
		), 
		array(
			'id' => $p_att_pa_brake_pads_id,
			'name' => 'pa_brake-pads',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( 'metallic','organic','semi-metallic' )
		), 
	), 
	'product_default_attributes' => array(
		'pa_color' => 'black',
		'pa_chasis' => 'aluminium',
		'pa_brake-pads' => 'metallic',
	),
	'product_price' => '18000',
	'product_image_td_id' => 'td_pic_p_1',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
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
	'title' => 'News',
	'add_to_menu_id' => $menu_td_demo_footer_menu_id,
	'page_id' => $page_news_id,
	'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_page(array(
	'title' => 'Privacy & Terms',
	'add_to_menu_id' => $menu_td_demo_footer_menu_id,
	'page_id' => $page_privacy_terms_id,
	'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_page(array(
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
	'page_id' => $page_home_id,
	'parent_id' => ''
));

$menu_item_0_id = td_demo_menus::add_product(array(
    'title' => 'Diplomatic TT',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'product_id' => $product_diplomatic_tt_id,
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_page(array(
	'title' => 'Company History',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'page_id' => $page_company_history_id,
	'parent_id' => ''
));


/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/
$template_search_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Search Template',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));
td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_id);


$template_category_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Category Template',
	'file' => 'cat_cloud_template.txt',
	'template_type' => 'category',
));
td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_id);


$template_single_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Single Template',
	'file' => 'post_cloud_template.txt',
	'template_type' => 'single',
));
td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_id);


$template_footer_template_vintage_choppers_id = td_demo_content::add_cloud_template(array(
	'title' => 'Footer Template - Vintage Choppers',
	'file' => 'footer_cloud_template.txt',
	'template_type' => 'footer',
));
td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_vintage_choppers_id);


$template_header_template_vintage_choppers_id = td_demo_content::add_cloud_template(array(
	'title' => 'Header Template - Vintage Choppers',
	'file' => 'header_cloud_template.txt',
	'template_type' => 'header',
));
td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_vintage_choppers_id);

$template_404_template_id = td_demo_content::add_cloud_template(array(
    'title' => '404 Template - Watches',
    'file' => '404_cloud_template.txt',
    'template_type' => '404',
));
td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_id);


$template_woo_product_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Woo Product Template',
	'file' => 'woo_product_cloud_template.txt',
	'template_type' => 'woo_product',
));
td_demo_misc::update_global_woo_product_template( 'tdb_template_' . $template_woo_product_template_id);



/*  ---------------------------------------------------------------------------- 
	GENERAL SETTINGS
*/
td_demo_misc::update_background('', false);
td_demo_misc::update_background_mobile('');
td_demo_misc::update_background_login('');
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
