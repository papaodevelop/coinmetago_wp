<?php
class tdb_form_input extends td_block {

    public function get_custom_css() {
        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $unique_block_class = ((td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax()) ? 'tdc-row .' : '') . $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>

                /* @style_general_tdb_form_input */
                .tdb_form_input {
                    transform: translateZ(0);
                    margin-bottom: 28px;
                    font-family: -apple-system,BlinkMacSystemFont,\"Segoe UI\",Roboto,Oxygen-Sans,Ubuntu,Cantarell,\"Helvetica Neue\",sans-serif;
                    font-size: 14px;
                }
                .tdb_form_input .tdb-s-form textarea.tdb-s-form-input {
                    min-height: 108px;
                }
                .tdb_form_input .tdb-s-content {
                    min-height: auto;
                }
                
                /* @style_general_tdb_form_input_composer */
                .tdb_form_input .tdb-form-inner {
                    pointer-events: none;
                }
                
                
                
                /* @checkbox_display_inline */
                body .$unique_block_class .tdb-s-form-checkboxes-wrap .tdb-s-form-check {
                    width: 25%;
                }
                body .$unique_block_class .tdb-s-form-checkboxes-wrap .tdb-s-form-check:nth-last-child(-n+4) {
                    margin-bottom: 0;
                }
                body .$unique_block_class .tdb-s-form-checkboxes-wrap,
                body .$unique_block_class .tdb-s-form-btns-wrap {
                    flex-direction: row;
                }
                body .$unique_block_class .tdb-s-form-btns-wrap .tdb-s-form-btn {
                    margin-bottom: 0;
                    margin-right: 7px;
                }
                body .$unique_block_class .tdb-s-form-btns-wrap .tdb-s-form-btn:last-child {
                    margin-right: 0;
                }
                /* @checkbox_display_new_line */
                body .$unique_block_class .tdb-s-form-checkboxes-wrap,
                body .$unique_block_class .tdb-s-form-btns-wrap {
                    flex-direction: column;
                }
                body .$unique_block_class .tdb-s-form-checkboxes-wrap .tdb-s-form-check {
                    width: 100%;
                }
                body .$unique_block_class .tdb-s-form-checkboxes-wrap .tdb-s-form-check:nth-last-child(-n+4) {
                    margin-bottom: 7px;
                }
                body .$unique_block_class .tdb-s-form-checkboxes-wrap .tdb-s-form-check:last-child {
                    margin-bottom: 0;
                }
                body .$unique_block_class .tdb-s-form-btns-wrap .tdb-s-form-btn {
                    margin-bottom: 7px;
                    margin-right: 0;
                }
                body .$unique_block_class .tdb-s-form-btns-wrap .tdb-s-form-btn:last-child {
                    margin-bottom: 0;
                }
                
                /* @all_input_border */
                body .$unique_block_class .tdb-s-form .tdb-s-form-input {
                    border: @all_input_border @all_input_border_style @all_input_border_color;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-check .tdb-s-fc-check {
                    border: 2px solid @all_input_border_color;
                }
                /* @input_radius */
                body .$unique_block_class .tdb-s-form .tdb-s-form-input {
                    border-radius: @input_radius;
                }
                
                /* @btn_radius */
                body .$unique_block_class .tdb-s-btn {
                    border-radius: @btn_radius;
                }
                
                
                /* @accent_color */
                body .$unique_block_class .tdb-s-btn-hollow:hover {
                    color: @accent_color;
                }
                body .$unique_block_class .tdb-s-form-btn input:checked + .tdb-s-fb-btn,
                body .$unique_block_class .tdb-s-form-check .tdb-s-fc-check::after {
                    background-color: @accent_color;
                }
                body .$unique_block_class .tdb-s-form-btn input:checked + .tdb-s-fb-btn,
                body .$unique_block_class .tdb-s-btn-hollow:hover,
                body .$unique_block_class div .tdb-s-form-check input:checked + .tdb-s-fc-check{
                    border-color: @accent_color;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-group:not(.tdb-s-fg-error) .tdb-s-form-input:focus:not([readonly]) {
                    border-color: @accent_color !important;
                }
                /* @input_outline_accent_color */
                body .$unique_block_class .tdb-s-form .tdb-s-form-group:not(.tdb-s-fg-error) .tdb-s-form-input:focus:not([readonly]),
                body .$unique_block_class div .tdb-s-form-check input:checked + .tdb-s-fc-check {
                    outline-color: @input_outline_accent_color;
                }
                
                /* @label_color */
                body .$unique_block_class .tdb-s-form .tdb-s-form-label,
                body .$unique_block_class .tdb-s-form .tdb-s-form-check .tdb-s-fc-title {
                    color: @label_color;
                }
                /* @input_color */
                body .$unique_block_class .tdb-s-form .tdb-s-form-input {
                    color: @input_color;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-input:-webkit-autofill,
                body .$unique_block_class .tdb-s-form .tdb-s-form-input:-webkit-autofill:hover,
                body .$unique_block_class .tdb-s-form .tdb-s-form-input:-webkit-autofill:focus,
                body .$unique_block_class .tdb-s-form .tdb-s-form-input:-webkit-autofill:active {
                    -webkit-text-fill-color: @input_color;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .tdb-s-form-select-icon {
                    fill: @input_color;
                }
                /* @input_bg */
                body .$unique_block_class .tdb-s-form .tdb-s-form-input {
                    background-color: @input_bg;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-input:-webkit-autofill,
                body .$unique_block_class .tdb-s-form .tdb-s-form-input:-webkit-autofill:hover,
                body .$unique_block_class .tdb-s-form .tdb-s-form-input:-webkit-autofill:focus,
                body .$unique_block_class .tdb-s-form .tdb-s-form-input:-webkit-autofill:active {
                    -webkit-box-shadow: 0 0 0 1000px @input_bg inset !important;
                }
                
                /* @btn_color */
                body .$unique_block_class .tdb-s-form-btn input:checked + .tdb-s-fb-btn {
                    color: @btn_color;
                }
                /* @btn_color_h */
                body .$unique_block_class .tdb-s-form-btn input:checked + .tdb-s-fb-btn:hover,
                body .$unique_block_class .tdb-s-form-btn input:checked + .tdb-s-fb-btn:active {
                    color: @btn_color_h;
                }
                /* @btn_bg_h */
                body .$unique_block_class .tdb-s-form-btn input:checked + .tdb-s-fb-btn:hover,
                body .$unique_block_class .tdb-s-form-btn input:checked + .tdb-s-fb-btn:active {
                    background-color: @btn_bg_h;
                    border-color: @btn_bg_h;
                }
                /* @btn_color_hol */
                body .$unique_block_class .tdb-s-btn-hollow {
                    color: @btn_color_hol;
                }
                /* @btn_color_hol_h */
                body .$unique_block_class .tdb-s-btn-hollow:hover {
                    color: @btn_color_hol_h;
                }
                /* @btn_bg_hol */
                body .$unique_block_class .tdb-s-btn-hollow {
                    background-color: @btn_bg_hol;
                }
                /* @btn_bg_hol_h */
                body .$unique_block_class .tdb-s-btn-hollow:hover {
                    background-color: @btn_bg_hol_h;
                }
                /* @btn_border_hol */
                body .$unique_block_class .tdb-s-btn-hollow {
                    border-color: @btn_border_h;
                }
                /* @btn_border_hol_h */
                body .$unique_block_class .tdb-s-form .tdb-s-btn-hollow:hover {
                    border-color: @btn_border_hol_h;
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
        $res_ctx->load_settings_raw( 'style_general_tdb_form_input', 1 );
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $res_ctx->load_settings_raw( 'style_general_tdb_form_input_composer', 1 );
        }



        /*-- LAYOUT -- */
        // inputs border style
        $checkbox_display = $res_ctx->get_shortcode_att('checkbox_display');
        if( $checkbox_display == '' ) {
            $res_ctx->load_settings_raw( 'checkbox_display_inline', 1 );
        } else {
            $res_ctx->load_settings_raw( 'checkbox_display_new_line', 1 );
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


        // buttons border radius
        $btn_radius = $res_ctx->get_shortcode_att('btn_radius');
        $res_ctx->load_settings_raw( 'btn_radius', $btn_radius );
        if( $btn_radius != '' && is_numeric( $btn_radius ) ) {
            $res_ctx->load_settings_raw( 'btn_radius', $btn_radius . 'px' );
        }



        /*-- COLORS -- */
        $accent_color = $res_ctx->get_shortcode_att('accent_color');
        $res_ctx->load_settings_raw( 'accent_color', $accent_color );
        if( !empty( $accent_color ) ) {
            $res_ctx->load_settings_raw('input_outline_accent_color', td_util::hex2rgba($accent_color, 0.1));
        }

        $res_ctx->load_settings_raw( 'label_color', $res_ctx->get_shortcode_att('label_color') );
        $res_ctx->load_settings_raw( 'input_color', $res_ctx->get_shortcode_att('input_color') );
        $res_ctx->load_settings_raw( 'input_bg', $res_ctx->get_shortcode_att('input_bg') );
        $all_input_border_color = $res_ctx->get_shortcode_att('all_input_border_color');
        if( $all_input_border_color != '' ) {
            $res_ctx->load_settings_raw( 'all_input_border_color', $all_input_border_color );
            $res_ctx->load_settings_raw( 'input_select2_outline_color', td_util::hex2rgba($all_input_border_color, 0.18));
        } else {
            $res_ctx->load_settings_raw( 'all_input_border_color', '#D7D8DE' );
        }

        $res_ctx->load_settings_raw( 'btn_color', $res_ctx->get_shortcode_att('btn_color') );
        $res_ctx->load_settings_raw( 'btn_color_h', $res_ctx->get_shortcode_att('btn_color_h') );
        $res_ctx->load_settings_raw( 'btn_bg_h', $res_ctx->get_shortcode_att('btn_bg_h') );
        $res_ctx->load_settings_raw( 'btn_color_hol', $res_ctx->get_shortcode_att('btn_color_hol') );
        $res_ctx->load_settings_raw( 'btn_color_hol_h', $res_ctx->get_shortcode_att('btn_color_hol_h') );
        $res_ctx->load_settings_raw( 'btn_bg_hol', $res_ctx->get_shortcode_att('btn_bg_hol') );
        $res_ctx->load_settings_raw( 'btn_bg_hol_h', $res_ctx->get_shortcode_att('btn_bg_hol_h') );
        $res_ctx->load_settings_raw( 'btn_border_hol', $res_ctx->get_shortcode_att('btn_border_hol') );
        $res_ctx->load_settings_raw( 'btn_border_hol_h', $res_ctx->get_shortcode_att('btn_border_hol_h') );



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

        parent::render($atts); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query)


        // Get the field name
        $field = '';
        if( $this->get_att('wp_field') != '' ) {
            $field = $this->get_att('wp_field');
        } else {
            $field = $this->get_att('acf_field');
        }

        // Disable for guests
        $authenticated_users = $this->get_att('authenticated_users');
        $input_disabled = '';
        if( $authenticated_users != '' && !is_user_logged_in() ) {
            $input_disabled = 'disabled';
        }

        // currently logged in user
        $current_user = wp_get_current_user();
        $current_user_id = $current_user->ID;
        $is_current_user_admin = in_array('administrator', $current_user->roles);

        // form type
        $form_type = $this->get_att('form_type');
        if( $form_type == '' ) {
            $form_type = 'post';
        }


        $buffy = ''; //output buffer

        $buffy .= '<div class="' . $this->get_block_classes() . ' ' . ( $input_disabled != '' ? 'tdb-disabled' : '' ) . '" ' . $this->get_block_html_atts() . '>';

            //get the block css
            $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();


            $buffy .= '<div class="tdb-block-inner td-fix-index tdb-s-form">';
                if( $field == '' ) {
                    $buffy .= td_util::get_block_error('Posts Form Input', 'You have not selected any <strong>field</strong> to display.' );
                } else {
                    $field_name = '';
                    $field_type = '';
                    $field_value = '';
                    $field_placeholder = '';
                    $field_label = $this->get_att('label_txt');
                    $field_required = '';
                    $acf_field_data = array();
                    $is_acf_field = false;

                    // Check to see if the field we are trying to display is ACF
                    if( class_exists( 'ACF' ) ) {
                        $acf_field_data = acf_get_raw_field($field);

                        if( $acf_field_data ) {
                            $field_name = $acf_field_data['name'];
                            $field_type = $acf_field_data['type'];
                            if( isset($acf_field_data['placeholder']) ) {
                                $field_placeholder = 'placeholder="' . $acf_field_data['placeholder'] . '"';
                            }
                            if( $field_label == '' ) {
                                $field_label = $acf_field_data['label'];
                            }
                            $field_required = $acf_field_data['required'];
                            $is_acf_field = true;
                        }
                    }

                    // If the field was not an ACF one, then ite means that either the
                    // plugin has been disabled or the field is just a regular WP custom field
                    if( !$is_acf_field ) {
                        $field_name = $field;
                        $field_type = 'text';
                        if( $field_label == '' ) {
                            $field_label = $field;
                        }
                    }

                    // Get the field value based on form type
                    $curr_post_field_value = '';
                    switch ( $form_type ) {
                        case 'post':
                            $cur_post_id = '';
                            if ( isset($_GET['post_id']) && !( tdc_state::is_live_editor_iframe() || tdc_state::is_live_editor_ajax() ) ) {
                                $post = get_post($_GET['post_id']);

                                if( $post && $post->post_author == $current_user_id ) {
                                    $curr_post_field_value = get_post_meta($_GET['post_id'], $field, true);
                                }
                            }

                            break;

                        case 'user':
                            switch ($field) {
                                case 'user_url':
                                    $user_data = get_userdata($current_user_id);
                                    $curr_post_field_value = $user_data->data->user_url;

                                    break;

                                default:
                                    $curr_post_field_value = get_user_meta($current_user_id, $field, true);

                                    break;
                            }

                            break;
                    }

                    if( !empty( $curr_post_field_value ) ) {
                        $field_value = $curr_post_field_value;
                    }

                    // Display the field html
                    $buffy .= '<div class="tdb-s-form-content">';
                        $buffy .= '<div class="tdb-s-fc-inner">';
                            $buffy .= '<div class="tdb-s-form-group tdb-posts-form-acf-input tdb-s-content" data-form-type="' . $form_type . '" data-type="' . $field_type . '" data-required="' . $field_required . '" data-name="' . $field_name . '">';
                                $buffy .= '<label class="tdb-s-form-label" for="' . $field_name . '-' . $this->block_uid . '">';
                                    $buffy .= $field_label;

                                    if( $field_required ) {
                                        $buffy .= '<span class="tdb-s-form-label-required"> *</span>';
                                    }
                                $buffy .= '</label>';

                                switch ( $field_type ) {
                                    case 'text':
                                    case 'url':
                                        $buffy .= '<input type="text" class="tdb-s-form-input" id="' . $field_name . '-' . $this->block_uid . '" name="' . $field_name . '-' . $this->block_uid . '" ' . $field_placeholder . ' value="' . $field_value . '" ' . $input_disabled . '>';

                                        break;

                                    case 'textarea':
                                        $buffy .= '<textarea class="tdb-s-form-input" id="' . $field_name . '-' . $this->block_uid . '" name="' . $field_name . '-' . $this->block_uid . '" ' . $field_placeholder . ' ' . $input_disabled . '>' . $field_value . '</textarea>';

                                        break;

                                    case 'number':
                                        $min = $acf_field_data['min'];
                                        $min_attr = '';
                                        if( $min != '' ) {
                                            $min_attr = 'min="' . $min . '"';
                                        }

                                        $max = $acf_field_data['max'];
                                        $max_attr = '';
                                        if( $max != '' ) {
                                            $max_attr = 'max="' . $max . '"';
                                        }

                                        $step = $acf_field_data['step'];
                                        $step_attr = '';
                                        if( $max != '' ) {
                                            $step_attr = 'step="' . $step . '"';
                                        }

                                        $buffy .= '<input type="number" class="tdb-s-form-input" id="' . $field_name . '-' . $this->block_uid . '" name="' . $field_name . '-' . $this->block_uid . '" ' . $field_placeholder . ' value="' . $field_value . '" ' . $min_attr . ' ' . $max_attr . ' ' . $step_attr . ' ' . $input_disabled . '>';

                                        break;

                                    case 'email':
                                        $buffy .= '<input type="email" class="tdb-s-form-input" id="' . $field_name . '-' . $this->block_uid . '" name="' . $field_name . '-' . $this->block_uid . '" ' . $field_placeholder . ' value="' . $field_value . '" ' . $input_disabled . '>';

                                        break;

                                    case 'select':
                                        $choices = $acf_field_data['choices'];
                                        $selected_options = array();
                                        $allow_multiple = $acf_field_data['multiple'];

                                        if( empty($field_value) ) {
                                            $default_values = $acf_field_data['default_value'];

                                            if( $default_values ) {
                                                if( is_array( $default_values ) ) {
                                                    foreach ( $default_values as $default_value ) {
                                                        $selected_options[] = $default_value;
                                                    }
                                                } else {
                                                    $selected_options[] = $default_values;
                                                }
                                            }
                                        } else {
                                            if( is_array( $field_value ) ) {
                                                foreach ( $field_value as $value ) {
                                                    $selected_options[] = $value;
                                                }
                                            } else {
                                                $selected_options[] = $field_value;
                                            }
                                        }

                                        $buffy .= '<div class="tdb-s-form-select-wrap">';
                                            $buffy .= '<select class="tdb-s-form-input" id="' . $field_name . '-' . $this->block_uid . '" name="' . $field_name . '-' . $this->block_uid . '" ' . $field_placeholder . ' ' . ( $allow_multiple ? 'multiple' : '' ) . ' ' . $input_disabled . '>';
                                                if( $acf_field_data['allow_null'] ) {
                                                    $buffy .= '<option value="">- Select -</option>';
                                                }

                                                foreach ( $choices as $choice_value => $choice_name ) {
                                                    $selected_option = '';

                                                    if( in_array( $choice_value, $selected_options ) ) {
                                                        $selected_option = 'selected';
                                                    }
                                                    $buffy .= '<option value="' . $choice_value . '" ' . $selected_option . '>' . $choice_name . '</option>';
                                                }
                                            $buffy .= '</select>';

                                            $buffy .= '<svg class="tdb-s-form-select-icon" xmlns="http://www.w3.org/2000/svg" width="8.947" height="12.578" viewBox="0 0 8.947 12.578"><g transform="translate(7.947 1) rotate(90)"><path d="M0,7.947A1,1,0,0,1-.58,7.761,1,1,0,0,1-.815,6.366l2.06-2.893L-.815.58A1,1,0,0,1-.58-.815,1,1,0,0,1,.815-.58L3.288,2.893a1,1,0,0,1,0,1.16L.815,7.527A1,1,0,0,1,0,7.947Z" transform="translate(8.104 0)"/><path d="M2.474,7.947a1,1,0,0,1-.815-.42L-.815,4.053a1,1,0,0,1,0-1.16L1.659-.58A1,1,0,0,1,3.053-.815,1,1,0,0,1,3.288.58L1.228,3.473l2.06,2.893a1,1,0,0,1-.814,1.58Z" transform="translate(0 0)"/></g></svg>';
                                        $buffy .= '</div>';

                                        break;

                                    case 'checkbox':
                                    case 'radio':
                                        $choices = $acf_field_data['choices'];
                                        $checked_options = array();

                                        if( empty($field_value) ) {
                                            $default_values = $acf_field_data['default_value'];

                                            if( $default_values ) {
                                                if( $field_type == 'checkbox' ) {
                                                    foreach ( $default_values as $default_value ) {
                                                        $checked_options[] = $default_value;
                                                    }
                                                } else {
                                                    $checked_options[] = $default_values;
                                                }
                                            }
                                        } else {
                                            if( $field_type == 'checkbox' ) {
                                                foreach ($field_value as $value) {
                                                    $checked_options[] = $value;
                                                }
                                            } else {
                                                $checked_options[] = $field_value;
                                            }
                                        }

                                        $buffy .= '<div class="tdb-s-form-checkboxes-wrap">';
                                            foreach ( $choices as $choice_value => $choice_name ) {
                                                $checked_option_att = '';

                                                if( in_array( $choice_value, $checked_options ) ) {
                                                    $checked_option_att = 'checked';
                                                }

                                                $buffy .= '<div class="tdb-s-form-check">';
                                                    $buffy .= '<label class="tdb-s-fc-label">';
                                                        $buffy .= '<input type="' . $field_type . '" name="' . $field_name . '-' . $this->block_uid . '" value="' . $choice_value . '" ' . $checked_option_att . ' ' . $input_disabled . '>';
                                                        $buffy .= '<span class="tdb-s-fc-check"></span>';
                                                        $buffy .= '<span class="tdb-s-fc-title tdb-fi-check-label">' . $choice_name . '</span>';
                                                    $buffy .= '</label>';
                                                $buffy .= '</div>';
                                            }
                                        $buffy .= '</div>';

                                        break;

                                    case 'button_group':
                                        $choices = $acf_field_data['choices'];
                                        $checked_option = '';

                                        if( empty($field_value) ) {
                                            $default_values = $acf_field_data['default_value'];

                                            if( $default_values ) {
                                                $checked_option = $default_values;
                                            }
                                        } else {
                                            $checked_option = $field_value;
                                        }

                                        $buffy .= '<div class="tdb-s-form-btns-wrap">';
                                            foreach ( $choices as $choice_value => $choice_name ) {
                                                $checked_option_att = '';

                                                if( $choice_value == $checked_option ) {
                                                    $checked_option_att = 'checked';
                                                }

                                                $buffy .= '<div class="tdb-s-form-btn">';
                                                    $buffy .= '<label class="tdb-s-fb-label">';
                                                        $buffy .= '<input type="radio" name="' . $field_name . '-' . $this->block_uid . '" value="' . $choice_value . '" ' . $checked_option_att . ' ' . $input_disabled . '>';
                                                        $buffy .= '<button class="tdb-s-btn tdb-s-btn-hollow tdb-s-btn-sm tdb-s-fb-btn tdb-fi-check-label" ' . $input_disabled . '>' . $choice_name . '</button>';
                                                    $buffy .= '</label>';
                                                $buffy .= '</div>';
                                            }
                                        $buffy .= '</div>';

                                        break;
                                }
                            $buffy .= '</div>';
                        $buffy .= '</div>';
                    $buffy .= '</div>';
                }
            $buffy .= '</div>';

        $buffy .= '</div>';


        return $buffy;

    }

}