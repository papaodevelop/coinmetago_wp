<?php 



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



$plan_free_plan_id = td_demo_subscription::add_plan( array(
	'name' => 'Free Plan',
	'price' => '',
	'months_in_cycle' => '',
	'trial_days' => '0',
	'is_free' => '1',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"44632d4c7ef138e";}',
	)
);

$plan_starter_plan___yearly_id = td_demo_subscription::add_plan( array(
	'name' => 'Starter Plan - Yearly',
	'price' => '100',
	'months_in_cycle' => '12',
	'trial_days' => '0',
	'is_free' => '0',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"76632d4c7ef1423";}',
	)
);

$plan_starter_plan___monthly_id = td_demo_subscription::add_plan( array(
	'name' => 'Starter Plan - Monthly',
	'price' => '10',
	'months_in_cycle' => '1',
	'trial_days' => '0',
	'is_free' => '0',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"57632d4c7ef1483";}',
	)
);

$plan_advanced_plan___monthly_id = td_demo_subscription::add_plan( array(
	'name' => 'Advanced Plan - Monthly',
	'price' => '20',
	'months_in_cycle' => '1',
	'trial_days' => '0',
	'is_free' => '0',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"99632d4c7ef14de";}',
	)
);

$plan_advanced_plan___yearly_id = td_demo_subscription::add_plan( array(
	'name' => 'Advanced Plan - Yearly',
	'price' => '200',
	'months_in_cycle' => '12',
	'trial_days' => '0',
	'is_free' => '0',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"77632d4c7ef1535";}',
	)
);

$page_payment_page_id_id = td_demo_content::add_page( array(
	'title' => 'Checkout - real_estate_pro',
	'file' => 'tds_checkout.txt',
));

td_demo_subscription::add_option( array(
	'name' => 'payment_page_id',
	'value' => $page_payment_page_id_id,
	)
);

$page_my_account_page_id_id = td_demo_content::add_page( array(
	'title' => 'My Account - real_estate_pro',
	'file' => 'tds_my_account.txt',
));

td_demo_subscription::add_option( array(
	'name' => 'my_account_page_id',
	'value' => $page_my_account_page_id_id,
	)
);

