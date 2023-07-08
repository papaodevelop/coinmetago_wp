
<!-- general post settings -->
<?php if (TD_THEME_NAME === 'Newspaper') { ?>

    <?php echo td_panel_generator::box_start('General post settings', false); ?>
<!-- set general modal image -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">GENERAL MODAL IMAGE</span>
        <p>Enable or disable general modal image viewer over all post images, so you won't have to go on each post
            to set them individually.</p>
        <p>Consider that disabling this feature, the individual settings of an image post are applied.</p>
    </div>
    <div class="td-box-control-full">
        <?php
        echo td_panel_generator::checkbox(array(
            'ds' => 'td_option',
            'option_id' => 'tds_general_modal_image',
            'true_value' => 'yes',
            'false_value' => ''
        ));
        ?>
    </div>
</div>

<!-- set theme article schema -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">Enable article schema</span>
        <p>This option will enable the schema.org/Article markups in the theme. You can deactivate this, when you use an SEO plugin that comes with its own markups.</p>
    </div>
    <div class="td-box-control-full">
        <?php
        echo td_panel_generator::checkbox(array(
            'ds' => 'td_option',
            'option_id' => 'tds_disable_article_schema',
            'true_value' => '',
            'false_value' => 'hide'
        ));
        ?>
    </div>
</div>

    <!-- add Aggregate Rating meta -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">Add AggregateRating schema</span>
            <p>This option will enable the schema.org/AggregateRating markups for the theme reviews. The votes count will replace the post author in search. </p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_aggregate_rating_schema',
                'true_value' => 'yes',
                'false_value' => ''
            ));
            ?>
        </div>
    </div>
    <?php echo td_panel_generator::box_end(); ?>

<?php } ?>

<!-- post settings -->
<?php echo td_panel_generator::box_start('Default post template (site wide)', false); ?>

    <!-- Default post template -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">DEFAULT SITE POST TEMPLATE</span>
            <p>Setting this option will make all post pages, that don't have a post template set, to be displayed using this template. You can overwrite this setting on a per post basis.</p>
        </div>
        <div class="td-box-control-full">
            <?php
            $option_id = 'td_default_site_post_template';
            if (class_exists('SitePress', false)) {
                global $sitepress;
                $sitepress_settings = $sitepress->get_settings();
                if ( isset($sitepress_settings['custom_posts_sync_option'][ 'tdb_templates']) ) {
                    $translation_mode = (int)$sitepress_settings['custom_posts_sync_option']['tdb_templates'];
                    if (1 === $translation_mode) {
                        $option_id .= $sitepress->get_current_language();
                    }
                }
            }
            echo td_panel_generator::visual_select_o(array(
                'ds' => 'td_option',
                'option_id' => $option_id,
                'values' => td_api_single_template::_helper_td_global_list_to_panel_values()
            ));
            ?>
        </div>
    </div>

<?php echo td_panel_generator::box_end(); ?>



