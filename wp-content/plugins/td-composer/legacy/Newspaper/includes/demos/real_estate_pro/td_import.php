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
$menu_td_demo_footer_menu_id = td_demo_menus::create_menu('td-demo-footer-menu', ''); 


/*  ---------------------------------------------------------------------------- 
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_link(array(
	'title' => 'Privacy policy',
	'add_to_menu_id' => $menu_td_demo_footer_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_link(array(
	'title' => 'Terms & conditions',
	'add_to_menu_id' => $menu_td_demo_footer_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_link(array(
	'title' => 'About',
	'add_to_menu_id' => $menu_td_demo_footer_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_link(array(
	'title' => 'Contact',
	'add_to_menu_id' => $menu_td_demo_footer_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_td_demo_header_menu_id = td_demo_menus::create_menu('td-demo-header-menu', ''); 


/*  ---------------------------------------------------------------------------- 
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_page(array(
	'title' => 'Home',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'page_id' => $page_home_id,
	'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_page(array(
	'title' => 'Browse properties',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'page_id' => $page_properties_id,
	'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_page(array(
	'title' => 'Add your own listing',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'page_id' => $page_add_property_id,
	'parent_id' => ''
));


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
	'file' => 'cpt_tax_property_location_cloud_template.txt',
	'template_type' => 'cpt_tax',
));


td_demo_misc::update_global_cpt_tax_template( 'tdb_template_' . $template_custom_taxonomy_template_locations_real_estate_pro_id, 'tdtax_property_location' );


$template_custom_taxonomy_template_transaction_types_real_estate_pro_id = td_demo_content::add_cloud_template( array(
	'title' => 'Custom Taxonomy Template - Transaction types - Real Estate PRO',
	'file' => 'cpt_tax_property_transaction_cloud_template.txt',
	'template_type' => 'cpt_tax',
));


td_demo_misc::update_global_cpt_tax_template( 'tdb_template_' . $template_custom_taxonomy_template_transaction_types_real_estate_pro_id, 'tdtax_property_transaction' );


$template_custom_taxonomy_template_property_types_real_estate_pro_id = td_demo_content::add_cloud_template( array(
	'title' => 'Custom Taxonomy Template - Property types - Real Estate PRO',
	'file' => 'cpt_tax_property_type_cloud_template.txt',
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
$tax_term_aesthetics_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Aesthetics',
	'taxonomy' => 'tdc-review-criteria',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
	'filter_image' => '',
	'tax_term_meta' => array( 
		'tdb_filter_color' => '',
	),
));

$tax_term_general_space_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'General space',
	'taxonomy' => 'tdc-review-criteria',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
	'filter_image' => '',
	'tax_term_meta' => array( 
		'tdb_filter_color' => '',
	),
));

$tax_term_value_for_money_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Value for money',
	'taxonomy' => 'tdc-review-criteria',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
	'filter_image' => '',
	'tax_term_meta' => array( 
		'tdb_filter_color' => '',
	),
));

$tax_term_apartments_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Apartments',
	'taxonomy' => 'tdtax_property_type',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => 'Aliquam consectetur nibh vitae tellus gravida mattis. Nullam aliquet felis nisl, nec iaculis erat bibendum a. Etiam quis euismod augue. Nulla ornare libero sapien. Nullam aliquam massa eu nulla consequat.',
	'filter_image' => 'tdx_pic_5',
));

$tax_term_houses_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Houses',
	'taxonomy' => 'tdtax_property_type',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => 'Aliquam consectetur nibh vitae tellus gravida mattis. Nullam aliquet felis nisl, nec iaculis erat bibendum a. Etiam quis euismod augue. Nulla ornare libero sapien. Nullam aliquam massa eu nulla consequat.',
	'filter_image' => 'tdx_pic_6',
));

$tax_term_united_states_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'United States',
	'taxonomy' => 'tdtax_property_location',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
	'tax_term_meta' => array( 
		'tdb-location-type' => 'country',
	),
));

$tax_term_california_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'California',
	'taxonomy' => 'tdtax_property_location',
	'taxonomy_template' => '',
	'parent_id' => $tax_term_united_states_id,
	'description' => '',
	'tax_term_meta' => array( 
		'tdb-location-type' => 'state',
	),
));

$tax_term_los_angeles_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Los Angeles',
	'taxonomy' => 'tdtax_property_location',
	'taxonomy_template' => '',
	'parent_id' => $tax_term_california_id,
	'description' => '',
	'tax_term_meta' => array( 
		'tdb-location-type' => 'city',
	),
));

$tax_term_san_diego_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'San Diego',
	'taxonomy' => 'tdtax_property_location',
	'taxonomy_template' => '',
	'parent_id' => $tax_term_california_id,
	'description' => '',
	'tax_term_meta' => array( 
		'tdb-location-type' => 'city',
	),
));

$tax_term_san_francisco_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'San Francisco',
	'taxonomy' => 'tdtax_property_location',
	'taxonomy_template' => '',
	'parent_id' => $tax_term_california_id,
	'description' => '',
	'tax_term_meta' => array( 
		'tdb-location-type' => 'city',
	),
));

$tax_term_san_jose_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'San Jose',
	'taxonomy' => 'tdtax_property_location',
	'taxonomy_template' => '',
	'parent_id' => $tax_term_california_id,
	'description' => '',
	'tax_term_meta' => array( 
		'tdb-location-type' => 'city',
	),
));

$tax_term_district_of_columbia_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'District of Columbia',
	'taxonomy' => 'tdtax_property_location',
	'taxonomy_template' => '',
	'parent_id' => $tax_term_united_states_id,
	'description' => '',
	'tax_term_meta' => array( 
		'tdb-location-type' => 'state',
	),
));

$tax_term_washington_d_c_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Washington, D.C.',
	'taxonomy' => 'tdtax_property_location',
	'taxonomy_template' => '',
	'parent_id' => $tax_term_district_of_columbia_id,
	'description' => '',
	'tax_term_meta' => array( 
		'tdb-location-type' => 'city',
	),
));

$tax_term_illinois_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Illinois',
	'taxonomy' => 'tdtax_property_location',
	'taxonomy_template' => '',
	'parent_id' => $tax_term_united_states_id,
	'description' => '',
	'tax_term_meta' => array( 
		'tdb-location-type' => 'state',
	),
));

$tax_term_chicago_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Chicago',
	'taxonomy' => 'tdtax_property_location',
	'taxonomy_template' => '',
	'parent_id' => $tax_term_illinois_id,
	'description' => '',
	'tax_term_meta' => array( 
		'tdb-location-type' => 'city',
	),
));

$tax_term_oregon_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Oregon',
	'taxonomy' => 'tdtax_property_location',
	'taxonomy_template' => '',
	'parent_id' => $tax_term_united_states_id,
	'description' => '',
	'tax_term_meta' => array( 
		'tdb-location-type' => 'state',
	),
));

$tax_term_happy_valley_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Happy Valley',
	'taxonomy' => 'tdtax_property_location',
	'taxonomy_template' => '',
	'parent_id' => $tax_term_oregon_id,
	'description' => '',
	'tax_term_meta' => array( 
		'tdb-location-type' => 'city',
	),
));

$tax_term_portland_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Portland',
	'taxonomy' => 'tdtax_property_location',
	'taxonomy_template' => '',
	'parent_id' => $tax_term_oregon_id,
	'description' => '',
	'tax_term_meta' => array( 
		'tdb-location-type' => 'city',
	),
));

$tax_term_washington_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Washington',
	'taxonomy' => 'tdtax_property_location',
	'taxonomy_template' => '',
	'parent_id' => $tax_term_united_states_id,
	'description' => '',
	'tax_term_meta' => array( 
		'tdb-location-type' => 'state',
	),
));

$tax_term_seattle_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Seattle',
	'taxonomy' => 'tdtax_property_location',
	'taxonomy_template' => '',
	'parent_id' => $tax_term_washington_id,
	'description' => '',
	'tax_term_meta' => array( 
		'tdb-location-type' => 'city',
	),
));

$tax_term_for_sale_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'For sale',
	'taxonomy' => 'tdtax_property_transaction',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => 'Aliquam consectetur nibh vitae tellus gravida mattis. Nullam aliquet felis nisl, nec iaculis erat bibendum a. Etiam quis euismod augue. Nulla ornare libero sapien. Nullam aliquam massa eu nulla consequat.',
	'filter_image' => 'tdx_pic_9',
));

$tax_term_hotel_based_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Hotel based',
	'taxonomy' => 'tdtax_property_transaction',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => 'Aliquam consectetur nibh vitae tellus gravida mattis. Nullam aliquet felis nisl, nec iaculis erat bibendum a. Etiam quis euismod augue. Nulla ornare libero sapien. Nullam aliquam massa eu nulla consequat.',
	'filter_image' => 'tdx_pic_7',
));

$tax_term_rentals_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Rentals',
	'taxonomy' => 'tdtax_property_transaction',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => 'Aliquam consectetur nibh vitae tellus gravida mattis. Nullam aliquet felis nisl, nec iaculis erat bibendum a. Etiam quis euismod augue. Nulla ornare libero sapien. Nullam aliquam massa eu nulla consequat.',
	'filter_image' => 'tdx_pic_8',
));


/*  ---------------------------------------------------------------------------- 
	CPTs
*/
$cpt_apartment_12_id = td_demo_content::add_cpt( array(
	'title' => 'Apartment 12',
	'type' => 'tdcpt_properties',
	'file' => 'tdcpt_properties_default.txt',
	'cpt_image_td_id' => 'td_pic_1',
	'post_meta' => array( 
		'tdcf_price' => 'MzAwMA==',
		'_tdcf_price' => 'ZmllbGRfNjJmY2FiNjdjZWU5MQ==',
		'tdcf_price_per' => 'bW9udGg=',
		'_tdcf_price_per' => 'ZmllbGRfNjJmZGRmODkwNWNkOQ==',
		'tdcf_living_area_surface' => 'NTc=',
		'_tdcf_living_area_surface' => 'ZmllbGRfNjJmY2FiODZjZWU5Mg==',
		'tdcf_bedrooms' => 'MQ==',
		'_tdcf_bedrooms' => 'ZmllbGRfNjJmY2FiYWRjZWU5Mw==',
		'tdcf_bathrooms' => 'MQ==',
		'_tdcf_bathrooms' => 'ZmllbGRfNjJmY2FiYjdjZWU5NA==',
		'tdcf_parking_spots' => 'MA==',
		'_tdcf_parking_spots' => 'ZmllbGRfNjJmY2FiZWJjZWU5Ng==',
		'tdcf_balcony' => 'Tm8=',
		'_tdcf_balcony' => 'ZmllbGRfNjJmY2FiY2JjZWU5NQ==',
		'tdcf_owner_phone_number' => 'MjAyLTU1NS0wMTU4',
		'_tdcf_owner_phone_number' => 'ZmllbGRfNjJmY2QxOGZmNTQ0Zg==',
		'tdcf_owner_email' => 'b3duZXJAZW1haWwuY29t',
		'_tdcf_owner_email' => 'ZmllbGRfNjMyNDVjZGIzNDY4Mg==',
		'tdcf_image_1' => 'MTcx',
		'_tdcf_image_1' => 'ZmllbGRfNjJmY2YzNThkOGQwNw==',
		'tdcf_image_2' => 'MTcy',
		'_tdcf_image_2' => 'ZmllbGRfNjJmY2YzNjNkOGQwOA==',
		'tdcf_image_3' => 'MTcz',
		'_tdcf_image_3' => 'ZmllbGRfNjJmY2YzNmZkOGQwOQ==',
		'tdcf_image_4' => 'MTc0',
		'_tdcf_image_4' => 'ZmllbGRfNjJmY2YzODRkOGQwYQ==',
		'tdb-location-complete' => 'TiBTdHJlZXQgTm9ydGh3ZXN0ICwgV2FzaGluZ3RvbiwgRC5DLiwgRGlzdHJpY3Qgb2YgQ29sdW1iaWEsIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_property_type' => array( $tax_term_apartments_id ),
		'tdtax_property_location' => array( $tax_term_district_of_columbia_id, $tax_term_united_states_id, $tax_term_washington_d_c_id ),
		'tdtax_property_transaction' => array( $tax_term_rentals_id ),
	),
));

