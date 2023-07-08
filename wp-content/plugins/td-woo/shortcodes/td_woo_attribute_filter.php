<?php

/**
 * Class td_woo_attribute_filter - this renders td woo filters shortcode and works on all td woo templates pages
 * td woo filters are applied to td woo products loop shortcodes
 */

class td_woo_attribute_filter extends td_block {

	private $tdw_template_type; // the template type
	private $tdw_template_data_id; // the template data: queried obj id
	private $shortcode_atts; // the block shortcode atts

	public function get_custom_css() {

		// $unique_block_class
		$unique_block_class = $this->block_uid;

		$td_woo_url = TD_WOO_URL; // needed to access td-woo/assets/images used in css

		$compiled_css = '';

		$raw_css = "
			<style>
	                
                /* @general_style */
                .td_woo_attribute_filter .tdw-filter-container {
                    margin-bottom: 25px;
                }
                .td_woo_attribute_filter .tdw-filter-container:last-child {
                    margin-bottom: 0;
                }
                
                .td_woo_attribute_filter ul:not(.checkbox-list-wrapper) {
                    display: flex;
				    flex-wrap: wrap;
				    margin: 0;
				    list-style-type: none;
                }
                
				.td_woo_attribute_filter h4 {
				    margin-bottom: 12px;
				    font-size: 13px;
				    line-height: 1;
				    margin-top: 0;
				    color: #000;
				    font-weight: 500;
				}
                
				.td_woo_attribute_filter .tdw-no-filters {
				    display: none !important;
				}
				
                .tdw-filter-item-span {
                    color: #000;
                    vertical-align: middle;
                }
                
                .td_woo_attribute_filter .tdw-filters-clear-all {
                    display: inline-flex;
                    align-items: center; 
                    padding: 9px;
                    font-size: 13px;
                    font-weight: 500;
                    color: #333;
                    border: 1px solid #ddd;
                }
                .td_woo_attribute_filter .tdw-filters-clear-all:hover {
                    color: #4db2ec;
                }
                .td_woo_attribute_filter .tdw-filters-clear-all-txt {
                    margin-right: 10px;
                    line-height: 1;
                }
                .td_woo_attribute_filter .tdw-clear-all-filters-wrap i {
                    font-size: 10px;
                }
                .td_woo_attribute_filter .tdw-clear-all-filters-wrap .tdw-filters-clear-all-icon-svg {
                    line-height: 0;
                }
                .td_woo_attribute_filter .tdw-clear-all-filters-wrap svg
                .td_woo_attribute_filter .tdw-clear-all-filters-wrap svg {
                    width: 10px;
                    height: auto;
                }
                .td_woo_attribute_filter .tdw-clear-all-filters-wrap svg,
                .td_woo_attribute_filter .tdw-clear-all-filters-wrap svg * {
                    fill: #333;
                }
                
				.td_woo_attribute_filter .tdw-filter-item:not(.checkbox-tdw-filter-item):not(.image-tdw-filter-item), 
				.td_woo_attribute_filter .image-tdw-filter-item img,
				.td_woo_attribute_filter .tdw-filter-item-type-link {
				    position: relative;
				    display: flex;
				    background-color: #fff;
				    transition: all .2s ease;
				    box-shadow: inset 0 0 0 1px #dfdfdf;
				    cursor: pointer;
				    outline: none !important;
				}
				
				.td_woo_attribute_filter .tdw-filter-item:not(.checkbox-tdw-filter-item):not(.image-tdw-filter-item),
				.td_woo_attribute_filter .image-tdw-filter-item,
				.td_woo_attribute_filter .tdw-filter-item-type-link {
				    margin: 0 5px 5px 0;
				}
				
				.td_woo_attribute_filter .tdw-filter-item-type-link {
				    box-shadow: inset 0 0 0 0.5px #4db2ec;
				}
				
				.td_woo_attribute_filter .tdw-filter-item:not(.checkbox-tdw-filter-item):not(.image-tdw-filter-item):hover,
				.td_woo_attribute_filter .tdw-filter-item:not(.checkbox-tdw-filter-item):not(.image-tdw-filter-item).selected {
                    box-shadow: inset 0 0 0 2px #444;
                }
                
                .td_woo_attribute_filter .tdw-filter-item-type-link:hover,
                .td_woo_attribute_filter .tdw-filter-item-type-link.selected {
                    box-shadow: inset 0 0 0 2px #4db2ec;
                }
				
				.td_woo_attribute_filter .tdw-filter-item .tdw-filter-item-span:not(.tdw-filter-item-span-checkbox):not(.filter-icon),
				.td_woo_attribute_filter .tdw-filter-item-type-link .tdw-filter-item-link {
				    display: flex;
				    align-items: center;
				    justify-content: center;
				    width: 100%;
				    height: 100%;
				}
                
                .tdw-filter-item:not(.checkbox-tdw-filter-item):not(.tdw-filter-item-option-select) .td_woo_label_count {
                    position: absolute;
                    top: 0;
                    right: 0;
                    transform: translate(50%, -50%);
                    margin: 2px 2px 0 0;
                    background: #4db2ec;
                    min-width: 1.6em;
                    min-height: 1.6em;
                    padding: 0 5px;
                    font-size: 10px;
                    line-height: 1.6 !important;
                    font-weight: 400 !important;
                    color: #fff;
                    text-align: center;
                    border-radius: 200px;
                    z-index: 1;
                }
				
				.td_woo_attribute_filter .image-tdw-filter-item {
				    display: flex;
				    align-items: center;
				    cursor: pointer;
				    position: relative;
				}
				.td_woo_attribute_filter .image-tdw-filter-item img {
				    padding: 4px;
				    width: auto;
				    height: 48px;
				}
				.td_woo_attribute_filter .image-tdw-filter-item .tdw-img-attr-label {
				    margin-left: 10px;
				    line-height: 1.3;
				}
				
				.td_woo_attribute_filter .color-tdw-filter-item {
				    padding: 4px;
				    width: 26px;
				    height: 26px;
				}
				
				.td_woo_attribute_filter .button-tdw-filter-item,
				.td_woo_attribute_filter .tdw-filter-item-type-link {
				    padding: 0 6px;
				    min-width: 30px;
				    min-height: 30px;
				}
				
				.td_woo_attribute_filter .tdw-filter-dropdown-inner {
				    position: relative;
				}
				.td_woo_attribute_filter .tdw-filter-dropdown-inner:after,
				.td_woo_attribute_filter .tdw-multi-select-wrapper:after {
				    content: '\\e801';
                    position: absolute;
                    top: 50%;
                    transform: translateY(-50%);
                    right: 9px;
                    font-family: 'newspaper';
                    font-size: 14px;
				}
                .td_woo_attribute_filter .tdw-filter-items-wrapper.select-filter-type {
                    border-style: solid;
                    width: 100%;
                    padding: 9px;
                    font-size: 13px;
                    line-height: 1;
                    border-radius: 0;
                    border-color: #ddd;
                    -webkit-appearance: none;
                    outline: none !important;
                    cursor: pointer;
                    position: relative;
                }
                .td_woo_attribute_filter .tdw-filter-items-wrapper.select-filter-type:focus,
                .td_woo_attribute_filter .tdw-filter-items-wrapper.select-filter-type:active {
                    border-color: #b0b0b0;
                }
				.td_woo_attribute_filter .tdw-filter-items-wrapper.select-filter-type .tdw-filter-item-option-select:checked {
                    font-weight: bold;
                }
                
                .td_woo_attribute_filter ul.checkbox-list-wrapper {
				    margin: 0;
				    list-style-type: none;
                }
                .td_woo_attribute_filter ul.checkbox-list-wrapper .tdw-filter-item {
                    display: flex;
                    align-items: center;
                    margin: 0 0 8px;
                    line-height: 1;
				    cursor: pointer;
                }
                .td_woo_attribute_filter ul.checkbox-list-wrapper .tdw-filter-item:last-item {
                    margin-bottom: 0;
                }
                .td_woo_attribute_filter ul.checkbox-list-wrapper .tdw-filter-item:hover,
                .td_woo_attribute_filter .tdw-filter-item.checkbox-tdw-filter-item.selected {
                    color: #4db2ec;
                }
                .td_woo_attribute_filter .tdw-filter-item.checkbox-tdw-filter-item .filter-icon {
                    position: relative;
                    margin-right: 10px;
                    width: 14px;
                    height: 14px;
                    border: 1px solid #ccc;
                    display: inline-block;
                    vertical-align: middle;
                }
                .td_woo_attribute_filter .tdw-filter-item.checkbox-tdw-filter-item .filter-icon:after {
                    content: '';
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    background-color: #4db2ec;
                    opacity: 0;
                    transition: opacity .2s;
                }
                .td_woo_attribute_filter .tdw-filter-item.checkbox-tdw-filter-item.selected .filter-icon:after {
                    opacity: 1;
                }
                .td_woo_attribute_filter .tdw-filter-item.checkbox-tdw-filter-item:focus {
                    outline: none; 
                }
                .tdw-filters-button-mobile {
                    position: fixed;
                    bottom: 0;
                    right: 0;
                    background-color: #ffffff;
                    z-index: 99;
                    padding: 27px;
                    border-radius: 30px;
                    margin: 15px;
                    cursor: pointer;
                }
                .tdw-filters-button-mobile svg {
                    -webkit-transition: opacity 0.2s cubic-bezier(0.79, 0.14, 0.15, 0.86);
                    transition: opacity 0.2s cubic-bezier(0.79, 0.14, 0.15, 0.86);
                    float: left;
                    position: absolute;
                    top: 15px;
                    right: 15px;
                }
                .tdw-filters-open .td-woo-filter-icon,
                .td-woo-close-icon {
                    opacity: 0;
                }
                .tdw-filters-open .td-woo-close-icon,
                .td-woo-filter-icon {
                    opacity: 1;
                }
                @media (max-width: 767px) {
                    .td-theme-wrap .tdw-filters-mobile {
                        display: block !important;
                        position: fixed;
                        z-index: 999;
                        background-color: #fff;
                        top: 0;
                        left: 0;
                        transform: translate3d(-110%, 0, 0);
                        -webkit-transform: translate3d(-110%, 0, 0);
                        width: 78% !important;
                        padding: 20px 20px 80px;
                        overflow-y: scroll;
                        box-shadow: 3px 1px 16px 0 rgb(0 0 0 / 24%);
                        height: 100vh;
                        -webkit-transition: transform 0.5s cubic-bezier(0.79, 0.14, 0.15, 0.86);
                        transition: transform 0.5s cubic-bezier(0.79, 0.14, 0.15, 0.86);
                    }
                    .tdw-filters .tdc-content-wrap .tdc_zone {
                        z-index: auto;
                    }
                    body.tdw-filters-open {
                        overflow: hidden;
                    }
                    .tdw-filters .tdw-filters-button-mobile {
                        display: block !important;
                    }
                    .tdw-filters-open .tdw-filters-button-mobile:before {
                        content: '';
                        position: fixed;
                        top: 0;
                        right: 0;
                        width: 22%;
                        height: 100vh;
                        z-index: 99999;
                    }
                }
                .tdw-filters-open .td-theme-wrap .tdw-filters-mobile {
                    transform: translate3d(0, 0, 0);
                    -webkit-transform: translate3d(0, 0, 0);
                }
                
                .tdw-multi-select-wrapper {
                     position: relative;
                     user-select: none;
                     width: 100%;
                }
                .multi-select {
                     position: relative;
                     display: flex;
                     flex-direction: column;
                     border-width: 0 1px 0 1px;
                     border-style: solid;
                     border-color: #b0b0b0;
                }
                 .multi-select__selection {
                     position: relative;
                     display: flex;
                     align-items: center;
                     padding: 5px;
                     font-size: 14px;
                     font-weight: 300;
                     color: #3b3b3b;
                     height: 30px;
                     line-height: 30px;
                     background: #ffffff;
                     cursor: pointer;
                     border-width: 1px 0 1px 0;
                     border-style: solid;
                     border-color: #b0b0b0;
                }
                .multi-select__selection span:not(.no-selection) {
                    padding: 8px 6px;
                    box-shadow: inset 0 0 0 1px #dfdfdf;
                    margin: 3px 6px 3px 0;
                    font-size: 11px;
                    list-style: none;
                    line-height: 5px;
                    transition: all .2s ease;
                    -webkit-transition: all .2s ease;
                }
                 .multi-select-options {
                     position: absolute;
                     display: block;
                     top: 100%;
                     left: 0;
                     right: 0;
                     padding: 10px;
                     border: 1px solid #b0b0b0;
                     border-top: 0;
                     background: #fff;
                     transition: all 0.5s;
                     opacity: 0;
                     visibility: hidden;
                     pointer-events: none;
                     z-index: 2;
                }
                 .multi-select.open .multi-select-options {
                     opacity: 1;
                     visibility: visible;
                     pointer-events: all;
                }
                .multi-select-option {
                     width: 100%;
                     position: relative;
                     display: block;
                     margin: 0;
                     padding: 0;
                     font-size: 14px;
                     font-weight: 300;
                     color: #3b3b3b;
                     line-height: 24px;
                     cursor: pointer;
                     transition: all 0.5s;
                }
                .multi-select-option:hover {
                     cursor: pointer;
                     background-color: #b2b2b2;
                }
                .multi-select-option .filter-icon {
                    display: inline-block;
                    position: relative;
                    top: 1px;
                    margin-right: 10px;
                    width: 14px;
                    height: 14px;
                    border: 1px solid #ccc;
                }
                .multi-select-option .filter-icon:after {
                    content: '';
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    background-color: #4db2ec;
                    opacity: 0;
                    transition: opacity .2s;
                }
                .multi-select-option.selected .filter-icon:after {
                    width: 6px;
                    height: 6px;
                    opacity: 1;
                }
                
                
                
                /* @filters_bg_color */
                body .$unique_block_class .tdw-filter-container {
                    background-color: @filters_bg_color;
                }
                /* @filters_bg_gradient */
                body .$unique_block_class .tdw-filter-container {
                    @filters_bg_gradient;
                }
                /* @label_space */
                body .$unique_block_class .tdw-filter-title {
                    margin-bottom: @label_space;
                }
                /* @filters_space */
                body .$unique_block_class .tdw-filter-container {
                    padding: @filters_space;
                }
                /* @filters_radius */
                body .$unique_block_class .tdw-filter-container {
                    border-radius: @filters_radius;
                }
                /* @filters_bottom_space */
                body .$unique_block_class .tdw-filter-container {
                    margin-bottom: @filters_bottom_space;
                }
                /* @filters_shadow */
                body .$unique_block_class .tdw-filter-container {
                    box-shadow: @filters_shadow;
                }
                
                /* @filters_vertical */
                .$unique_block_class .tdw-filters-wrap {
                    display: block;
                }
                /* @filters_horiz_align */
                .$unique_block_class .tdw-filters-wrap {
                    justify-content: @filters_horiz_align;
                }
                
                /* @filters_horizontal */
                .$unique_block_class .tdw-filters-wrap {
                    display: flex;
                }
                .$unique_block_class .tdw-filters-wrap .tdw-filter-container:last-child {
                    padding-right: 0;
                }
                /* @filters_wrap */
                .$unique_block_class .tdw-filters-wrap {
                    flex-wrap: wrap;
                }
                /* @filters_nowrap */
                .$unique_block_class .tdw-filters-wrap {
                    flex-wrap: nowrap;
                }
                /* @filters_width */
                .$unique_block_class .tdw-filters-wrap .tdw-filter-container {
                    max-width: @filters_width;
                }
                
                /* @align_center */
				body .$unique_block_class .td-block-title {
					text-align: center;
				}
				body .$unique_block_class.td_block_template_4 .td-block-title > *:before,
				body .$unique_block_class.td_block_template_17 .td-block-title:after,
				body .$unique_block_class.td_block_template_13 .td-block-subtitle,
				body .$unique_block_class.td_block_template_9 .td-block-title:after {
				    right: 0;
				    left: 0;
				}
				body .$unique_block_class.td_block_template_5 .td-block-title > * {
				    border-width: 0 0 0 4px;
				}
				body .$unique_block_class.td_block_template_8 .td-block-title > * {
					padding-left: 20px;
					padding-right: 20px;
				}
				.$unique_block_class .tdw-filter-items-wrapper:not(.checkbox-list-wrapper) {
                    justify-content: center;
                }
				/* @align_right */
				body .$unique_block_class .td-block-title {
					text-align: right;
				}
				body .$unique_block_class.td_block_template_4 .td-block-title > *:before {
				    right: 10px;
				    left: auto;
				}
				body .$unique_block_class.td_block_template_5 .td-block-title > * {
				    border-width: 0 4px 0 0;
				}
				body .$unique_block_class.td_block_template_8 .td-block-title > * {
					padding-left: 20px;
					padding-right: 0;
				}
				body .$unique_block_class.td_block_template_9 .td-block-title:after {
					right: 0;
					left: auto;
				}
				body .$unique_block_class.td_block_template_13 .td-block-subtitle {
					right: -4px;
					left: auto;
				}
				body .$unique_block_class.td_block_template_17 .td-block-title:after {
					right: 15px;
					left: auto;
				}
				.$unique_block_class .tdw-filter-items-wrapper:not(.checkbox-list-wrapper) {
                    justify-content: flex-end;
                }
				/* @align_left */
				body .$unique_block_class .td-block-title {
					text-align: left;
				}
				body .$unique_block_class.td_block_template_4 .td-block-title > *:before {
				    right: auto;
				    left: 10px;
				}
				body .$unique_block_class.td_block_template_5 .td-block-title > * {
				    border-width: 0 0 0 4px;
				}
				body .$unique_block_class.td_block_template_8 .td-block-title > * {
					padding-left: 0;
					padding-right: 20px;
				}
				body .$unique_block_class.td_block_template_9 .td-block-title:after {
					right: auto;
					left: 0;
				}
				body .$unique_block_class.td_block_template_13 .td-block-subtitle {
					right: auto;
					left: -4px;
				}
				body .$unique_block_class.td_block_template_17 .td-block-title:after {
					right: auto;
					left: 15px;
				}
				.$unique_block_class .tdw-filter-items-wrapper:not(.checkbox-list-wrapper) {
                    justify-content: flex-start;
                }

                
                /* @reset_full */
                body .$unique_block_class .tdw-filters-clear-all {
                    display: flex;
                }
                body .$unique_block_class .tdw-filters-clear-all-txt {
                    margin-right: auto;
                }
                /* @reset_off */
                body .$unique_block_class .tdw-filters-clear-all {
                    display: inline-flex;
                }
                
                /* @reset_general */
                body .$unique_block_class .tdw-filters-clear-all-txt {
                    margin-right: 9px;
                }
                
                /* @reset_center */
                body .$unique_block_class .tdw-filters-clear-all {
                    justify-content: center;
                }
                body .$unique_block_class .tdw-clear-all-filters-wrap {
                    text-align: center;
                }
                /* @reset_right */
                body .$unique_block_class .tdw-filters-clear-all {
                    justify-content: flex-end;
                }
                body .$unique_block_class .tdw-clear-all-filters-wrap {
                    text-align: right;
                }
                /* @reset_left */
                body .$unique_block_class .tdw-filters-clear-all {
                    justify-content: flex-start;
                }
                body .$unique_block_class .tdw-clear-all-filters-wrap {
                    text-align: left;
                }
                
                /* @reset_space */
                body .$unique_block_class .tdw-clear-all-filters-wrap {
                    margin-bottom: @reset_space;
                }
                /* @reset_padd */
                body .$unique_block_class .tdw-filters-clear-all {
                    padding: @reset_padd;
                }
                /* @reset_border */
                body .$unique_block_class .tdw-filters-clear-all {
                    border-width: @reset_border;
                }
                /* @reset_txt_space */
                body .$unique_block_class .tdw-filters-clear-all-txt {
                    margin-right: @reset_txt_space;
                }
                /* @reset_icon_size */
                body .$unique_block_class .tdw-clear-all-filters-wrap i {
                    font-size: @reset_icon_size;
                }
                body .$unique_block_class .tdw-clear-all-filters-wrap svg {
                    width: @reset_icon_size;
                }
                
                
                /* @drop_padding */
                body .$unique_block_class .tdw-filter-items-wrapper.select-filter-type {
                    padding: @drop_padding;
                }
                /* @drop_arrow_size */
                body .$unique_block_class .tdw-filter-dropdown-inner:after {
                    font-size: @drop_arrow_size;
                }
                /* @drop_border */
                body .$unique_block_class .tdw-filter-items-wrapper.select-filter-type {
                    border-width: @drop_border;
                }
                /* @drop_border_style */
                body .$unique_block_class .tdw-filter-items-wrapper.select-filter-type {
                    border-style: @drop_border_style;
                }
                /* @drop_border_radius */
                body .$unique_block_class .tdw-filter-items-wrapper.select-filter-type {
                    border-radius: @drop_border_radius;
                }
                
                /* @color_size */
                body .$unique_block_class .color-tdw-filter-item {
                    width: @color_size;
                    height: @color_size;
                }
                /* @color_margin */
                body.woocommerce div.$unique_block_class .color-tdw-filter-item {
                    margin: @color_margin;
                }
                /* @color_padd */
                body .$unique_block_class .color-tdw-filter-item {
                    padding: @color_padd;
                }
                /* @all_color_border */
                body.woocommerce div.$unique_block_class .color-tdw-filter-item {
                    box-shadow: inset 0 0 0 @all_color_border @all_color_border_c;
                }
                /* @all_color_border_s */
                body.woocommerce div.$unique_block_class .color-tdw-filter-item:hover,
                body.woocommerce div.$unique_block_class .color-tdw-filter-item.selected {
                    box-shadow: inset 0 0 0 @all_color_border_s @all_color_border_c_s;
                }
                /* @color_radius */
                body .$unique_block_class .color-tdw-filter-item,
                body .$unique_block_class .color-tdw-filter-item span,
                body .$unique_block_class .color-tdw-filter-item img {
                    border-radius: @color_radius;
                }
                
                /* @but_size */
                body .$unique_block_class .button-tdw-filter-item {
                    min-width: @but_size;
                    min-height: @but_size;
                }
                /* @but_margin */
                body.woocommerce div.$unique_block_class .tdw-filter-container .button-tdw-filter-item {
                    margin: @but_margin;
                }
                body.woocommerce div.$unique_block_class .tdw-filter-container .button-tdw-filter-item:last-child {
                    margin-right: 0;
                }
                /* @but_padd */
                body .$unique_block_class .tdw-filter-container .button-tdw-filter-item {
                    padding: @but_padd;
                }
                /* @all_but_border */
                body.woocommerce div.$unique_block_class .tdw-filter-container .button-tdw-filter-item {
                    box-shadow: inset 0 0 0 @all_but_border @all_but_border_c;
                }
                /* @all_but_border_s */
                body.woocommerce div.$unique_block_class .tdw-filter-container .button-tdw-filter-item:hover,
                body.woocommerce div.$unique_block_class .tdw-filter-container .button-tdw-filter-item.selected {
                    box-shadow: inset 0 0 0 @all_but_border_s @all_but_border_c_s;
                }
                /* @but_radius */
                body .$unique_block_class .button-tdw-filter-item {
                    border-radius: @but_radius;
                }
                
                /* @check_size */
                body .$unique_block_class .tdw-filter-item.checkbox-tdw-filter-item .filter-icon {
                    width: @check_size;
                    height: @check_size;
                }
                /* @check_space */
                body .$unique_block_class .tdw-filter-item.checkbox-tdw-filter-item .filter-icon {
                    margin-right: @check_space;
                }
                /* @all_check_border_color */
                body .$unique_block_class .tdw-filter-item.checkbox-tdw-filter-item .filter-icon {
                    border-color: @all_check_border_color;
                }
                /* @all_check_border */
                body .$unique_block_class .tdw-filter-item.checkbox-tdw-filter-item .filter-icon {
                    border: @all_check_border solid @all_check_border_color;
                }
                /* @all_check_border_color_s */
                body .$unique_block_class .tdw-filter-item.checkbox-tdw-filter-item.selected .filter-icon {
                    border-color: @all_check_border_color_s;
                }
                /* @all_check_border_s */
                body .$unique_block_class .tdw-filter-item.checkbox-tdw-filter-item.selected .filter-icon {
                    border: @all_check_border_s solid @all_check_border_color_s;
                }
                /* @dot_size */
                body .$unique_block_class .tdw-filter-item.checkbox-tdw-filter-item.selected .filter-icon:after {
                    width: @dot_size;
                    height: @dot_size;
                }
                /* @check_radius */
                body .$unique_block_class .tdw-filter-item.checkbox-tdw-filter-item .filter-icon,
                body .$unique_block_class .tdw-filter-item.checkbox-tdw-filter-item .filter-icon:after {
                    border-radius: @check_radius;
                }
                
                /* @img_display_txt */
                body .$unique_block_class .image-list-wrapper {
                    flex-direction: column;
                }
                /* @img_margin */
                body.woocommerce div.$unique_block_class .image-tdw-filter-item {
                    margin: @img_margin;
                }
                /* @img_txt_space */
                body.woocommerce div.$unique_block_class .image-tdw-filter-item .tdw-img-attr-label {
                    margin-left: @img_txt_space;
                }
                /* @img_size */
                body .$unique_block_class .image-tdw-filter-item img {
                    height: @img_size;
                }
                /* @img_padd */
                body .$unique_block_class .image-tdw-filter-item img {
                    padding: @img_padd;
                }
                /* @all_img_border */
                body.woocommerce div.$unique_block_class .image-tdw-filter-item img {
                    box-shadow: inset 0 0 0 @all_img_border @all_img_border_c;
                }
                /* @all_img_border_s */
                body.woocommerce div.$unique_block_class .image-tdw-filter-item:hover img,
                body.woocommerce div.$unique_block_class .image-tdw-filter-item.selected img {
                    box-shadow: inset 0 0 0 @all_img_border_s @all_img_border_c_s;
                }
                /* @img_radius */
                body .$unique_block_class .image-tdw-filter-item img {
                    border-radius: @img_radius;
                }
                
                
                
                
                /* @reset_bg */
                body .$unique_block_class .tdw-clear-all-filters-wrap a {
                    background-color: @reset_bg;
                }
                /* @reset_bg_h */
                body .$unique_block_class .tdw-clear-all-filters-wrap a:hover {
                    background-color: @reset_bg_h;
                }
                /* @reset_border_color */
                body .$unique_block_class .tdw-clear-all-filters-wrap a {
                    border-color: @reset_border_color;
                }
                /* @reset_border_color_h */
                body .$unique_block_class .tdw-clear-all-filters-wrap a:hover {
                    border-color: @reset_border_color_h;
                }
                /* @reset_color */
                body .$unique_block_class .tdw-clear-all-filters-wrap .tdw-filters-clear-all-txt,
                body .$unique_block_class .tdw-clear-all-filters-wrap i {
                    color: @reset_color;
                }
                body .$unique_block_class .tdw-clear-all-filters-wrap svg,
                body .$unique_block_class .tdw-clear-all-filters-wrap svg * {
                    fill: @reset_color;
                }
                /* @reset_color_h */
                body .$unique_block_class .tdw-clear-all-filters-wrap a:hover .tdw-filters-clear-all-txt,
                body .$unique_block_class .tdw-clear-all-filters-wrap a:hover i {
                    color: @reset_color_h;
                }
                body .$unique_block_class .tdw-clear-all-filters-wrap a:hover svg,
                body .$unique_block_class .tdw-clear-all-filters-wrap a:hover svg * {
                    fill: @reset_color_h;
                }
                /* @reset_icon_color */
                body .$unique_block_class .tdw-clear-all-filters-wrap svg,
                body .$unique_block_class .tdw-clear-all-filters-wrap svg * {
                    fill: @reset_icon_color;
                }
                /* @reset_icon_color_h */
                body .$unique_block_class .tdw-clear-all-filters-wrap a:hover svg,
                body .$unique_block_class .tdw-clear-all-filters-wrap a:hover svg * {
                    fill: @reset_icon_color_h;
                }
                /* @reset_radius */
                body .$unique_block_class .tdw-filters-clear-all {
                    border-radius: @reset_radius;
                }
                
                /* @drop_color */
                body .$unique_block_class .tdw-filter-items-wrapper.select-filter-type {
                    color: @drop_color;
                }
                /* @drop_arrow_color */
                body .$unique_block_class .tdw-filter-dropdown-inner:after {
                    color: @drop_arrow_color;
                }
                /* @drop_bg_color */
                body .$unique_block_class .tdw-filter-items-wrapper.select-filter-type {
                    background-color: @drop_bg_color;
                }
                /* @drop_bg_color_f */
                body .$unique_block_class .tdw-filter-items-wrapper.select-filter-type:active,
                body .$unique_block_class .tdw-filter-items-wrapper.select-filter-type:focus {
                    background-color: @drop_bg_color_f;
                }
                /* @drop_border_color */
                body .$unique_block_class .tdw-filter-items-wrapper.select-filter-type {
                    border-color: @drop_border_color;
                }
                /* @drop_border_color_f */
                body .$unique_block_class .tdw-filter-items-wrapper.select-filter-type:active,
                body .$unique_block_class .tdw-filter-items-wrapper.select-filter-type:focus {
                    border-color: @drop_border_color_f;
                }
                
                /* @color_bg */
                body.woocommerce div.$unique_block_class .color-tdw-filter-item {
                    background-color: @color_bg;
                }
                /* @color_bg_s */
                body.woocommerce div.$unique_block_class .color-tdw-filter-item:hover,
                body.woocommerce div.$unique_block_class .color-tdw-filter-item.selected {
                    background-color: @color_bg_s;
                }
                
                /* @but_txt */
                body .$unique_block_class .button-tdw-filter-item {
                    color: @but_txt;
                }
                /* @but_txt_s */
                body .$unique_block_class .button-tdw-filter-item:hover .tdw-filter-item-span,
                body .$unique_block_class .button-tdw-filter-item.selected .tdw-filter-item-span {
                    color: @but_txt_s;
                }
                /* @but_bg */
                body.woocommerce div.$unique_block_class .button-tdw-filter-item {
                    background-color: @but_bg;
                }
                /* @but_bg_s */
                body.woocommerce div.$unique_block_class .button-tdw-filter-item:hover,
                body.woocommerce div.$unique_block_class .button-tdw-filter-item.selected {
                    background-color: @but_bg_s;
                }
                
                /* @check_bg */
                body .$unique_block_class .tdw-filter-item.checkbox-tdw-filter-item .filter-icon {
                    background-color: @check_bg;
                }
                /* @check_bg_s */
                body .$unique_block_class .tdw-filter-item.checkbox-tdw-filter-item.selected .filter-icon {
                    background-color: @check_bg_s;
                }
                /* @check_square */
                body .$unique_block_class .tdw-filter-item.checkbox-tdw-filter-item.selected .filter-icon:after {
                    background-color: @check_square;
                }
                /* @check_label_color */
                body .$unique_block_class .tdw-filter-item.checkbox-tdw-filter-item {
                    color: @check_label_color;
                }
                /* @check_label_color_h */
                body .$unique_block_class .tdw-filter-item.checkbox-tdw-filter-item:hover {
                    color: @check_label_color_h;
                }
                /* @check_label_color_s */
                body .$unique_block_class .tdw-filter-item.checkbox-tdw-filter-item.selected {
                    color: @check_label_color_s;
                }
                
                /* @img_bg */
                body.woocommerce div.$unique_block_class .image-tdw-filter-item img {
                    background-color: @img_bg;
                }
                /* @img_bg_s */
                body.woocommerce div.$unique_block_class .image-tdw-filter-item:hover img,
                body.woocommerce div.$unique_block_class .image-tdw-filter-item.selected img {
                    background-color: @img_bg_s;
                }
                /* @img_txt_color */
                body.woocommerce div.$unique_block_class .image-tdw-filter-item .tdw-img-attr-label {
                    color: @img_txt_color;
                }
                /* @img_txt_color_s */
                body.woocommerce div.$unique_block_class .image-tdw-filter-item:hover .tdw-img-attr-label,
                body.woocommerce div.$unique_block_class .image-tdw-filter-item.selected .tdw-img-attr-label {
                    color: @img_txt_color_s;
                }
                
                
                
                /* @fmob_color */
                body .tdw-filters-button-mobile {
                    background-color: @fmob_color;
                }
                /* @fmob_shadow */
                .tdw-filters-button-mobile {
                    box-shadow: @fmob_shadow;
                }
                
                
                
                
                /* @f_label */
                body .$unique_block_class h4 {
                    @f_label
                }
                /* @f_drop */
                body .$unique_block_class .tdw-filter-items-wrapper.select-filter-type {
                    @f_drop
                }
                /* @f_but */
                body .$unique_block_class .button-tdw-filter-item {
                    @f_but
                }
                /* @f_check */
                body .$unique_block_class .tdw-filter-item.checkbox-tdw-filter-item {
                    @f_check
                }
                /* @f_check_s */
                body .$unique_block_class .tdw-filter-item.checkbox-tdw-filter-item.selected {
                    @f_check_s
                }
                /* @f_img */
                body .$unique_block_class .image-tdw-filter-item .tdw-img-attr-label {
                    @f_img
                }
                
                /* @count_padd */
                .$unique_block_class .tdw-filter-item:not(.checkbox-tdw-filter-item):not(.tdw-filter-item-option-select) .td_woo_label_count {
                    padding: @count_padd;
                }
                /* @count_horiz */
                .$unique_block_class .tdw-filter-item:not(.checkbox-tdw-filter-item):not(.tdw-filter-item-option-select) .td_woo_label_count {
                    right: @count_horiz;
                }
                /* @count_vert */
                .$unique_block_class .tdw-filter-item:not(.checkbox-tdw-filter-item):not(.tdw-filter-item-option-select) .td_woo_label_count {
                    top: @count_vert;
                }
                /* @count_radius */
                .$unique_block_class .tdw-filter-item:not(.checkbox-tdw-filter-item):not(.tdw-filter-item-option-select) .td_woo_label_count {
                    border-radius: @count_radius;
                }
                /* @count_txt_color */
                .$unique_block_class .tdw-filter-item:not(.checkbox-tdw-filter-item):not(.tdw-filter-item-option-select) .td_woo_label_count {
                    color: @count_txt_color;
                }
                /* @count_txt_color_h */
                .$unique_block_class .tdw-filter-item:not(.checkbox-tdw-filter-item):not(.tdw-filter-item-option-select):hover .td_woo_label_count {
                    color: @count_txt_color_h;
                }
                /* @count_bg_color */
                .$unique_block_class .tdw-filter-item:not(.checkbox-tdw-filter-item):not(.tdw-filter-item-option-select) .td_woo_label_count {
                    background-color: @count_bg_color;
                }
                /* @count_bg_color_h */
                .$unique_block_class .tdw-filter-item:not(.checkbox-tdw-filter-item):not(.tdw-filter-item-option-select):hover .td_woo_label_count {
                    background-color: @count_bg_color_h;
                }
                /* @f_count */
                .$unique_block_class .tdw-filter-item:not(.checkbox-tdw-filter-item):not(.tdw-filter-item-option-select) .td_woo_label_count {
                    @f_count
                }
                /* @f_reset */
                .$unique_block_class .tdw-filters-clear-all-txt {
                    @f_reset
                }
                
	                
	        </style>
		";

		$td_css_res_compiler = new td_css_res_compiler( $raw_css );
		$td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

		$compiled_css .= $td_css_res_compiler->compile_css();
		return $compiled_css;
	}

