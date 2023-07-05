<?php 

/*  ---------------------------------------------------------------------------- 
	CATEGORIES
*/
$cat_arts_id = td_demo_category::add_category(array(
	'category_name' => 'Arts',
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

$cat_architecture_id = td_demo_category::add_category(array(
    'category_name' => 'Architecture',
    'parent_id' => $cat_arts_id,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => '',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_digital_id = td_demo_category::add_category(array(
	'category_name' => 'Digital',
	'parent_id' => $cat_arts_id,
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
	'parent_id' => $cat_arts_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_painting_id = td_demo_category::add_category(array(
    'category_name' => 'Painting',
    'parent_id' => $cat_arts_id,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => '',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_sculpture_id = td_demo_category::add_category(array(
    'category_name' => 'Sculpture',
    'parent_id' => $cat_arts_id,
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

$cat_graffiti_id = td_demo_category::add_category(array(
	'category_name' => 'Graffiti',
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

$cat_artists_id = td_demo_category::add_category(array(
    'category_name' => 'Artists',
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

$cat_modern_id = td_demo_category::add_category(array(
	'category_name' => 'Modern',
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

$cat_pop_art_id = td_demo_category::add_category(array(
	'category_name' => 'Pop Art',
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
$post_considered_it_themselves_id = td_demo_content::add_post(array(
    'title' => 'Considered it themselves',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_1',
    'categories_id_array' => array($cat_architecture_id,$cat_artists_id,$cat_digital_id,$cat_fashion_id,$cat_graffiti_id,$cat_modern_id,$cat_painting_id,$cat_photography_id,$cat_pop_art_id,$cat_sculpture_id,),
));

$post_the_misery_wisdom_id = td_demo_content::add_post(array(
    'title' => 'The misery wisdom',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_2',
    'categories_id_array' => array($cat_architecture_id,$cat_artists_id,$cat_digital_id,$cat_fashion_id,$cat_graffiti_id,$cat_modern_id,$cat_painting_id,$cat_photography_id,$cat_pop_art_id,$cat_sculpture_id,),
));

$post_he_advantage_of_exquisite_id = td_demo_content::add_post(array(
    'title' => 'He advantage of exquisite',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_3',
    'categories_id_array' => array($cat_architecture_id,$cat_artists_id,$cat_digital_id,$cat_fashion_id,$cat_graffiti_id,$cat_modern_id,$cat_painting_id,$cat_photography_id,$cat_pop_art_id,$cat_sculpture_id,),
));

$post_possession_so_comparison_id = td_demo_content::add_post(array(
    'title' => 'Possession so comparison',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_4',
    'categories_id_array' => array($cat_architecture_id,$cat_artists_id,$cat_digital_id,$cat_fashion_id,$cat_graffiti_id,$cat_modern_id,$cat_painting_id,$cat_photography_id,$cat_pop_art_id,$cat_sculpture_id,),
));

$post_do_fortune_account_written_id = td_demo_content::add_post(array(
    'title' => 'Do fortune account written',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_5',
    'categories_id_array' => array($cat_architecture_id,$cat_artists_id,$cat_digital_id,$cat_fashion_id,$cat_graffiti_id,$cat_modern_id,$cat_painting_id,$cat_photography_id,$cat_pop_art_id,$cat_sculpture_id,),
));

$post_reasonable_travelling_id = td_demo_content::add_post(array(
    'title' => 'Reasonable travelling',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'categories_id_array' => array($cat_architecture_id,$cat_artists_id,$cat_digital_id,$cat_fashion_id,$cat_graffiti_id,$cat_modern_id,$cat_painting_id,$cat_photography_id,$cat_pop_art_id,$cat_sculpture_id,),
));

$post_my_wishing_an_in_id = td_demo_content::add_post(array(
    'title' => 'My wishing an in',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'categories_id_array' => array($cat_architecture_id,$cat_artists_id,$cat_digital_id,$cat_fashion_id,$cat_graffiti_id,$cat_modern_id,$cat_painting_id,$cat_photography_id,$cat_pop_art_id,$cat_sculpture_id,),
));

$post_prepared_interest_proposal_id = td_demo_content::add_post(array(
    'title' => 'Prepared interest proposal',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'categories_id_array' => array($cat_architecture_id,$cat_artists_id,$cat_digital_id,$cat_fashion_id,$cat_graffiti_id,$cat_modern_id,$cat_painting_id,$cat_photography_id,$cat_pop_art_id,$cat_sculpture_id,),
));

$post_td_post_discerning_in_the_arts_id = td_demo_content::add_post(array(
	'title' => 'Discerning in the Arts',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_artists_id,),
));

$post_td_post_female_fashion_designers_id = td_demo_content::add_post(array(
	'title' => 'Female Fashion Designers',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_artists_id,),
));

$post_td_post_inclusive_collections_id = td_demo_content::add_post(array(
	'title' => 'Inclusive Collections',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_artists_id,),
));

$post_td_post_translating_visions_id = td_demo_content::add_post(array(
	'title' => 'Translating Visions',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_artists_id,),
));

$post_td_post_resisting_stereotypes_id = td_demo_content::add_post(array(
	'title' => 'Resisting Stereotypes',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_artists_id,),
));

$post_td_post_conscious_minimalism_id = td_demo_content::add_post(array(
	'title' => 'Conscious Minimalism',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_modern_id,),
));

$post_td_post_structures_of_design_id = td_demo_content::add_post(array(
	'title' => 'Structures of Design',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_modern_id,),
));

$post_td_post_creating_community_art_id = td_demo_content::add_post(array(
	'title' => 'Creating Community Art',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_modern_id,),
));

$post_td_post_spontaneous_forms_id = td_demo_content::add_post(array(
	'title' => 'Spontaneous Forms',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_modern_id,),
));

$post_td_post_modern_virtual_platform_id = td_demo_content::add_post(array(
	'title' => 'Modern Virtual Platform',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_modern_id,),
));

$post_td_post_contemporary_photographers_id = td_demo_content::add_post(array(
	'title' => 'Contemporary Photographers',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_photography_id,),
));

$post_td_post_a_photographic_discovery_id = td_demo_content::add_post(array(
	'title' => 'A Photographic Discovery',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_photography_id,),
));

$post_td_post_nocturnal_photography_id = td_demo_content::add_post(array(
	'title' => 'Nocturnal Photography',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_photography_id,),
));

$post_td_post_images_in_isolation_id = td_demo_content::add_post(array(
	'title' => 'Images in Isolation',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_photography_id,),
));

$post_td_post_digitised_landscapes_id = td_demo_content::add_post(array(
	'title' => 'Digitised Landscapes',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_photography_id,),
));

$post_td_post_out_of_the_everyday_id = td_demo_content::add_post(array(
	'title' => 'Out of the Everyday',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_pop_art_id,),
));

$post_td_post_a_call_to_action_now_id = td_demo_content::add_post(array(
	'title' => 'A Call to Action Now',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_pop_art_id,),
));

$post_td_post_alternative_views_art_id = td_demo_content::add_post(array(
	'title' => 'Alternative Views Art',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_pop_art_id,),
));

