<?php

/**
 * Class tdb_single_content
 */
class tdb_single_content extends td_block {

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
			
                /* @style_general_single_content */
                .tdb_single_content {
                  margin-bottom: 0;
                  *zoom: 1;
                }
                .tdb_single_content:before,
                .tdb_single_content:after {
                  display: table;
                  content: '';
                  line-height: 0;
                }
                .tdb_single_content:after {
                  clear: both;
                }
                .tdb_single_content .tdb-block-inner > *:not(.wp-block-quote):not(.alignwide):not(.alignfull.wp-block-cover.has-parallax):not(.td-a-ad) {
                  margin-left: auto;
                  margin-right: auto;
                }
                .tdb_single_content a {
                  pointer-events: auto;
                }
                .tdb_single_content .td-spot-id-top_ad .tdc-placeholder-title:before {
                  content: 'Article Top Ad' !important;
                }
                .tdb_single_content .td-spot-id-inline_ad0 .tdc-placeholder-title:before {
                  content: 'Article Inline Ad 1' !important;
                }
                .tdb_single_content .td-spot-id-inline_ad1 .tdc-placeholder-title:before {
                  content: 'Article Inline Ad 2' !important;
                }
                .tdb_single_content .td-spot-id-inline_ad2 .tdc-placeholder-title:before {
                  content: 'Article Inline Ad 3' !important;
                }
                .tdb_single_content .td-spot-id-bottom_ad .tdc-placeholder-title:before {
                  content: 'Article Bottom Ad' !important;
                }
                .tdb_single_content .id_top_ad,
                .tdb_single_content .id_bottom_ad {
                  clear: both;
                  margin-bottom: 21px;
                  text-align: center;
                }
                .tdb_single_content .id_top_ad img,
                .tdb_single_content .id_bottom_ad img {
                  margin-bottom: 0;
                }
                .tdb_single_content .id_top_ad .adsbygoogle,
                .tdb_single_content .id_bottom_ad .adsbygoogle {
                  position: relative;
                }
                .tdb_single_content .id_ad_content-horiz-left,
                .tdb_single_content .id_ad_content-horiz-right,
                .tdb_single_content .id_ad_content-horiz-center {
                  margin-bottom: 15px;
                }
                @media (max-width: 767px) {
                  .tdb_single_content .id_ad_content-horiz-left,
                  .tdb_single_content .id_ad_content-horiz-right,
                  .tdb_single_content .id_ad_content-horiz-center {
                    margin: 0 auto 26px auto;
                  }
                }
                .tdb_single_content .id_ad_content-horiz-left img,
                .tdb_single_content .id_ad_content-horiz-right img,
                .tdb_single_content .id_ad_content-horiz-center img {
                  margin-bottom: 0;
                }
                .tdb_single_content .id_ad_content-horiz-center {
                  text-align: center;
                }
                .tdb_single_content .id_ad_content-horiz-center img {
                  margin-right: auto;
                  margin-left: auto;
                }
                .tdb_single_content .id_ad_content-horiz-left {
                  float: left;
                  margin-top: 9px;
                  margin-right: 21px;
                }
                @media (max-width: 767px) {
                  .tdb_single_content .id_ad_content-horiz-left {
                    margin-right: 0;
                  }
                }
                .tdb_single_content .id_ad_content-horiz-right {
                  float: right;
                  margin-top: 6px;
                  margin-left: 21px;
                }
                @media (max-width: 767px) {
                  .tdb_single_content .id_ad_content-horiz-right {
                    margin-left: 0;
                  }
                }
                @media (max-width: 767px) {
                  .tdb_single_content .td-a-ad {
                    float: none;
                    text-align: center;
                  }
                  .tdb_single_content .td-a-ad img {
                    margin-right: auto;
                    margin-left: auto;
                  }
                  .tdb_single_content .tdc-a-ad {
                    float: none;
                  }
                }
                .tdb_single_content .tdc-a-ad .tdc-placeholder-title {
                  width: 300px;
                  height: 250px;
                }
                .tdb_single_content .tdc-a-ad .tdc-placeholder-title:before {
                  position: absolute;
                  top: 50%;
                  -webkit-transform: translateY(-50%);
                  transform: translateY(-50%);
                  margin: auto;
                  display: table;
                  width: 100%;
                }
                @media print {
                  .single .td-header-template-wrap,
                  .single .td-footer-template-wrap,
                  .single .td_block_wrap:not(.tdb_breadcrumbs):not(.tdb_single_categories):not(.tdb-single-title):not(.tdb_single_author):not(.tdb_single_date ):not(.tdb_single_comments_count ):not(.tdb_single_post_views):not(.tdb_single_featured_image):not(.tdb_single_content) {
                    display: none;
                  }
                  .single.td-animation-stack-type0 .post img {
                    opacity: 1 !important;
                  }
                }
                .tdb_single_content .tdb-block-inner.td-fix-index {
                    word-break: break-word;
                }
                
