<?php

/*  ----------------------------------------------------------------------------
    the blog index template
 */

if ( td_util::is_amp() ) {
    get_header('amp');
} else {
    get_header();
}

?>

    <div class="td-main-content-wrap td-blog-index">
        <div class="td-container">
            <div class="td-crumb-container">
                <?php

                // show page_for_post title
                echo td_page_generator_mob::get_page_breadcrumbs(get_the_title(get_option('page_for_posts')));

                ?>
            </div>
            <div class="td-main-content">
                <?php
                locate_template('loop.php', true);

                echo td_page_generator_mob::get_pagination();

                ?>
            </div>
        </div> <!-- /.td-container -->
    </div> <!-- /.td-main-content-wrap -->

<?php

if ( td_util::is_amp() ) {
    get_footer('amp');
} else {
    get_footer();
}