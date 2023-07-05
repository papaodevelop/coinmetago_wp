<?php

class tdb_single_user_reviews_list extends td_block {

    public function get_custom_css() {
        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $unique_block_class = ((td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax()) ? 'tdc-row .' : '') . $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>
                  
                /* @style_general_tdb_single_user_reviews_list */
                .tdb_single_user_reviews_list {
                    transform: translateZ(0);
                    font-family: -apple-system,BlinkMacSystemFont,\"Segoe UI\",Roboto,Oxygen-Sans,Ubuntu,Cantarell,\"Helvetica Neue\",sans-serif;
                    font-size: 14px;
                }
                .tdb_single_user_reviews_list a:not(.tds-s-btn) {
                    color: #0489FC;
                }
                .tdb_single_user_reviews_list a:not(.tds-s-btn):hover {
                    color: #152BF7;
                }
                
                .tdb_single_user_reviews_list .tdb-surl-review {
                    display: flex;
                    align-items: flex-start;
                    position: relative;
                }
                .tdb_single_user_reviews_list .tdb-surl-review:not(:last-child) {
                    margin-bottom: 28px;
                    padding-bottom: 28px;
                    border-bottom: 1px solid #EBEBEB;
                }
                .tdb_single_user_reviews_list .tdb-surl-review-left {
                    display: flex;
                    align-items: center;
                    width: 220px;
                }
                .tdb_single_user_reviews_list .tdb-surl-review-auth-photo {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin-right: 13px;
                    background-color: rgba(4, 137, 252, 0.1);
                    background-size: cover;
                    background-position: center;
                    width: 38px;
                    height: 38px;
                    padding-bottom: 1px;
                    font-size: 14px;
                    line-height: 1;
                    font-weight: 600;
                    color: #152BF7;
                    border-radius: 100%;
                }
                .tdb_single_user_reviews_list .tdb-surl-review-meta {
                    flex: 1;
                }
                .tdb_single_user_reviews_list .tdb-surl-review-auth-name,
                .tdb_single_user_reviews_list .tdb-surl-review-auth-name a {
                    display: flex;
                    align-items: center;
                }
                .tdb_single_user_reviews_list .tdb-surl-review-auth-name {
                    font-size: 1em;
                    font-weight: 600;
                    line-height: 1.3;
                    color: #1D2327;
                }
                .tdb_single_user_reviews_list .tdb-surl-review-auth-name a {
                    color: inherit;
                }
                .tdb_single_user_reviews_list .tdb-surl-review-auth-badge {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    width: 1.364em;
                    height: 1.364em;
                    margin-left: .545em;
                    background-color: #E5F3FF;
                    font-size: .786em;
                    color: #152bf7;
                    border-radius: 2px;
                }
                .tdb_single_user_reviews_list .tdb-surl-review-auth-badge i {
                    line-height: 0;
                }
                .tdb_single_user_reviews_list .tdb-surl-review-auth-badge svg {
                    width: .786em;
                    height: auto;
                    fill: #152bf7;
                }
                .tdb_single_user_reviews_list .tdb-surl-review-date {
                    font-size: .857em;
                    line-height: 1.4;
                    color: #555d66;
                }
                .tdb_single_user_reviews_list .tdb-surl-review-right {
                    flex: 1;
                }
                .tdb_single_user_reviews_list .tdb-surl-review-title {
                    margin: 0 0 0;
                    font-size: 1.286em;
                    line-height: 1.2;
                    font-weight: 600;
                    color: #1D2327;
                }
                .tdb_single_user_reviews_list .tdb-surl-review-ratings {
                    margin-top: 12px;
                }
                .tdb_single_user_reviews_list .tdb-surl-review-rating,
                .tdb_single_user_reviews_list .tdb-surl-rr-stars {
                    display: flex;
                    align-items: center;
                }
                .tdb_single_user_reviews_list .tdb-surl-review-rating:not(:last-child) {
                    margin-bottom: 5px;
                }
                .tdb_single_user_reviews_list .tdb-surl-rr-stars {
                    margin-right: 12px;
                }
                .tdb_single_user_reviews_list .tdb-surl-rr-star:not(:last-child) {
                    margin-right: 3px;
                }
                .tdb_single_user_reviews_list .tdb-surl-rr-star {
                    font-size: 1.143em;
                    color: #b5b5b5;
                }
                .tdb_single_user_reviews_list .tdb-surl-rr-star svg {
                    display: block;
                    width: 1em;
                    height: auto;
                    fill: #C1BFBF;
                }
                .tdb_single_user_reviews_list .tdb-surl-rr-star-full,
                .tdb_single_user_reviews_list .tdb-surl-rr-star-half {
                    color: #ee8302;
                }
                .tdb_single_user_reviews_list .tdb-surl-rr-star-full svg,
                .tdb_single_user_reviews_list .tdb-surl-rr-star-half svg {
                    fill: #ee8302;
                }
                .tdb_single_user_reviews_list .tdb-surl-rr-label {
                    flex: 1;
                    font-size: .929em;
                    line-height: 1;
                    font-weight: 600;
                    color: #7A828B;
                }
                .tdb_single_user_reviews_list .tdb-surl-rr-label span {
                    opacity: .7;
                }
                .tdb_single_user_reviews_list .tdb-surl-review-content {
                    margin-top: 20px;
                    font-size: 1em;
                    line-height: 1.6;
                    color: #555D66;
                }
                .tdb_single_user_reviews_list .tdb-surl-review-options {
                    margin-top: 12px;
                    font-size: .786em;
                    line-height: 1.2;
                }
                .tdb_single_user_reviews_list .tdb-surl-review-options a:not(:last-child) {
                    margin-right: 7px;
                }
                .tdb_single_user_reviews_list .tdb-surl-review-options .tdb-surl-review-reply-delete {
                    color: #FF6161;
                }
                .tdb_single_user_reviews_list .tdb-surl-review-options .tdb-surl-review-reply-delete:hover {
                    color: #ff0000;
                }
                .tdb_single_user_reviews_list .tdb-surl-review-replies,
                .tdb_single_user_reviews_list .tdb-surl-review-reply-form {
                    margin-top: 22px;
                    padding-top: 22px;
                    border-top: 1px solid #EBEBEB;
                }
                .tdb_single_user_reviews_list .tdb-surl-review-reply-form .tdb-s-fc-inner {
                    margin: 0 -8px;
                }
                .tdb_single_user_reviews_list .tdb-surl-review-reply-form .tdb-s-form-group {
                    margin-bottom: 17px;
                    padding: 0 8px;
                }
                @media (min-width: 1019px) {
                    .tdb_single_user_reviews_list .tdb-surl-review-reply-form .tdb-s-form-group-name,
                    .tdb_single_user_reviews_list .tdb-surl-review-reply-form .tdb-s-form-group-email {
                        width: 50%;
                        margin-bottom: 0;
                    }
                }
                .tdb_single_user_reviews_list .tdb-surl-review-reply-form .tdb-s-form-group-content .tdb-s-form-input {
                    min-height: 94px;
                }
                .tdb_single_user_reviews_list .tdb-surl-review-reply-form .tdb-s-form-footer {
                    margin-top: 25px;
                }
                .tdb_single_user_reviews_list .tdb-surl-review-reply-form .tdb-s-form-footer .tdb-s-btn:not(:last-of-type) {
                    margin-right: 16px;
                }
                .tdb_single_user_reviews_list .tdb-surl-review-reply:not(:last-child) {
                    margin-bottom: 22px;
                    padding-bottom: 22px;
                }
                .tdb_single_user_reviews_list .tdb-surl-review-reply .tdb-surl-review-title {
                    display: flex;
                    align-items: center;
                    font-size: 1.071em;
                }
                .tdb_single_user_reviews_list .tdb-surl-review-reply .tdb-surl-review-content {
                    margin-top: 12px;
                }
                .tdb_single_user_reviews_list .tdb-surl-review-reply .tdb-surl-review-options {
                    margin-top: 10px;
                }
                
                /* @style_general_tdb_single_user_reviews_list_composer */
                .tdb_single_user_reviews_list .tdb-block-inner {
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
                body .$unique_block_class .tdb-s-btn:not(.tdb-s-btn-hollow) {
                    background-color: @accent_color;
                }
                body .$unique_block_class a:not(.tdb-s-btn):not(.tdb-surl-review-auth-name-link),      
                body .$unique_block_class:not(.tdb-surl-review-auth-name),
                body .$unique_block_class .tdb-surl-review-auth-photo {
                    color: @accent_color;
                }
                body .$unique_block_class .tdb-surl-review-auth-name a:hover {
                    color: @accent_color;
                }
                body .$unique_block_class .tdb-surl-rr-star-full svg,
                body .$unique_block_class .tdb-surl-rr-star-half svg {
                    fill: @accent_color;
                }
                body .$unique_block_class .tdb-surl-rr-star-empty svg {
                    fill: @accent_color;
                }
                /* @author_bg */
                body .$unique_block_class .tdb-surl-review-auth-photo {
                    background-color: @author_bg;
                }
                /* @input_outline_accent_color */
                body .$unique_block_class .tdb-s-form .tdb-s-form-group:not(.tdb-s-fg-error) .tdb-s-form-input:focus:not([readonly]) {
                    outline-color: @input_outline_accent_color;
                }
                
                /* @header_color */
                body .$unique_block_class .tdb-spsh-title {
                    color: @header_color;
                }
                
                /* @all_rev_sep_color */
                body .$unique_block_class .tdb-surl-review:not(:last-child) {
                    border-color: @all_rev_sep_color;
                }
                
                /* @auth_color */
				body .$unique_block_class .tdb-surl-review-auth-name {
					color: @auth_color;
				}
				/* @auth_color_h */
				body .$unique_block_class .tdb-surl-review-auth-name a:hover {
					color: @auth_color_h;
				}
                /* @badge_color */
				body .$unique_block_class .tdb-surl-review-auth-badge {
					color: @badge_color;
				}
				body .$unique_block_class .tdb-surl-review-auth-badge svg {
					fill: @badge_color;
				}
                /* @badge_bg */
				body .$unique_block_class .tdb-surl-review-auth-badge {
					background-color: @badge_bg;
				}
                /* @date_color */
                body .$unique_block_class .tdb-surl-review-date {
                    color: @date_color;
                }
                /* @title_color */
                body .$unique_block_class .tdb-surl-review-title{
                    color: @title_color;
                }
                /* @content_color */
                body .$unique_block_class .tdb-surl-review-content {
                    color: @content_color;
                }
                /* @del_color */
                body .$unique_block_class .tdb-surl-review-reply-delete {
                    color: @del_color;
                }
                
                /* @stars_v_alignment */
                body .$unique_block_class .tdb-surl-rr-stars {
                    position:relative;
                    top: @stars_v_alignment;
                }
                /* @space_btw_stars */
                body .$unique_block_class .tdb-surl-rr-star:not(:last-child) {
                    margin-right: @space_btw_stars;
                }
                /* @display_direction */
                body .$unique_block_class .tdb-surl-review {
                    flex-direction: @display_direction;
                }
                /* @sections_gap */
                body .$unique_block_class .tdb-surl-review {
                    gap: @sections_gap;
                }
                /* @space_btw_criteria */
                body .$unique_block_class .tdb-surl-review-rating:not(:last-child) {
                    margin-bottom: @space_btw_criteria;
                }
                
                /* @empty_color */
                body .$unique_block_class .tdb-surl-rr-star-empty {
                    color: @empty_color;
                }
                body .$unique_block_class .tdb-surl-rr-star-empty svg {
                    fill: @empty_color;
                }
                /* @full_color */
                body .$unique_block_class .tdb-surl-rr-star-full,
                body .$unique_block_class .tdb-surl-rr-star-half {
                    color: @full_color;
                }
                body .$unique_block_class .tdb-surl-rr-star-full svg,
                body .$unique_block_class .tdb-surl-rr-star-half svg {
                    fill: @full_color;
                }
                /* @label_color */
                body .$unique_block_class .tdb-surl-rr-label {
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
                body .$unique_block_class .tdb-s-form .tdb-s-form-input,
                body .$unique_block_class .tdb-s-form-group:not(.tdb-s-fg-error) .tdb-s-form-input:disabled {
                    background-color: @input_bg;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-input:-webkit-autofill,
                body .$unique_block_class .tdb-s-form .tdb-s-form-input:-webkit-autofill:hover,
                body .$unique_block_class .tdb-s-form .tdb-s-form-input:-webkit-autofill:focus,
                body .$unique_block_class .tdb-s-form .tdb-s-form-input:-webkit-autofill:active {
                    -webkit-box-shadow: 0 0 0 1000px @input_bg inset !important;
                }
                
                /* @btn_color */
                body .$unique_block_class .tdb-s-btn:not(.tdb-s-btn-hollow) {
                    color: @btn_color;
                }
                /* @btn_color_h */
                body .$unique_block_class .tdb-s-btn:not(.tdb-s-btn-hollow):hover {
                    color: @btn_color_h;
                }
                /* @btn_bg_h */
                body .$unique_block_class .tdb-s-btn:not(.tdb-s-btn-hollow):hover {
                    background-color: @btn_bg_h;
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
                    border-color: @btn_border_hol;
                }
                /* @btn_border_hol_h */
                body .$unique_block_class .tdb-s-form .tdb-s-btn-hollow:hover {
                    border-color: @btn_border_hol_h;
                }
                
                /* @notif_color */
                body .$unique_block_class .tdb-s-notif-info {
                    color: @notif_color;
                }
                /* @notif_bg */
                body .$unique_block_class .tdb-s-notif-info {
                    background-color: @notif_bg;
                }
                
				/* @icons_size */
                body .$unique_block_class .tdb-surl-rr-star {
                    font-size: @icons_size;
                }
                
                /* @f_text */
                body .$unique_block_class {
                    @f_text
                }
                body .$unique_block_class .tdb-surl-review-title {
                    @f_text
                }

                /* @f_content */
                body .$unique_block_class .tdb-surl-review-content {
                    @f_content
                }
                
            </style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        /*-- GENERAL STYLES -- */
        $res_ctx->load_settings_raw( 'style_general_tdb_single_user_reviews_list', 1 );
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $res_ctx->load_settings_raw( 'style_general_tdb_single_user_reviews_list_composer', 1 );
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
            $res_ctx->load_settings_raw('author_bg', td_util::hex2rgba($accent_color, 0.1));
            $res_ctx->load_settings_raw('input_outline_accent_color', td_util::hex2rgba($accent_color, 0.1));
        }

        $res_ctx->load_settings_raw('header_color', $res_ctx->get_shortcode_att('header_color'));

        $res_ctx->load_settings_raw('all_rev_sep_color', $res_ctx->get_shortcode_att('all_rev_sep_color'));

        $res_ctx->load_settings_raw('auth_color', $res_ctx->get_shortcode_att('auth_color'));
        $res_ctx->load_settings_raw( 'auth_color_h', $res_ctx->get_shortcode_att('auth_color_h') );
        $res_ctx->load_settings_raw('date_color', $res_ctx->get_shortcode_att('date_color'));
        $res_ctx->load_settings_raw('badge_color', $res_ctx->get_shortcode_att('badge_color'));
        $res_ctx->load_settings_raw('badge_bg', $res_ctx->get_shortcode_att('badge_bg'));
        $res_ctx->load_settings_raw('title_color', $res_ctx->get_shortcode_att('title_color'));
        $res_ctx->load_settings_raw('content_color', $res_ctx->get_shortcode_att('content_color'));
        $res_ctx->load_settings_raw('del_color', $res_ctx->get_shortcode_att('del_color'));

        $stars_v_alignment = $res_ctx->get_shortcode_att('stars_v_alignment');
        $res_ctx->load_settings_raw('stars_v_alignment', $stars_v_alignment);
        if( $stars_v_alignment != '' && is_numeric( $stars_v_alignment ) ) {
            $res_ctx->load_settings_raw('stars_v_alignment', $stars_v_alignment . 'px');
        }

        $space_btw_stars = $res_ctx->get_shortcode_att('space_btw_stars');
        $res_ctx->load_settings_raw('space_btw_stars', $space_btw_stars);
        if( $space_btw_stars != '' && is_numeric( $space_btw_stars ) ) {
            $res_ctx->load_settings_raw('space_btw_stars', $space_btw_stars . 'px');
        }

        $space_btw_criteria = $res_ctx->get_shortcode_att('space_btw_criteria');
        $res_ctx->load_settings_raw('space_btw_criteria', $space_btw_criteria);
        if( $space_btw_criteria != '' && is_numeric( $space_btw_criteria ) ) {
            $res_ctx->load_settings_raw('space_btw_criteria', $space_btw_criteria . 'px');
        }

        $res_ctx->load_settings_raw('display_direction', $res_ctx->get_shortcode_att('display_direction'));

//        $res_ctx->load_settings_raw('sections_gap', $res_ctx->get_shortcode_att('sections_gap'));
        $sections_gap = $res_ctx->get_shortcode_att('sections_gap');
        $res_ctx->load_settings_raw('sections_gap', $sections_gap);
        if( $sections_gap != '' && is_numeric( $sections_gap ) ) {
            $res_ctx->load_settings_raw('sections_gap', $sections_gap . 'px');
        }

        $res_ctx->load_settings_raw('full_color', $res_ctx->get_shortcode_att('full_color'));
        $res_ctx->load_settings_raw('empty_color', $res_ctx->get_shortcode_att('empty_color'));
        $res_ctx->load_settings_raw('label_color', $res_ctx->get_shortcode_att('label_color'));

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
        $res_ctx->load_settings_raw( 'btn_color_hol', $res_ctx->get_shortcode_att('btn_color_hol') );
        $res_ctx->load_settings_raw( 'btn_color_hol_h', $res_ctx->get_shortcode_att('btn_color_hol_h') );
        $res_ctx->load_settings_raw( 'btn_bg_hol', $res_ctx->get_shortcode_att('btn_bg_hol') );
        $res_ctx->load_settings_raw( 'btn_bg_hol_h', $res_ctx->get_shortcode_att('btn_bg_hol_h') );
        $res_ctx->load_settings_raw( 'btn_border_hol', $res_ctx->get_shortcode_att('btn_border_hol') );
        $res_ctx->load_settings_raw( 'btn_border_hol_h', $res_ctx->get_shortcode_att('btn_border_hol_h') );

        $notif_color = $res_ctx->get_shortcode_att('notif_color');
        $res_ctx->load_settings_raw( 'notif_color', $notif_color );
        if( !empty( $notif_color ) ) {
            $res_ctx->load_settings_raw('notif_bg', td_util::hex2rgba($notif_color, 0.08));
        }

        /*-- ICON -- */
        // icons size
        $icons_size = $res_ctx->get_shortcode_att('icons_size');
        $res_ctx->load_settings_raw('icons_size', $icons_size);
        if( $icons_size != '' && is_numeric( $icons_size ) ) {
            $res_ctx->load_settings_raw('icons_size', $icons_size . 'px');
        }

        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_text' );
        $res_ctx->load_font_settings( 'f_content' );

    }

    /**
     * Disable loop block features. This block does not use a loop and it doesn't need to run a query.
     */
    function __construct() {
        parent::disable_loop_block_features();
    }


    function render( $atts, $content = null ) {

        parent::render( $atts ); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query)


        $article_author_id = 0;
	    $reviews_count = 0;

        $curr_template_type = tdb_state_template::get_template_type();
        if( $curr_template_type == 'single' || $curr_template_type == 'cpt' ) {
            global $tdb_state_single;
            $reviews_list = $tdb_state_single->post_user_reviews_list->__invoke();
            $article_author_id = $tdb_state_single->post_author_id->__invoke();

            if( !empty( $reviews_list ) ) {
                $reviews_count = count( $reviews_list );
            }
        } else {
            $reviews_list = array(
                array(
                    'id' => 0,
                    'title' => 'Sample review title 1',
                    'author_id' => 0,
                    'author_name' => 'John Doe',
                    'author_email' => 'johndoe@example.com',
                    'author_photo' => '',
                    'date' => date( get_option( 'date_format' ), time() ),
                    'content' => 'Donec magna dui, ullamcorper eget blandit id, luctus sit amet ipsum. Duis convallis placerat eros, sed dictum sem facilisis ac.',
                    'ratings' => array(
                        array(
                            'name' => 'Review rating 1',
                            'score' => 5
                        ),
                        array(
                            'name' => 'Review rating 2',
                            'score' => 1
                        )
                    ),
                    'ratings_average' => 3
                ),
                array(
                    'id' => 1,
                    'title' => 'Sample review title 2',
                    'author_id' => 0,
                    'author_name' => 'Christopher Main',
                    'author_email' => 'christopher@example.com',
                    'author_photo' => '',
                    'date' => date( get_option( 'date_format' ), time() ),
                    'content' => 'Donec magna dui, ullamcorper eget blandit id, luctus sit amet ipsum. Duis convallis placerat eros, sed dictum sem facilisis ac.',
                    'ratings' => array(
                        array(
                            'name' => 'Review rating 1',
                            'score' => 4
                        ),
                    ),
                    'ratings_average' => 4
                ),
                array(
                    'id' => 1,
                    'title' => 'Sample review title 3',
                    'author_id' => 0,
                    'author_name' => 'Jane Smith',
                    'author_email' => 'jane@example.com',
                    'author_photo' => '',
                    'date' => date( get_option( 'date_format' ), time() ),
                    'content' => 'Donec magna dui, ullamcorper eget blandit id, luctus sit amet ipsum. Duis convallis placerat eros, sed dictum sem facilisis ac.',
                    'ratings' => array(
                        array(
                            'name' => 'Review rating 1',
                            'score' => 4
                        ),
                        array(
                            'name' => 'Review rating 2',
                            'score' => 3
                        ),
                    ),
                    'ratings_average' => 3.5
                ),
            );

            $reviews_count = 3;
        }


        // The current user ID
        $userID = get_current_user_id();


        // Header
        $header_text = ( $this->get_att('header_txt') != '' ? $this->get_att('header_txt') : 'Reviews' ) . ' (' . $reviews_count . ')';
        $header_tag = $this->get_att('header_tag') != '' ? $this->get_att('header_tag') : 'h2';


        // Title tag
        $title_tag = $this->get_att('title_tag') != '' ? $this->get_att('title_tag') : 'h3';
        $submit_txt = __td( 'Submit reply', TD_THEME_NAME );
        $reply_holder = __td( 'Enter your reply', TD_THEME_NAME );
        $name_holder = __td( 'Name', TD_THEME_NAME );
        $email_holder = __td( 'Email address', TD_THEME_NAME );
        $cancel_txt = __td( 'Cancel', TD_THEME_NAME );
        $cancel_reply_txt = __td( 'Cancel reply', TD_THEME_NAME );
        $reply_txt = __td( 'Reply', TD_THEME_NAME );
        $required_field_error = __td( 'This field is required!', TD_THEME_NAME );
        $delete_txt = __td( 'Delete', TD_THEME_NAME );


        // Rating stars
        $full_star_icon = $this->get_icon_att( 'tdicon_full' );
        $full_star_icon_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $full_star_icon_data = 'data-td-svg-icon="' . $this->get_att( 'tdicon_full' ) . '"';
        }
        $full_star_icon_html = '';
        if ( !empty( $full_star_icon ) ) {
            if( base64_encode( base64_decode( $full_star_icon ) ) == $full_star_icon ) {
                $full_star_icon_html = base64_decode( $full_star_icon ) ;
            } else {
                $full_star_icon_html = '<i class="' . $full_star_icon . '"></i>';
            }
        }

        $half_star_icon = $this->get_icon_att( 'tdicon_half' );
        $half_star_icon_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $half_star_icon_data = 'data-td-svg-icon="' . $this->get_att( 'tdicon_half' ) . '"';
        }
        $half_star_icon_html = '';
        if ( !empty( $half_star_icon ) ) {
            if( base64_encode( base64_decode( $half_star_icon ) ) == $half_star_icon ) {
                $half_star_icon_html = base64_decode( $half_star_icon ) ;
            } else {
                $half_star_icon_html = '<i class="' . $half_star_icon . '"></i>';
            }
        }

