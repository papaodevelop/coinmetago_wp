<?php 



/*  ---------------------------------------------------------------------------- 
	CATEGORIES
*/
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
$page_my_favorites_id = td_demo_content::add_page( array(
	'title' => 'My Favorites',
	'file' => 'my_favorites.txt',
	'demo_unique_id' => '4762cc1c8dbf470',
));

$page_home_id = td_demo_content::add_page( array(
	'title' => 'Home',
	'file' => 'home.txt',
	'homepage' => true,
	'demo_unique_id' => '4962cc1c8dc6718',
));

$page_shop_id = td_demo_content::add_page( array(
	'title' => 'Shop',
	'file' => 'shop.txt',
	'demo_unique_id' => '8662cc1c8dcd92d',
));

$page_cart_id = td_demo_content::add_page( array(
	'title' => 'Cart',
	'file' => 'cart.txt',
	'demo_unique_id' => '4262cc1c8dd8f2e',
));

$page_checkout_id = td_demo_content::add_page( array(
	'title' => 'Checkout',
	'file' => 'checkout.txt',
	'demo_unique_id' => '662cc1c8de0292',
));

$page_my_account_id = td_demo_content::add_page( array(
	'title' => 'My account',
	'file' => 'my_account.txt',
	'demo_unique_id' => '4062cc1c8de7413',
));

$page_refund_returns_id = td_demo_content::add_page( array(
	'title' => 'Refund and Returns Policy',
	'file' => 'refund_returns.txt',
	'demo_unique_id' => '462cc1c8dee54b',
));


/*  ---------------------------------------------------------------------------- 
	POSTS
*/
$post_hello_world_id = td_demo_content::add_post( array(
	'title' => 'Hello world!',
	'file' => 'post_default.txt',
	'categories_id_array' => array($cat_uncategorized_id,),
));


/*  ---------------------------------------------------------------------------- 
	PRODUCT CATEGORIES
*/
$p_cat_alba_iulia_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Alba Iulia',
	'parent_id' => 0,
	'description' => '',
));

$p_cat_baia_mare_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Baia Mare',
	'parent_id' => 0,
	'description' => '',
));

$p_cat_bucharest_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Bucharest',
	'parent_id' => 0,
	'description' => '',
));

$p_cat_cluj_napoca_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Cluj-Napoca',
	'parent_id' => 0,
	'description' => '',
));

$p_cat_constanta_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Constanța',
	'parent_id' => 0,
	'description' => '',
));

$p_cat_iasi_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Iași',
	'parent_id' => 0,
	'description' => '',
));

$p_cat_timisoara_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Timișoara',
	'parent_id' => 0,
	'description' => '',
));


/*  ---------------------------------------------------------------------------- 
	PRODUCT ATTRIBUTES
*/
$p_att_pa_food_categories_id = td_woo_demo_product_attribute::add_woo_attribute( array(
	'attribute_name' => 'Food Categories',
	'attribute_slug' => 'pa_food-categories',
	'attribute_type' => 'image',
	'attribute_terms' => array(
		'Desserts','Grill','Main Course','Salads','Sauces','Side dishes','Soups','Starters','Traditional','Vegan'
	), 
	'order_by' => 'menu_order',
	'has_archives' => true
));


/*  ---------------------------------------------------------------------------- 
	PRODUCTS
*/
$product_zacusca_id = td_demo_content::add_product( array( 
	'title' => 'Zacusca',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'starters','traditional' )
		), 
	), 
	'product_price' => '5',
	'product_image_td_id' => 'td_pic_p_1',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_hungarian_goulash_id = td_demo_content::add_product( array( 
	'title' => 'Hungarian Goulash',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'main-course','traditional' )
		), 
	), 
	'product_price' => '35',
	'product_image_td_id' => 'td_pic_p_2',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id ),
	'product_type' => 'simple',
));

