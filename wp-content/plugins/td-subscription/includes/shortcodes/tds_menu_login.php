<?php

class tds_menu_login extends td_block {

    static function cssMedia( $res_ctx ) {

        /*-- GENERAL-- */
        $res_ctx->load_settings_raw('general_style_tds_menu_login', 1);
        $show_version = $res_ctx->get_shortcode_att('show_version');

        // show dropdown only
        $dropdown_only = $res_ctx->get_shortcode_att('dropdown_only') != '';

        if( !$dropdown_only ) {
            $res_ctx->load_settings_raw('dropdown_absolute', 1);
        }

        // disable dropdown
        $disable_dropdown = '';
        if( 'Newspaper' === TD_THEME_NAME && !$dropdown_only ) {
            $disable_dropdown = $res_ctx->get_shortcode_att('disable_dropdown');
        }

        $guest_icon = $res_ctx->get_shortcode_att('guest_tdicon');
        $show_avatar = $res_ctx->get_shortcode_att('show_avatar');
        if( $disable_dropdown == '' ) {
            if( is_user_logged_in() ) {
                if (tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe()) {
                    if( $show_version == 'guest' ) {
                        if ($guest_icon != '') {
                            $res_ctx->load_settings_raw('icon_arrow', 1);
                        } else {
                            $res_ctx->load_settings_raw('text_arrow', 1);
                        }
                    } else {
                        if( $show_avatar == '' || $show_avatar == 'block' ) {
                            $res_ctx->load_settings_raw('avatar_arrow', 1);
                        } else {
                            $res_ctx->load_settings_raw('text_arrow', 1);
                        }
                    }
                } else {
                    if( $show_avatar == '' || $show_avatar == 'block' ) {
                        $res_ctx->load_settings_raw('avatar_arrow', 1);
                    } else {
                        $res_ctx->load_settings_raw('text_arrow', 1);
                    }
                }
            } else {
                if ($guest_icon != '') {
                    $res_ctx->load_settings_raw('icon_arrow', 1);
                } else {
                    $res_ctx->load_settings_raw('text_arrow', 1);
                }
            }


            // show menu
            if (tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe()) {
                $res_ctx->load_settings_raw('show_menu', $res_ctx->get_shortcode_att('show_menu'));
            }
        }


        /*-- TOGGLE -- */
        if( !$dropdown_only ) {
            $guest_icon = $res_ctx->get_icon_att('guest_tdicon');
            $icon_size = $res_ctx->get_shortcode_att('icon_size');
            // icon size
            if( base64_encode( base64_decode( $guest_icon ) ) == $guest_icon ) {
                $res_ctx->load_settings_raw('icon_svg_size', $icon_size . 'px');
            } else {
                $res_ctx->load_settings_raw('icon_size', $icon_size . 'px');
            }

            // avatar size
            $avatar_size = $res_ctx->get_shortcode_att('avatar_size');
            $res_ctx->load_settings_raw('avatar_size', $avatar_size);
            if( $avatar_size != '' && is_numeric( $avatar_size ) ) {
                $res_ctx->load_settings_raw('avatar_size', $avatar_size . 'px');
            }

            // avatar radius
            $avatar_radius = $res_ctx->get_shortcode_att('avatar_radius');
            $res_ctx->load_settings_raw('avatar_radius', $avatar_radius);
            if( $avatar_radius != '' && is_numeric( $avatar_radius ) ) {
                $res_ctx->load_settings_raw('avatar_radius', $avatar_radius . 'px');
            }

            // show avatar
            $res_ctx->load_settings_raw('show_avatar', $res_ctx->get_shortcode_att('show_avatar'));

            // icon/avatar space
            $text_pos = $res_ctx->get_shortcode_att('toggle_txt_pos');
            $icon_avatar_space = $res_ctx->get_shortcode_att('ia_space');
            if ($text_pos == '') {
                $res_ctx->load_settings_raw('icon_avatar_space_right', $icon_avatar_space);
                if ($icon_avatar_space != '') {
                    if (is_numeric($icon_avatar_space)) {
                        $res_ctx->load_settings_raw('icon_avatar_space_right', $icon_avatar_space . 'px');
                    }
                } else {
                    $res_ctx->load_settings_raw('icon_avatar_space_right', '12px');
                }
            } else if ($text_pos == 'before') {
                $res_ctx->load_settings_raw('icon_avatar_space_left', $icon_avatar_space);
                if ($icon_avatar_space != '') {
                    if (is_numeric($icon_avatar_space)) {
                        $res_ctx->load_settings_raw('icon_avatar_space_left', $icon_avatar_space . 'px');
                    }
                } else {
                    $res_ctx->load_settings_raw('icon_avatar_space_left', '12px');
                }
            }

            // text vertical position
            $res_ctx->load_settings_raw('toggle_txt_align', $res_ctx->get_shortcode_att('toggle_txt_align') . 'px');

            // align toggle
            $toggle_horiz_align = $res_ctx->get_shortcode_att('toggle_horiz_align');
            if ($toggle_horiz_align == 'content-horiz-left') {
                $res_ctx->load_settings_raw('toggle_horiz_align_left', 1);
            } else if( $toggle_horiz_align == 'content-horiz-center' ) {
                $res_ctx->load_settings_raw('toggle_horiz_align_center', 1);
            } else if( $toggle_horiz_align == 'content-horiz-right' ) {
                $res_ctx->load_settings_raw('toggle_horiz_align_right', 1);
            }

            // make inline
            $res_ctx->load_settings_raw('inline', $res_ctx->get_shortcode_att('inline'));
        }



        /*-- MENU -- */
        if( $disable_dropdown == '' ) {
            if( !$dropdown_only ) {
                // menu offset top
                $menu_offset_top = $res_ctx->get_shortcode_att('menu_offset_top');
                $res_ctx->load_settings_raw('menu_offset_top', $menu_offset_top);
                if( $menu_offset_top != '' && is_numeric( $menu_offset_top ) ) {
                    $res_ctx->load_settings_raw('menu_offset_top', $menu_offset_top . 'px');
                }

                // menu width
                $menu_width = $res_ctx->get_shortcode_att('menu_width');
                $res_ctx->load_settings_raw('menu_width', $menu_width);
                if( $menu_width != '' && is_numeric( $menu_width ) ) {
                    $res_ctx->load_settings_raw('menu_width', $menu_width . 'px');
                }
            }

            // menu padding
            $menu_padding = $res_ctx->get_shortcode_att('menu_padding');
            $res_ctx->load_settings_raw('menu_padding', $menu_padding);
            if( $menu_padding != '' && is_numeric( $menu_padding ) ) {
                $res_ctx->load_settings_raw('menu_padding', $menu_padding . 'px');
            }

            // menu border size
            $menu_border = $res_ctx->get_shortcode_att('menu_border');
            $res_ctx->load_settings_raw('menu_border', $menu_border);
            if( $menu_border != '' && is_numeric( $menu_border ) ) {
                $res_ctx->load_settings_raw('menu_border', $menu_border . 'px');
            }

            // menu border radius
            $menu_border_radius = $res_ctx->get_shortcode_att('menu_border_radius');
            $res_ctx->load_settings_raw('menu_border_radius', $menu_border_radius);
            if( $menu_border_radius != '' && is_numeric( $menu_border_radius ) ) {
                $res_ctx->load_settings_raw('menu_border_radius', $menu_border_radius . 'px');
            }

            // menu border style
            $menu_border_style = $res_ctx->get_shortcode_att( 'menu_border_style' );
            if( $menu_border_style != '' ) {
                $res_ctx->load_settings_raw( 'menu_border_style', $menu_border_style );
            }

            // menu align
            $menu_horiz_align = $res_ctx->get_shortcode_att('menu_horiz_align');
            if( $menu_horiz_align == 'content-horiz-left' ) {
                $res_ctx->load_settings_raw('menu_horiz_align_left', 1);
            } else if( $menu_horiz_align == 'content-horiz-center' ) {
                $res_ctx->load_settings_raw('menu_horiz_align_center', 1);
            } else if( $menu_horiz_align == 'content-horiz-right' ) {
                $res_ctx->load_settings_raw('menu_horiz_align_right', 1);
            }



            /*-- LOGGED IN MENU -- */
            // account handle padding
            $menu_uh_padd = $res_ctx->get_shortcode_att('menu_uh_padd');
            $res_ctx->load_settings_raw('menu_uh_padd', $menu_uh_padd);
            if( $menu_uh_padd != '' && is_numeric( $menu_uh_padd ) ) {
                $res_ctx->load_settings_raw('menu_uh_padd', $menu_uh_padd . 'px');
            }
            // account handle border size
            $menu_uh_border = $res_ctx->get_shortcode_att('menu_uh_border');
            $res_ctx->load_settings_raw('menu_uh_border', $menu_uh_border);
            if( $menu_uh_border != '' && is_numeric( $menu_uh_border ) ) {
                $res_ctx->load_settings_raw('menu_uh_border', $menu_uh_border . 'px');
            }
            // account handle border style
            $menu_uh_border_style = $res_ctx->get_shortcode_att('menu_uh_border_style');
            $res_ctx->load_settings_raw('menu_uh_border_style', $menu_uh_border_style);
            if( $menu_uh_border_style == '' ) {
                $res_ctx->load_settings_raw('menu_uh_border_style', 'solid');
            }

            // menu links padding
            $menu_ul_padd = $res_ctx->get_shortcode_att('menu_ul_padd');
            $res_ctx->load_settings_raw('menu_ul_padd', $menu_ul_padd);
            if( $menu_ul_padd != '' && is_numeric( $menu_ul_padd ) ) {
                $res_ctx->load_settings_raw('menu_ul_padd', $menu_ul_padd . 'px');
            }
            // links space
            $menu_ul_space = $res_ctx->get_shortcode_att('menu_ul_space');
            $res_ctx->load_settings_raw('menu_ul_space', $menu_ul_space);
            if( $menu_ul_space != '' && is_numeric( $menu_ul_space ) ) {
                $res_ctx->load_settings_raw('menu_ul_space', $menu_ul_space . 'px');
            }
            // links separator space
            $menu_ul_sep_space = $res_ctx->get_shortcode_att('menu_ul_sep_space');
            $res_ctx->load_settings_raw('menu_ul_sep_space', $menu_ul_sep_space);
            if( $menu_ul_sep_space != '' && is_numeric( $menu_ul_sep_space ) ) {
                $res_ctx->load_settings_raw('menu_ul_sep_space', $menu_ul_sep_space . 'px');
            }

            // logout icon size
            $logout_icon = $res_ctx->get_icon_att('logout_tdicon');
            $logout_size = $res_ctx->get_shortcode_att('logout_size');
            if( base64_encode( base64_decode( $logout_icon ) ) == $logout_icon ) {
                $res_ctx->load_settings_raw('logout_svg_size', $logout_size . 'px');
            } else {
                $res_ctx->load_settings_raw('logout_size', $logout_size . 'px');
            }
            // logout space
            $logout_space = $res_ctx->get_shortcode_att('logout_space');
            $res_ctx->load_settings_raw('logout_space', $logout_space);
            if( $logout_space != '' && is_numeric( $logout_space ) ) {
                $res_ctx->load_settings_raw('logout_space', $logout_space . 'px');
            }
            // logout padding
            $menu_ulo_padd = $res_ctx->get_shortcode_att('menu_ulo_padd');
            $res_ctx->load_settings_raw('menu_ulo_padd', $menu_ulo_padd);
            if( $menu_ulo_padd != '' && is_numeric( $menu_ulo_padd ) ) {
                $res_ctx->load_settings_raw('menu_ulo_padd', $menu_ulo_padd . 'px');
            }
            // logout border size
            $menu_ulo_border = $res_ctx->get_shortcode_att('menu_ulo_border');
            $res_ctx->load_settings_raw('menu_ulo_border', $menu_ulo_border);
            if( $menu_ulo_border != '' && is_numeric( $menu_ulo_border ) ) {
                $res_ctx->load_settings_raw('menu_ulo_border', $menu_ulo_border . 'px');
            }
            // logout border style
            $menu_ulo_border_style = $res_ctx->get_shortcode_att('menu_ulo_border_style');
            $res_ctx->load_settings_raw('menu_ulo_border_style', $menu_ulo_border_style);
            if( $menu_ulo_border_style == '' ) {
                $res_ctx->load_settings_raw('menu_ulo_border_style', 'solid');
            }

            // toggle_hide
            $toggle_hide = $res_ctx->get_shortcode_att('toggle_hide');
            if( $toggle_hide != '' ) {
                $res_ctx->load_settings_raw('toggle_hide', 1);
            } else {
                $res_ctx->load_settings_raw('toggle_show', 1);
            }

            if( !$dropdown_only ) {
                // menu_offset_horiz
                $res_ctx->load_settings_raw('menu_offset_horiz', $res_ctx->get_shortcode_att('menu_offset_horiz') . '%');
            }


            /*-- GUEST MENU -- */
            // guest menu header padding
            $menu_gh_padd = $res_ctx->get_shortcode_att('menu_gh_padd');
            $res_ctx->load_settings_raw('menu_gh_padd', $menu_gh_padd);
            if( $menu_gh_padd != '' && is_numeric( $menu_gh_padd ) ) {
                $res_ctx->load_settings_raw('menu_gh_padd', $menu_gh_padd . 'px');
            }
            // guest menu header bottom border size
            $menu_gh_border = $res_ctx->get_shortcode_att('menu_gh_border');
            $res_ctx->load_settings_raw('menu_gh_border', $menu_gh_border);
            if( $menu_gh_border != '' && is_numeric( $menu_gh_border ) ) {
                $res_ctx->load_settings_raw('menu_gh_border', $menu_gh_border . 'px');
            }
            // guest menu header bottom border style
            $menu_gh_border_style = $res_ctx->get_shortcode_att('menu_gh_border_style');
            $res_ctx->load_settings_raw('menu_gh_border_style', $menu_gh_border_style);
            if( $menu_gh_border_style == '' ) {
                $res_ctx->load_settings_raw('menu_gh_border_style', 'solid');
            }

            // guest menu content padding
            $menu_gc_padd = $res_ctx->get_shortcode_att('menu_gc_padd');
            $res_ctx->load_settings_raw('menu_gc_padd', $menu_gc_padd);
            if( $menu_gc_padd != '' && is_numeric( $menu_gc_padd ) ) {
                $res_ctx->load_settings_raw('menu_gc_padd', $menu_gc_padd . 'px');
            }

            // guest menu login button padding
            $menu_gc_btn1_padd = $res_ctx->get_shortcode_att('menu_gc_btn1_padd');
            $res_ctx->load_settings_raw('menu_gc_btn1_padd', $menu_gc_btn1_padd);
            if( $menu_gc_btn1_padd != '' && is_numeric( $menu_gc_btn1_padd ) ) {
                $res_ctx->load_settings_raw('menu_gc_btn1_padd', $menu_gc_btn1_padd . 'px');
            }
            // guest menu login button border size
            $menu_gc_btn1_border = $res_ctx->get_shortcode_att('menu_gc_btn1_border');
            $res_ctx->load_settings_raw('menu_gc_btn1_border', $menu_gc_btn1_border);
            if( $menu_gc_btn1_border != '' && is_numeric( $menu_gc_btn1_border ) ) {
                $res_ctx->load_settings_raw('menu_gc_btn1_border', $menu_gc_btn1_border . 'px');
            }
            // guest menu login button border style
            $menu_gc_btn1_border_style = $res_ctx->get_shortcode_att('menu_gc_btn1_border_style');
            $res_ctx->load_settings_raw('menu_gc_btn1_border_style', $menu_gc_btn1_border_style);
            if( $menu_gc_btn1_border_style == '' ) {
                $res_ctx->load_settings_raw('menu_gc_btn1_border_style', 'solid');
            }
            // guest menu login button border radius
            $menu_gc_btn1_radius = $res_ctx->get_shortcode_att('menu_gc_btn1_radius');
            $res_ctx->load_settings_raw('menu_gc_btn1_radius', $menu_gc_btn1_radius);
            if( $menu_gc_btn1_radius != '' && is_numeric( $menu_gc_btn1_radius ) ) {
                $res_ctx->load_settings_raw('menu_gc_btn1_radius', $menu_gc_btn1_radius . 'px');
            }

            // guest menu signup button left space
            $menu_gc_btn2_space = $res_ctx->get_shortcode_att('menu_gc_btn2_space');
            $res_ctx->load_settings_raw('menu_gc_btn2_space', $menu_gc_btn2_space);
            if( $menu_gc_btn2_space != '' && is_numeric( $menu_gc_btn2_space ) ) {
                $res_ctx->load_settings_raw('menu_gc_btn2_space', $menu_gc_btn2_space . 'px');
            }
        }



        /*-- COLORS -- */
        if( !$dropdown_only ) {
            $res_ctx->load_settings_raw('icon_color', $res_ctx->get_shortcode_att('icon_color'));
            $res_ctx->load_settings_raw('icon_color_h', $res_ctx->get_shortcode_att('icon_color_h'));
            $res_ctx->load_settings_raw('toggle_txt_color', $res_ctx->get_shortcode_att('toggle_txt_color'));
            $res_ctx->load_settings_raw('toggle_txt_color_h', $res_ctx->get_shortcode_att('toggle_txt_color_h'));
        }

        if( $disable_dropdown == '' ) {
            $res_ctx->load_settings_raw('menu_bg', $res_ctx->get_shortcode_att('menu_bg'));
            $res_ctx->load_settings_raw('menu_border_color', $res_ctx->get_shortcode_att('menu_border_color'));
            $res_ctx->load_settings_raw('menu_arrow_color', $res_ctx->get_shortcode_att('menu_arrow_color'));
            $res_ctx->load_shadow_settings(6, 0, 2, 0, 'rgba(0, 0, 0, 0.2)', 'menu_shadow');

            $res_ctx->load_settings_raw('menu_uh_color', $res_ctx->get_shortcode_att('menu_uh_color'));
            $res_ctx->load_settings_raw('menu_uh_border_color', $res_ctx->get_shortcode_att('menu_uh_border_color'));
            $res_ctx->load_settings_raw('menu_ul_link_color', $res_ctx->get_shortcode_att('menu_ul_link_color'));
            $res_ctx->load_settings_raw('menu_ul_link_color_h', $res_ctx->get_shortcode_att('menu_ul_link_color_h'));
            $res_ctx->load_settings_raw('menu_ul_sep_color', $res_ctx->get_shortcode_att('menu_ul_sep_color'));
            $res_ctx->load_settings_raw('menu_uf_txt_color', $res_ctx->get_shortcode_att('menu_uf_txt_color'));
            $res_ctx->load_settings_raw('menu_uf_txt_color_h', $res_ctx->get_shortcode_att('menu_uf_txt_color_h'));
            $res_ctx->load_settings_raw('menu_uf_icon_color', $res_ctx->get_shortcode_att('menu_uf_icon_color'));
            $res_ctx->load_settings_raw('menu_uf_icon_color_h', $res_ctx->get_shortcode_att('menu_uf_icon_color_h'));
            $res_ctx->load_settings_raw('menu_uf_border_color', $res_ctx->get_shortcode_att('menu_uf_border_color'));

            $res_ctx->load_settings_raw('menu_gh_color', $res_ctx->get_shortcode_att('menu_gh_color'));
            $res_ctx->load_settings_raw('menu_gh_border_color', $res_ctx->get_shortcode_att('menu_gh_border_color'));
            $res_ctx->load_settings_raw('menu_gc_btn1_color', $res_ctx->get_shortcode_att('menu_gc_btn1_color'));
            $res_ctx->load_settings_raw('menu_gc_btn1_color_h', $res_ctx->get_shortcode_att('menu_gc_btn1_color_h'));
            $res_ctx->load_settings_raw('menu_gc_btn1_bg_color', $res_ctx->get_shortcode_att('menu_gc_btn1_bg_color'));
            $res_ctx->load_settings_raw('menu_gc_btn1_bg_color_h', $res_ctx->get_shortcode_att('menu_gc_btn1_bg_color_h'));
            $res_ctx->load_settings_raw('menu_gc_btn1_border_color', $res_ctx->get_shortcode_att('menu_gc_btn1_border_color'));
            $res_ctx->load_settings_raw('menu_gc_btn1_border_color_h', $res_ctx->get_shortcode_att('menu_gc_btn1_border_color_h'));
            $res_ctx->load_settings_raw('menu_gc_btn2_color', $res_ctx->get_shortcode_att('menu_gc_btn2_color'));
            $res_ctx->load_settings_raw('menu_gc_btn2_color_h', $res_ctx->get_shortcode_att('menu_gc_btn2_color_h'));
        }



        /*-- FONTS -- */
        if( !$dropdown_only ) {
            $res_ctx->load_font_settings( 'f_toggle' );
        }

        if( $disable_dropdown == '' ) {
            $res_ctx->load_font_settings('f_uh');
            $res_ctx->load_font_settings('f_links');
            $res_ctx->load_font_settings('f_uf');

            $res_ctx->load_font_settings('f_gh');
            $res_ctx->load_font_settings('f_btn1');
            $res_ctx->load_font_settings('f_btn2');
        }

    }

