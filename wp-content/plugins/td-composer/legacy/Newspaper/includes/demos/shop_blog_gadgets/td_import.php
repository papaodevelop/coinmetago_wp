<?php

/*  ---------------------------------------------------------------------------- 
	CATEGORIES
*/

$cat_reviews_id = td_demo_category::add_category(array(
    'category_name' => 'Reviews',
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

$cat_cameras_id = td_demo_category::add_category(array(
	'category_name' => 'Cameras',
	'parent_id' => $cat_reviews_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_phones_id = td_demo_category::add_category(array(
	'category_name' => 'Phones',
	'parent_id' => $cat_reviews_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_smart_home_id = td_demo_category::add_category(array(
	'category_name' => 'Smart Home',
	'parent_id' => $cat_reviews_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_video_id = td_demo_category::add_category(array(
	'category_name' => 'Video',
	'parent_id' => $cat_reviews_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_wearables_id = td_demo_category::add_category(array(
	'category_name' => 'Wearables',
	'parent_id' => $cat_reviews_id,
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

$cat_internet_id = td_demo_category::add_category(array(
    'category_name' => 'Internet',
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

$cat_social_networks_id = td_demo_category::add_category(array(
    'category_name' => 'Social Networks',
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

$post_fashion_model_goes_casual_in_original_way_id = td_demo_content::add_post(array(
    'title' => 'Fashion Model Goes Casual in Original Way',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'categories_id_array' => array($cat_cameras_id,$cat_gaming_id,$cat_internet_id,$cat_phones_id,$cat_smart_home_id,$cat_social_networks_id,$cat_video_id,$cat_wearables_id,),
));

$post_the_best_cheap_retro_fashion_for_this_fall_id = td_demo_content::add_post(array(
    'title' => 'The Best Cheap Retro Fashion for this Fall',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'categories_id_array' => array($cat_cameras_id,$cat_gaming_id,$cat_internet_id,$cat_phones_id,$cat_smart_home_id,$cat_social_networks_id,$cat_video_id,$cat_wearables_id,),
));

$post_witnessing_the_birth_of_the_coronavirus_economy_id = td_demo_content::add_post(array(
    'title' => 'Witnessing the Birth of the Coronavirus Economy',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'categories_id_array' => array($cat_cameras_id,$cat_gaming_id,$cat_internet_id,$cat_phones_id,$cat_smart_home_id,$cat_social_networks_id,$cat_video_id,$cat_wearables_id,),
));

$post_instagram_hair_ideas_inspirational_influencers_id = td_demo_content::add_post(array(
    'title' => 'Instagram Hair Ideas: Inspirational Influencers',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'categories_id_array' => array($cat_cameras_id,$cat_gaming_id,$cat_internet_id,$cat_phones_id,$cat_smart_home_id,$cat_social_networks_id,$cat_video_id,$cat_wearables_id,),
));

$post_photos_have_astonishing_impact_for_campaigns_id = td_demo_content::add_post(array(
    'title' => 'Photos Have Astonishing Impact for Campaigns',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'categories_id_array' => array($cat_cameras_id,$cat_gaming_id,$cat_internet_id,$cat_phones_id,$cat_smart_home_id,$cat_social_networks_id,$cat_video_id,$cat_wearables_id,),
));

$post_td_post_discover_a_better_camera_for_your_vlogging_on_youtube_id = td_demo_content::add_post(array(
	'title' => 'Discover a Better Camera for Your Vlogging on YouTube',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_social_networks_id,),
));

$post_td_post_your_instagram_could_soon_start_to_make_you_big_money_id = td_demo_content::add_post(array(
	'title' => 'Your Instagram Could Soon Start to Make You Big Money',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_social_networks_id,),
));

$post_td_post_heres_a_new_way_to_take_better_photos_for_socials_id = td_demo_content::add_post(array(
	'title' => 'Here\'s a New Way to Take Better Photos for Socials',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_social_networks_id,),
));

$post_td_post_how_to_use_snapchat_to_capture_full_image_creativity_id = td_demo_content::add_post(array(
	'title' => 'How to Use Snapchat to Capture Full Image Creativity',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_social_networks_id,),
));

$post_td_post_facebook_now_lets_you_post_high_quality_images_in_albums_id = td_demo_content::add_post(array(
	'title' => 'Facebook Now Lets You Post High Quality Images in Albums',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_social_networks_id,),
));

$post_td_post_ethernet_internet_connection_is_loosing_the_battle_with_wifi_id = td_demo_content::add_post(array(
	'title' => 'Ethernet Internet Connection is Loosing the Battle With WiFi',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_internet_id,),
));

$post_td_post_car_internet_wifi_connectivity_may_be_just_the_beginning_id = td_demo_content::add_post(array(
	'title' => 'Car Internet WiFi Connectivity May Be Just the Beginning',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_internet_id,),
));

$post_td_post_images_from_hundreds_of_pcs_control_systems_available_id = td_demo_content::add_post(array(
	'title' => 'Images from Hundreds of PCs & Control Systems Available',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_internet_id,),
));

$post_td_post_facebook_using_lasers_to_deliver_remote_area_internet_id = td_demo_content::add_post(array(
	'title' => 'Facebook Using Lasers to Deliver Remote Area Internet',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_internet_id,),
));

$post_td_post_tip_how_much_internet_speed_should_you_really_pay_for_id = td_demo_content::add_post(array(
	'title' => 'Tip: How Much Internet Speed Should You Really Pay For?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_internet_id,),
));

$post_td_post_microsoft_to_start_gaming_development_systems_in_march_id = td_demo_content::add_post(array(
	'title' => 'Microsoft to Start Gaming Development Systems in March',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_gaming_id,),
));

$post_td_post_why_next_year_might_just_be_the_best_year_ever_for_gaming_id = td_demo_content::add_post(array(
	'title' => 'Why Next Year Might Just Be the Best Year Ever for Gaming',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_gaming_id,),
));

$post_td_post_ghost_racer_wants_to_be_the_most_ambitious_car_game_id = td_demo_content::add_post(array(
	'title' => 'Ghost Racer Wants to Be the Most Ambitious Car Game',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_gaming_id,),
));

$post_td_post_new_nintendo_wii_console_goes_on_sale_in_strategy_reboot_id = td_demo_content::add_post(array(
	'title' => 'New Nintendo Wii Console Goes on Sale in Strategy Reboot',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_gaming_id,),
));

$post_td_post_you_and_your_kids_can_enjoy_this_new_science_game_id = td_demo_content::add_post(array(
	'title' => 'You and Your Kids can Enjoy this New Science Game',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_gaming_id,),
));

$post_td_post_this_health_bracelet_will_change_the_industry_forever_id = td_demo_content::add_post(array(
	'title' => 'This Health Bracelet Will Change the Industry Forever',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_wearables_id,),
));

$post_td_post_10_best_ways_to_use_and_personalize_your_new_apple_watch_id = td_demo_content::add_post(array(
	'title' => '10 Best Ways to Use and Personalize Your New Apple Watch',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_wearables_id,),
));

