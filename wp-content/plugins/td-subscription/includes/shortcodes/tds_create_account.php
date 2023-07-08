<?php

/**
 * Class tds_create_account
 */

class tds_create_account extends td_block {

	public function get_custom_css() {

        // $unique_block_class
        $unique_block_class = $this->block_uid;

		$compiled_css = '';

		/** @noinspection CssInvalidAtRule */
		$raw_css =
            "<style>

                /* @style_general_tds_page_block */
                .tds-page-block {
                    transform: translateZ(0);
                    font-family: -apple-system,BlinkMacSystemFont,\"Segoe UI\",Roboto,Oxygen-Sans,Ubuntu,Cantarell,\"Helvetica Neue\",sans-serif;
                    font-size: 14px;
                }
                .tds-page-block .td-element-style {
                    z-index: -1;
                }
                .tds-page-block a:not(.tds-s-btn) {
                    color: #0489FC;
                }
                .tds-page-block a:not(.tds-s-btn):hover {
                    color: #152BF7;
                }

                /* @style_general_tds_create_account */
                .tds_create_account .tds-s-fb-open .tds-s-fc-inner,
                .tds_create_account .tds-s-fb-open .tds-s-form-footer,
                .tds_create_account .tds-s-fb-open .tds-s-cal-page-switch {
                    opacity: .5;
                    pointer-events: none; 
                }
                .tds_create_account .tds-s-cal-page-switch {
                    margin-top: 20px;
                    font-size: .929em;
                    line-height: 1.3;
                    text-align: center;
                    color: #666;                  
                }
                .tds_create_account .tds-s-cal-page-switch a {
                    font-weight: 600;
                }
                body .tds_create_account .tds-s-form .tds-s-fc-inner {
                    margin-bottom: 0;
                }
                body .tds_create_account .tds-s-form .tds-s-fc-inner:after {
                    display: none;
                }
                .tds_create_account .tds-s-form-login .tds-s-notif,
                .tds_create_account .tds-s-register-form .tds-s-notif,
                .tds_create_account .tds-s-form-pass-recovery .tds-s-notif,
                .tds_create_account .tds-s-form-login .tds-s-notif-descr,
                .tds_create_account .tds-s-register-form .tds-s-notif-descr,
                .tds_create_account .tds-s-form-pass-recovery .tds-s-notif-descr {
                    text-align: center;
                }
                .tds_create_account .tds-s-form-login .tds-s-notif-info:not(:last-child),
                .tds_create_account .tds-s-register-form .tds-s-notif-info:not(:last-child),
                .tds_create_account .tds-s-form-pass-recovery .tds-s-notif-info:not(:last-child) {
                    margin-bottom: 32px;
                }
                .tds_create_account .tds-s-form-login .tds-s-notif-error:not(:first-child),
                .tds_create_account .tds-s-register-form .tds-s-notif-error:not(:first-child),
                .tds_create_account .tds-s-form-pass-recovery .tds-s-notif-error:not(:first-child),
                .tds_create_account .tds-s-form-login .tds-s-notif-success:not(:first-child),
                .tds_create_account .tds-s-register-form .tds-s-notif-success:not(:first-child),
                .tds_create_account .tds-s-form-pass-recovery .tds-s-notif-success:not(:first-child) {
                    margin-top: 28px;
                }
                .tds_create_account .tds-s-form-login .tds-s-btn,
                .tds_create_account .tds-s-register-form .tds-s-btn,
                .tds_create_account .tds-s-form-pass-recovery .tds-s-btn {
                    width: 100%;
                }
                .tds_create_account .tds-s-form-login {
                    margin-bottom: 0;
                    padding-bottom: 0;
                    border: 0;
                }
                .tds_create_account .tds-s-form-login .tds-s-form-group:nth-child(2) .tds-s-form-label {
                    display: flex;
                }
                .tds_create_account .tds-s-form-login .tds-s-form-group:nth-child(2) .tds-s-form-label a {
                    margin-left: auto;
                }
                .tds_create_account .tds-s-form-footer {
                    flex-direction: column;
                }
                .tds_create_account .tds-s-form .tds-s-form-footer .tds-s-btn {
                    margin-right: 0;
                }
                .tds_create_account .tds-s-form-footer .td-login-social {
                    width: 100%;
                    margin-top: 14px;
                }
                
                
                /* @all_input_border */
                body .$unique_block_class .tds-s-form .tds-s-form-input {
                    border: @all_input_border @all_input_border_style @all_input_border_color;
                }
                /* @input_radius */
                body .$unique_block_class .tds-s-form .tds-s-form-input {
                    border-radius: @input_radius;
                }
                
                /* @btn_radius */
                body .$unique_block_class .tds-s-btn {
                    border-radius: @btn_radius;
                }
                
                /* @notif_radius */
                body .$unique_block_class .tds-s-notif {
                    border-radius: @notif_radius;
                }
                
                
                /* @accent_color */
                body .$unique_block_class.tds-page-block a:not(.tds-s-btn) {
                    color: @accent_color;
                }
                body .$unique_block_class .tds-s-btn {
                    background-color: @accent_color;
                }
                body .$unique_block_class .tds-s-form .tds-s-form-group:not(.tds-s-fg-error) .tds-s-form-input:focus:not([readonly]) {
                    border-color: @accent_color !important;
                }
                /* @input_outline_accent_color */
                body .$unique_block_class .tds-s-form .tds-s-form-group:not(.tds-s-fg-error) .tds-s-form-input:focus:not([readonly]) {
                    outline-color: @input_outline_accent_color;
                }
                
                /* @a_color_h */
                body .$unique_block_class.tds-page-block a:not(.tds-s-btn):hover {
                    color: @a_color_h;
                }
                
                /* @sec_color */
                body .$unique_block_class h2.tds-spsh-title {
                    color: @sec_color;
                }
                
                /* @form_help_color */
                body .$unique_block_class .tds-s-form .tds-s-form-group .tds-s-list-item {
                    color: @form_help_color;
                }
                /* @form_foot_color */
                body .$unique_block_class .tds-s-cal-page-switch {
                    color: @form_foot_color;
                }
                /* @label_color */
                body .$unique_block_class .tds-s-form .tds-s-form-label {
                    color: @label_color;
                }
                /* @input_color */
                body .$unique_block_class .tds-s-form .tds-s-form-input {
                    color: @input_color;
                }
                body .$unique_block_class .tds-s-form .tds-s-form-input:-webkit-autofill,
                body .$unique_block_class .tds-s-form .tds-s-form-input:-webkit-autofill:hover,
                body .$unique_block_class .tds-s-form .tds-s-form-input:-webkit-autofill:focus,
                body .$unique_block_class .tds-s-form .tds-s-form-input:-webkit-autofill:active {
                    -webkit-text-fill-color: @input_color;
                }
                /* @input_bg */
                body .$unique_block_class .tds-s-form .tds-s-form-input {
                    background-color: @input_bg;
                }
                body .$unique_block_class .tds-s-form .tds-s-form-input:-webkit-autofill,
                body .$unique_block_class .tds-s-form .tds-s-form-input:-webkit-autofill:hover,
                body .$unique_block_class .tds-s-form .tds-s-form-input:-webkit-autofill:focus,
                body .$unique_block_class .tds-s-form .tds-s-form-input:-webkit-autofill:active {
                    -webkit-box-shadow: 0 0 0 1000px @input_bg inset !important;
                }
                
                /* @btn_color */
                body .$unique_block_class .tds-s-btn {
                    color: @btn_color;
                }
                /* @btn_color_h */
                body .$unique_block_class .tds-s-btn:hover {
                    color: @btn_color_h;
                }
                /* @btn_bg_h */
                body .$unique_block_class .tds-s-btn:hover {
                    background-color: @btn_bg_h;
                }
                
                /* @notif_info_color */
                body .$unique_block_class .tds-s-notif-info {
                    color: @notif_info_color;
                }
                /* @notif_info_bg */
                body .$unique_block_class .tds-s-notif-info {
                    background-color: @notif_info_bg;
                }
                /* @notif_succ_color */
                body .$unique_block_class .tds-s-notif-success {
                    color: @notif_succ_color;
                }
                /* @notif_succ_bg */
                body .$unique_block_class .tds-s-notif-success {
                    background-color: @notif_succ_bg;
                }
                /* @notif_error_color */
                body .$unique_block_class .tds-s-notif-error {
                    color: @notif_error_color;
                }
                /* @notif_error_bg */
                body .$unique_block_class .tds-s-notif-error {
                    background-color: @notif_error_bg;
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
        $res_ctx->load_settings_raw( 'style_general_tds_page_block', 1 );
        $res_ctx->load_settings_raw( 'style_general_tds_create_account', 1 );



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
            $res_ctx->load_settings_raw( 'input_outline_accent_color', td_util::hex2rgba($accent_color, 0.1) );
        }
        $res_ctx->load_settings_raw( 'a_color_h', $res_ctx->get_shortcode_att('a_color_h') );

        $res_ctx->load_settings_raw( 'sec_color', $res_ctx->get_shortcode_att('sec_color') );

        $res_ctx->load_settings_raw( 'form_help_color', $res_ctx->get_shortcode_att('form_help_color') );
        $res_ctx->load_settings_raw( 'form_foot_color', $res_ctx->get_shortcode_att('form_foot_color') );
        $res_ctx->load_settings_raw( 'label_color', $res_ctx->get_shortcode_att('label_color') );
        $res_ctx->load_settings_raw( 'input_color', $res_ctx->get_shortcode_att('input_color') );
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

        $notif_error_color = $res_ctx->get_shortcode_att('notif_error_color');
        $res_ctx->load_settings_raw( 'notif_error_color', $notif_error_color );
        if( !empty( $notif_error_color ) ) {
            $res_ctx->load_settings_raw('notif_error_bg', td_util::hex2rgba($notif_error_color, 0.12));
        }



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_text' );

	}

