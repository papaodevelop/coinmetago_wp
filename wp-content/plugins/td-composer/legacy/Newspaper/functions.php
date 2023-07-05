<?php
/*
    Our portfolio:  http://themeforest.net/user/tagDiv/portfolio
    Thanks for using our theme!
    tagDiv - 2021
*/

/**
 * Load the speed booster framework + theme specific files
 */

// load the deploy mode
require_once('td_deploy_mode.php');

// load the config
require_once('includes/td_config.php');
require_once('includes/td_config_helper.php');
add_action('td_global_after', array('td_config', 'on_td_global_after_config'), 9); //we run on 9 priority to allow plugins to updage_key our apis while using the default priority of 10

// load the theme wp booster
require_once( TDC_PATH . '/legacy/common/wp_booster/td_wp_booster_functions.php');

// load guten blocks editor assets
require_once('includes/td_guten_blocks_editor_assets.php');

require_once('includes/widgets/td_page_builder_widgets.php'); // widgets
if ( ! td_util::is_mobile_theme() ) {
    require_once('includes/shortcodes/td_misc_shortcodes.php');
}

require_once('includes/td_css_generator.php');
require_once('includes/td_svg_theme_fonts_list.php');

add_filter( 'body_class', function( $classes ) {
    if( isset( $_COOKIE['td_dark_mode'] ) && $_COOKIE['td_dark_mode'] == true ) {
        $classes[] = 'is_dark';
    }

    return $classes;
} );

//fix accessibility warnings on pagination arrows (lighthouse)
add_filter('next_posts_link_attributes', function() {
	return ' aria-label="next-page" ';
});
add_filter('previous_posts_link_attributes', function() {
	return ' aria-label="prev-page" ';
});

/* ----------------------------------------------------------------------------
 * bbPress
 */
// change avatar size to 40px
function td_bbp_change_avatar_size($author_avatar, $topic_id, $size) {
	$author_avatar = '';
	if ($size == 14) {
		$size = 40;
	}
	$topic_id = bbp_get_topic_id( $topic_id );
	if ( !empty( $topic_id ) ) {
		if ( !bbp_is_topic_anonymous( $topic_id ) ) {
			$author_avatar = get_avatar( bbp_get_topic_author_id( $topic_id ), $size );
		} else {
			$author_avatar = get_avatar( get_post_meta( $topic_id, '_bbp_anonymous_email', true ), $size );
		}
	}
	return $author_avatar;
}
add_filter('bbp_get_topic_author_avatar', 'td_bbp_change_avatar_size', 20, 3);
add_filter('bbp_get_reply_author_avatar', 'td_bbp_change_avatar_size', 20, 3);
add_filter('bbp_get_current_user_avatar', 'td_bbp_change_avatar_size', 20, 3);

//add_action('shutdown', 'test_td');
function test_td () {
    if (!is_admin()){
        td_api_base::_debug_get_used_on_page_components();
    }
}

/**
 * tdStyleCustomizer.js is required
 */
if ( TD_DEBUG_LIVE_THEME_STYLE && !( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) ) {
    add_action('wp_footer', 'td_theme_style_footer');
		// new live theme demos
	    function td_theme_style_footer() {
		    ?>
            <a href="https://demo.tagdiv.com/select_demo/newspaper-prebuilt-websites/?utm_source=live_pre[…]&utm_medium=click&utm_campaign=demos&utm_content=demos_button" target="_blank" rel="noreferrer" id="td-theme-demos-button" class="td-right-demos-button">DEMOS</a>
            <a href="https://tagdiv.com/web-development-services/?utm_source=live_demo&utm_medium=click&utm_campaign=demos&utm_content=ser_sticky" id="td-theme-services-button" class="td-right-demos-button" >SERVICES</a>
            <a href="https://themeforest.net/item/newspaper/5489609?utm_source=live_preview&utm_medium=click&utm_campaign=demos&utm_content=buy_button" id="td-theme-buy-button" class="td-right-demos-button">BUY</a>
		    <?php
	    }

}

//td_demo_state::update_state("music_life", 'full');
