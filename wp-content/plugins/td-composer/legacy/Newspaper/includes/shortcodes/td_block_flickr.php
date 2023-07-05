<?php
/**
 * Created by PhpStorm.
 * User: tagdiv
 * Date: 30.12.2014
 * Time: 13:27
 */


//require_once(TDC_PATH . '/legacy/common/wp_booster/td_video_playlist_render.php');


//class for youtube playlist shortcode
class td_block_flickr extends td_block {

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

        $unique_block_modal_class = $this->block_uid . '_m';

        $compiled_css = '';

        $raw_css =
            "<style>
            
                /* @style_general_flickr */
                .td_block_flickr .td_block_inner {
                    display: flex;
                    flex-wrap: wrap;
                }
                .td_block_flickr .td-flkr-item-inner {
                    position: relative;
                    cursor: pointer;
                }
                .td_block_flickr .td-flkr-item-inner:after {
                    content: '';
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: linear-gradient(0deg, rgba(0,0,0,.9) 0, transparent 80%, transparent);
                }
                .td_block_flickr .td-flkr-feat-img {
                    height: 0;
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-position: center;
                }
                .td_block_flickr .td-flkr-meta-info {
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    width: 100%;
                    color: #fff;
                    z-index: 10;
                    transition: all 0.3s ease-in-out;
                }
                .td_block_flickr .td-flkr-title {
                    margin-top: 0;
                    font-size: 20px;
                    line-height: 1.3;
                    color: #fff;
                }
                .td_block_flickr [class*='td-flkr-count'] {
                    display: inline-block;
                    font-size: 11px;
                }
                .td-flkr-m {
                    position: fixed;
                    top: 0;
                    left: 0;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    width: 100%;
                    height: 100%;
                    z-index: 10001;
                    transition: all 0.2s;
                }
                .td-flkr-m-overlay {
                    content: '';
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0, 0, 0, 0.9);
                    z-index: -1;
                    cursor: pointer;
                }
                .td-flkr-m-close {
                    position: absolute;
                    top: 50px;
                    right: 50px;
                    font-size: 22px;
                    color: #fff;
                    cursor: pointer;
                    transition: all 0.2s;
                }
                @media (min-width: 1019px) and (max-width: 1140px) {
                    .td-flkr-m-close {
                        top: 40px;
                        right: 40px;
                        font-size: 20px;
                    }
                }
                @media (min-width: 768px) and (max-width: 1018px) {
                    .td-flkr-m-close {
                        top: 36px;
                        right: 36px;
                        font-size: 19px;
                    }
                }
                @media and (max-width: 767px) {
                    .td-flkr-m-close {
                        top: 25px;
                        right: 20px;
                        font-size: 18px;
                    }
                }
                .td-flkr-m-close:hover {
                    transform: rotate(90deg);
                }
                .td-flkr-m-close i {
                    pointer-events: none;
                }
                .td-flkr-m-title {
                    margin: 0 0 20px;
                    font-size: 16px;
                    line-height: 21px;
                    color: #fff;
                    text-align: center;
                }
                .td-flkr-m-main-img {
                    display: flex;
                    flex: 1;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                }
                .td-flkr-m-main-img a {
                    cursor: zoom-in;
                }
                .td-flkr-m-main-img img {
                    max-height: 70vh;
                }
                .td-flkr-m-album-images {
                    display: none;
                    text-align: center;
                    width: 100%;
                    padding: 15px;
                    background-color: #000;
                    overflow-x: auto;
                    overflow-y: hidden;
                    white-space: nowrap;
                }
                .td-flkr-m-album-images .td-flkr-m-img {
                    display: inline-block;
                    margin-right: 15px;
                    cursor: pointer;
                    border: 3px solid transparent;
                    transition: all 0.3s ease-in-out;
                }
                .td-flkr-m-album-images .td-flkr-m-img:last-child {
                    margin-right: 0;
                }
                .td-flkr-m-album-images .td-flkr-m-img.td-flkr-m-img-active {
                    border-color: #fff;
                }
                .td-flkr-m-album-images .td-flkr-m-img .td-flkr-m-img-inner {
                    width: 70px;
                    padding-bottom: 100%;
                    background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;
                }
                .td-flkr-m-loading {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    width: 50px;
                    height: 50px;
                    margin-top: -28px;
                    margin-left: -28px;
                    transition: opacity 0.3s;
                    border: 3px solid #fff;
                    border-left-color: transparent;
                    border-right-color: transparent;
                    border-radius: 50%;
                    -webkit-animation: fullspin 1s infinite ease-out;
                    animation: fullspin 1s infinite ease-out;
                    z-index: 2;
                }
            
            
            
                /* @items_on_row */
				body .$unique_block_class .td-flkr-item {
					width: @items_on_row;
                }
				/* @padding */
				body .$unique_block_class .td-flkr-item:nth-last-child(@padding) {
					margin-bottom: 0;
					padding-bottom: 0;
				}
				body .$unique_block_class .td-flkr-item:nth-child(@clearfix) {
					clear: both !important;
				}
				/* @items_gap */
				body .$unique_block_class .td-flkr-item {
					padding-left: @items_gap;
					padding-right: @items_gap;
				}
				body .$unique_block_class .td_block_inner {
					margin-left: -@items_gap;
					margin-right: -@items_gap;
				}
				/* @items_space */
				body .$unique_block_class .td-flkr-item {
					margin-bottom: @items_space;
                }
                
				/* @img_height */
				body .$unique_block_class .td-flkr-feat-img {
					padding-bottom: @img_height;
                }
                
				/* @meta_info_align_bottom */
				body .$unique_block_class .td-flkr-meta-info {
                    bottom: 0;
                    top: auto;
                    transform: none;
                }
				/* @meta_info_align_top */
				body .$unique_block_class .td-flkr-meta-info {
                    bottom: auto;
                    top: 0;
                    transform: none;
                }
				/* @meta_info_align_center */
				body .$unique_block_class .td-flkr-meta-info {
                    bottom: auto;
                    top: 50%;
                    transform: translateY(-50%);
                }
				/* @meta_info_horiz_center */
				body .$unique_block_class .td-flkr-meta-info {
                    text-align: center;
                }
				/* @meta_info_horiz_right */
				body .$unique_block_class .td-flkr-meta-info {
                    text-align: right;
                }
				/* @meta_padding */
				body .$unique_block_class .td-flkr-meta-info {
                    padding: @meta_padding;
                }
				/* @meta_travel */
				body .$unique_block_class .td-flkr-item-inner:hover .td-flkr-meta-info {
                    transform: translateY(-@meta_travel);
                }
                
				/* @title */
				body .$unique_block_class .td-flkr-title {
                    margin-bottom: @title;
                }
				/* @show_no */
				body .$unique_block_class .td-flkr-count-photos {
                    display: @show_no;
                }
				/* @show_views */
				body .$unique_block_class .td-flkr-count-views {
                    display: @show_views;
                }
				/* @no_space */
				body .$unique_block_class .td-flkr-count-photos {
                    margin-right: @no_space;
                }

            
				/* @overlay */
				body .$unique_block_class .td-flkr-item-inner:after {
					background: @overlay;
				}
				/* @overlay_gradient */
				body .$unique_block_class .td-flkr-item-inner:after {
					@overlay_gradient
				}
				/* @title_txt */
				body .$unique_block_class .td-flkr-title {
                    color: @title_txt;
                }
				/* @title_txt_hover */
				body .$unique_block_class .td-flkr-item-inner:hover .td-flkr-title {
                    color: @title_txt_hover;
                }
				/* @meta_color */
				body .$unique_block_class [class*='td-flkr-count'] {
                    color: @meta_color;
                }
				/* @meta_color_hover */
				body .$unique_block_class .td-flkr-item-inner:hover [class*='td-flkr-count'] {
                    color: @meta_color_hover;
                }
                
				/* @m_title_color */
				body .$unique_block_class .td-flkr-title {
                    color: @m_title_color;
                }
				
				/* @m_title_color */
				#td-flkr-m.$unique_block_modal_class .td-flkr-m-title {
				    color: @m_title_color;
				}
				/* @m_bg */
				#td-flkr-m.$unique_block_modal_class .td-flkr-m-overlay {
				    background-color: @m_bg;
				}
				/* @m_bg_gradient */
				#td-flkr-m.$unique_block_modal_class .td-flkr-m-overlay {
				    @m_bg_gradient
				}
				/* @m_close_color */
				#td-flkr-m.$unique_block_modal_class .td-flkr-m-close {
				    color: @m_close_color;
				}
				/* @ms_border_color */
				#td-flkr-m.$unique_block_modal_class .td-flkr-m-album-images .td-flkr-m-img.td-flkr-m-img-active {
				    border-color: @m_title_color;
				}
				/* @ms_bg */
				#td-flkr-m.$unique_block_modal_class .td-flkr-m-album-images {
				    background-color: @ms_bg;
				}
				/* @ms_bg_gradient */
				#td-flkr-m.$unique_block_modal_class .td-flkr-m-album-images {
				    @ms_bg_gradient
				}
                


                /* @f_header */
                body .$unique_block_class .td-block-title a,
				body .$unique_block_class .td-block-title span {
					@f_header
				}
                /* @f_title */
                body .$unique_block_class .td-flkr-title {
					@f_title
				}
                /* @f_meta */
                body .$unique_block_class [class*='td-flkr-count'] {
					@f_meta
				}
                /* @f_m_title */
                #td-flkr-m.$unique_block_modal_class .td-flkr-m-title {
					@f_m_title
				}

			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        /*-- GENERAL -- */
        $res_ctx->load_settings_raw( 'style_general_flickr', 1 );



        /*-- LAYOUT -- */
        // items per row
        $items_on_row = $res_ctx->get_shortcode_att('items_on_row');
        if ( $items_on_row == '' ) {
            $items_on_row = '100%';
        }
        $res_ctx->load_settings_raw( 'items_on_row', $items_on_row );

        // items clearfix
        $padding = 'padding';
        switch ($items_on_row) {
            case '100%':
                $res_ctx->load_settings_raw( $padding,  '1' );
                break;
            case '50%':
                $res_ctx->load_settings_raw( $padding,  '-n+2' );
                break;
            case '33.33333333%':
                $res_ctx->load_settings_raw( $padding,  '-n+3' );
                break;
            case '25%':
                $res_ctx->load_settings_raw( $padding,  '-n+4' );
                break;
            case '20%':
                $res_ctx->load_settings_raw( $padding,  '-n+5' );
                break;
            case '16.66666667%':
                $res_ctx->load_settings_raw( $padding,  '-n+6' );
                break;
            case '14.28571428%':
                $res_ctx->load_settings_raw( $padding,  '-n+7' );
                break;
            case '12.5%':
                $res_ctx->load_settings_raw( $padding,  '-n+8' );
                break;
            case '11.11111111%':
                $res_ctx->load_settings_raw( $padding,  '-n+9' );
                break;
            case '10%':
                $res_ctx->load_settings_raw( $padding,  '-n+10' );
                break;
        }

        // items gap
        $items_gap = $res_ctx->get_shortcode_att('items_gap');
        $res_ctx->load_settings_raw( 'items_gap', $items_gap );
        if ( $items_gap == '' ) {
            $res_ctx->load_settings_raw( 'items_gap', '20px');
        } else if ( is_numeric( $items_gap ) ) {
            $res_ctx->load_settings_raw( 'items_gap', $items_gap / 2 .'px' );
        }

        // items space
        $items_space = $res_ctx->get_shortcode_att('items_space');
        $res_ctx->load_settings_raw( 'items_space', $items_space );
        if( $items_space == '' ) {
            $res_ctx->load_settings_raw( 'items_space', '40px' );
        } else if ( is_numeric( $items_space ) ) {
            $res_ctx->load_settings_raw( 'items_space', $items_space . 'px' );
        }

        // image_height
        $img_height = $res_ctx->get_shortcode_att('img_height');
        $res_ctx->load_settings_raw( 'img_height', $img_height );
        if( $img_height == '' ) {
            $res_ctx->load_settings_raw( 'img_height', '100%' );
        } else if ( is_numeric( $img_height ) ) {
            $res_ctx->load_settings_raw( 'img_height', $img_height . '%' );
        }

        // meta info vertical align
        $meta_info_align = $res_ctx->get_shortcode_att('meta_info_align');
        if( $meta_info_align == '' || $meta_info_align == 'bottom' ) {
            $res_ctx->load_settings_raw('meta_info_align_bottom', 1);
        } else if( $meta_info_align == 'top' ) {
            $res_ctx->load_settings_raw('meta_info_align_top', 1);
        } else if( $meta_info_align == 'center' ) {
            $res_ctx->load_settings_raw('meta_info_align_center', 1);
        }

        // meta info horizontal align
        $meta_info_horiz = $res_ctx->get_shortcode_att('meta_info_horiz');
        if( $meta_info_horiz == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw('meta_info_horiz_center', 1);
        } else if( $meta_info_horiz == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw('meta_info_horiz_right', 1);
        }

        // meta info padding
        $meta_padding = $res_ctx->get_shortcode_att('meta_padding');
        $res_ctx->load_settings_raw( 'meta_padding', $meta_padding );
        if( $meta_padding == '' ) {
            $res_ctx->load_settings_raw( 'meta_padding', '20px 15px' );
        } else if ( is_numeric( $meta_padding ) ) {
            $res_ctx->load_settings_raw( 'meta_padding', $meta_padding .'px' );
        }

        $res_ctx->load_settings_raw( 'meta_travel', $res_ctx->get_shortcode_att('meta_travel') . 'px' );

        // title space
        $title = $res_ctx->get_shortcode_att('title');
        $res_ctx->load_settings_raw( 'title', $title );
        if( $title == '' ) {
            $res_ctx->load_settings_raw( 'title', '4px' );
        } else if ( is_numeric( $title ) ) {
            $res_ctx->load_settings_raw( 'title', $title . 'px' );
        }

        // show photos number
        $res_ctx->load_settings_raw( 'show_no', $res_ctx->get_shortcode_att('show_no') );

        // show views
        $res_ctx->load_settings_raw( 'show_views', $res_ctx->get_shortcode_att('show_views') );

        // photos number space
        $no_space = $res_ctx->get_shortcode_att('no_space');
        $res_ctx->load_settings_raw( 'no_space', $no_space );
        if( $no_space == '' ) {
            $res_ctx->load_settings_raw( 'no_space', '16px' );
        } else if ( is_numeric( $no_space ) ) {
            $res_ctx->load_settings_raw( 'no_space', $no_space . 'px' );
        }



        /*-- COLORS -- */
        $res_ctx->load_color_settings( 'color_overlay', 'overlay', 'overlay_gradient', '', '' );
        $res_ctx->load_settings_raw('title_txt', $res_ctx->get_shortcode_att('title_txt'));
        $res_ctx->load_settings_raw('title_txt_hover', $res_ctx->get_shortcode_att('title_txt_hover'));
        $res_ctx->load_settings_raw('meta_color', $res_ctx->get_shortcode_att('meta_color'));
        $res_ctx->load_settings_raw('meta_color_hover', $res_ctx->get_shortcode_att('meta_color_hover'));

        $res_ctx->load_settings_raw('m_title_color', $res_ctx->get_shortcode_att('m_title_color'));
        $res_ctx->load_color_settings( 'm_bg_color', 'm_bg', 'm_bg_gradient', '', '' );
        $res_ctx->load_settings_raw('m_close_color', $res_ctx->get_shortcode_att('m_close_color'));
        $res_ctx->load_settings_raw('ms_border_color', $res_ctx->get_shortcode_att('ms_border_color'));
        $res_ctx->load_color_settings( 'ms_bg_color', 'ms_bg', 'ms_bg_gradient', '', '' );



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_header' );
        $res_ctx->load_font_settings( 'f_title' );
        $res_ctx->load_font_settings( 'f_meta' );
        $res_ctx->load_font_settings( 'f_m_title' );

    }

	/**696
	 * Disable loop block features. This block does not use a loop and it dosn't need to run a query.
	 */
	function __construct() {
		parent::disable_loop_block_features();
	}


    function render($atts, $content = null) {

        parent::render($atts); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query)

        $source = 'photo_ids';
        if( $this->get_att('source') != '' ) {
            $source = $this->get_att('source');
        }

        $additional_classes = array();
        $additional_classes[] = __CLASS__ . '_' . $source;


        $buffy = ''; //output buffer

        $buffy .= '<div class="' . $this->get_block_classes($additional_classes) . '" ' . $this->get_block_html_atts() . '>';

            //get the block js
            $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();


            // block title wrap
            $buffy .= '<div class="td-block-title-wrap">';
                $buffy .= $this->get_block_title(); //get the block title
                $buffy .= $this->get_pull_down_filter(); //get the sub category filter for this block
            $buffy .= '</div>';

            if( td_util::get_option('tds_flickr_api_key') == '' && TD_DEPLOY_MODE == 'deploy' ) {
                $buffy .= td_util::get_block_error('Flickr', '<strong>A Flickr API key</strong> has not been provided. Go to <strong>Theme Panel > Social Networks > Flickr API Configuration</strong>');
            } else {
                $flickr_data = td_flickr::get_data($atts);

                $buffy .= '<div id=' . $this->block_uid . ' class="td_block_inner td-mc1-wrap">';
                    if( $flickr_data != FALSE ) {
                    switch ($source) {
                        case 'photo_ids':
                        case 'user_id':
                        case 'album_id':
                            foreach ( $flickr_data as $photo_id => $photo ) {
                                $buffy .= '<div class="td-flkr-item td-flkr-photo">';
                                    $buffy .= '<div class="td-flkr-item-inner">';
                                        $buffy .= '<div class="td-flkr-feat-img" style="background-image:url(' . $photo['thumb_img'] . ')" data-flkr-preview-img="' . $photo['preview_img'] . '" data-flkr-full-img="' . $photo['full_img'] . '"></div>';

                                        $buffy .= '<div class="td-flkr-meta-info">';
                                            $buffy .= '<h3 class="td-flkr-title">' . $photo['title'] . '</h3>';
                                        $buffy .= '</div>';
                                    $buffy .= '</div>';
                                $buffy .= '</div>';
                            }

                            break;

                        case 'user_albums':
                            foreach ( $flickr_data as $gallery_id => $gallery ) {
                                $buffy .= '<div class="td-flkr-item td-flkr-album" data-flkr-album-id="' . $gallery_id . '" data-flkr-album-title="' . $gallery['title'] . '">';
                                    $buffy .= '<div class="td-flkr-item-inner">';
                                        $buffy .= '<div class="td-flkr-feat-img" style="background-image:url(' . $gallery['preview_img'] . ')"></div>';

                                        $buffy .= '<div class="td-flkr-meta-info">';
                                            $buffy .= '<h3 class="td-flkr-title">' . $gallery['title'] . '</h3>';
                                            $buffy .= '<div class="td-flkr-count-photos">' . $gallery['count_photos'] . ' photos</div>';
                                            $buffy .= '<div class="td-flkr-count-views">' . $gallery['count_views'] . ' views</div>';
                                        $buffy .= '</div>';
                                    $buffy .= '</div>';
                                $buffy .= '</div>';
                            }

                            break;
                    }
                }
                $buffy .= '</div>';


                // display error if either photo ids/user id/album id fields are empty
                // or can't retrieve photos
                switch ($source) {
                    case 'photo_ids':
                        if( $this->get_att('photo_ids') == '' ) {
                            $buffy .= td_util::get_block_error('Flickr', '<strong>Photo id field</strong> is empty. Configure this block/widget and enter a list of photo id\'s');
                        } else if ( $flickr_data == FALSE ) {
                            $buffy .= td_util::get_block_error('Flickr', '<strong>Photo ids</strong> were not found or can\'t be retrieved.');
                        }
                        break;
                    case 'user_id':
                        if( $this->get_att('user_id') == '' ) {
                            $buffy .= td_util::get_block_error('Flickr', '<strong>User id field</strong> is empty. Configure this block/widget and enter a user id');
                        } else if ( $flickr_data == FALSE ) {
                            $buffy .= td_util::get_block_error('Flickr', '<strong>User</strong> doesn\'t exist or does not have any photos');
                        }
                        break;
                    case 'user_albums':
                        if( $this->get_att('user_id') == '' ) {
                            $buffy .= td_util::get_block_error('Flickr', '<strong>User id field</strong> is empty. Configure this block/widget and enter a user id');
                        } else if ( $flickr_data == FALSE ) {
                            $buffy .= td_util::get_block_error('Flickr', '<strong>User</strong> doesn\'t exist or does not have any albums');
                        }
                        break;
                    case 'album_id':
                        if( $this->get_att('album_id') == '' ) {
                            $buffy .= td_util::get_block_error('Flickr', '<strong>Album id field</strong> is empty. Configure this block/widget and enter an album id');
                        } else if ( $flickr_data == FALSE ) {
                            $buffy .= td_util::get_block_error('Flickr', '<strong>Album</strong> doesn\'t exist or does not have any photos');
                        }
                        break;
                    default:
                        break;
                }

            }

        $buffy .= '</div>';

        return $buffy;

    }
}