	function __construct() {
		parent::disable_loop_block_features();
	}

	function render( $atts, $content = null ) {

        parent::render( $atts );


        // flag to check if we are in composer
        $is_composer = false;
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $is_composer = true;
        }

        // show a specific version of the shortcode in composer
        $show_version_in_composer = $this->get_att('show_version');

        // show notifications in composer
        $show_notif_in_composer = $this->get_att('show_notif');


        // logged out html
        $logged_in_html = '';
        $logged_in_html .= '<div class="tds-s-ca-logged-in">';
            $logged_in_html .= '<div class="tds-s-notif tds-s-notif-info">';
                $logged_in_html .= '<div class="tds-s-notif-descr">' . __td('You must be logged out to view this page.', TD_THEME_NAME) . '</div>';
            $logged_in_html .= '</div>';
        $logged_in_html .= '</div>';


        // account activation message
        $account_activation_html = '';
        if( isset( $_GET['account_activation'] ) ) {
            $acc_activation_status = $_GET['account_activation'];
            $account_activation_notif_class = '';
            $account_activation_notif_txt = '';

            switch( $acc_activation_status ) {
                case 'success':
                    $account_activation_notif_class = 'success';
                    $account_activation_notif_txt .= __td('Your account has been successfully activated!', TD_THEME_NAME);
                    break;
                case 'already_activated':
                    $account_activation_notif_class = 'info';
                    $account_activation_notif_txt .= __td('Your account has already been activated!', TD_THEME_NAME);
                    break;
                case 'invalid_link':
                    $account_activation_notif_class = 'error';
                    $account_activation_notif_txt .= __td('Check your email for the correct activation link. This link is invalid.', TD_THEME_NAME);
                    break;
            }

            $account_activation_html .= '<div class="tds-s-page-sec tds-s-page-acc-activation">';
                $account_activation_html .= '<div class="tds-s-page-sec-header">';
                    $account_activation_html .= '<h2 class="tds-spsh-title">' . __td('Account activation', TD_THEME_NAME) . '</h2>';
                $account_activation_html .= '</div>';

                $account_activation_html .= '<div class="tds-s-page-sec-content">';
                    $account_activation_html .= '<div class="tds-s-notif tds-s-notif-sm tds-s-notif-' . $account_activation_notif_class . '">';
                        $account_activation_html .= '<div class="tds-s-notif-descr">';
                            $account_activation_html .= $account_activation_notif_txt;
                        $account_activation_html .= '</div>';
                    $account_activation_html .= '</div>';
                $account_activation_html .= '</div>';
            $account_activation_html .= '</div>';
        }


