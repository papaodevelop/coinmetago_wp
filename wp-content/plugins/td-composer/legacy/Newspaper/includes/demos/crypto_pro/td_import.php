<?php 

/*  ---------------------------------------------------------------------------- 
	TDS LOCKERS
*/

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

$cat_coins_id = td_demo_category::add_category(array(
	'category_name' => 'Coins',
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

$cat_bitcoin_id = td_demo_category::add_category(array(
    'category_name' => 'Bitcoin',
    'parent_id' => $cat_coins_id,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => '',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_ethereum_id = td_demo_category::add_category(array(
	'category_name' => 'Ethereum',
	'parent_id' => $cat_coins_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_litecoin_id = td_demo_category::add_category(array(
    'category_name' => 'Litecoin',
    'parent_id' => $cat_coins_id,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => '',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_other_id = td_demo_category::add_category(array(
    'category_name' => 'Other',
    'parent_id' => $cat_coins_id,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => '',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_ripple_id = td_demo_category::add_category(array(
    'category_name' => 'Ripple',
    'parent_id' => $cat_coins_id,
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

$cat_mining_id = td_demo_category::add_category(array(
	'category_name' => 'Mining',
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

$cat_prices_id = td_demo_category::add_category(array(
	'category_name' => 'Prices',
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

$cat_regulation_id = td_demo_category::add_category(array(
	'category_name' => 'Regulation',
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
	POSTS
*/


$post_td_post_interpol_to_increase_measures_against_btc_laundering_id = td_demo_content::add_post(array(
    'title' => 'Interpol to Increase Measures Against BTC Laundering',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'categories_id_array' => array($cat_bitcoin_id,$cat_blockchain_id,$cat_ethereum_id,$cat_guides_id,$cat_litecoin_id,$cat_mining_id,$cat_other_id,$cat_prices_id,$cat_regulation_id,$cat_ripple_id,),
));

$post_td_post_us_proposes_virtual_currency_specific_regulatory_body_id = td_demo_content::add_post(array(
    'title' => 'US Proposes Virtual Currency-Specific Regulatory Body',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'categories_id_array' => array($cat_bitcoin_id,$cat_blockchain_id,$cat_ethereum_id,$cat_guides_id,$cat_litecoin_id,$cat_mining_id,$cat_other_id,$cat_prices_id,$cat_regulation_id,$cat_ripple_id,),
));

$post_td_post_services_could_help_investors_rate_crypto_currencies_id = td_demo_content::add_post(array(
    'title' => 'Services Could Help Investors Rate Crypto Currencies',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'categories_id_array' => array($cat_bitcoin_id,$cat_blockchain_id,$cat_ethereum_id,$cat_guides_id,$cat_litecoin_id,$cat_mining_id,$cat_other_id,$cat_prices_id,$cat_regulation_id,$cat_ripple_id,),
));

$post_td_post_regulators_greenlight_bitcoin_future_implications_id = td_demo_content::add_post(array(
    'title' => 'Regulators Greenlight Bitcoin Future Implications',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'categories_id_array' => array($cat_bitcoin_id,$cat_blockchain_id,$cat_ethereum_id,$cat_guides_id,$cat_litecoin_id,$cat_mining_id,$cat_other_id,$cat_prices_id,$cat_regulation_id,$cat_ripple_id,),
));

$post_td_post_the_eu_clarifies_the_anti_money_laundering_directive_id = td_demo_content::add_post(array(
    'title' => 'The EU Clarifies the Anti-Money Laundering Directive',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'categories_id_array' => array($cat_bitcoin_id,$cat_blockchain_id,$cat_ethereum_id,$cat_guides_id,$cat_litecoin_id,$cat_mining_id,$cat_other_id,$cat_prices_id,$cat_regulation_id,$cat_ripple_id,),
));

$post_td_post_investing_take_into_account_the_legal_perspective_id = td_demo_content::add_post(array(
	'title' => 'Investing: Take into Account the Legal Perspective',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_prices_id,),
));

$post_td_post_the_role_of_trading_bots_in_the_cryptocurrency_market_id = td_demo_content::add_post(array(
	'title' => 'The Role of Trading Bots in the Cryptocurrency Market',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_prices_id,),
));

$post_td_post_options_for_buying_crypto_currency_are_on_the_rise_id = td_demo_content::add_post(array(
	'title' => 'Options for Buying Crypto Currency Are on the Rise',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_prices_id,),
));

$post_td_post_possible_pennant_suggests_end_to_market_consolidation_id = td_demo_content::add_post(array(
	'title' => 'Possible Pennant Suggests End to Market Consolidation',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_prices_id,),
));

$post_td_post_bitcoin_transaction_fees_are_pretty_low_right_now_id = td_demo_content::add_post(array(
	'title' => 'Bitcoin Transaction Fees Are Pretty Low Right Now',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_prices_id,),
));

$post_td_post_blockchain_technology_takes_center_stage_in_sf_thriller_id = td_demo_content::add_post(array(
	'title' => 'Blockchain Technology Takes Center Stage in SF Thriller',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_blockchain_id,),
));

$post_td_post_making_voting_secure_with_blockchain_technology_id = td_demo_content::add_post(array(
	'title' => 'Making Voting Secure with Blockchain Technology',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_blockchain_id,),
));

$post_td_post_proof_of_insurance_on_the_riskblock_blockchain_id = td_demo_content::add_post(array(
	'title' => 'Proof of Insurance on the RiskBlock Blockchain',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_blockchain_id,),
));

$post_td_post_2018_will_bring_breakthrough_blockchain_developments_id = td_demo_content::add_post(array(
	'title' => '2018 Will Bring Breakthrough Blockchain Developments',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_blockchain_id,),
));

$post_td_post_squares_cash_app_adds_option_to_buy_and_sell_bitcoin_id = td_demo_content::add_post(array(
	'title' => 'Square\'s Cash App Adds Option to Buy and Sell Bitcoin',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_blockchain_id,),
));

$post_td_post_something_odd_is_happening_at_bitcoins_largest_mining_pool_id = td_demo_content::add_post(array(
	'title' => 'Something Odd Is Happening at Bitcoin’s Largest Mining Pool',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_mining_id,),
));

$post_td_post_the_politicization_of_bitcoin_mining_is_a_distraction_id = td_demo_content::add_post(array(
	'title' => 'The Politicization of Bitcoin Mining Is a Distraction',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_mining_id,),
));

$post_td_post_we_desperately_need_balance_of_power_in_the_mining_space_id = td_demo_content::add_post(array(
	'title' => 'We Desperately Need Balance of Power in the Mining Space',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_mining_id,),
));

$post_td_post_company_will_launch_new_mining_operation_with_7_nm_chips_id = td_demo_content::add_post(array(
	'title' => 'Company Will Launch New Mining Operation With 7 nm Chips',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_mining_id,),
));

$post_td_post_new_mining_centers_increase_north_american_market_position_id = td_demo_content::add_post(array(
	'title' => 'New Mining Centers Increase North American Market Position',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_mining_id,),
));

$post_td_post_the_idiot_proof_vault_a_simple_storage_guide_for_beginners_id = td_demo_content::add_post(array(
	'title' => 'The Idiot-Proof Vault: A Simple Storage Guide for Beginners',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_guides_id,),
));

$post_td_post_a_users_guide_on_upcoming_forked_coins_and_transactions_id = td_demo_content::add_post(array(
	'title' => 'A User’s Guide on Upcoming Forked Coins and Transactions',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_guides_id,),
));

$post_td_post_south_korea_releases_official_guidelines_for_cryptocurrency_id = td_demo_content::add_post(array(
	'title' => 'South Korea Releases Official Guidelines for Cryptocurrency',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_guides_id,),
));

