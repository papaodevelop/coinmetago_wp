<!-- breadcrumbs -->
<?php if( 'Newspaper' == TD_THEME_NAME && !defined('TD_STANDARD_PACK') ) {
    echo td_panel_generator::box_start('Breadcrumbs', false); ?>

    <!-- text -->
    <div class="td-box-row">
        <div class="td-box-description td-box-full">
            <p>From here you can customize the breadcrumbs that appear on your site. The breadcrumbs are a very useful
                navigation element that looks like this 'Home > My category > My article title'.
                Since the breadcrumbs are so important for humans and search engines
                crawlers, <?php echo TD_THEME_NAME ?> comes with extensive configuration options for them.
            </p>
        </div>
        <div class="td-box-row-margin-bottom"></div>
    </div>

    <div class="td-box-section-separator"></div>

    <!-- Show breadcrumbs on post -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">SHOW BREADCRUMBS</span>
            <p>
                Enable or disable the breadcrumbs
                <?php td_util::tooltip_html('
                    <h3>Enable / disable breadcrumbs:</h3>
                    <p>From here you can enable and disable the breadcrumbs. This setting affects all the site pages.</p>

            ', 'right') ?>
            </p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_breadcrumbs_show',
                'true_value' => '',
                'false_value' => 'hide'
            ));
            ?>
        </div>
    </div>

    <div class="td-box-section-separator"></div>

    <!-- Show breadcrumbs home link -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">SHOW BREADCRUMBS HOME LINK</span>
            <p>
                Show or hide the home link in breadcrumbs
                <?php td_util::tooltip_html('
                    <h3>Show or hide the home link in breadcrumbs:</h3>
                    <p>We recommend that you leave this setting Enabled for better usability and SEO. The \'home\' link in the breadcrumbs provides an easy access to the homepage of the site.</p>

            ', 'right') ?>
            </p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_breadcrumbs_show_home',
                'true_value' => '',
                'false_value' => 'hide'
            ));
            ?>
        </div>
    </div>

    <!-- Show breadcrumbs parent category -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">SHOW PARENT CATEGORY</span>
            <p>
                Show or hide the parent category link ex: Home > parent category > category
                <?php td_util::tooltip_html('
                    <h3>Show parent category:</h3>
                    <p>If the \'primary category\' of the post has a parent category, it will show up in the breadcrumb only if this setting is enabled</p>
            ', 'right') ?>
            </p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_breadcrumbs_show_parent',
                'true_value' => '',
                'false_value' => 'hide'
            ));
            ?>
        </div>
    </div>

    <!-- show Breadcrumbs article title -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">SHOW ARTICLE TITLE</span>
            <p>
                Show or hide the article title on post pages
                <?php td_util::tooltip_html('
                    <h3>Show article title in breadcrumbs:</h3>
                    <p>If you do not require this for specific reasons, it can be disabled. This setting only affects the breadcrumbs. Not the article title of the post!</p>
            ', 'right') ?>
            </p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_breadcrumbs_show_article',
                'true_value' => '',
                'false_value' => 'hide'
            ));
            ?>
        </div>
    </div>

    <?php echo td_panel_generator::box_end();
} ?>