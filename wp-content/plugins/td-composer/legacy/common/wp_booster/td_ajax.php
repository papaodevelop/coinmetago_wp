<?php

class td_ajax {

	/**
	 * This function is also callable, it is used to warm the cache for the ajax blocks
	 * @param string $ajax_parameters
	 * @return mixed
	 */
	static function on_ajax_block($ajax_parameters = '') {

		$isAjaxCall = false;

		if (empty($ajax_parameters)) {
			$isAjaxCall = true;
			$ajax_parameters = array (
				'td_atts' => '',            // original block atts
				'td_column_number' => 0,    // should not be 0 (1 - 2 - 3)
				'td_current_page' => '',    // the current page of the block
				'td_block_id' => '',        // block uid
				'block_type' => '',         // the type of the block / block class
				'td_filter_value' => ''     // the id for this specific filter type. The filter type is in the td_atts
			);


			if (!empty($_POST['td_atts'])) {
				$ajax_parameters['td_atts'] = json_decode(stripslashes($_POST['td_atts']), true); //current block args
			}
			if (!empty($_POST['td_column_number'])) {
				$ajax_parameters['td_column_number'] =  $_POST['td_column_number']; //the block is on x columns
			}
			if (!empty($_POST['td_current_page'])) {
				$ajax_parameters['td_current_page'] = $_POST['td_current_page'];
			}
			if (!empty($_POST['td_block_id'])) {
				$ajax_parameters['td_block_id'] = $_POST['td_block_id'];
			}
			if (!empty($_POST['block_type'])) {
				$ajax_parameters['block_type'] = $_POST['block_type'];
			}
			//read the id for this specific filter type
			if (!empty($_POST['td_filter_value'])) {

				//this removes the block offset for blocks pull down filter items
				//..it excepts the "All" filter tab which will load posts with the set offset
				if (!empty($ajax_parameters['td_atts']['offset'])){
					unset($ajax_parameters['td_atts']['offset']);
				}
				$ajax_parameters['td_filter_value']  = $_POST['td_filter_value']; //the new id filter
			}
		}



		/*
		 * HANDLES THE PULL DOWN FILTER + TABS ON RELATED POSTS
		 * read the block atts - td filter type and overwrite the default values at runtime! (ex: the user changed the category from the dropbox, we overwrite the static default category of the block)
		 */
		if (!empty($ajax_parameters['td_atts']['td_ajax_filter_type'])) {
			//dynamic filtering
			switch ($ajax_parameters['td_atts']['td_ajax_filter_type']) {

				case 'td_category_ids_filter': // by category  - the user selected a category from the drop down. if it's empty, we show the default block atts
					if (!empty($ajax_parameters['td_filter_value'])) {
						$ajax_parameters['td_atts']['category_ids'] = $ajax_parameters['td_filter_value'];
						unset($ajax_parameters['td_atts']['category_id']);
					}
					break;


				case 'td_author_ids_filter': // by author
					if (!empty($ajax_parameters['td_filter_value'])) {
						$ajax_parameters['td_atts']['autors_id'] = $ajax_parameters['td_filter_value'];
					}
					break;

				case 'td_tag_slug_filter': // by tag - due to wp query and for combining the tags with categories we have to convert tag_ids to tag_slugs
					if (!empty($ajax_parameters['td_filter_value'])) {
						$term_obj = get_term($ajax_parameters['td_filter_value'], 'post_tag');
						$ajax_parameters['td_atts']['tag_slug'] = $term_obj->slug;
					}
					break;


				case 'td_popularity_filter_fa': // by popularity (sort)
					if (!empty($ajax_parameters['td_filter_value'])) {
						$ajax_parameters['td_atts']['sort'] = $ajax_parameters['td_filter_value'];
					}
					break;


				/**
				 * used by the related posts block
				 * - if $td_atts['td_ajax_filter_type'] == td_custom_related  ( this is hardcoded in the block atts  @see td_module_single.php:764)
				 * - overwrite the live_filter for this block - ( the default live_filter is also hardcoded in the block atts  @see td_module_single.php:764)
				 * the default live_filter for this block is: 'live_filter' => 'cur_post_same_categories'
				 * @var $td_filter_value comes via ajax
				 */
				case 'td_custom_related':
					if ($ajax_parameters['td_filter_value'] == 'td_related_more_from_author') {
						$ajax_parameters['td_atts']['live_filter'] = 'cur_post_same_author'; // change the live filter for the related posts
					}
					break;
			}
		}


		/**
		 * @var WP_Query
		 */
		$td_query = &td_data_source::get_wp_query($ajax_parameters['td_atts'], $ajax_parameters['td_current_page']); //by ref  do the query

        $block_instance = td_global_blocks::get_instance($ajax_parameters['block_type']);

        // set the atts for this block. We get the atts via ajax
        $block_instance->set_all_atts($ajax_parameters['td_atts']);

        // these blocks work with the data type of array
        $block_array_data_type = array('tdb_loop', 'tdb_loop_2');

        if ( in_array( $ajax_parameters['block_type'], $block_array_data_type ) ) {
            $data_array = array();

            foreach ( $td_query->posts as $post ) {

                $data_array['loop_posts'][$post->ID] = array(
                    'post_id'               => $post->ID,
                    'post_type'             => get_post_type( $post->ID ),
                    'has_post_thumbnail'    => has_post_thumbnail( $post->ID ),
                    'post_thumbnail_id'     => get_post_thumbnail_id( $post->ID ),
                    'post_link'             => esc_url( get_permalink( $post->ID ) ),
                    'post_title'            => get_the_title( $post->ID ),
                    'post_title_attribute'  => esc_attr( strip_tags( get_the_title( $post->ID ) ) ),
                    'post_excerpt'          => $post->post_excerpt,
                    'post_content'          => $post->post_content,
                    'post_date_unix'        => get_the_time( 'U', $post->ID ),
                    'post_date'             => get_the_time( get_option( 'date_format' ), $post->ID ),
                    'post_author_url'       => get_author_posts_url( $post->post_author ),
                    'post_author_name'      => get_the_author_meta( 'display_name', $post->post_author ),

