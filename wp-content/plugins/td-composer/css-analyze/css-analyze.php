<?php
/**
 * Created by PhpStorm.
 * User: tagdiv
 * Date: 17.12.2020
 * Time: 20:53
 */

// 'plugin.php' is necessary for calling 'is_plugin_active'
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

//define('TD_LIVE_CSS_URL', plugins_url('css-live'));
define( 'TD_ANALYZE_CSS_VERSION', '1.1' );

if ( is_plugin_active( 'td-composer/td-composer.php' ) ) {
    define( 'TD_ANALIZE_CSS_EXTENSION_URL', plugins_url( 'td-composer' ) . '/css-analize' );
}

require_once "includes/td_analyze_css_ajax.php";
require_once "includes/td_analyze_css_storage.php";
require_once "includes/td_analyze_css_util.php";

require_once "includes/td_analyze_css_composer.php";

add_action('wp_loaded', function() {
    $path = '/td_cache/td_analyze/css/';
	td_analyze_css_util::td_check_cache_dir( WP_CONTENT_DIR . '/td_cache/td_analyze/' );

	if ( td_analyze_css_util::td_check_cache_dir( WP_CONTENT_DIR . $path ) ) {
		define( 'TD_ANALYZE_CSS_CACHE_DIR', WP_CONTENT_DIR . $path );
		define( 'TD_ANALYZE_CSS_CACHE_URL', site_url() . '/wp-content' . $path );
	}
});

