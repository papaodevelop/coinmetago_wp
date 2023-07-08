<?php

/**
 * Class td_woo_product_categories - shortcode for woocommerce single product page categories list
 */
class td_woo_product_categories extends td_block {

    public function get_custom_css() {
        // $unique_block_class
        $unique_block_class = $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>
            
                /* @general_style */
                .td_woo_product_categories {
                    margin-bottom: 10px;
                }
                .td_woo_product_categories span {
                    line-height: 1;
                    vertical-align: middle;
                    display: inline-block;
                }
                .td_woo_product_categories a {
                    position: relative;
                    display: inline-block;
                    line-height: 1;
                    vertical-align: middle;
                }
                .td_woo_product_categories a:before {
                    content: '';
                    display: block;
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    z-index: -1;
                    border-width: 0;
                    border-style: solid;
                    border-color: #000;
                }
                
                
                /* @add_space */
				.$unique_block_class .tdw-cat-text {
					margin-right: @add_space;
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
				
                /* @cat_padding */
				.$unique_block_class a {
					padding: @cat_padding;
				}
                /* @cat_space */
				.$unique_block_class a {
					margin: @cat_space;
				}
				/* @cat_radius */
				.$unique_block_class a:before {
					border-radius: @cat_radius;
				}
                /* @cat_border */
				.$unique_block_class a:before {
					border-width: @cat_border;
				}
				/* @cat_skew */
				.$unique_block_class a:before {
					transform: skew(@cat_skew);
                    -webkit-transform: skew(@cat_skew);
				}

				/* @text_hover_color */
				.$unique_block_class a:hover {
					color: @text_hover_color !important;
				}
                /* @bg_solid */
				.$unique_block_class a:before {
					background-color: @bg_solid;
				}
                /* @bg_gradient */
				.$unique_block_class a:before {
					@bg_gradient;
				}
                /* @bg_hover_solid */
				.$unique_block_class a:hover:before {
					background-color: @bg_hover_solid;
				}
                /* @bg_hover_gradient */
				.$unique_block_class a:hover:before {
					@bg_hover_gradient;
				}
                /* @text_color */
				.$unique_block_class a {
					color: @text_color;
				}
				/* @border_color */
				.$unique_block_class a:before {
					border-color: @border_color;
				}
				/* @border_hover_color */
				.$unique_block_class a:hover:before {
					border-color: @border_hover_color;
				}
                /* @txt_color */
				.$unique_block_class .tdw-cat-text {
					color: @txt_color;
				}
                /* @sep_color */
				.$unique_block_class .tdw-cat-sep {
					color: @sep_color;
				}
				
				/* @show_sep */
				.$unique_block_class .tdw-cat-sep {
				    display: @show_sep;
				}
				
				/* @f_cats */
				.$unique_block_class a,
				.$unique_block_class .tdw-cat-sep {
					@f_cats
				}
				/* @f_txt */
				.$unique_block_class .tdw-cat-text {
					@f_txt
				}
            
            </style>";

        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        /*-- GENERAL-- */
        $res_ctx->load_settings_raw('general_style', 1);


        // add_space
        $add_space = $res_ctx->get_shortcode_att('add_space');
        if ( $add_space != 0 || !empty($add_space) ) {
            $res_ctx->load_settings_raw( 'add_space', $add_space . 'px' );
        }

        // content align
        $content_align = $res_ctx->get_shortcode_att('content_align_horizontal');
        if ( $content_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'align_center', 1 );
        } else if ( $content_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'align_right', 1 );
        } else if ( $content_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'align_left', 1 );
        }

        // cat_padding
        $cat_padding = $res_ctx->get_shortcode_att('cat_padding');
        $res_ctx->load_settings_raw( 'cat_padding', $cat_padding );
        if ( is_numeric( $cat_padding ) ) {
            $res_ctx->load_settings_raw( 'cat_padding', $cat_padding . 'px' );
        }
        // cat_space
        $cat_space = $res_ctx->get_shortcode_att('cat_space');
        $res_ctx->load_settings_raw( 'cat_space', $cat_space );
        if ( is_numeric( $cat_space ) ) {
            $res_ctx->load_settings_raw( 'cat_space', $cat_space . 'px' );
        }
        // cat_skew
        $cat_skew = $res_ctx->get_shortcode_att('cat_skew');
        if ( $cat_skew != 0 || !empty($cat_skew) ) {
            $res_ctx->load_settings_raw( 'cat_skew', $cat_skew . 'deg' );
        }
        // cat_radius
        $cat_radius = $res_ctx->get_shortcode_att('cat_radius');
        if ( $cat_radius != 0 || !empty($cat_radius) ) {
            $res_ctx->load_settings_raw( 'cat_radius', $cat_radius . 'px' );
        }

        // cat_border
        $res_ctx->load_settings_raw( 'cat_border', $res_ctx->get_shortcode_att('cat_border') . 'px' );

        // show separator
        $res_ctx->load_settings_raw( 'show_sep', $res_ctx->get_shortcode_att('show_sep') );



        // colors
        $res_ctx->load_color_settings( 'bg_color', 'bg_solid', 'bg_gradient', '', '' );
        $res_ctx->load_color_settings( 'bg_hover_color', 'bg_hover_solid', 'bg_hover_gradient', '', '', '' );
        $res_ctx->load_settings_raw( 'text_color', $res_ctx->get_shortcode_att('text_color') );
        $res_ctx->load_settings_raw( 'text_hover_color', $res_ctx->get_shortcode_att('text_hover_color') );
        $res_ctx->load_settings_raw( 'border_color', $res_ctx->get_shortcode_att('border_color') );
        $res_ctx->load_settings_raw( 'border_hover_color', $res_ctx->get_shortcode_att('border_hover_color') );
        $res_ctx->load_settings_raw( 'txt_color', $res_ctx->get_shortcode_att('txt_color') );
        $res_ctx->load_settings_raw( 'sep_color', $res_ctx->get_shortcode_att('sep_color') );


        /*-- fonts -- */
        $res_ctx->load_font_settings( 'f_cats' );
        $res_ctx->load_font_settings( 'f_txt' );

    }
    
    function __construct() {
        parent::disable_loop_block_features();
    }

    function render($atts, $content = null) {

        global $td_woo_state_single_product_page;

	    $product_categories_list = $td_woo_state_single_product_page->product_categories->__invoke($atts);
        
        parent::render($atts);


        // add_text
        $add_text = rawurldecode( base64_decode( strip_tags ( $this->get_att( 'add_text' ) ) ) );
        $add_text_html = '';
        if ( ! empty( $add_text ) ) {
            $add_text_html = '<span class="tdw-cat-text">' . $add_text . '</span>';
        }

        $buffy = '';

        $buffy .= '<div class="' . $this->get_block_classes()  . '" ' . $this->get_block_html_atts() . '>';

	        //get the block css
	        $buffy .= $this->get_block_css();

	        //get the js for this block
	        $buffy .= $this->get_block_js();


            $buffy .= '<div class="tdw-block-inner td-fix-index">';

                $buffy .= $add_text_html;

                $buffy .= $product_categories_list;

            $buffy .= '</div>';

        $buffy .= '</div>';

        return $buffy;
    }
}