$post_td_post_are_bitcoin_or_other_crypto_currencies_a_good_investment_id = td_demo_content::add_post(array(
	'title' => 'Are Bitcoin or Other Crypto Currencies a Good Investment?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_guides_id,),
));

$post_td_post_3_factors_that_made_bitcoin_become_so_valuable_last_year_id = td_demo_content::add_post(array(
	'title' => '3 Factors That Made Bitcoin Become so Valuable Last Year',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_guides_id,),
));

$post_td_post_crypto_exchanges_to_share_data_with_banks_in_new_system_id = td_demo_content::add_post(array(
	'title' => 'Crypto Exchanges to Share Data with Banks in New System',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_other_id,),
));

$post_td_post_new_website_ranks_600_crypto_currencies_by_activity_id = td_demo_content::add_post(array(
	'title' => 'New Website Ranks 600 Crypto Currencies by Activity',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_other_id,),
));

$post_td_post_cryptocurrencies_are_more_centralized_than_you_think_id = td_demo_content::add_post(array(
	'title' => 'Cryptocurrencies Are More Centralized Than You Think',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_other_id,),
));

$post_td_post_south_korea_finds_nearly_600_million_in_crypto_crime_id = td_demo_content::add_post(array(
	'title' => 'South Korea Finds Nearly $600 Million in Crypto Crime',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_other_id,),
));

