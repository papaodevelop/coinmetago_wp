<?php

/**
 * Class td_woo_state_shop_base_page
 * @property tdb_method title
 * @property tdb_method breadcrumbs
 * @property tdb_method loop
 * @property tdb_method sorting_options
 * @property tdb_method filters
 *
 *
 */

class td_woo_state_shop_base_page extends tdb_state_base {

	/**
	 * set the shop page wp_query
	 * @param WP_Query $wp_query
	 */
	function set_wp_query( $wp_query ) {
		parent::set_wp_query( $wp_query );
	}

	public function __construct() {

		// shop page title
		$this->title = function ($atts) {

			$dummy_data_array = array(
				'title' => 'Sample Woocommerce Shop Page Title',
				'class' => 'td-woo-shop-page-title'
			);

			if ( !$this->has_wp_query() ) {
				return $dummy_data_array;
			}

			$title_data_array = array(
				'class' => 'td-woo-shop-page-title'
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
					Shop Page
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

			// pagination defaults
			$pagination_data = array(
				// pagination options
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
				'paged' => 1,
				'max_page' => 3,
				'start_page' => 1,
				'end_page' => 3,
				'pages_to_show' => 3,
				'previous_posts_link' => $prev_icon_html,
				'next_posts_link' => $next_icon_html
			);

			return array(
				'loop_pagination' => $pagination_data
			);

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

		// filters
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
						if ( isset( $atts[$tax_name . '_type'] ) && ! empty( $atts[$tax_name . '_type'] ) ) {
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

			return $attribute_filter_data;

		};

		parent::lock_state_definition();
	}

}