<?php 



/*  ---------------------------------------------------------------------------- 
	TDS LOCKERS
*/

/*  ---------------------------------------------------------------------------- 
	CATEGORIES
*/
$cat_top_global_news_id = td_demo_category::add_category(array(
    'category_name' => 'Top Global News',
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

$cat_automotive_id = td_demo_category::add_category(array(
	'category_name' => 'Automotive',
	'parent_id' => $cat_top_global_news_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_entrepreneurs_id = td_demo_category::add_category(array(
	'category_name' => 'Entrepreneurs',
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

$cat_eurozone_id = td_demo_category::add_category(array(
	'category_name' => 'Eurozone',
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

$cat_healthcare_id = td_demo_category::add_category(array(
	'category_name' => 'Healthcare',
	'parent_id' => $cat_top_global_news_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_industries_id = td_demo_category::add_category(array(
	'category_name' => 'Industries',
	'parent_id' => $cat_top_global_news_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_investments_id = td_demo_category::add_category(array(
	'category_name' => 'Investments',
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

$cat_markets_id = td_demo_category::add_category(array(
	'category_name' => 'Markets',
	'parent_id' => $cat_top_global_news_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_real_estate_id = td_demo_category::add_category(array(
	'category_name' => 'Real Estate',
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

$cat_retail_id = td_demo_category::add_category(array(
	'category_name' => 'Retail',
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

$cat_technology_id = td_demo_category::add_category(array(
	'category_name' => 'Technology',
	'parent_id' => $cat_top_global_news_id,
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
$post_boeing_and_jetblue_invested_in_a_electric_jet_to_revolutionize_air_travel_id = td_demo_content::add_post(array(
	'title' => 'Boeing and JetBlue Invested in a Electric-Jet to Revolutionize Air Travel',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_investments_id,),
));

$post_tesla_is_investing_millions_in_its_giant_gigafactory_and_hiring_hundreds_id = td_demo_content::add_post(array(
	'title' => 'Tesla is Investing Millions in its Giant Gigafactory and Hiring Hundreds',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_investments_id,),
));

$post_volkswagen_is_investing_2_billion_to_push_into_electric_vehicles_id = td_demo_content::add_post(array(
	'title' => 'Volkswagen is Investing $2 billion to Push into Electric Vehicles',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_investments_id,),
));

$post_invest_in_a_cleaner_environment_to_make_the_market_booming_id = td_demo_content::add_post(array(
	'title' => 'Invest in a Cleaner Environment to Make the Market Booming',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_investments_id,),
));

$post_european_banks_sitting_on_e1tn_mountain_of_bad_debt_id = td_demo_content::add_post(array(
	'title' => 'European Banks Sitting on €1tn \"Mountain\" of Bad Debt',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_eurozone_id,),
));

$post_uk_investment_funds_suffered_5_7bn_outflows_after_brexit_vote_on_june_id = td_demo_content::add_post(array(
	'title' => 'UK Investment Funds Suffered £5.7bn Outflows after Brexit Vote on June',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_investments_id,),
));

$post_eurozone_inflation_drops_below_zero_as_prices_fall_by_0_1_id = td_demo_content::add_post(array(
	'title' => 'Eurozone Inflation Drops below Zero as Prices Fall by 0.1%',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_eurozone_id,),
));

$post_brexit_would_trigger_economic_and_financial_shock_to_uk_id = td_demo_content::add_post(array(
	'title' => 'Brexit would Trigger \'Economic and Financial Shock\' to UK',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_eurozone_id,),
));

$post_bank_closures_taking_their_toll_on_businesses_across_greece_id = td_demo_content::add_post(array(
	'title' => 'Bank Closures Taking their Toll on Businesses Across Greece',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_eurozone_id,),
));

$post_european_markets_close_lower_as_oil_slides_again_id = td_demo_content::add_post(array(
	'title' => 'European Markets Close Lower as Oil Slides Again',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_eurozone_id,),
));

$post_tesco_boss_hails_end_of_space_race_as_profits_crash_id = td_demo_content::add_post(array(
	'title' => 'Tesco Boss Hails End of \'Space Race\' as Profits Crash',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_retail_id,),
));

$post_marks_spencer_profits_jump_for_first_time_in_four_years_id = td_demo_content::add_post(array(
	'title' => 'Marks & Spencer Profits Jump for First Time in Four Years',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_retail_id,),
));

$post_retail_sales_fall_for_a_third_month_in_a_row_id = td_demo_content::add_post(array(
	'title' => 'Retail Sales Fall for a Third Month in a Row',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_retail_id,),
));

$post_cadbury_and_halfords_profit_as_camping_gear_rise_strongly_id = td_demo_content::add_post(array(
	'title' => 'Cadbury and Halfords Profit as Camping Gear Rise Strongly',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_retail_id,),
));

$post_sports_direct_workers_paid_less_than_minimum_wage_id = td_demo_content::add_post(array(
	'title' => 'Sports Direct Workers Paid Less than Minimum Wage',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_retail_id,),
));

$post_the_best_financial_habits_of_every_successful_entrepreneur_id = td_demo_content::add_post(array(
	'title' => 'The Best Financial Habits of Every Successful Entrepreneur',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_entrepreneurs_id,),
));

$post_new_housing_law_may_offer_an_opportunity_for_entrepreneurs_id = td_demo_content::add_post(array(
	'title' => 'New Housing Law May Offer an Opportunity for Entrepreneurs',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_entrepreneurs_id,),
));

$post_developers_in_the_desert_googles_oasis_for_startups_in_dubai_id = td_demo_content::add_post(array(
	'title' => 'Developers in the Desert: Google\'s Oasis for Startups in Dubai',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_entrepreneurs_id,),
));

$post_how_entrepreneurs_make_use_of_technology_to_boost_cashflow_id = td_demo_content::add_post(array(
	'title' => 'How Entrepreneurs Make Use of Technology to Boost Cashflow',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_entrepreneurs_id,),
));

$post_stock_exchanges_to_back_entrepreneurs_approved_by_south_africa_id = td_demo_content::add_post(array(
	'title' => 'Stock Exchanges to Back Entrepreneurs Approved by South Africa',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_entrepreneurs_id,),
));

$post_california_could_become_the_cannabis_industrys_safe_haven_id = td_demo_content::add_post(array(
	'title' => 'California Could Become The Cannabis Industry\'s Safe Haven',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_healthcare_id,),
));

$post_the_huge_impact_of_health_care_reform_might_have_on_drug_pricing_id = td_demo_content::add_post(array(
	'title' => 'The Huge Impact of Health Care Reform Might Have on Drug Pricing',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_healthcare_id,),
));

