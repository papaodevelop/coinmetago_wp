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
	'price' => '25',
	'months_in_cycle' => '1',
	'trial_days' => '0',
	'is_free' => '0',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"24621f7d1fdd129";}',
	)
);

$plan_yearly_plan_id = td_demo_subscription::add_plan( array(
	'name' => 'Yearly Plan',
	'price' => '300',
	'months_in_cycle' => '12',
	'trial_days' => '0',
	'is_free' => '0',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"82621f7d1fdd1d4";}',
	)
);

$plan_free_plan_id = td_demo_subscription::add_plan( array(
	'name' => 'Free Plan',
	'price' => '',
	'months_in_cycle' => '',
	'trial_days' => '0',
	'is_free' => '1',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"15621f7d1fdd26a";}',
	)
);

$page_payment_page_id_id = td_demo_content::add_page(array(
	'title' => 'Checkout - lightning_path',
	'file' => 'lightning_path_checkout.txt',
));

td_demo_subscription::add_option( array(
	'name' => 'payment_page_id',
	'value' => $page_payment_page_id_id,
	)
);

$page_my_account_page_id_id = td_demo_content::add_page(array(
	'title' => 'My Account - lightning_path',
	'file' => 'lightning_path_my_account.txt',
));

td_demo_subscription::add_option( array(
	'name' => 'my_account_page_id',
	'value' => $page_my_account_page_id_id,
	)
);

