<?php
/**
 * Template use to view the woo cloud templates
 */
get_header();
global $wp_query;

if ( have_posts() ) {
    tdb_state_template::set_wp_query($wp_query);
    while ( have_posts() ) : the_post();
        ?>
        <div class="td-main-content-wrap td-container-wrap product">
            <div class="tdc-content-wrap">
                <?php the_content(); ?>
            </div>
        </div>
        <?php
    endwhile;
}

get_footer();
