<?php 



/*  ---------------------------------------------------------------------------- 
	SUBSCRIPTION - start phase 1
*/
	update_option('users_can_register', true);
global $wpdb;
$disable_wizard = $wpdb->get_var( "SELECT value FROM tds_options WHERE name = 'disable_wizard'");
if ( empty($disable_wizard)) {

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



$plan_monthly_plan_id = td_demo_subscription::add_plan( array(
	'name' => 'Monthly Plan',
	'price' => '4',
	'months_in_cycle' => '1',
	'trial_days' => '0',
	'is_free' => '0',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"8361f93ba36a3b6";}',
	)
);

$plan_free_plan_id = td_demo_subscription::add_plan( array(
	'name' => 'Free Plan',
	'price' => '',
	'months_in_cycle' => '',
	'trial_days' => '0',
	'is_free' => '1',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"3561f93ba36a50b";}',
	)
);

$plan_yearly_plan_id = td_demo_subscription::add_plan( array(
	'name' => 'Yearly Plan',
	'price' => '48',
	'months_in_cycle' => '12',
	'trial_days' => '0',
	'is_free' => '0',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"6261f93ba36a586";}',
	)
);

$page_payment_page_id_id = td_demo_content::add_page(array(
	'title' => 'Checkout - aniglobe',
	'file' => 'tds_checkout.txt',
));

td_demo_subscription::add_option( array(
	'name' => 'payment_page_id',
	'value' => $page_payment_page_id_id,
	)
);

$page_my_account_page_id_id = td_demo_content::add_page(array(
	'title' => 'My Account - aniglobe',
	'file' => 'tds_my_account.txt',
));

td_demo_subscription::add_option( array(
	'name' => 'my_account_page_id',
	'value' => $page_my_account_page_id_id,
	)
);

