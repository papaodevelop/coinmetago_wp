<?php
/**
 * Created by PhpStorm.
 * User: lucian
 * Date: 2/21/2017
 * Time: 2:18 PM
 */
class td_block_pinterest extends td_block {

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
                /* @style_general_pinterest */
                .td-pinterest-main {
                    column-count: 1;
                    column-gap: 0;
                }
                .td-pinterest-main .td-pinterest-element {
                    display: block;
                }
                .td-pinterest-main .td-pinterest-element img {
                    display: block;
                    border-bottom: 0 solid transparent;
                }
                .td-pinterest-gap-2 {
                    column-gap: 2px;
                }
                .td-pinterest-gap-2 .td-pinterest-element img {
                    border-bottom-width: 2px;
                }
                .td-pinterest-gap-5 {
                    column-gap: 5px;
                }
                .td-pinterest-gap-5 .td-pinterest-element img {
                    border-bottom-width: 5px;
                }
                .td-pinterest-gap-10 {
                    column-gap: 10px;
                }
                .td-pinterest-gap-10 .td-pinterest-element img {
                    border-bottom-width: 10px;
                }
                .td_block_pinterest .td-pinterest-header {
                    margin-bottom: 26px;
                }
                .td_block_pinterest .td-pinterest-header .td-pinterest-profile-image {
                    width: 46px;
                    height: 46px;
                    border-radius: 60px;
                    overflow: hidden;
                    margin-right: 12px;
                    float: left;
                }
                .td_block_pinterest .td-pinterest-header .td-pinterest-user-meta {
                    padding-top: 2px;
                }
                .td_block_pinterest .td-pinterest-header .td-pinterest-user-meta a {
                    white-space: nowrap;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    display: inline-block;
                }
                .td_block_pinterest .td-pinterest-header .td-pinterest-user-meta .td-pinterest-user {
                    max-width: 50%;
                    margin-right: 10px;
                    font-size: 15px;
                    font-weight: bold;
                    color: #363636;
                }
                .td_block_pinterest .td-pinterest-header .td-pinterest-user-meta .td-pinterest-board {
                    max-width: 25%;
                    font-size: 12px;
                    color: #8e8e8e;
                    line-height: 19px;
                }
                .td_block_pinterest .td-pinterest-header .td-pinterest-followers {
                    display: inline-block;
                    font-size: 10px;
                    line-height: 15px;
                    position: relative;
                    top: -10px;
                }
                .td_block_pinterest .td-pinterest-header .td-pinterest-followers span {
                    font-weight: 600;
                }
                .td_block_pinterest .td-column-1 .td-pinterest-user-meta .td-pinterest-board {
                    max-width: 35%;
                }
                .td_block_pinterest .td-column-1 .td-pinterest-user-meta a {
                    display: block;
                }
                .td_block_pinterest .td-column-1 .td-pinterest-followers {
                    top: -5px;
                }
  
                

                /* @username_color */
				body .$unique_block_class .td-pinterest-header .td-pinterest-user-meta .td-pinterest-user {
					color: @username_color;
				}
                /* @board_color */
				body .$unique_block_class .td-pinterest-header .td-pinterest-user-meta .td-pinterest-board {
					color: @board_color;
				}
                /* @followers_color */
				body .$unique_block_class .td-pinterest-followers {
					color: @followers_color;
				}
				

                /* @f_header */
				body .$unique_block_class .td-block-title a,
				body .$unique_block_class .td-block-title span {
					@f_header
				}
				/* @f_user */
				body .$unique_block_class .td-pinterest-header .td-pinterest-user-meta .td-pinterest-user {
					@f_user
				}
				/* @f_board */
				body .$unique_block_class .td-pinterest-header .td-pinterest-user-meta .td-pinterest-board {
					@f_board
				}
				/* @f_followers */
				body .$unique_block_class .td-pinterest-followers {
					@f_followers
				}
				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        /*-- GENERAL -- */
        $res_ctx->load_settings_raw( 'style_general_pinterest', 1 );




        // username color
        $res_ctx->load_settings_raw( 'username_color', $res_ctx->get_shortcode_att('username_color') );

        // board name color
        $res_ctx->load_settings_raw( 'board_color', $res_ctx->get_shortcode_att('board_color') );

        // followers count color
        $res_ctx->load_settings_raw( 'followers_color', $res_ctx->get_shortcode_att('followers_color') );



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_header' );
        $res_ctx->load_font_settings( 'f_user' );
        $res_ctx->load_font_settings( 'f_board' );
        $res_ctx->load_font_settings( 'f_followers' );

    }

    /**
     * Disable loop block features. This block does not use a loop and it dosn't need to run a query.
     */
    function __construct() {
        parent::disable_loop_block_features();
    }


    function render($atts, $content = null) {

        parent::render($atts); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query)

        if (empty($td_column_number)) {
            $td_column_number = td_global::vc_get_column_number(); // get the column width of the block from the page builder API
        }

        $buffy = ''; //output buffer
        $buffy .= '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';

        //get the block js
        $buffy .= $this->get_block_css();

        // block title wrap
        $buffy .= '<div class="td-block-title-wrap">';
            $buffy .= $this->get_block_title();
            $buffy .= $this->get_pull_down_filter(); //get the sub category filter for this block
        $buffy .= '</div>';
	    
        $buffy .= '<div id=' . $this->block_uid . ' class="td-pinterest-wrap td_block_inner td-column-' . $td_column_number . '">';
        $buffy.= td_pinterest::render_generic($atts);
        $buffy .= '</div>';
        $buffy .= '</div>';
        return $buffy;
    }
}