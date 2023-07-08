<?php

/**
 * Class tdb_filters_loop
 */

class tdb_filters_loop extends td_block {

    protected $shortcode_atts = array(); //the atts used for rendering the current block
    private $unique_block_class;

    static function cssMedia( $res_ctx ) {

        /*-- GENERAL-- */
        $res_ctx->load_settings_raw( 'general_style_tdb_filters_loop', 1 );
        $res_ctx->load_settings_raw( 'style_general_module_loop', 1 );



        /*-- BLOCK HEADER -- */
        // *- fonts -* //
        $res_ctx->load_font_settings( 'f_header' );



        /*-- PAGINATION -- */
        // *- layout -* //
        // pagination space
        $pag_space = $res_ctx->get_shortcode_att('pag_space');
        $res_ctx->load_settings_raw( 'pag_space', $pag_space );
        if( $pag_space != '' && is_numeric( $pag_space ) ) {
            $res_ctx->load_settings_raw( 'pag_space', $pag_space . 'px' );
        }

        // pagination padding
        $pag_padding = $res_ctx->get_shortcode_att('pag_padding');
        $res_ctx->load_settings_raw( 'pag_padding', $pag_padding );
        if( $pag_padding != '' && is_numeric( $pag_padding ) ) {
            $res_ctx->load_settings_raw( 'pag_padding', $pag_padding . 'px' );
        }

        // pagination border width
        $pag_border_width = $res_ctx->get_shortcode_att('pag_border_width');
        $res_ctx->load_settings_raw( 'pag_border_width', $pag_border_width );
        if( $pag_border_width != '' && is_numeric( $pag_border_width ) ) {
            $res_ctx->load_settings_raw( 'pag_border_width', $pag_border_width . 'px' );
        }
        // pagination border radius
        $pag_border_radius = $res_ctx->get_shortcode_att('pag_border_radius');
        $res_ctx->load_settings_raw( 'pag_border_radius', $pag_border_radius );
        if( $pag_border_radius != '' && is_numeric( $pag_border_radius ) ) {
            $res_ctx->load_settings_raw( 'pag_border_radius', $pag_border_radius . 'px' );
        }

        // next/prev icons size
        $pag_icons_size = $res_ctx->get_shortcode_att('pag_icons_size');
        $res_ctx->load_settings_raw( 'pag_icons_size', $pag_icons_size );
        if( $pag_icons_size != '' && is_numeric( $pag_icons_size ) ) {
            $res_ctx->load_settings_raw( 'pag_icons_size', $pag_icons_size . 'px' );
        }


        // *- colors -* //
        $res_ctx->load_settings_raw( 'pag_text', $res_ctx->get_shortcode_att('pag_text') );
        $res_ctx->load_settings_raw( 'pag_bg', $res_ctx->get_shortcode_att('pag_bg') );
        $res_ctx->load_settings_raw( 'pag_border', $res_ctx->get_shortcode_att('pag_border') );
        $res_ctx->load_settings_raw( 'pag_a_text', $res_ctx->get_shortcode_att('pag_a_text') );
        $res_ctx->load_settings_raw( 'pag_a_bg', $res_ctx->get_shortcode_att('pag_a_bg') );
        $res_ctx->load_settings_raw( 'pag_a_border', $res_ctx->get_shortcode_att('pag_a_border') );
        $res_ctx->load_settings_raw( 'pag_h_text', $res_ctx->get_shortcode_att('pag_h_text') );
        $res_ctx->load_settings_raw( 'pag_h_bg', $res_ctx->get_shortcode_att('pag_h_bg') );
        $res_ctx->load_settings_raw( 'pag_h_border', $res_ctx->get_shortcode_att('pag_h_border') );


        // *- fonts -* //
        $res_ctx->load_font_settings( 'f_pag' );

    }

