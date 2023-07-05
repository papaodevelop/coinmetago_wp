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
	'price' => '300',
	'months_in_cycle' => '12',
	'trial_days' => '0',
	'is_free' => '0',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"1561f2b184720ba";}',
	)
);

$plan_monthly_plan_id = td_demo_subscription::add_plan( array(
	'name' => 'Monthly Plan',
	'price' => '25',
	'months_in_cycle' => '1',
	'trial_days' => '0',
	'is_free' => '0',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"1861f2b184721ab";}',
	)
);

$plan_free_plan_id = td_demo_subscription::add_plan( array(
	'name' => 'Free Plan',
	'price' => '',
	'months_in_cycle' => '',
	'trial_days' => '0',
	'is_free' => '1',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"3161f2b18472245";}',
	)
);

$page_payment_page_id_id = td_demo_content::add_page(array(
	'title' => 'Checkout - kattmar',
	'file' => 'tds_checkout.txt',
));

td_demo_subscription::add_option( array(
	'name' => 'payment_page_id',
	'value' => $page_payment_page_id_id,
	)
);

$page_my_account_page_id_id = td_demo_content::add_page(array(
	'title' => 'My Account - kattmar',
	'file' => 'tds_my_account.txt',
));

td_demo_subscription::add_option( array(
	'name' => 'my_account_page_id',
	'value' => $page_my_account_page_id_id,
	)
);

