<?php


/*  ----------------------------------------------------------------------------
	SUBSCRIPTION - start phase 1
*/
update_option('users_can_register', true);
global $wpdb;
$disable_wizard = $wpdb->get_var( "SELECT value FROM tds_options WHERE name = 'disable_wizard'");
if ( empty($disable_wizard)) {

    td_demo_subscription::add_account_details( array(
            'company_name' => 'Demo Company',
            'billing_cui' => '75864589',
            'billing_j' => '10/120/2021',
            'billing_address' => '2656 Farm Meadow Drive',
            'billing_city' => 'Tucson',
            'billing_country' => 'Arizona',
            'billing_email' => 'yourcompany@website.com',
            'billing_bank_account' => 'NL43INGB4186520410',
            'billing_post_code' => '85712',
            'billing_vat_number' => '75864589',
            'options' => 'a:1:{s:15:"td_demo_content";i:1;}',
        )
    );

    td_demo_subscription::add_payment_bank( array(
            'account_name' => 'Alpha Bank Account',
            'account_number' => '123456',
            'bank_name' => 'Alpha Bank',
            'routing_number' => '123456',
            'iban' => 'NL43INGB4186520410',
            'bic_swift' => '123456',
            'description' => 'Make your payment directly into our bank account. Please use your Subscription ID as the payment reference. Your subscription will be activated when the funds are cleared in our account.',
            'instruction' => 'Payment method instructions go here.',
            'is_active' => '1',
            'options' => 'a:1:{s:15:"td_demo_content";i:1;}',
        )
    );

    td_demo_subscription::add_option( array(
            'name' => 'td_demo_content',
            'value' => '1',
        )
    );

}



$plan_monthly_plan_id = td_demo_subscription::add_plan( array(
        'name' => 'Monthly Plan',
        'price' => '10',
        'months_in_cycle' => '1',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"6661e583e5d4305";}',
    )
);

$plan_yearly_plan_id = td_demo_subscription::add_plan( array(
        'name' => 'Yearly Plan',
        'price' => '100',
        'months_in_cycle' => '12',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"9561e583e5d43ac";}',
    )
);

$plan_free_plan_id = td_demo_subscription::add_plan( array(
        'name' => 'Free Plan',
        'price' => '',
        'months_in_cycle' => '',
        'trial_days' => '0',
        'is_free' => '1',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"8461e583e5d4422";}',
    )
);

$page_payment_page_id_id = td_demo_content::add_page(array(
    'title' => 'Checkout - revenant',
    'file' => 'tds_checkout.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'payment_page_id',
        'value' => $page_payment_page_id_id,
    )
);

$page_my_account_page_id_id = td_demo_content::add_page(array(
    'title' => 'My Account - revenant',
    'file' => 'tds_my_account.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'my_account_page_id',
        'value' => $page_my_account_page_id_id,
    )
);

$page_create_account_page_id_id = td_demo_content::add_page(array(
    'title' => 'Login/Register - revenant',
    'file' => 'tds_login_register.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'create_account_page_id',
        'value' => $page_create_account_page_id_id,
    )
);

td_demo_subscription::add_option( array(
        'name' => 'go_wizard',
        'value' => '1',
    )
);

td_demo_subscription::add_option( array(
        'name' => 'wizard_company_complete',
        'value' => '1',
    )
);

td_demo_subscription::add_option( array(
        'name' => 'wizard_payments_complete',
        'value' => '1',
    )
);

td_demo_subscription::add_option( array(
        'name' => 'wizard_plans_complete',
        'value' => '1',
    )
);

td_demo_subscription::add_option( array(
        'name' => 'wizard_locker_complete',
        'value' => '1',
    )
);

td_demo_subscription::add_option( array(
        'name' => 'disable_wizard',
        'value' => '1',
    )
);


/*  ----------------------------------------------------------------------------
	SUBSCRIPTION - end phase 1
*/

/*  ----------------------------------------------------------------------------
	PAGES
*/
$page_tds_switching_plans_wizard_id = td_demo_content::add_page(array(
    'title' => 'Revenant - Switching plans wizard',
    'file' => 'tds_switching_plans_wizard.txt',
    'demo_unique_id' => '2461e583e618d5d',
));

