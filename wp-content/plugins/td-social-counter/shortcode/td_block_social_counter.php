<?php
/**
 * This is the UI part of the social counter. 009 and 010 use different ui versions
 * User: ra
 * Date: 10/1/2014
 * Time: 11:26 AM
 */


class td_block_social_counter extends td_block {

    static function cssMedia( $res_ctx ) {

        if( TD_THEME_NAME == 'Newspaper' ) {
            /*-- GENERAL -- */
            $res_ctx->load_settings_raw( 'general_style', 1 );

            if( !empty($res_ctx->get_shortcode_att('style')) ) {
                $style_class = explode(' ', $res_ctx->get_shortcode_att('style'));

                $res_ctx->load_settings_raw( 'specific_style_' . $style_class[0], 1 );
            }
        }



        /*-- COLORS -- */
        $res_ctx->load_settings_raw( 'counter_color', $res_ctx->get_shortcode_att('counter_color') );
        $res_ctx->load_settings_raw( 'counter_color_h', $res_ctx->get_shortcode_att('counter_color_h') );

        $res_ctx->load_settings_raw( 'network_color', $res_ctx->get_shortcode_att('network_color') );
        $res_ctx->load_settings_raw( 'network_color_h', $res_ctx->get_shortcode_att('network_color_h') );

        $res_ctx->load_settings_raw( 'btn_color', $res_ctx->get_shortcode_att('btn_color') );
        $res_ctx->load_settings_raw( 'btn_color_h', $res_ctx->get_shortcode_att('btn_color_h') );



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_header' );
        $res_ctx->load_font_settings( 'f_counters' );
        $res_ctx->load_font_settings( 'f_network' );
        $res_ctx->load_font_settings( 'f_btn' );

    }

