<?php

/*  ----------------------------------------------------------------------------
	MENUS
*/
$menu_td_demo_header_menu_id = td_demo_menus::create_menu('td-demo-header-menu', '');
$menu_td_demo_top_menu_id = td_demo_menus::create_menu('td-demo-top-menu', '');
$menu_td_demo_mobile_menu_id = td_demo_menus::create_menu('td-demo-mobile-menu', '');
$menu_td_demo_footer_menu_id = td_demo_menus::create_menu('td-demo-footer-menu', '');
$menu_td_demo_footer_menu_extra_id = td_demo_menus::create_menu('td-demo-footer-menu-extra', '');
$menu_td_demo_header_menu_extra_id = td_demo_menus::create_menu('td-demo-header-menu-extra', '');



/*  ---------------------------------------------------------------------------- 
	ATTACHMENTS
*/

/*  ---------------------------------------------------------------------------- 
	PAGES
*/
$page_pricing_id = td_demo_content::add_page(array(
	'title' => 'Pricing',
	'file' => 'pricing.txt',
	'demo_unique_id' => '696275236e3b914',
));

$page_roadmap_id = td_demo_content::add_page(array(
	'title' => 'Roadmap',
	'file' => 'roadmap.txt',
	'demo_unique_id' => '576275236e3c41b',
));

$page_token_id = td_demo_content::add_page(array(
	'title' => 'Token',
	'file' => 'token.txt',
	'demo_unique_id' => '376275236e3d119',
));

$page_contact_id = td_demo_content::add_page(array(
	'title' => 'Contact',
	'file' => 'contact.txt',
	'demo_unique_id' => '866275236e3d9ac',
));

$page_about_id = td_demo_content::add_page(array(
	'title' => 'About',
	'file' => 'about.txt',
	'demo_unique_id' => '656275236e3e540',
));

$page_mega_menu_page_id = td_demo_content::add_page(array(
	'title' => 'Mega menu page',
	'file' => 'mega_menu_page.txt',
	'demo_unique_id' => '296275236e3f29a',
));


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


/*  ---------------------------------------------------------------------------- 
	POSTS
*/
$post_td_post_making_nfts_secure_with_our_new_blockchain_technology_id = td_demo_content::add_post(array(
	'title' => 'Making NFTs Secure with Our New BlockChain Technology',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_blog_id,),
));

$post_td_post_proof_of_insurance_to_be_added_on_the_blockchain_network_id = td_demo_content::add_post(array(
	'title' => 'Proof of Insurance to Be Added on the BlockChain Network',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_blog_id,),
));

$post_td_post_this_year_will_bring_breakthrough_blockchain_developments_id = td_demo_content::add_post(array(
	'title' => 'This Year Will Bring Breakthrough Blockchain Developments',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_blog_id,),
));

$post_td_post_blockchain_will_launch_new_mining_operation_with_5_nm_chips_id = td_demo_content::add_post(array(
	'title' => 'BlockChain Will Launch New Mining Operation With 5 nm Chips',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_blog_id,),
));

$post_td_post_new_mining_centers_increase_north_american_market_position_id = td_demo_content::add_post(array(
	'title' => 'New Mining Centers Increase North American Market Position',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_blog_id,),
));

$post_td_post_us_proposes_virtual_currency_specific_regulatory_body_id = td_demo_content::add_post(array(
	'title' => 'US Proposes Virtual Currency-Specific Regulatory Body',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_blog_id,),
));

$post_td_post_interpol_to_increase_measures_against_crypto_laundering_id = td_demo_content::add_post(array(
	'title' => 'Interpol to Increase Measures Against Crypto Laundering',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_blog_id,),
));

$post_td_post_the_eu_clarifies_the_anti_money_laundering_directive_id = td_demo_content::add_post(array(
	'title' => 'The EU Clarifies the Anti-Money Laundering Directive',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_blog_id,),
));

$post_td_post_regulators_greenlight_blockchain_future_implications_id = td_demo_content::add_post(array(
	'title' => 'Regulators Greenlight BlockChain Future Implications',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_blog_id,),
));

$post_td_post_services_could_help_investors_rate_blockchain_technology_id = td_demo_content::add_post(array(
	'title' => 'Services Could Help Investors Rate BlockChain Technology',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_blog_id,),
));

