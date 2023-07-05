<?php



/*  ----------------------------------------------------------------------------
	SUBSCRIPTION - start phase 1
*/
if (is_plugin_active('td-subscription/td-subscription.php') ) {
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
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:17:"7061adcb319173d16";}',
	)
);

$plan_free_plan_id = td_demo_subscription::add_plan( array(
	'name' => 'Free Plan',
	'price' => '',
	'months_in_cycle' => '',
	'trial_days' => '0',
	'is_free' => '1',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:17:"9861adcb31917fb52";}',
	)
);

$plan_monthly_plan_id = td_demo_subscription::add_plan( array(
	'name' => 'Monthly Plan',
	'price' => '10',
	'months_in_cycle' => '1',
	'trial_days' => '0',
	'is_free' => '0',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:17:"9361adcb31918c266";}',
	)
);

$page_payment_page_id_id = td_demo_content::add_page(array(
	'title' => 'Checkout - aramis',
	'file' => 'tds_checkout.txt',
));

td_demo_subscription::add_option( array(
	'name' => 'payment_page_id',
	'value' => $page_payment_page_id_id,
	)
);

$page_my_account_page_id_id = td_demo_content::add_page(array(
	'title' => 'My Account - aramis',
	'file' => 'tds_my_account.txt',
));

td_demo_subscription::add_option( array(
	'name' => 'my_account_page_id',
	'value' => $page_my_account_page_id_id,
	)
);

