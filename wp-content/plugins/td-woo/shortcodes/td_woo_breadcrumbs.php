<?php

/**
 * Class td_woo_breadcrumbs - common shortcode for woocommerce pages breadcrumbs
 */
class td_woo_breadcrumbs extends td_block {

    public function get_custom_css() {
        // $unique_block_class
        $unique_block_class = $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>
            
                /* @general */
                .$unique_block_class {
                    margin-bottom: 11px;
                }
                .$unique_block_class .entry-crumbs {
                    padding-top: 0;    
                }
                .$unique_block_class .td-bread-sep {
                    vertical-align: middle;
                }
                
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
            
                /* @icon_size */
                .$unique_block_class .td-bread-sep {
                    font-size: @icon_size;
                }
                /* @icon_space */
                .$unique_block_class .td-bread-sep {
                    margin: 0 @icon_space;
                }
                
                /* @text_color */
				.$unique_block_class .entry-crumbs,
				.$unique_block_class a {
					color: @text_color;
				}
                /* @link_h_color */
				.$unique_block_class a:hover {
					color: @link_h_color;
				}
                /* @icon_color */
				.$unique_block_class .td-bread-sep {
					color: @icon_color;
				}
				
				/* @f_text */
				.$unique_block_class .entry-crumbs {
					@f_text
				}
            
            </style>";

        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'general', 1 );


        // content align
        $content_align = $res_ctx->get_shortcode_att('content_align_horizontal');
        if ( $content_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'align_center', 1 );
        } else if ( $content_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'align_right', 1 );
        } else if ( $content_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'align_left', 1 );
        }



        /*-- SEPARATOR ICON -- */
        // separator icon size
        $icon_size = $res_ctx->get_shortcode_att('icon_size');
        $res_ctx->load_settings_raw( 'icon_size', $icon_size );
        if( $icon_size != '' ) {
            if( is_numeric( $icon_size ) ) {
                $res_ctx->load_settings_raw( 'icon_size', $icon_size . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'icon_size', '8px' );
        }

        // separator icon space
        $icon_space = $res_ctx->get_shortcode_att('icon_space');
        $res_ctx->load_settings_raw( 'icon_space', $icon_space );
        if( $icon_space != '' ) {
            if( is_numeric( $icon_space ) ) {
                $res_ctx->load_settings_raw( 'icon_space', $icon_space . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'icon_space', '5px' );
        }



        /*-- COLORS -- */
        // text color
        $res_ctx->load_settings_raw( 'text_color', $res_ctx->get_shortcode_att('text_color') );

        // link hover color
        $res_ctx->load_settings_raw( 'link_h_color', $res_ctx->get_shortcode_att('link_h_color') );

        // separator icon color
        $res_ctx->load_settings_raw( 'icon_color', $res_ctx->get_shortcode_att('icon_color') );



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_text' );

    }
    
    function __construct() {
        parent::disable_loop_block_features();
    }

    function render($atts, $content = null) {

        global $td_woo_state_single_product_page, $td_woo_state_archive_product_page, $td_woo_state_search_archive_product_page, $td_woo_state_shop_base_page;

	    switch( tdb_state_template::get_template_type() ) {

		    case 'woo_product':
			    $breadcrumbs = $td_woo_state_single_product_page->product_breadcrumbs->__invoke($atts);
			    break;

		    case 'woo_archive':
			    $breadcrumbs = $td_woo_state_archive_product_page->breadcrumbs->__invoke($atts);;
			    break;

		    case 'woo_search_archive':
			    $breadcrumbs = $td_woo_state_search_archive_product_page->breadcrumbs->__invoke($atts);;
			    break;

		    case 'woo_shop_base':
			    $breadcrumbs = $td_woo_state_shop_base_page->breadcrumbs->__invoke($atts);;
			    break;

		    default:
			    $breadcrumbs = '';
	    }
        
        parent::render($atts);

        $buffy = '';

        $buffy .= '<div class="' . $this->get_block_classes()  . '" ' . $this->get_block_html_atts() . '>';

	        //get the block css
	        $buffy .= $this->get_block_css();

	        //get the js for this block
	        $buffy .= $this->get_block_js();

            $buffy .= '<div class="tdw-block-inner td-fix-index">';
                $buffy .= $breadcrumbs;
            $buffy .= '</div>';

        $buffy .= '</div>';

        return $buffy;
    }
}