    public function get_custom_css() {
        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $unique_block_class = $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>
            
                /* @general_style_tds_menu_login */
                .tds_menu_login {
                    vertical-align: middle;
                    z-index: 1001;
                }
                .tds_menu_login .tdw-block-inner {
                    font-size: 0;
                    line-height: 0;
                }
                .tds_menu_login .tdw-wml-wrap {
                    position: relative;
                }
                .tds_menu_login .tdw-wml-link {
                    position: relative;
                    display: flex;
                    flex-wrap: wrap;
                    cursor: pointer;
                }
                .tds_menu_login .tdw-wml-icon-wrap {
                    position: relative;
                }
                .tds_menu_login .tdw-wml-icon {
                    display: block;
                    color: #000;
                }
                .tds_menu_login .tdw-wml-icon-svg {
                    line-height: 0;
                }
                .tds_menu_login .tdw-wml-avatar {
                    position: relative;
                    display: block;
                    width: 25px;
                    height: 25px;
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-position: center;
                    border-radius: 100px;
                }
                .tds_menu_login .tdw-wml-user {
                    position: relative;
                    display: flex;
                    align-items: center;
                    font-size: 13px;
                    color: #000;
                }
                .tds_menu_login .tdw-wml-menu {
                    position: relative;
                    width: 100%;
                    font-size: 13px;
                    line-height: 1.2;
                    font-size: 14px;
                    line-height: 21px;
                    z-index: 10;
                }
                .tds_menu_login .tdw-wml-menu-inner {
                    background-color: #fff;
                    border-width: 0;
                    border-style: solid;
                    border-color: #000;
                    position: relative;
                }
                .tds_menu_login .tdw-wml-menu-header,
                .tds_menu_login .tdw-wml-menu-footer {
                    padding: 11px 20px;
                }
                .tds_menu_login .tdw-wml-menu-header {
                    border-bottom: 1px solid #eaeaea;
                }
                .tds_menu_login .tdw-wml-menu-content {
                    padding: 10px 20px;
                }
                .tds_menu_login .tdw-wml-menu-list {
                    list-style-type: none;
                    margin: 0;
                }
                .tds_menu_login .tdw-wml-menu-list li {
                    margin-left: 0;
                    line-height: 2.2;
                }
                .tds_menu_login .tdw-wml-menu-list .tdw-wml-menu-item-sep {
                    height: 1px;
                    margin: 8px 0;
                    background-color: #eaeaea;
                }
                .tds_menu_login .tdw-wml-menu-list li a,
                .tds_menu_login .tdw-wml-menu-footer a {
                    color: #000;
                }
                .tds_menu_login .tdw-wml-menu-list li a:hover,
                .tds_menu_login .tdw-wml-menu-list a.is-active,
                .tds_menu_login .tdw-wml-menu-footer a:hover {
                    color: #4db2ec;
                }
                .tds_menu_login .tdw-wml-menu-footer {
                    border-top: 1px solid #eaeaea;
                }
                .tds_menu_login .tdw-wml-menu-footer a {
                    display: flex;
                    align-items: center;
                }
                .tds_menu_login .tdw-wml-menu-footer .tdw-wml-logout-icon {
                    margin-left: 7px;
                }
                .tds_menu_login .tdw-wml-menu-footer .tdw-wml-logout-icon-svg {
                    line-height: 0;
                }
                .tds_menu_login .tdw-wml-guest .tdw-wml-menu-content {
                    display: flex;
                    align-items: center;
                    padding: 15px 20px;
                }
                .tds_menu_login .tdw-wml-guest .tdw-wml-menu-content a {
                    font-size: 11px;
                    line-height: 1;
                }
                .tds_menu_login .tdw-wml-login-link {
                    padding: 9px 14px 11px;
                    background-color: #4db2ec;
                    color: #fff;
                    border: 0 solid #000;
                }
                .tds_menu_login .tdw-wml-login-link:hover {
                    background-color: #222;
                }
                .tds_menu_login .tdw-wml-register-link {
                    margin-left: 12px;
                    color: #000;
                }
                .tds_menu_login .tdw-wml-register-link:hover {
                    color: #4db2ec;
                }
                
                /* @icon_arrow */
                .tds_menu_login .tdw-wml-icon-wrap:after {
                    content: '';
                    display: none;
                    position: absolute;
                    bottom: -18px;
                    left: 50%;
                    transform: translateX(-50%);
                    width: 0;
                    height: 0;
                    border-left: 6px solid transparent;
                    border-right: 6px solid transparent;
                    border-bottom: 6px solid #fff;
                    z-index: 11;
                }
                .tds_menu_login .tdw-wml-wrap:hover .tdw-wml-icon-wrap:after {
                    display: block;
                }
                /* @avatar_arrow */
                .tds_menu_login .tdw-wml-avatar:after {
                    content: '';
                    display: none;
                    position: absolute;
                    bottom: -18px;
                    left: 50%;
                    transform: translateX(-50%);
                    width: 0;
                    height: 0;
                    border-left: 6px solid transparent;
                    border-right: 6px solid transparent;
                    border-bottom: 6px solid #fff;
                    z-index: 11;
                }
                .tds_menu_login .tdw-wml-wrap:hover .tdw-wml-avatar:after {
                    display: block;
                }
                /* @text_arrow */
                .tds_menu_login .tdw-wml-link:after {
                    content: '';
                    display: none;
                    position: absolute;
                    bottom: -18px;
                    left: 50%;
                    transform: translateX(-50%);
                    width: 0;
                    height: 0;
                    border-left: 6px solid transparent;
                    border-right: 6px solid transparent;
                    border-bottom: 6px solid #fff;
                    z-index: 11;
                }
                .tds_menu_login .tdw-wml-wrap:hover .tdw-wml-link:after {
                    display: block;
                }


                /* @dropdown_absolute */
                body .$unique_block_class .tdw-wml-wrap {
                    display: inline-block;
                }
                body .$unique_block_class .tdw-wml-wrap:hover .tdw-wml-menu {
                    opacity: 1;
                    visibility: visible;
                }
                body .$unique_block_class .tdw-wml-menu {
                    position: absolute;
                    top: 100%;
                    right: 0;
                    left: 6px;
                    width: 200px;
                    opacity: 0;
                    visibility: hidden;
                }
                body .$unique_block_class .tdw-wml-menu:before {
                    content: '';
                    display: block;
                    width: 100%;
                    height: 18px;
                }
                body .$unique_block_class .tdw-wml-menu-inner {
                    margin-right: -12px;
                }
                
            
                /* @show_menu */
                body .$unique_block_class.tdc-element-selected .tdw-wml-menu {
                    opacity: 1;
                    visibility: visible;
                }
                body .$unique_block_class.tdc-element-selected .tdw-wml-avatar:after,
                body .$unique_block_class.tdc-element-selected .tdw-wml-icon-wrap:after,
                body .$unique_block_class.tdc-element-selected .tdw-wml-link:after {
                    display: block;
                }
                
                /* @icon_size */
                body .$unique_block_class .tdw-wml-icon {
                    font-size: @icon_size;
                }
                /* @icon_svg_size */
                body .$unique_block_class .tdw-wml-icon-svg svg {
                    width: @icon_svg_size;
                }
                
                /* @avatar_size */
                body .$unique_block_class .tdw-wml-avatar {
                    width: @avatar_size;
                    height: @avatar_size;
                }
                /* @avatar_radius */
                body .$unique_block_class .tdw-wml-avatar {
                    border-radius: @avatar_radius;
                }
                /* @show_avatar */
                body .$unique_block_class .tdw-wml-avatar {
                    display: @show_avatar;
                }
                
                /* @icon_avatar_space_right */
                body .$unique_block_class .tdw-wml-icon-wrap,
                body .$unique_block_class .tdw-wml-avatar {
                    margin-right: @icon_avatar_space_right;
                }
                /* @icon_avatar_space_left */
                body .$unique_block_class .tdw-wml-icon-wrap,
                body .$unique_block_class .tdw-wml-avatar {
                    margin-left: @icon_avatar_space_left;
                }
                
                /* @toggle_txt_align */
                body .$unique_block_class .tdw-wml-user {
                    top: @toggle_txt_align;
                }
                
                /* @toggle_horiz_align_left */
                body .$unique_block_class .td_block_inner {
                    text-align: left;
                }
                /* @toggle_horiz_align_center */
                body .$unique_block_class .td_block_inner {
                    text-align: center;
                }
                /* @toggle_horiz_align_right */
                body .$unique_block_class .td_block_inner {
                    text-align: right;
                }
                
                
                /* @toggle_hide */
                body .$unique_block_class .tdw-wml-user {
                    display: none;
                }
                /* @toggle_show */
                body .$unique_block_class .tdw-wml-user {
                    display: flex;
                }
                
                /* @inline */
                body .$unique_block_class {
                    display: inline-block;
                }
                
                
                /* @menu_offset_top */
                body .$unique_block_class .tdw-wml-menu:before {
                    height: @menu_offset_top;
                }
                body .$unique_block_class .tdw-wml-avatar:after,
                body .$unique_block_class .tdw-wml-icon-wrap:after,
                body .$unique_block_class .tdw-wml-link:after {
                    bottom: -@menu_offset_top;
                }
                /* @menu_width */
                body .$unique_block_class .tdw-wml-menu {
                    width: @menu_width;
                    text-align: left;
                }
                /* @menu_offset_horiz */
                body .$unique_block_class .tdw-wml-menu-inner {
                    right: @menu_offset_horiz;
                }
                /* @menu_padding */
                body .$unique_block_class .tdw-wml-menu-inner {
                    padding: @menu_padding;
                }
                /* @menu_border */
                body .$unique_block_class .tdw-wml-menu-inner {
                    border-width: @menu_border;
                }
                /* @menu_border_style */
                body .$unique_block_class .tdw-wml-menu-inner {
                    border-style: @menu_border_style;
                }
                /* @menu_border_radius */
                body .$unique_block_class .tdw-wml-menu-inner {
                    border-radius: @menu_border_radius;
                }
                /* @menu_horiz_align_left */
                body .$unique_block_class .tdw-wml-menu {
                    left: 0;
                    right: auto;
                    transform: none;
                }
                /* @menu_horiz_align_center */
                body .$unique_block_class .tdw-wml-menu {
                    left: 50%;
                    right: auto;
                    transform: translateX(-50%);
                }
                /* @menu_horiz_align_right */
                body .$unique_block_class .tdw-wml-menu {
                    right: 0;
                    left: auto;
                    transform: none;
                }
                
                /* @menu_uh_padd */
                body .$unique_block_class .tdw-wml-account .tdw-wml-menu-header {
                    padding: @menu_uh_padd;
                }
                /* @menu_uh_border */
                body .$unique_block_class .tdw-wml-account .tdw-wml-menu-header {
                    border-bottom-width: @menu_uh_border;
                }
                /* @menu_uh_border_style */
                body .$unique_block_class .tdw-wml-account .tdw-wml-menu-header {
                    border-bottom-style: @menu_uh_border_style;
                }
                
                /* @menu_ul_padd */
                body .$unique_block_class .tdw-wml-account .tdw-wml-menu-content {
                    padding: @menu_ul_padd;
                }
                /* @menu_ul_space */
                body .$unique_block_class .tdw-wml-menu-list li {
                    margin-bottom: @menu_ul_space;
                }
                body .$unique_block_class .tdw-wml-menu-list li:not(.tdw-wml-menu-item-sep):last-child {
                    margin-bottom: 0;
                }
                /* @menu_ul_sep_space */
                body .$unique_block_class .tdw-wml-menu-list .tdw-wml-menu-item-sep {
                    margin: @menu_ul_sep_space 0;
                }
                
                /* @logout_size */
                body .$unique_block_class .tdw-wml-menu-footer .tdw-wml-logout-icon {
                    font-size: @logout_size;
                }
                /* @logout_svg_size */
                body .$unique_block_class .tdw-wml-menu-footer .tdw-wml-logout-icon-svg svg {
                    width: @logout_svg_size;
                }
                /* @logout_space */
                body .$unique_block_class .tdw-wml-menu-footer .tdw-wml-logout-icon {
                    margin-left: @logout_space;
                }
                /* @menu_ulo_padd */
                body .$unique_block_class .tdw-wml-menu-footer {
                    padding: @menu_ulo_padd;
                }
                /* @menu_ulo_border */
                body .$unique_block_class .tdw-wml-menu-footer {
                    border-top-width: @menu_ulo_border;
                }
                /* @menu_ulo_border_style */
                body .$unique_block_class .tdw-wml-menu-footer {
                    border-top-style: @menu_ulo_border_style;
                }
                
                /* @menu_gh_padd */
                body .$unique_block_class .tdw-wml-guest .tdw-wml-menu-header {
                    padding: @menu_gh_padd;
                }
                /* @menu_gh_border */
                body .$unique_block_class .tdw-wml-guest .tdw-wml-menu-header {
                    border-bottom-width: @menu_gh_border;
                }
                /* @menu_gh_border_style */
                body .$unique_block_class .tdw-wml-guest .tdw-wml-menu-header {
                    border-bottom-style: @menu_gh_border_style;
                }
                
                /* @menu_gc_padd */
                body .$unique_block_class .tdw-wml-guest .tdw-wml-menu-content {
                    padding: @menu_gc_padd;
                }
                
                /* @menu_gc_btn1_padd */
                body .$unique_block_class .tdw-wml-login-link {
                    padding: @menu_gc_btn1_padd;
                }
                /* @menu_gc_btn1_border */
                body .$unique_block_class .tdw-wml-login-link {
                    border-width: @menu_gc_btn1_border;
                }
                /* @menu_gc_btn1_border_style */
                body .$unique_block_class .tdw-wml-login-link {
                    border-style: @menu_gc_btn1_border_style;
                }
                /* @menu_gc_btn1_radius */
                body .$unique_block_class .tdw-wml-login-link {
                    border-radius: @menu_gc_btn1_radius;
                }
                
                /* @menu_gc_btn2_space */
                body .$unique_block_class .tdw-wml-register-link {
                    margin-left: @menu_gc_btn2_space;
                }
                
                
                /* @icon_color */
                body .$unique_block_class .tdw-wml-icon {
                    color: @icon_color;
                }
                body .$unique_block_class .tdw-wml-icon-svg svg,
                body .$unique_block_class .tdw-wml-icon-svg svg * {
                    fill: @icon_color;
                }
                /* @icon_color_h */
                body .$unique_block_class .tdw-wml-wrap:hover .tdw-wml-icon {
                    color: @icon_color_h;
                }
                body .$unique_block_class .tdw-wml-wrap:hover .tdw-wml-icon-svg svg,
                body .$unique_block_class .tdw-wml-wrap:hover .tdw-wml-icon-svg svg * {
                    fill: @icon_color_h;
                }    
                /* @toggle_txt_color */
                body .$unique_block_class .tdw-wml-user {
                    color: @toggle_txt_color;
                }    
                /* @toggle_txt_color_h */
                body .$unique_block_class .tdw-wml-wrap:hover .tdw-wml-user {
                    color: @toggle_txt_color_h;
                }   
                
                /* @menu_bg */
                body .$unique_block_class .tdw-wml-menu-inner {
                    background-color: @menu_bg;
                } 
                /* @menu_border_color */
                body .$unique_block_class .tdw-wml-menu-inner {
                    border-color: @menu_border_color;
                }
                /* @menu_arrow_color */
                body .$unique_block_class .tdw-wml-avatar:after,
                body .$unique_block_class .tdw-wml-icon-wrap:after,
                body .$unique_block_class .tdw-wml-link:after {
                    border-bottom-color: @menu_arrow_color;
                }
                /* @menu_shadow */
                body .$unique_block_class .tdw-wml-menu-inner {
                    box-shadow: @menu_shadow;
                }
                
                /* @menu_uh_color */
                body .$unique_block_class .tdw-wml-account .tdw-wml-menu-header {
                    color: @menu_uh_color;
                } 
                /* @menu_uh_border_color */
                body .$unique_block_class .tdw-wml-account .tdw-wml-menu-header {
                    border-bottom-color: @menu_uh_border_color;
                } 
                /* @menu_ul_link_color */
                body .$unique_block_class .tdw-wml-menu-list li a {
                    color: @menu_ul_link_color;
                }
                /* @menu_ul_link_color_h */
                body .$unique_block_class .tdw-wml-menu-list li a:hover,
                body .$unique_block_class .tdw-wml-menu-list a.is-active {
                    color: @menu_ul_link_color_h;
                }
                /* @menu_ul_sep_color */
                body .$unique_block_class .tdw-wml-menu-list .tdw-wml-menu-item-sep {
                    background-color: @menu_ul_sep_color;
                }
                /* @menu_uf_txt_color */
                body .$unique_block_class .tdw-wml-account .tdw-wml-menu-footer a {
                    color: @menu_uf_txt_color;
                }
                body .$unique_block_class .tdw-wml-account .tdw-wml-menu-footer a .tdw-wml-logout-icon svg,
                body .$unique_block_class .tdw-wml-account .tdw-wml-menu-footer a .tdw-wml-logout-icon svg * {
                    fill: @menu_uf_txt_color;
                }
                /* @menu_uf_txt_color_h */
                body .$unique_block_class .tdw-wml-account .tdw-wml-menu-footer a:hover {
                    color: @menu_uf_txt_color_h;
                }
                body .$unique_block_class .tdw-wml-account .tdw-wml-menu-footer a:hover .tdw-wml-logout-icon svg,
                body .$unique_block_class .tdw-wml-account .tdw-wml-menu-footer a:hover .tdw-wml-logout-icon svg * {
                    fill: @menu_uf_txt_color_h;
                }
                /* @menu_uf_icon_color */
                body .$unique_block_class .tdw-wml-account .tdw-wml-menu-footer a .tdw-wml-logout-icon {
                    color: @menu_uf_icon_color;
                }
                body .$unique_block_class .tdw-wml-account .tdw-wml-menu-footer a .tdw-wml-logout-icon svg,
                body .$unique_block_class .tdw-wml-account .tdw-wml-menu-footer a .tdw-wml-logout-icon svg * {
                    fill: @menu_uf_icon_color;
                }
                /* @menu_uf_icon_color_h */
                body .$unique_block_class .tdw-wml-account .tdw-wml-menu-footer a:hover .tdw-wml-logout-icon {
                    color: @menu_uf_icon_color_h;
                }
                body .$unique_block_class .tdw-wml-account .tdw-wml-menu-footer a:hover .tdw-wml-logout-icon svg,
                body .$unique_block_class .tdw-wml-account .tdw-wml-menu-footer a:hover .tdw-wml-logout-icon svg * {
                    fill: @menu_uf_icon_color_h;
                }
                /* @menu_uf_border_color */
                body .$unique_block_class .tdw-wml-account .tdw-wml-menu-footer {
                    border-top-color: @menu_uf_border_color;
                }
                
                /* @menu_gh_color */
                body .$unique_block_class .tdw-wml-guest .tdw-wml-menu-header {
                    color: @menu_gh_color;
                } 
                /* @menu_gh_border_color */
                body .$unique_block_class .tdw-wml-guest .tdw-wml-menu-header {
                    border-bottom-color: @menu_gh_border_color;
                } 
                /* @menu_gc_btn1_color */
                body .$unique_block_class .tdw-wml-login-link {
                    color: @menu_gc_btn1_color;
                } 
                /* @menu_gc_btn1_color_h */
                body .$unique_block_class .tdw-wml-login-link:hover {
                    color: @menu_gc_btn1_color_h;
                } 
                /* @menu_gc_btn1_bg_color */
                body .$unique_block_class .tdw-wml-login-link {
                    background-color: @menu_gc_btn1_bg_color;
                } 
                /* @menu_gc_btn1_bg_color_h */
                body .$unique_block_class .tdw-wml-login-link:hover {
                    background-color: @menu_gc_btn1_bg_color_h;
                } 
                /* @menu_gc_btn1_border_color */
                body .$unique_block_class .tdw-wml-login-link {
                    border-color: @menu_gc_btn1_border_color;
                } 
                /* @menu_gc_btn1_border_color_h */
                body .$unique_block_class .tdw-wml-login-link:hover {
                    border-color: @menu_gc_btn1_border_color_h;
                } 
                /* @menu_gc_btn2_color */
                body .$unique_block_class .tdw-wml-register-link {
                    color: @menu_gc_btn2_color;
                } 
                /* @menu_gc_btn2_color_h */
                body .$unique_block_class .tdw-wml-register-link:hover {
                    color: @menu_gc_btn2_color_h;
                } 
                
                
                
                /* @f_toggle */
                body .$unique_block_class .tdw-wml-user {
                    @f_toggle
                }   
                
                /* @f_uh */
                body .$unique_block_class .tdw-wml-account .tdw-wml-menu-header {
                    @f_uh
                }  
                /* @f_links */
                body .$unique_block_class .tdw-wml-menu-list li {
                    @f_links
                }
                /* @f_uf */
                body .$unique_block_class .tdw-wml-account .tdw-wml-menu-footer {
                    @f_uf
                }
                
                /* @f_gh */
                body .$unique_block_class .tdw-wml-guest .tdw-wml-menu-header {
                    @f_gh
                } 
                /* @f_btn1 */
                body .$unique_block_class .tdw-wml-login-link {
                    @f_btn1
                } 
                /* @f_btn2 */
                body .$unique_block_class .tdw-wml-register-link {
                    @f_btn2
                } 
                
            </style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();

        return $compiled_css;
    }

