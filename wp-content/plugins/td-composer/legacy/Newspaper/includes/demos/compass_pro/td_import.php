<?php


/*  ----------------------------------------------------------------------------
	PAGES
*/
$page_search_modal_compass_id = td_demo_content::add_page( array(
    'title' => 'Search Modal Compass',
    'file' => 'search_modal_compass.txt',
    'demo_unique_id' => '98633e806dbc7fe',
));

$page_tds_switching_plans_wizard_id = td_demo_content::add_page( array(
    'title' => 'Subscribe',
    'file' => 'tds_switching_plans_wizard.txt',
    'demo_unique_id' => '38633e806dbcd68',
));

$page_pricing_plans_modal_id = td_demo_content::add_page( array(
    'title' => 'Pricing Plans Modal',
    'file' => 'pricing_plans_modal.txt',
    'demo_unique_id' => '65633e806dbd23d',
));

$page_homepage_id = td_demo_content::add_page( array(
    'title' => 'Homepage',
    'file' => 'homepage.txt',
    'homepage' => true,
    'demo_unique_id' => '16633e806dbdce8',
));

/*  ---------------------------------------------------------------------------- 
	SUBSCRIPTION - start phase 1
*/
update_option('users_can_register', true);
global $wpdb;
$disable_wizard = $wpdb->get_var( "SELECT value FROM tds_options WHERE name = 'disable_wizard'");
if ( empty($disable_wizard) ) {

    td_demo_subscription::add_account_details( array(
            'company_name' => 'Demo Company',
            'billing_cui' => '75864589',
            'billing_j' => '10/120/2021',
            'billing_address' => '2656 Farm Meadow Drive',
            'billing_city' => 'Tucson',
            'billing_country' => 'Arizona',
            'billing_email' => 'yourcompany@website.com',
            'billing_bank_account' => 'NL43INGB4186520410',
            'billing_post_code' => '85712',
            'billing_vat_number' => '75864589',
            'options' => 'a:1:{s:15:"td_demo_content";i:1;}',
        )
    );

    td_demo_subscription::add_payment_bank( array(
            'account_name' => 'Alpha Bank Account',
            'account_number' => '123456',
            'bank_name' => 'Alpha Bank',
            'routing_number' => '123456',
            'iban' => 'NL43INGB4186520410',
            'bic_swift' => '123456',
            'description' => 'Make your payment directly into our bank account. Please use your Subscription ID as the payment reference. Your subscription will be activated when the funds are cleared in our account.',
            'instruction' => 'Payment method instructions go here.',
            'is_active' => '1',
            'options' => 'a:1:{s:15:"td_demo_content";i:1;}',
        )
    );

    td_demo_subscription::add_option( array(
            'name' => 'td_demo_content',
            'value' => '1',
        )
    );

}



$plan_yearly_plan_id = td_demo_subscription::add_plan( array(
        'name' => 'Yearly Plan',
        'price' => '540',
        'months_in_cycle' => '12',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"55633e806d8f3f8";}',
    )
);

$plan_monthly_plan_id = td_demo_subscription::add_plan( array(
        'name' => 'Monthly Plan',
        'price' => '45',
        'months_in_cycle' => '1',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"94633e806d8f44a";}',
    )
);

$plan_free_plan_id = td_demo_subscription::add_plan( array(
        'name' => 'Free Plan',
        'price' => '',
        'months_in_cycle' => '',
        'trial_days' => '0',
        'is_free' => '1',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"97633e806d8f4f4";}',
    )
);

$page_payment_page_id_id = td_demo_content::add_page( array(
    'title' => 'Checkout - compass_pro',
    'file' => 'tds_checkout.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'payment_page_id',
        'value' => $page_payment_page_id_id,
    )
);

$page_my_account_page_id_id = td_demo_content::add_page( array(
    'title' => 'My Account - compass_pro',
    'file' => 'tds_my_account.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'my_account_page_id',
        'value' => $page_my_account_page_id_id,
    )
);

$page_create_account_page_id_id = td_demo_content::add_page( array(
    'title' => 'Login/Register - compass_pro',
    'file' => 'tds_login_register.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'create_account_page_id',
        'value' => $page_create_account_page_id_id,
    )
);

td_demo_subscription::add_option( array(
        'name' => 'go_wizard',
        'value' => '1',
    )
);

td_demo_subscription::add_option( array(
        'name' => 'wizard_company_complete',
        'value' => '1',
    )
);

td_demo_subscription::add_option( array(
        'name' => 'wizard_payments_complete',
        'value' => '1',
    )
);

td_demo_subscription::add_option( array(
        'name' => 'wizard_plans_complete',
        'value' => '1',
    )
);

td_demo_subscription::add_option( array(
        'name' => 'wizard_locker_complete',
        'value' => '1',
    )
);

td_demo_subscription::add_option( array(
        'name' => 'disable_wizard',
        'value' => '1',
    )
);


/*  ---------------------------------------------------------------------------- 
	SUBSCRIPTION - end phase 1
*/

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

$cat_artists_id = td_demo_category::add_category(array(
	'category_name' => 'Artists',
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

$cat_news_id = td_demo_category::add_category(array(
	'category_name' => 'News',
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
	SUBSCRIPTION - start phase 2
*/

/*  ---------------------------------------------------------------------------- 
	SUBSCRIPTIONS
*/
// add locker
$post_tds_default_wizard_locker_id = td_demo_content::add_post( array(
        'post_type' => 'tds_locker',
        'title' => 'Wizard Locker (default)',
        'file' => '',
        'categories_id_array' => [],
        'tds_locker_settings' => array(
            'tds_title' => 'Exclusive Content',
            'tds_message' => 'Create an account by writing your email address down and then choose a subscription plan from the redirected page to unlock.',
            'tds_submit_btn_text' => 'Subscribe',
            'tds_pp_msg' => 'I consent to processing of my data according to <a href=\"#\">Terms of Use</a> & <a href=\"#\">Privacy Policy</a>.',
            'tds_locker_cf_1_name' => 'Custom field 1',
            'tds_locker_cf_2_name' => 'Custom field 2',
            'tds_locker_cf_3_name' => 'Custom field 3',
        ),
        'tds_payable' => 'paid_subscription',
        'tds_paid_subs_page_id' => $page_tds_switching_plans_wizard_id,
        'tds_paid_subs_plan_ids' => [$plan_yearly_plan_id,$plan_monthly_plan_id,$plan_free_plan_id],
        'tds_locker_styles' => array(
            'tds_bg_color' => '#0b0c0c',
            'all_tds_border' => '0',
            'all_tds_border_color' => '#353939',
            'all_tds_shadow' => '40px',
            'all_tds_shadow_color' => 'rgba(13,169,184,0.6)',
            'tds_title_color' => '#ffffff',
            'tds_message_color' => '#5d6363',
            'tds_submit_btn_text_color' => '#ffffff',
            'tds_submit_btn_text_color_h' => '#0b0c0c',
            'tds_submit_btn_bg_color' => '#0da3ac',
            'tds_submit_btn_bg_color_h' => '#5de6e7',
            'tds_after_btn_text_color' => '#5d6363',
            'tds_pp_checked_color' => '#5de6e7',
            'tds_pp_check_bg' => '#0b0c0c',
            'tds_pp_check_bg_f' => '#0b0c0c',
            'tds_pp_check_border_color' => '#353939',
            'tds_pp_check_border_color_f' => '#5de6e7',
            'tds_pp_msg_color' => '#5d6363',
            'tds_pp_msg_links_color' => '#0da3ac',
            'tds_pp_msg_links_color_h' => '#5de6e7',
            'tds_general_font_family' => 'compass-global1_global',
            'tds_title_font_family' => 'compass-global1_global',
            'tds_title_font_size' => '35',
            'tds_title_font_line_height' => '1.2',
            'tds_title_font_weight' => '700',
            'tds_message_font_family' => 'compass-global1_global',
            'tds_message_font_size' => '16',
            'tds_message_font_line_height' => '1.2',
            'tds_message_font_weight' => '500',
            'tds_submit_btn_text_font_family' => 'compass-global1_global',
            'tds_submit_btn_text_font_size' => '14',
            'tds_submit_btn_text_font_line_height' => '1.2',
            'tds_submit_btn_text_font_weight' => '700',
            'tds_submit_btn_text_font_transform' => 'uppercase',
            'tds_submit_btn_text_font_spacing' => '1',
            'tds_after_btn_text_font_family' => 'compass-global1_global',
            'tds_after_btn_text_font_size' => '12',
            'tds_after_btn_text_font_line_height' => '1.2',
            'tds_after_btn_text_font_weight' => '700',
            'tds_pp_msg_font_family' => 'compass-global1_global',
            'tds_pp_msg_font_size' => '12',
            'tds_pp_msg_font_line_height' => '1.2',
            'tds_pp_msg_font_weight' => '700',
        ),
    )
);

// add post meta for default locker
td_demo_content::add_locker_meta( array(
        'tds_locker_id' => (int) get_option( 'tds_default_locker_id' ),
        'tds_locker_meta' => array(
            'tds_locker_settings' => array(
                'tds_title' => 'This Content Is Only For Subscribers',
                'tds_message' => 'Please subscribe to unlock this content. Enter your email to get access.',
                'tds_input_placeholder' => 'Please enter your email address.',
                'tds_submit_btn_text' => 'Subscribe to unlock',
                'tds_after_btn_text' => 'Your email address is 100% safe from spam!',
                'tds_pp_msg' => 'I consent to processing of my data according to <a href=\"#\">Terms of Use</a> & <a href=\"#\">Privacy Policy</a>',
            ),
        )
    )
);

td_util::update_option('tds_demo_options', 'a:1:{s:5:"plans";a:3:{i:0;a:2:{s:9:"unique_id";s:15:"55633e806d8f3f8";s:4:"name";s:11:"Yearly Plan";}i:1;a:2:{s:9:"unique_id";s:15:"94633e806d8f44a";s:4:"name";s:12:"Monthly Plan";}i:2;a:2:{s:9:"unique_id";s:15:"97633e806d8f4f4";s:4:"name";s:9:"Free Plan";}}}');


/*  ---------------------------------------------------------------------------- 
	SUBSCRIPTION - end phase 2
*/

/*  ---------------------------------------------------------------------------- 
	POSTS
*/
$post_td_post_left_to_suffer_brings_the_nu_deathcore_with_fatal_attraction_id = td_demo_content::add_post( array(
	'title' => 'Left to Suffer Brings The Nü-Deathcore With \"Fatal Attraction\"',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_starcrawler_peels_out_hard_with_new_single_roadkill_id = td_demo_content::add_post( array(
	'title' => 'Starcrawler Peels Out Hard With New Single \"Roadkill\"',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_oceans_of_slumber_releases_moody_new_single_hearts_of_stone_id = td_demo_content::add_post( array(
	'title' => 'Oceans of Slumber Releases Moody New Single \"Hearts Of Stone\"',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_wormrot_streams_three_new_more_experimental_songs_id = td_demo_content::add_post( array(
	'title' => 'Wormrot Streams Three New, More Experimental Songs',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_within_temptation_vocalist_guests_on_asking_alexandrias_new_version_of_faded_out_id = td_demo_content::add_post( array(
	'title' => 'Within Temptation Vocalist Guests On Asking Alexandria\'s New Version Of \"Faded Out\"',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_royal_thunder_demoing_first_new_album_since_2017_id = td_demo_content::add_post( array(
	'title' => 'Royal Thunder Demoing First New Album Since 2017',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_tesseract_is_in_the_studio_ready_to_start_recording_id = td_demo_content::add_post( array(
	'title' => 'Tesseract Is In The Studio Ready to Start Recording',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_perera_elsewhere_announces_new_album_home_id = td_demo_content::add_post( array(
	'title' => 'Perera Elsewhere Announces New Album Home',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_sky_ferreira_shares_first_new_song_in_three_years_id = td_demo_content::add_post( array(
	'title' => 'Sky Ferreira Shares First New Song in Three Years',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_judas_priest_is_recording_their_new_album_id = td_demo_content::add_post( array(
	'title' => 'Judas Priest Is Recording Their New Album',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_music_id,),
));

$post_td_post_system_of_a_downs_serj_tankian_lends_his_vocals_to_metal_hellsinger_game_id = td_demo_content::add_post( array(
	'title' => 'System of a Down\'s Serj Tankian Lends His Vocals To Metal: Hellsinger Game',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_artists_id,),
));

$post_td_post_linkin_park_reissues_minutues_to_midnight_with_four_bonus_tracks_id = td_demo_content::add_post( array(
	'title' => 'Linkin Park Reissues Minutues To Midnight With Four Bonus Tracks',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_artists_id,),
));

$post_td_post_septicflesh_drops_chaotic_new_single_coming_storm_id = td_demo_content::add_post( array(
	'title' => 'Septicflesh Drops Chaotic New Single \"Coming Storm\"',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_artists_id,),
));

$post_td_post_evanescence_parts_ways_with_guitarist_jen_majura_id = td_demo_content::add_post( array(
	'title' => 'Evanescence Parts Ways With Guitarist Jen Majura',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_artists_id,),
));

$post_td_post_this_slipknot_show_from_1999_is_so_insanely_energetic_id = td_demo_content::add_post( array(
	'title' => 'This Slipknot Show From 1999 Is So Insanely Energetic',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_artists_id,),
));

$post_td_post_deftones_announces_small_london_show_for_this_june_id = td_demo_content::add_post( array(
	'title' => 'Deftones Announces Small London Show For This June',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_parkway_drive_issues_statement_after_tour_cancellation_we_are_here_to_stay_id = td_demo_content::add_post( array(
	'title' => 'Parkway Drive Issues Statement After Tour Cancellation: \"We Are Here To Stay\"',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_tombs_streams_cover_of_motorheads_killed_by_death_id = td_demo_content::add_post( array(
	'title' => 'Tombs Streams Cover Of Motörhead\'s \"Killed By Death\"',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_new_uk_trust_aims_to_save_venues_by_letting_fans_invest_id = td_demo_content::add_post( array(
	'title' => 'New UK Trust Aims To Save Venues By Letting Fans Invest',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_new_weird_al_yankovic_graphic_novel_announced_id = td_demo_content::add_post( array(
	'title' => 'New Weird Al Yankovic Graphic Novel Announced',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_news_id,),
));

$post_td_post_evanescence_announces_new_touring_lineup_for_2022_id = td_demo_content::add_post( array(
	'title' => 'Evanescence Announces New Touring Lineup for 2022',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_events_id,),
));

$post_td_post_my_chemical_romance_world_tour_2022_rescheduling_id = td_demo_content::add_post( array(
	'title' => 'My Chemical Romance World Tour 2022 Rescheduling',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_events_id,),
));

$post_td_post_bullet_for_my_valentine_jinjer_atreyu_announce_2023_uk_tour_id = td_demo_content::add_post( array(
	'title' => 'Bullet for my Valentine, Jinjer & Atreyu Announce 2023 UK Tour',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_events_id,),
));

$post_td_post_alex_g_announces_tour_plus_a_new_song_called_blessing_id = td_demo_content::add_post( array(
	'title' => 'Alex G Announces Tour plus a new song called Blessing',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_events_id,),
));

$post_td_post_as_i_lay_dying_announces_european_tour_dates_id = td_demo_content::add_post( array(
	'title' => 'As I Lay Dying Announces European Tour Dates',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_events_id,),
));


/*  ---------------------------------------------------------------------------- 
	PRODUCTS
*/

/*  ---------------------------------------------------------------------------- 
	TAXONOMIES
*/
$tax_term_instrumentals_and_vocals_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Instrumentals &amp; Vocals',
	'taxonomy' => 'tdc-review-criteria',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => 'General technicalities regarding the artist\'s overall skills and abilities.',
));

$tax_term_lyrics_and_mood_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Lyrics &amp; Mood',
	'taxonomy' => 'tdc-review-criteria',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => 'Creating and painting a picture inside each song.',
));

$tax_term_overall_sound_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Overall Sound',
	'taxonomy' => 'tdc-review-criteria',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => 'The atmosphere and general sound quality of the album.',
));

$tax_term_edm_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'EDM',
	'taxonomy' => 'tdtax_music',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => 'Maecenas pellentesque ut sem ac gravida. Phasellus vitae eleifend metus. Nulla massa purus, efficitur vel elit quis, molestie sollicitudin tortor. Aliquam in dapibus metus. Donec varius lacus justo, condimentum molestie metus maximus nec. Morbi dictum turpis quis dui fringilla elementum.',
));

$tax_term_hip_hop_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Hip Hop',
	'taxonomy' => 'tdtax_music',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => 'Maecenas pellentesque ut sem ac gravida. Phasellus vitae eleifend metus. Nulla massa purus, efficitur vel elit quis, molestie sollicitudin tortor. Aliquam in dapibus metus. Donec varius lacus justo, condimentum molestie metus maximus nec. Morbi dictum turpis quis dui fringilla elementum.',
));

$tax_term_metal_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Metal',
	'taxonomy' => 'tdtax_music',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => 'Maecenas pellentesque ut sem ac gravida. Phasellus vitae eleifend metus. Nulla massa purus, efficitur vel elit quis, molestie sollicitudin tortor. Aliquam in dapibus metus. Donec varius lacus justo, condimentum molestie metus maximus nec. Morbi dictum turpis quis dui fringilla elementum.',
));

$tax_term_pop_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Pop',
	'taxonomy' => 'tdtax_music',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => 'Maecenas pellentesque ut sem ac gravida. Phasellus vitae eleifend metus. Nulla massa purus, efficitur vel elit quis, molestie sollicitudin tortor. Aliquam in dapibus metus. Donec varius lacus justo, condimentum molestie metus maximus nec. Morbi dictum turpis quis dui fringilla elementum.',
));

$tax_term_rock_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Rock',
	'taxonomy' => 'tdtax_music',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => 'Maecenas pellentesque ut sem ac gravida. Phasellus vitae eleifend metus. Nulla massa purus, efficitur vel elit quis, molestie sollicitudin tortor. Aliquam in dapibus metus. Donec varius lacus justo, condimentum molestie metus maximus nec. Morbi dictum turpis quis dui fringilla elementum.',
));

$tax_term_alt_pop_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'alt pop',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_alternative_metal_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'alternative metal',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_alternative_rock_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'alternative rock',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_art_pop_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'art pop',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_art_rock_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'art rock',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_atmospheric_sludge_metal_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'atmospheric sludge metal',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_black_metal_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'black metal',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_breakcore_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'breakcore',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_chamber_rock_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'chamber rock',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_chicago_house_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'chicago house',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_conscious_hip_hop_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'conscious hip hop',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_contemporary_rb_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Contemporary R&amp;B',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_country_rap_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'country rap',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_dance_pop_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'dance pop',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_death_metal_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'death metal',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_deathrock_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'deathrock',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_deconstructed_club_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'deconstructed club',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_doom_metal_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'doom metal',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_drill_and_bass_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'drill and bass',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_drum_and_bass_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'drum and bass',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_edm_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'EDM',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_electro_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'electro',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_electro_folk_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'electro folk',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_electronic_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'electronic',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_electronic_rock_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'electronic rock',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_electropop_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'electropop',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_electrorock_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'electrorock',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_emo_rap_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'emo rap',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_experimental_hip_hop_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'experimental hip hop',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_folk_metal_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Folk Metal',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_folk_pop_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'folk pop',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_future_bass_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'future bass',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_gothic_rock_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'gothic rock',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_groove_metal_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'groove metal',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_hard_drum_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'hard drum',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_hard_rock_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'hard rock',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_hip_hop_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'hip hop',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_house_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'House',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_hyperpop_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'hyperpop',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_indie_folk_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'indie folk',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_indie_pop_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'indie pop',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_indie_rock_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'indie rock',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_industrial_metal_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Industrial Metal',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_industrial_rock_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'industrial rock',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_iranian_metal_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'iranian metal',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_jazz_rap_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'jazz rap',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_keep_going_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'keep going',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_latin_electronic_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'latin electronic',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_melodic_metalcore_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'melodic metalcore',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_metal_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'metal',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_metalcore_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'metalcore',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_new_wave_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'new wave',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_noise_rock_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'noise rock',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_nu_metal_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Nu Metal',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_outsider_house_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'outsider house',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_pop_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'pop',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_pop_punk_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'pop punk',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_pop_rap_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'pop rap',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_pop_rap_2_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'pop rap\\',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_pop_rock_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'pop rock',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_post_hardcore_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'post hardcore',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_post_metal_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'post metal',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_post_punk_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'post punk',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_post_rock_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'post rock',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_progressive_metal_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'progressive metal',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_rb_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'R&amp;B',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_rap_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'rap',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_rap_metal_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'Rap Metal',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_rock_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'rock',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_southern_hip_hop_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'southern hip hop',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_symphonic_metal_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'symphonic metal',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_synth_pop_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'synth pop',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_synth_punk_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'synth punk',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_teen_pop_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'teen pop',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_thrash_metal_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'thrash metal',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_trap_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'trap',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_trap_rap_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'trap rap',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_uk_bass_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'UK bass',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_uk_hip_hop_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'UK hip hop',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_west_coast_hip_hop_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'west coast hip hop',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));

