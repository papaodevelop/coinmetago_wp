<?php

class td_woo_util {

	/**
	 * @var bool
	 */
	private static $is_ajax;

	private static $favourite_products;

	const FAVOURITE_COOKIE_ID = 'tdw_favourites';

	/**
	 * @param $state
	 */
	public static function set_is_ajax( $state ) {
		if ( isset( self::$is_ajax ) ) {
			echo 'The td_woo_util::$is_ajax is already set';
		}
		self::$is_ajax = $state;
	}

	/**
	 * return true if we are in an ajax request done by td woo.
	 * @return bool
	 */
	public static function is_ajax() {
		if ( ! isset( self::$is_ajax ) ) {
			echo 'The td_woo_util::$is_ajax is NOT set';
		}
		return self::$is_ajax;
	}

	public static function get_get_val($_get_name) {
		if ( isset( $_GET[$_get_name] ) ) {
			return esc_html($_GET[$_get_name]); // xss - no html in get
		}

		return false;
	}

	public static function pre_print_r( $expression, $return = null ) {
	    echo '<pre class="td-container" style="white-space: pre-wrap; word-break: break-all;">';
	    print_r( $expression, $return );
	    echo '</pre>';
	}

	public static function pre_var_dump( $expression ) {
	    echo '<pre class="td-container" style="white-space: pre-wrap; word-break: break-all;">';
		var_dump( $expression );
	    echo '</pre>';
	}

	/**
	 * generates a category tree, only on /wp_admin/, ..uses a buffer
	 * @param bool $add_all_category = if true adds - All categories - at the beginning of the list (used for dropdowns)
	 * @return array
	 */
	private static $td_products_categories2id_array_walker_buffer = array();
	static function products_categories2id_array( $add_all_category = true ) {

		if ( is_admin() === false ) {
			return array();
		}

		if ( !taxonomy_exists( 'product_cat' ) ) {

			if ( empty( self::$td_products_categories2id_array_walker_buffer ) ) {

				global $wpdb;

				// check db for product categories .. at this point when we need to create de available product categories select for the tdc sidebar the woocommerce 'product_cat' is not yet registered so we look for them in the db..
				$product_categories = $wpdb->get_results("
                    SELECT *
                    FROM $wpdb->terms AS terms
                    LEFT JOIN $wpdb->term_taxonomy AS term_taxonomy ON terms.term_id = term_taxonomy.term_id
                    WHERE term_taxonomy.taxonomy = 'product_cat'
                ");

				$td_products_categories2id_array_walker = new td_products_categories2id_array_walker;
				$td_products_categories2id_array_walker->walk( $product_categories, 4 );
				self::$td_products_categories2id_array_walker_buffer = $td_products_categories2id_array_walker->td_array_buffer;

			}

		} else {
			if ( empty( self::$td_products_categories2id_array_walker_buffer ) ) {

				$product_categories = get_categories( array(
					'taxonomy'     => 'product_cat',
					'orderby'      => 'name',
					'show_count'   => 0,
					'pad_counts'   => 0,
					'hierarchical' => 1,
					'title_li'     => '',
					'hide_empty'   => 0,
					'number' => 1500
				) );

				$td_products_categories2id_array_walker = new td_products_categories2id_array_walker;
				$td_products_categories2id_array_walker->walk( $product_categories, 4 );
				self::$td_products_categories2id_array_walker_buffer = $td_products_categories2id_array_walker->td_array_buffer;

			}
		}

		if ( $add_all_category === true ) {
			return array_merge(
				array( '- All categories -' => '' ),
				self::$td_products_categories2id_array_walker_buffer
			);
		} else {
			return self::$td_products_categories2id_array_walker_buffer;
		}
	}

	static function add_term_meta( $taxonomy, $post_type, $fields ) {
		return new td_woo_term_meta( $taxonomy, $post_type, $fields );
	}

	public static function td_get_attribute_taxonomy( $attribute_name ) {
		global $wpdb;
		$attribute_name = str_replace( 'pa_', '', wc_sanitize_taxonomy_name( $attribute_name ) );
		return $wpdb->get_row( "SELECT * FROM " . $wpdb->prefix . "woocommerce_attribute_taxonomies WHERE attribute_name='{$attribute_name}'" );
	}

	static function get_favourite_products() {
	    if (isset(self::$favourite_products)) {
	        return self::$favourite_products;
	    }
	    self::$favourite_products = [];
	    if ( empty($_COOKIE[self::FAVOURITE_COOKIE_ID]) || empty( $cookie_val = $_COOKIE[self::FAVOURITE_COOKIE_ID] ) ) {
            return self::$favourite_products;
        }
        $cookie_val = explode( ',', $cookie_val );
	    foreach ($cookie_val as $val ) {
	        if (!empty($val)) {
	            self::$favourite_products[] = intval($val);
            }
        }

	    return self::$favourite_products;
    }

	static function is_product_favourite( $product_id ) {
	    if ( isset( self::$favourite_products ) ) {
	        return in_array( $product_id, self::$favourite_products );
        } else {
	        if ( empty( $_COOKIE[self::FAVOURITE_COOKIE_ID] ) || empty( $cookie_val = $_COOKIE[self::FAVOURITE_COOKIE_ID] ) ) {
	            self::$favourite_products = [];
	            return false;
            }
            if ( in_array($product_id, self::$favourite_products = explode( ',', $cookie_val ) ) ) {
	            return true;
            }
        }
    }
}

class td_products_categories2id_array_walker extends Walker {
	var $tree_type = 'category';
	var $db_fields = array ('parent' => 'parent', 'id' => 'term_id');

