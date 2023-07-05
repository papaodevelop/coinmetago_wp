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



$plan_yearly_plan___military_news_pro_id = td_demo_subscription::add_plan( array(
        'name' => 'Yearly Plan - Military News PRO',
        'price' => '125',
        'months_in_cycle' => '12',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"5261efea5c420b9";}',
    )
);

$plan_monthly_plan___military_news_pro_id = td_demo_subscription::add_plan( array(
        'name' => 'Monthly Plan - Military News PRO',
        'price' => '12.99',
        'months_in_cycle' => '1',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"9461efea5c4215f";}',
    )
);

$plan_free_plan___military_news_pro_id = td_demo_subscription::add_plan( array(
        'name' => 'Free Plan - Military News PRO',
        'price' => '',
        'months_in_cycle' => '',
        'trial_days' => '0',
        'is_free' => '1',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"8761efea5c421aa";}',
    )
);

$page_payment_page_id_id = td_demo_content::add_page(array(
    'title' => 'Checkout - military_news_pro',
    'file' => 'checkout_military_news_pro.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'payment_page_id',
        'value' => $page_payment_page_id_id,
    )
);

$page_my_account_page_id_id = td_demo_content::add_page(array(
    'title' => 'My Account - military_news_pro',
    'file' => 'my_account_military_news_pro.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'my_account_page_id',
        'value' => $page_my_account_page_id_id,
    )
);

