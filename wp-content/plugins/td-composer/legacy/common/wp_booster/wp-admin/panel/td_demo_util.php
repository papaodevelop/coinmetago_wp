<?php


class td_demo_base {


	/**
	 * Checks if one of the needles from $needle_array is found in the $haystack
	 * @param $haystack
	 * @param $needle_array
	 *
	 * @return bool
	 */
	protected static function multi_instring($haystack, $needle_array) {
		foreach ($needle_array as $needle) {
			if (strpos($haystack, $needle) !== false) {
				return $needle;
			}
		}

		return false;
	}


	/**
	 * If one of the $requiered_keys is missing from the $received_array we will kill the execution
	 * @param $class - the calling __CLASS__
	 * @param $function - the calling __FUNCTION__
	 * @param $received_array - the array of parameter_key => 'value' received from the caller
	 * @param $requiered_keys - the expected array of parameter_key => 'error_string'
	 */
	protected static function check_params($class, $function, $received_array, $requiered_keys) {
		foreach ($requiered_keys as $requiered_key => $requiered_msg) {
			if (empty($received_array[$requiered_key])) {
				self::kill($class, $function, $requiered_key . ' - ' . $requiered_msg, $received_array);
			}
		}
	}


	/**
	 * kill the execution and show an error message
	 * @param $class
	 * @param $function
	 * @param $msg
	 * @param string $additional_info
	 */
	protected static function kill($class, $function, $msg, $additional_info = '') {
		echo PHP_EOL . 'ERROR - '. $class . '::' . $function . ' - ' . $msg;

		if (!empty($additional_info)) {
			if (is_array($additional_info)) {
				echo PHP_EOL . 'More info:' . PHP_EOL;
				foreach ($additional_info as $key => $value) {
					echo '<!-- info -->' . $key . ' - ' . $value . PHP_EOL;
				}
			}
		}

		die;
	}
}


/**
 * Class td_demo_history - saves and restores a history point for our demos.
 */
class td_demo_history extends td_demo_base {
    private $td_demo_history = array();

    /**
     * read the current history
     */
    function __construct() {
        $this->td_demo_history = get_option(TD_THEME_NAME . '_demo_history');
    }


	/**
	 * saves one demo history ONLY. If we already have one saved, it will do nothing
	 */
    function save_all() {

	    // do not save another demo history if we already have one
        if (isset($this->td_demo_history['demo_settings_date'])) {
            return;
        }

        $local_td_demo_history = array();

        $local_td_demo_history['page_on_front'] = get_option('page_on_front');
        $local_td_demo_history['show_on_front'] = get_option('show_on_front');
        $local_td_demo_history['nav_menu_locations'] = get_theme_mod('nav_menu_locations');

        $sidebar_widgets = get_option('sidebars_widgets');
        $local_td_demo_history['sidebars_widgets'] = $sidebar_widgets;

        $used_widgets = $this->get_used_widgets($sidebar_widgets);


        if (is_array($used_widgets)) {
            foreach ($used_widgets as $used_widget) {
                $local_td_demo_history['used_widgets'][$used_widget] = get_option('widget_' . $used_widget);
            }
        }

        $local_td_demo_history['theme_options'] = get_option(TD_THEME_OPTIONS_NAME);
        $local_td_demo_history['td_social_networks'] = get_option('td_social_networks');
        $local_td_demo_history['demo_settings_date'] = time();
        update_option(TD_THEME_NAME . '_demo_history', $local_td_demo_history);
    }


	/**
	 * Restores a demo history point. After the restore, the saved state is deleted from the database
	 */
    function restore_all() {
        update_option('page_on_front', $this->td_demo_history['page_on_front']);
        update_option('show_on_front',  $this->td_demo_history['show_on_front']);
        set_theme_mod('nav_menu_locations', $this->td_demo_history['nav_menu_locations']);
        update_option('sidebars_widgets', $this->td_demo_history['sidebars_widgets']);

        if (isset($this->td_demo_history['used_widgets']) and is_array($this->td_demo_history['used_widgets'])) {
            foreach ($this->td_demo_history['used_widgets'] as $used_widget => $used_widget_value) {
                update_option('widget_' . $used_widget, $used_widget_value);
            }
        }


	    $td_options = &td_options::get_all_by_ref();

        //apply td_cake variables
        $dbks = array_keys(td_util::$e_keys);
        $dbk = td_handle::get_var($dbks[1]);
        $dbm = td_handle::get_var($dbks[0]);
        if (!empty($td_options[$dbm])) {
            $settings[$dbm] = $td_options[$dbm];
        }
        if (!empty($td_options[$dbk])) {
            $settings[$dbk] = $td_options[$dbk];
        }

		// put the old theme settings back
	    $td_options = $this->td_demo_history['theme_options'];

        if (!empty($settings)) {
		    foreach ($settings as $setting_id => $setting_value) {
		    	$td_options[$setting_id] = $setting_value;
	        }
	    }

	    td_options::schedule_save();

	    //update_option(TD_THEME_OPTIONS_NAME, td_global::$td_options);

	    // ?
        update_option('td_social_networks', $this->td_demo_history['td_social_networks']);

        // delete the demo history
        delete_option(TD_THEME_NAME . '_demo_history');
    }


	/**
	 * returns the widget names used on each sidebar .... not 100% sure
	 * @param $sidebar_widgets_option
	 * @return array
	 */
    private function get_used_widgets($sidebar_widgets_option) {
        $used_widgets = array();
        if ( is_array($sidebar_widgets_option) ) {
            foreach ( $sidebar_widgets_option as $sidebar => $widgets ) {
                if ( is_array($widgets) ) {
                    foreach ( $widgets as $widget ) {
                        $used_widgets[]= $this->_get_widget_id_base($widget);
                    }
                }
            }
        }

        return array_unique($used_widgets);
    }

    private function _get_widget_id_base($id) {
        return preg_replace( '/-[0-9]+$/', '', $id );
    }
}






/**
 * Class td_demo_state - keeps the demo state. What demo is installed and how it's installed (full or no_content). We have a similar function in
 * @see td_util::get_loaded_demo_id for the front end
 */
class td_demo_state extends td_demo_base {


	/**
	 * updates the current installed demo state
	 * @param $demo_id string - the demo id that is installed
	 * @param $demo_install_type string "empty"|full|no_content  (full - a full install, no_content - a settings only install)
	 */
    static function update_state($demo_id, $demo_install_type) {
        $new_state = array(
            'demo_id' => $demo_id,
            'demo_install_type' => $demo_install_type
        );
        update_option(TD_THEME_NAME . '_demo_state', $new_state);
    }



    /**
     * @return bool|array
     *  false - if there is no demo installed
     *  array - array(
	                    'demo_id' => '',
	                    'demo_install_type' => ''    "empty"|full|no_content
                    );
     */
    static function get_installed_demo() {
        $demo_state = get_option(TD_THEME_NAME . '_demo_state');
        if (isset($demo_state['demo_install_type']) and $demo_state['demo_install_type'] != '') {
            return $demo_state;
        }
        return false;
    }
}






/**
 * Class td_demo_misc - misc stuff for demos. All the settings form here are removed via the td_demo_history when the theme settings are loaded back.
 */
class td_demo_misc extends td_demo_base {

    /**
     * updates the logo of the site, will be rollback via the td_demo_history when the theme settings are loaded back
     * @param $logo_params array
     */
    static function update_logo($logo_params) {

        if(empty($logo_params['normal'])) {
            td_util::update_option('tds_logo_upload', '');
        } else {
            td_util::update_option('tds_logo_upload', td_demo_media::get_image_url_by_td_id($logo_params['normal']));
        }

        if (empty($logo_params['retina'])) {
            td_util::update_option('tds_logo_upload_r', '');
        } else {
            td_util::update_option('tds_logo_upload_r', td_demo_media::get_image_url_by_td_id($logo_params['retina']));
        }

        if (empty($logo_params['mobile'])) {
            td_util::update_option('tds_logo_menu_upload', '');
        } else {
            td_util::update_option('tds_logo_menu_upload', td_demo_media::get_image_url_by_td_id($logo_params['mobile']));
        }
    }


	/**
	 * Adds the social icons to the panel.
	 * @param $social_icons
	 */
    static function add_social_buttons($social_icons) {
        td_options::update_array('td_social_networks', $social_icons);
    }


	/**
	 * remove all the ads from the theme options. Must be called before adding custom ads
	 */
    static function clear_all_ads() {
        td_options::update_array('td_ads', array());
    }


	/**
	 * ads an ad image via a td_pic_id to an ad spot
	 * @param $ad_spot_name - the adspot id that you want to use. You should get this from the panel or other demos
	 * @param $td_image_id
	 */
    static function add_ad_image($ad_spot_name, $td_image_id, $td_ad_width = '', $td_ad_height = '') {
        $td_ad_spots = td_options::get_array('td_ads');
        if ( ! empty( $td_ad_width ) ) {
            $td_ad_width = ' width="' . $td_ad_width . '"';
        }
        if ( ! empty( $td_ad_height ) ) {
            $td_ad_height = ' height="' . $td_ad_height . '"';
        }
        $new_ad_spot['ad_code']= '<div class="td-all-devices"><a href="https://www.google.com"><img alt="Google search engine" ' . 'src="' . td_demo_media::get_image_url_by_td_id($td_image_id) . '"' . $td_ad_width . $td_ad_height . '/></a></div>';
        $new_ad_spot['current_ad_type']= 'other';
        $td_ad_spots[strtolower($ad_spot_name)] = $new_ad_spot;
        td_options::update_array('td_ads', $td_ad_spots);
    }




    static function update_background($td_image_id, $stretch = true) {
        if ($td_image_id == '') {
            td_util::update_option('tds_site_background_image', '');
        }
        td_util::update_option('tds_site_background_image', td_demo_media::get_image_url_by_td_id($td_image_id));

        if ($stretch === true) {
            td_util::update_option('tds_stretch_background', 'yes');
        }
    }


    static function update_background_header($td_image_id) {
        if ($td_image_id == '') {
            td_util::update_option('tds_header_background_image', '');
        }
        td_util::update_option('tds_header_background_image', td_demo_media::get_image_url_by_td_id($td_image_id));
    }


    static function update_background_footer($td_image_id) {
        if ($td_image_id == '') {
            td_util::update_option('tds_footer_background_image', '');
        }
        td_util::update_option('tds_footer_background_image', td_demo_media::get_image_url_by_td_id($td_image_id));
    }


    static function update_background_mobile($td_image_id) {
        if ($td_image_id == '') {
            td_util::update_option('tds_mobile_background_image', '');
        }
        td_util::update_option('tds_mobile_background_image', td_demo_media::get_image_url_by_td_id($td_image_id));
    }

    static function update_background_login($td_image_id) {
        if ($td_image_id == '') {
            td_util::update_option('tds_login_background_image', '');
        }
        td_util::update_option('tds_login_background_image', td_demo_media::get_image_url_by_td_id($td_image_id));
    }


    /**
     * updates the text form the footer
     * @param $new_text
     */
    static function update_footer_text($new_text) {
        td_util::update_option('tds_footer_text', $new_text);
    }


    /**
     * updates the footer logo, this one can also clear the logo
     * @param $logo_params
     */
    static function update_footer_logo($logo_params) {
        if (empty($logo_params['normal'])) {
            td_util::update_option('tds_footer_logo_upload', '');
        } else {
            td_util::update_option('tds_footer_logo_upload', td_demo_media::get_image_url_by_td_id($logo_params['normal']));
        }

        if (empty($logo_params['retina'])) {
            td_util::update_option('tds_footer_retina_logo_upload', '');
        } else {
            td_util::update_option('tds_footer_retina_logo_upload', td_demo_media::get_image_url_by_td_id($logo_params['retina']));
        }
    }