$tax_term_wonky_id = td_demo_tax::add_taxonomy( array(
	'taxonomy_name' => 'wonky',
	'taxonomy' => 'tdtax_subgenres',
	'taxonomy_template' => '',
	'parent_id' => 0,
	'description' => '',
));


/*  ----------------------------------------------------------------------------
	CPTs
*/
$cpt_underoath_voyeurist_id = td_demo_content::add_cpt( array(
    'title' => 'Underoath ― Voyeurist',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_6',
    'post_meta' => array(
        'tdcf_release_date' => 'MTQvMDEvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ny45',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ny44',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'RmVhcmxlc3M=',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly91bmRlcm9hdGg3NzcuY29tLw==',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gRGFtbiBFeGN1c2VzDQoyLiBIYWxsZWx1amFoDQozLiBJJ20gUHJldHR5IFN1cmUgSSdtIE91dCBvZiBMdWNrIGFuZCBIYXZlIE5vIEZyaWVuZHMNCjQuIEN5Y2xlIChmZWF0LiBHaG9zdGVtYW5lKQ0KNS4gVGhvcm4NCjYuIChObyBPYXNpcykNCjcuIFRha2UgYSBCcmVhdGgNCjguIFdlJ3JlIEFsbCBHb25uYSBEaWUNCjkuIE51bWINCjEwLiBQbmV1bW9uaWE=',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly91bmRlcm9hdGguYmFuZGNhbXAuY29tL2FsYnVtL3ZveWV1cmlzdA==',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_rock_id ),
        'tdtax_subgenres' => array( $tax_term_metalcore_id, $tax_term_post_hardcore_id, $tax_term_rock_id ),
    ),
));

$cpt_avril_lavigne_love_sux_id = td_demo_content::add_cpt( array(
    'title' => 'Avril Lavigne ― Love Sux',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_7',
    'post_meta' => array(
        'tdcf_release_date' => 'MjUvMDIvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ni41',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'NS4y',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'RWxla3RyYQ==',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly9sb3Zlc3V4LmF2cmlsbGF2aWduZS5jb20v',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gQ2Fubm9uYmFsbA0KMi4gQm9pcyBMaWUgKGZlYXQuIE1hY2hpbmUgR3VuIEtlbGx5KQ0KMy4gQml0ZSBNZQ0KNC4gTG92ZSBJdCBXaGVuIFlvdSBIYXRlIE1lIChmZWF0LiBCbGFja2JlYXIpDQo1LiBMb3ZlIFN1eA0KNi4gS2lzcyBNZSBMaWtlIHRoZSBXb3JsZCBJcyBFbmRpbmcNCjcuIEF2YWxhbmNoZQ0KOC4gRMOpasOgIFZ1DQo5LiBGLlUuDQoxMC4gQWxsIEkgV2FudGVkIChmZWF0LiBNYXJrIEhvcHB1cykNCjExLiBEYXJlIHRvIExvdmUgTWUNCjEyLiBCcmVhayBvZiBhIEhlYXJ0YWNoZQ==',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvbS9Mb3ZlLVN1eC1FeHBsaWNpdC1BdnJpbC1MYXZpZ25lL2RwL0IwOVE1SFdNU0I=',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_rock_id ),
        'tdtax_subgenres' => array( $tax_term_pop_punk_id, $tax_term_pop_rock_id, $tax_term_rock_id ),
    ),
));

$cpt_machine_gun_kelly_mainstream_sellout_id = td_demo_content::add_cpt( array(
    'title' => 'Machine Gun Kelly ― Mainstream Sellout',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_8',
    'post_meta' => array(
        'tdcf_release_date' => 'MjUvMDMvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'NS44',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'My4y',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'SW50ZXJzY29wZQ==',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly93d3cubWFjaGluZWd1bmtlbGx5LmNvbS8=',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gQm9ybiB3aXRoIEhvcm5zDQoyLiBHb2QgU2F2ZSBNZQ0KMy4gTWF5YmUgKGZlYXQuIEJyaW5nIE1lIHRoZSBIb3Jpem9uKQ0KNC4gRHJ1ZyBEZWFsZXIgKGZlYXQuIExpbCBXYXluZSkNCjUuIFdhbGwgb2YgRmFtZSAoSW50ZXJsdWRlKQ0KNi4gTWFpbnN0cmVhbSBTZWxsb3V0DQo3LiBNYWtlIFVwIFNleCAod2l0aCBCbGFja2JlYXIpDQo4LiBFbW8gR2lybCAod2l0aCBXaWxsb3cpDQo5LiA1MTUwDQoxMC4gUGFwZXJjdXRzDQoxMS4gV1c0DQoxMi4gQXkhICh3aXRoIExpbCBXYXluZSkNCjEzLiBGYWtlIExvdmUgRG9uJ3QgTGFzdCAod2l0aCBJYW5uIERpb3IpDQoxNC4gRGllIGluIENhbGlmb3JuaWENCjE1LiBTaWQgJiBOYW5jeQ0KMTYuIFR3aW4gRmxhbWU=',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly9zdG9yZS5tYWNoaW5lZ3Vua2VsbHkuY29tL3Byb2R1Y3RzL21haW5zdHJlYW0tc2VsbG91dC1jZC1wcmUtb3JkZXItMQ==',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_rock_id ),
        'tdtax_subgenres' => array( $tax_term_pop_punk_id, $tax_term_pop_rock_id, $tax_term_rock_id ),
    ),
));

$cpt_starset_horizons_id = td_demo_content::add_cpt( array(
    'title' => 'Starset ― Horizons',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_9',
    'post_meta' => array(
        'tdcf_release_date' => 'MjIvMTAvMjAyMQ==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ny41',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ny41',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'RmVhcmxlc3M=',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly9zdGFyc2V0b25saW5lLmNvbS8=',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gVW52ZWlsaW5nIHRoZSBBcmNoaXRlY3R1cmUNCjIuIFRoZSBCcmVhY2gNCjMuIE90aGVyd29ybGRseQ0KNC4gSWNhcnVzDQo1LiBFYXJ0aHJpc2UNCjYuIExlYXZpbmcgVGhpcyBXb3JsZCBCZWhpbmQNCjcuIERldm9sdXRpb24NCjguIEFubmloaWxhdGVkIExvdmUNCjkuIEFsY2hlbXkNCjEwLiBEaXNhcHBlYXINCjExLiBUaGlzIEVuZGxlc3MgRW5kZWF2b3INCjEyLiBTeW1iaW90aWMNCjEzLiBEcmVhbWNhdGNoZXINCjE0LiBUdW5uZWx2aXNpb24NCjE1LiBJbmZlY3RlZA0KMTYuIFNvbWV0aGluZyBXaWNrZWQ=',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvbS9Ib3Jpem9ucy1TVEFSU0VUL2RwL0IwOUZGRDNRTDI=',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_rock_id ),
        'tdtax_subgenres' => array( $tax_term_alternative_metal_id, $tax_term_alternative_rock_id, $tax_term_rock_id ),
    ),
));

$cpt_placebo_never_let_me_go_id = td_demo_content::add_cpt( array(
    'title' => 'Placebo ― Never Let Me Go',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_10',
    'post_meta' => array(
        'tdcf_release_date' => 'MjUvMDMvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ny42',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ny4w',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'RWxldmF0b3IgTGFkeQ==',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly93d3cucGxhY2Vib3dvcmxkLmNvLnVrLw==',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gRm9yZXZlciBDaGVtaWNhbHMNCjIuIEJlYXV0aWZ1bCBKYW1lcw0KMy4gSHVneg0KNC4gSGFwcHkgQmlydGhkYXkgaW4gdGhlIFNreQ0KNS4gVGhlIFByb2RpZ2FsDQo2LiBTdXJyb3VuZGVkIEJ5IFNwaWVzDQo3LiBUcnkgQmV0dGVyIE5leHQgVGltZQ0KOC4gU2FkIFdoaXRlIFJlZ2dhZQ0KOS4gVHdpbiBEZW1vbnMNCjEwLiBDaGVtdHJhaWxzDQoxMS4gVGhpcyBpcyBXaGF0IFlvdSBXYW50ZWQNCjEyLiBXZW50IE1pc3NpbmcNCjEzLiBGaXggWW91cnNlbGY=',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvbS9OZXZlci1MZXQtTWUtR28tUGxhY2Viby9kcC9CMDlMM1pKTDRD',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_rock_id ),
        'tdtax_subgenres' => array( $tax_term_alternative_rock_id, $tax_term_gothic_rock_id, $tax_term_rock_id ),
    ),
));

