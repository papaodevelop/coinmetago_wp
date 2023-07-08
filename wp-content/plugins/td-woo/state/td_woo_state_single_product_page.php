<?php

/**
 * Class td_woo_state_single_product_page
 * @property tdb_method breadcrumbs
 * @property tdb_method product_id
 * @property tdb_method product_title
 * @property tdb_method product_image
 * @property tdb_method product_image_bg
 * @property tdb_method product_price
 * @property tdb_method product_attributes
 * @property tdb_method product_description
 * @property tdb_method product_short_description
 * @property tdb_method product_categories
 * @property tdb_method product_add_to_cart
 * @property tdb_method product_add_to_cart_custom
 * @property tdb_method product_sku
 * @property tdb_method product_tags
 * @property tdb_method product_tabs
 * @property tdb_method product_reviews
 * @property tdb_method product_rating
 * @property tdb_method product_breadcrumbs
 * @property tdb_method product_notices
 * @property tdb_method loop
 * @property tdb_method sorting_options
 * @property tdb_method block
 * @property tdb_method filters
 * @property tdb_method product_socials
 * @property tdb_method product_brand_img
 *
 *
 */

class td_woo_state_single_product_page extends tdb_state_base {

	private $product;

	/**
	 * set the product page wp_query
	 * @param WP_Query $wp_query
	 */
	function set_wp_query( $wp_query ) {
		parent::set_wp_query( $wp_query );

		if ( function_exists('wc_get_product') ) {

			if ( isset( $wp_query->queried_object ) ) {
				$this->product = wc_get_product( $wp_query->queried_object->ID );
			} else {
				$this->product = wc_get_product( $wp_query->query_vars['p'] );
			}

		}

	}

	public function __construct() {

		// product id
		$this->product_id = function($atts) {

			$dummy_data_array = ['p_id' => 0];

			if ( !$this->has_wp_query() ) {
				return $dummy_data_array;
			}

			$product_data_array = ['p_id' => $this->product->get_id()];

			return $product_data_array;
		};

		// product page title
		$this->product_title = function ($atts) {

			$dummy_data_array = array(
				'title' => 'Sample Product Page Title',
				'class' => 'td-woo-product-title'
			);

			if ( !$this->has_wp_query() ) {
				return $dummy_data_array;
			}

			$product_title_array = array(
				'title' => $this->product->get_title(),
				'class' => 'td-woo-product-title'
			);

			return $product_title_array;
		};

		// product image
		$this->product_image = function ($atts) {

			$product_sample_data_type = !empty( $atts['sample_data_type'] ) ? $atts['sample_data_type'] : 'simple';

			$sample_html = '';
			if ( $product_sample_data_type === 'simple' ) {
				$sample_html .= '<div class="woocommerce-product-gallery__image--placeholder">';
				$sample_html .= '<img src="' . esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ) . '" alt="sample product image" class="wp-post-image" />';
				$sample_html .= '</div>';
			} else {

				$wc_placeholder_img_src = esc_url( wc_placeholder_img_src( 'full' ) );

				$sample_html = '
				<a href="#" class="woocommerce-product-gallery__trigger">🔍</a>
				<div class="flex-viewport" style="overflow: hidden; position: relative;">
					<figure class="woocommerce-product-gallery__wrapper" style="width: 100%; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
						<div class="woocommerce-product-gallery__image" style="margin-right: 0; float: left; display: block; position: relative; overflow: hidden;">
							<a href="#" class="no-click">
								<img src="' . $wc_placeholder_img_src . '" class="" alt="placeholder" title="placeholder" draggable="false">
							</a>
						</div>
					</figure>
				</div>
				<ol class="flex-control-nav flex-control-thumbs">
					<li><img src="' . $wc_placeholder_img_src . '" alt="sample gallery product image 1" class=""></li>
					<li><img src="' . $wc_placeholder_img_src . '" alt="sample gallery product image 2" class=""></li>
					<li><img src="' . $wc_placeholder_img_src . '" alt="sample gallery product image 3" class=""></li>
					<li><img src="' . $wc_placeholder_img_src . '" alt="sample gallery product image 4" class=""></li>
				</ol>';
			}

			$dummy_data_array = array(
				'product' => null,
				'sample_data' => true,
				'on_sale' => false,
				'sample_html' => $sample_html,
				'with_images' => true,
			);

			if ( ! $this->has_wp_query() ) {
				return $dummy_data_array;
			}

			$product_image_data_array = array(
				'product' => $this->product,
				'sample_data' => false,
				'on_sale' => $this->product->is_on_sale()
			);

			$product_gallery_images_ids = $this->product->get_gallery_image_ids();
			$product_image_id = $this->product->get_image_id();

			$product_gallery_images_html = '';
			$product_gallery_images_array = array();

			// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
			if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
				$product_image_data_array['with_images'] = false;
				$product_image_data_array['gallery_images_html'] = $product_gallery_images_html;
				$product_image_data_array['product_gallery_images_array'] = $product_gallery_images_array;
				return $product_image_data_array;
			}

			$product_image_data_array['with_images'] = true;
			if ( $product_image_id ) {
				$product_gallery_images_html = wc_get_gallery_image_html( $product_image_id, true );
			}

			if( !empty( $product_gallery_images_ids ) ) {
				foreach ( $product_gallery_images_ids as $id ) {
					$product_gallery_images_array[] = wp_get_attachment_image($id);
					$product_gallery_images_html .= apply_filters( 'woocommerce_single_product_image_thumbnail_html', wc_get_gallery_image_html( $id ), $id );
				}
			}