$product_ciorba_de_ardei_umpluti_id = td_demo_content::add_product( array( 
	'title' => 'Ciorba de ardei umpluti',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'soups','traditional' )
		), 
	), 
	'product_price' => '20',
	'product_image_td_id' => 'td_pic_p_3',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_soft_cake_with_fruits_id = td_demo_content::add_product( array( 
	'title' => 'Soft Cake with Fruits',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'desserts' )
		), 
	), 
	'product_price' => '12',
	'product_image_td_id' => 'td_pic_p_4',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_slanina_id = td_demo_content::add_product( array( 
	'title' => 'Slanina',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'starters','traditional' )
		), 
	), 
	'product_price' => '11',
	'product_image_td_id' => 'td_pic_p_5',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_gris_id = td_demo_content::add_product( array( 
	'title' => 'Gris',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'desserts','traditional' )
		), 
	), 
	'product_price' => '6',
	'product_image_td_id' => 'td_pic_p_6',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_roasted_pig_id = td_demo_content::add_product( array( 
	'title' => 'Roasted Pig',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'grill','traditional' )
		), 
	), 
	'product_price' => '130',
	'product_image_td_id' => 'td_pic_p_7',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_ciorba_radauteana_id = td_demo_content::add_product( array( 
	'title' => 'Ciorba Radauteana',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'soups','traditional' )
		), 
	), 
	'product_price' => '16',
	'product_image_td_id' => 'td_pic_p_8',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_baia_mare_id,$p_cat_iasi_id ),
	'product_type' => 'simple',
));

$product_carnat_id = td_demo_content::add_product( array( 
	'title' => 'Carnat',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'starters','traditional' )
		), 
	), 
	'product_price' => '22',
	'product_image_td_id' => 'td_pic_p_9',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_pomana_porcului_id = td_demo_content::add_product( array( 
	'title' => 'Pomana Porcului',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'main-course','traditional' )
		), 
	), 
	'product_price' => '56',
	'product_image_td_id' => 'td_pic_p_10',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_mamaliga_id = td_demo_content::add_product( array( 
	'title' => 'Mamaliga',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'desserts','side-dishes','starters','traditional' )
		), 
	), 
	'product_price' => '7',
	'product_image_td_id' => 'td_pic_p_1',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_oriental_salad_id = td_demo_content::add_product( array( 
	'title' => 'Oriental Salad',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'starters','traditional' )
		), 
	), 
	'product_price' => '14',
	'product_image_td_id' => 'td_pic_p_2',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_moldavian_pie_id = td_demo_content::add_product( array( 
	'title' => 'Moldavian Pie',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'starters','traditional' )
		), 
	), 
	'product_price' => '9',
	'product_image_td_id' => 'td_pic_p_3',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_iasi_id ),
	'product_type' => 'simple',
));

$product_mici_id = td_demo_content::add_product( array( 
	'title' => 'Mici',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'grill','traditional' )
		), 
	), 
	'product_price' => '28',
	'product_image_td_id' => 'td_pic_p_4',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_piure_id = td_demo_content::add_product( array( 
	'title' => 'Piure',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'side-dishes' )
		), 
	), 
	'product_price' => '12',
	'product_image_td_id' => 'td_pic_p_5',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_lettuce_soup_id = td_demo_content::add_product( array( 
	'title' => 'Lettuce Soup',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'soups','traditional' )
		), 
	), 
	'product_price' => '10',
	'product_image_td_id' => 'td_pic_p_6',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_pork_stew_id = td_demo_content::add_product( array( 
	'title' => 'Pork Stew',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'main-course' )
		), 
	), 
	'product_price' => '48',
	'product_image_td_id' => 'td_pic_p_7',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_grilled_pork_id = td_demo_content::add_product( array( 
	'title' => 'Grilled Pork',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'grill' )
		), 
	), 
	'product_price' => '45',
	'product_image_td_id' => 'td_pic_p_8',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_gomboti_id = td_demo_content::add_product( array( 
	'title' => 'Gomboti',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'desserts','traditional' )
		), 
	), 
	'product_price' => '22',
	'product_image_td_id' => 'td_pic_p_9',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_cluj_napoca_id ),
	'product_type' => 'simple',
));

$product_gogosi_id = td_demo_content::add_product( array( 
	'title' => 'Gogosi',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'desserts','traditional' )
		), 
	), 
	'product_price' => '13',
	'product_image_td_id' => 'td_pic_p_10',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_garlic_romanian_sauce_id = td_demo_content::add_product( array( 
	'title' => 'Garlic Romanian Sauce',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'sauces','traditional' )
		), 
	), 
	'product_price' => '5',
	'product_image_td_id' => 'td_pic_p_1',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_chiroane_id = td_demo_content::add_product( array( 
	'title' => 'Chiroane',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'main-course','traditional' )
		), 
	), 
	'product_price' => '15',
	'product_image_td_id' => 'td_pic_p_2',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_iasi_id ),
	'product_type' => 'simple',
));

