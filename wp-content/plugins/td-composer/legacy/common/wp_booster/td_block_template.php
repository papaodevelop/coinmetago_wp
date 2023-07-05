<?php
///**
// * Created by PhpStorm.
// * User: andromeda
// * Date: 1/17/2017
// * Time: 1:25 PM
// */

class td_block_template {
    /**
     * @var string the template data, it's set on construct
     */
    private $template_data_array = '';

    /**
     * @param $template_data_array array - all the data for the template
     *
                 array(
                    'atts' => $atts,
                    'block_uid' => $this->block_uid,
                    'unique_block_class' => $unique_block_class,
                    'td_pull_down_items' => $td_pull_down_items,
                )
     */
    function __construct($template_data_array) {
        $this->template_data_array = $template_data_array;
    }



    protected function get_att($att_name) {
            if (!empty($this->template_data_array['atts'][$att_name])) {

                //we need to decode the square bracket case
                $attr_value = $this->template_data_array['atts'][$att_name];
                if ( strpos($attr_value, 'td_encval') === 0 ) {
                    $attr_value = str_replace('td_encval', '', $attr_value);
                    $attr_value = base64_decode( $attr_value );
                }

                return $attr_value;
            }

        return '';
    }



    protected function get_block_uid() {
        return $this->template_data_array['block_uid'];
    }

    protected function get_unique_block_class() {
        return $this->template_data_array['unique_block_class'];
    }

    /**
     * @return bool|mixed returns false if there are no pull down items, if items are available it will return the items array
     * we need to return false because empty() does not work in php prior to 5.5 on functions :(
     */
    protected function get_td_pull_down_items() {
        if (empty($this->template_data_array['td_pull_down_items'])) {
            return false;
        }
        return $this->template_data_array['td_pull_down_items'];
    }




    protected function get_td_pull_down_item($index) {
        if (empty($this->template_data_array['td_pull_down_items'][$index])) {
            return false;
        }

        return $this->template_data_array['td_pull_down_items'][$index];
    }


