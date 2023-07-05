<?php

/**
 * Class tdb_filters_list - shortcode for rendering the td_woo_attribute_filter shortcode active filters list
 */
class tdb_filters_list extends td_block {

	public function get_custom_css() {

		// $unique_block_class
		$unique_block_class = $this->block_uid;

		$compiled_css = '';

		$raw_css =
			"<style>
            
                /* @style_general_tdb_filters_list */   
                .tdb_filters_list {
                    margin-bottom: 0;
                }  
                .tdb_filters_list .remove {
                    display: flex;
                    align-items: center;
                }             
                .tdb_filters_list ul {
                    display: flex;
                    flex-wrap: wrap;
                    margin: 0;
                }
                .tdb_filters_list li {
                    padding: 8px 10px;
                    box-shadow: inset 0 0 0 1px #dfdfdf;
                    margin: 3px 6px 3px 0;
                    font-size: 14px;
                    list-style: none;
                    line-height: 1;
                    transition: all .2s ease;
                    -webkit-transition: all .2s ease;
                }
                .tdb_filters_list a {
                    color: #000;
                }
                .tdb_filters_list i {
                    font-size: 11px;
                    margin-left: 8px;
                }
                .tdb_filters_list svg {
                    margin-left: 8px;
                    width: 11px;
                    height: auto;
                }
                
                /* @filters_horiz_align */
                .$unique_block_class ul {
                    justify-content: @filters_horiz_align;
                }
                .$unique_block_class li:last-child {
                    margin-right: 0;
                }
                /* @icon_size */
                .$unique_block_class i {
                    font-size: @icon_size;
                }
                .$unique_block_class svg {
                    width: @icon_size;
                }
                /* @icon_align */
                .$unique_block_class i,
                .$unique_block_class svg {
                    position: relative;
                    top: @icon_align;
                }
                /* @icon_align */
                .$unique_block_class i,
                .$unique_block_class svg {
                    position: relative;
                    top: @icon_align;
                }
                /* @icon_space */
                .$unique_block_class i,
                .$unique_block_class svg {
                    margin-left: @icon_space;
                }
                /* @but_margin */
                .$unique_block_class li {
                    margin: @but_margin;
                }
                /* @but_padd */
                .$unique_block_class li {
                    padding: @but_padd;
                }
                /* @but_wrap_padd */
                .$unique_block_class .tdb-filters-wrap {
                    padding: @but_wrap_padd;
                }
                /* @all_but_border */
                .$unique_block_class li {
                    box-shadow: inset 0 0 0 @all_but_border @all_but_border_c;
                }
                /* @all_but_border_s */
                .$unique_block_class li:hover {
                    box-shadow: inset 0 0 0 @all_but_border_s @all_but_border_c_h;
                }
                /* @but_radius */
                .$unique_block_class li {
                    border-radius: @but_radius;
                }
                /* @but_txt */
                .$unique_block_class a {
                    color: @but_txt;
                }
                /* @but_txt_h */
                .$unique_block_class li:hover a {
                    color: @but_txt_h;
                }
                /* @but_bg */
                .$unique_block_class li {
                    background-color: @but_bg;
                }
                /* @but_bg_h */
                .$unique_block_class li:hover {
                    background-color: @but_bg_h;
                }
                /* @all_but_border_c */
                .$unique_block_class li {
                    box-shadow: inset 0 0 0 @all_but_border @all_but_border_c;
                }
                /* @all_but_border_c_h */
                .$unique_block_class li:hover {
                    box-shadow: inset 0 0 0 @all_but_border_s @all_but_border_c_h;
                }
                /* @close_color */
                .$unique_block_class i {
                    color: @close_color;
                }
                .$unique_block_class svg,
                .$unique_block_class svg * {
                    fill: @close_color;
                }
                /* @close_color_h */
                .$unique_block_class li:hover i {
                    color: @close_color_h;
                }
                .$unique_block_class li:hover svg,
                .$unique_block_class li:hover svg * {
                    fill: @close_color_h;
                }
                /* @f_but */
                .$unique_block_class a {
                    @f_but
                }
                
            </style>";

		$td_css_res_compiler = new td_css_res_compiler( $raw_css );
		$td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

		$compiled_css .= $td_css_res_compiler->compile_css();

		return $compiled_css;

	}

