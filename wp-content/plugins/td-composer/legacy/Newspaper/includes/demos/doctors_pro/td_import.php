<?php 


/*  ---------------------------------------------------------------------------- 
	MENUS
*/
$menu_td_demo_custom_menu_id = td_demo_menus::create_menu('td-demo-custom-menu', ''); 

$menu_td_demo_footer_menu_id = td_demo_menus::create_menu('td-demo-footer-menu', ''); 

$menu_td_demo_header_menu_id = td_demo_menus::create_menu('td-demo-header-menu', '');



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
	CATEGORIES
*/

$cat_news_id = td_demo_category::add_category(array(
	'category_name' => 'News',
	'parent_id' => 0,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));


/*  ---------------------------------------------------------------------------- 
	ATTACHMENTS
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
	POSTS
*/
$post_td_post_all_that_you_need_to_know_about_the_available_medical_plans_id = td_demo_content::add_post( array(
	'title' => 'All that You Need to Know About the Available Medical Plans',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_your_questions_about_when_to_see_a_doctor_are_all_answered_here_id = td_demo_content::add_post( array(
	'title' => 'Your Questions About When to See a Doctor Are All Answered Here',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_clinical_research_fails_to_provide_a_complete_disease_pattern_id = td_demo_content::add_post( array(
	'title' => 'Clinical Research Fails to Provide a Complete Disease Pattern',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_survey_reveals_significant_need_for_increased_consumer_education_id = td_demo_content::add_post( array(
	'title' => 'Survey Reveals Significant Need for Increased Consumer Education',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_there_isnt_enough_support_for_the_severily_affected_hospitals_id = td_demo_content::add_post( array(
	'title' => 'There Isn\'t Enough Support for the Severily Affected Hospitals',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_anxiety_research_your_nose_itches_allergies_flu_or_covid19_id = td_demo_content::add_post( array(
	'title' => 'Anxiety Research: Your Nose Itches: Allergies, Flu or COVID19?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_what_people_know_about_the_purpose_of_using_general_hygene_id = td_demo_content::add_post( array(
	'title' => 'What People Know About the Purpose of Using General Hygene',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_lab_animal_species_that_help_discover_new_cure_for_viruses_id = td_demo_content::add_post( array(
	'title' => 'Lab Animal Species that Help Discover New Cure for Viruses',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_how_to_think_and_act_in_the_current_plummeting_stock_market_id = td_demo_content::add_post( array(
	'title' => 'How to Think and Act in the Current Plummeting Stock Market',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_the_real_economy_has_never_been_tested_by_a_big_pandemic_id = td_demo_content::add_post( array(
	'title' => 'The Real Economy Has Never Been Tested by a Big Pandemic',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_companies_are_putting_profits_ahead_of_public_health_id = td_demo_content::add_post( array(
	'title' => 'Companies Are Putting Profits Ahead of Public Health',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_chinese_hospitals_still_short_on_supplies_from_shutdown_id = td_demo_content::add_post( array(
	'title' => 'Chinese Hospitals Still Short on Supplies from Shutdown',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_locker' => '5',
	'categories_id_array' => array($cat_news_id,),
));


/*  ---------------------------------------------------------------------------- 
	PRODUCTS
*/

/*  ---------------------------------------------------------------------------- 
	TAXONOMIES
*/
$tax_term_communication_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Communication',
	'taxonomy' => 'tdc-review-criteria',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
	'filter_image' => '',
	'tax_term_meta' => array( 
		'tdb_filter_color' => '',
	),
));

$tax_term_price_level_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Price level',
	'taxonomy' => 'tdc-review-criteria',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
	'filter_image' => '',
	'tax_term_meta' => array( 
		'tdb_filter_color' => '',
	),
));

$tax_term_professionalism_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Professionalism',
	'taxonomy' => 'tdc-review-criteria',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
	'filter_image' => '',
	'tax_term_meta' => array( 
		'tdb_filter_color' => '',
	),
));

$tax_term_responsiveness_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Responsiveness',
	'taxonomy' => 'tdc-review-criteria',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
	'filter_image' => '',
	'tax_term_meta' => array( 
		'tdb_filter_color' => '',
	),
));

$tax_term_cardiologist_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Cardiologist',
	'taxonomy' => 'tdtax_specialty',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
	'filter_image' => '',
	'tax_term_meta' => array( 
		'tdb_filter_color' => '',
	),
));

$tax_term_dermatologist_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Dermatologist',
	'taxonomy' => 'tdtax_specialty',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
	'filter_image' => '',
	'tax_term_meta' => array( 
		'tdb_filter_color' => '',
	),
));

$tax_term_dietetitian_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Dietetitian',
	'taxonomy' => 'tdtax_specialty',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
	'filter_image' => '',
	'tax_term_meta' => array( 
		'tdb_filter_color' => '',
	),
));

$tax_term_endocrinologist_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Endocrinologist',
	'taxonomy' => 'tdtax_specialty',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
	'filter_image' => '',
	'tax_term_meta' => array( 
		'tdb_filter_color' => '',
	),
));

$tax_term_gastroenterologist_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Gastroenterologist',
	'taxonomy' => 'tdtax_specialty',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
	'filter_image' => '',
	'tax_term_meta' => array( 
		'tdb_filter_color' => '',
	),
));

$tax_term_immunologist_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Immunologist',
	'taxonomy' => 'tdtax_specialty',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
	'filter_image' => '',
	'tax_term_meta' => array( 
		'tdb_filter_color' => '',
	),
));

$tax_term_optometrist_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Optometrist',
	'taxonomy' => 'tdtax_specialty',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
	'filter_image' => '',
	'tax_term_meta' => array( 
		'tdb_filter_color' => '',
	),
));

$tax_term_pediatrician_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Pediatrician',
	'taxonomy' => 'tdtax_specialty',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
	'filter_image' => '',
	'tax_term_meta' => array( 
		'tdb_filter_color' => '',
	),
));

$tax_term_psychiatrist_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Psychiatrist',
	'taxonomy' => 'tdtax_specialty',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
	'filter_image' => '',
	'tax_term_meta' => array( 
		'tdb_filter_color' => '',
	),
));

$tax_term_urologist_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Urologist',
	'taxonomy' => 'tdtax_specialty',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
	'filter_image' => '',
	'tax_term_meta' => array( 
		'tdb_filter_color' => '',
	),
));

$tax_term_female_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Female',
	'taxonomy' => 'tdtax_gender',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
	'filter_image' => '',
	'tax_term_meta' => array( 
		'tdb_filter_color' => '',
	),
));

$tax_term_male_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Male',
	'taxonomy' => 'tdtax_gender',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
	'filter_image' => '',
	'tax_term_meta' => array( 
		'tdb_filter_color' => '',
	),
));

$tax_term_california_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'California',
	'taxonomy' => 'tdtax_location',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_chicago_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Chicago',
	'taxonomy' => 'tdtax_location',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_florida_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Florida',
	'taxonomy' => 'tdtax_location',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_houston_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Houston',
	'taxonomy' => 'tdtax_location',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_illinois_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Illinois',
	'taxonomy' => 'tdtax_location',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_los_angeles_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Los Angeles',
	'taxonomy' => 'tdtax_location',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_miami_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Miami',
	'taxonomy' => 'tdtax_location',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_new_york_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'New York',
	'taxonomy' => 'tdtax_location',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_new_york_new_york_united_states_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'New York',
	'taxonomy' => 'tdtax_location',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_seattle_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Seattle',
	'taxonomy' => 'tdtax_location',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_texas_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Texas',
	'taxonomy' => 'tdtax_location',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_united_states_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'United States',
	'taxonomy' => 'tdtax_location',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_washington_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Washington',
	'taxonomy' => 'tdtax_location',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));