$cpt_apartment_11_id = td_demo_content::add_cpt( array(
	'title' => 'Apartment 11',
	'type' => 'tdcpt_properties',
	'file' => 'tdcpt_properties_default.txt',
	'cpt_image_td_id' => 'td_pic_2',
	'post_meta' => array( 
		'tdcf_price' => 'Mzk5LDUwMA==',
		'_tdcf_price' => 'ZmllbGRfNjJmY2FiNjdjZWU5MQ==',
		'tdcf_price_per' => '',
		'_tdcf_price_per' => 'ZmllbGRfNjJmZGRmODkwNWNkOQ==',
		'tdcf_living_area_surface' => 'OTE=',
		'_tdcf_living_area_surface' => 'ZmllbGRfNjJmY2FiODZjZWU5Mg==',
		'tdcf_bedrooms' => 'Mg==',
		'_tdcf_bedrooms' => 'ZmllbGRfNjJmY2FiYWRjZWU5Mw==',
		'tdcf_bathrooms' => 'Mg==',
		'_tdcf_bathrooms' => 'ZmllbGRfNjJmY2FiYjdjZWU5NA==',
		'tdcf_parking_spots' => 'MQ==',
		'_tdcf_parking_spots' => 'ZmllbGRfNjJmY2FiZWJjZWU5Ng==',
		'tdcf_balcony' => 'WWVz',
		'_tdcf_balcony' => 'ZmllbGRfNjJmY2FiY2JjZWU5NQ==',
		'tdcf_owner_phone_number' => 'MjAyLTU1NS0wMTU4',
		'_tdcf_owner_phone_number' => 'ZmllbGRfNjJmY2QxOGZmNTQ0Zg==',
		'tdcf_owner_email' => 'b3duZXJAZW1haWwuY29t',
		'_tdcf_owner_email' => 'ZmllbGRfNjMyNDVjZGIzNDY4Mg==',
		'tdcf_image_1' => 'MTcx',
		'_tdcf_image_1' => 'ZmllbGRfNjJmY2YzNThkOGQwNw==',
		'tdcf_image_2' => 'MTcy',
		'_tdcf_image_2' => 'ZmllbGRfNjJmY2YzNjNkOGQwOA==',
		'tdcf_image_3' => 'MTcz',
		'_tdcf_image_3' => 'ZmllbGRfNjJmY2YzNmZkOGQwOQ==',
		'tdcf_image_4' => 'MTc0',
		'_tdcf_image_4' => 'ZmllbGRfNjJmY2YzODRkOGQwYQ==',
		'tdb-location-complete' => 'U291dGggTmV2YWRhIFN0cmVldCA2MjIsIFBvcnRsYW5kLCBPcmVnb24sIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_property_type' => array( $tax_term_apartments_id ),
		'tdtax_property_location' => array( $tax_term_oregon_id, $tax_term_portland_id, $tax_term_united_states_id ),
		'tdtax_property_transaction' => array( $tax_term_for_sale_id ),
	),
));

$cpt_apartment_10_id = td_demo_content::add_cpt( array(
	'title' => 'Apartment 10',
	'type' => 'tdcpt_properties',
	'file' => 'tdcpt_properties_default.txt',
	'cpt_image_td_id' => 'td_pic_3',
	'post_meta' => array( 
		'tdcf_price' => 'MzgwLDAw',
		'_tdcf_price' => 'ZmllbGRfNjJmY2FiNjdjZWU5MQ==',
		'tdcf_price_per' => '',
		'_tdcf_price_per' => 'ZmllbGRfNjJmZGRmODkwNWNkOQ==',
		'tdcf_living_area_surface' => 'MTI1',
		'_tdcf_living_area_surface' => 'ZmllbGRfNjJmY2FiODZjZWU5Mg==',
		'tdcf_bedrooms' => 'Mg==',
		'_tdcf_bedrooms' => 'ZmllbGRfNjJmY2FiYWRjZWU5Mw==',
		'tdcf_bathrooms' => 'Mg==',
		'_tdcf_bathrooms' => 'ZmllbGRfNjJmY2FiYjdjZWU5NA==',
		'tdcf_parking_spots' => 'MA==',
		'_tdcf_parking_spots' => 'ZmllbGRfNjJmY2FiZWJjZWU5Ng==',
		'tdcf_balcony' => 'Tm8=',
		'_tdcf_balcony' => 'ZmllbGRfNjJmY2FiY2JjZWU5NQ==',
		'tdcf_owner_phone_number' => 'MjAyLTU1NS0wMTU4',
		'_tdcf_owner_phone_number' => 'ZmllbGRfNjJmY2QxOGZmNTQ0Zg==',
		'tdcf_owner_email' => 'b3duZXJAZW1haWwuY29t',
		'_tdcf_owner_email' => 'ZmllbGRfNjMyNDVjZGIzNDY4Mg==',
		'tdcf_image_1' => 'MTcx',
		'_tdcf_image_1' => 'ZmllbGRfNjJmY2YzNThkOGQwNw==',
		'tdcf_image_2' => 'MTcy',
		'_tdcf_image_2' => 'ZmllbGRfNjJmY2YzNjNkOGQwOA==',
		'tdcf_image_3' => 'MTcz',
		'_tdcf_image_3' => 'ZmllbGRfNjJmY2YzNmZkOGQwOQ==',
		'tdcf_image_4' => 'MTc0',
		'_tdcf_image_4' => 'ZmllbGRfNjJmY2YzODRkOGQwYQ==',
		'tdb-location-complete' => 'Q2FtZGVuIEF2ZW51ZSAxNjM5LCBMb3MgQW5nZWxlcywgQ2FsaWZvcm5pYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_property_type' => array( $tax_term_apartments_id ),
		'tdtax_property_location' => array( $tax_term_california_id, $tax_term_los_angeles_id, $tax_term_united_states_id ),
		'tdtax_property_transaction' => array( $tax_term_for_sale_id ),
	),
));

