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
        'price' => '10',
        'months_in_cycle' => '1',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"6661e583e5d4305";}',
    )
);

$plan_yearly_plan_id = td_demo_subscription::add_plan( array(
        'name' => 'Yearly Plan',
        'price' => '100',
        'months_in_cycle' => '12',
        'trial_days' => '0',
        'is_free' => '0',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"9561e583e5d43ac";}',
    )
);

$plan_free_plan_id = td_demo_subscription::add_plan( array(
        'name' => 'Free Plan',
        'price' => '',
        'months_in_cycle' => '',
        'trial_days' => '0',
        'is_free' => '1',
        'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"8461e583e5d4422";}',
    )
);

$page_payment_page_id_id = td_demo_content::add_page(array(
    'title' => 'Checkout - revenant',
    'file' => 'tds_checkout.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'payment_page_id',
        'value' => $page_payment_page_id_id,
    )
);

$page_my_account_page_id_id = td_demo_content::add_page(array(
    'title' => 'My Account - revenant',
    'file' => 'tds_my_account.txt',
));

td_demo_subscription::add_option( array(
        'name' => 'my_account_page_id',
        'value' => $page_my_account_page_id_id,
    )
);

$page_create_account_page_id_id = td_demo_content::add_page(array(
    'title' => 'Login/Register - revenant',
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

$cat_classes_id = td_demo_category::add_category(array(
    'category_name' => 'Classes',
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

$cat_arts_id = td_demo_category::add_category(array(
	'category_name' => 'Arts',
	'parent_id' => $cat_classes_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_business_id = td_demo_category::add_category(array(
	'category_name' => 'Business',
	'parent_id' => $cat_classes_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_coming_soon_id = td_demo_category::add_category(array(
	'category_name' => 'Coming Soon',
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

$cat_entertainment_id = td_demo_category::add_category(array(
	'category_name' => 'Entertainment',
	'parent_id' => $cat_classes_id,
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
	'parent_id' => $cat_classes_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_marketing_id = td_demo_category::add_category(array(
	'category_name' => 'Marketing',
	'parent_id' => $cat_classes_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_sports_id = td_demo_category::add_category(array(
	'category_name' => 'Sports',
	'parent_id' => $cat_classes_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_writing_id = td_demo_category::add_category(array(
	'category_name' => 'Writing',
	'parent_id' => $cat_classes_id,
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
    'title' => 'Revenant - Switching plans wizard',
    'file' => 'tds_switching_plans_wizard.txt',
    'demo_unique_id' => '2461e583e618d5d',
));

$page_thank_you_id = td_demo_content::add_page(array(
    'title' => 'Thank you',
    'file' => 'thank_you.txt',
    'demo_unique_id' => '4361e583e619b51',
));

$page_homepage_id = td_demo_content::add_page(array(
    'title' => 'Homepage',
    'file' => 'homepage.txt',
    'homepage' => true,
    'demo_unique_id' => '2661e583e61a3a9',
));


/*  ---------------------------------------------------------------------------- 
	SUBSCRIPTION - start phase 2
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
        'title' => 'Revenant - Wizard Locker (default)',
        'file' => '',
        'categories_id_array' => [],
        'tds_locker_settings' => array(
            'tds_title' => 'This Content Is Only For Subscribers',
            'tds_message' => 'Please subscribe to unlock this content. Enter your email to get access.',
            'tds_submit_btn_text' => 'Subscribe to unlock',
            'tds_after_btn_text' => 'Your email address is 100% safe from spam!',
            'tds_pp_msg' => 'I consent to processing of my data according to <a href=\"#\">Terms of Use</a> & <a href=\"#\">Privacy Policy</a>.',
            'tds_locker_cf_1_name' => 'Custom field 1',
            'tds_locker_cf_2_name' => 'Custom field 2',
            'tds_locker_cf_3_name' => 'Custom field 3',
        ),
        'tds_payable' => 'paid_subscription',
        'tds_paid_subs_page_id' => $page_tds_switching_plans_wizard_id,
        'tds_paid_subs_plan_ids' => [$plan_monthly_plan_id,$plan_yearly_plan_id,$plan_free_plan_id],
        'tds_locker_styles' => array(
            'tds_bg_color' => '#000000',
            'all_tds_border' => '1px',
            'all_tds_border_color' => '#ffffff',
            'tds_title_color' => '#9e9e9e',
            'tds_message_color' => '#ffffff',
            'tds_submit_btn_text_color' => '#ffffff',
            'tds_submit_btn_text_color_h' => '#ffffff',
            'tds_submit_btn_bg_color' => '#d2366d',
            'tds_submit_btn_bg_color_h' => '#f45391',
            'tds_after_btn_text_color' => '#9e9e9e',
            'tds_pp_checked_color' => '#000000',
            'tds_pp_check_bg' => '#d2366d',
            'tds_pp_check_bg_f' => '#f45391',
            'tds_pp_check_border_color' => '#d2366d',
            'tds_pp_check_border_color_f' => '#f45391',
            'tds_pp_msg_color' => '#ffffff',
            'tds_pp_msg_links_color' => '#d2366d',
            'tds_pp_msg_links_color_h' => '#f45391',
            'tds_general_font_family' => '702',
            'tds_title_font_family' => '445',
            'tds_title_font_size' => '50',
            'tds_title_font_line_height' => '1',
            'tds_title_font_weight' => '500',
            'tds_title_font_transform' => 'uppercase',
            'tds_title_font_spacing' => '0.5',
            'tds_message_font_family' => '702',
            'tds_message_font_size' => '18',
            'tds_message_font_line_height' => '1.8',
            'tds_message_font_weight' => '500',
            'tds_submit_btn_text_font_family' => '702',
            'tds_submit_btn_text_font_size' => '16',
            'tds_submit_btn_text_font_line_height' => '1.4',
            'tds_submit_btn_text_font_weight' => '400',
            'tds_submit_btn_text_font_spacing' => '0.5',
            'tds_after_btn_text_font_family' => '702',
            'tds_after_btn_text_font_size' => '16',
            'tds_after_btn_text_font_line_height' => '1.4',
            'tds_after_btn_text_font_weight' => '500',
            'tds_after_btn_text_font_spacing' => '0.5',
            'tds_pp_msg_font_family' => '702',
            'tds_pp_msg_font_size' => '12',
            'tds_pp_msg_font_line_height' => '1.4',
            'tds_pp_msg_font_weight' => '600',
            'tds_pp_msg_font_spacing' => '0.8',
        ),
    )
);

// add locker
$post_newspaper_revenant_locker_id = td_demo_content::add_post( array(
        'post_type' => 'tds_locker',
        'title' => 'Newspaper Revenant Locker',
        'file' => 'post_default.txt',
        'categories_id_array' => [],
        'tds_locker_settings' => array(
            'tds_title' => 'Get Access to Online Classes',
            'tds_message' => 'To unlock this content, please input your email address in the bar below. ',
            'tds_input_placeholder' => 'Email Address',
            'tds_submit_btn_text' => 'Subscribe',
            'tds_after_btn_text' => 'You\'ll instantaneously get access to online classes after subscription.',
            'tds_pp_msg' => 'I consent to processing of my data according to <a href=\"#\">Terms of Use</a> and the <a href=\"#\">Privacy Policy</a>.',
        ),
        'tds_locker_styles' => array(
            'tds_bg_color' => '#000000',
            'all_tds_border' => '1px',
            'all_tds_border_color' => '#ffffff',
            'tds_title_color' => '#9e9e9e',
            'tds_message_color' => '#ffffff',
            'tds_input_color' => '#9e9e9e',
            'tds_input_color_f' => '#ffffff',
            'tds_input_bg_color' => '#262626',
            'tds_input_border_color' => '#262626',
            'tds_submit_btn_text_color' => '#ffffff',
            'tds_submit_btn_text_color_h' => '#ffffff',
            'tds_submit_btn_bg_color' => '#d2366d',
            'tds_submit_btn_bg_color_h' => '#f45391',
            'tds_after_btn_text_color' => '#9e9e9e',
            'tds_pp_msg_color' => '#ffffff',
            'tds_pp_msg_links_color' => '#d2366d',
            'tds_pp_msg_links_color_h' => '#f45391',
            'tds_general_font_family' => '702',
            'tds_title_font_family' => '445',
            'tds_title_font_size' => '50',
            'tds_title_font_line_height' => '1',
            'tds_title_font_weight' => '500',
            'tds_title_font_transform' => 'uppercase',
            'tds_title_font_spacing' => '0.5',
            'tds_message_font_family' => '702',
            'tds_message_font_size' => '18',
            'tds_message_font_line_height' => '1.6',
            'tds_message_font_weight' => '500',
            'tds_input_font_family' => '702',
            'tds_input_font_size' => '16',
            'tds_input_font_line_height' => '1.4',
            'tds_input_font_weight' => '400',
            'tds_input_font_spacing' => '0.5',
            'tds_submit_btn_text_font_family' => '702',
            'tds_submit_btn_text_font_size' => '16',
            'tds_submit_btn_text_font_line_height' => '1.4',
            'tds_submit_btn_text_font_weight' => '400',
            'tds_submit_btn_text_font_spacing' => '0.5',
            'tds_after_btn_text_font_family' => '702',
            'tds_after_btn_text_font_size' => '16',
            'tds_after_btn_text_font_line_height' => '1.4',
            'tds_after_btn_text_font_weight' => '500',
            'tds_after_btn_text_font_spacing' => '0.5',
            'tds_pp_msg_font_family' => '702',
            'tds_pp_msg_font_size' => '12',
            'tds_pp_msg_font_line_height' => '1.6',
            'tds_pp_msg_font_weight' => '600',
            'tds_pp_msg_font_spacing' => '0.8',
        ),
    )
);

// add post meta for default locker
td_demo_content::add_locker_meta( array(
        'tds_locker_id' => (int) get_option( 'tds_default_locker_id' ),
        'tds_locker_meta' => array(
            'tds_locker_settings' => array(
                'tds_title' => 'Get Access to Online Classes',
                'tds_message' => 'To unlock this content, please input your email address in the bar below. ',
                'tds_input_placeholder' => 'Email Address',
                'tds_submit_btn_text' => 'Subscribe',
                'tds_after_btn_text' => 'You\'ll instantaneously get access to online classes after subscription.',
                'tds_pp_msg' => 'I consent to processing of my data according to <a href=\"#\">Terms of Use</a> and the <a href=\"#\">Privacy Policy</a>.',
            ),
            'tds_locker_styles' => array(
                'tds_bg_color' => '#000000',
                'all_tds_border' => '1px',
                'all_tds_border_color' => '#ffffff',
                'tds_title_color' => '#9e9e9e',
                'tds_message_color' => '#ffffff',
                'tds_input_color' => '#9e9e9e',
                'tds_input_color_f' => '#ffffff',
                'tds_input_bg_color' => '#262626',
                'tds_input_border_color' => '#262626',
                'tds_submit_btn_text_color' => '#ffffff',
                'tds_submit_btn_text_color_h' => '#ffffff',
                'tds_submit_btn_bg_color' => '#d2366d',
                'tds_submit_btn_bg_color_h' => '#f45391',
                'tds_after_btn_text_color' => '#9e9e9e',
                'tds_pp_checked_color' => '#d2366d',
                'tds_pp_check_bg' => '#000000',
                'tds_pp_check_bg_f' => '#000000',
                'tds_pp_check_border_color' => '#d2366d',
                'tds_pp_check_border_color_f' => '#d2366d',
                'tds_pp_msg_color' => '#ffffff',
                'tds_pp_msg_links_color' => '#d2366d',
                'tds_pp_msg_links_color_h' => '#f45391',
                'tds_general_font_family' => '702',
                'tds_title_font_family' => '445',
                'tds_title_font_size' => '50',
                'tds_title_font_line_height' => '1',
                'tds_title_font_weight' => '500',
                'tds_title_font_spacing' => '0.5',
                'tds_message_font_family' => '702',
                'tds_message_font_size' => '18',
                'tds_message_font_line_height' => '1.6',
                'tds_message_font_weight' => '500',
                'tds_input_font_family' => '702',
                'tds_input_font_size' => '16',
                'tds_input_font_line_height' => '1.4',
                'tds_input_font_weight' => '400',
                'tds_input_font_spacing' => '0.5',
                'tds_submit_btn_text_font_family' => '702',
                'tds_submit_btn_text_font_size' => '16',
                'tds_submit_btn_text_font_line_height' => '1.4',
                'tds_submit_btn_text_font_weight' => '400',
                'tds_submit_btn_text_font_spacing' => '0.5',
                'tds_after_btn_text_font_family' => '702',
                'tds_after_btn_text_font_size' => '16',
                'tds_after_btn_text_font_line_height' => '1.4',
                'tds_after_btn_text_font_weight' => '500',
                'tds_after_btn_text_font_spacing' => '0.5',
                'tds_pp_msg_font_family' => '702',
                'tds_pp_msg_font_size' => '12',
                'tds_pp_msg_font_line_height' => '1.6',
                'tds_pp_msg_font_weight' => '600',
                'tds_pp_msg_font_spacing' => '0.8',
            ),
        )
    )
);

td_util::update_option('tds_demo_options', 'a:1:{s:5:"plans";a:3:{i:0;a:2:{s:9:"unique_id";s:15:"6661e583e5d4305";s:4:"name";s:12:"Monthly Plan";}i:1;a:2:{s:9:"unique_id";s:15:"9561e583e5d43ac";s:4:"name";s:11:"Yearly Plan";}i:2;a:2:{s:9:"unique_id";s:15:"8461e583e5d4422";s:4:"name";s:9:"Free Plan";}}}');


/*  ---------------------------------------------------------------------------- 
	SUBSCRIPTION - end phase 2
*/

/*  ---------------------------------------------------------------------------- 
	POSTS
*/
$post_td_post_amelie_taylor_progresses_on_creating_the_perfect_online_forum_id = td_demo_content::add_post(array(
	'title' => 'Amelie Taylor Progresses on Creating the Perfect Online Forum',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_coming_soon_id,),
));

$post_td_post_kelly_handley_hands_out_insights_into_the_northen_lights_phenomenon_id = td_demo_content::add_post(array(
	'title' => 'Kelly Handley Hands Out Insights into the Northen Lights Phenomenon',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_coming_soon_id,),
));

$post_td_post_erica_morison_online_shopping_assistants_can_create_the_perfect_look_id = td_demo_content::add_post(array(
	'title' => 'Erica Morison: Online Shopping Assistants Can Create the Perfect Look',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_coming_soon_id,),
));

$post_td_post_chad_higgins_shares_how_to_create_the_perfect_company_name_id = td_demo_content::add_post(array(
	'title' => 'Chad Higgins Shares How to Create the Perfect Company Name',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_coming_soon_id,),
));

$post_td_post_abigail_reeves_gives_an_intro_to_seo_analysis_and_creating_eye_catching_ads_id = td_demo_content::add_post(array(
	'title' => 'Abigail Reeves Gives an Intro to SEO Analysis and Creating Eye-Catching Ads',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_coming_soon_id,),
));

$post_td_post_chantel_deacon_lays_it_all_out_for_any_aspiring_influencers_id = td_demo_content::add_post(array(
	'title' => 'Chantel Deacon Lays it All Out for any Aspiring Influencers',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_coming_soon_id,),
));

$post_td_post_esme_mcgill_introductory_class_to_gardening_and_plant_life_id = td_demo_content::add_post(array(
	'title' => 'Esme McGill - Introductory Class to Gardening and Plant Life',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_coming_soon_id,),
));

$post_td_post_rick_patrickson_teaches_how_to_maintain_and_build_a_start_up_id = td_demo_content::add_post(array(
	'title' => 'Rick Patrickson Teaches How to Maintain and Build a Start-Up',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_coming_soon_id,),
));

$post_td_post_kathy_moore_explains_how_music_can_impact_your_overall_state_of_mind_id = td_demo_content::add_post(array(
	'title' => 'Kathy Moore Explains How Music Can Impact your Overall State of Mind',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_coming_soon_id,),
));

$post_td_post_tiffany_canmoore_gives_advice_on_finding_the_perfect_pet_for_you_id = td_demo_content::add_post(array(
	'title' => 'Tiffany Canmoore Gives Advice on Finding The Perfect Pet for You',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_coming_soon_id,),
));

$post_td_post_joseph_watson_explains_how_his_life_improved_from_becoming_an_e_sports_legend_id = td_demo_content::add_post(array(
	'title' => 'Joseph Watson - How His Life Improved from Becoming an E-Sports Legend',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_gaming_id,),
));

$post_td_post_alicia_joseph_talks_about_completing_optional_objectives_and_difficulty_levels_id = td_demo_content::add_post(array(
	'title' => 'Alicia Joseph Talks About Completing Optional Objectives and Difficulty Levels',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_gaming_id,),
));

$post_td_post_justin_york_how_to_deal_with_unsportsmanlike_conduct_while_playing_online_id = td_demo_content::add_post(array(
	'title' => 'Justin York - How to Deal with Unsportsmanlike Conduct While Playing Online',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_gaming_id,),
));

$post_td_post_jensen_bruce_gives_speedrunning_tips_for_any_singleplayer_video_game_id = td_demo_content::add_post(array(
	'title' => 'Jensen Bruce Gives Speedrunning Tips For any Singleplayer Video Game',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_gaming_id,),
));

$post_td_post_mathilda_eric_the_famous_e_sports_gamer_enthusiast_teaches_tactics_id = td_demo_content::add_post(array(
	'title' => 'Mathilda Eric - the Famous E-Sports Gamer Enthusiast Teaches Tactics',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_gaming_id,),
));

$post_td_post_andrea_mark_explains_her_daily_routine_to_building_muscle_id = td_demo_content::add_post(array(
	'title' => 'Andrea Mark Explains Her Daily Routine to Building Muscle',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_sports_id,),
));