$page_create_account_page_id_id = td_demo_content::add_page(array(
	'title' => 'Login/Register - kattmar',
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

$cat_world_news_id = td_demo_category::add_category(array(
    'category_name' => 'World News',
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

$cat_local_news_id = td_demo_category::add_category(array(
    'category_name' => 'Local News',
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

$cat_art_id = td_demo_category::add_category(array(
	'category_name' => 'Art',
	'parent_id' => $cat_world_news_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_art_local_news_id = td_demo_category::add_category(array(
	'category_name' => 'Art',
	'parent_id' => $cat_local_news_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_culture_id = td_demo_category::add_category(array(
	'category_name' => 'Culture',
	'parent_id' => $cat_world_news_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_culture_local_news_id = td_demo_category::add_category(array(
	'category_name' => 'Culture',
	'parent_id' => $cat_local_news_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_events_id = td_demo_category::add_category(array(
	'category_name' => 'Events',
	'parent_id' => $cat_local_news_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_magazine_id = td_demo_category::add_category(array(
	'category_name' => 'Magazine',
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
	'parent_id' => $cat_world_news_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_politics_local_news_id = td_demo_category::add_category(array(
	'category_name' => 'Politics',
	'parent_id' => $cat_local_news_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_tech_id = td_demo_category::add_category(array(
	'category_name' => 'Tech',
	'parent_id' => $cat_world_news_id,
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
$page_main_menu_page_id = td_demo_content::add_page(array(
	'title' => 'Main Menu page',
	'file' => 'main_menu_page.txt',
	'demo_unique_id' => '2261f2b184b8f0e',
));

$page_kattmar_subscription_popup_id = td_demo_content::add_page(array(
	'title' => 'Kattmar Subscription Popup',
	'file' => 'kattmar_subscription_popup.txt',
	'demo_unique_id' => '1661f2b184b958e',
));

$page_tds_switching_plans_wizard_id = td_demo_content::add_page(array(
	'title' => 'Switching plans wizard',
	'file' => 'tds_switching_plans_wizard.txt',
	'demo_unique_id' => '9261f2b184b9cca',
));

$page_homepage_id = td_demo_content::add_page(array(
	'title' => 'Homepage',
	'file' => 'homepage.txt',
	'homepage' => true,
	'demo_unique_id' => '1061f2b184ba7b4',
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
				'tds_title' => 'Exclusive Content',
				'tds_message' => 'Choose a plan to unlock this content and read it at your leisure.',
				'tds_input_placeholder' => 'Please enter your email address',
				'tds_submit_btn_text' => 'Subscribe',
				'tds_pp_msg' => 'I consent to processing of my data according to <a href=\"#\">Terms of Use</a> & <a href=\"#\">Privacy Policy</a>.',
				'tds_locker_cf_1_name' => 'Custom field 1',
				'tds_locker_cf_2_name' => 'Custom field 2',
				'tds_locker_cf_3_name' => 'Custom field 3',
			),
	'tds_payable' => 'paid_subscription',
	'tds_paid_subs_page_id' => $page_tds_switching_plans_wizard_id,
	'tds_paid_subs_plan_ids' => [$plan_yearly_plan_id,$plan_monthly_plan_id,$plan_free_plan_id],
			'tds_locker_styles' => array(
				'tds_bg_color' => '#e4edf1',
				'all_tds_border' => '1px',
				'all_tds_border_color' => '#828d97',
				'tds_title_color' => '#18272f',
				'tds_message_color' => '#18272f',
				'tds_submit_btn_text_color' => '#ffffff',
				'tds_submit_btn_text_color_h' => '#ffffff',
				'tds_submit_btn_bg_color' => '#7fc5ef',
				'tds_submit_btn_bg_color_h' => '#0b6baf',
				'tds_pp_checked_color' => '#7fc5ef',
				'tds_pp_check_bg' => '#7fc5ef',
				'tds_pp_check_bg_f' => '#ffffff',
				'tds_pp_check_border_color' => '#7fc5ef',
				'tds_pp_check_border_color_f' => '#7fc5ef',
				'tds_pp_msg_color' => '#828d97',
				'tds_pp_msg_links_color' => '#7fc5ef',
				'tds_pp_msg_links_color_h' => '#0b6baf',
				'tds_general_font_family' => '901',
				'tds_title_font_family' => '901',
				'tds_title_font_size' => '30',
				'tds_title_font_weight' => '800',
				'tds_title_font_transform' => 'uppercase',
				'tds_title_font_spacing' => '1.5',
				'tds_message_font_family' => '901',
				'tds_message_font_size' => '16',
				'tds_message_font_line_height' => '1.2',
				'tds_submit_btn_text_font_family' => '901',
				'tds_submit_btn_text_font_size' => '14',
				'tds_submit_btn_text_font_weight' => '600',
				'tds_submit_btn_text_font_transform' => 'uppercase',
				'tds_submit_btn_text_font_spacing' => '2',
				'tds_after_btn_text_font_family' => '901',
				'tds_after_btn_text_font_size' => '12',
				'tds_pp_msg_font_family' => '901',
				'tds_pp_msg_font_size' => '12',
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

td_util::update_option('tds_demo_options', 'a:1:{s:5:"plans";a:3:{i:0;a:2:{s:9:"unique_id";s:15:"1561f2b184720ba";s:4:"name";s:11:"Yearly Plan";}i:1;a:2:{s:9:"unique_id";s:15:"1861f2b184721ab";s:4:"name";s:12:"Monthly Plan";}i:2;a:2:{s:9:"unique_id";s:15:"3161f2b18472245";s:4:"name";s:9:"Free Plan";}}}');


/*  ---------------------------------------------------------------------------- 
	SUBSCRIPTION - end phase 2
*/

/*  ---------------------------------------------------------------------------- 
	POSTS
*/
$post_td_post_taking_a_stroll_through_the_busy_and_beautiful_streets_of_athens_in_greece_id = td_demo_content::add_post(array(
	'title' => 'Taking a Stroll Through the Busy and Beautiful Streets of Athens in Greece',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_magazine_id,),
));

$post_td_post_10_reasons_why_riding_a_vespa_is_the_perfect_way_to_get_around_in_italy_id = td_demo_content::add_post(array(
	'title' => '10 Reasons Why Riding a Vespa is the Perfect Way to Get Around in Italy',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_magazine_id,),
));

$post_td_post_a_breathtaking_view_of_the_niagara_waterfalls_in_this_hidden_cove_id = td_demo_content::add_post(array(
	'title' => 'A Breathtaking View of the Niagara Waterfalls in this Hidden Cove',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_magazine_id,),
));

$post_td_post_backpacking_across_europe_and_travelling_by_foot_lets_you_enjoy_its_wonders_id = td_demo_content::add_post(array(
	'title' => 'Backpacking Across Europe and Travelling by Foot Lets you Enjoy its Wonders',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_magazine_id,),
));

$post_td_post_the_train_stations_located_in_germany_are_a_sight_to_behold_for_everyone_id = td_demo_content::add_post(array(
	'title' => 'The Train Stations Located in Germany are a Sight to Behold for Everyone',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_magazine_id,),
));

$post_td_post_taking_a_spa_trip_with_your_best_friend_has_shown_to_improve_your_health_id = td_demo_content::add_post(array(
	'title' => 'Taking a Spa Trip with Your Best Friend has Shown to Improve Your Health',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_magazine_id,),
));

$post_td_post_enjoying_the_bahamas_in_a_premium_luxury_suite_and_gucci_white_overalls_id = td_demo_content::add_post(array(
	'title' => 'Enjoying the Bahamas in a Premium Luxury Suite and Gucci White Overalls',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_magazine_id,),
));

$post_td_post_celebrating_the_event_of_a_life_time_turning_30_in_style_in_new_york_city_id = td_demo_content::add_post(array(
	'title' => 'Celebrating the Event of a Life Time: Turning 30 in Style in New York City',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_magazine_id,),
));

$post_td_post_corporate_lifetyle_has_been_the_perfect_life_for_these_10_people_and_why_id = td_demo_content::add_post(array(
	'title' => 'Corporate Lifetyle has Been the Perfect Life for these 10 People and Why',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_magazine_id,),
));

$post_td_post_taking_a_jog_through_the_forest_to_enjoy_the_clean_air_and_beautiful_nature_id = td_demo_content::add_post(array(
	'title' => 'Taking a Jog Through the Forest to Enjoy the Clean Air and Beautiful Nature',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_magazine_id,),
));

$post_td_post_robotics_class_in_state_school_has_received_a_certificate_of_approval_from_congress_id = td_demo_content::add_post(array(
	'title' => 'Robotics Class in State School Has Received a Certificate of Approval from Congress',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_culture_local_news_id,),
));

$post_td_post_barista_jamie_watson_has_created_a_new_recipe_for_mocha_locha_frappucinos_that_awes_everyone_id = td_demo_content::add_post(array(
	'title' => 'Barista Jamie Watson has Created a New Recipe for Mocha Frappucinos that Awes Everyone',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_culture_local_news_id,),
));

$post_td_post_you_now_need_to_file_a_document_at_city_hall_if_you_are_gonna_post_your_children_online_id = td_demo_content::add_post(array(
	'title' => 'You Now Need to File a Document at City Hall if You are Gonna Post Your Children Online',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_culture_local_news_id,),
));

$post_td_post_getting_to_the_bottom_of_the_story_with_robert_heming_the_up_and_coming_journalist_id = td_demo_content::add_post(array(
	'title' => 'Getting to the Bottom of the Story with Robert Heming, the Up and Coming Journalist',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_culture_local_news_id,),
));

$post_td_post_doing_yoga_at_home_has_been_proven_to_enhance_lengthen_and_improve_your_life_span_id = td_demo_content::add_post(array(
	'title' => 'Doing Yoga at Home has Been Proven to Enhance, Lengthen, and Improve Your Life Span',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_culture_local_news_id,),
));

$post_td_post_take_an_aerobics_class_for_free_this_friday_at_ingenious_affairs_on_park_avenue_id = td_demo_content::add_post(array(
	'title' => 'Take an Aerobics Class for Free this Friday at Ingenious Affairs on Park Avenue',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_events_id,),
));

$post_td_post_how_sailing_has_saved_and_improved_my_life_and_made_it_a_whole_lot_more_meaningful_id = td_demo_content::add_post(array(
	'title' => 'How Sailing Has Saved and Improved My Life, and Made it a Whole Lot More Meaningful',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_events_id,),
));

$post_td_post_restaurant_in_the_pacific_street_opened_up_on_wednesday_night_and_is_ready_to_serve_you_id = td_demo_content::add_post(array(
	'title' => 'Restaurant in the Pacific Street Opened Up on Wednesday Night and Is Ready to Serve You',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_events_id,),
));

$post_td_post_hiking_across_the_city_ruins_to_improve_physique_and_broaden_your_horizons_id = td_demo_content::add_post(array(
	'title' => 'Hiking Across the City Ruins to Improve Physique and Broaden Your Horizons',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_events_id,),
));

$post_td_post_getting_into_shape_by_going_on_daily_jogs_with_strangers_by_using_the_jfp_app_id = td_demo_content::add_post(array(
	'title' => 'Getting into Shape by Going on Daily Jogs with Strangers by Using the JFP App',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_events_id,),
));

$post_td_post_local_musician_steven_rogers_playing_in_the_las_playas_dive_bar_downtown_id = td_demo_content::add_post(array(
	'title' => 'Local Musician Steven Rogers Playing in the Las Playas Dive Bar, Downtown',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_art_local_news_id,),
));

$post_td_post_concert_taking_place_friday_night_by_the_ocean_view_avenue_in_the_concert_hall_id = td_demo_content::add_post(array(
	'title' => 'Concert Taking Place Friday Night, By the Ocean View Avenue in the Concert Hall',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_art_local_news_id,),
));

$post_td_post_cuisine_and_the_art_of_cooking_with_andreea_martini_and_her_preferred_spices_id = td_demo_content::add_post(array(
	'title' => 'Cuisine and the Art of Cooking with Andreea Martini and Her Preferred Spices',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_art_local_news_id,),
));

$post_td_post_surfing_contest_on_the_beach_winner_gets_to_take_away_brand_new_surf_board_id = td_demo_content::add_post(array(
	'title' => 'Surfing Contest on the Beach, Winner Gets to Take Away Brand New Surf Board',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_art_local_news_id,),
));

