<?php
require_once TAGDIV_ROOT_DIR . '/includes/wp-booster/wp-admin/tagdiv-view-header.php';

//require_once TEMPLATEPATH . '/includes/demos/blog_baby/td_import.php';
//die;
/*

td_demo_widgets::remove();
td_demo_widgets::add_sidebar('td_demo_xxx');


td_demo_content::remove();
td_demo_content::add_page(array(
    'title' => 'About Me',
    'file' => td_global::$get_template_directory . '/includes/demos/blog/pages/about.txt',
    'template' => 'page-pagebuilder-latest.php',   // the page template full file name with .php
    'td_layout' => '',
    'homepage' => false,
    'sidebar_id' => 'td_demo_xxx'
));
*/
/*
td_demo_content::remove();
$td_aboutme_id = td_demo_content::add_page(array(
    'title' => 'About Me',
    'file' => td_global::$get_template_directory . '/includes/demos/blog/pages/about.txt',
    'template' => 'page-pagebuilder-title.php',   // the page template full file name with .php
    'td_layout' => '',
    'homepage' => false,
    'sidebar_position' => 'no_sidebar'
));
*/
/*
td_demo_media::remove();
td_demo_content::remove();
td_demo_media::add_image_to_media_gallery('td_pic_1',                   "http://td_cake.themesafe.com/Newspaper_6/blog/1.jpg");
$td_aboutme_id = td_demo_content::add_page(array(
    'title' => 'About Me',
    'file' => td_global::$get_template_directory . '/includes/demos/blog/pages/about.txt',
    'template' => 'page-pagebuilder-title.php',   // the page template full file name with .php
    'td_layout' => '',
    'homepage' => false
));
*/
/*
td_demo_content::remove();
td_demo_content::add_post(array(
    'title' => 'Are You Already Wearing the Hottest Brands in Your City?',
    'file' => td_global::$get_template_directory . '/includes/demos/video/pages/post_default.txt',
    'categories_id_array' => array(get_cat_ID(TD_FEATURED_CAT)),
    'featured_image_td_id' => 'td_pic_1',
    'featured_video_url' => 'https://www.youtube.com/watch?v=rVeMiVU77wo&list=RD1FH-q0I1fJY&index=4',
    'template' => 'single_template_10',
    'post_format' => 'video'
));
*/
/*
td_demo_widgets::remove();

td_demo_widgets::add_widget_to_sidebar('default', 'td_block_ad_box_widget',
    array (
        'spot_title' => '- Advertisement -',
        'spot_id' => 'sidebar'
    )
);


die;
/*
td_demo_content::remove();
$td_homepage_id = td_demo_content::add_page(array(
    'title' => 'Newseeeeeeeexxxx',
    'file' => td_global::$get_template_directory . '/includes/demos/fashion/pages/homepage.txt',
    'template' => 'page-pagebuilder-latest.php',   // the page template full file name with .php
    'homepage' => true,
    'td_layout' => 5
));

die;
*/
/*
if (isset($_GET['puiu_test']) and TD_DEPLOY_MODE == 'dev') {
    // clean the user settings
    //td_demo_media::remove();
    td_demo_content::remove();
    td_demo_category::remove();
    td_demo_menus::remove();
    td_demo_widgets::remove();


    $td_demo_installer = new td_demo_installer();

    // remove panel settings and recompile the css as empty
    foreach (td_global::$td_options as $option_id => $option_value) {
        td_global::$td_options[$option_id] = '';
    }
    //typography settings
    td_global::$td_options['td_fonts'] = '';
    //css font files (google) buffer
    td_global::$td_options['td_fonts_css_files'] = '';
    //compile user css if any
    td_global::$td_options['tds_user_compile_css'] = td_css_generator();
    update_option(TD_THEME_OPTIONS_NAME, td_global::$td_options);

    td_demo_state::update_state($_GET['puiu_test'], 'full');

    // load panel settings
    $td_demo_installer->import_panel_settings(td_global::$demo_list[$_GET['puiu_test']]['folder'] . 'td_panel_settings.txt');
    // load the media import script
    //require_once(td_global::$demo_list[$td_demo_id]['folder'] . 'td_media_1.php');
    require_once(td_global::$demo_list[$_GET['puiu_test']]['folder'] . 'td_import.php');

}
*/

?>

