<?php 



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
	POSTS
*/
$post_hello_world_6_id = td_demo_content::add_post(array(
	'title' => 'A new Polarn O. Pyret and Disney Collection launches – and it’s the cutest!',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_blog_id,),
));

$post_hello_world_5_id = td_demo_content::add_post(array(
	'title' => 'Marks and Spencer to Launch Roald Dahl Kids Fashion Collection',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_blog_id,),
));

$post_hello_world_4_id = td_demo_content::add_post(array(
	'title' => 'VEJA X Mini Rodini Kid’s Trainer Collaboration',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_blog_id,),
));

$post_hello_world_3_id = td_demo_content::add_post(array(
	'title' => 'Junior’s Top Picks from the Bobo Choses S/S21 Collection',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_blog_id,),
));

$post_hello_world_2_id = td_demo_content::add_post(array(
	'title' => 'Lee X H&M Collaboration creates sustainable denim for kids',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_blog_id,),
));

$post_hello_world_id = td_demo_content::add_post(array(
	'title' => 'Junior Chats with Alesha Dixon about the Launch of her New Kidswear Collection',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_blog_id,),
));


/*  ---------------------------------------------------------------------------- 
	PAGES
*/
$page_shipping_delivery_id = td_demo_content::add_page(array(
	'title' => 'Shipping & Delivery',
	'file' => 'shipping_delivery.txt',
));

$page_homepage_id = td_demo_content::add_page(array(
	'title' => 'Homepage',
	'file' => 'homepage.txt',
	'homepage' => true,
));


/*  ---------------------------------------------------------------------------- 
	PRODUCT CATEGORIES
*/
$p_cat_accessories_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Accessories',
	'parent_id' => 0,
	'description' => '',
));

$p_cat_baby_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Baby Clothing',
	'parent_id' => 0,
	'description' => '',
));

$p_cat_baby_sets_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Baby Sets',
	'parent_id' => $p_cat_baby_id,
	'description' => '',
));

$p_cat_dresses_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Dresses',
	'parent_id' => 0,
	'description' => '',
));

$p_cat_kids_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Kids Clothing',
	'parent_id' => 0,
	'description' => '',
));

$p_cat_sets_kids_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Kids Sets',
	'parent_id' => $p_cat_kids_id,
	'description' => '',
));

$p_cat_skirts_shorts_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Skirts &amp; Shorts',
	'parent_id' => $p_cat_kids_id,
	'description' => '',
));

$p_cat_sweaters_hoodies_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Sweaters &amp; Hoodies',
	'parent_id' => $p_cat_baby_id,
	'description' => '',
));

$p_cat_t_shirts_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'T-Shirts',
	'parent_id' => $p_cat_baby_id,
	'description' => '',
));

$p_cat_toys_id = td_woo_demo_product_category::add_woo_category(array(
	'product_category_name' => 'Toys',
	'parent_id' => 0,
	'description' => '',
));


/*  ---------------------------------------------------------------------------- 
	PRODUCT ATTRIBUTES
*/
$p_att_pa_color_id = td_woo_demo_product_attribute::add_woo_attribute( array(
	'attribute_name' => 'Color',
	'attribute_slug' => 'pa_color',
	'attribute_type' => 'color',
	'attribute_terms' => array(
		'Black' => '#000000',
		'Blue' => '#1e73be',
		'Gray' => '#c9c9c9',
		'Green' => '#39ba6d',
		'Pink' => '#ff5ea3',
		'Red' => '#dd4646',
		'White' => '#ffffff',
		'Yellow' => '#ffe22b',
	), 
	'order_by' => 'menu_order',
	'has_archives' => false
));

$p_att_pa_gender_id = td_woo_demo_product_attribute::add_woo_attribute( array(
	'attribute_name' => 'Gender',
	'attribute_slug' => 'pa_gender',
	'attribute_type' => 'button',
	'attribute_terms' => array(
		'Boy','Girl'
	), 
	'order_by' => 'menu_order',
	'has_archives' => false
));

$p_att_pa_size_id = td_woo_demo_product_attribute::add_woo_attribute( array(
	'attribute_name' => 'Size',
	'attribute_slug' => 'pa_size',
	'attribute_type' => 'button',
	'attribute_terms' => array(
		'1 Y','2-3 Y','3-6 M','4-5 Y','6-9 M','L','M','S','XL'
	), 
	'order_by' => 'menu_order',
	'has_archives' => false
));


/*  ---------------------------------------------------------------------------- 
	PRODUCTS
*/
$product_3pcs_baby_toddler_letter_print_flower_bow_butterfly_decorative_sock_id = td_demo_content::add_product( array( 
	'title' => '3pcs Baby / Toddler Letter Print Flower Bow Butterfly Decorative Sock',
	'file' => 'product_default.txt',
	'product_default_attributes' => array(
		'pa_color' => 'pink',
		'pa_size' => '3-6-m',
	),
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_gender_id,
			'name' => 'pa_gender',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'boy','girl' )
		), 
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( 'green','pink','white' )
		), 
		array(
			'id' => $p_att_pa_size_id,
			'name' => 'pa_size',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( '3-6-m','1-y','2-3-y','4-5-y' )
		), 
	), 
	'product_price' => '5.95',
	'product_image_td_id' => 'td_pic_p_1',
	'product_image_gallery_td_ids' => array( 'td_pic_p_1', 'td_pic_p_2', 'td_pic_p_3', 'td_pic_p_4' ),
	'product_categories' => array( $p_cat_accessories_id ),
	'product_tags' => array( 'baby','elephant' ),
	'short_description' => '<ul>
