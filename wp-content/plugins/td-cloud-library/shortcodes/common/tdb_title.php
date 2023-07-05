<?php

/**
 * Class td_title - common shortcode for all pages titles
 */
class tdb_title extends td_block {

    public function get_custom_css() {
        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $in_composer = td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax();
        $in_element = td_global::get_in_element();
        $unique_block_class_prefix = '';
        if( $in_element || $in_composer ) {
            $unique_block_class_prefix = 'tdc-row .';

            if( $in_element && $in_composer ) {
                $unique_block_class_prefix = 'tdc-row-composer .';
            }
        }
        $unique_block_class = $unique_block_class_prefix . $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>
            
                /* @style_general_single_title */
                .tdb_title {
                  margin-bottom: 19px;
                }
                .tdb_title.tdb-content-horiz-center {
                  text-align: center;
                }
                .tdb_title.tdb-content-horiz-center .tdb-title-line {
                  margin: 0 auto;
                }
                .tdb_title.tdb-content-horiz-right {
                  text-align: right;
                }
                .tdb_title.tdb-content-horiz-right .tdb-title-line {
                  margin-left: auto;
                  margin-right: 0;
                }
                .tdb-title-text {
                  display: inline-block;
                  position: relative;
                  margin: 0;
                  word-wrap: break-word;
                  font-size: 30px;
                  line-height: 38px;
                  font-weight: 700;
                }
                .tdb-first-letter {
                  position: absolute;
                  -webkit-user-select: none;
                  user-select: none;
                  pointer-events: none;
                  text-transform: uppercase;
                  color: rgba(0, 0, 0, 0.08);
                  font-size: 6em;
                  font-weight: 300;
                  top: 50%;
                  -webkit-transform: translateY(-50%);
                  transform: translateY(-50%);
                  left: -0.36em;
                  z-index: -1;
                  -webkit-text-fill-color: initial;
                }
                .tdb-title-line {
                  display: none;
                  position: relative;
                }
                .tdb-title-line:after {
                  content: '';
                  width: 100%;
                  position: absolute;
                  background-color: #4db2ec;
                  top: 0;
                  left: 0;
                  margin: auto;
                }
                
                /* @style_general_title_single */
                .tdb-single-title .tdb-title-text {
                  font-size: 41px;
                  line-height: 50px;
                  font-weight: 400;
                }
                
                /* @style_general_title_attachment */
                .tdb-attachment-title .tdb-title-text {
                   font-weight: 400;
                }
                
                /* @style_general_title_date */
                .tdb-date-title .tdb-title-text {
                  font-weight: 400;
                }
                
                /* @style_general_title_tag */
                .tdb-tag-title .tdb-title-text {
                  font-weight: 400;
                }
                
                /* @style_general_title_category */
                .tdb-category-title .tdb-title-text {
                  text-transform: uppercase;
                }

                /* @style_general_title_author */
                .tdb-author-title .tdb-title-text {
                  font-weight: 400;
                }
                
                /* @style_general_title_search */
                .tdb-search-title .tdb-title-text {
                  font-weight: 400;
                }
                
                
                
                /* @add_text_space_bottom */
				.$unique_block_class .tdb-add-text {
					margin-bottom: @add_text_space_bottom;
				}
                /* @add_text_space_right */
				.$unique_block_class .tdb-add-text {
					margin-right: @add_text_space_right;
				}
                /* @add_text_space_left */
				.$unique_block_class .tdb-add-text {
					margin-left: @add_text_space_left;
				}
				

                /* @title_color_solid */
				.$unique_block_class .tdb-title-text {
					color: @title_color_solid;
				}
				/* @title_color_gradient */
				.$unique_block_class .tdb-title-text {
					@title_color_gradient
					-webkit-background-clip: text;
					-webkit-text-fill-color: transparent;
				}
				html[class*='ie'] .$unique_block_class .tdb-title-text {
				    background: none;
					color: @title_color_gradient_1;
				}
				/* @add_color_solid */
				.$unique_block_class .tdb-add-text {
					color: @add_color_solid;
				}
				/* @add_color_gradient */
				.$unique_block_class .tdb-add-text {
					@add_color_gradient
					-webkit-background-clip: text;
					-webkit-text-fill-color: transparent;
				}
				html[class*='ie'] .$unique_block_class .tdb-add-text {
				    background: none;
					color: @add_color_gradient_1;
				}
				/* @style_bg */
				.$unique_block_class .tdb-title-text  {
					-webkit-text-fill-color: initial;
					background: @style_bg;
					-webkit-box-decoration-break: clone;
					box-decoration-break: clone;
					padding: 5px 16px;
					display: inline;
				}
				/* @style_bg_gradient */
				.$unique_block_class .tdb-title-text  {
					-webkit-text-fill-color: initial;
					background: @style_bg_gradient;
					-webkit-box-decoration-break: clone;
					box-decoration-break: clone;
					padding: 5px 16px;
					display: inline;
				}
				/* @style_bg_space */
				.$unique_block_class .tdb-title-text  {
					padding: @style_bg_space;
				}
				/* @fl_align */
				.$unique_block_class .tdb-first-letter  {
					margin-top: @fl_align;
				}
				/* @line_width */
				.$unique_block_class .tdb-title-line  {
				    display: inline-block;
					width: @line_width;
				}
				/* @line_height */
				.$unique_block_class .tdb-title-line:after  {
					height: @line_height;
				}
				/* @line_space */
				.$unique_block_class .tdb-title-line  {
					height: @line_space;
				}
				/* @line_alignment */
				.$unique_block_class .tdb-title-line:after   {
					bottom: @line_alignment;
				}
				/* @line_color */
				.$unique_block_class .tdb-title-line:after {
					background: @line_color;
				}
				/* @line_color_gradient */
				.$unique_block_class .tdb-title-line:after {
					@line_color_gradient
				}
				/* @align_center */
				.td-theme-wrap .$unique_block_class {
					text-align: center;
				}
				.$unique_block_class .tdb-first-letter {
					left: 0;
					right: 0;
				}
				.$unique_block_class .tdb-title-line {
					margin-left: auto;
					margin-right: auto;
				}
				/* @align_right */
				.td-theme-wrap .$unique_block_class {
					text-align: right;
				}	
				.$unique_block_class .tdb-first-letter {
					left: auto;
					right: -0.36em;
				}
				.$unique_block_class .tdb-title-line {
					margin-left: auto;
				}
				/* @align_left */
				.td-theme-wrap .$unique_block_class {
					text-align: left;
				}
				.$unique_block_class .tdb-first-letter {
					left: -0.36em;
					right: auto;
				}
				/* @f_title */
				.$unique_block_class .tdb-title-text {
					@f_title
				}
				/* @f_letter */
				.$unique_block_class .tdb-first-letter {
					@f_letter
				}
				/* @f_add */
				.$unique_block_class .tdb-add-text {
					@f_add
				}
				/* @fl_color */
				.$unique_block_class .tdb-first-letter {
					color: @fl_color;
				}
				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'style_general_single_title', 1 );

