<?php


/*  ----------------------------------------------------------------------------
	PAGES
*/
$page_posts_list_id = td_demo_content::add_page( array(
    'title' => 'Posts List',
    'file' => 'posts_list.txt',
    'demo_unique_id' => '46347d1c93a92f',
));

$page_tab_pricing_plans_id = td_demo_content::add_page( array(
    'title' => 'Tab Pricing Plans',
    'file' => 'tab_pricing_plans.txt',
    'demo_unique_id' => '386347d1c93ad43',
));

$page_video_tutorial_pop_up_id = td_demo_content::add_page( array(
    'title' => 'Video Tutorial Pop Up',
    'file' => 'video_tutorial_pop_up.txt',
    'demo_unique_id' => '566347d1c93b0c7',
));

$page_pricing_plans_id = td_demo_content::add_page( array(
    'title' => 'Pricing Plans',
    'file' => 'pricing_plans.txt',
    'demo_unique_id' => '426347d1c93b51b',
));

$page_eastcoast_check_form_id = td_demo_content::add_page( array(
    'title' => 'EastCoast Check Form',
    'file' => 'eastcoast_check_form.txt',
    'demo_unique_id' => '426347d1c93b961',
));

$page_homepage_id = td_demo_content::add_page( array(
    'title' => 'Homepage',
    'file' => 'homepage.txt',
    'homepage' => true,
    'demo_unique_id' => '176347d1c93c472',
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



$plan_free_plan_id = td_demo_subscription::add_plan( array(
        'name' => 'Free Plan',
        'price' => '',
        'months_in_cycle' => '',
        'trial_days' => '0',
        'is_free' => '1',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:14:"46347d1c90c9cb";}',
    )
);

$plan_monthly_plan_id = td_demo_subscription::add_plan( array(
        'name' => 'Monthly Plan',
        'price' => '10',
        'months_in_cycle' => '1',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"746347d1c90ca1f";}',
    )
);

$plan_yearly_plan_id = td_demo_subscription::add_plan( array(
        'name' => 'Yearly Plan',
        'price' => '100',
        'months_in_cycle' => '12',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"456347d1c90ca67";}',
    )
);

$page_payment_page_id_id = td_demo_content::add_page( array(
    'title' => 'Checkout - eastcoast_check_pro',
    'file' => 'tds_checkout.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'payment_page_id',
        'value' => $page_payment_page_id_id,
    )
);

$page_my_account_page_id_id = td_demo_content::add_page( array(
    'title' => 'My Account - eastcoast_check_pro',
    'file' => 'tds_my_account.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'my_account_page_id',
        'value' => $page_my_account_page_id_id,
    )
);

$page_create_account_page_id_id = td_demo_content::add_page( array(
    'title' => 'Login/Register - eastcoast_check_pro',
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
$cat_blog_id = td_demo_category::add_category(array(
	'category_name' => 'Blog',
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

$cat_events_id = td_demo_category::add_category(array(
	'category_name' => 'Events',
	'parent_id' => $cat_blog_id,
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
	'parent_id' => $cat_blog_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_opinions_id = td_demo_category::add_category(array(
	'category_name' => 'Opinions',
	'parent_id' => $cat_blog_id,
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
	'parent_id' => $cat_blog_id,
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
	SUBSCRIPTIONS
*/
// add locker
$post_tds_default_wizard_locker_id = td_demo_content::add_post( array(
        'post_type' => 'tds_locker',
        'title' => 'Wizard Locker (default)',
        'file' => '',
        'categories_id_array' => [],
        'tds_locker_settings' => array(
            'tds_title' => 'Subscribe to Unlock',
            'tds_message' => 'We promise not to spam you and only send you updates when you give us your email address.',
            'tds_submit_btn_text' => 'Subscribe',
            'tds_pp_msg' => 'I consent to processing of my data according to <a href=\"#\">Terms of Use</a> & <a href=\"#\">Privacy Policy</a>.',
            'tds_locker_cf_1_name' => 'Custom field 1',
            'tds_locker_cf_2_name' => 'Custom field 2',
            'tds_locker_cf_3_name' => 'Custom field 3',
        ),
        'tds_payable' => 'paid_subscription',
        'tds_paid_subs_page_id' => $page_pricing_plans_id,
        'tds_paid_subs_plan_ids' => [$plan_free_plan_id,$plan_monthly_plan_id,$plan_yearly_plan_id],
        'tds_locker_styles' => array(
            'tds_bg_color' => '#ffffff',
            'all_tds_border' => '0',
            'all_tds_border_color' => '#abb8c0',
            'tds_title_color' => '#4d5860',
            'tds_message_color' => '#abb8c0',
            'tds_submit_btn_text_color' => '#4d5860',
            'tds_submit_btn_text_color_h' => '#ffffff',
            'tds_submit_btn_bg_color' => '#ffc03a',
            'tds_submit_btn_bg_color_h' => '#d2930b',
            'tds_pp_checked_color' => '#ffc03a',
            'tds_pp_check_bg' => '#e6eaed',
            'tds_pp_check_bg_f' => '#e6eaed',
            'tds_pp_check_border_color' => '#abb8c0',
            'tds_pp_check_border_color_f' => '#5d7e93',
            'tds_pp_msg_color' => '#abb8c0',
            'tds_pp_msg_links_color' => '#5d7e93',
            'tds_pp_msg_links_color_h' => '#ffc03a',
            'tds_general_font_family' => 'eastcoast-global_global',
            'tds_title_font_family' => 'eastcoast-global_global',
            'tds_title_font_size' => '26',
            'tds_title_font_line_height' => '1.2',
            'tds_title_font_weight' => '700',
            'tds_message_font_family' => 'eastcoast-global_global',
            'tds_message_font_size' => '18',
            'tds_message_font_line_height' => '1.2',
            'tds_message_font_weight' => '500',
            'tds_submit_btn_text_font_family' => 'eastcoast-global_global',
            'tds_submit_btn_text_font_size' => '16',
            'tds_submit_btn_text_font_line_height' => '1.2',
            'tds_submit_btn_text_font_weight' => '700',
            'tds_submit_btn_text_font_transform' => 'uppercase',
            'tds_submit_btn_text_font_spacing' => '1',
            'tds_after_btn_text_font_family' => 'eastcoast-global_global',
            'tds_after_btn_text_font_size' => '16',
            'tds_after_btn_text_font_line_height' => '1.2',
            'tds_after_btn_text_font_weight' => '500',
            'tds_pp_msg_font_family' => 'eastcoast-global_global',
            'tds_pp_msg_font_size' => '18',
            'tds_pp_msg_font_line_height' => '1.2',
            'tds_pp_msg_font_weight' => '500',
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

td_util::update_option('tds_demo_options', 'a:1:{s:5:"plans";a:3:{i:0;a:2:{s:9:"unique_id";s:14:"46347d1c90c9cb";s:4:"name";s:9:"Free Plan";}i:1;a:2:{s:9:"unique_id";s:15:"746347d1c90ca1f";s:4:"name";s:12:"Monthly Plan";}i:2;a:2:{s:9:"unique_id";s:15:"456347d1c90ca67";s:4:"name";s:11:"Yearly Plan";}}}');


/*  ---------------------------------------------------------------------------- 
	SUBSCRIPTION - end phase 2
*/

/*  ---------------------------------------------------------------------------- 
	POSTS
*/
$post_td_post_raising_raffi_is_a_portrait_of_the_author_as_modern_father_id = td_demo_content::add_post( array(
	'title' => 'Raising Raffi is a portrait of the author as modern father',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'tds_locker' => '64',
	'categories_id_array' => array($cat_tech_id,),
));

$post_td_post_splitting_chores_can_be_unfair_heres_how_to_do_it_equitably_id = td_demo_content::add_post( array(
	'title' => 'Splitting chores can be unfair. Here’s how to do it equitably',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_tech_id,),
));

$post_td_post_the_sec_did_a_sensible_thing_on_climate_change_a_right_wing_campaign_is_trying_to_kill_it_id = td_demo_content::add_post( array(
	'title' => 'The SEC did a sensible thing on climate change. A right-wing campaign is trying to kill it',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_tech_id,),
));

$post_td_post_is_la_really_going_to_have_a_billionaire_former_republican_for_a_mayor_id = td_demo_content::add_post( array(
	'title' => 'Is LA really going to have a billionaire former Republican for a mayor?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_tech_id,),
));

$post_td_post_a_new_right_wing_super_pac_is_attacking_liz_cheney_as_a_dc_diva_id = td_demo_content::add_post( array(
	'title' => 'A new right-wing super PAC is attacking Liz Cheney as a “DC diva”',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_tech_id,),
));

$post_td_post_one_good_thing_two_90s_asian_films_that_capture_the_loneliness_of_modern_life_id = td_demo_content::add_post( array(
	'title' => 'One Good Thing: Two ’90s Asian films that capture the loneliness of modern life',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_tech_id,),
));

$post_td_post_blue_states_gun_control_efforts_hinge_on_the_supreme_court_id = td_demo_content::add_post( array(
	'title' => 'Blue states’ gun control efforts hinge on the Supreme Court',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_tech_id,),
));

$post_td_post_moving_to_a_new_city_solo_can_be_less_lonely_than_you_think_id = td_demo_content::add_post( array(
	'title' => 'Moving to a new city solo can be less lonely than you think',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_tech_id,),
));

$post_td_post_what_biden_wants_to_achieve_in_europe_and_whether_hell_get_it_id = td_demo_content::add_post( array(
	'title' => 'What Biden wants to achieve in Europe — and whether he’ll get it',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_tech_id,),
));

$post_td_post_the_nontoxic_social_media_app_that_tells_you_your_toxic_traits_id = td_demo_content::add_post( array(
	'title' => 'The nontoxic social media app that tells you your toxic traits',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_tech_id,),
));

$post_td_post_what_a_lawsuit_in_mississippi_tells_us_about_the_future_of_abortion_pills_id = td_demo_content::add_post( array(
	'title' => 'What a lawsuit in Mississippi tells us about the future of abortion pills',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_events_id,),
));

$post_td_post_was_tuesdays_testimony_a_political_breaking_point_for_trump_id = td_demo_content::add_post( array(
	'title' => 'Was Tuesday’s testimony a political breaking point for Trump?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_events_id,),
));

$post_td_post_why_silicon_valley_is_fertile_ground_for_obscure_religious_beliefs_id = td_demo_content::add_post( array(
	'title' => 'Why Silicon Valley is fertile ground for obscure religious beliefs',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_events_id,),
));

$post_td_post_why_brands_are_obsessed_with_building_community_id = td_demo_content::add_post( array(
	'title' => 'Why brands are obsessed with building community',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_events_id,),
));

$post_td_post_flying_will_be_the_worst_part_of_your_summer_vacation_id = td_demo_content::add_post( array(
	'title' => 'Flying will be the worst part of your summer vacation',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_events_id,),
));