$product_bread_coated_in_egg_id = td_demo_content::add_product( array( 
	'title' => 'Bread Coated in Egg',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'starters','traditional' )
		), 
	), 
	'product_price' => '6',
	'product_image_td_id' => 'td_pic_p_3',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_fried_black_sea_mussels_id = td_demo_content::add_product( array( 
	'title' => 'Fried Black Sea Mussels',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'main-course','traditional' )
		), 
	), 
	'product_price' => '66',
	'product_image_td_id' => 'td_pic_p_4',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_constanta_id ),
	'product_type' => 'simple',
));

$product_eggplants_salad_id = td_demo_content::add_product( array( 
	'title' => 'Eggplants Salad',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'starters','traditional' )
		), 
	), 
	'product_price' => '10',
	'product_image_td_id' => 'td_pic_p_5',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_cremes_id = td_demo_content::add_product( array( 
	'title' => 'Cremes',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'desserts','traditional' )
		), 
	), 
	'product_price' => '16',
	'product_image_td_id' => 'td_pic_p_6',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_chocolate_puffs_id = td_demo_content::add_product( array( 
	'title' => 'Chocolate Puffs',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'desserts','traditional' )
		), 
	), 
	'product_price' => '6',
	'product_image_td_id' => 'td_pic_p_7',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_chicken_with_mushroom_and_potatoes_id = td_demo_content::add_product( array( 
	'title' => 'Chicken with Mushroom and Potatoes',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'main-course' )
		), 
	), 
	'product_price' => '44',
	'product_image_td_id' => 'td_pic_p_8',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_cooked_cabbage_with_pork_ribs_id = td_demo_content::add_product( array( 
	'title' => 'Cooked Cabbage with Pork Ribs',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'main-course','traditional' )
		), 
	), 
	'product_price' => '45',
	'product_image_td_id' => 'td_pic_p_9',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_chocolate_eclair_id = td_demo_content::add_product( array( 
	'title' => 'Chocolate Eclair',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'desserts' )
		), 
	), 
	'product_price' => '6',
	'product_image_td_id' => 'td_pic_p_10',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_chicken_stew_id = td_demo_content::add_product( array( 
	'title' => 'Chicken Stew',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'main-course','traditional' )
		), 
	), 
	'product_price' => '33',
	'product_image_td_id' => 'td_pic_p_1',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_cartabos_id = td_demo_content::add_product( array( 
	'title' => 'Cartabos',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'starters','traditional' )
		), 
	), 
	'product_price' => '7',
	'product_image_td_id' => 'td_pic_p_2',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_carp_roe_salad_id = td_demo_content::add_product( array( 
	'title' => 'Carp Roe Salad',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'starters','traditional' )
		), 
	), 
	'product_price' => '4',
	'product_image_td_id' => 'td_pic_p_3',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_cabbage_salad_id = td_demo_content::add_product( array( 
	'title' => 'Cabbage Salad',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'salads','vegan' )
		), 
	), 
	'product_price' => '5',
	'product_image_td_id' => 'td_pic_p_4',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_buttered_vegetables_id = td_demo_content::add_product( array( 
	'title' => 'Buttered Vegetables',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'side-dishes','traditional' )
		), 
	), 
	'product_price' => '6',
	'product_image_td_id' => 'td_pic_p_5',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_potatoes_with_parsley_leaves_id = td_demo_content::add_product( array( 
	'title' => 'Potatoes with Parsley Leaves',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'side-dishes','traditional' )
		), 
	), 
	'product_price' => '10',
	'product_image_td_id' => 'td_pic_p_6',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_boeuf_salad_id = td_demo_content::add_product( array( 
	'title' => 'Boeuf Salad',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'starters','traditional' )
		), 
	), 
	'product_price' => '9',
	'product_image_td_id' => 'td_pic_p_7',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_beetroot_salad_id = td_demo_content::add_product( array( 
	'title' => 'Beetroot Salad',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'salads','vegan' )
		), 
	), 
	'product_price' => '8',
	'product_image_td_id' => 'td_pic_p_8',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_the_citadel_burger_id = td_demo_content::add_product( array( 
	'title' => 'The Citadel Burger',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'main-course','traditional' )
		), 
	), 
	'product_price' => '38',
	'product_image_td_id' => 'td_pic_p_9',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id ),
	'product_type' => 'simple',
));

