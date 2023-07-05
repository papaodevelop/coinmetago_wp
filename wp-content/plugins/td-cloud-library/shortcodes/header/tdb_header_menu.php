<?php
/**
 * Created by PhpStorm.
 * User: lucian
 * Date: 10/16/2018
 * Time: 9:06 AM
 */

class tdb_header_menu extends td_block {

    protected $shortcode_atts = array(); //the atts used for rendering the current block
    private $unique_block_class;

    public function get_custom_css() {
        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $unique_block_class = ((td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax()) ? '[class*="tdc-row"] .' : '.') . $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>

                /* @style_general_header_menu_in_more */
                .tdb_header_menu .tdb-menu-items-pulldown {
                  -webkit-transition: opacity 0.5s;
                  transition: opacity 0.5s;
                  opacity: 1;
                }
                .tdb_header_menu .tdb-menu-items-pulldown.tdb-menu-items-pulldown-inactive {
                  white-space: nowrap;
                  opacity: 0;
                }
                .tdb_header_menu .tdb-menu-items-pulldown.tdb-menu-items-pulldown-inactive .tdb-menu {
                  white-space: nowrap;
                }
                .tdb_header_menu .tdb-menu-items-pulldown.tdb-menu-items-pulldown-inactive .tdb-menu > li {
                  float: none;
                  display: inline-block;
                }
                .tdb_header_menu .tdb-menu-items-dropdown {
                  position: relative;
                  display: inline-block;
                  vertical-align: middle;
                  font-family: 'Open Sans', 'Open Sans Regular', sans-serif;
                }
                .tdb_header_menu .tdb-menu-items-dropdown:hover .td-pulldown-filter-list {
                  display: block;
                }
                .tdb_header_menu .tdb-menu-items-dropdown:hover .td-subcat-more:after {
                  width: 100%;
                }
                .tdb_header_menu .tdb-menu-items-dropdown .tdb-menu-sep {
                  position: relative;
                  vertical-align: middle;
                  font-size: 14px;
                }
                .tdb_header_menu .tdb-menu-items-dropdown .tdb-menu-more-icon-svg,
                .tdb_header_menu .tdb-menu-items-dropdown .tdb-menu-sep-svg {
                  line-height: 0;
                }
                .tdb_header_menu .tdb-menu-items-dropdown .tdb-menu-more-icon-svg svg,
                .tdb_header_menu .tdb-menu-items-dropdown .tdb-menu-sep-svg svg {
                  width: 14px;
                  height: auto;
                }
                .tdb_header_menu .tdb-menu-items-dropdown .tdb-menu-more-icon-svg {
                  vertical-align: middle;
                }
                .tdb_header_menu .tdb-menu-items-empty + .tdb-menu-items-dropdown .tdb-menu-sep {
                  display: none;
                }
                .tdb_header_menu .td-subcat-more {
                  position: relative;
                  display: inline-block;
                  padding: 0 14px;
                  font-size: 14px;
                  line-height: 48px;
                  vertical-align: middle;
                  -webkit-backface-visibility: hidden;
                  color: #000;
                  cursor: pointer;
                }
                .tdb_header_menu .td-subcat-more > .tdb-menu-item-text {
                  font-weight: 700;
                  text-transform: uppercase;
                  font-family: 'Open Sans', 'Open Sans Regular', sans-serif;
                }
                .tdb_header_menu .td-subcat-more:after {
                  content: '';
                  position: absolute;
                  bottom: 0;
                  left: 0;
                  right: 0;
                  margin: 0 auto;
                  width: 0;
                  height: 3px;
                  background-color: #4db2ec;
                  -webkit-transform: translate3d(0, 0, 0);
                  transform: translate3d(0, 0, 0);
                  -webkit-transition: width 0.2s ease;
                  transition: width 0.2s ease;
                }
                .tdb_header_menu .td-subcat-more > .tdb-menu-item-text {
                  float: left;
                }
                .tdb_header_menu .td-subcat-more .tdb-menu-more-subicon {
                  margin: 0 0 0 7px;
                }
                .tdb_header_menu .td-subcat-more .tdb-menu-more-subicon-svg {
                  line-height: 0;
                }
                .tdb_header_menu .td-subcat-more .tdb-menu-more-subicon-svg svg {
                  width: 14px;
                  height: auto;
                }
                .tdb_header_menu .td-subcat-more .tdb-menu-more-subicon-svg svg,
                .tdb_header_menu .td-subcat-more .tdb-menu-more-subicon-svg svg * {
                  fill: #000;
                }
                .tdb_header_menu .td-pulldown-filter-list,
                .tdb_header_menu .td-pulldown-filter-list .sub-menu {
                    position: absolute;
                    width: 170px !important;
                    background-color: #fff;
                    display: none;
                    z-index: 99;
                }
                .tdb_header_menu .td-pulldown-filter-list {
                    list-style-type: none;
                    top: 100%;
                    left: -15px;
                    margin: 0;
                    padding: 15px 0;
                    text-align: left;
                }
                @media (max-width: 1018px) {
                  .tdb_header_menu .td-pulldown-filter-list {
                    left: auto;
                    right: -15px;
                  }
                }
                .tdb_header_menu .td-pulldown-filter-list .sub-menu {
                    top: 0;
                    right: 100%;
                    left: auto;
                    margin-top: -15px;
                }
                .tdb_header_menu .td-pulldown-filter-list li {
                  margin: 0;
                }
                .tdb_header_menu .td-pulldown-filter-list li a {
                  position: relative;
                  display: block;
                  padding: 7px 30px;
                  font-size: 12px;
                  line-height: 20px;
                  color: #111;
                }
                .tdb_header_menu .td-pulldown-filter-list li:hover > a {
                  color: #4db2ec;
                }
                .tdb_header_menu .td-pulldown-filter-list li:hover > .sub-menu {
                    display: block !important;
                }
                .tdb_header_menu .td-pulldown-filter-list li .tdb-menu-sep {
                  display: none;
                }
                
                .tdb_header_menu .td-pulldown-filter-list li:not(.tdb-normal-menu) > a > .tdb-sub-menu-icon,
                .tdb_header_menu .td-pulldown-filter-list li:not(.tdb-normal-menu) .sub-menu {
                  display: none !important;
                }
                
               
                /* @style_general_header_menu */
                .tdb_header_menu {
                  margin-bottom: 0;
                  z-index: 999;
                  clear: none;
                }
                .tdb_header_menu .tdb-main-sub-icon-fake,
                .tdb_header_menu .tdb-sub-icon-fake {
                    display: none;
                }
                .rtl .tdb_header_menu .tdb-menu {
                  display: flex;
                }
                .tdb_header_menu .tdb-menu {
                  display: inline-block;
                  vertical-align: middle;
                  margin: 0;
                }
                .tdb_header_menu .tdb-menu .tdb-mega-menu-inactive,
                .tdb_header_menu .tdb-menu .tdb-menu-item-inactive {
                  pointer-events: none;
                }
                .tdb_header_menu .tdb-menu .tdb-mega-menu-inactive > ul,
                .tdb_header_menu .tdb-menu .tdb-menu-item-inactive > ul {
                  visibility: hidden;
                  opacity: 0;
                }
                .tdb_header_menu .tdb-menu .sub-menu {
                  font-size: 14px;
                }
                .tdb_header_menu .tdb-menu .sub-menu > li {
                  list-style-type: none;
                  margin: 0;
                  font-family: 'Open Sans', 'Open Sans Regular', sans-serif;
                }
                .tdb_header_menu .tdb-menu > li {
                  float: left;
                  list-style-type: none;
                  margin: 0;
                }
                .tdb_header_menu .tdb-menu > li > a {
                  position: relative;
                  display: inline-block;
                  padding: 0 14px;
                  font-weight: 700;
                  font-size: 14px;
                  line-height: 48px;
                  vertical-align: middle;
                  text-transform: uppercase;
                  -webkit-backface-visibility: hidden;
                  color: #000;
                  font-family: 'Open Sans', 'Open Sans Regular', sans-serif;
                }
                .tdb_header_menu .tdb-menu > li > a:after {
                  content: '';
                  position: absolute;
                  bottom: 0;
                  left: 0;
                  right: 0;
                  margin: 0 auto;
                  width: 0;
                  height: 3px;
                  background-color: #4db2ec;
                  -webkit-transform: translate3d(0, 0, 0);
                  transform: translate3d(0, 0, 0);
                  -webkit-transition: width 0.2s ease;
                  transition: width 0.2s ease;
                }
                .tdb_header_menu .tdb-menu > li > a > .tdb-menu-item-text {
                  display: inline-block;
                }
                .tdb_header_menu .tdb-menu > li > a .tdb-menu-item-text,
                .tdb_header_menu .tdb-menu > li > a span {
                  vertical-align: middle;
                  float: left;
                }
                .tdb_header_menu .tdb-menu > li > a .tdb-sub-menu-icon {
                  margin: 0 0 0 7px;
                }
                .tdb_header_menu .tdb-menu > li > a .tdb-sub-menu-icon-svg {
                  float: none;
                  line-height: 0;
                }
                .tdb_header_menu .tdb-menu > li > a .tdb-sub-menu-icon-svg svg {
                  width: 14px;
                  height: auto;
                }
                .tdb_header_menu .tdb-menu > li > a .tdb-sub-menu-icon-svg svg,
                .tdb_header_menu .tdb-menu > li > a .tdb-sub-menu-icon-svg svg * {
                  fill: #000;
                }
                .tdb_header_menu .tdb-menu > li.current-menu-item > a:after,
                .tdb_header_menu .tdb-menu > li.current-menu-ancestor > a:after,
                .tdb_header_menu .tdb-menu > li.current-category-ancestor > a:after,
                .tdb_header_menu .tdb-menu > li:hover > a:after,
                .tdb_header_menu .tdb-menu > li.tdb-hover > a:after {
                  width: 100%;
                }
                .tdb_header_menu .tdb-menu > li:hover > ul,
                .tdb_header_menu .tdb-menu > li.tdb-hover > ul {
                  top: auto;
                  display: block !important;
                }
                .tdb_header_menu .tdb-menu > li.td-normal-menu > ul.sub-menu {
                  top: auto;
                  left: 0;
                  z-index: 99;
                }
                .tdb_header_menu .tdb-menu > li .tdb-menu-sep {
                  position: relative;
                  vertical-align: middle;
                  font-size: 14px;
                }
                .tdb_header_menu .tdb-menu > li .tdb-menu-sep-svg {
                  line-height: 0;
                }
                .tdb_header_menu .tdb-menu > li .tdb-menu-sep-svg svg {
                  width: 14px;
                  height: auto;
                }
                .tdb_header_menu .tdb-menu > li:last-child .tdb-menu-sep {
                  display: none;
                }
                .tdb_header_menu .tdb-menu-item-text {
                  word-wrap: break-word;
                }
                .tdb_header_menu .tdb-menu-item-text,
                .tdb_header_menu .tdb-sub-menu-icon,
                .tdb_header_menu .tdb-menu-more-subicon {
                  vertical-align: middle;
                }
                .tdb_header_menu .tdb-sub-menu-icon,
                .tdb_header_menu .tdb-menu-more-subicon {
                  position: relative;
                  top: 0;
                  padding-left: 0;
                }
                .tdb_header_menu .tdb-menu .sub-menu {
                  position: absolute;
                  top: -999em;
                  background-color: #fff;
                  z-index: 99;
                }
                .tdb_header_menu .tdb-normal-menu {
                  position: relative;
                }
                .tdb_header_menu .tdb-normal-menu ul {
                  left: 0;
                  padding: 15px 0;
                  text-align: left;
                }
                .tdb_header_menu .tdb-normal-menu ul ul {
                  margin-top: -15px;
                }
                .tdb_header_menu .tdb-normal-menu ul .tdb-menu-item {
                  position: relative;
                  list-style-type: none;
                }
                .tdb_header_menu .tdb-normal-menu ul .tdb-menu-item > a {
                  position: relative;
                  display: block;
                  padding: 7px 30px;
                  font-size: 12px;
                  line-height: 20px;
                  color: #111;
                }
                .tdb_header_menu .tdb-normal-menu ul .tdb-menu-item > a .tdb-sub-menu-icon,
                .tdb_header_menu .td-pulldown-filter-list .tdb-menu-item > a .tdb-sub-menu-icon {
                  position: absolute;
                  top: 50%;
                  -webkit-transform: translateY(-50%);
                  transform: translateY(-50%);
                  right: 0;
                  padding-right: inherit;
                  font-size: 7px;
                  line-height: 20px;
                }
                .tdb_header_menu .tdb-normal-menu ul .tdb-menu-item > a .tdb-sub-menu-icon-svg,
                .tdb_header_menu .td-pulldown-filter-list .tdb-menu-item > a .tdb-sub-menu-icon-svg {
                  line-height: 0;
                }
                .tdb_header_menu .tdb-normal-menu ul .tdb-menu-item > a .tdb-sub-menu-icon-svg svg,
                .tdb_header_menu .td-pulldown-filter-list .tdb-menu-item > a .tdb-sub-menu-icon-svg svg {
                  width: 7px;
                  height: auto;
                }
                .tdb_header_menu .tdb-normal-menu ul .tdb-menu-item > a .tdb-sub-menu-icon-svg svg,
                .tdb_header_menu .tdb-normal-menu ul .tdb-menu-item > a .tdb-sub-menu-icon-svg svg *,
                .tdb_header_menu .td-pulldown-filter-list .tdb-menu-item > a .tdb-sub-menu-icon svg,
                .tdb_header_menu .td-pulldown-filter-list .tdb-menu-item > a .tdb-sub-menu-icon svg * {
                  fill: #000;
                }
                .tdb_header_menu .tdb-normal-menu ul .tdb-menu-item:hover > ul,
                .tdb_header_menu .tdb-normal-menu ul .tdb-menu-item.tdb-hover > ul {
                  top: 0;
                  display: block !important;
                }
                .tdb_header_menu .tdb-normal-menu ul .tdb-menu-item.current-menu-item > a,
                .tdb_header_menu .tdb-normal-menu ul .tdb-menu-item.current-menu-ancestor > a,
                .tdb_header_menu .tdb-normal-menu ul .tdb-menu-item.current-category-ancestor > a,
                .tdb_header_menu .tdb-normal-menu ul .tdb-menu-item.tdb-hover > a,
                .tdb_header_menu .tdb-normal-menu ul .tdb-menu-item:hover > a {
                  color: #4db2ec;
                }
                .tdb_header_menu .tdb-normal-menu > ul {
                  left: -15px;
                }
                .tdb_header_menu.tdb-menu-sub-inline .tdb-normal-menu ul,
                .tdb_header_menu.tdb-menu-sub-inline .td-pulldown-filter-list {
                  width: 100% !important;
                }
                .tdb_header_menu.tdb-menu-sub-inline .tdb-normal-menu ul li,
                .tdb_header_menu.tdb-menu-sub-inline .td-pulldown-filter-list li {
                  display: inline-block;
                  width: auto !important;
                }
                .tdb_header_menu.tdb-menu-sub-inline .tdb-normal-menu,
                .tdb_header_menu.tdb-menu-sub-inline .tdb-normal-menu .tdb-menu-item {
                  position: static;
                }
                .tdb_header_menu.tdb-menu-sub-inline .tdb-normal-menu ul ul {
                  margin-top: 0 !important;
                }
                .tdb_header_menu.tdb-menu-sub-inline .tdb-normal-menu > ul {
                  left: 0 !important;
                }
                .tdb_header_menu.tdb-menu-sub-inline .tdb-normal-menu .tdb-menu-item > a .tdb-sub-menu-icon {
                  float: none;
                  line-height: 1;
                }
                .tdb_header_menu.tdb-menu-sub-inline .tdb-normal-menu .tdb-menu-item:hover > ul,
                .tdb_header_menu.tdb-menu-sub-inline .tdb-normal-menu .tdb-menu-item.tdb-hover > ul {
                  top: 100%;
                }
                .tdb_header_menu.tdb-menu-sub-inline .tdb-menu-items-dropdown {
                  position: static;
                }
                .tdb_header_menu.tdb-menu-sub-inline .td-pulldown-filter-list {
                  left: 0 !important;
                }
                .tdb-menu .tdb-mega-menu .sub-menu {
                  -webkit-transition: opacity 0.3s ease;
                  transition: opacity 0.3s ease;
                  width: 1114px !important;
                }
                .tdb-menu .tdb-mega-menu .sub-menu,
                .tdb-menu .tdb-mega-menu .sub-menu > li {
                  position: absolute;
                  left: 50%;
                  -webkit-transform: translateX(-50%);
                  transform: translateX(-50%);
                }
                .tdb-menu .tdb-mega-menu .sub-menu > li {
                  top: 0;
                  width: 100%;
                  max-width: 1114px !important;
                  height: auto;
                  background-color: #fff;
                  border: 1px solid #eaeaea;
                  overflow: hidden;
                }
                @media (max-width: 1140px) {
                  .tdb-menu .tdb-mega-menu .sub-menu > li {
                    width: 100% !important;
                  }
                }
                .tdc-dragged .tdb-block-menu ul {
                  visibility: hidden !important;
                  opacity: 0 !important;
                  -webkit-transition: all 0.3s ease;
                  transition: all 0.3s ease;
                }
                .tdb-mm-align-screen .tdb-menu .tdb-mega-menu .sub-menu {
                  -webkit-transform: translateX(0);
                  transform: translateX(0);
                }
                .tdb-mm-align-parent .tdb-menu .tdb-mega-menu {
                  position: relative;
                }


                
                
                /* @disable_hover */
                $unique_block_class:not(.tdc-element-selected) .sub-menu,
                $unique_block_class:not(.tdc-element-selected) .td-pulldown-filter-list {
                    visibility: hidden !important;
                }
                /* @show_subcat */
                $unique_block_class .tdb-first-submenu > ul {
                    display: block !important;
                    top: auto !important;
                }
                /* @show_mega */
                $unique_block_class .tdb-mega-menu-first > ul {
                    display: block !important;
                    top: auto !important;
                }
                /* @show_mega_cats */
                $unique_block_class .tdb-mega-menu-cats-first > ul {
                    display: block !important;
                    top: auto !important;
                }
                
                
                /* @width */
                $unique_block_class {
                    max-width: @width;
                }
                /* @inline */
                $unique_block_class {
                    display: inline-block;
                }
                /* @float_right */
                $unique_block_class {
                    float: right;
                    clear: none;
                }
                /* @align_horiz_center */
                $unique_block_class .td_block_inner {
                    text-align: center;
                }
                /* @align_horiz_right */
                $unique_block_class .td_block_inner {
                    text-align: right;
                }
                
                /* @elem_space */
                $unique_block_class .tdb-menu > li {
                    margin-right: @elem_space;
                }
                $unique_block_class .tdb-menu > li:last-child {
                    margin-right: 0;
                }
                $unique_block_class .tdb-menu-items-dropdown {
                    margin-left: @elem_space;
                }
                $unique_block_class .tdb-menu-items-empty + .tdb-menu-items-dropdown {
                    margin-left: 0;
                }
                
                /* @elem_padd */
                $unique_block_class .tdb-menu > li > a,
                $unique_block_class .td-subcat-more {
                    padding: @elem_padd;
                }
                
                /* @sep_icon_size */
                $unique_block_class .tdb-menu > li .tdb-menu-sep,
                $unique_block_class .tdb-menu-items-dropdown .tdb-menu-sep {
                    font-size: @sep_icon_size;
                }
                /* @sep_icon_svg_size */
                $unique_block_class .tdb-menu > li .tdb-menu-sep-svg svg,
                $unique_block_class .tdb-menu-items-dropdown .tdb-menu-sep-svg svg {
                    width: @sep_icon_svg_size;
                }
                /* @sep_icon_space */
                $unique_block_class .tdb-menu > li .tdb-menu-sep,
                $unique_block_class .tdb-menu-items-dropdown .tdb-menu-sep {
                    margin: 0 @sep_icon_space;
                }
                /* @sep_icon_align */
                $unique_block_class .tdb-menu > li .tdb-menu-sep,
                $unique_block_class .tdb-menu-items-dropdown .tdb-menu-sep {
                    top: @sep_icon_align;
                }
                
                /* @main_sub_icon_size */
                $unique_block_class .tdb-menu > li > a .tdb-sub-menu-icon,
                $unique_block_class .td-subcat-more .tdb-menu-more-subicon {
                    font-size: @main_sub_icon_size;
                }
                /* @main_sub_icon_svg_size */
                $unique_block_class .tdb-menu > li > a .tdb-sub-menu-icon-svg svg,
                $unique_block_class .td-subcat-more .tdb-menu-more-subicon-svg svg {
                    width: @main_sub_icon_svg_size;
                }
                /* @main_sub_icon_space */
                $unique_block_class .tdb-menu > li > a .tdb-sub-menu-icon,
                $unique_block_class .td-subcat-more .tdb-menu-more-subicon {
                    margin-left: @main_sub_icon_space;
                }
                /* @main_sub_icon_align */
                $unique_block_class .tdb-menu > li > a .tdb-sub-menu-icon,
                $unique_block_class .td-subcat-more .tdb-menu-more-subicon {
                    top: @main_sub_icon_align;
                }
                
                /* @more_icon_size */
                $unique_block_class .td-subcat-more .tdb-menu-more-icon {
                    font-size: @more_icon_size;
                }
                /* @more_icon_svg_size */
                $unique_block_class .td-subcat-more .tdb-menu-more-icon-svg svg {
                    width: @more_icon_svg_size;
                }
                /* @more_icon_align */
                $unique_block_class .td-subcat-more .tdb-menu-more-icon {
                    top: @more_icon_align;
                }
                
                /* @text_color */
                $unique_block_class .tdb-menu > li > a,
                $unique_block_class .td-subcat-more {
                    color: @text_color;
                }
                $unique_block_class .tdb-menu > li > a .tdb-sub-menu-icon-svg svg,
                $unique_block_class .tdb-menu > li > a .tdb-sub-menu-icon-svg svg *,
                $unique_block_class .td-subcat-more .tdb-menu-more-subicon-svg svg,
                $unique_block_class .td-subcat-more .tdb-menu-more-subicon-svg svg *,
                $unique_block_class .td-subcat-more .tdb-menu-more-icon-svg,
                $unique_block_class .td-subcat-more .tdb-menu-more-icon-svg * {
                    fill: @text_color;
                }
                /* @main_sub_color */
                $unique_block_class .tdb-menu > li > a .tdb-sub-menu-icon,
                $unique_block_class .td-subcat-more .tdb-menu-more-subicon {
                    color: @main_sub_color;
                }
                $unique_block_class .tdb-menu > li > a .tdb-sub-menu-icon-svg svg,
                $unique_block_class .tdb-menu > li > a .tdb-sub-menu-icon-svg svg *,
                $unique_block_class .td-subcat-more .tdb-menu-more-subicon-svg svg,
                $unique_block_class .td-subcat-more .tdb-menu-more-subicon-svg svg * {
                    fill: @main_sub_color;
                }
                /* @sep_color */
                $unique_block_class .tdb-menu > li .tdb-menu-sep,
                $unique_block_class .tdb-menu-items-dropdown .tdb-menu-sep {
                    color: @sep_color;
                }
                $unique_block_class .tdb-menu > li .tdb-menu-sep-svg svg,
                $unique_block_class .tdb-menu > li .tdb-menu-sep-svg svg *,
                $unique_block_class .tdb-menu-items-dropdown .tdb-menu-sep-svg svg,
                $unique_block_class .tdb-menu-items-dropdown .tdb-menu-sep-svg svg * {
                    fill: @sep_color;
                }
                /* @more_icon_color */
                $unique_block_class .td-subcat-more .tdb-menu-more-icon {
                    color: @more_icon_color;
                }
                $unique_block_class .td-subcat-more .tdb-menu-more-icon-svg,
                $unique_block_class .td-subcat-more .tdb-menu-more-icon-svg * {
                    fill: @more_icon_color;
                }
                
                /* @f_elem */
                $unique_block_class .tdb-menu > li > a,
                $unique_block_class .td-subcat-more,
                $unique_block_class .td-subcat-more > .tdb-menu-item-text {
                    @f_elem
                }
                
                
                /* @sub_width */
                $unique_block_class .tdb-normal-menu ul.sub-menu,
                $unique_block_class .td-pulldown-filter-list {
                    width: @sub_width !important;
                }
                /* @sub_first_left */
                $unique_block_class .tdb-menu > .tdb-normal-menu > ul,
                $unique_block_class .td-pulldown-filter-list {
                    left: @sub_first_left;
                }
                @media (max-width: 1018px) {
                    $unique_block_class .td-pulldown-filter-list {
                        left: auto;
                        right: @sub_first_left;
                    }
                }
                /* @sub_rest_top */
                $unique_block_class .tdb-normal-menu ul ul,
                $unique_block_class .td-pulldown-filter-list .sub-menu {
                    margin-top: @sub_rest_top;
                }
                /* @sub_padd */
                $unique_block_class .tdb-menu .tdb-normal-menu ul,
                $unique_block_class .td-pulldown-filter-list,
                $unique_block_class .td-pulldown-filter-list .sub-menu {
                    padding: @sub_padd;
                }
                /* @sub_align_horiz_center */
                $unique_block_class .tdb-menu .tdb-normal-menu ul,
                $unique_block_class .td-pulldown-filter-list,
                $unique_block_class .td-pulldown-filter-list .sub-menu {
                    text-align: center;
                }
                /* @sub_align_horiz_right */
                $unique_block_class .tdb-menu .tdb-normal-menu ul,
                $unique_block_class .td-pulldown-filter-list,
                $unique_block_class .td-pulldown-filter-list .sub-menu {
                    text-align: right;
                }
                
                /* @sub_elem_space_right */
                $unique_block_class .tdb-menu .tdb-normal-menu ul .tdb-menu-item > a,
                $unique_block_class .td-pulldown-filter-list li a {
                    margin-right: @sub_elem_space_right;
                }
                $unique_block_class .tdb-menu .tdb-normal-menu ul .tdb-menu-item:last-child > a,
                $unique_block_class .td-pulldown-filter-list li:last-child a {
                    margin-right: 0;
                }
                /* @sub_elem_space_bot */
                $unique_block_class .tdb-menu .tdb-normal-menu ul .tdb-menu-item > a,
                $unique_block_class .td-pulldown-filter-list li a {
                    margin-bottom: @sub_elem_space_bot;
                }
                $unique_block_class .tdb-menu .tdb-normal-menu ul .tdb-menu-item:last-child > a,
                $unique_block_class .td-pulldown-filter-list li:last-child a {
                    margin-bottom: 0;
                }
                /* @sub_elem_padd */
                $unique_block_class .tdb-menu .tdb-normal-menu ul .tdb-menu-item > a,
                $unique_block_class .tdb-menu-items-dropdown .td-pulldown-filter-list li > a {
                    padding: @sub_elem_padd;
                }
                /* @sub_elem_radius */
				$unique_block_class .tdb-menu .tdb-normal-menu ul .tdb-menu-item > a,
                $unique_block_class .td-pulldown-filter-list li a {
					border-radius: @sub_elem_radius;
				}
                
                
                /* @sub_icon_size */
                $unique_block_class .tdb-normal-menu ul .tdb-menu-item > a .tdb-sub-menu-icon,
                $unique_block_class .td-pulldown-filter-list .tdb-menu-item > a .tdb-sub-menu-icon {
                    font-size: @sub_icon_size;
                }
                /* @sub_icon_svg_size */
                $unique_block_class .tdb-normal-menu ul .tdb-menu-item > a .tdb-sub-menu-icon-svg svg,
                $unique_block_class .td-pulldown-filter-list .tdb-menu-item > a .tdb-sub-menu-icon svg {
                    width: @sub_icon_svg_size;
                }
                /* @sub_icon_space */
                $unique_block_class .tdb-normal-menu ul .tdb-menu-item > a .tdb-menu-item-text {
                    margin-right: @sub_icon_space;
                }
                /* @sub_icon_pos_text */
                $unique_block_class .tdb-normal-menu ul .tdb-menu-item > a .tdb-sub-menu-icon {
                    right: auto;
                }
                $unique_block_class .tdb-normal-menu ul .tdb-menu-item > a .tdb-menu-item-text {
                    display: inline-block;
                }
                
                /* @sub_icon_pos_list */
                $unique_block_class .tdb-normal-menu ul .tdb-menu-item > a .tdb-sub-menu-icon,
                $unique_block_class .td-pulldown-filter-list .tdb-menu-item > a .tdb-sub-menu-icon {
                    right: 0;
                }
                /* @sub_icon_align */
                $unique_block_class .tdb-normal-menu ul .tdb-menu-item > a .tdb-sub-menu-icon,
                $unique_block_class .td-pulldown-filter-list .tdb-menu-item > a .tdb-sub-menu-icon {
                    margin-top: @sub_icon_align;
                }
                
                /* @sub_bg_color */
                $unique_block_class .tdb-menu .tdb-normal-menu ul,
                $unique_block_class .td-pulldown-filter-list,
                $unique_block_class .td-pulldown-filter-list .sub-menu {
                    background-color: @sub_bg_color;
                }
                /* @sub_border_size */
                $unique_block_class .tdb-menu .tdb-normal-menu ul,
                $unique_block_class .td-pulldown-filter-list,
                $unique_block_class .td-pulldown-filter-list .sub-menu {
                    border-width: @sub_border_size;
                    border-style: solid;
                    border-color: #000;
                }
                /* @sub_border_color */
                $unique_block_class .tdb-menu .tdb-normal-menu ul,
                $unique_block_class .td-pulldown-filter-list,
                $unique_block_class .td-pulldown-filter-list .sub-menu {
                    border-color: @sub_border_color;
                }
                /* @sub_elem_bg_color */
                $unique_block_class .tdb-menu .tdb-normal-menu ul .tdb-menu-item > a,
                $unique_block_class .td-pulldown-filter-list li a,
                $unique_block_class .td-pulldown-filter-list .sub-menu li a {
                    background-color: @sub_elem_bg_color;
                }
                /* @sub_text_color */
                $unique_block_class .tdb-menu .tdb-normal-menu ul .tdb-menu-item > a,
                $unique_block_class .tdb-menu-items-dropdown .td-pulldown-filter-list li a,
                $unique_block_class .tdb-menu-items-dropdown .td-pulldown-filter-list li a {
                    color: @sub_text_color;
                }
                $unique_block_class .tdb-menu .tdb-normal-menu ul .tdb-menu-item > a .tdb-sub-menu-icon-svg svg,
                $unique_block_class .tdb-menu .tdb-normal-menu ul .tdb-menu-item > a .tdb-sub-menu-icon-svg svg *,
                $unique_block_class .tdb-menu-items-dropdown .td-pulldown-filter-list li a .tdb-sub-menu-icon-svg svg,
                $unique_block_class .tdb-menu-items-dropdown .td-pulldown-filter-list li a .tdb-sub-menu-icon-svg svg * {
                    fill: @sub_text_color;
                }
                /* @sub_color */
                $unique_block_class .tdb-menu .tdb-normal-menu ul .tdb-menu-item > a .tdb-sub-menu-icon,
                $unique_block_class .tdb-menu-items-dropdown .td-pulldown-filter-list li a .tdb-sub-menu-icon {
                    color: @sub_color;
                }
                $unique_block_class .tdb-menu .tdb-normal-menu ul .tdb-menu-item > a .tdb-sub-menu-icon-svg svg,
                $unique_block_class .tdb-menu .tdb-normal-menu ul .tdb-menu-item > a .tdb-sub-menu-icon-svg svg *,
                $unique_block_class .tdb-menu-items-dropdown  .td-pulldown-filter-list li a .tdb-sub-menu-icon-svg svg,
                $unique_block_class .tdb-menu-items-dropdown  .td-pulldown-filter-list li a .tdb-sub-menu-icon-svg svg *  {
                    fill: @sub_color;
                }
                /* @sub_shadow */
                $unique_block_class .tdb-menu .tdb-normal-menu ul,
                $unique_block_class .td-pulldown-filter-list,
                $unique_block_class .td-pulldown-filter-list .sub-menu {
                    box-shadow: @sub_shadow;
                }
                
                /* @f_sub_elem */
                $unique_block_class .tdb-menu .tdb-normal-menu ul .tdb-menu-item > a,
                $unique_block_class .td-pulldown-filter-list li a {
                    @f_sub_elem
                }
                
                
                /* @mm_width */
                $unique_block_class:not(.tdb-mm-align-screen) .tdb-mega-menu .sub-menu,
                $unique_block_class .tdb-mega-menu .sub-menu > li {
                    max-width: @mm_width !important;
                }
                $unique_block_class:not(.tdb-mm-align-screen) .tdb-mega-menu .sub-menu {
                    width: 100vw !important;
                }
                /* @mm_width_with_ul */
                $unique_block_class:not(.tdb-mm-align-screen) .tdb-mega-menu .sub-menu,
                $unique_block_class .tdb-mega-menu .sub-menu > li {
                    max-width: @mm_width_with_ul !important;
                }
                /* @mm_content_width */
                $unique_block_class .tdb-mega-menu .tdb_header_mega_menu {
                    max-width: @mm_content_width;
                    margin: 0 auto;
                }
                /* @mm_height */
                $unique_block_class .tdb-mega-menu .tdb_header_mega_menu {
                    min-height: @mm_height;
                }
                
                /* @mm_align_horiz_align_left */
                $unique_block_class .tdb-mega-menu .sub-menu {
                    left: 0;
                    transform: none;
                    -webkit-transform: none;
                    -moz-transform: none;
                }
                /* @mm_align_horiz_align_right */
                $unique_block_class .tdb-mega-menu .sub-menu {
                    left: auto;
                    right: 0;
                    transform: none;
                    -webkit-transform: none;
                    -moz-transform: none;
                }
                /* @mm_align_horiz_align_left2 */
                $unique_block_class .tdb-mega-menu .tdb_header_mega_menu {
                    margin-left: 0;
                }
                /* @mm_align_horiz_align_right2 */
                $unique_block_class .tdb-mega-menu .tdb_header_mega_menu {
                    margin-right: 0;
                }
                
                /* @mm_offset */
                $unique_block_class .tdb-mega-menu .sub-menu > li {
                    margin-left: @mm_offset;
                }
                
				/* @mm_bg */
				$unique_block_class .tdb-menu .tdb-mega-menu .sub-menu > li {
					background-color: @mm_bg;
				}
				/* @mm_border_size */
				$unique_block_class .tdb-menu .tdb-mega-menu .sub-menu > li {
					border-width: @mm_border_size;
				}
				/* @mm_border_color */
				$unique_block_class .tdb-menu .tdb-mega-menu .sub-menu > li {
					border-color: @mm_border_color;
				}
				/* @mm_shadow */
				$unique_block_class .tdb-menu .tdb-mega-menu .sub-menu > li {
					box-shadow: @mm_shadow;
				}
				
				/* @hover_opacity */
				$unique_block_class .tdb-menu > li > a {
				    transition: all 0.5s ease;
				}
				$unique_block_class .tdb-menu:hover > li > a {
					opacity: @hover_opacity;
				}
				$unique_block_class .tdb-menu > li:hover > a {
					opacity: 1;
				}
				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        $more = $res_ctx->get_shortcode_att('more');
        if( $more == 'yes' ) {
            $res_ctx->load_settings_raw('style_general_header_menu_in_more', 1);
        }
        $res_ctx->load_settings_raw( 'style_general_header_menu', 1 );
        $res_ctx->load_settings_raw( 'style_general_header_align', 1 );


        if ( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) {
            $res_ctx->load_settings_raw('disable_hover', 1);
            $res_ctx->load_settings_raw('show_subcat', $res_ctx->get_shortcode_att('show_subcat'));
            $res_ctx->load_settings_raw('show_mega', $res_ctx->get_shortcode_att('show_mega'));
            $res_ctx->load_settings_raw('show_mega_cats', $res_ctx->get_shortcode_att('show_mega_cats'));
        }


        /*-- MAIN MENU -- */
        // width
        $width = $res_ctx->get_shortcode_att('width');
        $res_ctx->load_settings_raw( 'width', $width );
        if( $width != '' && is_numeric($width) ) {
            $res_ctx->load_settings_raw( 'width', $width . 'px' );
        }
        // inline
        $res_ctx->load_settings_raw( 'inline', $res_ctx->get_shortcode_att('inline') );
        // float right
        $res_ctx->load_settings_raw( 'float_right', $res_ctx->get_shortcode_att('float_right') );
        // horizontal align
        $align_horiz = $res_ctx->get_shortcode_att('align_horiz');
        if( $align_horiz == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'align_horiz_center', 1 );
        } else if ( $align_horiz == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'align_horiz_right', 1 );
        }

        // elements space
        $elem_space = $res_ctx->get_shortcode_att('elem_space');
        if( $elem_space != '' && is_numeric( $elem_space ) ) {
            $res_ctx->load_settings_raw( 'elem_space', $elem_space . 'px' );
        }
        // elements padding
        $elem_padd = $res_ctx->get_shortcode_att('elem_padd');
        $res_ctx->load_settings_raw( 'elem_padd', $elem_padd );
        if( $elem_padd != '' && is_numeric( $elem_padd ) ) {
            $res_ctx->load_settings_raw( 'elem_padd', $elem_padd . 'px' );
        }
        // separator icon size
        $sep_icon = $res_ctx->get_icon_att('sep_tdicon');
        $sep_icon_size = $res_ctx->get_shortcode_att('sep_icon_size');
        if( base64_encode( base64_decode( $sep_icon ) ) == $sep_icon ) {
            $res_ctx->load_settings_raw( 'sep_icon_svg_size', $sep_icon_size );
            if( $sep_icon_size != '' && is_numeric( $sep_icon_size ) ) {
                $res_ctx->load_settings_raw( 'sep_icon_svg_size', $sep_icon_size . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'sep_icon_size', $sep_icon_size );
            if( $sep_icon_size != '' && is_numeric( $sep_icon_size ) ) {
                $res_ctx->load_settings_raw( 'sep_icon_size', $sep_icon_size . 'px' );
            }
        }
        // separator icon space
        $sep_icon_space = $res_ctx->get_shortcode_att('sep_icon_space');
        if( $sep_icon_space != '' && is_numeric( $sep_icon_space ) ) {
            $res_ctx->load_settings_raw( 'sep_icon_space', ($sep_icon_space / 2) . 'px' );
        }
        // separator icon alignment
        $res_ctx->load_settings_raw( 'sep_icon_align', $res_ctx->get_shortcode_att('sep_icon_align') . 'px' );

        // main sub menu icon size
        $main_sub_icon = $res_ctx->get_icon_att('main_sub_tdicon');
        $main_sub_icon_size = $res_ctx->get_shortcode_att('main_sub_icon_size');
        if( base64_encode( base64_decode( $main_sub_icon ) ) == $main_sub_icon ) {
            $res_ctx->load_settings_raw( 'main_sub_icon_svg_size', $main_sub_icon_size );
            if( $main_sub_icon_size != '' && is_numeric( $main_sub_icon_size ) ) {
                $res_ctx->load_settings_raw( 'main_sub_icon_svg_size', $main_sub_icon_size . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'main_sub_icon_size', $main_sub_icon_size );
            if( $main_sub_icon_size != '' && is_numeric( $main_sub_icon_size ) ) {
                $res_ctx->load_settings_raw( 'main_sub_icon_size', $main_sub_icon_size . 'px' );
            }
        }
        // main sub menu icon space
        $main_sub_icon_space = $res_ctx->get_shortcode_att('main_sub_icon_space');
        if( $main_sub_icon_space != '' && is_numeric( $main_sub_icon_space ) ) {
            $res_ctx->load_settings_raw( 'main_sub_icon_space', $main_sub_icon_space . 'px' );
        }
        // main sub menu icon alignment
        $res_ctx->load_settings_raw( 'main_sub_icon_align', $res_ctx->get_shortcode_att('main_sub_icon_align') . 'px' );

        // more icon size
        $more_icon = $res_ctx->get_icon_att('more_tdicon');
        if( base64_encode( base64_decode( $more_icon ) ) == $more_icon ) {
            $more_icon_size = $res_ctx->get_shortcode_att('more_icon_size');
            $res_ctx->load_settings_raw( 'more_icon_svg_size', $more_icon_size );
            if( $more_icon_size != '' && is_numeric( $more_icon_size ) ) {
                $res_ctx->load_settings_raw( 'more_icon_svg_size', $more_icon_size . 'px' );
            }
        } else {
            $more_icon_size = $res_ctx->get_shortcode_att('more_icon_size');
            $res_ctx->load_settings_raw( 'more_icon_size', $more_icon_size );
            if( $more_icon_size != '' && is_numeric( $more_icon_size ) ) {
                $res_ctx->load_settings_raw( 'more_icon_size', $more_icon_size . 'px' );
            }
        }
        // more icon alignment
        $res_ctx->load_settings_raw( 'more_icon_align', $res_ctx->get_shortcode_att('more_icon_align') . 'px' );

        // colors
        $res_ctx->load_settings_raw( 'text_color', $res_ctx->get_shortcode_att('text_color') );
        $res_ctx->load_settings_raw( 'main_sub_color', $res_ctx->get_shortcode_att('main_sub_color') );
        $res_ctx->load_settings_raw( 'sep_color', $res_ctx->get_shortcode_att('sep_color') );
        $res_ctx->load_settings_raw( 'more_icon_color', $res_ctx->get_shortcode_att('more_icon_color') );

        // fonts
        $res_ctx->load_font_settings( 'f_elem' );
        $res_ctx->load_settings_raw( 'f_elem_font_size', $res_ctx->get_shortcode_att( 'f_elem_font_size' ) );
        $res_ctx->load_settings_raw( 'f_elem_line_height', $res_ctx->get_shortcode_att( 'f_elem_font_line_height' ) );



        /*-- SUB MENU -- */
        // first level left position
        $sub_width = $res_ctx->get_shortcode_att('sub_width');
        $res_ctx->load_settings_raw( 'sub_width', $sub_width );
        if( $sub_width != '' && is_numeric( $sub_width ) ) {
            $res_ctx->load_settings_raw( 'sub_width', $sub_width . 'px' );
        }
        // first level left position
        $sub_first_left = $res_ctx->get_shortcode_att('sub_first_left');
        if( $sub_first_left != '' && is_numeric( $sub_first_left ) ) {
            $res_ctx->load_settings_raw( 'sub_first_left', $sub_first_left . 'px' );
        }
        // subsequent levels top position
        $sub_rest_top = $res_ctx->get_shortcode_att('sub_rest_top');
        if( $sub_rest_top != '' && is_numeric( $sub_rest_top ) ) {
            $res_ctx->load_settings_raw( 'sub_rest_top', $sub_rest_top . 'px' );
        }
        // sub menu padding
        $sub_padd = $res_ctx->get_shortcode_att('sub_padd');
        $res_ctx->load_settings_raw( 'sub_padd', $sub_padd );
        if( $sub_padd != '' && is_numeric( $sub_padd ) ) {
            $res_ctx->load_settings_raw( 'sub_padd', $sub_padd . 'px' );
        }
        // sub menu horizontal align
        $sub_align_horiz = $res_ctx->get_shortcode_att('sub_align_horiz');
        if( $sub_align_horiz == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'sub_align_horiz_center', 1 );
        } else if ( $sub_align_horiz == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'sub_align_horiz_right', 1 );
        }

        // sub menu elements inline
        $sub_elem_inline = $res_ctx->get_shortcode_att('sub_elem_inline');
        $res_ctx->load_settings_raw( 'sub_elem_inline', $sub_elem_inline );
        // sub menu elements space
        $sub_elem_space = $res_ctx->get_shortcode_att('sub_elem_space');
        if( $sub_elem_space != '' && is_numeric( $sub_elem_space ) ) {
            if( $sub_elem_inline == 'yes' ) {
                $res_ctx->load_settings_raw( 'sub_elem_space_right', $sub_elem_space . 'px' );
            } else {
                $res_ctx->load_settings_raw( 'sub_elem_space_bot', $sub_elem_space . 'px' );
            }
        }
        // sub menu elements padding
        $sub_elem_padd = $res_ctx->get_shortcode_att('sub_elem_padd');
        $res_ctx->load_settings_raw( 'sub_elem_padd', $sub_elem_padd );
        if( $sub_elem_padd != '' && is_numeric( $sub_elem_padd ) ) {
            $res_ctx->load_settings_raw( 'sub_elem_padd', $sub_elem_padd . 'px' );
        }
        //sub elem radius
        $sub_elem_radius = $res_ctx->get_shortcode_att('sub_elem_radius');
        if ( $sub_elem_radius != 0 || !empty($sub_elem_radius) ) {
            $res_ctx->load_settings_raw( 'sub_elem_radius', $sub_elem_radius . 'px' );
        }

        // sub menu icon size
        $sub_icon = $res_ctx->get_icon_att('sub_tdicon');
        $sub_icon_size = $res_ctx->get_shortcode_att('sub_icon_size');
        if( base64_encode( base64_decode( $sub_icon ) ) == $sub_icon ) {
            $res_ctx->load_settings_raw( 'sub_icon_svg_size', $sub_icon_size );
            if( $sub_icon_size != '' && is_numeric( $sub_icon_size ) ) {
                $res_ctx->load_settings_raw( 'sub_icon_svg_size', $sub_icon_size . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'sub_icon_size', $sub_icon_size );
            if( $sub_icon_size != '' && is_numeric( $sub_icon_size ) ) {
                $res_ctx->load_settings_raw( 'sub_icon_size', $sub_icon_size . 'px' );
            }
        }
        // sub menu icon space
        $sub_icon_space = $res_ctx->get_shortcode_att('sub_icon_space');
        if( $sub_icon_space != '' && is_numeric( $sub_icon_space ) ) {
            $res_ctx->load_settings_raw( 'sub_icon_space', $sub_icon_space . 'px' );
        }
        // sub menu icon position
        $sub_icon_pos = $res_ctx->get_shortcode_att('sub_icon_pos');
        if( $sub_icon_pos == 'text' ) {
            $res_ctx->load_settings_raw( 'sub_icon_pos_text', 1 );
        } else {
            $res_ctx->load_settings_raw( 'sub_icon_pos_list', 1 );
        }
        // sub menu icon vertical align
        $res_ctx->load_settings_raw( 'sub_icon_align', $res_ctx->get_shortcode_att('sub_icon_align') . 'px' );

        // colors
        $res_ctx->load_settings_raw( 'sub_bg_color', $res_ctx->get_shortcode_att('sub_bg_color') );
        $sub_border_size = $res_ctx->get_shortcode_att('sub_border_size');
        $res_ctx->load_settings_raw( 'sub_border_size', $sub_border_size );
        if( $sub_border_size != '' && is_numeric( $sub_border_size ) ) {
            $res_ctx->load_settings_raw( 'sub_border_size', $sub_border_size . 'px' );
        }
        $res_ctx->load_settings_raw( 'sub_border_color', $res_ctx->get_shortcode_att('sub_border_color') );
        $res_ctx->load_settings_raw( 'sub_elem_bg_color', $res_ctx->get_shortcode_att('sub_elem_bg_color') );
        $res_ctx->load_settings_raw( 'sub_text_color', $res_ctx->get_shortcode_att('sub_text_color') );
        $res_ctx->load_settings_raw( 'sub_color', $res_ctx->get_shortcode_att('sub_color') );
        $res_ctx->load_shadow_settings( 4, 1, 1, 0, 'rgba(0, 0, 0, 0.15)', 'sub_shadow' );

        // fonts
        $res_ctx->load_font_settings( 'f_sub_elem' );



        /*-- MEGA MENU -- */
        // mega menu width
        $mm_width = $res_ctx->get_shortcode_att('mm_width');
        $mm_align_screen = $res_ctx->get_shortcode_att('mm_align_screen');
        if( $mm_align_screen == '' ) {
            $res_ctx->load_settings_raw( 'mm_width', $mm_width );
            if( $mm_width != '' && is_numeric( $mm_width ) ) {
                $res_ctx->load_settings_raw( 'mm_width', $mm_width . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'mm_width_with_ul', $mm_width );
            if( $mm_width != '' && is_numeric( $mm_width ) ) {
                $res_ctx->load_settings_raw( 'mm_width_with_ul', $mm_width . 'px' );
            }
        }

        // mega menu content width
        $mm_content_width = $res_ctx->get_shortcode_att('mm_content_width');
        $res_ctx->load_settings_raw( 'mm_content_width', $mm_content_width );
        if( $mm_content_width != '' && is_numeric( $mm_content_width ) ) {
            $res_ctx->load_settings_raw( 'mm_content_width', $mm_content_width . 'px' );
        }

        // mega menu height
        $mm_height = $res_ctx->get_shortcode_att('mm_height');
        $res_ctx->load_settings_raw( 'mm_height', $mm_height );
        if( $mm_height != '' && is_numeric( $mm_height ) ) {
            $res_ctx->load_settings_raw( 'mm_height', $mm_height . 'px' );
        }

        // mega menu horizontal align
        $mm_align_screen = $res_ctx->get_shortcode_att('mm_align_screen');
        $mm_align_horiz = $res_ctx->get_shortcode_att('mm_align_horiz');
        if( $mm_align_screen == 'yes' ) {
            if ( $mm_align_horiz == 'content-horiz-left' ) {
                $res_ctx->load_settings_raw( 'mm_align_horiz_align_left2', 1 );
            } else if ( $mm_align_horiz == 'content-horiz-right' ) {
                $res_ctx->load_settings_raw( 'mm_align_horiz_align_right2', 1 );
            }
        } else {
            if ( $mm_align_horiz == 'content-horiz-left' ) {
                $res_ctx->load_settings_raw( 'mm_align_horiz_align_left', 1 );
            } else if ( $mm_align_horiz == 'content-horiz-right' ) {
                $res_ctx->load_settings_raw( 'mm_align_horiz_align_right', 1 );
            }
        }

        // mega menu offset
        $mm_offset = $res_ctx->get_shortcode_att('mm_offset');
        if( $mm_offset != '' && is_numeric( $mm_offset ) ) {
            $res_ctx->load_settings_raw( 'mm_offset', $mm_offset . 'px' );
        }

        // mega menu border size
        $mm_border_size = $res_ctx->get_shortcode_att('mm_border_size');
        $res_ctx->load_settings_raw( 'mm_border_size', $mm_border_size );
        if( $mm_border_size != '' && is_numeric( $mm_border_size ) ) {
            $res_ctx->load_settings_raw( 'mm_border_size', $mm_border_size . 'px' );
        }


        // colors
        $res_ctx->load_settings_raw( 'mm_bg', $res_ctx->get_shortcode_att('mm_bg') );
        $res_ctx->load_settings_raw( 'mm_border_color', $res_ctx->get_shortcode_att('mm_border_color') );
        $res_ctx->load_shadow_settings( 6, 0, 2, 0, 'rgba(0, 0, 0, 0.1)', 'mm_shadow' );

        // hover opacity
        $res_ctx->load_settings_raw( 'hover_opacity', $res_ctx->get_shortcode_att('hover_opacity') );

    }

    function render($atts, $content = null) {

        self::disable_loop_block_features();

        parent::render($atts);

        if (td_global::get_in_menu() && (td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax())) {

            $buffy = '';
            $buffy .= $this->get_block_js();

            $buffy .= '<div class="' . $this->get_block_classes()  . ' tdb-header-align" ' . $this->get_block_html_atts() . ' style=" z-index: 999;">';
            $buffy .= '<div id=' . $this->block_uid . ' class="td_block_inner td-fix-index">';
            $buffy .= td_util::get_block_error( 'Header Main Menu', 'Render stoped in Composer - you are already in a menu' );
            $buffy .= '</div>';

            $buffy .= '</div>';

            td_global::set_in_menu( false );

            return $buffy;
        }

        td_global::set_in_menu(true);



        global $tdb_state_single, $tdb_state_category, $tdb_state_single_page;

        switch( tdb_state_template::get_template_type() ) {
            case 'cpt':
            case 'single':

                // The flag that inform composer do not parse the menu content, is set
                td_global::set_in_element( true );
                $state_menu = $tdb_state_single->menu->__invoke( $this->get_all_atts() );
                td_global::set_in_element( false );
                break;

            case 'category':

                // The flag that inform composer do not parse the menu content, is set
                td_global::set_in_element( true );
                $state_menu = $tdb_state_category->menu->__invoke( $this->get_all_atts() );
                td_global::set_in_element( false );
                break;

            case 'page':

                // The flag that inform composer do not parse the menu content, is set
                td_global::set_in_element( true );
                $state_menu = $tdb_state_single_page->menu->__invoke( $this->get_all_atts() );
                td_global::set_in_element( false );
                break;
        }

        // id we're on td composer
        if ( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ){
//            echo '<pre>';
//            print_r();
//            echo '</pre>';
        }

        // if we're on the front end
        if ( !tdc_state::is_live_editor_ajax() && !tdc_state::is_live_editor_iframe() ) {
//            echo PHP_EOL .'<pre> tdb_block_menu atts: </pre>';
//            echo '<pre>';
//            print_r($atts);
//            echo '</pre>';
        }

        $this->unique_block_class = $this->block_uid;

        $this->shortcode_atts = shortcode_atts(
            array_merge(
                td_api_style::get_style_group_params( 'tds_menu_active' ),
                td_api_style::get_style_group_params( 'tds_menu_sub_active' )
            ), $atts );

        // additional classes
        $additional_classes = array();

        $tds_menu_active = $this->get_att('tds_menu_active');
        if( $tds_menu_active != '' ) {
            $additional_classes[] = $tds_menu_active;
        }
        $tds_menu_sub_active = $this->get_att('tds_menu_sub_active');
        if( $tds_menu_sub_active != '' ) {
            $additional_classes[] = $tds_menu_sub_active;
        }
        $sub_elem_inline = $this->get_att('sub_elem_inline');
        if( $sub_elem_inline != '' ) {
            $additional_classes[] = 'tdb-menu-sub-inline';
        }
        $make_inline = $this->get_att('inline');
        if( $make_inline != '' ) {
            $additional_classes[] = 'tdb-head-menu-inline';
        }
        $menu_items_in_more = $this->get_att('more');
        if( $menu_items_in_more != '' ) {
            $additional_classes[] = 'tdb-menu-items-in-more';
        }
        $mm_align_screen = $this->get_att('mm_align_screen');
        if( $mm_align_screen == 'yes' ) {
            $additional_classes[] = 'tdb-mm-align-screen';
        } else if ( $mm_align_screen == 'parent' ) {
            $additional_classes[] = 'tdb-mm-align-parent';
        }

        $buffy = '';
        $buffy .= $this->get_block_js();

        // menu id
        $menu_id = $this->get_att('menu_id');
        if( $menu_id == '' && ! empty(get_theme_mod('nav_menu_locations')['header-menu']) ) {
            $menu_id = get_theme_mod('nav_menu_locations')['header-menu'];
        }

        $buffy .= '<div class="' . $this->get_block_classes( $additional_classes )  . ' tdb-header-align" ' . $this->get_block_html_atts() . ' style=" z-index: 999;">';

        td_global::set_in_element( true );

        //get the block css
        $buffy .= $this->get_block_css();

        // Get tds_menu_active style
        $tds_menu_active = $this->get_att('tds_menu_active');
        if ( empty( $tds_menu_active ) ) {
            $tds_menu_active = td_util::get_option( 'tds_menu_active', 'tds_menu_active1' );
        }
        $tds_menu_active_instance = new $tds_menu_active( $this->shortcode_atts, $this->unique_block_class );
        $buffy .= $tds_menu_active_instance->render();

        // Get tds_menu_sub_active style
        $tds_menu_sub_active = $this->get_att('tds_menu_sub_active');
        if ( empty( $tds_menu_sub_active ) ) {
            $tds_menu_sub_active = td_util::get_option( 'tds_menu_sub_active', 'tds_menu_sub_active1' );
        }
        $tds_menu_sub_active_instance = new $tds_menu_sub_active( $this->shortcode_atts, $this->unique_block_class );
        $buffy .= $tds_menu_sub_active_instance->render();

            if ( empty( $menu_id ) ) {

                $buffy .= '<div id=' . $this->block_uid . ' class="td_block_inner td-fix-index">';
                    $buffy .= td_util::get_block_error( 'Header Main Menu', 'Render failed - please select a menu' );
                $buffy .= '</div>';

                $buffy .= '</div>';

                td_global::set_in_element( false );
                td_global::set_in_menu( false );

                return $buffy;
            }

            $buffy .= '<div id=' . $this->block_uid . ' class="td_block_inner td-fix-index">';

                // if the menu was built and comes from a state and we just need to add it to the buffer
                if ( ! empty( $state_menu ) ) {
                    $buffy .= $this->inner( $state_menu, 'state_menu' );

                    // otherwise we use the menu id and call the wp_nav_menu @see $this->inner()
                } else {

                    $buffy .= $this->inner( $menu_id );
                }

            $buffy .= '</div>';

        $buffy .= '</div>';

        td_global::set_in_element( false );
        td_global::set_in_menu( false );

        return $buffy;
    }

    function inner( $menu, $menu_type = '' ) {

        $buffy = '';
        $td_block_layout = new td_block_layout();

        $main_sub_icon = $this->get_icon_att('main_sub_tdicon');
        $main_sub_icon_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $main_sub_icon_data = 'data-td-svg-icon="' . $this->get_att('main_sub_tdicon') . '"';
        }
        $main_sub_icon_html = '';
        if( $main_sub_icon != '' ) {
            $buffy .= '<div class="tdb-main-sub-icon-fake">';
                if( base64_encode( base64_decode( $main_sub_icon ) ) == $main_sub_icon ) {
                    $main_sub_icon_html = '<span class="tdb-menu-more-subicon tdb-menu-more-subicon-svg tdb-main-sub-menu-icon" '. $main_sub_icon_data . '>' . base64_decode( $main_sub_icon ) . '</span>';
                    $buffy .= '<span class="tdb-sub-menu-icon tdb-sub-menu-icon-svg" '. $main_sub_icon_data . '>' . base64_decode( $main_sub_icon ) . '</span>';
                } else {
                    $main_sub_icon_html = '<i class="tdb-menu-more-subicon ' . $main_sub_icon . ' tdb-main-sub-menu-icon"></i>';
                    $buffy .= '<i class="tdb-sub-menu-icon ' . $main_sub_icon . ' tdb-main-sub-menu-icon"></i>';
                }
            $buffy .= '</div>';
        }

        $sub_icon = $this->get_icon_att('sub_tdicon');
        $sub_icon_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $sub_icon_data = 'data-td-svg-icon="' . $this->get_att('sub_tdicon') . '"';
        }
        if( $sub_icon != '' ) {
            $buffy .= '<div class="tdb-sub-icon-fake">';
                if( base64_encode( base64_decode( $sub_icon ) ) == $sub_icon ) {
                    $buffy .= '<span class="tdb-sub-menu-icon tdb-sub-menu-icon-svg" ' . $sub_icon_data . '>' . base64_decode( $sub_icon ) . '</span>';
                } else {
                    $buffy .= '<i class="tdb-sub-menu-icon ' . $sub_icon . '"></i>';
                }
            $buffy .= '</div>';
        }

        $sep_icon = $this->get_icon_att('sep_tdicon');
        $sep_icon_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $sep_icon_data = 'data-td-svg-icon="' . $this->get_att('sep_tdicon') . '"';
        }
        $sep_icon_html = '';
        if( $sep_icon != '' ) {
            if( base64_encode( base64_decode( $sep_icon ) ) == $sep_icon ) {
                $sep_icon_html = '<span class="tdb-menu-sep tdb-menu-sep-svg" ' . $sep_icon_data . '>' . base64_decode( $sep_icon ) . '</span>';
            } else {
                $sep_icon_html = '<i class="tdb-menu-sep ' . $sep_icon . '"></i>';
            }
        }

        $more_txt = $this->get_att('more_txt');
        $more_icon = $this->get_icon_att('more_tdicon');
        $more_icon_data = '';
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $more_icon_data = 'data-td-svg-icon="' . $this->get_att('more_tdicon') . '"';
        }
        $more_icon_html = '';
        if( $more_icon != '' ) {
            if( base64_encode( base64_decode( $more_icon ) ) == $more_icon ) {
                $more_icon_html = '<span class="tdb-menu-more-icon tdb-menu-more-icon-svg" ' . $more_icon_data . '>' . base64_decode( $more_icon ) . '</span>';
            } else {
                $more_icon_html = '<i class="tdb-menu-more-icon ' . $more_icon . '"></i>';
            }
        }

        // menu pulldown
        $pulldown = ( $this->get_att('more') != '' ) ? true : false;

        // the menu was already built in the state
        if ( $menu_type == 'state_menu' ) {

            if ( $pulldown ) {
                $buffy .= '<div class="tdb-menu-items-pulldown tdb-menu-items-pulldown-inactive">';

                $buffy .= $menu;

                    // menu items dropdown list
                    $buffy .= '<div class="tdb-menu-items-dropdown">';

                        $buffy .= $sep_icon_html;

                        $buffy .= '<div class="td-subcat-more">';
                            $buffy .= '<span class="tdb-menu-item-text">';
                                if( $more_icon == '' ) {
                                        $buffy .= $more_txt != '' ? $more_txt : 'More';
                                    $buffy .= '</span>';

                                    $buffy .= $main_sub_icon_html;
                                } else {
                                        $buffy .= $more_icon_html;
                                    $buffy .= '</span>';
                                }

                            $buffy .= '<ul class="td-pulldown-filter-list"></ul>';
                        $buffy .= '</div>';

                    $buffy .= '</div>'; // ./tdb-menu-items-dropdown
                $buffy .= '</div>'; // ./tdb-menu-items-pulldown
            } else {
                $buffy .= $menu;
            }

            ob_start();
            ?>
            <script>
                /* global jQuery:{} */
                jQuery().ready(function () {

                    var tdbMenuItem = new tdbMenu.item();
                    tdbMenuItem.blockUid = '<?php echo $this->block_uid; ?>';
                    tdbMenuItem.jqueryObj = jQuery('.<?php echo $this->block_uid ?>');

	                <?php if( $this->get_att('mm_align_screen') == 'yes' ) { ?>

                    tdbMenuItem.isMegaMenuFull = true;

	                <?php } ?>

	                <?php if( $this->get_att('mm_align_screen') == '' || $this->get_att('mm_align_screen') == 'parent' ) { ; ?>

                    tdbMenuItem.isMegaMenuParentPos = true;

	                <?php } ?>

	                <?php
	                if (tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) {
	                ?>
                    tdbMenuItem.inComposer = true;
	                <?php
	                }
	                ?>

                    tdbMenu.addItem(tdbMenuItem);

                });
            </script>
            <?php
            td_js_buffer::add_to_footer( "\n" . td_util::remove_script_tag( ob_get_clean() ) );

        // built the menu here using its id
        } else {
            $tdb_menu_instance = tdb_menu::get_instance( $this->get_all_atts() );

            add_filter( 'wp_nav_menu_objects', array( $tdb_menu_instance, 'hook_wp_nav_menu_objects' ), 10, 2 );

            ob_start();

            wp_nav_menu(
                array(
                    'menu' => $menu,
                    'menu_id'=> '',
                    'container' => false,
                    'menu_class'=> 'tdb-block-menu tdb-menu tdb-menu-items-visible',
                    'walker' => new tdb_tagdiv_walker_nav_menu($this->get_all_atts()),
                    'fallback_cb' => function(){
                        echo 'No menu items!';
                    }
                )
            );

            remove_filter( 'wp_nav_menu_objects', array( $tdb_menu_instance, 'hook_wp_nav_menu_objects' ) );

            if ( $pulldown ) {
                $buffy .= '<div class="tdb-menu-items-pulldown tdb-menu-items-pulldown-inactive">';

                    $buffy .= ob_get_clean();

                    // menu items dropdown list
                    $buffy .= '<div class="tdb-menu-items-dropdown">';

                        $buffy .= $sep_icon_html;

                        $buffy .= '<div class="td-subcat-more">';
                            $buffy .= '<div class="tdb-menu-item-text">';
                            if( $more_icon == '' ) {
                                    $buffy .= $more_txt != '' ? $more_txt : 'More';
                                $buffy .= '</div>';

                                $buffy .= $main_sub_icon_html;
                            } else {
                                    $buffy .= $more_icon_html;
                                $buffy .= '</div>';
                            }

                            $buffy .= '<ul class="td-pulldown-filter-list"></ul>';
                        $buffy .= '</div>';

                    $buffy .= '</div>'; // ./tdb-menu-items-dropdown
                $buffy .= '</div>'; // ./tdb-menu-items-pulldown
            } else {
                $buffy .= ob_get_clean();
            }

            ob_start();

            ?>
            <script>
                /* global jQuery:{} */
                jQuery(window).on( 'load', function () {

                    var tdbMenuItem = new tdbMenu.item();
                    tdbMenuItem.blockUid = '<?php echo $this->block_uid; ?>';
                    tdbMenuItem.jqueryObj = jQuery('.<?php echo $this->block_uid ?>');

	                <?php if( $this->get_att('mm_align_screen') == 'yes' ) { ?>

                    tdbMenuItem.isMegaMenuFull = true;

	                <?php } ?>

	                <?php if( $this->get_att('mm_align_screen') == '' || $this->get_att('mm_align_screen') == 'parent' ) { ; ?>

                    tdbMenuItem.isMegaMenuParentPos = true;

	                <?php } ?>

	                <?php
	                if (tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) {
	                ?>
                    tdbMenuItem.inComposer = true;
	                <?php
	                }
	                ?>

                    tdbMenu.addItem(tdbMenuItem);

                });
            </script>
            <?php

            td_js_buffer::add_to_footer( "\n" . td_util::remove_script_tag( ob_get_clean() ) );

        }

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

                var tdbMenuItem = new tdbMenu.item();
                tdbMenuItem.blockUid = '<?php echo $this->block_uid; ?>';
                tdbMenuItem.jqueryObj = jQuery('.<?php echo $this->block_uid ?>');

	            <?php if( $this->get_att('mm_align_screen') == 'yes' ) { ?>

                tdbMenuItem.isMegaMenuFull = true;

	            <?php } ?>

	            <?php if( $this->get_att('mm_align_screen') == '' || $this->get_att('mm_align_screen') == 'parent' ) { ; ?>

                tdbMenuItem.isMegaMenuParentPos = true;

	            <?php } ?>

	            <?php
	            if (tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) {
	            ?>
                tdbMenuItem.inComposer = true;
	            <?php
	            }
	            ?>

                tdbMenu.addItem(tdbMenuItem);

                var jquery_object_container = jQuery('.<?php echo $this->block_uid ?>');

                if ( jquery_object_container.length && jquery_object_container.hasClass('tdb-menu-items-in-more') ) {

                    var blockUid = jquery_object_container.data('td-block-uid');
                    var blockMenu = jQuery( '.' + blockUid);
                    var horizontalMaxWidth = '';

                    // if we have fixed width set for the block send that width as horizontal list max width
                    if ( blockMenu.css('max-width') !== 'none' ) {
                        horizontalMaxWidth = blockMenu.css('max-width');
                    }

                    var horizontal_jquery_obj = jquery_object_container.find('.tdb-menu:first');

                    var container_jquery_obj = horizontal_jquery_obj.parents('.tdb-menu-items-pulldown:first');
                    var excluded_jquery_elements = [];

                    // add the `more` dropdown element to the exclude elements array
                    //excluded_jquery_elements.push( container_jquery_obj.find('.tdb-menu-items-dropdown') );

                    // if we have an inline display for the menu we need consider it
                    if ( blockMenu.css('display') !== undefined && blockMenu.css('display') === 'inline-block' ) {

                        // the column we operate on
                        var column = blockMenu.closest('.vc_column_container');

                        // set the container to the column
                        container_jquery_obj = column;

                        // column blocks selector
                        var a = '';
                        if ( column.find('.tdc-elements').length !== 0 ) {
                            a = '.tdc-elements';
                        } else {
                            a = '.wpb_wrapper';
                        }

                        // find all blocks from this column
                        column.find( a + ' > .td_block_wrap' ).each( function (index,element) {

                            // calculate the percent from column's width
                            var percentOfColumnWidth = ( 90/100 ) * column.outerWidth( true );

                            // the block element width
                            var elementWidth = jQuery(this).outerWidth( true );

                            // we exclude the menu block
                            if ( jQuery(this).data('td-block-uid') !== blockUid ) {

                                // if the block takes more than 90% of column's width we don't consider it
                                if ( elementWidth < percentOfColumnWidth ) {
                                    excluded_jquery_elements.push(jQuery(this));
                                } else {
                                    return false;
                                }
                            }
                        });
                    }

                    if ( horizontal_jquery_obj.length ) {
                        var pulldown_item_obj = new tdPullDown.item();

                        pulldown_item_obj.blockUid = blockUid;
                        pulldown_item_obj.horizontal_jquery_obj = horizontal_jquery_obj;
                        pulldown_item_obj.vertical_jquery_obj = jquery_object_container.find('.tdb-menu-items-dropdown:first');
                        pulldown_item_obj.horizontal_element_css_class = 'tdb-menu-item-button';
                        pulldown_item_obj.horizontal_no_items_css_class = 'tdb-menu-items-empty';
                        pulldown_item_obj.container_jquery_obj = container_jquery_obj;
                        pulldown_item_obj.horizontal_max_width = horizontalMaxWidth;

                        // the excluded elements
                        pulldown_item_obj.excluded_jquery_elements = excluded_jquery_elements;

                        // send the main sub icon and the sub icon
                        var mainSubIcon = blockMenu.find('.tdb-main-sub-icon-fake');
                        if( mainSubIcon.length ) {
                            pulldown_item_obj.main_sub_icon = mainSubIcon.html();
                        }
                        var subIcon = blockMenu.find('.tdb-sub-icon-fake');
                        if( subIcon.length ) {
                            pulldown_item_obj.sub_icon = subIcon.html();
                        }

                        tdPullDown.add_item(pulldown_item_obj);
                    }

                    if( horizontal_jquery_obj.parents('.tdb-menu-items-pulldown:first').hasClass('tdb-menu-items-pulldown-inactive') ) {
                        horizontal_jquery_obj.parents('.tdb-menu-items-pulldown:first').removeClass('tdb-menu-items-pulldown-inactive');
                    }
                }

            })();


        </script>
        <?php

        return $buffy . td_util::remove_script_tag( ob_get_clean() );
    }

}
