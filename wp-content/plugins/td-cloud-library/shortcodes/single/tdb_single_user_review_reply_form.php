<?php

class tdb_single_user_review_reply_form extends td_block {

    public function get_custom_css() {
        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $unique_block_class = ((td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax()) ? 'tdc-row .' : '') . $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>

                /* @style_general_tdb_single_user_review_reply_form */
                .tdb_single_user_review_reply_form {
                    transform: translateZ(0);
                    font-family: -apple-system,BlinkMacSystemFont,\"Segoe UI\",Roboto,Oxygen-Sans,Ubuntu,Cantarell,\"Helvetica Neue\",sans-serif;
                    font-size: 14px;
                }
                .tdb_single_user_review_reply_form .tdb-s-form .tdb-s-form-group-content .tdb-s-form-input {
                    min-height: 167px;
                }
                @media (min-width: 1019px) {
                    .tdb_single_user_review_reply_form .tdb-s-form .tdb-s-form-group-name,
                    .tdb_single_user_review_reply_form .tdb-s-form .tdb-s-form-group-email {
                        width: 50%;
                        margin-bottom: 0;
                    }
                }
                .tdb_single_user_review_reply_form .tdb-s-notif-success {
                    margin: 0;
                }
                
                /* @style_general_tdb_single_user_review_reply_form_composer */
                .tdb_single_user_review_reply_form .tdb-block-inner {
                    pointer-events: none;
                }
                
                
                /* @all_input_border */
                body .$unique_block_class .tdb-s-form .tdb-s-form-input,
                body .$unique_block_class .tdb-s-form-group:not(.tdb-s-fg-error) .tdb-s-form-input:disabled {
                    border: @all_input_border @all_input_border_style @all_input_border_color;
                }
                /* @input_radius */
                body .$unique_block_class .tdb-s-form .tdb-s-form-input {
                    border-radius: @input_radius;
                }
                
                /* @btn_radius */
                body .$unique_block_class .tdb-s-btn {
                    border-radius: @btn_radius;
                }
                
                /* @notif_radius */
                body .$unique_block_class .tdb-s-notif {
                    border-radius: @notif_radius;
                }
                
                
                /* @accent_color */
                body .$unique_block_class .tdb-s-btn {
                    background-color: @accent_color;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-group:not(.tdb-s-fg-error) .tdb-s-form-input:focus:not([readonly]) {
                    border-color: @accent_color !important;
                }
                /* @input_outline_accent_color */
                body .$unique_block_class .tdb-s-form .tdb-s-form-group:not(.tdb-s-fg-error) .tdb-s-form-input:focus:not([readonly]) {
                    outline-color: @input_outline_accent_color;
                }
                
                /* @header_color */
                body .$unique_block_class .tdb-spsh-title {
                    color: @header_color;
                }
                
                /* @input_color */
                body .$unique_block_class .tdb-s-form .tdb-s-form-input,
                body .$unique_block_class .tdb-s-form-group:not(.tdb-s-fg-error) .tdb-s-form-input:disabled {
                    color: @input_color;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-input:-webkit-autofill,
                body .$unique_block_class .tdb-s-form .tdb-s-form-input:-webkit-autofill:hover,
                body .$unique_block_class .tdb-s-form .tdb-s-form-input:-webkit-autofill:focus,
                body .$unique_block_class .tdb-s-form .tdb-s-form-input:-webkit-autofill:active {
                    -webkit-text-fill-color: @input_color;
                }
                /* @input_place_color */
                body .$unique_block_class .tdb-s-form .tdb-s-form-input::placeholder {
                    color: @input_place_color;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-input::-webkit-input-placeholder {
                    color: @input_place_color;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-input::-moz-placeholder {
                    color: @input_place_color;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-input:-ms-input-placeholder {
                    color: @input_place_color;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-input:-moz-placeholder {
                    color: @input_place_color;
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
                body .$unique_block_class .tdb-s-btn {
                    color: @btn_color;
                }
                /* @btn_color_h */
                body .$unique_block_class .tdb-s-btn:hover {
                    color: @btn_color_h;
                }
                /* @btn_bg_h */
                body .$unique_block_class .tdb-s-btn:hover {
                    background-color: @btn_bg_h;
                }
                
                /* @notif_succ_color */
                body .$unique_block_class .tdb-s-notif-success {
                    color: @notif_succ_color;
                }
                /* @notif_succ_bg */
                body .$unique_block_class .tdb-s-notif-success {
                    background-color: @notif_succ_bg;
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
        $res_ctx->load_settings_raw( 'style_general_tdb_single_user_review_reply_form', 1 );
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $res_ctx->load_settings_raw( 'style_general_tdb_single_user_review_reply_form_composer', 1 );
        }



        /*-- LAYOUT -- */
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


        // notification radius
        $notif_radius = $res_ctx->get_shortcode_att('notif_radius');
        $res_ctx->load_settings_raw('notif_radius', $notif_radius);
        if( $notif_radius != '' && is_numeric( $notif_radius ) ) {
            $res_ctx->load_settings_raw('notif_radius', $notif_radius . 'px');
        }



        /*-- COLORS -- */
        $accent_color = $res_ctx->get_shortcode_att('accent_color');
        $res_ctx->load_settings_raw( 'accent_color', $accent_color );
        if( !empty( $accent_color ) ) {
            $res_ctx->load_settings_raw('input_outline_accent_color', td_util::hex2rgba($accent_color, 0.1));
        }

        $res_ctx->load_settings_raw('header_color', $res_ctx->get_shortcode_att('header_color'));

        $res_ctx->load_settings_raw( 'input_color', $res_ctx->get_shortcode_att('input_color') );
        $res_ctx->load_settings_raw( 'input_place_color', $res_ctx->get_shortcode_att('input_place_color') );
        $res_ctx->load_settings_raw( 'input_bg', $res_ctx->get_shortcode_att('input_bg') );
        $all_input_border_color = $res_ctx->get_shortcode_att('all_input_border_color');
        if( $all_input_border_color != '' ) {
            $res_ctx->load_settings_raw( 'all_input_border_color', $all_input_border_color );
        } else {
            $res_ctx->load_settings_raw( 'all_input_border_color', '#D7D8DE' );
        }

        $res_ctx->load_settings_raw( 'btn_color', $res_ctx->get_shortcode_att('btn_color') );
        $res_ctx->load_settings_raw( 'btn_color_h', $res_ctx->get_shortcode_att('btn_color_h') );
        $res_ctx->load_settings_raw( 'btn_bg_h', $res_ctx->get_shortcode_att('btn_bg_h') );

        $notif_succ_color = $res_ctx->get_shortcode_att('notif_succ_color');
        $res_ctx->load_settings_raw( 'notif_succ_color', $notif_succ_color );
        if( !empty( $notif_succ_color ) ) {
            $res_ctx->load_settings_raw('notif_succ_bg', td_util::hex2rgba($notif_succ_color, 0.1));
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


        // GET the single post ID
        $post_id = '';
        $curr_template_type = tdb_state_template::get_template_type();
        if( $curr_template_type == 'cpt' ) {
            global $tdb_state_single;

            if( get_post_type( $tdb_state_single->post_id->__invoke() ) == 'tdc-review' ) {
                $post_id = $tdb_state_single->post_id->__invoke();
            }
        }


        /**
         * User review privileges
         */
        // Set the default variable values
        $current_user_email = '';
        $current_user_name = '';
        $current_user_inputs_disabled = '';


        // The current user ID
        $userID = get_current_user_id();
        if ( is_user_logged_in() ) {
            $current_user = wp_get_current_user();
            $current_user_email = $current_user->user_email;
            $current_user_name = $current_user->display_name;
            $current_user_inputs_disabled = 'disabled';
        }


        // Header
        $header_text = $this->get_att('header_txt') != '' ? $this->get_att('header_txt') : __td( 'Leave a reply', TD_THEME_NAME );
        $header_tag = $this->get_att('header_tag') != '' ? $this->get_att('header_tag') : 'h2';

        $required_field_error = __td( 'This field is required!', TD_THEME_NAME );
        $reply_published_msg = __td( 'Your reply has been published. Please refresh the page in order to see it.', TD_THEME_NAME );

        $buffy = ''; //output buffer


        $buffy .= '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';

            // get the block css
            $buffy .= $this->get_block_css();

            // get the js for this block
            $buffy .= $this->get_block_js();


            $buffy .= '<div class="tdb-block-inner td-fix-index">';
                $buffy .= '<div class="tdb-s-page-sec-header">';
                    $buffy .= '<' . $header_tag . ' class="tdb-spsh-title">' . $header_text . '</' . $header_tag . '>';
                $buffy .= '</div>';

                $buffy .= '<div class="tdb-s-form tdb-s-content">';
                    $buffy .= '<div class="tdb-s-form-content">';
                        $buffy .= '<div class="tdb-s-fc-inner">';
                            $buffy .= '<div class="tdb-s-form-group tdb-s-form-group-content">';
                                $buffy .= '<textarea class="tdb-s-form-input" name="content" placeholder="' . __td( 'Enter your reply', TD_THEME_NAME ) . '"></textarea>';
                            $buffy .= '</div>';

                            $buffy .= '<div class="tdb-s-form-group tdb-s-form-group-name">';
                                $buffy .= '<input class="tdb-s-form-input" type="text" name="name" value="' . $current_user_name . '" ' . $current_user_inputs_disabled . '  placeholder="' . __td( 'Name', TD_THEME_NAME ) . '" />';
                            $buffy .= '</div>';

                            $buffy .= '<div class="tdb-s-form-group tdb-s-form-group-email">';
                                $buffy .= '<input class="tdb-s-form-input" type="email" name="email" value="' . $current_user_email . '" ' . $current_user_inputs_disabled . ' placeholder="' . __td( 'Email address', TD_THEME_NAME ) . '" />';
                            $buffy .= '</div>';
                        $buffy .= '</div>';
                    $buffy .= '</div>';

                    $buffy .= '<div class="tdb-s-form-footer">';
                        $buffy .= '<button type="submit" class="tdb-s-btn tdb-surlf-submit" ' . ( $post_id == '' ? 'disabled' : '' ) . '>' . __td( 'Submit reply', TD_THEME_NAME ) . '</button>';
                    $buffy .= '</div>';
                $buffy .= '</div>';
            $buffy .= '</div>';

        $buffy .= '</div>';


        if( !( tdc_state::is_live_editor_iframe() || tdc_state::is_live_editor_ajax() ) ) {
            ob_start();
            ?>
            <script>
                /* global jQuery:{} */
                jQuery().ready(function () {

                    let $blockObj = jQuery('.<?php echo $this->block_uid ?>'),
                        $form = $blockObj.find('.tdb-s-form'),
                        $formSubmitBtn = $form.find('.tdb-surlf-submit');


                    $formSubmitBtn.on('click', function (e) {

                        e.preventDefault();


                        let contentInput = $blockObj.find('[name="content"]'),
                            nameInput = $blockObj.find('[name="name"]'),
                            emailInput = $blockObj.find('[name="email"]'),

                            errorsCount = 0;


                        // Remove any notifications and error classes
                        $form.find('.tdb-s-fg-error').removeClass('.tdb-s-fg-error');
                        $form.find('.tdb-s-fg-error-msg').remove();
                        $form.find('.tdb-s-notif').remove();


                        // Validate the form
                        if( contentInput.val() === '' ) {
                            contentInput.closest('.tdb-s-form-group').addClass('tdb-s-fg-error');
                            contentInput.closest('.tdb-s-form-group').append('<span class="tdb-s-fg-error-msg"><?php echo $required_field_error ?></span>');

                            errorsCount++;
                        } else {
                            contentInput.closest('.tdb-s-form-group').removeClass('tdb-s-fg-error');
                            contentInput.closest('.tdb-s-form-group').find('.tdb-s-fg-error-msg').remove();
                        }

                        if( nameInput.val() === '' && !nameInput.prop('disabled') ) {
                            nameInput.closest('.tdb-s-form-group').addClass('tdb-s-fg-error');
                            nameInput.closest('.tdb-s-form-group').append('<span class="tdb-s-fg-error-msg"><?php echo $required_field_error ?></span>');

                            errorsCount++;
                        } else {
                            nameInput.closest('.tdb-s-form-group').removeClass('tdb-s-fg-error');
                            nameInput.closest('.tdb-s-form-group').find('.tdb-s-fg-error-msg').remove();
                        }

                        if( emailInput.val() === '' && !emailInput.prop('disabled') ) {
                            emailInput.closest('.tdb-s-form-group').addClass('tdb-s-fg-error');
                            emailInput.closest('.tdb-s-form-group').append('<span class="tdb-s-fg-error-msg"><?php echo $required_field_error ?></span>');

                            emailInput++;
                        } else {
                            emailInput.closest('.tdb-s-form-group').removeClass('tdb-s-fg-error');
                            emailInput.closest('.tdb-s-form-group').find('.tdb-s-fg-error-msg').remove();
                        }


                        if( errorsCount === 0 ) {
                            // Set the disabled state for the form
                            $form.addClass('tdb-s-content-disabled');

                            // Place the submit button in a saving state
                            $formSubmitBtn.addClass('tdb-s-btn-saving');

                            jQuery.ajax({
                                type: 'POST',
                                url: td_ajax_url,
                                data: {
                                    action: 'tdb_review_reply_on_submit',
                                    content: contentInput.val(),
                                    name: nameInput.val(),
                                    email: emailInput.val(),
                                    reviewID: '<?php echo $post_id ?>',
                                    userID: '<?php echo $userID ?>',
                                },
                                success: function (data) {
                                    let response = jQuery.parseJSON(data);

                                    // The form was successfully processed and the review created
                                    if( response.reply_id !== '' ) {
                                        // Place the submit button in a saved state
                                        $formSubmitBtn.addClass('tdb-s-btn-saved');

                                        // Display the success message
                                        $form.before(
                                            '<div class="tdb-s-notif tdb-s-notif-sm tdb-s-notif-success">' +
                                                '<div class="tdb-s-notif-descr"><?php echo $reply_published_msg ?></div>' +
                                            '</div>'
                                        );

                                        // Remove the form
                                        $form.remove();
                                    }

                                    // Remove the loading state for the form
                                    $form.removeClass('tdb-s-content-disabled');
                                }
                            });
                        }

                    });

                });
            </script>
            <?php
            td_js_buffer::add_to_footer( "\n" . td_util::remove_script_tag( ob_get_clean() ) );
        }


        return $buffy;
    }

}