<?php
require_once TAGDIV_ROOT_DIR . "/includes/wp-booster/wp-admin/tagdiv-view-header.php";

$td_theme_buy_link = 'https://themeforest.net/item/newspaper/5489609?utm_source=NP_theme_panel&utm_medium=click&utm_campaign=cta&utm_content=buynew';
if ('Newsmag' == TD_THEME_NAME) {
    $td_theme_buy_link = 'https://themeforest.net/item/newsmag-news-magazine-newspaper/9512331?utm_source=NM_theme_panel&utm_medium=click&utm_campaign=cta&utm_content=buynew';
}
?>
<div class="td-admin-wrap about-wrap td-wp-admin-welcome">
    <div class="td-welcome-content">
        <h1>Fast Start Your Website</h1>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path d="M14.009,6.786a0.727,0.727,0,0,0-.585-0.232,0.848,0.848,0,0,0-.586.268l-3.96,4.286V0.857A0.842,0.842,0,0,0,8.636.25,0.783,0.783,0,0,0,8.051,0h-1.1a0.783,0.783,0,0,0-.585.25,0.842,0.842,0,0,0-.241.607v10.25L2.162,6.821a0.847,0.847,0,0,0-.585-0.268,0.727,0.727,0,0,0-.585.232l-0.758.821a0.885,0.885,0,0,0,0,1.214L6.915,15.75a0.811,0.811,0,0,0,1.171,0l6.681-6.929a0.885,0.885,0,0,0,0-1.214Z"/></svg>

        <?php
        $theme_setup = tagdiv_theme_plugins_setup::get_instance();
        $theme_setup->theme_plugins();
        ?>


        <?php
        if ( defined('TD_COMPOSER' ) ) { ?>
            <div class="td-wp-admin-step-demos">
                <?php
                $td_demo = td_demo_state::get_installed_demo();
                if ($td_demo !== false) {
                    $td_demo_api_data = '';
                    if (isset(td_global::$demo_list[$td_demo['demo_id']])) {
                        $td_demo_api_data = td_global::$demo_list[$td_demo['demo_id']];
                    }
                    $td_demo_img = 'https://demo.tagdiv.com/select_demo/images/' . strtolower(TD_THEME_NAME) . '/demos/' . $td_demo['demo_id'] . '.jpg';
                    if ($td_demo_api_data != '') {
                        ?>
                        <div class="td-wp-admin-websites td-tagdiv-current-demo">
                            <h2>2. Prebuilt Website Installed:</h2>
                            <p class="about-description"><?php echo $td_demo_api_data['text'] ?></p>
                            <svg class="td-wp-admin-ok-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#6dc25f" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path></svg>
                            <a class="td-wp-admin-button-simple" href="admin.php?page=td_theme_demos">Other Prebuilt Websites</a>
                        </div>
                        <img class="td-tagdiv-demos td-tagdiv-current-demo-img td-demo-img-right" src="<?php echo $td_demo_img ?>" width="311" height="350" />
                        <img class="td-tagdiv-demos td-tagdiv-current-demo-img td-demo-img-left" src="<?php echo $td_demo_img ?>" width="311" height="350" />
                    <?php }
                    else { ?>
                        <div class="td-wp-admin-websites td-tagdiv-disabled-demo" >
                            <h2>Pre-built website installed is unavailable</h2>
                            <p class="about-description">This Pre-built website is not available for the current theme version. Please update the theme or install a different pre-built website.</p>
                            <svg class="td-wp-admin-ok-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M-10650,496a249.829,249.829,0,0,1-49.98-5.038,246.734,246.734,0,0,1-46.553-14.45,248.089,248.089,0,0,1-42.128-22.865,249.868,249.868,0,0,1-36.7-30.283,249.85,249.85,0,0,1-30.283-36.7,248.087,248.087,0,0,1-22.865-42.126,246.856,246.856,0,0,1-14.451-46.552A249.889,249.889,0,0,1-10898,248a249.883,249.883,0,0,1,5.038-49.98,246.863,246.863,0,0,1,14.451-46.552,248.071,248.071,0,0,1,22.865-42.126,249.83,249.83,0,0,1,30.283-36.7,249.87,249.87,0,0,1,36.7-30.283,248.069,248.069,0,0,1,42.128-22.866,246.727,246.727,0,0,1,46.553-14.451A249.821,249.821,0,0,1-10650,0a249.835,249.835,0,0,1,49.98,5.039,246.74,246.74,0,0,1,46.552,14.451,248.043,248.043,0,0,1,42.127,22.866,249.834,249.834,0,0,1,36.7,30.283,249.81,249.81,0,0,1,30.283,36.7,247.955,247.955,0,0,1,22.865,42.126,246.793,246.793,0,0,1,14.451,46.552A249.884,249.884,0,0,1-10402,248a249.89,249.89,0,0,1-5.038,49.981,246.792,246.792,0,0,1-14.451,46.552,247.96,247.96,0,0,1-22.865,42.126,249.817,249.817,0,0,1-30.283,36.7,249.833,249.833,0,0,1-36.7,30.283,248.029,248.029,0,0,1-42.127,22.865,246.747,246.747,0,0,1-46.552,14.45A249.836,249.836,0,0,1-10650,496Zm-88.038-375.373a15.9,15.9,0,0,0-11.314,4.685l-23.333,23.335a15.9,15.9,0,0,0-4.688,11.316,15.889,15.889,0,0,0,4.688,11.314l77.073,77.073-77.073,77.073a15.9,15.9,0,0,0-4.688,11.316,15.889,15.889,0,0,0,4.688,11.314l23.33,23.335a15.9,15.9,0,0,0,11.317,4.688,15.889,15.889,0,0,0,11.313-4.688l77.076-77.076,77.073,77.076a15.9,15.9,0,0,0,11.314,4.685,15.911,15.911,0,0,0,11.315-4.685l23.332-23.335a15.893,15.893,0,0,0,4.688-11.314,15.9,15.9,0,0,0-4.687-11.316l-77.076-77.073,77.076-77.073a15.893,15.893,0,0,0,4.688-11.314,15.9,15.9,0,0,0-4.687-11.316l-23.335-23.333a15.891,15.891,0,0,0-11.312-4.687,15.9,15.9,0,0,0-11.314,4.687l-77.073,77.076-77.076-77.079A15.9,15.9,0,0,0-10738.037,120.626Z" transform="translate(10898.001)" fill="red"></path></svg>
                            <a class="td-wp-admin-button-simple" href="admin.php?page=td_theme_updates">Check for updates</a>
                            <a class="td-wp-admin-button-simple" href="admin.php?page=td_theme_demos">Choose a Pre-built Website</a>
                        </div>
                        <img class="td-tagdiv-demos td-tagdiv-current-demo-img td-demo-img-right td-tagdiv-disabled-demo-img" src="<?php echo $td_demo_img ?>" width="311" height="350" />

                    <?php }

                } else { ?>
                    <div class="td-wp-admin-websites">
                        <h2>2. Choose to Install a Prebuilt Website</h2>
                        <p class="about-description">Dozens of Ready-to-use Prebuilt Websites are waiting you. Build your site in minutes! </p>
                        <a class="td-wp-admin-button" href="admin.php?page=td_theme_demos">Prebuilt Websites</a>
                    </div>
                    <img class="td-tagdiv-demos" src="<?php echo get_template_directory_uri() ?>/includes/wp-booster/wp-admin/images/plugins/<?php echo TD_THEME_NAME ?>.png" />
                <?php } ?>
            </div>
            <a href="https://tagdiv.com/submit-a-request/?utm_source=welcome_panel&utm_medium=banner&utm_campaign=custom_work&utm_content=services">
                <img style="margin: 25px 0; width: 100%;" src="https://cloud.tagdiv.com/custom.jpg">
            </a>
            <?php } ?>
    </div>

    <div class="td-welcome-sidebar">
        <div class="td-welcome-widget td-widget-system-status">
            <h2>System Status</h2>
            <?php
            $phpversion = PHP_VERSION;
            $memory_limit_bytes = wp_convert_hr_to_bytes(WP_MEMORY_LIMIT);
            $memory_limit = size_format($memory_limit_bytes);
            $max_input_vars = ini_get('max_input_vars');
            $max_execution_time = ini_get('max_execution_time');
            ?>
            <!-- PHP Version -->
            <div class="td-wp-admin-status">
                <span class="td-system-desc">PHP Version</span>
                <?php if (version_compare( $phpversion, '7.0' ) >= 0) { ?>
                    <span class="td-system-green td-system-svg-icon"></span>
                    <span class="td-system-value"><?php echo esc_html($phpversion); ?><br></span>
                <?php } else { ?>
                    <span class="td-system-yellow td-system-svg-icon"></span>
                    <span class="td-system-value"><?php echo esc_html($phpversion); ?><br></span>
                    <span class="td-system-error">&rBarr; You should use PHP 7 (recommended: PHP 7.2.2 or above).</span>
                <?php } ?>
            </div>
            <!-- PHP Memory Limit -->
            <div class="td-wp-admin-status">
                <span class="td-system-desc">WP Memory Limit</span>
                <?php if ($memory_limit_bytes >= 268435456) { ?>
                    <span class="td-system-green td-system-svg-icon"></span>
                    <span class="td-system-value"><?php echo esc_html($memory_limit); ?><br></span>
                <?php } else { ?>
                    <span class="td-system-yellow td-system-svg-icon"></span>
                    <span class="td-system-value"><?php echo esc_html($memory_limit); ?><br></span>
                    <span class="td-system-error">&rBarr; We recommend memory to at least <b>256 MB</b>. <a target="_blank" href="https://wordpress.org/support/article/editing-wp-config-php/#increasing-memory-allocated-to-php">Read more</a></span>
                <?php } ?>
            </div>
            <!-- PHP Execution Time -->
            <div class="td-wp-admin-status">
                <span class="td-system-desc">PHP Execution Time</span>
                <?php if ($max_execution_time == 0 or $max_execution_time >= 60) { ?>
                    <span class="td-system-green td-system-svg-icon"></span>
                    <span class="td-system-value"><?php echo esc_html($max_execution_time); ?><br></span>
                <?php } else { ?>
                    <span class="td-system-yellow td-system-svg-icon"></span>
                    <span class="td-system-value"><?php echo esc_html($max_execution_time); ?><br></span>
                    <span class="td-system-error">&rBarr; We recommend to increase this value to <b>60</b> or more. <a target="_blank" href="http://forum.tagdiv.com/system-status-parameters-guide/">Read more</a></span>
                <?php } ?>
            </div>
            <!-- PHP Max Input Vars -->
            <div class="td-wp-admin-status">
                <span class="td-system-desc">PHP Max Input Vars</span>
                <?php if ($max_input_vars == 0 or $max_input_vars >= 2000) { ?>
                    <span class="td-system-green td-system-svg-icon"></span>
                    <span class="td-system-value"><?php echo esc_html($max_input_vars); ?><br></span>
                <?php } else { ?>
                    <span class="td-system-yellow td-system-svg-icon"></span>
                    <span class="td-system-value"><?php echo esc_html($max_input_vars); ?><br></span>
                    <span class="td-system-error">&rBarr; We recommend to increase this value to <b>2000</b> or more. <a target="_blank" href="http://forum.tagdiv.com/system-status-parameters-guide/">Read more</a></span>
                <?php } ?>
            </div>
            <?php if ( defined('TD_COMPOSER' ) ) { ?>
                <a class="td-wp-admin-button-simple" href="admin.php?page=td_system_status">Full System Status</a>
            <?php } ?>
        </div>
        <div class="td-welcome-widget">
            <h2>Buy Another License</h2>
            <p class="about-description">If you do not have a license or you need a new one for your next project, you can easily get one.</p>
            <a class="td-wp-admin-button-simple td-wp-admin-button-license" target="_blank" href="<?php echo $td_theme_buy_link ?>">Purchase License Now</a>
        </div>

        <?php if ( TD_THEME_NAME === 'Newspaper' && defined('TD_COMPOSER' ) && defined( 'TD_CLOUD_LIBRARY' ) ) { ?>
            <div class="td-welcome-widget td-cloud-library-widget">
            <h2>tagDiv Cloud Library</h2>
            <p class="about-description">Quickly improve your beautiful website. Over 1350+ One-Click, ready-to-download Templates & Elements are waiting for you.</p>
            <a class="td-wp-admin-button-simple" href="admin.php?page=tdb_cloud_templates">Access Library</a>
        </div>
        <?php } ?>

    </div>
</div>
