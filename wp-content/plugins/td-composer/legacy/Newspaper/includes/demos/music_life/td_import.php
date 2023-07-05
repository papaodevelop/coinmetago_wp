<?php 



/*  ---------------------------------------------------------------------------- 
	CATEGORIES
*/
$cat_album_releases_id = td_demo_category::add_category(array(
	'category_name' => 'Album Releases',
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

$cat_dj_accessories_id = td_demo_category::add_category(array(
	'category_name' => 'DJ Accessories',
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

$cat_dj_tips_id = td_demo_category::add_category(array(
	'category_name' => 'DJ Tips',
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

$cat_djs_id = td_demo_category::add_category(array(
	'category_name' => 'DJs',
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

$cat_for_life_id = td_demo_category::add_category(array(
	'category_name' => 'For Life',
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

$cat_instruments_id = td_demo_category::add_category(array(
	'category_name' => 'Instruments',
	'parent_id' => $cat_for_life_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_latest_trends_id = td_demo_category::add_category(array(
	'category_name' => 'Latest trends',
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

$cat_music_is_life_id = td_demo_category::add_category(array(
	'category_name' => 'Music is life',
	'parent_id' => $cat_for_life_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_news_id = td_demo_category::add_category(array(
	'category_name' => 'News',
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

$cat_old_times_id = td_demo_category::add_category(array(
	'category_name' => 'Old times',
	'parent_id' => $cat_for_life_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_reviews_id = td_demo_category::add_category(array(
	'category_name' => 'Reviews',
	'parent_id' => $cat_djs_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_song_writers_id = td_demo_category::add_category(array(
	'category_name' => 'Song Writers',
	'parent_id' => $cat_news_id,
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
$page_home_id = td_demo_content::add_page(array(
	'title' => 'Home',
	'file' => 'home.txt',
	'homepage' => true,
	'demo_unique_id' => '2261eff31c79b62',
));

$page_page_mega_menu_for_djs_id = td_demo_content::add_page(array(
	'title' => 'page mega menu djs',
	'file' => 'page_mega_menu_for_djs.txt',
	'demo_unique_id' => '761eff31c7a34f',
));

$page_newsletter_modal_id = td_demo_content::add_page(array(
	'title' => 'Newsletter Modal',
	'file' => 'newsletter_modal.txt',
	'demo_unique_id' => '9261eff31c7bdeb',
));

$page_page_mega_menu_for_life_id = td_demo_content::add_page(array(
	'title' => 'page mega menu for life',
	'file' => 'page_mega_menu_for_life.txt',
	'demo_unique_id' => '3761eff31c7c536',
));

$page_page_mega_menu_news_id = td_demo_content::add_page(array(
	'title' => 'page mega menu news',
	'file' => 'page_mega_menu_news.txt',
	'demo_unique_id' => '1461eff31c7cc44',
));
/*  ---------------------------------------------------------------------------- 
	POSTS
*/
$post_td_post_social_media_tool_id = td_demo_content::add_post(array(
	'title' => 'Social media tool',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_reviews_id,),
));

$post_td_post_biggest_stages_id = td_demo_content::add_post(array(
	'title' => 'Biggest Stages',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_reviews_id,),
));

$post_td_post_music_production_id = td_demo_content::add_post(array(
	'title' => 'Music Production',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_reviews_id,),
));

$post_td_post_tomorrowland_id = td_demo_content::add_post(array(
	'title' => 'Tomorrowland',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_reviews_id,),
));

$post_td_post_untold_festival_id = td_demo_content::add_post(array(
	'title' => 'Untold festival',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_reviews_id,),
));

$post_td_post_dj_tech_reviews_id = td_demo_content::add_post(array(
	'title' => 'Dj Tech Reviews',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_reviews_id,),
));

$post_td_post_how_to_make_a_mashup_in_5_easy_steps_id = td_demo_content::add_post(array(
	'title' => 'How To Make a Mashup in 5 Easy Steps',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_dj_tips_id,),
));

$post_td_post_how_to_beatmatch_properly_the_ultimate_guide_id = td_demo_content::add_post(array(
	'title' => 'How to Beatmatch properly: The Ultimate Guide',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_dj_tips_id,),
));

$post_td_post_learning_to_scratch_become_a_dj_master_in_2022_id = td_demo_content::add_post(array(
	'title' => 'Learning To Scratch: Become A DJ Master In 2022',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_dj_tips_id,),
));

$post_td_post_top_10_dj_mistakes_to_avoid_at_all_costs_id = td_demo_content::add_post(array(
	'title' => 'Top 10 DJ Mistakes To Avoid At All Costs!',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_dj_tips_id,),
));

$post_td_post_how_to_dj_with_a_laptop_in_3_easy_steps_id = td_demo_content::add_post(array(
	'title' => 'How To DJ With A Laptop In 3 Easy Steps',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_dj_tips_id,),
));

$post_td_post_5_best_websites_to_find_acapellas_for_free_id = td_demo_content::add_post(array(
	'title' => '5 Best Websites To Find Acapellas (for free)',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_dj_tips_id,),
));

$post_td_post_all_about_dj_insurance_for_2022_id = td_demo_content::add_post(array(
	'title' => 'All about Dj Insurance for 2022',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_dj_accessories_id,),
));

$post_td_post_serato_dj_lite_vs_pro_should_i_upgrade_id = td_demo_content::add_post(array(
	'title' => 'Serato DJ Lite vs Pro: Should I Upgrade?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_dj_accessories_id,),
));

$post_td_post_magma_solid_blaze_pack_review_id = td_demo_content::add_post(array(
	'title' => 'MAGMA Solid Blaze Pack Review',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_dj_accessories_id,),
));

$post_td_post_dj_gear_table_accessories_id = td_demo_content::add_post(array(
	'title' => 'DJ Gear & Table Accessories',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_dj_accessories_id,),
));

$post_td_post_best_dj_laptop_stands_for_2022_id = td_demo_content::add_post(array(
	'title' => 'Best DJ Laptop Stands for 2022',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_dj_accessories_id,),
));

$post_td_post_which_is_the_best_usb_for_djing_id = td_demo_content::add_post(array(
	'title' => 'Which is The Best USB for DJing?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_dj_accessories_id,),
));

$post_td_post_choose_to_learn_an_instrument_you_think_is_dope_id = td_demo_content::add_post(array(
	'title' => 'Choose to learn an instrument you think is dope',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_instruments_id,),
));

$post_td_post_the_best_instruments_for_kids_or_beginners_id = td_demo_content::add_post(array(
	'title' => 'The best instruments for kids or beginners',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_instruments_id,),
));

$post_td_post_a_musical_instrument_out_of_household_items_id = td_demo_content::add_post(array(
	'title' => 'A musical instrument out of household items',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_instruments_id,),
));

$post_td_post_the_list_of_national_instruments_music_id = td_demo_content::add_post(array(
	'title' => 'The List of national instruments (music)',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_instruments_id,),
));

$post_td_post_traditional_instruments_from_all_over_the_world_id = td_demo_content::add_post(array(
	'title' => 'Traditional Instruments from all over the world',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_instruments_id,),
));

$post_td_post_the_ancient_object_consider_as_instrument_id = td_demo_content::add_post(array(
	'title' => 'The ancient object consider as instrument',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_instruments_id,),
));

$post_td_post_the_best_60708090_songs_id = td_demo_content::add_post(array(
	'title' => 'The best \'60,\'70,\'80\'90 songs',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_old_times_id,),
));

$post_td_post_famous_musicians_who_died_too_young_id = td_demo_content::add_post(array(
	'title' => 'Famous Musicians Who Died Too Young',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_old_times_id,),
));

