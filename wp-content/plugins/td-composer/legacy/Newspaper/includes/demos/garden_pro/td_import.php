<?php 

/*  ---------------------------------------------------------------------------- 
	CATEGORIES
*/

$cat_plants_id = td_demo_category::add_category(array(
    'category_name' => 'Plants',
    'parent_id' => 0,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => 'td_pic_1',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_landscape_id = td_demo_category::add_category(array(
    'category_name' => 'Landscape',
    'parent_id' => $cat_plants_id,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => 'td_pic_2',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_parks_id = td_demo_category::add_category(array(
    'category_name' => 'Parks',
    'parent_id' => $cat_plants_id,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => 'td_pic_3',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_produce_id = td_demo_category::add_category(array(
    'category_name' => 'Produce',
    'parent_id' => $cat_plants_id,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => 'td_pic_4',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_trees_id = td_demo_category::add_category(array(
    'category_name' => 'Trees',
    'parent_id' => $cat_plants_id,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => 'td_pic_5',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_flowers_id = td_demo_category::add_category(array(
    'category_name' => 'Flowers',
    'parent_id' => $cat_plants_id,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => 'td_pic_6',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_design_id = td_demo_category::add_category(array(
	'category_name' => 'Design',
	'parent_id' => 0,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => 'td_pic_7',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_food_id = td_demo_category::add_category(array(
    'category_name' => 'Food',
    'parent_id' => 0,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => 'td_pic_8',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_advice_id = td_demo_category::add_category(array(
    'category_name' => 'Advice',
    'parent_id' => 0,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => 'td_pic_9',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_tools_id = td_demo_category::add_category(array(
    'category_name' => 'Tools',
    'parent_id' => 0,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => 'td_pic_10',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_community_id = td_demo_category::add_category(array(
    'category_name' => 'Community',
    'parent_id' => 0,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => 'tdx_pic_1',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

/*  ---------------------------------------------------------------------------- 
	ATTACHMMENTS
*/

/*  ---------------------------------------------------------------------------- 
	POSTS
*/

$post_how_to_water_your_plants_properly_id = td_demo_content::add_post(array(
    'title' => 'How to Water your Plants Properly',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'categories_id_array' => array($cat_advice_id,$cat_community_id,$cat_design_id,$cat_flowers_id,$cat_food_id,$cat_landscape_id,$cat_parks_id,$cat_produce_id,$cat_tools_id,$cat_trees_id,),
));

$post_the_best_seeds_to_plant_in_your_garden_id = td_demo_content::add_post(array(
    'title' => 'The Best Seeds to Plant in Your Garden',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'categories_id_array' => array($cat_advice_id,$cat_community_id,$cat_design_id,$cat_flowers_id,$cat_food_id,$cat_landscape_id,$cat_parks_id,$cat_produce_id,$cat_tools_id,$cat_trees_id,),
));

$post_plants_for_shade_and_wind_by_gardening_expert_id = td_demo_content::add_post(array(
    'title' => 'Plants for Shade and Wind, by Gardening Expert',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'categories_id_array' => array($cat_advice_id,$cat_community_id,$cat_design_id,$cat_flowers_id,$cat_food_id,$cat_landscape_id,$cat_parks_id,$cat_produce_id,$cat_tools_id,$cat_trees_id,),
));

$post_everything_you_need_to_know_about_bees_id = td_demo_content::add_post(array(
    'title' => 'Everything You Need to Know About Bees',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'categories_id_array' => array($cat_advice_id,$cat_community_id,$cat_design_id,$cat_flowers_id,$cat_food_id,$cat_landscape_id,$cat_parks_id,$cat_produce_id,$cat_tools_id,$cat_trees_id,),
));

$post_td_post_use_your_garden_for_amazing_photos_id = td_demo_content::add_post(array(
	'title' => 'Use Your Garden for Amazing Photos',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_advice_id,),
));

$post_td_post_how_to_plant_a_vertical_garden_id = td_demo_content::add_post(array(
	'title' => 'How to Plant a Vertical Garden',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_advice_id,),
));

$post_td_post_grow_perfect_outdoor_succulents_id = td_demo_content::add_post(array(
	'title' => 'Grow Perfect Outdoor Succulents',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_advice_id,),
));

$post_td_post_how_to_give_plants_a_good_clean_id = td_demo_content::add_post(array(
	'title' => 'How to Give Plants a Good Clean',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_advice_id,),
));

$post_td_post_get_to_planting_flowers_outside_id = td_demo_content::add_post(array(
	'title' => 'Get to Planting Flowers Outside',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_advice_id,),
));

$post_td_post_tips_for_maintaining_your_gardening_tools_id = td_demo_content::add_post(array(
	'title' => 'Tips for Maintaining Your Gardening Tools',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_tools_id,),
));

$post_td_post_protective_gardening_gear_and_equipment_id = td_demo_content::add_post(array(
	'title' => 'Protective Gardening Gear and Equipment',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_tools_id,),
));

$post_td_post_watering_cans_for_indoors_and_outdoors_id = td_demo_content::add_post(array(
	'title' => 'Watering Cans for Indoors and Outdoors',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_tools_id,),
));

$post_td_post_the_best_kids_gardening_gloves_id = td_demo_content::add_post(array(
	'title' => 'The Best Kids Gardening Gloves',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_tools_id,),
));

$post_td_post_winter_growing_heated_greenhouses_id = td_demo_content::add_post(array(
	'title' => 'Winter Growing: Heated Greenhouses',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_tools_id,),
));

$post_td_post_why_are_vegetables_less_nutritious_now_id = td_demo_content::add_post(array(
	'title' => 'Why Are Vegetables Less Nutritious Now?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_community_id,),
));

$post_td_post_how_to_stop_wasting_food_starting_today_id = td_demo_content::add_post(array(
	'title' => 'How to Stop Wasting Food Starting Today',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_community_id,),
));

$post_td_post_creating_community_in_a_community_garden_id = td_demo_content::add_post(array(
	'title' => 'Creating Community in a Community Garden',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_community_id,),
));

$post_td_post_growing_the_most_cost_effective_vegetables_2_id = td_demo_content::add_post(array(
	'title' => 'Growing the Most Cost-Effective Vegetables',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_community_id,),
));

$post_td_post_governments_seek_to_ban_pesticides_id = td_demo_content::add_post(array(
	'title' => 'Governments Seek to Ban Pesticides',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_community_id,),
));

$post_td_post_create_a_living_landscape_in_your_garden_id = td_demo_content::add_post(array(
	'title' => 'Create a Living Landscape in Your Garden',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_design_id,),
));

$post_td_post_best_rain_garden_design_you_can_try_id = td_demo_content::add_post(array(
	'title' => 'Best Rain Garden Design You Can Try',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_design_id,),
));

$post_td_post_the_art_of_outdoor_container_growing_id = td_demo_content::add_post(array(
	'title' => 'The Art of Outdoor Container Growing',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_design_id,),
));

$post_td_post_red_hot_peppers_will_enliven_your_garden_id = td_demo_content::add_post(array(
	'title' => 'Red Hot Peppers Will Enliven Your Garden',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_design_id,),
));

$post_td_post_best_foliage_plants_for_summer_pots_id = td_demo_content::add_post(array(
	'title' => 'Best Foliage Plants For Summer Pots',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_design_id,),
));

$post_td_post_food_safety_who_is_paying_attention_id = td_demo_content::add_post(array(
	'title' => 'Food Safety... Who is Paying Attention?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_food_id,),
));

$post_td_post_why_grow_organic_the_taste_is_amazing_id = td_demo_content::add_post(array(
	'title' => 'Why Grow Organic? The Taste is Amazing',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_food_id,),
));

$post_td_post_how_to_pick_and_cook_summer_sweet_corn_id = td_demo_content::add_post(array(
	'title' => 'How to Pick and Cook Summer Sweet Corn',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_food_id,),
));

$post_td_post_cooking_with_kids_nutrition_health_id = td_demo_content::add_post(array(
	'title' => 'Cooking With Kids: Nutrition & Health',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_food_id,),
));

