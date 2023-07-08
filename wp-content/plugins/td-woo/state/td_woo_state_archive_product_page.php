<?php

/**
 * Class td_woo_state_archive_product_page
 * @property tdb_method title
 * @property tdb_method page_description
 * @property tdb_method breadcrumbs
 * @property tdb_method loop
 * @property tdb_method sorting_options
 * @property tdb_method subcategories
 * @property tdb_method filters
 *
 *
 */

class td_woo_state_archive_product_page extends tdb_state_base {

	private $woo_archive_queried_obj;

	/**
	 * set the archive page wp_query
	 * @param WP_Query $wp_query
	 */
	function set_wp_query( $wp_query ) {
		parent::set_wp_query( $wp_query );

		//td_woo_util::pre_print_r($wp_query);
		//td_woo_util::pre_print_r($wp_query->queried_object);

		// set archive queried term object
		if ( isset( $wp_query->queried_object ) ) {
			$this->woo_archive_queried_obj = $wp_query->queried_object;
		} elseif ( tdc_state::is_live_editor_iframe() || tdc_state::is_live_editor_ajax() ) {
			$this->woo_archive_queried_obj = get_term( $wp_query->query_vars['term_id'], $wp_query->query_vars['taxonomy'] );
		} else {
			// @todo here we need to get the queried object depending on which wp product template we're in.. product category/tag/attribute
			$this->woo_archive_queried_obj = get_term_by( 'slug', $wp_query->get('term'), $wp_query->get('taxonomy') );
		}
	}

	public function __construct() {

		// archive page title
		$this->title = function ($atts) {

			$dummy_data_array = array(
				'title' => 'Sample Product Archive Page Title',
				'class' => 'td-woo-archive-title'
			);

			if ( !$this->has_wp_query() ) {
				return $dummy_data_array;
			}

			$title_data_array = array(
				'class' => 'td-woo-archive-title'
			);

			global $wp_query;

			$template_wp_query = $wp_query;
			$wp_query = $this->get_wp_query();

			$title_data_array['title'] = woocommerce_page_title(false);

			$wp_query = $template_wp_query;

			return $title_data_array;
		};

		// archive page description
		$this->page_description = function ($atts) {

			$sample_data = '<p>Sample Product Archive Page Description</p>';

			if ( !$this->has_wp_query() ) {
				return $sample_data;
			}

			$page_description = '';

			if ( $this->woo_archive_queried_obj && !empty( $this->woo_archive_queried_obj->description ) ) {
				$page_description = wc_format_content( wp_kses_post( $this->woo_archive_queried_obj->description ) );
			}

			if ( empty( $page_description ) && ( tdc_state::is_live_editor_iframe() || tdc_state::is_live_editor_ajax() ) ) {
				return $sample_data;
			}

			return $page_description;
		};

		// breadcrumbs
		$this->breadcrumbs = function ($atts) {

			$dummy_data = '
				<div class="entry-crumbs breadcrumbs-sample-data" itemprop="breadcrumb">
					<a href="#" class="no-click">Home</a> <i class="td-icon-right td-bread-sep"></i> 
					<a href="#" class="no-click">Product Category</a> <i class="td-icon-right td-bread-sep"></i> 
					Product Subcategory
				</div>
			';

			if ( ! $this->has_wp_query() ) {
				return $dummy_data;
			}

			global $wp_query;

			$template_wp_query = $wp_query;
			$wp_query = $this->get_wp_query();

			ob_start();
			woocommerce_breadcrumb();
			$breadcrumbs = ob_get_clean();

			$wp_query = $template_wp_query;

			return $breadcrumbs;

		};

		// loop
		$this->loop = function ($atts) {

			global $td_woo_loop_products_atts;
			$td_woo_loop_products_atts = array();

			// limit
			if ( isset( $atts['limit'] ) ) {
				$limit = $atts['limit'];
			}

			// offset
			$offset = 0;
			if ( isset( $atts['offset'] ) ) {
				$offset = $atts['offset'];
			}

			// process sorting
			$atts['orderby'] = $atts['sort'] ?? '';

			// products_ids
			$products_ids = $atts['products_ids'] ?? '';

			if ( !empty( $products_ids ) ) {
				$products_ids_array = explode(',', $products_ids ); // split products ids string

				$products_in = array();
				$products_not_in = array();

				// split ids into post_in and post_not_in
				foreach ( $products_ids_array as $product_id ) {
					$product_id = trim($product_id);

					// check if the ID is actually a number
					if ( is_numeric( $product_id ) ) {
						if ( intval( $product_id ) < 0 ) {
							$products_not_in[] = str_replace('-', '', $product_id);
						} else {
							$products_in[] = $product_id;
						}
					}
				}

				if ( !empty( $products_in ) ) {
					$td_woo_loop_products_atts['post__in'] = $products_in;
				}

				if ( !empty( $products_not_in ) ) {
					$td_woo_loop_products_atts['post__not_in'] = $products_not_in;
				}

			}

			// cache
			$atts['cache'] = false; // should shortcode output be cached

			// pagination
			$atts['paginate'] = true; // should results be paginated
			$paged = absint( empty( $_GET['product-page'] ) ? 1 : $_GET['product-page'] );

			if ( $paged > 1 && isset( $limit ) ) {
				$offset = intval($offset) + ( ( $paged - 1 ) * (int)$limit );
			}

			$td_woo_loop_products_atts['offset'] = $offset;

            $svg_list = td_global::$svg_theme_font_list;

            // previous text icon
            $prev_icon_html = '<i class="page-nav-icon td-icon-menu-left"></i>';
            if( isset( $atts['prev_tdicon'] ) ) {
                $prev_icon = $atts['prev_tdicon'];
                $prev_icon_data = '';
                if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
                    $prev_icon_data = 'data-td-svg-icon="' . $prev_icon . '"';
                }

                if( array_key_exists( $prev_icon, $svg_list ) ) {
                    $prev_icon_html = '<div class="page-nav-icon page-nav-icon-svg" ' . $prev_icon_data . '>' . base64_decode( $svg_list[$prev_icon] ) . '</div>';
                } else {
                    $prev_icon_html = '<i class="page-nav-icon ' . $prev_icon . '"></i>';
                }
            }
            // next text icon
            $next_icon_html = '<i class="page-nav-icon td-icon-menu-right"></i>';
            if( isset( $atts['next_tdicon'] ) ) {
                $next_icon = $atts['next_tdicon'];
                $next_icon_data = '';
                if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
                    $next_icon_data = 'data-td-svg-icon="' . $next_icon . '"';
                }

                if( array_key_exists( $next_icon, $svg_list ) ) {
                    $next_icon_html = '<div class="page-nav-icon page-nav-icon-svg" ' . $next_icon_data . '>' . base64_decode( $svg_list[$next_icon] ) . '</div>';
                } else {
                    $next_icon_html = '<i class="page-nav-icon ' . $next_icon . '"></i>';
                }
            }