    static protected function get_common_css() {
    	$raw_css =
		    "<style>
                /* @style_general_pulldown */
                .td-block-title-wrap .td-wrapper-pulldown-filter {
                    font-family: 'Roboto', sans-serif;
                    position: absolute;
                    bottom: 0;
                    right: 0;
                    top: 0;
                    margin: auto 0;
                    z-index: 2;
                    background-color: #fff;
                    font-size: 13px;
                    line-height: 1;
                    color: #777;
                    text-align: right;
                }
                .td-block-title-wrap .td-wrapper-pulldown-filter .td-pulldown-filter-display-option {
                    cursor: pointer;
                    white-space: nowrap;
                    position: relative;
                    line-height: 29px;
                }
                .td-block-title-wrap .td-wrapper-pulldown-filter .td-pulldown-filter-display-option i {
                    font-size: 9px;
                    color: #777;
                    margin-left: 20px;
                    margin-right: 10px;
                }
                .td-block-title-wrap .td-wrapper-pulldown-filter .td-pulldown-filter-display-option i:before {
                    content: '\\e83d';
                }
                .td-block-title-wrap .td-wrapper-pulldown-filter .td-pulldown-filter-display-option span {
                    padding-left: 20px;
                    margin-right: -14px;
                }
                @media (max-width: 360px) {
                    .td-block-title-wrap .td-wrapper-pulldown-filter .td-pulldown-filter-display-option span {
                        display: none;
                    }
                }
                .td-block-title-wrap .td-pulldown-filter-display-option:hover,
                .td-block-title-wrap .td-pulldown-filter-display-option:hover i {
                    color: #4db2ec;
                }
                .td-block-title-wrap .td-wrapper-pulldown-filter .td-pulldown-filter-display-option:hover ul {
                    display: block;
                }
                .td-block-title-wrap .td-wrapper-pulldown-filter .td-pulldown-filter-list {
                    list-style: none;
                    position: absolute;
                    right: 0;
                    top: 100%;
                    padding: 18px 0;
                    background-color: rgb(255, 255, 255);
                    background-color: rgba(255, 255, 255, 0.95);
                    z-index: 999;
                    border-width: 1px;
                    border-color: #ededed;
                    border-style: solid;
                    display: none;
                    margin: 0;
                }
                .td-block-title-wrap .td-wrapper-pulldown-filter .td-pulldown-filter-item {
                    list-style: none;
                    margin: 0;
                }
                .td-block-title-wrap .td-pulldown-filter-item .td-cur-simple-item {
                    color: #4db2ec;
                }
                .td-block-title-wrap .td-wrapper-pulldown-filter .td-pulldown-more {
                    padding-bottom: 10px;
                }
                .td-block-title-wrap .td-wrapper-pulldown-filter .td-pulldown-more:before {
                    content: '';
                    width: 70px;
                    height: 100%;
                    position: absolute;
                    margin-top: 2px;
                    top: 0;
                    right: 0;
                    z-index: 1;
                    opacity: 0;
                }
                .td-block-title-wrap .td-wrapper-pulldown-filter .td-pulldown-filter-link {
                    color: #777;
                    white-space: nowrap;
                    display: block;
                    line-height: 26px;
                    padding-left: 36px;
                    padding-right: 27px;
                }
                .td-block-title-wrap .td-pulldown-filter-link:hover {
                    color: #4db2ec;
                }
                @media (min-width: 768px) and (max-width: 1018px) {
                    .td-pb-span4 .td-block-title-wrap .td-wrapper-pulldown-filter .td-pulldown-filter-display-option span {
                        display: none;
                    }
                    .td-pb-span4 .td-block-title-wrap .td-wrapper-pulldown-filter .td-pulldown-filter-link {
                        padding-left: 24px;
                        padding-right: 20px !important;
                    }
                }
                
                /* @style_general_pulldown_2 */
                .td-pulldown-syle-2 {
                    top: 0;
                }
                .td-pulldown-syle-2 .td-subcat-dropdown ul {
                    padding: 20px 0;
                    margin-top: 0;
                }
                .td-pulldown-syle-2 .td-pulldown-filter-list:after {
                    content: '';
                    position: absolute;
                    width: calc(100% + 2px);
                    height: 3px;
                    top: 0;
                    left: -1px;
                    background-color: #4db2ec;
                }
                .td-pulldown-syle-2 .td-subcat-dropdown a {
                    padding-left: 40px;
                    padding-right: 31px;
                }
                .td-pulldown-syle-2 .td-subcat-dropdown:hover .td-subcat-more {
                    background-color: transparent !important;
                }
                .td-pulldown-syle-2 .td-subcat-dropdown:hover span,
                .td-pulldown-syle-2 .td-subcat-dropdown:hover i {
                    color: #4db2ec;
                }
                .td-pulldown-syle-2 .td-subcat-dropdown .td-subcat-more {
                    margin-left: 9px;
                    margin-bottom: 8px;
                }
                .td-pulldown-syle-2 .td-subcat-list .td-subcat-item {
                    margin-left: 24px;
                }
                
                /* @style_general_pulldown_3 */
                .td-pulldown-syle-3 {
                    top: 0;
                }
                .td-pulldown-syle-3 .td-subcat-dropdown ul {
                    padding: 15px 0;
                    margin-top: -1px;
                    border-width: 1px;
                }
                .td-pulldown-syle-3 .td-subcat-dropdown a {
                    padding-left: 40px;
                    padding-right: 31px;
                }
                .td-pulldown-syle-3 .td-subcat-dropdown:hover .td-subcat-more {
                    background-color: transparent !important;
                }
                .td-pulldown-syle-3 .td-subcat-dropdown:hover span,
                .td-pulldown-syle-3 .td-subcat-dropdown:hover i {
                    color: #4db2ec;
                }
                .td-pulldown-syle-3 .td-subcat-dropdown .td-subcat-more {
                    margin-left: 9px;
                    margin-bottom: 8px;
                }
                .td-pulldown-syle-3 .td-subcat-list .td-subcat-item {
                    margin-left: 24px;
                }
            </style>";

	    return $raw_css;
    }
}