add_action('wp_head', function() {

    if (!empty($_GET['tda_iframe']) ) {
	    ob_start();
	    ?>
        <script>
            //         (function() {
            //     fetch("https://raw.githubusercontent.com/akinuri/js-lib/master/EventListener.js")
            //         .then(function (response) {
            //             return response.text();
            //         })
            //         .then(function (text) {
            //             eval(text);
            //             window.EventListeners = EventListeners;
            //         });
            // })(window);

            // ================================================== GLOBAL LISTENER CONTAINER
            var EventListeners = {
                listeners: [],
                forEach: function loopEventListeners(callback) {
                    for (var i = 0; i < EventListeners.listeners.length; i++) {
                        var listener = EventListeners.listeners[i];
                        callback(listener, i);
                    }
                },
                get: function getEventListeners(selector) {
                    var result = [];
                    EventListeners.forEach(function (listener) {
                        switch (typeof selector) {
                            case "object":
                                if (listener.target == selector) {
                                    result.push(listener);
                                }
                                break;
                            case "string":
                                if (listener.type == selector) {
                                    result.push(listener);
                                }
                                break;
                        }
                    });
                    return result;
                },
                add: function logEventListener(listener) {
                    EventListeners.listeners.push(listener);
                },
                remove: function removeEventListener(victimListener) {
                    EventListeners.forEach(function (listener, index) {
                        if (victimListener.target == listener.target && victimListener.type == listener.type && victimListener.callback == listener.callback) {
                            EventListeners.listeners.splice(index, 1);
                        }
                    });
                },
            };


            // ================================================== EVENT LISTENER OBJECT
            function EventListener() {
                this.target = null;
                this.type = null;
                this.callback = null;
                this.options = null;
                this.useCapture = null;
                this.wantsUntrusted = null;
                this.parseArgs.apply(this, Array.from(arguments));
            }

            EventListener.prototype.parseArgs = function parseArgs(target, type, callback) {
                if (arguments.length < 3) {
                    return;
                }
                this.target = target;
                this.type = type;
                this.callback = callback;
                switch (arguments.length) {
                    case 4:
                        switch (typeof arguments[3]) {
                            case "object":
                                this.options = arguments[3];
                                break;
                            case "boolean":
                                this.useCapture = arguments[3];
                                break;
                        }
                        break;
                    case 5:
                        if (typeof args[3] == "boolean") {
                            this.useCapture = arguments[3];
                            this.wantsUntrusted = arguments[4];
                        }
                        break;
                }
            };

            EventListener.prototype.remove = function removeEventListener() {
                if (this.options) {
                    this.target.removeEventListener(this.type, this.callback, this.options);
                    EventListeners.remove(this);
                } else if (this.useCapture != null) {
                    if (this.wantsUntrusted != null) {
                        this.target.removeEventListener(this.type, this.callback, this.useCapture, this.wantsUntrusted);
                        EventListeners.remove(this);
                    } else {
                        this.target.removeEventListener(this.type, this.callback, this.useCapture);
                        EventListeners.remove(this);
                    }
                } else {
                    this.target.removeEventListener(this.type, this.callback);
                    EventListeners.remove(this);
                }
            };

            // ================================================== NATIVE API

            // https://developer.mozilla.org/en-US/docs/Web/API/EventTarget/addEventListener
            EventTarget.prototype.addEventListener = function (addEventListener) {
                //console.warn("EventTarget.prototype.addEventListener() has been modified.");
                return function () {
                    var evtList = null;
                    switch (arguments.length) {
                        // EventTarget.addEventListener(type, callback)
                        case 2:
                            evtList = new EventListener(this, arguments[0], arguments[1]);
                            addEventListener.call(evtList.target, evtList.type, evtList.callback);
                            //console.log(evtList.callback);
                            EventListeners.add(evtList);
                            return evtList;
                        // EventTarget.addEventListener(type, callback, options)
                        // EventTarget.addEventListener(type, callback, useCapture)
                        case 3:
                            evtList = new EventListener(this, arguments[0], arguments[1]);
                            switch (typeof arguments[2]) {
                                case "object":
                                    evtList.options = arguments[2];
                                    addEventListener.call(evtList.target, evtList.type, evtList.callback, evtList.options);
                                    EventListeners.add(evtList);
                                    return evtList;
                                case "boolean":
                                    evtList.useCapture = arguments[2];
                                    addEventListener.call(evtList.target, evtList.type, evtList.callback, evtList.useCapture);
                                    EventListeners.add(evtList);
                                    return evtList;
                            }
                            break;
                        // EventTarget.addEventListener(type, callback, useCapture, wantsUntrusted)
                        case 4:
                            evtList = new EventListener(this, arguments[0], arguments[1]);
                            if (typeof arguments[2] == "boolean") {
                                evtList.useCapture = arguments[2];
                                evtList.wantsUntrusted = arguments[3];
                                addEventListener.call(evtList.target, evtList.type, evtList.callback, evtList.useCapture, evtList.wantsUntrusted);
                                EventListeners.add(evtList);
                                return evtList;
                            }
                            break;
                    }
                }
            }(EventTarget.prototype.addEventListener);

            // https://developer.mozilla.org/en-US/docs/Web/API/EventTarget/removeEventListener
            EventTarget.prototype.removeEventListener = function (removeEventListener) {
                //console.warn("EventTarget.prototype.removeEventListener() has been modified.");
                return function () {
                    var evtList = null;
                    switch (arguments.length) {
                        case 2:
                            evtList = new EventListener(this, arguments[0], arguments[1]);
                            removeEventListener.call(evtList.target, evtList.type, evtList.callback);
                            EventListeners.remove(evtList);
                            break;
                        case 3:
                            evtList = new EventListener(this, arguments[0], arguments[1]);
                            switch (typeof arguments[2]) {
                                case "object":
                                    evtList.options = arguments[2];
                                    removeEventListener.call(evtList.target, evtList.type, evtList.callback, evtList.options);
                                    EventListeners.remove(evtList);
                                    break;
                                case "boolean":
                                    evtList.useCapture = arguments[2];
                                    removeEventListener.call(evtList.target, evtList.type, evtList.callback, evtList.useCapture);
                                    EventListeners.remove(evtList);
                                    break;
                            }
                            break;
                    }
                }
            }(EventTarget.prototype.removeEventListener);

        </script>

	    <?php
	    echo ob_get_clean();
    }
});



