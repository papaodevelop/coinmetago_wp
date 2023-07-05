<?php


/*  ----------------------------------------------------------------------------
	MENUS
*/
$menu_td_demo_header_menu_id = td_demo_menus::create_menu('td-demo-header-menu', '');

$menu_td_demo_top_menu_id = td_demo_menus::create_menu('td-demo-top-menu', '');


/*  ----------------------------------------------------------------------------
	CLOUD TEMPLATES
*/
$template_header_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Header Template',
    'file' => 'header_cloud_template.txt',
    'template_type' => 'header',
));
td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_id);

$template_header_template_no_stretch_id = td_demo_content::add_cloud_template(array(
    'title' => 'Header Template - No Stretch',
    'file' => 'header_no_stretch_cloud_template.txt',
    'template_type' => 'header',
));


$template_footer_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Footer Template',
    'file' => 'footer_cloud_template.txt',
    'template_type' => 'footer',
));
td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_id);

$template_footer_template_no_stretch_id = td_demo_content::add_cloud_template(array(
    'title' => 'Footer Template - No Stretch',
    'file' => 'footer_no_stretch_cloud_template.txt',
    'template_type' => 'footer',
));


$template_single_post_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Single Post Template',
    'file' => 'post_cloud_template.txt',
    'template_type' => 'single',
));
td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_post_template_id);

$template_single_post_template_featured_image_in_background_id = td_demo_content::add_cloud_template(array(
    'title' => 'Single Post Template - Featured Image In Background',
    'file' => 'post_featured_img_in_bg_cloud_template.txt',
    'template_type' => 'single',
    'header_template_id' => $template_header_template_no_stretch_id,
    'footer_template_id' => $template_footer_template_no_stretch_id
));


$template_category_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Category Template',
    'file' => 'cat_cloud_template.txt',
    'template_type' => 'category',
));
td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_id);


$template_date_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Date Template',
    'file' => 'date_cloud_template.txt',
    'template_type' => 'date',
));
td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_id);


$template_tag_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Tag Template',
    'file' => 'tag_cloud_template.txt',
    'template_type' => 'tag',
));
td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_id);


$template_author_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Author Template',
    'file' => 'author_cloud_template.txt',
    'template_type' => 'author',
));
td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_id);


$template_search_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Search Template',
    'file' => 'search_cloud_template.txt',
    'template_type' => 'search',
));
td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_id);


$template_404_template_id = td_demo_content::add_cloud_template(array(
    'title' => '404 Template',
    'file' => '404_cloud_template.txt',
    'template_type' => '404',
));
td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_id);


update_post_meta( $template_header_template_id, 'header_mobile_menu_id', $menu_td_demo_header_menu_id);



/*  ----------------------------------------------------------------------------
	TDS LOCKERS
*/

