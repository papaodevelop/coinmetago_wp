<?php 



/*  ---------------------------------------------------------------------------- 
	TDS LOCKERS
*/

/*  ---------------------------------------------------------------------------- 
	CATEGORIES
*/
$cat_art_id = td_demo_category::add_category(array(
	'category_name' => 'Art',
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

$cat_fast_news_id = td_demo_category::add_category(array(
	'category_name' => 'Fast News',
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

$cat_health_id = td_demo_category::add_category(array(
	'category_name' => 'Health',
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

$cat_style_id = td_demo_category::add_category(array(
	'category_name' => 'Style',
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

$cat_tech_id = td_demo_category::add_category(array(
	'category_name' => 'Tech',
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

$cat_us_id = td_demo_category::add_category(array(
	'category_name' => 'US',
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



/*  ---------------------------------------------------------------------------- 
	ATTACHMENTS
*/

/*  ---------------------------------------------------------------------------- 
	POSTS
*/
$post_td_post_getting_enough_sunshine_each_day_can_help_improve_brain_functions_id = td_demo_content::add_post(array(
	'title' => 'Getting Enough Sunshine Each Day can Help Improve Brain Functions',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_us_id,),
));

$post_td_post_a_glimpse_into_the_mind_of_this_world_renown_chef_and_his_process_id = td_demo_content::add_post(array(
	'title' => 'A Glimpse into the Mind of this World Renown Chef and his Process',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_us_id,),
));

$post_td_post_create_your_very_own_pasta_recipe_using_this_websites_ingredients_id = td_demo_content::add_post(array(
	'title' => 'Create Your Very Own Pasta Recipe Using this Website\'s Ingredients',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_us_id,),
));

$post_td_post_shopping_local_spotting_the_best_sales_using_coupons_and_discounts_id = td_demo_content::add_post(array(
	'title' => 'Shopping Local: Spotting the Best Sales, Using Coupons and Discounts',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_us_id,),
));

$post_td_post_how_baking_videos_became_the_most_searched_for_videos_this_year_id = td_demo_content::add_post(array(
	'title' => 'How Baking Videos Became the Most Searched For Videos This Year',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_us_id,),
));

$post_td_post_10_reasons_why_working_from_home_improved_the_overall_happiness_of_employees_id = td_demo_content::add_post(array(
	'title' => '10 Reasons Why Working from Home Improved the Overall Happiness of Employees',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_us_id,),
));

$post_td_post_engaging_in_a_fun_family_activity_to_stay_productive_and_healthy_id = td_demo_content::add_post(array(
	'title' => 'Engaging in a Fun Family Activity to Stay Productive and Healthy',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_us_id,),
));

$post_td_post_outdoor_eating_benefits_and_recommendations_of_local_restaurants_id = td_demo_content::add_post(array(
	'title' => 'Outdoor Eating: Benefits and Recommendations of Local Restaurants',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_us_id,),
));

$post_td_post_keep_fit_5_new_apps_and_gadgets_to_boost_your_exercise_techniques_id = td_demo_content::add_post(array(
	'title' => 'Keep Fit: 5 New Apps and Gadgets to Boost your Exercise Techniques',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_us_id,),
));

$post_td_post_how_cameras_have_improved_throughout_the_years_when_recording_events_id = td_demo_content::add_post(array(
	'title' => 'How Cameras Have Improved Throughout the Years when Recording Events',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_us_id,),
));

$post_td_post_renewable_energy_source_affordable_solar_panels_for_home_usage_id = td_demo_content::add_post(array(
	'title' => 'Renewable Energy Source: Affordable Solar Panels for Home Usage',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_tech_id,),
));

$post_td_post_support_your_local_cafes_and_restaurants_by_ordering_online_id = td_demo_content::add_post(array(
	'title' => 'Support Your Local Cafes and Restaurants by Ordering Online',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_tech_id,),
));

$post_td_post_5_ways_that_agriculture_and_farming_has_improved_during_2020_id = td_demo_content::add_post(array(
	'title' => '5 Ways that Agriculture and Farming Has Improved During 2020',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_tech_id,),
));

$post_td_post_create_a_quiet_environment_for_the_schools_online_classes_id = td_demo_content::add_post(array(
	'title' => 'Create a Quiet Environment for the School\'s Online Classes',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_tech_id,),
));