if ( is_user_logged_in() ) {

	// 100000 priority to be the last
	add_action( 'wp_footer', 'tdc_on_analyze_css_inject_editor', 100000 );
	function tdc_on_analyze_css_inject_editor() {

		?>

        <div id="tdw-css-analyze-cover"></div>

        <div id="tdw-css-analyze" style="display: none" class="tdw-drag-dialog">
            <header class="tda-header-drag"></header>

            <div class="tda-content">
                <div class="tda-index">
                    <div class="tda-modal-body">
                        <div class="tda-load">
                            <div class="tda-header-wrap">
                                <div class="tda-header">
                                    <span class="tda-header-title">Welcome to tagDiv CSS Analyzer</span>

                                    <button class="td-icon-close-mobile tda-close"></button>
                                </div>
                            </div>

                            <div class="tda-content-wrap">
                                <div class="tda-content">
                                    <div class="tda-btns-wrap">

                                        <a href="#" class="tda-btn tda-btn-manual" title="This allows you to interact manually with a section/component from the page and the tool will record all the CSS involved">Find Manual</a>
                                        <a href="#" class="tda-btn tda-btn-save tda-save-essential-css" title="This process generates the Critical CSS file and moves the non-critical (Rest CSS) in the footer to later load. It gives your site a performance boost both for user experience and speed tests.">
                                            <span class="tda-submit">Generate Critical CSS</span>
                                            <span class="tda-saving"><span class="tda-dots"></span>Saving</span>
                                            <span class="tda-done"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="1229" height="1024" viewBox="0 0 1229 1024"><path d="M409.6 730.453l-286.72-286.72-95.573 95.573 382.293 382.293 819.2-819.2-95.573-95.573-723.627 723.627z"></path></svg>Done</span>
                                        </a>

                                    </div>

                                    <div class="tda-results-wrap">
                                        <div class="tda-results-toggle">
                                            <div class="tda-results-current" data-current="" title="CSS rules found by tagDiv Analyzer for this page"></div>

                                            <div class="tda-results-history-wrap" style="display: none">
                                                <div class="tda-results-history-toggle">
                                                    <span>Results history</span>
                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 768 768"><path d="M736 384c0-97.184-39.424-185.248-103.104-248.896s-151.712-103.104-248.896-103.104-185.248 39.424-248.896 103.104-103.104 151.712-103.104 248.896 39.424 185.248 103.104 248.896 151.712 103.104 248.896 103.104 185.248-39.424 248.896-103.104 103.104-151.712 103.104-248.896zM672 384c0 79.552-32.192 151.488-84.352 203.648s-124.096 84.352-203.648 84.352-151.488-32.192-203.648-84.352-84.352-124.096-84.352-203.648 32.192-151.488 84.352-203.648 124.096-84.352 203.648-84.352 151.488 32.192 203.648 84.352 84.352 124.096 84.352 203.648zM416 512v-128c0-17.664-14.336-32-32-32s-32 14.336-32 32v128c0 17.664 14.336 32 32 32s32-14.336 32-32zM384 288c17.664 0 32-14.336 32-32s-14.336-32-32-32-32 14.336-32 32 14.336 32 32 32z"></path></svg>
                                                    <div class="tda-results-history"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tda-results-box">
                                            <div class="tda-results"></div>
                                        </div>

                                        <div class="tda-results-filters">
                                            <div class="tda-results-filter">
                                                <div class="tda-results-filter-checkbox">
                                                    <input type="checkbox" id="tda-rsfc-selected"
                                                           class="tda-only-selected">
                                                    <label for="tda-rsfc-selected" title="This will hide unused CSS">
                                                        <span></span>
                                                        <span>Hide unused</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="tda-results-filter tda-filter-diff">
                                                <div class="tda-results-filter-checkbox">
                                                    <input type="checkbox" id="tda-rsfc-differences"
                                                           class="tda-only-diff">
                                                    <label for="tda-rsfc-differences" title="Show found differences">
                                                        <span></span>
                                                        <span>Show differences</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="tda-results-filter tda-filter-viewports">
                                                <div class="tda-results-filter-range">
                                                    <label for="tda-rsfc-viewport">Viewport size</label>
                                                    <input type="range" min="100" max="1000" step="10" value="1000"
                                                           id="tda-rsfc-viewport" class="tda-range-window">
                                                </div>
                                            </div>
                                            <?php if ( is_page()) { ?>
                                                <a class="tda-btn-auto" href="#"  title="This command performs an automatic test on this page to find all the CSS style rules. It generates a clean CSS file and removes the unused CSS, making the page load faster.(use with caution)">Remove unused CSS (beta)</a>
                                            <?php } ?>
                                        </div>


                                    </div>

                                    <div class="tda-auto-wrap">
                                        <h4 class="tda-auto-title">Running the CSS analyzer</h4>

                                        <div class="tda-auto-progress-wrap">
                                            <div class="tda-auto-progress-wrap-inner">
                                                <div class="tda-auto-progress-bar">
                                                    <div class="tda-auto-progress-bar-fill"></div>
                                                </div>

                                                <div class="tda-auto-progress-info" style="visibility: hidden">
                                                    Step <span class="tda-current-step"></span> of <span class="tda-total-steps"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tda-current-viewport"></div>

                                        <a href="#" class="tda-btn tda-btn-auto-cancel">Cancel CSS analyzer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer>
                <div class="tdw-resize"></div>
            </footer>
        </div>

		<?php
	}
}