<li>Round-collar</li>
<li>Material:95% Cotton，5% Spandex</li>
<li>Machine wash, tumble dry</li>
</ul>
',
	'product_type' => 'variable',
));

$product_3_pack_toddler_girl_floral_and_polka_dots_tee_set_id = td_demo_content::add_product( array( 
	'title' => '3-pack Toddler Girl Floral and Polka Dots Tee Set',
	'file' => 'product_default.txt',
	'product_default_attributes' => array(
		'pa_color' => 'yellow',
		'pa_size' => '3-6-m',
	),
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_gender_id,
			'name' => 'pa_gender',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'girl' )
		), 
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( 'black','white','yellow' )
		), 
		array(
			'id' => $p_att_pa_size_id,
			'name' => 'pa_size',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( '3-6-m','6-9-m','1-y','2-3-y' )
		), 
	), 
	'product_price' => '25.85',
	'product_image_td_id' => 'td_pic_p_2',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_baby_sets_id,$p_cat_sets_kids_id,$p_cat_skirts_shorts_id,$p_cat_sweaters_hoodies_id,$p_cat_t_shirts_id ),
	'product_tags' => array( 'baby','elephant' ),
	'short_description' => '<ul>
<li>Round-collar</li>
<li>Material:95% Cotton，5% Spandex</li>
<li>Machine wash, tumble dry</li>
</ul>
',
	'product_type' => 'variable',
));

$product_boy_cartoon_dinosaur_print_long_sleeve_tee_id = td_demo_content::add_product( array( 
	'title' => 'Boy Cartoon Dinosaur Print Long-sleeve Tee',
	'file' => 'product_default.txt',
	'product_default_attributes' => array(
		'pa_color' => 'yellow',
		'pa_size' => '3-6-m',
	),
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_gender_id,
			'name' => 'pa_gender',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'boy' )
		), 
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( 'black','yellow' )
		), 
		array(
			'id' => $p_att_pa_size_id,
			'name' => 'pa_size',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( '3-6-m','6-9-m','1-y','2-3-y' )
		), 
	), 
	'product_price' => '8.85',
	'product_image_td_id' => 'td_pic_p_3',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_skirts_shorts_id,$p_cat_t_shirts_id ),
	'product_tags' => array( 'baby','elephant' ),
	'short_description' => '<ul>
<li>Round-collar</li>
<li>Material:95% Cotton，5% Spandex</li>
<li>Machine wash, tumble dry</li>
</ul>
',
	'product_type' => 'variable',
));

$product_baby_toddler_print_slim_long_sleeve_tee_id = td_demo_content::add_product( array( 
	'title' => 'Baby Toddler Print Slim Long-sleeve Tee',
	'file' => 'product_default.txt',
	'product_default_attributes' => array(
		'pa_size' => '3-6-m',
	),
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_gender_id,
			'name' => 'pa_gender',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'girl' )
		), 
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '1',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'white' )
		), 
		array(
			'id' => $p_att_pa_size_id,
			'name' => 'pa_size',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( '3-6-m','6-9-m','1-y','2-3-y' )
		), 
	), 
	'product_price' => '6.99',
	'product_image_td_id' => 'td_pic_p_4',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_skirts_shorts_id,$p_cat_t_shirts_id ),
	'product_tags' => array( 'baby','elephant' ),
	'short_description' => '<ul>
<li>Round-collar</li>
<li>Material:95% Cotton，5% Spandex</li>
<li>Machine wash, tumble dry</li>
</ul>
',
	'product_type' => 'variable',
));

$product_baby_unisex_casual_tee_cotton_fashion_long_sleeve_id = td_demo_content::add_product( array( 
	'title' => 'Baby Unisex casual Tee Cotton Fashion Long Sleeve',
	'file' => 'product_default.txt',
	'product_default_attributes' => array(
		'pa_size' => 's',
	),
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_gender_id,
			'name' => 'pa_gender',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'boy' )
		), 
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '1',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'black' )
		), 
		array(
			'id' => $p_att_pa_size_id,
			'name' => 'pa_size',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( 's','m','l','xl' )
		), 
	), 
	'product_price' => '7.50',
	'product_image_td_id' => 'td_pic_p_1',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_skirts_shorts_id,$p_cat_t_shirts_id ),
	'product_tags' => array( 'baby','elephant' ),
	'short_description' => '<ul>
<li>Round-collar</li>
<li>Material:95% Cotton，5% Spandex</li>
<li>Machine wash, tumble dry</li>
</ul>
',
	'product_type' => 'variable',
));