    function render($atts, $content = null) {

        parent::render($atts);

        $show_version = $this->get_att('show_version');

        // toggle icon
        $guest_icon = $this->get_icon_att('guest_tdicon');
        $guest_icon_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $guest_icon_data = 'data-td-svg-icon="' . $this->get_att('guest_tdicon') . '"';
        }
        $guest_icon_html = '';
        if( $guest_icon != '' ) {
            $guest_icon_html .= '<div class="tdw-wml-icon-wrap">';
                if( base64_encode( base64_decode( $guest_icon ) ) == $guest_icon ) {
                    $guest_icon_html .= '<span class="tdw-wml-icon tdw-wml-icon-svg" ' . $guest_icon_data . '>' . base64_decode( $guest_icon ) . '</span>';
                } else {
                    $guest_icon_html .= '<i class="tdw-wml-icon ' . $guest_icon . '"></i>';
                }
            $guest_icon_html .= '</div>';
        }
        // toggle text
        $toggle_text = __td('My account', TD_THEME_NAME);
        if( $this->get_att('toggle_txt') != '' ) {
            $toggle_text = $this->get_att('toggle_txt');
        }
        $toggle_text_position = $this->get_att('toggle_txt_pos');
        $buffy_toggle_text = '';
        if( $toggle_text != '' ) {
            $buffy_toggle_text = '<span class="tdw-wml-user">' . $toggle_text . '</span>';
        }

