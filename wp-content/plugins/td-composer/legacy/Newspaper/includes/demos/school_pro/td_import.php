<?php 

/*  ---------------------------------------------------------------------------- 
	CATEGORIES
*/
$cat_education_id = td_demo_category::add_category(array(
	'category_name' => 'Education',
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

$cat_learning_id = td_demo_category::add_category(array(
    'category_name' => 'Learning',
    'parent_id' => $cat_education_id,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => '',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));
$cat_students_id = td_demo_category::add_category(array(
    'category_name' => 'Students',
    'parent_id' => $cat_education_id,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => '',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_teachers_id = td_demo_category::add_category(array(
    'category_name' => 'Teachers',
    'parent_id' => $cat_education_id,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => '',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_universities_id = td_demo_category::add_category(array(
    'category_name' => 'Universities',
    'parent_id' => $cat_education_id,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => '',
    'boxed_layout' => 'hide',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar
));

$cat_online_id = td_demo_category::add_category(array(
	'category_name' => 'Online',
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

$cat_restrictions_id = td_demo_category::add_category(array(
	'category_name' => 'Restrictions',
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

$cat_safety_id = td_demo_category::add_category(array(
	'category_name' => 'Safety',
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

$cat_schools_id = td_demo_category::add_category(array(
	'category_name' => 'Schools',
	'parent_id' => $cat_education_id,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'boxed_layout' => 'hide',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID 
	'tdc_sidebar_pos' => '', //sidebar_left, sidebar_right, no_sidebar 
));

$cat_solutions_id = td_demo_category::add_category(array(
	'category_name' => 'Solutions',
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


$post_french_children_head_back_to_school_as_infections_rise_id = td_demo_content::add_post(array(
    'title' => 'French children head back to school as infections rise',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_6',
    'categories_id_array' => array($cat_learning_id,$cat_online_id,$cat_restrictions_id,$cat_safety_id,$cat_schools_id,$cat_solutions_id,$cat_students_id,$cat_teachers_id,$cat_universities_id,),
));

$post_european_school_in_brussels_returns_for_first_time_id = td_demo_content::add_post(array(
    'title' => 'European School in Brussels returns for first time',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_7',
    'categories_id_array' => array($cat_learning_id,$cat_online_id,$cat_restrictions_id,$cat_safety_id,$cat_schools_id,$cat_solutions_id,$cat_students_id,$cat_teachers_id,$cat_universities_id,),
));

$post_uk_children_think_penguins_and_tigers_live_on_farms_id = td_demo_content::add_post(array(
    'title' => 'UK children think penguins and tigers live on farms',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_8',
    'categories_id_array' => array($cat_learning_id,$cat_online_id,$cat_restrictions_id,$cat_safety_id,$cat_schools_id,$cat_solutions_id,$cat_students_id,$cat_teachers_id,$cat_universities_id,),
));

$post_girls_in_french_high_schools_dress_provocatively_id = td_demo_content::add_post(array(
    'title' => 'Girls in French high schools dress provocatively',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_9',
    'categories_id_array' => array($cat_learning_id,$cat_online_id,$cat_restrictions_id,$cat_safety_id,$cat_schools_id,$cat_solutions_id,$cat_students_id,$cat_teachers_id,$cat_universities_id,),
));

$post_children_protest_against_closure_of_school_id = td_demo_content::add_post(array(
    'title' => 'Children protest against closure of school',
    'file' => 'post_default.txt',
    'featured_image_td_id' => 'td_pic_10',
    'categories_id_array' => array($cat_learning_id,$cat_online_id,$cat_restrictions_id,$cat_safety_id,$cat_schools_id,$cat_solutions_id,$cat_students_id,$cat_teachers_id,$cat_universities_id,),
));

$post_td_post_more_and_more_students_missing_school_in_brazil_id = td_demo_content::add_post(array(
	'title' => 'More and more students missing school in Brazil',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_safety_id,),
));

$post_td_post_cancelled_hundreds_of_students_set_for_rent_protest_id = td_demo_content::add_post(array(
	'title' => 'Cancelled: Hundreds of students set for rent protest',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_safety_id,),
));

$post_td_post_volunteers_overwhelming_the_authorities_with_help_id = td_demo_content::add_post(array(
	'title' => 'Volunteers overwhelming the authorities with help',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_safety_id,),
));

$post_td_post_the_unknown_is_the_scariest_part_for_students_id = td_demo_content::add_post(array(
	'title' => 'The unknown is the scariest part for students',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_safety_id,),
));

$post_td_post_one_in_six_secondaries_send_pupils_home_with_covid_19_id = td_demo_content::add_post(array(
	'title' => 'One in six secondaries send pupils home with COVID-19',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_safety_id,),
));

$post_td_post_we_have_to_do_everything_to_keep_schools_open_id = td_demo_content::add_post(array(
	'title' => 'We have to do everything to keep schools open',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_restrictions_id,),
));

$post_td_post_four_schools_shut_sending_3500_pupils_home_id = td_demo_content::add_post(array(
	'title' => 'Four schools shut sending 3,500 pupils home',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_restrictions_id,),
));

$post_td_post_2021_exam_students_facing_difficult_situation_id = td_demo_content::add_post(array(
	'title' => '2021 exam students facing difficult situation',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_restrictions_id,),
));

$post_td_post_generation_covid_is_hit_hard_by_the_pandemic_id = td_demo_content::add_post(array(
	'title' => 'Generation Covid is hit hard by the pandemic',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_restrictions_id,),
));

$post_td_post_how_are_young_peoples_future_careers_affected_id = td_demo_content::add_post(array(
	'title' => 'How are young people\'s future careers affected?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_restrictions_id,),
));

$post_td_post_consultations_over_schools_system_reform_plans_id = td_demo_content::add_post(array(
	'title' => 'Consultations over schools system reform plans',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_solutions_id,),
));

$post_td_post_education_reviews_found_as_a_catalyst_for_change_id = td_demo_content::add_post(array(
	'title' => 'Education reviews found as a catalyst for change',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_solutions_id,),
));

$post_td_post_will_next_summers_exams_be_cancelled_completely_id = td_demo_content::add_post(array(
	'title' => 'Will next summer\'s exams be cancelled completely?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_solutions_id,),
));

$post_td_post_millions_given_to_expand_covid_19_testing_in_schools_id = td_demo_content::add_post(array(
	'title' => 'Millions given to expand COVID-19 testing in schools',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_solutions_id,),
));

$post_td_post_councils_have_already_allocated_school_meals_budgets_id = td_demo_content::add_post(array(
	'title' => 'Councils have already allocated school meals budgets',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_solutions_id,),
));

$post_td_post_powers_adopted_to_require_schools_to_teach_online_id = td_demo_content::add_post(array(
	'title' => 'Powers adopted to require schools to teach online',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_online_id,),
));