$page_thank_you_id = td_demo_content::add_page(array(
    'title' => 'Thank you',
    'file' => 'thank_you.txt',
    'demo_unique_id' => '4361e583e619b51',
));

$page_homepage_id = td_demo_content::add_page(array(
    'title' => 'Homepage',
    'file' => 'homepage.txt',
    'homepage' => true,
    'demo_unique_id' => '2661e583e61a3a9',
));


/*  ----------------------------------------------------------------------------
	SUBSCRIPTION - start phase 2
*/

/*  ----------------------------------------------------------------------------
	SUBSCRIPTIONS
*/
// add locker
$post_tds_default_wizard_locker_id = td_demo_content::add_post( array(
        'post_type' => 'tds_locker',
        'title' => 'Revenant - Wizard Locker (default)',
        'file' => 'post_default.txt',
        'categories_id_array' => [],
        'tds_locker_settings' => array(
            'tds_title' => 'This Content Is Only For Subscribers',
            'tds_message' => 'Please subscribe to unlock this content. Enter your email to get access.',
            'tds_submit_btn_text' => 'Subscribe to unlock',
            'tds_after_btn_text' => 'Your email address is 100% safe from spam!',
            'tds_pp_msg' => 'I consent to processing of my data according to <a href=\"#\">Terms of Use</a> & <a href=\"#\">Privacy Policy</a>.',
            'tds_locker_cf_1_name' => 'Custom field 1',
            'tds_locker_cf_2_name' => 'Custom field 2',
            'tds_locker_cf_3_name' => 'Custom field 3',
        ),
        'tds_payable' => 'paid_subscription',
        'tds_paid_subs_page_id' => $page_tds_switching_plans_wizard_id,
        'tds_paid_subs_plan_ids' => [$plan_monthly_plan_id,$plan_yearly_plan_id,$plan_free_plan_id],
        'tds_locker_styles' => array(
            'tds_bg_color' => '#000000',
            'all_tds_border' => '1px',
            'all_tds_border_color' => '#ffffff',
            'tds_title_color' => '#9e9e9e',
            'tds_message_color' => '#ffffff',
            'tds_submit_btn_text_color' => '#ffffff',
            'tds_submit_btn_text_color_h' => '#ffffff',
            'tds_submit_btn_bg_color' => '#d2366d',
            'tds_submit_btn_bg_color_h' => '#f45391',
            'tds_after_btn_text_color' => '#9e9e9e',
            'tds_pp_checked_color' => '#000000',
            'tds_pp_check_bg' => '#d2366d',
            'tds_pp_check_bg_f' => '#f45391',
            'tds_pp_check_border_color' => '#d2366d',
            'tds_pp_check_border_color_f' => '#f45391',
            'tds_pp_msg_color' => '#ffffff',
            'tds_pp_msg_links_color' => '#d2366d',
            'tds_pp_msg_links_color_h' => '#f45391',
            'tds_general_font_family' => '702',
            'tds_title_font_family' => '445',
            'tds_title_font_size' => '50',
            'tds_title_font_line_height' => '1',
            'tds_title_font_weight' => '500',
            'tds_title_font_transform' => 'uppercase',
            'tds_title_font_spacing' => '0.5',
            'tds_message_font_family' => '702',
            'tds_message_font_size' => '18',
            'tds_message_font_line_height' => '1.8',
            'tds_message_font_weight' => '500',
            'tds_submit_btn_text_font_family' => '702',
            'tds_submit_btn_text_font_size' => '16',
            'tds_submit_btn_text_font_line_height' => '1.4',
            'tds_submit_btn_text_font_weight' => '400',
            'tds_submit_btn_text_font_spacing' => '0.5',
            'tds_after_btn_text_font_family' => '702',
            'tds_after_btn_text_font_size' => '16',
            'tds_after_btn_text_font_line_height' => '1.4',
            'tds_after_btn_text_font_weight' => '500',
            'tds_after_btn_text_font_spacing' => '0.5',
            'tds_pp_msg_font_family' => '702',
            'tds_pp_msg_font_size' => '12',
            'tds_pp_msg_font_line_height' => '1.4',
            'tds_pp_msg_font_weight' => '600',
            'tds_pp_msg_font_spacing' => '0.8',
        ),
    )
);

