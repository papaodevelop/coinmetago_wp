<?php
//check if admin allow registration
$users_can_register = get_option('users_can_register');

$users_can_register_form = '';
$users_can_register_link = '';

$login_captcha_html = '';
$register_captcha_html = '';
$show_captcha = td_util::get_option('tds_captcha');
$captcha_site_key = td_util::get_option('tds_captcha_site_key');

if ($show_captcha == 'show' && $captcha_site_key != '') {
    $login_captcha_html = '<input type="hidden" id="gRecaptchaResponseMobL" name="gRecaptchaResponse" data-sitekey="' . $captcha_site_key . '" >';
    $register_captcha_html = '<input type="hidden" id="gRecaptchaResponseMobR" name="gRecaptchaResponse" data-sitekey="' . $captcha_site_key . '" >';
}

if ($users_can_register == 1) {

    //add the Register tab to the modal window if `Anyone can register` chec
    $users_can_register_link = '<a id="signin-register-link-mob">' . __td('Create an account', TD_THEME_NAME) . '</a>';

    $users_can_register_form = '
            <div id="td-register-mob" class="td-login-animation td-login-hide-mob">
            	<!-- close button -->
	            <div class="td-register-close">
	                <a href="#" aria-label="Back" class="td-back-button"><i class="td-icon-read-down"></i></a>
	                <div class="td-login-title">' . __td('Sign up', TD_THEME_NAME) . '</div>
	                <!-- close button -->
		            <div class="td-mobile-close">
		                <a href="#" aria-label="Close"><i class="td-icon-close-mobile"></i></a>
		            </div>
	            </div>
            	<div class="td-login-panel-title"><span>' . __td('Welcome!', TD_THEME_NAME) . '</span>' . __td('Register for an account', TD_THEME_NAME) .'</div>
                <form class="td-login-form-wrap" action="#" method="post">
	                <div class="td_display_err"></div>
	                <div class="td-login-inputs"><input class="td-login-input" type="text" name="register_email" id="register_email-mob" value="" required><label for="register_email-mob">' . __td('your email', TD_THEME_NAME) .'</label></div>
	                <div class="td-login-inputs"><input class="td-login-input" type="text" name="register_user" id="register_user-mob" value="" required><label for="register_user-mob">' . __td('your username', TD_THEME_NAME) .'</label></div>
	                <input type="button" name="register_button" id="register_button-mob" class="td-login-button" value="' . __td('REGISTER', TD_THEME_NAME) . '">
	                ' . $register_captcha_html . '
	                <div class="td-login-info-text">' . __td('A password will be e-mailed to you.', TD_THEME_NAME) . '</div>
	                ' . get_the_privacy_policy_link('<div class="td-login-info-text">', '</div>') . '
                </form>
            </div>';
}

echo '
            <div id="td-login-mob" class="td-login-animation td-login-hide-mob">
            	<!-- close button -->
	            <div class="td-login-close">
	                <a href="#" aria-label="Back" class="td-back-button"><i class="td-icon-read-down"></i></a>
	                <div class="td-login-title">' . __td('Sign in', TD_THEME_NAME) . '</div>
	                <!-- close button -->
		            <div class="td-mobile-close">
		                <a href="#" aria-label="Close"><i class="td-icon-close-mobile"></i></a>
		            </div>
	            </div>
	            <form class="td-login-form-wrap" action="#" method="post">
	                <div class="td-login-panel-title"><span>' . __td('Welcome!', TD_THEME_NAME) . '</span>' . __td('Log into your account', TD_THEME_NAME) .'</div>
	                <div class="td_display_err"></div>
	                <div class="td-login-inputs"><input class="td-login-input" autocomplete="username" type="text" name="login_email" id="login_email-mob" value="" required><label for="login_email-mob">' . __td('your username', TD_THEME_NAME) .'</label></div>
	                <div class="td-login-inputs"><input class="td-login-input" autocomplete="current-password" type="password" name="login_pass" id="login_pass-mob" value="" required><label for="login_pass-mob">' . __td('your password', TD_THEME_NAME) .'</label></div>
	                <input type="button" name="login_button" id="login_button-mob" class="td-login-button" value="' . __td('LOG IN', TD_THEME_NAME) . '">
	                ' . $login_captcha_html . '
	                <div class="td-login-info-text">
	                <a href="#" id="forgot-pass-link-mob">' . __td('Forgot your password?', TD_THEME_NAME) . '</a>
	                </div>
	                <div class="td-login-register-link">
	                ' . $users_can_register_link . '
	                </div>
	                
	                ' . get_the_privacy_policy_link('<div class="td-login-info-text">', '</div>') . '

                </form>
            </div>

            
            
            ' . $users_can_register_form . '
            
            <div id="td-forgot-pass-mob" class="td-login-animation td-login-hide-mob">
                <!-- close button -->
	            <div class="td-forgot-pass-close">
	                <a href="#" aria-label="Back" class="td-back-button"><i class="td-icon-read-down"></i></a>
	                <div class="td-login-title">' . __td('Password recovery', TD_THEME_NAME) . '</div>
	            </div>
	            <div class="td-login-form-wrap">
	                <div class="td-login-panel-title">' . __td('Recover your password', TD_THEME_NAME) .'</div>
	                <div class="td_display_err"></div>
	                <div class="td-login-inputs"><input class="td-login-input" type="text" name="forgot_email" id="forgot_email-mob" value="" required><label for="forgot_email-mob">' . __td('your email', TD_THEME_NAME) .'</label></div>
	                <input type="button" name="forgot_button" id="forgot_button-mob" class="td-login-button" value="' . __td('Send My Pass', TD_THEME_NAME) . '">
                </div>
            </div>
';