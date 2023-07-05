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



$plan_monthly_plan___today_news_pro_id = td_demo_subscription::add_plan( array(
        'name' => 'Monthly Plan - Today News PRO',
        'price' => '13',
        'months_in_cycle' => '1',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"3662419a3e32589";}',
    )
);

$plan_yearly_plan___today_news_pro_id = td_demo_subscription::add_plan( array(
        'name' => 'Yearly Plan - Today News PRO',
        'price' => '100',
        'months_in_cycle' => '12',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"1162419a3e32651";}',
    )
);

$page_payment_page_id_id = td_demo_content::add_page(array(
    'title' => 'Checkout - Today News PRO',
    'file' => 'checkout_today_news_pro.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'payment_page_id',
        'value' => $page_payment_page_id_id,
    )
);

$page_my_account_page_id_id = td_demo_content::add_page(array(
    'title' => 'My Account - Today News PRO',
    'file' => 'my_account_today_news_pro.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'my_account_page_id',
        'value' => $page_my_account_page_id_id,
    )
);

$page_create_account_page_id_id = td_demo_content::add_page(array(
    'title' => 'Login/Register - Today News PRO',
    'file' => 'login_register_today_news_pro.txt',
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
$cat_entertainment_id = td_demo_category::add_category(array(
    'category_name' => 'Entertainment',
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

$cat_movies_id = td_demo_category::add_category(array(
    'category_name' => 'Movies',
    'parent_id' => $cat_entertainment_id,
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
    'parent_id' => $cat_entertainment_id,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => '',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_tv_id = td_demo_category::add_category(array(
    'category_name' => 'TV',
    'parent_id' => $cat_entertainment_id,
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

$cat_fashion_id = td_demo_category::add_category(array(
    'category_name' => 'Fashion',
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
$page_search_modal_today_news_pro_id = td_demo_content::add_page(array(
    'title' => 'Search Modal - Today News PRO',
    'file' => 'search_modal_today_news_pro.txt',
    'demo_unique_id' => '4762419a3e4657a',
));

$page_home_id = td_demo_content::add_page(array(
    'title' => 'Home',
    'file' => 'home.txt',
    'homepage' => true,
    'demo_unique_id' => '162419a3e46cce',
));

$page_select_plan_today_news_pro_id = td_demo_content::add_page(array(
    'title' => 'Select Plan - Today News PRO',
    'file' => 'select_plan_today_news_pro.txt',
    'demo_unique_id' => '062419a3e47152',
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
        'title' => 'Subscription Locker - Today News PRO',
        'file' => '',
        'categories_id_array' => [],
        'tds_locker_settings' => array(
            'tds_title' => 'Exclusive content',
            'tds_message' => 'Subscribe to get access to premium articles like this one.',
            'tds_submit_btn_text' => 'Unlock',
            'tds_pp_msg' => 'I consent to processing of my data according to <a href=\"#\">Terms of Use</a> & <a href=\"#\">Privacy Policy</a>',
            'tds_locker_cf_1_name' => 'Custom field 1',
            'tds_locker_cf_2_name' => 'Custom field 2',
            'tds_locker_cf_3_name' => 'Custom field 3',
        ),
        'tds_payable' => 'paid_subscription',
        'tds_paid_subs_page_id' => $page_select_plan_today_news_pro_id,
        'tds_paid_subs_plan_ids' => [$plan_monthly_plan___today_news_pro_id,$plan_yearly_plan___today_news_pro_id],
        'tds_locker_styles' => array(
            'tds_title_color' => '#000000',
            'tds_message_color' => '#222222',
            'tds_submit_btn_text_color' => '#ffffff',
            'tds_submit_btn_text_color_h' => '#ffffff',
            'tds_submit_btn_bg_color' => '#ce0000',
            'tds_submit_btn_bg_color_h' => '#ce0000',
            'tds_pp_checked_color' => '#ce0000',
            'tds_pp_msg_color' => '#222222',
            'tds_pp_msg_links_color' => '#ce0000',
            'tds_pp_msg_links_color_h' => '#000000',
            'tds_general_font_family' => '394',
            'tds_title_font_size' => '24',
            'tds_title_font_line_height' => '1.2',
            'tds_title_font_weight' => '700',
            'tds_title_font_transform' => 'uppercase',
            'tds_title_font_spacing' => '-2',
            'tds_message_font_size' => '13',
            'tds_message_font_line_height' => '1.3',
            'tds_message_font_weight' => '500',
            'tds_submit_btn_text_font_size' => '13',
            'tds_submit_btn_text_font_weight' => '700',
            'tds_submit_btn_text_font_transform' => 'uppercase',
            'tds_after_btn_text_font_weight' => '500',
        ),
    )
);

td_util::update_option('tds_demo_options', 'a:1:{s:5:"plans";a:2:{i:0;a:2:{s:9:"unique_id";s:15:"3662419a3e32589";s:4:"name";s:29:"Monthly Plan - Today News PRO";}i:1;a:2:{s:9:"unique_id";s:15:"1162419a3e32651";s:4:"name";s:28:"Yearly Plan - Today News PRO";}}}');


/*  ----------------------------------------------------------------------------
	SUBSCRIPTION - end phase 2
*/

/*  ----------------------------------------------------------------------------
	POSTS
*/
$post_td_post_bookings_surge_for_holidays_in_spain_greece_and_portugal_as_travel_rules_eased_id = td_demo_content::add_post(array(
    'title' => 'Bookings Surge For Holidays in Spain, Greece As Travel Rules Eased',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_inside_disneys_private_island_with_water_parks_beach_bbqs_and_lavish_cabanas_id = td_demo_content::add_post(array(
    'title' => 'Inside Disney\'s Private Island With Water Parks, Beach BBQs And Lavish Cabanas',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_first_look_at_new_peppa_pig_theme_park_opening_this_month_from_the_rides_to_lands_id = td_demo_content::add_post(array(
    'title' => 'First Look At New Peppa Pig Theme Park Opening This Month From The Rides to Lands',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_inside_lavish_cruise_ship_sky_princess_including_the_cabins_pools_and_restaurants_id = td_demo_content::add_post(array(
    'title' => 'Inside Lavish Cruise Ship Sky Princess Including The Cabins, Pools And Restaurants',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_where_is_the_crown_filmed_netflix_dramas_uk_filming_locations_you_can_visit_id = td_demo_content::add_post(array(
    'title' => 'Where is The Crown Filmed? Netflix Drama\'s UK Filming Locations You Can Visit',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_kate_middleton_is_on_board_with_this_comfy_pants_trend_that_deviates_from_her_norm_id = td_demo_content::add_post(array(
    'title' => 'Kate Middleton Is On Board with This Comfy Pants Trend That Deviates from Her Norm',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'categories_id_array' => array($cat_fashion_id,),
));

$post_td_post_qatar_activities_for_world_cup_football_fans_from_desert_safaris_to_sand_surfing_id = td_demo_content::add_post(array(
    'title' => 'Qatar Activities For World Cup Football Fans - From Desert Safaris to Sand Surfing',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_sydney_sweeneys_euphoria_mary_jane_pumps_are_surprisingly_still_in_stock_id = td_demo_content::add_post(array(
    'title' => 'Sydney Sweeney\'s Euphoria Mary Jane Pumps Are Surprisingly Still in Stock',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'categories_id_array' => array($cat_fashion_id,),
));

$post_td_post_of_course_jennifer_aniston_is_wearing_uggs_on_the_set_of_murder_mystery_2_id = td_demo_content::add_post(array(
    'title' => 'Of Course Jennifer Aniston Is Wearing Uggs on the Set of Murder Mystery 2',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_fashion_id,),
));

$post_td_post_jessica_alba_gave_a_big_shout_out_to_this_ethical_handbag_for_womens_history_month_id = td_demo_content::add_post(array(
    'title' => 'Jessica Alba Gave a Big Shout-Out to This Ethical Handbag for Women\'s History Month',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_fashion_id,),
));

$post_td_post_diane_keaton_danced_around_in_two_comfy_staples_youll_see_everywhere_this_spring_id = td_demo_content::add_post(array(
    'title' => 'Diane Keaton Danced Around in Two Comfy Staples You\'ll See Everywhere This Spring',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'categories_id_array' => array($cat_fashion_id,),
));

$post_td_post_tom_parkers_wife_kelsey_shares_message_on_strength_amid_husbands_cancer_battle_id = td_demo_content::add_post(array(
    'title' => 'Tom Parker\'s Wife Kelsey Shares Message On Strength Amid Husband\'s Cancer Battle',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'categories_id_array' => array($cat_celebs_id,),
));

$post_td_post_jennifer_lopez_wore_the_practical_closet_staple_jennifer_garner_loves_too_id = td_demo_content::add_post(array(
    'title' => 'Jennifer Lopez Wore the Practical Closet Staple Jennifer Garner Loves, Too',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'categories_id_array' => array($cat_fashion_id,),
));

$post_td_post_molly_mae_hague_hints_she_and_tommy_fury_are_preparing_to_move_into_their_new_home_id = td_demo_content::add_post(array(
    'title' => 'Molly-Mae Hague Hints She And Tommy Fury Are Preparing to Move Into Their New Home',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_celebs_id,),
));

$post_td_post_emily_atack_eats_the_same_thing_everyday_and_admits_shes_obsessed_with_it_id = td_demo_content::add_post(array(
    'title' => 'Emily Atack Eats The Same Thing Everyday And Admits She\'s \'Obsessed\' With It',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'categories_id_array' => array($cat_celebs_id,),
));

$post_td_post_pregnant_rihanna_says_shell_go_psycho_if_anyone_messes_with_her_baby_id = td_demo_content::add_post(array(
    'title' => 'Pregnant Rihanna Says She\'ll Go \'Psycho\' If Anyone Messes With Her Baby',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'categories_id_array' => array($cat_celebs_id,),
));

$post_td_post_tom_hiddleston_engaged_to_girlfriend_zawe_ashton_after_pair_played_husband_and_wife_id = td_demo_content::add_post(array(
    'title' => 'Tom Hiddleston Engaged to Girlfriend Zawe After Pair Played Husband And Wife',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_celebs_id,),
));

$post_td_post_kim_kardashian_urges_people_to_find_happiness_as_kanye_hits_at_her_relationship_id = td_demo_content::add_post(array(
    'title' => 'Kim Urges People to \'Find Happiness\' as Kanye Hits at Her Relationship',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_celebs_id,),
));

$post_td_post_jack_harlow_stopped_drinking_because_he_doesnt_feel_the_need_to_do_boyish_things_id = td_demo_content::add_post(array(
    'title' => 'Jack Harlow Stopped Drinking Because He Doesn\'t Feel the \'Need to Do Boyish Things\'',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_entertainment_id,$cat_music_id,),
));

$post_td_post_unreleased_prince_album_camille_will_see_release_thanks_to_jack_whites_record_label_id = td_demo_content::add_post(array(
    'title' => 'Unreleased Prince Album Camille Will See Release Thanks to Jack White\'s Record Label',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_entertainment_id,$cat_music_id,),
));

$post_td_post_joe_jonas_says_he_had_a_blast_turning_into_a_bridgerton_for_new_tanqueray_campaign_id = td_demo_content::add_post(array(
    'title' => 'Joe Jonas Says He \'Had a Blast\' Turning Into a Bridgerton for New Tanqueray Campaign',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_entertainment_id,$cat_music_id,),
));

$post_td_post_vance_joy_releases_a_chilled_and_hypnotic_live_video_version_of_dont_fade_watch_id = td_demo_content::add_post(array(
    'title' => 'Vance Joy Releases a \'Chilled\' and \'Hypnotic\' Live Video Version of \'Don\'t Fade\' — Watch',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_entertainment_id,$cat_music_id,),
));

$post_td_post_breland_opens_up_about_his_first_award_show_nomination_i_dont_take_it_for_granted_id = td_demo_content::add_post(array(
    'title' => 'BRELAND Opens Up About His First Award Show Nomination: \'I Don\'t Take It for Granted\'',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_entertainment_id,$cat_music_id,),
));

$post_td_post_lily_collins_husband_says_directing_her_in_windfall_was_distracting_in_kissing_scene_id = td_demo_content::add_post(array(
    'title' => 'Lily Collins\' Husband Says Directing Her in Windfall Was \'Distracting\' in Kissing Scene',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_entertainment_id,$cat_movies_id,),
));

$post_td_post_kanye_west_is_being_locked_out_of_his_instagram_by_meta_for_24_hours_due_to_harassing_posts_id = td_demo_content::add_post(array(
    'title' => 'Kanye West Is Being Locked Out of His Instagram by Meta for 24 Hours Due to Harassing Posts',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_entertainment_id,$cat_music_id,),
));

$post_td_post_ryan_reynolds_spoofs_in_flight_safety_video_as_british_airways_begins_carrying_aviation_gin_id = td_demo_content::add_post(array(
    'title' => 'Ryan Reynolds Spoofs In-Flight Safety Video as British Airways Begins Carrying Aviation Gin',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_entertainment_id,$cat_movies_id,),
));

$post_td_post_nicolas_cage_wants_to_play_batman_villain_egghead_i_can_make_him_absolutely_terrifying_id = td_demo_content::add_post(array(
    'title' => 'Nicolas Cage Wants to Play Batman Villain Egghead: \'I Can Make Him Absolutely Terrifying\'',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_entertainment_id,$cat_movies_id,),
));

$post_td_post_joseph_baena_honors_beautiful_mom_for_birthday_you_inspire_motivate_and_push_me_id = td_demo_content::add_post(array(
    'title' => 'Joseph Baena Honors \'Beautiful\' Mom for Birthday: \'You Inspire, Motivate and Push Me\'',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_entertainment_id,$cat_movies_id,),
));

$post_td_post_netflix_will_test_charging_users_for_sharing_subscriptions_outside_of_their_households_id = td_demo_content::add_post(array(
    'title' => 'Netflix Will Test Charging Users for Sharing Subscriptions Outside of Their Households',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_entertainment_id,$cat_movies_id,),
));

$post_td_post_will_reading_opposing_reviews_of_his_films_did_they_even_look_at_the_same_movie_id = td_demo_content::add_post(array(
    'title' => 'Will Reading \'Opposing Reviews\' of His Films: \'Did They Even Look at the Same Movie?\'',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_entertainment_id,$cat_movies_id,),
));

$post_td_post_tipsy_josie_gibson_struggles_to_read_this_morning_autocue_in_hilarious_footage_id = td_demo_content::add_post(array(
    'title' => '\'Tipsy\' Josie Gibson Struggles to Read This Morning Autocue in Hilarious Footage',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_entertainment_id,$cat_tv_id,),
));

$post_td_post_gmb_fans_slam_richard_madeleys_ridiculous_food_question_to_ukrainian_volunteer_id = td_demo_content::add_post(array(
    'title' => 'GMB Fans Slam Richard Madeley\'s \'Ridiculous\' Food Question to Ukrainian Volunteer',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_entertainment_id,$cat_tv_id,),
));

$post_td_post_little_britain_back_on_bbc_after_edits_to_better_reflect_cultural_landscape_id = td_demo_content::add_post(array(
    'title' => 'Little Britain Back on BBC After Edits to \'Better Reflect\' Cultural Landscape',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_entertainment_id,$cat_tv_id,),
));

$post_td_post_emmerdale_fans_puzzled_by_dawns_mistake_as_she_betrays_alex_in_huge_soap_twist_id = td_demo_content::add_post(array(
    'title' => 'Emmerdale Fans Puzzled By Dawn\'s Mistake As She Betrays Alex in Huge Soap Twist',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_entertainment_id,$cat_tv_id,),
));

$post_td_post_eurovision_hopeful_sam_ryder_says_cliquey_scoreboard_nearly_put_him_off_competition_id = td_demo_content::add_post(array(
    'title' => 'Eurovision Hopeful Sam Ryder Says \'Cliquey Scoreboard\' Nearly Put Him Off Competition',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_entertainment_id,$cat_tv_id,),
));

