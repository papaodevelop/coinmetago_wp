<?php



/*  ----------------------------------------------------------------------------
	CATEGORIES
*/
$cat_buying_advice_id = td_demo_category::add_category(array(
    'category_name' => 'Buying Advice',
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

$cat_trends_id = td_demo_category::add_category(array(
    'category_name' => 'Trends',
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
$post_td_post_trend_alert_swiss_watches_id = td_demo_content::add_post(array(
    'title' => 'Trend Alert: Swiss Watches',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'categories_id_array' => array($cat_trends_id,),
));

$post_td_post_discover_junghans_watches_id = td_demo_content::add_post(array(
    'title' => 'Discover Junghans Watches',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'categories_id_array' => array($cat_trends_id,),
));

$post_td_post_trend_alert_quartz_watches_id = td_demo_content::add_post(array(
    'title' => 'Trend Alert: Quartz Watches',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'categories_id_array' => array($cat_trends_id,),
));

$post_td_post_trend_alert_sports_watches_id = td_demo_content::add_post(array(
    'title' => 'Trend Alert: Sports Watches',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'categories_id_array' => array($cat_trends_id,),
));

$post_td_post_trend_alert_gold_watches_id = td_demo_content::add_post(array(
    'title' => 'Trend Alert: Gold Watches',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'categories_id_array' => array($cat_trends_id,),
));

$post_td_post_how_to_style_a_suit_and_watch_id = td_demo_content::add_post(array(
    'title' => 'How to Style a Suit And Watch',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'categories_id_array' => array($cat_trends_id,),
));

$post_td_post_trend_alert_pocket_watches_id = td_demo_content::add_post(array(
    'title' => 'Trend Alert: Pocket Watches',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'categories_id_array' => array($cat_trends_id,),
));

$post_td_post_japanese_watches_to_look_for_id = td_demo_content::add_post(array(
    'title' => 'Japanese Watches to Look For',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'categories_id_array' => array($cat_trends_id,),
));

$post_td_post_trend_alert_silver_watches_id = td_demo_content::add_post(array(
    'title' => 'Trend Alert: Silver Watches',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'categories_id_array' => array($cat_trends_id,),
));

$post_td_post_3_spring_summer_watch_trends_id = td_demo_content::add_post(array(
    'title' => '3 Spring/Summer Watch Trends',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'categories_id_array' => array($cat_trends_id,),
));

$post_td_post_a_guide_to_certina_watches_id = td_demo_content::add_post(array(
    'title' => 'A Guide to Certina Watches',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'categories_id_array' => array($cat_buying_advice_id,),
));

$post_td_post_choosing_a_sports_watch_id = td_demo_content::add_post(array(
    'title' => 'Choosing a Sports Watch',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'categories_id_array' => array($cat_buying_advice_id,),
));

$post_td_post_a_watch_that_holds_its_value_id = td_demo_content::add_post(array(
    'title' => 'A Watch That Holds its Value',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'categories_id_array' => array($cat_buying_advice_id,),
));

$post_td_post_a_guide_to_german_watches_id = td_demo_content::add_post(array(
    'title' => 'A Guide to German Watches',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'categories_id_array' => array($cat_buying_advice_id,),
));

$post_td_post_how_to_give_a_watch_as_a_gift_id = td_demo_content::add_post(array(
    'title' => 'How To Give a Watch as a Gift',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'categories_id_array' => array($cat_buying_advice_id,),
));

$post_td_post_choosing_a_luxury_watch_id = td_demo_content::add_post(array(
    'title' => 'Choosing A Luxury Watch',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'categories_id_array' => array($cat_buying_advice_id,),
));

$post_td_post_a_guide_to_louis_erard_watches_id = td_demo_content::add_post(array(
    'title' => 'A Guide to Louis Erard Watches',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'categories_id_array' => array($cat_buying_advice_id,),
));

$post_td_post_how_to_choose_a_leather_watch_id = td_demo_content::add_post(array(
    'title' => 'How to Choose a Leather Watch',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'categories_id_array' => array($cat_buying_advice_id,),
));

$post_td_post_choosing_a_divers_watch_id = td_demo_content::add_post(array(
    'title' => 'Choosing a Diver’s Watch',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'categories_id_array' => array($cat_buying_advice_id,),
));

$post_td_post_how_to_choose_a_tonneau_watch_id = td_demo_content::add_post(array(
    'title' => 'How to choose a Tonneau Watch',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'categories_id_array' => array($cat_buying_advice_id,),
));

/*
   load the following menus & cloud template here because it's used as header template on Blog page so we need to add it here...
 */
$menu_td_demo_header_menu_id = td_demo_menus::create_menu('td-demo-header-menu', '');
$menu_td_header_menu_extra_id = td_demo_menus::create_menu('td-demo-header-menu-extra', '');

$template_header_blog_template_watches_id = td_demo_content::add_cloud_template(array(
	'title' => 'Header Template - Blog - Watches',
	'file' => 'header_blog_cloud_template.txt',
	'template_type' => 'header',
));

/*  ----------------------------------------------------------------------------
	PAGES
*/
$page_home_id = td_demo_content::add_page(array(
    'title' => 'Home',
    'file' => 'home.txt',
    'homepage' => true,
));

$page_blog_id = td_demo_content::add_page(array(
    'title' => 'Blog',
    'file' => 'blog.txt',
    'header_template_id' => $template_header_blog_template_watches_id
));


/*  ----------------------------------------------------------------------------
	PRODUCT CATEGORIES
*/
$p_cat_mens_id = td_woo_demo_product_category::add_woo_category(array(
    'product_category_name' => 'Men\'s',
    'parent_id' => 0,
    'description' => '',
));

$p_cat_watches_id = td_woo_demo_product_category::add_woo_category(array(
    'product_category_name' => 'Watches',
    'parent_id' => 0,
    'description' => '',
));

$p_cat_womens_id = td_woo_demo_product_category::add_woo_category(array(
    'product_category_name' => 'Women\'s',
    'parent_id' => $p_cat_watches_id,
    'description' => '',
));


/*  ----------------------------------------------------------------------------
	PRODUCT ATTRIBUTES
*/
$p_att_pa_sws_color_id = td_woo_demo_product_attribute::add_woo_attribute( array(
    'attribute_name' => 'Color',
    'attribute_slug' => 'pa_sws_color',
    'attribute_type' => 'color',
    'attribute_terms' => array(
        'Black' => '#000000',
        'Navy blue' => '#000080',
        'White' => '#ffffff',
    ),
    'order_by' => 'menu_order',
    'has_archives' => false
));

$p_att_pa_sws_size_id = td_woo_demo_product_attribute::add_woo_attribute( array(
    'attribute_name' => 'Size',
    'attribute_slug' => 'pa_sws_size',
    'attribute_type' => 'select',
    'attribute_terms' => array(
        'L','M','S','XL'
    ),
    'order_by' => 'menu_order',
    'has_archives' => false
));


/*  ----------------------------------------------------------------------------
	PRODUCTS
*/
$product_round_dial_id = td_demo_content::add_product( array(
    'title' => 'Round Dial',
    'file' => 'product_default.txt',
    'product_price' => '400',
    'product_sku' => 'G4456',
    'product_image_td_id' => 'tdw_pic_1',
    //'product_image_gallery_td_ids' => array( 'tdw_pic_1', 'tdw_pic_2', 'tdw_pic_3', 'tdw_pic_4', 'tdw_pic_5', ),
    'product_categories' => array( $p_cat_watches_id,$p_cat_womens_id ),
    'product_type' => 'simple',
));

$product_golden_classical_id = td_demo_content::add_product( array(
    'title' => 'Golden Classical',
    'file' => 'product_default.txt',
    'product_price' => '400',
    'product_sku' => 'G3456',
    'product_image_td_id' => 'tdw_pic_2',
    //'product_image_gallery_td_ids' => array( 'tdw_pic_1', 'tdw_pic_2', 'tdw_pic_3', 'tdw_pic_4', 'tdw_pic_5', ),
    'product_categories' => array( $p_cat_mens_id,$p_cat_watches_id ),
    'product_tags' => array( 'analog','fresh','luxury','unique' ),
    'product_type' => 'simple',
));

$product_stainless_steel_id = td_demo_content::add_product( array(
    'title' => 'Stainless Steel',
    'file' => 'product_default.txt',
    'product_price' => '500',
    'product_sku' => 'G2456',
    'product_image_td_id' => 'tdw_pic_3',
    //'product_image_gallery_td_ids' => array( 'tdw_pic_1', 'tdw_pic_2', 'tdw_pic_3', 'tdw_pic_4', 'tdw_pic_5', ),
    'product_categories' => array( $p_cat_watches_id,$p_cat_womens_id ),
    'product_tags' => array( 'analog','fresh','luxury','unique' ),
    'product_type' => 'simple',
));

$product_romani_semi_id = td_demo_content::add_product( array(
    'title' => 'Romani Semi',
    'file' => 'product_default.txt',
    'product_price' => '200',
    'product_sku' => 'G1456',
    'product_image_td_id' => 'tdw_pic_4',
    //'product_image_gallery_td_ids' => array( 'tdw_pic_1', 'tdw_pic_2', 'tdw_pic_3', 'tdw_pic_4', 'tdw_pic_5', ),
    'product_categories' => array( $p_cat_mens_id,$p_cat_watches_id ),
    'product_tags' => array( 'analog','fresh','luxury','unique' ),
    'product_type' => 'simple',
));

$product_platinum_analog_id = td_demo_content::add_product( array(
    'title' => 'Platinum Analog',
    'file' => 'product_default.txt',
    'product_price' => '500',
    'product_sku' => 'S9456',
    'product_image_td_id' => 'tdw_pic_5',
    //'product_image_gallery_td_ids' => array( 'tdw_pic_1', 'tdw_pic_2', 'tdw_pic_3', 'tdw_pic_4', 'tdw_pic_5', ),
    'product_categories' => array( $p_cat_watches_id,$p_cat_womens_id ),
    'product_tags' => array( 'analog','fresh','luxury','unique' ),
    'product_type' => 'simple',
));

$product_leather_automatic_id = td_demo_content::add_product( array(
    'title' => 'Leather Automatic',
    'file' => 'product_default.txt',
    'product_price' => '400',
    'product_price' => '450',
    'product_price' => '500',
    'product_price' => '550',
    'product_image_td_id' => 'tdw_pic_6',
    //'product_image_gallery_td_ids' => array( 'tdw_pic_1', 'tdw_pic_2', 'tdw_pic_3', 'tdw_pic_4', 'tdw_pic_5', ),
    'product_categories' => array( $p_cat_mens_id,$p_cat_watches_id ),
    'product_tags' => array( 'analog','fresh','luxury','unique' ),
    'product_type' => 'variable',
));

$product_platinum_numeral_id = td_demo_content::add_product( array(
    'title' => 'Platinum Numeral',
    'file' => 'product_default.txt',
    'product_price' => '280',
    'product_sku' => 'S8456',
    'product_image_td_id' => 'tdw_pic_1',
    //'product_image_gallery_td_ids' => array( 'tdw_pic_1', 'tdw_pic_2', 'tdw_pic_3', 'tdw_pic_4', 'tdw_pic_5', ),
    'product_categories' => array( $p_cat_watches_id,$p_cat_womens_id ),
    'product_tags' => array( 'analog','fresh','luxury','unique' ),
    'product_type' => 'simple',
));

$product_classic_roman_id = td_demo_content::add_product( array(
    'title' => 'Classic Roman',
    'file' => 'product_default.txt',
    'product_price' => '600',
    'product_sku' => 'S7456',
    'product_image_td_id' => 'tdw_pic_2',
    //'product_image_gallery_td_ids' => array( 'tdw_pic_1', 'tdw_pic_2', 'tdw_pic_3', 'tdw_pic_4', 'tdw_pic_5', ),
    'product_categories' => array( $p_cat_mens_id,$p_cat_watches_id ),
    'product_tags' => array( 'analog','fresh','luxury','unique' ),
    'product_type' => 'simple',
));

$product_timezee_scientific_id = td_demo_content::add_product( array(
    'title' => 'Timezee Scientific',
    'file' => 'product_default.txt',
    'product_price' => '450',
    'product_sku' => 'S6456',
    'product_image_td_id' => 'tdw_pic_3',
    //'product_image_gallery_td_ids' => array( 'tdw_pic_1', 'tdw_pic_2', 'tdw_pic_3', 'tdw_pic_4', 'tdw_pic_5', ),
    'product_categories' => array( $p_cat_mens_id,$p_cat_watches_id ),
    'product_tags' => array( 'analog','fresh','luxury','unique' ),
    'product_type' => 'simple',
));

$product_gold_case_id = td_demo_content::add_product( array(
    'title' => 'Gold Case',
    'file' => 'product_default.txt',
    'product_price' => '350',
    'product_sku' => 'S5456',
    'product_image_td_id' => 'tdw_pic_4',
    //'product_image_gallery_td_ids' => array( 'tdw_pic_1', 'tdw_pic_2', 'tdw_pic_3', 'tdw_pic_4', 'tdw_pic_5', ),
    'product_categories' => array( $p_cat_watches_id,$p_cat_womens_id ),
    'product_tags' => array( 'analog','fresh','luxury','unique' ),
    'product_type' => 'simple',
));

$product_black_numeral_dial_id = td_demo_content::add_product( array(
    'title' => 'Black Numeral Dial',
    'file' => 'product_default.txt',
    'product_price' => '500',
    'product_sku' => 'S2456',
    'product_image_td_id' => 'tdw_pic_5',
    //'product_image_gallery_td_ids' => array( 'tdw_pic_1', 'tdw_pic_2', 'tdw_pic_3', 'tdw_pic_4', 'tdw_pic_5', ),
    'product_categories' => array( $p_cat_mens_id,$p_cat_watches_id ),
    'product_tags' => array( 'analog','fresh','luxury','unique' ),
    'product_type' => 'simple',
));

$product_rose_automatic_id = td_demo_content::add_product( array(
    'title' => 'Rose Automatic',
    'file' => 'product_default.txt',
    'product_price' => '250',
    'product_sku' => 'S1456',
    'product_image_td_id' => 'tdw_pic_6',
    //'product_image_gallery_td_ids' => array( 'tdw_pic_1', 'tdw_pic_2', 'tdw_pic_3', 'tdw_pic_4', 'tdw_pic_5', ),
    'product_categories' => array( $p_cat_watches_id,$p_cat_womens_id ),
    'product_tags' => array( 'analog','fresh','luxury','unique' ),
    'product_type' => 'simple',
));

$product_analog_numeral_id = td_demo_content::add_product( array(
    'title' => 'Analog Numeral',
    'file' => 'product_default.txt',
    'product_attributes' => array(
        array(
            'id' => $p_att_pa_sws_size_id,
            'name' => 'pa_sws_size',
            'value' => '',
            'position' => '0',
            'is_visible' => '1',
            'is_variation' => '1',
            'is_taxonomy' => '1',
            'terms' => array( 'l','m','s','xl' )
        ),
        array(
            'id' => $p_att_pa_sws_color_id,
            'name' => 'pa_sws_color',
            'value' => '',
            'position' => '1',
            'is_visible' => '1',
            'is_variation' => '1',
            'is_taxonomy' => '1',
            'terms' => array( 'black','navy-blue','white' )
        ),
    ),
    'product_sku' => 'S3456',
    'product_image_td_id' => 'td_pic_3',
    //'product_image_gallery_td_ids' => array( 'tdw_pic_1', 'tdw_pic_2', 'tdw_pic_3', 'tdw_pic_4', 'tdw_pic_5', ),
    'product_categories' => array( $p_cat_mens_id,$p_cat_watches_id ),
    'product_tags' => array( 'analog','fresh','luxury','unique' ),
    'product_type' => 'variable',
));


/*  ----------------------------------------------------------------------------
	MENUS
*/
$menu_td_demo_footer_menu_id = td_demo_menus::create_menu('td-demo-footer-menu', '');


/*  ----------------------------------------------------------------------------
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_link(array(
    'title' => 'Contact',
    'add_to_menu_id' => $menu_td_demo_footer_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_link(array(
    'title' => 'About',
    'add_to_menu_id' => $menu_td_demo_footer_menu_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_page(array(
    'title' => 'Blog',
    'add_to_menu_id' => $menu_td_demo_footer_menu_id,
    'page_id' => $page_blog_id,
    'parent_id' => ''
));

$menu_td_demo_footer_menu_extra_id = td_demo_menus::create_menu('td-demo-footer-menu-extra', '');


/*  ----------------------------------------------------------------------------
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_link(array(
    'title' => 'FAQs',
    'add_to_menu_id' => $menu_td_demo_footer_menu_extra_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_link(array(
    'title' => 'Shipping',
    'add_to_menu_id' => $menu_td_demo_footer_menu_extra_id,
    'url' => '#',
    'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_link(array(
    'title' => 'Legal & Privacy',
    'add_to_menu_id' => $menu_td_demo_footer_menu_extra_id,
    'url' => '#',
    'parent_id' => ''
));


/*  ----------------------------------------------------------------------------
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_page(array(
    'title' => 'Home',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'page_id' => $page_home_id,
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_product_cat(array(
    'title' => 'Men\'s',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'p_cat_id' => $p_cat_mens_id,
    'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_product_cat(array(
    'title' => 'Women\'s',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'p_cat_id' => $p_cat_womens_id,
    'parent_id' => ''
));


/*  ----------------------------------------------------------------------------
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_page(array(
    'title' => 'Blog',
    'add_to_menu_id' => $menu_td_header_menu_extra_id,
    'page_id' => $page_blog_id,
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_category(array(
    'title' => 'Buying Advice',
    'add_to_menu_id' => $menu_td_header_menu_extra_id,
    'category_id' => $cat_buying_advice_id,
    'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_category(array(
    'title' => 'Trends',
    'add_to_menu_id' => $menu_td_header_menu_extra_id,
    'category_id' => $cat_trends_id,
    'parent_id' => ''
));


/*  ----------------------------------------------------------------------------
	CLOUD TEMPLATES
*/
$template_header_template_watches_id = td_demo_content::add_cloud_template(array(
    'title' => 'Header Template - Watches',
    'file' => 'header_cloud_template.txt',
    'template_type' => 'header',
));
td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_watches_id);

$template_404_template_watches_id = td_demo_content::add_cloud_template(array(
    'title' => '404 Template - Watches',
    'file' => '404_cloud_template.txt',
    'template_type' => '404',
    'header_template_id' => $template_header_blog_template_watches_id
));
td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_watches_id);


$template_search_template_watches_id = td_demo_content::add_cloud_template(array(
    'title' => 'Search Template - Watches',
    'file' => 'search_cloud_template.txt',
    'template_type' => 'search',
    'header_template_id' => $template_header_blog_template_watches_id
));
td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_watches_id);


$template_date_template_watches_id = td_demo_content::add_cloud_template(array(
    'title' => 'Date Template - Watches',
    'file' => 'date_cloud_template.txt',
    'template_type' => 'date',
    'header_template_id' => $template_header_blog_template_watches_id
));
td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_watches_id);