$product_cotton_short_sleeve_baby_unisex_casual_letter_crab_tee_id = td_demo_content::add_product( array( 
	'title' => 'Cotton Short-sleeve Baby Unisex casual Letter & crab Tee',
	'file' => 'product_default.txt',
	'product_default_attributes' => array(
		'pa_size' => 's',
	),
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_gender_id,
			'name' => 'pa_gender',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'boy' )
		), 
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '1',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'white','yellow' )
		), 
		array(
			'id' => $p_att_pa_size_id,
			'name' => 'pa_size',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( 's','m','l','xl' )
		), 
	), 
	'product_price' => '6.95',
	'product_image_td_id' => 'td_pic_p_2',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_skirts_shorts_id,$p_cat_t_shirts_id ),
	'product_tags' => array( 'baby','elephant' ),
	'short_description' => '<ul>
<li>Round-collar</li>
<li>Material:95% Cotton，5% Spandex</li>
<li>Machine wash, tumble dry</li>
</ul>
',
	'product_type' => 'variable',
));

$product_baby_solid_retro_strappy_jumpsuit_id = td_demo_content::add_product( array( 
	'title' => 'Baby Solid Retro Strappy Jumpsuit',
	'file' => 'product_default.txt',
	'product_default_attributes' => array(
		'pa_size' => 's',
	),
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_gender_id,
			'name' => 'pa_gender',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'boy','girl' )
		), 
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '1',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'red' )
		), 
		array(
			'id' => $p_att_pa_size_id,
			'name' => 'pa_size',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( 's','m','l','xl' )
		), 
	), 
	'product_price' => '9.85',
	'product_image_td_id' => 'td_pic_p_3',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_dresses_id ),
	'product_tags' => array( 'baby','elephant' ),
	'short_description' => '<ul>
<li>Round-collar</li>
<li>Material:95% Cotton，5% Spandex</li>
<li>Machine wash, tumble dry</li>
</ul>
',
	'product_type' => 'variable',
));

$product_2pcs_baby_girl_short_sleeve_stripes_casual_suit_dress_id = td_demo_content::add_product( array( 
	'title' => '2pcs Baby Girl Short-sleeve Stripes casual Suit-dress',
	'file' => 'product_default.txt',
	'product_default_attributes' => array(
		'pa_color' => 'red',
		'pa_size' => 's',
	),
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_gender_id,
			'name' => 'pa_gender',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'girl' )
		), 
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( 'green','red','yellow' )
		), 
		array(
			'id' => $p_att_pa_size_id,
			'name' => 'pa_size',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( 's','m','l','xl' )
		), 
	), 
	'product_price' => '28.85',
	'product_image_td_id' => 'td_pic_p_4',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_baby_sets_id,$p_cat_dresses_id,$p_cat_sets_kids_id,$p_cat_skirts_shorts_id ),
	'product_tags' => array( 'baby','elephant' ),
	'short_description' => '<ul>
<li>Round-collar</li>
<li>Material:95% Cotton，5% Spandex</li>
<li>Machine wash, tumble dry</li>
</ul>
',
	'product_type' => 'variable',
));

$product_baby_toddler_cotton_dinosaur_shorts_id = td_demo_content::add_product( array( 
	'title' => 'Baby Toddler Cotton Dinosaur Shorts',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_gender_id,
			'name' => 'pa_gender',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'boy' )
		), 
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( 'blue','gray','red','yellow' )
		), 
		array(
			'id' => $p_att_pa_size_id,
			'name' => 'pa_size',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( '3-6-m','6-9-m','1-y' )
		), 
	), 
	'product_default_attributes' => array(
		'pa_color' => 'red',
		'pa_size' => '3-6-m',
	),
	'product_price' => '15.85',
	'product_image_td_id' => 'td_pic_p_1',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_skirts_shorts_id ),
	'product_tags' => array( 'baby','elephant' ),
	'short_description' => '<ul>
<li>Round-collar</li>
<li>Material:95% Cotton，5% Spandex</li>
<li>Machine wash, tumble dry</li>
</ul>
',
	'product_type' => 'variable',
));

$product_cute_cotton_baby_towel_infant_id = td_demo_content::add_product( array( 
	'title' => 'Cute Cotton Baby Towel Infant',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_gender_id,
			'name' => 'pa_gender',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'boy','girl' )
		), 
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '2',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'white' )
		), 
	), 
	'product_price' => '7.95',
	'product_image_td_id' => 'td_pic_p_2',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_accessories_id ),
	'product_tags' => array( 'baby','elephant' ),
	'short_description' => '<ul>
<li>Round-collar</li>
<li>Material:95% Cotton，5% Spandex</li>
<li>Machine wash, tumble dry</li>
</ul>
',
	'product_type' => 'simple',
));

