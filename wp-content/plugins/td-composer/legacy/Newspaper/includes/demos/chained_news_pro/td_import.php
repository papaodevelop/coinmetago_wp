<?php

$menu_td_demo_header_menu_id = td_demo_menus::create_menu('td-demo-header-menu', '');
$menu_td_demo_custom_menu_id = td_demo_menus::create_menu('td-demo-custom-menu', '');
$menu_td_footer_menu_id = td_demo_menus::create_menu('td-demo-footer-menu', '');
$menu_td_footer_menu_extra_id = td_demo_menus::create_menu('td-demo-footer-menu-extra', '');
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



$plan_free_plan___chained_news_id = td_demo_subscription::add_plan( array(
	'name' => 'Free Plan - Chained News',
	'price' => '',
	'months_in_cycle' => '',
	'trial_days' => '0',
	'is_free' => '1',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"676278e1c5a3f71";}',
	)
);

$plan_monthly_plan___chained_news_id = td_demo_subscription::add_plan( array(
	'name' => 'Monthly Plan - Chained News',
	'price' => '10',
	'months_in_cycle' => '1',
	'trial_days' => '0',
	'is_free' => '0',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"486278e1c5a40c7";}',
	)
);

$plan_yearly_plan__chained_news_id = td_demo_subscription::add_plan( array(
	'name' => 'Yearly Plan- Chained News',
	'price' => '100',
	'months_in_cycle' => '12',
	'trial_days' => '0',
	'is_free' => '0',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"216278e1c5a41f3";}',
	)
);

$page_payment_page_id_id = td_demo_content::add_page(array(
	'title' => 'Checkout - chained_news_pro',
	'file' => 'tds_checkout.txt',
));

td_demo_subscription::add_option( array(
	'name' => 'payment_page_id',
	'value' => $page_payment_page_id_id,
	)
);

$page_my_account_page_id_id = td_demo_content::add_page(array(
	'title' => 'My Account - chained_news_pro',
	'file' => 'tds_my_account.txt',
));

td_demo_subscription::add_option( array(
	'name' => 'my_account_page_id',
	'value' => $page_my_account_page_id_id,
	)
);

