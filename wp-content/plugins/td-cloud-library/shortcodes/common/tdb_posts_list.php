<?php

/**
 * Class tdb_location_finder
 */

class tdb_posts_list extends td_block {

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

                /* @style_general_tdb_posts_list */
                .tdb_posts_list {
                    transform: translateZ(0);
                    font-family: -apple-system,BlinkMacSystemFont,\"Segoe UI\",Roboto,Oxygen-Sans,Ubuntu,Cantarell,\"Helvetica Neue\",sans-serif;
                    font-size: 14px;
                }
                .tdb_posts_list a:not(.tdb-s-btn):not(.tdb-s-tol-item):not(.tdb-s-pagination-item) {
                    color: #0489FC;
                }
                .tdb_posts_list a:not(.tdb-s-btn):not(.tdb-s-tol-item):not(.tdb-s-pagination-item):hover {
                    color: #152BF7;
                }
                .tdb_posts_list .tdb-plist-notifs-top {
                    margin-bottom: 40px;
                }
                .tdb_posts_list .tdb-plist-notifs-top .tdb-s-notif:not(:last-child) {
                    margin-bottom: 28px;
                }
                .tdb_posts_list .tdb-plist-search {
                    margin-bottom: 40px;
                }
                .tdb_posts_list .tdb-plist-search .tdb-s-fc-inner {
                    margin-left: -8px;
                    margin-right: -8px;
                }
                .tdb_posts_list .tdb-plist-search .tdb-s-form-group {
                    margin-bottom: 17px;
                    padding: 0 8px;
                }
                .tdb_posts_list .tdb-plist-search .tdb-s-form-group-button {
                    width: auto;
                }
                .tdb_posts_list .tdb-plist-search button {
                    min-height: 36px;
                    width: 100%;
                }
                @media(min-width: 768px) {
                    .tdb_posts_list .tdb-plist-search .tdb-s-fc-inner {
                        margin: 0;
                    }
                    .tdb_posts_list .tdb-plist-search .tdb-s-form-group {
                        margin-bottom: 0;
                        padding: 0;
                    }
                    .tdb_posts_list .tdb-plist-search .tdb-s-form-group-keyword {
                        flex: 1;
                    }
                    .tdb_posts_list .tdb-plist-search .tdb-s-form-group-in {
                        width: 23%;
                    }
                    .tdb_posts_list .tdb-plist-search .tdb-plist-search-keyword {
                        border-right-width: 0 !important;
                        border-top-right-radius: 0 !important;
                        border-bottom-right-radius: 0 !important;
                    }
                    .tdb_posts_list .tdb-plist-search .tdb-s-form-select-wrap .tdb-plist-search-in {
                        border-right-width: 0 !important;
                        border-radius: 0 !important;
                    }
                    .tdb_posts_list .tdb-plist-search button {
                        border-top-left-radius: 0 !important;
                        border-bottom-left-radius: 0 !important;
                    }
                }
                @media(max-width: 767px) {
                    .tdb_posts_list .tdb-plist-search .tdb-s-form-group-in,
                    .tdb_posts_list .tdb-plist-search .tdb-s-form-group-button {
                        margin-bottom: 0;
                    }
                    .tdb_posts_list .tdb-plist-search .tdb-s-form-group-in {
                        flex: 1;
                    }
                }
                .tdb_posts_list .tdb-plst-add {
                    margin-top: 40px;
                }
                .tdb_posts_list .tdb-plist-title-status {
                    font-size: 0.846em;
                    opacity: .6;
                }
                .tdb_posts_list .tdb-plist-rating {
                    display: flex;
                    align-items: center;
                }
                .tdb_posts_list .tdb-plist-stars {
                    display: flex;
                    align-items: center;
                }
                .tdb_posts_list .tdb-plist-star:not(:last-child) {
                    margin-right: .143em;
                }
                .tdb_posts_list .tdb-plist-star {
                    font-size: 1em;
                    color: #b5b5b5;
                }
                .tdb_posts_list .tdb-plist-star svg {
                    display: block;
                    width: 1em;
                    height: auto;
                    fill: #C1BFBF;
                }
                .tdb_posts_list .tdb-plist-star-full,
                .tdb_posts_list .tdb-plist-star-half {
                    color: #ee8302;
                }
                .tdb_posts_list .tdb-plist-star-full svg,
                .tdb_posts_list .tdb-plist-star-half svg {
                    fill: #ee8302;
                }
                .tdb_posts_list .tdb-pl-img {
                    width: 60px;
                    height: 40px;
                    background-size: cover;
                    background-position: center;
                    background-color: #F5F5F5;
                }
                @media (max-width: 1018px) {
                    .tdb_posts_list .tdb-pl-img {
                        align-self: flex-end;
                    }
                }
                @media (min-width: 1019px) {
                    .tdb_posts_list .tdb-s-table-col-options {
                        width: 7%;
                    }
                }
                .tdb-plist-confirm-modal .tdb-s-modal {
                    min-width: 600px;
                    max-width: 600px;
                }
                