$cpt_apartment_9_id = td_demo_content::add_cpt( array(
	'title' => 'Apartment 9',
	'type' => 'tdcpt_properties',
	'file' => 'tdcpt_properties_default.txt',
	'cpt_image_td_id' => 'td_pic_4',
	'post_meta' => array( 
		'tdcf_price' => 'MTI0MA==',
		'_tdcf_price' => 'ZmllbGRfNjJmY2FiNjdjZWU5MQ==',
		'tdcf_price_per' => 'ZGF5',
		'_tdcf_price_per' => 'ZmllbGRfNjJmZGRmODkwNWNkOQ==',
		'tdcf_living_area_surface' => 'MTUw',
		'_tdcf_living_area_surface' => 'ZmllbGRfNjJmY2FiODZjZWU5Mg==',
		'tdcf_bedrooms' => 'Mg==',
		'_tdcf_bedrooms' => 'ZmllbGRfNjJmY2FiYWRjZWU5Mw==',
		'tdcf_bathrooms' => 'Mg==',
		'_tdcf_bathrooms' => 'ZmllbGRfNjJmY2FiYjdjZWU5NA==',
		'tdcf_parking_spots' => 'Mg==',
		'_tdcf_parking_spots' => 'ZmllbGRfNjJmY2FiZWJjZWU5Ng==',
		'tdcf_balcony' => 'WWVz',
		'_tdcf_balcony' => 'ZmllbGRfNjJmY2FiY2JjZWU5NQ==',
		'tdcf_owner_phone_number' => 'MjAyLTU1NS0wMTU4',
		'_tdcf_owner_phone_number' => 'ZmllbGRfNjJmY2QxOGZmNTQ0Zg==',
		'tdcf_owner_email' => 'b3duZXJAZW1haWwuY29t',
		'_tdcf_owner_email' => 'ZmllbGRfNjMyNDVjZGIzNDY4Mg==',
		'tdcf_image_1' => 'MTcx',
		'_tdcf_image_1' => 'ZmllbGRfNjJmY2YzNThkOGQwNw==',
		'tdcf_image_2' => 'MTcy',
		'_tdcf_image_2' => 'ZmllbGRfNjJmY2YzNjNkOGQwOA==',
		'tdcf_image_3' => 'MTcz',
		'_tdcf_image_3' => 'ZmllbGRfNjJmY2YzNmZkOGQwOQ==',
		'tdcf_image_4' => 'MTc0',
		'_tdcf_image_4' => 'ZmllbGRfNjJmY2YzODRkOGQwYQ==',
		'tdb-location-complete' => 'RWFzdCBTYW4gRmVybmFuZG8gU3RyZWV0IDEzMCwgU2FuIEpvc2UsIENhbGlmb3JuaWEsIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_property_type' => array( $tax_term_apartments_id ),
		'tdtax_property_location' => array( $tax_term_california_id, $tax_term_san_jose_id, $tax_term_united_states_id ),
		'tdtax_property_transaction' => array( $tax_term_hotel_based_id ),
	),
));

$cpt_apartment_8_id = td_demo_content::add_cpt( array(
	'title' => 'Apartment 8',
	'type' => 'tdcpt_properties',
	'file' => 'tdcpt_properties_default.txt',
	'cpt_image_td_id' => 'td_pic_5',
	'post_meta' => array( 
		'tdcf_price' => 'NDY4',
		'_tdcf_price' => 'ZmllbGRfNjJmY2FiNjdjZWU5MQ==',
		'tdcf_price_per' => 'ZGF5',
		'_tdcf_price_per' => 'ZmllbGRfNjJmZGRmODkwNWNkOQ==',
		'tdcf_living_area_surface' => 'NjY=',
		'_tdcf_living_area_surface' => 'ZmllbGRfNjJmY2FiODZjZWU5Mg==',
		'tdcf_bedrooms' => 'Mg==',
		'_tdcf_bedrooms' => 'ZmllbGRfNjJmY2FiYWRjZWU5Mw==',
		'tdcf_bathrooms' => 'MQ==',
		'_tdcf_bathrooms' => 'ZmllbGRfNjJmY2FiYjdjZWU5NA==',
		'tdcf_parking_spots' => 'Mw==',
		'_tdcf_parking_spots' => 'ZmllbGRfNjJmY2FiZWJjZWU5Ng==',
		'tdcf_balcony' => 'WWVz',
		'_tdcf_balcony' => 'ZmllbGRfNjJmY2FiY2JjZWU5NQ==',
		'tdcf_owner_phone_number' => 'MjAyLTU1NS0wMTU4',
		'_tdcf_owner_phone_number' => 'ZmllbGRfNjJmY2QxOGZmNTQ0Zg==',
		'tdcf_owner_email' => 'b3duZXJAZW1haWwuY29t',
		'_tdcf_owner_email' => 'ZmllbGRfNjMyNDVjZGIzNDY4Mg==',
		'tdcf_image_1' => 'MTcx',
		'_tdcf_image_1' => 'ZmllbGRfNjJmY2YzNThkOGQwNw==',
		'tdcf_image_2' => 'MTcy',
		'_tdcf_image_2' => 'ZmllbGRfNjJmY2YzNjNkOGQwOA==',
		'tdcf_image_3' => 'MTcz',
		'_tdcf_image_3' => 'ZmllbGRfNjJmY2YzNmZkOGQwOQ==',
		'tdcf_image_4' => 'MTc0',
		'_tdcf_image_4' => 'ZmllbGRfNjJmY2YzODRkOGQwYQ==',
		'tdb-location-complete' => 'RnJhbmtsaW4gU3RyZWV0IDE4NTYsIFNhbiBGcmFuY2lzY28sIENhbGlmb3JuaWEsIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_property_type' => array( $tax_term_apartments_id ),
		'tdtax_property_location' => array( $tax_term_california_id, $tax_term_san_francisco_id, $tax_term_united_states_id ),
		'tdtax_property_transaction' => array( $tax_term_hotel_based_id ),
	),
));

$cpt_apartment_7_id = td_demo_content::add_cpt( array(
	'title' => 'Apartment 7',
	'type' => 'tdcpt_properties',
	'file' => 'tdcpt_properties_default.txt',
	'cpt_image_td_id' => 'td_pic_6',
	'post_meta' => array( 
		'tdcf_price' => 'NDY1MA==',
		'_tdcf_price' => 'ZmllbGRfNjJmY2FiNjdjZWU5MQ==',
		'tdcf_price_per' => 'bW9udGg=',
		'_tdcf_price_per' => 'ZmllbGRfNjJmZGRmODkwNWNkOQ==',
		'tdcf_living_area_surface' => 'OTc=',
		'_tdcf_living_area_surface' => 'ZmllbGRfNjJmY2FiODZjZWU5Mg==',
		'tdcf_bedrooms' => 'Mg==',
		'_tdcf_bedrooms' => 'ZmllbGRfNjJmY2FiYWRjZWU5Mw==',
		'tdcf_bathrooms' => 'Mg==',
		'_tdcf_bathrooms' => 'ZmllbGRfNjJmY2FiYjdjZWU5NA==',
		'tdcf_parking_spots' => 'MQ==',
		'_tdcf_parking_spots' => 'ZmllbGRfNjJmY2FiZWJjZWU5Ng==',
		'tdcf_balcony' => 'WWVz',
		'_tdcf_balcony' => 'ZmllbGRfNjJmY2FiY2JjZWU5NQ==',
		'tdcf_owner_phone_number' => 'MjAyLTU1NS0wMTU4',
		'_tdcf_owner_phone_number' => 'ZmllbGRfNjJmY2QxOGZmNTQ0Zg==',
		'tdcf_owner_email' => 'b3duZXJAZW1haWwuY29t',
		'_tdcf_owner_email' => 'ZmllbGRfNjMyNDVjZGIzNDY4Mg==',
		'tdcf_image_1' => 'MTcx',
		'_tdcf_image_1' => 'ZmllbGRfNjJmY2YzNThkOGQwNw==',
		'tdcf_image_2' => 'MTcy',
		'_tdcf_image_2' => 'ZmllbGRfNjJmY2YzNjNkOGQwOA==',
		'tdcf_image_3' => 'MTcz',
		'_tdcf_image_3' => 'ZmllbGRfNjJmY2YzNmZkOGQwOQ==',
		'tdcf_image_4' => 'MTc0',
		'_tdcf_image_4' => 'ZmllbGRfNjJmY2YzODRkOGQwYQ==',
		'tdb-location-complete' => 'Tm9ydGh3ZXN0IDEwdGggQXZlbnVlIDUxMCwgUG9ydGxhbmQsIE9yZWdvbiwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_property_type' => array( $tax_term_apartments_id ),
		'tdtax_property_location' => array( $tax_term_oregon_id, $tax_term_portland_id, $tax_term_united_states_id ),
		'tdtax_property_transaction' => array( $tax_term_rentals_id ),
	),
));

$cpt_apartment_6_id = td_demo_content::add_cpt( array(
	'title' => 'Apartment 6',
	'type' => 'tdcpt_properties',
	'file' => 'tdcpt_properties_default.txt',
	'cpt_image_td_id' => 'td_pic_7',
	'post_meta' => array( 
		'tdcf_price' => 'MzM5LDAwMA==',
		'_tdcf_price' => 'ZmllbGRfNjJmY2FiNjdjZWU5MQ==',
		'tdcf_price_per' => '',
		'_tdcf_price_per' => 'ZmllbGRfNjJmZGRmODkwNWNkOQ==',
		'tdcf_living_area_surface' => 'NTY=',
		'_tdcf_living_area_surface' => 'ZmllbGRfNjJmY2FiODZjZWU5Mg==',
		'tdcf_bedrooms' => 'MQ==',
		'_tdcf_bedrooms' => 'ZmllbGRfNjJmY2FiYWRjZWU5Mw==',
		'tdcf_bathrooms' => 'MQ==',
		'_tdcf_bathrooms' => 'ZmllbGRfNjJmY2FiYjdjZWU5NA==',
		'tdcf_parking_spots' => 'MQ==',
		'_tdcf_parking_spots' => 'ZmllbGRfNjJmY2FiZWJjZWU5Ng==',
		'tdcf_balcony' => 'Tm8=',
		'_tdcf_balcony' => 'ZmllbGRfNjJmY2FiY2JjZWU5NQ==',
		'tdcf_owner_phone_number' => 'MjAyLTU1NS0wMTU4',
		'_tdcf_owner_phone_number' => 'ZmllbGRfNjJmY2QxOGZmNTQ0Zg==',
		'tdcf_owner_email' => 'b3duZXJAZW1haWwuY29t',
		'_tdcf_owner_email' => 'ZmllbGRfNjMyNDVjZGIzNDY4Mg==',
		'tdcf_image_1' => 'MTcx',
		'_tdcf_image_1' => 'ZmllbGRfNjJmY2YzNThkOGQwNw==',
		'tdcf_image_2' => 'MTcy',
		'_tdcf_image_2' => 'ZmllbGRfNjJmY2YzNjNkOGQwOA==',
		'tdcf_image_3' => 'MTcz',
		'_tdcf_image_3' => 'ZmllbGRfNjJmY2YzNmZkOGQwOQ==',
		'tdcf_image_4' => 'MTc0',
		'_tdcf_image_4' => 'ZmllbGRfNjJmY2YzODRkOGQwYQ==',
		'tdb-location-complete' => 'TWlzc2lvbiBHb3JnZSBSb2FkIDY5MDIsIFNhbiBEaWVnbywgQ2FsaWZvcm5pYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_property_type' => array( $tax_term_apartments_id ),
		'tdtax_property_location' => array( $tax_term_california_id, $tax_term_san_diego_id, $tax_term_united_states_id ),
		'tdtax_property_transaction' => array( $tax_term_for_sale_id ),
	),
));

