<?php



/*  ----------------------------------------------------------------------------
	SUBSCRIPTION - start phase 1
*/
if (is_plugin_active('td-subscription/td-subscription.php') ) {
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



$plan_yearly_plan_id = td_demo_subscription::add_plan( array(
	'name' => 'Yearly Plan',
	'price' => '100',
	'months_in_cycle' => '12',
	'trial_days' => '0',
	'is_free' => '0',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:17:"2561aa23b87bf4c63";}',
	)
);

$plan_monthly_plan_id = td_demo_subscription::add_plan( array(
	'name' => 'Monthly Plan',
	'price' => '10',
	'months_in_cycle' => '1',
	'trial_days' => '0',
	'is_free' => '0',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:16:"061aa23b87c04e56";}',
	)
);

$plan_free_plan_id = td_demo_subscription::add_plan( array(
	'name' => 'Free Plan',
	'price' => '',
	'months_in_cycle' => '',
	'trial_days' => '0',
	'is_free' => '1',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:16:"1561aa23b87c1dc1";}',
	)
);

$page_payment_page_id_id = td_demo_content::add_page(array(
	'title' => 'Checkout - rue_bailand',
	'file' => 'tds_checkout.txt',
));

td_demo_subscription::add_option( array(
	'name' => 'payment_page_id',
	'value' => $page_payment_page_id_id,
	)
);

$page_my_account_page_id_id = td_demo_content::add_page(array(
	'title' => 'My Account - rue_bailand',
	'file' => 'tds_my_account.txt',
));

td_demo_subscription::add_option( array(
	'name' => 'my_account_page_id',
	'value' => $page_my_account_page_id_id,
	)
);

