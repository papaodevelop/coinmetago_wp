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



$plan_yearly_plan_id = td_demo_subscription::add_plan( array(
        'name' => 'Yearly Plan - News Hub PRO',
        'price' => '100',
        'months_in_cycle' => '12',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"59623096e5bfbad";}',
    )
);

$plan_monthly_plan_id = td_demo_subscription::add_plan( array(
        'name' => 'Monthly Plan - News Hub PRO',
        'price' => '10',
        'months_in_cycle' => '1',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"35623096e5bfc51";}',
    )
);

$plan_free_plan_id = td_demo_subscription::add_plan( array(
        'name' => 'Free Plan - News Hub PRO',
        'price' => '',
        'months_in_cycle' => '',
        'trial_days' => '0',
        'is_free' => '1',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"16623096e5bfcb3";}',
    )
);

$page_payment_page_id_id = td_demo_content::add_page(array(
    'title' => 'Checkout - News Hub PRO',
    'file' => 'tds_checkout.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'payment_page_id',
        'value' => $page_payment_page_id_id,
    )
);

$page_my_account_page_id_id = td_demo_content::add_page(array(
    'title' => 'My Account - News Hub PRO',
    'file' => 'tds_my_account.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'my_account_page_id',
        'value' => $page_my_account_page_id_id,
    )
);

$page_create_account_page_id_id = td_demo_content::add_page(array(
    'title' => 'Login/Register - News Hub PRO',
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
$page_plans_select_news_hub_pro_id = td_demo_content::add_page(array(
    'title' => 'Plans Select - News Hub PRO',
    'file' => 'plans_select_news_hub_pro.txt',
    'demo_unique_id' => '19623096e5d8608',
));

$page_terms_of_use_id = td_demo_content::add_page(array(
    'title' => 'Terms of Use',
    'file' => 'terms_of_use.txt',
    'demo_unique_id' => '43623096e5d8aaf',
));

$page_privacy_policy_id = td_demo_content::add_page(array(
    'title' => 'Privacy Policy',
    'file' => 'privacy_policy.txt',
    'demo_unique_id' => '11623096e5d8f6f',
));

$page_contact_us_id = td_demo_content::add_page(array(
    'title' => 'Contact Us',
    'file' => 'contact_us.txt',
    'demo_unique_id' => '84623096e5d9409',
));

$page_about_newshub_id = td_demo_content::add_page(array(
    'title' => 'About NewsHub',
    'file' => 'about_newshub.txt',
    'demo_unique_id' => '55623096e5d9965',
));

$page_premium_content_id = td_demo_content::add_page(array(
    'title' => 'Premium Content',
    'file' => 'premium_content.txt',
    'demo_unique_id' => '83623096e5d9e8d',
));

$page_menu_popup_news_hub_pro_id = td_demo_content::add_page(array(
    'title' => 'Menu Popup - News Hub PRO',
    'file' => 'menu_popup_news_hub_pro.txt',
    'demo_unique_id' => '44623096e5da2a6',
));

$page_home_id = td_demo_content::add_page(array(
    'title' => 'Home',
    'file' => 'home.txt',
    'homepage' => true,
    'demo_unique_id' => '6623096e5dadc2',
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
        'title' => 'Subscription Locker - News Hub PRO',
        'file' => '',
        'categories_id_array' => [],
        'tds_locker_settings' => array(
            'tds_title' => 'This Content Is Only For Subscribers',
            'tds_message' => 'Please subscribe to unlock this content.',
            'tds_submit_btn_text' => 'Subscribe to unlock',
            'tds_pp_msg' => 'I consent to processing of my data according to <a href=\"#\">Terms of Use</a> & <a href=\"#\">Privacy Policy</a>',
            'tds_locker_cf_1_name' => 'Custom field 1',
            'tds_locker_cf_2_name' => 'Custom field 2',
            'tds_locker_cf_3_name' => 'Custom field 3',
        ),
        'tds_payable' => 'paid_subscription',
        'tds_paid_subs_page_id' => $page_plans_select_news_hub_pro_id,
        'tds_paid_subs_plan_ids' => [$plan_yearly_plan_id,$plan_monthly_plan_id,$plan_free_plan_id],
        'tds_locker_styles' => array(
            'tds_bg_color' => '#333333',
            'tds_title_color' => '#ffffff',
            'tds_message_color' => '#cccccc',
            'tds_submit_btn_bg_color' => '#d61935',
            'tds_submit_btn_bg_color_h' => '#d6374f',
            'tds_after_btn_text_color' => '#999999',
            'tds_pp_checked_color' => '#d61935',
            'tds_pp_check_bg' => '#0f0f0f',
            'tds_pp_check_border_color' => '#0f0f0f',
            'tds_pp_msg_color' => '#999999',
            'tds_pp_msg_links_color' => '#cccccc',
            'tds_pp_msg_links_color_h' => '#ffffff',
            'tds_general_font_family' => '325',
        ),
    )
);

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
                'tds_locker_cf_1_name' => 'Custom field 1',
                'tds_locker_cf_2_name' => 'Custom field 2',
                'tds_locker_cf_3_name' => 'Custom field 3',
            ),
            'tds_locker_styles' => array(
                'tds_bg_color' => '#333333',
                'tds_title_color' => '#ffffff',
                'tds_message_color' => '#cccccc',
                'tds_input_color' => '#ffffff',
                'tds_input_bg_color' => '#0f0f0f',
                'tds_input_border_color' => '#0f0f0f',
                'tds_submit_btn_bg_color' => '#d61935',
                'tds_submit_btn_bg_color_h' => '#d6374f',
                'tds_after_btn_text_color' => '#999999',
                'tds_pp_checked_color' => '#d61935',
                'tds_pp_check_bg' => '#0f0f0f',
                'tds_pp_check_border_color' => '#0f0f0f',
                'tds_pp_msg_color' => '#999999',
                'tds_pp_msg_links_color' => '#cccccc',
                'tds_pp_msg_links_color_h' => '#ffffff',
                'tds_general_font_family' => '325',
            ),
        )
    )
);

