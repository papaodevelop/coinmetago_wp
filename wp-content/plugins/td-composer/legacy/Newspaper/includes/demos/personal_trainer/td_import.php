<?php 

/*  ---------------------------------------------------------------------------- 
	TDS LOCKERS
*/
// add post meta for default locker
td_demo_content::add_locker_meta( array(
	'tds_locker_id' => (int) get_option( 'tds_default_locker_id' ),
	'tds_locker_meta' => array(
			'tds_locker_settings' => array(
				'tds_title' => 'This Content is for Subscribers Only',
				'tds_message' => 'Please enter your email to get full access!',
				'tds_input_placeholder' => 'Email address',
				'tds_submit_btn_text' => 'Subscribe to unlock',
				'tds_after_btn_text' => 'Your email address is 100% safe from spam!',
				'tds_pp_msg' => 'I consent to processing of my data according<br>to the <a href=\"#\">Terms of Use</a> & <a href=\"#\">Privacy Policy</a>',
			),
			'tds_locker_styles' => array(
				'tds_title_color' => '#0a0000',
				'tds_message_color' => '#000000',
				'tds_submit_btn_bg_color' => '#000000',
				'tds_general_font_family' => '653',
				'tds_title_font_family' => '373',
				'tds_title_font_size' => '24',
				'tds_message_font_size' => '18',
				'tds_message_font_weight' => '600',
				'tds_input_font_size' => '16',
				'tds_submit_btn_text_font_weight' => '600',
				'tds_submit_btn_text_font_transform' => 'uppercase',
				'tds_submit_btn_text_font_spacing' => '1',
				'tds_after_btn_text_font_size' => '14',
				'tds_pp_msg_font_size' => '13',
				'tds_pp_msg_font_line_height' => '1.5',
			),
		)
	)
);


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

