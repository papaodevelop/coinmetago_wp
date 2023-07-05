<?php

/*  ----------------------------------------------------------------------------
	MENUS
*/
$menu_td_demo_header_menu_id = td_demo_menus::create_menu('td-demo-header-menu', '');
$menu_td_demo_custom_menu_id = td_demo_menus::create_menu('td-demo-custom-menu', '');
$menu_td_demo_footer_menu_id = td_demo_menus::create_menu('td-demo-footer-menu', '');


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
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"7161fa482993aea";}',
	)
);

$plan_free_plan_id = td_demo_subscription::add_plan( array(
	'name' => 'Free Plan',
	'price' => '',
	'months_in_cycle' => '',
	'trial_days' => '0',
	'is_free' => '1',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"2861fa482995667";}',
	)
);

$plan_monthly_plan_id = td_demo_subscription::add_plan( array(
	'name' => 'Monthly Plan',
	'price' => '10',
	'months_in_cycle' => '1',
	'trial_days' => '0',
	'is_free' => '0',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"9661fa4829974b3";}',
	)
);

$page_payment_page_id_id = td_demo_content::add_page(array(
	'title' => 'Checkout - nft_pro',
	'file' => 'tds_checkout.txt',
));

td_demo_subscription::add_option( array(
	'name' => 'payment_page_id',
	'value' => $page_payment_page_id_id,
	)
);

$page_my_account_page_id_id = td_demo_content::add_page(array(
	'title' => 'My Account - nft_pro',
	'file' => 'tds_my_account.txt',
));

td_demo_subscription::add_option( array(
	'name' => 'my_account_page_id',
	'value' => $page_my_account_page_id_id,
	)
);