$cpt_apartment_5_id = td_demo_content::add_cpt( array(
	'title' => 'Apartment 5',
	'type' => 'tdcpt_properties',
	'file' => 'tdcpt_properties_default.txt',
	'cpt_image_td_id' => 'td_pic_8',
	'post_meta' => array( 
		'tdcf_price' => 'NTAw',
		'_tdcf_price' => 'ZmllbGRfNjJmY2FiNjdjZWU5MQ==',
		'tdcf_price_per' => 'ZGF5',
		'_tdcf_price_per' => 'ZmllbGRfNjJmZGRmODkwNWNkOQ==',
		'tdcf_living_area_surface' => 'MTEy',
		'_tdcf_living_area_surface' => 'ZmllbGRfNjJmY2FiODZjZWU5Mg==',
		'tdcf_bedrooms' => 'Mg==',
		'_tdcf_bedrooms' => 'ZmllbGRfNjJmY2FiYWRjZWU5Mw==',
		'tdcf_bathrooms' => 'Mg==',
		'_tdcf_bathrooms' => 'ZmllbGRfNjJmY2FiYjdjZWU5NA==',
		'tdcf_parking_spots' => 'Mg==',
		'_tdcf_parking_spots' => 'ZmllbGRfNjJmY2FiZWJjZWU5Ng==',
		'tdcf_balcony' => 'WWVz',
		'_tdcf_balcony' => 'ZmllbGRfNjJmY2FiY2JjZWU5NQ==',
		'tdcf_owner_phone_number' => 'MjAyLTU1NS0wMTU4',
		'_tdcf_owner_phone_number' => 'ZmllbGRfNjJmY2QxOGZmNTQ0Zg==',
		'tdcf_owner_email' => 'b3duZXJAZW1haWwuY29t',
		'_tdcf_owner_email' => 'ZmllbGRfNjMyNDVjZGIzNDY4Mg==',
		'tdcf_image_1' => 'MTcx',
		'_tdcf_image_1' => 'ZmllbGRfNjJmY2YzNThkOGQwNw==',
		'tdcf_image_2' => 'MTcy',
		'_tdcf_image_2' => 'ZmllbGRfNjJmY2YzNjNkOGQwOA==',
		'tdcf_image_3' => 'MTcz',
		'_tdcf_image_3' => 'ZmllbGRfNjJmY2YzNmZkOGQwOQ==',
		'tdcf_image_4' => 'MTc0',
		'_tdcf_image_4' => 'ZmllbGRfNjJmY2YzODRkOGQwYQ==',
		'tdb-location-complete' => 'TGF1cmVsIENhbnlvbiBCb3VsZXZhcmQgNTcwMywgTG9zIEFuZ2VsZXMsIENhbGlmb3JuaWEsIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_property_type' => array( $tax_term_apartments_id ),
		'tdtax_property_location' => array( $tax_term_california_id, $tax_term_los_angeles_id, $tax_term_united_states_id ),
		'tdtax_property_transaction' => array( $tax_term_hotel_based_id ),
	),
));

$cpt_apartment_4_id = td_demo_content::add_cpt( array(
	'title' => 'Apartment 4',
	'type' => 'tdcpt_properties',
	'file' => 'tdcpt_properties_default.txt',
	'cpt_image_td_id' => 'td_pic_9',
	'post_meta' => array( 
		'tdcf_price' => 'Njg1MA==',
		'_tdcf_price' => 'ZmllbGRfNjJmY2FiNjdjZWU5MQ==',
		'tdcf_price_per' => 'bW9udGg=',
		'_tdcf_price_per' => 'ZmllbGRfNjJmZGRmODkwNWNkOQ==',
		'tdcf_living_area_surface' => 'OTg=',
		'_tdcf_living_area_surface' => 'ZmllbGRfNjJmY2FiODZjZWU5Mg==',
		'tdcf_bedrooms' => 'Mg==',
		'_tdcf_bedrooms' => 'ZmllbGRfNjJmY2FiYWRjZWU5Mw==',
		'tdcf_bathrooms' => 'Mg==',
		'_tdcf_bathrooms' => 'ZmllbGRfNjJmY2FiYjdjZWU5NA==',
		'tdcf_parking_spots' => 'MA==',
		'_tdcf_parking_spots' => 'ZmllbGRfNjJmY2FiZWJjZWU5Ng==',
		'tdcf_balcony' => 'Tm8=',
		'_tdcf_balcony' => 'ZmllbGRfNjJmY2FiY2JjZWU5NQ==',
		'tdcf_owner_phone_number' => 'MjAyLTU1NS0wMTU4',
		'_tdcf_owner_phone_number' => 'ZmllbGRfNjJmY2QxOGZmNTQ0Zg==',
		'tdcf_owner_email' => 'b3duZXJAZW1haWwuY29t',
		'_tdcf_owner_email' => 'ZmllbGRfNjMyNDVjZGIzNDY4Mg==',
		'tdcf_image_1' => 'MTcx',
		'_tdcf_image_1' => 'ZmllbGRfNjJmY2YzNThkOGQwNw==',
		'tdcf_image_2' => 'MTcy',
		'_tdcf_image_2' => 'ZmllbGRfNjJmY2YzNjNkOGQwOA==',
		'tdcf_image_3' => 'MTcz',
		'_tdcf_image_3' => 'ZmllbGRfNjJmY2YzNmZkOGQwOQ==',
		'tdcf_image_4' => 'MTc0',
		'_tdcf_image_4' => 'ZmllbGRfNjJmY2YzODRkOGQwYQ==',
		'tdb-location-complete' => 'VmluZSBTdHJlZXQgMTIxLCBTZWF0dGxlLCBXYXNoaW5ndG9uLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_property_type' => array( $tax_term_apartments_id ),
		'tdtax_property_location' => array( $tax_term_seattle_id, $tax_term_united_states_id, $tax_term_washington_id ),
		'tdtax_property_transaction' => array( $tax_term_rentals_id ),
	),
));

$cpt_apartment_3_id = td_demo_content::add_cpt( array(
	'title' => 'Apartment 3',
	'type' => 'tdcpt_properties',
	'file' => 'tdcpt_properties_default.txt',
	'cpt_image_td_id' => 'td_pic_10',
	'post_meta' => array( 
		'tdcf_price' => 'NDUw',
		'_tdcf_price' => 'ZmllbGRfNjJmY2FiNjdjZWU5MQ==',
		'tdcf_price_per' => 'ZGF5',
		'_tdcf_price_per' => 'ZmllbGRfNjJmZGRmODkwNWNkOQ==',
		'tdcf_living_area_surface' => 'NTI=',
		'_tdcf_living_area_surface' => 'ZmllbGRfNjJmY2FiODZjZWU5Mg==',
		'tdcf_bedrooms' => 'MQ==',
		'_tdcf_bedrooms' => 'ZmllbGRfNjJmY2FiYWRjZWU5Mw==',
		'tdcf_bathrooms' => 'MQ==',
		'_tdcf_bathrooms' => 'ZmllbGRfNjJmY2FiYjdjZWU5NA==',
		'tdcf_parking_spots' => 'MQ==',
		'_tdcf_parking_spots' => 'ZmllbGRfNjJmY2FiZWJjZWU5Ng==',
		'tdcf_balcony' => 'WWVz',
		'_tdcf_balcony' => 'ZmllbGRfNjJmY2FiY2JjZWU5NQ==',
		'tdcf_owner_phone_number' => 'MjAyLTU1NS0wMTU4',
		'_tdcf_owner_phone_number' => 'ZmllbGRfNjJmY2QxOGZmNTQ0Zg==',
		'tdcf_owner_email' => 'b3duZXJAZW1haWwuY29t',
		'_tdcf_owner_email' => 'ZmllbGRfNjMyNDVjZGIzNDY4Mg==',
		'tdcf_image_1' => 'MTcx',
		'_tdcf_image_1' => 'ZmllbGRfNjJmY2YzNThkOGQwNw==',
		'tdcf_image_2' => 'MTcy',
		'_tdcf_image_2' => 'ZmllbGRfNjJmY2YzNjNkOGQwOA==',
		'tdcf_image_3' => 'MTcz',
		'_tdcf_image_3' => 'ZmllbGRfNjJmY2YzNmZkOGQwOQ==',
		'tdcf_image_4' => 'MTc0',
		'_tdcf_image_4' => 'ZmllbGRfNjJmY2YzODRkOGQwYQ==',
		'tdb-location-complete' => 'NXRoIEF2ZW51ZSBTb3V0aCAxMDgsIFNlYXR0bGUsIFdhc2hpbmd0b24sIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_property_type' => array( $tax_term_apartments_id ),
		'tdtax_property_location' => array( $tax_term_seattle_id, $tax_term_united_states_id, $tax_term_washington_id ),
		'tdtax_property_transaction' => array( $tax_term_hotel_based_id ),
	),
));

