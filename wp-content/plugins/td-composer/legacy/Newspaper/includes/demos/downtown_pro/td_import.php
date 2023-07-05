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
$page_tds_switching_plans_wizard_id = td_demo_content::add_page(array(
    'title' => 'TDS switching plans wizard',
    'file' => 'tds_switching_plans_wizard.txt',
    'demo_unique_id' => '6624560a40a457',
));

$page_fly_menu_id = td_demo_content::add_page(array(
    'title' => 'Fly Menu',
    'file' => 'fly_menu.txt',
    'demo_unique_id' => '87624560a40d52a',
));

$page_home_id = td_demo_content::add_page(array(
    'title' => 'Home',
    'file' => 'home.txt',
    'homepage' => true,
    'demo_unique_id' => '8624560a410631',
));




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


$plan_monthly_plan_id = td_demo_subscription::add_plan( array(
	'name' => 'Monthly Plan',
	'price' => '10',
	'months_in_cycle' => '1',
	'trial_days' => '0',
	'is_free' => '0',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"81624560a39683f";}',
	)
);

$plan_free_plan_id = td_demo_subscription::add_plan( array(
	'name' => 'Free Plan',
	'price' => '',
	'months_in_cycle' => '',
	'trial_days' => '0',
	'is_free' => '1',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"42624560a3986b9";}',
	)
);

$plan_yearly_plan_id = td_demo_subscription::add_plan( array(
	'name' => 'Yearly Plan',
	'price' => '100',
	'months_in_cycle' => '12',
	'trial_days' => '0',
	'is_free' => '0',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"79624560a39a837";}',
	)
);

$page_payment_page_id_id = td_demo_content::add_page(array(
	'title' => 'Checkout - downtown_pro',
	'file' => 'tds_checkout.txt',
));

td_demo_subscription::add_option( array(
	'name' => 'payment_page_id',
	'value' => $page_payment_page_id_id,
	)
);

$page_my_account_page_id_id = td_demo_content::add_page(array(
	'title' => 'My Account - downtown_pro',
	'file' => 'tds_my_account.txt',
));

td_demo_subscription::add_option( array(
	'name' => 'my_account_page_id',
	'value' => $page_my_account_page_id_id,
	)
);

