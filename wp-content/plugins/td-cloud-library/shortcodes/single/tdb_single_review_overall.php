<?php

/**
 * Class tdb_single_review_overall
 */

class tdb_single_review_overall extends td_block {

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

				/* @style_general_review_overall */
				.tdb_single_review_overall i {
                  width: auto;
                  min-width: 20px;
                  font-size: 15px;
                }
                .tdb_single_review_overall .td-review {
                  margin-bottom: 0;
                }
                .tdb_single_review_overall .td-review-score {
                  padding: 7px 14px 35px 14px;
                }
                .tdb_single_review_overall .td-review-overall {
                  padding-bottom: 0;
                }
                @media (max-width: 767px) {
                  .tdb_single_review_overall .td-review-footer {
                    border: 0;
                  }
                  .tdb_single_review_overall .td-review-footer:after {
                    display: none;
                  }
                }
                .td-review .td-review-percent-sign {
                  font-size: 15px;
                  line-height: 1;
                }
                .td-review-final-score {
                  line-height: 80px;
                  font-size: 48px;
                  margin-bottom: 5px;
                }
                .td-review-score {
                  font-family: 'Open Sans', 'Open Sans Regular', sans-serif;
                  font-weight: bold;
                  text-align: center;
                  padding: 0;
                  vertical-align: bottom;
                  width: 150px;
                }
                @media (max-width: 767px) {
                  .td-review-footer {
                    border-left: 1px solid #ededed;
                    position: relative;
                    display: block;
                  }
                  .td-review-footer:after {
                    content: '';
                    width: 1px;
                    background-color: #ededed;
                    position: absolute;
                    right: -1px;
                    top: 0;
                    height: 100%;
                  }
                  .td-review-score {
                    display: block;
                    width: 100%;
                    padding: 0;
                    border-left: 0;
                    border-right: 0;
                  }
                }
                .td-review-overall {
                  padding: 0 0 28px 0;
                  line-height: 14px;
                }
                .td-review-overall span {
                  font-size: 11px;
                }
                .td-review-final-star {
                  margin-bottom: 5px;
                }
				
				
				/* @title_color */
                .$unique_block_class .td-review-final-title {
                    color: @title_color;
                }
				/* @final_color */
                .$unique_block_class .td-review-final-score {
                    color: @final_color;
                }
                
                /* @stars_size */
                .$unique_block_class .td-review-final-star i {
                    font-size: @stars_size;
                }
                /* @stars_space */
                .$unique_block_class .td-review-final-star i {
                    margin-right: @stars_space;
                }
                .$unique_block_class .td-review-final-star i:last-child {
                    margin-right: 0;
                }
                /* @stars_color */
                .$unique_block_class .td-review-final-star i {
                    color: @stars_color;
                }
                
                /* @padding */
                .$unique_block_class .td-review-score {
                    padding: @padding;
                }
                /* @all_border_size */
                .$unique_block_class td {
                    border-width: @all_border_size;
                    border-style: solid;
                }
                /* @all_border_color */
                .$unique_block_class td {
                    border-color: @all_border_color;
                }
                
                /* @meta_horiz_align_left */
				.$unique_block_class .td-review-score {
				    text-align: left;
				}
                /* @meta_horiz_align_right */
				.$unique_block_class .td-review-score {
				    text-align: right;
				}