$cpt_set_it_off_elsewhere_id = td_demo_content::add_cpt( array(
    'title' => 'Set It Off ― Elsewhere',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_1',
    'post_meta' => array(
        'tdcf_release_date' => 'MTEvMDMvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'NS44',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ni45',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'RmVhcmxlc3M=',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly9zZXRpdG9mZmJhbmQuY29tLw==',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gU2tlbGV0b24NCjIuIFByb2plY3Rvcg0KMy4gQ3V0IE9mZg0KNC4gTG9vc2UgQ2Fubm9uDQo1LiBXaHkgRG8gSQ0KNi4gQXMgR29vZCBBcyBJdCBHZXRzDQo3LiBXaG8ncyBJbiBDb250cm9sDQo4LiBUYXN0ZSBvZiB0aGUgR29vZCBMaWZlDQo5LiBXaHkgTm90IE1lDQoxMC4gRGFuZ2Vyb3VzDQoxMS4gQ29yZGlhbA0KMTIuIFRoZSBNYWdpYyA4DQoxMy4gUGxheWluZyB3aXRoIEJhZCBMdWNrDQoxNC4gUGVla2Fib28NCjE1LiBDYXRjaCBhIEJyZWFrDQoxNi4gQmV0dGVyIFRoYW4gVGhpcw==',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvbS9FbHNld2hlcmUtU2V0LU9mZi9kcC9CMDlQVllEOVMz',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_rock_id ),
        'tdtax_subgenres' => array( $tax_term_pop_punk_id, $tax_term_pop_rock_id, $tax_term_rock_id ),
    ),
));

$cpt_a_place_to_bury_strangers_see_through_you_id = td_demo_content::add_cpt( array(
    'title' => 'A Place To Bury Strangers ― See Through You',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_2',
    'post_meta' => array(
        'tdcf_release_date' => 'MDQvMDIvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ny42',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ni45',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'RGVkc3RyYW5nZQ==',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => '',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gTmljZSBvZiBZb3UgVG8gQmUgVGhlcmUgRm9yIE1lDQoyLiBJJ20gSHVydA0KMy4gTGV0J3MgU2VlIEVhY2ggT3RoZXINCjQuIFNvIExvdw0KNS4gRHJhZ2dlZCBJbiBhIEhvbGUNCjYuIFJpbmdpbmcgQmVsbHMNCjcuIEkgRGlzYXBwZWFyIChXaGVuIFlvdSBhcmUgTmVhcikNCjguIEFueW9uZSBCdXQgWW91DQo5LiBNeSBIZWFkIElzIEJsZWVkaW5nDQoxMC4gQnJva2VuDQoxMS4gSG9sZCBPbiBUaWdodA0KMTIuIEkgRG9uJ3QgS25vdyBIb3cgWW91IERvIEl0DQoxMy4gTG92ZSBSZWFjaGVzIE91dA==',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly9hcGxhY2V0b2J1cnlzdHJhbmdlcnMuYmFuZGNhbXAuY29tL2FsYnVtL3NlZS10aHJvdWdoLXlvdQ==',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_rock_id ),
        'tdtax_subgenres' => array( $tax_term_noise_rock_id, $tax_term_post_punk_id, $tax_term_rock_id ),
    ),
));

$cpt_wet_leg_wet_leg_id = td_demo_content::add_cpt( array(
    'title' => 'Wet Leg ― Wet Leg',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_3',
    'post_meta' => array(
        'tdcf_release_date' => 'MDgvMDQvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'OC4z',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ny4y',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'RG9taW5v',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly93d3cud2V0bGVnYmFuZC5jb20v',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gQmVpbmcgaW4gTG92ZQ0KMi4gQ2hhaXNlIExvbmd1ZQ0KMy4gQW5nZWxpY2ENCjQuIEkgRG9uJ3QgV2FubmEgR28gT3V0DQo1LiBXZXQgRHJlYW0NCjYuIENvbnZpbmNpbmcNCjcuIExvdmluZyBZb3UNCjguIFVyIE11bQ0KOS4gT2ggTm8NCjEwLiBQaWVjZSBvZiBTaGl0DQoxMS4gU3VwZXJtYXJrZXQNCjEyLiBUb28gTGF0ZSBOb3cNCjEzLiBJdCdzIE5vdCBGdW4NCjE0LiBJdCdzIGEgU2hhbWU=',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93ZXRsZWcuYmFuZGNhbXAuY29tL2FsYnVtL3dldC1sZWc=',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_rock_id ),
        'tdtax_subgenres' => array( $tax_term_indie_rock_id, $tax_term_post_punk_id, $tax_term_rock_id ),
    ),
));

$cpt_devil_master_ecstasies_of_never_ending_night_id = td_demo_content::add_cpt( array(
    'title' => 'Devil Master ― Ecstasies of Never Ending Night',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_4',
    'post_meta' => array(
        'tdcf_release_date' => 'MjkvMDQvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'OC41',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ny40',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'UmVsYXBzZSBSZWNvcmRz',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => '',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gRWNzdGFzaWVzLi4uDQoyLiBFbmFtb3VyZWQgaW4gdGhlIFRocm9lcyBvZiBEZWF0aA0KMy4gR29sZ290aGEncyBDcnVlbCBTb25nDQo0LiBUaGUgVmlnb3VyIG9mIEV2aWwNCjUuIEFjaWQgQmxhY2sgTWFzcw0KNi4gQWJ5c3MgaW4gVmlzaW9uDQo3LiBTaHJpbmVzIGluIENpbmRlcg0KOC4gRnVuZXJhcnkgR3lyZSBvZiBEcmVhbXMgJiBNYWRuZXNzDQo5LiBQcmVjaW91cyBCbG9vZCBvZiBDaHJpc3QgUmVidWtlZA0KMTAuIE5ldmVyIEVuZGluZyBOaWdodA==',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly9kZXZpbG1hc3Rlci5iYW5kY2FtcC5jb20vYWxidW0vZWNzdGFzaWVzLW9mLW5ldmVyLWVuZGluZy1uaWdodA==',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_rock_id ),
        'tdtax_subgenres' => array( $tax_term_black_metal_id, $tax_term_deathrock_id, $tax_term_rock_id ),
    ),
));

$cpt_arcade_fire_we_id = td_demo_content::add_cpt( array(
    'title' => 'Arcade Fire ― We',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_5',
    'post_meta' => array(
        'tdcf_release_date' => 'MDYvMDUvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ny43',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ny41',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'Q29sdW1iaWE=',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly93d3cuYXJjYWRlZmlyZS5jb20v',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gQWdlIE9mIEFueGlldHkgSQ0KMi4gQWdlIG9mIEFueGlldHkgSUkgKFJhYmJpdCBIb2xlKQ0KMy4gUHJlbHVkZQ0KNC4gRW5kIG9mIHRoZSBFbXBpcmUgSS1JSUkNCjUuIEVuZCBvZiB0aGUgRW1waXJlIElWIChTYWdpdHRhcml1cyBBKikNCjYuIFRoZSBMaWdodG5pbmcgSQ0KNy4gVGhlIExpZ2h0bmluZyBJSQ0KOC4gVW5jb25kaXRpb25hbCBJIChMb29rb3V0IEtpZCkNCjkuIFVuY29uZGl0aW9uYWwgSUkgKFJhY2UgYW5kIFJlbGlnaW9uKQ0KMTAuIFdl',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvbS9XRS1BcmNhZGUtRmlyZS9kcC9CMDlUV1REWVE4',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_rock_id ),
        'tdtax_subgenres' => array( $tax_term_art_rock_id, $tax_term_indie_rock_id, $tax_term_rock_id ),
    ),
));

$cpt_twenty_one_pilots_scaled_and_icy_id = td_demo_content::add_cpt( array(
    'title' => 'Twenty One Pilots ― Scaled and Icy',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_6',
    'post_meta' => array(
        'tdcf_release_date' => 'MjEvMDUvMjAyMQ==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ni4y',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'NS42',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'RnVlbGVkIGJ5IFJhbWVu',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly93d3cudHdlbnR5b25lcGlsb3RzLmNvbS8=',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gR29vZCBEYXkNCjIuIENob2tlcg0KMy4gU2h5IEF3YXkNCjQuIFRoZSBPdXRzaWRlDQo1LiBTYXR1cmRheQ0KNi4gTmV2ZXIgVGFrZSBJdA0KNy4gTXVsYmVycnkgU3RyZWV0DQo4LiBGb3JtaWRhYmxlDQo5LiBCb3VuY2UgTWFuDQoxMC4gTm8gQ2hhbmNlcw0KMTEuIFJlZGVjb3JhdGU=',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvbS9TY2FsZWQtSWN5LWRpZ2lwYWstdHdlbnR5LXBpbG90cy9kcC9CMDkxWkdKVzlR',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_rock_id ),
        'tdtax_subgenres' => array( $tax_term_indie_pop_id, $tax_term_pop_rock_id, $tax_term_rock_id ),
    ),
));

$cpt_sleeping_with_sirens_how_it_feels_to_be_lost_id = td_demo_content::add_cpt( array(
    'title' => 'Sleeping with Sirens ― How It Feels to Be Lost',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_7',
    'post_meta' => array(
        'tdcf_release_date' => 'MDYvMDkvMjAxOQ==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ny4w',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ni41',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'U3VtZXJpYW4=',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => '',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gTGVhdmUgSXQgQWxsIEJlaGluZA0KMi4gTmV2ZXIgRW5vdWdoIChmZWF0LiBCZW5qaSBNYWRkZW4pDQozLiBIb3cgSXQgRmVlbHMgdG8gQmUgTG9zdA0KNC4gQWdyZWUgdG8gRGlzYWdyZWUNCjUuIEdob3N0DQo2LiBCbG9vZCBMaW5lcw0KNy4gQnJlYWsgTWUgRG93bg0KOC4gQW5vdGhlciBOaWdodG1hcmUNCjkuIFAuUy4gTWlzc2luZyBZb3UNCjEwLiBNZWRpY2luZSAoRGV2aWwgaW4gTXkgSGVhZCkNCjExLiBEeWluZyB0byBCZWxpZXZl',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvbS9Ib3ctRmVlbHMtTG9zdC1TbGVlcGluZy1TaXJlbnMvZHAvQjA3VDNLRkRXNA==',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_rock_id ),
        'tdtax_subgenres' => array( $tax_term_pop_punk_id, $tax_term_post_hardcore_id, $tax_term_rock_id ),
    ),
));

$cpt_good_charlotte_generation_rx_id = td_demo_content::add_cpt( array(
    'title' => 'Good Charlotte ― Generation Rx',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_8',
    'post_meta' => array(
        'tdcf_release_date' => 'MTQvMDkvMjAxOA==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'NS44',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ni41',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'TURETg==',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly93d3cuZ29vZGNoYXJsb3R0ZS5jb20v',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gR2VuZXJhdGlvbiBSeA0KMi4gU2VsZiBIZWxwDQozLiBTaGFkb3dib3hlcg0KNC4gQWN0dWFsIFBhaW4NCjUuIFByYXllcnMNCjYuIENvbGQgU29uZw0KNy4gTGVlY2ggKGZlYXQuIFNhbSBDYXJ0ZXIpDQo4LiBCZXR0ZXIgRGVtb25zDQo5LiBDYWxpZm9ybmlhIChUaGUgV2F5IEkgU2F5IEkgTG92ZSBZb3Up',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvbS9HZW5lcmF0aW9uLVJ4LUdvb2QtQ2hhcmxvdHRlL2RwL0IwN0ZES1hDWUs=',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_rock_id ),
        'tdtax_subgenres' => array( $tax_term_alternative_rock_id, $tax_term_pop_rock_id, $tax_term_rock_id ),
    ),
));

$cpt_five_finger_death_punch_f8_id = td_demo_content::add_cpt( array(
    'title' => 'Five Finger Death Punch ― F8',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_9',
    'post_meta' => array(
        'tdcf_release_date' => 'MjgvMDIvMjAyMA==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ni44',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'NC41',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'QmV0dGVyIE5vaXNl',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly9maXZlZmluZ2VyZGVhdGhwdW5jaC5jb20v',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gRjgNCjIuIEluc2lkZSBPdXQNCjMuIEZ1bGwgQ2lyY2xlDQo0LiBMaXZpbmcgdGhlIERyZWFtDQo1LiBBIExpdHRsZSBCaXQgT2ZmDQo2LiBCb3R0b20gb2YgdGhlIFRvcA0KNy4gVG8gQmUgQWxvbmUNCjguIE1vdGhlciBNYXkgSSAoVGljIFRvYykNCjkuIERhcmtuZXNzIFNldHRsZXMgSW4NCjEwLiBUaGlzIGlzIFdhcg0KMTEuIExlYXZlIEl0IEFsbCBCZWhpbmQNCjEyLiBTY2FyIFRpc3N1ZQ0KMTMuIEJyaWdodGVyIFNpZGUgb2YgR3JleQ0KMTQuIE1ha2luZyBNb25zdGVycw0KMTUuIERlYXRoIFB1bmNoIFRoZXJhcHk=',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvbS9GOC1GSVZFLUZJTkdFUi1ERUFUSC1QVU5DSC9kcC9CMDgyM0JDUU1H',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_rock_id ),
        'tdtax_subgenres' => array( $tax_term_alternative_metal_id, $tax_term_groove_metal_id, $tax_term_rock_id ),
    ),
));

$cpt_bring_me_the_horizon_post_human_survival_horrror_id = td_demo_content::add_cpt( array(
    'title' => 'Bring Me The Horizon ― Post Human: Survival Horrror',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_10',
    'post_meta' => array(
        'tdcf_release_date' => 'MzAvMTAvMjAyMA==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'OS44',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ny42',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'UkNB',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly93d3cuYm10aG9mZmljaWFsLmNvbS8=',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gRGVhciBEaWFyeSwNCjIuIFBhcmFzaXRlIEV2ZQ0KMy4gVGVhcmRyb3BzDQo0LiBPYmV5IChmZWF0LiBZdW5nYmx1ZCkNCjUuIEl0Y2ggZm9yIHRoZSBDdXJlIChXaGVuIFdpbGwgV2UgQmUgRnJlZT8pDQo2LiBLaW5nc2xheWVyIChmZWF0LiBCYWJ5bWV0YWwpDQo3LiAxeDEgKGZlYXQuIE5vdmEgVHdpbnMpDQo4LiBMdWRlbnMNCjkuIE9uZSBEYXkgdGhlIE9ubHkgQnV0dGVyZmxpZXMgTGVmdCBXaWxsIEJlIGluIFlvdXIgQ2hlc3QgYXMgWW91IE1hcmNoIFRvd2FyZHMgWW91ciBEZWF0aCAoZmVhdC4gQW15IExlZSkNCg==',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvbS9QT1NULUhVTUFOLVNVUlZJVkFMLUJyaW5nLUhvcml6b24vZHAvQjA4TDFMOExNSg==',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_rock_id ),
        'tdtax_subgenres' => array( $tax_term_alternative_metal_id, $tax_term_hard_rock_id, $tax_term_industrial_metal_id, $tax_term_rock_id ),
    ),
));