/*  ----------------------------------------------------------------------------
	CATEGORIES
*/
$cat_lifestyle_id = td_demo_category::add_category(array(
    'category_name' => 'Lifestyle',
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

$cat_tagdiv_exercises_id = td_demo_category::add_category(array(
    'category_name' => 'Exercises',
    'parent_id' => $cat_lifestyle_id,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => '',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_tagdiv_food_id = td_demo_category::add_category(array(
    'category_name' => 'Food',
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

$cat_tagdiv_home_decor_id = td_demo_category::add_category(array(
    'category_name' => 'Home Decor',
    'parent_id' => $cat_lifestyle_id,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => '',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_tagdiv_inspiration_id = td_demo_category::add_category(array(
    'category_name' => 'Inspiration',
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

$cat_tagdiv_leisure_id = td_demo_category::add_category(array(
    'category_name' => 'Leisure',
    'parent_id' => $cat_lifestyle_id,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => '',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_tagdiv_photography_id = td_demo_category::add_category(array(
    'category_name' => 'Photography',
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

$cat_tagdiv_travel_id = td_demo_category::add_category(array(
    'category_name' => 'Travel',
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


/*  ----------------------------------------------------------------------------
	ATTACHMENTS
*/

/*  ----------------------------------------------------------------------------
	POSTS
*/
$post_td_post_love_your_imperfections_id = td_demo_content::add_post(array(
    'title' => 'Love Your Imperfections',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'categories_id_array' => array($cat_tagdiv_inspiration_id,),
));

$post_i_enjoy_my_hobbies_photography_id = td_demo_content::add_post(array(
    'title' => 'I Enjoy My Hobbies, My Photos',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'categories_id_array' => array($cat_tagdiv_photography_id,),
));

$post_td_post_back_on_the_road_id = td_demo_content::add_post(array(
    'title' => 'Back On The Road',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'categories_id_array' => array($cat_tagdiv_travel_id,),
    'template' => 'tdb_template_' . $template_single_post_template_featured_image_in_background_id,
));

$post_simple_things_makes_me_happy_id = td_demo_content::add_post(array(
    'title' => 'Simple Things Makes Me Happy',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'categories_id_array' => array($cat_tagdiv_leisure_id,),
));

$post_td_post_every_colour_please_id = td_demo_content::add_post(array(
    'title' => 'Every Colour Please',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'categories_id_array' => array($cat_tagdiv_photography_id,),
));

$post_td_post_where_the_magic_happens_id = td_demo_content::add_post(array(
    'title' => 'Where The Magic Happens',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'categories_id_array' => array($cat_tagdiv_home_decor_id,),
    'template' => 'tdb_template_' . $template_single_post_template_featured_image_in_background_id,
));

$post_td_post_my_favourite_books_id = td_demo_content::add_post(array(
    'title' => 'My Favourite Books',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'categories_id_array' => array($cat_tagdiv_leisure_id,),
));

$post_td_post_things_i_like_my_favourites_id = td_demo_content::add_post(array(
    'title' => 'Things I Like - My Favourites',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'categories_id_array' => array($cat_tagdiv_inspiration_id,),
));

$post_td_post_te_glamour_gift_guide_id = td_demo_content::add_post(array(
    'title' => 'The Glamour Gift Guide',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'categories_id_array' => array($cat_tagdiv_photography_id,),
));

$post_best_ingredients_to_have_for_cooking_id = td_demo_content::add_post(array(
    'title' => 'Best Ingredients To Have For Cooking',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'categories_id_array' => array($cat_tagdiv_food_id,),
));

$post_reading_in_the_morning_id = td_demo_content::add_post(array(
    'title' => 'Reading In The Morning?',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'categories_id_array' => array($cat_tagdiv_leisure_id,),
    'template' => 'tdb_template_' . $template_single_post_template_featured_image_in_background_id,
));

$post_td_post_back_to_basics_id = td_demo_content::add_post(array(
    'title' => 'Back To Basics',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'categories_id_array' => array($cat_tagdiv_leisure_id,),
));

$post_td_post_postcard_from_cape_town_id = td_demo_content::add_post(array(
    'title' => 'Postcard From Cape Town',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'categories_id_array' => array($cat_tagdiv_travel_id,),
));

$post_relaxation_is_a_must_for_me_id = td_demo_content::add_post(array(
    'title' => 'Relaxation Is A Must For Me',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'categories_id_array' => array($cat_tagdiv_leisure_id,),
));

$post_td_post_thoughts_of_home_id = td_demo_content::add_post(array(
    'title' => 'Thoughts Of Home',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'categories_id_array' => array($cat_tagdiv_home_decor_id,),
));

$post_be_free_and_enjoy_the_travel_id = td_demo_content::add_post(array(
    'title' => 'Be Free And Enjoy The Travel',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'categories_id_array' => array($cat_tagdiv_travel_id,),
    'template' => 'tdb_template_' . $template_single_post_template_featured_image_in_background_id,
));

$post_ive_learned_that_love_has_many_shapes_id = td_demo_content::add_post(array(
    'title' => 'I\'ve Learned That Love Has Many Shapes',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'categories_id_array' => array($cat_tagdiv_inspiration_id,),
));

$post_td_post_wine_the_perfect_combination_id = td_demo_content::add_post(array(
    'title' => 'Wine - The Perfect Combination',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'categories_id_array' => array($cat_tagdiv_food_id,),
    'template' => 'tdb_template_' . $template_single_post_template_featured_image_in_background_id,
));

$post_td_post_inside_the_studio_id = td_demo_content::add_post(array(
    'title' => 'Inside The Studio',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'categories_id_array' => array($cat_tagdiv_photography_id,),
));

$post_corn_with_coffee_is_one_of_my_favorites_id = td_demo_content::add_post(array(
    'title' => 'Corn With Coffee Is One Of My Favorites',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'categories_id_array' => array($cat_tagdiv_food_id,),
));

$post_td_post_the_simple_life_id = td_demo_content::add_post(array(
    'title' => 'The Simple Life',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'categories_id_array' => array($cat_tagdiv_home_decor_id,),
));

$post_td_post_some_sunny_morning_id = td_demo_content::add_post(array(
    'title' => 'Some Sunny Morning',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'categories_id_array' => array($cat_tagdiv_leisure_id,),
));

$post_enjoy_every_morning_on_the_beach_id = td_demo_content::add_post(array(
    'title' => 'Enjoy Every Morning On The Beach',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'categories_id_array' => array($cat_tagdiv_leisure_id,),
));

$post_stretching_is_very_important_id = td_demo_content::add_post(array(
    'title' => 'Stretching Is Very Important',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'categories_id_array' => array($cat_tagdiv_exercises_id,),
));

$post_be_positive_and_enjoy_every_ride_id = td_demo_content::add_post(array(
    'title' => 'Be Positive And Enjoy Every Ride',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'categories_id_array' => array($cat_tagdiv_travel_id,),
    'template' => 'tdb_template_' . $template_single_post_template_featured_image_in_background_id,
));

$post_td_post_spring_accessory_with_personality_id = td_demo_content::add_post(array(
    'title' => 'Spring Accessory With Personality',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'categories_id_array' => array($cat_tagdiv_inspiration_id,),
));

$post_td_post_trends_to_wear_all_summer_long_id = td_demo_content::add_post(array(
    'title' => 'Trends to Wear All Summer Long',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'categories_id_array' => array($cat_tagdiv_inspiration_id,),
));

$post_td_post_morning_essentials_tips_id = td_demo_content::add_post(array(
    'title' => 'Morning Essentials Tips',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'categories_id_array' => array($cat_tagdiv_inspiration_id,),
));

$post_td_post_weekend_mode_relaxing_id = td_demo_content::add_post(array(
    'title' => 'Weekend Mode - Relaxing',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'categories_id_array' => array($cat_tagdiv_inspiration_id,),
    'template' => 'tdb_template_' . $template_single_post_template_featured_image_in_background_id,
));

$post_td_post_from_morning_to_night_id = td_demo_content::add_post(array(
    'title' => 'From Morning To Night',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'categories_id_array' => array($cat_tagdiv_photography_id,),
));

$post_td_post_one_day_in_venice_id = td_demo_content::add_post(array(
    'title' => 'One Day In Venice',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'categories_id_array' => array($cat_tagdiv_travel_id,),
));

$post_td_post_amsterdam_city_guide_id = td_demo_content::add_post(array(
    'title' => 'Amsterdam City Guide',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'categories_id_array' => array($cat_tagdiv_travel_id,),
));

$post_td_post_this_year_adventure_calendar_id = td_demo_content::add_post(array(
    'title' => 'This Year Adventure Calendar',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'categories_id_array' => array($cat_tagdiv_travel_id,),
    'template' => 'tdb_template_' . $template_single_post_template_featured_image_in_background_id,
));

$post_td_post_banana_pancakes_id = td_demo_content::add_post(array(
    'title' => 'Banana Pancakes Are Just Delicious',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'categories_id_array' => array($cat_tagdiv_food_id,),
));

$post_td_post_the_perfect_dinner_id = td_demo_content::add_post(array(
    'title' => 'The Perfect Dinner',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'categories_id_array' => array($cat_tagdiv_food_id,),
));

$post_td_post_good_morning_smoothie_id = td_demo_content::add_post(array(
    'title' => 'Good Morning Smoothie',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'categories_id_array' => array($cat_tagdiv_food_id,),
));

$post_td_post_breakfast_tips_id = td_demo_content::add_post(array(
    'title' => 'Breakfast Tips To Stay Healty',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'categories_id_array' => array($cat_tagdiv_food_id,),
));

$post_td_post_shopping_is_my_cardio_id = td_demo_content::add_post(array(
    'title' => 'Shopping Is My Cardio',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'categories_id_array' => array($cat_tagdiv_exercises_id,),
));

$post_td_post_style_tips_to_look_instantly_slimmer_id = td_demo_content::add_post(array(
    'title' => 'Style Tips to Look Instantly Slimmer',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'categories_id_array' => array($cat_tagdiv_exercises_id,),
));

$post_td_post_have_a_basketball_id = td_demo_content::add_post(array(
    'title' => 'Have A Basketball',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'categories_id_array' => array($cat_tagdiv_exercises_id,),
));

$post_td_post_summer_time_burn_out_id = td_demo_content::add_post(array(
    'title' => 'Summer Time Burn Out',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'categories_id_array' => array($cat_tagdiv_exercises_id,),
));

$post_td_post_high_five_for_fitness_id = td_demo_content::add_post(array(
    'title' => 'High Five For Fitness',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'categories_id_array' => array($cat_tagdiv_exercises_id,),
));

$post_td_post_things_you_should_pack_when_travel_id = td_demo_content::add_post(array(
    'title' => 'Things You Should Pack When Travel',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'categories_id_array' => array($cat_tagdiv_leisure_id,),
));

$post_td_post_summer_reading_list_id = td_demo_content::add_post(array(
    'title' => 'Summer Reading List',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'categories_id_array' => array($cat_tagdiv_leisure_id,),
));

$post_td_post_the_things_that_matter_id = td_demo_content::add_post(array(
    'title' => 'The Things That Matter',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'categories_id_array' => array($cat_tagdiv_home_decor_id,),
));

$post_td_post_around_the_house_id = td_demo_content::add_post(array(
    'title' => 'Around The House',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'categories_id_array' => array($cat_tagdiv_home_decor_id,),
));

$post_i_enjoy_strawberry_deserts_id = td_demo_content::add_post(array(
    'title' => 'I Enjoy Strawberry Deserts',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'categories_id_array' => array($cat_tagdiv_food_id,),
));


/*  ----------------------------------------------------------------------------
	PAGES
*/
$page_about_me_id = td_demo_content::add_page(array(
    'title' => 'About Me',
    'file' => 'about_me.txt',
));

$page_home_id = td_demo_content::add_page(array(
    'title' => 'Home',
    'file' => 'home.txt',
    'homepage' => true,
));


/*  ----------------------------------------------------------------------------
	PRODUCTS
*/



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
    'title' => 'Lifestyle',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_lifestyle_id,
    'parent_id' => ''
), true);

$menu_item_2_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Inspiration',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_tagdiv_inspiration_id,
    'parent_id' => ''
), true);

$menu_item_3_id = td_demo_menus::add_category(array(
    'title' => 'Food',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_tagdiv_food_id,
    'parent_id' => ''
));

$menu_item_4_id = td_demo_menus::add_category(array(
    'title' => 'Photography',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_tagdiv_photography_id,
    'parent_id' => ''
));

$menu_item_5_id = td_demo_menus::add_category(array(
    'title' => 'Travel',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_tagdiv_travel_id,
    'parent_id' => ''
));

$menu_item_6_id = td_demo_menus::add_link(array(
    'title' => 'Categories',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_7_id = td_demo_menus::add_category(array(
    'title' => 'Inspiration',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_tagdiv_inspiration_id,
    'parent_id' => $menu_item_6_id
));

$menu_item_8_id = td_demo_menus::add_category(array(
    'title' => 'Travel',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_tagdiv_travel_id,
    'parent_id' => $menu_item_6_id
));

$menu_item_9_id = td_demo_menus::add_category(array(
    'title' => 'Photography',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_tagdiv_photography_id,
    'parent_id' => $menu_item_6_id
));

$menu_item_10_id = td_demo_menus::add_page(array(
    'title' => 'About Me',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'page_id' => $page_about_me_id,
    'parent_id' => ''
));




/*  ----------------------------------------------------------------------------
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_link(array(
    'title' => 'Trends',
    'add_to_menu_id' => $menu_td_demo_top_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_link(array(
    'title' => 'Fashion',
    'add_to_menu_id' => $menu_td_demo_top_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_link(array(
    'title' => 'My Pics',
    'add_to_menu_id' => $menu_td_demo_top_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_link(array(
    'title' => 'Buy Now!',
    'add_to_menu_id' => $menu_td_demo_top_menu_id,
    'url' => 'https://themeforest.net/item/newspaper/5489609',
    'parent_id' => ''
));



/*  ----------------------------------------------------------------------------
	GENERAL SETTINGS
*/
td_demo_misc::update_background('', false);
td_demo_misc::update_background_mobile('tdx_pic_7');
td_demo_misc::update_background_login('');
td_demo_misc::update_background_header('');
td_demo_misc::update_background_footer('');
td_demo_misc::update_footer_text('');
td_demo_misc::update_logo(array('normal' => '','retina' => '','mobile' => '',));
td_demo_misc::update_footer_logo(array('normal' => '','retina' => '',));
td_demo_misc::add_social_buttons(array('facebook' => '#','instagram' => '#','linkedin' => '#','pinterest' => '#','tumblr' => '#','twitter' => '#',));
$generated_css = td_css_generator();
if ( function_exists('tdsp_css_generator') ) {
    $generated_css .= tdsp_css_generator();
}
td_util::update_option( 'tds_user_compile_css', $generated_css );