    public function get_custom_css() {
        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $unique_block_class = $this->block_uid;

        $compiled_css = '';

        $block_title = 'block-title';
        if( TD_THEME_NAME == 'Newspaper' ) {
            $block_title = 'td-block-title';
        }

        $raw_css =
            "<style>
            
                    /* @general_style */
                    .td_block_social_counter {
                        font-family: 'Open Sans', arial, sans-serif;
                        font-weight: bold;
                        font-size: 11px;
                        color: #fff;
                        margin-bottom: 47px;
                    }
                    .td_block_social_counter .td-sp {
                        position: relative;
                    }
                    .td_block_social_counter .td-sp:after {
                        content: '';
                        width: 1px;
                        height: 16px;
                        background-color: rgba(255, 255, 255, 0.1);
                        position: absolute;
                        right: -1px;
                        top: 8px;
                    }
                    .td-social-list {
                        *zoom: 1;
                    }
                    .td-social-list:before,
                    .td-social-list:after {
                        display: table;
                        content: '';
                        line-height: 0;
                    }
                    .td-social-list:after {
                        clear: both;
                    }
                    .td_social_type {
                        width: 100%;
                        margin-bottom: 10px;
                        -webkit-transition: background-color 0.20s cubic-bezier(0, 0, 0.58, 1) 0s;
                        transition: background-color 0.20s cubic-bezier(0, 0, 0.58, 1) 0s;
                    }
                    .td_social_type:last-child {
                        margin-bottom: 0;
                    }
                    .td_social_type:hover .td-social-box {
                        background-color: #222;
                    }
                    .td_social_type .td_social_info {
                        padding: 0 0 0 9px;
                        position: relative;
                        top: -12px;
                    }
                    .td_social_type .td-social-box {
                        height: 32px;
                        position: relative;
                        overflow: hidden;
                    }
                    .td_social_type .td-social-box .td-sp {
                        display: inline-block;
                    }
                    .td_social_type .td_social_number {
                        border-left: 1px solid rgba(255, 255, 255, 0.1);
                        padding-left: 9px;
                    }
                    .td_social_type .td_social_button {
                        float: right;
                        border-left: 1px solid rgba(255, 255, 255, 0.1);
                        padding: 0 14px;
                        margin-top: 8px;
                        top: 9px;
                        height: 16px;
                        line-height: 15px;
                        text-transform: uppercase;
                    }
                    .td_social_type .td_social_button a {
                        color: #fff;
                    }
                    .td_social_type .td_social_button a:after {
                        content: '';
                        display: block;
                        height: 32px;
                        position: absolute;
                        right: 0;
                        top: 0;
                        width: 324px;
                    }
                    @media (min-width: 1019px) and (max-width: 1140px) {
                        .td_social_type .td_social_button a:after {
                            width: 300px;
                        }
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td_social_type .td_social_button a:after {
                            width: 228px;
                        }
                    }
                    @media (max-width: 767px) {
                        .td_social_type .td_social_button a:after {
                            width: 100%;
                        }
                    }
                    .td_social_type .td_social_button a:hover {
                        color: inherit;
                        text-decoration: none !important;
                    }
                    .td_social_type a {
                        color: #fff;
                    }
                    .td_social_facebook .td-social-box {
                        background-color: #516eab;
                    }
                    .td_social_rss .td-social-box {
                        background-color: #ff6600;
                    }
                    .td_social_soundcloud .td-social-box {
                        background-color: #ff5419;
                    }
                    .td_social_twitter .td-social-box {
                        background-color: #29c5f6;
                    }
                    .td_social_vimeo .td-social-box {
                        background-color: #006599;
                    }
                    .td_social_youtube .td-social-box {
                        background-color: #e14e42;
                    }
                    .td_social_instagram .td-social-box {
                        background-color: #417096;
                    }
                    .td_social_pinterest .td-social-box {
                        background-color: #ca212a;
                    }
                    .td_social_tiktok .td-social-box {
                        background-color: #009191;
                    }
                    .td-social-boxed .td_social_type {
                        text-align: center;
                        width: 33.3333%;
                        margin: 0;
                        float: left;
                    }
                    .td-social-boxed .td_social_type .td-social-box {
                        height: 100px;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td-social-boxed .td_social_type .td-social-box {
                            height: 70px;
                        }
                    }
                    .td-social-boxed .td_social_type span {
                        display: block;
                        width: 100%;
                        padding: 0;
                    }
                    .td-social-boxed .td-sp {
                        margin-top: 10px;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td-social-boxed .td-sp {
                            margin-top: 4px;
                        }
                    }
                    .td-social-boxed .td-sp::after {
                        display: none;
                    }
                    .td-social-boxed .td_social_info {
                        font-size: 17px;
                        top: 0;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td-social-boxed .td_social_info {
                            font-size: 13px;
                            top: -12px;
                        }
                    }
                    .td-social-boxed .td_social_info_name {
                        font-size: 13px;
                        font-weight: normal;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td-social-boxed .td_social_info_name {
                            top: -17px;
                            font-size: 10px;
                        }
                    }
                    .td-social-boxed .td_social_button {
                        opacity: 0;
                        position: absolute;
                        height: 100%;
                        margin-top: 0;
                        top: 0;
                    }
                    .td-social-boxed .td_social_button a:after {
                        width: 100%;
                        height: 100%;
                    }
                    .td-social-colored .td_social_facebook .td-sp {
                        background-color: #516eab;
                    }
                    .td-social-colored .td_social_rss .td-sp {
                        background-color: #ff6600;
                    }
                    .td-social-colored .td_social_soundcloud .td-sp {
                        background-color: #ff5419;
                    }
                    .td-social-colored .td_social_twitter .td-sp {
                        background-color: #29c5f6;
                    }
                    .td-social-colored .td_social_vimeo .td-sp {
                        background-color: #006599;
                    }
                    .td-social-colored .td_social_youtube .td-sp {
                        background-color: #e14e42;
                    }
                    .td-social-colored .td_social_instagram .td-sp {
                        background-color: #417096;
                    }
                    .td-social-colored .td_social_pinterest .td-sp {
                        background-color: #ca212a;
                    }
                    .td-social-colored .td_social_tiktok .td-sp {
                        background-color: #009191;
                    }
                    .td-social-font-icons .td-sp {
                        background: none;
                        font-family: 'newspaper', sans-serif;
                        font-size: 14px;
                        text-align: center;
                        font-weight: normal;
                    }
                    .td-social-font-icons .td-sp:before {
                        position: absolute;
                        top: 0;
                        left: 0;
                        right: 0;
                        line-height: 30px;
                    }
                    .td-social-font-icons .td_social_facebook .td-sp:before {
                        content: '\\e818';
                        color: #516eab;
                    }
                    .td-social-font-icons .td_social_rss .td-sp:before {
                        content: '\\e828';
                        color: #ff6600;
                    }
                    .td-social-font-icons .td_social_soundcloud .td-sp:before {
                        content: '\\e82b';
                        color: #ff5419;
                    }
                    .td-social-font-icons .td_social_twitter .td-sp:before {
                        content: '\\e831';
                        color: #29c5f6;
                    }
                    .td-social-font-icons .td_social_vimeo .td-sp:before {
                        content: '\\e832';
                        color: #006599;
                    }
                    .td-social-font-icons .td_social_youtube .td-sp:before {
                        content: '\\e836';
                        color: #e14e42;
                    }
                    .td-social-font-icons .td_social_instagram .td-sp:before {
                        content: '\\e81d';
                        color: #417096;
                    }
                    .td-social-font-icons .td_social_pinterest .td-sp:before {
                        content: '\\e825';
                        color: #ca212a;
                    }
                    .td-social-font-icons .td_social_tiktok .td-sp:before {
                        content: '\\e9d6';
                        color: #009191;
                    }
                    
                    /* @specific_style_style1 */
                    .td-social-style1 .td_social_type .td-social-box {
                        background-color: #222;
                    }
                    .td-social-style1 .td_social_facebook:hover .td-social-box {
                        background-color: #516eab !important;
                    }
                    .td-social-style1 .td_social_rss:hover .td-social-box {
                        background-color: #ff6600 !important;
                    }
                    .td-social-style1 .td_social_soundcloud:hover .td-social-box {
                        background-color: #ff5419 !important;
                    }
                    .td-social-style1 .td_social_twitter:hover .td-social-box {
                        background-color: #29c5f6 !important;
                    }
                    .td-social-style1 .td_social_vimeo:hover .td-social-box {
                        background-color: #006599 !important;
                    }
                    .td-social-style1 .td_social_youtube:hover .td-social-box {
                        background-color: #e14e42 !important;
                    }
                    .td-social-style1 .td_social_instagram:hover .td-social-box {
                        background-color: #417096 !important;
                    }
                    .td-social-style1 .td_social_pinterest:hover .td-social-box {
                        background-color: #ca212a !important;
                    }
                    .td-social-style1 .td_social_tiktok:hover .td-social-box {
                        background-color: #009191 !important;
                    }
                    
                    /* @specific_style_style2 */
                    .td_block_social_counter.td-social-style2 {
                        color: #000;
                    }
                    .td_block_social_counter.td-social-style2 .td_social_type .td-social-box {
                        background-color: transparent;
                        border: 1px solid #ededed;
                    }
                    .td_block_social_counter.td-social-style2 .td_social_type .td_social_button {
                        margin-top: 7px;
                    }
                    .td_block_social_counter.td-social-style2 .td_social_type a {
                        color: #000;
                    }
                    .td_block_social_counter.td-social-style2 .td_social_type a:hover {
                        color: #555;
                    }
                    .td_block_social_counter.td-social-style2 .td_social_type a:hover .td_social_type a {
                        color: #555;
                    }
                    .td_block_social_counter.td-social-style2 .td-sp:after {
                        top: 7px;
                    }
                    .td_block_social_counter.td-social-style2 .td-sp:after {
                        background-color: #000;
                        opacity: 0.1;
                    }
                    .td_block_social_counter.td-social-style2 .td_social_button {
                        border-color: #ededed;
                    }
                    
                    /* @specific_style_style3 */
                    .td_block_social_counter.td-social-style3 {
                        color: #000;
                    }
                    .td_block_social_counter.td-social-style3 .td_social_type a {
                        color: #000;
                    }
                    .td_block_social_counter.td-social-style3 .td_social_type .td_social_button {
                        border-color: #ededed;
                        margin-top: 13px;
                        padding: 0;
                        border: none;
                    }
                    .td_block_social_counter.td-social-style3 .td_social_type .td_social_button a:after {
                        height: 40px;
                    }
                    .td_block_social_counter.td-social-style3 .td_social_type .td_social_info {
                        top: -15px;
                    }
                    .td_block_social_counter.td-social-style3 .td_social_type:hover {
                        color: #555;
                    }
                    .td_block_social_counter.td-social-style3 .td_social_type:hover .td_social_type a {
                        color: #555;
                    }
                    .td_block_social_counter.td-social-style3 .td_social_type:hover .td-social-box {
                        background-color: transparent;
                    }
                    .td_block_social_counter.td-social-style3 .td-social-box {
                        background-color: transparent;
                        height: 40px;
                    }
                    .td_block_social_counter.td-social-style3 .td-sp {
                        width: 40px;
                        height: 40px;
                        border-radius: 40px;
                        margin-right: 5px;
                    }
                    .td_block_social_counter.td-social-style3 .td-sp:after {
                        display: none;
                        top: 7px;
                    }
                    .td_block_social_counter.td-social-style3 .td_social_facebook .td-sp {
                        background-position: -17px -17px;
                    }
                    .td_block_social_counter.td-social-style3 .td_social_rss .td-sp {
                        background-position: -16px -121px;
                    }
                    .td_block_social_counter.td-social-style3 .td_social_soundcloud .td-sp {
                        background-position: -17px -173px;
                    }
                    .td_block_social_counter.td-social-style3 .td_social_twitter .td-sp {
                        background-position: -16px -431px;
                    }
                    .td_block_social_counter.td-social-style3 .td_social_vimeo .td-sp {
                        background-position: -16px -327px;
                    }
                    .td_block_social_counter.td-social-style3 .td_social_youtube .td-sp {
                        background-position: -15px -380px;
                    }
                    .td_block_social_counter.td-social-style3 .td_social_instagram .td-sp {
                        background-position: -16px -224px;
                    }
                    .td_block_social_counter.td-social-style3 .td_social_pinterest .td-sp {
                        background-position: -16px -69px;
                    }
                    .td_block_social_counter.td-social-style3 .td_social_tiktok .td-sp {
                        background-position: -15px -738px
                    }
                    
                    /* @specific_style_style4 */
                    .td_block_social_counter.td-social-style4 {
                        color: #000;
                    }
                    .td_block_social_counter.td-social-style4 .td_social_type a {
                        color: #000;
                    }
                    .td_block_social_counter.td-social-style4 .td_social_type .td_social_button {
                        border-color: #ededed;
                        margin-top: 13px;
                        padding: 0;
                        border: none;
                    }
                    .td_block_social_counter.td-social-style4 .td_social_type .td_social_button a:after {
                        height: 40px;
                    }
                    .td_block_social_counter.td-social-style4 .td_social_type .td_social_info {
                        top: -15px;
                    }
                    .td_block_social_counter.td-social-style4 .td_social_type:hover {
                        color: #555;
                    }
                    .td_block_social_counter.td-social-style4 .td_social_type:hover .td_social_type a {
                        color: #555;
                    }
                    .td_block_social_counter.td-social-style4 .td_social_type:hover .td-social-box {
                        background-color: transparent;
                    }
                    .td_block_social_counter.td-social-style4 .td_social_type .td-social-box {
                        background-color: transparent;
                        height: 40px;
                    }
                    .td_block_social_counter.td-social-style4 .td_social_type .td-sp {
                        width: 40px;
                        height: 40px;
                        margin-right: 5px;
                    }
                    .td_block_social_counter.td-social-style4 .td_social_type .td-sp:after {
                        display: none;
                        top: 7px;
                    }
                    .td_block_social_counter.td-social-style4 .td_social_facebook .td-sp {
                        background-position: -17px -17px;
                    }
                    .td_block_social_counter.td-social-style4 .td_social_rss .td-sp {
                        background-position: -16px -121px;
                    }
                    .td_block_social_counter.td-social-style4 .td_social_soundcloud .td-sp {
                        background-position: -17px -173px;
                    }
                    .td_block_social_counter.td-social-style4 .td_social_twitter .td-sp {
                        background-position: -16px -431px;
                    }
                    .td_block_social_counter.td-social-style4 .td_social_vimeo .td-sp {
                        background-position: -16px -327px;
                    }
                    .td_block_social_counter.td-social-style4 .td_social_youtube .td-sp {
                        background-position: -15px -380px;
                    }
                    .td_block_social_counter.td-social-style4 .td_social_instagram .td-sp {
                        background-position: -16px -224px;
                    }
                    .td_block_social_counter.td-social-style4 .td_social_pinterest .td-sp {
                        background-position: -16px -69px;
                    }
                    .td_block_social_counter.td-social-style4 .td_social_tiktok .td-sp {
                        background-position: -15px -738px
                    }
                    
                    /* @specific_style_style5 */
                    .td-social-style5 .td-social-list {
                        margin-left: -8px;
                        margin-right: -8px;
                    }
                    @media (max-width: 1018px) {
                        .td-social-style5 .td-social-list {
                            margin-left: -2px;
                            margin-right: -2px;
                        }
                    }
                    .td-social-style5 .td_social_type .td-social-box {
                        margin: 0 8px 16px;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td-social-style5 .td_social_type .td-social-box {
                            margin: 0 2px 4px;
                        }
                    }
                    @media (max-width: 767px) {
                        .td-social-style5 .td_social_type .td-social-box {
                            margin: 0 2px 4px;
                        }
                    }
                    
                    /* @specific_style_style7 */
                    .td-social-style7 .td-social-list {
                        margin-left: -8px;
                        margin-right: -8px;
                        margin-bottom: -16px;
                    }
                    @media (max-width: 1018px) {
                        .td-social-style7 .td-social-list {
                            margin-left: -2px;
                            margin-right: -2px;
                            margin-bottom: -4px;
                        }
                    }
                    .td-social-style7 .td_social_type .td-social-box {
                        background-color: #222;
                        margin: 0 8px 16px;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td-social-style7 .td_social_type .td-social-box {
                            margin: 0 2px 4px;
                        }
                    }
                    @media (max-width: 767px) {
                        .td-social-style7 .td_social_type .td-social-box {
                            margin: 0 2px 4px;
                        }
                    }
                    .td-social-style7 .td_social_facebook:hover .td-social-box {
                        background-color: #516eab !important;
                    }
                    .td-social-style7 .td_social_rss:hover .td-social-box {
                        background-color: #ff6600 !important;
                    }
                    .td-social-style7 .td_social_soundcloud:hover .td-social-box {
                        background-color: #ff5419 !important;
                    }
                    .td-social-style7 .td_social_twitter:hover .td-social-box {
                        background-color: #29c5f6 !important;
                    }
                    .td-social-style7 .td_social_vimeo:hover .td-social-box {
                        background-color: #006599 !important;
                    }
                    .td-social-style7 .td_social_youtube:hover .td-social-box {
                        background-color: #e14e42 !important;
                    }
                    .td-social-style7 .td_social_instagram:hover .td-social-box {
                        background-color: #417096 !important;
                    }
                    .td-social-style7 .td_social_pinterest:hover .td-social-box {
                        background-color: #ca212a !important;
                    }
                    .td-social-style7 .td_social_tiktok:hover .td-social-box {
                        background-color: #009191 !important;
                    }
                    
                    /* @specific_style_style8 */
                    .td_block_social_counter.td-social-style8 {
                        color: #000;
                    }
                    .td_block_social_counter.td-social-style8 .td-social-list {
                        margin-left: -8px;
                        margin-right: -8px;
                    }
                    @media (max-width: 767px) {
                        .td_block_social_counter.td-social-style8 .td-social-list {
                            margin-left: -2px;
                            margin-right: -2px;
                        }
                    }
                    .td_block_social_counter.td-social-style8 .td_social_type .td-social-box {
                        background-color: transparent;
                        border: 1px solid #ededed;
                        margin: 0 8px 16px;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td_block_social_counter.td-social-style8 .td_social_type .td-social-box {
                            margin: 0 2px 4px;
                        }
                    }
                    @media (max-width: 767px) {
                        .td_block_social_counter.td-social-style8 .td_social_type .td-social-box {
                            margin: 0 2px 4px;
                        }
                    }
                    .td_block_social_counter.td-social-style8 .td_social_type .td_social_button {
                        margin-top: 7px;
                    }
                    .td_block_social_counter.td-social-style8 .td_social_type a {
                        color: #000;
                    }
                    .td_block_social_counter.td-social-style8 .td_social_type:hover {
                        color: #555;
                    }
                    .td_block_social_counter.td-social-style8 .td_social_type:hover .td_social_type a {
                        color: #555;
                    }
                    .td_block_social_counter.td-social-style8 .td-sp {
                        font-size: 28px;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td_block_social_counter.td-social-style8 .td-sp {
                            font-size: 21px;
                        }
                    }
                    @media (max-width: 767px) {
                        .td_block_social_counter.td-social-style8 .td-sp {
                            font-size: 28px;
                        }
                    }
                    .td_block_social_counter.td-social-style8 .td-sp:after {
                        top: 7px;
                    }
                    .td_block_social_counter.td-social-style8 .td-sp-twitter {
                        font-size: 22px;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td_block_social_counter.td-social-style8 .td-sp-twitter {
                            font-size: 18px;
                        }
                    }
                    .td_block_social_counter.td-social-style8 .td-sp:after {
                        background-color: #000;
                        opacity: 0.1;
                    }
                    .td_block_social_counter.td-social-style8 .td_social_button {
                        border-color: #ededed;
                    }
                    
                    /* @specific_style_style9 */
                    .td_block_social_counter.td-social-style9 {
                        color: #000;
                    }
                    .td_block_social_counter.td-social-style9 .td_social_type {
                        width: 25%;
                    }
                    .td_block_social_counter.td-social-style9 .td_social_type a {
                        color: #000;
                    }
                    .td_block_social_counter.td-social-style9 .td_social_type .td_social_button {
                        border-color: #ededed;
                        padding: 0;
                        border: none;
                    }
                    .td_block_social_counter.td-social-style9 .td_social_type:hover {
                        color: #555;
                    }
                    .td_block_social_counter.td-social-style9 .td_social_type:hover .td_social_type a {
                        color: #555;
                    }
                    .td_block_social_counter.td-social-style9 .td_social_type:hover .td-sp {
                        -webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
                        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
                    }
                    .td_block_social_counter.td-social-style9 .td_social_type .td_social_info {
                        font-size: 15px;
                        top: 5px;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td_block_social_counter.td-social-style9 .td_social_type .td_social_info {
                            font-size: 12px;
                            top: 0;
                        }
                    }
                    .td-social-style9 .td_social_type .td_social_info_name {
                        font-size: 11px;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td_block_social_counter.td-social-style9 .td_social_type .td_social_info_name {
                            font-size: 10px;
                            top: -5px;
                        }
                    }
                    .td_block_social_counter.td-social-style9 .td_social_type .td-social-box {
                        background-color: transparent;
                        height: 130px;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td_block_social_counter.td-social-style9 .td_social_type .td-social-box {
                            height: 90px;
                        }
                    }
                    .td-social-style9 .td-sp {
                        -webkit-transition: box-shadow 0.3s ease;
                        transition: box-shadow 0.3s ease;
                        width: 64px;
                        height: 64px;
                        border-radius: 64px;
                        margin: 0;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td_block_social_counter.td-social-style9 .td-sp {
                            width: 48px;
                            height: 48px;
                            border-radius: 48px;
                        }
                    }
                    .td_block_social_counter.td-social-style9 .td-sp:after {
                        display: none;
                    }
                    .td_block_social_counter.td-social-style9 .td_social_facebook .td-sp {
                        background-position: -5px -5px;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td_block_social_counter.td-social-style9 .td_social_facebook .td-sp {
                            background-position: -13px -13px;
                        }
                    }
                    .td_block_social_counter.td-social-style9 .td_social_rss .td-sp {
                        background-position: -4px -109px;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td_block_social_counter.td-social-style9 .td_social_rss .td-sp {
                            background-position: -12px -117px;
                        }
                    }
                    .td_block_social_counter.td-social-style9 .td_social_soundcloud .td-sp {
                        background-position: -5px -161px;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td_block_social_counter.td-social-style9 .td_social_soundcloud .td-sp {
                            background-position: -13px -169px;
                        }
                    }
                    .td_block_social_counter.td-social-style9 .td_social_twitter .td-sp {
                        background-position: -4px -419px;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td_block_social_counter.td-social-style9 .td_social_twitter .td-sp {
                            background-position: -12px -427px;
                        }
                    }
                    .td_block_social_counter.td-social-style9 .td_social_vimeo .td-sp {
                        background-position: -4px -315px;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td_block_social_counter.td-social-style9 .td_social_vimeo .td-sp {
                            background-position: -12px -323px;
                        }
                    }
                    .td_block_social_counter.td-social-style9 .td_social_youtube .td-sp {
                        background-position: -3px -368px;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td_block_social_counter.td-social-style9 .td_social_youtube .td-sp {
                            background-position: -11px -376px;
                        }
                    }
                    .td_block_social_counter.td-social-style9 .td_social_instagram .td-sp {
                        background-position: -4px -212px;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td_block_social_counter.td-social-style9 .td_social_instagram .td-sp {
                            background-position: -12px -220px;
                        }
                    }
                    .td_block_social_counter.td-social-style9 .td_social_pinterest .td-sp {
                        background-position: -5px -56px;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td_block_social_counter.td-social-style9 .td_social_pinterest .td-sp {
                            background-position: -13px -65px;
                        }
                    }
                    .td_block_social_counter.td-social-style9 .td_social_tiktok .td-sp {
                        background-position: -5px -726px;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td_block_social_counter.td-social-style9 .td_social_tiktok .td-sp {
                            background-position: -13px -732px;
                        }
                    }
                    
                    /* @specific_style_style10 */
                    .td_block_social_counter.td-social-style10 {
                        color: #000;
                    }
                    .td_block_social_counter.td-social-style10 .td_social_type {
                        width: 25%;
                    }
                    .td_block_social_counter.td-social-style10 .td_social_type a {
                        color: #000;
                    }
                    .td_block_social_counter.td-social-style10 .td_social_type .td_social_button {
                        border-color: #ededed;
                        padding: 0;
                        border: none;
                    }
                    .td_block_social_counter.td-social-style10 .td_social_type:hover {
                        color: #555;
                    }
                    .td_block_social_counter.td-social-style10 .td_social_type:hover .td_social_type a {
                        color: #555;
                    }
                    .td_block_social_counter.td-social-style10 .td_social_type:hover .td-sp {
                        -webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3)
                        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
                    }
                    .td_block_social_counter.td-social-style10 .td_social_type .td_social_info {
                        font-size: 15px;
                        top: 5px;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td_block_social_counter.td-social-style10 .td_social_type .td_social_info {
                            font-size: 12px;
                            top: 0;
                        }
                    }
                    .td_block_social_counter.td-social-style10 .td_social_type .td_social_info_name {
                        font-size: 11px;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td_block_social_counter.td-social-style10 .td_social_type .td_social_info_name {
                            font-size: 10px;
                            top: -5px;
                        }
                    }
                    .td_block_social_counter.td-social-style10 .td_social_type .td-social-box {
                        background-color: transparent;
                        height: 130px;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td_block_social_counter.td-social-style10 .td_social_type .td-social-box {
                            height: 90px;
                        }
                    }
                    .td_block_social_counter.td-social-style10 .td-sp {
                        -webkit-transition: box-shadow 0.3s ease;
                        transition: box-shadow 0.3s ease;
                        width: 64px;
                        height: 64px;
                        margin: 0;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td_block_social_counter.td-social-style10 .td-sp {
                            width: 48px;
                            height: 48px;
                        }
                    }
                    .td_block_social_counter.td-social-style10 .td-sp:after {
                        display: none;
                    }
                    .td_block_social_counter.td-social-style10 .td_social_facebook .td-sp {
                        background-position: -5px -5px;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td_block_social_counter.td-social-style10 .td_social_facebook .td-sp {
                            background-position: -13px -13px;
                        }
                    }
                    .td_block_social_counter.td-social-style10 .td_social_rss .td-sp {
                        background-position: -4px -109px;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td_block_social_counter.td-social-style10 .td_social_rss .td-sp {
                            background-position: -12px -117px;
                        }
                    }
                    .td_block_social_counter.td-social-style10 .td_social_soundcloud .td-sp {
                        background-position: -5px -161px;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td_block_social_counter.td-social-style10 .td_social_soundcloud .td-sp {
                            background-position: -13px -169px;
                        }
                    }
                    .td_block_social_counter.td-social-style10 .td_social_twitter .td-sp {
                        background-position: -4px -419px;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td_block_social_counter.td-social-style10 .td_social_twitter .td-sp {
                            background-position: -12px -427px;
                        }
                    }
                    .td_block_social_counter.td-social-style10 .td_social_vimeo .td-sp {
                        background-position: -4px -315px;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td_block_social_counter.td-social-style10 .td_social_vimeo .td-sp {
                            background-position: -12px -323px;
                        }
                    }
                    .td_block_social_counter.td-social-style10 .td_social_youtube .td-sp {
                        background-position: -3px -368px;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td_block_social_counter.td-social-style10 .td_social_youtube .td-sp {
                            background-position: -11px -376px;
                        }
                    }
                    .td_block_social_counter.td-social-style10 .td_social_instagram .td-sp {
                        background-position: -4px -212px;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td_block_social_counter.td-social-style10 .td_social_instagram .td-sp {
                            background-position: -12px -220px;
                        }
                    }
                    .td_block_social_counter.td-social-style10 .td_social_pinterest .td-sp {
                        background-position: -5px -56px;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td_block_social_counter.td-social-style10 .td_social_pinterest .td-sp {
                            background-position: -13px -65px;
                        }
                    }
                    .td_block_social_counter.td-social-style10 .td_social_tiktok .td-sp {
                        background-position: -5px -726px;
                    }
                    @media (min-width: 768px) and (max-width: 1018px) {
                        .td_block_social_counter.td-social-style10 .td_social_tiktok .td-sp {
                            background-position: -13px -732px;
                        }
                    }
                    
            
                    /* @counter_color */
                    div.$unique_block_class .td_social_info_counter {
                        color: @counter_color;
                    }
                    /* @counter_color_h */
                    div.$unique_block_class .td_social_type:hover .td_social_info_counter {
                        color: @counter_color_h;
                    }
                    