	static function cssMedia( $res_ctx ) {

		// general style
		$res_ctx->load_settings_raw( 'style_general_tdb_filters_list', 1 );

		$icon_size = $res_ctx->get_shortcode_att('icon_size');
		if ( $icon_size != '' && is_numeric($icon_size) ) {
			$res_ctx->load_settings_raw( 'icon_size', $icon_size . 'px' );
		}

		$res_ctx->load_settings_raw('icon_align', $res_ctx->get_shortcode_att('icon_align') . 'px');

		$icon_space = $res_ctx->get_shortcode_att('icon_space');
		if ( $icon_space != '' && is_numeric($icon_space) ) {
			$res_ctx->load_settings_raw( 'icon_space', $icon_space . 'px' );
		}

		$but_margin = $res_ctx->get_shortcode_att('but_margin');
		$res_ctx->load_settings_raw( 'but_margin', $but_margin );
		if ( $but_margin != '' && is_numeric($but_margin) ) {
			$res_ctx->load_settings_raw( 'but_margin', $but_margin . 'px' );
		}

		$but_padd = $res_ctx->get_shortcode_att('but_padd');
		$res_ctx->load_settings_raw( 'but_padd', $but_padd );
		if ( $but_padd != '' && is_numeric($but_padd) ) {
			$res_ctx->load_settings_raw( 'but_padd', $but_padd . 'px' );
		}

		$but_wrap_padd = $res_ctx->get_shortcode_att('but_wrap_padd');
		$res_ctx->load_settings_raw( 'but_wrap_padd', $but_wrap_padd );
		if ( $but_wrap_padd != '' && is_numeric($but_wrap_padd) ) {
			$res_ctx->load_settings_raw( 'but_wrap_padd', $but_wrap_padd . 'px' );
		}

		$all_but_border = $res_ctx->get_shortcode_att('all_but_border');
		if( $all_but_border != '' ) {
			if( is_numeric( $all_but_border ) ) {
				$res_ctx->load_settings_raw( 'all_but_border', $all_but_border . 'px' );
			}
		} else {
			$res_ctx->load_settings_raw( 'all_but_border', '1px' );
		}

		$all_but_border_s = $res_ctx->get_shortcode_att('all_but_border_s');
		if( $all_but_border_s != '' ) {
			if( is_numeric( $all_but_border_s ) ) {
				$res_ctx->load_settings_raw( 'all_but_border_s', $all_but_border_s . 'px' );
			}
		} else {
			$res_ctx->load_settings_raw( 'all_but_border_s', '2px' );
		}

		$but_radius = $res_ctx->get_shortcode_att('but_radius');
		$res_ctx->load_settings_raw( 'but_radius', $but_radius );
		if ( $but_radius != '' && is_numeric($but_radius) ) {
			$res_ctx->load_settings_raw( 'but_radius', $but_radius . 'px' );
		}

		// filters_horiz_align
		$filters_horiz_align = $res_ctx->get_shortcode_att('filters_horiz_align');
		$res_ctx->load_settings_raw( 'filters_horiz_align', $filters_horiz_align );

		// colors
		$res_ctx->load_settings_raw( 'but_txt', $res_ctx->get_shortcode_att('but_txt') );
		$res_ctx->load_settings_raw( 'but_txt_h', $res_ctx->get_shortcode_att('but_txt_h') );
		$res_ctx->load_settings_raw( 'but_bg', $res_ctx->get_shortcode_att('but_bg') );
		$res_ctx->load_settings_raw( 'but_bg_h', $res_ctx->get_shortcode_att('but_bg_h') );
		$res_ctx->load_settings_raw( 'all_but_border_c', $res_ctx->get_shortcode_att('all_but_border_c') );
		$res_ctx->load_settings_raw( 'all_but_border_c_h', $res_ctx->get_shortcode_att('all_but_border_c_h') );
		$res_ctx->load_settings_raw( 'close_color', $res_ctx->get_shortcode_att('close_color') );
		$res_ctx->load_settings_raw( 'close_color_h', $res_ctx->get_shortcode_att('close_color_h') );

		$all_but_border_c = $res_ctx->get_shortcode_att('all_but_border_c');
		if( $all_but_border_c != '' ) {
			$res_ctx->load_settings_raw( 'all_but_border_c', $all_but_border_c );
		} else {
			$res_ctx->load_settings_raw( 'all_but_border_c', '#dfdfdf' );
		}
		$all_but_border_c_s = $res_ctx->get_shortcode_att('all_but_border_c_h');
		if( $all_but_border_c_s != '' ) {
			$res_ctx->load_settings_raw( 'all_but_border_c_h', $all_but_border_c_s );
		} else {
			$res_ctx->load_settings_raw( 'all_but_border_c_h', '#444' );
		}

		// fonts
		$res_ctx->load_font_settings( 'f_but' );

	}

	function __construct() {
		parent::disable_loop_block_features();
	}