$post_td_post_the_supreme_courts_big_epa_decision_is_a_massive_power_grab_by_the_justices_id = td_demo_content::add_post( array(
	'title' => 'The Supreme Court’s big EPA decision is a massive power grab by the justices',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_how_chinas_relationship_to_hollywood_has_shaped_the_movies_id = td_demo_content::add_post( array(
	'title' => 'How China’s relationship to Hollywood has shaped the movies',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_what_the_supreme_courts_epa_ruling_means_for_air_pollution_and_your_health_id = td_demo_content::add_post( array(
	'title' => 'What the Supreme Court’s EPA ruling means for air pollution — and your health',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_preparing_for_extreme_weather_is_a_community_concern_heres_how_to_be_ready_id = td_demo_content::add_post( array(
	'title' => 'Preparing for extreme weather is a community concern. Here’s how to be ready',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_shinzo_abe_wanted_to_make_japan_a_normal_country_as_he_saw_it_id = td_demo_content::add_post( array(
	'title' => 'Shinzo Abe wanted to make Japan a “normal country” — as he saw it',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_the_battleground_house_and_senate_races_where_the_end_of_roe_could_have_the_biggest_impact_id = td_demo_content::add_post( array(
	'title' => 'The battleground House and Senate races where the end of Roe could have the biggest impact',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_opinions_id,),
));

$post_td_post_how_to_help_your_teen_think_critically_in_a_confusing_world_id = td_demo_content::add_post( array(
	'title' => 'How to help your teen think critically in a confusing world',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_opinions_id,),
));

$post_td_post_why_adoption_wont_fill_the_gaps_of_a_roe_less_america_in_2022_id = td_demo_content::add_post( array(
	'title' => 'Why adoption won’t fill the gaps of a Roe-less America in 2022',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_opinions_id,),
));

$post_td_post_a_complete_timeline_of_the_lea_michele_beanie_feldstein_funny_girl_casting_controversy_id = td_demo_content::add_post( array(
	'title' => 'A complete timeline of the Lea Michele-Beanie Feldstein-Funny Girl casting controversy',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_opinions_id,),
));

$post_td_post_how_the_fed_ended_the_last_great_american_inflation_and_how_much_it_hurt_id = td_demo_content::add_post( array(
	'title' => 'How the Fed ended the last great American inflation — and how much it hurt',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_opinions_id,),
));


/*  ---------------------------------------------------------------------------- 
	PRODUCTS
*/

/*  ---------------------------------------------------------------------------- 
	TAXONOMIES
*/
$tax_term_cafe_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'cafe',
	'taxonomy' => 'tdtax_services',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.',
	'filter_image' => '',
	'tax_term_meta' => array( 
		'tdb_filter_color' => '',
		'tdcf_taxonomy_icon' => 'PHN2ZyBpZD0idXVpZC00NzU4YWE4ZC0xMjMwLTRlOGEtYTU2NC00NmIzOTQ5ZmRlMTEiIGRhdGEtbmFtZT0iTGF5ZXIgMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB2aWV3Qm94PSIwIDAgNDUuNiA1MCI+DQogIDxwYXRoIGQ9Ik00MC4xLDQ2LjdIMHMwLDAsMCwwYzAsMS4zLDIuNSwyLjQsNi40LDMuMmgyNy4zYzMuOS0uOCw2LjQtMS45LDYuNC0zLjJzMCwwLDAsMFoiLz4NCiAgPHBhdGggZD0iTTM4LjksMjYuNWMtLjIsMC0uNSwwLS43LDAsMC0xLjQtLjItMi44LS41LTQuMi0uMS0uNy0uOC0xLjItMS41LTEuMkgzLjhjLS43LDAtMS4zLC41LTEuNSwxLjItMS42LDcuOCwxLjMsMTUsNi40LDIxLjksLjUsLjcsMS40LDEuMSwyLjMsMS4xSDI5LjFjLjgsMCwxLjYtLjQsMi4yLTEsMS41LTEuOCwyLjgtMy42LDMuOS01LjUsMS4xLC43LDIuNCwxLjEsMy43LDEuMSwzLjcsMCw2LjctMyw2LjctNi43cy0zLTYuNy02LjctNi43Wm0wLDExYy0xLDAtMS45LS4zLTIuNy0uOSwxLjEtMi41LDEuNy01LDEuOS03LjYsLjIsMCwuNSwwLC44LDAsMi40LDAsNC4zLDEuOSw0LjMsNC4zcy0xLjksNC4zLTQuMyw0LjNaIi8+DQogIDxnPg0KICAgIDxwYXRoIGQ9Ik0yMC40LDE4LjhDNDEuNSw0LjQsMTEuNywxMS41LDI0LjEsMGMtMTUuMyw4LjYsMy44LDEwLjUtMy43LDE4LjgiLz4NCiAgICA8cGF0aCBkPSJNMTguNywxNy44YzQtNi4xLTkuNS00LjktNC0xMy04LDkuNiwzLjIsOC41LDQsMTNoMFoiLz4NCiAgPC9nPg0KPC9zdmc+',
		'_tdcf_taxonomy_icon' => 'ZmllbGRfNjMwNDhkZTM0M2Q3ZA==',
	),
));

$tax_term_entertainment_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'entertainment',
	'taxonomy' => 'tdtax_services',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.',
	'filter_image' => '',
	'tax_term_meta' => array( 
		'tdb_filter_color' => '',
		'tdcf_taxonomy_icon' => 'PHN2ZyBpZD0iYiIgZGF0YS1uYW1lPSJMYXllciAyIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA4OTkuNCA5MjIuNiI+DQogIDxnIGlkPSJjIiBkYXRhLW5hbWU9IkxheWVyIDEiPg0KICAgIDxwYXRoIGQ9Ik0xNDIuNSwwbC00Ny41LDIyMC45Yy0zMC40LTIzLjctMTA5LTE3LjQtOTIuOCwzNS4zLDE1LjIsMzUuNSw4My40LDUwLjcsMTEwLjEsMTkuM2gwbDQyLjctMTg5LjVoMTkzLjFjMCwuMS0yOS42LDEzOC0yOS42LDEzOC0zMC42LTIzLjUtMTA4LjYtMTctOTIuNSwzNS41LDE1LjIsMzUuNSw4My4yLDUwLjcsMTA5LjksMTkuMmgwTDM5Niw2LjcsMTQyLjUsMFptMjMuOCwzMy4xaDE5My4xYzAsLjEtNC45LDIzLjEtNC45LDIzLjFIMTYxLjNjMC0uMSw0LjktMjMuMSw0LjktMjMuMVpNMzYsMjUxLjdjLTUuNS00LjMtNi4yLTcuMS02LjEtNy44LC40LTMuMywxMy41LTYuOSwxOC44LTYuMiwxNCwuMywzMy45LDUuNywzOC4zLDE4LjMtMTIuOCwxMS45LTQwLjQsNC01MS00LjNabTIyMy43LDMuM2MtNS43LTQuOC02LjQtNy42LTYuMi04LjEsMy01LjUsMjQuMS03LjMsMzAuNS00LjcsNi44LC43LDI5LjYsMTAuNiwyNi4xLDE4LTE0LjEsOS43LTM2LjYsNC41LTUwLjMtNS4yWiIvPg0KICAgIDxwYXRoIGQ9Ik03OTQuNiw4OTEuOWM4LjYtMzcuMy0yOC43LTcwLjUtNjMuNS03NC41bDE2OC4zLTI3OS40LTUwLjUsMjcuOWgwYy02LDQuMy01MS43LDIzLjQtNzAuNCwyNy40LTE3LjIsNS4zLTM3LjksNi45LTU1LjksMTAuMy0yOC4yLDUuMi00Mi4yLDMwLjItMjYuMSw1NC44LDYuMywxMC44LDI4LjYsMzguOCwzNy4zLDQ2LjZoMGMtNy4yLTYuOS0xMC4yLTU3LjUtMTMuMi02Ny44LDQuOS0zLjMsMTEuNC00LjIsMTkuMy01LjIsMjcuNC0yLjksNTMuNy05LjksNzgtMTguOGwtMTQxLjcsMjM4LjRoMGMtOC4zLDU3LjksOTYuMywxMDQsMTE4LjMsNDAuNFptLTMyLjMtMy44Yy0xNi41LDEwLjktNDIuMi0zLjUtNTEuMS0xOS4yLTIuOS01LjUtNS0xMi43LS4zLTE3LjMsMTYuNS0xMC45LDQyLjIsMy41LDUxLjEsMTkuMiwyLjksNS41LDUsMTIuNywuMywxNy4zWiIvPg0KICAgIDxwYXRoIGQ9Ik0xOTksNjQwLjZ2LTE4OS4yaDM0LjNjMy4zLDAsNi41LC42LDkuNSwxLjksNC4zLDEuOCw4LjEsNSwxMC43LDguOSwxLjMsMiwyLjQsNC4xLDMuMSw2LjQsLjcsMi4zLDEuMSw0LjgsMS4xLDcuM3YxNDAuNGMwLDMuMy0uNiw2LjUtMS45LDkuNS0xLjgsNC4zLTUsOC4xLTguOSwxMC43LTIsMS4zLTQuMSwyLjQtNi40LDMuMS0yLjMsLjctNC44LDEuMS03LjMsMS4xaC0zNC4zWiIvPg0KICAgIDxwYXRoIGQ9Ik02NTkuOCw2MzhjLTMuNy0xLjktNi45LTQuNy05LjItOC4xLTEuMy0yLTIuNC00LjEtMy4xLTYuNC0uNy0yLjMtMS4xLTQuOC0xLjEtNy4zdi0xNDAuNGMwLTMuMywuNi02LjUsMS45LTkuNSwxLjgtNC4zLDUtOC4xLDguOS0xMC43LDItMS4zLDQuMS0yLjQsNi40LTMuMSwyLjMtLjcsNC44LTEuMSw3LjMtMS4xaDM0LjN2MTI1LjhjLTE4LjcsNi41LTMzLjIsMTkuNS00MC41LDM2LjQtMy4zLDcuNy00LjksMTYtNC44LDI0LjRaIi8+DQogICAgPHBhdGggZD0iTTQ1MS4yLDg2NC4xYy01My4zLDAtMTA0LjktMTAuNC0xNTMuNi0zMS00Ny0xOS45LTg5LjItNDguMy0xMjUuNC04NC41cy02NC43LTc4LjQtODQuNS0xMjUuNGMtMjAuNi00OC42LTMxLTEwMC4zLTMxLTE1My42czkuNy0xMDEuMiwyOC44LTE0OC4zYzIwLjItMy4yLDM3LjctMTIuNCw0OS42LTI2LjVsNC44LTUuNiwxOS04NC41YzMzLjQtMzYuOCw3Mi44LTY2LjcsMTE3LjItODguN2gzNC43cy0xMi40LDU3LjgtMTIuNCw1Ny44Yy00LjIsMi41LTguNCw1LjEtMTIuNiw3LjgtNC0uNC04LjEtLjYtMTItLjYtMjkuOCwwLTU0LjgsMTAuNy02OC42LDI5LjQtOC4zLDExLjMtMTYuNSwzMC40LTguMSw1Ny44bC41LDEuNWgwYy0xNS4zLDIzLjYtMjcuMyw0OC45LTM1LjYsNzUuNi02LjQsMjAuNy05LjcsMzMuMS0xMy42LDY0LjItMy4xLDI0LjktMS4zLDE4MC45LS40LDI0Ni44LC4zLDE5LjEsMTYsMzQuNywzNS4yLDM0LjdoNTBjMTAuMSwwLDE5LjktMiwyOS4yLTUuOSwxMy40LTUuNywyNC44LTE1LDMyLjktMjcuMSw0LjEtNi4xLDcuMy0xMi43LDkuNC0xOS42LDIuMi03LjIsMy40LTE0LjcsMy40LTIyLjN2LTE0MC40YzAtMTAuMS0yLTE5LjktNS45LTI5LjItNS43LTEzLjQtMTUtMjQuOC0yNy4xLTMyLjktNi4xLTQuMS0xMi43LTcuMy0xOS42LTkuNC03LjItMi4yLTE0LjctMy40LTIyLjMtMy40aC0zMS45YzMtMjEuOSw4LjktNDMuMywxNy41LTYzLjcsNC05LjYsOC43LTE4LjksMTMuOS0yOCwxLjksMS4yLDMuOSwyLjIsNS45LDMuMywxNi40LDguNiwzNS43LDEzLjMsNTQuMiwxMy4zLDI3LjIsMCw1MC42LTkuOCw2NS43LTI3LjdsNC44LTUuNywyMi4zLTEwMWMyMS41LTUuOCw0My44LTguOCw2Ni4zLTguOCwzNC4yLDAsNjcuMyw2LjcsOTguNSwxOS45LDQ1LjIsMTkuMSw4My43LDUwLjgsMTExLjMsOTEuNywxMy44LDIwLjUsMjQuNSw0Mi43LDMxLjgsNjYuMiw0LjEsMTMuMiw3LjEsMjYuNyw5LDQwLjRoLTMxLjljLTEwLjEsMC0xOS45LDItMjkuMiw1LjktMTMuNCw1LjctMjQuOCwxNS0zMi45LDI3LjEtNC4xLDYuMS03LjMsMTIuNy05LjQsMTkuNi0yLjIsNy4yLTMuNCwxNC43LTMuNCwyMi4zdjE0MC40YzAsMTAuMSwyLDE5LjksNS45LDI5LjIsNS43LDEzLjQsMTUsMjQuOCwyNy4xLDMyLjksNi4xLDQuMSwxMi43LDcuMywxOS42LDkuNCw3LjIsMi4yLDE0LjcsMy40LDIyLjMsMy40aDE0YzEwLjUsMTEuNiwyNCwyNS4xLDMyLjMsMzMuMmwtNDEuNSw2OS45Yy02Ni4xLDQ1LjgtMTQzLjYsNjkuOS0yMjQuMyw2OS45Wm0wLTUxOGMtNjguMSwwLTEyMy41LDU1LjQtMTIzLjUsMTIzLjVzNTUuNCwxMjMuNSwxMjMuNSwxMjMuNSwxMjMuNS01NS40LDEyMy41LTEyMy41LTU1LjQtMTIzLjUtMTIzLjUtMTIzLjVaIi8+DQogICAgPHBhdGggZD0iTTc1NS42LDQxMGwtLjItLjljLS41LTIuNi0xMS42LTYzLTIzLjctOTEuNS0yMy01NC4zLTYxLTEwMC40LTEwOS45LTEzMy41LTI0LjUtMTYuNi01MS4zLTI5LjQtNzkuNS0zOC4yLTI5LjEtOS4xLTU5LjUtMTMuNy05MC4zLTEzLjctMTguMiwwLTM2LjQsMS42LTU0LjIsNC44bDEzLjItNTkuOGMxMy4zLTEuMywyNi44LTIsNDAuMS0yLDUzLjMsMCwxMDQuOSwxMC40LDE1My42LDMxLDQ3LDE5LjksODkuMiw0OC4zLDEyNS40LDg0LjVzNjQuNyw3OC40LDg0LjUsMTI1LjRjMjAuNiw0OC42LDMxLDEwMC4zLDMxLDE1My42cy0xLjksNDQuOS01LjYsNjYuOGwtNy4yLDQtLjcsLjVjLTcuMiw0LTQ1LjQsMTkuOS02MCwyM2wtMS4zLC4zLTEuMiwuNGMtNC4zLDEuMy05LjEsMi40LTE0LjEsMy4zdi0xNThaIi8+DQogIDwvZz4NCjwvc3ZnPg==',
		'_tdcf_taxonomy_icon' => 'ZmllbGRfNjMwNDhkZTM0M2Q3ZA==',
	),
));

$tax_term_fashion_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'fashion',
	'taxonomy' => 'tdtax_services',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.',
	'filter_image' => '',
	'tax_term_meta' => array( 
		'tdb_filter_color' => '',
		'tdcf_taxonomy_icon' => 'PHN2ZyBpZD0iYiIgZGF0YS1uYW1lPSJMYXllciAyIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA2MjMgNjIzIj4NCiAgPGcgaWQ9ImMiIGRhdGEtbmFtZT0iTGF5ZXIgMSI+DQogICAgPGc+DQogICAgICA8cGF0aCBkPSJNNTk4LjUsMTkwLjJjLTE1LjctMzcuMS0zOC4xLTcwLjQtNjYuNy05OXMtNjEuOS01MS4xLTk5LTY2LjdDMzk0LjMsOC4yLDM1My41LDAsMzExLjUsMHMtODIuOCw4LjItMTIxLjMsMjQuNWMtMzcuMSwxNS43LTcwLjQsMzguMS05OSw2Ni43cy01MS4xLDYxLjktNjYuNyw5OUM4LjIsMjI4LjcsMCwyNjkuNSwwLDMxMS41czguMiw4Mi44LDI0LjUsMTIxLjNjMTUuNywzNy4xLDM4LjEsNzAuNCw2Ni43LDk5LDI4LjYsMjguNiw2MS45LDUxLjEsOTksNjYuNywzOC40LDE2LjMsNzkuMiwyNC41LDEyMS4zLDI0LjVzODIuOC04LjIsMTIxLjMtMjQuNWMzNy4xLTE1LjcsNzAuNC0zOC4xLDk5LTY2LjcsMjguNi0yOC42LDUxLjEtNjEuOSw2Ni43LTk5LDE2LjItMzguNCwyNC41LTc5LjIsMjQuNS0xMjEuM3MtOC4yLTgyLjgtMjQuNS0xMjEuM1ptLTUuNSwxMjEuM2MwLDE1NS4yLTEyNi4zLDI4MS41LTI4MS41LDI4MS41UzMwLDQ2Ni43LDMwLDMxMS41LDE1Ni4zLDMwLDMxMS41LDMwczI4MS41LDEyNi4zLDI4MS41LDI4MS41WiIvPg0KICAgICAgPHBhdGggZD0iTTM2NC42LDI2MC4xYy01LjUsMC0xMC43LTIuMi0xNC42LTYuMWwtMTYuNy0xNi43Yy0yLjgtMi44LTYuMi01LjEtOS45LTYuNmwuMy0yOS42aC01cy0xLjcsMC0yLjMsMGMtLjYsMC0xLjMsMC0xLjksMC0zLjUsMC03LjMtLjItOS42LTEuM2gtLjJjMCwwLS4yLS4yLS4yLS4yLTYtMi40LTEwLTgtMTAuNy0xNC45LS43LTYuOCwyLjMtMTMuMiw3LjYtMTYuN2guMmMyLjgtMi4xLDYuMS0zLjIsOS42LTMuMiw1LDAsMTAuMSwyLjIsMTMuNyw1LjgsMi4zLDIuNCw1LDYuNCw0LjksMTIuMXY1LjFjLS4xLDAsMjQsMCwyNCwwdi01YzAtMjYuMy0yMS43LTQyLTQyLjYtNDJzLTI2LjQsNi43LTM0LjMsMTguNGMtOCwxMS4zLTkuNSwyNi00LDM5LjMsNSwxMi4yLDE0LjgsMjEuMiwyNi44LDI0Ljh2Ny40Yy0zLjYsMS41LTYuOSwzLjctOS42LDYuNWwtMTYuNywxNi43Yy0zLjksMy45LTkuMSw2LjEtMTQuNiw2LjFIMTI3LjdjLTMxLjUsMC01Ny40LDI0LjYtNTksNTYuMWgwdjczLjhoNDg1LjZ2LTczLjdoMGMtMS42LTMxLjYtMjcuNS01Ni4yLTU5LTU2LjJoLTEzMC43Wk05NC41LDM1Mi45di0yOC43aDQzNC4xdjI4LjdIOTQuNVptMjE3LTkyLjRjOC43LDAsMTUuOCw3LjEsMTUuOCwxNS44cy03LjEsMTUuOC0xNS44LDE1LjgtMTUuOC03LjEtMTUuOC0xNS44LDcuMS0xNS44LDE1LjgtMTUuOFoiLz4NCiAgICA8L2c+DQogIDwvZz4NCjwvc3ZnPg==',
		'_tdcf_taxonomy_icon' => 'ZmllbGRfNjMwNDhkZTM0M2Q3ZA==',
	),
));