/*  ---------------------------------------------------------------------------- 
	CPTs
*/
$cpt_terry_ravinder_id = td_demo_content::add_cpt( array(
	'title' => 'Terry Ravinder',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_3',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTE3Ng==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'R1A=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTEw',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YTozOntpOjA7czoyMjoiRW1lcmdlbmN5IGNvbnN1bHRhdGlvbiI7aToxO3M6MjE6Ikhvc3BpdGFsIGNvbnN1bHRhdGlvbiI7aToyO3M6MTY6IlByaXZhdGUgcHJhY3RpY2UiO30=',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'U291dGggQXZlbnVlIDIyICwgTG9zIEFuZ2VsZXMsIENhbGlmb3JuaWEsIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_cardiologist_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_new_york_new_york_united_states_id, $tax_term_new_york_id, $tax_term_united_states_id ),
	),
));

$cpt_daniel_barnaby_id = td_demo_content::add_cpt( array(
	'title' => 'Daniel Barnaby',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_4',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTE3OQ==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'Q1JG',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTA1',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToyOntpOjA7czoyMToiSG9zcGl0YWwgY29uc3VsdGF0aW9uIjtpOjE7czoxNjoiUHJpdmF0ZSBwcmFjdGljZSI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'U291dGggQXZlbnVlIDIyICwgTG9zIEFuZ2VsZXMsIENhbGlmb3JuaWEsIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_dermatologist_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_new_york_new_york_united_states_id, $tax_term_new_york_id, $tax_term_united_states_id ),
	),
));

$cpt_kelvin_surendra_id = td_demo_content::add_cpt( array(
	'title' => 'Kelvin Surendra',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_5',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTE4Nw==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'R1A=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'OTA=',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToxOntpOjA7czoxNjoiUHJpdmF0ZSBwcmFjdGljZSI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'U291dGggQXZlbnVlIDIyICwgTG9zIEFuZ2VsZXMsIENhbGlmb3JuaWEsIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_dietetitian_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_new_york_new_york_united_states_id, $tax_term_new_york_id, $tax_term_united_states_id ),
	),
));

$cpt_griffin_dwayne_id = td_demo_content::add_cpt( array(
	'title' => 'Griffin Dwayne',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_6',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTE4Ng==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'Q0w=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTAw',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YTozOntpOjA7czoyMjoiRW1lcmdlbmN5IGNvbnN1bHRhdGlvbiI7aToxO3M6MjE6Ikhvc3BpdGFsIGNvbnN1bHRhdGlvbiI7aToyO3M6MTY6IlByaXZhdGUgcHJhY3RpY2UiO30=',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'U291dGggQXZlbnVlIDIyICwgTG9zIEFuZ2VsZXMsIENhbGlmb3JuaWEsIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_endocrinologist_id ),
		'tdtax_gender' => array( $tax_term_female_id ),
		'tdtax_location' => array( $tax_term_new_york_new_york_united_states_id, $tax_term_new_york_id, $tax_term_united_states_id ),
	),
));

$cpt_rhoda_martina_id = td_demo_content::add_cpt( array(
	'title' => 'Rhoda Martina',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_7',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTE4NQ==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'R1A=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTIw',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YTozOntpOjA7czoyMjoiRW1lcmdlbmN5IGNvbnN1bHRhdGlvbiI7aToxO3M6MjE6Ikhvc3BpdGFsIGNvbnN1bHRhdGlvbiI7aToyO3M6MTY6IlByaXZhdGUgcHJhY3RpY2UiO30=',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'U291dGggQXZlbnVlIDIyICwgTG9zIEFuZ2VsZXMsIENhbGlmb3JuaWEsIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_gastroenterologist_id ),
		'tdtax_gender' => array( $tax_term_female_id ),
		'tdtax_location' => array( $tax_term_new_york_new_york_united_states_id, $tax_term_new_york_id, $tax_term_united_states_id ),
	),
));

$cpt_isadore_lyndon_id = td_demo_content::add_cpt( array(
	'title' => 'Isadore Lyndon',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_8',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTE4NA==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'R1A=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'OTU=',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToyOntpOjA7czoyMjoiRW1lcmdlbmN5IGNvbnN1bHRhdGlvbiI7aToxO3M6MjE6Ikhvc3BpdGFsIGNvbnN1bHRhdGlvbiI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'U291dGggQXZlbnVlIDIyICwgTG9zIEFuZ2VsZXMsIENhbGlmb3JuaWEsIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_immunologist_id ),
		'tdtax_gender' => array( $tax_term_female_id ),
		'tdtax_location' => array( $tax_term_new_york_new_york_united_states_id, $tax_term_new_york_id, $tax_term_united_states_id ),
	),
));

$cpt_merlin_basant_id = td_demo_content::add_cpt( array(
	'title' => 'Merlin Basant',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_9',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTE4Mw==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'Q1JG',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTEw',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToyOntpOjA7czoyMToiSG9zcGl0YWwgY29uc3VsdGF0aW9uIjtpOjE7czoxNjoiUHJpdmF0ZSBwcmFjdGljZSI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'U291dGggQXZlbnVlIDIyICwgTG9zIEFuZ2VsZXMsIENhbGlmb3JuaWEsIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_optometrist_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_new_york_new_york_united_states_id, $tax_term_new_york_id, $tax_term_united_states_id ),
	),
));

$cpt_clifford_hall_id = td_demo_content::add_cpt( array(
	'title' => 'Clifford Hall',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_10',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTE4Mg==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'Q0w=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTEw',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YTozOntpOjA7czoyMjoiRW1lcmdlbmN5IGNvbnN1bHRhdGlvbiI7aToxO3M6MjE6Ikhvc3BpdGFsIGNvbnN1bHRhdGlvbiI7aToyO3M6MTY6IlByaXZhdGUgcHJhY3RpY2UiO30=',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'U291dGggQXZlbnVlIDIyICwgTG9zIEFuZ2VsZXMsIENhbGlmb3JuaWEsIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_pediatrician_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_new_york_new_york_united_states_id, $tax_term_new_york_id, $tax_term_united_states_id ),
	),
));

$cpt_duncan_murray_id = td_demo_content::add_cpt( array(
	'title' => 'Duncan Murray',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_1',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTE4MQ==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'R1A=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTAw',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToyOntpOjA7czoyMToiSG9zcGl0YWwgY29uc3VsdGF0aW9uIjtpOjE7czoxNjoiUHJpdmF0ZSBwcmFjdGljZSI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'U291dGggQXZlbnVlIDIyICwgTG9zIEFuZ2VsZXMsIENhbGlmb3JuaWEsIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_psychiatrist_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_new_york_new_york_united_states_id, $tax_term_new_york_id, $tax_term_united_states_id ),
	),
));

$cpt_wilson_hugh_id = td_demo_content::add_cpt( array(
	'title' => 'Wilson Hugh',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_2',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTE4MA==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'Q0w=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTIw',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToyOntpOjA7czoyMToiSG9zcGl0YWwgY29uc3VsdGF0aW9uIjtpOjE7czoxNjoiUHJpdmF0ZSBwcmFjdGljZSI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'U291dGggQXZlbnVlIDIyICwgTG9zIEFuZ2VsZXMsIENhbGlmb3JuaWEsIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_urologist_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_new_york_new_york_united_states_id, $tax_term_new_york_id, $tax_term_united_states_id ),
	),
));

