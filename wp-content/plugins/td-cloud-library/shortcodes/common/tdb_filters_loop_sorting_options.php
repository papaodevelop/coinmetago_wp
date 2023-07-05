<?php

/**
 * Class tdb_filters_loop_sorting_options - sorting options dropdown shortcode for tdb filters loop
 */
class tdb_filters_loop_sorting_options extends td_block {

    public function get_custom_css() {
        // $unique_block_class
        $unique_block_class = $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>
            
                /* @general_style_tdb_filters_loop_sorting_options */
                .tdb_filters_loop_sorting_options .tdb-block-inner {
                    display: flex;
                    align-items: center;
                    flex-wrap: wrap;
                }
                .tdb_filters_loop_sorting_options .woocommerce-result-count,
                .tdb_filters_loop_sorting_options .tdb-filters-loop-sorting-options-form {
                    margin-bottom: 0;
                }
                .tdb_filters_loop_sorting_options .woocommerce-result-count {
                    flex: 1;
                }
                .tdb_filters_loop_sorting_options .tdb-filters-loop-sorting-options-form {
                    position: relative;
                    width: 280px; 
                }
                .tdb_filters_loop_sorting_options .tdb-filters-loop-sorting-options-form:after {
                    content: '\\e801';
                    position: absolute;
                    top: 50%;
                    transform: translateY(-50%);
                    right: 9px;
                    font-family: 'newspaper';
                    font-size: 14px;
                }
                .tdb_filters_loop_sorting_options .tdb-filters-loop-sorting-options-form select {
                    width: 100%;
                    padding: 5px 9px;
                    border-radius: 0;
                    border-color: #bfbfbf;
                    -webkit-appearance: none;
                    outline: none !important;
                    cursor: pointer;
                }
                
                /* @drop_left */
                body .$unique_block_class .tdb-block-inner {
                    justify-content: flex-start;
                }
                /* @drop_center */
                body .$unique_block_class .tdb-block-inner {
                    justify-content: center;
                }/* @drop_right */
                body .$unique_block_class .tdb-block-inner {
                    justify-content: flex-end;
                }
                
                /* @drop_width */
                body .$unique_block_class .tdb-filters-loop-sorting-options-form {
                    width: @drop_width;
                }
                /* @drop_padding */
                body .$unique_block_class .tdb-filters-loop-sorting-options-form select {
                    padding: @drop_padding;
                }
                /* @drop_arrow_size */
                body .$unique_block_class .tdb-filters-loop-sorting-options-form:after {
                    font-size: @drop_arrow_size;
                }
                /* @drop_border */
                body .$unique_block_class .tdb-filters-loop-sorting-options-form select {
                    border-width: @drop_border;
                }
                /* @drop_border_style */
                body .$unique_block_class .tdb-filters-loop-sorting-options-form select {
                    border-style: @drop_border_style;
                }
                /* @drop_border_radius */
                body .$unique_block_class .tdb-filters-loop-sorting-options-form select {
                    border-radius: @drop_border_radius;
                }
                
                /* @drop_color */
                body .$unique_block_class .tdb-filters-loop-sorting-options-form select {
                    color: @drop_color;
                }
                /* @drop_arrow_color */
                body .$unique_block_class .tdb-filters-loop-sorting-options-form:after {
                    color: @drop_arrow_color;
                }
                /* @drop_bg_color */
                body .$unique_block_class .tdb-filters-loop-sorting-options-form select {
                    background-color: @drop_bg_color;
                }
                /* @drop_bg_color_f */
                body .$unique_block_class .tdb-filters-loop-sorting-options-form select:active,
                body .$unique_block_class .tdb-filters-loop-sorting-options-form select:focus {
                    background-color: @drop_bg_color_f;
                }
                /* @drop_border_color */
                body .$unique_block_class .tdb-filters-loop-sorting-options-form select {
                    border-color: @drop_border_color;
                }
                /* @drop_border_color_f */
                body .$unique_block_class .tdb-filters-loop-sorting-options-form select:active,
                body .$unique_block_class .tdb-filters-loop-sorting-options-form select:focus {
                    border-color: @drop_border_color_f;
                }
                
                /* @f_drop */
                body .$unique_block_class .tdb-filters-loop-sorting-options-form select {
                    @f_drop
                }
            
            </style>";

        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        // general style
        $res_ctx->load_settings_raw('general_style_tdb_filters_loop_sorting_options', 1);

        // drop horiz align
        $drop_horiz = $res_ctx->get_shortcode_att( 'drop_horiz' );
        if( $drop_horiz == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'drop_left', 1 );
        } else if( $drop_horiz == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'drop_center', 1 );
        } else if( $drop_horiz == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'drop_right', 1 );
        }
        
        // dropdown width
        $drop_width = $res_ctx->get_shortcode_att('drop_width');
        $res_ctx->load_settings_raw( 'drop_width', $drop_width );
        if( $drop_width != '' && is_numeric( $drop_width ) ) {
            $res_ctx->load_settings_raw( 'drop_width', $drop_width . 'px' );
        }
        // dropdown padding
        $drop_padding = $res_ctx->get_shortcode_att('drop_padding');
        $res_ctx->load_settings_raw( 'drop_padding', $drop_padding );
        if( $drop_padding != '' && is_numeric( $drop_padding ) ) {
            $res_ctx->load_settings_raw( 'drop_padding', $drop_padding . 'px' );
        }
        // dropdown arrow size
        $drop_arrow_size = $res_ctx->get_shortcode_att('drop_arrow_size');
        $res_ctx->load_settings_raw( 'drop_arrow_size', $drop_arrow_size );
        if( $drop_arrow_size != '' && is_numeric( $drop_arrow_size ) ) {
            $res_ctx->load_settings_raw( 'drop_arrow_size', $drop_arrow_size . 'px' );
        }
        // dropdown border size
        $drop_border = $res_ctx->get_shortcode_att('drop_border');
        $res_ctx->load_settings_raw( 'drop_border', $drop_border );
        if( $drop_border != '' && is_numeric( $drop_border ) ) {
            $res_ctx->load_settings_raw( 'drop_border', $drop_border . 'px' );
        }
        // dropdown border style
        $drop_border_style = $res_ctx->get_shortcode_att('drop_border_style');
        $res_ctx->load_settings_raw( 'drop_border_style', $drop_border_style );
        if( $drop_border_style == '' ) {
            $res_ctx->load_settings_raw( 'drop_border_style', 'solid' );
        }
        // dropdown border radius
        $drop_border_radius = $res_ctx->get_shortcode_att('drop_border_radius');
        $res_ctx->load_settings_raw( 'drop_border_radius', $drop_border_radius );
        if( $drop_border_radius != '' && is_numeric( $drop_border_radius ) ) {
            $res_ctx->load_settings_raw( 'drop_border_radius', $drop_border_radius . 'px' );
        }

        /*-- COLORS -- */
        $res_ctx->load_settings_raw( 'drop_color', $res_ctx->get_shortcode_att('drop_color') );
        $res_ctx->load_settings_raw( 'drop_arrow_color', $res_ctx->get_shortcode_att('drop_arrow_color') );
        $res_ctx->load_settings_raw( 'drop_bg_color', $res_ctx->get_shortcode_att('drop_bg_color') );
        $res_ctx->load_settings_raw( 'drop_bg_color_f', $res_ctx->get_shortcode_att('drop_bg_color_f') );
        $res_ctx->load_settings_raw( 'drop_border_color', $res_ctx->get_shortcode_att('drop_border_color') );
        $res_ctx->load_settings_raw( 'drop_border_color_f', $res_ctx->get_shortcode_att('drop_border_color_f') );

        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_drop' );
    }
    
    function __construct() {
        parent::disable_loop_block_features();
    }

    function render( $atts, $content = null ) {

        parent::render($atts);

		// orderby options
	    $orderby_options = array();

        // current
	    $orderby = isset( $_GET['tdb-loop-orderby'] ) ? tdb_util::clean( wp_unslash( $_GET['tdb-loop-orderby'] ) ) : '';

	    // default sorting options
	    $default_tdb_filters_loop_sorting_options = array(
		    'Latest' => '',
		    'Oldest posts' => 'oldest_posts',
		    'Modified date' => 'modified_date',
		    'Alphabetical A -> Z' => 'alphabetical_order'
	    );

	    // apply the loop_sorting_options filters
	    $tdb_filters_loop_sorting_options = apply_filters( 'tdb_filters_loop_sorting_options', $default_tdb_filters_loop_sorting_options );

	    // make sure the filtered value is a flat array of primitive values
	    if ( is_array( $tdb_filters_loop_sorting_options ) &&
	         count( $tdb_filters_loop_sorting_options ) == count( $tdb_filters_loop_sorting_options, COUNT_RECURSIVE )
	    ) {

		    foreach ( $tdb_filters_loop_sorting_options as $op_name => $op_val ) {

			    if ( empty( $op_val ) && $op_name === 'Latest' ) {
				    $orderby_options[$op_val] = $op_name;
				    continue;
                }

			    if ( $this->get_att( $op_val ) === 'yes' ) {
				    $orderby_options[$op_val] = $op_name;
                }
		    }

	    }

	    $buffy = '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';

            // get the block css
            $buffy .= $this->get_block_css();

            // get the js for this block
            $buffy .= $this->get_block_js();

            $buffy .= '<div class="tdb-block-inner td-fix-index">';

		    // render the block js
		    ob_start();
		    ?>
		    <script>
	            jQuery().ready( function () {

                    var blockjQueryObj = jQuery('.<?php echo $this->block_uid ?> .tdb-filters-loop-sorting-options-form');

                    blockjQueryObj.on( 'change', 'select.tdb-loop-orderby', function() {
                        jQuery(this).closest('form').trigger( 'submit' );
                    });

                    // var selected = jQuery( "option:selected", blockjQueryObj );
                    // if ( !selected.val() ) {
                    //     var uri = window.location.href,
                    //         key = 'tdb-loop-orderby',
                    //         re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
                    //
                    //     // update url
                    //     window.history.replaceState( {}, document.title, uri.replace( re, '$1' ).replace( /[&|?]\s*$/, '' ) );
                    //
                    // }

	            });
		    </script>
		    <?php
		    td_js_buffer::add_to_footer("\n" . td_util::remove_script_tag( ob_get_clean() ) );

	            $buffy .= '<form class="tdb-filters-loop-sorting-options-form" method="get">';

		            $buffy .= '<select name="tdb-loop-orderby" class="tdb-loop-orderby">';
						foreach ( $orderby_options as $id => $name ) {
							$value = esc_attr( $id );
							$selected = selected( $orderby, $id, false );
							$name = esc_html( __td($name, TD_THEME_NAME) );

							$buffy .= '<option value="' . $value . '" ' . $selected . '>' . $name . '</option>';

						}
		            $buffy .= '</select>';

		            //$buffy .= '<input type="hidden" name="paged" value="1" />';

		            $buffy .= $this->query_string_form_fields( null, array( 'tdb-loop-orderby', 'tdb-loop-page' ) );

	            $buffy .= '</form>';

            $buffy .= '</div>';

        $buffy .= '</div>';

        return $buffy;
    }

	function query_string_form_fields( $values = null, $exclude = array(), $current_key = '' ) {

		if ( is_null( $values ) ) {
			$values = $_GET;
		}
		$output = '';

		foreach ( $values as $key => $value ) {
			if ( in_array( $key, $exclude, true ) ) {
				continue;
			}
			if ( $current_key ) {
				$key = $current_key . '[' . $key . ']';
			}
			if ( is_array( $value ) ) {
				$output .= $this->query_string_form_fields( $value, $exclude, $key );
			} else {
				$output .= '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( wp_unslash( $value ) ) . '" />';
			}
		}

		return $output;
	}

}

