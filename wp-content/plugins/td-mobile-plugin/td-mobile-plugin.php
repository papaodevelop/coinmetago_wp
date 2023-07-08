<?php
/**
 * Plugin Name: tagDiv Mobile Theme
 * Plugin URI: http://forum.tagdiv.com/the-mobile-theme/
 * Description: The Mobile Theme makes your website lighter and faster on mobile. Together with the AMP plugin, it provides the best solution for your website.
 * Author: tagDiv
 * Version: 2.1 | built on 05.10.2022 13:12
 * Author URI: http://tagdiv.com
 *
 * @package td-mobile-plugin
 */

//hash
define('TD_MOBILE_PLUGIN', '1fb779f30bda2ecbaaacbc59e4f40249');

require_once('tdm_version_check.php');

// don't run anything else in the plugin, if the main theme is not tagdiv
if (tdm_version_check::is_active_theme_compatible() === false) {
	return;
}

// don't run anything else in the plugin, if the tagDiv Composer plugin is not active
if ( ! defined('TD_COMPOSER' ) ) {

	add_action( 'admin_notices', function (){
		?>
        <div class="notice notice-error is-dismissible td-plugins-deactivated-notice">
            <p style="font-size: 15px; font-weight: 600; color: red; margin-bottom: 5px;">The tagDiv Mobile Theme plugin requires the tagDiv Composer plugin!
                <p>Please check the theme plugins section to update/install/activate theme plugins.</p>
            <p><a class="button button-secondary" href="admin.php?page=td_theme_plugins">Go to Theme Plugins</a></p>
        </div>
		<?php
	});

	return;
}

// this shows an admin notice if the current theme doesn't support the mobile theme plugin
if ( file_exists(get_template_directory() . '/mobile/functions.php' ) ) {

	add_action( 'admin_notices', 'td_mobile_msg' );

	function td_mobile_msg() {
		?>
        <div class="notice notice-error is-dismissible td-plugins-deactivated-notice">
            <p style="font-weight: 600; color: red; margin-bottom: 5px;">This version of the tagDiv Mobile Theme plugin is not supported by the current activated theme!
                <br>Please make sure you've updated the theme properly! Follow this <a href="https://forum.tagdiv.com/how-to-update-the-theme-2/" target="_blank">guide.</a>
            </p>
        </div>
		<?php
	}

	return;
}

// The mobile detection library used.
if ( ! class_exists('Mobile_Detect', false)) {
	require_once 'Mobile_Detect.php';
}

// The mobile theme setting hooks.
require_once 'td_mobile_theme.php';

$main_theme = wp_get_theme();
// This sets the parent theme settings.
// When Child Theme is used, get the main theme name to save settings
if ($main_theme->parent() !== false) {
	td_mobile_theme::set_theme_options($main_theme->parent()->get('Name'));
} else {
	td_mobile_theme::set_theme_options($main_theme->get('Name'));
}

if ( !defined( 'TD_MOBILE_EDITOR_META_KEY' ) ) {
	define( 'TD_MOBILE_EDITOR_META_KEY', 'td_wp_editor' );
}

/**
 * This setup runs just on first Mobile Theme installation
 */