$product_2_piece_baby_cherry_allover_bow_decorative_dress_and_hat_set_id = td_demo_content::add_product( array( 
	'title' => '2-piece Baby Cherry Allover Bow Decorative Dress and Hat Set',
	'file' => 'product_default.txt',
	'product_default_attributes' => array(
		'pa_color' => 'pink',
		'pa_size' => '3-6-m',
	),
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_gender_id,
			'name' => 'pa_gender',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'girl' )
		), 
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( 'green','pink','yellow' )
		), 
		array(
			'id' => $p_att_pa_size_id,
			'name' => 'pa_size',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( '3-6-m','1-y','2-3-y','4-5-y' )
		), 
	), 
	'product_price' => '26.85',
	'product_image_td_id' => 'td_pic_p_3',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_baby_sets_id,$p_cat_sets_kids_id,$p_cat_skirts_shorts_id ),
	'product_tags' => array( 'baby','elephant' ),
	'short_description' => '<ul>
<li>Round-collar</li>
<li>Material:95% Cotton，5% Spandex</li>
<li>Machine wash, tumble dry</li>
</ul>
',
	'product_type' => 'variable',
));

$product_3_piece_elephant_bodysuit_and_pants_with_hat_set_id = td_demo_content::add_product( array( 
	'title' => '3-piece Elephant Bodysuit and Pants with Hat Set',
	'file' => 'product_default.txt',
	'product_default_attributes' => array(
		'pa_size' => '3-6-m',
	),
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_gender_id,
			'name' => 'pa_gender',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'boy' )
		), 
		array(
			'id' => $p_att_pa_size_id,
			'name' => 'pa_size',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( '3-6-m','1-y','2-3-y' )
		), 
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '2',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'white' )
		), 
	), 
	'product_price' => '16.85',
	'product_image_td_id' => 'td_pic_p_4',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_baby_sets_id,$p_cat_sets_kids_id ),
	'product_tags' => array( 'baby','elephant' ),
	'short_description' => '<ul>
<li>Round-collar</li>
<li>Material:95% Cotton，5% Spandex</li>
<li>Machine wash, tumble dry</li>
</ul>
',
	'product_type' => 'variable',
));

$product_babys_letter_top_geometric_pants_and_headband_id = td_demo_content::add_product( array( 
	'title' => 'Baby\'s Letter Top Geometric Pants and Headband',
	'file' => 'product_default.txt',
	'product_default_attributes' => array(
		'pa_size' => '3-6-m',
	),
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_gender_id,
			'name' => 'pa_gender',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'boy' )
		), 
		array(
			'id' => $p_att_pa_size_id,
			'name' => 'pa_size',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( '3-6-m','1-y','2-3-y' )
		), 
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '2',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'black' )
		), 
	), 
	'product_price' => '21',
	'product_image_td_id' => 'td_pic_p_1',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_baby_sets_id,$p_cat_sets_kids_id ),
	'product_tags' => array( 'baby','elephant' ),
	'short_description' => '<ul>
<li>Round-collar</li>
<li>Material:95% Cotton，5% Spandex</li>
<li>Machine wash, tumble dry</li>
</ul>
',
	'product_type' => 'variable',
));

$product_baby_letter_jumpsuit_id = td_demo_content::add_product( array( 
	'title' => 'Baby Letter Jumpsuit',
	'file' => 'product_default.txt',
	'product_default_attributes' => array(
		'pa_size' => '2-3-y',
		'pa_color' => 'white',
	),
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_gender_id,
			'name' => 'pa_gender',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'boy' )
		), 
		array(
			'id' => $p_att_pa_size_id,
			'name' => 'pa_size',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( '3-6-m','1-y','2-3-y' )
		), 
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( 'black','white' )
		), 
	), 
	'product_price' => '5.95',
	'product_image_td_id' => 'td_pic_p_2',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_sweaters_hoodies_id ),
	'product_tags' => array( 'baby','elephant' ),
	'short_description' => '<ul>
<li>Round-collar</li>
<li>Material:95% Cotton，5% Spandex</li>
<li>Machine wash, tumble dry</li>
</ul>
',
	'product_type' => 'variable',
));

$product_hoodie_with_logo_id = td_demo_content::add_product( array( 
	'title' => 'Baby Elephant Striped Bodysuits',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_gender_id,
			'name' => 'pa_gender',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'boy' )
		), 
		array(
			'id' => $p_att_pa_size_id,
			'name' => 'pa_size',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( '3-6-m','6-9-m','1-y','2-3-y','4-5-y' )
		), 
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '2',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'white' )
		), 
	), 
	'product_default_attributes' => array(
		'pa_size' => '1-y',
	),
	'product_price' => '4.5',
	'product_image_td_id' => 'td_pic_p_3',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_sweaters_hoodies_id ),
	'product_tags' => array( 'baby','bodysuit','elephant' ),
	'short_description' => '<ul>
<li>Round-collar</li>
<li>Material:95% Cotton，5% Spandex</li>
<li>Machine wash, tumble dry</li>
</ul>
',
	'product_type' => 'variable',
));

