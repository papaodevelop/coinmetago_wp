<?php 



/*  ---------------------------------------------------------------------------- 
	CATEGORIES
*/
$cat_art_id = td_demo_category::add_category(array(
	'category_name' => 'Art',
	'parent_id' => 0,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => 'The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted.',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_indications_id = td_demo_category::add_category(array(
	'category_name' => 'Indications',
	'parent_id' => 0,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => 'The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted.',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_museums_id = td_demo_category::add_category(array(
	'category_name' => 'Museums',
	'parent_id' => 0,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => 'The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted.',
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
	'description' => 'The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted.',
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
	POSTS
*/
$post_td_post_contemporary_art_and_papier_mache_in_a_unique_form_id = td_demo_content::add_post(array(
	'title' => 'Contemporary Art and Papier Mache in a Unique Form',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_art_id,$cat_indications_id,$cat_museums_id,$cat_news_id,),
));

$post_td_post_roman_empire_buildings_and_structure_why_it_prospered_id = td_demo_content::add_post(array(
	'title' => 'Roman Empire Buildings and Structure: Why it Prospered',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_art_id,$cat_indications_id,$cat_museums_id,$cat_news_id,),
));

$post_td_post_art_supplies_on_the_cheap_end_for_any_type_of_budget_id = td_demo_content::add_post(array(
	'title' => 'Art Supplies on the Cheap End for Any Type of Budget',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_art_id,$cat_indications_id,$cat_museums_id,$cat_news_id,),
));

$post_td_post_ballet_dancing_throughout_the_decades_and_how_its_changed_id = td_demo_content::add_post(array(
	'title' => 'Ballet Dancing Throughout the Decades and How it\'s Changed',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_art_id,$cat_indications_id,$cat_museums_id,$cat_news_id,),
));

$post_td_post_safety_tips_for_enjoying_a_trip_to_your_local_museum_in_2021_id = td_demo_content::add_post(array(
	'title' => 'Safety Tips for Enjoying a Trip to your Local Museum in 2021',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_art_id,$cat_indications_id,$cat_museums_id,$cat_news_id,),
));


/*  ---------------------------------------------------------------------------- 
	PAGES
*/
$page_shop_id = td_demo_content::add_page(array(
	'title' => 'Shop',
	'file' => 'shop.txt',
));

$page_basket_id = td_demo_content::add_page(array(
	'title' => 'Basket',
	'file' => 'basket.txt',
));

$page_checkout_id = td_demo_content::add_page(array(
	'title' => 'Checkout',
	'file' => 'checkout.txt',
));

$page_my_account_id = td_demo_content::add_page(array(
	'title' => 'My account',
	'file' => 'my_account.txt',
));

$page_homepage_id = td_demo_content::add_page(array(
	'title' => 'Homepage',
	'file' => 'homepage.txt',
	'homepage' => true,
));


/*  ---------------------------------------------------------------------------- 
	PRODUCT CATEGORIES
*/

$p_cat_landscapes_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Landscapes',
	'parent_id' => 0,
	'description' => '',
));

$p_cat_lifestyle_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Lifestyle',
	'parent_id' => 0,
	'description' => '',
));

$p_cat_painting_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Painting',
	'parent_id' => 0,
	'description' => '',
));

$p_cat_portraits_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Portraits',
	'parent_id' => 0,
	'description' => '',
));


/*  ---------------------------------------------------------------------------- 
	PRODUCT ATTRIBUTES
*/
$p_att_pa_artist_id = td_woo_demo_product_attribute::add_woo_attribute( array(
	'attribute_name' => 'Artist',
	'attribute_slug' => 'pa_artist',
	'attribute_type' => 'select',
	'attribute_terms' => array(
		'Albert Bierstadt','Alfred Stevens','Anders Zorn','Canaletto (Giovanni Antonio Canal)','Caspar David Friedrich','Charles Cromwell Ingham','Eduard Gaertner','Franz Xaver Winterhalter','Frederic','George Inness','George Romney','Giovanni Paolo Panini','Gustave Caillebotte','Henry Lerolle','James Tissot','Jean Auguste Dominique Ingres','Jean Leon Gerome','Johan Christian Dahl','John Henry Twachtman','John White Alexander','Joseph Fagnani','Lord Leighton','Pierre Auguste Cot','Samuel F. B. Morse','Sir Thomas Lawrence','Vincent van Gogh','William Trost Richards','Winslow Homer'
	), 
	'order_by' => 'name',
	'has_archives' => false
));