$post_td_post_creating_dialogues_id = td_demo_content::add_post(array(
	'title' => 'Creating Dialogues',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_pop_art_id,),
));

$post_td_post_change_and_abstraction_id = td_demo_content::add_post(array(
	'title' => 'Change and Abstraction',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_pop_art_id,),
));

$post_td_post_who_is_paying_attention_id = td_demo_content::add_post(array(
	'title' => 'Who is Paying Attention?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_graffiti_id,),
));

$post_td_post_taking_over_the_city_id = td_demo_content::add_post(array(
	'title' => 'Taking Over the City',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_graffiti_id,),
));

$post_td_post_capturing_the_new_generation_id = td_demo_content::add_post(array(
	'title' => 'Capturing the New Generation',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_graffiti_id,),
));

$post_td_post_celebrating_wall_prints_id = td_demo_content::add_post(array(
	'title' => 'Celebrating Wall Prints',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_graffiti_id,),
));

$post_td_post_a_sense_of_connection_id = td_demo_content::add_post(array(
	'title' => 'A Sense of Connection',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_graffiti_id,),
));

$post_td_post_vivid_modern_depiction_id = td_demo_content::add_post(array(
	'title' => 'Vivid Modern Depiction',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_sculpture_id,),
));

$post_td_post_shapes_in_sculpture_id = td_demo_content::add_post(array(
	'title' => 'Shapes in Sculpture',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_sculpture_id,),
));

$post_td_post_deep_human_exploration_id = td_demo_content::add_post(array(
	'title' => 'Deep Human Exploration',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_sculpture_id,),
));

