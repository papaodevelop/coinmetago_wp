<?php

/*  ----------------------------------------------------------------------------
	TDS LOCKERS
*/
// add post meta for default locker
td_demo_content::add_locker_meta( array(
        'tds_locker_id' => (int) get_option( 'tds_default_locker_id' ),
        'tds_locker_meta' => array(
            'tds_locker_settings' => array(
                'tds_title' => 'This Content Is Only For Subscribers',
                'tds_message' => 'Please subscribe to unlock this content. Enter your email to get access.',
                'tds_input_placeholder' => 'Please enter your email address.',
                'tds_submit_btn_text' => 'Subscribe to unlock',
                'tds_after_btn_text' => 'Your email address is 100% safe from spam!',
                'tds_pp_msg' => 'I consent to processing of my data according to <a href=\"#\">Terms of Use</a> & <a href=\"#\">Privacy Policy</a>',
            ),
            'tds_locker_styles' => array(
                'all_tds_border' => '4',
                'all_tds_shadow' => '30',
                'all_tds_shadow_color' => 'rgba(0,0,0,0.1)',
                'tds_submit_btn_bg_color' => '#00846b',
                'tds_pp_checked_color' => '#00846b',
                'tds_pp_msg_links_color' => '#00846b',
                'tds_general_font_family' => '702',
            ),
        )
    )
);

/*  ---------------------------------------------------------------------------- 
	PAGES
*/
$page_thank_you_id = td_demo_content::add_page(array(
	'title' => 'Thank you',
	'file' => 'thank_you.txt',
));

$page_homepage_id = td_demo_content::add_page(array(
	'title' => 'Homepage',
	'file' => 'homepage.txt',
	'homepage' => true,
));


/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/
$template_tag_template_parenting_id = td_demo_content::add_cloud_template(array(
	'title' => 'Tag Template - Parenting',
	'file' => 'tag_cloud_template.txt',
	'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_parenting_id);


$template_date_template_parenting_id = td_demo_content::add_cloud_template(array(
	'title' => 'Date Template - Parenting',
	'file' => 'date_cloud_template.txt',
	'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_parenting_id);


$template_404_template_parenting_id = td_demo_content::add_cloud_template(array(
	'title' => '404 Template - Parenting',
	'file' => '404_cloud_template.txt',
	'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_parenting_id);


$template_search_template_parenting_id = td_demo_content::add_cloud_template(array(
	'title' => 'Search Template - Parenting',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_parenting_id);


$template_author_template_parenting_id = td_demo_content::add_cloud_template(array(
	'title' => 'Author Template - Parenting',
	'file' => 'author_cloud_template.txt',
	'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_parenting_id );

$template_category_template_parenting_id = td_demo_content::add_cloud_template(array(
	'title' => 'Category Template - Parenting',
	'file' => 'cat_cloud_template.txt',
	'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_parenting_id);


$template_single_template_parenting_id = td_demo_content::add_cloud_template(array(
	'title' => 'Single Template - Parenting',
	'file' => 'post_cloud_template.txt',
	'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_parenting_id);


$template_footer_template_parenting_id = td_demo_content::add_cloud_template(array(
	'title' => 'Footer Template - Parenting',
	'file' => 'footer_cloud_template.txt',
	'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_parenting_id);


$template_header_template_parenting_id = td_demo_content::add_cloud_template(array(
	'title' => 'Header Template - Parenting',
	'file' => 'header_cloud_template.txt',
	'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_parenting_id);



/*  ---------------------------------------------------------------------------- 
	GENERAL SETTINGS
*/
td_demo_misc::update_background('', false);

td_demo_misc::update_background_mobile('');

td_demo_misc::update_background_login('');

td_demo_misc::update_background_header('');

td_demo_misc::update_background_footer('');

$generated_css = td_css_generator(); 
if ( function_exists('tdsp_css_generator') ) { 
	$generated_css .= tdsp_css_generator();
}
td_util::update_option( 'tds_user_compile_css', $generated_css );