$cpt_deep_brook_id = td_demo_content::add_cpt( array(
	'title' => 'Deep Brook',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_3',
	'post_meta' => array( 
		'tdcf_cover_image' => '',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'R1A=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'OTU=',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YTozOntpOjA7czoyMjoiRW1lcmdlbmN5IGNvbnN1bHRhdGlvbiI7aToxO3M6MjE6Ikhvc3BpdGFsIGNvbnN1bHRhdGlvbiI7aToyO3M6MTY6IlByaXZhdGUgcHJhY3RpY2UiO30=',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'U291dGggQXZlbnVlIDIyICwgTG9zIEFuZ2VsZXMsIENhbGlmb3JuaWEsIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_cardiologist_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_chicago_id, $tax_term_illinois_id, $tax_term_united_states_id ),
	),
));

$cpt_calla_ami_id = td_demo_content::add_cpt( array(
	'title' => 'Calla Ami',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_4',
	'post_meta' => array( 
		'tdcf_cover_image' => '',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'Q1JG',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'OTU=',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToxOntpOjA7czoxNjoiUHJpdmF0ZSBwcmFjdGljZSI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'V2VzdCA1NXRoIFN0cmVldCAxMDAsIE5ldyBZb3JrLCBOZXcgWW9yaywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_dermatologist_id ),
		'tdtax_gender' => array( $tax_term_female_id ),
		'tdtax_location' => array( $tax_term_chicago_id, $tax_term_illinois_id, $tax_term_united_states_id ),
	),
));

$cpt_melvin_lyle_id = td_demo_content::add_cpt( array(
	'title' => 'Melvin Lyle',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_5',
	'post_meta' => array( 
		'tdcf_cover_image' => '',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'R1A=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTEw',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YTozOntpOjA7czoyMjoiRW1lcmdlbmN5IGNvbnN1bHRhdGlvbiI7aToxO3M6MjE6Ikhvc3BpdGFsIGNvbnN1bHRhdGlvbiI7aToyO3M6MTY6IlByaXZhdGUgcHJhY3RpY2UiO30=',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'V2VzdCA1NXRoIFN0cmVldCAxMDAsIE5ldyBZb3JrLCBOZXcgWW9yaywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_dietetitian_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_chicago_id, $tax_term_illinois_id, $tax_term_united_states_id ),
	),
));

$cpt_mathew_brenden_id = td_demo_content::add_cpt( array(
	'title' => 'Mathew Brenden',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_6',
	'post_meta' => array( 
		'tdcf_cover_image' => '',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'Q0w=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTEw',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToyOntpOjA7czoyMjoiRW1lcmdlbmN5IGNvbnN1bHRhdGlvbiI7aToxO3M6MTY6IlByaXZhdGUgcHJhY3RpY2UiO30=',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'V2VzdCA1NXRoIFN0cmVldCAxMDAsIE5ldyBZb3JrLCBOZXcgWW9yaywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_endocrinologist_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_chicago_id, $tax_term_illinois_id, $tax_term_united_states_id ),
	),
));

$cpt_gale_rashmi_id = td_demo_content::add_cpt( array(
	'title' => 'Gale Rashmi',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_7',
	'post_meta' => array( 
		'tdcf_cover_image' => '',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'R1A=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTIw',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToxOntpOjA7czoxNjoiUHJpdmF0ZSBwcmFjdGljZSI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'V2VzdCA1NXRoIFN0cmVldCAxMDAsIE5ldyBZb3JrLCBOZXcgWW9yaywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_gastroenterologist_id ),
		'tdtax_gender' => array( $tax_term_female_id ),
		'tdtax_location' => array( $tax_term_chicago_id, $tax_term_illinois_id, $tax_term_united_states_id ),
	),
));

$cpt_katelyn_griffin_id = td_demo_content::add_cpt( array(
	'title' => 'Katelyn Griffin',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_8',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTE4OA==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'R1A=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTA1',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToyOntpOjA7czoyMjoiRW1lcmdlbmN5IGNvbnN1bHRhdGlvbiI7aToxO3M6MjE6Ikhvc3BpdGFsIGNvbnN1bHRhdGlvbiI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'V2VzdCA1NXRoIFN0cmVldCAxMDAsIE5ldyBZb3JrLCBOZXcgWW9yaywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_immunologist_id ),
		'tdtax_gender' => array( $tax_term_female_id ),
		'tdtax_location' => array( $tax_term_chicago_id, $tax_term_illinois_id, $tax_term_united_states_id ),
	),
));

$cpt_irving_campbell_id = td_demo_content::add_cpt( array(
	'title' => 'Irving Campbell',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_9',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTE4OQ==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'R1A=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'OTU=',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToyOntpOjA7czoyMToiSG9zcGl0YWwgY29uc3VsdGF0aW9uIjtpOjE7czoxNjoiUHJpdmF0ZSBwcmFjdGljZSI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'V2VzdCA1NXRoIFN0cmVldCAxMDAsIE5ldyBZb3JrLCBOZXcgWW9yaywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_optometrist_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_chicago_id, $tax_term_illinois_id, $tax_term_united_states_id ),
	),
));

$cpt_ganesh_brett_id = td_demo_content::add_cpt( array(
	'title' => 'Ganesh Brett',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_10',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTE5MA==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'Q0w=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTA1',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToyOntpOjA7czoyMToiSG9zcGl0YWwgY29uc3VsdGF0aW9uIjtpOjE7czoxNjoiUHJpdmF0ZSBwcmFjdGljZSI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'V2VzdCA1NXRoIFN0cmVldCAxMDAsIE5ldyBZb3JrLCBOZXcgWW9yaywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_pediatrician_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_chicago_id, $tax_term_illinois_id, $tax_term_united_states_id ),
	),
));

$cpt_simon_woo_id = td_demo_content::add_cpt( array(
	'title' => 'Simon Woo',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_1',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTE5Mg==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'R1A=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTIw',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YTozOntpOjA7czoyMjoiRW1lcmdlbmN5IGNvbnN1bHRhdGlvbiI7aToxO3M6MjE6Ikhvc3BpdGFsIGNvbnN1bHRhdGlvbiI7aToyO3M6MTY6IlByaXZhdGUgcHJhY3RpY2UiO30=',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'V2VzdCA1NXRoIFN0cmVldCAxMDAsIE5ldyBZb3JrLCBOZXcgWW9yaywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_psychiatrist_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_chicago_id, $tax_term_illinois_id, $tax_term_united_states_id ),
	),
));

$cpt_jacob_dixon_id = td_demo_content::add_cpt( array(
	'title' => 'Jacob Dixon',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_2',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTE5Mw==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'R1A=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTA1',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YTozOntpOjA7czoyMjoiRW1lcmdlbmN5IGNvbnN1bHRhdGlvbiI7aToxO3M6MjE6Ikhvc3BpdGFsIGNvbnN1bHRhdGlvbiI7aToyO3M6MTY6IlByaXZhdGUgcHJhY3RpY2UiO30=',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'V2VzdCA1NXRoIFN0cmVldCAxMDAsIE5ldyBZb3JrLCBOZXcgWW9yaywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_urologist_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_chicago_id, $tax_term_illinois_id, $tax_term_united_states_id ),
	),
));

