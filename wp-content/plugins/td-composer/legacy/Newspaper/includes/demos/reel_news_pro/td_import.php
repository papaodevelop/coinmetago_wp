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



$plan_free_plan_id = td_demo_subscription::add_plan( array(
        'name' => 'Free Plan - Reel News PRO',
        'price' => '',
        'months_in_cycle' => '',
        'trial_days' => '0',
        'is_free' => '1',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"25625e6ef3e1300";}',
    )
);

$plan_yearly_plan_id = td_demo_subscription::add_plan( array(
        'name' => 'Yearly Plan - Reel News PRO',
        'price' => '100',
        'months_in_cycle' => '12',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"93625e6ef3e1372";}',
    )
);

$plan_monthly_plan_id = td_demo_subscription::add_plan( array(
        'name' => 'Monthly Plan - Reel News PRO',
        'price' => '10',
        'months_in_cycle' => '1',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"58625e6ef3e13b8";}',
    )
);

$page_payment_page_id_id = td_demo_content::add_page(array(
    'title' => 'Checkout',
    'file' => 'tds_checkout.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'payment_page_id',
        'value' => $page_payment_page_id_id,
    )
);

$page_my_account_page_id_id = td_demo_content::add_page(array(
    'title' => 'My Account',
    'file' => 'tds_my_account.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'my_account_page_id',
        'value' => $page_my_account_page_id_id,
    )
);

