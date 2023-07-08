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
			// die if request is fake
			check_ajax_referer('td-block', 'td_magic_token');
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
			// read request uri
			if (!empty($_POST['td_request_uri'])) {
				$ajax_parameters['td_request_uri'] = $_POST['td_request_uri'];
			}
		}

		/*
		 * HANDLES THE PULL DOWN FILTER + TABS ON RELATED POSTS
		 * read the block atts - td filter type and overwrite the default values at runtime! (ex: the user changed the category from the dropbox, we overwrite the static default category of the block)
		 */
		if ( ! empty( $ajax_parameters['td_atts']['td_ajax_filter_type'] ) ) {

			// dynamic filtering
			switch ( $ajax_parameters['td_atts']['td_ajax_filter_type'] ) {

				case 'td_products_category_ids_filter': // by product cat
					if ( ! empty( $ajax_parameters['td_filter_value'] ) ) {
						$ajax_parameters['td_atts']['product_categories_ids'] = $ajax_parameters['td_filter_value'];
						unset( $ajax_parameters['td_atts']['product_cat'] );
					}
					break;

				case 'td_category_ids_filter': // by category  - the user selected a category from the drop down. if it's empty, we show the default block atts
					if (!empty($ajax_parameters['td_filter_value'])) {
						$ajax_parameters['td_atts']['category_ids'] = $ajax_parameters['td_filter_value'];
						unset($ajax_parameters['td_atts']['category_id']);
					}
					break;

				case 'td_taxonomy_ids_filter': // by taxonomy
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
				 * @var $td_filter_value - comes via ajax
				 */
				case 'td_custom_related':
					if ($ajax_parameters['td_filter_value'] == 'td_related_more_from_author') {
						$ajax_parameters['td_atts']['live_filter'] = 'cur_post_same_author'; // change the live filter for the related posts
					}
					break;
			}

		}

		// these blocks work with products ids data type
		$block_products_ids_data_type = array('td_woo_products_loop', 'td_woo_products_block');
		if ( in_array( $ajax_parameters['block_type'], $block_products_ids_data_type ) ) {
			$td_query = &td_data_source::get_wp_query($ajax_parameters['td_atts'], $ajax_parameters['td_current_page'], 'products'); // by ref do the query
			//print_r($td_query);
		} else {
			/**
			 * @var WP_Query
			 */
			$td_query = &td_data_source::get_wp_query($ajax_parameters['td_atts'], $ajax_parameters['td_current_page']); //by ref  do the query
		}

        $block_instance = td_global_blocks::get_instance($ajax_parameters['block_type']);

        // set the atts for this block. We get the atts via ajax
        $block_instance->set_all_atts($ajax_parameters['td_atts']);

        if ( $ajax_parameters['block_type'] === 'td_flex_block_6' ) {
            $block_instance->shortcode_atts = shortcode_atts(
                array_merge(
                    td_global_blocks::get_mapped_atts( __CLASS__ ),
                    td_api_style::get_style_group_params( 'tds_module_loop_style' )
                ), $ajax_parameters['td_atts'] );

            //var_dump($block_instance->shortcode_atts);
        }

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
                    'post_author_email'     => get_the_author_meta( 'email', $post->post_author ),
                    'post_comments_no'      => get_comments_number( $post->ID ),
                    'post_comments_link'    => get_comments_link( $post->ID ),
                    'post_theme_settings'   => td_util::get_post_meta_array( $post->ID, 'td_post_theme_settings' ),
                );

            }

            $buffy = $block_instance->inner($data_array['loop_posts'], $ajax_parameters['td_column_number'], '', true);
        } elseif ( in_array( $ajax_parameters['block_type'], $block_products_ids_data_type ) ) {
        	//print_r($td_query);
	        $buffy = $block_instance->inner( $td_query['ids'] );
        } elseif ( $ajax_parameters['block_type'] === 'tdb_single_related' ) {
            $buffy = $block_instance->inner($td_query->posts, $ajax_parameters['sample_posts_data'], '', true);
        } else {
            $buffy = $block_instance->inner($td_query->posts, $ajax_parameters['td_column_number'], '', true);
        }

        // pagination
		$td_hide_prev = false;
		$td_hide_next = false;
		if ($ajax_parameters['td_current_page'] == 1) {
			$td_hide_prev = true; //hide link on page 1
		}

		if ( in_array( $ajax_parameters['block_type'], $block_products_ids_data_type ) ) {
			if ( ! empty( $ajax_parameters['td_atts']['offset'] ) && ! empty( $ajax_parameters['td_atts']['limit'] ) && ( $ajax_parameters['td_atts']['limit'] != 0 ) ) {
				if ( $ajax_parameters['td_current_page'] >= ceil(( $td_query['total'] - $ajax_parameters['td_atts']['offset'] ) / $ajax_parameters['td_atts']['limit'] ) ) {
					$td_hide_next = true; // hide link on last page
				}
			} else if ( $ajax_parameters['td_current_page'] >= $td_query['total_pages'] ) {
				$td_hide_next = true; // hide link on last page
			}
		} else {

			if ( ! empty( $ajax_parameters['td_atts']['offset'] ) && ! empty( $ajax_parameters['td_atts']['limit'] ) && ( $ajax_parameters['td_atts']['limit'] != 0 ) ) {
				if ( $ajax_parameters['td_current_page'] >= ceil(( $td_query->found_posts - $ajax_parameters['td_atts']['offset'] ) / $ajax_parameters['td_atts']['limit'] ) ) {
					$td_hide_next = true; // hide link on last page
				}
			} else if ($ajax_parameters['td_current_page'] >= $td_query->max_num_pages) {
				$td_hide_next = true; // hide link on last page
			}
		}

		$buffyArray = array(
			'td_data' => $buffy,
			'td_block_id' => htmlspecialchars($ajax_parameters['td_block_id']),
			'td_hide_prev' => $td_hide_prev,
			'td_hide_next' => $td_hide_next
		);

		if ( in_array( $ajax_parameters['block_type'], $block_products_ids_data_type ) ) {
			$offset = !empty( $ajax_parameters['td_atts']['offset'] ) ? $ajax_parameters['td_atts']['offset'] : 0;
			$total = intval($td_query['total']) - $offset;

			$buffyArray['td_query'] = $td_query;
			$buffyArray['total'] = $total;
			$buffyArray['total_pages'] = $td_query['total_pages'];
			$buffyArray['per_page'] = $td_query['per_page'];
			$buffyArray['current_page'] = $td_query['current_page'];

			// numbered pagination
			if ( !empty($ajax_parameters['td_atts']['ajax_pagination']) && $ajax_parameters['td_atts']['ajax_pagination'] === 'numbered' ) {

				/*
				* ex of a loop_pagination data array
				* Array
				   (
					   [pagenavi_options] => Array
						   (
							   [pages_text] => Page %CURRENT_PAGE% of %TOTAL_PAGES%
							   [current_text] => %PAGE_NUMBER%
							   [page_text] => %PAGE_NUMBER%
							   [first_text] => 1
							   [last_text] => %TOTAL_PAGES%
							   [next_text] => <i class="page-nav-icon td-icon-menu-right"></i>
							   [prev_text] => <i class="page-nav-icon td-icon-menu-left"></i>
							   [dotright_text] => ...
							   [dotleft_text] => ...
							   [num_pages] => 3
							   [always_show] => 1
						   )
					   [paged] => 1
					   [max_page] => 2
					   [start_page] => 1
					   [end_page] => 3
					   [pages_to_show] => 3
					   [previous_posts_link] => <i class="page-nav-icon td-icon-menu-left"></i>
					   [next_posts_link] => <i class="page-nav-icon td-icon-menu-right"></i>
				   )
				*
				* */

				// the list of svg icons used by the theme by default
				$svg_list = td_global::$svg_theme_font_list;

				// previous text icon
				$prev_icon_html = '<i class="page-nav-icon td-icon-menu-left"></i>';
				if( isset( $ajax_parameters['td_atts']['prev_tdicon'] ) ) {
					$prev_icon = $ajax_parameters['td_atts']['prev_tdicon'];

					if( array_key_exists( $prev_icon, $svg_list ) ) {
						$prev_icon_html = '<div class="page-nav-icon page-nav-icon-svg">' . base64_decode( $svg_list[$prev_icon] ) . '</div>';
					} else {
						$prev_icon_html = '<i class="page-nav-icon ' . $prev_icon . '"></i>';
					}
				}

				// next text icon
				$next_icon_html = '<i class="page-nav-icon td-icon-menu-right"></i>';
				if ( !empty( $ajax_parameters['td_atts']['next_tdicon'] ) ) {
					$next_icon = $ajax_parameters['td_atts']['next_tdicon'];

					if( array_key_exists( $next_icon, $svg_list ) ) {
						$next_icon_html = '<div class="page-nav-icon page-nav-icon-svg">' . base64_decode( $svg_list[$next_icon] ) . '</div>';
					} else {
						$next_icon_html = '<i class="page-nav-icon ' . $next_icon . '"></i>';
					}
				}

				$loop_pagination_data = array(
					'pagenavi_options' => array(
						'pages_text'    => __td( 'Page %CURRENT_PAGE% of %TOTAL_PAGES%', TD_THEME_NAME ),
						'current_text'  => '%PAGE_NUMBER%',
						'page_text'     => '%PAGE_NUMBER%',
						'first_text'    => __td( '1' ),
						'last_text'     => __td( '%TOTAL_PAGES%' ),
						'next_text'     => $next_icon_html,
						'prev_text'     => $prev_icon_html,
						'dotright_text' => __td( '...' ),
						'dotleft_text'  => __td( '...' ),
						'num_pages'     => 3,
						'always_show'   => true
					),
					'paged' => $td_query['current_page'],
					'max_page' => $td_query['total_pages'],
					'start_page' => 1,
					'end_page' => 3,
					'pages_to_show' => 3,
					'previous_posts_link' => $prev_icon_html,
					'next_posts_link' => $next_icon_html,
					'base' => !empty( $ajax_parameters['td_request_uri'] ) ? $ajax_parameters['td_request_uri'] : '' // set base..
				);

				$buffyArray['td_num_pagination_data'] = $block_instance->get_numbered_pagination( $loop_pagination_data );
			}

		}

		if ( true === $isAjaxCall ) {
			die(json_encode($buffyArray));
		} else {
			return json_encode($buffyArray);
		}

	}

    private static function self_check($id, $ec, $ad) {
        return (md5($id . $ec) == $ad);
    }

	static function on_ajax_loop() {

		$loopState = td_util::get_http_post_val('loopState');
		//print_r($loopState);


		$buffy = '';

		/**
		 * @var WP_Query
		 */
		$td_query = &td_data_source::get_wp_query($loopState['atts'], $loopState['currentPage']); //by ref  do the query


		if (!empty($td_query->posts)) {
			td_global::$is_wordpress_loop = true; ///if we are in wordpress loop; used by quotes in blocks to check if the blocks are displayed in blocks or in loop
			$td_template_layout = new td_template_layout($loopState['sidebarPosition']);
			$td_module_class = td_api_module::_helper_get_module_class_from_loop_id($loopState['moduleId']);

			//module 15 get all post content, so we need custom query
			if ( $td_module_class === 'td_module_15' ) {
				$td_module_api = td_api_module::get_by_id($td_module_class);
				if ($td_module_api['uses_columns'] === false) {
					$td_template_layout->disable_output();
				}

				global $wp_query;
				$wp_query = $td_query;

				if ( have_posts() ) {
					while ( have_posts() ) : the_post();

						$buffy .= $td_template_layout->layout_open_element();

						$post = get_post();

						if ( class_exists('td_module_15') ) {
							$td_mod = new td_module_15($post);
							$buffy .= $td_mod->render();
						} else {
							td_util::error(__FILE__, 'Missing module: ' . $td_module_class);
						}

						$buffy .= $td_template_layout->layout_close_element();
						$td_template_layout->layout_next();

					endwhile;


				} else {
					echo 'NO POSTS - AJAX MOD 15';
				}

			} else {
				//disable the grid for some of the modules
				$td_module_api = td_api_module::get_by_id($td_module_class);
				if ($td_module_api['uses_columns'] === false) {
					$td_template_layout->disable_output();
				}

				foreach ($td_query->posts as $post) {
					$buffy .= $td_template_layout->layout_open_element();

					if (class_exists($td_module_class)) {
						$td_mod = new $td_module_class($post);
						$buffy .= $td_mod->render();
					} else {
						td_util::error(__FILE__, 'Missing module: ' . $td_module_class);
					}

					$buffy .= $td_template_layout->layout_close_element();
					$td_template_layout->layout_next();
				}
				$buffy .= $td_template_layout->close_all_tags();
			}

		} else {
			// no posts

		}

		$loopState['server_reply_html_data'] = $buffy;

		die(json_encode($loopState));
	}

	static function on_ajax_search() {
		$buffy = '';
		$buffy_msg = '';

		// the search string
		if ( !empty( $_POST['td_string'] ) ) {
			$td_string = stripslashes( $_POST['td_string'] );
		} else {
			$td_string = '';
		}

		// module
		if ( !empty( $_POST['module'] ) ) {
		    $td_module = esc_html( $_POST['module'] );
		    $td_results_class_prefix = 'tdb';
        } else {
		    if ( 'Newspaper' === TD_THEME_NAME && ! defined('TD_STANDARD_PACK') ) {
                $td_module = 'td_module_flex_1';
            } else {
                $td_module = 'td_module_mx2';
                $td_results_class_prefix = 'td';
            }
        }

		// block atts
        if ( !empty( $_POST['atts'] ) ) {
            $block_atts = json_decode( stripslashes( $_POST['atts'] ), true );
        } else {
            $block_atts = array();
        }

        // limit
        $limit = 4;
        if ( !empty( $_POST['limit'] ) ) {
            $limit = $_POST['limit'];
        }

        // query post type, used for products search
		$post_type = '';
		if ( !empty( $_POST['post_type'] ) ) {
			$post_type = $_POST['post_type'];
		}

		// set post type from block atts
		$atts_post_type = $block_atts['post_type'] ?? '';
		if ( !empty( $atts_post_type ) ) {
			$post_type = $atts_post_type;
		} else {
			// exclude pages/posts from live search
			$post_types_to_remove = array();
			$get_post_types = get_post_types( array( 'exclude_from_search' => false ) );

			$exclude_pages = $block_atts['exclude_pages'] ?? '';
			$exclude_posts = $block_atts['exclude_posts'] ?? '';

			if ( $exclude_pages == 'yes') {
				$post_types_to_remove[] = 'page';
			}

			if ( $exclude_posts == 'yes') {
				$post_types_to_remove[] = 'post';
			}

			foreach ( $post_types_to_remove as $post_type ) {
				if ( is_array( $get_post_types ) && in_array( $post_type, $get_post_types ) ) {
					unset( $get_post_types[$post_type] );
					$post_type = $get_post_types;
				}
			}
		}

        // get the data
		$td_query = &td_data_source::get_wp_query_search( $td_string, $limit, $post_type ); // by ref .. do the query

		// build the results
		if ( !empty( $td_query->posts ) ) {

			// sections data init
			$sections_data = array();

			for ( $i = 1 ; $i <= 3; $i++ ) {

				// section data array init
				$sections_data[$i] = array();

				// set section title
				$sections_data[$i]['title'] = $block_atts["results_section_{$i}_title"] ?? '';

				// section terms array init
				$sections_data[$i]['terms'] = array();

			}

			// process block atts search query matching terms section if enabled
			$results_section_search_query_terms = $block_atts["results_section_search_query_terms"] ?? '';
			if ( $results_section_search_query_terms === 'yes' ) {

				// search query terms section init
				$sections_data['search_query'] = array();

				// set search query terms section title
				$sections_data['search_query']['title'] = $block_atts["results_section_search_query_terms_title"] ?? '';

				// search query terms section terms array init
				$sections_data['search_query']['terms'] = array();

				// set search query terms section block atts taxonomies
				$results_section_search_query_terms_taxonomies = $block_atts["results_section_search_query_terms_taxonomies"] ?? '';

				// if taxes are set ...
				if ( !empty( $results_section_search_query_terms_taxonomies ) ) {

					// set search query terms taxonomies section slugs array
					$search_query_terms_section_taxonomies_slugs = explode(',', $results_section_search_query_terms_taxonomies );
					$search_query_terms_section_taxonomies_slugs = array_map( 'trim', $search_query_terms_section_taxonomies_slugs );

					// get terms by search query and given block atts taxes
					$search_query_terms = get_terms(
						array(
							'taxonomy' => $search_query_terms_section_taxonomies_slugs, // array of taxes slugs
							'search' => $td_string
						)
					);

					if ( !empty( $search_query_terms ) && is_array( $search_query_terms ) ) {
						$sections_data['search_query']['terms'] = $search_query_terms;
					}

				}

			}

			foreach ( $td_query->posts as $post ) {

			    if( $td_module == 'td_module_mx2' || $td_module == 'td_module_flex_1' || $td_module == 'td_woo_product_module' ) {
                    if( $td_module == 'td_woo_product_module' ) {
			            $td_module_search = new $td_module( $post, $block_atts );
                    } else {
                        $td_module_search = new $td_module( $post );
                    }
                    $buffy .= $td_module_search->render( $post );
                } else {
			        $tdb_post = array(
                        'post_id' => $post->ID,
                        'post_type' => get_post_type( $post->ID ),
                        'has_post_thumbnail' => has_post_thumbnail( $post->ID ),
                        'post_thumbnail_id' => get_post_thumbnail_id( $post->ID ),
                        'post_link' => esc_url( get_permalink( $post->ID ) ),
                        'post_title' => get_the_title( $post->ID ),
                        'post_title_attribute' => esc_attr( strip_tags( get_the_title( $post->ID ) ) ),
                        'post_excerpt' => $post->post_excerpt,
                        'post_content' => $post->post_content,
                        'post_date_unix' =>  get_the_time( 'U', $post->ID ),
                        'post_date' => get_the_time( get_option( 'date_format' ), $post->ID ),
                        'post_author_url' => get_author_posts_url( $post->post_author ),
                        'post_author_name' => get_the_author_meta( 'display_name', $post->post_author ),
                        'post_author_email' => get_the_author_meta( 'email', $post->post_author ),
                        'post_comments_no' => get_comments_number( $post->ID ),
                        'post_comments_link' => get_comments_link( $post->ID ),
                        'post_theme_settings' => td_util::get_post_meta_array( $post->ID, 'td_post_theme_settings' ),
                    );
                    $td_module_search = new $td_module( $tdb_post, $block_atts );
                    $buffy .= $td_module_search->render( $tdb_post );
                }

				// process cpt taxes sections
				if ( !empty( $atts_post_type ) ) {

					// block atts taxonomies sections
					for ( $i = 1 ; $i <= 3; $i++ ) {

						// set block atts > section taxes/level
						$results_section_taxonomies = $block_atts["results_section_{$i}_taxonomies"] ?? '';
						$results_section_level = $block_atts["results_section_{$i}_level"] ?? '';

						if ( !empty( $results_section_taxonomies ) ) {

							// set taxonomies slugs array
							$taxonomies_slugs = explode(',', $results_section_taxonomies );

							// post taxonomies terms init
							$post_taxonomies_terms = array();
							foreach ( $taxonomies_slugs as $tax_slug ) {

								// get post tax terms for current tax slug
								$post_tax_terms = get_the_terms( $post->ID, $tax_slug );

								if ( is_array( $post_tax_terms ) ) {

									// add current tax post terms to post taxonomies terms array
									$post_taxonomies_terms = array_merge(
										$post_taxonomies_terms,
										get_the_terms( $post->ID, $tax_slug )
									);

								}

							}

							if ( !empty( $post_taxonomies_terms ) ) {

								foreach ( $post_taxonomies_terms as $term ) {

									switch ( $results_section_level ) {
										case '0': // main(0) level

											if ( $term->parent === 0 ) {
												$sections_data[$i]['terms'][$term->term_id] = $term;
											}

											break;

										case '1': // 1st level

											// it's a child term
											if ( $term->parent !== 0 ) {

												$ancestors = get_ancestors( $term->term_id, $results_section_taxonomies );

												// it's a first level term (it has only one parent)
												if ( count( $ancestors ) === 1 ) {
													$sections_data[$i]['terms'][$term->term_id] = $term;
												}

											}

											break;

										case '2': // 2nd level

											// it's a child term
											if ( $term->parent !== 0 ) {

												$ancestors = get_ancestors( $term->term_id, $results_section_taxonomies );

												// it's a second level term (has 2 parent terms)
												if ( count( $ancestors ) === 2 ) {
													$sections_data[$i]['terms'][$term->term_id] = $term;
												}

											}

											break;
									}

								}

							}

						}

					}

				}

			}

		}

		if ( count( $td_query->posts ) == 0 ) {
			// no results
			$buffy = '<div class="result-msg no-result">' . __td('No results', TD_THEME_NAME ) . '</div>';
		} else {
			// show the results
			/**
			 * @note:
			 * we use esc_url( home_url( '/' ) ) instead of the WordPress @see get_search_link function because that's what the internal
			 * WordPress widget it's using and it was creating duplicate links like: yoursite.com/search/search_query and yoursite.com?s=search_query
			 *
			 * also note that esc_url - as of today strips spaces (WTF) https://core.trac.wordpress.org/ticket/23605 so we used urlencode - to encode the query param with + instead of %20 as rawurlencode does
			 */
			if ( $td_module === 'td_woo_product_module' ) {
				// home_url/?s=search_query&post_type=product
				$search_url = home_url( '/?s=' . urlencode( $td_string ) . '&post_type=product' );
			} elseif ( !empty( $atts_post_type ) ) {
				$search_url = home_url( '/?s=' . urlencode( $td_string ) . '&post_type=' . esc_attr( $atts_post_type ) );
			} else {
				$search_url = home_url( '/?s=' . urlencode( $td_string ) );
			}

			$buffy_msg .= '<div class="result-msg"><a href="' . $search_url . '">' . __td('View all results', TD_THEME_NAME ) . '</a></div>';

			// add wrap
			if ( $td_module === 'td_woo_product_module' ) {
				$buffy = '<div class="tdw-aj-search-results"><div class="tdw-aj-search-inner">' . $buffy . '</div></div>' . $buffy_msg;
			} elseif( !empty( $_POST['module'] ) ) {

				$atts_post_type = $block_atts['post_type'] != '' ? $block_atts['post_type'] : 'post';
				if ( !empty( $atts_post_type ) ) {

					$post_type_object = get_post_type_object( $atts_post_type );
					if ( $post_type_object ) {
						$results_section_1_title_html = '<div class="tdb-aj-srs-title">' . esc_attr( $post_type_object->labels->name ) . '</div>';
						$buffy = '<div class="tdb-aj-search-results">' . $results_section_1_title_html . '<div class="tdb-aj-search-inner">' . $buffy . '</div></div>';

						// process sections data
						if ( !empty( $sections_data ) ) {

							foreach ( $sections_data as $section_id => $section_data ) {

								// output
								$section_html = "";

								// section title
								$section_title = '<div class="tdb-aj-srs-title">' . esc_attr( $section_data['title'] ) . '</div>';

								// process section terms
								$section_terms = $section_data['terms'];
								usort($section_terms, function( $a, $b ) { return strcmp( $a->name, $b->name ); } ); // sort by name

                                if( !empty( $section_terms ) ) {
                                    $section_html .= '<div class="tdb-aj-sr-taxonomies">';
                                        foreach ( $section_terms as $term ) {
                                            $section_html .= '<a class="tdb-aj-sr-taxonomy" href="' . esc_url( get_term_link( $term ) ) . '" target="_blank">' . $term->name . '</a>';
                                        }
                                    $section_html .= '</div>';
                                }

								// output
								if ( !empty( $section_html ) ) {
									$buffy .= '<div class="tdb-aj-search-results">';
                                        $buffy .= $section_title;
                                        $buffy .= $section_html;
                                    $buffy .= '</div>';
								}

							}

						}

						// add results msg
						$buffy .= $buffy_msg;

					}

				} else {
					$buffy = '<div class="tdb-aj-search-results"><div class="tdb-aj-search-inner">' . $buffy . '</div></div>' . $buffy_msg;
				}

            } else {
                $buffy = '<div class="td-aj-search-results">' . $buffy . '</div>' . $buffy_msg;
            }
		}

		// prepare array for ajax
		$buffyArray = array(
			'td_data' => $buffy,
			'td_total_results' => 2,
			'td_total_in_list' => count($td_query->posts),
			'td_search_query'=> esc_attr($td_string),
			//'td_search_query'=> strip_tags ($td_string)
		);

		die( json_encode( $buffyArray ) );
	}

	static function on_ajax_login() {
        /**
         * The ajax login is allowed when:
         * 1. the mobile theme is active and its login option is also active
         * 2. the main theme is active (the mobile theme is not active) and its login option is also active
         */

        // The 'mobile' post param is set only by the login requests from the mobile theme
        // The login requests from theme version (or responsive version) do not set it
//		if (empty($_POST['mobile'])) {
//			if (td_util::get_option('tds_login_sign_in_widget') != 'show') {
//				//exit();
//			}
//		} else {
//			if (td_util::get_option('tds_login_mobile') == 'hide') {
//				exit();
//			}
//		}

        //json login fail
        $json_login_fail = json_encode(array('login', 0, __td('User or password incorrect!', TD_THEME_NAME)));
        $json_captcha_fail = json_encode(array('login', 0, __td('CAPTCHA verification failed!', TD_THEME_NAME)));
        $json_captcha_score_fail = json_encode(array('login', 0, __td('CAPTCHA user score failed. Please contact us!', TD_THEME_NAME)));

        //get the email address from ajax() call
        $login_email = '';
        if (!empty($_POST['email'])) {
            $login_email = $_POST['email'];
        }

        //get password from ajax() call
        $login_password = '';
        if (!empty($_POST['pass'])) {
            $login_password = $_POST['pass'];
        }

        //get recaptcha
        $login_captcha = '';
        if (!empty($_POST['captcha'])) {
            $login_captcha = $_POST['captcha'];
        }
        //recaptcha option from panel
        $show_captcha = td_util::get_option('tds_captcha');

        // recaptcha is active
        if ($show_captcha == 'show' && $login_captcha != '') {

            //get google secret key from panel
            $captcha_secret_key = td_util::get_option('tds_captcha_secret_key');
            //alter captcha result=>score
            $captcha_score = td_util::get_option('tds_captcha_score');
            if ($captcha_score == ''){
                $captcha_score = 0.5;
            }

            // for cloudflare
            if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            }
            //google recaptcha verify
            $post_data = http_build_query(
                array(
                    'secret' => $captcha_secret_key,
                    'response' => $login_captcha,
                    'remoteip' => $_SERVER['REMOTE_ADDR']
                )
            );
            $opts = array('http' =>
                array(
                    'method' => 'POST',
                    'header' => 'Content-type: application/x-www-form-urlencoded',
                    'content' => $post_data
                )
            );
            $context = stream_context_create($opts);
            $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
            $result = json_decode($response);
//        var_dump($result);

            //die with error
            if ($result->success === false) {
                die($json_captcha_fail);
            }

            //check captcha score result - default is 0.5
            if ($result->success === true && $result->score <= $captcha_score) {
                die($json_captcha_score_fail);
            }

            //try to login if we get recaptcha result
            if ( $result->success ) {
                if (!empty($login_email) && !empty($login_password) ) {

                    $obj_wp_login = td_login::login_user($login_email, $login_password);

                    if (is_wp_error($obj_wp_login)) {
                        die($json_login_fail);
                    } else {
                        die(json_encode(array('login', 1, 'OK')));
                    }
                }
            } else {
                die($json_captcha_fail);
            }

        } else { // recaptcha is disabled

                if (!empty($login_email) and !empty($login_password)) {
                    $obj_wp_login = td_login::login_user($login_email, $login_password);

                    if (is_wp_error($obj_wp_login)) {
                        die($json_login_fail);
                    } else {
                        die(json_encode(array('login', 1, 'OK')));
                    }

                } else {
                    die($json_login_fail);
                }
            }


    }

	static function on_ajax_register() {

		//if registration is open from wp-admin/Settings,  then try to create a new user
		if (get_option('users_can_register') == 1){

			// json predefined return text
			$json_fail = json_encode(array('register', 0, __td('Email or username incorrect!', TD_THEME_NAME)));
			$json_user_pass_exists = json_encode(array('register', 0, __td('User or email already exists!', TD_THEME_NAME)));
            $json_captcha_fail = json_encode(array('register', 0, __td('CAPTCHA verification failed!', TD_THEME_NAME)));
            $json_captcha_score_fail = json_encode(array('register', 0, __td('CAPTCHA user score failed. Please contact us!', TD_THEME_NAME)));

			// get the email address from ajax() call
			$register_email = '';
			if (!empty($_POST['email'])) {
				$register_email = $_POST['email'];
			}

			// get user from ajax() call
			$register_user = '';
			if (!empty($_POST['user'])) {
				$register_user = $_POST['user'];
			}

            //get recaptcha
            $register_captcha = '';
            if (!empty($_POST['captcha'])) {
                $register_captcha = $_POST['captcha'];
            }

            //recaptcha option from panel
            $show_captcha = td_util::get_option('tds_captcha');

            // recaptcha is active
            if ($show_captcha == 'show' && $register_captcha != '') {

                //get google secret key from panel
                $captcha_secret_key = td_util::get_option('tds_captcha_secret_key');
                //alter captcha result=>score
                $captcha_score = td_util::get_option('tds_captcha_score');
                if ($captcha_score == ''){
                    $captcha_score = 0.5;
                }

                // for cloudflare
                if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                    $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                }
                //google recaptcha verify
                $post_data = http_build_query(
                    array(
                        'secret' => $captcha_secret_key,
                        'response' => $register_captcha,
                        'remoteip' => $_SERVER['REMOTE_ADDR']
                    )
                );
                $opts = array('http' =>
                    array(
                        'method' => 'POST',
                        'header' => 'Content-type: application/x-www-form-urlencoded',
                        'content' => $post_data
                    )
                );
                $context = stream_context_create($opts);
                $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
                $result = json_decode($response);
//        var_dump($result);

                //die with error
                if ($result->success === false) {
                    die($json_captcha_fail);
                }

                //check captcha score result - default is 0.5
                if ($result->success === true && $result->score <= $captcha_score) {
                    die($json_captcha_score_fail);
                }

                //try to login if we get captcha success result
                if ( $result->success ) {
                    // try to login
                    if (!empty($register_email) and !empty($register_user)) {

                        //check user existence before adding it
                        $user_id = username_exists($register_user);

                        if (!$user_id and email_exists($register_email) == false ) {

                            //generate random pass
                            $random_password = wp_generate_password($length=12, $include_standard_special_chars=false);

                            //create user
                            $user_id = wp_create_user($register_user, $random_password, $register_email);

                            if (intval($user_id) > 0) {
                                //send email to $register_email
                                wp_new_user_notification($user_id, null, 'both');
                                die(json_encode(array('register', 1,__td('Please check your email (inbox or spam folder), the password was sent there.', TD_THEME_NAME))));

                            } else {
                                die($json_user_pass_exists);
                            }
                        } else {
                            die($json_user_pass_exists);
                        }
                    } else {
                        die($json_fail);
                    }
                } else {
                    die($json_captcha_fail);
                }

            } else {
                // try to login
                if (!empty($register_email) and !empty($register_user)) {

                    //check user existence before adding it
                    $user_id = username_exists($register_user);

                    if (!$user_id and email_exists($register_email) == false ) {

                        //generate random pass
                        $random_password = wp_generate_password($length=12, $include_standard_special_chars=false);

                        //create user
                        $user_id = wp_create_user($register_user, $random_password, $register_email);

                        if (intval($user_id) > 0) {
                            //send email to $register_email
                            wp_new_user_notification($user_id, null, 'both');
                            die(json_encode(array('register', 1,__td('Please check your email (inbox or spam folder), the password was sent there.', TD_THEME_NAME))));

                        } else {
                            die($json_user_pass_exists);
                        }
                    } else {
                        die($json_user_pass_exists);
                    }
                } else {
                    die($json_fail);
                }
            }

		}//end if admin permits registration
	}

	static function on_ajax_subscription_register() {

		//if registration is open from wp-admin/Settings,  then try to create a new user
		if (get_option('users_can_register') == 1){

            $json_captcha_fail = json_encode(array('register', 0, __td('CAPTCHA verification failed!', TD_THEME_NAME)));
            $json_captcha_score_fail = json_encode(array('register', 0, __td('CAPTCHA user score failed. Please contact us!', TD_THEME_NAME)));

			// get the email address from ajax() call
			$register_email = '';
			if (!empty($_POST['email'])) {
				$register_email = $_POST['email'];
			}
			if (empty($register_email)) {
				die(json_encode(array('register', 0, __td('Email empty!', TD_THEME_NAME))));
			}

			// get user from ajax() call
			$register_user = '';
			if (!empty($_POST['user'])) {
				$register_user = $_POST['user'];
			}
			if (empty($register_user)) {
				die(json_encode(array('register', 0, __td('Username empty!', TD_THEME_NAME))));
			}

			$register_pass = '';
			if (!empty($_POST['pass'])) {
				$register_pass = $_POST['pass'];
			}
			if (empty($register_pass)) {
				die(json_encode(array('register', 0, __td('Pass empty!', TD_THEME_NAME))));
			}

			preg_match('/^(?=.{6,})(?=.*[a-z])(?=.*[A-Z])/', $register_pass, $output_array);
			if (!count($output_array)) {
				die(json_encode(array('register', 0, __td('Pass pattern incorrect!', TD_THEME_NAME))));
			}

			$register_retype_pass = '';
			if (!empty($_POST['retype_pass'])) {
				$register_retype_pass = $_POST['retype_pass'];
			}
			if (empty($register_retype_pass)) {
				die(json_encode(array('register', 0, __td('Retyped pass empty!', TD_THEME_NAME))));
			}

			if ( $register_pass !== $register_retype_pass) {
				die(json_encode(array('register', 0, __td('Retyped pass exactly!', TD_THEME_NAME))));
			}


			//check user existence before adding it
			$user_id = username_exists($register_user);
			if ( $user_id ) {
				die(json_encode(array('register', 0, __td('User already exists!', TD_THEME_NAME))));
			}

			if (email_exists($register_email)) {
				die(json_encode(array('register', 0, __td('Email already exists!', TD_THEME_NAME))));
			}
            //get recaptcha
            $register_captcha = '';
            if (!empty($_POST['captcha'])) {
                $register_captcha = $_POST['captcha'];
            }

            //recaptcha option from panel
            $show_captcha = td_util::get_option('tds_captcha');

            // recaptcha is active
            if ($show_captcha == 'show' && $register_captcha != '') {

                //get google secret key from panel
                $captcha_secret_key = td_util::get_option('tds_captcha_secret_key');
                //alter captcha result=>score
                $captcha_score = td_util::get_option('tds_captcha_score');
                if ($captcha_score == ''){
                    $captcha_score = 0.5;
                }

                // for cloudflare
                if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                    $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                }
                //google recaptcha verify
                $post_data = http_build_query(
                    array(
                        'secret' => $captcha_secret_key,
                        'response' => $register_captcha,
                        'remoteip' => $_SERVER['REMOTE_ADDR']
                    )
                );
                $opts = array('http' =>
                    array(
                        'method' => 'POST',
                        'header' => 'Content-type: application/x-www-form-urlencoded',
                        'content' => $post_data
                    )
                );
                $context = stream_context_create($opts);
                $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
                $result = json_decode($response);

                //die with error
                if ($result->success === false) {
                    die($json_captcha_fail);
                }

                //check captcha score result - default is 0.5
                if ($result->success === true && $result->score <= $captcha_score) {
                    die($json_captcha_score_fail);
                }

                //try to login if we get captcha success result
                if ( $result->success ) {

                    $user_id = wp_create_user($register_user, $register_pass, $register_email);
                    if (is_wp_error($user_id)) {
                        die(json_encode(array('register', 0,__td('Your account could not be created.', TD_THEME_NAME))));
                    }

                    add_user_meta($user_id, 'tds_validate', [
                        'key' => td_global::td_generate_unique_id(),
                        'creation_time' => strtotime('now'),
                        'validation_time' => ''
                    ]);

                    //send email to $register_email
                    td_util::td_new_subscriber_user_notifications($user_id, 'both');

                    wp_signon( array(
                        'user_login'    => $register_user,
                        'user_password' => $register_pass,
                        'remember'      => true
                    ), false );

                    die(json_encode(array('register', 1,__td('Please check your email (inbox or spam folder) to validate your account.', TD_THEME_NAME))));
                } else {
                    die($json_captcha_fail);
                }

            } else {
                $user_id = wp_create_user($register_user, $register_pass, $register_email);
                if (is_wp_error($user_id)) {
                    die(json_encode(array('register', 0,__td('Your account could not be created.', TD_THEME_NAME))));
                }

                add_user_meta($user_id, 'tds_validate', [
                    'key' => td_global::td_generate_unique_id(),
                    'creation_time' => strtotime('now'),
                    'validation_time' => ''
                ]);

                //send email to $register_email
                td_util::td_new_subscriber_user_notifications($user_id, 'both');

                wp_signon( array(
                    'user_login'    => $register_user,
                    'user_password' => $register_pass,
                    'remember'      => true
                ), false );

                die(json_encode(array('register', 1,__td('Please check your email (inbox or spam folder) to validate your account.', TD_THEME_NAME))));
            }

		}//end if admin permits registration
	}

	static function on_ajax_resend_subscription_activation_link() {
		// get user from ajax() call
		$register_user = '';
		if (!empty($_POST['user'])) {
			$register_user = $_POST['user'];
		}
		if (empty($register_user)) {
			die(json_encode(array('resend_activation_link', 0, __td('User empty!', TD_THEME_NAME))));
		}

		//check user existence before adding it
		$user = get_user_by( 'id', $register_user );
		if ( ! $user ) {
			die(json_encode(array('resend_activation_link', 0, __td('User does not exists!', TD_THEME_NAME))));
		}

		//send email to $register_email
		td_util::td_new_subscriber_user_notifications($register_user, 'user');

		die(json_encode(array('resend_activation_link', 1,__td('New activation link was generated. Please check your email (inbox or spam folder) to validate your account.', TD_THEME_NAME))));
	}

    static function on_ajax_remember_pass() {

        //json predefined return text
        $json_fail = json_encode(array('remember_pass', 0, __td('Email address not found!', TD_THEME_NAME)));

        //get the email address from ajax() call
        $remember_email = '';
        if (!empty($_POST['email'])) {
            $remember_email = $_POST['email'];
        }

        if (td_login::recover_password($remember_email)) {
            die(json_encode(array('remember_pass', 1, __td('Your password is reset, check your email.', TD_THEME_NAME))));
        } else {
            die($json_fail);
        }
    }

	static function on_ajax_new_sidebar() {

		// die if request is fake
		check_ajax_referer('td-sidebar-ops', 'td_magic_token');


		if (!current_user_can('edit_theme_options')) {
			die;
		}

		$list_current_sidebars = '';

		//nr of chars displayd as name option
		$sub_str_val = 35;

		//add new sidebar
		$if_add_new_sidebar = 1;

		//get the new sidebar name from ajax() call
		$new_sidebar_name = '';
		if (!empty($_POST['sidebar'])) {
			$new_sidebar_name = trim($_POST['sidebar']);
		}




		$theme_sidebars = td_options::get_array('sidebars');

		//default sidebar
		$list_current_sidebars .= '<div class="td-option-sidebar-wrapper"><a class="td-option-sidebar" data-area-dsp-id="xxx_replace_xxx" title="Default Sidebar">Default Sidebar</a></div>';

		if(!empty($theme_sidebars)) {
			//check to see if there is already a sidebar with that name
			foreach($theme_sidebars as $key_sidebar_option => $sidebar_option){
				if($new_sidebar_name == $sidebar_option) {
					$if_add_new_sidebar = 0;
				}

				//create a list with sidebars to be returned, the text `xxx_replace_xxx` will be replace with the id of the controler
				$list_current_sidebars .= '<div class="td-option-sidebar-wrapper"><a class="td-option-sidebar" data-area-dsp-id="xxx_replace_xxx" title="' . $sidebar_option . '">' .  substr(str_replace(array('"', "'"), '`', $sidebar_option), 0, $sub_str_val) . '</a><a class="td-delete-sidebar-option" data-sidebar-key="' . $key_sidebar_option . '"></a></div>';
			}
		}

		//check for empty strings
		if(empty($new_sidebar_name)) {
			$if_add_new_sidebar = 0;
			die(json_encode(array('td_bool_value' => '0', 'td_msg' => 'Please insert a name for your new sidebar!')));

		}

		//add the new sidebar
		if($if_add_new_sidebar == 1){
			//generating id of the sidebar in the theme_option (td_008) string in wp_option table
			$sidebar_unique_id = uniqid() . '_' . rand(1, 999999);
			$theme_sidebars[$sidebar_unique_id] = $new_sidebar_name;



			td_options::update_array('sidebars', $theme_sidebars);


			//add the new sidebar to the existing list
			$list_current_sidebars .= '<div class="td-option-sidebar-wrapper"><a class="td-option-sidebar" data-area-dsp-id="xxx_replace_xxx" data-sidebar-key="' . $sidebar_unique_id . '" title="' . $new_sidebar_name . '">' . substr(str_replace(array('"', "'"), '`', $new_sidebar_name), 0, $sub_str_val) . '</a><a class="td-delete-sidebar-option" data-sidebar-key="' . $sidebar_unique_id . '"></a></div>';

			die(json_encode(array('td_bool_value' => '1', 'td_msg' => 'Succes', 'value_insert' => $list_current_sidebars, 'value_selected' => substr(str_replace(array('"', "'"), '`', $new_sidebar_name), 0, $sub_str_val))));

		} else {
			die(json_encode(array('td_bool_value' => '0', 'td_msg' => 'This name is already used as a sidebar name. Please use another name!')));
		}
	}

	static function on_ajax_delete_sidebar (){

		// die if request is fake
		check_ajax_referer('td-sidebar-ops', 'td_magic_token');


		if (!current_user_can('edit_theme_options')) {
			die;
		}

		//nr of chars displayd as name option
		$sub_str_val = 35;

		$list_current_sidebars = $value_deleted_sidebar = '';

		//get the sidebar key from ajax() call
		$sidebar_key_in_array = '';
		if (!empty($_POST['sidebar'])) {
			$sidebar_key_in_array = trim($_POST['sidebar']);
		}

		$theme_sidebars = td_options::get_array('sidebars');

		//option for default sidebar
		$list_current_sidebars .= '<div class="td-option-sidebar-wrapper"><a class="td-option-sidebar" data-area-dsp-id="xxx_replace_xxx" title="Default Sidebar">Default Sidebar</a></div>';

		if(!empty($theme_sidebars) && is_array($theme_sidebars)) {
			foreach($theme_sidebars as $key_sidebar_option => $sidebar_option){
				if($key_sidebar_option == $sidebar_key_in_array) {

					//take the value to send it back, to be mached againt all pull down controllers, to remove this option if selected
					$value_deleted_sidebar = trim($sidebar_option);

					//removes the sidebar from the array of sidebars
					unset($theme_sidebars[$key_sidebar_option]);
				} else {
					//create a list with sidebars to be returned, the text `xxx_replace_xxx` will be replace with the id of the controler
					$list_current_sidebars .= '<div class="td-option-sidebar-wrapper"><a class="td-option-sidebar" data-area-dsp-id="xxx_replace_xxx" title="' . $sidebar_option . '">' . substr(str_replace(array('"', "'"), '`', $sidebar_option), 0, $sub_str_val) . '</a><a class="td-delete-sidebar-option" data-sidebar-key="' . $key_sidebar_option . '"></a></div>';
				}
			}


			td_options::update_array('sidebars', $theme_sidebars);

			die(json_encode(array('td_bool_value' => '1', 'td_msg' => 'Succes', 'value_insert' => $list_current_sidebars, 'value_to_march_del' => $value_deleted_sidebar)));
		}

	}

	static function on_ajax_update_views () {
		if (td_util::get_option('tds_ajax_post_view_count') != 'enabled') {
			exit();
		}

		//get the post ids // iy you don't send data encoded with json the remove json_decode(stripslashes(
		if (!empty($_POST['td_post_ids'])) {
			$td_post_id = json_decode(stripslashes($_POST['td_post_ids']));

			//error check
			if (empty($td_post_id[0])) {
				$td_post_id[0] = 0;
			}

			//get the current post count
			$current_post_count = td_page_views::get_page_views($td_post_id[0]);
			//echo($current_post_count);

			$new_post_count = $current_post_count + 1;

			//update the count
			update_post_meta($td_post_id[0], td_page_views::$post_view_counter_key, $new_post_count);

			die(json_encode(array($td_post_id[0]=>$new_post_count)));
		}
	}

	static function on_ajax_get_views() {
		if (td_util::get_option('tds_ajax_post_view_count') != 'enabled') {
			exit();
		}

		//get the post ids // iy you don't send data encoded with json the remove json_decode(stripslashes(
		if (!empty($_POST['td_post_ids'])) {
			$td_post_ids = json_decode(stripslashes($_POST['td_post_ids']));

			//will hold the return array
			$buffy = array();

			//this check for arrays with values // and count($td_post_ids) > 0
			if(!empty($td_post_ids) and is_array($td_post_ids)) {

				//this check for arrays with values
				foreach($td_post_ids as $post_id) {
					$buffy[$post_id] = td_page_views::get_page_views($post_id);
				}

				//return the view counts
				die(json_encode($buffy));
			}
		}
	}

    /**
     * retrieve translation from our server
     */
    static function on_ajax_get_translation() {
        if (!empty($_POST['language_code'])) {
            //api url
	        $api_url = 'http://api.tagdiv.com/user_translations/get_translation?callback=jsonpCallback&language_code=' . $_POST['language_code'];

	        //api call
            $json_api_response = td_remote_http::get_page($api_url, __CLASS__);

            //check response
            if ($json_api_response === false) {
                td_log::log(__FILE__, __FUNCTION__, 'Failed to get translation', $api_url);
            } else {
                //remove jsonpCallback wrap
                $json_api_response = str_replace('jsonpCallback(', '', $json_api_response);
                $json_api_response = substr($json_api_response, 0, -1);
                //var_dump($json_api_response);
                die($json_api_response);
            }
        }
    }

    /**
     * AJAX call
     * check if envato code is valid
     * check if it's registered on forum.tagDiv.com
     * return - json encoded array
     *
     * 'envato_check_failed' - bool
     * 'envato_check_error_msg' - string
     * 'envato_code' - string
     * 'envato_code_status' - string
     * 'forum_check_failed' - bool
     * 'used_on_forum' - bool
     * 'theme_activated' - bool
     */
    static function on_ajax_check_envato_code() {

        if ( empty( $_POST['envato_code'] ) || empty( $_POST['create_support_account'] ) ) {
            return;
        }

        // create support account
        $create_support_account = $_POST['create_support_account'] === 'yes';

        //forum check url
        $forum_check_url = 'https://forum.tagdiv.com/wp-json/tagdiv/check_user/';

        //td_cake url
        $td_cake_url = 'https://td_cake.themesafe.com/td_cake/auto.php';

        // envato code
        $envato_code = preg_replace('/\s+/', '', $_POST['envato_code'] );

        //return buffer
        $buffy = array(
            'envato_check_failed'     => false,
            'envato_check_error_code' => '',
            'envato_code'             => $envato_code,
            'envato_code_status'      => 'invalid',
            'envato_code_err_msg'     => '',
            'forum_check_failed'      => false,
            'used_on_forum'           => false,
            'theme_activated'         => false
        );

        //td_cake - check envato code
        $td_cake_response = wp_remote_post($td_cake_url, array (
            'method' => 'POST',
            'body' => array(
                'k' => $envato_code,
                'n' => TD_THEME_NAME,
                'v' => TD_THEME_VERSION
            ),
            'timeout' => 12
        ));

        if ( is_wp_error( $td_cake_response ) ) {
            //error http
            $buffy['envato_check_failed'] = true;

        } else {

            if ( isset( $td_cake_response['response']['code'] ) and $td_cake_response['response']['code'] != '200' ) {
                //response code != 200
                $buffy['envato_check_failed'] = true;
                $buffy['envato_check_status'] = $td_cake_response['response']['code'];

            } elseif ( !empty( $td_cake_response['body'] ) ) {
                //we have a response
                $api_response = @unserialize( $td_cake_response['body'] );

                if ( !empty( $api_response['envato_is_valid'] ) and !empty( $api_response['envato_is_valid_msg'] ) ) {

                    if ( $api_response['envato_is_valid'] == 'valid' or $api_response['envato_is_valid'] == 'td_fake_valid' ) {

                        //code is valid
                        $buffy['envato_code_status'] = 'valid';

                        // create support account check
                        if ( $create_support_account ) {
	                        //check forum
	                        $td_forum_response = wp_remote_post( $forum_check_url, array (
		                        'method' => 'POST',
		                        'body' => array(
			                        'envato_key' => $envato_code,
		                        ),
		                        'timeout' => 12
	                        ) );

	                        if ( is_wp_error( $td_forum_response ) ||                                                                     // wp error
	                             ( isset( $td_forum_response['response']['code'] ) and $td_forum_response['response']['code'] != '200' ) ) // response code != 200
	                        {
		                        //connection failed
		                        $buffy['forum_check_failed'] = true;

	                        } else {
		                        if ( isset( $td_forum_response['query_failed'] ) && $td_forum_response['query_failed'] === true ) {
			                        //query failed
			                        $buffy['forum_check_failed'] = true;

		                        } else {
			                        if ( empty( $td_forum_response['body'] ) ) {
				                        //reply body is empty
				                        $buffy['forum_check_failed'] = true;

			                        } else {
				                        $forum_api_response = @json_decode( $td_forum_response['body'], true );
				                        if ( isset( $forum_api_response['user_exists'] ) && $forum_api_response['user_exists'] === true ) {
					                        //envato code already used
					                        td_util::ajax_handle( $envato_code );
					                        $buffy['used_on_forum'] = true;
					                        $buffy['theme_activated'] = true;

				                        } else {
					                        //envato code not used
					                        //load registration panel
				                        }
			                        }
		                        }
	                        }
                        }

                    } else {
                        //code is invalid (do nothing because default is invalid)
                        $buffy['envato_code_err_msg'] = $api_response['envato_is_valid_msg'];
                    }

                } else {
                    //error accessing our activation service
                    $buffy['envato_check_failed'] = true;
                }

            } else {
                //empty body error
                $buffy['envato_check_failed'] = true;
            }

        }

        if ( $buffy['forum_check_failed'] === true || ( !$create_support_account && $buffy['envato_code_status'] === 'valid' ) ) {

            // forum check has failed or has been skipped
            td_util::ajax_handle($envato_code);
            $buffy['theme_activated'] = true;

        }


        die(json_encode($buffy));
    }

    static function on_ajax_check_theme_status() {
    	$reply = array();
    	$status = false;

	    // die if user doesn't have permission or if request is fake
	    if (!current_user_can('edit_theme_options') || !check_ajax_referer( 'theme_plugins_setup_nonce', 'wpnonce' ) ) {
		    $reply['permission'] = 'user dose not have permission to access this info';
		    die(json_encode($reply));
	    }

	    if ( td_util::get_option_('td_cake_status') == 2 ) {
		    $status = true;
	    }

	    $reply['status'] = $status;

	    die(json_encode($reply));
    }

    /**
     * AJAX call
     * register new user on forum.tagdiv.com
     */
    static function on_ajax_register_forum_user() {

        $register_url = 'http://192.168.0.80/tagdiv/wp-json/tagdiv/register/';
        if (TD_DEPLOY_MODE != 'dev') {
            $register_url = 'http://forum.tagdiv.com/wp-json/tagdiv/register/';
        }

        //required data
        if (empty($_POST['envato_code']) ||
            empty($_POST['username']) ||
            empty($_POST['email']) ||
            empty($_POST['password']) ||
            empty($_POST['password_confirmation']))
        {
            return;
        }

        //user data
        $envato_code = preg_replace('/\s+/', '', $_POST['envato_code']);
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        $password_confirmation = $_POST['password_confirmation'];

        //return buffer
        $buffy = array(
            'forum_connection_failed' => false,
            'forum_response_code'     => '',
            'envato_code'             => $envato_code,
            'forum_response_data'     => array()
        );

        //td_cake - check envato code
        $td_forum_response = wp_remote_post($register_url, array (
            'method' => 'POST',
            'body' => array(
                'username'              => $username,
                'email'                 => $email,
                'password'              => $password,
                'password_confirmation' => $password_confirmation,
                'envato_code'           => $envato_code,
                'theme_name'            => TD_THEME_NAME,
                'theme_version'         => TD_THEME_VERSION
            ),
            'timeout' => 12
        ));

        if (is_wp_error($td_forum_response)) {
            //http error
            td_log::log(__FILE__, __FUNCTION__, 'Failed to contact the forum for user registration', $td_forum_response);
            $buffy['forum_connection_failed'] = true;
            die(json_encode($buffy));
        }

        if (isset($td_forum_response['response']['code']) and $td_forum_response['response']['code'] != '200') {
            //response code != 200
            td_log::log(__FILE__, __FUNCTION__, 'Received a response code != 200 while trying to contact the forum for user registration', $td_forum_response);
            $buffy['forum_connection_failed'] = true;
            $buffy['forum_response_code'] = $td_forum_response['response']['code'];
            die(json_encode($buffy));
        }

        if (empty($td_forum_response['body'])) {
            //response body is empty
            td_log::log(__FILE__, __FUNCTION__, 'Received an empty response body while contacting the forum for user registration', $td_forum_response);
            $buffy['forum_connection_failed'] = true;
            die(json_encode($buffy));
        }

        $api_response = @json_decode($td_forum_response['body'], true);

        if (!isset($api_response['envato_api_key_invalid']) ||
            !isset($api_response['envato_api_failed']) ||
            !isset($api_response['envato_key_used']) ||
            !isset($api_response['envato_key_db_fail']) ||
            !isset($api_response['user_created']) ||
            !isset($api_response['username_exists']) ||
            !isset($api_response['email_exists']) ||
            !isset($api_response['email_syntax_incorrect']) ||
            !isset($api_response['password_is_short']) ||
            !isset($api_response['passwords_dont_match']))
        {
            //response incomplete
            $buffy['forum_connection_failed'] = true;
            td_log::log(__FILE__, __FUNCTION__, 'Received an incomplete response while contacting the forum for user registration', $td_forum_response);
            die(json_encode($buffy));
        }

        //add response data to output buffer
        $buffy['forum_response_data'] = $api_response;

        if ($api_response['envato_api_failed'] === true) {
            //envato api call failed
            td_log::log(__FILE__, __FUNCTION__, 'Envato call failed while contacting the forum for user registration', $api_response);
            $buffy['forum_connection_failed'] = true;
            die(json_encode($buffy));
        }

        if ($api_response['envato_key_db_fail'] === true) {
            //forum failed to check the envato code in it's database
            td_log::log(__FILE__, __FUNCTION__, 'Received database error from forum user registration endpoint', $api_response);
            $buffy['forum_connection_failed'] = true;
            die(json_encode($buffy));
        }

        if ($api_response['user_created'] === true ||  //user created
            $api_response['envato_key_used'] === true) //envato code already registered
        {
            td_util::ajax_handle($envato_code);
        }

        die(json_encode($buffy));
    }

    /**
     * @param $id
     * @param $ec
     * @param $ad
     * @return bool
     */
    private static function td_validate_data($id, $ec, $ad) {
        if (md5($id . $ec) == $ad) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * AJAX call
     * manual activation
     * @return json encoded array
     */
	static function on_ajax_manual_activation() {
	    //required data
	    if (empty($_POST['td_server_id']) ||
	        empty($_POST['envato_code']) ||
	        empty($_POST['td_key']))
	    {
	        return;
	    }

	    $id = trim($_POST['td_server_id']);
	    $ec = preg_replace('/\s+/', '', $_POST['envato_code']);
	    $ad = trim($_POST['td_key']);

	    //return buffer
	    $buffy = array(
	        'envato_code' => $ec,
	        'theme_activated' => false
	    );

	    if (self::self_check($id, $ec, $ad) === true) {
	        td_util::ajax_handle($ec);
	        $buffy['theme_activated'] = true;
	        td_util::update_option( 'theme_update_to_version_complete', '1' );
	    }

	    die(json_encode($buffy));
	}

    /**
     * AJAX call
     * @return json encoded array
     */
    static function on_ajax_db_check() {
        //return buffer
        $buffy = array(
            'db_is_set' => false,
            'db_time' => 0
        );

        $current_date = date('U');

        if (TD_DEPLOY_MODE == 'dev') {
            $delay = 40;
        } else {
            $delay = 604800;
        }

        $dbks = array_keys(td_util::$e_keys);
        $dbk = td_handle::get_var($dbks[1]);

        if (td_util::get_option($dbk) == 2) {
            $buffy['db_is_set'] = true;
        };

        $dbk_tp = td_util::get_option($dbk . 'tp');

        if (!empty($dbk_tp)) {
            if ($delay + $dbk_tp > $current_date) {
                $buffy['db_time'] = ($delay + $dbk_tp) - $current_date;
            }
        } else {
            td_util::update_option($dbk . 'tp', $current_date);
        }

        if (TD_DEPLOY_MODE == 'dev') {
            $buffy['db_is_set'] = true;
        }

        die(json_encode($buffy));
    }

    /**
     * AJAX call
     * switch td logging on/off ( the log is turned off by default )
     * @return json encoded array
     */
    static function on_ajax_system_status_toggle_td_log() {

        $reply = array();

        // die if request is fake
        check_ajax_referer('td-log-switch', 'td_magic_token');

        // die if user doesn't have permission
        if (!current_user_can('edit_theme_options')) {
            $reply['permission'] = 'user dose not have permission to modify this option';
            die(json_encode($reply));
        }

        $td_log_status = $_POST['td_log_status'];

        if ( ! in_array( $td_log_status, array( 'on', 'off' ) ) ) {
            $reply['post_data'] = 'invalid post data, post data value: ' . $td_log_status;
            die(json_encode($reply));
        }

        $reply[] = 'td log turned ' . $td_log_status;

        td_util::update_option('td_log_status', $td_log_status );

        die(json_encode($reply));
    }

    static function on_ajax_get_template_style() {
		if ( ! current_user_can( 'edit_pages' ) ) {
			//@todo - ceva eroare sa afisam aici
			echo 'no permission';
			die;
		}

		$parameters = array();

		$tdb_template_id = $_POST['tdb_template_id'];

		if ( ! isset( $tdb_template_id ) ) {

			$parameters['errors'][] = 'Invalid data';

		} else {
		    // load the cloud template
			$wp_query_template = new WP_Query( array(
					'p'         => $tdb_template_id,
					'post_type' => 'tdb_templates',
				)
			);

			// if we have a template look for the 'tdb_single_comments' shortcode
			if ( ! empty( $wp_query_template ) && $wp_query_template->have_posts() ) {

				$style = $content_width = '';
				td_get_template_style( $wp_query_template->post, $style, $content_width );

				$parameters['style'] = $style;
				$parameters['content_width'] = $content_width;
			}
		}

		die( json_encode( $parameters ) );
	}

	static function on_ajax_render_content( ) {

		if ( ! current_user_can( 'edit_pages' ) ) {
			//@todo - ceva eroare sa afisam aici
			echo 'no permission';
			die;
		}

		$parameters = array();

		$content = $_POST['content'];

		if ( ! isset( $content ) ) {
			$parameters['errors'][] = 'Invalid data';
		} else {
		    $parameters['content'] = wp_strip_all_tags( do_shortcode( stripslashes ($content ) ) );
		}

		die( json_encode( $parameters ) );
	}

	static function on_ajax_change_theme_version() {

    	$version = $_POST['version'];
	    $url = $_POST['url'];

	    $reply = array();

	    if ( ! isset( $version ) || ! isset( $url ) ) {
		    $reply[ 'errors' ][] = 'Invalid data';

	    } else {

	    	set_transient( 'td_update_theme_to_version_' . TD_THEME_NAME, 1, 10 );

	    	$version = str_replace( [ TD_THEME_NAME, '-', ' '], '', $version);

	    	td_options::save_panel_history( $version );

		    tagdiv_util::update_option( 'theme_update_to_version', json_encode( array( $version => $url ) ) );

		    add_filter( 'pre_set_site_transient_update_themes', function( $transient ) {

		    	$theme_slug = get_option('stylesheet');
                $to_version = tagdiv_util::get_option( 'theme_update_to_version' );

                if ( ! empty( $to_version )) {
                    $args = array();
                    $to_version = json_decode( $to_version, true );
                    $to_version_keys = array_keys( $to_version );
                    if ( is_array( $to_version_keys ) && count( $to_version_keys ) ) {
                        $to_version_serial = $to_version_keys[ 0 ];
                        $to_version_url = $to_version[$to_version_serial];

                        $transient->response[ $theme_slug ] = array(
                            'theme'       => $theme_slug,
                            'new_version' => $to_version_serial,
                            'url' => "https://tagdiv.com/" . TD_THEME_NAME,
                            'clear_destination' => true,
                            'package'     => add_query_arg( $args, $to_version_url ),
                        );
                    }
                }

                return $transient;
            });
		    delete_site_transient( 'update_themes' );
	    }

	    die( json_encode( $reply ) );
    }

    static function on_ajax_check_theme_version() {

    	$reply = array();

	    $response = tagdiv_check_theme_version();
	    tagdiv_check_plugin_subscription_version();

	    if ( false !== $response ) {
	    	$reply['versions'] = $response;
	    }

	    die( json_encode( $reply ) );
    }

    static function on_ajax_backup_panel() {

    	$status = $_POST['status'];

	    $reply = array();

	    if ( ! isset( $status ) ) {
		    $reply[ 'errors' ][] = 'Invalid data';

	    } else {

	    	if (empty($status) || '0' === $status ) {
	    	    tagdiv_util::update_option( TD_THEME_OPTIONS_NAME . '_settings_disabled', 0 );
		    } else {
	    		tagdiv_util::update_option( TD_THEME_OPTIONS_NAME . '_settings_disabled', 1 );
	    		$delete = $_POST['delete'];
	    		if (!empty($delete) || '!' === $delete ) {
	    			delete_option( TD_THEME_OPTIONS_NAME . '_settings' );
			    }
		    }
	    }

	    die( json_encode( $reply ) );
    }

    static function on_ajax_video_modal() {

        $buffy_array = array();

        $video_url = $_POST['td_video_url'];
        $video_autoplay = $_POST['td_video_autoplay'];

        if( $video_url != '' ) {
            $buffy_array['video_service'] = td_video_support::detect_video_service($video_url);
            $buffy_array['video_embed'] = td_video_support::render_video($video_url, 'yes', $video_autoplay, '', true);
        }

        die( json_encode( $buffy_array ) );

    }

    static function on_ajax_flickr_modal() {

        $response = array();

        $api_key = td_flickr::get_flickr_api_key();

        if( $api_key != '' ) {
            $album_id = $_POST['td_flickr_album_id'];

            if( $album_id != '' ){
                $api_resp = td_flickr::api_get_album_photos($album_id);

                if ( $api_resp != FALSE ) {

                    $response = $api_resp;

                }
            }
        }


        die(json_encode($response));

    }

    static function on_ajax_dark_mode() {
        if( !isset( $_COOKIE['td_dark_mode'] ) ) {
            setcookie('td_dark_mode', 'on', time() + (86400 * 7), '/' );
        } else {
            setcookie('td_dark_mode', '', time() - 3600, '/' );
        }
    }

    static function on_ajax_video_cache_videos() {

        $buffy_array = array();

        $video_service = $_POST['td_video_service'];
        $video_source = $_POST['td_video_source'];
        $video_source_name = $_POST['td_video_source_name'];

        $td_videos_pool = get_option('td_playlist_videos_pool');

        $videos_ids_data_from_db = array();
        $videos_ids = array();

        switch ($video_source) {
            case 'video_ids':
                $videos_ids_data_from_db = get_option('td_playlist_video_video_ids');
                $videos_ids = $videos_ids_data_from_db[$video_service]['items'];

                break;

            case 'channel_id':
            case 'username':
            case 'playlist_id':
                if( $video_source == 'channel_id' ) {
                    $videos_ids_data_from_db = get_option('td_playlist_video_channel_id');
                } else if( $video_source == 'username' ) {
                    $videos_ids_data_from_db = get_option('td_playlist_video_username');
                } else if( $video_source == 'playlist_id' ) {
                    $videos_ids_data_from_db = get_option('td_playlist_video_playlist_id');
                }

                foreach ($videos_ids_data_from_db[$video_service][$video_source_name]['items'] as $video_data) {
                    $videos_ids[] = $video_data['id'];
                }

                break;
        }

        if( !empty( $videos_ids ) ) {
            foreach ( $videos_ids as $video_id ) {
                if ( isset($td_videos_pool[$video_service][$video_id]) ) {
                    $buffy_array[] = $td_videos_pool[$video_service][$video_id];
                }
            }
        }

        die( json_encode( $buffy_array ) );

    }

    static function on_ajax_comment_submit_captcha() {

        $data = array(
			'error' => '',
			'success' => ''
        );

        if ( !empty( $_POST['token'] ) ) {
            $captcha = $_POST['token'];
        }

        // recaptcha option from panel
        $show_captcha = td_util::get_option('tds_captcha' );
        // recaptcha is active
        if ( $show_captcha == 'show' && $captcha != '' ) {

            // get google secret key from panel
            $captcha_secret_key = td_util::get_option('tds_captcha_secret_key' );

            // alter captcha result=>score
            $captcha_score = td_util::get_option('tds_captcha_score' );
            if ( $captcha_score == '' ) {
                $captcha_score = 0.5;
            }

            // for cloudflare
            if ( isset( $_SERVER["HTTP_CF_CONNECTING_IP"] ) ) {
                $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            }
            $captcha_postdata = http_build_query( array(
	                'secret' => $captcha_secret_key,
	                'response' => $captcha,
	                'remoteip' => $_SERVER['REMOTE_ADDR']
	            )
            );
            $captcha_opts = array(
				'http' => array(
	                'method' => 'POST',
	                'header' => 'Content-type: application/x-www-form-urlencoded',
	                'content' => $captcha_postdata
				)
            );
            $captcha_context = stream_context_create( $captcha_opts );
            $captcha_response = json_decode( file_get_contents("https://www.google.com/recaptcha/api/siteverify", false, $captcha_context ), true );
			//var_dump( $captcha_response );

            // check also captcha score result - default is 0.5
            if ( $captcha_response['success'] && $captcha_response['score'] > $captcha_score ) {
                $data['success'] = $captcha_response['success'];

            } elseif ( $captcha_response['success'] && $captcha_response['score'] <= $captcha_score ) {
                $data['success'] = false;
                $data['error'] = 'score failed';
            }
            else {
                $data['success'] = false;
            }

            die( json_encode( $data ) );

        }

    }

}