$post_us_raises_medicare_payments_to_insurers_by_45_percent_in_2018_id = td_demo_content::add_post(array(
	'title' => 'US Raises Medicare Payments to Insurers by 45 percent in 2018',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_healthcare_id,),
));

$post_eu_recommends_suspending_hundreds_of_drugs_tested_by_indian_firm_id = td_demo_content::add_post(array(
	'title' => 'EU Recommends Suspending Hundreds of Drugs Tested by Indian Firm',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_healthcare_id,),
));

$post_hospital_shares_bounce_back_as_obamacare_replacement_opposition_grows_id = td_demo_content::add_post(array(
	'title' => 'Hospital Shares Bounce Back as Obamacare Replacement Opposition Grows',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_healthcare_id,),
));

$post_peugeot_owner_psa_close_to_deal_to_buy_vauxhall_and_opel_id = td_demo_content::add_post(array(
	'title' => 'Peugeot Owner PSA Close to Deal to Buy Vauxhall and Opel',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_automotive_id,),
));

$post_mercedes_will_retain_global_luxury_sales_crown_in_years_to_come_id = td_demo_content::add_post(array(
	'title' => 'Mercedes Will Retain Global Luxury Sales Crown In Years To Come',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_automotive_id,),
));

$post_europes_new_car_sales_speed_to_record_high_in_last_years_id = td_demo_content::add_post(array(
	'title' => 'Europe\'s New Car Sales Speed to Record High in Last Years',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_automotive_id,),
));

$post_toyota_to_invest_240m_in_a_united_kingdom_plant_at_burnaston_id = td_demo_content::add_post(array(
	'title' => 'Toyota to Invest £240m in a United Kingdom Plant at Burnaston',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_automotive_id,),
));

$post_volkswagen_reveals_record_car_sales_amid_emissions_scandal_id = td_demo_content::add_post(array(
	'title' => 'Volkswagen Reveals Record Car Sales Amid Emissions Scandal',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_automotive_id,),
));