/**
 * WP-admin - add js in header on all the admin pages (wp-admin and the iframe Wrapper. Does not run in the iframe)
 */
add_action( 'wp_head', 'td_analyze_css_on_wp_head' );
add_action( 'admin_head', 'td_analyze_css_on_wp_head' );
function td_analyze_css_on_wp_head() {

    global $post;

    // the settings that we load in wp-admin and wrapper. We need json to be sure we don't get surprises with the encoding/escaping
    $td_analyze_css_blobal = array(
        'adminUrl' => admin_url(),
        'wpRestNonce' => wp_create_nonce('wp_rest'),
        'wpRestUrl' => rest_url(),
        'permalinkStructure' => get_option('permalink_structure')
    );

    if (!is_null($post)) {

        if ( is_page() || 'tdb_templates' === get_post_type()) {

            $td_analyze_css_blobal['postId'] = $post->ID;

        } else {

            if (is_single() || is_category()) {

                $template_id = td_util::get_template_id($post);

                if (empty($template_id)) {
                    $td_analyze_css_blobal['postId'] = $post->ID;
                } else {
                    $td_analyze_css_blobal['postId'] = $template_id;;
                }
            }
        }
    }

    ob_start();
    ?>
    <script>
        window.tdaGlobal = <?php echo json_encode( $td_analyze_css_blobal );?>;
    </script>
    <?php
    $buffer = ob_get_clean();
    echo $buffer;
}



if ( is_user_logged_in() && current_user_can('publish_pages') ) {
    add_action( 'wp_enqueue_scripts', 'td_analyze_css_load_plugin_css' );
    add_action( 'wp_enqueue_scripts', 'td_analyze_css_load_plugin_js' );
}



function td_analyze_css_load_plugin_css() {
    if ( defined('TDC_USE_LESS') && TDC_USE_LESS === true ) { // we use defined because this can run without that constant when td-composer is inactive
        wp_enqueue_style( 'td_analyze_css_frontend', TDC_URL . '/td_less_style.css.php?part=td_analyze_css_frontend', false, TD_COMPOSER );
    } else {
        wp_enqueue_style( 'td_analyze_css_frontend', TDC_URL . '/css-analyze/assets/css/td_analyze_css_frontend.css', false, TD_COMPOSER );
    }
}

function td_analyze_css_load_plugin_js() {
    if ( defined( 'TDC_DEPLOY_MODE' ) && TDC_DEPLOY_MODE == 'deploy' ) {
        wp_enqueue_script('js_files_for_plugin_analyze_css', TDC_URL . '/assets/js/js_files_for_plugin_analyze_css.min.js', array('jquery', 'underscore', 'backbone'), TD_COMPOSER, true);
    } else {
        tdc_util::enqueue_js_files_array(tdc_config::$js_files_for_plugin_analyze_css, array('jquery', 'underscore', 'backbone'));
    }
}


function td_analyze_css_load_admin_css() {

    if ( defined('TDC_USE_LESS') && TDC_USE_LESS === true ) { // we use defined because this can run without that constant when td-composer is inactive
        wp_enqueue_style( 'td_analyze_css_composer', TDC_URL . '/td_less_style.css.php?part=td_analyze_css_composer', false, TD_COMPOSER );
    } else {
        wp_enqueue_style( 'td_analyze_css_composer', TDC_URL . '/css-analyze/assets/css/td_analyze_css_composer.css', false, TD_COMPOSER );
    }
}