$p_att_pa_date_id = td_woo_demo_product_attribute::add_woo_attribute( array(
	'attribute_name' => 'Date',
	'attribute_slug' => 'pa_date',
	'attribute_type' => 'select',
	'attribute_terms' => array(
		'1730s','1757','1776-1778','1790','1824','1824-1825','1825-1830','1831','1836-1837','1846','1851-1853','1854','1861','1868-1869','1869','1874','1875','1880','1885','1889','1893','1894','1894-1895','1895','1899','1911','Unknown'
	), 
	'order_by' => 'name_num',
	'has_archives' => false
));

$p_att_pa_origin_id = td_woo_demo_product_attribute::add_woo_attribute( array(
	'attribute_name' => 'Origin',
	'attribute_slug' => 'pa_origin',
	'attribute_type' => 'select',
	'attribute_terms' => array(
		'Belgium','France','Germany','Italy','Netherlands','Sweden','UK','Unknown','USA'
	), 
	'order_by' => 'name',
	'has_archives' => false
));

$p_att_pa_type_of_media_id = td_woo_demo_product_attribute::add_woo_attribute( array(
	'attribute_name' => 'Type of media',
	'attribute_slug' => 'pa_type-of-media',
	'attribute_type' => 'select',
	'attribute_terms' => array(
		'Painting on canvas','Watercolors on Paper'
	), 
	'order_by' => 'menu_order',
	'has_archives' => false
));


/*  ---------------------------------------------------------------------------- 
	PRODUCTS
*/
$product_elizabeth_farren_id = td_demo_content::add_product( array( 
	'title' => 'Elizabeth Farren, later Countess of Derby',
	'file' => 'product_default.txt',
	'product_sku' => 'KDO-35667',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_origin_id,
			'name' => 'pa_origin',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'uk' )
		), 
		array(
			'id' => $p_att_pa_date_id,
			'name' => 'pa_date',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1790' )
		), 
		array(
			'id' => $p_att_pa_artist_id,
			'name' => 'pa_artist',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'sir-thomas-lawrence' )
		), 
		array(
			'id' => $p_att_pa_type_of_media_id,
			'name' => 'pa_type-of-media',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'painting-on-canvas' )
		), 
	), 
	'product_price' => '35000',
	'product_image_td_id' => 'td_pic_p_1',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_lifestyle_id,$p_cat_painting_id,$p_cat_portraits_id ),
	'product_type' => 'simple',
));

$product_princesse_de_broglie_id = td_demo_content::add_product( array( 
	'title' => 'Princesse de Broglie',
	'file' => 'product_default.txt',
	'product_sku' => 'JFH23-935',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_origin_id,
			'name' => 'pa_origin',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'france' )
		), 
		array(
			'id' => $p_att_pa_date_id,
			'name' => 'pa_date',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1851-1853' )
		), 
		array(
			'id' => $p_att_pa_artist_id,
			'name' => 'pa_artist',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'jean-auguste-dominique-ingres' )
		), 
		array(
			'id' => $p_att_pa_type_of_media_id,
			'name' => 'pa_type-of-media',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'painting-on-canvas' )
		), 
	), 
	'product_price' => '78000',
	'product_image_td_id' => 'td_pic_p_2',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_lifestyle_id,$p_cat_painting_id,$p_cat_portraits_id ),
	'product_type' => 'simple',
));

$product_the_organ_rehearsal_id = td_demo_content::add_product( array( 
	'title' => 'The Organ Rehearsal',
	'file' => 'product_default.txt',
	'product_sku' => 'FHM-3526',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_origin_id,
			'name' => 'pa_origin',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'france' )
		), 
		array(
			'id' => $p_att_pa_date_id,
			'name' => 'pa_date',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1885' )
		), 
		array(
			'id' => $p_att_pa_artist_id,
			'name' => 'pa_artist',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'henry-lerolle' )
		), 
		array(
			'id' => $p_att_pa_type_of_media_id,
			'name' => 'pa_type-of-media',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'painting-on-canvas' )
		), 
	), 
	'product_price' => '38000',
	'product_image_td_id' => 'td_pic_p_3',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_lifestyle_id,$p_cat_painting_id ),
	'product_type' => 'simple',
));

$product_the_ring_id = td_demo_content::add_product( array( 
	'title' => 'The Ring',
	'file' => 'product_default.txt',
	'product_sku' => 'BRY-24566',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_origin_id,
			'name' => 'pa_origin',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'unknown' )
		), 
		array(
			'id' => $p_att_pa_date_id,
			'name' => 'pa_date',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1911' )
		), 
		array(
			'id' => $p_att_pa_artist_id,
			'name' => 'pa_artist',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'john-white-alexander' )
		), 
		array(
			'id' => $p_att_pa_type_of_media_id,
			'name' => 'pa_type-of-media',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'painting-on-canvas' )
		), 
	), 
	'product_price' => '35000',
	'product_image_td_id' => 'td_pic_p_4',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_lifestyle_id,$p_cat_painting_id ),
	'product_type' => 'simple',
));

