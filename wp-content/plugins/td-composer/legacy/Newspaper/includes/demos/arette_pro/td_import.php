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

$cat_books_id = td_demo_category::add_category(array(
	'category_name' => 'Books',
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

$cat_decor_id = td_demo_category::add_category(array(
	'category_name' => 'Decor',
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

$cat_events_id = td_demo_category::add_category(array(
	'category_name' => 'Events',
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

$cat_fashion_id = td_demo_category::add_category(array(
	'category_name' => 'Fashion',
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

$cat_music_id = td_demo_category::add_category(array(
	'category_name' => 'Music',
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

$cat_ootd_id = td_demo_category::add_category(array(
	'category_name' => 'OOTD',
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

$cat_recommendations_id = td_demo_category::add_category(array(
	'category_name' => 'Recommendations',
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
	ATTACHMMENTS
*/

/*  ---------------------------------------------------------------------------- 
	POSTS
*/
$post_td_post_how_to_enjoy_the_simple_moments_with_your_significant_other_id = td_demo_content::add_post(array(
	'title' => 'How to Enjoy the Simple Moments with your Significant Other',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_events_id,),
));

$post_td_post_karaoke_night_having_fun_in_a_retro_vintage_outfit_hairstyle_id = td_demo_content::add_post(array(
	'title' => 'Karaoke Night: Having Fun in a Retro-Vintage Outfit & Hairstyle',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_events_id,),
));

$post_td_post_taking_care_of_yourself_by_spending_time_with_friends_id = td_demo_content::add_post(array(
	'title' => 'Taking Care of Yourself by Spending Time with Friends',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_events_id,),
));

$post_td_post_10_tips_on_dealing_with_all_the_drama_in_your_life_id = td_demo_content::add_post(array(
	'title' => '10 Tips on Dealing with all the Drama in your Life',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_events_id,),
));

$post_td_post_taking_a_trip_to_the_pinkest_lake_in_the_world_id = td_demo_content::add_post(array(
	'title' => 'Taking a Trip to the Pinkest Lake in the World',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_events_id,),
));

$post_td_post_formal_wear_for_a_gala_be_glamorous_and_sensational_with_simplicity_id = td_demo_content::add_post(array(
	'title' => 'Formal Wear: Be Glamorous with Simplicity',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_ootd_id,),
));

$post_td_post_how_to_style_a_dark_outfit_for_an_autumnal_day_outside_in_the_cold_id = td_demo_content::add_post(array(
	'title' => 'How to Style a Dark Outfit for an Autumnal Day Outside in the Cold',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_ootd_id,),
));

$post_td_post_lets_explore_other_materials_as_options_for_dress_making_id = td_demo_content::add_post(array(
	'title' => 'Let\'s Explore Other Materials as Options for Dress-Making',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_ootd_id,),
));

$post_td_post_pairing_beanies_with_flannels_to_obtain_that_edgy_chic_look_id = td_demo_content::add_post(array(
	'title' => 'Pairing Beanies with Flannels to Obtain that Edgy-Chic Look',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_ootd_id,),
));

$post_td_post_embrace_the_alternative_and_go_to_concerts_in_this_breathtaking_outfit_id = td_demo_content::add_post(array(
	'title' => 'Embrace the Alternative and Go to Concerts in this Breathtaking Outfit',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_ootd_id,),
));

$post_td_post_spending_time_with_your_pets_to_improve_happiness_and_reduce_stress_id = td_demo_content::add_post(array(
	'title' => 'Spending Time with Your Pets to Improve Happiness and Reduce Stress',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_lifestyle_id,),
));

$post_td_post_how_to_keep_an_online_persona_while_staying_home_and_grow_your_influence_id = td_demo_content::add_post(array(
	'title' => 'How to Keep an Online Persona while Staying Home',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_lifestyle_id,),
));

$post_td_post_rock_a_sparkly_dress_at_any_gala_to_draw_the_attention_of_anyone_in_the_room_id = td_demo_content::add_post(array(
	'title' => 'Rock a Sparkly Dress at any Gala to Draw the Attention of Anyone in the Room',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_lifestyle_id,),
));

$post_td_post_10_reasons_why_you_should_consider_buying_confetti_for_your_next_party_id = td_demo_content::add_post(array(
	'title' => '10 Reasons Why You Should Consider Buying Confetti for Your Next Party',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_lifestyle_id,),
));

$post_td_post_embracing_your_inner_godddes_treat_your_body_like_a_temple_id = td_demo_content::add_post(array(
	'title' => 'Embracing Your Inner Godddes: Treat Your Body Like a Temple',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_lifestyle_id,),
));

$post_td_post_picking_out_a_summer_outfit_that_will_wow_anyone_you_come_across_id = td_demo_content::add_post(array(
	'title' => 'Picking Out a Summer Outfit That Will Stun Everyone',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_fashion_id,),
));

$post_td_post_easy_ways_of_accessorizing_an_outfit_with_a_cute_beret_id = td_demo_content::add_post(array(
	'title' => 'Easy Ways of Accessorizing an Outfit with a Cute Beret',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_fashion_id,),
));

