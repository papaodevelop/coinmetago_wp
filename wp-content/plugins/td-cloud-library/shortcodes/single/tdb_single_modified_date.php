<?php

/**
 * Class td_single_modified_date
 */

class tdb_single_modified_date extends td_block {

    public function get_custom_css() {
        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $in_composer = td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax();
        $in_element = td_global::get_in_element();
        $unique_block_class_prefix = '';
        if( $in_element || $in_composer ) {
            $unique_block_class_prefix = 'tdc-row';

            if( $in_element && $in_composer ) {
                $unique_block_class_prefix = 'tdc-row-composer';
            }
        }
        $general_block_class = $unique_block_class_prefix ? '.' . $unique_block_class_prefix : '';
        $unique_block_class = ( $unique_block_class_prefix ? $unique_block_class_prefix . ' .' : '' ) . ( $in_composer ? 'tdc-column .' : '' ) . $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>

                /* @style_general_modified_date */
                $general_block_class .tdb_single_modified_date .tdb-date-icon-svg {
                  position: relative;
                  line-height: 0;
                }
                $general_block_class .tdb_single_modified_date svg {
                  height: auto;
                }
                $general_block_class .tdb_single_modified_date svg,
                $general_block_class .tdb_single_modified_date svg * {
                  fill: #444;
                }
                
                /* @make_inline */
                .$unique_block_class {
                    display: inline-block;
                }
                /* @float_right */
                .$unique_block_class {
                    float: right;
                }
                
                /* @icon_size */
                .$unique_block_class i {
                    font-size: @icon_size;
                }
                /* @icon_svg_size */
                .$unique_block_class svg {
                    width: @icon_svg_size;
                }
                /* @icon_space */
                .$unique_block_class .tdb-date-icon {
                    margin-right: @icon_space;
                }
				/* @icon_align */
				.$unique_block_class .tdb-date-icon {
					position: relative;
					top: @icon_align;
				}
				
                /* @date_color */
				.$unique_block_class {
					color: @date_color;
				}
				.$unique_block_class svg,
				.$unique_block_class svg * {
					fill: @date_color;
				}
                /* @icon_color */
				.$unique_block_class i {
					color: @icon_color;
				}
				.$unique_block_class svg,
				.$unique_block_class svg * {
					fill: @icon_color;
				}
                /* @additional_color */
				.$unique_block_class span {
					color: @additional_color;
				}
				
				
				/* @f_date */
				.$unique_block_class {
					@f_date
				}
				/* @f_additional */
				.$unique_block_class span {
					@f_additional
				}
				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'style_general_post_meta', 1 );
        $res_ctx->load_settings_raw( 'style_general_modified_date', 1 );

        // make inline
        $res_ctx->load_settings_raw( 'make_inline', $res_ctx->get_shortcode_att('make_inline') );

        // float right
        $res_ctx->load_settings_raw( 'float_right', $res_ctx->get_shortcode_att('float_right') );



        /*-- ICON -- */
        $icon = $res_ctx->get_icon_att('tdicon');
        // icon size
        $icon_size = $res_ctx->get_shortcode_att('icon_size');
        if( base64_encode( base64_decode( $icon ) ) == $icon ) {
            $res_ctx->load_settings_raw( 'icon_size', $icon_size );
            if( $icon_size != '' ) {
                if( is_numeric( $icon_size ) ) {
                    $res_ctx->load_settings_raw( 'icon_svg_size', $icon_size . 'px' );
                }
            } else {
                $res_ctx->load_settings_raw( 'icon_svg_size', '14px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'icon_size', $icon_size );
            if( $icon_size != '' ) {
                if( is_numeric( $icon_size ) ) {
                    $res_ctx->load_settings_raw( 'icon_size', $icon_size . 'px' );
                }
            } else {
                $res_ctx->load_settings_raw( 'icon_size', '14px' );
            }
        }

        // icon space
        $icon_space = $res_ctx->get_shortcode_att('icon_space');
        $res_ctx->load_settings_raw( 'icon_space', $icon_space );
        if( $icon_space != '' ) {
            if( is_numeric( $icon_space ) ) {
                $res_ctx->load_settings_raw( 'icon_space', $icon_space . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'icon_space', '5px' );
        }

        // icon_align
        $icon_align = $res_ctx->get_shortcode_att('icon_align');
        if ( $icon_align != 0 || !empty($icon_align) ) {
            $res_ctx->load_settings_raw( 'icon_align', $icon_align . 'px' );
        }



        /*-- COLORS -- */
        $res_ctx->load_settings_raw( 'date_color', $res_ctx->get_shortcode_att('date_color') );
        $res_ctx->load_settings_raw( 'icon_color', $res_ctx->get_shortcode_att('icon_color') );
        $res_ctx->load_settings_raw( 'additional_color', $res_ctx->get_shortcode_att('additional_color') );



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_date' );
        $res_ctx->load_font_settings( 'f_additional' );

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

        $post_modified_date_data = $tdb_state_single->post_modified->__invoke( $atts );
        
        $additional_text = $this->get_att( 'additional_text' );
        $extra_text = $this->get_att( 'extra_text' );
        $additional_text_after = $this->get_att( 'additional_text_after' );
        $time_ago = $this->get_att( 'time_ago' );

        $display_date = $post_modified_date_data['modified_date'];
        $display_extra_text = '';
        if ( $time_ago == true and !empty( $post_modified_date_data['human_time_diff'] ) ) {
            $display_date = $post_modified_date_data['human_time_diff'];
            $display_extra_text = $extra_text;
        }

        // date icon
        $date_icon = $this->get_icon_att( 'tdicon' );
        $date_icon_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $date_icon_data = 'data-td-svg-icon="' . $this->get_att('tdicon') . '"';
        }
        $date_icon_html = '';
        if ( $date_icon != '' ) {
            if( base64_encode( base64_decode( $date_icon ) ) == $date_icon ) {
                $date_icon_html = '<span class="tdb-date-icon tdb-date-icon-svg" ' . $date_icon_data . '>' . base64_decode( $date_icon ) . '</span>';
            } else {
                $date_icon_html = '<i class="tdb-date-icon ' . $date_icon . '"></i>';
            }
        }

        //In HTML documents we must use the ISO 8601 format
        $show_date = '<time class="entry-date updated td-module-date" datetime="' . $post_modified_date_data['date'] . '">' . $display_date . ' ' . $display_extra_text . '</time>';

        if ( !empty($additional_text) ) {
            $additional_text = '<span>' . $additional_text . '</span>';

            if( $additional_text_after !== '' ) {
                $show_date = $show_date . ' ' . $additional_text;
            } else {
                $show_date = $additional_text . ' ' . $show_date;
            }
        }

        // add icon
        $show_date = $date_icon_html . $show_date;

        $buffy = ''; //output buffer

        $buffy .= '<div class="' . $this->get_block_classes() . ' tdb-post-meta" ' . $this->get_block_html_atts() . '>';

            //get the block css
            $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();


            $buffy .= '<div class="tdb-block-inner td-fix-index">';
        
                //we don't use datetime attribute because we already add post meta
                //@see post_item_scope_meta property in tdb_state_single.php for post meta data
                if ( $post_modified_date_data['human_time_diff'] != 'hide' ) {
                    $buffy .= $show_date;
                }
        
            $buffy .= '</div>';

        $buffy .= '</div> <!-- ./block -->';

        return $buffy;
    }

}