$page_create_account_page_id_id = td_demo_content::add_page(array(
	'title' => 'Login/Register - rue_bailand',
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

}


/*  ----------------------------------------------------------------------------
	SUBSCRIPTION - end phase 1
*/

/*  ----------------------------------------------------------------------------
	CATEGORIES
*/
$cat_artsy_id = td_demo_category::add_category(array(
	'category_name' => 'Artsy',
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

$cat_basics_id = td_demo_category::add_category(array(
	'category_name' => 'Basics',
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

$cat_beauty_id = td_demo_category::add_category(array(
	'category_name' => 'Beauty',
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

$cat_clandestine_id = td_demo_category::add_category(array(
	'category_name' => 'Clandestine',
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

$cat_rhythm_id = td_demo_category::add_category(array(
	'category_name' => 'Rhythm',
	'parent_id' => $cat_fashion_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_savage_id = td_demo_category::add_category(array(
	'category_name' => 'Savage',
	'parent_id' => $cat_fashion_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_streetwear_id = td_demo_category::add_category(array(
	'category_name' => 'Streetwear',
	'parent_id' => $cat_fashion_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_throwbacks_id = td_demo_category::add_category(array(
	'category_name' => 'Throwbacks',
	'parent_id' => $cat_fashion_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_trending_id = td_demo_category::add_category(array(
	'category_name' => 'Trending',
	'parent_id' => $cat_fashion_id,
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
	PAGES
*/
$page_tds_switching_plans_wizard_id = td_demo_content::add_page(array(
	'title' => 'Switching plans wizard',
	'file' => 'tds_switching_plans_wizard.txt',
));

$page_homepage_id = td_demo_content::add_page(array(
	'title' => 'Homepage',
	'file' => 'homepage.txt',
	'homepage' => true,
));


/*  ----------------------------------------------------------------------------
	SUBSCRIPTION - start phase 2
*/
if (is_plugin_active('td-subscription/td-subscription.php') ) {


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
				'tds_message' => 'Read exclusive and up to date content on Rue Bailand by signing up for a subscription.',
				'tds_submit_btn_text' => 'Unlock & Read',
				'tds_pp_msg' => 'I consent to processing of my data according to <a href=\"#\">Terms of Use</a> & <a href=\"#\">Privacy Policy</a>',
			),
	'tds_payable' => 'paid_subscription',
	'tds_paid_subs_page_id' => $page_tds_switching_plans_wizard_id,
	'tds_paid_subs_plan_ids' => [$plan_yearly_plan_id,$plan_monthly_plan_id,$plan_free_plan_id],
	'tds_locker_slug' => 'tds_default_wizard_locker',
			'tds_locker_styles' => array(
				'tds_bg_color' => '#dad7e8',
				'tds_title_color' => '#30204c',
				'tds_message_color' => '#30204c',
				'tds_submit_btn_text_color' => '#30204c',
				'tds_submit_btn_text_color_h' => '#30204c',
				'tds_submit_btn_bg_color' => '#a7a5f7',
				'tds_submit_btn_bg_color_h' => '#a285c6',
				'tds_after_btn_text_color' => '#30204c',
				'tds_pp_checked_color' => '#ffffff',
				'tds_pp_check_bg' => '#623e89',
				'tds_pp_check_bg_f' => '#a7a5f7',
				'tds_pp_check_border_color' => '#623e89',
				'tds_pp_check_border_color_f' => '#a7a5f7',
				'tds_pp_msg_color' => '#9793a0',
				'tds_pp_msg_links_color' => '#a285c6',
				'tds_pp_msg_links_color_h' => '#a7a5f7',
				'tds_general_font_family' => '394',
				'tds_title_font_family' => '402',
				'tds_title_font_size' => '40',
				'tds_title_font_line_height' => '1.2',
				'tds_title_font_weight' => '400',
				'tds_message_font_family' => '394',
				'tds_message_font_size' => '16',
				'tds_message_font_line_height' => '1.4',
				'tds_message_font_weight' => '500',
				'tds_submit_btn_text_font_family' => '394',
				'tds_submit_btn_text_font_size' => '11',
				'tds_submit_btn_text_font_weight' => '700',
				'tds_submit_btn_text_font_transform' => 'uppercase',
				'tds_submit_btn_text_font_spacing' => '2',
				'tds_after_btn_text_font_family' => '394',
				'tds_pp_msg_font_family' => '394',
				'tds_pp_msg_font_size' => '11',
				'tds_pp_msg_font_line_height' => '1.2',
				'tds_pp_msg_font_weight' => '500',
				'tds_pp_msg_font_spacing' => '0.2',
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
			'tds_locker_settings' => array(
				'tds_title' => 'This Content Is Only For Subscribers',
				'tds_message' => 'Please subscribe to unlock this content. Enter your email to get access.',
				'tds_input_placeholder' => 'Please enter your email address.',
				'tds_submit_btn_text' => 'Subscribe to unlock',
				'tds_after_btn_text' => 'Your email address is 100% safe from spam!',
				'tds_pp_msg' => 'I consent to processing of my data according to <a href=\"#\">Terms of Use</a> & <a href=\"#\">Privacy Policy</a>',
			),
			'tds_locker_settings' => array(
				'tds_title' => 'This Content Is Only For Subscribers',
				'tds_message' => 'Please subscribe to unlock this content. Enter your email to get access.',
				'tds_input_placeholder' => 'Please enter your email address.',
				'tds_submit_btn_text' => 'Subscribe to unlock',
				'tds_after_btn_text' => 'Your email address is 100% safe from spam!',
				'tds_pp_msg' => 'I consent to processing of my data according to <a href=\"#\">Terms of Use</a> & <a href=\"#\">Privacy Policy</a>',
			),
			'tds_locker_settings' => array(
				'tds_title' => 'This Content Is Only For Subscribers',
				'tds_message' => 'Please subscribe to unlock this content. Enter your email to get access.',
				'tds_input_placeholder' => 'Please enter your email address.',
				'tds_submit_btn_text' => 'Subscribe to unlock',
				'tds_after_btn_text' => 'Your email address is 100% safe from spam!',
				'tds_pp_msg' => 'I consent to processing of my data according to <a href=\"#\">Terms of Use</a> & <a href=\"#\">Privacy Policy</a>',
			),
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

td_util::update_option('tds_demo_options', 'a:1:{s:5:"plans";a:3:{i:0;a:2:{s:9:"unique_id";s:17:"2561aa23b87bf4c63";s:4:"name";s:11:"Yearly Plan";}i:1;a:2:{s:9:"unique_id";s:16:"061aa23b87c04e56";s:4:"name";s:12:"Monthly Plan";}i:2;a:2:{s:9:"unique_id";s:16:"1561aa23b87c1dc1";s:4:"name";s:9:"Free Plan";}}}');

	}


/*  ----------------------------------------------------------------------------
	SUBSCRIPTION - end phase 2
*/

/*  ----------------------------------------------------------------------------
	POSTS
*/
$post_td_post_disconnect_from_reality_a_sense_of_ease_and_relaxation_id = td_demo_content::add_post(array(
	'title' => 'Disconnect from Reality: A Sense of Ease and Relaxation',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_clandestine_id,),
));

$post_td_post_prep_your_style_up_with_these_15_tips_and_tricks_id = td_demo_content::add_post(array(
	'title' => 'Prep Your Style Up with These 15 Tips and Tricks',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_clandestine_id,),
));

$post_td_post_soft_warm_colors_that_enhance_your_every_day_style_id = td_demo_content::add_post(array(
	'title' => 'Soft Warm Colors that Enhance Your Every Day Style',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_clandestine_id,),
));

$post_td_post_glitter_and_glam_for_your_night_out_we_are_into_it_id = td_demo_content::add_post(array(
	'title' => 'Glitter and Glam for Your Night Out? We Are Into it!',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_clandestine_id,),
));

$post_td_post_a_jog_in_the_park_at_in_your_own_leisure_wear_id = td_demo_content::add_post(array(
	'title' => 'A Jog in the Park at in Your Own Leisure Wear',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_clandestine_id,),
));

$post_td_post_watch_the_time_beautiful_craftsmanship_in_watches_id = td_demo_content::add_post(array(
	'title' => 'Watch the Time: Beautiful Craftsmanship in Watches',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_basics_id,),
));

$post_td_post_how_to_match_earrings_rings_necklaces_when_going_out_id = td_demo_content::add_post(array(
	'title' => 'How to Match Earrings, Rings, Necklaces When Going Out',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_basics_id,),
));

$post_td_post_classy_yet_understated_become_the_girl_boss_id = td_demo_content::add_post(array(
	'title' => 'Classy Yet Understated: Become the Girl Boss',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_basics_id,),
));

$post_td_post_punk_rock_chic_we_got_you_with_these_10_outfits_id = td_demo_content::add_post(array(
	'title' => 'Punk Rock Chic? We Got You with These 10 Outfits',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_basics_id,),
));

$post_td_post_an_assortment_of_perfumes_for_every_day_living_id = td_demo_content::add_post(array(
	'title' => 'An Assortment of Perfumes For Every Day Living',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_basics_id,),
));

$post_td_post_soft_lookbook_that_lets_out_your_inner_girly_girl_id = td_demo_content::add_post(array(
	'title' => 'Soft LookBook that Lets Out Your Inner Girly Girl',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_basics_id,),
));

$post_td_post_become_the_change_you_want_to_see_in_the_world_id = td_demo_content::add_post(array(
	'title' => 'Become the Change You Want To See in the World',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_basics_id,),
));

$post_td_post_wedding_jewellery_that_makes_you_stand_out_id = td_demo_content::add_post(array(
	'title' => 'Wedding Jewellery that Makes You Stand Out',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_basics_id,),
));

$post_td_post_summer_outlook_reflected_in_your_own_style_id = td_demo_content::add_post(array(
	'title' => 'Summer Outlook Reflected in Your Own Style',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_basics_id,),
));

$post_td_post_berrets_and_high_heels_a_combination_for_eternity_id = td_demo_content::add_post(array(
	'title' => 'Berrets and High Heels a Combination For Eternity',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_basics_id,),
));

$post_td_post_low_light_neon_settings_for_best_midnight_photos_id = td_demo_content::add_post(array(
	'title' => 'Low Light Neon Settings for Best Midnight Photos',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_artsy_id,),
));

$post_td_post_tear_down_the_walls_and_become_your_own_villain_id = td_demo_content::add_post(array(
	'title' => 'Tear Down the Walls and Become your Own Villain',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_artsy_id,),
));

$post_td_post_create_a_perfect_outfit_to_feel_chic_and_comfortable_id = td_demo_content::add_post(array(
	'title' => 'Create a Perfect Outfit to Feel Chic and Comfortable',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_artsy_id,),
));

$post_td_post_getting_lost_in_paris_on_day_one_achievement_unlocked_id = td_demo_content::add_post(array(
	'title' => 'Getting Lost in Paris on Day One? Achievement Unlocked',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_artsy_id,),
));

