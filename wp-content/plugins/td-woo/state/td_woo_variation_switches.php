<?php

/**
 * Class td_woo_variation_switches - switches product variation options types based on shortcode's settings
 */
class td_woo_variation_switches {

	private $product;
	private $shortcode_atts;

	public function __construct( $shortcode_atts, $product ) {

		$this->product = $product;
		$this->shortcode_atts = $shortcode_atts;

		$add_variation_switches_filter = false; // add variation switches filter flag

		$product_variation_attributes = array_keys( $this->product->get_variation_attributes() );

		foreach ( $product_variation_attributes as $attribute_name ) {
			if ( 'pa_' === substr( $attribute_name, 0, 3 ) ) {
				$attribute_name_clean = str_replace( 'pa_', '', wc_sanitize_taxonomy_name( $attribute_name ) );

				if ( ! empty( $this->shortcode_atts[$attribute_name_clean . "_type"] ) ) {
					$add_variation_switches_filter = true;
					break;
				}
			}
		}

		// add variation switches filter
		if ( $add_variation_switches_filter ) {
			add_filter( 'woocommerce_dropdown_variation_attribute_options_html', array( $this, 'td_on_woocommerce_dropdown_variation_attribute_options_html' ), 200, 2 );

			// variation switches js
//			wp_enqueue_script(
//				'td-woo-variation-switches',
//				TD_WOO_URL . '/assets/js/external/variation-switches-ref.js',
//				array( 'jquery', 'wp-util' ),
//				TD_WOO,
//				true
//			);

		}

	}

	function td_get_available_types() {
		return array(
			'color' => array(
				'title'   => 'Color',
				'output'  => 'td_color_variation_attribute_options'
			),
			'button' => array(
				'title'   => 'Button',
				'output'  => 'td_button_variation_attribute_options'
			)
		);
	}

	function td_on_woocommerce_dropdown_variation_attribute_options_html( $html, $args ) {

		ob_start();

		$attribute_name_clean = str_replace( 'pa_', '', wc_sanitize_taxonomy_name( $args[ 'attribute' ] ) );

		$available_types = $this->td_get_available_types();
		$available_type_keys = array_keys( $available_types );
		$default             = true;

		//echo '<pre>';
		//echo 'attribute: '; print_r($args['attribute']); echo PHP_EOL;
		//		$attribute_tax = td_woo_util::td_get_attribute_taxonomy( $args[ 'attribute' ] );
		//		$attribute_type = isset( $attribute_tax->attribute_type ) ? $attribute_tax->attribute_type : '';
		//echo 'global attribute type: '; print_r($attribute_type); echo PHP_EOL;
		//echo 'attribute shortcode_atts __type: '; print_r( isset( $this->shortcode_atts[ $attribute_name_clean . '_type' ] ) ? $this->shortcode_atts[ $attribute_name_clean . '_type' ] : 'NOT SET' ); echo PHP_EOL;
		//echo '</pre>';

		foreach ( $available_type_keys as $type ) {
			if ( isset( $this->shortcode_atts[ $attribute_name_clean . '_type' ] ) && $this->shortcode_atts[ $attribute_name_clean . '_type' ] === $type ) {
				$output_callback = $available_types[ $type ][ 'output' ];
				$this->$output_callback( wp_parse_args( $args, array(
							'options'    => $args[ 'options' ],
							'attribute'  => $args[ 'attribute' ],
							'product'    => $args[ 'product' ],
							'selected'   => $args[ 'selected' ],
							'type'       => $type,
							'is_archive' => ( isset( $args[ 'is_archive' ] ) && $args[ 'is_archive' ] )
						) ) );
				$default = false;
				break; // break the loop after first output
			}
		}

		// if we have no output from above show the default output
		if ( $default ) {
			echo '<div class="woo-variation-default-select-wrapper">' . $html . '</div>';
		}

		return ob_get_clean();
	}

