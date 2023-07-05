<?php


/**
 * Class tdb_author_name
 */

class tdb_author_url extends td_block {

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

                /* @style_general_author_url */
                .tdb_author_url {
                  margin-bottom: 6px;
                  font-size: 11px;
                  line-height: 21px;
                }
                .tdb_author_url .tdb-author-url {
                  display: block;
                  font-style: italic;
                  color: #444;
                }
                .tdb_author_url .tdb-author-url:hover {
                  color: #4db2ec;
                }
                
                
                /* @make_inline */
                .$unique_block_class {
                    display: inline-block;
                }
                
				/* @align_center */
				.td-theme-wrap .$unique_block_class {
					text-align: center;
				}
				/* @align_right */
				.td-theme-wrap .$unique_block_class {
					text-align: right;
				}
				/* @align_left */
				.td-theme-wrap .$unique_block_class {
					text-align: left;
				}
                
                /* @add_text_color */
                .$unique_block_class .tdb-add-text {
                    color: @add_text_color;
                }
                /* @url_color */
                .$unique_block_class .tdb-author-url {
                    color: @url_color;
                }
                /* @url_h_color */
                .$unique_block_class .tdb-author-url:hover {
                    color: @url_h_color;
                }
                
                
                
                /* @f_add */
                .$unique_block_class .tdb-add-text {
                    @f_add
                }
                /* @f_url */
                .$unique_block_class .tdb-author-url {
                    @f_url
                }
                
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'style_general_author_url', 1 );

        // make inline
        $res_ctx->load_settings_raw( 'make_inline', $res_ctx->get_shortcode_att('make_inline') );

        // content align
        $content_align = $res_ctx->get_shortcode_att('content_align_horizontal');
        if ( $content_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'align_center', 1 );
        } else if ( $content_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'align_right', 1 );
        } else if ( $content_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'align_left', 1 );
        }

        // colors
        $res_ctx->load_settings_raw( 'add_text_color', $res_ctx->get_shortcode_att('add_text_color') );
        $res_ctx->load_settings_raw( 'url_color', $res_ctx->get_shortcode_att('url_color') );
        $res_ctx->load_settings_raw( 'url_h_color', $res_ctx->get_shortcode_att('url_h_color') );



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_add' );
        $res_ctx->load_font_settings( 'f_url' );

    }


    /**
     * Disable loop block features. This block does not use a loop and it doesn't need to run a query.
     */
    function __construct() {
        parent::disable_loop_block_features();
    }


    function render( $atts, $content = null ) {
        parent::render( $atts ); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query)

        global $tdb_state_author;
        $author_url_data = $tdb_state_author->url->__invoke( $atts );

        $additional_text = $this->get_att('add_text');

        $td_target = '';
        $open_in_new_window = $this->get_att( 'open_in_new_window' );
        if ( !empty( $open_in_new_window ) ) {
            $td_target = ' target="_blank" ';
        }

        //set rel attribute on logo url
        $td_link_rel = '';
        if ('' !== $this->get_att('url_rel')) {
            $td_link_rel = ' rel="' . $this->get_att('url_rel') . '" ';
        }


        $buffy = ''; //output buffer

	    // when no data - return empty on frontend
	    if ( empty($author_url_data['url'])) {
		    return $buffy;
	    }

        $buffy .= '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';

            //get the block css
            $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();


            $buffy .= '<div class="tdb-block-inner td-fix-index">';

                if( $additional_text != '' ) {
                    $buffy .= '<span class="tdb-add-text">' . $this->get_att('add_text') . '</span>';
                }

                $buffy .= '<a href="' . $author_url_data['url'] . '" ' . $td_target . $td_link_rel . ' class="tdb-author-url">' . $author_url_data['url'] . '</a>';

            $buffy .= '</div>';

        $buffy .= '</div>';

        return $buffy;
    }

}