$page_create_account_page_id_id = td_demo_content::add_page(array(
    'title' => 'Login/Register - military_news_pro',
    'file' => 'login_register_military_news_pro.txt',
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

$cat_air_force_id = td_demo_category::add_category(array(
    'category_name' => 'Air Force',
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

$cat_army_id = td_demo_category::add_category(array(
    'category_name' => 'Army',
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

$cat_global_id = td_demo_category::add_category(array(
    'category_name' => 'Global',
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

$cat_flashpoints_id = td_demo_category::add_category(array(
    'category_name' => 'Flashpoints',
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

$cat_military_honor_id = td_demo_category::add_category(array(
    'category_name' => 'Military Honor',
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

$cat_off_duty_id = td_demo_category::add_category(array(
    'category_name' => 'Off Duty',
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
$page_premium_content_id = td_demo_content::add_page(array(
    'title' => 'Premium Content',
    'file' => 'premium_content.txt',
    'demo_unique_id' => '2961efea5c60291',
));

$page_switching_plans_military_news_pro_id = td_demo_content::add_page(array(
    'title' => 'Switching plans - Military News PRO',
    'file' => 'switching_plans_military_news_pro.txt',
    'demo_unique_id' => '5761efea5c60756',
));

$page_home_id = td_demo_content::add_page(array(
    'title' => 'Home',
    'file' => 'home.txt',
    'homepage' => true,
    'demo_unique_id' => '6061efea5c61121',
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
        'title' => 'Subscription Locker - Military News PRO',
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
        'tds_paid_subs_page_id' => $page_switching_plans_military_news_pro_id,
        'tds_paid_subs_plan_ids' => [$plan_yearly_plan___military_news_pro_id,$plan_monthly_plan___military_news_pro_id,$plan_free_plan___military_news_pro_id],
        'tds_locker_styles' => array(
            'tds_submit_btn_bg_color' => '#ef6421',
            'tds_submit_btn_bg_color_h' => '#1f1f11',
            'tds_pp_checked_color' => '#ef6421',
            'tds_pp_check_border_color_f' => '#ef6421',
            'tds_pp_msg_links_color' => '#ef6421',
            'tds_pp_msg_links_color_h' => '#1f1f11',
            'tds_general_font_family' => '325',
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

td_util::update_option('tds_demo_options', 'a:1:{s:5:"plans";a:3:{i:0;a:2:{s:9:"unique_id";s:15:"5261efea5c420b9";s:4:"name";s:31:"Yearly Plan - Military News PRO";}i:1;a:2:{s:9:"unique_id";s:15:"9461efea5c4215f";s:4:"name";s:32:"Monthly Plan - Military News PRO";}i:2;a:2:{s:9:"unique_id";s:15:"8761efea5c421aa";s:4:"name";s:29:"Free Plan - Military News PRO";}}}');


/*  ----------------------------------------------------------------------------
	SUBSCRIPTION - end phase 2
*/

/*  ----------------------------------------------------------------------------
	POSTS
*/
$post_td_post_indonesian_army_to_end_archaic_virginity_test_for_female_soldiers_id = td_demo_content::add_post(array(
    'title' => 'Indonesian army to end archaic virginity test for female soldiers',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_off_duty_id,),
));

$post_td_post_marine_grunts_are_swapping_earplugs_for_21st_century_hearing_protection_id = td_demo_content::add_post(array(
    'title' => 'Marine grunts are swapping earplugs for 21st century hearing protection',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'tds_locker' => '687',
    'categories_id_array' => array($cat_off_duty_id,),
));

$post_td_post_west_point_cadets_are_ditching_bed_making_with_this_elaborate_hack_id = td_demo_content::add_post(array(
    'title' => 'West Point cadets are ditching bed-making with this elaborate hack',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_off_duty_id,),
));

$post_td_post_pin_ups_for_vets_releases_2022_calendar_to_raise_money_for_veterans_id = td_demo_content::add_post(array(
    'title' => 'Pin-Ups For Vets releases 2022 calendar to raise money for veterans',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_off_duty_id,),
));

$post_td_post_this_new_arsof_gym_is_better_than_most_division_i_football_facilities_id = td_demo_content::add_post(array(
    'title' => 'This new ARSOF gym is better than most Division I football facilities',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'tds_locker' => '687',
    'categories_id_array' => array($cat_off_duty_id,),
));

$post_td_post_not_something_you_should_ever_really_see_veterans_reflect_on_9_11_id = td_demo_content::add_post(array(
    'title' => '\'Not something you should ever really see\': Veterans reflect on 9/11',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_off_duty_id,),
));

$post_td_post_website_for_all_active_duty_marines_looking_to_compete_in_esports_id = td_demo_content::add_post(array(
    'title' => 'Website for all active-duty Marines looking to compete in esports',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_off_duty_id,),
));

$post_td_post_how_doc_martens_went_from_wwii_discards_to_producing_grunge_boots_id = td_demo_content::add_post(array(
    'title' => 'How Doc Martens went from WWII discards to producing grunge boots',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'tds_locker' => '687',
    'categories_id_array' => array($cat_off_duty_id,),
));

$post_td_post_these_are_the_states_and_jobs_where_veterans_make_the_most_money_id = td_demo_content::add_post(array(
    'title' => 'These are the states and jobs where veterans make the most money',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'tds_locker' => '687',
    'categories_id_array' => array($cat_military_honor_id,),
));

$post_td_post_marine_corps_toys_for_tots_volunteers_plan_donation_drives_in_pandemic_id = td_demo_content::add_post(array(
    'title' => 'Marine Corps\' Toys for Tots volunteers plan donation drives in pandemic',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_military_honor_id,),
));

$post_td_post_chinese_americans_who_served_in_wwii_honored_by_congress_id = td_demo_content::add_post(array(
    'title' => 'Chinese Americans who served in WWII honored by Congress',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'tds_locker' => '687',
    'categories_id_array' => array($cat_military_honor_id,),
));

$post_td_post_army_ranger_veteran_receives_medal_of_honor_for_korean_war_heroism_id = td_demo_content::add_post(array(
    'title' => 'Army Ranger veteran receives Medal of Honor for Korean War heroism',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'tds_locker' => '687',
    'categories_id_array' => array($cat_military_honor_id,),
));

$post_td_post_normandy_commemorates_d_day_with_small_crowds_but_big_heart_id = td_demo_content::add_post(array(
    'title' => 'Normandy commemorates D-Day with small crowds',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_military_honor_id,),
));

$post_td_post_postal_service_unveils_stamp_honoring_japanese_american_wwii_veterans_id = td_demo_content::add_post(array(
    'title' => 'Postal Service unveils stamp honoring Japanese American WWII veterans',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'tds_locker' => '687',
    'categories_id_array' => array($cat_military_honor_id,),
));

$post_td_post_sailor_of_the_year_2021_changed_how_the_navy_dealt_with_covid_19_id = td_demo_content::add_post(array(
    'title' => 'Sailor of the Year 2021 changed how the Navy dealt with COVID-19',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_military_honor_id,),
));

$post_td_post_marine_raider_veteran_receives_second_highest_valor_award_for_iraq_id = td_demo_content::add_post(array(
    'title' => 'Marine Raider veteran receives second highest valor award for Iraq',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_military_honor_id,),
));

$post_td_post_u_s_bases_prepared_to_process_up_to_50000_afghan_evacuees_id = td_demo_content::add_post(array(
    'title' => 'U.S. bases prepared to process up to 50,000 Afghan evacuees',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_flashpoints_id,),
));

$post_td_post_us_central_command_absorbs_israel_into_its_area_of_responsibility_id = td_demo_content::add_post(array(
    'title' => 'US Central Command absorbs Israel into its area of responsibility',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'tds_locker' => '687',
    'categories_id_array' => array($cat_flashpoints_id,),
));

$post_td_post_us_navy_launches_mideast_drone_task_force_amid_iran_tensions_id = td_demo_content::add_post(array(
    'title' => 'US Navy launches Mideast drone task force amid Iran tensions',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_flashpoints_id,),
));

$post_td_post_grief_comes_home_to_us_towns_week_after_afghanistan_war_ends_id = td_demo_content::add_post(array(
    'title' => 'Grief comes home to US towns week after Afghanistan war ends',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'tds_locker' => '687',
    'categories_id_array' => array($cat_flashpoints_id,),
));

$post_td_post_the_pentagon_is_evaluating_screening_of_afghan_evacuees_for_risks_id = td_demo_content::add_post(array(
    'title' => 'The Pentagon is evaluating screening of Afghan evacuees for risks',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'tds_locker' => '687',
    'categories_id_array' => array($cat_flashpoints_id,),
));

$post_td_post_pause_in_afghan_evacuee_flights_to_us_extended_7_days_due_to_measles_id = td_demo_content::add_post(array(
    'title' => 'Pause in Afghan evacuee flights to US extended 7 days due to measles',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_flashpoints_id,),
));

$post_td_post_7_marines_still_hospitalized_weeks_after_kabul_airport_bombing_id = td_demo_content::add_post(array(
    'title' => '7 Marines still hospitalized weeks after Kabul airport bombing',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'categories_id_array' => array($cat_flashpoints_id,),
));

$post_td_post_nkorea_slams_us_over_submarine_deal_warns_countermeasures_id = td_demo_content::add_post(array(
    'title' => 'NKorea slams US over submarine deal, warns countermeasures',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'tds_locker' => '687',
    'categories_id_array' => array($cat_flashpoints_id,),
));

$post_td_post_four_will_circle_earth_on_1st_spacex_private_flight_ever_id = td_demo_content::add_post(array(
    'title' => 'Four Will Circle Earth on 1st SpaceX Private Flight Ever',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_air_force_id,),
));

$post_td_post_air_force_begins_moving_first_f_35_squadron_into_europe_id = td_demo_content::add_post(array(
    'title' => 'Air Force Begins Moving First F-35 Squadron into Europe',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'tds_locker' => '687',
    'categories_id_array' => array($cat_air_force_id,),
));

$post_td_post_air_force_general_is_second_woman_to_lead_a_top_us_command_id = td_demo_content::add_post(array(
    'title' => 'Air Force General Is Second Woman to Lead a Top US Command',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_air_force_id,),
));

$post_td_post_air_force_official_says_us_to_maintain_presence_in_mideast_id = td_demo_content::add_post(array(
    'title' => 'Air Force Official Says US to Maintain Presence in Mideast',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_air_force_id,),
));

$post_td_post_airmen_have_more_options_to_demonstrate_fitness_as_service_test_id = td_demo_content::add_post(array(
    'title' => 'Airmen Have More Options to Demonstrate Fitness as Service Test',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'tds_locker' => '687',
    'categories_id_array' => array($cat_air_force_id,),
));

$post_td_post_thousands_of_air_guard_reserves_dont_meet_vaccine_deadline_id = td_demo_content::add_post(array(
    'title' => 'Thousands of Air Guard, Reserves Don\'t Meet Vaccine Deadline',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'tds_locker' => '687',
    'categories_id_array' => array($cat_air_force_id,),
));

$post_td_post_the_story_behind_the_netflix_movie_operation_christmas_drop_id = td_demo_content::add_post(array(
    'title' => 'The Story Behind the Netflix Movie \'Operation Christmas Drop\'',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_air_force_id,),
));

$post_td_post_the_brown_berets_the_air_forces_best_kept_secret_id = td_demo_content::add_post(array(
    'title' => 'Meet The Brown Berets. The Air Force\'s \'Best Kept Secret\' Ever',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'tds_locker' => '687',
    'categories_id_array' => array($cat_air_force_id,),
));

$post_td_post_woman_graduates_army_sniper_course_for_the_first_time_id = td_demo_content::add_post(array(
    'title' => 'Woman Graduates Army Sniper Course for the First Time',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_army_id,),
));

