<?php

/**
 * Class tdb_attachment_image
 */

class tdb_attachment_img extends td_block {

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

                /* @style_general_attachment_img */
                .tdb_attachment_img {
                  margin-bottom: 2px;
                }
                .tdb_attachment_img img {
                  display: block;
                }
				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'style_general_attachment_img', 1 );

    }

    // disable loop block features. This block does not use a loop and it doesn't need to run a query.
    function __construct() {
        parent::disable_loop_block_features();
    }


    function render( $atts, $content = null ) {
        parent::render( $atts );

        global $tdb_state_attachment;
        $attachment_img_data = $tdb_state_attachment->attachment_image->__invoke( $atts );

        $buffy = '';

        $buffy .= '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';

        //get the block css
        $buffy .= $this->get_block_css();

        //get the js for this block
        $buffy .= $this->get_block_js();


        $buffy .= '<div class="tdb-block-inner td-fix-index">';

        if ( $attachment_img_data['is_image'] === true ) {
            $buffy .= '<a href="' . $attachment_img_data['att_url'] . '" title="' . $attachment_img_data['att_title'] . '" rel="attachment">';
                $buffy.= '<img class="td-attachment-page-image" src="' . $attachment_img_data['src'] . '" alt="' . $attachment_img_data['alt'] . '" />';
            $buffy .= '</a>';
        }

        $buffy .= '</div>';

        $buffy .= '</div>';

        return $buffy;
    }



}