$page_create_account_page_id_id = td_demo_content::add_page(array(
	'title' => 'Login/Register - aniglobe',
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

$cat_spring_2022_id = td_demo_category::add_category(array(
    'category_name' => 'Spring 2022',
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

$cat_winter_2022_id = td_demo_category::add_category(array(
    'category_name' => 'Winter 2022',
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

$cat_action_id = td_demo_category::add_category(array(
	'category_name' => 'Action',
	'parent_id' => $cat_spring_2022_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_comedy_id = td_demo_category::add_category(array(
	'category_name' => 'Comedy',
	'parent_id' => $cat_spring_2022_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_fantasy_id = td_demo_category::add_category(array(
	'category_name' => 'Fantasy',
	'parent_id' => $cat_spring_2022_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_isekai_id = td_demo_category::add_category(array(
	'category_name' => 'Isekai',
	'parent_id' => $cat_winter_2022_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_movie_id = td_demo_category::add_category(array(
	'category_name' => 'Movie',
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

$cat_romance_id = td_demo_category::add_category(array(
	'category_name' => 'Romance',
	'parent_id' => $cat_spring_2022_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_seinen_id = td_demo_category::add_category(array(
	'category_name' => 'Seinen',
	'parent_id' => $cat_winter_2022_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_shoujo_id = td_demo_category::add_category(array(
	'category_name' => 'Shoujo',
	'parent_id' => $cat_winter_2022_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_shounen_id = td_demo_category::add_category(array(
	'category_name' => 'Shounen',
	'parent_id' => $cat_winter_2022_id,
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
$page_homepage_id = td_demo_content::add_page(array(
	'title' => 'Homepage',
	'file' => 'homepage.txt',
	'homepage' => true,
	'demo_unique_id' => '4861f93ba401285',
));

$page_aniglobe_pricing_plans_id = td_demo_content::add_page(array(
	'title' => 'AniGlobe Pricing Plans',
	'file' => 'aniglobe_pricing_plans.txt',
	'demo_unique_id' => '8561f93ba402045',
));


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
				'tds_title' => 'Unlock by Subscribing',
				'tds_message' => 'Get instant access to the latest news and stay up to date on everything going on in the anime world.',
				'tds_submit_btn_text' => 'Subscribe',
				'tds_pp_msg' => 'I consent to processing of my data according to <a href=\"#\">Terms of Use</a> & <a href=\"#\">Privacy Policy</a>.',
				'tds_locker_cf_1_name' => 'Custom field 1',
				'tds_locker_cf_2_name' => 'Custom field 2',
				'tds_locker_cf_3_name' => 'Custom field 3',
			),
	'tds_payable' => 'paid_subscription',
	'tds_paid_subs_page_id' => $page_aniglobe_pricing_plans_id,
	'tds_paid_subs_plan_ids' => [$plan_monthly_plan_id,$plan_free_plan_id,$plan_yearly_plan_id],
			'tds_locker_styles' => array(
				'tds_bg_color' => '#e4eeed',
				'tds_title_color' => '#2e3837',
				'tds_message_color' => '#2e3837',
				'tds_submit_btn_text_color' => '#2e3837',
				'tds_submit_btn_text_color_h' => '#e4eeed',
				'tds_submit_btn_bg_color' => '#52e2cf',
				'tds_submit_btn_bg_color_h' => '#27756b',
				'tds_after_btn_text_color' => '#2e3837',
				'tds_pp_checked_color' => '#e4eeed',
				'tds_pp_check_bg' => '#899e9b',
				'tds_pp_check_bg_f' => '#52e2cf',
				'tds_pp_check_border_color' => '#899e9b',
				'tds_pp_check_border_color_f' => '#52e2cf',
				'tds_pp_msg_color' => '#2e3837',
				'tds_pp_msg_links_color' => '#27756b',
				'tds_pp_msg_links_color_h' => '#52e2cf',
				'tds_general_font_family' => '507',
				'tds_title_font_family' => '507',
				'tds_title_font_size' => '30',
				'tds_title_font_line_height' => '1.2',
				'tds_title_font_weight' => '900',
				'tds_message_font_family' => '507',
				'tds_message_font_size' => '16',
				'tds_message_font_line_height' => '1.4',
				'tds_message_font_weight' => '600',
				'tds_submit_btn_text_font_family' => '507',
				'tds_submit_btn_text_font_size' => '12',
				'tds_submit_btn_text_font_weight' => '600',
				'tds_submit_btn_text_font_transform' => 'uppercase',
				'tds_submit_btn_text_font_spacing' => '0.5',
				'tds_after_btn_text_font_family' => '507',
				'tds_after_btn_text_font_size' => '12',
				'tds_after_btn_text_font_line_height' => '1.2',
				'tds_after_btn_text_font_weight' => '600',
				'tds_pp_msg_font_family' => '507',
				'tds_pp_msg_font_size' => '12',
				'tds_pp_msg_font_line_height' => '1.2',
				'tds_pp_msg_font_weight' => '600',
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

td_util::update_option('tds_demo_options', 'a:1:{s:5:"plans";a:3:{i:0;a:2:{s:9:"unique_id";s:15:"8361f93ba36a3b6";s:4:"name";s:12:"Monthly Plan";}i:1;a:2:{s:9:"unique_id";s:15:"3561f93ba36a50b";s:4:"name";s:9:"Free Plan";}i:2;a:2:{s:9:"unique_id";s:15:"6261f93ba36a586";s:4:"name";s:11:"Yearly Plan";}}}');


/*  ---------------------------------------------------------------------------- 
	SUBSCRIPTION - end phase 2
*/

/*  ---------------------------------------------------------------------------- 
	POSTS
*/
$post_td_post_boku_no_hero_academia_the_movie_world_heroes_mission_tabidachi_id = td_demo_content::add_post(array(
	'title' => 'Boku no Hero Academia THE MOVIE: World Heroes\' Mission - Tabidachi',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_movie_id,),
));

$post_td_post_totsukuni_no_shoujo_id = td_demo_content::add_post(array(
	'title' => 'Totsukuni no Shoujo',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_movie_id,),
));

$post_td_post_goodbye_donglees_id = td_demo_content::add_post(array(
	'title' => 'Goodbye, DonGlees!',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_movie_id,),
));

$post_td_post_fruits_basket_prelude_id = td_demo_content::add_post(array(
	'title' => 'Fruits Basket: prelude',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_movie_id,),
));

$post_td_post_mushoku_tensei_isekai_ittara_honki_dasu_part_2_special_id = td_demo_content::add_post(array(
	'title' => 'Mushoku Tensei: Isekai Ittara Honki Dasu Part 2 Special',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_movie_id,),
));

$post_td_post_chikyuugai_shounen_shoujo_id = td_demo_content::add_post(array(
	'title' => 'Chikyuugai Shounen Shoujo',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_movie_id,),
));

$post_td_post_blue_thermal_id = td_demo_content::add_post(array(
	'title' => 'Blue Thermal',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_movie_id,),
));

$post_td_post_shika_no_ou_yuna_to_yakusoku_no_tabi_id = td_demo_content::add_post(array(
	'title' => 'Shika no Ou: Yuna to Yakusoku no Tabi',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_movie_id,),
));

$post_td_post_ginga_eiyuu_densetsu_die_neue_these_gekitotsu_1_id = td_demo_content::add_post(array(
	'title' => 'Ginga Eiyuu Densetsu: Die Neue These - Gekitotsu 1',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_movie_id,),
));

$post_td_post_eien_no_831_id = td_demo_content::add_post(array(
	'title' => 'Eien no 831',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_movie_id,),
));

$post_td_post_kawaii_dake_ja_nai_shikimori_san_id = td_demo_content::add_post(array(
	'title' => 'Kawaii dake ja Nai Shikimori-san',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_romance_id,),
));

$post_td_post_dance_dance_danseur_id = td_demo_content::add_post(array(
	'title' => 'Dance Dance Danseur',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_romance_id,),
));

$post_td_post_komi_san_wa_komyushou_desu_2_id = td_demo_content::add_post(array(
	'title' => 'Komi-san wa, Komyushou desu. 2',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_romance_id,),
));

$post_td_post_rikei_ga_koi_ni_ochita_no_de_shoumei_shitemita_r1_sin0_id = td_demo_content::add_post(array(
	'title' => 'Rikei ga Koi ni Ochita no de Shoumei shitemita. r equals 1-sin0',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'tds_locker' => '8',
	'categories_id_array' => array($cat_romance_id,),
));

$post_td_post_kaguya_sama_wa_kokurasetai_ultra_romantic_id = td_demo_content::add_post(array(
	'title' => 'Kaguya-sama wa Kokurasetai: Ultra Romantic',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_romance_id,),
));

$post_td_post_black_rock_shooter_dawn_fall_id = td_demo_content::add_post(array(
	'title' => 'Black Rock Shooter: DAWN FALL',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_action_id,),
));

$post_td_post_otomege_sekai_wa_mob_ni_kibishii_sekai_desu_id = td_demo_content::add_post(array(
	'title' => 'Otomege Sekai wa Mob ni Kibishii Sekai desu',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_action_id,),
));

$post_td_post_summer_time_render_id = td_demo_content::add_post(array(
	'title' => 'Summer Time Render',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_action_id,),
));

$post_td_post_yuusha_yamemasu_id = td_demo_content::add_post(array(
	'title' => 'Yuusha, Yamemasu',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_action_id,),
));

$post_td_post_spyxfamily_id = td_demo_content::add_post(array(
	'title' => 'SPY×FAMILY',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_action_id,),
));

$post_td_post_motto_majime_ni_fumajime_kaiketsu_zorori_3rd_season_id = td_demo_content::add_post(array(
	'title' => 'Motto! Majime ni Fumajime Kaiketsu Zorori 3rd Season',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_comedy_id,),
));

$post_td_post_paripi_koumei_id = td_demo_content::add_post(array(
	'title' => 'Paripi Koumei',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_comedy_id,),
));

$post_td_post_aharen_san_wa_hakarenai_id = td_demo_content::add_post(array(
	'title' => 'Aharen-san wa Hakarenai',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_comedy_id,),
));

$post_td_post_heroine_tarumono_kiraware_heroine_to_naisho_no_oshigoto_id = td_demo_content::add_post(array(
	'title' => 'Heroine Tarumono!: Kiraware Heroine to Naisho no Oshigoto',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_comedy_id,),
));

$post_td_post_machikado_mazoku_2_choume_id = td_demo_content::add_post(array(
	'title' => 'Machikado Mazoku: 2-Choume',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_comedy_id,),
));