$page_create_account_page_id_id = td_demo_content::add_page(array(
	'title' => 'Login/Register - aramis',
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

}


/*  ----------------------------------------------------------------------------
	SUBSCRIPTION - end phase 1
*/

/*  ----------------------------------------------------------------------------
	CATEGORIES
*/
$cat_art_id = td_demo_category::add_category(array(
	'category_name' => 'Art',
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

$cat_culture_id = td_demo_category::add_category(array(
	'category_name' => 'Culture',
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

$cat_environment_id = td_demo_category::add_category(array(
	'category_name' => 'Environment',
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

$cat_politics_id = td_demo_category::add_category(array(
	'category_name' => 'Politics',
	'parent_id' => $cat_news_id,
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

$cat_tech_id = td_demo_category::add_category(array(
	'category_name' => 'Tech',
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
	'parent_id' => $cat_news_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_uncategorised_id = td_demo_category::add_category(array(
	'category_name' => 'Uncategorised',
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
$page_homepage_id = td_demo_content::add_page(array(
	'title' => 'Homepage',
	'file' => 'homepage.txt',
	'homepage' => true,
));

$page_tds_switching_plans_wizard_id = td_demo_content::add_page(array(
	'title' => 'Switching plans wizard',
	'file' => 'tds_switching_plans_wizard.txt',
));


/*  ----------------------------------------------------------------------------
	SUBSCRIPTION - start phase 2
*/
if (is_plugin_active('td-subscription/td-subscription.php') ) {


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
				'tds_title' => 'Members Only Content',
				'tds_message' => 'Become a member today to gain unrestricted access to all content across this platform. Enjoy the benefits of reading exclusive and up to date articles straight from the comforts of your home.',
				'tds_submit_btn_text' => 'Subscribe',
				'tds_after_btn_text' => 'Enjoy Fast Content Done Right.',
				'tds_pp_msg' => 'I consent to processing of my data according to <a href=\"#\">Terms of Use</a> & <a href=\"#\">Privacy Policy</a>',
			),
	'tds_payable' => 'paid_subscription',
	'tds_paid_subs_page_id' => $page_tds_switching_plans_wizard_id,
	'tds_paid_subs_plan_ids' => [$plan_yearly_plan_id,$plan_free_plan_id,$plan_monthly_plan_id],
			'tds_locker_styles' => array(
				'tds_bg_color' => '#ffffff',
				'all_tds_border' => '1px',
				'all_tds_border_color' => '#000000',
				'tds_title_color' => '#000000',
				'tds_message_color' => '#000000',
				'tds_submit_btn_text_color' => '#ffffff',
				'tds_submit_btn_text_color_h' => '#0a0a0a',
				'tds_submit_btn_bg_color' => '#000000',
				'tds_submit_btn_bg_color_h' => '#e5764e',
				'tds_after_btn_text_color' => '#f7c654',
				'tds_pp_checked_color' => '#e5764e',
				'tds_pp_check_border_color' => '#000000',
				'tds_pp_check_border_color_f' => '#e5764e',
				'tds_pp_msg_color' => '#000000',
				'tds_pp_msg_links_color' => '#e5764e',
				'tds_pp_msg_links_color_h' => '#f7c654',
				'tds_general_font_family' => '854',
				'tds_title_font_family' => '149',
				'tds_title_font_size' => '30',
				'tds_title_font_line_height' => '1.2',
				'tds_title_font_weight' => '900',
				'tds_message_font_family' => '854',
				'tds_message_font_size' => '16',
				'tds_message_font_line_height' => '1.4',
				'tds_message_font_weight' => '400',
				'tds_submit_btn_text_font_family' => '854',
				'tds_submit_btn_text_font_size' => '14',
				'tds_submit_btn_text_font_weight' => '400',
				'tds_submit_btn_text_font_transform' => 'uppercase',
				'tds_submit_btn_text_font_spacing' => '1',
				'tds_after_btn_text_font_family' => '854',
				'tds_after_btn_text_font_size' => '10',
				'tds_after_btn_text_font_transform' => 'uppercase',
				'tds_after_btn_text_font_spacing' => '1',
				'tds_pp_msg_font_family' => '854',
				'tds_pp_msg_font_size' => '12',
				'tds_pp_msg_font_line_height' => '1.4',
				'tds_pp_msg_font_style' => 'italic',
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

td_util::update_option('tds_demo_options', 'a:1:{s:5:"plans";a:3:{i:0;a:2:{s:9:"unique_id";s:17:"7061adcb319173d16";s:4:"name";s:11:"Yearly Plan";}i:1;a:2:{s:9:"unique_id";s:17:"9861adcb31917fb52";s:4:"name";s:9:"Free Plan";}i:2;a:2:{s:9:"unique_id";s:17:"9361adcb31918c266";s:4:"name";s:12:"Monthly Plan";}}}');

	}


/*  ----------------------------------------------------------------------------
	SUBSCRIPTION - end phase 2
*/

/*  ----------------------------------------------------------------------------
	POSTS
*/
$post_td_post_sarah_jules_went_exploring_the_mountainous_regions_of_southern_france_id = td_demo_content::add_post(array(
	'title' => 'Sarah Jules Went Exploring the Mountainous Regions of Southern France',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_world_id,),
));

$post_td_post_taking_a_trip_in_the_beautiful_country_of_greece_and_checking_out_the_sights_id = td_demo_content::add_post(array(
	'title' => 'Taking a Trip in the Beautiful Country of Greece and Checking Out the Sights',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_world_id,),
));

$post_td_post_a_walk_in_the_park_that_puts_you_in_good_spirits_is_time_well_spent_id = td_demo_content::add_post(array(
	'title' => 'A Walk in the Park that Puts You in Good Spirits is Time Well Spent',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_world_id,),
));

$post_td_post_travelling_with_your_best_bud_in_a_van_can_be_the_best_experience_of_your_life_id = td_demo_content::add_post(array(
	'title' => 'Travelling with Your Best Bud in a Van Can be the Best Experience of your Life',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_world_id,),
));

$post_td_post_city_of_dreams_and_nightmares_embracing_la_as_a_tourist_and_foreigner_id = td_demo_content::add_post(array(
	'title' => 'City of Dreams and Nightmares: Embracing LA as a Tourist and Foreigner',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_world_id,),
));

$post_td_post_bringing_new_life_into_the_world_the_challenges_and_surprises_of_motherhood_id = td_demo_content::add_post(array(
	'title' => 'Bringing New Life into the World: The Challenges and Surprises of Motherhood',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_world_id,),
));

$post_td_post_how_to_create_the_perfect_environment_for_your_kids_to_acquire_a_healthy_mindset_id = td_demo_content::add_post(array(
	'title' => 'How to Create the Perfect Environment for your Kids to Acquire a Healthy Mindset',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_world_id,),
));

$post_td_post_surprising_the_little_ones_on_christmas_with_presents_that_fit_their_wishes_id = td_demo_content::add_post(array(
	'title' => 'Surprising the Little Ones on Christmas with Presents that Fit Their Wishes',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_world_id,),
));

$post_td_post_a_christmas_spent_together_under_the_stars_counts_as_an_everlasting_memory_id = td_demo_content::add_post(array(
	'title' => 'A Christmas Spent Together Under the Stars Counts as an Everlasting Memory',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_world_id,),
));

$post_td_post_camaraderie_is_built_upon_spending_quality_time_together_as_a_cohesive_team_id = td_demo_content::add_post(array(
	'title' => 'Camaraderie is Built Upon Spending Quality Time Together as a Cohesive Team',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_world_id,),
));

$post_td_post_the_newest_gadgets_to_make_waves_in_the_digital_marketplace_of_quarter_3_of_2021_id = td_demo_content::add_post(array(
	'title' => 'The Newest Gadgets to Make Waves in the Digital Marketplace of Quarter 3 of 2021',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_tech_id,),
));

$post_td_post_modern_problems_require_modern_solutions_it_companies_making_revolutionary_changes_id = td_demo_content::add_post(array(
	'title' => 'Modern Problems Require Modern Solutions: IT Companies Making Revolutionary Changes',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_tech_id,),
));

$post_td_post_self_closing_self_driving_here_is_the_newest_smart_car_that_can_take_you_anywhere_id = td_demo_content::add_post(array(
	'title' => 'Self-Closing, Self-Driving - Here is the Newest Smart Car that Can Take you Anywhere',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_tech_id,),
));