$post_td_post_the_complete_breakdown_simple_storage_guide_for_beginners_id = td_demo_content::add_post(array(
	'title' => 'The Complete Breakdown: Simple Storage Guide for Beginners',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_blog_id,),
));

$post_td_post_a_users_guide_on_upcoming_forked_coins_and_transactions_id = td_demo_content::add_post(array(
	'title' => 'A User’s Guide on Upcoming Forked Coins and Transactions',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_blog_id,),
));

$post_td_post_south_korea_releases_official_guidelines_for_blck_trading_id = td_demo_content::add_post(array(
	'title' => 'South Korea Releases Official Guidelines for BLCK Trading',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_blog_id,),
));

$post_td_post_see_why_blck_tokens_a_fantastic_investment_for_the_future_id = td_demo_content::add_post(array(
	'title' => 'See why BLCK Tokens a Fantastic Investment for the Future',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_blog_id,),
));

$post_td_post_3_factors_that_made_blockchain_become_valuable_last_year_id = td_demo_content::add_post(array(
	'title' => '3 Factors That Made Blockchain Become Valuable Last Year',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_blog_id,),
));


/*  ---------------------------------------------------------------------------- 
	PRODUCTS
*/


/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/
$template_tag_template_blockchain_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Tag Template - Blockchain PRO',
	'file' => 'tag_cloud_template.txt',
	'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_blockchain_pro_id);


$template_date_template_blockchain_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Date Template - Blockchain PRO',
	'file' => 'date_cloud_template.txt',
	'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_blockchain_pro_id);


$template_search_template_blockchain_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Search Template - Blockchain PRO',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_blockchain_pro_id);


$template_author_template_blockchain_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Author Template - Blockchain PRO',
	'file' => 'author_cloud_template.txt',
	'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_blockchain_pro_id);


$template_category_template_blockchain_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Category Template - Blockchain PRO',
	'file' => 'cat_cloud_template.txt',
	'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_blockchain_pro_id);


$template_single_post_template_blockchain_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Single Post Template - Blockchain PRO',
	'file' => 'post_cloud_template.txt',
	'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_post_template_blockchain_pro_id);


$template_404_template_blockchain_pro_id = td_demo_content::add_cloud_template(array(
	'title' => '404 Template - Blockchain PRO',
	'file' => '404_cloud_template.txt',
	'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_blockchain_pro_id);


$template_header_template_main_blockchain_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Header Template Main - Blockchain PRO',
	'file' => 'header_cloud_template.txt',
	'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_main_blockchain_pro_id);


update_post_meta( $template_header_template_main_blockchain_pro_id, 'header_mobile_menu_id', $menu_td_demo_header_menu_id);


$template_footer_blockchain_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Footer - Blockchain PRO',
	'file' => 'footer_cloud_template.txt',
	'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_blockchain_pro_id);


$template_header_template_overlay_blockchain_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Header Template Overlay - Blockchain PRO',
	'file' => 'header_cloud_template_overlay.txt',
	'template_type' => 'header',
));

/*  ----------------------------------------------------------------------------
	HOMEPAGE
*/
$page_home_id = td_demo_content::add_page(array(
    'title' => 'Home',
    'file' => 'home.txt',
    'homepage' => true,
    'header_template_id' => $template_header_template_overlay_blockchain_pro_id,
    'demo_unique_id' => '586275236e40c62',
));


/*  ----------------------------------------------------------------------------
	MENUS ITEMS HEADER
*/

$menu_item_0_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Ecosystem',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'page_id' => $page_mega_menu_page_id,
    'parent_id' => ''
), true);