$post_td_post_celebrating_a_very_merry_happy_new_you_the_trend_in_millenial_generation_id = td_demo_content::add_post(array(
	'title' => 'Celebrating a Very Merry Happy New You: The Trend in Millenial Generation',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_art_local_news_id,),
));

$post_td_post_new_policies_for_office_work_during_the_pandemic_in_2021_rules_guidelines_id = td_demo_content::add_post(array(
	'title' => 'New Policies for Office Work During the Pandemic in 2021: Rules, Guidelines',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_politics_local_news_id,),
));

$post_td_post_state_has_issued_online_classes_for_every_student_let_the_zoom_meetings_commence_id = td_demo_content::add_post(array(
	'title' => 'State Has Issued Online Classes for Every Student, Let the Zoom Meetings Commence',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_politics_local_news_id,),
));

$post_td_post_there_is_no_planet_b_the_movement_that_has_captured_an_entire_nation_id = td_demo_content::add_post(array(
	'title' => 'There is no Planet B, the Movement that Has Captured an Entire Nation',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_politics_local_news_id,),
));

$post_td_post_testing_for_job_interviews_and_city_hall_ventures_as_a_preventive_measure_id = td_demo_content::add_post(array(
	'title' => 'Testing for Job Interviews and City Hall Ventures as a Preventive Measure',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_politics_local_news_id,),
));