$cpt_fall_out_boy_mania_id = td_demo_content::add_cpt( array(
    'title' => 'Fall Out Boy ― Mania',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_1',
    'post_meta' => array(
        'tdcf_release_date' => 'MTkvMDEvMjAxOA==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ny44',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'NS42',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'SXNsYW5kIFJlY29yZHM=',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly9mYWxsb3V0Ym95LmNvbS8=',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gU3RheSBGcm9zdHkgUm95YWwgTWlsayBUZWENCjIuIFRoZSBMYXN0IG9mIHRoZSBSZWFsIE9uZXMNCjMuIEhvbGQgTWUgVGlnaHQgb3IgRG9uJ3QNCjQuIFdpbHNvbiAoRXhwZW5zaXZlIE1pc3Rha2VzKQ0KNS4gQ2h1cmNoDQo2LiBIZWF2ZW4ncyBHYXRlDQo3LiBDaGFtcGlvbg0KOC4gU3Vuc2hpbmUgUmlwdGlkZQ0KOS4gWW91bmcgYW5kIE1lbmFjZQ0KMTAuIEJpc2hvcHMgS25pZmUgVHJpY2s=',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvbS9NLU4tRmFsbC1PdXQtQm95L2RwL0IwNzE4WkRLTEg=',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_rock_id ),
        'tdtax_subgenres' => array( $tax_term_electropop_id, $tax_term_pop_rock_id, $tax_term_rock_id ),
    ),
));

$cpt_breaking_benjamin_ember_id = td_demo_content::add_cpt( array(
    'title' => 'Breaking Benjamin ― Ember',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_2',
    'post_meta' => array(
        'tdcf_release_date' => 'MTMvMDQvMjAxOA==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ni4y',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'NS4x',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'SG9sbHl3b29k',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly9icmVha2luZ2JlbmphbWluLmNvbS8=',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gTHlyYQ0KMi4gRmVlZCB0aGUgV29sZg0KMy4gUmVkIENvbGQgUml2ZXINCjQuIFRvdXJuaXF1ZXQNCjUuIFBzeWNobw0KNi4gVGhlIERhcmsgb2YgWW91DQo3LiBEb3duDQo4LiBUb3JuIGluIFR3bw0KOS4gQmxvb2QNCjEwLiBTYXZlIFlvdXJzZWxmDQoxMS4gQ2xvc2UgWW91ciBFeWVzDQoxMi4gVmVnYQ==',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvbS9FbWJlci1CcmVha2luZy1CZW5qYW1pbi9kcC9CMDc4OTZOVlFH',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_rock_id ),
        'tdtax_subgenres' => array( $tax_term_alternative_metal_id, $tax_term_hard_rock_id, $tax_term_rock_id ),
    ),
));

$cpt_atreyu_in_our_wake_id = td_demo_content::add_cpt( array(
    'title' => 'Atreyu ― In Our Wake',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_3',
    'post_meta' => array(
        'tdcf_release_date' => 'MTIvMTAvMjAxOA==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ni41',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ni4w',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'U3BpbmVmYXJt',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly93d3cuYXRyZXl1b2ZmaWNpYWwuY29tLw==',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gSW4gT3VyIFdha2UNCjIuIEhvdXNlIG9mIEdvbGQNCjMuIFRoZSBUaW1lIElzIE5vdw0KNC4gTm90aGluZyBXaWxsIEV2ZXIgQ2hhbmdlDQo1LiBCbGluZCwgRGVhZiwgYW5kIER1bWINCjYuIFRlcnJpZmllZA0KNy4gU2FmZXR5IFBpbg0KOC4gSW50byB0aGUgT3Blbg0KOS4gUGFwZXIgQ2FzdGxlDQoxMC4gTm8gQ29udHJvbA0KMTEuIEFuZ2VyIExlZnQgQmVoaW5kDQoxMi4gU3VwZXIgSGVybyAoZmVhdC4gQWFyb24gR2lsbGVzcGllICYgTS4gU2hhZG93cykNCjEzLiBHZW5lcmF0aW9uDQoxNC4gU3RyYWlnaHQgdG8gSGVsbA==',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvbS9PdXItV2FrZS1BdHJleXUvZHAvQjA3R0pMV0oxWg==',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_rock_id ),
        'tdtax_subgenres' => array( $tax_term_alternative_metal_id, $tax_term_electronic_rock_id, $tax_term_melodic_metalcore_id, $tax_term_rock_id ),
    ),
));

$cpt_asking_alexandria_like_a_house_on_fire_id = td_demo_content::add_cpt( array(
    'title' => 'Asking Alexandria ― Like a House on Fire',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_4',
    'post_meta' => array(
        'tdcf_release_date' => 'MTUvMDUvMjAyMA==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'OS42',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ni42',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'U3VtZXJpYW4=',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly93d3cuYXNraW5nYWxleGFuZHJpYS5jb20v',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gSG91c2Ugb24gRmlyZQ0KMi4gVGhleSBEb24ndCBXYW50IFdoYXQgV2UgV2FudCAoQW5kIFRoZXkgRG9uJ3QgQ2FyZSkNCjMuIERvd24gdG8gSGVsbA0KNC4gQW50aXNvY2lhbGlzdA0KNS4gSSBEb24ndCBOZWVkIFlvdSAoZmVhdC4gR3JhY2UgR3J1bmR5KQ0KNi4gQWxsIER1ZSBSZXNwZWN0DQo3LiBUYWtlIFNvbWUgVGltZQ0KOC4gT25lIFR1cm5zIHRvIE5vbmUNCjkuIEl0J3MgTm90IE1lIChJdCdzIFlvdSkNCjEwLiBIZXJlJ3MgdG8gU3RhcnRpbmcgT3Zlcg0KMTEuIFdoYXQncyBHb25uYSBCZQ0KMTIuIEdpdmUgWW91IFVwDQoxMy4gSW4gTXkgQmxvb2QNCjE0LiBUaGUgVmlvbGVuY2UNCjE1LiBMb3JhemVwYW0=',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvbS9MaWtlLUhvdXNlLUV4cGxpY2l0LUFza2luZy1BbGV4YW5kcmlhL2RwL0IwODU1VlY0TDU=',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_rock_id ),
        'tdtax_subgenres' => array( $tax_term_alternative_rock_id, $tax_term_hard_rock_id, $tax_term_pop_rock_id, $tax_term_rock_id ),
    ),
));

$cpt_afi_bodies_id = td_demo_content::add_cpt( array(
    'title' => 'AFI ― Bodies',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_5',
    'post_meta' => array(
        'tdcf_release_date' => 'MTEvMDYvMjAyMQ==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'OS44',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ni41',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'UmlzZQ==',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly9hZmlyZWluc2lkZS5uZXQv',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gVHdpc3RlZCBUb25ndWVzDQoyLiBGYXIgVG9vIE5lYXINCjMuIER1bGNlcsOtYQ0KNC4gT24gWW91ciBCYWNrDQo1LiBFc2NhcGUgZnJvbSBMb3MgQW5nZWxlcw0KNi4gQmVnZ2luZyBmb3IgVHJvdWJsZQ0KNy4gQmFjayBmcm9tIHRoZSBGbGVzaA0KOC4gTG9va2luZyBUcmFnaWMNCjkuIERlYXRoIG9mIHRoZSBQYXJ0eQ0KMTAuIE5vIEV5ZXMNCjExLiBUaWVkIHRvIGEgVHJlZQ==',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvbS9Cb2RpZXMtQUZJL2RwL0IwOFhMOVFGOFg=',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_rock_id ),
        'tdtax_subgenres' => array( $tax_term_alternative_rock_id, $tax_term_gothic_rock_id, $tax_term_post_punk_id, $tax_term_rock_id ),
    ),
));

$cpt_mitski_laurel_hell_id = td_demo_content::add_cpt( array(
    'title' => 'Mitski ― Laurel Hell',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_6',
    'post_meta' => array(
        'tdcf_release_date' => 'MDQvMDIvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ny45',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ny4z',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'RGVhZCBPY2VhbnM=',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly9taXRza2kuY29tLw==',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gVmFsZW50aW5lLCBUZXhhcw0KMi4gV29ya2luZyBmb3IgdGhlIEtuaWZlDQozLiBTdGF5IFNvZnQNCjQuIEV2ZXJ5b25lDQo1LiBIZWF0IExpZ2h0bmluZw0KNi4gVGhlIE9ubHkgSGVhcnRicmVha2VyDQo3LiBMb3ZlIE1lIE1vcmUNCjguIFRoZXJlJ3MgTm90aGluZyBMZWZ0IGZvciBZb3UNCjkuIFNob3VsZCd2ZSBCZWVuIE1lDQoxMC4gSSBHdWVzcw0KMTEuIFRoYXQncyBPdXIgTGFtcA==',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvbS9MYXVyZWwtSGVsbC1NaXRza2kvZHAvQjA5TDhQVzRQRg==',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_pop_id ),
        'tdtax_subgenres' => array( $tax_term_art_pop_id, $tax_term_new_wave_id, $tax_term_pop_id ),
    ),
));

$cpt_the_weeknd_dawn_fm_id = td_demo_content::add_cpt( array(
    'title' => 'the Weeknd ― Dawn FM',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_7',
    'post_meta' => array(
        'tdcf_release_date' => 'MDcvMDEvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'OC4z',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ny43',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'UmVwdWJsaWM=',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly93d3cudGhld2Vla25kLmNvbS8=',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gRGF3biBGTQ0KMi4gR2Fzb2xpbmUNCjMuIEhvdyBEbyBJIE1ha2UgWW91IExvdmUgTWU/DQo0LiBUYWtlIE15IEJyZWF0aA0KNS4gU2FjcmlmY2UNCjYuIEEgVGFsZSBieSBRdWluY3kNCjcuIE91dCBvZiBUaW1lDQo4LiBIZXJlIHdlIEdvLi4uIEFnYWluIChmZWF0LiBUeWxlciwgdGhlIENyZWF0b3IpDQo5LiBCZXN0IEZyaWVuZHMNCjEwLiBJcyBUaGVyZSBTb21lb25lIEVsc2U/DQoxMS4gU3RhcnJ5IEV5ZXMNCjEyLiBFdmVyeSBBbmdlbCBpcyBUZXJyaWZ5aW5nDQoxMy4gRG9uJ3QgQnJlYWsgTXkgSGVhcnQNCjE0LiBJIEhlYXJkIFlvdSdyZSBNYXJyaWVkIChmZWF0LiBMaWwgV2F5bmUpDQoxNS4gTGVzcyBUaGFuIFplcm8NCjE2LiBQaGFudG9tIFJlZ3JldCBieSBKaW0=',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvbS9EYXduLUZNLVdlZWtuZC9kcC9CMDlQUDk4NUNG',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_pop_id ),
        'tdtax_subgenres' => array( $tax_term_dance_pop_id, $tax_term_pop_id, $tax_term_synth_pop_id ),
    ),
));

$cpt_taylor_swift_evermore_id = td_demo_content::add_cpt( array(
    'title' => 'Taylor Swift ― Evermore',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_8',
    'post_meta' => array(
        'tdcf_release_date' => 'MDcvMDEvMjAyMQ==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'OC4x',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ny41',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'VGF5bG9yIFN3aWZ0',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly93d3cudGF5bG9yc3dpZnQuY29tLw==',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gV2lsbG93DQoyLiBDaGFtcGFnbmUgUHJvYmxlbXMNCjMuIEdvbGQgUnVzaA0KNC4gVGlzIHRoZSBEYW1uIFNlYXNvbg0KNS4gVG9sZXJhdGUgSXQNCjYuIE5vIEJvZHksIE5vIENyaW1lIChmZWF0LiBIYWltKQ0KNy4gSGFwcGluZXNzDQo4LiBEb3JvdGhlYQ0KOS4gQ29uZXkgSXNsYW5kIChmZWF0LiB0aGUgTmF0aW9uYWwpDQoxMC4gSXZ5DQoxMS4gQ293Ym95IExpa2UgTWUNCjEyLiBMb25nIFN0b3J5IFNob3J0DQoxMy4gTWFyam9yaWUNCjE0LiBDbG9zdXJlDQoxNS4gRXZlcm1vcmUgKGZlYXQuIEJvbiBJdmVyKQ0KMTYuIFJpZ2h0IFdoZXJlIFlvdSBMZWZ0IE1lDQoxNy4gSXQncyBUaW1lIHRvIEdv',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly9zdG9yZS50YXlsb3Jzd2lmdC5jb20vcHJvZHVjdHMvZXZlcm1vcmUtYWxidW0tZGlnaXRhbC1zdGFuZGFyZC1lZGl0aW9u',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_pop_id ),
        'tdtax_subgenres' => array( $tax_term_chamber_rock_id, $tax_term_folk_pop_id, $tax_term_indie_folk_id, $tax_term_pop_id ),
    ),
));

$cpt_olivia_rodrigo_sour_id = td_demo_content::add_cpt( array(
    'title' => 'Olivia Rodrigo ― Sour',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_9',
    'post_meta' => array(
        'tdcf_release_date' => 'MjEvMDUvMjAyMQ==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ny41',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ni45',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'R2VmZmVuIFJlY29yZHM=',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly93d3cub2xpdmlhcm9kcmlnby5jb20v',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gQnJ1dGFsDQoyLiBUcmFpdG9yDQozLiBEcml2ZXJzIExpY2Vuc2UNCjQuIDEgU3RlcCBGb3J3YXJkLCAzIFN0ZXBzIEJhY2sNCjUuIERlamEgVnUNCjYuIEdvb2QgNCBVDQo3LiBFbm91Z2ggZm9yIFlvdQ0KOC4gSGFwcGllcg0KOS4gSmVhbG91c3ksIEplYWxvdXN5DQoxMC4gRmF2b3JpdGUgQ3JpbWUNCjExLiBIb3BlIFVyIE9r',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly9zaG9wLm9saXZpYXJvZHJpZ28uY29tL3Byb2R1Y3RzL2RpZ2l0YWwtYWxidW0tZG93bmxvYWQ=',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_pop_id ),
        'tdtax_subgenres' => array( $tax_term_indie_pop_id, $tax_term_pop_id, $tax_term_pop_rock_id, $tax_term_teen_pop_id ),
    ),
));