$product_the_storm_id = td_demo_content::add_product( array( 
	'title' => 'The Storm',
	'file' => 'product_default.txt',
	'product_sku' => 'YTD-35367',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_origin_id,
			'name' => 'pa_origin',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'france' )
		), 
		array(
			'id' => $p_att_pa_date_id,
			'name' => 'pa_date',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1880' )
		), 
		array(
			'id' => $p_att_pa_artist_id,
			'name' => 'pa_artist',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'pierre-auguste-cot' )
		), 
		array(
			'id' => $p_att_pa_type_of_media_id,
			'name' => 'pa_type-of-media',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'painting-on-canvas' )
		), 
	), 
	'product_price' => '85000',
	'product_image_td_id' => 'td_pic_p_5',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_lifestyle_id,$p_cat_painting_id ),
	'product_type' => 'simple',
));

$product_chrysanthemums_in_the_garden_at_petit_gennevilliers_id = td_demo_content::add_product( array( 
	'title' => 'Chrysanthemums in the Garden at Petit-Gennevilliers',
	'file' => 'product_default.txt',
	'product_sku' => 'BERY-52667',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_origin_id,
			'name' => 'pa_origin',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'france' )
		), 
		array(
			'id' => $p_att_pa_date_id,
			'name' => 'pa_date',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1893' )
		), 
		array(
			'id' => $p_att_pa_artist_id,
			'name' => 'pa_artist',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'gustave-caillebotte' )
		), 
		array(
			'id' => $p_att_pa_type_of_media_id,
			'name' => 'pa_type-of-media',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'painting-on-canvas' )
		), 
	), 
	'product_price' => '35000',
	'product_image_td_id' => 'td_pic_p_1',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_painting_id ),
	'product_type' => 'simple',
));

$product_mrs_charles_frederick_id = td_demo_content::add_product( array( 
	'title' => 'Mrs. Charles Frederick',
	'file' => 'product_default.txt',
	'product_sku' => 'SGHL-2436',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_origin_id,
			'name' => 'pa_origin',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'uk' )
		), 
		array(
			'id' => $p_att_pa_date_id,
			'name' => 'pa_date',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'unknown' )
		), 
		array(
			'id' => $p_att_pa_artist_id,
			'name' => 'pa_artist',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'george-romney' )
		), 
		array(
			'id' => $p_att_pa_type_of_media_id,
			'name' => 'pa_type-of-media',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'painting-on-canvas' )
		), 
	), 
	'product_price' => '65000',
	'product_image_td_id' => 'td_pic_p_2',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_painting_id,$p_cat_portraits_id ),
	'product_type' => 'simple',
));

$product_campo_santa_maria_zobenigo_venice_id = td_demo_content::add_product( array( 
	'title' => 'Campo Santa Maria Zobenigo, Venice',
	'file' => 'product_default.txt',
	'product_sku' => 'FLH-6734',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_origin_id,
			'name' => 'pa_origin',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'unknown' )
		), 
		array(
			'id' => $p_att_pa_date_id,
			'name' => 'pa_date',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1730s' )
		), 
		array(
			'id' => $p_att_pa_artist_id,
			'name' => 'pa_artist',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'canaletto-giovanni-antonio-canal' )
		), 
		array(
			'id' => $p_att_pa_type_of_media_id,
			'name' => 'pa_type-of-media',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'painting-on-canvas' )
		), 
	), 
	'product_price' => '68000',
	'product_image_td_id' => 'td_pic_p_3',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_landscapes_id,$p_cat_painting_id ),
	'product_type' => 'simple',
));

$product_an_eruption_of_vesuvius_id = td_demo_content::add_product( array( 
	'title' => 'An Eruption of Vesuvius',
	'file' => 'product_default.txt',
	'product_sku' => 'MGK-3578',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_origin_id,
			'name' => 'pa_origin',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'unknown' )
		), 
		array(
			'id' => $p_att_pa_date_id,
			'name' => 'pa_date',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1824' )
		), 
		array(
			'id' => $p_att_pa_artist_id,
			'name' => 'pa_artist',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'johan-christian-dahl' )
		), 
		array(
			'id' => $p_att_pa_type_of_media_id,
			'name' => 'pa_type-of-media',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'painting-on-canvas' )
		), 
	), 
	'product_price' => '85000',
	'product_image_td_id' => 'td_pic_p_4',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_landscapes_id,$p_cat_painting_id ),
	'product_type' => 'simple',
));

