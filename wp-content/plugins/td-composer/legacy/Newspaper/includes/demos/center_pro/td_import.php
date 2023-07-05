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
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"9961f110ab15aea";}',
	)
);

$plan_monthly_plan_id = td_demo_subscription::add_plan( array(
	'name' => 'Monthly Plan',
	'price' => '10',
	'months_in_cycle' => '1',
	'trial_days' => '0',
	'is_free' => '0',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"3861f110ab18cb1";}',
	)
);

$plan_free_plan_id = td_demo_subscription::add_plan( array(
	'name' => 'Free Plan',
	'price' => '',
	'months_in_cycle' => '',
	'trial_days' => '0',
	'is_free' => '1',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"8961f110ab1bc52";}',
	)
);

$page_payment_page_id_id = td_demo_content::add_page(array(
	'title' => 'Checkout - center_pro',
	'file' => 'tds_checkout.txt',
));

td_demo_subscription::add_option( array(
	'name' => 'payment_page_id',
	'value' => $page_payment_page_id_id,
	)
);

$page_my_account_page_id_id = td_demo_content::add_page(array(
	'title' => 'My Account - center_pro',
	'file' => 'tds_my_account.txt',
));

td_demo_subscription::add_option( array(
	'name' => 'my_account_page_id',
	'value' => $page_my_account_page_id_id,
	)
);