$cpt_akbar_wilfred_id = td_demo_content::add_cpt( array(
	'title' => 'Akbar Wilfred',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_3',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTE5NA==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'R1A=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'OTA=',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToyOntpOjA7czoyMToiSG9zcGl0YWwgY29uc3VsdGF0aW9uIjtpOjE7czoxNjoiUHJpdmF0ZSBwcmFjdGljZSI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'Tm9ydGh3ZXN0IDM4dGggU3RyZWV0IDg1LCBNaWFtaSwgRmxvcmlkYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_cardiologist_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_houston_id, $tax_term_texas_id, $tax_term_united_states_id ),
	),
));

$cpt_addison_ariel_id = td_demo_content::add_cpt( array(
	'title' => 'Addison Ariel',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_4',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTE5NQ==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'Q1JG',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTA1',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToxOntpOjA7czoxNjoiUHJpdmF0ZSBwcmFjdGljZSI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'Tm9ydGh3ZXN0IDM4dGggU3RyZWV0IDg1LCBNaWFtaSwgRmxvcmlkYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_dermatologist_id ),
		'tdtax_gender' => array( $tax_term_female_id ),
		'tdtax_location' => array( $tax_term_houston_id, $tax_term_texas_id, $tax_term_united_states_id ),
	),
));

$cpt_alger_kimball_id = td_demo_content::add_cpt( array(
	'title' => 'Alger Kimball',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_5',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTE5Ng==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'Q1JG',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTEw',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YTozOntpOjA7czoyMjoiRW1lcmdlbmN5IGNvbnN1bHRhdGlvbiI7aToxO3M6MjE6Ikhvc3BpdGFsIGNvbnN1bHRhdGlvbiI7aToyO3M6MTY6IlByaXZhdGUgcHJhY3RpY2UiO30=',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'Tm9ydGh3ZXN0IDM4dGggU3RyZWV0IDg1LCBNaWFtaSwgRmxvcmlkYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_dietetitian_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_houston_id, $tax_term_texas_id, $tax_term_united_states_id ),
	),
));

$cpt_nithin_patrick_id = td_demo_content::add_cpt( array(
	'title' => 'Nithin Patrick',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_6',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTE5Nw==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'R1A=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTAw',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToyOntpOjA7czoyMToiSG9zcGl0YWwgY29uc3VsdGF0aW9uIjtpOjE7czoxNjoiUHJpdmF0ZSBwcmFjdGljZSI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'Tm9ydGh3ZXN0IDM4dGggU3RyZWV0IDg1LCBNaWFtaSwgRmxvcmlkYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_endocrinologist_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_houston_id, $tax_term_texas_id, $tax_term_united_states_id ),
	),
));

$cpt_girish_jagjit_id = td_demo_content::add_cpt( array(
	'title' => 'Girish Jagjit',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_7',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTE5OA==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'R1A=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTEw',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToxOntpOjA7czoxNjoiUHJpdmF0ZSBwcmFjdGljZSI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'Tm9ydGh3ZXN0IDM4dGggU3RyZWV0IDg1LCBNaWFtaSwgRmxvcmlkYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_gastroenterologist_id ),
		'tdtax_gender' => array( $tax_term_female_id ),
		'tdtax_location' => array( $tax_term_houston_id, $tax_term_texas_id, $tax_term_united_states_id ),
	),
));

$cpt_mark_raming_id = td_demo_content::add_cpt( array(
	'title' => 'Mark Raming',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_8',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTE5OQ==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'Q0w=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTAw',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => '',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YTozOntpOjA7czoyMjoiRW1lcmdlbmN5IGNvbnN1bHRhdGlvbiI7aToxO3M6MjE6Ikhvc3BpdGFsIGNvbnN1bHRhdGlvbiI7aToyO3M6MTY6IlByaXZhdGUgcHJhY3RpY2UiO30=',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'Tm9ydGh3ZXN0IDM4dGggU3RyZWV0IDg1LCBNaWFtaSwgRmxvcmlkYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_immunologist_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_houston_id, $tax_term_texas_id, $tax_term_united_states_id ),
	),
));

$cpt_sushil_gautam_id = td_demo_content::add_cpt( array(
	'title' => 'Sushil Gautam',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_9',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIwMA==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'R1A=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'OTA=',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToyOntpOjA7czoyMjoiRW1lcmdlbmN5IGNvbnN1bHRhdGlvbiI7aToxO3M6MjE6Ikhvc3BpdGFsIGNvbnN1bHRhdGlvbiI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'Tm9ydGh3ZXN0IDM4dGggU3RyZWV0IDg1LCBNaWFtaSwgRmxvcmlkYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_optometrist_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_houston_id, $tax_term_texas_id, $tax_term_united_states_id ),
	),
));

$cpt_colby_alan_id = td_demo_content::add_cpt( array(
	'title' => 'Colby Alan',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_10',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIwMg==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'R1A=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTAw',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToyOntpOjA7czoyMToiSG9zcGl0YWwgY29uc3VsdGF0aW9uIjtpOjE7czoxNjoiUHJpdmF0ZSBwcmFjdGljZSI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'Tm9ydGh3ZXN0IDM4dGggU3RyZWV0IDg1LCBNaWFtaSwgRmxvcmlkYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_pediatrician_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_houston_id, $tax_term_texas_id, $tax_term_united_states_id ),
	),
));

$cpt_thornton_royce_id = td_demo_content::add_cpt( array(
	'title' => 'Jaidev Pallav',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_1',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIwMw==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'Q1JG',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTIw',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToxOntpOjA7czoxNjoiUHJpdmF0ZSBwcmFjdGljZSI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'Tm9ydGh3ZXN0IDM4dGggU3RyZWV0IDg1LCBNaWFtaSwgRmxvcmlkYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_psychiatrist_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_houston_id, $tax_term_texas_id, $tax_term_united_states_id ),
	),
));

$cpt_paulina_portia_id = td_demo_content::add_cpt( array(
	'title' => 'Paulina Portia',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_2',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIwNA==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'R1A=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTEw',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => '',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YTozOntpOjA7czoyMjoiRW1lcmdlbmN5IGNvbnN1bHRhdGlvbiI7aToxO3M6MjE6Ikhvc3BpdGFsIGNvbnN1bHRhdGlvbiI7aToyO3M6MTY6IlByaXZhdGUgcHJhY3RpY2UiO30=',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'Tm9ydGh3ZXN0IDM4dGggU3RyZWV0IDg1LCBNaWFtaSwgRmxvcmlkYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_urologist_id ),
		'tdtax_gender' => array( $tax_term_female_id ),
		'tdtax_location' => array( $tax_term_houston_id, $tax_term_texas_id, $tax_term_united_states_id ),
	),
));

$cpt_brice_phillis_id = td_demo_content::add_cpt( array(
	'title' => 'Brice Phillis',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_3',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIxOA==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'R1A=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'OTA=',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YTozOntpOjA7czoyMjoiRW1lcmdlbmN5IGNvbnN1bHRhdGlvbiI7aToxO3M6MjE6Ikhvc3BpdGFsIGNvbnN1bHRhdGlvbiI7aToyO3M6MTY6IlByaXZhdGUgcHJhY3RpY2UiO30=',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'TWFpbiBzdHJlZXQgMTMzLCBIb3VzdG9uLCBUZXhhcywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_cardiologist_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_los_angeles_id, $tax_term_california_id, $tax_term_united_states_id ),
	),
));