$page_create_account_page_id_id = td_demo_content::add_page(array(
	'title' => 'Login/Register - nft_pro',
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
$cat_adoption_id = td_demo_category::add_category(array(
	'category_name' => 'Adoption',
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

$cat_collectibles_id = td_demo_category::add_category(array(
	'category_name' => 'Collectibles',
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

$cat_drops_id = td_demo_category::add_category(array(
	'category_name' => 'Drops',
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

$cat_features_id = td_demo_category::add_category(array(
	'category_name' => 'Features',
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

$cat_gaming_id = td_demo_category::add_category(array(
	'category_name' => 'Gaming',
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

$cat_investment_id = td_demo_category::add_category(array(
	'category_name' => 'Investment',
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

$cat_market_id = td_demo_category::add_category(array(
	'category_name' => 'Market',
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

$cat_nft_id = td_demo_category::add_category(array(
	'category_name' => 'NFT',
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
$page_tds_switching_plans_wizard_id = td_demo_content::add_page(array(
	'title' => 'Tds switching plans wizard',
	'file' => 'tds_switching_plans_wizard.txt',
	'demo_unique_id' => '3761fa4829e0cd1',
));

$page_home_id = td_demo_content::add_page(array(
	'title' => 'Home',
	'file' => 'home.txt',
	'homepage' => true,
	'demo_unique_id' => '9661fa4829e38e8',
));

$page_menu_popup_id = td_demo_content::add_page(array(
	'title' => 'Menu Popup',
	'file' => 'menu_popup.txt',
	'demo_unique_id' => '6361fa4829e6028',
));

$page_tds_checkout_id = td_demo_content::add_page(array(
	'title' => 'Checkout',
	'file' => 'tds_checkout.txt',
	'demo_unique_id' => '5761fa4829e89b8',
));

$page_tds_my_account_id = td_demo_content::add_page(array(
	'title' => 'My account',
	'file' => 'tds_my_account.txt',
	'demo_unique_id' => '9461fa4829eb00f',
));

$page_tds_login_register_id = td_demo_content::add_page(array(
	'title' => 'Login/Register',
	'file' => 'tds_login_register.txt',
	'demo_unique_id' => '5961fa4829eda17',
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
				'tds_title' => 'This Content Is for Subscribers Only!',
				'tds_message' => 'Please subscribe to unlock this content.',
				'tds_submit_btn_text' => 'Subscribe Now',
				'tds_pp_msg' => 'I consent to processing of my data according to <a href=\"#\">Terms of Use</a> & <a href=\"#\">Privacy Policy</a>',
				'tds_locker_cf_1_name' => 'Custom field 1',
				'tds_locker_cf_2_name' => 'Custom field 2',
				'tds_locker_cf_3_name' => 'Custom field 3',
			),
	'tds_payable' => 'paid_subscription',
	'tds_paid_subs_page_id' => $page_tds_switching_plans_wizard_id,
	'tds_paid_subs_plan_ids' => [$plan_yearly_plan_id,$plan_free_plan_id,$plan_monthly_plan_id],
			'tds_locker_styles' => array(
				'tds_bg_color' => '#000000',
				'tds_title_color' => '#ffffff',
				'tds_message_color' => '#dddddd',
				'tds_submit_btn_text_color' => '#000000',
				'tds_submit_btn_text_color_h' => '#aaaaaa',
				'tds_submit_btn_bg_color' => '#ffffff',
				'tds_submit_btn_bg_color_h' => '#ffffff',
				'tds_after_btn_text_color' => '#aaaaaa',
				'tds_pp_checked_color' => '#000000',
				'tds_pp_check_bg' => '#ffffff',
				'tds_pp_check_bg_f' => '#ffffff',
				'tds_pp_check_border_color' => '#ffffff',
				'tds_pp_check_border_color_f' => '#ffffff',
				'tds_pp_msg_color' => '#aaaaaa',
				'tds_pp_msg_links_color' => '#ffffff',
				'tds_pp_msg_links_color_h' => '#ffffff',
				'tds_title_font_family' => '129',
				'tds_title_font_size' => '36',
				'tds_title_font_line_height' => '1',
				'tds_title_font_weight' => '900',
				'tds_title_font_transform' => 'uppercase',
				'tds_message_font_family' => '507',
				'tds_message_font_size' => '14',
				'tds_message_font_weight' => '600',
				'tds_submit_btn_text_font_family' => '507',
				'tds_submit_btn_text_font_weight' => '600',
				'tds_submit_btn_text_font_transform' => 'uppercase',
				'tds_after_btn_text_font_family' => '507',
				'tds_after_btn_text_font_size' => '14',
				'tds_after_btn_text_font_weight' => '700',
				'tds_pp_msg_font_family' => '507',
				'tds_pp_msg_font_size' => '14',
				'tds_pp_msg_font_weight' => '600',
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

td_util::update_option('tds_demo_options', 'a:1:{s:5:"plans";a:3:{i:0;a:2:{s:9:"unique_id";s:15:"7161fa482993aea";s:4:"name";s:11:"Yearly Plan";}i:1;a:2:{s:9:"unique_id";s:15:"2861fa482995667";s:4:"name";s:9:"Free Plan";}i:2;a:2:{s:9:"unique_id";s:15:"9661fa4829974b3";s:4:"name";s:12:"Monthly Plan";}}}');


/*  ---------------------------------------------------------------------------- 
	SUBSCRIPTION - end phase 2
*/

/*  ---------------------------------------------------------------------------- 
	POSTS
*/

$post_td_post_microsoft_buys_activision_blizzard_company_for_68_7_billion_id = td_demo_content::add_post(array(
    'title' => 'Microsoft Buys Activision Blizzard Company for $68.7 Billion',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_adoption_id,$cat_art_id,$cat_collectibles_id,$cat_drops_id,$cat_features_id,$cat_gaming_id,$cat_guides_id,$cat_investment_id,$cat_market_id,),
));

$post_td_post_superplastic_announces_nft_drop_with_gucci_dior_hilton_more_id = td_demo_content::add_post(array(
    'title' => 'Superplastic Announces NFT Drop With Gucci, Dior, Hilton & More',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_adoption_id,$cat_art_id,$cat_collectibles_id,$cat_drops_id,$cat_features_id,$cat_gaming_id,$cat_guides_id,$cat_investment_id,$cat_market_id,),
));

$post_td_post_browsing_opensea_the_jims_spanky_friends_linksdao_more_id = td_demo_content::add_post(array(
    'title' => 'Browsing OpenSea: The Jims, Spanky & Friends, LinksDAO & More',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_adoption_id,$cat_art_id,$cat_collectibles_id,$cat_drops_id,$cat_features_id,$cat_gaming_id,$cat_guides_id,$cat_investment_id,$cat_market_id,),
));

$post_td_post_coinbase_partners_with_mastercard_to_enable_card_payments_on_nft_id = td_demo_content::add_post(array(
    'title' => 'Coinbase Partners With Mastercard to Enable Card Payments on NFT',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'tds_locker' => '5',
    'categories_id_array' => array($cat_adoption_id,$cat_art_id,$cat_collectibles_id,$cat_drops_id,$cat_features_id,$cat_gaming_id,$cat_guides_id,$cat_investment_id,$cat_market_id,),
));

$post_td_post_australian_open_serves_up_the_world_first_reveal_of_nft_art_id = td_demo_content::add_post(array(
    'title' => 'Australian Open Serves up the World First Reveal of NFT Art',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'tds_locker' => $post_tds_default_wizard_locker_id,
    'tds_lock_content' => '1',
    'categories_id_array' => array($cat_adoption_id,$cat_art_id,$cat_collectibles_id,$cat_drops_id,$cat_features_id,$cat_gaming_id,$cat_guides_id,$cat_investment_id,$cat_market_id,),
));

$post_td_post_new_nft_tax_guide_offers_valuable_advice_and_sartoshi_art_too_id = td_demo_content::add_post(array(
	'title' => 'New NFT Tax Guide Offers Valuable Advice - and Sartoshi Art Too',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_investment_id,),
));

$post_td_post_sotheby_invests_in_20m_round_for_serotonins_nft_commerce_suite_mojito_id = td_demo_content::add_post(array(
	'title' => 'Sotheby Invests in $20M Round for Serotonin\'s NFT Commerce Suite Mojito',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_investment_id,),
));

$post_td_post_jason_bailey_launches_clubnft_announces_tool_to_prevent_nft_loss_id = td_demo_content::add_post(array(
	'title' => 'Jason Bailey Launches ClubNFT, Announces Tool to Prevent NFT Loss',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_investment_id,),
));

$post_td_post_do_you_have_paper_hands_find_out_with_this_nft_trading_calculator_id = td_demo_content::add_post(array(
	'title' => 'Do You Have Paper Hands? Find Out With This NFT Trading Calculator',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_investment_id,),
));

$post_td_post_digital_animals_project_plans_to_turn_sentimental_users_into_nft_souls_id = td_demo_content::add_post(array(
	'title' => 'Digital Animals Project Plans to Turn Users into NFT Avatars',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'tds_locker' => '5',
	'categories_id_array' => array($cat_investment_id,),
));

$post_td_post_party_degenerates_nft_project_reveals_launch_details_for_avatars_id = td_demo_content::add_post(array(
	'title' => 'Party Degenerates NFT Project Reveals Launch Details for Avatars',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_collectibles_id,),
));

$post_td_post_mekaverse_collection_surpasses_60m_sales_volume_in_under_24_hours_id = td_demo_content::add_post(array(
	'title' => 'MekaVerse Collection Surpasses $60M Sales Volume in Under 24 Hours',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_collectibles_id,),
));

$post_td_post_33nft_dissrup_reunite_for_curious_creatures_nft_collection_id = td_demo_content::add_post(array(
	'title' => '33NFT & Dissrup Reunite for Curious Creatures NFT Collection',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_collectibles_id,),
));

$post_td_post_gamestop_is_working_on_an_nft_marketplace_for_game_collectibles_id = td_demo_content::add_post(array(
	'title' => 'GameStop is Working on an NFT Marketplace for Game Collectibles',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_collectibles_id,),
));

$post_td_post_rtfkt_partners_with_takashi_murakami_for_hot_clone_x_avatar_project_id = td_demo_content::add_post(array(
	'title' => 'RTFKT Partners With Takashi Murakami for Hot CLONE X Avatar Project',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_art_id,),
));

$post_td_post_valuable_collections_swayils_mona_lana_legendary_palms_more_id = td_demo_content::add_post(array(
	'title' => 'Valuable Collections: Swayils, Mona Lana, Legendary Palms & More',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_collectibles_id,),
));

$post_td_post_10_cool_startups_platforms_that_will_change_your_perspective_on_nft_art_id = td_demo_content::add_post(array(
	'title' => '10 Cool Startups Platforms that Will Change Your Perspective on NFT Art',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_art_id,),
));

$post_td_post_beeples_nft_sculpture_sells_at_christies_auction_for_nearly_29_million_id = td_demo_content::add_post(array(
	'title' => 'Beeple\'s NFT Sculpture Sells at Christies Auction for Nearly $29 Million',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_art_id,),
));

$post_td_post_djimon_hounsou_teams_up_with_artist_laolu_for_time_to_heal_nfts_id = td_demo_content::add_post(array(
	'title' => 'Djimon Hounsou Teams Up With Artist Laolu for \'Time to Heal\' NFTs',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_art_id,),
));

$post_td_post_migos_takeoff_launches_space_ape_nft_project_in_q1_of_2022_id = td_demo_content::add_post(array(
	'title' => 'Migos Takeoff Launches Space-Ape NFT Project in Q1 of 2022',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_features_id,),
));

$post_td_post_time_partners_with_artist_and_photographer_for_an_unique_nft_project_id = td_demo_content::add_post(array(
	'title' => 'TIME Partners with Artist and Photographer for an Unique NFT Project',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_art_id,),
));

$post_td_post_nike_files_trademarks_and_seeks_staff_to_usher_it_into_the_metaverse_id = td_demo_content::add_post(array(
	'title' => 'Nike Files Trademarks and Seeks Staff to Usher It Into the Metaverse',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_features_id,),
));

$post_td_post_5_generative_art_and_music_projects_you_need_to_know_about_right_now_id = td_demo_content::add_post(array(
	'title' => '5 Generative Art and Music Projects You Need to Know About Right Now',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_features_id,),
));

