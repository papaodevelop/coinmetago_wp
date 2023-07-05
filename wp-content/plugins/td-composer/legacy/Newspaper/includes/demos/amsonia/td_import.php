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
	'price' => '60',
	'months_in_cycle' => '12',
	'trial_days' => '0',
	'is_free' => '0',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"6662332eaa9eecd";}',
	)
);

$plan_monthly_plan_id = td_demo_subscription::add_plan( array(
	'name' => 'Monthly Plan',
	'price' => '5',
	'months_in_cycle' => '1',
	'trial_days' => '0',
	'is_free' => '0',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"5762332eaa9efde";}',
	)
);

$plan_free_plan_id = td_demo_subscription::add_plan( array(
	'name' => 'Free Plan',
	'price' => '',
	'months_in_cycle' => '',
	'trial_days' => '0',
	'is_free' => '1',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"6162332eaa9f077";}',
	)
);

$page_payment_page_id_id = td_demo_content::add_page(array(
	'title' => 'Checkout - amsonia',
	'file' => 'tds_checkout.txt',
));

td_demo_subscription::add_option( array(
	'name' => 'payment_page_id',
	'value' => $page_payment_page_id_id,
	)
);

$page_my_account_page_id_id = td_demo_content::add_page(array(
	'title' => 'My Account - amsonia',
	'file' => 'tds_my_account.txt',
));

td_demo_subscription::add_option( array(
	'name' => 'my_account_page_id',
	'value' => $page_my_account_page_id_id,
	)
);

$page_create_account_page_id_id = td_demo_content::add_page(array(
	'title' => 'Login/Register - amsonia',
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
    'description' => 'Fusce et cursus dui. Cras leo est, rutrum rhoncus tincidunt quis, sodales at libero. Vestibulum non sollicitudin ex. Morbi lacinia massa vitae sem volutpat, vitae pharetra leo convallis.',
    'background_td_pic_id' => '',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));


