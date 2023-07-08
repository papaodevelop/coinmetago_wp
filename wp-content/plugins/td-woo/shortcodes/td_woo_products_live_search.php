<?php

/**
 * Class td_woo_products_live_search - shortcode for woocommerce products live search
 */
class td_woo_products_live_search extends td_block {

    public function get_custom_css() {
        // $unique_block_class
        $unique_block_class = $this->block_uid;

        $compiled_css = '';

	    $raw_css =
            "<style>
            
                /* @general_style */
                .td_woo_products_live_search {
                    margin-bottom: 0;
                    z-index: 1000;
                    clear: none;
                    vertical-align: middle;
                }
                .td_woo_products_live_search .tdw-block-inner {
                    position: relative;
                    display: inline-block;
                    width: 100%;
                }
                .td_woo_products_live_search .tdw-search-btn {
                    display: flex;
                    align-items: center;
                    position: relative;
                    text-align: center;
                    color: #4db2ec;
                }
                .td_woo_products_live_search .tdw-search-btn:after {
                    visibility: hidden;
                    opacity: 0;
                    content: '';
                    display: block;
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    right: 0;
                    margin: 0 auto;
                    width: 0;
                    height: 0;
                    border-style: solid;
                    border-width: 0 6.5px 7px 6.5px;
                    -webkit-transform: translate3d(0, 20px, 0);
                    transform: translate3d(0, 20px, 0);
                    -webkit-transition: all 0.4s ease;
                    transition: all 0.4s ease;
                    border-color: transparent transparent #4db2ec transparent;
                    z-index: 10;
                }
                .td_woo_products_live_search .tdw-drop-down-search-open + .tdw-search-btn:after {
                    visibility: visible;
                    opacity: 1;
                    -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
                }
                .td_woo_products_live_search .tdw-search-icon,
                .td_woo_products_live_search .tdw-search-txt {
                    -webkit-transition: all 0.3s ease-in-out;
                    transition: all 0.3s ease-in-out;
                }
                .td_woo_products_live_search .tdw-search-icon-svg {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
                .td_woo_products_live_search .tdw-search-icon-svg svg {
                    height: auto;
                }
                .td_woo_products_live_search .tdw-search-icon-svg svg,
                .td_woo_products_live_search .tdw-search-icon-svg svg * {
                    fill: #4db2ec;
                }
                .td_woo_products_live_search .tdw-search-txt {
                    position: relative;
                    line-height: 1;
                }
                .td_woo_products_live_search .tdw-drop-down-search {
                    visibility: hidden;
                    opacity: 0;
                    position: absolute;
                    top: 100%;
                    left: 0;
                    -webkit-transform: translate3d(0, 20px, 0);
                    transform: translate3d(0, 20px, 0);
                    -webkit-transition: all 0.4s ease;
                    transition: all 0.4s ease;
                    pointer-events: none;
                    z-index: 10;
                }
                .td_woo_products_live_search .tdw-drop-down-search-open {
                    visibility: visible;
                    opacity: 1;
                    -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
                }
                .td_woo_products_live_search .tdw-drop-down-search-inner {
                    position: relative;
                    max-width: 300px;
                    pointer-events: all;
                }
                .td_woo_products_live_search .tdw-drop-down-search .tdw-search-form {
                    position: relative;
                    padding: 20px;
                    border-width: 3px 0 0;
                    border-style: solid;
                    border-color: #4db2ec;
                    pointer-events: auto;
                }
                .td_woo_products_live_search .tdw-drop-down-search .tdw-search-form:before {
                    content: '';
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: #fff;
                }
                .td_woo_products_live_search .tdw-search-form-inner {
                    position: relative;
                    display: flex;
                    background-color: #fff;
                }
                .td_woo_products_live_search .tdw-search-form-inner:after {
                    content: '';
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    border: 1px solid #e1e1e1;
                    pointer-events: none;
                }
                .td_woo_products_live_search .tdw-search-form-btn,
                .td_woo_products_live_search .tdw-search-form-input {
                    height: auto;
                    min-height: 32px;
                }
                .td_woo_products_live_search .tdw-search-form-input {
                    color: #444;
                    flex: 1;
                    background-color: transparent;
                    border: 0;
                }
                .td_woo_products_live_search .tdw-search-form-input.tdw-search-nofocus {
                    color: transparent;
                    text-shadow: 0 0 0 #444;
                }
                .td_woo_products_live_search  .tdw-search-form-btn {
                    margin-bottom: 0;
                    padding: 0 15px;
                    background-color: #222222;
                    font-family: 'Roboto', sans-serif;
                    font-size: 13px;
                    font-weight: 500;
                    color: #fff;
                    -webkit-transition: all 0.3s ease;
                    transition: all 0.3s ease;
                    z-index: 1;
                }
                .td_woo_products_live_search .tdw-search-form-btn:hover {
                    background-color: #4db2ec;
                }
                .td_woo_products_live_search .tdw-search-form-btn i,
                .td_woo_products_live_search .tdw-search-form-btn span {
                    display: inline-block;
                    vertical-align: middle;
                }
                .td_woo_products_live_search .tdw-search-form-btn .tdw-search-form-btn-icon {
                    position: relative;
                }
                .td_woo_products_live_search .tdw-search-form-btn i {
                    font-size: 12px;
                }
                .td_woo_products_live_search .tdw-search-form-btn .tdw-search-form-btn-icon-svg {
                    line-height: 0;
                }
                .td_woo_products_live_search .tdw-search-form-btn svg {
                    width: 12px;
                    height: auto;
                }
                .td_woo_products_live_search .tdw-search-form-btn svg,
                .td_woo_products_live_search .tdw-search-form-btn svg * {
                    fill: #fff;
                    transition: all 0.3s ease;
                    -webkit-transition: all 0.3s ease;
                }
                .td_woo_products_live_search .tdw-regular-search .tdw-aj-search {
                    visibility: hidden;
                    opacity: 0;
                    width: 100%;
                    position: absolute;
                    top: 100%;
                    left: 0;
                    -webkit-transform: translate3d(0, 20px, 0);
                    transform: translate3d(0, 20px, 0);
                    -webkit-transition: all 0.4s ease;
                    transition: all 0.4s ease;
                }
                .td_woo_products_live_search .tdw-regular-search .tdw-aj-search.tdw-regular-search-open {
                    visibility: visible;
                    opacity: 1;
                    -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
                }
                .td_woo_products_live_search .tdw-aj-search-results {
                    padding: 20px;
                    border-style: solid;
                    border-color: #ededed;
                    background-color: #fff;
                }
                .td_woo_products_live_search .tdw-drop-down-search .tdw-aj-search-results {
                    border-width: 1px 0;
                }
                .td_woo_products_live_search .tdw-regular-search .tdw-aj-search-results {
                    border-width: 0 0 1px;
                }
                .td_woo_products_live_search .tdw-aj-search-results .td_module_wrap:last-child {
                    margin-bottom: 0;
                    padding-bottom: 0;
                }
                .td_woo_products_live_search .tdw-aj-search-results .td_module_wrap:last-child .td-module-container:before {
                    display: none;
                }
                .td_woo_products_live_search .tdw-aj-search-inner {
                    display: flex;
                    flex-wrap: wrap;
                    *zoom: 1;
                }
                .td_woo_products_live_search .tdw-aj-search-inner:before,
                .td_woo_products_live_search .tdw-aj-search-inner:after {
                    display: table;
                    content: '';
                    line-height: 0;
                }
                .td_woo_products_live_search .tdw-aj-search-inner:after {
                    clear: both;
                }
                .td_woo_products_live_search .result-msg {
                    padding: 4px 0 6px 0;
                    font-family: 'Roboto', sans-serif;
                    font-size: 12px;
                    font-style: italic;
                    background-color: #fff;
                }
                .td_woo_products_live_search .result-msg a {
                    color: #222;
                }
                .td_woo_products_live_search .result-msg a:hover {
                    color: #4db2ec;
                }
                .tdc-dragged .tdw-drop-down-search {
                    visibility: hidden !important;
                    opacity: 0 !important;
                    -webkit-transition: all 0.3s ease;
                    transition: all 0.3s ease;
                }
                .td_woo_products_live_search .td_woo_product_module {
                    margin: 0 0 20px;
                    padding-bottom: 0;
                }
                .td_woo_products_live_search .td-module-container {
                    display: flex;
                }
                .td_woo_products_live_search .td-image-container {
                    width: 78px;
                    flex: 0 0 78px;
                    position: relative;
                    margin-right: 16px;
                }
                .td_woo_products_live_search .td-module-thumb {
                    margin-bottom: 0;
                }
                .td_woo_products_live_search .td-image-wrap {
                    display: block;
                    position: relative;
                    padding-bottom: 100%;
                }
                .td_woo_products_live_search .td-thumb-css {
                    width: 100%;
                    height: 100%;
                    position: absolute;
                    background-size: cover;
                    background-position: center center;
                }
                .td_woo_products_live_search .td-image-container img {
                    width: 100%;
                    display: block;
                }
                .td_woo_products_live_search .td_woo_product_module .onsale {
                    top: 0;
                    left: auto;
                    right: 0;
                    margin: 0;
                    padding: 6px;
                    min-width: 0;
                    min-height: 0;
                    background-color: #4db2ec;
                    color: #fff;
                    position: absolute;
                    font-size: 11px;
                    line-height: 1;
                    border: 0 solid #000;
                    border-radius: 0;
                }
                .td_woo_products_live_search .td-module-meta-info {
                    margin: 0;
                    border-width: 0;
                    border-style: solid;
                    border-color: #000;
                }
                .td_woo_products_live_search .td-module-title {
                    margin: 0 0 5px;
                    padding: 0;
                    font-family: 'Roboto', sans-serif;
                    font-size: 13px;
                    font-weight: 500;
                    line-height: 1.3;
                }
                .td_woo_products_live_search .td_woo_product_module:hover .td-module-title {
                    color: #4db2ec;
                }
                body div.td_woo_products_live_search .star-rating {
                    float: none;
                    display: inline-block;
                    margin: 0 0 4px;
                    width: auto;
                    height: auto;
                    font-family: star;
                    overflow: hidden;
                    position: relative;
                    line-height: 1;
                    font-size: 1em;
                }
                body div.td_woo_products_live_search .star-rating:before,
                body div.td_woo_products_live_search .star-rating span:before {
                    position: relative;
                    top: 0;
                    left: 0;
                    font-size: 11px;
                }
                body div.td_woo_products_live_search .star-rating:before {
                    content: '\\73\\73\\73\\73\\73';
                    color: #d3ced2;
                    float: left;
                }
                body div.td_woo_products_live_search .star-rating span:before {
                    content: '\\53\\53\\53\\53\\53';
                }
                body div.td_woo_products_live_search .star-rating span {
                    padding-top: 0;
                    font-size: 0;
                    float: left;
                    top: 0;
                    left: 0;
                    position: absolute;
                    font-size: 0;
                }
                div.td_woo_products_live_search div.td_woo_product_module .price {
                    display: block;
                    margin-bottom: 10px;
                    font-family: Verdana, Geneva, sans-serif;
                    font-size: 11px;
                    line-height: 1.6;
                    font-weight: 600;
                    color: #111;
                }
                div.td_woo_products_live_search div.td_woo_product_module .price del {
                    font-size: 0.75em !important;
                    color: #9d9d9d;
                }
                div.td_woo_products_live_search div.td_woo_product_module .price ins {
                    font-weight: inherit;
                }
                .td_woo_products_live_search .td_woo_product_module a.button {
                    background: none #222;
                    font-size: 10px;
                    padding: 8px;
                    text-shadow: none;
                    color: #fff;
                    border-width: 0;
                    border-style: solid;
                    border-color: #000;
                    border-radius: 0;
                    box-shadow: none;
                }
                .td_woo_products_live_search .td_woo_product_module a.button:hover {
                    background-color: #4db2ec;
                }
                .td_woo_products_live_search .td_woo_product_module a.button.loading:after {
                    display: none;
                }
                .td_woo_products_live_search .td_woo_product_module a.added_to_cart {
                    display: none;    
                }
                body:not(.woocommerce) .td_woo_products_live_search .td_woo_product_module a.button.loading {
                    opacity: .25;
                }
                body:not(.woocommerce) .td_woo_products_live_search .td_woo_product_module a.button.added:after {
                    content: '\\e017';
                    font-family: WooCommerce;
                    vertical-align: bottom;
                    margin-left: 0.53em;
                }
                
                

                /* @icon_size */
                body .$unique_block_class .tdw-search-btn i {
                    font-size: @icon_size;
                }
                /* @svg_size */
                body .$unique_block_class .tdw-search-btn svg {
                    width: @svg_size;
                }
                /* @icon_padding */
                body .$unique_block_class .tdw-search-btn i {
                    width: @icon_padding;
					height: @icon_padding;
					line-height:  @icon_padding;
                }
                /* @icon_svg_padding */
                body .$unique_block_class .tdw-search-icon-svg {
                    width: @icon_svg_padding;
					height: @icon_svg_padding;
                }
                /* @toggle_horiz_align_center */
                body .$unique_block_class .tdw-search-btn {
                    justify-content: center;
                }
                /* @toggle_horiz_align_right */
                body .$unique_block_class .tdw-search-btn {
                    justify-content: flex-end;
                }
                /* @inline */
                body .$unique_block_class {
                    display: inline-block;
                }
                /* @float_block */
                body .$unique_block_class {
                    float: right;
                    clear: none;
                }
                
                /* @toggle_txt_align */
                body .$unique_block_class .tdw-search-txt {
                    top: @toggle_txt_align;
                }
                /* @toggle_txt_space_right */
                body .$unique_block_class .tdw-search-txt {
                    margin-right: @toggle_txt_space_right;
                }
                /* @toggle_txt_space_left */
                body .$unique_block_class .tdw-search-txt {
                    margin-left: @toggle_txt_space_left;
                }
                
                /* @show_dropdown_form */
                body .$unique_block_class.tdc-element-selected .tdw-drop-down-search {
                    visibility: visible;
                    opacity: 1;
                    transform: translate3d(0, 0, 0);
                    -webkit-transform: translate3d(0, 0, 0);
                    -moz-transform: translate3d(0, 0, 0);
                }
                body .$unique_block_class.tdc-element-selected .tdw-search-btn:after {
                    visibility: visible;
                    opacity: 1;
                    transform: translate3d(0, 0, 0);
                    -webkit-transform: translate3d(0, 0, 0);
                    -moz-transform: translate3d(0, 0, 0);
                }
                /* @show_regular_form */
                body .$unique_block_class.tdc-element-selected .tdw-aj-search {
                    visibility: visible;
                    opacity: 1;
                    transform: translate3d(0, 0, 0);
                    -webkit-transform: translate3d(0, 0, 0);
                    -moz-transform: translate3d(0, 0, 0);
                }
                /* @form_offset */
                body .$unique_block_class .tdw-drop-down-search {
                    top: calc(100% + @form_offset);
                }
                body .$unique_block_class .tdw-search-btn:after {
                    bottom: -@form_offset;
                }
                /* @form_offset_left */
                body .$unique_block_class .tdw-drop-down-search-inner {
                    left: @form_offset_left;
                }
                /* @form_width */
                body .$unique_block_class .tdw-drop-down-search .tdw-drop-down-search-inner {
                    max-width: @form_width;
                }
                /* @form_content_width */
                body .$unique_block_class .tdw-search-form,
                body .$unique_block_class .tdw-aj-search {
                    max-width: @form_content_width;
                }
                /* @form_padding */
                body .$unique_block_class .tdw-drop-down-search .tdw-search-form {
                    padding: @form_padding;
                }
                /* @form_border */
                body .$unique_block_class .tdw-drop-down-search .tdw-search-form {
                    border-width: @form_border;
                }
                /* @form_align_horiz_center */
                body .$unique_block_class .tdw-drop-down-search-inner,
                body .$unique_block_class .tdw-search-form,
                body .$unique_block_class .tdw-aj-search {
                    margin: 0 auto;
                }
                /* @form_align_horiz_center2 */
                body .$unique_block_class .tdw-block-inner .tdw-drop-down-search {
                    left: 50%;
                    transform: translate3d(-50%, 20px, 0);
                    -webkit-transform: translate3d(-50%, 20px, 0);
                    -moz-transform: translate3d(-50%, 20px, 0);
                }
                body .$unique_block_class .tdw-block-inner .tdw-drop-down-search-open,
                body .$unique_block_class.tdc-element-selected .tdw-drop-down-search {
                    transform: translate3d(-50%, 0, 0);
                    -webkit-transform: translate3d(-50%, 0, 0);
                    -moz-transform: translate3d(-50%, 0, 0);
                }
                /* @form_align_horiz_right */
                body .$unique_block_class .tdw-drop-down-search {
                    left: auto;
                    right: 0;
                }
                body .$unique_block_class .tdw-drop-down-search-inner,
                body .$unique_block_class .tdw-search-form,
                body .$unique_block_class .tdw-aj-search {
                    margin-left: auto;
                    margin-right: 0;
                }
               
                /* @input_padding */
                body .$unique_block_class .tdw-search-form-input {
                    padding: @input_padding;
                }
                /* @input_border */
                body .$unique_block_class .tdw-search-form-inner:after {
                    border-width: @input_border;
                }
                /* @input_radius */
                body .$unique_block_class .tdw-search-form-inner {
                    border-radius: @input_radius;
                }
                body .$unique_block_class .tdw-search-form-inner:after {
                    border-radius: @input_radius;
                }
                body .$unique_block_class .tdw-head-search-form-input {   
                    border-top-left-radius: @input_radius;
                    border-bottom-left-radius: @input_radius;
                }
                
                /* @btn_icon_size */
                body .$unique_block_class .tdw-search-form-btn i {
                    font-size: @btn_icon_size;
                }
                /* @btn_icon_svg_size */
                body .$unique_block_class .tdw-search-form-btn svg {
                    width: @btn_icon_svg_size;
                }
                /* @btn_icon_space_right */
                body .$unique_block_class .tdw-search-form-btn-icon {
                    margin-right: @btn_icon_space_right;
                }
                /* @btn_icon_space_left */
                body .$unique_block_class .tdw-search-form-btn-icon {
                    margin-left: @btn_icon_space_left;
                }
                /* @btn_icon_align */
                body .$unique_block_class .tdw-search-form-btn-icon {
                    top: @btn_icon_align;
                }
                
                /* @btn_margin */
                body .$unique_block_class .tdw-search-form-btn {
                    margin: @btn_margin;
                }
                /* @btn_padding */
                body .$unique_block_class .tdw-search-form-btn {
                    padding: @btn_padding;
                }
                /* @btn_border */
                body .$unique_block_class .tdw-search-form-btn {
                    border-width: @btn_border;
                    border-style: solid;
                    border-color: #000;
                }
                /* @btn_radius */
                body .$unique_block_class .tdw-search-form-btn {
                    border-radius: @btn_radius;
                }
                
                /* @results_padding */
                body .$unique_block_class .tdw-aj-search-results {
                    padding: @results_padding;
                }
                /* @results_border */
                body .$unique_block_class .tdw-drop-down-search .tdw-aj-search-results {
                    border-width: @results_border;
                }
                /* @results_border_reg */
                body .$unique_block_class .tdw-regular-search .tdw-aj-search-results {
                    border-width: @results_border_reg;
                }
                /* @results_msg_padding */
                body .$unique_block_class .result-msg {
                    padding: @results_msg_padding;
                }
                /* @results_msg_border */
                body .$unique_block_class .result-msg {
                    border-width: @results_msg_border;
                    border-style: solid;
                    border-color: #000;
                }
                /* @results_msg_align_horiz_center */
                body .$unique_block_class .result-msg {
                    text-align: center;
                }
                /* @results_msg_align_horiz_right */
                body .$unique_block_class .result-msg {
                    text-align: right;
                }
                
                
                /* @modules_on_row */
				body div.$unique_block_class .td_woo_product_module {
					width: @modules_on_row;
                }
				/* @all_space */
				body div.$unique_block_class .td_woo_product_module {
					margin-bottom: @all_space;
                }
				/* @padding_desktop */
				body div.$unique_block_class .td_woo_product_module:nth-last-child(@padding_desktop) {
					margin-bottom: 0;
				}
				/* @padding */
				body div.$unique_block_class .td_woo_product_module {
					margin-bottom: @all_space !important;
                }
				body div.$unique_block_class .td_woo_product_module:nth-last-child(@padding) {
					margin-bottom: 0 !important;
				}
				/* @gap */
				body div.$unique_block_class .td_woo_product_module {
					padding-left: @gap;
					padding-right: @gap;
				}
				body div.$unique_block_class .tdw-aj-search-inner {
					margin-left: -@gap;
					margin-right: -@gap;
				}
                
				/* @img_width */
				body .$unique_block_class .td-image-container {
				 	flex: 0 0 @img_width;
				 	width: @img_width;
			    }
				.ie10 .$unique_block_class .td-image-container,
				.ie11 .$unique_block_class .td-image-container {
				 	flex: 0 0 auto;
			    }
				/* @img_height */
				body .$unique_block_class .td-image-wrap {
					padding-bottom: @img_height;
				}
				/* @img_alignment */
				body .$unique_block_class .entry-thumb {
					background-position: center @img_alignment;
				}
				/* @module_direction */
				body .$unique_block_class .td-module-container {
					flex-direction: @module_direction;
                }
				/* @img_first */
				body .$unique_block_class .td-image-container {
					order: 1;
                }
				body .$unique_block_class .td-module-meta-info {
					order: 2;
                }
				/* @img_last */
				body .$unique_block_class .td-image-container {
					order: 2;
                }
				body .$unique_block_class .td-module-meta-info {
					order: 1;
                }
				/* @img_show */
				body .$unique_block_class .td-image-container {
					display: @img_show;
                }
				/* @img_space */
				body div.$unique_block_class .td-module-container > .product-link {
					margin-right: @img_space;
                }
                /* @img_radius */
				body .$unique_block_class .entry-thumb {
					border-radius: @img_radius;
                }
                
				/* @sale_show */
				body div.$unique_block_class .td_woo_product_module .onsale {
					display: @sale_show;
                }
				/* @sale_margin */
				body div.$unique_block_class .td_woo_product_module .onsale {
					margin: @sale_margin;
                }
				/* @sale_padding */
				body div.$unique_block_class .td_woo_product_module .onsale {
					padding: @sale_padding;
                }
                /* @sale_border */
                body div.$unique_block_class .td_woo_product_module .onsale {
                    border-width: @sale_border;
                } 
                /* @sale_border_style */
                body div.$unique_block_class .td_woo_product_module .onsale {
                    border-style: @sale_border_style;
                }      
                /* @sale_radius */
                body div.$unique_block_class .td_woo_product_module .onsale {
                    border-radius: @sale_radius;
                }  
                
				/* @meta_info_align */
				body .$unique_block_class .td-module-meta-info {
				    display: flex;
				    flex-direction: column;
					justify-content: @meta_info_align;
				}
				/* @meta_width */
				body .$unique_block_class .td-module-meta-info {
					max-width: @meta_width;
				}
				/* @meta_margin */
				body .$unique_block_class .td-module-meta-info {
					margin: @meta_margin;
				}
				/* @meta_padding */
				body .$unique_block_class .td-module-meta-info {
					padding: @meta_padding;
				}
				/* @meta_info_border_size */
				body .$unique_block_class .td-module-meta-info {
					border-width: @meta_info_border_size;
				}
				/* @meta_info_border_style */
				body .$unique_block_class .td-module-meta-info {
					border-style: @meta_info_border_style;
				}     
                
				/* @title_space */
				body div.$unique_block_class .td-module-title {
					margin-bottom: @title_space;
                }
                /* @show_excerpt */
				.$unique_block_class .td-excerpt {
					display: @show_excerpt;
				}
                /* @excerpt_space */
				.$unique_block_class .td-excerpt {
					margin: @excerpt_space;
				}
				/* @show_stars */
				html body div.$unique_block_class .star-rating {
					display: @show_stars;
                }
				/* @stars_size */
				html body div.$unique_block_class .star-rating:before,
                html body div.$unique_block_class .star-rating span:before {
					font-size: @stars_size;
                }
				/* @stars_space */
				html body div.$unique_block_class .star-rating {
					margin-bottom: @stars_space;
                }
				/* @price_space */
				body div.$unique_block_class div.td_woo_product_module .price {
					margin-bottom: @price_space;
                }
                
                /* @mod_vert_align */
				body .$unique_block_class .td-module-meta-info {
					align-self: @mod_vert_align;
                }
                
                /* @horiz_align_left */
				.$unique_block_class .td-module-meta-info {
					align-items: flex-start;
                }
				.$unique_block_class .td-module-meta-info .td-module-title {
				    text-align: left;
				}
				/* @horiz_align_center */
				.$unique_block_class .td-module-meta-info {
					align-items: center;
                }
				.$unique_block_class .td-module-meta-info .td-module-title {
				    text-align: center;
				}
				/* @horiz_align_right */
				.$unique_block_class .td-module-meta-info {
					align-items: flex-end;
                }
				.$unique_block_class .td-module-meta-info .td-module-title {
				    text-align: right;
				}
                
				/* @mod_btn_padding */
				body div.$unique_block_class .td_woo_product_module a.button {
					padding: @mod_btn_padding;
                }
				/* @mod_btn_border */
				body div.$unique_block_class .td_woo_product_module a.button {
					border-width: @mod_btn_border;
                }
				/* @mod_btn_border_style */
				body div.$unique_block_class .td_woo_product_module a.button {
					border-style: @mod_btn_border_style;
                }
				/* @mod_btn_radius */
				body div.$unique_block_class .td_woo_product_module a.button {
					border-radius: @mod_btn_radius;
                }
				/* @mod_show_btn */
				body div.$unique_block_class .td_woo_product_module a.button {
					display: @mod_show_btn;
                }
                
                
                /* @form_general_bg */
                body .$unique_block_class .tdw-drop-down-search-inner {
                    background-color: @form_general_bg;
                }
                
                /* @icon_color */
                body .$unique_block_class .tdw-search-btn i {
                    color: @icon_color;
                }
                body .$unique_block_class .tdw-search-btn svg,
                body .$unique_block_class .tdw-search-btn svg * {
                    fill: @icon_color;
                }
                /* @icon_color_h */
                body .$unique_block_class .tdw-search-btn:hover i {
                    color: @icon_color_h;
                }
                body .$unique_block_class .tdw-search-btn:hover svg,
                body .$unique_block_class .tdw-search-btn:hover svg * {
                    fill: @icon_color_h;
                }
                
                /* @toggle_txt_color */
                body .$unique_block_class .tdw-search-btn .tdw-search-txt {
                    color: @toggle_txt_color;
                }
                /* @toggle_txt_color_h */
                body .$unique_block_class .tdw-search-btn:hover .tdw-search-txt {
                    color: @toggle_txt_color_h;
                }
                
                /* @form_bg */
                body .$unique_block_class .tdw-drop-down-search .tdw-search-form:before {
                    background-color: @form_bg;
                }
                /* @form_border_color */
                body .$unique_block_class .tdw-drop-down-search .tdw-search-form  {
                    border-color: @form_border_color;
                }
                /* @arrow_color */
                body .$unique_block_class .tdw-search-btn:after {
                    border-bottom-color: @arrow_color;
                }
                /* @form_shadow */
                body .$unique_block_class .tdw-drop-down-search-inner {
                    box-shadow: @form_shadow;
                }
                
                /* @input_color */
                body .$unique_block_class .tdw-search-form-input {
                    color: @input_color;
                }
                body .$unique_block_class .tdw-search-form-input.tdb-head-search-nofocus {
                    text-shadow: 0 0 0 @input_color;
                }
                /* @placeholder_color */
                body .$unique_block_class .tdw-search-form-input::placeholder {
                   color: @placeholder_color;
                   opacity: 1;
                }
                /* @input_bg */
                body .$unique_block_class .tdw-search-form-inner {
                    background-color: @input_bg;
                }
                /* @input_border_color */
                body .$unique_block_class .tdw-search-form-inner:after {
                    border-color: @input_border_color;
                }
                /* @input_shadow */
                body .$unique_block_class .tdw-search-form-inner {
                    box-shadow: @input_shadow;
                }
                
                /* @btn_color */
                body .$unique_block_class .tdw-search-form-btn {
                    color: @btn_color;
                }
                body .$unique_block_class .tdw-search-form-btn svg,
                body .$unique_block_class .tdw-search-form-btn svg * {
                    fill: @btn_color;
                }
                /* @btn_color_h */
                body .$unique_block_class .tdw-search-form-btn:hover {
                    color: @btn_color_h;
                }
                body .$unique_block_class .tdw-search-form-btn:hover svg,
                body .$unique_block_class .tdw-search-form-btn:hover svg * {
                    fill: @btn_color_h;
                }
                /* @btn_icon_color */
                body .$unique_block_class .tdw-search-form-btn i {
                    color: @btn_icon_color;
                }
                body .$unique_block_class .tdw-search-form-btn svg,
                body .$unique_block_class .tdw-search-form-btn svg * {
                    fill: @btn_icon_color;
                }
                /* @btn_icon_color_h */
                body .$unique_block_class .tdw-search-form-btn:hover i {
                    color: @btn_icon_color_h;
                }
                body .$unique_block_class .tdw-search-form-btn:hover svg,
                body .$unique_block_class .tdw-search-form-btn:hover svg * {
                    fill: @btn_icon_color_h;
                }
                /* @btn_bg */
                body .$unique_block_class .tdw-search-form-btn {
                    background-color: @btn_bg;
                }
                /* @btn_bg_gradient */
                body .$unique_block_class .tdw-search-form-btn {
                    @btn_bg_gradient
                }
                /* @btn_bg_h */
                body .$unique_block_class .tdw-search-form-btn:hover {
                    background-color: @btn_bg_h;
                }
                /* @btn_bg_h_gradient */
                body .$unique_block_class .tdw-search-form-btn:hover {
                    @btn_bg_h_gradient
                }
                /* @btn_border_color */
                body .$unique_block_class .tdw-search-form-btn {
                    border-color: @btn_border_color;
                }
                /* @btn_border_color_h */
                body .$unique_block_class .tdw-search-form-btn:hover {
                    border-color: @btn_border_color_h;
                }
                /* @btn_shadow */
                body .$unique_block_class .tdw-search-form-btn {
                    box-shadow: @btn_shadow;
                }
                
                /* @results_bg */
                body .$unique_block_class .tdw-aj-search-results {
                    background-color: @results_bg;
                }
                /* @results_border_color */
                body .$unique_block_class .tdw-aj-search-results {
                    border-color: @results_border_color;
                }
                /* @results_msg_color */
                body .$unique_block_class .result-msg,
                body .$unique_block_class .result-msg a {
                    color: @results_msg_color;
                }
                /* @results_msg_color_h */
                body .$unique_block_class .result-msg a:hover {
                    color: @results_msg_color_h;
                }
                /* @results_msg_bg */
                body .$unique_block_class .result-msg {
                    background-color: @results_msg_bg;
                }
                /* @results_msg_border_color */
                body .$unique_block_class .result-msg {
                    border-color: @results_msg_border_color;
                }
                /* @results_shadow */
                body .$unique_block_class .tdw-aj-search {
                    box-shadow: @results_shadow;
                }


                /* @sale_txt_color */
				body div.$unique_block_class .td_woo_product_module .onsale {
					color: @sale_txt_color;
                }
				/* @sale_txt_color_h */
				.body div.$unique_block_class .td_woo_product_module:hover .onsale {
					color: @sale_txt_color_h;
                }
				/* @sale_bg_color */
				body div.$unique_block_class .td_woo_product_module .onsale {
					background-color: @sale_bg_color;
                }
				/* @sale_bg_color_h */
				body div.$unique_block_class .td_woo_product_module:hover .onsale {
					background-color: @sale_bg_color_h;
                }
                /* @sale_border_color */
                body div.$unique_block_class .td_woo_product_module .onsale {
                    border-color: @sale_border_color;
                }
                /* @sale_border_color_h */
                body div.$unique_block_class .td_woo_product_module:hover .onsale {
                    border-color: @sale_border_color_h;
                }
                
                /* @meta_bg */
				body .$unique_block_class .td-module-meta-info {
					background-color: @meta_bg;
                }
				/* @meta_border_color */
				body .$unique_block_class .td-module-meta-info {
					border-color: @meta_border_color;
                }
                
				/* @title_color */
				body div.$unique_block_class .td-module-title a {
					color: @title_color;
                }
				/* @title_color_h */
				body div.$unique_block_class .td_woo_product_module:hover .td-module-title a {
					color: @title_color_h;
                }
                
                 /* @ex_txt */
				.$unique_block_class .td-excerpt {
					color: @ex_txt;
				}
                            
                /* @stars_full_color */
                html body div.$unique_block_class .star-rating span:before {
                    color: @stars_full_color;
                }     
                /* @stars_empty_color */
                html body div.$unique_block_class .star-rating:before {
                    color: @stars_empty_color;
                }
                
				/* @price_color */
				body div.$unique_block_class div.td_woo_product_module .price {
					color: @price_color;
                }
				/* @sale_price_color */
				body div.$unique_block_class div.td_woo_product_module .price ins {
					color: @sale_price_color;
                }
				/* @old_price_color */
				body div.$unique_block_class div.td_woo_product_module .price del {
					color: @old_price_color;
                }
                
				/* @mod_btn_txt_color */
				body div.$unique_block_class .td_woo_product_module a.button {
					color: @mod_btn_txt_color;
                }
				/* @mod_btn_txt_color_h */
				body div.$unique_block_class .td_woo_product_module a.button:hover {
					color: @mod_btn_txt_color_h;
                }
				/* @mod_btn_bg_color */
				body div.$unique_block_class .td_woo_product_module a.button {
					background-color: @mod_btn_bg_color;
                }
				/* @mod_btn_bg_color_h */
				body div.$unique_block_class .td_woo_product_module a.button:hover {
					background-color: @mod_btn_bg_color_h;
                }
				/* @mod_btn_border_color */
				body div.$unique_block_class .td_woo_product_module a.button {
					border-color: @mod_btn_border_color;
                }
				/* @mod_btn_border_color_h */
				body div.$unique_block_class .td_woo_product_module a.button:hover {
					border-color: @mod_btn_border_color_h;
                }
                
                
                /* @f_toggle_txt */
                body div.$unique_block_class .tdw-search-txt {
                    @f_toggle_txt
                }
                /* @f_input */
                body div.$unique_block_class .tdw-search-form-input {
                    @f_input
                }
                /* @f_btn */
                body div.$unique_block_class .tdw-search-form-btn {
                    @f_btn
                }
                /* @f_results_msg */
                body div.$unique_block_class .result-msg {
                    @f_results_msg
                }
                /* @f_sale */
				body div.$unique_block_class .td_woo_product_module .onsale {
					@f_sale
                }
				/* @f_title */
				body div.$unique_block_class .td-module-title {
				    @f_title
                }
                /* @f_ex */
				.$unique_block_class .td-excerpt {
					@f_ex
				}
				/* @f_price */
				body div.$unique_block_class div.td_woo_product_module .price {
					@f_price
                }
				/* @f_old_price */
			    body div.$unique_block_class div.td_woo_product_module .price del {
					@f_old_price
                }
				/* @f_mod_btn */
				body div.$unique_block_class .td_woo_product_module a.button {
					@f_mod_btn
                }

        </style>";

        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

	static function cssMedia( $res_ctx ) {

        /*-- GENERAL-- */
        $res_ctx->load_settings_raw( 'general_style', 1 );

        // form version
        $form_version = $res_ctx->get_shortcode_att('woo_search_version');


        if( $form_version == '' ) {
            /*-- ICON -- */
            $icon = $res_ctx->get_icon_att( 'tdicon' );
            // icon size
            $icon_size = $res_ctx->get_shortcode_att('icon_size');
            $res_ctx->load_settings_raw( 'icon_size', $icon_size . 'px');
            if( base64_encode( base64_decode( $icon ) ) == $icon ) {
                $res_ctx->load_settings_raw( 'svg_size', $icon_size . 'px' );
            }
            // icon padding
            $res_ctx->load_settings_raw('icon_padding', $icon_size * $res_ctx->get_shortcode_att('icon_padding') . 'px');
            if( base64_encode( base64_decode( $icon ) ) == $icon ) {
                $res_ctx->load_settings_raw('icon_svg_padding', $icon_size * $res_ctx->get_shortcode_att('icon_padding') . 'px');
            }
            // horizontal align
            $toggle_horiz_align = $res_ctx->get_shortcode_att('toggle_horiz_align');
            if ($toggle_horiz_align == 'content-horiz-center') {
                $res_ctx->load_settings_raw('toggle_horiz_align_center', 1);
            } else if ($toggle_horiz_align == 'content-horiz-right') {
                $res_ctx->load_settings_raw('toggle_horiz_align_right', 1);
            }
            // display inline
            $res_ctx->load_settings_raw('inline', $res_ctx->get_shortcode_att('inline'));
            // float right
            $res_ctx->load_settings_raw('float_block', $res_ctx->get_shortcode_att('float_block'));


            /*-- TEXT -- */
            // text vertical align
            $res_ctx->load_settings_raw('toggle_txt_align', $res_ctx->get_shortcode_att('toggle_txt_align') . 'px');

            // text space
            $toggle_txt_pos = $res_ctx->get_shortcode_att('toggle_txt_pos');
            $toggle_txt_space = $res_ctx->get_shortcode_att('toggle_txt_space');
            if ($toggle_txt_space != '' && is_numeric($toggle_txt_space)) {
                if ($toggle_txt_pos == '') {
                    $res_ctx->load_settings_raw('toggle_txt_space_right', $toggle_txt_space . 'px');
                } else {
                    $res_ctx->load_settings_raw('toggle_txt_space_left', $toggle_txt_space . 'px');
                }
            }
        }



        /*-- SEARCH FORM -- */
        // show form
        if ( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) {
            if( $form_version == '' ) {
                $res_ctx->load_settings_raw('show_dropdown_form', $res_ctx->get_shortcode_att('show_form'));
            } else if( $form_version == 'regular' ) {
                $res_ctx->load_settings_raw('show_regular_form', $res_ctx->get_shortcode_att('show_form'));
            }
        }
        if( $form_version == '' ) {
            // form offset top
            $form_offset = $res_ctx->get_shortcode_att('form_offset');
            $res_ctx->load_settings_raw('form_offset', $form_offset);
            if ($form_offset != '' && is_numeric($form_offset)) {
                $res_ctx->load_settings_raw('form_offset', $form_offset . 'px');
            }
            // form offset left
            $form_offset_left = $res_ctx->get_shortcode_att('form_offset_left');
            $res_ctx->load_settings_raw('form_offset_left', $form_offset_left);
            if ($form_offset_left != '' && is_numeric($form_offset_left)) {
                $res_ctx->load_settings_raw('form_offset_left', $form_offset_left . 'px');
            }
            // form width
            $form_width = $res_ctx->get_shortcode_att('form_width');
            $res_ctx->load_settings_raw('form_width', $form_width);
            if ($form_width != '' && is_numeric($form_width)) {
                $res_ctx->load_settings_raw('form_width', $form_width . 'px');
            }
            // form content width
            $form_content_width = $res_ctx->get_shortcode_att('form_content_width');
            $res_ctx->load_settings_raw('form_content_width', $form_content_width);
            if ($form_content_width != '' && is_numeric($form_content_width)) {
                $res_ctx->load_settings_raw('form_content_width', $form_content_width . 'px');
            }
            // form padding
            $form_padding = $res_ctx->get_shortcode_att('form_padding');
            $res_ctx->load_settings_raw('form_padding', $form_padding);
            if ($form_padding != '' && is_numeric($form_padding)) {
                $res_ctx->load_settings_raw('form_padding', $form_padding . 'px');
            }
            // form border size
            $form_border = $res_ctx->get_shortcode_att('form_border');
            $res_ctx->load_settings_raw('form_border', $form_border);
            if ($form_border != '' && is_numeric($form_border)) {
                $res_ctx->load_settings_raw('form_border', $form_border . 'px');
            }
            // form align
            $form_align = $res_ctx->get_shortcode_att('form_align');
            $form_align_screen = $res_ctx->get_shortcode_att('form_align_screen');
            if ($form_align == 'content-horiz-center') {
                $res_ctx->load_settings_raw('form_align_horiz_center', 1);

                if ($form_align_screen == '') {
                    $res_ctx->load_settings_raw('form_align_horiz_center2', 1);
                }
            } else if ($form_align == 'content-horiz-right') {
                $res_ctx->load_settings_raw('form_align_horiz_right', 1);
            }
        }

        // input padding
        $input_padding = $res_ctx->get_shortcode_att('input_padding');
        $res_ctx->load_settings_raw('input_padding', $input_padding);
        if ($input_padding != '' && is_numeric($input_padding)) {
            $res_ctx->load_settings_raw('input_padding', $input_padding . 'px');
        }
        // input border size
        $input_border = $res_ctx->get_shortcode_att('input_border');
        $res_ctx->load_settings_raw('input_border', $input_border);
        if ($input_border != '' && is_numeric($input_border)) {
            $res_ctx->load_settings_raw('input_border', $input_border . 'px');
        }
        // input border radius
        $input_radius = $res_ctx->get_shortcode_att('input_radius');
        $res_ctx->load_settings_raw('input_radius', $input_radius);
        if ($input_radius != '' && is_numeric($input_radius)) {
            $res_ctx->load_settings_raw('input_radius', $input_radius . 'px');
        }

        // button icon size
        $btn_icon = $res_ctx->get_icon_att('btn_tdicon');
        $btn_icon_size = $res_ctx->get_shortcode_att('btn_icon_size');
        if( base64_encode( base64_decode( $btn_icon ) ) == $btn_icon ) {
            $res_ctx->load_settings_raw('btn_icon_svg_size', $btn_icon_size);
            if ($btn_icon_size != '' && is_numeric($btn_icon_size)) {
                $res_ctx->load_settings_raw('btn_icon_svg_size', $btn_icon_size . 'px');
            }
        } else {
            $res_ctx->load_settings_raw('btn_icon_size', $btn_icon_size);
            if ($btn_icon_size != '' && is_numeric($btn_icon_size)) {
                $res_ctx->load_settings_raw('btn_icon_size', $btn_icon_size . 'px');
            }
        }
        // button icon space
        $btn_icon_pos = $res_ctx->get_shortcode_att('btn_icon_pos');
        $btn_icon_space = $res_ctx->get_shortcode_att('btn_icon_space');
        if ($btn_icon_space != '' && is_numeric($btn_icon_space)) {
            if( $btn_icon_pos == '' ) {
                $res_ctx->load_settings_raw('btn_icon_space_right', $btn_icon_space . 'px');
            } else {
                $res_ctx->load_settings_raw('btn_icon_space_left', $btn_icon_space . 'px');
            }
        }
        // button icon align
        $res_ctx->load_settings_raw('btn_icon_align', $res_ctx->get_shortcode_att('btn_icon_align') . 'px');

        // button margin
        $btn_margin = $res_ctx->get_shortcode_att('btn_margin');
        $res_ctx->load_settings_raw('btn_margin', $btn_margin);
        if ($btn_margin != '' && is_numeric($btn_margin)) {
            $res_ctx->load_settings_raw('btn_margin', $btn_margin . 'px');
        }
        // button padding
        $btn_padding = $res_ctx->get_shortcode_att('btn_padding');
        $res_ctx->load_settings_raw('btn_padding', $btn_padding);
        if ($btn_padding != '' && is_numeric($btn_padding)) {
            $res_ctx->load_settings_raw('btn_padding', $btn_padding . 'px');
        }
        // button border size
        $btn_border = $res_ctx->get_shortcode_att('btn_border');
        $res_ctx->load_settings_raw('btn_border', $btn_border);
        if ($btn_border != '' && is_numeric($btn_border)) {
            $res_ctx->load_settings_raw('btn_border', $btn_border . 'px');
        }
        // button border radius
        $btn_radius = $res_ctx->get_shortcode_att('btn_radius');
        $res_ctx->load_settings_raw('btn_radius', $btn_radius);
        if ($btn_radius != '' && is_numeric($btn_radius)) {
            $res_ctx->load_settings_raw('btn_radius', $btn_radius . 'px');
        }



        /*-- SEARCH RESULTS BOX -- */
        // results padding
        $results_padding = $res_ctx->get_shortcode_att('results_padding');
        $res_ctx->load_settings_raw('results_padding', $results_padding);
        if ($results_padding != '' && is_numeric($results_padding)) {
            $res_ctx->load_settings_raw('results_padding', $results_padding . 'px');
        }
        // results border size dropdown
        $results_border = $res_ctx->get_shortcode_att('results_border');
        $res_ctx->load_settings_raw('results_border', $results_border);
        if ($results_border != '' && is_numeric($results_border)) {
            $res_ctx->load_settings_raw('results_border', $results_border . 'px');
        }
        // results border size regular
        $results_border_reg = $res_ctx->get_shortcode_att('results_border_reg');
        $res_ctx->load_settings_raw('results_border_reg', $results_border_reg);
        if ($results_border_reg != '' && is_numeric($results_border_reg)) {
            $res_ctx->load_settings_raw('results_border_reg', $results_border_reg . 'px');
        }
        // results message padding
        $results_msg_padding = $res_ctx->get_shortcode_att('results_msg_padding');
        $res_ctx->load_settings_raw('results_msg_padding', $results_msg_padding);
        if ($results_msg_padding != '' && is_numeric($results_msg_padding)) {
            $res_ctx->load_settings_raw('results_msg_padding', $results_msg_padding . 'px');
        }
        // results message border size
        $results_msg_border = $res_ctx->get_shortcode_att('results_msg_border');
        $res_ctx->load_settings_raw('results_msg_border', $results_msg_border);
        if ($results_msg_border != '' && is_numeric($results_msg_border)) {
            $res_ctx->load_settings_raw('results_msg_border', $results_msg_border . 'px');
        }
        // results message align
        $results_msg_align = $res_ctx->get_shortcode_att('results_msg_align');
        if( $results_msg_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw('results_msg_align_horiz_center', 1);
        } else if( $results_msg_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw('results_msg_align_horiz_right', 1);
        }



        /*-- RESULTS MODULE -- */
        // modules per row
        $modules_on_row = $res_ctx->get_shortcode_att('modules_on_row');
        if ( $modules_on_row == '' ) {
            $modules_on_row = '100%';
        }
        $res_ctx->load_settings_raw( 'modules_on_row', $modules_on_row );

        // space
        $space = $res_ctx->get_shortcode_att('all_space');
        $res_ctx->load_settings_raw( 'all_space', $space );
        if ( $space != '' ) {
            if( is_numeric( $space ) ) {
                $res_ctx->load_settings_raw( 'all_space', $space . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'all_space', '20px' );
        }

        // modules clearfix
        $padding = 'padding';
        if ( $res_ctx->is( 'all' ) ) {
            $padding = 'padding_desktop';
        }
        switch ($modules_on_row) {
            case '100%':
                $res_ctx->load_settings_raw( $padding,  '1' );
                break;
            case '50%':
                $res_ctx->load_settings_raw( $padding,  '-n+2' );
                break;
            case '33.33333333%':
                $res_ctx->load_settings_raw( $padding,  '-n+3' );
                break;
            case '25%':
                $res_ctx->load_settings_raw( $padding,  '-n+4' );
                break;
            case '20%':
                $res_ctx->load_settings_raw( $padding,  '-n+5' );
                break;
            case '16.66666667%':
                $res_ctx->load_settings_raw( $padding,  '-n+6' );
                break;
            case '14.28571428%':
                $res_ctx->load_settings_raw( $padding,  '-n+7' );
                break;
            case '12.5%':
                $res_ctx->load_settings_raw( $padding,  '-n+8' );
                break;
            case '11.11111111%':
                $res_ctx->load_settings_raw( $padding,  '-n+9' );
                break;
            case '10%':
                $res_ctx->load_settings_raw( $padding,  '-n+10' );
                break;
        }

        // gap
        $gap = $res_ctx->get_shortcode_att('gap');
        $res_ctx->load_settings_raw( 'gap', $gap );
        if ( $gap == '' ) {
            $res_ctx->load_settings_raw( 'gap', '10px');
        } else if ( is_numeric( $gap ) ) {
            $res_ctx->load_settings_raw( 'gap', $gap / 2 .'px' );
        }

        // image width
        $img_width = $res_ctx->get_shortcode_att('img_width');
        if ( is_numeric( $img_width ) ) {
            $res_ctx->load_settings_raw( 'img_width', $img_width . '%' );
        } else {
            $res_ctx->load_settings_raw( 'img_width', $img_width );
        }

        // image_height
        $img_height = $res_ctx->get_shortcode_att('img_height');
        if ( is_numeric( $img_height ) ) {
            $res_ctx->load_settings_raw( 'img_height', $img_height . '%' );
        } else {
            $res_ctx->load_settings_raw( 'img_height', $img_height );
        }

        //image alignment
        $res_ctx->load_settings_raw( 'img_alignment', $res_ctx->get_shortcode_att('img_alignment') . '%' );

        // image position
        $img_pos = $res_ctx->get_shortcode_att('img_pos');
        if( $img_pos == '' || $img_pos == 'normal' || $img_pos == 'hidden' ) {
            $res_ctx->load_settings_raw( 'module_direction', 'column' );
        } else {
            $res_ctx->load_settings_raw( 'module_direction', 'row' );
        }
        if( $img_pos == 'right' ) {
            $res_ctx->load_settings_raw( 'img_last', 1 );
        } else {
            $res_ctx->load_settings_raw( 'img_first', 1 );
        }
        if( $img_pos == 'hidden' ) {
            $res_ctx->load_settings_raw( 'img_show', 'none' );
        } else {
            $res_ctx->load_settings_raw( 'img_show', 'block' );
        }

        // image space
        $img_space = $res_ctx->get_shortcode_att('img_space');
        $res_ctx->load_settings_raw( 'img_space', $img_space );
        if ( $img_space != '' && is_numeric( $img_space ) ) {
            $res_ctx->load_settings_raw( 'img_space', $img_space . 'px' );
        }

        // image radius
        $img_radius = $res_ctx->get_shortcode_att('img_radius');
        $res_ctx->load_settings_raw( 'img_radius', $img_radius );
        if ( $img_radius != '' && is_numeric( $img_radius ) ) {
            $res_ctx->load_settings_raw( 'img_radius', $img_radius . 'px' );
        }

        // sale tag show
        $res_ctx->load_settings_raw( 'sale_show', $res_ctx->get_shortcode_att('sale_show') );

        // sale tag margin
        $sale_margin = $res_ctx->get_shortcode_att('sale_margin');
        $res_ctx->load_settings_raw( 'sale_margin', $sale_margin );
        if ( $sale_margin != '' && is_numeric( $sale_margin ) ) {
            $res_ctx->load_settings_raw( 'sale_margin', $sale_margin . 'px' );
        }

        // sale tag padding
        $sale_padding = $res_ctx->get_shortcode_att('sale_padding');
        $res_ctx->load_settings_raw( 'sale_padding', $sale_padding );
        if ( $sale_padding != '' && is_numeric( $sale_padding ) ) {
            $res_ctx->load_settings_raw( 'sale_padding', $sale_padding . 'px' );
        }

        // sale tag border size
        $sale_border = $res_ctx->get_shortcode_att( 'sale_border' );
        $res_ctx->load_settings_raw( 'sale_border', $sale_border );
        if( $sale_border != '' && is_numeric( $sale_border ) ) {
            $res_ctx->load_settings_raw( 'sale_border', $sale_border . 'px' );
        }
        // sale tag border style
        $res_ctx->load_settings_raw( 'sale_border_style', $res_ctx->get_shortcode_att( 'sale_border_style'  ) );
        // sale tag border radius
        $sale_radius = $res_ctx->get_shortcode_att( 'sale_radius' );
        $res_ctx->load_settings_raw( 'sale_radius', $sale_radius );
        if( $sale_radius != '' && is_numeric( $sale_radius ) ) {
            $res_ctx->load_settings_raw( 'sale_radius', $sale_radius . 'px' );
        }


        // meta info vertical align
        $meta_info_align = $res_ctx->get_shortcode_att('meta_info_align');
        $res_ctx->load_settings_raw( 'meta_info_align', $meta_info_align );

        // meta info horiz align
        $horiz_align = $res_ctx->get_shortcode_att('horiz_align');
        if( $horiz_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'horiz_align_left', 1 );
        } else if( $horiz_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'horiz_align_center', 1 );
        } else if( $horiz_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'horiz_align_right', 1 );
        }

        // meta info width
        $meta_info_width = $res_ctx->get_shortcode_att('meta_width');
        $res_ctx->load_settings_raw( 'meta_width', $meta_info_width );
        if( $meta_info_width != '' && is_numeric( $meta_info_width ) ) {
            $res_ctx->load_settings_raw( 'meta_width', $meta_info_width . 'px' );
        }

        // meta info margin
        $meta_margin = $res_ctx->get_shortcode_att('meta_margin');
        $res_ctx->load_settings_raw( 'meta_margin', $meta_margin );
        if ( is_numeric( $meta_margin ) ) {
            $res_ctx->load_settings_raw( 'meta_margin', $meta_margin . 'px' );
        }

        // meta info padding
        $meta_padding = $res_ctx->get_shortcode_att('meta_padding');
        $res_ctx->load_settings_raw( 'meta_padding', $meta_padding );
        if ( is_numeric( $meta_padding ) ) {
            $res_ctx->load_settings_raw( 'meta_padding', $meta_padding . 'px' );
        }

        // meta info border width
        $meta_info_border_size = $res_ctx->get_shortcode_att('meta_info_border_size');
        $res_ctx->load_settings_raw( 'meta_info_border_size', $meta_info_border_size );
        if ( is_numeric( $meta_info_border_size ) ) {
            $res_ctx->load_settings_raw( 'meta_info_border_size', $meta_info_border_size . 'px' );
        }

        // meta info border style
        $res_ctx->load_settings_raw( 'meta_info_border_style', $res_ctx->get_shortcode_att('meta_info_border_style') );

        // title space
        $title_space = $res_ctx->get_shortcode_att('title_space');
        $res_ctx->load_settings_raw( 'title_space', $title_space );
        if ( $title_space != '' && is_numeric( $title_space ) ) {
            $res_ctx->load_settings_raw( 'title_space', $title_space . 'px' );
        }

        // show excerpt
        $prod_excerpt = $res_ctx->get_shortcode_att('show_excerpt');
        $res_ctx->load_settings_raw( 'show_excerpt', $prod_excerpt );
        if( $prod_excerpt == '' ) {
            $res_ctx->load_settings_raw( 'show_excerpt', 'none' );

        }

        // excerpt space
        $art_excerpt = $res_ctx->get_shortcode_att('excerpt_space');
        $res_ctx->load_settings_raw( 'excerpt_space', $art_excerpt );
        if ( is_numeric( $art_excerpt ) ) {
            $res_ctx->load_settings_raw( 'excerpt_space', $art_excerpt . 'px' );
        }

        // show stars
        $res_ctx->load_settings_raw( 'show_stars', $res_ctx->get_shortcode_att('show_stars') );

        // stars size
        $stars_size = $res_ctx->get_shortcode_att('stars_size');
        $res_ctx->load_settings_raw( 'stars_size', $stars_size );
        if ( $stars_size != '' && is_numeric( $stars_size ) ) {
            $res_ctx->load_settings_raw( 'stars_size', $stars_size . 'px' );
        }

        // stars space
        $stars_space = $res_ctx->get_shortcode_att('stars_space');
        $res_ctx->load_settings_raw( 'stars_space', $stars_space );
        if ( $stars_space != '' && is_numeric( $stars_space ) ) {
            $res_ctx->load_settings_raw( 'stars_space', $stars_space . 'px' );
        }

        // price space
        $price_space = $res_ctx->get_shortcode_att('price_space');
        $res_ctx->load_settings_raw( 'price_space', $price_space );
        if ( $price_space != '' && is_numeric( $price_space ) ) {
            $res_ctx->load_settings_raw( 'price_space', $price_space . 'px' );
        }

        // meta info vert align
        $res_ctx->load_settings_raw( 'mod_vert_align', $res_ctx->get_shortcode_att('mod_vert_align') );

//        // meta info horiz align
//        $mod_horiz_align = $res_ctx->get_shortcode_att('mod_horiz_align');
//        if( $mod_horiz_align == 'content-horiz-left' ) {
//            $res_ctx->load_settings_raw( 'mod_horiz_align_left', 1 );
//        } else if( $mod_horiz_align == 'content-horiz-center' ) {
//            $res_ctx->load_settings_raw( 'mod_horiz_align_center', 1 );
//        } else if( $mod_horiz_align == 'content-horiz-right' ) {
//            $res_ctx->load_settings_raw( 'mod_horiz_align_right', 1 );
//        }

        // button padding
        $mod_btn_padding = $res_ctx->get_shortcode_att('mod_btn_padding');
        $res_ctx->load_settings_raw( 'mod_btn_padding', $mod_btn_padding );
        if ( $mod_btn_padding != '' && is_numeric( $mod_btn_padding ) ) {
            $res_ctx->load_settings_raw( 'mod_btn_padding', $mod_btn_padding . 'px' );
        }

        // button border size
        $mod_btn_border = $res_ctx->get_shortcode_att('mod_btn_border');
        $res_ctx->load_settings_raw( 'mod_btn_border', $mod_btn_border );
        if ( $mod_btn_border != '' && is_numeric( $mod_btn_border ) ) {
            $res_ctx->load_settings_raw( 'mod_btn_border', $mod_btn_border . 'px' );
        }

        // button border style
        $mod_btn_border_style = $res_ctx->get_shortcode_att('mod_btn_border_style');
        $res_ctx->load_settings_raw( 'mod_btn_border_style', $mod_btn_border_style );

        // button border radius
        $mod_btn_radius = $res_ctx->get_shortcode_att('mod_btn_radius');
        $res_ctx->load_settings_raw( 'mod_btn_radius', $mod_btn_radius );
        if ( $mod_btn_radius != '' && is_numeric( $mod_btn_radius ) ) {
            $res_ctx->load_settings_raw( 'mod_btn_radius', $mod_btn_radius . 'px' );
        }

        // show button
        $res_ctx->load_settings_raw( 'mod_show_btn', $res_ctx->get_shortcode_att('mod_show_btn') );



        /*-- COLORS -- */
        if( $form_version == '' ) {
            $res_ctx->load_settings_raw( 'form_general_bg', $res_ctx->get_shortcode_att('form_general_bg') );

            $res_ctx->load_settings_raw( 'icon_color', $res_ctx->get_shortcode_att('icon_color') );
            $res_ctx->load_settings_raw( 'icon_color_h', $res_ctx->get_shortcode_att('icon_color_h') );

            $res_ctx->load_settings_raw( 'toggle_txt_color', $res_ctx->get_shortcode_att('toggle_txt_color') );
            $res_ctx->load_settings_raw( 'toggle_txt_color_h', $res_ctx->get_shortcode_att('toggle_txt_color_h') );

            $res_ctx->load_settings_raw( 'form_bg', $res_ctx->get_shortcode_att('form_bg') );
            $res_ctx->load_settings_raw( 'form_border_color', $res_ctx->get_shortcode_att('form_border_color') );
            $res_ctx->load_settings_raw( 'arrow_color', $res_ctx->get_shortcode_att('arrow_color') );

            $res_ctx->load_shadow_settings(6, 0, 2, 0, 'rgba(0, 0, 0, 0.2)', 'form_shadow');
        }

        $res_ctx->load_settings_raw( 'input_color', $res_ctx->get_shortcode_att('input_color') );
        $res_ctx->load_settings_raw( 'placeholder_color', $res_ctx->get_shortcode_att('placeholder_color') );
        $res_ctx->load_settings_raw( 'input_bg', $res_ctx->get_shortcode_att('input_bg') );
        $res_ctx->load_settings_raw( 'input_border_color', $res_ctx->get_shortcode_att('input_border_color') );
        $res_ctx->load_shadow_settings( 0, 0, 0, 0,  'rgba(0, 0, 0, 0.2)', 'input_shadow' );

        $res_ctx->load_settings_raw( 'btn_icon_color', $res_ctx->get_shortcode_att('btn_icon_color') );
        $res_ctx->load_settings_raw( 'btn_icon_color_h', $res_ctx->get_shortcode_att('btn_icon_color_h') );
        $res_ctx->load_settings_raw( 'btn_color', $res_ctx->get_shortcode_att('btn_color') );
        $res_ctx->load_settings_raw( 'btn_color_h', $res_ctx->get_shortcode_att('btn_color_h') );
        $res_ctx->load_color_settings( 'btn_bg', 'btn_bg', 'btn_bg_gradient', '', '' );
        $res_ctx->load_color_settings( 'btn_bg_h', 'btn_bg_h', 'btn_bg_h_gradient', '', '' );
        $res_ctx->load_settings_raw( 'btn_border_color', $res_ctx->get_shortcode_att('btn_border_color') );
        $res_ctx->load_settings_raw( 'btn_border_color_h', $res_ctx->get_shortcode_att('btn_border_color_h') );
        $res_ctx->load_shadow_settings( 0, 0, 0, 0,  'rgba(0, 0, 0, 0.2)', 'btn_shadow' );

        $res_ctx->load_settings_raw( 'results_bg', $res_ctx->get_shortcode_att('results_bg') );
        $res_ctx->load_settings_raw( 'results_border_color', $res_ctx->get_shortcode_att('results_border_color') );
        $res_ctx->load_settings_raw( 'results_msg_color', $res_ctx->get_shortcode_att('results_msg_color') );
        $res_ctx->load_settings_raw( 'results_msg_color_h', $res_ctx->get_shortcode_att('results_msg_color_h') );
        $res_ctx->load_settings_raw( 'results_msg_bg', $res_ctx->get_shortcode_att('results_msg_bg') );
        $res_ctx->load_settings_raw( 'results_msg_border_color', $res_ctx->get_shortcode_att('results_msg_border_color') );
        if( $form_version == 'regular' ) {
            $res_ctx->load_shadow_settings(6, 0, 2, 0, 'rgba(0, 0, 0, 0.2)', 'results_shadow');
        }

        $res_ctx->load_settings_raw( 'sale_txt_color', $res_ctx->get_shortcode_att('sale_txt_color') );
        $res_ctx->load_settings_raw( 'sale_txt_color_h', $res_ctx->get_shortcode_att('sale_txt_color_h') );
        $res_ctx->load_settings_raw( 'sale_bg_color', $res_ctx->get_shortcode_att('sale_bg_color') );
        $res_ctx->load_settings_raw( 'sale_bg_color_h', $res_ctx->get_shortcode_att('sale_bg_color_h') );
        $res_ctx->load_settings_raw('sale_border_color', $res_ctx->get_shortcode_att( 'sale_border_color' ));
        $res_ctx->load_settings_raw('sale_border_color_h', $res_ctx->get_shortcode_att( 'sale_border_color_h' ));

        $res_ctx->load_settings_raw( 'meta_bg', $res_ctx->get_shortcode_att('meta_bg') );
        $res_ctx->load_settings_raw( 'meta_border_color', $res_ctx->get_shortcode_att('meta_border_color') );

        $res_ctx->load_settings_raw( 'title_color', $res_ctx->get_shortcode_att('title_color') );
        $res_ctx->load_settings_raw( 'title_color_h', $res_ctx->get_shortcode_att('title_color_h') );

        $res_ctx->load_settings_raw( 'ex_txt', $res_ctx->get_shortcode_att('ex_txt') );

        $res_ctx->load_settings_raw( 'stars_full_color', $res_ctx->get_shortcode_att( 'stars_full_color' ) );
        $res_ctx->load_settings_raw( 'stars_empty_color', $res_ctx->get_shortcode_att( 'stars_empty_color' ) );

        $res_ctx->load_settings_raw( 'price_color', $res_ctx->get_shortcode_att('price_color') );
        $res_ctx->load_settings_raw( 'sale_price_color', $res_ctx->get_shortcode_att('sale_price_color') );
        $res_ctx->load_settings_raw( 'old_price_color', $res_ctx->get_shortcode_att('old_price_color') );

        $res_ctx->load_settings_raw( 'mod_btn_txt_color', $res_ctx->get_shortcode_att('mod_btn_txt_color') );
        $res_ctx->load_settings_raw( 'mod_btn_txt_color_h', $res_ctx->get_shortcode_att('mod_btn_txt_color_h') );
        $res_ctx->load_settings_raw( 'mod_btn_bg_color', $res_ctx->get_shortcode_att('mod_btn_bg_color') );
        $res_ctx->load_settings_raw( 'mod_btn_bg_color_h', $res_ctx->get_shortcode_att('mod_btn_bg_color_h') );
        $res_ctx->load_settings_raw( 'mod_btn_border_color', $res_ctx->get_shortcode_att('mod_btn_border_color') );
        $res_ctx->load_settings_raw( 'mod_btn_border_color_h', $res_ctx->get_shortcode_att('mod_btn_border_color_h') );


        /*-- FONTS -- */
        if( $form_version == '' ) {
            $res_ctx->load_font_settings('f_toggle_txt');
        }
        $res_ctx->load_font_settings( 'f_input' );
        $res_ctx->load_font_settings( 'f_btn' );
        $res_ctx->load_font_settings( 'f_results_msg' );
        $res_ctx->load_font_settings( 'f_sale' );
        $res_ctx->load_font_settings( 'f_title' );
        $res_ctx->load_font_settings( 'f_ex' );
        $res_ctx->load_font_settings( 'f_price' );
        $res_ctx->load_font_settings( 'f_old_price' );
        $res_ctx->load_font_settings( 'f_mod_btn' );

    }
    