$cpt_miley_cyrus_plastic_hearts_id = td_demo_content::add_cpt( array(
    'title' => 'Miley Cyrus ― Plastic Hearts',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_10',
    'post_meta' => array(
        'tdcf_release_date' => 'MjcvMTEvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ny4y',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ny4z',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'UkNB',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => '',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gV1RGIERvIEkgS25vdw0KMi4gUGxhc3RpYyBIZWFydHMNCjMuIEFuZ2VscyBsaWtlIFlvdQ0KNC4gUHJpc29uZXIgKGZlYXQuIER1YSBMaXBhKQ0KNS4gR2ltbWUgV2hhdCBJIFdhbnQNCjYuIE5pZ2h0IENyYXdsaW5nIChmZWF0LiBCaWxseSBJZG9sKQ0KNy4gTWlkbmlnaHQgU2t5DQo4LiBIaWdoDQo5LiBIYXRlIE1lDQoxMC4gQmFkIEthcm1hIChmZWF0LiBKb2FuIEpldHQpDQoxMS4gTmV2ZXIgQmUgTWUNCjEyLiBHb2xkZW4gRyBTdHJpbmcNCjEzLiBFZGdlIG9mIE1pZ2h0bmlnaHQgKGZlYXQuIFN0ZXZpZSBOaWNrcykNCjE0LiBIZWFydCBPZiBHbGFzcw0KMTUuIFpvbWJpZQ0KMTYuIFdobyBPd25zIE15IEhlYXJ0',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvbS9QbGFzdGljLUhlYXJ0cy1NaWxleS1DeXJ1cy9kcC9CMDhMTjk3OU4y',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_pop_id ),
        'tdtax_subgenres' => array( $tax_term_new_wave_id, $tax_term_pop_id, $tax_term_pop_rock_id ),
    ),
));

$cpt_lil_nas_x_montero_id = td_demo_content::add_cpt( array(
    'title' => 'Lil Nas X ― Montero',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_1',
    'post_meta' => array(
        'tdcf_release_date' => 'MTcvMDkvMjAyMQ==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ny4y',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'OC4x',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'Q29sdW1iaWE=',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => '',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gTW9udGVybyAoQ2FsbCBNZSBieSBZb3VyIE5hbWUpDQoyLiBEZWFkIFJpZ2h0IE5vdw0KMy4gSW5kdXN0cnkgQmFieSAod2l0aCBKYWNrIEhhcmxvdykNCjQuIFRoYXRzIFdoYXQgSSBXYW50DQo1LiBUaGUgQXJ0IG9mIFJlYWxpemF0aW9uDQo2LiBTY29vcCAoZmVhdC4gRG9qYSBDYXQpDQo3LiBPbmUgb2YgTWUgKGZlYXQuIEVsdG9uIEpvaG4pDQo4LiBMb3N0IGluIHRoZSBDaXRhZGVsDQo5LiBEb2xsYSBTaWduIFNsaW1lIChmZWF0LiBNZWdhbiBUaGVlIFN0YWxsaW9uKQ0KMTAuIFRhbGVzIG9mIERvbWluaWNhDQoxMS4gU3VuIEdvZXMgRG93bg0KMTIuIFZvaWQNCjEzLiBEb250IFdhbnQgSXQNCjE0LiBMaWUgQWZ0ZXIgU2FsZW0NCjE1LiBBbSBJIERyZWFtaW5nIChmZWF0LiBNaWxleSBDeXJ1cyk=',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cubGlsbmFzeHN0b3JlLmNvbS9wcm9kdWN0L1k0REROWDAxMC9tb250ZXJvLWZ1bGwtYWxidW0tZGlnaXRhbC1kb3dubG9hZD9jcD1udWxs',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_pop_id ),
        'tdtax_subgenres' => array( $tax_term_country_rap_id, $tax_term_pop_id, $tax_term_pop_rap_id ),
    ),
));

$cpt_inna_champagne_problems_id = td_demo_content::add_cpt( array(
    'title' => 'INNA Champagne Problems',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_2',
    'post_meta' => array(
        'tdcf_release_date' => 'MDcvMDEvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ny45',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'NS45',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'R2xvYmFsIFJlY29yZHM=',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly9pbm5hb2ZmaWNpYWwuY29tLw==',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gQWx3YXlzIE9uIE15IE1pbmQNCjIuIENoYW1wYWduZSBQcm9ibGVtcw0KMy4gTG9uZWx5DQo0LiBMb3ZlIEJpemFycmUNCjUuIEJhYnkNCjYuIEZpcmUgJiBJY2UNCjcuIFNvbG8NCjguIFJlYWR5IFNldCBHbw0KDQpCIFNpZGUNCjEuIENyeW8NCjIuIE1pbGxlbm5pdW0NCjMuIFRha2UgTWUgSG9tZQ0KNC4gS3VtZXJhDQo1LiBPeHlnZW4NCjYuIEthcm1hDQo3LiBCcmVhdGhsZXNzDQo4LiBEb24ndCBMZXQgTWUgRG93bg==',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvLnVrL0NoYW1wYWduZS1Qcm9ibGVtcy1EUUgxLUlubmEvZHAvQjA5TkxHUkRNRw==',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_pop_id ),
        'tdtax_subgenres' => array( $tax_term_dance_pop_id, $tax_term_edm_id, $tax_term_pop_id ),
    ),
));

$cpt_harry_styles_harrys_house_id = td_demo_content::add_cpt( array(
    'title' => 'Harry Styles ― Harry\'s House',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_3',
    'post_meta' => array(
        'tdcf_release_date' => 'MjAvMDUvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ny44',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ni41',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'Q29sdW1iaWE=',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly93d3cuaHN0eWxlcy5jby51ay8=',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gTXVzaWMgRm9yIGEgU3VzaGkgUmVzdGF1cmFudA0KMi4gTGF0ZSBOaWdodCBUYWxraW5nDQozLiBHcmFwZWp1aWNlDQo0LiBBcyBJdCBXYXMNCjUuIERheWxpZ2h0DQo2LiBMaXR0bGUgRnJlYWsNCjcuIE1hdGlsZGENCjguIENpbmVtYQ0KOS4gRGF5ZHJlYW1pbmcNCjEwLiBLZWVwIERyaXZpbmcNCjExLiBTYXRlbGxpdGUNCjEyLiBCb3lmcmllbmRzDQoxMy4gTG92ZSBvZiBNeSBMaWZl',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvbS9IYXJyeXMtSG91c2UtSGFycnktU3R5bGVzL2RwL0IwOVdWWjYzSkg=',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_pop_id ),
        'tdtax_subgenres' => array( $tax_term_indie_pop_id, $tax_term_pop_id, $tax_term_pop_rock_id ),
    ),
));

$cpt_billie_eilish_happier_than_ever_id = td_demo_content::add_cpt( array(
    'title' => 'Billie Eilish ― Happier Than Ever',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_4',
    'post_meta' => array(
        'tdcf_release_date' => 'MzAvMDcvMjAyMQ==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'OC4z',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ny43',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'RGFya3Jvb20=',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly93d3cuYmlsbGllZWlsaXNoLmNvbS8=',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gR2V0dGluZyBPbGRlcg0KMi4gSSBEaWRuJ3QgQ2hhbmdlIE15IE51bWJlcg0KMy4gQmlsbGllIEJvc3NhIE5vdmENCjQuIE15IEZ1dHVyZQ0KNS4gT3h5dG9jaW4NCjYuIEdvbGR3aW5nDQo3LiBMb3N0IENhdXNlDQo4LiBIYWxsZXkncyBDb21ldA0KOS4gTm90IE15IFJlc3BvbnNpYmlsaXR5DQoxMC4gT3ZlcmhlYXRlZA0KMTEuIEV2ZXJ5Ym9keSBEaWVzDQoxMi4gWW91ciBQb3dlcg0KMTMuIE5EQQ0KMTQuIFRoZXJlZm9yZSBJIEFtDQoxNS4gSGFwcGllciBUaGFuIEV2ZXINCjE2LiBNYWxlIEZhbnRhc3k=',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly9zdG9yZS5iaWxsaWVlaWxpc2guY29tL3Byb2R1Y3RzL2hhcHBpZXItdGhhbi1ldmVyLWNk',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_pop_id ),
        'tdtax_subgenres' => array( $tax_term_alt_pop_id, $tax_term_art_pop_id, $tax_term_electropop_id, $tax_term_pop_id ),
    ),
));

$cpt_aurora_the_gods_we_can_touch_id = td_demo_content::add_cpt( array(
    'title' => 'Aurora ― The Gods We Can Touch',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_5',
    'post_meta' => array(
        'tdcf_release_date' => 'MjEvMDEvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'OS4z',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ny41',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'RGVjY2E=',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly93d3cuYXVyb3JhLW11c2ljLmNvbS8=',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gVGhlIEZvcmJpZGRlbiBGcnVpdHMgb2YgRWRlbg0KMi4gRXZlcnl0aGluZyBNYXR0ZXJzIChmZWF0LiBQb21tZSkNCjMuIEdpdmluZyBpbiB0byBMb3ZlDQo0LiBDdXJlIEZvciBNZQ0KNS4gWW91IEtlZXAgTWUgQ3Jhd2xpbmcNCjYuIEV4aXN0IGZvciBMb3ZlDQo3LiBIZWF0aGVucw0KOC4gVGhlIElubm9jZW50DQo5LiBFeGhhbGUgSW5oYWxlDQoxMC4gQSBUZW1wb3JhcnkgSGlnaA0KMTEuIEEgRGFuZ2Vyb3VzIFRoaW5nDQoxMi4gQXJ0ZW1pcw0KMTMuIEJsb29kIGluIHRoZSBXaW5lDQoxNC4gVGhpcyBDb3VsZCBCZSBhIERyZWFtDQoxNS4gQSBMaXR0bGUgUGxhY2UgQ2FsbGVkIHRoZSBNb29uDQoxNi4gQ3VyZSBGb3IgTWUgKEFjb3VzdGljKQ==',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly9zaG9wLmF1cm9yYS1tdXNpYy5jb20vKi9tdXNpYy9UaGUtR29kcy1XZS1DYW4tVG91Y2gtQXJ0ZW1pcy1WaW55bC83OFowMUpNTDAwMA==',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_pop_id ),
        'tdtax_subgenres' => array( $tax_term_art_pop_id, $tax_term_electro_folk_id, $tax_term_folk_pop_id, $tax_term_pop_id ),
    ),
));

$cpt_rolo_tomassi_where_myth_becomes_memory_id = td_demo_content::add_cpt( array(
    'title' => 'Rolo Tomassi ― Where Myth Becomes Memory',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_6',
    'post_meta' => array(
        'tdcf_release_date' => 'MDQvMDIvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'OC42',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ny4y',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'TU5SSw==',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly9yb2xvdG9tYXNzaWJhbmQuY29tLw==',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gQWxtb3N0IEFsd2F5cw0KMi4gQ2xvYWtlZA0KMy4gTXV0dWFsIFJ1aW4NCjQuIExhYnlyaW50aGluZQ0KNS4gQ2xvc2VyDQo2LiBEcmlwDQo3LiBQcmVzY2llbmNlDQo4LiBTdHVtYmxpbmcNCjkuIFRvIFJlc2lzdCBGb3JnZXR0aW5nDQoxMC4gVGhlIEVuZCBvZiBFdGVybml0eQ==',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly9yb2xvdG9tYXNzaS5iYW5kY2FtcC5jb20vYWxidW0vd2hlcmUtbXl0aC1iZWNvbWVzLW1lbW9yeQ==',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_metal_id ),
        'tdtax_subgenres' => array( $tax_term_metal_id, $tax_term_post_hardcore_id, $tax_term_post_metal_id ),
    ),
));

$cpt_rammstein_zeit_id = td_demo_content::add_cpt( array(
    'title' => 'Rammstein ― Zeit',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_7',
    'post_meta' => array(
        'tdcf_release_date' => 'MjkvMDQvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ni41',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ny45',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'Q2FwaXRvbCBSZWNvcmRz',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly93d3cucmFtbXN0ZWluLmRlL2RlLw==',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gQXJtZWUgZGVyIFRyaXN0ZW4NCjIuIFplaXQNCjMuIFNjaHdhcnoNCjQuIEdpZnRpZw0KNS4gWmljayBaYWNrDQo2LiBPSw0KNy4gTWVpbmUgVHLDpG5lbg0KOC4gQW5nc3QNCjkuIERpY2tlIFRpdHRlbg0KMTAuIEzDvGdlbg0KMTEuIEFkaWV1',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvbS9aZWl0LVJhbW1zdGVpbi9kcC9CMDlUR0RXSlJQ',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_metal_id ),
        'tdtax_subgenres' => array( $tax_term_industrial_metal_id, $tax_term_industrial_rock_id, $tax_term_metal_id ),
    ),
));

$cpt_korn_requiem_id = td_demo_content::add_cpt( array(
    'title' => 'Korn ― Requiem',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_8',
    'post_meta' => array(
        'tdcf_release_date' => 'MDQvMDIvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ni4y',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ny41',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'Q29uY29yZA==',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly9rb3Jub2ZmaWNpYWwuY29tLw==',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gRm9yZ290dGVuDQoyLiBMZXQgdGhlIERhcmsgRG8gVGhlIFJlc3QNCjMuIFN0YXJ0IHRoZSBIZWFsaW5nDQo0LiBMb3N0IGluIHRoZSBHcmFuZGV1cg0KNS4gRGlzY29ubmVjdA0KNi4gSG9wZWxlc3MgYW5kIEJlYXRlbg0KNy4gUGVuYW5jZSB0byBTb3Jyb3cNCjguIE15IENvbmZlc3Npb24NCjkuIFdvcnN0IElzIG9uIEl0cyBXYXkNCjEwLiBJIENhbid0IEZlZWw=',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvbS9SZXF1aWVtLUtvcm4vZHAvQjA5S05NMkM0Nw==',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_metal_id ),
        'tdtax_subgenres' => array( $tax_term_alternative_metal_id, $tax_term_metal_id, $tax_term_nu_metal_id ),
    ),
));

$cpt_kirk_hammett_portals_id = td_demo_content::add_cpt( array(
    'title' => 'Kirk Hammett ― Portals',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_9',
    'post_meta' => array(
        'tdcf_release_date' => 'MjMvMDQvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ny4w',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ny43',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'QmxhY2tlbmVk',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => '',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gTWFpZGVuIGFuZCB0aGUgTW9uc3Rlcg0KMi4gVGhlIEppbm4NCjMuIEhpZ2ggUGxhaW5zIERyaWZ0ZXINCjQuIFRoZSBJbmNhbnRhdGlvbg==',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly9raXJraGFtbWV0dC5iYW5kY2FtcC5jb20vYWxidW0vcG9ydGFscw==',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_metal_id ),
        'tdtax_subgenres' => array( $tax_term_metal_id, $tax_term_progressive_metal_id, $tax_term_symphonic_metal_id ),
    ),
));

$cpt_halestorm_back_from_the_dead_id = td_demo_content::add_cpt( array(
    'title' => 'Halestorm ― Back From The Dead',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_10',
    'post_meta' => array(
        'tdcf_release_date' => 'MDYvMDUvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ni45',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'OC4y',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'QXRsYW50aWM=',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly93d3cuaGFsZXN0b3Jtcm9ja3MuY29tLw==',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gQmFjayBGcm9tIHRoZSBEZWFkDQoyLiBXaWNrZWQgV2F5cw0KMy4gU3RyYW5nZSBHaXJsDQo0LiBCcmlnaHRzaWRlDQo1LiBUaGUgU3RlZXBsZQ0KNi4gVGVycmlibGUgVGhpbmdzDQo3LiBNeSBSZWRlbXB0aW9uDQo4LiBCb21ic2hlbGwNCjkuIEkgQ29tZSBGaXJzdA0KMTAuIFBzeWNobyBDcmF6eQ0KMTEuIFJhaXNlIFlvdXIgSG9ybnM=',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvbS9CYWNrLURlYWQtSGFsZXN0b3JtL2RwL0IwOVJNNUY3OVg=',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_metal_id ),
        'tdtax_subgenres' => array( $tax_term_alternative_metal_id, $tax_term_hard_rock_id, $tax_term_metal_id ),
    ),
));

