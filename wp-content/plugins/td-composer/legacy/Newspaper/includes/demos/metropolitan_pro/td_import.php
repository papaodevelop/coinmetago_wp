<?php 



/*  ---------------------------------------------------------------------------- 
	SUBSCRIPTION - start phase 1
*/
	update_option('users_can_register', true);
global $wpdb;
$disable_wizard = $wpdb->get_var( "SELECT value FROM tds_options WHERE name = 'disable_wizard'");
if ( empty($disable_wizard)) {

td_demo_subscription::add_account_details( array(
	'company_name' => 'Metropolitan PRO',
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



$plan_monthly_plan_id = td_demo_subscription::add_plan( array(
	'name' => 'Monthly Plan',
	'price' => '10',
	'months_in_cycle' => '1',
	'trial_days' => '0',
	'is_free' => '0',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"8661b763881264e";}',
	)
);

$plan_yearly_plan_id = td_demo_subscription::add_plan( array(
	'name' => 'Yearly Plan',
	'price' => '100',
	'months_in_cycle' => '12',
	'trial_days' => '0',
	'is_free' => '0',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"2461b7638815318";}',
	)
);

$plan_free_plan_id = td_demo_subscription::add_plan( array(
	'name' => 'Free Plan',
	'price' => '',
	'months_in_cycle' => '',
	'trial_days' => '0',
	'is_free' => '1',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"4861b7638817a37";}',
	)
);

$plan_trial_plan_id = td_demo_subscription::add_plan( array(
	'name' => 'Trial Plan',
	'price' => '',
	'months_in_cycle' => '',
	'trial_days' => '',
	'is_free' => '1',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"5661b7638819fa7";}',
	)
);

$plan_weekly_plan_id = td_demo_subscription::add_plan( array(
	'name' => 'Weekly Plan',
	'price' => '5',
	'months_in_cycle' => '',
	'trial_days' => '',
	'is_free' => '0',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"4361b763881c76c";}',
	)
);

$plan_one_time_id = td_demo_subscription::add_plan( array(
	'name' => 'One Time',
	'price' => '4',
	'months_in_cycle' => '',
	'trial_days' => '',
	'is_free' => '0',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"4961b763881f146";}',
	)
);

$page_payment_page_id_id = td_demo_content::add_page(array(
	'title' => 'Checkout - metropolitan_pro',
	'file' => 'tds_checkout.txt',
));

td_demo_subscription::add_option( array(
	'name' => 'payment_page_id',
	'value' => $page_payment_page_id_id,
	)
);

$page_my_account_page_id_id = td_demo_content::add_page(array(
	'title' => 'My Account - metropolitan_pro',
	'file' => 'tds_my_account.txt',
));

td_demo_subscription::add_option( array(
	'name' => 'my_account_page_id',
	'value' => $page_my_account_page_id_id,
	)
);

