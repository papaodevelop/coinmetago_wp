<?php
$tdb_brand_logo = defined('TD_COMPOSER') ? td_util::get_wl_val('tds_wl_logo', get_template_directory_uri() . '/includes/wp-booster/wp-admin/images/plugins/tagdiv-small.png') : get_template_directory_uri() . '/includes/wp-booster/wp-admin/images/plugins/tagdiv-small.png';
$tdb_brand_url = defined('TD_COMPOSER') ? td_util::get_wl_val('tds_wl_logo_url', 'https://tagdiv.com?utm_source=theme&utm_medium=logo&utm_campaign=tagdiv&utm_content=click_hp') : 'https://tagdiv.com?utm_source=theme&utm_medium=logo&utm_campaign=tagdiv&utm_content=click_hp';
?>
<div class="about-wrap td-wp-admin-header ">
    <div class="td-wp-admin-top">
        <a class="td-tagdiv-link" href="<?php echo $tdb_brand_url ?>"><img class="td-tagdiv-brand" src="<?php echo $tdb_brand_logo ?>" /></a>
        <div class="td-wp-admin-theme">
            <h1>Link Tracker</h1>
        </div>
    </div>
    <!--<h2 class="nav-tab-wrapper tracking">-->
        <!--<a href="#tracker" class="nav-tab" data-route="tracker">Link Tracker</a>-->
        <!--<a href="#settings" class="nav-tab" data-route="settings">Conversion Settings</a>-->
    <!--</h2>-->
</div>
