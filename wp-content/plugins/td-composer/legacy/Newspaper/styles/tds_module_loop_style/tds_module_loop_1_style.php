<?php
/**
 * Created by PhpStorm.
 * User: tagdiv
 * Date: 13.07.2017
 * Time: 9:38
 */

class tds_module_loop_1_style extends td_style {

	private $unique_block_class;
    private $unique_style_class;
	private $atts = array();
	private $index_style;

	function __construct( $atts, $unique_block_class = '', $index_style = '') {
		$this->atts = $atts;
		$this->unique_block_class = $unique_block_class;
		$this->index_style = $index_style;
	}

	private function get_css() {

        $compiled_css = '';

        $unique_style_class = $this->unique_style_class;

        $in_composer = td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax();
        $in_element = td_global::get_in_element();
        $unique_block_class_prefix = '';
        if( $in_element || $in_composer ) {
            $unique_block_class_prefix = 'tdc-row .';

            if( $in_element && $in_composer ) {
                $unique_block_class_prefix = 'tdc-row-composer .';
            }
        }
        $unique_block_class = $unique_block_class_prefix . $this->unique_block_class;

        $unique_block_modal_class = $this->unique_block_class . '_m';


		$raw_css =
			"<style>
			
			    /* @style_specific_tds_module_loop_1_style */
                .tds_module_loop_1_style .td-post-author-name,
                .tds_module_loop_1_style .td-post-date,
                .tds_module_loop_1_style .td-module-comments {
                  vertical-align: text-top;
                }
                .tds_module_loop_1_style .entry-review-stars {
                  margin-left: 6px;
                  vertical-align: text-bottom;
                }
                .tds_module_loop_1_style .td-author-photo {
                  display: inline-block;
                  vertical-align: middle;
                }
                .tds_module_loop_1_style .td-author-photo img {
                    width: 20px;
                    height: 20px;
                    margin-right: 6px;
                    border-radius: 50%;
                    vertical-align: middle;
                }
                .tds_module_loop_1_style .td-module-title {
                  font-family: 'Roboto', sans-serif;
                  font-weight: 400;
                  font-size: 21px;
                  line-height: 25px;
                  margin: 0 0 6px 0;
                }
                @media (min-width: 768px) and (max-width: 1018px) {
                  .tds_module_loop_1_style .td-module-title {
                    font-size: 17px;
                    line-height: 22px;
                  }
                }
                .tds_module_loop_1_style .td-read-more {
                    margin: 20px 0 0;
                }
			    

				/* @container_width */
				.$unique_block_class {
					width: @container_width; float: left;
				}
				.$unique_block_class:after {
				    content: '';
				    display: table;
				    clear: both;    
                }
                
                
				/* @modules_on_row */
				.$unique_block_class .td_module_wrap {
					width: @modules_on_row;
				}
				/* @clearfix_desktop */
				.$unique_block_class .td_module_wrap:nth-child(@clearfix_desktop) {
					clear: both;
				}
				/* @clearfix */
				.$unique_block_class .td_module_wrap {
					clear: none !important;
				}
				.$unique_block_class .td_module_wrap:nth-child(@clearfix) {
					clear: both !important;
				}
				/* @padding_desktop */
				.$unique_block_class .td_module_wrap:nth-last-child(@padding_desktop) {
					margin-bottom: 0;
					padding-bottom: 0;
				}
				.$unique_block_class .td_module_wrap:nth-last-child(@padding_desktop) .td-module-container:before {
					display: none;
				}
				/* @padding */
				.$unique_block_class .td_module_wrap {
					padding-bottom: @all_modules_space !important;
					margin-bottom: @all_modules_space !important;
				}
				.$unique_block_class .td_module_wrap:nth-last-child(@padding) {
					margin-bottom: 0 !important;
					padding-bottom: 0 !important;
				}
				.$unique_block_class .td_module_wrap .td-module-container:before {
					display: block !important;
				}
				.$unique_block_class .td_module_wrap:nth-last-child(@padding) .td-module-container:before {
					display: none !important;
				}
				/* @modules_gap */
				.$unique_block_class .td_module_wrap {
					padding-left: @modules_gap;
					padding-right: @modules_gap;
				}
				.$unique_block_class .td_block_inner {
					margin-left: -@modules_gap;
					margin-right: -@modules_gap;
				}
				/* @m_padding */
				.$unique_block_class .td-module-container {
					padding: @m_padding;
				}
				/* @all_modules_space */
				.$unique_block_class .td_module_wrap {
					padding-bottom: @all_modules_space;
					margin-bottom: @all_modules_space;
				}
				.$unique_block_class .td-module-container:before {
					bottom: -@all_modules_space;
				}
				/* @modules_border_size */
				.$unique_block_class .td-module-container {
				    border-width: @modules_border_size;
				    border-style: solid;
				    border-color: #000;
				}
				/* @modules_border_style */
				.$unique_block_class .td-module-container {
				    border-style: @modules_border_style;
				}
				/* @m_radius */
				.$unique_block_class .td-module-container {
					border-radius: @m_radius;
				}
				/* @modules_divider */
				.$unique_block_class .td-module-container:before {
					border-width: 0 0 1px 0;
					border-style: @modules_divider;
					border-color: #eaeaea;
				}
				
				/* @m_bg */
				.$unique_block_class .td-module-container {
					background-color: @m_bg;
				}
				/* @shadow */
				.$unique_block_class .td-module-container {
				    box-shadow: @shadow;
				}
				/* @modules_border_color */
				.$unique_block_class .td-module-container {
				    border-color: @modules_border_color;
				}
				/* @modules_divider_color */
				.$unique_block_class .td-module-container:before {
					border-color: @modules_divider_color;
				}
				
				
				/* @image_height */
				.$unique_block_class .td-image-wrap {
					padding-bottom: @image_height;
				}
				/* @image_width */
				.$unique_block_class .td-image-container {
				 	flex: 0 0 @image_width;
				 	width: @image_width;
			    }
				.ie10 .$unique_block_class .td-image-container,
				.ie11 .$unique_block_class .td-image-container {
				 	flex: 0 0 auto;
			    }
				/* @no_float */
				.$unique_block_class .td-module-container {
					flex-direction: column;
				}
                .$unique_block_class .td-image-container {
                	display: block; order: 0;
                }
                .ie10 .$unique_block_class .td-module-meta-info,
				.ie11 .$unique_block_class .td-module-meta-info {
				 	flex: auto;
			    }
				/* @float_left */
				.$unique_block_class .td-module-container {
					flex-direction: row;
				}
                .$unique_block_class .td-image-container {
                	display: block; order: 0;
                }
                .ie10 .$unique_block_class .td-module-meta-info,
				.ie11 .$unique_block_class .td-module-meta-info {
				 	flex: 1;
			    }
				/* @float_right */
				.$unique_block_class .td-module-container {
					flex-direction: row;
				}
                .$unique_block_class .td-image-container {
                	display: block; order: 1;
                }
                .$unique_block_class .td-module-meta-info {
                	flex: 1;
                }
                /* @hide_desktop */
                .$unique_block_class .td-image-container {
                	display: none;
                }
                .$unique_block_class .entry-thumb {
                	background-image: none !important;
                }
				/* @hide */
				.$unique_block_class .td-image-container {
					display: none;
				}
				/* @image_radius */
				.$unique_block_class .entry-thumb,
				.$unique_block_class .entry-thumb:before,
				.$unique_block_class .entry-thumb:after {
					border-radius: @image_radius;
				}
				
				/* @mix_type */
                html:not([class*='ie']) .$unique_block_class .entry-thumb:before {
                    content: '';
                    width: 100%;
                    height: 100%;
                    position: absolute;
                    top: 0;
                    left: 0;
                    opacity: 1;
                    transition: opacity 1s ease;
                    -webkit-transition: opacity 1s ease;
                    mix-blend-mode: @mix_type;
                }
                /* @color */
                html:not([class*='ie']) .$unique_block_class .entry-thumb:before {
                    background: @color;
                }
                /* @mix_gradient */
                html:not([class*='ie']) .$unique_block_class .entry-thumb:before {
                    @mix_gradient;
                }
                /* @mix_type_h */
                @media (min-width: 1141px) {
                    html:not([class*='ie']) .$unique_block_class .entry-thumb:after {
                        content: '';
                        width: 100%;
                        height: 100%;
                        position: absolute;
                        top: 0;
                        left: 0;
                        opacity: 0;
                        transition: opacity 1s ease;
                        -webkit-transition: opacity 1s ease;
                        mix-blend-mode: @mix_type_h;
                    }
                    html:not([class*='ie']) .$unique_block_class .td-module-container:hover .entry-thumb:after {
                        opacity: 1;
                    }
                }
                /* @color_h */
                html:not([class*='ie']) .$unique_block_class .entry-thumb:after {
                    background: @color_h;
                }
                /* @mix_gradient_h */
                html:not([class*='ie']) .$unique_block_class .entry-thumb:after {
                    @mix_gradient_h;
                }
                /* @mix_type_off */
                html:not([class*='ie']) .$unique_block_class .td-module-container:hover .entry-thumb:before {
                    opacity: 0;
                }
                /* @effect_on */
                html:not([class*='ie']) .$unique_block_class .entry-thumb {
                    filter: @fe_brightness @fe_contrast @fe_saturate;
                    transition: all 1s ease;
                    -webkit-transition: all 1s ease;
                }
                /* @effect_on_h */
                @media (min-width: 1141px) {
                    html:not([class*='ie']) .$unique_block_class .td-module-container:hover .entry-thumb {
                        filter: @fe_brightness_h @fe_contrast_h @fe_saturate_h;
                    }
                }
                
                
				/* @video_icon */
				.$unique_block_class .td-video-play-ico {
					width: @video_icon;
					height: @video_icon;
					font-size: @video_icon;
				}
				/* @show_vid_t */
				.$unique_block_class .td-post-vid-time {
					display: @show_vid_t;
				}
				/* @vid_t_margin */
				.$unique_block_class .td-post-vid-time {
					margin: @vid_t_margin;
				}
				/* @vid_t_padding */
				.$unique_block_class .td-post-vid-time {
					padding: @vid_t_padding;
				}
				
				/* @video_rec_color */
				#td-video-modal.$unique_block_modal_class .td-vm-rec-title {
				    color: @video_rec_color;
				}
				/* @video_title_color */
				#td-video-modal.$unique_block_modal_class .td-vm-title a {
				    color: @video_title_color;
				}
				/* @video_title_color_h */
				#td-video-modal.$unique_block_modal_class .td-vm-title a:hover {
				    color: @video_title_color_h;
				}
				/* @video_bg */
				#td-video-modal.$unique_block_modal_class .td-vm-content-wrap {
				    background-color: @video_bg;
				}
				/* @video_overlay */
				#td-video-modal.$unique_block_modal_class .td-vm-overlay {
				    background-color: @video_overlay;
				}
				/* @vid_t_color */
				.$unique_block_class .td-post-vid-time {
					color: @vid_t_color;
				}
				/* @vid_t_bg_color */
				.$unique_block_class .td-post-vid-time {
					background-color: @vid_t_bg_color;
				}
				
				/* @f_vid_title */
				#td-video-modal.$unique_block_modal_class .td-vm-title {
					@f_vid_title
				}
				/* @f_vid_time */
				.$unique_block_class .td-post-vid-time {
					@f_vid_time
				}
                
                
                /* @excl_show */
                .$unique_block_class .td-module-exclusive .td-module-title a:before {
                    display: @excl_show;
                }
                /* @excl_txt */
                .$unique_block_class .td-module-exclusive .td-module-title a:before {
                    content: '@excl_txt';
                }
                /* @excl_margin */
                .$unique_block_class .td-module-exclusive .td-module-title a:before {
                    margin: @excl_margin;
                }
                /* @excl_padd */
                .$unique_block_class .td-module-exclusive .td-module-title a:before {
                    padding: @excl_padd;
                }
                /* @all_excl_border */
                .$unique_block_class .td-module-exclusive .td-module-title a:before {
                    border: @all_excl_border @all_excl_border_style @all_excl_border_color;
                }
                /* @excl_radius */
                .$unique_block_class .td-module-exclusive .td-module-title a:before {
                    border-radius: @excl_radius;
                }
                
                /* @excl_color */
                .$unique_block_class .td-module-exclusive .td-module-title a:before {
                    color: @excl_color;
                }
                /* @excl_color_h */
                .$unique_block_class .td-module-exclusive:hover .td-module-title a:before {
                    color: @excl_color_h;
                }
                /* @excl_bg */
                .$unique_block_class .td-module-exclusive .td-module-title a:before {
                    background-color: @excl_bg;
                }
                /* @excl_bg_h */
                .$unique_block_class .td-module-exclusive:hover .td-module-title a:before {
                    background-color: @excl_bg_h;
                }
                /* @excl_border_color_h */
                .$unique_block_class .td-module-exclusive:hover .td-module-title a:before {
                    border-color: @excl_border_color_h;
                }
                
                /* @f_excl */
                .$unique_block_class .td-module-exclusive .td-module-title a:before {
                    @f_excl
                }
                
                /* @meta_info_align */
				.$unique_block_class .td-module-meta-info {
				    display: flex;
				    flex-direction: column;
					justify-content: @meta_info_align;
				}
				.$unique_block_class .td-category-pos-above .td-post-category {
				    align-self: flex-start;
				}
				/* @align_category_top */
				.$unique_block_class .td-category-pos-image .td-post-category:not(.td-post-extra-category) {
					top: 0;
					bottom: auto;
				}
				.$unique_block_class .td-post-vid-time {
					top: 0;
					bottom: auto;
				}
				/* @align_category_bottom */
				.$unique_block_class .td-image-container {
				    order: 0;
				}
				.$unique_block_class .td-category-pos-image .td-post-category:not(.td-post-extra-category) {
					top: auto;
				 	bottom: 0;
			    }
				.$unique_block_class .td-post-vid-time {
					top: auto;
					bottom: 0;
				}
				/* @meta_info_align_top */
				.$unique_block_class .td-image-container {
					order: 1;
				}
				.$unique_block_class .td-module-meta-info {
				    flex: 1;
				}
				/* @meta_horiz_align_center */
				.$unique_block_class .td-module-meta-info {
					text-align: center;
				}
				.$unique_block_class .td-image-container {
					margin-left: auto;
                    margin-right: auto;
				}
				.$unique_block_class .td-category-pos-image .td-post-category:not(.td-post-extra-category) {
					left: 50%;
					transform: translateX(-50%);
					-webkit-transform: translateX(-50%);
				}
				.$unique_block_class.td-h-effect-up-shadow .td_module_wrap:hover .td-category-pos-image .td-post-category:not(.td-post-extra-category) {
				    transform: translate(-50%, -2px);
					-webkit-transform: translate(-50%, -2px);
				}
				/* @meta_horiz_align_right */
				.$unique_block_class .td-module-meta-info {
					text-align: right;
				}
				/* @meta_width */
				.$unique_block_class .td-module-meta-info {
					max-width: @meta_width;
				}
				/* @meta_margin */
				.$unique_block_class .td-module-meta-info {
					margin: @meta_margin;
				}
				/* @meta_padding */
				.$unique_block_class .td-module-meta-info {
					padding: @meta_padding;
				}
                /* @meta_space */
                .$unique_block_class .td-editor-date {
                    margin: @meta_space;
                }
				/* @meta_info_border_size */
				.$unique_block_class .td-module-meta-info {
					border-width: @meta_info_border_size;
				}
				/* @meta_info_border_style */
				.$unique_block_class .td-module-meta-info {
					border-style: @meta_info_border_style;
				}
				/* @meta_info_border_radius */
				.$unique_block_class .td-module-meta-info {
					border-radius: @meta_info_border_radius;
				}
				
				/* @meta_bg */
				.$unique_block_class .td-module-meta-info {
					background-color: @meta_bg;
				}
				/* @shadow_m */
				.$unique_block_class .td-module-meta-info {
				    box-shadow: @shadow_m;
				}
				/* @meta_info_border_color */
				.$unique_block_class .td-module-meta-info {
					border-color: @meta_info_border_color;
				}
				
				/* @f_meta */
				.$unique_block_class .td-author-date,
				.$unique_block_class .td-author-photo,
				.$unique_block_class .td-post-author-name a,
				.$unique_block_class .td-author-date .entry-date,
				.$unique_block_class .td-module-comments a {
					@f_meta
				}
				
				
				/* @art_title */
				.$unique_block_class .entry-title {
					margin: @art_title;
				}
                /* @all_underline_height */
                .$unique_block_class .td-module-container:hover .td-module-title a {
                    box-shadow: inset 0 -@all_underline_height 0 0 @all_underline_color;
                }
                
				/* @title_txt */
				.$unique_block_class .td-module-title a {
					color: @title_txt;
				}
				/* @title_txt_hover */
				.$unique_block_class .td_module_wrap:hover .td-module-title a {
					color: @title_txt_hover;
				}
				/* @all_underline_color */
                @media (min-width: 768px) {
                    .$unique_block_class .td-module-title a {
                        transition: all 0.2s ease;
                        -webkit-transition: all 0.2s ease;
                    }
                }
                .$unique_block_class .td-module-title a {
                    box-shadow: inset 0 0 0 0 @all_underline_color;
                }
                
				/* @f_title */
				.$unique_block_class .entry-title {
					@f_title
				}
				
				
				/* @modules_category_margin */
				.$unique_block_class .td-post-category {
					margin: @modules_category_margin;
				}
				/* @modules_category_padding */
				.$unique_block_class .td-post-category {
					padding: @modules_category_padding;
				}
				/* @modules_cat_border */
                .$unique_block_class .td-post-category {
                    border-color: #aaa;
                    border-width: @modules_cat_border;
                    border-style: solid;
                }
				/* @modules_category_radius */
				.$unique_block_class .td-post-category {
					border-radius: @modules_category_radius;
				}
				/* @show_cat */
				.$unique_block_class .td-post-category:not(.td-post-extra-category) {
					display: @show_cat;
				}
				
				/* @cat_bg */
				.$unique_block_class .td-post-category {
					background-color: @cat_bg;
				}
				/* @cat_bg_hover */
				.$unique_block_class .td-post-category:hover {
					background-color: @cat_bg_hover;
				}
				/* @cat_txt */
				.$unique_block_class .td-post-category {
					color: @cat_txt;
				}
				/* @cat_txt_hover */
				.$unique_block_class .td-post-category:hover {
					color: @cat_txt_hover;
				}
                /* @cat_border */
                .$unique_block_class .td-post-category {
                    border-color: @cat_border;
                }
                /* @cat_border_hover */
                .$unique_block_class .td-post-category:hover {
                    border-color: @cat_border_hover;
                }
                
				/* @f_cat */
				.$unique_block_class .td-post-category {
					@f_cat
				}
				
				
				/* @show_author */
				.$unique_block_class .td-post-author-name {
					display: @show_author;
				}
				/* @author_photo_size */
				.$unique_block_class .td-author-photo .avatar {
				    width: @author_photo_size;
				    height: @author_photo_size;
				}
				/* @author_photo_space */
				.$unique_block_class .td-author-photo .avatar {
				    margin-right: @author_photo_space;
				}
				/* @author_photo_radius */
				.$unique_block_class .td-author-photo .avatar {
				    border-radius: @author_photo_radius;
				}
				
				/* @author_txt */
				.$unique_block_class .td-post-author-name a {
					color: @author_txt;
				}
				/* @author_txt_hover */
				.$unique_block_class .td-post-author-name:hover a {
					color: @author_txt_hover;
				}
				
				
				/* @show_date */
				.$unique_block_class .td-post-date,
				.$unique_block_class .td-post-author-name span {
					display: @show_date;
				}
				
				/* @date_txt */
				.$unique_block_class .td-post-date,
				.$unique_block_class .td-post-author-name span {
					color: @date_txt;
				}
				
				
				/* @show_com */
				.$unique_block_class .td-module-comments {
					display: @show_com;
				}
				
				/* @com_bg */
				.$unique_block_class .td-module-comments a {
					background-color: @com_bg;
				}
				.$unique_block_class .td-module-comments a:after {
					border-color: @com_bg transparent transparent transparent;
				}
				/* @com_txt */
				.$unique_block_class .td-module-comments a {
					color: @com_txt;
				}
				
				
				/* @show_review */
				.$unique_block_class .entry-review-stars {
					display: @show_review;
				}
				/* @review_space */
				.$unique_block_class .entry-review-stars {
					margin: @review_space;
				}
				/* @review_size */
				.$unique_block_class .td-icon-star,
                .$unique_block_class .td-icon-star-empty,
                .$unique_block_class .td-icon-star-half {
					font-size: @review_size;
				}
				/* @review_distance */
				.$unique_block_class .entry-review-stars i {
					margin-right: @review_distance;
				}
				.$unique_block_class .entry-review-stars i:last-child {
				    margin-right: 0;
				}
				
				
				/* @show_excerpt */
				.$unique_block_class .td-excerpt {
					display: @show_excerpt;
				}
				/* @art_excerpt */
				.$unique_block_class .td-excerpt {
					margin: @art_excerpt;
				}
				/* @excerpt_col */
				.$unique_block_class .td-excerpt {
					column-count: @excerpt_col;
				}
				/* @excerpt_gap */
				.$unique_block_class .td-excerpt {
					column-gap: @excerpt_gap;
				}
				/* @excerpt_inline */
                .$unique_block_class .entry-title,
                .$unique_block_class .td-excerpt {
                    display: inline;
                }
                /* @excerpt_cat_fix */
                .$unique_block_class .td-post-category {
                    display: table;
                }
				
				/* @ex_txt */
				.$unique_block_class .td-excerpt {
					color: @ex_txt;
				}
				
				/* @f_ex */
				.$unique_block_class .td-excerpt {
					@f_ex
				}
				
				
				/* @hide_author_date */
				.$unique_block_class .td-author-date {
					display: none;
				}
				/* @show_author_date */
				.$unique_block_class .td-author-date {
					display: inline;
				}
				
				
				/* @show_audio */
				.$unique_block_class .td-audio-player {
					opacity: 1;
					visibility: visible;
					height: auto;
				}
				/* @hide_audio */
				.$unique_block_class .td-audio-player {
					opacity: 0;
					visibility: hidden;
					height: 0;
				}
				/* @art_audio */
				.$unique_block_class .td-audio-player {
					margin: @art_audio;
				}
				/* @art_audio_size */
				.$unique_block_class .td-audio-player {
					font-size: @art_audio_size;
				}
				
				/* @audio_btn_color */
                .$unique_block_class .td-audio-player .mejs-button button:after {
                    color: @audio_btn_color;
                }
                /* @audio_time_color */
                .$unique_block_class .td-audio-player .mejs-time {
                    color: @audio_time_color;
                }
                /* @audio_bar_color */
                .$unique_block_class .td-audio-player .mejs-controls .mejs-time-rail .mejs-time-total,
                .$unique_block_class .td-audio-player .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-total {
                    background: @audio_bar_color;
                }
                /* @audio_bar_curr_color */
                .$unique_block_class .td-audio-player .mejs-controls .mejs-time-rail .mejs-time-current,
                .$unique_block_class .td-audio-player .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current {
                    background: @audio_bar_curr_color;
                }
                
                
				/* @show_btn */
				.$unique_block_class .td-read-more {
					display: @show_btn;
				}
				/* @btn_margin */
				.$unique_block_class .td-read-more {
					margin: @btn_margin;
				}
				/* @btn_padding */
				.$unique_block_class .td-read-more a {
					padding: @btn_padding;
				}
				/* @btn_border_width */
				.$unique_block_class .td-read-more a {
					border-width: @btn_border_width;
					border-style: solid;
					border-color: #000;
				}
				/* @btn_radius */
				.$unique_block_class .td-read-more a {
					border-radius: @btn_radius;
				}
				
				/* @btn_bg */
				.$unique_block_class .td-read-more a {
					background-color: @btn_bg;
				}
				/* @btn_bg_hover */
				.$unique_block_class .td-read-more:hover a {
					background-color: @btn_bg_hover !important;
				}
				/* @btn_txt */
				.$unique_block_class .td-read-more a {
					color: @btn_txt;
				}
				/* @btn_txt_hover */
				.$unique_block_class .td-read-more:hover a {
					color: @btn_txt_hover;
				}
				/* @btn_border */
				.$unique_block_class .td-read-more a {
					border-color: @btn_border;
				}
				/* @btn_border_hover */
				.$unique_block_class .td-read-more:hover a {
					border-color: @btn_border_hover;
				}
				
				/* @f_btn */
				.$unique_block_class .td-read-more a {
					@f_btn
				}

			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->atts);

        $compiled_css .= $td_css_res_compiler->compile_css();
		return $compiled_css;
	}

    /**
     * Callback pe media
     *
     * @param $responsive_context td_res_context
     * @param $atts
     */
    static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'style_specific_tds_module_loop_1_style', 1 );



        /*-- GENERAL -- */
        // *- layout -* //
        // container_width
        $container_width = $res_ctx->get_style_att('container_width', __CLASS__);
        if ( is_numeric( $container_width ) ) {
            $res_ctx->load_settings_raw( 'container_width', $container_width . '%' );
        } else {
            $res_ctx->load_settings_raw( 'container_width', $container_width );
        }

        // modules per row
        $modules_on_row = $res_ctx->get_style_att('modules_on_row', __CLASS__);
        $res_ctx->load_settings_raw( 'modules_on_row', $modules_on_row );
        if ( $modules_on_row == '' ) {
            $modules_on_row = '100%';
        }

        // modules clearfix
        $clearfix = 'clearfix';
        $padding = 'padding';
        if ( $res_ctx->is( 'all' ) ) {
            $clearfix = 'clearfix_desktop';
            $padding = 'padding_desktop';
        }
        switch ($modules_on_row) {
            case '100%':
                $res_ctx->load_settings_raw( $padding,  '1' );
                break;
            case '50%':
                $res_ctx->load_settings_raw( $clearfix,  '2n+1' );
                $res_ctx->load_settings_raw( $padding,  '-n+2' );
                break;
            case '33.33333333%':
                $res_ctx->load_settings_raw( $clearfix,  '3n+1' );
                $res_ctx->load_settings_raw( $padding,  '-n+3' );
                break;
            case '25%':
                $res_ctx->load_settings_raw( $clearfix,  '4n+1' );
                $res_ctx->load_settings_raw( $padding,  '-n+4' );
                break;
            case '20%':
                $res_ctx->load_settings_raw( $clearfix,  '5n+1' );
                $res_ctx->load_settings_raw( $padding,  '-n+5' );
                break;
            case '16.66666667%':
                $res_ctx->load_settings_raw( $clearfix,  '6n+1' );
                $res_ctx->load_settings_raw( $padding,  '-n+6' );
                break;
            case '14.28571428%':
                $res_ctx->load_settings_raw( $clearfix,  '7n+1' );
                $res_ctx->load_settings_raw( $padding,  '-n+7' );
                break;
            case '12.5%':
                $res_ctx->load_settings_raw( $clearfix,  '8n+1' );
                $res_ctx->load_settings_raw( $padding,  '-n+8' );
                break;
            case '11.11111111%':
                $res_ctx->load_settings_raw( $clearfix,  '9n+1' );
                $res_ctx->load_settings_raw( $padding,  '-n+9' );
                break;
            case '10%':
                $res_ctx->load_settings_raw( $clearfix,  '10n+1' );
                $res_ctx->load_settings_raw( $padding,  '-n+10' );
                break;
        }

        // modules gap
        $modules_gap = $res_ctx->get_style_att('modules_gap', __CLASS__);
        $res_ctx->load_settings_raw( 'modules_gap', $modules_gap );
        if ( $modules_gap == '' ) {
            $res_ctx->load_settings_raw( 'modules_gap', '24px');
        } else if ( is_numeric( $modules_gap ) ) {
            $res_ctx->load_settings_raw( 'modules_gap', $modules_gap / 2 .'px' );
        }

        // modules padding
        $m_padding = $res_ctx->get_style_att('m_padding', __CLASS__);
        $res_ctx->load_settings_raw( 'm_padding', $m_padding );
        if ( is_numeric( $m_padding ) ) {
            $res_ctx->load_settings_raw( 'm_padding', $m_padding . 'px' );
        }

        // modules space
        $modules_space = $res_ctx->get_style_att('all_modules_space', __CLASS__);
        $res_ctx->load_settings_raw( 'all_modules_space', $modules_space );
        if ( $modules_space == '' ) {
            $res_ctx->load_settings_raw( 'all_modules_space', '18px');
        } else if ( is_numeric( $modules_space ) ) {
            $res_ctx->load_settings_raw( 'all_modules_space', $modules_space / 2 .'px' );
        }

        // modules border size
        $modules_border_size = $res_ctx->get_style_att('modules_border_size', __CLASS__);
        $res_ctx->load_settings_raw( 'modules_border_size', $modules_border_size );
        if( $modules_border_size != '' && is_numeric( $modules_border_size ) ) {
            $res_ctx->load_settings_raw( 'modules_border_size', $modules_border_size . 'px' );
        }
        // modules border style
        $res_ctx->load_settings_raw( 'modules_border_style', $res_ctx->get_style_att('modules_border_style', __CLASS__) );
        // modules border radius
        $m_radius = $res_ctx->get_style_att('m_radius', __CLASS__);
        $res_ctx->load_settings_raw( 'm_radius', $m_radius );
        if ( is_numeric( $m_radius ) ) {
            $res_ctx->load_settings_raw( 'm_radius', $m_radius . 'px' );
        }

        // modules divider
        $res_ctx->load_settings_raw( 'modules_divider', $res_ctx->get_style_att('modules_divider', __CLASS__) );


        // *- colors -* //
        $res_ctx->load_settings_raw( 'm_bg', $res_ctx->get_style_att('m_bg', __CLASS__) );
        $res_ctx->load_shadow_settings( 0, 0, 0, 0, 'rgba(0, 0, 0, 0.08)', 'shadow', __CLASS__ );

        $res_ctx->load_settings_raw( 'modules_border_color', $res_ctx->get_style_att('modules_border_color', __CLASS__) );
        $res_ctx->load_settings_raw( 'modules_divider_color', $res_ctx->get_style_att('modules_divider_color', __CLASS__) );



        /*-- ARTICLE IMAGE -- */
        // *- layout -* //
        // image_height
        $image_height = $res_ctx->get_style_att('image_height', __CLASS__);
        if ( is_numeric( $image_height ) ) {
            $res_ctx->load_settings_raw( 'image_height', $image_height . '%' );
        } else {
            $res_ctx->load_settings_raw( 'image_height', $image_height );
        }

        // image_width
        $image_width = $res_ctx->get_style_att('image_width', __CLASS__);
        if ( is_numeric( $image_width ) ) {
            $res_ctx->load_settings_raw( 'image_width', $image_width . '%' );
        } else {
            $res_ctx->load_settings_raw( 'image_width', $image_width );
        }

        // image_floated
        $image_floated = $res_ctx->get_style_att('image_floated', __CLASS__);
        if ( $image_floated == '' ||  $image_floated == 'no_float' ) {
            $image_floated = 'no_float';
            $res_ctx->load_settings_raw( 'no_float',  1 );
        }
        if ( $image_floated == 'float_left' ) {
            $res_ctx->load_settings_raw( 'float_left',  1 );
        }
        if ( $image_floated == 'float_right' ) {
            $res_ctx->load_settings_raw( 'float_right',  1 );
        }
        if ( $image_floated == 'hidden' ) {
            if ( $res_ctx->is( 'all' ) && !$res_ctx->is_responsive_att( 'image_floated' ) ) {
                $res_ctx->load_settings_raw( 'hide_desktop',  1 );
            } else {
                $res_ctx->load_settings_raw( 'hide',  1 );
            }
        }

        // image radius
        $image_radius = $res_ctx->get_style_att('image_radius', __CLASS__);
        $res_ctx->load_settings_raw( 'image_radius', $image_radius );
        if ( is_numeric( $image_radius ) ) {
            $res_ctx->load_settings_raw( 'image_radius', $image_radius . 'px' );
        }

        // image mix blend
        $mix_type = $res_ctx->get_style_att('mix_type', __CLASS__);
        if ( $mix_type != '' ) {
            $res_ctx->load_settings_raw('mix_type', $res_ctx->get_style_att('mix_type', __CLASS__));
        }
        $res_ctx->load_color_settings( 'mix_color', 'color', 'mix_gradient', '', '', __CLASS__ );

        $mix_type_h = $res_ctx->get_style_att('mix_type_h', __CLASS__);
        if ( $mix_type_h != '' ) {
            $res_ctx->load_settings_raw('mix_type_h', $res_ctx->get_style_att('mix_type_h', __CLASS__));
        } else {
            $res_ctx->load_settings_raw('mix_type_off', 1);
        }
        $res_ctx->load_color_settings( 'mix_color_h', 'color_h', 'mix_gradient_h', '', '', __CLASS__ );

        // image effects
        $res_ctx->load_settings_raw('fe_brightness', 'brightness(1)');
        $res_ctx->load_settings_raw('fe_contrast', 'contrast(1)');
        $res_ctx->load_settings_raw('fe_saturate', 'saturate(1)');

        $fe_brightness = $res_ctx->get_style_att('fe_brightness', __CLASS__);
        if ($fe_brightness != '1') {
            $res_ctx->load_settings_raw('fe_brightness', 'brightness(' . $fe_brightness . ')');
            $res_ctx->load_settings_raw('effect_on', 1);
        }
        $fe_contrast = $res_ctx->get_style_att('fe_contrast', __CLASS__);
        if ($fe_contrast != '1') {
            $res_ctx->load_settings_raw('fe_contrast', 'contrast(' . $fe_contrast . ')');
            $res_ctx->load_settings_raw('effect_on', 1);
        }
        $fe_saturate = $res_ctx->get_style_att('fe_saturate', __CLASS__);
        if ($fe_saturate != '1') {
            $res_ctx->load_settings_raw('fe_saturate', 'saturate(' . $fe_saturate . ')');
            $res_ctx->load_settings_raw('effect_on', 1);
        }

        // image effects hover
        $res_ctx->load_settings_raw('fe_brightness_h', 'brightness(1)');
        $res_ctx->load_settings_raw('fe_contrast_h', 'contrast(1)');
        $res_ctx->load_settings_raw('fe_saturate_h', 'saturate(1)');

        $fe_brightness_h = $res_ctx->get_style_att('fe_brightness_h', __CLASS__);
        $fe_contrast_h = $res_ctx->get_style_att('fe_contrast_h', __CLASS__);
        $fe_saturate_h = $res_ctx->get_style_att('fe_saturate_h', __CLASS__);

        if ($fe_brightness_h != '1') {
            $res_ctx->load_settings_raw('fe_brightness_h', 'brightness(' . $fe_brightness_h . ')');
            $res_ctx->load_settings_raw('effect_on_h', 1);
        }
        if ($fe_contrast_h != '1') {
            $res_ctx->load_settings_raw('fe_contrast_h', 'contrast(' . $fe_contrast_h . ')');
            $res_ctx->load_settings_raw('effect_on_h', 1);
        }
        if ($fe_saturate_h != '1') {
            $res_ctx->load_settings_raw('fe_saturate_h', 'saturate(' . $fe_saturate_h . ')');
            $res_ctx->load_settings_raw('effect_on_h', 1);
        }
        // make hover to work
        if ($fe_brightness_h != '1' || $fe_contrast_h != '1' || $fe_saturate_h != '1') {
            $res_ctx->load_settings_raw('effect_on', 1);
        }
        if ($fe_brightness != '1' || $fe_contrast != '1' || $fe_saturate != '1') {
            $res_ctx->load_settings_raw('effect_on_h', 1);
        }



        /*-- ARTICLE VIDEO -- */
        // *- layout -* //
        // video icon size
        $video_icon = $res_ctx->get_style_att('video_icon', __CLASS__);
        if ( $video_icon != '' && is_numeric( $video_icon ) ) {
            $res_ctx->load_settings_raw( 'video_icon', $video_icon . 'px' );
        }

        // show video duration
        $res_ctx->load_settings_raw('show_vid_t', $res_ctx->get_style_att('show_vid_t', __CLASS__));

        // video duration margin
        $vid_t_margin = $res_ctx->get_style_att('vid_t_margin', __CLASS__);
        $res_ctx->load_settings_raw( 'vid_t_margin', $vid_t_margin );
        if( $vid_t_margin != '' && is_numeric( $vid_t_margin ) ) {
            $res_ctx->load_settings_raw( 'vid_t_margin', $vid_t_margin . 'px' );
        }

        // video duration padding
        $vid_t_padding = $res_ctx->get_style_att('vid_t_padding', __CLASS__);
        $res_ctx->load_settings_raw( 'vid_t_padding', $vid_t_padding );
        if( $vid_t_padding != '' && is_numeric( $vid_t_padding ) ) {
            $res_ctx->load_settings_raw( 'vid_t_padding', $vid_t_padding . 'px' );
        }


        // *- colors -* //
        // video pop-up
        $res_ctx->load_settings_raw( 'video_rec_color', $res_ctx->get_style_att('video_rec_color', __CLASS__) );
        $res_ctx->load_settings_raw( 'video_title_color', $res_ctx->get_style_att('video_title_color', __CLASS__) );
        $res_ctx->load_settings_raw( 'video_title_color_h', $res_ctx->get_style_att('video_title_color_h', __CLASS__) );
        $res_ctx->load_settings_raw( 'video_bg', $res_ctx->get_style_att('video_bg', __CLASS__) );
        $res_ctx->load_settings_raw( 'video_overlay', $res_ctx->get_style_att('video_overlay', __CLASS__) );

        // video duration
        $res_ctx->load_settings_raw( 'vid_t_color', $res_ctx->get_style_att('vid_t_color', __CLASS__) );
        $res_ctx->load_settings_raw( 'vid_t_bg_color', $res_ctx->get_style_att('vid_t_bg_color', __CLASS__) );


        // *- fonts -* //
        $res_ctx->load_font_settings( 'f_vid_title', __CLASS__ );
        $res_ctx->load_font_settings( 'f_vid_time', __CLASS__ );



        /*-- EXCLUSIVE LABEL -- */
        if( !empty( has_filter('td_composer_map_exclusive_label_array', 'td_subscription::add_exclusive_label_settings') ) ) {
            // *- layout -* //
            // show exclusive label
            $excl_show = $res_ctx->get_style_att('excl_show', __CLASS__);
            $res_ctx->load_settings_raw( 'excl_show', $excl_show );
            if( $excl_show == '' ) {
                $res_ctx->load_settings_raw( 'excl_show', 'inline-block' );
            }

            // exclusive label text
            $res_ctx->load_settings_raw( 'excl_txt', $res_ctx->get_style_att('excl_txt', __CLASS__) );

            // exclusive label margin
            $excl_margin = $res_ctx->get_style_att('excl_margin', __CLASS__);
            $res_ctx->load_settings_raw( 'excl_margin', $excl_margin );
            if( $excl_margin != '' && is_numeric( $excl_margin ) ) {
                $res_ctx->load_settings_raw( 'excl_margin', $excl_margin . 'px' );
            }

            // exclusive label padding
            $excl_padd = $res_ctx->get_style_att('excl_padd', __CLASS__);
            $res_ctx->load_settings_raw( 'excl_padd', $excl_padd );
            if( $excl_padd != '' && is_numeric( $excl_padd ) ) {
                $res_ctx->load_settings_raw( 'excl_padd', $excl_padd . 'px' );
            }

            // exclusive label border size
            $excl_border = $res_ctx->get_style_att('all_excl_border', __CLASS__);
            $res_ctx->load_settings_raw( 'all_excl_border', $excl_border );
            if( $excl_border != '' && is_numeric( $excl_border ) ) {
                $res_ctx->load_settings_raw( 'all_excl_border', $excl_border . 'px' );
            }
            // exclusive label border style
            $res_ctx->load_settings_raw( 'all_excl_border_style', $res_ctx->get_style_att('all_excl_border_style', __CLASS__) );
            // exclusive label border radius
            $excl_radius = $res_ctx->get_style_att('excl_radius', __CLASS__);
            $res_ctx->load_settings_raw( 'excl_radius', $excl_radius );
            if( $excl_radius != '' && is_numeric( $excl_radius ) ) {
                $res_ctx->load_settings_raw( 'excl_radius', $excl_radius . 'px' );
            }


            // *- colors -* //
            $res_ctx->load_settings_raw( 'excl_color', $res_ctx->get_style_att('excl_color', __CLASS__) );
            $res_ctx->load_settings_raw( 'excl_color_h', $res_ctx->get_style_att('excl_color_h', __CLASS__) );
            $res_ctx->load_settings_raw( 'excl_bg', $res_ctx->get_style_att('excl_bg', __CLASS__) );
            $res_ctx->load_settings_raw( 'excl_bg_h', $res_ctx->get_style_att('excl_bg_h', __CLASS__) );
            $excl_border_color = $res_ctx->get_style_att('all_excl_border_color', __CLASS__);
            $res_ctx->load_settings_raw( 'all_excl_border_color', $excl_border_color );
            if( $excl_border_color == '' ) {
                $res_ctx->load_settings_raw( 'all_excl_border_color', '#000' );
            }
            $res_ctx->load_settings_raw( 'excl_border_color_h', $res_ctx->get_style_att('excl_border_color_h', __CLASS__) );


            // *- fonts -* //
            $res_ctx->load_font_settings( 'f_excl', __CLASS__ );
        }



        /*-- META INFO GENERAL -- */
        // *- layout -* //
        // meta info align
        $meta_info_align = $res_ctx->get_style_att('meta_info_align', __CLASS__);
        $res_ctx->load_settings_raw( 'meta_info_align', $meta_info_align );
        // meta info align to fix top when no float is selected
        if ( $meta_info_align == 'initial' && $image_floated == 'no_float' ) {
            $res_ctx->load_settings_raw( 'meta_info_align_top',  1 );
        }
        // meta info align top/bottom - align category
        if ( $meta_info_align == 'initial' ) {
            $res_ctx->load_settings_raw( 'align_category_top',  1 );
        }
        if ( $meta_info_align == 'flex-end'  && $image_floated == 'no_float' ) {
            $res_ctx->load_settings_raw( 'align_category_bottom',  1 );
        }

        // meta info horizontal align
        $content_align = $res_ctx->get_style_att('meta_info_horiz', __CLASS__);
        if ( $content_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'meta_horiz_align_center', 1 );
        } else if ( $content_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'meta_horiz_align_right', 1 );
        } else if ( $content_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'meta_horiz_align_left', 1 );
        }

        // meta info width
        $meta_info_width = $res_ctx->get_style_att('meta_width', __CLASS__);
        $res_ctx->load_settings_raw( 'meta_width', $meta_info_width );
        if( $meta_info_width != '' && is_numeric( $meta_info_width ) ) {
            $res_ctx->load_settings_raw( 'meta_width', $meta_info_width . 'px' );
        }

        // meta info margin
        $meta_margin = $res_ctx->get_style_att('meta_margin', __CLASS__);
        $res_ctx->load_settings_raw( 'meta_margin', $meta_margin );
        if ( is_numeric( $meta_margin ) ) {
            $res_ctx->load_settings_raw( 'meta_margin', $meta_margin . 'px' );
        }

        // meta info padding
        $meta_padding = $res_ctx->get_style_att('meta_padding', __CLASS__);
        $res_ctx->load_settings_raw( 'meta_padding', $meta_padding );
        if ( is_numeric( $meta_padding ) ) {
            $res_ctx->load_settings_raw( 'meta_padding', $meta_padding . 'px' );
        }

        // meta container space
        $meta_space = $res_ctx->get_style_att('meta_space', __CLASS__);
        $res_ctx->load_settings_raw( 'meta_space', $meta_space );
        if( $meta_space != '' && is_numeric( $meta_space ) ) {
            $res_ctx->load_settings_raw( 'meta_space', $meta_space . 'px' );
        }

        // meta_info_border_size
        $meta_info_border_size = $res_ctx->get_style_att('meta_info_border_size', __CLASS__);
        $res_ctx->load_settings_raw( 'meta_info_border_size', $meta_info_border_size );
        if ( is_numeric( $meta_info_border_size ) ) {
            $res_ctx->load_settings_raw( 'meta_info_border_size', $meta_info_border_size . 'px' );
        }
        // meta info border style
        $res_ctx->load_settings_raw( 'meta_info_border_style', $res_ctx->get_style_att('meta_info_border_style', __CLASS__) );
        // meta info border radius
        $meta_info_border_radius = $res_ctx->get_style_att('meta_info_border_radius', __CLASS__);
        $res_ctx->load_settings_raw( 'meta_info_border_radius', $meta_info_border_radius );
        if ( is_numeric( $meta_info_border_radius ) ) {
            $res_ctx->load_settings_raw( 'meta_info_border_radius', $meta_info_border_radius . 'px' );
        }


        // *- colors -* //
        $res_ctx->load_settings_raw( 'meta_bg', $res_ctx->get_style_att('meta_bg', __CLASS__) );
        $res_ctx->load_shadow_settings( 0, 0, 0, 0, 'rgba(0, 0, 0, 0.08)', 'shadow_m', __CLASS__ );

        $res_ctx->load_settings_raw( 'meta_info_border_color', $res_ctx->get_style_att('meta_info_border_color', __CLASS__) );


        // *- fonts -* //
        $res_ctx->load_font_settings( 'f_meta', __CLASS__ );



        /*-- ARTICLE TITLE -- */
        // *- layout -* //
        // article title space
        $art_title = $res_ctx->get_style_att('art_title', __CLASS__);
        $res_ctx->load_settings_raw( 'art_title', $art_title );
        if ( is_numeric( $art_title ) ) {
            $res_ctx->load_settings_raw( 'art_title', $art_title . 'px' );
        }

        // underline height
        $underline_height = $res_ctx->get_style_att('all_underline_height', __CLASS__);
        $res_ctx->load_settings_raw( 'all_underline_height', $underline_height );
        if( $underline_height != '' && is_numeric( $underline_height ) ) {
            $res_ctx->load_settings_raw( 'all_underline_height', $underline_height . 'px' );
        } else {
            $res_ctx->load_settings_raw( 'all_underline_height', '0' );
        }


        // *- colors -* //
        $res_ctx->load_settings_raw( 'title_txt', $res_ctx->get_style_att('title_txt', __CLASS__) );
        $res_ctx->load_settings_raw( 'title_txt_hover', $res_ctx->get_style_att('title_txt_hover', __CLASS__) );

        $underline_color = $res_ctx->get_style_att('all_underline_color', __CLASS__);
        if ( $underline_height != 0 ) {
            if( $underline_color == '' ) {
                $res_ctx->load_settings_raw('all_underline_color', '#000');
            } else {
                $res_ctx->load_settings_raw('all_underline_color', $res_ctx->get_style_att('all_underline_color', __CLASS__));
            }
        }


        // *- fonts -* //
        $res_ctx->load_font_settings( 'f_title', __CLASS__ );



        /*-- CATEGORY TAG -- */
        // *- layout -* //
        // category tag space
        $modules_category_margin = $res_ctx->get_style_att('modules_category_margin', __CLASS__);
        $res_ctx->load_settings_raw( 'modules_category_margin', $modules_category_margin );
        if( $modules_category_margin != '' && is_numeric( $modules_category_margin ) ) {
            $res_ctx->load_settings_raw( 'modules_category_margin', $modules_category_margin . 'px' );
        }

        // category tag padding
        $modules_category_padding = $res_ctx->get_style_att('modules_category_padding', __CLASS__);
        $res_ctx->load_settings_raw( 'modules_category_padding', $modules_category_padding );
        if( $modules_category_padding != '' && is_numeric( $modules_category_padding ) ) {
            $res_ctx->load_settings_raw( 'modules_category_padding', $modules_category_padding . 'px' );
        }

        // module_border_width
        $modules_cat_border = $res_ctx->get_style_att('modules_cat_border', __CLASS__);
        $res_ctx->load_settings_raw( 'modules_cat_border', $modules_cat_border );
        if ( is_numeric( $modules_cat_border ) ) {
            $res_ctx->load_settings_raw( 'modules_cat_border', $modules_cat_border . 'px' );
        }
        // category tag radius
        $modules_category_radius = $res_ctx->get_style_att('modules_category_radius', __CLASS__);
        if ( $modules_category_radius != 0 || !empty($modules_category_radius) ) {
            $res_ctx->load_settings_raw( 'modules_category_radius', $modules_category_radius . 'px' );
        }

        // show category
        $res_ctx->load_settings_raw( 'show_cat', $res_ctx->get_style_att('show_cat', __CLASS__) );


        // *- colors -* //
        $res_ctx->load_settings_raw( 'cat_bg', $res_ctx->get_style_att('cat_bg', __CLASS__) );
        $res_ctx->load_settings_raw( 'cat_txt', $res_ctx->get_style_att('cat_txt', __CLASS__) );
        $res_ctx->load_settings_raw( 'cat_bg_hover', $res_ctx->get_style_att('cat_bg_hover', __CLASS__) );
        $res_ctx->load_settings_raw( 'cat_txt_hover', $res_ctx->get_style_att('cat_txt_hover', __CLASS__) );
        $res_ctx->load_settings_raw( 'cat_border', $res_ctx->get_style_att('cat_border', __CLASS__) );
        $res_ctx->load_settings_raw( 'cat_border_hover', $res_ctx->get_style_att('cat_border_hover', __CLASS__) );


        // *- fonts -* //
        $res_ctx->load_font_settings( 'f_cat', __CLASS__ );



        /*-- AUTHOR -- */
        // *- layout -* //
        // show author
        $show_author = $res_ctx->get_style_att('show_author', __CLASS__);
        $res_ctx->load_settings_raw( 'show_author', $show_author );

        // author photo size
        $author_photo_size = $res_ctx->get_style_att('author_photo_size', __CLASS__);
        $res_ctx->load_settings_raw( 'author_photo_size', '20px' );
        if( $author_photo_size != '' && is_numeric( $author_photo_size ) ) {
            $res_ctx->load_settings_raw( 'author_photo_size', $author_photo_size . 'px' );
        }

        // author photo space
        $author_photo_space = $res_ctx->get_style_att('author_photo_space', __CLASS__);
        $res_ctx->load_settings_raw( 'author_photo_space', '6px' );
        if( $author_photo_space != '' && is_numeric( $author_photo_space ) ) {
            $res_ctx->load_settings_raw( 'author_photo_space', $author_photo_space . 'px' );
        }

        // author photo radius
        $author_photo_radius = $res_ctx->get_style_att('author_photo_radius', __CLASS__);
        $res_ctx->load_settings_raw( 'author_photo_radius', $author_photo_radius );
        if( $author_photo_radius != '' ) {
            if( is_numeric( $author_photo_radius ) ) {
                $res_ctx->load_settings_raw( 'author_photo_radius', $author_photo_radius . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'author_photo_radius', '50%' );
        }


        // *- colors -* //
        $res_ctx->load_settings_raw( 'author_txt', $res_ctx->get_style_att('author_txt', __CLASS__) );
        $res_ctx->load_settings_raw( 'author_txt_hover', $res_ctx->get_style_att('author_txt_hover', __CLASS__) );



        /*-- DATE -- */
        // *- layout -* //
        // show date
        $show_date = $res_ctx->get_style_att('show_date', __CLASS__);
        $res_ctx->load_settings_raw( 'show_date', $show_date );


        // *- colors -* //
        $res_ctx->load_settings_raw( 'date_txt', $res_ctx->get_style_att('date_txt', __CLASS__) );



        /*-- COMMENT COUNT -- */
        // *- layout -* //
        // show comments
        $show_com = $res_ctx->get_style_att('show_com', __CLASS__);
        $res_ctx->load_settings_raw( 'show_com', $show_com );


        // *- colors -* //
        $res_ctx->load_settings_raw( 'com_bg', $res_ctx->get_style_att('com_bg', __CLASS__) );
        $res_ctx->load_settings_raw( 'com_txt', $res_ctx->get_style_att('com_txt', __CLASS__) );



        /*-- REVIEW STARS -- */
        // *- layout -* //
        // show review stars
        $show_review = $res_ctx->get_style_att('show_review', __CLASS__);
        $res_ctx->load_settings_raw( 'show_review', $show_review );

        // review stars space
        $review_space = $res_ctx->get_style_att('review_space', __CLASS__);
        $res_ctx->load_settings_raw( 'review_space', $review_space );
        if( $review_space != '' && is_numeric( $review_space ) ) {
            $res_ctx->load_settings_raw( 'review_space', $review_space . 'px' );
        }

        // review stars size
        $review_size = $res_ctx->get_style_att('review_size', __CLASS__);
        if ( is_numeric( $review_size ) ) {
            $res_ctx->load_settings_raw( 'review_size', 10 + $review_size/0.5 . 'px' );
        }

        // review stars distance
        $review_distance = $res_ctx->get_style_att('review_distance', __CLASS__);
        $res_ctx->load_settings_raw( 'review_distance', $review_distance );
        if( $review_distance != '' && is_numeric( $review_distance ) ) {
            $res_ctx->load_settings_raw( 'review_distance', $review_distance . 'px' );
        }



        /*-- EXCERPT -- */
        // *- layout -* //
        // show excerpt
        $res_ctx->load_settings_raw( 'show_excerpt', $res_ctx->get_style_att('show_excerpt', __CLASS__) );

        // article excerpt space
        $art_excerpt = $res_ctx->get_style_att('art_excerpt', __CLASS__);
        $res_ctx->load_settings_raw( 'art_excerpt', $art_excerpt );
        if ( is_numeric( $art_excerpt ) ) {
            $res_ctx->load_settings_raw( 'art_excerpt', $art_excerpt . 'px' );
        }

        // article excerpt columns
        $excerpt_col = $res_ctx->get_style_att('excerpt_col', __CLASS__);
        $res_ctx->load_settings_raw( 'excerpt_col', $excerpt_col );
        if ( $excerpt_col == '' ) {
            $res_ctx->load_settings_raw( 'excerpt_col', '1' );
        }
        // article excerpt columns gap
        $excerpt_gap = $res_ctx->get_style_att('excerpt_gap', __CLASS__);
        $res_ctx->load_settings_raw( 'excerpt_gap', $excerpt_gap );
        if( $excerpt_gap != '' ) {
            if ( is_numeric( $excerpt_gap ) ) {
                $res_ctx->load_settings_raw( 'excerpt_gap', $excerpt_gap . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'excerpt_gap', '48px' );
        }

        // inline excerpt
        $excerpt_inline = $res_ctx->get_style_att('excerpt_inline', __CLASS__);
        $modules_category = $res_ctx->get_style_att('modules_category', __CLASS__);
        $res_ctx->load_settings_raw( 'excerpt_inline', $excerpt_inline );
        if( $excerpt_inline != '' && $modules_category == 'above' ) {
            $res_ctx->load_settings_raw( 'excerpt_cat_fix', 1 );
        }


        // *- colors -* //
        $res_ctx->load_settings_raw( 'ex_txt', $res_ctx->get_style_att('ex_txt', __CLASS__) );


        // *- font -* //
        $res_ctx->load_font_settings( 'f_ex', __CLASS__ );



        /*-- SHOW META INFO DETAILS -- */
        if( $show_author == 'none' && $show_date == 'none' && $show_com == 'none' && $show_review == 'none' ) {
            $res_ctx->load_settings_raw( 'hide_author_date', 1 );
        } else {
            $res_ctx->load_settings_raw( 'show_author_date', 1 );
        }



        /*-- AUDIO PLAYER -- */
        // *- layout -* //
        // show audio player
        $show_audio = $res_ctx->get_style_att('show_audio', __CLASS__);
        if( $show_audio == '' || $show_audio == 'block' ) {
            $res_ctx->load_settings_raw( 'show_audio', 1 );
        } else if( $show_audio == 'none' ) {
            $res_ctx->load_settings_raw( 'hide_audio', 1 );
        }

        // article audio player space
        $art_audio = $res_ctx->get_style_att('art_audio', __CLASS__);
        $res_ctx->load_settings_raw( 'art_audio', $art_audio );
        if ( is_numeric( $art_audio ) ) {
            $res_ctx->load_settings_raw( 'art_audio', $art_audio . 'px' );
        }

        // article audio size
        $art_audio_size = $res_ctx->get_style_att('art_audio_size', __CLASS__);
        if ( is_numeric( $art_audio_size ) ) {
            $res_ctx->load_settings_raw('art_audio_size', 10 + $art_audio_size / 0.5 . 'px');
        }


        // *- colors -* //
        $res_ctx->load_settings_raw( 'audio_btn_color', $res_ctx->get_style_att( 'audio_btn_color', __CLASS__ ) );
        $res_ctx->load_settings_raw( 'audio_time_color', $res_ctx->get_style_att( 'audio_time_color', __CLASS__ ) );
        $res_ctx->load_settings_raw( 'audio_bar_color', $res_ctx->get_style_att( 'audio_bar_color', __CLASS__ ) );
        $res_ctx->load_settings_raw( 'audio_bar_curr_color', $res_ctx->get_style_att( 'audio_bar_curr_color', __CLASS__ ) );




        /*-- READ MORE BUTTON -- */
        // *- layout -* //
        // show button
        $res_ctx->load_settings_raw( 'show_btn', $res_ctx->get_style_att('show_btn', __CLASS__) );

        // button space
        $btn_margin = $res_ctx->get_style_att('btn_margin', __CLASS__);
        $res_ctx->load_settings_raw( 'btn_margin', $btn_margin );
        if( $btn_margin != '' && is_numeric( $btn_margin ) ) {
            $res_ctx->load_settings_raw( 'btn_margin', $btn_margin . 'px' );
        }

        // button padding
        $btn_padding = $res_ctx->get_style_att('btn_padding', __CLASS__);
        $res_ctx->load_settings_raw( 'btn_padding', $btn_padding );
        if( $btn_padding != '' && is_numeric( $btn_padding ) ) {
            $res_ctx->load_settings_raw( 'btn_padding', $btn_padding . 'px' );
        }

        // button border
        $btn_border_width = $res_ctx->get_style_att('btn_border_width', __CLASS__);
        $res_ctx->load_settings_raw( 'btn_border_width', $btn_border_width );
        if( $btn_border_width != '' && is_numeric( $btn_border_width ) ) {
            $res_ctx->load_settings_raw( 'btn_border_width', $btn_border_width . 'px' );
        }

        // btn_radius
        $btn_radius = $res_ctx->get_style_att('btn_radius', __CLASS__);
        $res_ctx->load_settings_raw( 'btn_radius', $btn_radius );
        if( $btn_radius != '' && is_numeric( $btn_radius ) ) {
            $res_ctx->load_settings_raw( 'btn_radius', $btn_radius . 'px' );
        }


        // *- colors -* //
        $res_ctx->load_settings_raw( 'btn_bg', $res_ctx->get_style_att('btn_bg', __CLASS__) );
        $res_ctx->load_settings_raw( 'btn_bg_hover', $res_ctx->get_style_att('btn_bg_hover', __CLASS__) );
        $res_ctx->load_settings_raw( 'btn_txt', $res_ctx->get_style_att('btn_txt', __CLASS__) );
        $res_ctx->load_settings_raw( 'btn_txt_hover', $res_ctx->get_style_att('btn_txt_hover', __CLASS__) );
        $res_ctx->load_settings_raw( 'btn_border', $res_ctx->get_style_att('btn_border', __CLASS__) );
        $res_ctx->load_settings_raw( 'btn_border_hover', $res_ctx->get_style_att('btn_border_hover', __CLASS__) );


        // *- fonts -* //
        $res_ctx->load_font_settings( 'f_btn', __CLASS__ );

    }

	function render( $index_style = '' ) {
		if ( ! empty( $index_style ) ) {
			$this->index_style = $index_style;
		}
        $this->unique_style_class = td_global::td_generate_unique_id();

		return $this->get_style($this->get_css());
	}

	function get_style_att( $att_name ) {
		return $this->get_att( $att_name ,__CLASS__, $this->index_style );
	}

	function get_atts() {
		return $this->atts;
	}
}
