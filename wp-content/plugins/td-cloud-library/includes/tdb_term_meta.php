<?php

class tdb_term_meta {

	private $taxonomy;
	private $post_type;
	private $fields;

	public function __construct( $taxonomy, $post_type, $fields = array(), $add_tax_column_data = true ) {

		$this->taxonomy  = $taxonomy;
		$this->post_type = $post_type;
		$this->fields    = $fields;

		// category/term ordering
		// add_action( 'create_term', array( $this, 'create_term' ), 5, 3 );

		add_action( 'delete_term', array( $this, 'delete_term' ), 5, 4 );

		// add form
		add_action( "{$this->taxonomy}_add_form_fields", array( $this, 'add' ) );
		add_action( "{$this->taxonomy}_edit_form_fields", array( $this, 'edit' ), 10 );
		add_action( "created_term", array( $this, 'save' ), 10, 3 );
		add_action( "edit_term", array( $this, 'save' ), 10, 3 );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		// add columns
		add_filter( "manage_edit-{$this->taxonomy}_columns", array( $this, 'taxonomy_columns' ) );

		// add columns data
		if ( $add_tax_column_data ) {
            add_filter( "manage_{$this->taxonomy}_custom_column", array( $this, 'taxonomy_column' ), 10, 3 );
            add_filter( "manage_{$this->taxonomy}_custom_column", array( $this, 'taxonomy_column' ), 10, 3 );
	    }

	}

	public function taxonomy_columns( $columns ) {
		$new_columns = array();

		if ( isset( $columns['cb'] ) ) {
			$new_columns['cb'] = $columns['cb'];
		}

		$new_columns['tdb-tax-term-meta-preview-color'] = 'Color';
		$new_columns['tdb-tax-term-meta-preview-img'] = 'Image';
		$new_columns['tdb-tax-term-meta-id'] = 'ID';

		if ( isset( $columns['cb'] ) ) {
			unset( $columns['cb'] );
		}

		return array_merge( $new_columns, $columns );
	}

	public function taxonomy_column( $columns, $column, $term_id ) {

		foreach ( $this->fields as $field ) {
			$type = $field['type'];

			if ( $type === 'color' && $column === 'tdb-tax-term-meta-preview-color' ) {
				$value = sanitize_hex_color( get_term_meta( $term_id, $field['id'], true ) );
				if ( empty( $value ) ) {
					$attachment_id = absint( get_term_meta( $term_id, 'tdb_filter_color_image', true ) );
					$image = wp_get_attachment_image_src( $attachment_id );
					if ( is_array( $image ) ) {
						printf( '<img src="%s" alt="" width="%d" height="%d" class="tdb-preview td-woo-image-preview" />', esc_url( $image[0] ), $image[1], $image[2] );
					} else {
						printf( '<div class="tdb-preview td-woo-color-preview" style="background-color:%s;"></div>', esc_attr( $value ) );
					}
				} else {
					printf( '<div class="tdb-preview td-woo-color-preview" style="background-color:%s;"></div>', esc_attr( $value ) );
				}
			}

			if ( $type === 'image' && $column === 'tdb-tax-term-meta-preview-img' ) {
				$attachment_id = absint( get_term_meta( $term_id, $field['id'], true ) );
				$image = wp_get_attachment_image_src( $attachment_id );
				if ( is_array( $image ) ) {
					printf( '<img src="%s" alt="" width="%d" height="%d" class="tdb-preview td-woo-image-preview" />', esc_url( $image[0] ), $image[1], $image[2] );
				} else {
					printf( '<img src="%s" alt="" class="tdb-preview td-woo-image-preview" style="border: 1px solid #8c8f94; border-radius: 4px; box-shadow: 0 0 0 transparent;" />', esc_url( self::get_img_src() ) );
				}
			}

        }

        if ( $column === 'tdb-tax-term-meta-id' ) {
            echo $term_id ;
        }
	}

	public function delete_term( $term_id, $tt_id, $taxonomy, $deleted_term ) {
		global $wpdb;

		$term_id = absint( $term_id );
		if ( $term_id and $taxonomy == $this->taxonomy ) {
			$wpdb->delete( $wpdb->termmeta, array( 'term_id' => $term_id ), array( '%d' ) );
		}
	}

