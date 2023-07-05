<div class="about-wrap td-wp-admin-header ">
    <div class="td-wp-admin-top">
        <a class="td-tagdiv-link" href="https://tagdiv.com?utm_source=theme&utm_medium=logo&utm_campaign=tagdiv&utm_content=click_hp"><img class="td-tagdiv-brand" src="<?php echo get_template_directory_uri() ?>/includes/wp-booster/wp-admin/images/plugins/tagdiv-small.png" /></a>
        <div class="td-wp-admin-theme">
            <h1>Cloud templates</h1>
        </div>
    </div>
    <h2 class="nav-tab-wrapper cloud-templates">
        <a href="#templates" class="nav-tab" data-route="templates">General</a>
        <?php

            if ( defined('TD_WOO') ) {
	            echo '<a href="#templates-shop" class="nav-tab" data-route="shopTemplates">Shop</a>';
            }

            $cpts = td_util::get_cpts();

            if ( !empty( $cpts ) ) {
                echo '<a href="#cpt" class="nav-tab" data-route="cpt">CPT/Taxonomies</a>';
            }
        ?>
        <a href="#trash" class="nav-tab" data-route="trash">Trash</a>
    </h2>
</div>
