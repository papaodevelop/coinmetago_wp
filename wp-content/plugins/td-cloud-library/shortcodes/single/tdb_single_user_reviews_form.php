<?php

class tdb_single_user_reviews_form extends td_block {

    public function get_custom_css() {
        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $unique_block_class = ((td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax()) ? 'tdc-row .' : '') . $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>

                /* @style_general_tdb_single_user_reviews_form */
                .tdb_single_user_reviews_form {
                    transform: translateZ(0);
                    font-family: -apple-system,BlinkMacSystemFont,\"Segoe UI\",Roboto,Oxygen-Sans,Ubuntu,Cantarell,\"Helvetica Neue\",sans-serif;
                    font-size: 14px;
                }
                .tdb_single_user_reviews_form .tdb-s-form .tdb-s-form-group-content .tdb-s-form-input {
                    min-height: 167px;
                }
                @media (min-width: 1019px) {
                    .tdb_single_user_reviews_form .tdb-s-form .tdb-s-form-group-name,
                    .tdb_single_user_reviews_form .tdb-s-form .tdb-s-form-group-email {
                        width: 50%;
                        margin-bottom: 0;
                    }
                }
                .tdb_single_user_reviews_form .tdb-s-form-group-criteria-list > .tdb-s-form-label {
                    margin-bottom: 12px; 
                }
                .tdb_single_user_reviews_form .tdb-s-criteria {
                    display: flex;
                    align-items: center; 
                }
                .tdb_single_user_reviews_form .tdb-s-criteria:not(:last-child) {
                    margin-bottom: 5px;
                }
                .tdb_single_user_reviews_form .tdb-s-criteria-stars {
                    display: flex;
                    flex-direction: row-reverse;
                    align-items: center; 
                    margin-right: 12px;
                }
                .tdb_single_user_reviews_form .tdb-s-criteria-input {
                    display: none;
                }
                .tdb_single_user_reviews_form .tdb-s-criteria-ico {
                    color: #b5b5b5;
                    cursor: pointer;
                }
                .tdb_single_user_reviews_form .tdb-s-criteria-ico:not(:last-child) {
                    padding-left: 2px;
                }
                .tdb_single_user_reviews_form .tdb-s-criteria-ico svg {
                    display: block;
                    width: 1.214em;
                    height: auto;
                    fill: #b5b5b5;
                }
                .tdb_single_user_reviews_form .tdb-s-criteria-ico:hover,
                .tdb_single_user_reviews_form .tdb-s-criteria-ico:hover ~ .tdb-s-criteria-ico {
                    color: #ee8302;
                }
                .tdb_single_user_reviews_form .tdb-s-criteria-ico:hover svg,
                .tdb_single_user_reviews_form .tdb-s-criteria-ico:hover ~ .tdb-s-criteria-ico svg {
                    fill: #ee8302;
                }
                .tdb_single_user_reviews_form .tdb-s-criteria-input:checked + .tdb-s-criteria-ico,
                .tdb_single_user_reviews_form .tdb-s-criteria-input:checked ~ .tdb-s-criteria-ico {
                    color: #ee8302;
                }
                .tdb_single_user_reviews_form .tdb-s-criteria-input:checked + .tdb-s-criteria-ico svg,
                .tdb_single_user_reviews_form .tdb-s-criteria-input:checked ~ .tdb-s-criteria-ico svg {
                    fill: #ee8302;
                }
                .tdb_single_user_reviews_form .tdb-s-criteria-label {
                    position: relative;
                    top: -1px;
                    flex: 1;
                    margin-bottom: 0;
                    font-size: 1em;
                }
                .tdb_single_user_reviews_form .tdb-s-notif-success {
                    margin: 0;
                }
                
                /* @style_general_tdb_single_user_reviews_form_composer */
                .tdb_single_user_reviews_form .tdb-block-inner {
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
                
                /* @label_color */
                body .$unique_block_class .tdb-s-form .tdb-s-form-label:not(.tdb-s-criteria-label) {
                    color: @label_color;
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
                body .$unique_block_class .tdb-s-form .tdb-s-form-input, body .$unique_block_class .tdb-s-form .tdb-s-form-content .tdb-s-form-input:disabled {
                    background-color: @input_bg;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-input:-webkit-autofill,
                body .$unique_block_class .tdb-s-form .tdb-s-form-input:-webkit-autofill:hover,
                body .$unique_block_class .tdb-s-form .tdb-s-form-input:-webkit-autofill:focus,
                body .$unique_block_class .tdb-s-form .tdb-s-form-input:-webkit-autofill:active {
                    -webkit-box-shadow: 0 0 0 1000px @input_bg inset !important;
                }
                
                /* @star_empty_color */
                body .$unique_block_class .tdb-s-criteria-ico {
                    color: @star_empty_color;
                }
                body .$unique_block_class .tdb-s-criteria-ico svg {
                    fill: @star_empty_color;
                }
                /* @star_full_color */
                body .$unique_block_class .tdb-s-criteria-ico:hover,
                body .$unique_block_class .tdb-s-criteria-ico:hover ~ .tdb-s-criteria-ico {
                    color: @star_full_color;
                }
                body .$unique_block_class .tdb-s-criteria-ico:hover svg,
                body .$unique_block_class .tdb-s-criteria-ico:hover ~ .tdb-s-criteria-ico svg {
                    fill: @star_full_color;
                }
                body .$unique_block_class .tdb-s-criteria-input:checked + .tdb-s-criteria-ico,
                body .$unique_block_class .tdb-s-criteria-input:checked ~ .tdb-s-criteria-ico {
                    color: @star_full_color;
                }
                body .$unique_block_class .tdb-s-criteria-input:checked + .tdb-s-criteria-ico svg,
                body .$unique_block_class .tdb-s-criteria-input:checked ~ .tdb-s-criteria-ico svg {
                    fill: @star_full_color;
                }
                /* @star_label_color */
                body .$unique_block_class .tdb-s-form .tdb-s-criteria-label {
                    color: @star_label_color;
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
                /* @notif_error_color */
                body .$unique_block_class .tdb-s-notif-error {
                    color: @notif_error_color;
                }
                /* @notif_error_bg */
                body .$unique_block_class .tdb-s-notif-error {
                    background-color: @notif_error_bg;
                }
               
               /* @icons_size */
                body .$unique_block_class .tdb-s-criteria-ico {
                    font-size: @icons_size;
                }
                
                /* @stars_v_alignment */
                body .$unique_block_class .tdb-s-criteria-stars {
                    position:relative;
                    top: @stars_v_alignment;
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
        $res_ctx->load_settings_raw( 'style_general_tdb_single_user_reviews_form', 1 );
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $res_ctx->load_settings_raw( 'style_general_tdb_single_user_reviews_form_composer', 1 );
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

        $res_ctx->load_settings_raw( 'label_color', $res_ctx->get_shortcode_att('label_color') );
        $res_ctx->load_settings_raw( 'input_color', $res_ctx->get_shortcode_att('input_color') );
        $res_ctx->load_settings_raw( 'input_place_color', $res_ctx->get_shortcode_att('input_place_color') );
        $res_ctx->load_settings_raw( 'input_bg', $res_ctx->get_shortcode_att('input_bg') );
        $all_input_border_color = $res_ctx->get_shortcode_att('all_input_border_color');
        if( $all_input_border_color != '' ) {
            $res_ctx->load_settings_raw( 'all_input_border_color', $all_input_border_color );
        } else {
            $res_ctx->load_settings_raw( 'all_input_border_color', '#D7D8DE' );
        }

        $res_ctx->load_settings_raw('star_full_color', $res_ctx->get_shortcode_att('star_full_color'));
        $res_ctx->load_settings_raw('star_empty_color', $res_ctx->get_shortcode_att('star_empty_color'));
        $res_ctx->load_settings_raw('star_label_color', $res_ctx->get_shortcode_att('star_label_color'));

        $res_ctx->load_settings_raw( 'btn_color', $res_ctx->get_shortcode_att('btn_color') );
        $res_ctx->load_settings_raw( 'btn_color_h', $res_ctx->get_shortcode_att('btn_color_h') );
        $res_ctx->load_settings_raw( 'btn_bg_h', $res_ctx->get_shortcode_att('btn_bg_h') );

        $notif_succ_color = $res_ctx->get_shortcode_att('notif_succ_color');
        $res_ctx->load_settings_raw( 'notif_succ_color', $notif_succ_color );
        if( !empty( $notif_succ_color ) ) {
            $res_ctx->load_settings_raw('notif_succ_bg', td_util::hex2rgba($notif_succ_color, 0.1));
        }

        $notif_error_color = $res_ctx->get_shortcode_att('notif_error_color');
        $res_ctx->load_settings_raw( 'notif_error_color', $notif_error_color );
        if( !empty( $notif_error_color ) ) {
            $res_ctx->load_settings_raw('notif_error_bg', td_util::hex2rgba($notif_error_color, 0.12));
        }

        /*-- ICONS -- */
        // icons size
        $icons_size = $res_ctx->get_shortcode_att('icons_size');
        $res_ctx->load_settings_raw('icons_size', $icons_size);
        if( $icons_size != '' && is_numeric( $icons_size ) ) {
            $res_ctx->load_settings_raw('icons_size', $icons_size . 'px');
        }

        // icons (stars) vertical alignment
        $stars_v_alignment = $res_ctx->get_shortcode_att('stars_v_alignment');
        $res_ctx->load_settings_raw('stars_v_alignment', $stars_v_alignment);
        if( $stars_v_alignment != '' && is_numeric( $stars_v_alignment ) ) {
            $res_ctx->load_settings_raw('stars_v_alignment', $stars_v_alignment . 'px');
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
        if( $curr_template_type == 'single' || $curr_template_type == 'cpt' ) {
            global $tdb_state_single;

            $post_id = $tdb_state_single->post_id->__invoke();
        }


        /** Reviews status */
        $reviews_status = $this->get_att('reviews_status');


        /**
         * User review privileges
         */
        // Set the default variable values
        $allow_reviews_for_guests = $this->get_att('review_priv') == '';
        $current_user_email = '';
        $current_user_name = '';
        $current_user_inputs_disabled = '';


        // Set which review criteria to show
        $criteria_ids = $this->get_att( 'criteria_ids' );

        $review_criteria_args = array(
            'taxonomy' => 'tdc-review-criteria',
            'hide_empty' => false,
        );
        if( $criteria_ids != '' ) {
            $review_criteria_args['include'] = $criteria_ids;
            $review_criteria_args['orderby'] = 'include';
        }

        $review_criteria = get_terms( $review_criteria_args );


        // The current user ID
        $userID = get_current_user_id();


        // The current user ip
        $user_ip = get_the_user_ip();

        $post_user_reviews_ips = get_post_meta($post_id, 'tdc-post-user-reviews-ips', true);
        if( empty( $post_user_reviews_ips ) ) {
            $post_user_reviews_ips = array();
        }


        // Header
        $header_text = $this->get_att('header_txt') != '' ? $this->get_att('header_txt') : __td( 'Leave a review', TD_THEME_NAME );
        $header_tag = $this->get_att('header_tag') != '' ? $this->get_att('header_tag') : 'h2';


        // Star icon
        $star_icon = $this->get_icon_att( 'tdicon_star' );
        $star_icon_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $star_icon_data = 'data-td-svg-icon="' . $this->get_att( 'tdicon_star' ) . '"';
        }
        $star_icon_html = '<i class="td-icon-user-rev-star-full"></i>';
        if ( !empty( $star_icon ) ) {
            if( base64_encode( base64_decode( $star_icon ) ) == $star_icon ) {
                $star_icon_html = base64_decode( $star_icon ) ;
            } else {
                $star_icon_html = '<i class="' . $star_icon . '"></i>';
            }
        }


        $buffy = ''; //output buffer

        if ( is_user_logged_in() ) {
            $current_user = wp_get_current_user();
            $current_user_email = $current_user->user_email;
            $current_user_name = $current_user->display_name;
            $current_user_inputs_disabled = 'disabled';
        } else {
            if( !$allow_reviews_for_guests ) {
                return $buffy;
            }
        }

        $required_field_error = __td( 'This field is required!', TD_THEME_NAME );


        $buffy .= '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';

            // get the block css
            $buffy .= $this->get_block_css();

            // get the js for this block
            $buffy .= $this->get_block_js();


            $buffy .= '<div class="tdb-block-inner td-fix-index">';
                $buffy .= '<div class="tdb-s-page-sec-header">';
                    $buffy .= '<' . $header_tag . ' class="tdb-spsh-title">' . $header_text . '</' . $header_tag . '>';
                $buffy .= '</div>';

                if( TD_DEPLOY_MODE != 'dev' && !( tdc_state::is_live_editor_iframe() || tdc_state::is_live_editor_ajax() ) && in_array( $user_ip, $post_user_reviews_ips ) ) {
                    $buffy .= '<div class="tdb-s-notif tdb-s-notif-info"><div class="tdb-s-notif-descr">' . __td( 'You have reached the limit of reviews that you can submit for this article.', TD_THEME_NAME ) . '</div></div>';
                } else {
                    $buffy .= '<form action="#" id="tdc-review-form" class="tdb-s-form tdb-s-content">';
                        $buffy .= '<div class="tdb-s-form-content">';
                            $buffy .= '<div class="tdb-s-fc-inner">';
                                $buffy .= '<div class="tdb-s-form-group tdb-s-form-group-title">';
                                    $buffy .= '<input class="tdb-s-form-input" type="text" name="title" placeholder="' . __td( 'Enter a title for your review', TD_THEME_NAME ) . '" />';
                                $buffy .= '</div>';

                                $buffy .= '<div class="tdb-s-form-group tdb-s-form-group-content">';
                                    $buffy .= '<textarea class="tdb-s-form-input" name="review_content" placeholder="' . __td( 'Enter your review', TD_THEME_NAME ) . '"></textarea>';
                                $buffy .= '</div>';

                                if( !empty( $review_criteria ) && !is_wp_error( $review_criteria ) ) {
                                    $buffy .= '<div class="tdb-s-form-group tdb-s-form-group-criteria-list">';
                                        $buffy .= '<label class="tdb-s-form-label">' . __td( 'Review criteria', TD_THEME_NAME ) . '</label>';

                                        foreach ( $review_criteria as $criteria ) {
                                            $buffy .= '<div class="tdb-s-criteria">';
                                                $buffy .= '<div class="tdb-s-criteria-stars">';
                                                    $buffy .= '<input type="radio" id="' . $criteria->slug . '-rating-star5" name="' . $criteria->slug . '-rating" value="5" class="tdb-s-criteria-input">';
                                                    $buffy .= '<label for="' . $criteria->slug . '-rating-star5" class="tdb-s-criteria-ico" ' . $star_icon_data . '>';
                                                        $buffy .= $star_icon_html;
                                                    $buffy .= '</label>';

                                                    $buffy .= '<input type="radio" id="' . $criteria->slug . '-rating-star4" name="' . $criteria->slug . '-rating" value="4" class="tdb-s-criteria-input">';
                                                    $buffy .= '<label for="' . $criteria->slug . '-rating-star4" class="tdb-s-criteria-ico" ' . $star_icon_data . '>';
                                                        $buffy .= $star_icon_html;
                                                    $buffy .= '</label>';

                                                    $buffy .= '<input type="radio" id="' . $criteria->slug . '-rating-star3" name="' . $criteria->slug . '-rating" value="3" class="tdb-s-criteria-input">';
                                                    $buffy .= '<label for="' . $criteria->slug . '-rating-star3" class="tdb-s-criteria-ico" ' . $star_icon_data . '>';
                                                        $buffy .= $star_icon_html;
                                                    $buffy .= '</label>';

                                                    $buffy .= '<input type="radio" id="' . $criteria->slug . '-rating-star2" name="' . $criteria->slug . '-rating" value="2" class="tdb-s-criteria-input">';
                                                    $buffy .= '<label for="' . $criteria->slug . '-rating-star2" class="tdb-s-criteria-ico" ' . $star_icon_data . '>';
                                                        $buffy .= $star_icon_html;
                                                    $buffy .= '</label>';

                                                    $buffy .= '<input type="radio" id="' . $criteria->slug . '-rating-star1" name="' . $criteria->slug . '-rating" value="1" class="tdb-s-criteria-input">';
                                                    $buffy .= '<label for="' . $criteria->slug . '-rating-star1" class="tdb-s-criteria-ico" ' . $star_icon_data . '>';
                                                        $buffy .= $star_icon_html;
                                                    $buffy .= '</label>';
                                                $buffy .= '</div>';

                                                $buffy .= '<div class="tdb-s-form-label tdb-s-criteria-label">' . $criteria->name . '</div>';
                                            $buffy .= '</div>';
                                        }
                                    $buffy .= '</div>';
                                }

                                $buffy .= '<div class="tdb-s-form-group tdb-s-form-group-name">';
                                    $buffy .= '<input class="tdb-s-form-input" type="text" name="name-company" value="' . $current_user_name . '" ' . $current_user_inputs_disabled . '  placeholder="' . __td( 'Enter Your Name or Company', TD_THEME_NAME ) . '" />';
                                $buffy .= '</div>';

                                $buffy .= '<div class="tdb-s-form-group tdb-s-form-group-email">';
                                    $buffy .= '<input class="tdb-s-form-input" type="email" name="email" value="' . $current_user_email . '" ' . $current_user_inputs_disabled . ' placeholder="' . __td( 'Email address', TD_THEME_NAME ) . '" />';
                                $buffy .= '</div>';
                            $buffy .= '</div>';
                        $buffy .= '</div>';

                        $buffy .= '<div class="tdb-s-form-footer">';
                            $buffy .= '<button type="submit" class="tdb-s-btn td-reviews-submit" ' . ( ( $post_id == '' || get_post_type($post_id) == 'tdc-review' ) ? 'disabled' : '' ) . '>' . __td( 'Submit review', TD_THEME_NAME ) . '</button>';
                        $buffy .= '</div>';
                    $buffy .= "</form>";
                }
            $buffy .= '</div>';


            if( !( tdc_state::is_live_editor_iframe() || tdc_state::is_live_editor_ajax() ) ) {
                ob_start();
                ?>
                <script>
                    /* global jQuery:{} */
                    jQuery().ready(function () {

                        let $blockObj = jQuery('.<?php echo $this->block_uid ?>'),
                            $form = $blockObj.find('form');


                        $form.on('submit', function (e) {

                            e.preventDefault();


                            let titleInput = $blockObj.find('[name="title"]'),
                                contentInput = $blockObj.find('[name="review_content"]'),
                                nameInput = $blockObj.find('[name="name-company"]'),
                                emailInput = $blockObj.find('[name="email"]'),

                                review_criteria = <?php echo json_encode($review_criteria) ?>,
                                review_ratings_selected = {},

                                review_status = '<?php echo $reviews_status ?>',

                                errorsCount = 0;


                            // Remove any notifications and error classes
                            $form.find('.tdb-s-fg-error').removeClass('.tdb-s-fg-error');
                            $form.find('.tdb-s-fg-error-msg').remove();
                            $form.find('.tdb-s-notif').remove();


                            // Validate the form
                            if( titleInput.val() === '' ) {
                                titleInput.closest('.tdb-s-form-group').addClass('tdb-s-fg-error');
                                titleInput.closest('.tdb-s-form-group').append('<span class="tdb-s-fg-error-msg"><?php echo $required_field_error ?></span>');

                                errorsCount++;
                            } else {
                                titleInput.closest('.tdb-s-form-group').removeClass('tdb-s-fg-error');
                                titleInput.closest('.tdb-s-form-group').find('.tdb-s-fg-error-msg').remove();
                            }

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


                            jQuery.each(review_criteria, function (key, criteria) {
                                let term_id = criteria.term_id,
                                    slug = criteria.slug + '-rating',
                                    checkedRating = $form.find('[name="' + slug + '"]:checked');

                                if( checkedRating.length ) {
                                    review_ratings_selected[term_id] = {
                                        name: criteria.name,
                                        score: checkedRating.val()
                                    };
                                }
                            });


                            if( errorsCount === 0 ) {
                                // Set the loading state for the form
                                $form.addClass('tdb-s-content-loading');

                                jQuery.ajax({
                                    type: 'POST',
                                    url: td_ajax_url,
                                    data: {
                                        action: 'tdc_review_form',
                                        title: titleInput.val(),
                                        content: contentInput.val(),
                                        name: nameInput.val(),
                                        email: emailInput.val(),
                                        reviewRatings: review_ratings_selected,
                                        reviewStatus: review_status,
                                        postID: '<?php echo $post_id ?>',
                                        userID: '<?php echo $userID ?>',
                                    },
                                    success: function (data) {
                                        let response = jQuery.parseJSON(data);

                                        // The form was successfully processed and the review created
                                        if( response.success !== '' ) {
                                            // Display the success message
                                            $form.before(
                                                '<div class="tdb-s-notif tdb-s-notif-sm tdb-s-notif-success">' +
                                                    '<div class="tdb-s-notif-descr">' + response.success + '</div>' +
                                                '</div>'
                                            );

                                            // Remove the form
                                            $form.remove();
                                        }

                                        // The form was not successfully processed, so display the error messages
                                        if( response.errors.length ) {
                                            let $errorHTML = '<div class="tdb-s-notif tdb-s-notif-sm tdb-s-notif-error">';
                                                    $errorHTML += '<ul class="tdb-s-notif-list">';
                                                        jQuery.each(response.errors, function(key, error) {
                                                            $errorHTML += '<li>' + error + '</li>';
                                                        });
                                                    $errorHTML += '</ul>';
                                                $errorHTML += '</div>';

                                            $form.find('.tdb-s-fc-inner').append($errorHTML);
                                        }

                                        // Remove the loading state for the form
                                        $form.removeClass('tdb-s-content-loading');
                                    }
                                });
                            }

                        });

                    });
                </script>
                <?php
                td_js_buffer::add_to_footer( "\n" . td_util::remove_script_tag( ob_get_clean() ) );
            }

        $buffy .= '</div>';


        return $buffy;
    }

}