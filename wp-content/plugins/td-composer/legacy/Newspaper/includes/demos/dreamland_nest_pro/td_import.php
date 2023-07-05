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
	PAGES
*/
$page_special_offers_id = td_demo_content::add_page(array(
	'title' => 'Special Offers',
	'file' => 'special_offers.txt',
	'demo_unique_id' => '666229f627530b5',
));

$page_weddings_id = td_demo_content::add_page(array(
	'title' => 'Weddings',
	'file' => 'weddings.txt',
	'demo_unique_id' => '656229f627539d8',
));

$page_activities_id = td_demo_content::add_page(array(
	'title' => 'Activities',
	'file' => 'activities.txt',
	'demo_unique_id' => '236229f627541bd',
));

$page_dining_with_us_id = td_demo_content::add_page(array(
	'title' => 'Dining with us',
	'file' => 'dining_with_us.txt',
	'demo_unique_id' => '476229f6275498d',
));

$page_spa_fitness_id = td_demo_content::add_page(array(
	'title' => 'Spa & Fitness',
	'file' => 'spa_fitness.txt',
	'demo_unique_id' => '386229f62755359',
));

$page_home_id = td_demo_content::add_page(array(
	'title' => 'Home',
	'file' => 'home.txt',
	'homepage' => true,
	'demo_unique_id' => '866229f62755e2e',
));

$page_villas_id = td_demo_content::add_page(array(
	'title' => 'Villas',
	'file' => 'villas.txt',
	'demo_unique_id' => '906229f62756efe',
));

$page_rooms_id = td_demo_content::add_page(array(
	'title' => 'Rooms & Suites',
	'file' => 'rooms.txt',
	'template' => 'default',
	'demo_unique_id' => '606229f627578de',
));

$page_about_us_id = td_demo_content::add_page(array(
	'title' => 'About us...',
	'file' => 'about_us.txt',
	'template' => 'default',
	'demo_unique_id' => '616229f6275835a',
));


/*  ---------------------------------------------------------------------------- 
	POSTS
*/
$post_hello_world_id = td_demo_content::add_post(array(
	'title' => 'Hello world!',
	'file' => 'post_default.txt',
	'categories_id_array' => array($cat_uncategorized_id,),
));


/*  ---------------------------------------------------------------------------- 
	PRODUCTS
*/

/*  ---------------------------------------------------------------------------- 
	MENUS
*/
$menu_td_demo_header_menu_id = td_demo_menus::create_menu('td-demo-header-menu', '');
$page_page_mega_menu_id = td_demo_content::add_page(array(
    'title' => 'page mega menu',
    'file' => 'page_mega_menu.txt',
    'demo_unique_id' => '126229f62756636',
));


/*  ---------------------------------------------------------------------------- 
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_page(array(
	'title' => 'About us…',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'page_id' => $page_about_us_id,
	'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_page(array(
	'title' => 'Villas',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'page_id' => $page_villas_id,
	'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_page(array(
	'title' => 'Rooms & Suites',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'page_id' => $page_rooms_id,
	'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_page(array(
	'title' => 'Spa & Fitness',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'page_id' => $page_spa_fitness_id,
	'parent_id' => ''
));

$menu_item_4_id = td_demo_menus::add_page(array(
	'title' => 'Dining with us',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'page_id' => $page_dining_with_us_id,
	'parent_id' => ''
));

$menu_item_5_id = td_demo_menus::add_page(array(
	'title' => 'Activities',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'page_id' => $page_activities_id,
	'parent_id' => ''
));

$menu_item_6_id = td_demo_menus::add_page(array(
	'title' => 'Weddings',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'page_id' => $page_weddings_id,
	'parent_id' => ''
));

$menu_item_7_id = td_demo_menus::add_page(array(
	'title' => 'Special Offers',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'page_id' => $page_special_offers_id,
	'parent_id' => ''
));

$menu_td_demo_top_menu_id = td_demo_menus::create_menu('td-demo-top-menu', ''); 


/*  ---------------------------------------------------------------------------- 
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_mega_menu(array(
	'title' => '☲',
	'add_to_menu_id' => $menu_td_demo_top_menu_id,
	'page_id' => $page_page_mega_menu_id,
	'parent_id' => ''
));


/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/
$template_footer_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Footer Template',
	'file' => 'footer_cloud_template.txt',
	'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_id);


$template_header_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Header Template',
	'file' => 'header_cloud_template.txt',
	'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_id);



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
