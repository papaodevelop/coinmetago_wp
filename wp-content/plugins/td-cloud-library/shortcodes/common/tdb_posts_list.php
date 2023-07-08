<?php

/**
 * Class tdb_location_finder
 */

class tdb_posts_list extends td_block {

    public function get_custom_css() {
        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $in_composer = td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax();
        $in_element = td_global::get_in_element();
        $unique_block_class_prefix = '';
        if( $in_element || $in_composer ) {
            $unique_block_class_prefix = 'tdc-row';

            if( $in_element && $in_composer ) {
                $unique_block_class_prefix = 'tdc-row-composer';
            }
        }
        $general_block_class = $unique_block_class_prefix ? '.' . $unique_block_class_prefix : '';
        $unique_block_class = ( $unique_block_class_prefix ? $unique_block_class_prefix . ' .' : '' ) . ( $in_composer ? 'tdc-column .' : '' ) . $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>

                /* @style_general_tdb_posts_list */
                .tdb_posts_list {
                    transform: translateZ(0);
                    font-family: -apple-system,BlinkMacSystemFont,\"Segoe UI\",Roboto,Oxygen-Sans,Ubuntu,Cantarell,\"Helvetica Neue\",sans-serif;
                    font-size: 14px;
                }
                .tdb_posts_list .tdb-plist-trashed,
                .tdb_posts_list .tdb-plist-status {
                    margin-bottom: 40px;
                }
                .tdb_posts_list .tdb-plst-add {
                    margin-top: 40px;
                }
                .tdb_posts_list .tdb-plist-title-status {
                    font-size: 0.846em;
                    opacity: .6;
                }
                .tdb_posts_list .tdb-plist-rating {
                    display: flex;
                    align-items: center;
                }
                .tdb_posts_list .tdb-plist-stars {
                    display: flex;
                    align-items: center;
                }
                .tdb_posts_list .tdb-plist-star:not(:last-child) {
                    margin-right: .143em;
                }
                .tdb_posts_list .tdb-plist-star {
                    font-size: 1em;
                    color: #b5b5b5;
                }
                .tdb_posts_list .tdb-plist-star svg {
                    display: block;
                    width: 1em;
                    height: auto;
                    fill: #C1BFBF;
                }
                .tdb_posts_list .tdb-plist-star-full,
                .tdb_posts_list .tdb-plist-star-half {
                    color: #ee8302;
                }
                .tdb_posts_list .tdb-plist-star-full svg,
                .tdb_posts_list .tdb-plist-star-half svg {
                    fill: #ee8302;
                }
                .tdb_posts_list .tdb-pl-img {
                    width: 60px;
                    height: 40px;
                    background-size: cover;
                    background-position: center;
                    background-color: #F5F5F5;
                }
                @media (max-width: 1018px) {
                    .tdb_posts_list .tdb-pl-img {
                        align-self: flex-end;
                    }
                }
                @media (min-width: 1019px) {
                    .tdb_posts_list .tdb-s-table-col-options {
                        width: 7%;
                    }
                }
                
                /* @style_general_tdb_posts_list_composer */
                .tdb_posts_list a.tdb-s-tol-item {
                    pointer-events: none;
                }
                
                
                /* @img_width */
                body .$unique_block_class .tdb-pl-img {
                    width: @img_width;
                }
                /* @img_height */
                body .$unique_block_class .tdb-pl-img {
                    height: @img_height;
                }
                
                /* @opt_radius */
                body .$unique_block_class .tdb-s-table-options-list {
                    border-radius: @opt_radius;
                }
                
                /* @btn_radius */
                body .$unique_block_class .tdb-s-btn {
                    border-radius: @btn_radius;
                }
                
                /* @notif_radius */
                body .$unique_block_class .tdb-s-notif {
                    border-radius: @notif_radius;
                }
                
                /* @accent_color */
                body .$unique_block_class a:not(.tdb-s-btn):not(.tdb-s-tol-item):not(.tdb-s-pagination-item) {
                    color: @accent_color;
                }
                body .$unique_block_class .tdb-s-btn,
                body .$unique_block_class .tdb-s-pagination-item.tdb-s-pagination-active {
                    background-color: @accent_color;
                }
                
                /* @tabl_border_color */
                body .$unique_block_class .tdb-s-table-header, 
                body .$unique_block_class .tdb-s-table-row:not(:last-child) {
                    border-bottom-color: @tabl_border_color;
                }
                /* @tabl_head_color */
                body .$unique_block_class .tdb-s-table-header {
                    color: @tabl_head_color;
                }
                /* @tabl_body_color */
                body .$unique_block_class .tdb-s-table-body {
                    color: @tabl_body_color;
                }
                /* @tabl_hover_bg */
                body .$unique_block_class .tdb-s-table-body .tdb-s-table-row:hover {
                    background-color: @tabl_hover_bg;
                }
                
                /* @empty_color */
                body .$unique_block_class .tdb-plist-star-empty {
                    color: @empty_color;
                }
                body .$unique_block_class .tdb-plist-star-empty svg {
                    fill: @empty_color;
                }
                /* @full_color */
                body .$unique_block_class .tdb-plist-star-full,
                body .$unique_block_class .tdb-plist-star-half {
                    color: @full_color;
                }
                body .$unique_block_class .tdb-plist-star-full svg,
                body .$unique_block_class .tdb-plist-star-half svg {
                    fill: @full_color;
                }
                
                /* @opt_bg */
                body .$unique_block_class .tdb-s-table-options-list {
                    background-color: @opt_bg;
                }
                /* @opt_shadow */
                body .$unique_block_class .tdb-s-table-options-list {
                    box-shadow: @opt_shadow;
                }
                /* @opt_border_color */
                body .$unique_block_class .tdb-s-tol-sep {
                    background-color: @opt_border_color;
                }
                /* @opt_item_color */
                body .$unique_block_class .tdb-s-table-col-options .tdb-s-tol-item:not(.tdb-s-tol-item-red) {
                    color: @opt_item_color;
                }
                /* @opt_item_color_h */
                body .$unique_block_class .tdb-s-table-col-options .tdb-s-tol-item:not(.tdb-s-tol-item-red):hover {
                    color: @opt_item_color_h;
                }
                /* @opt_del_color */
                body .$unique_block_class .tdb-s-table-col-options .tdb-s-tol-item-red {
                    color: @opt_del_color;
                }
                /* @opt_del_color_h */
                body .$unique_block_class .tdb-s-table-col-options .tdb-s-tol-item-red:hover {
                    color: @opt_del_color_h;
                }
                /* @pag_bg */
                body .$unique_block_class .tdb-s-pagination-item:not(.tdb-s-pagination-active) {
                    background-color: @pag_bg;
                }
                /* @pag_bg_h */
                body .$unique_block_class .tdb-s-pagination-item:hover:not(.tdb-s-pagination-dots):not(.tdb-s-pagination-active) {
                    background-color: @pag_bg_h;
                }
                /* @pag_color */
                body .$unique_block_class .tdb-s-pagination-item:not(.tdb-s-pagination-active) {
                    color: @pag_color;
                }
                /* @pag_color_h */
                body .$unique_block_class .tdb-s-pagination-item:hover:not(.tdb-s-pagination-dots):not(.tdb-s-pagination-active) {
                    color: @pag_color_h;
                }
                /* @pag_color_a */
                body .$unique_block_class .tdb-s-pagination-item.tdb-s-pagination-active {
                    color: @pag_color_h;
                }
                
                /* @btn_color */
                body .$unique_block_class .tdb-s-btn {
                    color: @btn_color;
                }
                /* @btn_color_h */
                body .$unique_block_class .tdb-s-btn:hover {
                    color: @btn_color_h;
                }
                /* @btn_bg_h */
                body .$unique_block_class .tdb-s-btn:hover {
                    background-color: @btn_bg_h;
                }
                
                /* @notif_info_color */
                body .$unique_block_class .tdb-s-notif-info {
                    color: @notif_info_color;
                }
                /* @notif_info_bg */
                body .$unique_block_class .tdb-s-notif-info {
                    background-color: @notif_info_bg;
                }
                /* @notif_succ_color */
                body .$unique_block_class .tdb-s-notif-success {
                    color: @notif_succ_color;
                }
                /* @notif_succ_bg */
                body .$unique_block_class .tdb-s-notif-success {
                    background-color: @notif_succ_bg;
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
        $res_ctx->load_settings_raw( 'style_general_tdb_posts_list', 1 );
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $res_ctx->load_settings_raw( 'style_general_tdb_posts_list_composer', 1 );
        }



        /*-- LAYOUT -- */
        // images width
        $img_width = $res_ctx->get_shortcode_att('img_width');
        if( $img_width != '' && is_numeric( $img_width ) ) {
            $res_ctx->load_settings_raw( 'img_width', $img_width . 'px' );
        }
        // images height
        $img_height = $res_ctx->get_shortcode_att('img_height');
        if( $img_height != '' && is_numeric( $img_height ) ) {
            $res_ctx->load_settings_raw( 'img_height', $img_height . 'px' );
        }


        // table options border radius
        $opt_radius = $res_ctx->get_shortcode_att('opt_radius');
        $res_ctx->load_settings_raw( 'opt_radius', $opt_radius );
        if( $opt_radius != '' && is_numeric( $opt_radius ) ) {
            $res_ctx->load_settings_raw( 'opt_radius', $opt_radius . 'px' );
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
            $res_ctx->load_settings_raw('input_outline_accent_color', td_util::hex2rgba($accent_color, 0.1));
        }

        $res_ctx->load_settings_raw( 'tabl_border_color', $res_ctx->get_shortcode_att('tabl_border_color') );
        $res_ctx->load_settings_raw( 'tabl_head_color', $res_ctx->get_shortcode_att('tabl_head_color') );
        $res_ctx->load_settings_raw( 'tabl_body_color', $res_ctx->get_shortcode_att('tabl_body_color') );
        $res_ctx->load_settings_raw( 'tabl_hover_bg', $res_ctx->get_shortcode_att('tabl_hover_bg') );

        $res_ctx->load_settings_raw('full_color', $res_ctx->get_shortcode_att('full_color'));
        $res_ctx->load_settings_raw('empty_color', $res_ctx->get_shortcode_att('empty_color'));

        $res_ctx->load_settings_raw( 'opt_bg', $res_ctx->get_shortcode_att('opt_bg') );
        $res_ctx->load_shadow_settings( 4, 0, 0, 0, 'rgba(0, 0, 0, 0.12)', 'opt_shadow' );
        $res_ctx->load_settings_raw( 'opt_border_color', $res_ctx->get_shortcode_att('opt_border_color') );
        $res_ctx->load_settings_raw( 'opt_item_color', $res_ctx->get_shortcode_att('opt_item_color') );
        $res_ctx->load_settings_raw( 'opt_item_color_h', $res_ctx->get_shortcode_att('opt_item_color_h') );
        $res_ctx->load_settings_raw( 'opt_del_color', $res_ctx->get_shortcode_att('opt_del_color') );
        $res_ctx->load_settings_raw( 'opt_del_color_h', $res_ctx->get_shortcode_att('opt_del_color_h') );
        $res_ctx->load_settings_raw( 'pag_bg', $res_ctx->get_shortcode_att('pag_bg') );
        $res_ctx->load_settings_raw( 'pag_bg_h', $res_ctx->get_shortcode_att('pag_bg_h') );
        $res_ctx->load_settings_raw( 'pag_color', $res_ctx->get_shortcode_att('pag_color') );
        $res_ctx->load_settings_raw( 'pag_color_h', $res_ctx->get_shortcode_att('pag_color_h') );
        $res_ctx->load_settings_raw( 'pag_color_a', $res_ctx->get_shortcode_att('pag_color_a') );

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



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_text' );

    }