$post_td_post_the_best_plants_for_easy_summer_salads_id = td_demo_content::add_post(array(
	'title' => 'The Best Plants for Easy Summer Salads',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_food_id,),
));

$post_td_post_plan_on_planting_big_leafy_trees_now_id = td_demo_content::add_post(array(
	'title' => 'Plan On Planting Big Leafy Trees Now',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_trees_id,),
));

$post_td_post_taking_care_of_fruit_trees_organically_id = td_demo_content::add_post(array(
	'title' => 'Taking Care of Fruit Trees Organically',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_trees_id,),
));

$post_td_post_planting_a_bare_root_fruit_tree_is_easy_id = td_demo_content::add_post(array(
	'title' => 'Planting A Bare Root Fruit Tree is Easy',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_trees_id,),
));

$post_td_post_grow_a_beautiful_arbor_for_shade_and_fruit_id = td_demo_content::add_post(array(
	'title' => 'Grow a Beautiful Arbor for Shade and Fruit',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_trees_id,),
));

$post_td_post_create_garden_trees_with_this_method_id = td_demo_content::add_post(array(
	'title' => 'Create Garden Trees with this Method',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_trees_id,),
));

$post_td_post_moments_of_wonder_in_an_unusual_landscape_id = td_demo_content::add_post(array(
	'title' => 'Moments of Wonder in an Unusual Landscape',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_landscape_id,),
));