$cpt_cult_of_luna_the_long_road_north_id = td_demo_content::add_cpt( array(
    'title' => 'Cult of Luna ― The Long Road North',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_1',
    'post_meta' => array(
        'tdcf_release_date' => 'MTEvMDIvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ny41',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'OC40',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'TWV0YWwgQmxhZGU=',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly93d3cuY3VsdG9mbHVuYS5jb20v',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gQ29sZCBCdXJuDQoyLiBUaGUgU2lsdmVyIEFyYw0KMy4gQmV5b25kIEkgKGZlYXQuIE1hcmlhbSBXYWxsZW50aW4pDQo0LiBBbiBPZmZlcmluZyB0byB0aGUgV2lsZA0KNS4gSW50byB0aGUgTmlnaHQNCjYuIEZ1bGwgTW9vbg0KNy4gVGhlIExvbmcgUm9hZCBOb3J0aA0KOC4gQmxvb2QgVXBvbiBTdG9uZQ0KOS4gQmV5b25kIElJIChmZWF0LiBDb2xpbiBTdGV0c29uKQ==',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly9jdWx0b2ZsdW5hLmJhbmRjYW1wLmNvbS9hbGJ1bS90aGUtbG9uZy1yb2FkLW5vcnRo',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_metal_id ),
        'tdtax_subgenres' => array( $tax_term_atmospheric_sludge_metal_id, $tax_term_metal_id, $tax_term_post_rock_id ),
    ),
));

$cpt_confess_revenge_at_all_costs_id = td_demo_content::add_cpt( array(
    'title' => 'Confess ― Revenge At All Costs',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_2',
    'post_meta' => array(
        'tdcf_release_date' => 'MjEvMDEvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ni41',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ny4y',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'UmV4aXVzIFJlY29yZHM=',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => '',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gQmFzZWQgb24gYSBUcnVlIFN0b3J5Li4uDQoyLiBFVklODQozLiBQaG9lbml4IFJpc2VzDQo0LiBSYW5zb20gTm90ZQ0KNS4gWW91IENhbid0IFRhbWUgdGhlIEJlYXN0IQ0KNi4gVW5maWxpYWwgU29uDQo3LiBNZWdhbG9kb24NCjguIFVuZGVyIFN1cnZlaWxsYW5jZQ0KOS4gSGVnZW1vbnkNCjEwLiBBcm15IG9mIFBpZ3MhDQoxMS4gSSBTcGVhayBIYXRl',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly9jb25mZXNzYmFuZC5iYW5kY2FtcC5jb20vYWxidW0vcmV2ZW5nZS1hdC1hbGwtY29zdHM=',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_metal_id ),
        'tdtax_subgenres' => array( $tax_term_iranian_metal_id, $tax_term_metal_id, $tax_term_thrash_metal_id ),
    ),
));

$cpt_bloodywood_rakshak_id = td_demo_content::add_cpt( array(
    'title' => 'Bloodywood ― Rakshak',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_3',
    'post_meta' => array(
        'tdcf_release_date' => 'MTgvMDIvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ny41',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ny44',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'Tm8gTGFiZWw=',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => '',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gR2FkZGFhcg0KMi4gQWFqDQozLiBaYW5qZWVybyBTZQ0KNC4gTWFjaGkgQmhhc2FkDQo1LiBEYW5hIERhbg0KNi4gSmVlIFZlZXJleQ0KNy4gRW5kdXJhbnQNCjguIEJTREsuZXhlDQo5LiBZYWFkDQoxMC4gQ2hha2ggTGU=',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly9ibG9vZHl3b29kLmJhbmRjYW1wLmNvbS9hbGJ1bS9yYWtzaGFr',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_metal_id ),
        'tdtax_subgenres' => array( $tax_term_folk_metal_id, $tax_term_metal_id, $tax_term_nu_metal_id, $tax_term_rap_metal_id ),
    ),
));

$cpt_architects_for_those_that_wish_to_exist_id = td_demo_content::add_cpt( array(
    'title' => 'Architects ― For Those that Wish to Exist',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_4',
    'post_meta' => array(
        'tdcf_release_date' => 'MjYvMDIvMjAyMQ==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'OS41',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ni41',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'RXBpdGFwaA==',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => '',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gRG8geW91IERyZWFtIG9mIEFybWFnZWRkb24/DQoyLiBCbGFjayBMdW5ncw0KMy4gR2l2aW5nIEJsb29kDQo0LiBEaXNjb3Vyc2UgSXMgRGVhZA0KNS4gRGVhZCBCdXR0ZXJmbGllcw0KNi4gQW4gT3JkaW5hcnkgRXh0aW5jdGlvbg0KNy4gSW1wZXJtYW5lbmNlDQo4LiBGbGlnaHQgV2l0aG91dCBGZWF0aGVycw0KOS4gTGl0dGxlIFdvbmRlcg0KMTAuIEFuaW1hbHMNCjExLiBMaWJlcnRpbmUNCjEyLiBHb2xpYXRoDQoxMy4gRGVtaSBHb2QNCjE0LiBNZXRlb3INCjE1LiBEeWluZyBpcyBBYnNvbHV0ZWx5IFNhZmU=',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvbS9UaG9zZS1UaGF0LVdpc2gtRXhpc3QvZHAvQjA4TE5HOVFSUA==',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_metal_id ),
        'tdtax_subgenres' => array( $tax_term_alternative_metal_id, $tax_term_metal_id, $tax_term_metalcore_id ),
    ),
));

$cpt_amorphis_halo_id = td_demo_content::add_cpt( array(
    'title' => 'Amorphis ― Halo',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_5',
    'post_meta' => array(
        'tdcf_release_date' => 'MTEvMDIvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ny4x',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'OC42',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'QXRvbWljIEZpcmU=',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly9hbW9ycGhpcy5uZXQv',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gTm9ydGh3YXJkcw0KMi4gT24gdGhlIERhcmsgV2F0ZXJzDQozLiBUaGUgTW9vbg0KNC4gV2luZG1hbmUNCjUuIEEgTmV3IExhbmQNCjYuIFdoZW4gdGhlIEdvZHMgQ2FtZQ0KNy4gU2V2ZW4gUm9hZHMgQ29tZSBUb2dldGhlcg0KOC4gV2FyDQo5LiBIYWxvDQoxMC4gVGhlIFdvbGYNCjExLiBNeSBOYW1lIGlzIE5pZ2h0IChmZWF0LiBQZXRyb25lbGxhIE5ldHRlcm1hbG0p',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvbS9IYWxvLUFtb3JwaGlzL2RwL0IwOU1HQ1RSSko=',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_metal_id ),
        'tdtax_subgenres' => array( $tax_term_death_metal_id, $tax_term_doom_metal_id, $tax_term_metal_id, $tax_term_progressive_metal_id ),
    ),
));

$cpt_saba_few_good_things_id = td_demo_content::add_cpt( array(
    'title' => 'Saba ― Few Good Things',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_6',
    'post_meta' => array(
        'tdcf_release_date' => 'MDQvMDIvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ny45',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ny4z',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'UGl2b3QgR2FuZw==',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly9zYWJhcGl2b3QuY29tLw==',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gRnJlZSBTYW1wbGVzIChmZWF0LiBDaGVmbGVlKQ0KMi4gT25lIFdheSBvciBFdmVyeSBOKioqYSBXaXRoIGEgQnVkZ2V0DQozLiBTdXJ2aXZvcidzIEd1aWx0IChmZWF0LiBHIEhlcmJvKQ0KNC4gYW4gSW50ZXJsdWRlIENhbGxlZCAiQ2lyY3VzIiAoZmVhdC4gRXJ5biBBbGxlbiBLYW5lKQ0KNS4gRmVhcm1vbmdlciAoZmVhdC4gRGFvdWQpDQo2LiBDb21lIE15IFdheSAoZmVhdC4gS3JheXppZSBCb25lKQ0KNy4gU3RpbGwgKGZlYXQuIDZMQUNLIGFuZCBTbWlubykNCjguIGEgU2ltcGxlciBUaW1lIChmZWF0LiBNZXJlYmEpDQo5LiBTb2xkaWVyIChmZWF0LiBQaXZvdCBHYW5nKQ0KMTAuIElmIEkgSGFkIGEgRG9sbGFyIChmZWF0LiBCZW5qYW1pbiBFYXJsIFR1cm5lcikNCjExLiBTdG9wIFRoYXQNCjEyLiBNYWtlIEJlbGlldmUgKGZlYXQuIEZvdXNoZcOpKQ0KMTMuIDIwMTIgKGZlYXQuIERheSBXYXZlKQ0KMTQuIEZldyBHb29kIFRoaW5ncyAoZmVhdC4gQmxhY2sgVGhvdWdodCBhbmQgRXJ5biBBbGxlbiBLYW5lKQ==',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvbS9GZXctR29vZC1UaGluZ3MtRXhwbGljaXQtU2FiYS9kcC9CMDlLWkhGWUdC',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_hip_hop_id ),
        'tdtax_subgenres' => array( $tax_term_conscious_hip_hop_id, $tax_term_hip_hop_id, $tax_term_jazz_rap_id ),
    ),
));

$cpt_kae_tempest_the_line_is_a_curve_id = td_demo_content::add_cpt( array(
    'title' => 'Kae Tempest ― The Line Is a Curve',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_7',
    'post_meta' => array(
        'tdcf_release_date' => 'MDgvMDQvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'OC4y',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ny4w',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'UmVwdWJsaWM=',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly93d3cua2FldGVtcGVzdC5jby51ay8=',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gUHJpb3JpdHkgQm9yZWRvbQ0KMi4gSSBTYXcgTGlnaHQgKGZlYXQuIEdyaWFuIENoYXR0ZW4pDQozLiBOb3RoaW5nIHRvIFByb3ZlDQo0LiBObyBQcml6ZXMgKGZlYXQuIExpYW5uZSBMYSBIYXZhcykNCjUuIFNhbHQgQ29hc3QNCjYuIERvbid0IFlvdSBFdmVyDQo3LiBUaGVzZSBBcmUgdGhlIERheXMNCjguIFNtb2tpbmcgKGZlYXQuIENvbmZ1Y2l1cyBNQykNCjkuIFdhdGVyIGluIHRoZSBSYWluIChmZWF0LiBhc3NpYSkNCjEwLiBNb3ZlDQoxMS4gTW9yZSBQcmVzc3VyZSAoZmVhdC4gS2V2aW4gQWJzdHJhY3QpDQoxMi4gR3JhY2U=',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvbS9MaW5lLUN1cnZlLUV4cGxpY2l0LUthZS1UZW1wZXN0L2RwL0IwOU5TNUxYRFQ=',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_hip_hop_id ),
        'tdtax_subgenres' => array( $tax_term_conscious_hip_hop_id, $tax_term_hip_hop_id, $tax_term_uk_hip_hop_id ),
    ),
));

$cpt_denzel_curry_melt_my_eyez_see_your_future_id = td_demo_content::add_cpt( array(
    'title' => 'Denzel Curry ― Melt My Eyez, See Your Future',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_8',
    'post_meta' => array(
        'tdcf_release_date' => 'MjUvMDMvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'OC40',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'OC4z',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'TG9tYSBWaXN0YQ==',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly93d3cuZGVuemVsY3VycnkuY29tLw==',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gTWVsdCBTZXNzaW9uICMxIChmZWF0LiBSb2JlcnQgR2xhc3BlcikNCjIuIFdhbGtpbg0KMy4gV29yc3QgQ29tZXMgdG8gV29yc3QNCjQuIEpvaG4gV2F5bmUgKGZlYXQuIEJ1enp5IExlZSkNCjUuIFRoZSBMYXN0DQo2LiBNZW50YWwgKGZlYXQuIFNhdWwgV2lsbGlhbXMgJiBCcmlkZ2V0IFBlcmV6KQ0KNy4gVHJvdWJsZXMgKGZlYXQuIFQtUGFpbikNCjguIEFpbid0IE5vIFdheQ0KOS4gWC1XaW5nDQoxMC4gQW5nZWx6IChmZWF0LiBLYXJyaWVtIFJpZ2dpbnMpDQoxMS4gVGhlIFNtZWxsIG9mIERlYXRoDQoxMi4gU2FuanVybyAoZmVhdC4gNDU0KQ0KMTMuIFphdG9pY2hpIChmZWF0LiBzbG93dGhhaSkNCjE0LiBUaGUgSWxscw==',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly9kZW56ZWxjdXJyeW11c2ljLmJhbmRjYW1wLmNvbS9hbGJ1bS9tZWx0LW15LWV5ZXotc2VlLXlvdXItZnV0dXJl',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_hip_hop_id ),
        'tdtax_subgenres' => array( $tax_term_conscious_hip_hop_id, $tax_term_hip_hop_id, $tax_term_southern_hip_hop_id, $tax_term_trap_id ),
    ),
));

$cpt_kendrick_lamar_mr_morale_the_big_steppers_id = td_demo_content::add_cpt( array(
    'title' => 'Kendrick Lamar ― Mr. Morale & The Big Steppers',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_9',
    'post_meta' => array(
        'tdcf_release_date' => 'MTMvMDUvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'OC43',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'OC41',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'QWZ0ZXJtYXRo',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => '',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gVW5pdGVkIGluIEdyaWVmDQoyLiBOOTUNCjMuIFdvcmxkd2lkZSBTdGVwcGVycw0KNC4gRGllIEhhcmQNCjUuIEZhdGhlciBUaW1lDQo2LiBSaWNoIChJbnRlcmx1ZGUpDQo3LiBSaWNoIFNwaXJpdA0KOC4gV2UgQ3J5IFRvZ2V0aGVyDQo5LiBQdXJwbGUgSGVhcnRzDQoNCkIgU2lkZQ0KMS4gQ291bnQgbWUgT3V0DQoyLiBDcm93bg0KMy4gU2lsZW50IEhpbGwNCjQuIFNhdmlvciAoSW50ZXJsdWRlKQ0KNS4gU2F2aW9yDQo2LiBBdW50aWUgRGlhcmllcw0KNy4gTXIuIE1vcmFsZQ0KOC4gTW90aGVyIEkgU29iZXIgKGZlYXQuIEJldGggR2liYm9ucykNCjkuIE1pcnJvcg==',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvbS9Nci1Nb3JhbGUtQmlnLVN0ZXBwZXJzLUV4cGxpY2l0L2RwL0IwQjE1TlcyWDc=',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_hip_hop_id ),
        'tdtax_subgenres' => array( $tax_term_conscious_hip_hop_id, $tax_term_experimental_hip_hop_id, $tax_term_hip_hop_id, $tax_term_west_coast_hip_hop_id ),
    ),
));