        switch( tdb_state_template::get_template_type() ) {
            case 'cpt':
            case 'single':
                $res_ctx->load_settings_raw( 'style_general_title_single', 1 );
                break;
            case 'category':
                $res_ctx->load_settings_raw( 'style_general_title_category', 1 );
                break;
            case 'author':
                $res_ctx->load_settings_raw( 'style_general_title_author', 1 );
                break;
            case 'search':
                $res_ctx->load_settings_raw( 'style_general_title_search', 1 );
                break;
            case 'date':
                $res_ctx->load_settings_raw( 'style_general_title_date', 1 );
                break;
            case 'tag':
                $res_ctx->load_settings_raw( 'style_general_title_tag', 1 );
                break;
            case 'attachment':
                $res_ctx->load_settings_raw( 'style_general_title_attachment', 1 );
                break;
        }

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

        global $tdb_state_single, $tdb_state_category, $tdb_state_author, $tdb_state_search, $tdb_state_date, $tdb_state_tag, $tdb_state_attachment, $tdb_state_single_page;

        $title_data = array();

        switch( tdb_state_template::get_template_type() ) {

            case 'cpt':
            case 'single':
                $title_data = $tdb_state_single->post_title->__invoke( $atts );
                break;

            case 'cpt_tax':
            	$tdb_state_category->set_tax();
            	$title_data = $tdb_state_category->category_title->__invoke( $atts );
            	break;

            case 'category':
                $title_data = $tdb_state_category->category_title->__invoke( $atts );
                break;

            case 'author':
                $title_data = $tdb_state_author->title->__invoke( $atts );
                break;

            case 'search':
                $title_data = $tdb_state_search->title->__invoke( $atts );
                break;

            case 'date':
                $title_data = $tdb_state_date->title->__invoke( $atts );
                break;

            case 'tag':
                $title_data = $tdb_state_tag->title->__invoke( $atts );
                break;

            case 'attachment':
                $title_data = $tdb_state_attachment->title->__invoke( $atts );
                break;

            default:
                $title_data = $tdb_state_single_page->title->__invoke( $atts );

        }

