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
                .tdb_single_custom_field .tdb-block-inner {
                    display: flex;
                }
                .tdb_single_custom_field .tdb-sacff-txt {
                    font-size: 14px;
                    line-height: 1.6;
                }
                .tdb_single_custom_field .tdb-sacff-img {
                    display: block;
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
                body .$unique_block_class .tdb-sacff-txt {
                    text-align: @horiz_align_txt;
                }
                
                
                /* @txt_color */
                body .$unique_block_class .tdb-sacff-txt,
                body .$unique_block_class .tdb-sacff-txt a {
                    color: @txt_color;
                }
                /* @txt_color_h */
                body .$unique_block_class .tdb-sacff-txt a:hover {
                    color: @txt_color_h;
                }
                
                
                /* @f_txt */
                body .$unique_block_class .tdb-sacff-txt {
                    @f_txt
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
        // make inline
        $res_ctx->load_settings_raw('make_inline', $res_ctx->get_shortcode_att('make_inline'));

        // horizontal align
        $horiz_align = $res_ctx->get_shortcode_att('horiz_align');
        if( $horiz_align == '' || $horiz_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'horiz_align', 'flex-start' );
            $res_ctx->load_settings_raw( 'horiz_align_txt', 'left' );
        } else if( $horiz_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'horiz_align', 'center' );
            $res_ctx->load_settings_raw( 'horiz_align_txt', 'center' );
        } else if( $horiz_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'horiz_align', 'flex-end' );
            $res_ctx->load_settings_raw( 'horiz_align_txt', 'right' );
        }



        /*-- COLORS -- */
        $res_ctx->load_settings_raw('txt_color', $res_ctx->get_shortcode_att('txt_color'));
        $res_ctx->load_settings_raw('txt_color_h', $res_ctx->get_shortcode_att('txt_color_h'));



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_txt' );

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
        $post_acf_field_data = $tdb_state_single->post_custom_field->__invoke( $atts );


        $buffy = ''; //output buffer

        if( empty( $post_acf_field_data ) ) {
            return $buffy;
        }

        $url = '';
        if( $this->get_att('url') != '' ) {
            $url = $this->get_att('url');
        }

        $open_in_new_window = '';
        if( $this->get_att('open_in_new_window') != '' ) {
            $open_in_new_window = 'target="blank"';
        }

        $url_rel = '';
        if( $this->get_att('url_rel') != '' ) {
            $url_rel = 'rel="' . $this->get_att('url_rel') . '"';
        }


        $buffy .= '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';

            //get the block css
            $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();


            $buffy .= '<div class="tdb-block-inner td-fix-index">';
                switch ( $post_acf_field_data['type'] ) {
                    case 'text':
                    case 'textarea':
                    case 'number':
                    case 'range':
                    case 'email':
                    case 'url':
                    case 'date_time_picker':
                        if( $post_acf_field_data['type'] == 'email' || $post_acf_field_data['type'] == 'url' ) {
                            if( $url == '' ) {
                                $url = $post_acf_field_data['value'];
                            }
                        }

                        $buffy .= '<div class="tdb-sacff-txt">';
                            if( $url != '' ) {
                                $buffy .= '<a href="' . ( $post_acf_field_data['type'] == 'email' ? 'mailto:' : '' ) . $url . '" ' . $open_in_new_window . ' ' . $url_rel . '>';
                            }
                                $buffy .= $post_acf_field_data['value'];
                            if( $url != '' ) {
                                $buffy .= '</a>';
                            }
                        $buffy .= '</div>';

                        break;

                    case 'image':
                        $img_url = '';
                        $img_title = '';
                        $img_alt = '';

                        if( $post_acf_field_data['value'] ) {
                            if( is_array( $post_acf_field_data['value'] ) ) {
                                $img_url = $post_acf_field_data['value']['url'];
                                $img_title = 'title="' . $post_acf_field_data['value']['title'] . '"';
                                $img_alt = 'alt="' . $post_acf_field_data['value']['alt'] . '"';
                            } else if( is_string( $post_acf_field_data['value'] ) ) {
                                $img_url = $post_acf_field_data['value'];
                                $img_id = attachment_url_to_postid($img_url);

                                if( $img_id ) {
                                    $img_info = get_post( $img_id );

                                    if( $img_info ) {
                                        $img_title = 'title="' . $img_info->post_title . '"';
                                        $img_alt = 'alt="' . get_post_meta($img_id, '_wp_attachment_image_alt', true ) . '"';
                                    }
                                }
                            } else if ( is_numeric( $post_acf_field_data['value'] ) ) {
                                $img_id = $post_acf_field_data['value'];

                                $img_info = get_post( $img_id );

                                if( $img_info ) {
                                    $img_url = $img_info->guid;
                                    $img_title = 'title="' . $img_info->post_title . '"';
                                    $img_alt = 'alt="' . get_post_meta($img_id, '_wp_attachment_image_alt', true ) . '"';
                                }
                            }
                        }

                        if( $img_url != '' ) {
                            if( $url != '' ) {
                                $buffy .= '<a class="tdb-sacff-img-url" href="' . $url . '" ' . $open_in_new_window . ' ' . $url_rel . '>';
                            }
                                $buffy .= '<img class="tdb-sacff-img" src="' . $img_url . '" ' . $img_title . ' ' . $img_alt . ' />';
                            if( $url != '' ) {
                                $buffy .= '</a>';
                            }
                        }

                        break;
                }
            $buffy .= '</div>';

        $buffy .= '</div> <!-- ./block -->';

        return $buffy;
    }

}