$product_baby_toddler_cute_dinosaur_letter_hat_id = td_demo_content::add_product( array( 
	'title' => 'Baby / Toddler Cute Dinosaur Letter Hat',
	'file' => 'product_default.txt',
	'product_default_attributes' => array(
		'pa_color' => 'pink',
	),
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_gender_id,
			'name' => 'pa_gender',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'boy','girl' )
		), 
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( 'blue','pink','yellow' )
		), 
	), 
	'product_price' => '5.85',
	'product_image_td_id' => 'td_pic_p_4',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_accessories_id ),
	'product_tags' => array( 'baby','elephant' ),
	'short_description' => '<ul>
<li>Round-collar</li>
<li>Material:95% Cotton，5% Spandex</li>
<li>Machine wash, tumble dry</li>
<li>Include: 1 top, 1 pants, 1 headband</li>
</ul>
',
	'product_type' => 'variable',
));

$product_baby_toddler_knitted_cartoon_antler_thermal_hat_id = td_demo_content::add_product( array( 
	'title' => 'Baby / Toddler Knitted Cartoon Antler Thermal Hat',
	'file' => 'product_default.txt',
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_gender_id,
			'name' => 'pa_gender',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'boy','girl' )
		), 
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( 'blue','gray','pink','yellow' )
		), 
	), 
	'product_default_attributes' => array(
		'pa_color' => 'blue',
	),
	'product_price' => '5.95',
	'product_image_td_id' => 'td_pic_p_1',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_accessories_id ),
	'product_tags' => array( 'baby','elephant' ),
	'short_description' => '<ul>
<li>Round-collar</li>
<li>Material:95% Cotton，5% Spandex</li>
<li>Machine wash, tumble dry</li>
</ul>
',
	'product_type' => 'variable',
));

$product_cute_animal_fox_print_aprons_with_pocket_for_mommy_and_me_id = td_demo_content::add_product( array( 
	'title' => 'Cute Animal fox Print Aprons with Pocket for Mommy and Me',
	'file' => 'product_default.txt',
	'product_default_attributes' => array(
		'pa_color' => 'green',
	),
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_gender_id,
			'name' => 'pa_gender',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'boy','girl' )
		), 
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '1',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( 'gray','green','yellow' )
		), 
	), 
	'product_price' => '3.99',
	'product_image_td_id' => 'td_pic_p_2',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_accessories_id ),
	'product_tags' => array( 'baby','elephant' ),
	'short_description' => '<ul>
<li>Round-collar</li>
<li>Material:95% Cotton，5% Spandex</li>
<li>Machine wash, tumble dry</li>
</ul>
',
	'product_type' => 'variable',
));

$product_rattle_toys_for_newborns_bed_bell_wooden_ring_0_12_months_id = td_demo_content::add_product( array( 
	'title' => 'Rattle Toys for Newborns Bed Bell Wooden Ring 0-12 Months',
	'file' => 'product_default.txt',
	'product_default_attributes' => array(
		'pa_size' => '3-6-m',
	),
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_gender_id,
			'name' => 'pa_gender',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'boy','girl' )
		), 
		array(
			'id' => $p_att_pa_size_id,
			'name' => 'pa_size',
			'value' => '',
			'position' => '2',
			'is_visible' => '',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( '3-6-m','6-9-m','1-y','2-3-y' )
		), 
	), 
	'product_price' => '8.50',
	'product_image_td_id' => 'td_pic_p_3',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_toys_id ),
	'product_tags' => array( 'baby','elephant' ),
	'short_description' => '<ul>
<li>Round-collar</li>
<li>Material:95% Cotton，5% Spandex</li>
<li>Machine wash, tumble dry</li>
</ul>
',
	'product_type' => 'simple',
));

$product_toy_montessori_rainbow_building_blocks_diy_wooden_toys_creative_id = td_demo_content::add_product( array( 
	'title' => 'Toy Montessori Rainbow Building Blocks DIY Wooden Toys Creative',
	'file' => 'product_default.txt',
	'product_default_attributes' => array(
		'pa_size' => '3-6-m',
	),
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_gender_id,
			'name' => 'pa_gender',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'boy','girl' )
		), 
		array(
			'id' => $p_att_pa_size_id,
			'name' => 'pa_size',
			'value' => '',
			'position' => '2',
			'is_visible' => '',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( '3-6-m','6-9-m','1-y','2-3-y' )
		), 
	), 
	'product_price' => '8',
	'product_image_td_id' => 'td_pic_p_4',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_toys_id ),
	'product_tags' => array( 'baby','elephant' ),
	'short_description' => '<ul>
<li>Round-collar</li>
<li>Material:95% Cotton，5% Spandex</li>
<li>Machine wash, tumble dry</li>
</ul>
',
	'product_type' => 'simple',
));