$post_td_post_huawei_vr_good_looks_but_lacking_a_few_major_features_id = td_demo_content::add_post(array(
	'title' => 'Huawei VR: Good Looks, But Lacking a Few Major Features',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_wearables_id,),
));

$post_td_post_samsung_gear_vr_gets_refreshed_with_a_touch_controller_id = td_demo_content::add_post(array(
	'title' => 'Samsung Gear VR Gets Refreshed With a Touch Controller',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_wearables_id,),
));

$post_td_post_these_sexy_headphones_have_the_best_sound_on_the_market_id = td_demo_content::add_post(array(
	'title' => 'These Sexy Headphones Have the Best Sound on the Market',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_wearables_id,),
));

$post_td_post_manufacturer_plans_to_stop_delivering_secondary_camera_parts_id = td_demo_content::add_post(array(
	'title' => 'Manufacturer Plans to Stop Delivering Secondary Camera Parts',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_video_id,),
));

$post_td_post_apple_unveils_their_top_5_best_selling_movies_of_all_time_id = td_demo_content::add_post(array(
	'title' => 'Apple Unveils their Top 5 Best Selling Movies of All-Time',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_video_id,),
));

$post_td_post_virtual_reality_video_camera_will_be_launched_in_barcelona_id = td_demo_content::add_post(array(
	'title' => 'Virtual Reality Video Camera Will be Launched in Barcelona',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_video_id,),
));