$tax_term_health_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'health',
	'taxonomy' => 'tdtax_services',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.',
	'filter_image' => '',
	'tax_term_meta' => array( 
		'tdb_filter_color' => '',
		'tdcf_taxonomy_icon' => 'PHN2ZyBpZD0iYiIgZGF0YS1uYW1lPSJMYXllciAyIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA1ODkuMiA1MDQiPg0KICA8ZyBpZD0iYyIgZGF0YS1uYW1lPSJMYXllciAxIj4NCiAgICA8Zz4NCiAgICAgIDxwYXRoIGQ9Ik0xNjYuNiwyOTAuN2w0NC42LTE4Ni4yLDYyLjcsMTYzLDcyLjYtODIuNS0yLjIsMzQuM2M3LjctNy4yLDE4LjEtNi43LDI5LjUtNi43aDI0LjN2LTI0LjNjMC0yMy45LDE5LjQtNDMuMyw0My4zLTQzLjNoNDguMmMyMy45LDAsNDMuMywxOS40LDQzLjMsNDMuM3YyNC4zaDI0LjNjNCwwLDcuOCwuNSwxMS41LDEuNiwyMy4zLTQ0LjYsMjkuNi05MC40LDQuMy0xMzUuNi05OS0xNzYuOC0yNzguMywwLTI3OC4zLDAsMCwwLTE3OS4yLTE3Ni44LTI3OC4zLDBDLTEzLjQsMTMxLjYsLjMsMTgwLjQsMzQuMSwyMzIuMkgxMjMuNWw0My4xLDU4LjZaIi8+DQogICAgICA8cGF0aCBkPSJNNDA0LjQsMzk0LjNzMCwwLDAsMGMwLDAsMCwwLDAsMFoiLz4NCiAgICAgIDxwYXRoIGQ9Ik0zOTgsMzQ3LjRoLTI0LjNjLTIzLjksMC00My4zLTE5LjQtNDMuMy00My4zdi00OC4yYzAtNi4yLDEuMy0xMi4xLDMuNy0xNy41bC02NSw3My42LTU0LjItMTQxLTQwLjQsMTY4LjgtNTkuNS04MC45SDQ1LjhjNzIuOSw5OC43LDE2Ny42LDE3NywyNDguOCwyNDUsMTAzLjktMTA0LjEsMTA5LjUtMTA5LjcsMTA5LjgtMTA5LjctNC02LjYtNi40LTE0LjMtNi40LTIyLjZ2LTI0LjNaIi8+DQogICAgICA8cGF0aCBkPSJNNTU3LjEsMjQyLjZoLTU0LjN2LTU0LjNjMC03LjMtNS45LTEzLjMtMTMuMy0xMy4zaC00OC4yYy03LjMsMC0xMy4zLDUuOS0xMy4zLDEzLjN2NTQuM2gtNTQuM2MtNy4zLDAtMTMuMyw1LjktMTMuMywxMy4zdjQ4LjJjMCw3LjMsNS45LDEzLjMsMTMuMywxMy4zaDU0LjN2NTQuM2MwLDcuMyw1LjksMTMuMywxMy4zLDEzLjNoNDguMmM3LjMsMCwxMy4zLTUuOSwxMy4zLTEzLjN2LTU0LjNoNTQuM2M3LjMsMCwxMy4zLTUuOSwxMy4zLTEzLjN2LTQ4LjJjMC03LjMtNS45LTEzLjMtMTMuMy0xMy4zWiIvPg0KICAgIDwvZz4NCiAgPC9nPg0KPC9zdmc+',
		'_tdcf_taxonomy_icon' => 'ZmllbGRfNjMwNDhkZTM0M2Q3ZA==',
	),
));

$tax_term_restaurant_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'restaurant',
	'taxonomy' => 'tdtax_services',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.',
	'filter_image' => '',
	'tax_term_meta' => array( 
		'tdb_filter_color' => '',
		'tdcf_taxonomy_icon' => 'PHN2ZyBpZD0iYiIgZGF0YS1uYW1lPSJMYXllciAyIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA2MzUuMyA1MjIuOCI+DQogIDxnIGlkPSJjIiBkYXRhLW5hbWU9IkxheWVyIDEiPg0KICAgIDxwYXRoIGQ9Ik0xMjAuNiw2Yy04LDgtOCwyMSwwLDI5bDk5LjMsOTkuM2M3LjgsNy44LDcuOCwyMC41LDAsMjguMy03LjgsNy44LTIwLjUsNy44LTI4LjMsMEw5Mi4zLDYzLjNjLTgtOC0yMS04LTI5LDBzLTgsMjEsMCwyOWw5OS4zLDk5LjNjNy44LDcuOCw3LjgsMjAuNSwwLDI4LjMtNy44LDcuOC0yMC41LDcuOC0yOC4zLDBMMzUsMTIwLjZjLTgtOC0yMS04LTI5LDAtOCw4LTgsMjEsMCwyOWwxMDYsMTA2YzMyLjgsMzIuOCw4Mi42LDM5LjEsMTIxLjQsMTgsLjUsLjcsMS4xLDEuMywxLjcsMS45bDIzOSwyMzljMTEuMSwxMS4xLDI5LjIsMTEuMSw0MC4zLDAsMTEuMS0xMS4xLDExLjEtMjkuMiwwLTQwLjNsLTIzOS0yMzljLS42LS42LTEuMi0xLjItMS45LTEuNywyMS4yLTM4LjYsMTUuNS04OC0xNy4yLTEyMC42TDE0OS41LDZjLTgtOC0yMS04LTI5LDBaIi8+DQogICAgPGc+DQogICAgICA8cGF0aCBkPSJNMjcwLjMsMzUzLjFsLTExOS45LDExOS45Yy0xMS4xLDExLjEtMTEuMSwyOS4yLDAsNDAuMywxMS4xLDExLjEsMjkuMiwxMS4xLDQwLjMsMGwxMTkuOS0xMTkuOS00MC4zLTQwLjNaIi8+DQogICAgICA8cGF0aCBkPSJNNjA3LjIsNTYuNWMtNDMuOS00My45LTEyMy43LTM1LjQtMTc4LjIsMTkuMS00Niw0Ni01OS4yLDExMC0zNS44LDE1NS4yLTEuMywuOS0yLjYsMi0zLjgsMy4ybC0zNi40LDM2LjQsNDAuMyw0MC4zLDM2LjQtMzYuNGMxLjItMS4yLDIuMi0yLjQsMy4xLTMuOCw0NS4zLDIzLjQsMTA5LjMsMTAuMSwxNTUuMi0zNS44LDU0LjUtNTQuNSw2My0xMzQuMywxOS4xLTE3OC4yWiIvPg0KICAgIDwvZz4NCiAgPC9nPg0KPC9zdmc+',
		'_tdcf_taxonomy_icon' => 'ZmllbGRfNjMwNDhkZTM0M2Q3ZA==',
	),
));

$tax_term_united_states_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'United States',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => 0,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'country',
    ),
));


$tax_term_georgia_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Georgia',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_united_states_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'state',
    ),
));

$tax_term_new_york_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'New York',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_united_states_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'state',
    ),
));

$tax_term_north_carolina_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'North Carolina',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_united_states_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'state',
    ),
));

$tax_term_pennsylvania_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Pennsylvania',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_united_states_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'state',
    ),
));

$tax_term_albany_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Albany',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_new_york_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_arona_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Arona',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_pennsylvania_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_asheville_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Asheville',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_north_carolina_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_athens_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Athens',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_georgia_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_atlanta_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Atlanta',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_georgia_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_augusta_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Augusta',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_georgia_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_bendersville_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Bendersville',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_pennsylvania_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_carlisle_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Carlisle',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_pennsylvania_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_charlotte_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Charlotte',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_north_carolina_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_columbus_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Columbus',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_georgia_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_durham_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Durham',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_north_carolina_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_gettysburg_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Gettysburg',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_pennsylvania_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_greensboro_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Greensboro',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_north_carolina_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_harrisburg_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Harrisburg',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_pennsylvania_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_helen_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Helen',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_georgia_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_lancaster_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Lancaster',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_pennsylvania_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_lansdale_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Lansdale',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_pennsylvania_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_lawrenceville_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Lawrenceville',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_georgia_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_macon_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Macon',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_georgia_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_mechanicsburg_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Mechanicsburg',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_pennsylvania_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_new_york_new_york_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'New York',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_new_york_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_ocean_isle_beach_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Ocean Isle Beach',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_north_carolina_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_philadelphia_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Philadelphia',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_pennsylvania_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_pittsburgh_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Pittsburgh',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_pennsylvania_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_poughkeepsie_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Poughkeepsie',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_new_york_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_raleigh_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Raleigh',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_north_carolina_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_rochester_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Rochester',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_new_york_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_savannah_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Savannah',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_georgia_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_smyrna_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Smyrna',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_georgia_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_syracuse_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Syracuse',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_new_york_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_utica_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Utica',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_new_york_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_wilmington_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Wilmington',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_north_carolina_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));

$tax_term_yonkers_id = td_demo_tax::add_taxonomy( array(
    'taxonomy_name' => 'Yonkers',
    'taxonomy' => 'tdtax_locations',
    'taxonomy_template' => '',
    'parent_id' => $tax_term_new_york_id,
    'description' => '',
    'tax_term_meta' => array(
        'tdb-location-type' => 'city',
    ),
));


/*  ---------------------------------------------------------------------------- 
	CPTs
*/
$cpt_fish_n_chips_id = td_demo_content::add_cpt( array(
	'title' => 'Fish \'n\' Chips',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_6',
	'post_meta' => array(
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQpDbG9zZWQ=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'UGFzc3dvcmQgT25seQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Q3JlZGl0IE9ubHk=',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1NTQ2NTc1NjQ0',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9maXNobmNoaXBzLmdhLmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBmaXNobmNoaXBzLmdhLmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'R2VvcmdpYSAxMCAsIEF0aGVucywgR2VvcmdpYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array(
		'tdtax_services' => array( $tax_term_restaurant_id ),
		'tdtax_locations' => array( $tax_term_athens_id, $tax_term_georgia_id, $tax_term_united_states_id ),
	),
));

$cpt_territorial_times_id = td_demo_content::add_cpt( array(
	'title' => 'Territorial Times',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_7',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gVGh1cnNkYXkNCjEwIEFNIC0gNSBQTQ0KRnJpZGF5IC0gU3VuZGF5DQo4IEFNIC0gMTAgUE0=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'UmVzZXJ2ZWQgSW5kb29yIFNwYWNl',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'UHJpdmF0ZSBSb29tcw==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'T3BlbiAyNC83',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Q2FzaCBPbmx5',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MzQ2NDU3NTY3',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly90ZXJyaXRvcmlhbHRpbWVzLmdhLmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEB0ZXJyaXRvcmlhbHRpbWVzLmdhLmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'R2VvcmdpYSAxMCAsIEF1Z3VzdGEsIEdlb3JnaWEsIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_restaurant_id ),
		'tdtax_locations' => array( $tax_term_augusta_id, $tax_term_georgia_id, $tax_term_united_states_id ),
	),
));

$cpt_avenue_dining_id = td_demo_content::add_cpt( array(
	'title' => 'Avenue Dining',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_8',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDYgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQpDbG9zZWQ=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'Tm8gV2lmaQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Q3JlZGl0IE9ubHk=',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1NDY1NjU3NzQ0NA==',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9hdmVudWVkaW5pbmcuZ2EuY29t',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBhdmVudWVkaW5pbmcuZ2EuY29t',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'R2VvcmdpYSA0MiAsIEF0bGFudGEsIEdlb3JnaWEsIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_restaurant_id ),
		'tdtax_locations' => array( $tax_term_atlanta_id, $tax_term_georgia_id, $tax_term_united_states_id ),
	),
));

$cpt_coastal_reefs_id = td_demo_content::add_cpt( array(
	'title' => 'Coastal Reefs',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_9',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQoxMCBBTSAtIDcgUE0=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1NDU2NzM0NDQz',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9jb2FzdGFscmVlZnMuZ2EuY29t',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBjb2FzdGFscmVlZnMuZ2EuY29t',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'R2VvcmdpYSA0MDEgLCBNYWNvbiwgR2VvcmdpYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_restaurant_id ),
		'tdtax_locations' => array( $tax_term_georgia_id, $tax_term_macon_id, $tax_term_united_states_id ),
	),
));

$cpt_canterbury_hill_id = td_demo_content::add_cpt( array(
	'title' => 'Canterbury Hill',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_10',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQpDbG9zZWQ=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'UGFzc3dvcmQgT25seQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'UmVzZXJ2ZWQgSW5kb29yIFNwYWNl',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'UHJpdmF0ZSBSb29tcw==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MzQ2NTQ3NTY1',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9jYW50ZXJidXJ5aGlsbC5nYS5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBjYW50ZXJidXJ5aGlsbC5nYS5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'R2VvcmdpYSAyMDQgLCBTYXZhbm5haCwgR2VvcmdpYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_restaurant_id ),
		'tdtax_locations' => array( $tax_term_georgia_id, $tax_term_savannah_id, $tax_term_united_states_id ),
	),
));

$cpt_apple_trees_id = td_demo_content::add_cpt( array(
	'title' => 'Apple Trees',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_1',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQpDbG9zZWQ=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'Tm8gV2lmaQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'UmVzZXJ2ZWQgSW5kb29yIFNwYWNl',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'UHJpdmF0ZSBSb29tcw==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Q2FzaCBPbmx5',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MzQ2NTQ2NDU2NA==',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9hcHBsZXRyZWVzLm5jLmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBhcHBsZXRyZWVzLm5jLmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'Q2Fyb2xpbmEgQmF5IERyaXZlICwgV2lsbWluZ3RvbiwgTm9ydGggQ2Fyb2xpbmEsIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_restaurant_id ),
		'tdtax_locations' => array( $tax_term_north_carolina_id, $tax_term_united_states_id, $tax_term_wilmington_id ),
	),
));

$cpt_fine_dining_experience_id = td_demo_content::add_cpt( array(
	'title' => 'Fine Dining Experience',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_2',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDggUE0NClNhdHVyZGF5IC0gU3VuZGF5DQo4IEFNIC0gMTAgUE0=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'UmVzZXJ2ZWQgSW5kb29yIFNwYWNl',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Q2FzaCBPbmx5',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MzQ1MzQ2NTQ0',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9maW5lZGluaW5nZXhwLm5jLmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBmaW5lZGluaW5nZXhwLm5jLmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'Tm9ydGggQ2Fyb2xpbmEgSGlnaHdheSAxNiAsIENoYXJsb3R0ZSwgTm9ydGggQ2Fyb2xpbmEsIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_restaurant_id ),
		'tdtax_locations' => array( $tax_term_charlotte_id, $tax_term_north_carolina_id, $tax_term_united_states_id ),
	),
));

$cpt_tulp_and_dine_id = td_demo_content::add_cpt( array(
	'title' => 'Tulp and Dine',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_3',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQpDbG9zZWQ=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'UHJpdmF0ZSBSb29tcw==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Q2FzaCBPbmx5',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MzQ2NTQ2NDU3',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly90dWxwbmRpbmUubmMuY29t',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEB0dWxwbmRpbmUubmMuY29t',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'RWFzdCBNYWluIFN0cmVldCAsIEdyZWVuc2Jvcm8sIE5vcnRoIENhcm9saW5hLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_restaurant_id ),
		'tdtax_locations' => array( $tax_term_greensboro_id, $tax_term_north_carolina_id, $tax_term_united_states_id ),
	),
));

$cpt_downtown_avenue_id = td_demo_content::add_cpt( array(
	'title' => 'Downtown Avenue',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_4',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQpDbG9zZWQ=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'UmVzZXJ2ZWQgSW5kb29yIFNwYWNl',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Q3JlZGl0IE9ubHk=',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MzQ2NTQ2NzU=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9kb3dudG93bmF2ZS5uYy5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBkb3dudG93bmF2ZS5uYy5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'Tm9ydGggQ2Fyb2xpbmEgODEgLCBBc2hldmlsbGUsIE5vcnRoIENhcm9saW5hLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_restaurant_id ),
		'tdtax_locations' => array( $tax_term_asheville_id, $tax_term_north_carolina_id, $tax_term_united_states_id ),
	),
));

$cpt_green_spinach_id = td_demo_content::add_cpt( array(
	'title' => 'Green Spinach',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_5',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDYgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQoxMCBBTSAtIDggUE0=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'UmVzZXJ2ZWQgSW5kb29yIFNwYWNl',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'UHJpdmF0ZSBSb29tcw==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTQ1NTM0NjU0Nzc1',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9ncmVlbnNwaW5hY2gubmMuY29t',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBncmVlbnNwaW5hY2gubmMuY29t',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'QXZlbnQgRmVycnkgUm9hZCAsIFJhbGVpZ2gsIE5vcnRoIENhcm9saW5hLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_restaurant_id ),
		'tdtax_locations' => array( $tax_term_north_carolina_id, $tax_term_raleigh_id, $tax_term_united_states_id ),
	),
));

