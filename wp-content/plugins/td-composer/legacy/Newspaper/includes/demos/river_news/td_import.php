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



$plan_premium_id = td_demo_subscription::add_plan( array(
	'name' => 'Premium',
	'price' => '300',
	'months_in_cycle' => '12',
	'trial_days' => '0',
	'is_free' => '0',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"596287542fe90ec";}',
	)
);

$plan_free_plan_id = td_demo_subscription::add_plan( array(
	'name' => 'الاشتراك فقط',
	'price' => '',
	'months_in_cycle' => '',
	'trial_days' => '0',
	'is_free' => '1',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:14:"36287542fe9149";}',
	)
);

$plan_premium_id = td_demo_subscription::add_plan( array(
	'name' => 'Premium',
	'price' => '25',
	'months_in_cycle' => '1',
	'trial_days' => '0',
	'is_free' => '0',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"226287542fe9193";}',
	)
);

$plan_base_id = td_demo_subscription::add_plan( array(
	'name' => 'Base',
	'price' => '10',
	'months_in_cycle' => '1',
	'trial_days' => '0',
	'is_free' => '0',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"196287542fe91cd";}',
	)
);

$plan_base_id = td_demo_subscription::add_plan( array(
	'name' => 'Base',
	'price' => '100',
	'months_in_cycle' => '12',
	'trial_days' => '0',
	'is_free' => '0',
	'options' => 'a:2:{s:15:"td_demo_content";i:1;s:9:"unique_id";s:15:"636287542fe9209";}',
	)
);

$page_payment_page_id_id = td_demo_content::add_page( array(
	'title' => 'Checkout - river_news',
	'file' => 'tds_checkout.txt',
));

td_demo_subscription::add_option( array(
	'name' => 'payment_page_id',
	'value' => $page_payment_page_id_id,
	)
);

$page_my_account_page_id_id = td_demo_content::add_page( array(
	'title' => 'My Account - river_news',
	'file' => 'tds_my_account.txt',
));

td_demo_subscription::add_option( array(
	'name' => 'my_account_page_id',
	'value' => $page_my_account_page_id_id,
	)
);