            // pagination options
            $pagenavi_options = array(
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
            );

            // pagination defaults
            $pagination_defaults = array(
                'pagenavi_options' => $pagenavi_options,
                'paged' => 1,
                'max_page' => 3,
                'start_page' => 1,
                'end_page' => 3,
                'pages_to_show' => 3,
                'previous_posts_link' => $prev_icon_html,
                'next_posts_link' => $next_icon_html
            );

			// apply td woo filters
			$filters = $_GET;

			// add the current cat/tag to `product_cat`/`product_tag` filter
			if ( $this->has_wp_query() ) {
				switch ( $this->woo_archive_queried_obj->taxonomy ) {
					case 'product_cat':
						if ( empty( $filters['tdw_product_cat'] ) ) {
							// the product cat filter is not set, we just set the current category in this case
							// set the category attribute ( we need to query products from the current state archive )
							$filters['tdw_product_cat'] = $this->woo_archive_queried_obj->slug;
						} //else {
						// the product cat filter is set, so we add the current cat term to the list
						//$filters['tdw_product_cat'] .= ',' . $this->woo_archive_queried_obj->slug;
						//}
						break;
					case 'product_tag':
						if ( empty( $filters['tdw_product_tag'] ) ) {
							// the product tag filter is not set, we just set the current tag in this case
							// set the tag attribute ( we need to query products from the current state archive )
							$filters['tdw_product_tag'] = $this->woo_archive_queried_obj->slug;
						}
						break;
					case ( taxonomy_is_product_attribute( $this->woo_archive_queried_obj->taxonomy ) ):
						if ( empty( $filters['tdw_' . $this->woo_archive_queried_obj->taxonomy] ) ) {
							// the product att filter is not set, we just set the current attribute in this case
							// set the attribute ( we need to query products from the current state archive )
							$filters['tdw_' . $this->woo_archive_queried_obj->taxonomy] = $this->woo_archive_queried_obj->slug;
						} else {
							// add current prod attribute term to filters
							$filters['tdw_' . $this->woo_archive_queried_obj->taxonomy] .= ',' . $this->woo_archive_queried_obj->slug;
						}
						break;
				}
			}