$page_create_account_page_id_id = td_demo_content::add_page(array(
	'title' => 'Login/Register - metropolitan_pro',
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
$cat_beauty_id = td_demo_category::add_category(array(
	'category_name' => 'Beauty',
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

$cat_celebs_id = td_demo_category::add_category(array(
	'category_name' => 'Celebs',
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

$cat_discover_id = td_demo_category::add_category(array(
	'category_name' => 'Discover',
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

$cat_entertainment_id = td_demo_category::add_category(array(
	'category_name' => 'Entertainment',
	'parent_id' => $cat_discover_id,
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

$cat_food_id = td_demo_category::add_category(array(
	'category_name' => 'Food',
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

$cat_gadgets_id = td_demo_category::add_category(array(
	'category_name' => 'Gadgets',
	'parent_id' => $cat_discover_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_hot_id = td_demo_category::add_category(array(
	'category_name' => 'Hot',
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

$cat_lifestyle_id = td_demo_category::add_category(array(
	'category_name' => 'Lifestyle',
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

$cat_make_up_id = td_demo_category::add_category(array(
	'category_name' => 'Make-up',
	'parent_id' => $cat_lifestyle_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_music_id = td_demo_category::add_category(array(
	'category_name' => 'Music',
	'parent_id' => $cat_discover_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_social_networks_id = td_demo_category::add_category(array(
	'category_name' => 'Social Networks',
	'parent_id' => $cat_discover_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_style_id = td_demo_category::add_category(array(
	'category_name' => 'Style',
	'parent_id' => $cat_lifestyle_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_technology_id = td_demo_category::add_category(array(
	'category_name' => 'Technology',
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


/*  ---------------------------------------------------------------------------- 
	ATTACHMENTS
*/

/*  ---------------------------------------------------------------------------- 
	PAGES
*/
$page_tds_switching_plans_wizard_id = td_demo_content::add_page(array(
	'title' => 'Switching plans wizard',
	'file' => 'tds_switching_plans_wizard.txt',
    'demo_unique_id' => '7961d6d7003fed1',
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
				'tds_title' => 'This Content is for Subscribers Only',
				'tds_message' => 'To unlock this article, please SUBSCRIBE NOW!',
				'tds_submit_btn_text' => 'Yes, I want exclusive content!',
				'tds_pp_msg' => 'I consent to processing of my data according to <a href=\"#\">Terms of Use</a> & <a href=\"#\">Privacy Policy</a>',
			),
	'tds_payable' => 'paid_subscription',
	'tds_paid_subs_page_id' => $page_tds_switching_plans_wizard_id,
	'tds_paid_subs_plan_ids' => [$plan_monthly_plan_id,$plan_yearly_plan_id,$plan_free_plan_id],
			'tds_locker_styles' => array(
				'tds_bg_color' => '#ffffff',
				'all_tds_shadow' => '20',
				'all_tds_shadow_color' => '#e0e0e0',
				'tds_message_color' => '#000000',
				'tds_submit_btn_text_color' => '#ffffff',
				'tds_submit_btn_text_color_h' => '#ffffff',
				'tds_submit_btn_bg_color' => '#40ce9f',
				'tds_submit_btn_bg_color_h' => '#2386dd',
				'tds_after_btn_text_color' => '#000000',
				'tds_pp_msg_color' => '#000000',
				'tds_pp_msg_links_color' => '#236fe0',
				'tds_pp_msg_links_color_h' => '#279ef9',
				'tds_general_font_family' => '394',
				'tds_title_font_family' => '467',
				'tds_title_font_size' => '28',
				'tds_title_font_weight' => '400',
				'tds_title_font_spacing' => '-1',
				'tds_message_font_size' => '16',
				'tds_message_font_weight' => '600',
				'tds_submit_btn_text_font_size' => '12',
				'tds_submit_btn_text_font_weight' => '600',
				'tds_submit_btn_text_font_transform' => 'uppercase',
				'tds_submit_btn_text_font_spacing' => '1',
				'tds_after_btn_text_font_size' => '12',
				'tds_after_btn_text_font_weight' => '600',
				'tds_pp_msg_font_size' => '12',
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

td_util::update_option('tds_demo_options', 'a:1:{s:5:"plans";a:6:{i:0;a:2:{s:9:"unique_id";s:15:"8661b763881264e";s:4:"name";s:12:"Monthly Plan";}i:1;a:2:{s:9:"unique_id";s:15:"2461b7638815318";s:4:"name";s:11:"Yearly Plan";}i:2;a:2:{s:9:"unique_id";s:15:"4861b7638817a37";s:4:"name";s:9:"Free Plan";}i:3;a:2:{s:9:"unique_id";s:15:"5661b7638819fa7";s:4:"name";s:10:"Trial Plan";}i:4;a:2:{s:9:"unique_id";s:15:"4361b763881c76c";s:4:"name";s:11:"Weekly Plan";}i:5;a:2:{s:9:"unique_id";s:15:"4961b763881f146";s:4:"name";s:8:"One Time";}}}');


/*  ---------------------------------------------------------------------------- 
	SUBSCRIPTION - end phase 2
*/

/*  ---------------------------------------------------------------------------- 
	POSTS
*/

$post_td_post_small_yacht_market_affected_by_the_fulminant_slashed_investments_id = td_demo_content::add_post(array(
    'title' => 'Small Yacht Market Affected by the Fulminant Slashed Investments',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_beauty_id,$cat_celebs_id,$cat_entertainment_id,$cat_food_id,$cat_gadgets_id,$cat_hot_id,$cat_make_up_id,$cat_music_id,$cat_social_networks_id,$cat_style_id,$cat_technology_id,$cat_travel_id,),
));

$post_td_post_watch_awesome_kate_manner_go_full_dancing_pro_in_england_this_week_id = td_demo_content::add_post(array(
    'title' => 'Watch Awesome Kate Manner Go Full Dancing Pro in England this Week',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_beauty_id,$cat_celebs_id,$cat_entertainment_id,$cat_food_id,$cat_gadgets_id,$cat_hot_id,$cat_make_up_id,$cat_music_id,$cat_social_networks_id,$cat_style_id,$cat_technology_id,$cat_travel_id,),
));

$post_td_post_the_next_babe_photos_will_have_astonishing_impact_for_any_campaign_id = td_demo_content::add_post(array(
    'title' => 'The Next Babe Photos Will Have Astonishing Impact for Any Campaign',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_beauty_id,$cat_celebs_id,$cat_entertainment_id,$cat_food_id,$cat_gadgets_id,$cat_hot_id,$cat_make_up_id,$cat_music_id,$cat_social_networks_id,$cat_style_id,$cat_technology_id,$cat_travel_id,),
));

$post_td_post_the_weirdest_places_ashes_have_been_scattered_in_south_america_id = td_demo_content::add_post(array(
    'title' => 'The Weirdest Places Ashes Have Been Scattered in South America',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_beauty_id,$cat_celebs_id,$cat_entertainment_id,$cat_food_id,$cat_gadgets_id,$cat_hot_id,$cat_make_up_id,$cat_music_id,$cat_social_networks_id,$cat_style_id,$cat_technology_id,$cat_travel_id,),
));

$post_td_post_the_travel_insurance_catch_that_can_double_your_cover_in_two_months_id = td_demo_content::add_post(array(
    'title' => 'The Travel Insurance Catch that can Double Your Cover in Two Months',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_beauty_id,$cat_celebs_id,$cat_entertainment_id,$cat_food_id,$cat_gadgets_id,$cat_hot_id,$cat_make_up_id,$cat_music_id,$cat_social_networks_id,$cat_style_id,$cat_technology_id,$cat_travel_id,),
));

$post_td_post_the_hottest_wearable_tech_and_smart_gadgets_of_2021_will_blow_your_mind_id = td_demo_content::add_post(array(
	'title' => 'The Hottest Wearable Tech and Smart Gadgets of 2021 Will Blow Your Mind',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_technology_id,),
));

$post_td_post_new_technology_will_help_keep_your_smart_home_from_becoming_obsolete_id = td_demo_content::add_post(array(
	'title' => 'New Technology Will Help Keep Your Smart Home from Becoming Obsolete',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_technology_id,),
));

$post_td_post_apple_computers_climb_the_list_of_the_top_gadgets_in_forbes_magazine_id = td_demo_content::add_post(array(
	'title' => 'Apple Computers Climb the List of the Top Gadgets in Forbes Magazine',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_technology_id,),
));

$post_td_post_new_soundboard_from_bose_review_pricing_is_not_always_the_only_criteria_id = td_demo_content::add_post(array(
	'title' => 'New Soundboard from Bose Review: Pricing is Not Always the Only Criteria',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_technology_id,),
));

$post_td_post_discover_the_newest_waterproof_and_rugged_smartphones_that_come_on_sale_id = td_demo_content::add_post(array(
	'title' => 'Discover the Newest Waterproof and Rugged Smartphones that Come on Sale',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_technology_id,),
));

$post_td_post_this_week_in_houston_food_blogs_high_protein_recipes_and_low_fat_shakes_id = td_demo_content::add_post(array(
	'title' => 'This Week in Houston Food Blogs: High-Protein Recipes and Low Fat Shakes',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_food_id,),
));

$post_td_post_easy_food_survey_fruits_voted_as_one_of_the_most_satisfying_meals_id = td_demo_content::add_post(array(
	'title' => 'Easy Food Survey: Fruits Voted As One of the Most Satisfying Meals',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_food_id,),
));

$post_td_post_moroccan_salmon_with_garlic_mayonnaise_is_common_in_southern_spain_id = td_demo_content::add_post(array(
	'title' => 'Moroccan Salmon with Garlic Mayonnaise is Common in Southern Spain',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_food_id,),
));

$post_td_post_best_places_to_get_your_mexican_food_fix_when_you_visit_mexico_city_id = td_demo_content::add_post(array(
	'title' => 'Best Places to Get Your Mexican Food Fix When You Visit Mexico City',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_food_id,),
));

$post_td_post_the_best_pork_kebabs_with_grilled_plums_and_couscous_is_found_in_poland_id = td_demo_content::add_post(array(
	'title' => 'The Best Pork Kebabs With Grilled Plums and Couscous is Found in Poland',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_food_id,),
));

$post_td_post_10_things_you_should_know_before_you_visit_south_americas_jungles_id = td_demo_content::add_post(array(
	'title' => '10 Things You Should Know Before You Visit South America\'s Jungles',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_ultimate_guide_to_viennas_coffee_renaissance_packed_in_one_weekend_id = td_demo_content::add_post(array(
	'title' => 'Ultimate Guide to Vienna’s Coffee Renaissance Packed in One Weekend',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_venice_is_passing_1_million_visitors_every_month_since_2014_id = td_demo_content::add_post(array(
	'title' => 'Venice is Passing 1 Million Visitors Every Month Since 2014',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_vacation_bucket_list_the_top_10_trips_of_a_lifetime_you_should_take_id = td_demo_content::add_post(array(
	'title' => 'Vacation Bucket List: The Top 10 Trips of a Lifetime You Should Take',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_the_25_best_cities_you_can_find_to_satisfy_the_love_for_burgers_id = td_demo_content::add_post(array(
	'title' => 'The 25 Best Cities You Can Find to Satisfy the Love for Burgers',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_kristen_stewart_visits_the_toronto_film_festival_with_new_boyfriend_id = td_demo_content::add_post(array(
	'title' => 'Kristen Stewart Visits the Toronto Film Festival with New Boyfriend',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_celebs_id,),
));

$post_td_post_celebrity_make_up_artist_gary_meyers_shows_you_his_beauty_tricks_id = td_demo_content::add_post(array(
	'title' => 'Celebrity Make-up Artist Gary Meyers Shows you His Beauty Tricks',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_celebs_id,),
));

$post_td_post_the_biggest_hollywood_celebrities_visit_the_ranches_of_california_id = td_demo_content::add_post(array(
	'title' => 'The Biggest Hollywood Celebrities Visit the Ranches of California',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_celebs_id,),
));

$post_td_post_the_most_popular_celebrity_name_list_of_the_millennium_is_here_id = td_demo_content::add_post(array(
	'title' => 'The Most Popular Celebrity Name List of the Millennium is Here',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_celebs_id,),
));

$post_td_post_fashion_finder_biggest_shows_parties_and_celebrity_for_new_years_id = td_demo_content::add_post(array(
	'title' => 'Fashion Finder: Biggest Shows, Parties and Celebrity for New Years',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_celebs_id,),
));

$post_td_post_5_most_affordable_and_fun_concert_venues_to_try_this_fall_id = td_demo_content::add_post(array(
	'title' => '5 Most Affordable and Fun Concert Venues to Try This Fall',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_hot_id,),
));

$post_td_post_unique_wedding_ride_ideas_to_inspire_and_boost_creativity_id = td_demo_content::add_post(array(
	'title' => 'Unique Wedding Ride Ideas to Inspire and Boost Creativity',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_hot_id,),
));

$post_td_post_the_most_amazing_accessories_to_buy_your_girlfriend_this_fall_id = td_demo_content::add_post(array(
	'title' => 'The Most Amazing Accessories to Buy Your Girlfriend This Fall',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_hot_id,),
));

$post_td_post_the_hottest_modern_accessories_for_a_stunning_look_this_summer_id = td_demo_content::add_post(array(
	'title' => 'The Hottest Modern Accessories for a Stunning Look this Summer',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_hot_id,),
));

$post_td_post_the_best_ways_to_naturally_show_off_your_gorgeous_worked_body_id = td_demo_content::add_post(array(
	'title' => 'The Best Ways to Naturally Show Off your Gorgeous Worked Body',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_hot_id,),
));

$post_td_post_take_a_stroll_through_the_pros_and_cons_of_permanent_eyebrows_tattoos_id = td_demo_content::add_post(array(
	'title' => 'Take a Stroll Through the Pros and Cons of Permanent Eyebrows Tattoos',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_make_up_id,),
));

$post_td_post_10_cool_startups_that_will_change_your_perspective_on_clothes_fashion_id = td_demo_content::add_post(array(
	'title' => '10 Cool Startups that Will Change Your Perspective on Clothes & Fashion',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_make_up_id,),
));

$post_td_post_10_outfits_inspired_by_famous_works_of_art_are_auctioned_in_london_id = td_demo_content::add_post(array(
	'title' => '10 Outfits Inspired by Famous Works of Art are Auctioned in London',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_make_up_id,),
));

$post_td_post_the_make_up_conference_in_new_york_this_winter_unveils_hot_innovations_id = td_demo_content::add_post(array(
	'title' => 'The Make-up Conference in New York this Winter Unveils Hot Innovations',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_make_up_id,),
));

$post_td_post_instagram_outfit_ideas_to_try_inspirational_influencers_to_follow_id = td_demo_content::add_post(array(
	'title' => 'Instagram Outfit Ideas to Try: Inspirational Influencers to Follow',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_style_id,),
));

$post_td_post_cover_girl_announces_star_shine_makeup_line_is_due_for_next_december_id = td_demo_content::add_post(array(
	'title' => 'Cover Girl Announces Star Shine Makeup Line is Due for Next December',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_make_up_id,),
));

$post_td_post_expert_advice_the_best_cheap_retro_chic_fashion_for_this_fall_id = td_demo_content::add_post(array(
	'title' => 'Expert Advice: The Best Cheap Retro Chic Fashion for this Fall',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_style_id,),
));

$post_td_post_style_spy_fashion_model_goes_casual_in_distinct_and_original_way_id = td_demo_content::add_post(array(
	'title' => 'Style Spy: Fashion Model Goes Casual in Distinct and Original Way',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_style_id,),
));

$post_td_post_what_snikers_to_wear_daily_no_matter_what_youve_got_planned_id = td_demo_content::add_post(array(
	'title' => 'What Snikers to Wear Daily, No Matter What You\'ve Got Planned',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_style_id,),
));

$post_td_post_hms_family_photoshoot_summer_campaign_is_the_sweetest_thing_weve_seen_id = td_demo_content::add_post(array(
	'title' => 'H&M’s Family Photoshoot Summer Campaign is the Sweetest Thing We’ve Seen',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_beauty_id,),
));

$post_td_post_get_inside_a_fashion_bloggers_fancy_lifestyle_and_be_amazed_id = td_demo_content::add_post(array(
	'title' => 'Get Inside a Fashion Blogger\'s Fancy Lifestyle and Be Amazed',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_style_id,),
));

$post_td_post_alexa_wallace_doesnt_like_to_play_by_the_standard_red_carpet_rules_id = td_demo_content::add_post(array(
	'title' => 'Alexa Wallace Doesn’t Like to Play by the Standard Red Carpet Rules',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_beauty_id,),
));

$post_td_post_discover_5_travel_outfits_that_are_comfortable_and_also_very_chic_id = td_demo_content::add_post(array(
	'title' => 'Discover 5 Travel Outfits That Are Comfortable and Also Very Chic',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_beauty_id,),
));

$post_td_post_15_of_the_most_popular_make_up_products_with_inlcuded_video_tutorials_id = td_demo_content::add_post(array(
	'title' => '15 of the Most Popular Make Up Products with Inlcuded Video Tutorials',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_beauty_id,),
));

$post_td_post_10_affordable_outfits_for_the_cold_season_presented_by_mia_joanne_id = td_demo_content::add_post(array(
	'title' => '10 Affordable Outfits for the Cold Season Presented by Mia & Joanne',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_beauty_id,),
));