$page_create_account_page_id_id = td_demo_content::add_page( array(
	'title' => 'Login/Register - river_news',
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
$cat_category1_id = td_demo_category::add_category(array(
	'category_name' => 'آخر ساعة',
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

$cat_category2_id = td_demo_category::add_category(array(
	'category_name' => 'أخبار',
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

$cat_category3_id = td_demo_category::add_category(array(
	'category_name' => 'أخبار الأدب',
	'parent_id' => $cat_category1_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_category4_id = td_demo_category::add_category(array(
	'category_name' => 'اخبار اليوم',
	'parent_id' => $cat_category1_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_category5_id = td_demo_category::add_category(array(
	'category_name' => 'العالمية',
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

$cat_category6_id = td_demo_category::add_category(array(
	'category_name' => 'توك شو',
	'parent_id' => $cat_category1_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_category7_id = td_demo_category::add_category(array(
	'category_name' => 'حضاره',
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

$cat_category8_id = td_demo_category::add_category(array(
	'category_name' => 'صحافة مواطن',
	'parent_id' => $cat_category1_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_category9_id = td_demo_category::add_category(array(
	'category_name' => 'صحة',
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

$cat_category10_id = td_demo_category::add_category(array(
	'category_name' => 'غير مصنف',
	'parent_id' => $cat_category1_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_category11_id = td_demo_category::add_category(array(
	'category_name' => 'نمط',
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
$page_river_news_menu_id = td_demo_content::add_page( array(
	'title' => 'River News Menu',
	'file' => 'river_news_menu.txt',
	'demo_unique_id' => '18628754301ff0e',
));

$page_homepage_id = td_demo_content::add_page( array(
	'title' => 'الصفحة الرئيسية',
	'file' => 'homepage.txt',
	'homepage' => true,
	'demo_unique_id' => '1862875430208df',
));

$page_tds_switching_plans_wizard_id = td_demo_content::add_page( array(
	'title' => 'خطط التسعير',
	'file' => 'tds_switching_plans_wizard.txt',
	'demo_unique_id' => '886287543020ee7',
));

$page_river_news_search_id = td_demo_content::add_page( array(
	'title' => 'River News Search',
	'file' => 'river_news_search.txt',
	'demo_unique_id' => '7562875430212c1',
));

$page_pricing_plans_menu_id = td_demo_content::add_page( array(
	'title' => 'Pricing Plans Menu',
	'file' => 'pricing_plans_menu.txt',
	'demo_unique_id' => '3162875430217da',
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
				'tds_title' => 'هذا المحتوى هو فقط للمشتركين',
				'tds_message' => 'لفتح المقالة والنشر ، تحتاج إلى تحديد خطة اشتراك عن طريق النقر فوق الزر أدناه ثم قراءة كل واحدة لتحديد ما يناسب احتياجاتك.',
				'tds_submit_btn_text' => 'يشترك',
				'tds_pp_msg' => 'أوافق على <a href=\"#\"> شروط الاستخدام </a> وكذلك <a href=\"#\"> سياسة الخصوصية. <a/>',
				'tds_locker_cf_1_name' => 'Custom field 1',
				'tds_locker_cf_2_name' => 'Custom field 2',
				'tds_locker_cf_3_name' => 'Custom field 3',
			),
	'tds_payable' => 'paid_subscription',
	'tds_paid_subs_page_id' => $page_tds_switching_plans_wizard_id,
	'tds_paid_subs_plan_ids' => [$plan_premium_id,$plan_free_plan_id,$plan_premium_id,$plan_base_id,$plan_base_id],
			'tds_locker_styles' => array(
				'tds_bg_color' => '#2a2a2a',
				'all_tds_border' => '1px',
				'all_tds_border_color' => '#e14c4c',
				'all_tds_shadow' => '40px',
				'all_tds_shadow_color' => '#e14c4c',
				'tds_title_color' => '#ffffff',
				'tds_message_color' => '#ffffff',
				'tds_submit_btn_text_color' => '#ffffff',
				'tds_submit_btn_text_color_h' => '#ffffff',
				'tds_submit_btn_bg_color' => '#b91c1c',
				'tds_submit_btn_bg_color_h' => '#e14c4c',
				'tds_after_btn_text_color' => '#ffffff',
				'tds_pp_checked_color' => '#ffffff',
				'tds_pp_check_bg' => '#e14c4c',
				'tds_pp_check_bg_f' => '#e14c4c',
				'tds_pp_check_border_color' => '#e14c4c',
				'tds_pp_check_border_color_f' => '#e14c4c',
				'tds_pp_msg_color' => '#ffffff',
				'tds_pp_msg_links_color' => '#ffffff',
				'tds_pp_msg_links_color_h' => '#e14c4c',
				'tds_general_font_family' => 'arabic_global',
				'tds_title_font_size' => '30',
				'tds_message_font_size' => '20',
				'tds_submit_btn_text_font_size' => '20',
				'tds_after_btn_text_font_size' => '16',
				'tds_pp_msg_font_size' => '16',
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

td_util::update_option('tds_demo_options', 'a:1:{s:5:"plans";a:5:{i:0;a:2:{s:9:"unique_id";s:15:"596287542fe90ec";s:4:"name";s:7:"Premium";}i:1;a:2:{s:9:"unique_id";s:14:"36287542fe9149";s:4:"name";s:23:"الاشتراك فقط";}i:2;a:2:{s:9:"unique_id";s:15:"226287542fe9193";s:4:"name";s:7:"Premium";}i:3;a:2:{s:9:"unique_id";s:15:"196287542fe91cd";s:4:"name";s:4:"Base";}i:4;a:2:{s:9:"unique_id";s:15:"636287542fe9209";s:4:"name";s:4:"Base";}}}');


/*  ---------------------------------------------------------------------------- 
	SUBSCRIPTION - end phase 2
*/

/*  ---------------------------------------------------------------------------- 
	POSTS
*/
$post_td_post_001_id = td_demo_content::add_post( array(
	'title' => 'بالإضافة لتسريع جهازك.. هذه الميزة في هواتف “آيفون إس إي” الجديدة ستوفر أموالك',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_category1_id,$cat_category2_id,$cat_category3_id,$cat_category4_id,$cat_category5_id,$cat_category6_id,$cat_category7_id,$cat_category8_id,$cat_category9_id,$cat_category10_id,$cat_category11_id,),
));

$post_td_post_002_id = td_demo_content::add_post( array(
	'title' => 'من هواتف إيه ذات الأسعار المعقولة.. مؤتمر سامسونغ “أوسوم” يكشف عن هاتفين جديدين بمميزات قوية',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_category1_id,$cat_category2_id,$cat_category3_id,$cat_category4_id,$cat_category5_id,$cat_category6_id,$cat_category7_id,$cat_category8_id,$cat_category9_id,$cat_category10_id,$cat_category11_id,),
));

$post_td_post_003_id = td_demo_content::add_post( array(
	'title' => '“منورة بأهلها”.. هل ينجح تكرار الغموض في صنع بصمة المؤلف؟',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_category1_id,$cat_category2_id,$cat_category3_id,$cat_category4_id,$cat_category5_id,$cat_category6_id,$cat_category7_id,$cat_category8_id,$cat_category9_id,$cat_category10_id,$cat_category11_id,),
));

$post_td_post_004_id = td_demo_content::add_post( array(
	'title' => '“وما زلنا نخطو حولها”.. معرض فني يجسد صورة القدس في قلوب عاشقيها',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_category1_id,$cat_category2_id,$cat_category3_id,$cat_category4_id,$cat_category5_id,$cat_category6_id,$cat_category7_id,$cat_category8_id,$cat_category9_id,$cat_category10_id,$cat_category11_id,),
));

$post_td_post_005_id = td_demo_content::add_post( array(
	'title' => '“إعادة اختراع العلمانية”.. تاريخ متكرر لسياسات العداء ضد الدين في فرنسا',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_category1_id,$cat_category2_id,$cat_category3_id,$cat_category4_id,$cat_category5_id,$cat_category6_id,$cat_category7_id,$cat_category8_id,$cat_category9_id,$cat_category10_id,$cat_category11_id,),
));

$post_td_post_006_id = td_demo_content::add_post( array(
	'title' => 'برج العذراء اليوم .. تكمن قوّتك في سرعة بديهتك',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_category10_id,),
));

$post_td_post_007_id = td_demo_content::add_post( array(
	'title' => 'ريهام ونسمة في احتفالية العيد القومي لجنوب سيناء',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_category10_id,),
));

$post_td_post_008_id = td_demo_content::add_post( array(
	'title' => 'خبيرة أبراج: مواليد 17 مارس يتمتعون بشخصية عقلانية',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_category10_id,),
));

$post_td_post_009_id = td_demo_content::add_post( array(
	'title' => 'سيدة تشارك 3 حيل لمنع تساقط الشعر',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_category10_id,),
));

$post_td_post_010_id = td_demo_content::add_post( array(
	'title' => 'الهنود في كل مكان بسبب «هولى» للألوان',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_category10_id,),
));

$post_td_post_011_id = td_demo_content::add_post( array(
	'title' => 'مع قرب الخريف.. هذه أشهر مناطق التنزه في ألمانيا',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_category9_id,),
));

$post_td_post_012_id = td_demo_content::add_post( array(
	'title' => 'اختراع أحمر شفاه جديد يغير لونه بحسب درجة حرارة الجسم',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_category9_id,),
));

$post_td_post_013_id = td_demo_content::add_post( array(
	'title' => 'تتويج ملكة جمال العالم وسط دعوات للسلام في أوكرانيا صور',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_category9_id,),
));

$post_td_post_014_id = td_demo_content::add_post( array(
	'title' => 'في ليلة افتتاح الإسماعيلية السينمائي.. الجمهور يشاهد «جزر الهند» و«الشقيقات»',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_category9_id,),
));

$post_td_post_015_id = td_demo_content::add_post( array(
	'title' => 'بالبوت الأخضر الطويل.. هيفاء وهبي بإطلالة شتوية مميزة',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_category9_id,),
));

$post_td_post_016_id = td_demo_content::add_post( array(
	'title' => 'لقاح جديد يمكن أن يحمي الأطفال من فيروس خطير',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_category8_id,),
));

$post_td_post_017_id = td_demo_content::add_post( array(
	'title' => 'سن اليأس عند الرجال.. هل من طريقة لعلاجه؟',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_category8_id,),
));

$post_td_post_018_id = td_demo_content::add_post( array(
	'title' => 'مخاطر صحية لمضغ العلكة لا يعرفها الكثير من الناس',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_category8_id,),
));

$post_td_post_019_id = td_demo_content::add_post( array(
	'title' => '\"الرداب القولوني\" مخاطر كامنة وأعراض مشابهة لالتهاب الزائدة',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_category8_id,),
));

$post_td_post_020_id = td_demo_content::add_post( array(
	'title' => 'أرقام غير مسبوقة لإصابات كورونا في ألمانيا .. ما هي الأسباب؟',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_category8_id,),
));

$post_td_post_021_id = td_demo_content::add_post( array(
	'title' => 'آخرها \"بشتقلك ساعات\".. أعمال فنية عربية تناولت \"المثلية\"',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_category7_id,),
));

$post_td_post_022_id = td_demo_content::add_post( array(
	'title' => 'سكريم يتصدر إيرادات السينما الأميركية',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_category7_id,),
));

$post_td_post_023_id = td_demo_content::add_post( array(
	'title' => 'متحف مصري يحطم رقما قياسيا في عدد الزيارات',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_category7_id,),
));

$post_td_post_024_id = td_demo_content::add_post( array(
	'title' => 'عقاب بلا جريمة.. ديستوفيسكي ضحية الحرب الروسية الأوكرانية',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_category7_id,),
));

$post_td_post_025_id = td_demo_content::add_post( array(
	'title' => 'بعد هدمه.. اكتشافات ملكية مذهلة أسفل قصر \"أندراوس\" بالأقصر',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_category7_id,),
));

$post_td_post_026_id = td_demo_content::add_post( array(
	'title' => 'لهذا يعد القمح من أهم الحبوب في جميع أنحاء العالم!',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_category6_id,),
));