$cpt_candied_apples_id = td_demo_content::add_cpt( array(
	'title' => 'Candied Apples',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_6',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQo5IEFNIC0gNSBQTQ0KU2F0dXJkYXkgLSBTdW5kYXkNCjYgUE0gLSAxMCBQTQ==',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'UmVzZXJ2ZWQgSW5kb29yIFNwYWNl',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1NzU2NzU2NzU2Nw==',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9jYW5kaWVkYXBwbGVzLm55LmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBjYW5kaWVkYXBwbGVzLm55LmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'TmV3IFlvcmsgMTAwICwgWW9ua2VycywgTmV3IFlvcmssIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_restaurant_id ),
		'tdtax_locations' => array( $tax_term_new_york_id, $tax_term_united_states_id, $tax_term_yonkers_id ),
	),
));

$cpt_scilian_spikes_id = td_demo_content::add_cpt( array(
	'title' => 'Scilian Spikes',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_7',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDYgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQpDbG9zZWQ=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'UmVzZXJ2ZWQgSW5kb29yIFNwYWNl',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'UHJpdmF0ZSBSb29tcw==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Q3JlZGl0IE9ubHk=',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MzQ2MzQ1NzczNA==',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9zY2lsaWFuc3Bpa2VzLm55LmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBzY2lsaWFuc3Bpa2VzLm55LmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'TmV3IFlvcmsgMzkwICwgUm9jaGVzdGVyLCBOZXcgWW9yaywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_restaurant_id ),
		'tdtax_locations' => array( $tax_term_new_york_id, $tax_term_rochester_id, $tax_term_united_states_id ),
	),
));

$cpt_crab_n_sticks_id = td_demo_content::add_cpt( array(
	'title' => 'Crab \'n\' Sticks',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_8',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQoxMCBBTSAtIDggUE0=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'UmVzZXJ2ZWQgSW5kb29yIFNwYWNl',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'UHJpdmF0ZSBSb29tcw==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Q2FzaCBPbmx5',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTUyMzUzNDY0MzQ=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9jcmFibnN0aWNrcy5ueS5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBjcmFibnN0aWNrcy5ueS5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'TmV3IFlvcmsgODAgLCBTeXJhY3VzZSwgTmV3IFlvcmssIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_restaurant_id ),
		'tdtax_locations' => array( $tax_term_new_york_id, $tax_term_syracuse_id, $tax_term_united_states_id ),
	),
));

$cpt_creme_confinant_id = td_demo_content::add_cpt( array(
	'title' => 'Creme Confinant',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_9',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gVGh1cnNkYXkNCjEwIEFNIC0gNSBQTQ0KRnJpZGF5IC0gU3VuZGF5DQo5IEFNIC0gMTAgUE0=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'Tm8gV2lmaQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'T3V0ZG9vciBTcGFjZSBPbmx5',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MzQ2NDU2NTQ3',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9jcmVtZWNvbmZpbmFudC5ueS5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBjcmVtZWNvbmZpbmFudC5ueS5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'TmV3IFlvcmsgNDkgLCBVdGljYSwgTmV3IFlvcmssIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_restaurant_id ),
		'tdtax_locations' => array( $tax_term_new_york_id, $tax_term_united_states_id, $tax_term_utica_id ),
	),
));

$cpt_oak_and_fish_id = td_demo_content::add_cpt( array(
	'title' => 'Oak and Fish',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_10',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQpDbG9zZWQ=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'Tm8gV2lmaQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'UmVzZXJ2ZWQgSW5kb29yIFNwYWNl',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1NDU3NTY3Mw==',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9vYWtuZmlzaC5ueS5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBvYWtuZmlzaC5ueS5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'TmV3IFlvcmsgMzIgLCBBbGJhbnksIE5ldyBZb3JrLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_restaurant_id ),
		'tdtax_locations' => array( $tax_term_albany_id, $tax_term_new_york_id, $tax_term_united_states_id ),
	),
));

$cpt_ton_tonne_ton_id = td_demo_content::add_cpt( array(
	'title' => 'Ton Tonne Ton',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_1',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gU2F0dXJkYXkNCjEwIEFNIC0gNyBQTQ0KU3VuZGF5DQpDbG9zZWQ=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'UGFzc3dvcmQgT25seQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'T3V0ZG9vciBTcGFjZSBPbmx5',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Q3JlZGl0IE9ubHk=',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1NTQ2NTY3NTYz',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly90b250b25uZXRvbi5wYS5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEB0b250b25uZXRvbi5wYS5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'UGVubnN5bHZhbmlhIDUxICwgUGl0dHNidXJnaCwgUGVubnN5bHZhbmlhLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_restaurant_id ),
		'tdtax_locations' => array( $tax_term_pennsylvania_id, $tax_term_pittsburgh_id, $tax_term_united_states_id ),
	),
));

$cpt_giaconni_restaurant_id = td_demo_content::add_cpt( array(
	'title' => 'Giaconni Restaurant',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_2',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQpDbG9zZWQ=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'UmVzZXJ2ZWQgSW5kb29yIFNwYWNl',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'UHJpdmF0ZSBSb29tcw==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Q2FzaCBPbmx5',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1NzU2NzU2MzQ1',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9naWFjb25uaXJlLnBhLmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBnaWFjb25uaXJlLnBhLmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'UGVubnN5bHZhbmlhIDIzMCAsIEhhcnJpc2J1cmcsIFBlbm5zeWx2YW5pYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_restaurant_id ),
		'tdtax_locations' => array( $tax_term_harrisburg_id, $tax_term_pennsylvania_id, $tax_term_united_states_id ),
	),
));

$cpt_candid_exposure_id = td_demo_content::add_cpt( array(
	'title' => 'Candid Exposure',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_3',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQo2IFBNIC0gMTAgUE0=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'UmVzZXJ2ZWQgSW5kb29yIFNwYWNl',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'UHJpdmF0ZSBSb29tcw==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU0NTc1Njc4ODQ=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9jYW5kaWRleHBvc3VyZS5wYS5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBjYW5kaWRleHBvc3VyZS5wYS5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'UGVubnN5bHZhbmlhIDc0ICwgQ2FybGlzbGUsIFBlbm5zeWx2YW5pYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_restaurant_id ),
		'tdtax_locations' => array( $tax_term_carlisle_id, $tax_term_pennsylvania_id, $tax_term_united_states_id ),
	),
));

$cpt_sordid_plantte_id = td_demo_content::add_cpt( array(
	'title' => 'Sordid Plantte',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_4',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQo5IEFNIC0gNyBQTQ0KU2F0dXJkYXkgLSBTdW5kYXkNCjEwIEFNIC0gOSBQTQ==',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'T3V0ZG9vciBTcGFjZSBPbmx5',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Q2FzaCBPbmx5',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MzQ2NTc1NDY1',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9zb3JkaWRwbGFudHRlLnBhLmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBzb3JkaWRwbGFudHRlLnBhLmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'UGVubnN5bHZhbmlhIDM0ICwgR2V0dHlzYnVyZywgUGVubnN5bHZhbmlhLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_restaurant_id ),
		'tdtax_locations' => array( $tax_term_gettysburg_id, $tax_term_pennsylvania_id, $tax_term_united_states_id ),
	),
));

$cpt_gl_dining_id = td_demo_content::add_cpt( array(
	'title' => 'G&L Dining',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_5',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDggUE0NClNhdHVyZGF5IC0gU3VuZGF5DQpDbG9zZWQ=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'UGFzc3dvcmQgT25seQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'UmVzZXJ2ZWQgSW5kb29yIFNwYWNl',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1NjU3MzQ2Nzcz',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9nYW5kbGRpbmluZy5wYS5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBnYW5kbGRpbmluZy5wYS5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'R2V0dHlzYnVyZyBTdHJlZXQgLCBQaXR0c2J1cmdoLCBQZW5uc3lsdmFuaWEsIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_restaurant_id ),
		'tdtax_locations' => array( $tax_term_pennsylvania_id, $tax_term_pittsburgh_id, $tax_term_united_states_id ),
	),
));

$cpt_lontario_clinic_id = td_demo_content::add_cpt( array(
	'title' => 'Lontario Clinic',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_6',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gU3VuZGF5DQpPcGVuIEFsbCBEYXk=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'Tm8gV2lmaQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'T3BlbiAyNC83',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1NTc2NDU2NDU3OA==',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9sb250YXJpb2NsLmdhLmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBsb250YXJpb2NsLmdhLmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'R2VvcmdpYSAxNyAsIEhlbGVuLCBHZW9yZ2lhLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_health_id ),
		'tdtax_locations' => array( $tax_term_georgia_id, $tax_term_helen_id, $tax_term_united_states_id ),
	),
));

$cpt_gynecological_centre_2_id = td_demo_content::add_cpt( array(
	'title' => 'Gynecological Centre',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_7',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQpDbG9zZWQ=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'Tm8gV2lmaQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1NTQ3NjgzNDU2',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9neW5vaGVhbHRoLmdhLmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBneW5vaGVhbHRoLmdhLmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'R2VvcmdpYSA0MDMgLCBBdGxhbnRhLCBHZW9yZ2lhLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_health_id ),
		'tdtax_locations' => array( $tax_term_atlanta_id, $tax_term_georgia_id, $tax_term_united_states_id ),
	),
));

$cpt_bailey_hospital_id = td_demo_content::add_cpt( array(
	'title' => 'Bailey Hospital',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_8',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gU3VuZGF5DQpPcGVuIEFsbCBEYXk=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'T3BlbiAyNC83',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1NTc1NjczMzQ1',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9iYWlsZXlocC5nYS5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBiYWlsZXlocC5nYS5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'R2VvcmdpYSAyMDQgLCBTYXZhbm5haCwgR2VvcmdpYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_health_id ),
		'tdtax_locations' => array( $tax_term_georgia_id, $tax_term_savannah_id, $tax_term_united_states_id ),
	),
));

$cpt_dental_health_2_id = td_demo_content::add_cpt( array(
	'title' => 'Dental Health',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_9',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQpDbG9zZWQ=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'UGFzc3dvcmQgT25seQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1NTc0NTY0NTQ0',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9kZW50YWxtYWNvbi5nYS5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBkZW50YWxtYWNvbi5nYS5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'R2VvcmdpYSA0MDEgLCBNYWNvbiwgR2VvcmdpYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_health_id ),
		'tdtax_locations' => array( $tax_term_georgia_id, $tax_term_macon_id, $tax_term_united_states_id ),
	),
));

$cpt_downtown_hospital_id = td_demo_content::add_cpt( array(
	'title' => 'Downtown Hospital',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_10',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gU3VuZGF5DQpPcGVuIEFsbCBEYXk=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'UHJpdmF0ZSBSb29tcw==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'T3BlbiAyNC83',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Q2FzaCBPbmx5',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1NzU2NzY3NDU=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9hdGxhbnRhaGVhbHRoLmdhLmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBhdGxhbnRhaGVhbHRoLmdhLmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'R2VvcmdpYSA0MDMgLCBBdGxhbnRhLCBHZW9yZ2lhLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_health_id ),
		'tdtax_locations' => array( $tax_term_atlanta_id, $tax_term_georgia_id, $tax_term_united_states_id ),
	),
));

$cpt_dental_health_id = td_demo_content::add_cpt( array(
	'title' => 'Dental Health',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_1',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQpDbG9zZWQ=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'T3V0ZG9vciBTcGFjZSBPbmx5',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MzQ2Nzc0NTY3',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9hc2hldmlsbGVkZW50YWwubmMuY29t',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBhc2hldmlsbGVkZW50YWwubmMuY29t',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'Tm9ydGggQ2Fyb2xpbmEgODEgLCBBc2hldmlsbGUsIE5vcnRoIENhcm9saW5hLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_health_id ),
		'tdtax_locations' => array( $tax_term_asheville_id, $tax_term_north_carolina_id, $tax_term_united_states_id ),
	),
));

$cpt_downtown_clinic_id = td_demo_content::add_cpt( array(
	'title' => 'Downtown Clinic',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_2',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQpDbG9zZWQ=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1NzQ1Nzc0NTY=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9yYWxlaWdoZWFsdGgubmMuY29t',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEByYWxlaWdoZWFsdGgubmMuY29t',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'Tm9ydGggQ2Fyb2xpbmEgOTggLCBSYWxlaWdoLCBOb3J0aCBDYXJvbGluYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_health_id ),
		'tdtax_locations' => array( $tax_term_north_carolina_id, $tax_term_raleigh_id, $tax_term_united_states_id ),
	),
));

$cpt_gynecological_centre_id = td_demo_content::add_cpt( array(
	'title' => 'Gynecological Centre',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_3',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gU2F0dXJkYXkNCjEwIEFNIC0gOSBQTQ0KU3VuZGF5DQpWaXNpdGluZyBPbmx5',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'UmVzZXJ2ZWQgSW5kb29yIFNwYWNl',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MzQ2NzQ1NTc3',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9neW5vaGVhbHRoLm5jLmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBneW5vaGVhbHRoLm5jLmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'Tm9ydGggQ2Fyb2xpbmEgMTUwICwgR3JlZW5zYm9ybywgTm9ydGggQ2Fyb2xpbmEsIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_health_id ),
		'tdtax_locations' => array( $tax_term_greensboro_id, $tax_term_north_carolina_id, $tax_term_united_states_id ),
	),
));

$cpt_private_clinic_2_id = td_demo_content::add_cpt( array(
	'title' => 'Private Clinic',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_4',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5bjEwIEFNIC0gNSBQTW5TYXR1cmRheSAtIFN1bmRheW5WaXNpdGluZyBPbmx5',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'UmVzZXJ2ZWQgSW5kb29yIFNwYWNl',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MzQ2NTU0NTc3Mw==',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9kdXJoYW1jbGluaWMubmMuY29t',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBkdXJoYW1jbGluaWMubmMuY29t',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'Tm9ydGggQ2Fyb2xpbmEgNTQgLCBEdXJoYW0sIE5vcnRoIENhcm9saW5hLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_health_id ),
		'tdtax_locations' => array( $tax_term_durham_id, $tax_term_north_carolina_id, $tax_term_united_states_id ),
	),
));

$cpt_main_hospital_2_id = td_demo_content::add_cpt( array(
	'title' => 'Main Hospital',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_5',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gU3VuZGF5DQpPcGVuIEFsbCBEYXk=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'Tm8gV2lmaQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'T3BlbiAyNC83',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTQ1NTM0NjczNDQ2Ng==',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9jaGFybG90dGVoZWFsdGgubmMuY29t',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBjaGFybG90dGVoZWFsdGgubmMuY29t',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'U3RhdGUgMjQgLCBDaGFybG90dGUsIE5vcnRoIENhcm9saW5hLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_health_id ),
		'tdtax_locations' => array( $tax_term_charlotte_id, $tax_term_north_carolina_id, $tax_term_united_states_id ),
	),
));

$cpt_devon_hospital_id = td_demo_content::add_cpt( array(
	'title' => 'Devon Hospital',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_6',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gU3VuZGF5DQpPcGVuIEFsbCBEYXk=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'T3BlbiAyNC83',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Q3JlZGl0IE9ubHk=',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1NDc2NTc0NDQ1',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9kZXZvbmhlYWx0aC5ueS5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBkZXZvbmhlYWx0aC5ueS5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'TWFpbiBTdHJlZXQgLCBOZXcgWW9yaywgTmV3IFlvcmssIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_health_id ),
		'tdtax_locations' => array( $tax_term_new_york_id, $tax_term_new_york_new_york_id, $tax_term_united_states_id ),
	),
));