// add locker
$post_newspaper_revenant_locker_id = td_demo_content::add_post( array(
        'post_type' => 'tds_locker',
        'title' => 'Newspaper Revenant Locker',
        'file' => 'post_default.txt',
        'categories_id_array' => [],
        'tds_locker_settings' => array(
            'tds_title' => 'Get Access to Online Classes',
            'tds_message' => 'To unlock this content, please input your email address in the bar below. ',
            'tds_input_placeholder' => 'Email Address',
            'tds_submit_btn_text' => 'Subscribe',
            'tds_after_btn_text' => 'You\'ll instantaneously get access to online classes after subscription.',
            'tds_pp_msg' => 'I consent to processing of my data according to <a href=\"#\">Terms of Use</a> and the <a href=\"#\">Privacy Policy</a>.',
        ),
        'tds_locker_styles' => array(
            'tds_bg_color' => '#000000',
            'all_tds_border' => '1px',
            'all_tds_border_color' => '#ffffff',
            'tds_title_color' => '#9e9e9e',
            'tds_message_color' => '#ffffff',
            'tds_input_color' => '#9e9e9e',
            'tds_input_color_f' => '#ffffff',
            'tds_input_bg_color' => '#262626',
            'tds_input_border_color' => '#262626',
            'tds_submit_btn_text_color' => '#ffffff',
            'tds_submit_btn_text_color_h' => '#ffffff',
            'tds_submit_btn_bg_color' => '#d2366d',
            'tds_submit_btn_bg_color_h' => '#f45391',
            'tds_after_btn_text_color' => '#9e9e9e',
            'tds_pp_msg_color' => '#ffffff',
            'tds_pp_msg_links_color' => '#d2366d',
            'tds_pp_msg_links_color_h' => '#f45391',
            'tds_general_font_family' => '702',
            'tds_title_font_family' => '445',
            'tds_title_font_size' => '50',
            'tds_title_font_line_height' => '1',
            'tds_title_font_weight' => '500',
            'tds_title_font_transform' => 'uppercase',
            'tds_title_font_spacing' => '0.5',
            'tds_message_font_family' => '702',
            'tds_message_font_size' => '18',
            'tds_message_font_line_height' => '1.6',
            'tds_message_font_weight' => '500',
            'tds_input_font_family' => '702',
            'tds_input_font_size' => '16',
            'tds_input_font_line_height' => '1.4',
            'tds_input_font_weight' => '400',
            'tds_input_font_spacing' => '0.5',
            'tds_submit_btn_text_font_family' => '702',
            'tds_submit_btn_text_font_size' => '16',
            'tds_submit_btn_text_font_line_height' => '1.4',
            'tds_submit_btn_text_font_weight' => '400',
            'tds_submit_btn_text_font_spacing' => '0.5',
            'tds_after_btn_text_font_family' => '702',
            'tds_after_btn_text_font_size' => '16',
            'tds_after_btn_text_font_line_height' => '1.4',
            'tds_after_btn_text_font_weight' => '500',
            'tds_after_btn_text_font_spacing' => '0.5',
            'tds_pp_msg_font_family' => '702',
            'tds_pp_msg_font_size' => '12',
            'tds_pp_msg_font_line_height' => '1.6',
            'tds_pp_msg_font_weight' => '600',
            'tds_pp_msg_font_spacing' => '0.8',
        ),
    )
);