    function __construct() {
        parent::disable_loop_block_features();
    }

    function render($atts, $content = null) {
        
        parent::render($atts);

	    // icon
        $icon = $this->get_icon_att('tdicon');
        $icon_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $icon_data = 'data-td-svg-icon="' . $this->get_att('tdicon') . '"';
        }
        if( $icon == '' ) {
            $icon_html = '<i class="tdw-search-icon td-icon-search"></i>';
        } else {
            if( base64_encode( base64_decode( $icon ) ) == $icon ) {
                $icon_html = '<span class="tdw-search-icon tdw-search-icon-svg" ' . $icon_data . '>' . base64_decode( $icon ) . '</span>';
            } else {
                $icon_html = '<i class="tdw-search-icon ' . $icon . '"></i>';
            }
        }

	    // text
	    $text = '';
	    if( $this->get_att('toggle_txt') != '' ) {
		    $text = '<span class="tdw-search-txt">' . $this->get_att('toggle_txt') . '</span>';
	    }
	    $text_position = $this->get_att('toggle_txt_pos');

	    $buffy = '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';

            // form version
            $form_version = $this->get_att('woo_search_version');

            // input placeholder
            $input_placeholder = $this->get_att('input_placeholder');

            // button text
            $btn_text = $this->get_att('btn_text');
            if( $btn_text != '' ) {
                $btn_text = '<span>' . $btn_text . '</span>';
            }