$post_td_post_nolen_tudor_how_he_keeps_fit_while_over_the_age_of_65_id = td_demo_content::add_post(array(
	'title' => 'Nolen Tudor: How He Keeps Fit While Over the Age of 65',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_sports_id,),
));

$post_td_post_lilac_portson_intro_to_keeping_in_shape_and_losing_weight_id = td_demo_content::add_post(array(
	'title' => 'Lilac Portson - Intro to Keeping in Shape and Losing Weight',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_sports_id,),
));

$post_td_post_adrien_cunning_gives_breathing_tips_for_any_outdoor_activity_id = td_demo_content::add_post(array(
	'title' => 'Adrien Cunning Gives Breathing Tips for Any Outdoor Activity',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_sports_id,),
));

$post_td_post_kyle_gameson_jogs_to_the_finish_to_facilitate_online_learning_id = td_demo_content::add_post(array(
	'title' => 'Kyle Gameson Jogs to the Finish to Facilitate Online Learning',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_sports_id,),
));

$post_td_post_emma_robertson_creates_a_specific_online_buyers_persona_id = td_demo_content::add_post(array(
	'title' => 'Emma Robertson Creates a Specific Online Buyers\' Persona',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_marketing_id,),
));

$post_td_post_robert_helmar_intro_to_marketing_basics_and_books_to_start_with_id = td_demo_content::add_post(array(
	'title' => 'Robert Helmar: Intro to Marketing, Basics and Books to Start with',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_marketing_id,),
));