    /**
     * resets themes uploaded images for demo export
     */
    static function clear_uploads_for_demo_export() {

        //header logos
        td_util::update_option('tds_logo_upload', '');
        td_util::update_option('tds_logo_upload_r', '');

        //favicon
        td_util::update_option('tds_favicon_upload', '');

        //mobile logos
        td_util::update_option('tds_logo_menu_upload', '');
        td_util::update_option('tds_logo_menu_upload_r', '');

        //ios bookmarklets
        td_util::update_option('tds_ios_icon_76', '');
        td_util::update_option('tds_ios_icon_114', '');
        td_util::update_option('tds_ios_icon_120', '');
        td_util::update_option('tds_ios_icon_144', '');
        td_util::update_option('tds_ios_icon_152', '');

        //backgrounds
        td_util::update_option('tds_site_background_image', '');
        td_util::update_option('tds_header_background_image', '');
        td_util::update_option('tds_mobile_background_image', '');
        td_util::update_option('tds_login_background_image', '');
        td_util::update_option('tds_footer_background_image', '');

        //footer logos
        td_util::update_option('tds_footer_logo_upload', '');
        td_util::update_option('tds_footer_retina_logo_upload', '');

        //categories bg img
        $td_options = &td_options::get_all_by_ref();
        $categories = get_categories( array(
                'hide_empty' => 0
            ));

        foreach ( $categories as $category ) {
            if ( isset ($td_options['category_options'][$category->cat_ID]['tdc_image']) ) {
                $td_options['category_options'][$category->cat_ID]['tdc_image'] = '';
            }
        }

        $generated_css = td_css_generator();

        if (function_exists('tdsp_css_generator')) {
        	$generated_css .= tdsp_css_generator();
        }

        //recompile user css
        td_options::update('tds_user_compile_css', $generated_css);

    }

    static function update_global_category_template( $template_id ) {
        $td_options = &td_options::get_all_by_ref();
        $td_options['tdb_category_template'] = $template_id;
    }

    static function update_individual_category_template( $category_id, $template_id ) {
        $td_options = &td_options::get_all_by_ref();
        $td_options['category_options'][$category_id]['tdb_category_template'] = $template_id;
    }

    static function update_global_author_template( $template_id ) {
        $td_options = &td_options::get_all_by_ref();
        $td_options['tdb_author_template'] = $template_id;
    }

    static function update_individual_author_template( $author_id, $tdb_template_id ) {
        $td_options = &td_options::get_all_by_ref();
        $td_options['tdb_author_templates'][$author_id] = $tdb_template_id;
    }

    static function update_global_404_template( $template_id ) {
        $td_options = &td_options::get_all_by_ref();
        $td_options['tdb_404_template'] = $template_id;
    }

    static function update_global_search_template( $template_id ) {
        $td_options = &td_options::get_all_by_ref();
        $td_options['tdb_search_template'] = $template_id;
    }

    static function update_global_header_template( $template_id ) {
        $td_options = &td_options::get_all_by_ref();
        $td_options['tdb_header_template'] = $template_id;
    }

    static function update_global_footer_template( $template_id ) {
        $td_options = &td_options::get_all_by_ref();
        $td_options['tdb_footer_template'] = $template_id;
    }

    static function update_global_date_template( $template_id ) {
        $td_options = &td_options::get_all_by_ref();
        $td_options['tdb_date_template'] = $template_id;
    }

    static function update_global_tag_template( $template_id ) {
        $td_options = &td_options::get_all_by_ref();
        $td_options['tdb_tag_template'] = $template_id;
    }

    static function update_global_attachment_template( $template_id ) {
        $td_options = &td_options::get_all_by_ref();
        $td_options['tdb_attachment_template'] = $template_id;
    }

    static function update_global_woo_product_template( $template_id ) {
        $td_options = &td_options::get_all_by_ref();
        $td_options['tdb_woo_product_template'] = $template_id;
    }

    static function update_global_woo_archive_template( $template_id ) {
        $td_options = &td_options::get_all_by_ref();
        $td_options['tdb_woo_archive_template'] = $template_id;
    }

    static function update_global_woo_search_archive_template( $template_id ) {
        $td_options = &td_options::get_all_by_ref();
        $td_options['tdb_woo_search_archive_template'] = $template_id;
    }

    static function update_global_woo_shop_base_template( $template_id ) {
        $td_options = &td_options::get_all_by_ref();
        $td_options['tdb_woo_shop_base_template'] = $template_id;
    }

    static function update_global_cpt_template( $template_id, $cpt ) {
        $td_options = &td_options::get_all_by_ref();
        $td_options['td_cpt'][$cpt]['td_default_site_post_template'] = $template_id;
    }

    static function update_global_cpt_tax_template( $template_id, $tax ) {
        $td_options = &td_options::get_all_by_ref();
        $td_options['td_cpt_tax'][$tax]['tdb_category_template'] = $template_id;
    }
}






class td_demo_category extends td_demo_base {

    static function add_category($params_array) {

    	// it's probably safe to also schedule a save here
	    $td_options = &td_options::get_all_by_ref();


		self::check_params(__CLASS__, __FUNCTION__, $params_array, array(
		    'category_name' => 'Param is requiered!',
		));


	    if (empty($params_array['parent_id'])) {
		    $new_cat_id = wp_create_category($params_array['category_name']);
	    } else {
		    $new_cat_id = wp_create_category($params_array['category_name'], $params_array['parent_id']);
	    }



        //update category descriptions
        if(!empty($params_array['description'])) {
            wp_update_term($new_cat_id, 'category', array(
                'description' => $params_array['description']
            ));
        }


        // update the category top post style
        if (!empty($params_array['top_posts_style'])) {
	        $td_options['category_options'][$new_cat_id]['tdc_category_top_posts_style'] = $params_array['top_posts_style'];
        }


        // update the category top post grid style
        if (!empty($params_array['tdc_category_td_grid_style'])) {
	        $td_options['category_options'][$new_cat_id]['tdc_category_td_grid_style'] = $params_array['tdc_category_td_grid_style'];
        }

        if (!empty($params_array['tdc_color'])) {
	        $td_options['category_options'][$new_cat_id]['tdc_color'] = $params_array['tdc_color'];
        }


        // update the category template
        if (!empty($params_array['category_template'])) {
	        $td_options['category_options'][$new_cat_id]['tdc_category_template'] = $params_array['category_template'];
        }

        // update the cloud category template
        if (!empty($params_array['category_cloud_template'])) {
	        $td_options['category_options'][$new_cat_id]['tdb_category_template'] = 'tdb_template_' . $params_array['category_cloud_template'];
        }

        // update the cloud post template
        if (!empty($params_array['post_cloud_template'])) {
            $td_options['category_options'][$new_cat_id]['tdb_post_category_template'] = 'tdb_template_' . $params_array['post_cloud_template'];
        }


        // update the background if needed
        if (!empty($params_array['background_td_pic_id'])) {
	        $td_options['category_options'][$new_cat_id]['tdc_image'] = td_demo_media::get_image_url_by_td_id($params_array['background_td_pic_id']);
	        $td_options['category_options'][$new_cat_id]['tdc_bg_repeat'] = 'stretch';
        }

        //boxed layout
        if (isset($params_array['boxed_layout']) and !empty($params_array['boxed_layout'])) {
            $td_options['category_options'][$new_cat_id]['tdb_show_background'] = $params_array['boxed_layout'];
        }


        // update the sidebar if needed
        if (!empty($params_array['sidebar_id'])) {
	        $td_options['category_options'][$new_cat_id]['tdc_sidebar_name'] = $params_array['sidebar_id'];
        }

        // moduel id to sue 123456 (NO MODULE JUST THE NUMBER)
        if (!empty($params_array['tdc_layout'])) {
	        $td_options['category_options'][$new_cat_id]['tdc_layout'] = $params_array['tdc_layout'];
        }

        // update the sidebar position
        // sidebar_left, sidebar_right, no_sidebar
        if (!empty($params_array['tdc_sidebar_pos'])) {
	        $td_options['category_options'][$new_cat_id]['tdc_sidebar_pos'] = $params_array['tdc_sidebar_pos'];
        }

        //update once the category options
	    td_options::schedule_save();

	    //update_option(TD_THEME_OPTIONS_NAME, td_global::$td_options);



        // keep a list of installed category ids so we can delete them later if needed
        // ths is NOT IN WP_011, it's a WordPress option
        $td_stacks_demo_categories_id = get_option('td_demo_categories_id');
        $td_stacks_demo_categories_id []= $new_cat_id;
        update_option('td_demo_categories_id', $td_stacks_demo_categories_id);



        return $new_cat_id;
    }

    static function remove() {
        $td_stacks_demo_categories_id = get_option('td_demo_categories_id');
        if (is_array($td_stacks_demo_categories_id)) {
            foreach ($td_stacks_demo_categories_id as $td_stacks_demo_category_id) {
                wp_delete_category($td_stacks_demo_category_id);
            }
        }
    }

}

class td_woo_demo_product_category extends td_demo_base {

    static function add_woo_category($params_array) {

    	// it's probably safe to also schedule a save here
	    $td_options = &td_options::get_all_by_ref();

		self::check_params(__CLASS__, __FUNCTION__, $params_array, array(
		    'product_category_name' => 'Param is required !',
		));

		// process args @see wp_insert_term()
	    $args = array();

	    // description
	    if ( !empty( $params_array['description'] ) ) {
	    	$args['description'] = $params_array['description'];
	    }

	    // parent
	    if ( !empty( $params_array['parent_id'] ) ) {
	    	$args['parent'] = $params_array['parent_id'];
	    }

	    // insert prod cat
	    $new_term_data = wp_insert_term( $params_array['product_category_name'], 'product_cat', $args );

	    // check for errors
	    if ( is_wp_error( $new_term_data ) ) {

		    td_log::log(
		    	__CLASS__,
			    __FUNCTION__,
			    'failed to insert prod cat on demo install',
			    $new_term_data
		    );

			//self::kill(
			//    __CLASS__,
			//    __FUNCTION__,
			//    $params_array,
			//    array(
			//	    'wp_insert_post > wp_error' => $new_term_data->get_error_message(),
			//	    'new_product_data' => $new_term_data
			//    )
			//);

		    // return the default product cat ( uncategorized ) id
		    return (int) get_option( 'default_product_cat', 0 );
	    }

	    $new_product_cat_id = $new_term_data['term_id'];

        // update the sidebar if needed
        if ( !empty( $params_array['tds_woo_sidebar'] ) ) {
	        $td_options['tds_woo_sidebar'] = $params_array['tds_woo_sidebar'];
        }

        // update the sidebar position
        if ( !empty( $params_array['tds_woo_sidebar_pos'] ) ) {
	        $td_options['tds_woo_sidebar_pos'] = $params_array['tds_woo_sidebar_pos'];
        }

        // update once the prod category options
	    td_options::schedule_save();

        // keep a list of installed category ids so we can delete them later if needed
	    $td_stacks_td_woo_demo_product_categories_ids = get_option( 'td_woo_demo_product_categories_ids' );
	    $td_stacks_td_woo_demo_product_categories_ids[]= $new_product_cat_id;
        update_option('td_woo_demo_product_categories_ids', $td_stacks_td_woo_demo_product_categories_ids);

        return $new_product_cat_id;
    }