$post_td_post_android_gadget_review_little_improvements_make_a_big_difference_id = td_demo_content::add_post(array(
	'title' => 'Android Gadget Review: Little Improvements Make a Big Difference',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_gadgets_id,),
));

$post_td_post_snapdragon_super_chip_mounted_on_the_latest_dslr_photo_cameras_id = td_demo_content::add_post(array(
	'title' => 'Snapdragon Super Chip Mounted on the Latest DSLR Photo Cameras',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_gadgets_id,),
));

$post_td_post_this_new_holographic_computer_gives_tactile_feedback_in_mid_air_id = td_demo_content::add_post(array(
	'title' => 'This New Holographic Computer Gives Tactile Feedback in Mid-Air',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'tds_locker' => '5',
	'categories_id_array' => array($cat_gadgets_id,),
));

$post_td_post_in_ear_computer_filters_noise_to_make_you_a_better_listener_id = td_demo_content::add_post(array(
	'title' => 'In-Ear Computer Filters Noise to Make You a Better Listener',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_gadgets_id,),
));

$post_td_post_our_favourite_celebrity_power_girl_is_ready_to_surprise_again_id = td_demo_content::add_post(array(
	'title' => 'Our Favourite Celebrity Power Girl is Ready to Surprise Again',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_social_networks_id,),
));