	function td_variable_item( $type, $options, $args ) {

		$product   = $args[ 'product' ];
		$attribute = $args[ 'attribute' ];
		$data      = '';

		if ( ! empty( $options ) ) {
			if ( $product && taxonomy_exists( $attribute ) ) {
				$terms = wc_get_product_terms( $product->get_id(), $attribute, array( 'fields' => 'all' ) );
				foreach ( $terms as $term ) {
					if ( in_array( $term->slug, $options ) ) {
						$selected_class = ( sanitize_title( $args[ 'selected' ] ) == $term->slug ) ? 'selected' : '';
						$tooltip        = trim( $term->name );

						$tooltip_html_attr = ! empty( $tooltip ) ? sprintf( 'data-tooltip="%s"', esc_attr( $tooltip ) ) : '';

						if ( wp_is_mobile() ) {
							$tooltip_html_attr .= ! empty( $tooltip ) ? ' tabindex="2"' : '';
						}

						$data .= sprintf( '<li %1$s class="variable-item %2$s-variable-item %2$s-variable-item-%3$s %4$s" title="%5$s" data-value="%3$s" role="button" tabindex="0">', $tooltip_html_attr, esc_attr( $type ), esc_attr( $term->slug ), esc_attr( $selected_class ), esc_html( $term->name ) );

						switch ( $type ):
							case 'color':
								$term_meta_color = get_term_meta( $term->term_id, 'product_attribute_color', true );
								$term_meta_img_attachment_id = get_term_meta( $term->term_id, 'product_attribute_color_image', true );

								// if we don't have a color set ..check for an image ( we may have a gradient/multicolored image set.. used for multicolored products )
								if ( empty( $term_meta_color ) && ! empty( $term_meta_img_attachment_id ) ) {

									$image = wp_get_attachment_image_src( $term_meta_img_attachment_id );
									$data .= sprintf( '<img aria-hidden="true" alt="%s" src="%s" width="%d" height="%d" />', esc_attr( $term->name ), esc_url( $image[0] ), $image[1], $image[2] );
								} else {
									$sanitized_hex_color = sanitize_hex_color( $term_meta_color );
									$color = ! empty( $sanitized_hex_color ) ? $sanitized_hex_color : '#000';
									$data  .= sprintf( '<span class="variable-item-span variable-item-span-%s" style="background-color:%s;"></span>', esc_attr( $type ), esc_attr( $color ) );
								}
								break;

							case 'button':
								$data .= sprintf( '<span class="variable-item-span variable-item-span-%s">%s</span>', esc_attr( $type ), esc_html( $term->name ) );
								break;

							default:
								$data .= '';
								break;
						endswitch;
						$data .= '</li>';
					}
				}
			}
		}

		return $data;
	}