$page_create_account_page_id_id = td_demo_content::add_page(array(
	'title' => 'Login/Register - downtown_pro',
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

$cat_finance_id = td_demo_category::add_category(array(
	'category_name' => 'Finance',
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

$cat_marketing_id = td_demo_category::add_category(array(
	'category_name' => 'Marketing',
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

$cat_technology_id = td_demo_category::add_category(array(
	'category_name' => 'Technology',
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

$cat_women_id = td_demo_category::add_category(array(
	'category_name' => 'Women',
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

td_util::update_option('tds_demo_options', 'a:1:{s:5:"plans";a:3:{i:0;a:2:{s:9:"unique_id";s:15:"81624560a39683f";s:4:"name";s:12:"Monthly Plan";}i:1;a:2:{s:9:"unique_id";s:15:"42624560a3986b9";s:4:"name";s:9:"Free Plan";}i:2;a:2:{s:9:"unique_id";s:15:"79624560a39a837";s:4:"name";s:11:"Yearly Plan";}}}');


/*  ---------------------------------------------------------------------------- 
	SUBSCRIPTION - end phase 2
*/

/*  ---------------------------------------------------------------------------- 
	POSTS
*/
$post_td_post_itunes_is_now_the_second_biggest_name_in_new_artist_promotion_id = td_demo_content::add_post(array(
	'title' => 'iTunes is Now the Second Biggest Name in New Artist Promotion',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_pixar_brings_its_animated_movies_to_life_with_studio_music_id = td_demo_content::add_post(array(
	'title' => 'Pixar Brings it\'s Animated Movies to Life with Studio Music',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_concert_shows_will_stream_on_netflix_amazon_and_hulu_this_year_id = td_demo_content::add_post(array(
	'title' => 'Concert Shows Will Stream on Netflix, Amazon and Hulu this Year',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_for_composer_drew_silva_music_is_all_about_embracing_life_id = td_demo_content::add_post(array(
	'title' => 'For Composer Drew Silva, Music is all About Embracing Life',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_burberry_is_the_first_brand_to_get_an_apple_music_channel_line_id = td_demo_content::add_post(array(
	'title' => 'Burberry is the First Brand to get an Apple Music Channel Line',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_easy_food_survey_pizza_voted_as_one_of_the_most_satisfying_meals_id = td_demo_content::add_post(array(
	'title' => 'Easy Food Survey: Pizza Voted As One of the Most Satisfying Meals',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_food_id,),
));

$post_td_post_this_week_in_houston_food_blogs_high_protein_recipes_and_low_fat_shakes_id = td_demo_content::add_post(array(
	'title' => 'This Week in Houston Food Blogs: High-Protein Recipes and Low Fat Shakes',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_food_id,),
));

$post_td_post_moroccan_salmon_with_garlic_mayonnaise_is_common_in_southern_spain_id = td_demo_content::add_post(array(
	'title' => 'Moroccan Salmon with Garlic Mayonnaise is Common in Southern Spain',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_food_id,),
));

$post_td_post_the_best_cheesecake_with_crunch_topping_and_lemon_is_found_in_poland_id = td_demo_content::add_post(array(
	'title' => 'The Best Cheesecake With Crunch Topping and Lemon is Found in Poland',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_food_id,),
));

$post_td_post_best_places_to_get_your_mexican_food_fix_when_you_visit_mexico_city_id = td_demo_content::add_post(array(
	'title' => 'Best Places to Get Your Mexican Food Fix When You Visit Mexico City',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_food_id,),
));

$post_td_post_10_things_you_should_know_before_you_visit_south_americas_resorts_id = td_demo_content::add_post(array(
	'title' => '10 Things You Should Know Before You Visit South America\'s Resorts',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_ultimate_guide_to_viennas_coffee_renaissance_packed_in_one_weekend_id = td_demo_content::add_post(array(
	'title' => 'Ultimate Guide to Vienna’s Coffee Renaissance Packed in One Weekend',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_vacation_bucket_list_the_top_10_trips_of_a_lifetime_you_should_take_id = td_demo_content::add_post(array(
	'title' => 'Vacation Bucket List: The Top 10 Trips of a Lifetime You Should Take',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_the_yachts_in_monte_carlo_harbor_reach_1_million_visitors_every_year_id = td_demo_content::add_post(array(
	'title' => 'The Yachts in Monte Carlo Harbor Reach 1 Million Visitors Every Year',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_take_a_stroll_through_the_pros_and_cons_of_permanent_eyebrows_tattoos_id = td_demo_content::add_post(array(
	'title' => 'Take a Stroll Through the Pros and Cons of Permanent Eyebrows Tattoos',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_women_id,),
));

$post_td_post_the_25_best_cities_you_can_find_in_italy_to_satisfy_the_love_for_pasta_id = td_demo_content::add_post(array(
	'title' => 'The 25 Best Cities You Can Find in Italy to Satisfy the Love for Pasta',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_cool_startups_that_will_change_your_perspective_on_clothes_fashion_id = td_demo_content::add_post(array(
	'title' => 'Cool Startups that Will Change Your Perspective on Clothes & Fashion',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_women_id,),
));

$post_td_post_10_outfits_inspired_by_famous_works_of_art_are_auctioned_in_london_id = td_demo_content::add_post(array(
	'title' => '10 Outfits Inspired by Famous Works of Art are Auctioned in London',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_women_id,),
));

$post_td_post_the_make_up_conference_in_paris_this_fall_unveils_hot_innovations_id = td_demo_content::add_post(array(
	'title' => 'The Make-up Conference in Paris this Fall Unveils Hot Innovations',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_women_id,),
));

$post_td_post_cover_girl_announces_star_shine_makeup_line_is_due_for_next_december_id = td_demo_content::add_post(array(
	'title' => 'Cover Girl Announces Star Shine Makeup Line is Due for Next December',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_women_id,),
));

$post_td_post_celebrity_make_up_artist_glenny_meyers_shows_you_her_beauty_tricks_id = td_demo_content::add_post(array(
	'title' => 'Celebrity Make-up Artist Glenny Meyers Shows you Her Beauty Tricks',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_celebrity_id,),
));

$post_td_post_kristen_stewart_visits_the_opened_bahamas_resort_with_new_boyfriend_id = td_demo_content::add_post(array(
	'title' => 'Kristen Stewart Visits the Opened Bahamas Resort with New Boyfriend',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_celebrity_id,),
));

$post_td_post_the_biggest_hollywood_celebrities_visit_the_ranches_of_california_id = td_demo_content::add_post(array(
	'title' => 'The Biggest Hollywood Celebrities Visit the Ranches of California',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_celebrity_id,),
));

$post_td_post_fashion_finder_biggest_shows_parties_and_celebrity_for_new_years_id = td_demo_content::add_post(array(
	'title' => 'Fashion Finder: Biggest Shows, Parties and Celebrity for New Years',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_celebrity_id,),
));

$post_td_post_the_most_popular_celebrity_name_list_of_the_millennium_is_here_id = td_demo_content::add_post(array(
	'title' => 'The Most Popular Celebrity Name List of the Millennium is Here',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_celebrity_id,),
));

$post_td_post_customer_engagement_marketing_new_strategy_for_the_economy_id = td_demo_content::add_post(array(
	'title' => 'Customer Engagement Marketing: New Strategy for the Economy',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'tds_locker' => '5',
	'categories_id_array' => array($cat_marketing_id,),
));

$post_td_post_social_media_marketing_for_franchises_is_meant_for_women_id = td_demo_content::add_post(array(
	'title' => 'Social Media Marketing for Franchises is Meant for Women',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_marketing_id,),
));

$post_td_post_computer_crypto_gaming_will_be_the_future_of_e_commerce_id = td_demo_content::add_post(array(
	'title' => 'Computer Crypto Gaming Will Be the Future of E-Commerce',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_marketing_id,),
));

$post_td_post_entrepreneurial_advertising_the_future_of_marketing_id = td_demo_content::add_post(array(
	'title' => 'Entrepreneurial Advertising: The Future of Marketing',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_marketing_id,),
));

$post_td_post_mary_clark_gave_glamour_and_class_to_her_social_following_id = td_demo_content::add_post(array(
	'title' => 'Mary Clark Gave Glamour and Class to Her Social Following',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_marketing_id,),
));

$post_td_post_hottest_wearable_tech_and_smart_gadgets_of_2022_will_blow_your_mind_id = td_demo_content::add_post(array(
	'title' => 'Hottest Wearable Tech and Smart Gadgets of 2022 Will Blow Your Mind',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_technology_id,),
));

$post_td_post_computers_climb_the_list_of_the_top_gadgets_in_forbes_magazine_id = td_demo_content::add_post(array(
	'title' => 'Computers Climb the List of the Top Gadgets in Forbes Magazine',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_technology_id,),
));

$post_td_post_technology_will_help_keep_your_smartphone_from_becoming_obsolete_id = td_demo_content::add_post(array(
	'title' => 'Technology Will Help Keep Your Smartphone from Becoming Obsolete',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_technology_id,),
));

$post_td_post_new_soundboard_review_pricing_is_not_always_the_only_criteria_id = td_demo_content::add_post(array(
	'title' => 'New Soundboard Review: Pricing is Not Always the Only Criteria',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_technology_id,),
));

$post_td_post_discover_these_waterproof_and_rugged_smartphones_that_go_on_sale_id = td_demo_content::add_post(array(
	'title' => 'Discover these Waterproof and Rugged Smartphones that Go on Sale',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_technology_id,),
));

$post_td_post_altcoins_land_50_billion_in_another_funding_round_with_investors_id = td_demo_content::add_post(array(
	'title' => 'Altcoins Land $50 Billion in Another Funding Round with Investors',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'tds_locker' => '5',
	'categories_id_array' => array($cat_finance_id,),
));

$post_td_post_companies_will_invest_at_least_125_billion_in_metaverse_development_id = td_demo_content::add_post(array(
	'title' => 'Companies Will Invest At Least $125 Billion in Metaverse Development',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_finance_id,),
));

$post_td_post_a_look_at_how_social_media_mobile_gaming_can_increase_adoption_id = td_demo_content::add_post(array(
	'title' => 'A Look at How Social Media & Mobile Gaming Can Increase Adoption',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_finance_id,),
));

$post_td_post_the_secret_to_your_companys_financial_health_is_very_important_id = td_demo_content::add_post(array(
	'title' => 'The Secret to Your Company\'s Financial Health is Very Important',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'tds_locker' => '5',
	'categories_id_array' => array($cat_finance_id,),
));

$post_td_post_things_to_look_for_in_a_financial_trading_platform_environment_id = td_demo_content::add_post(array(
	'title' => 'Things to Look For in a Financial Trading Platform Environment',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_finance_id,),
));

$post_the_politics_behind_moscows_stock_market_turbulence_last_week_id = td_demo_content::add_post(array(
	'title' => 'The Politics Behind Moscow\'s Stock Market Turbulence Last Week',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'tds_locker' => '5',
	'categories_id_array' => array($cat_politics_id,),
));

$post_what_you_didnt_know_about_the_true_reasons_for_the_war_in_ukraine_id = td_demo_content::add_post(array(
	'title' => 'What You Didn\'t Know About the True Reasons for the War in Ukraine',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_politics_id,),
));

$post_expanding_peaceful_political_climate_is_up_for_this_negotiation_round_id = td_demo_content::add_post(array(
	'title' => 'Expanding Peaceful Political Climate is up for this Negotiation Round',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_politics_id,),
));

$post_the_scars_of_war_will_remain_there_for_life_published_study_finds_id = td_demo_content::add_post(array(
	'title' => 'The Scars of War Will Remain There for Life, Published Study Finds',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'tds_locker' => '5',
	'categories_id_array' => array($cat_politics_id,),
));

$post_the_press_conference_everyone_is_waiting_for_peace_for_ukraine_id = td_demo_content::add_post(array(
	'title' => 'The Press Conference Everyone is Waiting for: Peace for Ukraine',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'tds_locker' => '5',
	'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_the_car_insurance_catch_that_can_double_your_cover_in_two_months_id = td_demo_content::add_post(array(
	'title' => 'The Car Insurance Catch that can Double Your Cover in Two Months',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_celebrity_id,$cat_finance_id,$cat_food_id,$cat_marketing_id,$cat_music_id,$cat_politics_id,$cat_technology_id,$cat_travel_id,$cat_women_id,),
));