$cpt_dixon_cullen_id = td_demo_content::add_cpt( array(
	'title' => 'Dixon  Cullen',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_4',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIxNw==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'Q1JG',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTAw',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToyOntpOjA7czoyMToiSG9zcGl0YWwgY29uc3VsdGF0aW9uIjtpOjE7czoxNjoiUHJpdmF0ZSBwcmFjdGljZSI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'TWFpbiBzdHJlZXQgMTMzLCBIb3VzdG9uLCBUZXhhcywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_dermatologist_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_los_angeles_id, $tax_term_california_id, $tax_term_united_states_id ),
	),
));

$cpt_kendall_adeline_id = td_demo_content::add_cpt( array(
	'title' => 'Kendall  Adeline',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_5',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIxNg==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'R1A=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTEw',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToyOntpOjA7czoyMToiSG9zcGl0YWwgY29uc3VsdGF0aW9uIjtpOjE7czoxNjoiUHJpdmF0ZSBwcmFjdGljZSI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'TWFpbiBzdHJlZXQgMTMzLCBIb3VzdG9uLCBUZXhhcywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_dietetitian_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_los_angeles_id, $tax_term_california_id, $tax_term_united_states_id ),
	),
));

$cpt_brooks_alexis_id = td_demo_content::add_cpt( array(
	'title' => 'Brooks  Alexis',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_6',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIxNQ==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'Q0w=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTIw',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => '',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YTozOntpOjA7czoyMjoiRW1lcmdlbmN5IGNvbnN1bHRhdGlvbiI7aToxO3M6MjE6Ikhvc3BpdGFsIGNvbnN1bHRhdGlvbiI7aToyO3M6MTY6IlByaXZhdGUgcHJhY3RpY2UiO30=',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'TWFpbiBzdHJlZXQgMTMzLCBIb3VzdG9uLCBUZXhhcywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_endocrinologist_id ),
		'tdtax_gender' => array( $tax_term_female_id ),
		'tdtax_location' => array( $tax_term_los_angeles_id, $tax_term_california_id, $tax_term_united_states_id ),
	),
));

$cpt_wambui_lawrence_id = td_demo_content::add_cpt( array(
	'title' => 'Wambui  Lawrence',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_7',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIxNA==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'Q0w=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'OTA=',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToyOntpOjA7czoyMjoiRW1lcmdlbmN5IGNvbnN1bHRhdGlvbiI7aToxO3M6MjE6Ikhvc3BpdGFsIGNvbnN1bHRhdGlvbiI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'TWFpbiBzdHJlZXQgMTMzLCBIb3VzdG9uLCBUZXhhcywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_gastroenterologist_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_los_angeles_id, $tax_term_california_id, $tax_term_united_states_id ),
	),
));

$cpt_sol_agnes_id = td_demo_content::add_cpt( array(
	'title' => 'Sol Agnes',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_8',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIxMw==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'Q1JG',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'OTU=',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToyOntpOjA7czoyMToiSG9zcGl0YWwgY29uc3VsdGF0aW9uIjtpOjE7czoxNjoiUHJpdmF0ZSBwcmFjdGljZSI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'TWFpbiBzdHJlZXQgMTMzLCBIb3VzdG9uLCBUZXhhcywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_immunologist_id ),
		'tdtax_gender' => array( $tax_term_female_id ),
		'tdtax_location' => array( $tax_term_los_angeles_id, $tax_term_california_id, $tax_term_united_states_id ),
	),
));

$cpt_clinton_louis_id = td_demo_content::add_cpt( array(
	'title' => 'Clinton Louis',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_9',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIxMg==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'R1A=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTA1',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToyOntpOjA7czoyMToiSG9zcGl0YWwgY29uc3VsdGF0aW9uIjtpOjE7czoxNjoiUHJpdmF0ZSBwcmFjdGljZSI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'TWFpbiBzdHJlZXQgMTMzLCBIb3VzdG9uLCBUZXhhcywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_optometrist_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_los_angeles_id, $tax_term_california_id, $tax_term_united_states_id ),
	),
));

$cpt_alonso_nicolasa_id = td_demo_content::add_cpt( array(
	'title' => 'Alonso Nicolasa',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_10',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIxMQ==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'R1A=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'OTA=',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToxOntpOjA7czoxNjoiUHJpdmF0ZSBwcmFjdGljZSI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'TWFpbiBzdHJlZXQgMTMzLCBIb3VzdG9uLCBUZXhhcywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_pediatrician_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_los_angeles_id, $tax_term_california_id, $tax_term_united_states_id ),
	),
));

$cpt_cristian_jolie_id = td_demo_content::add_cpt( array(
	'title' => 'Cristian Jolie',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_1',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIxMA==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'Q0w=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'OTA=',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YTozOntpOjA7czoyMjoiRW1lcmdlbmN5IGNvbnN1bHRhdGlvbiI7aToxO3M6MjE6Ikhvc3BpdGFsIGNvbnN1bHRhdGlvbiI7aToyO3M6MTY6IlByaXZhdGUgcHJhY3RpY2UiO30=',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'TWFpbiBzdHJlZXQgMTMzLCBIb3VzdG9uLCBUZXhhcywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_psychiatrist_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_los_angeles_id, $tax_term_california_id, $tax_term_united_states_id ),
	),
));

$cpt_michael_clark_id = td_demo_content::add_cpt( array(
	'title' => 'Michael Clark',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_2',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIwOQ==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'Q1JG',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTIw',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YTozOntpOjA7czoyMjoiRW1lcmdlbmN5IGNvbnN1bHRhdGlvbiI7aToxO3M6MjE6Ikhvc3BpdGFsIGNvbnN1bHRhdGlvbiI7aToyO3M6MTY6IlByaXZhdGUgcHJhY3RpY2UiO30=',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'TWFpbiBzdHJlZXQgMTMzLCBIb3VzdG9uLCBUZXhhcywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_urologist_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_los_angeles_id, $tax_term_california_id, $tax_term_united_states_id ),
	),
));

$cpt_braden_eulalia_id = td_demo_content::add_cpt( array(
	'title' => 'Braden Eulalia',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_3',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIwOA==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'Q0w=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTA1',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YTozOntpOjA7czoyMjoiRW1lcmdlbmN5IGNvbnN1bHRhdGlvbiI7aToxO3M6MjE6Ikhvc3BpdGFsIGNvbnN1bHRhdGlvbiI7aToyO3M6MTY6IlByaXZhdGUgcHJhY3RpY2UiO30=',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'RWFzdCBNYXJpb24gU3RyZWV0ICwgU2VhdHRsZSwgV2FzaGluZ3RvbiwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_cardiologist_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_miami_id, $tax_term_florida_id, $tax_term_united_states_id ),
	),
));

$cpt_isaac_fabiana_id = td_demo_content::add_cpt( array(
	'title' => 'Isaac Fabiana',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_4',
	'post_meta' => array( 
		'tdcf_cover_image' => '',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'R1A=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'OTU=',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToyOntpOjA7czoyMjoiRW1lcmdlbmN5IGNvbnN1bHRhdGlvbiI7aToxO3M6MTY6IlByaXZhdGUgcHJhY3RpY2UiO30=',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'RWFzdCBNYXJpb24gU3RyZWV0ICwgU2VhdHRsZSwgV2FzaGluZ3RvbiwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_dermatologist_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_miami_id, $tax_term_florida_id, $tax_term_united_states_id ),
	),
));