$cat_art_id = td_demo_category::add_category(array(
	'category_name' => 'Art',
	'parent_id' => $cat_news_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => 'Fusce et cursus dui. Cras leo est, rutrum rhoncus tincidunt quis, sodales at libero. Vestibulum non sollicitudin ex. Morbi lacinia massa vitae sem volutpat, vitae pharetra leo convallis.',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_culture_id = td_demo_category::add_category(array(
	'category_name' => 'Culture',
	'parent_id' => $cat_news_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => 'Fusce et cursus dui. Cras leo est, rutrum rhoncus tincidunt quis, sodales at libero. Vestibulum non sollicitudin ex. Morbi lacinia massa vitae sem volutpat, vitae pharetra leo convallis.',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_environment_id = td_demo_category::add_category(array(
	'category_name' => 'Environment',
	'parent_id' => $cat_news_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => 'Fusce et cursus dui. Cras leo est, rutrum rhoncus tincidunt quis, sodales at libero. Vestibulum non sollicitudin ex. Morbi lacinia massa vitae sem volutpat, vitae pharetra leo convallis.',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_music_id = td_demo_category::add_category(array(
	'category_name' => 'Music',
	'parent_id' => 0,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => 'Fusce et cursus dui. Cras leo est, rutrum rhoncus tincidunt quis, sodales at libero. Vestibulum non sollicitudin ex. Morbi lacinia massa vitae sem volutpat, vitae pharetra leo convallis.',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_politics_id = td_demo_category::add_category(array(
	'category_name' => 'Politics',
	'parent_id' => $cat_news_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => 'Fusce et cursus dui. Cras leo est, rutrum rhoncus tincidunt quis, sodales at libero. Vestibulum non sollicitudin ex. Morbi lacinia massa vitae sem volutpat, vitae pharetra leo convallis.',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_style_id = td_demo_category::add_category(array(
	'category_name' => 'Style',
	'parent_id' => 0,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => 'Fusce et cursus dui. Cras leo est, rutrum rhoncus tincidunt quis, sodales at libero. Vestibulum non sollicitudin ex. Morbi lacinia massa vitae sem volutpat, vitae pharetra leo convallis.',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_tech_id = td_demo_category::add_category(array(
	'category_name' => 'Tech',
	'parent_id' => 0,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => 'Fusce et cursus dui. Cras leo est, rutrum rhoncus tincidunt quis, sodales at libero. Vestibulum non sollicitudin ex. Morbi lacinia massa vitae sem volutpat, vitae pharetra leo convallis.',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_travel_id = td_demo_category::add_category(array(
	'category_name' => 'Travel',
	'parent_id' => $cat_news_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => 'Fusce et cursus dui. Cras leo est, rutrum rhoncus tincidunt quis, sodales at libero. Vestibulum non sollicitudin ex. Morbi lacinia massa vitae sem volutpat, vitae pharetra leo convallis.',
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
	'description' => 'Fusce et cursus dui. Cras leo est, rutrum rhoncus tincidunt quis, sodales at libero. Vestibulum non sollicitudin ex. Morbi lacinia massa vitae sem volutpat, vitae pharetra leo convallis.',
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
$page_tds_switching_plans_wizard_id = td_demo_content::add_page(array(
	'title' => 'Amsonia - Switching plans wizard',
	'file' => 'tds_switching_plans_wizard.txt',
	'demo_unique_id' => '462332eaacb401',
));

$page_amsonia_subscription_popup_id = td_demo_content::add_page(array(
	'title' => 'Amsonia - Subscription Popup',
	'file' => 'amsonia_subscription_popup.txt',
	'demo_unique_id' => '1962332eaacbed4',
));

$page_homepage_id = td_demo_content::add_page(array(
	'title' => 'Homepage',
	'file' => 'homepage.txt',
	'homepage' => true,
	'demo_unique_id' => '262332eaacd11b',
));

$page_amsonia_search_popup_id = td_demo_content::add_page(array(
	'title' => 'Amsonia - Search Popup',
	'file' => 'amsonia_search_popup.txt',
	'demo_unique_id' => '2362332eaacd80a',
));

$page_amsonia_header_menu_popup_id = td_demo_content::add_page(array(
	'title' => 'Amsonia - Header Menu Popup',
	'file' => 'amsonia_header_menu_popup.txt',
	'demo_unique_id' => '9662332eaacded2',
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
				'tds_title' => 'Unlock this content',
				'tds_message' => 'Get unlimited access to all the content across the website and instant emails whenever we post an update.',
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
				'tds_bg_color' => '#354792',
				'all_tds_border_color' => '#060e2f',
				'all_tds_shadow' => '40',
				'all_tds_shadow_color' => '#354792',
				'tds_title_color' => '#eaecf8',
				'tds_message_color' => '#eaecf8',
				'tds_submit_btn_text_color' => '#ffffff',
				'tds_submit_btn_text_color_h' => '#ffffff',
				'tds_submit_btn_bg_color' => '#366bd9',
				'tds_submit_btn_bg_color_h' => '#6d9af8',
				'tds_after_btn_text_color' => '#eaecf8',
				'tds_pp_checked_color' => '#ffffff',
				'tds_pp_check_bg' => '#6d9af8',
				'tds_pp_check_bg_f' => '#6d9af8',
				'tds_pp_check_border_color' => '#6d9af8',
				'tds_pp_check_border_color_f' => '#6d9af8',
				'tds_pp_msg_color' => '#eaecf8',
				'tds_pp_msg_links_color' => '#6d9af8',
				'tds_pp_msg_links_color_h' => '#ffffff',
				'tds_general_font_family' => '976',
				'tds_title_font_family' => '976',
				'tds_title_font_size' => '35',
				'tds_title_font_line_height' => '1.2',
				'tds_title_font_weight' => '700',
				'tds_message_font_family' => '976',
				'tds_message_font_size' => '16',
				'tds_message_font_weight' => '400',
				'tds_submit_btn_text_font_family' => '976',
				'tds_submit_btn_text_font_size' => '12',
				'tds_submit_btn_text_font_line_height' => '1.2',
				'tds_submit_btn_text_font_weight' => '400',
				'tds_submit_btn_text_font_transform' => 'uppercase',
				'tds_submit_btn_text_font_spacing' => '2',
				'tds_after_btn_text_font_family' => '976',
				'tds_pp_msg_font_family' => '976',
				'tds_pp_msg_font_size' => '14',
				'tds_pp_msg_font_line_height' => '1.4',
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

td_util::update_option('tds_demo_options', 'a:1:{s:5:"plans";a:3:{i:0;a:2:{s:9:"unique_id";s:15:"6662332eaa9eecd";s:4:"name";s:11:"Yearly Plan";}i:1;a:2:{s:9:"unique_id";s:15:"5762332eaa9efde";s:4:"name";s:12:"Monthly Plan";}i:2;a:2:{s:9:"unique_id";s:15:"6162332eaa9f077";s:4:"name";s:9:"Free Plan";}}}');


/*  ---------------------------------------------------------------------------- 
	SUBSCRIPTION - end phase 2
*/

/*  ---------------------------------------------------------------------------- 
	POSTS
*/
$post_td_post_creating_and_building_a_healthy_relationship_advice_and_what_to_look_for_id = td_demo_content::add_post(array(
	'title' => 'Creating and Building a Healthy Relationship: Advice and What to Look For',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_world_id,),
));

$post_td_post_the_new_gucci_dresses_modeled_by_andreea_martini_are_awe_inspiring_id = td_demo_content::add_post(array(
	'title' => 'The New Gucci Dresses Modeled by Andreea Martini are Awe-Inspiring',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_world_id,),
));

$post_td_post_waking_up_to_a_good_cup_of_coffee_is_one_of_the_most_desired_morning_routines_id = td_demo_content::add_post(array(
	'title' => 'Waking up to a Good Cup of Coffee is one of the most Desired Morning Routines',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_world_id,),
));

$post_td_post_a_perfect_ambient_between_nature_and_health_exercising_at_the_beach_id = td_demo_content::add_post(array(
	'title' => 'A Perfect Ambient between Nature and Health: Exercising at the Beach',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_world_id,),
));

$post_td_post_cooking_at_home_with_your_partner_has_shown_to_increase_happiness_and_let_you_both_bond_id = td_demo_content::add_post(array(
	'title' => 'Cooking at Home with your Partner has Shown to Increase Happiness and Let you Both Bond',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_world_id,),
));

$post_td_post_why_paying_by_card_has_shown_a_decrease_in_exposure_to_bacteria_and_viruses_id = td_demo_content::add_post(array(
	'title' => 'Why Paying by Card has Shown a Decrease in Exposure to Bacteria and Viruses',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_world_id,),
));

$post_td_post_gaslightning_and_domestic_abuse_causes_signs_symptoms_and_how_to_get_out_id = td_demo_content::add_post(array(
	'title' => 'Gaslightning and Domestic Abuse: Causes, Signs, Symptoms and how to Get out',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_world_id,),
));

$post_td_post_most_popular_cocktails_based_on_states_and_countries_a_cohesive_list_id = td_demo_content::add_post(array(
	'title' => 'Most Popular Cocktails Based on States and Countries, a Cohesive List',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_world_id,),
));

$post_td_post_wearing_masks_to_protect_kids_when_they_go_to_school_has_become_a_law_id = td_demo_content::add_post(array(
	'title' => 'Wearing Masks to Protect Kids when they Go to School has become a Law',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_world_id,),
));

$post_td_post_camaraderie_is_built_upon_spending_quality_time_together_as_a_cohesive_team_id = td_demo_content::add_post(array(
	'title' => 'Camaraderie is Built Upon Spending Quality Time Together as a Cohesive Team',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_world_id,),
));

$post_td_post_feelin_punk_rock_we_got_you_with_this_skate_playlist_that_you_can_jam_to_id = td_demo_content::add_post(array(
	'title' => 'Feelin\' Punk Rock? We Got you with this Skate Playlist that you can Jam to',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_top_20_new_and_upcoming_artists_this_week_and_their_most_popular_catchiest_songs_id = td_demo_content::add_post(array(
	'title' => 'Top 20 New and Upcoming Artists this Week and Their Most Popular, Catchiest Songs',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_what_are_your_favorite_girl_band_songs_from_the_90s_heres_a_playlist_of_ours_id = td_demo_content::add_post(array(
	'title' => 'What are your Favorite Girl Band Songs from the 90s? Here\'s a Playlist of Ours',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_here_are_our_10_go_to_songs_for_exercise_and_fitness_activities_in_the_great_outdoors_id = td_demo_content::add_post(array(
	'title' => 'Here are Our 10 Go to Songs for Exercise and Fitness Activities in the Great Outdoors',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_enjoying_karaoke_night_by_yourself_and_hyping_yourself_up_to_get_on_that_stage_id = td_demo_content::add_post(array(
	'title' => 'Enjoying Karaoke Night by Yourself and Hyping Yourself up to Get on that Stage',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_combating_stock_market_problems_by_going_to_the_direct_source_and_providing_new_jobs_id = td_demo_content::add_post(array(
	'title' => 'Combating Stock Market Problems By Going to the Direct Source and Providing New Jobs',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_tech_id,),
));

$post_td_post_modern_problems_require_modern_solutions_taking_care_of_work_and_your_kid_at_the_same_time_id = td_demo_content::add_post(array(
	'title' => 'Modern Problems Require Modern Solutions: Taking Care of Work and your Kid at the Same Time',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_tech_id,),
));

$post_td_post_the_newest_gadgets_to_make_waves_in_the_digital_marketplace_of_quarter_3_of_2022_id = td_demo_content::add_post(array(
	'title' => 'The Newest Gadgets to Make Waves in the Digital Marketplace of Quarter 3 of 2022',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_tech_id,),
));

$post_td_post_pets_in_the_office_place_have_been_designated_as_a_way_to_improve_effiency_at_work_id = td_demo_content::add_post(array(
	'title' => 'Pets in the Office Place Have Been Designated as a Way to Improve Effiency at Work',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_tech_id,),
));

$post_td_post_how_coffee_has_become_the_go_to_for_anyone_working_in_the_it_domain_across_the_globe_id = td_demo_content::add_post(array(
	'title' => 'How Coffee Has Become the Go-To for anyone Working in the IT Domain Across the Globe',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_tech_id,),
));

$post_td_post_adventuring_into_an_unknown_city_with_claire_pascale_to_showcase_the_latest_fashions_id = td_demo_content::add_post(array(
	'title' => 'Adventuring into an Unknown City with Claire Pascale to Showcase the Latest Fashions',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_style_id,),
));

$post_td_post_90s_fashion_makes_a_comeback_find_the_newest_trends_that_are_causing_a_scene_in_2022_id = td_demo_content::add_post(array(
	'title' => '90s Fashion Makes a Comeback, Find the Newest Trends that are Causing a Scene in 2022',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_style_id,),
));

$post_td_post_skateboarding_as_a_past_time_and_an_activity_is_now_at_an_all_time_high_id = td_demo_content::add_post(array(
	'title' => 'Skateboarding as a Past Time and an Activity is Now at an All Time High',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_style_id,),
));

$post_td_post_love_in_bloom_rupert_and_lavinia_lerote_as_they_embark_on_their_honeymoon_id = td_demo_content::add_post(array(
	'title' => 'Love in Bloom: Rupert and Lavinia Lerote as they Embark on Their Honeymoon',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_style_id,),
));

$post_td_post_makeup_tips_and_fashion_tricks_daniela_roberts_teaches_us_whats_new_id = td_demo_content::add_post(array(
	'title' => 'Makeup Tips and Fashion Tricks: Daniela Roberts Teaches us What\'s New',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_style_id,),
));

$post_td_post_is_instagram_the_way_to_success_straight_from_the_mouth_of_an_influencer_id = td_demo_content::add_post(array(
	'title' => 'Is Instagram the Way to Success? Straight from the Mouth of an Influencer',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_culture_id,),
));

$post_td_post_red_is_the_color_of_confidence_and_motivation_says_emilia_blank_in_vogue_magazine_id = td_demo_content::add_post(array(
	'title' => 'Red is the Color of Confidence and Motivation Says Emilia Blank in Vogue Magazine',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_culture_id,),
));

$post_td_post_how_yoga_has_changed_throughout_the_past_decade_list_of_poses_and_stretching_id = td_demo_content::add_post(array(
	'title' => 'How Yoga Has Changed Throughout the Past Decade List of Poses and Stretching',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_culture_id,),
));

$post_td_post_fighting_for_what_you_believe_in_is_a_booming_sign_of_strength_and_integrity_id = td_demo_content::add_post(array(
	'title' => 'Fighting for What You Believe in is a Booming Sign of Strength and Integrity',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_culture_id,),
));

$post_td_post_how_emma_russo_became_the_first_actress_to_own_a_pet_raven_that_can_talk_id = td_demo_content::add_post(array(
	'title' => 'How Emma Russo became the First Actress to Own a Pet Raven that can Talk',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_culture_id,),
));

$post_td_post_protesting_the_injustice_in_the_local_community_or_even_throughout_the_entire_country_id = td_demo_content::add_post(array(
	'title' => 'Protesting the Injustice in the Local Community or Even throughout the Entire Country',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_register_to_vote_online_and_let_your_voice_and_opinion_be_heard_for_your_nation_id = td_demo_content::add_post(array(
	'title' => 'Register to Vote Online and Let Your Voice and Opinion Be Heard for Your Nation',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_corrupted_politicians_should_be_punished_according_to_the_committed_crimes_id = td_demo_content::add_post(array(
	'title' => 'Corrupted Politicians Should be Punished According to the Committed Crimes',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_public_congregations_and_gathering_changes_and_rules_regarding_the_worldwide_pandemic_id = td_demo_content::add_post(array(
	'title' => 'Public Congregations and Gathering: Changes and Rules Regarding the Worldwide Pandemic',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_is_justice_truly_blind_a_retrospective_look_into_the_case_of_uma_roberts_v_paul_mcgunn_id = td_demo_content::add_post(array(
	'title' => 'Is Justice Truly Blind? A Retrospective Look into the Case of Uma Roberts v Paul McGunn',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_taking_a_trip_to_the_beach_to_pick_trash_and_make_sure_to_leave_it_cleaner_id = td_demo_content::add_post(array(
	'title' => 'Taking a Trip to the Beach to Pick Trash and Make Sure to Leave it Cleaner',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_environment_id,),
));

$post_td_post_the_wonders_of_having_a_backyard_that_looks_out_into_a_nearby_forest_id = td_demo_content::add_post(array(
	'title' => 'The Wonders of Having a Backyard that Looks out into a Nearby Forest',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_environment_id,),
));

$post_td_post_having_fun_and_cooking_with_locally_grown_ingredients_to_support_farmers_id = td_demo_content::add_post(array(
	'title' => 'Having Fun and Cooking with Locally Grown Ingredients to Support Farmers',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_environment_id,),
));

$post_td_post_contributing_to_a_brighter_future_by_volunterring_for_environmental_societies_id = td_demo_content::add_post(array(
	'title' => 'Contributing to a Brighter Future by Volunterring For Environmental Societies',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_environment_id,),
));

$post_td_post_how_multi_faceted_factories_and_distribution_centers_actually_endanger_the_planet_id = td_demo_content::add_post(array(
	'title' => 'How Multi-Faceted Factories and Distribution Centers Actually Endanger the Planet',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_environment_id,),
));

$post_td_post_visiting_the_islands_as_a_summer_vacation_where_to_go_what_do_do_and_best_hotels_id = td_demo_content::add_post(array(
	'title' => 'Visiting the Islands as a Summer Vacation: Where to Go, What do Do and Best Hotels',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_a_photo_book_with_andreea_martini_following_her_trip_from_one_side_of_the_us_to_the_other_id = td_demo_content::add_post(array(
	'title' => 'A Photo Book with Andreea Martini Following her Trip from one Side of the US to the Other',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_here_are_5_of_the_most_visited_places_across_the_globe_in_the_past_10_years_id = td_demo_content::add_post(array(
	'title' => 'Here are 5 of the Most Visited Places across the Globe in the Past 10 Years',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_discovering_a_different_side_of_la_by_going_to_the_beach_and_enjoying_some_sun_id = td_demo_content::add_post(array(
	'title' => 'Discovering a Different Side of LA by going to the Beach and Enjoying some Sun',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_hitchhiking_from_one_side_of_the_country_to_the_other_while_on_a_tight_schedule_id = td_demo_content::add_post(array(
	'title' => 'Hitchhiking from one Side of the Country to the Other while on a Tight Schedule',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_creating_a_personalized_wardrobe_that_fits_your_moods_and_personality_id = td_demo_content::add_post(array(
	'title' => 'Creating a Personalized Wardrobe that Fits your Moods and Personality',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_art_id,),
));

$post_td_post_video_games_as_a_means_of_art_the_5_most_aesthetic_games_to_come_out_in_the_last_decade_id = td_demo_content::add_post(array(
	'title' => 'Video Games as a Means of Art - The 5 Most Aesthetic Games to Come out in the Last Decade',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_art_id,),
));

$post_td_post_how_bookeh_became_a_staple_in_photography_globally_starting_with_the_2010s_id = td_demo_content::add_post(array(
	'title' => 'How Bookeh Became a Staple in Photography Globally Starting with the 2010s',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_art_id,),
));

$post_td_post_digital_medium_for_art_how_and_why_you_should_support_your_favorite_artists_id = td_demo_content::add_post(array(
	'title' => 'Digital Medium for Art? How and Why you should Support your Favorite Artists',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_art_id,),
));

$post_td_post_creating_an_online_menu_using_only_fresh_ingredients_to_satiate_the_summer_heat_id = td_demo_content::add_post(array(
	'title' => 'Creating an Online Menu Using only Fresh Ingredients to Satiate the Summer Heat',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_art_id,),
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

$menu_item_1_id = td_demo_menus::add_mega_menu(array(
	'title' => 'News',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_news_id,
	'parent_id' => ''
), true);

$menu_item_2_id = td_demo_menus::add_category(array(
	'title' => 'Music',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_music_id,
	'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_category(array(
	'title' => 'Style',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_style_id,
	'parent_id' => $menu_item_2_id
));

$menu_item_4_id = td_demo_menus::add_category(array(
	'title' => 'Tech',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_tech_id,
	'parent_id' => $menu_item_2_id
));

$menu_item_5_id = td_demo_menus::add_mega_menu(array(
	'title' => 'World',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_world_id,
	'parent_id' => ''
), true);


/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/
$template_date_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Amsonia - Date Template',
	'file' => 'date_cloud_template.txt',
	'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_id);


$template_search_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Amsonia - Search Template',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_id);


$template_404_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Amsonia - 404 Template',
	'file' => '404_cloud_template.txt',
	'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_id);


$template_author_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Amsonia - Author Template',
	'file' => 'author_cloud_template.txt',
	'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_id);


$template_tag_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Amsonia - Tag Template',
	'file' => 'tag_cloud_template.txt',
	'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_id);


$template_category_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Amsonia - Category Template',
	'file' => 'cat_cloud_template.txt',
	'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_id);


$template_single_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Amsonia - Single Template',
	'file' => 'post_cloud_template.txt',
	'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_id);


$template_footer_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Amsonia - Footer Template',
	'file' => 'footer_cloud_template.txt',
	'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_id);


$template_header_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Amsonia - Header Template',
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