$post_td_post_hot_hot_pink_what_colors_go_well_with_this_jacket_id = td_demo_content::add_post(array(
	'title' => 'Hot Hot Pink: What Colors Go Well with This Brilliant New Jacket',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_fashion_id,),
));

$post_td_post_get_ready_for_school_with_a_simple_affordable_comfy_look_id = td_demo_content::add_post(array(
	'title' => 'Get Ready for School with a Simple, Affordable Look',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_fashion_id,),
));

$post_td_post_yoga_ready_outfits_what_to_pair_with_your_favorite_stretch_pants_id = td_demo_content::add_post(array(
	'title' => 'Yoga-Ready Outfits: What to Pair with your Favorite Stretch Pants',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_fashion_id,),
));

$post_td_post_beautiful_invitations_that_leave_your_guests_in_awe_id = td_demo_content::add_post(array(
	'title' => 'Beautiful Invitations that Leave your Guests in Awe',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_decor_id,),
));

$post_td_post_creating_a_painting_that_youd_be_proud_to_hang_on_your_wall_id = td_demo_content::add_post(array(
	'title' => 'Creating a Painting that You\'d Be Proud to Hang On your Wall',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_decor_id,),
));

$post_td_post_what_are_the_comfiest_sofas_you_could_buy_from_ikea_id = td_demo_content::add_post(array(
	'title' => 'What Are the Comfiest Sofas You Could Buy from Ikea?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_decor_id,),
));

$post_td_post_house_tour_what_do_i_own_and_how_do_i_make_it_work_together_id = td_demo_content::add_post(array(
	'title' => 'House Tour: What Do I Own and How do I Make it Work Together?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_decor_id,),
));

$post_td_post_tips_on_picking_the_best_type_of_glasses_to_suit_your_face_shape_id = td_demo_content::add_post(array(
	'title' => 'Tips on Picking the Best Type of Glasses to Suit Your Face Shape',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_decor_id,),
));

$post_td_post_these_noise_cancelling_headphones_are_worth_every_penny_id = td_demo_content::add_post(array(
	'title' => 'These Noise-Cancelling Headphones are Worth Every Penny',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_here_are_5_things_you_need_for_a_coachella_festival_id = td_demo_content::add_post(array(
	'title' => 'Here are 5 Things You Need for a Coachella Festival',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_new_upcoming_artists_for_when_youre_looking_to_explore_something_new_id = td_demo_content::add_post(array(
	'title' => 'New Upcoming Artists for When You\'re Looking to Explore Something New',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_lets_get_personal_what_type_of_music_do_i_generally_listen_to_id = td_demo_content::add_post(array(
	'title' => 'Lets Get Personal: What Type of Music do I Generally Listen to?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_glittery_temporary_tattoos_for_your_summer_festival_dreams_id = td_demo_content::add_post(array(
	'title' => 'Glittery Temporary Tattoos for Your Summer Festival Dreams',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_5_books_im_currently_reading_my_thoughts_on_them_so_far_id = td_demo_content::add_post(array(
	'title' => '5 Books I\'m Currently Reading & My Thoughts on Them So Far',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_books_id,),
));

$post_td_post_audio_books_are_amazing_for_when_youre_on_the_road_id = td_demo_content::add_post(array(
	'title' => 'Audio Books are Amazing for When You\'re on the Road',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_books_id,),
));

$post_td_post_how_fast_do_you_read_take_this_quiz_to_test_your_reading_speed_id = td_demo_content::add_post(array(
	'title' => 'How Fast Do you Read? Take this Quiz to Test your Reading Speed',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_books_id,),
));

$post_td_post_taking_notes_when_doing_your_dissertation_is_a_life_saver_id = td_demo_content::add_post(array(
	'title' => 'Taking Notes When Doing your Dissertation is a Life-Saver',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_books_id,),
));

$post_td_post_10_reasons_why_i_avoid_reading_on_my_phone_and_you_should_too_id = td_demo_content::add_post(array(
	'title' => '10 Reasons Why I Avoid Reading on My Phone and You Should, too!',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_books_id,),
));

$post_td_post_monthly_favorites_august_2020_books_music_skincare_products_id = td_demo_content::add_post(array(
	'title' => 'Monthly Favorites, August 2020: Books, Music, Skincare Products',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_recommendations_id,),
));

$post_td_post_body_lotion_for_dry_skin_that_both_exfoliates_and_hydrates_your_skin_id = td_demo_content::add_post(array(
	'title' => 'Body Lotion for Dry Skin that Both Exfoliates and Hydrates Your Skin',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_recommendations_id,),
));

$post_td_post_10_breathing_exercises_to_help_with_stress_and_maintain_your_happiness_id = td_demo_content::add_post(array(
	'title' => '10 Breathing Exercises to Help with Stress and Maintain Your Happiness',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_recommendations_id,),
));