                    /* @network_color */
                    div.$unique_block_class .td_social_info_name {
                        color: @network_color;
                    }
                    /* @network_color_h */
                    div.$unique_block_class .td_social_type:hover .td_social_info_name {
                        color: @network_color_h;
                    }
                    
                    /* @btn_color */
                    div.$unique_block_class .td_social_button a {
                        color: @btn_color;
                    }
                    /* @btn_color_h */
                    div.$unique_block_class .td_social_type:hover .td_social_button a {
                        color: @btn_color_h;
                    }
            


                    /* @f_header */
                    div.$unique_block_class .$block_title a,
                    div.$unique_block_class .$block_title span {
                        @f_header
                    }
                    /* @f_counters */
                    div.$unique_block_class .td_social_info_counter {
                        @f_counters
                    }
                    /* @f_network */
                    div.$unique_block_class .td_social_info_name {
                        @f_network
                    }
                    /* @f_btn */
                    div.$unique_block_class .td_social_button {
                        @f_btn
                    }
                    
                </style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();

        return $compiled_css;
    }

	function __construct() {
		// disable_loop_block_features  @added on 26/4/2016 by ra. We use method_exists to be backwards compatible with older theme versions
		if (method_exists($this, 'disable_loop_block_features')) {
			$this->disable_loop_block_features();
		}
	}


	function render($atts, $content = null){
        parent::render($atts);

        $td_social_api = new td_social_api();

        extract(shortcode_atts(
            array(
                'icon_style' => '1', //not used
                'icon_size' => '32', //not yet used
                'custom_title' => '',
                'header_color' => '',
                'open_in_new_window' => '',
                'social_rel' => ''
            ), $atts)
        );

        $td_target = '';
        if (!empty($open_in_new_window)) {
            $td_target = ' target="_blank"';
        }
        $td_social_rel = '';
        if (!empty($atts['social_rel'])) {
            $td_social_rel = 'rel="' . $atts['social_rel'] . '"';
        }
	    // styles type / additional classes
	    $additional_classes = array();
	    if(!empty($atts['style'])) {
	        $additional_classes  []= 'td-social-' . $atts['style'];
        }

        $buffy = '';

        $socialEmpty = true;
		$socialBuffy = '';

        foreach (td_social_icons::$td_social_icons_array as $td_social_id => $td_social_name) {
            if (!empty($atts[$td_social_id])) {

                $socialEmpty = false;

                if ($td_social_id === 'vimeo') {
                    continue;
                }
                
                $access_token = '';
                if (array_key_exists($td_social_id . '_access_token', $atts)) {
                    $access_token = $atts[$td_social_id . '_access_token'];
                }
                $social_network_meta = $this->get_social_network_meta($td_social_id, $atts[$td_social_id], $td_social_api, $access_token);

                //manual likes/followers count
                if (!empty($atts['manual_count_' . $td_social_id])) {
                    $social_network_meta['api'] = $atts['manual_count_' . $td_social_id];
                }

                if ($td_social_id === 'rss' && !empty($atts['rss_url'])) {
                    $social_network_meta['url'] = $atts['rss_url'];
                }

                $socialBuffy .= '<div class="td_social_type td-pb-margin-side td_social_' . $td_social_id . '">';
                $socialBuffy .= '<div class="td-social-box">';
                    $socialBuffy .= '<div class="td-sp td-sp-' . $td_social_id . '"></div>';
                    $socialBuffy .= '<span class="td_social_info td_social_info_counter">' . number_format($social_network_meta['api']) . '</span>';
                    $socialBuffy .= '<span class="td_social_info td_social_info_name">' . $social_network_meta['text'] . '</span>';
                    $socialBuffy .= '<span class="td_social_button"><a href="' . $social_network_meta['url'] . '" ' . $td_target . $td_social_rel. ' >' .
                        $social_network_meta['button'] . '</a></span>';
                    $socialBuffy .= '</div>';
                $socialBuffy .= '</div>';
            }
        }

		//if ( $socialEmpty && ( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax()) ) {
		if ( $socialEmpty && is_user_logged_in() && current_user_can('switch_themes') ) {

			$buffy .= '<div class="' . $this->get_block_classes($additional_classes) . '">';
	        $buffy .= td_util::get_block_error('Social counter', "Configure this block/widget's settings to get socials");
	        $buffy .= '</div>';

		} else {
			$buffy .= '<div class="' . $this->get_block_classes($additional_classes) . '">';

			//get the block js
			$buffy .= $this->get_block_css();

            // block title wrap
            $buffy .= '<div class="td-block-title-wrap">';
                $buffy .= $this->get_block_title();
                $buffy .= $this->get_pull_down_filter(); //get the sub category filter for this block
            $buffy .= '</div>';

			$buffy .= '<div class="td-social-list">';
	        $buffy .= $socialBuffy;
	        $buffy .= '</div>';

			$buffy .= '</div> <!-- ./block -->';
		}

        return $buffy;
    }

    //used only on render
    function get_social_network_meta($service_id, $user_id, &$td_social_api, $access_token = '') {
	    switch ($service_id) {
            case 'facebook':
                return array(
                    'button' => __td('Like'),
                    'url' => "https://www.facebook.com/$user_id",
                    'text' => __td('Fans'),
                    'api' => $td_social_api->get_social_counter($service_id, $user_id, $access_token),
                );
                break;

            case 'twitter':
                return array(
                    'button' => __td('Follow'),
                    'url' => "https://twitter.com/$user_id",
                    'text' => __td('Followers'),
                    'api' => $td_social_api->get_social_counter($service_id, $user_id, $access_token),
                );
                break;

			//case 'vimeo':
			//    return array(
			//        'button' => __td('Like'),
			//        'url' => "http://vimeo.com/$user_id",
			//        'text' => __td('Likes'),
			//        'api' => $td_social_api->get_social_counter($service_id, $user_id, $access_token),
			//    );
			//    break;

            case 'youtube':
                return array(
                    'button' => __td('Subscribe'),
                    'url' => (strpos('channel/', $user_id) >= 0) ? "https://www.youtube.com/$user_id" : "https://www.youtube.com/user/$user_id",
                    'text' => __td('Subscribers'),
                    'api' => $td_social_api->get_social_counter($service_id, $user_id, $access_token),
                );
                break;

			//case 'googleplus':
			//    return array(
			//        'button' => __td('Follow'),
			//        'url' => "https://plus.google.com/$user_id",
			//        'text' => __td('Followers'),
			//        'api' => $td_social_api->get_social_counter($service_id, $user_id, $access_token),
			//    );
			//    break;

            case 'instagram':
                return array(
                    'button' => __td('Follow'),
                    'url' => "https://instagram.com/$user_id#",
                    'text' => __td('Followers'),
                    'api' => $td_social_api->get_social_counter($service_id, $user_id, $access_token),
                );
                break;

            case 'pinterest':
                return array(
                    'button' => __td('Follow'),
                    'url' => "https://pinterest.com/$user_id",
                    'text' => __td('Followers'),
                    'api' => $td_social_api->get_social_counter($service_id, $user_id, $access_token),
                );
                break;

            case 'tiktok':
                return array(
                    'button' => __td('Follow'),
                    'url' => "https://www.tiktok.com/" . strtok($user_id,  '/'),
                    'text' => __td('Followers'),
                    'api' => $td_social_api->get_social_counter($service_id, $user_id, $access_token),
                );
                break;

            case 'soundcloud':
                return array(
                    'button' => __td('Follow'),
                    'url' => "https://soundcloud.com/$user_id",
                    'text' => __td('Followers'),
                    'api' => $td_social_api->get_social_counter($service_id, $user_id, $access_token),
                );
                break;

            case 'rss':
                return array(
                    'button' => __td('Follow'),
                    'url' => get_bloginfo('rss2_url'),
                    'text' => __td('Followers'),
                    'api' => $td_social_api->get_social_counter($service_id, $user_id, $access_token),
                );
                break;
        }
    }
}