// add post meta for default locker
td_demo_content::add_locker_meta( array(
        'tds_locker_id' => (int) get_option( 'tds_default_locker_id' ),
        'tds_locker_meta' => array(
            'tds_locker_settings' => array(
                'tds_title' => 'Get Access to Online Classes',
                'tds_message' => 'To unlock this content, please input your email address in the bar below. ',
                'tds_input_placeholder' => 'Email Address',
                'tds_submit_btn_text' => 'Subscribe',
                'tds_after_btn_text' => 'You\'ll instantaneously get access to online classes after subscription.',
                'tds_pp_msg' => 'I consent to processing of my data according to <a href=\"#\">Terms of Use</a> and the <a href=\"#\">Privacy Policy</a>.',
            ),
            'tds_locker_styles' => array(
                'tds_bg_color' => '#000000',
                'all_tds_border' => '1px',
                'all_tds_border_color' => '#ffffff',
                'tds_title_color' => '#9e9e9e',
                'tds_message_color' => '#ffffff',
                'tds_input_color' => '#9e9e9e',
                'tds_input_color_f' => '#ffffff',
                'tds_input_bg_color' => '#262626',
                'tds_input_border_color' => '#262626',
                'tds_submit_btn_text_color' => '#ffffff',
                'tds_submit_btn_text_color_h' => '#ffffff',
                'tds_submit_btn_bg_color' => '#d2366d',
                'tds_submit_btn_bg_color_h' => '#f45391',
                'tds_after_btn_text_color' => '#9e9e9e',
                'tds_pp_checked_color' => '#d2366d',
                'tds_pp_check_bg' => '#000000',
                'tds_pp_check_bg_f' => '#000000',
                'tds_pp_check_border_color' => '#d2366d',
                'tds_pp_check_border_color_f' => '#d2366d',
                'tds_pp_msg_color' => '#ffffff',
                'tds_pp_msg_links_color' => '#d2366d',
                'tds_pp_msg_links_color_h' => '#f45391',
                'tds_general_font_family' => '702',
                'tds_title_font_family' => '445',
                'tds_title_font_size' => '50',
                'tds_title_font_line_height' => '1',
                'tds_title_font_weight' => '500',
                'tds_title_font_spacing' => '0.5',
                'tds_message_font_family' => '702',
                'tds_message_font_size' => '18',
                'tds_message_font_line_height' => '1.6',
                'tds_message_font_weight' => '500',
                'tds_input_font_family' => '702',
                'tds_input_font_size' => '16',
                'tds_input_font_line_height' => '1.4',
                'tds_input_font_weight' => '400',
                'tds_input_font_spacing' => '0.5',
                'tds_submit_btn_text_font_family' => '702',
                'tds_submit_btn_text_font_size' => '16',
                'tds_submit_btn_text_font_line_height' => '1.4',
                'tds_submit_btn_text_font_weight' => '400',
                'tds_submit_btn_text_font_spacing' => '0.5',
                'tds_after_btn_text_font_family' => '702',
                'tds_after_btn_text_font_size' => '16',
                'tds_after_btn_text_font_line_height' => '1.4',
                'tds_after_btn_text_font_weight' => '500',
                'tds_after_btn_text_font_spacing' => '0.5',
                'tds_pp_msg_font_family' => '702',
                'tds_pp_msg_font_size' => '12',
                'tds_pp_msg_font_line_height' => '1.6',
                'tds_pp_msg_font_weight' => '600',
                'tds_pp_msg_font_spacing' => '0.8',
            ),
        )
    )
);

td_util::update_option('tds_demo_options', 'a:1:{s:5:"plans";a:3:{i:0;a:2:{s:9:"unique_id";s:15:"6661e583e5d4305";s:4:"name";s:12:"Monthly Plan";}i:1;a:2:{s:9:"unique_id";s:15:"9561e583e5d43ac";s:4:"name";s:11:"Yearly Plan";}i:2;a:2:{s:9:"unique_id";s:15:"8461e583e5d4422";s:4:"name";s:9:"Free Plan";}}}');


/*  ----------------------------------------------------------------------------
	SUBSCRIPTION - end phase 2
*/

/*  ----------------------------------------------------------------------------
	CLOUD TEMPLATES
*/
$template_search_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Revenant - Search Template',
    'file' => 'search_cloud_template.txt',
    'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_id);


$template_404_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Revenant - 404 Template',
    'file' => '404_cloud_template.txt',
    'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_id);


$template_date_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Revenant - Date Template',
    'file' => 'date_cloud_template.txt',
    'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_id);


$template_tag_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Revenant - Tag Template',
    'file' => 'tag_cloud_template.txt',
    'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_id);


$template_author_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Revenant - Author Template',
    'file' => 'author_cloud_template.txt',
    'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_id);


$template_category_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Revenant - Category Template',
    'file' => 'cat_cloud_template.txt',
    'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_id);


$template_single_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Revenant - Single Template',
    'file' => 'post_cloud_template.txt',
    'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_id);


$template_footer_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Revenant - Footer Template',
    'file' => 'footer_cloud_template.txt',
    'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_id);


$template_header_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Revenant - Header Template',
    'file' => 'header_cloud_template.txt',
    'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_id);


update_post_meta( $template_header_template_id, 'header_mobile_menu_id', $menu_td_demo_header_menu_id);



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