$cat_cardio_id = td_demo_category::add_category(array(
	'category_name' => 'Cardio',
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

$cat_health_id = td_demo_category::add_category(array(
	'category_name' => 'Health',
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

$cat_lifestyle_id = td_demo_category::add_category(array(
	'category_name' => 'Lifestyle',
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

$cat_motivation_id = td_demo_category::add_category(array(
	'category_name' => 'Motivation',
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

$cat_nutrition_id = td_demo_category::add_category(array(
	'category_name' => 'Nutrition',
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

$cat_strength_id = td_demo_category::add_category(array(
	'category_name' => 'Strength',
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

$cat_stretching_id = td_demo_category::add_category(array(
	'category_name' => 'Stretching',
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

$cat_uncategorized_id = td_demo_category::add_category(array(
	'category_name' => 'Uncategorized',
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

$cat_weight_loss_id = td_demo_category::add_category(array(
	'category_name' => 'Weight Loss',
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
	POSTS
*/

$post_style_spy_fashion_model_goes_casual_in_cargo_and_plaid_id = td_demo_content::add_post(array(
    'title' => 'Style Spy: Fashion Model Goes Casual in Cargo and Plaid',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'categories_id_array' => array($cat_cardio_id,$cat_health_id,$cat_lifestyle_id,$cat_motivation_id,$cat_nutrition_id,$cat_strength_id,$cat_stretching_id,$cat_weight_loss_id,),
));

$post_the_ultimate_fruit_and_milk_candy_id = td_demo_content::add_post(array(
    'title' => 'The Ultimate Fruit and Milk Candy',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'categories_id_array' => array($cat_cardio_id,$cat_health_id,$cat_lifestyle_id,$cat_motivation_id,$cat_nutrition_id,$cat_strength_id,$cat_stretching_id,$cat_weight_loss_id,),
));

$post_weekly_window_shop_amazing_bathing_suit_by_versace_id = td_demo_content::add_post(array(
    'title' => 'Weekly Window Shop: Amazing Bathing Suit by Versace',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'categories_id_array' => array($cat_cardio_id,$cat_health_id,$cat_lifestyle_id,$cat_motivation_id,$cat_nutrition_id,$cat_strength_id,$cat_stretching_id,$cat_weight_loss_id,),
));

$post_motivation_monday_only_3_days_left_of_summer_id = td_demo_content::add_post(array(
    'title' => 'Motivation Monday: Only 3 Days Left of Summer',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'categories_id_array' => array($cat_cardio_id,$cat_health_id,$cat_lifestyle_id,$cat_motivation_id,$cat_nutrition_id,$cat_strength_id,$cat_stretching_id,$cat_weight_loss_id,),
));

$post_10_fabulous_couple_outfits_to_wear_this_season_id = td_demo_content::add_post(array(
    'title' => '10 Fabulous Couple Outfits to Wear This Season',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'categories_id_array' => array($cat_cardio_id,$cat_health_id,$cat_lifestyle_id,$cat_motivation_id,$cat_nutrition_id,$cat_strength_id,$cat_stretching_id,$cat_weight_loss_id,),
));

$post_td_post_study_daily_workouts_help_you_cope_better_with_stress_id = td_demo_content::add_post(array(
	'title' => 'Study: Daily Workouts Help you Cope Better with Stress',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_lifestyle_id,),
));

$post_td_post_decide_to_be_successful_in_bodybuilding_and_in_life_id = td_demo_content::add_post(array(
	'title' => 'Decide to be Successful in Bodybuilding and in Life',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_lifestyle_id,),
));

$post_td_post_how_physical_exercises_make_your_brain_work_better_id = td_demo_content::add_post(array(
	'title' => 'How Physical Exercises Make your Brain Work Better',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_lifestyle_id,),
));

$post_td_post_transform_your_weight_loss_routine_into_a_lifestyle_id = td_demo_content::add_post(array(
	'title' => 'Transform your Weight Loss Routine into a Lifestyle',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_lifestyle_id,),
));

$post_td_post_excessive_excersise_could_do_you_a_lot_of_damage_id = td_demo_content::add_post(array(
	'title' => 'Excessive Excersise Could Do You a Lot of Damage',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_lifestyle_id,),
));

$post_td_post_15_perfect_meals_for_your_weight_lose_diet_plan_id = td_demo_content::add_post(array(
	'title' => '15 Perfect Meals for Your Weight Lose Diet Plan',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_nutrition_id,),
));

$post_td_post_nutrition_rules_to_get_stronger_and_build_muscle_id = td_demo_content::add_post(array(
	'title' => 'Nutrition Rules to Get Stronger and Build Muscle',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_nutrition_id,),
));

$post_td_post_15_simple_diets_and_fitness_tips_you_should_master_id = td_demo_content::add_post(array(
	'title' => '15 Simple Diets and Fitness Tips you Should Master',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_nutrition_id,),
));

$post_td_post_10_ways_to_get_more_fruits_and_veggies_in_your_diet_id = td_demo_content::add_post(array(
	'title' => '10 Ways to Get More Fruits and Veggies in Your Diet',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_nutrition_id,),
));

$post_td_post_foods_that_are_rich_in_antioxidants_for_healthy_aging_id = td_demo_content::add_post(array(
	'title' => 'Foods that Are Rich in Antioxidants for Healthy Aging',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_nutrition_id,),
));

$post_td_post_what_does_cardio_do_for_your_hearts_health_id = td_demo_content::add_post(array(
	'title' => 'What Does Cardio Do for Your Heart\'s Health?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_health_id,),
));

$post_td_post_massive_health_benefits_in_long_walking_routines_id = td_demo_content::add_post(array(
	'title' => 'Massive Health Benefits in Long Walking Routines',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_health_id,),
));

$post_td_post_how_strength_training_improves_happiness_and_health_id = td_demo_content::add_post(array(
	'title' => 'How Strength Training Improves Happiness and Health',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_health_id,),
));

$post_td_post_10_essential_rules_to_help_you_have_great_health_id = td_demo_content::add_post(array(
	'title' => '10 Essential Rules to Help You Have Great Health',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_health_id,),
));

$post_td_post_how_to_prevent_arthritis_in_10_different_ways_id = td_demo_content::add_post(array(
	'title' => 'How to Prevent Arthritis in 10 Different Ways',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_health_id,),
));

$post_td_post_9_things_to_expect_from_your_weight_loss_journey_id = td_demo_content::add_post(array(
	'title' => '9 Things to Expect from Your Weight-Loss Journey',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_weight_loss_id,),
));

$post_td_post_the_workout_that_burns_more_calories_than_running_id = td_demo_content::add_post(array(
	'title' => 'The Workout That Burns More Calories Than Running',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_weight_loss_id,),
));

$post_td_post_how_much_cardio_do_you_need_to_burn_1_kg_of_fat_id = td_demo_content::add_post(array(
	'title' => 'How Much Cardio do you Need to Burn 1 kg of Fat?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_weight_loss_id,),
));

$post_td_post_how_many_calories_does_crossfit_really_burn_id = td_demo_content::add_post(array(
	'title' => 'How Many Calories Does CrossFit Really Burn?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_weight_loss_id,),
));

$post_td_post_lose_some_weight_working_these_dumbbell_excersises_id = td_demo_content::add_post(array(
	'title' => 'Lose Some Weight Working These Dumbbell Excersises',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_weight_loss_id,),
));

$post_td_post_increase_your_endurance_through_the_pilates_method_id = td_demo_content::add_post(array(
	'title' => 'Increase your Endurance Through the Pilates Method',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_stretching_id,),
));

