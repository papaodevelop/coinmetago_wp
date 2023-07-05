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
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"1861b8b9554b5bf";}',
    )
);

$plan_monthly_plan_id = td_demo_subscription::add_plan( array(
        'name' => 'Monthly Plan',
        'price' => '10',
        'months_in_cycle' => '1',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"4561b8b9554dc7a";}',
    )
);

$plan_free_plan_id = td_demo_subscription::add_plan( array(
        'name' => 'Free Plan',
        'price' => '',
        'months_in_cycle' => '',
        'trial_days' => '0',
        'is_free' => '1',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"2961b8b9555003e";}',
    )
);

$page_payment_page_id_id = td_demo_content::add_page(array(
    'title' => 'Checkout - living_pro',
    'file' => 'tds_checkout.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'payment_page_id',
        'value' => $page_payment_page_id_id,
    )
);

$page_my_account_page_id_id = td_demo_content::add_page(array(
    'title' => 'My Account - living_pro',
    'file' => 'tds_my_account.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'my_account_page_id',
        'value' => $page_my_account_page_id_id,
    )
);

$page_create_account_page_id_id = td_demo_content::add_page(array(
    'title' => 'Login/Register - living_pro',
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
	ATTACHMENTS
*/

/*  ----------------------------------------------------------------------------
	PAGES
*/
$page_plans_popup_id = td_demo_content::add_page(array(
    'title' => 'Plans Popup',
    'file' => 'plans_popup.txt',
    'demo_unique_id' => '361b8b955bd6ab',
));

$page_plans_id = td_demo_content::add_page(array(
    'title' => 'Plans',
    'file' => 'plans.txt',
    'demo_unique_id' => '4861b8b955c09ae',
));

$page_home_id = td_demo_content::add_page(array(
    'title' => 'Home',
    'file' => 'home.txt',
    'homepage' => true,
    'demo_unique_id' => '9961b8b955c418d',
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
        'file' => 'post_default.txt',
        'categories_id_array' => [],
        'tds_locker_settings' => array(
            'tds_title' => 'This Content Is Only For Subscribers',
            'tds_message' => 'Please subscribe to unlock this content.',
            'tds_submit_btn_text' => 'Subscribe to unlock',
            'tds_pp_msg' => 'I consent to processing of my data according to <a href=\"#\">Terms of Use</a> & <a href=\"#\">Privacy Policy</a>',
        ),
        'tds_payable' => 'paid_subscription',
        'tds_paid_subs_page_id' => $page_plans_id,
        'tds_paid_subs_plan_ids' => [$plan_yearly_plan_id,$plan_monthly_plan_id,$plan_free_plan_id],
        'tds_locker_styles' => array(
            'all_tds_shadow' => '20',
            'all_tds_shadow_color' => '#e0e0e0',
            'tds_message_color' => '#0489fc',
            'tds_submit_btn_bg_color' => '#0489fc',
            'tds_submit_btn_bg_color_h' => '#000000',
            'tds_pp_msg_links_color' => '#0489fc',
            'tds_pp_msg_links_color_h' => '#000000',
            'tds_general_font_family' => '702',
        ),
    )
);

td_util::update_option('tds_demo_options', 'a:1:{s:5:"plans";a:3:{i:0;a:2:{s:9:"unique_id";s:15:"1861b8b9554b5bf";s:4:"name";s:11:"Yearly Plan";}i:1;a:2:{s:9:"unique_id";s:15:"4561b8b9554dc7a";s:4:"name";s:12:"Monthly Plan";}i:2;a:2:{s:9:"unique_id";s:15:"2961b8b9555003e";s:4:"name";s:9:"Free Plan";}}}');


/*  ----------------------------------------------------------------------------
	SUBSCRIPTION - end phase 2
*/


/*  ----------------------------------------------------------------------------
	CLOUD TEMPLATES
*/

$template_header_template_living_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Header Template - Living PRO',
    'file' => 'header_cloud_template.txt',
    'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_living_pro_id);


update_post_meta( $template_header_template_living_pro_id, 'header_mobile_menu_id', $menu_td_demo_header_menu_id);


$template_author_template_living_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Author Template - Living PRO',
    'file' => 'author_cloud_template.txt',
    'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_living_pro_id);


$template_404_template_living_pro_id = td_demo_content::add_cloud_template(array(
    'title' => '404 Template - Living PRO',
    'file' => '404_cloud_template.txt',
    'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_living_pro_id);


$template_tag_template_living_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Tag Template - Living PRO',
    'file' => 'tag_cloud_template.txt',
    'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_living_pro_id);


$template_search_template_living_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Search Template - Living PRO',
    'file' => 'search_cloud_template.txt',
    'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_living_pro_id);


$template_category_template_living_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Category Template - Living PRO',
    'file' => 'cat_cloud_template.txt',
    'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_living_pro_id);


$template_single_template_living_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Single Template - Living PRO',
    'file' => 'post_cloud_template.txt',
    'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_living_pro_id);


$template_date_template_living_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Date Template - Living PRO',
    'file' => 'date_cloud_template.txt',
    'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_living_pro_id);


$template_footer_living_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Footer - Living PRO',
    'file' => 'footer_cloud_template.txt',
    'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_living_pro_id);


/*  ----------------------------------------------------------------------------
	GENERAL SETTINGS
*/
td_demo_misc::update_background('tdx_pic_13', false);

td_demo_misc::update_background_mobile('td_pic_1');

td_demo_misc::update_background_login('td_pic_1');

td_demo_misc::update_background_header('');

td_demo_misc::update_background_footer('');
