<?php

class tdb_single_user_reviews_overall extends td_block {

    public function get_custom_css() {
        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $unique_block_class = ((td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax()) ? 'tdc-row .' : '') . $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>
                  
                /* @style_general_tdb_single_user_reviews_overall */
                .tdb_single_user_reviews_overall {
                    transform: translateZ(0);
                    font-family: -apple-system,BlinkMacSystemFont,\"Segoe UI\",Roboto,Oxygen-Sans,Ubuntu,Cantarell,\"Helvetica Neue\",sans-serif;
                    font-size: 14px;
                }
                .tdb_single_user_reviews_overall .tdb-suro-rating {
                    display: flex;
                    align-items: center;
                }
                .tdb_single_user_reviews_overall .tdb-suro-stars {
                    display: flex;
                    align-items: center;
                }
                .tdb_single_user_reviews_overall .tdb-suro-star:not(:last-child) {
                    margin-right: 3px;
                }
                .tdb_single_user_reviews_overall .tdb-suro-star {
                    font-size: 16px;
                    color: #b5b5b5;
                }
                .tdb_single_user_reviews_overall .tdb-suro-star svg {
                    display: block;
                    width: 1em;
                    height: auto;
                    fill: #C1BFBF;
                }
                .tdb_single_user_reviews_overall .tdb-suro-star-full,
                .tdb_single_user_reviews_overall .tdb-suro-star-half {
                    color: #ee8302;
                }
                .tdb_single_user_reviews_overall .tdb-suro-star-full svg,
                .tdb_single_user_reviews_overall .tdb-suro-star-half svg {
                    fill: #ee8302;
                }
                .tdb_single_user_reviews_overall .tdb-suro-label {
                    flex: 1;
                    margin-left: 12px;
                    font-size: 13px;
                    line-height: 1;
                    font-weight: 600;
                    color: #7A828B;
                }
                
                
                /* @stars_v_alignment */
                body .$unique_block_class .tdb-suro-stars {
                    position:relative;
                    top: @stars_v_alignment;
                }
                
                /* @space_btw_stars */
                body .$unique_block_class .tdb-suro-star:not(:last-child) {
                    margin-right: @space_btw_stars;
                }
                
                /* @icons_size */
                body .$unique_block_class .tdb-suro-star {
                    font-size: @icons_size;
                }
                
                /* @label_space */
                body .$unique_block_class .tdb-suro-label {
                    margin-left: @label_space;
                }
                
                
                /* @empty_color */
                body .$unique_block_class .tdb-suro-star-empty {
                    color: @empty_color;
                }
                body .$unique_block_class .tdb-suro-star-empty svg {
                    fill: @empty_color;
                }
                /* @full_color */
                body .$unique_block_class .tdb-suro-star-full,
                body .$unique_block_class .tdb-suro-star-half {
                    color: @full_color;
                }
                body .$unique_block_class .tdb-suro-star-full svg,
                body .$unique_block_class .tdb-suro-star-half svg {
                    fill: @full_color;
                }
                /* @label_color */
                body .$unique_block_class .tdb-suro-label {
                    color: @label_color;
                }
                
                
                /* @f_label */
                body .$unique_block_class .tdb-suro-label {
                    @f_label
                }
                
            </style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        /*-- GENERAL STYLES -- */
        $res_ctx->load_settings_raw( 'style_general_tdb_single_user_reviews_overall', 1 );



        /*-- LAYOUT -- */
        // icons size
        $icons_size = $res_ctx->get_shortcode_att('icons_size');
        $res_ctx->load_settings_raw('icons_size', $icons_size);
        if( $icons_size != '' && is_numeric( $icons_size ) ) {
            $res_ctx->load_settings_raw('icons_size', $icons_size . 'px');
        }

        // icons (stars) vertical alignment
        $stars_v_alignment = $res_ctx->get_shortcode_att('stars_v_alignment');
        $res_ctx->load_settings_raw('stars_v_alignment', $stars_v_alignment);
        if( $stars_v_alignment != '' && is_numeric( $stars_v_alignment ) ) {
            $res_ctx->load_settings_raw('stars_v_alignment', $stars_v_alignment . 'px');
        }

        // space between stars
        $space_btw_stars = $res_ctx->get_shortcode_att('space_btw_stars');
        $res_ctx->load_settings_raw('space_btw_stars', $space_btw_stars);
        if( $space_btw_stars != '' && is_numeric( $space_btw_stars ) ) {
            $res_ctx->load_settings_raw('space_btw_stars', $space_btw_stars . 'px');
        }

        // label space
        $label_space = $res_ctx->get_shortcode_att('label_space');
        $res_ctx->load_settings_raw('label_space', $label_space);
        if( $label_space != '' && is_numeric( $label_space ) ) {
            $res_ctx->load_settings_raw('label_space', $label_space . 'px');
        }



        /*-- COLORS -- */
        $res_ctx->load_settings_raw('full_color', $res_ctx->get_shortcode_att('full_color'));
        $res_ctx->load_settings_raw('empty_color', $res_ctx->get_shortcode_att('empty_color'));
        $res_ctx->load_settings_raw('label_color', $res_ctx->get_shortcode_att('label_color'));



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_label' );

    }