$cpt_amara_bolanle_id = td_demo_content::add_cpt( array(
	'title' => 'Amara Bolanle',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_5',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIwNw==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'Q1JG',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'OTU=',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToxOntpOjA7czoxNjoiUHJpdmF0ZSBwcmFjdGljZSI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'RWFzdCBNYXJpb24gU3RyZWV0ICwgU2VhdHRsZSwgV2FzaGluZ3RvbiwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_dietetitian_id ),
		'tdtax_gender' => array( $tax_term_female_id ),
		'tdtax_location' => array( $tax_term_miami_id, $tax_term_florida_id, $tax_term_united_states_id ),
	),
));

$cpt_keegan_morgan_id = td_demo_content::add_cpt( array(
	'title' => 'Kumar Dhaval',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_6',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIwNg==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'R1A=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTIw',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToyOntpOjA7czoyMjoiRW1lcmdlbmN5IGNvbnN1bHRhdGlvbiI7aToxO3M6MjE6Ikhvc3BpdGFsIGNvbnN1bHRhdGlvbiI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'RWFzdCBNYXJpb24gU3RyZWV0ICwgU2VhdHRsZSwgV2FzaGluZ3RvbiwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_endocrinologist_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_miami_id, $tax_term_florida_id, $tax_term_united_states_id ),
	),
));

$cpt_emilly_carl_id = td_demo_content::add_cpt( array(
	'title' => 'Emilly Carl',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_7',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIwNQ==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'Q0w=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTEw',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToyOntpOjA7czoyMjoiRW1lcmdlbmN5IGNvbnN1bHRhdGlvbiI7aToxO3M6MTY6IlByaXZhdGUgcHJhY3RpY2UiO30=',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'RWFzdCBNYXJpb24gU3RyZWV0ICwgU2VhdHRsZSwgV2FzaGluZ3RvbiwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_gastroenterologist_id ),
		'tdtax_gender' => array( $tax_term_female_id ),
		'tdtax_location' => array( $tax_term_miami_id, $tax_term_florida_id, $tax_term_united_states_id ),
	),
));

$cpt_arden_jefferson_id = td_demo_content::add_cpt( array(
	'title' => 'Arden Jefferson',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_8',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIxOQ==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'R1A=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTAw',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToyOntpOjA7czoyMjoiRW1lcmdlbmN5IGNvbnN1bHRhdGlvbiI7aToxO3M6MTY6IlByaXZhdGUgcHJhY3RpY2UiO30=',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'RWFzdCBNYXJpb24gU3RyZWV0ICwgU2VhdHRsZSwgV2FzaGluZ3RvbiwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_immunologist_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_miami_id, $tax_term_florida_id, $tax_term_united_states_id ),
	),
));

$cpt_kyla_lerato_id = td_demo_content::add_cpt( array(
	'title' => 'Kyla Lerato',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_9',
	'post_meta' => array( 
		'tdcf_cover_image' => '',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'Q0w=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'OTA=',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YTozOntpOjA7czoyMjoiRW1lcmdlbmN5IGNvbnN1bHRhdGlvbiI7aToxO3M6MjE6Ikhvc3BpdGFsIGNvbnN1bHRhdGlvbiI7aToyO3M6MTY6IlByaXZhdGUgcHJhY3RpY2UiO30=',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'RWFzdCBNYXJpb24gU3RyZWV0ICwgU2VhdHRsZSwgV2FzaGluZ3RvbiwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_optometrist_id ),
		'tdtax_gender' => array( $tax_term_female_id ),
		'tdtax_location' => array( $tax_term_miami_id, $tax_term_florida_id, $tax_term_united_states_id ),
	),
));

$cpt_katlego_hillary_id = td_demo_content::add_cpt( array(
	'title' => 'Katlego Hillary',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_10',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIyMA==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'R1A=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTAw',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToyOntpOjA7czoyMToiSG9zcGl0YWwgY29uc3VsdGF0aW9uIjtpOjE7czoxNjoiUHJpdmF0ZSBwcmFjdGljZSI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'RWFzdCBNYXJpb24gU3RyZWV0ICwgU2VhdHRsZSwgV2FzaGluZ3RvbiwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_pediatrician_id ),
		'tdtax_gender' => array( $tax_term_female_id ),
		'tdtax_location' => array( $tax_term_miami_id, $tax_term_florida_id, $tax_term_united_states_id ),
	),
));

$cpt_yoselin_lacy_id = td_demo_content::add_cpt( array(
	'title' => 'Yoselin Lacy',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_1',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIyMQ==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'R1A=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'OTU=',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToyOntpOjA7czoyMjoiRW1lcmdlbmN5IGNvbnN1bHRhdGlvbiI7aToxO3M6MjE6Ikhvc3BpdGFsIGNvbnN1bHRhdGlvbiI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'RWFzdCBNYXJpb24gU3RyZWV0ICwgU2VhdHRsZSwgV2FzaGluZ3RvbiwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_psychiatrist_id ),
		'tdtax_gender' => array( $tax_term_female_id ),
		'tdtax_location' => array( $tax_term_miami_id, $tax_term_florida_id, $tax_term_united_states_id ),
	),
));

$cpt_maya_rosamond_id = td_demo_content::add_cpt( array(
	'title' => 'Maya Rosamond',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_2',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIyMg==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'Q1JG',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'OTA=',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToxOntpOjA7czoxNjoiUHJpdmF0ZSBwcmFjdGljZSI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'RWFzdCBNYXJpb24gU3RyZWV0ICwgU2VhdHRsZSwgV2FzaGluZ3RvbiwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_urologist_id ),
		'tdtax_gender' => array( $tax_term_female_id ),
		'tdtax_location' => array( $tax_term_miami_id, $tax_term_florida_id, $tax_term_united_states_id ),
	),
));

$cpt_wesley_moussa_id = td_demo_content::add_cpt( array(
	'title' => 'Wesley Moussa',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_3',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIyMw==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'Q1JG',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTA1',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToyOntpOjA7czoyMjoiRW1lcmdlbmN5IGNvbnN1bHRhdGlvbiI7aToxO3M6MTY6IlByaXZhdGUgcHJhY3RpY2UiO30=',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'Um9vc2V2ZWx0IFJvYWQgMzYsIENoaWNhZ28sIElsbGlub2lzLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_cardiologist_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_seattle_id, $tax_term_washington_id, $tax_term_united_states_id ),
	),
));

$cpt_herman_rehema_id = td_demo_content::add_cpt( array(
	'title' => 'Herman Rehema',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_4',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIyNA==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'Q0w=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTA1',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToyOntpOjA7czoyMToiSG9zcGl0YWwgY29uc3VsdGF0aW9uIjtpOjE7czoxNjoiUHJpdmF0ZSBwcmFjdGljZSI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'Um9vc2V2ZWx0IFJvYWQgMzYsIENoaWNhZ28sIElsbGlub2lzLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_dermatologist_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_seattle_id, $tax_term_washington_id, $tax_term_united_states_id ),
	),
));

$cpt_kwame_tochukwu_id = td_demo_content::add_cpt( array(
	'title' => 'Kwame Tochukwu',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_5',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIyNQ==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'R1A=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTEw',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YTozOntpOjA7czoyMjoiRW1lcmdlbmN5IGNvbnN1bHRhdGlvbiI7aToxO3M6MjE6Ikhvc3BpdGFsIGNvbnN1bHRhdGlvbiI7aToyO3M6MTY6IlByaXZhdGUgcHJhY3RpY2UiO30=',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'Um9vc2V2ZWx0IFJvYWQgMzYsIENoaWNhZ28sIElsbGlub2lzLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_dietetitian_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_seattle_id, $tax_term_washington_id, $tax_term_united_states_id ),
	),
));

