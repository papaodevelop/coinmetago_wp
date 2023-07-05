<?php

/**
 * Class td_single_next_prev
 */

class tdb_single_next_prev extends td_block {

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

                /* @general_next_prev */
                .tdb_single_next_prev {
                  *zoom: 1;
                }
                .tdb_single_next_prev:before,
                .tdb_single_next_prev:after {
                  display: table;
                  content: '';
                  line-height: 0;
                }
                .tdb_single_next_prev:after {
                  clear: both;
                }
                .tdb-next-post {
                  font-family: 'Roboto', sans-serif;
                  width: 48%;
                  float: left;
                  transform: translateZ(0);
                  -webkit-transform: translateZ(0);
                  min-height: 1px;
                  line-height: 1;
                }
                .tdb-next-post span {
                  display: block;
                  font-size: 12px;
                  color: #747474;
                  margin-bottom: 7px;
                }
                .tdb-next-post a {
                  font-size: 15px;
                  color: #222;
                  line-height: 21px;
                  -webkit-transition: color 0.2s ease;
                  transition: color 0.2s ease;
                }
                .tdb-next-post a:hover {
                  color: #4db2ec;
                }
                .tdb-post-next {
                  margin-left: 2%;
                  text-align: right;
                }
                .tdb-post-prev {
                  margin-right: 2%;
                }
                .tdb-post-next .td-image-container {
                    display: inline-block;
                }
                
                /* @art_title */
				.$unique_block_class.td-next-prev-img-on .next-prev-title {
					margin: @art_title;
				}

				/* @image_width */
				.$unique_block_class .td-image-container {
				 	flex: 0 0 @image_width;
				 	width: @image_width;
			    }
				.ie10 .$unique_block_class .td-image-container,
				.ie11 .$unique_block_class .td-image-container {
				 	flex: 0 0 auto;
			    }
				/* @no_float */
				.$unique_block_class .td-module-container {
				    display: flex;
					flex-direction: column;
				}
				.$unique_block_class .tdb-post-next .td-module-container {
					align-items: flex-end;
				}
                .$unique_block_class .td-image-container {
                	display: block; 
                	order: 0;
                }
                .ie10 .$unique_block_class .next-prev-title,
				.ie11 .$unique_block_class .next-prev-title {
				 	flex: auto;
			    }
				/* @float_left */
				.$unique_block_class.td-next-prev-img-on .td-module-container {
				    display: flex;
					flex-direction: row;
				}
                .$unique_block_class .td-image-container {
                	display: block; 
                	order: 0;
                }
                
                .ie10 .$unique_block_class .next-prev-title,
				.ie11 .$unique_block_class .next-prev-title {
				 	flex: 1;
			    }
			    .$unique_block_class.td-next-prev-img-on .next-prev-title {
                  text-align: initial;
                }
                
				/* @float_right */
				.$unique_block_class .td-module-container {
				    display: flex;
					flex-direction: row;
				}
                .$unique_block_class .td-image-container {
                	display: block; order: 1;
                }
                .$unique_block_class .next-prev-title {
                	flex: 1;
                }
               
                /* @hide_desktop */
                .$unique_block_class .td-image-container {
                	display: none;
                }
                
                .$unique_block_class .td-next-prev-image {
                	background-image: none !important;
                }
                
                /* @image_radius */
				.$unique_block_class .td-next-prev-image,
				.$unique_block_class .td-next-prev-image:before,
				.$unique_block_class .td-next-prev-image:after {
					border-radius: @image_radius;
				}
				
				/* @hide */
				.$unique_block_class .td-image-container {
					display: none;
				}
                
                /* @box_padding */
				.$unique_block_class .tdb-next-post {
					padding: @box_padding;
				}

				/* @align_center */
				.$unique_block_class .tdb-next-post {
					text-align: center;
				}
				.$unique_block_class .tdb-next-post .td-next-prev-image {
				    display: initial;
				}
				