$page_create_account_page_id_id = td_demo_content::add_page(array(
    'title' => 'Login/Register',
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

$cat_movies_id = td_demo_category::add_category(array(
    'category_name' => 'Movies',
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

$cat_tv_id = td_demo_category::add_category(array(
    'category_name' => 'TV',
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

$cat_streaming_id = td_demo_category::add_category(array(
    'category_name' => 'Streaming',
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

$cat_reviews_id = td_demo_category::add_category(array(
    'category_name' => 'Reviews',
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

$cat_interviews_id = td_demo_category::add_category(array(
    'category_name' => 'Interviews',
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

$cat_reality_tv_id = td_demo_category::add_category(array(
    'category_name' => 'Reality TV',
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
$page_newsletter_modal_id = td_demo_content::add_page(array(
    'title' => 'Newsletter Modal - Reel News PRO',
    'file' => 'newsletter_modal.txt',
    'demo_unique_id' => '75625e6ef40f3e2',
));

$page_select_plan_reel_news_pro_id = td_demo_content::add_page(array(
    'title' => 'Select Plan - Reel News PRO',
    'file' => 'select_plan_reel_news_pro.txt',
    'demo_unique_id' => '58625e6ef40f905',
));

$page_home_id = td_demo_content::add_page(array(
    'title' => 'Home',
    'file' => 'home.txt',
    'template' => 'default',
    'homepage' => true,
    'demo_unique_id' => '19625e6ef410635',
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
        'title' => 'Subscription Locker - Reel News PRO',
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
        'tds_paid_subs_page_id' => $page_select_plan_reel_news_pro_id,
        'tds_paid_subs_plan_ids' => [$plan_free_plan_id,$plan_yearly_plan_id,$plan_monthly_plan_id],
        'tds_locker_styles' => array(
            'tds_submit_btn_bg_color' => '#312da1',
            'tds_submit_btn_bg_color_h' => '#000000',
            'tds_pp_checked_color' => '#312da1',
            'tds_pp_msg_links_color' => '#312da1',
            'tds_pp_msg_links_color_h' => '#000000',
            'tds_general_font_family' => '394',
            'tds_title_font_weight' => '700',
            'tds_title_font_transform' => 'uppercase',
            'tds_message_font_weight' => '500',
            'tds_submit_btn_text_font_weight' => '700',
            'tds_after_btn_text_font_weight' => '500',
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

td_util::update_option('tds_demo_options', 'a:1:{s:5:"plans";a:3:{i:0;a:2:{s:9:"unique_id";s:15:"25625e6ef3e1300";s:4:"name";s:9:"Free Plan - Reel News PRO";}i:1;a:2:{s:9:"unique_id";s:15:"93625e6ef3e1372";s:4:"name";s:11:"Yearly Plan - Reel News PRO";}i:2;a:2:{s:9:"unique_id";s:15:"58625e6ef3e13b8";s:4:"name";s:12:"Monthly Plan - Reel News PRO";}}}');


/*  ----------------------------------------------------------------------------
	SUBSCRIPTION - end phase 2
*/

/*  ----------------------------------------------------------------------------
	POSTS
*/
$post_td_post_the_bachelorette_why_fans_think_tayshia_could_be_joining_e_news_id = td_demo_content::add_post(array(
    'title' => 'The Bachelorette: Why Fans Think Tayshia Could Be Joining E! News',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_reality_tv_id,),
));

$post_td_post_lpbw_how_amy_is_inspiring_fans_with_her_little_kitchen_recipes_id = td_demo_content::add_post(array(
    'title' => 'LPBW: How Amy Is Inspiring Fans With Her Little Kitchen Recipes',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'categories_id_array' => array($cat_reality_tv_id,),
));

$post_td_post_1000_lb_sisters_why_amy_slatons_lost_weight_tammy_hasnt_id = td_demo_content::add_post(array(
    'title' => '1000-lb Sisters: Why Amy Slaton\'s Lost Weight & Tammy Hasn\'t',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'categories_id_array' => array($cat_reality_tv_id,),
));

$post_td_post_the_masked_singer_american_idol_singers_who_competed_on_the_show_id = td_demo_content::add_post(array(
    'title' => 'The Masked Singer: American Idol Singers Who Competed On The Show',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'categories_id_array' => array($cat_reality_tv_id,),
));

$post_td_post_kim_kardashian_got_pete_to_play_middleman_between_scott_travis_id = td_demo_content::add_post(array(
    'title' => 'Kim Kardashian Got Pete to Play \'Middleman\' Between Scott & Travis',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_reality_tv_id,),
));

$post_td_post_carole_radziwill_would_not_return_to_rhony_legacy_spin_off_id = td_demo_content::add_post(array(
    'title' => 'Carole Radziwill \'Would Not\' Return To RHONY Legacy Spin-Off',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'categories_id_array' => array($cat_reality_tv_id,),
));

$post_td_post_the_real_housewives_of_dubai_meet_nina_ali_from_lebanon_texas_id = td_demo_content::add_post(array(
    'title' => 'The Real Housewives of Dubai: Meet Nina Ali From Lebanon & Texas',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_reality_tv_id,),
));

$post_td_post_90_day_fiance_angela_deem_reportedly_filming_with_in_nigeria_id = td_demo_content::add_post(array(
    'title' => '90 Day Fiancé: Angela Deem Reportedly Filming With In Nigeria',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'categories_id_array' => array($cat_reality_tv_id,),
));

$post_td_post_matt_lintz_ms_marvel_interview_at_premiere_of_marvels_moon_knight_id = td_demo_content::add_post(array(
    'title' => 'Matt Lintz: Ms. Marvel Interview at Premiere of Marvel’s Moon Knight',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_interviews_id,),
));

$post_td_post_brittany_bradford_fran_kranz_fiona_glascott_interview_julia_id = td_demo_content::add_post(array(
    'title' => 'Brittany Bradford, Fran Kranz & Fiona Glascott Interview: Julia Smith',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_interviews_id,),
));

$post_td_post_xander_mobus_allegra_clark_matthew_david_rudd_interview_id = td_demo_content::add_post(array(
    'title' => 'Xander Mobus, Allegra Clark, & Matthew David Rudd Interview',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_interviews_id,),
));

$post_td_post_david_dastmalchian_interview_moon_knight_red_carpet_premiere_today_id = td_demo_content::add_post(array(
    'title' => 'David Dastmalchian Interview: Moon Knight Red Carpet Premiere Today',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'categories_id_array' => array($cat_interviews_id,),
));

$post_td_post_gary_oldman_and_jack_lowden_on_slow_horses_future_series_plans_id = td_demo_content::add_post(array(
    'title' => 'Gary Oldman and Jack Lowden on \'Slow Horses,\' Future Series Plans',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'categories_id_array' => array($cat_interviews_id,),
));

$post_td_post_brittany_snow_revisits_prom_night_and_the_importance_of_results_id = td_demo_content::add_post(array(
    'title' => 'Brittany Snow Revisits \'Prom Night\' and the Importance of Results',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'categories_id_array' => array($cat_interviews_id,),
));

$post_td_post_benedict_cumberbatch_digs_into_toxic_masculinity_in_his_new_film_id = td_demo_content::add_post(array(
    'title' => 'Benedict Cumberbatch Digs Into Toxic Masculinity in His New Film',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_interviews_id,),
));

$post_td_post_flee_creators_on_being_a_refugee_its_a_circumstance_of_life_id = td_demo_content::add_post(array(
    'title' => '\'Flee\' Creators on Being a Refugee: It\'s a Circumstance of Life',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_interviews_id,),
));

$post_td_post_tethered_review_imperfect_indie_horror_falls_short_but_has_its_moments_id = td_demo_content::add_post(array(
    'title' => 'Tethered Review: Imperfect Indie Horror Falls Short, But Has Its Moments',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_reviews_id,),
));

$post_td_post_infinite_storm_review_naomi_watts_anchors_solid_emotional_survival_drama_id = td_demo_content::add_post(array(
    'title' => 'Infinite Storm Review: Naomi Watts Anchors Solid, Emotional Survival Drama',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_reviews_id,),
));

$post_td_post_the_lost_city_review_bullock_tatum_charm_in_fun_old_school_adventure_id = td_demo_content::add_post(array(
    'title' => 'The Lost City Review: Bullock & Tatum Charm In Fun Old-School Adventure',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_reviews_id,),
));

$post_td_post_morbius_review_jared_letos_sony_marvel_entry_is_boring_unoriginal_id = td_demo_content::add_post(array(
    'title' => 'Morbius Review: Jared Leto\'s Sony Marvel Entry Is Boring & Unoriginal',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_reviews_id,),
));

$post_td_post_you_wont_be_alone_review_inventive_horror_is_ambitious_to_a_fault_id = td_demo_content::add_post(array(
    'title' => 'You Won\'t Be Alone Review: Inventive Horror Is Ambitious To A Fault',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_reviews_id,),
));

$post_td_post_everything_everywhere_all_at_once_review_yeoh_in_imaginative_sci_fi_id = td_demo_content::add_post(array(
    'title' => 'Everything Everywhere All At Once Review: Yeoh In Imaginative Sci-Fi',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_reviews_id,),
));

$post_td_post_pirates_review_three_charming_leads_make_for_a_fun_slight_adventure_id = td_demo_content::add_post(array(
    'title' => 'Pirates Review: Three Charming Leads Make For A Fun, Slight Adventure',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_reviews_id,),
));

$post_td_post_moonshot_review_lana_condor_cole_sprouse_lead_charming_space_rom_com_id = td_demo_content::add_post(array(
    'title' => 'Moonshot Review: Lana Condor & Cole Sprouse Lead Charming Space Rom-Com',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_reviews_id,),
));

$post_td_post_the_girl_from_plainville_release_date_cast_and_everything_we_know_id = td_demo_content::add_post(array(
    'title' => '\'The Girl From Plainville: Release Date, Cast, and Everything We Know',
    'file' => 'post_default.txt',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'featured_image_td_id' => 'td_pic_5',
    'categories_id_array' => array($cat_news_id,$cat_streaming_id,),
));

$post_td_post_how_to_watch_benedetta_is_paul_verhoevens_latest_on_streaming_id = td_demo_content::add_post(array(
    'title' => 'How to Watch \'Benedetta\': Is Paul Verhoeven\'s Latest on Streaming?',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_news_id,$cat_streaming_id,),
));