$cpt_house_12_id = td_demo_content::add_cpt( array(
	'title' => 'House 12',
	'type' => 'tdcpt_properties',
	'file' => 'tdcpt_properties_default.txt',
	'cpt_image_td_id' => 'td_pic_1',
	'post_meta' => array( 
		'tdcf_price' => 'NzI1LDAwMA==',
		'_tdcf_price' => 'ZmllbGRfNjJmY2FiNjdjZWU5MQ==',
		'tdcf_price_per' => '',
		'_tdcf_price_per' => 'ZmllbGRfNjJmZGRmODkwNWNkOQ==',
		'tdcf_living_area_surface' => 'MjIz',
		'_tdcf_living_area_surface' => 'ZmllbGRfNjJmY2FiODZjZWU5Mg==',
		'tdcf_bedrooms' => 'NA==',
		'_tdcf_bedrooms' => 'ZmllbGRfNjJmY2FiYWRjZWU5Mw==',
		'tdcf_bathrooms' => 'Mw==',
		'_tdcf_bathrooms' => 'ZmllbGRfNjJmY2FiYjdjZWU5NA==',
		'tdcf_parking_spots' => 'Mg==',
		'_tdcf_parking_spots' => 'ZmllbGRfNjJmY2FiZWJjZWU5Ng==',
		'tdcf_balcony' => 'WWVz',
		'_tdcf_balcony' => 'ZmllbGRfNjJmY2FiY2JjZWU5NQ==',
		'tdcf_owner_phone_number' => 'MjAyLTU1NS0wMTU4',
		'_tdcf_owner_phone_number' => 'ZmllbGRfNjJmY2QxOGZmNTQ0Zg==',
		'tdcf_owner_email' => 'b3duZXJAZW1haWwuY29t',
		'_tdcf_owner_email' => 'ZmllbGRfNjMyNDVjZGIzNDY4Mg==',
		'tdcf_image_1' => 'MTcx',
		'_tdcf_image_1' => 'ZmllbGRfNjJmY2YzNThkOGQwNw==',
		'tdcf_image_2' => 'MTcy',
		'_tdcf_image_2' => 'ZmllbGRfNjJmY2YzNjNkOGQwOA==',
		'tdcf_image_3' => 'MTcz',
		'_tdcf_image_3' => 'ZmllbGRfNjJmY2YzNmZkOGQwOQ==',
		'tdcf_image_4' => 'MTc0',
		'_tdcf_image_4' => 'ZmllbGRfNjJmY2YzODRkOGQwYQ==',
		'tdb-location-complete' => 'U291dGhlYXN0IFBvcnRsYW5kIFZpZXcgUGxhY2UgMTM0NjYsIEhhcHB5IFZhbGxleSwgT3JlZ29uLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_property_type' => array( $tax_term_houses_id ),
		'tdtax_property_location' => array( $tax_term_happy_valley_id, $tax_term_oregon_id, $tax_term_united_states_id ),
		'tdtax_property_transaction' => array( $tax_term_for_sale_id ),
	),
));

$cpt_house_11_id = td_demo_content::add_cpt( array(
	'title' => 'House 11',
	'type' => 'tdcpt_properties',
	'file' => 'tdcpt_properties_default.txt',
	'cpt_image_td_id' => 'td_pic_2',
	'post_meta' => array( 
		'tdcf_price' => 'Mjk5',
		'_tdcf_price' => 'ZmllbGRfNjJmY2FiNjdjZWU5MQ==',
		'tdcf_price_per' => 'ZGF5',
		'_tdcf_price_per' => 'ZmllbGRfNjJmZGRmODkwNWNkOQ==',
		'tdcf_living_area_surface' => 'NzA=',
		'_tdcf_living_area_surface' => 'ZmllbGRfNjJmY2FiODZjZWU5Mg==',
		'tdcf_bedrooms' => 'MQ==',
		'_tdcf_bedrooms' => 'ZmllbGRfNjJmY2FiYWRjZWU5Mw==',
		'tdcf_bathrooms' => 'MQ==',
		'_tdcf_bathrooms' => 'ZmllbGRfNjJmY2FiYjdjZWU5NA==',
		'tdcf_parking_spots' => 'MQ==',
		'_tdcf_parking_spots' => 'ZmllbGRfNjJmY2FiZWJjZWU5Ng==',
		'tdcf_balcony' => 'WWVz',
		'_tdcf_balcony' => 'ZmllbGRfNjJmY2FiY2JjZWU5NQ==',
		'tdcf_owner_phone_number' => 'MjAyLTU1NS0wMTU4',
		'_tdcf_owner_phone_number' => 'ZmllbGRfNjJmY2QxOGZmNTQ0Zg==',
		'tdcf_owner_email' => 'b3duZXJAZW1haWwuY29t',
		'_tdcf_owner_email' => 'ZmllbGRfNjMyNDVjZGIzNDY4Mg==',
		'tdcf_image_1' => 'MTcx',
		'_tdcf_image_1' => 'ZmllbGRfNjJmY2YzNThkOGQwNw==',
		'tdcf_image_2' => 'MTcy',
		'_tdcf_image_2' => 'ZmllbGRfNjJmY2YzNjNkOGQwOA==',
		'tdcf_image_3' => 'MTcz',
		'_tdcf_image_3' => 'ZmllbGRfNjJmY2YzNmZkOGQwOQ==',
		'tdcf_image_4' => 'MTc0',
		'_tdcf_image_4' => 'ZmllbGRfNjJmY2YzODRkOGQwYQ==',
		'tdb-location-complete' => 'Tm9ydGggQ2xpbnRvbiBTdHJlZXQgMjI2LCBDaGljYWdvLCBJbGxpbm9pcywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_property_type' => array( $tax_term_houses_id ),
		'tdtax_property_location' => array( $tax_term_chicago_id, $tax_term_illinois_id, $tax_term_united_states_id ),
		'tdtax_property_transaction' => array( $tax_term_hotel_based_id ),
	),
));

$cpt_house_10_id = td_demo_content::add_cpt( array(
	'title' => 'House 10',
	'type' => 'tdcpt_properties',
	'file' => 'tdcpt_properties_default.txt',
	'cpt_image_td_id' => 'td_pic_3',
	'post_meta' => array( 
		'tdcf_price' => 'NTYwMA==',
		'_tdcf_price' => 'ZmllbGRfNjJmY2FiNjdjZWU5MQ==',
		'tdcf_price_per' => 'bW9udGg=',
		'_tdcf_price_per' => 'ZmllbGRfNjJmZGRmODkwNWNkOQ==',
		'tdcf_living_area_surface' => 'ODg=',
		'_tdcf_living_area_surface' => 'ZmllbGRfNjJmY2FiODZjZWU5Mg==',
		'tdcf_bedrooms' => 'MQ==',
		'_tdcf_bedrooms' => 'ZmllbGRfNjJmY2FiYWRjZWU5Mw==',
		'tdcf_bathrooms' => 'MQ==',
		'_tdcf_bathrooms' => 'ZmllbGRfNjJmY2FiYjdjZWU5NA==',
		'tdcf_parking_spots' => 'Mw==',
		'_tdcf_parking_spots' => 'ZmllbGRfNjJmY2FiZWJjZWU5Ng==',
		'tdcf_balcony' => 'WWVz',
		'_tdcf_balcony' => 'ZmllbGRfNjJmY2FiY2JjZWU5NQ==',
		'tdcf_owner_phone_number' => 'MjAyLTU1NS0wMTU4',
		'_tdcf_owner_phone_number' => 'ZmllbGRfNjJmY2QxOGZmNTQ0Zg==',
		'tdcf_owner_email' => 'b3duZXJAZW1haWwuY29t',
		'_tdcf_owner_email' => 'ZmllbGRfNjMyNDVjZGIzNDY4Mg==',
		'tdcf_image_1' => 'MTcx',
		'_tdcf_image_1' => 'ZmllbGRfNjJmY2YzNThkOGQwNw==',
		'tdcf_image_2' => 'MTcy',
		'_tdcf_image_2' => 'ZmllbGRfNjJmY2YzNjNkOGQwOA==',
		'tdcf_image_3' => 'MTcz',
		'_tdcf_image_3' => 'ZmllbGRfNjJmY2YzNmZkOGQwOQ==',
		'tdcf_image_4' => 'MTc0',
		'_tdcf_image_4' => 'ZmllbGRfNjJmY2YzODRkOGQwYQ==',
		'tdb-location-complete' => 'TmF2YXJvIFdheSA0MjUsIFNhbiBKb3NlLCBDYWxpZm9ybmlhLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_property_type' => array( $tax_term_houses_id ),
		'tdtax_property_location' => array( $tax_term_california_id, $tax_term_san_jose_id, $tax_term_united_states_id ),
		'tdtax_property_transaction' => array( $tax_term_rentals_id ),
	),
));

