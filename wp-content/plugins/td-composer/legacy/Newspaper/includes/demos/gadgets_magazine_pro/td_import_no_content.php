<?php

/*  ----------------------------------------------------------------------------
	TDS LOCKERS
*/
// add post meta for default locker
td_demo_content::add_locker_meta( array(
        'tds_locker_id' => (int) get_option( 'tds_default_locker_id' ),
        'tds_locker_meta' => array(
            'tds_locker_settings' => array(
                'tds_title' => 'This Content is for Subscribers Only',
                'tds_message' => 'Please enter your email to get full access!',
                'tds_input_placeholder' => 'Email address',
                'tds_submit_btn_text' => 'Subscribe to unlock',
                'tds_after_btn_text' => 'Your email address is 100% safe from spam!',
                'tds_pp_msg' => 'I consent to processing of my data according<br>to the <a href=\"#\">Terms of Use</a> & <a href=\"#\">Privacy Policy</a>',
            ),
            'tds_locker_styles' => array(
                'tds_title_color' => '#0a0000',
                'tds_message_color' => '#000000',
                'tds_submit_btn_bg_color' => '#000000',
                'tds_general_font_family' => '653',
                'tds_title_font_family' => '373',
                'tds_title_font_size' => '24',
                'tds_message_font_size' => '18',
                'tds_message_font_weight' => '600',
                'tds_input_font_size' => '16',
                'tds_submit_btn_text_font_weight' => '600',
                'tds_submit_btn_text_font_transform' => 'uppercase',
                'tds_submit_btn_text_font_spacing' => '1',
                'tds_after_btn_text_font_size' => '14',
                'tds_pp_msg_font_size' => '13',
                'tds_pp_msg_font_line_height' => '1.5',
            ),
        )
    )
);


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


/*  ----------------------------------------------------------------------------
	CLOUD TEMPLATES
*/
$template_header_template_personal_trainer_id = td_demo_content::add_cloud_template(array(
    'title' => 'Header Template - Personal Trainer',
    'file' => 'header_cloud_template.txt',
    'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_personal_trainer_id);


update_post_meta( $template_header_template_personal_trainer_id, 'header_mobile_menu_id', $menu_td_demo_header_menu_id);


$template_footer_personal_trainer_id = td_demo_content::add_cloud_template(array(
    'title' => 'Footer - Personal Trainer',
    'file' => 'footer_cloud_template.txt',
    'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_personal_trainer_id);


$template_author_template_personal_trainer_id = td_demo_content::add_cloud_template(array(
    'title' => 'Author Template - Personal Trainer',
    'file' => 'author_cloud_template.txt',
    'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_personal_trainer_id);


$template_date_template_personal_trainer_id = td_demo_content::add_cloud_template(array(
    'title' => 'Date Template - Personal Trainer',
    'file' => 'date_cloud_template.txt',
    'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_personal_trainer_id);


$template_tag_template_personal_trainer_id = td_demo_content::add_cloud_template(array(
    'title' => 'Tag Template - Personal Trainer',
    'file' => 'tag_cloud_template.txt',
    'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_personal_trainer_id);


$template_search_template_personal_trainer_id = td_demo_content::add_cloud_template(array(
    'title' => 'Search Template - Personal Trainer',
    'file' => 'search_cloud_template.txt',
    'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_personal_trainer_id);


$template_single_post_template_personal_trainer_id = td_demo_content::add_cloud_template(array(
    'title' => 'Single Post Template - Personal Trainer',
    'file' => 'post_cloud_template.txt',
    'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_post_template_personal_trainer_id);


$template_category_template_personal_trainer_id = td_demo_content::add_cloud_template(array(
    'title' => 'Category Template - Personal Trainer',
    'file' => 'cat_cloud_template.txt',
    'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_personal_trainer_id);


$template_404_template_personal_trainer_id = td_demo_content::add_cloud_template(array(
    'title' => '404 Template - Personal Trainer',
    'file' => '404_cloud_template.txt',
    'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_personal_trainer_id);


/*  ----------------------------------------------------------------------------
	PAGES
*/
$page_contact_id = td_demo_content::add_page(array(
    'title' => 'Contact',
    'file' => 'contact.txt',
));

$page_programs_id = td_demo_content::add_page(array(
    'title' => 'Programs',
    'file' => 'programs.txt',
));

$page_results_id = td_demo_content::add_page(array(
    'title' => 'Results',
    'file' => 'results.txt',
));

$page_about_id = td_demo_content::add_page(array(
    'title' => 'About',
    'file' => 'about.txt',
));

$page_home_id = td_demo_content::add_page(array(
    'title' => 'Home',
    'file' => 'home.txt',
    'homepage' => true,
));