<?php


/**
 * Class td_woo_page_description - shortcode for rendering the woocommerce products templates page description
 */

class td_woo_page_description extends td_block {

    public function get_custom_css() {

        // $unique_block_class
        $unique_block_class = $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>

				/* @align_center */
				.td-theme-wrap .$unique_block_class {
					text-align: center;
				}
				/* @align_right */
				.td-theme-wrap .$unique_block_class {
					text-align: right;
				}
				/* @align_left */
				.td-theme-wrap .$unique_block_class {
					text-align: left;
				}
				
				/* @p_space */
				.$unique_block_class p {
					margin-bottom: @p_space;
				}
				
				/* @descr_color */
				.$unique_block_class p {
					color: @descr_color;
				}
				
				
				/* @f_but */
				.$unique_block_class p {
					@f_but
				}
				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        /*-- LAYOUT -- */
        // content align
        $content_align = $res_ctx->get_shortcode_att('content_align_horizontal');
        if ( $content_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'align_center', 1 );
        } else if ( $content_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'align_right', 1 );
        } else if ( $content_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'align_left', 1 );
        }

        // paragraphs bottom space
        $p_space = $res_ctx->get_shortcode_att('p_space');
        $res_ctx->load_settings_raw( 'p_space', $p_space );
        if( $p_space != '' && is_numeric( $p_space ) ) {
            $res_ctx->load_settings_raw( 'p_space', $p_space . 'px' );
        }


        /*-- COLORS -- */
        // description color
        $res_ctx->load_settings_raw( 'descr_color', $res_ctx->get_shortcode_att('descr_color') );


        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_but' );

    }

    function __construct() {
        parent::disable_loop_block_features();
    }

    function render( $atts, $content = null ) {

	    global $td_woo_state_single_product_page, $td_woo_state_archive_product_page, $td_woo_state_search_archive_product_page, $td_woo_state_shop_base_page;

	    switch( tdb_state_template::get_template_type() ) {

		    case 'woo_archive':
			    $page_description = $td_woo_state_archive_product_page->page_description->__invoke($atts);
			    break;

		    case 'woo_product':
		    case 'woo_search_archive':
		    case 'woo_shop_base':
		    default:
		    $page_description = '';
	    }

	    parent::render($atts);

        $buffy = ''; // output buffer


        $buffy .= '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';

            // get the block css
            $buffy .= $this->get_block_css();

            // get the js for this block
            $buffy .= $this->get_block_js();

            // the block inner
            $buffy .= '<div class="tdw-block-inner td-fix-index">';
                $buffy.= $page_description;
            $buffy .= '</div>';
        $buffy .= '</div>';

        return $buffy;
    }

}