$cpt_private_clinic_id = td_demo_content::add_cpt( array(
	'title' => 'Private Clinic',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_7',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VkYXkNClZpc2l0aW5nIEhvdXJzIE9ubHk=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'T3V0ZG9vciBTcGFjZSBPbmx5',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MzQ2NzM0NDQ1',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9zeXJhY3VzZXBjbGluaWMubnkuY29t',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBzeXJhY3VzZXBjbGluaWMubnkuY29t',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'TmV3IFlvcmsgODAgLCBTeXJhY3VzZSwgTmV3IFlvcmssIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_health_id ),
		'tdtax_locations' => array( $tax_term_new_york_id, $tax_term_syracuse_id, $tax_term_united_states_id ),
	),
));

$cpt_main_hospital_id = td_demo_content::add_cpt( array(
	'title' => 'Main Hospital',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_8',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gU3VuZGF5DQpPcGVuIEFsbCBEYXku',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'T3BlbiAyNC83',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTUyMzY2NjM0NDQ0Mg==',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly95b25rZXJzaGVhbHRoLm55LmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBoZWFsdGh5b25rZXJzLm55LmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'WW9ua2VycyBBdmVudWUgLCBZb25rZXJzLCBOZXcgWW9yaywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_health_id ),
		'tdtax_locations' => array( $tax_term_new_york_id, $tax_term_united_states_id, $tax_term_yonkers_id ),
	),
));

$cpt_quertz_health_id = td_demo_content::add_cpt( array(
	'title' => 'Quertz Health',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_9',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQpDbG9zZWQ=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'UHJpdmF0ZSBSb29tcw==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Q2FzaCBPbmx5',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MzQ0Njc3MzQ=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9xdWVydHpoZWFsdGgubnkuY29t',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBxdWVydHpoZWFsdGgubnkuY29t',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'TmV3IFlvcmsgU3RhdGUgVGhydXdheSAsIFV0aWNhLCBOZXcgWW9yaywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_health_id ),
		'tdtax_locations' => array( $tax_term_new_york_id, $tax_term_united_states_id, $tax_term_utica_id ),
	),
));

$cpt_dental_health_ny_id = td_demo_content::add_cpt( array(
	'title' => 'Dental Health NY',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_10',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQpDbG9zZWQ=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1NTQ3Nzc0NTU3',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9kZW50YWxoZWFsdGgubnkuY29t',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBkZW50YWxoZWFsdGgubnkuY29t',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'TmV3IFNjb3RsYW5kIEF2ZW51ZSAsIEFsYmFueSwgTmV3IFlvcmssIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_health_id ),
		'tdtax_locations' => array( $tax_term_albany_id, $tax_term_new_york_id, $tax_term_united_states_id ),
	),
));

$cpt_sanatorium_health_id = td_demo_content::add_cpt( array(
	'title' => 'Sanatorium Health',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_1',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDggUE0NClNhdHVyZGF5IC0gU3VuZGF5DQpWaXNpdGluZyBPbmx5',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'T3V0ZG9vciBTcGFjZSBPbmx5',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'UHJpdmF0ZSBSb29tcw==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1NTc3Nzc1NTY0',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9zYW5hdG9yaXVtaGVhbHRoLnBhLmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBzYW5hdG9yaXVtaGVhbHRoLnBhLmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'Tm9ydGggTWFpbiBTdHJlZXQgLCBCZW5kZXJzdmlsbGUsIFBlbm5zeWx2YW5pYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_health_id ),
		'tdtax_locations' => array( $tax_term_bendersville_id, $tax_term_pennsylvania_id, $tax_term_united_states_id ),
	),
));

$cpt_stomatological_clinic_id = td_demo_content::add_cpt( array(
	'title' => 'Stomatological Clinic',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_2',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDYgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQpDbG9zZWQ=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'UmVzZXJ2ZWQgSW5kb29yIFNwYWNl',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1NzU2Nzg1Njg4',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9zdG9tYXRvbG9naWNhbGNsaW5pYy5wYS5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBzdG9tYWNsaW5pYy5wYS5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'UGVubnN5bHZhbmlhIDcyICwgTGFuY2FzdGVyLCBQZW5uc3lsdmFuaWEsIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_health_id ),
		'tdtax_locations' => array( $tax_term_lancaster_id, $tax_term_pennsylvania_id, $tax_term_united_states_id ),
	),
));

$cpt_bigby_hospital_id = td_demo_content::add_cpt( array(
	'title' => 'Bigby Hospital',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_3',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gU3VuZGF5DQpPcGVuIEFsbCBEYXku',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'UGFzc3dvcmQgT25seQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'T3BlbiAyNC83',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Q2FzaCBPbmx5',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1NTc1NTY4OTg4',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9iaWdieWhvc3BpdGFsLnBhLmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBiaWdieWhvc3BpdGFsLnBhLmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'UGVubnN5bHZhbmlhIDUxICwgUGl0dHNidXJnaCwgUGVubnN5bHZhbmlhLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_health_id ),
		'tdtax_locations' => array( $tax_term_pennsylvania_id, $tax_term_pittsburgh_id, $tax_term_united_states_id ),
	),
));

$cpt_kensignton_clinic_id = td_demo_content::add_cpt( array(
	'title' => 'Kensignton Clinic',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_4',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQpBbGwgRGF5',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'Tm8gV2lmaQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'T3V0ZG9vciBTcGFjZSBPbmx5',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'V2Vla2VuZHMgT25seQ==',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Q3JlZGl0IE9ubHk=',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1NzU2ODc4OTk5',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9rZW5zaWdudG9uY2xpbmljLnBhLmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBrZW5zaW5ndG9uY2xpbmljLnBhLmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'UGVubnN5bHZhbmlhIDIzMCAsIEhhcnJpc2J1cmcsIFBlbm5zeWx2YW5pYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_health_id ),
		'tdtax_locations' => array( $tax_term_harrisburg_id, $tax_term_pennsylvania_id, $tax_term_united_states_id ),
	),
));

$cpt_malorom_hospital_id = td_demo_content::add_cpt( array(
	'title' => 'Malorom Hospital',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_5',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gU3VuZGF5DQpBbGwgRGF5LCBFdmVyeSBEYXk=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'T3BlbiAyNC83',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1Nzc4Njc5MDc2',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9tYWxvcm9taG9zcGl0YWwucGEuY29t',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBtYWxvcm9taG9zcGl0YWwucGEuY29t',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'UGVubnN5bHZhbmlhIDM0ICwgQ2FybGlzbGUsIFBlbm5zeWx2YW5pYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_health_id ),
		'tdtax_locations' => array( $tax_term_carlisle_id, $tax_term_pennsylvania_id, $tax_term_united_states_id ),
	),
));

$cpt_canned_thoughts_id = td_demo_content::add_cpt( array(
	'title' => 'Canned Thoughts',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_6',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5bjEwIEFNIC0gNSBQTW5TYXR1cmRheSAtIFN1bmRheW4xMSBBTSAtIDcgUE0=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'Tm8gV2lmaQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Q3JlZGl0IE9ubHk=',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1ODg5Njc5OTY3',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9jYW5uZWR0aG91Z2h0cy5nYS5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBjYW5uZWR0aG91Z2h0cy5nYS5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'R2VvcmdpYSA4ICwgQXRoZW5zLCBHZW9yZ2lhLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_fashion_id ),
		'tdtax_locations' => array( $tax_term_athens_id, $tax_term_georgia_id, $tax_term_united_states_id ),
	),
));

$cpt_jays_dreamboat_id = td_demo_content::add_cpt( array(
	'title' => 'Jays Dreamboat',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_7',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQpDbG9zZWQ=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1NzY4Njg3Njk=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9qYXlzZHJlYW1ib2F0LmdhLmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBqYXlzZHJlYW1ib2F0LmdhLmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'R2VvcmdpYSA0MDEgLCBNYWNvbiwgR2VvcmdpYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_fashion_id ),
		'tdtax_locations' => array( $tax_term_georgia_id, $tax_term_macon_id, $tax_term_united_states_id ),
	),
));

$cpt_sanisboro_statem_id = td_demo_content::add_cpt( array(
	'title' => 'Sanisboro Statem',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_8',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMSBBTSAtIDYgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQpDbG9zZWQ=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Q3JlZGl0IE9ubHk=',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1Nzg2ODQ1ODg1',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9zYW5pc2Jvcm9zdGF0ZW0uZ2EuY29t',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBzYW5pc2Jvcm9zdGF0ZW0uZ2EuY29t',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'R2VvcmdpYSAyMSAsIFNhdmFubmFoLCBHZW9yZ2lhLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_fashion_id ),
		'tdtax_locations' => array( $tax_term_georgia_id, $tax_term_savannah_id, $tax_term_united_states_id ),
	),
));

$cpt_craze_daze_id = td_demo_content::add_cpt( array(
	'title' => 'Craze Daze',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_9',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDYgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQoxMSBBTSAtIDUgUE0=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1Njc1NDY3NTY4',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9jcmF6ZWRhemUuZ2EuY29t',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBjcmF6ZWRhemUuZ2EuY29t',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'R2VvcmdpYSAxNSAsIEF0aGVucywgR2VvcmdpYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_fashion_id ),
		'tdtax_locations' => array( $tax_term_athens_id, $tax_term_georgia_id, $tax_term_united_states_id ),
	),
));

$cpt_ravensure_id = td_demo_content::add_cpt( array(
	'title' => 'Ravensure',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_10',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQo4IEFNIC0gNyBQTQ==',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'Tm8gV2lmaQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Q3JlZGl0IE9ubHk=',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1NzU2Nzg4NTU=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9yYXZlbnN1cmUuZ2EuY29t',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEByYXZlbnN1cmUuZ2EuY29t',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'R2VvcmdpYSA0MiAsIEF0bGFudGEsIEdlb3JnaWEsIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_fashion_id ),
		'tdtax_locations' => array( $tax_term_atlanta_id, $tax_term_georgia_id, $tax_term_united_states_id ),
	),
));

$cpt_making_it_id = td_demo_content::add_cpt( array(
	'title' => 'Making it!',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_1',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQoxMCBBTSAtIDcgUE0=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU3NTY3NTY4ODU1',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9tYWtpbmdpdC5uYy5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBtYWtpbmdpdC5uYy5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'Tm9ydGggQ2Fyb2xpbmEgOTggLCBSYWxlaWdoLCBOb3J0aCBDYXJvbGluYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_fashion_id ),
		'tdtax_locations' => array( $tax_term_north_carolina_id, $tax_term_raleigh_id, $tax_term_united_states_id ),
	),
));

$cpt_concrete_dams_id = td_demo_content::add_cpt( array(
	'title' => 'Concrete Dams',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_2',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQpDbG9zZWQ=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1NzU2Nzg2OQ==',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9jb25jcmV0ZWRhbXMubmMuY29t',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBjb25jcmV0ZWRhbXMubmMuY29t',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'Tm9ydGggRnJvbnQgU3RyZWV0ICwgV2lsbWluZ3RvbiwgTm9ydGggQ2Fyb2xpbmEsIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_fashion_id ),
		'tdtax_locations' => array( $tax_term_north_carolina_id, $tax_term_united_states_id, $tax_term_wilmington_id ),
	),
));

$cpt_considerations_remain_id = td_demo_content::add_cpt( array(
	'title' => 'Considerations Remain',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_3',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQo5IEFNIC0gNyBQTQ==',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'Tm8gV2lmaQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1NzU2ODc4OTk1',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9jb25zaWRlcmF0aW9uc3JlbWFpbi5uYy5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBjb25zaWRlcmF0aW9uc3JlbWFpbi5uYy5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'Tm9ydGggQ2Fyb2xpbmEgNTUgLCBEdXJoYW0sIE5vcnRoIENhcm9saW5hLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_fashion_id ),
		'tdtax_locations' => array( $tax_term_durham_id, $tax_term_north_carolina_id, $tax_term_united_states_id ),
	),
));

$cpt_bays_jays_strays_id = td_demo_content::add_cpt( array(
	'title' => 'Bays, Jays, Strays',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_4',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQpDbG9zZWQ=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1NzU2ODc4OTAw',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9iYXlzamF5c3N0cmF5cy5uYy5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBiYXlzamF5c3N0cmF5cy5uYy5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'Tm9ydGggRWxtIFN0cmVldCAsIEdyZWVuc2Jvcm8sIE5vcnRoIENhcm9saW5hLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_fashion_id ),
		'tdtax_locations' => array( $tax_term_greensboro_id, $tax_term_north_carolina_id, $tax_term_united_states_id ),
	),
));

$cpt_blues_dreams_id = td_demo_content::add_cpt( array(
	'title' => 'Blues Dreams',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_5',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQoxMSBBTSAtIDcgUE0=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'Tm9uZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1NzU2Nzg1Njg=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9ibHVlc2RyZWFtcy5uYy5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBibHVlc2RyZWFtcy5uYy5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'Tm9ydGggVHJ5b24gU3RyZWV0ICwgQ2hhcmxvdHRlLCBOb3J0aCBDYXJvbGluYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_fashion_id ),
		'tdtax_locations' => array( $tax_term_charlotte_id, $tax_term_north_carolina_id, $tax_term_united_states_id ),
	),
));

$cpt_dreams_of_fashion_id = td_demo_content::add_cpt( array(
	'title' => 'Dreams of Fashion',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_6',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQo5IEFNIC0gNCBQTQ0KU2F0dXJkYXkgLSBTdW5kYXkNCjEwIEFNIC0gNiBQTQ==',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'Tm8gV2lmaQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'Tm9uZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Q2FzaCBPbmx5',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NDU1NjM0NTY3MzQ3Nw==',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9kcmVhbXNvZmZhc2hpb24ubnkuY29t',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBkcmVhbXNvZmZhc2hpb24ubnkuY29t',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'TmV3IFlvcmsgOUEgLCBOZXcgWW9yaywgTmV3IFlvcmssIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_fashion_id ),
		'tdtax_locations' => array( $tax_term_new_york_id, $tax_term_new_york_new_york_id, $tax_term_united_states_id ),
	),
));

$cpt_mens_men_men_id = td_demo_content::add_cpt( array(
	'title' => 'Mens Men Men',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_7',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQpDbG9zZWQ=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'Tm9uZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MjM2Nzc0Nzg4NA==',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9tZW5zbWVubWVuLm55LmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBtZW5zbWVubWVuLm55LmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'TmV3IFlvcmsgOUEgLCBZb25rZXJzLCBOZXcgWW9yaywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_fashion_id ),
		'tdtax_locations' => array( $tax_term_new_york_id, $tax_term_united_states_id, $tax_term_yonkers_id ),
	),
));

$cpt_marth_mall_id = td_demo_content::add_cpt( array(
	'title' => 'Marth Mall',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_8',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQoxMCBBTSAtIDggUE0=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MjM0Njc3MzQ4',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9tYXJ0aG1hbGwubnkuY29t',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBtYXJ0aG1hbGwubnkuY29t',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'TmV3IFlvcmsgOCAsIFV0aWNhLCBOZXcgWW9yaywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_fashion_id ),
		'tdtax_locations' => array( $tax_term_new_york_id, $tax_term_united_states_id, $tax_term_utica_id ),
	),
));

$cpt_confusciusremains_id = td_demo_content::add_cpt( array(
	'title' => 'ConfusciusRemains',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_9',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQo5IEFNIC0gNyBQTQ==',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'Tm8gV2lmaQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'Tm9uZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MzUzNDY2Nzc4OQ==',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9jb25mdXNjaXVzcmVtYWlucy5ueS5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBjb25mdXNjaXVzcmVtYWlucy5ueS5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'TmV3IFlvcmsgMzkwICwgUm9jaGVzdGVyLCBOZXcgWW9yaywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_fashion_id ),
		'tdtax_locations' => array( $tax_term_new_york_id, $tax_term_rochester_id, $tax_term_united_states_id ),
	),
));