$post_td_post_combating_stock_market_problems_by_going_to_the_direct_source_and_providing_new_jobs_id = td_demo_content::add_post(array(
	'title' => 'Combating Stock Market Problems By Going to the Direct Source and Providing New Jobs',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_tech_id,),
));

$post_td_post_how_teachers_have_created_engaging_online_classes_for_their_students_in_2021_id = td_demo_content::add_post(array(
	'title' => 'How Teachers have Created Engaging Online Classes for Their Students in 2021',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_tech_id,),
));

$post_td_post_red_is_the_color_of_confidence_and_motivation_says_emilia_blank_in_vogue_magazine_id = td_demo_content::add_post(array(
	'title' => 'Red is the Color of Confidence and Motivation Says Emilia Blank in Vogue Magazine',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_style_id,),
));

$post_td_post_admittedly_this_is_a_trend_we_never_thought_would_make_a_comeback_from_the_early_90s_id = td_demo_content::add_post(array(
	'title' => 'Admittedly This is a Trend We Never Thought Would Make a Comeback from the Early 90s',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_style_id,),
));

$post_td_post_how_danielle_monchette_saved_a_corgi_puppy_from_the_mountainous_regions_in_china_id = td_demo_content::add_post(array(
	'title' => 'How Danielle Monchette Saved a Corgi Puppy From the Mountainous Regions in China',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_style_id,),
));

$post_td_post_adventuring_into_an_unknown_city_with_claire_pascale_to_showcase_the_latest_fashions_id = td_demo_content::add_post(array(
	'title' => 'Adventuring into an Unknown City with Claire Pascale to Showcase the Latest Fashions',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_style_id,),
));

$post_td_post_love_in_bloom_rupert_and_lavinia_lerote_as_they_embark_on_their_honeymoon_id = td_demo_content::add_post(array(
	'title' => 'Love in Bloom: Rupert and Lavinia Lerote as they Embark on Their Honeymoon',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_style_id,),
));

$post_td_post_fighting_for_what_you_believe_in_is_a_booming_sign_of_strength_and_integrity_id = td_demo_content::add_post(array(
	'title' => 'Fighting for What You Believe in is a Booming Sign of Strength and Integrity',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_culture_id,),
));