$page_create_account_page_id_id = td_demo_content::add_page(array(
	'title' => 'Login/Register - lightning_path',
	'file' => 'lightning_path_login_register.txt',
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
$cat_animation_id = td_demo_category::add_category(array(
	'category_name' => 'Animation',
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

$cat_anime_manga_id = td_demo_category::add_category(array(
	'category_name' => 'Anime/Manga',
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

$cat_childhood_teenage_years_id = td_demo_category::add_category(array(
	'category_name' => 'Childhood - Teenage Years',
	'parent_id' => $cat_anime_manga_id,
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

$cat_manga_id = td_demo_category::add_category(array(
	'category_name' => 'Manga',
	'parent_id' => $cat_anime_manga_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_promotional_art_id = td_demo_category::add_category(array(
	'category_name' => 'Promotional Art',
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

$cat_shippuden_id = td_demo_category::add_category(array(
	'category_name' => 'Shippuden',
	'parent_id' => $cat_anime_manga_id,
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
	PAGES
*/
$page_lightning_path_header_menu_popup_id = td_demo_content::add_page(array(
	'title' => 'Lightning-Path Header Menu Popup',
	'file' => 'lightning_path_header_menu_popup.txt',
	'demo_unique_id' => '4621f7d20223b0',
));

$page_homepage_id = td_demo_content::add_page(array(
	'title' => 'Homepage',
	'file' => 'homepage.txt',
	'homepage' => true,
	'demo_unique_id' => '37621f7d2023621',
));

$page_lightning_path_switching_plans_wizard_id = td_demo_content::add_page(array(
	'title' => 'Lightning-Path Switching plans wizard',
	'file' => 'lightning_path_switching_plans_wizard.txt',
	'demo_unique_id' => '76621f7d2024038',
));

$page_lightning_path_header_search_popup_id = td_demo_content::add_page(array(
	'title' => 'Lightning-Path Header Search Popup',
	'file' => 'lightning_path_header_search_popup.txt',
	'demo_unique_id' => '3621f7d2024c95',
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
				'tds_title' => 'Get access to exclusive content',
				'tds_message' => 'Want to see what\'s underneath? Just choose one of the 3 plans and you\'d be receiving weekly updates when we post.',
				'tds_submit_btn_text' => 'Subscribe',
				'tds_pp_msg' => 'I consent to processing of my data according to <a href=\"#\">Terms of Use</a> & <a href=\"#\">Privacy Policy</a>.',
				'tds_locker_cf_1_name' => 'Custom field 1',
				'tds_locker_cf_2_name' => 'Custom field 2',
				'tds_locker_cf_3_name' => 'Custom field 3',
			),
	'tds_payable' => 'paid_subscription',
	'tds_paid_subs_page_id' => $page_lightning_path_switching_plans_wizard_id,
	'tds_paid_subs_plan_ids' => [$plan_monthly_plan_id,$plan_yearly_plan_id,$plan_free_plan_id],
			'tds_locker_styles' => array(
				'tds_bg_color' => '#594cb5',
				'all_tds_border' => '2px',
				'all_tds_border_color' => '#000b39',
				'tds_title_color' => '#f3f4fd',
				'tds_message_color' => '#f3f4fd',
				'tds_submit_btn_text_color' => '#f3f4fd',
				'tds_submit_btn_text_color_h' => '#f3f4fd',
				'tds_submit_btn_bg_color' => '#7c8efc',
				'tds_submit_btn_bg_color_h' => '#000b39',
				'tds_after_btn_text_color' => '#e2e5f7',
				'tds_pp_checked_color' => '#f3f4fd',
				'tds_pp_check_bg' => '#000b39',
				'tds_pp_check_bg_f' => '#7c8efc',
				'tds_pp_check_border_color' => '#000b39',
				'tds_pp_check_border_color_f' => '#7c8efc',
				'tds_pp_msg_color' => '#e2e5f7',
				'tds_pp_msg_links_color' => '#7c8efc',
				'tds_pp_msg_links_color_h' => '#000b39',
				'tds_general_font_family' => '1353',
				'tds_title_font_family' => '1353',
				'tds_title_font_size' => '26',
				'tds_title_font_line_height' => '1.2',
				'tds_title_font_weight' => '800',
				'tds_message_font_family' => '961',
				'tds_message_font_size' => '14',
				'tds_message_font_line_height' => '1.2',
				'tds_submit_btn_text_font_family' => '961',
				'tds_submit_btn_text_font_size' => '14',
				'tds_submit_btn_text_font_transform' => 'uppercase',
				'tds_submit_btn_text_font_spacing' => '1',
				'tds_after_btn_text_font_family' => '961',
				'tds_after_btn_text_font_size' => '12',
				'tds_after_btn_text_font_line_height' => '1.2',
				'tds_after_btn_text_font_spacing' => '0.5',
				'tds_pp_msg_font_family' => '961',
				'tds_pp_msg_font_size' => '12',
				'tds_pp_msg_font_line_height' => '1.2',
				'tds_pp_msg_font_spacing' => '0.5',
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

td_util::update_option('tds_demo_options', 'a:1:{s:5:"plans";a:3:{i:0;a:2:{s:9:"unique_id";s:15:"24621f7d1fdd129";s:4:"name";s:12:"Monthly Plan";}i:1;a:2:{s:9:"unique_id";s:15:"82621f7d1fdd1d4";s:4:"name";s:11:"Yearly Plan";}i:2;a:2:{s:9:"unique_id";s:15:"15621f7d1fdd26a";s:4:"name";s:9:"Free Plan";}}}');


/*  ---------------------------------------------------------------------------- 
	SUBSCRIPTION - end phase 2
*/

/*  ---------------------------------------------------------------------------- 
	POSTS
*/
$post_td_post_rinnegan_and_its_impacts_on_the_psyche_id = td_demo_content::add_post(array(
	'title' => 'Rinnegan and its Impacts on the Psyche',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_animation_id,),
));

$post_td_post_adult_sasuke_and_his_power_level_id = td_demo_content::add_post(array(
	'title' => 'Adult Sasuke and His Power Level',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_animation_id,),
));

$post_td_post_the_five_kage_summit_glare_of_death_id = td_demo_content::add_post(array(
	'title' => 'The Five Kage Summit Glare of Death',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_animation_id,),
));

$post_td_post_different_ways_sasuke_has_expressed_his_disinterest_id = td_demo_content::add_post(array(
	'title' => 'Different Ways Sasuke has Expressed his disinterest',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_animation_id,),
));

$post_td_post_did_you_know_sasuke_has_a_hawk_id = td_demo_content::add_post(array(
	'title' => 'Did you know Sasuke has a Hawk?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_animation_id,),
));

$post_td_post_smirking_his_way_to_victory_against_orochimaru_id = td_demo_content::add_post(array(
	'title' => 'Smirking his Way to Victory against Orochimaru',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_animation_id,),
));

$post_td_post_boruto_haircut_for_sasuke_id = td_demo_content::add_post(array(
	'title' => 'Boruto Haircut for Sasuke',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'tds_locker' => '11',
	'categories_id_array' => array($cat_animation_id,),
));

$post_td_post_action_shots_sasuke_vs_kinshiki_id = td_demo_content::add_post(array(
	'title' => 'Action Shots: Sasuke vs Kinshiki',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_animation_id,),
));

$post_td_post_chidori_vs_rasengan_throughout_the_ages_id = td_demo_content::add_post(array(
	'title' => 'Chidori vs Rasengan Throughout the Ages',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_promotional_art_id,),
));

$post_td_post_akatsuki_member_sasuke_uchiha_id = td_demo_content::add_post(array(
	'title' => 'Akatsuki Member Sasuke Uchiha',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_promotional_art_id,),
));

$post_td_post_how_kakashi_taught_sasuke_lightning_release_id = td_demo_content::add_post(array(
	'title' => 'How Kakashi Taught Sasuke Lightning Release',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_promotional_art_id,),
));

$post_td_post_a_relaxing_moment_in_childhood_id = td_demo_content::add_post(array(
	'title' => 'A Relaxing Moment in Childhood',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_promotional_art_id,),
));

$post_td_post_ninja_tools_and_their_impact_in_the_world_id = td_demo_content::add_post(array(
	'title' => 'Ninja Tools and their Impact in the World',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_promotional_art_id,),
));

$post_td_post_sasuke_and_itachis_relationship_as_brothers_id = td_demo_content::add_post(array(
	'title' => 'Sasuke and Itachi\'s Relationship as Brothers',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_manga_id,),
));

$post_td_post_report_card_analysis_grades_in_school_id = td_demo_content::add_post(array(
	'title' => 'Report Card Analysis: Grades in School',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_manga_id,),
));

$post_td_post_sasukes_swordsmanship_abilities_id = td_demo_content::add_post(array(
	'title' => 'Sasuke\'s Swordsmanship Abilities',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_manga_id,),
));

$post_td_post_the_cursed_seal_of_heaven_id = td_demo_content::add_post(array(
	'title' => 'The Cursed Seal of Heaven',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_manga_id,),
));

$post_td_post_summoning_battle_snake_vs_frog_id = td_demo_content::add_post(array(
	'title' => 'Summoning Battle: Snake vs Frog',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_manga_id,),
));