$post_td_post_playing_with_silhouettes_for_the_perfect_shot_id = td_demo_content::add_post(array(
	'title' => 'Playing with Silhouettes for the Perfect Shot',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_artsy_id,),
));

$post_td_post_simple_and_effective_makeup_tips_for_any_weather_id = td_demo_content::add_post(array(
	'title' => 'Simple and Effective Makeup Tips for Any Weather',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_beauty_id,),
));

$post_td_post_this_innocent_makeup_guide_is_to_die_for_id = td_demo_content::add_post(array(
	'title' => 'This Innocent Makeup Guide is to Die For!',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_beauty_id,),
));

$post_td_post_water_resistant_say_no_more_we_got_you_id = td_demo_content::add_post(array(
	'title' => 'Water Resistant? Say No More! We Got You',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_beauty_id,),
));

$post_td_post_glam_rock_night_in_we_agree_lets_take_a_look_id = td_demo_content::add_post(array(
	'title' => 'Glam Rock Night In? We Agree, Let\'s Take a Look',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_beauty_id,),
));

$post_td_post_the_trick_to_becoming_a_super_star_in_makeup_id = td_demo_content::add_post(array(
	'title' => 'The Trick to Becoming a Super Star in Makeup',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_beauty_id,),
));

$post_td_post_anne_marie_tells_us_how_to_accessorize_in_style_id = td_demo_content::add_post(array(
	'title' => 'Anne Marie Tells us How to Accessorize in Style',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_savage_id,),
));