$post_td_post_black_panther_director_ryan_coogler_joins_mcu_ironheart_show_id = td_demo_content::add_post(array(
    'title' => '\'Black Panther\' Director Ryan Coogler Joins MCU \'Ironheart\' Show',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_news_id,$cat_streaming_id,),
));

$post_td_post_how_to_watch_better_nate_than_ever_is_the_musical_streaming_online_id = td_demo_content::add_post(array(
    'title' => 'How to Watch \'Better Nate Than Ever\': Is the Musical Streaming Online?',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_news_id,$cat_streaming_id,),
));

$post_td_post_the_outlaws_release_date_cast_trailer_and_everything_we_know_id = td_demo_content::add_post(array(
    'title' => '\'The Outlaws\': Release Date, Cast, Trailer, and Everything We Know',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_news_id,$cat_streaming_id,),
));

$post_td_post_international_true_crime_docuseries_to_watch_on_netflix_right_now_id = td_demo_content::add_post(array(
    'title' => 'International True Crime Docuseries to Watch on Netflix Right Now',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_news_id,$cat_streaming_id,),
));

$post_td_post_lift_adds_gugu_mbatha_raw_vincent_donofrio_and_billy_magnussen_id = td_demo_content::add_post(array(
    'title' => '\'Lift\' Adds Gugu Mbatha-Raw, Vincent D\'Onofrio, and Billy Magnussen',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_news_id,$cat_streaming_id,),
));