$post_td_post_the_weirdest_places_ashes_have_been_scattered_in_new_zeeland_id = td_demo_content::add_post(array(
	'title' => 'The Weirdest Places Ashes Have Been Scattered in New Zeeland',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_celebrity_id,$cat_finance_id,$cat_food_id,$cat_marketing_id,$cat_music_id,$cat_politics_id,$cat_technology_id,$cat_travel_id,$cat_women_id,),
));

$post_td_post_watch_awesome_kate_halle_go_full_wiming_pro_in_the_bahamas_id = td_demo_content::add_post(array(
	'title' => 'Watch Awesome Kate Halle Go Full Wiming Pro in the Bahamas',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_celebrity_id,$cat_finance_id,$cat_food_id,$cat_marketing_id,$cat_music_id,$cat_politics_id,$cat_technology_id,$cat_travel_id,$cat_women_id,),
));

$post_td_post_the_next_wave_of_superheroes_has_arrived_with_astonishing_speed_id = td_demo_content::add_post(array(
	'title' => 'The Next Wave of Superheroes Has Arrived with Astonishing Speed',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_celebrity_id,$cat_finance_id,$cat_food_id,$cat_marketing_id,$cat_music_id,$cat_politics_id,$cat_technology_id,$cat_travel_id,$cat_women_id,),
));