$post_td_post_suigetsu_and_karins_impact_on_sasuke_id = td_demo_content::add_post(array(
	'title' => 'Suigetsu and Karin\'s Impact on Sasuke',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_manga_id,),
));

$post_td_post_the_village_hidden_in_the_rain_id = td_demo_content::add_post(array(
	'title' => 'The Village Hidden in the Rain',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_manga_id,),
));

$post_td_post_introspective_analysis_of_sasuke_id = td_demo_content::add_post(array(
	'title' => 'Introspective Analysis of Sasuke',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_manga_id,),
));

$post_td_post_sasuke_style_traditional_japanese_outfits_id = td_demo_content::add_post(array(
	'title' => 'Sasuke Style: Traditional Japanese Outfits',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_manga_id,),
));

$post_td_post_genjutsu_abilities_from_itachi_and_sasuke_id = td_demo_content::add_post(array(
	'title' => 'Genjutsu Abilities from Itachi and Sasuke',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_manga_id,),
));

$post_td_post_smirking_sasuke_in_akatsuki_dual_nature_id = td_demo_content::add_post(array(
	'title' => 'Smirking Sasuke in Akatsuki Dual Nature',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_shippuden_id,),
));

$post_td_post_unlocking_the_mangekyo_sharingan_id = td_demo_content::add_post(array(
	'title' => 'Unlocking the Mangekyo Sharingan',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_shippuden_id,),
));

$post_td_post_sasuke_hairstyle_changes_through_shippuden_id = td_demo_content::add_post(array(
	'title' => 'Sasuke Hairstyle Changes through Shippuden',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_shippuden_id,),
));

$post_td_post_drop_in_on_the_five_kage_summit_id = td_demo_content::add_post(array(
	'title' => 'Drop in on the Five Kage Summit',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_shippuden_id,),
));

$post_td_post_getting_rid_of_the_cursed_seal_id = td_demo_content::add_post(array(
	'title' => 'Getting Rid of the Cursed Seal',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_shippuden_id,),
));

$post_td_post_succumbing_to_the_curse_of_hatred_id = td_demo_content::add_post(array(
	'title' => 'Succumbing to the Curse of Hatred',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_shippuden_id,),
));

$post_td_post_taka_and_joining_akatsuki_id = td_demo_content::add_post(array(
	'title' => 'Taka and Joining Akatsuki',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_shippuden_id,),
));

$post_td_post_sasuke_and_obito_plans_id = td_demo_content::add_post(array(
	'title' => 'Sasuke and Obito Plans',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_shippuden_id,),
));

$post_td_post_lightning_release_kirin_id = td_demo_content::add_post(array(
	'title' => 'Lightning Release: Kirin',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_shippuden_id,),
));

$post_td_post_why_sasuke_struggled_when_meeting_naruto_id = td_demo_content::add_post(array(
	'title' => 'Why Sasuke Struggled when Meeting Naruto',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_shippuden_id,),
));

$post_td_post_how_sasuke_developed_his_genjutsu_id = td_demo_content::add_post(array(
	'title' => 'How Sasuke Developed his Genjutsu',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_shippuden_id,),
));

$post_td_post_what_exactly_was_the_cursed_seal_id = td_demo_content::add_post(array(
	'title' => 'What Exactly was the Cursed Seal?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_shippuden_id,),
));

