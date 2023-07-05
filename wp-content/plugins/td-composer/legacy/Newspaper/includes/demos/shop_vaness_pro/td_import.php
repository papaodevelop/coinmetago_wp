<?php 

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

$cat_everyday_life_id = td_demo_category::add_category(array(
	'category_name' => 'Everyday Life',
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

$cat_food_id = td_demo_category::add_category(array(
	'category_name' => 'Food',
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

$cat_travel_id = td_demo_category::add_category(array(
	'category_name' => 'Travel',
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

$cat_uncategorised_id = td_demo_category::add_category(array(
	'category_name' => 'Uncategorised',
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
$post_td_post_here_are_just_5_reasons_why_eating_kiwi_everyday_is_beneficial_id = td_demo_content::add_post(array(
	'title' => 'Here are Just 5 Reasons Why Eating Kiwi Everyday is Beneficial',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_blog_id,$cat_food_id,),
));

$post_td_post_growing_your_own_plants_while_being_stuck_indoors_suggestions_id = td_demo_content::add_post(array(
	'title' => 'Growing Your Own Plants While Being Stuck Indoors: Suggestions',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_blog_id,$cat_everyday_life_id,),
));

$post_td_post_how_to_turn_an_orange_into_a_delicious_and_refreshing_summer_shake_id = td_demo_content::add_post(array(
	'title' => 'How to Turn an Orange into a Delicious and Refreshing Summer Shake',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_blog_id,$cat_food_id,),
));

$post_td_post_start_the_day_off_right_with_a_fruit_in_the_morning_to_feel_energized_id = td_demo_content::add_post(array(
	'title' => 'Start the Day off Right with a Fruit in the Morning to Feel Energized',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_blog_id,$cat_food_id,),
));

$post_td_post_what_are_the_best_doughnuts_you_can_eat_in_japans_suburbs_id = td_demo_content::add_post(array(
	'title' => 'What Are the Best Doughnuts You Can Eat in Japan\'s Suburbs?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_blog_id,$cat_food_id,),
));

$post_td_post_getting_in_touch_with_nature_how_spring_just_always_makes_me_smile_id = td_demo_content::add_post(array(
	'title' => 'Getting in Touch with Nature: How Spring just Always Makes Me Smile',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_blog_id,$cat_everyday_life_id,),
));

$post_td_post_taking_an_aquatic_photoshoot_in_the_middle_of_the_carribean_waters_id = td_demo_content::add_post(array(
	'title' => 'Taking an Aquatic Photoshoot in the Middle of the Carribean Waters',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_blog_id,$cat_travel_id,),
));

$post_td_post_baking_a_cake_using_only_5_ingredients_recipe_result_and_rating_id = td_demo_content::add_post(array(
	'title' => 'Baking a Cake Using Only 5 Ingredients: Recipe, Result, and Rating',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_blog_id,$cat_food_id,),
));

$post_td_post_taste_testing_the_best_whiskeys_in_the_world_my_personal_opinion_id = td_demo_content::add_post(array(
	'title' => 'Taste-Testing the Best Whiskeys in the World: My Personal Opinion',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_blog_id,$cat_food_id,),
));

$post_td_post_abstract_photography_and_10_reasons_everyone_should_get_into_it_id = td_demo_content::add_post(array(
	'title' => 'Abstract Photography and 10 Reasons Everyone Should Get Into It',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_blog_id,$cat_everyday_life_id,),
));

$post_td_post_spotting_a_wild_fox_out_in_nature_while_hiking_through_the_woods_in_belgium_id = td_demo_content::add_post(array(
	'title' => 'Spotting a Wild Fox out in Nature While Hiking through the Woods in Belgium',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_blog_id,$cat_everyday_life_id,),
));

$post_td_post_how_having_a_supportive_and_healthy_relationship_with_my_sister_helped_me_id = td_demo_content::add_post(array(
	'title' => 'How Having a Supportive and Healthy Relationship with My Sister Helped Me',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_blog_id,$cat_everyday_life_id,),
));