$post_td_post_magia_record_mahou_shoujo_madoka_magica_gaiden_final_season_asaki_yume_no_akatsuki_id = td_demo_content::add_post(array(
	'title' => 'Magia Record: Mahou Shoujo Madoka Magica Gaiden Final Season - Asaki Yume no Akatsuki',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_fantasy_id,),
));

$post_td_post_mahoutsukai_reimeiki_id = td_demo_content::add_post(array(
	'title' => 'Mahoutsukai Reimeiki',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_fantasy_id,),
));

$post_td_post_shijou_saikyou_no_daimaou_murabito_a_ni_tensei_suru_id = td_demo_content::add_post(array(
	'title' => 'Shijou Saikyou no Daimaou, Murabito A ni Tensei suru',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_fantasy_id,),
));

$post_td_post_honzuki_no_gekokujou_shisho_ni_naru_tame_ni_wa_shudan_wo_erandeiraremasen_3_id = td_demo_content::add_post(array(
	'title' => 'Honzuki no Gekokujou: Shisho ni Naru Tame ni wa Shudan wo Erandeiraremasen 3',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_fantasy_id,),
));

$post_td_post_tate_no_yuusha_no_nariagari_2_id = td_demo_content::add_post(array(
	'title' => 'Tate no Yuusha no Nariagari 2',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_fantasy_id,),
));