$post_td_post_virtual_reality_could_change_game_streaming_systems_forever_id = td_demo_content::add_post(array(
	'title' => 'Virtual Reality Could Change Game Streaming Systems Forever',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_video_id,),
));

$post_td_post_this_new_gear_vr_controller_feels_like_its_from_the_future_id = td_demo_content::add_post(array(
	'title' => 'This New Gear VR Controller Feels Like it\'s From the Future',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_video_id,),
));

$post_td_post_modular_systems_will_keep_your_smart_home_from_becoming_obsolete_id = td_demo_content::add_post(array(
	'title' => 'Modular Systems Will Keep Your Smart Home from Becoming Obsolete',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_smart_home_id,),
));

$post_td_post_sneak_peak_best_smart_home_gadgets_features_to_install_today_id = td_demo_content::add_post(array(
	'title' => 'Sneak Peak: Best Smart Home Gadgets & Features to Install Today',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_smart_home_id,),
));

$post_td_post_lights_guide_for_your_home_ultimate_led_vs_old_generations_id = td_demo_content::add_post(array(
	'title' => 'Lights Guide for your Home: Ultimate LED vs. Old Generations',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_smart_home_id,),
));

$post_td_post_malware_can_be_introduced_into_smart_homes_operating_systems_id = td_demo_content::add_post(array(
	'title' => 'Malware Can Be Introduced into Smart Home\'s Operating Systems',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_smart_home_id,),
));

$post_td_post_meet_the_next_big_thing_for_ultimate_confort_in_smart_homes_id = td_demo_content::add_post(array(
	'title' => 'Meet the Next Big Thing for Ultimate Confort in Smart Homes',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_smart_home_id,),
));

$post_td_post_crop_factor_how_the_camera_lens_model_affects_your_images_id = td_demo_content::add_post(array(
	'title' => 'Crop Factor: How the Camera Lens Model Affects Your Images',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_cameras_id,),
));

$post_td_post_this_new_breakthrough_phone_has_been_fitted_with_5_cameras_id = td_demo_content::add_post(array(
	'title' => 'This New Breakthrough Phone Has Been Fitted with 5 Cameras',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_cameras_id,),
));

$post_td_post_the_best_smartphone_cameras_to_consider_for_your_next_vacation_id = td_demo_content::add_post(array(
	'title' => 'The Best Smartphone Cameras to Consider for your Next Vacation',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_cameras_id,),
));

$post_td_post_how_to_share_multiple_images_and_videos_in_your_insta_story_id = td_demo_content::add_post(array(
	'title' => 'How to Share Multiple Images and Videos in Your Insta Story',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_cameras_id,),
));

$post_td_post_discover_the_newest_mirrorless_waterproof_rugged_cameras_id = td_demo_content::add_post(array(
	'title' => 'Discover the Newest Mirrorless Waterproof Rugged Cameras',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_cameras_id,),
));

$post_td_post_you_need_to_know_about_the_next_global_smartphone_event_id = td_demo_content::add_post(array(
	'title' => 'You Need to Know About the Next Global Smartphone Event',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_phones_id,),
));

$post_td_post_top_tip_how_to_best_use_snapchat_on_iphone_and_android_id = td_demo_content::add_post(array(
	'title' => 'Top Tip: How to Best Use Snapchat on iPhone and Android',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_phones_id,),
));

$post_td_post_apples_next_smartphones_may_have_full_screens_with_no_bezels_id = td_demo_content::add_post(array(
	'title' => 'Apple\'s Next Smartphones May Have Full Screens with no Bezels',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_phones_id,),
));

$post_td_post_how_iphone_mastered_fast_charging_and_retained_lightning_port_id = td_demo_content::add_post(array(
	'title' => 'How iPhone Mastered Fast Charging and Retained Lightning Port',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_phones_id,),
));

$post_td_post_the_new_google_pixel_has_arrived_in_the_premium_segment_id = td_demo_content::add_post(array(
	'title' => 'The New Google Pixel Has Arrived in the Premium Segment',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_phones_id,),
));