    static function remove() {
        $td_stacks_td_woo_demo_product_categories_ids = get_option('td_woo_demo_product_categories_ids');
        if ( is_array( $td_stacks_td_woo_demo_product_categories_ids ) ) {
            foreach ( $td_stacks_td_woo_demo_product_categories_ids as $prod_cat_id ) {
	            wp_delete_term( $prod_cat_id, 'product_cat' );
            }
        }
    }

}

class td_demo_tax extends td_demo_base {

    static function add_taxonomy( $params_array ) {

    	// it's probably safe to also schedule a save here
	    $td_options = &td_options::get_all_by_ref();

		self::check_params(
			__CLASS__,
			__FUNCTION__,
			$params_array,
			array(
		        'taxonomy_name' => 'Param is required !',
		        'taxonomy' => 'Param is required !',
			)
		);

		// process args @see wp_insert_term()
	    $args = array();

	    // description
	    if ( !empty( $params_array['description'] ) ) {
	    	$args['description'] = $params_array['description'];
	    }

	    // parent
	    if ( !empty( $params_array['parent_id'] ) ) {
	    	$args['parent'] = $params_array['parent_id'];
	    }

	    // insert taxonomy
	    $new_term_data = wp_insert_term( $params_array['taxonomy_name'], $params_array['taxonomy'], $args );

	    // check for errors
	    if ( is_wp_error( $new_term_data ) ) {

		    td_log::log(
		    	__CLASS__,
			    __FUNCTION__,
			    'failed to insert term: ' . $params_array['taxonomy_name'] . ' in taxonomy: ' . $params_array['taxonomy'] . ' on demo install',
			    $new_term_data
		    );

			//self::kill(
			//    __CLASS__,
			//    __FUNCTION__,
			//    $params_array,
			//    array(
			//	    'wp_insert_term > wp_error' => $new_term_data->get_error_message(),
			//	    'new_tax_data' => $new_term_data
			//    )
			//);

		    // return here on wp error
		    return '';
	    }

	    $new_tax_term_id = $new_term_data['term_id'];

	    // update the taxonomy cloud template
		//if ( !empty( $params_array['taxonomy_template'] ) ) {
		//    $td_options['td_cpt_tax'][$params_array['taxonomy']]['tdb_category_template'] = 'tdb_template_' . $params_array['taxonomy_template'];
		//}

        // add image if it is set
        if( isset( $params_array['filter_image'] ) ) {
            if( $params_array['filter_image'] != '' ) {
                update_term_meta( $new_tax_term_id, 'tdb_filter_image', td_demo_media::get_by_td_id( $params_array['filter_image'] ) );
            }
        }

	    // add tax term meta ( demo custom fields )
	    if( !empty( $params_array['tax_term_meta'] ) && is_array( $params_array['tax_term_meta'] ) ) {

		    foreach ( $params_array['tax_term_meta'] as $meta_key => $meta_value ) {

			    $term_meta_value = '';
				if ( $meta_key === 'tdb_filter_color' ) {
					$term_meta_value = esc_html( $meta_value );
				} elseif( $meta_key === 'tdb-location-type' ) {
                    $term_meta_value = $meta_value;
                } elseif ( str_starts_with( $meta_key, 'tdcf_' ) ) {
					$term_meta_value = base64_decode( $meta_value );
				}

				if ( empty( $term_meta_value ) )
					continue;

			    update_term_meta( $new_tax_term_id, $meta_key, $term_meta_value );

		    }

	    }

        // update once the prod category options
	    td_options::schedule_save();

        // keep a list of installed taxonomy terms ids, so we can delete them later if needed
	    $td_stacks_td_demo_taxonomies_ids = get_option( 'td_demo_taxonomies_terms_ids', array() );

		// process term's taxonomy in td_demo_taxonomies_terms_ids option array
		if ( !empty( $td_stacks_td_demo_taxonomies_ids[$params_array['taxonomy']] ) && is_array( $td_stacks_td_demo_taxonomies_ids[$params_array['taxonomy']] ) ) {
			// add new term id to taxonomy's terms array
			$td_stacks_td_demo_taxonomies_ids[$params_array['taxonomy']][] = $new_tax_term_id;
		} else {
			// initialize taxonomy's terms array adn add the new term id
			$td_stacks_td_demo_taxonomies_ids[$params_array['taxonomy']] = array( $new_tax_term_id );
		}

        update_option('td_demo_taxonomies_terms_ids', $td_stacks_td_demo_taxonomies_ids );

        return $new_tax_term_id;

    }

    static function remove() {
	    $td_stacks_td_demo_taxonomies_terms_ids = get_option( 'td_demo_taxonomies_terms_ids' );
        if ( is_array( $td_stacks_td_demo_taxonomies_terms_ids ) ) {
            foreach ( $td_stacks_td_demo_taxonomies_terms_ids as $tax => $tax_terms_ids ) {

	            if ( !is_array( $tax_terms_ids ) )
					continue;

				foreach ( $tax_terms_ids as $tax_term_id ) {
					wp_delete_term( $tax_term_id, $tax );
				}

            }
        }
    }

}

class td_woo_demo_product_tag extends td_demo_base {

    static function remove() {
        $td_stacks_td_woo_demo_product_tags_ids = get_option('td_woo_demo_product_tags_ids');
        if ( is_array( $td_stacks_td_woo_demo_product_tags_ids ) ) {
            foreach ( $td_stacks_td_woo_demo_product_tags_ids as $prod_tag_id ) {
	            wp_delete_term( $prod_tag_id, 'product_tag' );
            }
        }
    }

}

class td_woo_demo_product_attribute extends td_demo_base {

    static function add_woo_attribute($params_array) {

		self::check_params(__CLASS__, __FUNCTION__, $params_array, array(
		    'attribute_name' => 'Param is required !',
		));

	    $attribute_name = $params_array['attribute_name'];
	    $attribute_slug = !empty( $params_array['attribute_slug'] ) ? $params_array['attribute_slug'] : wc_attribute_taxonomy_slug( $attribute_name );
	    $attribute_type = !empty( $params_array['attribute_type'] ) ? $params_array['attribute_type'] : 'select';

	    $attribute_is_new = false;

	    if ( !taxonomy_exists( $attribute_slug ) ) {
		    $new_attribute_id = wc_create_attribute(
			    array(
				    'name'         => $attribute_name,
				    'slug'         => $attribute_slug,
				    'type'         => $attribute_type,
				    'order_by'     => 'menu_order',
				    'has_archives' => false,
			    )
		    );

		    if ( is_wp_error( $new_attribute_id ) ) {
			    self::kill(
				    __CLASS__,
				    __FUNCTION__,
				    'wc_create_attribute > wp_error',
				    array(
					    'wp_error > error_message' => $new_attribute_id->get_error_message(),
					    '$params_array' => $params_array
				    )
			    );
		    }

		    //$taxonomy_name = wc_attribute_taxonomy_name( $attribute_name );
		    $taxonomy_name = $attribute_slug;

		    // register as taxonomy
		    register_taxonomy(
			    $taxonomy_name,
			    apply_filters( 'woocommerce_taxonomy_objects_' . $taxonomy_name, array( 'product' ) ),
			    apply_filters(
				    'woocommerce_taxonomy_args_' . $taxonomy_name,
				    array(
					    'labels'       => array(
						    'name' => $attribute_name,
					    ),
					    'hierarchical' => false,
					    'show_ui'      => false,
					    'query_var'    => true,
					    'rewrite'      => false,
				    )
			    )
		    );

		    global $wc_product_attributes;

		    // set product attributes global
		    $wc_product_attributes = array();
		    foreach ( wc_get_attribute_taxonomies() as $taxonomy ) {
			    $wc_product_attributes[ wc_attribute_taxonomy_name( $taxonomy->attribute_name ) ] = $taxonomy;
		    }

		    // update new att flag
		    $attribute_is_new = true;

	    } else {
	    	$attribute_taxonomies_ids = wc_get_attribute_taxonomy_ids();
		    $slug = preg_replace( '/^pa\_/', '', wc_sanitize_taxonomy_name( $attribute_slug ) );
		    $new_attribute_id = $attribute_taxonomies_ids[ $slug ] ?? 0;
	    }

	    // get new attribute data by id
	    $attribute = wc_get_attribute( $new_attribute_id );

	    // we have no attribute data..something went wrong.. log this step and move further..
	    if ( empty($attribute) ) {
		    td_log::log(__CLASS__, __FUNCTION__,
			    'wc_get_attribute > error => get new attribute data by att id failed!',
			    $params_array
		    );
		    return $new_attribute_id;
	    }

	    // add attribute terms
	    $terms = !empty( $params_array['attribute_terms'] ) ? $params_array['attribute_terms'] : array();
	    $attribute_taxonomy = $attribute->slug;
	    $attribute_type = $attribute->type;

	    switch ($attribute_type) {
		    case 'color':
			    foreach ( $terms as $term_name => $value ) { // value can be either hex color or td_id img
				    $term_exists = term_exists( $term_name, $attribute_taxonomy );
				    if ( !$term_exists ) {
					    $new_term = wp_insert_term( $term_name, $attribute_taxonomy );
					    if ( strpos($value, '#') !== false ) { // check for color (hex)
						    update_term_meta( $new_term['term_id'], 'product_attribute_color', esc_html($value) );
					    } elseif ( td_util::strpos_array($value, array( 'td_pic', 'tdx_pic' )) !== false ) {
						    $img_id = td_demo_media::get_by_td_id($value);
						    update_term_meta( $new_term['term_id'], 'product_attribute_color', absint($img_id) );
					    }
				    }
			    }
		    	break;
		    default:
			    foreach ( $terms as $term ) {
				    $term_exists = term_exists( $term, $attribute_taxonomy );
				    if ( !$term_exists ) {
					    wp_insert_term( $term, $attribute_taxonomy );
				    }
			    }
		    	break;
	    }

	    // do this just for new attributes added trough our demo import
	    if ( $attribute_is_new ) {
		    // keep a list of installed attributes ids so we can delete them later if needed
		    $td_stacks_td_woo_demo_product_attributes_ids = get_option( 'td_woo_demo_product_attributes_ids' );
		    $td_stacks_td_woo_demo_product_attributes_ids[]= $new_attribute_id;
		    update_option('td_woo_demo_product_attributes_ids', $td_stacks_td_woo_demo_product_attributes_ids );
	    }

        // return new attribute id
	    return $new_attribute_id;

    }

    static function remove() {
        $td_stacks_td_woo_demo_product_attributes_ids = get_option('td_woo_demo_product_attributes_ids');
        if ( is_array( $td_stacks_td_woo_demo_product_attributes_ids ) ) {
            foreach ( $td_stacks_td_woo_demo_product_attributes_ids as $product_attribute_id ) {
				if ( function_exists( 'wc_delete_attribute' ) ) {
					wc_delete_attribute( $product_attribute_id );
				}
            }
        }
    }

}






class td_demo_content extends td_demo_base {