$post_td_post_the_first_official_tweety_utility_nfts_are_launching_early_this_year_id = td_demo_content::add_post(array(
	'title' => 'The First Official Tweety Utility NFTs Are Launching Early this Year',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_features_id,),
));

$post_td_post_rockstar_was_working_on_nft_based_crypto_game_prior_to_his_death_id = td_demo_content::add_post(array(
	'title' => 'Rockstar Was Working on NFT Based Crypto Game Prior to His Death',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_gaming_id,),
));

$post_td_post_avenged_sevenfold_is_reinventing_the_fan_club_with_deathbats_club_nfts_id = td_demo_content::add_post(array(
	'title' => 'Avenged Sevenfold Is Reinventing the Fan Club With Deathbats Club NFTs',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_features_id,),
));

$post_td_post_gaming_future_holographic_computer_gives_tactile_feedback_in_mid_air_id = td_demo_content::add_post(array(
	'title' => 'Gaming Future: Holographic Computer Gives Tactile Feedback in Mid-Air',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_locker' => '5',
	'categories_id_array' => array($cat_gaming_id,),
));

$post_td_post_android_gadget_review_little_improvements_make_a_big_difference_id = td_demo_content::add_post(array(
	'title' => 'Android Gadget Review: Little Improvements Make a Big Difference',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_gaming_id,),
));