<!-- Post and custom pst types -->
<?php if( 'Newsmag' == TD_THEME_NAME || ( 'Newspaper' == TD_THEME_NAME && defined('TD_STANDARD_PACK') ) ) {
    echo td_panel_generator::box_start('Post and Custom Post Types', false); ?>

    <!-- Show categories -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">SHOW CATEGORIES TAGS</span>
            <p>Enable or disable the categories tags (on single posts and custom post types)</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_p_categories_tags',
                'true_value' => '',
                'false_value' => 'hide'
            ));
            ?>
        </div>
    </div>

    <!-- Show categories -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">CATEGORY TAGS DISPLAY ORDER</span>
            <p>
                Set the post category tags display order.
                <?php td_util::tooltip_html('
                            <h3>Post category tags display order</h3>
                            <ul>
                                <li>Disable - display the parent category tag first</li>
                                <li>Enable - display the category tags alphabetically</li>
                            </ul>
                          ', 'right') ?>
            </p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_default_category_display',
                'true_value' => 'true',
                'false_value' => ''
            ));
            ?>
        </div>
    </div>

    <!-- Show author name -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">SHOW AUTHOR NAME</span>
            <p>Enable or disable the author name (on single post page)</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_p_show_author_name',
                'true_value' => '',
                'false_value' => 'hide'
            ));
            ?>
        </div>
    </div>

    <!-- Show date -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">SHOW DATE</span>
            <p>Enable or disable the post date (on single post page)</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_p_show_date',
                'true_value' => '',
                'false_value' => 'hide'
            ));
            ?>
        </div>
    </div>

    <!-- Show modified date -->
    <?php if ('Newsmag' == TD_THEME_NAME) { ?>
        <div class="td-box-row">
            <div class="td-box-description">
                <span class="td-box-title">SHOW MODIFIED DATE</span>
                <p>Enable or disable the post modified date (on single post page)</p>
            </div>
            <div class="td-box-control-full">
                <?php
                echo td_panel_generator::checkbox(array(
                    'ds' => 'td_option',
                    'option_id' => 'tds_p_show_modified_date',
                    'true_value' => 'yes',
                    'false_value' => ''
                ));
                ?>
            </div>
        </div>
    <?php } ?>

    <!-- Show post views -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">SHOW POST VIEWS</span>
            <p>Enable or disable the post views (on single post page)</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_p_show_views',
                'true_value' => '',
                'false_value' => 'hide'
            ));
            ?>
        </div>
    </div>


    <!-- SHow comment count -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">SHOW COMMENT COUNT</span>
            <p>Enable or disable comment number (on single post page)</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_p_show_comments',
                'true_value' => '',
                'false_value' => 'hide'
            ));
            ?>
        </div>
    </div>


    <!-- Show tags -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">SHOW TAGS</span>
            <p>Enable or disable the post tags (bottom of single post pages and CPT)</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_show_tags',
                'true_value' => '',
                'false_value' => 'hide'
            ));
            ?>
        </div>
    </div>


    <!-- Show author box -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">SHOW AUTHOR BOX</span>
            <p>Enable or disable the author box (bottom of single post pages)</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_show_author_box',
                'true_value' => '',
                'false_value' => 'hide'
            ));
            ?>
        </div>
    </div>


    <!-- Show next and previous posts -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">SHOW NEXT AND PREVIOUS POSTS</span>
            <p>Show or hide `next` and `previous` posts (bottom of single post pages)</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_show_next_prev',
                'true_value' => '',
                'false_value' => 'hide'
            ));
            ?>
        </div>
    </div>


    <!-- Disable comments on post pages -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">ENABLE COMMENTS ON POSTS</span>
            <p>Enable or disable the posts' comments, for the entire site.</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_disable_comments_sidewide',
                'true_value' => '',
                'false_value' => 'disable'
            ));
            ?>
        </div>
    </div>

    <?php if(TD_THEME_NAME === 'Newsmag') {?>

    <!-- set general modal image -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">GENERAL MODAL IMAGE</span>
            <p>Enable or disable general modal image viewer over all post images, so you won't have to go on each post
                to set them individually.</p>
            <p>Consider that disabling this feature, the individual settings of an image post are applied.</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_general_modal_image',
                'true_value' => 'yes',
                'false_value' => ''
            ));
            ?>
        </div>
    </div>

<!-- set theme article schema -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">Enable article schema</span>
        <p>This option will enable the schema.org/Article markups in the theme. You can deactivate this, when you use an SEO plugin that comes with its own markups.</p>
    </div>
    <div class="td-box-control-full">
        <?php
        echo td_panel_generator::checkbox(array(
            'ds' => 'td_option',
            'option_id' => 'tds_disable_article_schema',
            'true_value' => '',
            'false_value' => 'hide'
        ));
        ?>
    </div>
</div>

<?php } ?>

    <?php echo td_panel_generator::box_end();
}?>




<!-- featured images -->
<?php if( 'Newsmag' == TD_THEME_NAME || ( 'Newspaper' == TD_THEME_NAME && defined('TD_STANDARD_PACK') ) ) {
    echo td_panel_generator::box_start('Featured images', false); ?>

    <!-- SHOW FEATURED IMAGE -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">SHOW FEATURED IMAGE</span>
            <p>Show or hide featured image</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_show_featured_image',
                'true_value' => '',
                'false_value' => 'hide'
            ));
            ?>
        </div>
    </div>


    <!-- Featured image placeholder -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">FEATURED IMAGE PLACEHOLDER</span>
            <p>When a post doesn't have a featured image set, the theme will load a placeholder image.</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_hide_featured_image_placeholder',
                'true_value' => '',
                'false_value' => 'hide_placeholder'
            ));
            ?>
        </div>
    </div>


    <!-- Featured image lightbox -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">FEATURED IMAGE LIGHTBOX</span>
            <p>What to do when the featured image is clicked inside a post. (on single post page)</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::radio_button_control(array(
                'ds' => 'td_option',
                'option_id' => 'tds_featured_image_view_setting',
                'values' => array(
                    array('text' => 'Use lightbox', 'val' => ''),
                    array('text' => 'No lightbox', 'val' => 'no_modal')
                )
            ));
            ?>
        </div>
    </div>

    <?php echo td_panel_generator::box_end(); ?>


    <!-- related article -->
    <?php echo td_panel_generator::box_start('Related article', false); ?>

    <!-- text -->
    <div class="td-box-row">
        <div class="td-box-description td-box-full">
            <p>On each single post at the bottom, the theme shows three or five similar posts in the related articles
                section.</p>
            <ul>
                <li>Three articles are shown on the layout with sidebar</li>
                <li>Five articles are shown on the full width layout</li>
            </ul>
        </div>
        <div class="td-box-row-margin-bottom"></div>
    </div>

    <!-- Show similar article -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">SHOW RELATED ARTICLE</span>
            <p>Enable or disable the related article section</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_similar_articles',
                'true_value' => '',
                'false_value' => 'hide'
            ));
            ?>
        </div>
    </div>


    <!-- Related article - Type -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">RELATED ARTICLE - TYPE</span>
            <p>How to pick the related articles:</p>
            <ul>
                <li>by category - pick posts that have at least one category in common with the current post</li>
                <li>by tags - pick posts that have at least one tag in common with the current post</li>
            </ul>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::radio_button_control(array(
                'ds' => 'td_option',
                'option_id' => 'tds_similar_articles_type',
                'values' => array(
                    array('text' => 'by category', 'val' => ''),
                    array('text' => 'by tag', 'val' => 'by_tag')
                )
            ));
            ?>
        </div>
    </div>


    <!-- Related articles count -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">RELATED ARTICLE - COUNT</span>
            <p>How many related articles to show:</p>
            <ul>
                <li>one row has 3 articles when the layout is with sidebar</li>
                <li>one row has 5 articles when the layout is without sidebar</li>
            </ul>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::radio_button_control(array(
                'ds' => 'td_option',
                'option_id' => 'tds_similar_articles_rows',
                'values' => array(
                    array('text' => '1 row of related posts (3/5)', 'val' => ''),
                    array('text' => '2 rows of related posts (6/10)', 'val' => '2'),
                    array('text' => '3 rows of related posts (9/15)', 'val' => '3'),
                    array('text' => '4 rows of related posts (12/20)', 'val' => '4')
                )
            ));
            ?>
        </div>
    </div>

    <?php echo td_panel_generator::box_end();
}?>