	function td_color_variation_attribute_options( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'options'          => false,
			'attribute'        => false,
			'product'          => false,
			'selected'         => false,
			'name'             => '',
			'id'               => '',
			'class'            => '',
			'type'             => '',
			'show_option_none' => 'Choose an option'
		) );

		$type                  = $args[ 'type' ];
		$options               = $args[ 'options' ];
		$product               = $args[ 'product' ];
		$attribute             = $args[ 'attribute' ];
		$name                  = $args[ 'name' ] ? $args[ 'name' ] : wc_variation_attribute_name( $attribute );
		$id                    = $args[ 'id' ] ? $args[ 'id' ] : sanitize_title( $attribute );
		$class                 = $args[ 'class' ];
		$show_option_none      = $args[ 'show_option_none' ] ? true : false;
		$show_option_none_text = $args[ 'show_option_none' ] ? $args[ 'show_option_none' ] : esc_html__( 'Choose an option', 'woocommerce' );

		if ( empty( $options ) && ! empty( $product ) && ! empty( $attribute ) ) {
			$attributes = $product->get_variation_attributes();
			$options    = $attributes[ $attribute ];
		}

		if ( $product && taxonomy_exists( $attribute ) ) {
			echo '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . ' hide woo-variation-raw-select woo-variation-raw-type-' . esc_attr( $type ) . '" style="display: none;" name="' . esc_attr( $name ) . '" data-attribute_name="' . esc_attr( wc_variation_attribute_name( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';
		} else {
			echo '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . '" name="' . esc_attr( $name ) . '" data-attribute_name="' . esc_attr( wc_variation_attribute_name( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';
		}

		if ( $args[ 'show_option_none' ] ) {
			echo '<option value="">' . esc_html( $show_option_none_text ) . '</option>';
		}

		if ( ! empty( $options ) ) {
			if ( $product && taxonomy_exists( $attribute ) ) {
				// Get terms if this is a taxonomy - ordered. We need the names too.
				$terms = wc_get_product_terms( $product->get_id(), $attribute, array( 'fields' => 'all' ) );

				foreach ( $terms as $term ) {
					if ( in_array( $term->slug, $options ) ) {
						echo '<option value="' . esc_attr( $term->slug ) . '" ' . selected( sanitize_title( $args[ 'selected' ] ), $term->slug, false ) . '>' . apply_filters( 'woocommerce_variation_option_name', $term->name ) . '</option>';
					}
				}
			} else {
				foreach ( $options as $option ) {
					// This handles < 2.4.0 bw compatibility where text attributes were not sanitized.
					$selected = sanitize_title( $args[ 'selected' ] ) === $args[ 'selected' ] ? selected( $args[ 'selected' ], sanitize_title( $option ), false ) : selected( $args[ 'selected' ], $option, false );
					echo '<option value="' . esc_attr( $option ) . '" ' . $selected . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option ) ) . '</option>';
				}
			}
		}

		echo '</select>';

		$content = $this->td_variable_item( $type, $options, $args );

		echo sprintf( '<ul class="variable-items-wrapper %s" data-attribute_name="%s">%s</ul>', trim( implode( ' ', array( "{$type}-variable-wrapper", "reselect-clear" ) ) ), esc_attr( wc_variation_attribute_name( $attribute ) ), $content );

	}

	function td_button_variation_attribute_options( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'options'          => false,
			'attribute'        => false,
			'product'          => false,
			'selected'         => false,
			'name'             => '',
			'id'               => '',
			'class'            => '',
			'type'             => '',
			'show_option_none' => 'Choose an option'
		) );

		$type                  = $args[ 'type' ];
		$options               = $args[ 'options' ];
		$product               = $args[ 'product' ];
		$attribute             = $args[ 'attribute' ];
		$name                  = $args[ 'name' ] ? $args[ 'name' ] : wc_variation_attribute_name( $attribute );
		$id                    = $args[ 'id' ] ? $args[ 'id' ] : sanitize_title( $attribute );
		$class                 = $args[ 'class' ];
		$show_option_none      = $args[ 'show_option_none' ] ? true : false;
		$show_option_none_text = $args[ 'show_option_none' ] ? $args[ 'show_option_none' ] : esc_html__( 'Choose an option', 'woocommerce' ); // We'll do our best to hide the placeholder, but we'll need to show something when resetting options.

		if ( empty( $options ) && ! empty( $product ) && ! empty( $attribute ) ) {
			$attributes = $product->get_variation_attributes();
			$options    = $attributes[ $attribute ];
		}

		if ( $product && taxonomy_exists( $attribute ) ) {
			echo '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . ' hide woo-variation-raw-select woo-variation-raw-type-' . esc_attr( $type ) . '" style="display:none" name="' . esc_attr( $name ) . '" data-attribute_name="' . esc_attr( wc_variation_attribute_name( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';
		} else {
			echo '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . '" name="' . esc_attr( $name ) . '" data-attribute_name="' . esc_attr( wc_variation_attribute_name( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';
		}

		if ( $args[ 'show_option_none' ] ) {
			echo '<option value="">' . esc_html( $show_option_none_text ) . '</option>';
		}

		if ( ! empty( $options ) ) {
			if ( $product && taxonomy_exists( $attribute ) ) {
				// Get terms if this is a taxonomy - ordered. We need the names too.
				$terms = wc_get_product_terms( $product->get_id(), $attribute, array( 'fields' => 'all' ) );

				foreach ( $terms as $term ) {
					if ( in_array( $term->slug, $options ) ) {
						echo '<option value="' . esc_attr( $term->slug ) . '" ' . selected( sanitize_title( $args[ 'selected' ] ), $term->slug, false ) . '>' . apply_filters( 'woocommerce_variation_option_name', $term->name ) . '</option>';
					}
				}
			} else {
				foreach ( $options as $option ) {
					// This handles < 2.4.0 bw compatibility where text attributes were not sanitized.
					$selected = sanitize_title( $args[ 'selected' ] ) === $args[ 'selected' ] ? selected( $args[ 'selected' ], sanitize_title( $option ), false ) : selected( $args[ 'selected' ], $option, false );
					echo '<option value="' . esc_attr( $option ) . '" ' . $selected . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option ) ) . '</option>';
				}
			}
		}

		echo '</select>';

		$content = $this->td_variable_item( $type, $options, $args );

		echo sprintf( '<ul class="variable-items-wrapper %s" data-attribute_name="%s">%s</ul>', trim( implode( ' ', array( "{$type}-variable-wrapper", "reselect-clear" ) ) ), esc_attr( wc_variation_attribute_name( $attribute ) ), $content );
	}

}