$post_td_post_communicate_efficiently_and_easily_with_the_zoom_app_for_desktops_id = td_demo_content::add_post(array(
	'title' => 'Communicate Efficiently and Easily with the Zoom App For Desktops',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_tech_id,),
));

$post_td_post_protecting_the_children_while_giving_them_access_to_social_events_id = td_demo_content::add_post(array(
	'title' => 'Protecting the Children While Giving them Access to Social Events',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_health_id,),
));

$post_td_post_staying_fit_during_the_pandemic_exercise_at_home_or_jog_outside_id = td_demo_content::add_post(array(
	'title' => 'Staying Fit During the Pandemic: Exercise at Home or Jog Outside',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_health_id,),
));

$post_td_post_10_reasons_why_restaurants_and_pubs_have_closed_down_id = td_demo_content::add_post(array(
	'title' => '10 Reasons Why Restaurants and Pubs Have Closed Down',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_health_id,),
));

$post_td_post_taking_care_of_your_mental_health_is_the_first_step_to_recovery_id = td_demo_content::add_post(array(
	'title' => 'Taking Care of Your Mental Health is the First Step to Recovery',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_health_id,),
));

$post_td_post_how_do_doctors_protect_themselves_with_the_equipment_provided_id = td_demo_content::add_post(array(
	'title' => 'How do Doctors Protect Themselves With the Equipment Provided',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_health_id,),
));

$post_td_post_this_building_can_be_seen_from_space_due_to_its_immense_structure_id = td_demo_content::add_post(array(
	'title' => 'This Building Can Be Seen from Space Due to its Immense Structure',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_fast_news_id,),
));

$post_td_post_protests_across_the_us_against_the_ideas_of_president_trump_id = td_demo_content::add_post(array(
	'title' => 'Protests Across the US Against the Ideas of President Trump',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_fast_news_id,),
));

$post_td_post_what_are_barack_obamas_thoughts_on_the_current_us_leadership_id = td_demo_content::add_post(array(
	'title' => 'What are Barack Obama\'s Thoughts on the Current US Leadership?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_fast_news_id,),
));

$post_td_post_taking_steps_to_creating_a_better_planet_for_future_generations_id = td_demo_content::add_post(array(
	'title' => 'Taking Steps to Creating a Better Planet for Future Generations',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_fast_news_id,),
));

$post_td_post_the_news_today_on_mass_vaccinations_across_the_globe_id = td_demo_content::add_post(array(
	'title' => 'The News Today on Mass Vaccinations Across the Globe',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_fast_news_id,),
));

$post_td_post_get_a_test_before_you_travel_advice_from_doctors_all_over_the_world_id = td_demo_content::add_post(array(
	'title' => 'Get a Test Before you Travel: Advice from Doctors All Over the World',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_bernie_sanders_thoughts_on_the_current_us_travelling_situation_id = td_demo_content::add_post(array(
	'title' => 'Bernie Sanders\' Thoughts on the Current US Travelling Situation',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_what_to_know_when_travelling_abroad_laws_circulation_safety_id = td_demo_content::add_post(array(
	'title' => 'What to Know When Travelling Abroad: Laws, Circulation, Safety',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_this_person_takes_a_photo_in_every_city_theyve_ever_visited_id = td_demo_content::add_post(array(
	'title' => 'This Person Takes a Photo in Every City They\'ve Ever Visited',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_how_you_can_travel_to_other_countries_with_a_vaccine_passport_id = td_demo_content::add_post(array(
	'title' => 'How You Can Travel to Other Countries with a Vaccine Passport',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_travel_id,),
));

$post_td_post_school_year_has_started_is_your_child_ready_for_it_id = td_demo_content::add_post(array(
	'title' => 'School Year Has Started: Is your Child Ready For it?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_style_id,),
));

$post_td_post_how_buying_clothes_from_blm_designated_stores_helps_the_movement_id = td_demo_content::add_post(array(
	'title' => 'How Buying Clothes from BLM Designated Stores Helps the Movement',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_style_id,),
));

$post_td_post_streaming_services_that_bring_your_favorite_teams_live_id = td_demo_content::add_post(array(
	'title' => 'Streaming Services that Bring Your Favorite Teams Live',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_style_id,),
));

$post_td_post_home_deliveries_are_the_go_to_for_online_clothes_stores_id = td_demo_content::add_post(array(
	'title' => 'Home Deliveries Are the Go To for Online Clothes Stores',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_style_id,),
));

$post_td_post_take_precautions_when_shopping_at_huge_malls_to_prevent_viruses_id = td_demo_content::add_post(array(
	'title' => 'Take Precautions When Shopping at Huge Malls to Prevent Viruses',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_style_id,),
));

$post_td_post_how_can_the_congress_help_during_an_economical_crisis_id = td_demo_content::add_post(array(
	'title' => 'How Can the Congress Help During an Economical Crisis?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_science_id,),
));

$post_td_post_taking_a_closer_look_at_the_start_of_the_californian_wildfires_id = td_demo_content::add_post(array(
	'title' => 'Taking a Closer Look at the Start of the Californian Wildfires',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_science_id,),
));

$post_td_post_getting_vaccinated_risks_benefits_overall_analysis_of_ingredients_id = td_demo_content::add_post(array(
	'title' => 'Getting Vaccinated: Risks, Benefits, Overall Analysis of Ingredients',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_science_id,),
));

$post_td_post_how_the_stock_market_plummeted_during_2020_with_gamestop_id = td_demo_content::add_post(array(
	'title' => 'How the Stock Market Plummeted During 2020 with GameStop',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_science_id,),
));