$post_td_post_new_york_schools_to_cancel_in_person_classes_id = td_demo_content::add_post(array(
	'title' => 'New York schools to cancel in-person classes',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_online_id,),
));

$post_td_post_a_day_in_the_life_of_digital_learning_student_id = td_demo_content::add_post(array(
	'title' => 'A day in the life of digital learning student',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_online_id,),
));

$post_td_post_what_are_kids_saying_about_the_virtual_courses_id = td_demo_content::add_post(array(
	'title' => 'What are kids saying about the virtual courses',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_online_id,),
));

$post_td_post_schools_use_online_learning_to_help_students_id = td_demo_content::add_post(array(
	'title' => 'Schools use online learning to help students',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_online_id,),
));

$post_td_post_laptop_allocation_started_for_some_schools_id = td_demo_content::add_post(array(
	'title' => 'Laptop allocation started for some schools',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_learning_id,),
));

$post_td_post_its_going_to_be_a_tough_half_term_week_id = td_demo_content::add_post(array(
	'title' => 'It\'s going to be a tough half-term week',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_learning_id,),
));

$post_td_post_families_struggle_to_meet_even_basic_needs_id = td_demo_content::add_post(array(
	'title' => 'Families struggle to meet even basic needs',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_learning_id,),
));

$post_td_post_cities_where_the_most_people_graduate_school_id = td_demo_content::add_post(array(
	'title' => 'Cities where the most people graduate school',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_learning_id,),
));