$post_td_post_cue_id = td_demo_content::add_post(array(
	'title' => 'CUE!',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_shoujo_id,),
));

$post_td_post_saiyuuki_reload_zeroin_id = td_demo_content::add_post(array(
	'title' => 'Saiyuuki RELOAD: ZEROIN',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_shoujo_id,),
));

$post_td_post_kaijin_kaihatsubu_no_kuroitsu_san_id = td_demo_content::add_post(array(
	'title' => 'Kaijin Kaihatsubu no Kuroitsu-san',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_shoujo_id,),
));

$post_td_post_baraou_no_souretsu_id = td_demo_content::add_post(array(
	'title' => 'Baraou no Souretsu',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_shoujo_id,),
));

$post_td_post_koroshi_ai_id = td_demo_content::add_post(array(
	'title' => 'Koroshi Ai',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_shoujo_id,),
));

$post_td_post_gensou_sangokushi_tengen_reishinki_id = td_demo_content::add_post(array(
	'title' => 'Gensou Sangokushi: Tengen Reishinki',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_seinen_id,),
));

$post_td_post_hakozume_koban_joshi_no_gyakushuu_id = td_demo_content::add_post(array(
	'title' => 'Hakozume: Koban Joshi no Gyakushuu',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_seinen_id,),
));

$post_td_post_tokyo_24_ku_id = td_demo_content::add_post(array(
	'title' => 'Tokyo 24-ku',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_seinen_id,),
));

$post_td_post_slow_loop_id = td_demo_content::add_post(array(
	'title' => 'Slow Loop',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_seinen_id,),
));

$post_td_post_akebi_chan_no_sailor_fuku_id = td_demo_content::add_post(array(
	'title' => 'Akebi-chan no Sailor Fuku',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_seinen_id,),
));

