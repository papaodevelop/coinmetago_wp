<?php

/**
 * Class td_woo_title - shortcode for rendering the woocommerce products page titles
 */
class td_woo_title extends td_block {

    public function get_custom_css() {

        // $unique_block_class
        $unique_block_class = $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>
            
                /* @general */
                .$unique_block_class .tdw-block-inner {
                    display: flex;
                    flex-direction: column;
                }
                .$unique_block_class .tdw-title-text {
                    display: inline-block;
                    position: relative;
                    margin: 0;
                    font-size: 28px;
                    line-height: 36px;
                    font-weight: 400;
                    word-wrap: break-word;
                    pointer-events: none;
                }
                .$unique_block_class .tdw-first-letter {
                    position: absolute;
                    -webkit-user-select: none;
                    user-select: none;
                    pointer-events: none;
                    text-transform: uppercase;
                    color: rgba(0,0,0,0.08);
                    font-size: 6em;
                    font-weight: 300;
                    top: 50%;
                    transform: translateY(-50%);
                    left: -0.36em;
                    z-index: -1;
                    -webkit-text-fill-color: initial;
                }
                .$unique_block_class .tdw-title-line {
                    display: none;
                    position: relative;
                }
                .$unique_block_class .tdw-title-line:after {
                    content: '';
                    width: 100%;
                    position: absolute;
                    background-color: #4db2ec;
                    top: 0;
                    left: 0;
                    margin: auto;
                }
                
                
                
                /* @add_text_space_bottom */
                .$unique_block_class .tdw-add-text {
                    margin-bottom: @add_text_space_bottom;
                }
                /* @add_text_space_right */
                .$unique_block_class .tdw-add-text {
                    margin-right: @add_text_space_right;
                }
                /* @add_text_space_left */
                .$unique_block_class .tdw-add-text {
                    margin-left: @add_text_space_left;
                }
                
                
                /* @title_color_solid */
				.$unique_block_class .tdw-title-text {
					color: @title_color_solid;
				}
				/* @title_color_gradient */
				.$unique_block_class .tdw-title-text {
					@title_color_gradient
					-webkit-background-clip: text;
					-webkit-text-fill-color: transparent;
				}
				html[class*='ie'] .$unique_block_class .tdw-title-text {
				    background: none;
					color: @title_color_gradient_1;
				}
				/* @add_color_solid */
				.$unique_block_class .tdw-add-text {
					color: @add_color_solid;
				}
				/* @add_color_gradient */
				.$unique_block_class .tdw-add-text {
					@add_color_gradient
					-webkit-background-clip: text;
					-webkit-text-fill-color: transparent;
				}
				html[class*='ie'] .$unique_block_class .tdw-add-text {
				    background: none;
					color: @add_color_gradient_1;
				}
				/* @style_bg */
				.$unique_block_class .tdw-title-text  {
					-webkit-text-fill-color: initial;
					background: @style_bg;
					-webkit-box-decoration-break: clone;
					box-decoration-break: clone;
					padding: 5px 16px;
					display: inline;
				}
				/* @style_bg_gradient */
				.$unique_block_class .tdw-title-text  {
					-webkit-text-fill-color: initial;
					background: @style_bg_gradient;
					-webkit-box-decoration-break: clone;
					box-decoration-break: clone;
					padding: 5px 16px;
					display: inline;
				}
				/* @style_bg_space */
				.$unique_block_class .tdw-title-text  {
					padding: @style_bg_space;
				}
				/* @fl_align */
				.$unique_block_class .tdw-first-letter  {
					margin-top: @fl_align;
				}
				/* @line_width */
				.$unique_block_class .tdw-title-line  {
				    display: inline-block;
					width: @line_width;
				}
				/* @line_height */
				.$unique_block_class .tdw-title-line:after  {
					height: @line_height;
				}
				/* @line_space */
				.$unique_block_class .tdw-title-line  {
					height: @line_space;
				}
				/* @line_alignment */
				.$unique_block_class .tdw-title-line:after   {
					bottom: @line_alignment;
				}
				/* @line_color */
				.$unique_block_class .tdw-title-line:after {
					background: @line_color;
				}
				/* @line_color_gradient */
				.$unique_block_class .tdw-title-line:after {
					@line_color_gradient
				}
				/* @align_center */
				.td-theme-wrap .$unique_block_class .tdw-block-inner {
					align-items: center;
				}
				.$unique_block_class .tdw-first-letter {
					left: 0;
					right: 0;
				}
				.$unique_block_class .tdw-title-text {
				    text-align: center;
				}
				/* @align_right */
				.td-theme-wrap .$unique_block_class .tdw-block-inner {
					align-items: flex-end;
				}	
				.$unique_block_class .tdw-first-letter {
					left: auto;
					right: -0.36em;
				}
				.$unique_block_class .tdw-title-text {
				    text-align: right;
				}
				/* @align_left */
				.td-theme-wrap .$unique_block_class .tdw-block-inner {
					align-items: flex-start;
				}
				.$unique_block_class .tdw-first-letter {
					left: -0.36em;
					right: auto;
				}
				.$unique_block_class .tdw-title-text {
				    text-align: left;
				}
				/* @f_title */
				.$unique_block_class .tdw-title-text {
					@f_title
				}
				/* @f_letter */
				.$unique_block_class .tdw-first-letter {
					@f_letter
				}
				/* @f_add */
				.$unique_block_class .tdw-add-text {
					@f_add
				}
				/* @fl_color */
				.$unique_block_class .tdw-first-letter {
					color: @fl_color;
				}
            
            </style>";

        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        // general style
        $res_ctx->load_settings_raw('general', 1);



        // title color
        $res_ctx->load_color_settings( 'title_color', 'title_color_solid', 'title_color_gradient', 'title_color_gradient_1', '' );

        // additional text color
        $res_ctx->load_color_settings( 'add_color', 'add_color_solid', 'add_color_gradient', 'add_color_gradient_1', '' );

        // content align
        $content_align = $res_ctx->get_shortcode_att('content_align_horizontal');
        if ( $content_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'align_center', 1 );
        } else if ( $content_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'align_right', 1 );
        } else if ( $content_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'align_left', 1 );
        }

        // additional text space
        $add_text_position = $res_ctx->get_shortcode_att('add_text_pos');
        $add_text_space = $res_ctx->get_shortcode_att('add_text_space');
        if( $add_text_space != '' && is_numeric( $add_text_space ) ) {
            if( $add_text_position == 'above' ) {
                $res_ctx->load_settings_raw( 'add_text_space_bottom', $add_text_space . 'px' );
            }
            if( $add_text_position == '' ) {
                $res_ctx->load_settings_raw( 'add_text_space_right', $add_text_space . 'px' );
            }
            if( $add_text_position == 'after' ) {
                $res_ctx->load_settings_raw( 'add_text_space_left', $add_text_space . 'px' );
            }
        }

        /*-- LINE -- */
        // line width
        $line_width = $res_ctx->get_shortcode_att('line_width');
        $res_ctx->load_settings_raw( 'line_width', $line_width );
        if( $line_width != '' && is_numeric( $line_width ) ) {
            $res_ctx->load_settings_raw( 'line_width', $line_width . 'px' );
        }

        // line height
        $line_height = $res_ctx->get_shortcode_att('line_height');
        $res_ctx->load_settings_raw( 'line_height', '2px' );
        if( $line_height != '' ) {
            if( is_numeric( $line_height ) ) {
                $res_ctx->load_settings_raw( 'line_height', $line_height . 'px' );
            }
        }

        // line space
        $line_space = $res_ctx->get_shortcode_att('line_space');
        $res_ctx->load_settings_raw( 'line_space', '50px' );
        if( $line_space != '' ) {
            if( is_numeric( $line_space ) ) {
                $res_ctx->load_settings_raw( 'line_space', $line_space . 'px' );
            }
        }

        // line alignment
        $line_alignment = $res_ctx->get_shortcode_att( 'line_alignment' );
        if( is_numeric( $line_alignment ) ) {
            $res_ctx->load_settings_raw( 'line_alignment', $line_alignment . '%' );
        }

        // style_bg
        $res_ctx->load_color_settings( 'style_bg', 'style_bg', 'style_bg_gradient', '', '' );
        // style_bg_space
        $style_bg_space = $res_ctx->get_shortcode_att( 'style_bg_space' );
        $res_ctx->load_settings_raw( 'style_bg_space', $style_bg_space );
        if( $style_bg_space != '' && is_numeric( $style_bg_space ) ) {
            $res_ctx->load_settings_raw( 'style_bg_space', $style_bg_space . 'px' );
        }

        // first letter v alignment
        $fl_align = $res_ctx->get_shortcode_att( 'fl_align' );
        if ( $fl_align != '0' ) {
            $res_ctx->load_settings_raw( 'fl_align', $fl_align . 'px');
        }
        // color
        $res_ctx->load_settings_raw( 'fl_color', $res_ctx->get_shortcode_att('fl_color') );

        // line color
        $res_ctx->load_color_settings( 'line_color', 'line_color', 'line_color_gradient', '', '' );



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_title' );
        $res_ctx->load_font_settings( 'f_letter' );
        $res_ctx->load_font_settings( 'f_add' );

    }

    function __construct() {
        parent::disable_loop_block_features();
    }

    function render($atts, $content = null) {

	    global $td_woo_state_single_product_page, $td_woo_state_archive_product_page, $td_woo_state_search_archive_product_page, $td_woo_state_shop_base_page;

	    switch( tdb_state_template::get_template_type() ) {

		    case 'woo_product':
			    $title_data = $td_woo_state_single_product_page->product_title->__invoke($atts);
			    break;

		    case 'woo_archive':
			    $title_data = $td_woo_state_archive_product_page->title->__invoke($atts);
			    break;

		    case 'woo_search_archive':
			    $title_data = $td_woo_state_search_archive_product_page->title->__invoke($atts);
			    break;

		    case 'woo_shop_base':
			    $title_data = $td_woo_state_shop_base_page->title->__invoke($atts);
			    break;

		    default:
			    $title_data = array(
				    'title' => '',
				    'class' => ''
			    );
	    }

        parent::render($atts);

        // title line
        $add_text = $this->get_att('add_text');
        $add_text_position = $this->get_att( 'add_text_pos' );
        $title_line_position = $this->get_att( 'line_position' );
        $title_tag = $this->get_att( 'title_tag' );
        $first_letter = $this->get_att( 'first_letter' );
        $title_letter = '';

        $buffy = '';

	    $buffy .= '<div class="' . $this->get_block_classes( array( $title_data['class'] ) )  . '" ' . $this->get_block_html_atts() . '>';
	    if( ! empty( $title_data['title'] ) ) {

		    //get the block css
            $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();

            $buffy .= '<div class="tdw-block-inner td-fix-index">';

                if( $title_line_position == 'above' ) {
                    $buffy .= '<div class="tdw-title-line"></div>';
                }

                if ( $first_letter ) {
                    $title_letter = '<div class="tdw-first-letter">' . substr( $title_data['title'], 0, 1 ) . '</div>';
                }

                if( $add_text_position == 'above' && $add_text != '' ) {
                    $buffy .= '<div class="tdw-add-text">' . $add_text . '</div>';
                }

                $buffy .= '<' . $title_tag . ' class="tdw-title-text">';
                    if( $add_text_position == '' && $add_text != '' ) {
                        $buffy .= '<span class="tdw-add-text">' . $add_text . '</span>';
                    }

                    $buffy .= $title_data['title'] . $title_letter;

                    if( $add_text_position == 'after' && $add_text != '' ) {
                        $buffy .= '<span class="tdw-add-text">' . $add_text . '</span>';
                    }
                $buffy .= '</' . $title_tag . '>';

                if( $title_line_position == '' ) {
                    $buffy .= '<div class="tdw-title-line"></div>';
                }

            $buffy .= '</div>';

	    }
	    $buffy .= '</div>';

	    return $buffy;
    }
}