$post_td_post_a_breakthough_for_this_year_new_holiday_birds_eye_view_debuting_id = td_demo_content::add_post(array(
	'title' => 'A Breakthough for This Year: New Holiday Birds-Eye View Debuting',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_gadgets_id,),
));

$post_td_post_will_amys_partying_finally_catch_up_with_her_as_she_turns_40_id = td_demo_content::add_post(array(
	'title' => 'Will Amy\'s Partying Finally Catch up with Her as She Turns 40?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_social_networks_id,),
));

$post_td_post_striking_photos_of_gorgeous_women_from_all_around_the_world_id = td_demo_content::add_post(array(
	'title' => 'Striking Photos of Gorgeous Women From All Around the World',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_social_networks_id,),
));

$post_td_post_stay_inspired_top_photo_artists_reveal_how_they_find_their_muses_id = td_demo_content::add_post(array(
	'title' => 'Stay Inspired: Top Photo Artists Reveal How They Find their Muses',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_social_networks_id,),
));

$post_td_post_check_out_the_best_entertainment_venues_that_will_open_next_year_id = td_demo_content::add_post(array(
	'title' => 'Check out The Best Entertainment Venues that Will Open Next Year',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_entertainment_id,),
));

$post_td_post_5_high_powered_men_are_ready_to_share_their_secrets_for_success_id = td_demo_content::add_post(array(
	'title' => '5 High-Powered Men Are Ready to Share their Secrets for Success',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_social_networks_id,),
));

