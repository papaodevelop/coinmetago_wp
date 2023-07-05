<?php

/*  ----------------------------------------------------------------------------
	TDS LOCKERS
*/
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
            'tds_locker_styles' => array(
                'all_tds_border' => '4',
                'all_tds_shadow' => '30',
                'all_tds_shadow_color' => 'rgba(0,0,0,0.1)',
                'tds_submit_btn_bg_color' => '#00846b',
                'tds_pp_checked_color' => '#00846b',
                'tds_pp_msg_links_color' => '#00846b',
                'tds_general_font_family' => '702',
            ),
        )
    )
);


/*  ---------------------------------------------------------------------------- 
	CATEGORIES
*/
$cat_adoption_foster_care_id = td_demo_category::add_category(array(
	'category_name' => 'Adoption &amp; Foster Care',
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

$cat_exclusive_id = td_demo_category::add_category(array(
	'category_name' => 'Exclusive',
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

$cat_family_id = td_demo_category::add_category(array(
	'category_name' => 'Family',
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

$cat_food_nutrition_id = td_demo_category::add_category(array(
	'category_name' => 'Food &amp; Nutrition',
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

$cat_health_id = td_demo_category::add_category(array(
	'category_name' => 'Health',
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

$cat_just_for_dad_id = td_demo_category::add_category(array(
	'category_name' => 'Just for Dad',
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

$cat_just_for_mom_id = td_demo_category::add_category(array(
	'category_name' => 'Just for Mom',
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

$cat_parenting_id = td_demo_category::add_category(array(
	'category_name' => 'Parenting',
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

$cat_relationships_id = td_demo_category::add_category(array(
	'category_name' => 'Relationships',
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

$cat_video_parenting_id = td_demo_category::add_category(array(
	'category_name' => 'Video parenting',
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
$post_adopting_a_son_of_a_different_race_opened_my_eyes_to_the_foster_care_system_id = td_demo_content::add_post(array(
	'title' => 'Adopting a Son of a Different Race Opened My Eyes to the Foster Care System',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_adoption_foster_care_id,),
    'post_meta' => array(
        // 'post meta key' => 'post meta value'
        'tds_lock_content' => true, // '1' or `true` to set post to have locked content..
        'td_post_theme_settings' => array(
            'tds_lock_content' => true,
            'tds_locker' => (int) get_option( 'tds_default_locker_id' ), // this sets the default locker..
        )
    ),
));

$post_mom_and_daughter_shut_down_racist_adoption_questions_in_adorable_instagram_video_id = td_demo_content::add_post(array(
	'title' => 'Mom and Daughter Shut Down Racist Adoption Questions in Adorable Instagram Video',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_adoption_foster_care_id, $cat_parenting_id),
));

$post_i_reached_out_to_my_birth_father_because_of_the_pandemic_and_never_heard_back_id = td_demo_content::add_post(array(
	'title' => 'I Reached Out to My Birth Father Because of the Pandemic and Never Heard Back',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_adoption_foster_care_id,),
));

$post_the_pandemic_is_forcing_hopeful_parents_to_change_their_adoption_plans_id = td_demo_content::add_post(array(
	'title' => 'The Pandemic is Forcing Hopeful Parents to Change Their Adoption Plans',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_adoption_foster_care_id,$cat_exclusive_id,),
));

$post_what_foster_parents_need_to_know_about_adopting_and_affirming_a_queer_child_id = td_demo_content::add_post(array(
	'title' => 'What Foster Parents Need To Know About Adopting and Affirming a Queer Child',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_adoption_foster_care_id,),
));

$post_why_are_queer_parents_still_paying_for_second_parent_adoption_id = td_demo_content::add_post(array(
	'title' => 'Why Are Queer Parents Still Paying for Second-Parent Adoption?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_adoption_foster_care_id,),
));

$post_smart_ways_to_make_sure_your_child_isnt_eating_too_much_salt_id = td_demo_content::add_post(array(
	'title' => 'Smart Ways to Make Sure Your Child Isn\'t Eating Too Much Salt',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_food_nutrition_id, $cat_parenting_id),
));

$post_why_drinking_milk_is_recommended_for_kids_and_what_milk_is_best_id = td_demo_content::add_post(array(
	'title' => 'Why Drinking Milk Is Recommended for Kids and What Milk Is Best',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_food_nutrition_id,),
));

$post_alternatives_to_vitamins_for_picky_eaters_id = td_demo_content::add_post(array(
	'title' => 'Alternatives to Vitamins for Picky Eaters',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_food_nutrition_id,),
));

$post_how_your_family_can_reduce_food_waste_id = td_demo_content::add_post(array(
	'title' => 'How Your Family Can Reduce Food Waste',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_food_nutrition_id,),
));

$post_is_coffee_safe_for_toddlers_to_drink_id = td_demo_content::add_post(array(
	'title' => 'Is Coffee Safe for Toddlers to Drink?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_food_nutrition_id, $cat_parenting_id),
    'post_meta' => array(
        // 'post meta key' => 'post meta value'
        'tds_lock_content' => true, // '1' or `true` to set post to have locked content..
        'td_post_theme_settings' => array(
            'tds_lock_content' => true,
            'tds_locker' => (int) get_option( 'tds_default_locker_id' ), // this sets the default locker..
        )
    ),
));

$post_the_7_best_cookbooks_for_kids_of_2021_according_to_a_dietitian_id = td_demo_content::add_post(array(
	'title' => 'The 7 Best Cookbooks for Kids of 2021, According to a Dietitian',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_exclusive_id,$cat_food_nutrition_id,),
));

$post_working_memory_and_reasoning_tasks_can_strengthen_math_skills_in_children_id = td_demo_content::add_post(array(
	'title' => 'Working Memory and Reasoning Tasks Can Strengthen Math Skills in Children',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_health_id, $cat_parenting_id),
    'post_meta' => array(
        // 'post meta key' => 'post meta value'
        'tds_lock_content' => true, // '1' or `true` to set post to have locked content..
        'td_post_theme_settings' => array(
            'tds_lock_content' => true,
            'tds_locker' => (int) get_option( 'tds_default_locker_id' ), // this sets the default locker..
        )
    ),
));

$post_how_to_talk_to_your_kids_about_pride_id = td_demo_content::add_post(array(
	'title' => 'How to Talk to Your Kids About Pride',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_health_id,),
));

$post_flu_shot_for_pregnant_moms_not_linked_to_adverse_effects_in_babies_id = td_demo_content::add_post(array(
	'title' => 'Flu Shot for Pregnant Moms Not Linked to Adverse Effects in Babies',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_health_id,),
));

$post_rsv_virus_is_spreading_in_southern_states_what_to_know_and_how_to_protect_your_kids_id = td_demo_content::add_post(array(
	'title' => 'RSV Virus Is Spreading in Southern States, What to Know and How to Protect Your Kids',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_health_id, $cat_parenting_id),
));

$post_early_detection_of_head_injuries_in_toddlers_is_vital_for_healthy_development_id = td_demo_content::add_post(array(
	'title' => 'Early Detection of Head Injuries in Toddlers is Vital For Healthy Development',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_health_id,),
));

$post_lack_of_math_education_may_negatively_affect_teen_brain_development_id = td_demo_content::add_post(array(
	'title' => 'Lack of Math Education May Negatively Affect Teen Brain Development',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_health_id,),
));

$post_fun_and_faith_activities_for_celebrating_christmas_id = td_demo_content::add_post(array(
	'title' => 'Fun and Faith Activities for Celebrating Christmas',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_exclusive_id,$cat_family_id,),
));

$post_5_reasons_why_grandparents_are_important_id = td_demo_content::add_post(array(
	'title' => '5 Reasons Why Grandparents Are Important',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_family_id,),
));

$post_improving_your_marriage_as_a_blended_family_couple_id = td_demo_content::add_post(array(
	'title' => 'Improving Your Marriage as a Blended Family Couple',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_family_id, $cat_parenting_id),
    'post_meta' => array(
        // 'post meta key' => 'post meta value'
        'tds_lock_content' => true, // '1' or `true` to set post to have locked content..
        'td_post_theme_settings' => array(
            'tds_lock_content' => true,
            'tds_locker' => (int) get_option( 'tds_default_locker_id' ), // this sets the default locker..
        )
    ),
));

$post_5_ways_to_make_a_change_in_momentum_with_family_relationships_id = td_demo_content::add_post(array(
	'title' => '5 Ways To Make a Change in Momentum With Family Relationships',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_family_id, $cat_parenting_id),
));

