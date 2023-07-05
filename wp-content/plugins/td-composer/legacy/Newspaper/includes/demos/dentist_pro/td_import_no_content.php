<?php

/*  ----------------------------------------------------------------------------
	TDS LOCKERS
*/


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
