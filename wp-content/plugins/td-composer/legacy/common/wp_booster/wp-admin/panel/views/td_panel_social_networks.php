<!-- Instagram Account Access Configuration -->
<script type="text/javascript">
    var tdAdminPanelUrl = "<?php echo admin_url('admin.php?page=td_theme_panel'); ?>";
</script>

<!-- sharing -->
<?php echo td_panel_generator::box_start('Social Share', false);
if ( 'Newsmag' == TD_THEME_NAME || ( 'Newspaper' == TD_THEME_NAME && defined('TD_STANDARD_PACK') ) ) { ?>

    <!-- text -->
    <div class="td-box-row">
        <div class="td-box-description td-box-full">
            <p>All the articles of <?php echo TD_THEME_NAME ?> have sharing buttons at the start of the article
                (usually under the title) and at the end of the article (after tags). You can sort the social
                networks with drag and drop.</p>
        </div>
        <div class="td-box-row-margin-bottom"></div>
    </div>


    <div class="td-box-section-separator"></div>


    <!-- ARTICLE sharing top -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">TOP ARTICLE SHARING</span>
            <p>Show or hide the top article sharing on single post</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_top_social_show',
                'true_value' => '',
                'false_value' => 'hide'
            ));
            ?>
        </div>
    </div>

    <!-- ARTICLE top like -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">TOP ARTICLE LIKE</span>
            <p>Show or hide the top article like on single post</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_top_like_show',
                'true_value' => 'show',
                'false_value' => ''
            ));
            ?>
        </div>
    </div>

    <!-- ARTICLE top share text -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">TOP ARTICLE SHARE TEXT</span>
            <p>Show or hide the top article share text on single post</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_top_like_share_text_show',
                'true_value' => 'show',
                'false_value' => ''
            ));
            ?>
        </div>
    </div>

    <!-- TOP sharing style -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">TOP SHARE BUTTONS STYLE</span>
            <p>Change the appearance of the top sharing buttons.</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::visual_select_o(array(
                'ds' => 'td_option',
                'option_id' => 'tds_social_sharing_top_style',
                'values' => td_api_social_sharing_styles::_helper_social_sharing_to_panel_values()
            ));
            ?>
        </div>
    </div>


    <div class="td-box-section-separator"></div>


    <!-- ARTICLE sharing bottom -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">BOTTOM ARTICLE SHARING</span>
            <p>Show or hide the bottom article sharing on post</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_bottom_social_show',
                'true_value' => '',
                'false_value' => 'hide'
            ));
            ?>
        </div>
    </div>


    <!-- ARTICLE bottom like -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">BOTTOM ARTICLE LIKE</span>
            <p>Show or hide the bottom article like on post</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_bottom_like_show',
                'true_value' => '',
                'false_value' => 'hide'
            ));
            ?>
        </div>
    </div>

    <!-- ARTICLE bottom share text -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">BOTTOM ARTICLE SHARE TEXT</span>
            <p>Show or hide the bottom article share text on single post</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_bottom_like_share_text_show',
                'true_value' => 'show',
                'false_value' => ''
            ));
            ?>
        </div>
    </div>

    <!-- BOTTOM sharing style -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">BOTTOM SHARE BUTTONS STYLE</span>
            <p>Change the appearance of the bottom sharing buttons.</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::visual_select_o(array(
                'ds' => 'td_option',
                'option_id' => 'tds_social_sharing_bottom_style',
                'values' => td_api_social_sharing_styles::_helper_social_sharing_to_panel_values()
            ));
            ?>
        </div>
    </div>


    <div class="td-box-section-separator"></div>
<?php } ?>


<!-- Twitter name -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">TWITTER USERNAME</span>
        <p>This will be used in the tweet for the via parameter. The site name will be used if no twitter username
            is provided. <br> Do not include the @</p>
    </div>
    <div class="td-box-control-full">
        <?php
        echo td_panel_generator::input(array(
            'ds' => 'td_option',
            'option_id' => 'tds_tweeter_username'
        ));
        ?>
    </div>