$post_giving_your_child_a_love_for_adventure_id = td_demo_content::add_post(array(
	'title' => 'Giving Your Child a Love for Adventure',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_family_id,),
));

$post_managing_expectations_for_grandparents_id = td_demo_content::add_post(array(
	'title' => 'Managing Expectations for Grandparents',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_family_id,),
));

$post_18_minutes_of_parenting_advice_from_your_favorite_comedians_id = td_demo_content::add_post(array(
	'title' => '18 Minutes of Parenting Advice From Your Favorite Comedians',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_video_parenting_id,),
));

$post_smart_parenting_hacks_that_will_make_your_life_easier_id = td_demo_content::add_post(array(
	'title' => 'Smart Parenting Hacks That Will Make Your Life Easier',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_video_parenting_id, $cat_parenting_id),
));

$post_how_to_become_a_better_parent_id = td_demo_content::add_post(array(
	'title' => 'How to Become a Better Parent',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_exclusive_id,$cat_video_parenting_id,),
    'post_meta' => array(
        // 'post meta key' => 'post meta value'
        'tds_lock_content' => true, // '1' or `true` to set post to have locked content..
        'td_post_theme_settings' => array(
            'tds_lock_content' => true,
            'tds_locker' => (int) get_option( 'tds_default_locker_id' ), // this sets the default locker..
        )
    ),
));

