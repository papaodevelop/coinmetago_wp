<?php

/**
 * Class td_woo_product_tabs - shortcode for woocommerce single product tabs
 */
class td_woo_product_tabs extends td_block {

    public function get_custom_css() {
        // $unique_block_class
        $unique_block_class = $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>
            
                /* @general_style */
                .td_woo_product_tabs {
                    width: 100%;
                }
                body.woocommerce div.td_woo_product_tabs .woocommerce-tabs ul.tabs {
                    padding: 0;
                    margin: 0;
                    font-size: 0;
                    line-height: 0;
                    border-bottom: 2px solid #222;
                }
                body.woocommerce div.td_woo_product_tabs .woocommerce-tabs ul.tabs:before {
                    display: none;
                }
                body.woocommerce div.td_woo_product_tabs .woocommerce-tabs ul.tabs li {
                    margin: 0;
                    padding: 0;
                    background-color: transparent;
                    border: 0 solid #000;
                    border-radius: 0;
                }
                body.woocommerce div.td_woo_product_tabs .woocommerce-tabs ul.tabs li:last-child {
                    margin-right: 0 !important;
                }
                body.woocommerce div.td_woo_product_tabs .woocommerce-tabs ul.tabs li:before,
                body.woocommerce div.td_woo_product_tabs .woocommerce-tabs ul.tabs li:after {
                    display: none;
                }
                body.woocommerce div.td_woo_product_tabs .woocommerce-tabs ul.tabs li.active {
                    background-color: #222222;
                    color: #fff;
                }
                body.woocommerce div.td_woo_product_tabs .woocommerce-tabs ul.tabs li a {
                    display: block;
                    line-height: 17px;
                    padding: 6px 12px 7px;
                    font-size: 14px;
                    font-family: 'Roboto', sans-serif;
                    font-weight: normal;
                }
                body.woocommerce div.td_woo_product_tabs .woocommerce-tabs .panel {
                    margin-bottom: 0;
                    padding-top: 30px;
                    border: 0 solid #000;
                }
                body.woocommerce div.td_woo_product_tabs .woocommerce-tabs .panel h2 {
                    margin-top: 0;
                }
                .td_woo_product_tabs .woocommerce-Tabs-panel--description blockquote {
                    padding: 0;
                    position: relative;
                    border-left: none;
                    margin: 40px 5% 38px;
                    font-family: 'Roboto', sans-serif;
                    font-size: 32px;
                    line-height: 40px;
                    font-weight: 400;
                    text-transform: uppercase;
                    font-style: italic;
                    text-align: center;
                    color: #4db2ec;
                    word-wrap: break-word;
                }
                .td_woo_product_tabs .woocommerce-Tabs-panel--description blockquote.td_quote_left {
                    float: left;
                    width: 50%;
                    margin: 18px 18px 18px 0;
                    text-align: left;
                }
                .td_woo_product_tabs .woocommerce-Tabs-panel--description blockquote.td_quote_right {
                    float: right;
                    width: 50%;
                    margin: 21px 0 21px 21px;
                }
                .td_woo_product_tabs .woocommerce-Tabs-panel--description blockquote.td_quote_box {
                    margin: 0;
                    background-color: #FCFCFC;
                    border-left: 2px solid #4db2ec;
                    padding: 15px 23px 16px 23px;
                    position: relative;
                    top: 6px;
                    font-family: 'Open Sans', arial, sans-serif;
                    color: #777;
                    font-size: 13px;
                    line-height: 21px;
                    text-transform: none;
                    clear: both;
                }
                .td_woo_product_tabs .woocommerce-Tabs-panel--description blockquote.td_box_center {
                    margin: 0 0 29px 0;
                }
                .td_woo_product_tabs .woocommerce-Tabs-panel--description blockquote.td_box_left,
                .td_woo_product_tabs .woocommerce-Tabs-panel--description blockquote.td_box_right {
                    text-align: left;
                }
                .td_woo_product_tabs .woocommerce-Tabs-panel--description blockquote.td_box_left {
                    width: 40%;
                    float: left;
                    margin: 0 34px 20px 0;
                }
                .td_woo_product_tabs .woocommerce-Tabs-panel--description blockquote.td_box_right {
                    width: 40%;
                    float: right;
                    margin: 0 34px 20px 0;
                }
                .td_woo_product_tabs .woocommerce-Tabs-panel--description blockquote.td_pull_quote {
                    padding: 18px 25px;
                    margin: 0;
                    clear: both;
                    font-family: 'Open Sans', arial, sans-serif;
                    font-size: 14px;
                    line-height: 26px;
                    font-weight: 600;
                    text-transform: none;
                    text-align: center;
                }
                .td_woo_product_tabs .woocommerce-Tabs-panel--description blockquote.td_pull_quote:before,
                .td_woo_product_tabs .woocommerce-Tabs-panel--description blockquote.td_pull_quote:after {
                    content: '';
                    position: absolute;
                    display: block;
                    width: 15px;
                    height: 15px;
                    box-sizing: border-box;
                    -webkit-box-sizing: border-box;
                }
                .td_woo_product_tabs .woocommerce-Tabs-panel--description blockquote.td_pull_quote:before {
                    left: 0;
                    background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAALBAMAAABSacpvAAAALVBMVEUAAAC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLRK0HxpAAAADnRSTlMAd+67mWZR3SKqMxGIzB8/1rAAAABlSURBVAjXFcexDQEBAAXQd+KCRm4CDZURFGICMYFadTHBxQQmEDHCzWAI9XGJ8s/ANS95FBvccKwYr5kuUQ/5omm5dpQ9Fu+H2efEPX07Sg62f+bJ2T6pJkmnTi5FslM2L56r9geMACBhjTsodgAAAABJRU5ErkJggg==) no-repeat;
                }
                .td_woo_product_tabs .woocommerce-Tabs-panel--description blockquote.td_pull_quote:after {
                    right: 0;
                    background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAALBAMAAABSacpvAAAALVBMVEUAAAC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLRK0HxpAAAADnRSTlMA3ZnuqndmIhG7VYhEMzOiL2oAAABkSURBVAjXY+D1E2PgULZuYGB89+4A07t3AQzn3r1T4Hv3ToCh7t27CUDRBwxAYQe2d+8MGBiuAuWr5BwYGBjeFTAwzEtgYOB6xMDA8RAowGnOwMD6CsjIA4oWKwBFXYGcLQ0MAFHHH+tW1OhlAAAAAElFTkSuQmCC) no-repeat;
                }
                .td_woo_product_tabs .woocommerce-Tabs-panel--description blockquote.td_pull_center {
                    margin: 17px 0;
                    padding: 15px 50px;
                }
                .td_woo_product_tabs .woocommerce-Tabs-panel--description blockquote.td_pull_left {
                    width: 40%;
                    margin-right: 34px;
                    float: left;
                }
                .td_woo_product_tabs .woocommerce-Tabs-panel--description blockquote.td_pull_right {
                    width: 30%;
                    margin-left: 24px;
                    float: right;
                }
                .td_woo_product_tabs table.shop_attributes {
                    margin: 0;
                    border: 1px solid #ededed;
                }
                .td_woo_product_tabs table.shop_attributes tr {
                    font-size: 13px;
                    border-bottom: 1px solid #ededed;
                }
                .td_woo_product_tabs table.shop_attributes tr:last-child {
                    border-bottom-width: 0 !important;
                }
                .td_woo_product_tabs table.shop_attributes tr:nth-child(even) {
                    background-color: #fcfcfc;
                }
                .td_woo_product_tabs table.shop_attributes th,
                .td_woo_product_tabs table.shop_attributes td {
                    padding: 7px 14px;
                    background: transparent !important;
                    border-bottom: 0;
                }
                .td_woo_product_tabs table.shop_attributes th {
                    border-width: 0 1px 0 0;
                    border-style: solid;
                    border-color: #ededed;
                }
                .td_woo_product_tabs table.shop_attributes td {
                    border-left: 0;
                }
                .td_woo_product_tabs table.shop_attributes td p {
                    padding: 0;
                }
                .td_woo_product_reviews .woocommerce-Reviews-title {
                    margin-top: 0;
                }
                .td_woo_product_tabs #reviews #comments ol.commentlist li:last-child {
                    margin-bottom: 0;
                }
                .td_woo_product_tabs #reviews #comments ol.commentlist li img.avatar {
                    background-color: transparent;
                    padding: 0;
                    border-width: 4px;
                    border-color: #ebe9eb;
                }
                .td_woo_product_tabs #reviews #comments ol.commentlist li .comment-text {
                    padding: 14px;
                }
                .td_woo_product_tabs #reviews #comments ol.commentlist li .comment-tex .meta {
                    margin-bottom: 14px;
                }
                body.woocommerce .td_woo_product_tabs .star-rating {
                    width: auto;
                    height: auto;
                }
                body.woocommerce .td_woo_product_tabs .star-rating:before,
                body.woocommerce .td_woo_product_tabs .star-rating span:before {
                    position: relative;
                    font-size: 14px;
                }
                body.woocommerce .td_woo_product_tabs .star-rating span {
                    padding-top: 0;
                    font-size: 0;
                }
                .td_woo_product_tabs #reviews #comments ol.commentlist li .comment-text .description p {
                    margin-bottom: 0;
                }
                .td_woo_product_tabs #review_form_wrapper {
                    margin-top: 20px;
                }
                .td_woo_product_tabs .comment-form {
                    margin-top: 10px;
                }
                .td_woo_product_tabs #review_form #respond .form-submit {
                    margin-bottom: 0;
                }
                .td_woo_product_tabs #respond input#submit {
                    padding: 10px;
                    background: none #222;
                    font-size: 11px;
                    color: #fff;
                    text-shadow: none;
                    border: 0 solid #000;
                    border-radius: 0;
                }
                
                
                /* @tabs_ul_border */
                body.woocommerce div.$unique_block_class div.woocommerce-tabs ul.tabs {
                    border-bottom-width: @tabs_ul_border;
                }
                /* @tabs_ul_border_style */
                body.woocommerce div.$unique_block_class div.woocommerce-tabs ul.tabs {
                    border-bottom-style: @tabs_ul_border_style;
                }
                
                /* @tabs_space */
                body.woocommerce div.$unique_block_class div.woocommerce-tabs ul.tabs li {
                    margin-right: @tabs_space;
                }
                /* @tabs_padding */
                body.woocommerce div.$unique_block_class div.woocommerce-tabs ul.tabs li a {
                    padding: @tabs_padding;
                }
                /* @tabs_border */
                body.woocommerce div.$unique_block_class div.woocommerce-tabs ul.tabs li {
                    border-width: @tabs_border;
                }
                /* @tabs_border_style */
                body.woocommerce div.$unique_block_class div.woocommerce-tabs ul.tabs li {
                    border-style: @tabs_border_style;
                }
                /* @tabs_border_radius */
                body.woocommerce div.$unique_block_class div.woocommerce-tabs ul.tabs li {
                    border-radius: @tabs_border_radius;
                }
                
                
                /* @content_padd */
                body.woocommerce div.$unique_block_class div.woocommerce-tabs .panel {
                    padding: @content_padd;
                }
                /* @content_border */
                body.woocommerce div.$unique_block_class div.woocommerce-tabs .panel {
                    border-width: @content_border;
                }
                /* @content_border_style */
                body.woocommerce div.$unique_block_class div.woocommerce-tabs .panel {
                    border-style: @content_border_style;
                }
                /* @content_border_radius */
                body.woocommerce div.$unique_block_class div.woocommerce-tabs .panel {
                    border-radius: @content_border_radius;
                }
                
                
                /* @descr_align_center */
				.$unique_block_class .woocommerce-Tabs-panel--description {
					text-align: center;
				}
				/* @descr_align_right */
				.$unique_block_class .woocommerce-Tabs-panel--description {
					text-align: right;
				}
				/* @descr_align_left */
				.$unique_block_class .woocommerce-Tabs-panel--description {
					text-align: left;
				}
				
				
				/* @show_attr */
				body.woocommerce div.$unique_block_class ul.tabs li.additional_information_tab {
				    display: @show_attr;
				}
				
				/* @attr_title_space */
				.$unique_block_class .woocommerce-Tabs-panel--additional_information h2{
				    margin-bottom: @attr_title_space;
				}
				
				/* @label_padding */
                .$unique_block_class table.shop_attributes th {
                    padding: @label_padding;
                }
                /* @val_padding */
                .$unique_block_class table.shop_attributes td {
                    padding: @val_padding;
                }
                
                /* @label_horiz_left */
                .$unique_block_class table.shop_attributes th {
                    text-align: left;
                }
                /* @label_horiz_center */
                .$unique_block_class table.shop_attributes th {
                    text-align: center;
                }
                /* @label_horiz_right */
                .$unique_block_class table.shop_attributes th {
                    text-align: right;
                }
                
                /* @value_horiz_left */
                .$unique_block_class table.shop_attributes td {
                    text-align: left;
                }
                /* @value_horiz_center */
                .$unique_block_class table.shop_attributes td {
                    text-align: center;
                }
                /* @value_horiz_right */
                .$unique_block_class table.shop_attributes td {
                    text-align: right;
                }
                
                /* @box_border */
                .$unique_block_class table.shop_attributes {
                    border-width: @box_border;
                }
                /* @row_border */
                .$unique_block_class table.shop_attributes tr {
                    border-bottom-width: @row_border;
                }
                /* @sep_border */
                .$unique_block_class table.shop_attributes th {
                    border-width: 0 @sep_border 0 0 !important;
                }
                
                
                /* @show_rev */
				body.woocommerce div.$unique_block_class ul.tabs li.reviews_tab {
				    display: @show_rev;
				}
                
                /* @rev_title_space */
                body .$unique_block_class .woocommerce-Reviews-title {
                    margin-bottom: @rev_title_space; 
                }
                /* @rev_space */
                body .$unique_block_class #reviews #comments ol.commentlist li {
                    margin-bottom: @rev_space; 
                }
                
                /* @av_border */
                body .$unique_block_class #reviews #comments ol.commentlist li img.avatar {
                    border-width: @av_border;}
                
                /* @av_border_style */
                body .$unique_block_class #reviews #comments ol.commentlist li img.avatar {
                    border-style: @av_border_style;}
                
                /* @av_radius */
                body .$unique_block_class #reviews #comments ol.commentlist li img.avatar {
                    border-radius: @av_radius;}
                
                /* @rev_padding */
                body .$unique_block_class #reviews #comments ol.commentlist li .comment-text {
                    padding: @rev_padding;}
                 
                /* @rev_border */
                body .$unique_block_class #reviews #comments ol.commentlist li .comment-text {
                    border-width: @rev_border;}
                 
                /* @rev_border_style */
                body .$unique_block_class #reviews #comments ol.commentlist li .comment-text {
                    border-style: @rev_border_style;}
                  
                /* @rev_radius */
                body .$unique_block_class #reviews #comments ol.commentlist li .comment-text {
                    border-radius: @rev_radius;}
                 
                /* @meta_space */
                body .$unique_block_class #reviews #comments ol.commentlist li .comment-text p.meta {
                    margin-bottom: @meta_space;
                    line-height: 1;}
                 
                /* @show_date */
                body .$unique_block_class #reviews #comments ol.commentlist li .comment-text p.meta .woocommerce-review__dash,
                body .$unique_block_class #reviews #comments ol.commentlist li .comment-text p.meta time {
                    display: @show_date;}
                    
                /* @stars_size */
                body.woocommerce .$unique_block_class .star-rating:before,
                body.woocommerce .$unique_block_class .star-rating span:before {
                    font-size: @stars_size;}
                    
                /* @form_space */
                body .$unique_block_class #review_form_wrapper {
                    margin-top: @form_space;}
                    
                /* @form_stars_size */  
                body .$unique_block_class #review_form #respond .stars {
                    font-size: @form_stars_size;}
                    
                /* @stars_margin */
                body .$unique_block_class .star-rating:before,
                body .$unique_block_class .star-rating span:before {
                    letter-spacing: @stars_margin;} 
                    
                /* @label_space */  
                body .$unique_block_class #review_form #respond p label {
                    display: block;
                    margin-bottom: @label_space;}
                    
                /* @input_padding */ 
                body .$unique_block_class #review_form #respond textarea,
                body .$unique_block_class #review_form #respond input[type=text],
                body .$unique_block_class #review_form #respond input[type=email] {
                    padding: @input_padding;
                    height: auto;}
                    
                /* @input_space */    
                body .$unique_block_class #review_form #respond p {
                    margin-bottom: @input_space;}
                   
                /* @input_border */  
                body .$unique_block_class #review_form #respond textarea,
                body .$unique_block_class #review_form #respond input[type=text],
                body .$unique_block_class #review_form #respond input[type=email] {
                    border-width: @input_border !important;}
                    
                /* @input_border_style */  
                body .$unique_block_class #review_form #respond textarea,
                body .$unique_block_class #review_form #respond input[type=text],
                body .$unique_block_class #review_form #respond input[type=email] {
                    border-style: @input_border_style !important;}
                    
                /* @input_radius */  
                body .$unique_block_class #review_form #respond textarea,
                body .$unique_block_class #review_form #respond input[type=text],
                body .$unique_block_class #review_form #respond input[type=email] {
                    border-radius: @input_radius !important;}
                    
                /* @btn_padding */ 
                body .$unique_block_class #respond input#submit {
                    padding: @btn_padding;}
                  
                /* @btn_border */
                body .$unique_block_class #respond input#submit {
                    border-width: @btn_border;}
                    
                /* @btn_border_style */
                body .$unique_block_class #respond input#submit {
                    border-style: @btn_border_style;}
                    
                /* @btn_radius */  
                body .$unique_block_class #respond input#submit {
                    border-radius: @btn_radius;}
                
                
                /* @tabs_horiz_align_left */
                body.woocommerce div.$unique_block_class div.woocommerce-tabs ul.tabs {
                    text-align: left;
                }
                /* @tabs_horiz_align_center */
                body.woocommerce div.$unique_block_class div.woocommerce-tabs ul.tabs {
                    text-align: center;
                }
                /* @tabs_horiz_align_right */
                body.woocommerce div.$unique_block_class div.woocommerce-tabs ul.tabs {
                    text-align: right;
                }
                
                /* @tabs_ul_border_color */
                body.woocommerce div.$unique_block_class div.woocommerce-tabs ul.tabs {
                    border-bottom-color: @tabs_ul_border_color;
                }
                
                /* @tabs_color */
                body.woocommerce div.$unique_block_class div.woocommerce-tabs ul.tabs li a {
                    color: @tabs_color;
                }
                /* @tabs_color_h */
                body.woocommerce div.$unique_block_class div.woocommerce-tabs ul.tabs li:hover a {
                    color: @tabs_color_h;
                }
                /* @tabs_color_a */
                body.woocommerce div.$unique_block_class div.woocommerce-tabs ul.tabs li.active a {
                    color: @tabs_color_a;
                }
                /* @tabs_bg_color */
                body.woocommerce div.$unique_block_class div.woocommerce-tabs ul.tabs li {
                    background-color: @tabs_bg_color;
                }
                /* @tabs_bg_color_h */
                body.woocommerce div.$unique_block_class div.woocommerce-tabs ul.tabs li:hover {
                    background-color: @tabs_bg_color_h;
                }
                /* @tabs_bg_color_a */
                body.woocommerce div.$unique_block_class div.woocommerce-tabs ul.tabs li.active {
                    background-color: @tabs_bg_color_a;
                }
                /* @tabs_border_color */
                body.woocommerce div.$unique_block_class div.woocommerce-tabs ul.tabs li {
                    border-color: @tabs_border_color;
                }
                /* @tabs_border_color_h */
                body.woocommerce div.$unique_block_class div.woocommerce-tabs ul.tabs li:hover {
                    border-color: @tabs_border_color_h;
                }
                /* @tabs_border_color_a */
                body.woocommerce div.$unique_block_class div.woocommerce-tabs ul.tabs li.active {
                    border-color: @tabs_border_color_a;
                }
                
                /* @content_bg_color */
                body.woocommerce div.td_woo_product_tabs div.woocommerce-tabs .panel {
                    background-color: @content_bg_color;
                }
                /* @content_border_color */
                body.woocommerce div.td_woo_product_tabs div.woocommerce-tabs .panel {
                    border-color: @content_border_color;
                }
                
				/* @descr_color */
				.$unique_block_class .woocommerce-Tabs-panel--description {
					color: @descr_color;
				}
				/* @h_color */
				.$unique_block_class .woocommerce-Tabs-panel--description h1,
				.$unique_block_class .woocommerce-Tabs-panel--description h2,
				.$unique_block_class .woocommerce-Tabs-panel--description h3,
				.$unique_block_class .woocommerce-Tabs-panel--description h4,
				.$unique_block_class .woocommerce-Tabs-panel--description h5,
				.$unique_block_class .woocommerce-Tabs-panel--description h6 {
			        color: @h_color;
		        }
				/* @bq_color */
				body .$unique_block_class .tdw-block-inner div.woocommerce-Tabs-panel--description blockquote {
			        color: @bq_color;
		        }
				/* @a_color */
				.$unique_block_class .woocommerce-Tabs-panel--description a {
			        color: @a_color;
		        }
				/* @a_hover_color */
				.$unique_block_class .woocommerce-Tabs-panel--description a:hover {
			        color: @a_hover_color;
		        }
				
				/* @attr_title_color */
                .$unique_block_class .woocommerce-Tabs-panel--additional_information h2 {
                    color: @attr_title_color;
                }				
				/* @row_bg_color */
                .$unique_block_class table.shop_attributes tr {
                    background-color: @row_bg_color;
                }
                /* @row_bg_color_a */
                .$unique_block_class table.shop_attributes tr:nth-child(even) {
                    background-color: @row_bg_color_a;
                }
                /* @label_color */
                .$unique_block_class table.shop_attributes th {
                    color: @label_color;
                }
                /* @value_color */
                .$unique_block_class table.shop_attributes td {
                    color: @value_color;
                }
                /* @border_color */
                .$unique_block_class table.shop_attributes {
                    border-color: @border_color;
                }
                .$unique_block_class table.shop_attributes tr {
                    border-bottom-color: @border_color;
                }
                .$unique_block_class table.shop_attributes th {
                    border-right-color: @border_color;
                }
                
                
                /* @rev_title_color */
                body .$unique_block_class .woocommerce-Reviews-title {
                    color: @rev_title_color;
                }
                
                /* @av_border_color */
                body .$unique_block_class #reviews #comments ol.commentlist li img.avatar {
                    border-color: @av_border_color;
                }
                
                /* @rev_bg_color */
                body .$unique_block_class #reviews #comments ol.commentlist li .comment-text {
                    background-color: @rev_bg_color;
                }
                /* @rev_border_color */
                body .$unique_block_class #reviews #comments ol.commentlist li .comment-text {
                    border-color: @rev_border_color;
                }
                
                /* @auth_color */
                body .$unique_block_class #reviews #comments ol.commentlist li .comment-text .woocommerce-review__author {
                    color: @auth_color;
                }
                /* @date_color */
                body .$unique_block_class #reviews #comments ol.commentlist li .comment-text p.meta time {
                    color: @date_color;
                }
                /* @stars_full_color */
                body.woocommerce .$unique_block_class .star-rating span:before {
                    color: @stars_full_color;
                }
                /* @stars_empty_color */
                body.woocommerce .$unique_block_class .star-rating:before {
                    color: @stars_empty_color;
                }
                /* @rev_txt_color */
                body .$unique_block_class #reviews #comments ol.commentlist li .comment-text .description {
                    color: @rev_txt_color;
                }
                
                /* @form_title_color */
                body .$unique_block_class #reply-title {
                    color: @form_title_color;
                }
                /* @form_stars_txt_color */
                body .$unique_block_class #review_form #respond .comment-form-rating label {
                    color: @form_stars_txt_color;
                }
                /* @form_stars_color */
                body .$unique_block_class #review_form #respond .stars a {
                    color: @form_stars_color;
                }
                /* @label_txt_color */
                body .$unique_block_class #review_form #respond label {
                    color: @label_txt_color;
                }
                /* @input_txt_color */
                body .$unique_block_class #review_form #respond textarea,
                body .$unique_block_class #review_form #respond input[type=text],
                body .$unique_block_class #review_form #respond input[type=email] {
                    color: @input_txt_color;
                }
                /* @input_bg_color */
                body .$unique_block_class #review_form #respond textarea,
                body .$unique_block_class #review_form #respond input[type=text],
                body .$unique_block_class #review_form #respond input[type=email] {
                    background-color: @input_bg_color;
                }
                /* @input_border_color */
                body .$unique_block_class #review_form #respond textarea,
                body .$unique_block_class #review_form #respond input[type=text],
                body .$unique_block_class #review_form #respond input[type=email] {
                    border-color: @input_border_color !important;
                }
                
                /* @btn_bg_color */
                body .$unique_block_class #respond input#submit {
                    background-color: @btn_bg_color;
                }
                /* @btn_bg_color_h */
                body .$unique_block_class #respond input#submit:hover {
                    background-color: @btn_bg_color_h;
                }
                /* @btn_txt_color */
                body .$unique_block_class #respond input#submit {
                    color: @btn_txt_color;
                }
                /* @btn_txt_color_h */
                body .$unique_block_class #respond input#submit:hover {
                    color: @btn_txt_color_h;
                }
                /* @btn_border_color */
                body .$unique_block_class #respond input#submit {
                    border-color: @btn_border_color;
                }
                /* @btn_border_color_h */
                body .$unique_block_class #respond input#submit:hover {
                    border-color: @btn_border_color_h;
                }
                
                
                
                /* @f_tabs */
                body.woocommerce div.$unique_block_class div.woocommerce-tabs ul.tabs li a {
                    @f_tabs
                }
                
				/* @f_descr */
				.$unique_block_class .woocommerce-Tabs-panel--description {
					@f_descr
				}
				/* @f_h1 */
				.$unique_block_class .woocommerce-Tabs-panel--description h1 {
			        @f_h1
		        }
				/* @f_h2 */
				.$unique_block_class .woocommerce-Tabs-panel--description h2 {
			        @f_h2
		        }
				/* @f_h3 */
				.$unique_block_class .woocommerce-Tabs-panel--description h3 {
			        @f_h3
		        }
				/* @f_h4 */
				.$unique_block_class .woocommerce-Tabs-panel--description h4 {
			        @f_h4
		        }
				/* @f_h5 */
				.$unique_block_class .woocommerce-Tabs-panel--description h5 {
			        @f_h5
		        }
				/* @f_h6 */
				.$unique_block_class .woocommerce-Tabs-panel--description h6 {
			        @f_h6
		        }
				/* @f_list */
				.$unique_block_class .woocommerce-Tabs-panel--description li {
			        @f_list
		        }
				/* @f_list_arrow */
				.$unique_block_class .woocommerce-Tabs-panel--description li:before {
				    margin-top: 1px;
			        line-height: @f_list_arrow !important;
		        }
				/* @f_bq */
				.$unique_block_class .woocommerce-Tabs-panel--description blockquote {
			        @f_bq
		        }
				
				/* @f_attr_title */
                .$unique_block_class .woocommerce-Tabs-panel--additional_information h2 {
                    @f_attr_title
                }	
                /* @f_attr_label */
                .$unique_block_class table.shop_attributes th {
                    @f_attr_label
                }
                /* @f_value */
                .$unique_block_class table.shop_attributes td {
                    @f_value
                }
                
                /* @f_rev_title */
                body .$unique_block_class .woocommerce-Reviews-title {
                    @f_rev_title
                }
                /* @f_auth */
                body .$unique_block_class #reviews #comments ol.commentlist li .comment-text .woocommerce-review__author {
                    @f_auth
                }
                /* @f_date */
                body .$unique_block_class #reviews #comments ol.commentlist li .comment-text p.meta time {
                    @f_date
                }
                /* @f_txt */
                body .$unique_block_class #reviews #comments ol.commentlist li .comment-text .description {
                    @f_txt;
                }
                /* @f_form_t */
                body .$unique_block_class #reply-title {
                    @f_form_t
                }
                /* @f_rev_label */
                body .$unique_block_class #review_form #respond label {
                    @f_rev_label
                }
                /* @f_input */
                body .$unique_block_class #review_form #respond textarea,
                body .$unique_block_class #review_form #respond input[type=text],
                body .$unique_block_class #review_form #respond input[type=email],
                .$unique_block_class .woocommerce-noreviews,
                .$unique_block_class .comment-notes {
                    @f_input
                }
                /* @f_btn */
                body .$unique_block_class #respond input#submit {
                    @f_btn
                }
            
            </style>";

        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        /*-- GENERAL-- */
        $res_ctx->load_settings_raw('general_style', 1);



        /*-- TABS LIST-- */
        // align toggle
        $toggle_horiz_align = $res_ctx->get_shortcode_att('tabs_horiz_align');
        if ($toggle_horiz_align == 'content-horiz-left') {
            $res_ctx->load_settings_raw('tabs_horiz_align_left', 1);
        } else if( $toggle_horiz_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw('tabs_horiz_align_center', 1);
        } else if( $toggle_horiz_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw('tabs_horiz_align_right', 1);
        }

        // tabs list border size
        $tabs_ul_border = $res_ctx->get_shortcode_att('tabs_ul_border');
        $res_ctx->load_settings_raw('tabs_ul_border', $tabs_ul_border);
        if( $tabs_ul_border !== '' && is_numeric( $tabs_ul_border ) ) {
            $res_ctx->load_settings_raw('tabs_ul_border', $tabs_ul_border . 'px');
        }
        // tabs list border style
        $tabs_ul_border_style = $res_ctx->get_shortcode_att('tabs_ul_border_style');
        $res_ctx->load_settings_raw('tabs_ul_border_style', $tabs_ul_border_style);
        if( $tabs_ul_border_style == '' ) {
            $res_ctx->load_settings_raw('tabs_ul_border_style', 'solid');
        }



        /*-- TABS-- */
        // tabs space
        $tabs_space = $res_ctx->get_shortcode_att('tabs_space');
        $res_ctx->load_settings_raw('tabs_space', $tabs_space);
        if( $tabs_space !== '' && is_numeric( $tabs_space ) ) {
            $res_ctx->load_settings_raw('tabs_space', $tabs_space . 'px');
        }

        // tabs padding
        $tabs_padding = $res_ctx->get_shortcode_att('tabs_padding');
        $res_ctx->load_settings_raw('tabs_padding', $tabs_padding);
        if( $tabs_padding !== '' && is_numeric( $tabs_padding ) ) {
            $res_ctx->load_settings_raw('tabs_padding', $tabs_padding . 'px');
        }

        // tabs border size
        $tabs_border = $res_ctx->get_shortcode_att('tabs_border');
        $res_ctx->load_settings_raw('tabs_border', $tabs_border);
        if( $tabs_border !== '' && is_numeric( $tabs_border ) ) {
            $res_ctx->load_settings_raw('tabs_border', $tabs_border . 'px');
        }
        // tabs border style
        $tabs_border_style = $res_ctx->get_shortcode_att('tabs_border_style');
        $res_ctx->load_settings_raw('tabs_border_style', $tabs_border_style);
        if( $tabs_border_style == '' ) {
            $res_ctx->load_settings_raw('tabs_border_style', 'solid');
        }
        // tabs border radius
        $tabs_border_radius = $res_ctx->get_shortcode_att('tabs_border_radius');
        $res_ctx->load_settings_raw('tabs_border_radius', $tabs_border_radius);
        if( $tabs_border_radius !== '' && is_numeric( $tabs_border_radius ) ) {
            $res_ctx->load_settings_raw('tabs_border_radius', $tabs_border_radius . 'px');
        }



        /*-- CONTENT -- */
        // content padding
        $content_padd = $res_ctx->get_shortcode_att('content_padd');
        $res_ctx->load_settings_raw('content_padd', $content_padd);
        if( $content_padd !== '' && is_numeric( $content_padd ) ) {
            $res_ctx->load_settings_raw('content_padd', $content_padd . 'px');
        }
        // content border size
        $content_border = $res_ctx->get_shortcode_att('content_border');
        $res_ctx->load_settings_raw('content_border', $content_border);
        if( $content_border !== '' && is_numeric( $content_border ) ) {
            $res_ctx->load_settings_raw('content_border', $content_border . 'px');
        }
        // content border style
        $content_border_style = $res_ctx->get_shortcode_att('content_border_style');
        $res_ctx->load_settings_raw('content_border_style', $content_border_style);
        if( $content_border_style == '' ) {
            $res_ctx->load_settings_raw('content_border_style', 'solid');
        }
        // content border radius
        $content_border_radius = $res_ctx->get_shortcode_att('content_border_radius');
        $res_ctx->load_settings_raw('content_border_radius', $content_border_radius);
        if( $content_border_radius !== '' && is_numeric( $content_border_radius ) ) {
            $res_ctx->load_settings_raw('content_border_radius', $content_border_radius . 'px');
        }



        /*-- DESCRIPTION -- */
        // content align
        $descr_content_align = $res_ctx->get_shortcode_att('content_align_horizontal');
        if ( $descr_content_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'descr_align_center', 1 );
        } else if ( $descr_content_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'descr_align_right', 1 );
        } else if ( $descr_content_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'descr_align_left', 1 );
        }



        /*-- ATTRIBUTES -- */
        // show attributes tab
        $res_ctx->load_settings_raw( 'show_attr', $res_ctx->get_shortcode_att( 'show_attr' ) );

        // title bottom space
        $attr_title_space = $res_ctx->get_shortcode_att( 'attr_title_space' );
        $res_ctx->load_settings_raw( 'attr_title_space', $attr_title_space );
        if( $attr_title_space != '' && is_numeric( $attr_title_space ) ) {
            $res_ctx->load_settings_raw( 'attr_title_space', $attr_title_space . 'px' );
        }

        // value padding
        $val_padding = $res_ctx->get_shortcode_att( 'val_padding' );
        $res_ctx->load_settings_raw( 'val_padding', $val_padding );
        if( $val_padding != '' && is_numeric( $val_padding ) ) {
            $res_ctx->load_settings_raw( 'val_padding', $val_padding . 'px' );
        }

        // label padding
        $label_padding = $res_ctx->get_shortcode_att( 'label_padding' );
        $res_ctx->load_settings_raw( 'label_padding', $label_padding );
        if( $label_padding != '' && is_numeric( $label_padding ) ) {
            $res_ctx->load_settings_raw( 'label_padding', $label_padding . 'px' );
        }
        // label horiz align
        $label_horiz = $res_ctx->get_shortcode_att( 'label_horiz' );
        if( $label_horiz == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'label_horiz_left', 1 );
        } else if( $label_horiz == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'label_horiz_center', 1 );
        } else if( $label_horiz == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'label_horiz_right', 1 );
        }
        // label horiz align
        $value_horiz = $res_ctx->get_shortcode_att( 'value_horiz' );
        if( $value_horiz == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'value_horiz_left', 1 );
        } else if( $value_horiz == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'value_horiz_center', 1 );
        } else if( $value_horiz == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'value_horiz_right', 1 );
        }

        // box border size
        $box_border = $res_ctx->get_shortcode_att( 'box_border' );
        $res_ctx->load_settings_raw( 'box_border', $box_border );
        if( $box_border != '' && is_numeric( $box_border ) ) {
            $res_ctx->load_settings_raw( 'box_border', $box_border . 'px' );
        }

        // row border size
        $row_border = $res_ctx->get_shortcode_att( 'row_border' );
        $res_ctx->load_settings_raw( 'row_border', $row_border );
        if( $row_border != '' && is_numeric( $row_border ) ) {
            $res_ctx->load_settings_raw( 'row_border', $row_border . 'px' );
        }

        // separator border size
        $sep_border = $res_ctx->get_shortcode_att( 'sep_border' );
        $res_ctx->load_settings_raw( 'sep_border', $sep_border );
        if( $sep_border != '' && is_numeric( $sep_border ) ) {
            $res_ctx->load_settings_raw( 'sep_border', $sep_border . 'px' );
        }



        /*-- REVIEWS -- */
        // show attributes tab
        $res_ctx->load_settings_raw( 'show_rev', $res_ctx->get_shortcode_att( 'show_rev' ) );

        $rev_title_space = $res_ctx->get_shortcode_att('rev_title_space');
        $res_ctx->load_settings_raw('rev_title_space', $rev_title_space);
        if ($rev_title_space != '' && is_numeric($rev_title_space)) {
            $res_ctx->load_settings_raw('rev_title_space', $rev_title_space . 'px');
        }

        $rev_space = $res_ctx->get_shortcode_att('rev_space');
        $res_ctx->load_settings_raw('rev_space', $rev_space);
        if ($rev_space != '' && is_numeric($rev_space)) {
            $res_ctx->load_settings_raw('rev_space', $rev_space . 'px');
        }


        $av_border = $res_ctx->get_shortcode_att('av_border');
        $res_ctx->load_settings_raw('av_border', $av_border);
        if ($av_border != '' && is_numeric($av_border)) {
            $res_ctx->load_settings_raw('av_border', $av_border . 'px');
        }

        $res_ctx->load_settings_raw('av_border_style', $res_ctx->get_shortcode_att('av_border_style'));

        $av_radius = $res_ctx->get_shortcode_att('av_radius');
        $res_ctx->load_settings_raw('av_radius', $av_radius);
        if ($av_radius != '' && is_numeric($av_radius)) {
            $res_ctx->load_settings_raw('av_radius', $av_radius . 'px');
        }


        $rev_padding = $res_ctx->get_shortcode_att('rev_padding');
        $res_ctx->load_settings_raw('rev_padding', $rev_padding);
        if ($rev_padding != '' && is_numeric($rev_padding)) {
            $res_ctx->load_settings_raw('rev_padding', $rev_padding . 'px');
        }

        $rev_border =  $res_ctx->get_shortcode_att('rev_border');
        $res_ctx->load_settings_raw('rev_border', $rev_border);
        if ($rev_border != '' && is_numeric($rev_border)) {
            $res_ctx->load_settings_raw('rev_border', $rev_border . 'px');
        }

        $res_ctx->load_settings_raw('rev_border_style', $res_ctx->get_shortcode_att('rev_border_style'));

        $rev_radius =  $res_ctx->get_shortcode_att('rev_radius');
        $res_ctx->load_settings_raw('rev_radius', $rev_radius);
        if ($rev_radius != '' && is_numeric($rev_radius)) {
            $res_ctx->load_settings_raw('rev_radius', $rev_radius . 'px');
        }


        $meta_space =  $res_ctx->get_shortcode_att('meta_space');
        $res_ctx->load_settings_raw('meta_space', $meta_space);
        if ($meta_space != '' && is_numeric($meta_space)) {
            $res_ctx->load_settings_raw('meta_space', $meta_space . 'px');
        }

        $res_ctx->load_settings_raw('show_date', $res_ctx->get_shortcode_att('show_date'));

        $stars_size = $res_ctx->get_shortcode_att('stars_size');
        $res_ctx->load_settings_raw('stars_size', $stars_size);
        if ($stars_size != '' && is_numeric($stars_size)) {
            $res_ctx->load_settings_raw('stars_size', $stars_size . 'px');
        }


        $form_space = $res_ctx->get_shortcode_att('form_space');
        $res_ctx->load_settings_raw('form_space', $form_space);
        if ($form_space != '' && is_numeric($form_space)) {
            $res_ctx->load_settings_raw('form_space', $form_space . 'px');
        }

        $form_stars_size = $res_ctx->get_shortcode_att('form_stars_size');
        $res_ctx->load_settings_raw('form_stars_size', $form_stars_size);
        if ($form_stars_size != '' && is_numeric($form_stars_size)) {
            $res_ctx->load_settings_raw('form_stars_size', $form_stars_size . 'px');
        }


        $label_space = $res_ctx->get_shortcode_att('label_space');
        $res_ctx->load_settings_raw('label_space', $label_space);
        if ($label_space != '' && is_numeric($label_space)) {
            $res_ctx->load_settings_raw('label_space', $label_space . 'px');
        }


        $input_padding = $res_ctx->get_shortcode_att('input_padding');
        $res_ctx->load_settings_raw('input_padding', $input_padding);
        if ($input_padding != '' && is_numeric($input_padding)) {
            $res_ctx->load_settings_raw('input_padding', $input_padding . 'px');
        }

        // stars margin
        $stars_margin = $res_ctx->get_shortcode_att( 'stars_margin' );
        if( $stars_margin != '' && is_numeric( $stars_margin ) ) {
            $res_ctx->load_settings_raw( 'stars_margin', $stars_margin . 'px' );
        }

        $input_space = $res_ctx->get_shortcode_att('input_space');
        $res_ctx->load_settings_raw('input_space', $input_space);
        if ($input_space != '' && is_numeric($input_space)) {
            $res_ctx->load_settings_raw('input_space', $input_space . 'px');
        }

        $input_border = $res_ctx->get_shortcode_att('input_border');
        $res_ctx->load_settings_raw('input_border', $input_border);
        if ($input_border != '' && is_numeric($input_border)) {
            $res_ctx->load_settings_raw('input_border', $input_border . 'px');
        }

        $res_ctx->load_settings_raw('input_border_style', $res_ctx->get_shortcode_att('input_border_style'));

        $input_radius = $res_ctx->get_shortcode_att('input_radius');
        $res_ctx->load_settings_raw('input_radius', $input_radius);
        if ($input_radius != '' && is_numeric($input_radius)) {
            $res_ctx->load_settings_raw('input_radius', $input_radius . 'px');
        }


        $btn_padding = $res_ctx->get_shortcode_att('btn_padding');
        $res_ctx->load_settings_raw('btn_padding', $btn_padding);
        if ($btn_padding != '' && is_numeric($btn_padding)) {
            $res_ctx->load_settings_raw('btn_padding', $btn_padding . 'px');
        }

        $btn_border = $res_ctx->get_shortcode_att('btn_border');
        $res_ctx->load_settings_raw('btn_border', $btn_border);
        if ($btn_border != '' && is_numeric($btn_border)) {
            $res_ctx->load_settings_raw('btn_border', $btn_border . 'px');
        }

        $res_ctx->load_settings_raw('btn_border_style', $res_ctx->get_shortcode_att('btn_border_style'));

        $btn_radius = $res_ctx->get_shortcode_att('btn_radius');
        $res_ctx->load_settings_raw('btn_radius', $btn_radius);
        if ($btn_radius != '' && is_numeric($btn_radius)) {
            $res_ctx->load_settings_raw('btn_radius', $btn_radius . 'px');
        }



        /*-- STYLE-- */
        $res_ctx->load_settings_raw('tabs_ul_border_color', $res_ctx->get_shortcode_att('tabs_ul_border_color'));

        $res_ctx->load_settings_raw('tabs_color', $res_ctx->get_shortcode_att('tabs_color'));
        $res_ctx->load_settings_raw('tabs_color_h', $res_ctx->get_shortcode_att('tabs_color_h'));
        $res_ctx->load_settings_raw('tabs_color_a', $res_ctx->get_shortcode_att('tabs_color_a'));
        $res_ctx->load_settings_raw('tabs_bg_color', $res_ctx->get_shortcode_att('tabs_bg_color'));
        $res_ctx->load_settings_raw('tabs_bg_color_h', $res_ctx->get_shortcode_att('tabs_bg_color_h'));
        $res_ctx->load_settings_raw('tabs_bg_color_a', $res_ctx->get_shortcode_att('tabs_bg_color_a'));
        $res_ctx->load_settings_raw('tabs_border_color', $res_ctx->get_shortcode_att('tabs_border_color'));
        $res_ctx->load_settings_raw('tabs_border_color_h', $res_ctx->get_shortcode_att('tabs_border_color_h'));
        $res_ctx->load_settings_raw('tabs_border_color_a', $res_ctx->get_shortcode_att('tabs_border_color_a'));


        $res_ctx->load_settings_raw( 'content_bg_color', $res_ctx->get_shortcode_att('content_bg_color') );
        $res_ctx->load_settings_raw( 'content_border_color', $res_ctx->get_shortcode_att('content_border_color') );


        $res_ctx->load_settings_raw( 'descr_color', $res_ctx->get_shortcode_att('descr_color') );
        $res_ctx->load_settings_raw( 'h_color', $res_ctx->get_shortcode_att('h_color') );
        $res_ctx->load_settings_raw( 'bq_color', $res_ctx->get_shortcode_att('bq_color') );
        $res_ctx->load_settings_raw( 'a_color', $res_ctx->get_shortcode_att('a_color') );
        $res_ctx->load_settings_raw( 'a_hover_color', $res_ctx->get_shortcode_att('a_hover_color') );


        $res_ctx->load_settings_raw( 'attr_title_color', $res_ctx->get_shortcode_att( 'attr_title_color' ) );
        $res_ctx->load_settings_raw( 'row_bg_color', $res_ctx->get_shortcode_att( 'row_bg_color' ) );
        $res_ctx->load_settings_raw( 'row_bg_color_a', $res_ctx->get_shortcode_att( 'row_bg_color_a' ) );
        $res_ctx->load_settings_raw( 'label_color', $res_ctx->get_shortcode_att( 'label_color' ) );
        $res_ctx->load_settings_raw( 'value_color', $res_ctx->get_shortcode_att( 'value_color' ) );
        $res_ctx->load_settings_raw( 'border_color', $res_ctx->get_shortcode_att( 'border_color' ) );

        $res_ctx->load_settings_raw('rev_title_color', $res_ctx->get_shortcode_att('rev_title_color'));

        $res_ctx->load_settings_raw('av_border_color', $res_ctx->get_shortcode_att('av_border_color'));

        $res_ctx->load_settings_raw('rev_bg_color', $res_ctx->get_shortcode_att('rev_bg_color'));
        $res_ctx->load_settings_raw('rev_border_color', $res_ctx->get_shortcode_att('rev_border_color'));

        $res_ctx->load_settings_raw('auth_color', $res_ctx->get_shortcode_att('auth_color'));
        $res_ctx->load_settings_raw('date_color', $res_ctx->get_shortcode_att('date_color'));
        $res_ctx->load_settings_raw('stars_full_color', $res_ctx->get_shortcode_att('stars_full_color'));
        $res_ctx->load_settings_raw('stars_empty_color', $res_ctx->get_shortcode_att('stars_empty_color'));
        $res_ctx->load_settings_raw('rev_txt_color', $res_ctx->get_shortcode_att('rev_txt_color'));

        $res_ctx->load_settings_raw('form_title_color', $res_ctx->get_shortcode_att('form_title_color'));
        $res_ctx->load_settings_raw('form_stars_txt_color', $res_ctx->get_shortcode_att('form_stars_txt_color'));
        $res_ctx->load_settings_raw('form_stars_color', $res_ctx->get_shortcode_att('form_stars_color'));
        $res_ctx->load_settings_raw('label_txt_color', $res_ctx->get_shortcode_att('label_txt_color'));
        $res_ctx->load_settings_raw('input_txt_color', $res_ctx->get_shortcode_att('input_txt_color'));
        $res_ctx->load_settings_raw('input_bg_color', $res_ctx->get_shortcode_att('input_bg_color'));
        $res_ctx->load_settings_raw('input_border_color', $res_ctx->get_shortcode_att('input_border_color'));
        $res_ctx->load_settings_raw('btn_bg_color', $res_ctx->get_shortcode_att('btn_bg_color'));
        $res_ctx->load_settings_raw('btn_bg_color_h', $res_ctx->get_shortcode_att('btn_bg_color_h'));
        $res_ctx->load_settings_raw('btn_txt_color', $res_ctx->get_shortcode_att('btn_txt_color'));
        $res_ctx->load_settings_raw('btn_txt_color_h', $res_ctx->get_shortcode_att('btn_txt_color_h'));
        $res_ctx->load_settings_raw('btn_border_color', $res_ctx->get_shortcode_att('btn_border_color'));
        $res_ctx->load_settings_raw('btn_border_color_h', $res_ctx->get_shortcode_att('btn_border_color_h'));



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_tabs' );

        $res_ctx->load_font_settings( 'f_descr' );
        $res_ctx->load_font_settings( 'f_h1' );
        $res_ctx->load_font_settings( 'f_h2' );
        $res_ctx->load_font_settings( 'f_h3' );
        $res_ctx->load_font_settings( 'f_h4' );
        $res_ctx->load_font_settings( 'f_h5' );
        $res_ctx->load_font_settings( 'f_h6' );
        $res_ctx->load_font_settings( 'f_list' );
        $f_list_size = $res_ctx->get_shortcode_att('f_list_font_size');
        $f_list_lh = $res_ctx->get_shortcode_att('f_list_font_line_height');
        if( $f_list_size != '' && $f_list_lh == '' ) {
            if( is_numeric( $f_list_size ) ) {
                $res_ctx->load_settings_raw( 'f_list_arrow', $f_list_size . 'px' );
            } else {
                $res_ctx->load_settings_raw( 'f_list_arrow', $f_list_size );
            }
        }
        if( $f_list_size == '' && $f_list_lh != '' ) {
            if( is_numeric( $f_list_lh ) ) {
                $res_ctx->load_settings_raw( 'f_list_arrow', 15 * $f_list_lh . 'px' );
            } else {
                $res_ctx->load_settings_raw( 'f_list_arrow', $f_list_lh );
            }
        }
        if( $f_list_size != '' && $f_list_lh != '' ) {
            if( is_numeric( $f_list_lh ) ) {
                $res_ctx->load_settings_raw( 'f_list_arrow', $f_list_size * $f_list_lh . 'px' );
            } else {
                $res_ctx->load_settings_raw( 'f_list_arrow', $f_list_lh );
            }
        }
        $res_ctx->load_font_settings( 'f_bq' );

        $res_ctx->load_font_settings( 'f_attr_title' );
        $res_ctx->load_font_settings( 'f_attr_label' );
        $res_ctx->load_font_settings( 'f_value' );

        $res_ctx->load_font_settings( 'f_rev_title' );
        $res_ctx->load_font_settings( 'f_auth' );
        $res_ctx->load_font_settings( 'f_date' );
        $res_ctx->load_font_settings( 'f_txt' );
        $res_ctx->load_font_settings( 'f_form_t' );
        $res_ctx->load_font_settings( 'f_rev_label' );
        $res_ctx->load_font_settings( 'f_input' );
        $res_ctx->load_font_settings( 'f_btn' );

    }
    
    function __construct() {
        parent::disable_loop_block_features();
    }

    function render($atts, $content = null) {

        global $td_woo_state_single_product_page;
	    $product_tabs = $td_woo_state_single_product_page->product_tabs->__invoke($atts);
        
        parent::render($atts);

        $show_tab = $this->get_att('show_tab');


        $buffy = '';

        $buffy .= '<div class="' . $this->get_block_classes()  . '" ' . $this->get_block_html_atts() . '>';

	        //get the block css
	        $buffy .= $this->get_block_css();

	        //get the js for this block
	        $buffy .= $this->get_block_js();

            $buffy .= '<div class="tdw-block-inner td-fix-index">';
                $buffy .= $product_tabs;
            $buffy .= '</div>';

            if (tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) {
                ob_start();
                ?>
                <script>
                    /* global jQuery:{} */
                    jQuery().ready(function () {

                        var tabs = jQuery( '.<?php echo $this->block_uid; ?> ' ).find( '.wc-tabs, ul.tabs' ).first();

                        <?php if( $show_tab == '' ) { ?>
                            tabs.find( 'li:first a' ).click();
                        <?php } else if( $show_tab == 'attr_tab' ) { ?>
                            tabs.find( 'li.additional_information_tab a' ).click();
                        <?php } else if( $show_tab == 'rev_tab' )  { ?>
                            tabs.find( 'li.reviews_tab a' ).click();
                        <?php } ?>

                    });
                </script>
                <?php
                td_js_buffer::add_to_footer( "\n" . td_util::remove_script_tag( ob_get_clean() ) );
            }

        $buffy .= '</div>';

        return $buffy;
    }

    function js_tdc_callback_ajax() {
        $buffy = '';

        $show_tab = $this->get_att('show_tab');

        // add a new composer block - that one has the delete callback
        $buffy .= $this->js_tdc_get_composer_block();

        ob_start();
        if (tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) { ?>

            <script>
                /* global jQuery:{} */
                ( function () {

                    var tabs = jQuery( '.<?php echo $this->block_uid; ?> ' ).find( '.wc-tabs, ul.tabs' ).first();

                    <?php if( $show_tab == '' ) { ?>
                        tabs.find( 'li:first a' ).click();
                    <?php } else if( $show_tab == 'attr_tab' ) { ?>
                        tabs.find( 'li.additional_information_tab a' ).click();
                    <?php } else if( $show_tab == 'rev_tab' )  { ?>
                        tabs.find( 'li.reviews_tab a' ).click();
                    <?php } ?>

                })();
            </script>
        <?php
        }

        return $buffy . td_util::remove_script_tag( ob_get_clean() );
    }
}

