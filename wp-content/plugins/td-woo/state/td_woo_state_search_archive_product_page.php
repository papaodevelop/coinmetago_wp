<?php

/**
 * Class td_woo_state_archive_product_page
 * @property tdb_method title
 * @property tdb_method breadcrumbs
 * @property tdb_method loop
 * @property tdb_method sorting_options
 * @property tdb_method filters
 *
 *
 */

class td_woo_state_search_archive_product_page extends tdb_state_base {

	/**
	 * set the search page wp_query
	 * @param WP_Query $wp_query
	 */
	function set_wp_query( $wp_query ) {
		parent::set_wp_query( $wp_query );
		//td_woo_util::pre_print_r($wp_query);
	}

	public function __construct() {

		// search archive page title
		$this->title = function ($atts) {

			$dummy_data_array = array(
				'title' => 'Sample Woocommerce Page Title',
				'class' => 'td-woo-search-archive-title'
			);

			if ( !$this->has_wp_query() ) {
				return $dummy_data_array;
			}

			$title_data_array = array(
				'class' => 'td-woo-search-archive-title'
			);

			global $wp_query;

			$template_wp_query = $wp_query;
			$wp_query = $this->get_wp_query();

			$title_data_array['title'] = woocommerce_page_title(false);

			$wp_query = $template_wp_query;

			return $title_data_array;
		};

		// breadcrumbs
		$this->breadcrumbs = function ($atts) {

			$dummy_data = '
				<div class="entry-crumbs breadcrumbs-sample-data" itemprop="breadcrumb">
					<a href="#" class="no-click">Home</a> <i class="td-icon-right td-bread-sep"></i> 
					<a href="#" class="no-click">Shop</a> <i class="td-icon-right td-bread-sep"></i> 
					Search results for "Sample Woocommerce Breadcrumbs"
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

			// search query
			$search_query = $this->has_wp_query() ? $this->get_wp_query()->query_vars['s'] : '';

			// init woo loop products atts global
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
			$atts['orderby'] = isset( $atts['sort'] ) ? $atts['sort'] : '';

			// products_ids
			$products_ids = isset( $atts['products_ids'] ) ? $atts['products_ids'] : '';
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

			// set offset
			$td_woo_loop_products_atts['offset'] = $offset;

			// the list of svg icons used by the theme by default
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

			// add the current search query to products loop atts
			if ( !empty($search_query) ) {
				$td_woo_loop_products_atts['s'] = $search_query;
			}

			// apply td woo filters
			$filters = $_GET;
			global $td_woo_attributes_filters;
			$td_woo_attributes_filters = array();
			if( !empty( $filters ) && is_array( $filters ) ) {
				foreach ( $filters as $tax => $tax_terms_filters_list ) {
					$taxonomy = str_replace( 'tdw_', '', $tax );
					switch ($taxonomy) {
						case 'product_cat':
							$atts['category'] = $tax_terms_filters_list;
							$atts['cat_operator'] = 'AND';
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

			add_filter( 'woocommerce_shortcode_products_query', function ( $query_args, $atts, $type ) {
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
			 * fix for applying the `woocommerce_shortcode_products_query` filter when running trough td_data_source::get_wp_query()
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

			// add current search query to loop data
			$td_woo_loop_products_data['search_query'] = $search_query;

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

					if ( isset( $atts[$tax_name . '_type'] ) && $atts[$tax_name . '_type'] === 'off' ) {
						// if set to off from shortcode settings
						continue;
					} else {

						$tax_data = array(
							'terms' => array()
						);

						// type
						if ( isset( $atts[$tax_name . '_type'] ) && !empty( $atts[$tax_name . '_type'] )  ) {
							// switch attribute type to the type set on shortcode ...
							$tax_data['attribute_type'] = $atts[$tax_name . '_type'];
						}

						// terms
						if ( in_array( wc_attribute_taxonomy_name( $tax_name ), wc_get_attribute_taxonomy_names() ) ) {
							$taxonomy_name = wc_attribute_taxonomy_name( $tax_name );
						} else {
							$taxonomy_name = $tax_name;
						}

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
							if ( $taxonomy_name === 'product_cat' ) {
								// product cat filter action type
								if ( !isset( $atts['product_cat_type_action'] ) || ( $atts['product_cat_type_action'] !== 'multiple_selection' && $atts['product_cat_type_action'] !== 'yes' ) ) {
									// overwrite type and switch it to link type
									$tax_data['as_link'] = true;
								}
							}

							$terms = get_terms( $taxonomy_name, array( 'hide_empty' => true ) );
							if ( !empty( $terms ) && is_array( $terms ) ) {
								// add terms to attribute data
								$tax_data['terms'] = $terms;
							}
						}

						// add taxonomy name
						$tax_data['taxonomy'] = $taxonomy_name;

						// selected term
						$tax_data['selected'] = ( array_key_exists( 'tdw_' . $taxonomy_name, $_GET ) ) ? $_GET['tdw_' . $taxonomy_name] : '';

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

			// add current search query to filters data
			$attribute_filter_data['search_query'] = ( $this->has_wp_query() ) ? $this->get_wp_query()->query_vars['s'] : 'sample search query';

			return $attribute_filter_data;

		};

		parent::lock_state_definition();
	}

}