	static function parse_content( $file_content, $template_type = '' ) {
		$b64_encodable = false;

        if ( td_util::tdc_is_installed() ) {
	        $b64_encodable = tdc_b64_decode( $file_content, true ) && tdc_b64_encode( tdc_b64_decode( $file_content, true ) ) === $file_content && mb_detect_encoding( tdc_b64_decode( $file_content, true ) ) === mb_detect_encoding( $file_content );

	        if ( $b64_encodable ) {
	            $file_content = tdc_b64_decode( $file_content );
	        }
        }

        $search_in_file = self::multi_instring( $file_content, array(
            '0div',
            'localhost',
            '192.168.0.'
        ));

        if ( $search_in_file !== false ) {
            self::kill( __CLASS__, __FUNCTION__, 'found in file content: ' . $search_in_file,
	            array(
					//'$file_content' => $file_content
	            )
            );
        }


        preg_match_all("/xxx_(.*)_xxx/U", $file_content, $matches, PREG_PATTERN_ORDER);
        /*
        $matches =
        [0] => Array
        (
            [0] => xxx_td_pic_5:300x200_xxx
            [1] => xxx_td_pic_5_xxx
        )

        [1] => Array
        (
            [0] => td_pic_5:300x200
            [1] => td_pic_5
        )
        */
        if (!empty($matches) and is_array($matches)) {
            foreach ($matches[1] as $index => $match) {
                $size = ''; //default image size
                //try to read the size form the match - NOT USED 29.05.2015
                if (strpos($match, ':') !== false) {
                    $match_parts = explode(':', $match);
                    $match = $match_parts[0];
                    $size = explode('x', $match_parts[1]);
                    //print_r($size);
                }
                $file_content = str_replace($matches[0][$index], td_demo_media::get_image_url_by_td_id($match, $size), $file_content);
            }
        }


        unset($matches);
        preg_match_all("/iii_(.*)_iii/U", $file_content, $matches, PREG_PATTERN_ORDER);

        if (!empty($matches) and is_array($matches)) {
            foreach ($matches[1] as $index => $match) {

                $file_content = str_replace($matches[0][$index], td_demo_media::get_by_td_id($match), $file_content);
            }
        }


        preg_match_all('/tdc_css=\"\S*\"/', $file_content, $css_matches, PREG_PATTERN_ORDER);
        if (!empty($css_matches) && is_array($css_matches) && count($css_matches[0])) {

            foreach ($css_matches[0] as $css_key => $css_match) {

                $match = str_replace(array('tdc_css="', 'tdc_css=\"', '\"', '"'), '', $css_match);

                $decoded_match = '';

                if ( td_util::tdc_is_installed() ) {
                    $decoded_match = tdc_b64_decode($match);
                }


                $img_matches = array();
                preg_match_all("/url\((\S*)xxx_(\S*)_xxx(\S*)\)/U", $decoded_match, $img_matches);

                if (!empty($img_matches) &&
                    count($img_matches) >= 3 &&
                    is_array($img_matches[0]) && !empty($img_matches[0]) &&
                    is_array($img_matches[1]) &&
                    is_array($img_matches[2])
                ) {

                    foreach ($img_matches[0] as $index => $img_match) {
                        $decoded_match = str_replace($img_match, 'url(\"' . td_demo_media::get_image_url_by_td_id($img_matches[2][$index]) . '\")', $decoded_match);
                    }
                }

                if ( td_util::tdc_is_installed() ) {
                    $file_content = str_replace($css_matches[0][$css_key], 'tdc_css="' . tdc_b64_encode($decoded_match) . '"', $file_content);
                }
            }
            //echo '<!-- file content -->' . $file_content;
        }

        preg_match_all('/ad_loop=\"\S*\"/', $file_content, $ad_loop_matches, PREG_PATTERN_ORDER);
        if (!empty($ad_loop_matches) && is_array($ad_loop_matches) && count($ad_loop_matches[0])) {

            foreach ($ad_loop_matches[0] as $css_key => $ad_loop_match) {

                $match = str_replace(array('ad_loop="', 'ad_loop=\"', '\"', '"'), '', $ad_loop_match);

                $decoded_match = '';

                if ( td_util::tdc_is_installed() ) {
                    $decoded_match = rawurldecode(tdc_b64_decode(strip_tags($match)));
                }


                $img_matches = array();
                preg_match_all('/src="(\S*)xxx_(\S*)_xxx(\S*)"/U', $decoded_match, $img_matches);

                if (!empty($img_matches) &&
                    count($img_matches) >= 3 &&
                    is_array($img_matches[0]) && !empty($img_matches[0]) &&
                    is_array($img_matches[1]) &&
                    is_array($img_matches[2])
                ) {

                    foreach ($img_matches[0] as $index => $img_match) {
                        $decoded_match = str_replace($img_match, 'src="' . td_demo_media::get_image_url_by_td_id($img_matches[2][$index]) . '"', $decoded_match);
                    }

                }

                if ( td_util::tdc_is_installed() ) {
                    $file_content = str_replace($ad_loop_matches[0][$css_key], 'ad_loop="' . tdc_b64_encode(rawurlencode($decoded_match)) . '"', $file_content);
                }
            }
            //echo '<!-- file content -->' . $file_content;
        }

        preg_match_all('/tdc_css=\\\"\S*\\\"/', $file_content, $css_matches, PREG_PATTERN_ORDER);
        if (!empty($css_matches) && is_array($css_matches) && count($css_matches[0])) {

//        	echo '<pre>';
//		    var_dump( $css_matches );
//		    echo '</pre>';

        	foreach ($css_matches[0] as $css_key => $css_match) {

                $match = str_replace(array('tdc_css=\"', '\"'), '', $css_match);

                $decoded_match = '';

                if ( td_util::tdc_is_installed() ) {
                    $decoded_match = tdc_b64_decode($match);
                }


                $img_matches = array();
                preg_match_all("/url\((\S*)xxx_(\S*)_xxx(\S*)\)/U", $decoded_match, $img_matches);

                if (!empty($img_matches) &&
                    count($img_matches) >= 3 &&
                    is_array($img_matches[0]) && !empty($img_matches[0]) &&
                    is_array($img_matches[1]) &&
                    is_array($img_matches[2])
                ) {

//                  echo '<pre>';
//				    var_dump( $decoded_match );
//				    echo '</pre>';
//
//				    echo '<pre>';
//				    var_dump( $img_matches );
//				    echo '</pre>';
//				    //die;

                    foreach ($img_matches[0] as $index => $img_match) {

//					    echo '<pre>';
//					    echo '<!-- img matches -->' . $img_matches[2][$index];
//					    echo '</pre>';
//
                        $decoded_match = str_replace($img_match, 'url(\"' . td_demo_media::get_image_url_by_td_id($img_matches[2][$index]) . '\")', $decoded_match);
//
//					    echo '<pre>';
//					    echo '<!-- decoded match -->' . $decoded_match;
//					    echo '</pre>';

                    }
                }

                if ( td_util::tdc_is_installed() ) {
                    $file_content = str_replace($css_matches[0][$css_key], 'tdc_css=\"' . tdc_b64_encode($decoded_match) . '\"', $file_content);
                }
            }
            //echo '<!-- file content -->' . $file_content;
        }

        // assign menu id
        unset($matches);

        preg_match_all("/ddd_(.*)_ddd/U", $file_content, $matches, PREG_PATTERN_ORDER);

        if (!empty($matches) and is_array($matches)) {
            foreach ($matches[1] as $index => $match) {
                $file_content = str_replace($matches[0][$index], td_demo_media::get_menu_id($match), $file_content);
            }
        }


        if (is_plugin_active('td-subscription/td-subscription.php') ) {

        	global $wpdb;

            $db_plans = $wpdb->get_results( "SELECT * FROM tds_plans", ARRAY_A);
            if ( null !== $db_plans && count($db_plans)) {

                unset( $matches );
	            preg_match_all( "/jjj_(.*)_jjj/U", $file_content, $matches, PREG_PATTERN_ORDER );

		        if ( ! empty( $matches ) and is_array( $matches ) ) {

			        foreach ( $matches[ 1 ] as $index => $match ) {

				        foreach ($db_plans as $db_plan) {
				        	if (!empty($db_plan['options'])) {
				        		$options = maybe_unserialize($db_plan['options']);

				        		if (!empty($options['unique_id']) && $options['unique_id'] == $match ) {
				        			$file_content = str_replace( $matches[ 0 ][ $index ], $db_plan['id'], $file_content );
				        			break;
						        }
					        }
				        }
			        }
		        }
	        }
		}

		if (!empty($template_type)) {
			if ('header' === $template_type ) {
				$header_content = json_decode( $file_content );
				foreach ($header_content as $key => &$val ) {
					$val = self::parse_template_shortcodes( $val );
				}
				$file_content = json_encode( $header_content );
			} else {
				$file_content = self::parse_template_shortcodes( $file_content );
			}
		}

        if ($b64_encodable == true && td_util::tdc_is_installed() ) {
            $file_content = tdc_b64_encode($file_content);
        }
        return $file_content;

    }


    static function parse_template_shortcodes( &$content = null ) {

		$new_content = '';

		if ( preg_match_all( '/' . get_shortcode_regex() . '/s', $content, $matches, PREG_SET_ORDER ) ) {
			foreach ( $matches as &$shortcode ) {
				//var_dump($shortcode[ 2 ]);

				$attributes = shortcode_parse_atts( $shortcode[ 3 ] );

				//var_dump($matches);
				//var_dump($attributes);

				$wrapper_shortcode = false;

				if (strpos( $content, "[/" . $shortcode[ 2 ] . "]") > 0 ) {
					$wrapper_shortcode = true;
				}


				if ( ! empty( $shortcode[5] ) ) {
					$new_content .= '[' . $shortcode[2];

					if (is_array($attributes)) {
						self::parse_template_attr( $new_content, $shortcode[2], $attributes );
					}

					$new_content .= ']';

					$new_content .= self::parse_template_shortcodes($shortcode[5] );

					$new_content .= '[/' . $shortcode[2] . ']';

				} else {

					$new_content .= '[' . $shortcode[2];

					if (is_array($attributes)) {
						self::parse_template_attr( $new_content, $shortcode[ 2 ], $attributes );
					}

					$new_content .= ']';
					if ( $wrapper_shortcode ) {
						$new_content .= '[/' . $shortcode[ 2 ] . ']';
					}
				}
			}
			return $new_content;
		} else {
			return $content;
		}
	}


	private static function parse_template_attr( &$content, $shortcode, $attributes) {
		$demo_unique_page_ids = [];

		$demo_pages = new WP_Query( array(
                'post_type' => 'page',
                'posts_per_page' => -1,
                'meta_query' => array(
                    array(
                        'key'     => 'demo_unique_id',
                        'compare' => 'EXISTS',
                    ),
                ),
            )
        );

        if (!empty($demo_pages)) {
            foreach ( $demo_pages->posts as $demo_page ) {
                $demo_unique_id = get_post_meta($demo_page->ID, 'demo_unique_id', true);
                if (!empty($demo_unique_id)) {
                    $demo_unique_page_ids[$demo_page->ID] = $demo_unique_id;
                }
            }
        }

		foreach ( $attributes as $key => $val ) {

			switch ($shortcode) {
				case 'tdm_block_popup':
					switch ($key) {
						case 'page_id':
							$real_page_id = array_search($val, $demo_unique_page_ids);
							if (!empty($real_page_id)) {
								$val = $real_page_id;
							}

							break;
					}
					break;

                case 'td_block_tabbed_content':
                    switch ($key) {
						case 'page_0_id':
                        case 'page_1_id':
                        case 'page_2_id':
                        case 'page_3_id':
                        case 'page_4_id':
							$real_page_id = array_search($val, $demo_unique_page_ids);
							if (!empty($real_page_id)) {
								$val = $real_page_id;
							}

							break;
					}
					break;

                case 'tds_menu_login':
                    switch ($key) {
						case 'page_0_url':
                        case 'page_1_url':
                        case 'page_2_url':
                        case 'page_3_url':
                        case 'page_4_url':
							$real_page_id = array_search($val, $demo_unique_page_ids);
							if (!empty($real_page_id)) {
								$val = $real_page_id;
							}

							break;
					}
					break;
                    
                case 'tds_my_account':
                    switch ($key) {
                        case 'page_0_id':
                        case 'page_1_id':
                        case 'page_2_id':
                        case 'page_3_id':
                        case 'page_4_id':
                        case 'page_5_id':
                        case 'page_6_id':
                            $real_page_id = array_search($val, $demo_unique_page_ids);
                            if (!empty($real_page_id)) {
                                $val = $real_page_id;
                            }

                            break;
                    }
                    break;
			}

            if ( $val != 'undefined' ) {
                $content .= " $key=\"$val\"";
            }

		}
	}