	function render( $atts, $content = null ) {

        // get active filters
		$filters = $_GET;
		$active_filters = array();
		if( !empty( $filters ) && is_array( $filters ) ) {

			foreach ( $filters as $tax => $tax_terms_filters_list ) {

				// ignore filters not starting with 'tdb_'
				if ( strpos( $tax, 'tdb_' ) === false )
					continue;

				// taxonomy
				if ( strpos( $tax, 'tdb_tax' ) !== false ) {
					$taxonomy = str_replace( 'tdb_tax_', '', $tax );
					$taxonomy_data = get_taxonomy( $taxonomy );
					$tax_terms = array_map( 'sanitize_title', explode( ',', $tax_terms_filters_list ) );

                    // check taxonomy
                    if ( $taxonomy_data ) {

                        // tax data
	                    $active_filters[$taxonomy] = array();

	                    // check selected terms slugs
	                    $the_tax_term_array = array();
	                    foreach ( $tax_terms as $tax_term ) {
		                    $the_tax_term = get_term_by( 'slug', $tax_term, $taxonomy );
		                    if ( false !== $the_tax_term ) {
			                    $the_tax_term_array[] = $tax_term;
		                    }
	                    }

                    }

					// set taxonomy filter terms list
					$active_filters[$taxonomy] = implode( ',', $the_tax_term_array );

				}

			}

        }

		// add sample data
		if ( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) {
			$active_filters['sample_data'] = array( 'sample-filter', 'sample-filter-1', 'sample-filter-2' );
		}

		parent::render( $atts );

		$close_icon = $this->get_att('close_tdicon');
		if ( $close_icon == '' ) {
			$close_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 11 11"><path d="M9.494,10.489L5.5,6.495,1.506,10.489,0.511,9.494,4.505,5.5,0.511,1.506l0.995-.995L5.5,4.505,9.494,0.511l0.995,0.995L6.495,5.5l3.994,3.994Z"/></svg>';
		} else {
			$close_icon = td_util::get_icon_type( $close_icon, 'test');
		}


		$buffy = ''; // output buffer

		$buffy .= '<div class="' . $this->get_block_classes()  . '" ' . $this->get_block_html_atts() . '>';

            //get the block css
            $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();


            $buffy .= '<div class="tdb-block-inner td-fix-index">';

                // render block js
                ob_start();

                ?>
                <script>
                    jQuery().ready(function () {
                        var tdbFiltersListItem = new tdbFiltersList.item();

                        tdbFiltersListItem.blockUid = '<?php echo $this->block_uid; ?>';
                        tdbFiltersListItem.jqueryObj = jQuery('.<?php echo $this->block_uid ?>');

                        tdbFiltersListItem.closeIcon = '<?php echo $close_icon; ?>';

                        <?php if ( !empty( $active_filters['sample_data'] ) || ( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) ) { ?>
                            tdbFiltersListItem.sampleData = true;
                        <?php } ?>

                        <?php if ( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) { ?>
                            tdbFiltersListItem.inComposer = true;
                        <?php } ?>

                        tdbFiltersList.addItem( tdbFiltersListItem );
                    });
                </script>
                <?php

                td_js_buffer::add_to_footer("\n" . td_util::remove_script_tag( ob_get_clean() ) );

                // process filters
                if ( !empty( $active_filters['sample_data'] ) ) { // sample filters

                    $buffy .= '<div class="tdb-filters-wrap">';
                        $buffy .= '<ul>';
                            foreach ( $active_filters['sample_data'] as $sample_filter ) {
                                $buffy .= '<li><a href="#" class="no-click"><span class="remove">' . $sample_filter . $close_icon . '</span></a></li>';
                            }
                        $buffy .= '</ul>';
                    $buffy .= '</div>';

                } elseif ( !empty( $active_filters ) ) {  // selected(active) filters
                    $buffy .= '<div class="tdb-filters-wrap">';
                        $buffy .= '<ul>';
                            foreach ( $active_filters as $tax => $tax_term_filters_list ) {
                                $tax_term_filters = explode( ',', $tax_term_filters_list );
                                if ( $tax_term_filters ) {
                                    foreach ( $tax_term_filters as $filter ) {
                                        $filter_data = get_term_by( 'slug', $filter, $tax );
                                        if ( $filter_data ) {
                                            $buffy .= '<li>';
                                                $buffy .= '<a href="#" data-tax="tdb_tax_' . $tax . '" data-term-slug="' . $filter . '" data-term-name="' . $filter_data->name . '">';
                                                    $buffy .= '<span class="remove">' . $filter_data->name . $close_icon . '</span>';
                                                $buffy .= '</a>';
                                            $buffy .= '</li>';
                                        }
                                    }
                                }
                            }
                        $buffy .= '</ul>';
                    $buffy .= '</div>';
                }

            $buffy .= '</div>';

		$buffy .= '</div>';

		return $buffy;
	}

}