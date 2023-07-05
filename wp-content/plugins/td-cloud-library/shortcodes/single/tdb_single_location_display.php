<?php

/**
 * Class tdb_single_location_display
 */

class tdb_single_location_display extends td_block {

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

                /* @style_general_tdb_single_location_display */
                .tdb_single_location_display {
                    transform: translateZ(0);
                    font-family: -apple-system,BlinkMacSystemFont,\"Segoe UI\",Roboto,Oxygen-Sans,Ubuntu,Cantarell,\"Helvetica Neue\",sans-serif;
                    font-size: 14px;
                }
                .tdb_single_location_display .tdb-sld-map {
                    position: relative;
                    background-color: #D7D8DE;
                    height: 400px;
                    overflow: hidden;
                    box-sizing: initial;
                }
                html body .tdb_single_location_display .tdb-block-inner .tdb-sld-map .gm-style img {
                    opacity: 1;
                }
                .tdb_single_location_display .tdb-sld-map-loading {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                }
                .tdb_single_location_display .tdb-sld-map-loading:before {
                    content: '';
                    width: 40px;
                    height: 40px;
                    border: 3px solid #888;
                    border-left-color: transparent;
                    border-right-color: transparent;
                    border-radius: 50%;
                    -webkit-animation: tdb-fullspin-anim 1s infinite ease-out;
                    animation: tdb-fullspin-anim 1s infinite ease-out;
                }
                .tdb_single_location_display .tdb-sld-map-loading:after {
                    content: 'Loading the map...';
                    margin-top: 15px;
                    font-size: 1em;
                    font-weight: 500;
                    color: #666;
                }
                /* @style_general_tdb_single_location_display_composer */
                .tdb_single_location_display .tdb-block-inner {
                    pointer-events: none;
                }
                
                
                /* @map_height */
                body .$unique_block_class .tdb-sld-map  {
                    height: @map_height;
                }
                
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        /*-- GENERAL STYLES -- */
        $res_ctx->load_settings_raw( 'style_general_tdb_single_location_display', 1 );
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $res_ctx->load_settings_raw( 'style_general_tdb_single_location_display_composer', 1 );
        }



        /*-- LAYOUT -- */
        // map height
        $map_height = $res_ctx->get_shortcode_att('map_height');
        $res_ctx->load_settings_raw( 'map_height', $map_height );
        if( $map_height != '' && is_numeric( $map_height ) ) {
            $res_ctx->load_settings_raw( 'map_height', $map_height . 'px' );
        }

    }

    /**
     * Disable loop block features. This block does not use a loop and it doesn't need to run a query.
     */
    function __construct() {
        parent::disable_loop_block_features();
    }


    function render( $atts, $content = null ) {
        parent::render( $atts ); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query)

        $location_display_address = '';

        $curr_template_type = tdb_state_template::get_template_type();
        if( $curr_template_type == 'single' || $curr_template_type == 'cpt' ) {
            global $tdb_state_single;
            $location_display_address = $tdb_state_single->post_location_display->__invoke($atts);
        } else {
            $location_display_address = 'Hooper Avenue 8208, Los Angeles, California, United States';
        }


        $buffy = ''; //output buffer

        if( $location_display_address == '' ) {
            return $buffy;
        }


        $buffy .= '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';

            //get the block css
            $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();

            if( td_util::get_gm_api_key() == '' ) {
                $buffy .= td_util::get_block_error('Location Finder', '<strong>A Google Maps API key</strong> has not been provided. Go to <strong>Theme Panel > Social/APIs > Google Maps API Configuration</strong>');
            } else {
                $buffy .= '<div class="tdb-block-inner td-fix-index">';
                    $buffy .= '<div class="tdb-sld-map">';
                        $buffy .= '<div class="tdb-sld-map-loading"></div>';
                    $buffy .= '</div>';
                $buffy .= '</div>';

                ob_start();
                ?>
                <script>
                    /* global jQuery:{} */
                    jQuery().ready(function () {

                        let uid = '<?php echo $this->block_uid ?>',
                            $blockObj = jQuery('.<?php echo $this->block_uid ?>');

                        let tdbLocationDisplayItem = new tdbLocationDisplay.item();
                        // block uid
                        tdbLocationDisplayItem.uid = uid;
                        // block object
                        tdbLocationDisplayItem.blockObj = $blockObj;
                        // address
                        tdbLocationDisplayItem.address = '<?php echo $location_display_address ?>';

                        tdbLocationDisplay.addItem(tdbLocationDisplayItem);

                    });
                </script>
                <?php
                td_js_buffer::add_to_footer( "\n" . td_util::remove_script_tag( ob_get_clean() ) );
            }

        $buffy .= '</div> <!-- ./block -->';

        return $buffy;
    }


    function js_tdc_callback_ajax() {

        $buffy = '';

        // add a new composer block - that one has the delete callback
        $buffy .= $this->js_tdc_get_composer_block();

        global $tdb_state_single;
        $location_display_address = $tdb_state_single->post_location_display->__invoke($this->get_all_atts());

        ob_start();

        ?>
        <script>

            /* global jQuery:{} */
            (function () {

                let uid = '<?php echo $this->block_uid ?>',
                    $blockObj = jQuery('.<?php echo $this->block_uid ?>');

                let tdbLocationDisplayItem = new tdbLocationDisplay.item();
                // block uid
                tdbLocationDisplayItem.uid = uid;
                // block object
                tdbLocationDisplayItem.blockObj = $blockObj;
                // address
                tdbLocationDisplayItem.address = '<?php echo $location_display_address ?>';

                tdbLocationDisplay.addItem(tdbLocationDisplayItem);

            })();

        </script>
        <?php

        return $buffy . td_util::remove_script_tag( ob_get_clean() );

    }

}