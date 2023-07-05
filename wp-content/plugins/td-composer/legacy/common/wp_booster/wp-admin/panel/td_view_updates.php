<?php
require_once TAGDIV_ROOT_DIR . '/includes/wp-booster/wp-admin/tagdiv-view-header.php';

if ( defined('TD_COMPOSER' ) ) {

    if ( strpos( td_util::get_registration(), chr(42 ) ) > 0 || TD_DEPLOY_MODE == 'dev' ) {

        $new_update_available = false;
        $latest_version = tagdiv_util::get_option( 'theme_update_latest_version' );

        if ( ! empty( $latest_version ) ) {
            $latest_version = json_decode( $latest_version, true );

            $latest_version_keys = array_keys( $latest_version );
            if ( is_array( $latest_version_keys ) && count( $latest_version_keys ) ) {
                $latest_version_serial = $latest_version_keys[ 0 ];
                $latest_version_url = $latest_version[$latest_version_keys[ 0 ]];

                if ( 1 == version_compare( $latest_version_serial, TD_THEME_VERSION ) ) {
                    $new_update_available = true;
                }
            }
        }

        if ( TD_DEPLOY_MODE != 'dev' ) {
	        // Don't do any check if the licence was verified
	        $td_checked_licence = get_transient( 'TD_CHECKED_LICENSE' );
	        if ( false === $td_checked_licence ) {

		        ?>

                <div id="tdb-check-key">
                    <router-view></router-view>
                </div>

		        <?php
	        }
        }

        ?>

        <span id="tdb-update-system" style="<?php echo $td_checked_licence ? '' : 'display: none'?>">

            <?php

            if ( $new_update_available ) {
                ?>

                <div class="about-wrap td-admin-wrap td-update-page" style="margin-top: 0">
                    <div class="td-white-box" style="text-align: center">
                        <h1 style="text-align: center">New Update is Available</h1>
                        <p>A new version of the <b><?php echo TD_THEME_NAME ?> Theme</b> is ready to be installed. See what's new
                            here: <a href="https://tagdiv.com/<?php echo TD_THEME_NAME ?>/" target="_blank">Changelog</a></p>
                        <div class="td-version-wrap">
                            <div class="td-current-version td-version">
                                <p>Current Version:</p>
                                <span><?php echo TD_THEME_VERSION ?></span>
                            </div>
                            <div class="td-version-arrow">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     width="20" height="20" viewBox="0 0 20 20">
                                    <path fill="#000000"
                                          d="M19.354 10.146l-6-6c-0.195-0.195-0.512-0.195-0.707 0s-0.195 0.512 0 0.707l5.146 5.146h-16.293c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5h16.293l-5.146 5.146c-0.195 0.195-0.195 0.512 0 0.707 0.098 0.098 0.226 0.146 0.354 0.146s0.256-0.049 0.354-0.146l6-6c0.195-0.195 0.195-0.512 0-0.707z"></path>
                                </svg>
                            </div>
                            <div class="td-new-version td-version" data-version="<?php echo $latest_version_serial ?>" data-url="<?php echo $latest_version_url ?>">
                                <p>New Version:</p>
                                <span><?php echo $latest_version_serial ?></span>
                            </div>
                        </div>
                        <a class="button button-large button-primary td-panel-check-updates" href="#">Check for updates</a>
                        <a class="button button-large button-primary td-panel-update-theme-to-latest" href="#">Install update</a>
                    </div>
                </div>

                <?php
            } else {
                ?>

                <div class="about-wrap td-admin-wrap td-update-page" style="text-align: center">
                    <div class="td-white-box">
                        <h1>You're up to date!</h1>
                        <p><?php echo TD_THEME_NAME . ' <b>' . TD_THEME_VERSION . '</b>' ?> is the newest version available.</p>
                        <a class="button button-large button-primary td-button-updated td-panel-check-updates" href="#">Check for updates</a>
                    </div>
                </div>

                <?php
            }
            ?>

            <div class="about-wrap td-admin-wrap td-update-page" style="text-align: center">
                <div class="td-white-box">
                    <h1><?php echo TD_THEME_NAME ?> Time Machine</h1>
                    <?php
                    $versions = td_util::get_option( 'theme_update_versions' );

                    if ( empty( $versions ) ) {
                        ?>
                        <div class="td-box-row">
                            <div class="td-box-description td-box-full">
                                <p>There are no versions available at this time.</p>
                            </div>
                        </div>
                        <?php

                    } else {
                        ?>
                            <p>
                                Choose a preferred theme version to install. You can use this option to downgrade a previous update.
                            </p>

                        <?php

                        $versions = json_decode( $versions, true );
                        $versions = td_util::get_option( 'theme_update_versions' );

                        if ( ! empty( $versions ) ) {
                            $versions = json_decode( $versions, true );

                            if ( is_array( $versions ) ) {
                                foreach ( $versions as $version ){
                                    foreach ( $version as $version_id => $version_url) {
                                        $updates[] = array(
                                            'text' => TD_THEME_NAME . ' - ' . $version_id,
                                            'val'  => $version_url
                                        );
                                    }
                                }
                            }
                        }
                        if ( ! empty( $updates) ) {
                        ?>
                            <div class="td-box-row">
                                <div class="td-box-description">
                                        <div class="td-box-control-full">
                                            <?php
                                            echo td_panel_generator::dropdown(array(
                                                'ds' => 'td_option',
                                                'option_id' => 'tds_update_theme',
                                                'values' => $updates
                                            ));
                                            ?>
                                        </div>
                                </div>
                                <a class="td-panel-update-theme button button-large button-primary" href="">Install version</a>
                            </div>
                        <?php
                        }
                        ?>

                        <?php
                    }
                    ?>
                    <script>

                            jQuery().ready(function() {

                                jQuery('body').on( 'click', '.td-panel-update-theme', function (event) {
                                    event.preventDefault();

                                    var $selected_update = jQuery('select[name="td_option[tds_update_theme]"]:first option:selected');

                                    tdConfirm.modal({
                                        caption: 'Update / Downgrade Theme & Plugins',
                                        //htmlInfoContent: 'VERY IMPORTANT! You are updating to the ' + $selected_update.text() + ' version. The active plugins will automatically be updated and reactivated!',
                                        url: '#TB_inline?inlineId=td-confirm&width=780',
                                        htmlInfoContent: 'VERY IMPORTANT! Before updating to ' + $selected_update.text() + ' version, please ensure the theme has full access permissions to the WordPress folders (or temporarily deactivate any security plugin). We also recommend you make a complete website and database backup. <a target="_blank" href="https://forum.tagdiv.com/how-to-update-the-theme-2/">Read more</a><br><br><br>Continue to update?',
                                        switchButtons: false,
                                        textYes: 'Update',
                                        callbackYes: function() {

                                            jQuery.ajax({
                                                type: 'POST',
                                                url: td_ajax_url,
                                                data: {
                                                    action: 'td_ajax_change_theme_version',
                                                    version: $selected_update.text(),
                                                    url: $selected_update.val(),
                                                },
                                                success: function(data, textStatus, XMLHttpRequest){
                                                    window.location.replace("<?php echo admin_url( 'update-core.php' ) . '?action=do-theme-upgrade&update_theme=' . TD_THEME_NAME ?>");
                                                },
                                                error: function(MLHttpRequest, textStatus, errorThrown){
                                                    //console.log(errorThrown);
                                                }
                                            });
                                            tb_remove();
                                        },
                                    });
                                }).on( 'click', '.td-panel-update-theme-to-latest', function (event) {
                                    event.preventDefault();

                                    var $latestVersion = jQuery('.td-new-version'),
                                        dataVersion = $latestVersion.data('version'),
                                        dataUrl = $latestVersion.data('url');

                                    tdConfirm.modal({
                                        caption: 'Update Theme & Plugins',
                                        //htmlInfoContent: 'You are updating to the <?php echo TD_THEME_NAME ?> ' + dataVersion + ' version. The active plugins will automatically be updated and reactivated!',
                                        url: '#TB_inline?inlineId=td-confirm&width=780',
                                        htmlInfoContent: 'VERY IMPORTANT! Before updating to <?php echo TD_THEME_NAME ?> ' + dataVersion + ' version, please ensure the theme has full access permissions to the WordPress folders (or temporarily deactivate any security plugin). We also recommend you make a complete website and database backup. <a target="_blank" href="https://forum.tagdiv.com/how-to-update-the-theme-2/">Read more</a><br><br><br>Continue to update?',
                                        switchButtons: false,
                                        textYes: 'Update',
                                        callbackYes: function() {

                                            jQuery.ajax({
                                                type: 'POST',
                                                url: td_ajax_url,
                                                data: {
                                                    action: 'td_ajax_change_theme_version',
                                                    version: dataVersion,
                                                    url: dataUrl,
                                                },
                                                success: function(data, textStatus, XMLHttpRequest){
                                                    window.location.replace("<?php echo admin_url( 'update-core.php' ) . '?action=do-theme-upgrade&update_theme=' . TD_THEME_NAME ?>");
                                                },
                                                error: function(MLHttpRequest, textStatus, errorThrown){
                                                    //console.log(errorThrown);
                                                }
                                            });
                                            tb_remove();
                                        },
                                    });
                                }).on( 'click', '.td-panel-check-updates', function (event) {
                                    jQuery.ajax({
                                        type: 'POST',
                                        url: td_ajax_url,
                                        data: {
                                            action: 'td_ajax_check_theme_version',
                                        },
                                        success: function(data, textStatus, XMLHttpRequest){
                                            if ( 'success' === textStatus ) {
                                                var jsonData = JSON.parse(data);
                                                if ( 'undefined' !== typeof jsonData.versions ) {
                                                    location.reload();
                                                }
                                            }
                                        },
                                        error: function(MLHttpRequest, textStatus, errorThrown){
                                            //console.log(errorThrown);
                                        }
                                    });
                                });
                            });

                        </script>
                </div>
            </div>

        </span>



        <?php
        } else if ( TD_DEPLOY_MODE !== 'dev' ) {

            $buy_theme_link = 'https://themeforest.net/item/newspaper/5489609?utm_source=NP_theme_panel&utm_medium=click&utm_campaign=cta&utm_content=buy_new_updates';
            if( TD_THEME_NAME === 'Newsmag' ) {
                $buy_theme_link = 'https://themeforest.net/item/newsmag-news-magazine-newspaper/9512331?utm_source=NM_t[…]utm_medium=click&utm_campaign=cta&utm_content=buy_new_updates';
            }

            ?>

            <div class="about-wrap td-admin-wrap td-check-key" style="text-align: center">
                <div class="td-white-box">
                    <div class="td-check-notif">Your <?php echo TD_THEME_NAME ?> Theme license is not registered yet</div>

                    <div class="about-text" style="width: auto; margin: 0">
                        <p>The update process can't be completed without activating your <?php echo TD_THEME_NAME ?> Theme license key. <a href="<?php echo wp_nonce_url( admin_url( 'admin.php?page=td_cake_panel' ) ) ?>">Please activate your theme!</a></p>

                        <p>If you don't have a valid license key, you can get one now and continue to enjoy the full benefits of this great product.</p>

                        <a class="button button-primary" href="<?php echo $buy_theme_link ?>" target="_blank">Buy <?php echo TD_THEME_NAME ?> Theme</a>
                    </div>
                </div>
            </div>

            <?php

        }
}
