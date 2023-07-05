<?php
/**
 * Class tdb_breadcrumbs
 */

class tdb_breadcrumbs extends td_block {

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

                /* @style_general_breadcrumbs */
                .tdb-breadcrumbs {
                  margin-bottom: 11px;
                  font-family: 'Open Sans', 'Open Sans Regular', sans-serif;
                  font-size: 12px;
                  color: #747474;
                  line-height: 18px;
                }
                .tdb-breadcrumbs a {
                  color: #747474;
                }
                .tdb-breadcrumbs a:hover {
                  color: #000;
                }
                .tdb-breadcrumbs .tdb-bread-sep {
                  line-height: 1;
                  vertical-align: middle;
                }
                .tdb-breadcrumbs .tdb-bread-sep-svg svg {
                  height: auto;
                }
                .tdb-breadcrumbs .tdb-bread-sep-svg svg,
                .tdb-breadcrumbs .tdb-bread-sep-svg svg * {
                  fill: #c3c3c3;
                }
                .single-tdb_templates.author-template .tdb_breadcrumbs {
                  margin-bottom: 2px;
                }
                .tdb_category_breadcrumbs {
                  margin: 21px 0 9px;
                }
                .search-results .tdb_breadcrumbs {
                  margin-bottom: 2px;
                }

                
                /* @icon_size */
                .$unique_block_class .tdb-bread-sep {
                    font-size: @icon_size;
                }
                /* @icon_svg_size */
                .$unique_block_class .tdb-bread-sep-svg svg {
                    width: @icon_svg_size;
                }
                /* @icon_space */
                .$unique_block_class .tdb-bread-sep {
                    margin: 0 @icon_space;
                }
                 /* @text_color */
				.$unique_block_class,
				.$unique_block_class a {
					color: @text_color;
				}
				.$unique_block_class .tdb-bread-sep-svg svg,
				.$unique_block_class .tdb-bread-sep-svg svg * {
				    fill: @text_color;
				}
                /* @link_h_color */
				.$unique_block_class a:hover {
					color: @link_h_color;
				}
                /* @icon_color */
				.$unique_block_class .tdb-bread-sep {
					color: @icon_color;
				}
				.$unique_block_class .tdb-bread-sep-svg svg,
				.$unique_block_class .tdb-bread-sep-svg svg * {
				    fill: @icon_color;
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
				/* @f_text */
				.$unique_block_class {
					@f_text
				}
				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'style_general_breadcrumbs', 1 );

        /*-- SEPARATOR ICON -- */
        $separator_icon = $res_ctx->get_icon_att('tdicon');
        // separator icon size
        $icon_size = $res_ctx->get_shortcode_att('icon_size');
        if( base64_encode( base64_decode( $separator_icon ) ) == $separator_icon ) {
            $res_ctx->load_settings_raw( 'icon_svg_size', $icon_size );
            if( $icon_size != '' ) {
                if( is_numeric( $icon_size ) ) {
                    $res_ctx->load_settings_raw( 'icon_svg_size', $icon_size . 'px' );
                }
            } else {
                $res_ctx->load_settings_raw( 'icon_svg_size', '8px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'icon_size', $icon_size );
            if( $icon_size != '' ) {
                if( is_numeric( $icon_size ) ) {
                    $res_ctx->load_settings_raw( 'icon_size', $icon_size . 'px' );
                }
            } else {
                $res_ctx->load_settings_raw( 'icon_size', '8px' );
            }
        }

        // separator icon space
        $icon_space = $res_ctx->get_shortcode_att('icon_space');
        $res_ctx->load_settings_raw( 'icon_space', $icon_space );
        if( $icon_space != '' ) {
            if( is_numeric( $icon_space ) ) {
                $res_ctx->load_settings_raw( 'icon_space', $icon_space . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'icon_space', '5px' );
        }

        // content align
        $content_align = $res_ctx->get_shortcode_att('content_align_horizontal');
        if ( $content_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'align_center', 1 );
        } else if ( $content_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'align_right', 1 );
        } else if ( $content_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'align_left', 1 );
        }