$post_td_post_one_vet_wins_big_another_loses_in_3m_earplugs_lawsuits_id = td_demo_content::add_post(array(
    'title' => 'One Vet Wins Big, Another Loses in 3M Earplugs Lawsuits',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_army_id,),
));

$post_td_post_all_soldiers_will_have_email_after_system_change_id = td_demo_content::add_post(array(
    'title' => 'All Soldiers Will Have Email After System Change',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'tds_locker' => '687',
    'categories_id_array' => array($cat_army_id,),
));

$post_td_post_wwii_vet_who_survived_covid_19_honored_on_105th_birthday_id = td_demo_content::add_post(array(
    'title' => 'WWII Vet Who Survived COVID-19 Honored on 105th Birthday',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'tds_locker' => '687',
    'categories_id_array' => array($cat_army_id,),
));

$post_td_post_bob_dole_to_lie_in_state_at_capitol_as_nation_honors_senator_id = td_demo_content::add_post(array(
    'title' => 'Bob Dole to Lie in State at Capitol as Nation Honors Senator',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_army_id,),
));

$post_td_post_army_identifies_1477_officers_for_promotion_to_major_id = td_demo_content::add_post(array(
    'title' => 'Army Identifies 1477 Officers for Promotion to Major',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'tds_locker' => '687',
    'categories_id_array' => array($cat_army_id,),
));