$cpt_felix_silvester_id = td_demo_content::add_cpt( array(
	'title' => 'Felix Silvester',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_6',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIyNg==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'Q0w=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTIw',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToyOntpOjA7czoyMjoiRW1lcmdlbmN5IGNvbnN1bHRhdGlvbiI7aToxO3M6MTY6IlByaXZhdGUgcHJhY3RpY2UiO30=',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'Um9vc2V2ZWx0IFJvYWQgMzYsIENoaWNhZ28sIElsbGlub2lzLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_endocrinologist_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_seattle_id, $tax_term_washington_id, $tax_term_united_states_id ),
	),
));

$cpt_uduak_irwin_id = td_demo_content::add_cpt( array(
	'title' => 'Uduak Irwin',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_7',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIyNw==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'R1A=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'OTA=',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToyOntpOjA7czoyMToiSG9zcGl0YWwgY29uc3VsdGF0aW9uIjtpOjE7czoxNjoiUHJpdmF0ZSBwcmFjdGljZSI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'Um9vc2V2ZWx0IFJvYWQgMzYsIENoaWNhZ28sIElsbGlub2lzLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_gastroenterologist_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_seattle_id, $tax_term_washington_id, $tax_term_united_states_id ),
	),
));

$cpt_norton_arthur_id = td_demo_content::add_cpt( array(
	'title' => 'Norton Arthur',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_8',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIyOA==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'Q1JG',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTA1',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToxOntpOjA7czoyMToiSG9zcGl0YWwgY29uc3VsdGF0aW9uIjt9',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'Um9vc2V2ZWx0IFJvYWQgMzYsIENoaWNhZ28sIElsbGlub2lzLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_immunologist_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_seattle_id, $tax_term_washington_id, $tax_term_united_states_id ),
	),
));

$cpt_reema_kelvin_id = td_demo_content::add_cpt( array(
	'title' => 'Reema Kelvin',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_9',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIyOQ==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'Q1JG',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTAw',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToyOntpOjA7czoyMToiSG9zcGl0YWwgY29uc3VsdGF0aW9uIjtpOjE7czoxNjoiUHJpdmF0ZSBwcmFjdGljZSI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'Um9vc2V2ZWx0IFJvYWQgMzYsIENoaWNhZ28sIElsbGlub2lzLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_optometrist_id ),
		'tdtax_gender' => array( $tax_term_female_id ),
		'tdtax_location' => array( $tax_term_seattle_id, $tax_term_washington_id, $tax_term_united_states_id ),
	),
));

$cpt_rajni_kashar_id = td_demo_content::add_cpt( array(
	'title' => 'Rajni Kashar',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_10',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIzMA==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'Q0w=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'OTU=',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToxOntpOjA7czoyMToiSG9zcGl0YWwgY29uc3VsdGF0aW9uIjt9',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'Um9vc2V2ZWx0IFJvYWQgMzYsIENoaWNhZ28sIElsbGlub2lzLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_pediatrician_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_seattle_id, $tax_term_washington_id, $tax_term_united_states_id ),
	),
));

$cpt_cortney_yamil_id = td_demo_content::add_cpt( array(
	'title' => 'Cortney Yamil',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_1',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIzMQ==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'R1A=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTIw',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YToxOntpOjA7czoxNjoiUHJpdmF0ZSBwcmFjdGljZSI7fQ==',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'Um9vc2V2ZWx0IFJvYWQgMzYsIENoaWNhZ28sIElsbGlub2lzLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_psychiatrist_id ),
		'tdtax_gender' => array( $tax_term_female_id ),
		'tdtax_location' => array( $tax_term_seattle_id, $tax_term_washington_id, $tax_term_united_states_id ),
	),
));

$cpt_isaac_cody_id = td_demo_content::add_cpt( array(
	'title' => 'Isaac Cody',
	'type' => 'tdcpt_doctors',
	'file' => 'tdcpt_doctors_default.txt',
	'cpt_image_td_id' => 'td_pic_2',
	'post_meta' => array( 
		'tdcf_cover_image' => 'MTIzMg==',
		'_tdcf_cover_image' => 'ZmllbGRfNjJkNTM3ZGY2MGMzZA==',
		'tdcf_doctor_title' => 'R1A=',
		'_tdcf_doctor_title' => 'ZmllbGRfNjJkMTZlNGU5MTU2NQ==',
		'tdcf_email_address' => 'Y29udGFjdEBkb2N0b3JzLmNvbQ==',
		'_tdcf_email_address' => 'ZmllbGRfNjJkMTZlYTc5MTU2OA==',
		'tdcf_phone_number' => 'NTU1MzI2NTQ4OTk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTZlY2U5MTU2OQ==',
		'tdcf_starting_price' => 'MTEw',
		'_tdcf_starting_price' => 'ZmllbGRfNjJkMTZjYWVhZDBhMA==',
		'tdcf_working_hours' => 'TW8tRnI6IDlBTSAtIDVQTSA=',
		'_tdcf_working_hours' => 'ZmllbGRfNjJkNTAyYTNhMjQxNA==',
		'tdcf_offered_services' => 'YTozOntpOjA7czoyMjoiRW1lcmdlbmN5IGNvbnN1bHRhdGlvbiI7aToxO3M6MjE6Ikhvc3BpdGFsIGNvbnN1bHRhdGlvbiI7aToyO3M6MTY6IlByaXZhdGUgcHJhY3RpY2UiO30=',
		'_tdcf_offered_services' => 'ZmllbGRfNjJkMTZjZDVhZDBhMQ==',
		'tdcf_description' => 'QWNhZGVtaWMgb3IgY2xpbmljYWwgYWNhZGVtaWMgZG9jdG9ycyBvZnRlbiB3b3JrIGluIGEgY29tYmluYXRpb24gb2YgdGVhY2hpbmcsIHJlc2VhcmNoLCBhbmQgc3BlY2lhbGlzdCBjbGluaWNhbCBjYXJlLiBUaGV5IHVuZGVydGFrZSByZXNlYXJjaCBpbiBvcmRlciB0byBkZXZlbG9wIHRoZSBzY2llbmNlIG9mIG1lZGljaW5lIGFuZCBjYW4gYmUgYW55IGdyYWRlIG9mIGRvY3RvciBmcm9tIGEgZm91bmRhdGlvbiB5ZWFyIGp1bmlvciBkb2N0b3IgdG8gYSBjb25zdWx0YW50LCBHUCBvciBTQVMgZG9jdG9yLg==',
		'_tdcf_description' => 'ZmllbGRfNjJkNTAyYjdhMjQxNQ==',
		'tdcf_linkedin' => 'aHR0cHM6Ly9yby5saW5rZWRpbi5jb20vY29tcGFueS90YWdkaXY=',
		'_tdcf_linkedin' => 'ZmllbGRfNjJkNGY5ODNjOTdhYg==',
		'tdcf_twitter' => 'aHR0cHM6Ly9tb2JpbGUudHdpdHRlci5jb20vdGFnRGl2T2ZmaWNpYWw=',
		'_tdcf_twitter' => 'ZmllbGRfNjJkNGY5NWRjOTdhYQ==',
		'tdcf_instagram' => 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90YWdkaXYv',
		'_tdcf_instagram' => 'ZmllbGRfNjJkNGY5YmQzNjQ0Nw==',
		'tdcf_owner_first_name' => '',
		'_tdcf_owner_first_name' => 'ZmllbGRfNjJkNTFmMGI4NDc3Zg==',
		'tdcf_owner_last_name' => '',
		'_tdcf_owner_last_name' => 'ZmllbGRfNjJkNTFmMWI4NDc4MA==',
		'tdcf_owner_role' => '',
		'_tdcf_owner_role' => 'ZmllbGRfNjJkNTFmMmM4NDc4MQ==',
		'tdb-location-complete' => 'Um9vc2V2ZWx0IFJvYWQgMzYsIENoaWNhZ28sIElsbGlub2lzLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_specialty' => array( $tax_term_urologist_id ),
		'tdtax_gender' => array( $tax_term_male_id ),
		'tdtax_location' => array( $tax_term_seattle_id, $tax_term_washington_id, $tax_term_united_states_id ),
	),
));



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
	MENUS ITEMS CUSTOM