$post_td_post_why_going_to_the_beach_even_during_cloudy_cold_weather_is_amazing_id = td_demo_content::add_post(array(
	'title' => 'Why Going to the Beach Even During Cloudy, Cold Weather is Amazing',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_blog_id,$cat_travel_id,),
));

$post_td_post_taking_care_of_your_house_succulents_while_not_being_at_home_id = td_demo_content::add_post(array(
	'title' => 'Taking Care of your House Succulents While Not Being at Home',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_blog_id,$cat_everyday_life_id,),
));

$post_td_post_new_fashion_looks_i_adopted_as_soon_as_spring_came_into_town_id = td_demo_content::add_post(array(
	'title' => 'New Fashion Looks I Adopted as Soon as Spring Came into Town',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_blog_id,$cat_everyday_life_id,),
));

$post_td_post_top_5_best_small_cafes_in_downtown_london_uk_and_how_i_rate_them_id = td_demo_content::add_post(array(
	'title' => 'Top 5 Best Small Cafes in Downtown London, UK and How I Rate Them',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_blog_id,$cat_travel_id,),
));

$post_td_post_how_the_pandemic_has_impacted_travel_for_me_measures_risks_savings_id = td_demo_content::add_post(array(
	'title' => 'How the Pandemic Has Impacted Travel for Me: Measures, Risks, Savings',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_blog_id,$cat_travel_id,),
));

$post_td_post_apartment_tour_how_clutter_actually_helps_me_stay_organized_id = td_demo_content::add_post(array(
	'title' => 'Apartment Tour: How Clutter Actually Helps Me Stay Organized',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_blog_id,$cat_everyday_life_id,),
));

$post_td_post_getting_lost_in_the_side_streets_of_greece_making_the_best_of_it_id = td_demo_content::add_post(array(
	'title' => 'Getting Lost in the Side Streets of Greece: Making the Best of it!',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_blog_id,$cat_travel_id,),
));

$post_td_post_skiing_resort_in_the_west_of_the_aspen_mountains_america_id = td_demo_content::add_post(array(
	'title' => 'Skiing Resort in the West of the Aspen Mountains America',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_blog_id,$cat_travel_id,),
));

$post_td_post_how_i_grew_a_wild_lilac_tree_in_my_backyard_from_a_small_sapling_id = td_demo_content::add_post(array(
	'title' => 'How I Grew a Wild Lilac Tree in my Backyard From a Small Sapling',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_blog_id,$cat_everyday_life_id,),
));

$post_td_post_riding_the_waves_of_a_sunny_beach_and_learning_to_surf_for_the_first_time_id = td_demo_content::add_post(array(
	'title' => 'Riding the Waves of a Sunny Beach and Learning to Surf for the First Time',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_blog_id,$cat_travel_id,),
));

$post_td_post_catching_the_eye_of_a_wild_sparrow_in_the_desert_of_sahara_id = td_demo_content::add_post(array(
	'title' => 'Catching the Eye of a Wild Sparrow in the Desert of Sahara',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_blog_id,$cat_everyday_life_id,),
));

$post_td_post_a_desert_as_beautiful_as_time_getting_the_best_shot_from_above_id = td_demo_content::add_post(array(
	'title' => 'A Desert as Beautiful as Time - Getting the Best Shot From Above',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_blog_id,$cat_travel_id,),
));

$post_td_post_top_10_spots_to_visit_while_travelling_through_the_streets_of_paris_id = td_demo_content::add_post(array(
	'title' => 'Top 10 Spots to Visit While Travelling Through the Streets of Paris',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_blog_id,$cat_travel_id,),
));


/*  ---------------------------------------------------------------------------- 
	PAGES
*/
$page_shop_id = td_demo_content::add_page(array(
	'title' => 'Shop',
	'file' => 'shop.txt',
));

$page_basket_id = td_demo_content::add_page(array(
	'title' => 'Basket',
	'file' => 'basket.txt',
));

$page_checkout_id = td_demo_content::add_page(array(
	'title' => 'Checkout',
	'file' => 'checkout.txt',
));

