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
        'name' => 'Yearly Plan',
        'price' => '100',
        'months_in_cycle' => '12',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"7161fa482993aea";}',
    )
);

$plan_free_plan_id = td_demo_subscription::add_plan( array(
        'name' => 'Free Plan',
        'price' => '',
        'months_in_cycle' => '',
        'trial_days' => '0',
        'is_free' => '1',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"2861fa482995667";}',
    )
);

$plan_monthly_plan_id = td_demo_subscription::add_plan( array(
        'name' => 'Monthly Plan',
        'price' => '10',
        'months_in_cycle' => '1',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"9661fa4829974b3";}',
    )
);

$page_payment_page_id_id = td_demo_content::add_page(array(
    'title' => 'Checkout - nft_pro',
    'file' => 'tds_checkout.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'payment_page_id',
        'value' => $page_payment_page_id_id,
    )
);

$page_my_account_page_id_id = td_demo_content::add_page(array(
    'title' => 'My Account - nft_pro',
    'file' => 'tds_my_account.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'my_account_page_id',
        'value' => $page_my_account_page_id_id,
    )
);

$page_create_account_page_id_id = td_demo_content::add_page(array(
    'title' => 'Login/Register - nft_pro',
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
    'title' => 'Tds switching plans wizard',
    'file' => 'tds_switching_plans_wizard.txt',
    'demo_unique_id' => '3761fa4829e0cd1',
));

$page_home_id = td_demo_content::add_page(array(
    'title' => 'Home',
    'file' => 'home.txt',
    'homepage' => true,
    'demo_unique_id' => '9661fa4829e38e8',
));

$page_menu_popup_id = td_demo_content::add_page(array(
    'title' => 'Menu Popup',
    'file' => 'menu_popup.txt',
    'demo_unique_id' => '6361fa4829e6028',
));

$page_tds_checkout_id = td_demo_content::add_page(array(
    'title' => 'Checkout',
    'file' => 'tds_checkout.txt',
    'demo_unique_id' => '5761fa4829e89b8',
));

$page_tds_my_account_id = td_demo_content::add_page(array(
    'title' => 'My account',
    'file' => 'tds_my_account.txt',
    'demo_unique_id' => '9461fa4829eb00f',
));

$page_tds_login_register_id = td_demo_content::add_page(array(
    'title' => 'Login/Register',
    'file' => 'tds_login_register.txt',
    'demo_unique_id' => '5961fa4829eda17',
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
        'title' => 'Wizard Locker (default)',
        'file' => '',
        'categories_id_array' => [],
        'tds_locker_settings' => array(
            'tds_title' => 'This Content Is for Subscribers Only!',
            'tds_message' => 'Please subscribe to unlock this content.',
            'tds_submit_btn_text' => 'Subscribe Now',
            'tds_pp_msg' => 'I consent to processing of my data according to <a href=\"#\">Terms of Use</a> & <a href=\"#\">Privacy Policy</a>',
            'tds_locker_cf_1_name' => 'Custom field 1',
            'tds_locker_cf_2_name' => 'Custom field 2',
            'tds_locker_cf_3_name' => 'Custom field 3',
        ),
        'tds_payable' => 'paid_subscription',
        'tds_paid_subs_page_id' => $page_tds_switching_plans_wizard_id,
        'tds_paid_subs_plan_ids' => [$plan_yearly_plan_id,$plan_free_plan_id,$plan_monthly_plan_id],
        'tds_locker_styles' => array(
            'tds_bg_color' => '#000000',
            'tds_title_color' => '#ffffff',
            'tds_message_color' => '#dddddd',
            'tds_submit_btn_text_color' => '#000000',
            'tds_submit_btn_text_color_h' => '#aaaaaa',
            'tds_submit_btn_bg_color' => '#ffffff',
            'tds_submit_btn_bg_color_h' => '#ffffff',
            'tds_after_btn_text_color' => '#aaaaaa',
            'tds_pp_checked_color' => '#000000',
            'tds_pp_check_bg' => '#ffffff',
            'tds_pp_check_bg_f' => '#ffffff',
            'tds_pp_check_border_color' => '#ffffff',
            'tds_pp_check_border_color_f' => '#ffffff',
            'tds_pp_msg_color' => '#aaaaaa',
            'tds_pp_msg_links_color' => '#ffffff',
            'tds_pp_msg_links_color_h' => '#ffffff',
            'tds_title_font_family' => '129',
            'tds_title_font_size' => '36',
            'tds_title_font_line_height' => '1',
            'tds_title_font_weight' => '900',
            'tds_title_font_transform' => 'uppercase',
            'tds_message_font_family' => '507',
            'tds_message_font_size' => '14',
            'tds_message_font_weight' => '600',
            'tds_submit_btn_text_font_family' => '507',
            'tds_submit_btn_text_font_weight' => '600',
            'tds_submit_btn_text_font_transform' => 'uppercase',
            'tds_after_btn_text_font_family' => '507',
            'tds_after_btn_text_font_size' => '14',
            'tds_after_btn_text_font_weight' => '700',
            'tds_pp_msg_font_family' => '507',
            'tds_pp_msg_font_size' => '14',
            'tds_pp_msg_font_weight' => '600',
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
            ),
        )
    )
);

td_util::update_option('tds_demo_options', 'a:1:{s:5:"plans";a:3:{i:0;a:2:{s:9:"unique_id";s:15:"7161fa482993aea";s:4:"name";s:11:"Yearly Plan";}i:1;a:2:{s:9:"unique_id";s:15:"2861fa482995667";s:4:"name";s:9:"Free Plan";}i:2;a:2:{s:9:"unique_id";s:15:"9661fa4829974b3";s:4:"name";s:12:"Monthly Plan";}}}');


/*  ----------------------------------------------------------------------------
	SUBSCRIPTION - end phase 2
*/


/*  ----------------------------------------------------------------------------
	CLOUD TEMPLATES
*/
$template_tag_template_nft_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Tag Template - NFT PRO',
    'file' => 'tag_cloud_template.txt',
    'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_nft_pro_id);


$template_date_template_nft_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Date Template - NFT PRO',
    'file' => 'date_cloud_template.txt',
    'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_nft_pro_id);


$template_search_template_nft_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Search Template - NFT PRO',
    'file' => 'search_cloud_template.txt',
    'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_nft_pro_id);


$template_404_template_nft_pro_id = td_demo_content::add_cloud_template(array(
    'title' => '404 Template - NFT PRO',
    'file' => '404_cloud_template.txt',
    'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_nft_pro_id);


$template_author_template_nft_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Author Template - NFT PRO',
    'file' => 'author_cloud_template.txt',
    'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_nft_pro_id);


$template_category_template_nft_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Category Template - NFT PRO',
    'file' => 'cat_cloud_template.txt',
    'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_nft_pro_id);


$template_footer_template_nft_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Footer Template - NFT PRO',
    'file' => 'footer_cloud_template.txt',
    'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_nft_pro_id);


$template_single_template_nft_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Single Template - NFT PRO',
    'file' => 'post_cloud_template.txt',
    'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_nft_pro_id);


$template_header_template_nft_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Header Template - NFT PRO',
    'file' => 'header_cloud_template.txt',
    'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_nft_pro_id);


update_post_meta( $template_header_template_nft_pro_id, 'header_mobile_menu_id', $menu_td_demo_header_menu_id);



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