$cpt_primed_ready_id = td_demo_content::add_cpt( array(
	'title' => 'Primed & Ready',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_10',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gU2F0dXJkYXkNCjEwIEFNIC0gNiBQTQ0KU3VuZGF5DQpDbG9zZWQ=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'UGFzc3dvcmQgT25seQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Q3JlZGl0IE9ubHk=',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MjM0MzY3MzQ3',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9wcmltZWRhbmRyZWFkeS5ueS5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBwcmltZWRhbmRyZWFkeS5ueS5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'TmV3IFlvcmsgMzIgLCBBbGJhbnksIE5ldyBZb3JrLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_fashion_id ),
		'tdtax_locations' => array( $tax_term_albany_id, $tax_term_new_york_id, $tax_term_united_states_id ),
	),
));

$cpt_bag_emporium_id = td_demo_content::add_cpt( array(
	'title' => 'Bag Emporium',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_1',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQo5IEFNIC0gNiBQTQ0KU2F0dXJkYXkgLSBTdW5kYXkNCjEwIEFNIC0gNyBQTQ==',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Q3JlZGl0IE9ubHk=',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTUyMzc3MzQ0NjU2Mw==',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9iYWdlbXBvcml1bS5wYS5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBiYWdlbXBvcml1bS5wYS5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'UGVubnN5bHZhbmlhIDYxMSAsIFBoaWxhZGVscGhpYSwgUGVubnN5bHZhbmlhLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_fashion_id ),
		'tdtax_locations' => array( $tax_term_pennsylvania_id, $tax_term_philadelphia_id, $tax_term_united_states_id ),
	),
));

$cpt_kensignton_statement_id = td_demo_content::add_cpt( array(
	'title' => 'Kensignton Statement',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_2',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gU2F0dXJkYXkNCjEwIEFNIC0gNSBQTQ0KU3VuZGF5IA0KQ2xvc2Vk',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MjM0MjM0MjM=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9rZW5zaWdudG9uc3RhdGVtZW50LnBhLmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBrZW5zaW5ndG9uc3RhdGVtZW50LnBhLmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'UGVubnN5bHZhbmlhIDI4MyAsIExhbmNhc3RlciwgUGVubnN5bHZhbmlhLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_fashion_id ),
		'tdtax_locations' => array( $tax_term_lancaster_id, $tax_term_pennsylvania_id, $tax_term_united_states_id ),
	),
));

$cpt_brighten_joy_id = td_demo_content::add_cpt( array(
	'title' => 'Brighten Joy',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_3',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQoxMiBQTSAtIDYgUE0=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MjM0MjM0MjM0',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9icmlnaHRlbmpveS5wYS5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBicmlnaHRlbmpveS5wYS5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'QWxleGFuZGVyIEguIExpbmRzYXkgTWVtb3JpYWwgSGlnaHdheSAsIFBpdHRzYnVyZ2gsIFBlbm5zeWx2YW5pYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_fashion_id ),
		'tdtax_locations' => array( $tax_term_pennsylvania_id, $tax_term_pittsburgh_id, $tax_term_united_states_id ),
	),
));

$cpt_house_of_sorrow_id = td_demo_content::add_cpt( array(
	'title' => 'House of Sorrow',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_4',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDYgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQpDbG9zZWQ=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'Tm8gV2lmaQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MjM0MjM1MzQ=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9ob3VzZW9mc29ycm93LnBhLmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBob3VzZW9mc29ycm93LnBhLmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'UGVubnN5bHZhbmlhIDM0ICwgQ2FybGlzbGUsIFBlbm5zeWx2YW5pYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_fashion_id ),
		'tdtax_locations' => array( $tax_term_carlisle_id, $tax_term_pennsylvania_id, $tax_term_united_states_id ),
	),
));

$cpt_clothes_avenue_id = td_demo_content::add_cpt( array(
	'title' => 'Clothes Avenue',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_5',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gU2F0dXJkYXkNCjEwIEFNIC0gNSBQTQ0KU3VuZGF5DQpDbG9zZWQ=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'Tm8gV2lmaQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'Tm9uZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MjM0MjM1MjMz',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9jbG90aGVzYXZlbnVlLnBhLmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBjbG90aGVzYXZlbnVlLnBhLmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'UGVubnN5bHZhbmlhIDIzMCAsIEhhcnJpc2J1cmcsIFBlbm5zeWx2YW5pYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_fashion_id ),
		'tdtax_locations' => array( $tax_term_harrisburg_id, $tax_term_pennsylvania_id, $tax_term_united_states_id ),
	),
));

$cpt_grammy_bowlerama_id = td_demo_content::add_cpt( array(
	'title' => 'Grammy Bowlerama',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_6',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQo0IFBNIC0gMTAgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQpBbGwgRGF5',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'T3V0ZG9vciBTcGFjZSBPbmx5',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'V2Vla2VuZHMgT25seQ==',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MjM0MjM1NjYy',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9ncmFtbXlib3dsZXJhbWEuZ2EuY29t',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBncmFtbXlib3dsZXJhbWEuZ2EuY29t',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'R2VvcmdpYSAxMjQgLCBMYXdyZW5jZXZpbGxlLCBHZW9yZ2lhLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_entertainment_id ),
		'tdtax_locations' => array( $tax_term_georgia_id, $tax_term_lawrenceville_id, $tax_term_united_states_id ),
	),
));

$cpt_santa_louise_bowl_id = td_demo_content::add_cpt( array(
	'title' => 'Santa Louise Bowl',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_7',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQo1IFBNIC0gMTAgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQo2IFBNIC0gMiBBTQ==',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MjMyNjYyMzQ=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9zYW50YWxvdWlzZWJvd2wuZ2EuY29t',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBzYW50YWxvdWlzZWJvd2wuZ2EuY29t',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'R2VvcmdpYSAxNyAsIEhlbGVuLCBHZW9yZ2lhLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_entertainment_id ),
		'tdtax_locations' => array( $tax_term_georgia_id, $tax_term_helen_id, $tax_term_united_states_id ),
	),
));

$cpt_definite_cinema_id = td_demo_content::add_cpt( array(
	'title' => 'Definite Cinema',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_8',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQo5IEFNIC0gMTAgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQpBbGwgRGF5',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'UGFzc3dvcmQgT25seQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'V2Vla2VuZHMgT25seQ==',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MjM1MzY3MzQ=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9kZWZpbml0ZWNpbmVtYS5nYS5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBkZWZpbml0ZWNpbmVtYS5nYS5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'R2VvcmdpYSA0MDEgLCBNYWNvbiwgR2VvcmdpYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_entertainment_id ),
		'tdtax_locations' => array( $tax_term_georgia_id, $tax_term_macon_id, $tax_term_united_states_id ),
	),
));

$cpt_paulos_arcade_id = td_demo_content::add_cpt( array(
	'title' => 'Paulo\'s Arcade',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_9',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDcgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQpBbGwgRGF5',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'V2Vla2VuZHMgT25seQ==',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Q2FzaCBPbmx5',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MjM2NjIyMjQ2',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9wYXVsb3NhcmNhZGUuZ2EuY29t',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBwYXVsb3NhcmNhZGUuZ2EuY29t',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'R2VvcmdpYSA0MDAgLCBBdGxhbnRhLCBHZW9yZ2lhLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_entertainment_id ),
		'tdtax_locations' => array( $tax_term_atlanta_id, $tax_term_georgia_id, $tax_term_united_states_id ),
	),
));

$cpt_cameron_cinema_id = td_demo_content::add_cpt( array(
	'title' => 'Cameron Cinema',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_10',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQo5IEFNIC0gMTAgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQpBbGwgRGF5',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'UGFzc3dvcmQgT25seQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'V2Vla2VuZHMgT25seQ==',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NDU0NDYzNDQ3MzQ2',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9jYW1lcm9uY2luZW1hLmdhLmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBjYW1lcm9uY2luZW1hLmdhLmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'R2VvcmdpYSAyMDQgLCBTYXZhbm5haCwgR2VvcmdpYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_entertainment_id ),
		'tdtax_locations' => array( $tax_term_georgia_id, $tax_term_savannah_id, $tax_term_united_states_id ),
	),
));

$cpt_candy_canes_id = td_demo_content::add_cpt( array(
	'title' => 'Candy Canes',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_1',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gVGh1cnNkYXkNCkNsb3NlZA0KRnJpZGF5IC0gU3VuZGF5DQo2IFBNIC0gOCBBTQ==',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MjM0MzY3MzMz',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9jYW5keWNhbmVzLm5jLmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBjYW5keWNhbmVzLm5jLmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'Tm9ydGggQ2Fyb2xpbmEgOTggLCBEdXJoYW0sIE5vcnRoIENhcm9saW5hLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_entertainment_id ),
		'tdtax_locations' => array( $tax_term_durham_id, $tax_term_north_carolina_id, $tax_term_united_states_id ),
	),
));

$cpt_club_fiesta_id = td_demo_content::add_cpt( array(
	'title' => 'Club Fiesta',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_2',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gVGh1cnNkYXkNCkNsb3NlZA0KRnJpZGF5IC0gU3VuZGF5DQo1IFBNIC0gNiBBTQ==',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'UmVzZXJ2ZWQgSW5kb29yIFNwYWNl',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MjMzNjM0Njc=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9jbHViZmllc3RhLm5jLmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBjbHViZmllc3RhLm5jLmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'Tm9ydGggQ2h1cmNoIFN0cmVldCAsIEdyZWVuc2Jvcm8sIE5vcnRoIENhcm9saW5hLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_entertainment_id ),
		'tdtax_locations' => array( $tax_term_greensboro_id, $tax_term_north_carolina_id, $tax_term_united_states_id ),
	),
));

$cpt_watchoton_id = td_demo_content::add_cpt( array(
	'title' => 'Watchoton',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_3',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQo1IFBNIC0gMTAgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQpBbGwgRGF5',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'UGFzc3dvcmQgT25seQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'V2Vla2VuZHMgT25seQ==',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MjM1NzIzNTM0NQ==',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly93YXRjaG90b24ubmMuY29t',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEB3YXRjaG90b24ubmMuY29t',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'Tm9ydGggSGFycmlzb24gQXZlbnVlICwgUmFsZWlnaCwgTm9ydGggQ2Fyb2xpbmEsIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_entertainment_id ),
		'tdtax_locations' => array( $tax_term_north_carolina_id, $tax_term_raleigh_id, $tax_term_united_states_id ),
	),
));

$cpt_crazed_bowling_id = td_demo_content::add_cpt( array(
	'title' => 'Crazed Bowling',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_4',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQo1IFBNIC0gMyBBTQ0KU2F0dXJkYXkgLSBTdW5kYXkNCkFsbCBEYXk=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'UGFzc3dvcmQgT25seQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'T3V0ZG9vciBTcGFjZSBPbmx5',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'V2Vla2VuZHMgT25seQ==',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MjM0MjM1Ng==',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9jcmF6ZWRib3dsaW5nLm5jLmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBjcmF6ZWRib3dsaW5nLm5jLmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'Tm9ydGggRnJvbnQgU3RyZWV0ICwgV2lsbWluZ3RvbiwgTm9ydGggQ2Fyb2xpbmEsIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_entertainment_id ),
		'tdtax_locations' => array( $tax_term_north_carolina_id, $tax_term_united_states_id, $tax_term_wilmington_id ),
	),
));

$cpt_retro_cinema_id = td_demo_content::add_cpt( array(
	'title' => 'Retro Cinema',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_5',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5bjkgQU0gLSAxMCBQTW5TYXR1cmRheSAtIFN1bmRheW5BbGwgRGF5',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'Tm8gV2lmaQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'V2Vla2VuZHMgT25seQ==',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MjM0MjM2MzQ=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9yZXRyb2NpbmVtYS5uYy5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEByZXRyb2NpbmVtYS5uYy5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'Tm9ydGggTWFya2V0IFN0cmVldCAsIEFzaGV2aWxsZSwgTm9ydGggQ2Fyb2xpbmEsIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_entertainment_id ),
		'tdtax_locations' => array( $tax_term_asheville_id, $tax_term_north_carolina_id, $tax_term_united_states_id ),
	),
));

$cpt_bowlomania_id = td_demo_content::add_cpt( array(
	'title' => 'Bowlomania',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_6',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQo0IFBNIC0gMTIgQU0NClNhdHVyZGF5IC0gU3VuZGF5DQpBbGwgRGF5',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'UGFzc3dvcmQgT25seQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'T3V0ZG9vciBTcGFjZSBPbmx5',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'V2Vla2VuZHMgT25seQ==',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MjM0MjM2MzQ=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9ib3dsb21hbmlhLm55LmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBib3dsb21hbmlhLm55LmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'TmV3IFlvcmsgMzc2ICwgUG91Z2hrZWVwc2llLCBOZXcgWW9yaywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_entertainment_id ),
		'tdtax_locations' => array( $tax_term_new_york_id, $tax_term_poughkeepsie_id, $tax_term_united_states_id ),
	),
));

$cpt_vivienne_moore_id = td_demo_content::add_cpt( array(
	'title' => 'Vivienne Moore',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_7',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gV2VkbmVzZGF5DQpDbG9zZWQNClRodXJzZGF5IC0gU2F0dXJkYXkNCjUgUE0gLSA0IEFNDQpTdW5kYXkNCkFsbCBEYXk=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'UGFzc3dvcmQgT25seQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'T3V0ZG9vciBTcGFjZSBPbmx5',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MjM0NjYyMg==',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly92aXZpZW5uZW1vb3JlLm55LmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEB2aXZpZW5uZW1vb3JlLm55LmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'TmV3IFlvcmsgOCAsIFV0aWNhLCBOZXcgWW9yaywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_entertainment_id ),
		'tdtax_locations' => array( $tax_term_new_york_id, $tax_term_united_states_id, $tax_term_utica_id ),
	),
));

$cpt_cozumta_id = td_demo_content::add_cpt( array(
	'title' => 'CozumTa',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_8',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gV2VkbmVzZGF5DQpDbG9zZWQNClRodXJzZGF5IC0gRnJpZGF5DQo1IFBNIC0gNCBBTQ0KU2F0dXJkYXkgLSBTdW5kYXkNCjYgUE0gLSA2IEFN',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'UmVzZXJ2ZWQgSW5kb29yIFNwYWNl',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MjM2NTQyMzY=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9jb3p1bXRhLm55LmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBjb3p1bXRhLm55LmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'TmV3IFlvcmsgMTAwICwgWW9ua2VycywgTmV3IFlvcmssIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_entertainment_id ),
		'tdtax_locations' => array( $tax_term_new_york_id, $tax_term_united_states_id, $tax_term_yonkers_id ),
	),
));

$cpt_rambrant_too_id = td_demo_content::add_cpt( array(
	'title' => 'Rambrant Too',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_9',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQo0IFBNIC0gMTEgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQo2IFBNIC0gNCBBTQ==',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'UGFzc3dvcmQgT25seQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'T3V0ZG9vciBTcGFjZSBPbmx5',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Q2FzaCBPbmx5',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MjM0NjYyMzY=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9yYW1icmFudHRvby5ueS5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEByYW1icmFudHRvby5ueS5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'TmV3IFlvcmsgODAgLCBTeXJhY3VzZSwgTmV3IFlvcmssIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_entertainment_id ),
		'tdtax_locations' => array( $tax_term_new_york_id, $tax_term_syracuse_id, $tax_term_united_states_id ),
	),
));

$cpt_gizmos_aplenty_id = td_demo_content::add_cpt( array(
	'title' => 'Gizmos Aplenty',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_10',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQo1IFBNIC0gMTIgQU0NClNhdHVyZGF5IC0gU3VuZGF5DQpBbGwgRGF5',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'T3V0ZG9vciBTcGFjZSBPbmx5',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'Tm9uZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'V2Vla2VuZHMgT25seQ==',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MjM2NTQ3MjM=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9naXptb3NhcGxlbnR5Lm55LmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBnaXptb3NhcGxlbnR5Lm55LmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'TmV3IFlvcmsgMTA0ICwgUm9jaGVzdGVyLCBOZXcgWW9yaywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_entertainment_id ),
		'tdtax_locations' => array( $tax_term_new_york_id, $tax_term_rochester_id, $tax_term_united_states_id ),
	),
));