$post_td_post_intimate_portraiture_id = td_demo_content::add_post(array(
	'title' => 'Intimate Portraiture',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_sculpture_id,),
));

$post_td_post_shape_design_adventure_id = td_demo_content::add_post(array(
	'title' => 'Shape Design Adventure',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_sculpture_id,),
));

$post_td_post_into_the_digital_realm_id = td_demo_content::add_post(array(
	'title' => 'Into the Digital Realm',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_digital_id,),
));

$post_td_post_digital_art_exhibitions_id = td_demo_content::add_post(array(
	'title' => 'Digital Art Exhibitions',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_digital_id,),
));

$post_td_post_new_digital_art_platforms_id = td_demo_content::add_post(array(
	'title' => 'New Digital Art Platforms',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_digital_id,),
));

$post_td_post_outdoor_digital_art_projections_id = td_demo_content::add_post(array(
	'title' => 'Outdoor Digital Art Projections',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_digital_id,),
));

$post_td_post_computer_vision_composition_id = td_demo_content::add_post(array(
	'title' => 'Computer Vision Composition',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_digital_id,),
));

$post_td_post_structural_manipulation_id = td_demo_content::add_post(array(
	'title' => 'Structural Manipulation',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_painting_id,),
));

$post_td_post_a_luminous_horizon_id = td_demo_content::add_post(array(
	'title' => 'A Luminous Horizon',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_painting_id,),
));

$post_td_post_layers_of_color_revealed_id = td_demo_content::add_post(array(
	'title' => 'Layers of Color Revealed',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_painting_id,),
));

$post_td_post_into_mutual_realities_id = td_demo_content::add_post(array(
	'title' => 'Into Mutual Realities',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_painting_id,),
));

$post_td_post_view_from_above_id = td_demo_content::add_post(array(
	'title' => 'View from Above',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_painting_id,),
));

$post_td_post_poetic_meditation_vibes_id = td_demo_content::add_post(array(
	'title' => 'Poetic Meditation Vibes',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_fashion_id,),
));

$post_td_post_the_soul_of_a_nation_id = td_demo_content::add_post(array(
	'title' => 'The Soul of a Nation',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_fashion_id,),
));

$post_td_post_array_of_expressive_figures_id = td_demo_content::add_post(array(
	'title' => 'Array of Expressive Figures',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_fashion_id,),
));

$post_td_post_human_contact_collection_id = td_demo_content::add_post(array(
	'title' => 'Human Contact Collection',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_fashion_id,),
));

$post_td_post_portrait_of_society_id = td_demo_content::add_post(array(
	'title' => 'Portrait of Society',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_fashion_id,),
));

$post_td_post_launching_a_new_space_id = td_demo_content::add_post(array(
	'title' => 'Launching a New Space',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_architecture_id,),
));

$post_td_post_playing_with_perception_id = td_demo_content::add_post(array(
	'title' => 'Playing with Perception',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_architecture_id,),
));

$post_td_post_british_modern_buildings_id = td_demo_content::add_post(array(
	'title' => 'British Modern Buildings',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_architecture_id,),
));

$post_td_post_architectural_photography_id = td_demo_content::add_post(array(
	'title' => 'Architectural Photography',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_architecture_id,),
));

$post_td_post_inspiration_in_the_city_id = td_demo_content::add_post(array(
	'title' => 'Inspiration in the City',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_architecture_id,),
));


/*  ---------------------------------------------------------------------------- 
	MENUS
*/
$menu_td_demo_header_menu_id = td_demo_menus::create_menu('td-demo-header-menu', '');
$menu_td_demo_custom_menu_id = td_demo_menus::create_menu('td-demo-custom-menu', '');


/*  ----------------------------------------------------------------------------
	CLOUD TEMPLATES
*/
$template_header_template_main_artist_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Header Template Main – Artist PRO',
    'file' => 'header_cloud_template_main.txt',
    'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_main_artist_pro_id);

update_post_meta( $template_header_template_main_artist_pro_id, 'header_mobile_menu_id', $menu_td_demo_header_menu_id);


$template_header_template_artist_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Header Template - Artist PRO',
    'file' => 'header_cloud_template.txt',
    'template_type' => 'header',
));

update_post_meta( $template_header_template_artist_pro_id, 'header_mobile_menu_id', $menu_td_demo_header_menu_id);


$template_footer_artist_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Footer - Artist PRO',
    'file' => 'footer_cloud_template.txt',
    'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_artist_pro_id);