                /* @style_general_tdb_posts_list_composer */
                .tdb_posts_list a.tdb-s-tol-item {
                    pointer-events: none;
                }
                
                
                
                /* @all_input_border */
                body .$unique_block_class .tdb-s-form .tdb-s-form-input {
                    border: @all_input_border @all_input_border_style @all_input_border_color;
                }
                /* @input_radius */
                body .$unique_block_class .tdb-s-form .tdb-s-form-input {
                    border-radius: @input_radius;
                }
                
                /* @img_width */
                body .$unique_block_class .tdb-pl-img {
                    width: @img_width;
                }
                /* @img_height */
                body .$unique_block_class .tdb-pl-img {
                    height: @img_height;
                }
                
                /* @opt_radius */
                body .$unique_block_class .tdb-s-table-options-list {
                    border-radius: @opt_radius;
                }
                
                /* @modal_width */
                body .tdb-plist-confirm-modal-$unique_block_class .tdb-s-modal {
                    min-width: @modal_width;
                    max-width: @modal_width;
                }
                /* @modal_radius */
                body .tdb-plist-confirm-modal-$unique_block_class .tdb-s-modal {
                    border-radius: @modal_radius;
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
                body .$unique_block_class a:not(.tdb-s-btn):not(.tdb-s-tol-item):not(.tdb-s-pagination-item),
                body .$unique_block_class .tdb-s-btn-hollow,
                body .tdb-plist-confirm-modal-$unique_block_class a:not(.tdb-s-btn),
                body .tdb-plist-confirm-modal-$unique_block_class .tdb-s-btn-hollow {
                    color: @accent_color;
                }
                body .$unique_block_class .tdb-s-btn:not(.tdb-s-btn-hollow),
                body .$unique_block_class .tdb-s-pagination-item.tdb-s-pagination-active,
                body .tdb-plist-confirm-modal-$unique_block_class .tdb-s-btn:not(.tdb-s-btn-hollow) {
                    background-color: @accent_color;
                }
                body .$unique_block_class .tdb-s-btn-hollow,
                body .tdb-plist-confirm-modal-$unique_block_class .tdb-s-btn-hollow {
                    border-color: @accent_color;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-group:not(.tdb-s-fg-error) .tdb-s-form-input:focus:not([readonly]) {
                    border-color: @accent_color !important;
                }
                /* @input_outline_accent_color */
                body .$unique_block_class .tdb-s-form .tdb-s-form-group:not(.tdb-s-fg-error) .tdb-s-form-input:focus:not([readonly]) {
                    outline-color: @input_outline_accent_color;
                }
                /* @a_color_h */
                body .$unique_block_class a:not(.tdb-s-btn):not(.tdb-s-tol-item):not(.tdb-s-pagination-item):hover,
                body .tdb-plist-confirm-modal-$unique_block_class a:not(.tdb-s-btn):hover {
                    color: @a_color_h;
                }

                /* @input_color */
                body .$unique_block_class .tdb-s-form .tdb-s-form-input {
                    color: @input_color;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .tdb-s-form-select-icon {
                    fill: @input_color;
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
                body .$unique_block_class .tdb-s-form .tdb-s-form-input::-ms-input-placeholder {
                    color: @input_place_color;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-input:::-moz-placeholder  {
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
                
                /* @tabl_border_color */
                body .$unique_block_class .tdb-s-table-header, 
                body .$unique_block_class .tdb-s-table-row:not(:last-child) {
                    border-bottom-color: @tabl_border_color;
                }
                /* @tabl_head_color */
                body .$unique_block_class .tdb-s-table-header {
                    color: @tabl_head_color;
                }
                body .$unique_block_class .tdb-s-table-col-order-icons svg {
                    fill: @tabl_head_color;
                }
                /* @tabl_body_color */
                body .$unique_block_class .tdb-s-table-body {
                    color: @tabl_body_color;
                }
                /* @tabl_hover_bg */
                body .$unique_block_class .tdb-s-table-body .tdb-s-table-row:hover {
                    background-color: @tabl_hover_bg;
                }
                
                /* @empty_color */
                body .$unique_block_class .tdb-plist-star-empty {
                    color: @empty_color;
                }
                body .$unique_block_class .tdb-plist-star-empty svg {
                    fill: @empty_color;
                }
                /* @full_color */
                body .$unique_block_class .tdb-plist-star-full,
                body .$unique_block_class .tdb-plist-star-half {
                    color: @full_color;
                }
                body .$unique_block_class .tdb-plist-star-full svg,
                body .$unique_block_class .tdb-plist-star-half svg {
                    fill: @full_color;
                }
                
                /* @opt_bg */
                body .$unique_block_class .tdb-s-table-options-list {
                    background-color: @opt_bg;
                }
                /* @opt_shadow */
                @media (min-width: 1019px) {
                    body .$unique_block_class .tdb-s-table-options-list {
                        box-shadow: @opt_shadow;
                    }
                }
                /* @opt_border_color */
                body .$unique_block_class .tdb-s-tol-sep {
                    background-color: @opt_border_color;
                }
                /* @opt_item_color */
                body .$unique_block_class .tdb-s-table-col-options .tdb-s-tol-item:not(.tdb-s-tol-item-red) {
                    color: @opt_item_color;
                }
                /* @opt_item_color_h */
                body .$unique_block_class .tdb-s-table-col-options .tdb-s-tol-item:not(.tdb-s-tol-item-red):hover {
                    color: @opt_item_color_h;
                }
                /* @opt_del_color */
                body .$unique_block_class .tdb-s-table-col-options .tdb-s-tol-item-red {
                    color: @opt_del_color;
                }
                /* @opt_del_color_h */
                body .$unique_block_class .tdb-s-table-col-options .tdb-s-tol-item-red:hover {
                    color: @opt_del_color_h;
                }
                /* @pag_bg */
                body .$unique_block_class .tdb-s-pagination-item:not(.tdb-s-pagination-active) {
                    background-color: @pag_bg;
                }
                /* @pag_bg_h */
                body .$unique_block_class .tdb-s-pagination-item:hover:not(.tdb-s-pagination-dots):not(.tdb-s-pagination-active) {
                    background-color: @pag_bg_h;
                }
                /* @pag_color */
                body .$unique_block_class .tdb-s-pagination-item:not(.tdb-s-pagination-active) {
                    color: @pag_color;
                }
                /* @pag_color_h */
                body .$unique_block_class .tdb-s-pagination-item:hover:not(.tdb-s-pagination-dots):not(.tdb-s-pagination-active) {
                    color: @pag_color_h;
                }
                /* @pag_color_a */
                body .$unique_block_class .tdb-s-pagination-item.tdb-s-pagination-active {
                    color: @pag_color_h;
                }
                
                /* @modal_bg */
                body .tdb-plist-confirm-modal-$unique_block_class .tdb-s-modal {
                    background-color: @modal_bg;
                }
                /* @modal_overlay_solid */
                body .tdb-plist-confirm-modal-$unique_block_class .tdb-s-modal-bg {
                    background-color: @modal_overlay_solid;
                }
                /* @modal_overlay_gradient */
                body .tdb-plist-confirm-modal-$unique_block_class .tdb-s-modal-bg {
                    @modal_overlay_gradient
                }
                /* @modal_sep */
                body .tdb-plist-confirm-modal-$unique_block_class .tdb-s-modal-header {
                    border-bottom-color: @modal_sep;
                }
                body .tdb-plist-confirm-modal-$unique_block_class .tdb-s-modal-footer {
                    border-top-color: @modal_sep;
                }
                /* @modal_shadow */
                body .tdb-plist-confirm-modal-$unique_block_class .tdb-s-modal {
                    box-shadow: @modal_shadow;
                }
                /* @modal_title */
                body .tdb-plist-confirm-modal-$unique_block_class h3.tdb-s-modal-title {
                    color: @modal_title;
                }
                /* @modal_close */
                body .tdb-plist-confirm-modal-$unique_block_class .tdb-s-modal-header .tdb-s-modal-close {
                    fill: @modal_close;
                }
                /* @modal_body */
                body .tdb-plist-confirm-modal-$unique_block_class .tdb-s-modal-txt {
                    color: @modal_body;
                }
                
                /* @btn_color */
                body .$unique_block_class .tdb-s-btn,
                body .tdb-plist-confirm-modal-$unique_block_class .tdb-s-btn {
                    color: @btn_color;
                }
                /* @btn_color_h */
                body .$unique_block_class .tdb-s-btn:hover,
                body .tdb-plist-confirm-modal-$unique_block_class .tdb-s-btn:hover {
                    color: @btn_color_h;
                }
                /* @btn_bg_h */
                body .$unique_block_class .tdb-s-btn:not(.tdb-s-btn-hollow):hover,
                body .tdb-plist-confirm-modal-$unique_block_class .tdb-s-btn:not(.tdb-s-btn-hollow):hover {
                    background-color: @btn_bg_h;
                }
                body .$unique_block_class .tdb-s-btn-hollow:hover,
                body .tdb-plist-confirm-modal-$unique_block_class .tdb-s-btn-hollow:hover {
                    border-color: @btn_bg_h;
                }
                
                /* @notif_info_color */
                body .$unique_block_class .tdb-s-notif-info {
                    color: @notif_info_color;
                }
                /* @notif_info_bg */
                body .$unique_block_class .tdb-s-notif-info {
                    background-color: @notif_info_bg;
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
                body .$unique_block_class .tdb-s-table-col,
                body .tdb-plist-confirm-modal-$unique_block_class .tdb-s-modal {
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
        $res_ctx->load_settings_raw( 'style_general_tdb_posts_list', 1 );
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $res_ctx->load_settings_raw( 'style_general_tdb_posts_list_composer', 1 );
        }



        /*-- LAYOUT -- */
        // inputs border size
        $all_input_border = $res_ctx->get_shortcode_att('all_input_border');
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
        if( $input_radius != '' && is_numeric( $input_radius ) ) {
            $res_ctx->load_settings_raw( 'input_radius', $input_radius . 'px' );
        }

        // images width
        $img_width = $res_ctx->get_shortcode_att('img_width');
        if( $img_width != '' && is_numeric( $img_width ) ) {
            $res_ctx->load_settings_raw( 'img_width', $img_width . 'px' );
        }
        // images height
        $img_height = $res_ctx->get_shortcode_att('img_height');
        if( $img_height != '' && is_numeric( $img_height ) ) {
            $res_ctx->load_settings_raw( 'img_height', $img_height . 'px' );
        }


        // table options border radius
        $opt_radius = $res_ctx->get_shortcode_att('opt_radius');
        $res_ctx->load_settings_raw( 'opt_radius', $opt_radius );
        if( $opt_radius != '' && is_numeric( $opt_radius ) ) {
            $res_ctx->load_settings_raw( 'opt_radius', $opt_radius . 'px' );
        }


        // modal width
        $modal_width = $res_ctx->get_shortcode_att('modal_width');
        $res_ctx->load_settings_raw( 'modal_width', $modal_width );
        if( $modal_width != '' && is_numeric( $modal_width ) ) {
            $res_ctx->load_settings_raw( 'modal_width', $modal_width . 'px' );
        }

        // modal border radius
        $modal_radius = $res_ctx->get_shortcode_att('modal_radius');
        $res_ctx->load_settings_raw( 'modal_radius', $modal_radius );
        if( $modal_radius != '' && is_numeric( $modal_radius ) ) {
            $res_ctx->load_settings_raw( 'modal_radius', $modal_radius . 'px' );
        }


        // buttons border radius
        $btn_radius = $res_ctx->get_shortcode_att('btn_radius');
        $res_ctx->load_settings_raw( 'btn_radius', $btn_radius );
        if( $btn_radius != '' && is_numeric( $btn_radius ) ) {
            $res_ctx->load_settings_raw( 'btn_radius', $btn_radius . 'px' );
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
        $res_ctx->load_settings_raw( 'a_color_h', $res_ctx->get_shortcode_att('a_color_h') );
        
        $res_ctx->load_settings_raw( 'input_color', $res_ctx->get_shortcode_att('input_color') );
        $res_ctx->load_settings_raw( 'input_place_color', $res_ctx->get_shortcode_att('input_place_color') );
        $res_ctx->load_settings_raw( 'input_bg', $res_ctx->get_shortcode_att('input_bg') );
        $all_input_border_color = $res_ctx->get_shortcode_att('all_input_border_color');
        if( $all_input_border_color != '' ) {
            $res_ctx->load_settings_raw( 'all_input_border_color', $all_input_border_color );
            $res_ctx->load_settings_raw( 'input_select2_outline_color', td_util::hex2rgba($all_input_border_color, 0.18));
        } else {
            $res_ctx->load_settings_raw( 'all_input_border_color', '#D7D8DE' );
        }

        $res_ctx->load_settings_raw( 'tabl_border_color', $res_ctx->get_shortcode_att('tabl_border_color') );
        $res_ctx->load_settings_raw( 'tabl_head_color', $res_ctx->get_shortcode_att('tabl_head_color') );
        $res_ctx->load_settings_raw( 'tabl_body_color', $res_ctx->get_shortcode_att('tabl_body_color') );
        $res_ctx->load_settings_raw( 'tabl_hover_bg', $res_ctx->get_shortcode_att('tabl_hover_bg') );

        $res_ctx->load_settings_raw('full_color', $res_ctx->get_shortcode_att('full_color'));
        $res_ctx->load_settings_raw('empty_color', $res_ctx->get_shortcode_att('empty_color'));

        $res_ctx->load_settings_raw( 'opt_bg', $res_ctx->get_shortcode_att('opt_bg') );
        $res_ctx->load_shadow_settings( 4, 0, 0, 0, 'rgba(0, 0, 0, 0.12)', 'opt_shadow' );
        $res_ctx->load_settings_raw( 'opt_border_color', $res_ctx->get_shortcode_att('opt_border_color') );
        $res_ctx->load_settings_raw( 'opt_item_color', $res_ctx->get_shortcode_att('opt_item_color') );
        $res_ctx->load_settings_raw( 'opt_item_color_h', $res_ctx->get_shortcode_att('opt_item_color_h') );
        $res_ctx->load_settings_raw( 'opt_del_color', $res_ctx->get_shortcode_att('opt_del_color') );
        $res_ctx->load_settings_raw( 'opt_del_color_h', $res_ctx->get_shortcode_att('opt_del_color_h') );
        $res_ctx->load_settings_raw( 'pag_bg', $res_ctx->get_shortcode_att('pag_bg') );
        $res_ctx->load_settings_raw( 'pag_bg_h', $res_ctx->get_shortcode_att('pag_bg_h') );
        $res_ctx->load_settings_raw( 'pag_color', $res_ctx->get_shortcode_att('pag_color') );
        $res_ctx->load_settings_raw( 'pag_color_h', $res_ctx->get_shortcode_att('pag_color_h') );
        $res_ctx->load_settings_raw( 'pag_color_a', $res_ctx->get_shortcode_att('pag_color_a') );

        $res_ctx->load_settings_raw( 'modal_bg', $res_ctx->get_shortcode_att('modal_bg') );
        $res_ctx->load_color_settings( 'modal_overlay', 'modal_overlay_solid', 'modal_overlay_gradient', '', '' );
        $res_ctx->load_shadow_settings( 4, 0, 2, 0, 'rgba(0, 0, 0, .12)', 'modal_shadow' );
        $res_ctx->load_settings_raw( 'modal_sep', $res_ctx->get_shortcode_att('modal_sep') );
        $res_ctx->load_settings_raw( 'modal_title', $res_ctx->get_shortcode_att('modal_title') );
        $res_ctx->load_settings_raw( 'modal_close', $res_ctx->get_shortcode_att('modal_close') );
        $res_ctx->load_settings_raw( 'modal_body', $res_ctx->get_shortcode_att('modal_body') );

        $res_ctx->load_settings_raw( 'btn_color', $res_ctx->get_shortcode_att('btn_color') );
        $res_ctx->load_settings_raw( 'btn_color_h', $res_ctx->get_shortcode_att('btn_color_h') );
        $res_ctx->load_settings_raw( 'btn_bg_h', $res_ctx->get_shortcode_att('btn_bg_h') );

        $notif_info_color = $res_ctx->get_shortcode_att('notif_info_color');
        $res_ctx->load_settings_raw( 'notif_info_color', $notif_info_color );
        if( !empty( $notif_info_color ) ) {
            $res_ctx->load_settings_raw('notif_info_bg', td_util::hex2rgba($notif_info_color, 0.08));
        }

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

    function check_custom_column() {

    }
    function render( $atts, $content = null ) {
        parent::render( $atts ); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query)


        $buffy = ''; //output buffer

        if( !is_user_logged_in() && !(td_util::tdc_is_live_editor_ajax() || td_util::tdc_is_live_editor_iframe()) ) {
            return $buffy;
        }
        
        // what to show in composer
        $show_in_composer = $this->get_att('show_version');


        // currently logged in user
        $current_user = wp_get_current_user();
		$is_current_user_admin = in_array('administrator', $current_user->roles);


        // plans add limits
        $add_limit_def = $this->get_att('limit_def');
        $add_new_posts_limit = $add_limit_def != '' ? $add_limit_def : -1;

        if( defined( 'TD_SUBSCRIPTION' ) && method_exists( 'tds_util', 'is_user_subscribed_to_plan' ) && $add_new_posts_limit > -1 ) {
            for ($i = 0; $i < 5; $i++) {
                $plan_ids = explode(',', $this->get_att('limit_plans_' . $i . '_id'));
                $plan_limit = $this->get_att('limit_plans_' . $i . '_limit') != '' ? $this->get_att('limit_plans_' . $i . '_limit') : -1;

                foreach ( $plan_ids as $plan_id ) {
                    if( tds_util::is_user_subscribed_to_plan( $current_user->ID, $plan_id ) ) {
                        $add_new_posts_limit = $plan_limit == -1 ? $plan_limit : max($add_new_posts_limit, $plan_limit);
                    }
                }
            }
        }


        // show notifications in composer
        $show_notif_in_composer = $this->get_att('show_notif');


        $render_options = array(
            'postType' => $this->get_att('post_type')!= '' ? $this->get_att('post_type') : 'post',
            'linkedPostType' => $this->get_att('linked_post_type'),
            'showAllPosts' => $this->get_att('all_posts') != '',
            'allowPublish' => $this->get_att('allow_publish') != '',
            'allowDelete' => $this->get_att('allow_delete') != '',
            'addNewPostLimit' => $add_new_posts_limit,
            'limitNotifTxt' => $this->get_att('limit_notif'),
            'columns' => $this->get_att( 'display_columns' ),

            'fullStarIcon' => $this->get_att( 'tdicon_full' ),
            'halfStarIcon' => $this->get_att( 'tdicon_half' ),
            'emptyStarIcon' => $this->get_att( 'tdicon_empty' ),

            'mainFormURL' => $this->get_att('form_1'),
            'mainFormAddTxt' => $this->get_att('form_1_txt_a') != '' ? $this->get_att('form_1_txt_a') : __td( 'Add new post', TD_THEME_NAME ),
            'mainFormEditTxt' => $this->get_att('form_1_txt_e') != '' ? $this->get_att('form_1_txt_e') : __td( 'Edit post', TD_THEME_NAME ),
            'extraForm1URL' => $this->get_att('form_2'),
            'extraForm1EditTxt' => $this->get_att('form_2_txt_e') != '' ? $this->get_att('form_2_txt_e') : 'Edit post 2',
            'extraForm2URL' => $this->get_att('form_3'),
            'extraForm2EditTxt' => $this->get_att('form_3_txt_e') != '' ? $this->get_att('form_3_txt_e') : 'Edit post 3',

            'enablePagination' => $this->get_att('enable_pag') != '',
            'perPage' => $this->get_att('per_page') != '' ? $this->get_att('per_page') : 15,
            'currentPage' => 1,

        );


        $buffy .= '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';

            //get the block css
            $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();


            $buffy .= '<div class="tdb-block-inner td-fix-index tdb-s-content">';
                $buffy .= tdb_posts_list_utils::render_list($render_options, array());
            $buffy .= '</div>';


            if( !( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) ) {
                ob_start();
                ?>
                <script>
                    /* global jQuery:{} */
                    jQuery().ready(function () {

                        let uid = '<?php echo $this->block_uid ?>',
                            $blockObj = jQuery('.<?php echo $this->block_uid ?>');

                        let tdbPostsListItem = new tdbPostsList.item();
                        // block uid
                        tdbPostsListItem.uid = uid;
                        // block object
                        tdbPostsListItem.blockObj = $blockObj;

                        tdbPostsListItem.renderOptions = jQuery.parseJSON('<?php echo json_encode($render_options) ?>');
                        tdbPostsListItem.confirmModals = {
                            'publish': {
                                'title': tdbPostsList._stringToBinary('<?php echo __td('Publish a post', TD_THEME_NAME) ?>'),
                                'body': tdbPostsList._stringToBinary('<?php echo __td( 'Are you sure you want to publish %POST_TITLE%?', TD_THEME_NAME) ?>')
                            },
                            'delete': {
                                'title': tdbPostsList._stringToBinary('<?php echo __td('Delete a post', TD_THEME_NAME) ?>'),
                                'body': tdbPostsList._stringToBinary('<?php echo __td( 'Are you sure you want to delete %POST_TITLE%?', TD_THEME_NAME) ?>')
                            }
                        };

                        tdbPostsList.addItem(tdbPostsListItem);

                    });
                </script>
                <?php
                td_js_buffer::add_to_footer( "\n" . td_util::remove_script_tag( ob_get_clean() ) );
            }

        $buffy .= '</div> <!-- ./block -->';

        return $buffy;
    }

}