$cpt_house_9_id = td_demo_content::add_cpt( array(
	'title' => 'House 9',
	'type' => 'tdcpt_properties',
	'file' => 'tdcpt_properties_default.txt',
	'cpt_image_td_id' => 'td_pic_4',
	'post_meta' => array( 
		'tdcf_price' => 'MjM1Ng==',
		'_tdcf_price' => 'ZmllbGRfNjJmY2FiNjdjZWU5MQ==',
		'tdcf_price_per' => 'bW9udGg=',
		'_tdcf_price_per' => 'ZmllbGRfNjJmZGRmODkwNWNkOQ==',
		'tdcf_living_area_surface' => 'NTU=',
		'_tdcf_living_area_surface' => 'ZmllbGRfNjJmY2FiODZjZWU5Mg==',
		'tdcf_bedrooms' => 'MQ==',
		'_tdcf_bedrooms' => 'ZmllbGRfNjJmY2FiYWRjZWU5Mw==',
		'tdcf_bathrooms' => 'MQ==',
		'_tdcf_bathrooms' => 'ZmllbGRfNjJmY2FiYjdjZWU5NA==',
		'tdcf_parking_spots' => 'Mg==',
		'_tdcf_parking_spots' => 'ZmllbGRfNjJmY2FiZWJjZWU5Ng==',
		'tdcf_balcony' => 'WWVz',
		'_tdcf_balcony' => 'ZmllbGRfNjJmY2FiY2JjZWU5NQ==',
		'tdcf_owner_phone_number' => 'MjAyLTU1NS0wMTU4',
		'_tdcf_owner_phone_number' => 'ZmllbGRfNjJmY2QxOGZmNTQ0Zg==',
		'tdcf_owner_email' => 'b3duZXJAZW1haWwuY29t',
		'_tdcf_owner_email' => 'ZmllbGRfNjMyNDVjZGIzNDY4Mg==',
		'tdcf_image_1' => 'MTcx',
		'_tdcf_image_1' => 'ZmllbGRfNjJmY2YzNThkOGQwNw==',
		'tdcf_image_2' => 'MTcy',
		'_tdcf_image_2' => 'ZmllbGRfNjJmY2YzNjNkOGQwOA==',
		'tdcf_image_3' => 'MTcz',
		'_tdcf_image_3' => 'ZmllbGRfNjJmY2YzNmZkOGQwOQ==',
		'tdcf_image_4' => 'MTc0',
		'_tdcf_image_4' => 'ZmllbGRfNjJmY2YzODRkOGQwYQ==',
		'tdb-location-complete' => 'MTZ0aCBTdHJlZXQgTm9ydGh3ZXN0IDIwMjQsIFdhc2hpbmd0b24sIEQuQy4sIERpc3RyaWN0IG9mIENvbHVtYmlhLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_property_type' => array( $tax_term_houses_id ),
		'tdtax_property_location' => array( $tax_term_district_of_columbia_id, $tax_term_united_states_id, $tax_term_washington_d_c_id ),
		'tdtax_property_transaction' => array( $tax_term_rentals_id ),
	),
));

$cpt_house_8_id = td_demo_content::add_cpt( array(
	'title' => 'House 8',
	'type' => 'tdcpt_properties',
	'file' => 'tdcpt_properties_default.txt',
	'cpt_image_td_id' => 'td_pic_5',
	'post_meta' => array( 
		'tdcf_price' => 'NTQ1LDAwMA==',
		'_tdcf_price' => 'ZmllbGRfNjJmY2FiNjdjZWU5MQ==',
		'tdcf_price_per' => '',
		'_tdcf_price_per' => 'ZmllbGRfNjJmZGRmODkwNWNkOQ==',
		'tdcf_living_area_surface' => 'MTE0',
		'_tdcf_living_area_surface' => 'ZmllbGRfNjJmY2FiODZjZWU5Mg==',
		'tdcf_bedrooms' => 'Mg==',
		'_tdcf_bedrooms' => 'ZmllbGRfNjJmY2FiYWRjZWU5Mw==',
		'tdcf_bathrooms' => 'Mg==',
		'_tdcf_bathrooms' => 'ZmllbGRfNjJmY2FiYjdjZWU5NA==',
		'tdcf_parking_spots' => 'MQ==',
		'_tdcf_parking_spots' => 'ZmllbGRfNjJmY2FiZWJjZWU5Ng==',
		'tdcf_balcony' => 'WWVz',
		'_tdcf_balcony' => 'ZmllbGRfNjJmY2FiY2JjZWU5NQ==',
		'tdcf_owner_phone_number' => 'MjAyLTU1NS0wMTU4',
		'_tdcf_owner_phone_number' => 'ZmllbGRfNjJmY2QxOGZmNTQ0Zg==',
		'tdcf_owner_email' => 'b3duZXJAZW1haWwuY29t',
		'_tdcf_owner_email' => 'ZmllbGRfNjMyNDVjZGIzNDY4Mg==',
		'tdcf_image_1' => 'MTcx',
		'_tdcf_image_1' => 'ZmllbGRfNjJmY2YzNThkOGQwNw==',
		'tdcf_image_2' => 'MTcy',
		'_tdcf_image_2' => 'ZmllbGRfNjJmY2YzNjNkOGQwOA==',
		'tdcf_image_3' => 'MTcz',
		'_tdcf_image_3' => 'ZmllbGRfNjJmY2YzNmZkOGQwOQ==',
		'tdcf_image_4' => 'MTc0',
		'_tdcf_image_4' => 'ZmllbGRfNjJmY2YzODRkOGQwYQ==',
		'tdb-location-complete' => 'Tm9ydGhlYXN0IEdvaW5nIFN0cmVldCA2MDE1LCBQb3J0bGFuZCwgT3JlZ29uLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_property_type' => array( $tax_term_houses_id ),
		'tdtax_property_location' => array( $tax_term_oregon_id, $tax_term_portland_id, $tax_term_united_states_id ),
		'tdtax_property_transaction' => array( $tax_term_for_sale_id ),
	),
));

$cpt_house_7_id = td_demo_content::add_cpt( array(
	'title' => 'House 7',
	'type' => 'tdcpt_properties',
	'file' => 'tdcpt_properties_default.txt',
	'cpt_image_td_id' => 'td_pic_6',
	'post_meta' => array( 
		'tdcf_price' => 'NTg5',
		'_tdcf_price' => 'ZmllbGRfNjJmY2FiNjdjZWU5MQ==',
		'tdcf_price_per' => 'ZGF5',
		'_tdcf_price_per' => 'ZmllbGRfNjJmZGRmODkwNWNkOQ==',
		'tdcf_living_area_surface' => 'MTA4',
		'_tdcf_living_area_surface' => 'ZmllbGRfNjJmY2FiODZjZWU5Mg==',
		'tdcf_bedrooms' => 'Mg==',
		'_tdcf_bedrooms' => 'ZmllbGRfNjJmY2FiYWRjZWU5Mw==',
		'tdcf_bathrooms' => 'Mw==',
		'_tdcf_bathrooms' => 'ZmllbGRfNjJmY2FiYjdjZWU5NA==',
		'tdcf_parking_spots' => 'Mg==',
		'_tdcf_parking_spots' => 'ZmllbGRfNjJmY2FiZWJjZWU5Ng==',
		'tdcf_balcony' => 'WWVz',
		'_tdcf_balcony' => 'ZmllbGRfNjJmY2FiY2JjZWU5NQ==',
		'tdcf_owner_phone_number' => 'MjAyLTU1NS0wMTU4',
		'_tdcf_owner_phone_number' => 'ZmllbGRfNjJmY2QxOGZmNTQ0Zg==',
		'tdcf_owner_email' => 'b3duZXJAZW1haWwuY29t',
		'_tdcf_owner_email' => 'ZmllbGRfNjMyNDVjZGIzNDY4Mg==',
		'tdcf_image_1' => 'MTcx',
		'_tdcf_image_1' => 'ZmllbGRfNjJmY2YzNThkOGQwNw==',
		'tdcf_image_2' => 'MTcy',
		'_tdcf_image_2' => 'ZmllbGRfNjJmY2YzNjNkOGQwOA==',
		'tdcf_image_3' => 'MTcz',
		'_tdcf_image_3' => 'ZmllbGRfNjJmY2YzNmZkOGQwOQ==',
		'tdcf_image_4' => 'MTc0',
		'_tdcf_image_4' => 'ZmllbGRfNjJmY2YzODRkOGQwYQ==',
		'tdb-location-complete' => 'U29obyBWaWV3IFRlcnJhY2UgLCBTYW4gRGllZ28sIENhbGlmb3JuaWEsIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_property_type' => array( $tax_term_houses_id ),
		'tdtax_property_location' => array( $tax_term_california_id, $tax_term_san_diego_id, $tax_term_united_states_id ),
		'tdtax_property_transaction' => array( $tax_term_hotel_based_id ),
	),
));

$cpt_house_6_id = td_demo_content::add_cpt( array(
	'title' => 'House 6',
	'type' => 'tdcpt_properties',
	'file' => 'tdcpt_properties_default.txt',
	'cpt_image_td_id' => 'td_pic_7',
	'post_meta' => array( 
		'tdcf_price' => 'ODc5',
		'_tdcf_price' => 'ZmllbGRfNjJmY2FiNjdjZWU5MQ==',
		'tdcf_price_per' => 'ZGF5',
		'_tdcf_price_per' => 'ZmllbGRfNjJmZGRmODkwNWNkOQ==',
		'tdcf_living_area_surface' => 'MTkz',
		'_tdcf_living_area_surface' => 'ZmllbGRfNjJmY2FiODZjZWU5Mg==',
		'tdcf_bedrooms' => 'Mw==',
		'_tdcf_bedrooms' => 'ZmllbGRfNjJmY2FiYWRjZWU5Mw==',
		'tdcf_bathrooms' => 'Mw==',
		'_tdcf_bathrooms' => 'ZmllbGRfNjJmY2FiYjdjZWU5NA==',
		'tdcf_parking_spots' => 'NA==',
		'_tdcf_parking_spots' => 'ZmllbGRfNjJmY2FiZWJjZWU5Ng==',
		'tdcf_balcony' => 'WWVz',
		'_tdcf_balcony' => 'ZmllbGRfNjJmY2FiY2JjZWU5NQ==',
		'tdcf_owner_phone_number' => 'MjAyLTU1NS0wMTU4',
		'_tdcf_owner_phone_number' => 'ZmllbGRfNjJmY2QxOGZmNTQ0Zg==',
		'tdcf_owner_email' => 'b3duZXJAZW1haWwuY29t',
		'_tdcf_owner_email' => 'ZmllbGRfNjMyNDVjZGIzNDY4Mg==',
		'tdcf_image_1' => 'MTcx',
		'_tdcf_image_1' => 'ZmllbGRfNjJmY2YzNThkOGQwNw==',
		'tdcf_image_2' => 'MTcy',
		'_tdcf_image_2' => 'ZmllbGRfNjJmY2YzNjNkOGQwOA==',
		'tdcf_image_3' => 'MTcz',
		'_tdcf_image_3' => 'ZmllbGRfNjJmY2YzNmZkOGQwOQ==',
		'tdcf_image_4' => 'MTc0',
		'_tdcf_image_4' => 'ZmllbGRfNjJmY2YzODRkOGQwYQ==',
		'tdb-location-complete' => 'V2VzdCBNb25yb2UgUGxhY2UgMTQxMjYsIExvcyBBbmdlbGVzLCBDYWxpZm9ybmlhLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_property_type' => array( $tax_term_houses_id ),
		'tdtax_property_location' => array( $tax_term_california_id, $tax_term_los_angeles_id, $tax_term_united_states_id ),
		'tdtax_property_transaction' => array( $tax_term_hotel_based_id ),
	),
));