$post_td_post_milla_windsor_teaches_everyone_to_create_a_community_that_is_engaging_id = td_demo_content::add_post(array(
	'title' => 'Milla Windsor Teaches Everyone to Create a Community that is Engaging',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_marketing_id,),
));

$post_td_post_aeddan_alpin_shows_how_influencial_social_media_is_to_any_businesses_id = td_demo_content::add_post(array(
	'title' => 'Aeddan Alpin Shows How Influencial Social Media is to Any Businesses',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_marketing_id,),
));

$post_td_post_patrick_williams_advantages_and_disadvantages_to_any_seo_plan_id = td_demo_content::add_post(array(
	'title' => 'Patrick Williams: Advantages and Disadvantages to Any SEO Plan',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_marketing_id,),
));

$post_td_post_adel_lancaster_explains_how_to_cope_with_increased_public_appearances_id = td_demo_content::add_post(array(
	'title' => 'Adel Lancaster Explains How to Cope with Increased Public Appearances',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_business_id,),
));

$post_td_post_casey_web_and_the_in_depth_talk_of_managing_corporations_of_every_scale_id = td_demo_content::add_post(array(
	'title' => 'Casey Web and the In-Depth Talk of Managing Corporations of Every Scale',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_business_id,),
));

$post_td_post_alessa_torres_gives_investment_tips_to_jumpstart_any_business_id = td_demo_content::add_post(array(
	'title' => 'Alessa Torres Gives Investment Tips to Jumpstart any Business',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_business_id,),
));