$product_delaware_water_gap_id = td_demo_content::add_product( array( 
	'title' => 'Delaware Water Gap',
	'file' => 'product_default.txt',
	'product_sku' => 'NVIH-2356',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_origin_id,
			'name' => 'pa_origin',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'usa' )
		), 
		array(
			'id' => $p_att_pa_date_id,
			'name' => 'pa_date',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1861' )
		), 
		array(
			'id' => $p_att_pa_artist_id,
			'name' => 'pa_artist',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'george-inness' )
		), 
		array(
			'id' => $p_att_pa_type_of_media_id,
			'name' => 'pa_type-of-media',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'painting-on-canvas' )
		), 
	), 
	'product_price' => '37000',
	'product_image_td_id' => 'td_pic_p_5',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_landscapes_id,$p_cat_painting_id ),
	'product_type' => 'simple',
));

$product_wheat_field_with_cypresses_id = td_demo_content::add_product( array( 
	'title' => 'Wheat Field with Cypresses',
	'file' => 'product_default.txt',
	'product_sku' => 'MVEW-23526',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_origin_id,
			'name' => 'pa_origin',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'netherlands' )
		), 
		array(
			'id' => $p_att_pa_date_id,
			'name' => 'pa_date',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1889' )
		), 
		array(
			'id' => $p_att_pa_artist_id,
			'name' => 'pa_artist',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'vincent-van-gogh' )
		), 
		array(
			'id' => $p_att_pa_type_of_media_id,
			'name' => 'pa_type-of-media',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'painting-on-canvas' )
		), 
	), 
	'product_price' => '89000',
	'product_image_td_id' => 'td_pic_p_1',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_landscapes_id,$p_cat_painting_id ),
	'product_type' => 'simple',
));

$product_modern_rome_id = td_demo_content::add_product( array( 
	'title' => 'Modern Rome',
	'file' => 'product_default.txt',
	'product_sku' => 'SGL-2467',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_origin_id,
			'name' => 'pa_origin',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'italy' )
		), 
		array(
			'id' => $p_att_pa_date_id,
			'name' => 'pa_date',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1757' )
		), 
		array(
			'id' => $p_att_pa_artist_id,
			'name' => 'pa_artist',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'giovanni-paolo-panini' )
		), 
		array(
			'id' => $p_att_pa_type_of_media_id,
			'name' => 'pa_type-of-media',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'painting-on-canvas' )
		), 
	), 
	'product_price' => '75000',
	'product_image_td_id' => 'td_pic_p_2',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_landscapes_id,$p_cat_painting_id ),
	'product_type' => 'simple',
));

$product_parochialstrasse_in_berlin_id = td_demo_content::add_product( array( 
	'title' => 'Parochialstrasse in Berlin',
	'file' => 'product_default.txt',
	'product_sku' => 'HLJE-2545',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_origin_id,
			'name' => 'pa_origin',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'germany' )
		), 
		array(
			'id' => $p_att_pa_date_id,
			'name' => 'pa_date',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1831' )
		), 
		array(
			'id' => $p_att_pa_artist_id,
			'name' => 'pa_artist',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'eduard-gaertner' )
		), 
		array(
			'id' => $p_att_pa_type_of_media_id,
			'name' => 'pa_type-of-media',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'painting-on-canvas' )
		), 
	), 
	'product_price' => '45000',
	'product_image_td_id' => 'td_pic_p_3',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_landscapes_id,$p_cat_lifestyle_id,$p_cat_painting_id ),
	'product_type' => 'simple',
));

$product_susan_walker_morse_id = td_demo_content::add_product( array( 
	'title' => 'Susan Walker Morse',
	'file' => 'product_default.txt',
	'product_sku' => 'VMH-2357',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_origin_id,
			'name' => 'pa_origin',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'usa' )
		), 
		array(
			'id' => $p_att_pa_date_id,
			'name' => 'pa_date',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1836-1837' )
		), 
		array(
			'id' => $p_att_pa_artist_id,
			'name' => 'pa_artist',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'samuel-f-b-morse' )
		), 
		array(
			'id' => $p_att_pa_type_of_media_id,
			'name' => 'pa_type-of-media',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'painting-on-canvas' )
		), 
	), 
	'product_price' => '78000',
	'product_image_td_id' => 'td_pic_p_4',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_lifestyle_id,$p_cat_painting_id,$p_cat_portraits_id ),
	'product_type' => 'simple',
));