$post_td_post_027_id = td_demo_content::add_post( array(
	'title' => 'حواس متيقظة رغم استغراقنا في النوم.. ما السبب؟',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_category6_id,),
));

$post_td_post_028_id = td_demo_content::add_post( array(
	'title' => 'من أجل اختيار سماعات الأذن الصحية.. إليك هذه النصائح',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_category6_id,),
));

$post_td_post_029_id = td_demo_content::add_post( array(
	'title' => 'تطوير روبوت مصنوع من السكر والجيلاتين لأغراض طبية',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_category6_id,),
));

$post_td_post_030_id = td_demo_content::add_post( array(
	'title' => 'تويتر يوقف الإعلانات في روسيا وأوكرانيا',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_category6_id,),
));

$post_td_post_031_id = td_demo_content::add_post( array(
	'title' => 'فوائد جمة للمكسرات على صحة الدماغ تكشفها دراسة حديثة',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_category5_id,),
));

$post_td_post_032_id = td_demo_content::add_post( array(
	'title' => 'في اليوم العالمي للسمع ـ منظمة الصحة العالمية تحذر!',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_category5_id,),
));

$post_td_post_033_id = td_demo_content::add_post( array(
	'title' => 'كيف تؤثر التغذية في مرض باركنسون؟',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_category5_id,),
));