    public function get_custom_css() {

        // $unique_block_class
        $unique_block_class = $this->block_uid;
        $unique_block_modal_class = $this->block_uid . '_m';

        $compiled_css = '';

        $raw_css =
            "<style>
            
                /* @general_style_tdb_filters_loop */
                .tdb_filters_loop {
                  display: inline-block;
                  width: 100%;
                  margin-bottom: 78px;
                  padding-bottom: 0;
                  overflow: visible !important;
                }
                .tdb_filters_loop .tdb-block-inner {
                    display: flex;
                    flex-wrap: wrap;
				}
                .tdb_filters_loop .td-load-more-wrap,
                .tdb_filters_loop .td-next-prev-wrap {
                    margin: 20px 0 0;
                }
                .tdb_filters_loop .page-nav {
                    position: relative;
                    margin: 54px 0 0;
                }
                .tdb_filters_loop .page-nav a,
                .tdb_filters_loop .page-nav span {
                    margin-top: 8px;
                    margin-bottom: 0;
                }
                .tdb_filters_loop .td-next-prev-wrap a {
                    width: auto;
                    height: auto;
                    min-width: 25px;
                    min-height: 25px;
                }
                .tdb_filters_loop .td-block-missing-settings {
                    width: 100%;
                }
                
                .tdb_filters_loop.tdc-no-posts .td_block_inner:after {
                    content: 'No results' !important;
                    width: 100%;
                }
                
                .tdb_filters_loop.tdc-no-posts .td_block_inner {
                    margin: 0;
                }

				/* @f_header */
				.$unique_block_class .td-block-title a,
				.$unique_block_class .td-block-title span {
					@f_header
				}
				
				
				/* @pag_space */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap,
				.$unique_block_class .page-nav,
				.$unique_block_class .td-load-more-wrap {
					margin-top: @pag_space;
				}
				/* @pag_padding */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a,
				.$unique_block_class .page-nav a,
				.$unique_block_class .page-nav .current,
				.$unique_block_class .page-nav .extend,
				.$unique_block_class .page-nav .pages,
				.$unique_block_class .td-load-more-wrap a {
					padding: @pag_padding;
				}
				.$unique_block_class .page-nav .pages {
				    padding-right: 0;
				}
				/* @pag_border_width */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a,
				.$unique_block_class .page-nav a,
				.$unique_block_class .page-nav .current,
				.$unique_block_class .page-nav .extend,
				.$unique_block_class .page-nav .pages,
				.$unique_block_class .td-load-more-wrap a {
					border-width: @pag_border_width;
				}
				.$unique_block_class .page-nav .extend {
				    border-style: solid;
				    border-color: transparent;
				}
				.$unique_block_class .page-nav .pages {
				    border-style: solid;
				    border-color: transparent;
				    border-right-width: 0;
				}
				/* @pag_border_radius */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a,
				.$unique_block_class .page-nav a,
				.$unique_block_class .page-nav .current,
				.$unique_block_class .td-load-more-wrap a {
					border-radius: @pag_border_radius;
				}
				/* @pag_icons_size */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a,
				.$unique_block_class .td-load-more-wrap a i,
				.$unique_block_class .page-nav a i {
					font-size: @pag_icons_size;
				}
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap .td-next-prev-icon-svg svg,
				.$unique_block_class .page-nav .page-nav-icon-svg svg {
				    width: @pag_icons_size;
				    height: calc( @pag_icons_size + 1px );
				}
				
				/* @pag_text */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a,
				.$unique_block_class .page-nav a,
				.$unique_block_class .td-load-more-wrap a {
					color: @pag_text;
				}
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap .td-next-prev-icon-svg svg,
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap .td-next-prev-icon-svg svg *,
				.$unique_block_class .page-nav .page-nav-icon-svg svg ,
				.$unique_block_class .page-nav .page-nav-icon-svg svg * {
				    fill: @pag_text;
				}
				/* @pag_bg */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a,
				.$unique_block_class .page-nav a,
				.$unique_block_class .td-load-more-wrap a {    
					background-color: @pag_bg;
				}
				/* @pag_border */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a,
				.$unique_block_class .page-nav a,
				.$unique_block_class .td-load-more-wrap a {
					border-color: @pag_border;
				}
				/* @pag_a_text */
				.$unique_block_class .page-nav .current {
					color: @pag_a_text;
				}
				/* @pag_a_bg */
				.$unique_block_class .page-nav .current {
					background-color: @pag_a_bg;
				}
				/* @pag_a_border */
				.$unique_block_class .page-nav .current {
					border-color: @pag_a_border;
				}
				/* @pag_h_text */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a:hover,
				.$unique_block_class .page-nav a:hover,
				.$unique_block_class .td-load-more-wrap a:hover {
					color: @pag_h_text;
				}
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a:hover .td-next-prev-icon-svg svg,
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a:hover .td-next-prev-icon-svg svg *,
				.$unique_block_class .page-nav a:hover .page-nav-icon-svg svg ,
				.$unique_block_class .page-nav a:hover .page-nav-icon-svg svg * {
				    fill: @pag_h_text;
				}
				/* @pag_h_bg */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a:hover,
				.$unique_block_class .page-nav a:hover,
				.$unique_block_class .td-load-more-wrap a:hover {    
					background-color: @pag_h_bg;
				}
				/* @pag_h_border */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a:hover,
				.$unique_block_class .page-nav a:hover,
				.$unique_block_class .td-load-more-wrap a:hover {
					border-color: @pag_h_border;
				}
				
				/* @f_pag */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a i,
				.$unique_block_class .page-nav a,
				.$unique_block_class .page-nav span,
				.$unique_block_class .td-load-more-wrap a {
					@f_pag
				}
            
            </style>";

        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();

        return $compiled_css;
    }