$post_td_post_kenja_no_deshi_wo_nanoru_kenja_id = td_demo_content::add_post(array(
	'title' => 'Kenja no Deshi wo Nanoru Kenja',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_isekai_id,),
));

$post_td_post_leadale_no_daichi_nite_id = td_demo_content::add_post(array(
	'title' => 'Leadale no Daichi nite',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_isekai_id,),
));

$post_td_post_shikkakumon_no_saikyou_kenja_id = td_demo_content::add_post(array(
	'title' => 'Shikkakumon no Saikyou Kenja',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_isekai_id,),
));

$post_td_post_genjitsu_shugi_yuusha_no_oukoku_saikenki_part_2_id = td_demo_content::add_post(array(
	'title' => 'Genjitsu Shugi Yuusha no Oukoku Saikenki Part 2',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_isekai_id,),
));

$post_td_post_arifureta_shokugyou_de_sekai_saikyou_2nd_season_id = td_demo_content::add_post(array(
	'title' => 'Arifureta Shokugyou de Sekai Saikyou 2nd season',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_isekai_id,),
));

$post_td_post_sabikui_bisco_id = td_demo_content::add_post(array(
	'title' => 'Sabikui Bisco',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_shounen_id,),
));

$post_td_post_orient_id = td_demo_content::add_post(array(
	'title' => 'ORIENT',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_shounen_id,),
));

$post_td_post_vanitas_no_carte_part_2_id = td_demo_content::add_post(array(
	'title' => 'Vanitas no Carte Part 2',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_shounen_id,),
));

$post_td_post_hanyou_no_yashahime_ni_no_shou_id = td_demo_content::add_post(array(
	'title' => 'Hanyou no Yashahime: Ni no Shou',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_shounen_id,),
));

$post_td_post_kimetsu_no_yaiba_yuukaku_hen_id = td_demo_content::add_post(array(
	'title' => 'Kimetsu no Yaiba: Yuukaku-hen',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_shounen_id,),
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
	'title' => 'Winter 2022',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_winter_2022_id,
	'parent_id' => ''
), true);

$menu_item_2_id = td_demo_menus::add_category(array(
	'title' => 'Spring 2022',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_spring_2022_id,
	'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_category(array(
	'title' => 'Action',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_action_id,
	'parent_id' => $menu_item_2_id
));

$menu_item_4_id = td_demo_menus::add_category(array(
	'title' => 'Comedy',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_comedy_id,
	'parent_id' => $menu_item_2_id
));

$menu_item_5_id = td_demo_menus::add_category(array(
	'title' => 'Fantasy',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_fantasy_id,
	'parent_id' => $menu_item_2_id
));

$menu_item_6_id = td_demo_menus::add_category(array(
	'title' => 'Romance',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_romance_id,
	'parent_id' => $menu_item_2_id
));

$menu_item_7_id = td_demo_menus::add_mega_menu(array(
	'title' => 'Movie',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_movie_id,
	'parent_id' => ''
), true);


/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/
$template_date_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'AniGlobe - Date Template',
	'file' => 'date_cloud_template.txt',
	'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_id);


$template_tag_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'AniGlobe - Tag Template',
	'file' => 'tag_cloud_template.txt',
	'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_id);


$template_search_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'AniGlobe - Search Template',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_id);


$template_404_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'AniGlobe - 404 Template',
	'file' => '404_cloud_template.txt',
	'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_id);


$template_author_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'AniGlobe - Author Template',
	'file' => 'author_cloud_template.txt',
	'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_id);


$template_category_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'AniGlobe - Category Template',
	'file' => 'cat_cloud_template.txt',
	'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_id);


$template_single_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'AniGlobe - Single Template',
	'file' => 'post_cloud_template.txt',
	'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_id);


$template_footer_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'AniGlobe - Footer Template',
	'file' => 'footer_cloud_template.txt',
	'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_id);


$template_header_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'AniGlobe - Header Template',
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