$post_td_post_history_of_music_the_method_behind_the_music_id = td_demo_content::add_post(array(
	'title' => 'History of Music - The Method Behind the Music',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_old_times_id,),
));

$post_td_post_the_story_of_the_first_music_in_history_id = td_demo_content::add_post(array(
	'title' => 'The story of the first music in history',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_old_times_id,),
));

$post_td_post_old_time_songs_everyone_knows_id = td_demo_content::add_post(array(
	'title' => 'Old time songs everyone knows',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_old_times_id,),
));

$post_td_post_old_time_music_instruments_id = td_demo_content::add_post(array(
	'title' => 'Old-time music instruments',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_old_times_id,),
));

$post_td_post_music_therapy_what_is_it_types_treatment_id = td_demo_content::add_post(array(
	'title' => 'Music Therapy: What Is It, Types & Treatment',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_music_is_life_id,),
));

$post_td_post_best_of_online_learning_music_and_art_id = td_demo_content::add_post(array(
	'title' => 'Best of Online Learning: Music and Art',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_music_is_life_id,),
));

$post_td_post_the_power_of_listening_to_religious_music_id = td_demo_content::add_post(array(
	'title' => 'The power of listening to Religious Music',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_music_is_life_id,),
));

$post_td_post_how_the_science_of_music_can_help_you_id = td_demo_content::add_post(array(
	'title' => 'How the Science of Music Can Help You',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_music_is_life_id,),
));

