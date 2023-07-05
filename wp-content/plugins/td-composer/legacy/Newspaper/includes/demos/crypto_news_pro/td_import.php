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



$plan_yearly_plan___crypto_news_pro_id = td_demo_subscription::add_plan( array(
        'name' => 'Yearly Plan - Crypto News PRO',
        'price' => '100',
        'months_in_cycle' => '12',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"6661e7af2868bf5";}',
    )
);

$plan_monthly_plan___crypto_news_pro_id = td_demo_subscription::add_plan( array(
        'name' => 'Monthly Plan - Crypto News PRO',
        'price' => '10',
        'months_in_cycle' => '1',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"1561e7af2868c9e";}',
    )
);

$plan_free_plan___crypto_news_pro_id = td_demo_subscription::add_plan( array(
        'name' => 'Free Plan - Crypto News PRO',
        'price' => '',
        'months_in_cycle' => '',
        'trial_days' => '0',
        'is_free' => '1',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"4161e7af2868cda";}',
    )
);



$page_payment_page_id_id = td_demo_content::add_page(array(
    'title' => 'Checkout - crypto_news_pro',
    'file' => 'checkout_crypto_news_pro.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'payment_page_id',
        'value' => $page_payment_page_id_id,
    )
);


$page_my_account_page_id_id = td_demo_content::add_page(array(
    'title' => 'My Account - crypto_news_pro',
    'file' => 'my_account_crypto_news_pro.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'my_account_page_id',
        'value' => $page_my_account_page_id_id,
    )
);


$page_create_account_page_id_id = td_demo_content::add_page(array(
    'title' => 'Login/Register - crypto_news_pro',
    'file' => 'login_register_crypto_news_pro.txt',
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
	MENUS
*/
$menu_td_demo_header_menu_id = td_demo_menus::create_menu('td-demo-header-menu', '');
$menu_td_demo_footer_menu_id = td_demo_menus::create_menu('td-demo-footer-menu', '');
$menu_td_demo_footer_menu_extra_id = td_demo_menus::create_menu('td-demo-footer-menu-extra', '');



/*  ----------------------------------------------------------------------------
	CLOUD TEMPLATES
*/
$template_header_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Header Template',
    'file' => 'header_cloud_template.txt',
    'template_type' => 'header',
));
td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_id);
update_post_meta( $template_header_template_id, 'header_mobile_menu_id', $menu_td_demo_header_menu_id);


$template_footer_template_global_id = td_demo_content::add_cloud_template(array(
    'title' => 'Footer Template – Global',
    'file' => 'footer_global_cloud_template.txt',
    'template_type' => 'footer',
));
td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_global_id);


$template_footer_template_home_id = td_demo_content::add_cloud_template(array(
    'title' => 'Footer Template - Home',
    'file' => 'footer_home_cloud_template.txt',
    'template_type' => 'footer',
));


$template_category_template_global_id = td_demo_content::add_cloud_template(array(
    'title' => 'Category Template - Global',
    'file' => 'cat_global_cloud_template.txt',
    'template_type' => 'category',
));
td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_global_id);


$template_category_template_guides_id = td_demo_content::add_cloud_template(array(
    'title' => 'Category Template - Guides',
    'file' => 'cat_guides_cloud_template.txt',
    'template_type' => 'category',
));


$template_single_template_global_id = td_demo_content::add_cloud_template(array(
    'title' => 'Single Template - Global',
    'file' => 'post_global_cloud_template.txt',
    'template_type' => 'single',
));
td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_global_id);