$post_td_post_bored_ape_yacht_club_announces_play_to_earn_nft_game_in_2022_id = td_demo_content::add_post(array(
	'title' => 'Bored Ape Yacht Club Announces Play-to-Earn NFT Game in 2022',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_gaming_id,),
));

$post_td_post_nft_game_parallel_achieves_500m_valuation_with_major_investments_id = td_demo_content::add_post(array(
	'title' => 'NFT Game Parallel Achieves $500M Valuation with Major Investments',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_gaming_id,),
));

$post_td_post_unstoppable_domains_launch_api_for_nft_domain_name_integrations_id = td_demo_content::add_post(array(
	'title' => 'Unstoppable Domains Launch API for NFT Domain Name Integrations',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_adoption_id,),
));

$post_td_post_nfts_of_gorgeous_women_from_around_the_world_sell_out_in_minutes_id = td_demo_content::add_post(array(
	'title' => 'NFTs of Gorgeous Women From Around the World Sell Out in Minutes',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_adoption_id,),
));

$post_td_post_adidas_announces_debut_nft_collection_with_bored_ape_yacht_club_id = td_demo_content::add_post(array(
	'title' => 'Adidas Announces Debut NFT Collection With Bored Ape Yacht Club',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_adoption_id,),
));

$post_td_post_shopify_will_enable_creators_to_mint_and_sell_nfts_inside_platform_id = td_demo_content::add_post(array(
	'title' => 'Shopify Will Enable Creators to Mint and Sell NFTs Inside Platform',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_adoption_id,),
));

