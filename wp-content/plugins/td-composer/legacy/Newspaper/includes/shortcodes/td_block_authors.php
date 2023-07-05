<?php
class td_block_authors extends td_block {

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

        $compiled_css = '';

        $raw_css =
            "<style>
                /* @style_general_authors */
                .td_top_authors {
                    margin-bottom: 64px;
                }
                .td_top_authors img {
                    position: absolute;
                    max-width: 70px;
                    left: 0;
                }
                @media (min-width: 768px) and (max-width: 1018px) {
                    .td_top_authors img {
                        max-width: 55px;
                    }
                }
                .td_top_authors .item-details {
                    margin-left: 85px;
                    position: relative;
                    height: 70px;
                    top: 1px;
                }
                @media (min-width: 768px) and (max-width: 1018px) {
                    .td_top_authors .item-details {
                        height: 55px;
                        margin-left: 70px;
                    }
                }
                .td_top_authors .item-details span {
                    font-family: 'Open Sans', arial, sans-serif;
                    padding: 3px 7px;
                    color: #fff;
                    font-size: 9px;
                    font-style: normal;
                    font-weight: bold;
                    margin-right: 5px;
                }
                .td_top_authors .td-active .td-author-post-count {
                    background-color: #4db2ec;
                }
                .td_top_authors .td-active .td-author-comments-count {
                    background-color: #4db2ec;
                    opacity: 0.8;
                }
                .td_top_authors .td-active .td-authors-name a {
                    color: #4db2ec;
                }
                .td_top_authors .td_mod_wrap {
                    min-height: 70px;
                    padding-top: 9px;
                    padding-bottom: 9px;
                    border: 1px solid #fff;
                }
                .td_top_authors .td_mod_wrap:hover {
                    border: 1px solid #ededed;
                }
                .td_top_authors .td_mod_wrap:hover .td-author-post-count {
                    background-color: #4db2ec;
                }
                .td_top_authors .td_mod_wrap:hover .td-author-comments-count {
                    background-color: #4db2ec;
                    opacity: 0.8;
                }
                .td_top_authors .td_mod_wrap:hover .td-authors-name a {
                    color: #4db2ec;
                }
                .td_top_authors .block-title {
                    margin-bottom: 16px;
                }
                .td_top_authors .td-authors-url {
                    display: table;
                    position: relative;
                    top: -2px;
                    white-space: nowrap;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    color: #999;
                }
                .td_top_authors .td-authors-url a {
                    color: #999;
                    font-family: Verdana, Geneva, sans-serif;
                    font-size: 11px;
                    font-style: italic;
                }
                @media (min-width: 768px) and (max-width: 1018px) {
                    .td_top_authors .td-authors-url {
                        display: none;
                    }
                }
                .td_top_authors .td-authors-name a {
                    padding-bottom: 4px;
                    font-family: 'Open Sans', arial, sans-serif;
                    font-size: 15px;
                    color: #222;
                    line-height: 18px;
                    font-weight: 600;
                    display: inline-block;
                }
                .td_top_authors .td-authors-name a:after {
                    content: '';
                    height: 96px;
                    position: absolute;
                    right: 0;
                    top: -15px;
                    width: 324px;
                }
                @media (min-width: 1019px) and (max-width: 1140px) {
                    .td_top_authors .td-authors-name a:after {
                        width: 300px;
                    }
                }
                @media (min-width: 768px) and (max-width: 1018px) {
                    .td_top_authors .td-authors-name a:after {
                        width: 228px;
                    }
                }
                @media (max-width: 767px) {
                    .td_top_authors .td-authors-name a:after {
                        width: 100%;
                    }
                }
                .td_top_authors .td-author-post-count {
                    background-color: #222;
                }
                .td_top_authors .td-author-comments-count {
                    background-color: #444;
                }
                
                 /* @photo_size */
				.$unique_block_class .avatar {
					width: @photo_size;
					max-width: @photo_size;
				}
				.$unique_block_class.td_top_authors .item-details {
				margin-left: calc(@photo_size + 15px);
				height: @photo_size;
				}
				.$unique_block_class.td_top_authors .td_mod_wrap {
				min-height: @photo_size;
				}
                /* @photo_radius */
				.$unique_block_class .avatar,
				.$unique_block_class .td-author-image:before,
				.$unique_block_class .td-author-image:after {
					border-radius: @photo_radius;
				}
				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        /*-- GENERAL -- */
        $res_ctx->load_settings_raw( 'style_general_authors', 1 );