$page_my_account_id = td_demo_content::add_page(array(
	'title' => 'My account',
	'file' => 'my_account.txt',
));

$page_homepage_id = td_demo_content::add_page(array(
	'title' => 'Homepage',
	'file' => 'homepage.txt',
	'homepage' => true,
));


/*  ---------------------------------------------------------------------------- 
	PRODUCT CATEGORIES
*/
$p_cat_candy_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Candy',
	'parent_id' => 0,
	'description' => '',
));

$p_cat_confectionery_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Confectionery',
	'parent_id' => $p_cat_candy_id,
	'description' => '',
));

$p_cat_cookies_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Cookies',
	'parent_id' => $p_cat_candy_id,
	'description' => '',
));

$p_cat_gellatin_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Gellatin',
	'parent_id' => $p_cat_candy_id,
	'description' => '',
));

$p_cat_packets_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Packets',
	'parent_id' => $p_cat_candy_id,
	'description' => '',
));


/*  ---------------------------------------------------------------------------- 
	PRODUCT ATTRIBUTES
*/

/*  ---------------------------------------------------------------------------- 
	PRODUCTS
*/
$product_meringues_id = td_demo_content::add_product( array( 
	'title' => 'Meringue',
	'file' => 'product_default.txt',
	'product_sku' => '1568771',
	'product_price' => '1.25',
	'product_price' => '3.5',
	'product_price' => '3.55',
	'product_price' => '4.26',
	'product_image_td_id' => 'td_pic_1',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_candy_id,$p_cat_confectionery_id ),
	'product_tags' => array( 'candy','sweets' ),
	'product_type' => 'variable',
));

$product_cotton_candy_marshmellows_id = td_demo_content::add_product( array( 
	'title' => 'Tiny Marshmellows',
	'file' => 'product_default.txt',
	'product_price' => '4.15',
	'product_image_td_id' => 'td_pic_2',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_candy_id,$p_cat_packets_id ),
	'product_tags' => array( 'candy','sweets' ),
	'product_type' => 'simple',
));

$product_pine_cookies_id = td_demo_content::add_product( array( 
	'title' => 'Pine Cookies',
	'file' => 'product_default.txt',
	'product_price' => '8.45',
	'product_image_td_id' => 'td_pic_3',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_candy_id,$p_cat_packets_id ),
	'product_tags' => array( 'candy','sweets' ),
	'product_type' => 'simple',
));

$product_candy_jellies_id = td_demo_content::add_product( array( 
	'title' => 'Candy Jellies',
	'file' => 'product_default.txt',
	'product_price' => '6.45',
	'product_image_td_id' => 'td_pic_4',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_candy_id,$p_cat_gellatin_id ),
	'product_tags' => array( 'candy','sweets' ),
	'product_type' => 'simple',
));

$product_swirl_lollipops_id = td_demo_content::add_product( array( 
	'title' => 'Swirl Lollipops',
	'file' => 'product_default.txt',
	'product_price' => '4.78',
	'product_image_td_id' => 'td_pic_5',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_candy_id,$p_cat_confectionery_id ),
	'product_tags' => array( 'candy','sweets' ),
	'product_type' => 'simple',
));

$product_lollipops_id = td_demo_content::add_product( array( 
	'title' => 'Lollipops',
	'file' => 'product_default.txt',
	'product_price' => '5.15',
	'product_image_td_id' => 'td_pic_6',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_candy_id,$p_cat_gellatin_id ),
	'product_tags' => array( 'candy','sweets' ),
	'product_type' => 'simple',
));

$product_fruity_candies_id = td_demo_content::add_product( array( 
	'title' => 'Fruity Candies',
	'file' => 'product_default.txt',
	'product_price' => '4.22',
	'product_image_td_id' => 'td_pic_7',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_candy_id,$p_cat_gellatin_id ),
	'product_tags' => array( 'candy','sweets' ),
	'product_type' => 'simple',
));