    function render( $atts, $content = null ) {

	    // block_type
	    //$atts['block_type'] = get_class($this);

	    // current tax term on cpt tax templates
	    global $wp_query, $tdb_state_category;

	    // set tax tpl
	    if ( !empty( tdb_state_template::get_template_type() ) && 'cpt_tax' === tdb_state_template::get_template_type() ) {
		    $tdb_state_category->set_tax();

		    // get current term and set
		    if ( !empty( $tdb_state_category ) && $tdb_state_category->has_wp_query() ) {

			    $current_tax_term_obj = '';
			    $tax_template_wp_query = $wp_query;
			    $wp_query = $tdb_state_category->get_wp_query();

			    $queried_object = get_queried_object();
			    if ( $queried_object instanceof WP_Term ) {
				    $current_tax_term_obj = $queried_object;
			    } elseif ( !empty( $tdb_state_category->queried_object ) ) {
				    $current_tax_term_obj = $tdb_state_category->queried_object;
			    } elseif ( !empty( $tdb_state_category->tax_query ) && $tdb_state_category->tax_query instanceof WP_Tax_Query ) {
				    $current_tax_term_obj = get_term( $tdb_state_category->query_vars['tax_query'][0]['terms'] );
			    }

			    $wp_query = $tax_template_wp_query;

		    }

	    }

        // tdb filters init
	    $tdb_filters = array(
		    'tax_terms_ids' => array()
        );

        // set current tax filter
	    if ( !empty( $current_tax_term_obj ) ) {
		    $tdb_filters['tax_terms_ids'][] = $current_tax_term_obj->term_id;
	    }

	    // apply tdb filters from url
	    $filters = $_GET;
	    if( !empty( $filters ) && is_array( $filters ) ) {

		    foreach ( $filters as $tax => $tax_terms_filters_list ) {

                // ignore filters not starting with 'tdb_'
                if ( strpos( $tax, 'tdb_' ) === false )
	                continue;

                // taxonomy
			    if ( strpos( $tax, 'tdb_tax' ) !== false ) {
				    $taxonomy = str_replace( 'tdb_tax_', '', $tax );
				    $tax_terms = array_map( 'sanitize_title', explode( ',', $tax_terms_filters_list ) );

                    // check slugs
                    foreach ( $tax_terms as $tax_term ) {
                        $the_tax_term = get_term_by( 'slug', $tax_term, $taxonomy );
                        if ( false !== $the_tax_term ) {
	                        $tdb_filters['tax_terms_ids'][] = $the_tax_term->term_id;
                        }
                    }

                }

		    }

	    }

        // set tdb filters to block's atts
	    if ( !empty( $tdb_filters['tax_terms_ids'] ) ) {
		    $atts['category_ids'] = implode( ',', $tdb_filters['tax_terms_ids'] );
		    $atts['in_all_terms'] = 'yes'; // filtered results must belong to all taxonomies

            // @note it's enough just to set this attribute in order to not include child terms, by default this option is enabled in wp tax queries @see WP_Tax_Query
		    $atts['include_children'] = 'no'; // do not include child terms
	    }

        // set post type
	    $atts['installed_post_types'] = empty( $_GET['post_type'] ) ? ( $atts['installed_post_types'] ?? '' ) : tdb_util::clean( wp_unslash( $_GET['post_type'] ) );

	    // set page
	    $atts['page'] = empty( $_GET['tdb-loop-page'] ) ? '' : intval( $_GET['tdb-loop-page'] );

	    // set sorting
	    $atts['sort'] = empty( $_GET['tdb-loop-orderby'] ) ? ( $atts['sort'] ?? '' ) : tdb_util::clean( wp_unslash( $_GET['tdb-loop-orderby'] ) );

        $atts['block_type'] = __CLASS__;
	    //echo '<pre>' . print_r( $atts, true ) . '</pre>';

        // set search query
	    global $wp_query, $tdb_state_search;

	    if ( !empty( $tdb_state_search ) && $tdb_state_search->has_wp_query() ) {

		    $search_template_wp_query = $wp_query;
		    $wp_query = $tdb_state_search->get_wp_query();

		    $atts['search_query'] = get_search_query();

		    $wp_query = $search_template_wp_query;

	    }

        parent::render( $atts );


        // get the active module style class
        $tds_module_loop_class = $this->get_att('tds_module_loop_style') != '' ? $this->get_att('tds_module_loop_style') : 'tds_module_loop_1_style';


        // additional block classes
        $additional_classes_array = array( $tds_module_loop_class );


        $this->unique_block_class = $this->block_uid;
        $this->shortcode_atts = shortcode_atts(
            array_merge(
                td_global_blocks::get_mapped_atts( __CLASS__ ),
                td_api_style::get_style_group_params( 'tds_module_loop_style' )
            ), $atts );


        // output
	    $buffy = '<div class="' . $this->get_block_classes( $additional_classes_array ) . '" ' . $this->get_block_html_atts() . '>';

            // get the block css
            $buffy .= $this->get_block_css();

            // get the js for this block
            $buffy .= $this->get_block_js();

            // return an error if the module style is not defined
            if( !td_api_base::component_is_set( $tds_module_loop_class ) ) {
                    $buffy .= '<div id=' . $this->block_uid . ' class="td_block_inner tdb-block-inner td-fix-index">';
                        $buffy .= td_util::get_block_error('Posts Loop 3', 'The module style set on this block does not exist. Please reactivate the plugin which is defining it or select another module style.');
                    $buffy .= '</div>';

                $buffy .= '</div>';

                return $buffy;
            }


            // render the module style
            $tds_module_loop_instance = new $tds_module_loop_class( $this->shortcode_atts, $this->unique_block_class );
            $buffy .= $tds_module_loop_instance->render();


            // custom title
            $custom_title = $this->get_att( 'custom_title' );

            if( $custom_title != '' ) {
                //get the filter for this block
                $buffy .= '<div class="td-block-title-wrap">';
                    $buffy .= $this->get_block_title(); //get the block title
                $buffy .= '</div>';
            }


            // process filters
	        if ( ! ( tdc_state::is_live_editor_iframe() || tdc_state::is_live_editor_ajax() ) ) {

		        // render js
		        ob_start();

		        ?>
                <script>
                    jQuery().ready(function () {
                        var tdbFiltersLoopItem = new tdbFiltersLoop.item();
                        tdbFiltersLoopItem.blockUid = '<?php echo $this->block_uid; ?>';
                        tdbFiltersLoopItem.blockAtts = '<?php echo json_encode( $this->get_all_atts(), JSON_UNESCAPED_SLASHES | JSON_FORCE_OBJECT ); ?>';
                        tdbFiltersLoopItem.jqueryObj = jQuery('.<?php echo $this->block_uid ?>');
				        <?php if ( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) { ?>
                        tdbFiltersLoopItem.inComposer = true;
				        <?php } ?>
                        tdbFiltersLoop.addItem( tdbFiltersLoopItem );
                    });
                </script>
		        <?php
		        td_js_buffer::add_to_footer("\n" . td_util::remove_script_tag( ob_get_clean() ) );

            }

            // block inner
            $buffy .= '<div id=' . $this->block_uid . ' class="td_block_inner tdb-block-inner td-fix-index">';
	            $buffy .= $this->inner( $this->td_query->posts );
            $buffy .= '</div>';


            // pagination
            $pagination = $this->get_att( 'ajax_pagination' );
            if( $pagination != '' && $pagination === 'numbered' ) {
                $additional_classes_array[] = 'tdb-numbered-pagination';
            }

            if ( $pagination != '' ) {
                if ( $pagination === 'numbered' ) {
                    $buffy .= $this->get_numbered_pagination( $this->td_query );
                } else {
                    $prev_icon = $this->get_icon_att('prev_tdicon');
                    $prev_icon_class = $this->get_att('prev_tdicon');
                    $next_icon = $this->get_icon_att('next_tdicon');
                    $next_icon_class = $this->get_att('next_tdicon');

                    $buffy .= $this->get_block_pagination( $prev_icon, $next_icon, $prev_icon_class, $next_icon_class );
                }
            }

        $buffy .= '</div>';

        return $buffy;
    }