			//echo '<pre class="td-container" style="white-space: pre-wrap;">FILTERS: <br>';
			//var_dump( $this->woo_archive_queried_obj->taxonomy );
			//echo PHP_EOL;
			//var_dump( $this->woo_archive_queried_obj->slug );
			//echo PHP_EOL;
			//var_dump( taxonomy_is_product_attribute( $this->woo_archive_queried_obj->taxonomy ) );
			//echo PHP_EOL;
			//print_r( $filters );
			//echo '</pre>';

			global $td_woo_attributes_filters;
			$td_woo_attributes_filters = array();
			if( !empty( $filters ) && is_array( $filters ) ) {
				foreach ( $filters as $tax => $tax_terms_filters_list ) {
					$taxonomy = str_replace( 'tdw_', '', $tax );
					switch ($taxonomy) {
						case 'product_cat':
							$atts['category'] = $tax_terms_filters_list;
							//$atts['cat_operator'] = 'AND';
							break;
						case 'product_tag':
							$atts['tag'] = $tax_terms_filters_list;
							$atts['tag_operator'] = 'AND';
							break;
						case ( strpos( $taxonomy, 'pa_' ) !== false ):
							$terms = array_map( 'sanitize_title', explode( ',', $tax_terms_filters_list ) );
							$td_woo_attributes_filters[$taxonomy] = $terms;
							break;
					}
				}
			}

			add_filter( 'woocommerce_shortcode_products_query', function ( $query_args, $attributes, $type ) {
				global $td_woo_loop_products_atts, $td_woo_attributes_filters, $td_woo_attributes_filters_multiple_selection;

				foreach ( $td_woo_attributes_filters as $taxonomy => $terms ) {

					$operator = isset( $td_woo_attributes_filters_multiple_selection[$taxonomy] ) && $td_woo_attributes_filters_multiple_selection[$taxonomy] ? 'IN' : 'AND';

					$query_args['tax_query'][] = array(
						'taxonomy' => $taxonomy,
						'terms'    => $terms,
						'field'    => 'slug',
						'operator' => $operator,
					);
				}

				return array_merge( $query_args, $td_woo_loop_products_atts );
			}, 10, 3 );

			global $td_woo_loop_products_data;

			add_filter( 'woocommerce_shortcode_products_query_results', function ($results, $wc_shortcode_products_instance) {
				global $td_woo_loop_products_data;
				$td_woo_loop_products_data = json_decode( json_encode($results), true );
				return $results;
			}, 10, 2 );

			/*
			 * call the WC_Shortcode_Products get_content method to trigger the woocommerce_shortcode_products_query_results hook and set the $td_woo_loop_products_data global
			 */
			$shortcode = new WC_Shortcode_Products($atts);
			$shortcode->get_content();

			/*
			 * reset the woo loop products atts & woo attributes filters globals
			 *
			 * fix for applying the `woocommerce_shortcode_products_query` filter when running through td_data_source::get_wp_query()
			 *
			 * @see td_block->render
			 * @see td_data_source::get_wp_query
			 *
			 * $shortcode = new WC_Shortcode_Products($atts);
		     * $shortcode->get_content();
			 *
			 * */
			$td_woo_loop_products_atts = $td_woo_attributes_filters = array();

			$current_page = intval( $td_woo_loop_products_data['current_page'] );
			$max_page = intval( $td_woo_loop_products_data['total_pages'] );

			$td_woo_loop_products_data['loop_pagination'] = $pagination_defaults;
			$td_woo_loop_products_data['loop_pagination']['paged'] = $current_page;
			$td_woo_loop_products_data['loop_pagination']['max_page'] = $max_page;

			// add current queried obj to loop data
			$td_woo_loop_products_data['current_queried_obj'] = $this->woo_archive_queried_obj;

			// add filters to loop data
			$td_woo_loop_products_data['filters'] = $filters;

