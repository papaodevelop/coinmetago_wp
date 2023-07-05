<?php

/**
 *
 * Class td_block_big_grid_flex_1
 */
class td_block_big_grid_flex_1 extends td_block {

    static function cssMedia( $res_ctx ) {

        /*-- GENERAL -- */
        $res_ctx->load_settings_raw( 'style_general_bgf', 1 );
        $res_ctx->load_settings_raw( 'style_general_bgf_1_specific', 1 );



        // container_width
        $container_width = $res_ctx->get_shortcode_att('container_width');
        if ( is_numeric( $container_width ) ) {
            $res_ctx->load_settings_raw( 'container_width', $container_width . '%' );
        } else {
            $res_ctx->load_settings_raw( 'container_width', $container_width );
        }

        //image alignment
        $res_ctx->load_settings_raw( 'image_alignment', $res_ctx->get_shortcode_att('image_alignment') . '%' );

        // image_height
        $image_height = $res_ctx->get_shortcode_att('image_height');
        if ( is_numeric( $image_height ) ) {
            $res_ctx->load_settings_raw( 'image_height', $image_height . '%' );
        } else {
            $res_ctx->load_settings_raw( 'image_height', $image_height );
        }

        // video icon size
        $video_icon = $res_ctx->get_shortcode_att('video_icon');
        if ( $video_icon != '' && is_numeric( $video_icon ) ) {
            $res_ctx->load_settings_raw( 'video_icon', $video_icon . 'px' );
        }

        // video icon position
        $video_icon_pos = $res_ctx->get_shortcode_att('video_icon_pos');
        if( $video_icon_pos == '' || $video_icon_pos == 'center' ) {
            $res_ctx->load_settings_raw( 'video_icon_pos_center', 1 );
        } else if ( $video_icon_pos == 'corner' ) {
            $res_ctx->load_settings_raw( 'video_icon_pos_corner', 1 );
        }

        // image zoom effect on hover
        $res_ctx->load_settings_raw( 'image_zoom', $res_ctx->get_shortcode_att('image_zoom') );

        // meta info margin
        $meta_margin = $res_ctx->get_shortcode_att('meta_margin');
        $res_ctx->load_settings_raw( 'meta_margin', $meta_margin );
        if ( is_numeric( $meta_margin ) ) {
            $res_ctx->load_settings_raw( 'meta_margin', $meta_margin . 'px' );
        }
        // meta info padding
        $meta_padding = $res_ctx->get_shortcode_att('meta_padding');
        $res_ctx->load_settings_raw( 'meta_padding', $meta_padding );
        if ( is_numeric( $meta_padding ) ) {
            $res_ctx->load_settings_raw( 'meta_padding', $meta_padding . 'px' );
        }

        // meta info horizontal align
        $meta_info_horiz = $res_ctx->get_shortcode_att('meta_info_horiz');
        if( $meta_info_horiz == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'meta_info_horiz_center', 1 );
        }
        if( $meta_info_horiz == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'meta_info_horiz_right', 1 );
        }

        // meta info horizontal align
        $meta_info_vert = $res_ctx->get_shortcode_att('meta_info_vert');
        if( $meta_info_vert == 'content-vert-top' ) {
            $res_ctx->load_settings_raw( 'meta_info_vert_top', 1 );
        }
        if( $meta_info_vert == 'content-vert-center' ) {
            $res_ctx->load_settings_raw( 'meta_info_vert_center', 1 );
        }
        if( $meta_info_vert == 'content-vert-bottom' ) {
            $res_ctx->load_settings_raw( 'meta_info_vert_bottom', 1 );
        }

        // meta info width
        $meta_info_width = $res_ctx->get_shortcode_att('meta_width');
        $res_ctx->load_settings_raw( 'meta_width', $meta_info_width );
        if( $meta_info_width != '' && is_numeric( $meta_info_width ) ) {
            $res_ctx->load_settings_raw( 'meta_width', $meta_info_width . 'px' );
        }

        // module_border_width
        $modules_cat_border = $res_ctx->get_shortcode_att('modules_cat_border');
        $res_ctx->load_settings_raw( 'modules_cat_border', $modules_cat_border );
        if ( is_numeric( $modules_cat_border ) ) {
            $res_ctx->load_settings_raw( 'modules_cat_border', $modules_cat_border . 'px' );
        }

        // exclusive label
        if( !empty( has_filter('td_composer_map_exclusive_label_array', 'td_subscription::add_exclusive_label_settings') ) ) {
            // show exclusive label
            $excl_show = $res_ctx->get_shortcode_att('excl_show');
            $res_ctx->load_settings_raw( 'excl_show', $excl_show );
            if( $excl_show == '' ) {
                $res_ctx->load_settings_raw( 'excl_show', 'inline-block' );
            }

            // exclusive label text
            $res_ctx->load_settings_raw( 'excl_txt', $res_ctx->get_shortcode_att('excl_txt') );

            // exclusive label margin
            $excl_margin = $res_ctx->get_shortcode_att('excl_margin');
            $res_ctx->load_settings_raw( 'excl_margin', $excl_margin );
            if( $excl_margin != '' && is_numeric( $excl_margin ) ) {
                $res_ctx->load_settings_raw( 'excl_margin', $excl_margin . 'px' );
            }

            // exclusive label padding
            $excl_padd = $res_ctx->get_shortcode_att('excl_padd');
            $res_ctx->load_settings_raw( 'excl_padd', $excl_padd );
            if( $excl_padd != '' && is_numeric( $excl_padd ) ) {
                $res_ctx->load_settings_raw( 'excl_padd', $excl_padd . 'px' );
            }

            // exclusive label border size
            $excl_border = $res_ctx->get_shortcode_att('all_excl_border');
            $res_ctx->load_settings_raw( 'all_excl_border', $excl_border );
            if( $excl_border != '' && is_numeric( $excl_border ) ) {
                $res_ctx->load_settings_raw( 'all_excl_border', $excl_border . 'px' );
            }

            // exclusive label border style
            $res_ctx->load_settings_raw( 'all_excl_border_style', $res_ctx->get_shortcode_att('all_excl_border_style') );

            // exclusive label border radius
            $excl_radius = $res_ctx->get_shortcode_att('excl_radius');
            $res_ctx->load_settings_raw( 'excl_radius', $excl_radius );
            if( $excl_radius != '' && is_numeric( $excl_radius ) ) {
                $res_ctx->load_settings_raw( 'excl_radius', $excl_radius . 'px' );
            }


            $res_ctx->load_settings_raw( 'excl_color', $res_ctx->get_shortcode_att('excl_color') );
            $res_ctx->load_settings_raw( 'excl_color_h', $res_ctx->get_shortcode_att('excl_color_h') );
            $res_ctx->load_settings_raw( 'excl_bg', $res_ctx->get_shortcode_att('excl_bg') );
            $res_ctx->load_settings_raw( 'excl_bg_h', $res_ctx->get_shortcode_att('excl_bg_h') );
            $excl_border_color = $res_ctx->get_shortcode_att('all_excl_border_color');
            $res_ctx->load_settings_raw( 'all_excl_border_color', $excl_border_color );
            if( $excl_border_color == '' ) {
                $res_ctx->load_settings_raw( 'all_excl_border_color', '#000' );
            }
            $res_ctx->load_settings_raw( 'excl_border_color_h', $res_ctx->get_shortcode_att('excl_border_color_h') );


            $res_ctx->load_font_settings( 'f_excl' );
        }

        //category tag radius
        $modules_category_radius = $res_ctx->get_shortcode_att('modules_category_radius');
        if ( $modules_category_radius != 0 || !empty($modules_category_radius) ) {
            $res_ctx->load_settings_raw( 'modules_category_radius', $modules_category_radius . 'px' );
        }

        // modules per row
        $grid_layout = $res_ctx->get_shortcode_att('grid_layout');
        if ( $grid_layout == '' ) {
            $grid_layout = 1;
            $res_ctx->load_settings_raw( 'modules_on_row', '100%' );
        }

        // modules clearfix
        $clearfix = 'clearfix';
        $padding = 'padding';
        if ( $res_ctx->is( 'all' ) ) {
            $clearfix = 'clearfix_desktop';
            $padding = 'padding_desktop';
        }
        switch ($grid_layout) {
            case '1':
                $res_ctx->load_settings_raw( $padding,  '1' );
                $res_ctx->load_settings_raw( 'modules_on_row', '100%' );
                break;
            case '2':
                $res_ctx->load_settings_raw( $clearfix,  '2n+1' );
                $res_ctx->load_settings_raw( $padding,  '-n+2' );
                $res_ctx->load_settings_raw( 'modules_on_row', '50%' );
                break;
            case '3':
                $res_ctx->load_settings_raw( $clearfix,  '3n+1' );
                $res_ctx->load_settings_raw( $padding,  '-n+3' );
                $res_ctx->load_settings_raw( 'modules_on_row', '33.33333333%' );
                break;
            case '4':
                $res_ctx->load_settings_raw( $clearfix,  '4n+1' );
                $res_ctx->load_settings_raw( $padding,  '-n+4' );
                $res_ctx->load_settings_raw( 'modules_on_row', '25%' );
                break;
            case '5':
                $res_ctx->load_settings_raw( $clearfix,  '5n+1' );
                $res_ctx->load_settings_raw( $padding,  '-n+4' );
                $res_ctx->load_settings_raw( 'modules_on_row', '20%' );
                break;
        }

        // modules gap
        $modules_gap = $res_ctx->get_shortcode_att('modules_gap');
        $res_ctx->load_settings_raw( 'modules_gap', $modules_gap );
        $res_ctx->load_settings_raw( 'modules_gap_mob', $modules_gap );
        if ( $modules_gap == '' ) {
            $res_ctx->load_settings_raw( 'modules_gap', '20px');
            $res_ctx->load_settings_raw( 'modules_gap_mob', '20px');
        } else if ( is_numeric( $modules_gap ) ) {
            $res_ctx->load_settings_raw( 'modules_gap', $modules_gap / 2 .'px' );
            $res_ctx->load_settings_raw( 'modules_gap_mob', $modules_gap .'px' );
        }

        // article title space
        $art_title = $res_ctx->get_shortcode_att('art_title');
        $res_ctx->load_settings_raw( 'art_title', $art_title );
        if ( is_numeric( $art_title ) ) {
            $res_ctx->load_settings_raw( 'art_title', $art_title . 'px' );
        }
        // article title padding
        $art_title_padd = $res_ctx->get_shortcode_att('art_title_padd');
        $res_ctx->load_settings_raw( 'art_title_padd', $art_title_padd );
        if ( is_numeric( $art_title_padd ) ) {
            $res_ctx->load_settings_raw( 'art_title_padd', $art_title_padd . 'px' );
        }

        // author & date padding
        $auth_date_padd = $res_ctx->get_shortcode_att('auth_date_padding');
        $res_ctx->load_settings_raw( 'auth_date_padd', $auth_date_padd );
        if ( is_numeric( $auth_date_padd ) ) {
            $res_ctx->load_settings_raw( 'auth_date_padd', $auth_date_padd . 'px' );
        }

        // category tag margin
        $modules_category_margin = $res_ctx->get_shortcode_att('modules_category_margin');
        $res_ctx->load_settings_raw( 'modules_category_margin', $modules_category_margin );
        if( $modules_category_margin != '' ) {
            if( is_numeric( $modules_category_margin ) ) {
                $res_ctx->load_settings_raw( 'modules_category_margin', $modules_category_margin . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'modules_category_margin', '0 0 5px' );
        }

        // category tag padding
        $modules_category_padding = $res_ctx->get_shortcode_att('modules_category_padding');
        $res_ctx->load_settings_raw( 'modules_category_padding', $modules_category_padding );
        if( $modules_category_padding != '' && is_numeric( $modules_category_padding ) ) {
            $res_ctx->load_settings_raw( 'modules_category_padding', $modules_category_padding . 'px' );
        }

        // show meta info details
        $res_ctx->load_settings_raw( 'show_cat', $res_ctx->get_shortcode_att('show_cat') );
        $show_author = $res_ctx->get_shortcode_att('show_author');
        $show_date = $res_ctx->get_shortcode_att('show_date');
        $show_review = $res_ctx->get_shortcode_att('show_review');
        $review_space = $res_ctx->get_shortcode_att('review_space');
        $res_ctx->load_settings_raw( 'review_space', $review_space );
        if( $review_space != '' && is_numeric( $review_space ) ) {
            $res_ctx->load_settings_raw( 'review_space', $review_space . 'px' );
        }
        $review_size = $res_ctx->get_shortcode_att('review_size');
        $res_ctx->load_settings_raw( 'review_size', 10 + $review_size/0.5 . 'px' );
        $review_distance = $res_ctx->get_shortcode_att('review_distance');
        $res_ctx->load_settings_raw( 'review_distance', $review_distance );
        if( $review_distance != '' && is_numeric( $review_distance ) ) {
            $res_ctx->load_settings_raw( 'review_distance', $review_distance . 'px' );
        }
        if( $show_author == 'none' && $show_date == 'none' && $show_review == 'none' ) {
            $res_ctx->load_settings_raw( 'hide_author_date', 1 );
        } else {
            $res_ctx->load_settings_raw( 'show_author_date', 1 );
        }
        $res_ctx->load_settings_raw( 'show_author', $show_author );
        $res_ctx->load_settings_raw( 'show_date', $show_date );
        $res_ctx->load_settings_raw( 'show_review', $show_review );

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

        // colors
        $res_ctx->load_color_settings( 'overlay_general', 'overlay_general', 'overlay_general_gradient', '', '' );
        $res_ctx->load_color_settings( 'overlay_h_general', 'overlay_h_general', 'overlay_general_h_gradient', '', '' );
        $res_ctx->load_color_settings( 'overlay_1', 'overlay_1', 'overlay_1_gradient', '', '' );
        $res_ctx->load_color_settings( 'overlay_2', 'overlay_2', 'overlay_2_gradient', '', '' );
        $res_ctx->load_color_settings( 'overlay_3', 'overlay_3', 'overlay_3_gradient', '', '' );
        $res_ctx->load_color_settings( 'overlay_4', 'overlay_4', 'overlay_4_gradient', '', '' );
        $res_ctx->load_settings_raw( 'meta_bg', $res_ctx->get_shortcode_att('meta_bg') );
        $res_ctx->load_settings_raw( 'meta_shadow', $res_ctx->get_shortcode_att('meta_shadow') );
        $res_ctx->load_settings_raw( 'cat_bg', $res_ctx->get_shortcode_att('cat_bg') );
        $res_ctx->load_settings_raw( 'cat_txt', $res_ctx->get_shortcode_att('cat_txt') );
        $res_ctx->load_settings_raw( 'cat_bg_hover', $res_ctx->get_shortcode_att('cat_bg_hover') );
        $res_ctx->load_settings_raw( 'cat_txt_hover', $res_ctx->get_shortcode_att('cat_txt_hover') );
        $res_ctx->load_settings_raw( 'cat_border', $res_ctx->get_shortcode_att('cat_border') );
        $res_ctx->load_settings_raw( 'cat_border_hover', $res_ctx->get_shortcode_att('cat_border_hover') );
        $res_ctx->load_settings_raw( 'title_txt', $res_ctx->get_shortcode_att('title_txt') );
        $res_ctx->load_settings_raw( 'title_txt_hover', $res_ctx->get_shortcode_att('title_txt_hover') );
        $res_ctx->load_settings_raw( 'title_bg', $res_ctx->get_shortcode_att('title_bg') );
        $res_ctx->load_settings_raw( 'title_shadow', $res_ctx->get_shortcode_att('title_shadow') );
        $res_ctx->load_settings_raw( 'author_txt', $res_ctx->get_shortcode_att('author_txt') );
        $res_ctx->load_settings_raw( 'author_txt_hover', $res_ctx->get_shortcode_att('author_txt_hover') );
        $res_ctx->load_settings_raw( 'date_txt', $res_ctx->get_shortcode_att('date_txt') );
        $res_ctx->load_settings_raw( 'auth_date_bg', $res_ctx->get_shortcode_att('auth_date_bg') );
        $res_ctx->load_settings_raw( 'review_stars', $res_ctx->get_shortcode_att('review_stars') );


        // fonts
        $res_ctx->load_font_settings( 'f_title' );
        $res_ctx->load_font_settings( 'f_cat' );
        $res_ctx->load_font_settings( 'f_meta' );
        $res_ctx->load_settings_raw( 'f_meta_fw', $res_ctx->get_shortcode_att('f_meta_font_weight') );

        // mix blend
        $mix_type = $res_ctx->get_shortcode_att('mix_type');
        if ( $mix_type != '' ) {
            $res_ctx->load_settings_raw('mix_type', $res_ctx->get_shortcode_att('mix_type'));
        }
        $res_ctx->load_color_settings( 'mix_color', 'color', 'mix_gradient', '', '' );

        $mix_type_h = $res_ctx->get_shortcode_att('mix_type_h');
        if ( $mix_type_h != '' ) {
            $res_ctx->load_settings_raw('mix_type_h', $res_ctx->get_shortcode_att('mix_type_h'));
        } else {
            $res_ctx->load_settings_raw('mix_type_off', 1);
        }
        $res_ctx->load_color_settings( 'mix_color_h', 'color_h', 'mix_gradient_h', '', '' );
        // effects
        $res_ctx->load_settings_raw('fe_brightness', 'brightness(1)');
        $res_ctx->load_settings_raw('fe_contrast', 'contrast(1)');
        $res_ctx->load_settings_raw('fe_saturate', 'saturate(1)');

        $fe_brightness = $res_ctx->get_shortcode_att('fe_brightness');
        if ($fe_brightness != '1') {
            $res_ctx->load_settings_raw('fe_brightness', 'brightness(' . $fe_brightness . ')');
            $res_ctx->load_settings_raw('effect_on', 1);
        }
        $fe_contrast = $res_ctx->get_shortcode_att('fe_contrast');
        if ($fe_contrast != '1') {
            $res_ctx->load_settings_raw('fe_contrast', 'contrast(' . $fe_contrast . ')');
            $res_ctx->load_settings_raw('effect_on', 1);
        }
        $fe_saturate = $res_ctx->get_shortcode_att('fe_saturate');
        if ($fe_saturate != '1') {
            $res_ctx->load_settings_raw('fe_saturate', 'saturate(' . $fe_saturate . ')');
            $res_ctx->load_settings_raw('effect_on', 1);
        }

        // effects hover
        $res_ctx->load_settings_raw('fe_brightness_h', 'brightness(1)');
        $res_ctx->load_settings_raw('fe_contrast_h', 'contrast(1)');
        $res_ctx->load_settings_raw('fe_saturate_h', 'saturate(1)');

        $fe_brightness_h = $res_ctx->get_shortcode_att('fe_brightness_h');
        $fe_contrast_h = $res_ctx->get_shortcode_att('fe_contrast_h');
        $fe_saturate_h = $res_ctx->get_shortcode_att('fe_saturate_h');

        if ($fe_brightness_h != '1') {
            $res_ctx->load_settings_raw('fe_brightness_h', 'brightness(' . $fe_brightness_h . ')');
            $res_ctx->load_settings_raw('effect_on_h', 1);
        }
        if ($fe_contrast_h != '1') {
            $res_ctx->load_settings_raw('fe_contrast_h', 'contrast(' . $fe_contrast_h . ')');
            $res_ctx->load_settings_raw('effect_on_h', 1);
        }
        if ($fe_saturate_h != '1') {
            $res_ctx->load_settings_raw('fe_saturate_h', 'saturate(' . $fe_saturate_h . ')');
            $res_ctx->load_settings_raw('effect_on_h', 1);
        }
        // make hover to work
        if ($fe_brightness_h != '1' || $fe_contrast_h != '1' || $fe_saturate_h != '1') {
            $res_ctx->load_settings_raw('effect_on', 1);
        }
        if ($fe_brightness != '1' || $fe_contrast != '1' || $fe_saturate != '1') {
            $res_ctx->load_settings_raw('effect_on_h', 1);
        }

    }

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
                /* @style_general_bgf_1_specific */
                @media (max-width: 767px) {
                    .td_block_big_grid_flex_1 .td-big-grid-flex-post {
                        width: 100%;
                    }
                }
                .td_block_big_grid_flex_1 .td-module-container {
                    position: relative;
                }
                .td_block_big_grid_flex_1 .td-image-wrap {
                    padding-bottom: 75%;
                }
                .td_block_big_grid_flex_1 .td-module-meta-info {
                    padding: 22px 20px;
                }
                .td_block_big_grid_flex_1 .td-module-title {
                    font-family: 'Roboto', sans-serif;
                    font-size: 27px;
                    font-weight: 500;
                    line-height: 34px;
                    margin: 0 0 9px 0;
                }
                .td_block_big_grid_flex_1 .td-editor-date {
                    display: inline-block;
                }
                
                
                

                /* @container_width */
				body .$unique_block_class {
					width: @container_width; float: left;
				}
				/* @image_alignment */
				body .$unique_block_class .entry-thumb {
					background-position: center @image_alignment;
				}
				/* @image_height */
				body .$unique_block_class .td-image-wrap {
					padding-bottom: @image_height;
				}
				/* @video_icon */
				body .$unique_block_class .td-video-play-ico {
					width: @video_icon;
					height: @video_icon;
					font-size: @video_icon;
				}
				/* @video_icon_pos_center */
				body .$unique_block_class .td-video-play-ico {
					top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
				}
				/* @video_icon_pos_corner */
				body .$unique_block_class .td-video-play-ico {
					top: 20px;
                    left: auto;
                    right: 20px;
                    transform: none;
				}
				/* @image_zoom */
				@media (min-width: 767px) {
                    body .$unique_block_class .td-module-container:hover .td-thumb-css {
                        transform: scale3d(1.1, 1.1, 1);
                        -webkit-transform: scale3d(1.1, 1.1, 1);
                    }
                }
				/* @image_width */
				body .$unique_block_class .td-image-container {
				 	flex: 0 0 @image_width;
				 	width: @image_width;
			    }
				/* @hide */
				body .$unique_block_class .td-image-container {
					display: none;
				}
				
				/* @meta_info_horiz_center */
				body .$unique_block_class .td-module-meta-info {
					text-align: center;
                    right: 0;
                    margin: 0 auto;
				}
				/* @meta_info_horiz_right */
				body .$unique_block_class .td-module-meta-info {
					text-align: right;
					left: auto;
					right: 0;
				}
			
				/* @meta_info_vert_top */
				body .$unique_block_class .td-module-meta-info {
					top: 0;
				}
				/* @meta_info_vert_center */
				body .$unique_block_class .td-module-meta-info {
					top: 50%;
					transform: translateY(-50%);
				}
				/* @meta_info_vert_bottom */
				body .$unique_block_class .td-module-meta-info {
					bottom: 0;
				}
				
				/* @meta_width */
				body .$unique_block_class .td-module-meta-info {
					width: @meta_width;
				}
				/* @meta_margin */
				body .$unique_block_class .td-module-meta-info {
					margin: @meta_margin;
				}
				/* @meta_padding */
				body .$unique_block_class .td-module-meta-info {
					padding: @meta_padding;
				}
				 /* @excl_show */
                .$unique_block_class .td-module-exclusive .td-module-title a:before {
                    display: @excl_show;
                }
                /* @excl_txt */
                .$unique_block_class .td-module-exclusive .td-module-title a:before {
                    content: '@excl_txt';
                }
                /* @excl_margin */
                .$unique_block_class .td-module-exclusive .td-module-title a:before {
                    margin: @excl_margin;
                }
                /* @excl_padd */
                .$unique_block_class .td-module-exclusive .td-module-title a:before {
                    padding: @excl_padd;
                }
                /* @all_excl_border */
                .$unique_block_class .td-module-exclusive .td-module-title a:before {
                    border: @all_excl_border @all_excl_border_style @all_excl_border_color;
                }
                /* @excl_radius */
                .$unique_block_class .td-module-exclusive .td-module-title a:before {
                    border-radius: @excl_radius;
                }
                /* @excl_color */
                .$unique_block_class .td-module-exclusive .td-module-title a:before {
                    color: @excl_color;
                }
                /* @excl_color_h */
                .$unique_block_class .td-module-exclusive:hover .td-module-title a:before {
                    color: @excl_color_h;
                }
                /* @excl_bg */
                .$unique_block_class .td-module-exclusive .td-module-title a:before {
                    background-color: @excl_bg;
                }
                /* @excl_bg_h */
                .$unique_block_class .td-module-exclusive:hover .td-module-title a:before {
                    background-color: @excl_bg_h;
                }
                /* @excl_border_color_h */
                .$unique_block_class .td-module-exclusive:hover .td-module-title a:before {
                    border-color: @excl_border_color_h;
                }
                /* @f_excl */
                .$unique_block_class .td-module-exclusive .td-module-title a:before {
                    @f_excl
                }
                
				/* @align_category_top */
				body .$unique_block_class .td-category-pos-image .td-post-category:not(.td-post-extra-category) {
					top: 0;
					bottom: auto;
				}
				/* @align_category_bottom */
				body .$unique_block_class .td-category-pos-image .td-post-category:not(.td-post-extra-category) {
					top: auto;
				 	bottom: 0;
			    }
				/* @modules_on_row */
				@media (min-width: 767px) {
                    body .$unique_block_class .td-big-grid-flex-post {
                        width: @modules_on_row;
                    }
                }
				/* @modules_gap */
				@media (min-width: 767px) {
                    body .$unique_block_class .td-big-grid-flex-post {
                        padding-left: @modules_gap;
                        padding-right: @modules_gap;
                    }
                    body .$unique_block_class .td_block_inner {
                        margin-left: -@modules_gap;
                        margin-right: -@modules_gap;
                    }
                }
				/* @modules_gap_mob */
                @media (max-width: 767px) {
                    body .$unique_block_class .td-big-grid-flex-post {
                        margin-bottom: @modules_gap_mob;
                    }
                    body .$unique_block_class .td-big-grid-flex-post:last-child {
                        margin-bottom: 0;
                    }
                }
				/* @modules_divider */
				body .$unique_block_class .td-module-container:before {
					border-width: 0 0 1px 0;
					border-style: @modules_divider;
					border-color: #eaeaea;
				}
				/* @modules_divider_color */
				body .$unique_block_class .td-module-container:before {
					border-color: @modules_divider_color;
				}
				/* @image_radius */
				body .$unique_block_class .entry-thumb,
				body .$unique_block_class .entry-thumb:before,
				body .$unique_block_class .entry-thumb:after {
					border-radius: @image_radius;
				}
				/* @modules_category_margin */
				body .$unique_block_class .td-post-category {
					margin: @modules_category_margin;
				}
				/* @modules_category_padding */
				body .$unique_block_class .td-post-category {
					padding: @modules_category_padding;
				}
				/* @modules_cat_border */
                body .$unique_block_class .td-post-category {
                    border: @modules_cat_border solid #aaa;
                }
                /* @cat_border */
                body .$unique_block_class .td-post-category {
                    border-color: @cat_border;
                }
                /* @cat_border_hover */
                body .$unique_block_class .td-post-category:hover {
                    border-color: @cat_border_hover;
                }
                /* @modules_category_radius */
                body .$unique_block_class .td-post-category {
                    border-radius: @modules_category_radius;
                }
				/* @show_cat */
				body .$unique_block_class .td-post-category:not(.td-post-extra-category) {
					display: @show_cat;
				}
				/* @show_excerpt */
				body .$unique_block_class .td-excerpt {
					display: @show_excerpt;
				}
				/* @show_btn */
				body .$unique_block_class .td-read-more {
					display: @show_btn;
				}
				/* @all_underline_color */
                @media (min-width: 768px) {
                    body .$unique_block_class .td-module-title a {
                        transition: all 0.2s ease;
                        -webkit-transition: all 0.2s ease;
                    }
                }
                body .$unique_block_class .td-module-title a {
                    box-shadow: inset 0 0 0 0 @all_underline_color;
                }
                /* @all_underline_height */
                body .$unique_block_class .td-module-container:hover .td-module-title a {
                    box-shadow: inset 0 -@all_underline_height 0 0 @all_underline_color;
                }
				/* @hide_author_date */
				body .$unique_block_class .td-editor-date {
					display: none;
				}
				/* @show_author_date */
				body .$unique_block_class .td-editor-date {
					display: inline;
				}
				/* @show_author */
				body .$unique_block_class .td-post-author-name {
					display: @show_author;
				}
				/* @show_date */
				body .$unique_block_class .td-post-date,
				body .$unique_block_class .td-post-author-name span {
					display: @show_date;
				}
				/* @show_review */
				body .$unique_block_class .entry-review-stars {
					display: @show_review;
				}
				/* @review_space */
				.$unique_block_class .entry-review-stars {
					margin: @review_space;
				}
				/* @review_size */
				body .$unique_block_class .td-icon-star,
                body .$unique_block_class .td-icon-star-empty,
                body .$unique_block_class .td-icon-star-half {
					font-size: @review_size;
				}
				/* @review_distance */
				.$unique_block_class .entry-review-stars i {
					margin-right: @review_distance;
				}
				.$unique_block_class .entry-review-stars i:last-child {
				    margin-right: 0;
				}
				/* @show_com */
				body .$unique_block_class .td-module-comments {
					display: @show_com;
				}
				/* @clearfix_desktop */
				body .$unique_block_class .td-big-grid-flex-post:nth-child(@clearfix_desktop) {
					clear: both;
				}
				/* @clearfix */
				body .$unique_block_class .td-big-grid-flex-post {
					clear: none !important;
				}
				body .$unique_block_class .td-big-grid-flex-post:nth-child(@clearfix) {
					clear: both !important;
				}
				/* @padding_desktop */
				@media (min-width: 767px) {
                    body .$unique_block_class .td-big-grid-flex-post:nth-last-child(@padding_desktop) {
                        margin-bottom: 0 !important;
                        padding-bottom: 0 !important;
                    }
                    body .$unique_block_class .td-big-grid-flex-post .td-module-container:before {
                        display: block !important;
                    }
                    body .$unique_block_class .td-big-grid-flex-post:nth-last-child(@padding_desktop) .td-module-container:before {
                        display: none !important;
                    }
                }
				/* @m_bg */
				body .$unique_block_class .td-module-container {
					background-color: @m_bg;
				}
				
				
				/* @overlay_general */
				body .$unique_block_class .td-image-wrap:before {
				    content: '';
				    background-color: @overlay_general;
				}
				/* @overlay_h_general */
				body .$unique_block_class .td-module-thumb:after {
				    content: '';
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
				    background-color: @overlay_h_general;
				    opacity: 0;
				    z-index: 1;
                    -webkit-transition: opacity 0.4s ease 0.2s;
                    -moz-transition: opacity 0.4s ease 0.2s;
                    -o-transition: opacity 0.4s ease 0.2s;
                    transition: opacity 0.4s ease 0.2s;
                    pointer-events: none;
				}
				body .$unique_block_class .td-module-container:hover .td-module-thumb:after {
				    opacity: 1;
				}
				/* @overlay_general_gradient */
				body .$unique_block_class .td-image-wrap:before {
				    content: '';
				    @overlay_general_gradient
				}
				/* @overlay_general_h_gradient */
				body .$unique_block_class .td-module-thumb:after {
				    content: '';
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
				    background-color: @overlay_general_h_gradient;
				    opacity: 0;
				    z-index: 1;
                    -webkit-transition: opacity 0.4s ease 0.2s;
                    -moz-transition: opacity 0.4s ease 0.2s;
                    -o-transition: opacity 0.4s ease 0.2s;
                    transition: opacity 0.4s ease 0.2s;
                    pointer-events: none;
				}
				body .$unique_block_class .td-module-container:hover .td-module-thumb:after {
				    opacity: 1;
				}
				/* @overlay_1 */
				body .$unique_block_class .td-big-grid-flex-post:nth-child(4n+1) .td-image-wrap:before {
				    content: '';
				    background-color: @overlay_1;
				}
				/* @overlay_1_gradient */
				body .$unique_block_class .td-big-grid-flex-post:nth-child(4n+1) .td-image-wrap:before {
				    content: '';
				    @overlay_1_gradient
				}
				/* @overlay_2 */
				body .$unique_block_class .td-big-grid-flex-post:nth-child(4n+2) .td-image-wrap:before {
				    content: '';
				    background-color: @overlay_2;
				}
				/* @overlay_2_gradient */
				body .$unique_block_class .td-big-grid-flex-post:nth-child(4n+2) .td-image-wrap:before {
				    content: '';
				    @overlay_2_gradient
				}
				/* @overlay_3 */
				body .$unique_block_class .td-big-grid-flex-post:nth-child(4n+3) .td-image-wrap:before {
				    content: '';
				    background-color: @overlay_3;
				}
				/* @overlay_3_gradient */
				body .$unique_block_class .td-big-grid-flex-post:nth-child(4n+3) .td-image-wrap:before {
				    content: '';
				    @overlay_3_gradient
				}
				/* @overlay_4 */
				body .$unique_block_class .td-big-grid-flex-post:nth-child(4n+4) .td-image-wrap:before {
				    content: '';
				    background-color: @overlay_4;
				}
				/* @overlay_4_gradient */
				body .$unique_block_class .td-big-grid-flex-post:nth-child(4n+4) .td-image-wrap:before {
				    content: '';
				    @overlay_4_gradient
				}
				
				
				/* @meta_bg */
				body .$unique_block_class .td-module-meta-info {
					background-color: @meta_bg;
				}
				/* @cat_bg */
				body .$unique_block_class .td-post-category {
					background-color: @cat_bg;
				}
				/* @cat_bg_hover */
				body .$unique_block_class .td-module-container:hover .td-post-category {
					background-color: @cat_bg_hover;
				}
				/* @cat_txt */
				body .$unique_block_class .td-post-category {
					color: @cat_txt;
				}
				/* @cat_txt_hover */
				body .$unique_block_class .td-module-container:hover .td-post-category {
					color: @cat_txt_hover;
				}
				/* @title_txt */
				body .$unique_block_class .td-module-title a {
					color: @title_txt;
				}
				/* @title_txt_hover */
				body .$unique_block_class .td-big-grid-flex-post:hover .td-module-title a {
					color: @title_txt_hover;
				}
				/* @title_shadow */
				body .$unique_block_class .td-module-title a {
					text-shadow: none;
				}
				/* @title_bg */
				body .$unique_block_class .td-module-title {
					background-color: @title_bg;
				}
				/* @author_txt */
				body .$unique_block_class .td-post-author-name a {
					color: @author_txt;
				}
				/* @author_txt_hover */
				body .$unique_block_class .td-big-grid-flex-post:hover .td-post-author-name a {
					color: @author_txt_hover;
				}
				/* @date_txt */
				body .$unique_block_class .td-post-date,
				body .$unique_block_class .td-post-author-name span {
					color: @date_txt;
				}
				/* @auth_date_bg */
				body .$unique_block_class .td-editor-date {
					background-color: @auth_date_bg;
				}
				/* @review_stars */
				body .$unique_block_class .entry-review-stars {
				    color: @review_stars;
				}
				/* @meta_shadow */
				body .$unique_block_class .td-post-author-name a,
				body .$unique_block_class .td-post-author-name span,
				body .$unique_block_class .td-post-date {
				    text-shadow: none;
				}
				/* @art_title */
				body .$unique_block_class .entry-title {
					margin: @art_title;
				}
				/* @art_title_padd */
				body .$unique_block_class .entry-title {
					padding: @art_title_padd;
				}
				/* @auth_date_padd */
				body .$unique_block_class .td-editor-date {
					padding: @auth_date_padd;
				}

				/* @f_header */
				body .$unique_block_class .td-block-title a,
				body .$unique_block_class .td-block-title span {
					@f_header
				}
				/* @f_ajax */
				body .$unique_block_class .td-subcat-list a,
				body .$unique_block_class .td-subcat-dropdown span,
				body .$unique_block_class .td-subcat-dropdown a {
					@f_ajax
				}
				/* @f_pag */
				body .$unique_block_class.td_with_ajax_pagination .td-next-prev-wrap a i,
				body .$unique_block_class .page-nav a,
				body .$unique_block_class .page-nav span,
				body .$unique_block_class .td-load-more-wrap a {
					@f_pag
				}
				/* @f_title */
				body .$unique_block_class .entry-title {
					@f_title
				}
				/* @f_cat */
				body .$unique_block_class .td-post-category {
					@f_cat
				}
				/* @f_meta */
				body .$unique_block_class .td-editor-date,
				body .$unique_block_class .td-editor-date .entry-date,
				body .$unique_block_class .td-module-comments a {
					@f_meta
				}
				/* @f_meta_fw */
				body .$unique_block_class .td-post-author-name a {
				    font-weight: @f_meta_fw;
				}
				/* @f_ex */
				body .$unique_block_class .td-excerpt {
					@f_ex
				}
				/* @f_btn */
				body .$unique_block_class .td-read-more a {
					@f_btn
				}
				
				/* @mix_type */
				html:not([class*='ie']) body .$unique_block_class .entry-thumb:before {
				    content: '';
                    width: 100%;
                    height: 100%;
                    position: absolute;
                    top: 0;
                    left: 0;
					opacity: 1;
					transition: opacity 1s ease;
					-webkit-transition: opacity 1s ease;
					mix-blend-mode: @mix_type;
				}
				/* @color */
				html:not([class*='ie']) body .$unique_block_class .entry-thumb:before {
                    background: @color;
				}
				/* @mix_gradient */
				html:not([class*='ie']) body .$unique_block_class .entry-thumb:before {
                    @mix_gradient;
				}
				
				
                /* @mix_type_h */
                @media (min-width: 1141px) {
                    html:not([class*='ie']) body .$unique_block_class .entry-thumb:after {
                        content: '';
                        width: 100%;
                        height: 100%;
                        position: absolute;
                        top: 0;
                        left: 0;
                        opacity: 0;
                        transition: opacity 1s ease;
                        -webkit-transition: opacity 1s ease;
                        mix-blend-mode: @mix_type_h;
                    }
                    html:not([class*='ie']) body .$unique_block_class .td-module-container:hover .entry-thumb:after {
                        opacity: 1;
                    }
                }
                
                /* @color_h */
                html:not([class*='ie']) body .$unique_block_class .entry-thumb:after {
                    background: @color_h;
                }
                /* @mix_gradient_h */
                html:not([class*='ie']) body .$unique_block_class .entry-thumb:after {
                    @mix_gradient_h;
                }
                /* @mix_type_off */
                html:not([class*='ie']) body .$unique_block_class .td-module-container:hover .entry-thumb:before {
                    opacity: 0;
                }
                    
				/* @effect_on */
                html:not([class*='ie']) body .$unique_block_class .entry-thumb {
                    filter: @fe_brightness @fe_contrast @fe_saturate;
                    transition: all 1s ease;
					-webkit-transition: all 1s ease;
                }
				/* @effect_on_h */
				@media (min-width: 1141px) {
                    html:not([class*='ie']) body .$unique_block_class .td-module-container:hover .entry-thumb {
                        filter: @fe_brightness_h @fe_contrast_h @fe_saturate_h;
                    }
                }

			</style>";

        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();

        return $compiled_css;
    }


    function render($atts, $content = null){

		if ( empty( $atts ) ) {
			$atts = array();
		}

        parent::render($atts); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query)

        $atts['limit'] = $this->get_att( 'grid_layout' );

        parent::render($atts); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query)

        $additional_classes = array();

        if( $this->get_att( 'lightsky' ) != '' ) {
            $additional_classes[] = 'td-big-grid-flex-lightsky';
        }


        $buffy = '';

        $buffy .= '<div class="td-big-grid-flex ' . $this->get_block_classes($additional_classes). ' td-big-grid-flex-posts"' . $this->get_block_html_atts() . '>';
            //get the block css
            $buffy .= $this->get_block_css();

            $buffy .= '<div id=' . $this->block_uid . ' class="td_block_inner">';
                $buffy .= $this->inner($this->td_query->posts, $this->get_att( 'grid_layout' ), $this->get_att('td_column_number')); //inner content of the block
            $buffy .= '</div>';
        $buffy .= '</div>';

        return $buffy;
    }

    function inner($posts, $post_limit, $td_column_number = '') {

        $buffy = '';

        if (!empty($posts)) {

            $post_count = 0;

            foreach ( $posts as $post ) {
                $td_module_flex = new td_module_flex_6( $post, $this->get_all_atts() );
                $buffy .= $td_module_flex->render( $post_count, __CLASS__ );

                $post_count++;
            }

            if ($post_count < $post_limit) {
                for ($i = $post_count; $i < $post_limit; $i++) {
                    $td_module_flex = new td_module_flex_empty( $post, $this->get_all_atts() );
                    $buffy .= $td_module_flex->render($i, 'td_module_flex_6');

                    $post_count++;
                }
            }

        }

        return $buffy;
    }
}