$post_td_post_changes_to_retirement_plans_and_pensions_and_how_it_impacts_the_elderly_id = td_demo_content::add_post(array(
	'title' => 'Changes to Retirement Plans and Pensions and How it Impacts the Elderly',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_politics_local_news_id,),
));

$post_td_post_local_water_testing_procedures_you_need_to_be_aware_of_when_sampling_tap_water_id = td_demo_content::add_post(array(
	'title' => 'Local Water Testing Procedures You Need to Be Aware Of When Sampling Tap Water',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_creating_a_local_community_that_supports_and_fights_for_each_others_rights_id = td_demo_content::add_post(array(
	'title' => 'Creating a Local Community that Supports and Fights for Each Others\' Rights',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_standing_up_for_what_you_believe_in_becoming_an_environmental_activist_id = td_demo_content::add_post(array(
	'title' => 'Standing Up For What You Believe In: Becoming an Environmental Activist',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_leaving_behind_a_better_planet_for_the_future_generations_planting_trees_id = td_demo_content::add_post(array(
	'title' => 'Leaving Behind a Better Planet for the Future Generations: Planting Trees',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_new_council_has_established_new_laws_for_foreigners_looking_to_travel_id = td_demo_content::add_post(array(
	'title' => 'New Council Has Established New Laws for Foreigners Looking to Travel',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_how_to_kayak_across_different_rivers_dangers_procedures_equipment_tactics_id = td_demo_content::add_post(array(
	'title' => 'How to Kayak Across Different Rivers: Dangers, Procedures, Equipment, Tactics',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_culture_id,),
));

$post_td_post_what_makes_greece_into_such_a_beautiful_country_to_explore_and_travel_to_id = td_demo_content::add_post(array(
	'title' => 'What Makes Greece into Such a Beautiful Country to Explore and Travel To',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_culture_id,),
));

$post_td_post_discover_europe_in_20_days_while_backpacking_trip_details_cities_worth_exploring_id = td_demo_content::add_post(array(
	'title' => 'Discover Europe in 20 Days while Backpacking: Trip Details, Cities Worth Exploring',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_culture_id,),
));

$post_td_post_the_swamps_of_northern_africa_and_what_you_should_know_before_embarking_on_an_excursion_id = td_demo_content::add_post(array(
	'title' => 'The Swamps of Northern Africa and What You Should Know Before Embarking on an Excursion',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_culture_id,),
));

$post_td_post_a_tourist_in_new_delhi_india_important_bits_about_the_language_religion_cultural_customs_id = td_demo_content::add_post(array(
	'title' => 'A Tourist in New Delhi, India: Important Bits about the Language, Religion, Cultural Customs',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_culture_id,),
));

$post_td_post_taking_initiative_and_improving_the_colors_of_the_year_2021_by_spreading_the_word_id = td_demo_content::add_post(array(
	'title' => 'Taking Initiative and Improving the Colors of the Year, 2021, by Spreading the Word',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_art_id,),
));

$post_td_post_landscape_paintings_from_angelica_martelli_her_thought_process_and_workflow_id = td_demo_content::add_post(array(
	'title' => 'Landscape Paintings from Angelica Martelli - Her Thought Process and Workflow',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_art_id,),
));

$post_td_post_gold_in_makeup_digital_art_paintings_photoshoots_to_capture_your_audience_id = td_demo_content::add_post(array(
	'title' => 'Gold in Makeup: Digital Art, Paintings, Photoshoots to Capture Your Audience',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_art_id,),
));

$post_td_post_graffiti_art_origins_and_how_it_has_evolved_throughout_the_last_few_decades_id = td_demo_content::add_post(array(
	'title' => 'Graffiti Art: Origins and How it has Evolved Throughout the Last Few Decades',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_art_id,),
));

$post_td_post_curating_online_art_galleries_to_give_chances_for_smaller_artists_and_photographers_id = td_demo_content::add_post(array(
	'title' => 'Curating Online Art Galleries to Give Chances for Smaller Artists and Photographers',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_art_id,),
));