td_util::update_option('tds_demo_options', 'a:1:{s:5:"plans";a:3:{i:0;a:2:{s:9:"unique_id";s:15:"59623096e5bfbad";s:4:"name";s:11:"Yearly Plan";}i:1;a:2:{s:9:"unique_id";s:15:"35623096e5bfc51";s:4:"name";s:12:"Monthly Plan";}i:2;a:2:{s:9:"unique_id";s:15:"16623096e5bfcb3";s:4:"name";s:9:"Free Plan";}}}');


/*  ----------------------------------------------------------------------------
	SUBSCRIPTION - end phase 2
*/


/*  ----------------------------------------------------------------------------
	CLOUD TEMPLATES
*/
$template_header_template_2_id = td_demo_content::add_cloud_template(array(
    'title' => 'Header Template - Single Post Template',
    'file' => 'header_cloud_template_single.txt',
    'template_type' => 'header',
));

$template_tag_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Tag Template',
    'file' => 'tag_cloud_template.txt',
    'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_id);


$template_search_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Search Template',
    'file' => 'search_cloud_template.txt',
    'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_id);


$template_date_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Date Template',
    'file' => 'date_cloud_template.txt',
    'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_id);


$template_author_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Author Template',
    'file' => 'author_cloud_template.txt',
    'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_id);


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
    'header_template_id' => $template_header_template_2_id,
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_id);


$template_404_template_id = td_demo_content::add_cloud_template(array(
    'title' => '404 Template',
    'file' => '404_cloud_template.txt',
    'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_id);


$template_footer_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Footer Template',
    'file' => 'footer_cloud_template.txt',
    'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_id);


$template_header_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Header Template - Main',
    'file' => 'header_cloud_template.txt',
    'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_id);



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