</div>


<div class="td-box-section-separator"></div>


<!-- Twitter name -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">SOCIAL NETWORKS</span>
        <p>Select active social share links and sort them with drag and drop:</p>
    </div>
    <div class="td-box-control-full">
        <?php
        echo td_panel_generator::social_drag_and_drop(array(
            'ds' => 'td_social_drag_and_drop'
        ));
        ?>
    </div>
</div>

<?php echo td_panel_generator::box_end(); ?>

<?php echo td_panel_generator::box_start( 'Google Recaptcha', false ); ?>

<!-- text -->
<div class="td-box-row">
    <div class="td-box-description td-box-full">
        <p>reCAPTCHA by Google is a free service that protects your website from spam and abuse. The latest version of the reCAPTCHA API v3 works in the background and it will provide a score that tells you how suspicious an interaction is.</p>
        <p> Google reCAPTCHA v3 will apply on the following features:</p>
        <ul>
            <li>Login/Register Modal</li>
            <li>Mobile Theme Login/Register(tagDiv Mobile Theme plugin)</li>
            <li>Comments system</li>
            <li>Subscription Login/Register(tagDiv Opt-In Bulder plugin)</li>
        </ul>

    </div>
    <div class="td-box-row-margin-bottom"></div>
</div>


<div class="td-box-section-separator"></div>