$post_td_post_avoid_the_deep_end_of_the_shallow_pool_of_life_id = td_demo_content::add_post(array(
	'title' => 'Avoid the Deep End of the Shallow Pool of Life',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_savage_id,),
));

$post_td_post_breaking_the_rules_in_style_101_tips_and_tricks_id = td_demo_content::add_post(array(
	'title' => 'Breaking the Rules in Style 101 Tips and Tricks',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_savage_id,),
));

$post_td_post_create_dimension_and_enhance_your_waist_with_crop_tops_id = td_demo_content::add_post(array(
	'title' => 'Create Dimension and Enhance your Waist with Crop Tops',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_savage_id,),
));

$post_td_post_get_the_look_straight_from_our_favorite_star_id = td_demo_content::add_post(array(
	'title' => 'Get the Look: Straight from Our Favorite Star',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_savage_id,),
));

$post_td_post_create_the_sensation_out_on_the_street_everyday_id = td_demo_content::add_post(array(
	'title' => 'Create the Sensation Out on the Street Everyday',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_rhythm_id,),
));

$post_td_post_a_post_apocalyptic_fashion_inspiration_album_id = td_demo_content::add_post(array(
	'title' => 'A Post-Apocalyptic Fashion Inspiration Album',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_rhythm_id,),
));

$post_td_post_become_one_with_nature_sign_me_up_right_now_id = td_demo_content::add_post(array(
	'title' => 'Become One With Nature? Sign Me Up Right Now',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_rhythm_id,),
));

$post_td_post_midnight_runaway_exploration_guide_hip_trendy_id = td_demo_content::add_post(array(
	'title' => 'Midnight Runaway Exploration Guide: Hip & Trendy',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_rhythm_id,),
));

$post_td_post_flowy_sleeves_grab_my_attention_all_the_time_id = td_demo_content::add_post(array(
	'title' => 'Flowy Sleeves, Grab My Attention All the Time',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_rhythm_id,),
));

$post_td_post_girl_next_door_upgrade_get_sassy_and_pretty_id = td_demo_content::add_post(array(
	'title' => 'Girl-Next-Door Upgrade: Get Sassy and Pretty',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_throwbacks_id,),
));

$post_td_post_become_the_baroness_youve_always_dreamed_of_id = td_demo_content::add_post(array(
	'title' => 'Become the Baroness You\'ve Always Dreamed Of',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_throwbacks_id,),
));

$post_td_post_10_reasons_why_we_love_this_look_throwback_id = td_demo_content::add_post(array(
	'title' => '10 Reasons Why We Love This Look Throwback',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_throwbacks_id,),
));

$post_td_post_ice_queen_elsa_a_tried_and_true_method_id = td_demo_content::add_post(array(
	'title' => 'Ice Queen Elsa - A Tried and True Method',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_throwbacks_id,),
));

$post_td_post_hooded_jackets_loose_pants_lets_go_90s_id = td_demo_content::add_post(array(
	'title' => 'Hooded Jackets & Loose Pants - Let\'s Go 90s!',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_throwbacks_id,),
));