*/
$menu_item_0_id = td_demo_menus::add_taxonomy( array(
	'title' => 'Cardiologist',
	'add_to_menu_id' => $menu_td_demo_custom_menu_id,
	'taxonomy' => 'tdtax_specialty',
	'tax_id' => $tax_term_cardiologist_id,
	'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_taxonomy( array(
	'title' => 'Dermatologist',
	'add_to_menu_id' => $menu_td_demo_custom_menu_id,
	'taxonomy' => 'tdtax_specialty',
	'tax_id' => $tax_term_dermatologist_id,
	'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_taxonomy( array(
	'title' => 'Dietetitian',
	'add_to_menu_id' => $menu_td_demo_custom_menu_id,
	'taxonomy' => 'tdtax_specialty',
	'tax_id' => $tax_term_dietetitian_id,
	'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_taxonomy( array(
	'title' => 'Endocrinologist',
	'add_to_menu_id' => $menu_td_demo_custom_menu_id,
	'taxonomy' => 'tdtax_specialty',
	'tax_id' => $tax_term_endocrinologist_id,
	'parent_id' => ''
));

$menu_item_4_id = td_demo_menus::add_taxonomy( array(
	'title' => 'Gastroenterologist',
	'add_to_menu_id' => $menu_td_demo_custom_menu_id,
	'taxonomy' => 'tdtax_specialty',
	'tax_id' => $tax_term_gastroenterologist_id,
	'parent_id' => ''
));

$menu_item_5_id = td_demo_menus::add_taxonomy( array(
	'title' => 'Immunologist',
	'add_to_menu_id' => $menu_td_demo_custom_menu_id,
	'taxonomy' => 'tdtax_specialty',
	'tax_id' => $tax_term_immunologist_id,
	'parent_id' => ''
));

$menu_item_6_id = td_demo_menus::add_taxonomy( array(
	'title' => 'Optometrist',
	'add_to_menu_id' => $menu_td_demo_custom_menu_id,
	'taxonomy' => 'tdtax_specialty',
	'tax_id' => $tax_term_optometrist_id,
	'parent_id' => ''
));

$menu_item_7_id = td_demo_menus::add_taxonomy( array(
	'title' => 'Pediatrician',
	'add_to_menu_id' => $menu_td_demo_custom_menu_id,
	'taxonomy' => 'tdtax_specialty',
	'tax_id' => $tax_term_pediatrician_id,
	'parent_id' => ''
));

$menu_item_8_id = td_demo_menus::add_taxonomy( array(
	'title' => 'Psychiatrist',
	'add_to_menu_id' => $menu_td_demo_custom_menu_id,
	'taxonomy' => 'tdtax_specialty',
	'tax_id' => $tax_term_psychiatrist_id,
	'parent_id' => ''
));

$menu_item_9_id = td_demo_menus::add_taxonomy( array(
	'title' => 'Urologist',
	'add_to_menu_id' => $menu_td_demo_custom_menu_id,
	'taxonomy' => 'tdtax_specialty',
	'tax_id' => $tax_term_urologist_id,
	'parent_id' => ''
));



/*  ---------------------------------------------------------------------------- 
	MENUS ITEMS FOOTER
*/
$menu_item_0_id = td_demo_menus::add_link( array(
	'title' => 'About',
	'add_to_menu_id' => $menu_td_demo_footer_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_link( array(
	'title' => 'Contact',
	'add_to_menu_id' => $menu_td_demo_footer_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_page(array(
	'title' => 'Plans',
	'add_to_menu_id' => $menu_td_demo_footer_menu_id,
	'page_id' => $page_tds_switching_plans_wizard_id,
	'parent_id' => ''
));



/*  ---------------------------------------------------------------------------- 
	MENUS ITEMS HEADER
*/
$menu_item_0_id = td_demo_menus::add_page(array(
	'title' => 'All Doctors',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'page_id' => $page_specialties_id,
	'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_taxonomy( array(
	'title' => 'Cardiologist',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'taxonomy' => 'tdtax_specialty',
	'tax_id' => $tax_term_cardiologist_id,
	'parent_id' => $menu_item_0_id
));

$menu_item_2_id = td_demo_menus::add_taxonomy( array(
	'title' => 'Dermatologist',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'taxonomy' => 'tdtax_specialty',
	'tax_id' => $tax_term_dermatologist_id,
	'parent_id' => $menu_item_0_id
));

$menu_item_3_id = td_demo_menus::add_taxonomy( array(
	'title' => 'Dietetitian',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'taxonomy' => 'tdtax_specialty',
	'tax_id' => $tax_term_dietetitian_id,
	'parent_id' => $menu_item_0_id
));

$menu_item_4_id = td_demo_menus::add_taxonomy( array(
	'title' => 'Endocrinologist',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'taxonomy' => 'tdtax_specialty',
	'tax_id' => $tax_term_endocrinologist_id,
	'parent_id' => $menu_item_0_id
));

$menu_item_5_id = td_demo_menus::add_taxonomy( array(
	'title' => 'Gastroenterologist',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'taxonomy' => 'tdtax_specialty',
	'tax_id' => $tax_term_gastroenterologist_id,
	'parent_id' => $menu_item_0_id
));

$menu_item_6_id = td_demo_menus::add_taxonomy( array(
	'title' => 'Immunologist',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'taxonomy' => 'tdtax_specialty',
	'tax_id' => $tax_term_immunologist_id,
	'parent_id' => $menu_item_0_id
));

$menu_item_7_id = td_demo_menus::add_taxonomy( array(
	'title' => 'Optometrist',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'taxonomy' => 'tdtax_specialty',
	'tax_id' => $tax_term_optometrist_id,
	'parent_id' => $menu_item_0_id
));

$menu_item_8_id = td_demo_menus::add_taxonomy( array(
	'title' => 'Pediatrician',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'taxonomy' => 'tdtax_specialty',
	'tax_id' => $tax_term_pediatrician_id,
	'parent_id' => $menu_item_0_id
));

$menu_item_9_id = td_demo_menus::add_taxonomy( array(
	'title' => 'Psychiatrist',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'taxonomy' => 'tdtax_specialty',
	'tax_id' => $tax_term_psychiatrist_id,
	'parent_id' => $menu_item_0_id
));

$menu_item_10_id = td_demo_menus::add_taxonomy( array(
	'title' => 'Urologist',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'taxonomy' => 'tdtax_specialty',
	'tax_id' => $tax_term_urologist_id,
	'parent_id' => $menu_item_0_id
));

$menu_item_11_id = td_demo_menus::add_mega_menu( array(
	'title' => 'News',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_news_id,
	'parent_id' => ''
), true);



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