	/**
	 * @param $params
	 * @return int|WP_Error
	 */
    static function add_post($params) {


	    self::check_params(__CLASS__, __FUNCTION__, $params, array(
		    'title' => 'Param is required!',
		    //'file' => 'Param is required!',
		    //'categories_id_array' => 'Param is required!',
		    //'featured_image_td_id' => 'Param is required!',
	    ));


        if (!empty($params['file'])) {
            $template_name = basename($params['file']);
        }
	    $new_post = array(
            'post_title' => $params['title'],
            'post_status' => 'publish',
            'post_type' => empty($params['post_type']) ? 'post' : $params['post_type'],
//            'post_content' => ( self::parse_content( td_global::$td_demo_installer->templates[ $template_name ] ?? 'post content template not set!' ) ) ?: 'failed to parse post content/post content empty!',
//            'comment_status' => 'open',
            //'post_category' => $params['categories_id_array'], //adding category to this post
            'guid' => td_global::td_generate_unique_id()
        );

        // lockers don't have text content
        if (!empty($params['file'])) {
            $new_post['post_content'] = ( self::parse_content( td_global::$td_demo_installer->templates[ $template_name ] ?? file_get_contents( $params['file'] ) ) ) ?: 'failed to parse post content/post content empty!';
            $new_post['comment_status'] = 'open';
        }

	    if (!empty($params['categories_id_array'])) {
	    	$new_post['post_category'] = $params['categories_id_array'];
	    }

        // new post / page
        $post_id = wp_insert_post($new_post);

        // add our demo custom meta field, using this field we will delete all the pages
        update_post_meta($post_id, 'td_demo_content', true);

        // add post meta
        if( !empty( $params['post_meta'] ) && is_array( $params['post_meta'] ) ) {
        	foreach ( $params['post_meta'] as $meta_key => $meta_value ) {
		        update_post_meta( $post_id, $meta_key, $meta_value );
	        }
        }

        if( !empty( $params['post_format'] ) ) {
            set_post_format($post_id, $params['post_format']);
        }

        if( !empty( $params['featured_image_td_id'] ) ) {
            set_post_thumbnail($post_id, td_demo_media::get_by_td_id($params['featured_image_td_id']));
        }

        // set the post template > this setting can be a predefined theme single template or a cloud template by id
        if (!empty($params['template'])) {
            $td_post_theme_settings['td_post_template'] = $params['template'];
        }

        // set the smart list  ex: td_smart_list_3    td_smart_list_1    etc
        if (!empty($params['smart_list'])) {
            $td_post_theme_settings['smart_list_template'] = $params['smart_list'];
        }

        // set the review content
        if (!empty($params['review'])) {
            $review = unserialize( $params['review'] );

            $td_post_theme_settings['has_review'] = $review['has_review'];

            if( array_key_exists( 'p_review_stars', $review ) ) {
                $td_post_theme_settings['p_review_stars'] = $review['p_review_stars'];
            }
            if( array_key_exists( 'p_review_percents', $review ) ) {
                $td_post_theme_settings['p_review_percents'] = $review['p_review_percents'];
            }
            if( array_key_exists( 'review', $review ) ) {
                $td_post_theme_settings['review'] = $review['review'];
            }
        }

        if (!empty($params['tds_lock_content'])) {
            $td_post_theme_settings['tds_lock_content'] = $params['tds_lock_content'];
            update_post_meta($post_id, 'tds_lock_content', 1, true);
        }

		if (!empty($params['tds_locker'])) {
            $td_post_theme_settings['tds_locker'] = $params['tds_locker'];
        }

        // update the post metadata only if we have something new
        if (!empty($td_post_theme_settings)) {
            update_post_meta($post_id, 'td_post_theme_settings', $td_post_theme_settings, true);
        }



        if (!empty($params['tds_locker_settings'])) {
        	update_post_meta($post_id, 'tds_locker_settings', $params['tds_locker_settings'], true);
        }

        if (!empty($params['tds_locker_styles'])) {
        	update_post_meta($post_id, 'tds_locker_styles', $params['tds_locker_styles'], true);
        }


        if (!empty($params['tds_payable'])) {
            $tds_locker_types['tds_payable'] = $params['tds_payable'];
        }
        if (!empty($params['tds_paid_subs_page_id'])) {
            $tds_locker_types['tds_paid_subs_page_id'] = $params['tds_paid_subs_page_id'];
        }
        if (!empty($params['tds_paid_subs_plan_ids'])) {
            $tds_locker_types['tds_paid_subs_plan_ids'] = $params['tds_paid_subs_plan_ids'];
        }
        if (!empty($params['tds_locker_slug'])) {
            $tds_locker_types['tds_locker_slug'] = $params['tds_locker_slug'];
        }
        if (!empty($tds_locker_types)) {
            update_post_meta($post_id, 'tds_locker_types', $tds_locker_types, true);
        }


        if (!empty($params['featured_video_url'])) {
            $tmp_meta['td_video'] = $params['featured_video_url'];
            update_post_meta($post_id, 'td_post_video', $tmp_meta);

            wp_update_post(get_post($post_id));
        }


        if (!empty($params['featured_audio_url'])) {
            $tmp_meta['td_audio'] = $params['featured_audio_url'];
            update_post_meta($post_id, 'td_post_audio', $tmp_meta);

            wp_update_post(get_post($post_id));
        }

        return $post_id;
    }


    static function add_page($params) {

	    self::check_params(__CLASS__, __FUNCTION__, $params, array(
		    'title' => 'Param is required!',
		    'file' => 'Param is required!',
	    ));

	    $template_name = basename( $params['file']);

	    $new_post = array(
            'post_title' => $params['title'],
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_content' => ( self::parse_content( td_global::$td_demo_installer->templates[ $template_name ] ?? 'page content template not set!', 'page' ) ) ?: 'failed to parse page content/page content empty!',
            'comment_status' => 'open',
            'guid' => td_global::td_generate_unique_id()
        );

        //new post / page
        $page_id = wp_insert_post ($new_post);

	    if (is_wp_error($page_id)) {
		    self::kill(__CLASS__, __FUNCTION__, $page_id->get_error_message());
	    }

	    if ($page_id === 0) {
		    self::kill(__CLASS__, __FUNCTION__, 'wp_insert_post returned 0. Not ok! Page title: ' . $params['title']);
	    }

        // add our demo custom meta field, using this field we will delete all the pages
        update_post_meta($page_id, 'td_demo_content', true);

        // set the page template if we have one
        if (!empty($params['template'])) {
            update_post_meta($page_id, '_wp_page_template', $params['template']);
        }

        // set the header template if we have one
        if (!empty($params['header_template_id'])) {
            update_post_meta($page_id, 'tdc_header_template_id', $params['header_template_id']);
        }

        // set the footer template if we have one
        if (!empty($params['footer_template_id'])) {
            update_post_meta($page_id, 'tdc_footer_template_id', $params['footer_template_id']);
        }

	    $td_homepage_loop = array();
	    $td_page = array();

        // on homepage latest articles
        if (!empty($params['td_layout'])) {
	        $td_homepage_loop['td_layout'] = $params['td_layout'];
        }
        if (!empty($params['list_custom_title_show'])) {
	        $td_homepage_loop['list_custom_title_show'] = $params['list_custom_title_show'];
        }

        if (!empty($params['sidebar_id'])) {
	        $td_homepage_loop['td_sidebar'] = $params['sidebar_id'];
	        $td_page['td_sidebar'] = $params['sidebar_id'];
        }



        // set as homepage?
        if ( !empty( $params['homepage'] ) and $params['homepage'] === true ) {
            update_option( 'page_on_front', $page_id );
            update_option( 'show_on_front', 'page' );
	        update_post_meta( $page_id, 'tdc_homepage_cloud_import', 1 );
        }


        if (!empty($params['sidebar_position'])) {
	        $td_page['td_sidebar_position'] = $params['sidebar_position'];
	        $td_homepage_loop['td_sidebar_position'] = $params['sidebar_position'];
        }


        if (!empty($params['limit'])) {
	        $td_homepage_loop['limit'] = $params['limit'];
        }


	    // update td_homepage_loop metadata
	    if (!empty($td_homepage_loop)) {
		    update_post_meta($page_id, 'td_homepage_loop', $td_homepage_loop);
	    }

	    // update td_page
	    if (!empty($td_page)) {
		    update_post_meta($page_id, 'td_page', $td_page);
	    }

	    if (!empty($template_name)) {
            update_post_meta($page_id, 'tdc_template_name', $template_name);
        }

        if (!empty($params['demo_unique_id'])) {
            update_post_meta($page_id, 'demo_unique_id', $params['demo_unique_id']);
        }

		// Flag used by tagDiv Composer - do not set the page as modified in wp admin backend (there's a 'save_post' hook on composer which set it to 1)
	    update_post_meta($page_id, 'tdc_dirty_content', false);

        return $page_id;
    }


    static function add_cloud_template($params) {

	    self::check_params(__CLASS__, __FUNCTION__, $params, array(
		    'title' => 'Param is required!',
		    'file' => 'Param is required!',
		    'template_type' => 'Param is required!',
	    ));

	    $template_name = basename( $params['file']);

	    $template_type = $params['template_type'];

        $template_types = array(
            'single', 'category', 'author', 'search', 'date', 'tag', 'attachment', '404', 'page', 'header', 'footer',
	        'woo_product', 'woo_archive', 'woo_search_archive', 'woo_shop_base', // td woo templates
	        'cpt', 'cpt_tax' // custom post types/taxonomies templates
        );

        if ( in_array( $template_type, $template_types) === false ) {
            self::kill(__CLASS__, __FUNCTION__, '<strong>' . $template_type . '</strong> is not a valid template type!' );
        }


        $new_post = array(
            'post_title' => $params['title'],
            'post_status' => 'publish',
            'post_type' => 'tdb_templates',
            'post_content' => ( self::parse_content( td_global::$td_demo_installer->templates[ $template_name ] ?? 'cloud_template content template not set!', $template_type ) ) ?: 'failed to parse cloud_template content/cloud_template content empty!',
            'comment_status' => 'closed',
            'meta_input'   => array(
                'tdb_template_type' => $template_type,
                'td_demo_content' => true,
                'tdc_dirty_content' => false
            ),
            'guid' => td_global::td_generate_unique_id()
        );

        //new template
        $template_id = wp_insert_post($new_post);

	    if ( is_wp_error( $template_id ) ) {
		    self::kill(__CLASS__, __FUNCTION__, $template_id->get_error_message());
	    }

	    if ( $template_id === 0 ) {
		    self::kill(__CLASS__, __FUNCTION__, 'wp_insert_post returned 0. Not ok! Page title: ' . $params['title']);
	    }

        // set the cloud template template type post meta
        update_post_meta( $template_id, 'tdb_template_type', $template_type );

        // add our demo custom meta field, using this field we will delete all the pages
        update_post_meta( $template_id, 'td_demo_content', true );

	    // Flag used by tagDiv Composer - do not set the page as modified in wp admin backend (there's a 'save_post' hook on composer which set it to 1)
	    update_post_meta( $template_id, 'tdc_dirty_content', false );

        // set the header template if we have one
        if ( !empty( $params['header_template_id'] ) ) {
            update_post_meta( $template_id, 'tdc_header_template_id', $params['header_template_id'] );
        }

        // set the footer template if we have one
        if ( !empty( $params['footer_template_id'] ) ) {
            update_post_meta( $template_id, 'tdc_footer_template_id', $params['footer_template_id'] );
        }

        if ( 'header' === $template_type ) {
        	update_post_meta( $template_id, 'tdc_header_template_id', $template_id );
        }

        if ( 'footer' === $template_type ) {
        	update_post_meta( $template_id, 'tdc_footer_template_id', $template_id );
        }

        return $template_id;
    }