$post_td_post_stay_inspired_top_nft_artists_reveal_how_they_find_their_muses_id = td_demo_content::add_post(array(
	'title' => 'Stay Inspired: Top NFT Artists Reveal How They Find their Muses',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_adoption_id,),
));

$post_td_post_first_avatar_nft_collection_cryptoapes_the_ultimate_guide_id = td_demo_content::add_post(array(
	'title' => 'First Avatar NFT Collection: CryptoApes, The Ultimate Guide',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_guides_id,),
));

$post_td_post_expert_advice_the_best_way_to_flip_an_nft_and_make_fast_profits_id = td_demo_content::add_post(array(
	'title' => 'Expert Advice: The Best Way to Flip an NFT and Make Fast Profits',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_guides_id,),
));

$post_td_post_but_first_the_basics_of_nft_minting_how_to_set_up_a_metamask_wallet_id = td_demo_content::add_post(array(
	'title' => 'But First, the Basics of NFT Minting: How to Set Up a MetaMask Wallet',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_guides_id,),
));

$post_td_post_holiday_gift_guide_for_the_nft_enthusiasts_from_your_friends_list_id = td_demo_content::add_post(array(
	'title' => 'Holiday Gift Guide for the NFT Enthusiasts from Your Friends List',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_guides_id,),
));

$post_td_post_whats_happening_at_nft_nyc_heres_nft_nows_event_roundup_id = td_demo_content::add_post(array(
	'title' => 'What\'s Happening at NFT.NYC? Here\'s NFT Now\'s Event Roundup',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_guides_id,),
));

$post_td_post_christies_collaborates_with_opensea_for_its_first_nft_drop_id = td_demo_content::add_post(array(
	'title' => 'Christie\'s Collaborates With OpenSea for Its First NFT Drop',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_drops_id,),
));

$post_td_post_impact_theory_studios_announces_holiday_themed_nft_project_merryz_id = td_demo_content::add_post(array(
	'title' => 'Impact Theory Studios Announces Holiday-Themed NFT Project Merryz',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_drops_id,),
));

$post_td_post_the_matrix_is_coming_as_an_nft_project_ahead_of_resurrections_id = td_demo_content::add_post(array(
	'title' => 'The Matrix Is Coming As an NFT Project Ahead of Resurrections',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_drops_id,),
));

$post_td_post_paks_drop_sets_world_record_as_largest_sale_by_a_living_artist_id = td_demo_content::add_post(array(
	'title' => 'Pak\'s Drop Sets World Record as Largest Sale by a Living Artist',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_drops_id,),
));

$post_td_post_music_nft_platform_royal_announces_drop_featuring_rapper_nas_id = td_demo_content::add_post(array(
	'title' => 'Music & NFT Platform Royal Announces Drop Featuring Rapper Nas',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'tds_locker' => '5',
	'categories_id_array' => array($cat_drops_id,),
));

$post_td_post_nft_collector_sells_signature_cryptogoat_for_10_26_million_id = td_demo_content::add_post(array(
	'title' => 'NFT Collector Sells Signature CryptoGoat for $10.26 Million',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_market_id,),
));

$post_td_post_world_of_women_creator_signs_with_madonna_baycs_guy_oseary_id = td_demo_content::add_post(array(
	'title' => 'World of Women Creator Signs With Madonna & BAYC\'s Guy Oseary',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_market_id,),
));