	public function enqueue_scripts() {

		// load styles
		if ( TDB_DEPLOY_MODE == 'dev' ) {
			wp_enqueue_style( 'tdb_wp_admin_taxonomies', TDB_URL . '/td_less_style.css.php?part=wp_admin_taxonomies', false, TD_CLOUD_LIBRARY );
		} else {
			wp_enqueue_style( 'tdb_wp_admin_taxonomies', TDB_URL . '/assets/css/tdb_wp_admin_taxonomies.css', false, TD_CLOUD_LIBRARY );
		}

		wp_enqueue_media();
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );

	}

	public function save( $term_id, $tt_id = '', $taxonomy = '' ) {

		if ( $taxonomy == $this->taxonomy ) {
			foreach ( $this->fields as $field ) {
				foreach ( $_POST as $post_key => $post_value ) {
					if ( $field['id'] == $post_key ) {
						switch ( $field['type'] ) {
							case 'color':
								$post_value = esc_html( $post_value );
								break;
							case 'image':
								$post_value = absint( $post_value );
								break;
							default:
								break;
						}
						update_term_meta( $term_id, $field['id'], $post_value );
					}
				}
			}
		}
	}

	public function add() {
		$this->generate_fields(false, 'add' );
	}

	private function generate_fields( $term = false, $action = '' ) {

		$screen = get_current_screen();

		if ( ( $screen->post_type == $this->post_type ) and ( $screen->taxonomy == $this->taxonomy ) ) {
			self::generate_form_fields( $this->fields, $term, $action );
		}
	}

	public static function generate_form_fields( $fields, $term, $action ) {

		if ( empty( $fields ) ) {
			return;
		}

		foreach ( $fields as $field ) {

			$field['id'] = esc_html( $field['id'] );

			if ( ! $term ) {
				$field['value'] = isset( $field['default'] ) ? $field['default'] : '';
			} else {
				$field['value'] = get_term_meta( $term->term_id, $field['id'], true );
			}

			$field['size']        = $field['size'] ?? '40';
			$field['required']    = ( isset( $field['required'] ) and $field['required'] == true ) ? ' aria-required="true"' : '';
			$field['placeholder'] = ( isset( $field['placeholder'] ) ) ? ' placeholder="' . $field['placeholder'] . '" data-placeholder="' . $field['placeholder'] . '"' : '';
			$field['desc']        = ( isset( $field['desc'] ) ) ? $field['desc'] : '';

			self::field_start( $field, $term, $action );
			switch ( $field['type'] ) {
				case 'color':
					ob_start();
					?>
					<input name="<?php echo $field['id'] ?>" id="<?php echo $field['id'] ?>" type="text" class="tdb-tax-term-color-picker" value="<?php echo $field['value'] ?>" data-default-color="<?php echo $field['value'] ?>" size="<?php echo $field['size'] ?>" <?php echo $field['required'] . $field['placeholder'] ?>>
					<?php
					echo ob_get_clean();
					break;
				case 'image':
					ob_start();
					?>
					<div class="meta-image-field-wrapper">
						<div class="image-preview">
							<img
								data-placeholder="<?php echo esc_url( self::placeholder_img_src() ); ?>"
								src="<?php echo esc_url( self::get_img_src( $field['value'] ) ); ?>"
								width="60px"
								height="60px"
								style="border: 1px solid #8c8f94; border-radius: 4px; box-shadow: 0 0 0 transparent;"
							/>
						</div>
						<div class="button-wrapper">
							<input type="hidden" id="<?php echo $field['id'] ?>" name="<?php echo $field['id'] ?>" value="<?php echo esc_attr( $field['value'] ) ?>"/>
							<button type="button" class="tdb_upload_image_button button button-small">Upload / Add image</button>
							<button type="button" style="<?php echo( empty( $field['value'] ) ? 'display:none' : '' ) ?>" class="tdb_remove_image_button button button-danger button-small">Remove image</button>
						</div>
					</div>
					<?php
					echo ob_get_clean();
					break;
				default:
					break;

			}
			self::field_end( $field, $term, $action );

		}
	}

	private static function field_start( $field, $term, $action ) {
		ob_start();

		if ( $action === 'add' ) {
			?>
			<div class="form-field term-<?php echo esc_attr( $field['type'] ) ?>-wrap">
			<label for="<?php echo esc_attr( $field['id'] ) ?>"><?php echo $field['label'] ?></label>

			<?php
		} elseif ( $action === 'edit' ) {
			?>

			<tr class="form-field  <?php echo esc_attr( $field['id'] ) ?> <?php echo empty( $field['required'] ) ? '' : 'form-required' ?>">
			<th scope="row">
				<label for="<?php echo esc_attr( $field['id'] ) ?>"><?php echo $field['label'] ?></label>
			</th>
			<td>

			<?php
		}

		echo ob_get_clean();
	}

	private static function get_img_src( $thumbnail_id = false ) {
		if ( ! empty( $thumbnail_id ) ) {
			$image = wp_get_attachment_thumb_url( $thumbnail_id );
		} else {
			$image = self::placeholder_img_src();
		}

		return $image;
	}

	private static function placeholder_img_src() {
		return TDC_URL_LEGACY_COMMON . '/wp_booster/wp-admin/images/panel/no_img_upload.png';
	}

	private static function field_end( $field, $term, $action ) {
		ob_start();

		if ( $action === 'add' ) {
			?>
			<p class="description"><?php echo $field['desc'] ?></p>
			</div>

			<?php
		} elseif ( $action === 'edit' ) {
			?>

			<p class="description"><?php echo $field['desc'] ?></p></td>
			</tr>

			<?php
		}

		echo ob_get_clean();
	}

	public function edit( $term ) {
		$this->generate_fields( $term, 'edit' );
	}

	//public function get_wc_attribute_taxonomy() {
	//    global $wpdb;
	//    $attribute_name = str_replace( 'pa_', '', wc_sanitize_taxonomy_name( $this->taxonomy ) );
	//    return $wpdb->get_row( "SELECT * FROM " . $wpdb->prefix . "woocommerce_attribute_taxonomies WHERE attribute_name='{$attribute_name}'" );
	//}

	//public function get_taxonomy_meta_fields() {
	//    return $this->fields;
	//}

}