				/* @align_right */
				.$unique_block_class .tdb-next-post {
					text-align: right;
				}
				.$unique_block_class .tdb-post-prev .td-next-prev-image {
				    display: initial;
				}
				
				/* @align_left */
				.$unique_block_class .tdb-next-post {
					text-align: left;
				}
				/* @bg_color */
				.$unique_block_class .tdb-next-post-bg {
					background-color: @bg_color;
				}
				/* @post_color */
				.$unique_block_class .tdb-next-post a {
					color: @post_color;
				}
				/* @post_hover_color */
				.$unique_block_class .tdb-next-post:hover a {
					color: @post_hover_color;
				}
				/* @info_color */
				.$unique_block_class .tdb-next-post span {
					color: @info_color;
				}
				/* @all_underline_color */
                @media (min-width: 768px) {
                    .$unique_block_class .td-module-title a {
                        transition: all 0.2s ease;
                        -webkit-transition: all 0.2s ease;
                    }
                }
                .$unique_block_class .td-module-title a {
                    box-shadow: inset 0 0 0 0 @all_underline_color;
                }
                /* @all_underline_height */
                .$unique_block_class .tdb-next-post:hover a {
                    box-shadow: inset 0 -@all_underline_height 0 0 @all_underline_color;
                }
				/* @f_art */
				.$unique_block_class .tdb-next-post a {
					@f_art
				}
				/* @f_inf */
				.$unique_block_class .tdb-next-post span {
					@f_inf
				}
				
			</style>";


		$td_css_res_compiler = new td_css_res_compiler( $raw_css );
		$td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

