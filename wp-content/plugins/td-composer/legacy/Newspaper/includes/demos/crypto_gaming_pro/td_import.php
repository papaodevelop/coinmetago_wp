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


$plan_starter_plan___monthly___crypto_gaming_pro_id = td_demo_subscription::add_plan( array(
        'name' => 'Starter Plan - Monthly - Crypto Gaming PRO',
        'price' => '5',
        'months_in_cycle' => '1',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"856217969f187b4";}',
    )
);

$plan_starter_plan___yearly___crypto_gaming_pro_id = td_demo_subscription::add_plan( array(
        'name' => 'Starter Plan - Yearly - Crypto Gaming PRO',
        'price' => '50',
        'months_in_cycle' => '12',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"546217969f18866";}',
    )
);

$plan_advanced_plan___monthly___crypto_gaming_pro_id = td_demo_subscription::add_plan( array(
        'name' => 'Advanced Plan - Monthly - Crypto Gaming PRO',
        'price' => '10',
        'months_in_cycle' => '1',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"166217969f188a7";}',
    )
);

$plan_advanced_plan___yearly___crypto_gaming_pro_id = td_demo_subscription::add_plan( array(
        'name' => 'Advanced Plan - Yearly - Crypto Gaming PRO',
        'price' => '100',
        'months_in_cycle' => '12',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"906217969f188e9";}',
    )
);

$plan_ultimate_plan___monthly___crypto_gaming_pro_id = td_demo_subscription::add_plan( array(
        'name' => 'Ultimate Plan - Monthly - Crypto Gaming PRO',
        'price' => '15',
        'months_in_cycle' => '1',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"136217969f1897b";}',
    )
);

$plan_ultimate_plan___yearly___crypto_gaming_pro_id = td_demo_subscription::add_plan( array(
        'name' => 'Ultimate Plan - Yearly - Crypto Gaming PRO',
        'price' => '150',
        'months_in_cycle' => '12',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"666217969f189f8";}',
    )
);

$page_payment_page_id_id = td_demo_content::add_page(array(
    'title' => 'Checkout - crypto_gaming_pro',
    'file' => 'checkout_crypto_gaming_pro.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'payment_page_id',
        'value' => $page_payment_page_id_id,
    )
);

$page_my_account_page_id_id = td_demo_content::add_page(array(
    'title' => 'My Account - crypto_gaming_pro',
    'file' => 'my_account_crypto_gaming_pro.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'my_account_page_id',
        'value' => $page_my_account_page_id_id,
    )
);