        // remove top border on Newsmag
        $block_classes = str_replace('td-pb-border-top', '', $this->get_block_classes());


		$buffy = '<div class="tds-page-block ' . $block_classes . '" ' . $this->get_block_html_atts() . '>';

			$buffy .= $this->get_block_css(); // get block css
			$buffy .= $this->get_block_js(); // get block js


            $buffy .= '<div class="tds-block-inner td-fix-index">';

                if (!is_user_logged_in() || $is_composer || $account_activation_html != '') {

                    $tds_login_url = '#tds_login';
                    $tds_register_url = '#tds_register';
                    $tds_lost_password_url = '#tds_password_recovery';
                    $tds_my_account_url = home_url();

                    $login_register_page_id = tds_util::get_tds_option('create_account_page_id');

                    if ( class_exists('SitePress') ) {
                        $translated_login_register_page_id = apply_filters('wpml_object_id', $login_register_page_id, 'page');
                        if ( !is_null($translated_login_register_page_id) ) {
                            $login_register_page_id = $translated_login_register_page_id;
                        }

                    }

                    if (!is_null($login_register_page_id) && is_page($login_register_page_id)) {

                        $login_register_permalink = get_permalink($login_register_page_id);
                        if (false !== $login_register_permalink) {
                            $tds_login_url = esc_url($login_register_permalink);
                            $tds_register_url = esc_js(add_query_arg('signup', '', $login_register_permalink));
                            $tds_lost_password_url = esc_url(add_query_arg('password_recovery', '', $login_register_permalink));
                        }
                    }

                    $wp_login_args = ['label_remember' => 'Remember me', 'label_username' => 'Username or Email address'];
                    if ( ! empty( $_REQUEST[ 'ref_url' ] ) ) {
                        $tds_login_url = esc_url(add_query_arg('ref_url', $_REQUEST[ 'ref_url' ], $tds_login_url));
                        $tds_register_url = esc_js(add_query_arg('ref_url', $_REQUEST[ 'ref_url' ], $tds_register_url));
                        try {
                            $ref_url = base64_decode($_REQUEST[ 'ref_url' ]);
                            if (!empty($ref_url)) {
                                $wp_login_args['redirect'] = $ref_url;
                            }
                        } catch (Exception $ex) {
                            //
                        }
                    } else {
                        $my_account_page_id = tds_util::get_tds_option('my_account_page_id');

                        if (!is_null($my_account_page_id)) {
                            $my_account_permalink = get_permalink($my_account_page_id);

                            if (false !== $my_account_permalink) {
                                $tds_my_account_url = $my_account_permalink;
                            }
                        }
                    }

                    $users_can_register = get_option('users_can_register');
                    $login_captcha_html = '';
                    $register_captcha_html = '';
                    $show_captcha = td_util::get_option('tds_captcha');
                    $captcha_site_key = td_util::get_option('tds_captcha_site_key');

                    if ($show_captcha == 'show' && $captcha_site_key != '') {
                        $login_captcha_html = '<input type="hidden" id="gRecaptchaResponseL" name="gRecaptchaResponse" data-sitekey="' . $captcha_site_key . '" >';
                        $register_captcha_html = '<input type="hidden" id="gRecaptchaResponseR" name="gRecaptchaResponse" data-sitekey="' . $captcha_site_key . '" >';
                    }

                    $fb_login_enabled = td_util::get_option('tds_social_login_fb_enable');
                    $fb_login_app_id = td_util::get_option('tds_social_login_fb_app_id');

                    $fb_login_btn = '';
                    if( $fb_login_enabled == 'true' && $fb_login_app_id != '' ) {
                        $fb_login_btn = '<button class="td-login-social td-login-fb td-login-fb-subscr">' . __td('Log in With Facebook', TD_THEME_NAME) . '</button>';
                    }

                    if( $is_composer && $show_version_in_composer == 'logged_in' ) {
                        $buffy .= $logged_in_html;
                    } else if( $account_activation_html != '' ) {
                        $buffy .= $account_activation_html;
                    } else if ( isset($_GET['signup']) || ( $is_composer && $show_version_in_composer == 'register' ) ) {
                        ob_start();
                        ?>

                        <div class="tds-s-page-sec tds-s-page-register">
                            <div class="tds-s-page-sec-header">
                                <h2 class="tds-spsh-title"><?php echo __td('Sign up', TD_THEME_NAME) ?></h2>
                            </div>

                            <div class="tds-s-page-sec-content">
                                <div id="tds-register-div" class="tds-s-form tds-s-register-form">
                                    <div class="tds-s-form-content">
                                        <div class="tds-s-fc-inner">
                                            <div class="tds-s-form-group">
                                                <label class="tds-s-form-label" for="tds_register_email"><?php echo __td('Email address', TD_THEME_NAME) ?></label>
                                                <input class="tds-s-form-input" type="text" name="register_email" id="tds_register_email" value="" required>
                                            </div>

                                            <div class="tds-s-form-group">
                                                <label class="tds-s-form-label" for="tds_register_user"><?php echo __td('Username', TD_THEME_NAME) ?></label>
                                                <input class="tds-s-form-input" type="text" name="register_user" id="tds_register_user" value="" required>
                                            </div>

                                            <div class="tds-s-form-group">
                                                <label class="tds-s-form-label" for="tds_register_pass"><?php echo __td('Password', TD_THEME_NAME) ?></label>
                                                <input class="tds-s-form-input" type="password" name="register_pass" id="tds_register_pass" value="" required>
                                                <ul class="tds-s-list">
                                                    <li class="tds-s-list-item"><?php echo __td("must contain at least one lower case (a..z)", TD_THEME_NAME) ?></li>
                                                    <li class="tds-s-list-item"><?php echo __td("must contain at least one upper case (A..Z)", TD_THEME_NAME) ?></li>
                                                    <li class="tds-s-list-item"><?php echo __td('must contain at least 6 characters in length', TD_THEME_NAME) ?></li>
                                                </ul>
                                            </div>

                                            <div class="tds-s-form-group">
                                                <label class="tds-s-form-label" for="tds_register_retype_pass"><?php echo __td('Repeat password', TD_THEME_NAME) ?></label>
                                                <input class="tds-s-form-input" type="password" name="register_retype_pass" id="tds_register_retype_pass" value="" required>
                                            </div>
                                        </div>

                                        <?php if( $is_composer && $show_notif_in_composer ) { ?>
                                            <div class="tds-s-notif tds-s-notif-xsm tds-s-notif-info" style="margin-top:28px;margin-bottom: 0">Sample information message.</div>
                                            <div class="tds-s-notif tds-s-notif-xsm tds-s-notif-success">Sample success message.</div>
                                            <div class="tds-s-notif tds-s-notif-xsm tds-s-notif-error">Sample error message.</div>
                                        <?php } else { ?>
                                            <div class="tds-s-notif tds-s-notif-xsm td_display_err" style="display: none"></div>
                                        <?php } ?>
                                    </div>

                                    <div class="tds-s-form-footer">
                                        <?php

                                            $tds_dashboard_url = '';
                                            $my_account_page_id = tds_util::get_tds_option('my_account_page_id');

                                            if (!is_null($my_account_page_id) && !is_null(get_post($my_account_page_id))) {

                                                $my_account_permalink = get_permalink( $my_account_page_id );
                                                if ( false !== $my_account_permalink ) {
                                                    $tds_dashboard_url = esc_url( $my_account_permalink );
                                                }
                                            }

                                        ?>
                                        <a id="tds-my-account" href="<?php echo $tds_dashboard_url != '' ? $tds_dashboard_url : home_url() ?>" class="tds-s-btn" style="display:none"><?php echo $tds_dashboard_url != '' ? __td('My account', TD_THEME_NAME) : __td('Home', TD_THEME_NAME) ?></a>
                                        <a id="tds-continue-subscription" href="#" class="tds-s-btn" style="display:none"><?php echo __td('Continue', TD_THEME_NAME) ?></a>
                                        <input type="hidden" id="tds-my-account-register" name="redirect_to" value="<?php echo $tds_dashboard_url != '' ? $tds_dashboard_url : home_url() ?>">
                                        <button id="tds_register_button" class="tds-s-btn tds-s-submit"><?php echo __td('Register', TD_THEME_NAME) ?></button>

                                        <?php echo $register_captcha_html ?>
                                        <?php echo $fb_login_btn ?>
                                    </div>
                                </div>

                                <div class="tds-s-cal-page-switch"><?php echo __td('Already have an account?', TD_THEME_NAME) ?> <a href="<?php echo $tds_login_url ?>"><?php echo __td('Login', TD_THEME_NAME) ?></a></div>
                            </div>
                        </div>

                        <?php
                        $buffy .= ob_get_clean();
                    } else if ( isset($_GET['password_recovery']) || ( $is_composer && $show_version_in_composer == 'forgot_pass' ) ) {
                        ob_start();
                        ?>

                        <div class="tds-s-page-sec tds-s-page-pass-recovery">
                            <div class="tds-s-page-sec-header">
                                <h2 class="tds-spsh-title"><?php echo __td('Password recovery', TD_THEME_NAME) ?></h2>
                            </div>

                            <div class="tds-s-page-sec-content">
                                <div id="td-forgot-pass-div" class="tds-s-form tds-s-form-pass-recovery td-login-form-div">
                                    <div class="tds-s-form-content">
                                        <div class="tds-s-fc-inner">
                                            <div class="tds-s-form-group">
                                                <label class="tds-s-form-label" for="forgot_email"><?php echo __td('Email address', TD_THEME_NAME) ?></label>
                                                <input class="tds-s-form-input" type="text" name="forgot_email" id="tds_forgot_email" value="" required>
                                            </div>
                                        </div>

                                        <?php if( $is_composer && $show_notif_in_composer ) { ?>
                                            <div class="tds-s-notif tds-s-notif-xsm tds-s-notif-info" style="margin-top:28px;margin-bottom: 0">Sample information message.</div>
                                            <div class="tds-s-notif tds-s-notif-xsm tds-s-notif-success">Sample success message.</div>
                                            <div class="tds-s-notif tds-s-notif-xsm tds-s-notif-error">Sample error message.</div>
                                        <?php } else { ?>
                                            <div class="tds-s-notif tds-s-notif-xsm td_display_err" style="display: none"></div>
                                        <?php } ?>
                                    </div>

                                    <div class="tds-s-form-footer">
                                        <button name="forgot_button" id="tds_forgot_button" class="tds-s-btn td-login-button"><?php echo __td('Recover password', TD_THEME_NAME) ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        $buffy .= ob_get_clean();
                    } else if ( isset($_GET['password_reset']) || isset($_GET['password_reset_fail']) ) {
                        ob_start();
                        ?>

                        <div class="tds-s-page-sec tds-s-page-pass-recovery">
                            <div class="tds-s-page-sec-header">
                                <h2 class="tds-spsh-title"><?php echo __td('Reset your password', TD_THEME_NAME) ?></h2>
                            </div>

                            <div class="tds-s-page-sec-content">
                                <?php
                                    $reset_pass_error = '';

                                    if( isset($_GET['password_reset_fail']) ) {
                                        if( isset($_GET['expired_key']) ) {
                                            $reset_pass_error = __td('The password reset key has expired.', TD_THEME_NAME);
                                        } else {
                                            $reset_pass_error = __td('The password reset key is invalid.', TD_THEME_NAME);
                                        }
                                    } else {
                                        $reset_pass_key = '';
                                        $reset_pass_user_login = '';

                                        if( isset($_GET['key']) ) {
                                            $reset_pass_key = $_GET['key'];
                                        }
                                        if( isset($_GET['login']) ) {
                                            $reset_pass_user_login = $_GET['login'];
                                        }

                                        $user = check_password_reset_key( $reset_pass_key, $reset_pass_user_login );
    
                                        if ( ! $user || is_wp_error( $user ) ) {
                                            if ( $user && $user->get_error_code() === 'expired_key' ) {
                                                $reset_pass_error = __td('The password reset key has expired.', TD_THEME_NAME);
                                            } else {
                                                $reset_pass_error = __td('The password reset key is invalid.', TD_THEME_NAME);
                                            }
                                        }
                                    }

                                    if( $reset_pass_error != '' ) {
                                        echo '<div class="tds-s-notif tds-s-notif-sm tds-s-notif-error"><div class="tds-s-notif-descr">' . $reset_pass_error . '</div></div>';
                                    } else { ?>
                                        <div id="tds-reset-pass-div" class="tds-s-form tds-s-form-pass-reset td-login-form-div">
                                            <div class="tds-s-form-content">
                                                <div class="tds-s-fc-inner">
                                                    <input type="hidden" id="tds_reset_key" value="<?php echo $_GET['key'] ?>">
                                                    <input type="hidden" id="tds_reset_user_login" value="<?php echo $_GET['login'] ?>">
                                                    <input type="hidden" id="tds_reset_redirect" value="<?php echo $tds_login_url ?>">

                                                    <div class="tds-s-form-group">
                                                        <label class="tds-s-form-label" for="tds_reset_new_password"><?php echo __td('New password *', TD_THEME_NAME) ?></label>
                                                        <input class="tds-s-form-input" type="password" name="tds_reset_new_password" id="tds_reset_new_password" value="" required>

                                                        <ul class="tds-s-list">
                                                            <li class="tds-s-list-item"><?php echo __td("must contain at least one lower case (a..z)", TD_THEME_NAME) ?></li>
                                                            <li class="tds-s-list-item"><?php echo __td("must contain at least one upper case (A..Z)", TD_THEME_NAME) ?></li>
                                                            <li class="tds-s-list-item"><?php echo __td('must contain at least 6 characters in length', TD_THEME_NAME) ?></li>
                                                        </ul>
                                                    </div>

                                                    <div class="tds-s-form-group">
                                                        <label class="tds-s-form-label" for="tds_reset_new_password_confirm"><?php echo __td('Repeat new password *', TD_THEME_NAME) ?></label>
                                                        <input class="tds-s-form-input" type="password" name="tds_reset_new_password_confirm" id="tds_reset_new_password_confirm" value="" required>
                                                    </div>
                                                </div>

                                                <div class="tds-s-notif tds-s-notif-xsm td_display_err" style="display: none"></div>
                                            </div>

                                            <div class="tds-s-form-footer">
                                                <button name="reset_button" id="tds_reset_button" class="tds-s-btn td-login-button"><?php echo __td('Save password', TD_THEME_NAME) ?></button>
                                            </div>
                                        </div>
                                    <?php } ?>
                            </div>

                            <div class="tds-s-cal-page-switch"><a href="<?php echo $tds_login_url ?>">Login</a> or <a href="<?php echo $tds_register_url ?>">Sign up</a></div>
                        </div>

                        <?php
                        $buffy .= ob_get_clean();
                    } else {
                        ob_start();
                        ?>

                        <div class="tds-s-page-sec tds-s-page-login">
                            <div class="tds-s-page-sec-header">
                                <h2 class="tds-spsh-title"><?php echo __td('Log In', TD_THEME_NAME) ?></h2>
                            </div>

                            <div class="tds-s-page-sec-content">
                                <div id="tds-login-div" class="tds-s-form tds-s-form-login">
                                    <div class="tds-s-form-content">
                                        <div class="tds-s-fc-inner">
                                            <div class="tds-s-form-group">
                                                <label class="tds-s-form-label" for="tds_register_email"><?php echo __td('Username or Email address', TD_THEME_NAME) ?></label>
                                                <input class="tds-s-form-input" type="text" id="tds_login_email" value="" required>
                                            </div>

                                            <div class="tds-s-form-group">
                                                <label class="tds-s-form-label" for="tds_register_pass">
                                                    <?php echo __td('Password', TD_THEME_NAME) ?>
                                                    <a href="<?php echo $tds_lost_password_url ?>"><?php echo __td('Forgot password?', TD_THEME_NAME) ?></a>
                                                </label>
                                                <input class="tds-s-form-input" type="password" id="tds_login_pass" value="" required>
                                            </div>
                                        </div>

                                        <?php if( $is_composer && $show_notif_in_composer ) { ?>
                                            <div class="tds-s-notif tds-s-notif-xsm tds-s-notif-info" style="margin-top:28px;margin-bottom: 0">Sample information message.</div>
                                            <div class="tds-s-notif tds-s-notif-xsm tds-s-notif-success">Sample success message.</div>
                                            <div class="tds-s-notif tds-s-notif-xsm tds-s-notif-error">Sample error message.</div>
                                        <?php } else { ?>
                                            <div class="tds-s-notif tds-s-notif-xsm td_display_err" style="display: none"></div>
                                        <?php } ?>
                                    </div>

                                    <div class="tds-s-form-footer">
                                        <form id="loginForm" action="#" method="post">
                                        <input type="hidden" id="tds-my-account" name="redirect_to" value="<?php echo $tds_my_account_url ?>">
                                        <button id="tds_login_button" class="tds-s-btn tds-s-submit"><?php echo __td('Log In', TD_THEME_NAME) ?></button>

                                        <?php echo $login_captcha_html ?>
                                        </form>
                                        <?php echo $fb_login_btn ?>
                                    </div>
                                </div>
                                <?php if ( $users_can_register == 1 ) { ?>
                                <div class="tds-s-cal-page-switch"><?php echo __td('Don\'t have an account?', TD_THEME_NAME) ?> <a href="<?php echo $tds_register_url ?>"><?php echo __td('Sign up', TD_THEME_NAME) ?></a></div>
                                <?php } ?>
                            </div>
                        </div>

                        <?php
                        $buffy .= ob_get_clean();
                    }

                } else {
                    $buffy .= $logged_in_html;
                }

		    $buffy .= '</div>';
		$buffy .= '</div>';

		return $buffy;
	}
}