$cpt_house_5_id = td_demo_content::add_cpt( array(
	'title' => 'House 5',
	'type' => 'tdcpt_properties',
	'file' => 'tdcpt_properties_default.txt',
	'cpt_image_td_id' => 'td_pic_8',
	'post_meta' => array( 
		'tdcf_price' => 'MzAwMA==',
		'_tdcf_price' => 'ZmllbGRfNjJmY2FiNjdjZWU5MQ==',
		'tdcf_price_per' => 'bW9udGg=',
		'_tdcf_price_per' => 'ZmllbGRfNjJmZGRmODkwNWNkOQ==',
		'tdcf_living_area_surface' => 'MTIw',
		'_tdcf_living_area_surface' => 'ZmllbGRfNjJmY2FiODZjZWU5Mg==',
		'tdcf_bedrooms' => 'Mg==',
		'_tdcf_bedrooms' => 'ZmllbGRfNjJmY2FiYWRjZWU5Mw==',
		'tdcf_bathrooms' => 'Mg==',
		'_tdcf_bathrooms' => 'ZmllbGRfNjJmY2FiYjdjZWU5NA==',
		'tdcf_parking_spots' => 'MQ==',
		'_tdcf_parking_spots' => 'ZmllbGRfNjJmY2FiZWJjZWU5Ng==',
		'tdcf_balcony' => 'Tm8=',
		'_tdcf_balcony' => 'ZmllbGRfNjJmY2FiY2JjZWU5NQ==',
		'tdcf_owner_phone_number' => 'MjAyLTU1NS0wMTU4',
		'_tdcf_owner_phone_number' => 'ZmllbGRfNjJmY2QxOGZmNTQ0Zg==',
		'tdcf_owner_email' => 'b3duZXJAZW1haWwuY29t',
		'_tdcf_owner_email' => 'ZmllbGRfNjMyNDVjZGIzNDY4Mg==',
		'tdcf_image_1' => 'MTcx',
		'_tdcf_image_1' => 'ZmllbGRfNjJmY2YzNThkOGQwNw==',
		'tdcf_image_2' => 'MTcy',
		'_tdcf_image_2' => 'ZmllbGRfNjJmY2YzNjNkOGQwOA==',
		'tdcf_image_3' => 'MTcz',
		'_tdcf_image_3' => 'ZmllbGRfNjJmY2YzNmZkOGQwOQ==',
		'tdcf_image_4' => 'MTc0',
		'_tdcf_image_4' => 'ZmllbGRfNjJmY2YzODRkOGQwYQ==',
		'tdb-location-complete' => 'RWFzdCAxM3RoIFN0cmVldCAxMjUsIENoaWNhZ28sIElsbGlub2lzLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_property_type' => array( $tax_term_houses_id ),
		'tdtax_property_location' => array( $tax_term_chicago_id, $tax_term_illinois_id, $tax_term_united_states_id ),
		'tdtax_property_transaction' => array( $tax_term_rentals_id ),
	),
));

$cpt_house_4_id = td_demo_content::add_cpt( array(
	'title' => 'House 4',
	'type' => 'tdcpt_properties',
	'file' => 'tdcpt_properties_default.txt',
	'cpt_image_td_id' => 'td_pic_9',
	'post_meta' => array( 
		'tdb-location-complete' => 'U291dGggS2lscGF0cmljayBBdmVudWUgNjM1OSwgQ2hpY2FnbywgSWxsaW5vaXMsIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_property_type' => array( $tax_term_houses_id ),
		'tdtax_property_location' => array( $tax_term_chicago_id, $tax_term_illinois_id, $tax_term_united_states_id ),
		'tdtax_property_transaction' => array( $tax_term_for_sale_id ),
	),
));

$cpt_house_3_id = td_demo_content::add_cpt( array(
	'title' => 'House 3',
	'type' => 'tdcpt_properties',
	'file' => 'tdcpt_properties_default.txt',
	'cpt_image_td_id' => 'td_pic_10',
	'post_meta' => array( 
		'tdcf_price' => 'MzAw',
		'_tdcf_price' => 'ZmllbGRfNjJmY2FiNjdjZWU5MQ==',
		'tdcf_price_per' => 'ZGF5',
		'_tdcf_price_per' => 'ZmllbGRfNjJmZGRmODkwNWNkOQ==',
		'tdcf_living_area_surface' => 'OTg=',
		'_tdcf_living_area_surface' => 'ZmllbGRfNjJmY2FiODZjZWU5Mg==',
		'tdcf_bedrooms' => 'Mg==',
		'_tdcf_bedrooms' => 'ZmllbGRfNjJmY2FiYWRjZWU5Mw==',
		'tdcf_bathrooms' => 'MQ==',
		'_tdcf_bathrooms' => 'ZmllbGRfNjJmY2FiYjdjZWU5NA==',
		'tdcf_parking_spots' => 'MQ==',
		'_tdcf_parking_spots' => 'ZmllbGRfNjJmY2FiZWJjZWU5Ng==',
		'tdcf_balcony' => 'Tm8=',
		'_tdcf_balcony' => 'ZmllbGRfNjJmY2FiY2JjZWU5NQ==',
		'tdcf_owner_phone_number' => 'MjAyLTU1NS0wMTU4',
		'_tdcf_owner_phone_number' => 'ZmllbGRfNjJmY2QxOGZmNTQ0Zg==',
		'tdcf_owner_email' => 'b3duZXJAZW1haWwuY29t',
		'_tdcf_owner_email' => 'ZmllbGRfNjMyNDVjZGIzNDY4Mg==',
		'tdcf_image_1' => 'MTcx',
		'_tdcf_image_1' => 'ZmllbGRfNjJmY2YzNThkOGQwNw==',
		'tdcf_image_2' => 'MTcy',
		'_tdcf_image_2' => 'ZmllbGRfNjJmY2YzNjNkOGQwOA==',
		'tdcf_image_3' => 'MTcz',
		'_tdcf_image_3' => 'ZmllbGRfNjJmY2YzNmZkOGQwOQ==',
		'tdcf_image_4' => 'MTc0',
		'_tdcf_image_4' => 'ZmllbGRfNjJmY2YzODRkOGQwYQ==',
		'tdb-location-complete' => 'R2FyZmllbGQgU3RyZWV0IDIyMSwgU2FuIEZyYW5jaXNjbywgQ2FsaWZvcm5pYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_property_type' => array( $tax_term_houses_id ),
		'tdtax_property_location' => array( $tax_term_california_id, $tax_term_san_francisco_id, $tax_term_united_states_id ),
		'tdtax_property_transaction' => array( $tax_term_hotel_based_id ),
	),
));

$cpt_house_2_id = td_demo_content::add_cpt( array(
	'title' => 'House 2',
	'type' => 'tdcpt_properties',
	'file' => 'tdcpt_properties_default.txt',
	'cpt_image_td_id' => 'td_pic_1',
	'post_meta' => array( 
		'tdcf_price' => 'MjYwMA==',
		'_tdcf_price' => 'ZmllbGRfNjJmY2FiNjdjZWU5MQ==',
		'tdcf_price_per' => 'bW9udGg=',
		'_tdcf_price_per' => 'ZmllbGRfNjJmZGRmODkwNWNkOQ==',
		'tdcf_living_area_surface' => 'MTYy',
		'_tdcf_living_area_surface' => 'ZmllbGRfNjJmY2FiODZjZWU5Mg==',
		'tdcf_bedrooms' => 'Mw==',
		'_tdcf_bedrooms' => 'ZmllbGRfNjJmY2FiYWRjZWU5Mw==',
		'tdcf_bathrooms' => 'Mg==',
		'_tdcf_bathrooms' => 'ZmllbGRfNjJmY2FiYjdjZWU5NA==',
		'tdcf_parking_spots' => 'Mg==',
		'_tdcf_parking_spots' => 'ZmllbGRfNjJmY2FiZWJjZWU5Ng==',
		'tdcf_balcony' => 'WWVz',
		'_tdcf_balcony' => 'ZmllbGRfNjJmY2FiY2JjZWU5NQ==',
		'tdcf_owner_phone_number' => 'MjAyLTU1NS0wMTU4',
		'_tdcf_owner_phone_number' => 'ZmllbGRfNjJmY2QxOGZmNTQ0Zg==',
		'tdcf_owner_email' => 'b3duZXJAZW1haWwuY29t',
		'_tdcf_owner_email' => 'ZmllbGRfNjMyNDVjZGIzNDY4Mg==',
		'tdcf_image_1' => 'MTcx',
		'_tdcf_image_1' => 'ZmllbGRfNjJmY2YzNThkOGQwNw==',
		'tdcf_image_2' => 'MTcy',
		'_tdcf_image_2' => 'ZmllbGRfNjJmY2YzNjNkOGQwOA==',
		'tdcf_image_3' => 'MTcz',
		'_tdcf_image_3' => 'ZmllbGRfNjJmY2YzNmZkOGQwOQ==',
		'tdcf_image_4' => 'MTc0',
		'_tdcf_image_4' => 'ZmllbGRfNjJmY2YzODRkOGQwYQ==',
		'tdb-location-complete' => 'U291dGhlYXN0IDcwdGggQXZlbnVlIDUzMzUsIFBvcnRsYW5kLCBPcmVnb24sIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_property_type' => array( $tax_term_houses_id ),
		'tdtax_property_location' => array( $tax_term_oregon_id, $tax_term_portland_id, $tax_term_united_states_id ),
		'tdtax_property_transaction' => array( $tax_term_rentals_id ),
	),
));