$post_td_post_chinese_neo_drops_after_investor_relations_disaster_id = td_demo_content::add_post(array(
	'title' => 'Chinese NEO Drops After Investor Relations Disaster',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_other_id,),
));

$post_td_post_ripple_market_capitalization_soars_surges_past_ethereum_id = td_demo_content::add_post(array(
	'title' => 'Ripple Market Capitalization Soars, Surges Past Ethereum',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_ripple_id,),
));

$post_td_post_new_blockchain_exchange_bitsane_introduces_ripple_trading_id = td_demo_content::add_post(array(
	'title' => 'New Blockchain Exchange Bitsane Introduces Ripple Trading',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_ripple_id,),
));

$post_td_post_ripple_threatens_to_usurp_bitcoin_and_usher_in_the_rippening_id = td_demo_content::add_post(array(
	'title' => 'Ripple Threatens to Usurp Bitcoin and Usher In “The Rippening”',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_ripple_id,),
));

$post_td_post_ripple_dips_after_coinbase_rejects_rumors_of_adding_new_assets_id = td_demo_content::add_post(array(
	'title' => 'Ripple Dips After Coinbase Rejects Rumors of Adding New Assets',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_ripple_id,),
));

$post_td_post_the_rise_and_fall_of_ripple_is_a_case_study_in_mass_hysteria_id = td_demo_content::add_post(array(
	'title' => 'The Rise and Fall of Ripple is a Case Study in Mass Hysteria',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_ripple_id,),
));

$post_td_post_yours_network_moves_to_litecoin_plans_full_launch_on_may_30_id = td_demo_content::add_post(array(
	'title' => 'Yours Network Moves to Litecoin, Plans Full Launch on May 30',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_litecoin_id,),
));

$post_td_post_charlie_lee_resigns_from_coinbase_to_focus_on_litecoin_id = td_demo_content::add_post(array(
	'title' => 'Charlie Lee Resigns From Coinbase to Focus on Litecoin',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_litecoin_id,),
));

$post_td_post_confidential_transactions_could_add_anonymity_to_litecoin_id = td_demo_content::add_post(array(
	'title' => 'Confidential Transactions Could Add Anonymity to Litecoin',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_litecoin_id,),
));

$post_td_post_chinese_whale_buys_fleet_of_cars_worth_a4_million_with_litecoin_id = td_demo_content::add_post(array(
	'title' => 'Chinese Whale Buys Fleet of Cars Worth £4 Million with Litecoin',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_litecoin_id,),
));

$post_td_post_litecoin_creator_charlie_lee_reveals_he_sold_all_his_litecoin_id = td_demo_content::add_post(array(
	'title' => 'Litecoin Creator Charlie Lee Reveals He Sold All His Litecoin',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_litecoin_id,),
));

$post_td_post_ethereum_millionaires_attract_attention_from_regulators_id = td_demo_content::add_post(array(
	'title' => 'Ethereum Millionaires Attract Attention From Regulators',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_ethereum_id,),
));

$post_td_post_ethereums_parity_users_lose_millions_in_a_multi_sig_hack_id = td_demo_content::add_post(array(
	'title' => 'Ethereum’s Parity Users Lose Millions in a Multi-Sig Hack',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_ethereum_id,),
));

$post_td_post_coinbase_under_investigation_for_ethereum_flash_crash_id = td_demo_content::add_post(array(
	'title' => 'Coinbase Under Investigation for Ethereum ‘Flash Crash’',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_ethereum_id,),
));

$post_td_post_ripple_ceo_and_ethereum_co_founder_bash_ico_industry_id = td_demo_content::add_post(array(
	'title' => 'Ripple CEO and Ethereum Co-Founder Bash ICO Industry',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_ethereum_id,),
));

$post_td_post_ethereum_congestion_forces_exchanges_to_halt_withdrawals_id = td_demo_content::add_post(array(
	'title' => 'Ethereum Congestion Forces Exchanges to Halt Withdrawals',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_ethereum_id,),
));

$post_td_post_bank_of_japan_no_big_problems_with_bitcoin_so_far_id = td_demo_content::add_post(array(
	'title' => 'Bank of Japan: No Big Problems With Bitcoin So Far',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_bitcoin_id,),
));

$post_td_post_singapore_mall_sells_bitcoin_mining_hardware_station_id = td_demo_content::add_post(array(
	'title' => 'Singapore Mall Sells Bitcoin Mining Hardware Station',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_bitcoin_id,),
));

