<?php

/*  ----------------------------------------------------------------------------
	MENUS
*/
$menu_td_demo_header_menu_id = td_demo_menus::create_menu('td-demo-header-menu', '');
$menu_td_demo_top_menu_id = td_demo_menus::create_menu('td-demo-top-menu', '');
$menu_td_demo_mobile_menu_id = td_demo_menus::create_menu('td-demo-mobile-menu', '');
$menu_td_demo_footer_menu_id = td_demo_menus::create_menu('td-demo-footer-menu', '');
$menu_td_demo_footer_menu_extra_id = td_demo_menus::create_menu('td-demo-footer-menu-extra', '');
$menu_td_demo_header_menu_extra_id = td_demo_menus::create_menu('td-demo-header-menu-extra', '');




/*  ----------------------------------------------------------------------------
	PAGES
*/
$page_pricing_id = td_demo_content::add_page(array(
    'title' => 'Pricing',
    'file' => 'pricing.txt',
    'demo_unique_id' => '696275236e3b914',
));

$page_roadmap_id = td_demo_content::add_page(array(
    'title' => 'Roadmap',
    'file' => 'roadmap.txt',
    'demo_unique_id' => '576275236e3c41b',
));

$page_token_id = td_demo_content::add_page(array(
    'title' => 'Token',
    'file' => 'token.txt',
    'demo_unique_id' => '376275236e3d119',
));

$page_contact_id = td_demo_content::add_page(array(
    'title' => 'Contact',
    'file' => 'contact.txt',
    'demo_unique_id' => '866275236e3d9ac',
));

$page_about_id = td_demo_content::add_page(array(
    'title' => 'About',
    'file' => 'about.txt',
    'demo_unique_id' => '656275236e3e540',
));

$page_mega_menu_page_id = td_demo_content::add_page(array(
    'title' => 'Mega menu page',
    'file' => 'mega_menu_page.txt',
    'demo_unique_id' => '296275236e3f29a',
));


/*  ----------------------------------------------------------------------------
	CLOUD TEMPLATES
*/
$template_tag_template_blockchain_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Tag Template - Blockchain PRO',
    'file' => 'tag_cloud_template.txt',
    'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_blockchain_pro_id);


$template_date_template_blockchain_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Date Template - Blockchain PRO',
    'file' => 'date_cloud_template.txt',
    'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_blockchain_pro_id);


$template_search_template_blockchain_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Search Template - Blockchain PRO',
    'file' => 'search_cloud_template.txt',
    'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_blockchain_pro_id);


$template_author_template_blockchain_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Author Template - Blockchain PRO',
    'file' => 'author_cloud_template.txt',
    'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_blockchain_pro_id);


$template_category_template_blockchain_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Category Template - Blockchain PRO',
    'file' => 'cat_cloud_template.txt',
    'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_blockchain_pro_id);


$template_single_post_template_blockchain_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Single Post Template - Blockchain PRO',
    'file' => 'post_cloud_template.txt',
    'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_post_template_blockchain_pro_id);


$template_404_template_blockchain_pro_id = td_demo_content::add_cloud_template(array(
    'title' => '404 Template - Blockchain PRO',
    'file' => '404_cloud_template.txt',
    'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_blockchain_pro_id);


$template_header_template_main_blockchain_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Header Template Main - Blockchain PRO',
    'file' => 'header_cloud_template.txt',
    'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_main_blockchain_pro_id);


update_post_meta( $template_header_template_main_blockchain_pro_id, 'header_mobile_menu_id', $menu_td_demo_header_menu_id);


$template_footer_blockchain_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Footer - Blockchain PRO',
    'file' => 'footer_cloud_template.txt',
    'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_blockchain_pro_id);


$template_header_template_overlay_blockchain_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Header Template Overlay - Blockchain PRO',
    'file' => 'header_cloud_template_overlay.txt',
    'template_type' => 'header',
));


/*  ----------------------------------------------------------------------------
	HOMEPAGE
*/
$page_home_id = td_demo_content::add_page(array(
    'title' => 'Home',
    'file' => 'home.txt',
    'homepage' => true,
    'header_template_id' => $template_header_template_overlay_blockchain_pro_id,
    'demo_unique_id' => '586275236e40c62',
));


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