$post_td_post_benefits_of_music_on_relationships_mind_id = td_demo_content::add_post(array(
	'title' => 'Benefits of Music on Relationships & Mind',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_music_is_life_id,),
));

$post_td_post_health_benefits_of_music_for_every_age_id = td_demo_content::add_post(array(
	'title' => 'Health Benefits of Music for every age',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_music_is_life_id,),
));

$post_td_post_free_entrance_events_of_2022_id = td_demo_content::add_post(array(
	'title' => 'Free entrance events of 2022',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_events_id,),
));

$post_td_post_red_carpet_celebrities_meeting_id = td_demo_content::add_post(array(
	'title' => 'Red carpet celebrities meeting',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_events_id,),
));

$post_td_post_the_tour_of_relaxing_song_bands_id = td_demo_content::add_post(array(
	'title' => 'The tour of relaxing song bands',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_events_id,),
));

$post_td_post_trending_events_in_every_country_id = td_demo_content::add_post(array(
	'title' => 'Trending Events in every country',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_events_id,),
));

$post_td_post_news_diary_of_the_jazz_orchestra_id = td_demo_content::add_post(array(
	'title' => 'News/Diary of the jazz orchestra',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_events_id,),
));

$post_td_post_events_guide_of_the_current_year_id = td_demo_content::add_post(array(
	'title' => 'Events guide of the current year',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_events_id,),
));

$post_td_post_most_of_my_written_lyrics_are_full_with_emotions_id = td_demo_content::add_post(array(
	'title' => 'Most of my written lyrics are full with emotions',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_song_writers_id,),
));

$post_td_post_dan_wilson_has_helped_to_write_three_songs_for_adele_id = td_demo_content::add_post(array(
	'title' => 'Dan Wilson has helped to write three songs for Adele',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_song_writers_id,),
));

$post_td_post_taylor_momsen_of_the_pretty_reckless_frontwoman_id = td_demo_content::add_post(array(
	'title' => 'Taylor Momsen of The Pretty Reckless FrontWoman',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_song_writers_id,),
));

$post_td_post_michael_jackson_did_indeed_write_his_own_music_id = td_demo_content::add_post(array(
	'title' => 'Michael Jackson did indeed write his own music',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_song_writers_id,),
));

$post_td_post_did_jose_palma_wrote_the_philippine_national_anthem_id = td_demo_content::add_post(array(
	'title' => 'Did Jose Palma wrote the Philippine national anthem?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_song_writers_id,),
));

$post_td_post_sirf_tu_song_release_by_stebin_ben_heli_daruwala_id = td_demo_content::add_post(array(
	'title' => 'Sirf Tu song release by Stebin Ben & Heli Daruwala',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_album_releases_id,),
));

$post_td_post_scorpions_the_explosive_album_rock_believer_id = td_demo_content::add_post(array(
	'title' => 'Scorpions - the explosive album Rock Believer',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_album_releases_id,),
));

$post_td_post_timbaland_teases_new_album_with_missy_elliott_id = td_demo_content::add_post(array(
	'title' => 'Timbaland teases new album with Missy Elliott',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_album_releases_id,),
));

$post_td_post_bonobo_the_spaces_between_id = td_demo_content::add_post(array(
	'title' => 'Bonobo: The Spaces Between',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_album_releases_id,),
));

