<?php
// v3 - for wp_010 from block 3

class td_block_trending_now extends td_block {

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
            
                /* @style_general_trending_now */
                .td_block_trending_now {
                  padding: 0 18px;
                }
                @media (min-width: 768px) and (max-width: 1018px) {
                  .td_block_trending_now {
                    padding: 0 6px;
                  }
                }
                .td-trending-now-wrapper {
                  display: flex;
                  align-items: center;
                  position: relative;
                  -webkit-transform: translate3d(0px, 0px, 0px);
                  transform: translate3d(0px, 0px, 0px);
                  overflow: hidden;
                }
                .td-trending-now-wrapper .td-next-prev-wrap {
                  margin: 0 0 0 auto;
                  z-index: 1;
                }
                .td-trending-now-wrapper:hover .td-trending-now-title {
                  background-color: #4db2ec;
                }
                .td-trending-now-wrapper .td-trending-now-nav-right {
                  padding-left: 2px;
                }
                .td-trending-now-title {
                  background-color: #222;
                  font-family: 'Roboto', sans-serif;
                  font-size: 12px;
                  text-transform: uppercase;
                  color: #fff;
                  padding: 2px 10px 1px;
                  display: inline-block;
                  line-height: 22px;
                  -webkit-transition: background-color 0.3s;
                  transition: background-color 0.3s;
                  cursor: default;
                  -webkit-user-select: none;
                  user-select: none;
                }
                @-moz-document url-prefix() {
                  .td-trending-now-title {
                    line-height: 21px;
                  }
                }
                .td-trending-now-display-area {
                  display: flex;
                  align-items: center;
                  vertical-align: top;
                  padding: 0 0 0 15px;
                }
                .td-trending-now-display-area .entry-title {
                  font-size: 15px;
                  line-height: 25px;
                  margin: 0;
                }
                .td-trending-now-post {
                  opacity: 0;
                  position: absolute;
                  top: 0;
                  padding-right: 119px;
                  overflow: hidden;
                }
                .td-trending-now-post:first-child {
                  opacity: 1;
                  z-index: 1;
                }
                @media (min-width: 768px) and (max-width: 1018px) {
                  .td-trending-now-post {
                    padding-right: 107px;
                  }
                }
                @media (max-width: 767px) {
                  .td_block_trending_now {
                    padding: 0;
                  }
                  .td-trending-now-wrapper {
                    flex-direction: column;
                    text-align: center;
                  }
                  .td-trending-now-wrapper .td-next-prev-wrap {
                    display: none;
                  }
                  .td-trending-now-title {
                    padding: 2px 10px 1px;
                  }
                  .td-trending-now-display-area {
                    width: 100%;
                    padding: 0;
                    display: block;
                    height: 26px;
                    position: relative;
                    top: 10px;
                  }
                  .td-trending-now-display-area .td_module_trending_now .entry-title {
                    font-size: 14px;
                    line-height: 16px;
                  }
                  .td-trending-now-post {
                    width: 100%;
                    padding-right: 0;
                  }
                }
                .td-trending-now-post:first-child {
                  opacity: 1;
                }
                .td-next-prev-wrap .td-trending-now-nav-right {
                  margin-right: 0;
                }
                .td_block_trending_now.td-trending-style2 {
                  border: 1px solid #eaeaea;
                  padding-top: 20px;
                  padding-bottom: 20px;
                }

                
                /* @title_padding */
                .$unique_block_class .td-trending-now-title {
					padding: @title_padding;
				}

                /* @header_color */
				body .$unique_block_class .td-trending-now-title,
				.$unique_block_class .td-trending-now-wrapper:hover .td-trending-now-title {
					background-color: @header_color;
				}
				.$unique_block_class .td-next-prev-wrap a:hover {
				    color: #fff;
				}
               
                /* @header_text_color */
				.$unique_block_class .td-trending-now-title {
					color: @header_text_color;
				}
                /* @articles_color */
				.$unique_block_class .entry-title a {
					color: @articles_color;
				}
				/* @next_prev_color */
				.$unique_block_class .td-next-prev-wrap a {
					color: @next_prev_color;
				}
				/* @next_prev_border_color */
				.$unique_block_class .td-next-prev-wrap a {
					border-color: @next_prev_border_color;
				}