                /* @content_width */
                .$unique_block_class .tdb-block-inner {
                    max-width: @content_width;
                    margin-left: auto;
                    margin-right: auto;
                }
                
                /* @center_extend_both */
				.$unique_block_class img.aligncenter,
				.$unique_block_class .aligncenter img {
			        margin-left: -@center_extend_both;
			        width: calc(100% + (2 * @center_extend_both));
			        max-width: none !important;
		        }
		        /* @center_extend_left */
				.$unique_block_class img.aligncenter,
				.$unique_block_class .aligncenter img {
			        margin-left: -@center_extend_left;
			        width: calc(100% + @center_extend_left);
			        max-width: none !important;
		        }
		        /* @center_extend_right */
				.$unique_block_class img.aligncenter,
				.$unique_block_class .aligncenter img {
			        margin-right: -@center_extend_right;
			        width: calc(100% + @center_extend_right);
			        max-width: none !important;
		        }
		        /* @left_extend */
				.$unique_block_class .alignleft {
			        margin-left: -@left_extend;
		        }
		        /* @right_extend */
				.$unique_block_class .alignright {
			        margin-right: -@right_extend;
		        }
		        /* @caption_space */
				.$unique_block_class .wp-caption-text,
				.$unique_block_class figcaption {
			        margin: @caption_space;
		        }

                /* @ad_top_margin */
				.$unique_block_class [class*='top_ad '] {
					margin: @ad_top_margin;
				} 
				/* @ad_inline_margin */
				.$unique_block_class [class*='inline_ad0'] {
					margin: @ad_inline_margin;
				}
				/* @ad_inline_margin1 */
				.$unique_block_class [class*='inline_ad1'] {
					margin: @ad_inline_margin1;
				}
				/* @ad_inline_margin2 */
				.$unique_block_class [class*='inline_ad2'] {
					margin: @ad_inline_margin2;
				}
				/* @ad_bottom_margin */
				.$unique_block_class [class*='bottom_ad '] {
					margin: @ad_bottom_margin;
				} 


				/* @f_post */
				.$unique_block_class,
                .$unique_block_class > p,
                .$unique_block_class .tdb-block-inner > p {
			        @f_post
		        }
				/* @f_h1 */
				.$unique_block_class h1 {
			        @f_h1
		        }
				/* @f_h2 */
				.$unique_block_class h2 {
			        @f_h2
		        }
				/* @f_h3 */
				.$unique_block_class h3:not(.tds-locker-title) {
			        @f_h3
		        }
				/* @f_h4 */
				.$unique_block_class h4 {
			        @f_h4
		        }
				/* @f_h5 */
				.$unique_block_class h5 {
			        @f_h5
		        }
				/* @f_h6 */
				.$unique_block_class h6 {
			        @f_h6
		        }
				/* @f_list */
				.$unique_block_class li {
			        @f_list
		        }
				/* @f_list_arrow */
				.$unique_block_class li:before {
				    margin-top: 1px;
			        line-height: @f_list_arrow !important;
		        }
				/* @f_bq */
				.$unique_block_class .tdb-block-inner blockquote p {
			        @f_bq
		        }
				/* @f_caption */
				.$unique_block_class .wp-caption-text,
				.$unique_block_class figcaption {
			        @f_caption
		        }
		        