$post_td_post_silicon_valley_stunned_by_the_fulminant_slashed_investments_id = td_demo_content::add_post(array(
	'title' => 'Silicon Valley Stunned by the Fulminant Slashed Investments',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_celebrity_id,$cat_finance_id,$cat_food_id,$cat_marketing_id,$cat_music_id,$cat_politics_id,$cat_technology_id,$cat_travel_id,$cat_women_id,),
));


/*  ---------------------------------------------------------------------------- 
	PRODUCTS
*/




/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/
$template_tag_template_downtown_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Tag Template - Downtown PRO',
	'file' => 'tag_cloud_template.txt',
	'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_downtown_pro_id);


$template_date_template_downtown_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Date Template - Downtown PRO',
	'file' => 'date_cloud_template.txt',
	'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_downtown_pro_id);


$template_search_template_downtown_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Search Template - Downtown PRO',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_downtown_pro_id);


$template_author_template_downtown_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Author Template - Downtown PRO',
	'file' => 'author_cloud_template.txt',
	'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_downtown_pro_id);


$template_category_template_downtown_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Category Template - Downtown PRO',
	'file' => 'cat_cloud_template.txt',
	'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_downtown_pro_id);


$template_404_template_downtown_pro_id = td_demo_content::add_cloud_template(array(
	'title' => '404 Template - Downtown PRO',
	'file' => '404_cloud_template.txt',
	'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_downtown_pro_id);


$template_single_post_template_downtown_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Single Post Template - Downtown PRO',
	'file' => 'post_cloud_template.txt',
	'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_post_template_downtown_pro_id);


$template_footer_downtown_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Footer - Downtown PRO',
	'file' => 'footer_cloud_template.txt',
	'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_downtown_pro_id);


$template_header_template_downtown_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Header Template - Downtown PRO',
	'file' => 'header_cloud_template.txt',
	'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_downtown_pro_id);


update_post_meta( $template_header_template_downtown_pro_id, 'header_mobile_menu_id', $menu_td_demo_custom_menu_id);




/*  ----------------------------------------------------------------------------
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_page(array(
    'title' => 'Home',
    'add_to_menu_id' => $menu_td_demo_custom_menu_id,
    'page_id' => $page_home_id,
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_category(array(
    'title' => 'Finance',
    'add_to_menu_id' => $menu_td_demo_custom_menu_id,
    'category_id' => $cat_finance_id,
    'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_category(array(
    'title' => 'Marketing',
    'add_to_menu_id' => $menu_td_demo_custom_menu_id,
    'category_id' => $cat_marketing_id,
    'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_category(array(
    'title' => 'Politics',
    'add_to_menu_id' => $menu_td_demo_custom_menu_id,
    'category_id' => $cat_politics_id,
    'parent_id' => ''
));

$menu_item_4_id = td_demo_menus::add_category(array(
    'title' => 'Technology',
    'add_to_menu_id' => $menu_td_demo_custom_menu_id,
    'category_id' => $cat_technology_id,
    'parent_id' => ''
));

$menu_item_5_id = td_demo_menus::add_category(array(
    'title' => 'Women',
    'add_to_menu_id' => $menu_td_demo_custom_menu_id,
    'category_id' => $cat_women_id,
    'parent_id' => ''
));

$menu_item_6_id = td_demo_menus::add_category(array(
    'title' => 'Celebrity',
    'add_to_menu_id' => $menu_td_demo_custom_menu_id,
    'category_id' => $cat_celebrity_id,
    'parent_id' => ''
));

$menu_item_7_id = td_demo_menus::add_category(array(
    'title' => 'Travel',
    'add_to_menu_id' => $menu_td_demo_custom_menu_id,
    'category_id' => $cat_travel_id,
    'parent_id' => ''
));

$menu_item_8_id = td_demo_menus::add_category(array(
    'title' => 'Food',
    'add_to_menu_id' => $menu_td_demo_custom_menu_id,
    'category_id' => $cat_food_id,
    'parent_id' => ''
));

$menu_item_9_id = td_demo_menus::add_category(array(
    'title' => 'Music',
    'add_to_menu_id' => $menu_td_demo_custom_menu_id,
    'category_id' => $cat_music_id,
    'parent_id' => ''
));



/*  ----------------------------------------------------------------------------
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_link(array(
    'title' => 'About us',
    'add_to_menu_id' => $menu_td_demo_footer_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_link(array(
    'title' => 'Contact us',
    'add_to_menu_id' => $menu_td_demo_footer_menu_id,
    'url' => '#',
    'parent_id' => ''
));



/*  ----------------------------------------------------------------------------
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_mega_menu(array(
    'title' => 'News',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_news_id,
    'parent_id' => ''
), true);

$menu_item_1_id = td_demo_menus::add_category(array(
    'title' => 'Women',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_women_id,
    'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_category(array(
    'title' => 'Celebrity',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_celebrity_id,
    'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_category(array(
    'title' => 'Travel',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_travel_id,
    'parent_id' => ''
));

$menu_item_4_id = td_demo_menus::add_category(array(
    'title' => 'Food',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_food_id,
    'parent_id' => ''
));

$menu_item_5_id = td_demo_menus::add_category(array(
    'title' => 'Music',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_music_id,
    'parent_id' => ''
));



/*  ---------------------------------------------------------------------------- 
	GENERAL SETTINGS
*/
td_demo_misc::update_background('', false);

td_demo_misc::update_background_mobile('td_pic_5');

td_demo_misc::update_background_login('td_pic_5');

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