$page_create_account_page_id_id = td_demo_content::add_page(array(
	'title' => 'Login/Register - chained_news_pro',
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
$cat_business_id = td_demo_category::add_category(array(
	'category_name' => 'Business',
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

$cat_climate_id = td_demo_category::add_category(array(
	'category_name' => 'Climate',
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

$cat_ents_arts_id = td_demo_category::add_category(array(
	'category_name' => 'Ents &amp; Arts',
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

$cat_featured_id = td_demo_category::add_category(array(
	'category_name' => 'Featured',
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

$cat_offbeat_id = td_demo_category::add_category(array(
	'category_name' => 'Offbeat',
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

$cat_politics_id = td_demo_category::add_category(array(
	'category_name' => 'Politics',
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

$cat_science_tech_id = td_demo_category::add_category(array(
	'category_name' => 'Science &amp; Tech',
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

$cat_travel_id = td_demo_category::add_category(array(
	'category_name' => 'Travel',
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

$cat_uncategorized_id = td_demo_category::add_category(array(
	'category_name' => 'Uncategorized',
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

$cat_world_id = td_demo_category::add_category(array(
	'category_name' => 'World',
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
	PAGES
*/
$page_menu_modal_id = td_demo_content::add_page(array(
	'title' => 'Menu Modal',
	'file' => 'menu_modal.txt',
	'demo_unique_id' => '276278e1c5be1c5',
));

$page_tds_switching_plans_wizard_id = td_demo_content::add_page(array(
	'title' => 'Switching plans wizard - Chained News',
	'file' => 'tds_switching_plans_wizard.txt',
	'template' => 'default',
	'demo_unique_id' => '966278e1c5bea96',
));

$page_home_id = td_demo_content::add_page(array(
	'title' => 'Home',
	'file' => 'home.txt',
	'template' => 'default',
	'homepage' => true,
	'demo_unique_id' => '306278e1c5bf6d8',
));

$page_privacy_policy_id = td_demo_content::add_page(array(
	'title' => 'Privacy Policy',
	'file' => 'privacy_policy.txt',
	'template' => 'default',
	'demo_unique_id' => '776278e1c5bfbb3',
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
	'title' => 'Subscription Locker - Chained News',
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
	'tds_paid_subs_page_id' => $page_tds_switching_plans_wizard_id,
	'tds_paid_subs_plan_ids' => [$plan_free_plan___chained_news_id,$plan_monthly_plan___chained_news_id,$plan_yearly_plan__chained_news_id],
			'tds_locker_styles' => array(
				'tds_submit_btn_bg_color' => '#757575',
				'tds_submit_btn_bg_color_h' => '#000000',
				'tds_pp_msg_links_color' => '#757575',
				'tds_pp_msg_links_color_h' => '#000000',
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

td_util::update_option('tds_demo_options', 'a:1:{s:5:"plans";a:3:{i:0;a:2:{s:9:"unique_id";s:15:"676278e1c5a3f71";s:4:"name";s:24:"Free Plan - Chained News";}i:1;a:2:{s:9:"unique_id";s:15:"486278e1c5a40c7";s:4:"name";s:27:"Monthly Plan - Chained News";}i:2;a:2:{s:9:"unique_id";s:15:"216278e1c5a41f3";s:4:"name";s:25:"Yearly Plan- Chained News";}}}');


/*  ---------------------------------------------------------------------------- 
	SUBSCRIPTION - end phase 2
*/

/*  ---------------------------------------------------------------------------- 
	POSTS
*/
$post_td_post_researchers_have_discovered_how_pandas_are_able_to_gain_weight_on_a_bamboo_diet_id = td_demo_content::add_post(array(
	'title' => 'Researchers have discovered how pandas are able to gain weight on a bamboo diet',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_offbeat_id,),
));

$post_td_post_a_man_continues_to_collect_his_rubbish_in_an_unusual_fashion_on_the_back_of_a_horse_id = td_demo_content::add_post(array(
	'title' => 'A man continues to collect his rubbish in an unusual fashion - on the back of a horse',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_locker' => '297',
	'categories_id_array' => array($cat_offbeat_id,),
));

$post_td_post_thieving_bird_gives_aerial_view_of_national_park_in_new_zealand_after_stealing_camera_id = td_demo_content::add_post(array(
	'title' => 'Thieving bird gives aerial view of national park in New Zealand after stealing camera',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_offbeat_id,),
));

$post_td_post_baby_neonate_newly_hatched_deepwater_ghost_shark_discovered_off_south_island_id = td_demo_content::add_post(array(
	'title' => 'Baby Neonate (newly-hatched) deepwater ghost shark discovered off South Island',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_offbeat_id,),
));

$post_td_post_religious_artwork_removed_after_local_priest_and_businessman_found_among_holy_images_id = td_demo_content::add_post(array(
	'title' => 'Religious artwork removed after local priest and businessman found among holy images',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_offbeat_id,),
));

$post_td_post_giant_289g_strawberry_declared_largest_on_record_after_almost_a_year_on_ice_id = td_demo_content::add_post(array(
	'title' => 'Giant 289g strawberry declared largest on record after almost a year on ice',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_offbeat_id,),
));

$post_td_post_the_13_hour_spectacular_sights_of_britains_longest_train_adventure_offers_epic_snapshots_of_both_cities_id = td_demo_content::add_post(array(
	'title' => 'The 13-hour, spectacular sights of Britain’s longest train adventure offers epic snapshots of both cities',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_travel_firms_update_rebooking_and_refund_policies_after_restrictions_tightened_find_all_about_below_id = td_demo_content::add_post(array(
	'title' => 'Travel firms update rebooking and refund policies after restrictions tightened. Find all about below',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_highway_code_everything_you_need_to_know_as_road_rules_change_from_today_check_the_new_restrictions_id = td_demo_content::add_post(array(
	'title' => 'Highway Code: Everything you need to know as road rules change from today, check the new restrictions',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_which_countries_are_letting_britons_in_check_entry_requirements_for_the_country_you_want_to_visit_id = td_demo_content::add_post(array(
	'title' => 'Which countries are letting Britons in? Check entry requirements for the country you want to visit',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_covid_19_face_masks_on_flights_could_be_enforced_for_years_as_airlines_seek_consistency_on_rules_id = td_demo_content::add_post(array(
	'title' => 'COVID-19: Face masks on flights \'could be enforced for years\' as airlines seek consistency on rules',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_covid_19_remaining_or_not_restrictions_for_travelling_including_tests_and_passenger_locator_forms_id = td_demo_content::add_post(array(
	'title' => 'COVID-19: Remaining or not restrictions for travelling - including tests and passenger locator forms',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_latest_update_kylie_jenner_and_travis_scott_ditch_baby_wolfs_name_as_it_didnt_feel_right_id = td_demo_content::add_post(array(
	'title' => 'LATEST UPDATE: Kylie Jenner and Travis Scott ditch baby Wolf\'s name as it didn\'t \'feel\' right',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_ents_arts_id,),
));

$post_td_post_warhols_shot_sage_blue_marilyn_could_become_the_most_expensive_20th_century_artwork_ever_id = td_demo_content::add_post(array(
	'title' => 'Warhol\'s Shot Sage Blue Marilyn could become the most expensive 20th century artwork ever',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_ents_arts_id,),
));

$post_td_post_out_of_space_pete_davidson_drops_out_of_jeff_bezoss_latest_blue_origin_space_flight_id = td_demo_content::add_post(array(
	'title' => 'Out Of Space: Pete Davidson drops out of Jeff Bezos\'s latest Blue Origin space flight',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_ents_arts_id,),
));

$post_td_post_anne_hathaways_fyre_festival_unicorn_and_other_films_and_tv_shows_to_watch_in_this_week_id = td_demo_content::add_post(array(
	'title' => 'Anne Hathaway\'s Fyre Festival Unicorn - and other films and TV shows to watch in this week',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_ents_arts_id,),
));

$post_td_post_kanye_pulled_from_performing_at_grammys_amid_online_posts_aimed_at_kim_kardashian_and_pete_id = td_demo_content::add_post(array(
	'title' => 'Kanye \'pulled from performing at Grammys\' amid online posts aimed at Kim Kardashian and Pete',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_ents_arts_id,),
));

$post_td_post_concert_for_ukraine_ed_sheeran_camila_cabello_and_emeli_sande_announced_for_fundraising_show_id = td_demo_content::add_post(array(
	'title' => 'Concert For Ukraine: Ed Sheeran, Camila Cabello and Emeli Sandé announced for fundraising show',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_ents_arts_id,),
));

$post_td_post_dozing_from_home_how_homeworkers_have_perfected_the_art_of_napping_on_the_job_this_period_id = td_demo_content::add_post(array(
	'title' => 'Dozing from home: how homeworkers have perfected the art of napping on the job this period',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_business_id,),
));

$post_td_post_food_bank_users_declining_potatoes_as_cooking_costs_too_high_says_iceland_boss_for_cn_id = td_demo_content::add_post(array(
	'title' => 'Food bank users declining potatoes as cooking costs too high, says Iceland boss for CN',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_business_id,),
));

$post_td_post_latest_update_camelot_fined_more_than_3_000_over_series_of_national_lottery_errors_id = td_demo_content::add_post(array(
	'title' => 'LATEST UPDATE: Camelot fined more than £3.000 over series of National Lottery errors',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_business_id,),
));

$post_td_post_oil_price_retreat_likely_to_be_short_lived_as_demand_will_outstrip_supply_in_ahead_id = td_demo_content::add_post(array(
	'title' => 'Oil price retreat likely to be short-lived as demand will outstrip supply in ahead',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_business_id,),
));

$post_td_post_po_ferries_to_pay_36_5m_in_compensation_to_affected_workers_after_sackings_last_week_id = td_demo_content::add_post(array(
	'title' => 'P&O Ferries to pay £36.5m in compensation to affected workers after sackings last week',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_business_id,),
));

$post_td_post_the_chancellor_may_bring_in_as_he_prepares_another_budget_under_emergency_conditions_id = td_demo_content::add_post(array(
	'title' => 'The chancellor may bring in as he prepares another budget under emergency conditions',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_business_id,),
));

$post_td_post_video_calls_recommandation_youve_got_to_be_careful_with_glasses_on_zoom_says_etiquette_expert_id = td_demo_content::add_post(array(
	'title' => 'Video calls recommandation : \'You\'ve got to be careful with glasses on Zoom\' says etiquette expert',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_science_tech_id,),
));

$post_td_post_coercive_and_predatory_companies_are_targeting_the_elderly_to_sell_unnecessary_insurance_over_the_phone_id = td_demo_content::add_post(array(
	'title' => 'Coercive and predatory companies are targeting the elderly to sell unnecessary insurance over the phone',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_science_tech_id,),
));

$post_td_post_british_built_rover_launch_to_find_life_on_mars_delayed_over_impossibility_of_working_with_russia_id = td_demo_content::add_post(array(
	'title' => 'British-built rover launch to find life on Mars delayed over \'impossibility\' of working with Russia',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_science_tech_id,),
));

$post_td_post_safety_bill_has_the_government_botched_its_attempt_to_stop_the_spread_of_hateful_content_online_id = td_demo_content::add_post(array(
	'title' => 'Safety Bill: Has the government botched its attempt to stop the spread of hateful content online?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_science_tech_id,),
));

$post_td_post_the_social_media_platform_is_being_accused_for_scam_celebrity_crypto_ads_being_run_on_facebook_id = td_demo_content::add_post(array(
	'title' => 'The social media platform is being accused for scam celebrity crypto ads being run on Facebook',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_science_tech_id,),
));

$post_td_post_youtube_reported_bringing_in_almost_20bn_15bn_in_advertising_revenues_in_2020_on_a_global_basis_id = td_demo_content::add_post(array(
	'title' => 'YouTube reported bringing in almost $20bn (£15bn) in advertising revenues in 2020 on a global basis',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_science_tech_id,),
));

$post_td_post_more_than_600000_hectares_have_been_burned_by_wildfires_in_recent_weeks_across_argentina_id = td_demo_content::add_post(array(
	'title' => 'More than 600,000 hectares have been burned by wildfires in recent weeks across Argentina',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_climate_id,),
));

$post_td_post_rich_nations_must_find_the_money_to_protect_people_from_the_impacts_of_climate_change_id = td_demo_content::add_post(array(
	'title' => 'Rich nations must find the money to protect people from the impacts of climate change',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_climate_id,),
));

$post_td_post_queensland_reconstruction_authority_show_the_rapid_rise_and_slow_draining_of_severe_floods_id = td_demo_content::add_post(array(
	'title' => 'Queensland Reconstruction Authority show the rapid rise and slow draining of severe floods',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_climate_id,),
));

$post_td_post_energy_bills_are_soaring_because_of_rising_gas_prices_and_ukraines_war_with_russia_id = td_demo_content::add_post(array(
	'title' => 'Energy bills are soaring because of rising gas prices and Ukraine\'s war with Russia',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_climate_id,),
));

$post_td_post_boris_johnson_rips_up_climate_rulebook_as_he_moves_to_replace_russian_supply_of_oil_and_gas_id = td_demo_content::add_post(array(
	'title' => 'Boris Johnson rips up climate rulebook as he moves to replace Russian supply of oil and gas',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_climate_id,),
));

$post_td_post_warmer_weather_wreaks_havoc_with_hay_fever_symptoms_as_tree_pollen_spikes_new_researches_id = td_demo_content::add_post(array(
	'title' => 'Warmer weather wreaks havoc with hay fever symptoms as tree pollen spikes, new researches',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_climate_id,),
));

$post_td_post_we_have_no_economic_relations_with_russia_now_says_imf_chie_in_this_tuesday_morning_id = td_demo_content::add_post(array(
	'title' => '\'We have no economic relations with Russia now\' says IMF chief in this Tuesday morning',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'tds_locker' => '297',
	'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_terror_suspect_killed_mp_in_frenzied_attack_after_targeting_michael_gove_court_hears_id = td_demo_content::add_post(array(
	'title' => 'Terror suspect killed MP in \'frenzied attack\' after targeting Michael Gove, court hears',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_therese_coffey_commits_to_pension_rise_policy_being_honoured_for_the_remainder_of_the_parliament_id = td_demo_content::add_post(array(
	'title' => 'Therese Coffey commits to pension rise policy being honoured for the remainder of the Parliament',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_vladimir_putin_sees_himself_as_stalins_successor_says_boris_johnson_for_chained_news_id = td_demo_content::add_post(array(
	'title' => 'Vladimir Putin sees himself as \'Stalin\'s successor\', says Boris Johnson for Chained News',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_vladimir_putin_frightened_of_ukraine_because_of_free_press_and_elections_says_pm_id = td_demo_content::add_post(array(
	'title' => 'Vladimir Putin \'frightened of Ukraine\' because of free press and elections, says PM',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_fa_working_with_the_government_to_let_chelsea_fans_attend_cup_semi_final_despite_sanctions_id = td_demo_content::add_post(array(
	'title' => 'FA \'working with the government\' to let Chelsea fans attend cup semi-final despite sanctions',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_footage_shows_the_aftermath_of_the_china_eastern_airlines_plane_crash_in_the_morning_id = td_demo_content::add_post(array(
	'title' => 'Footage shows the aftermath of the China Eastern Airlines plane crash in the morning',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_world_id,),
));

$post_td_post_the_great_debate_who_is_defining_the_new_world_order_stay_tunned_to_know_more_id = td_demo_content::add_post(array(
	'title' => 'The Great Debate: Who is defining the new world order? Stay tuned to know more',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_world_id,),
));

$post_td_post_fuel_poverty_worst_hit_areas_revealed_as_two_in_five_households_set_to_be_affected_id = td_demo_content::add_post(array(
	'title' => 'Fuel poverty: Worst hit areas revealed as two in five households set to be affected',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_world_id,),
));

$post_td_post_man_96_who_survived_four_nazi_concentration_camps_killed_during_russian_attack_id = td_demo_content::add_post(array(
	'title' => 'Man, 96, who survived four Nazi concentration camps killed during Russian attack',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_world_id,),
));

$post_td_post_zelensky_he_is_ready_to_negotiate_with_putin_it_could_mean_a_third_world_war_id = td_demo_content::add_post(array(
	'title' => 'Zelensky: He is ready to negotiate with Putin, it could mean \'a third World War\'',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_world_id,),
));

$post_td_post_go_home_ukrainian_protesters_confront_russian_military_vehicles_in_kherson_id = td_demo_content::add_post(array(
	'title' => '\'Go home!\': Ukrainian protesters confront Russian military vehicles in Kherson',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_world_id,),
));


/*  ---------------------------------------------------------------------------- 
	PRODUCTS
*/

/*  ---------------------------------------------------------------------------- 
	MENUS
*/



/*  ---------------------------------------------------------------------------- 
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_link(array(
	'title' => 'Subscribe',
	'add_to_menu_id' => $menu_td_demo_custom_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_link(array(
	'title' => 'FAQ',
	'add_to_menu_id' => $menu_td_demo_custom_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_link(array(
	'title' => 'CN Staff',
	'add_to_menu_id' => $menu_td_demo_custom_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_link(array(
	'title' => 'Press Center',
	'add_to_menu_id' => $menu_td_demo_custom_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_4_id = td_demo_menus::add_link(array(
	'title' => 'Coupons',
	'add_to_menu_id' => $menu_td_demo_custom_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_5_id = td_demo_menus::add_link(array(
	'title' => 'Editorial Standards',
	'add_to_menu_id' => $menu_td_demo_custom_menu_id,
	'url' => '#',
	'parent_id' => ''
));




/*  ---------------------------------------------------------------------------- 
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_category(array(
	'title' => 'World',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_world_id,
	'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_category(array(
	'title' => 'Politics',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_politics_id,
	'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_category(array(
	'title' => 'Climate',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_climate_id,
	'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_category(array(
	'title' => 'Science & Tech',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_science_tech_id,
	'parent_id' => ''
));

$menu_item_4_id = td_demo_menus::add_category(array(
	'title' => 'Business',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_business_id,
	'parent_id' => ''
));

$menu_item_5_id = td_demo_menus::add_category(array(
	'title' => 'Ents & Arts',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_ents_arts_id,
	'parent_id' => ''
));

$menu_item_6_id = td_demo_menus::add_category(array(
	'title' => 'Travel',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_travel_id,
	'parent_id' => ''
));

$menu_item_7_id = td_demo_menus::add_category(array(
	'title' => 'Offbeat',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_offbeat_id,
	'parent_id' => ''
));



/*  ---------------------------------------------------------------------------- 
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_link(array(
	'title' => 'About us',
	'add_to_menu_id' => $menu_td_footer_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_link(array(
	'title' => 'Advertise',
	'add_to_menu_id' => $menu_td_footer_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_link(array(
	'title' => 'Contact us',
	'add_to_menu_id' => $menu_td_footer_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_link(array(
	'title' => 'Customer Care',
	'add_to_menu_id' => $menu_td_footer_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_4_id = td_demo_menus::add_link(array(
	'title' => 'Jobs',
	'add_to_menu_id' => $menu_td_footer_menu_id,
	'url' => '#',
	'parent_id' => ''
));
/*  ---------------------------------------------------------------------------- 
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_link(array(
	'title' => 'Disclaimer',
	'add_to_menu_id' => $menu_td_footer_menu_extra_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_link(array(
	'title' => 'Privacy',
	'add_to_menu_id' => $menu_td_footer_menu_extra_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_link(array(
	'title' => 'Security',
	'add_to_menu_id' => $menu_td_footer_menu_extra_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_link(array(
	'title' => 'RSS',
	'add_to_menu_id' => $menu_td_footer_menu_extra_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_4_id = td_demo_menus::add_link(array(
	'title' => 'Site Map',
	'add_to_menu_id' => $menu_td_footer_menu_extra_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_5_id = td_demo_menus::add_link(array(
	'title' => 'Accessibility Help',
	'add_to_menu_id' => $menu_td_footer_menu_extra_id,
	'url' => '#',
	'parent_id' => ''
));


/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/
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
	'title' => 'Header Template',
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