$product_colorful_cereal_id = td_demo_content::add_product( array( 
	'title' => 'Colorful Cereal',
	'file' => 'product_default.txt',
	'product_price' => '5.67',
	'product_image_td_id' => 'td_pic_8',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_candy_id,$p_cat_confectionery_id ),
	'product_tags' => array( 'candy','sweets' ),
	'product_type' => 'simple',
));

$product_jelly_beans_id = td_demo_content::add_product( array( 
	'title' => 'Jelly Beans',
	'file' => 'product_default.txt',
	'product_price' => '3.55',
	'product_image_td_id' => 'td_pic_9',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_candy_id,$p_cat_gellatin_id ),
	'product_tags' => array( 'candy','sweets' ),
	'product_type' => 'simple',
));

$product_macaroons_id = td_demo_content::add_product( array( 
	'title' => 'Macaroons',
	'file' => 'product_default.txt',
	'product_price' => '4.99',
	'product_image_td_id' => 'td_pic_10',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_candy_id,$p_cat_confectionery_id ),
	'product_tags' => array( 'candy','sweets' ),
	'product_type' => 'simple',
));

$product_marshmellows_and_candies_id = td_demo_content::add_product( array( 
	'title' => 'Marshmellows and Candies',
	'file' => 'product_default.txt',
	'product_price' => '6.45',
	'product_image_td_id' => 'td_pic_1',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_candy_id,$p_cat_cookies_id ),
	'product_tags' => array( 'candy','sweets' ),
	'product_type' => 'simple',
));

$product_yellow_candies_id = td_demo_content::add_product( array( 
	'title' => 'Yellow Candies',
	'file' => 'product_default.txt',
	'product_price' => '4.55',
	'product_image_td_id' => 'td_pic_2',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_candy_id,$p_cat_cookies_id ),
	'product_tags' => array( 'candy','sweets' ),
	'product_type' => 'simple',
));

$product_bucketful_goodies_id = td_demo_content::add_product( array( 
	'title' => 'A Bucketful of Candies',
	'file' => 'product_default.txt',
	'product_price' => '15.99',
	'product_image_td_id' => 'td_pic_3',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_candy_id,$p_cat_gellatin_id ),
	'product_tags' => array( 'candy','sweets' ),
	'product_type' => 'simple',
));

$product_chocolate_candies_id = td_demo_content::add_product( array( 
	'title' => 'Chocolate Candies',
	'file' => 'product_default.txt',
	'product_price' => '2.55',
	'product_image_td_id' => 'td_pic_4',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_candy_id,$p_cat_packets_id ),
	'product_tags' => array( 'candy','sweets' ),
	'product_type' => 'simple',
));

$product_jelly_ice_cream_id = td_demo_content::add_product( array( 
	'title' => 'Jelly Ice Cream',
	'file' => 'product_default.txt',
	'product_price' => '6.45',
	'product_image_td_id' => 'td_pic_5',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_candy_id,$p_cat_confectionery_id ),
	'product_tags' => array( 'candy','sweets' ),
	'product_type' => 'simple',
));

$product_caramels_id = td_demo_content::add_product( array( 
	'title' => 'Sugar Caramels',
	'file' => 'product_default.txt',
	'product_price' => '4.55',
	'product_image_td_id' => 'td_pic_6',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_candy_id,$p_cat_cookies_id ),
	'product_tags' => array( 'candy','sweets' ),
	'product_type' => 'simple',
));

$product_fruit_popsicles_id = td_demo_content::add_product( array( 
	'title' => 'Fruit Popsicles',
	'file' => 'product_default.txt',
	'product_price' => '10.65',
	'product_image_td_id' => 'td_pic_7',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_candy_id,$p_cat_cookies_id ),
	'product_tags' => array( 'candy','sweets' ),
	'product_type' => 'simple',
));

$product_heart_candies_id = td_demo_content::add_product( array( 
	'title' => 'Heart Candies',
	'file' => 'product_default.txt',
	'product_price' => '3.45',
	'product_image_td_id' => 'td_pic_8',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_candy_id,$p_cat_packets_id ),
	'product_tags' => array( 'candy','sweets' ),
	'product_type' => 'simple',
));