$product_sunrise_on_the_matterhorn_id = td_demo_content::add_product( array( 
	'title' => 'Sunrise on the Matterhorn',
	'file' => 'product_default.txt',
	'product_sku' => 'KJD-6783',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_origin_id,
			'name' => 'pa_origin',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'usa' )
		), 
		array(
			'id' => $p_att_pa_date_id,
			'name' => 'pa_date',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1875' )
		), 
		array(
			'id' => $p_att_pa_artist_id,
			'name' => 'pa_artist',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'albert-bierstadt' )
		), 
		array(
			'id' => $p_att_pa_type_of_media_id,
			'name' => 'pa_type-of-media',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'painting-on-canvas' )
		), 
	), 
	'product_price' => '35000',
	'product_image_td_id' => 'td_pic_p_5',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_landscapes_id,$p_cat_painting_id ),
	'product_type' => 'simple',
));

$product_frieda_schiff_id = td_demo_content::add_product( array( 
	'title' => 'Frieda Schiff',
	'file' => 'product_default.txt',
	'product_sku' => 'NSK-3578',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_origin_id,
			'name' => 'pa_origin',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'sweden' )
		), 
		array(
			'id' => $p_att_pa_date_id,
			'name' => 'pa_date',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1894' )
		), 
		array(
			'id' => $p_att_pa_artist_id,
			'name' => 'pa_artist',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'anders-zorn' )
		), 
		array(
			'id' => $p_att_pa_type_of_media_id,
			'name' => 'pa_type-of-media',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'painting-on-canvas' )
		), 
	), 
	'product_price' => '65800',
	'product_image_td_id' => 'td_pic_p_1',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_painting_id,$p_cat_portraits_id ),
	'product_type' => 'simple',
));

$product_lachrymae_id = td_demo_content::add_product( array( 
	'title' => 'Lachrymae',
	'file' => 'product_default.txt',
	'product_sku' => 'MBLW-9567',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_origin_id,
			'name' => 'pa_origin',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'uk' )
		), 
		array(
			'id' => $p_att_pa_date_id,
			'name' => 'pa_date',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1894-1895' )
		), 
		array(
			'id' => $p_att_pa_artist_id,
			'name' => 'pa_artist',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'frederic','lord-leighton' )
		), 
		array(
			'id' => $p_att_pa_type_of_media_id,
			'name' => 'pa_type-of-media',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'painting-on-canvas' )
		), 
	), 
	'product_price' => '85000',
	'product_image_td_id' => 'td_pic_p_2',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_lifestyle_id,$p_cat_painting_id ),
	'product_type' => 'simple',
));

$product_lady_maria_conyngham_id = td_demo_content::add_product( array( 
	'title' => 'Lady Maria Conyngham',
	'file' => 'product_default.txt',
	'product_sku' => 'MBI-7825',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_origin_id,
			'name' => 'pa_origin',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'uk' )
		), 
		array(
			'id' => $p_att_pa_date_id,
			'name' => 'pa_date',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1824-1825' )
		), 
		array(
			'id' => $p_att_pa_artist_id,
			'name' => 'pa_artist',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'sir-thomas-lawrence' )
		), 
		array(
			'id' => $p_att_pa_type_of_media_id,
			'name' => 'pa_type-of-media',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'painting-on-canvas' )
		), 
	), 
	'product_price' => '74000',
	'product_image_td_id' => 'td_pic_p_3',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_lifestyle_id,$p_cat_painting_id,$p_cat_portraits_id ),
	'product_type' => 'simple',
));

$product_polyhymnia_id = td_demo_content::add_product( array( 
	'title' => 'Polyhymnia',
	'file' => 'product_default.txt',
	'product_sku' => 'GHK-9274',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_origin_id,
			'name' => 'pa_origin',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'unknown' )
		), 
		array(
			'id' => $p_att_pa_date_id,
			'name' => 'pa_date',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1869' )
		), 
		array(
			'id' => $p_att_pa_artist_id,
			'name' => 'pa_artist',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'joseph-fagnani' )
		), 
		array(
			'id' => $p_att_pa_type_of_media_id,
			'name' => 'pa_type-of-media',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'painting-on-canvas' )
		), 
	), 
	'product_price' => '56899',
	'product_image_td_id' => 'td_pic_p_4',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_painting_id,$p_cat_portraits_id ),
	'product_type' => 'simple',
));

$product_arques_la_bataille_id = td_demo_content::add_product( array( 
	'title' => 'Arques-la-Bataille',
	'file' => 'product_default.txt',
	'product_sku' => 'VHW0-4256',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_origin_id,
			'name' => 'pa_origin',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'usa' )
		), 
		array(
			'id' => $p_att_pa_date_id,
			'name' => 'pa_date',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1885' )
		), 
		array(
			'id' => $p_att_pa_artist_id,
			'name' => 'pa_artist',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'john-henry-twachtman' )
		), 
		array(
			'id' => $p_att_pa_type_of_media_id,
			'name' => 'pa_type-of-media',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'painting-on-canvas' )
		), 
	), 
	'product_price' => '34000',
	'product_image_td_id' => 'td_pic_p_5',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_landscapes_id,$p_cat_painting_id ),
	'product_type' => 'simple',
));