        //var_dump($atts);

        parent::render($atts); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query)


        // title line
        $add_text = $this->get_att('add_text');
        $add_text_position = $this->get_att( 'add_text_pos' );
        $page_no_txt = $this->get_att( 'page_no_txt' );
        $page_no = isset( $title_data['page_number'] ) ? $title_data['page_number'] : '';
        $title_line_position = $this->get_att( 'line_position' );
        $title_tag = $this->get_att( 'title_tag' );
        $first_letter = $this->get_att( 'first_letter' );
	    $title_letter = '';

        $buffy = ''; //output buffer

        if( ! empty( $title_data['title'] ) || ( empty( $title_data['title'] ) && tdb_state_template::get_template_type() === 'search' ) ) {
            $buffy .= '<div class="' . $this->get_block_classes( array($title_data['class']) )  . '" ' . $this->get_block_html_atts() . '>';

            //get the block css
            $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();


            $buffy .= '<div class="tdb-block-inner td-fix-index">';

                if( $page_no_txt == '' ) {
                    $page_no_txt = __td('Page', TD_THEME_NAME);
                }

                if( $title_line_position == 'above' ) {
                    $buffy .= '<div class="tdb-title-line"></div>';
                }

                $title_letter = '';
                if ( $first_letter == true ) {
                    if( mb_substr( $title_data['title'], 0, 5 ) == '&#821' ) {
                        $title_letter = '\'';
                    } else if( mb_substr( $title_data['title'], 0, 5 ) == '&#822' ) {
                        $title_letter = '"';
                    } else {
                        $title_letter = mb_substr( $title_data['title'], 0, 1 );
                    }
                }


                if( $add_text_position == 'above' && $add_text != '' ) {
                    $buffy .= '<div class="tdb-add-text">' . $add_text . '</div>';
                }

                    $buffy .= '<' . $title_tag . ' class="tdb-title-text">';
                        if( $add_text_position == '' && $add_text != '' ) {
                            $buffy .= '<span class="tdb-add-text">' . $add_text . '</span>';
                        }

                        $buffy .= $title_data['title'];

                        if( $title_letter != '' ) {
                            $buffy .= '<div class="tdb-first-letter">' . $title_letter . '</div>';
                        }

                        if( $add_text_position == 'after' && $add_text != '' ) {
                            $buffy .= '<span class="tdb-add-text">' . $add_text . '</span>';
                        }

                        if( $this->get_att('page_no') != '' && $page_no != '' ) {
                            if( $this->get_att('page_hide_first') != '' && $page_no == 1 ) {
                                $buffy .= '';
                            } else {
                                $buffy .= '<span class="tdb-title-page"> - ' . $page_no_txt . ' ' . $page_no . '</span>';
                            }
                        }
                    $buffy .= '</' . $title_tag . '>';

                    $buffy .= '<div></div>'; // this keep the inline-block of the elements

                    if( $title_line_position == '' ) {
                        $buffy .= '<div class="tdb-title-line"></div>';
                    }

                $buffy .= '</div>';

            $buffy .= '</div>';
        }

        return $buffy;
    }
}

