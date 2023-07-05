<?php

/**
 * Class tdb_attachment_image
 */

class tdb_attachment_description extends td_block {

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

                /* @style_general_attachment_description */
                .tdb_attachment_description {
                  margin-bottom: 21px;
                }
                .tdb_attachment_description span {
                  color: #444;
                  font-size: 11px;
                  font-style: italic;
                  line-height: 17px;
                }
                
                /* @descr_color */
				.$unique_block_class span {
					color: @descr_color;
				}
				
				/* @align_left */
				.td-theme-wrap .$unique_block_class {
					text-align: left;
				}
				/* @align_center */
				.td-theme-wrap .$unique_block_class {
					text-align: center;
				}
				/* @align_right */
				.td-theme-wrap .$unique_block_class {
					text-align: right;
				}
				
				
				/* @f_descr */
				.$unique_block_class span {
					@f_descr
				}
				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'style_general_attachment_description', 1 );

        // description color
        $res_ctx->load_settings_raw( 'descr_color', $res_ctx->get_shortcode_att( 'descr_color' ) );

        // content horizontal align
        $content_align = $res_ctx->get_shortcode_att('content_align_horizontal');
        if ( $content_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'align_center', 1 );
        } else if ( $content_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'align_right', 1 );
        } else if ( $content_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'align_left', 1 );
        }



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_descr' );

    }


    // disable loop block features. This block does not use a loop and it doesn't need to run a query.
    function __construct() {
        parent::disable_loop_block_features();
    }


    function render( $atts, $content = null ) {
        parent::render( $atts );

        global $tdb_state_attachment;
        $attachment_descr_data = $tdb_state_attachment->attachment_description->__invoke( $atts );

        $buffy = '';

        if( $attachment_descr_data['description'] != '' ) {
            $buffy .= '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';

                //get the block css
                $buffy .= $this->get_block_css();

                //get the js for this block
                $buffy .= $this->get_block_js();


                $buffy .= '<div class="tdb-block-inner td-fix-index">';

                    $buffy .= '<span>' . $attachment_descr_data['description'] . '</span>';

                $buffy .= '</div>';

            $buffy .= '</div>';
        }


        return $buffy;
    }



}