$product_cookies_with_chocolate_candies_id = td_demo_content::add_product( array( 
	'title' => 'Cookies with Chocolate Candies',
	'file' => 'product_default.txt',
	'product_price' => '6.89',
	'product_image_td_id' => 'td_pic_9',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_candy_id,$p_cat_cookies_id ),
	'product_tags' => array( 'candy','cookies','sweets' ),
	'product_type' => 'simple',
));

$product_candy_corn_id = td_demo_content::add_product( array( 
	'title' => 'Candy Corn',
	'file' => 'product_default.txt',
	'product_price' => '5',
	'product_image_td_id' => 'td_pic_10',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_candy_id,$p_cat_packets_id ),
	'product_tags' => array( 'candy','corn','orange','sweets' ),
	'product_type' => 'simple',
));


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

$menu_item_1_id = td_demo_menus::add_product_cat(array(
	'title' => 'Candy',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'p_cat_id' => $p_cat_candy_id,
	'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_product_cat(array(
	'title' => 'Cookies',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'p_cat_id' => $p_cat_cookies_id,
	'parent_id' => $menu_item_1_id
));

$menu_item_3_id = td_demo_menus::add_product_cat(array(
	'title' => 'Confectionery',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'p_cat_id' => $p_cat_confectionery_id,
	'parent_id' => $menu_item_1_id
));

$menu_item_4_id = td_demo_menus::add_product_cat(array(
	'title' => 'Gellatin',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'p_cat_id' => $p_cat_gellatin_id,
	'parent_id' => $menu_item_1_id
));

$menu_item_5_id = td_demo_menus::add_product_cat(array(
	'title' => 'Packets',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'p_cat_id' => $p_cat_packets_id,
	'parent_id' => $menu_item_1_id
));

$menu_item_6_id = td_demo_menus::add_mega_menu(array(
	'title' => 'Blog',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_blog_id,
	'parent_id' => ''
), true);


/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/
$template_woo_shop_base_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Vaness PRO Woo Shop Template',
	'file' => 'woo_shop_base_cloud_template.txt',
	'template_type' => 'woo_shop_base',
));

td_demo_misc::update_global_woo_shop_base_template( 'tdb_template_' . $template_woo_shop_base_template_id);


$template_tag_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Vaness PRO Tag Template',
	'file' => 'tag_cloud_template.txt',
	'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_id);


$template_date_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Vaness PRO Date Template',
	'file' => 'date_cloud_template.txt',
	'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_id);


$template_search_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Vaness PRO Search Template',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_id);


$template_404_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Vaness PRO 404 Template',
	'file' => '404_cloud_template.txt',
	'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_id);


$template_woo_search_archive_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Vaness PRO Woo Search Archive Template',
	'file' => 'woo_search_archive_cloud_template.txt',
	'template_type' => 'woo_search_archive',
));

td_demo_misc::update_global_woo_search_archive_template( 'tdb_template_' . $template_woo_search_archive_template_id);


$template_woo_archive_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Vaness PRO Woo Archive Template',
	'file' => 'woo_archive_cloud_template.txt',
	'template_type' => 'woo_archive',
));

td_demo_misc::update_global_woo_archive_template( 'tdb_template_' . $template_woo_archive_template_id);


$template_woo_product_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Vaness PRO Woo Product Template',
	'file' => 'woo_product_cloud_template.txt',
	'template_type' => 'woo_product',
));

td_demo_misc::update_global_woo_product_template( 'tdb_template_' . $template_woo_product_template_id);


$template_category_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Vaness PRO Category Template',
	'file' => 'cat_cloud_template.txt',
	'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_id);


$template_author_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Vaness PRO Author Template',
	'file' => 'author_cloud_template.txt',
	'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_id);


$template_single_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Vaness PRO Single Template',
	'file' => 'post_cloud_template.txt',
	'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_id);


$template_footer_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Vaness PRO Footer Template',
	'file' => 'footer_cloud_template.txt',
	'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_id);


$template_header_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Vaness PRO Header Template',
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
