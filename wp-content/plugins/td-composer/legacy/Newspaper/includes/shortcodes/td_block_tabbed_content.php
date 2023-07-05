<?php
/**
 * Created by PhpStorm.
 * User: tagdiv
 * Date: 30.12.2014
 * Time: 13:27
 */


class td_block_tabbed_content extends td_block {

    protected $shortcode_atts = array(); //the atts used for rendering the current block
    private $unique_block_class;

    public function get_custom_css() {
        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $in_composer = td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax();
        $in_element = td_global::get_in_element();
        $unique_block_class_prefix = '';
        if( $in_element || $in_composer ) {
            $unique_block_class_prefix = 'tdc-row .';

            if( $in_element && $in_composer ) {
                $unique_block_class_prefix = 'tdc-row-composer .';
            }
        }
        $unique_block_class = $unique_block_class_prefix . $this->block_uid;

        $unique_block_modal_class = $this->block_uid . '_m';

        $compiled_css = '';

        $raw_css =
            "<style>
            
                /* @style_general_td_block_tabbed_content */
                .td_block_tabbed_content > .td_block_inner {
                    display: flex;
                }
                .td_block_tabbed_content .td-tc-tabs {
                    display: flex;
                    position: relative;
                }
                .td_block_tabbed_content .td-tc-tab {
                    display: flex;
                    align-items: center;
                    position: relative;
                }
                .td_block_tabbed_content .td-tc-page-content {
                    display: none;
                }
                .td_block_tabbed_content .td-tc-page-content-visible {
                    display: block;
                }
                .td_block_tabbed_content .td-tc-page-content .tdc-row:not([class*='stretch_row_']),
                .td_block_tabbed_content .td-tc-page-content .tdc-row-composer:not([class*='stretch_row_'])  {
                    width: auto !important;
                    max-width: 1240px;
                }
                
                /* @style_general_td_block_tabbed_content_composer */
                .td_block_tabbed_content .td-tc-tabs {
                    pointer-events: none; 
                }

			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        /*-- GENERAL -- */
        $res_ctx->load_settings_raw( 'style_general_td_block_tabbed_content', 1 );
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $res_ctx->load_settings_raw( 'style_general_td_block_tabbed_content_composer', 1 );
        }


    }

	/**696
	 * Disable loop block features. This block does not use a loop and it dosn't need to run a query.
	 */
	function __construct() {
		parent::disable_loop_block_features();
	}


    function render($atts, $content = null) {

        parent::render($atts); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query)


        $this->unique_block_class = $this->block_uid;

        $this->shortcode_atts = shortcode_atts(
            array_merge(
                td_global_blocks::get_mapped_atts( __CLASS__ ),
                td_api_style::get_style_group_params( 'tds_tabbed_content' )
            ), $atts );

        $tds_tabbed_content = $this->get_att('tds_tabbed_content');
        if ( empty( $tds_tabbed_content ) ) {
            $tds_tabbed_content = td_util::get_option( 'tds_tabbed_content', 'tds_tabbed_content1');
        }
        $tds_tabbed_content_instance = new $tds_tabbed_content( $this->shortcode_atts, $this->unique_block_class );


        // additional block classes
        $additional_classes = array();
        $additional_classes[] = !empty($tds_tabbed_content) ? $tds_tabbed_content : 'tds_tabbed_content1';


        // remember active tab on refresh
        $remember_tab = $this->get_att('remember_tab');
        $tc_id = $this->get_att('tc_id');

        $active_page_id = '';
        if( $remember_tab != '' && isset( $_GET[$tc_id] ) ) {
            $active_page_id = $_GET[$tc_id];
        }



        // pages
        $pages_count = 5;
        $pages = array();

        for ( $i = 0; $i < $pages_count; $i++ ) {
            $page_id = $this->get_att('page_' . $i . '_id');

            if( $page_id != '' && get_post_type($page_id) == 'page' ) {
                $page_title = $this->get_att('page_' . $i . '_title');
                $page_title = $page_title != '' ? $page_title : ( 'Page ' . ( $i + 1 ) . ' title' );

                $pages[$this->get_att('page_' . $i . '_id')]['title'] = $page_title;
                $pages[$this->get_att('page_' . $i . '_id')]['icon'] = $this->get_icon_att('page_' . $i . '_tdicon');
            }
        }


        $buffy = ''; //output buffer

        $buffy .= '<div class="' . $this->get_block_classes($additional_classes) . '" ' . $this->get_block_html_atts() . '>';

            // get the block css
            $buffy .= $this->get_block_css();

            // get the tabbed content style css
            $buffy .= $tds_tabbed_content_instance->render();

            // get the js for this block
            $buffy .= $this->get_block_js();


            if( empty( $pages ) ) {
                $buffy .= td_util::get_block_error('Tabbed Content', 'Please fill in at least 1 <strong>page ID</strong> in order to display something here.');
            } else {
                $buffy .= '<div id=' . $this->block_uid . ' class="td_block_inner">';
                    $buffy .= '<div class="td-tc-tabs">';
                        foreach ( $pages as $page_id => $page_data ) {
                            $tab_active = false;

                            if( $active_page_id != '' ) {
                                if( array_key_exists($active_page_id, $pages) ) {
                                    if( $active_page_id == $page_id ) {
                                        $tab_active = true;
                                    }
                                } else {
                                    if( key($pages) == $page_id ) {
                                        $tab_active = true;
                                    }
                                }
                            } else {
                                if( key($pages) == $page_id ) {
                                    $tab_active = true;
                                }
                            }

                            $icon = $page_data['icon'];
                            $icon_data = '';
                            if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
                                $icon_data = 'data-td-svg-icon="' . $icon . '"';
                            }

                            $buffy_icon = '';
                            if( $icon != '' ) {
                                if( base64_encode( base64_decode( $icon ) ) == $icon ) {
                                    $buffy_icon .= '<span class="td-tc-tab-icon td-tc-tab-icon-svg" ' . $icon_data . '>' . base64_decode( $icon ) . '</span>';
                                } else {
                                    $buffy_icon .= '<i class="td-tc-tab-icon ' . $icon . '"></i>';
                                }
                            }

                            $buffy .= '<div class="td-tc-tab ' . ( $tab_active ? 'td-tc-tab-active' : '' ) . '" data-page-id="' . $page_id . '">';
                                $buffy .= $buffy_icon;
                                $buffy .= '<div class="td-tc-tab-txt">' . $page_data['title'] . '</div>';
                            $buffy .= '</div>';
                        }
                    $buffy .= '</div>';

                    $buffy .= '<div class="td-tc-content">';
                        $buffy .= '<div class="td-tc-content-inner">';
                            foreach ( $pages as $page_id => $page_data ) {
                                $content_visible = false;

                                if( $active_page_id != '' ) {
                                    if( array_key_exists($active_page_id, $pages) ) {
                                        if( $active_page_id == $page_id ) {
                                            $content_visible = true;
                                        }
                                    } else {
                                        if( key($pages) == $page_id ) {
                                            $content_visible = true;
                                        }
                                    }
                                } else {
                                    if( key($pages) == $page_id ) {
                                        $content_visible = true;
                                    }
                                }

                                $buffy .= '<div class="td-tc-page-content ' . ( $content_visible ? 'td-tc-page-content-visible' : '' ) . '" data-page-id="' . $page_id . '">';
                                    $page = get_post($page_id);

                                    if ( null !== $page ) {
                                        td_global::set_in_element( true );
                                        $tab_content = $page->post_content;

                                        if ( is_plugin_active('td-subscription/td-subscription.php') && has_filter('the_content', array(tds_email_locker::instance(), 'lock_content'))) {
                                            $has_content_filter = true;
                                            remove_filter( 'the_content', array(tds_email_locker::instance(), 'lock_content') );
                                        }

                                        $tab_content = preg_replace('/\[tdm_block_popup.*?\]/i', '', $tab_content);
                                        $tab_content = apply_filters('the_content', $tab_content);
                                        $tab_content = str_replace(']]>', ']]&gt;', $tab_content);

                                        // the has_filter check is made for plugins, like bbpress, who think it's okay to remove all filters on 'the_content'
                                        if ( ! has_filter( 'the_content', 'do_shortcode' ) ) {
                                            $tab_content = do_shortcode( $tab_content );
                                        }

                                        if (!empty($has_content_filter)) {
                                            add_filter('the_content', array(tds_email_locker::instance(), 'lock_content'));
                                        }

                                        td_global::set_in_element( false );

                                        $buffy .= $tab_content;
                                    }
                                $buffy .= '</div>';
                            }
                        $buffy .= '</div>';
                    $buffy .= '</div>';
                $buffy .= '</div>';


                ob_start();
                ?>
                <script>
                    /* global jQuery:{} */
                    jQuery().ready(function () {

                        let uid = '<?php echo $this->block_uid ?>',
                            $blockObj = jQuery('.<?php echo $this->block_uid ?>');

                        let tdTabbedContentItem = new tdTabbedContent.item();
                        // block uid
                        tdTabbedContentItem.uid = uid;
                        // block object
                        tdTabbedContentItem.blockObj = $blockObj;
                        // unique url parameter
                        tdTabbedContentItem.urlParam = '<?php echo $this->get_att('tc_id') ?>';
                        // remember active tab on page refresh
                        <?php if( $remember_tab != '' ) { ?>
                            tdTabbedContentItem._remember_active_tab = true;
                        <?php } ?>

                        tdTabbedContent.addItem(tdTabbedContentItem);

                    });
                </script>
                <?php
                td_js_buffer::add_to_footer( "\n" . td_util::remove_script_tag( ob_get_clean() ) );
            }

        $buffy .= '</div>';

        return $buffy;

    }
}