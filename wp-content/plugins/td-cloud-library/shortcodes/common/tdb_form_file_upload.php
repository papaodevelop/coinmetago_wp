<?php

/**
 * Class tdb_form_file_upload
 */

class tdb_form_file_upload extends td_block {

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

                /* @style_general_tdb_form_file_upload */
                .tdb_form_file_upload {
                    transform: translateZ(0);
                    margin-bottom: 28px;
                    font-family: -apple-system,BlinkMacSystemFont,\"Segoe UI\",Roboto,Oxygen-Sans,Ubuntu,Cantarell,\"Helvetica Neue\",sans-serif;
                    font-size: 14px;
                }
                body .tdb_form_file_upload .tdb-s-form .tdb-s-form-group {
                    display: flex;
                    margin-bottom: 0;
                }
                body .tdb_form_file_upload .tdb-s-form .tdb-s-notif {
                    display: none;
                    margin-top: 28px;
                }
                
                /* @style_general_tdb_form_file_upload_composer */
                .tdb_form_file_upload .tdb-s-form-file-input {
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
                body .$unique_block_class .tdb-s-form .tdb-s-form-file {
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
                body .$unique_block_class .tdb-s-form .tdb-s-form-file {
                    flex: 1;
                }
                
                
                /* @all_input_border */
                body .$unique_block_class .tdb-s-form .tdb-s-form-file-box {
                    border: @all_input_border @all_input_border_style @all_input_border_color;
                }
                /* @input_radius */
                body .$unique_block_class .tdb-s-form .tdb-s-form-file-box,
                body .$unique_block_class .tdb-s-form .tdb-s-form-file-preview-image .tdb-s-ffip-img ,
                body .$unique_block_class .tdb-s-form .tdb-s-form-file-preview-video video {
                    border-radius: @input_radius;
                }
                
                /* @notif_radius */
                body .$unique_block_class .tdb-s-notif {
                    border-radius: @notif_radius;
                }
                
                /* @clear_btn_radius */
                body .$unique_block_class .tdb-s-ffp-remove {
                    border-radius: @clear_btn_radius;
                }
                
                
                /* @accent_color */
                body .$unique_block_class .tdb-s-form .tdb-s-form-file:hover .tdb-s-form-file-box,
                body .$unique_block_class .tdb-s-form .tdb-s-form-file.tdb-s-form-file-dragover .tdb-s-form-file-box {
                    color: @accent_color;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-file:hover .tdb-s-ffu-ico,
                body .$unique_block_class .tdb-s-form .tdb-s-form-file.tdb-s-form-file-dragover .tdb-s-ffu-ico {
                    stroke: @accent_color;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-file:hover .tdb-s-form-file-box,
                body .$unique_block_class .tdb-s-form .tdb-s-form-file.tdb-s-form-file-dragover .tdb-s-form-file-box {
                    border-color: @accent_color;
                }
                /* @input_outline_accent_color */
                body .$unique_block_class .tdb-s-form .tdb-s-form-file:hover .tdb-s-form-file-box,
                body .$unique_block_class .tdb-s-form .tdb-s-form-file.tdb-s-form-file-dragover .tdb-s-form-file-box {
                    outline-color: @input_outline_accent_color;
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
                body .$unique_block_class .tdb-s-form .tdb-s-form-file-box {
                    color: @input_color;
                }
                /* @input_bg */
                body .$unique_block_class .tdb-s-form .tdb-s-form-file-box {
                    background-color: @input_bg;
                }
                
                /* @clear_btn_color */
                body .$unique_block_class .tdb-s-ffp-remove svg {
                    stroke: @clear_btn_color;
                }
                /* @clear_btn_color_h */
                body .$unique_block_class .tdb-s-ffp-remove:hover svg {
                    stroke: @clear_btn_color_h;
                }
                /* @clear_btn_bg */
                body .$unique_block_class .tdb-s-ffp-remove {
                    background-color: @clear_btn_bg;
                }
                /* @clear_btn_bg_h */
                body .$unique_block_class .tdb-s-ffp-remove:hover {
                    background-color: @clear_btn_bg_h;
                }
                
                /* @notif_warning_color */
                body .$unique_block_class .tds-s-notif-warning {
                    color: @notif_warning_color;
                }
                /* @notif_warning_bg */
                body .$unique_block_class .tds-s-notif-warning {
                    background-color: @notif_warning_bg;
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
        $res_ctx->load_settings_raw( 'style_general_tdb_form_file_upload', 1 );
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $res_ctx->load_settings_raw( 'style_general_tdb_form_file_upload_composer', 1 );
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
        if( $all_input_border != '' && is_numeric( $all_input_border ) ) {
            $res_ctx->load_settings_raw( 'all_input_border', $all_input_border . 'px' );
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


        // clear input button border radius
        $clear_btn_radius = $res_ctx->get_shortcode_att('clear_btn_radius');
        $res_ctx->load_settings_raw( 'clear_btn_radius', $clear_btn_radius );
        if( $clear_btn_radius != '' && is_numeric( $clear_btn_radius ) ) {
            $res_ctx->load_settings_raw( 'clear_btn_radius', $clear_btn_radius . 'px' );
        }


        // notifications border radius
        $notif_radius = $res_ctx->get_shortcode_att('notif_radius');
        $res_ctx->load_settings_raw( 'notif_radius', $notif_radius );
        if( $notif_radius != '' && is_numeric( $notif_radius ) ) {
            $res_ctx->load_settings_raw( 'notif_radius', $notif_radius . 'px' );
        }



        /*-- COLORS -- */
        $accent_color = $res_ctx->get_shortcode_att('accent_color');
        $res_ctx->load_settings_raw( 'accent_color', $accent_color );
        if( !empty( $accent_color ) ) {
            $res_ctx->load_settings_raw('input_outline_accent_color', td_util::hex2rgba($accent_color, 0.1));
        }

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

        $res_ctx->load_settings_raw( 'clear_btn_color', $res_ctx->get_shortcode_att('clear_btn_color') );
        $res_ctx->load_settings_raw( 'clear_btn_color_h', $res_ctx->get_shortcode_att('clear_btn_color_h') );
        $res_ctx->load_settings_raw( 'clear_btn_bg', $res_ctx->get_shortcode_att('clear_btn_bg') );
        $res_ctx->load_settings_raw( 'clear_btn_bg_h', $res_ctx->get_shortcode_att('clear_btn_bg_h') );

        $notif_warning_color = $res_ctx->get_shortcode_att('notif_warning_color');
        $res_ctx->load_settings_raw( 'notif_warning_color', $notif_warning_color );
        if( !empty( $notif_warning_color ) ) {
            $res_ctx->load_settings_raw('notif_warning_bg', td_util::hex2rgba($notif_warning_color, 0.08));
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


        // file type
        $file_type = $this->get_att('file_type') != '' ? $this->get_att('file_type') : 'image';


        // supported file extensions
        $file_extensions = array('jpg', 'jpeg', 'png', 'gif', 'ico');

        switch ( $file_type ) {
            case 'document':
                $file_extensions = array('pdf', 'doc', 'docx', 'ppt', 'pptx', 'pps', 'ppsx', 'odt', 'xls', 'xlsx', 'psd', 'zip');
                break;
            case 'audio':
                $file_extensions = array('mp3', 'm4a', 'ogg', 'wav');
                break;
            case 'video':
                $file_extensions = array('mp4', 'm4v', 'mov', 'wmv', 'avi', 'mpg', 'ogv', '3gp', '3g2');
        }


        // max upload size
        $max_upload_size = wp_max_upload_size();


        // custom field
        $custom_field = $this->get_att('custom_field');
        if( $custom_field == '' ) {
            $custom_field = 'featured_image';
        }


        // required field
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
            $label_txt = 'File upload';
        }

        // Label description
        $label_descr_txt = rawurldecode( base64_decode( strip_tags( $this->get_att('descr_txt') ) ) );


        // Form type
        $form_type = $this->get_att('form_type');
        if( $form_type == '' ) {
            $form_type = 'post';
        }


        // Get the field value based on form type
        $is_previewing = false;
        $file_preview_info = array();
        $file_id = '';
        $preview_html = '';
        switch ( $form_type ) {
            case 'post':
                if ( isset($_GET['post_id']) && !( tdc_state::is_live_editor_iframe() || tdc_state::is_live_editor_ajax() ) ) {
                    $post = get_post($_GET['post_id']);

                    if( $post && ( $post->post_author == $current_user_id || $is_current_user_admin ) ) {
                        $post_id = $_GET['post_id'];

                        if( $custom_field == 'featured_image' ) {
                            if ( has_post_thumbnail( $post_id ) ) {
                                $post_thumbnail_id = get_post_thumbnail_id( $post_id );
                                if ( !empty( $post_thumbnail_id ) ) {
                                    $file_id = $post_thumbnail_id;
                                }
                            }
                        } else if( $custom_field == 'featured_audio' ) {
                            $featured_audio_url = get_post_meta( $post_id, 'td_post_audio', true );

                            if( !empty($featured_audio_url) ) {
                                $file_id = td_util::get_attachment_id($featured_audio_url['td_audio']);
                            }
                        } else if( $custom_field == 'featured_video' ) {
                            $featured_video_url = get_post_meta( $post_id, 'td_post_video', true );

                            if( !empty($featured_video_url) ) {
                                $file_id = td_util::get_attachment_id($featured_video_url['td_video']);
                            }
                        } else {
                            $file_id = get_post_meta($post_id, $custom_field, true);
                        }
                    }
                }

                break;

            case 'user':
                $file_id = get_user_meta($current_user_id, $custom_field, true);

                if( !empty( $file_id ) ) {
                    if( $custom_field == 'td_user_avatars' && is_array( $file_id ) ) {
                        $file_id = $file_id['media_id'];
                    }
                }

                break;
        }

        if( !empty($file_id) ) {
            $file_info = get_post( $file_id );

            if( $file_info ) {
                $file_mime = wp_check_filetype($file_info->guid);

                $file_preview_info = array(
                    'name' => $file_info->post_title,
                    'url' => $file_info->guid,
                    'extension' => $file_mime['ext'],
                    'type' => $file_mime['type']
                );
            }
        }

        if( !empty( $file_preview_info ) ) {
            $is_previewing = true;

            switch ( $file_type ) {
                case 'image':
                    $preview_html = '<div class="tdb-s-form-file-preview tdb-s-form-file-preview-image">';
                        $preview_html .= '<div class="tdb-s-ffip-img" style="background-image:url(' . $file_preview_info['url'] . ')"></div>';

                        $preview_html .= '<button class="tdb-s-btn tdb-s-btn-sm tdb-s-btn-red tdb-s-ffp-remove" title="Remove image file"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>';
                    $preview_html .= '</div>';

                    break;

                case 'document':
                    $preview_html = '<div class="tdb-s-form-file-box tdb-s-form-file-preview tdb-s-form-file-preview-document">';
                        $preview_html .= '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text tdb-s-ffu-ico"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>';

                        $preview_html .= '<div class="tdb-s-ffu-txt">' . $file_preview_info['name'] . '.' . $file_preview_info['extension'] . '</div>';

                        $preview_html .= '<button class="tdb-s-btn tdb-s-btn-sm tdb-s-btn-red tdb-s-ffp-remove" title="Remove file"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>';
                    $preview_html .= '</div>';

                    break;

                case 'audio':
                    $preview_html = '<div class="tdb-s-form-file-preview tdb-s-form-file-preview-audio">';
                        $preview_html .= '<audio controls class="tdb-s-ffu-audio">';
                            $preview_html .= '<source src="' . $file_preview_info['url'] . '" type="' . $file_preview_info['type'] . '">';
                        $preview_html .= '</audio>';

                        $preview_html .= '<button class="tdb-s-btn tdb-s-btn-sm tdb-s-btn-red tdb-s-ffp-remove" title="Remove audio file"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>';
                    $preview_html .= '</div>';

                    break;

                case 'video':
                    $preview_html = '<div class="tdb-s-form-file-preview tdb-s-form-file-preview-video">';
                        $preview_html .= '<video controls class="tdb-s-ffu-video">';
                            $preview_html .= '<source src="' . $file_preview_info['url'] . '" type="' . $file_preview_info['type'] . '">';
                        $preview_html .= '</video>';

                        $preview_html .= '<button class="tdb-s-btn tdb-s-btn-sm tdb-s-btn-red tdb-s-ffp-remove" title="Remove video file"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>';
                    $preview_html .= '</div>';

                    break;
            }
        }


        $buffy = ''; //output buffer


        $buffy .= '<div class="' . $this->get_block_classes() . ' ' . ( $disable_for_guests ? 'tdb-disabled' : '' ) . '" ' . $this->get_block_html_atts() . ' data-form-type="' . $form_type . '" data-custom-field="' . $custom_field . '" data-required="' . $required . '" data-file-type="' . $file_type . '" data-no-save="' . ( $is_previewing ? 'true' : 'false' ) . '">';

            //get the block css
            $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();


            $buffy .= '<div class="tdb-block-inner td-fix-index tdb-s-form">';
                $buffy .= '<div class="tdb-s-form-content">';
                    $buffy .= '<div class="tdb-s-fc-inner">';
                        $buffy .= '<div class="tdb-s-form-group tdb-s-content" data-custom-field="' . $custom_field  .'">';
                            $buffy .= '<label class="tdb-s-form-label">';
                                $buffy .= $label_txt;
                                if( $required ) {
                                    $buffy .= '<span class="tdb-s-form-label-required"> *</span>';
                                }

                                if( $label_descr_txt != '' ) {
                                    $buffy .= '<span class="tdb-s-form-label-descr">' . $label_descr_txt . '</span>';
                                }
                            $buffy .= '</label> ';

                            $buffy .= '<div class="tdb-s-form-file tdb-s-content ' . ( $is_previewing ? 'tdb-s-form-file-previewing' : '' ) . ' ' . ( $disable_for_guests ? 'tdb-s-form-file-disabled' : '' ) . '">';
                                if( $preview_html != '' ) {
                                    $buffy .= $preview_html;
                                }

                                $buffy .= '<div class="tdb-s-form-file-box tdb-s-form-file-upload">';
                                    $buffy .= '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload-cloud tdb-s-ffu-ico"><polyline points="16 16 12 12 8 16"></polyline><line x1="12" y1="12" x2="12" y2="21"></line><path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path><polyline points="16 16 12 12 8 16"></polyline></svg>';

                                    $buffy .= '<div class="tdb-s-ffu-txt">' . __td( 'Drag and drop or browse', TD_THEME_NAME ) . '</div>';

                                    $buffy .= '<input class="tdb-s-form-file-input" name="tdb-posts-form-file" type="file" accept=".' . implode(',.', $file_extensions) . '" ' . ( $disable_for_guests ? 'disabled' : '' ) . ' />';
                                $buffy .= '</div>';
                            $buffy .= '</div>';
                        $buffy .= '</div>';

                        $buffy .= '<div class="tdb-s-notif tdb-s-notif-sm tdb-s-notif-warning"></div>';
                    $buffy .= '</div>';
                $buffy .= '</div>';
            $buffy .= '</div>';


            if( !( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) ) {
                ob_start();
                ?>
                <script>
                    /* global jQuery:{} */
                    jQuery().ready(function () {

                        let uid = '<?php echo $this->block_uid ?>',
                            $blockObj = jQuery('.<?php echo $this->block_uid ?>');

                        let tdbFormFileUploadItem = new tdbFormFileUpload.item();
                        // block uid
                        tdbFormFileUploadItem.uid = uid;
                        // block object
                        tdbFormFileUploadItem.blockObj = $blockObj;
                        // file type
                        tdbFormFileUploadItem.fileType = '<?php echo $file_type ?>';
                        // file extensions
                        tdbFormFileUploadItem.fileExtensions = <?php echo json_encode($file_extensions) ?>;
                        // file extensions
                        tdbFormFileUploadItem.maxUploadSize = '<?php echo $max_upload_size ?>';

                        tdbFormFileUpload.addItem(tdbFormFileUploadItem);

                    });
                </script>
                <?php
                td_js_buffer::add_to_footer( "\n" . td_util::remove_script_tag( ob_get_clean() ) );
            }
        $buffy .= '</div> <!-- ./block -->';


        return $buffy;
    }

}