$template_single_template_guides_id = td_demo_content::add_cloud_template(array(
    'title' => 'Single Template - Guides',
    'file' => 'post_guides_cloud_template.txt',
    'template_type' => 'single',
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


$template_404_template_id = td_demo_content::add_cloud_template(array(
    'title' => '404 Template',
    'file' => '404_cloud_template.txt',
    'template_type' => '404',
));
td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_id);


/*  ----------------------------------------------------------------------------
	CATEGORIES
*/
$cat_blockchain_id = td_demo_category::add_category(array(
    'category_name' => 'Blockchain',
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

$cat_deals_id = td_demo_category::add_category(array(
    'category_name' => 'Deals',
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
    'category_cloud_template' => $template_category_template_guides_id,
    'post_cloud_template' => $template_single_template_guides_id,
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => '',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_nfts_id = td_demo_category::add_category(array(
    'category_name' => 'NFTs',
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

$cat_opinions_id = td_demo_category::add_category(array(
    'category_name' => 'Opinions',
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

$cat_videos_id = td_demo_category::add_category(array(
    'category_name' => 'Videos',
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
	PAGES
*/
$page_home_id = td_demo_content::add_page(array(
    'title' => 'Home',
    'file' => 'home.txt',
    'homepage' => true,
    'footer_template_id' => $template_footer_template_home_id
));

$page_switching_plans_crypto_news_pro_id = td_demo_content::add_page(array(
    'title' => 'Switching plans - Crypto News PRO',
    'file' => 'switching_plans_crypto_news_pro.txt',
    'demo_unique_id' => '7161e7af2889d43',
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
        'title' => 'Subscription Locker - Crypto News PRO',
        'file' => '',
        'categories_id_array' => [],
        'tds_locker_settings' => array(
            'tds_title' => 'Content available exclusively for subscribers',
            'tds_message' => 'Please subscribe to unlock this content.',
            'tds_submit_btn_text' => 'Subscribe',
            'tds_pp_msg' => 'I consent to processing of my data according to <a href=\"#\">Terms of Use</a> & <a href=\"#\">Privacy Policy</a>',
            'tds_locker_cf_1_name' => 'Custom field 1',
            'tds_locker_cf_2_name' => 'Custom field 2',
            'tds_locker_cf_3_name' => 'Custom field 3',
        ),
        'tds_payable' => 'paid_subscription',
        'tds_paid_subs_page_id' => $page_switching_plans_crypto_news_pro_id,
        'tds_paid_subs_plan_ids' => [$plan_yearly_plan___crypto_news_pro_id,$plan_monthly_plan___crypto_news_pro_id,$plan_free_plan___crypto_news_pro_id],
        'tds_locker_styles' => array(
            'tds_bg_color' => '#333237',
            'tds_title_color' => '#ffffff',
            'tds_message_color' => '#bbbbbb',
            'tds_submit_btn_bg_color' => '#10bf6b',
            'tds_submit_btn_bg_color_h' => '#000000',
            'tds_pp_checked_color' => '#000000',
            'tds_pp_check_bg' => '#ffffff',
            'tds_pp_check_border_color' => '#ffffff',
            'tds_pp_msg_color' => '#a0a0a0',
            'tds_pp_msg_links_color' => '#10bf6b',
            'tds_pp_msg_links_color_h' => '#ffffff',
            'tds_general_font_family' => '420',
            'tds_title_font_size' => '28',
            'tds_title_font_line_height' => '1.3',
            'tds_title_font_weight' => '700',
            'tds_message_font_size' => '13',
            'tds_message_font_line_height' => '1.5',
            'tds_submit_btn_text_font_size' => '13',
        ),
    )
);

td_util::update_option('tds_demo_options', 'a:1:{s:5:"plans";a:3:{i:0;a:2:{s:9:"unique_id";s:15:"6661e7af2868bf5";s:4:"name";s:29:"Yearly Plan - Crypto News PRO";}i:1;a:2:{s:9:"unique_id";s:15:"1561e7af2868c9e";s:4:"name";s:30:"Monthly Plan - Crypto News PRO";}i:2;a:2:{s:9:"unique_id";s:15:"4161e7af2868cda";s:4:"name";s:27:"Free Plan - Crypto News PRO";}}}');


/*  ----------------------------------------------------------------------------
	SUBSCRIPTION - end phase 2
*/


/*  ----------------------------------------------------------------------------
	ATTACHMENTS
*/

/*  ----------------------------------------------------------------------------
	POSTS
*/
td_global::set_demo_installing(true);

$post_td_post_royal_flush_of_the_month_coinbase_goes_public_id = td_demo_content::add_post(array(
    'title' => 'Royal Flush of the Month: Coinbase Goes Public',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'categories_id_array' => array($cat_deals_id,),
));

$post_td_post_how_to_trade_stocks_with_crypto_primexbt_id = td_demo_content::add_post(array(
    'title' => 'How to Trade Stocks with Crypto - PrimeXBT',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_deals_id,),
));

$post_td_post_vpns_and_geo_blocking_in_the_cryptocurrency_world_id = td_demo_content::add_post(array(
    'title' => 'VPNs And Geo-blocking in The Cryptocurrency World',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'categories_id_array' => array($cat_deals_id,),
));

$post_td_post_passive_income_with_8_interest_its_possible_id = td_demo_content::add_post(array(
    'title' => 'Passive Income with 8% Interest? It’s Possible!',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'categories_id_array' => array($cat_deals_id,),
));

$post_td_post_everyone_can_earn_passive_income_with_yield_id = td_demo_content::add_post(array(
    'title' => 'Everyone Can Earn Passive Income with Yield',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'categories_id_array' => array($cat_deals_id,),
));

$post_td_post_trading_indicators_what_you_need_to_know_id = td_demo_content::add_post(array(
    'title' => 'Trading Indicators: What You Need to Know',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_deals_id,),
));

$post_td_post_gamestop_and_dogecoin_show_how_memes_can_move_markets_id = td_demo_content::add_post(array(
    'title' => 'GameStop and Dogecoin Show How Memes Can Move Markets',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'categories_id_array' => array($cat_opinions_id,),
));

$post_td_post_why_would_anyone_buy_nft_a_link_to_a_jpeg_file_id = td_demo_content::add_post(array(
    'title' => 'Why Would Anyone Buy NFT – A Link To A JPEG File?',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'categories_id_array' => array($cat_opinions_id,),
));

$post_td_post_a_look_at_the_environmental_impact_of_bitcoin_mining_id = td_demo_content::add_post(array(
    'title' => 'A Look at the Environmental Impact of Bitcoin Mining',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'categories_id_array' => array($cat_opinions_id,),
));

$post_td_post_what_prevents_crypto_payments_from_going_the_mainstream_id = td_demo_content::add_post(array(
    'title' => 'What Prevents Crypto Payments from Going the Mainstream?',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'categories_id_array' => array($cat_opinions_id,),
));

$post_td_post_how_bitcoin_and_defi_are_completely_different_phenomena_id = td_demo_content::add_post(array(
    'title' => 'How Bitcoin and DeFi are Completely Different Phenomena',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'categories_id_array' => array($cat_opinions_id,),
));

$post_td_post_how_dark_webs_of_cybercriminals_collaborate_on_attaks_id = td_demo_content::add_post(array(
    'title' => 'How Dark Webs of Cybercriminals Collaborate on Attaks',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'categories_id_array' => array($cat_opinions_id,),
));

$post_td_post_uk_crypto_tax_guide_michael_jordan_nfts_more_news_id = td_demo_content::add_post(array(
    'title' => 'UK Crypto Tax Guide, Michael Jordan & NFTs + More News',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'categories_id_array' => array($cat_nfts_id,),
));

$post_td_post_wwf_plans_new_project_to_use_nfts_to_save_animals_id = td_demo_content::add_post(array(
    'title' => 'WWF Plans New Project To Use NFTs to Save Animals',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'categories_id_array' => array($cat_nfts_id,),
));

$post_td_post_another_world_famous_meme_capitalizes_on_the_nft_hype_id = td_demo_content::add_post(array(
    'title' => 'Another World-Famous Meme Capitalizes on the NFT Hype',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'categories_id_array' => array($cat_nfts_id,),
));

$post_td_post_ufc_takes_the_fight_to_nfts_plans_its_own_cryptoasset_id = td_demo_content::add_post(array(
    'title' => 'UFC Takes the Fight to NFTs, Plans Its Own Cryptoasset',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'categories_id_array' => array($cat_nfts_id,),
));

$post_td_post_techcrunch_founder_to_sell_his_kyiv_flat_as_an_nft_id = td_demo_content::add_post(array(
    'title' => 'TechCrunch Founder to Sell His Kyiv Flat – as an NFT',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_nfts_id,),
));

$post_td_post_decentraland_sees_a_record_usd_913000_virtual_land_sale_id = td_demo_content::add_post(array(
    'title' => 'Decentraland Sees a Record USD 913,000 Virtual Land Sale',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'categories_id_array' => array($cat_nfts_id,),
));

$post_td_post_crypto_comedians_question_queens_bitcoin_interest_id = td_demo_content::add_post(array(
    'title' => 'Crypto Comedians Question Queen’s Bitcoin Interest',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'categories_id_array' => array($cat_blockchain_id,),
));

$post_td_post_lawyer_warns_russian_blockchain_exodus_has_already_begun_id = td_demo_content::add_post(array(
    'title' => 'Lawyer Warns Russian Blockchain Exodus Has Already Begun',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_blockchain_id,),
));

$post_td_post_new_platform_gives_whiskey_fans_a_boozy_blockchain_boost_id = td_demo_content::add_post(array(
    'title' => 'New Platform Gives Whiskey Fans a Boozy Blockchain Boost',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'categories_id_array' => array($cat_blockchain_id,),
));

$post_td_post_south_korean_local_stablecoins_set_for_another_boost_id = td_demo_content::add_post(array(
    'title' => 'South Korean Local Stablecoins Set for Another Boost',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'categories_id_array' => array($cat_blockchain_id,),
));

$post_td_post_ethereum_alternative_solana_gets_usd_40m_boost_id = td_demo_content::add_post(array(
    'title' => 'Ethereum Alternative Solana Gets USD 40M Boost',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'categories_id_array' => array($cat_blockchain_id,),
));

$post_td_post_chinas_blockchain_investment_growth_is_slowing_down_id = td_demo_content::add_post(array(
    'title' => 'China’s Blockchain Investment Growth Is Slowing Down',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'categories_id_array' => array($cat_blockchain_id,),
));

$post_jack_dorsey_banking_the_unbanked_id = td_demo_content::add_post(array(
    'title' => 'Jack Dorsey: Banking The Unbanked',
    'file' => 'post_default.txt',
    'featured_image_td_id' => '',
    'featured_video_url' => 'https://www.youtube.com/watch?v=rSSnyJpFNZU',
    'post_format' => 'video',
    'categories_id_array' => array($cat_videos_id,),
));

$post_sec_wants_to_provide_clarity_around_cryptocurrency_id = td_demo_content::add_post(array(
    'title' => 'SEC Wants to Provide Clarity Around Cryptocurrency',
    'file' => 'post_default.txt',
    'featured_image_td_id' => '',
    'featured_video_url' => 'https://www.youtube.com/watch?v=NA-7hpF3s7Y',
    'post_format' => 'video',
    'categories_id_array' => array($cat_videos_id,),
));

$post_bitcoin_drops_after_chinas_crypto_crackdown_id = td_demo_content::add_post(array(
    'title' => 'Bitcoin Drops After China\'s Crypto Crackdown',
    'file' => 'post_default.txt',
    'featured_image_td_id' => '',
    'featured_video_url' => 'https://www.youtube.com/watch?v=dycuUGWaXsM',
    'post_format' => 'video',
    'categories_id_array' => array($cat_videos_id,),
));

$post_the_first_digital_real_estate_nft_fund_id = td_demo_content::add_post(array(
    'title' => 'The First Digital Real Estate NFT Fund',
    'file' => 'post_default.txt',
    'featured_image_td_id' => '',
    'featured_video_url' => 'https://www.youtube.com/watch?v=oz30_Puyglc',
    'post_format' => 'video',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'categories_id_array' => array($cat_videos_id,),
));

$post_how_is_the_price_of_bitcoins_set_2_id = td_demo_content::add_post(array(
    'title' => 'How Is The Price of Bitcoins Truly Set?',
    'file' => 'post_default.txt',
    'categories_id_array' => array($cat_guides_id,),
    'featured_image_td_id' => 'td_pic_1',
));

$post_22_ways_to_earn_crypto_on_binance_id = td_demo_content::add_post(array(
    'title' => '22 Ways to Earn Crypto on Binance',
    'file' => 'post_default.txt',
    'categories_id_array' => array($cat_guides_id,),
    'featured_image_td_id' => 'td_pic_2',
));

$post_how_do_altcoints_differ_from_bitcoin_id = td_demo_content::add_post(array(
    'title' => 'How Do Altcoints Differ From Bitcoin?',
    'file' => 'post_default.txt',
    'categories_id_array' => array($cat_guides_id,),
    'featured_image_td_id' => 'td_pic_3',
));

$post_what_are_the_risks_of_an_ico_in_2021_id = td_demo_content::add_post(array(
    'title' => 'What Are The Risks Of An ICO in 2021?',
    'file' => 'post_default.txt',
    'categories_id_array' => array($cat_guides_id,),
    'featured_image_td_id' => 'td_pic_4',
));

$post_how_do_cryptocurrencies_differ_id = td_demo_content::add_post(array(
    'title' => 'How Do Cryptocurrencies Differ From Eachother?',
    'file' => 'post_default.txt',
    'categories_id_array' => array($cat_guides_id,),
    'featured_image_td_id' => 'td_pic_5',
));

$post_the_most_popular_cryptocurrency_terms_id = td_demo_content::add_post(array(
    'title' => 'The Most Popular Cryptocurrency Terms',
    'file' => 'post_default.txt',
    'categories_id_array' => array($cat_guides_id,),
    'featured_image_td_id' => 'td_pic_6',
));

$post_who_accepts_ethereum_in_2021_id = td_demo_content::add_post(array(
    'title' => 'Which Stores Accept Ethereum in 2021?',
    'file' => 'post_default.txt',
    'categories_id_array' => array($cat_guides_id,),
    'featured_image_td_id' => 'td_pic_7',
));

$post_how_is_the_price_of_bitcoins_set_id = td_demo_content::add_post(array(
    'title' => 'How to Accept Bitcoin In Business?',
    'file' => 'post_default.txt',
    'categories_id_array' => array($cat_guides_id,),
    'featured_image_td_id' => 'td_pic_8',
));

$post_how_to_choose_a_cryptocurrency_exchange_id = td_demo_content::add_post(array(
    'title' => 'How to Choose a Cryptocurrency Exchange?',
    'file' => 'post_default.txt',
    'categories_id_array' => array($cat_guides_id,),
    'featured_image_td_id' => 'td_pic_9',
));

$post_can_i_create_my_own_cryptocurrency_id = td_demo_content::add_post(array(
    'title' => 'Can I Create My Own Cryptocurrency?',
    'file' => 'post_default.txt',
    'categories_id_array' => array($cat_guides_id,),
    'featured_image_td_id' => 'td_pic_10',
));

$post_3_ways_to_set_up_a_bitcoin_wallet_id = td_demo_content::add_post(array(
    'title' => '3 Safe Ways To Set Up a Bitcoin Wallet',
    'file' => 'post_default.txt',
    'categories_id_array' => array($cat_guides_id,),
    'featured_image_td_id' => 'td_pic_1',
));

$post_countries_where_ethereum_is_legal_id = td_demo_content::add_post(array(
    'title' => 'Countries Where Ethereum Is Legal',
    'file' => 'post_default.txt',
    'categories_id_array' => array($cat_guides_id,),
    'featured_image_td_id' => 'td_pic_2',
));

$post_blockchain_investing_with_nisa_amoils_of_a100x_id = td_demo_content::add_post(array(
    'title' => 'Blockchain Investing with Nisa Amoils of A100x',
    'file' => 'post_default.txt',
    'categories_id_array' => array($cat_videos_id,),
    'featured_image_td_id' => '',
    'featured_video_url' => 'https://www.youtube.com/watch?v=zGvA_jnmzDo',
    'post_format' => 'video',
));

$post_the_most_ambitious_trend_in_crypto_id = td_demo_content::add_post(array(
    'title' => 'The Most Ambitious Trend in Crypto',
    'file' => 'post_default.txt',
    'categories_id_array' => array($cat_videos_id,),
    'featured_image_td_id' => '',
    'tds_lock_content' => '1',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'featured_video_url' => 'https://www.youtube.com/watch?v=tGwyeGuZ0_k',
    'post_format' => 'video',
));

td_global::set_demo_installing(false);


/*  ----------------------------------------------------------------------------
	PRODUCTS
*/


/*  ----------------------------------------------------------------------------
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_page(array(
    'title' => 'Home',
    'add_to_menu_id' => $menu_td_demo_footer_menu_id,
    'page_id' => $page_home_id,
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_link(array(
    'title' => 'About Us',
    'add_to_menu_id' => $menu_td_demo_footer_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_link(array(
    'title' => 'Contact Us',
    'add_to_menu_id' => $menu_td_demo_footer_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_link(array(
    'title' => 'Terms & Conditions',
    'add_to_menu_id' => $menu_td_demo_footer_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_4_id = td_demo_menus::add_link(array(
    'title' => 'Privacy Policy',
    'add_to_menu_id' => $menu_td_demo_footer_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_5_id = td_demo_menus::add_link(array(
    'title' => 'Disclaimer',
    'add_to_menu_id' => $menu_td_demo_footer_menu_id,
    'url' => '#',
    'parent_id' => ''
));


/*  ----------------------------------------------------------------------------
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_category(array(
    'title' => 'Blockchain',
    'add_to_menu_id' => $menu_td_demo_footer_menu_extra_id,
    'category_id' => $cat_blockchain_id,
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_category(array(
    'title' => 'NFTs',
    'add_to_menu_id' => $menu_td_demo_footer_menu_extra_id,
    'category_id' => $cat_nfts_id,
    'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_category(array(
    'title' => 'Opinions',
    'add_to_menu_id' => $menu_td_demo_footer_menu_extra_id,
    'category_id' => $cat_opinions_id,
    'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_category(array(
    'title' => 'Videos',
    'add_to_menu_id' => $menu_td_demo_footer_menu_extra_id,
    'category_id' => $cat_videos_id,
    'parent_id' => ''
));

$menu_item_4_id = td_demo_menus::add_category(array(
    'title' => 'Guides',
    'add_to_menu_id' => $menu_td_demo_footer_menu_extra_id,
    'category_id' => $cat_guides_id,
    'parent_id' => ''
));

$menu_item_5_id = td_demo_menus::add_category(array(
    'title' => 'Deals',
    'add_to_menu_id' => $menu_td_demo_footer_menu_extra_id,
    'category_id' => $cat_deals_id,
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
    'title' => 'Blockchain',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_blockchain_id,
    'parent_id' => ''
), true);

$menu_item_2_id = td_demo_menus::add_mega_menu(array(
    'title' => 'NFTs',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_nfts_id,
    'parent_id' => ''
), true);

$menu_item_3_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Opinions',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_opinions_id,
    'parent_id' => ''
), true);

$menu_item_4_id = td_demo_menus::add_category(array(
    'title' => 'Videos',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_videos_id,
    'parent_id' => ''
));

$menu_item_5_id = td_demo_menus::add_category(array(
    'title' => 'Guides',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_guides_id,
    'parent_id' => ''
));

$menu_item_6_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Deals',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_deals_id,
    'parent_id' => ''
), true);



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

td_demo_misc::add_social_buttons(array('facebook' => '#','instagram' => '#','twitter' => '#',));

$generated_css = td_css_generator();
if ( function_exists('tdsp_css_generator') ) {
    $generated_css .= tdsp_css_generator();
}
td_util::update_option( 'tds_user_compile_css', $generated_css );