$post_td_post_three_easy_moves_you_should_do_for_a_better_workout_id = td_demo_content::add_post(array(
	'title' => 'Three Easy Moves You Should Do for a Better Workout',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_stretching_id,),
));

$post_td_post_12_classic_pilates_moves_you_should_try_right_now_id = td_demo_content::add_post(array(
	'title' => '12 Classic Pilates Moves You Should Try Right Now',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_stretching_id,),
));

$post_td_post_9_things_you_need_to_know_about_muscle_soreness_id = td_demo_content::add_post(array(
	'title' => '9 Things You Need to Know About Muscle Soreness',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_stretching_id,),
));

$post_td_post_discover_these_amazing_benefits_of_stretching_id = td_demo_content::add_post(array(
	'title' => 'Discover these Amazing Benefits of Stretching',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_stretching_id,),
));

$post_td_post_awesome_exercises_for_building_triceps_and_biceps_id = td_demo_content::add_post(array(
	'title' => 'Awesome Exercises for Building Triceps and Biceps',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_strength_id,),
));

$post_td_post_try_this_4_series_complete_upper_body_workout_id = td_demo_content::add_post(array(
	'title' => 'Try this 4 Series Complete Upper-Body Workout',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_strength_id,),
));

$post_td_post_press_excersises_for_bigger_and_strong_shoulders_id = td_demo_content::add_post(array(
	'title' => 'Press Excersises for Bigger and Strong Shoulders',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_strength_id,),
));

$post_td_post_the_ultimate_exercises_to_improve_back_muscles_id = td_demo_content::add_post(array(
	'title' => 'The Ultimate Exercises to Improve Back Muscles',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_strength_id,),
));

$post_td_post_best_exercises_to_build_a_big_and_defined_chest_id = td_demo_content::add_post(array(
	'title' => 'Best Exercises to Build a Big and Defined Chest',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_strength_id,),
));

$post_td_post_awesome_motivation_routines_for_your_breakfast_id = td_demo_content::add_post(array(
	'title' => 'Awesome Motivation Routines for Your Breakfast',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_motivation_id,),
));

$post_td_post_motivational_songs_to_have_a_successful_workout_id = td_demo_content::add_post(array(
	'title' => 'Motivational Songs to Have a Successful Workout',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_motivation_id,),
));

$post_td_post_few_helpful_ideas_to_improve_your_motivation_id = td_demo_content::add_post(array(
	'title' => 'Few Helpful Ideas to Improve Your Motivation',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_motivation_id,),
));

$post_td_post_perfect_morning_workouts_for_a_healthy_mind_id = td_demo_content::add_post(array(
	'title' => 'Perfect Morning Workouts for a Healthy Mind',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_motivation_id,),
));

$post_td_post_few_smart_ways_to_motivate_yourself_to_work_out_id = td_demo_content::add_post(array(
	'title' => 'Few Smart Ways to Motivate Yourself to Work Out',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_motivation_id,),
));

$post_td_post_no_excuse_cardio_pump_workout_for_a_healthy_body_id = td_demo_content::add_post(array(
	'title' => 'No Excuse: Cardio Pump Workout for a Healthy Body',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_cardio_id,),
));

$post_td_post_how_to_burn_calories_with_simple_home_exercises_id = td_demo_content::add_post(array(
	'title' => 'How to Burn Calories with Simple Home Exercises',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_cardio_id,),
));

$post_td_post_10_summer_sports_that_help_torch_serious_calories_id = td_demo_content::add_post(array(
	'title' => '10 Summer Sports That Help Torch Serious Calories',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_cardio_id,),
));

$post_td_post_5_swimming_routines_to_help_you_burn_calories_fast_id = td_demo_content::add_post(array(
	'title' => '5 Swimming Routines to Help you Burn Calories Fast',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_cardio_id,),
));