$post_td_post_army_general_seeks_to_strengthen_south_american_military_id = td_demo_content::add_post(array(
    'title' => 'Army General Seeks to Strengthen South American Military',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'tds_locker' => '687',
    'categories_id_array' => array($cat_army_id,),
));

$post_td_post_new_reforms_target_us_militarys_missing_weapons_problem_id = td_demo_content::add_post(array(
    'title' => 'New Reforms Target US Military\'s Missing Weapons Problem',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_army_id,),
));

$post_td_post_marines_meet_motorist_they_pushed_out_of_high_floodwaters_id = td_demo_content::add_post(array(
    'title' => 'Marines meet motorist they pushed out of high floodwaters',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'tds_locker' => '687',
    'categories_id_array' => array($cat_global_id,),
));

$post_td_post_tensions_with_china_grow_as_us_allies_deepen_the_indo_pacific_id = td_demo_content::add_post(array(
    'title' => 'Tensions with China grow as US, allies deepen the Indo-Pacific',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_global_id,),
));

$post_td_post_new_taliban_head_of_security_for_kabul_is_wanted_by_the_u_s_id = td_demo_content::add_post(array(
    'title' => 'New Taliban head of security for Kabul is wanted by the U.S.',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_global_id,),
));

$post_td_post_afghan_allies_who_applied_for_special_visas_still_in_afghanistan_id = td_demo_content::add_post(array(
    'title' => 'Afghan allies who applied for special visas still in Afghanistan',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'tds_locker' => '687',
    'categories_id_array' => array($cat_global_id,),
));

$post_td_post_5_missing_after_navy_helicopter_crashes_into_sea_off_san_diego_id = td_demo_content::add_post(array(
    'title' => '5 missing after Navy helicopter crashes into sea off San Diego',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'tds_locker' => '687',
    'categories_id_array' => array($cat_global_id,),
));

$post_td_post_house_passes_1_billion_for_iron_dome_system_in_blowout_vote_id = td_demo_content::add_post(array(
    'title' => 'House passes $1 billion for Iron Dome system in blowout vote',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_global_id,),
));

$post_td_post_commander_craig_007_star_made_honorary_royal_navy_officer_id = td_demo_content::add_post(array(
    'title' => 'Commander Craig: 007 star made honorary Royal Navy officer',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'tds_locker' => '687',
    'categories_id_array' => array($cat_global_id,),
));

$post_td_post_plans_for_bigger_defense_budget_get_boost_after_bill_vote_id = td_demo_content::add_post(array(
    'title' => 'Plans for bigger defense budget get boost after bill vote',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_global_id,),
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
    'title' => 'News',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_news_id,
    'parent_id' => ''
), true);

$menu_item_2_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Flashpoints',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_flashpoints_id,
    'parent_id' => ''
), true);

$menu_item_3_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Military Honor',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_military_honor_id,
    'parent_id' => ''
), true);

$menu_item_4_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Off Duty',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_off_duty_id,
    'parent_id' => ''
), true);

$menu_item_5_id = td_demo_menus::add_page(array(
    'title' => '<span style="color:var(--military-news-accent)">Premium Content</style>',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'page_id' => $page_premium_content_id,
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


$template_single_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Single Template',
    'file' => 'post_cloud_template.txt',
    'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_id);


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


$template_category_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Category Template',
    'file' => 'cat_cloud_template.txt',
    'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_id);


$template_author_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Author Template',
    'file' => 'author_cloud_template.txt',
    'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_id);


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