$product_lake_squam_from_red_hill_id = td_demo_content::add_product( array( 
	'title' => 'Lake Squam from Red Hill',
	'file' => 'product_default.txt',
	'product_sku' => 'GHE-23546',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_origin_id,
			'name' => 'pa_origin',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'usa' )
		), 
		array(
			'id' => $p_att_pa_date_id,
			'name' => 'pa_date',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1874' )
		), 
		array(
			'id' => $p_att_pa_artist_id,
			'name' => 'pa_artist',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'william-trost-richards' )
		), 
		array(
			'id' => $p_att_pa_type_of_media_id,
			'name' => 'pa_type-of-media',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'painting-on-canvas' )
		), 
	), 
	'product_price' => '35000',
	'product_image_td_id' => 'td_pic_p_1',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_landscapes_id,$p_cat_painting_id ),
	'product_type' => 'simple',
));

$product_the_flower_girl_id = td_demo_content::add_product( array( 
	'title' => 'The Flower Girl',
	'file' => 'product_default.txt',
	'product_sku' => 'MEW-2352',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_origin_id,
			'name' => 'pa_origin',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'usa' )
		), 
		array(
			'id' => $p_att_pa_date_id,
			'name' => 'pa_date',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1846' )
		), 
		array(
			'id' => $p_att_pa_artist_id,
			'name' => 'pa_artist',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'charles-cromwell-ingham' )
		), 
		array(
			'id' => $p_att_pa_type_of_media_id,
			'name' => 'pa_type-of-media',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'painting-on-canvas' )
		), 
	), 
	'product_price' => '35876',
	'product_image_td_id' => 'td_pic_p_2',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_lifestyle_id,$p_cat_painting_id,$p_cat_portraits_id ),
	'product_type' => 'simple',
));

$product_bashi_bazouk_id = td_demo_content::add_product( array( 
	'title' => 'Bashi Bazouk',
	'file' => 'product_default.txt',
	'product_sku' => 'VEH-24235',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_origin_id,
			'name' => 'pa_origin',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'france' )
		), 
		array(
			'id' => $p_att_pa_date_id,
			'name' => 'pa_date',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1868-1869' )
		), 
		array(
			'id' => $p_att_pa_artist_id,
			'name' => 'pa_artist',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'jean-leon-gerome' )
		), 
		array(
			'id' => $p_att_pa_type_of_media_id,
			'name' => 'pa_type-of-media',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'painting-on-canvas' )
		), 
	), 
	'product_price' => '45000',
	'product_image_td_id' => 'td_pic_p_3',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_painting_id,$p_cat_portraits_id ),
	'product_type' => 'simple',
));

$product_flower_garden_and_bungalow_bermuda_id = td_demo_content::add_product( array( 
	'title' => 'Flower Garden and Bungalow, Bermuda',
	'file' => 'product_default.txt',
	'product_sku' => 'JHE-23456',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_origin_id,
			'name' => 'pa_origin',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'usa' )
		), 
		array(
			'id' => $p_att_pa_date_id,
			'name' => 'pa_date',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1899' )
		), 
		array(
			'id' => $p_att_pa_artist_id,
			'name' => 'pa_artist',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'winslow-homer' )
		), 
		array(
			'id' => $p_att_pa_type_of_media_id,
			'name' => 'pa_type-of-media',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'watercolors-on-paper' )
		), 
	), 
	'product_price' => '12000',
	'product_image_td_id' => 'td_pic_p_4',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_landscapes_id,$p_cat_painting_id ),
	'product_type' => 'simple',
));

$product_the_empress_eugenie_id = td_demo_content::add_product( array( 
	'title' => 'The Empress Eugenie',
	'file' => 'product_default.txt',
	'product_sku' => '555-846dFW',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_origin_id,
			'name' => 'pa_origin',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'germany' )
		), 
		array(
			'id' => $p_att_pa_date_id,
			'name' => 'pa_date',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1854' )
		), 
		array(
			'id' => $p_att_pa_artist_id,
			'name' => 'pa_artist',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'franz-xaver-winterhalter' )
		), 
		array(
			'id' => $p_att_pa_type_of_media_id,
			'name' => 'pa_type-of-media',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'painting-on-canvas' )
		), 
	), 
	'product_price' => '35000',
	'product_image_td_id' => 'td_pic_p_5',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_lifestyle_id,$p_cat_painting_id,$p_cat_portraits_id ),
	'product_type' => 'simple',
));