    /**
     * Disable loop block features. This block does not use a loop and it doesn't need to run a query.
     */
    function __construct() {
        parent::disable_loop_block_features();
    }


    function render( $atts, $content = null ) {

        parent::render( $atts ); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query)

        $reviews_average = '';

        $curr_template_type = tdb_state_template::get_template_type();
        if( $curr_template_type == 'single' || $curr_template_type == 'cpt' ) {
            global $tdb_state_single;
            $reviews_average = $tdb_state_single->post_user_reviews_overall->__invoke($atts);
        } else {
            $reviews_average = '3.5';
        }


        // Rating stars
        $full_star_icon = $this->get_icon_att( 'tdicon_full' );
        $full_star_icon_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $full_star_icon_data = 'data-td-svg-icon="' . $this->get_att( 'tdicon_full' ) . '"';
        }
        $full_star_icon_html = '';
        if ( !empty( $full_star_icon ) ) {
            if( base64_encode( base64_decode( $full_star_icon ) ) == $full_star_icon ) {
                $full_star_icon_html = base64_decode( $full_star_icon ) ;
            } else {
                $full_star_icon_html = '<i class="' . $full_star_icon . '"></i>';
            }
        }

        $half_star_icon = $this->get_icon_att( 'tdicon_half' );
        $half_star_icon_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $half_star_icon_data = 'data-td-svg-icon="' . $this->get_att( 'tdicon_half' ) . '"';
        }
        $half_star_icon_html = '';
        if ( !empty( $half_star_icon ) ) {
            if( base64_encode( base64_decode( $half_star_icon ) ) == $half_star_icon ) {
                $half_star_icon_html = base64_decode( $half_star_icon ) ;
            } else {
                $half_star_icon_html = '<i class="' . $half_star_icon . '"></i>';
            }
        }

        $empty_star_icon = $this->get_icon_att( 'tdicon_empty' );
        $empty_star_icon_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $empty_star_icon_data = 'data-td-svg-icon="' . $this->get_att( 'tdicon_empty' ) . '"';
        }
        $empty_star_icon_html = '';
        if ( !empty( $empty_star_icon ) ) {
            if( base64_encode( base64_decode( $empty_star_icon ) ) == $empty_star_icon ) {
                $empty_star_icon_html = base64_decode( $empty_star_icon ) ;
            } else {
                $empty_star_icon_html = '<i class="' . $empty_star_icon . '"></i>';
            }
        }


        $buffy = ''; //output buffer

        if( $reviews_average == '' ) {
            return $buffy;
        }

        $buffy .= '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';

            //get the block css
            $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();


            $buffy .= '<div class="tdb-block-inner td-fix-index">';
                $buffy .= '<div class="tdb-suro-rating">';
                    $buffy .= $this->display_stars( $reviews_average, $full_star_icon_html, $full_star_icon_data, $half_star_icon_html, $half_star_icon_data, $empty_star_icon_html, $empty_star_icon_data );
                    $buffy .= '<div class="tdb-suro-label">' . $reviews_average . ' ' . __td( 'out of 5', TD_THEME_NAME ) . '</div>';
                $buffy .= '</div>';
            $buffy .= '</div>';

        $buffy .= '</div>';

        return $buffy;
    }

    function display_stars( $rating_average, $full_star_icon, $full_star_icon_data, $half_star_icon, $half_star_icon_data, $empty_star_icon, $empty_star_icon_data ) {

        $rating_average_floor = floor($rating_average);
        $rating_average_ceil = ceil($rating_average);

        if( $empty_star_icon == '' ) {
            $empty_star_icon = '<i class="td-icon-user-rev-star-empty"></i>';
        }
        if( $half_star_icon == '' ) {
            $half_star_icon = '<i class="td-icon-user-rev-star-half"></i>';
        }
        if( $full_star_icon == '' ) {
            $full_star_icon = '<i class="td-icon-user-rev-star-full"></i>';
        }

        $buffy = '<div class="tdb-suro-stars">';
            for( $i = 0; $i < $rating_average_floor; $i++ ) {
                $buffy .= '<div class="tdb-suro-star tdb-suro-star-full" ' . $full_star_icon_data . '>' . $full_star_icon . '</div>';
            }
            if( $rating_average_floor != $rating_average ) {
                $buffy .= '<div class="tdb-suro-star tdb-suro-star-half" ' . $half_star_icon_data . '>' . $half_star_icon . '</div>';
            }
            for( $i = 5; $i > $rating_average_ceil; $i-- ) {
                $buffy .= '<div class="tdb-suro-star tdb-suro-star-empty" ' . $empty_star_icon_data . '>' . $empty_star_icon . '</div>';
            }
        $buffy .= '</div>';

        return $buffy;

    }

}