$page_create_account_page_id_id = td_demo_content::add_page(array(
    'title' => 'Login/Register - crypto_gaming_pro',
    'file' => 'login_register_crypto_gaming_pro.txt',
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

$cat_editorial_id = td_demo_category::add_category(array(
    'category_name' => 'Editorial',
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

$cat_weekly_digest_id = td_demo_category::add_category(array(
    'category_name' => 'Weekly Digest',
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

$cat_giveaways_id = td_demo_category::add_category(array(
    'category_name' => 'Giveaways',
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

$cat_guides_id = td_demo_category::add_category(array(
    'category_name' => 'Guides',
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



/*  ----------------------------------------------------------------------------
	ATTACHMENTS
*/



/*  ----------------------------------------------------------------------------
	PAGES
*/
$page_home_id = td_demo_content::add_page(array(
    'title' => 'Home',
    'file' => 'home.txt',
    'homepage' => true,
    'demo_unique_id' => '186217969f391b3',
));

$page_subscription_modal_crypto_gaming_pro_id = td_demo_content::add_page(array(
    'title' => 'Subscription Modal - Crypto Gaming PRO',
    'file' => 'subscription_modal_crypto_gaming_pro.txt',
    'demo_unique_id' => '56217969f38c05',
));

$page_tds_switching_plans_wizard_id = td_demo_content::add_page(array(
    'title' => 'Switching plans wizard - Crypto Gaming PRO',
    'file' => 'tds_switching_plans_wizard.txt',
    'demo_unique_id' => '706217969f39679',
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
        'title' => 'Subscription Locker - Crypto Gaming PRO',
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
        'tds_paid_subs_plan_ids' => [$plan_starter_plan___monthly___crypto_gaming_pro_id,$plan_starter_plan___yearly___crypto_gaming_pro_id,$plan_advanced_plan___monthly___crypto_gaming_pro_id,$plan_advanced_plan___yearly___crypto_gaming_pro_id,$plan_ultimate_plan___monthly___crypto_gaming_pro_id,$plan_ultimate_plan___yearly___crypto_gaming_pro_id],
        'tds_locker_styles' => array(
            'tds_bg_color' => '#131313',
            'tds_title_color' => '#ffffff',
            'tds_message_color' => '#afafaf',
            'tds_submit_btn_text_color_h' => '#131313',
            'tds_submit_btn_bg_color' => '#2081e2',
            'tds_submit_btn_bg_color_h' => '#ffffff',
            'tds_after_btn_text_color' => '#757777',
            'tds_pp_checked_color' => '#2081e2',
            'tds_pp_check_bg' => '#131313',
            'tds_pp_check_bg_f' => '#131313',
            'tds_pp_check_border_color' => 'rgba(175,175,175,0.25)',
            'tds_pp_check_border_color_f' => '#2081e2',
            'tds_pp_msg_color' => '#757777',
            'tds_pp_msg_links_color' => '#afafaf',
            'tds_pp_msg_links_color_h' => '#2081e2',
            'tds_general_font_family' => '406',
            'tds_title_font_weight' => '700',
            'tds_message_font_weight' => '700',
            'tds_submit_btn_text_font_weight' => '700',
            'tds_after_btn_text_font_weight' => '700',
            'tds_pp_msg_font_weight' => '700',
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

td_util::update_option('tds_demo_options', 'a:1:{s:5:"plans";a:6:{i:0;a:2:{s:9:"unique_id";s:15:"856217969f187b4";s:4:"name";s:42:"Starter Plan - Monthly - Crypto Gaming PRO";}i:1;a:2:{s:9:"unique_id";s:15:"546217969f18866";s:4:"name";s:41:"Starter Plan - Yearly - Crypto Gaming PRO";}i:2;a:2:{s:9:"unique_id";s:15:"166217969f188a7";s:4:"name";s:43:"Advanced Plan - Monthly - Crypto Gaming PRO";}i:3;a:2:{s:9:"unique_id";s:15:"906217969f188e9";s:4:"name";s:42:"Advanced Plan - Yearly - Crypto Gaming PRO";}i:4;a:2:{s:9:"unique_id";s:15:"136217969f1897b";s:4:"name";s:43:"Ultimate Plan - Monthly - Crypto Gaming PRO";}i:5;a:2:{s:9:"unique_id";s:15:"666217969f189f8";s:4:"name";s:42:"Ultimate Plan - Yearly - Crypto Gaming PRO";}}}');


/*  ----------------------------------------------------------------------------
	SUBSCRIPTION - end phase 2
*/



/*  ----------------------------------------------------------------------------
	POSTS
*/
$post_td_post_enjoker_giveaway_claim_the_multiverse_item_id = td_demo_content::add_post(array(
    'title' => 'ENJoker Giveaway! Claim The Multiverse Item',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_giveaways_id,),
));

$post_td_post_founders_token_giveaway_by_beyond_horizon_id = td_demo_content::add_post(array(
    'title' => 'Founders Token Giveaway by Beyond Horizon',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_giveaways_id,),
));

$post_td_post_epic_war_riders_claim_your_garage_tokens_id = td_demo_content::add_post(array(
    'title' => 'Epic War Riders – Claim Your Garage Tokens',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_giveaways_id,),
));

$post_td_post_20_in_eth_for_selected_few_by_gods_unchained_id = td_demo_content::add_post(array(
    'title' => '$20 in ETH For Selected Few by Gods Unchained',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_giveaways_id,),
));

$post_td_post_stake_crates_for_fame_in_synergy_of_serra_id = td_demo_content::add_post(array(
    'title' => 'Stake Crates For Fame In Synergy of Serra',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_giveaways_id,),
));

$post_td_post_giveaways_play_to_earn_opportunities_id = td_demo_content::add_post(array(
    'title' => 'Giveaways & Play-to-Earn Opportunities',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_giveaways_id,),
));

$post_td_post_learn_blockchain_development_and_build_your_own_game_id = td_demo_content::add_post(array(
    'title' => 'Learn Blockchain Development and Build Your Own Game',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_guides_id,),
));

$post_td_post_how_to_buy_crypto_collectibles_participate_in_presales_id = td_demo_content::add_post(array(
    'title' => 'How to Buy Crypto Collectibles & Participate in Presales',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_guides_id,),
));

$post_td_post_crypto_games_a_guide_to_blockchain_game_development_id = td_demo_content::add_post(array(
    'title' => 'Crypto Games: A Guide to Blockchain Game Development',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_guides_id,),
));

$post_td_post_blockchain_monster_hunt_guide_how_to_make_money_id = td_demo_content::add_post(array(
    'title' => 'Blockchain Monster Hunt Guide: How to Make Money',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_guides_id,),
));

$post_td_post_what_are_crypto_collectibles_everything_you_need_to_know_id = td_demo_content::add_post(array(
    'title' => 'What are Crypto Collectibles? Everything You Need to Know',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_guides_id,),
));

$post_td_post_getting_started_in_blockchain_gaming_guide_explained_id = td_demo_content::add_post(array(
    'title' => 'Getting Started in Blockchain Gaming Guide Explained',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_guides_id,),
));

$post_td_post_gala_games_town_star_mirandus_with_jason_brink_id = td_demo_content::add_post(array(
    'title' => 'Gala Games Town Star & Mirandus With Jason Brink',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'categories_id_array' => array($cat_interviews_id,),
));

$post_td_post_talking_hash_rush_with_cmo_alexander_benitez_cm_id = td_demo_content::add_post(array(
    'title' => 'Talking Hash Rush With CMO Alexander Benitez & CM',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'categories_id_array' => array($cat_interviews_id,),
));

$post_td_post_alien_worlds_interview_with_co_founder_saro_mckenna_id = td_demo_content::add_post(array(
    'title' => 'Alien Worlds Interview With Co-Founder Saro Mckenna',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'categories_id_array' => array($cat_interviews_id,),
));

$post_td_post_inside_axie_infinity_with_jihoz_growth_lead_id = td_demo_content::add_post(array(
    'title' => 'Inside Axie Infinity With Jihoz – Growth Lead',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'categories_id_array' => array($cat_interviews_id,),
));

$post_td_post_dreamverse_nft_festival_interview_with_twobadour_id = td_demo_content::add_post(array(
    'title' => 'Dreamverse NFT Festival: Interview With Twobadour',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'categories_id_array' => array($cat_interviews_id,),
));

$post_td_post_genesis_worlds_interview_with_ceo_jason_cassidy_id = td_demo_content::add_post(array(
    'title' => 'Genesis Worlds Interview With CEO Jason Cassidy',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'categories_id_array' => array($cat_interviews_id,),
));

$post_td_post_non_fungible_a_play_to_earn_substances_selling_game_id = td_demo_content::add_post(array(
    'title' => 'Non-Fungible: A Play-To-Earn Substances Selling Game',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_reviews_id,),
));