$post_td_post_favorite_wine_brands_and_how_to_enjoy_them_on_a_summer_day_id = td_demo_content::add_post(array(
	'title' => 'Favorite Wine Brands and How to Enjoy Them on a Summer Day',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_recommendations_id,),
));

$post_td_post_buying_paint_from_an_online_reseller_how_does_it_compare_id = td_demo_content::add_post(array(
	'title' => 'Buying Paint from an Online Reseller - How Does it Compare?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_recommendations_id,),
));

$post_td_post_planning_a_family_get_together_a_picnic_and_walk_in_the_forest_id = td_demo_content::add_post(array(
	'title' => 'Planning a Family Get-Together: a Picnic and Walk in the Forest',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_books_id,$cat_decor_id,$cat_events_id,$cat_fashion_id,$cat_lifestyle_id,$cat_music_id,$cat_ootd_id,$cat_recommendations_id,),
));

$post_td_post_singing_happy_birthday_to_yourself_because_you_deserve_it_id = td_demo_content::add_post(array(
	'title' => 'Singing Happy Birthday to Yourself Because You Deserve It',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_books_id,$cat_decor_id,$cat_events_id,$cat_fashion_id,$cat_lifestyle_id,$cat_music_id,$cat_ootd_id,$cat_recommendations_id,),
));

$post_td_post_having_fun_at_an_outdoor_pool_that_an_uncle_owns_id = td_demo_content::add_post(array(
	'title' => 'Having Fun at an Outdoor Pool that an Uncle Owns',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_books_id,$cat_decor_id,$cat_events_id,$cat_fashion_id,$cat_lifestyle_id,$cat_music_id,$cat_ootd_id,$cat_recommendations_id,),
));

$post_td_post_going_outside_for_the_first_time_in_months_to_enjoy_the_cool_air_id = td_demo_content::add_post(array(
	'title' => 'Going Outside for the First Time in Months to Enjoy the Cool Air',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_books_id,$cat_decor_id,$cat_events_id,$cat_fashion_id,$cat_lifestyle_id,$cat_music_id,$cat_ootd_id,$cat_recommendations_id,),
));

$post_td_post_taking_part_in_online_events_when_stuck_at_home_id = td_demo_content::add_post(array(
	'title' => 'Taking Part in Online Events when Stuck at Home',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_books_id,$cat_decor_id,$cat_events_id,$cat_fashion_id,$cat_lifestyle_id,$cat_music_id,$cat_ootd_id,$cat_recommendations_id,),
));


/*  ---------------------------------------------------------------------------- 
	PAGES
*/
$page_contact_id = td_demo_content::add_page(array(
	'title' => 'Contact',
	'file' => 'contact.txt',
));

$page_homepage_id = td_demo_content::add_page(array(
	'title' => 'Homepage',
	'file' => 'homepage.txt',
	'homepage' => true,
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

$menu_item_1_id = td_demo_menus::add_mega_menu(array(
	'title' => 'Blog',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_blog_id,
	'parent_id' => ''
), true);

$menu_item_2_id = td_demo_menus::add_mega_menu(array(
	'title' => 'Events',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_events_id,
	'parent_id' => ''
), true);

$menu_item_3_id = td_demo_menus::add_page(array(
	'title' => 'Contact',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'page_id' => $page_contact_id,
	'parent_id' => ''
));


/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/
$template_date_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Arette PRO Date Template',
	'file' => 'date_cloud_template.txt',
	'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_id);


$template_tag_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Arette PRO Tag Template',
	'file' => 'tag_cloud_template.txt',
	'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_id);


$template_404_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Arette PRO 404 Template',
	'file' => '404_cloud_template.txt',
	'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_id);


$template_search_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Arette PRO Search Template',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_id);


$template_category_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Arette PRO Category Template',
	'file' => 'cat_cloud_template.txt',
	'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_id);


$template_author_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Arette PRO Author Template',
	'file' => 'author_cloud_template.txt',
	'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_id);


$template_single_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Arette PRO Single Template',
	'file' => 'post_cloud_template.txt',
	'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_id);


$template_footer_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Arette PRO Footer Template',
	'file' => 'footer_cloud_template.txt',
	'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_id);


$template_header_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Arette PRO Header Template',
	'file' => 'header_cloud_template.txt',
	'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_id);





/*  ---------------------------------------------------------------------------- 
	GENERAL SETTINGS
*/
td_demo_misc::update_background('', false);

td_demo_misc::update_background_mobile('tdx_pic_10');

td_demo_misc::update_background_login('tdx_pic_11');

td_demo_misc::update_background_header('');

td_demo_misc::update_background_footer('');

td_demo_misc::update_footer_text('');

td_demo_misc::update_logo(array('normal' => '','retina' => '','mobile' => '',));

td_demo_misc::update_footer_logo(array('normal' => '','retina' => '',));

td_demo_misc::add_social_buttons(array());

$generated_css = td_css_generator();if (function_exists('tdsp_css_generator')) { $generated_css .= tdsp_css_generator(); }td_util::update_option('tds_user_compile_css', $generated_css);