$post_our_top_10_parenting_moments_id = td_demo_content::add_post(array(
	'title' => 'Our Top 10 Parenting Moments',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_video_parenting_id, $cat_parenting_id),
));

$post_why_most_parenting_advice_is_wrong_id = td_demo_content::add_post(array(
	'title' => 'Why Most Parenting Advice is Wrong',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_video_parenting_id, $cat_parenting_id),
));

$post_how_to_raise_successful_kids_without_over_parenting_id = td_demo_content::add_post(array(
	'title' => 'How to raise successful kids - without over-parenting',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_video_parenting_id,),
));

$post_dadgoals_check_out_this_amazing_playhouse_one_dad_built_id = td_demo_content::add_post(array(
	'title' => '#DadGoals: Check Out This Amazing Playhouse One Dad Built',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_just_for_dad_id,),
));

$post_dad_builds_star_wars_inspired_baby_furniture_so_incredible_id = td_demo_content::add_post(array(
	'title' => 'Dad Builds \'Star Wars\' - Inspired Baby Furniture So Incredible',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_just_for_dad_id, $cat_parenting_id),
    'post_meta' => array(
        // 'post meta key' => 'post meta value'
        'tds_lock_content' => true, // '1' or `true` to set post to have locked content..
        'td_post_theme_settings' => array(
            'tds_lock_content' => true,
            'tds_locker' => (int) get_option( 'tds_default_locker_id' ), // this sets the default locker..
        )
    ),
));

$post_as_dads_we_need_parent_friends_just_as_much_as_moms_id = td_demo_content::add_post(array(
	'title' => 'As Dads, We Need Parent Friends Just as Much as Moms',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_just_for_dad_id,),
));

$post_i_want_my_sons_to_be_obsessed_with_what_i_loved_as_a_kid_id = td_demo_content::add_post(array(
	'title' => 'I Want My Sons to Be Obsessed With What I Loved As a Kid',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_just_for_dad_id, $cat_parenting_id),
));

$post_im_a_dad_but_my_toddler_calls_me_mama_and_thats_ok_id = td_demo_content::add_post(array(
	'title' => 'I\'m a Dad But My Toddler Calls Me \'Mama\', and That\'s OK',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_exclusive_id,$cat_just_for_dad_id,),
));

