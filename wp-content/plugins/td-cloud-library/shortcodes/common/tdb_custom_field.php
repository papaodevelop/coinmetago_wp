<?php

/**
 * Class tdb_single_custom_field
 */

class tdb_single_custom_field extends td_block {

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

                /* @style_general_tdb_single_custom_field */
                .tdb_single_custom_field {
                    font-size: 14px;
                    line-height: 1.6;
                }
                .tdb_single_custom_field .tdb-block-inner {
                    display: flex;
                }
                .tdb_single_custom_field .tdb-cf-icon {
                    align-self: center;
                    position: relative;
                }
                .tdb_single_custom_field .tdb-cf-icon-svg svg {
                    display: block;
                    width: 14px;
                    height: auto;
                }
                .tdb_single_custom_field .tdb-sacff-txt,
                .tdb_single_custom_field .tdb-sacff-img-wrapp,
                .tdb_single_custom_field .tdb-sacff-terms {
                    flex: 1;
                }
                .tdb_single_custom_field .tdb-sacff-img {
                    display: block;
                    width: 100%;
                    height: auto;
                }
                .tdb_single_custom_field .tdb-sacff-terms {
                    display: flex;
                    flex-wrap: wrap;
                }
                .tdb_single_custom_field .tdb-sacff-term {
                    position: relative;
                    margin: 0 5px 0 0;
                    padding: 5px 8px;
                    font-size: 12px;
                    line-height: 1;
                    color: #fff;
                }
                .tdb_single_custom_field .tdb-sacff-term-bg {
                    position: absolute;
                    top: 0;
                    left: 0;
                    background-color: #222;
                    border: 1px solid #222;
                    width: 100%;
                    height: 100%;
                    z-index: -1;
                }
                .tdb_single_custom_field .tdb-sacff-term:hover .tdb-sacff-term-bg {
                    opacity: .9;
                }
                .tdb_single_custom_field.tdb-sacff-type-textarea .tdb-sacff-txt {
                    white-space: pre-wrap;
                }
                
                
                /* @display */
                body .$unique_block_class .tdb-block-inner {
                    flex-direction: @display;
                }
                
                /* @make_inline */
                body .$unique_block_class {
                    display: inline-block;
                }
                
                /* @horiz_align */
                body .$unique_block_class .tdb-block-inner {
                    justify-content: @horiz_align;
                }
                /* @horiz_align_txt */
                body .$unique_block_class .tdb-sacff-txt,
                body .$unique_block_class .tdb-cf-add-txt {
                    text-align: @horiz_align_txt;
                }
                
                /* @vert_align */
                body .$unique_block_class .tdb-block-inner {
                    align-items: @vert_align;
                }
                
                /* @add_txt_width */
                body .$unique_block_class .tdb-cf-add-txt {
                    width: @add_txt_width;
                }
                
                /* @add_txt_space */
                body .$unique_block_class .tdb-cf-add-txt {
                    margin: @add_txt_space;
                }
                
                /* @icon_size */
                body .$unique_block_class i.tdb-cf-icon {
                    font-size: @icon_size;
                }
                body .$unique_block_class .tdb-cf-icon-svg svg {
                    width: @icon_size;
                }
                /* @icon_space */
                body .$unique_block_class .tdb-cf-icon {
                    margin: @icon_space;
                }
                /* @icon_align */
                body .$unique_block_class .tdb-cf-icon {
                    top: @icon_align;
                }
                
                
                /* @tax_padding */
                body .$unique_block_class .tdb-sacff-term {
                    padding: @tax_padding;
                }
                /* @tax_space */
                body .$unique_block_class .tdb-sacff-term {
                    margin: @tax_space;
                }
                /* @tax_skew */
                body .$unique_block_class .tdb-sacff-term-bg {
                    transform: skew(@tax_skew);
                    -webkit-transform: skew(@tax_skew);
                }
                /* @tax_border */
                body .$unique_block_class .tdb-sacff-term-bg {
                    border-width: @tax_border;
                }
                /* @tax_radius */
                body .$unique_block_class .tdb-sacff-term-bg {
                    border-radius: @tax_radius;
                }
                
                
                /* @txt_color */
                body .$unique_block_class,
                body .$unique_block_class .tdb-sacff-txt a,
                body .$unique_block_class i.tdb-cf-icon {
                    color: @txt_color;
                }
                body .$unique_block_class .tdb-cf-icon-svg svg {
                    fill: @txt_color;
                }
                /* @txt_color_h */
                body .$unique_block_class .tdb-sacff-txt a:hover {
                    color: @txt_color_h;
                }
                
