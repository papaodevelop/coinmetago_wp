<?php

/**
 * Class td_single_post_views
 */

class tdb_single_reading_progress extends td_block {

    public function get_custom_css() {
        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $unique_block_class = $this->block_uid;
        $unique_bar_id = $unique_block_class . '_b';

        $compiled_css = '';

        $raw_css =
            "<style>

                /* @style_general_tdb_single_reading_progress */
                .tdb_single_reading_progress {
                    margin-bottom: 0;
                }
                .td-srp-bar {
                    width: 100%;
                    height: 8px;
                }
                .td-srp-bar-fill {
                    width: 0;
                    max-width: 100%;
                    height: 8px;
                    background-color: #4db2ec;
                    transition: width .2s ease;
                }
                #td-srp-fixed-wrap .td-srp-bar {
                    position: fixed;
                    z-index: 10001;
                }
                .td-srp-top {
                    top: 0;
                }
                @media (min-width: 783px) {
                    .admin-bar .td-srp-top {
                        top: 32px;
                    }
                }
                .td-srp-bottom {
                    bottom: 0;
                }
                
                
                /* @style_general_tdb_single_reading_progress_composer */
                .tdb_single_reading_progress .tdb-srp-placeholder {
                    font-size: 13px;
                    font-weight: normal;
                    text-align: left;
                    padding: 20px;
                    border: 1px solid rgba(190, 190, 190, 0.35);
                    color: rgba(125, 125, 125, 0.8);
                }
                .td-srp-inline .td-srp-bar-fill {
                    width: 30%;
                }
                
               
               
                /* @bar_height */
                #$unique_bar_id,
                #$unique_bar_id .td-srp-bar-fill {
                    height: @bar_height;
                }
                
                
                
                /* @bar_fill */
                #$unique_bar_id .td-srp-bar-fill {
                    background-color: @bar_fill;
                }
                
                /* @bar_fill_shadow */
                #$unique_bar_id .td-srp-bar-fill {
                    box-shadow: @bar_fill_shadow;
                }
                
            </style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'style_general_tdb_single_reading_progress', 1 );

        if( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) {
            $res_ctx->load_settings_raw( 'style_general_tdb_single_reading_progress_composer', 1 );
        }



        /*-- LAYOUT -- */
        $bar_height = $res_ctx->get_shortcode_att('bar_height');
        $res_ctx->load_settings_raw('bar_height', $bar_height);
        if( $bar_height != '' && is_numeric( $bar_height ) ) {
            $res_ctx->load_settings_raw('bar_height', $bar_height . 'px');
        }



        /*-- COLORS -- */
        $res_ctx->load_settings_raw('bar_fill', $res_ctx->get_shortcode_att('bar_fill'));

        $res_ctx->load_shadow_settings( 0, 0, 2, 0,  'rgba(0, 0, 0, 0.2)', 'bar_fill_shadow' );

    }

    /**
     * Disable loop block features. This block does not use a loop and it doesn't need to run a query.
     */
    function __construct() {
        parent::disable_loop_block_features();
    }


    function render( $atts, $content = null ) {

        parent::render( $atts ); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query)


        // flag to check if wea re in composer
        $in_composer = tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe();


        // progress bar position
        $bar_pos = $this->get_att('bar_pos');
        if( $bar_pos == '' ) {
            $bar_pos = 'top';
        }


        $buffy = ''; //output buffer

        $buffy .= '<div class="' . $this->get_block_classes() . ' tdb-post-meta" ' . $this->get_block_html_atts() . ' data-bar-position="' . $bar_pos . '">';

            //get the block css
            $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();


            $buffy .= '<div class="tdb-block-inner td-fix-index">';
                if( $bar_pos == 'inline' ) {
                    $buffy .= '<div class="td-srp-wrap">';
                        $buffy .= '<div id="' . $this->block_uid . '_b" class="td-srp-bar td-srp-inline" data-article-index="0">';
                            $buffy .= '<div class="td-srp-bar-fill"></div>';
                        $buffy .= '</div>';
                    $buffy .= '</div>';
                } else {
                    if( $in_composer ) {
                        $buffy .= '<div class="tdb-srp-placeholder">Single Post Reading Progress Bar ' . $bar_pos . ' settings</div>';
                    }
                }
            $buffy .= '</div>';
        $buffy .= '</div>';

        return $buffy;
    }

}