$post_td_post_vloggers_reveal_a_new_way_to_take_better_liked_videos_for_instagram_tv_id = td_demo_content::add_post(array(
	'title' => 'Vloggers Reveal a New Way to Take Better Liked Videos for Instagram TV',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_entertainment_id,),
));

$post_td_post_fashion_bloggers_hijacked_the_industry_cutting_a_big_piece_of_earnings_id = td_demo_content::add_post(array(
	'title' => 'Fashion Bloggers Hijacked the Industry, Cutting a big Piece of Earnings',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_entertainment_id,),
));

$post_td_post_the_gillbert_couple_secures_480_million_in_hollywood_contract_deal_id = td_demo_content::add_post(array(
	'title' => 'The Gillbert Couple Secures $480 Million in Hollywood Contract Deal',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_entertainment_id,),
));

$post_td_post_buzz_megan_ryan_gets_an_emmy_award_on_her_25_year_old_birthday_id = td_demo_content::add_post(array(
	'title' => 'Buzz: Megan Ryan gets an Emmy Award on Her 25 Year Old Birthday',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_entertainment_id,),
));

$post_td_post_music_in_your_car_mecerdes_offers_astounding_quality_collab_speakers_id = td_demo_content::add_post(array(
	'title' => 'Music in Your Car: Mecerdes Offers Astounding Quality Collab Speakers',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_these_djs_are_making_more_money_than_anybody_could_have_ever_guessed_id = td_demo_content::add_post(array(
	'title' => 'These DJs Are Making More Money than Anybody Could Have Ever Guessed',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_sarah_brooke_shows_off_her_stunning_body_in_pre_concert_photo_shoot_id = td_demo_content::add_post(array(
	'title' => 'Sarah Brooke Shows Off Her Stunning Body in Pre-Concert Photo Shoot',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_before_concert_therapy_breathtaking_barbados_walking_experience_id = td_demo_content::add_post(array(
	'title' => 'Before Concert Therapy: Breathtaking Barbados Walking Experience',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_mary_josh_win_grammys_newcommers_of_the_year_with_their_debut_album_id = td_demo_content::add_post(array(
	'title' => 'Mary & Josh Win Grammys Newcommers of the Year With Their Debut Album',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_music_id,),
));


/*  ---------------------------------------------------------------------------- 
	PRODUCTS
*/

/*  ---------------------------------------------------------------------------- 
	MENUS
*/
$menu_td_demo_header_menu_id = td_demo_menus::create_menu('td-demo-header-menu', ''); 


/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/
$template_header_template_main_metropolitan_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Header Template Main – Metropolitan PRO',
	'file' => 'header_cloud_template.txt',
	'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_main_metropolitan_pro_id);


update_post_meta( $template_header_template_main_metropolitan_pro_id, 'header_mobile_menu_id', $menu_td_demo_header_menu_id);


$template_header_template_overlay_metropolitan_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Header Template Overlay - Metropolitan PRO',
    'file' => 'header_cloud_template_overlay.txt',
    'template_type' => 'header',
));

update_post_meta( $template_header_template_overlay_metropolitan_pro_id, 'header_mobile_menu_id', $menu_td_demo_header_menu_id);


$template_author_template_metropolitan_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Author Template - Metropolitan PRO',
	'file' => 'author_cloud_template.txt',
	'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_metropolitan_pro_id);


$template_category_template_metropolitan_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Category Template - Metropolitan PRO',
	'file' => 'cat_cloud_template.txt',
	'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_metropolitan_pro_id);


$template_tag_template_metropolitan_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Tag Template - Metropolitan PRO',
	'file' => 'tag_cloud_template.txt',
	'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_metropolitan_pro_id);


$template_search_template_metropolitan_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Search Template - Metropolitan PRO',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_metropolitan_pro_id);


$template_single_template_metropolitan_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Single Template - Metropolitan PRO',
	'file' => 'post_cloud_template.txt',
	'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_metropolitan_pro_id);


$template_404_template_metropolitan_pro_id = td_demo_content::add_cloud_template(array(
	'title' => '404 Template - Metropolitan PRO',
	'file' => '404_cloud_template.txt',
    'header_template_id' => $template_header_template_overlay_metropolitan_pro_id,
	'template_type' => '404',

));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_metropolitan_pro_id);


$template_date_template_metropolitan_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Date Template - Metropolitan PRO',
	'file' => 'date_cloud_template.txt',
	'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_metropolitan_pro_id);


$template_footer_template_metropolitan_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Footer Template - Metropolitan PRO',
	'file' => 'footer_cloud_template.txt',
	'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_metropolitan_pro_id);


/*  ----------------------------------------------------------------------------
	HOMEPAGE
*/
$page_home_id = td_demo_content::add_page(array(
    'title' => 'Home',
    'file' => 'home.txt',
    'homepage' => true,
    'header_template_id' => $template_header_template_overlay_metropolitan_pro_id,
    'demo_unique_id' => '7661b76388a4418',
));


/*  ----------------------------------------------------------------------------
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_page(array(
    'title' => 'Home',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'page_id' => $page_home_id,
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Discover',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_discover_id,
    'parent_id' => ''
), true);

$menu_item_2_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Lifestyle',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_lifestyle_id,
    'parent_id' => ''
), true);

$menu_item_3_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Celebs',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_celebs_id,
    'parent_id' => ''
), true);

$menu_item_4_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Food',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_food_id,
    'parent_id' => ''
), true);

$menu_item_5_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Technology',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_technology_id,
    'parent_id' => ''
), true);

$menu_item_6_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Travel',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_travel_id,
    'parent_id' => ''
), true);


/*  ---------------------------------------------------------------------------- 
	GENERAL SETTINGS
*/
td_demo_misc::update_background('', false);

td_demo_misc::update_background_mobile('td_pic_1');

td_demo_misc::update_background_login('td_pic_1');

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