$post_td_post_034_id = td_demo_content::add_post( array(
	'title' => 'التغير المناخي والحداد على ذوبان الجليد',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_category5_id,),
));

$post_td_post_035_id = td_demo_content::add_post( array(
	'title' => 'المغرب.. هل توجه الإنجليزية \"الضربة القاضية\" للفرنسية؟',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_category5_id,),
));

$post_td_post_036_id = td_demo_content::add_post( array(
	'title' => 'اللاجئون في اليونان.. \"الردع\" عوضا عن المساعدة على الاندماج؟',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_category4_id,),
));

$post_td_post_037_id = td_demo_content::add_post( array(
	'title' => '\"علّي صوتك\".. الفن في مواجهة الفقر والمشكلات الاجتماعية',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_category4_id,),
));

$post_td_post_038_id = td_demo_content::add_post( array(
	'title' => 'المغاربة ينفقون 4 دولارات في السنة على القراءة.. ما السبب؟',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_category4_id,),
));

$post_td_post_039_id = td_demo_content::add_post( array(
	'title' => 'غضب و\"شروط\".. \"مراجعة\" لأعمال نجيب محفوظ تثير الجدل',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_category4_id,),
));

$post_td_post_040_id = td_demo_content::add_post( array(
	'title' => 'بالصور: مصر تعيد إحياء \"التحطيب\" بمهرجان خاص بالرقصة',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_category4_id,),
));

$post_td_post_041_id = td_demo_content::add_post( array(
	'title' => 'فضيحة السترات الواقية من الرصاص.. سرقوها قبل شحنها لأوكرانيا',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_category3_id,),
));