			if ( empty( $product_gallery_images_html ) ) {
				$product_image_data_array['with_images'] = false;
				// if no img .. get and  display the wc placeholder image
				$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
				$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
				$html .= '</div>';
				$product_gallery_images_html = apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $product_image_id );
			}

			$product_image_data_array['gallery_images_html'] = $product_gallery_images_html;
			$product_image_data_array['product_gallery_images_array'] = $product_gallery_images_array;

			return $product_image_data_array;
		};

		// product image bg
        $this->product_image_bg = function ($tdw_image_size = 'full') {
            $dummy_data_array = array(
                'featured_image_src' =>  esc_url( wc_placeholder_img_src( 'full' ) )
            );

            if ( !$this->has_wp_query() ) {
                return $dummy_data_array;
            }

            $data_array = array(
                'featured_image_src' => ''
            );

            $product_image_id = $this->product->get_image_id();
            if ( $product_image_id ) {
                $data_array['featured_image_src'] = wp_get_attachment_image_src( $product_image_id, $tdw_image_size )[0];
            } else {
                if ( tdc_state::is_live_editor_iframe() || tdc_state::is_live_editor_ajax() ) {
                    return $dummy_data_array;

                }
            }

            return $data_array;
        };

		// product price
		$this->product_price = function ($atts) {

			$dummy_data_array = array(
				'product_type' => '' // when we don't have a product query we don't have a product type @todo check to see if it's needed..
			);

			// here we set a simple product on sale price as sample.. @todo we could add options for what type of sample data to display here..
			$dummy_data_array['price'] = '
				<del><span>20.00$</span></del>
				<ins><span>18.00$</span></ins>
			';

			if ( ! $this->has_wp_query() ) {
				return $dummy_data_array;
			}

			$product_prices_array = array(
				'product_type' => $this->product->get_type()
			);

			$product_prices_array['price'] = $this->product->get_price_html();
			return $product_prices_array;
		};

		// product attributes
		$this->product_attributes = function ($atts) {

			$dummy_data_array = array(
				'attributes_html' => '
				<table class="woocommerce-product-attributes shop_attributes">
					<tbody>
						<tr class="woocommerce-product-attributes-item">
							<th class="woocommerce-product-attributes-item__label">Color</th>
							<td class="woocommerce-product-attributes-item__value">
								<p>Blue, Green, Red</p>
							</td>
						</tr>
						<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_logo">
							<th class="woocommerce-product-attributes-item__label">Logo</th>
							<td class="woocommerce-product-attributes-item__value">
								<p>Yes, No</p>
							</td>
						</tr>
					</tbody>
				</table>'
			);

			if ( !$this->has_wp_query() ) {
				return $dummy_data_array;
			}

			$product_attributes_data_array = array(
				'attributes_html' => '',
			);

			ob_start();
			do_action( 'woocommerce_product_additional_information', $this->product );
			$product_attributes_data_array['attributes_html'] = ob_get_clean();

            if (  tdc_state::is_live_editor_iframe() || tdc_state::is_live_editor_ajax() ) {
                if ( $product_attributes_data_array['attributes_html'] == '' ) {
                    return $dummy_data_array;
                }
            }

			return $product_attributes_data_array;
		};

		// product description
		$this->product_description = function ($atts) {

			$desc_type = !empty( $atts['type'] ) ? $atts['type'] : 'default';

			$sample_desc = '';
			if ( $desc_type === 'short' ) {
				$sample_desc .= 'Sample Product Short Description.';
			} else {
				$sample_desc .= 'Sample Product Description. ( Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. )';
			}

			$dummy_data_array = array(
				'description' => $sample_desc
			);

			if ( ! $this->has_wp_query() ) {
				return $dummy_data_array;
			}

            if (  tdc_state::is_live_editor_iframe() || tdc_state::is_live_editor_ajax() ) {
	            if ( ( $desc_type === 'short' && $this->product->get_short_description() === '' ) ||
	                 ( $desc_type === 'default' && $this->product->get_description() === '' )
	            ) {
		            return $dummy_data_array;
	            }
            }

			$product_description_array = array();
			if ( $desc_type === 'short' ) {
				$product_description_array['description'] = apply_filters( 'woocommerce_short_description', $this->product->get_short_description() );
			} else {
				$product_description_array['description'] = wpautop( $this->product->get_description() );
			}

			return $product_description_array;
		};

		// product categories
		$this->product_categories = function ($atts) {

			$sample_product_categories_list = '
				<a class="no-click" href="#">Sample Category 1</a><span class="tdw-tag-sep">, </span> 
				<a class="no-click" href="#">Sample Category 2</a><span class="tdw-tag-sep">, </span> 
				<a class="no-click" href="#">Sample Category 3</a>
			';

			if ( ! $this->has_wp_query() ) {
				return $sample_product_categories_list;
			}

			/**
			 * Returns the product categories in a list.
			 *
			 * @param int    $product_id Product ID.
			 * @param string $sep (default: ', ').
			 * @param string $before (default: '').
			 * @param string $after (default: '').
			 * @return string
			 */
			$product_categories_list = wc_get_product_category_list( $this->product->get_id(), '<span class="tdw-cat-sep">, </span>' );

			return $product_categories_list;
		};

		// product add to cart
		$this->product_add_to_cart = function ($atts) {

			$product_sample_data_type = !empty( $atts['sample_data_type'] ) ? $atts['sample_data_type'] : 'simple';

			$dummy_data_array = array(
				'type' => $product_sample_data_type,
				'sample_data' => true,
				'product' => null,
				'id' => '',
				'add_to_cart_text' => 'Add to Cart',
				'is_purchasable' => true,
				'is_in_stock' => true,
				'permalink' => '#',
				'min_purchase_quantity' => 1,
				'max_purchase_quantity' => 5,
				'input_value' => 1
			);

			// add stock html sample to dummy data array
			$dummy_data_array['sample_stock_html'] = '<p class="stock out-of-stock">Out of stock</p>';

			if ( $product_sample_data_type === 'variable' ) {
				$dummy_data_array['variations_form'] = '<form class="variations_form cart" action="#" method="post" enctype="multipart/form-data" data-product_id="7639" data-product_variations="[{}]" current-image="">
						<table class="variations" cellspacing="0">
							<tbody>
								<tr>
									<td class="label"><label for="pa_color">Color</label></td>
									<td class="value">
										<select id="pa_color" class="" name="attribute_pa_color" data-attribute_name="attribute_pa_color" data-show_option_none="yes">
											<option value="">Choose an option</option>
											<option value="blue" class="attached enabled">Blue</option>
											<option value="green" class="attached enabled">Green</option>
											<option value="red" class="attached enabled">Red</option>
										</select>
									</td>
								</tr>
								<tr>
									<td class="label"><label for="logo">Logo</label></td>
									<td class="value">
										<select id="logo" class="" name="attribute_logo" data-attribute_name="attribute_logo" data-show_option_none="yes">
											<option value="">Choose an option</option>
											<option value="Yes" class="attached enabled">Yes</option>
											<option value="No" class="attached enabled">No</option>
										</select>
										<a class="reset_variations" href="#" style="visibility: hidden;">Clear</a>
									</td>
								</tr>
							</tbody>
						</table>
						<div class="single_variation_wrap">
							<div class="woocommerce-variation single_variation" style="display: none;"></div>
							<div class="woocommerce-variation-add-to-cart variations_button woocommerce-variation-add-to-cart-disabled">
								<div class="quantity">
									<label class="screen-reader-text" for="quantity_5eec8c87f15ce">Hoodie quantity</label>
									<input type="number" id="quantity_5eec8c87f15ce" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4" placeholder="" inputmode="numeric">
								</div>
								<button type="submit" class="single_add_to_cart_button button alt disabled wc-variation-selection-needed" style="pointer-events: none;">Add to cart</button>
								<input type="hidden" name="add-to-cart" value="7639">
								<input type="hidden" name="product_id" value="7639">
								<input type="hidden" name="variation_id" class="variation_id" value="0">
							</div>
						</div>
					</form>';
			}

			if ( !$this->has_wp_query() ) {
				return $dummy_data_array;
			}

			$product_type = $this->product->get_type();

			$product_add_to_cart_data_array = array(
				'type' => $this->product->get_type(),
				'sample_data' => false,
				'product' => $this->product,
				'id' => $this->product->get_id(),
				'add_to_cart_text' => esc_html( $this->product->single_add_to_cart_text() ),
				'is_purchasable' => $this->product->is_purchasable(),
				'is_in_stock' => $this->product->is_in_stock(),
				'permalink' => esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $this->product->get_permalink() ) ),
				'min_purchase_quantity' => apply_filters( 'woocommerce_quantity_input_min', $this->product->get_min_purchase_quantity(), $this->product ),
				'max_purchase_quantity' => apply_filters( 'woocommerce_quantity_input_max', $this->product->get_max_purchase_quantity(), $this->product ),
				'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $this->product->get_min_purchase_quantity(),
			);

			if ( $product_type === 'variable' || $product_type === 'variable-subscription' ) {
				global $product, $post;
				$product = $post = $this->product;
				$post = $this->get_wp_query()->post;

				// load product variation switches
				require_once "td_woo_variation_switches.php";
				new td_woo_variation_switches($atts, $this->product);

				ob_start();
				woocommerce_variable_add_to_cart();
				$product_add_to_cart_data_array['variations_form'] = ob_get_clean();
			}

			return $product_add_to_cart_data_array;
		};

		// custom add to cart button
		$this->product_add_to_cart_custom = function ($atts) {

		    $product = null;
		    if( !empty( $atts['product_id'] ) ) {
                $product = wc_get_product( $atts['product_id'] );
            } else {
                $current_product = $this->product;
                if( $current_product != NULL ) {
                    $product = $current_product;
                }
            }

			$dummy_data_array = array(
				'product_add_to_cart_url' => '#',
				'product_add_to_cart_text' => 'Custom Add to Cart',
				'quantity'   => esc_attr( !empty( $atts['quantity'] ) ? $atts['quantity'] : 1 ),
				'attributes' => '',
				'class' => 'button',
			);

			if ( ! $product ) {
				return $dummy_data_array;
			}

			$product_add_to_cart_custom_data_array = array(
				'product_add_to_cart_url' => esc_url( $product->add_to_cart_url() ),
				'product_add_to_cart_text' => 'Custom Add to Cart',
				'quantity'   => esc_attr( !empty( $atts['quantity'] ) ? $atts['quantity'] : 1 ),
				'attributes' => wc_implode_html_attributes( array(
					'data-product_id'  => $product->get_id(),
					'data-product_sku' => $product->get_sku(),
					'aria-label'       => wp_strip_all_tags( $product->add_to_cart_description() ),
					'rel'              => 'nofollow',
				) ),
				'class' => esc_attr( implode(
					' ',
					array_filter(
						array(
							'button',
							'product_type_' . $product->get_type(),
							$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
							$product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
						)
					)
				) ),
			);

			return $product_add_to_cart_custom_data_array;

		};

		// product sku
		$this->product_sku = function ($atts) {

			$dummy_data_array = array(
				'sku' => 'sample-product-sku',
				'type' => 'simple'
			);

			if ( !$this->has_wp_query() ) {
				return $dummy_data_array;
			}

			// product type
			$product_type = $this->product->get_type();

			$product_sku_data_array = array(
				'type' => $product_type,
				'sku' => $this->product->get_sku(),
			);

            if ( tdc_state::is_live_editor_iframe() || tdc_state::is_live_editor_ajax() ) {
                if ( $product_sku_data_array['sku'] == '' ) {
                    return $dummy_data_array;
                }
            }

			return $product_sku_data_array;
		};

		// product tags
		$this->product_tags = function ($atts) {

			$sample_html = '
				<a class="no-click" href="#">Sample Tag 1</a><span class="tdw-tag-sep">, </span> 
				<a class="no-click" href="#">Sample Tag 2</a><span class="tdw-tag-sep">, </span> 
				<a class="no-click" href="#">Sample Tag 3</a>
			';

			if ( ! $this->has_wp_query() ) {
				return $sample_html;
			}

			/**
			 * Returns the product categories in a list.
			 *
			 * @param int    $product_id Product ID.
			 * @param string $sep (default: ', ').
			 * @param string $before (default: '').
			 * @param string $after (default: '').
			 * @return string
			 */
			$product_tags_list = wc_get_product_tag_list( $this->product->get_id(), '<span class="tdw-tag-sep">, </span>' );

            if (  tdc_state::is_live_editor_iframe() || tdc_state::is_live_editor_ajax() ) {
                if ( $product_tags_list === false ) {
                    return $sample_html;
                }
            }

			return $product_tags_list;
		};

		// product additional information tabs
		$this->product_tabs = function ($atts) {

			$sample_avatar_src = TD_WOO_URL . '/assets/images/sample_avatar.png';

			$sample_html = '<div class="woocommerce-tabs wc-tabs-wrapper">
					<ul class="tabs wc-tabs" role="tablist">
						<li class="description_tab active" id="tab-title-description" role="tab" aria-controls="tab-description">
							<a href="#tab-description">Description</a>
						</li>
						<li class="additional_information_tab" id="tab-title-additional_information" role="tab" aria-controls="tab-additional_information">
							<a href="#tab-additional_information">Additional information</a>
						</li>
						<li class="reviews_tab" id="tab-title-reviews" role="tab" aria-controls="tab-reviews">
							<a href="#tab-reviews">Reviews (3)</a>
						</li>
					</ul>
					<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab" id="tab-description" role="tabpanel" aria-labelledby="tab-title-description" style="display: block;">Sample Product Description</div>
					<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--additional_information panel entry-content wc-tab" id="tab-additional_information" role="tabpanel" aria-labelledby="tab-title-additional_information" style="display: none;">
						<h2>Additional information</h2>
						<table class="woocommerce-product-attributes shop_attributes">
							<tbody>
								<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_color">
									<th class="woocommerce-product-attributes-item__label">Sample Product Attribute - Color</th>
									<td class="woocommerce-product-attributes-item__value"><p>Gray</p></td>
									<td class="woocommerce-product-attributes-item__value"><p>Blue</p></td>
									<td class="woocommerce-product-attributes-item__value"><p>Red</p></td>
								</tr>
								<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_test">
									<th class="woocommerce-product-attributes-item__label">Sample Product Attribute - Size</th>
									<td class="woocommerce-product-attributes-item__value"><p>Small</p></td>
									<td class="woocommerce-product-attributes-item__value"><p>Medium</p></td>
									<td class="woocommerce-product-attributes-item__value"><p>Large</p></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--reviews panel entry-content wc-tab" id="tab-reviews" role="tabpanel" aria-labelledby="tab-title-reviews" style="display: none;">
						<div id="reviews" class="woocommerce-Reviews">
							<div id="comments">
								<h2 class="woocommerce-Reviews-title">3 reviews for Sample Product</h2>
								<ol class="commentlist">
									<li class="review byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-3">
										<div id="comment-3" class="comment_container">
											<img alt="" src="' . $sample_avatar_src . '" class="avatar avatar-60 photo" height="60" width="60">
											<div class="comment-text">
												<div class="star-rating"><span style="width:20%">Rated <strong class="rating">1</strong> out of 5</span></div>
												<p class="meta">
													<strong class="woocommerce-review__author">admin </strong>
													<span class="woocommerce-review__dash">–</span> <time class="woocommerce-review__published-date">January 1, 2020</time>
												</p>
												<div class="description"><p>Very Poor Sample Review</p></div>
											</div>
										</div>
									</li>
									<li class="comment byuser comment-author-admin bypostauthor odd alt thread-odd thread-alt depth-1" id="li-comment-2">
										<div id="comment-2" class="comment_container">
											<img alt="" src="' . $sample_avatar_src . '" class="avatar avatar-60 photo" height="60" width="60">
											<div class="comment-text">
												<p class="meta">
													<strong class="woocommerce-review__author">admin </strong>
													<span class="woocommerce-review__dash">–</span> <time class="woocommerce-review__published-date">January 1, 2020</time>
												</p>
												<div class="description"><p>No Star Rating Sample Review</p></div>
											</div>
										</div>
									</li>
									<li class="review byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-1">
										<div id="comment-3" class="comment_container">
											<img alt="" src="' . $sample_avatar_src . '" class="avatar avatar-60 photo" height="60" width="60">
											<div class="comment-text">
												<div class="star-rating"><span style="width:100%">Rated <strong class="rating">5</strong> out of 5</span></div>
												<p class="meta">
													<strong class="woocommerce-review__author">admin </strong>
													<span class="woocommerce-review__dash">–</span> <time class="woocommerce-review__published-date">January 1, 2020</time>
												</p>
												<div class="description"><p>Perfect Sample Review</p></div>
											</div>
										</div>
									</li>
								</ol>
							</div>
							<div id="review_form_wrapper">
								<div id="review_form">
									<div id="respond" class="comment-respond">
									<span id="reply-title" class="comment-reply-title">Add a review</span>
									<form action="#" method="post" id="commentform" class="comment-form" novalidate="">
										<div class="comment-form-rating">
											<label for="rating">Your rating</label>
											<p class="stars"><span><a class="star-1" href="#">1</a><a class="star-2" href="#">2</a><a class="star-3" href="#">3</a><a class="star-4" href="#">4</a><a class="star-5" href="#">5</a></span></p>
											<select name="rating" id="sample-html-rating" required="" style="display: none;">
												<option value="">Rate…</option>
												<option value="5">Perfect</option>
												<option value="4">Good</option>
												<option value="3">Average</option>
												<option value="2">Not that bad</option>
												<option value="1">Very poor</option>
											</select>
										</div>
										<p class="comment-form-comment">
											<label for="comment">Your review&nbsp;<span class="required">*</span></label>
											<textarea id="comment" name="comment" cols="45" rows="8" required=""></textarea>
										</p>
										<p class="form-submit">
											<input name="submit" type="submit" id="submit" class="submit no-click" value="Submit">
										</p>
									</form>
								</div>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>';

			if ( !$this->has_wp_query() ) {
				return $sample_html;
			}

			global $product, $post;
			$product = $post = $this->product;
			$post = $this->get_wp_query()->post;

			add_filter( 'woocommerce_product_tabs', function ($product_tabs){
				if( isset($product_tabs['description']) ) {
					$product_tabs['description']['callback'] = function (){
						echo wpautop( $this->product->get_description() );
					};
				}
				return $product_tabs;
			}, 11);

			// for reviews tab we need to set the global wp query
			// ( fix for review tab content disappearing after shortcode refresh )
			$show_tab = !empty( $atts['show_tab'] ) ? $atts['show_tab'] : '';
			if ( tdc_state::is_live_editor_ajax() && $show_tab == 'rev_tab' ) {
				global $wp_query;
				$template_wp_query = $wp_query;
				$wp_query = $this->get_wp_query();
			}

			ob_start();
			woocommerce_output_product_data_tabs();
			$product_tabs = ob_get_clean();

			if ( tdc_state::is_live_editor_ajax() && $show_tab == 'rev_tab' ) {
				global $wp_query;
				$wp_query = $template_wp_query;
			}

            if (  tdc_state::is_live_editor_iframe() || tdc_state::is_live_editor_ajax() ) {
                if ( $product_tabs == '' ) {
                    return $sample_html;
                }
            }

			return $product_tabs;
		};

		// product reviews
		$this->product_reviews = function ($atts) {

			$sample_avatar_src = TD_WOO_URL . '/assets/images/sample_avatar.png';

			$sample_html = '
				<div id="reviews" class="woocommerce-Reviews">
					<div id="comments">
						<h2 class="woocommerce-Reviews-title">3 reviews for Sample Product</h2>
						<ol class="commentlist">
							<li class="review byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-3">
								<div id="comment-3" class="comment_container">
									<img alt="" src="' . $sample_avatar_src . '" class="avatar avatar-60 photo" height="60" width="60">
									<div class="comment-text">
										<div class="star-rating"><span style="width:20%">Rated <strong class="rating">1</strong> out of 5</span></div>
										<p class="meta">
											<strong class="woocommerce-review__author">admin </strong>
											<span class="woocommerce-review__dash">–</span> <time class="woocommerce-review__published-date">January 1, 2020</time>
										</p>
										<div class="description"><p>Very Poor Sample Review</p></div>
									</div>
								</div>
							</li>
							<li class="comment byuser comment-author-admin bypostauthor odd alt thread-odd thread-alt depth-1" id="li-comment-2">
								<div id="comment-2" class="comment_container">
									<img alt="" src="' . $sample_avatar_src . '" class="avatar avatar-60 photo" height="60" width="60">
									<div class="comment-text">
										<p class="meta">
											<strong class="woocommerce-review__author">admin </strong>
											<span class="woocommerce-review__dash">–</span> <time class="woocommerce-review__published-date">January 1, 2020</time>
										</p>
										<div class="description"><p>No Star Rating Sample Review</p></div>
									</div>
								</div>
							</li>
							<li class="review byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-1">
								<div id="comment-3" class="comment_container">
									<img alt="" src="' . $sample_avatar_src . '" class="avatar avatar-60 photo" height="60" width="60">
									<div class="comment-text">
										<div class="star-rating"><span style="width:100%">Rated <strong class="rating">5</strong> out of 5</span></div>
										<p class="meta">
											<strong class="woocommerce-review__author">admin </strong>
											<span class="woocommerce-review__dash">–</span> <time class="woocommerce-review__published-date">January 1, 2020</time>
										</p>
										<div class="description"><p>Perfect Sample Review</p></div>
									</div>
								</div>
							</li>
						</ol>
					</div>
					<div id="review_form_wrapper">
						<div id="review_form">
							<div id="respond" class="comment-respond">
							<span id="reply-title" class="comment-reply-title">Add a review</span>
							<form action="#" method="post" id="commentform" class="comment-form" novalidate="">
								<div class="comment-form-rating">
									<label for="rating">Your rating</label>
									<p class="stars"><span><a class="star-1" href="#">1</a><a class="star-2" href="#">2</a><a class="star-3" href="#">3</a><a class="star-4" href="#">4</a><a class="star-5" href="#">5</a></span></p>
									<select name="rating" id="sample-html-rating" required="" style="display: none;">
										<option value="">Rate…</option>
										<option value="5">Perfect</option>
										<option value="4">Good</option>
										<option value="3">Average</option>
										<option value="2">Not that bad</option>
										<option value="1">Very poor</option>
									</select>
								</div>
								<p class="comment-form-comment">
									<label for="comment">Your review&nbsp;<span class="required">*</span></label>
									<textarea id="comment" name="comment" cols="45" rows="8" required=""></textarea>
								</p>
								<p class="comment-form-author">
								    <label for="author">Name&nbsp;<span class="required">*</span></label>
								    <input id="author" name="author" type="text" value="" size="30" required="" style="border: 1px solid rgb(225, 225, 225);">
                                </p>
                                <p class="comment-form-email">
                                    <label for="email">Email&nbsp;<span class="required">*</span></label>
                                    <input id="email" name="email" type="email" value="" size="30" required="">
                                </p>
								<p class="form-submit">
									<input name="submit" type="submit" id="submit" class="submit no-click" value="Submit">
								</p>
							</form>
							</div>
						</div>
					</div>
				</div>
			';

			if ( !$this->has_wp_query() ) {
				return $sample_html;
			}


			if (  tdc_state::is_live_editor_iframe() || tdc_state::is_live_editor_ajax() ) {

                $comments = get_comments( array (
                    'post_type' => 'product',
                    'post_id' => $this->product->get_id()
                ));
                $have_comments = count( $comments ) > 0;


                if ( $have_comments ) {
                    $tdc_sample_html = ''; // sample data for composer's iframe/live editor

                    global $product, $post;
                    $product = $post = $this->product;
                    $post = $this->get_wp_query()->post;

                    $tdc_sample_html .= '
                        <div id="reviews" class="woocommerce-Reviews">
                            <div id="comments">';

                                $tdc_sample_html .= '<h2 class="woocommerce-Reviews-title">';

                                    $count = $this->product->get_review_count();
                                    if ( $count && wc_review_ratings_enabled() ) {
                                        $reviews_title = sprintf( esc_html( _n( '%1$s review for %2$s', '%1$s reviews for %2$s', $count, 'woocommerce' ) ), esc_html( $count ), '<span>' . $this->product->get_title() . '</span>' );
                                        $tdc_sample_html .= apply_filters( 'woocommerce_reviews_title', $reviews_title, $count, $this->product );
                                    } else {
                                        $tdc_sample_html .= esc_html( translate( 'Reviews', 'woocommerce' ) );
                                    }

                                $tdc_sample_html .= '</h2>';

                                $tdc_sample_html .= '
                                    <ol class="commentlist">
                                ';
                                    $tdc_sample_html .= wp_list_comments(
                                        array(
                                            'callback' => 'woocommerce_comments',
                                            'echo' => false
                                        ),
                                        $comments
                                    );
                                $tdc_sample_html .= '
                                    </ol>
                                ';

                                if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
                                    $tdc_sample_html .= '<nav class="woocommerce-pagination">';
                                    paginate_comments_links(
                                        apply_filters(
                                            'woocommerce_comment_pagination_args',
                                            array(
                                                'prev_text' => '&larr;',
                                                'next_text' => '&rarr;',
                                                'type'      => 'list',
                                            )
                                        )
                                    );
                                    $tdc_sample_html .= '</nav>';
                                }
                            $tdc_sample_html .= '</div>';

                            $title_reply = $have_comments ? esc_html__( 'Add a review', 'woocommerce' ) : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'woocommerce' ), $this->product->get_title() );

                            $tdc_sample_html .= '
                                <div id="review_form_wrapper">
                                    <div id="review_form">
                                        <div id="respond" class="comment-respond">
                                        <span id="reply-title" class="comment-reply-title">' . $title_reply . '</span>
                                        <form action="#" method="post" id="commentform" class="comment-form" novalidate="">
                                            <div class="comment-form-rating">
                                                <label for="rating">Your rating</label>
                                                <p class="stars"><span><a class="star-1" href="#">1</a><a class="star-2" href="#">2</a><a class="star-3" href="#">3</a><a class="star-4" href="#">4</a><a class="star-5" href="#">5</a></span></p>
                                                <select name="rating" id="tdc-sample-html-rating" required="" style="display: none;">
                                                    <option value="">Rate…</option>
                                                    <option value="5">Perfect</option>
                                                    <option value="4">Good</option>
                                                    <option value="3">Average</option>
                                                    <option value="2">Not that bad</option>
                                                    <option value="1">Very poor</option>
                                                </select>
                                            </div>
                                            <p class="comment-form-comment">
                                                <label for="comment">Your review&nbsp;<span class="required">*</span></label>
                                                <textarea id="comment" name="comment" cols="45" rows="8" required=""></textarea>
                                            </p>
                                            <p class="comment-form-author">
                                                <label for="author">Name&nbsp;<span class="required">*</span></label>
                                                <input id="author" name="author" type="text" value="" size="30" required="" style="border: 1px solid rgb(225, 225, 225);">
                                            </p>
                                            <p class="comment-form-email">
                                                <label for="email">Email&nbsp;<span class="required">*</span></label>
                                                <input id="email" name="email" type="email" value="" size="30" required="">
                                            </p>
                                            <p class="form-submit">
                                                <input name="submit" type="submit" id="submit" class="submit no-click" value="Submit">
                                            </p>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            ';

                    $tdc_sample_html .= '
                        <div class="clear"></div>
                    </div>';

                    return $tdc_sample_html;
				} else {
                    return $sample_html;
				}
			}

			global $product, $post;
			$product = $this->product;
			$post = $this->get_wp_query()->post;

			ob_start();
			comments_template();
			return ob_get_clean();

		};

		// product rating
		$this->product_rating = function ($atts) {

			$sample_html = '
				<div class="woocommerce-product-rating">
					<div class="star-rating">
						<span style="width:60%">Rated <strong class="rating">3.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
					</div>
					<a href="#" class="woocommerce-review-link no-click" rel="nofollow">(<span class="count">3</span> customer reviews)</a>
				</div>
			';

			if ( ! $this->has_wp_query() ) {
				return $sample_html;
			}

			if (  tdc_state::is_live_editor_iframe() || tdc_state::is_live_editor_ajax() ) {
				return $sample_html;
			}

			global $product, $post;
			$product = $this->product;
			$post = $this->get_wp_query()->post;

			ob_start();
			woocommerce_template_single_rating();
			return ob_get_clean();

		};

		// product breadcrumbs
		$this->product_breadcrumbs = function ($atts) {

			$dummy_data = '
				<div class="entry-crumbs product-breadcrumbs-sample-data" itemprop="breadcrumb">
					<a href="#" class="no-click">Home</a> <i class="td-icon-right td-bread-sep"></i> 
					<a href="#" class="no-click">Product Category</a> <i class="td-icon-right td-bread-sep"></i> 
					<a href="#" class="no-click">Product Subcategory</a> <i class="td-icon-right td-bread-sep"></i> 
					Product Title
				</div>
			';

			if ( ! $this->has_wp_query() ) {
				return $dummy_data;
			}

			global $product, $post, $wp_query;
			$product = $post = $this->product;
			$post = $this->get_wp_query()->post;

			$template_wp_query = $wp_query;
			$wp_query = $this->get_wp_query();

			ob_start();
			woocommerce_breadcrumb();
			$product_breadcrumbs = ob_get_clean();

			$wp_query = $template_wp_query;

			return $product_breadcrumbs;

		};

		// product add to cart notices
		$this->product_notices = function ($atts) {

			$product_sample_data_type = !empty( $atts['sample_data_type'] ) ? $atts['sample_data_type'] : 'success';

			$sample_html = '';

			switch ($product_sample_data_type) {
				case 'error':
					$sample_html .= '
						<div class="woocommerce-notices-wrapper">
							<ul class="woocommerce-error" role="alert">
							    <li>
							        <a href="#" tabindex="1" class="button wc-forward">View cart</a>
							        Invalid order. (sample error notice)
                                </li>
                            </ul>
						</div>';
					break;
				case 'notice':
					$sample_html .= '
						<div class="woocommerce-notices-wrapper">
							<div class="woocommerce-info">
							    <a href="#" tabindex="1" class="button wc-forward">View cart</a>
							    Your order was cancelled. (sample info notice)
                            </div>
						</div>';
					break;
				default:
					$sample_html .= '
						<div class="woocommerce-notices-wrapper">
							<div class="woocommerce-message" role="alert">
                                <a href="#" tabindex="1" class="button wc-forward">View cart</a>
                                Cart updated. (sample success notice)
							</div>
						</div>';
			}

			if ( ! $this->has_wp_query() ) {
				return $sample_html;
			}

			if (  tdc_state::is_live_editor_iframe() || tdc_state::is_live_editor_ajax() ) {
				return $sample_html;
			}

			//wc_add_notice( 'Cart updated.');
			//wc_add_notice( 'Your order was cancelled.', 'notice' );
			//wc_add_notice( 'Invalid order.', 'error' );

			ob_start();
			woocommerce_output_all_notices();
			$product_notices = ob_get_clean();

			return $product_notices;

		};

		// products loop
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
			 * call the WC_Shortcode_Products get_content method to trigger the woocommerce_shortcode_products_query_results hook and set the $td_woo_loop_products global
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

		// products block
		$this->block = function ($atts) {

			if ( !$this->has_wp_query() ) {
				return array(
					'p_id' => 0,
					'p_cats_ids' => array(),
					'p_tags_slugs' => array(),
					'upsells_ids' => array(),
				);
			}

			// set globals
			global $product, $post;
			$product = $post = $this->product;
			$post = $this->get_wp_query()->post;

			// product upsells
			// @note we get all upsells.. the limit, sorting etc.. will be applied in td data source > products query
			$upsells = array_filter(
				array_map( 'wc_get_product', $product->get_upsell_ids() ),
				'wc_products_array_filter_visible'
			);

			// get ids
			$upsell_ids = array();
			foreach ( $upsells as $upsell ) {
				$upsell_ids[] = $upsell->get_id();
			}

			// process tags ids, we need product tags slugs to pass to the query
			$p_tags_slugs = array();
			$p_tags_ids = wc_get_product_term_ids( $product->get_id(), 'product_tag' );
			if ( count($p_tags_ids) ) {
				foreach ( $p_tags_ids as $p_tag_id ) {
					$p_tag_obj = get_term( $p_tag_id, 'product_tag' );
					$p_tags_slugs[] = $p_tag_obj->slug;
				}
			}

			return array(
				'p_id' => $product->get_id(),
				'p_cats_ids' => wc_get_product_term_ids( $product->get_id(), 'product_cat' ),
				'p_tags_slugs' => $p_tags_slugs,
				'upsells_ids' => !empty( $upsell_ids ) ? $upsell_ids : array( 0 ), // force an empty query response if the product has no upsells
			);

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

					$tax_name = isset( $taxonomy->attribute_name ) ? $taxonomy->attribute_name : ( isset( $taxonomy->name ) ? $taxonomy->name : '' );

					if ( isset( $atts[$tax_name . '_type'] ) && $atts[$tax_name . '_type'] === 'off' ) {
						// if set to off from shortcode settings
						continue;
					} else {

						$tax_data = array(
							'terms' => array()
						);

						// type
						if ( isset( $atts[$tax_name . '_type'] ) && !empty( $atts[$tax_name . '_type'] )  ) {
							// switch attribute type to the type set on shortcode..
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

			// add current queried product obj to filters data
			$cur_product = $this->product;
			$attribute_filter_data['current_queried_obj'] = $cur_product;

			return $attribute_filter_data;

		};

		// product socials
		$this->product_socials = function ($atts) {

			if ( !$this->has_wp_query() ) {
				return array(
					'post_permalink' => '#',
					'is_amp'         => false,
					'is_tdb_block'   => true,
					'services'       => array(
						'facebook',
						'twitter',
						'pinterest',
						'whatsapp',
						'linkedin',
						'reddit',
						'mail',
						'print',
						'tumblr',
						'telegram',
						'stumbleupon',
						'vk',
						'digg',
						'line',
						'viber',
					),
					'share_text_show' => 'yes',
					'style' => $atts['like_share_style']
				);
			}

			return array(
				'is_tdb_block' => true,
				'is_amp' => false,
				'post_id' => $this->product->get_id(),
				'post_permalink' => esc_url( get_permalink( $this->product->get_id() ) ),
				'services' => td_api_social_sharing_styles::_helper_get_enabled_socials(),
				'style' => $atts['like_share_style'],
				'share_text_show' => $atts['like_share_text'] !== 'yes',
				'social_rel' => ( $atts['social_rel'] !== '' ) ? ' rel="' . $atts['social_rel'] . '" ' : '',
				'el_class' => ''
			);

		};

		// product brand img
		$this->product_brand_img = function ($atts) {

            $dummy_img_data = array(
                'src' => TD_WOO_URL . '/assets/images/no_img.png',
                'width' => '66',
                'height' => '66'
            );

            $dummy_product_brands_data = array(
                array(
                    'img' => $dummy_img_data,
                    'info' => array(
                        'id' => '1',
                        'name' => 'Brand',
                        'url' => ''
                    )
                )
            );

			if ( !$this->has_wp_query() ) {
				return $dummy_product_brands_data;
			}

            $product_brands_data = array();

			if ( isset( $atts['att_tax'] ) ) {

                // get the selected attribute data
                $attribute = wc_get_attribute(wc_attribute_taxonomy_id_by_name($atts['att_tax']));

				// get att tax terms
				$product_terms = wc_get_product_terms( $this->product->get_id(), $atts['att_tax'] );

				// get term img
				if ( !empty( $product_terms ) && is_array( $product_terms ) ) {

					foreach ( $product_terms as $term ) {
						$term_meta_img_attachment_id = get_term_meta( $term->term_id, 'product_attribute_image', true );

						if ( !empty( $term_meta_img_attachment_id ) ) {
                            $img_info = wp_get_attachment_image_src($term_meta_img_attachment_id);

                            if( $img_info ) {
                                $img = array(
                                    'src' => $img_info[0],
                                    'width' => $img_info[1],
                                    'height' => $img_info[2],
                                );
                            } else {
                                $img = $dummy_img_data;
                            }
                        } else {
                            $img = $dummy_img_data;
                        }

                        $product_brands_data[] = array(
                            'img' => $img,
                            'info' => array(
                                'id' => $term->term_id,
                                'name' => $term->name,
                                'url' => $attribute->has_archives ? get_term_link($term->term_id) : '',
                            )
                        );

                        break;
					}

				}

			}

            if( empty( $product_brands_data ) && ( tdc_state::is_live_editor_iframe() || tdc_state::is_live_editor_ajax() ) ) {
                return $dummy_product_brands_data;
            }

			return $product_brands_data;

		};

		parent::lock_state_definition();

	}

}