<!-- Recaptcha: enable disable -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">Use Google reCAPTCHA v3</span>
        <p>Enable/disable Google reCAPTCHA v3.
            <?php td_util::tooltip_html('
                        <p> If you enable this option, please fill up the <a href="https://www.google.com/recaptcha/about/" target="_blank">Google reCAPTCHA v3</a> keys bellow </p>
                        
                ', 'right')?>
        </p>

    </div>
    <div class="td-box-control-full">
        <?php
        echo td_panel_generator::checkbox(array(
            'ds' => 'td_option',
            'option_id' => 'tds_captcha',
            'true_value' => 'show',
            'false_value' => ''
        ));
        ?>
    </div>
</div>
<!-- Recaptcha Site Key -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">Site KEY</span>
        <p>Click <a href="https://www.google.com/recaptcha/admin/create" target="_blank">here</a> to generate your Google reCAPTCHA keys.</p>
    </div>
    <div class="td-box-control-full">
        <?php
        echo td_panel_generator::input(array(
            'ds' => 'td_option',
            'option_id' => 'tds_captcha_site_key'
        ));
        ?>
    </div>
</div>
<!-- Recaptcha Secret Key -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">Secret KEY</span>
        <p>Click <a href="https://www.google.com/recaptcha/admin/create" target="_blank">here</a> to generate your Google reCAPTCHA keys.</p>
    </div>
    <div class="td-box-control-full">
        <?php
        echo td_panel_generator::input(array(
            'ds' => 'td_option',
            'option_id' => 'tds_captcha_secret_key'
        ));
        ?>
    </div>
</div>
<!-- reCAPTCHA v3 user score -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">reCAPTCHA User Score Limit</span>
        <p>The theme currently uses Google's default of 0.5 as a necessary score to clear the captcha (where 1.0 means the best user interaction with your site and 0.0 the worst interaction). See <a href="https://developers.google.com/recaptcha/docs/v3" target="_blank">this guide</a></p>
    </div>
    <div class="td-box-control-full">
        <?php
        echo td_panel_generator::input(array(
            'ds' => 'td_option',
            'option_id' => 'tds_captcha_score',
            'placeholder' => '0.5'
        ));
        ?>
    </div>
</div>

<?php echo td_panel_generator::box_end(); ?>

<!-- Facebook Account (Business) -->
<?php echo td_panel_generator::box_start( 'Facebook Account', false ); ?>

<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">Configure your Facebook Account</span>
        <p>
            Used for displaying data from business pages you own/manage through your account, like facebook page likes or instagram page followers count.<br>
            Use the button below to connect to your facebook account and authorize our application to share data from business pages you own/manage through your account.

                <a href="#" class="td-tooltip" style="margin-left: 5px;" data-position="right" data-content-as-html="true" title="<?php echo esc_attr('<p>When connecting(linking) a Facebook Account, permissions will be asked for all facebook & instagram business pages managed through that account and will also connect to the corresponding instagram business or creator account(page) automatically if permission have been given.</p>') ?>">note</a><br>
        </p>
    </div>
    <div class="td-box-section-separator" style="margin-top: 30px;"></div>
</div>
<div class="td-box-row">
    <div class="td-box-control" style="padding-bottom: 32px;">
	    <?php

	    // redirect_uri param, this is where the user is redirected after fb login authorization..
	    $td_facebook_api_redirect_uri = 'https://tagdiv.com/td_facebook_api/';

	    // state param, used as return uri
	    $state = admin_url('admin.php?page-td_theme_panel&td_fb_connect_account');

	    // td_options fb_connected_account
	    $td_options_fb_connected_account = td_options::get_array( 'td_fb_connected_account');

	    // fb connected account user info
	    $td_fb_account_user_info = !empty( $td_options_fb_connected_account['fb_account_user'] ) ? $td_options_fb_connected_account['fb_account_user'] : array();

	    // fb connected account pages data
	    $td_fb_account_pages = !empty( $td_options_fb_connected_account['fb_account_pages_data'] ) ? $td_options_fb_connected_account['fb_account_pages_data'] : array();
        $connected_button_txt = ( empty( $td_options_fb_connected_account ) ) ? 'Connect FB Account' : 'Reconnect FB Account';
        $fb_account_user_sep_display = ( empty( $td_options_fb_connected_account ) ) ? ' display: none;' : '';

	    ?>

        <!-- fb connect/reconnect account button -->
        <a class="button button-secondary td-fb-add-account <?php //echo $disabled ?>"
           href="https://www.facebook.com/dialog/oauth?client_id=198698130522676&redirect_uri=<?php echo $td_facebook_api_redirect_uri ?>&scope=pages_show_list,pages_read_engagement,instagram_basic&state=<?php echo $state ?>"
           style=""
        ><?php echo $connected_button_txt ?></a>

        <div class="td-box-section-separator fb-account-user-sep" style="margin-top: 30px;<?php echo $fb_account_user_sep_display ?>"></div>

        <!-- fb connected account(user) data -->
        <div class="td-box-control td-box-control-fb-account-user">
	        <?php
	        if ( !empty($td_options_fb_connected_account) ) {
		        if ( !empty( $td_fb_account_user_info ) ) {
			        $fb_login_access_token_expires_in_ts = $td_options_fb_connected_account['fb_login_access_token_expires_in_ts'];
			        $td_human_readable_ts = td_human_readable_ts( $fb_login_access_token_expires_in_ts );
			        if ( strpos( $td_human_readable_ts, 'ago' ) === false ) {
				        $fb_login_access_token_expires_in = '<span style="color: #0a9e01;">expires in ' . $td_human_readable_ts . '</span>';
			        } else {
				        $fb_login_access_token_expires_in = '<span style="color: orangered;">expired ' . $td_human_readable_ts . '</span>';
			        }

			        ?>
                        <!-- fb connected account description -->
                        <div class="td-box-description">
                            <span class="td-box-title">Facebook Account</span>
                            <p>This is your connected facebook account.</p>
                        </div>
                        <div class="about-wrap">
                            <!-- fb connected account user -->
                            <div class="td-fb-user-wrap">
                                <div class="td-fb-account-user-photo"><img src="<?php echo $td_fb_account_user_info['profile_picture'] ?>" alt=""></div>
                                <div class="td-fb-account-user-name"><?php echo $td_fb_account_user_info['name'] ?></div>
                                <div class="td-access-token-trigger">
                                    <div class="td-classic-check">
                                        <input type="checkbox" id="show_tokens_fb_login" name="" value="">
                                        <label for="show_tokens_fb_login" class="td-check-wrap">
                                            <span class="td-check"></span><span class="td-check-title">Show FB Login Access Token</span>
                                        </label>
                                    </div>
                                </div>
                                <!-- fb remove connected account button -->
                                <div class="td-fb-account-remove">
                                    <a class="button button-secondary td-fb-remove-account" href="#">Remove Connected FB Account</a>
                                </div>
                            </div>
                            <!-- fb connected account access token info -->
                            <div class="td-access-token">
                                <div class="td-access-token-inner">
                                    <div>
                                        <div class="td-access-token-info">Facebook Login Access Token</div>
                                        <div class="td-access-token-code"><?php echo $td_options_fb_connected_account['fb_login_access_token'] ?></div>
                                        <div class="td-access-token-expires-in"><?php echo $fb_login_access_token_expires_in ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
			        <?php
		        }
	        }
	        ?>
        </div>

        <!-- fb connected account debug -->
        <pre class="debug-pre" style="white-space: pre-wrap; word-break: break-all; display: none;"><?php print_r($td_options_fb_connected_account); ?></pre>

        <div class="td-box-section-separator" style="margin-top: 30px;"></div>

        <!-- fb connected account pages -->
        <div class="td-box-control td-box-control-fb-account-pages">
	        <?php

	        if ( !empty($td_options_fb_connected_account) ) {

                if ( !empty($td_fb_account_pages) && is_array($td_fb_account_pages) ) {
	                ?>
                    <!-- fb connected account pages description -->
                    <div class="td-box-description">
                        <span class="td-box-title">Pages</span>
                        <p>These are the business pages managed trough your facebook account.</p>
                    </div>
	                <?php
                } else {
	                ?>
                    <p><strong>There are no business pages managed trough the connected facebook account!</strong></p>
	                <?php
                }

		        $fb_login_access_token = $td_options_fb_connected_account['fb_login_access_token'];
		        $expires_in_ts = $td_options_fb_connected_account['fb_login_access_token_expires_in_ts'];
		        $human_readable_time_string = td_human_readable_ts( $expires_in_ts );
		        if ( strpos( $human_readable_time_string, 'ago' ) === false ) {
			        $expires_in = '<span style="color: #0a9e01;">expires in ' . $human_readable_time_string . '</span>';
		        } else {
			        $expires_in = '<span style="color: orangered;">expired ' . $human_readable_time_string . '</span>';
		        }

		        if ( !empty($td_fb_account_pages) && is_array($td_fb_account_pages) ) {
			        foreach ( $td_fb_account_pages as $page_data ) {

				        $id = $page_data['id'] ?? '';
				        $followers = $page_data['followers_count'] ?? '';
				        $likes = $page_data['likes'] ?? '';
				        $name = $page_data['name'] ?? '';
				        $username = $page_data['username'] ?? '';
				        $profile_picture = $page_data['profile_picture'] ?? '';
				        $page_access_token = $page_data['page_access_token'] ?? '';

                        // data access check
				        $fb_api_data_access_check_url = 'https://graph.facebook.com/' . $id . '?access_token=' . $page_access_token;
				        $fb_api_data_access_check_result = wp_remote_get( $fb_api_data_access_check_url, array( 'timeout' => 60, 'sslverify' => false ) );
				        $fb_api_data_access_check_response = !is_wp_error( $fb_api_data_access_check_result ) ? json_decode( $fb_api_data_access_check_result['body'] ) : $fb_api_data_access_check_result;

				        ?>

                        <div class="about-wrap">
                            <div class="td-fb-page-wrap td-fb-page td-fb-page-id-<?php echo $id ?>">
                                <div class="td-fb-page-img"><img src="<?php echo $profile_picture ?>" alt=""></div>
                                <div class="td-fb-page-name"><?php echo $name ?></div>
                                <div class="td-fb-page-expires"><?php //echo $expires_in ?></div>
                                <div class="td-fb-page-followers-count">Followers: <?php echo $followers ?></div>
                                <div class="td-fb-page-likes-count">Likes: <?php echo $likes ?></div>
                                <div class="td-access-token-trigger">
                                    <div class="td-classic-check">
                                        <input type="checkbox" id="show_tokens_<?php echo $id ?>" name="" value="">
                                        <label for="show_tokens_<?php echo $id ?>" class="td-check-wrap">
                                            <span class="td-check"></span><span class="td-check-title">Show Access Tokens</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="td-fb-page-remove">
                                    <a class="button button-secondary td-remove-fb-page"
                                       href="#"
                                       data-id="<?php echo $id ?>"
                                       data-username="<?php echo $username ?>"
                                    >Remove</a>
                                </div>
                                <div class="td-access-token">
                                    <div class="td-access-token-inner">
                                        <!--<div>-->
                                        <!--    <div class="td-access-token-info">Access Token</div>-->
                                        <!--    <div class="td-access-token-code">--><?php //echo $fb_login_access_token ?><!--</div>-->
                                        <!--</div>-->
                                        <div>
                                            <div class="td-access-token-info">Page Access Token</div>
                                            <div class="td-access-token-code"><?php echo $page_access_token . PHP_EOL; ?><pre class="debug-pre" style="white-space: pre-wrap; word-break: break-all; display: none;"><?php print_r( $fb_api_data_access_check_response ); ?></pre></div>
                                        </div>
                                    </div>
                                </div>
                                <?php if ( isset( $fb_api_data_access_check_response->error ) && $fb_api_data_access_check_response->error->code === 190 ) { ?>

                                    <p class="td-no-fb-page-data-invalid-message">
                                        Data access for <strong><?php echo $name ?></strong> page access token is not valid! <br>
                                        Please reconnect to Facebook Account and make sure you check all required permissions!
                                    </p>

					            <?php } ?>
                            </div>
                        </div>

				        <?php
			        }
		        }

	        } else {
		        ?>
                <p class="td-no-fb-account-message"><strong>No facebook account connected!</strong></p>
		        <?php
	        }

	        ?>
        </div>

        <!-- errors -->
        <div id="td-fb-error" style="display: none;"></div>

    </div>
</div>

<?php echo td_panel_generator::box_end(); ?>

<!-- Instagram Personal -->
<?php echo td_panel_generator::box_start('Instagram Personal', false ); ?>

<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">Configure your Personal Instagram Account</span>
        <p>
            Used for displaying a feeds from a "Personal" Instagram account.<br>
            Connect to your personal Instagram account and authorize our application to share data from your account.<br>
            <a href="https://forum.tagdiv.com/privacy-policy-2/#instagram" target="_blank">Privacy Policy</a>
        </p>
    </div>
    <div class="td-box-section-separator" style="margin-top: 30px;"></div>
</div>
<div class="td-box-row">
    <div class="td-box-control" style="padding-bottom: 32px;">

		<?php

		// redirect_uri param, this is where the user is redirected after authorization..
		$redirect_uri = 'https://tagdiv.com/td_instagram_api/v2/td-instagram-api-v2.php';

		// set as state param in instagram authorize button link
		$return_uri = admin_url('admin.php?page-td_theme_panel');

		// td_options ig personal saved account data
		$instagram_access_settings = td_options::get_array( 'td_instagram_connected_account');

		// uncomment the line below to test token refresher cron job
		//$instagram_access_settings['connected_account']['expires_in_ts'] = time() + 43200; // set to expire in 12 hours

		// ig personal connected account
		$connected_account = $instagram_access_settings['connected_account'] ?? array();

		// is personal account connected state
		$is_account_connected = isset( $instagram_access_settings['connected_account'] );

		// disabled class for connection button
		$disabled = $is_account_connected ? 'disabled' : '';

		// connection button title att
		$title = !$is_account_connected ? 'Connect to your Personal Instagram Account' : 'Your Personal Instagram Account is connected';

		?>

        <!-- ig connect personal account button -->
        <a class="button button-secondary td-add-account <?php echo $disabled ?>"
           href="https://instagram.com/oauth/authorize/?app_id=225805548418040&scope=user_profile,user_media&redirect_uri=<?php echo $redirect_uri ?>&response_type=code&state=<?php echo $return_uri ?>"
           style=""
           title="<?php echo $title ?>"
        >Connect Personal Account</a>

        <!-- ig personal connected account debug -->
        <pre class="debug-pre" style="white-space: pre-wrap; word-break: break-all; display: none;"><?php print_r($instagram_access_settings); ?></pre>

        <div class="td-box-section-separator" style="margin-top: 30px;"></div>

        <!-- ig personal account display -->
        <div class="td-box-control td-box-control-inst-account" style="clear: left;">
			<?php
			if ( ! empty( $connected_account ) ) {
				?>

                <div class="about-wrap">
                    <div class="td-insta-acc-wrap">
                        <div class="td-insta-acc-user"><?php echo $connected_account['username'] ?></div>
                        <div class="td-insta-acc-expires">
							<?php

							$expires_in_ts = $connected_account['expires_in_ts'] ?? '';

							if ( ! empty( $expires_in_ts ) ) {
								$human_readable_time_string = td_human_readable_ts( $expires_in_ts );
								if ( strpos( $human_readable_time_string, 'ago' ) === false ) {
									echo '<span style="color: #0a9e01;">expires in ' . $human_readable_time_string . '</span>';
								} else {
									echo '<span style="color: orangered;">expired ' . $human_readable_time_string . '</span>';
								}
							}

							?>
                        </div>
                        <div class="td-insta-acc-token-trigg">
                            <div class="td-classic-check">
                                <input type="checkbox" id="show_id_token" name="" value="">
                                <label for="show_id_token" class="td-check-wrap">
                                    <span class="td-check"></span><span class="td-check-title">Show Access Token</span>
                                </label>
                            </div>
                        </div>
                        <div class="td-insta-acc-remove">
                            <a class="button button-secondary td-remove-account" href="#" data-id="<?php echo $connected_account['user_id'] ?>" data-username="<?php echo $connected_account['username'] ?>">Remove</a>
                        </div>
                        <div class="td-insta-acc-token">
                            <div class="td-insta-acc-token-inner">
                                <div class="td-insta-acc-token-info">Access Token</div>
                                <div class="td-insta-acc-token-code"><?php echo $connected_account['access_token'] ?></div>
                            </div>
                        </div>
                    </div>
                </div>

				<?php
			} else {
				?>
                <p class="td-no-account-message"><strong>No instagram personal account connected!</strong></p>
				<?php
			}
			?>
        </div>

        <!-- connection errors -->
        <div id="td-instagram-tk-error"
             style="
                 display: none;
                 color: orangered;
                 font-weight: bold;
                "
        ></div>

    </div>
</div>

<?php echo td_panel_generator::box_end(); ?>

<!-- Instagram Business -->
<?php echo td_panel_generator::box_start('Instagram Business', false ); ?>

<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">Configure your Business Instagram Accounts</span>
        <p>
            Used for displaying a feeds from a "Business" or "Creator" Instagram account. <a href="#" class="td-tooltip" style="margin-left: 5px;" data-position="right" data-content-as-html="true" title="<?php echo esc_attr('<p>Connecting an Instagram business account(page) will also connect to the corresponding facebook account(page) automatically. This is due to Instagram business requiring having a Facebook Page to which the Instagram business account(page) is connected. <a href="https://www.facebook.com/business/help/345675946300334?id=419087378825961" target="_blank">Read more</a></p>') ?>">note</a><br>
            A Business or Creator account is required for displaying automatic avatar/bio display in the header.<br>

            <a href="https://forum.tagdiv.com/privacy-policy-2/#instagram" target="_blank">Privacy Policy</a>

        </p>
    </div>
    <div class="td-box-section-separator" style="margin-top: 30px;"></div>
</div>
<div class="td-box-row">
    <div class="td-box-control" style="padding-bottom: 32px;">

		<?php

        // td_options saved instagram business accounts
		$td_options_instagram_business_accounts = td_options::get_array( 'td_instagram_business_accounts');

		// state param for instagram business account, used as return uri
		$ig_business_state = admin_url('admin.php?page-td_theme_panel&td_ig_connect_business_accounts');

		?>

        <!-- ig connect business accounts button -->
        <a class="button button-secondary td-ig-business-add-account"
           href="https://www.facebook.com/dialog/oauth?client_id=198698130522676&redirect_uri=<?php echo $td_facebook_api_redirect_uri ?>&scope=pages_show_list,instagram_basic&state=<?php echo $ig_business_state ?>"
        >Connect Business Accounts</a>

	    <?php if ( !empty($td_options_instagram_business_accounts) ) { ?>
            <!-- ig remove all accounts button -->
            <a class="button button-secondary td-ig-business-remove-all" href="#">Remove All Business Accounts</a>
	    <?php } ?>

        <!-- ig connected accounts debug -->
        <pre class="debug-pre" style="white-space: pre-wrap; word-break: break-all; display: none;"><?php print_r($td_options_instagram_business_accounts); ?></pre>

        <div class="td-box-section-separator ig-business-accounts-sep" style="margin-top: 30px;"></div>

        <!-- ig business accounts -->
        <div class="td-box-control td-box-control-ig-business-accounts">
			<?php

            if ( !empty($td_options_instagram_business_accounts) ) {

	            $human_readable_time_string = td_human_readable_ts( 1626766169 );
	            if ( strpos( $human_readable_time_string, 'ago' ) === false ) {
		            $expires_in = '<span style="color: #0a9e01;">expires in ' . $human_readable_time_string . '</span>';
	            } else {
		            $expires_in = '<span style="color: orangered;">expired ' . $human_readable_time_string . '</span>';
	            }

	            if ( is_array( $td_options_instagram_business_accounts ) ) {
		            foreach ( $td_options_instagram_business_accounts as $fb_page => $instagram_business_account ) {
		                if ( isset( $instagram_business_account['error'] ) ) {
			                ?>
                            <div class="about-wrap">
                                <div class="td-ig-business-account-wrap">
                                    <p class="td-ig-business-account-error"><?php echo $fb_page . ': ' . $instagram_business_account['error'] ?></p>
                                </div>
                            </div>
			                <?php
                        } else {
			                $instagram_business_account_id = $instagram_business_account['id'];
			                $profile_picture = $instagram_business_account['profile_picture'];
			                $name = $instagram_business_account['name'];
			                $username = $instagram_business_account['username'];
			                $followers = $instagram_business_account['followers'];
			                $media_count = $instagram_business_account['media_count'];
			                $page_access_token = $instagram_business_account['page_access_token'];

			                ?>

                            <div class="about-wrap">
                                <div class="td-ig-business-account-wrap td-ig-business-account td-ig-id-<?php echo $instagram_business_account_id ?>">
                                    <div class="td-ig-business-account-photo">
                                        <img src="<?php echo $profile_picture ?>" alt="<?php //echo $name . '_profile_pic'; ?>">
                                    </div>
                                    <div class="td-ig-business-account-user"><?php echo $name ?></div>
                                    <div class="td-ig-business-account-expires"><?php //echo $expires_in ?></div>
                                    <div class="td-ig-business-account-followers-count">Followers: <?php echo $followers ?></div>
                                    <div class="td-ig-business-account-media-count">Media: <?php echo $media_count ?></div>
                                    <div class="td-access-token-trigger">
                                        <div class="td-classic-check">
                                            <input type="checkbox" id="show_tokens_<?php echo $name ?>" name="" value="">
                                            <label for="show_tokens_<?php echo $name ?>" class="td-check-wrap">
                                                <span class="td-check"></span><span class="td-check-title">Show Access Tokens</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="td-ig-business-account-remove">
                                        <a class="button button-secondary td-remove-ig-business-account"
                                           href="#"
                                           data-id="<?php echo $instagram_business_account_id ?>"
                                           data-username="<?php echo $username ?>"
                                        >Remove</a>
                                    </div>
                                    <div class="td-access-token">
                                        <div class="td-access-token-inner">
                                            <!--<div>-->
                                            <!--    <div class="td-access-token-info">Access Token</div>-->
                                            <!--    <div class="td-access-token-code">--><?php //echo $fb_login_access_token ?><!--</div>-->
                                            <!--</div>-->
                                            <div>
                                                <div class="td-access-token-info">Page Access Token</div>
                                                <div class="td-access-token-code"><?php echo $page_access_token ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

			                <?php
                        }
		            }
	            }

            } else {
	            ?>
                <p class="td-no-ig-business-accounts-message"><strong>No instagram business accounts connected!</strong></p>
	            <?php
            }

			?>
        </div>

        <!-- errors -->
        <div id="td-ig-error" style="display: none;"></div>

    </div>
</div>

<?php echo td_panel_generator::box_end(); ?>

<?php echo td_panel_generator::box_start('YouTube API Configuration', false); ?>

<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">API KEY</span>
        <p>Follow <a href="https://forum.tagdiv.com/youtube-api-key/" target="_blank">this guide</a> to get your own YouTube API key</p>
    </div>
    <div class="td-box-control-full">
        <?php
        echo td_panel_generator::input(array(
            'ds' => 'td_option',
            'option_id' => 'tds_yt_api_key'
        ));
        ?>
    </div>
</div>

<?php echo td_panel_generator::box_end(); ?>


<?php echo td_panel_generator::box_start('Flickr API Configuration', false); ?>

<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">API KEY</span>
        <p>Follow <a href="https://forum.tagdiv.com/use-flickr-api/" target="_blank">this guide</a> to get your own Flickr API key</p>
    </div>
    <div class="td-box-control-full">
        <?php
        echo td_panel_generator::input(array(
            'ds' => 'td_option',
            'option_id' => 'tds_flickr_api_key'
        ));
        ?>
    </div>
</div>

<?php echo td_panel_generator::box_end(); ?>

<?php if ( 'Newspaper' == TD_THEME_NAME && defined('TD_CLOUD_LIBRARY') ) {
    echo td_panel_generator::box_start('Google Maps API Configuration', false); ?>

    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">API KEY</span>
            <p>Follow <a href="https://forum.tagdiv.com/use-google-maps-api/" target="_blank">this guide</a> to get your own Google Maps API key</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::input(array(
                'ds' => 'td_option',
                'option_id' => 'tds_gm_api_key'
            ));
            ?>
        </div>
    </div>

    <?php echo td_panel_generator::box_end();
} ?>


<?php echo td_panel_generator::box_start('Social Networks', false); ?>

<div class="td-box-row">
    <div class="td-box-description">
        <span class=" td-box-title">SET REL ATTRIBUTE VALUE</span>
        <p>Set nofollow or noopener for social links</p>
    </div>
    <div class="td-box-control-full">
        <?php
        echo td_panel_generator::radio_button_control(array(
            'ds' => 'td_option',
            'option_id' => 'tds_rel_type',
            'values' => array(
                array('text' => 'Disable', 'val' => ''),
                array('text' => 'Nofollow', 'val' => 'nofollow'),
                array('text' => 'Noopener', 'val' => 'noopener'),
                array('text' => 'Noreferrer', 'val' => 'noreferrer')

            )
        ));
        ?>
    </div>
</div>

<div class="td-box-section-separator"></div>

<?php
foreach(td_social_icons::$td_social_icons_array as $panel_social_id => $panel_social_name) {
    ?>
    <div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title"><?php echo strtoupper($panel_social_name) ?></span>
        <p>Link to : <?php printf( '%1$s', $panel_social_name ) ?></p>
    </div>
    <div id="<?php echo esc_attr( $panel_social_name ) ?>" class="td-box-control-full" >
        <?php
        echo td_panel_generator::input(array(
            'ds' => 'td_social_networks',
            'option_id' => $panel_social_id
        ));
        ?>
    </div>
    </div><?php
}
?>

<?php echo td_panel_generator::box_end();?>