$post_td_post_ellen_degeneres_to_hand_out_millions_of_dollars_in_bonuses_as_hit_talk_show_ends_id = td_demo_content::add_post(array(
    'title' => 'Ellen DeGeneres to Hand Out \'Millions\' Of Dollars in Bonuses As Hit Talk Show Ends',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_entertainment_id,$cat_tv_id,),
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
    'title' => 'Home',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'page_id' => $page_home_id,
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Entertainment',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_entertainment_id,
    'parent_id' => ''
), true);

$menu_item_2_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Celebs',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_celebs_id,
    'parent_id' => ''
), true);

$menu_item_3_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Fashion',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_fashion_id,
    'parent_id' => ''
), true);

$menu_item_4_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Travel',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_travel_id,
    'parent_id' => ''
), true);


/*  ----------------------------------------------------------------------------
	CLOUD TEMPLATES
*/
$template_tag_template_today_news_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Tag Template - Today News PRO',
    'file' => 'tag_cloud_template.txt',
    'template_type' => 'tag',
));
td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_today_news_pro_id);


$template_search_template_today_news_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Search Template - Today News PRO',
    'file' => 'search_cloud_template.txt',
    'template_type' => 'search',
));
td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_today_news_pro_id);


$template_date_template_today_news_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Date Template - Today News PRO',
    'file' => 'date_cloud_template.txt',
    'template_type' => 'date',
));
td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_today_news_pro_id);