$product_lady_elizabeth_stanley_id = td_demo_content::add_product( array( 
	'title' => 'Lady Elizabeth Stanley',
	'file' => 'product_default.txt',
	'product_sku' => '4677-225GH',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_origin_id,
			'name' => 'pa_origin',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'uk' )
		), 
		array(
			'id' => $p_att_pa_date_id,
			'name' => 'pa_date',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1776-1778' )
		), 
		array(
			'id' => $p_att_pa_artist_id,
			'name' => 'pa_artist',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'george-romney' )
		), 
		array(
			'id' => $p_att_pa_type_of_media_id,
			'name' => 'pa_type-of-media',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'painting-on-canvas' )
		), 
	), 
	'product_price' => '65889',
	'product_image_td_id' => 'td_pic_p_1',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_painting_id,$p_cat_portraits_id ),
	'product_type' => 'simple',
));

$product_two_men_contemplating_the_moon_id = td_demo_content::add_product( array( 
	'title' => 'Two Men Contemplating the Moon',
	'file' => 'product_default.txt',
	'product_sku' => 'LKS-23572',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_origin_id,
			'name' => 'pa_origin',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'germany' )
		), 
		array(
			'id' => $p_att_pa_date_id,
			'name' => 'pa_date',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1825-1830' )
		), 
		array(
			'id' => $p_att_pa_artist_id,
			'name' => 'pa_artist',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'caspar-david-friedrich' )
		), 
		array(
			'id' => $p_att_pa_type_of_media_id,
			'name' => 'pa_type-of-media',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'painting-on-canvas' )
		), 
	), 
	'product_price' => '12000',
	'product_image_td_id' => 'td_pic_p_2',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_landscapes_id,$p_cat_lifestyle_id,$p_cat_painting_id ),
	'product_type' => 'simple',
));

$product_spring_morning_id = td_demo_content::add_product( array( 
	'title' => 'Spring Morning',
	'file' => 'product_default.txt',
	'product_sku' => 'HES-24156',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_origin_id,
			'name' => 'pa_origin',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'france' )
		), 
		array(
			'id' => $p_att_pa_date_id,
			'name' => 'pa_date',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1875' )
		), 
		array(
			'id' => $p_att_pa_artist_id,
			'name' => 'pa_artist',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'james-tissot' )
		), 
		array(
			'id' => $p_att_pa_type_of_media_id,
			'name' => 'pa_type-of-media',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'painting-on-canvas' )
		), 
	), 
	'product_price' => '48600',
	'product_image_td_id' => 'td_pic_p_3',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_lifestyle_id,$p_cat_painting_id,$p_cat_portraits_id ),
	'product_type' => 'simple',
));

$product_repose_id = td_demo_content::add_product( array( 
	'title' => 'Repose',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_origin_id,
			'name' => 'pa_origin',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'belgium' )
		), 
		array(
			'id' => $p_att_pa_date_id,
			'name' => 'pa_date',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1895' )
		), 
		array(
			'id' => $p_att_pa_artist_id,
			'name' => 'pa_artist',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'john-white-alexander' )
		), 
		array(
			'id' => $p_att_pa_type_of_media_id,
			'name' => 'pa_type-of-media',
			'value' => '',
			'position' => '3',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'painting-on-canvas' )
		), 
	), 
	'product_price' => '14556',
	'product_sku' => 'DFG-35667',
	'product_image_td_id' => 'td_pic_p_4',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_lifestyle_id,$p_cat_painting_id ),
	'product_type' => 'simple',
));

$product_after_the_ball_id = td_demo_content::add_product( array( 
	'title' => 'After the Ball',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_origin_id,
			'name' => 'pa_origin',
			'value' => '',
			'position' => '4',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'belgium' )
		), 
		array(
			'id' => $p_att_pa_date_id,
			'name' => 'pa_date',
			'value' => '',
			'position' => '5',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( '1874' )
		), 
		array(
			'id' => $p_att_pa_artist_id,
			'name' => 'pa_artist',
			'value' => '',
			'position' => '6',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'alfred-stevens' )
		), 
		array(
			'id' => $p_att_pa_type_of_media_id,
			'name' => 'pa_type-of-media',
			'value' => '',
			'position' => '7',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'painting-on-canvas' )
		), 
	), 
	'product_price' => '9500',
	'product_sku' => 'KGJ-34678',
	'product_image_td_id' => 'td_pic_p_5',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_lifestyle_id,$p_cat_painting_id ),
	'product_type' => 'simple',
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