$post_td_post_the_future_of_robotics_ai_virtual_intelligence_an_interview_with_matthew_rue_id = td_demo_content::add_post(array(
	'title' => 'The Future of Robotics, AI, Virtual Intelligence, an Interview with Matthew Rue',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_tech_id,),
));

$post_td_post_getting_ahead_of_the_curve_with_the_new_steps_in_technology_software_id = td_demo_content::add_post(array(
	'title' => 'Getting Ahead of the Curve with the New Steps in Technology Software',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_tech_id,),
));

$post_td_post_affordable_handheld_smartphones_available_worldwide_from_the_biggest_brands_id = td_demo_content::add_post(array(
	'title' => 'Affordable Handheld Smartphones Available Worldwide from the Biggest Brands',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_tech_id,),
));

$post_td_post_here_are_the_top_5_best_noise_cancelling_headphones_for_unlimited_music_id = td_demo_content::add_post(array(
	'title' => 'Here are the Top 5 Best Noise Cancelling Headphones for Unlimited Music',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_tech_id,),
));

$post_td_post_testing_out_new_materials_for_the_arrival_of_a_next_generation_hardware_id = td_demo_content::add_post(array(
	'title' => 'Testing Out New Materials for the Arrival of a Next Generation Hardware',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_tech_id,),
));


/*  ---------------------------------------------------------------------------- 
	PRODUCTS
*/

/*  ---------------------------------------------------------------------------- 
	MENUS
*/
$menu_td_demo_header_menu_id = td_demo_menus::create_menu('td-demo-header-menu', ''); 


/*  ---------------------------------------------------------------------------- 
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_page(array(
	'title' => 'Homepage',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'page_id' => $page_homepage_id,
	'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_category(array(
	'title' => 'Local News',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_local_news_id,
	'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_category(array(
	'title' => 'Art',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_art_local_news_id,
	'parent_id' => $menu_item_1_id
));

$menu_item_3_id = td_demo_menus::add_category(array(
	'title' => 'Culture',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_culture_local_news_id,
	'parent_id' => $menu_item_1_id
));

$menu_item_4_id = td_demo_menus::add_category(array(
	'title' => 'Events',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_events_id,
	'parent_id' => $menu_item_1_id
));

$menu_item_5_id = td_demo_menus::add_category(array(
	'title' => 'Politics',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_politics_local_news_id,
	'parent_id' => $menu_item_1_id
));

$menu_item_6_id = td_demo_menus::add_mega_menu(array(
	'title' => 'Magazine',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_magazine_id,
	'parent_id' => ''
), true);

$menu_item_7_id = td_demo_menus::add_mega_menu(array(
	'title' => 'World News',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_world_news_id,
	'parent_id' => ''
), true);

$menu_item_8_id = td_demo_menus::add_mega_menu(array(
	'title' => 'More',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'page_id' => $page_main_menu_page_id,
	'parent_id' => ''
));


/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/
$template_search_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kattmar - Search Template',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_id);


$template_404_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kattmar - 404 Template',
	'file' => '404_cloud_template.txt',
	'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_id);


$template_date_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kattmar - Date Template',
	'file' => 'date_cloud_template.txt',
	'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_id);


$template_tag_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kattmar - Tag Template',
	'file' => 'tag_cloud_template.txt',
	'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_id);


$template_category_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kattmar - Category Template',
	'file' => 'cat_cloud_template.txt',
	'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_id);


$template_author_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kattmar - Author Template',
	'file' => 'author_cloud_template.txt',
	'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_id);


$template_single_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kattmar - Single Template',
	'file' => 'post_cloud_template.txt',
	'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_id);


$template_footer_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kattmar - Footer Template',
	'file' => 'footer_cloud_template.txt',
	'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_id);


$template_header_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kattmar - Header Template',
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