                /* @add_txt_color */
                body .$unique_block_class .tdb-cf-add-txt {
                    color: @add_txt_color;
                }
                /* @icon_color */
                body .$unique_block_class i.tdb-cf-icon {
                    color: @icon_color;
                }
                body .$unique_block_class .tdb-cf-icon-svg svg {
                    fill: @icon_color;
                }
                
                /* @tax_color */
                body .$unique_block_class .tdb-sacff-term {
                    color: @tax_color !important;
                }
                /* @tax_color_h */
                body .$unique_block_class .tdb-sacff-term:hover {
                    color: @tax_color_h !important;
                }
                /* @tax_bg_solid */
                body .$unique_block_class .tdb-sacff-term-bg {
                    background-color: @tax_bg_solid !important;
                }
                /* @tax_bg_gradient */
                body .$unique_block_class .tdb-sacff-term-bg {
                    @tax_bg_gradient
                }
                /* @tax_bg_h_solid */
                body .$unique_block_class .tdb-sacff-term:hover .tdb-sacff-term-bg {
                    background-color: @tax_bg_h_solid !important;
                }
                /* @tax_bg_h_gradient */
                body .$unique_block_class .tdb-sacff-term:hover .tdb-sacff-term-bg {
                    @tax_bg_h_gradient
                }
                /* @tax_border_color_solid */
                body .$unique_block_class .tdb-sacff-term-bg {
                    border-color: @tax_border_color_solid !important;
                }
                /* @tax_border_color_params */
                body .$unique_block_class .tdb-sacff-term-bg {
                    border-image: linear-gradient(@tax_border_color_params);
				    border-image: -webkit-linear-gradient(@tax_border_color_params);
				    border-image-slice: 1;
				    transition: none;
                }
                body .$unique_block_class .tdb-sacff-term:hover .tdb-sacff-term-bg {
                    border-image: linear-gradient(@tax_border_color_h, @tax_border_color_h);
				    border-image: -webkit-linear-gradient(@tax_border_color_h, @tax_border_color_h);
				    border-image-slice: 1;
				    transition: none;
                }
                /* @tax_border_color_h */
                body .$unique_block_class .tdb-sacff-term-bg {
                    border-color: @tax_border_color_h !important;
                }
                
                
                /* @f_txt */
                body .$unique_block_class {
                    @f_txt
                }
                /* @f_add */
                body .$unique_block_class .tdb-cf-add-txt {
                    @f_add
                }
                /* @f_tax */
                body .$unique_block_class .tdb-sacff-term {
                    @f_tax
                }
				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'style_general_tdb_single_custom_field', 1 );



        /*-- LAYOUT -- */
        $display = $res_ctx->get_shortcode_att('display');
        if( $display == '' ) {
            $display = 'row';
        }
        $res_ctx->load_settings_raw('display', $display);

        // make inline
        $res_ctx->load_settings_raw('make_inline', $res_ctx->get_shortcode_att('make_inline'));

        // horizontal & vertical align
        $horiz_align = $res_ctx->get_shortcode_att('horiz_align');
        $vert_align = $res_ctx->get_shortcode_att('vert_align');

        if( $horiz_align == '' || $horiz_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'horiz_align_txt', 'left' );
        } else if( $horiz_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'horiz_align_txt', 'center' );
        } else if( $horiz_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'horiz_align_txt', 'right' );
        }

        if( $display == 'row' ) {
            if( $horiz_align == '' || $horiz_align == 'content-horiz-left' ) {
                $res_ctx->load_settings_raw( 'horiz_align', 'flex-start' );
            } else if( $horiz_align == 'content-horiz-center' ) {
                $res_ctx->load_settings_raw( 'horiz_align', 'center' );
            } else if( $horiz_align == 'content-horiz-right' ) {
                $res_ctx->load_settings_raw( 'horiz_align', 'flex-end' );
            }

            if( $vert_align == '' || $vert_align == 'content-vert-baseline' ) {
                $res_ctx->load_settings_raw( 'vert_align', 'baseline' );
            } else if( $vert_align == 'content-vert-top' ) {
                $res_ctx->load_settings_raw( 'vert_align', 'flex-start' );
            } else if( $vert_align == 'content-vert-center' ) {
                $res_ctx->load_settings_raw( 'vert_align', 'center' );
            } else if( $vert_align == 'content-vert-bottom' ) {
                $res_ctx->load_settings_raw( 'vert_align', 'flex-end' );
            }
        } else if ( $display == 'column' ) {
            if( $horiz_align == '' || $horiz_align == 'content-horiz-left' ) {
                $res_ctx->load_settings_raw( 'vert_align', 'flex-start' );
            } else if( $horiz_align == 'content-horiz-center' ) {
                $res_ctx->load_settings_raw( 'vert_align', 'center' );
            } else if( $horiz_align == 'content-horiz-right' ) {
                $res_ctx->load_settings_raw( 'vert_align', 'flex-end' );
            }

            if( $vert_align == '' || $vert_align == 'content-vert-baseline' ) {
                $res_ctx->load_settings_raw( 'horiz_align', 'baseline' );
            } else if( $vert_align == 'content-vert-top' ) {
                $res_ctx->load_settings_raw( 'horiz_align', 'flex-start' );
            } else if( $vert_align == 'content-vert-center' ) {
                $res_ctx->load_settings_raw( 'horiz_align', 'center' );
            } else if( $vert_align == 'content-vert-right' ) {
                $res_ctx->load_settings_raw( 'horiz_align', 'flex-end' );
            }
        }


        // additional text width
        $add_txt_space = $res_ctx->get_shortcode_att('add_txt_space');
        $res_ctx->load_settings_raw( 'add_txt_space', $add_txt_space );
        if( $add_txt_space != '' && is_numeric( $add_txt_space ) ) {
            $res_ctx->load_settings_raw( 'add_txt_space', $add_txt_space . 'px' );
        }

        // additional text space
        $add_txt_width = $res_ctx->get_shortcode_att('add_txt_width');
        $res_ctx->load_settings_raw( 'add_txt_width', $add_txt_width );
        if( $add_txt_width != '' && is_numeric( $add_txt_width ) ) {
            $res_ctx->load_settings_raw( 'add_txt_width', $add_txt_width . 'px' );
        }


        // icon size
        $icon_size = $res_ctx->get_shortcode_att('icon_size');
        $res_ctx->load_settings_raw( 'icon_size', $icon_size );
        if( $icon_size != '' && is_numeric( $icon_size ) ) {
            $res_ctx->load_settings_raw( 'icon_size', $icon_size . 'px' );
        }

        // icon space
        $icon_space = $res_ctx->get_shortcode_att('icon_space');
        $res_ctx->load_settings_raw( 'icon_space', $icon_space );
        if( $icon_space != '' && is_numeric( $icon_space ) ) {
            $res_ctx->load_settings_raw( 'icon_space', $icon_space . 'px' );
        }

        // icon align
        $res_ctx->load_settings_raw('icon_align', $res_ctx->get_shortcode_att('icon_align') . 'px');


        // tax padding
        $tax_padding = $res_ctx->get_shortcode_att('tax_padding');
        $res_ctx->load_settings_raw( 'tax_padding', $tax_padding );
        if ( is_numeric( $tax_padding ) ) {
            $res_ctx->load_settings_raw( 'tax_padding', $tax_padding . 'px' );
        }

        // tax_space
        $tax_space = $res_ctx->get_shortcode_att('tax_space');
        $res_ctx->load_settings_raw( 'tax_space', $tax_space );
        if ( is_numeric( $tax_space ) ) {
            $res_ctx->load_settings_raw( 'tax_space', $tax_space . 'px' );
        }

        // tax_skew
        $tax_skew = $res_ctx->get_shortcode_att('tax_skew');
        if ( $tax_skew != 0 || !empty($tax_skew) ) {
            $res_ctx->load_settings_raw( 'tax_skew', $tax_skew . 'deg' );
        }

        // tax border
        $res_ctx->load_settings_raw( 'tax_border', $res_ctx->get_shortcode_att('tax_border') . 'px' );

        // tax_radius
        $tax_radius = $res_ctx->get_shortcode_att('tax_radius');
        if ( $tax_radius != 0 || !empty($tax_radius) ) {
            $res_ctx->load_settings_raw( 'tax_radius', $tax_radius . 'px' );
        }



        /*-- COLORS -- */
        $res_ctx->load_settings_raw('txt_color', $res_ctx->get_shortcode_att('txt_color'));
        $res_ctx->load_settings_raw('txt_color_h', $res_ctx->get_shortcode_att('txt_color_h'));
        $res_ctx->load_settings_raw('add_txt_color', $res_ctx->get_shortcode_att('add_txt_color'));
        $res_ctx->load_settings_raw('icon_color', $res_ctx->get_shortcode_att('icon_color'));

        $res_ctx->load_settings_raw( 'tax_color', $res_ctx->get_shortcode_att('tax_color') );
        $res_ctx->load_settings_raw( 'tax_color_h', $res_ctx->get_shortcode_att('tax_color_h') );
        $res_ctx->load_color_settings( 'tax_bg', 'tax_bg_solid', 'tax_bg_gradient', '', '' );
        $res_ctx->load_color_settings( 'tax_bg_h', 'tax_bg_h_solid', 'tax_bg_h_gradient', '', '', '' );
        $res_ctx->load_color_settings( 'tax_border_color', 'tax_border_color_solid', 'tax_border_color_gradient', 'tax_border_color_gradient_1', 'tax_border_color_params', '' );
        $res_ctx->load_settings_raw( 'tax_border_color_h', $res_ctx->get_shortcode_att('tax_border_color_h') );



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_txt' );
        $res_ctx->load_font_settings( 'f_add' );
        $res_ctx->load_font_settings( 'f_tax' );

    }

    /**
     * Disable loop block features. This block does not use a loop and it doesn't need to run a query.
     */
    function __construct() {
        parent::disable_loop_block_features();
    }


    function render( $atts, $content = null ) {
        parent::render( $atts ); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query)

        global $tdb_state_single, $tdb_state_category, $tdb_state_tag, $tdb_state_author, $tdb_state_attachment, $tdb_state_single_page;

        $custom_field_data = array();

        switch( tdb_state_template::get_template_type() ) {
            case 'cpt':
            case 'single':
                $custom_field_data = $tdb_state_single->post_custom_field->__invoke( $atts );
                break;

            case 'category':
                $custom_field_data = $tdb_state_category->category_custom_field->__invoke( $atts );
                break;

            case 'cpt_tax':
                $tdb_state_category->set_tax();
                $custom_field_data = $tdb_state_category->category_custom_field->__invoke( $atts );
                break;

            case 'tag':
                $custom_field_data = $tdb_state_tag->tag_custom_field->__invoke( $atts );
                break;

            case 'author':
                $custom_field_data = $tdb_state_author->author_custom_field->__invoke( $atts );
                break;

            case 'attachment':
                $custom_field_data = $tdb_state_attachment->attachment_custom_field->__invoke( $atts );
                break;

            default:
                $custom_field_data = $tdb_state_single_page->page_custom_field->__invoke( $atts );
                break;
        }


        $buffy = ''; //output buffer


        // display restrictions
        $hide_for_user_type = $this->get_att( 'hide_for_user_type' );
        if( $hide_for_user_type != '' ) {
            if( !( td_util::tdc_is_live_editor_ajax() || td_util::tdc_is_live_editor_iframe() ) &&
                (
                    ( $hide_for_user_type == 'logged-in' && is_user_logged_in() ) ||
                    ( $hide_for_user_type == 'guest' && !is_user_logged_in() )
                )
            ) {
                return $buffy;
            }
        } else {
            $author_plan_ids = $this->get_att('author_plan_id');
            $all_users_plan_ids = $this->get_att('logged_plan_id');

            if( !td_util::plan_limit($author_plan_ids, $all_users_plan_ids) ) {
                return $buffy;
            }
        }



        if( empty($custom_field_data['value']) ) {
            return $buffy;
        }


        // URL
        $url = '';
        if( $this->get_att('url') != '' ) {
            $url = td_util::get_custom_field_value_from_string($this->get_att('url'));
        }

        $open_in_new_window = '';
        if( $this->get_att('open_in_new_window') != '' ) {
            $open_in_new_window = 'target="blank"';
        }

        $url_rel = '';
        if( $this->get_att('url_rel') != '' ) {
            $url_rel = 'rel="' . $this->get_att('url_rel') . '"';
        }


        // additional text
        $add_txt = td_util::get_custom_field_value_from_string($this->get_att('add_txt'));
        $add_txt_buffy = '';

        if( $add_txt != '' ) {
            $add_txt_buffy = '<div class="tdb-cf-add-txt">' . $add_txt . '</div>';
        }

        $add_txt_pos = $this->get_att('add_txt_pos');


        // icon
        $icon = $this->get_icon_att( 'tdicon' );
        $tdicon_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $tdicon_data = 'data-td-svg-icon="' . $this->get_att('tdicon') . '"';
        }
        $icon_buffy = '';
        if ( $icon != '' ) {
            if( base64_encode( base64_decode( $icon ) ) == $icon ) {
                $icon_buffy = '<span class="tdb-cf-icon tdb-cf-icon-svg" ' . $tdicon_data . '>' . base64_decode( $icon ) . '</span>';
            } else {
                $icon_buffy = '<i class="tdb-cf-icon ' . $icon . '"></i>';
            }
        }

        $icon_pos = $this->get_att('icon_pos');


        // additional classes array
        $additional_classes_array = array('tdb-sacff-type-' . $custom_field_data['type']);


        $buffy .= '<div class="' . $this->get_block_classes($additional_classes_array) . '" ' . $this->get_block_html_atts() . '>';

            //get the block css
            $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();


            $buffy .= '<div class="tdb-block-inner td-fix-index">';
                $field_value_buffy = '';

                if( $custom_field_data['type'] == 'image' ) {

                    $img_url = '';
                    $img_title = '';
                    $img_alt = '';

                    if( is_array( $custom_field_data['value'] ) ) {
                        $img_url = $custom_field_data['value']['url'];
                        $img_title = 'title="' . $custom_field_data['value']['title'] . '"';
                        $img_alt = 'alt="' . $custom_field_data['value']['alt'] . '"';
                    } else if( is_string( $custom_field_data['value'] ) ) {
                        $img_url = $custom_field_data['value'];
                        $img_id = attachment_url_to_postid($img_url);

                        if( $img_id ) {
                            $img_info = get_post( $img_id );

                            if( $img_info ) {
                                $img_title = 'title="' . $img_info->post_title . '"';
                                $img_alt = 'alt="' . get_post_meta($img_id, '_wp_attachment_image_alt', true ) . '"';
                            }
                        }
                    } else if ( is_numeric( $custom_field_data['value'] ) ) {
                        $img_id = $custom_field_data['value'];

                        $img_info = get_post( $img_id );

                        if( $img_info ) {
                            $img_url = $img_info->guid;
                            $img_title = 'title="' . $img_info->post_title . '"';
                            $img_alt = 'alt="' . get_post_meta($img_id, '_wp_attachment_image_alt', true ) . '"';
                        }
                    }

                    if( $img_url != '' ) {
                        $img_wrapp_tag = 'div';
                        $img_wrapp_link = '';
                        if( $url != '' ) {
                            $img_wrapp_tag = 'a';
                            $img_wrapp_link = 'href="' . $url . '" ' . $open_in_new_window . ' ' . $url_rel;
                        }

                        $field_value_buffy .= '<' . $img_wrapp_tag . ' class="tdb-sacff-img-wrapp" ' . $img_wrapp_link . '>';
                            $field_value_buffy .= '<img class="tdb-sacff-img" src="' . $img_url . '" ' . $img_title . ' ' . $img_alt . ' />';
                        $field_value_buffy .= '</' . $img_wrapp_tag . '>';
                    }

                } else if( $custom_field_data['type'] == 'taxonomy' ) {

                    $field_values = $custom_field_data['value'];
                    $terms = array();

                    foreach ( $field_values as $field_value ) {
                        $term_type = $custom_field_data['taxonomy'];
                        $term_data = $field_value;
                        if( is_numeric( $field_value ) ) {
                            $term_data = get_term_by('term_id', $field_value, $term_type);
                        }

                        if( $term_data ) {
                            $term_color = '';

                            if( $term_type == 'category' ) {
                                $term_color = td_util::get_category_option( $term_data->term_id, 'tdc_color' );
                            } else {
                                $term_color = get_term_meta( $term_data->term_id, 'tdb_filter_color', true );
                            }

                            $terms[] = array(
                                'id' => $term_data->term_id,
                                'name' => $term_data->name,
                                'url' => get_term_link($term_data->term_id, $term_type),
                                'color' => $term_color
                            );
                        }
                    }

                    $term_style = $this->get_att('tax_style');

                    if( !empty( $terms ) ) {
                        $field_value_buffy .= '<div class="tdb-sacff-terms">';
                            foreach ( $terms as $term ) {
                                $term_color_text = '';
                                $term_color_bg_border = '';

                                if( $term['color'] != '' ) {
                                    $text_color_readable = td_util::readable_colour( $term['color'], 200, 'rgba(0, 0, 0, 0.9)', '#fff' );
                                    if ( $text_color_readable != '#fff' ) {
                                        $term_color_text = 'style="color:' . $text_color_readable . '"';
                                    }

                                    if( $term_style == '' ) {
                                        $term_color_bg_border = 'style="background-color:' . $term['color'] . '; border-color:' . $term['color']  . '"';
                                    } else if( $term_style == 'bordered' ) {
                                        $term_color_bg_border = 'style="background-color:' . td_util::hex2rgba($term['color'], 0.85) . '; border-color:' . $term['color'] . '"';
                                    } else if ( $term_style == 'rainbow' ) {
                                        $term_color_bg_border = 'style="background-color:' . td_util::hex2rgba($term['color'], 0.2) . '; border-color:' . td_util::hex2rgba($term['color'], 0.05) . '"';
                                        $term_color_text = 'style="color:' . $term['color'] . '"';
                                    }
                                }

                                $field_value_buffy .= '<a class="tdb-sacff-term" href="' . $term['url'] .'" ' . $term_color_text . '>';
                                    $field_value_buffy .= '<span class="tdb-sacff-term-bg" ' . $term_color_bg_border . '></span>';
                                    $field_value_buffy .= $term['name'];
                                $field_value_buffy .= '</a>';
                            }
                        $field_value_buffy .= '</div>';
                    }

                } else {

                    $field_value = $custom_field_data['value'];

                    if( $custom_field_data['type'] == 'email' || $custom_field_data['type'] == 'url' ) {
                        if( $url == '' ) {
                            $url = $custom_field_data['value'];
                        }
                    }

                    $field_value_buffy .= '<div class="tdb-sacff-txt">';
                        if( $url != '' ) {
                            $field_value_buffy .= '<a href="' . ( $custom_field_data['type'] == 'email' ? 'mailto:' : '' ) . $url . '" ' . $open_in_new_window . ' ' . $url_rel . '>';
                        }

                        if( is_array( $field_value ) ) {
                            foreach ( $field_value as $key => $value ) {
                                if( is_array( $value ) ) {
                                    $field_value_buffy .= $value['label'];
                                } else if( td_util::isAssocArray( $field_value ) ) {
                                    if( $key == 'label' ) {
                                        $field_value_buffy .= $value;
                                    }
                                } else {
                                    $field_value_buffy .= $value;
                                }

                                if( $key != array_key_last( $field_value ) ) {
                                    $field_value_buffy .= ', ';
                                }
                            }
                        } else {
                            $field_value_buffy .= $field_value;
                        }

                        if( $url != '' ) {
                            $field_value_buffy .= '</a>';
                        }
                    $field_value_buffy .= '</div>';

                }


                // Additional text and icon, before the custom field value
                if( $icon_buffy != '' && ( $icon_pos == '' || ( $icon_pos == 'before_add' && $add_txt == '' ) ) ) {
                    $buffy .= $icon_buffy;
                }

                if( $add_txt != '' && $add_txt_pos == '' ) {
                    if( $icon_pos == 'before_add' ) {
                        $buffy .= $icon_buffy;
                    }

                    $buffy .= $add_txt_buffy;

                    if( $icon_pos == 'after_add' ) {
                        $buffy .= $icon_buffy;
                    }
                }


                // The custom field value
                $buffy .= $field_value_buffy;


                // Additional text and icon, after the custom field value
                if ($icon_buffy != '' && ($icon_pos == 'after' || ($icon_pos == 'after_add' && $add_txt == ''))) {
                    $buffy .= $icon_buffy;
                }

                if ($add_txt != '' && $add_txt_pos == 'after') {
                    if ($icon_pos == 'before_add') {
                        $buffy .= $icon_buffy;
                    }

                    $buffy .= $add_txt_buffy;

                    if ($icon_pos == 'after_add') {
                        $buffy .= $icon_buffy;
                    }
                }

            $buffy .= '</div>';

        $buffy .= '</div> <!-- ./block -->';

        return $buffy;
    }

}