$template_tag_template_watches_id = td_demo_content::add_cloud_template(array(
    'title' => 'Tag Template - Watches',
    'file' => 'tag_cloud_template.txt',
    'template_type' => 'tag',
    'header_template_id' => $template_header_blog_template_watches_id
));
td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_watches_id);


$template_category_template_watches_id = td_demo_content::add_cloud_template(array(
    'title' => 'Category Template - Watches',
    'file' => 'cat_cloud_template.txt',
    'template_type' => 'category',
    'header_template_id' => $template_header_blog_template_watches_id
));
td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_watches_id);


$template_single_post_template_watches_id = td_demo_content::add_cloud_template(array(
    'title' => 'Single Post Template - Watches',
    'file' => 'post_cloud_template.txt',
    'template_type' => 'single',
    'header_template_id' => $template_header_blog_template_watches_id
));
td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_post_template_watches_id);


$template_woo_shop_base_template_watches_id = td_demo_content::add_cloud_template(array(
    'title' => 'Woo Shop Base Template - Watches',
    'file' => 'woo_shop_base_cloud_template.txt',
    'template_type' => 'woo_shop_base',
));
td_demo_misc::update_global_woo_shop_base_template( 'tdb_template_' . $template_woo_shop_base_template_watches_id);


$template_footer_template_watches_id = td_demo_content::add_cloud_template(array(
    'title' => 'Footer Template - Watches',
    'file' => 'footer_cloud_template.txt',
    'template_type' => 'footer',
));
td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_watches_id);


$template_woo_search_archive_template_watches_id = td_demo_content::add_cloud_template(array(
    'title' => 'Woo Search Archive Template - Watches',
    'file' => 'woo_search_archive_cloud_template.txt',
    'template_type' => 'woo_search_archive',
));
td_demo_misc::update_global_woo_search_archive_template( 'tdb_template_' . $template_woo_search_archive_template_watches_id);


$template_woo_archive_template_watches_id = td_demo_content::add_cloud_template(array(
    'title' => 'Woo Archive Template - Watches',
    'file' => 'woo_archive_cloud_template.txt',
    'template_type' => 'woo_archive',
));
td_demo_misc::update_global_woo_archive_template( 'tdb_template_' . $template_woo_archive_template_watches_id);


$template_woo_product_template_watches_id = td_demo_content::add_cloud_template(array(
    'title' => 'Woo Product Template - Watches',
    'file' => 'woo_product_cloud_template.txt',
    'template_type' => 'woo_product',
));
td_demo_misc::update_global_woo_product_template( 'tdb_template_' . $template_woo_product_template_watches_id);



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
