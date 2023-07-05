<?php
/**
 * The single post loop Default template
 **/

if (have_posts()) {
    the_post();

    $td_mod_single = new td_module_single($post);
    ?>

    <article id="post-<?php echo esc_attr( $td_mod_single->post->ID ) ?>" class="<?php echo join(' ', get_post_class());?>" <?php echo $td_mod_single->get_item_scope();?>>
        <div class="td-post-header">

            <?php $td_mod_single->show_category() ?>

            <header class="td-post-title">
                <?php $td_mod_single->show_title() ?>

                <?php if (!empty($td_mod_single->td_post_theme_settings['td_subtitle'])) { ?>
                    <p class="td-post-sub-title"><?php printf( '%1$s', $td_mod_single->td_post_theme_settings['td_subtitle'] ) ?></p>
                <?php } ?>


                <div class="td-module-meta-info">
                    <?php $td_mod_single->show_author() ?>
                    <?php $td_mod_single->show_date(false, false) ?>
                    <?php $td_mod_single->show_comments() ?>
                    <?php $td_mod_single->show_views() ?>
                </div>

            </header>

        </div>

        <?php echo $td_mod_single->get_social_sharing_top(); ?>

        <div class="td-post-content tagdiv-type">
            <?php
            // override the default featured image by the templates (single.php and home.php/index.php - blog loop)
            if (!empty(td_global::$load_featured_img_from_template)) {
                $td_mod_single->show_image(td_global::$load_featured_img_from_template);
            } else {
                $td_mod_single->show_image('td_696x0');
            }
            ?>

            <?php $td_mod_single->show_content() ?>
        </div>

        <footer>
            <?php $td_mod_single->show_post_pagination() ?>
            <?php $td_mod_single->show_review() ?>

            <div class="td-post-source-tags">
                <?php $td_mod_single->show_source_and_via() ?>
                <?php $td_mod_single->show_the_tags() ?>
            </div>

            <?php echo $td_mod_single->get_social_sharing_bottom(); ?>
            <?php $td_mod_single->show_next_prev_posts() ?>
            <?php $td_mod_single->show_author_box() ?>
            <?php $td_mod_single->show_item_scope_meta() ?>
        </footer>

    </article> <!-- /.post -->

    <style>
        /* compiled from reviews.less - from standard pack */
        .td-review {
            width: 100%;
            margin-bottom: 34px;
            font-size: 13px;
        }
        .td-review td {
            padding: 7px 14px;
        }
        .td-review .td-review-summary {
            padding: 21px 14px;
        }
        @media (max-width: 767px) {
            .td-review .td-review-summary {
                padding: 0;
            }
        }
        .td-review i {
            margin-top: 5px;
        }
        .td-review .td-review-row-stars:hover {
            background-color: #fcfcfc;
        }
        .td-review .td-review-percent-sign {
            font-size: 15px;
            line-height: 1;
        }
        .td-review-header .block-title {
            background-color: #222;
            color: #fff;
            display: inline-block;
            line-height: 16px;
            padding: 8px 12px 6px;
            margin-bottom: 0;
            border-bottom: 0;
        }
        .td-review-header td {
            padding: 26px 0 26px 0;
            border: 0;
        }
        @-moz-document url-prefix() {
            .td-review-header .block-title {
                padding: 7px 12px;
            }
        }
        .td-icon-star,
        .td-icon-star-empty,
        .td-icon-star-half {
            font-size: 15px;
            width: 20px;
        }
        .td-review-stars {
            text-align: center;
        }
        @media (max-width: 767px) {
            .td-review-stars {
                width: 134px;
            }
        }
        .td-review-final-score {
            line-height: 80px;
            font-size: 48px;
            margin-bottom: 5px;
        }
        .td-rating-bar-wrap {
            margin: 0 0 7px 0;
            background-color: #f5f5f5;
        }
        .td-rating-bar-wrap div {
            height: 20px;
            background-color: #4db2ec;
            max-width: 100%;
        }
        .td-review-row-bars .td-review-desc {
            display: inline-block;
            padding-bottom: 2px;
        }
        .td-review-percent {
            float: right;
            padding-bottom: 2px;
        }
        @media (max-width: 767px) {
            .td-review-footer {
                border-left: 1px solid #ededed;
                position: relative;
                display: block;
            }
            .td-review-footer:after {
                content: '';
                width: 1px;
                background-color: #ededed;
                position: absolute;
                right: -1px;
                top: 0;
                height: 100%;
            }
        }
        .td-review-summary {
            padding: 21px 0 0 0;
            vertical-align: top;
        }
        @media (max-width: 767px) {
            .td-review-summary {
                display: block;
                width: 100%;
                clear: both;
                border: 0;
            }
        }
        .td-review-summary .block-title {
            background-color: #222;
            color: #fff;
            display: inline-block;
            line-height: 16px;
            padding: 8px 12px 6px;
            margin-bottom: 13px;
            position: relative;
            border-bottom: 0;
        }
        @media (max-width: 767px) {
            .td-review-summary .block-title {
                margin: 14px 0 0 14px;
            }
        }
        @-moz-document url-prefix() {
            .td-review-summary .block-title {
                padding: 7px 12px;
            }
        }
        .td-review-summary-content {
            font-size: 12px;
            margin-right: 21px;
        }
        @media (max-width: 767px) {
            .td-review-summary-content {
                margin: 14px;
            }
        }
        .td-review-score {
            font-family: 'Open Sans', 'Open Sans Regular', sans-serif;
            font-weight: bold;
            text-align: center;
            padding: 0;
            vertical-align: bottom;
            width: 150px;
        }
        @media (max-width: 767px) {
            .td-review-score {
                display: block;
                width: 100%;
                padding: 0;
                border-left: 0;
                border-right: 0;
            }
        }
        .td-review-overall {
            padding: 0 0 28px 0;
            line-height: 14px;
        }
        .td-review-overall span {
            font-size: 11px;
        }
        .td-review-final-star {
            margin-bottom: 5px;
        }
        @media (max-width: 767px) {
            .td-review-row-stars {
                display: block;
                width: 100%;
                clear: both;
                float: left;
                border: 1px solid #ededed;
                border-bottom: 0;
                border-right: 0;
            }
            .td-review-row-stars td {
                float: left;
                border: 0;
            }
            .td-review-row-stars .td-review-desc {
                width: 70%;
                padding: 9px 14px;
            }
            .td-review-row-stars .td-review-stars {
                width: 30%;
                text-align: right;
            }
            .td-review-row-stars:nth-last-of-type(2) {
                border-bottom: 1px solid #ededed;
            }
        }
        @media (max-width: 500px) {
            .td-review-row-stars .td-review-desc {
                width: 55%;
            }
            .td-review-row-stars .td-review-stars {
                width: 45%;
            }
        }
    </style>

    <?php
} else {
    //no posts
    echo td_page_generator::no_posts();
}