$cpt_lil_yachty_lil_boat_2_id = td_demo_content::add_cpt( array(
    'title' => 'Lil Yachty ― Lil Boat 2',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_10',
    'post_meta' => array(
        'tdcf_release_date' => 'MDkvMDMvMjAxOA==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'NS40',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'NC45',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'Q2FwaXRvbCBSZWNvcmRz',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => '',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gU2VsZiBNYWRlDQoyLiBCb29tIQ0KMy4gT29wcw0KNC4gVGFsayB0byBNZSBOaWNlDQo1LiBHZXQgTW9uZXkgQnJvcy4NCjYuIENvdW50IE1lIEluDQo3LiBTaGUgUmVhZHkNCjguIExvdmUgTWUgRm9yZXZlcg0KOS4gRGFzIENhcA0KMTAuIFBvcCBPdXQNCjExLiBOQkFZb3VuZ0JvYXQNCjEyLiBNaWNrZXkNCjEzLiBGV00NCjE0LiBGbGV4DQoxNS4gV2hvbGUgTG90dGEgR3VhcA0KMTYuIEJhYnkgRGFkZHkNCjE3LiA2Ng==',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvLnVrL0xpbC1Cb2F0LTItRXhwbGljaXQtWWFjaHR5L2RwL0IwN0I4UkdSNVA=',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_hip_hop_id ),
        'tdtax_subgenres' => array( $tax_term_hip_hop_id, $tax_term_rap_id, $tax_term_trap_rap_id ),
    ),
));

$cpt_kanye_west_ye_id = td_demo_content::add_cpt( array(
    'title' => 'Kanye West ― Ye',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_1',
    'post_meta' => array(
        'tdcf_release_date' => 'MDEvMDYvMjAxOA==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ni45',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ny44',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'RGVmIEphbQ==',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => '',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gSSBUaG91Z2h0IEFib3V0IEtpbGxpbmcgWW91DQoyLiBZaWtlcw0KMy4gQWxsIE1pbmUNCjQuIFdvdWxkbid0IExlYXZlDQo1LiBObyBNaXN0YWtlcw0KNi4gR2hvc3QgVG93bg0KNy4gVmlvbGVudCBDcmltZXM=',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvLnVrL3llLUthbnllLVdlc3QvZHAvQjA3RFE0M1ZENA==',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_hip_hop_id ),
        'tdtax_subgenres' => array( $tax_term_art_pop_id, $tax_term_hip_hop_id, $tax_term_pop_rap_id ),
    ),
));

$cpt_iann_dior_on_to_better_things_id = td_demo_content::add_cpt( array(
    'title' => 'Iann Dior ― On To Better Things',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_2',
    'post_meta' => array(
        'tdcf_release_date' => 'MjEvMDEvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ni41',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'NC41',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'VGVuIFRob3VzYW5kIFByb2plY3Rz',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly93d3cuaWFubmRpb3IuY29tLw==',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gaXMgaXQgeW91DQoyLiBjb21wbGljYXRlIGl0DQozLiBWMTINCjQuIEkgbWlnaHQNCjUuIGhlYXZ5DQo2LiBkYXJrIGFuZ2VsIGludGVybHVkZQ0KNy4gb2J2aW91cw0KOC4gaGVhcnRicmVhazNyDQo5LiBvcHRpb25zDQoxMC4gcmVncmV0DQoxMS4gdGhvdWdodCBpdCB3YXMNCjEyLiBzaW5raW5nIGludGVybHVkZQ0KMTMuIGxldCB5b3UNCjE0LiBmYWxsaW4nDQoxNS4gaG9wZWxlc3Mgcm9tYW50aWM=',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvLnVrL2JldHRlci10aGluZ3MtRXhwbGljaXQtSWFubi1EaW9yL2RwL0IwOVFEWDhLSjY=',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_hip_hop_id ),
        'tdtax_subgenres' => array( $tax_term_emo_rap_id, $tax_term_hip_hop_id, $tax_term_pop_rap_id ),
    ),
));

$cpt_gunna_ds4ever_id = td_demo_content::add_cpt( array(
    'title' => 'Gunna ― DS4EVER',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_3',
    'post_meta' => array(
        'tdcf_release_date' => 'MDcvMDEvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'My45',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'NC43',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'WVNM',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => '',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gUHJpdmF0ZSBJc2xhbmQNCjIuIFB1c2hpbiBQDQozLiBQb29jaGllIEdvd24NCjQuIE1vcA0KNS4gVGhvdWdodCBJIHdhcyBQbGF5aW5nDQo2LiBQIFBvd2VyDQo3LiBIb3cgWW91IERpZCBUaGF0DQo4LiBBbG90dGEgQ2FrZQ0KOS4gTGl2aW4gV2lsZA0KMTAuIFlvdSAmIE1lDQoxMS4gU291dGggdG8gV2VzdA0KMTIuIDI1SyBKYWNrZXQNCjEzLiBUb28gRWFzeQ0KMTQuIElESyBUaGF0IEJpdGNoDQoxNS4gRmxvb2RlZA0KMTYuIExpZmUgb2YgU2luDQoxNy4gRGllIEFsb25lDQoxOC4gTWlzc2luZyBNZQ0KMTkuIFNvIEZhciBBaGVhZCA+IEVtcGlyZQ0KMjAuIFRvbyBFYXN5IChSZW1peCk=',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly9kczRldmVyLnNob3Av',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_hip_hop_id ),
        'tdtax_subgenres' => array( $tax_term_hip_hop_id, $tax_term_southern_hip_hop_id, $tax_term_trap_rap_id ),
    ),
));

$cpt_drake_scorpion_id = td_demo_content::add_cpt( array(
    'title' => 'Drake ― Scorpion',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_4',
    'post_meta' => array(
        'tdcf_release_date' => 'MjkvMDYvMjAxOA==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'NS43',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'NC41',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'Q2FzaCBNb25leQ==',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly9kcmFrZXJlbGF0ZWQuY29tLw==',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gU3Vydml2YWwNCjIuIE5vbnN0b3ANCjMuIEVsZXZhdGUNCjQuIEVtb3Rpb25sZXNzDQo1LiBHb2QncyBQbGFuDQo2LiBJJ20gVXBzZXQNCjcuIDggT3V0IG9mIDEwDQo4LiBNb2IgVGllcw0KOS4gQ2FuJ3QgVGFrZSBhIEpva2UNCjEwLiBTYW5kcmEncyBSb3NlDQoxMS4gVGFsayBVcA0KMTIuIElzIFRoZXJlIE1vcmUNCg0KQiBTaWRlIA0KMS4gUGVhaw0KMi4gU3VtbWVyIEdhbWVzDQozLiBKYWRlZA0KNC4gTmljZSBmb3IgV2hhdA0KNS4gRmluZXNzZQ0KNi4gUmF0Y2hldCBIYXBweSBCaXJ0aGRheQ0KNy4gVGhhdCdzIEhvdyB5b3UgRmVlbA0KOC4gQmx1ZSBUaW50DQo5LiBJbiBNeSBGZWVsaW5ncw0KMTAuIERvbid0IE1hdHRlciB0byBNZQ0KMTEuIEFmdGVyIERhcmsNCjEyLiBGaW5hbCBGYW50YXN5DQoxMy4gTWFyY2ggMTQ=',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvLnVrL1Njb3JwaW9uLURyYWtlL2RwL0IwN0Y0NjRUQzg=',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_hip_hop_id ),
        'tdtax_subgenres' => array( $tax_term_contemporary_rb_id, $tax_term_hip_hop_id, $tax_term_pop_rap_id, $tax_term_rb_id ),
    ),
));

$cpt_dj_khaled_khaled_khaled_id = td_demo_content::add_cpt( array(
    'title' => 'Dj Khaled ― KHALED KHALED',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_5',
    'post_meta' => array(
        'tdcf_release_date' => 'MzAvMDQvMjAyMQ==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'NS43',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'My4z',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'V2UgdGhlIEJlc3Q=',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => '',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gVGhhbmtmdWwNCjIuIEV2ZXJ5IENoYW5jZSBJIEdldA0KMy4gQmlnIFBhcGVyDQo0LiBXZSBHb2luZyBDcmF6eQ0KNS4gSSBEaWQgSXQNCjYuIExldCBpdCBHbw0KNy4gQm9keSBpbiBNb3Rpb24NCjguIFBvcHN0YXINCjkuIFRoaXMgaXMgTXkgWWVhcg0KMTAuIFNvcnJ5IE5vdCBTb3JyeQ0KMTEuIEp1c3QgQmUNCjEyLiBJIENhbiBIYXZlIEl0IEFsbA0KMTMuIEdyZWVjZQ0KMTQuIFdoZXJlIFlvdSBDb21lIEZyb20=',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuYW1hem9uLmNvLnVrL0toYWxlZC1ESi9kcC9CMDkzMkNYN1dX',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_hip_hop_id ),
        'tdtax_subgenres' => array( $tax_term_hip_hop_id, $tax_term_keep_going_id, $tax_term_pop_rap_id ),
    ),
));

$cpt_wax_motif_house_of_wax_id = td_demo_content::add_cpt( array(
    'title' => 'Wax Motif ― House of Wax',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_6',
    'post_meta' => array(
        'tdcf_release_date' => 'MTgvMDIvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ni4z',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ni42',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => '',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly93YXhtb3RpZi5jb20v',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gSGFyZCBTdHJlZXQNCjIuIEFsbCBCbGFjayBFdmVyeXRoaW5nDQozLiBUaGFuayBZb3UNCjQuIENvbWUgQWdhaW4NCjUuIFNrYW5rIE4gRmxleA0KNi4gVGhyaWxscw0KNy4gTGl2ZSBmb3IgdGhlIE5pZ2h0DQo4LiBEaXZpZGVkIFNvdWxzDQo5LiBLZWVwIFJhdmluZw0KMTAuIFdhaXRpbmcNCjExLiBOZWVkIFlvdQ0KMTIuIEV5ZXMgQ2xvc2VkDQoxMy4gS29hbGFjaw0KMTQuIElzc2EgVmliZQ0KMTUuIEtlZXAgUmF2aW5nIChRbGFuayBSZW1peCkNCjE2LiBUaHJpbGxzIChDb2xvcnNpY2sgUmVtaXgpDQoxNy4gTmVlZCBZb3UgKFBobGVnbWF0aWMgRG9ncyBWSVAp',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cuZGlnZ2Vyc2ZhY3RvcnkuY29tL3ZpbnlsLzI1Mzk1Ny93YXgtbW90aWYtaG91c2Utb2Ytd2F4',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_edm_id ),
        'tdtax_subgenres' => array( $tax_term_electro_id, $tax_term_electronic_id, $tax_term_house_id, $tax_term_uk_bass_id ),
    ),
));

$cpt_echt_inwane_id = td_demo_content::add_cpt( array(
    'title' => 'ECHT! ― INWANE',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_7',
    'post_meta' => array(
        'tdcf_release_date' => 'MjQvMDgvMjAyMQ==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ni40',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ni45',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => '',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => '',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gUGVybWFuZW50DQoyLiBEdW5lcw0KMy4gQ2hhcmxpZXINCjQuIDUwMCBnci4NCjUuIE1vcmUgVGFwZQ0KNi4gQ2hhbXBpDQo3LiBQYXJha2VldA0KOC4gS2lla2ViaWNoZQ0KOS4gRHJhY2hl',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly9lY2h0LmJhbmRjYW1wLmNvbS9hbGJ1bS9pbndhbmU=',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_edm_id ),
        'tdtax_subgenres' => array( $tax_term_electro_id, $tax_term_future_bass_id, $tax_term_trap_id, $tax_term_wonky_id ),
    ),
));

$cpt_steve_summers_generation_loss_id = td_demo_content::add_cpt( array(
    'title' => 'Steve Summers ― Generation Loss',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_8',
    'post_meta' => array(
        'tdcf_release_date' => 'MDIvMDkvMjAyMQ==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ny4w',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ny41',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => '',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => '',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gV2hvIEtub3dzDQoyLiA5MCBTDQozLiBDb21wdXRlciBOb24gR3JhdGENCjQuIFNraW4gb2YgWW91ciBUZWV0aA0KNS4gQSBDcmVlcCBDYWxsZWQgUXVpbnRlbg0KNi4gQmFkIExhdGNoDQo3LiBBZnRlciBIb3Vycw0KOC4gQm94ZWQgSW4NCjkuIExvb3NlIENvbm5lY3Rpb25zDQoxMC4gT2YgVW5rbm93biBPcmlnaW4NCjExLiBUaGUgVHlwZXMNCjEyLiBHZW5lcmF0aW9uIExvc3MNCjEzLiBVbmNsdWJiYWJsZQ==',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly9saWVzcmVjb3Jkcy5iYW5kY2FtcC5jb20vYWxidW0vZ2VuZXJhdGlvbi1sb3Nz',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_edm_id ),
        'tdtax_subgenres' => array( $tax_term_chicago_house_id, $tax_term_electro_id, $tax_term_electronic_id, $tax_term_outsider_house_id ),
    ),
));

$cpt_slumberjack_dichotomy_id = td_demo_content::add_cpt( array(
    'title' => 'Slumberjack ― Dichotomy',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_9',
    'post_meta' => array(
        'tdcf_release_date' => 'MjgvMDEvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'NS44',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ni42',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_label' => 'TUFTU0lWRSBHQUlO',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly9zbHVtYmVyamFja211c2ljLmNvbS8=',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gUHJvbG9ndWUNCjIuIEJldHRlciBPZmYNCjMuIFBhaW4NCjQuIFBvaXNvbg0KNS4gTWVtb3J5DQo2LiBUaGUgUmVwcmlzZQ0KNy4gQXJjIFNlY29uZA0KOC4gQW5kIEkNCjkuIFBhcmFkb3gNCjEwLiBOb3QgRm9yIFlvdQ0KMTEuIEV4Y2FsaWJ1cg0KMTIuIE9waWEncyBUaGVtZQ==',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly9zbHVtYmVyamFjay5sbmsudG8vRGljaG90b215',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_edm_id ),
        'tdtax_subgenres' => array( $tax_term_electro_id, $tax_term_electronic_id, $tax_term_trap_id ),
    ),
));