$product_beef_burger_id = td_demo_content::add_product( array( 
	'title' => 'Beef Burger',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'main-course' )
		), 
	), 
	'product_price' => '35',
	'product_image_td_id' => 'td_pic_p_10',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_bean_soup_with_smoked_pork_meat_in_bread_id = td_demo_content::add_product( array( 
	'title' => 'Bean Soup with Smoked Pork Meat in Bread',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'soups','traditional' )
		), 
	), 
	'product_price' => '35',
	'product_image_td_id' => 'td_pic_p_1',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_cluj_napoca_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_basmati_rice_id = td_demo_content::add_product( array( 
	'title' => 'Basmati Rice',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'side-dishes','vegan' )
		), 
	), 
	'product_price' => '14',
	'product_image_td_id' => 'td_pic_p_2',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_barbeque_wings_id = td_demo_content::add_product( array( 
	'title' => 'Barbeque Wings',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'grill' )
		), 
	), 
	'product_price' => '20',
	'product_image_td_id' => 'td_pic_p_3',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_barbeque_drumsticks_id = td_demo_content::add_product( array( 
	'title' => 'Barbeque Drumsticks',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'grill' )
		), 
	), 
	'product_price' => '22',
	'product_image_td_id' => 'td_pic_p_4',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_banatean_salami_id = td_demo_content::add_product( array( 
	'title' => 'Banatean Salami',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'starters','traditional' )
		), 
	), 
	'product_price' => '8',
	'product_image_td_id' => 'td_pic_p_5',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_trout_fish_id = td_demo_content::add_product( array( 
	'title' => 'Trout Fish',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'grill','traditional' )
		), 
	), 
	'product_price' => '38',
	'product_image_td_id' => 'td_pic_p_6',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_baked_stuffed_eggplant_id = td_demo_content::add_product( array( 
	'title' => 'Baked Stuffed Eggplant',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'main-course','vegan' )
		), 
	), 
	'product_price' => '14',
	'product_image_td_id' => 'td_pic_p_7',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_baked_rice_pudding_id = td_demo_content::add_product( array( 
	'title' => 'Baked Rice Pudding',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'desserts','traditional' )
		), 
	), 
	'product_price' => '22',
	'product_image_td_id' => 'td_pic_p_8',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_baked_potatoes_id = td_demo_content::add_product( array( 
	'title' => 'Baked Potatoes',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'side-dishes','traditional' )
		), 
	), 
	'product_price' => '13',
	'product_image_td_id' => 'td_pic_p_9',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_baked_pasta_with_tuna_id = td_demo_content::add_product( array( 
	'title' => 'Baked Pasta with Tuna',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'main-course' )
		), 
	), 
	'product_price' => '30',
	'product_image_td_id' => 'td_pic_p_10',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_baked_sweet_oatmeal_pudding_id = td_demo_content::add_product( array( 
	'title' => 'Baked Sweet Oatmeal Pudding',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'desserts','vegan' )
		), 
	), 
	'product_price' => '11',
	'product_image_td_id' => 'td_pic_p_1',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_baked_chicken_drumsticks_id = td_demo_content::add_product( array( 
	'title' => 'Baked Chicken Drumsticks',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'main-course' )
		), 
	), 
	'product_price' => '35',
	'product_image_td_id' => 'td_pic_p_2',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_baked_beans_with_smoked_pork_knuckle_id = td_demo_content::add_product( array( 
	'title' => 'Baked Beans with Smoked Pork Knuckle',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'main-course','traditional' )
		), 
	), 
	'product_price' => '46',
	'product_image_td_id' => 'td_pic_p_3',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_baked_apples_pie_id = td_demo_content::add_product( array( 
	'title' => 'Baked Apples Pie',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'desserts','traditional' )
		), 
	), 
	'product_price' => '15',
	'product_image_td_id' => 'td_pic_p_4',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_cluj_napoca_id ),
	'product_type' => 'simple',
));

$product_assorted_salad_tomatoes_id = td_demo_content::add_product( array( 
	'title' => 'Assorted Salad Tomatoes',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'salads','vegan' )
		), 
	), 
	'product_price' => '8',
	'product_image_td_id' => 'td_pic_p_5',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_assorted_salad_with_dill_id = td_demo_content::add_product( array( 
	'title' => 'Assorted Salad with Dill',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'salads','traditional','vegan' )
		), 
	), 
	'product_price' => '8',
	'product_image_td_id' => 'td_pic_p_6',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_baia_mare_id,$p_cat_cluj_napoca_id,$p_cat_iasi_id ),
	'product_type' => 'simple',
));

$product_assorted_salad_id = td_demo_content::add_product( array( 
	'title' => 'Assorted Salad',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'salads','vegan' )
		), 
	), 
	'product_price' => '8',
	'product_image_td_id' => 'td_pic_p_7',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_sarmale_id = td_demo_content::add_product( array( 
	'title' => 'Sarmale',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'main-course','traditional' )
		), 
	), 
	'product_price' => '25',
	'product_image_td_id' => 'td_pic_p_8',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));