$post_td_post_a_battle_worthy_of_measure_id = td_demo_content::add_post(array(
	'title' => 'A Battle Worthy of Measure',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_shippuden_id,),
));

$post_td_post_why_itachi_wanted_sasuke_to_hate_him_id = td_demo_content::add_post(array(
	'title' => 'Why Itachi wanted Sasuke to Hate him',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_shippuden_id,),
));

$post_td_post_primary_outfit_for_shippuden_id = td_demo_content::add_post(array(
	'title' => 'Primary Outfit for Shippuden',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_shippuden_id,),
));

$post_td_post_shuriken_and_ninja_tools_sasuke_preferred_id = td_demo_content::add_post(array(
	'title' => 'Shuriken and Ninja Tools Sasuke Preferred',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_shippuden_id,),
));

$post_td_post_in_hiding_spying_on_the_enemy_id = td_demo_content::add_post(array(
	'title' => 'In Hiding: Spying on the Enemy',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_shippuden_id,),
));

$post_td_post_how_naruto_actually_saved_sasuke_id = td_demo_content::add_post(array(
	'title' => 'How Naruto actually Saved Sasuke',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_shippuden_id,),
));

$post_td_post_naruto_and_his_significance_to_sasuke_id = td_demo_content::add_post(array(
	'title' => 'Naruto and his Significance to Sasuke',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_childhood_teenage_years_id,),
));

$post_td_post_how_itachi_impacted_sasuke_early_on_id = td_demo_content::add_post(array(
	'title' => 'How Itachi impacted Sasuke early on',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_childhood_teenage_years_id,),
));

$post_td_post_playing_hide_and_seek_id = td_demo_content::add_post(array(
	'title' => 'Playing Hide and Seek',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_childhood_teenage_years_id,),
));

$post_td_post_are_you_hurt_scaredy_cat_id = td_demo_content::add_post(array(
	'title' => 'Are you hurt, scaredy-cat?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_childhood_teenage_years_id,),
));

$post_td_post_stubbornness_runs_in_the_uchiha_clan_id = td_demo_content::add_post(array(
	'title' => 'Stubbornness runs in the Uchiha clan',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_childhood_teenage_years_id,),
));

$post_td_post_the_lonely_life_of_child_sasuke_id = td_demo_content::add_post(array(
	'title' => 'The Lonely life of Child Sasuke',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_childhood_teenage_years_id,),
));

$post_td_post_forehead_poking_as_a_sign_of_affection_id = td_demo_content::add_post(array(
	'title' => 'Forehead Poking as a Sign of Affection',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_childhood_teenage_years_id,),
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
	'title' => 'Anime/Manga',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_anime_manga_id,
	'parent_id' => ''
), true);

$menu_item_2_id = td_demo_menus::add_category(array(
	'title' => 'Childhood - Teenage Years',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_childhood_teenage_years_id,
	'parent_id' => $menu_item_1_id
));

$menu_item_3_id = td_demo_menus::add_category(array(
	'title' => 'Shippuden',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_shippuden_id,
	'parent_id' => $menu_item_1_id
));

$menu_item_4_id = td_demo_menus::add_category(array(
	'title' => 'Manga',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_manga_id,
	'parent_id' => $menu_item_1_id
));

$menu_item_5_id = td_demo_menus::add_mega_menu(array(
	'title' => 'Promotional Art',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_promotional_art_id,
	'parent_id' => ''
), true);

$menu_item_6_id = td_demo_menus::add_mega_menu(array(
	'title' => 'Animation',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_animation_id,
	'parent_id' => ''
), true);


/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/
$template_search_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Lightning-Path - Search Template',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_id);


$template_date_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Lightning-Path - Date Template',
	'file' => 'date_cloud_template.txt',
	'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_id);


$template_404_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Lightning-Path - 404 Template',
	'file' => '404_cloud_template.txt',
	'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_id);


$template_author_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Lightning-Path - Author Template',
	'file' => 'author_cloud_template.txt',
	'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_id);


$template_tag_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Lightning-Path - Tag Template',
	'file' => 'tag_cloud_template.txt',
	'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_id);


$template_category_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Lightning-Path - Category Template',
	'file' => 'cat_cloud_template.txt',
	'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_id);


$template_single_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Lightning-Path - Single Template',
	'file' => 'post_cloud_template.txt',
	'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_id);


$template_footer_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Lightning-Path - Footer Template',
	'file' => 'footer_cloud_template.txt',
	'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_id);


$template_header_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Lightning-Path - Header Template',
	'file' => 'header_cloud_template.txt',
	'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_id);



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
