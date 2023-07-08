<?php

/**
 * Class td_woo_product_tags - shortcode for woocommerce single product page tags list
 */
class td_woo_product_tags extends td_block {

    public function get_custom_css() {
        // $unique_block_class
        $unique_block_class = $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>
            
                /* @general_style */
                .td_woo_product_tags {
                    margin-bottom: 10px;
                }
                .td_woo_product_tags span {
                    line-height: 1;
                    vertical-align: middle;
                }
                .td_woo_product_tags a {
                    position: relative;
                    display: inline-block;
                    line-height: 1;
                    vertical-align: middle;
                }
                .td_woo_product_tags a:before {
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
				.$unique_block_class .tdw-tag-text {
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
				
                /* @tag_padding */
				.$unique_block_class a {
					padding: @tag_padding;
				}
                /* @tag_space */
				.$unique_block_class a {
					margin: @tag_space;
				}
				/* @tag_radius */
				.$unique_block_class a:before {
					border-radius: @tag_radius;
				}
                /* @tag_border */
				.$unique_block_class a:before {
					border-width: @tag_border;
				}
				/* @tag_skew */
				.$unique_block_class a:before {
					transform: skew(@tag_skew);
                    -webkit-transform: skew(@tag_skew);
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
				.$unique_block_class .tdw-tag-text {
					color: @txt_color;
				}
                /* @sep_color */
				.$unique_block_class .tdw-tag-sep {
					color: @sep_color;
				}
				
				/* @show_sep */
				.$unique_block_class .tdw-tag-sep {
				    display: @show_sep;
				}
				
				/* @f_tags */
				.$unique_block_class a,
				.$unique_block_class .tdw-tag-sep {
					@f_tags
				}
				/* @f_txt */
				.$unique_block_class .tdw-tag-text {
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


        // tag_padding
        $tag_padding = $res_ctx->get_shortcode_att('tag_padding');
        $res_ctx->load_settings_raw( 'tag_padding', $tag_padding );
        if ( is_numeric( $tag_padding ) ) {
            $res_ctx->load_settings_raw( 'tag_padding', $tag_padding . 'px' );
        }
        // tag_space
        $tag_space = $res_ctx->get_shortcode_att('tag_space');
        $res_ctx->load_settings_raw( 'tag_space', $tag_space );
        if ( is_numeric( $tag_space ) ) {
            $res_ctx->load_settings_raw( 'tag_space', $tag_space . 'px' );
        }
        // tag_skew
        $tag_skew = $res_ctx->get_shortcode_att('tag_skew');
        if ( $tag_skew != 0 || !empty($tag_skew) ) {
            $res_ctx->load_settings_raw( 'tag_skew', $tag_skew . 'deg' );
        }
        // tag_radius
        $tag_radius = $res_ctx->get_shortcode_att('tag_radius');
        if ( $tag_radius != 0 || !empty($tag_radius) ) {
            $res_ctx->load_settings_raw( 'tag_radius', $tag_radius . 'px' );
        }

        // tag_border
        $res_ctx->load_settings_raw( 'tag_border', $res_ctx->get_shortcode_att('tag_border') . 'px' );

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
        $res_ctx->load_font_settings( 'f_tags' );
        $res_ctx->load_font_settings( 'f_txt' );
    }
    
    function __construct() {
        parent::disable_loop_block_features();
    }

    function render($atts, $content = null) {

        global $td_woo_state_single_product_page;

	    $product_tags_list = $td_woo_state_single_product_page->product_tags->__invoke($atts);
        
        parent::render($atts);


        // add_text
        $add_text = rawurldecode( base64_decode( strip_tags ( $this->get_att( 'add_text' ) ) ) );
        $add_text_html = '';
        if ( ! empty( $add_text ) ) {
            $add_text_html = '<span class="tdw-tag-text">' . $add_text . '</span>';
        }

	    $buffy = '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';

	        //get the block css
	        $buffy .= $this->get_block_css();

	        //get the js for this block
	        $buffy .= $this->get_block_js();

            $buffy .= '<div class="tdw-block-inner td-fix-index">';
                $buffy .= $add_text_html;
                $buffy .= $product_tags_list;
            $buffy .= '</div>';

        $buffy .= '</div>';

        return $buffy;
    }
}