	static function cssMedia( $res_ctx ) {

		/*-- GENERAL-- */
		$res_ctx->load_settings_raw( 'general_style', 1 );

		// filters_bg_color
        $res_ctx->load_color_settings( 'filters_bg', 'filters_bg_color', 'filters_bg_gradient', '', '' );
        // label space
        $label_space = $res_ctx->get_shortcode_att('label_space');
        $res_ctx->load_settings_raw( 'label_space', $label_space );
        if ( is_numeric( $label_space ) ) {
            $res_ctx->load_settings_raw( 'label_space', $label_space . 'px' );
        }
        // filters space
        $filters_space = $res_ctx->get_shortcode_att('filters_space');
        $res_ctx->load_settings_raw( 'filters_space', $filters_space );
        if ( is_numeric( $filters_space ) ) {
            $res_ctx->load_settings_raw( 'filters_space', $filters_space . 'px' );
        }
        // $filters radius
        $filters_radius = $res_ctx->get_shortcode_att('filters_radius');
        $res_ctx->load_settings_raw( 'filters_radius', $filters_radius );
        if ( is_numeric( $filters_radius ) ) {
            $res_ctx->load_settings_raw( 'filters_radius', $filters_radius . 'px' );
        }
        // filters bottom space
        $filters_bottom_space = $res_ctx->get_shortcode_att('filters_bottom_space');
        $res_ctx->load_settings_raw( 'filters_bottom_space', $filters_bottom_space );
        if ( is_numeric( $filters_bottom_space ) ) {
            $res_ctx->load_settings_raw( 'filters_bottom_space', $filters_bottom_space . 'px' );
        }
        // filters shadow
        $res_ctx->load_shadow_settings( 0, 0, 0, 0, 'rgba(0, 0, 0, .1)', 'filters_shadow' );
        // headers horizontal align
        $content_align = $res_ctx->get_shortcode_att('content_align_horizontal');
        if ( $content_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'align_center', 1 );
        } else if ( $content_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'align_right', 1 );
        } else if ( $content_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'align_left', 1 );
        }

        // filters_layout
        $filters_layout = $res_ctx->get_shortcode_att('filters_layout');
        if ( $filters_layout == 'horizontal' ) {
            $res_ctx->load_settings_raw( 'filters_horizontal', 1 );
        } else {
            $res_ctx->load_settings_raw('filters_vertical', 1);
        }
        // filters_wrap
        $filters_wrap = $res_ctx->get_shortcode_att('filters_wrap');
        if ( $filters_wrap == 'wrap' ) {
            $res_ctx->load_settings_raw( 'filters_wrap', 1 );
        } else {
            $res_ctx->load_settings_raw('filters_nowrap', 1);
        }
        // filters_horiz_align
        $filters_horiz_align = $res_ctx->get_shortcode_att('filters_horiz_align');
        $res_ctx->load_settings_raw( 'filters_horiz_align', $filters_horiz_align );

        // filters_width
        $filters_width = $res_ctx->get_shortcode_att('filters_width');
        $res_ctx->load_settings_raw( 'filters_width', $filters_width );
        if ( is_numeric( $filters_width ) ) {
            $res_ctx->load_settings_raw( 'filters_width', $filters_width . 'px' );
        }



        // reset_full
        $reset_full = $res_ctx->get_shortcode_att('reset_full');
        if( $reset_full != '' ) {
            $res_ctx->load_settings_raw('reset_full', 1);
        } else {
            $res_ctx->load_settings_raw('reset_off', 1);
        }

        // reset horizontal align
        $reset_horizontal = $res_ctx->get_shortcode_att('reset_horizontal');
        if ( $reset_horizontal == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'reset_center', 1 );
            $res_ctx->load_settings_raw( 'reset_general', 1 );
        } else if ( $reset_horizontal == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'reset_right', 1 );
            $res_ctx->load_settings_raw( 'reset_general', 1 );
        } else if ( $reset_horizontal == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'reset_left', 1 );
            $res_ctx->load_settings_raw( 'reset_general', 1 );
        }

        // reset border radius
        $reset_radius = $res_ctx->get_shortcode_att('reset_radius');
        $res_ctx->load_settings_raw( 'reset_radius', $reset_radius );
        if( $reset_radius != '' && is_numeric( $reset_radius ) ) {
            $res_ctx->load_settings_raw( 'reset_radius', $reset_radius . 'px' );
        }

        // clear all filters space
        $reset_space = $res_ctx->get_shortcode_att('reset_space');
        $res_ctx->load_settings_raw( 'reset_space', $reset_space );
        if( $reset_space != '' && is_numeric( $reset_space ) ) {
            $res_ctx->load_settings_raw( 'reset_space', $reset_space . 'px' );
        }
        // clear all filters padding
        $reset_padd = $res_ctx->get_shortcode_att('reset_padd');
        $res_ctx->load_settings_raw( 'reset_padd', $reset_padd );
        if( $reset_padd != '' && is_numeric( $reset_padd ) ) {
            $res_ctx->load_settings_raw( 'reset_padd', $reset_padd . 'px' );
        }
        // clear all filters border size
        $reset_border = $res_ctx->get_shortcode_att('reset_border');
        $res_ctx->load_settings_raw( 'reset_border', $reset_border );
        if( $reset_border != '' && is_numeric( $reset_border ) ) {
            $res_ctx->load_settings_raw( 'reset_border', $reset_border . 'px' );
        }
        // clear all filters text space
        $reset_txt_space = $res_ctx->get_shortcode_att('reset_txt_space');
        $res_ctx->load_settings_raw( 'reset_txt_space', $reset_txt_space );
        if( $reset_txt_space != '' && is_numeric( $reset_txt_space ) ) {
            $res_ctx->load_settings_raw( 'reset_txt_space', $reset_txt_space . 'px' );
        }
        // clear all filters icon size
        $reset_icon_size = $res_ctx->get_shortcode_att('reset_icon_size');
        $res_ctx->load_settings_raw( 'reset_icon_size', $reset_icon_size );
        if( $reset_icon_size != '' && is_numeric( $reset_icon_size ) ) {
            $res_ctx->load_settings_raw( 'reset_icon_size', $reset_icon_size . 'px' );
        }

        // dropdown padding
        $drop_padding = $res_ctx->get_shortcode_att('drop_padding');
        $res_ctx->load_settings_raw( 'drop_padding', $drop_padding );
        if( $drop_padding != '' && is_numeric( $drop_padding ) ) {
            $res_ctx->load_settings_raw( 'drop_padding', $drop_padding . 'px' );
        }
        // dropdown arrow size
        $drop_arrow_size = $res_ctx->get_shortcode_att('drop_arrow_size');
        $res_ctx->load_settings_raw( 'drop_arrow_size', $drop_arrow_size );
        if( $drop_arrow_size != '' && is_numeric( $drop_arrow_size ) ) {
            $res_ctx->load_settings_raw( 'drop_arrow_size', $drop_arrow_size . 'px' );
        }
        // dropdown border size
        $drop_border = $res_ctx->get_shortcode_att('drop_border');
        $res_ctx->load_settings_raw( 'drop_border', $drop_border );
        if( $drop_border != '' && is_numeric( $drop_border ) ) {
            $res_ctx->load_settings_raw( 'drop_border', $drop_border . 'px' );
        }
        // dropdown border style
        $drop_border_style = $res_ctx->get_shortcode_att('drop_border_style');
        $res_ctx->load_settings_raw( 'drop_border_style', $drop_border_style );
        if( $drop_border_style == '' ) {
            $res_ctx->load_settings_raw( 'drop_border_style', 'solid' );
        }
        // dropdown border radius
        $drop_border_radius = $res_ctx->get_shortcode_att('drop_border_radius');
        $res_ctx->load_settings_raw( 'drop_border_radius', $drop_border_radius );
        if( $drop_border_radius != '' && is_numeric( $drop_border_radius ) ) {
            $res_ctx->load_settings_raw( 'drop_border_radius', $drop_border_radius . 'px' );
        }

        // color width
        $color_size = $res_ctx->get_shortcode_att('color_size');
        $res_ctx->load_settings_raw( 'color_size', $color_size );
        if( $color_size != '' && is_numeric( $color_size ) ) {
            $res_ctx->load_settings_raw( 'color_size', $color_size . 'px' );
        }
        // color margin
        $color_margin = $res_ctx->get_shortcode_att('color_margin');
        $res_ctx->load_settings_raw( 'color_margin', $color_margin );
        if( $color_margin != '' && is_numeric( $color_margin ) ) {
            $res_ctx->load_settings_raw( 'color_margin', $color_margin . 'px' );
        }
        // color padding
        $color_padd = $res_ctx->get_shortcode_att('color_padd');
        if( $color_padd != '' && is_numeric( $color_padd ) ) {
            $res_ctx->load_settings_raw( 'color_padd', $color_padd . 'px' );
        }
        // color border size
        $all_color_border = $res_ctx->get_shortcode_att('all_color_border');
        if( $all_color_border != '' ) {
            if ( is_numeric( $all_color_border ) ) {
                $res_ctx->load_settings_raw( 'all_color_border', $all_color_border . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'all_color_border', '1px' );
        }
        // selected color border size
        $all_color_border_s = $res_ctx->get_shortcode_att('all_color_border_s');
        if( $all_color_border_s != '' ) {
            if( is_numeric( $all_color_border_s ) ) {
                $res_ctx->load_settings_raw( 'all_color_border_s', $all_color_border_s . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'all_color_border_s', '2px' );
        }
        // color border radius
        $color_radius = $res_ctx->get_shortcode_att('color_radius');
        $res_ctx->load_settings_raw( 'color_radius', $color_radius );
        if( $color_radius != '' && is_numeric( $color_radius ) ) {
            $res_ctx->load_settings_raw( 'color_radius', $color_radius . 'px' );
        }

        // button switch width
        $but_size = $res_ctx->get_shortcode_att('but_size');
        $res_ctx->load_settings_raw( 'but_size', $but_size );
        if( $but_size != '' && is_numeric( $but_size ) ) {
            $res_ctx->load_settings_raw( 'but_size', $but_size . 'px' );
        }
        // button switch margin
        $but_margin = $res_ctx->get_shortcode_att('but_margin');
        $res_ctx->load_settings_raw( 'but_margin', $but_margin );
        if( $but_margin != '' && is_numeric( $but_margin ) ) {
            $res_ctx->load_settings_raw( 'but_margin', $but_margin . 'px' );
        }
        // button switch padding
        $but_padd = $res_ctx->get_shortcode_att('but_padd');
        $res_ctx->load_settings_raw( 'but_padd', $but_padd );
        if( $but_padd != '' && is_numeric( $but_padd ) ) {
            $res_ctx->load_settings_raw( 'but_padd', $but_padd . 'px' );
        }
        // button switch border size
        $all_but_border = $res_ctx->get_shortcode_att('all_but_border');
        if( $all_but_border != '' ) {
            if( is_numeric( $all_but_border ) ) {
                $res_ctx->load_settings_raw( 'all_but_border', $all_but_border . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'all_but_border', '1px' );
        }
        // selected button switch border size
        $all_but_border_s = $res_ctx->get_shortcode_att('all_but_border_s');
        if( $all_but_border_s != '' ) {
            if( is_numeric( $all_but_border_s ) ) {
                $res_ctx->load_settings_raw( 'all_but_border_s', $all_but_border_s . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'all_but_border_s', '2px' );
        }
        // button switch border radius
        $but_radius = $res_ctx->get_shortcode_att('but_radius');
        $res_ctx->load_settings_raw( 'but_radius', $but_radius );
        if( $but_radius != '' && is_numeric( $but_radius ) ) {
            $res_ctx->load_settings_raw( 'but_radius', $but_radius . 'px' );
        }

        // checkbox size
        $check_size = $res_ctx->get_shortcode_att('check_size');
        $res_ctx->load_settings_raw( 'check_size', $check_size );
        if( $check_size != '' && is_numeric( $check_size ) ) {
            $res_ctx->load_settings_raw( 'check_size', $check_size . 'px' );
        }
        // checkbox space
        $check_space = $res_ctx->get_shortcode_att('check_space');
        $res_ctx->load_settings_raw( 'check_space', $check_space );
        if( $check_space != '' && is_numeric( $check_space ) ) {
            $res_ctx->load_settings_raw( 'check_space', $check_space . 'px' );
        }
        // checkbox border size
        $all_check_border = $res_ctx->get_shortcode_att('all_check_border');
        if( $all_check_border != '' ) {
            if( is_numeric( $all_check_border ) ) {
                $res_ctx->load_settings_raw( 'all_check_border', $all_check_border . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'all_check_border', '1px' );
        }
        // selected checkbox size
        $check_size_s = $res_ctx->get_shortcode_att('all_check_border_s');
        $res_ctx->load_settings_raw( 'all_check_border_s', $check_size_s );
        if( $check_size_s != '' && is_numeric( $check_size_s ) ) {
            $res_ctx->load_settings_raw( 'all_check_border_s', $check_size_s . 'px' );
        }
        // checkbox border radius
        $check_radius = $res_ctx->get_shortcode_att('check_radius');
        $res_ctx->load_settings_raw( 'check_radius', $check_radius );
        if( $check_radius != '' && is_numeric( $check_radius ) ) {
            $res_ctx->load_settings_raw( 'check_radius', $check_radius . 'px' );
        }

        // image display
        $img_display = $res_ctx->get_shortcode_att('img_display');
        if( $img_display == 'img_txt' ) {
            $res_ctx->load_settings_raw( 'img_display_txt', 1 );
        }
        // image margin
        $img_margin = $res_ctx->get_shortcode_att('img_margin');
        $res_ctx->load_settings_raw( 'img_margin', $img_margin );
        if( $img_margin != '' && is_numeric( $img_margin ) ) {
            $res_ctx->load_settings_raw( 'img_margin', $img_margin . 'px' );
        }
        // image width
        $img_size = $res_ctx->get_shortcode_att('img_size');
        $res_ctx->load_settings_raw( 'img_size', $img_size );
        if( $img_size != '' && is_numeric( $img_size ) ) {
            $res_ctx->load_settings_raw( 'img_size', $img_size . 'px' );
        }
        // image text space
        $img_txt_space = $res_ctx->get_shortcode_att('img_txt_space');
        $res_ctx->load_settings_raw( 'img_txt_space', $img_txt_space );
        if( $img_txt_space != '' && is_numeric( $img_txt_space ) ) {
            $res_ctx->load_settings_raw( 'img_txt_space', $img_txt_space . 'px' );
        }
        // image padding
        $img_padd = $res_ctx->get_shortcode_att('img_padd');
        if( $img_padd != '' && is_numeric( $img_padd ) ) {
            $res_ctx->load_settings_raw( 'img_padd', $img_padd . 'px' );
        }
        // image border size
        $all_img_border = $res_ctx->get_shortcode_att('all_img_border');
        if( $all_img_border != '' ) {
            if ( is_numeric( $all_img_border ) ) {
                $res_ctx->load_settings_raw( 'all_img_border', $all_img_border . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'all_img_border', '1px' );
        }
        // selected image border size
        $all_img_border_s = $res_ctx->get_shortcode_att('all_img_border_s');
        if( $all_img_border_s != '' ) {
            if( is_numeric( $all_img_border_s ) ) {
                $res_ctx->load_settings_raw( 'all_img_border_s', $all_img_border_s . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'all_img_border_s', '2px' );
        }
        // image border radius
        $img_radius = $res_ctx->get_shortcode_att('img_radius');
        $res_ctx->load_settings_raw( 'img_radius', $img_radius );
        if( $img_radius != '' && is_numeric( $img_radius ) ) {
            $res_ctx->load_settings_raw( 'img_radius', $img_radius . 'px' );
        }



        /*-- COLORS -- */
        $res_ctx->load_settings_raw( 'reset_bg', $res_ctx->get_shortcode_att('reset_bg') );
        $res_ctx->load_settings_raw( 'reset_bg_h', $res_ctx->get_shortcode_att('reset_bg_h') );
        $res_ctx->load_settings_raw( 'reset_border_color', $res_ctx->get_shortcode_att('reset_border_color') );
        $res_ctx->load_settings_raw( 'reset_border_color_h', $res_ctx->get_shortcode_att('reset_border_color_h') );
        $res_ctx->load_settings_raw( 'reset_color', $res_ctx->get_shortcode_att('reset_color') );
        $res_ctx->load_settings_raw( 'reset_color_h', $res_ctx->get_shortcode_att('reset_color_h') );
        $res_ctx->load_settings_raw( 'reset_icon_color', $res_ctx->get_shortcode_att('reset_icon_color') );
        $res_ctx->load_settings_raw( 'reset_icon_color_h', $res_ctx->get_shortcode_att('reset_icon_color_h') );

        $res_ctx->load_settings_raw( 'drop_color', $res_ctx->get_shortcode_att('drop_color') );
        $res_ctx->load_settings_raw( 'drop_arrow_color', $res_ctx->get_shortcode_att('drop_arrow_color') );
        $res_ctx->load_settings_raw( 'drop_bg_color', $res_ctx->get_shortcode_att('drop_bg_color') );
        $res_ctx->load_settings_raw( 'drop_bg_color_f', $res_ctx->get_shortcode_att('drop_bg_color_f') );
        $res_ctx->load_settings_raw( 'drop_border_color', $res_ctx->get_shortcode_att('drop_border_color') );
        $res_ctx->load_settings_raw( 'drop_border_color_f', $res_ctx->get_shortcode_att('drop_border_color_f') );

        $res_ctx->load_settings_raw( 'color_bg', $res_ctx->get_shortcode_att('color_bg') );
        $res_ctx->load_settings_raw( 'color_bg_s', $res_ctx->get_shortcode_att('color_bg_s') );
        $all_color_border_c = $res_ctx->get_shortcode_att('all_color_border_c');
        if( $all_color_border_c != '' ) {
            $res_ctx->load_settings_raw( 'all_color_border_c', $all_color_border_c );
        } else {
            $res_ctx->load_settings_raw( 'all_color_border_c', '#dfdfdf' );
        }
        $all_color_border_c_s = $res_ctx->get_shortcode_att('all_color_border_c_s');
        if( $all_color_border_c_s != '' ) {
            $res_ctx->load_settings_raw( 'all_color_border_c_s', $all_color_border_c_s );
        } else {
            $res_ctx->load_settings_raw( 'all_color_border_c_s', '#444' );
        }

        $res_ctx->load_settings_raw( 'but_txt', $res_ctx->get_shortcode_att('but_txt') );
        $res_ctx->load_settings_raw( 'but_txt_s', $res_ctx->get_shortcode_att('but_txt_s') );
        $res_ctx->load_settings_raw( 'but_bg', $res_ctx->get_shortcode_att('but_bg') );
        $res_ctx->load_settings_raw( 'but_bg_s', $res_ctx->get_shortcode_att('but_bg_s') );
        $all_but_border_c = $res_ctx->get_shortcode_att('all_but_border_c');
        if( $all_but_border_c != '' ) {
            $res_ctx->load_settings_raw( 'all_but_border_c', $all_but_border_c );
        } else {
            $res_ctx->load_settings_raw( 'all_but_border_c', '#dfdfdf' );
        }
        $all_but_border_c_s = $res_ctx->get_shortcode_att('all_but_border_c_s');
        if( $all_but_border_c_s != '' ) {
            $res_ctx->load_settings_raw( 'all_but_border_c_s', $all_but_border_c_s );
        } else {
            $res_ctx->load_settings_raw( 'all_but_border_c_s', '#444' );
        }

        $res_ctx->load_settings_raw( 'dot_size', $res_ctx->get_shortcode_att('dot_size') . 'px' );

        $res_ctx->load_settings_raw( 'check_bg', $res_ctx->get_shortcode_att('check_bg') );
        $res_ctx->load_settings_raw( 'check_bg_s', $res_ctx->get_shortcode_att('check_bg_s') );
        $all_check_border_color = $res_ctx->get_shortcode_att('all_check_border_color');
        if( $all_check_border_color != '' ) {
            $res_ctx->load_settings_raw( 'all_check_border_color', $all_check_border_color );
        } else {
            $res_ctx->load_settings_raw( 'all_check_border_color', '#ccc' );
        }
        $res_ctx->load_settings_raw( 'all_check_border_color_s', $res_ctx->get_shortcode_att('all_check_border_color_s') );
        $res_ctx->load_settings_raw( 'check_square', $res_ctx->get_shortcode_att('check_square') );
        $res_ctx->load_settings_raw( 'check_label_color', $res_ctx->get_shortcode_att('check_label_color') );
        $res_ctx->load_settings_raw( 'check_label_color_h', $res_ctx->get_shortcode_att('check_label_color_h') );
        $res_ctx->load_settings_raw( 'check_label_color_s', $res_ctx->get_shortcode_att('check_label_color_s') );

        $res_ctx->load_settings_raw( 'img_bg', $res_ctx->get_shortcode_att('img_bg') );
        $res_ctx->load_settings_raw( 'img_bg_s', $res_ctx->get_shortcode_att('img_bg_s') );
        $all_img_border_c = $res_ctx->get_shortcode_att('all_img_border_c');
        if( $all_img_border_c != '' ) {
            $res_ctx->load_settings_raw( 'all_img_border_c', $all_img_border_c );
        } else {
            $res_ctx->load_settings_raw( 'all_img_border_c', '#dfdfdf' );
        }
        $all_img_border_c_s = $res_ctx->get_shortcode_att('all_img_border_c_s');
        if( $all_img_border_c_s != '' ) {
            $res_ctx->load_settings_raw( 'all_img_border_c_s', $all_img_border_c_s );
        } else {
            $res_ctx->load_settings_raw( 'all_img_border_c_s', '#444' );
        }
        $res_ctx->load_settings_raw( 'img_txt_color', $res_ctx->get_shortcode_att('img_txt_color') );
        $res_ctx->load_settings_raw( 'img_txt_color_s', $res_ctx->get_shortcode_att('img_txt_color_s') );


        // Mobile filters buton
        $res_ctx->load_settings_raw( 'fmob_color', $res_ctx->get_shortcode_att('fmob_color') );
        $res_ctx->load_shadow_settings( 8, 2, 3, 0, 'rgba(0, 0, 0, 0.18)', 'fmob_shadow' );



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_label' );
        $res_ctx->load_font_settings( 'f_drop' );
        $res_ctx->load_font_settings( 'f_but' );
        $res_ctx->load_font_settings( 'f_check' );
        $res_ctx->load_font_settings( 'f_check_s' );
        $res_ctx->load_font_settings( 'f_img' );


        // count terms
        $count_padd = $res_ctx->get_shortcode_att('count_padd');
        $res_ctx->load_settings_raw( 'count_padd', $count_padd );
        if( $count_padd != '' && is_numeric( $count_padd ) ) {
            $res_ctx->load_settings_raw( 'count_padd', $count_padd . 'px' );
        }

        $res_ctx->load_settings_raw('count_horiz', $res_ctx->get_shortcode_att('count_horiz') . 'px');
        $res_ctx->load_settings_raw('count_vert', $res_ctx->get_shortcode_att('count_vert') . 'px');

        $count_radius = $res_ctx->get_shortcode_att('count_radius');
        $res_ctx->load_settings_raw( 'count_radius', $count_radius );
        if( $count_radius != '' && is_numeric( $count_radius ) ) {
            $res_ctx->load_settings_raw( 'count_radius', $count_radius . 'px' );
        }
        $res_ctx->load_settings_raw( 'count_txt_color', $res_ctx->get_shortcode_att('count_txt_color') );
        $res_ctx->load_settings_raw( 'count_txt_color_h', $res_ctx->get_shortcode_att('count_txt_color_h') );
        $res_ctx->load_settings_raw( 'count_bg_color', $res_ctx->get_shortcode_att('count_bg_color') );
        $res_ctx->load_settings_raw( 'count_bg_color_h', $res_ctx->get_shortcode_att('count_bg_color_h') );
        $res_ctx->load_font_settings( 'f_count' );
        $res_ctx->load_font_settings( 'f_reset' );

	}

	function __construct() {
		parent::disable_loop_block_features();

		// set template type
		$this->tdw_template_type = tdb_state_template::get_template_type();
	}

	/**
	 * @param $atts
	 * @param null $content
	 *
	 * @return string
	 */
	function render($atts, $content = null) {

	    // set template type
	    $this->tdw_template_type = tdb_state_template::get_template_type();

	    // shortcode attributes
		$shortcode_atts = implode(' ', array_map(
			function ($v, $k) { return sprintf('%s="%s"', $k, $v); },
			$atts,
			array_keys($atts)
		));
		$this->shortcode_atts = $shortcode_atts;

		global $td_woo_state_single_product_page, $td_woo_state_archive_product_page, $td_woo_state_search_archive_product_page, $td_woo_state_shop_base_page;

		switch( $this->tdw_template_type ) {

			case 'woo_product':
				$filters_data = $td_woo_state_single_product_page->filters->__invoke( $atts );
				// set template data id
				$this->tdw_template_data_id = ( $filters_data['current_queried_obj'] instanceof WC_Product ) ? $filters_data['current_queried_obj']->get_id() : false;
				// set state has_wp_query flag
				$td_woo_state_has_wp_query = $td_woo_state_single_product_page->has_wp_query();
				break;

			case 'woo_archive':
				$filters_data = $td_woo_state_archive_product_page->filters->__invoke( $atts );
				// set template data id
				$this->tdw_template_data_id = $filters_data['current_queried_obj'] ? $filters_data['current_queried_obj']->term_id : false;
				// set state has_wp_query flag
				$td_woo_state_has_wp_query = $td_woo_state_archive_product_page->has_wp_query();
				break;

			case 'woo_search_archive':
				$filters_data = $td_woo_state_search_archive_product_page->filters->__invoke( $atts );
				// set template data id
				$this->tdw_template_data_id = $filters_data['search_query'];
				// set state has_wp_query flag
				$td_woo_state_has_wp_query = $td_woo_state_search_archive_product_page->has_wp_query();
				break;

			case 'woo_shop_base':
				$filters_data = $td_woo_state_shop_base_page->filters->__invoke( $atts );
				// set template data id
				$this->tdw_template_data_id = ''; // no template data id for woo_shop_base templates
				// set state has_wp_query flag
				$td_woo_state_has_wp_query = $td_woo_state_shop_base_page->has_wp_query();
				break;

            default:
                $filters_data = array(
	                'taxonomies' => array(),
	                'selected' => array()
                );
	            $td_woo_state_has_wp_query = false;

		}

		$atts['custom_title'] = 'Title'; // to generate the style css - the title is overwritten by title attributes

		parent::render($atts);

        $hide_headers = $this->get_att('hide_headers');

		// block template id header
        if( $this->get_att('block_template_id') != '' ) {
            $global_block_template_id = $this->get_att('block_template_id');
        } else {
            $global_block_template_id = td_options::get( 'tds_global_block_template', 'td_block_template_1' );
        }
        $td_css_cls_block_title = 'td-block-title';

        if ( $global_block_template_id === 'td_block_template_1' ) {
            $td_css_cls_block_title = 'block-title';
        }

		// load type att: '' or 'ajax'
		$load_type = $this->get_att('load_type');
		if ( $load_type === 'ajax' ) {
			$data_atts = ' data-tdw-filter-load-type="ajax"';
        } else {
			$data_atts = ' data-tdw-filter-load-type="page_load"';
        }

        // show terms count ( this will show the available results for terms(filters) )
		$show_count = $this->get_att('show_count');

        // hide empty terms ( this will not show filters with 0 count )
		$hide_empty = $this->get_att('hide_empty');

		// show reset button in composer
        $reset_show = $this->get_att('reset_show');

		// clear all filters text
        $clear_all_filters_txt = $this->get_att('reset_txt');

        // clear all filters icon
        $clear_all_filters_icon = $this->get_icon_att('reset_tdicon');
        $clear_all_filters_icon_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $clear_all_filters_icon_data = 'data-td-svg-icon="' . $this->get_att('reset_tdicon') . '"';
        }
        $clear_all_filters_icon_html = '';
        if( $clear_all_filters_icon != '' ) {
            if( base64_encode( base64_decode( $clear_all_filters_icon ) ) == $clear_all_filters_icon ) {
                $clear_all_filters_icon_html = '<span class="tdw-filters-clear-all-icon tdw-filters-clear-all-icon-svg" ' . $clear_all_filters_icon_data . '>' . base64_decode( $clear_all_filters_icon ) . '</span>';
            } else {
                $clear_all_filters_icon_html = '<i class="tdw-filters-clear-all-icon ' . $clear_all_filters_icon . '"></i>';
            }
        }

		$buffy = '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . $data_atts . '>';

			// get the block css
			$buffy .= $this->get_block_css();

			// get the js for this block
			$buffy .= $this->get_block_js();

			// block inner html
			$buffy .= '<div id=' . $this->block_uid . ' class="tdw-block-inner td-fix-index">';

				// filter block js
				$buffy .= $this->inner( $shortcode_atts, $td_woo_state_has_wp_query );

                // is tdc (in composer or composer block update request ) ... we have to check here if it's a td composer job because the tdc_state::is_live_editor_ajax() check also returns `true` when performing a filter block update via ajax...
                $is_tdc = ( tdc_state::is_live_editor_iframe() || ( tdc_state::is_live_editor_ajax() && td_woo_util::get_get_val('tmp_jobId') !== false ) );

				// clear all button
		        $selected_filters = $this->get_active_filters( $filters_data ); // this excludes the current queried term from filters
                if ( array_filter( $selected_filters ) || ( $is_tdc && $reset_show != '' ) ) {
                    $buffy .= '<div class="tdw-filter-container tdw-clear-all-filters-wrap">';
                        $buffy .= '<a class="tdw-filters-clear-all" href="">';
                            if( $clear_all_filters_txt != '' ) {
                                $buffy .= '<span class="tdw-filters-clear-all-txt">' . $clear_all_filters_txt . '</span>';
                            }
                            $buffy .= $clear_all_filters_icon_html;
                        $buffy .= '</a>';
                    $buffy .= '</div>';
                }

                // prefix all active/selected filters with 'tdw_' .. used later to build output for filters set as link
		        if ( array_filter( $selected_filters ) ) {
			        $selected_filters = array_combine(
                        array_map( function($k) { return 'tdw_' . $k; },
                        array_keys( $selected_filters ) ), $selected_filters
                    );
                }

                $buffy .= '<div class="tdw-filters-wrap">';

                    // run through filters taxonomies to build filters output buffer
                    foreach ( $filters_data['taxonomies'] as $taxonomy ) {

                        $tax_name = $taxonomy->attribute_name ?? ( $taxonomy->name ?? '' );
                        $tax_label = $taxonomy->attribute_label ?? ( $taxonomy->label ?? '' );
                        $tax = $taxonomy->taxonomy;

                        $terms = $taxonomy->terms;
                        $type = $taxonomy->attribute_type ?? '';
                        $as_link = isset( $taxonomy->as_link ); // set as link ... used for product_cat taxonomies to set terms filters as links

                        $selected_terms = explode( ',', $taxonomy->selected );
                        $selected_terms_array = !empty( array_filter( $selected_terms ) ) ? $selected_terms : array();

                        // set active filters
                        $exclude_current = ( $tax === 'product_cat' ) || ( !empty( $selected_filters['tdw_product_cat'] ) ); // exclude current term for product cat tax
                        $active_filters = $this->get_active_filters( $filters_data, $exclude_current );

                        $data = '';

                        // run through taxonomy terms to build terms(filters) output buffer
                        foreach ( $terms as $term ) {

                            // is selected
	                        $is_selected = in_array( apply_filters( 'editable_slug', $term->slug, $term ), $selected_terms_array );
                            $selected_class = $is_selected ? 'selected' : '';

                            // on tdc..
                            if ( $is_tdc ) {
                                $selected_class = '';
                                $is_selected = false;
                            }

                            // show count
                            $show_filter_count = ( $show_count === 'yes' );

                            // hide empty ( count = 0 )
                            $hide_empty_terms = ( $hide_empty === 'yes' );

                            // count
                            $term_count = false;
                            if ( ! $is_tdc && ! $is_selected ) { // don't count selected terms or on composer requests
                                $term_count = $this->filter_label_count( $term, $active_filters );
                            }

                            // hide empty terms
                            $hide = ( $hide_empty_terms && $term_count === 0 );
                            if ( $hide ) {
                                continue;
                            }

                            // for select type we build <select> so we have <option> tags
                            if ( $type === 'select' ) {
                                $selected = in_array( $term->slug, $selected_terms_array ) ? 'selected="selected"' : '';
                                $data_link = ($as_link) ? 'data-filter-link="' . esc_url( $this->filter_link( $term, array_filter( $selected_filters ) ) ) . '"' : ''; // link data for 'product_cat' taxonomy when 'product categories filter type' option is set on single selection
                                $data .= sprintf(
                                    '<option class="tdw-filter-item-option tdw-filter-item-option-%s" value="%s" data-term-name="%s" %s %s >' . esc_html( $term->name ),
                                    esc_attr( $type ),
                                    esc_attr( $term->slug ),
                                    esc_html( $term->name ),
                                    $data_link,
                                    $selected
                                );
                                if ( $is_tdc && $show_filter_count ) {
                                    $data .= ' (' . rand( 5, 15 ) . ')'; // generate a random count on composer
                                } elseif ( !$is_tdc && empty( $selected ) && $show_filter_count ) {
                                    $data .= ' (' . $term_count . ')'; // count
                                }
                            } elseif ( $type === 'multi-select' ) {
                                $data .= '<li class="multi-select-option ' . $selected_class . '" data-term-slug="' . $term->slug . '" data-term-id="' . $term->term_id . '" data-term-name="' . $term->name . '">';
                                $data .= '<span class="filter-icon"></span><span class="">'  .esc_html( $term->name ) . '</span>';
                                if ( $is_tdc && $show_filter_count ) {
                                    $data .= ' (' . rand( 5, 15 ) . ')'; // generate a random count on composer
                                } elseif ( !$is_tdc && empty( $selected_class ) && $show_filter_count ) {
                                    $data .= ' (' . $term_count . ')'; // count
                                }
                                $data .= '</li>';
                            } else { // for the rest of types we build lists
                                $data .= sprintf(
                                        '<li 
                                        class="tdw-filter-item %1$s-tdw-filter-item %1$s-tdw-filter-item-%3$s %2$s %6$s" 
                                        title="%4$s" 
                                        data-term-slug="%3$s" 
                                        data-term-id="%5$d" 
                                        data-term-name="%4$s" 
                                    >',
                                        ( !empty( $type ) ) ? esc_attr( $type ) : 'button', // taxonomies without a type.. default to button.. @todo
                                        esc_attr( $selected_class ),
                                        esc_attr( $term->slug ),
                                        esc_html( $term->name ),
                                        esc_attr( $term->term_id ),
                                        esc_attr( ( $as_link ) ? 'tdw-filter-link' : '' )
                                    );
                            }

                            // filter type terms items html ... <li> tags for color/button/image & default types / <option> tags for select(dropdown) type
                            switch ( $type ) {
                                case 'image':

                                    // add count label
                                    if ( $is_tdc && $show_filter_count ) {
                                        $data .= '<span class="td_woo_label_count"> ' . rand( 5, 15 ) . '</span>'; // generate a random count label on composer
                                    } elseif ( !$is_tdc && !$is_selected && $show_filter_count ) {
                                        $data .= '<span class="td_woo_label_count">' . $term_count . '</span>'; // count label
                                    }

                                    // get image
	                                $term_meta_img_attachment_id = get_term_meta( $term->term_id, 'product_attribute_image', true );
                                    $image = array();

                                    if ( !empty( $term_meta_img_attachment_id ) ) {
	                                    $image = wp_get_attachment_image_src( $term_meta_img_attachment_id );
                                    }

                                    if ( empty( $image ) ) {
	                                    $image = array(
		                                    $this->get_placeholder_img_src(), // img src
		                                    '66', // img width
		                                    '66' // img height
	                                    );
                                    }

	                                // check if it's set as link
	                                if ( $as_link ) {
		                                $data .= sprintf( '<a href="%1$s">%2$s</a>',
			                                esc_url( $this->filter_link( $term, array_filter( $selected_filters ) ) ),
			                                sprintf( '<img aria-hidden="true" alt="%s" src="%s" width="%d" height="%d" />', esc_attr( $term->name ), esc_url( $image[0] ), $image[1], $image[2] )
		                                );
	                                } else {
		                                $data .= sprintf( '<img aria-hidden="true" alt="%s" src="%s" width="%d" height="%d" />', esc_attr( $term->name ), esc_url( $image[0] ), $image[1], $image[2] );
	                                }

                                    // display option name
                                    if( $this->get_att('img_display') == 'img_txt' ) {
                                        $data .= sprintf( '<span class="tdw-img-attr-label">%s</span>', esc_attr( $term->name ) );
                                    }

                                    $data .= '</li>';
                                    break;
                                case 'color':
                                    $term_meta_color = get_term_meta( $term->term_id, 'product_attribute_color', true );
                                    $term_meta_img_attachment_id = get_term_meta( $term->term_id, 'product_attribute_color_image', true );

                                    // add count label
                                    if ( $is_tdc && $show_filter_count ) {
                                        $data .= '<span class="td_woo_label_count"> ' . rand( 5, 15 ) . '</span>'; // generate a random count label on composer
                                    } elseif ( !$is_tdc && !$is_selected && $show_filter_count ) {
                                        $data .= '<span class="td_woo_label_count">' . $term_count . '</span>'; // count label
                                    }

                                    // if we don't have a color set ..check for an image ( we may have a gradient/multicolored image set.. used for multicolored products )
                                    if ( empty( $term_meta_color ) && ! empty( $term_meta_img_attachment_id ) ) {
                                        $image = wp_get_attachment_image_src( $term_meta_img_attachment_id );

                                        // check if it's set as link ...
                                        if ( $as_link ) {
                                            $data .= sprintf( '<a href="%1$s">%2$s</a>',
                                                esc_url( $this->filter_link( $term, array_filter( $selected_filters ) ) ),
                                                sprintf( '<img aria-hidden="true" alt="%s" src="%s" width="%d" height="%d" />', esc_attr( $term->name ), esc_url( $image[0] ), $image[1], $image[2] )
                                            );
                                        } else {
                                            $data .= sprintf( '<img aria-hidden="true" alt="%s" src="%s" width="%d" height="%d" />', esc_attr( $term->name ), esc_url( $image[0] ), $image[1], $image[2] );
                                        }

                                    } else {
                                        $sanitized_hex_color = $term_meta_color;
                                        $color = !empty( $sanitized_hex_color ) ? $sanitized_hex_color : '#000';

                                        // check if it's set as link
                                        if ( $as_link ) {
                                            $data .= sprintf( '<a href="%1$s">%2$s</a>',
                                                esc_url( $this->filter_link( $term, array_filter( $selected_filters ) ) ),
                                                sprintf( '<span class="tdw-filter-item-span tdw-filter-item-span-%s" style="background-color:%s;"></span>', esc_attr( $type ), esc_attr( $color ) )
                                            );
                                        } else {
                                            $data .= sprintf( '<span class="tdw-filter-item-span tdw-filter-item-span-%s" style="background-color:%s;"></span>', esc_attr( $type ), esc_attr( $color ) );
                                        }
                                    }
                                    $data .= '</li>';
                                    break;
                                case 'button':
                                    // add count label
                                    if ( $is_tdc && $show_filter_count ) {
                                        $data .= '<span class="td_woo_label_count"> ' . rand( 5, 15 ) . '</span>'; // generate a random count label on composer
                                    } elseif ( !$is_tdc && !$is_selected && $show_filter_count ) {
                                        $data .= '<span class="td_woo_label_count">' . $term_count . '</span>'; // count label
                                    }
                                    // check if it's set as link
                                    if ( $as_link ) {
                                        $data .= sprintf( '<a href="%1$s">%2$s</a>', esc_url( $this->filter_link( $term, array_filter( $selected_filters ) ) ), sprintf(
                                                    '<span class="tdw-filter-item-span tdw-filter-item-span-%s">%s</span>',
                                                    esc_attr( $type ),
                                                    esc_html( $term->name )
                                                ) );
                                    } else {
                                        $data .= sprintf(
                                            '<span class="tdw-filter-item-span tdw-filter-item-span-%s">%s</span>',
                                            esc_attr( $type ),
                                            esc_html( $term->name )
                                        );
                                    }
                                    $data .= '</li>';
                                    break;
                                case 'checkbox':
                                    // check if it's set as link
                                    if ( $as_link ) {
                                        $data .= sprintf( '<a href="%1$s">%2$s</a>', esc_url( $this->filter_link( $term, array_filter( $selected_filters ) ) ), sprintf(
                                            '<span class="filter-icon"></span><span class="tdw-filter-item-span tdw-filter-item-span-%s">%s</span>',
                                            esc_attr( $type ),
                                            esc_html( $term->name )
                                        ) );
                                    } else {
                                        $data .= sprintf(
                                            '<span class="filter-icon"></span><span class="tdw-filter-item-span tdw-filter-item-span-%s">%s</span>',
                                            esc_attr( $type ),
                                            esc_html( $term->name )
                                        );
                                    }
                                    // add count label
                                    if ( $is_tdc && $show_filter_count ) {
                                        $data .= '<span class="td_woo_label_count"> (' . rand( 5, 15 ) . ')</span>'; // generate a random count label on composer
                                    } elseif ( !$is_tdc && !$is_selected && $show_filter_count ) {
                                        $data .= '<span class="td_woo_label_count"> (' . $term_count . ')</span>'; // count label
                                    }
                                    $data .= '</li>';
                                    break;
                                case 'select':
                                $data .= '</option>';
                                    break;
                                case 'multi-select':
                                    break;

                                // @todo taxonomies without a type.. default to button styles.. for now..
                                default:
                                    // add count label
                                    if ( $is_tdc && $show_filter_count ) {
                                        $data .= '<span class="td_woo_label_count"> ' . rand( 5, 15 ) . '</span>'; // generate a random count label on composer
                                    } elseif ( !$is_tdc && !$is_selected && $show_filter_count ) {
                                        $data .= '<span class="td_woo_label_count">' . $term_count . '</span>'; // count label
                                    }
                                    // check if it's set as link
                                    if ( $as_link ) {
                                        $data .= sprintf( '<a href="%1$s">%2$s</a>', esc_url( $this->filter_link( $term, array_filter( $selected_filters ) ) ), sprintf(
                                            '<span class="tdw-filter-item-span tdw-filter-item-span-button">%s</span>',
                                            esc_html( $term->name )
                                        ) );
                                    } else {
                                        $data .= sprintf(
                                            '<span class="tdw-filter-item-span tdw-filter-item-span-button">%s</span>',
                                            esc_html( $term->name )
                                        );
                                    }
                                    $data .= '</li>';
                                break;
                            }

                        }

                        // set no filters class
                        $no_filters = empty($data) ? 'tdw-no-filters ' : '';

                        $buffy .= '<div class="tdw-filter-container tdw-filter-' . $tax_name . ' ' . $no_filters . '" >';

                        // type debug
	                    //$buffy .= '<div style="color: orangered; font-weight: bold;">' . $type . '</div>';

                            // add title
                            if( $hide_headers == '' ) {
                                $buffy .= '<div class="td-block-title-wrap">';
                                    $buffy .= '<h4 class="tdw-filter-title ' .  $td_css_cls_block_title . '">';
                                        $buffy .= '<span>' . $tax_label . '</span>';
                                    $buffy .= '</h4>';
                                $buffy .= '</div>';
                            }

                            // filter type wrapper html .. <ul> list for color/button & default types / <select> for select(dropdown) type
                            switch ( $type ) {
                                case 'color':
                                case 'button':
                                case 'checkbox':
                                default:
                                    $buffy .= sprintf(
                                        '<ul class="tdw-filter-items-wrapper %1$s" data-taxonomy="tdw_%2$s">%3$s</ul>',
                                        trim( implode( ' ', array( "{$type}-list-wrapper" ) ) ),
                                        $tax,
                                        $data
                                    );
                                break;
                                case 'multi-select':
                                    $buffy .= '<div class="tdw-multi-select-wrapper">';
                                    if ( $is_tdc ) {
                                        $buffy .= '<div class="multi-select open">';
                                            $buffy .= '<div class="multi-select__selection">';
                                                $buffy .= '<span>selected sample</span>';
                                            $buffy .= '</div>';
                                            $buffy .= '<ul class="multi-select-options" style="position: static;">';
                                                $buffy .= '<li class="multi-select-option selected">';
                                                $buffy .= '<span class="filter-icon"></span><span class="">selected sample</span>';
                                                if ( $show_filter_count ) { $buffy .= ' (' . rand( 5, 15 ) . ')'; } // generate a random count
                                                $buffy .= '</li>';
                                                $buffy .= '<li class="multi-select-option">';
                                                $buffy .= '<span class="filter-icon"></span><span class="">unselected sample</span>';
                                                if ( $show_filter_count ) { $buffy .= ' (' . rand( 5, 15 ) . ')'; } // generate a random count
                                                $buffy .= '</li>';
                                            $buffy .= '</ul>';
                                        $buffy .= '</div>';
                                    } else {
                                        $buffy .= '<div class="multi-select">';
                                            $buffy .= '<div class="multi-select__selection">';
                                                $buffy .= empty( array_intersect( array_map( function ($el) { return $el->slug; }, $terms ), $selected_terms_array ) ) ? '<span class="no-selection">No selection</span>' : '';
                                            $buffy .= '</div>';
                                            $buffy .= '<ul class="multi-select-options" data-taxonomy="tdw_product_cat">';
                                                $buffy .= $data;
                                            $buffy .= '</ul>';
                                        $buffy .= '</div>';
                                    }

                                    $buffy .= '</div>';
                                break;
                                case 'select':
                                    $buffy .= '<div class="tdw-filter-dropdown-inner">';
                                        $buffy .= sprintf(
                                            '<select id="%2$s" class="tdw-filter-items-wrapper %1$s" name="%2$s" data-taxonomy="tdw_%3$s">%4$s%5$s</select>',
                                            trim( implode( ' ', array( "{$type}-filter-type", "{$type}-wrapper" ) ) ),
                                            esc_attr( wc_variation_attribute_name( $tax_name ) ),
                                            $tax,
                                            empty( $selected_terms_array ) ? '<option class="" value="" selected="selected">No ' . $tax_label . '</option>' : '<option class="" value="">No ' . $tax_label . '</option>',
                                            $data
                                        );
                                    $buffy .= '</div>';
                                break;
                            }

                        $buffy .= '</div>';

                    }

			    $buffy .= '</div>';

			$buffy .= '</div>';

		$buffy .= '</div>';

		return $buffy;

	}

	/*
	 * block inner: renders block js & block layout
	 *
	 * @param $shortcode_atts - the td woo attribute filter shortcode attributes
	 * @param $td_woo_state_has_wp_query - flag used to check if running on page template with sample data
	 *
	 * @return string
	 */
	function inner( $shortcode_atts, $td_woo_state_has_wp_query ) {

		$buffy = '';

		// set load type
		$load_type = $this->get_att('load_type');
		if ( empty( $load_type ) ) {
			$load_type = 'page_load';
		}

		// enabled on mob
		$enable_on_mob = $this->get_att('enable_on_mob');

		$td_block_layout = new td_block_layout(); // @todo check & remove if it's not needed..

		// render the JS
		ob_start();
		?>
		<script>
            jQuery().ready(function () {

                var tdwFilterItem = new tdwFilter.item();

                tdwFilterItem.blockUid = '<?php echo $this->block_uid; ?>';
                tdwFilterItem.blockAtts = '<?php echo json_encode( $this->get_all_atts(), JSON_UNESCAPED_SLASHES ); ?>';
                tdwFilterItem.jqueryObj = jQuery('.<?php echo $this->block_uid ?>');
                tdwFilterItem.loadType = '<?php echo $load_type; ?>';
                tdwFilterItem.templateType = '<?php echo $this->tdw_template_type; ?>';
                tdwFilterItem.templateDataId = '<?php echo $this->tdw_template_data_id; ?>';
                tdwFilterItem.shortcodeAtts = '<?php echo $shortcode_atts; ?>';
				<?php if ( $enable_on_mob === 'yes' ) { ?>
                tdwFilterItem.enabled_on_mobiles = true;

                var tdHtmlButton = '<div class="tdw-filters-button-mobile" style="display:none;"><svg xmlns="http://www.w3.org/2000/svg" class="td-woo-filter-icon" width="24" height="24" viewBox="0 0 24 24"><path fill="#000" d="M11.194 9.688v-1.61H18v1.61h-6.805zm3.117 2.545h1.611v2.08H18v1.609h-2.078V18h-1.611v-5.767zM6 15.922v-1.61h6.804v1.61H6zM8.076 6H9.69v5.767H8.077V9.689H6v-1.61h2.077V6z"/></svg><svg xmlns="http://www.w3.org/2000/svg" class="td-woo-close-icon" width="24" height="24" viewBox="0 0 24 24"><path fill="#000" d="M18.6,6.787l-5.666,5.666,5.658,5.658a1,1,0,0,1,0,1.418l-0.019.019a1,1,0,0,1-1.418,0L11.5,13.889,5.842,19.545a1,1,0,0,1-1.418,0l-0.019-.019a1,1,0,0,1,0-1.418l5.656-5.656L4.4,6.79a1,1,0,0,1,0-1.418l0.019-.019a1,1,0,0,1,1.418,0L11.5,11.017l5.666-5.666a1,1,0,0,1,1.418,0L18.6,5.37A1,1,0,0,1,18.6,6.787Z"/></svg></div>';
                jQuery(".td-theme-wrap").prepend(tdHtmlButton);
				<?php } ?>
				<?php if ( !$td_woo_state_has_wp_query ) { ?>
                tdwFilterItem.has_wp_query = false;
				<?php } ?>
				<?php if ( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) { ?>
                    tdwFilterItem.inComposer = true;
				<?php } ?>

                tdwFilter.addItem(tdwFilterItem);

            });
		</script>
		<?php
		td_js_buffer::add_to_footer("\n" . td_util::remove_script_tag( ob_get_clean() ) );

		$buffy .= $td_block_layout->close_all_tags(); // @todo check & remove if it's not needed..

		return $buffy;
	}

	/*
	 * this runs on ajax..
	 */
	function js_td_woo_callback_ajax() {

		$buffy = '';

		// set load type
		$load_type = $this->get_att('load_type');
		if ( empty( $load_type ) ) {
			$load_type = 'page_load';
		}

		// enabled on mob
		$enable_on_mob = $this->get_att('enable_on_mob');

		ob_start();

		?>
        <script>
            /* global jQuery */
            ( function () {

                var tdwFilterItem = new tdwFilter.item();

                tdwFilterItem.blockUid = '<?php echo $this->block_uid; ?>';
                tdwFilterItem.blockAtts = '<?php echo json_encode( $this->get_all_atts(), JSON_UNESCAPED_SLASHES ); ?>';
                tdwFilterItem.jqueryObj = jQuery('.<?php echo $this->block_uid ?>');
                tdwFilterItem.loadType = '<?php echo $load_type; ?>';
                tdwFilterItem.templateType = '<?php echo $this->tdw_template_type; ?>';
                tdwFilterItem.templateDataId = '<?php echo $this->tdw_template_data_id; ?>';
                tdwFilterItem.shortcodeAtts = '<?php echo $this->shortcode_atts; ?>';

	            <?php if ( $enable_on_mob === 'yes' ) { ?>
                    tdwFilterItem.enabled_on_mobiles = true;
	            <?php } ?>

                tdwFilterItem.isAjaxCallback = true;

	            <?php if ( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) { ?>
                    //tdwFilterItem.inComposer = true;
	            <?php } ?>

                tdwFilter.addItem(tdwFilterItem);

            })();
        </script>
		<?php

		return $buffy . td_util::remove_script_tag( ob_get_clean() );
	}

	/*
	 * td_block.php > js_tdc_get_composer_block hook
	 * this runs when block is updated in td composer
	 */
	function js_tdc_callback_ajax() {
		$buffy = '';

		// enabled on mob
		$enable_on_mob = $this->get_att('enable_on_mob');

		// set load type
		$load_type = $this->get_att('load_type');
		if ( empty( $load_type ) ) {
			$load_type = 'page_load';
		}

		// add a new composer block - that one has the delete callback
		$buffy .= $this->js_tdc_get_composer_block();

		ob_start();

		?>
        <script>
            /* global jQuery:{} */
            (function () {

                var tdwFilterItem = new tdwFilter.item();

                tdwFilterItem.blockUid = '<?php echo $this->block_uid; ?>';
                tdwFilterItem.blockAtts = '<?php echo json_encode( $this->get_all_atts(), JSON_UNESCAPED_SLASHES ); ?>';
                tdwFilterItem.jqueryObj = jQuery('.<?php echo $this->block_uid ?>');
                tdwFilterItem.loadType = '<?php echo $load_type; ?>';
                tdwFilterItem.templateType = '<?php echo $this->tdw_template_type; ?>';
                tdwFilterItem.templateDataId = '<?php echo $this->tdw_template_data_id; ?>';
                tdwFilterItem.shortcodeAtts = '<?php echo $this->shortcode_atts; ?>';

                var tdThemeWrapEl = jQuery(".td-theme-wrap");

	            <?php if ( $enable_on_mob === 'yes' ) { ?>
                    tdwFilterItem.enabled_on_mobiles = true;
                    var tdwMobileFiltersButton = jQuery(".tdw-filters-button-mobile");
                    if ( !tdwMobileFiltersButton.length ) { // button not found
                        // add it..
                        var tdHtmlButton = '<div class="tdw-filters-button-mobile" style="display:none;"><svg xmlns="http://www.w3.org/2000/svg" class="td-woo-filter-icon" width="24" height="24" viewBox="0 0 24 24"><path fill="#000" d="M11.194 9.688v-1.61H18v1.61h-6.805zm3.117 2.545h1.611v2.08H18v1.609h-2.078V18h-1.611v-5.767zM6 15.922v-1.61h6.804v1.61H6zM8.076 6H9.69v5.767H8.077V9.689H6v-1.61h2.077V6z"/></svg><svg xmlns="http://www.w3.org/2000/svg" class="td-woo-close-icon" width="24" height="24" viewBox="0 0 24 24"><path fill="#000" d="M18.6,6.787l-5.666,5.666,5.658,5.658a1,1,0,0,1,0,1.418l-0.019.019a1,1,0,0,1-1.418,0L11.5,13.889,5.842,19.545a1,1,0,0,1-1.418,0l-0.019-.019a1,1,0,0,1,0-1.418l5.656-5.656L4.4,6.79a1,1,0,0,1,0-1.418l0.019-.019a1,1,0,0,1,1.418,0L11.5,11.017l5.666-5.666a1,1,0,0,1,1.418,0L18.6,5.37A1,1,0,0,1,18.6,6.787Z"/></svg></div>';
                        tdThemeWrapEl.prepend(tdHtmlButton);
                    }

	            <?php } else { ?>
                    tdThemeWrapEl.find('.tdw-filters-button-mobile').remove(); // remove the filters on mobile trigger button
	            <?php } ?>

	            <?php if ( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) { ?>
                    tdwFilterItem.inComposer = true;
	            <?php } ?>

                tdwFilter.addItem(tdwFilterItem);

            })();
        </script>
		<?php

		return $buffy . td_util::remove_script_tag( ob_get_clean() );
	}

	/*
     * gets the total results(products) count after applying the given term(filter) to the given filters
	 *
	 * @param $term - the term(filter) object
	 *
	 * ex. term object
	 * WP_Term Object
        (
            [term_id] => 50
            [name] => Blue
            [slug] => blue
            [term_group] => 0
            [term_taxonomy_id] => 50
            [taxonomy] => pa_color
            [description] =>
            [parent] => 0
            [count] => 6
            [filter] => raw
        )
	 *
	 * @param $filters - filters array
     *
	 * ex. filters array
	 * Array (
            [pa_color] => blue, red, green
            [pa_custom_attribute] => custom-att-term-1, custom-att-term-2, custom-att-term-3
            [pa_size] => large, medium, small
            [product_cat] => accessories, clothing, decor, music
            [product_tag] => tag1, tag2, tag3
	    )
	 *
	 * @return int - the number of total available results(products) after applying the given term filter
	 *
	 * @todo add visibility tax to the query..
	 *
 	 */
	function filter_label_count( $term, $filters ) {

	    $args = array();

        // set product categories filter
        if ( !empty( $filters['product_cat'] ) ) { // string of one or more(comma separated) prod categories slugs.. ex: 'clothing, accessories, hoodies'
	        $args['tax_query'][] = array(
		        'taxonomy'         => 'product_cat',
		        'terms'            => array_map( 'sanitize_title', explode( ',', $filters['product_cat'] ) ),
		        'field'            => 'slug',
		        'operator'         => 'IN',
		        'include_children' => true,
		        //'operator'         => 'AND',
		        //'include_children' => false,
	        );
        }

        // set product tags filter
        if ( !empty( $filters['product_tag'] ) ) { // string of one or more(comma separated) prod categories slugs.. ex: 'tag1, tag2, tag3'
	        $args['tax_query'][] = array(
		        'taxonomy' => 'product_tag',
		        'terms'    => array_map( 'sanitize_title', explode( ',', $filters['product_tag'] ) ),
		        'field'    => 'slug',
		        'operator' => 'AND',
	        );
        }

		// this global stores the state of multiple selection for prod attributes
		global $td_woo_attributes_filters_multiple_selection;

        // set product attributes filter
        foreach ( $filters as $tax => $tax_terms_filters_list ) {

            // check if the current filter(tax) is a product attribute
	        if ( in_array( $tax, wc_get_attribute_taxonomy_names() ) ) {

		        $operator = isset( $td_woo_attributes_filters_multiple_selection[$tax] ) && $td_woo_attributes_filters_multiple_selection[$tax] ? 'IN' : 'AND';

		        // add to the tax query
		        $args['tax_query'][] = array(
			        'taxonomy' => $tax,
			        'terms'    => array_map( 'sanitize_title', explode( ',', $tax_terms_filters_list ) ),
			        'field'    => 'slug',
			        'operator' => $operator,
		        );

	        }

        }

        // operator
		$operator = 'IN';
        if ( $term->taxonomy !== 'product_cat' ) {

            // prod attributes
	        if ( in_array( $term->taxonomy, wc_get_attribute_taxonomy_names() ) ) {
		        $operator = isset( $td_woo_attributes_filters_multiple_selection[$term->taxonomy] ) && $td_woo_attributes_filters_multiple_selection[$term->taxonomy] ? 'IN' : 'AND';
            } else {
		        $operator = 'AND';
            }

        }

        // add the current term (for which we check count) to the query..
        if ( !empty( $args['tax_query'] ) ) {
            $cur_term_tax_index = array_search( $term->taxonomy, array_column( $args['tax_query'], 'taxonomy' ) );
            if ( $cur_term_tax_index !== false ) {

                // exclude current terms for multiple selection
                if ( $args['tax_query'][$cur_term_tax_index]['operator'] === 'IN' ) {
	                $args['tax_query'][] = array(
		                'taxonomy' => $term->taxonomy,
		                'terms'    => $args['tax_query'][$cur_term_tax_index]['terms'],
		                'field'    => 'slug',
		                'operator' => 'NOT IN',
	                );
                }

	            $args['tax_query'][$cur_term_tax_index]['terms'][] = $term->slug;

            } else {
                $args['tax_query'][] = array(
                    'taxonomy' => $term->taxonomy,
                    'terms'    => array( $term->slug ),
                    'field'    => 'slug',
                    'operator' => $operator,
                );
            }
        } else {
            $args['tax_query'][] = array(
                'taxonomy' => $term->taxonomy,
                'terms'    => array( $term->slug ),
                'field'    => 'slug',
                'operator' => $operator,
            );
        }

		$query_args = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true,
			'no_found_rows'       => false,
			'posts_per_page'      => intval('-1'),
			'meta_query'          => array(),
			'tax_query'           => $args['tax_query'],
			'fields'              => 'ids',
		);

        // in search templates add search query
        if ( $this->tdw_template_type === 'woo_search_archive' ) {
            $query_args['s'] = $this->tdw_template_data_id;
        }

		$query = new WP_Query($query_args);

		$query_results = (object) array(
			//'$query' => $query,
			'total'    => count( $query->posts ),
            'term'     => $term->slug
		);

		// for testing @todo remove...
		//td_woo_util::pre_print_r($query_results);
		//die( '<b style="color: orangered">' . __CLASS__ . ' - ' . __FUNCTION__ . '</b>');

		// for testing @todo remove...
        //if ( in_array( $term->slug, array( 'tag5', /*'tshirts', 'accessories'*/ ) ) ) {
        //    return '<pre style="width: 400px;">' .
        //               $query_results->total . '<br>' .
        //               print_r( $query_args, true ) . '<br>' .
        //               print_r( $filters, true ) .
        //           '</pre>';
        //}

        //return '<pre>' . $query_results->total . '<br>' . print_r( $term, true ) . '<br>' . print_r( $query_args, true ) . '<br>' . print_r( $filters, true ) . '</pre>';
        return $query_results->total;

    }

	/*
	 * gets the filter link - used for 'product_cat' taxonomies when 'single_selection' is active ( when it's set as link )
	 *
	 * @param $term - the term(filter) object
	 * @param $selected_filters - selected filters array
	 *
	 * @return int - the number of total available results(products) after applying the given term filter
	 */
    function filter_link( $term, $selected_filters ) {

	    switch( $this->tdw_template_type ) {
		    case 'woo_product':
		    case 'woo_archive':
		    case 'woo_shop_base':
			    // add selected filters
			    $link = add_query_arg(
				    $selected_filters,
				    get_term_link( $term->term_id, $term->taxonomy )
			    );
			    break;
		    case 'woo_search_archive':
			    $link = add_query_arg(
                    array_merge(
	                    array( 'post_type' => 'product' ),
	                    $selected_filters,
	                    array( 'tdw_product_cat' => $term->slug )
                    ),
				    get_search_link( $this->tdw_template_data_id )
			    );
			    break;
		    default:
			    $link = '#';
	    }

	    return $link;
    }

    /*
     * process active filters
     *
	 * @param $filters_data - the state filters' data
	 * @param $exclude_current - flag to exclude the current queried state term
     *
     */
    function get_active_filters( $filters_data, $exclude_current = true ) {

	    $active_filters = $filters_data['selected'];

	    // exclude current queried term
        if ( $exclude_current ) {

	        // product_cat filter
	        if ( isset( $filters_data['current_queried_obj']->taxonomy ) && $filters_data['current_queried_obj']->taxonomy === 'product_cat' && !empty( $active_filters['product_cat'] ) ) {
		        $categories = array_map( 'sanitize_title', explode( ',', $active_filters['product_cat'] ) );
		        if ( ( $key = array_search( $filters_data['current_queried_obj']->slug, $categories ) ) !== false ) {
			        unset( $categories[$key] );
		        }
		        $active_filters['product_cat'] = implode( ',', $categories );
	        }

	        // product attributes filter
	        if ( isset( $filters_data['current_queried_obj']->taxonomy ) && in_array( $filters_data['current_queried_obj']->taxonomy, wc_get_attribute_taxonomy_names() ) && !empty( $active_filters[$filters_data['current_queried_obj']->taxonomy] ) ) {
		        $attributes = array_map( 'sanitize_title', explode( ',', $active_filters[$filters_data['current_queried_obj']->taxonomy] ) );
		        if ( ( $key = array_search( $filters_data['current_queried_obj']->slug, $attributes ) ) !== false ) {
			        unset( $attributes[$key] );
		        }
		        $active_filters[$filters_data['current_queried_obj']->taxonomy] = implode( ',', $attributes );
	        }

        }

	    return $active_filters;

    }

	/*
	 * no img placeholder getter function
	 */
	function get_placeholder_img_src() {
		return TD_WOO_URL . '/assets/images/no_img.png';
	}

}