$post_td_post_jaz_wells_and_how_he_managed_to_found_a_brilliant_corporation_in_2020_id = td_demo_content::add_post(array(
	'title' => 'Jaz Wells and How he Managed to Found a Brilliant Corporation in 2020',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_business_id,),
));

$post_td_post_normand_brewer_intro_to_successful_public_speaking_for_company_ceos_id = td_demo_content::add_post(array(
	'title' => 'Normand Brewer - Intro to Successful Public Speaking for Company CEOs',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_business_id,),
));

$post_td_post_peran_lyons_how_to_take_a_concept_and_bring_it_to_life_in_writing_id = td_demo_content::add_post(array(
	'title' => 'Peran Lyons: How to Take a Concept and Bring it to Life in Writing',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_writing_id,),
));

$post_td_post_sharla_wilson_intro_to_critical_analysis_of_poetry_and_poems_id = td_demo_content::add_post(array(
	'title' => 'Sharla Wilson - Intro to Critical Analysis of Poetry and Poems',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_writing_id,),
));

$post_td_post_freida_russell_analyzes_what_it_takes_to_create_a_good_novel_id = td_demo_content::add_post(array(
	'title' => 'Freida Russell Analyzes What it Takes to Create a Good Novel',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_writing_id,),
));

$post_td_post_matilde_bennett_shows_how_beneficial_it_is_to_get_inspired_from_daily_life_id = td_demo_content::add_post(array(
	'title' => 'Matilde Bennett Shows How Beneficial it is to Get Inspired from Daily Life',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_writing_id,),
));