$template_author_template_today_news_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Author Template - Today News PRO',
    'file' => 'author_cloud_template.txt',
    'template_type' => 'author',
));
td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_today_news_pro_id);


$template_category_template_today_news_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Category Template - Today News PRO',
    'file' => 'cat_cloud_template.txt',
    'template_type' => 'category',
));
td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_today_news_pro_id);


$template_single_template_today_news_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Single Template - Today News PRO',
    'file' => 'post_cloud_template.txt',
    'template_type' => 'single',
));
td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_today_news_pro_id);


$template_404_template_today_news_pro_id = td_demo_content::add_cloud_template(array(
    'title' => '404 Template - Today News PRO',
    'file' => '404_cloud_template.txt',
    'template_type' => '404',
));
td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_today_news_pro_id);


$template_footer_template_today_news_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Footer Template - Today News PRO',
    'file' => 'footer_cloud_template.txt',
    'template_type' => 'footer',
));
td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_today_news_pro_id);


$template_header_template_today_news_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Header Template - Today News PRO',
    'file' => 'header_cloud_template.txt',
    'template_type' => 'header',
));
td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_today_news_pro_id);


update_post_meta( $template_header_template_today_news_pro_id, 'header_mobile_menu_id', $menu_td_demo_header_menu_id);



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

td_demo_misc::add_social_buttons(array('facebook' => '#','instagram' => '#','tiktok' => '#','twitter' => '#',));

$generated_css = td_css_generator();
if ( function_exists('tdsp_css_generator') ) {
    $generated_css .= tdsp_css_generator();
}
td_util::update_option( 'tds_user_compile_css', $generated_css );