$product_kids_toys_hanging_wooden_silicone_balls_beading_educational_toys_bed_id = td_demo_content::add_product( array( 
	'title' => 'Kids Toys Hanging Wooden Silicone Balls Beading Educational Toys Bed',
	'file' => 'product_default.txt',
	'product_default_attributes' => array(
		'pa_size' => '3-6-m',
	),
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_gender_id,
			'name' => 'pa_gender',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'boy','girl' )
		), 
		array(
			'id' => $p_att_pa_size_id,
			'name' => 'pa_size',
			'value' => '',
			'position' => '2',
			'is_visible' => '',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( '3-6-m','6-9-m','1-y','2-3-y' )
		), 
	), 
	'product_price' => '16',
	'product_image_td_id' => 'td_pic_p_1',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_toys_id ),
	'product_tags' => array( 'baby','elephant' ),
	'short_description' => '<ul>
<li>Round-collar</li>
<li>Material:95% Cotton，5% Spandex</li>
<li>Machine wash, tumble dry</li>
</ul>
',
	'product_type' => 'simple',
));

$product_childrens_wooden_toys_beech_vracelet_for_children_id = td_demo_content::add_product( array( 
	'title' => 'Children\'s Wooden Toys Beech Vracelet for Children',
	'file' => 'product_default.txt',
	'product_default_attributes' => array(
		'pa_size' => '3-6-m',
	),
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_gender_id,
			'name' => 'pa_gender',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'boy','girl' )
		), 
		array(
			'id' => $p_att_pa_size_id,
			'name' => 'pa_size',
			'value' => '',
			'position' => '2',
			'is_visible' => '',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( '3-6-m','6-9-m','1-y','2-3-y' )
		), 
	), 
	'product_price' => '9',
	'product_image_td_id' => 'td_pic_p_2',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_toys_id ),
	'product_tags' => array( 'baby','elephant' ),
	'short_description' => '<ul>
<li>Round-collar</li>
<li>Material:95% Cotton，5% Spandex</li>
<li>Machine wash, tumble dry</li>
</ul>
',
	'product_type' => 'simple',
));

$product_wooden_silicone_car_for_baby_toys_beech_wooden_blocks_id = td_demo_content::add_product( array( 
	'title' => 'Wooden Silicone Car For Baby Toys Beech Wooden Blocks',
	'file' => 'product_default.txt',
	'product_default_attributes' => array(
		'pa_size' => '3-6-m',
	),
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_gender_id,
			'name' => 'pa_gender',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'boy','girl' )
		), 
		array(
			'id' => $p_att_pa_size_id,
			'name' => 'pa_size',
			'value' => '',
			'position' => '2',
			'is_visible' => '',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( '3-6-m','6-9-m','1-y','2-3-y' )
		), 
	), 
	'product_price' => '18.80',
	'product_image_td_id' => 'td_pic_p_3',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_toys_id ),
	'product_tags' => array( 'baby','elephant' ),
	'short_description' => '<ul>
<li>Round-collar</li>
<li>Material:95% Cotton，5% Spandex</li>
<li>Machine wash, tumble dry</li>
</ul>
',
	'product_type' => 'simple',
));

$product_childrens_wooden_toy_beech_bracelet_for_children_creative_nordic_style_id = td_demo_content::add_product( array( 
	'title' => 'Children\'s Wooden Toy Beech Bracelet For Children Creative Nordic Style',
	'file' => 'product_default.txt',
	'product_default_attributes' => array(
		'pa_size' => '3-6-m',
	),
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_gender_id,
			'name' => 'pa_gender',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'boy','girl' )
		), 
		array(
			'id' => $p_att_pa_size_id,
			'name' => 'pa_size',
			'value' => '',
			'position' => '2',
			'is_visible' => '',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( '3-6-m','6-9-m','1-y','2-3-y' )
		), 
	), 
	'product_price' => '15.85',
	'product_sku' => 'ML-256489',
	'product_image_td_id' => 'td_pic_p_4',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_toys_id ),
	'product_tags' => array( 'baby','elephant' ),
	'short_description' => '<ul>
<li>Round-collar</li>
<li>Material:95% Cotton，5% Spandex</li>
<li>Machine wash, tumble dry</li>
</ul>
',
	'product_type' => 'simple',
));

$product_short_sleeve_stripes_animal_print_cotton_babys_sets_id = td_demo_content::add_product( array( 
	'title' => 'Short-sleeve Stripes Animal Print Cotton Baby\'s Sets',
	'file' => 'product_default.txt',
	'product_default_attributes' => array(
		'pa_size' => '3-6-m',
	),
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_gender_id,
			'name' => 'pa_gender',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'boy' )
		), 
		array(
			'id' => $p_att_pa_size_id,
			'name' => 'pa_size',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( '3-6-m','6-9-m','1-y','2-3-y','4-5-y' )
		), 
	), 
	'product_price' => '12.85',
	'product_image_td_id' => 'td_pic_p_1',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_accessories_id,$p_cat_baby_sets_id,$p_cat_dresses_id,$p_cat_sets_kids_id,$p_cat_skirts_shorts_id,$p_cat_sweaters_hoodies_id,$p_cat_t_shirts_id ),
	'product_tags' => array( 'baby','elephant' ),
	'short_description' => '<ul>
<li>Round-collar</li>
<li>Material:95% Cotton，5% Spandex</li>
<li>Machine wash, tumble dry</li>
</ul>
',
	'product_type' => 'variable',
));