$post_tesla_charges_ahead_to_overtake_ford_in_market_value_id = td_demo_content::add_post(array(
	'title' => 'Tesla Charges Ahead to Overtake Ford in Market Value',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_automotive_id,),
));

$post_london_stock_exchange_and_deutsche_borse_merger_blocked_by_eu_id = td_demo_content::add_post(array(
	'title' => 'London Stock Exchange and Deutsche Börse Merger Blocked by EU',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_markets_id,),
));

$post_jpmorgan_is_targeting_silicon_valley_tech_talents_and_technology_firms_id = td_demo_content::add_post(array(
	'title' => 'JPMorgan is Targeting Silicon Valley Tech Talents and Technology Firms',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_markets_id,),
));

$post_the_oil_market_is_finally_starting_to_make_sense_as_prices_lower_id = td_demo_content::add_post(array(
	'title' => 'The Oil Market is Finally Starting to Make Sense as Prices Lower',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_markets_id,),
));

$post_dollar_weakens_against_yen_following_another_north_korean_missile_test_id = td_demo_content::add_post(array(
	'title' => 'Dollar Vs Yen Following Another North Korean Missile Test',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_markets_id,),
));

$post_oil_extends_gain_as_stocks_struggle_pound_climbs_markets_wrap_id = td_demo_content::add_post(array(
	'title' => 'Oil Extends Gain as Stocks Struggle; Pound Climbs: Markets Wrap',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_markets_id,),
));

$post_bps_sale_of_key_pipeline_to_billionaire_is_bad_for_uk_id = td_demo_content::add_post(array(
	'title' => 'BP\'s Sale of Key Pipeline to Billionaire is Bad for UK',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_industries_id,),
));

$post_petrochina_suffers_worst_year_posting_lowest_ever_profit_id = td_demo_content::add_post(array(
	'title' => 'PetroChina Suffers Worst Year Posting Lowest-Ever Profit',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_industries_id,),
));

$post_european_stocks_end_with_gains_as_miners_oil_giants_rally_id = td_demo_content::add_post(array(
	'title' => 'European Stocks End With Gains as Miners, Oil Giants Rally',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_industries_id,),
));

$post_exxonmobil_qatar_petroleum_sign_drilling_deal_with_cyprus_id = td_demo_content::add_post(array(
	'title' => 'ExxonMobil, Qatar Petroleum Sign Drilling Deal With Cyprus',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_industries_id,),
));

$post_the_oil_and_gas_situation_the_rigs_just_keep_on_coming_id = td_demo_content::add_post(array(
	'title' => 'The Oil And Gas Situation: The Rigs Just Keep On Coming',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_industries_id,),
));

$post_the_pc_market_has_had_its_worst_year_ever_id = td_demo_content::add_post(array(
	'title' => 'The PC Market is Booming even with the Economical Crisis',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_technology_id,),
));

$post_apples_gained_50_of_smartwatch_market_research_id = td_demo_content::add_post(array(
	'title' => 'Apple\'s Gained 50% of Smartwatch Market: Research',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_technology_id,),
));

$post_sony_ps4_sales_top_35_million_after_holiday_boost_id = td_demo_content::add_post(array(
	'title' => 'Sony PS4 Sales Top 35 Million after Holiday Boost',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_technology_id,),
));

$post_facebooks_whatsapp_is_getting_into_digital_payments_id = td_demo_content::add_post(array(
	'title' => 'Facebook\'s Whatsapp Is Getting Into Digital Payments',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_technology_id,),
));

$post_how_blackberry_stays_relevant_in_the_age_of_the_iphone_id = td_demo_content::add_post(array(
	'title' => 'How BlackBerry Stays Relevant in the Age of the iPhone',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_technology_id,),
));

$post_samsung_profit_set_to_hit_a_high_thanks_to_chips_id = td_demo_content::add_post(array(
	'title' => 'Samsung Profit Set to Hit a high Thanks to Chips',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_technology_id,),
));

$post_foreign_investors_are_piling_into_the_us_commercial_real_estate_id = td_demo_content::add_post(array(
	'title' => 'Foreign Investors are Piling into the US Commercial Real Estate',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_automotive_id,$cat_entrepreneurs_id,$cat_eurozone_id,$cat_healthcare_id,$cat_industries_id,$cat_investments_id,$cat_markets_id,$cat_real_estate_id,$cat_retail_id,$cat_technology_id,),
));