/*  ---------------------------------------------------------------------------- 
	PRODUCT CATEGORIES
*/
$p_cat_gadgets_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Gadgets',
	'parent_id' => 0,
	'description' => '',
));


/*  ---------------------------------------------------------------------------- 
	PRODUCT ATTRIBUTES
*/


/*  ---------------------------------------------------------------------------- 
	PRODUCTS
*/
$product_android_mobile_phone_id = td_demo_content::add_product( array( 
	'title' => 'Android Mobile Phone',
	'file' => 'product_default.txt',
	'product_sku' => 'gd012',
	'product_price' => '139',
	'product_image_td_id' => 'td_pic_p_9',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_gadgets_id ),
	'product_tags' => array( 'camera','gadgets','smartphone' ),
	'short_description' => '<p>Screen Android 10, WD Octa Core 4GB RAM, 64GB ROM Mobile Phone, 4200mAh, 4G Cellphone.</p>
',
	'product_type' => 'simple',
));

$product_usb_smart_thermometer_id = td_demo_content::add_product( array( 
	'title' => 'USB Smart Thermometer',
	'file' => 'product_default.txt',
	'product_sku' => 'gd011',
	'product_price' => '7.5',
	'product_image_td_id' => 'td_pic_p_11',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_gadgets_id ),
	'product_tags' => array( 'gadgets','thermometer','usb' ),
	'short_description' => '<p>Contactless measuring to avoid the risk of virus and bacteria transmission, safe and healthy.<br />
Quick and easy to use, measures the temperature in 1 second, sensitive sensors, the data is accurate.</p>
',
	'product_type' => 'simple',
));

$product_stylus_pen_touch_for_tablet_id = td_demo_content::add_product( array( 
	'title' => 'Stylus Pen Touch for Tablet',
	'file' => 'product_default.txt',
	'product_sku' => 'gd010',
	'product_price' => '19',
	'product_image_td_id' => 'td_pic_p_10',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_gadgets_id ),
	'product_tags' => array( 'gadgets','stylus','usb' ),
	'short_description' => '<p>Tablet bluetooth stylus pen, suitable For IOS, Android, and Window system Smartphones/Tablets.</p>
',
	'product_type' => 'simple',
));

$product_smartphone_photo_lens_id = td_demo_content::add_product( array( 
	'title' => 'Smartphone Photo Lens',
	'file' => 'product_default.txt',
	'product_sku' => 'gd009',
	'product_price' => '9.9',
	'product_image_td_id' => 'td_pic_p_7',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_gadgets_id ),
	'product_tags' => array( 'camera','gadgets','lens' ),
	'short_description' => '<p>Professional camera lens for smartphone and tablet.<br />
Macro, 0.45x, 12.5x super wide angle lens for all smartphone models and tablets.</p>
',
	'product_type' => 'simple',
));

$product_vr_handle_touch_controller_id = td_demo_content::add_product( array( 
	'title' => 'VR Handle Touch Controller',
	'file' => 'product_default.txt',
	'product_price' => '42',
	'product_sku' => 'gd008',
	'product_image_td_id' => 'td_pic_p_12',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_gadgets_id ),
	'product_tags' => array( 'controller','gadgets','gaming','vr' ),
	'short_description' => '<p>VR Handle Controller stand for Oculus Quest Rift.<br />
The brackets keep your handle firmly in place and protect it from scratches.</p>
',
	'product_type' => 'simple',
));

$product_mobile_gamepad_controller_id = td_demo_content::add_product( array(
    'title' => 'Mobile Gamepad Controller',
    'file' => 'product_default.txt',
    'product_sku' => 'gd001',
    'product_price' => '30',
    'product_image_td_id' => 'td_pic_p_6',
    //'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ),
    'product_categories' => array( $p_cat_gadgets_id ),
    'product_tags' => array( 'gadgets','gaming','keyboard','usb' ),
    'short_description' => '<p>Gaming keyboard mouse converter for Android, IOS, IPAD, Bluetooth. Applicable to mobile phone, tablet, desktop or notebook.</p>
',
    'product_type' => 'simple',
));