$post_td_post_global_fashion_house_coach_launches_personal_debut_nft_collection_id = td_demo_content::add_post(array(
	'title' => 'Global Fashion House Coach Launches Personal Debut NFT Collection',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_market_id,),
));

$post_td_post_christies_openseas_on_chain_auction_closes_at_3_6_million_id = td_demo_content::add_post(array(
	'title' => 'Christie\'s & OpenSea\'s On-Chain Auction Closes at $3.6 Million',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_market_id,),
));

$post_td_post_former_first_lady_melania_trump_launches_her_own_nft_platform_id = td_demo_content::add_post(array(
	'title' => 'Former First Lady Melania Trump Launches Her Own NFT Platform',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_market_id,),
));


/*  ---------------------------------------------------------------------------- 
	PRODUCTS
*/


/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/
$template_tag_template_nft_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Tag Template - NFT PRO',
	'file' => 'tag_cloud_template.txt',
	'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_nft_pro_id);


$template_date_template_nft_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Date Template - NFT PRO',
	'file' => 'date_cloud_template.txt',
	'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_nft_pro_id);


$template_search_template_nft_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Search Template - NFT PRO',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_nft_pro_id);


$template_404_template_nft_pro_id = td_demo_content::add_cloud_template(array(
	'title' => '404 Template - NFT PRO',
	'file' => '404_cloud_template.txt',
	'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_nft_pro_id);


$template_author_template_nft_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Author Template - NFT PRO',
	'file' => 'author_cloud_template.txt',
	'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_nft_pro_id);


$template_category_template_nft_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Category Template - NFT PRO',
	'file' => 'cat_cloud_template.txt',
	'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_nft_pro_id);


$template_footer_template_nft_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Footer Template - NFT PRO',
	'file' => 'footer_cloud_template.txt',
	'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_nft_pro_id);


$template_single_template_nft_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Single Template - NFT PRO',
	'file' => 'post_cloud_template.txt',
	'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_nft_pro_id);


$template_header_template_nft_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Header Template - NFT PRO',
	'file' => 'header_cloud_template.txt',
	'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_nft_pro_id);


update_post_meta( $template_header_template_nft_pro_id, 'header_mobile_menu_id', $menu_td_demo_header_menu_id);


/*  ----------------------------------------------------------------------------
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_category(array(
    'title' => 'Drops',
    'add_to_menu_id' => $menu_td_demo_custom_menu_id,
    'category_id' => $cat_drops_id,
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_category(array(
    'title' => 'Market',
    'add_to_menu_id' => $menu_td_demo_custom_menu_id,
    'category_id' => $cat_market_id,
    'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_category(array(
    'title' => 'Collectibles',
    'add_to_menu_id' => $menu_td_demo_custom_menu_id,
    'category_id' => $cat_collectibles_id,
    'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_category(array(
    'title' => 'Adoption',
    'add_to_menu_id' => $menu_td_demo_custom_menu_id,
    'category_id' => $cat_adoption_id,
    'parent_id' => ''
));


/*  ----------------------------------------------------------------------------
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_link(array(
    'title' => 'Contact Us',
    'add_to_menu_id' => $menu_td_demo_footer_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_link(array(
    'title' => 'About Us',
    'add_to_menu_id' => $menu_td_demo_footer_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_link(array(
    'title' => 'Advertise',
    'add_to_menu_id' => $menu_td_demo_footer_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_link(array(
    'title' => 'Careers',
    'add_to_menu_id' => $menu_td_demo_footer_menu_id,
    'url' => '#',
    'parent_id' => ''
));


/*  ----------------------------------------------------------------------------
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_category(array(
    'title' => 'NFT',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_nft_id,
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_category(array(
    'title' => 'Art',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_art_id,
    'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_category(array(
    'title' => 'Gaming',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_gaming_id,
    'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_category(array(
    'title' => 'Investment',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_investment_id,
    'parent_id' => ''
));

$menu_item_4_id = td_demo_menus::add_category(array(
    'title' => 'Features',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_features_id,
    'parent_id' => ''
));



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