$post_td_post_adele_finally_announces_her_new_album_30_id = td_demo_content::add_post(array(
	'title' => 'Adele finally announces her new album 30',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_album_releases_id,),
));

$post_td_post_kolony_album_release_party_with_steve_aoki_id = td_demo_content::add_post(array(
	'title' => 'Kolony Album Release Party With Steve Aoki',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_album_releases_id,),
));

$post_td_post_advanced_sampling_technologies_id = td_demo_content::add_post(array(
	'title' => 'Advanced Sampling Technologies',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_latest_trends_id,),
));

$post_td_post_more_customer_centric_music_companies_id = td_demo_content::add_post(array(
	'title' => 'More Customer-centric Music Companies',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_latest_trends_id,),
));

$post_td_post_new_and_expanded_streams_for_artists_id = td_demo_content::add_post(array(
	'title' => 'New and Expanded Streams for Artists',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_latest_trends_id,),
));

$post_td_post_sophisticated_music_recommendations_id = td_demo_content::add_post(array(
	'title' => 'Sophisticated Music Recommendations',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_latest_trends_id,),
));

$post_td_post_music_documentaries_and_visual_albums_id = td_demo_content::add_post(array(
	'title' => 'Music Documentaries and Visual Albums',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_latest_trends_id,),
));

$post_td_post_music_livestreaming_on_social_media_id = td_demo_content::add_post(array(
	'title' => 'Music Livestreaming on Social Media',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_latest_trends_id,),
));


/*  ---------------------------------------------------------------------------- 
	PRODUCTS
*/

/*  ---------------------------------------------------------------------------- 
	MENUS
*/
$menu_td_demo_footer_menu_id = td_demo_menus::create_menu('td-demo-footer-menu', ''); 


/*  ---------------------------------------------------------------------------- 
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_link(array(
	'title' => 'Disclaimer',
	'add_to_menu_id' => $menu_td_demo_footer_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_link(array(
	'title' => 'Privacy & Security',
	'add_to_menu_id' => $menu_td_demo_footer_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_link(array(
	'title' => 'Contact us',
	'add_to_menu_id' => $menu_td_demo_footer_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_td_demo_header_menu_id = td_demo_menus::create_menu('td-demo-header-menu', ''); 


/*  ---------------------------------------------------------------------------- 
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_mega_menu(array(
	'title' => 'News',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'page_id' => $page_page_mega_menu_news_id,
	'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_mega_menu(array(
	'title' => 'For Life',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'page_id' => $page_page_mega_menu_for_life_id,
	'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_mega_menu(array(
	'title' => 'DJs',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'page_id' => $page_page_mega_menu_for_djs_id ,
	'parent_id' => ''
));

$menu_td_demo_top_menu_id = td_demo_menus::create_menu('td-demo-top-menu', ''); 


/*  ---------------------------------------------------------------------------- 
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_link(array(
	'title' => 'Important',
	'add_to_menu_id' => $menu_td_demo_top_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_link(array(
	'title' => 'Podcasts',
	'add_to_menu_id' => $menu_td_demo_top_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_link(array(
	'title' => 'Videos',
	'add_to_menu_id' => $menu_td_demo_top_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_link(array(
	'title' => 'Audio',
	'add_to_menu_id' => $menu_td_demo_top_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_4_id = td_demo_menus::add_link(array(
	'title' => 'Offers',
	'add_to_menu_id' => $menu_td_demo_top_menu_id,
	'url' => '#',
	'parent_id' => ''
));


/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/
$template_tag_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Tag Template',
	'file' => 'tag_cloud_template.txt',
	'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_id);


$template_date_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Date Template',
	'file' => 'date_cloud_template.txt',
	'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_id);


$template_search_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Search Template',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_id);


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


$template_category_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Category Template',
	'file' => 'cat_cloud_template.txt',
	'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_id);


$template_single_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Single Template',
	'file' => 'post_cloud_template.txt',
	'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_id);


$template_footer_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Footer Template',
	'file' => 'footer_cloud_template.txt',
	'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_id);


$template_header_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Header Template',
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