$post_td_post_042_id = td_demo_content::add_post( array(
	'title' => 'الحرب الأوكرانية الروسية تهدد \"سلة خبز العالم\"',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_category3_id,),
));

$post_td_post_043_id = td_demo_content::add_post( array(
	'title' => 'كردستان العراق.. غضب من تأخر صرف رواتب',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_category3_id,),
));

$post_td_post_044_id = td_demo_content::add_post( array(
	'title' => 'النفط يقفز مع عدم إحراز تقدم في المحادثات الروسية الأوكرانية',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_category3_id,),
));

$post_td_post_045_id = td_demo_content::add_post( array(
	'title' => 'آخر تحديث لأسعار الذهب بعد خطوة المركزي الأميركي',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_category3_id,),
));

$post_td_post_046_id = td_demo_content::add_post( array(
	'title' => 'الحرب الكلامية تشتعل.. بايدن يطلق وصفا جديدا على بوتن',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_category2_id,),
));

$post_td_post_047_id = td_demo_content::add_post( array(
	'title' => 'بعيدا عن أوكرانيا.. روسيا تفك العزلة وتقتحم \"بحيرة الناتو\"',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_category2_id,),
));

$post_td_post_048_id = td_demo_content::add_post( array(
	'title' => 'بعد الاتصال \"الصعب\".. بوتن يوجه اتهاما لأوكرانيا',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_category2_id,),
));

$post_td_post_049_id = td_demo_content::add_post( array(
	'title' => '«كلنا واحد»: توفير السلع الغذائية بتخفيضات 60%',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'tds_lock_content' => '1',
	'tds_locker' => $post_tds_default_wizard_locker_id,
	'categories_id_array' => array($cat_category2_id,),
));

$post_td_post_050_id = td_demo_content::add_post( array(
	'title' => 'رئيس الزمالك: طارق حامد رفض يلعب مباراة الوداد رغم أنه سليم',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_category2_id,),
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
	'title' => 'الصفحة الرئيسية',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'page_id' => $page_homepage_id,
	'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_category(array(
	'title' => 'أخبار',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_category1_id,
	'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_category(array(
	'title' => 'العالمية',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_category2_id,
	'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_category(array(
	'title' => 'حضاره',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_category3_id,
	'parent_id' => ''
));

$menu_item_4_id = td_demo_menus::add_category(array(
	'title' => 'صحة',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_category4_id,
	'parent_id' => ''
));

$menu_item_5_id = td_demo_menus::add_category(array(
	'title' => 'نمط',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_category5_id,
	'parent_id' => ''
));


/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/
$template_tag_template_id = td_demo_content::add_cloud_template( array(
	'title' => 'River News - Tag Template',
	'file' => 'tag_cloud_template.txt',
	'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_id);


$template_date_template_id = td_demo_content::add_cloud_template( array(
	'title' => 'River News - Date Template',
	'file' => 'date_cloud_template.txt',
	'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_id);


$template_404_template_id = td_demo_content::add_cloud_template( array(
	'title' => 'River News - 404 Template',
	'file' => '404_cloud_template.txt',
	'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_id);


$template_search_template_id = td_demo_content::add_cloud_template( array(
	'title' => 'River News - Search Template',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_id);


$template_author_template_id = td_demo_content::add_cloud_template( array(
	'title' => 'River News - Author Template',
	'file' => 'author_cloud_template.txt',
	'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_id);


$template_category_template_id = td_demo_content::add_cloud_template( array(
	'title' => 'River News - Category Template',
	'file' => 'cat_cloud_template.txt',
	'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_id);


$template_single_template_id = td_demo_content::add_cloud_template( array(
	'title' => 'River News - Single Template',
	'file' => 'post_cloud_template.txt',
	'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_id);


$template_footer_template_id = td_demo_content::add_cloud_template( array(
	'title' => 'River News - Footer Template',
	'file' => 'footer_cloud_template.txt',
	'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_id);


$template_header_template_id = td_demo_content::add_cloud_template( array(
	'title' => 'River News - Header Template',
	'file' => 'header_cloud_template.txt',
	'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_id);



/*  ---------------------------------------------------------------------------- 
	TAXONOMIES
*/

/*  ---------------------------------------------------------------------------- 
	CPTs
*/

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
