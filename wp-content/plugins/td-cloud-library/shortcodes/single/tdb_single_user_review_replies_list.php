<?php

class tdb_single_user_review_replies_list extends td_block {

    public function get_custom_css() {
        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $unique_block_class = ((td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax()) ? 'tdc-row .' : '') . $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>
                  
                /* @style_general_tdb_single_user_review_replies_list */
                .tdb_single_user_review_replies_list {
                    transform: translateZ(0);
                    font-family: -apple-system,BlinkMacSystemFont,\"Segoe UI\",Roboto,Oxygen-Sans,Ubuntu,Cantarell,\"Helvetica Neue\",sans-serif;
                    font-size: 14px;
                }
                .tdb_single_user_review_replies_list a:not(.tdb-surrl-review-reply-delete) {
                    color: #0489FC;
                }
                .tdb_single_user_review_replies_list a:not(.tdb-surrl-review-reply-delete):hover {
                    color: #152BF7;
                }
                .tdb_single_user_review_replies_list .tdb-surrl-review-reply {
                    display: flex;
                    align-items: flex-start;
                }
                .tdb_single_user_review_replies_list .tdb-surrl-review-reply:not(:last-child) {
                    margin-bottom: 28px;
                    padding-bottom: 28px;
                    border-bottom: 1px solid #EBEBEB;
                }
                .tdb_single_user_review_replies_list .tdb-surrl-review-reply-left {
                    display: flex;
                    align-items: center;
                    width: 200px;
                }
                .tdb_single_user_review_replies_list .tdb-surrl-review-reply-auth-photo {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin-right: 13px;
                    background-color: rgba(4, 137, 252, 0.1);
                    background-size: cover;
                    background-position: center;
                    width: 38px;
                    height: 38px;
                    padding-bottom: 1px;
                    font-size: 14px;
                    line-height: 1;
                    font-weight: 600;
                    color: #152BF7;
                    border-radius: 100%;
                }
                .tdb_single_user_review_replies_list .tdb-surrl-review-reply-meta {
                    flex: 1;
                }
                .tdb_single_user_review_replies_list .tdb-surrl-review-reply-auth-name {
                    font-size: 1em;
                    font-weight: 600;
                    line-height: 1.3;
                    color: #1D2327;
                }
                .tdb_single_user_review_replies_list .tdb-surrl-review-reply-auth-name a {
                    color: #1D2327;
                }
                .tdb_single_user_review_replies_list .tdb-surrl-review-reply-date {
                    font-size: .857em;
                    line-height: 1.4;
                    color: #555d66;
                }
                .tdb_single_user_review_replies_list .tdb-surrl-review-reply-right {
                    flex: 1;
                }
                .tdb_single_user_review_replies_list .tdb-surrl-review-reply-content {
                    font-size: 1em;
                    line-height: 1.6;
                    color: #555D66;
                }
                .tdb_single_user_review_replies_list .tdb-surrl-review-reply-options {
                    margin-top: 12px;
                    font-size: .786em;
                    line-height: 1.2;
                }
                .tdb_single_user_review_replies_list .tdb-surrl-review-reply-options a:not(:last-child) {
                    margin-right: 7px;
                }
                .tdb_single_user_review_replies_list .tdb-surrl-review-reply-options .tdb-surrl-review-reply-delete {
                    color: #FF6161;
                }
                .tdb_single_user_review_replies_list .tdb-surrl-review-reply-options .tdb-surrl-review-reply-delete:hover {
                    color: #ff0000;
                }
                
                /* @style_general_tdb_single_user_review_replies_list_composer */
                .tdb_single_user_review_replies_list .tdb-block-inner {
                    pointer-events: none;
                }
                
                
                /* @notif_radius */
                body .$unique_block_class .tdb-s-notif {
                    border-radius: @notif_radius;
                }
                
                
                /* @accent_color */
                body .$unique_block_class a:not(.tdb-surrl-review-reply-delete):not(.tdb-surrl-review-reply-auth-name-link),      
                body .$unique_block_class:not(.tdb-surrl-review-reply-auth-name),
                body .$unique_block_class .tdb-surrl-review-reply-auth-photo {
                    color: @accent_color;
                }
                /* @author_bg */
                body .$unique_block_class .tdb-surrl-review-reply-auth-photo {
                    background-color: @author_bg;
                }
                
                /* @header_color */
                body .$unique_block_class .tdb-spsh-title {
                    color: @header_color;
                }
                
                /* @all_rev_sep_color */
                body .$unique_block_class .tdb-surrl-review-reply:not(:last-child) {
                    border-color: @all_rev_sep_color;
                }
                
                /* @auth_color */
				body .$unique_block_class .tdb-surrl-review-reply-auth-name a {
					color: @auth_color;
				}
				/* @auth_color_h */
				body .$unique_block_class .tdb-surrl-review-reply-auth-name a:hover {
					color: @auth_color_h;
				}
                /* @date_color */
                body .$unique_block_class .tdb-surrl-review-reply-date {
                    color: @date_color;
                }
                /* @content_color */
                body .$unique_block_class .tdb-surrl-review-reply-content {
                    color: @content_color;
                }
                /* @del_color */
                body .$unique_block_class .tdb-surrl-review-reply-delete {
                    color: @del_color;
                }
                
                /* @display_direction */
                body .$unique_block_class .tdb-surrl-review-reply {
                    flex-direction: @display_direction;
                }
                /* @sections_gap */
                body .$unique_block_class .tdb-surrl-review-reply {
                    gap: @sections_gap;
                }
                
                /* @notif_color */
                body .$unique_block_class .tdb-s-notif-info {
                    color: @notif_color;
                }
                /* @notif_bg */
                body .$unique_block_class .tdb-s-notif-info {
                    background-color: @notif_bg;
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
        $res_ctx->load_settings_raw( 'style_general_tdb_single_user_review_replies_list', 1 );
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $res_ctx->load_settings_raw( 'style_general_tdb_single_user_review_replies_list_composer', 1 );
        }



        /*-- LAYOUT -- */
        // notification radius
        $notif_radius = $res_ctx->get_shortcode_att('notif_radius');
        $res_ctx->load_settings_raw('notif_radius', $notif_radius);
        if( $notif_radius != '' && is_numeric( $notif_radius ) ) {
            $res_ctx->load_settings_raw('notif_radius', $notif_radius . 'px');
        }



        /*-- COLORS -- */
        $accent_color = $res_ctx->get_shortcode_att('accent_color');
        $res_ctx->load_settings_raw( 'accent_color', $accent_color );
        if( !empty( $accent_color ) ) {
            $res_ctx->load_settings_raw('author_bg', td_util::hex2rgba($accent_color, 0.1));
        }

        $res_ctx->load_settings_raw('header_color', $res_ctx->get_shortcode_att('header_color'));

        $res_ctx->load_settings_raw('all_rev_sep_color', $res_ctx->get_shortcode_att('all_rev_sep_color'));

        $res_ctx->load_settings_raw('auth_color', $res_ctx->get_shortcode_att('auth_color'));
        $res_ctx->load_settings_raw('auth_color_h', $res_ctx->get_shortcode_att('auth_color_h') );
        $res_ctx->load_settings_raw('date_color', $res_ctx->get_shortcode_att('date_color'));
        $res_ctx->load_settings_raw('content_color', $res_ctx->get_shortcode_att('content_color'));
        $res_ctx->load_settings_raw('del_color', $res_ctx->get_shortcode_att('del_color'));

        $res_ctx->load_settings_raw('display_direction', $res_ctx->get_shortcode_att('display_direction'));

        $sections_gap = $res_ctx->get_shortcode_att('sections_gap');
        $res_ctx->load_settings_raw('sections_gap', $sections_gap);
        if( $sections_gap != '' && is_numeric( $sections_gap ) ) {
            $res_ctx->load_settings_raw('sections_gap', $sections_gap . 'px');
        }

        $notif_color = $res_ctx->get_shortcode_att('notif_color');
        $res_ctx->load_settings_raw( 'notif_color', $notif_color );
        if( !empty( $notif_color ) ) {
            $res_ctx->load_settings_raw('notif_bg', td_util::hex2rgba($notif_color, 0.08));
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


    function render( $atts, $content = null ) {

        parent::render( $atts ); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query)


        $review_replies_list_dummy = array(
            array(
                'id' => 0,
                'author_id' => 1,
                'author_name' => 'John Doe',
                'author_email' => 'johndoe@example.com',
                'author_photo' => '',
                'date' => date( get_option( 'date_format' ), time() ),
                'content' => 'Donec magna dui, ullamcorper eget blandit id, luctus sit amet ipsum. Duis convallis placerat eros, sed dictum sem facilisis ac.',
            ),
            array(
                'id' => 1,
                'author_id' => 1,
                'author_name' => 'Christopher Main',
                'author_email' => 'christopher@example.com',
                'author_photo' => '',
                'date' => date( get_option( 'date_format' ), time() ),
                'content' => 'Donec magna dui, ullamcorper eget blandit id, luctus sit amet ipsum. Duis convallis placerat eros, sed dictum sem facilisis ac.',
            ),
            array(
                'id' => 2,
                'author_id' => 1,
                'author_name' => 'Jane Smith',
                'author_email' => 'jane@example.com',
                'author_photo' => '',
                'date' => date( get_option( 'date_format' ), time() ),
                'content' => 'Donec magna dui, ullamcorper eget blandit id, luctus sit amet ipsum. Duis convallis placerat eros, sed dictum sem facilisis ac.',
            ),
        );


        $post_id = '';
        $review_replies_list = array();
        $review_replies_count = 0;

        $curr_template_type = tdb_state_template::get_template_type();
        if( $curr_template_type == 'cpt' ) {
            global $tdb_state_single;
            $post_id = $tdb_state_single->post_id->__invoke();

            if( get_post_type($post_id) == 'tdc-review' ) {

                $review_replies_list = $tdb_state_single->post_user_reviews_replies->__invoke();

                if( !empty( $review_replies_list ) ) {
                    $review_replies_count = count( $review_replies_list );
                }
            } else {
                $review_replies_list = $review_replies_list_dummy;

                $review_replies_count = 3;
            }
        } else {
            $review_replies_list = $review_replies_list_dummy;

            $review_replies_count = 3;
        }


        // Currently logged in user
        $current_user = wp_get_current_user();
        $current_user_id = $current_user->ID;
        $is_current_user_admin = in_array('administrator', $current_user->roles);


        // Header
        $header_text = ( $this->get_att('header_txt') != '' ? $this->get_att('header_txt') : 'Replies' ) . ' (<span class="tdb-surrl-count">' . $review_replies_count . '</span>)';
        $header_tag = $this->get_att('header_tag') != '' ? $this->get_att('header_tag') : 'h2';


        // Notification text
        $notif_txt = rawurldecode( base64_decode( strip_tags( $this->get_att('notif_txt') ) ) );
        if( $notif_txt == '' ) {
            $notif_txt = 'This review doesn\'t have any replies yet.';
        }


        $buffy = ''; //output buffer

        $buffy .= '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';

            //get the block css
            $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();


            $buffy .= '<div class="tdb-block-inner td-fix-index">';
                $buffy .= '<div class="tdb-s-page-sec-header">';
                    $buffy .= '<' . $header_tag . ' class="tdb-spsh-title">' . $header_text . '</' . $header_tag . '>';
                $buffy .= '</div>';

                if( empty( $review_replies_list ) ) {
                    $buffy .= '<div class="tdb-s-notif tdb-s-notif-info"><div class="tdb-s-notif-descr">' . $notif_txt . '</div></div>';
                } else {
                    $buffy .= '<div class="tdb-surrl-review-reply-replies">';
                        foreach ( $review_replies_list as $review_reply ) {
                            $review_reply_author_photo_style = '';
                            $review_reply_author_photo_initials = '';
                            if( $review_reply['author_photo'] != '' ) {
                                $review_reply_author_photo_style = 'style="background-image:url(' . $review_reply['author_photo'] . ')"';
                            } else {
                                $review_reply_author_name_array = explode(' ', $review_reply['author_name']);

                                for( $i = 0; $i < count($review_reply_author_name_array); $i++ ) {
                                    if( $i < 2 ) {
                                        $review_reply_author_photo_initials .= substr($review_reply_author_name_array[$i], 0, 1);
                                    }
                                }
                            }

                            $buffy .= '<div class="tdb-surrl-review-reply tdb-s-content" data-review-reply-id="' . $review_reply['id'] . '">';
                                $buffy .= '<div class="tdb-surrl-review-reply-left">';
                                    $buffy .= '<div class="tdb-surrl-review-reply-auth-photo" ' . $review_reply_author_photo_style . '>' . $review_reply_author_photo_initials . '</div>';

                                    $buffy .= '<div class="tdb-surrl-review-reply-meta">';
                                        if ( $review_reply['author_id'] != 0 ) {
                                            $buffy .= '<div class="tdb-surrl-review-reply-auth-name"><a href="' . get_author_posts_url($review_reply['author_id']) . ' " class="tdb-surrl-review-reply-auth-name-link">' . $review_reply['author_name'] . '</a></div>';
                                        } else {
                                            $buffy .= '<div class="tdb-surrl-review-reply-auth-name">' . $review_reply['author_name'] . '</div>';
                                        }
                                        $buffy .= '<div class="tdb-surrl-review-reply-date">' . $review_reply['date'] . '</div>';
                                    $buffy .= '</div>';
                                $buffy .= '</div>';

                                $buffy .= '<div class="tdb-surrl-review-reply-right">';
                                    $buffy .= '<div class="tdb-surrl-review-reply-content">' . $review_reply['content'] . '</div>';

                                    if( $current_user_id != 0 &&
                                        (
                                            $is_current_user_admin ||
                                            $current_user_id == $review_reply['author_id'] ||
                                            $current_user_id == get_post_field( 'post_author', $post_id )
                                        )
                                    ) {
                                        $buffy .= '<div class="tdb-surrl-review-reply-options">';
                                            $buffy .= '<a class="tdb-surrl-review-reply-delete" href="#">Delete</a>';
                                        $buffy .= '</div>';
                                    }
                                $buffy .= '</div>';
                            $buffy .= '</div>';
                        }
                    $buffy .= '</div>';
                }
            $buffy .= '</div>';


        $buffy .= '</div>';


        if( !( tdc_state::is_live_editor_iframe() || tdc_state::is_live_editor_ajax() ) ) {
            ob_start();
            ?>
            <script>
                /* global jQuery:{} */
                jQuery().ready(function () {

                    let $blockObj = jQuery('.<?php echo $this->block_uid ?>'),
                        $deleteReplyBtn = $blockObj.find('.tdb-surrl-review-reply-delete'),
                        reviewRepliesCount = $blockObj.find('.tdb-surrl-count');


                    $deleteReplyBtn.on('click', function (e) {

                        e.preventDefault();


                        let $this = jQuery(this),
                            $reviewReplyWrapp = $this.closest('.tdb-surrl-review-reply'),
                            reviewReplyID = $reviewReplyWrapp.data('review-reply-id');


                        // Set the disabled state for the review reply wrapper
                        $reviewReplyWrapp.addClass('tdb-s-content-disabled');


                        // Remove the review reply from the database and the page
                        jQuery.ajax({
                            type: 'POST',
                            url: td_ajax_url,
                            data: {
                                action: 'tdb_review_reply_on_delete',
                                reviewID: '<?php echo $post_id ?>',
                                reviewReplyID: reviewReplyID,
                            },
                            success: function (data) {
                                let response = jQuery.parseJSON(data);

                                if( response.success ) {
                                    setTimeout(function () {
                                        // Remove the review reply from the page
                                        $reviewReplyWrapp.remove();

                                        // Remove the review replies wrapper if it's empty
                                        let $reviewRepliesWrapp = $blockObj.find('.tdb-surrl-review-reply-replies');
                                        if( !$reviewRepliesWrapp.find('.tdb-surrl-review-reply').length ) {
                                            $reviewRepliesWrapp.replaceWith("<div class='tdb-s-notif tdb-s-notif-info'><div class='tdb-s-notif-descr'><?php echo $notif_txt ?></div></div>");
                                        }

                                        // Update the replies counter
                                        reviewRepliesCount.text(parseInt(reviewRepliesCount.text()) - 1);
                                    }, 200);
                                }
                            }
                        });

                    });

                });
            </script>
            <?php
            td_js_buffer::add_to_footer( "\n" . td_util::remove_script_tag( ob_get_clean() ) );
        }


        return $buffy;

    }

}