        // logout text
        $logout_txt = __td('Log out', TD_THEME_NAME);
        if( $this->get_att('menu_ulo_txt') != '' ) {
            $logout_txt = $this->get_att('menu_ulo_txt');
        }
        // logout icon
        $logout_icon = $this->get_icon_att('logout_tdicon');
        $logout_icon_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $logout_icon_data = 'data-td-svg-icon="' . $this->get_att('logout_tdicon') . '"';
        }
        $logout_icon_html = '';
        if( $logout_icon != '' ) {
            if ( base64_encode( base64_decode( $logout_icon ) ) == $logout_icon ) {
                $logout_icon_html = '<span class="tdw-wml-logout-icon tdw-wml-logout-icon-svg" ' . $logout_icon_data . '>' . base64_decode( $logout_icon ) . '</span>';
            } else {
                $logout_icon_html = '<i class="tdw-wml-logout-icon ' . $logout_icon . '"></i>';
            }
        }

        // guest menu header text
        $guest_text = __td('Get into your account.', TD_THEME_NAME);
        if ($this->get_att('menu_gh_txt') != '') {
            $guest_text = $this->get_att('menu_gh_txt');
        }
        // guest menu login button text
        $guest_btn1_text = __td('Login', TD_THEME_NAME);
        if( $this->get_att('menu_gc_btn1_txt') != '' ) {
            $guest_btn1_text = $this->get_att('menu_gc_btn1_txt');
        }
        // guest menu signup button text
        $guest_btn2_text = __td('Register', TD_THEME_NAME);
        if( $this->get_att('menu_gc_btn2_txt') != '' ) {
            $guest_btn2_text = $this->get_att('menu_gc_btn2_txt');
        }


        // option to disable the dropdown menu on Newspaper
        $dropdown_only = $this->get_att('dropdown_only') != '';

        $disable_dropdown = '';
        if( 'Newspaper' === TD_THEME_NAME && !$dropdown_only ) {
            $disable_dropdown = $this->get_att('disable_dropdown');
        }


        global $wpdb;
        $my_account_page_id = $wpdb->get_var( "SELECT value FROM tds_options WHERE name = 'my_account_page_id'");
        $create_account_page_id = $wpdb->get_var( "SELECT value FROM tds_options WHERE name = 'create_account_page_id'");

        if ( class_exists('SitePress') ) {
            $translated_my_account_page_id = apply_filters('wpml_object_id', $my_account_page_id, 'page');
            $translated_create_account_page_id = apply_filters('wpml_object_id', $create_account_page_id, 'page');
            if ( !is_null($translated_my_account_page_id) ) {
                $my_account_page_id = $translated_my_account_page_id;
            }
            if ( !is_null($translated_create_account_page_id) ) {
                $create_account_page_id = $translated_create_account_page_id;
            }
        }

        $my_account_permalink = false;
        if ( $my_account_page_id ) {
            $my_account_permalink = get_permalink( $my_account_page_id );
        }

        $toggle_open_tag = 'div';
        $toggle_close_tag = 'div';
        if( $my_account_permalink !== false && $disable_dropdown != '' ) {
            $toggle_open_tag = 'a href="' . esc_url($my_account_permalink) . '"';
            $toggle_close_tag = 'a';
        }


        // custom pages
        $pages_count = 5;
        $pages = array();

        for ( $i = 0; $i < $pages_count; $i++ ) {
            $page_url = $this->get_att('page_' . $i . '_url');
            $page_url_string = '';

            if( $page_url != '' ) {
                if ( is_numeric( $page_url ) ) {
                    if( get_post_type($page_url) == 'page' ) {
                        $page = get_post($page_url);

                        if ( null !== $page ) {
                            $page_url_string = get_permalink($page->ID);
                        }
                    }
                } else {
                    $page_url_string = $page_url;
                }

                if( $page_url_string != '' ) {
                    $pages[] = array(
                        'url' => $page_url_string,
                        'title' => $this->get_att('page_' . $i . '_title') != '' ? $this->get_att('page_' . $i . '_title') : ( 'Page ' . ( $i + 1 ) . ' title' ),
                    );
                }
            }
        }

        $users_can_register = get_option('users_can_register');


        $buffy = ''; //output buffer

        // remove top border on Newsmag
        $block_classes = str_replace('td-pb-border-top', '', $this->get_block_classes());

        $buffy .= '<div class="' . $block_classes . '" ' . $this->get_block_html_atts() . '>';

		    //get the block js
		    $buffy .= $this->get_block_css();

		    //get the js for this block
		    $buffy .= $this->get_block_js();


            $buffy .= '<div id=' . $this->block_uid . ' class="tdw-block-inner">';
                $buffy .= '<div class="tdw-wml-wrap">';
                    $guest_data = '';

                    if( !$dropdown_only ) {
                        $guest_data .= '<' . $toggle_open_tag . ' class="tdw-wml-link tdw-wml-popup">';
                            if( $toggle_text_position == 'before' ) {
                                $guest_data .= $buffy_toggle_text;
                            }

                            $guest_data .= $guest_icon_html;

                            if( $toggle_text_position == '' ) {
                                $guest_data .= $buffy_toggle_text;
                            }
                        $guest_data .= '</' . $toggle_close_tag . '>';
                    }

                    if( $disable_dropdown == '' ) {
                        $guest_data .= '<div class="tdw-wml-menu tdw-wml-guest">';
                            $guest_data .= '<div class="tdw-wml-menu-inner">';
                                if( $guest_text != '' ) {
                                    $guest_data .= '<div class="tdw-wml-menu-header">' . $guest_text . '</div>';
                                }

                                $guest_data .= '<div class="tdw-wml-menu-content">';
                                    if ( false !== $my_account_page_id ) {
                                        $guest_data .= '<a class="tdw-wml-login-link tdw-wml-popup" href="' . esc_url(get_permalink( $my_account_page_id )) . '">' . $guest_btn1_text . '</a>';
                                    }
                                    if ( false !== $create_account_page_id && $users_can_register == 1 ) {
                                        $guest_data .= '<a class="tdw-wml-register-link tdw-wml-popup" href="' . esc_url(add_query_arg('signup', '', get_permalink( $create_account_page_id ))) . '">' . $guest_btn2_text . '</a>';
                                    }
                                $guest_data .= '</div>';
                            $guest_data .= '</div>';
                        $guest_data .= '</div>';
                    }


                    if ( is_user_logged_in() ) {
                        // get current logged in user data
                        global $current_user;

                        ob_start();
                        do_action('tdw_menu_login_data');
                        $tdw_menu_login_data = ob_get_clean();


                        $logged_in_data = '';

                        if( !$dropdown_only ) {
                            $logged_in_data .= '<' . $toggle_open_tag . ' class="tdw-wml-link tdw-wml-popup">';
                                if( $toggle_text_position == 'before' ) {
                                    $logged_in_data .= $buffy_toggle_text;
                                }

                                $logged_in_data .= '<span class="tdw-wml-avatar" style="background-image:url(' . get_avatar_url($current_user->ID, ['size' => 60]) . ')"></span>';

                                if( $toggle_text_position == '' ) {
                                    $logged_in_data .= $buffy_toggle_text;
                                }
                            $logged_in_data .= '</' . $toggle_close_tag . '>';
                        }

                        if( $disable_dropdown == '' ) {
                            $logged_in_data .= '<div class="tdw-wml-menu tdw-wml-account">';
                                $logged_in_data .= '<div class="tdw-wml-menu-inner">';
                                    $logged_in_data .= '<div class="tdw-wml-menu-header">' . __td('Hello', TD_THEME_NAME) . ', <span>' . $current_user->display_name . '</span></div>';

                                    $logged_in_data .= '<div class="tdw-wml-menu-content">';
                                        $logged_in_data .= '<ul class="tdw-wml-menu-list">';

                                            if ( false !== $my_account_permalink ) {

                                                $logged_in_data .= '<li><a href="' . esc_url($my_account_permalink) . '">' . __td('My ' . (empty($tdw_menu_login_data) ? '' : 'subscription ') . 'account', TD_THEME_NAME) . '</a></li>';
                                                $logged_in_data .= '<li><a href="' . esc_url(add_query_arg('account_details', '', $my_account_permalink)) . '">' . __td('Account details', TD_THEME_NAME) . '</a></li>';
                                                $logged_in_data .= '<li><a href="' . esc_url(add_query_arg('subscriptions', '', $my_account_permalink)) . '">' . __td('Subscriptions', TD_THEME_NAME) . '</a></li>';

                                                if( $tdw_menu_login_data != '' ) {
                                                    $logged_in_data .= '<li class="tdw-wml-menu-item-sep"></li>';
                                                }

                                            }

                                        $logged_in_data .= '</ul>';

                                        $logged_in_data .= $tdw_menu_login_data;

                                        if( !empty($pages) ) {
                                            $logged_in_data .= '<ul class="tdw-wml-menu-list">';
                                                $logged_in_data .= '<li class="tdw-wml-menu-item-sep"></li>';

                                                foreach ( $pages as $page ) {
                                                    $logged_in_data .= '<li><a href="' . esc_url($page['url']). '">' . $page['title'] . '</a></li>';
                                                }
                                            $logged_in_data .= '</ul>';
                                        }

                                    $logged_in_data .= '</div>';

                                    $logged_in_data .= '<div class="tdw-wml-menu-footer">';
                                        $logged_in_data .= '<a href="' . wp_logout_url(home_url( '/' )) . '">';
                                            $logged_in_data .= $logout_txt;

                                            $logged_in_data .= $logout_icon_html;
                                        $logged_in_data .= '</a>';
                                    $logged_in_data .= '</div>';
                                $logged_in_data .= '</div>';
                            $logged_in_data .= '</div>';
                        }

                        if ( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) {
                            if( $show_version == 'guest' ) {
                                $buffy .= $guest_data;
                            } else {
                                $buffy .= $logged_in_data;
                            }
                        } else {
                            $buffy .= $logged_in_data;
                        }
                    } else {
                        $buffy .= $guest_data;
                    }
                $buffy .= '</div>';
            $buffy .= '</div>';

        $buffy .= '</div> <!-- ./block -->';

        return $buffy;
    }
}