$product_usb_docking_station_id = td_demo_content::add_product( array(
    'title' => 'USB Docking Station',
    'file' => 'product_default.txt',
    'product_sku' => 'gd002',
    'product_price' => '25',
    'product_image_td_id' => 'td_pic_p_5',
    //'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ),
    'product_categories' => array( $p_cat_gadgets_id ),
    'product_tags' => array( 'docking','gadgets','usb' ),
    'short_description' => '<p>Laptop dock dual HDMI, USB type C, docking station for laptop, pc, mac, smartphone and tablet.</p>
',
    'product_type' => 'simple',
));

$product_bluetooth_joystick_gamepad_id = td_demo_content::add_product( array(
    'title' => 'Bluetooth Joystick Gamepad',
    'file' => 'product_default.txt',
    'product_sku' => 'gd003',
    'product_price' => '29',
    'product_image_td_id' => 'td_pic_p_4',
    //'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ),
    'product_categories' => array( $p_cat_gadgets_id ),
    'product_tags' => array( 'controller','gadgets','gaming' ),
    'short_description' => '<p>Stick wireless controller for PS3 or for PC.<br />
Can play 4, on PC and Android.<br />
The price does not include the cable.</p>
',
    'product_type' => 'simple',
));

$product_mobile_phone_fast_charger_id = td_demo_content::add_product( array(
    'title' => 'Mobile Phone Fast Charger',
    'file' => 'product_default.txt',
    'product_sku' => 'gd004',
    'product_price' => '9.9',
    'product_image_td_id' => 'td_pic_p_3',
    //'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ),
    'product_categories' => array( $p_cat_gadgets_id ),
    'product_tags' => array( 'cable','charger','gadgets','usb' ),
    'short_description' => '<p>Fast charger USB mobile phone charger for smartphones with USB type C charger cable.</p>
',
    'product_type' => 'simple',
));

$product_car_phone_stand_id = td_demo_content::add_product( array(
    'title' => 'Car Phone Stand',
    'file' => 'product_default.txt',
    'product_sku' => 'gd005',
    'product_price' => '16',
    'product_image_td_id' => 'td_pic_p_8',
    //'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ),
    'product_categories' => array( $p_cat_gadgets_id ),
    'product_tags' => array( 'car','gadgets','mount' ),
    'short_description' => '<p>Gravity Car Phone Holder with air vent clip mount.<br />
No magnetic mobile support cell stand for iPhone smartphone in car.</p>
',
    'product_type' => 'simple',
));

$product_portable_battery_case_id = td_demo_content::add_product( array(
    'title' => 'Portable Battery Case',
    'file' => 'product_default.txt',
    'product_sku' => 'gd006',
    'product_price' => '9.9',
    'product_image_td_id' => 'td_pic_p_2',
    //'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ),
    'product_categories' => array( $p_cat_gadgets_id ),
    'product_tags' => array( 'battery','case','gadgets' ),
    'short_description' => '<p>Unique Design and easy to carry.<br />
Not only a power bank but also a good phone case.<br />
Good product for travel or long distance business.<br />
High capacity battery case make your phone standby for a long time.</p>
',
    'product_type' => 'simple',
));

$product_mobile_phone_armband_id = td_demo_content::add_product( array(
    'title' => 'Mobile Phone Armband',
    'file' => 'product_default.txt',
    'product_sku' => 'gd007',
    'product_price' => '8',
    'product_image_td_id' => 'td_pic_p_1',
    //'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ),
    'product_categories' => array( $p_cat_gadgets_id ),
    'product_tags' => array( 'arm','band','gadgets' ),
    'short_description' => '<p>Never leave your phone behind with the secure armband that can hold your phone with a case on.<br />
Discreet and stylish design makes this the perfect phone holder for an active lifestyle.<br />
The soft material is very comfortable on your arm.</p>
',
    'product_type' => 'simple',
));


/*  ---------------------------------------------------------------------------- 
	MENUS
*/
$menu_td_demo_header_menu_id = td_demo_menus::create_menu('td-demo-header-menu', '');


/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/

