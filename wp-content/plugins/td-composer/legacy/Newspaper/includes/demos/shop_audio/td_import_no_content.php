<?php

/*  ---------------------------------------------------------------------------- 
	PAGES
*/
$page_contact_id = td_demo_content::add_page(array(
	'title' => 'Contact',
	'file' => 'contact.txt',
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

$generated_css = td_css_generator(); 
if ( function_exists('tdsp_css_generator') ) { 
	$generated_css .= tdsp_css_generator();
}
td_util::update_option( 'tds_user_compile_css', $generated_css );
