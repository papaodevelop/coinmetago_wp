<!-- PLUGIN SETTINGS -->

<!-- Woocommerce templates -->
<?php

// include only when WooCommerce is active
if ( td_global::$is_woocommerce_installed === true ) {
	echo td_panel_generator::box_start('WooCommerce templates' );
?>

    <!-- Shop product categories archives - custom sidebar + position -->
    <div class="td-box-row td-woo-categories-archives-box-row hide-settings tdb-hide">
        <div class="td-box-description">
            <p>Set the sidebar and position for woocommerce categories pages.</p>
        </div>
        <div class="td-box-control-full td-panel-sidebar-pos">
            <div class="td-display-inline-block">
				<?php
				echo td_panel_generator::visual_select_o(array(
					'ds' => 'td_option',
					'option_id' => 'tds_woo_archive_cat_sidebar_pos',
					'values' => array(
						array('text' => '', 'title' => 'Sidebar Left', 'val' => 'sidebar_left', 'img' => TDC_URL_LEGACY . '/assets/images/panel/sidebar/sidebar-left.png'),
						array('text' => '', 'title' => 'No Sidebar', 'val' => 'no_sidebar', 'img' => TDC_URL_LEGACY . '/assets/images/panel/sidebar/sidebar-full.png'),
						array('text' => '', 'title' => 'Sidebar Right', 'val' => '', 'img' => TDC_URL_LEGACY . '/assets/images/panel/sidebar/sidebar-right.png')
					)
				));
				?>
                <div class="td-panel-control-comment td-text-align-right">Select sidebar position</div>
            </div>
            <div class="td-display-inline-block td_sidebars_pulldown_align">
				<?php
				echo td_panel_generator::sidebar_pulldown(array(
					'ds' => 'td_option',
					'option_id' => 'tds_woo_archive_cat_sidebar'
				));
				?>
                <div class="td-panel-control-comment td-text-align-right">Create or select an existing sidebar</div>
            </div>
        </div>
    </div>
    <div class="td-box-section-separator"></div>

    <!-- Shop product tags archives - custom sidebar + position -->
    <div class="td-box-row td-woo-tags-archives-box-row hide-settings tdb-hide">
        <div class="td-box-description">
            <p>Set the sidebar and position for woocommerce tags pages.</p>
        </div>
        <div class="td-box-control-full td-panel-sidebar-pos">
            <div class="td-display-inline-block">
				<?php
				echo td_panel_generator::visual_select_o(array(
					'ds' => 'td_option',
					'option_id' => 'tds_woo_archive_tag_sidebar_pos',
					'values' => array(
						array('text' => '', 'title' => 'Sidebar Left', 'val' => 'sidebar_left', 'img' => TDC_URL_LEGACY . '/assets/images/panel/sidebar/sidebar-left.png'),
						array('text' => '', 'title' => 'No Sidebar', 'val' => 'no_sidebar', 'img' => TDC_URL_LEGACY . '/assets/images/panel/sidebar/sidebar-full.png'),
						array('text' => '', 'title' => 'Sidebar Right', 'val' => '', 'img' => TDC_URL_LEGACY . '/assets/images/panel/sidebar/sidebar-right.png')
					)
				));
				?>
                <div class="td-panel-control-comment td-text-align-right">Select sidebar position</div>
            </div>
            <div class="td-display-inline-block td_sidebars_pulldown_align">
				<?php
				echo td_panel_generator::sidebar_pulldown(array(
					'ds' => 'td_option',
					'option_id' => 'tds_woo_archive_tag_sidebar'
				));
				?>
                <div class="td-panel-control-comment td-text-align-right">Create or select an existing sidebar</div>
            </div>
        </div>
    </div>
    <div class="td-box-section-separator"></div>

    <!-- Shop product attributes archives - custom sidebar + position -->
    <div class="td-box-row td-woo-attributes-archives-box-row hide-settings tdb-hide">
        <div class="td-box-description">
            <p>Set the sidebar and position for woocommerce attributes pages.</p>
        </div>
        <div class="td-box-control-full td-panel-sidebar-pos">
            <div class="td-display-inline-block">
				<?php
				echo td_panel_generator::visual_select_o(array(
					'ds' => 'td_option',
					'option_id' => 'tds_woo_archive_atts_sidebar_pos',
					'values' => array(
						array('text' => '', 'title' => 'Sidebar Left', 'val' => 'sidebar_left', 'img' => TDC_URL_LEGACY . '/assets/images/panel/sidebar/sidebar-left.png'),
						array('text' => '', 'title' => 'No Sidebar', 'val' => 'no_sidebar', 'img' => TDC_URL_LEGACY . '/assets/images/panel/sidebar/sidebar-full.png'),
						array('text' => '', 'title' => 'Sidebar Right', 'val' => '', 'img' => TDC_URL_LEGACY . '/assets/images/panel/sidebar/sidebar-right.png')
					)
				));
				?>
                <div class="td-panel-control-comment td-text-align-right">Select sidebar position</div>
            </div>
            <div class="td-display-inline-block td_sidebars_pulldown_align">
				<?php
				echo td_panel_generator::sidebar_pulldown(array(
					'ds' => 'td_option',
					'option_id' => 'tds_woo_archive_atts_sidebar'
				));
				?>
                <div class="td-panel-control-comment td-text-align-right">Create or select an existing sidebar</div>
            </div>
        </div>
    </div>
    <div class="td-box-section-separator"></div>

    <!-- Shop search - custom sidebar + position -->
    <div class="td-box-row td-woo-search-archives-box-row hide-settings tdb-hide">
        <div class="td-box-description">
            <p>Set the custom sidebar and position for woocommerce search page.</p>
        </div>
        <div class="td-box-control-full td-panel-sidebar-pos">
            <div class="td-display-inline-block">
				<?php
				echo td_panel_generator::visual_select_o(array(
					'ds' => 'td_option',
					'option_id' => 'tds_woo_search_sidebar_pos',
					'values' => array(
						array('text' => '', 'title' => 'Sidebar Left', 'val' => 'sidebar_left', 'img' => TDC_URL_LEGACY . '/assets/images/panel/sidebar/sidebar-left.png'),
						array('text' => '', 'title' => 'No Sidebar', 'val' => 'no_sidebar', 'img' => TDC_URL_LEGACY . '/assets/images/panel/sidebar/sidebar-full.png'),
						array('text' => '', 'title' => 'Sidebar Right', 'val' => '', 'img' => TDC_URL_LEGACY . '/assets/images/panel/sidebar/sidebar-right.png')
					)
				));
				?>
                <div class="td-panel-control-comment td-text-align-right">Select sidebar position</div>
            </div>
            <div class="td-display-inline-block td_sidebars_pulldown_align">
				<?php
				echo td_panel_generator::sidebar_pulldown(array(
					'ds' => 'td_option',
					'option_id' => 'tds_woo_search_sidebar'
				));
				?>
                <div class="td-panel-control-comment td-text-align-right">Create or select an existing sidebar</div>
            </div>
        </div>
    </div>
    <div class="td-box-section-separator"></div>

    <!-- Shop single product page - custom sidebar + position -->
    <div class="td-box-row td-single-products-box-row hide-settings tdb-hide">
        <div class="td-box-description">
            <p>Set the custom sidebar and position for woocommerce single product pages.</p>
        </div>
        <div class="td-box-control-full td-panel-sidebar-pos">
            <div class="td-display-inline-block">
				<?php
				echo td_panel_generator::visual_select_o(array(
					'ds' => 'td_option',
					'option_id' => 'tds_woo_single_sidebar_pos',
					'values' => array(
						array('text' => '', 'title' => 'Sidebar Left', 'val' => 'sidebar_left', 'img' => TDC_URL_LEGACY . '/assets/images/panel/sidebar/sidebar-left.png'),
						array('text' => '', 'title' => 'No Sidebar', 'val' => 'no_sidebar', 'img' => TDC_URL_LEGACY . '/assets/images/panel/sidebar/sidebar-full.png'),
						array('text' => '', 'title' => 'Sidebar Right', 'val' => '', 'img' => TDC_URL_LEGACY . '/assets/images/panel/sidebar/sidebar-right.png')
					)
				));
				?>
                <div class="td-panel-control-comment td-text-align-right">Select sidebar position</div>
            </div>
            <div class="td-display-inline-block td_sidebars_pulldown_align">
				<?php
				echo td_panel_generator::sidebar_pulldown(array(
					'ds' => 'td_option',
					'option_id' => 'tds_woo_single_sidebar'
				));
				?>
                <div class="td-panel-control-comment td-text-align-right">Create or select an existing sidebar</div>
            </div>
        </div>
    </div>
    <div class="td-box-section-separator"></div>

    <!-- Shop base page - custom sidebar + position -->
    <div class="td-box-row td-woo-shop-base-box-row hide-settings tdb-hide">
        <div class="td-box-description">
            <p>Set the custom sidebar and position for woocommerce shop base page.</p>
        </div>
        <div class="td-box-control-full td-panel-sidebar-pos">
            <div class="td-display-inline-block">
				<?php
				echo td_panel_generator::visual_select_o(array(
					'ds' => 'td_option',
					'option_id' => 'tds_woo_shop_base_sidebar_pos',
					'values' => array(
						array('text' => '', 'title' => 'Sidebar Left', 'val' => 'sidebar_left', 'img' => TDC_URL_LEGACY . '/assets/images/panel/sidebar/sidebar-left.png'),
						array('text' => '', 'title' => 'No Sidebar', 'val' => 'no_sidebar', 'img' => TDC_URL_LEGACY . '/assets/images/panel/sidebar/sidebar-full.png'),
						array('text' => '', 'title' => 'Sidebar Right', 'val' => '', 'img' => TDC_URL_LEGACY . '/assets/images/panel/sidebar/sidebar-right.png')
					)
				));
				?>
                <div class="td-panel-control-comment td-text-align-right">Select sidebar position</div>
            </div>
            <div class="td-display-inline-block td_sidebars_pulldown_align">
				<?php
				echo td_panel_generator::sidebar_pulldown(array(
					'ds' => 'td_option',
					'option_id' => 'tds_woo_shop_base_sidebar'
				));
				?>
                <div class="td-panel-control-comment td-text-align-right">Create or select an existing sidebar</div>
            </div>
        </div>
    </div>

	<?php echo td_panel_generator::box_end();
}
?>