$template_single_post_template_artist_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Single Post Template - Artist PRO',
    'file' => 'post_cloud_template.txt',
    'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_post_template_artist_pro_id);


$template_author_template_artist_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Author Template - Artist PRO',
    'file' => 'author_cloud_template.txt',
    'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_artist_pro_id);


$template_category_template_artist_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Category Template - Artist PRO',
    'file' => 'cat_cloud_template.txt',
    'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_artist_pro_id);


$template_404_template_artist_pro_id = td_demo_content::add_cloud_template(array(
    'title' => '404 Template - Artist PRO',
    'file' => '404_cloud_template.txt',
    'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_artist_pro_id);


$template_tag_template_artist_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Tag Template - Artist PRO',
    'file' => 'tag_cloud_template.txt',
    'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_artist_pro_id);


$template_date_template_artist_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Date Template - Artist PRO',
    'file' => 'date_cloud_template.txt',
    'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_artist_pro_id);


$template_search_template_artist_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Search Template - Artist PRO',
    'file' => 'search_cloud_template.txt',
    'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_artist_pro_id);


/*  ----------------------------------------------------------------------------
	PAGES
*/
$page_home_id = td_demo_content::add_page(array(
    'title' => 'Home',
    'file' => 'home.txt',
    'homepage' => true,
    'header_template_id' => $template_header_template_artist_pro_id,
));


/*  ----------------------------------------------------------------------------
	MENUS ITEMS HEADER
*/
$menu_item_0_id = td_demo_menus::add_page(array(
    'title' => 'Home',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'page_id' => $page_home_id,
    'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Arts',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_arts_id,
    'parent_id' => ''
), true);

$menu_item_2_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Graffiti',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_graffiti_id,
    'parent_id' => ''
), true);

$menu_item_3_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Pop Art',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_pop_art_id,
    'parent_id' => ''
), true);

$menu_item_4_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Artists',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_artists_id,
    'parent_id' => ''
), true);


/*  ---------------------------------------------------------------------------- 
	MENUS ITEMS CUSTOM
*/
$menu_item_0_id = td_demo_menus::add_category(array(
	'title' => 'Modern',
	'add_to_menu_id' => $menu_td_demo_custom_menu_id,
	'category_id' => $cat_modern_id,
	'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_category(array(
	'title' => 'Photography',
	'add_to_menu_id' => $menu_td_demo_custom_menu_id,
	'category_id' => $cat_photography_id,
	'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_category(array(
	'title' => 'Architecture',
	'add_to_menu_id' => $menu_td_demo_custom_menu_id,
	'category_id' => $cat_architecture_id,
	'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_category(array(
	'title' => 'Digital',
	'add_to_menu_id' => $menu_td_demo_custom_menu_id,
	'category_id' => $cat_digital_id,
	'parent_id' => ''
));

$menu_item_4_id = td_demo_menus::add_category(array(
	'title' => 'Fashion',
	'add_to_menu_id' => $menu_td_demo_custom_menu_id,
	'category_id' => $cat_fashion_id,
	'parent_id' => ''
));

$menu_item_5_id = td_demo_menus::add_category(array(
	'title' => 'Painting',
	'add_to_menu_id' => $menu_td_demo_custom_menu_id,
	'category_id' => $cat_painting_id,
	'parent_id' => ''
));

$menu_item_6_id = td_demo_menus::add_category(array(
	'title' => 'Sculpture',
	'add_to_menu_id' => $menu_td_demo_custom_menu_id,
	'category_id' => $cat_sculpture_id,
	'parent_id' => ''
));


/*  ---------------------------------------------------------------------------- 
	GENERAL SETTINGS
*/
td_demo_misc::update_background('', false);

td_demo_misc::update_background_mobile('tdx_pic_8');

td_demo_misc::update_background_login('');

td_demo_misc::update_background_header('');

td_demo_misc::update_background_footer('');

td_demo_misc::update_footer_text('');

td_demo_misc::update_logo(array('normal' => '','retina' => '','mobile' => '',));

td_demo_misc::update_footer_logo(array('normal' => '','retina' => '',));

td_demo_misc::add_social_buttons(array());

$generated_css = td_css_generator();if (function_exists('tdsp_css_generator')) { $generated_css .= tdsp_css_generator(); }td_util::update_option('tds_user_compile_css', $generated_css);