	static function add_product($params) {

		self::check_params(
			__CLASS__,
			__FUNCTION__,
			$params,
			array(
				'title' => 'Param is required !',
				'file' => 'Param is required !',
			)
		);

		// product_default_content.txt
		$template_name = basename( $params['file'] );

		$new_product_data = array(
			'post_title' => $params['title'],
			'post_type' => 'product',
			'post_status' => 'publish',
			'post_content' => ( self::parse_content( td_global::$td_demo_installer->templates[ $template_name ] ?? 'product content template not set!' ) ) ?: 'failed to parse product content/product content empty!',
			'post_excerpt'  => !empty( $params['short_description'] ) ? $params['short_description'] : '',
			'guid' => td_global::td_generate_unique_id()
		);

		// new product
		$new_product_id = wp_insert_post($new_product_data);

		// check for errors
		if ( is_wp_error( $new_product_id ) ) {
			self::kill(
				__CLASS__,
				__FUNCTION__,
				$params,
				array(
					'wp_insert_post > wp_error' => $new_product_id->get_error_message(),
					'new_product_data' => $new_product_data
				)
			);
		}

		// set product image
		if ( !empty($params['product_image_td_id']) ) {
			set_post_thumbnail( $new_product_id, td_demo_media::get_by_td_id( $params['product_image_td_id'] ) );
		}

		// set product gallery images
		if ( !empty($params['product_image_gallery_td_ids']) ) {
			$product_image_gallery_td_ids = $params['product_image_gallery_td_ids'];

			$product_image_gallery_ids = array();
			foreach ( $product_image_gallery_td_ids as $img_td_id ) {
				$product_image_gallery_ids[] = td_demo_media::get_by_td_id($img_td_id);
			}

			// set images ids as gallery images
			update_post_meta( $new_product_id, '_product_image_gallery', implode(',', $product_image_gallery_ids ) );
		}

		// set product categories
		if ( !empty($params['product_categories']) ) {
			wp_set_object_terms( $new_product_id, $params['product_categories'], 'product_cat' );
		}

		// set product tags, tags slugs or ids list
		// @note creates a tag if it doesn't exist (using the slug)
		if ( !empty($params['product_tags']) ) {

			$new_product_tags_ids = wp_set_object_terms( $new_product_id, $params['product_tags'], 'product_tag' );

			// keep a list of added product tags ids so we can delete them later on demo uninstall
			$td_woo_demo_product_tags_ids = get_option( 'td_woo_demo_product_tags_ids', array() );
			update_option( 'td_woo_demo_product_tags_ids', array_merge( $td_woo_demo_product_tags_ids, $new_product_tags_ids ) );

		}

		// set attributes
		$attributes = !empty($params['product_attributes']) ? $params['product_attributes'] : array(); // product attributes
		$product_attributes_meta = array();
		$wp_set_object_terms = array(); // used just for debugging
		$product_type = !empty($params['product_type']) ? $params['product_type'] : 'simple'; // product type

		if ( !empty($attributes) && is_array($attributes) ) {
			foreach ( $attributes as $attribute ) {

				// wc get attribute data by id
				$attribute_data = wc_get_attribute($attribute['id']);

				// get terms
				$attribute_terms = get_terms( array(
					'taxonomy' => $attribute_data->slug,
					'slug' => array_filter( array_map( 'trim', $attribute['terms'] ) ),
					'hide_empty' => false,
				));

				// build att terms ids array
				$attribute_term_ids = wp_list_pluck( $attribute_terms, 'term_id' );

				$wp_set_object_terms[$attribute_data->slug] = wp_set_object_terms( $new_product_id, $attribute_term_ids, $attribute_data->slug );
				$product_attributes_meta[$attribute_data->slug] = array(
					'id' => $attribute['id'],
					'name' => $attribute_data->slug,
					'value' => $attribute['value'],
					'position' => $attribute['position'],
					'is_visible' => $attribute['is_visible'],
					'is_variation' => $attribute['is_variation'],
					'is_taxonomy' => $attribute['is_taxonomy']
				);
			}
		}

		// update product attributes meta
		// @note result captured just for debugging purposes..
 		$update_product_attributes_meta_status = update_post_meta( $new_product_id,'_product_attributes', $product_attributes_meta );

		// set default attributes
		if ( !empty($params['product_default_attributes']) ) {
			$product_default_attributes = $params['product_default_attributes'];
			update_post_meta( $new_product_id, '_default_attributes', $product_default_attributes );
		}

		// set product sku
		if ( !empty($params['product_sku']) ) {
			update_post_meta( $new_product_id, '_sku', $params['product_sku'] );
		}

		// set product price
		if ( !empty($params['product_price']) ) {
			update_post_meta( $new_product_id, '_price', $params['product_price'] );
		}

		// price
		update_post_meta( $new_product_id, '_regular_price', '111' );
		update_post_meta( $new_product_id, '_sale_price', '100' );

		// sales
		update_post_meta( $new_product_id, 'total_sales', '0' );

		// stock
		update_post_meta( $new_product_id, '_manage_stock', 'yes' ); // activate stock management
		wc_update_product_stock($new_product_id, 100); // set 100 in stock
		update_post_meta( $new_product_id, '_stock_status', 'instock');
		update_post_meta( $new_product_id, '_backorders', 'no' );
		update_post_meta( $new_product_id, '_sold_individually', '' );

		// other
		update_post_meta( $new_product_id, '_purchase_note', '' );
		update_post_meta( $new_product_id, '_virtual', 'yes' );
		update_post_meta( $new_product_id, '_downloadable', 'no' );
		update_post_meta( $new_product_id, '_featured', 'no' );

		// variable product
		if ( $product_type === 'variable' ) {

			// get an instance of the WC_Product_Variable object and save it
			$new_product = new WC_Product_Variable($new_product_id);
			$new_product->save();

			// create variations form attributes
			self::create_product_variations($new_product);

			// set product type .. simple/grouped/external/variable
			// @todo check if it's needed..
			//$wp_set_object_terms['product_type'] = wp_set_object_terms( $new_product_id, $product_type, 'product_type' );
		}

		// debugging
		//self::kill(
		//	__CLASS__,
		//	__FUNCTION__,
		//	'debugging', // the message as string
		//	array(
		//		'$params' => var_export( $params, true ),
		//		'product_attributes_array' => var_export( $attributes, true ),
		//		'$wp_set_object_terms' => var_export( $wp_set_object_terms, true ),
		//		'$product_attributes_meta' => var_export( $product_attributes_meta, true ),
		//		'$update_product_attributes_meta_status' => var_export( $update_product_attributes_meta_status, true )
		//	)
		//);

		// add our demo custom meta field, using this field we will delete all products created during demo install
		update_post_meta( $new_product_id, 'td_demo_content', true );

		return $new_product_id;
	}


	static function add_cpt($params) {

		self::check_params(
			__CLASS__,
			__FUNCTION__,
			$params,
			array(
				'title' => 'Param is required !',
				'file' => 'Param is required !',
			)
		);

		// cpt_{cpt_name}_default_content.txt
		$template_name = basename( $params['file'] );

		$new_cpt_data = array(
			'post_title' => $params['title'],
			'post_type' => $params['type'],
			'post_status' => 'publish',
			//'post_content' => ( self::parse_content( file_get_contents( $params['file'] ) ) ) ?: 'failed to parse cpt content/cpt content empty!',
			'post_content' => ( self::parse_content( td_global::$td_demo_installer->templates[ $template_name ] ?? file_get_contents( $params['file'] ) ) ) ?: 'failed to parse cpt content/cpt content empty!',
			'post_excerpt'  => !empty( $params['short_description'] ) ? $params['short_description'] : '',
			'guid' => td_global::td_generate_unique_id()
		);

		// new product
		$new_cpt_id = wp_insert_post( $new_cpt_data );

		// check for errors
		if ( is_wp_error( $new_cpt_id ) ) {
			self::kill(
				__CLASS__,
				__FUNCTION__,
				$params,
				array(
					'wp_insert_post > wp_error' => $new_cpt_id->get_error_message(),
					'new_cpt_data' => $new_cpt_data
				)
			);
		}

		// add post meta ( custom fields )
		if( !empty( $params['post_meta'] ) && is_array( $params['post_meta'] ) ) {
			foreach ( $params['post_meta'] as $meta_key => $meta_value ) {
				update_post_meta( $new_cpt_id, $meta_key, base64_decode( $meta_value ) );
			}
		}

		// set cpt image
		if ( !empty( $params['cpt_image_td_id'] ) ) {
			set_post_thumbnail( $new_cpt_id, td_demo_media::get_by_td_id( $params['cpt_image_td_id'] ) );
		}

		// set cpt taxonomies
		if ( !empty( $params['cpt_taxonomies'] ) ) {

			foreach ( $params['cpt_taxonomies'] as $cpt_taxonomy => $cpt_taxonomy_terms ) {
				wp_set_object_terms( $new_cpt_id, $cpt_taxonomy_terms, $cpt_taxonomy );
			}

		}

		// add our demo custom meta field, using this field we will delete all cpt s created during demo install
		update_post_meta( $new_cpt_id, 'td_demo_content', true );

		return $new_cpt_id;

	}

	/**
	 * Creates all possible combinations of variations from the attributes, without creating duplicates.
	 * @see WC_Product_Data_Store_CPT->create_all_product_variations
	 *
	 * @param  $product - variable product.
	 */
	static function create_product_variations( $product ) {

		$attributes = wc_list_pluck( array_filter( $product->get_attributes(), 'wc_attributes_array_filter_variation' ), 'get_slugs' );

		if ( empty( $attributes ) ) {
			return;
		}

		// Get existing variations so we don't create duplicates.
		$existing_variations = array_map( 'wc_get_product', $product->get_children() );
		$existing_attributes = array();

		foreach ( $existing_variations as $existing_variation ) {
			$existing_attributes[] = $existing_variation->get_attributes();
		}

		$possible_attributes = array_reverse( wc_array_cartesian( $attributes ) );

		foreach ( $possible_attributes as $possible_attribute ) {

			// allow any order if key/values -- do not use strict mode
			if ( in_array( $possible_attribute, $existing_attributes ) ) {
				continue;
			}

			$variation = wc_get_product_object( 'variation' );
			$variation->set_parent_id( $product->get_id() );
			$variation->set_attributes( $possible_attribute );

			// set price
			$variation->set_price(123);
			$variation->set_regular_price(123);
			$variation->set_sale_price(100);
			$variation->save(); // returns variation_id

		}
	}