$post_td_post_what_is_binamon_ready_for_launch_on_august_28_id = td_demo_content::add_post(array(
    'title' => 'What is Binamon? Ready For Launch On August 28',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_reviews_id,),
));

$post_td_post_binapet_review_breeding_bsc_play_to_earn_game_id = td_demo_content::add_post(array(
    'title' => 'Binapet Review: Breeding BSC Play-to-Earn Game',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_reviews_id,),
));

$post_td_post_the_galaxy_of_lemuria_review_play_to_earn_mmorpg_id = td_demo_content::add_post(array(
    'title' => 'The Galaxy of Lemuria Review – Play To Earn MMORPG',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_reviews_id,),
));

$post_td_post_zendodo_party_review_where_nfts_meets_defi_on_wax_id = td_demo_content::add_post(array(
    'title' => 'Zendodo Party Review: Where NFTs Meets DeFi on WAX',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_reviews_id,),
));

$post_td_post_genesis_worlds_metaverse_review_a_100_years_project_id = td_demo_content::add_post(array(
    'title' => 'Genesis Worlds Metaverse Review – A 100 Years Project',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_reviews_id,),
));

$post_td_post_all_about_play_to_earn_with_crypto_games_p2e_id = td_demo_content::add_post(array(
    'title' => 'All About Play to Earn With Crypto Games (P2E)',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'categories_id_array' => array($cat_editorial_id,$cat_news_id,),
));

$post_td_post_blockchain_gaming_industry_5_crypto_games_to_watch_id = td_demo_content::add_post(array(
    'title' => 'Blockchain Gaming Industry & 5 Crypto Games to Watch',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'categories_id_array' => array($cat_editorial_id,$cat_news_id,),
));

$post_td_post_ethereum_still_leads_the_way_in_blockchain_gaming_id = td_demo_content::add_post(array(
    'title' => 'Ethereum Still Leads The Way in Blockchain Gaming',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'categories_id_array' => array($cat_editorial_id,$cat_news_id,),
));

$post_td_post_coronavirus_calling_gamers_to_help_combat_it_id = td_demo_content::add_post(array(
    'title' => 'CoronaVirus: Calling Gamers to Help Combat It',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'categories_id_array' => array($cat_editorial_id,$cat_news_id,),
));

$post_td_post_smart_gamers_talk_about_nfts_and_play_to_earn_id = td_demo_content::add_post(array(
    'title' => 'Smart Gamers Talk About NFTs and Play to Earn',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'categories_id_array' => array($cat_editorial_id,$cat_news_id,),
));

$post_td_post_the_battle_of_the_metaverse_is_just_getting_started_id = td_demo_content::add_post(array(
    'title' => 'The Battle of The Metaverse is Just Getting Started',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'categories_id_array' => array($cat_editorial_id,$cat_news_id,),
));

$post_td_post_og_nft_collection_revived_looksrare_nft_marketplace_booming_id = td_demo_content::add_post(array(
    'title' => 'OG NFT Collection Revived, LooksRare NFT Marketplace',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_news_id,$cat_weekly_digest_id,),
));

