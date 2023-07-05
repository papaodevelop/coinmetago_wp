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
        'name' => 'Yearly Plan - News Hub PRO',
        'price' => '100',
        'months_in_cycle' => '12',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"59623096e5bfbad";}',
    )
);

$plan_monthly_plan_id = td_demo_subscription::add_plan( array(
        'name' => 'Monthly Plan - News Hub PRO',
        'price' => '10',
        'months_in_cycle' => '1',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"35623096e5bfc51";}',
    )
);

$plan_free_plan_id = td_demo_subscription::add_plan( array(
        'name' => 'Free Plan - News Hub PRO',
        'price' => '',
        'months_in_cycle' => '',
        'trial_days' => '0',
        'is_free' => '1',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"16623096e5bfcb3";}',
    )
);

$page_payment_page_id_id = td_demo_content::add_page(array(
    'title' => 'Checkout - News Hub PRO',
    'file' => 'tds_checkout.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'payment_page_id',
        'value' => $page_payment_page_id_id,
    )
);

$page_my_account_page_id_id = td_demo_content::add_page(array(
    'title' => 'My Account - News Hub PRO',
    'file' => 'tds_my_account.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'my_account_page_id',
        'value' => $page_my_account_page_id_id,
    )
);

$page_create_account_page_id_id = td_demo_content::add_page(array(
    'title' => 'Login/Register - News Hub PRO',
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

$cat_africa_id = td_demo_category::add_category(array(
    'category_name' => 'Africa',
    'parent_id' => $cat_world_id,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => '',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_asia_id = td_demo_category::add_category(array(
    'category_name' => 'Asia',
    'parent_id' => $cat_world_id,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => '',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_europe_id = td_demo_category::add_category(array(
    'category_name' => 'Europe',
    'parent_id' => $cat_world_id,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => '',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_bussiness_id = td_demo_category::add_category(array(
    'category_name' => 'Bussiness',
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

$cat_science_id = td_demo_category::add_category(array(
    'category_name' => 'Science',
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

$cat_sports_id = td_demo_category::add_category(array(
    'category_name' => 'Sports',
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
$menu_td_demo_custom_menu_id = td_demo_menus::create_menu('td-demo-custom-menu', '');

$menu_td_demo_header_menu_id = td_demo_menus::create_menu('td-demo-header-menu', '');


/*  ----------------------------------------------------------------------------
	PAGES
*/
$page_plans_select_news_hub_pro_id = td_demo_content::add_page(array(
    'title' => 'Plans Select - News Hub PRO',
    'file' => 'plans_select_news_hub_pro.txt',
    'demo_unique_id' => '19623096e5d8608',
));

$page_terms_of_use_id = td_demo_content::add_page(array(
    'title' => 'Terms of Use',
    'file' => 'terms_of_use.txt',
    'demo_unique_id' => '43623096e5d8aaf',
));

$page_privacy_policy_id = td_demo_content::add_page(array(
    'title' => 'Privacy Policy',
    'file' => 'privacy_policy.txt',
    'demo_unique_id' => '11623096e5d8f6f',
));

$page_contact_us_id = td_demo_content::add_page(array(
    'title' => 'Contact Us',
    'file' => 'contact_us.txt',
    'demo_unique_id' => '84623096e5d9409',
));

$page_about_newshub_id = td_demo_content::add_page(array(
    'title' => 'About NewsHub',
    'file' => 'about_newshub.txt',
    'demo_unique_id' => '55623096e5d9965',
));

$page_premium_content_id = td_demo_content::add_page(array(
    'title' => 'Premium Content',
    'file' => 'premium_content.txt',
    'demo_unique_id' => '83623096e5d9e8d',
));

$page_menu_popup_news_hub_pro_id = td_demo_content::add_page(array(
    'title' => 'Menu Popup - News Hub PRO',
    'file' => 'menu_popup_news_hub_pro.txt',
    'demo_unique_id' => '44623096e5da2a6',
));

$page_home_id = td_demo_content::add_page(array(
    'title' => 'Home',
    'file' => 'home.txt',
    'homepage' => true,
    'demo_unique_id' => '6623096e5dadc2',
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
        'title' => 'Subscription Locker - News Hub PRO',
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
        'tds_paid_subs_page_id' => $page_plans_select_news_hub_pro_id,
        'tds_paid_subs_plan_ids' => [$plan_yearly_plan_id,$plan_monthly_plan_id,$plan_free_plan_id],
        'tds_locker_styles' => array(
            'tds_bg_color' => '#333333',
            'tds_title_color' => '#ffffff',
            'tds_message_color' => '#cccccc',
            'tds_submit_btn_bg_color' => '#d61935',
            'tds_submit_btn_bg_color_h' => '#d6374f',
            'tds_after_btn_text_color' => '#999999',
            'tds_pp_checked_color' => '#d61935',
            'tds_pp_check_bg' => '#0f0f0f',
            'tds_pp_check_border_color' => '#0f0f0f',
            'tds_pp_msg_color' => '#999999',
            'tds_pp_msg_links_color' => '#cccccc',
            'tds_pp_msg_links_color_h' => '#ffffff',
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
                'tds_locker_cf_1_name' => 'Custom field 1',
                'tds_locker_cf_2_name' => 'Custom field 2',
                'tds_locker_cf_3_name' => 'Custom field 3',
            ),
            'tds_locker_styles' => array(
                'tds_bg_color' => '#333333',
                'tds_title_color' => '#ffffff',
                'tds_message_color' => '#cccccc',
                'tds_input_color' => '#ffffff',
                'tds_input_bg_color' => '#0f0f0f',
                'tds_input_border_color' => '#0f0f0f',
                'tds_submit_btn_bg_color' => '#d61935',
                'tds_submit_btn_bg_color_h' => '#d6374f',
                'tds_after_btn_text_color' => '#999999',
                'tds_pp_checked_color' => '#d61935',
                'tds_pp_check_bg' => '#0f0f0f',
                'tds_pp_check_border_color' => '#0f0f0f',
                'tds_pp_msg_color' => '#999999',
                'tds_pp_msg_links_color' => '#cccccc',
                'tds_pp_msg_links_color_h' => '#ffffff',
                'tds_general_font_family' => '325',
            ),
        )
    )
);

td_util::update_option('tds_demo_options', 'a:1:{s:5:"plans";a:3:{i:0;a:2:{s:9:"unique_id";s:15:"59623096e5bfbad";s:4:"name";s:11:"Yearly Plan";}i:1;a:2:{s:9:"unique_id";s:15:"35623096e5bfc51";s:4:"name";s:12:"Monthly Plan";}i:2;a:2:{s:9:"unique_id";s:15:"16623096e5bfcb3";s:4:"name";s:9:"Free Plan";}}}');


/*  ----------------------------------------------------------------------------
	SUBSCRIPTION - end phase 2
*/


/*  ----------------------------------------------------------------------------
	POSTS
*/
$post_td_post_fresh_banana_leaves_shows_how_indigenous_people_have_been_harmed_id = td_demo_content::add_post(array(
    'title' => '\'Fresh Banana Leaves\' shows how Indigenous people have been harmed',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_science_id,),
));

$post_td_post_a_fast_radio_bursts_unlikely_source_may_be_a_cluster_of_old_stars_id = td_demo_content::add_post(array(
    'title' => 'A fast radio burst’s unlikely source may be a cluster of old stars',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'categories_id_array' => array($cat_science_id,),
));

$post_td_post_tiny_living_machines_called_xenobots_can_create_copies_of_themselves_id = td_demo_content::add_post(array(
    'title' => 'Tiny living machines called xenobots can create copies of themselves',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'categories_id_array' => array($cat_science_id,),
));

$post_td_post_a_newfound_quasicrystal_formed_in_the_first_atomic_bomb_testesd_in_us_id = td_demo_content::add_post(array(
    'title' => 'A newfound quasicrystal formed in the first atomic bomb testesd in US',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'tds_locker' => '144',
    'categories_id_array' => array($cat_science_id,),
));

$post_td_post_how_omicrons_mutations_make_it_the_most_infectious_coronavirus_variant_id = td_demo_content::add_post(array(
    'title' => 'How omicron\'s mutations make it the most infectious coronavirus variant',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_science_id,),
));

$post_td_post_africas_fynbos_plants_hold_their_ground_with_the_worlds_thinnest_roots_id = td_demo_content::add_post(array(
    'title' => 'Africa\'s fynbos plants hold their ground with the world\'s thinnest roots',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'categories_id_array' => array($cat_science_id,),
));

$post_td_post_can_you_name_barcas_starting_xi_from_last_europa_league_appearance_id = td_demo_content::add_post(array(
    'title' => 'Can you name Barca\'s starting XI from last Europa League appearance?',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'categories_id_array' => array($cat_sports_id,),
));

$post_td_post_after_scoring_confirmed_should_taylor_offer_catterall_a_rematch_id = td_demo_content::add_post(array(
    'title' => 'After scoring confirmed, should Taylor offer Catterall a rematch?',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'categories_id_array' => array($cat_sports_id,),
));

$post_td_post_the_internal_battle_when_counter_culture_meets_elite_sport_id = td_demo_content::add_post(array(
    'title' => 'The \'internal battle\' when counter culture meets elite sport',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_sports_id,),
));

$post_td_post_messi_inspired_grealish_helps_man_city_beat_peterborough_in_match_id = td_demo_content::add_post(array(
    'title' => '\'Messi-inspired\' Grealish helps Man City beat Peterborough in match',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'categories_id_array' => array($cat_sports_id,),
));

$post_td_post_svitolina_on_a_mission_for_ukraine_after_beating_russias_potapova_id = td_demo_content::add_post(array(
    'title' => 'Svitolina on a \'mission\' for Ukraine after beating Russia\'s Potapova',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_sports_id,),
));

$post_td_post_abramovichs_future_as_chelsea_owner_in_doubt_after_billionaires_claim_id = td_demo_content::add_post(array(
    'title' => 'Abramovich\'s future as Chelsea owner in doubt after billionaire\'s claim',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'categories_id_array' => array($cat_sports_id,),
));

$post_td_post_target_thinks_it_can_keep_growing_sales_heres_how_the_retailer_will_do_it_id = td_demo_content::add_post(array(
    'title' => 'Target thinks it can keep growing sales, here’s how the retailer will do it',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_bussiness_id,),
));

$post_td_post_amc_is_charging_more_for_batman_tickets_as_it_tests_out_a_new_pricing_model_id = td_demo_content::add_post(array(
    'title' => 'AMC is charging more for ‘Batman’ tickets as it tests out a new pricing model',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'categories_id_array' => array($cat_bussiness_id,),
));

$post_td_post_benioff_touts_salesforces_sales_guidance_30_billions_are_ahead_of_us_id = td_demo_content::add_post(array(
    'title' => 'Benioff touts Salesforce’s sales guidance, \'$30 billions are ahead of us\'',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'categories_id_array' => array($cat_bussiness_id,),
));

$post_td_post_meta_says_todays_cellular_networks_arent_ready_for_the_metaverse_id = td_demo_content::add_post(array(
    'title' => 'Meta says today’s cellular networks aren’t ready for the metaverse',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'categories_id_array' => array($cat_bussiness_id,),
));

$post_td_post_ford_splits_evs_into_separate_units_as_it_boosts_electric_business_id = td_demo_content::add_post(array(
    'title' => 'Ford splits EVs into separate units as it boosts electric business',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_bussiness_id,),
));

$post_td_post_nordstrom_shares_soar_as_it_makes_baby_steps_still_has_a_ways_to_go_id = td_demo_content::add_post(array(
    'title' => 'Nordstrom shares soar as it makes \'baby steps\', still has a ways to go',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'categories_id_array' => array($cat_bussiness_id,),
));

$post_td_post_scientists_use_ivory_tusk_dna_data_to_locate_poaching_networks_id = td_demo_content::add_post(array(
    'title' => 'Scientists use ivory tusk DNA data to locate poaching networks',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'categories_id_array' => array($cat_africa_id,$cat_world_id,),
));

$post_td_post_tanzania_unveils_new_non_invasive_method_to_detect_covid_19_id = td_demo_content::add_post(array(
    'title' => 'Tanzania unveils new non-invasive method to detect COVID-19',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'categories_id_array' => array($cat_africa_id,$cat_world_id,),
));

$post_td_post_nigeria_to_ban_money_rituals_and_smoking_in_nollywood_movies_id = td_demo_content::add_post(array(
    'title' => 'Nigeria to ban money rituals and smoking in Nollywood movies',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_africa_id,$cat_world_id,),
));

$post_td_post_eritrean_tesfatsion_wins_tour_du_rwanda_for_second_time_id = td_demo_content::add_post(array(
    'title' => 'Eritrean Tesfatsion wins Tour du Rwanda for second time',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'categories_id_array' => array($cat_africa_id,$cat_world_id,),
));

$post_td_post_netflix_to_premiere_african_reality_show_young_famous_african_id = td_demo_content::add_post(array(
    'title' => 'Netflix to premiere African reality show \'Young, Famous & African\'',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_africa_id,$cat_world_id,),
));

$post_td_post_africa_records_high_number_of_gamers_with_some_turning_pro_id = td_demo_content::add_post(array(
    'title' => 'Africa records high number of gamers with some turning pro',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'categories_id_array' => array($cat_africa_id,$cat_world_id,),
));

$post_td_post_in_seoul_housing_is_at_the_centre_of_the_south_korea_election_id = td_demo_content::add_post(array(
    'title' => 'In Seoul, housing is at the centre of the South Korea election',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_asia_id,$cat_world_id,),
));

$post_td_post_seals_help_japanese_researchers_collect_data_under_antarctic_ice_id = td_demo_content::add_post(array(
    'title' => 'Seals help Japanese researchers collect data under Antarctic ice',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'categories_id_array' => array($cat_asia_id,$cat_world_id,),
));

$post_td_post_thailand_agrees_plan_for_saudi_arabia_labour_as_ties_normalise_id = td_demo_content::add_post(array(
    'title' => 'Thailand agrees plan for Saudi Arabia labour as ties normalise',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'categories_id_array' => array($cat_asia_id,$cat_world_id,),
));

$post_td_post_elderly_athlete_breaks_thai_100m_record_for_centenarians_id = td_demo_content::add_post(array(
    'title' => 'Elderly athlete breaks Thai 100m record - for centenarians',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'categories_id_array' => array($cat_asia_id,$cat_world_id,),
));

$post_td_post_taiwan_president_to_donate_salary_for_ukraine_relief_efforts_id = td_demo_content::add_post(array(
    'title' => 'Taiwan president to donate salary for Ukraine relief efforts',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_asia_id,$cat_world_id,),
));

$post_td_post_us_former_diplomat_arrives_in_taiwan_calls_it_great_nation_id = td_demo_content::add_post(array(
    'title' => 'US former diplomat arrives in Taiwan, calls it \'great nation\'',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'categories_id_array' => array($cat_asia_id,$cat_world_id,),
));

$post_td_post_macron_denies_mali_mission_was_a_failure_as_french_forces_pull_out_id = td_demo_content::add_post(array(
    'title' => 'Macron denies Mali mission was a failure as French forces pull out',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'categories_id_array' => array($cat_europe_id,$cat_world_id,),
));

$post_td_post_near_the_frontline_in_eastern_ukraine_snipers_and_scepticism_abound_id = td_demo_content::add_post(array(
    'title' => 'Near the frontline in eastern Ukraine, snipers and scepticism abound',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'categories_id_array' => array($cat_europe_id,$cat_world_id,),
));

$post_td_post_eight_bulgarians_among_11_missing_after_fire_on_ship_near_corfu_id = td_demo_content::add_post(array(
    'title' => 'Eight Bulgarians among 11 missing after fire on ship near Corfu',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_europe_id,$cat_world_id,),
));

$post_td_post_more_people_in_need_of_charity_in_europe_since_covid_19_ngo_says_id = td_demo_content::add_post(array(
    'title' => 'More people in need of charity in Europe since COVID-19, NGO says',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'categories_id_array' => array($cat_europe_id,$cat_world_id,),
));

$post_td_post_europe_looks_for_alternate_gas_solutions_but_could_it_be_left_in_cold_id = td_demo_content::add_post(array(
    'title' => 'Europe looks for alternate gas solutions but could it be left in cold?',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_europe_id,$cat_world_id,),
));

$post_td_post_ukraine_is_pushing_for_eu_membership_but_what_are_the_real_chances_id = td_demo_content::add_post(array(
    'title' => 'Ukraine is pushing for EU membership. But what are the real chances?',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'categories_id_array' => array($cat_europe_id,$cat_world_id,),
));

$post_td_post_ramping_cut_almost_in_half_in_last_four_months_sa_government_says_id = td_demo_content::add_post(array(
    'title' => 'Ramping cut almost in half in last four months, SA government says',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_what_are_the_major_parties_in_the_lead_up_to_sas_state_election_id = td_demo_content::add_post(array(
    'title' => 'What are the major parties in the lead-up to SA\'s state election?',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_war_in_ukraine_will_not_be_short_and_its_changed_everything_for_europe_id = td_demo_content::add_post(array(
    'title' => 'War in Ukraine will not be short, and it\'s changed everything for Europe',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_wa_records_1766_new_local_covid_cases_as_it_prepares_to_open_border_id = td_demo_content::add_post(array(
    'title' => 'WA records 1,766 new local COVID cases as it prepares to open border',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_clive_palmer_may_have_just_bought_hitlers_car_say_liberals_and_labor_id = td_demo_content::add_post(array(
    'title' => 'Clive Palmer may have just bought Hitler\'s car, say Liberals and Labor',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'categories_id_array' => array($cat_politics_id,),
));

$post_td_post_mud_army_2_0_urged_to_check_with_home_owners_before_tossing_things_out_id = td_demo_content::add_post(array(
    'title' => 'Mud Army 2.0 urged to check with home owners before tossing things out',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_politics_id,),
));


/*  ----------------------------------------------------------------------------
	PRODUCTS
*/


/*  ----------------------------------------------------------------------------
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_page(array(
    'title' => 'About NewsHub',
    'add_to_menu_id' => $menu_td_demo_custom_menu_id,
    'page_id' => $page_about_newshub_id,
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_page(array(
    'title' => 'Contact Us',
    'add_to_menu_id' => $menu_td_demo_custom_menu_id,
    'page_id' => $page_contact_us_id,
    'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_page(array(
    'title' => 'Privacy Policy',
    'add_to_menu_id' => $menu_td_demo_custom_menu_id,
    'page_id' => $page_privacy_policy_id,
    'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_page(array(
    'title' => 'Terms of Use',
    'add_to_menu_id' => $menu_td_demo_custom_menu_id,
    'page_id' => $page_terms_of_use_id,
    'parent_id' => ''
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
    'title' => 'World',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_world_id,
    'parent_id' => ''
), true);

$menu_item_2_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Politics',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_politics_id,
    'parent_id' => ''
), true);

$menu_item_3_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Bussiness',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_bussiness_id,
    'parent_id' => ''
), true);

$menu_item_4_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Sports',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_sports_id,
    'parent_id' => ''
), true);

$menu_item_5_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Science',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_science_id,
    'parent_id' => ''
), true);


/*  ----------------------------------------------------------------------------
	CLOUD TEMPLATES
*/
$template_header_template_2_id = td_demo_content::add_cloud_template(array(
    'title' => 'Header Template - Single Post Template',
    'file' => 'header_cloud_template_single.txt',
    'template_type' => 'header',
));

$template_tag_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Tag Template',
    'file' => 'tag_cloud_template.txt',
    'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_id);


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


$template_author_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Author Template',
    'file' => 'author_cloud_template.txt',
    'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_id);


$template_category_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Category Template',
    'file' => 'cat_cloud_template.txt',
    'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_id);


$template_single_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Single Template',
    'file' => 'post_cloud_template.txt',
    'template_type' => 'single',
    'header_template_id' => $template_header_template_2_id,
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_id);


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
    'title' => 'Header Template - Main',
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