$template_header_template_blog_gadgets_id = td_demo_content::add_cloud_template(array(
    'title' => 'Header Template - Blog Gadgets',
    'file' => 'header_cloud_template.txt',
    'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_blog_gadgets_id);

update_post_meta( $template_header_template_blog_gadgets_id, 'header_mobile_menu_id', $menu_td_demo_header_menu_id);


$template_footer_template_blog_gadgets_id = td_demo_content::add_cloud_template(array(
    'title' => 'Footer Template - Blog Gadgets',
    'file' => 'footer_cloud_template.txt',
    'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_blog_gadgets_id);


$template_tag_template_blog_gadgets_id = td_demo_content::add_cloud_template(array(
	'title' => 'Tag Template - Blog Gadgets',
	'file' => 'tag_cloud_template.txt',
	'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_blog_gadgets_id);


$template_date_template_blog_gadgets_id = td_demo_content::add_cloud_template(array(
	'title' => 'Date Template - Blog Gadgets',
	'file' => 'date_cloud_template.txt',
	'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_blog_gadgets_id);


$template_search_template_blog_gadgets_id = td_demo_content::add_cloud_template(array(
	'title' => 'Search Template - Blog Gadgets',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_blog_gadgets_id);


$template_author_template_blog_gadgets_id = td_demo_content::add_cloud_template(array(
	'title' => 'Author Template - Blog Gadgets',
	'file' => 'author_cloud_template.txt',
	'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_blog_gadgets_id);


$template_404_template_blog_gadgets_id = td_demo_content::add_cloud_template(array(
	'title' => '404 Template - Blog Gadgets',
	'file' => '404_cloud_template.txt',
	'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_blog_gadgets_id);


$template_category_template_blog_gadgets_id = td_demo_content::add_cloud_template(array(
	'title' => 'Category Template - Blog Gadgets',
	'file' => 'cat_cloud_template.txt',
	'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_blog_gadgets_id);


$template_woo_search_archive_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Woo Search Archive Template',
	'file' => 'woo_search_archive_cloud_template.txt',
	'template_type' => 'woo_search_archive',
));

td_demo_misc::update_global_woo_search_archive_template( 'tdb_template_' . $template_woo_search_archive_template_id);


$template_single_post_template_blog_gadgets_id = td_demo_content::add_cloud_template(array(
	'title' => 'Single Post Template - Blog Gadgets',
	'file' => 'post_cloud_template.txt',
	'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_post_template_blog_gadgets_id);


$template_woo_archive_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Woo Archive Template',
	'file' => 'woo_archive_cloud_template.txt',
	'template_type' => 'woo_archive',
));

td_demo_misc::update_global_woo_archive_template( 'tdb_template_' . $template_woo_archive_template_id);


$template_woo_product_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Woo Product Template',
	'file' => 'woo_product_cloud_template.txt',
	'template_type' => 'woo_product',
));

td_demo_misc::update_global_woo_product_template( 'tdb_template_' . $template_woo_product_template_id);


$template_woo_search_archive_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Woo Search Archive',
    'file' => 'woo_search_archive_cloud_template.txt',
    'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_woo_search_archive_template_id);


$template_woo_shop_base_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Woo Shop Base Template',
    'file' => 'woo_shop_base_cloud_template.txt',
    'template_type' => 'woo_shop_base',
));

td_demo_misc::update_global_woo_shop_base_template( 'tdb_template_' . $template_woo_shop_base_template_id);


/*  ----------------------------------------------------------------------------
	PAGES
*/
$page_home_id = td_demo_content::add_page(array(
    'title' => 'Home',
    'file' => 'home.txt',
    'homepage' => true,
));


/*  ----------------------------------------------------------------------------
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Reviews',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_reviews_id,
    'parent_id' => ''
), true);

$menu_item_1_id = td_demo_menus::add_category(array(
    'title' => 'Gaming',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_gaming_id,
    'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_category(array(
    'title' => 'Internet',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_internet_id,
    'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_category(array(
    'title' => 'Social Networks',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_social_networks_id,
    'parent_id' => ''
));


/*  ---------------------------------------------------------------------------- 
	GENERAL SETTINGS
*/
td_demo_misc::update_background('', false);

td_demo_misc::update_background_mobile('td_pic_7');

td_demo_misc::update_background_login('td_pic_1');

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