// we hook to 'td_global_after' to have access to theme's td_util
add_action( 'td_global_after', function (){
	$td_isFirstInstall = td_util::get_option('firstinstallMob' );

	if ( empty( $td_isFirstInstall ) ) {
		td_util::update_option('firstinstallMob', 'mobilethemeInstalled');

		// header
		td_util::update_option('tds_logo_menu_upload_mob', td_mobile_theme::get_option('tds_logo_menu_upload'));
		td_util::update_option('tds_logo_menu_upload_r_mob', td_mobile_theme::get_option('tds_logo_menu_upload_r'));
		td_util::update_option('tds_logo_alt_mob', td_mobile_theme::get_option('tds_logo_alt'));
		td_util::update_option('tds_logo_title_mob', td_mobile_theme::get_option('tds_logo_title'));
//			td_util::update_option('tds_logo_text_mob', td_mobile_theme::get_option('tds_logo_text'));
//			td_util::update_option('tds_tagline_text_mob', td_mobile_theme::get_option('tds_tagline_text'));


		//footer
		td_util::update_option('tds_footer_mob', td_mobile_theme::get_option('tds_footer'));
		td_util::update_option('tds_footer_logo_upload_mob', td_mobile_theme::get_option('tds_footer_logo_upload'));
		td_util::update_option('tds_footer_retina_logo_upload_mob', td_mobile_theme::get_option('tds_footer_retina_logo_upload'));
		td_util::update_option('tds_footer_text_mob', td_mobile_theme::get_option('tds_footer_text'));
		td_util::update_option('tds_footer_email_mob', td_mobile_theme::get_option('tds_footer_email'));
		td_util::update_option('tds_footer_logo_alt_mob', td_mobile_theme::get_option('tds_footer_logo_alt'));
		td_util::update_option('tds_footer_logo_title_mob', td_mobile_theme::get_option('tds_footer_logo_title'));
		td_util::update_option('tds_footer_social_mob', td_mobile_theme::get_option('tds_footer_social'));
		td_util::update_option('tds_sub_footer_mob', td_mobile_theme::get_option('tds_sub_footer'));
		td_util::update_option('tds_footer_copyright_mob', td_mobile_theme::get_option('tds_footer_copyright'));
		td_util::update_option('tds_footer_copy_symbol_mob', td_mobile_theme::get_option('tds_footer_copy_symbol'));

		// enable mobile theme thumbs
        td_util::update_option('tds_thumb_td_265x198', 'yes' );
        td_util::update_option('tds_thumb_td_741x486', 'yes' );

        //show Latest post on Grid and set offset on loop
        td_util::update_option('tdm_frontpage_grid_sort', 'latest' );
        td_util::update_option('tdm_frontpage_latest_articles_posts_offset', '3' );
	}
});

// If mobile or mobile on desktop, and not admin, sets the mobile theme settings.
td_mobile_theme::set_the_theme();

add_action('td_global_after', 'td_on_global_after_mobile_panel');
function td_on_global_after_mobile_panel() {

	if (is_admin() && array_key_exists('theme_panel', td_global::$all_theme_panels_list) && array_key_exists('panels', td_global::$all_theme_panels_list['theme_panel'])) {

		$separator_panel = 'td-panel-separator-plugin';

		if (! in_array($separator_panel, td_global::$all_theme_panels_list['theme_panel']['panels'])) {
			td_global::$all_theme_panels_list['theme_panel']['panels'][$separator_panel] = array(
				'text' => 'PLUGINS\' SETTINGS',
				'type' => 'separator',
			);
		}

		td_global::$all_theme_panels_list['theme_panel']['panels']['td-mobile-plugin'] = array(
			'text' => 'MOBILE THEME',
			'ico_class' => 'td-ico-responsive',
			'file' => plugin_dir_path(__FILE__) . '/td_panel_settings.php',
			'type' => 'in_theme',
		);
	}
}