$post_td_post_over_1_million_people_in_line_for_bitcoin_trading_app_id = td_demo_content::add_post(array(
	'title' => 'Over 1 Million People in Line for Bitcoin Trading App',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_bitcoin_id,),
));

$post_td_post_interview_bitcoin_transactions_and_american_taxation_id = td_demo_content::add_post(array(
	'title' => 'Interview: Bitcoin Transactions and American Taxation',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_bitcoin_id,),
));

$post_td_post_bitcoin_future_predictions_are_here_the_story_so_far_id = td_demo_content::add_post(array(
	'title' => 'Bitcoin Future Predictions Are Here: The Story So Far',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_bitcoin_id,),
));


/*  ---------------------------------------------------------------------------- 
	PRODUCTS
*/

/*  ---------------------------------------------------------------------------- 
	MENUS
*/
$menu_td_demo_custom_menu_id = td_demo_menus::create_menu('td-demo-custom-menu', '');

$menu_td_demo_header_menu_id = td_demo_menus::create_menu('td-demo-header-menu', '');


/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/
$template_tag_template_crypto_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Tag Template - Crypto PRO',
	'file' => 'tag_cloud_template.txt',
	'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_crypto_pro_id);


$template_search_template_crypto_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Search Template - Crypto PRO',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_crypto_pro_id);


$template_date_template_crypto_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Date Template - Crypto PRO',
	'file' => 'date_cloud_template.txt',
	'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_crypto_pro_id);


$template_author_template_crypto_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Author Template - Crypto PRO',
	'file' => 'author_cloud_template.txt',
	'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_crypto_pro_id);


$template_category_template_crypto_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Category Template - Crypto PRO',
	'file' => 'cat_cloud_template.txt',
	'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_crypto_pro_id);


$template_single_post_template_crypto_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Single Post Template - Crypto PRO',
	'file' => 'post_cloud_template.txt',
	'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_post_template_crypto_pro_id);


$template_404_template_crypto_pro_id = td_demo_content::add_cloud_template(array(
	'title' => '404 Template - Crypto PRO',
	'file' => '404_cloud_template.txt',
	'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_crypto_pro_id);


$template_footer_template_crypto_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Footer Template - Crypto PRO',
	'file' => 'footer_cloud_template.txt',
	'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_crypto_pro_id);


$template_header_template_crypto_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Header Template - Crypto PRO',
	'file' => 'header_cloud_template.txt',
	'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_crypto_pro_id);


update_post_meta( $template_header_template_crypto_pro_id, 'header_mobile_menu_id', $menu_td_demo_header_menu_id);


/*  ----------------------------------------------------------------------------
	PAGES
*/
$page_homepage_crypto_id = td_demo_content::add_page(array(
    'title' => 'Home',
    'file' => 'homepage_crypto.txt',
    'homepage' => true,
));


/*  ----------------------------------------------------------------------------
	MENUS ITEMS CUSTOM
*/
$menu_item_0_id = td_demo_menus::add_link(array(
    'title' => 'Predictions',
    'add_to_menu_id' => $menu_td_demo_custom_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_link(array(
    'title' => 'Contact',
    'add_to_menu_id' => $menu_td_demo_custom_menu_id,
    'url' => '#',
    'parent_id' => ''
));


/*  ----------------------------------------------------------------------------
	MENUS ITEMS MAIN
*/
$menu_item_0_id = td_demo_menus::add_page(array(
    'title' => 'Home',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'page_id' => $page_homepage_crypto_id,
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Coins',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_coins_id,
    'parent_id' => ''
), true);

$menu_item_2_id = td_demo_menus::add_category(array(
    'title' => 'Blockchain',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_blockchain_id,
    'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_category(array(
    'title' => 'Guides',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_guides_id,
    'parent_id' => ''
));

$menu_item_4_id = td_demo_menus::add_link(array(
    'title' => 'More',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_5_id = td_demo_menus::add_category(array(
    'title' => 'Mining',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_mining_id,
    'parent_id' => $menu_item_4_id
));

$menu_item_6_id = td_demo_menus::add_category(array(
    'title' => 'Prices',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_prices_id,
    'parent_id' => $menu_item_4_id
));

$menu_item_7_id = td_demo_menus::add_category(array(
    'title' => 'Regulation',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_regulation_id,
    'parent_id' => $menu_item_4_id
));


/*  ---------------------------------------------------------------------------- 
	GENERAL SETTINGS
*/
td_demo_misc::update_background('', false);

td_demo_misc::update_background_mobile('tdx_pic_4');

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