$post_td_post_earth_kind_plants_are_very_low_maintenance_id = td_demo_content::add_post(array(
	'title' => 'Earth-Kind Plants Are Very Low Maintenance',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_landscape_id,),
));

$post_td_post_8_ways_to_garden_in_harmony_with_nature_id = td_demo_content::add_post(array(
	'title' => '8 Ways to Garden in Harmony With Nature',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_landscape_id,),
));

$post_td_post_how_to_prepare_garden_soil_for_planting_id = td_demo_content::add_post(array(
	'title' => 'How to Prepare Garden Soil for Planting',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_landscape_id,),
));

$post_td_post_landscape_plants_for_year_round_beauty_id = td_demo_content::add_post(array(
	'title' => 'Landscape Plants For Year Round Beauty',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_landscape_id,),
));

$post_td_post_keep_your_local_park_landscape_green_id = td_demo_content::add_post(array(
	'title' => 'Keep Your Local Park Landscape Green',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_parks_id,),
));

$post_td_post_sustainable_flowers_join_the_movement_id = td_demo_content::add_post(array(
	'title' => 'Sustainable Flowers: Join the Movement',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_parks_id,),
));

$post_td_post_roses_beautiful_and_delicious_park_assets_id = td_demo_content::add_post(array(
	'title' => 'Roses: Beautiful and Delicious Park Assets',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_parks_id,),
));

$post_td_post_enjoy_delicate_flowers_in_your_park_id = td_demo_content::add_post(array(
	'title' => 'Enjoy Delicate Flowers in Your Park',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_parks_id,),
));

$post_td_post_lawn_care_tools_tips_and_maintenance_id = td_demo_content::add_post(array(
	'title' => 'Lawn Care: Tools, Tips and Maintenance',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_parks_id,),
));

$post_td_post_best_peppers_for_bumper_crop_growing_id = td_demo_content::add_post(array(
	'title' => 'Best Peppers for Bumper Crop Growing',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_produce_id,),
));

$post_td_post_sow_some_oriental_veg_for_a_tasty_change_id = td_demo_content::add_post(array(
	'title' => 'Sow Some Oriental Veg for a Tasty Change',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_produce_id,),
));

$post_td_post_fruit_and_vegetables_in_hanging_baskets_id = td_demo_content::add_post(array(
	'title' => 'Fruit and Vegetables in Hanging Baskets',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_produce_id,),
));

$post_td_post_homegrown_tomatoes_with_a_big_difference_id = td_demo_content::add_post(array(
	'title' => 'Homegrown Tomatoes With a Big Difference',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_produce_id,),
));

$post_td_post_growing_the_most_cost_effective_vegetables_id = td_demo_content::add_post(array(
	'title' => 'Growing the Most Cost-Effective Vegetables',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_produce_id,),
));

$post_td_post_make_room_for_vibrant_verbena_id = td_demo_content::add_post(array(
	'title' => 'Make Room For Vibrant Verbena',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_flowers_id,),
));

$post_td_post_roses_the_heart_of_a_garden_id = td_demo_content::add_post(array(
	'title' => 'Roses: the Heart of a Garden',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_flowers_id,),
));

$post_td_post_verbascum_give_towers_of_flowers_id = td_demo_content::add_post(array(
	'title' => 'Verbascum Give Towers of Flowers',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_flowers_id,),
));