$post_td_post_university_covid_19_cases_not_contained_effectively_id = td_demo_content::add_post(array(
	'title' => 'University COVID-19 cases not contained effectively',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_universities_id,),
));

$post_td_post_mom_started_sending_lots_of_books_to_schools_id = td_demo_content::add_post(array(
	'title' => 'Mom started sending lots of books to schools',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_learning_id,),
));

$post_td_post_the_pandemic_is_suspending_college_spring_semesters_id = td_demo_content::add_post(array(
	'title' => 'The pandemic is suspending college spring semesters',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_universities_id,),
));

$post_td_post_students_attacked_in_university_online_meeting_id = td_demo_content::add_post(array(
	'title' => 'Students attacked in university online meeting',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_universities_id,),
));

$post_td_post_prestigious_university_campus_party_students_fined_id = td_demo_content::add_post(array(
	'title' => 'Prestigious university campus party students fined',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_universities_id,),
));

$post_td_post_covid_19_pushes_college_students_to_drop_out_id = td_demo_content::add_post(array(
	'title' => 'COVID-19 pushes college students to drop out',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_universities_id,),
));

$post_td_post_how_does_the_free_school_meals_scheme_work_in_africa_id = td_demo_content::add_post(array(
	'title' => 'How does the free school meals scheme work in Africa?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_schools_id,),
));

$post_td_post_secondary_school_disruption_getting_worse_in_england_id = td_demo_content::add_post(array(
	'title' => 'Secondary school disruption getting worse in England',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_schools_id,),
));

$post_td_post_leaders_refuse_to_move_against_school_meal_vouchers_id = td_demo_content::add_post(array(
	'title' => 'Leaders refuse to move against school meal vouchers',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_schools_id,),
));

$post_td_post_these_are_the_best_ranked_high_schools_in_every_state_id = td_demo_content::add_post(array(
	'title' => 'These are the best-ranked high schools in every state',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_schools_id,),
));

$post_td_post_superintendent_resigns_during_racism_investigation_id = td_demo_content::add_post(array(
	'title' => 'Superintendent resigns during racism investigation',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_schools_id,),
));

$post_td_post_quality_of_lockdown_lessons_divides_teachers_id = td_demo_content::add_post(array(
	'title' => 'Quality of lockdown lessons divides teachers',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_teachers_id,),
));

$post_td_post_teachers_terrified_by_rising_coronavirus_rates_id = td_demo_content::add_post(array(
	'title' => 'Teachers terrified by rising coronavirus rates',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_teachers_id,),
));

$post_td_post_teachers_may_not_be_allowed_home_for_christmas_id = td_demo_content::add_post(array(
	'title' => 'Teachers may not be allowed home for Christmas',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_teachers_id,),
));

$post_teachers_are_preparing_their_online_courses_id = td_demo_content::add_post(array(
	'title' => 'Teachers are preparing their online courses',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_teachers_id,),
));

$post_td_post_students_fed_up_with_being_blamed_for_virus_spike_id = td_demo_content::add_post(array(
	'title' => 'Students fed up with being blamed for virus spike',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_students_id,),
));

$post_td_post_mass_retirement_of_teachers_hasnt_happened_id = td_demo_content::add_post(array(
	'title' => 'Mass retirement of teachers hasn\'t happened',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_teachers_id,),
));