<div class=" about-wrap td-admin-wrap theme-browser td-theme-demos">
    <h1>Explore beautiful Prebuilt Websites</h1>
    <div class="about-text">
        <p>
            The <?php echo TD_THEME_NAME ?> theme brings you beautiful & unique designs for your website so you don’t have to create everything from scratch. With the Prebuilt Website you know exactly which template is perfect to start building upon. Each pre-built website is fully customizable (fonts, colors, layouts, elements).
            <a href="<?php echo TD_THEME_DEMO_DOC_URL ?>" target="_blank">Read more</a>
        </p>
        <p>On hover you have two different options to install it:</p>
        <ul>
            <li>Install <b>Design Only</b> - Use this option if your website already has content. It will import only the template design and style. No sample content will be added to the website.</li>
            <li>Install <b>Include Content</b> - Perfect for taking Newspaper Theme for a test drive. It will import homepages, sample content with images, backgrounds, template layouts, and style.</li>
        </ul>
    </div>

    <?php

        if ( TD_DEPLOY_MODE != 'dev' ) {
	        if ( defined( 'TD_COMPOSER' ) && strpos( td_util::get_registration(), chr( 42 ) ) > 0 ) {

		        // Don't do any check if the licence was verified
		        $td_checked_licence = get_transient( 'TD_CHECKED_LICENSE' );
		        if ( false === $td_checked_licence ) {

			        ?>

                    <div id="tdb-check-key">
                        <router-view></router-view>
                    </div>

			        <?php
		        }

	        } else {

		        $hide_demo_buttons = true;
		        $buy_theme_link    = 'https://themeforest.net/item/newspaper/5489609?utm_source=NP_theme_panel&utm_medium=click&utm_campaign=cta&utm_content=buy_new_demos';
		        if ( TD_THEME_NAME === 'Newsmag' ) {
			        $buy_theme_link = 'https://themeforest.net/item/newsmag-news-magazine-newspaper/9512331?utm_source=NM_t[…]l&utm_medium=click&utm_campaign=cta&utm_content=buy_new_demos';
		        }

		        ?>

                <div class="about-wrap td-admin-wrap td-check-key" style="text-align: center">
                    <div class="td-white-box">
                        <div class="td-check-notif">Your <?php echo TD_THEME_NAME ?> Theme license is not registered
                            yet
                        </div>

                        <div class="about-text" style="width: auto; margin: 0">
                            <p>The prebuilt websites can't be accessed without activating
                                your <?php echo TD_THEME_NAME ?> Theme license key. <a
                                        href="<?php echo wp_nonce_url( admin_url( 'admin.php?page=td_cake_panel' ) ) ?>">Please
                                    activate your theme!</a></p>

                            <p>If you don't have a valid license key, you can get one now and continue to enjoy the full
                                benefits of this great product.</p>

                            <a class="button button-primary" href="<?php echo $buy_theme_link ?>"
                               target="_blank">Buy <?php echo TD_THEME_NAME ?> Theme</a>
                        </div>
                    </div>
                </div>

		        <?php
	        }
        }

    ?>

	<?php if (td_api_features::is_enabled('require_vc') && !class_exists('Vc_Manager', false)) { ?>
		<div class="td-admin-box-text td-admin-required-plugins">
			<div class="td-admin-required-plugins-wrap">
                <p><strong>Please install and activate the WPBakery Page Builder plugin - </strong> WPBakery Page Builder is a required plugin for this theme to work best.</p>
                <a class="button button-primary" href="admin.php?page=td_theme_plugins">Go to plugin installer</a>
			</div>
		</div>
	<?php } ?>

    <?php if (td_api_features::is_enabled('require_td_composer') && !td_util::tdc_is_installed()) { ?>
		<div class="td-admin-box-text td-admin-required-plugins">
			<div class="td-admin-required-plugins-wrap">
                <p><strong>Please install and activate the tagDiv Composer plugin - </strong> Our plugin is required for this theme to work best.</p>
                <a class="button button-primary" href="admin.php?page=td_theme_plugins">Go to plugin installer</a>
			</div>
		</div>
	<?php } ?>

    <div class="td-demo-page-content">
        <?php if ( TD_THEME_NAME == 'Newsmag' ) { ?>
            <div class="td-admin-columns td-install-demos">
                <?php

                $installed_demo = td_demo_state::get_installed_demo();
                $td_demo_names = array();
                $td_demo_names_with_req_plugins = array();
                $td_demo_with_plugins_list = array();

                $plugin_list = array();

                foreach ( tagdiv_global::$theme_plugins_list as $plugin ) {
                    $plugin_list[ $plugin['name'] ] = $plugin[ 'td_class' ];
                }

                foreach ( td_global::$demo_list as $demo_id => $stack_params ) {
                    $td_demo_names[$stack_params['text']] = $demo_id;

                    $tmp_class = '';
                    if ( $installed_demo !== false and $installed_demo['demo_id'] == $demo_id ) {
                        $tmp_class = 'td-demo-installed';
                    }

                    $demo_required_plugins_array = array();
                    $demo_req_plugin_class = '';

                    if ( !empty ($stack_params['required_plugins']) ) {

                        foreach ( $stack_params['required_plugins'] as $demo_req_plugin ) {

                            if ( isset( $plugin_list[ $demo_req_plugin ] ) && !class_exists( $plugin_list[ $demo_req_plugin ], false ) ) {
                                $demo_required_plugins_array[] = $demo_req_plugin;
                            }
                        }

                        if ( !empty ($demo_required_plugins_array) ) {
                            $demo_req_plugin_class = 'td-demo-req-plugins-disabled';
                            $td_demo_names_with_req_plugins[] = $stack_params['text'];
                            $td_demo_with_plugins_list[$demo_id] =  $demo_required_plugins_array;
                        }
                    }

                    ?>

                    <div class="td-demo-<?php echo esc_attr( $demo_id ) ?> td-wp-admin-demo theme <?php echo esc_attr( $tmp_class . ' ' . $demo_req_plugin_class) ?>">

                        <!-- Import content -->
                        <div class="theme-screenshot">
                            <div class="td-progress-bar-wrap"><div class="td-progress-bar"></div></div>
                            <img class="td-demo-thumb" src="<?php echo td_global::$demo_list[$demo_id]['img'] ?>"/>
                        </div>

                        <div class="td-demo-meta">
                            <div class="td-admin-title">
                                <h3 class="theme-name"><?php printf( '%1$s', $stack_params['text'] ) ?></h3>
                            </div>

                            <div class="theme-actions">
                                <a class="button button-secondary td-button-demo-preview" href="<?php echo td_global::$demo_list[$demo_id]['demo_url'] ?>" target="_blank">Preview</a>
                                <!-- td-demo-actions is used by license check-->
                                <div class="td-demo-actions">

                                    <?php
                                    // check if we have all the required plugins
                                    if ( empty( $demo_required_plugins_array )) {
                                        ?>
                                        <a class="button button-secondary td-button-install-demo" href="#" data-demo-id="<?php echo esc_attr( $demo_id ) ?>">Install</a>
                                        <?php
                                    } else {
                                        $plugins_list_html = '';
                                        $plugins_list_html .= '<h3>' . $stack_params['text'] . ' demo info:</h3>';
                                        $plugins_list_html .= '<span>For this demo to work properly you will need to install and activate the following theme plugins:</span>';
                                        $plugins_list_html .= '<ul>';

                                        foreach ( $demo_required_plugins_array as $demo_req_plugin ) {
                                            $plugins_list_html .= '<li><span><a href="admin.php?page=td_theme_plugins">' . $demo_req_plugin . '</a></span></li>';
                                        }

                                        $plugins_list_html .= '</ul>';

                                        echo '<a href="#" class="button button-secondary td-tooltip td-req-demo-disabled disabled" data-position="right" data-content-as-html="true" title="' . esc_attr($plugins_list_html) . '">Install</a>';

                                    }

                                    $data_text = '';
                                    if (!empty(td_global::$demo_list[$demo_id]['required_plugins']) && in_array('tagDiv Opt-In Builder', td_global::$demo_list[$demo_id]['required_plugins'])) {
                                        $data_text = ' data-text="Are you sure? This demo uses tagDiv Opt-In Builder plugin. The theme will remove all the installed content, settings, even the subscriptions plans, lockers, pages, etc, and it will try to revert your site to the previous state."';
                                    }

                                    ?>
                                    <a class="button button-primary td-button-uninstall-demo" href="#" data-demo-id="<?php echo esc_attr( $demo_id ) ?>" <?php echo $data_text ?>>Uninstall</a>
                                    <a class="button button-primary disabled td-button-installing-demo" href="#" data-demo-id="<?php echo esc_attr( $demo_id ) ?>">Installing...</a>
                                    <a class="button button-secondary disabled td-button-demo-disabled" href="#">Install</a>
                                    <a class="button button-primary disabled td-button-uninstalling-demo" href="#" data-demo-id="<?php echo esc_attr( $demo_id ) ?>">Uninstalling...</a>
                                </div>
                            </div>

                            <div class="td-admin-checkbox td-small-checkbox">
                                <div class="td-demo-install-content td-demo-actions">
                                    <?php
                                    echo td_panel_generator::checkbox(array(
                                        'ds' => 'td_import_theme_styles',
                                        'option_id' => 'td_import_menus',
                                        'true_value' => '',
                                        'false_value' => 'no'
                                    ));
                                    ?>
                                    <p>Include content</p>
                                </div>
                                <p class="td-installed-text">
                                    <?php
                                    if (!empty(td_global::$demo_list[$demo_id]['demo_installed_text'])) {
                                        echo td_global::$demo_list[$demo_id]['demo_installed_text'];
                                    } else {
                                        echo 'Demo installed!';
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>

                    </div>
                <?php } ?>
            </div>

            <div class="td-demos-summary">
                <span>Quick Install</span>
                <ul>
                    <?php
                    ksort($td_demo_names);

                    foreach ($td_demo_names as $td_name => $demo_id) {

                        $tmp_class = '';
                        $plugins_list_html= '';

                        if ( $installed_demo !== false and $installed_demo['demo_id'] == $demo_id ) {
                            $tmp_class = 'td-demo-installed';
                        }

                        if ( in_array($td_name, $td_demo_names_with_req_plugins)) {
                            $tmp_class = $tmp_class . ' td-req-demo-disabled';
                        }

                        if ( array_key_exists($demo_id, $td_demo_with_plugins_list)) {
                            $plugins_list_html = '';
                            $plugins_list_html .= '<h3>' . $td_name . ' demo info:</h3>';
                            $plugins_list_html .= '<span>For this demo to work properly you will need to install and activate the following theme plugins:</span>';
                            $plugins_list_html .= '<ul>';

                            foreach ( $td_demo_with_plugins_list[$demo_id] as $plugin_name ) {
                                $plugins_list_html .= '<li><span><a href="admin.php?page=td_theme_plugins">' . $plugin_name . '</a></span></li>';
                            }
                            echo '<li><a class="td-wp-admin-demo td-demo-' . $demo_id . ' td-button-install-demo-quick ' . $tmp_class . ' td-tooltip" data-demo-id="'. $demo_id . '" href="#" title="' . esc_attr($plugins_list_html) . '" data-position="right" data-content-as-html="true">' . $td_name . '</a></li>';
                        } else {
                            echo '<li><a class="td-wp-admin-demo td-demo-' . $demo_id . ' td-button-install-demo-quick ' . $tmp_class . '" data-demo-id="'. $demo_id . '" href="#">' . $td_name . '</a></li>';
                        }
                    }?>
                </ul>
            </div>
        <?php } else if ( TD_THEME_NAME == 'Newspaper' ) { ?>

            <div id="demos" class="td-demos">
                <div class="td-demo-filter td-sd-demos">
                    <ul>
                        <li class="td-pro-list-item"><a href="#" target="_blank" class="td-demo-filter-active" data-type="pro">Popular</a>
<!--                            <span class="td-pro-info-icon"></span>-->
<!--                            <span class="td-pro-info-text">Lighter, fully customizable Demos. Optimized to enhance website performance!</span>-->
                        </li>
                        <li><a href="#" target="_blank" data-type="membership">Paywall/Membership</a></li>
                        <li><a href="#" target="_blank" data-type="listing">Directory & Listings</a></li>
                        <li><a href="#" target="_blank" data-type="rtl">RTL</a></li>
                        <li><a href="#" target="_blank" data-type="shop">Shop</a></li>
                        <li><a href="#" target="_blank" data-type="multipurpose">Multipurpose</a></li>
                        <li><a href="#" target="_blank" data-type="blog">Blog</a></li>
                        <li><a href="#" target="_blank" data-type="magazine">Magazine</a></li>
                        <li><a href="#" target="_blank">All</a></li>
                        <li><a href="#" target="_blank" data-type="latest">Latest</a></li>
                    </ul>
                </div>

                <div class="td-demo-product-wrap td-demo-line td-filter-wrap">

                    <?php

                    $installed_demo = td_demo_state::get_installed_demo();
                    $td_demo_names = array();
                    $td_demo_names_with_req_plugins = array();
                    $td_demo_with_plugins_list = array();

                    // theme plugins list
                    $plugin_list = array();
                    foreach ( tagdiv_global::$theme_plugins_list as $plugin ) {
                        $plugin_list[ $plugin['name'] ] = $plugin[ 'td_class' ];
                    }

                    // external plugins list
                    $external_plugins_list = array(
                        // 'plugin's class to be passed to the class_exists function' => 'plugin name as used in demo's required_plugins array'
	                    'WooCommerce' => 'WooCommerce'
                    );

                    foreach ( td_global::$demo_list as $demo_id => $stack_params ) {
                        $td_demo_names[$stack_params['text']] = $demo_id;

                        $tmp_class = '';
                        if ( $installed_demo !== false and $installed_demo['demo_id'] == $demo_id ) {
                            $tmp_class = 'td-demo-installed';
                        }

                        $td_hide_demo = '';
                        if (isset($stack_params['hide_demo']) && $stack_params['hide_demo'] == true) {
                            $td_hide_demo = 'td-hide-demo';
                        }

                        $demo_required_plugins_array = array();
                        $demo_req_plugin_class = '';

                        if ( !empty ($stack_params['required_plugins']) ) {

                            // check for req plugins using our plugins list
                            foreach ( $stack_params['required_plugins'] as $demo_req_plugin ) {

	                            // check for req plugins using our plugins list
                                if ( isset( $plugin_list[$demo_req_plugin] ) && !class_exists( $plugin_list[$demo_req_plugin], false ) ) {
                                    $demo_required_plugins_array[] = $demo_req_plugin;

                                // check for external req plugins
                                } elseif ( in_array( $demo_req_plugin, $external_plugins_list ) && !class_exists( array_search( $demo_req_plugin, $external_plugins_list ), false ) ) {
	                                $demo_required_plugins_array[] = $demo_req_plugin;
                                }

                            }

                            if ( !empty ($demo_required_plugins_array) ) {
                                //$demo_req_plugin_class = 'td-demo-req-plugins-disabled';
                                $td_demo_names_with_req_plugins[] = $stack_params['text'];
                                $td_demo_with_plugins_list[$demo_id] = $demo_required_plugins_array;
                            }
                        }

                        // badge class
                        $badge_class = '';
                        if( isset($stack_params['badge']) && $stack_params['badge'] != '' ) {
                            $badge_class = 'td-badge-' . $stack_params['badge'];
                        }

                        // demo img
	                    $demo_img = 'https://demo.tagdiv.com/select_demo/images/newspaper/demos/' . $demo_id . '.jpg';

                        ?>
                        <div class="td-demo-<?php echo esc_attr( $demo_id ) ?> td-wp-admin-demo <?php echo esc_attr( $tmp_class . ' ' . $demo_req_plugin_class  . ' ' . $td_hide_demo  ) ?> td-demo-product td-filter" data-type="<?php echo implode(' ', $stack_params['type']) ?>">
                            <div class="td-demo-product-inner">
                                <h3 class="td-demo-titles"><?php printf( '%1$s', $stack_params['text'] ) ?></h3>

                                <div class="td-demo-image <?php echo $badge_class ?>">
                                    <a class="td-demo-image-inner" target="_blank" href="<?php echo td_global::$demo_list[$demo_id]['demo_url'] ?>">
                                        <img data-scr="<?php echo $demo_img ?>" src="<?php echo $demo_img ?>" alt="" class="td-demo-img">
                                        <div class="td-demo-img-overlay">
                                            <img src="<?php echo TDC_URL_LEGACY ?>/assets/images/panel/demos/eye.svg" alt="" />
                                            <span class="td-demo-img-overlay-txt">Preview</span>
                                        </div>
                                        <div class="td-progress-bar-wrap"><div class="td-progress-bar"></div></div>
                                    </a>

                                    <?php
                                    if (empty($hide_demo_buttons)) {
	                                    ?>
                                        <div class="td-demo-actions">
		                                    <?php
		                                    if ( empty( $demo_required_plugins_array ) ) { ?>
                                                <a href="#" class="button td-button-install-demo"
                                                   data-demo-id="<?php echo esc_attr( $demo_id ) ?>">Install</a>
			                                    <?php
		                                    } else {
			                                    $plugins_list_html = '';
			                                    $plugins_list_html .= '<h3>' . $stack_params[ 'text' ] . ' demo info:</h3>';
			                                    $plugins_list_html .= '<span style="">For this demo to work properly, the following plugins will be installed and activated:</span>';
			                                    $plugins_list_html .= '<ul>';

			                                    foreach ( $demo_required_plugins_array as $demo_req_plugin ) {
				                                    if ( in_array( $demo_req_plugin, $external_plugins_list ) ) {
					                                    $plugins_list_html .= '<li>';
					                                    $plugins_list_html .= '<span><a href="' . esc_url( admin_url( 'plugin-install.php?s=' . $demo_req_plugin . '&tab=search&type=term' ) ) . '">' . $demo_req_plugin . '</a></span>';
					                                    $plugins_list_html .= '</li>';
				                                    } else {
					                                    $plugins_list_html .= '<li><span><a href="admin.php?page=td_theme_plugins">' . $demo_req_plugin . '</a></span></li>';
				                                    }
			                                    }
			                                    $plugins_list_html .= '</ul>';

			                                    // get the plugins slugs ..
			                                    $demo_required_plugins      = array();
			                                    $demo_required_plugins_list = array();
			                                    foreach ( tagdiv_global::$theme_plugins_list as $plugin ) {
				                                    if ( in_array( $plugin['name'], $demo_required_plugins_array ) ) {
					                                    $demo_required_plugins[]      = $plugin[ 'slug' ];
					                                    $demo_required_plugins_list[] = $plugin[ 'name' ];
				                                    }
			                                    }

			                                    echo '<a href="#" class="button td-tooltip td-button-install-demo" 
                                                data-position="right" 
                                                data-content-as-html="true" 
                                                title="' . esc_attr( $plugins_list_html ) . '" 
                                                data-demo-id="' . esc_attr( $demo_id ) . '" 
                                                data-demo-req-plugins="' . htmlspecialchars( json_encode( $demo_required_plugins ), ENT_QUOTES ) . '"
                                                data-demo-req-plugins-list="' . htmlspecialchars( json_encode( $demo_required_plugins_list ), ENT_QUOTES ) . '"
                                            >Install</a>';

		                                    }

		                                    $data_text = '';
		                                    if ( ! empty( td_global::$demo_list[ $demo_id ][ 'required_plugins' ] ) && in_array( 'tagDiv Opt-In Builder', td_global::$demo_list[ $demo_id ][ 'required_plugins' ] ) ) {
			                                    $data_text = ' data-text="Are you sure? This demo uses tagDiv Opt-In Builder plugin. The theme will remove all the installed content, settings, even the subscriptions plans, lockers, pages, etc, and it will try to revert your site to the previous state."';
		                                    }

		                                    ?>

                                            <a href="#" class="button td-button-uninstall-demo"
                                               data-demo-id="<?php echo esc_attr( $demo_id ) ?>" <?php echo $data_text ?>>Uninstall</a>
                                            <a href="#" class="button td-button-installing-demo"
                                               data-demo-id="<?php echo esc_attr( $demo_id ) ?>">Installing...</a>
                                            <a href="#" class="button td-button-demo-disabled">Install</a>
                                            <a href="#" class="button td-button-uninstalling-demo"
                                               data-demo-id="<?php echo esc_attr( $demo_id ) ?>">Uninstalling...</a>

                                            <div class="td-admin-checkbox td-small-checkbox">
                                                <div class="td-demo-install-content">
                                                    <p>Include content</p>
				                                    <?php
				                                    echo td_panel_generator::checkbox( array(
					                                    'ds'          => 'td_import_theme_styles',
					                                    'option_id'   => 'td_import_menus',
					                                    'true_value'  => '',
					                                    'false_value' => 'no'
				                                    ) );
				                                    ?>
                                                </div>
                                                <p class="td-installed-text">
				                                    <?php
				                                    if ( ! empty( td_global::$demo_list[ $demo_id ][ 'demo_installed_text' ] ) ) {
					                                    echo td_global::$demo_list[ $demo_id ][ 'demo_installed_text' ];
				                                    } else {
					                                    echo 'Demo installed!';
				                                    }
				                                    ?>
                                                </p>
                                            </div>

                                        </div>

	                                    <?php
                                    }
                                    ?>

                                </div>

                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>

        <?php } ?>
    </div>

</div>