$menu_item_1_id = td_demo_menus::add_page(array(
    'title' => 'About',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'page_id' => $page_about_id,
    'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_page(array(
    'title' => 'Token',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'page_id' => $page_token_id,
    'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_link(array(
    'title' => 'Resources',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_4_id = td_demo_menus::add_page(array(
    'title' => 'Pricing',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'page_id' => $page_pricing_id,
    'parent_id' => $menu_item_3_id
));

$menu_item_5_id = td_demo_menus::add_page(array(
    'title' => 'Roadmap',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'page_id' => $page_roadmap_id,
    'parent_id' => $menu_item_3_id
));

$menu_item_6_id = td_demo_menus::add_category(array(
    'title' => 'Blog',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_blog_id,
    'parent_id' => $menu_item_3_id
));

$menu_item_7_id = td_demo_menus::add_page(array(
    'title' => 'Contact',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'page_id' => $page_contact_id,
    'parent_id' => ''
));


/*  ----------------------------------------------------------------------------
	MENUS ITEMS FOOTER 1
*/
$menu_item_0_id = td_demo_menus::add_page(array(
    'title' => 'Token',
    'add_to_menu_id' => $menu_td_demo_top_menu_id,
    'page_id' => $page_token_id,
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_page(array(
    'title' => 'Roadmap',
    'add_to_menu_id' => $menu_td_demo_top_menu_id,
    'page_id' => $page_roadmap_id,
    'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_page(array(
    'title' => 'About',
    'add_to_menu_id' => $menu_td_demo_top_menu_id,
    'page_id' => $page_about_id,
    'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_page(array(
    'title' => 'Contact',
    'add_to_menu_id' => $menu_td_demo_top_menu_id,
    'page_id' => $page_contact_id,
    'parent_id' => ''
));


/*  ----------------------------------------------------------------------------
	MENUS ITEMS FOOTER 2
*/
$menu_item_0_id = td_demo_menus::add_link(array(
    'title' => 'Node',
    'add_to_menu_id' => $menu_td_demo_mobile_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_link(array(
    'title' => 'Stake',
    'add_to_menu_id' => $menu_td_demo_mobile_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_link(array(
    'title' => 'Contribute',
    'add_to_menu_id' => $menu_td_demo_mobile_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_link(array(
    'title' => 'Store',
    'add_to_menu_id' => $menu_td_demo_mobile_menu_id,
    'url' => '#',
    'parent_id' => ''
));


/*  ----------------------------------------------------------------------------
	MENUS ITEMS FOOTER 3
*/
$menu_item_0_id = td_demo_menus::add_category(array(
    'title' => 'Blog',
    'add_to_menu_id' => $menu_td_demo_footer_menu_id,
    'category_id' => $cat_blog_id,
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_link(array(
    'title' => 'Community',
    'add_to_menu_id' => $menu_td_demo_footer_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_link(array(
    'title' => 'Docs',
    'add_to_menu_id' => $menu_td_demo_footer_menu_id,
    'url' => '#',
    'parent_id' => ''
));


/*  ----------------------------------------------------------------------------
	MENUS ITEMS FOOTER 4
*/
$menu_item_0_id = td_demo_menus::add_link(array(
    'title' => 'Partners',
    'add_to_menu_id' => $menu_td_demo_footer_menu_extra_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_link(array(
    'title' => 'Careers',
    'add_to_menu_id' => $menu_td_demo_footer_menu_extra_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_link(array(
    'title' => 'Terms of use',
    'add_to_menu_id' => $menu_td_demo_footer_menu_extra_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_link(array(
    'title' => 'Cookie Policy',
    'add_to_menu_id' => $menu_td_demo_footer_menu_extra_id,
    'url' => '#',
    'parent_id' => ''
));


/*  ----------------------------------------------------------------------------
	MENUS ITEMS MEGA MENU
*/
$menu_item_0_id = td_demo_menus::add_page(array(
    'title' => 'Pricing',
    'add_to_menu_id' => $menu_td_demo_header_menu_extra_id,
    'page_id' => $page_pricing_id,
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_page(array(
    'title' => 'Roadmap',
    'add_to_menu_id' => $menu_td_demo_header_menu_extra_id,
    'page_id' => $page_roadmap_id,
    'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_category(array(
    'title' => 'Blog',
    'add_to_menu_id' => $menu_td_demo_header_menu_extra_id,
    'category_id' => $cat_blog_id,
    'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_link(array(
    'title' => 'Terms of use',
    'add_to_menu_id' => $menu_td_demo_header_menu_extra_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_4_id = td_demo_menus::add_link(array(
    'title' => 'Cookie Policy',
    'add_to_menu_id' => $menu_td_demo_header_menu_extra_id,
    'url' => '#',
    'parent_id' => ''
));


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