				/* @f_title */
				.$unique_block_class .td-trending-now-title {
					@f_title
				}
				/* @f_article_line_height */
				.$unique_block_class .td-trending-now-display-area {
				    height: @f_article_line_height;
				}
				/* @f_article */
				.$unique_block_class .entry-title a {
					@f_article
				}
				/* @next_prev_hover_color */
				.td-theme-wrap .$unique_block_class .td-next-prev-wrap a:hover {
					background-color: @next_prev_hover_color;
					border-color: @next_prev_hover_color;
				}
				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'style_general_trending_now', 1 );


        // title padding
        $title_padding = $res_ctx->get_shortcode_att('title_padding');
        $res_ctx->load_settings_raw( 'title_padding', $title_padding );
        if( $title_padding != '' && is_numeric( $title_padding ) ) {
            $res_ctx->load_settings_raw( 'title_padding', $title_padding . 'px' );
        }

	    $res_ctx->load_settings_raw( 'header_color', $res_ctx->get_shortcode_att('header_color') );
	    $res_ctx->load_settings_raw( 'header_text_color', $res_ctx->get_shortcode_att('header_text_color') );
        // articles title color
        $res_ctx->load_settings_raw( 'articles_color', $res_ctx->get_shortcode_att('articles_color') );

        // next prev arrow color
        $res_ctx->load_settings_raw( 'next_prev_color', $res_ctx->get_shortcode_att('next_prev_color') );

        // next prev border color
        $res_ctx->load_settings_raw( 'next_prev_border_color', $res_ctx->get_shortcode_att('next_prev_border_color') );
        // next prev hover color
        $res_ctx->load_settings_raw( 'next_prev_hover_color', $res_ctx->get_shortcode_att('next_prev_hover_color') );



        /*-- FONTS -- */
	    $res_ctx->load_font_settings( 'f_title' );
	    $res_ctx->load_font_settings( 'f_article' );
        $res_ctx->load_settings_raw( 'f_article_line_height', $res_ctx->get_shortcode_att('f_article_font_line_height') );
    }

    function render($atts, $content = null) {
        parent::render($atts); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query)

        $buffy = ''; //output buffer


	    $additional_classes = array();


        // style 2
        if(!empty($atts['style'])) {
	        $additional_classes []= 'td-pb-full-cell';
	        $additional_classes []= 'td-trending-style2';
        }


        $buffy .= '<div class="' . $this->get_block_classes($additional_classes) . '" ' . $this->get_block_html_atts() . '>';

		    //get the block js
		    $buffy .= $this->get_block_css();

		    //get the js for this block
		    $buffy .= $this->get_block_js();

            //get the sub category filter for this block
            //$buffy .= $this->get_pull_down_filter();

            $buffy .= '<div class="td_block_inner">';

                $buffy .= $this->inner($this->td_query->posts, '' , $atts);  //inner content of the block

            $buffy .= '</div>';

            //get the ajax pagination for this block (not required - this block comes with it's own pagination)
            //$buffy .= $this->get_block_pagination();
        $buffy .= '</div>';
        return $buffy;
    }

    function inner($posts, $td_column_number = '', $atts = array()) {

        $buffy = '';
        $navigation = '';
        $timer = '';

        if (!empty($atts['navigation'])) {
            $navigation = $atts['navigation'];
        }

        if (!empty($atts['timer'])) {
            $timer = $atts['timer'];
        }

        $custom_title = $this->get_att('custom_title');
        if( $custom_title == '' ) {
            $custom_title = __td('Trending Now', TD_THEME_NAME);
        }

        $title_length = '';
        if( isset($atts ["mt_tl"]) && $atts ["mt_tl"] != '' ) {
            $title_length = $atts ["mt_tl"];
        }

        $title_tag = 'h3';
        if( isset($atts ["mt_title_tag"]) && $atts ["mt_title_tag"] != '' ) {
            $title_tag = $atts ["mt_title_tag"];
        }

        $td_block_layout = new td_block_layout();

        if (!empty($posts)) {
            $buffy .= '<div class="td-trending-now-wrapper" id="' . $this->block_uid . '" data-start="' . esc_attr($navigation) . '" data-timer="' . esc_attr($timer) . '">';
                $buffy .= '<div class="td-trending-now-title">' . $custom_title . '</div><div class="td-trending-now-display-area">';

                foreach ($posts as $post_count => $post) {

                    $td_module_trending_now = new td_module_trending_now($post);

                    $buffy .= $td_module_trending_now->render($post_count, $title_length, $title_tag);
                }

                $buffy .= '</div>';

                $buffy .= '<div class="td-next-prev-wrap">';
                    $buffy .= '<a href="#"
                                  class="td_ajax-prev-pagex td-trending-now-nav-left" 
                                  aria-label="prev" 
                                  data-block-id="' . $this->block_uid . '"
                                  data-moving="left"
                                  data-control-start="' . $navigation . '"><i class="td-icon-menu-left"></i></a>';

                    $buffy .= '<a href="#"
                                  class="td_ajax-next-pagex td-trending-now-nav-right" 
                                  aria-label="next"
                                  data-block-id="' . $this->block_uid . '"
                                  data-moving="right"
                                  data-control-start="' . $navigation . '"><i class="td-icon-menu-right"></i></a>';
                $buffy .= '</div>';
            $buffy .= '</div>';
        }
        return $buffy;
    }

    /**
     * tagDiv composer specific code:
     *  - it's added to the end of the iFrame when the live editor is active (when @see td_util::tdc_is_live_editor_iframe()  === true)
     *  - it is injected int he iFrame and evaluated there in the global scoupe when a new block is added to the page via AJAX!
     * @return string the JS without <script> tags
     */
    function js_tdc_callback_ajax() {
        $buffy = '';

        // add a new composer block - that one has the delete callback
        $buffy .= $this->js_tdc_get_composer_block();

        ob_start();
        ?>
        <script>
            (function () {

                var item = new tdTrendingNow.item(),
                    autoStart = jQuery('#<?php echo $this->block_uid?>').data('start'),
                    iCont = 0;

                //block unique ID
                item.blockUid = '<?php echo $this->block_uid; ?>';
                //wrapper unique ID
                item.wrapperUid = jQuery('#<?php echo $this->block_uid?> .td-trending-now-wrapper').attr('id');

                //set trendingNowAutostart
                if (autoStart !== 'manual') {
                    item.trendingNowAutostart = autoStart;
                }

                //take the text from each post from current trending-now-wrapper
                jQuery('#' + item.blockUid + ' .td-trending-now-post').each(function() {
                    //trending_list_posts[i_cont] = jQuery(this)[0].outerHTML;
                    item.trendingNowPosts[iCont] = jQuery(this);
                    //increment the counter
                    iCont++;
                });

                /**
                 * if an item does not have posts no animation is required so no item is created
                 * @see tdTrendingNow.addItem
                 */
                if (typeof item.trendingNowPosts === 'undefined' || item.trendingNowPosts.length < 1) {
                    return;
                }

                //add the item
                tdTrendingNow.addItem(item);
                
            })();
        </script>
        <?php
        return $buffy . td_util::remove_script_tag(ob_get_clean());
    }
}