				/* @f_title */
				.$unique_block_class .td-review-final-title {
					@f_title
				}
				/* @f_final */
				.$unique_block_class .td-review-final-score {
					@f_final
				}
				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'style_general_review', 1 );
        $res_ctx->load_settings_raw( 'style_general_review_overall', 1 );

        // title color
        $res_ctx->load_settings_raw( 'title_color', $res_ctx->get_shortcode_att('title_color') );
        // final score color
        $res_ctx->load_settings_raw( 'final_color', $res_ctx->get_shortcode_att('final_color') );

        // stars size
        $stars_size = $res_ctx->get_shortcode_att('stars_size');
        if( $stars_size != '' && is_numeric( $stars_size ) ) {
            $res_ctx->load_settings_raw( 'stars_size', $stars_size . 'px' );
        }
        // stars space
        $stars_space = $res_ctx->get_shortcode_att('stars_space');
        if( $stars_space != '' && is_numeric( $stars_space ) ) {
            $res_ctx->load_settings_raw( 'stars_space', $stars_space . 'px' );
        }
        // stars color
        $res_ctx->load_settings_raw( 'stars_color', $res_ctx->get_shortcode_att('stars_color') );

        // box padding
        $padding = $res_ctx->get_shortcode_att('padding');
        $res_ctx->load_settings_raw( 'padding', $padding );
        if( $padding != '' && is_numeric( $padding ) ) {
            $res_ctx->load_settings_raw( 'padding', $padding . 'px' );
        }

        // border width
        $all_border_size = $res_ctx->get_shortcode_att('all_border_size');
        $res_ctx->load_settings_raw( 'all_border_size', $all_border_size );
        if( $all_border_size != '' ) {
            if( is_numeric( $all_border_size ) ) {
                $res_ctx->load_settings_raw( 'all_border_size', $all_border_size . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'all_border_size', '1px' );
        }
        // border color
        $all_border_color = $res_ctx->get_shortcode_att('all_border_color');
        $res_ctx->load_settings_raw( 'all_border_color', '#ededed' );
        if( $all_border_color != '' ) {
            $res_ctx->load_settings_raw( 'all_border_color', $all_border_color );
        }

        // horizontal align
        $content_align = $res_ctx->get_shortcode_att('content_align_horiz');
        if ( $content_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'meta_horiz_align_left', 1 );
        } else if ( $content_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'meta_horiz_align_right', 1 );
        }



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_title' );
        $res_ctx->load_font_settings( 'f_final' );

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

        $post_review_data = $tdb_state_single->post_review->__invoke();

        $title = '';
        if( $this->get_att( 'title' ) != '' ) {
            $title = $this->get_att( 'title' );
        }

        $buffy = '';

        if( $post_review_data['review_meta'] != '' ) {
            $buffy .= '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';

            //get the block css
            $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();


            $buffy .= '<table class="td-review td-fix-index">';
            $buffy .= '<tr class="td-review-footer ' . $post_review_data['review_meta'] . '">';
            $buffy .= '<td class="td-review-score">';
            $buffy .= '<div class="td-review-overall">';
            $buffy .= '<div class="td-review-final-score">' . $this->calculate_total($post_review_data) . ($post_review_data['review_meta'] == 'rate_percent' ? '<span class="td-review-percent-sign">%</span>' : '') . '</div>';
            $buffy .= '<div class="td-review-final-star">' . $this->render_stars($post_review_data) . '</div>';
            $buffy .= '<span class="td-review-final-title">' . $title . '</span>';
            $buffy .= '</div>';
            $buffy .= '</td>';
            $buffy .= '</tr>';
            $buffy .= '</table>';

            $buffy .= '</div>';
        }

        return $buffy;
    }

    //calculates the average of the rating
    function calculate_total( $post_review_data ) {

            $total = 0;
            $cnt = 0;

            switch ( $post_review_data['review_meta'] ) {
                case 'rate_stars' :
                    foreach ( $post_review_data['review_meta_stars'] as $section ) {
                        if ( !empty( $section['rate'] ) ) {
                            $total = $total + $section['rate'];
                            $cnt++;
                        }
                    }
                break;

                case 'rate_percent' :
                    foreach ( $post_review_data['review_meta_percents'] as $section ) {
                        if ( !empty( $section['rate'] ) ) {
                            $total = $total + $section['rate'];
                            $cnt++;
                        }
                    }
                break;

                case 'rate_point' :
                    foreach ( $post_review_data['review_meta_points'] as $section ) {
                        if ( !empty( $section['rate'] ) ) {
                            $total = $total + $section['rate'];
                            $cnt++;
                        }
                    }
                break;
            }

            if ( $total == 0 ) {
                $result = 0;
            } else {
                $result = round( $total / $cnt, 1 );
            }

            return $result;

    }

    //calculates the average stars rating
    function render_stars( $post_review_data ) {
        $total_stars = $this->calculate_total_stars( $post_review_data );
        return $this->number_to_stars( $total_stars );
    }

    // converts the rating to 0-5 to be used with stars
    function calculate_total_stars( $post_review_data ) {
        switch ( $post_review_data['review_meta'] ) {
            case 'rate_stars' :
                return round( $this->calculate_total( $post_review_data ), 1);
                break;
            case 'rate_percent':
                return round($this->calculate_total( $post_review_data ) / 10 / 2, 1);
                break;
            case 'rate_point' :
                return round($this->calculate_total( $post_review_data ) / 2, 1);
                break;
        }

        return 0;
    }

    //converts 0 - 5 to stars
    function number_to_stars( $total_stars ) {

        $star_integer = intval( $total_stars );

        $buffy = '';

        // this echo full stars
        for ( $i = 0; $i < $star_integer; $i++ ) {
            $buffy .= '<i class="td-icon-star"></i>';
        }

        $star_rest = $total_stars - $star_integer;

        // this echo full star or half or empty star
        if ( $star_rest >= 0.25 and $star_rest < 0.75 ) {
            $buffy .= '<i class="td-icon-star-half"></i>';
        } else if ( $star_rest >= 0.75 ) {
            $buffy .= '<i class="td-icon-star"></i>';
        } else if ( $total_stars != 5 ) {
            $buffy .= '<i class="td-icon-star-empty"></i>';
        }

        // this echo empty star
        for ( $i = 0; $i < 4-$star_integer; $i++ ) {
            $buffy .= '<i class="td-icon-star-empty"></i>';
        }

        return $buffy;
    }

}