// If wp super cache plugin is activated, the 'wp_cache_check_mobile' function is used to determine the cache key used.
// It uses a string key 'mobile' for mobile devices, 'normal' otherwise
//
// @see wp_cache_check_mobile function.
if (file_exists(WP_CONTENT_DIR . '/plugins/wp-super-cache/wp-cache-phase1.php')) {

	/*
	 * That's how Jetpack is checking for its mobile theme.
	 *
	 * do_cacheaction('wp_cache_check_mobile') there's only in 'wp_cache_check_mobile' method of the wp-cache-phase1.php,
	 * which is actually bound to 'supercache_filename_str' cache action using add_cacheaction( 'supercache_filename_str', 'wp_cache_check_mobile' );
	 *
	 * Then do_cacheaction( 'supercache_filename_str', $extra_str ); is called only by 'supercache_filename' method of the wp-cache-phase1.php, which actually determines the
	 * cached filename.
	 *
	 * But, the 'supercache_filename' look like this
	 *
	 * function supercache_filename() {
	 * 	//Add support for https and http caching
	 * 	$is_https = ( ( isset( $_SERVER[ 'HTTPS' ] ) && 'on' ==  strtolower( $_SERVER[ 'HTTPS' ] ) ) || ( isset( $_SERVER[ 'HTTP_X_FORWARDED_PROTO' ] ) && 'https' == strtolower( $_SERVER[ 'HTTP_X_FORWARDED_PROTO' ] ) ) ); //Also supports https requests coming from an nginx reverse proxy
	 * 	$extra_str = $is_https ? '-https' : '';
	 *
	 * 	if ( function_exists( "apply_filters" ) ) {
	 * 		$extra_str = apply_filters( 'supercache_filename_str', $extra_str );
	 * 	} else {
	 * 		$extra_str = do_cacheaction( 'supercache_filename_str', $extra_str );
	 * 	}
	 * 	$filename = 'index' . $extra_str . '.html';
	 * 	return $filename;
	 * }
	 *
	 * Important! So finally, as you can see above, the 'supercache_filename_str' wp filter is used instead, whose callback is set by the 'wp_cache_phase2' method of wp-cache-phase2.php, AND NOT
	 * EXECUTED when the 'Lock Down' option is enabled.
	 */


	/**
	 * - Very iportant! The following code lines are for when it's impossible for the wp super cache plugin to detect the mobile device, or when we want to overwrite
	 * the normal functionality
	 * - Usually, when the plugin is updated, and the device browser is not too old, the mobile environment is detected
	 */
	if (function_exists('add_cacheaction') === true) {
		add_cacheaction('wp_cache_check_mobile', 'td_mobile_theme_setting');
	}


	// If WP Super Cache 'Lock Down' option is enabled, the cache plugin will use the 'supercache_filename_str' filter
	// to determine the cached filename. So, for that case it's necessary to add a supplementary filter callback 'td_formatted_mobile_theme_setting'
	//
	// Usually this filter is set by the 'wp_cache_phase2' method of wp-cache-phase2.php, who is called by 'wp_cache_postload' wp method
	if (defined('WPLOCKDOWN' ) && constant('WPLOCKDOWN') && function_exists('add_filter')) {
		add_filter('supercache_filename_str', 'td_formatted_mobile_theme_setting');
	}
}

/**
 * Wrapper function.
 *
 * @see TdMobileTheme::get_theme_setting
 *
 * @param string $cache_key - the current cache key.
 *
 * @return string
 */
function td_mobile_theme_setting($cache_key) {
	return td_mobile_theme::get_theme_setting($cache_key);
}

/**
 * Callback of the filter 'supercache_filename_str' (WP Super Cache).
 * Returns the extension that should be added to the cached filename when WP Super Cache 'Lock Down' option is enabled.
 *
 * @param $cache_key
 *
 * @return string
 */
function td_formatted_mobile_theme_setting($cache_key) {
	$theme_setting = td_mobile_theme::get_theme_setting($cache_key);

	switch ($theme_setting) {
		case 'mobile': return '-' . $theme_setting;
		case 'normal': return '';
	}

	return '';
}

/*
 * Hook for rendering a wp editor
 * wp hook - 'current_screen' has the global $current_screen set (the global variable isn't set on 'init' wp hook - the wp hook used before)
 */
add_action('current_screen', function (){

    // The screen must be checked, because without it, the mobile wp tinymce editor is created, and the save_post callbacks are called (@see td_wp_editor class)
    global $current_screen;

    if (is_admin() and current_user_can('edit_pages') and isset($current_screen) and $current_screen->post_type === 'page') {

        /**
         * Check for the theme > wp_booster > td_wp_editor.php availability and add the mobile editor class
         */
        $editor_file_path = TDC_PATH_LEGACY_COMMON . '/wp_booster/wp-admin/tinymce/td_wp_editor.php';
        if ( file_exists( $editor_file_path ) ) {
            require_once ( $editor_file_path );
            new td_wp_editor( '', 'mobile_tinymce_editor', array('textarea_rows' => 15), TD_MOBILE_EDITOR_META_KEY, 'Mobile Editor', array('page') );
        }
    }
});

/**
 * make sure the mobile theme editor metabox is always shown on pages (when the plugin is active)
 */