$cpt_polos_games_id = td_demo_content::add_cpt( array(
	'title' => 'Polo\'s Games',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_1',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gVGh1cnNkYXkNCjUgUE0gLSAxMSBQTQ0KRnJpZGF5IC0gU2F0dXJkYXkNCjYgUE0gLSAzIEFNDQpTdW5kYXkNCkFsbCBEYXk=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'V2Vla2VuZHMgT25seQ==',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MzQ2NTc4Mw==',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9wb2xvc2dhbWVzLnBhLmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBwb2xvc2dhbWVzLnBhLmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'UGVubnN5bHZhbmlhIDM0ICwgR2V0dHlzYnVyZywgUGVubnN5bHZhbmlhLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_entertainment_id ),
		'tdtax_locations' => array( $tax_term_gettysburg_id, $tax_term_pennsylvania_id, $tax_term_united_states_id ),
	),
));

$cpt_romarta_id = td_demo_content::add_cpt( array(
	'title' => 'Romarta',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_2',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gVGh1cnNkYXkNCkNsb3NlZA0KRnJpZGF5IC0gU3VuZGF5DQo1IFBNIC0gNiBBTQ==',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'UmVzZXJ2ZWQgSW5kb29yIFNwYWNl',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MjM2MzQ2NDI=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9yb21hcnRhLnBhLmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEByb21hcnRhLnBhLmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'UGVubnN5bHZhbmlhIDM0MCAsIExhbmNhc3RlciwgUGVubnN5bHZhbmlhLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_entertainment_id ),
		'tdtax_locations' => array( $tax_term_lancaster_id, $tax_term_pennsylvania_id, $tax_term_united_states_id ),
	),
));

$cpt_bowlerama_2000_id = td_demo_content::add_cpt( array(
	'title' => 'Bowlerama 2000',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_3',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQo0IFBNIC0gMTAgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQo0IFBNIC0gMTIgQU0=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'T3V0ZG9vciBTcGFjZSBPbmx5',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'Tm9uZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MjM0MjM1Njc=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9ib3dsZXJhbWEyMDAwLnBhLmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBib3dsZXJhbWEyMDAwLnBhLmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'UGVubnN5bHZhbmlhIDIzMCAsIEhhcnJpc2J1cmcsIFBlbm5zeWx2YW5pYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_entertainment_id ),
		'tdtax_locations' => array( $tax_term_harrisburg_id, $tax_term_pennsylvania_id, $tax_term_united_states_id ),
	),
));

$cpt_cinema_von_luk_id = td_demo_content::add_cpt( array(
	'title' => 'Cinema von Luk',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_4',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQo5IEFNIC0gMTAgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQpBbGwgZGF5',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'Tm8gV2lmaQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'V2Vla2VuZHMgT25seQ==',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MjM1NjczNzIy',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9jaW5lbWF2b25sdWsucGEuY29t',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBjaW5lbWF2b25sdWsucGEuY29t',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'UGVubnN5bHZhbmlhIEF2ZW51ZSAsIFBoaWxhZGVscGhpYSwgUGVubnN5bHZhbmlhLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_entertainment_id ),
		'tdtax_locations' => array( $tax_term_pennsylvania_id, $tax_term_philadelphia_id, $tax_term_united_states_id ),
	),
));

$cpt_arcade_bonafire_id = td_demo_content::add_cpt( array(
	'title' => 'Arcade Bonafire',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_5',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gU2F0dXJkYXkNCjQgUE0gLSAyIEFNDQpTdW5kYXkNCjYgUE0gLSA0IEFN',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'Tm9uZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Q2FzaCBPbmx5',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MjM1NDIzNDU=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9hcmNhZGVib25hZmlyZS5wYS5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBhcmNhZGVib25hZmlyZS5wYS5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'UGVubnN5bHZhbmlhIDc0ICwgQ2FybGlzbGUsIFBlbm5zeWx2YW5pYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_entertainment_id ),
		'tdtax_locations' => array( $tax_term_carlisle_id, $tax_term_pennsylvania_id, $tax_term_united_states_id ),
	),
));

$cpt_elemeno_p_id = td_demo_content::add_cpt( array(
	'title' => 'Elemeno P',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_6',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQo5IEFNIC0gOCBQTQ==',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'UGFzc3dvcmQgT25seQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'T3V0ZG9vciBTcGFjZSBPbmx5',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTUyMzUzNjc=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9lbGVtZW5vcC5uYy5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBlbGVtZW5vcC5uYy5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'V2luc3Rvbi1TYWxlbSBTdHJlZXQgLCBPY2VhbiBJc2xlIEJlYWNoLCBOb3J0aCBDYXJvbGluYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_cafe_id ),
		'tdtax_locations' => array( $tax_term_north_carolina_id, $tax_term_ocean_isle_beach_id, $tax_term_united_states_id ),
	),
));

$cpt_kensington_manor_id = td_demo_content::add_cpt( array(
	'title' => 'Kensington Manor',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_7',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQo5IEFNIC0gNCBQTQ==',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'T3V0ZG9vciBTcGFjZSBPbmx5',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Q3JlZGl0IE9ubHk=',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MjM0MzQ1MzYy',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9rZW5zaW5ndG9ubWFub3IubmMuY29t',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBrZW5zaW5ndG9ubWFub3IubmMuY29t',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'Q2Fyb2xpbmEgQmVhY2ggUm9hZCAsIFdpbG1pbmd0b24sIE5vcnRoIENhcm9saW5hLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_cafe_id ),
		'tdtax_locations' => array( $tax_term_north_carolina_id, $tax_term_united_states_id, $tax_term_wilmington_id ),
	),
));

$cpt_column_pole_id = td_demo_content::add_cpt( array(
	'title' => 'Column Pole',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_8',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gV2VkbmVkYXkNCjkgQU0gLSA1IFBNDQpUaHVyc2RheSAtIFNhdHVyZGF5DQoxMCBBTSAtIDYgUE0NClN1bmRheQ0KQ2xvc2Vk',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'Tm8gV2lmaQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'MjM1MzUzNDUzNDU=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9jb2x1bW5wb2xlLm5jLmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'c3VwcG9ydEBjb2x1bW5wb2xlLm5jLmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'Tm9ydGggQ2Fyb2xpbmEgOTggLCBEdXJoYW0sIE5vcnRoIENhcm9saW5hLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_cafe_id ),
		'tdtax_locations' => array( $tax_term_durham_id, $tax_term_north_carolina_id, $tax_term_united_states_id ),
	),
));

$cpt_cancel_the_date_id = td_demo_content::add_cpt( array(
	'title' => 'Cancel the Date',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_9',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDYgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQoxMSBBTSAtIDcgUE0=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MzYzNDc3OA==',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9jYW5jZWx0aGVkYXRlLm5jLmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBjYW5jZWx0aGVkYXRlLm5jLmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'Tm9ydGggQ2h1cmNoIFN0cmVldCAsIEdyZWVuc2Jvcm8sIE5vcnRoIENhcm9saW5hLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_cafe_id ),
		'tdtax_locations' => array( $tax_term_greensboro_id, $tax_term_north_carolina_id, $tax_term_united_states_id ),
	),
));

$cpt_denver_side_id = td_demo_content::add_cpt( array(
	'title' => 'Denver Side',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_10',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDkgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQoxMSBBTSAtIDEyIEFN',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'UmVzZXJ2ZWQgSW5kb29yIFNwYWNl',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'UHJpdmF0ZSBSb29tcw==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Q2FzaCBPbmx5',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MzQ2NDU3OA==',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9kZW52ZXJzaWRlLm5jLmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBkZW52ZXJzaWRlLm5jLmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'Tm9ydGggVHJ5b24gU3RyZWV0ICwgQ2hhcmxvdHRlLCBOb3J0aCBDYXJvbGluYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_cafe_id ),
		'tdtax_locations' => array( $tax_term_charlotte_id, $tax_term_north_carolina_id, $tax_term_united_states_id ),
	),
));

$cpt_kelopod_ken_id = td_demo_content::add_cpt( array(
	'title' => 'Kelopod Ken',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_1',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQo4IEFNIC0gNSBQTQ0KU2F0dXJkYXkNCjkgQU0gLSA2IFBNDQpTdW5kYXkgDQoxMCBBTSAtIDcgUE0=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'T3V0ZG9vciBTcGFjZSBPbmx5',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'UHJpdmF0ZSBSb29tcw==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MjM2Mzc2ODM=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9rZWxvcG9ka2VuLmdlb3JnaWEuY29t',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBrZWxvcG9ka2VuLmdlb3JnaWEuY29t',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'TGF3cmVuY2V2aWxsZSBSb2FkICwgTGF3cmVuY2V2aWxsZSwgR2VvcmdpYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_cafe_id ),
		'tdtax_locations' => array( $tax_term_georgia_id, $tax_term_lawrenceville_id, $tax_term_united_states_id ),
	),
));

$cpt_mayrette_cuisine_id = td_demo_content::add_cpt( array(
	'title' => 'Mayrette Cuisine',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_2',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDYgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQo5IEFNIC0gOCBQTQ==',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Q3JlZGl0IE9ubHk=',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1NzQ1Njc1NDc=',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9tYXlyZXR0ZWN1aXNpbmUuZ2VvcmdpYS5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBtYXlyZXR0ZWN1aXNpbmUuZ2VvcmdpYS5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'R2VvcmdpYSAyNSAsIFNhdmFubmFoLCBHZW9yZ2lhLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_cafe_id ),
		'tdtax_locations' => array( $tax_term_georgia_id, $tax_term_savannah_id, $tax_term_united_states_id ),
	),
));

$cpt_loopadoom_id = td_demo_content::add_cpt( array(
	'title' => 'Loopadoom',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_3',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQo3IEFNIC0gMyBQTQ0KU2F0dXJkYXkgLSBTdW5kYXkNCjEwIEFNIC0gNSBQTQ==',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'T3V0ZG9vciBTcGFjZSBPbmx5',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'Tm9uZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MjM2NzIzNg==',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9sb29wYWRvb20uZ2VvcmdpYS5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'Y29udGFjdEBsb29wYWRvb20uZ2VvcmdpYS5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'R2VvcmdpYSAyMDQgLCBTYXZhbm5haCwgR2VvcmdpYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_cafe_id ),
		'tdtax_locations' => array( $tax_term_georgia_id, $tax_term_savannah_id, $tax_term_united_states_id ),
	),
));

$cpt_creataton_cafe_id = td_demo_content::add_cpt( array(
	'title' => 'Creataton Cafe',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_4',
	'post_meta' => array( 
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5DQo5IEFNIC0gNiBQTQ0KU3VuZGF5DQoxMCBBTSAtIDEyIEFN',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'Tm8gV2lmaQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_smoking_area' => 'T3V0ZG9vciBTcGFjZSBPbmx5',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdcf_phone_number' => 'NTU1MjM2MjY2MjM1',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_website' => 'aHR0cHM6Ly9jcmVhdGF0b24uZ2VvcmdpYS5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_email address' => 'c3VwcG9ydEBjcmVhdGF0b24uZ2VvcmdpYS5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdb-location-complete' => 'TWFjb24gUm9hZCAsIENvbHVtYnVzLCBHZW9yZ2lhLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_cafe_id ),
		'tdtax_locations' => array( $tax_term_columbus_id, $tax_term_georgia_id, $tax_term_united_states_id ),
	),
));

$cpt_kiosk_tupen_id = td_demo_content::add_cpt( array(
	'title' => 'Kiosk Tupen',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_5',
	'post_meta' => array( 
		'tdcf_amenities' => 'YToxOntpOjA7czoxMjoiU21va2luZyBBcmVhIjt9',
		'_tdcf_amenities' => 'ZmllbGRfNjJkMTIzZjI4ZTBlYw==',
		'tdcf_email address' => 'Y29udGFjdEBraW9za3R1cGVuLmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdcf_website' => 'aHR0cHM6Ly9raW9za3R1cGVuLm55LmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_phone_number' => 'NDQ0NTYzNjMzMzUyMw==',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQoxMiBQTSAtIDEyIEFN',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'UGFzc3dvcmQgT25seQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_smoking_area' => 'T3V0ZG9vciBTcGFjZSBPbmx5',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_cash_credit' => 'Q2FzaCBPbmx5',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdb-location-complete' => 'QXRsYW50YSBSb2FkIFNvdXRoZWFzdCAsIFNteXJuYSwgR2VvcmdpYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_cafe_id ),
		'tdtax_locations' => array( $tax_term_georgia_id, $tax_term_smyrna_id, $tax_term_united_states_id ),
	),
));

$cpt_miiza_id = td_demo_content::add_cpt( array(
	'title' => 'MiiZa',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_6',
	'post_meta' => array( 
		'tdcf_email address' => 'Y29udGFjdEBtaWl6YS5ueS5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdcf_website' => 'aHR0cHM6Ly90aGVtaWl6YS5ueS5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_phone_number' => 'NDQ0NjIzNjcyMzM1NQ==',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDQgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQoxMSBBTSAtIDExIFBN',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_air_conditioning' => 'UHJpdmF0ZSBSb29tcw==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_smoking_area' => 'UmVzZXJ2ZWQgSW5kb29yIFNwYWNl',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_cash_credit' => 'Q3JlZGl0IE9ubHk=',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdb-location-complete' => 'TmV3IFlvcmsgOCAsIFV0aWNhLCBOZXcgWW9yaywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_cafe_id ),
		'tdtax_locations' => array( $tax_term_new_york_id, $tax_term_united_states_id, $tax_term_utica_id ),
	),
));

$cpt_magnum_briefs_id = td_demo_content::add_cpt( array(
	'title' => 'Magnum Briefs',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_7',
	'post_meta' => array( 
		'tdcf_email address' => 'Y29udGFjdEBtYWdudW1icmllZnMubnkuY29t',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdcf_website' => 'aHR0cHM6Ly9tYWdudW1icmllZnMubnkuY29t',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_phone_number' => 'MzMzNTIzNjY3MjM2Nw==',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_open_hours' => 'TW9uZGF5IC0gU2F0dXJkYXkNCjkgQU0gLSA1IFBNDQpTdW5kYXkNCjExIEFNIC0gOCBQTQ==',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_air_conditioning' => 'Tm9uZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdb-location-complete' => 'QmluZ2hhbXRvbiBTdHJlZXQgLCBBbGJhbnksIE5ldyBZb3JrLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_cafe_id ),
		'tdtax_locations' => array( $tax_term_albany_id, $tax_term_new_york_id, $tax_term_united_states_id ),
	),
));

$cpt_coastal_reef_id = td_demo_content::add_cpt( array(
	'title' => 'Coastal Reef',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_8',
	'post_meta' => array( 
		'tdcf_email address' => 'Y29udGFjdEBjb2FzdGFscmVlZnMubnkuY29t',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdcf_website' => 'aHR0cHM6Ly9jb2FzdGFscmVlZnMubnkuY29t',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_phone_number' => 'NDU1MzQ2NzIzNTYzNA==',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQo5IEFNIC0gNSBQTQ0KU2F0dXJkYXkNCjEwIEFNIC0gNiBQTQ0KU3VuZGF5DQoxMSBBTSAtIDcgUE0=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_smoking_area' => 'T3V0ZG9vciBTcGFjZSBPbmx5',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_cash_credit' => 'Q3JlZGl0IE9ubHk=',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdb-location-complete' => 'WW9ua2VycyBBdmVudWUgLCBZb25rZXJzLCBOZXcgWW9yaywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_cafe_id ),
		'tdtax_locations' => array( $tax_term_new_york_id, $tax_term_united_states_id, $tax_term_yonkers_id ),
	),
));