$post_td_post_money_heist_korea_cast_trailer_and_everything_we_know_so_far_id = td_demo_content::add_post(array(
    'title' => '\'Money Heist: Korea\': Cast, Trailer, and Everything We Know So Far',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_news_id,$cat_streaming_id,),
));

$post_td_post_is_snl_new_tonight_heres_what_we_know_about_the_next_episode_id = td_demo_content::add_post(array(
    'title' => 'Is \'SNL\' New Tonight? Here’s What We Know About the Next Episode',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_news_id,$cat_tv_id,),
));

$post_td_post_the_witcher_season_3_image_first_look_at_geralt_yennefers_return_id = td_demo_content::add_post(array(
    'title' => 'The Witcher Season 3 Image: First Look At Geralt & Yennefer\'s Return',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_news_id,$cat_tv_id,),
));

$post_td_post_moon_knight_detail_already_teased_its_next_shocking_identity_twist_id = td_demo_content::add_post(array(
    'title' => 'Moon Knight Detail Already Teased Its Next Shocking Identity Twist',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_news_id,$cat_tv_id,),
));

$post_td_post_young_sheldon_idea_was_inspired_by_jim_parsons_10_year_old_nephew_id = td_demo_content::add_post(array(
    'title' => 'Young Sheldon Idea Was Inspired By Jim Parson\'s 10 Year Old Nephew',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_news_id,$cat_tv_id,),
));

$post_td_post_stone_cold_steve_austin_stuns_wrestlemania_audience_with_one_last_match_id = td_demo_content::add_post(array(
    'title' => 'Stone Cold Steve Austin Stuns WrestleMania Audience With One Last Match',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_news_id,$cat_tv_id,),
));

$post_td_post_family_law_canadian_legal_drama_just_acquired_by_the_cw_network_id = td_demo_content::add_post(array(
    'title' => '\'Family Law\': Canadian Legal Drama Just Acquired by The CW Network',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_news_id,$cat_tv_id,),
));

$post_td_post_the_first_lady_clip_reveals_gillian_anderson_as_eleanor_roosevelt_id = td_demo_content::add_post(array(
    'title' => '\'The First Lady\' Clip Reveals Gillian Anderson as Eleanor Roosevelt',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_news_id,$cat_tv_id,),
));

$post_td_post_the_quest_hybrid_fantasy_competition_series_coming_soon_to_disney_id = td_demo_content::add_post(array(
    'title' => '\'The Quest\': Hybrid Fantasy-Competition Series Coming Soon to Disney+',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_news_id,$cat_tv_id,),
));

$post_td_post_x_men_hugh_jackman_once_used_his_wolverine_role_to_avoid_deportation_id = td_demo_content::add_post(array(
    'title' => 'X-Men: Hugh Jackman Once Used His Wolverine Role to Avoid Deportation',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_movies_id,$cat_news_id,),
));

