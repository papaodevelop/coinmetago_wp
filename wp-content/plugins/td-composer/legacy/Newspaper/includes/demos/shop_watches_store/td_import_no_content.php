<?php
/*  ----------------------------------------------------------------------------
	PAGES
*/
$page_home_id = td_demo_content::add_page(array(
    'title' => 'Home',
    'file' => 'home.txt',
    'homepage' => true,
));

$page_blog_id = td_demo_content::add_page(array(
    'title' => 'Blog',
    'file' => 'blog.txt',
    'header_template_id' => $template_header_blog_template_watches_id
));


/*  ----------------------------------------------------------------------------
	CLOUD TEMPLATES
*/
$template_header_template_watches_id = td_demo_content::add_cloud_template(array(
    'title' => 'Header Template - Watches',
    'file' => 'header_cloud_template.txt',
    'template_type' => 'header',
));
td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_watches_id);


$template_header_blog_template_watches_id = td_demo_content::add_cloud_template(array(
    'title' => 'Header Template - Blog - Watches',
    'file' => 'header_blog_cloud_template.txt',
    'template_type' => 'header',
));


$template_404_template_watches_id = td_demo_content::add_cloud_template(array(
    'title' => '404 Template - Watches',
    'file' => '404_cloud_template.txt',
    'template_type' => '404',
    'header_template_id' => $template_header_blog_template_watches_id
));
td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_watches_id);


$template_search_template_watches_id = td_demo_content::add_cloud_template(array(
    'title' => 'Search Template - Watches',
    'file' => 'search_cloud_template.txt',
    'template_type' => 'search',
    'header_template_id' => $template_header_blog_template_watches_id
));
td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_watches_id);


$template_date_template_watches_id = td_demo_content::add_cloud_template(array(
    'title' => 'Date Template - Watches',
    'file' => 'date_cloud_template.txt',
    'template_type' => 'date',
    'header_template_id' => $template_header_blog_template_watches_id
));
td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_watches_id);


$template_tag_template_watches_id = td_demo_content::add_cloud_template(array(
    'title' => 'Tag Template - Watches',
    'file' => 'tag_cloud_template.txt',
    'template_type' => 'tag',
    'header_template_id' => $template_header_blog_template_watches_id
));
td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_watches_id);


$template_category_template_watches_id = td_demo_content::add_cloud_template(array(
    'title' => 'Category Template - Watches',
    'file' => 'cat_cloud_template.txt',
    'template_type' => 'category',
    'header_template_id' => $template_header_blog_template_watches_id
));
td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_watches_id);


$template_single_post_template_watches_id = td_demo_content::add_cloud_template(array(
    'title' => 'Single Post Template - Watches',
    'file' => 'post_cloud_template.txt',
    'template_type' => 'single',
    'header_template_id' => $template_header_blog_template_watches_id
));
td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_post_template_watches_id);


$template_woo_shop_base_template_watches_id = td_demo_content::add_cloud_template(array(
    'title' => 'Woo Shop Base Template - Watches',
    'file' => 'woo_shop_base_cloud_template.txt',
    'template_type' => 'woo_shop_base',
));
td_demo_misc::update_global_woo_shop_base_template( 'tdb_template_' . $template_woo_shop_base_template_watches_id);


$template_footer_template_watches_id = td_demo_content::add_cloud_template(array(
    'title' => 'Footer Template - Watches',
    'file' => 'footer_cloud_template.txt',
    'template_type' => 'footer',
));
td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_watches_id);


$template_woo_search_archive_template_watches_id = td_demo_content::add_cloud_template(array(
    'title' => 'Woo Search Archive Template - Watches',
    'file' => 'woo_search_archive_cloud_template.txt',
    'template_type' => 'woo_search_archive',
));
td_demo_misc::update_global_woo_search_archive_template( 'tdb_template_' . $template_woo_search_archive_template_watches_id);


$template_woo_archive_template_watches_id = td_demo_content::add_cloud_template(array(
    'title' => 'Woo Archive Template - Watches',
    'file' => 'woo_archive_cloud_template.txt',
    'template_type' => 'woo_archive',
));
td_demo_misc::update_global_woo_archive_template( 'tdb_template_' . $template_woo_archive_template_watches_id);


$template_woo_product_template_watches_id = td_demo_content::add_cloud_template(array(
    'title' => 'Woo Product Template - Watches',
    'file' => 'woo_product_cloud_template.txt',
    'template_type' => 'woo_product',
));
td_demo_misc::update_global_woo_product_template( 'tdb_template_' . $template_woo_product_template_watches_id);



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
