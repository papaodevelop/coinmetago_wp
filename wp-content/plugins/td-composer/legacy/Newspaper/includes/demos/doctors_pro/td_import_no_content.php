<?php



/*  ----------------------------------------------------------------------------
	PAGES
*/
$page_tab_reviews_id = td_demo_content::add_page( array(
    'title' => 'Tab - Reviews',
    'file' => 'tab_reviews.txt',
    'demo_unique_id' => '27633a7408f21e0',
));

$page_tab_information_id = td_demo_content::add_page( array(
    'title' => 'Tab - Information',
    'file' => 'tab_information.txt',
    'demo_unique_id' => '3633a7408f25da',
));

$page_account_listings_id = td_demo_content::add_page( array(
    'title' => 'Account - Listings',
    'file' => 'account_listings.txt',
    'demo_unique_id' => '68633a7408f2980',
));

$page_listing_details_id = td_demo_content::add_page( array(
    'title' => 'Listing Details',
    'file' => 'listing_details.txt',
    'demo_unique_id' => '39633a7408f2da4',
));

$page_account_reviews_id = td_demo_content::add_page( array(
    'title' => 'Account - Reviews',
    'file' => 'account_reviews.txt',
    'demo_unique_id' => '32633a7408f32d8',
));

$page_account_contacts_id = td_demo_content::add_page( array(
    'title' => 'Account - Contacts',
    'file' => 'account_contacts.txt',
    'demo_unique_id' => '75633a7408f3758',
));

$page_tds_switching_plans_wizard_id = td_demo_content::add_page( array(
    'title' => 'Tds switching plans wizard',
    'file' => 'tds_switching_plans_wizard.txt',
    'demo_unique_id' => '77633a7408f3da6',
));

$page_specialties_id = td_demo_content::add_page( array(
    'title' => 'Specialties',
    'file' => 'specialties.txt',
    'demo_unique_id' => '11633a74090003b',
));

$page_home_id = td_demo_content::add_page( array(
    'title' => 'Home',
    'file' => 'home.txt',
    'homepage' => true,
    'demo_unique_id' => '60633a740900686',
));



/*  ----------------------------------------------------------------------------
	SUBSCRIPTION - start phase 1
*/
update_option('users_can_register', true);
global $wpdb;
$disable_wizard = $wpdb->get_var( "SELECT value FROM tds_options WHERE name = 'disable_wizard'");
if ( empty($disable_wizard) ) {

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
        'price' => '200',
        'months_in_cycle' => '12',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"76633a7408c7ad1";}',
    )
);

$plan_monthly_plan_id = td_demo_subscription::add_plan( array(
        'name' => 'Monthly Plan',
        'price' => '20',
        'months_in_cycle' => '1',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"98633a7408c7b41";}',
    )
);

$plan_free_plan_id = td_demo_subscription::add_plan( array(
        'name' => 'Free Plan',
        'price' => '',
        'months_in_cycle' => '',
        'trial_days' => '0',
        'is_free' => '1',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"88633a7408c7b75";}',
    )
);

$page_payment_page_id_id = td_demo_content::add_page( array(
    'title' => 'Checkout - doctors_pro',
    'file' => 'tds_checkout.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'payment_page_id',
        'value' => $page_payment_page_id_id,
    )
);

$page_my_account_page_id_id = td_demo_content::add_page( array(
    'title' => 'My Account - doctors_pro',
    'file' => 'tds_my_account.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'my_account_page_id',
        'value' => $page_my_account_page_id_id,
    )
);