				/* @post_color */
				.$unique_block_class,
				.$unique_block_class p {
			        color: @post_color;
		        }
				/* @h_color */
				.$unique_block_class h1,
				.$unique_block_class h2,
				.$unique_block_class h3:not(.tds-locker-title),
				.$unique_block_class h4,
				.$unique_block_class h5,
				.$unique_block_class h6 {
			        color: @h_color;
		        }
				/* @bq_color */
				.$unique_block_class .tdb-block-inner blockquote p {
			        color: @bq_color;
		        }
				/* @caption_color */
				.$unique_block_class .wp-caption-text,
				.$unique_block_class figcaption {
			        color: @caption_color;
		        }
				/* @a_color */
				.$unique_block_class a {
			        color: @a_color;
		        }
				/* @a_hover_color */
				.$unique_block_class a:hover {
			        color: @a_hover_color;
		        }
		        
				/* @ad_top_color */
				.$unique_block_class [class*='top_ad'] .td-adspot-title {
			        color: @ad_top_color;
		        }
				/* @ad_inline_color */
				.$unique_block_class [class*='inline_ad0'] .td-adspot-title {
			        color: @ad_inline_color;
		        }
				/* @ad_inline_color1 */
				.$unique_block_class [class*='inline_ad1'] .td-adspot-title {
			        color: @ad_inline_color1;
		        }
				/* @ad_inline_color2 */
				.$unique_block_class [class*='inline_ad2'] .td-adspot-title {
			        color: @ad_inline_color2;
		        }
				/* @ad_bot_color */
				.$unique_block_class [class*='bottom_ad'] .td-adspot-title {
			        color: @ad_bot_color;
		        }
		        
		        /* @pag_text */
				.$unique_block_class .page-nav a,
				.$unique_block_class .page-nav span {
					color: @pag_text;
				}
				/* @pag_bg */
				.$unique_block_class .page-nav a,
				.$unique_block_class .page-nav span {    
					background-color: @pag_bg;
				}
				/* @pag_border */
				.$unique_block_class .page-nav a,
				.$unique_block_class .page-nav span {
					border-color: @pag_border;
				}
				/* @pag_a_text */
				.$unique_block_class .page-nav > div {
					color: @pag_a_text;
				}
				/* @pag_a_bg */
				.$unique_block_class .page-nav > div {    
					background-color: @pag_a_bg !important;
					border-color: @pag_a_bg !important;
				}
				/* @pag_a_border */
				.$unique_block_class .page-nav > div {
					border-color: @pag_a_border !important;
				}
				/* @pag_h_text */
				.$unique_block_class .page-nav a:hover,
				.$unique_block_class .page-nav span:hover {
					color: @pag_h_text;
				}
				/* @pag_h_bg */
				.$unique_block_class .page-nav a:hover,
				.$unique_block_class .page-nav span:hover {    
					background-color: @pag_h_bg !important;
					border-color: @pag_h_bg !important;
				}
				/* @pag_h_border */
				.$unique_block_class .page-nav a:hover,
				.$unique_block_class .page-nav span:hover {
					border-color: @pag_h_border !important;
				}
				
				
				/* @f_pag */
				.$unique_block_class .page-nav a,
				.$unique_block_class .page-nav span,
				.$unique_block_class .page-nav > div {
					@f_pag
				}

			</style>";


		$td_css_res_compiler = new td_css_res_compiler( $raw_css );
		$td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