$post_td_post_how_pasta_came_to_be_a_statement_dish_for_one_of_the_most_famous_chefs_of_2021_id = td_demo_content::add_post(array(
	'title' => 'How Pasta Came to be a Statement Dish for one of the Most Famous Chefs of 2021',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_culture_id,),
));

$post_td_post_skateboarding_as_a_past_time_and_an_activity_is_now_at_an_all_time_high_id = td_demo_content::add_post(array(
	'title' => 'Skateboarding as a Past Time and an Activity is Now at an All Time High',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_culture_id,),
));

$post_td_post_ordering_gifts_online_has_never_been_more_convenient_for_anniversaries_id = td_demo_content::add_post(array(
	'title' => 'Ordering Gifts Online has Never Been More Convenient for Anniversaries',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_culture_id,),
));

$post_td_post_picking_the_fruit_for_your_family_what_are_your_best_options_from_the_local_grocers_id = td_demo_content::add_post(array(
	'title' => 'Picking the Fruit For Your Family: What are Your Best Options from the Local Grocers?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_culture_id,),
));

$post_td_post_register_to_vote_online_and_let_your_voice_and_opinion_be_heard_for_your_nation_id = td_demo_content::add_post(array(
	'title' => 'Register to Vote Online and Let Your Voice and Opinion Be Heard for Your Nation',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_public_congregations_and_gathering_changes_and_rules_regarding_the_worldwide_pandemic_id = td_demo_content::add_post(array(
	'title' => 'Public Congregations and Gathering: Changes and Rules Regarding the Worldwide Pandemic',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_is_justice_truly_blind_a_retrospective_look_into_the_case_of_uma_roberts_v_paul_mcgunn_id = td_demo_content::add_post(array(
	'title' => 'Is Justice Truly Blind? A Retrospective Look into the Case of Uma Roberts v Paul McGunn',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_how_officials_should_treat_their_populace_analysis_into_the_future_of_congress_id = td_demo_content::add_post(array(
	'title' => 'How Officials Should Treat Their Populace, Analysis into the Future of Congress',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_corrupted_politicians_should_be_punished_according_to_the_committed_crimes_id = td_demo_content::add_post(array(
	'title' => 'Corrupted Politicians Should be Punished According to the Committed Crimes',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_the_inordinary_fashion_paintings_of_two_redheaded_twins_from_alabama_united_states_id = td_demo_content::add_post(array(
	'title' => 'The Inordinary Fashion & Paintings of Two Redheaded Twins from Alabama, United States',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_art_id,),
));

$post_td_post_complimentary_colors_what_they_are_and_how_to_use_them_to_create_a_beautiful_painting_id = td_demo_content::add_post(array(
	'title' => 'Complimentary Colors: What They Are and How to Use Them to Create a Beautiful Painting',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_art_id,),
));

$post_td_post_wall_painting_emilia_doger_shares_her_insights_and_experience_into_this_peculiar_art_form_id = td_demo_content::add_post(array(
	'title' => 'Wall Painting: Emilia Doger Shares her Insights and Experience into this Peculiar Art Form',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_art_id,),
));

$post_td_post_astronaut_music_the_new_trend_among_the_youth_of_today_a_genre_that_took_off_overnight_id = td_demo_content::add_post(array(
	'title' => 'Astronaut Music, the new Trend Among the Youth of Today, a Genre that Took off Overnight',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_art_id,),
));

$post_td_post_arts_and_crafts_a_very_relaxing_hobby_for_the_kids_stuck_at_home_with_online_classes_id = td_demo_content::add_post(array(
	'title' => 'Arts and Crafts - a Very Relaxing Hobby for the Kids Stuck at Home with Online Classes',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_art_id,),
));

$post_td_post_discovering_a_different_side_of_laura_parks_in_a_beautiful_place_downtown_san_francisco_id = td_demo_content::add_post(array(
	'title' => 'Discovering a Different Side of Laura Parks in a Beautiful Place Downtown, San Francisco',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_a_photo_book_with_andreea_martini_following_her_trip_from_one_side_of_the_us_to_the_other_id = td_demo_content::add_post(array(
	'title' => 'A Photo Book with Andreea Martini Following her Trip from one Side of the US to the Other',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_take_a_deep_dive_into_the_alternate_lifestyle_of_paris_france_with_kelly_laurence_id = td_demo_content::add_post(array(
	'title' => 'Take a Deep Dive into the Alternate Lifestyle of Paris, France, with Kelly Laurence',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_what_happens_when_you_lose_yourself_in_an_unknown_foreign_country_advice_and_tips_id = td_demo_content::add_post(array(
	'title' => 'What Happens when you Lose Yourself in an Unknown, Foreign Country? Advice and Tips',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_hitchhiking_from_one_side_of_the_country_to_the_other_while_on_a_tight_schedule_id = td_demo_content::add_post(array(
	'title' => 'Hitchhiking from one Side of the Country to the Other while on a Tight Schedule',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_cultivating_an_entire_garden_over_the_course_of_a_year_and_growing_it_to_maturity_id = td_demo_content::add_post(array(
	'title' => 'Cultivating an Entire Garden Over the Course of a Year and Growing it to Maturity',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_environment_id,),
));

$post_td_post_exploring_the_coral_reefs_to_understand_how_pollution_has_impacted_aquatic_life_id = td_demo_content::add_post(array(
	'title' => 'Exploring the Coral Reefs to Understand How Pollution Has Impacted Aquatic Life',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_environment_id,),
));

$post_td_post_letting_loose_and_having_fun_in_the_rural_villages_along_the_seine_in_france_id = td_demo_content::add_post(array(
	'title' => 'Letting Loose and Having Fun in the Rural Villages Along the Seine in France',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_environment_id,),
));

$post_td_post_contributing_to_a_brighter_future_by_volunterring_for_environmental_societies_id = td_demo_content::add_post(array(
	'title' => 'Contributing to a Brighter Future by Volunterring For Environmental Societies',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_environment_id,),
));

$post_td_post_becoming_one_with_nature_takes_time_and_a_lot_of_yoga_says_pauline_jacobs_id = td_demo_content::add_post(array(
	'title' => 'Becoming One with Nature Takes Time and a Lot of Yoga says Pauline Jacobs',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_environment_id,),
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

$menu_item_2_id = td_demo_menus::add_mega_menu(array(
	'title' => 'Style',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_style_id,
	'parent_id' => ''
), true);

$menu_item_3_id = td_demo_menus::add_mega_menu(array(
	'title' => 'Tech',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_tech_id,
	'parent_id' => ''
), true);

$menu_item_4_id = td_demo_menus::add_category(array(
	'title' => 'World',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_world_id,
	'parent_id' => ''
));

$menu_item_5_id = td_demo_menus::add_category(array(
	'title' => 'Art',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_art_id,
	'parent_id' => $menu_item_4_id
));

$menu_item_6_id = td_demo_menus::add_category(array(
	'title' => 'Culture',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_culture_id,
	'parent_id' => $menu_item_4_id
));

$menu_item_7_id = td_demo_menus::add_category(array(
	'title' => 'Environment',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_environment_id,
	'parent_id' => $menu_item_4_id
));


/*  ----------------------------------------------------------------------------
	CLOUD TEMPLATES
*/
$template_date_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Aramis - Date Template',
	'file' => 'date_cloud_template.txt',
	'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_id);


$template_tag_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Aramis - Tag Template',
	'file' => 'tag_cloud_template.txt',
	'template_type' => 'tag',
));

$template_404_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Aramis - 404 Template',
	'file' => '404_cloud_template.txt',
	'template_type' => '404',
));

$template_search_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Aramis - Search Template',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_id);


$template_category_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Aramis - Category Template',
	'file' => 'cat_cloud_template.txt',
	'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_id);


$template_author_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Aramis - Author Template',
	'file' => 'author_cloud_template.txt',
	'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_id);


$template_single_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Aramis - Single Template',
	'file' => 'post_cloud_template.txt',
	'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_id);


$template_footer_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Aramis - Footer Template',
	'file' => 'footer_cloud_template.txt',
	'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_id);


$template_header_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Aramis - Header Template',
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