        /*-- COLORS -- */
        // text color
        $res_ctx->load_settings_raw( 'text_color', $res_ctx->get_shortcode_att('text_color') );

        // link hover color
        $res_ctx->load_settings_raw( 'link_h_color', $res_ctx->get_shortcode_att('link_h_color') );

        // separator icon color
        $res_ctx->load_settings_raw( 'icon_color', $res_ctx->get_shortcode_att('icon_color') );



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_text' );

    }

    /**
     * Disable loop block features. This block does not use a loop and it doesn't need to run a query.
     */
    function __construct() {
        parent::disable_loop_block_features();
    }


    function render( $atts, $content = null ) {
        parent::render( $atts );

        global $tdb_state_single, $tdb_state_category, $tdb_state_author, $tdb_state_search, $tdb_state_date, $tdb_state_tag, $tdb_state_attachment, $tdb_state_single_page;

        $breadcrumbs_array = array();

        switch( tdb_state_template::get_template_type() ) {
            case 'cpt':
            case 'single':
                $breadcrumbs_array = $tdb_state_single->post_breadcrumbs->__invoke( $this->get_all_atts() );
                break;

	        case 'cpt_tax':
	        	$tdb_state_category->set_tax();
            	$breadcrumbs_array = $tdb_state_category->category_breadcrumbs->__invoke( $this->get_all_atts() );
	        	break;

            case 'category':
                $breadcrumbs_array = $tdb_state_category->category_breadcrumbs->__invoke( $this->get_all_atts() );
                break;

            case 'author':
                $breadcrumbs_array = $tdb_state_author->author_breadcrumbs->__invoke( $this->get_all_atts() );
                break;

            case 'search':
                $breadcrumbs_array = $tdb_state_search->search_breadcrumbs->__invoke( $this->get_all_atts() );
                break;

            case 'date':
                $breadcrumbs_array = $tdb_state_date->date_breadcrumbs->__invoke( $this->get_all_atts() );
                break;

            case 'tag':
                $breadcrumbs_array = $tdb_state_tag->tag_breadcrumbs->__invoke( $this->get_all_atts() );
                break;

            case 'attachment':
                $breadcrumbs_array = $tdb_state_attachment->attachment_breadcrumbs->__invoke( $this->get_all_atts() );
                break;

            case '404':
                $breadcrumbs_array = [
                    array(
                        'title_attribute' => '',
                        'url' => '',
                        'display_name' => '404'
                    )
                ];
                break;

            default:
                $breadcrumbs_array = $tdb_state_single_page->page_breadcrumbs->__invoke( $atts );
        }

        // prepare the breadcrumbs json ld data
        $breadcrumbs_json_ld = $this->create_breadcrumbs_json_ld( $breadcrumbs_array );

        // add home breadcrumb if the theme is configured to show it
        if ( $this->get_att( 'show_home' ) != '' ) {

            $home_custom_title = ( $this->get_att( 'home_custom_title' ) != '' ) ? $this->get_att( 'home_custom_title' ) : __td( 'Home', TD_THEME_NAME );
            $home_custom_title_att = ( $this->get_att( 'home_custom_title_att' ) != '' ) ? $this->get_att( 'home_custom_title_att' ) : '';
            $home_custom_link = ( $this->get_att( 'home_custom_link' ) != '' ) ? $this->get_att( 'home_custom_link' ) : home_url( '/' );

            array_unshift(
                $breadcrumbs_array,
                array(
                    'title_attribute' => $home_custom_title_att,
                    'url'             => esc_url( $home_custom_link ),
                    'display_name'    => $home_custom_title
                )
            );
        }

        // separator icon
        $separator_icon = $this->get_icon_att( 'tdicon' );
        $separator_icon_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $separator_icon_data = 'data-td-svg-icon="' . $this->get_att('tdicon') . '"';
        }

        $buffy = '';

        $buffy .= '<div class="' . $this->get_block_classes() . ' tdb-breadcrumbs " ' . $this->get_block_html_atts() . '>';

            //get the block css
            $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();

            $buffy .= '<div class="tdb-block-inner td-fix-index">';

                foreach ( $breadcrumbs_array as $key => $breadcrumb ) {

                    if ( empty( $breadcrumb['url'] ) ) {
                        if ( $key != 0 ) { //add separator only after first
                            if( base64_encode( base64_decode( $separator_icon ) ) == $separator_icon ) {
                                $buffy .= '<span class="tdb-bread-sep tdb-bread-sep-svg tdb-bred-no-url-last" ' . $separator_icon_data . '>' . base64_decode( $separator_icon ) . '</span>';
                            } else {
                                $buffy .= '<i class="tdb-bread-sep tdb-bred-no-url-last ' . $separator_icon . '"></i>';
                            }
                        }
                        //no link - breadcrumb
                        $buffy .=  '<span class="tdb-bred-no-url-last">' . esc_html( $breadcrumb['display_name'] ) . '</span>';

                    } else {
                        if ($key != 0) { //add separator only after first
                            if( base64_encode( base64_decode( $separator_icon ) ) == $separator_icon ) {
                                $buffy .= '<span class="tdb-bread-sep tdb-bread-sep-svg">' . base64_decode( $separator_icon ) . '</span>';
                            } else {
                                $buffy .= '<i class="tdb-bread-sep ' . $separator_icon . '"></i>';
                            }
                        }
                        //normal links
                        $buffy .= '<span><a title="' . esc_attr( $breadcrumb['title_attribute'] ) . '" class="tdb-entry-crumb" href="' . esc_url( $breadcrumb['url'] ) . '">' . esc_html( $breadcrumb['display_name'] ) . '</a></span>';
                    }
                }

            $buffy .= '</div>';

        $buffy .= '</div>';

        if ( !tdc_state::is_live_editor_ajax() && !tdc_state::is_live_editor_iframe() ) {
            $buffy .= $breadcrumbs_json_ld;
        }

        return $buffy;
    }

    function create_breadcrumbs_json_ld( $breadcrumbs_array ) {


//        foreach ( $breadcrumbs_array as $index => $breadcrumb_item ) {
//            if ( isset($breadcrumb_item['url']) && $breadcrumb_item['url'] === '' ) {
//                array_splice($breadcrumbs_array, $index, 1);
//            }
//        }

        //print_r($breadcrumbs_array);

        $buffy = '';

        //create the json-ld script
        if ( isset( $breadcrumbs_array[0]['url'] ) ) {

            $buffy = '';

            //script start
            $buffy .= '<script type="application/ld+json">
                        {
                            "@context": "http://schema.org",
                            "@type": "BreadcrumbList",
                            "itemListElement": [';

            //item 1
            $buffy .=  '{
                            "@type": "ListItem",
                            "position": 1,
                                "item": {
                                "@type": "WebSite",
                                "@id": "' . esc_url(get_home_url()) . '/",
                                "name": "' . __td('Home', TD_THEME_NAME) . '"                                               
                            }
                        }';

            //item 2
            $buffy .=  ',{
                            "@type": "ListItem",
                            "position": 2,
                                "item": {
                                "@type": "WebPage",
                                "@id": "' . $breadcrumbs_array[0]['url'] . '",
                                "name": "' . $breadcrumbs_array[0]['display_name'] . '"
                            }
                        }';

            if (isset($breadcrumbs_array[1]['url'])) {
                //item 3
                $buffy .=  ',{
                            "@type": "ListItem",
                            "position": 3,
                                "item": {
                                "@type": "WebPage",
                                "@id": "' . $breadcrumbs_array[1]['url'] . '",
                                "name": "' . $breadcrumbs_array[1]['display_name'] . '"                                
                            }
                        }';
            }

            if (isset($breadcrumbs_array[2]['url'])) {
                //item 4
                $buffy .=  ',{
                            "@type": "ListItem",
                            "position": 4,
                                "item": {
                                "@type": "WebPage",
                                "@id": "' . $breadcrumbs_array[2]['url'] . '",
                                "name": "' . $breadcrumbs_array[2]['display_name'] . '"                                
                            }
                        }';
            }

            //close script
            $buffy .= '    ]
                        }
                       </script>';

        }

        return $buffy;
    }

}