$post_td_post_rocking_different_crop_tops_throughout_every_season_id = td_demo_content::add_post(array(
	'title' => 'Rocking Different Crop Tops Throughout Every Season',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_streetwear_id,),
));

$post_td_post_all_leather_all_right_matching_the_textures_id = td_demo_content::add_post(array(
	'title' => 'All Leather? All Right! Matching the Textures',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_streetwear_id,),
));

$post_td_post_aggressive_outlook_on_life_aggressive_style_id = td_demo_content::add_post(array(
	'title' => 'Aggressive Outlook on Life: Aggressive Style',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_streetwear_id,),
));

$post_td_post_pair_a_bomber_jacket_with_any_type_of_silhouette_id = td_demo_content::add_post(array(
	'title' => 'Pair a Bomber Jacket with Any Type of Silhouette',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_streetwear_id,),
));

$post_td_post_chains_denim_the_one_true_match_forever_id = td_demo_content::add_post(array(
	'title' => 'Chains & Denim the One True Match Forever',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_streetwear_id,),
));

$post_td_post_farmyard_looks_are_in_take_your_pick_id = td_demo_content::add_post(array(
	'title' => 'Farmyard Looks Are IN - Take Your Pick',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_trending_id,),
));

$post_td_post_an_all_day_wear_tear_outfit_to_withstand_id = td_demo_content::add_post(array(
	'title' => 'An All-Day Wear & Tear Outfit to Withstand',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_trending_id,),
));

$post_td_post_loose_fittings_for_extreme_seasonal_comfort_id = td_demo_content::add_post(array(
	'title' => 'Loose Fittings for Extreme Seasonal Comfort',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_trending_id,),
));

$post_td_post_creative_outlets_for_impressive_thinking_id = td_demo_content::add_post(array(
	'title' => 'Creative Outlets for Impressive Thinking',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_trending_id,),
));

$post_td_post_the_a_to_z_guide_for_fashion_trends_in_2021_id = td_demo_content::add_post(array(
	'title' => 'The A-to-Z guide for Fashion Trends in 2021',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_trending_id,),
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
	'title' => 'Fashion',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_fashion_id,
	'parent_id' => ''
), true);

$menu_item_2_id = td_demo_menus::add_mega_menu(array(
	'title' => 'Artsy',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_artsy_id,
	'parent_id' => ''
), true);

$menu_item_3_id = td_demo_menus::add_category(array(
	'title' => 'Basics',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_basics_id,
	'parent_id' => ''
));

$menu_item_4_id = td_demo_menus::add_category(array(
	'title' => 'Artsy',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_artsy_id,
	'parent_id' => $menu_item_3_id
));

$menu_item_5_id = td_demo_menus::add_category(array(
	'title' => 'Clandestine',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_clandestine_id,
	'parent_id' => $menu_item_3_id
));

$menu_item_6_id = td_demo_menus::add_category(array(
	'title' => 'Beauty',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_beauty_id,
	'parent_id' => $menu_item_3_id
));

$menu_item_7_id = td_demo_menus::add_mega_menu(array(
	'title' => 'Beauty',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_beauty_id,
	'parent_id' => ''
), true);

$menu_item_8_id = td_demo_menus::add_mega_menu(array(
	'title' => 'Clandestine',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_clandestine_id,
	'parent_id' => ''
), true);


/*  ----------------------------------------------------------------------------
	CLOUD TEMPLATES
*/
$template_search_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Rue Bailand - Search Template',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_id);


$template_author_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Rue Bailand - Author Template',
	'file' => 'author_cloud_template.txt',
	'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_id);


$template_404_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Rue Bailand - 404 Template',
	'file' => '404_cloud_template.txt',
	'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_id);


$template_date_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Rue Bailand - Date Template',
	'file' => 'date_cloud_template.txt',
	'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_id);


$template_tag_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Rue Bailand - Tag Template',
	'file' => 'tag_cloud_template.txt',
	'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_id);


$template_category_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Rue Bailand - Category Template',
	'file' => 'cat_cloud_template.txt',
	'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_id);


$template_single_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Rue Bailand - Single Template',
	'file' => 'post_cloud_template.txt',
	'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_id);


$template_footer_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Rue Bailand - Footer Template',
	'file' => 'footer_cloud_template.txt',
	'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_id);


$template_header_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Rue Bailand - Header Template',
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
