<?php

/**
 * Class tdb_form_content
 */

class tdb_form_content extends td_block {

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

                /* @style_general_tdb_form_content */
                .tdb_form_content {
                    transform: translateZ(0);
                    margin-bottom: 28px;
                    font-family: -apple-system,BlinkMacSystemFont,\"Segoe UI\",Roboto,Oxygen-Sans,Ubuntu,Cantarell,\"Helvetica Neue\",sans-serif;
                    font-size: 14px;
                }
                .tdb_form_content .tdb-s-form-group {
                    display: flex;
                }
                
                /* @style_general_tdb_form_content_composer */
                .tdb_form_content .tdb-block-inner {
                    pointer-events: none;
                }
                
                
                
                /* @all_input_display_row */
                body .$unique_block_class .tdb-s-form-group {
                    flex-direction: column;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-label {
                    width: 100%;
                    margin: 0 0 8px;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-label-descr {
                    margin-bottom: 2px;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-wpeditor {
                    width: 100%;
                }
                
                /* @all_input_display_columns */
                body .$unique_block_class .tdb-s-form-group {
                    flex-direction: row;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-label {
                    width: @all_label_width;
                    margin: 0 24px 0 0;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-label-descr {
                    margin-bottom: 0;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-wpeditor {
                    flex: 1;
                }
                
                
                /* @all_input_border */
                body .$unique_block_class .tdb-s-form .tdb-s-form-wpeditor {
                    border: @all_input_border @all_input_border_style @all_input_border_color;
                }
                /* @input_radius */
                body .$unique_block_class .tdb-s-form .tdb-s-form-wpeditor {
                    border-radius: @input_radius;
                }
                
                /* @label_color */
                body .$unique_block_class .tdb-s-form .tdb-s-form-label {
                    color: @label_color;
                }
                /* @descr_color */
                body .$unique_block_class .tdb-s-form .tdb-s-form-label-descr {
                    color: @descr_color;
                }
                /* @input_color */
                body .$unique_block_class textarea {
                    color: @input_color;
                }
                /* @input_bg */
                body .$unique_block_class .tdb-s-form .tdb-s-form-wpeditor {
                    background-color: @input_bg;
                }
                
                
                /* @f_text */
                body .$unique_block_class {
                    @f_text
                }
                
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        /*-- GENERAL STYLES -- */
        $res_ctx->load_settings_raw( 'style_general_tdb_form_content', 1 );
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $res_ctx->load_settings_raw( 'style_general_tdb_form_content_composer', 1 );
        }



        /*-- LAYOUT -- */
        // inputs display
        $all_input_display = $res_ctx->get_shortcode_att('all_input_display');
        if( $all_input_display == '' || $all_input_display == 'row' ) {
            $res_ctx->load_settings_raw( 'all_input_display_row', 1 );
        } else {
            $res_ctx->load_settings_raw( 'all_input_display_columns', 1 );
        }

        // labels width
        $all_label_width = $res_ctx->get_shortcode_att('all_label_width');
        $res_ctx->load_settings_raw( 'all_label_width', $all_label_width );
        if( $all_label_width != '' ) {
            if( is_numeric( $all_label_width ) ) {
                $res_ctx->load_settings_raw( 'all_label_width', $all_label_width . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'all_label_width', '30%' );
        }


        // inputs border size
        $all_input_border = $res_ctx->get_shortcode_att('all_input_border');
        $res_ctx->load_settings_raw( 'all_input_border', $all_input_border );
        if( $all_input_border == '' ) {
            $res_ctx->load_settings_raw( 'all_input_border', '2px' );
        } else {
            if( is_numeric( $all_input_border ) ) {
                $res_ctx->load_settings_raw( 'all_input_border', $all_input_border . 'px' );
            }
        }

        // inputs border style
        $all_input_border_style = $res_ctx->get_shortcode_att('all_input_border_style');
        if( $all_input_border_style != '' ) {
            $res_ctx->load_settings_raw( 'all_input_border_style', $all_input_border_style );
        } else {
            $res_ctx->load_settings_raw( 'all_input_border_style', 'solid' );
        }

        // inputs border radius
        $input_radius = $res_ctx->get_shortcode_att('input_radius');
        $res_ctx->load_settings_raw( 'input_radius', $input_radius );
        if( $input_radius != '' && is_numeric( $input_radius ) ) {
            $res_ctx->load_settings_raw( 'input_radius', $input_radius . 'px' );
        }



        /*-- COLORS -- */
        $res_ctx->load_settings_raw( 'label_color', $res_ctx->get_shortcode_att('label_color') );
        $res_ctx->load_settings_raw( 'descr_color', $res_ctx->get_shortcode_att('descr_color') );
        $res_ctx->load_settings_raw( 'input_color', $res_ctx->get_shortcode_att('input_color') );
        $res_ctx->load_settings_raw( 'input_bg', $res_ctx->get_shortcode_att('input_bg') );
        $all_input_border_color = $res_ctx->get_shortcode_att('all_input_border_color');
        if( $all_input_border_color != '' ) {
            $res_ctx->load_settings_raw( 'all_input_border_color', $all_input_border_color );
        } else {
            $res_ctx->load_settings_raw( 'all_input_border_color', '#D7D8DE' );
        }



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
        parent::render( $atts ); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query)


        // Custom field
        $custom_field = $this->get_att('custom_field');
        if( $custom_field == '' ) {
            $custom_field = 'post_content';
        }


        // Required field
        $required = $this->get_att('required');
        if( $required != '' ) {
            $required = 1;
        } else {
            $required = 0;
        }


        // Enable only for authenticated users
        $authenticated_users = $this->get_att('authenticated_users');
        $disable_for_guests = $authenticated_users != '' && !is_user_logged_in();


        // Currently logged in user
        $current_user = wp_get_current_user();
        $current_user_id = $current_user->ID;
        $is_current_user_admin = in_array('administrator', $current_user->roles);


        // Label text
        $label_txt = $this->get_att('label_txt');
        if( $label_txt == '' ) {
            $label_txt = 'Content';
        }


        // Label description
        $label_descr_txt = rawurldecode( base64_decode( strip_tags( $this->get_att('descr_txt') ) ) );


        // Form type
        $form_type = $this->get_att('form_type');
        if( $form_type == '' ) {
            $form_type = 'post';
        }


        // Get the field value based on form type
        $content_value = '';
        switch ( $form_type ) {
            case 'post':
                if ( isset($_GET['post_id']) && !( tdc_state::is_live_editor_iframe() || tdc_state::is_live_editor_ajax() ) ) {
                    $post = get_post($_GET['post_id']);

                    if( $post && ( $post->post_author == $current_user_id || $is_current_user_admin ) ) {
                        if( $custom_field == 'post_content' ) {
                            $content_value = get_the_content(null, false, $_GET['post_id']);
                        } else {
                            $content_value = get_post_meta($_GET['post_id'], $custom_field, true);
                        }
                    }
                }

                break;

            case 'user':
                $content_value = get_user_meta($current_user_id, $custom_field, true);

                break;
        }


        $buffy = ''; //output buffer


        $buffy .= '<div class="' . $this->get_block_classes() . ' ' . ( $disable_for_guests ? 'tdb-disabled' : '' ) . '" ' . $this->get_block_html_atts() . ' data-form-type="' . $form_type . '" data-custom-field="' . $custom_field  .'" data-required="' . $required . '">';

            //get the block css
            $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();


            $buffy .= '<div class="tdb-block-inner td-fix-index tdb-s-form">';
                $buffy .= '<div class="tdb-s-form-content">';
                    $buffy .= '<div class="tdb-s-fc-inner">';
                        $buffy .= '<div class="tdb-s-form-group tdb-s-content">';
                            $buffy .= '<label class="tdb-s-form-label">';
                                $buffy .= $label_txt;
                                if( $required ) {
                                    $buffy .= '<span class="tdb-s-form-label-required"> *</span>';
                                }

                                if( $label_descr_txt != '' ) {
                                    $buffy .= '<span class="tdb-s-form-label-descr">' . $label_descr_txt . '</span>';
                                }
                            $buffy .= '</label> ';

                            $buffy .= '<div class="tdb-s-form-wpeditor ' . ( $disable_for_guests ? 'tdb-s-form-wpeditor-disabled' : '' ) . '">';
                                ob_start();

                                // Add custom style to editor iframe content
                                add_filter('tiny_mce_before_init', function ( $mceInit ){
                                    if ( ! is_admin() ) {
                                        global $wpeditorId;
                                        $text_color = $this->get_att('input_color');

                                        // Remove the css loaded in the wp editor
                                        $styles = 'body.' . $wpeditorId . ' { word-wrap: normal !important;} ' .
                                            'body.mceContentBody{ max-width: 100% !important; background: none !important} ' .
                                            'body.mceContentBody:after{ content: none !important}';

                                        if ($text_color != '') {
                                            $styles .= 'body.tagdiv-type,body h1,body h2,body h3,body h4,body h5,body h6,body .dropcap2,body .dropcap3{ color: ' . $text_color . '}';
                                        }

                                        if (isset($mceInit['content_style'])) {
                                            $mceInit['content_style'] .= ' ' . $styles . ' ';
                                        } else {
                                            $mceInit['content_style'] = $styles . ' ';
                                        }

                                        if ('deploy' === TDC_DEPLOY_MODE) {
                                            require_once TDC_PATH_LEGACY_COMMON . '/wp_booster/td_api.php';
                                        } else {
                                            require_once TDC_PATH_LEGACY_COMMON . '/wp_booster/td_api_tinymce_formats.php';
                                        }

                                        $mceInit['body_class'] .= ' tagdiv-type';

                                        td_api_tinymce_formats::_helper_get_tinymce_format();
                                    }
                                        return $mceInit;

                                });

                                // Add editor extensions as they are in theme
                                require_once TDC_PATH_LEGACY_COMMON . '/wp_booster/wp-admin/tinymce/tinymce.php';

                                add_filter( 'mce_external_plugins', 'fb_add_tinymce_plugin' );
                                // Add to line 1 form WP TinyMCE
                                add_filter( 'mce_buttons', 'td_add_tinymce_button' );

                                wp_editor(
                                    $content_value,
                                    'tdb-posts-form-content-' . $this->block_uid,
                                    array(
                                        'teeny' => false,
                                        'tinymce' => array(
                                            'content_css' => get_stylesheet_directory_uri() . '/editor-style.css'
                                        ),
                                        'textarea_name' => 'tdb-posts-form-content-' . $this->block_uid
                                    )
                                );

                                $buffy .= ob_get_clean();
                            $buffy .= '</div>';
                        $buffy .= '</div>';
                    $buffy .= '</div>';
                $buffy .= '</div>';
            $buffy .= '</div>';

        $buffy .= '</div> <!-- ./block -->';


        return $buffy;
    }

}