$post_three_latino_dads_on_why_fathers_need_better_community_id = td_demo_content::add_post(array(
	'title' => 'Three Latino Dads on Why Fathers Need Better Community',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_just_for_dad_id,),
    'post_meta' => array(
        // 'post meta key' => 'post meta value'
        'tds_lock_content' => true, // '1' or `true` to set post to have locked content..
        'td_post_theme_settings' => array(
            'tds_lock_content' => true,
            'tds_locker' => (int) get_option( 'tds_default_locker_id' ), // this sets the default locker..
        )
    ),
));

$post_think_mom_life_is_easy_this_mama_proves_otherwise_id = td_demo_content::add_post(array(
	'title' => 'Think Mom Life is Easy? This Mama Proves Otherwise',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_just_for_mom_id, $cat_parenting_id),
));

$post_10_tattoo_ideas_for_moms_id = td_demo_content::add_post(array(
	'title' => '10 Tattoo Ideas for Moms',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_exclusive_id,$cat_just_for_mom_id,),
));

$post_20_volunteer_ideas_for_kids_an_age_by_age_guide_to_doing_good_id = td_demo_content::add_post(array(
	'title' => '20 Volunteer Ideas for Kids: An Age-by-Age Guide to Doing Good',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_9',
	'categories_id_array' => array($cat_just_for_mom_id,),
));

$post_for_some_moms_writing_is_the_best_self_care_during_the_pandemic_id = td_demo_content::add_post(array(
	'title' => 'For Some Moms, Writing is the Best Self-Care During the Pandemic',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_10',
	'categories_id_array' => array($cat_just_for_mom_id, $cat_parenting_id),
    'post_meta' => array(
        // 'post meta key' => 'post meta value'
        'tds_lock_content' => true, // '1' or `true` to set post to have locked content..
        'td_post_theme_settings' => array(
            'tds_lock_content' => true,
            'tds_locker' => (int) get_option( 'tds_default_locker_id' ), // this sets the default locker..
        )
    ),
));

$post_7_reasons_moms_end_up_at_the_dentist_and_how_to_avoid_them_id = td_demo_content::add_post(array(
	'title' => '7 Reasons Moms End Up at the Dentist—And How to Avoid Them',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_1',
	'categories_id_array' => array($cat_just_for_mom_id,),
));

$post_3_mom_influencers_share_their_secrets_to_transitioning_to_naturally_curly_hair_id = td_demo_content::add_post(array(
	'title' => '3 Mom Influencers Share Their Secrets to Transitioning to Naturally Curly Hair',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_2',
	'categories_id_array' => array($cat_just_for_mom_id,),
));

$post_8_ways_to_be_a_better_spouse_according_to_a_relationship_expert_id = td_demo_content::add_post(array(
	'title' => '8 Ways to Be a Better Spouse, According to a Relationship Expert',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_3',
	'categories_id_array' => array($cat_relationships_id,),
));

$post_10_tips_for_a_happier_marriage_id = td_demo_content::add_post(array(
	'title' => '10 Tips for a Happier Marriage',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_4',
	'categories_id_array' => array($cat_relationships_id, $cat_parenting_id),
));

$post_how_to_keep_romance_alive_while_under_quarantine_with_your_kids_id = td_demo_content::add_post(array(
	'title' => 'How to Keep Romance Alive While Under Quarantine With Your Kids',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_5',
	'categories_id_array' => array($cat_relationships_id,),
));

$post_do_you_love_your_kids_more_than_your_partner_id = td_demo_content::add_post(array(
	'title' => 'Do You Love Your Kids More Than Your Partner?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_6',
	'categories_id_array' => array($cat_relationships_id, $cat_parenting_id),
));

$post_moms_deserve_to_get_butterflies_in_love_too_id = td_demo_content::add_post(array(
	'title' => 'Moms Deserve to Get Butterflies in Love, Too',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_7',
	'categories_id_array' => array($cat_relationships_id,),
    'post_meta' => array(
        // 'post meta key' => 'post meta value'
        'tds_lock_content' => true, // '1' or `true` to set post to have locked content..
        'td_post_theme_settings' => array(
            'tds_lock_content' => true,
            'tds_locker' => (int) get_option( 'tds_default_locker_id' ), // this sets the default locker..
        )
    ),
));

