<?php



/*  ----------------------------------------------------------------------------
	CATEGORIES
*/
$cat_animation_id = td_demo_category::add_category(array(
    'category_name' => 'Animation',
    'parent_id' => 0,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => 'Morbi pretium scelerisque commodo. In viverra accumsan leo in semper. In ligula massa, tincidunt ultricies faucibus in, consectetur ut sapien. Maecenas magna ipsum, pharetra a tortor sit amet, dignissim vulputate massa.',
    'background_td_pic_id' => '',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_art_id = td_demo_category::add_category(array(
    'category_name' => 'Art',
    'parent_id' => 0,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => 'Morbi pretium scelerisque commodo. In viverra accumsan leo in semper. In ligula massa, tincidunt ultricies faucibus in, consectetur ut sapien. Maecenas magna ipsum, pharetra a tortor sit amet, dignissim vulputate massa.',
    'background_td_pic_id' => '',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_craft_id = td_demo_category::add_category(array(
    'category_name' => 'Craft',
    'parent_id' => 0,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => 'Morbi pretium scelerisque commodo. In viverra accumsan leo in semper. In ligula massa, tincidunt ultricies faucibus in, consectetur ut sapien. Maecenas magna ipsum, pharetra a tortor sit amet, dignissim vulputate massa.',
    'background_td_pic_id' => '',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_design_id = td_demo_category::add_category(array(
    'category_name' => 'Design',
    'parent_id' => 0,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => 'Morbi pretium scelerisque commodo. In viverra accumsan leo in semper. In ligula massa, tincidunt ultricies faucibus in, consectetur ut sapien. Maecenas magna ipsum, pharetra a tortor sit amet, dignissim vulputate massa.',
    'background_td_pic_id' => '',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_illustration_id = td_demo_category::add_category(array(
    'category_name' => 'Illustration',
    'parent_id' => 0,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => 'Morbi pretium scelerisque commodo. In viverra accumsan leo in semper. In ligula massa, tincidunt ultricies faucibus in, consectetur ut sapien. Maecenas magna ipsum, pharetra a tortor sit amet, dignissim vulputate massa.',
    'background_td_pic_id' => '',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_interviews_id = td_demo_category::add_category(array(
    'category_name' => 'Interviews',
    'parent_id' => 0,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => 'Morbi pretium scelerisque commodo. In viverra accumsan leo in semper. In ligula massa, tincidunt ultricies faucibus in, consectetur ut sapien. Maecenas magna ipsum, pharetra a tortor sit amet, dignissim vulputate massa.',
    'background_td_pic_id' => '',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_landscapes_id = td_demo_category::add_category(array(
    'category_name' => 'Landscapes',
    'parent_id' => 0,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => 'Morbi pretium scelerisque commodo. In viverra accumsan leo in semper. In ligula massa, tincidunt ultricies faucibus in, consectetur ut sapien. Maecenas magna ipsum, pharetra a tortor sit amet, dignissim vulputate massa.',
    'background_td_pic_id' => '',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_photography_id = td_demo_category::add_category(array(
    'category_name' => 'Photography',
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
	ATTACHMMENTS
*/

/*  ----------------------------------------------------------------------------
	POSTS
*/
$post_td_post_sculptures_blend_humans_into_landscapes_id = td_demo_content::add_post(array(
    'title' => 'Sculptures Blend Humans into Landscapes',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'categories_id_array' => array($cat_landscapes_id,),
));

$post_td_post_idyllic_landscape_paintings_by_tomas_sanchez_id = td_demo_content::add_post(array(
    'title' => 'Landscape Paintings by Tomás Sánchez',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'categories_id_array' => array($cat_landscapes_id,),
));

$post_td_post_grassy_inclines_embedded_in_the_ground_id = td_demo_content::add_post(array(
    'title' => 'Grassy Inclines Embedded in the Ground',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'categories_id_array' => array($cat_landscapes_id,),
));

$post_td_post_a_cluster_of_birdhouses_by_bob_verschueren_id = td_demo_content::add_post(array(
    'title' => 'A Cluster of Birdhouses by Bob Verschueren',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'categories_id_array' => array($cat_landscapes_id,),
));

$post_td_post_dreamy_exterior_paintings_by_jacob_brostrup_id = td_demo_content::add_post(array(
    'title' => 'Dreamy Exterior Paintings by Jacob Brostrup',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'categories_id_array' => array($cat_landscapes_id,),
));

$post_td_post_stunning_aerial_photographs_by_mitch_rouse_id = td_demo_content::add_post(array(
    'title' => 'Stunning Aerial Photographs by Mitch Rouse',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'categories_id_array' => array($cat_landscapes_id,),
));

$post_td_post_a_horse_struggles_to_exist_id = td_demo_content::add_post(array(
    'title' => 'A Horse Struggles to Exist',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'categories_id_array' => array($cat_animation_id,),
));

$post_td_post_an_ambitious_bird_follows_the_sun_id = td_demo_content::add_post(array(
    'title' => 'An Ambitious Bird Follows the Sun',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'categories_id_array' => array($cat_animation_id,),
));

$post_td_post_the_steps_of_how_to_make_sushi_id = td_demo_content::add_post(array(
    'title' => 'The Steps of How To Make Sushi',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'categories_id_array' => array($cat_animation_id,),
));

$post_td_post_a_woman_and_a_fish_time_travel_id = td_demo_content::add_post(array(
    'title' => 'A Woman and A Fish Time Travel',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'categories_id_array' => array($cat_animation_id,),
));

$post_td_post_a_carnivalesque_short_film_id = td_demo_content::add_post(array(
    'title' => 'A Carnivalesque Short Film',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'categories_id_array' => array($cat_animation_id,),
));

$post_td_post_a_minimally_animated_paper_box_id = td_demo_content::add_post(array(
    'title' => 'A Minimally Animated Paper Box',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'categories_id_array' => array($cat_animation_id,),
));

$post_td_post_witty_coronavirus_tourism_posters_id = td_demo_content::add_post(array(
    'title' => 'Witty \'Coronavirus Tourism\' Posters',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'categories_id_array' => array($cat_illustration_id,),
));

$post_td_post_sprawling_pen_illustrations_in_sketchbooks_id = td_demo_content::add_post(array(
    'title' => 'Sprawling Pen Illustrations in Sketchbooks',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'categories_id_array' => array($cat_illustration_id,),
));

$post_td_post_iconic_marble_tattooed_sculptures_id = td_demo_content::add_post(array(
    'title' => 'Iconic Marble Tattooed Sculptures',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'categories_id_array' => array($cat_illustration_id,),
));

$post_td_post_rosy_eyes_peer_out_from_leaves_and_insects_id = td_demo_content::add_post(array(
    'title' => 'Rosy Eyes Peer Out From Leaves and Insects',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'categories_id_array' => array($cat_illustration_id,),
));

$post_td_post_paper_figures_and_objects_by_bethany_bickley_id = td_demo_content::add_post(array(
    'title' => 'Paper Figures and Objects by Bethany Bickley',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'categories_id_array' => array($cat_illustration_id,),
));

$post_td_post_playful_illustrations_by_giulia_pintus_id = td_demo_content::add_post(array(
    'title' => 'Playful Illustrations by Giulia Pintus',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'categories_id_array' => array($cat_illustration_id,),
));

$post_td_post_ai_weiwei_and_his_documentary_film_human_flow_id = td_demo_content::add_post(array(
    'title' => 'Ai Weiwei and his Documentary Film',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'categories_id_array' => array($cat_interviews_id,),
));

$post_td_post_brothers_icy_sot_discuss_their_perspective_id = td_demo_content::add_post(array(
    'title' => 'Brothers Icy & Sot Discuss their Perspective',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'categories_id_array' => array($cat_interviews_id,),
));

$post_td_post_bisa_butler_shares_her_passion_for_storytelling_id = td_demo_content::add_post(array(
    'title' => 'Bisa Butler Shares Her Passion',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'categories_id_array' => array($cat_interviews_id,),
));

$post_td_post_a_conversation_with_photographer_brooke_didonato_id = td_demo_content::add_post(array(
    'title' => 'A Conversation with Photographer Brooke DiDonato',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'categories_id_array' => array($cat_interviews_id,),
));

$post_td_post_artist_lola_dupre_discusses_change_technology_id = td_demo_content::add_post(array(
    'title' => 'Artist Lola Dupré Discusses Change, Technology',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'categories_id_array' => array($cat_interviews_id,),
));

$post_td_post_artist_roberto_benavidez_shares_his_fascinations_id = td_demo_content::add_post(array(
    'title' => 'Artist Roberto Benavidez Shares His Fascinations',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'categories_id_array' => array($cat_interviews_id,),
));

$post_td_post_domestic_ceramics_by_bounpraseuth_id = td_demo_content::add_post(array(
    'title' => 'Domestic Ceramics by Bounpraseuth',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'categories_id_array' => array($cat_craft_id,),
));

$post_td_post_precise_angular_stitches_encase_twigs_id = td_demo_content::add_post(array(
    'title' => 'Precise Angular Stitches Encase Twigs',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'categories_id_array' => array($cat_craft_id,),
));

$post_td_post_dried_botanics_pressed_into_fauna_id = td_demo_content::add_post(array(
    'title' => 'Dried Botanics Pressed into Fauna',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'categories_id_array' => array($cat_craft_id,),
));

$post_td_post_rope_twists_into_circuit_boards_id = td_demo_content::add_post(array(
    'title' => 'Rope Twists into Circuit Boards',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'categories_id_array' => array($cat_craft_id,),
));

$post_td_post_hand_tufted_patches_of_color_id = td_demo_content::add_post(array(
    'title' => 'Hand-Tufted Patches of Color',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'categories_id_array' => array($cat_craft_id,),
));

$post_td_post_embroidered_moss_and_dense_forests_id = td_demo_content::add_post(array(
    'title' => 'Embroidered Moss and Dense Forests',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'categories_id_array' => array($cat_craft_id,),
));

$post_td_post_a_lounging_humpback_whale_and_newborn_id = td_demo_content::add_post(array(
    'title' => 'A Lounging Humpback Whale and Newborn',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'categories_id_array' => array($cat_photography_id,),
));

$post_td_post_foxes_caught_in_dramatic_squabbles_id = td_demo_content::add_post(array(
    'title' => 'Foxes Caught in Dramatic Squabbles',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'categories_id_array' => array($cat_photography_id,),
));

$post_td_post_new_book_opens_collections_of_fossils_id = td_demo_content::add_post(array(
    'title' => 'New Book Opens Collections of Fossils',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'categories_id_array' => array($cat_photography_id,),
));

$post_td_post_timelapse_captures_one_million_begonias_id = td_demo_content::add_post(array(
    'title' => 'Timelapse Captures One Million Begonias',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'categories_id_array' => array($cat_photography_id,),
));

$post_td_post_vivid_photographs_by_trung_huy_pham_id = td_demo_content::add_post(array(
    'title' => 'Vivid Photographs by Trung Huy Pham',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'categories_id_array' => array($cat_photography_id,),
));

$post_td_post_the_rituals_of_the_yamuna_river_id = td_demo_content::add_post(array(
    'title' => 'The Rituals of the Yamuna River',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'categories_id_array' => array($cat_photography_id,),
));

$post_td_post_outlandish_remedies_by_artist_dana_wyse_id = td_demo_content::add_post(array(
    'title' => 'Outlandish Remedies by Artist Dana Wyse',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'categories_id_array' => array($cat_design_id,),
));

$post_td_post_corrugated_steel_shelves_line_a_church_id = td_demo_content::add_post(array(
    'title' => 'Corrugated Steel Shelves Line a Church',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'categories_id_array' => array($cat_design_id,),
));

$post_td_post_wave_illusion_in_a_seoul_aquarium_id = td_demo_content::add_post(array(
    'title' => 'Wave Illusion in a Seoul Aquarium',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'categories_id_array' => array($cat_design_id,),
));

$post_td_post_four_adorable_prairie_dogs_id = td_demo_content::add_post(array(
    'title' => 'Four Adorable Prairie Dogs',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'categories_id_array' => array($cat_design_id,),
));

$post_td_post_recycled_woods_engineered_into_churches_id = td_demo_content::add_post(array(
    'title' => 'Recycled Woods Engineered into Churches',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'categories_id_array' => array($cat_design_id,),
));

$post_td_post_contemporary_films_reimagined_id = td_demo_content::add_post(array(
    'title' => 'Contemporary Films Reimagined',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'categories_id_array' => array($cat_design_id,),
));

$post_td_post_surreal_watercolor_by_tiurina_id = td_demo_content::add_post(array(
    'title' => 'Surreal Watercolor by Tiurina',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'categories_id_array' => array($cat_art_id,),
));

$post_td_post_snakes_insects_and_florals_id = td_demo_content::add_post(array(
    'title' => 'Snakes, Insects, and Florals',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'categories_id_array' => array($cat_art_id,),
));

$post_td_post_ornate_fabrics_cloak_models_id = td_demo_content::add_post(array(
    'title' => 'Ornate Fabrics Cloak Models',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'categories_id_array' => array($cat_art_id,),
));

$post_td_post_voluptuous_lips_and_moody_faces_id = td_demo_content::add_post(array(
    'title' => 'Lips and Moody Faces',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'categories_id_array' => array($cat_art_id,),
));

$post_td_post_bright_paintings_full_of_color_id = td_demo_content::add_post(array(
    'title' => 'Bright Paintings Full of Color',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'categories_id_array' => array($cat_art_id,),
));

$post_td_post_a_3d_mural_by_artist_leon_keer_id = td_demo_content::add_post(array(
    'title' => 'A 3D Mural by Artist Leon Keer',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'categories_id_array' => array($cat_art_id,),
));


/*  ----------------------------------------------------------------------------
	PAGES
*/
$page_home_id = td_demo_content::add_page(array(
    'title' => 'Home',
    'file' => 'home.txt',
    'homepage' => true,
));


/*  ----------------------------------------------------------------------------
	MENUS
*/
$menu_td_demo_header_menu_id = td_demo_menus::create_menu('td-demo-header-menu', '');


/*  ----------------------------------------------------------------------------
	MENUS ITEMS
*/
$menu_item_0_id = td_demo_menus::add_page(array(
    'title' => 'Home',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'page_id' => $page_home_id,
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Art',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_art_id,
    'parent_id' => ''
), true);

$menu_item_2_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Design',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_design_id,
    'parent_id' => ''
), true);

$menu_item_3_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Photography',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_photography_id,
    'parent_id' => ''
), true);

$menu_item_4_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Craft',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_craft_id,
    'parent_id' => ''
), true);

$menu_item_5_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Interviews',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_interviews_id,
    'parent_id' => ''
), true);

$menu_item_6_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Illustration',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_illustration_id,
    'parent_id' => ''
), true);

$menu_item_7_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Animation',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_animation_id,
    'parent_id' => ''
), true);

$menu_item_8_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Landscapes',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_landscapes_id,
    'parent_id' => ''
), true);


/*  ----------------------------------------------------------------------------
	CLOUD TEMPLATES
*/
$template_404_template_id = td_demo_content::add_cloud_template(array(
    'title' => '404 Template',
    'file' => '404_cloud_template.txt',
    'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_id);


$template_search_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Search Template',
    'file' => 'search_cloud_template.txt',
    'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_id);


$template_author_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Author Template',
    'file' => 'author_cloud_template.txt',
    'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_id);


$template_date_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Date Template',
    'file' => 'date_cloud_template.txt',
    'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_id);


$template_tag_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Tag Template',
    'file' => 'tag_cloud_template.txt',
    'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_id);


$template_category_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Category Template',
    'file' => 'cat_cloud_template.txt',
    'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_id);


$template_single_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Single Template',
    'file' => 'post_cloud_template.txt',
    'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_id);


$template_footer_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Footer Template',
    'file' => 'footer_cloud_template.txt',
    'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_id);


$template_header_template_id = td_demo_content::add_cloud_template(array(
    'title' => 'Header Template',
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

$generated_css = td_css_generator();if (function_exists('tdsp_css_generator')) { $generated_css .= tdsp_css_generator(); }td_util::update_option('tds_user_compile_css', $generated_css);