    /**
     * Disable loop block features. This block does not use a loop and it doesn't need to run a query.
     */
    function __construct() {
        parent::disable_loop_block_features();
    }

    function check_custom_column() {

    }
    function render( $atts, $content = null ) {
        parent::render( $atts ); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query)


        $buffy = ''; //output buffer

        if( !is_user_logged_in() && !(td_util::tdc_is_live_editor_ajax() || td_util::tdc_is_live_editor_iframe()) ) {
            return $buffy;
        }


        // flag to check if we are in composer
        $is_composer = false;
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $is_composer = true;
        }


        // what to show in composer
        $show_in_composer = $this->get_att('show_version');


        // post type
        $post_type = $this->get_att('post_type');
        $post_type = $post_type != '' ? $post_type : 'post';


        // currently logged in user
        $current_user = wp_get_current_user();
        $is_current_user_admin = in_array('administrator', $current_user->roles);


        // get the posts for the currently logged in user
        $allowed_post_statuses = array('publish', 'draft', 'private', 'pending');

        $args = array(
            'post_type' => $post_type,
            'post_status' => $allowed_post_statuses,
            'numberposts' => -1
        );

        $show_all_posts_for_admins = $this->get_att('all_posts');
        if( !$is_current_user_admin || $show_all_posts_for_admins == '' ) {
            $args['author'] = $current_user->ID;
        }

        $current_user_initial_posts = get_posts($args);
        $current_user_posts = array();

        $linked_post_type = $this->get_att('linked_post_type');
        if( $linked_post_type != '' && post_type_exists($linked_post_type) ) {
            foreach ( $current_user_initial_posts as $current_user_initial_post ) {
                $post_linked_posts = get_post_meta($current_user_initial_post->ID, 'tdc-post-linked-posts', true);

                if( !empty( $post_linked_posts ) ) {
                    if( isset( $post_linked_posts[$linked_post_type] ) ) {
                        foreach ( $post_linked_posts[$linked_post_type] as $post_linked_post_id ) {
                            $post_linked_post = get_post($post_linked_post_id);

                            if( !is_null( $post_linked_post ) ) {
                                if( in_array( $post_linked_post->post_status, $allowed_post_statuses ) ) {
                                    $current_user_posts[] = $post_linked_post;
                                }
                            }
                        }
                    }
                }
            }
        } else {
            $current_user_posts = $current_user_initial_posts;
        }


        // build the posts array
        $posts = array();
        if( !empty( $current_user_posts ) ) {
            foreach ( $current_user_posts as $current_user_post ) {
                $post = array(
                    'ID' => $current_user_post->ID,
                    'title' => $current_user_post->post_title,
                    'author' => get_the_author_meta('display_name', $current_user_post->post_author),
                    'publish_date' => get_the_time(get_option('date_format'), $current_user_post->ID),
                );

                if( $current_user_post->post_status == 'publish' ) {
                    $post['status'] = 'Published';
                } else {
                    $post['status'] = ucfirst($current_user_post->post_status);
                }

                $posts[] = $post;
            }
        }


        // pagination settings
        $enable_pag = $this->get_att('enable_pag');

        $num_pages = 3;
        $per_page = -1;
        $current_page = 1;

        if( $enable_pag != '' ) {
            $per_page = 15;
            if( $this->get_att('per_page') ) {
                $per_page = $this->get_att('per_page');
            }

            if( isset( $_GET['tdb_posts_list_page'] ) ) {
                $current_page = $_GET['tdb_posts_list_page'];
            }
        }


        // if the current user does not have any posts, but we
        // are in composer, create a dummy posts array
        if( !empty( $posts ) ) {
            if( $per_page != -1 ) {
                $posts_count = count($posts);
                $num_pages = ceil($posts_count / $per_page);

                $offset = ( $current_page - 1 ) * $per_page;

                $posts = array_slice($posts, $offset, $per_page);
            }
        } else {
            if( $is_composer ) {
                for ( $i = 1; $i < 6; $i++ ) {
                    $posts[] = array(
                        'ID' => $i,
                        'title' => 'Sample post ' . $i,
                        'author' => 'John Doe',
                        'publish_date' =>  date( get_option( 'date_format' ), time() ),
                        'status' => 'Published',
                    );
                }
            }
        }


        // columns to display
        $columns_to_display = $this->get_att( 'display_columns' );
        if( $columns_to_display != '' ) {
            $columns_to_display = explode( "\n", rawurldecode( base64_decode( strip_tags( $columns_to_display ) ) ) );
        } else {
            $columns_to_display = array();
        }
        $columns_to_display = array_map('trim', $columns_to_display);
        $columns_to_display = array_filter($columns_to_display, function($value) { return !is_null($value) && $value !== ''; });
        $predefined_columns = array('id', 'overall_rating', 'title', 'featured_image', 'date', 'author', 'source_title');

        $custom_columns = array_diff($columns_to_display, $predefined_columns);


        // forms
        $main_form_url = $this->get_att('form_1');
        $main_form_add_txt = $this->get_att('form_1_txt_a') != '' ? $this->get_att('form_1_txt_a') : __td( 'Add new post', TD_THEME_NAME );
        $main_form_edit_txt = $this->get_att('form_1_txt_e') != '' ? $this->get_att('form_1_txt_e') : __td( 'Edit post', TD_THEME_NAME );

        $extra_form_1_url = $this->get_att('form_2');
        $extra_form_1_edit_txt = $this->get_att('form_2_txt_e') != '' ? $this->get_att('form_2_txt_e') : 'Edit post 2';

        $extra_form_2_url = $this->get_att('form_3');
        $extra_form_2_edit_txt = $this->get_att('form_3_txt_e') != '' ? $this->get_att('form_3_txt_e') : 'Edit post 3';


        // plans add limits
        $add_limit_def = $this->get_att('limit_def');
        $add_new_posts_limit = $add_limit_def != '' ? $add_limit_def : -1;

        if( defined( 'TD_SUBSCRIPTION' ) && $add_new_posts_limit > -1 ) {
            for ($i = 0; $i < 5; $i++) {
                $plan_ids = explode(',', $this->get_att('limit_plans_' . $i . '_id'));
                $plan_limit = $this->get_att('limit_plans_' . $i . '_limit') != '' ? $this->get_att('limit_plans_' . $i . '_limit') : -1;

                foreach ( $plan_ids as $plan_id ) {
                    if( tds_util::is_user_subscribed_to_plan( $current_user->ID, $plan_id ) ) {
                        $add_new_posts_limit = $plan_limit == -1 ? $plan_limit : max($add_new_posts_limit, $plan_limit);
                    }
                }
            }
        }


        // Rating stars
        $full_star_icon = $this->get_icon_att( 'tdicon_full' );
        $full_star_icon_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $full_star_icon_data = 'data-td-svg-icon="' . $this->get_att( 'tdicon_full' ) . '"';
        }
        $full_star_icon_html = '';
        if ( !empty( $full_star_icon ) ) {
            if( base64_encode( base64_decode( $full_star_icon ) ) == $full_star_icon ) {
                $full_star_icon_html = base64_decode( $full_star_icon ) ;
            } else {
                $full_star_icon_html = '<i class="' . $full_star_icon . '"></i>';
            }
        }

        $half_star_icon = $this->get_icon_att( 'tdicon_half' );
        $half_star_icon_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $half_star_icon_data = 'data-td-svg-icon="' . $this->get_att( 'tdicon_half' ) . '"';
        }
        $half_star_icon_html = '';
        if ( !empty( $half_star_icon ) ) {
            if( base64_encode( base64_decode( $half_star_icon ) ) == $half_star_icon ) {
                $half_star_icon_html = base64_decode( $half_star_icon ) ;
            } else {
                $half_star_icon_html = '<i class="' . $half_star_icon . '"></i>';
            }
        }

        $empty_star_icon = $this->get_icon_att( 'tdicon_empty' );
        $empty_star_icon_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $empty_star_icon_data = 'data-td-svg-icon="' . $this->get_att( 'tdicon_empty' ) . '"';
        }
        $empty_star_icon_html = '';
        if ( !empty( $empty_star_icon ) ) {
            if( base64_encode( base64_decode( $empty_star_icon ) ) == $empty_star_icon ) {
                $empty_star_icon_html = base64_decode( $empty_star_icon ) ;
            } else {
                $empty_star_icon_html = '<i class="' . $empty_star_icon . '"></i>';
            }
        }


        // Limit reached notification
        $limit_notif = rawurldecode( base64_decode( strip_tags( $this->get_att('limit_notif') ) ) );


        // show notifications in composer
        $show_notif_in_composer = $this->get_att('show_notif');


        $buffy .= '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';

            //get the block css
            $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();


            $buffy .= '<div class="tdb-block-inner td-fix-index">';
                if( empty( $posts ) || ( $is_composer && $show_in_composer == 'no_posts' ) ) {
                    $buffy .= '<div class="tdb-s-notif tdb-s-notif-info"><div class="tdb-s-notif-descr">' . __td( 'You have not created any posts.', TD_THEME_NAME ) . '</div></div>';
                } else {
                    if( empty( $columns_to_display ) ) {
                        $buffy .= td_util::get_block_error('Posts List', 'You have not selected any <strong>columns</strong> to display.' );
                    } else {
                        if( isset($_GET['trashed']) || ( $show_notif_in_composer && $is_composer ) ) {
                            $buffy .= '<div class="tdb-s-notif tdb-s-notif-sm tdb-s-notif-success tdb-plist-trashed"><div class="tdb-s-notif-descr">' . __td( 'The selected post has been successfully deleted.', TD_THEME_NAME ) . '</div></div>';
                        }

                        $buffy .= '<table class="tdb-s-table tdb-s-content">';
                            $buffy .= '<thead class="tdb-s-table-header">';
                                $buffy .= '<tr class="tdb-s-table-row tdb-s-table-row-h">';
                                    // Predefined columns headings
                                    foreach ( $columns_to_display as $column ) {
                                        switch ( $column ) {
                                            case 'id':
                                                $buffy .= '<th class="tdb-s-table-col">' . __td( 'ID', TD_THEME_NAME ) . '</th>';
                                                break;

                                            case 'overall_rating':
                                                $buffy .= '<th class="tdb-s-table-col">' . __td( 'Rating', TD_THEME_NAME ) . '</th>';
                                                break;

                                            case 'title':
                                                $buffy .= '<th class="tdb-s-table-col">' . __td( 'Title', TD_THEME_NAME ) . '</th>';
                                                break;

                                            case 'featured_image':
                                                $buffy .= '<th class="tdb-s-table-col">' . __td( 'Post image', TD_THEME_NAME ) . '</th>';
                                                break;

                                            case 'date':
                                                $buffy .= '<th class="tdb-s-table-col">' . __td( 'Date', TD_THEME_NAME ) . '</th>';
                                                break;

                                            case 'author':
                                                $buffy .= '<th class="tdb-s-table-col">' . __td( 'Author', TD_THEME_NAME ) . '</th>';
                                                break;

                                            case 'source_title':
                                                $buffy .= '<th class="tdb-s-table-col">' . __td( 'Source title', TD_THEME_NAME ) . '</th>';
                                                break;
                                        }
                                    }

                                    // Custom columns headings
                                    foreach ( $custom_columns as $custom_column ) {
                                        $buffy .= '<th class="tdb-s-table-col">' . $this->display_custom_column_name($custom_column) . '</th>';
                                    }

                                    $buffy .= '<th class="tdb-s-table-col tdb-s-table-col-options"></th>';
                                $buffy .= '</tr>';
                            $buffy .= '</thead>';

                            $buffy .= '<tbody class="tdb-s-table-body">';
                                foreach ($posts as $post) {
                                    $buffy .= '<tr class="tdb-s-table-row" data-post-id="' . $post['ID'] . '">';
                                        // Predefined columns values
                                        foreach ( $columns_to_display as $column ) {
                                            switch ($column) {
                                                case 'id':
                                                    $buffy .= '<td class="tdb-s-table-col">';
                                                        $buffy .= '<div class="tds-s-table-col-label">' . __td( 'ID', TD_THEME_NAME ) . '</div>';
                                                        $buffy .= '#' . $post['ID'];
                                                    $buffy .= '</td>';
                                                    break;

                                                case 'overall_rating':
                                                    $post_type = get_post_type($post['ID']);

                                                    if( $post_type == 'tdc-review' ) {
                                                        $overall_rating = td_util::get_overall_review_rating($post['ID']);
                                                    } else {
                                                        $overall_rating = td_util::get_overall_post_rating($post['ID']);
                                                    }

                                                    $buffy .= '<td class="tdb-s-table-col">';
                                                        $buffy .= '<div class="tds-s-table-col-label">' . __td( 'Rating', TD_THEME_NAME ) . '</div>';
                                                        if( $overall_rating ) {
                                                            $buffy .= $this->display_rating_stars( $overall_rating, $full_star_icon_html, $full_star_icon_data, $half_star_icon_html, $half_star_icon_data, $empty_star_icon_html, $empty_star_icon_data );
                                                        } else {
                                                            $buffy .= __td( 'No rating', TD_THEME_NAME );
                                                        }
                                                    $buffy .= '</td>';
                                                    break;

                                                case 'title':
                                                    $buffy .= '<td class="tdb-s-table-col tdb-s-table-col-title">';
                                                        $buffy .= '<div class="tds-s-table-col-label">' . __td( 'Title', TD_THEME_NAME ) . '</div>';
                                                        $buffy .= $post['title'];
                                                        if( $post['status'] != 'Published' ) {
                                                            $buffy .= '<span class="tdb-plist-title-status"> (' . $post['status'] . ')</span>';
                                                        }
                                                    $buffy .= '</td>';

                                                    break;

                                                case 'featured_image':
                                                    $featured_image = '';

                                                    if ( has_post_thumbnail( $post['ID'] ) ) {
                                                        $post_thumbnail_id = get_post_thumbnail_id( $post['ID'] );

                                                        if ( !empty( $post_thumbnail_id ) ) {
                                                            $featured_image = wp_get_attachment_image_src( $post_thumbnail_id, 'full' )[0];
                                                        }
                                                    }

                                                    $buffy .= '<td class="tdb-s-table-col">';
                                                        $buffy .= '<div class="tds-s-table-col-label">' . __td( 'Post image', TD_THEME_NAME ) . '</div>';
                                                        $buffy .= '<div class="tdb-pl-img" ' . ( $featured_image != '' ? 'style="background-image:url(' . $featured_image . ')"' : '' ) . '></div>';
                                                    $buffy .= '</td>';

                                                    break;

                                                case 'date':
                                                    $buffy .= '<td class="tdb-s-table-col">';
                                                        $buffy .= '<div class="tds-s-table-col-label">' . __td( 'Date', TD_THEME_NAME ) . '</div>';
                                                        $buffy .= $post['publish_date'];
                                                    $buffy .= '</td>';
                                                    break;

                                                case 'author':
                                                    $buffy .= '<td class="tdb-s-table-col">';
                                                        $buffy .= '<div class="tds-s-table-col-label">' . __td( 'Author', TD_THEME_NAME ) . '</div>';
                                                        $buffy .= $post['author'];
                                                    $buffy .= '</td>';
                                                    break;

                                                case 'source_title':
                                                    $source_post_id = get_post_meta($post['ID'], 'tdc-parent-post-id', true);
                                                    $source_post_title = '';
                                                    if ('' !== $source_post_id) {
                                                        $source_post_title = get_the_title($source_post_id);
                                                    }

                                                    $buffy .= '<td class="tdb-s-table-col">';
                                                        $buffy .= '<div class="tds-s-table-col-label">' . __td( 'Source title', TD_THEME_NAME ) . '</div>';
                                                        $buffy .= $source_post_title;
                                                    $buffy .= '</td>';
                                                    break;
                                            }
                                        }

                                        // Custom columns values
                                        foreach ( $custom_columns as $custom_column ) {
                                            $custom_field_data = td_util::get_acf_field_data($custom_column, $post['ID']);
                                            $custom_column_html = '';

                                            if( !$custom_field_data['meta_exists'] ) {
                                                if( metadata_exists('post', $post['ID'], $custom_column) ) {
                                                    $custom_field_data['value'] = get_post_meta($post['ID'], $custom_column, true);
                                                    $custom_field_data['type'] = 'text';
                                                    $custom_field_data['meta_exists'] = true;
                                                }
                                            }

                                            if( !empty( $custom_field_data['value'] ) ) {
                                                //var_dump($custom_field_data);
                                                if( $custom_field_data['type'] == 'image' ) {
                                                    $img_url = '';

                                                    if( is_array( $custom_field_data['value'] ) ) {
                                                        $img_url = $custom_field_data['value']['url'];
                                                    } else if( is_string( $custom_field_data['value'] ) ) {
                                                        $img_url = $custom_field_data['value'];
                                                    } else if ( is_numeric( $custom_field_data['value'] ) ) {
                                                        $img_id = $custom_field_data['value'];
                                                        $img_info = get_post( $img_id );

                                                        if( $img_info ) {
                                                            $img_url = $img_info->guid;
                                                        }
                                                    }

                                                    $custom_column_html = '<div class="tdb-pl-img" ' . ( $img_url != '' ? 'style="background-image:url(' . $img_url . ')"' : '' ) . '></div>';
                                                } else if( $custom_field_data['type'] == 'taxonomy' ) {
                                                    $field_values = $custom_field_data['value'];

                                                    foreach ( $field_values as $key => $field_value ) {
                                                        $term_type = $custom_field_data['taxonomy'];
                                                        $term_data = $field_value;
                                                        if( is_numeric( $field_value ) ) {
                                                            $term_data = get_term_by('term_id', $field_value, $term_type);
                                                        }

                                                        if( $term_data ) {
                                                            $custom_column_html .= $term_data->name;

                                                            if( $key != array_key_last( $field_values ) ) {
                                                                $custom_column_html .= ', ';
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    $field_value = $custom_field_data['value'];

                                                    if( is_array( $field_value ) ) {
                                                        foreach ( $field_value as $key => $value ) {
                                                            if( is_array( $value ) ) {
                                                                $custom_column_html .= $value['label'];
                                                            } else if( td_util::isAssocArray( $field_value ) ) {
                                                                if( $key == 'label' ) {
                                                                    $custom_column_html .= $value;
                                                                }
                                                            } else {
                                                                $custom_column_html .= $value;
                                                            }

                                                            if( $key != array_key_last( $field_value ) ) {
                                                                $custom_column_html .= ', ';
                                                            }
                                                        }
                                                    } else {
                                                        $custom_column_html .= $field_value;
                                                    }
                                                }
                                            }

                                            $buffy .= '<td class="tdb-s-table-col">';
                                                $buffy .= '<div class="tds-s-table-col-label">' . $this->display_custom_column_name($custom_column) . '</div>';
                                                $buffy .= $custom_column_html;
                                            $buffy .= '</td>';
                                        }

                                        $buffy .= '<td class="tdb-s-table-col tdb-s-table-col-options">';
                                            $buffy .= '<svg class="tdb-s-table-options-toggle" xmlns="http://www.w3.org/2000/svg" width="4.001" height="16" viewBox="0 0 4.001 16"><g transform="translate(-1210.999 -335)"><path d="M-10898,14a2,2,0,0,1,2-2,2,2,0,0,1,2,2,2,2,0,0,1-2,2A2,2,0,0,1-10898,14Zm0-6a2,2,0,0,1,2-2,2,2,0,0,1,2,2,2,2,0,0,1-2,2A2,2,0,0,1-10898,8Zm0-6a2,2,0,0,1,2-2,2,2,0,0,1,2,2,2,2,0,0,1-2,2A2,2,0,0,1-10898,2Z" transform="translate(12109 335)"/></g></svg>';

                                            $buffy .= '<div class="tdb-s-table-options-list">';
                                                $buffy .= '<a class="tdb-s-tol-item" href="' . esc_url(get_permalink($post['ID'])) . '" target="blank">' . __td( 'View', TD_THEME_NAME ) . '</a>';

                                                if( $main_form_url != '' || $extra_form_1_url != '' || $extra_form_2_url != '' ) {
                                                    $buffy .= '<div class="tds-s-tol-sep"></div>';

                                                    if( $main_form_url != '' ) {
                                                        $buffy .= '<a class="tdb-s-tol-item" href="' . esc_url(add_query_arg('post_id', $post['ID'], $main_form_url) ) . '">' . $main_form_edit_txt . '</a>';
                                                    }
                                                    if( $extra_form_1_url != '' ) {
                                                        $buffy .= '<a class="tdb-s-tol-item" href="' . esc_url(add_query_arg('post_id', $post['ID'], $extra_form_1_url) ) . '">' . $extra_form_1_edit_txt . '</a>';
                                                    }
                                                    if( $extra_form_2_url != '' ) {
                                                        $buffy .= '<a class="tdb-s-tol-item" href="' . esc_url(add_query_arg('post_id', $post['ID'], $extra_form_2_url) ) . '">' . $extra_form_2_edit_txt . '</a>';
                                                    }
                                                }

                                                if( ( $is_current_user_admin || $this->get_att('allow_publish') != '' ) &&
                                                    ( $post['status'] == 'Pending' || $post['status'] == 'Draft' || $post['status'] == 'Private' )
                                                ) {
                                                    $buffy .= '<div class="tds-s-tol-sep"></div>';
                                                    $buffy .= '<a class="tdb-s-tol-item tdb-plist-publish-post" href="#" data-post-id="' . $post['ID'] . '">' . __td( 'Publish', TD_THEME_NAME ) . '</a>';
                                                }

                                                if( $is_current_user_admin || $this->get_att('allow_delete') != '' ) {
                                                    $buffy .= '<div class="tds-s-tol-sep"></div>';
                                                    $buffy .= '<a class="tdb-s-tol-item tdb-s-tol-item-red" href="' . esc_url(get_delete_post_link($post['ID'])) . '">' . __td( 'Delete', TD_THEME_NAME ) . '</a>';
                                                }
                                            $buffy .= '</div>';
                                        $buffy .= '</td>';
                                    $buffy .= '</tr>';
                                }
                            $buffy .= '</tbody>';
                        $buffy .= '</table>';

                        // Pagination
                        if( $enable_pag != '' ) {
                            $buffy .= tdc_util::get_custom_pagination(
                                $current_page,
                                $num_pages,
                                'tdb_posts_list_page',
                                3,
                                array(
                                    'wrapper' => 'tdb-s-pagination',
                                    'item' => 'tdb-s-pagination-item',
                                    'active' => 'tdb-s-pagination-active',
                                    'dots' => 'tdb-s-pagination-dots'
                                )
                            );
                        }
                    }
                }

                if( $main_form_url != '' ) {
                    if( $is_current_user_admin || $add_new_posts_limit == -1 || ( $add_new_posts_limit > count( $posts ) ) ) {
                        $buffy .= '<a class="tdb-s-btn tdb-plst-add" href="' . esc_url($main_form_url) . '">' . $main_form_add_txt . '</a>';
                    } else {
                        $buffy .= $limit_notif;
                    }
                }
            $buffy .= '</div>';


            if( !( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) ) {
                ob_start();
                ?>
                <script>
                    /* global jQuery:{} */
                    jQuery().ready(function () {

                        let $blockObj = jQuery('.<?php echo $this->block_uid ?>'),
                            $deleteNotif = $blockObj.find('.tdb-plist-trashed');


                        // Remove the trashed notification if it exists
                        if( $deleteNotif.length ) {
                            setTimeout(function () {
                                $deleteNotif.remove();
                            }, 5000);
                        }


                        // Change the status of a post
                        $blockObj.on('click', '.tdb-plist-publish-post', function (e) {

                            e.preventDefault();

                            let $this = jQuery(this),
                                postID = $this.data('post-id'),
                                $table = $blockObj.find('.tdb-s-table');


                            // Place the table in a loading state
                            $table.addClass('tdb-s-content-loading');


                            jQuery.ajax({
                                method: 'POST',
                                url: td_ajax_url,
                                data: {
                                    action: 'tdb_update_post_status',
                                    postID: postID,
                                    newStatus: 'publish',
                                },
                                success: function (data) {
                                    let response = jQuery.parseJSON(data);

                                    // Display the success message if there is any
                                    if( response.success !== '' ) {
                                        $table.before('<div class="tdb-s-notif tdb-s-notif-sm tdb-s-notif-success tdb-plist-status"><div class="tdb-s-notif-descr">' + response.success + '</div></div>');

                                        // Remove the status text from the title
                                        let $currPostRow = $blockObj.find('.tdb-s-table-row[data-post-id="' + postID + '"]');
                                        $currPostRow.find('.tdb-s-table-col-title .tdb-plist-title-status').remove();

                                        // Remove the update status link and separator
                                        $this.prev().remove();
                                        $this.remove();
                                    }

                                    // Display the error messages if there are any
                                    if( response.errors.length ) {
                                        let $errorHTML = '<div class="tdb-s-notif tdb-s-notif-sm tdb-s-notif-error tdb-plist-status">';
                                                $errorHTML += '<ul class="tdb-s-notif-list">';
                                                    jQuery.each(response.errors, function(key, error) {
                                                        $errorHTML += '<li>' + error + '</li>';
                                                    });
                                                $errorHTML += '</ul>';
                                            $errorHTML += '</div>';

                                        $table.before($errorHTML);
                                    }

                                    // Remove the table from the loading state
                                    $table.removeClass('tdb-s-content-loading');

                                    // Remove the notification
                                    let $notif = $blockObj.find('.tdb-plist-status');
                                    if( $notif.length ) {
                                        setTimeout(function () {
                                            $notif.remove();
                                        }, 5000);
                                    }
                                }
                            });

                        });

                    });
                </script>
                <?php
                td_js_buffer::add_to_footer( "\n" . td_util::remove_script_tag( ob_get_clean() ) );
            }

        $buffy .= '</div> <!-- ./block -->';

        return $buffy;
    }


    function display_custom_column_name( $custom_column ) {

        if( class_exists('ACF') ) {
            $acf_field_data = acf_get_raw_field($custom_column);

            if( $acf_field_data ) {
                return $acf_field_data['label'];
            }
        }

        return $custom_column;

    }


    function display_rating_stars( $rating_average, $full_star_icon, $full_star_icon_data, $half_star_icon, $half_star_icon_data, $empty_star_icon, $empty_star_icon_data ) {

        $rating_average_floor = floor($rating_average);
        $rating_average_ceil = ceil($rating_average);

        if( $empty_star_icon == '' ) {
            $empty_star_icon = '<i class="td-icon-user-rev-star-empty"></i>';
        }
        if( $half_star_icon == '' ) {
            $half_star_icon = '<i class="td-icon-user-rev-star-half"></i>';
        }
        if( $full_star_icon == '' ) {
            $full_star_icon = '<i class="td-icon-user-rev-star-full"></i>';
        }

        $buffy = '<div class="tdb-plist-stars">';
            for( $i = 0; $i < $rating_average_floor; $i++ ) {
                $buffy .= '<div class="tdb-plist-star tdb-plist-star-full" ' . $full_star_icon_data . '>' . $full_star_icon . '</div>';
            }
            if( $rating_average_floor != $rating_average ) {
                $buffy .= '<div class="tdb-plist-star tdb-plist-star-half" ' . $half_star_icon_data . '>' . $half_star_icon . '</div>';
            }
            for( $i = 5; $i > $rating_average_ceil; $i-- ) {
                $buffy .= '<div class="tdb-plist-star tdb-plist-star-empty" ' . $empty_star_icon_data . '>' . $empty_star_icon . '</div>';
            }
        $buffy .= '</div>';

        return $buffy;

    }

}