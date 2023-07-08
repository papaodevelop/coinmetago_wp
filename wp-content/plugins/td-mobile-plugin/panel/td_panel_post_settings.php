<?php if( TD_THEME_NAME == 'Newspaper' && !defined('TD_STANDARD_PACK') ) { ?>
    <?php echo td_panel_generator::box_start('Post Settings', false); ?>


    <!-- Post and custom pst types -->
    <?php echo td_panel_generator::box_start('Post and Custom Post Types', false); ?>

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


    <?php echo td_panel_generator::box_end(); ?>


    <!-- featured images -->
    <?php echo td_panel_generator::box_start('Featured images', false); ?>

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

    <?php echo td_panel_generator::box_end(); ?>


    <!-- related article -->
    <?php echo td_panel_generator::box_start('Related article', false); ?>

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
            <p>How many related articles to show</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::radio_button_control(array(
                'ds' => 'td_option',
                'option_id' => 'tds_similar_articles_rows',
                'values' => array(
                    array('text' => '3 related posts', 'val' => ''),
                    array('text' => '6 related posts', 'val' => '2'),
                    array('text' => '9 related posts', 'val' => '3'),
                    array('text' => '12 related posts', 'val' => '4')
                )
            ));
            ?>
        </div>
    </div>

    <?php echo td_panel_generator::box_end(); ?>

    <!-- sharing -->
    <?php echo td_panel_generator::box_start('Sharing', false);?>

        <!-- text -->
        <div class="td-box-row">
            <div class="td-box-description td-box-full">
                <p>All the articles of <?php echo TD_THEME_NAME ?> have sharing buttons at the start of the article
                    (usually under the title) and at the end of the article (after tags). You can sort the social
                    networks with drag and drop.</p>
            </div>
            <div class="td-box-row-margin-bottom"></div>
        </div>

        <div class="td-box-section-separator"></div>

        <!-- ARTICLE sharing top -->
        <div class="td-box-row">
            <div class="td-box-description">
                <span class="td-box-title">TOP ARTICLE SHARING</span>
                <p>Show or hide the top article sharing on single post</p>
            </div>
            <div class="td-box-control-full">
                <?php
                echo td_panel_generator::checkbox(array(
                    'ds' => 'td_option',
                    'option_id' => 'tds_top_social_show',
                    'true_value' => '',
                    'false_value' => 'hide'
                ));
                ?>
            </div>
        </div>

        <!-- ARTICLE top share icon -->
        <div class="td-box-row">
            <div class="td-box-description">
                <span class="td-box-title">TOP ARTICLE SHARE ICON</span>
                <p>Show or hide the top article share icon on single post</p>
            </div>
            <div class="td-box-control-full">
                <?php
                echo td_panel_generator::checkbox(array(
                    'ds' => 'td_option',
                    'option_id' => 'tds_top_like_share_text_show',
                    'true_value' => 'show',
                    'false_value' => ''
                ));
                ?>
            </div>
        </div>

        <div class="td-box-section-separator"></div>

        <!-- ARTICLE sharing bottom -->
        <div class="td-box-row">
            <div class="td-box-description">
                <span class="td-box-title">BOTTOM ARTICLE SHARING</span>
                <p>Show or hide the bottom article sharing on post</p>
            </div>
            <div class="td-box-control-full">
                <?php
                echo td_panel_generator::checkbox(array(
                    'ds' => 'td_option',
                    'option_id' => 'tds_bottom_social_show',
                    'true_value' => '',
                    'false_value' => 'hide'
                ));
                ?>
            </div>
        </div>

        <!-- ARTICLE bottom share text -->
        <div class="td-box-row">
            <div class="td-box-description">
                <span class="td-box-title">BOTTOM ARTICLE SHARE ICON</span>
                <p>Show or hide the bottom article share icon on single post</p>
            </div>
            <div class="td-box-control-full">
                <?php
                echo td_panel_generator::checkbox(array(
                    'ds' => 'td_option',
                    'option_id' => 'tds_bottom_like_share_text_show',
                    'true_value' => 'show',
                    'false_value' => ''
                ));
                ?>
            </div>
        </div>


        <div class="td-box-section-separator"></div>

    <?php echo td_panel_generator::box_end();?>

    <?php echo td_panel_generator::box_end();
}?>