$page_create_account_page_id_id = td_demo_content::add_page( array(
	'title' => 'Login/Register - real_estate_pro',
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
	CATEGORIES
*/


/*  ---------------------------------------------------------------------------- 
	ATTACHMENTS
*/

/*  ---------------------------------------------------------------------------- 
	PAGES
*/
$page_page_account_account_details_real_estate_pro_id = td_demo_content::add_page( array(
	'title' => 'Page account – Account details – Real Estate PRO',
	'file' => 'page_account_account_details_real_estate_pro.txt',
	'demo_unique_id' => '24632d4c7f19918',
));

$page_page_account_properties_list_real_estate_pro_id = td_demo_content::add_page( array(
	'title' => 'Page account - Properties list - Real Estate PRO',
	'file' => 'page_account_properties_list_real_estate_pro.txt',
	'demo_unique_id' => '44632d4c7f1a17f',
));

$page_add_property_id = td_demo_content::add_page( array(
	'title' => 'Add property',
	'file' => 'add_property.txt',
	'demo_unique_id' => '34632d4c7f1aee6',
));

$page_properties_id = td_demo_content::add_page( array(
	'title' => 'Properties',
	'file' => 'properties.txt',
	'demo_unique_id' => '48632d4c7f1bd1f',
));

$page_home_id = td_demo_content::add_page( array(
	'title' => 'Home',
	'file' => 'home.txt',
	'homepage' => true,
	'demo_unique_id' => '60632d4c7f1c703',
));

$page_select_a_plan_id = td_demo_content::add_page( array(
	'title' => 'Select a plan',
	'file' => 'select_a_plan.txt',
	'demo_unique_id' => '59632d4c7f1d1ee',
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
				'tds_title' => 'This Content Is Only For Subscribers',
				'tds_message' => 'Please subscribe to unlock this content.',
				'tds_input_placeholder' => '',
				'tds_submit_btn_text' => 'Subscribe to unlock',
				'tds_after_btn_text' => '',
				'tds_pp_msg' => 'I consent to processing of my data according to <a href=\"#\">Terms of Use</a> & <a href=\"#\">Privacy Policy</a>',
			),
	'tds_payable' => 'paid_subscription',
	'tds_paid_subs_plan_ids' => [$plan_free_plan_id,$plan_starter_plan___monthly_id,$plan_starter_plan___yearly_id],
	'tds_paid_subs_page_id' => $page_select_a_plan_id,
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

td_util::update_option('tds_demo_options', 'a:1:{s:5:"plans";a:5:{i:0;a:2:{s:9:"unique_id";s:15:"44632d4c7ef138e";s:4:"name";s:9:"Free Plan";}i:1;a:2:{s:9:"unique_id";s:15:"76632d4c7ef1423";s:4:"name";s:21:"Starter Plan - Yearly";}i:2;a:2:{s:9:"unique_id";s:15:"57632d4c7ef1483";s:4:"name";s:22:"Starter Plan - Monthly";}i:3;a:2:{s:9:"unique_id";s:15:"99632d4c7ef14de";s:4:"name";s:23:"Advanced Plan - Monthly";}i:4;a:2:{s:9:"unique_id";s:15:"77632d4c7ef1535";s:4:"name";s:22:"Advanced Plan - Yearly";}}}');


/*  ---------------------------------------------------------------------------- 
	SUBSCRIPTION - end phase 2
*/

/*  ---------------------------------------------------------------------------- 
	POSTS
*/

/*  ---------------------------------------------------------------------------- 
	PRODUCTS
*/

/*  ---------------------------------------------------------------------------- 
	MENUS
*/


/*  ---------------------------------------------------------------------------- 
	MENUS ITEMS
*/


/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/
$template_404_template_real_estate_pro_id = td_demo_content::add_cloud_template( array(
	'title' => '404 Template - Real Estate PRO',
	'file' => '404_cloud_template.txt',
	'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_real_estate_pro_id);


$template_search_template_real_estate_pro_id = td_demo_content::add_cloud_template( array(
	'title' => 'Search Template - Real Estate PRO',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_real_estate_pro_id);


$template_author_template_real_estate_pro_id = td_demo_content::add_cloud_template( array(
	'title' => 'Author Template - Real Estate PRO',
	'file' => 'author_cloud_template.txt',
	'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_real_estate_pro_id);


$template_custom_taxonomy_template_locations_real_estate_pro_id = td_demo_content::add_cloud_template( array(
	'title' => 'Custom Taxonomy Template - Locations - Real Estate PRO',
	'file' => 'cpt_tax_cloud_template.txt',
	'template_type' => 'cpt_tax',
));


td_demo_misc::update_global_cpt_tax_template( 'tdb_template_' . $template_custom_taxonomy_template_locations_real_estate_pro_id, 'tdtax_property_location' );


$template_custom_taxonomy_template_transaction_types_real_estate_pro_id = td_demo_content::add_cloud_template( array(
	'title' => 'Custom Taxonomy Template - Transaction types - Real Estate PRO',
	'file' => 'cpt_tax_cloud_template.txt',
	'template_type' => 'cpt_tax',
));


td_demo_misc::update_global_cpt_tax_template( 'tdb_template_' . $template_custom_taxonomy_template_transaction_types_real_estate_pro_id, 'tdtax_property_transaction' );


$template_custom_taxonomy_template_property_types_real_estate_pro_id = td_demo_content::add_cloud_template( array(
	'title' => 'Custom Taxonomy Template - Property types - Real Estate PRO',
	'file' => 'cpt_tax_cloud_template.txt',
	'template_type' => 'cpt_tax',
));


td_demo_misc::update_global_cpt_tax_template( 'tdb_template_' . $template_custom_taxonomy_template_property_types_real_estate_pro_id, 'tdtax_property_type' );


$template_custom_post_type_template_properties_real_estate_pro_id = td_demo_content::add_cloud_template( array(
	'title' => 'Custom Post Type Template - Properties - Real Estate PRO',
	'file' => 'cpt_cloud_template.txt',
	'template_type' => 'cpt',
));


td_demo_misc::update_global_cpt_template( 'tdb_template_' . $template_custom_post_type_template_properties_real_estate_pro_id, 'tdcpt_properties' );


$template_footer_template_real_estate_pro_id = td_demo_content::add_cloud_template( array(
	'title' => 'Footer Template - Real Estate PRO',
	'file' => 'footer_cloud_template.txt',
	'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_real_estate_pro_id);


$template_header_template_real_estate_pro_id = td_demo_content::add_cloud_template( array(
	'title' => 'Header Template - Real Estate PRO',
	'file' => 'header_cloud_template.txt',
	'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_real_estate_pro_id);


update_post_meta( $template_header_template_real_estate_pro_id, 'header_mobile_menu_id', $menu_td_demo_header_menu_id);



/*  ---------------------------------------------------------------------------- 
	TAXONOMIES
*/



/*  ---------------------------------------------------------------------------- 
	CPTs
*/



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