        /*-- IMAGE -- */
        // author image size
        $author_photo_size = $res_ctx->get_shortcode_att('photo_size');
        $res_ctx->load_settings_raw( 'photo_size', $author_photo_size );
        if( $author_photo_size != '' && is_numeric( $author_photo_size ) ) {
            $res_ctx->load_settings_raw( 'photo_size', $author_photo_size . 'px' );
        }

        // author image radius
        $author_photo_radius = $res_ctx->get_shortcode_att('photo_radius');
        $res_ctx->load_settings_raw( 'photo_radius', $author_photo_radius );
        if( $author_photo_radius != '' && is_numeric( $author_photo_radius ) ) {
            $res_ctx->load_settings_raw( 'photo_radius', $author_photo_radius . 'px' );
        }

    }


	/**
	 * Disable loop block features. This block does not use a loop and it dosn't need to run a query.
	 */
	function __construct() {
		parent::disable_loop_block_features();
	}



    function render($atts, $content = null) {
	    parent::render($atts);
        global $wpdb;

        $sort = '';

        extract(shortcode_atts(
            array(
                'roles' => '',
                'sort' => '',
                'exclude' => '',
                'include' => ''
            ), $atts));



        //print_r($atts);
        //die;

        $get_users_array = array();

        if (!empty($exclude)) {
            $exclude_array = explode(',', $exclude);
            $get_users_array['exclude'] = $exclude_array;
        }

        if (!empty($include)) {
            $include_array = explode(',', $include);
            $get_users_array['include'] = $include_array;
        }


        if (empty($sort)) {
            $get_users_array['orderby'] = 'display_name';
            //$td_authors = get_users(array('orderby' => 'display_name'));
        } else {
            $get_users_array['orderby'] = 'post_count';
            $get_users_array['order'] = 'DESC';
            //$td_authors = get_users(array('orderby' => 'post_count', 'order' => 'DESC'));
        }

        if (!empty($roles)) {
            $roles_in = array();
            $roles_buffer = explode(',', $roles);
            foreach ($roles_buffer as $role) {
                //clear the empty space
                $roles_in[] = trim($role);
            }
            //role__in was added in wp 4.4
            $get_users_array['role__in'] = $roles_in;
        }

        if ($this->get_att('number') != '' ) {
            $get_users_array['number'] = $this->get_att('number');
        }
        $photo_size = '70';
        if ($this->get_att('photo_size') != '' ) {
            $photo_size = $this->get_att('photo_size');
        }
        $show_posts = $this->get_att('show_posts');
        $show_comments = $this->get_att('show_comments');


        $td_authors = get_users($get_users_array);


        $buffy = '';
        $buffy .= '<div class="' . $this->get_block_classes(array('td_top_authors')) . '" ' . $this->get_block_html_atts() . '>';

	    //get the block js
	    $buffy .= $this->get_block_css();

        $buffy .= $this->get_block_title();
	    $buffy .= $this->get_pull_down_filter();


        if (!empty($td_authors)) {
            foreach ($td_authors as $td_author) {
                //echo td_global::$current_author_obj->ID;
                //echo $td_author->ID;
                //print_r($td_author);

                $current_author_class = '';
                if (!empty(td_global::$current_author_obj->ID) and td_global::$current_author_obj->ID == $td_author->ID) {
                    $current_author_class = ' td-active';
                }
                $buffy .= '<div class="td_mod_wrap td-pb-padding-side' . $current_author_class . '">';
                $buffy .= '<a href="' . get_author_posts_url($td_author->ID) . '">' . get_avatar($td_author->user_email, $photo_size) . '</a>';
                    $buffy .= '<div class="item-details">';

                        $buffy .= '<div class="td-authors-name">';
                        $buffy .= '<a href="' . get_author_posts_url($td_author->ID) . '">' . $td_author->display_name . '</a>';
                        $buffy .= '</div>';

                    if ( $show_posts == 'yes') {
                        $buffy .= '<span class="td-author-post-count">';
                        $buffy .= count_user_posts($td_author->ID). ' '  . __td('POSTS', TD_THEME_NAME);
                        $buffy .= '</span>';
                    }

                    if ( $show_comments == 'yes' ) {
                        $buffy .= '<span class="td-author-comments-count">';
                        $comment_count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) AS total FROM $wpdb->comments WHERE comment_approved = 1 AND user_id = %d", $td_author->ID));
                        $buffy .= $comment_count . ' '  . __td('COMMENTS', TD_THEME_NAME);
                        $buffy .= '</span>';
                    }


                    $buffy .= '<div class="td-authors-url">';
                    $buffy .= '<a href="' . $td_author->user_url . '">' . $td_author->user_url .'</a>';
                    $buffy .= '</div>';

                    $buffy .= '</div>';

                $buffy .= '</div>';
            }
        }



        $buffy .= '</div>';


        return $buffy;

    }
}