$post_is_it_ok_to_argue_in_front_of_your_kids_id = td_demo_content::add_post(array(
	'title' => 'Is It OK to Argue in Front Of Your Kids?',
	'file' => 'post_default.txt',
	'featured_image_td_id' => 'td_pic_8',
	'categories_id_array' => array($cat_exclusive_id,$cat_relationships_id,),
));


/*  ---------------------------------------------------------------------------- 
	PAGES
*/
$page_thank_you_id = td_demo_content::add_page(array(
	'title' => 'Thank you',
	'file' => 'thank_you.txt',
));

$page_homepage_id = td_demo_content::add_page(array(
	'title' => 'Homepage',
	'file' => 'homepage.txt',
	'homepage' => true,
));

$page_privacy_policy_id = td_demo_content::add_page(array(
	'title' => 'Privacy Policy',
	'file' => 'privacy_policy.txt',
	'template' => 'default',
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
	'title' => 'News',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'page_id' => $page_homepage_id,
	'parent_id' => ''
));

$menu_item_1_id = td_demo_menus::add_mega_menu(array(
	'title' => 'Parenting',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_parenting_id,
	'parent_id' => ''
), true);

$menu_item_2_id = td_demo_menus::add_category(array(
	'title' => 'Just for Mom',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_just_for_mom_id,
	'parent_id' => ''
));

$menu_item_3_id = td_demo_menus::add_category(array(
	'title' => 'Just for Dad',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_just_for_dad_id,
	'parent_id' => ''
));

$menu_item_4_id = td_demo_menus::add_category(array(
	'title' => 'Relationships',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_relationships_id,
	'parent_id' => ''
));

$menu_item_5_id = td_demo_menus::add_category(array(
	'title' => 'Video parenting',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_video_parenting_id,
	'parent_id' => ''
));

$menu_item_6_id = td_demo_menus::add_category(array(
	'title' => 'Exclusive',
	'add_to_menu_id' => $menu_td_demo_header_menu_id,
	'category_id' => $cat_exclusive_id,
	'parent_id' => ''
));


/*  ---------------------------------------------------------------------------- 
	CLOUD TEMPLATES
*/
$template_tag_template_parenting_id = td_demo_content::add_cloud_template(array(
	'title' => 'Tag Template - Parenting',
	'file' => 'tag_cloud_template.txt',
	'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_parenting_id);


$template_date_template_parenting_id = td_demo_content::add_cloud_template(array(
	'title' => 'Date Template - Parenting',
	'file' => 'date_cloud_template.txt',
	'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_parenting_id);


$template_404_template_parenting_id = td_demo_content::add_cloud_template(array(
	'title' => '404 Template - Parenting',
	'file' => '404_cloud_template.txt',
	'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_parenting_id);


$template_search_template_parenting_id = td_demo_content::add_cloud_template(array(
	'title' => 'Search Template - Parenting',
	'file' => 'search_cloud_template.txt',
	'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_parenting_id);


$template_author_template_parenting_id = td_demo_content::add_cloud_template(array(
	'title' => 'Author Template - Parenting',
	'file' => 'author_cloud_template.txt',
	'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_parenting_id );

$template_category_template_parenting_id = td_demo_content::add_cloud_template(array(
	'title' => 'Category Template - Parenting',
	'file' => 'cat_cloud_template.txt',
	'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_parenting_id);


$template_single_template_parenting_id = td_demo_content::add_cloud_template(array(
	'title' => 'Single Template - Parenting',
	'file' => 'post_cloud_template.txt',
	'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_template_parenting_id);


$template_footer_template_parenting_id = td_demo_content::add_cloud_template(array(
	'title' => 'Footer Template - Parenting',
	'file' => 'footer_cloud_template.txt',
	'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_template_parenting_id);


$template_header_template_parenting_id = td_demo_content::add_cloud_template(array(
	'title' => 'Header Template - Parenting',
	'file' => 'header_cloud_template.txt',
	'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_parenting_id);



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

td_demo_misc::add_social_buttons(array('behance' => '#','evernote' => '#','facebook' => '#','instagram' => '#','vk' => '#',));

$generated_css = td_css_generator(); 
if ( function_exists('tdsp_css_generator') ) { 
	$generated_css .= tdsp_css_generator();
}
td_util::update_option( 'tds_user_compile_css', $generated_css );