			return $td_woo_loop_products_data;

		};

		// sorting options
		$this->sorting_options = function ($atts) {

			$dummy_data = '<form class="woocommerce-ordering" method="get">
								<select name="orderby" class="orderby" aria-label="Shop order">
									<option value="menu_order" selected="selected">Default sorting</option>
									<option value="popularity">Sort by popularity</option>
									<option value="rating">Sort by average rating</option>
									<option value="date">Sort by latest</option>
									<option value="price">Sort by price: low to high</option>
									<option value="price-desc">Sort by price: high to low</option>
								</select>
								<input type="hidden" name="paged" value="1">
							</form>';

			if ( !$this->has_wp_query() ) {
				return $dummy_data;
			}

			global $wp_query;

			$template_wp_query = $wp_query;
			$wp_query = $this->get_wp_query();

			ob_start();
			woocommerce_catalog_ordering();
			$sorting_options = ob_get_clean();

			$wp_query = $template_wp_query;

			return $sorting_options;

		};

		// subcategories
		$this->subcategories = function ($atts) {

			$wc_placeholder_img_src = esc_url( wc_placeholder_img_src( 'full' ) );

			$sample_data = array(
			    array(
			        'category_link' => '#',
                    'category_name' => 'Sample subcategory 1',
                    'category_img' => $wc_placeholder_img_src,
                    'category_descr' => 'Lorem ipsum dolor sit amet.'
                ),
                array(
                    'category_link' => '#',
                    'category_name' => 'Sample subcategory 2',
                    'category_img' => $wc_placeholder_img_src,
                    'category_descr' => 'Lorem ipsum dolor sit amet.'
                ),
                array(
                    'category_link' => '#',
                    'category_name' => 'Sample subcategory 3',
                    'category_img' => $wc_placeholder_img_src,
                    'category_descr' => 'Lorem ipsum dolor sit amet.'
                ),
                array(
                    'category_link' => '#',
                    'category_name' => 'Sample subcategory 4',
                    'category_img' => $wc_placeholder_img_src,
                    'category_descr' => 'Lorem ipsum dolor sit amet.'
                )
            );

			if ( !$this->has_wp_query() ) {
				return $sample_data;
			}

			$subcategories = woocommerce_get_product_subcategories( $this->woo_archive_queried_obj->term_id );
            $subcategories_output = array();

			if ( !empty( $subcategories ) ) {
				foreach ( $subcategories as $subcategory ) {
				    $category_img = wp_get_attachment_url( get_term_meta( $subcategory->term_id, 'thumbnail_id', true ) );

				    $subcategories_output[] = array(
                        'category_link' => get_term_link($subcategory->term_id, 'product_cat'),
                        'category_name' => $subcategory->name,
                        'category_img' => $category_img ? $category_img : $wc_placeholder_img_src,
                        'category_descr' => $subcategory->category_description
                    );
				}
			} else {
                if ( tdc_state::is_live_editor_iframe() || tdc_state::is_live_editor_ajax() ) {
                    return $sample_data;
                }
            }

			return $subcategories_output;

		};

		// filter block
		$this->filters = function ($atts) {

			// attributes taxonomies .. these are retrieved straight from the database
			$attributes_taxonomies = wc_get_attribute_taxonomies();

			// ..default product taxonomies
			$default_taxonomies = array(
				(object) array(
					'name' => 'product_cat',
					'label' => __td('Product categories', TD_THEME_NAME)
				),
				(object) array(
					'name' => 'product_tag',
					'label' => __td('Product tags', TD_THEME_NAME)
				)
			);

			$taxonomies = array_merge( $attributes_taxonomies, $default_taxonomies );

			$attribute_filter_data = array(
				'taxonomies' => array(),
				'selected' => array()
			);

			// this global stores the state of multiple selection for prod attributes
			global $td_woo_attributes_filters_multiple_selection;

			if ( !empty( $taxonomies ) && is_array( $taxonomies ) ) {
				foreach ( $taxonomies as $taxonomy ) {
					$tax_name = $taxonomy->attribute_name ?? ( $taxonomy->name ?? '' );

					// if set to off from shortcode settings
					if ( isset( $atts[$tax_name . '_type'] ) && $atts[$tax_name . '_type'] === 'off' ) {

						// we need to set the cat/tag filters as selected even if they are not displayed because the loop query still shows products from current cat/tag even if the filter is not used ...
						if ( isset( $this->woo_archive_queried_obj ) && $this->woo_archive_queried_obj->taxonomy === $tax_name ) {
							$attribute_filter_data['selected'][$tax_name] = $this->woo_archive_queried_obj->slug;
						}

					} else {

						$tax_data = array(
							'terms' => array()
						);

						// type
						if ( isset( $atts[$tax_name . '_type'] ) && !empty( $atts[$tax_name . '_type'] )  ) {
							// switch attribute type to the type set on shortcode
							$tax_data['attribute_type'] = $atts[$tax_name . '_type'];
						}

						// terms
						if ( in_array( wc_attribute_taxonomy_name( $tax_name ), wc_get_attribute_taxonomy_names() ) ) {
							$taxonomy_name = wc_attribute_taxonomy_name( $tax_name );
						} else {
							$taxonomy_name = $tax_name;
						}

						$terms = array(); // reset terms array
						if ( taxonomy_exists( $taxonomy_name ) ) {

							// product attributes
							if ( in_array( wc_attribute_taxonomy_name( $tax_name ), wc_get_attribute_taxonomy_names() ) ) {

								if ( !isset( $td_woo_attributes_filters_multiple_selection[wc_attribute_taxonomy_name($tax_name)] ) ) {

									// tax multiple selection atts option id
									$multiple_selection_op_id = strtolower( $tax_name ) . '_multiple_selection';

									// product attribute multiple selection option status
									$pa_multiple_selection = isset( $atts[$multiple_selection_op_id] ) && $atts[$multiple_selection_op_id] === 'yes';

									// set product attribute multiple selection
									$td_woo_attributes_filters_multiple_selection[wc_attribute_taxonomy_name($tax_name)] = $pa_multiple_selection;

								}

							}

							// product categories
							if ( $taxonomy_name === 'product_cat' && isset( $this->woo_archive_queried_obj ) && $this->woo_archive_queried_obj->taxonomy === 'product_cat' ) {

								$term_children = get_term_children( $this->woo_archive_queried_obj->term_id, $taxonomy_name );
								//td_woo_util::pre_print_r($term_children);

								// has children ... get children
								if ( !empty( $term_children ) ) {

									// get child terms
									$terms = get_terms( $this->woo_archive_queried_obj->taxonomy, array(
										'parent' => $this->woo_archive_queried_obj->term_id,
										'hide_empty' => true
									) );

								// is children ... get siblings
								} elseif ( $this->woo_archive_queried_obj->parent > 0 ) {

									// get sibling terms
									$terms = get_terms( $this->woo_archive_queried_obj->taxonomy, array(
										'child_of' => $this->woo_archive_queried_obj->parent,
										'hide_empty' => true
									) );

									// force single selection
									$atts['product_cat_type_action'] = 'single_selection';

								// no children or parent ... get same level siblings ( first level categories )
								} else {

									// get same level siblings ( first level categories )
									$terms = get_terms( $this->woo_archive_queried_obj->taxonomy, array(
										'parent' => 0,
										// exclude current, we'll add it below as first
										'exclude' => $this->woo_archive_queried_obj->term_id,
										'hide_empty' => true
									) );

									// add current as first
									array_unshift( $terms, $this->woo_archive_queried_obj );

									// force single selection..
									$atts['product_cat_type_action'] = 'single_selection';

								}

								// product cat filter action type
								if ( !isset( $atts['product_cat_type_action'] ) || ( $atts['product_cat_type_action'] !== 'multiple_selection' && $atts['product_cat_type_action'] !== 'yes' ) ) {
									// overwrite type and switch it to link type
									$tax_data['as_link'] = true;
								} else {
									if ( $tax_data['attribute_type'] === 'select' ) {
										// overwrite type and switch it to multiple select type
										$tax_data['attribute_type'] = 'multi-select';
									}
								}

							} else {
								$terms = get_terms( $taxonomy_name, array( 'hide_empty' => false ) );
							}

							if ( !empty( $terms ) && is_array( $terms ) ) {
								// add terms to attribute data
								$tax_data['terms'] = $terms;
							}
						}

						// add taxonomy name
						$tax_data['taxonomy'] = $taxonomy_name;

						// selected term
						$tax_data['selected'] = ( array_key_exists( 'tdw_' . $taxonomy_name, $_GET ) ) ? $_GET['tdw_' . $taxonomy_name] : '';

						// set current cat as selected
						if ( isset( $this->woo_archive_queried_obj ) && $this->woo_archive_queried_obj->taxonomy === $taxonomy_name ) {
							if ( empty( $tax_data['selected'] ) ) {
								$tax_data['selected'] .=  $this->woo_archive_queried_obj->slug;
							} else {
								$tax_data['selected'] .=  ',' . $this->woo_archive_queried_obj->slug;
							}
						}

						// add selection to selected filters array
						if ( !empty( $tax_data['selected'] ) ) {
							$attribute_filter_data['selected'][$taxonomy_name] = $tax_data['selected'];
						}

						$taxonomy = (object) array_merge( (array)$taxonomy, $tax_data );
						$attribute_filter_data['taxonomies'][] = $taxonomy;
					}
				}
			}

			// add sample data for td_woo_filters_list shortcode
			if ( !$this->has_wp_query() || ( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) ) {
				$attribute_filter_data['sample_data'] = array( 'sample-filter', 'sample-filter-1', 'sample-filter-2' );
			}

			// add current queried obj to filters data
			$attribute_filter_data['current_queried_obj'] = isset( $this->woo_archive_queried_obj ) ? $this->woo_archive_queried_obj : false;

			return $attribute_filter_data;

		};

		parent::lock_state_definition();
	}

}