<?php

/**
 * post smart_lists block, used to show the post smart_lists
 */

class tdb_single_smartlist extends td_block {

    public function get_custom_css() {
        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $in_composer = td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax();
        $in_element = td_global::get_in_element();
        $unique_block_class_prefix = '';
        if( $in_element || $in_composer ) {
            $unique_block_class_prefix = 'tdc-row .';

            if( $in_element && $in_composer ) {
                $unique_block_class_prefix = 'tdc-row-composer .';
            }
        }
        $unique_block_class = $unique_block_class_prefix . $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>
                /* @tdb_smart_list_1 */
                .tdb_smart_list_1 .tdb-sml-current-item-nr,
                .tdb_smart_list_1 .tdb-sml-current-item-title {
                  display: table-cell;
                }
                .tdb_smart_list_1 .tdb-sml-current-item-title {
                  vertical-align: middle;
                }
                .tdb_smart_list_1 {
                  margin-top: 38px;
                }
                .tdb_smart_list_1 .tdb-item {
                  margin-bottom: 53px;
                }
                .tdb_smart_list_1 .tdb-number-and-title {
                  margin-bottom: 21px;
                  position: relative;
                }
                .tdb_smart_list_1 h1,
                .tdb_smart_list_1 h2,
                .tdb_smart_list_1 h3,
                .tdb_smart_list_1 h4,
                .tdb_smart_list_1 h5,
                .tdb_smart_list_1 h6 {
                  margin: 2px 0 0;
                }
                .tdb_smart_list_1 .tdb-sml-current-item-nr span {
                  min-width: 37px;
                  min-height: 37px;
                  font-size: 22px;
                  line-height: 37px;
                }
                .tdb_smart_list_1 .tdb-sml-current-item-title {
                  width: 100%;
                  padding-left: 19px;
                  font-size: 22px;
                  line-height: 26px;
                }
                
                /* @tdb_smart_list_2 */
                .tdb_smart_list_2 .tdb-sml-current-item-nr,
                .tdb_smart_list_2 .tdb-sml-current-item-title {
                  display: table-cell;
                }
                .tdb_smart_list_2 .tdb-sml-current-item-title {
                  vertical-align: middle;
                }
                .tdb_smart_list_2 .tdb-item {
                  width: 100%;
                  padding: 30px 0;
                  border-bottom: 1px solid #ededed;
                }
                .tdb_smart_list_2 .tdb-item:first-child {
                  padding-top: 9px;
                }
                .tdb_smart_list_2 .tdb-item:last-of-type {
                  border-bottom: none;
                }
                .tdb_smart_list_2 .tdb-sml-current-item-nr span {
                  font-size: 18px;
                  min-width: 32px;
                  min-height: 32px;
                  line-height: 32px;
                }
                .tdb_smart_list_2 .tdb-sml-current-item-title {
                  font-size: 18px;
                  line-height: 24px;
                  padding-left: 14px;
                }
                .tdb_smart_list_2 .tdb-sml-figure {
                  vertical-align: top;
                  width: 150px;
                }
                .tdb_smart_list_2 .tdb-sml-caption {
                  line-height: 14px;
                  margin-bottom: 0;
                }
                .tdb_smart_list_2 .tdb-sml-description {
                  margin-top: 11px;
                }
                @media (min-width: 768px) {
                  .tdb_smart_list_2 .tdb-item {
                    display: flex;
                  }
                  .tdb_smart_list_2 .tdb-sml-info,
                  .tdb_smart_list_2 .tdb-sml-figure {
                    display: table-cell;
                  }
                  .tdb_smart_list_2 .tdb-sml-info {
                    flex: 1;
                    padding-right: 20px;
                  }
                }
                @media (max-width: 767px) {
                  .tdb_smart_list_2 {
                    text-align: center;
                  }
                  .tdb_smart_list_2 h1,
                  .tdb_smart_list_2 h2,
                  .tdb_smart_list_2 h3,
                  .tdb_smart_list_2 h4,
                  .tdb_smart_list_2 h5,
                  .tdb_smart_list_2 h6,
                  .tdb_smart_list_2 .tdb-sml-figure {
                    display: inline-block;
                  }
                }
                
                /* @tdb_smart_list_3 */
                .tdb_smart_list_3 {
                  margin-top: 38px;
                }
                .tdb_smart_list_3 .tdb-item {
                  margin-bottom: 53px;
                }
                .tdb_smart_list_3 .tdb-sml-figure,
                .tdb_smart_list_3 .tdb-slide-smart-list-figure {
                  position: relative;
                }
                .tdb_smart_list_3 figcaption div:before {
                  content: \"\";
                  position: absolute;
                  bottom: 0;
                  left: 0;
                  display: block;
                  height: 150%;
                  width: 100%;
                  background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.9) 100%);
                  background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.9) 100%);
                  z-index: -1;
                }
                .tdb_smart_list_3 figcaption div:empty {
                  display: none;
                }
                .tdb_smart_list_3 .tdb-sml-caption {
                  position: absolute;
                  bottom: 0;
                  left: 0;
                  right: 0;
                  text-align: right;
                  color: #fff;
                  margin-bottom: 0;
                  padding: 12px 16px;
                  z-index: 1;
                }
                .tdb_smart_list_3 .tdb-sml-current-item-nr {
                  position: absolute;
                  top: 0;
                  left: 0;
                  z-index: 1;
                }
                .tdb_smart_list_3 .tdb-sml-current-item-nr span {
                  background-color: rgba(0, 0, 0, 0.8);
                  min-width: 44px;
                  min-height: 44px;
                  font-family: 'Roboto', sans-serif;
                  font-size: 26px;
                  line-height: 44px;
                }
                .tdb_smart_list_3 h1,
                .tdb_smart_list_3 h2,
                .tdb_smart_list_3 h3,
                .tdb_smart_list_3 h4,
                .tdb_smart_list_3 h5,
                .tdb_smart_list_3 h6 {
                  margin: 0;
                }
                .tdb_smart_list_3 .tdb-number-and-title {
                  margin-bottom: 6px;
                  margin-top: 17px;
                }
                .tdb_smart_list_3 .tdb-sml-current-item-title {
                  font-weight: 700;
                  font-size: 22px;
                  line-height: 26px;
                }
                .tdb_smart_list_3 .tdb-sml-description {
                  margin-top: 0;
                }

                /* @tdb_smart_list_4 */
                .td-smart-list-pagination {
                  text-align: center;
                  margin-bottom: 26px;
                }
                .td-smart-list-button {
                  font-family: 'Roboto', sans-serif;
                  line-height: 40px;
                  background-color: #222;
                  color: #fff;
                  padding: 11px 24px;
                  font-size: 16px;
                  font-style: normal;
                  text-align: center;
                  -webkit-transition: background-color 0.2s ease 0s;
                  transition: background-color 0.2s ease 0s;
                  cursor: pointer;
                  margin: 0 10px;
                }
                .td-smart-list-button:hover {
                  text-decoration: none !important;
                  background-color: #4db2ec;
                }
                .td-smart-list-button .td-icon-left {
                  font-size: 14px;
                  position: relative;
                  top: 1px;
                  padding-right: 11px;
                }
                .td-smart-list-button .td-icon-right {
                  font-size: 14px;
                  position: relative;
                  top: 1px;
                  padding-left: 11px;
                }
                .td-smart-disable {
                  opacity: 0.5;
                  cursor: default;
                  -webkit-user-select: none;
                  -moz-user-select: none;
                  user-select: none;
                }
                .td-smart-disable:hover {
                  background-color: #222 !important;
                }
                .tdb_smart_list_4 .tdb-sml-current-item-nr,
                .tdb_smart_list_4 .tdb-sml-current-item-title {
                  display: table-cell;
                }
                .tdb_smart_list_4 .tdb-sml-current-item-title {
                  vertical-align: middle;
                }
                .tdb_smart_list_4 .td-a-ad > div,
                .tdb_smart_list_4 .td-a-ad .adsbygoogle,
                .tdb_smart_list_4 .td-spot-id-sm_ad .tdc-placeholder-title {
                  margin-bottom: 16px;
                }
                .tdb_smart_list_4 {
                  margin-top: 38px;
                  position: relative;
                }
                .tdb_smart_list_4 h1,
                .tdb_smart_list_4 h2,
                .tdb_smart_list_4 h3,
                .tdb_smart_list_4 h4,
                .tdb_smart_list_4 h5,
                .tdb_smart_list_4 h6 {
                  margin: 2px 0 0;
                }
                .tdb_smart_list_4 .tdb-number-and-title {
                  margin-bottom: 21px;
                }
                .tdb_smart_list_4 .tdb-sml-current-item-nr span {
                  min-width: 37px;
                  min-height: 37px;
                  font-size: 22px;
                  line-height: 37px;
                }
                .tdb_smart_list_4 .tdb-sml-current-item-title {
                  margin-top: 5px;
                  padding-left: 19px;
                  font-size: 22px;
                  line-height: 26px;
                }
                .tdb_smart_list_4 .tdb-slide-smart-list-figure {
                  text-align: center;
                  display: table;
                  margin-left: auto;
                  margin-right: auto;
                }
                .tdb_smart_list_4 .tdb-slide-smart-list-figure img {
                  width: 100%;
                }
                .tdb_smart_list_4 .tdb-sml-description {
                  margin-top: 0;
                }
                .tdb_smart_list_4 .td-smart-list-pagination {
                  margin-top: 26px;
                }
                @media (max-width: 767px) {
                  .tdb_smart_list_4 {
                    margin-top: 20px;
                  }
                  .tdb_smart_list_4 h1,
                  .tdb_smart_list_4 h2,
                  .tdb_smart_list_4 h3,
                  .tdb_smart_list_4 h4,
                  .tdb_smart_list_4 h5,
                  .tdb_smart_list_4 h6 {
                    text-align: center;
                    margin: 0;
                  }
                  .tdb_smart_list_4 .tdb-number-and-title {
                    margin-bottom: 10px;
                  }
                  .tdb_smart_list_4 .tdb-sml-current-item-nr {
                    display: inline-block;
                  }
                  .tdb_smart_list_4 .tdb-sml-current-item-title {
                    display: inline-block;
                    width: 100%;
                    margin-top: 10px;
                    padding-left: 0;
                  }
                }
                
                
                /* @tdb_smart_list_5 */
                .td-smart-list-pagination {
                  text-align: center;
                  margin-bottom: 26px;
                }
                .td-smart-list-button {
                  font-family: 'Roboto', sans-serif;
                  line-height: 40px;
                  background-color: #222;
                  color: #fff;
                  padding: 11px 24px;
                  font-size: 16px;
                  font-style: normal;
                  text-align: center;
                  -webkit-transition: background-color 0.2s ease 0s;
                  transition: background-color 0.2s ease 0s;
                  cursor: pointer;
                  margin: 0 10px;
                }
                .td-smart-list-button:hover {
                  text-decoration: none !important;
                  background-color: #4db2ec;
                }
                .td-smart-list-button .td-icon-left {
                  font-size: 14px;
                  position: relative;
                  top: 1px;
                  padding-right: 11px;
                }
                .td-smart-list-button .td-icon-right {
                  font-size: 14px;
                  position: relative;
                  top: 1px;
                  padding-left: 11px;
                }
                .td-smart-disable {
                  opacity: 0.5;
                  cursor: default;
                  -webkit-user-select: none;
                  -moz-user-select: none;
                  user-select: none;
                }
                .td-smart-disable:hover {
                  background-color: #222 !important;
                }
                .tdb_smart_list_5 {
                  margin-top: 38px;
                  position: relative;
                }
                @media (max-width: 767px) {
                  .tdb_smart_list_5 {
                    margin-top: 20px;
                  }
                }
                .tdb_smart_list_5 .td-a-ad > div,
                .tdb_smart_list_5 .td-spot-id-sm_ad .tdc-placeholder-title {
                  margin-bottom: 26px;
                }
                .tdb_smart_list_5 .td-a-ad .adsbygoogle {
                  margin-bottom: 21px;
                }
                .tdb_smart_list_5 .tdb-item .tdb-smart-list-pagination {
                  position: relative;
                  display: inline-block;
                  margin-bottom: 26px;
                }
                .tdb_smart_list_5 .tdb-sml-head {
                  position: relative;
                }
               
                .tdb_smart_list_5 h1,
                .tdb_smart_list_5 h2,
                .tdb_smart_list_5 h3,
                .tdb_smart_list_5 h4,
                .tdb_smart_list_5 h5,
                .tdb_smart_list_5 h6 {
                  margin-top: 0;
                  margin-bottom: 18px;
                  padding: 0 120px;
                  min-height: 42px;
                  text-align: center;
                  line-height: 1;
                }
                .tdb_smart_list_5 .tdb-sml-current-item-title {
                  display: inline-block;
                  margin-top: 6px;
                  margin-bottom: 8px;
                  width: 100%;
                  font-size: 22px;
                  line-height: 28px;
                }
                .tdb_smart_list_5 .tdb-sml-description {
                  margin-top: 0;
                }
                .tdb_smart_list_5 .tdb-slide-smart-list-figure img {
                  margin-top: 26px;
                  width: 100%;
                }
                .tdb_smart_list_5 .tdb-slide-smart-list-figure {
                  text-align: center;
                  display: table;
                  margin-left: auto;
                  margin-right: auto;
                }
                .tdb_smart_list_5 .tdb-sml-caption {
                  text-align: left;
                }
                .tdb_smart_list_5 .td-smart-list-pagination {
                  display: inline-block;
                  width: 100%;
                  top: 0;
                  margin-bottom: 0;
                }
                .tdb_smart_list_5 .td-smart-list-pagination .td-smart-list-button {
                  margin: 0;
                  line-height: 20px;
                }
                .tdb_smart_list_5 .td-smart-list-pagination .td-smart-back {
                  float: left;
                }
                .tdb_smart_list_5 .td-smart-list-pagination .td-smart-next {
                  float: right;
                }
                @media (min-width: 768px) and (max-width: 1018px) {
                  .tdb_smart_list_5 .tdb-sml-current-item-title {
                    margin-top: 10px;
                    line-height: 24px;
                    font-size: 19px;
                  }
                }
                @media (max-width: 767px) {
                  .tdb_smart_list_5 .tdb-item .tdb-smart-list-pagination {
                    margin-bottom: 0;
                  }
                  .tdb_smart_list_5 h1,
                  .tdb_smart_list_5 h2,
                  .tdb_smart_list_5 h3,
                  .tdb_smart_list_5 h4,
                  .tdb_smart_list_5 h5,
                  .tdb_smart_list_5 h6 {
                    margin-bottom: 0;
                    padding: 0;
                    min-height: 0;
                  }
                  .tdb_smart_list_5 .tdb-sml-current-item-title {
                    margin-top: 10px;
                    text-align: left;
                    line-height: 30px;
                    font-weight: 500;
                    font-size: 26px;
                  }
                }
                @media (min-width: 767px) {
                  .tdb_smart_list_5 .tdb-sml-head .td-smart-list-pagination {
                    position: absolute;
                    top: 50%;
                    -webkit-transform: translateY(-50%);
                    transform: translateY(-50%);
                  }
                }

                /* @tdb_smart_list_6 */
                .td-smart-list-dropdown-wrap {
                  text-align: center;
                  border: 1px solid #ededed;
                  margin-bottom: 26px;
                  clear: both;
                }
                .td-smart-list-dropdown-wrap .td-smart-list-dropdown {
                  height: 30px;
                  padding: 0 35px 0 10px;
                  margin: 10px 0;
                  overflow: hidden;
                  background-color: #fff;
                  border: none;
                  box-shadow: none;
                  -webkit-appearance: none;
                  appearance: none;
                  outline: none;
                  font-family: 'Roboto', sans-serif;
                  max-width: 40%;
                  text-overflow: ellipsis;
                  cursor: pointer;
                }
                .td-smart-list-dropdown-wrap .td-smart-list-dropdown::-ms-expand {
                  display: none;
                }
                .td-smart-list-dropdown-wrap .td-smart-list-container {
                  display: inline;
                  position: relative;
                }
                .td-smart-list-dropdown-wrap .td-smart-list-container:before {
                  content: '';
                  width: 0;
                  height: 0;
                  position: absolute;
                  top: 7px;
                  right: 16px;
                  z-index: 0;
                  border-left: 5px solid transparent;
                  border-right: 5px solid transparent;
                  border-top: 5px solid black;
                  pointer-events: none;
                }
                .td-smart-list-dropdown-wrap .td-smart-list-button {
                  font-family: 'Roboto', sans-serif;
                  line-height: 40px;
                  font-size: 16px;
                  font-style: normal;
                  text-align: center;
                  -webkit-transition: background-color 0.2s ease 0s;
                  transition: background-color 0.2s ease 0s;
                  cursor: pointer;
                  padding: 2px 18px;
                  margin: 0;
                  background-color: transparent;
                  color: inherit;
                }
                .td-smart-list-dropdown-wrap .td-smart-list-button i {
                  display: none;
                  font-size: 12px;
                  position: relative;
                  top: 1px;
                }
                .td-smart-list-dropdown-wrap .td-smart-list-button .td-icon-left {
                  padding-right: 11px;
                }
                .td-smart-list-dropdown-wrap .td-smart-list-button .td-icon-right {
                  padding-left: 11px;
                }
                .td-smart-list-dropdown-wrap .td-smart-list-button:hover {
                  text-decoration: none !important;
                  color: #4db2ec;
                }
                .td-smart-list-dropdown-wrap .td-smart-disable {
                  opacity: 0.5;
                  cursor: default;
                  -webkit-user-select: none;
                  user-select: none;
                }
                .td-smart-list-dropdown-wrap .td-smart-disable:hover {
                  color: #222;
                }
                .td-smart-list-dropdown-wrap .td-smart-next {
                  border-left: 1px solid #ededed;
                  margin-left: 3px;
                }
                .td-smart-list-dropdown-wrap .td-smart-back {
                  border-right: 1px solid #ededed;
                  margin-right: 3px;
                }
                @media (min-width: 768px) and (max-width: 1018px) {
                  .td-smart-list-dropdown-wrap .td-smart-list-dropdown {
                    max-width: 50%;
                  }
                }
                @media (max-width: 767px) {
                  .td-smart-list-dropdown-wrap .td-smart-list-dropdown {
                    text-align: center;
                    max-width: 70%;
                  }
                  .td-smart-list-dropdown-wrap .td-smart-list-dropdown option {
                    text-align: left;
                  }
                  .td-smart-list-dropdown-wrap .td-smart-list-button {
                    padding: 2px 6px;
                  }
                  .td-smart-list-dropdown-wrap .td-smart-list-button i {
                    display: inline;
                    top: 0;
                  }
                  .td-smart-list-dropdown-wrap .td-smart-list-button .td-icon-left:before {
                    content: '\\e80c';
                  }
                  .td-smart-list-dropdown-wrap .td-smart-list-button .td-icon-right:before {
                    content: '\\e80d';
                  }
                  .td-smart-list-dropdown-wrap .td-smart-list-button span {
                    display: none;
                  }
                }
                .tdb_smart_list_6 .td-a-ad > div {
                  margin-bottom: 16px;
                }
                .tdb_smart_list_6 .td-a-ad .adsbygoogle {
                  margin-bottom: 16px;
                }
                .tdb_smart_list_6 .td-spot-id-sm_ad .tdc-placeholder-title {
                  margin-bottom: 16px;
                }
                .tdb_smart_list_6 {
                  position: relative;
                }
                .tdb_smart_list_6 .tdb-number-and-title {
                  margin-bottom: 16px;
                }
                .tdb_smart_list_6 .tdb-number-and-title h1,
                .tdb_smart_list_6 .tdb-number-and-title h2,
                .tdb_smart_list_6 .tdb-number-and-title h3,
                .tdb_smart_list_6 .tdb-number-and-title h4,
                .tdb_smart_list_6 .tdb-number-and-title h5,
                .tdb_smart_list_6 .tdb-number-and-title h6 {
                  margin: 6px 0 0;
                  line-height: 32px;
                }
                .tdb_smart_list_6 .tdb-sml-current-item-title {
                  font-size: 22px;
                  line-height: 26px;
                }
                .tdb_smart_list_6 .tdb-sml-description {
                  margin-top: 0;
                  margin-bottom: 26px;
                }
                .tdb_smart_list_6 .tdb-sml-description .aligncenter {
                  margin-top: 21px;
                }
                
                /* @title_color */
				.$unique_block_class .tdb-sml-current-item-title {
					color: @title_color;
				}
                /* @counter_color */
				.$unique_block_class .tdb-sml-current-item-nr span {
					color: @counter_color;
				}
                /* @counter_bg */
				.$unique_block_class .tdb-sml-current-item-nr span {
					background-color: @counter_bg;
				}
                /* @caption_color */
				.$unique_block_class .tdb-sml-caption {
					color: @caption_color;
				}
                /* @descr_color */
				.$unique_block_class .tdb-sml-description {
					color: @descr_color;
				}
                /* @nextprev_color */
				.$unique_block_class .td-smart-list-button {
					color: @nextprev_color;
				}
                /* @nextprev_bg */
				.$unique_block_class .td-smart-list-button {
					background-color: @nextprev_bg;
				}
                /* @nextprev_h_color */
				.$unique_block_class .td-smart-list-button:hover {
					color: @nextprev_h_color;
				}
                /* @nextprev_h_bg */
				.$unique_block_class .td-smart-list-button:hover {
					background-color: @nextprev_h_bg;
				}
                /* @ad_color */
				.$unique_block_class .td-adspot-title {
					color: @ad_color;
				}
				
				
				
				/* @f_title */
				.$unique_block_class .tdb-sml-current-item-title {
					@f_title
				}
				/* @f_counter */
				.$unique_block_class .tdb-sml-current-item-nr span {
					@f_counter
				}
				/* @f_caption */
				.$unique_block_class .wp-caption-text {
					@f_caption
				}
				/* @f_descr */
				.$unique_block_class .tdb-sml-description p {
					@f_descr
				}
				/* @f_nextprev */
				.$unique_block_class .td-smart-list-button {
					@f_nextprev
				}
				/* @icon_size */
				.$unique_block_class .td-smart-list-button i {
					font-size: @icon_size;
				}
				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'style_general_sm', 1 );

        $sm_type = $res_ctx->get_shortcode_att('sm_type');
        if( $sm_type != '' ) {
            $res_ctx->load_settings_raw( $sm_type, $sm_type ); // tdb_smart_list_1 - 6
        }

        /*-- COLORS -- */
        $res_ctx->load_settings_raw( 'title_color', $res_ctx->get_shortcode_att('title_color') );
        $res_ctx->load_settings_raw( 'counter_color', $res_ctx->get_shortcode_att('counter_color') );
        $res_ctx->load_settings_raw( 'counter_bg', $res_ctx->get_shortcode_att('counter_bg') );
        $res_ctx->load_settings_raw( 'caption_color', $res_ctx->get_shortcode_att('caption_color') );
        $res_ctx->load_settings_raw( 'descr_color', $res_ctx->get_shortcode_att('descr_color') );
        $res_ctx->load_settings_raw( 'nextprev_color', $res_ctx->get_shortcode_att('nextprev_color') );
        $res_ctx->load_settings_raw( 'nextprev_bg', $res_ctx->get_shortcode_att('nextprev_bg') );
        $res_ctx->load_settings_raw( 'nextprev_h_color', $res_ctx->get_shortcode_att('nextprev_h_color') );
        $res_ctx->load_settings_raw( 'nextprev_h_bg', $res_ctx->get_shortcode_att('nextprev_h_bg') );
        $res_ctx->load_settings_raw( 'ad_color', $res_ctx->get_shortcode_att('ad_color') );

        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_title' );
        $res_ctx->load_font_settings( 'f_counter' );
        $res_ctx->load_settings_raw( 'counter_line_height',
        $res_ctx->get_shortcode_att('f_counter_font_line_height') );
        $res_ctx->load_font_settings( 'f_caption' );
        $res_ctx->load_font_settings( 'f_descr' );
        $res_ctx->load_font_settings( 'f_nextprev' );

        $icon_size = $res_ctx->get_shortcode_att('icon_size');
        if( $icon_size != '' && is_numeric( $icon_size ) ) {
            $res_ctx->load_settings_raw( 'icon_size', $icon_size . 'px' );
        }

    }

    function render($atts, $content = null) {
        parent::render( $atts ); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query)

        global $tdb_state_single;
        $post_smart_list_data = $tdb_state_single->post_smart_list->__invoke( $atts );

        $buffy = '';
        $buffy .= '<div class="' . $this->get_block_classes() . ' td-post-content tagdiv-type" ' . $this->get_block_html_atts() . '>';

        //get the block css
        $buffy .= $this->get_block_css();

        //get the js for this block
        $buffy .= $this->get_block_js();


        $buffy .= '<div class="tdb-block-inner td-fix-index">';
            $buffy .= $post_smart_list_data['smart_list_html'];
        $buffy .= '</div>';

        $buffy .= '</div>';

        return $buffy;
    }
}