$post_td_post_star_trek_leonard_nimoys_spock_ears_donated_to_smithsonian_id = td_demo_content::add_post(array(
    'title' => '\'Star Trek\': Leonard Nimoy\'s Spock Ears Donated to Smithsonian',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_movies_id,$cat_news_id,),
));

$post_td_post_encantos_luisa_actor_reveals_characters_birthday_in_fun_new_video_id = td_demo_content::add_post(array(
    'title' => 'Encanto\'s Luisa Actor Reveals Character\'s Birthday in Fun New Video',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_movies_id,$cat_news_id,),
));

$post_td_post_alexander_skarsgard_on_why_people_didnt_take_him_seriously_as_an_actor_id = td_demo_content::add_post(array(
    'title' => 'Alexander Skarsgård On Why People Didn’t Take Him Seriously as an Actor',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_movies_id,$cat_news_id,),
));

$post_td_post_no_way_homes_ned_leeds_reacts_to_working_with_maguire_garfield_id = td_demo_content::add_post(array(
    'title' => 'No Way Home\'s Ned Leeds Reacts to Working With Maguire & Garfield',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_movies_id,$cat_news_id,),
));

$post_td_post_the_batman_crosses_700_million_worldwide_at_global_box_office_id = td_demo_content::add_post(array(
    'title' => '\'The Batman\' Crosses $700 Million Worldwide at Global Box Office',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_movies_id,$cat_news_id,),
));

$post_td_post_glaad_media_awards_honors_hacks_eternals_and_more_in_2022_ceremony_id = td_demo_content::add_post(array(
    'title' => 'GLAAD Media Awards Honors Hacks, Eternals, and More in 2022 Ceremony',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_movies_id,$cat_news_id,),
));

$post_td_post_extraction_2_has_wrapped_filming_after_5_months_of_snowy_sets_id = td_demo_content::add_post(array(
    'title' => '\'Extraction 2\' Has Wrapped Filming After 5 Months of Snowy Sets',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_movies_id,$cat_news_id,),
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
    'title' => 'Reviews',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_reviews_id,
    'parent_id' => ''
), true);

$menu_item_3_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Interviews',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_interviews_id,
    'parent_id' => ''
), true);

$menu_item_4_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Reality TV',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_reality_tv_id,
    'parent_id' => ''
), true);


/*  ----------------------------------------------------------------------------
	CLOUD TEMPLATES
*/
$template_search_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Search Template - Reel News PRO',
    'file' => 'search_cloud_template.txt',
    'template_type' => 'search',
));
td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_id);


$template_tag_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Tag Template - Reel News PRO',
    'file' => 'tag_cloud_template.txt',
    'template_type' => 'tag',
));
td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_id);


$template_date_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Date Template - Reel News PRO',
    'file' => 'date_cloud_template.txt',
    'template_type' => 'date',
));
td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_id);


$template_author_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Author Template - Reel News PRO',
    'file' => 'author_cloud_template.txt',
    'template_type' => 'author',
));
td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_id);


$template_category_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Category Template - Reel News PRO',
    'file' => 'cat_cloud_template.txt',
    'template_type' => 'category',
));
td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_id);


$template_single_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Single Template - Reel News PRO',
    'file' => 'post_cloud_template.txt',
    'template_type' => 'single',
));
td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_id);


$template_404_template_id = td_demo_content::add_cloud_template(array(
    'title' => '404 Template - Reel News PRO',
    'file' => '404_cloud_template.txt',
    'template_type' => '404',
));
td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_id);


$template_footer_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Footer Template - Reel News PRO',
    'file' => 'footer_cloud_template.txt',
    'template_type' => 'footer',
));
td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_id);


$template_header_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Header Template - Reel News PRO',
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

td_demo_misc::add_social_buttons(array('facebook' => '#','instagram' => '#','tiktok' => '#','twitter' => '#','youtube' => '#',));

$generated_css = td_css_generator();
if ( function_exists('tdsp_css_generator') ) {
    $generated_css .= tdsp_css_generator();
}
td_util::update_option( 'tds_user_compile_css', $generated_css );
