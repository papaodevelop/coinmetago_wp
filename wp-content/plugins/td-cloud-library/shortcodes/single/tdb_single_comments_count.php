<?php

/**
 * Class td_single_comments_count
 */

class tdb_single_comments_count extends td_block {

    public function get_custom_css() {
        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $in_composer = td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax();
        $in_element = td_global::get_in_element();
        $unique_block_class_prefix = '';
        if( $in_element || $in_composer ) {
            $unique_block_class_prefix = 'tdc-row';

            if( $in_element && $in_composer ) {
                $unique_block_class_prefix = 'tdc-row-composer';
            }
        }
        $general_block_class = $unique_block_class_prefix ? '.' . $unique_block_class_prefix : '';
        $unique_block_class = ( $unique_block_class_prefix ? $unique_block_class_prefix . ' .' : '' ) . ( $in_composer ? 'tdc-column .' : '' ) . $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>

                /* @style_general_comments_count */
                $general_block_class .tdb_single_comments_count {
                  line-height: 30px;
                }
                $general_block_class .tdb_single_comments_count .tdb-comm-icon-svg {
                  position: relative;
                  line-height: 0;
                }
                $general_block_class .tdb_single_comments_count svg {
                  height: auto;
                }
                $general_block_class .tdb_single_comments_count svg,
                $general_block_class .tdb_single_comments_count svg * {
                  fill: #444;
                }
                
                /* @add_text_space_right */
                .$unique_block_class .tdb-add-text {
                    margin-right: @add_text_space_right;
                }
                /* @add_text_space_left */
                .$unique_block_class .tdb-add-text {
                    margin-left: @add_text_space_left;
                }
                /* @float_right */
                .$unique_block_class {
                    float: right;
                }
                /* @make_inline */
                .$unique_block_class {
                    display: inline-block;
                }                
                /* @icon_size */
                .$unique_block_class i {
                    font-size: @icon_size;
                }             
                /* @icon_svg_size */
                .$unique_block_class svg {
                    width: @icon_svg_size;
                }
                /* @icon_space */
                .$unique_block_class .tdb-comm-icon {
                    margin-right: @icon_space;
                }
                /* @comms_color */
				.$unique_block_class a {
					color: @comms_color;
				}
				.$unique_block_class a svg,
				.$unique_block_class a svg * {
					fill: @comms_color;
				}
                /* @icon_color */
				.$unique_block_class a i {
					color: @icon_color;
				}
				.$unique_block_class a svg,
				.$unique_block_class a svg * {
					fill: @icon_color;
				}
				/* @comms_h_color */
				.$unique_block_class a:hover {
					color: @comms_h_color;
				}
				.$unique_block_class a:hover svg,
				.$unique_block_class a:hover svg * {
					fill: @comms_h_color;
				}
                /* @icon_h_color */
				.$unique_block_class a:hover i {
					color: @icon_h_color;
				}
				.$unique_block_class a:hover svg,
				.$unique_block_class a:hover svg * {
					fill: @icon_h_color;
				}
				/* @f_comms */
				.$unique_block_class {
					@f_comms
				}
				/* @icon_align */
				.$unique_block_class .tdb-comm-icon {
					position: relative;
					top: @icon_align;
				}
				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'style_general_post_meta', 1 );
        $res_ctx->load_settings_raw( 'style_general_comments_count', 1 );

        // additional text space
        $add_text_pos = $res_ctx->get_shortcode_att( 'add_text_pos' );
        $add_text_space = $res_ctx->get_shortcode_att( 'add_text_space' );
        if( $add_text_pos == '' ) {
            if( $add_text_space != '' && is_numeric( $add_text_space ) ) {
                $res_ctx->load_settings_raw( 'add_text_space_right', $add_text_space . 'px' );
            }
        } else {
            if( $add_text_space != '' && is_numeric( $add_text_space ) ) {
                $res_ctx->load_settings_raw( 'add_text_space_left', $add_text_space . 'px' );
            }
        }

	    // icon_align
	    $icon_align = $res_ctx->get_shortcode_att('icon_align');
	    if ( $icon_align != 0 || !empty($icon_align) ) {
		    $res_ctx->load_settings_raw( 'icon_align', $icon_align . 'px' );
	    }