$post_td_post_salvias_keep_on_producing_flowers_id = td_demo_content::add_post(array(
	'title' => 'Salvias Keep On Producing Flowers',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_flowers_id,),
));

$post_td_post_best_summer_flowering_shrubs_id = td_demo_content::add_post(array(
	'title' => 'Best Summer-Flowering Shrubs',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_flowers_id,),
));


/*  ---------------------------------------------------------------------------- 
	MENUS
*/
$menu_td_demo_header_menu_id = td_demo_menus::create_menu('td-demo-header-menu', ''); 


/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/
$template_header_template_main_garden_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Header Template Main – Garden PRO',
    'file' => 'header_cloud_template_main.txt',
    'template_type' => 'header',
));

update_post_meta( $template_header_template_main_garden_pro_id, 'header_mobile_menu_id', $menu_td_demo_header_menu_id);

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_main_garden_pro_id);


$template_header_template_overlay_garden_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Header Template Overlay - Garden PRO',
    'file' => 'header_cloud_template.txt',
    'template_type' => 'header',
));

update_post_meta( $template_header_template_overlay_garden_pro_id, 'header_mobile_menu_id', $menu_td_demo_header_menu_id);


$template_footer_garden_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Footer - Garden PRO',
    'file' => 'footer_cloud_template.txt',
    'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_garden_pro_id);


$template_category_template_garden_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Category Template - Garden PRO',
    'file' => 'cat_cloud_template.txt',
    'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_garden_pro_id);


$template_single_post_template_garden_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Single Post Template - Garden PRO',
    'file' => 'post_cloud_template.txt',
    'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_post_template_garden_pro_id);


$template_search_template_garden_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Search Template - Garden PRO',
    'file' => 'search_cloud_template.txt',
    'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_garden_pro_id);


$template_author_template_garden_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Author Template - Garden PRO',
    'file' => 'author_cloud_template.txt',
    'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_garden_pro_id);


$template_404_template_garden_pro_id = td_demo_content::add_cloud_template(array(
	'title' => '404 Template - Garden PRO',
	'file' => '404_cloud_template.txt',
	'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_garden_pro_id);


$template_date_template_garden_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Date Template - Garden PRO',
	'file' => 'date_cloud_template.txt',
	'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_garden_pro_id);


$template_tag_template_garden_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Tag Template - Garden PRO',
	'file' => 'tag_cloud_template.txt',
	'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_garden_pro_id);


/*  ----------------------------------------------------------------------------
	PAGES
*/
$page_home_id = td_demo_content::add_page(array(
    'title' => 'Home',
    'file' => 'home.txt',
    'homepage' => true,
    'header_template_id' => $template_header_template_overlay_garden_pro_id,
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
    'title' => 'Plants',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_plants_id,
    'parent_id' => ''
), true);

$menu_item_2_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Design',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_design_id,
    'parent_id' => ''
), true);

$menu_item_3_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Food',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_food_id,
    'parent_id' => ''
), true);

$menu_item_4_id = td_demo_menus::add_link(array(
    'title' => 'More',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_5_id = td_demo_menus::add_category(array(
    'title' => 'Advice',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_advice_id,
    'parent_id' => $menu_item_4_id
));

$menu_item_6_id = td_demo_menus::add_category(array(
    'title' => 'Tools',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_tools_id,
    'parent_id' => $menu_item_4_id
));

$menu_item_7_id = td_demo_menus::add_category(array(
    'title' => 'Community',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_community_id,
    'parent_id' => $menu_item_4_id
));


/*  ---------------------------------------------------------------------------- 
	GENERAL SETTINGS
*/
td_demo_misc::update_background('', false);

td_demo_misc::update_background_mobile('tdx_pic_3');

td_demo_misc::update_background_login('');

td_demo_misc::update_background_header('');

td_demo_misc::update_background_footer('');

td_demo_misc::update_footer_text('');

td_demo_misc::update_logo(array('normal' => '','retina' => '','mobile' => '',));

td_demo_misc::update_footer_logo(array('normal' => '','retina' => '',));

td_demo_misc::add_social_buttons(array());

$generated_css = td_css_generator();if (function_exists('tdsp_css_generator')) { $generated_css .= tdsp_css_generator(); }td_util::update_option('tds_user_compile_css', $generated_css);