add_filter( 'hidden_meta_boxes' , function ( $hidden, $screen, $use_defaults ) {

    if ( ( $key = array_search( 'td_mobile_wp_editor_content_meta_box', $hidden)) !== false ) {
        unset( $hidden[$key] );
    }

    return $hidden;
}, 10, 3 );

/**
 * scroll to the Mobile Editor when user clicks on the link from the empty page warning
 */
add_action('admin_head', function(){ ?>
    <script type="text/javascript">
        jQuery(document).ready(function () {

            if ( window.location.hash === "#td_mobile_editor" ) {
                setTimeout(function(){
                    var element = document.getElementById('td_mobile_wp_editor_content_meta_box');
                    if ( element ) {
                        element.scrollIntoView();
                    }
                }, 150);
            }

        })
    </script>

    <?php
});

/**
 * woocommerce_product_archive_description is a WC function template that's overwritten
 * @see woocommerce/includes/wc-templates-functions.php
 */
if (!function_exists('woocommerce_product_archive_description')) {
	function woocommerce_product_archive_description() {
		if ( is_post_type_archive( 'product' ) && get_query_var( 'paged' ) < 2 ) {
			$shop_page = get_post( wc_get_page_id( 'shop' ) );
			if ( $shop_page ) {
				$description = wc_format_content( get_post_meta( $shop_page->ID, TD_MOBILE_EDITOR_META_KEY, true ) );
				if ( $description ) {
					echo '<div class="page-description">' . $description . '</div>';
				}
			}
		}
	}
}

/*
 * wp hook - get the post meta value as custom content before normal priority (10), to allow Visual Composer applying
 * shortcodes over this custom content. This way the VC plugin will load only the necessary resources (js,css,etc) corresponding
 * to this custom content, and not to the regular post content
 */
add_filter('the_content', 'td_mobile_get_the_content_for_vc', 9);
/**
 * Hook callback function that change the post content for VC
 *
 * @param $content
 *
 * @return mixed
 */
function td_mobile_get_the_content_for_vc($content) {
	if ( ( td_mobile_theme::is_mobile( true ) || td_mobile_theme::is_amp_request() ) and is_page() ) {

		if ( td_mobile_theme::is_amp_request() ) {

			if ( td_mobile_theme::get_option('tdm_amp') === '' ) {
				return $content;
			}

		} else {

			if (
				td_mobile_theme::is_mobile( true ) &&
				td_mobile_theme::get_option('tdm_amp') === 'amp'
			) {
				return $content;
			}

		}

		global $post;

		$the_content = get_the_content( $post );

		// The woo pages (cart, checkout and my account) are excluded from this applying filter, because their content must be shown as it is.
		// Maybe it's better to have a section in the mobile theme panel, to customize the pages that need to be excluded.
		if ( false !== array_search( $the_content, array(
				'[woocommerce_cart]',
				'[woocommerce_checkout]',
				'[woocommerce_my_account]'
			) )
		) {
			return $content;
		}

		// Important! 'td_mobile_get_the_content_for_vc' MUST BE REMOVED TO 'the_content', for not having an infinite cycle
		remove_filter('the_content', 'td_mobile_get_the_content_for_vc', 9);

		$mobile_content = get_post_meta( $post->ID, TD_MOBILE_EDITOR_META_KEY, true );

		// Important! The wptexturize function replace && with #038 in the content. Strangely, if affects the js script of some plugins (ex rev_slider)
		// So, for the mobile content, we remove it, apply 'the_content' filter and then add it again.
		$wptexturize_priority = has_filter('the_content', 'wptexturize');
		if ( false !== $wptexturize_priority ) {
			remove_filter( 'the_content', 'wptexturize', $wptexturize_priority );
		}

//		// 'wpautop' also generates issues for js script
//		$wpautop_priority = has_filter( 'the_content', 'wpautop' );
//		if ( false !== $wpautop_priority ) {
//			remove_filter( 'the_content', 'wpautop', $wpautop_priority );
//		}

		// wpautop is removed from composer @see tdc_on_remove_wpautop()
		// we need to readd it for mobile editor content
		$wpautop_priority = has_filter( 'the_content', 'wpautop' );
		if ( false === $wpautop_priority ) {
			add_filter( 'the_content', 'wpautop' );
		}

		$mobile_content = apply_filters('the_content', $mobile_content);
		$mobile_content = str_replace(']]>', ']]&gt;', $mobile_content);

		// Important! 'td_mobile_get_the_content_for_vc' MUST BE REATTACHED TO 'the_content', because it's necessary for plugins that extract the post content multiple times (ex.yoast plugin)
		add_filter('the_content', 'td_mobile_get_the_content_for_vc', 9);

		return $mobile_content;
	}
	return $content;
}