$page_create_account_page_id_id = td_demo_content::add_page(array(
	'title' => 'Login/Register - center_pro',
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
$cat_celebrity_id = td_demo_category::add_category(array(
	'category_name' => 'Celebrity',
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

$cat_crypto_id = td_demo_category::add_category(array(
	'category_name' => 'Crypto',
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

$cat_make_up_id = td_demo_category::add_category(array(
	'category_name' => 'Make-up',
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

$cat_marketing_id = td_demo_category::add_category(array(
	'category_name' => 'Marketing',
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

$cat_music_id = td_demo_category::add_category(array(
	'category_name' => 'Music',
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
	MENUS
*/
$menu_td_demo_header_menu_id = td_demo_menus::create_menu('td-demo-header-menu', '');
$menu_td_demo_footer_menu_id = td_demo_menus::create_menu('td-demo-footer-menu', '');


/*  ---------------------------------------------------------------------------- 
	PAGES
*/
$page_tds_switching_plans_wizard_id = td_demo_content::add_page(array(
	'title' => 'Tds switching plans wizard',
	'file' => 'tds_switching_plans_wizard.txt',
	'demo_unique_id' => '1961f110ab8ab8f',
));

$page_home_id = td_demo_content::add_page(array(
	'title' => 'Home',
	'file' => 'home.txt',
	'homepage' => true,
	'demo_unique_id' => '7861f110ab8e9a0',
));

$page_menu_popup_id = td_demo_content::add_page(array(
	'title' => 'Menu Popup',
	'file' => 'menu_popup.txt',
	'demo_unique_id' => '161f110ab92821',
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
				'tds_submit_btn_text' => 'Subscribe to unlock',
				'tds_pp_msg' => 'I consent to processing of my data according to <a href=\"#\">Terms of Use</a> & <a href=\"#\">Privacy Policy</a>',
				'tds_locker_cf_1_name' => 'Custom field 1',
				'tds_locker_cf_2_name' => 'Custom field 2',
				'tds_locker_cf_3_name' => 'Custom field 3',
			),
	'tds_payable' => 'paid_subscription',
	'tds_paid_subs_page_id' => $page_tds_switching_plans_wizard_id,
	'tds_paid_subs_plan_ids' => [$plan_yearly_plan_id,$plan_monthly_plan_id,$plan_free_plan_id],
			'tds_locker_styles' => array(
				'tds_bg_color' => '#ffffff',
				'all_tds_border' => '3',
				'all_tds_border_color' => '#099f8a',
				'tds_title_color' => '#000000',
				'tds_message_color' => '#000000',
				'tds_submit_btn_text_color' => '#ffffff',
				'tds_submit_btn_text_color_h' => '#ffffff',
				'tds_submit_btn_bg_color' => '#099f8a',
				'tds_submit_btn_bg_color_h' => '#048c7a',
				'tds_after_btn_text_color' => '#000000',
				'tds_pp_checked_color' => '#099f8a',
				'tds_pp_msg_links_color' => '#099f8a',
				'tds_pp_msg_links_color_h' => '#048c7a',
				'tds_title_font_family' => '81',
				'tds_title_font_size' => '36',
				'tds_title_font_line_height' => '1',
				'tds_title_font_weight' => '400',
				'tds_message_font_family' => '831',
				'tds_message_font_size' => '16',
				'tds_submit_btn_text_font_family' => '831',
				'tds_submit_btn_text_font_transform' => 'uppercase',
				'tds_after_btn_text_font_family' => '831',
				'tds_after_btn_text_font_size' => '14',
				'tds_pp_msg_font_family' => '831',
				'tds_pp_msg_font_size' => '13',
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

td_util::update_option('tds_demo_options', 'a:1:{s:5:"plans";a:3:{i:0;a:2:{s:9:"unique_id";s:15:"9961f110ab15aea";s:4:"name";s:11:"Yearly Plan";}i:1;a:2:{s:9:"unique_id";s:15:"3861f110ab18cb1";s:4:"name";s:12:"Monthly Plan";}i:2;a:2:{s:9:"unique_id";s:15:"8961f110ab1bc52";s:4:"name";s:9:"Free Plan";}}}');


/*  ---------------------------------------------------------------------------- 
	SUBSCRIPTION - end phase 2
*/

/*  ---------------------------------------------------------------------------- 
	POSTS
*/
$post_td_post_the_definitive_guide_to_marketing_your_business_on_instagram_id = td_demo_content::add_post(array(
    'title' => 'The Definitive Guide To Marketing Your Business On Instagram',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'categories_id_array' => array($cat_celebrity_id,$cat_crypto_id,$cat_food_id,$cat_make_up_id,$cat_marketing_id,$cat_music_id,$cat_politics_id,$cat_technology_id,$cat_travel_id,),
));

$post_td_post_olimpic_athlete_reads_donald_trumps_mean_tweets_on_kimmel_id = td_demo_content::add_post(array(
    'title' => 'Olimpic Athlete Reads Donald Trump\'s Mean Tweets on Kimmel',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'categories_id_array' => array($cat_celebrity_id,$cat_crypto_id,$cat_food_id,$cat_make_up_id,$cat_marketing_id,$cat_music_id,$cat_politics_id,$cat_technology_id,$cat_travel_id,),
));

$post_td_post_kansas_city_has_a_massive_array_of_big_national_companies_id = td_demo_content::add_post(array(
    'title' => 'Kansas City Has a Massive Array of Big National Companies',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'categories_id_array' => array($cat_celebrity_id,$cat_crypto_id,$cat_food_id,$cat_make_up_id,$cat_marketing_id,$cat_music_id,$cat_politics_id,$cat_technology_id,$cat_travel_id,),
));

$post_td_post_program_will_lend_10m_to_detroit_minority_businesses_id = td_demo_content::add_post(array(
    'title' => 'Program Will Lend $10M to Detroit Minority Businesses',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'categories_id_array' => array($cat_celebrity_id,$cat_crypto_id,$cat_food_id,$cat_make_up_id,$cat_marketing_id,$cat_music_id,$cat_politics_id,$cat_technology_id,$cat_travel_id,),
));

$post_td_post_now_is_the_time_to_think_about_your_small_business_success_id = td_demo_content::add_post(array(
    'title' => 'Now Is the Time to Think About Your Small-Business Success',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_celebrity_id,$cat_crypto_id,$cat_food_id,$cat_make_up_id,$cat_marketing_id,$cat_music_id,$cat_politics_id,$cat_technology_id,$cat_travel_id,),
));

$post_td_post_permanent_eyebrows_tattoo_tricks_revealed_by_makeup_guru_katie_adams_id = td_demo_content::add_post(array(
	'title' => 'Permanent Eyebrows Tattoo Tricks Revealed by Makeup Guru Katie Adams',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'tds_locker' => '5',
	'categories_id_array' => array($cat_make_up_id,),
));

$post_td_post_cool_startups_that_will_change_your_perspective_on_clothes_fashion_id = td_demo_content::add_post(array(
	'title' => 'Cool Startups that Will Change Your Perspective on Clothes & Fashion',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_make_up_id,),
));

$post_td_post_10_outfits_inspired_by_makeup_works_of_art_are_auctioned_in_london_id = td_demo_content::add_post(array(
	'title' => '10 Outfits Inspired by Makeup Works of Art are Auctioned in London',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_make_up_id,),
));

$post_td_post_the_make_up_conference_in_dubai_this_winter_unveils_hot_innovations_id = td_demo_content::add_post(array(
	'title' => 'The Make-up Conference in Dubai this Winter Unveils Hot Innovations',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'tds_locker' => '5',
	'categories_id_array' => array($cat_make_up_id,),
));

$post_td_post_cover_girl_announces_star_shine_makeup_line_is_due_for_next_december_id = td_demo_content::add_post(array(
	'title' => 'Cover Girl Announces Star Shine Makeup Line is Due for Next December',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_make_up_id,),
));

$post_td_post_engagement_marketing_a_new_strategy_for_the_economy_id = td_demo_content::add_post(array(
	'title' => 'Engagement Marketing: A New Strategy for the Economy',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'tds_locker' => '5',
	'categories_id_array' => array($cat_marketing_id,),
));

$post_td_post_television_is_in_steep_decline_compared_to_social_network_marketing_id = td_demo_content::add_post(array(
	'title' => 'Television is in Steep Decline Compared to Social Network Marketing',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_marketing_id,),
));

$post_td_post_social_networks_advertising_is_important_the_future_of_marketing_id = td_demo_content::add_post(array(
	'title' => 'Social Networks Advertising is Important the Future Of Marketing',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_marketing_id,),
));

$post_td_post_mobile_marketing_is_the_future_of_e_commerce_real_world_study_finds_id = td_demo_content::add_post(array(
	'title' => 'Mobile Marketing is the Future of E-Commerce, Real-World Study Finds',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_marketing_id,),
));

$post_td_post_how_can_influencers_show_glamour_and_class_selling_on_instagram_id = td_demo_content::add_post(array(
	'title' => 'How Can Influencers Show Glamour and Class Selling on Instagram',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_marketing_id,),
));

$post_td_post_the_politics_behind_maroccos_stock_market_turbulence_last_year_id = td_demo_content::add_post(array(
	'title' => 'The Politics Behind Marocco\'s Stock Market Turbulence Last Year',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_expanding_peacefull_political_climate_gears_up_for_this_election_id = td_demo_content::add_post(array(
	'title' => 'Expanding Peacefull Political Climate Gears up for this Election',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_new_harvard_student_candidates_presented_minutes_before_results_id = td_demo_content::add_post(array(
	'title' => 'New Harvard Student Candidates Presented Minutes Before Results',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_things_you_didnt_know_about_the_american_past_politicians_id = td_demo_content::add_post(array(
	'title' => 'Things You Didn\'t Know About the American Past Politicians',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_tik_toker_gets_amazing_welcome_at_conservative_college_gathering_id = td_demo_content::add_post(array(
	'title' => 'Tik Toker Gets Amazing Welcome at Conservative College Gathering',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_itunes_is_now_the_second_biggest_name_in_music_world_giants_id = td_demo_content::add_post(array(
	'title' => 'iTunes is Now the Second Biggest Name in Music World Giants',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_concert_shows_that_will_stream_on_netflix_amazon_and_hulu_id = td_demo_content::add_post(array(
	'title' => 'Concert Shows that Will Stream on Netflix, Amazon and Hulu',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_for_composer_drew_silva_music_is_all_about_embracing_life_id = td_demo_content::add_post(array(
	'title' => 'For Composer Drew Silva, Music is all About Embracing Life',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_pixar_brings_its_animated_movies_to_life_with_studio_music_id = td_demo_content::add_post(array(
	'title' => 'Pixar Brings it\'s Animated Movies to Life with Studio Music',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_burberry_is_the_first_brand_to_get_an_apple_music_channel_line_id = td_demo_content::add_post(array(
	'title' => 'Burberry is the First Brand to get an Apple Music Channel Line',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_10_things_you_should_know_before_you_stay_in_the_carribean_islands_id = td_demo_content::add_post(array(
	'title' => '10 Things You Should Know Before You Stay in the Carribean Islands',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_ultimate_guide_to_istanbul_top_attractions_packed_in_one_weekend_id = td_demo_content::add_post(array(
	'title' => 'Ultimate Guide to Istanbul Top Attractions, Packed in One Weekend',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_vacation_bucket_list_the_top_10_trips_you_should_take_with_your_kids_id = td_demo_content::add_post(array(
	'title' => 'Vacation Bucket List: The Top 10 Trips You Should Take with Your Kids',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_the_mayan_piramids_reach_1_million_visitors_every_year_since_2014_id = td_demo_content::add_post(array(
	'title' => 'The Mayan Piramids Reach 1 Million Visitors Every Year Since 2014',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_the_best_cities_you_can_find_in_italy_to_satisfy_the_love_for_fruits_id = td_demo_content::add_post(array(
	'title' => 'The Best Cities You Can Find in Italy to Satisfy the Love for Fruits',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_easy_food_survey_pizza_voted_as_one_of_the_most_satisfying_meals_ever_id = td_demo_content::add_post(array(
	'title' => 'Easy Food Survey: Pizza Voted As One of the Most Satisfying Meals Ever',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_food_id,),
));

$post_td_post_this_week_in_houston_food_blogs_high_protein_recipes_and_low_fat_shakes_id = td_demo_content::add_post(array(
	'title' => 'This Week in Houston Food Blogs: High-Protein Recipes and Low Fat Shakes',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_food_id,),
));

$post_td_post_moroccan_shrimp_with_garlic_mayonnaise_paella_dish_in_southern_spain_id = td_demo_content::add_post(array(
	'title' => 'Moroccan Shrimp with Garlic Mayonnaise Paella Dish in Southern Spain',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_food_id,),
));

$post_td_post_best_places_to_get_your_mexican_food_fix_when_you_visit_mexico_city_id = td_demo_content::add_post(array(
	'title' => 'Best Places to Get Your Mexican Food Fix When You Visit Mexico City',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_food_id,),
));

$post_td_post_the_best_pork_kebabs_with_grilled_plums_and_couscous_is_found_in_poland_id = td_demo_content::add_post(array(
	'title' => 'The Best Pork Kebabs With Grilled Plums and Couscous is Found in Poland',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_food_id,),
));

$post_td_post_kristen_stewart_was_seen_having_lunch_in_toronto_with_boyfriend_id = td_demo_content::add_post(array(
	'title' => 'Kristen Stewart Was Seen Having Lunch in Toronto with Boyfriend',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_celebrity_id,),
));

$post_td_post_the_biggest_hollywood_celebrities_visit_the_jungles_of_thailand_id = td_demo_content::add_post(array(
	'title' => 'The Biggest Hollywood Celebrities Visit the Jungles of Thailand',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_celebrity_id,),
));

$post_td_post_celebrity_make_up_artist_gary_meyers_shows_you_his_beauty_tricks_id = td_demo_content::add_post(array(
	'title' => 'Celebrity Make-up Artist Gary Meyers Shows you His Beauty Tricks',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_celebrity_id,),
));

$post_td_post_fashion_finder_biggest_shows_parties_and_celebrity_for_new_years_id = td_demo_content::add_post(array(
	'title' => 'Fashion Finder: Biggest Shows, Parties and Celebrity for New Years',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_celebrity_id,),
));

$post_td_post_the_most_popular_celebrity_name_list_of_the_millennium_is_finally_here_id = td_demo_content::add_post(array(
	'title' => 'The Most Popular Celebrity Name List of the Millennium is Finally Here',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'tds_locker' => '5',
	'categories_id_array' => array($cat_celebrity_id,),
));

$post_td_post_companies_will_invest_at_least_125_billion_in_metaverse_development_id = td_demo_content::add_post(array(
	'title' => 'Companies Will Invest At Least $125 Billion in Metaverse Development',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_crypto_id,),
));

$post_td_post_altcoins_land_50_billion_in_another_funding_round_with_investors_id = td_demo_content::add_post(array(
	'title' => 'Altcoins Land $50 Billion in Another Funding Round with Investors',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_crypto_id,),
));

$post_td_post_a_look_at_how_social_media_mobile_gaming_can_increase_adoption_id = td_demo_content::add_post(array(
	'title' => 'A Look at How Social Media & Mobile Gaming Can Increase Adoption',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_crypto_id,),
));

$post_td_post_the_secret_to_your_companys_financial_health_is_very_important_id = td_demo_content::add_post(array(
	'title' => 'The Secret to Your Company\'s Financial Health is Very Important',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_crypto_id,),
));

$post_td_post_the_hottest_wearable_tech_and_smart_gadgets_of_2022_will_blow_your_mind_id = td_demo_content::add_post(array(
	'title' => 'The Hottest Wearable Tech and Smart Gadgets of 2022 Will Blow Your Mind',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_technology_id,),
));

$post_td_post_things_to_look_for_in_a_financial_trading_platform_environment_id = td_demo_content::add_post(array(
	'title' => 'Things to Look For in a Financial Trading Platform Environment',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_crypto_id,),
));

$post_td_post_technology_will_help_keep_your_home_from_becoming_obsolete_id = td_demo_content::add_post(array(
	'title' => 'Technology Will Help Keep Your Home from Becoming Obsolete',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_technology_id,),
));

$post_td_post_apple_electronics_climb_the_list_of_the_top_gadgets_in_forbes_magazine_id = td_demo_content::add_post(array(
	'title' => 'Apple Electronics Climb the List of the Top Gadgets in Forbes Magazine',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_technology_id,),
));

$post_td_post_new_small_speaker_review_pricing_is_not_always_the_only_criteria_id = td_demo_content::add_post(array(
	'title' => 'New Small Speaker Review: Pricing is Not Always the Only Criteria',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_technology_id,),
));

$post_td_post_discover_the_newest_waterproof_and_fast_smartphones_that_come_on_sale_id = td_demo_content::add_post(array(
	'title' => 'Discover the Newest Waterproof and Fast Smartphones that Come on Sale',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_technology_id,),
));


/*  ---------------------------------------------------------------------------- 
	PRODUCTS
*/


/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/
$template_tag_template_center_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Tag Template - Center PRO',
	'file' => 'tag_cloud_template.txt',
	'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_center_pro_id);


$template_date_template_center_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Date Template - Center PRO',
	'file' => 'date_cloud_template.txt',
	'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_center_pro_id);


$template_404_template_center_pro_id = td_demo_content::add_cloud_template(array(
	'title' => '404 Template - Center PRO',
	'file' => '404_cloud_template.txt',
	'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_center_pro_id);


$template_search_template_center_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Search Template - Center PRO',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_center_pro_id);


$template_author_template_center_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Author Template - Center PRO',
	'file' => 'author_cloud_template.txt',
	'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_center_pro_id);


$template_single_post_template_center_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Single Post Template - Center PRO',
	'file' => 'post_cloud_template.txt',
	'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_post_template_center_pro_id);


$template_category_template_center_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Category Template - Center PRO',
	'file' => 'cat_cloud_template.txt',
	'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_center_pro_id);


$template_footer_template_center_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Footer Template - Center PRO',
	'file' => 'footer_cloud_template.txt',
	'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_center_pro_id);


$template_header_template_center_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Header Template - Center PRO',
	'file' => 'header_cloud_template.txt',
	'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_center_pro_id);


update_post_meta( $template_header_template_center_pro_id, 'header_mobile_menu_id', $menu_td_demo_header_menu_id);



/*  ----------------------------------------------------------------------------
	MENUS ITEMS FOOTER
*/
$menu_item_0_id = td_demo_menus::add_link(array(
    'title' => 'About',
    'add_to_menu_id' => $menu_td_demo_footer_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_link(array(
    'title' => 'Advertise',
    'add_to_menu_id' => $menu_td_demo_footer_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_link(array(
    'title' => 'Privacy Policy',
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

$menu_item_4_id = td_demo_menus::add_link(array(
    'title' => 'Subscribe',
    'add_to_menu_id' => $menu_td_demo_footer_menu_id,
    'url' => '#',
    'parent_id' => ''
));


/*  ----------------------------------------------------------------------------
	MENUS ITEMS HEADER
*/
$menu_item_0_id = td_demo_menus::add_category(array(
    'title' => 'Celebrity',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_celebrity_id,
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_category(array(
    'title' => 'Crypto',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_crypto_id,
    'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_category(array(
    'title' => 'Food',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_food_id,
    'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_category(array(
    'title' => 'Make-up',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_make_up_id,
    'parent_id' => ''
));

$menu_item_4_id = td_demo_menus::add_category(array(
    'title' => 'Marketing',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_marketing_id,
    'parent_id' => ''
));

$menu_item_5_id = td_demo_menus::add_category(array(
    'title' => 'Music',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_music_id,
    'parent_id' => ''
));

$menu_item_6_id = td_demo_menus::add_category(array(
    'title' => 'Politics',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_politics_id,
    'parent_id' => ''
));

$menu_item_7_id = td_demo_menus::add_category(array(
    'title' => 'Technology',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_technology_id,
    'parent_id' => ''
));

$menu_item_8_id = td_demo_menus::add_category(array(
    'title' => 'Travel',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_travel_id,
    'parent_id' => ''
));


/*  ---------------------------------------------------------------------------- 
	GENERAL SETTINGS
*/
td_demo_misc::update_background('', false);

td_demo_misc::update_background_mobile('tdx_pic_5');

td_demo_misc::update_background_login('tdx_pic_5');

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