$product_baby_long_sleeve_cotton_unisex_avant_garde_letter_tee_id = td_demo_content::add_product( array( 
	'title' => 'Baby Long-sleeve Cotton Unisex Avant-garde Letter Tee',
	'file' => 'product_default.txt',
	'product_default_attributes' => array(
		'pa_size' => '3-6-m',
	),
	'product_attributes' => array(
		array(
			'id' => $p_att_pa_gender_id,
			'name' => 'pa_gender',
			'value' => '',
			'position' => '0',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'boy' )
		), 
		array(
			'id' => $p_att_pa_color_id,
			'name' => 'pa_color',
			'value' => '',
			'position' => '1',
			'is_visible' => '',
			'is_variation' => '',
			'is_taxonomy' => '1',
			'terms' => array( 'gray' )
		), 
		array(
			'id' => $p_att_pa_size_id,
			'name' => 'pa_size',
			'value' => '',
			'position' => '2',
			'is_visible' => '1',
			'is_variation' => '1',
			'is_taxonomy' => '1',
			'terms' => array( '3-6-m','6-9-m','1-y','2-3-y','4-5-y' )
		), 
	), 
	'product_price' => '5.99',
	'product_image_td_id' => 'td_pic_p_2',
	//'product_image_gallery_td_ids' => array( 'td_pic_1', 'td_pic_2', 'td_pic_3', 'td_pic_4', 'td_pic_5', ), 
	'product_categories' => array( $p_cat_accessories_id,$p_cat_baby_sets_id,$p_cat_dresses_id,$p_cat_sets_kids_id,$p_cat_skirts_shorts_id,$p_cat_sweaters_hoodies_id,$p_cat_t_shirts_id ),
	'product_tags' => array( 'baby','elephant' ),
	'short_description' => '<ul>
<li>Round-collar</li>
<li>Material:95% Cotton，5% Spandex</li>
<li>Machine wash, tumble dry</li>
</ul>
',
	'product_type' => 'variable',
));


/*  ---------------------------------------------------------------------------- 
	MENUS
*/
$menu_td_demo_footer_menu_id = td_demo_menus::create_menu('td-demo-footer-menu', ''); 