$page_create_account_page_id_id = td_demo_content::add_page( array(
    'title' => 'Login/Register - doctors_pro',
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
            'tds_title' => 'This Content Is Only For Subscribers',
            'tds_message' => 'Please subscribe to unlock this content.',
            'tds_input_placeholder' => '',
            'tds_submit_btn_text' => 'Subscribe to unlock',
            'tds_after_btn_text' => '',
            'tds_pp_msg' => 'I consent to processing of my data according to <a href=\"#\">Terms of Use</a> & <a href=\"#\">Privacy Policy</a>',
        ),
        'tds_payable' => 'paid_subscription',
        'tds_paid_subs_plan_ids' => [$plan_free_plan_id,$plan_monthly_plan_id,$plan_yearly_plan_id],
        'tds_paid_subs_page_id' => $page_tds_switching_plans_wizard_id,
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

td_util::update_option('tds_demo_options', 'a:1:{s:5:"plans";a:3:{i:0;a:2:{s:9:"unique_id";s:15:"76633a7408c7ad1";s:4:"name";s:11:"Yearly Plan";}i:1;a:2:{s:9:"unique_id";s:15:"98633a7408c7b41";s:4:"name";s:12:"Monthly Plan";}i:2;a:2:{s:9:"unique_id";s:15:"88633a7408c7b75";s:4:"name";s:9:"Free Plan";}}}');


/*  ----------------------------------------------------------------------------
	SUBSCRIPTION - end phase 2
*/


/*  ----------------------------------------------------------------------------
	CLOUD TEMPLATES
*/
$template_footer_template_doctors_pro_id = td_demo_content::add_cloud_template( array(
    'title' => 'Footer Template - Doctors PRO',
    'file' => 'footer_cloud_template.txt',
    'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_doctors_pro_id);


$template_custom_post_type_contacts_id = td_demo_content::add_cloud_template( array(
    'title' => 'Custom Post Type - Contacts',
    'file' => 'cpt_cloud_template_contacts.txt',
    'template_type' => 'cpt',
));

td_demo_misc::update_global_cpt_template( 'tdb_template_' . $template_custom_post_type_contacts_id, 'tdcpt_contacts' );


$template_custom_post_type_reviews_id = td_demo_content::add_cloud_template( array(
    'title' => 'Custom Post Type - Reviews',
    'file' => 'cpt_cloud_template_reviews.txt',
    'template_type' => 'cpt',
));

td_demo_misc::update_global_cpt_template( 'tdb_template_' . $template_custom_post_type_reviews_id, 'tdc-review' );


$template_tag_template_doctors_pro_id = td_demo_content::add_cloud_template( array(
    'title' => 'Tag Template - Doctors PRO',
    'file' => 'tag_cloud_template.txt',
    'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_doctors_pro_id);


$template_date_template_doctors_pro_id = td_demo_content::add_cloud_template( array(
    'title' => 'Date Template - Doctors PRO',
    'file' => 'date_cloud_template.txt',
    'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_doctors_pro_id);


$template_search_template_doctors_pro_id = td_demo_content::add_cloud_template( array(
    'title' => 'Search Template - Doctors PRO',
    'file' => 'search_cloud_template.txt',
    'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_doctors_pro_id);


$template_author_template_doctors_pro_id = td_demo_content::add_cloud_template( array(
    'title' => 'Author Template - Doctors PRO',
    'file' => 'author_cloud_template.txt',
    'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_doctors_pro_id);


$template_category_template_doctors_pro_id = td_demo_content::add_cloud_template( array(
    'title' => 'Category Template - Doctors PRO',
    'file' => 'cat_cloud_template.txt',
    'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_doctors_pro_id);


$template_single_post_template_doctors_pro_id = td_demo_content::add_cloud_template( array(
    'title' => 'Single Post Template - Doctors PRO',
    'file' => 'post_cloud_template.txt',
    'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_post_template_doctors_pro_id);


$template_404_template_doctors_pro_id = td_demo_content::add_cloud_template( array(
    'title' => '404 Template - Doctors PRO',
    'file' => '404_cloud_template.txt',
    'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_doctors_pro_id);


$template_header_template_doctors_pro_id = td_demo_content::add_cloud_template( array(
    'title' => 'Header Template - Doctors PRO',
    'file' => 'header_cloud_template.txt',
    'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_doctors_pro_id);


update_post_meta( $template_header_template_doctors_pro_id, 'header_mobile_menu_id', $menu_td_demo_header_menu_id);


$template_custom_taxonomy_doctors_id = td_demo_content::add_cloud_template( array(
    'title' => 'Custom Taxonomy - Doctors',
    'file' => 'cpt_tax_cloud_template.txt',
    'template_type' => 'cpt_tax',
));

td_demo_misc::update_global_cpt_tax_template( 'tdb_template_' . $template_custom_taxonomy_doctors_id, 'tdtax_specialty' );


td_demo_misc::update_global_cpt_tax_template( 'tdb_template_' . $template_custom_taxonomy_doctors_id, 'tdtax_gender' );


td_demo_misc::update_global_cpt_tax_template( 'tdb_template_' . $template_custom_taxonomy_doctors_id, 'tdtax_location' );


$template_custom_post_type_doctors_id = td_demo_content::add_cloud_template( array(
    'title' => 'Custom Post Type - Doctors',
    'file' => 'cpt_cloud_template.txt',
    'template_type' => 'cpt',
));

td_demo_misc::update_global_cpt_template( 'tdb_template_' . $template_custom_post_type_doctors_id, 'tdcpt_doctors' );



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
