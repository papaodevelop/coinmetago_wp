<?php
/*  ---------------------------------------------------------------------------- 
	PAGES
*/
$page_shipping_delivery_id = td_demo_content::add_page(array(
	'title' => 'Shipping & Delivery',
	'file' => 'shipping_delivery.txt',
));

$page_homepage_id = td_demo_content::add_page(array(
	'title' => 'Homepage',
	'file' => 'homepage.txt',
	'homepage' => true,
));


/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/
$template_single_post_template_kids_store_id = td_demo_content::add_cloud_template(array(
    'title' => 'Kids Store - Single Post Template',
    'file' => 'post_cloud_template.txt',
    'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_post_template_kids_store_id);

$template_404_template_kids_store_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kids Store - 404 Template',
	'file' => '404_cloud_template.txt',
	'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_kids_store_id);


$template_tag_template_kids_store_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kids Store - Tag Template',
	'file' => 'tag_cloud_template.txt',
	'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_kids_store_id);


$template_author_template_kids_store_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kids Store - Author Template',
	'file' => 'author_cloud_template.txt',
	'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_kids_store_id);


$template_date_template_kids_store_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kids Store - Date Template',
	'file' => 'date_cloud_template.txt',
	'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_kids_store_id);


$template_search_template_kids_store_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kids Store - Search Template',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_kids_store_id);


$template_category_template_kids_store_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kids Store - Category Template',
	'file' => 'cat_cloud_template.txt',
	'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_kids_store_id);


$template_kids_store_woo_shop_base_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kids Store – Woo Shop Base Template',
	'file' => 'woo_shop_base_cloud_template.txt',
	'template_type' => 'woo_shop_base',
));

td_demo_misc::update_global_woo_shop_base_template( 'tdb_template_' . $template_kids_store_woo_shop_base_template_id);


$template_footer_template_kids_store_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kids Store - Footer Template',
	'file' => 'footer_cloud_template.txt',
	'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_kids_store_id);


$template_header_template_kids_store_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kids Store - Header Template',
	'file' => 'header_cloud_template.txt',
	'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_kids_store_id);


update_post_meta( $template_header_template_kids_store_id, 'header_mobile_menu_id', $menu_td_demo_header_menu_id);


$template_kids_store_woo_search_archive_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kids Store - Woo Search Archive Template',
	'file' => 'woo_search_archive_cloud_template.txt',
	'template_type' => 'woo_search_archive',
));

td_demo_misc::update_global_woo_search_archive_template( 'tdb_template_' . $template_kids_store_woo_search_archive_template_id);


$template_kids_store_woo_archive_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kids Store - Woo Archive Template',
	'file' => 'woo_archive_cloud_template.txt',
	'template_type' => 'woo_archive',
));

td_demo_misc::update_global_woo_archive_template( 'tdb_template_' . $template_kids_store_woo_archive_template_id);


$template_kids_store_woo_product_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kids Store - Woo Product Template',
	'file' => 'woo_product_cloud_template.txt',
	'template_type' => 'woo_product',
));

td_demo_misc::update_global_woo_product_template( 'tdb_template_' . $template_kids_store_woo_product_template_id);



/*  ---------------------------------------------------------------------------- 
	GENERAL SETTINGS
*/
td_demo_misc::update_background('', false);

td_demo_misc::update_background_mobile('tdx_pic_10');

td_demo_misc::update_background_login('');

td_demo_misc::update_background_header('');

td_demo_misc::update_background_footer('');

$generated_css = td_css_generator(); 
if ( function_exists('tdsp_css_generator') ) { 
	$generated_css .= tdsp_css_generator();
}
td_util::update_option( 'tds_user_compile_css', $generated_css );