$product_appetizer_cake_id = td_demo_content::add_product( array( 
	'title' => 'Appetizer Cake',
	'file' => 'product_default.txt',
	'product_price' => '10',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_food_categories_id,
			'name' => 'pa_food-categories',
			'value' => '',
			'position' => '0',
			'is_visible' => '1',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'starters' )
		), 
	), 
	'product_image_td_id' => 'td_pic_p_9',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_alba_iulia_id,$p_cat_baia_mare_id,$p_cat_bucharest_id,$p_cat_cluj_napoca_id,$p_cat_constanta_id,$p_cat_iasi_id,$p_cat_timisoara_id ),
	'product_type' => 'simple',
));


/*  ---------------------------------------------------------------------------- 
	MENUS
*/
$menu_td_demo_custom_menu_id = td_demo_menus::create_menu('td-demo-custom-menu', ''); 


/*  ---------------------------------------------------------------------------- 
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_link(array(
	'title' => 'About us',
	'add_to_menu_id' => $menu_td_demo_custom_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_link(array(
	'title' => 'Contact us',
	'add_to_menu_id' => $menu_td_demo_custom_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_link(array(
	'title' => 'Security',
	'add_to_menu_id' => $menu_td_demo_custom_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_td_demo_footer_menu_id = td_demo_menus::create_menu('td-demo-footer-menu', ''); 


/*  ---------------------------------------------------------------------------- 
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_link(array(
	'title' => 'TERMS & CONDITIONS',
	'add_to_menu_id' => $menu_td_demo_footer_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_link(array(
	'title' => 'PRIVACY POLICY',
	'add_to_menu_id' => $menu_td_demo_footer_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_link(array(
	'title' => 'COOKIES POLICY',
	'add_to_menu_id' => $menu_td_demo_footer_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_td_demo_footer_menu_extra_id = td_demo_menus::create_menu('td-demo-footer-menu-extra', ''); 


/*  ---------------------------------------------------------------------------- 
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_link(array(
	'title' => 'Facebook',
	'add_to_menu_id' => $menu_td_demo_footer_menu_extra_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_link(array(
	'title' => 'Instagram',
	'add_to_menu_id' => $menu_td_demo_footer_menu_extra_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_link(array(
	'title' => 'Twitter',
	'add_to_menu_id' => $menu_td_demo_footer_menu_extra_id,
	'url' => '#',
	'parent_id' => ''
));


/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/
$template_404_template_id = td_demo_content::add_cloud_template( array(
	'title' => 'Food Delivery - 404 Template',
	'file' => '404_cloud_template.txt',
	'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_id);


$template_woo_search_archive_template_id = td_demo_content::add_cloud_template( array(
	'title' => 'Food Delivery - Woo Search Archive Template',
	'file' => 'woo_search_archive_cloud_template.txt',
	'template_type' => 'woo_search_archive',
));

td_demo_misc::update_global_woo_search_archive_template( 'tdb_template_' . $template_woo_search_archive_template_id);


$template_woo_shop_base_template_id = td_demo_content::add_cloud_template( array(
	'title' => 'Food Delivery - Woo Shop Base Template',
	'file' => 'woo_shop_base_cloud_template.txt',
	'template_type' => 'woo_shop_base',
));

td_demo_misc::update_global_woo_shop_base_template( 'tdb_template_' . $template_woo_shop_base_template_id);


$template_woo_product_template_id = td_demo_content::add_cloud_template( array(
	'title' => 'Food Delivery - Woo Product Template',
	'file' => 'woo_product_cloud_template.txt',
	'template_type' => 'woo_product',
));

td_demo_misc::update_global_woo_product_template( 'tdb_template_' . $template_woo_product_template_id);


$template_woo_archive_template_id = td_demo_content::add_cloud_template( array(
	'title' => 'Food Delivery - Woo Archive Template',
	'file' => 'woo_archive_cloud_template.txt',
	'template_type' => 'woo_archive',
));

td_demo_misc::update_global_woo_archive_template( 'tdb_template_' . $template_woo_archive_template_id);


$template_footer_template_id = td_demo_content::add_cloud_template( array(
	'title' => 'Food Delivery - Footer Template',
	'file' => 'footer_cloud_template.txt',
	'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_id);


$template_header_template_id = td_demo_content::add_cloud_template( array(
	'title' => 'Food Delivery - Header Template',
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