	/**
	 * Adds post meta to tds locker
	 *
	 * @param $params
	 */
	static function add_locker_meta($params) {

		self::check_params(__CLASS__,__FUNCTION__, $params,
			array(
				'tds_locker_id' => 'Param is required !',
				'tds_locker_meta' => 'Param is required !'
			)
		);

		$tds_locker_id = $params['tds_locker_id'];
		$tds_locker_meta = $params['tds_locker_meta'];

		if ( !empty( $tds_locker_meta ) && is_array( $tds_locker_meta ) ) {
			foreach ( $tds_locker_meta as $meta_key => $meta_value ) {
				update_post_meta( $tds_locker_id, $meta_key, $meta_value );
			}
		}

	}

    static function remove() {

	    $post_types = get_post_types();
		$demo_cpts = array();

		foreach ( $post_types as $post_type ) {
			if ( str_contains( $post_type, 'tdcpt_' ) ) {
				$demo_cpts[] = $post_type;
			}
		}

        $args = array(
            'post_type' => array_merge( array( 'page', 'post', 'tdb_templates', 'product', 'tds_locker' ), $demo_cpts ),
            'meta_key'  => 'td_demo_content',
            'posts_per_page' => '-1'
        );

        $query = new WP_Query( $args );

        if ( !empty( $query->posts ) ) {
            foreach ( $query->posts as $post ) {
                wp_delete_post( $post->ID, true );
            }
       }

    }
}


class td_demo_widgets extends td_demo_base {

    private static $last_widget_instance = 70;
    private static $last_sidebar_widget_position = 0;



	private static $hard_coded_sidebars = array (
		'td-default',
		'td-footer-1',
		'td-footer-2',
		'td-footer-3'
	);




    /**
     * adds a new sidebar
     * @param $sidebar_name string - must begin with td_demo_
     */
    static function add_sidebar($sidebar_name) {
        if (substr($sidebar_name, 0, 8) != 'td_demo_') {
	        self::kill(__CLASS__, __FUNCTION__, 'All sidebars used in the demo must begin with td_demo_');
        }
        $tmp_sidebars = td_options::get_array('sidebars');
        $tmp_sidebars[]= $sidebar_name;
        td_util::update_option('sidebars', $tmp_sidebars);
    }


	/**
	 * adds a widget to a sidebar
	 * WARNING "td-" is automatically added to the sidebar name
	 * @param $sidebar_id
	 *          - default - to add to the default sidebar
	 *          - footer-1 - to add to the footer 1
	 *          - footer-2 - to add to the footer 2
	 *          - footer-3 - to add to the footer 3
	 *          - OR any custom sidebar created with @see td_demo_widgets::add_sidebar()
	 * @param $widget_name - the id of the widget
	 * @param $atts
	 */
    static function add_widget_to_sidebar($sidebar_id, $widget_name, $atts) {

        $tmp_sidebars = td_options::get_array('sidebars');
	    if (empty($tmp_sidebars)) {
		    $tmp_sidebars = array();
	    }


        if (
            !in_array('td-' . $sidebar_id, self::$hard_coded_sidebars) and
            !in_array($sidebar_id, $tmp_sidebars)
        ) {
	        self::kill(__CLASS__, __FUNCTION__, 'td_demo_widgets::add_widget_to_sidebar - No sidebar with the name provided! - td-' . $sidebar_id . ' (note that "td-" is automatically added to the sidebars name). Current registered sidebars: ', array_merge(self::$hard_coded_sidebars, $tmp_sidebars));
        }

        $widget_instances = get_option('widget_' . $widget_name);
        //in the demo mode, all the widgets will have an istance id of 70+
        $widget_instances[self::$last_widget_instance] = $atts;

        //add the widget instance to the database
        update_option('widget_' . $widget_name, $widget_instances);

        //print_r($widget_instances);
        $sidebars_widgets = get_option( 'sidebars_widgets' );

        //print_r($sidebars_widgets);
        $sidebars_widgets['td-' . td_util::sidebar_name_to_id($sidebar_id)][self::$last_sidebar_widget_position] = $widget_name . '-' . self::$last_widget_instance;
        //print_r($sidebars_widgets);
        update_option('sidebars_widgets', $sidebars_widgets);


        self::$last_sidebar_widget_position++;
        self::$last_widget_instance++;

    }


	/**
	 * Removes all widgets from the default sidebar.
	 * @param $sidebar_id - one of the following: default, footer-1, footer-2, footer-3
	 */
    static function remove_widgets_from_sidebar($sidebar_id = 'default') {

	    if (!in_array('td-' . $sidebar_id, self::$hard_coded_sidebars)) {
		    self::kill(__CLASS__, __FUNCTION__, 'You can only remove widgets from the hardcoded sidebars. For custom made sidebars during the import, there is no need to remove the widgets', self::$hard_coded_sidebars);
	    }


        $sidebar_id = td_util::sidebar_name_to_id($sidebar_id);
        $sidebars_widgets = get_option( 'sidebars_widgets' );

        if (isset($sidebars_widgets['td-' . $sidebar_id])) {
            //empty the default sidebar
            $sidebars_widgets['td-' . $sidebar_id] = array();
            update_option('sidebars_widgets', $sidebars_widgets);
        }
    }


    /**
     * remove the sidebars that begin with td_demo_
     */
    static function remove() {
        $tmp_sidebars = td_options::get_array('sidebars');
        if (!empty($tmp_sidebars)) {
            foreach ($tmp_sidebars as $index => $sidebar) {
                if (substr($sidebar, 0, 8) == 'td_demo_') {
                    unset($tmp_sidebars[$index]);
                }
            }
	        td_options::update_array('sidebars', $tmp_sidebars);
        }

    }
}


/**
 * tagDiv menu creating class
 * Class td_demo_menus
 */
class td_demo_menus extends td_demo_base {


    private static $allowed_menu_names = array(
        'td-demo-top-menu',
        'td-demo-header-menu',
        'td-demo-header-menu-extra',
        'td-demo-mobile-menu',
        'td-demo-footer-menu',
        'td-demo-footer-menu-extra',
        'td-demo-custom-menu',
    );



    /**
     * creates a menu and adds it to a location of the theme
     * @param $menu_name
     * @param $location
     * @return int menu id
     */
    static function create_menu($menu_name, $location) {
        if (!in_array($menu_name, self::$allowed_menu_names)) {
	        self::kill(__CLASS__, __FUNCTION__, $menu_name. ' - is not in allowed_menu_names. Menu name must be one of: ', self::$allowed_menu_names);
        }

	    $menu_exists = wp_get_nav_menu_object( $menu_name );
		if ($menu_exists === false) { // check if the menu already exists
			$menu_id = wp_create_nav_menu($menu_name);
			if (is_wp_error($menu_id)) {
				self::kill(__CLASS__, __FUNCTION__, $menu_id->get_error_message());
			}

			$menu_spots_array = get_theme_mod('nav_menu_locations');
			// activate the menu only if it's not already active
			if (!isset($menu_spots_array[$location]) or $menu_spots_array[$location] != $menu_id) {
				$menu_spots_array[$location] = $menu_id;
				set_theme_mod('nav_menu_locations', $menu_spots_array);
			}

			return $menu_id;
		} else {
			return $menu_exists->term_id;
		}
    }


	/**
	 * Adds a link to a menu
	 * @param $menu_params
	 * @return int|WP_Error
	 */
    static function add_link($menu_params) {
	    // required parameters
	    self::check_params(__CLASS__, __FUNCTION__, $menu_params, array(
		    'title' => 'Param is requiered!',
		    'url' => 'Param is requiered!',
		    'add_to_menu_id' => 'A menu id generated by td_demo_menus::create_menu is requiered'
	    ));


	    $itemData =  array (
            'menu-item-object' => '',
            'menu-item-type'      => 'custom',
            'menu-item-title'    => $menu_params['title'],
            'menu-item-url' => $menu_params['url'],
            'menu-item-status'    => 'publish'
        );

        if (!empty($menu_params['parent_id'])) {
            $itemData['menu-item-parent-id'] = $menu_params['parent_id'];
        }

        return wp_update_nav_menu_item($menu_params['add_to_menu_id'], 0, $itemData);
    }


	/**
	 * @param $menu_params
	 *  - requiered -
	 *      - page_id
	 *      - add_to_menu_id
	 *  - optional -
	 *      - parent_id -
	 */
    static function add_page($menu_params) {

	    // requiered parameters
	    self::check_params(__CLASS__, __FUNCTION__, $menu_params, array(
			'page_id' => 'To add a page to the menu, you need a page_ID. To add links or empty items, use td_demo_menus::add_link()',
		    'add_to_menu_id' => 'A menu id generated by td_demo_menus::create_menu is requiered'
	    ));


        //$menu_id, $title='', $page_id, $parent_id = ''
        $itemData =  array(
            'menu-item-object-id' => $menu_params['page_id'],
            'menu-item-parent-id' => 0,
            'menu-item-object' => 'page',
            'menu-item-type'      => 'post_type',
            'menu-item-status'    => 'publish'
        );

        if (!empty($menu_params['parent_id'])) {
            $itemData['menu-item-parent-id'] = $menu_params['parent_id'];
        }

	    // if no title is provided, wordpress will show the title of the page
        if (!empty($menu_params['title'])) {
            $itemData['menu-item-title'] = $menu_params['title'];
        }

		// we do not use the menu id anywhere for now
        return wp_update_nav_menu_item($menu_params['add_to_menu_id'], 0, $itemData);
    }


    /**
     * @param $menu_params
     *  - requiered -
     *      - product_id
     *      - add_to_menu_id
     *  - optional -
     *      - parent_id -
     */
    static function add_product($menu_params) {

        // requiered parameters
        self::check_params(__CLASS__, __FUNCTION__, $menu_params, array(
            'product_id' => 'To add a page to the menu, you need a page_ID. To add links or empty items, use td_demo_menus::add_link()',
            'add_to_menu_id' => 'A menu id generated by td_demo_menus::create_menu is requiered'
        ));


        //$menu_id, $title='', $product_id, $parent_id = ''
        $itemData =  array(
            'menu-item-object-id' => $menu_params['product_id'],
            'menu-item-parent-id' => 0,
            'menu-item-object' => 'page',
            'menu-item-type'      => 'post_type',
            'menu-item-status'    => 'publish'
        );

        if (!empty($menu_params['parent_id'])) {
            $itemData['menu-item-parent-id'] = $menu_params['parent_id'];
        }

        // if no titlte is provided, wordpress will show the title of the page
        if (!empty($menu_params['title'])) {
            $itemData['menu-item-title'] = $menu_params['title'];
        }

        // we do not use the menu id anywhere for now
        return wp_update_nav_menu_item($menu_params['add_to_menu_id'], 0, $itemData);
    }


