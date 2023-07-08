<?php
/**
 * Created by PhpStorm.
 * User: RADU
 * Date: 1/9/2020
 * Time: 2:35 PM
 */
echo td_panel_generator::box_start('Footer', false); ?>

    <!-- Enable footer -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">SHOW FOOTER</span>
            <p>Show or hide the footer</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_footer_mob',
                'true_value' => '',
                'false_value' => 'no'
            ));
            ?>
        </div>
    </div>

    <!-- FOOTER PREDEFINED CONTENT -->
    <!-- logo -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">FOOTER LOGO</span>
            <p>Upload your logo</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::upload_image(array(
                'ds' => 'td_option',
                'option_id' => 'tds_footer_logo_upload_mob'
            ));
            ?>
        </div>
    </div>

    <!-- logo retina -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">FOOTER RETINA LOGO</span>
            <p>Upload your retina logo (double size)</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::upload_image(array(
                'ds' => 'td_option',
                'option_id' => 'tds_footer_retina_logo_upload_mob'
            ));
            ?>
        </div>
    </div>

    <!-- footer logo alt -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">LOGO ALT ATTRIBUTE</span>
            <p><a target="_blank" href="http://www.w3schools.com/tags/att_img_alt.asp">Alt attribute</a> for the logo.
                This is the alternative text if the logo cannot be displayed. It's useful for SEO and generally is the
                name of the site.
                <?php td_util::tooltip_html('
                        <h3>Footer Logo ALT:</h3>
                        <p>If you don\'t set the footer alt attribute the theme will use the one set for the header logo.</p>

                ', 'right') ?>
            </p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::input(array(
                'ds' => 'td_option',
                'option_id' => 'tds_footer_logo_alt_mob'
            ));
            ?>
        </div>
    </div>

    <!-- footer logo title -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">LOGO TITLE ATTRIBUTE</span>
            <p><a target="_blank" href="http://www.w3schools.com/tags/att_global_title.asp">Title attribute</a> for the
                logo. This attribute specifies extra information about the logo. Most browsers will show a tooltip with
                this text on logo hover.
                <?php td_util::tooltip_html('
                        <h3>Footer Logo TITLE:</h3>
                        <p>If you don\'t set the footer title attribute the theme will use the one set for the header logo.</p>

                ', 'right') ?>
            </p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::input(array(
                'ds' => 'td_option',
                'option_id' => 'tds_footer_logo_title_mob'
            ));
            ?>
        </div>
    </div>

    <!-- footer text -->
    <div class="td-box-row td-custom-css">
        <div class="td-box-description">
            <span class="td-box-title">FOOTER TEXT</span>
            <p>
                Write here your footer text
                <?php td_util::tooltip_html('
                        <h3>Set footer copyright text:</h3>
                        <p>You can use one of the following shortcuts in this text:</p>
                        <ul>
                            <li>##copy## - &copy;</li>
                            <li>##privacy_policy## - ' . get_the_privacy_policy_link() . '</li>
                            <li>##year## - ' . date('Y') . '</li>
                            <li>##sitename## - ' . get_bloginfo('name') . '</li>
                            <li>##siteurl## - ' . get_home_url() . '</li>
                            <li>##sitelink## - ' . '<a href="' . get_home_url() . '">' . get_bloginfo('name') . '</a>' . '</li>
                        </ul>
                ', 'right') ?>
            </p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::textarea(array(
                'ds' => 'td_option',
                'option_id' => 'tds_footer_text_mob',
            ));
            ?>
        </div>
    </div>


    <!-- Footer contact email -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">YOUR EMAIL ADDRESS</span>
            <p>Your email address</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::input(array(
                'ds' => 'td_option',
                'option_id' => 'tds_footer_email_mob'
            ));
            ?>
        </div>
    </div>


    <!-- Enable social icons -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">SHOW SOCIAL ICONS</span>
            <p>Show or hide the social icons, to setup the Social icons go to <strong>Social Networks</strong></p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_footer_social_mob',
                'true_value' => '',
                'false_value' => 'no'
            ));
            ?>
        </div>
    </div>

    <div class="td-box-section-separator"></div>

    <!-- SUB-FOOTER SETTINGS -->

    <!-- text -->
    <div class="td-box-row">
        <div class="td-box-section-title">SUBFOOTER</div>

        <div class="td-box-row-margin-bottom"></div>
    </div>

    <!-- Enable sub-footer -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">SHOW SUB-FOOTER</span>
            <p>Show or hide the sub-footer</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_sub_footer_mob',
                'true_value' => '',
                'false_value' => 'no'
            ));
            ?>
        </div>
    </div>

    <!-- FOOTER MENU -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">Footer menu</span>
            <p>Select a menu for the sub-footer menu section</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::dropdown(array(
                'ds' => 'wp_theme_menu_spot',
                'option_id' => 'footer-menu-mobile',
                'values' => td_panel_generator::get_user_created_menus()
            ));
            ?>
        </div>
    </div>

    <!-- Footer copyright text -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">FOOTER COPYRIGHT TEXT</span>
            <p>
                Set footer copyright text
                <?php td_util::tooltip_html('
                        <h3>Set footer copyright text:</h3>
                        <p>You can use one of the following shortcuts in this text:</p>
                        <ul>
                            <li>##copy## - &copy;</li>
                            <li>##privacy_policy## - ' . get_the_privacy_policy_link() . '</li>
                            <li>##year## - ' . date('Y') . '</li>
                            <li>##sitename## - ' . get_bloginfo('name') . '</li>
                            <li>##siteurl## - ' . get_home_url() . '</li>
                            <li>##sitelink## - ' . '<a href="' . get_home_url() . '">' . get_bloginfo('name') . '</a>' . '</li>
                        </ul>
                ', 'right') ?>
            </p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::textarea(array(
                'ds' => 'td_option',
                'option_id' => 'tds_footer_copyright_mob'
            ));
            ?>
        </div>
    </div>


    <!-- Copyright symbol -->
    <div class="td-box-row">
        <div class="td-box-description">
            <span class="td-box-title">COPYRIGHT SYMBOL</span>
            <p>Show or hide the footer copyright symbol</p>
        </div>
        <div class="td-box-control-full">
            <?php
            echo td_panel_generator::checkbox(array(
                'ds' => 'td_option',
                'option_id' => 'tds_footer_copy_symbol_mob',
                'true_value' => '',
                'false_value' => 'no'
            ));
            ?>
        </div>
    </div>



<?php echo td_panel_generator::box_end(); ?>