            // button icon
            $btn_icon_pos = $this->get_att('btn_icon_pos');
            $btn_icon = $this->get_icon_att('btn_tdicon');
            $btn_icon_data = '';
            if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
                $btn_icon_data = 'data-td-svg-icon="' . $this->get_att('btn_tdicon') . '"';
            }
            $btn_icon_html = '';
            if( $btn_icon != '' ) {
                if( base64_encode( base64_decode( $btn_icon ) ) == $btn_icon ) {
                    $btn_icon_html = '<span class="tdw-search-form-btn-icon tdw-search-form-btn-icon-svg" ' . $btn_icon_data . '>' . base64_decode( $btn_icon ) . '</span>';
                } else {
                    $btn_icon_html = '<i class="tdw-search-form-btn-icon ' . $btn_icon . '"></i>';
                }
            }

            // results post limit
            $results_limit = 4;
            if( $this->get_att('results_limit') ) {
                $results_limit = $this->get_att('results_limit');
            }

            // set search query
            $search_query = $_GET['s'] ?? '';

            // search form buffy
            $search_form = '<form method="get" class="tdw-search-form" action="' . esc_url( home_url( '/' ) ) . '">';
                $search_form .= '<div class="tdw-search-form-inner">';
                    $search_form .= '<input class="tdw-search-form-input" type="text" value="' . esc_attr( $search_query ) . '" name="s" autocomplete="off" placeholder="' . $input_placeholder . '"/>';
                        $search_form .= '<button class="wpb_button wpb_btn-inverse btn tdw-search-form-btn" type="submit">';
                        if( $btn_icon_pos == '' ) {
                            $search_form .= $btn_icon_html;
                        }
                        $search_form .= $btn_text;
                        if( $btn_icon_pos == 'after' ) {
                            $search_form .= $btn_icon_html;
                        }
                    $search_form .= '</button>';
                    $search_form .= '<input type="hidden" name="post_type" value="product" />';
                $search_form .= '</div>';
            $search_form .= '</form>';

            // live search (ajax) results
            $search_form .= '<div class="tdw-aj-search">';
                if ( ( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) && $this->get_att('disable_live_search') !== 'yes' ) {
                    $search_form .= '<div class="tdw-aj-search-results">';
                        $search_form .= '<div class="tdw-aj-search-inner">';
                            $wc_products = new WP_Query(
                                array(
                                    'post_type' => 'product',
                                    'ignore_sticky_posts' => true,
                                    'post_status' => 'publish',
                                    'posts_per_page' => $results_limit,
                                )
                            );

                            foreach ( $wc_products->posts as $product ) {
                                $td_woo_product_module = new td_woo_product_module($product, $this->get_all_atts());
                                $search_form .= $td_woo_product_module->render();
                            }
                        $search_form .= '</div>';
                    $search_form .= '</div>';

                    $search_form .= '<div class="result-msg">';
                        $search_form .= '<a class="no-click" href="#">' . __td('View all results', TD_THEME_NAME ) . '</a>';
                    $search_form .= '</div>';
                }
            $search_form .= '</div>';


	        // get the block css
	        $buffy .= $this->get_block_css();

	        //get the js for this block
	        $buffy .= $this->get_block_js();

            $buffy .= '<div class="tdw-block-inner td-fix-index">';

	            $buffy .= $this->inner();

	            if( $form_version == '' ) {
                    $buffy .= '<div class="tdw-drop-down-search" aria-labelledby="tdw-search-button">';
                        $buffy .= '<div class="tdw-drop-down-search-inner">';
                            $buffy .= $search_form;
                        $buffy .= '</div>';
                    $buffy .= '</div>';

                    $buffy .= '<a href="#" role="button" class="tdw-search-btn dropdown-toggle" data-toggle="dropdown">';
                        if( $text_position == '' ) {
                            $buffy .= $text;
                        }

                        $buffy .= $icon_html;

                        if( $text_position == 'after' ) {
                            $buffy .= $text;
                        }
                    $buffy .= '</a>';
                } else {
	                $buffy .= '<div class="tdw-regular-search">';
                        $buffy .= $search_form;
	                $buffy .= '</div>';
                }

            $buffy .= '</div>';

        $buffy .= '</div>';

        return $buffy;
    }

	function inner() {

		$buffy = '';

		$td_block_layout = new td_block_layout();

		// render the JS
		ob_start();
		?>
		<script>
            jQuery().ready(function () {

                var tdwSearchItem = new tdwSearch.item();

                // block unique ID
                tdwSearchItem.blockUid = '<?php echo $this->block_uid; ?>';
                tdwSearchItem.blockAtts = '<?php echo json_encode( $this->get_all_atts(), JSON_UNESCAPED_SLASHES ); ?>';
                tdwSearchItem.jqueryObj = jQuery('.<?php echo $this->block_uid ?>');
                tdwSearchItem._searchFormVersion = '<?php echo $this->get_att('woo_search_version') ?>';
                tdwSearchItem._openSearchFormClassDropdown = 'tdw-drop-down-search-open';
                tdwSearchItem._openSearchFormClassRegular = 'tdw-regular-search-open';
                tdwSearchItem._resultsLimit = '<?php if( $this->get_att('results_limit') != '' ) echo $this->get_att('results_limit'); else echo 4; ?>';

				<?php if( $this->get_att('disable_live_search') === 'yes' ) { ?>
                    tdwSearchItem._is_live_search_active = false;
				<?php } ?>

				<?php if( $this->get_att('form_align_screen') == 'yes' ) { ?>
                    tdwSearchItem.isSearchFormFull = true;
				<?php }

				if ( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) { ?>
                    tdwSearchItem.inComposer = true;
				<?php } ?>

                tdwSearch.addItem( tdwSearchItem );

            });
		</script>
		<?php
		td_js_buffer::add_to_footer("\n" . td_util::remove_script_tag( ob_get_clean() ) );

		$buffy .= $td_block_layout->close_all_tags();

		return $buffy;
	}

	function js_tdc_callback_ajax() {

		$buffy = '';

		// add a new composer block - that one has the delete callback
		$buffy .= $this->js_tdc_get_composer_block();

		ob_start();

		?>
		<script>
            /* global jQuery:{} */
            (function () {
                var tdwSearchItem = new tdwSearch.item();

                // block unique ID
                tdwSearchItem.blockUid = '<?php echo $this->block_uid; ?>';
                tdwSearchItem.blockAtts = '<?php echo json_encode($this->get_all_atts(), JSON_UNESCAPED_SLASHES); ?>';
                tdwSearchItem.jqueryObj = jQuery('.<?php echo $this->block_uid ?>');
                tdwSearchItem._searchFormVersion = '<?php echo $this->get_att('woo_search_version') ?>';
                tdwSearchItem._openSearchFormClassDropdown = 'tdw-drop-down-search-open';
                tdwSearchItem._openSearchFormClassRegular = 'tdw-regular-search-open';

	            <?php if( $this->get_att('disable_live_search') === 'yes' ) { ?>
                    tdwSearchItem._is_live_search_active = false;
	            <?php } ?>

				<?php if( $this->get_att('form_align_screen') == 'yes' ) { ?>
                    tdwSearchItem.isSearchFormFull = true;
				<?php }

				if ( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) { ?>
                    tdwSearchItem.inComposer = true;
				<?php } ?>

                tdwSearch.addItem( tdwSearchItem );
            })();
		</script>
		<?php

		return $buffy . td_util::remove_script_tag( ob_get_clean() );
	}
}