add_action( 'admin_bar_menu', 'td_analyze_css_admin_bar_button', 9999 );
function td_analyze_css_admin_bar_button() {
    global $wp_admin_bar, $post;

    if (!is_super_admin() ||
        !is_admin_bar_showing() ||
        is_admin() ||
        ( isset($post->post_status) && 'publish' !== $post->post_status ) ||
        (!is_page() && !is_single() && !is_category()) || TD_THEME_NAME !== 'Newspaper') {
        return;
    }

    if ( 'tdb_templates' === get_post_type() ) {
        $tdb_template_type = get_post_meta( get_the_ID(), 'tdb_template_type', true );
        if ( !in_array($tdb_template_type, array('category', 'single'))) {
            return;
        }
    }

    $class = '';
    $link_title = 'Increase the website speed with the tagdiv CSS Analizer';

    $td_page = get_query_var('page') ? get_query_var('page') : 1; //rewrite the global var
    $td_paged = get_query_var('paged') ? get_query_var('paged') : 1; //rewrite the global var

    //paged works on single pages, page - works on homepage
    $paged = max( $td_page, $td_paged );

    $ref_id = !empty($post->ID) ? $post->ID : null;

    if (!empty($ref_id) && 1 === $paged) {

        if ( 'tdb_templates' !== get_post_type() ) {
	        $template_id = td_util::get_template_id( $post );
        }

        if ( ! empty( $template_id ) ) {
            $ref_id = $template_id;
        } else if ( is_category()) {
            return;
        }

        $tda_essential_css = get_post_meta( $ref_id, 'tda_essential_css', true );
        if ( ! empty( $tda_essential_css ) ) {
            $class      = 'tda-has-essential-css';
            $link_title = 'tagDiv Css Analyzer - serving optimized CSS for this page';
        }

        $wp_admin_bar->add_menu( array(
            'id'    => 'td_analyze_css_menu',
            'meta'  => array(
                'title' => $link_title,
                'class' => $class
            ),
            'title' => 'tagDiv CSS Analyzer<span class="td-mobile-title">CSS</span>',
            'href'  => '#'
        ) );

        $args = array(
            'parent' => 'td_analyze_css_menu',
            'id'     => 'td_analyze_css',
            'title'  => 'Run CSS Analyzer',
            'href'   => '#',
            'meta'   => array(
                'title' => 'Boost performance - Run Analyzer to find all the CSS style rules used on this page'
            ),
        );
        $wp_admin_bar->add_node( $args );

        $args = array(
            'parent' => 'td_analyze_css_menu',
            'id'     => 'td_clear_analyze_css',
            'title'  => 'Remove Generated CSS',
            'href'   => '#',
            'meta'   => array(
                'title' => 'Remove the CSS generated by the Analyzer for this page'
            ),
        );
        $wp_admin_bar->add_node( $args );
    }
}

add_filter('wp_save_post_revision_post_has_changed', function($post_has_changed, $last_revision, $post) {
    if ($post_has_changed) {

        remove_filter('get_post_metadata', 'tda_filter_get_post_metadata');
        $tda_essential_css = get_post_meta( $post->ID, 'tda_essential_css', true );

        if ( ! empty( $tda_essential_css ) && defined( 'TD_ANALYZE_CSS_CACHE_DIR' )) {
            delete_post_meta( $post->ID, 'tda_essential_css' );
            delete_post_meta( $post->ID, 'tda_critical_css' );

            foreach ( [ 'critical', 'rest' ] as $val ) {
                $file_path = TD_ANALYZE_CSS_CACHE_DIR . $post->ID . '-tda-' . $val . '-css-' . $tda_essential_css . '.css';
                if ( file_exists( $file_path ) ) {
                    unlink( $file_path );
                }
            }
        }
    }

    return $post_has_changed;
}, 10, 3);


add_filter('determine_current_user', function($user_id) {
    return false;
}, 1, 1);

add_filter( 'get_post_metadata', function( $value, $object_id, $meta_key, $single) {

    if ( 'tda_essential_css' === $meta_key || 'tda_group_ids' === $meta_key ) {

        if ( td_util::tdc_is_live_editor_iframe() || !empty( tdc_util::get_get_val('tda_action'))) {
            return false;
        }

        global $paged;

        $td_page = get_query_var('page') ? get_query_var('page') : 1; //rewrite the global var
        $td_paged = get_query_var('paged') ? get_query_var('paged') : 1; //rewrite the global var

        //paged works on single pages, page - works on homepage
        $paged = max( $td_page, $td_paged );

        if ( 1 !== $paged) {
            return false;
        }
    }
    return $value;
}, 11, 4);

if (!empty($_GET['tda_action']) ) {
    wp_set_current_user( 0 );
}

//if (!empty($_GET['tda_iframe']) ) {
//    add_filter( 'comments_open', function( $open, $post_id ) {
//		return false;
//	}, 10, 2 );
//}