    /**
     * adds a mega menu to a menu
     * @param $menu_params
     * @return int|WP_Error
     */
    static function add_mega_menu($menu_params, $url = false) {

	    // requiered parameters
	    self::check_params(__CLASS__, __FUNCTION__, $menu_params, array(
		    'title' => 'Param is requiered!',
		    //'category_id' => 'Param is requiered! - this is the category id that will be used to generate the mega menu',
		    'add_to_menu_id' => 'A menu id generated by td_demo_menus::create_menu is requiered'
	    ));


	    $itemData =  array(
            'menu-item-object' => '',
            'menu-item-type'      => 'custom',
            'menu-item-title'    => $menu_params['title'],
            'menu-item-url' => $url ? get_category_link($menu_params['category_id']) : '#',
            'menu-item-status'    => 'publish'
        );

        $menu_item_id =  wp_update_nav_menu_item($menu_params['add_to_menu_id'], 0, $itemData);
        if(isset($menu_params['category_id'])) {
            update_post_meta($menu_item_id, 'td_mega_menu_cat', $menu_params['category_id']);
        } else if(isset($menu_params['page_id'])) {
            update_post_meta($menu_item_id, 'td_mega_menu_page_id', $menu_params['page_id']);
        }
        return $menu_item_id;
    }


	/**
	 * adds a category to a menu
	 * @param $menu_params
	 * @return false|int|WP_Error|WP_Term
	 */
    static function add_category($menu_params) {

	    // required parameters
	    self::check_params(__CLASS__, __FUNCTION__, $menu_params, array(
		    'title' => 'Param is required!',
		    'category_id' => 'Param is required! - this is the category id that will be used to generate the mega menu',
		    'add_to_menu_id' => 'A menu id generated by td_demo_menus::create_menu is required'
	    ));

        $itemData =  array(
            'menu-item-title' => $menu_params['title'],
            'menu-item-object-id' => $menu_params['category_id'],
            'menu-item-db-id' => 0,
            'menu-item-url' => get_category_link( $menu_params['category_id'] ),
            'menu-item-type' => 'taxonomy', // taxonomy
            'menu-item-status' => 'publish',
            'menu-item-object' => 'category',
        );

        if (!empty($menu_params['parent_id'])) {
            $itemData['menu-item-parent-id'] = $menu_params['parent_id'];
        }

        return wp_update_nav_menu_item($menu_params['add_to_menu_id'], 0, $itemData);
    }


	/**
	 * adds a product category to a menu
	 * @param $params
	 * @return false|int|WP_Error|WP_Term
	 */
	static function add_product_cat($params) {

		// required parameters
		self::check_params(__CLASS__, __FUNCTION__, $params, array(
			'title' => 'Param is required!',
			'p_cat_id' => 'Param is required! - this is the category id that will be used to generate the mega menu',
			'add_to_menu_id' => 'A menu id generated by td_demo_menus::create_menu is required'
		));

		$menu_item_data =  array(
			'menu-item-title' => $params['title'],
			'menu-item-object-id' => $params['p_cat_id'],
			'menu-item-db-id' => 0,
			'menu-item-url' => get_category_link( $params['p_cat_id'] ),
			'menu-item-type' => 'taxonomy', // taxonomy
			'menu-item-status' => 'publish',
			'menu-item-object' => 'product_cat',
		);

		if ( !empty($params['parent_id']) ) {
			$menu_item_data['menu-item-parent-id'] = $params['parent_id'];
		}

		return wp_update_nav_menu_item( $params['add_to_menu_id'], 0, $menu_item_data );
	}


	/**
	 * adds a taxonomy to a menu
	 * @param $params
	 * @return false|int|WP_Error|WP_Term
	 */
	static function add_taxonomy($params) {

		// required parameters
		self::check_params(__CLASS__, __FUNCTION__, $params, array(
			'title' => 'Param is required!',
			'taxonomy' => 'Param is required!',
			'tax_id' => 'Param is required!',
			'add_to_menu_id' => 'A menu id generated by td_demo_menus::create_menu is required'
		));

		$term_link = get_term_link( $params['tax_id'] );
		$menu_item_data = array(
			'menu-item-title' => $params['title'],
			'menu-item-object-id' => $params['tax_id'],
			'menu-item-db-id' => 0,
			'menu-item-url' => !is_wp_error( $term_link ) ? $term_link : '#',
			'menu-item-type' => 'taxonomy', // taxonomy
			'menu-item-status' => 'publish',
			'menu-item-object' => $params['taxonomy'],
		);

		if ( !empty($params['parent_id']) ) {
			$menu_item_data['menu-item-parent-id'] = $params['parent_id'];
		}

		return wp_update_nav_menu_item( $params['add_to_menu_id'], 0, $menu_item_data );

	}


    /**
     * removes all the menus, used by uninstall
     */
    static function remove() {
        foreach (self::$allowed_menu_names as $menu_name) {
            wp_delete_nav_menu($menu_name);
        }
    }
}


//$td_stacks_media->td_media_sideload_image('http://demo.tagdiv.com/newsmag/wp-content/uploads/2014/08/38.jpg', '');
class td_demo_media extends td_demo_base {
    /**
     * Download an image from the specified URL and attach it to a post.
     *
     * @since 2.6.0
     *
     * @param string $file The URL of the image to download
     * @param int $post_id The post ID the media is to be associated with
     * @param string $desc Optional. Description of the image
     * @return string|WP_Error Populated HTML img tag on success
     */
    static function add_image_to_media_gallery($td_attachment_id, $file, $post_id = '', $desc = null, $audio = false ) {

        require_once(ABSPATH . 'wp-admin/includes/media.php');
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        require_once(ABSPATH . 'wp-admin/includes/image.php');


        // Set variables for storage, fix file filename for query strings.
        if( !$audio ) {
            preg_match( '/[^\?]+\.(jpe?g|jpe|gif|png)\b/i', $file, $matches );
        } else {
            preg_match( '(.flac|.aiff|.wav|.m4a|.mid|.au|.mp3|.wma|.oga|.opus|.webm)', $file, $matches );
        }
        $file_array = array();
        $file_array['name'] = basename( $matches[0] );

        // Download file to temp location.
        $file_array['tmp_name'] = download_url( $file );

        // If error storing temporarily, return the error.
        if ( is_wp_error( $file_array['tmp_name'] ) ) {
            @unlink($file_array['tmp_name']);
            echo 'is_wp_error $file_array: ' . $file;
            print_r($file_array['tmp_name']);
            return $file_array['tmp_name'];
        }

        // Do the validation and storage stuff.
        $id = media_handle_sideload( $file_array, $post_id, $desc ); //$id of attachment or wp_error

        // If error storing permanently, unlink.
        if ( is_wp_error( $id ) ) {
            @unlink( $file_array['tmp_name'] );
            echo 'is_wp_error $id: ' . $id->get_error_messages() . ' ' . $file;
            return $id;
        }


        update_post_meta($id, 'td_demo_attachment', $td_attachment_id);

        return $id;
    }



    static function remove() {
        $args = array(
            'post_type' => array('attachment'),
            'post_status' => 'inherit',
            'meta_key'  => 'td_demo_attachment',
            'posts_per_page' => '-1'
        );
        $query = new WP_Query( $args );


        if (!empty($query->posts)) {
            foreach ($query->posts as $post) {
                $return_value = wp_delete_attachment($post->ID, true);
                if ($return_value === false) {
                    echo 'td_demo_media::remove - failed to delete image id:' . $post->ID ;
                }
                //echo 'deleting: ' . $post->ID;
            }
        }
    }


    static function get_by_td_id($td_id) {
        $args = array(
            'post_type' => array('attachment'),
            'post_status' => 'inherit',
            'meta_key'  => 'td_demo_attachment',
            'posts_per_page' => '-1'
        );

        //!!!! big problem here - we rely on the wp_cache from get_post_meta too much
        $query = new WP_Query( $args );
        if (!empty($query->posts)) {
            foreach ($query->posts as $post) {
                //search for our td_id in the post meta
                $pic_td_id = get_post_meta($post->ID, 'td_demo_attachment', true);
                if ($pic_td_id == $td_id) {
                    return $post->ID;
                    break;
                }
            }
        }
        return false;
    }


    static function get_image_url_by_td_id($td_id, $size = 'full') {
        $image_id = self::get_by_td_id($td_id);
        if($image_id !== false) {
            $attachement_array = wp_get_attachment_image_src($image_id, $size, false );
            if (!empty($attachement_array[0])) {
                return $attachement_array[0];
            }

        }
        return false;
    }

    static function  get_menu_id($menu_name) {
    	$menu_id = get_term_by('name', $menu_name, 'nav_menu');

        if( $menu_id ) {
            return $menu_id->term_id;
        }

        return '';
    }
}


class td_demo_subscription extends td_demo_base {

	static function add_account_details($data) {
		global $wpdb;

		$data_values = [];
		$data_format = [];

		foreach (['company_name', 'billing_cui', 'billing_j', 'billing_address', 'billing_city', 'billing_country', 'billing_email', 'billing_bank_account', 'billing_post_code', 'billing_vat_number', 'options'] as $item ) {
			if (isset($data[$item])) {
				$data_values[$item] = $data[$item];
				$data_format[] = '%s';
			} else {
				return null;
			}
		}

		$wpdb->suppress_errors = true;

		$insert_result = $wpdb->insert( 'tds_companies',
			$data_values,
			$data_format );

		if ( false !== $insert_result ) {
			return $wpdb->insert_id;
		}
		return null;
	}

	static function add_payment_bank($data) {
		global $wpdb;

		$data_values = [];
		$data_format = [];

		foreach (['account_name', 'account_number', 'bank_name', 'routing_number', 'iban', 'bic_swift', 'description', 'instruction', 'is_active', 'options'] as $item ) {
			if (isset($data[$item])) {
				$data_values[$item] = $data[$item];
				$data_format[] = '%s';
			} else {
				return null;
			}
		}

		$wpdb->suppress_errors = true;

		$insert_result = $wpdb->insert( 'tds_payment_bank',
			$data_values,
			$data_format );

		if ( false !== $insert_result ) {
			return $wpdb->insert_id;
		}
		return null;
	}

	static function add_plan($data) {
		global $wpdb;

		$data_values = [];
		$data_format = [];

		foreach (['name', 'price', 'months_in_cycle', 'trial_days', 'is_free', 'options'] as $item ) {
			if (isset($data[$item])) {
				$data_values[$item] = $data[$item];
				$data_format[] = '%s';
			} else {
				return null;
			}
		}

		$wpdb->suppress_errors = true;

		$insert_result = $wpdb->insert( 'tds_plans',
			$data_values,
			$data_format );

		if ( false !== $insert_result ) {
			return $wpdb->insert_id;
		}
		return null;
	}

	static function add_option($data) {
		global $wpdb;

		$data_values = [];
		$data_format = [];

		if (in_array($data['name'], ['payment_page_id',
			'my_account_page_id',
			'create_account_page_id',
			'go_wizard',
			'wizard_company_complete',
			'wizard_payments_complete',
			'wizard_plans_complete',
			'wizard_locker_complete',
			'disable_wizard',
			'td_demo_content'])) {

			$data_values['name'] = $data['name'];
			$data_values['value'] = $data['value'];
			$data_format[] = '%s';
			$data_format[] = '%s';
		} else {
			return null;
		}

		if (in_array($data['name'], ['payment_page_id',
			'my_account_page_id',
			'create_account_page_id'])) {

			$update_result = $wpdb->update( 'tds_options',
				$data_values,
				['name' => $data['name']],
				$data_format );

			if ( false !== $update_result ) {
				return $wpdb->rows_affected;
			}

		} else {
			$insert_result = $wpdb->insert( 'tds_options',
				$data_values,
				$data_format );

			if ( false !== $insert_result ) {
				return $wpdb->insert_id;
			}
		}
		return null;
	}
}
