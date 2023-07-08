<?php

/**
 * Class td_flex_block_6
 */

class td_flex_block_6 extends td_block {

    public $shortcode_atts = array(); //the atts used for rendering the current block
    private $unique_block_class;

    static function cssMedia( $res_ctx ) {

        /*-- GENERAL-- */
        $res_ctx->load_settings_raw( 'general_style_td_flex_block_6', 1 );
        $res_ctx->load_settings_raw( 'style_general_module_loop', 1 );



        /*-- BLOCK HEADER -- */
        // *- fonts -* //
        $res_ctx->load_font_settings( 'f_header' );
        $res_ctx->load_font_settings( 'f_ajax' );



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
            
                /* @general_style_td_flex_block_6 */
                .td_flex_block_6 {
                  display: inline-block;
                  width: 100%;
                  margin-bottom: 78px;
                  padding-bottom: 0;
                  overflow: visible !important;
                }
                .td_flex_block_6 .td_block_inner {
                    display: flex;
                    flex-wrap: wrap;
				}
                .td_flex_block_6 .td-load-more-wrap,
                .td_flex_block_6 .td-next-prev-wrap {
                    margin: 20px 0 0;
                }
                .td_flex_block_6 .td-next-prev-wrap a {
                    width: auto;
                    height: auto;
                    min-width: 25px;
                    min-height: 25px;
                }
                .td_flex_block_6 .td-block-missing-settings {
                    width: 100%;
                }
                
                .td_flex_block_6.tdc-no-posts .td_block_inner:after {
                    content: 'No results' !important;
                    width: 100%;
                }
                
                .td_flex_block_6.tdc-no-posts .td_block_inner {
                    margin: 0;
                }

				/* @f_header */
				.$unique_block_class .td-block-title a,
				.$unique_block_class .td-block-title span {
					@f_header
				}
				/* @f_ajax */
				.$unique_block_class .td-subcat-list a,
				.$unique_block_class .td-subcat-dropdown span,
				.$unique_block_class .td-subcat-dropdown a {
					@f_ajax
				}
				
				
				/* @pag_space */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap,
				.$unique_block_class .td-load-more-wrap {
					margin-top: @pag_space;
				}
				/* @pag_padding */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a,
				.$unique_block_class .td-load-more-wrap a {
					padding: @pag_padding;
				}
				.$unique_block_class .page-nav .pages {
				    padding-right: 0;
				}
				/* @pag_border_width */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a,
				.$unique_block_class .td-load-more-wrap a {
					border-width: @pag_border_width;
				}
				/* @pag_border_radius */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a,
				.$unique_block_class .td-load-more-wrap a {
					border-radius: @pag_border_radius;
				}
				/* @pag_icons_size */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a,
				.$unique_block_class .td-load-more-wrap a i {
					font-size: @pag_icons_size;
				}
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap .td-next-prev-icon-svg svg {
				    width: @pag_icons_size;
				    height: calc( @pag_icons_size + 1px );
				}
				
				/* @pag_text */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a,
				.$unique_block_class .td-load-more-wrap a {
					color: @pag_text;
				}
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap .td-next-prev-icon-svg svg,
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap .td-next-prev-icon-svg svg * {
				    fill: @pag_text;
				}
				/* @pag_bg */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a,
				.$unique_block_class .td-load-more-wrap a {    
					background-color: @pag_bg;
				}
				/* @pag_border */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a,
				.$unique_block_class .td-load-more-wrap a {
					border-color: @pag_border;
				}
				/* @pag_h_text */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a:hover,
				.$unique_block_class .td-load-more-wrap a:hover {
					color: @pag_h_text;
				}
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a:hover .td-next-prev-icon-svg svg,
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a:hover .td-next-prev-icon-svg svg * {
				    fill: @pag_h_text;
				}
				/* @pag_h_bg */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a:hover,
				.$unique_block_class .td-load-more-wrap a:hover {    
					background-color: @pag_h_bg;
				}
				/* @pag_h_border */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a:hover,
				.$unique_block_class .td-load-more-wrap a:hover {
					border-color: @pag_h_border;
				}
				
				/* @f_pag */
				.$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a i,
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
	    $buffy = '<div class="' . $this->get_block_classes( $additional_classes_array ) . ' td_flex_block" ' . $this->get_block_html_atts() . '>';

            // get the block css
            $buffy .= $this->get_block_css();

            // get the js for this block
            $buffy .= $this->get_block_js();

            // return an error if the module style is not defined
            if( !td_api_base::component_is_set( $tds_module_loop_class ) ) {
                    $buffy .= '<div id=' . $this->block_uid . ' class="td_block_inner tdb-block-inner td-fix-index">';
                        $buffy .= td_util::get_block_error('Flex Block X', 'The module style set on this block does not exist. Please reactivate the plugin which is defining it or select another module style.');
                    $buffy .= '</div>';

                $buffy .= '</div>';

                return $buffy;
            }


            // render the module style
            $tds_module_flex_instance = new $tds_module_loop_class( $this->shortcode_atts, $this->unique_block_class );
            $buffy .= $tds_module_flex_instance->render();

            //get the filter for this block
            $buffy .= '<div class="td-block-title-wrap">';
                $buffy .= $this->get_block_title(); //get the block title
                $buffy .= $this->get_pull_down_filter(); //get the sub category filter for this block
            $buffy .= '</div>';

            // block inner
            $buffy .= '<div id=' . $this->block_uid . ' class="td_block_inner td-fix-index">';
	            $buffy .= $this->inner( $this->td_query->posts );
            $buffy .= '</div>';

            //get the ajax pagination for this block
            $prev_icon = $this->get_icon_att('prev_tdicon');
            $prev_icon_class = $this->get_att('prev_tdicon');
            $next_icon = $this->get_icon_att('next_tdicon');
            $next_icon_class = $this->get_att('next_tdicon');
            $buffy .= $this->get_block_pagination($prev_icon, $next_icon, $prev_icon_class, $next_icon_class);

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

        //var_dump($this->shortcode_atts);

	    if ( !empty( $posts ) ) {
		    foreach ( $posts as $post ) {
			    $tds_loop_module = new $module( $post, $this->shortcode_atts );
			    $buffy .= $tds_loop_module->render( __CLASS__, $module_style_class );
		    }
	    }

	    $buffy .= $td_block_layout->close_all_tags();

	    return $buffy;

    }

}