$post_td_post_do_thid_10_minutes_workout_for_toned_abs_and_legs_id = td_demo_content::add_post(array(
	'title' => 'Do thid 10 Minutes Workout for Toned Abs and Legs',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_cardio_id,),
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
$template_header_template_personal_trainer_id = td_demo_content::add_cloud_template(array(
    'title' => 'Header Template - Personal Trainer',
    'file' => 'header_cloud_template.txt',
    'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_personal_trainer_id);


update_post_meta( $template_header_template_personal_trainer_id, 'header_mobile_menu_id', $menu_td_demo_header_menu_id);


$template_footer_personal_trainer_id = td_demo_content::add_cloud_template(array(
    'title' => 'Footer - Personal Trainer',
    'file' => 'footer_cloud_template.txt',
    'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_personal_trainer_id);


$template_author_template_personal_trainer_id = td_demo_content::add_cloud_template(array(
	'title' => 'Author Template - Personal Trainer',
	'file' => 'author_cloud_template.txt',
	'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_personal_trainer_id);


$template_date_template_personal_trainer_id = td_demo_content::add_cloud_template(array(
	'title' => 'Date Template - Personal Trainer',
	'file' => 'date_cloud_template.txt',
	'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_personal_trainer_id);


$template_tag_template_personal_trainer_id = td_demo_content::add_cloud_template(array(
	'title' => 'Tag Template - Personal Trainer',
	'file' => 'tag_cloud_template.txt',
	'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_personal_trainer_id);


$template_search_template_personal_trainer_id = td_demo_content::add_cloud_template(array(
	'title' => 'Search Template - Personal Trainer',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_personal_trainer_id);


$template_single_post_template_personal_trainer_id = td_demo_content::add_cloud_template(array(
	'title' => 'Single Post Template - Personal Trainer',
	'file' => 'post_cloud_template.txt',
	'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_post_template_personal_trainer_id);


$template_category_template_personal_trainer_id = td_demo_content::add_cloud_template(array(
	'title' => 'Category Template - Personal Trainer',
	'file' => 'cat_cloud_template.txt',
	'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_personal_trainer_id);


$template_404_template_personal_trainer_id = td_demo_content::add_cloud_template(array(
	'title' => '404 Template - Personal Trainer',
	'file' => '404_cloud_template.txt',
	'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_personal_trainer_id);


/*  ----------------------------------------------------------------------------
	PAGES
*/
$page_contact_id = td_demo_content::add_page(array(
    'title' => 'Contact',
    'file' => 'contact.txt',
));

$page_programs_id = td_demo_content::add_page(array(
    'title' => 'Programs',
    'file' => 'programs.txt',
));

$page_results_id = td_demo_content::add_page(array(
    'title' => 'Results',
    'file' => 'results.txt',
));

$page_about_id = td_demo_content::add_page(array(
    'title' => 'About',
    'file' => 'about.txt',
));

$page_home_id = td_demo_content::add_page(array(
    'title' => 'Home',
    'file' => 'home.txt',
    'homepage' => true,
));


/*  ----------------------------------------------------------------------------
	MENUS ITEMS CUSTOM
*/
$menu_item_0_id = td_demo_menus::add_page(array(
    'title' => 'About',
    'add_to_menu_id' => $menu_td_demo_custom_menu_id,
    'page_id' => $page_about_id,
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_page(array(
    'title' => 'Programs',
    'add_to_menu_id' => $menu_td_demo_custom_menu_id,
    'page_id' => $page_programs_id,
    'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_page(array(
    'title' => 'Results',
    'add_to_menu_id' => $menu_td_demo_custom_menu_id,
    'page_id' => $page_results_id,
    'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_page(array(
    'title' => 'Contact',
    'add_to_menu_id' => $menu_td_demo_custom_menu_id,
    'page_id' => $page_contact_id,
    'parent_id' => ''
));


/*  ----------------------------------------------------------------------------
	MENUS ITEMS HEADER
*/
$menu_item_0_id = td_demo_menus::add_page(array(
    'title' => 'Home',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'page_id' => $page_home_id,
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_page(array(
    'title' => 'About',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'page_id' => $page_about_id,
    'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_page(array(
    'title' => 'Results',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'page_id' => $page_results_id,
    'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_page(array(
    'title' => 'Programs',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'page_id' => $page_programs_id,
    'parent_id' => ''
));

$menu_item_4_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Blog',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_blog_id,
    'parent_id' => ''
), true);

$menu_item_5_id = td_demo_menus::add_page(array(
    'title' => 'Contact',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'page_id' => $page_contact_id,
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