        // float right
        $res_ctx->load_settings_raw( 'float_right', $res_ctx->get_shortcode_att('float_right') );
        $res_ctx->load_settings_raw( 'make_inline', $res_ctx->get_shortcode_att('make_inline') );



        /*-- VIEWS ICON -- */
        $icon = $res_ctx->get_icon_att('tdicon');
        // icon size
        $icon_size = $res_ctx->get_shortcode_att('icon_size');
        if( base64_encode( base64_decode( $icon ) ) == $icon ) {
            $res_ctx->load_settings_raw( 'icon_size', $icon_size );
            if( $icon_size != '' ) {
                if( is_numeric( $icon_size ) ) {
                    $res_ctx->load_settings_raw( 'icon_svg_size', $icon_size . 'px' );
                }
            } else {
                $res_ctx->load_settings_raw( 'icon_svg_size', '9px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'icon_size', $icon_size );
            if( $icon_size != '' ) {
                if( is_numeric( $icon_size ) ) {
                    $res_ctx->load_settings_raw( 'icon_size', $icon_size . 'px' );
                }
            } else {
                $res_ctx->load_settings_raw( 'icon_size', '9px' );
            }
        }

        // icon space
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
        // comments color
        $comms_color = $res_ctx->get_shortcode_att('comms_color');
        $res_ctx->load_settings_raw( 'comms_color', '#444' );
        if( $comms_color != '' ) {
            $res_ctx->load_settings_raw( 'comms_color', $comms_color );
        }

        // comments icon color
        $res_ctx->load_settings_raw( 'icon_color', $res_ctx->get_shortcode_att('icon_color') );

        // comments hover color
        $res_ctx->load_settings_raw( 'comms_h_color', $res_ctx->get_shortcode_att('comms_h_color') );

        // comments icon hover color
        $res_ctx->load_settings_raw( 'icon_h_color', $res_ctx->get_shortcode_att('icon_h_color') );



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_comms' );

    }

    /**
     * Disable loop block features. This block does not use a loop and it doesn't need to run a query.
     */
    function __construct() {
        parent::disable_loop_block_features();
    }


    function render( $atts, $content = null ) {
        parent::render( $atts ); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query)

        global $tdb_state_single;

        $post_comm_data = $tdb_state_single->post_comments_count->__invoke();

        // additional text
        $add_text = '<span class="tdb-add-text">' . $this->get_att( 'add_text' ) . '</span>';
        $add_text_pos = $this->get_att( 'add_text_pos' );

        // comments icon
        $comments_icon = $this->get_icon_att( 'tdicon' );
        $comments_icon_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $comments_icon_data = 'data-td-svg-icon="' . $this->get_att('tdicon') . '"';
        }
        $comments_icon_html = '';
        if ( $comments_icon != '' ) {
            if( base64_encode( base64_decode( $comments_icon ) ) == $comments_icon ) {
                $comments_icon_html = '<span class="tdb-comm-icon tdb-comm-icon-svg" ' . $comments_icon_data . '>' . base64_decode( $comments_icon ) . '</span>';
            } else {
                $comments_icon_html = '<i class="tdb-comm-icon ' . $comments_icon . '"></i>';
            }
        }


        $buffy = ''; //output buffer

        $buffy .= '<div class="' . $this->get_block_classes() . ' tdb-post-meta" ' . $this->get_block_html_atts() . '>';

            //get the block css
            $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();


            $buffy .= '<div class="tdb-block-inner td-fix-index">';
                $buffy .= '<a href="' . $post_comm_data['comments_link'] . '">';
                    $buffy .= $comments_icon_html;

                    if( $add_text != '' && $add_text_pos == '' ) {
                        $buffy .= $add_text;
                    }

                    $buffy .= '<span>' . $post_comm_data['comments_number'] . '</span>';

                    if( $add_text != '' && $add_text_pos == 'after' ) {
                        $buffy .= $add_text;
                    }
                $buffy .= '</a>';
            $buffy .= '</div>';

        $buffy .= '</div>';

        return $buffy;
    }


    private function inner() {

        $buffy = '';
        $buffy .= '<div class="td-post-comments">';


        $buffy .= '</div>';

        return $buffy;

    }

}