<?php if( 'Newsmag' == TD_THEME_NAME || ( 'Newspaper' == TD_THEME_NAME && defined('TD_STANDARD_PACK') ) ) {
    echo td_panel_generator::box_start('More Article Box', false); ?>

    <!-- text -->
    <div class="td-box-row">
        <div class="td-box-description td-box-full">
            <p>This is a box that appears when a user scrolls on a single post at least 400px. The box appears in the
                right bottom corner and it can show one or more posts related with the current one.</p>
        </div>
        <div class="td-box-row-margin-bottom"></div>
    </div>


    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">MORE ARTICLES</span>
            <p>Enable / Disable - More Articles option</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_more_articles_on_post_pages_enable',
                'true_value' => 'show',
                'false_value' => ''
            ));
            ?>
        </div>
    </div>


    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">DISTANCE FROM THE TOP</span>
            <p>This is the distance from the top, that user have to scroll, before the window will appear, default
                400</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::input(array(
                'ds' => 'td_option',
                'option_id' => 'tds_more_articles_on_post_pages_distance_from_top'
            ));
            ?>
        </div>
    </div>


    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">DISPLAY ARTICLES</span>
            <p>What articles should be displayed</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::dropdown(array(
                'ds' => 'td_option',
                'option_id' => 'tds_more_articles_on_post_pages_display',
                'values' => array(
                    array('text' => 'Latest Article', 'val' => ''),
                    array('text' => 'From Same Category', 'val' => 'same_category'),
                    array('text' => 'From Post Tags', 'val' => 'same_tag'),
                    array('text' => 'From Same Author', 'val' => 'same_author'),
                    array('text' => 'Random', 'val' => 'random')
                )
            ));
            ?>
        </div>
    </div>


    <!-- DISPLAY VIEW -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">ARTICLE DISPLAY VIEW</span>
            <p>Select a module type, this is how your article list will be displayed</p>
        </div>
        <div class="td-box-control-full td-panel-module">
            <?php
            echo td_panel_generator::visual_select_o(array(
                'ds' => 'td_option',
                'option_id' => 'tds_more_articles_on_post_pages_display_module',
                'values' => td_panel_generator::helper_display_modules('enabled_on_more_articles_box')
            ));
            ?>
        </div>
    </div>


    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">NUMBER OF POSTS</span>
            <p>Number of post to display</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::dropdown(array(
                'ds' => 'td_option',
                'option_id' => 'tds_more_articles_on_post_pages_number',
                'values' => array(
                    array('text' => '1', 'val' => ''),
                    array('text' => '2', 'val' => 2),
                    array('text' => '3', 'val' => 3),
                    array('text' => '4', 'val' => 4),
                    array('text' => '5', 'val' => 5),
                    array('text' => '6', 'val' => 6)
                )
            ));
            ?>
        </div>
    </div>


    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">DISABLE TIME</span>
            <p>If the user closes the More Articles box, this is the time (in days) to wait before seeing the box
                again</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::dropdown(array(
                'ds' => 'td_option',
                'option_id' => 'tds_more_articles_on_post_pages_time_to_wait',
                'values' => array(
                    array('text' => 'never', 'val' => ''),
                    array('text' => 'for 1 day', 'val' => 1),
                    array('text' => 'for 2 days', 'val' => 2),
                    array('text' => 'for 3 days', 'val' => 3)
                )
            ));
            ?>
        </div>
    </div>

    <?php echo td_panel_generator::box_end();
}?>


    <!-- Advanced options -->
    <?php echo td_panel_generator::box_start('Ajax view count (keep counting with cache plugins)', false); ?>


    <!-- text -->
    <div class="td-box-row">
        <div class="td-box-description td-box-full">
            <p>Enabling this feature will update the post view count, on single post page, using ajax.</p>
            <ul>
                <li>This feature is best used if you have a caching plugin active.</li>
                <li>When enabled, on single post pages, this feature will also increment the post view counter.</li>
                <li>When this feature is enabled, the default(classic) post counter incrementation is disabled.</li>
                <li>After enabling or disabling this feature make sure to empty all caches.</li>
            </ul>
        </div>
        <div class="td-box-row-margin-bottom"></div>
    </div>


    <!-- Enable / Disabled Ajax post count -->
    <div class="td-box-row">
        <div class="td-box-description td-no-short-description">
            <span class="td-box-title">ENABLE / DISABLE AJAX POST VIEW COUNT</span>
            <p>Useful if you are using a caching plugin</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_ajax_post_view_count',
                'true_value' => 'enabled',
                'false_value' => ''
            ));
            ?>
        </div>

    </div>

    <?php echo td_panel_generator::box_end(); ?>

