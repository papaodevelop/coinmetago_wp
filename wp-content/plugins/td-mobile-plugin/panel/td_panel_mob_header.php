<?php
/**
 * Created by PhpStorm.
 * User: RADU
 * Date: 1/9/2020
 * Time: 2:35 PM
 */

echo td_panel_generator::box_start('Header', false); ?>

<!-- MAIN MENU -->
<div class="td-box-row">
	<div class="td-box-description">
		<span class="td-box-title">Main menu</span>
		<p>Select a menu for the mobile menu section</p>
	</div>
	<div class="td-box-control-full">
		<?php
		echo td_panel_generator::dropdown(array(
            'ds' => 'wp_theme_menu_spot',
            'option_id' => 'header-menu-mobile',
            'values' => td_panel_generator::get_user_created_menus()
        ));
		?>
    </div>
</div>

<!-- Sticky Menu: enable disable -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">Sticky Menu</span>
        <p>Enable or disable the sticky menu section</p>
    </div>
    <div class="td-box-control-full">
        <?php
        echo td_panel_generator::checkbox(array(
            'ds' => 'td_option',
            'option_id' => 'tdm_sticky_menu',
            'true_value' => '',
            'false_value' => 'hide'
        ));
        ?>
    </div>
</div>

<!-- Sign In / Join: enable disable -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">Show sign in / join</span>
        <p>Show or hide the Sign In / Join section</p>
    </div>
    <div class="td-box-control-full">
        <?php
        echo td_panel_generator::checkbox(array(
            'ds' => 'td_option',
            'option_id' => 'tds_login_mobile',
            'true_value' => '',
            'false_value' => 'hide'
        ));
        ?>
    </div>
</div>

<!-- Live search: enable disable -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">Live search</span>
        <p> Use ajax search </p>
    </div>
    <div class="td-box-control-full">
        <?php
        echo td_panel_generator::checkbox(array(
            'ds' => 'td_option',
            'option_id' => 'tds_live_search_mob',
            'true_value' => '',
            'false_value' => 'hide'
        ));
        ?>
    </div>
</div>

<!-- LOGO MOBILE -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">LOGO MOBILE</span>
        <p>Upload your logo</p>
        <p><strong>Note: </strong>For best results logo mobile
            size: <?php echo td_api_text::get('text_header_logo_mobile_image') ?></p>
    </div>
    <div class="td-box-control-full">
        <?php
        echo td_panel_generator::upload_image(array(
            'ds' => 'td_option',
            'option_id' => 'tds_logo_menu_upload_mob'
        ));
        ?>
    </div>
</div>

<!-- RETINA LOGO MOBILE IN MENU UPLOAD -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">RETINA LOGO MOBILE</span>
        <p>Upload your retina logo (double size)</p>
        <p><strong>Note: </strong>For best results retina logo mobile
            size: <?php echo td_api_text::get('text_header_logo_mobile_image_retina') ?></p>
    </div>
    <div class="td-box-control-full">
        <?php
        echo td_panel_generator::upload_image(array(
            'ds' => 'td_option',
            'option_id' => 'tds_logo_menu_upload_r_mob'
        ));
        ?>
    </div>
</div>

<!-- Logo ALT attribute -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">LOGO ALT ATTRIBUTE</span>
        <p><a href="http://www.w3schools.com/tags/att_img_alt.asp" target="_blank">Alt attribute</a> for the logo. This is the alternative text if the logo cannot be displayed. It's useful for SEO and generally is the name of the site.</p>
    </div>
    <div class="td-box-control-full">
        <?php
        echo td_panel_generator::input(array(
            'ds' => 'td_option',
            'option_id' => 'tds_logo_alt_mob'
        ));
        ?>
    </div>
</div>


<!-- Logo TITLE attribute -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">LOGO TITLE ATTRIBUTE</span>
        <p><a href="http://www.w3schools.com/tags/att_global_title.asp" target="_blank">Title attribute</a> for the logo. This attribute specifies extra information about the logo. Most browsers will show a tooltip with this text on logo hover.</p>
    </div>
    <div class="td-box-control-full">
        <?php
        echo td_panel_generator::input(array(
            'ds' => 'td_option',
            'option_id' => 'tds_logo_title_mob'
        ));
        ?>
    </div>
</div>

<!-- H1 Logo: enable disable -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">H1 Logo</span>
        <p> Use H1 Logo on Homepage and Blog </p>
    </div>
    <div class="td-box-control-full">
        <?php
        echo td_panel_generator::checkbox(array(
            'ds' => 'td_option',
            'option_id' => 'tds_h1_on_logo',
            'true_value' => '',
            'false_value' => 'hide'
        ));
        ?>
    </div>
</div>

<!-- Text LOGO -->
<!--<div class="td-box-row">-->
<!--    <div class="td-box-description">-->
<!--        <span class="td-box-title">TEXT LOGO</span>-->
<!--        <p>Write a text logo</p>-->
<!--    </div>-->
<!--    <div class="td-box-control-full">-->
<!--        --><?php
//        echo td_panel_generator::input(array(
//            'ds' => 'td_option',
//            'option_id' => 'tds_logo_text_mob',
//            'placeholder' => strtoupper(TD_THEME_NAME)
//        ));
//        ?>
<!--    </div>-->
<!--</div>-->


<!-- Text LOGO Tagline -->
<!--<div class="td-box-row">-->
<!--    <div class="td-box-description">-->
<!--        <span class="td-box-title">TEXT LOGO TAGLINE</span>-->
<!--        <p>Write a tagline for the text logo</p>-->
<!--    </div>-->
<!--    <div class="td-box-control-full">-->
<!--        --><?php
//        echo td_panel_generator::input(array(
//            'ds' => 'td_option',
//            'option_id' => 'tds_tagline_text_mob',
//            'placeholder' => 'DISCOVER THE ART OF PUBLISHING'
//        ));
//        ?>
<!--    </div>-->
<!--</div>-->

<?php echo td_panel_generator::box_end();?>
