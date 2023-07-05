<?php

/**
 * Class tdb_filters - this renders the tdb_filters shortcodes ...
 */

class tdb_filters extends td_block {

	public function get_custom_css() {

		// $unique_block_class
		$unique_block_class = $this->block_uid;

		$compiled_css = '';

		$raw_css =
            "<style>
	                
                /* @general_style_tdb_filters */
                .tdb_filters .tdb-filter-container {
                    margin-bottom: 25px;
                    transform: translateZ(0);
                    font-family: -apple-system,BlinkMacSystemFont,\"Segoe UI\",Roboto,Oxygen-Sans,Ubuntu,Cantarell,\"Helvetica Neue\",sans-serif;
                    font-size: 14px;
                }
                .tdb_filters .tdb-filter-container {
                    margin-bottom: 25px;
                }
                .tdb_filters .tdb-filter-container:last-child {
                    margin-bottom: 0;
                }
                .tdb_filters .tdb-s-content:after {
                    margin-top: -25px;
                    margin-left: -10px;
                    width: 17px;
                    height: 17px;
                    border-width: 2px;
                }
                .tdb_filters ul:not(.checkbox-list-wrapper) {
                    display: flex;
				    flex-wrap: wrap;
				    margin: 0;
				    list-style-type: none;
                }
				.tdb_filters h4 {
				    margin-bottom: 12px;
				    font-size: 13px;
				    line-height: 1;
				    margin-top: 0;
				    color: #000;
				    font-weight: 500;
				}
				.tdb_filters .tdb-no-filters {
				    display: none !important;
				}
                .tdb-filter-item-span {
                    color: #000;
                    vertical-align: middle;
                }
                .tdb_filters .tdb-filters-clear-all {
                    display: inline-flex;
                    align-items: center; 
                    padding: 9px;
                    font-size: 13px;
                    font-weight: 500;
                    color: #333;
                    border: 1px solid #ddd;
                }
                .tdb_filters .tdb-filters-clear-all:hover {
                    color: #4db2ec;
                }
                .tdb_filters .tdb-filters-clear-all-txt {
                    margin-right: 10px;
                    line-height: 1;
                }
                .tdb_filters .tdb-clear-all-filters-wrap i {
                    font-size: 10px;
                }
                .tdb_filters .tdb-clear-all-filters-wrap .tdb-filters-clear-all-icon-svg {
                    line-height: 0;
                }
                .tdb_filters .tdb-clear-all-filters-wrap svg
                .tdb_filters .tdb-clear-all-filters-wrap svg {
                    width: 10px;
                    height: auto;
                }
                .tdb_filters .tdb-clear-all-filters-wrap svg,
                .tdb_filters .tdb-clear-all-filters-wrap svg * {
                    fill: #333;
                }
				.tdb_filters .tdb-filter-item:not(.checkbox-tdb-filter-item):not(.image-tdb-filter-item), 
				.tdb_filters .image-tdb-filter-item img,
				.tdb_filters .tdb-filter-item-type-link {
				    position: relative;
				    display: flex;
				    background-color: #fff;
				    transition: all .2s ease;
				    box-shadow: inset 0 0 0 1px #dfdfdf;
				    cursor: pointer;
				    outline: none !important;
				}
				.tdb_filters .tdb-filter-item:not(.checkbox-tdb-filter-item):not(.image-tdb-filter-item),
				.tdb_filters .image-tdb-filter-item,
				.tdb_filters .tdb-filter-item-type-link {
				    margin: 0 5px 5px 0;
				}
				.tdb_filters .tdb-filter-item-type-link {
				    box-shadow: inset 0 0 0 0.5px #4db2ec;
				}
				.tdb_filters .tdb-filter-item:not(.checkbox-tdb-filter-item):not(.image-tdb-filter-item):hover,
				.tdb_filters .tdb-filter-item:not(.checkbox-tdb-filter-item):not(.image-tdb-filter-item).selected {
                    box-shadow: inset 0 0 0 2px #444;
                }
                .tdb_filters .tdb-filter-item-type-link:hover,
                .tdb_filters .tdb-filter-item-type-link.selected {
                    box-shadow: inset 0 0 0 2px #4db2ec;
                }
				.tdb_filters .tdb-filter-item .tdb-filter-item-span:not(.tdb-filter-item-span-checkbox):not(.filter-icon),
				.tdb_filters .tdb-filter-item-type-link .tdb-filter-item-link,
				.tdb_filters .tdb-filter-item.tdb-filter-link a {
				    display: flex;
				    align-items: center;
				    justify-content: center;
				    width: 100%;
				    height: 100%;
				}
                .tdb-filter-item:not(.checkbox-tdb-filter-item):not(.tdb-filter-item-option-select) .td_woo_label_count {
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
				.tdb_filters .image-tdb-filter-item {
				    display: flex;
				    align-items: center;
				    cursor: pointer;
				    position: relative;
				}
				.tdb_filters .image-tdb-filter-item img {
				    padding: 4px;
				    width: auto;
				    height: 48px;
				}
				.tdb_filters .image-tdb-filter-item .tdb-img-attr-label {
				    margin-left: 10px;
				    line-height: 1.3;
				}
				.tdb_filters .color-tdb-filter-item {
				    padding: 4px;
				    width: 26px;
				    height: 26px;
				}
				.tdb_filters .button-tdb-filter-item,
				.tdb_filters .tdb-filter-item-type-link {
				    padding: 0 6px;
				    min-width: 30px;
				    min-height: 30px;
				}
				.tdb_filters .tdb-filter-dropdown-inner {
				    position: relative;
				}
				.tdb_filters .tdb-filter-dropdown-inner:after,
				.tdb_filters .tdb-multi-select-wrapper:after {
				    content: '\\e801';
                    position: absolute;
                    top: 50%;
                    transform: translateY(-50%);
                    right: 9px;
                    font-family: 'newspaper';
                    font-size: 14px;
				}
                .tdb_filters .tdb-filter-items-wrapper.select-filter-type {
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
                .tdb_filters .tdb-filter-items-wrapper.select-filter-type:focus,
                .tdb_filters .tdb-filter-items-wrapper.select-filter-type:active {
                    border-color: #b0b0b0;
                }
				.tdb_filters .tdb-filter-items-wrapper.select-filter-type .tdb-filter-item-option-select:checked {
                    font-weight: bold;
                }
                .tdb_filters ul.checkbox-list-wrapper {
				    margin: 0;
				    list-style-type: none;
                }
                .tdb_filters ul.checkbox-list-wrapper .tdb-filter-item {
                    display: flex;
                    align-items: center;
                    margin: 0 0 8px;
                    line-height: 1;
				    cursor: pointer;
                }
                .tdb_filters ul.checkbox-list-wrapper .tdb-filter-item:last-item {
                    margin-bottom: 0;
                }
                .tdb_filters ul.checkbox-list-wrapper .tdb-filter-item:hover,
                .tdb_filters .tdb-filter-item.checkbox-tdb-filter-item.selected {
                    color: #4db2ec;
                }
                .tdb_filters .tdb-filter-item.checkbox-tdb-filter-item .filter-icon {
                    position: relative;
                    margin-right: 10px;
                    width: 14px;
                    height: 14px;
                    border: 1px solid #ccc;
                    display: inline-block;
                    vertical-align: middle;
                }
                .tdb_filters .tdb-filter-item.checkbox-tdb-filter-item .filter-icon:after {
                    content: '';
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    background-color: #4db2ec;
                    opacity: 0;
                    transition: opacity .2s;
                }
                .tdb_filters .tdb-filter-item.checkbox-tdb-filter-item.selected .filter-icon:after {
                    opacity: 1;
                }
                .tdb_filters .tdb-filter-item.checkbox-tdb-filter-item:focus {
                    outline: none; 
                }
                .tdb-filters-button-mobile {
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
                .tdb-filters-button-mobile svg {
                    -webkit-transition: opacity 0.2s cubic-bezier(0.79, 0.14, 0.15, 0.86);
                    transition: opacity 0.2s cubic-bezier(0.79, 0.14, 0.15, 0.86);
                    float: left;
                    position: absolute;
                    top: 15px;
                    right: 15px;
                }
                .tdb-filters-open .td-woo-filter-icon,
                .td-woo-close-icon {
                    opacity: 0;
                }
                .tdb-filters-open .td-woo-close-icon,
                .td-woo-filter-icon {
                    opacity: 1;
                }
                @media (max-width: 767px) {
                    .td-theme-wrap .tdb-filters-mobile {
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
                    .tdb-filters .tdc-content-wrap .tdc_zone {
                        z-index: auto;
                    }
                    body.tdb-filters-open {
                        overflow: hidden;
                    }
                    .tdb-filters .tdb-filters-button-mobile {
                        display: block !important;
                    }
                    .tdb-filters-open .tdb-filters-button-mobile:before {
                        content: '';
                        position: fixed;
                        top: 0;
                        right: 0;
                        width: 22%;
                        height: 100vh;
                        z-index: 99999;
                    }
                }
                .tdb-filters-open .td-theme-wrap .tdb-filters-mobile {
                    transform: translate3d(0, 0, 0);
                    -webkit-transform: translate3d(0, 0, 0);
                }
                .tdb_filters .tdb-multi-select-wrapper {
                     position: relative;
                     user-select: none;
                     width: 100%;
                }
                .tdb_filters .multi-select {
                     position: relative;
                     display: flex;
                     flex-direction: column;
                }
                .tdb_filters .multi-select__selection {
                     position: relative;
                     display: flex;
                     align-items: stretch;                     
                     min-height: 30px;                     
                     background: #ffffff;
                     padding: 0 6px;
                     font-size: 14px;
                     color: #3b3b3b;
                     border: 1px solid #dfdfdf;
                     transition: border-color 0.2s ease-in-out;
                     cursor: pointer;
                }
                .tdb_filters .multi-select.open .multi-select__selection {
                    border-color: #000;
                }
                .tdb_filters .multi-select__selection span {
                    display: flex;
                    align-items: center;
                    padding-bottom: 1px;
                }
                .tdb_filters .multi-select__selection span:not(.no-selection) {
                    margin: 3px 6px 3px 0;
                    padding-left: 6px;
                    padding-right: 6px;
                    background-color: #e7e7e7;
                    font-size: 11px;
                    font-weight: 400;
                    line-height: 1;
                    color: #000;
                }
                .tdb_filters .multi-select-options {
                    position: absolute;
                    display: block;
                    top: calc(100% + 3px);
                    left: 0;
                    right: 0;
                    background: #fff;
                    width: 100%;
                    max-height: 277px;
                    padding: 6px 0;
                    border: 1px solid #dfdfdf;
                    opacity: 0;
                    visibility: hidden;
                    pointer-events: none;
                    overflow-y: auto;
                    z-index: 2;
                }
                .tdb_filters .multi-select.open .multi-select-options {
                     opacity: 1;
                     visibility: visible;
                     pointer-events: all;
                }
                .tdb_filters .multi-select-option {
                     width: 100%;
                     position: relative;
                     display: flex;
                     align-items: center;
                     margin: 0;
                     padding: 2px 10px 4px;
                     font-size: 14px;
                     font-weight: 600;
                     color: #000;
                     line-height: 24px;
                     cursor: pointer;
                }
                .tdb_filters .multi-select-option:hover {
                    background-color: #F8F8F8;
                }
                .tdb_filters .multi-select-option .filter-icon {
                    display: inline-block;
                    position: relative;
                    top: 1px;
                    margin-right: .714em;
                    width: 1em;
                    height: 1em;
                    background-color: #fff;
                    border: 1px solid #ccc;
                    cursor: pointer;
                }
                .tdb_filters .multi-select-option .filter-icon:after {
                    content: '';
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    width: .429em;
                    height: .429em;
                    background-color: #4db2ec;
                    opacity: 0;
                    transition: opacity .2s;
                }
                .tdb_filters .multi-select-option.selected .filter-icon:after {
                    opacity: 1;
                }
                
                body > .select2-container {
                    min-width: 320px;
                }
                .select2-results__option {
                  vertical-align: middle;
                }
                .select2-container .tdb-select2-multi .select2-results__option {
                    display: flex;
                    align-items: center;
                }
                .select2-container .tdb-select2-multi .select2-results__option:before {
                    content: '';
                    position: relative;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    height: 17px;
                    width: 17px;
                    margin-right: 10px;
                    background-color: #fff;
                    border: 1px solid #ccc;
                }
                .select2-container .tdb-select2-multi .select2-results__option--selected:before {
                    content: url('data:image/svg+xml; utf8,<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"9\" height=\"9\" viewBox=\"0 0 512 512\"><path d=\"M0 0H512V512H0V0z\" fill=\"%234db2ec\"/></svg>');
                }
                .select2-container .tdb-select2-multi .select2-results__option--selected {
                    background-color: #fff;
                }
                .tdb-s-form-select-wrap .select2-container--default .select2-selection--multiple {
                    margin-bottom: 10px;
                }
                .tdb-s-form-select-wrap .select2-container--default.select2-container--focus .select2-selection--multiple {
                    border-color: #f77750;
                    border-width: 2px;
                }
                .tdb-s-form-select-wrap .select2-container--default .select2-selection--multiple {
                    border-width: 2px;
                }
                .tdb-s-form-select-wrap .select2-container--open .select2-dropdown--below {
                    border-radius: 6px;
                    box-shadow: 0 0 10px rgba(0,0,0,0.5);
                }
                .tdb-s-form-select-wrap .select2-selection .select2-selection--multiple:after {
                    content: 'hhghgh';
                }
                                
                body .tdb_filters .tdb-s-form .tdb-s-form-select-wrap .select2-selection,
                body .tdb_filters .tdb-s-form .tdb-s-form-select-wrap .tdb-s-form-input {
                    min-height: 30px;
                    height: auto;
                    padding: 0 6px 1px;
                    font-size: 14px;
                    line-height: 24px;
                    font-weight: 400;
                    color: #000;
                    border-width: 1px;
                    border-color: #dfdfdf;
                    border-radius: 0;
                    outline: none !important;
                }
                
                body .tdb_filters .tdb-s-form .tdb-s-form-select-wrap .tdb-s-form-input.multiple {
                    max-height: 30px;
                    overflow: hidden;
                }
                
                body .tdb_filters .tdb-s-form .tdb-s-form-select-wrap .tdb-s-form-input.multiple option {
                    height: 30px;
                }
                
                body.td-js-loaded .tdb_filters .tdb-s-form .tdb-s-form-select-wrap .tdb-s-form-input.multiple {
                    max-height: auto;
                    overflow: auto;
                }
                
                body.td-js-loaded .tdb_filters .tdb-s-form .tdb-s-form-select-wrap .tdb-s-form-input.multiple option {
                    height: 30px;
                }
                body .tdb_filters .tdb-s-form .tdb-s-form-select-wrap .select2-selection--multiple {
                    align-items: stretch;
                }
                body .tdb_filters .tdb-s-form .tdb-s-form-select-wrap .select2-selection--multiple .select2-selection__choice {
                    margin: 0;
                }
                body .tdb_filters .tdb-s-form .tdb-s-form-select-wrap .select2-selection--multiple .select2-selection__choice {
                    display: flex;
                    align-items: center;
                    margin: 3px 6px 3px 0;
                    padding: 0 6px 1px;
                    background-color: #e7e7e7;
                    font-size: 11px;
                    font-weight: 400;
                    line-height: 1;
                    color: #000;
                }
                body .tdb_filters .tdb-s-form .tdb-s-form-select-wrap .select2-search--inline {
                    flex: 1;
                }
                body .tdb_filters .tdb-s-form .tdb-s-form-select-wrap .select2-selection--multiple textarea {
                    display: block;
                    padding: 0;
                    height: 27px;
                    min-height: auto;
                    min-width: 100%;
                    max-width: 100%;
                    background-color: transparent;
                    font-family: -apple-system,BlinkMacSystemFont,\"Segoe UI\",Roboto,Oxygen-Sans,Ubuntu,Cantarell,\"Helvetica Neue\",sans-serif;
                    font-size: 14px;
                    line-height: 24px;
                    color: #000;
                    border: 0;
                    resize: none;
                }
                body .tdb_filters .tdb-s-form .tdb-s-form-select-wrap .select2-selection--multiple .select2-selection__choice__remove {
                    display: none;
                }
                body .tdb_filters .tdb-s-form .tdb-s-form-select-wrap .select2-selection--multiple textarea::placeholder {
                    color: #000;
                }
                body .tdb_filters .tdb-s-form .tdb-s-form-select-wrap .select2-selection--multiple textarea::-webkit-input-placeholder {
                    color: #000;
                }
                body .tdb_filters .tdb-s-form .tdb-s-form-select-wrap .select2-selection--multiple textarea::-moz-placeholder {
                    color: #000;
                }
                body .tdb_filters .tdb-s-form .tdb-s-form-select-wrap .select2-selection--multiple textarea:-ms-input-placeholder {
                    color: #000;
                }
                body .tdb_filters .tdb-s-form .tdb-s-form-select-wrap .select2-selection--multiple textarea:-moz-placeholder {
                    color: #000;
                }
                body .tdb_filters .tdb-s-form .tdb-s-form-group:not(.tdb-s-fg-error) .select2-container--open .select2-selection {
                    border-color: #444 !important;
                }
                body .tdb_filters .tdb-s-form .tdb-s-form-select-wrap .tdb-s-form-select-icon {
                    right: 8px;
                    width: 9px;
                    height: auto;
                }
                body [class*='tdb-s-select2-$unique_block_class'].select2-dropdown {
                    border-width: 1px;
                    border-color: #dfdfdf;
                    border-radius: 0;
                    outline-color: transparent;
                }
                body [class*='tdb-s-select2-$unique_block_class'] .select2-search__field {
                    background-color: transparent;
                    font-size: 13px;
                    color: #000;
                    border-width: 1px;
                    border-radius: 0;
                }
                body [class*='tdb-s-select2-$unique_block_class'] .select2-results__options {
                    color: #000;
                }
                
                
                /* @filters_bg_color */
                body .$unique_block_class .tdb-filter-container {
                    background-color: @filters_bg_color;
                }
                /* @filters_bg_gradient */
                body .$unique_block_class .tdb-filter-container {
                    @filters_bg_gradient;
                }
                /* @label_space */
                body .$unique_block_class .tdb-filter-title {
                    margin-bottom: @label_space;
                }
                /* @filters_space */
                body .$unique_block_class .tdb-filter-container {
                    padding: @filters_space;
                }
                /* @filters_radius */
                body .$unique_block_class .tdb-filter-container {
                    border-radius: @filters_radius;
                }
                /* @filters_bottom_space */
                body .$unique_block_class .tdb-filter-container {
                    margin-bottom: @filters_bottom_space;
                }
                /* @filters_shadow */
                body .$unique_block_class .tdb-filter-container {
                    box-shadow: @filters_shadow;
                }
                
                /* @filters_vertical */
                body .$unique_block_class .tdb-filters-wrap {
                    display: block;
                }
                /* @filters_horiz_align */
                body .$unique_block_class .tdb-filters-wrap {
                    justify-content: @filters_horiz_align;
                }
                
                /* @filters_horizontal */
                body .$unique_block_class .tdb-filters-wrap {
                    display: flex;
                }
                body .$unique_block_class .tdb-filters-wrap .tdb-filter-container:last-child {
                    padding-right: 0;
                }
                /* @filters_wrap */
                body .$unique_block_class .tdb-filters-wrap {
                    flex-wrap: wrap;
                }
                /* @filters_nowrap */
                body .$unique_block_class .tdb-filters-wrap {
                    flex-wrap: nowrap;
                }
                /* @filters_width */
                body .$unique_block_class .tdb-filters-wrap .tdb-filter-container {
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
				body .$unique_block_class .tdb-filter-items-wrapper:not(.checkbox-list-wrapper) {
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
				body .$unique_block_class .tdb-filter-items-wrapper:not(.checkbox-list-wrapper) {
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
				body .$unique_block_class .tdb-filter-items-wrapper:not(.checkbox-list-wrapper) {
                    justify-content: flex-start;
                }
                
                /* @reset_full */
                body .$unique_block_class .tdb-filters-clear-all {
                    display: flex;
                }
                body .$unique_block_class .tdb-filters-clear-all-txt {
                    margin-right: auto;
                }
                /* @reset_off */
                body .$unique_block_class .tdb-filters-clear-all {
                    display: inline-flex;
                }
                
                /* @reset_general */
                body .$unique_block_class .tdb-filters-clear-all-txt {
                    margin-right: 9px;
                }
                
                /* @reset_center */
                body .$unique_block_class .tdb-filters-clear-all {
                    justify-content: center;
                }
                body .$unique_block_class .tdb-clear-all-filters-wrap {
                    text-align: center;
                }
                /* @reset_right */
                body .$unique_block_class .tdb-filters-clear-all {
                    justify-content: flex-end;
                }
                body .$unique_block_class .tdb-clear-all-filters-wrap {
                    text-align: right;
                }
                /* @reset_left */
                body .$unique_block_class .tdb-filters-clear-all {
                    justify-content: flex-start;
                }
                body .$unique_block_class .tdb-clear-all-filters-wrap {
                    text-align: left;
                }
                
                /* @reset_space */
                body .$unique_block_class .tdb-clear-all-filters-wrap {
                    margin-bottom: @reset_space;
                }
                /* @reset_padd */
                body .$unique_block_class .tdb-filters-clear-all {
                    padding: @reset_padd;
                }
                /* @reset_border */
                body .$unique_block_class .tdb-filters-clear-all {
                    border-width: @reset_border;
                }
                /* @reset_txt_space */
                body .$unique_block_class .tdb-filters-clear-all-txt {
                    margin-right: @reset_txt_space;
                }
                /* @reset_icon_size */
                body .$unique_block_class .tdb-clear-all-filters-wrap i {
                    font-size: @reset_icon_size;
                }
                body .$unique_block_class .tdb-clear-all-filters-wrap svg {
                    width: @reset_icon_size;
                }
                
                /* @color_size */
                body .$unique_block_class .color-tdb-filter-item {
                    width: @color_size;
                    height: @color_size;
                }
                /* @color_margin */
                body div.$unique_block_class .tdb-filter-item.color-tdb-filter-item {
                    margin: @color_margin;
                }
                /* @color_padd */
                body .$unique_block_class .color-tdb-filter-item {
                    padding: @color_padd;
                }
                /* @all_color_border */
                body div.$unique_block_class .tdb-filter-item.color-tdb-filter-item {
                    box-shadow: inset 0 0 0 @all_color_border @all_color_border_c;
                }
                /* @all_color_border_s */
                body div.$unique_block_class .tdb-filter-item.color-tdb-filter-item:hover,
                body div.$unique_block_class .tdb-filter-item.color-tdb-filter-item.selected {
                    box-shadow: inset 0 0 0 @all_color_border_s @all_color_border_c_s;
                }
                /* @color_radius */
                body .$unique_block_class .color-tdb-filter-item,
                body .$unique_block_class .color-tdb-filter-item span,
                body .$unique_block_class .color-tdb-filter-item img {
                    border-radius: @color_radius;
                }
                
                /* @but_size */
                body .$unique_block_class .button-tdb-filter-item {
                    min-width: @but_size;
                    min-height: @but_size;
                }
                /* @but_margin */
                body div.$unique_block_class .tdb-block-inner .tdb-filter-item.button-tdb-filter-item {
                    margin: @but_margin;
                }
                body div.$unique_block_class .tdb-filter-item.button-tdb-filter-item:last-child {
                    margin-right: 0;
                }
                /* @but_padd */
                body .$unique_block_class .button-tdb-filter-item {
                    padding: @but_padd;
                }
                /* @all_but_border */
                body div.$unique_block_class .tdb-block-inner .tdb-filter-item.button-tdb-filter-item {
                    box-shadow: inset 0 0 0 @all_but_border @all_but_border_c;
                }
                /* @all_but_border_s */
                body div.$unique_block_class .tdb-block-inner .tdb-filter-item.button-tdb-filter-item:hover,
                body div.$unique_block_class .tdb-block-inner .tdb-filter-item.button-tdb-filter-item.selected {
                    box-shadow: inset 0 0 0 @all_but_border_s @all_but_border_c_s;
                }
                /* @but_radius */
                body .$unique_block_class .button-tdb-filter-item {
                    border-radius: @but_radius;
                }
                
                /* @check_size */
                body .$unique_block_class .tdb-filter-item.checkbox-tdb-filter-item .filter-icon {
                    width: @check_size;
                    height: @check_size;
                }
                /* @check_space */
                body .$unique_block_class .tdb-filter-item.checkbox-tdb-filter-item .filter-icon {
                    margin-right: @check_space;
                }
                /* @all_check_border_color */
                body .$unique_block_class .tdb-filter-item.checkbox-tdb-filter-item .filter-icon {
                    border-color: @all_check_border_color;
                }
                /* @all_check_border */
                body .$unique_block_class .tdb-filter-item.checkbox-tdb-filter-item .filter-icon {
                    border: @all_check_border solid @all_check_border_color;
                }
                /* @all_check_border_color_s */
                body .$unique_block_class .tdb-filter-item.checkbox-tdb-filter-item.selected .filter-icon {
                    border-color: @all_check_border_color_s;
                }
                /* @all_check_border_s */
                body .$unique_block_class .tdb-filter-item.checkbox-tdb-filter-item.selected .filter-icon {
                    border: @all_check_border_s solid @all_check_border_color_s;
                }
                /* @dot_size */
                body .$unique_block_class .tdb-filter-item.checkbox-tdb-filter-item.selected .filter-icon:after {
                    width: @dot_size;
                    height: @dot_size;
                }
                /* @check_radius */
                body .$unique_block_class .tdb-filter-item.checkbox-tdb-filter-item .filter-icon,
                body .$unique_block_class .tdb-filter-item.checkbox-tdb-filter-item .filter-icon:after {
                    border-radius: @check_radius;
                }
                
                /* @img_display_txt */
                body .$unique_block_class .image-list-wrapper {
                    flex-direction: column;
                }
                /* @img_margin */
                body div.$unique_block_class .image-tdb-filter-item {
                    margin: @img_margin;
                }
                /* @img_txt_space */
                body div.$unique_block_class .image-tdb-filter-item .tdb-img-attr-label {
                    margin-left: @img_txt_space;
                }
                /* @img_size */
                body .$unique_block_class .image-tdb-filter-item img {
                    height: @img_size;
                }
                /* @img_padd */
                body .$unique_block_class .image-tdb-filter-item img {
                    padding: @img_padd;
                }
                /* @all_img_border */
                body div.$unique_block_class .image-tdb-filter-item img {
                    box-shadow: inset 0 0 0 @all_img_border @all_img_border_c;
                }
                /* @all_img_border_s */
                body div.$unique_block_class .image-tdb-filter-item:hover img,
                body div.$unique_block_class .image-tdb-filter-item.selected img {
                    box-shadow: inset 0 0 0 @all_img_border_s @all_img_border_c_s;
                }
                /* @img_radius */
                body .$unique_block_class .image-tdb-filter-item img {
                    border-radius: @img_radius;
                }
                
                /* @drop_padding */
                html body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .select2-selection,
                html body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .tdb-s-form-input,
                html body .$unique_block_class .multi-select__selection {
                    padding: @drop_padding;
                }
                /* @drop_arrow_size */
                html body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .tdb-s-form-select-icon {
                    font-size: @drop_arrow_size;
                }
                /* @drop_border */
                html body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .select2-selection,
                html body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .tdb-s-form-input,
                html body [class*='tdb-s-select2-$unique_block_class'].select2-dropdown,
                html body [class*='tdb-s-select2-$unique_block_class'] .select2-search__field,
                html body .$unique_block_class .multi-select__selection,
                html body .$unique_block_class .multi-select-options {
                    border-width: @drop_border;
                }
                /* @drop_border_style */
                html body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .select2-selection,
                html body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .tdb-s-form-input,
                html body [class*='tdb-s-select2-$unique_block_class'].select2-dropdown,
                html body [class*='tdb-s-select2-$unique_block_class'] .select2-search__field,
                html body .$unique_block_class .multi-select__selection,
                html body .$unique_block_class .multi-select-options {
                    border-style: @drop_border_style;
                }
                /* @drop_border_radius */
                html body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .select2-selection,
                html body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .tdb-s-form-input,
                html body [class*='tdb-s-select2-$unique_block_class'].select2-dropdown,
                html body [class*='tdb-s-select2-$unique_block_class'] .select2-search__field,
                html body .$unique_block_class .multi-select__selection,
                html body .$unique_block_class .multi-select-options {
                    border-radius: @drop_border_radius;
                }
                /* @drop_height */
                html body [class*='tdb-s-select2-$unique_block_class'] .select2-results__options,
                html body .$unique_block_class .multi-select-options {
                    max-height: @drop_height;
                }
                
                
                
                
                /* @reset_bg */
                body .$unique_block_class .tdb-clear-all-filters-wrap a {
                    background-color: @reset_bg;
                }
                /* @reset_bg_h */
                body .$unique_block_class .tdb-clear-all-filters-wrap a:hover {
                    background-color: @reset_bg_h;
                }
                /* @reset_border_color */
                body .$unique_block_class .tdb-clear-all-filters-wrap a {
                    border-color: @reset_border_color;
                }
                /* @reset_border_color_h */
                body .$unique_block_class .tdb-clear-all-filters-wrap a:hover {
                    border-color: @reset_border_color_h;
                }
                /* @reset_color */
                body .$unique_block_class .tdb-clear-all-filters-wrap .tdb-filters-clear-all-txt,
                body .$unique_block_class .tdb-clear-all-filters-wrap i {
                    color: @reset_color;
                }
                body .$unique_block_class .tdb-clear-all-filters-wrap svg,
                body .$unique_block_class .tdb-clear-all-filters-wrap svg * {
                    fill: @reset_color;
                }
                /* @reset_color_h */
                body .$unique_block_class .tdb-clear-all-filters-wrap a:hover .tdb-filters-clear-all-txt,
                body .$unique_block_class .tdb-clear-all-filters-wrap a:hover i {
                    color: @reset_color_h;
                }
                body .$unique_block_class .tdb-clear-all-filters-wrap a:hover svg,
                body .$unique_block_class .tdb-clear-all-filters-wrap a:hover svg * {
                    fill: @reset_color_h;
                }
                /* @reset_icon_color */
                body .$unique_block_class .tdb-clear-all-filters-wrap svg,
                body .$unique_block_class .tdb-clear-all-filters-wrap svg * {
                    fill: @reset_icon_color;
                }
                /* @reset_icon_color_h */
                body .$unique_block_class .tdb-clear-all-filters-wrap a:hover svg,
                body .$unique_block_class .tdb-clear-all-filters-wrap a:hover svg * {
                    fill: @reset_icon_color_h;
                }
                /* @reset_radius */
                body .$unique_block_class .tdb-filters-clear-all {
                    border-radius: @reset_radius;
                }
                
                /* @color_bg */
                body div.$unique_block_class .tdb-filter-item.color-tdb-filter-item {
                    background-color: @color_bg;
                }
                /* @color_bg_s */
                body div.$unique_block_class .tdb-filter-item.color-tdb-filter-item:hover,
                body div.$unique_block_class .tdb-filter-item.color-tdb-filter-item.selected {
                    background-color: @color_bg_s;
                }
                
                /* @but_txt */
                body .$unique_block_class .button-tdb-filter-item .tdb-filter-item-span {
                    color: @but_txt;
                }
                /* @but_txt_s */
                body .$unique_block_class .button-tdb-filter-item:hover .tdb-filter-item-span,
                body .$unique_block_class .button-tdb-filter-item.selected .tdb-filter-item-span {
                    color: @but_txt_s;
                }
                /* @but_bg */
                body div.$unique_block_class .tdb-block-inner .tdb-filter-item.button-tdb-filter-item {
                    background-color: @but_bg;
                }
                /* @but_bg_s */
                body div.$unique_block_class .tdb-block-inner .tdb-filter-item.button-tdb-filter-item:hover,
                body div.$unique_block_class .tdb-block-inner .tdb-filter-item.button-tdb-filter-item.selected {
                    background-color: @but_bg_s;
                }
                
                /* @check_bg */
                body .$unique_block_class .tdb-filter-item.checkbox-tdb-filter-item .filter-icon {
                    background-color: @check_bg;
                }
                /* @check_bg_s */
                body .$unique_block_class .tdb-filter-item.checkbox-tdb-filter-item.selected .filter-icon {
                    background-color: @check_bg_s;
                }
                /* @check_square */
                body .$unique_block_class .tdb-filter-item.checkbox-tdb-filter-item.selected .filter-icon:after {
                    background-color: @check_square;
                }
                /* @check_label_color */
                body .$unique_block_class .tdb-filter-item.checkbox-tdb-filter-item {
                    color: @check_label_color;
                }
                /* @check_label_color_h */
                body .$unique_block_class .tdb-filter-item.checkbox-tdb-filter-item:hover {
                    color: @check_label_color_h;
                }
                /* @check_label_color_s */
                body .$unique_block_class .tdb-filter-item.checkbox-tdb-filter-item.selected {
                    color: @check_label_color_s;
                }
                
                /* @img_bg */
                body div.$unique_block_class .image-tdb-filter-item img {
                    background-color: @img_bg;
                }
                /* @img_bg_s */
                body div.$unique_block_class .image-tdb-filter-item:hover img,
                body div.$unique_block_class .image-tdb-filter-item.selected img {
                    background-color: @img_bg_s;
                }
                /* @img_txt_color */
                body div.$unique_block_class .image-tdb-filter-item .tdb-img-attr-label {
                    color: @img_txt_color;
                }
                /* @img_txt_color_s */
                body div.$unique_block_class .image-tdb-filter-item:hover .tdb-img-attr-label,
                body div.$unique_block_class .image-tdb-filter-item.selected .tdb-img-attr-label {
                    color: @img_txt_color_s;
                }
                
                /* @drop_color */
                html body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .select2-selection,
                html body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .tdb-s-form-input,
                html body [class*='tdb-s-select2-$unique_block_class'] .select2-search__field,
                html body [class*='tdb-s-select2-$unique_block_class'] .select2-results__options,
                html body .$unique_block_class .multi-select__selection .no-selection,
                html body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .select2-selection--multiple textarea,
                html body .$unique_block_class .multi-select-option {
                    color: @drop_color;
                }
                html body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .select2-selection--multiple textarea::placeholder {
                    color: @drop_color;
                }
                html body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .select2-selection--multiple textarea::-webkit-input-placeholder {
                    color: @drop_color;
                }
                html body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .select2-selection--multiple textarea::-moz-placeholder {
                    color: @drop_color;
                }
                html body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .select2-selection--multiple textarea:-ms-input-placeholder {
                    color: @drop_color;
                }
                html body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .select2-selection--multiple textarea:-moz-placeholder {
                    color: @drop_color;
                }
                /* @drop_arrow_color */
                html body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .tdb-s-form-select-icon {
                    color: @drop_arrow_color;
                }
                /* @drop_bg_color */
                html body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .select2-selection,
                html body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .tdb-s-form-input,
                html body [class*='tdb-s-select2-$unique_block_class'].select2-dropdown,
                html body .$unique_block_class .multi-select__selection,
                html body .$unique_block_class .multi-select-options {
                    background-color: @drop_bg_color;
                }
                /* @drop_bg_color_f */
                html body .$unique_block_class .tdb-s-form .tdb-s-form-group:not(.tdb-s-fg-error) .select2-container--open .select2-selection,
                html body .$unique_block_class .multi-select.open .multi-select__selection {
                    background-color: @drop_bg_color_f;
                }
                /* @drop_border_color */
                html body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .select2-selection,
                html body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .tdb-s-form-input,
                html body [class*='tdb-s-select2-$unique_block_class'].select2-dropdown,
                html body [class*='tdb-s-select2-$unique_block_class'] .select2-search__field,
                html body .$unique_block_class .multi-select__selection,
                html body .$unique_block_class .multi-select-options {
                    border-color: @drop_border_color;
                }
                /* @drop_border_color_f */
                html body .$unique_block_class .tdb-s-form .tdb-s-form-group:not(.tdb-s-fg-error) .select2-container--open .select2-selection,
                html body .$unique_block_class .multi-select.open .multi-select__selection {
                    border-color: @drop_border_color_f !important;
                }
                /* @multi_bg */
                html body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .select2-selection--multiple .select2-selection__choice {
                    background-color: @multi_bg;
                }
                /* @multi_color */
                html body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .select2-selection--multiple .select2-selection__choice {
                    color: @multi_color;
                }
                /* @option_color_h */
                html body [class*='tdb-s-select2-$unique_block_class'] .select2-results__options li:hover,
                html body .$unique_block_class .multi-select-option:hover {
                    color: @option_color_h;
                }
                /* @option_bg_h */
                html body [class*='tdb-s-select2-$unique_block_class'] .select2-results__options li:hover,
                html body .$unique_block_class .multi-select-option:hover {
                    background-color: @option_bg_h;
                }
                /* @option_check_bg */
                html body [class*='tdb-s-select2-$unique_block_class'].tdb-select2-multi .select2-results__option:before {
                    background-color: @option_check_bg;
                }
                /* @option_check_border */
                html body [class*='tdb-s-select2-$unique_block_class'].tdb-select2-multi .select2-results__option:before {
                    border-color: @option_check_border;
                }
                /* @option_check_square */
                html body [class*='tdb-s-select2-$unique_block_class'].tdb-select2-multi .select2-results__option--selected:before {
                    content: url('data:image/svg+xml; utf8,<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"9\" height=\"9\" viewBox=\"0 0 512 512\"><path d=\"M0 0H512V512H0V0z\" fill=\"@option_check_square\"/></svg>');
                }
                
                
                
                /* @fmob_color */
                body .tdb-filters-button-mobile {
                    background-color: @fmob_color;
                }
                /* @fmob_shadow */
                .tdb-filters-button-mobile {
                    box-shadow: @fmob_shadow;
                }
                
                
                
                
                /* @f_label */
                body .$unique_block_class h4 {
                    @f_label
                }
                /* @f_but */
                body .$unique_block_class .button-tdb-filter-item {
                    @f_but
                }
                /* @f_check */
                body .$unique_block_class .tdb-filter-item.checkbox-tdb-filter-item {
                    @f_check
                }
                /* @f_check_s */
                body .$unique_block_class .tdb-filter-item.checkbox-tdb-filter-item.selected {
                    @f_check_s
                }
                /* @f_img */
                body .$unique_block_class .image-tdb-filter-item .tdb-img-attr-label {
                    @f_img
                }
                /* @f_drop */
                html body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .select2-selection,
                html body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .tdb-s-form-input,
                html body [class*='tdb-s-select2-$unique_block_class'] .select2-search__field,
                html body [class*='tdb-s-select2-$unique_block_class'].select2-dropdown,
                html body .$unique_block_class .multi-select__selection .no-selection,
                html body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .select2-selection--multiple textarea,
                html body .$unique_block_class .multi-select-option {
                    @f_drop
                }
                
                /* @count_padd */
                body .$unique_block_class .tdb-filter-item:not(.checkbox-tdb-filter-item):not(.tdb-filter-item-option-select) .td_woo_label_count {
                    padding: @count_padd;
                }
                /* @count_horiz */
                body .$unique_block_class .tdb-filter-item:not(.checkbox-tdb-filter-item):not(.tdb-filter-item-option-select) .td_woo_label_count {
                    right: @count_horiz;
                }
                /* @count_vert */
                body .$unique_block_class .tdb-filter-item:not(.checkbox-tdb-filter-item):not(.tdb-filter-item-option-select) .td_woo_label_count {
                    top: @count_vert;
                }
                /* @count_radius */
                body .$unique_block_class .tdb-filter-item:not(.checkbox-tdb-filter-item):not(.tdb-filter-item-option-select) .td_woo_label_count {
                    border-radius: @count_radius;
                }
                /* @count_txt_color */
                body .$unique_block_class .tdb-filter-item:not(.checkbox-tdb-filter-item):not(.tdb-filter-item-option-select) .td_woo_label_count {
                    color: @count_txt_color;
                }
                /* @count_txt_color_h */
                body .$unique_block_class .tdb-filter-item:not(.checkbox-tdb-filter-item):not(.tdb-filter-item-option-select):hover .td_woo_label_count {
                    color: @count_txt_color_h;
                }
                /* @count_bg_color */
                body .$unique_block_class .tdb-filter-item:not(.checkbox-tdb-filter-item):not(.tdb-filter-item-option-select) .td_woo_label_count {
                    background-color: @count_bg_color;
                }
                /* @count_bg_color_h */
                body .$unique_block_class .tdb-filter-item:not(.checkbox-tdb-filter-item):not(.tdb-filter-item-option-select):hover .td_woo_label_count {
                    background-color: @count_bg_color_h;
                }
                /* @f_count */
                body .$unique_block_class .tdb-filter-item:not(.checkbox-tdb-filter-item):not(.tdb-filter-item-option-select) .td_woo_label_count {
                    @f_count
                }
                /* @f_reset */
                body .$unique_block_class .tdb-filters-clear-all-txt {
                    @f_reset
                }
	                
            </style>";

		$td_css_res_compiler = new td_css_res_compiler( $raw_css );
		$td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

		$compiled_css .= $td_css_res_compiler->compile_css();
		return $compiled_css;
	}

	static function cssMedia( $res_ctx ) {

		/*-- GENERAL-- */
		$res_ctx->load_settings_raw( 'general_style_tdb_filters', 1 );



        /*-- LAYOUT -- */
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
        // dropdown list height
        $drop_height = $res_ctx->get_shortcode_att('drop_height');
        $res_ctx->load_settings_raw( 'drop_height', $drop_height );
        if( $drop_height != '' && is_numeric( $drop_height ) ) {
            $res_ctx->load_settings_raw( 'drop_height', $drop_height . 'px' );
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

        $res_ctx->load_settings_raw( 'drop_color', $res_ctx->get_shortcode_att('drop_color') );
        $res_ctx->load_settings_raw( 'drop_arrow_color', $res_ctx->get_shortcode_att('drop_arrow_color') );
        $res_ctx->load_settings_raw( 'drop_bg_color', $res_ctx->get_shortcode_att('drop_bg_color') );
        $res_ctx->load_settings_raw( 'drop_bg_color_f', $res_ctx->get_shortcode_att('drop_bg_color_f') );
        $res_ctx->load_settings_raw( 'drop_border_color', $res_ctx->get_shortcode_att('drop_border_color') );
        $res_ctx->load_settings_raw( 'drop_border_color_f', $res_ctx->get_shortcode_att('drop_border_color_f') );
        $res_ctx->load_settings_raw( 'multi_bg', $res_ctx->get_shortcode_att('multi_bg') );
        $res_ctx->load_settings_raw( 'multi_color', $res_ctx->get_shortcode_att('multi_color') );
        $res_ctx->load_settings_raw( 'option_color_h', $res_ctx->get_shortcode_att('option_color_h') );
        $res_ctx->load_settings_raw( 'option_bg_h', $res_ctx->get_shortcode_att('option_bg_h') );
        $res_ctx->load_settings_raw( 'option_check_bg', $res_ctx->get_shortcode_att('option_check_bg') );
        $res_ctx->load_settings_raw( 'option_check_border', $res_ctx->get_shortcode_att('option_check_border') );
        $option_check_square = $res_ctx->get_shortcode_att('option_check_square');
        $res_ctx->load_settings_raw( 'option_check_square', $option_check_square );
        if( strpos($option_check_square, '#') !== false ) {
            $res_ctx->load_settings_raw( 'option_check_square', str_replace('#', '%23', $option_check_square) );
        }



        // Mobile filters buton
        $res_ctx->load_settings_raw( 'fmob_color', $res_ctx->get_shortcode_att('fmob_color') );
        $res_ctx->load_shadow_settings( 8, 2, 3, 0, 'rgba(0, 0, 0, 0.18)', 'fmob_shadow' );



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_label' );
        $res_ctx->load_font_settings( 'f_but' );
        $res_ctx->load_font_settings( 'f_img' );
        $res_ctx->load_font_settings( 'f_drop' );


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
	}

	function render( $atts, $content = null ) {

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

        // show count ( this will show the available results for filters )
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
                $clear_all_filters_icon_html = '<span class="tdb-filters-clear-all-icon tdb-filters-clear-all-icon-svg" ' . $clear_all_filters_icon_data . '>' . base64_decode( $clear_all_filters_icon ) . '</span>';
            } else {
                $clear_all_filters_icon_html = '<i class="tdb-filters-clear-all-icon ' . $clear_all_filters_icon . '"></i>';
            }
        }

		// current tax term on cpt tax templates
		global $wp_query, $tdb_state_category;

		// set tax tpl
		if ( !empty( tdb_state_template::get_template_type() ) && 'cpt_tax' === tdb_state_template::get_template_type() ) {
			$tdb_state_category->set_tax();

			// get current term and set
			if ( !empty( $tdb_state_category ) && $tdb_state_category->has_wp_query() ) {

				$current_tax_term_obj = '';
				$tax_template_wp_query = $wp_query;
				$wp_query = $tdb_state_category->get_wp_query();

				$queried_object = get_queried_object();
				if ( $queried_object instanceof WP_Term ) {
					$current_tax_term_obj = $queried_object;
				} elseif ( !empty( $tdb_state_category->queried_object ) ) {
					$current_tax_term_obj = $tdb_state_category->queried_object;
				} elseif ( !empty( $tdb_state_category->tax_query ) && $tdb_state_category->tax_query instanceof WP_Tax_Query ) {
					$current_tax_term_obj = get_term( $tdb_state_category->query_vars['tax_query'][0]['terms'] );
				}

				$wp_query = $tax_template_wp_query;

			}

		}

        // build filters data
		$filters_data = array(
			'filters' => array(),
			'selected' => array()
		);

        // tax fields number
		$tdb_filters_tax_fields_no = apply_filters( 'tdb_filters_tax_fields_number', 5 );

        // make sure the filtered value is and integer, and it's limited
        if ( !is_int( $tdb_filters_tax_fields_no ) || $tdb_filters_tax_fields_no > 10 ) {
	        $tdb_filters_tax_fields_no = 5;
        }

		for ( $i = 1 ; $i <= $tdb_filters_tax_fields_no; $i++ ) {

            // tax filter atts data
            $tax_filter_slug = $this->get_att('tax_' . $i . '_filter_slug_input');
            $tax_filter_type = $this->get_att('tax_' . $i . '_filter_type');
            $tax_filter_action_type = $this->get_att('tax_' . $i . '_filter_action_type');

            if ( !empty( $tax_filter_slug ) ) {
	            $taxonomy = get_taxonomy( $tax_filter_slug );

                if ( $taxonomy ) {

	                $filter_data = array(
		                'terms' => array(),
		                'selected' => ''
	                );

                    // is tax hierarchical
	                $filter_data['hierarchical'] = !empty( $taxonomy->hierarchical );

                    // set the behaviour of tax filters
                    $filter_action_type = empty( $tax_filter_action_type ) ? 'single' : 'multiple';
	                $filter_data['filter_action_type'] = $filter_action_type;

	                // set filter type
	                $filter_data['filter_type'] = 'taxonomy';

	                // filter output type
                    $filter_output_type = !empty( $tax_filter_type ) ? $tax_filter_type : 'button';

                    // set filter output type on filter data
	                $filter_data['type'] = $filter_output_type;

	                // tax filter terms args
                    $args = array(
	                    'hide_empty' => false // ignore empty terms
                    );

	                // current tax term filter
	                if ( !empty( $current_tax_term_obj ) && $taxonomy->name === $current_tax_term_obj->taxonomy ) {

		                // check & set selected terms
		                if ( array_key_exists( 'tdb_tax_' . $taxonomy->name, $_GET ) ) {
			                $filter_data['selected'] = $_GET['tdb_tax_' . $taxonomy->name] . ',' . $current_tax_term_obj->slug;
		                } else {
			                $filter_data['selected'] = $current_tax_term_obj->slug;
		                }

                        // set current tax terms args
		                $term_children = get_term_children( $current_tax_term_obj->term_id, $taxonomy->name );

		                // has children ... get children
		                if ( !empty( $term_children ) ) {

			                // set parent to args to get the child terms
			                $args['parent'] = $current_tax_term_obj->term_id;

                        // is children ... get siblings
		                } elseif ( $current_tax_term_obj->parent > 0 ) {

			                // set child_of to args to get sibling terms
			                $args['child_of'] = $current_tax_term_obj->parent;

			                // force single selection
			                $filter_data['filter_action_type'] = 'single';

                        // no children or parent ... get same level siblings ( first level categories )
		                } else {

			                // set args to get the same level siblings ( the first level taxonomies )
			                $args['parent'] = 0;
			                $args['exclude'] = $current_tax_term_obj->term_id; // exclude current, we'll add it below as first

			                // force single selection..
			                $filter_data['filter_action_type'] = 'single';

		                }


	                } else {

		                // check & set selected terms
		                if ( array_key_exists( 'tdb_tax_' . $taxonomy->name, $_GET ) ) {
			                $filter_data['selected'] = $_GET['tdb_tax_' . $taxonomy->name];
		                }

		                // add selection to selected filters array
		                if ( !empty( $filter_data['selected'] ) ) {
			                $filters_data['selected']['tdb_tax_' . $taxonomy->name] = $filter_data['selected'];
		                }

	                }

                    // get tax filter terms
	                $terms = get_terms(
                        $taxonomy->name,
                        $args
                    );

	                //echo '<pre>' . print_r( $args, true ) . '</pre>';
	                //echo '<pre>' . print_r( $terms, true ) . '</pre>';

	                if ( !empty( $terms ) && is_array( $terms ) ) {

		                // if excluded ... add current as first
                        if ( !empty( $args['exclude'] ) && ! empty( $current_tax_term_obj ) ) {
	                        array_unshift( $terms, $current_tax_term_obj );
                        }

                        // sort terms for dropdowns output type
                        if ( $filter_output_type === 'dropdown' ) {

                            $parent = 0;
	                        if ( !empty( $current_tax_term_obj ) && $taxonomy->name === $current_tax_term_obj->taxonomy ) {

                                if ( !empty( $args['child_of'] ) ) {
                                    $parent = $args['child_of'];
                                } elseif ( $args['parent'] ) {
	                                $parent = $args['parent'];
                                }

                            }

	                        // sort terms hierarchically
	                        $sorted_terms = self::sort_terms_hierarchically( $terms, $parent );

	                        $terms_array = [];
	                        if ( !empty( $sorted_terms ) ) {
                                foreach ( $sorted_terms as $term ) {
	                                $terms_array[] = $term;

	                                // add term's children
	                                self::add_term_children($terms_array, $term );

                                }
	                        }

	                        $terms = $terms_array;

                        }

		                // add terms to tax data
		                $filter_data['terms'] = $terms;

	                }

	                // add filter to filters data array
	                $filters_data['filters'][] = (object) array_merge( (array)$taxonomy, $filter_data );

                }

            }

        }

        $buffy = '';

        if( empty( $filters_data['filters'] ) ) {

	        $buffy .= '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';
	            $buffy .= '<div id=' . $this->block_uid . ' class="tdb-block-inner td-fix-index">';
                    $buffy .= td_util::get_block_error('Flex Loop Filters', 'This shortcode requires you to fill in at least one <strong>Taxonomy slug</strong> to work.' );
	            $buffy .= '</div>';
	        $buffy .= '</div>';

            return $buffy;
        }

		$buffy .= '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';
		//$buffy .= '<pre>' . print_r( $filters_data, true ) . '</pre>';

			// get the block css
			$buffy .= $this->get_block_css();

			// get the js for this block
			$buffy .= $this->get_block_js();

			// block inner html
			$buffy .= '<div id=' . $this->block_uid . ' class="tdb-block-inner td-fix-index">';

                // enabled on mob
                $enable_on_mob = $this->get_att('enable_on_mob');

                // render the block js
                ob_start();
                ?>
                <script>
                    jQuery().ready( function () {

                        var tdbFiltersItem = new tdbFilters.item();

                        tdbFiltersItem.blockUid = '<?php echo $this->block_uid; ?>';
                        tdbFiltersItem.blockAtts = '<?php echo json_encode( $this->get_all_atts(), JSON_UNESCAPED_SLASHES ); ?>';
                        tdbFiltersItem.jqueryObj = jQuery('.<?php echo $this->block_uid ?>');
                        <?php if ( $enable_on_mob === 'yes' ) { ?>
                            tdbFiltersItem.enabled_on_mobiles = true;
                            var tdHtmlButton = '<div class="tdb-filters-button-mobile" style="display:none;"><svg xmlns="http://www.w3.org/2000/svg" class="td-woo-filter-icon" width="24" height="24" viewBox="0 0 24 24"><path fill="#000" d="M11.194 9.688v-1.61H18v1.61h-6.805zm3.117 2.545h1.611v2.08H18v1.609h-2.078V18h-1.611v-5.767zM6 15.922v-1.61h6.804v1.61H6zM8.076 6H9.69v5.767H8.077V9.689H6v-1.61h2.077V6z"/></svg><svg xmlns="http://www.w3.org/2000/svg" class="td-woo-close-icon" width="24" height="24" viewBox="0 0 24 24"><path fill="#000" d="M18.6,6.787l-5.666,5.666,5.658,5.658a1,1,0,0,1,0,1.418l-0.019.019a1,1,0,0,1-1.418,0L11.5,13.889,5.842,19.545a1,1,0,0,1-1.418,0l-0.019-.019a1,1,0,0,1,0-1.418l5.656-5.656L4.4,6.79a1,1,0,0,1,0-1.418l0.019-.019a1,1,0,0,1,1.418,0L11.5,11.017l5.666-5.666a1,1,0,0,1,1.418,0L18.6,5.37A1,1,0,0,1,18.6,6.787Z"/></svg></div>';
                            jQuery(".td-theme-wrap").prepend(tdHtmlButton);
                        <?php } ?>
                        <?php if ( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) { ?>
                        tdbFiltersItem.inComposer = true;
                        <?php } ?>

                        tdbFilters.addItem(tdbFiltersItem);

                    });
                </script>
                <?php
                td_js_buffer::add_to_footer("\n" . td_util::remove_script_tag( ob_get_clean() ) );

                // is tdc ( in composer or composer block update request )
                $is_tdc = ( tdc_state::is_live_editor_iframe() || tdc_state::is_live_editor_ajax() );

				// clear all button
		        $selected_filters = $filters_data['selected'] ?? array();
                if ( array_filter( $selected_filters ) || ( $is_tdc && $reset_show != '' ) ) {
                    $buffy .= '<div class="tdb-filter-container tdb-clear-all-filters-wrap">';
                        $buffy .= '<a class="tdb-filters-clear-all" href="">';
                            if( $clear_all_filters_txt != '' ) {
                                $buffy .= '<span class="tdb-filters-clear-all-txt">' . $clear_all_filters_txt . '</span>';
                            }
                            $buffy .= $clear_all_filters_icon_html;
                        $buffy .= '</a>';
                    $buffy .= '</div>';
                }

                // dropdowns filters data
                $dropdown_filters_data = array();

                // dropdowns filters data index
                $dropdown_filters_data_index = 0;

                //$buffy .= '<pre>' . print_r( $filters_data['filters'], true ) . '</pre>';
                $buffy .= '<div class="tdb-filters-wrap">';

                    // run through filters data array to build filters output buffer
                    foreach ( $filters_data['filters'] as $filter ) {

                        $filter_name = $filter->name ?? '';
                        $filter_singular_name = $filter->labels->singular_name ?? '';
                        $filter_label = $filter->label ?? '';
	                    $filter_data_type = $filter->filter_type;
	                    $filter_action_type = $filter->filter_action_type;
	                    $filter_type = $filter->type;

                        // set as link ... used for hierarchical taxonomies to set terms filters as links
                        $as_link = ( $filter_action_type === 'single' );

	                    // show count
	                    $show_filter_count = ( $show_count === 'yes' );

	                    // hide empty ( count = 0 )
	                    $hide_empty_terms = ( $hide_empty === 'yes' );

                        switch ( $filter_data_type ) {
                            case 'taxonomy':
	                            $filter_prefix = 'tdb_tax';
	                            $filter_values = $filter->terms;
                                break;
                            default:
	                            $filter_prefix = 'tdb_';
	                            $filter_values = array();
                                break;
                        }

                        // current filter selected values
                        $selected_values = explode( ',', $filter->selected );
                        $selected_values_array = !empty( array_filter( $selected_values ) ) ? $selected_values : array();

	                    //echo '<pre>' . print_r( $selected_filters, true ) . '</pre>';

                        // filter output
                        $filter_data = '';

                        // run through filter values to build filters output buffer
                        if ( !empty( $filter_values ) && is_array( $filter_values ) ) {
	                        foreach ( $filter_values as $filter_value ) {

		                        switch ( $filter_data_type ) {
			                        case 'taxonomy':
				                        $value = $filter_value->slug;
				                        $name = $filter_value->name;
				                        $id = $filter_value->term_id;
				                        break;
		                        }

		                        if ( empty( $value ) )
			                        continue;

		                        // is selected
		                        $is_selected = in_array( apply_filters( 'editable_slug', $value, $filter_value ), $selected_values_array );
		                        $selected_class = $is_selected ? 'selected' : '';

		                        // on tdc
		                        if ( $is_tdc ) {
                                    $selected_class = '';
                                    $is_selected = false;
		                        }

		                        // count
		                        $filter_label_count = false;
		                        if ( !$is_tdc && !$is_selected ) { // don't count selected terms or on composer requests
		                            $filter_label_count = $this->filter_label_count( $filter_data_type, $filter_value, $filter_type, $filter_action_type );
		                        }

		                        // hide empty terms
		                        if ( $hide_empty_terms && $filter_label_count === 0 )
			                        continue;

		                        // add count label
                                if ( $filter_type !== 'dropdown' && $filter_type !== 'dropdown_search' ) {

	                                $filter_data .= sprintf(
		                                '<li class="tdb-filter-item %1$s-tdb-filter-item %1$s-tdb-filter-item-%3$s %2$s %6$s" 
                                        title="%4$s" 
                                        data-term-slug="%3$s" 
                                        data-term-id="%5$d" 
                                        data-term-name="%4$s" 
                                    >',
		                                ( !empty( $filter_type ) ) ? esc_attr( $filter_type ) : 'button', // default to button
		                                esc_attr( $selected_class ),
		                                esc_attr( $value ),
		                                esc_html( $name ),
		                                esc_attr( $id ),
		                                esc_attr( ( $as_link ) ? 'tdb-filter-link' : '' )
	                                );

	                                if ( $is_tdc && $show_filter_count ) {
		                                $filter_data .= '<span class="td_woo_label_count"> ' . rand( 5, 15 ) . '</span>'; // generate a random count label on composer
	                                } elseif ( !$is_tdc && !$is_selected && $show_filter_count ) {
		                                $filter_data .= '<span class="td_woo_label_count">' . $filter_label_count . '</span>'; // count label
	                                }

                                }

		                        // filter type items html ... <li> tags for color/button/image & default types
                                // <option> tags for dropdowns
		                        switch ( $filter_type ) {
			                        case 'image':

				                        // get filter image
				                        $image = array();
                                        if ( $filter_data_type === 'taxonomy' && $filter_name === 'category' ) {

	                                        // get the category bg image from theme panel
	                                        $tdc_cat_image = td_util::get_category_option( $id, 'tdc_image' );
	                                        if( $tdc_cat_image !== '' ) {
		                                        $image = array( esc_url( $tdc_cat_image ), '66', '66' );
	                                        }

                                        } else {
	                                        $term_meta_img_attachment_id = get_term_meta( $id, 'tdb_filter_image', true );
	                                        if ( !empty( $term_meta_img_attachment_id ) ) {
		                                        $image = wp_get_attachment_image_src( $term_meta_img_attachment_id );
	                                        }
                                        }

				                        if ( empty( $image ) ) {
					                        $image = array(
						                        esc_url( TDB_URL . '/assets/images/no_img.png' ), // img src
						                        '66', // img width
						                        '66' // img height
					                        );
				                        }

				                        // check if it's set as link
				                        if ( $as_link ) {
					                        $filter_data .= sprintf( '<a href="%1$s">%2$s</a>',
						                        esc_url( $this->filter_link( $filter_value, array_filter( $selected_filters ) ) ),
						                        sprintf(
							                        '<img aria-hidden="true" alt="%s" src="%s" width="%d" height="%d" />',
							                        esc_attr( $name ),
							                        esc_url( $image[0] ),
							                        $image[1],
							                        $image[2]
						                        )
					                        );
                                        } else {
					                        $filter_data .= sprintf(
						                        '<img aria-hidden="true" alt="%s" src="%s" width="%d" height="%d" />',
						                        esc_attr( $name ),
						                        esc_url( $image[0] ),
						                        $image[1],
						                        $image[2]
					                        );
                                        }

				                        // display option name
				                        if( $this->get_att('img_display') == 'img_txt' ) {
				                            $filter_data .= sprintf( '<span class="tdb-img-attr-label">%s</span>', esc_attr( $name ) );
				                        }

				                        break;
			                        case 'color':

				                        // get filter color
				                        if ( $filter_data_type === 'taxonomy' && $filter_name === 'category' ) {

					                        // get the category color from theme panel
					                        $term_meta_color = td_util::get_category_option( $id, 'tdc_color' );

                                        } else {
					                        $term_meta_color = get_term_meta( $id, 'tdb_filter_color', true );
                                        }

				                        $sanitized_hex_color = sanitize_hex_color( $term_meta_color );;
				                        $color = !empty( $sanitized_hex_color ) ? $sanitized_hex_color : '#000';

				                        // check if it's set as link
				                        if ( $as_link ) {
					                        $filter_data .= sprintf( '<a href="%1$s">%2$s</a>',
						                        esc_url( $this->filter_link( $filter_value, array_filter( $selected_filters ) ) ),
						                        sprintf(
							                        '<span class="tdb-filter-item-span tdb-filter-item-span-%s" style="background-color:%s;"></span>',
							                        esc_attr( $filter_type ),
							                        esc_attr( $color )
						                        )
					                        );
				                        } else {
					                        $filter_data .= sprintf(
						                        '<span class="tdb-filter-item-span tdb-filter-item-span-%s" style="background-color:%s;"></span>',
						                        esc_attr( $filter_type ),
						                        esc_attr( $color )
					                        );
				                        }

				                        break;
                                    case 'dropdown':

	                                    // link data for taxonomies when the filter_action_type option is set on single selection
	                                    $data_link = $as_link ? 'data-filter-link="' . esc_url( $this->filter_link( $filter_value, array_filter( $selected_filters ) ) ) . '"' : '';

                                        $filter_data .= '<option value="' . $id . '" data-term-slug="' . esc_attr( $value ) . '" ' . $selected_class . ' ' . $data_link . '>' . $name;

                                        // count label
	                                    if ( $is_tdc && $show_filter_count ) {
		                                    $filter_data .= ' (' . rand( 5, 15 ) . ')';
	                                    } elseif ( !$is_tdc && !$is_selected && $show_filter_count ) {
		                                    $filter_data .= ' (' . $filter_label_count . ')';
	                                    }

	                                    $filter_data .= '</option>';

                                        break;
			                        case 'dropdown_search':
                                        // do nothing ... the options will be rendered in frontend based on user terms search query input

                                        // add selected options
                                        if ( $is_selected ) {
	                                        $filter_data .= '<option value="' . $id . '" data-term-slug="' . esc_attr( $value ) . '" ' . $selected_class . '>' . $name;
                                        }

				                        break;
			                        case 'button':
				                    default:

                                        // check if it's set as link
                                        if ( $as_link ) {
	                                        $filter_data .= sprintf( '<a href="%1$s">%2$s</a>', esc_url( $this->filter_link( $filter_value, array_filter( $selected_filters ) ) ), sprintf(
	                                            '<span class="tdb-filter-item-span tdb-filter-item-span-button">%s</span>',
	                                            esc_html( $name )
                                            ) );
                                        } else {
	                                        $filter_data .= sprintf(
		                                        '<span class="tdb-filter-item-span tdb-filter-item-span-button">%s</span>',
		                                        esc_html( $name )
	                                        );
                                        }

				                        break;
		                        }

		                        if ( $filter_type !== 'dropdown' && $filter_type !== 'dropdown_search' ) {
			                        $filter_data .= '</li>';
                                }

	                        }
                        }

                        // set no filters class
                        $no_filters = ( empty( $filter_data ) && $filter_type !== 'dropdown_search' ) ? 'tdb-no-filters ' : '';

                        // filter container
                        $buffy .= '<div class="tdb-filter-container tdb-filter-' . $filter_name . ' ' . $no_filters . '" >';

                            // add filter title
                            if( $hide_headers == '' ) {
                                $buffy .= '<div class="td-block-title-wrap">';
                                    $buffy .= '<h4 class="tdb-filter-title ' . $td_css_cls_block_title . '">';
                                        $buffy .= '<span>' . $filter_label . '</span>';
                                    $buffy .= '</h4>';
                                $buffy .= '</div>';
                            }

                            // filter type wrapper html . <ul> list for color/button & default types
                            switch ( $filter_type ) {
                                case 'dropdown':
	                            case 'dropdown_search':

                                    // dropdown uid
                                    $dropdown_uid = $this->block_uid . '_' . $dropdown_filters_data_index;

                                    // increment dropdown index
                                    $dropdown_filters_data_index++;

                                    // selected
	                                $selected = empty( $selected_values_array ) ? 'selected' : '';

                                    // multiple
                                    $multiple = ( $filter_action_type === 'multiple' ) ? ' name="tdb-filter-dropdown-' . $dropdown_uid .  '[]" multiple="multiple"' : '';

                                    // add it to dropdown filters data ... this will be used later to add the dropdown filters data to js
                                    $dropdown_filters_data[] = array(
                                        'taxonomy' => $filter_name,
                                        'taxonomy_name' => $filter_label,
                                        'type' => $filter_type,
                                        'is_multi_select' => !empty( $multiple ),
                                        'prefix' => $filter_prefix,
                                        'filter_singular_name' => $filter_singular_name
                                    );

                                    // is multi select class
                                    $multi_select_class = !empty( $multiple ) ? ' multiple' : '';

                                    // no option
                                    $default_option = ( ( $filter_type !== 'dropdown_search' && empty( $multiple ) ) || $is_tdc ) ? '<option value="" ' . $selected . '>-- Select ' . lcfirst( $filter_singular_name ) . ' --</option>' : '';

	                                $buffy .= '<div class="tdb-s-form ' . $dropdown_uid . '">';
                                        $buffy .= '<div class="tdb-s-form-content">';
                                            $buffy .= '<div class="tdb-s-fc-inner">';
                                                $buffy .= '<div class="tdb-s-form-group">';
                                                    $buffy .= '<div class="tdb-s-form-select-wrap">';
                                                        $buffy .= sprintf(
                                                            '<select class="tdb-s-form-input tdb-filter-item-dropdown%6$s" data-taxonomy="%4$s_%3$s" %5$s>%1$s%2$s</select>',
	                                                        $default_option,
                                                            $filter_data,
                                                            $filter_name,
                                                            $filter_prefix,
	                                                        $multiple,
	                                                        $multi_select_class
                                                        );
                                                        $buffy .= '<svg class="tdb-s-form-select-icon" xmlns="http://www.w3.org/2000/svg" width="14" height="8" viewBox="0 0 14 8"><path d="M12,16a1,1,0,0,1-.707-.293l-6-6A1,1,0,0,1,6.707,8.293L12,13.586l5.293-5.293a1,1,0,0,1,1.414,1.414l-6,6A1,1,0,0,1,12,16Z" transform="translate(-5 -8)"/></svg>';
                                                    $buffy .= '</div>';
                                                $buffy .= '</div>';
                                            $buffy .= '</div>';
                                        $buffy .= '</div>';
	                                $buffy .= '</div>';

                                    break;
                                case 'image':
                                case 'color':
                                case 'button':
                                default:
                                    $buffy .= sprintf(
                                        '<ul class="tdb-filter-items-wrapper %1$s" data-taxonomy="%2$s_%3$s">%4$s</ul>',
                                        "$filter_type-list-wrapper",
                                        $filter_prefix,
                                        $filter_name,
                                        $filter_data
                                    );
                                break;
                            }

                        $buffy .= '</div>';

                    }

			    $buffy .= '</div>';

			$buffy .= '</div>';

		$buffy .= '</div>';

		if( !( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) ) {

            if ( !empty( $dropdown_filters_data ) ) {

                foreach ( $dropdown_filters_data as $index => $dropdown_filter_data ) {

	                ob_start();
	                ?>
                    <script>

                        /* global jQuery:{} */
                        jQuery().ready( function () {

                            let uid = '<?php echo $this->block_uid ?>',
                                dropdown_uid = '<?php echo $this->block_uid . '_' . $index ?>',
                                blockObj = jQuery('.<?php echo $this->block_uid ?>'),
                                dropdownObj = jQuery('.<?php echo $this->block_uid . '_' . $index ?>');

                            let tdbFiltersDropdownItem = new tdbFiltersDropdown.item();

                            // block uid
                            tdbFiltersDropdownItem.uid = uid;

                            // dropdown uid
                            tdbFiltersDropdownItem.dropdownUid = dropdown_uid;

                            // block object
                            tdbFiltersDropdownItem.blockObj = blockObj;

                            // dropdown object
                            tdbFiltersDropdownItem.dropdownObj = dropdownObj;

                            // dropdown filter type
                            tdbFiltersDropdownItem.type = '<?php echo $dropdown_filter_data['type'] ?>';

                            // dropdown filter prefix
                            tdbFiltersDropdownItem.prefix = '<?php echo $dropdown_filter_data['prefix'] ?>';

                            // taxonomy
                            tdbFiltersDropdownItem.taxonomy = '<?php echo $dropdown_filter_data['taxonomy'] ?>';

                            // taxonomy_name
                            tdbFiltersDropdownItem.taxonomy_name = '<?php echo $dropdown_filter_data['taxonomy_name'] ?>';

                            // filter_singular_name
                            tdbFiltersDropdownItem.filter_singular_name = '<?php echo $dropdown_filter_data['filter_singular_name'] ?>';

                            // in composer
	                        <?php if ( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) { ?>
                            tdbFiltersDropdownItem.inComposer = true;
	                        <?php } ?>

                            // is multi select
	                        <?php if ( $dropdown_filter_data['is_multi_select'] ) { ?>
                            tdbFiltersDropdownItem.isMultiSelect = true;
	                        <?php } ?>

                            tdbFiltersDropdown.addItem( tdbFiltersDropdownItem );

                        });

                    </script>
	                <?php
	                td_js_buffer::add_to_footer( "\n" . td_util::remove_script_tag( ob_get_clean() ) );

                }

            }

		}

		return $buffy;

	}

	/*
	 * td_block.php > js_tdc_get_composer_block hook
	 * this runs when block is updated in td composer
	 */
	function js_tdc_callback_ajax() {
		$buffy = '';

		// enabled on mob
		$enable_on_mob = $this->get_att('enable_on_mob');

		// add a new composer block - that one has the delete callback
		$buffy .= $this->js_tdc_get_composer_block();

		ob_start();

		?>
        <script>
            /* global jQuery:{} */
            ( function () {

                var tdbFiltersItem = new tdbFilters.item();

                tdbFiltersItem.blockUid = '<?php echo $this->block_uid; ?>';
                tdbFiltersItem.blockAtts = '<?php echo json_encode( $this->get_all_atts(), JSON_UNESCAPED_SLASHES ); ?>';
                tdbFiltersItem.jqueryObj = jQuery('.<?php echo $this->block_uid ?>');

                var tdThemeWrapEl = jQuery(".td-theme-wrap");

	            <?php if ( $enable_on_mob === 'yes' ) { ?>
                    tdbFiltersItem.enabled_on_mobiles = true;
                    var tdbMobileFiltersButton = jQuery(".tdb-filters-button-mobile");
                    if ( !tdbMobileFiltersButton.length ) { // button not found
                        // add it ...
                        var tdHtmlButton = '<div class="tdb-filters-button-mobile" style="display:none;"><svg xmlns="http://www.w3.org/2000/svg" class="td-woo-filter-icon" width="24" height="24" viewBox="0 0 24 24"><path fill="#000" d="M11.194 9.688v-1.61H18v1.61h-6.805zm3.117 2.545h1.611v2.08H18v1.609h-2.078V18h-1.611v-5.767zM6 15.922v-1.61h6.804v1.61H6zM8.076 6H9.69v5.767H8.077V9.689H6v-1.61h2.077V6z"/></svg><svg xmlns="http://www.w3.org/2000/svg" class="td-woo-close-icon" width="24" height="24" viewBox="0 0 24 24"><path fill="#000" d="M18.6,6.787l-5.666,5.666,5.658,5.658a1,1,0,0,1,0,1.418l-0.019.019a1,1,0,0,1-1.418,0L11.5,13.889,5.842,19.545a1,1,0,0,1-1.418,0l-0.019-.019a1,1,0,0,1,0-1.418l5.656-5.656L4.4,6.79a1,1,0,0,1,0-1.418l0.019-.019a1,1,0,0,1,1.418,0L11.5,11.017l5.666-5.666a1,1,0,0,1,1.418,0L18.6,5.37A1,1,0,0,1,18.6,6.787Z"/></svg></div>';
                        tdThemeWrapEl.prepend(tdHtmlButton);
                    }
	            <?php } else { ?>
                    tdThemeWrapEl.find('.tdb-filters-button-mobile').remove(); // remove the filters on mobile trigger button
	            <?php } ?>

	            <?php if ( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) { ?>
                tdbFiltersItem.inComposer = true;
	            <?php } ?>

                tdbFilters.addItem(tdbFiltersItem);

            })();
        </script>
		<?php

		return $buffy . td_util::remove_script_tag( ob_get_clean() );
	}

	/*
     * gets the total results count after applying the given filter to the active filters
	 *
	 * @param $filter_data_type - the filter data type ( taxonomy/custom filed etc. )
	 * @param $filter - filter(term) data array
	 * @param $filter_type - the filter type ( color/image/button/dropdown )
	 *
	 * @return int - the number of total available results after applying the given filter
	 *
 	 */
	function filter_label_count( $filter_data_type, $filter, $filter_type, $filter_action_type ) {

        // td query atts init
		$atts = array();

		// process current filter data type
		switch ( $filter_data_type ) {
			case 'taxonomy':
				$filter_key = 'tdb_tax_' . $filter->taxonomy;
				break;
            default:
                $filter_key = '';
                break;
		}

		// apply tdb filters
		$filters = $_GET ?? array();
		if( !empty( $filters[$filter_key] ) && ( ( $filter_type === 'dropdown' && $filter_action_type === 'multiple' ) || ( $filter_type !== 'dropdown' ) ) ) {
			$filters[$filter_key] .= ',' . $filter->slug;
		} else {
			$filters[$filter_key] = $filter->slug;
		}

		// taxonomies filters(terms) ids(category_ids) init
		$taxonomies_filters_ids = array();

        // process filters
		foreach ( $filters as $filter_id => $filter_values ) {

			// ignore filters not starting with 'tdb_'
			if ( strpos( $filter_id, 'tdb_' ) === false )
				continue;

			// taxonomies filters
			if ( strpos( $filter_id, 'tdb_tax' ) !== false ) {
				$taxonomy = str_replace( 'tdb_tax_', '', $filter_id );
				$tax_terms = array_map( 'sanitize_title', explode( ',', $filter_values ) );

				// check slugs
				foreach ( $tax_terms as $tax_term ) {
					$the_tax_term = get_term_by( 'slug', $tax_term, $taxonomy );
					if ( false !== $the_tax_term ) {
						$taxonomies_filters_ids[] = $the_tax_term->term_id;
					}
				}

			}

		}

        // set taxonomies filters(terms) ids(category_ids) on atts
		if ( !empty( $taxonomies_filters_ids ) ) {
			$atts['category_ids'] = implode( ',', $taxonomies_filters_ids );
			$atts['in_all_terms'] = 'yes'; // filtered results must belong to all taxonomies
			$atts['block_type'] = 'tdb_filters_loop'; // set the block type to simulate a tdb_filters_loop query
			$atts['include_children'] = 'no'; // do not include child terms
		}

		// set post type
        if ( !empty( $_GET['post_type'] ) ) {
	        $atts['installed_post_types'] = tdb_util::clean( wp_unslash( $_GET['post_type'] ) );
        }

		// set search query
		global $wp_query, $tdb_state_search;
		if ( !empty($tdb_state_search) && $tdb_state_search->has_wp_query() && $filter_action_type === 'multiple' ) {

			$search_template_wp_query = $wp_query;
			$wp_query = $tdb_state_search->get_wp_query();

			$atts['search_query'] = get_search_query();

			$wp_query = $search_template_wp_query;

		}

        // run query
		$filter_query = td_data_source::get_wp_query($atts);

        // filter query results
		$filter_query_results = (object) array(
			'total' => count( $filter_query->posts ),
		);

        return $filter_query_results->total;

    }

	/*
	 * gets the filter link - used for taxonomies that have filter_action_type set on 'single' ( when it's set as link )
	 *
	 * @param $term - the term(filter) object
	 * @param $selected_filters - selected filters array
	 *
	 * @return int - the number of total available results(products) after applying the given term filter
	 */
	function filter_link( $filter, $selected_filters ) {

		// add selected filters
		return add_query_arg(
			$selected_filters,
			get_term_link( $filter->term_id, $filter->taxonomy )
		);

	}

	/**
	 * function for sorting terms hierarchically
	 *
	 * @return array
	 */
	function sort_terms_hierarchically( $terms, $parent_id = 0 ) {

		$terms_array = array();

		foreach ( $terms as $term ) {

			if ( $term->parent == $parent_id ) {
                $term->children = $this->sort_terms_hierarchically( $terms, $term->term_id );
				$terms_array[$term->term_id] = $term;
			}

		}

		return $terms_array;

	}

    /**
     * recursively sets a term's children
     *
     * @return void
     *
     */
    function add_term_children( array &$to_array, $term, $level = 1 ) {

	    $terms_name_prefix = str_repeat('-', $level );
	    if( $terms_name_prefix != '' ) {
		    $terms_name_prefix .= ' ';
	    }
	    $level++;

        if ( !empty( $term->children ) ) {
            foreach ( $term->children as $term ) {
                $term->name = $terms_name_prefix . $term->name;
                $to_array[] = $term;
                self::add_term_children( $to_array, $term, $level );
            }
        }

    }

}