<!-- Advanced options -->
<?php echo td_panel_generator::box_start('Video settings', false); ?>

    <!-- text -->
    <div class="td-box-row">
        <div class="td-box-description td-box-full">
            <p>Enabling this feature will keep Youtube player when page is scrolling.</p>
        </div>
        <div class="td-box-row-margin-bottom"></div>
    </div>

    <div class="td-box-row">
        <div class="td-box-description td-no-short-description">
            <span class="td-box-title">ENABLE PLAYING ONLY ONE PLAYER</span>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_video_playing_one',
                'true_value' => 'enabled',
                'false_value' => ''
            ));
            ?>
        </div>
    </div>

    <div class="td-box-row">
        <div class="td-box-description td-no-short-description">
            <span class="td-box-title">ENABLE PAUSE HIDDEN PLAYER</span>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_video_pause_hidden',
                'true_value' => 'enabled',
                'false_value' => ''
            ));
            ?>
        </div>
    </div>

    <div class="td-box-row">
        <div class="td-box-description td-no-short-description">
            <span class="td-box-title">ENABLE LAZY VIDEO ON MOBILE</span>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_video_lazy',
                'true_value' => 'enabled',
                'false_value' => ''
            ));
            ?>
        </div>
    </div>

    <div class="td-box-section-separator"></div>

    <!-- Enable / Disabled Modal Video at scroll -->
    <div class="td-box-row">
        <div class="td-box-description td-no-short-description">
            <span class="td-box-title">ENABLE STICKY VIDEO AT SCROLL</span>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_video_scroll',
                'true_value' => 'enabled',
                'false_value' => ''
            ));
            ?>
        </div>
    </div>

    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">VIDEO WIDTH</span>
            <p>Default width: 450px</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::input(array(
                'ds' => 'td_option',
                'option_id' => 'tds_video_width'
            ));
            ?>
        </div>
    </div>

    <!-- Vertical video position -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">VERTICAL POSITION</span>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::radio_button_control(array(
                'ds' => 'td_option',
                'option_id' => 'tds_video_position_v',
                'values' => array(
                    array('text' => 'Top', 'val' => ''),
                    array('text' => 'Bottom', 'val' => 'bottom')
                )
            ));
            ?>
        </div>
    </div>

    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">VERTICAL DISTANCE</span>
            <p>Default vertical distance: 300px</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::input(array(
                'ds' => 'td_option',
                'option_id' => 'tds_video_distance_v'
            ));
            ?>
        </div>
    </div>

    <!-- Horizontal video position -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">HORIZONTAL POSITION</span>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::radio_button_control(array(
                'ds' => 'td_option',
                'option_id' => 'tds_video_position_h',
                'values' => array(
                    array('text' => 'Right', 'val' => ''),
                    array('text' => 'Left', 'val' => 'left')
                )
            ));
            ?>
        </div>
    </div>

    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">HORIZONTAL DISTANCE</span>
            <p>Default horizontal distance: 0px</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::input(array(
                'ds' => 'td_option',
                'option_id' => 'tds_video_distance_h'
            ));
            ?>
        </div>
    </div>

<?php echo td_panel_generator::box_end(); ?>