$cpt_apartment_2_id = td_demo_content::add_cpt( array(
	'title' => 'Apartment 2',
	'type' => 'tdcpt_properties',
	'file' => 'tdcpt_properties_default.txt',
	'cpt_image_td_id' => 'td_pic_2',
	'post_meta' => array( 
		'tdcf_price' => 'NTAwMA==',
		'_tdcf_price' => 'ZmllbGRfNjJmY2FiNjdjZWU5MQ==',
		'tdcf_price_per' => 'bW9udGg=',
		'_tdcf_price_per' => 'ZmllbGRfNjJmZGRmODkwNWNkOQ==',
		'tdcf_living_area_surface' => 'MTAw',
		'_tdcf_living_area_surface' => 'ZmllbGRfNjJmY2FiODZjZWU5Mg==',
		'tdcf_bedrooms' => 'Mg==',
		'_tdcf_bedrooms' => 'ZmllbGRfNjJmY2FiYWRjZWU5Mw==',
		'tdcf_bathrooms' => 'Mg==',
		'_tdcf_bathrooms' => 'ZmllbGRfNjJmY2FiYjdjZWU5NA==',
		'tdcf_parking_spots' => 'MQ==',
		'_tdcf_parking_spots' => 'ZmllbGRfNjJmY2FiZWJjZWU5Ng==',
		'tdcf_balcony' => 'WWVz',
		'_tdcf_balcony' => 'ZmllbGRfNjJmY2FiY2JjZWU5NQ==',
		'tdcf_owner_phone_number' => 'MjAyLTU1NS0wMTU4',
		'_tdcf_owner_phone_number' => 'ZmllbGRfNjJmY2QxOGZmNTQ0Zg==',
		'tdcf_owner_email' => 'b3duZXJAZW1haWwuY29t',
		'_tdcf_owner_email' => 'ZmllbGRfNjMyNDVjZGIzNDY4Mg==',
		'tdcf_image_1' => 'MTcx',
		'_tdcf_image_1' => 'ZmllbGRfNjJmY2YzNThkOGQwNw==',
		'tdcf_image_2' => 'MTcy',
		'_tdcf_image_2' => 'ZmllbGRfNjJmY2YzNjNkOGQwOA==',
		'tdcf_image_3' => 'MTcz',
		'_tdcf_image_3' => 'ZmllbGRfNjJmY2YzNmZkOGQwOQ==',
		'tdcf_image_4' => 'MTc0',
		'_tdcf_image_4' => 'ZmllbGRfNjJmY2YzODRkOGQwYQ==',
		'tdb-location-complete' => 'TmludGggQXZlbnVlIDE0NDEsIFNhbiBEaWVnbywgQ2FsaWZvcm5pYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_property_type' => array( $tax_term_apartments_id ),
		'tdtax_property_location' => array( $tax_term_california_id, $tax_term_san_diego_id, $tax_term_united_states_id ),
		'tdtax_property_transaction' => array( $tax_term_rentals_id ),
	),
));

$cpt_apartment_1_id = td_demo_content::add_cpt( array(
	'title' => 'Apartment 1',
	'type' => 'tdcpt_properties',
	'file' => 'tdcpt_properties_default.txt',
	'cpt_image_td_id' => 'td_pic_3',
	'post_meta' => array( 
		'tdcf_price' => 'Mjg1LDAwMA==',
		'_tdcf_price' => 'ZmllbGRfNjJmY2FiNjdjZWU5MQ==',
		'tdcf_price_per' => '',
		'_tdcf_price_per' => 'ZmllbGRfNjJmZGRmODkwNWNkOQ==',
		'tdcf_living_area_surface' => 'NTM=',
		'_tdcf_living_area_surface' => 'ZmllbGRfNjJmY2FiODZjZWU5Mg==',
		'tdcf_bedrooms' => 'MQ==',
		'_tdcf_bedrooms' => 'ZmllbGRfNjJmY2FiYWRjZWU5Mw==',
		'tdcf_bathrooms' => 'MQ==',
		'_tdcf_bathrooms' => 'ZmllbGRfNjJmY2FiYjdjZWU5NA==',
		'tdcf_parking_spots' => 'MQ==',
		'_tdcf_parking_spots' => 'ZmllbGRfNjJmY2FiZWJjZWU5Ng==',
		'tdcf_balcony' => 'Tm8=',
		'_tdcf_balcony' => 'ZmllbGRfNjJmY2FiY2JjZWU5NQ==',
		'tdcf_owner_phone_number' => 'MjAyLTU1NS0wMTU4',
		'_tdcf_owner_phone_number' => 'ZmllbGRfNjJmY2QxOGZmNTQ0Zg==',
		'tdcf_owner_email' => 'b3duZXJAZW1haWwuY29t',
		'_tdcf_owner_email' => 'ZmllbGRfNjMyNDVjZGIzNDY4Mg==',
		'tdcf_image_1' => 'MTcx',
		'_tdcf_image_1' => 'ZmllbGRfNjJmY2YzNThkOGQwNw==',
		'tdcf_image_2' => 'MTcy',
		'_tdcf_image_2' => 'ZmllbGRfNjJmY2YzNjNkOGQwOA==',
		'tdcf_image_3' => 'MTcz',
		'_tdcf_image_3' => 'ZmllbGRfNjJmY2YzNmZkOGQwOQ==',
		'tdcf_image_4' => 'MTc0',
		'_tdcf_image_4' => 'ZmllbGRfNjJmY2YzODRkOGQwYQ==',
		'tdb-location-complete' => 'VGF5bG9yIEF2ZW51ZSBOb3J0aCAxODAwLCBTZWF0dGxlLCBXYXNoaW5ndG9uLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_property_type' => array( $tax_term_apartments_id ),
		'tdtax_property_location' => array( $tax_term_seattle_id, $tax_term_united_states_id, $tax_term_washington_id ),
		'tdtax_property_transaction' => array( $tax_term_for_sale_id ),
	),
));

$cpt_house_1_id = td_demo_content::add_cpt( array(
	'title' => 'House 1',
	'type' => 'tdcpt_properties',
	'file' => 'tdcpt_properties_default.txt',
	'cpt_image_td_id' => 'td_pic_4',
	'post_meta' => array( 
		'tdcf_price' => 'Mzg1LDAwMA==',
		'_tdcf_price' => 'ZmllbGRfNjJmY2FiNjdjZWU5MQ==',
		'tdcf_price_per' => '',
		'_tdcf_price_per' => 'ZmllbGRfNjJmZGRmODkwNWNkOQ==',
		'tdcf_living_area_surface' => 'MTIw',
		'_tdcf_living_area_surface' => 'ZmllbGRfNjJmY2FiODZjZWU5Mg==',
		'tdcf_bedrooms' => 'Mg==',
		'_tdcf_bedrooms' => 'ZmllbGRfNjJmY2FiYWRjZWU5Mw==',
		'tdcf_bathrooms' => 'MQ==',
		'_tdcf_bathrooms' => 'ZmllbGRfNjJmY2FiYjdjZWU5NA==',
		'tdcf_parking_spots' => 'Mw==',
		'_tdcf_parking_spots' => 'ZmllbGRfNjJmY2FiZWJjZWU5Ng==',
		'tdcf_balcony' => 'WWVz',
		'_tdcf_balcony' => 'ZmllbGRfNjJmY2FiY2JjZWU5NQ==',
		'tdcf_owner_phone_number' => 'MjAyLTU1NS0wMTU4',
		'_tdcf_owner_phone_number' => 'ZmllbGRfNjJmY2QxOGZmNTQ0Zg==',
		'tdcf_owner_email' => 'b3duZXJAZW1haWwuY29t',
		'_tdcf_owner_email' => 'ZmllbGRfNjMyNDVjZGIzNDY4Mg==',
		'tdcf_image_1' => 'MTcx',
		'_tdcf_image_1' => 'ZmllbGRfNjJmY2YzNThkOGQwNw==',
		'tdcf_image_2' => 'MTcy',
		'_tdcf_image_2' => 'ZmllbGRfNjJmY2YzNjNkOGQwOA==',
		'tdcf_image_3' => 'MTcz',
		'_tdcf_image_3' => 'ZmllbGRfNjJmY2YzNmZkOGQwOQ==',
		'tdcf_image_4' => 'MTc0',
		'_tdcf_image_4' => 'ZmllbGRfNjJmY2YzODRkOGQwYQ==',
		'tdb-location-complete' => 'Tm9ydGggR2xlbndvb2QgQXZlbnVlIDU0MDQsIENoaWNhZ28sIElsbGlub2lzLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_property_type' => array( $tax_term_houses_id ),
		'tdtax_property_location' => array( $tax_term_chicago_id, $tax_term_illinois_id, $tax_term_united_states_id ),
		'tdtax_property_transaction' => array( $tax_term_for_sale_id ),
	),
));


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