$post_vancouvers_real_estate_market_could_crash_thanks_to_china_id = td_demo_content::add_post(array(
	'title' => 'Vancouver\'s Real Estate Market could Crash Thanks to China',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_automotive_id,$cat_entrepreneurs_id,$cat_eurozone_id,$cat_healthcare_id,$cat_industries_id,$cat_investments_id,$cat_markets_id,$cat_real_estate_id,$cat_retail_id,$cat_technology_id,),
));

$post_the_frenzy_for_manhattan_commercial_real_estate_is_over_id = td_demo_content::add_post(array(
	'title' => 'The \'Frenzy\' for Manhattan Real Estate is Over',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_automotive_id,$cat_entrepreneurs_id,$cat_eurozone_id,$cat_healthcare_id,$cat_industries_id,$cat_investments_id,$cat_markets_id,$cat_real_estate_id,$cat_retail_id,$cat_technology_id,),
));

$post_the_oil_crash_is_crushing_the_uaes_real_estate_market_id = td_demo_content::add_post(array(
	'title' => 'The Oil Crash is Crushing the UAE\'s Real Estate Market',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_automotive_id,$cat_entrepreneurs_id,$cat_eurozone_id,$cat_healthcare_id,$cat_industries_id,$cat_investments_id,$cat_markets_id,$cat_real_estate_id,$cat_retail_id,$cat_technology_id,),
));

$post_your_new_construction_home_should_come_with_a_warranty_id = td_demo_content::add_post(array(
	'title' => 'Your New-Construction Home Should Come With A Warranty',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_automotive_id,$cat_entrepreneurs_id,$cat_eurozone_id,$cat_healthcare_id,$cat_industries_id,$cat_investments_id,$cat_markets_id,$cat_real_estate_id,$cat_technology_id,),
));


/*  ---------------------------------------------------------------------------- 
	PAGES
*/
$page_homepage_id = td_demo_content::add_page(array(
	'title' => 'Homepage',
	'file' => 'homepage.txt',
	'homepage' => true,
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
	'title' => 'Homepage',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'page_id' => $page_homepage_id,
	'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_mega_menu(array(
	'title' => 'Top Global News',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_top_global_news_id,
	'parent_id' => ''
), true);

$menu_item_2_id = td_demo_menus::add_mega_menu(array(
	'title' => 'Eurozone',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_eurozone_id,
	'parent_id' => ''
), true);

$menu_item_3_id = td_demo_menus::add_mega_menu(array(
	'title' => 'Investments',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_investments_id,
	'parent_id' => ''
), true);

$menu_item_4_id = td_demo_menus::add_category(array(
	'title' => 'Real Estate',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_real_estate_id,
	'parent_id' => ''
));

$menu_item_5_id = td_demo_menus::add_category(array(
	'title' => 'More',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_entrepreneurs_id,
	'parent_id' => ''
));

$menu_item_6_id = td_demo_menus::add_category(array(
	'title' => 'Retail',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_retail_id,
	'parent_id' => $menu_item_5_id
));

$menu_item_7_id = td_demo_menus::add_category(array(
	'title' => 'Industries',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_industries_id,
	'parent_id' => $menu_item_5_id
));

$menu_item_8_id = td_demo_menus::add_category(array(
	'title' => 'Markets',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_markets_id,
	'parent_id' => $menu_item_5_id
));


/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/
$template_tag_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Business - Tag Template',
	'file' => 'tag_cloud_template.txt',
	'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_id);


$template_date_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Business - Date Template',
	'file' => 'date_cloud_template.txt',
	'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_id);


$template_search_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Business - Search Template',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_id);


$template_404_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Business - 404 Template',
	'file' => '404_cloud_template.txt',
	'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_id);


$template_author_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Business - Author Template',
	'file' => 'author_cloud_template.txt',
	'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_id);


$template_category_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Business - Category Template',
	'file' => 'cat_cloud_template.txt',
	'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_id);


$template_single_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Business - Single Template',
	'file' => 'post_cloud_template.txt',
	'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_id);


$template_footer_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Business - Footer Template',
	'file' => 'footer_cloud_template.txt',
	'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_id);


$template_header_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Business - Header Template',
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

td_demo_misc::add_social_buttons(array());

$generated_css = td_css_generator(); 
if ( function_exists('tdsp_css_generator') ) { 
	$generated_css .= tdsp_css_generator();
}
td_util::update_option( 'tds_user_compile_css', $generated_css );