/*  ---------------------------------------------------------------------------- 
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_page(array(
	'title' => 'Shipping & Delivery',
	'add_to_menu_id' => $menu_td_demo_footer_menu_id,
	'page_id' => $page_shipping_delivery_id,
	'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_link(array(
	'title' => 'Terms & Conditions',
	'add_to_menu_id' => $menu_td_demo_footer_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_link(array(
	'title' => 'About Us',
	'add_to_menu_id' => $menu_td_demo_footer_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_link(array(
	'title' => 'Returns',
	'add_to_menu_id' => $menu_td_demo_footer_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_4_id = td_demo_menus::add_category(array(
	'title' => 'Blog',
	'add_to_menu_id' => $menu_td_demo_footer_menu_id,
	'category_id' => $cat_blog_id,
	'parent_id' => ''
));

$menu_td_demo_footer_menu_extra_id = td_demo_menus::create_menu('td-demo-footer-menu-extra', ''); 


/*  ---------------------------------------------------------------------------- 
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_product_cat(array(
	'title' => 'Baby Clothing',
	'add_to_menu_id' => $menu_td_demo_footer_menu_extra_id,
	'p_cat_id' => $p_cat_baby_id,
	'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_product_cat(array(
	'title' => 'Kids Clothing',
	'add_to_menu_id' => $menu_td_demo_footer_menu_extra_id,
	'p_cat_id' => $p_cat_kids_id,
	'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_product_cat(array(
	'title' => 'Accessories',
	'add_to_menu_id' => $menu_td_demo_footer_menu_extra_id,
	'p_cat_id' => $p_cat_accessories_id,
	'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_product_cat(array(
	'title' => 'Sweaters & Hoodies',
	'add_to_menu_id' => $menu_td_demo_footer_menu_extra_id,
	'p_cat_id' => $p_cat_sweaters_hoodies_id,
	'parent_id' => ''
));

$menu_item_4_id = td_demo_menus::add_product_cat(array(
	'title' => 'Toys',
	'add_to_menu_id' => $menu_td_demo_footer_menu_extra_id,
	'p_cat_id' => $p_cat_toys_id,
	'parent_id' => ''
));

$menu_item_5_id = td_demo_menus::add_product_cat(array(
	'title' => 'Skirts & Shorts',
	'add_to_menu_id' => $menu_td_demo_footer_menu_extra_id,
	'p_cat_id' => $p_cat_skirts_shorts_id,
	'parent_id' => ''
));

$menu_td_demo_header_menu_id = td_demo_menus::create_menu('td-demo-header-menu', ''); 


/*  ---------------------------------------------------------------------------- 
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_page(array(
	'title' => 'Home',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'page_id' => $page_homepage_id,
	'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_link(array(
	'title' => 'What\'s New',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'url' => get_home_url() . '/shop',
	'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_product_cat(array(
	'title' => 'Baby Clothing',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'p_cat_id' => $p_cat_baby_id,
	'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_product_cat(array(
	'title' => 'Kids Clothing',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'p_cat_id' => $p_cat_kids_id,
	'parent_id' => ''
));

$menu_item_4_id = td_demo_menus::add_product_cat(array(
	'title' => 'Accessories',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'p_cat_id' => $p_cat_accessories_id,
	'parent_id' => ''
));

$menu_item_5_id = td_demo_menus::add_product_cat(array(
	'title' => 'Toys',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'p_cat_id' => $p_cat_toys_id,
	'parent_id' => ''
));

$menu_item_6_id = td_demo_menus::add_link(array(
	'title' => 'More',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'url' => '#',
	'parent_id' => ''
));

$menu_item_7_id = td_demo_menus::add_product_cat(array(
	'title' => 'Sweaters & Hoodies',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'p_cat_id' => $p_cat_sweaters_hoodies_id,
	'parent_id' => $menu_item_6_id
));

$menu_item_8_id = td_demo_menus::add_product_cat(array(
	'title' => 'T-Shirts',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'p_cat_id' => $p_cat_t_shirts_id,
	'parent_id' => $menu_item_6_id
));

$menu_item_9_id = td_demo_menus::add_product_cat(array(
	'title' => 'Dresses',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'p_cat_id' => $p_cat_dresses_id,
	'parent_id' => $menu_item_6_id
));

$menu_item_10_id = td_demo_menus::add_product_cat(array(
	'title' => 'Kids Sets',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'p_cat_id' => $p_cat_sets_kids_id,
	'parent_id' => $menu_item_6_id
));

$menu_item_11_id = td_demo_menus::add_product_cat(array(
	'title' => 'Skirts & Shorts',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'p_cat_id' => $p_cat_skirts_shorts_id,
	'parent_id' => $menu_item_6_id
));

$menu_item_12_id = td_demo_menus::add_mega_menu(array(
	'title' => 'Blog',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_blog_id,
	'parent_id' => ''
), true);


/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/
$template_single_post_template_kids_store_id = td_demo_content::add_cloud_template(array(
    'title' => 'Kids Store - Single Post Template',
    'file' => 'post_cloud_template.txt',
    'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_post_template_kids_store_id);

$template_404_template_kids_store_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kids Store - 404 Template',
	'file' => '404_cloud_template.txt',
	'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_kids_store_id);


$template_tag_template_kids_store_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kids Store - Tag Template',
	'file' => 'tag_cloud_template.txt',
	'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_kids_store_id);


$template_author_template_kids_store_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kids Store - Author Template',
	'file' => 'author_cloud_template.txt',
	'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_kids_store_id);


$template_date_template_kids_store_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kids Store - Date Template',
	'file' => 'date_cloud_template.txt',
	'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_kids_store_id);


$template_search_template_kids_store_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kids Store - Search Template',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_kids_store_id);


$template_category_template_kids_store_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kids Store - Category Template',
	'file' => 'cat_cloud_template.txt',
	'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_kids_store_id);


$template_kids_store_woo_shop_base_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kids Store – Woo Shop Base Template',
	'file' => 'woo_shop_base_cloud_template.txt',
	'template_type' => 'woo_shop_base',
));

td_demo_misc::update_global_woo_shop_base_template( 'tdb_template_' . $template_kids_store_woo_shop_base_template_id);


$template_footer_template_kids_store_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kids Store - Footer Template',
	'file' => 'footer_cloud_template.txt',
	'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_kids_store_id);


$template_header_template_kids_store_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kids Store - Header Template',
	'file' => 'header_cloud_template.txt',
	'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_kids_store_id);


update_post_meta( $template_header_template_kids_store_id, 'header_mobile_menu_id', $menu_td_demo_header_menu_id);


$template_kids_store_woo_search_archive_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kids Store - Woo Search Archive Template',
	'file' => 'woo_search_archive_cloud_template.txt',
	'template_type' => 'woo_search_archive',
));

td_demo_misc::update_global_woo_search_archive_template( 'tdb_template_' . $template_kids_store_woo_search_archive_template_id);


$template_kids_store_woo_archive_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kids Store - Woo Archive Template',
	'file' => 'woo_archive_cloud_template.txt',
	'template_type' => 'woo_archive',
));

td_demo_misc::update_global_woo_archive_template( 'tdb_template_' . $template_kids_store_woo_archive_template_id);


$template_kids_store_woo_product_template_id = td_demo_content::add_cloud_template(array(
	'title' => 'Kids Store - Woo Product Template',
	'file' => 'woo_product_cloud_template.txt',
	'template_type' => 'woo_product',
));

td_demo_misc::update_global_woo_product_template( 'tdb_template_' . $template_kids_store_woo_product_template_id);



/*  ---------------------------------------------------------------------------- 
	GENERAL SETTINGS
*/
td_demo_misc::update_background('', false);

td_demo_misc::update_background_mobile('tdx_pic_10');

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