$post_td_post_alicia_alvarez_takes_a_dive_into_her_thought_process_when_writing_id = td_demo_content::add_post(array(
	'title' => 'Alicia Alvarez Takes a Dive into Her Thought Process When Writing',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_writing_id,),
));

$post_td_post_rosa_ward_explains_how_to_grow_and_make_into_the_stand_up_community_id = td_demo_content::add_post(array(
	'title' => 'Rosa Ward Explains How to Grow and Make into the Stand-Up Community',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_entertainment_id,),
));

$post_td_post_mimi_reed_gives_a_helping_hand_with_fashion_advice_and_tips_id = td_demo_content::add_post(array(
	'title' => 'Mimi Reed Gives a Helping Hand with Fashion Advice and Tips',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_entertainment_id,),
));

$post_td_post_phoebe_peters_and_the_art_of_mastering_the_perfect_selfie_id = td_demo_content::add_post(array(
	'title' => 'Phoebe Peters and the Art of Mastering the Perfect Selfie',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_entertainment_id,),
));

$post_td_post_helen_lamonta_how_to_succeed_when_going_on_a_karaoke_night_id = td_demo_content::add_post(array(
	'title' => 'Helen Lamonta: How to Succeed When Going On a Karaoke Night',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_entertainment_id,),
));