	var $td_array_buffer = array();

	function start_lvl( &$output, $depth = 0, $args = array() ) {}

	function end_lvl( &$output, $depth = 0, $args = array() ) {}

	function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
		$this->td_array_buffer[str_repeat(' - ', $depth) .  $category->name . ' - [ id: ' . $category->term_id . ' ]' ] = $category->term_id;
	}

	function end_el( &$output, $page, $depth = 0, $args = array() ) {}

}

class td_woo_term_meta {

	private $taxonomy;
	private $post_type;
	private $fields = array();

	public function __construct( $taxonomy, $post_type, $fields = array() ) {

		$this->taxonomy  = $taxonomy;
		$this->post_type = $post_type;
		$this->fields    = $fields;

		// Category/term ordering
		// add_action( 'create_term', array( $this, 'create_term' ), 5, 3 );

		add_action( 'delete_term', array( $this, 'delete_term' ), 5, 4 );

		// Add form
		add_action( "{$this->taxonomy}_add_form_fields", array( $this, 'add' ) );
		add_action( "{$this->taxonomy}_edit_form_fields", array( $this, 'edit' ), 10 );
		add_action( "created_term", array( $this, 'save' ), 10, 3 );
		add_action( "edit_term", array( $this, 'save' ), 10, 3 );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		// Add columns
		add_filter( "manage_edit-{$this->taxonomy}_columns", array( $this, 'taxonomy_columns' ) );
		add_filter( "manage_{$this->taxonomy}_custom_column", array( $this, 'taxonomy_column' ), 10, 3 );

	}

	public function taxonomy_columns( $columns ) {
		$new_columns = array();

		if ( isset( $columns['cb'] ) ) {
			$new_columns['cb'] = $columns['cb'];
		}

		$new_columns['td-woo-meta-preview'] = '';

		if ( isset( $columns['cb'] ) ) {
			unset( $columns['cb'] );
		}

		return array_merge( $new_columns, $columns );
	}

	public function taxonomy_column( $columns, $column, $term_id ) {
		//$attribute = $this->get_wc_attribute_taxonomy();

        $type = $this->fields[0]['type'];

        switch ( $type ) {
            case 'color':
	            $value = sanitize_hex_color( get_term_meta( $term_id, $this->fields[0]['id'], true ) );

	            if ( empty( $value ) ) { // if we don't have a color set .. also check for an image and show it
		            $attachment_id = absint( get_term_meta( $term_id, 'product_attribute_color_image', true ) );
		            $image = wp_get_attachment_image_src( $attachment_id, 'thumbnail' );

		            if ( is_array( $image ) ) {
			            printf( '<img src="%s" alt="" width="%d" height="%d" class="td-woo-preview td-woo-image-preview" />', esc_url( $image[0] ), $image[1], $image[2] );
		            } else {
			            printf( '<div class="td-woo-preview td-woo-color-preview" style="background-color:%s;"></div>', esc_attr( $value ) );
		            }
                } else {
		            printf( '<div class="td-woo-preview td-woo-color-preview" style="background-color:%s;"></div>', esc_attr( $value ) );
	            }
            break;
            case 'image':
	            $attachment_id = absint( get_term_meta( $term_id, $this->fields[0]['id'], true ) );
	            $image         = wp_get_attachment_image_src( $attachment_id, 'thumbnail' );
	            if ( is_array( $image ) ) {
		            printf( '<img src="%s" alt="" width="%d" height="%d" class="td-woo-preview td-woo-image-preview" />', esc_url( $image[ 0 ] ), $image[ 1 ], $image[ 2 ] );
	            }
            break;
	        default:
            break;
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
		wp_enqueue_media();
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
        // load the js
        if ( TD_WOO_DEPLOY_MODE == 'dev' ) {
            tdc_util::enqueue_js_files_array( td_woo_config::$js_admin_files, array( 'jquery' ), TD_WOO_URL, TD_WOO );
        } else {
            wp_enqueue_script( 'td_woo_admin_js', TD_WOO_URL . '/assets/js/js_admin_files.min.js', array( 'jquery' ), TD_WOO, true );
        }
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
					<input name="<?php echo $field['id'] ?>" id="<?php echo $field['id'] ?>" type="text" class="td-woo-color-picker" value="<?php echo $field['value'] ?>" data-default-color="<?php echo $field['value'] ?>" size="<?php echo $field['size'] ?>" <?php echo $field['required'] . $field['placeholder'] ?>>
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
                                <button type="button" class="wvs_upload_image_button button button-small">Upload / Add image</button>
                                <button type="button" style="<?php echo( empty( $field['value'] ) ? 'display:none' : '' ) ?>" class="wvs_remove_image_button button button-danger button-small">Remove image</button>
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