$cpt_lontario_quertz_id = td_demo_content::add_cpt( array(
	'title' => 'Lontario Quertz',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_9',
	'post_meta' => array( 
		'tdcf_email address' => 'Y29udGFjdEBsb250YXJpb3F1ZXJ0ei5ueS5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdcf_website' => 'aHR0cHM6Ly9sb250YXJpb3F1ZXJ0ei5ueS5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_phone_number' => 'NTU1NDU3ODMzMjM1NA==',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMSBBTSAtIDggUE0NClNhdHVyZGF5IC0gU3VuZGF5DQoxMiBQTSAtIDEyIEFN',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_smoking_area' => 'UmVzZXJ2ZWQgSW5kb29yIFNwYWNl',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdb-location-complete' => 'TmV3IFlvcmsgMTA0ICwgUm9jaGVzdGVyLCBOZXcgWW9yaywgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_cafe_id ),
		'tdtax_locations' => array( $tax_term_new_york_id, $tax_term_rochester_id, $tax_term_united_states_id ),
	),
));

$cpt_rabid_rabbits_id = td_demo_content::add_cpt( array(
	'title' => 'Rabid Rabbits',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_10',
	'post_meta' => array( 
		'tdcf_email address' => 'Y29udGFjdEByYWJpZHJhYmJpdHMubnkuY29t',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdcf_website' => 'aHR0cHM6Ly9yYWJpZHJhYmJpdHMubnkuY29t',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_phone_number' => 'NTU1NzU0NzM0NDc4Nw==',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMSBBTSAtIDcgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQoxMSBBTSAtIDExIFBN',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_air_conditioning' => 'Tm9uZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_cash_credit' => 'Q2FzaCBPbmx5',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdb-location-complete' => 'TmV3IFlvcmsgU3RhdGUgVGhydXdheSAsIEFsYmFueSwgTmV3IFlvcmssIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_cafe_id ),
		'tdtax_locations' => array( $tax_term_albany_id, $tax_term_new_york_id, $tax_term_united_states_id ),
	),
));

$cpt_paulo_querto_id = td_demo_content::add_cpt( array(
	'title' => 'Paulo Querto',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_1',
	'post_meta' => array( 
		'tdcf_email address' => 'Y29udGFjdEBwYXVsb3F1ZXJ0by5wYS5jb20=',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdcf_website' => 'aHR0cHM6Ly9wYXVsb3F1ZXJ0by5wYS5jb20=',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_phone_number' => 'NTU1MjM2NzIzNjczNA==',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDYgUE0NClNhdHVyZGF5DQoxMCBBTSAtIDcgUE0NClN1bmRheQ0KMTAgQU0gLSA4IFBN',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'UGFzc3dvcmQgT25seQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdb-location-complete' => 'UGVubnN5bHZhbmlhIDYxMSAsIFBoaWxhZGVscGhpYSwgUGVubnN5bHZhbmlhLCBVbml0ZWQgU3RhdGVz',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_cafe_id ),
		'tdtax_locations' => array( $tax_term_pennsylvania_id, $tax_term_philadelphia_id, $tax_term_united_states_id ),
	),
));

$cpt_kiosk_stendal_id = td_demo_content::add_cpt( array(
	'title' => 'Kiosk Stendal',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_2',
	'post_meta' => array( 
		'tdcf_email address' => 'Y29udGFjdEBraW9za3N0ZW5kYWwucGEuY29t',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdcf_website' => 'aHR0cHM6Ly9raW9za3N0ZW5kYWwucGEuY29t',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_phone_number' => 'NTU1MjM1NDcyMzUz',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_open_hours' => 'TW9uZGF5IC0gV2VkbmVzZGF5DQoxMCBBTSAtIDUgUE0NClRodXJzZGF5IC0gU2F0dXJkYXkNCjExIEFNIC0gNiBQTQ0KU3VuZGF5DQpDbG9zZWQ=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'UGFzc3dvcmQgT25seQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_air_conditioning' => 'RXZlcnl3aGVyZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_smoking_area' => 'T3V0ZG9vciBTcGFjZSBPbmx5',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdb-location-complete' => 'Tm9ydGggU3RyZWV0IEhBUlJJU0JVUkcsIEhhcnJpc2J1cmcsIFBlbm5zeWx2YW5pYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_cafe_id ),
		'tdtax_locations' => array( $tax_term_harrisburg_id, $tax_term_pennsylvania_id, $tax_term_united_states_id ),
	),
));

$cpt_jackal_cafe_id = td_demo_content::add_cpt( array(
	'title' => 'Jackal Cafe',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_3',
	'post_meta' => array( 
		'tdcf_email address' => 'Y29udGFjdEBqYWNrYWxjYWZlLnBhLmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdcf_website' => 'aHR0cHM6Ly9qYWNrYWxjYWZlLnBhLmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_phone_number' => 'NTU1MjMzNjcyMzY3OA==',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_open_hours' => 'TW9uZGF5IC0gV2VkbmVzZGF5IA0KOCBBTSAtIDQgUE0NClRodXJzZGF5IC0gU2F0dXJkYXkNCjEwIEFNIC0gNiBQTQ0KU3VuZGF5DQoxMiBBTSAtIDggUE0=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_air_conditioning' => 'Tm9uZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_cash_credit' => 'Q3JlZGl0IE9ubHk=',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdb-location-complete' => 'Q2FybGlzbGUgUGlrZSAsIE1lY2hhbmljc2J1cmcsIFBlbm5zeWx2YW5pYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_cafe_id ),
		'tdtax_locations' => array( $tax_term_mechanicsburg_id, $tax_term_pennsylvania_id, $tax_term_united_states_id ),
	),
));

$cpt_apolini_structure_id = td_demo_content::add_cpt( array(
	'title' => 'Apolini Structure',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_4',
	'post_meta' => array( 
		'tdcf_email address' => 'c3VwcG9ydEBhcG9saW5pc3RydWN0dXJlLnBhLmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdcf_website' => 'aHR0cHM6Ly9hcG9saW5pc3RydWN0dXJlLnBhLmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_phone_number' => 'NTU1MzQ2NzIzNjcy',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDYgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQoxMSBBTSAtIDcgUE0=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'UGFzc3dvcmQgT25seQ==',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_air_conditioning' => 'Tm9uZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_smoking_area' => 'TmVpdGhlcg==',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_private_parking' => 'T25seSBQdWJsaWM=',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_cash_credit' => 'Q2FzaCBPbmx5',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdb-location-complete' => 'Q2VudHJhbCBEcml2ZSAsIExhbnNkYWxlLCBQZW5uc3lsdmFuaWEsIFVuaXRlZCBTdGF0ZXM=',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_cafe_id ),
		'tdtax_locations' => array( $tax_term_lansdale_id, $tax_term_pennsylvania_id, $tax_term_united_states_id ),
	),
));

$cpt_cafe_de_la_piesa_id = td_demo_content::add_cpt( array(
	'title' => 'Cafe de la Piesa',
	'type' => 'tdcpt_directories',
	'file' => 'tdcpt_directories_default.txt',
	'cpt_image_td_id' => 'td_pic_5',
	'post_meta' => array( 
		'tdcf_email address' => 'Y29udGFjdEBjYWZlZGVsYXBpZXNhLnBhLmNvbQ==',
		'_tdcf_email address' => 'ZmllbGRfNjJkMTI1NDM4ZTBlZA==',
		'tdcf_website' => 'aHR0cHM6Ly9jYWZlZGVsYXBpZXNhLnBhLmNvbQ==',
		'_tdcf_website' => 'ZmllbGRfNjJkMTI1NzU4ZTBlZQ==',
		'tdcf_phone_number' => 'NTU1MjMzNjQ3MjMzNg==',
		'_tdcf_phone_number' => 'ZmllbGRfNjJkMTI1OTc4ZTBmMA==',
		'tdcf_open_hours' => 'TW9uZGF5IC0gRnJpZGF5DQoxMCBBTSAtIDUgUE0NClNhdHVyZGF5IC0gU3VuZGF5DQoxMSBBTSAtIDYgUE0=',
		'_tdcf_open_hours' => 'ZmllbGRfNjJkMTI1ZTc4ZTBmMQ==',
		'tdcf_free_wifi' => 'RnJlZSBXaWZp',
		'_tdcf_free_wifi' => 'ZmllbGRfNjJmNTRjZmMxZjFlZA==',
		'tdcf_open_247' => 'U2NoZWR1bGUgQmFzZWQ=',
		'_tdcf_open_247' => 'ZmllbGRfNjJmNjM4NDU4NmRlMg==',
		'tdcf_air_conditioning' => 'Tm9uZQ==',
		'_tdcf_air_conditioning' => 'ZmllbGRfNjJmNjM4NmI4NmRlMw==',
		'tdcf_smoking_area' => 'T3V0ZG9vciBTcGFjZSBPbmx5',
		'_tdcf_smoking_area' => 'ZmllbGRfNjJmNjM4ODQ4NmRlNA==',
		'tdcf_private_parking' => 'UHJpdmF0ZSBQYXJraW5n',
		'_tdcf_private_parking' => 'ZmllbGRfNjJmNjM4YTM4NmRlNQ==',
		'tdcf_cash_credit' => 'Qm90aA==',
		'_tdcf_cash_credit' => 'ZmllbGRfNjJmNjM4Yzg4NmRlNg==',
		'tdb-location-complete' => 'UGVubnN5bHZhbmlhIFR1cm5waWtlICwgQXJvbmEsIFBlbm5zeWx2YW5pYSwgVW5pdGVkIFN0YXRlcw==',
	),
	'cpt_taxonomies' => array( 
		'tdtax_services' => array( $tax_term_cafe_id ),
		'tdtax_locations' => array( $tax_term_arona_id, $tax_term_pennsylvania_id, $tax_term_united_states_id ),
	),
));


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

$menu_item_1_id = td_demo_menus::add_link( array(
    'title' => 'Services',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_taxonomy( array(
    'title' => 'Cafe',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'taxonomy' => 'tdtax_services',
    'tax_id' => $tax_term_cafe_id,
    'parent_id' => $menu_item_1_id
));

$menu_item_3_id = td_demo_menus::add_taxonomy( array(
    'title' => 'Entertainment',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'taxonomy' => 'tdtax_services',
    'tax_id' => $tax_term_entertainment_id,
    'parent_id' => $menu_item_1_id
));

$menu_item_4_id = td_demo_menus::add_taxonomy( array(
    'title' => 'Fashion',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'taxonomy' => 'tdtax_services',
    'tax_id' => $tax_term_fashion_id,
    'parent_id' => $menu_item_1_id
));

$menu_item_5_id = td_demo_menus::add_taxonomy( array(
    'title' => 'Health',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'taxonomy' => 'tdtax_services',
    'tax_id' => $tax_term_health_id,
    'parent_id' => $menu_item_1_id
));

$menu_item_6_id = td_demo_menus::add_taxonomy( array(
    'title' => 'Restaurant',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'taxonomy' => 'tdtax_services',
    'tax_id' => $tax_term_restaurant_id,
    'parent_id' => $menu_item_1_id
));

$menu_item_7_id = td_demo_menus::add_taxonomy( array(
    'title' => 'Location',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'taxonomy' => 'tdtax_locations',
    'tax_id' => $tax_term_united_states_id,
    'parent_id' => ''
));

$menu_item_8_id = td_demo_menus::add_taxonomy( array(
    'title' => 'Pennsylvania',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'taxonomy' => 'tdtax_locations',
    'tax_id' => $tax_term_pennsylvania_id,
    'parent_id' => $menu_item_7_id
));

$menu_item_9_id = td_demo_menus::add_taxonomy( array(
    'title' => 'New York',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'taxonomy' => 'tdtax_locations',
    'tax_id' => $tax_term_new_york_id,
    'parent_id' => $menu_item_7_id
));

$menu_item_10_id = td_demo_menus::add_taxonomy( array(
    'title' => 'Georgia',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'taxonomy' => 'tdtax_locations',
    'tax_id' => $tax_term_georgia_id,
    'parent_id' => $menu_item_7_id
));

$menu_item_11_id = td_demo_menus::add_taxonomy( array(
    'title' => 'North Carolina',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'taxonomy' => 'tdtax_locations',
    'tax_id' => $tax_term_north_carolina_id,
    'parent_id' => $menu_item_7_id
));

$menu_item_12_id = td_demo_menus::add_mega_menu( array(
    'title' => 'Blog',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_blog_id,
    'parent_id' => ''
), true);

$menu_item_13_id = td_demo_menus::add_page(array(
    'title' => 'Submit Your Venue',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'page_id' => $page_eastcoast_check_form_id,
    'parent_id' => ''
));

/*  ----------------------------------------------------------------------------
	CLOUD TEMPLATES
*/
$template_search_template_id = td_demo_content::add_cloud_template( array(
    'title' => 'EastCoast Check - Search Template',
    'file' => 'search_cloud_template.txt',
    'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_id);


$template_date_template_id = td_demo_content::add_cloud_template( array(
    'title' => 'EastCoast Check - Date Template',
    'file' => 'date_cloud_template.txt',
    'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_id);


$template_tag_template_id = td_demo_content::add_cloud_template( array(
    'title' => 'EastCoast Check - Tag Template',
    'file' => 'tag_cloud_template.txt',
    'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_id);


$template_category_template_id = td_demo_content::add_cloud_template( array(
    'title' => 'EastCoast Check - Category Template',
    'file' => 'cat_cloud_template.txt',
    'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_id);


$template_author_template_id = td_demo_content::add_cloud_template( array(
    'title' => 'EastCoast Check - Author Template',
    'file' => 'author_cloud_template.txt',
    'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_id);


$template_404_template_id = td_demo_content::add_cloud_template( array(
    'title' => 'EastCoast Check - 404 Template',
    'file' => '404_cloud_template.txt',
    'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_id);


$template_custom_post_type_id = td_demo_content::add_cloud_template( array(
    'title' => 'EastCoast Check - Custom Post Type',
    'file' => 'cpt_cloud_template.txt',
    'template_type' => 'cpt',
));

td_demo_misc::update_global_cpt_template( 'tdb_template_' . $template_custom_post_type_id, 'tdcpt_directories' );


td_demo_misc::update_global_cpt_template( 'tdb_template_' . $template_custom_post_type_id, 'tdc-review' );


$template_custom_taxonomy_id = td_demo_content::add_cloud_template( array(
    'title' => 'EastCoast Check - Custom Taxonomy',
    'file' => 'cpt_tax_cloud_template.txt',
    'template_type' => 'cpt_tax',
));

td_demo_misc::update_global_cpt_tax_template( 'tdb_template_' . $template_custom_taxonomy_id, 'tdtax_services' );


td_demo_misc::update_global_cpt_tax_template( 'tdb_template_' . $template_custom_taxonomy_id, 'tdc-review-criteria' );


td_demo_misc::update_global_cpt_tax_template( 'tdb_template_' . $template_custom_taxonomy_id, 'tdtax_locations' );


$template_single_template_id = td_demo_content::add_cloud_template( array(
    'title' => 'EastCoast Check - Single Template',
    'file' => 'post_cloud_template.txt',
    'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_id);


$template_footer_template_id = td_demo_content::add_cloud_template( array(
    'title' => 'EastCoast Check - Footer Template',
    'file' => 'footer_cloud_template.txt',
    'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_id);


$template_header_template_id = td_demo_content::add_cloud_template( array(
    'title' => 'EastCoast Check - Header Template',
    'file' => 'header_cloud_template.txt',
    'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_id);


update_post_meta( $template_header_template_id, 'header_mobile_menu_id', $menu_td_demo_header_menu_id);



/*  ----------------------------------------------------------------------------
	GENERAL SETTINGS
*/
td_demo_misc::update_background('', false);

td_demo_misc::update_background_mobile('tdx_pic_10');

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