$post_td_post_roxanne_khelini_surfs_up_surfing_one_on_one_tips_tricks_id = td_demo_content::add_post(array(
	'title' => 'Roxanne Khelini - Surf\'s Up, Surfing One-on-One, Tips & Tricks',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_entertainment_id,),
));

$post_td_post_devin_jacobson_how_to_play_guitar_using_4_different_steps_id = td_demo_content::add_post(array(
	'title' => 'Devin Jacobson: How to Play Guitar Using 4 Different Steps',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_arts_id,),
));

$post_td_post_paula_griffin_roberts_teaches_digital_art_while_travelling_id = td_demo_content::add_post(array(
	'title' => 'Paula Griffin Roberts Teaches Digital Art While Travelling',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_arts_id,),
));

$post_td_post_katie_smiths_class_intro_to_music_and_singing_solo_id = td_demo_content::add_post(array(
	'title' => 'Katie Smith\'s Introduction to Music and Singing as a Viable Career Path',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_arts_id,),
));

$post_td_post_ray_mcmatthew_exposes_the_industrys_standards_in_fashion_id = td_demo_content::add_post(array(
	'title' => 'Ray McMatthew Exposes the Industry\'s Standards in Fashion',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_arts_id,),
));

$post_td_post_amanda_seinfeld_teaches_a_painting_class_for_beginners_id = td_demo_content::add_post(array(
	'title' => 'Amanda Seinfeld Teaches a Painting Class for Beginners',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_arts_id,),
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
	'title' => 'Classes',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_classes_id,
	'parent_id' => ''
), true);

$menu_item_2_id = td_demo_menus::add_mega_menu(array(
	'title' => 'Coming Soon',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_coming_soon_id,
	'parent_id' => ''
), true);


/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/
$template_search_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Revenant - Search Template',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_id);


$template_404_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Revenant - 404 Template',
	'file' => '404_cloud_template.txt',
	'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_id);


$template_date_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Revenant - Date Template',
	'file' => 'date_cloud_template.txt',
	'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_id);


$template_tag_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Revenant - Tag Template',
	'file' => 'tag_cloud_template.txt',
	'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_id);


$template_author_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Revenant - Author Template',
	'file' => 'author_cloud_template.txt',
	'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_id);


$template_category_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Revenant - Category Template',
	'file' => 'cat_cloud_template.txt',
	'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_id);


$template_single_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Revenant - Single Template',
	'file' => 'post_cloud_template.txt',
	'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_id);


$template_footer_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Revenant - Footer Template',
	'file' => 'footer_cloud_template.txt',
	'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_id);


$template_header_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Revenant - Header Template',
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