        $empty_star_icon = $this->get_icon_att( 'tdicon_empty' );
        $empty_star_icon_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $empty_star_icon_data = 'data-td-svg-icon="' . $this->get_att( 'tdicon_empty' ) . '"';
        }
        $empty_star_icon_html = '';
        if ( !empty( $empty_star_icon ) ) {
            if( base64_encode( base64_decode( $empty_star_icon ) ) == $empty_star_icon ) {
                $empty_star_icon_html = base64_decode( $empty_star_icon ) ;
            } else {
                $empty_star_icon_html = '<i class="' . $empty_star_icon . '"></i>';
            }
        }


        // Set the default variable values
        //$allow_reviews_for_guests = $this->get_att('review_priv') == '';
        $current_user_email = '';
        $current_user_name = '';
        $current_user_inputs_disabled = '';
        $is_current_user_admin = false;

        if ( is_user_logged_in() ) {
            $current_user = wp_get_current_user();
            $current_user_email = $current_user->user_email;
            $current_user_name = $current_user->display_name;
            $is_current_user_admin = in_array('administrator', $current_user->roles);
        }


        // Article author badge
        $article_author_badge_icon = $this->get_icon_att( 'tdicon_badge' );
        $article_author_badge_icon_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $article_author_badge_icon_data = 'data-td-svg-icon="' . $this->get_att( 'tdicon_badge' ) . '"';
        }
        $article_author_badge_icon_html = '<div class="tdb-surl-review-auth-badge"' . $article_author_badge_icon_data . '>';
        if ( !empty( $article_author_badge_icon ) ) {
            if( base64_encode( base64_decode( $article_author_badge_icon ) ) == $article_author_badge_icon ) {
                $article_author_badge_icon_html .= base64_decode( $article_author_badge_icon );
            } else {
                $article_author_badge_icon_html .= '<i class="' . $article_author_badge_icon . '"></i>';
            }
        } else {
            $article_author_badge_icon_html .= '<i class="td-icon-profile"></i>';
        }
        $article_author_badge_icon_html .= '</div>';


        // Notification text
        $notif_txt = rawurldecode( base64_decode( strip_tags( $this->get_att('notif_txt') ) ) );
        if( $notif_txt == '' ) {
            $notif_txt = 'This article doesn\'t have any reviews yet.';
        }


        $buffy = ''; //output buffer

        $buffy .= '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';

            //get the block css
            $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();


            $buffy .= '<div class="tdb-block-inner td-fix-index">';
                $buffy .= '<div class="tdb-s-page-sec-header">';
                    $buffy .= '<' . $header_tag . ' class="tdb-spsh-title">' . $header_text . '</' . $header_tag . '>';
                $buffy .= '</div>';

                if( empty( $reviews_list ) ) {
                    $buffy .= '<div class="tdb-s-notif tdb-s-notif-info"><div class="tdb-s-notif-descr">' . $notif_txt . '</div></div>';
                } else {
                    $buffy .= '<div class="tdb-surl-reviews">';
                        foreach ( $reviews_list as $review ) {
                            $is_article_author_review = $review['author_id'] == $article_author_id;
                            $review_article_author_class = '';

                            if( $is_article_author_review ) {
                                $review_article_author_class = 'tdb-surl-review-article-author';
                            }

                            // Review author avatar style
                            $user = get_user_by( 'email', $review['author_email'] );
                            $review_author_photo_style = '';
                            $review_author_photo_initials = '';
                            if( $review['author_photo'] != '' ) {
                                $review_author_photo_style = 'style="background-image:url(' . $review['author_photo'] . ')"';
                            } else {
                                $review_author_name_array = explode(' ', $review['author_name']);

                                for( $i = 0; $i < count($review_author_name_array); $i++ ) {
                                    if( $i < 2 ) {
                                        $review_author_photo_initials .= substr($review_author_name_array[$i], 0, 1);
                                    }
                                }
                            }

                            $buffy .= '<div class="tdb-surl-review ' . $review_article_author_class . '" data-review-id="' . $review['id'] . '">';
                                $buffy .= '<div class="tdb-surl-review-left">';
                                    $buffy .= '<div class="tdb-surl-review-auth-photo" ' . $review_author_photo_style . '>' . $review_author_photo_initials . '</div>';

                                    $buffy .= '<div class="tdb-surl-review-meta">';
                                        $buffy .= '<div class="tdb-surl-review-auth-name" ' . ( $is_article_author_review ? 'title="Article author"' : '' ) . '>';
                                            if ( $review['author_id'] != 0 ) {
                                                $buffy .= '<a href="' . get_author_posts_url($user->ID) . '" class="tdb-surl-review-auth-name-link">';
                                            }
                                                $buffy .= $review['author_name'];
                                                if( $is_article_author_review ) {
                                                    $buffy .= $article_author_badge_icon_html;
                                                }
                                            if ( $review['author_id'] != 0 ) {
                                                $buffy .= '</a>';
                                            }
                                        $buffy .= '</div>';

                                        $buffy .= '<div class="tdb-surl-review-date">' . $review['date'] . '</div>';
                                    $buffy .= '</div>';
                                $buffy .= '</div>';

                                $buffy .= '<div class="tdb-surl-review-right">';
                                    $buffy .= '<' . $title_tag . ' class="tdb-surl-review-title">' . $review['title'] . '</' . $title_tag . '>';

                                    if( !empty( $review['ratings'] ) ) {
                                        $buffy .= '<div class="tdb-surl-review-ratings">';
                                            $buffy .= '<div class="tdb-surl-review-rating">';
                                                $buffy .= $this->display_stars($review['ratings_average'], $full_star_icon_html, $full_star_icon_data, $half_star_icon_html, $half_star_icon_data, $empty_star_icon_html, $empty_star_icon_data);
                                                $buffy .= '<div class="tdb-surl-rr-label">' . __td( 'Overall', TD_THEME_NAME ) . '<span>(' . $review['ratings_average'] . ' ' . __td( 'out of 5', TD_THEME_NAME ) . ')</span></div>';
                                            $buffy .= '</div>';

                                            foreach ( $review['ratings'] as $rating ) {
                                                $buffy .= '<div class="tdb-surl-review-rating">';
                                                    $buffy .= $this->display_stars($rating['score'], $full_star_icon_html, $full_star_icon_data, $half_star_icon_html, $half_star_icon_data, $empty_star_icon_html, $empty_star_icon_data);
                                                    $buffy .= '<div class="tdb-surl-rr-label">' . $rating['name'] . ' <span>(' . $rating['score'] . ' ' . __td( 'out of 5', TD_THEME_NAME ) . ')</span></div>';
                                                $buffy .= '</div>';
                                            }
                                        $buffy .= '</div>';
                                    }

                                    $buffy .= '<div class="tdb-surl-review-content">' . $review['content'] . '</div>';

                                    $buffy .= '<div class="tdb-surl-review-options">';
                                        $buffy .= '<a class="tdb-surl-review-leave-reply" href="#" data-action="reply">' . __td( 'Reply', TD_THEME_NAME ) . '</a>';
                                    $buffy .= '</div>';

                                    if( !empty( $review['replies'] ) ) {
                                        $buffy .= '<div class="tdb-surl-review-replies">';
                                            foreach ( $review['replies'] as $review_reply ) {
                                                $is_article_author_review_reply = $review_reply['author_id'] == $article_author_id;
                                                $review_reply_article_author_class = '';

                                                if( $is_article_author_review_reply ) {
                                                    $review_reply_article_author_class = 'tdb-surl-review-reply-article-author';
                                                }

                                                $buffy .= '<div class="tdb-surl-review tdb-surl-review-reply ' . $review_reply_article_author_class . ' tdb-s-content" data-review-reply-id="' . $review_reply['id'] . '">';
                                                    $buffy .= '<div class="tdb-surl-review-right">';
                                                        $buffy .= '<' . $title_tag . ' class="tdb-surl-review-title" ' . ( $is_article_author_review_reply ? 'title="Article author"' : '' ) . '>';
                                                            $buffy .= $review_reply['author_name'];
                                                            if( $is_article_author_review_reply ) {
                                                                $buffy .= $article_author_badge_icon_html;
                                                            }
                                                        $buffy .= '</' . $title_tag . '>';

                                                        $buffy .= '<div class="tdb-surl-review-content">' . $review_reply['content'] . '</div>';

                                                        if( $is_current_user_admin ||
                                                            (
                                                                $userID != 0 &&
                                                                (
                                                                    ( $review['author_id'] == $userID ) ||
                                                                    ( $review_reply['author_id'] == $userID )
                                                                )
                                                            )
                                                        ) {
                                                            $buffy .= '<div class="tdb-surl-review-options">';
                                                                $buffy .= '<a class="tdb-surl-review-reply-delete" href="#">' . __td( 'Delete', TD_THEME_NAME ) . '</a>';
                                                            $buffy .= '</div>';
                                                        }
                                                    $buffy .= '</div>';
                                                $buffy .= '</div>';
                                            }
                                        $buffy .= '</div>';
                                    }
                                $buffy .= '</div>';
                            $buffy .= '</div>';
                        }
                    $buffy .= '</div>';
                }
            $buffy .= '</div>';


        if( !( tdc_state::is_live_editor_iframe() || tdc_state::is_live_editor_ajax() ) ) {
            ob_start();
            ?>
            <script>
                /* global jQuery:{} */
                jQuery().ready(function () {

                    let uid = '<?php echo $this->block_uid ?>',
                        $blockObj = jQuery('.<?php echo $this->block_uid ?>');


                    let tdbReviewsListItem = new tdbReviewsList.item();
                    // block uid
                    tdbReviewsListItem.uid = uid;
                    // block object
                    tdbReviewsListItem.blockObj = $blockObj;
                    // article author ID
                    tdbReviewsListItem.articleAuthorID = '<?php echo $article_author_id ?>';
                    // article author badge
                    tdbReviewsListItem.articleAuthorBadge = '<?php echo $article_author_badge_icon_html ?>';
                    // current user ID
                    tdbReviewsListItem.currentUserID = '<?php echo $userID ?>';
                    // current user name
                    tdbReviewsListItem.currentUserName = '<?php echo $current_user_name ?>';
                    // current user email
                    tdbReviewsListItem.currentUserEmail = '<?php echo $current_user_email ?>';
                    // title tag
                    tdbReviewsListItem.titleTag = '<?php echo $title_tag ?>';// title tag
                    // translation
                    tdbReviewsListItem.submitTxt = '<?php echo $submit_txt ?>';// title tag
                    tdbReviewsListItem.replyHolder = '<?php echo $reply_holder ?>';// title tag
                    tdbReviewsListItem.nameHolder = '<?php echo $name_holder ?>';// title tag
                    tdbReviewsListItem.emailHolder = '<?php echo $email_holder ?>';// title tag
                    tdbReviewsListItem.cancelTxt = '<?php echo $cancel_txt ?>';// title tag
                    tdbReviewsListItem.cancelReplyTxt = '<?php echo $cancel_reply_txt ?>';// title tag
                    tdbReviewsListItem.replyTxt = '<?php echo $reply_txt ?>';
                    tdbReviewsListItem.requiredTxt = '<?php echo $required_field_error ?>';
                    tdbReviewsListItem.deleteTxt = '<?php echo $delete_txt ?>';

                    tdbReviewsList.addItem(tdbReviewsListItem);

                });
            </script>
            <?php
            td_js_buffer::add_to_footer( "\n" . td_util::remove_script_tag( ob_get_clean() ) );
        }


        $buffy .= '</div>';


        return $buffy;

    }

    function display_stars($rating_average, $full_star_icon, $full_star_icon_data, $half_star_icon, $half_star_icon_data, $empty_star_icon, $empty_star_icon_data) {

        $rating_average_floor = floor($rating_average);
        $rating_average_ceil = ceil($rating_average);

        if( $empty_star_icon == '' ) {
            $empty_star_icon = '<i class="td-icon-user-rev-star-empty"></i>';
        }
        if( $half_star_icon == '' ) {
            $half_star_icon = '<i class="td-icon-user-rev-star-half"></i>';
        }
        if( $full_star_icon == '' ) {
            $full_star_icon = '<i class="td-icon-user-rev-star-full"></i>';
        }

        $buffy = '<div class="tdb-surl-rr-stars">';
            for( $i = 0; $i < $rating_average_floor; $i++ ) {
                $buffy .= '<div class="tdb-surl-rr-star tdb-surl-rr-star-full" ' . $full_star_icon_data . '>' . $full_star_icon . '</div>';
            }
            if( $rating_average_floor != $rating_average ) {
                $buffy .= '<div class="tdb-surl-rr-star tdb-surl-rr-star-half" ' . $half_star_icon_data . '>' . $half_star_icon . '</div>';
            }
            for( $i = 5; $i > $rating_average_ceil; $i-- ) {
                $buffy .= '<div class="tdb-surl-rr-star tdb-surl-rr-star-empty" ' . $empty_star_icon_data . '>' . $empty_star_icon . '</div>';
            }
        $buffy .= '</div>';

        return $buffy;

    }

}