$post_td_post_a_highly_classified_experiment_involving_human_blood_cells_id = td_demo_content::add_post(array(
	'title' => 'A Highly Classified Experiment Involving Human Blood Cells',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_science_id,),
));

$post_td_post_female_hairdresser_from_new_york_won_a_grammy_for_best_dressed_id = td_demo_content::add_post(array(
	'title' => 'Female Hairdresser from New York Won a Grammy for Best Dressed',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_art_id,),
));

$post_td_post_success_with_a_business_idea_combining_handiness_and_art_id = td_demo_content::add_post(array(
	'title' => 'Success with a Business Idea: Combining Handiness and Art',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_art_id,),
));

$post_td_post_this_photographer_took_photos_during_the_californian_fires_id = td_demo_content::add_post(array(
	'title' => 'This Photographer Took Photos During the Californian Fires',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_art_id,),
));

$post_td_post_a_florist_from_downtown_minneapolis_creates_art_with_bouquets_id = td_demo_content::add_post(array(
	'title' => 'A Florist from Downtown Minneapolis Creates Art with Bouquets',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_art_id,),
));

$post_td_post_how_visiting_museums_through_2020_went_is_it_safe_id = td_demo_content::add_post(array(
	'title' => 'How Visiting Museums Through 2020 Went: Is it Safe?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_art_id,),
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
	'title' => 'World',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_world_id,
	'parent_id' => ''
), true);

$menu_item_2_id = td_demo_menus::add_category(array(
	'title' => 'Fast News',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_fast_news_id,
	'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_category(array(
	'title' => 'Health',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_health_id,
	'parent_id' => ''
));

$menu_item_4_id = td_demo_menus::add_category(array(
	'title' => 'Tech',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_tech_id,
	'parent_id' => ''
));

$menu_item_5_id = td_demo_menus::add_mega_menu(array(
	'title' => 'US',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_us_id,
	'parent_id' => ''
), true);


/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/
$template_date_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'The Rimont - Date Template',
	'file' => 'date_cloud_template.txt',
	'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_id);


$template_tag_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'The Rimont - Tag Template',
	'file' => 'tag_cloud_template.txt',
	'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_id);


$template_404_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'The Rimont - 404 Template',
	'file' => '404_cloud_template.txt',
	'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_id);


$template_search_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'The Rimont - Search Template',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_id);


$template_author_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'The Rimont - Author Template',
	'file' => 'author_cloud_template.txt',
	'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_id);


$template_category_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'The Rimont - Category Template',
	'file' => 'cat_cloud_template.txt',
	'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_id);


$template_single_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'The Rimont - Single Template',
	'file' => 'post_cloud_template.txt',
	'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_id);


$template_footer_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'The Rimont - Footer Template',
	'file' => 'footer_cloud_template.txt',
	'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_id);


$template_header_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'The Rimont - Header Template',
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