$post_td_post_college_athletes_without_sports_feel_abandoned_id = td_demo_content::add_post(array(
	'title' => 'College athletes without sports feel abandoned',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_students_id,),
));

$post_td_post_are_disabled_uni_students_getting_enough_help_id = td_demo_content::add_post(array(
	'title' => 'Are disabled uni students getting enough help?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_students_id,),
));

$post_td_post_will_students_stay_home_and_study_after_christmas_id = td_demo_content::add_post(array(
	'title' => 'Will students stay home and study after Christmas?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_students_id,),
));

$post_td_post_west_coast_students_face_covid_19_and_wildfires_id = td_demo_content::add_post(array(
	'title' => 'West Coast students face COVID-19 and wildfires',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_students_id,),
));



/*  ---------------------------------------------------------------------------- 
	MENUS
*/
$menu_td_demo_header_menu_id = td_demo_menus::create_menu('td-demo-header-menu', ''); 


/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/

$template_header_overlay_school_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Header - School PRO',
    'file' => 'header_cloud_template.txt',
    'template_type' => 'header',
));


$template_header_main_school_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Header Main - School PRO',
    'file' => 'header_cloud_template_main.txt',
    'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_main_school_pro_id);


$template_footer_school_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Footer - School PRO',
    'file' => 'footer_cloud_template.txt',
    'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_school_pro_id);


$template_single_post_school_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Single Post - School PRO',
    'file' => 'post_cloud_template.txt',
    'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_post_school_pro_id);


$template_category_school_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Category - School PRO',
    'file' => 'cat_cloud_template.txt',
    'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_school_pro_id);


$template_404_school_pro_id = td_demo_content::add_cloud_template(array(
    'title' => '404 - School PRO',
    'file' => '404_cloud_template.txt',
    'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_school_pro_id);


$template_author_school_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Author - School PRO',
    'file' => 'author_cloud_template.txt',
    'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_school_pro_id);


$template_search_school_pro_id = td_demo_content::add_cloud_template(array(
	'title' => 'Search - School PRO',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_school_pro_id);


$template_tag_school_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Tag - School PRO',
    'file' => 'tag_cloud_template.txt',
    'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_school_pro_id);


$template_date_school_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Date - School PRO',
    'file' => 'date_cloud_template.txt',
    'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_school_pro_id);


/*  ----------------------------------------------------------------------------
	PAGES
*/
$page_home_id = td_demo_content::add_page(array(
    'title' => 'Home',
    'file' => 'home.txt',
    'header_template_id' => $template_header_overlay_school_pro_id,
    'homepage' => true,
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

$menu_item_1_id = td_demo_menus::add_mega_menu(array(
    'title' => 'Education',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_education_id,
    'parent_id' => ''
));

$menu_item_2_id = td_demo_menus::add_category(array(
    'title' => 'Online',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_online_id,
    'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_category(array(
    'title' => 'Restrictions',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_restrictions_id,
    'parent_id' => ''
));

$menu_item_4_id = td_demo_menus::add_category(array(
    'title' => 'Safety',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_safety_id,
    'parent_id' => ''
));

$menu_item_5_id = td_demo_menus::add_category(array(
    'title' => 'Solutions',
    'add_to_menu_id' => $menu_td_demo_header_menu_id,
    'category_id' => $cat_solutions_id,
    'parent_id' => ''
));




/*  ---------------------------------------------------------------------------- 
	GENERAL SETTINGS
*/
td_demo_misc::update_background('', false);

td_demo_misc::update_background_mobile('td_pic_9');

td_demo_misc::update_background_login('');

td_demo_misc::update_background_header('');

td_demo_misc::update_background_footer('');

td_demo_misc::update_footer_text('');

td_demo_misc::update_logo(array('normal' => '','retina' => '','mobile' => '',));

td_demo_misc::update_footer_logo(array('normal' => '','retina' => '',));

td_demo_misc::add_social_buttons(array());
