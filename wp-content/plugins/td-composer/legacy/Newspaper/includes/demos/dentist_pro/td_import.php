<?php 

/*  ---------------------------------------------------------------------------- 
	TDS LOCKERS
*/

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


/*  ---------------------------------------------------------------------------- 
	ATTACHMENTS
*/

/*  ---------------------------------------------------------------------------- 
	POSTS
*/
$post_your_children_can_brush_and_floss_with_pleasure_id = td_demo_content::add_post(array(
	'title' => 'Your Children Can Brush and Floss With Pleasure',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_blog_id,),
));

$post_what_you_need_to_know_about_your_wisdom_teeth_id = td_demo_content::add_post(array(
	'title' => 'What You Need to Know About Your Wisdom Teeth',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_blog_id,),
));

$post_many_things_you_can_do_to_prevent_tooth_loss_id = td_demo_content::add_post(array(
	'title' => 'Many Things You Can Do to Prevent Tooth Loss',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_blog_id,),
));

$post_why_dental_implants_are_growing_in_popularity_id = td_demo_content::add_post(array(
	'title' => 'Why Dental Implants are Growing in Popularity',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_blog_id,),
));

$post_why_is_good_dental_equipment_so_important_id = td_demo_content::add_post(array(
	'title' => 'Why Is Good Dental Equipment so Important',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_blog_id,),
));

$post_know_about_the_signs_of_cavity_formation_id = td_demo_content::add_post(array(
	'title' => 'Know About the Signs of Cavity Formation',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_blog_id,),
));

$post_braces_vs_invisible_braces_what_is_the_difference_id = td_demo_content::add_post(array(
	'title' => 'Braces vs Invisible Braces – What is the Difference?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_blog_id,),
));

$post_how_to_save_your_childs_smile_with_cosmetic_dentistry_id = td_demo_content::add_post(array(
	'title' => 'How to Save Your Child’s Smile with Cosmetic Dentistry',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_blog_id,),
));

$post_what_can_you_do_to_promote_good_dental_health_id = td_demo_content::add_post(array(
	'title' => 'What Can You Do to Promote Good Dental Health',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_blog_id,),
));


/*  ---------------------------------------------------------------------------- 
	PRODUCTS
*/

/*  ---------------------------------------------------------------------------- 
	MENUS
*/
$menu_td_demo_header_menu_id = td_demo_menus::create_menu('td-demo-header-menu', ''); 


/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/
$template_404_template_dentist_pro_id = td_demo_content::add_cloud_template(array(
	'title' => '404 Template - Dentist PRO',
	'file' => '404_cloud_template.txt',
	'template_type' => '404',
));

$template_author_template_dentist_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Author Template - Dentist PRO',
	'file' => 'author_cloud_template.txt',
	'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_dentist_pro_id);


$template_date_template_dentist_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Date Template - Dentist PRO',
	'file' => 'date_cloud_template.txt',
	'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_dentist_pro_id);


$template_search_template_dentist_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Search Template - Dentist PRO',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_dentist_pro_id);


$template_tag_template_dentist_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Tag Template - Dentist PRO',
	'file' => 'tag_cloud_template.txt',
	'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_dentist_pro_id);


$template_single_post_template_dentist_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Single Post Template - Dentist PRO',
	'file' => 'post_cloud_template.txt',
	'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_post_template_dentist_pro_id);


$template_category_template_dentist_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Category Template - Dentist PRO',
	'file' => 'cat_cloud_template.txt',
	'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_dentist_pro_id);


$template_footer_template_dentist_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Footer Template - Dentist PRO',
	'file' => 'footer_cloud_template.txt',
	'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_dentist_pro_id);


$template_header_template_dentist_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Header Template - Dentist PRO',
	'file' => 'header_cloud_template.txt',
	'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_dentist_pro_id);


update_post_meta( $template_header_template_dentist_pro_id, 'header_mobile_menu_id', $menu_td_demo_header_menu_id);



/*  ----------------------------------------------------------------------------
	PAGES
*/
$page_home_test_id = td_demo_content::add_page(array(
    'title' => 'Home test',
    'file' => 'home_test.txt',
));

$page_gallery_id = td_demo_content::add_page(array(
    'title' => 'Gallery',
    'file' => 'gallery.txt',
));

$page_contact_id = td_demo_content::add_page(array(
    'title' => 'Contact',
    'file' => 'contact.txt',
));

$page_home_id = td_demo_content::add_page(array(
    'title' => 'Home',
    'file' => 'home.txt',
    'homepage' => true,
));



/*  ----------------------------------------------------------------------------
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_page(array(
    'title' => 'Home',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'page_id' => $page_home_id,
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_link(array(
    'title' =>  '<span data-scroll-target="' . $url . '" data-scroll-to-class="td-services" data-scroll-offset="-100">Services</span>',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_link(array(
    'title' =>  '<span data-scroll-target="' . $url . '" data-scroll-to-class="td-team" data-scroll-offset="-50">Team</span>',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_category(array(
    'title' => 'Blog',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_blog_id,
    'parent_id' => ''
));

$menu_item_4_id = td_demo_menus::add_page(array(
    'title' => 'Gallery',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'page_id' => $page_gallery_id,
    'parent_id' => ''
));

$menu_item_5_id = td_demo_menus::add_page(array(
    'title' => 'Contact',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'page_id' => $page_contact_id,
    'parent_id' => ''
));

/*  ---------------------------------------------------------------------------- 
	GENERAL SETTINGS
*/
td_demo_misc::update_background('', false);

td_demo_misc::update_background_mobile('tdx_pic_3');

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