$cpt_they_hate_change_finally_new_id = td_demo_content::add_cpt( array(
    'title' => 'They Hate Change ― Finally, New',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_10',
    'post_meta' => array(
        'tdcf_release_date' => 'MTMvMDUvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ny44',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ny4z',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_subgenres' => 'U291dGhlcm4gSGlwIEhvcCwgRXhwZXJpbWVudGFsIEhpcCBIb3AsIERydW0gYW5kIEJhc3MsIEVsZWN0cm9uaWM=',
        '_tdcf_subgenres' => 'ZmllbGRfNjI4Y2U5YmEyYTVlOQ==',
        'tdcf_label' => 'SmFnamFndXdhcg==',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => '',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gU3R1bnRybw0KMi4gQnJlYXRoaW5nDQozLiBXaG8gTmV4dD8NCjQuIFJldmVyc2libGUgS2V5cw0KNS4gQmxhdGFudCBMb2NhbGlzbQ0KNi4gQ29kZWQgTGFuZ3VhZ2UgKEludGVybHVkZSkNCjcuIDEwMDAgSG9yc2VzDQo4LiBMaXR0bGUgQnJvdGhlcg0KOS4gU29tZSBEYXlzIEkgSGF0ZSBNeSBWb2ljZQ0KMTAuIENFUlRJDQoxMS4gUGVybQ0KMTIuIFgtUmF5IFNwZXgNCjEzLiBGcm9tIHRoZSBGbG9vcg==',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly90aGV5aGF0ZWNoYW5nZS5iYW5kY2FtcC5jb20v',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_edm_id ),
        'tdtax_subgenres' => array( $tax_term_drum_and_bass_id, $tax_term_electronic_id, $tax_term_experimental_hip_hop_id, $tax_term_southern_hip_hop_id ),
    ),
));

$cpt_culture_shock_sequel_id = td_demo_content::add_cpt( array(
    'title' => 'Culture Shock ― Sequel',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_1',
    'post_meta' => array(
        'tdcf_release_date' => 'MjUvMDIvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'NS44',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ni40',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_subgenres' => 'RHJ1bSBhbmQgQmFzcywgRWxlY3RybywgRWxlY3Ryb25pYw==',
        '_tdcf_subgenres' => 'ZmllbGRfNjI4Y2U5YmEyYTVlOQ==',
        'tdcf_label' => 'UkFNIFJlY29yZHM=',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly9jdWx0dXJlc2hvY2ttdXNpYy5jby51ay8=',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gUHJvbG9ndWUNCjIuIFBhbm9yYW1hDQozLiBSaXNlDQo0LiBSZWNvbWJpbmUNCjUuIERlY29uc3RydWN0DQo2LiBWaXNpb25zIChFZGl0KQ0KNy4gTG9zdA0KOC4gRGlzY290aGVxdWUNCjkuIEVwaWxvZ3VlDQoxMC4gRGlzY290aGVxdWUgKFRvdGFsbHkgRW5vcm1vdXMgRXh0aW5jdCBEaW5vc2F1cnMgUmVtaXgpDQoxMS4gTG9zdCAoUG9sYSAmIEJyeXNvbiBSZW1peCkNCjEyLiBBaXJwbGFuZSAoQ3VsdHVyZSBTaG9jayBSZW1peCk=',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly93d3cucmFtcmVjb3Jkcy5jb20vZG93bmxvYWQvc2VxbHAwMDJk',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_edm_id ),
        'tdtax_subgenres' => array( $tax_term_drum_and_bass_id, $tax_term_electro_id, $tax_term_electronic_id ),
    ),
));

$cpt_fictional_portrayals_filmmaker_id = td_demo_content::add_cpt( array(
    'title' => 'Filmmaker ― Fictional Portrayals',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_2',
    'post_meta' => array(
        'tdcf_release_date' => 'MjIvMDQvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'NS45',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ny40',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_subgenres' => 'ZWxlY3Ryb25pYywgc3ludGggcHVuaywgcG9zdCBwdW5rLCBlbGVjdHJv',
        '_tdcf_subgenres' => 'ZmllbGRfNjI4Y2U5YmEyYTVlOQ==',
        'tdcf_label' => 'VmV5bA==',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => 'aHR0cHM6Ly9mYWNlYm9vay5jb20vZmlsbW1ha2VybXVzaWM=',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gQWxsIEFib3V0IHRoYXQgUHlyYW1pZA0KMi4gRmljdGlvbmFsIFBvcnRyYXlhbHMNCjMuIFBvc3Nlc3Npb24gZmVhdC4gQmFkIEZhaXRoIEFjdG9yDQo0LiBPcnBoaWMgRWdncw0KNS4gU3BsaXR0ZXINCjYuIENvbnRpbnVpdHkNCjcuIEltbXVuZSB0byBQcm9wYWdhbmRhDQo4LiBGYXIgZnJvbSBQcm9zcGVjdA==',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly9maWxtbWFrZXIuYmFuZGNhbXAuY29tL2FsYnVtL2ZpY3Rpb25hbC1wb3J0cmF5YWxz',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_edm_id ),
        'tdtax_subgenres' => array( $tax_term_electro_id, $tax_term_electronic_id, $tax_term_post_punk_id, $tax_term_synth_punk_id ),
    ),
));

$cpt_lila_tirando_a_violetadesire_path_id = td_demo_content::add_cpt( array(
    'title' => 'Lila Tirando A Violeta ― Desire Path',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_3',
    'post_meta' => array(
        'tdcf_release_date' => 'MDgvMDQvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ny4w',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ny42',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_subgenres' => 'ZWxlY3Ryb25pYywgZWxlY3RybywgaGFyZCBkcnVtLCBsYXRpbiBlbGVjdHJvbmlj',
        '_tdcf_subgenres' => 'ZmllbGRfNjI4Y2U5YmEyYTVlOQ==',
        'tdcf_label' => 'TkFBRkk=',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => '',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gTGlsYSBUaXJhbmRvIGEgVmlvbGV0YSAmIE5pY29sYSBDcnV6IC0gQ3VlcnBvIHF1ZSBGbG90YQ0KMi4gTGlsYSBUaXJhbmRvIGEgVmlvbGV0YSAmIFNheXZlZXl1biAtIFdoaXJsd2luZHMNCjMuIFR1bmdzdGVuIFRlYXJzDQo0LiBGbG9yZXMgZGVsIE1hbCAoRGVuZ3VlIERlbmd1ZSBEZW5ndWUgUmVtaXgpDQo1LiBMaWxhIFRpcmFuZG8gYSBWaW9sZXRhICYgTG9yaXMgLSBDYW1pbm9zIGRlbCBEZXNlbw0KNi4gSW50ZXJsdWRlDQo3LiBMaWxhIFRpcmFuZG8gYSBWaW9sZXRhICYgTWVyY2EgQmFlICYgUFJKQ1ROIC0gVHdlbnR5IFNldmVuDQo4LiBMaWxhIFRpcmFuZG8gYSBWaW9sZXRhICYgU3VldWdhIC0gQXBsYXVkaXIgZWwgRGVzYXN0cmUNCjkuIExpbGEgVGlyYW5kbyBhIFZpb2xldGEgJiBWZXJyYWNvIC0gQWd1YXMgVmlvbGVudGFzDQoxMC4gQnJpZWYgR2xpbXBzZXMgb2YgSGFwcGluZXNz',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly9uYWFmaS5iYW5kY2FtcC5jb20vYWxidW0vZGVzaXJlLXBhdGg=',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_edm_id ),
        'tdtax_subgenres' => array( $tax_term_electro_id, $tax_term_electronic_id, $tax_term_hard_drum_id, $tax_term_latin_electronic_id ),
    ),
));

$cpt_aquarian_mutations_i_death_taxes_hanger_id = td_demo_content::add_cpt( array(
    'title' => 'Aquarian ― Mutations I: Death, Taxes & Hanger',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_4',
    'post_meta' => array(
        'tdcf_release_date' => 'MTgvMDUvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ni43',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ny40',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_subgenres' => 'YnJlYWtjb3JlLCBkcnVtIGFuZCBiYXNzLCBlbGVjdHJvLCBlbGVjdHJvbmlj',
        '_tdcf_subgenres' => 'ZmllbGRfNjI4Y2U5YmEyYTVlOQ==',
        'tdcf_label' => 'RGVrbWFudGVs',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => '',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gRGVhdGgsIFRheGVzICYgSGFuZ2VyDQoyLiBSZW5lIExpa2VzIHRoZSBTdGVhaw0KMy4gU2FtIEhhbmR3aWNoDQo0LiBEZWFkIFdoYWxl',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly9hcXVhcmlhbmRla21hbnRlbC5iYW5kY2FtcC5jb20vYWxidW0vbXV0YXRpb25zLWktZGVhdGgtdGF4ZXMtaGFuZ2Vy',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_edm_id ),
        'tdtax_subgenres' => array( $tax_term_breakcore_id, $tax_term_drum_and_bass_id, $tax_term_electro_id, $tax_term_electronic_id ),
    ),
));

$cpt_22122_slikback_id = td_demo_content::add_cpt( array(
    'title' => '22122 ― SlikBack',
    'type' => 'tdcpt_tunes',
    'file' => 'tdcpt_tunes_default.txt',
    'cpt_image_td_id' => 'td_pic_5',
    'post_meta' => array(
        'tdcf_release_date' => 'MjAvMDUvMjAyMg==',
        '_tdcf_release_date' => 'ZmllbGRfNjI4Y2U5ZTYyYTVlYQ==',
        'tdcf_review_score' => 'Ni43',
        '_tdcf_review_score' => 'ZmllbGRfNjI4Y2VhMTgyYTVlZA==',
        'tdcf_average_score' => 'Ny45',
        '_tdcf_average_score' => 'ZmllbGRfNjI4ZGU4OWY2NjhhZA==',
        'tdcf_subgenres' => 'VFJBUCwgRFJJTEwgQU5EIEJBU1MsIERFQ09OU1RSVUNURUQgQ0xVQg==',
        '_tdcf_subgenres' => 'ZmllbGRfNjI4Y2U5YmEyYTVlOQ==',
        'tdcf_label' => '',
        '_tdcf_label' => 'ZmllbGRfNjI4Y2U5ZjcyYTVlYg==',
        'tdcf_artist_website' => '',
        '_tdcf_artist_website' => 'ZmllbGRfNjI4Y2U4ODQyYTVlNw==',
        'tdcf_track_list' => 'MS4gU0VRVUVOQ0UNCjIuIElSQVRBTkRBDQozLiBSRU0NCjQuIEkNCjUuIFRIUk9VR0ggWU9V',
        '_tdcf_track_list' => 'ZmllbGRfNjI4Y2VhMDIyYTVlYw==',
        'tdcf_buy_the_album' => 'aHR0cHM6Ly9zbGlrYmFjay5iYW5kY2FtcC5jb20vYWxidW0vMjIxMjI=',
        '_tdcf_buy_the_album' => 'ZmllbGRfNjI4Y2U4YmEyYTVlOA==',
    ),
    'cpt_taxonomies' => array(
        'tdtax_music' => array( $tax_term_edm_id ),
        'tdtax_subgenres' => array( $tax_term_deconstructed_club_id, $tax_term_drill_and_bass_id, $tax_term_trap_id ),
    ),
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

$menu_item_1_id = td_demo_menus::add_mega_menu( array(
    'title' => 'Blog',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_blog_id,
    'parent_id' => ''
), true);

$menu_item_2_id = td_demo_menus::add_link( array(
    'title' => 'Music',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_taxonomy( array(
    'title' => 'Rock',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'taxonomy' => 'tdtax_music',
    'tax_id' => $tax_term_rock_id,
    'parent_id' => $menu_item_2_id
));

$menu_item_4_id = td_demo_menus::add_taxonomy( array(
    'title' => 'Metal',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'taxonomy' => 'tdtax_music',
    'tax_id' => $tax_term_metal_id,
    'parent_id' => $menu_item_2_id
));

$menu_item_5_id = td_demo_menus::add_taxonomy( array(
    'title' => 'Pop',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'taxonomy' => 'tdtax_music',
    'tax_id' => $tax_term_pop_id,
    'parent_id' => $menu_item_2_id
));

$menu_item_6_id = td_demo_menus::add_taxonomy( array(
    'title' => 'Hip Hop',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'taxonomy' => 'tdtax_music',
    'tax_id' => $tax_term_hip_hop_id,
    'parent_id' => $menu_item_2_id
));

$menu_item_7_id = td_demo_menus::add_taxonomy( array(
    'title' => 'EDM',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'taxonomy' => 'tdtax_music',
    'tax_id' => $tax_term_edm_id,
    'parent_id' => $menu_item_2_id
));

$menu_item_8_id = td_demo_menus::add_page(array(
    'title' => 'Subscribe',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'page_id' => $page_tds_switching_plans_wizard_id,
    'parent_id' => ''
));


/*  ----------------------------------------------------------------------------
	CLOUD TEMPLATES
*/
$template_date_template_id = td_demo_content::add_cloud_template( array(
    'title' => 'Compass - Date Template',
    'file' => 'date_cloud_template.txt',
    'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_id);


$template_tag_template_id = td_demo_content::add_cloud_template( array(
    'title' => 'Compass - Tag Template',
    'file' => 'tag_cloud_template.txt',
    'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_id);


$template_author_template_id = td_demo_content::add_cloud_template( array(
    'title' => 'Compass - Author Template',
    'file' => 'author_cloud_template.txt',
    'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_id);


$template_single_template_id = td_demo_content::add_cloud_template( array(
    'title' => 'Compass - Single Template',
    'file' => 'post_cloud_template.txt',
    'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_id);


$template_category_template_id = td_demo_content::add_cloud_template( array(
    'title' => 'Compass - Category Template',
    'file' => 'cat_cloud_template.txt',
    'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_id);


$template_search_template_id = td_demo_content::add_cloud_template( array(
    'title' => 'Compass - Search Template',
    'file' => 'search_cloud_template.txt',
    'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_id);


$template_404_template_id = td_demo_content::add_cloud_template( array(
    'title' => 'Compass - 404 Template',
    'file' => '404_cloud_template.txt',
    'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_id);


$template_custom_taxonomy_id = td_demo_content::add_cloud_template( array(
    'title' => 'Compass - Custom Taxonomy',
    'file' => 'cpt_tax_cloud_template.txt',
    'template_type' => 'cpt_tax',
));

td_demo_misc::update_global_cpt_tax_template( 'tdb_template_' . $template_custom_taxonomy_id, 'music' );


td_demo_misc::update_global_cpt_tax_template( 'tdb_template_' . $template_custom_taxonomy_id, 'tdtax_music' );


td_demo_misc::update_global_cpt_tax_template( 'tdb_template_' . $template_custom_taxonomy_id, 'tdtax_subgenres' );


$template_custom_post_type_id = td_demo_content::add_cloud_template( array(
    'title' => 'Compass - Custom Post Type',
    'file' => 'cpt_cloud_template.txt',
    'template_type' => 'cpt',
));

td_demo_misc::update_global_cpt_template( 'tdb_template_' . $template_custom_post_type_id, 'tunes' );


td_demo_misc::update_global_cpt_template( 'tdb_template_' . $template_custom_post_type_id, 'tdcpt_tunes' );


$template_footer_template_id = td_demo_content::add_cloud_template( array(
    'title' => 'Compass - Footer Template',
    'file' => 'footer_cloud_template.txt',
    'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_id);


$template_header_template_id = td_demo_content::add_cloud_template( array(
    'title' => 'Compass - Header Template',
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
