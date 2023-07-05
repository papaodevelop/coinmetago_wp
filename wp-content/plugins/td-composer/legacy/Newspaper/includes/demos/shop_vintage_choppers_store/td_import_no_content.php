<?php
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