		$compiled_css .= $td_css_res_compiler->compile_css();
		return $compiled_css;
	}

	static function cssMedia( $res_ctx ) {


        $res_ctx->load_settings_raw( 'style_general_single_content', 1 );

	    // content width
	    $content_width = $res_ctx->get_shortcode_att('content_width');
        if( $content_width != '' && is_numeric( $content_width ) ) {
            $content_width = $content_width . 'px';
        } else if( $content_width == 'auto') {
            $content_width = 'none';
        }
        $res_ctx->load_settings_raw( 'content_width', $content_width );

	    // center extend
	    $center_extend = $res_ctx->get_shortcode_att('center_extend');
        $center_extend_val = $center_extend;
        if( $center_extend != '' && is_numeric( $center_extend ) ) {
            $center_extend_val = $center_extend . 'px';
        }
        $center_extend_dir = $res_ctx->get_shortcode_att('center_extend_dir');
        if( $center_extend_dir == '' ) {
            $res_ctx->load_settings_raw( 'center_extend_both', $center_extend_val );
        } else if( $center_extend_dir == 'left' ) {
            $res_ctx->load_settings_raw( 'center_extend_left', $center_extend_val );
        } else if( $center_extend_dir == 'right' ) {
            $res_ctx->load_settings_raw( 'center_extend_right', $center_extend_val );
        }

        // left extend
        $left_extend = $res_ctx->get_shortcode_att('left_extend');
        $res_ctx->load_settings_raw( 'left_extend', $left_extend );
        if( $left_extend != '' && is_numeric( $left_extend ) ) {
            $res_ctx->load_settings_raw( 'left_extend', $left_extend . 'px' );
        }

        // right extend
        $right_extend = $res_ctx->get_shortcode_att('right_extend');
        $res_ctx->load_settings_raw( 'right_extend', $right_extend );
        if( $right_extend != '' && is_numeric( $right_extend ) ) {
            $res_ctx->load_settings_raw( 'right_extend', $right_extend . 'px' );
        }

        // image caption text
        $caption_space = $res_ctx->get_shortcode_att('caption_space');
        $res_ctx->load_settings_raw( 'caption_space', $caption_space );
        if( $caption_space != '' && is_numeric( $caption_space ) ) {
            $res_ctx->load_settings_raw( 'caption_space', $caption_space . 'px' );
        }

        // top ad margin
        $ad_top_margin = $res_ctx->get_shortcode_att('ad_top_margin');
        $res_ctx->load_settings_raw( 'ad_top_margin', $ad_top_margin );
        if ( is_numeric( $ad_top_margin ) ) {
            $res_ctx->load_settings_raw( 'ad_top_margin', $ad_top_margin . 'px' );
        }
        // inline ad1 margin
        $ad_inline_margin = $res_ctx->get_shortcode_att('ad_inline_margin');
        $res_ctx->load_settings_raw( 'ad_inline_margin', $ad_inline_margin );
        if ( is_numeric( $ad_inline_margin ) ) {
            $res_ctx->load_settings_raw( 'ad_inline_margin', $ad_inline_margin . 'px' );
        }
        // inline ad2 margin
        $ad_inline_margin1 = $res_ctx->get_shortcode_att('ad_inline_margin1');
        $res_ctx->load_settings_raw( 'ad_inline_margin1', $ad_inline_margin1 );
        if ( is_numeric( $ad_inline_margin1 ) ) {
            $res_ctx->load_settings_raw( 'ad_inline_margin1', $ad_inline_margin1 . 'px' );
        }
        // inline ad3 margin
        $ad_inline_margin2 = $res_ctx->get_shortcode_att('ad_inline_margin2');
        $res_ctx->load_settings_raw( 'ad_inline_margin2', $ad_inline_margin2 );
        if ( is_numeric( $ad_inline_margin2 ) ) {
            $res_ctx->load_settings_raw( 'ad_inline_margin2', $ad_inline_margin2 . 'px' );
        }
        // bottom ad margin
        $ad_bottom_margin = $res_ctx->get_shortcode_att('ad_bottom_margin');
        $res_ctx->load_settings_raw( 'ad_bottom_margin', $ad_bottom_margin );
        if ( is_numeric( $ad_bottom_margin ) ) {
            $res_ctx->load_settings_raw( 'ad_bottom_margin', $ad_bottom_margin . 'px' );
        }


		/*-- fonts -- */
		$res_ctx->load_font_settings( 'f_post' );
		$res_ctx->load_font_settings( 'f_h1' );
		$res_ctx->load_font_settings( 'f_h2' );
		$res_ctx->load_font_settings( 'f_h3' );
		$res_ctx->load_font_settings( 'f_h4' );
		$res_ctx->load_font_settings( 'f_h5' );
		$res_ctx->load_font_settings( 'f_h6' );
		$res_ctx->load_font_settings( 'f_list' );
		$f_list_size = $res_ctx->get_shortcode_att('f_list_font_size');
        $f_list_lh = $res_ctx->get_shortcode_att('f_list_font_line_height');
        if( $f_list_size != '' && $f_list_lh == '' ) {
            if( is_numeric( $f_list_size ) ) {
                $res_ctx->load_settings_raw( 'f_list_arrow', $f_list_size . 'px' );
            } else {
                $res_ctx->load_settings_raw( 'f_list_arrow', $f_list_size );
            }
        }
        if( $f_list_size == '' && $f_list_lh != '' ) {
            if( is_numeric( $f_list_lh ) ) {
                $res_ctx->load_settings_raw( 'f_list_arrow', 15 * $f_list_lh . 'px' );
            } else {
                $res_ctx->load_settings_raw( 'f_list_arrow', $f_list_lh );
            }
        }
        if( $f_list_size != '' && $f_list_lh != '' ) {
            if( is_numeric( $f_list_lh ) ) {
                $res_ctx->load_settings_raw( 'f_list_arrow', $f_list_size * $f_list_lh . 'px' );
            } else {
                $res_ctx->load_settings_raw( 'f_list_arrow', $f_list_lh );
            }
        }
		$res_ctx->load_font_settings( 'f_bq' );
        $res_ctx->load_font_settings( 'f_caption' );
        $res_ctx->load_font_settings( 'f_pag' );


		// colors
		$res_ctx->load_settings_raw( 'post_color', $res_ctx->get_shortcode_att('post_color') );
		$res_ctx->load_settings_raw( 'h_color', $res_ctx->get_shortcode_att('h_color') );
		$res_ctx->load_settings_raw( 'bq_color', $res_ctx->get_shortcode_att('bq_color') );
        $res_ctx->load_settings_raw( 'caption_color', $res_ctx->get_shortcode_att('caption_color') );
		$res_ctx->load_settings_raw( 'a_color', $res_ctx->get_shortcode_att('a_color') );
		$res_ctx->load_settings_raw( 'a_hover_color', $res_ctx->get_shortcode_att('a_hover_color') );
        $res_ctx->load_settings_raw( 'ad_top_color', $res_ctx->get_shortcode_att('ad_top_color') );
        $res_ctx->load_settings_raw( 'ad_inline_color', $res_ctx->get_shortcode_att('ad_inline_color') );
        $res_ctx->load_settings_raw( 'ad_inline_color1', $res_ctx->get_shortcode_att('ad_inline_color1') );
        $res_ctx->load_settings_raw( 'ad_inline_color2', $res_ctx->get_shortcode_att('ad_inline_color2') );
        $res_ctx->load_settings_raw( 'ad_bot_color', $res_ctx->get_shortcode_att('ad_bot_color') );
        $res_ctx->load_settings_raw( 'pag_text', $res_ctx->get_shortcode_att('pag_text') );
        $res_ctx->load_settings_raw( 'pag_bg', $res_ctx->get_shortcode_att('pag_bg') );
        $res_ctx->load_settings_raw( 'pag_border', $res_ctx->get_shortcode_att('pag_border') );
        $res_ctx->load_settings_raw( 'pag_a_text', $res_ctx->get_shortcode_att('pag_a_text') );
        $res_ctx->load_settings_raw( 'pag_a_bg', $res_ctx->get_shortcode_att('pag_a_bg') );
        $res_ctx->load_settings_raw( 'pag_a_border', $res_ctx->get_shortcode_att('pag_a_border') );
        $res_ctx->load_settings_raw( 'pag_h_text', $res_ctx->get_shortcode_att('pag_h_text') );
        $res_ctx->load_settings_raw( 'pag_h_bg', $res_ctx->get_shortcode_att('pag_h_bg') );
        $res_ctx->load_settings_raw( 'pag_h_border', $res_ctx->get_shortcode_att('pag_h_border') );

	}

    /**
     * Disable loop block features. This block does not use a loop and it doesn't need to run a query.
     */
    function __construct() {
        parent::disable_loop_block_features();
    }


    function render($atts, $content = null) {
        parent::render($atts); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query)

	    global $tdb_state_single;
	    $post_content_data = $tdb_state_single->post_content->__invoke( $this->get_all_atts() );

        $buffy = ''; //output buffer

        if( $post_content_data['post_content'] != '' ) {
            $buffy .= '<div class="' . $this->get_block_classes()  . ' td-post-content tagdiv-type" ' . $this->get_block_html_atts() . '>';

                //get the block css
                $buffy .= $this->get_block_css();

                //get the js for this block
                $buffy .= $this->get_block_js();


                $buffy .= '<div class="tdb-block-inner td-fix-index">';
                    $buffy .= $post_content_data['post_content'];
                    if ($post_content_data['post_pagination'] != '') {
                        $buffy .= '<footer>';
                            $buffy .= $post_content_data['post_pagination'];
                        $buffy .= '<footer>';
                    }
                $buffy .= '</div>';

            $buffy .= '</div>';
        }

        return $buffy;
    }
}