$menu_item_1_id = td_demo_menus::add_product_cat(array(
	'title' => 'Painting',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'p_cat_id' => $p_cat_painting_id,
	'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_product_cat(array(
	'title' => 'Lifestyle',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'p_cat_id' => $p_cat_lifestyle_id,
	'parent_id' => $menu_item_1_id
));

$menu_item_3_id = td_demo_menus::add_product_cat(array(
	'title' => 'Landscapes',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'p_cat_id' => $p_cat_landscapes_id,
	'parent_id' => $menu_item_1_id
));

$menu_item_4_id = td_demo_menus::add_product_cat(array(
	'title' => 'Portraits',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'p_cat_id' => $p_cat_portraits_id,
	'parent_id' => $menu_item_1_id
));

$menu_item_5_id = td_demo_menus::add_mega_menu(array(
	'title' => 'News',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_news_id,
	'parent_id' => ''
), true);

$menu_td_demo_header_menu_extra_id = td_demo_menus::create_menu('td-demo-header-menu-extra', ''); 


/*  ---------------------------------------------------------------------------- 
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_product_cat(array(
	'title' => 'Painting',
	'add_to_menu_id' => $menu_td_demo_header_menu_extra_id,
	'p_cat_id' => $p_cat_painting_id,
	'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_product_cat(array(
	'title' => 'Landscapes',
	'add_to_menu_id' => $menu_td_demo_header_menu_extra_id,
	'p_cat_id' => $p_cat_landscapes_id,
	'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_product_cat(array(
	'title' => 'Lifestyle',
	'add_to_menu_id' => $menu_td_demo_header_menu_extra_id,
	'p_cat_id' => $p_cat_lifestyle_id,
	'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_product_cat(array(
	'title' => 'Portraits',
	'add_to_menu_id' => $menu_td_demo_header_menu_extra_id,
	'p_cat_id' => $p_cat_portraits_id,
	'parent_id' => ''
));


/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/
$template_date_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Apocryph PRO - Date Template',
	'file' => 'date_cloud_template.txt',
	'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_id);


$template_tag_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Apocryph PRO - Tag Template',
	'file' => 'tag_cloud_template.txt',
	'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_id);


$template_category_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Apocryph PRO - Category Template',
	'file' => 'cat_cloud_template.txt',
	'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_id);


$template_header_template_general_id = td_demo_content::add_cloud_template(array(
	'title' => 'Apocryph PRO - General Header Template',
	'file' => 'header_cloud_template_general.txt',
	'template_type' => 'header',
));

$template_author_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Apocryph PRO - Author Template',
	'file' => 'author_cloud_template.txt',
	'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_id);


$template_single_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Apocryph PRO - Single Template',
	'file' => 'post_cloud_template.txt',
	'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_id);


$template_404_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Apocryph PRO - 404 Template',
	'file' => '404_cloud_template.txt',
	'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_id);


$template_search_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Apocryph PRO - Search Template',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_id);


$template_woo_search_archive_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Apocryph PRO - Woo Search Archive Template',
	'file' => 'woo_search_archive_cloud_template.txt',
	'template_type' => 'woo_search_archive',
));

td_demo_misc::update_global_woo_search_archive_template( 'tdb_template_' . $template_woo_search_archive_template_id);


$template_woo_product_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Apocryph PRO - Woo Product Template',
	'file' => 'woo_product_cloud_template.txt',
	'template_type' => 'woo_product',
));

td_demo_misc::update_global_woo_product_template( 'tdb_template_' . $template_woo_product_template_id);


$template_woo_archive_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Apocryph PRO - Woo Archive Template',
	'file' => 'woo_archive_cloud_template.txt',
	'template_type' => 'woo_archive',
));

td_demo_misc::update_global_woo_archive_template( 'tdb_template_' . $template_woo_archive_template_id);


$template_woo_shop_base_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Apocryph PRO - Woo Shop Base Template',
	'file' => 'woo_shop_base_cloud_template.txt',
	'template_type' => 'woo_shop_base',
));

td_demo_misc::update_global_woo_shop_base_template( 'tdb_template_' . $template_woo_shop_base_template_id);


$template_footer_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Apocryph PRO - Footer Template',
	'file' => 'footer_cloud_template.txt',
	'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_id);


$template_header_template_shop_id = td_demo_content::add_cloud_template(array(
	'title' => 'Apocryph PRO - Shop Header Template',
	'file' => 'header_cloud_template.txt',
	'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_shop_id);


update_post_meta( $template_header_template_shop_id, 'header_mobile_menu_id', $menu_td_demo_header_menu_id);



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
