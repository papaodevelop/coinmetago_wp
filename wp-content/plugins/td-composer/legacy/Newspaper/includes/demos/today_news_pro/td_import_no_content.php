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



$plan_monthly_plan___today_news_pro_id = td_demo_subscription::add_plan( array(
        'name' => 'Monthly Plan - Today News PRO',
        'price' => '13',
        'months_in_cycle' => '1',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"3662419a3e32589";}',
    )
);

$plan_yearly_plan___today_news_pro_id = td_demo_subscription::add_plan( array(
        'name' => 'Yearly Plan - Today News PRO',
        'price' => '100',
        'months_in_cycle' => '12',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"1162419a3e32651";}',
    )
);

$page_payment_page_id_id = td_demo_content::add_page(array(
    'title' => 'Checkout - Today News PRO',
    'file' => 'checkout_today_news_pro.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'payment_page_id',
        'value' => $page_payment_page_id_id,
    )
);

$page_my_account_page_id_id = td_demo_content::add_page(array(
    'title' => 'My Account - Today News PRO',
    'file' => 'my_account_today_news_pro.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'my_account_page_id',
        'value' => $page_my_account_page_id_id,
    )
);

$page_create_account_page_id_id = td_demo_content::add_page(array(
    'title' => 'Login/Register - Today News PRO',
    'file' => 'login_register_today_news_pro.txt',
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
$page_search_modal_today_news_pro_id = td_demo_content::add_page(array(
    'title' => 'Search Modal - Today News PRO',
    'file' => 'search_modal_today_news_pro.txt',
    'demo_unique_id' => '4762419a3e4657a',
));

$page_home_id = td_demo_content::add_page(array(
    'title' => 'Home',
    'file' => 'home.txt',
    'homepage' => true,
    'demo_unique_id' => '162419a3e46cce',
));

$page_select_plan_today_news_pro_id = td_demo_content::add_page(array(
    'title' => 'Select Plan - Today News PRO',
    'file' => 'select_plan_today_news_pro.txt',
    'demo_unique_id' => '062419a3e47152',
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
        'title' => 'Subscription Locker - Today News PRO',
        'file' => '',
        'categories_id_array' => [],
        'tds_locker_settings' => array(
            'tds_title' => 'Exclusive content',
            'tds_message' => 'Subscribe to get access to premium articles like this one.',
            'tds_submit_btn_text' => 'Unlock',
            'tds_pp_msg' => 'I consent to processing of my data according to <a href=\"#\">Terms of Use</a> & <a href=\"#\">Privacy Policy</a>',
            'tds_locker_cf_1_name' => 'Custom field 1',
            'tds_locker_cf_2_name' => 'Custom field 2',
            'tds_locker_cf_3_name' => 'Custom field 3',
        ),
        'tds_payable' => 'paid_subscription',
        'tds_paid_subs_page_id' => $page_select_plan_today_news_pro_id,
        'tds_paid_subs_plan_ids' => [$plan_monthly_plan___today_news_pro_id,$plan_yearly_plan___today_news_pro_id],
        'tds_locker_styles' => array(
            'tds_title_color' => '#000000',
            'tds_message_color' => '#222222',
            'tds_submit_btn_text_color' => '#ffffff',
            'tds_submit_btn_text_color_h' => '#ffffff',
            'tds_submit_btn_bg_color' => '#ce0000',
            'tds_submit_btn_bg_color_h' => '#ce0000',
            'tds_pp_checked_color' => '#ce0000',
            'tds_pp_msg_color' => '#222222',
            'tds_pp_msg_links_color' => '#ce0000',
            'tds_pp_msg_links_color_h' => '#000000',
            'tds_general_font_family' => '394',
            'tds_title_font_size' => '24',
            'tds_title_font_line_height' => '1.2',
            'tds_title_font_weight' => '700',
            'tds_title_font_transform' => 'uppercase',
            'tds_title_font_spacing' => '-2',
            'tds_message_font_size' => '13',
            'tds_message_font_line_height' => '1.3',
            'tds_message_font_weight' => '500',
            'tds_submit_btn_text_font_size' => '13',
            'tds_submit_btn_text_font_weight' => '700',
            'tds_submit_btn_text_font_transform' => 'uppercase',
            'tds_after_btn_text_font_weight' => '500',
        ),
    )
);

td_util::update_option('tds_demo_options', 'a:1:{s:5:"plans";a:2:{i:0;a:2:{s:9:"unique_id";s:15:"3662419a3e32589";s:4:"name";s:29:"Monthly Plan - Today News PRO";}i:1;a:2:{s:9:"unique_id";s:15:"1162419a3e32651";s:4:"name";s:28:"Yearly Plan - Today News PRO";}}}');


/*  ----------------------------------------------------------------------------
	SUBSCRIPTION - end phase 2
*/


/*  ----------------------------------------------------------------------------
	PRODUCTS
*/


/*  ----------------------------------------------------------------------------
	CLOUD TEMPLATES
*/
$template_tag_template_today_news_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Tag Template - Today News PRO',
    'file' => 'tag_cloud_template.txt',
    'template_type' => 'tag',
));
td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_today_news_pro_id);


$template_search_template_today_news_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Search Template - Today News PRO',
    'file' => 'search_cloud_template.txt',
    'template_type' => 'search',
));
td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_today_news_pro_id);


$template_date_template_today_news_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Date Template - Today News PRO',
    'file' => 'date_cloud_template.txt',
    'template_type' => 'date',
));
td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_today_news_pro_id);


$template_author_template_today_news_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Author Template - Today News PRO',
    'file' => 'author_cloud_template.txt',
    'template_type' => 'author',
));
td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_today_news_pro_id);


$template_category_template_today_news_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Category Template - Today News PRO',
    'file' => 'cat_cloud_template.txt',
    'template_type' => 'category',
));
td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_today_news_pro_id);


$template_single_template_today_news_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Single Template - Today News PRO',
    'file' => 'post_cloud_template.txt',
    'template_type' => 'single',
));
td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_today_news_pro_id);


$template_404_template_today_news_pro_id = td_demo_content::add_cloud_template(array(
    'title' => '404 Template - Today News PRO',
    'file' => '404_cloud_template.txt',
    'template_type' => '404',
));
td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_today_news_pro_id);


$template_footer_template_today_news_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Footer Template - Today News PRO',
    'file' => 'footer_cloud_template.txt',
    'template_type' => 'footer',
));
td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_today_news_pro_id);


$template_header_template_today_news_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Header Template - Today News PRO',
    'file' => 'header_cloud_template.txt',
    'template_type' => 'header',
));
td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_today_news_pro_id);


update_post_meta( $template_header_template_today_news_pro_id, 'header_mobile_menu_id', $menu_td_demo_header_menu_id);



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

td_demo_misc::add_social_buttons(array('facebook' => '#','instagram' => '#','tiktok' => '#','twitter' => '#',));

$generated_css = td_css_generator();
if ( function_exists('tdsp_css_generator') ) {
    $generated_css .= tdsp_css_generator();
}
td_util::update_option( 'tds_user_compile_css', $generated_css );