    function inner( $posts ) {

        $module_style_class = $this->get_att('tds_module_loop_style');
        if ( empty( $module_style_class ) ) {
            $module_style_class = 'tds_module_loop_1_style';
        }
        $module = str_replace('_style', '', $module_style_class);

	    $buffy = '';
	    $td_block_layout = new td_block_layout();

	    if ( !empty( $posts ) ) {
		    foreach ( $posts as $post ) {
			    $tdb_filters_module = new $module( $post, $this->shortcode_atts );
			    $buffy .= $tdb_filters_module->render( __CLASS__, $module_style_class );
		    }
	    }

	    $buffy .= $td_block_layout->close_all_tags();

	    return $buffy;

    }

    function get_numbered_pagination( $td_query ) {

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
		    'pages_text'    => __td( 'Page %CURRENT_PAGE% of %TOTAL_PAGES%', TD_THEME_NAME ),
		    'current_text'  => '%PAGE_NUMBER%',
		    'page_text'     => '%PAGE_NUMBER%',
		    'first_text'    => __td( '1' ),
		    'last_text'     => __td( '%TOTAL_PAGES%' ),
		    'dotright_text' => __td( '...' ),
		    'dotleft_text'  => __td( '...' )
	    );

        // paged
	    global $paged;
	    $paged = intval( $td_query->query['paged'] );
	    if ( $paged === 0 ) {
		    $paged = 1;
	    }