		$compiled_css .= $td_css_res_compiler->compile_css();
		return $compiled_css;
	}

	static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'general_next_prev', 1 );

	    $box_padding = $res_ctx->get_shortcode_att('box_padding');
        $res_ctx->load_settings_raw( 'box_padding', $box_padding );
        if( $box_padding != '' && is_numeric( $box_padding ) ) {
            $res_ctx->load_settings_raw( 'box_padding', $box_padding . 'px' );
        }

        // article title space
        $art_title = $res_ctx->get_shortcode_att('art_title');
        $res_ctx->load_settings_raw( 'art_title', $art_title );
        if ( is_numeric( $art_title ) ) {
            $res_ctx->load_settings_raw( 'art_title', $art_title . 'px' );
        }

        // image_width
        $image_width = $res_ctx->get_shortcode_att('image_width');
        if ( is_numeric( $image_width ) ) {
            $res_ctx->load_settings_raw( 'image_width', $image_width . '%' );
        } else {
            $res_ctx->load_settings_raw( 'image_width', $image_width );
        }

        // image_floated
        $image_floated = $res_ctx->get_shortcode_att('image_floated');
        if ( $image_floated == '' ||  $image_floated == 'no_float' ) {
            $image_floated = 'no_float';
            $res_ctx->load_settings_raw( 'no_float',  1 );
        }
        if ( $image_floated == 'float_left' ) {
            $res_ctx->load_settings_raw( 'float_left',  1 );
        }
        if ( $image_floated == 'float_right' ) {
            $res_ctx->load_settings_raw( 'float_right',  1 );
        }
        if ( $image_floated == 'hidden' ) {
            if ( $res_ctx->is( 'all' ) && !$res_ctx->is_responsive_att( 'image_floated' ) ) {
                $res_ctx->load_settings_raw( 'hide_desktop',  1 );
            } else {
                $res_ctx->load_settings_raw( 'hide',  1 );
            }
        }
        // image radius
        $image_radius = $res_ctx->get_shortcode_att('image_radius');
        $res_ctx->load_settings_raw( 'image_radius', $image_radius );
        if ( is_numeric( $image_radius ) ) {
            $res_ctx->load_settings_raw( 'image_radius', $image_radius . 'px' );
        }

		/*-- COLORS -- */
        $res_ctx->load_settings_raw( 'bg_color', $res_ctx->get_shortcode_att('bg_color') );
		$res_ctx->load_settings_raw( 'post_color', $res_ctx->get_shortcode_att('post_color') );
		$res_ctx->load_settings_raw( 'post_hover_color', $res_ctx->get_shortcode_att('post_hover_color') );
		$res_ctx->load_settings_raw( 'info_color', $res_ctx->get_shortcode_att('info_color') );

		/*-- FONTS -- */
		$res_ctx->load_font_settings( 'f_art' );
		$res_ctx->load_font_settings( 'f_inf' );

		// content align
		$content_align = $res_ctx->get_shortcode_att('content_align_horizontal');
		if ( $content_align == 'content-horiz-center' ) {
			$res_ctx->load_settings_raw( 'align_center', 1 );
		} else if ( $content_align == 'content-horiz-right' ) {
			$res_ctx->load_settings_raw( 'align_right', 1 );
		} else if ( $content_align == 'content-horiz-left' ) {
			$res_ctx->load_settings_raw( 'align_left', 1 );
		}

        // underline height
        $underline_height = $res_ctx->get_shortcode_att('all_underline_height');
        $res_ctx->load_settings_raw( 'all_underline_height', $underline_height );
        if( $underline_height != '' && is_numeric( $underline_height ) ) {
            $res_ctx->load_settings_raw( 'all_underline_height', $underline_height . 'px' );
        } else {
            $res_ctx->load_settings_raw( 'all_underline_height', '0' );
        }
        // underline color
        $underline_color = $res_ctx->get_shortcode_att('all_underline_color');
        if ( $underline_height != 0 ) {
            if( $underline_color == '' ) {
                $res_ctx->load_settings_raw('all_underline_color', '#000');
            } else {
                $res_ctx->load_settings_raw('all_underline_color', $res_ctx->get_shortcode_att('all_underline_color'));
            }
        }
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
	    $post_next_prev_data = $tdb_state_single->post_next_prev->__invoke( $atts );

        $hide_image = $this->get_att('hide_image');
        $hide_prev_image = $hide_next_image = false;
        if ( $hide_image == 'yes') {
            $hide_prev_image = true;
            $hide_next_image = true;
        }

        $prev_post = !empty( $post_next_prev_data['prev_post_url'] ) ? true : false;
	    $next_post = !empty( $post_next_prev_data['next_post_url'] ) ? true : false;

        $additional_classes = array();

        $tds_animation_stack = td_util::get_option('tds_animation_stack');
        if ( empty($tds_animation_stack) ) { //lazyload animation is ON
            $additional_classes[] = 'td-animation-stack';
        }
        if (empty($hide_image)) {
            $additional_classes[] = 'td-next-prev-img-on';
        }

        $buffy = '';


        if( $prev_post || $next_post ) {

            $post_next_prev_data['prev_post_title'] = empty( $post_next_prev_data['prev_post_title'] ) ? '' : $post_next_prev_data['prev_post_title'];
            $post_next_prev_data['prev_post_image_url'] = empty( $post_next_prev_data['prev_post_image_url'] ) ? $hide_prev_image = true : $post_next_prev_data['prev_post_image_url'];
            $prev_post_image_width = empty( $post_next_prev_data['prev_post_image_width'] ) ? '' : ' width="' . $post_next_prev_data['prev_post_image_width'] . '"';
            $prev_post_image_height = empty( $post_next_prev_data['prev_post_image_height'] ) ? '' : ' height="' . $post_next_prev_data['prev_post_image_height'] . '"';
            $post_next_prev_data['next_post_title'] = empty( $post_next_prev_data['next_post_title'] ) ? '' : $post_next_prev_data['next_post_title'];
            $post_next_prev_data['next_post_image_url'] = empty( $post_next_prev_data['next_post_image_url'] ) ? $hide_next_image = true : $post_next_prev_data['next_post_image_url'];
            $next_post_image_width = empty( $post_next_prev_data['next_post_image_width'] ) ? '' : ' width="' . $post_next_prev_data['next_post_image_width'] . '"';
            $next_post_image_height = empty( $post_next_prev_data['next_post_image_height'] ) ? '' : ' height="' . $post_next_prev_data['next_post_image_height'] . '"';

            $buffy .= '<div class="' . $this->get_block_classes($additional_classes) . '" ' . $this->get_block_html_atts() . '>';

            //get the block css
            $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();


            $buffy .= '<div class="tdb-block-inner td-fix-index">';

                if ( $prev_post ) {

                    $buffy .= '<div class="tdb-next-post tdb-next-post-bg tdb-post-prev">';
                        $buffy .= '<span>' . __td( 'Previous article', TD_THEME_NAME ) . '</span>';
                        $buffy .= '<div class="td-module-container">';
                            if ( $hide_prev_image == false ) {
                                $buffy .= '<div class="td-image-container">';
                                $buffy .= '<a class="td-image-wrap" href="' . $post_next_prev_data['prev_post_url'] . '">';
                                if ( empty( $tds_animation_stack ) && ! td_util::tdc_is_live_editor_ajax() && ! td_util::tdc_is_live_editor_iframe() && !td_util::is_mobile_theme() && !td_util::is_amp() ) {
                                    $buffy .= '<img class="td-next-prev-image td-fix-index td-lazy-img" data-type="image_tag" data-img-url="' . $post_next_prev_data['prev_post_image_url'] . '" title="' . $post_next_prev_data['prev_post_title'] . '"' . $prev_post_image_width . $prev_post_image_height . '>';
                                } else {
                                    $buffy .= '<img class="td-next-prev-image td-fix-index" src="' . $post_next_prev_data['prev_post_image_url'] . '">';
                                }
                                $buffy .= '</a>';
                                $buffy .= '</div>';
                            }
                            $buffy .= '<div class="next-prev-title">';
                            $buffy .= '<a href="' . $post_next_prev_data['prev_post_url'] . '">' . $post_next_prev_data['prev_post_title'] . '</a>';
                            $buffy .= '</div>';
                        $buffy .= '</div>';
                    $buffy .= '</div>';
                } else {
                    $buffy .= '<div class="tdb-next-post tdb-post-prev"></div>';
                }
                if ( $next_post ) {

                    $buffy .= '<div class="tdb-next-post tdb-next-post-bg tdb-post-next">';
                        $buffy .= '<span>' . __td( 'Next article', TD_THEME_NAME ) . '</span>';
                        $buffy .= '<div class="td-module-container">';
                            if ( $hide_next_image == false ) {
                                $buffy .= '<div class="td-image-container">';
                                $buffy .= '<a class="td-image-wrap" href="' . $post_next_prev_data['next_post_url'] . '">';
                                if ( empty( $tds_animation_stack ) && ! td_util::tdc_is_live_editor_ajax() && ! td_util::tdc_is_live_editor_iframe() && !td_util::is_mobile_theme() && !td_util::is_amp() ) {
                                    $buffy .= '<img class="td-next-prev-image td-fix-index td-lazy-img" data-type="image_tag" data-img-url="' . $post_next_prev_data['next_post_image_url'] . '" title="' . $post_next_prev_data['next_post_title'] .  '"' .$next_post_image_width . $next_post_image_height . '>';
                                } else {
                                    $buffy .= '<img class="td-next-prev-image td-fix-index" src="' . $post_next_prev_data['next_post_image_url'] . '">';
                                }
                                $buffy .= '</a>';
                                $buffy .= '</div>';
                            }
                            $buffy .= '<div class="next-prev-title">';
                            $buffy .= '<a href="' . $post_next_prev_data['next_post_url'] . '">' . $post_next_prev_data['next_post_title'] . '</a>';
                            $buffy .= '</div>';
                        $buffy .= '</div>';
                    $buffy .= '</div>';

                }
            $buffy .= '</div>';

            $buffy .= '</div>';
        }

        return $buffy;
    }
}