// wp hook - it registers mobile menu locations
add_action('init', 'on_td_init_register_nav_menu' , 11);
/**
 * wp hook callback function
 * It registers additional mobile menu locations.
 */
function on_td_init_register_nav_menu() {
	register_nav_menus(
		array(
			'header-menu-mobile' => 'Header Menu Mobile (main)',
			'footer-menu-mobile' => 'Footer Menu Mobile',
		)
	);
}

/**
 * It gets the main theme key.
 * @return mixed|void
 */
function td_get_actual_current_theme() {
	$removed = remove_action('option_stylesheet', array( 'td_mobile_theme', 'mobile' ));
	$stylesheet = get_option('stylesheet');

	if ( $removed ) {
		add_action('option_stylesheet', array('td_mobile_theme', 'mobile'));
	}

	return $stylesheet;
}

function td_get_menu_locations() {
	$theme_slug = td_get_actual_current_theme();
	$mods = get_option("theme_mods_{$theme_slug}");

	if (isset($mods['nav_menu_locations']) && !empty($mods['nav_menu_locations'])) {
		return $mods['nav_menu_locations'];
	}
	return false;
}

function td_wp_nav_menu($args) {
	$location = td_get_menu_locations();
	if ($location !== false && array_key_exists($args['theme_location'], $location)) {
		$menu_id = $location[ $args['theme_location'] ];
		$args['menu'] = $menu_id;
	}
	wp_nav_menu($args);
}

/**
 * " This is done just for having admin capabilities for mobile theme in the theme panel ??? "
 * @since newspaper/newsmag tf refactor this is done mainly for ajax requests ( ajax search )
 */
add_action('td_wp_booster_loaded', function () {

	if ( is_admin() ) {
		require_once( TDC_PATH . '/mobile/includes/td_global_mob.php' );
		require_once( TDC_PATH . '/mobile/includes/td_config_mob.php' );
		td_config_mob::on_td_global_after_config();
	}

}, 11);

/**
 * Here we need to catch the td_ajax_search ajax request, and to call the mobile version of
 * the ajax search.
 *
 * These hooks could not be implemented into the mobile theme, because the mobile theme is not set
 * for admin url (the main theme is set for admin url requests)
 */
add_action('wp_ajax_nopriv_td_ajax_search', 'td_on_mobile_ajax_search');
add_action('wp_ajax_td_ajax_search',        'td_on_mobile_ajax_search');
function td_on_mobile_ajax_search() {

	if ( td_mobile_theme::is_mobile( true ) || ( td_mobile_theme::get_option('tdm_amp') !== '' && td_mobile_theme::is_amp_request() ) ) {

	    // prevent mob ajax search loading on theme responsive version when the mob theme is set to load just for amp requests
	    if ( td_mobile_theme::get_option('tdm_amp') === 'amp' && ! td_mobile_theme::is_amp_request() ) {
	        return;
        }

		require_once( TDC_PATH  . '/mobile/includes/td_ajax_mob.php' );
		die( json_encode( td_ajax_mob::on_ajax_search() ) );
	}
}

/**
 * remove the mobile theme page-pagebuilder-latest page template from gutenberg & classic page editor
 * ( fix for gutenberg which was displaying the this template in the page template dropdown )
 */
add_filter('theme_page_templates', function($post_templates){
	unset($post_templates['mobile/page-pagebuilder-latest.php']);
	return $post_templates;
});

/**
 * this adds wp blocks editor(gutenberg) assets
 * is loaded from here because we need this to always run as long the mob theme is active
 */
require_once( TDC_PATH . '/mobile/includes/td_block_editor_assets_mob.php' );