        // max num pages
	    $max_num_pages = $td_query->max_num_pages;

	    $pages_to_show = 3;
	    $pages_to_show_minus_1 = $pages_to_show - 1;
	    $half_page_start = floor( $pages_to_show_minus_1 / 2 );
	    $half_page_end = ceil( $pages_to_show_minus_1 / 2 );
	    $start_page = $paged - $half_page_start;

	    if ( $start_page <= 0 ) {
		    $start_page = 1;
	    }

        // end page
	    $end_page = $paged + $half_page_end;
	    if ( ( $end_page - $start_page ) != $pages_to_show_minus_1 ) {
		    $end_page = $start_page + $pages_to_show_minus_1;
	    }

	    if ( $end_page > $max_num_pages ) {
		    $start_page = $max_num_pages - $pages_to_show_minus_1;
		    $end_page = $max_num_pages;
	    }

	    if ( $start_page <= 0 ) {
		    $start_page = 1;
	    }

	    //global $wp_query;
	    //$global_wp_query = $wp_query;

        // replace global wp query
	    //$wp_query = $td_query;

	    //$previous_posts_link = get_previous_posts_link( $prev_icon_html );
	    //$next_posts_link = get_next_posts_link( $next_icon_html, $max_num_pages );

        // revert global wp query
	    //$wp_query = $global_wp_query;

        $buffy = '';

        // build pagination output
	    if( $max_num_pages > 1  ) {

            $buffy .= '<div class="page-nav td-pb-padding-side">';
                $buffy .= paginate_links(
                    array(
                        'base'      => esc_url_raw( add_query_arg( 'tdb-loop-page', '%#%', false ) ),
                        'format'    => '?tdb-loop-page=%#%',
                        'add_args'  => false,
                        'current'   => max( 1, $paged ),
                        'total'     => $max_num_pages,
                        'prev_text' => $prev_icon_html,
                        'next_text' => $next_icon_html,
                        'type'      => 'plain',
                        'end_size'  => 3,
                        'mid_size'  => 3,
                    )
                );

                $pages_text = str_replace("%CURRENT_PAGE%", number_format_i18n( $paged ), $pagination_data['pages_text'] );
                $pages_text = str_replace("%TOTAL_PAGES%", number_format_i18n( $max_num_pages ), $pages_text );

                if ( !empty( $pages_text ) ) {
                    $buffy .= '<span class="pages">' . $pages_text . '</span>';
                }

                $buffy .= '<div class="clearfix"></div>';
		    $buffy .= '</div>';
	    }

        return $buffy;

    }

    function js_tdc_callback_ajax() {
        $buffy = '';

        // add a new composer block - that one has the delete callback
        $buffy .= $this->js_tdc_get_composer_block();

        ob_start();

        ?>
        <script>
            /* global jQuery:{} */
            ( function () {
                var block = jQuery('.<?php echo $this->block_uid; ?>');
                blockClass = '.<?php echo $this->block_uid; ?>';
            } )();
        </script>
        <?php

        return $buffy . td_util::remove_script_tag( ob_get_clean() );
    }

}