$post_td_post_ubisoft_to_develop_blockchain_games_enjins_100_million_fund_id = td_demo_content::add_post(array(
    'title' => 'Ubisoft To Develop Blockchain Games, Enjin’s $100 Million Fund',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'categories_id_array' => array($cat_news_id,$cat_weekly_digest_id,),
));

$post_td_post_the_metaverse_creation_ronin_wallet_is_live_more_news_id = td_demo_content::add_post(array(
    'title' => 'The Metaverse Creation, Ronin Wallet is Live & More News',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'categories_id_array' => array($cat_news_id,$cat_weekly_digest_id,),
));

$post_td_post_vulcan_scholarships_town_star_nodes_the_sandbox_alpha_event_id = td_demo_content::add_post(array(
    'title' => 'Vulcan Scholarships, Town Star Nodes, The Sandbox Alpha Event',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'categories_id_array' => array($cat_news_id,$cat_weekly_digest_id,),
));

$post_td_post_thetan_3m_players_1m_vulcan_investment_blankos_on_macos_id = td_demo_content::add_post(array(
    'title' => 'Thetan 3M Players, $1M Vulcan Investment, Blankos on MacOS',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'categories_id_array' => array($cat_news_id,$cat_weekly_digest_id,),
));

$post_td_post_efinity_to_secure_parachain_ubisoft_launches_nft_platform_id = td_demo_content::add_post(array(
    'title' => 'Efinity To Secure Parachain, Ubisoft Launches NFT Platform',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_news_id,$cat_weekly_digest_id,),
));

$post_td_post_immortals_and_fetch_ai_form_landmark_crypto_partnership_id = td_demo_content::add_post(array(
    'title' => 'Immortals and Fetch.ai Form Landmark Crypto Partnership',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'categories_id_array' => array($cat_news_id,),
));

$post_td_post_graphics_lifting_for_cropbytes_crypto_farming_game_id = td_demo_content::add_post(array(
    'title' => 'Graphics Lifting For CropBytes Crypto Farming Game',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'categories_id_array' => array($cat_news_id,),
));

$post_td_post_hong_kong_could_be_the_centre_of_the_next_nft_boom_id = td_demo_content::add_post(array(
    'title' => 'Hong Kong could be the centre of the next NFT boom',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'categories_id_array' => array($cat_news_id,),
));

$post_td_post_konami_nfts_castlevania_themed_collection_by_developer_id = td_demo_content::add_post(array(
    'title' => 'Konami NFTs: Castlevania-themed Collection',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_news_id,),
));

$post_td_post_breederdao_gaming_10_million_in_a_funding_round_id = td_demo_content::add_post(array(
    'title' => 'BreederDAO Gaming 10$ Million In A Funding Round',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_news_id,),
));

$post_td_post_gaimin_to_introduce_nfts_and_play_to_earn_to_minecraft_id = td_demo_content::add_post(array(
    'title' => 'GAIMIN To Introduce NFTs And Play-to-Earn to Minecraft',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'categories_id_array' => array($cat_news_id,),
));

$post_blast_premier_2022_betting_tips_and_schedule_id = td_demo_content::add_post(array(
    'title' => 'BLAST Premier 2022 – Betting Tips and Schedule',
    'file' => 'post_default.txt',
    'tds_locker' => '5',
    'featured_image_td_id' => 'td_pic_3',
    'categories_id_array' => array($cat_editorial_id,$cat_giveaways_id,$cat_guides_id,$cat_interviews_id,$cat_news_id,$cat_reviews_id,$cat_weekly_digest_id,),
));

$post_can_the_overwatch_league_getting_outsourced_be_a_good_thing_id = td_demo_content::add_post(array(
    'title' => 'Is Overwatch League Getting Outsourced A Good Thing?',
    'file' => 'post_default.txt',
    'tds_locker' => '5',
    'featured_image_td_id' => 'td_pic_4',
    'categories_id_array' => array($cat_editorial_id,$cat_giveaways_id,$cat_guides_id,$cat_interviews_id,$cat_news_id,$cat_reviews_id,$cat_weekly_digest_id,),
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

$menu_item_4_id = td_demo_menus::add_category(array(
    'title' => 'Guides',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_guides_id,
    'parent_id' => ''
));

$menu_item_5_id = td_demo_menus::add_category(array(
    'title' => 'Giveaways',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_giveaways_id,
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
    'title' => 'Header Template',
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

td_demo_misc::add_social_buttons(array('facebook' => '#','instagram' => '#','twitter' => '#','youtube' => '#',));

$generated_css = td_css_generator();
if ( function_exists('tdsp_css_generator') ) {
    $generated_css .= tdsp_css_generator();
}
td_util::update_option( 'tds_user_compile_css', $generated_css );
