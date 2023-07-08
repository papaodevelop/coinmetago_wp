<?php

/**
 * Class tds_my_account
 */

class tds_my_account extends td_block {

	public function get_custom_css() {

        // $unique_block_class
        $unique_block_class = $this->block_uid;

		$compiled_css = '';

		/** @noinspection CssInvalidAtRule */
		$raw_css =
            "<style>

                /* @style_general_tds_page_block */
                .tds-page-block {
                    transform: translateZ(0);
                    font-family: -apple-system,BlinkMacSystemFont,\"Segoe UI\",Roboto,Oxygen-Sans,Ubuntu,Cantarell,\"Helvetica Neue\",sans-serif;
                    font-size: 14px;
                }
                .tds-page-block .td-element-style {
                    z-index: -1;
                }
                .tds-s-acc-sidebar a:not(.tds-s-btn),
                .tds-s-acc-content:not(.tds-s-acc-content-custom) a:not(.tds-s-btn):not(.tds-s-pagination-item) {
                    color: #0489FC;
                }
                .tds-s-acc-sidebar a:not(.tds-s-btn):hover,
                .tds-s-acc-content:not(.tds-s-acc-content-custom) a:not(.tds-s-btn):not(.tds-s-pagination-item):hover {
                    color: #152BF7;
                }
                
                /* @style_general_tds_my_account */
                .tds_my_account .tds-my-account-wrap {
                    display: flex;
                    align-items: stretch;
                }
                @media (max-width: 767px) {
                    .tds_my_account .tds-my-account-wrap {
                        flex-direction: column;
                    }
                }
                .tds_my_account .tds-s-acc-sidebar {
                    width: 200px;
                    padding-right: 25px;
                    border-width: 0 1px 0 0;
                    border-style: solid;
                    border-color: #D0D4FE;
                }
                @media (min-width: 768px) and (max-width: 1018px) {
                    .tds_my_account .tds-s-acc-sidebar {
                        width: 170px;
                        padding-right: 15px;
                    }
                }
                @media (max-width: 767px) {
                    .tds_my_account .tds-s-acc-sidebar {
                        width: 100%;
                        padding-bottom: 35px;
                        padding-right: 0;
                        border-width: 0 0 1px;
                    }
                }
                .tds_my_account .tds-s-acc-content {
                    flex: 1;
                    padding-left: 35px;
                }
                @media (min-width: 768px) and (max-width: 1018px) {
                    .tds_my_account .tds-s-acc-content {
                        padding-left: 25px;
                    }
                }
                @media (max-width: 767px) {
                    .tds_my_account .tds-s-acc-content {
                        padding-top: 35px;
                        padding-left: 0;
                    }
                }
                .tds_my_account .tds-s-acc-content .tds-s-notif:not(:last-child) {
                    margin-bottom: 40px;
                }
                .tds_my_account .tds-s-acc-user {
                    display: flex;
                    align-items: center;
                    margin-bottom: 25px;
                }
                @media (min-width: 768px) and (max-width: 1018px) {
                    .tds_my_account .tds-s-acc-user {
                        margin-bottom: 18px;
                    }
                }
                .tds_my_account .tds-sau-avatar {
                    margin-right: 12px;
                    background-size: cover;
                    background-position: center;
                    width: 32px;
                    height: 32px;
                    border-radius: 100%;
                }
                @media (min-width: 768px) and (max-width: 1018px) {
                    .tds_my_account .tds-sau-avatar {
                        width: 26px;
                        height: 26px;
                        margin-right: 10px;
                    }
                }
                .tds_my_account .tds-sau-name {
                    flex: 1;
                    font-size: 1.286em;
                    line-height: 1.2;
                    font-weight: 600;
                    color: #1D2327;
                }
                @media (min-width: 768px) and (max-width: 1018px) {
                    .tds_my_account .tds-sau-name {
                        font-size: 1.143em;
                    }
                }
                .tds_my_account .tds-s-acc-info-form .tds-s-form-footer {
                    margin-top: 0;
                }
                .tds_my_account .tds-san-item-wrap {
                    position: relative;
                }
                .tds_my_account .tds-san-item-wrap:not(:last-child) {
                    margin-bottom: 18px;
                }
                .tds_my_account a.tds-san-item {
                    display: flex;
                    align-items: center;
                    position: relative;
                    width: 100%;
                    font-size: 1em;
                    line-height: 1.3;
                    font-weight: 600;
                    color: #1D2327;
                    transition: color .2s ease-in-out;
                }
                .tds_my_account .tds-san-item-btns {
                    display: none;
                    align-items: center;
                    position: absolute;
                    top: 50%;
                    right: 0;
                    transform: translateY(-50%);
                }
                .tds_my_account .tds-san-item-wrap:hover .tds-san-item-btns {
                    display: flex;
                }
                .tds_my_account .tds-san-item-btns a {
                    padding: 3px;
                }
                .tds_my_account .tds-san-item-btns svg {
                    display: block;
                    width: auto;
                    height: 0.786em;
                    fill: #1D2327;
                    opacity: .4;
                    transition: opacity .2s ease-in-out;
                }
                .tds_my_account .tds-san-item-btns a:hover svg {
                    opacity: 1;
                }
                @media (min-width: 768px) and (max-width: 1018px) {
                    .tds_my_account a.tds-san-item {
                        font-size: .857em;
                    }
                    .tds_my_account a.tds-san-item:not(:last-child) {
                        margin-bottom: 14px;
                    }
                }
                .tds_my_account a.tds-san-item:after {
                    content: '';
                    position: absolute;
                    top: 0;
                    right: -26px;
                    width: 3px;
                    height: 100%;
                    background-color: transparent;
                    transition: background-color .2s ease-in-out;
                }
                @media (min-width: 768px) and (max-width: 1018px) {
                    .tds_my_account a.tds-san-item:after {
                        right: -16px;
                    }
                }
                @media (max-width: 767px) {
                    .tds_my_account a.tds-san-item:after {
                        display: none;
                    }
                }
                .tds_my_account a.tds-san-item:hover {
                    color: #152BF7;
                }
                .tds_my_account a.tds-san-item:hover:after {
                    background-color: #D0D4FE;
                }
                .tds_my_account a.tds-san-item.tds-san-item-active {
                    color: #152BF7;
                }
                .tds_my_account a.tds-san-item.tds-san-item-active:after {
                    background-color: #152BF7;
                }
                .tds_my_account .tds-san-item-icon {
                    position: relative;
                    width: 26px;
                    height: 26px;
                    margin-right: 14px;
                    background-color: #F3F4FF;
                    border-radius: 2px;
                    transition: background-color .2s ease-in-out;
                }
                @media (min-width: 768px) and (max-width: 1018px) {
                    .tds_my_account .tds-san-item-icon {
                        width: 22px;
                        height: 22px;
                        margin-right: 10px;
                    }
                }
                .tds_my_account .tds-san-item-icon i,
                .tds_my_account .tds-san-item-icon svg {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                }
                .tds_my_account .tds-san-item-icon svg {
                    width: 14px;
                    height: auto;
                    fill: #7b81b9;
                    transition: stroke .2s ease-in-out, fill .2s ease-in-out;
                }
                .tds_my_account .tds-san-item-icon i {
                    font-size: 14px;
                    color: #7b81b9;
                    transition: color .2s ease-in-out;
                }
                @media (min-width: 768px) and (max-width: 1018px) {
                    .tds_my_account .tds-san-item-icon svg {
                        width: 12px;
                        height: auto;
                    }
                }
                .tds_my_account .tds-san-item:hover .tds-san-item-icon,
                .tds_my_account .tds-san-item-active .tds-san-item-icon {
                    background-color: #E5F3FF;
                }
                .tds_my_account .tds-san-item:hover .tds-san-item-icon svg,
                .tds_my_account .tds-san-item-active .tds-san-item-icon svg {
                    fill: #152BF7;
                }
                .tds_my_account .tds-san-item:hover .tds-san-item-icon i,
                .tds_my_account .tds-san-item-active .tds-san-item-icon i {
                    color: #152BF7;
                }
                .tds_my_account .tds-s-notif-acc-activation {
                    display: flex;
                    align-items: center;
                    margin-bottom: 40px;
                }
                .tds_my_account .tds-s-notif-acc-activation .tds-s-notif-descr {
                    flex: 1;
                    margin-bottom: 0;
                }
                .tds_my_account .tds-s-acc-info-form .tdb_form_file_upload {
                    padding: 0 13px;
                    width: 100%;
                }
                .tds_my_account .tds-s-acc-info-form .tdb_form_file_upload .tdb-s-form-file-box {
                    padding: 79px 15px;
                }
                .tds_my_account .tds-s-acc-info-form .tdb_form_file_upload .tdb-s-form-file-preview-image .tdb-s-ffip-img {
                    padding-bottom: 100%;
                }
                .tds_my_account .tds-s-acc-info-form .tds-account-details-right {
                    display: flex;
                    flex: 1;
                    flex-wrap: wrap;
                    width: 100%;
                    flex-direction: column;
                }
                .tds_my_account .tds-s-acc-info-form .tds-account-details-right > div {
                    display: flex;   
                }
                @media (max-width: 767px) {
                    .tds_my_account .tds-s-acc-info-form .tds-account-details-right > div {
                        flex-direction: column;
                    }
                }
                .tds_my_account .tds-s-acc-info-form .tds-account-details-right .tds-s-form-group {
                    margin-bottom: 28px;
                }
                @media (min-width: 768px) {
                    .tds_my_account .tds-s-acc-info-form .tdb_form_file_upload {
                        width: 256px;
                    }
                    .tds_my_account .tds-s-acc-info-form .tds-account-details-right .tds-s-form-group {
                        width: 50%;
                    }
                    .tds_my_account .tds-s-acc-info-form .tds-s-fc-inner > .tds-s-form-group:nth-last-of-type(-n+3) {
                        width: 33.333%;
                        margin-bottom: 0;
                    }
                }
                @media (min-width: 768px) {
                    .tds_my_account .tds-s-acc-billing-form .tds-form-group-billing-first-name,
                    .tds_my_account .tds-s-acc-billing-form .tds-form-group-billing-last-name,
                    .tds_my_account .tds-s-acc-billing-form .tds-form-group-billing-company-name,
                    .tds_my_account .tds-s-acc-billing-form .tds-form-group-billing-vat-number,
                    .tds_my_account .tds-s-acc-billing-form .tds-form-group-billing-country,
                    .tds_my_account .tds-s-acc-billing-form .tds-form-group-billing-city,
                    .tds_my_account .tds-s-acc-billing-form .tds-form-group-billing-phone,
                    .tds_my_account .tds-s-acc-billing-form .tds-form-group-billing-email {
                        width: 50%;
                    }
                    .tds_my_account .tds-s-acc-billing-form .tds-form-group-billing-county {
                        width: 65%;
                    }
                    .tds_my_account .tds-s-acc-billing-form .tds-form-group-billing-postcode {
                        width: 35%;
                    }
                    body .tds_my_account .tds-s-acc-billing-form .tds-form-group-billing-phone {
                        margin-bottom: 0;
                    }
                }
                .tds_my_account .tds-s-table-subscr .tds-s-table-row:not(:last-child) {
                    border-bottom: none;
                }
                .tds_my_account .tds-s-table-subscr .tds-s-table-row:not(:first-child) {
                    border-top: 1px solid #EBEBEB;
                }
                @media (min-width: 1019px) {
                    .tds_my_account .tds-s-table-subscr .tds-s-table-col-pp-btn-none {
                        padding-right: 0;
                    }
                    .tds_my_account .tds-s-table-subscr .tds-s-table-col-pp-btn .tds-paypal-button > div {
                        min-width: 75px !important;
                    }
                }
                @media (max-width: 1018px) {
                    .tds_my_account .tds-s-table-subscr .tds-s-table-col-pp-btn {
                        align-items: flex-start;
                    }
                    .tds_my_account .tds-s-table-subscr .tds-s-table-col-pp-btn-none {
                        display: none;
                    }
                }
                .tds_my_account .tds-s-table-subscr .tds-s-table-status-active {
                    background-color: #E2F3DF;
                    color: #317A25;
                }
                .tds_my_account .tds-s-table-subscr .tds-s-table-status-free,
                .tds_my_account .tds-s-table-subscr .tds-s-table-status-trial {
                    background-color: #FFF1B4;
                    color: #ee8302;
                }
                .tds_my_account .tds-s-table-subscr .tds-s-table-status-canceled,
                .tds_my_account .tds-s-table-subscr .tds-s-table-status-not-paid {
                    background-color: #FCE8E8;
                    color: #FF0000;
                }
                .tds_my_account .tds-s-table-subscr .tds-s-table-status-waiting {
                    background-color: #E5F3FF;
                    color: #152BF7;
                }
                .tds_my_account .tds-s-table-subscr .tds-s-table-row-extra .tds-s-list-item {
                    font-size: 1em;
                    line-height: 1.2;
                }
                @media (min-width: 1019px) {
                    .tds_my_account .tds-s-table-subscr .tds-s-table-row-extra .tds-s-tre-subscr-info {
                        flex: 1;
                    }
                    .tds_my_account .tds-s-table-subscr .tds-s-table-row-extra .tds-s-tre-pay-info {
                        width: 50%;
                    }
                }
                .tds_my_account .tds-s-table-subscr .tds-s-table-row-extra .tds-s-list-label {
                    font-weight: 400;
                }
                @media (max-width: 1018px) {
                    .tds_my_account .tds-s-table-subscr .tds-s-tre-pay-info {
                        margin-top: 24px;
                    }
                }
                .tds_my_account .tds-stripe-button {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    width: 100%;
                    height: 25px;
                    padding-bottom: 1px;
                    background-color: #635bff;
                    font-size: .923em;
                    color: #fff;
                    border-radius: 4px;
                    cursor: pointer;
                    padding: 0 10px 1px;
                }
                .tds_my_account .tds-stripe-button:hover,
                .tds_my_account .tds-s-table-row-stripe-expanded .tds-stripe-button {
                    background-color: #0a2540;
                }
                .tds_my_account .tds-s-table-row-stripe-expanded  {
                    border-bottom: none !important;
                }
                .tds_my_account .tds-s-table-row-stripe-expanded .tds-stripe-button {
                    pointer-events: none;
                    opacity: .5;
                }
                .tds_my_account #tds-payment-element {
                    position: relative;
                    min-height: 40px;
                }
                .tds_my_account #tds-payment-element:before,
                .tds_my_account #tds-payment-element:after {
                    content: '';
                    position: absolute;
                    opacity: 0;
                    transition: opacity .2s ease-in-out;
                    pointer-events: none;
                }
                .tds_my_account #tds-payment-element:before {
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(255, 255, 255, .8);
                    z-index: 1;
                }
                .tds_my_account #tds-payment-element:after {
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    margin-top: -15px;
                    margin-left: -15px;
                    width: 30px;
                    height: 30px;
                    border: 2px solid #999;
                    border-left-color: transparent;
                    border-right-color: transparent;
                    border-radius: 50%;
                    -webkit-animation: fullspin 1s infinite ease-out;
                    animation: fullspin 1s infinite ease-out;
                    z-index: 2;
                }
                .tds_my_account #tds-payment-element.loading:before,
                .tds_my_account #tds-payment-element.loading:after {
                    opacity: 1;
                    pointer-events: auto;
                }
                .tds_my_account #tds-payment-message {
                    display: none;
                    margin-top: 18px;
                    margin-bottom: 0;
                }
                .tds_my_account .tds-stripe-form-btns {
                    display: flex;
                    margin-top: 18px;
                }
                .tds_my_account .tds-stripe-form-btns button:not(:last-child) {
                    margin-right: 16px;
                }
                .tds_my_account .td-block-missing-settings {
                    width: 100%;
                }
                .tds_my_account .tds-s-acc-content-custom .tdc-row:not([class*='stretch_row_']),
                .tds_my_account .tds-s-acc-content-custom .tdc-row-composer:not([class*='stretch_row_'])  {
                    width: auto !important;
                    max-width: 1240px;
                }
                .tds_my_account .tds-s-subscr-remaining-posts {
                    display: flex;
                    flex-wrap: wrap;
                    gap: .857em;
                }
                .tds_my_account .tds-s-subscr-remaining-posts .tds-s-btn {
                    padding: 10px 19px 11px;
                    cursor: text;
                }
                .tds_my_account .tds-s-subscr-remaining-posts .tds-s-btn:hover,
                .tds_my_account .tds-s-subscr-remaining-posts .tds-s-btn:active {
                    background-color: #f3f3f3;
                }
                .tds_my_account .tds-s-subscr-remaining-posts .tds-s-btn:active {
                    outline-color: transparent;
                }
                .tds_my_account .tds-s-subscr-remaining-posts .tds-s-btn .tds-s-subscr-rp-type {
                    line-height: 0;
                }
                .tds_my_account .tds-s-subscr-remaining-posts .tds-s-btn .tds-s-subscr-rp-count {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    min-width: 17px;
                    margin-left: .769em;
                    padding: 2px 3px 3px;
                    background-color: #4c4f52;
                    font-size: .923em;
                    color: #fff;
                    border-radius: 3px;
                }
                
                
                /* @side_width */
                body .$unique_block_class .tds-s-acc-sidebar {
                    width: @side_width;
                }
                
                /* @tip_radius */
                body .$unique_block_class .tds-s-form .tds-s-form-tip-txt {
                    border-radius: @tip_radius;
                }
                
                /* @all_input_border */
                body .$unique_block_class .tds-s-form .tds-s-form-input {
                    border: @all_input_border @all_input_border_style @all_input_border_color;
                }
                body .$unique_block_class .tds-s-form .tds-s-form-check .tds-s-fc-check {
                    border: 2px solid @all_input_border_color;
                }
                /* @input_radius */
                body .$unique_block_class .tds-s-form .tds-s-form-input {
                    border-radius: @input_radius;
                }
                
                /* @btn_radius */
                body .$unique_block_class .tds-s-btn:not(.tds-s-subscr-rp-item) {
                    border-radius: @btn_radius;
                }
                
                /* @pr_radius */
                body .$unique_block_class .tds-s-subscr-rp-item {
                    border-radius: @pr_radius;
                }
                
                /* @notif_radius */
                body .$unique_block_class .tds-s-notif {
                    border-radius: @notif_radius;
                }
                
                
                /* @accent_color */
                body .$unique_block_class.tds-page-block .tds-s-acc-sidebar a:not(.tds-s-btn):not(.tds-san-item),
                body .$unique_block_class.tds-page-block .tds-s-acc-content:not(.tds-s-acc-content-custom) a:not(.tds-s-btn):not(.tds-s-pagination-item):not(.tds-san-item),
                body .$unique_block_class a.tds-san-item:hover,
                body .$unique_block_class a.tds-san-item.tds-san-item-active,
                body .$unique_block_class .tds-s-btn-hollow,
                body .$unique_block_class .tds-s-acc-info-form .tdb-s-form .tdb-s-form-file:hover .tdb-s-form-file-box,
                body .$unique_block_class .tds-s-acc-info-form .tdb-s-form .tdb-s-form-file.tdb-s-form-file-dragover .tdb-s-form-file-box {
                    color: @accent_color;
                }
                body .$unique_block_class .tds-s-btn:not(.tds-s-btn-hollow):not(.tds-s-subscr-rp-item),
                body .$unique_block_class a.tds-san-item.tds-san-item-active:after,
                body .$unique_block_class .tds-s-pagination-item.tds-s-pagination-active {
                    background-color: @accent_color;
                }
                body .$unique_block_class .tds-s-btn-hollow,
                body .$unique_block_class .tds-s-acc-info-form .tdb-s-form .tdb-s-form-file:hover .tdb-s-form-file-box,
                body .$unique_block_class .tds-s-acc-info-form .tdb-s-form .tdb-s-form-file.tdb-s-form-file-dragover .tdb-s-form-file-box {
                    border-color: @accent_color;
                }
                body .$unique_block_class .tds-s-form .tds-s-form-group:not(.tds-s-fg-error) .tds-s-form-input:focus:not([readonly]) {
                    border-color: @accent_color !important;
                }
                body .$unique_block_class .tds-s-acc-info-form .tdb-s-form .tdb-s-form-file:hover .tdb-s-ffu-ico,
                body .$unique_block_class .tds-s-acc-info-form .tdb-s-form .tdb-s-form-file.tdb-s-form-file-dragover .tdb-s-ffu-ico {
                    stroke: @accent_color;
                }
                body .$unique_block_class  .tds-san-item:hover .tds-san-item-icon svg,
                body .$unique_block_class  .tds-san-item-active .tds-san-item-icon svg {
                    fill: @accent_color;
                }
                body .$unique_block_class  .tds-san-item:hover .tds-san-item-icon i,
                body .$unique_block_class  .tds-san-item-active .tds-san-item-icon i {
                    color: @accent_color;
                }
                /* @input_outline_accent_color */
                body .$unique_block_class .tds-s-form .tds-s-form-group:not(.tds-s-fg-error) .tds-s-form-input:focus:not([readonly]),
                body .$unique_block_class .tds-s-acc-info-form .tdb-s-form .tdb-s-form-file:hover .tdb-s-form-file-box,
                body .$unique_block_class .tds-s-acc-info-form .tdb-s-form .tdb-s-form-file.tdb-s-form-file-dragover .tdb-s-form-file-box {
                    outline-color: @input_outline_accent_color;
                }
                
                /* @a_color_h */
                body .$unique_block_class.tds-page-block a:not(.tds-s-btn):not(.tds-san-item):hover {
                    color: @a_color_h;
                }
                
                /* @sec_color */
                body .$unique_block_class h2.tds-spsh-title,
                body .$unique_block_class .tds-sau-name {
                    color: @sec_color;
                }
                /* @sec_descr_color */
                body .$unique_block_class .tds-spsh-descr {
                    color: @sec_descr_color;
                }
                /* @sec_sep_color */
                body .$unique_block_class .tds-s-page-sec:not(:last-child) {
                    border-bottom-color: @sec_sep_color;
                }
                
                /* @sep_color */
                body .$unique_block_class .tds-s-acc-sidebar {
                    border-color: @sep_color;
                }
                body .$unique_block_class a.tds-san-item:hover:after {
                    background-color: @sep_color;
                }
                /* @nav_color */
                body .$unique_block_class a.tds-san-item {
                    color: @nav_color;
                }
                body .$unique_block_class .tds-san-item-btns svg {
                    fill: @nav_color;
                }
                /* @nav_ico_color */
                body .$unique_block_class .tds-san-item-icon svg {
                    fill: @nav_ico_color;
                }
                body .$unique_block_class .tds-san-item-icon i {
                    color: @nav_ico_color;
                }
                /* @nav_ico_bg */
                body .$unique_block_class .tds-san-item-icon {
                    background-color: @nav_ico_bg;
                }
                /* @nav_ico_bg_h */
                body .$unique_block_class .tds-san-item:hover .tds-san-item-icon,
                body .$unique_block_class .tds-san-item-active .tds-san-item-icon {
                    background-color: @nav_ico_bg_h;
                }
                
                /* @label_color */
                body .$unique_block_class .tds-s-form .tds-s-form-label,
                body .$unique_block_class .tds-s-form .tds-s-form-check .tds-s-fc-title,
                body .$unique_block_class .tdb_form_file_upload .tdb-s-form-label {
                    color: @label_color;
                }
                /* @tip_color */
                body .$unique_block_class .tds-s-form .tds-s-form-content .tds-s-form-tip-txt {
                    color: @tip_color;
                }
                /* @tip_bg */
                body .$unique_block_class .tds-s-form .tds-s-form-content .tds-s-form-tip-txt {
                    background-color: @tip_bg;
                }
                /* @input_color */
                body .$unique_block_class .tds-s-form .tds-s-form-input {
                    color: @input_color;
                }
                body .$unique_block_class .tds-s-form .tds-s-form-input:-webkit-autofill,
                body .$unique_block_class .tds-s-form .tds-s-form-input:-webkit-autofill:hover,
                body .$unique_block_class .tds-s-form .tds-s-form-input:-webkit-autofill:focus,
                body .$unique_block_class .tds-s-form .tds-s-form-input:-webkit-autofill:active {
                    -webkit-text-fill-color: @input_color;
                }
                /* @input_bg */
                body .$unique_block_class .tds-s-form .tds-s-form-input {
                    background-color: @input_bg;
                }
                body .$unique_block_class .tds-s-form .tds-s-form-input:-webkit-autofill,
                body .$unique_block_class .tds-s-form .tds-s-form-input:-webkit-autofill:hover,
                body .$unique_block_class .tds-s-form .tds-s-form-input:-webkit-autofill:focus,
                body .$unique_block_class .tds-s-form .tds-s-form-input:-webkit-autofill:active {
                    -webkit-box-shadow: 0 0 0 1000px @input_bg inset !important;
                }
                
                /* @tabl_border_color */
                body .$unique_block_class .tds-s-table-header,
                body .$unique_block_class .tds-s-table-row-extra-wrap:not(:last-child) {
                    border-bottom-color: @tabl_border_color;
                }
                body .$unique_block_class .tds-s-table-row:not(:first-child) {
                    border-top-color: @tabl_border_color;
                }
                /* @tabl_head_color */
                body .$unique_block_class .tds-s-table-header {
                    color: @tabl_head_color;
                }
                /* @tabl_body_color */
                body .$unique_block_class .tds-s-table-body {
                    color: @tabl_body_color;
                }
                body .$unique_block_class .tds-s-table-expand-toggle {
                    fill: @tabl_body_color;
                }
                /* @tabl_hover_bg */
                body .$unique_block_class .tds-s-table-row.tds-s-table-row-active,
                body .$unique_block_class .tds-s-table-body .tds-s-table-row:hover,
                body .$unique_block_class .tds-s-table-row-extra {
                    background-color: @tabl_hover_bg;
                }
                body .$unique_block_class .tds-s-table-row-extra {
                    background-color: @tabl_hover_bg !important;
                }
                /* @tabl_info_bg */
                body .$unique_block_class .tds-s-table-row-extra-inner {
                    background-color: @tabl_info_bg;
                }
                /* @pag_bg */
                body .$unique_block_class .tds-s-pagination-item:not(.tds-s-pagination-active) {
                    background-color: @pag_bg;
                }
                /* @pag_bg_h */
                body .$unique_block_class .tds-s-pagination-item:hover:not(.tds-s-pagination-dots):not(.tds-s-pagination-active) {
                    background-color: @pag_bg_h;
                }
                /* @pag_color */
                body .$unique_block_class .tds-s-pagination-item:not(.tds-s-pagination-active) {
                    color: @pag_color;
                }
                /* @pag_color_h */
                body .$unique_block_class .tds-s-pagination-item:hover:not(.tds-s-pagination-dots):not(.tds-s-pagination-active) {
                    color: @pag_color_h;
                }
                /* @pag_color_a */
                body .$unique_block_class .tds-s-pagination-item.tds-s-pagination-active {
                    color: @pag_color_h;
                }
                
                /* @list_label_color */
                body .$unique_block_class .tds-s-list-label {
                    color: @list_label_color;
                }
                /* @list_val_color */
                body .$unique_block_class .tds-s-list-title,
                body .$unique_block_class .tds-s-list-text {
                    color: @list_val_color;
                }
                
                /* @btn_color */
                body .$unique_block_class .tds-s-btn:not(.tds-s-subscr-rp-item) {
                    color: @btn_color;
                }
                /* @btn_color_h */
                body .$unique_block_class .tds-s-btn:not(.tds-s-subscr-rp-item):hover {
                    color: @btn_color_h;
                }
                /* @btn_bg_h */
                body .$unique_block_class .tds-s-btn:not(.tds-s-btn-hollow):not(.tds-s-subscr-rp-item):hover {
                    background-color: @btn_bg_h;
                }
                body .$unique_block_class .tds-s-btn-hollow:hover {
                    border-color: @btn_bg_h;
                }

                /* @pr_bg */
                body .$unique_block_class .tds-s-subscr-remaining-posts .tds-s-subscr-rp-item,
                body .$unique_block_class .tds-s-subscr-remaining-posts .tds-s-subscr-rp-item:hover {
                    background-color: @pr_bg;
                }
                /* @pr_type_color */
                body .$unique_block_class .tds-s-subscr-remaining-posts .tds-s-subscr-rp-item {
                    color: @pr_type_color;
                }
                /* @pr_count_bg */
                body .$unique_block_class .tds-s-subscr-remaining-posts .tds-s-subscr-rp-item .tds-s-subscr-rp-count {
                    background-color: @pr_count_bg;
                }
                /* @pr_count_color */
                body .$unique_block_class .tds-s-subscr-remaining-posts .tds-s-subscr-rp-item .tds-s-subscr-rp-count {
                    color: @pr_count_color;
                }
                
                /* @notif_info_color */
                body .$unique_block_class .tds-s-notif-info {
                    color: @notif_info_color;
                }
                /* @notif_info_bg */
                body .$unique_block_class .tds-s-notif-info {
                    background-color: @notif_info_bg;
                }
                /* @notif_succ_color */
                body .$unique_block_class .tds-s-notif-success {
                    color: @notif_succ_color;
                }
                /* @notif_succ_bg */
                body .$unique_block_class .tds-s-notif-success {
                    background-color: @notif_succ_bg;
                }
                /* @notif_error_color */
                body .$unique_block_class .tds-s-notif-error {
                    color: @notif_error_color;
                }
                /* @notif_error_bg */
                body .$unique_block_class .tds-s-notif-error {
                    background-color: @notif_error_bg;
                }
                
                
                /* @f_text */
                body .$unique_block_class,
                body .$unique_block_class .tdb_form_file_upload {
                    @f_text
                }

            </style>";

		$td_css_res_compiler = new td_css_res_compiler( $raw_css );
		$td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

		$compiled_css .= $td_css_res_compiler->compile_css();

		return $compiled_css;

	}

	static function cssMedia( $res_ctx ) {

        /*-- GENERAL STYLES -- */
        $res_ctx->load_settings_raw( 'style_general_tds_page_block', 1 );
        $res_ctx->load_settings_raw( 'style_general_tds_my_account', 1 );



        /*-- LAYOUT -- */
        // sidebar width
        $side_width = $res_ctx->get_shortcode_att('side_width');
        $res_ctx->load_settings_raw( 'side_width', $side_width );
        if( $side_width != '' && is_numeric( $side_width ) ) {
            $res_ctx->load_settings_raw( 'side_width', $side_width . 'px' );
        }


        // label tooltips border radius
        $tip_radius = $res_ctx->get_shortcode_att('tip_radius');
        $res_ctx->load_settings_raw( 'tip_radius', $tip_radius );
        if( $tip_radius != '' && is_numeric( $tip_radius ) ) {
            $res_ctx->load_settings_raw( 'tip_radius', $tip_radius . 'px' );
        }


        // inputs border size
        $all_input_border = $res_ctx->get_shortcode_att('all_input_border');
        $res_ctx->load_settings_raw( 'all_input_border', $all_input_border );
        if( $all_input_border == '' ) {
            $res_ctx->load_settings_raw( 'all_input_border', '2px' );
        } else {
            if( is_numeric( $all_input_border ) ) {
                $res_ctx->load_settings_raw( 'all_input_border', $all_input_border . 'px' );
            }
        }

        // inputs border style
        $all_input_border_style = $res_ctx->get_shortcode_att('all_input_border_style');
        if( $all_input_border_style != '' ) {
            $res_ctx->load_settings_raw( 'all_input_border_style', $all_input_border_style );
        } else {
            $res_ctx->load_settings_raw( 'all_input_border_style', 'solid' );
        }

        // inputs border radius
        $input_radius = $res_ctx->get_shortcode_att('input_radius');
        $res_ctx->load_settings_raw( 'input_radius', $input_radius );
        if( $input_radius != '' && is_numeric( $input_radius ) ) {
            $res_ctx->load_settings_raw( 'input_radius', $input_radius . 'px' );
        }


        // buttons border radius
        $btn_radius = $res_ctx->get_shortcode_att('btn_radius');
        $res_ctx->load_settings_raw( 'btn_radius', $btn_radius );
        if( $btn_radius != '' && is_numeric( $btn_radius ) ) {
            $res_ctx->load_settings_raw( 'btn_radius', $btn_radius . 'px' );
        }


        // publishing rights counters border radius
        $pr_radius = $res_ctx->get_shortcode_att('pr_radius');
        $res_ctx->load_settings_raw( 'pr_radius', $pr_radius );
        if( $pr_radius != '' && is_numeric( $pr_radius ) ) {
            $res_ctx->load_settings_raw( 'pr_radius', $pr_radius . 'px' );
        }


        // notifications border radius
        $notif_radius = $res_ctx->get_shortcode_att('notif_radius');
        $res_ctx->load_settings_raw( 'notif_radius', $notif_radius );
        if( $notif_radius != '' && is_numeric( $notif_radius ) ) {
            $res_ctx->load_settings_raw( 'notif_radius', $notif_radius . 'px' );
        }




        /*-- COLORS -- */
        $accent_color = $res_ctx->get_shortcode_att('accent_color');
        $res_ctx->load_settings_raw( 'accent_color', $accent_color );
        if( !empty( $accent_color ) ) {
            $res_ctx->load_settings_raw('input_outline_accent_color', td_util::hex2rgba($accent_color, 0.1));
        }
        $res_ctx->load_settings_raw( 'a_color_h', $res_ctx->get_shortcode_att('a_color_h') );

        $res_ctx->load_settings_raw( 'sec_color', $res_ctx->get_shortcode_att('sec_color') );
        $res_ctx->load_settings_raw( 'sec_descr_color', $res_ctx->get_shortcode_att('sec_descr_color') );
        $res_ctx->load_settings_raw( 'sec_sep_color', $res_ctx->get_shortcode_att('sec_sep_color') );

        $res_ctx->load_settings_raw( 'sep_color', $res_ctx->get_shortcode_att('sep_color') );
        $res_ctx->load_settings_raw( 'nav_color', $res_ctx->get_shortcode_att('nav_color') );
        $res_ctx->load_settings_raw( 'nav_ico_color', $res_ctx->get_shortcode_att('nav_ico_color') );
        $res_ctx->load_settings_raw( 'nav_ico_bg', $res_ctx->get_shortcode_att('nav_ico_bg') );
        $res_ctx->load_settings_raw( 'nav_ico_bg_h', $res_ctx->get_shortcode_att('nav_ico_bg_h') );

        $res_ctx->load_settings_raw( 'label_color', $res_ctx->get_shortcode_att('label_color') );
        $res_ctx->load_settings_raw( 'tip_color', $res_ctx->get_shortcode_att('tip_color') );
        $res_ctx->load_settings_raw( 'tip_bg', $res_ctx->get_shortcode_att('tip_bg') );
        $res_ctx->load_settings_raw( 'input_color', $res_ctx->get_shortcode_att('input_color') );
        $res_ctx->load_settings_raw( 'input_bg', $res_ctx->get_shortcode_att('input_bg') );
        $all_input_border_color = $res_ctx->get_shortcode_att('all_input_border_color');
        if( $all_input_border_color != '' ) {
            $res_ctx->load_settings_raw( 'all_input_border_color', $all_input_border_color );
        } else {
            $res_ctx->load_settings_raw( 'all_input_border_color', '#D7D8DE' );
        }

        $res_ctx->load_settings_raw( 'tabl_border_color', $res_ctx->get_shortcode_att('tabl_border_color') );
        $res_ctx->load_settings_raw( 'tabl_head_color', $res_ctx->get_shortcode_att('tabl_head_color') );
        $res_ctx->load_settings_raw( 'tabl_body_color', $res_ctx->get_shortcode_att('tabl_body_color') );
        $res_ctx->load_settings_raw( 'tabl_hover_bg', $res_ctx->get_shortcode_att('tabl_hover_bg') );
        $res_ctx->load_settings_raw( 'tabl_info_bg', $res_ctx->get_shortcode_att('tabl_info_bg') );
        $res_ctx->load_settings_raw( 'pag_bg', $res_ctx->get_shortcode_att('pag_bg') );
        $res_ctx->load_settings_raw( 'pag_bg_h', $res_ctx->get_shortcode_att('pag_bg_h') );
        $res_ctx->load_settings_raw( 'pag_color', $res_ctx->get_shortcode_att('pag_color') );
        $res_ctx->load_settings_raw( 'pag_color_h', $res_ctx->get_shortcode_att('pag_color_h') );
        $res_ctx->load_settings_raw( 'pag_color_a', $res_ctx->get_shortcode_att('pag_color_a') );

        $res_ctx->load_settings_raw( 'list_label_color', $res_ctx->get_shortcode_att('list_label_color') );
        $res_ctx->load_settings_raw( 'list_val_color', $res_ctx->get_shortcode_att('list_val_color') );

        $res_ctx->load_settings_raw( 'btn_color', $res_ctx->get_shortcode_att('btn_color') );
        $res_ctx->load_settings_raw( 'btn_color_h', $res_ctx->get_shortcode_att('btn_color_h') );
        $res_ctx->load_settings_raw( 'btn_bg_h', $res_ctx->get_shortcode_att('btn_bg_h') );

        $res_ctx->load_settings_raw( 'pr_bg', $res_ctx->get_shortcode_att('pr_bg') );
        $res_ctx->load_settings_raw( 'pr_type_color', $res_ctx->get_shortcode_att('pr_type_color') );
        $res_ctx->load_settings_raw( 'pr_count_bg', $res_ctx->get_shortcode_att('pr_count_bg') );
        $res_ctx->load_settings_raw( 'pr_count_color', $res_ctx->get_shortcode_att('pr_count_color') );

        $notif_info_color = $res_ctx->get_shortcode_att('notif_info_color');
        $res_ctx->load_settings_raw( 'notif_info_color', $notif_info_color );
        if( !empty( $notif_info_color ) ) {
            $res_ctx->load_settings_raw('notif_info_bg', td_util::hex2rgba($notif_info_color, 0.08));
        }

        $notif_succ_color = $res_ctx->get_shortcode_att('notif_succ_color');
        $res_ctx->load_settings_raw( 'notif_succ_color', $notif_succ_color );
        if( !empty( $notif_succ_color ) ) {
            $res_ctx->load_settings_raw('notif_succ_bg', td_util::hex2rgba($notif_succ_color, 0.1));
        }

        $notif_error_color = $res_ctx->get_shortcode_att('notif_error_color');
        $res_ctx->load_settings_raw( 'notif_error_color', $notif_error_color );
        if( !empty( $notif_error_color ) ) {
            $res_ctx->load_settings_raw('notif_error_bg', td_util::hex2rgba($notif_error_color, 0.12));
        }



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_text' );

	}

	function __construct() {
		parent::disable_loop_block_features();
	}

	function render( $atts, $content = null ) {

        parent::render( $atts );

        if ( is_user_logged_in() ) {
	        $show_validation = false;
	        $tds_validate = get_user_meta( get_current_user_id(), 'tds_validate', true );
	        if ( !empty( $tds_validate ) && is_array( $tds_validate ) && empty( $tds_validate[ 'validation_time' ] ) ) {
		        $show_validation = true;
	        }
        }

        // custom pages
        $pages_count = 7;
        $pages = array();

        for ( $i = 0; $i < $pages_count; $i++ ) {
            // page id
            $page_id = $this->get_att('page_' . $i . '_id');

            // page title
            $page_title = $this->get_att('page_' . $i . '_title');
            if( $i == 0 ) {
                $page_title = $page_title != '' ? $page_title : __td('Dashboard', TD_THEME_NAME);
            } else if( $i == 6 ) {
                $page_title = $page_title != '' ? $page_title : __td('Account details', TD_THEME_NAME);
            } else {
                $page_title = $page_title != '' ? $page_title : ( 'Page ' . $i . ' title' );
            }

            // page icon
            $page_icon = $this->get_icon_att('page_' . $i . '_tdicon');
            $page_icon_data = '';
            $page_icon_html = '';
            if( $page_icon != '' ) {
                if( base64_encode( base64_decode( $page_icon ) ) == $page_icon ) {
                    if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
                        $page_icon_data = 'data-td-svg-icon="' . $page_icon . '"';
                    }

                    $page_icon_html = base64_decode( $page_icon );
                } else {
                    $page_icon_html = '<i class="' . $page_icon . '"></i>';
                }
            } else if( $i == 0 ) {
                $page_icon_html = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" viewBox="0 0 20 22"><g transform="translate(-2 -1)"><path d="M12,1a1,1,0,0,1,.614.211l9,7A1,1,0,0,1,22,9V20a3,3,0,0,1-3,3H5a3,3,0,0,1-3-3V9a1,1,0,0,1,.386-.789l9-7A1,1,0,0,1,12,1Zm8,8.489L12,3.267,4,9.489V20a1,1,0,0,0,1,1H19a1,1,0,0,0,1-1Z"/><path d="M15,23a1,1,0,0,1-1-1V13H10v9a1,1,0,0,1-2,0V12a1,1,0,0,1,1-1h6a1,1,0,0,1,1,1V22A1,1,0,0,1,15,23Z"/></g></svg>';
            } else if( $i == 6 ) {
                $page_icon_html = '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" viewBox="0 0 18 20"><g transform="translate(-3 -2)"><path d="M20,22a1,1,0,0,1-1-1V19a3,3,0,0,0-3-3H8a3,3,0,0,0-3,3v2a1,1,0,0,1-2,0V19a5.006,5.006,0,0,1,5-5h8a5.006,5.006,0,0,1,5,5v2A1,1,0,0,1,20,22Z"></path><path d="M4-1A5,5,0,1,1-1,4,5.006,5.006,0,0,1,4-1ZM4,7A3,3,0,1,0,1,4,3,3,0,0,0,4,7Z" transform="translate(8 3)"></path></g></svg>';
            }

            // admin buttons
            $admin_btns = '';
            if( current_user_can('administrator') && $page_id != '' && get_post_type($page_id) == 'page' && null !== get_post($page_id) ) {
                $admin_btns .= '<div class="tds-san-item-btns">';
                    $admin_btns .= '<a class="tdb-sanib-view" href="' . esc_url(get_permalink($page_id)) . '" target="blank" title="View custom page"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="18" viewBox="0 0 24 18"><g transform="translate(0 -3)"><path d="M12,3a10.585,10.585,0,0,1,5.155,1.374,15.171,15.171,0,0,1,3.7,2.942,19.868,19.868,0,0,1,3.04,4.237,1,1,0,0,1,0,.894,19.868,19.868,0,0,1-3.04,4.237,15.171,15.171,0,0,1-3.7,2.942A10.585,10.585,0,0,1,12,21a10.585,10.585,0,0,1-5.155-1.374,15.171,15.171,0,0,1-3.7-2.942,19.868,19.868,0,0,1-3.04-4.237,1,1,0,0,1,0-.894,19.868,19.868,0,0,1,3.04-4.237,15.171,15.171,0,0,1,3.7-2.942A10.585,10.585,0,0,1,12,3Zm9.859,9a18.761,18.761,0,0,0-2.5-3.354C17.078,6.227,14.6,5,12,5c-5.395,0-8.925,5.391-9.859,7a18.761,18.761,0,0,0,2.5,3.354C6.922,17.773,9.4,19,12,19,17.395,19,20.925,13.609,21.859,12Z"/><path d="M3-1A4,4,0,1,1-1,3,4,4,0,0,1,3-1ZM3,5A2,2,0,1,0,1,3,2,2,0,0,0,3,5Z" transform="translate(9 9)"/></g></svg></a>';
                $admin_btns .= '</div>';
            }

            $page = array(
                'id' => $page_id,
                'title' => $page_title,
                'slug' => sanitize_title($page_title),
                'icon_data' => $page_icon_data,
                'icon_html' => $page_icon_html,
                'admin_btns' => $admin_btns,
                'dashboard_page' => $i == 0,
                'settings_page' => $i == 6
            );

            $pages[] = $page;
        }

        // flag to check if we are in composer
        $is_composer = false;
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $is_composer = true;
        }

        // show a specific version of the shortcode in composer
        $show_version_in_composer = $this->get_att('show_version');

        // show notifications in composer
        $show_notif_in_composer = $this->get_att('show_notif');

        // remove top border on Newsmag
        $block_classes = str_replace('td-pb-border-top', '', $this->get_block_classes() );

		$buffy = '<div class="tds-page-block ' . ( empty($show_validation) ? '' : ' tds-invalid-account ' )  . $block_classes . '" ' . $this->get_block_html_atts() . '>';

			$buffy .= $this->get_block_css(); // get block css
			$buffy .= $this->get_block_js(); // get block js

            $buffy .= '<div class="tds-block-inner tds-my-account-wrap">';
                if ( is_user_logged_in() || $is_composer ) {

                    $tds_dashboard_url = '#tds_dashboard';
                    $tds_subscription_url = '#tds_subscription';
                    $tds_account_details_url = '#tds_account_details';
                    $tds_logout_url = '#tds_logout';

                    $my_account_page_id = tds_util::get_tds_option('my_account_page_id');
                    if ( class_exists('SitePress') ) {
                        $translated_my_account_page_id = apply_filters('wpml_object_id', $my_account_page_id, 'page');
                        if ( !is_null($translated_my_account_page_id) ) {
                            $my_account_page_id = $translated_my_account_page_id;
                        }
                    }

                    $is_my_account_page_id = false;

                    if ( $is_composer ) {
                        if( $my_account_page_id == tdc_util::get_get_val( 'post_id' ) ) {
                            $is_my_account_page_id = true;
                        }
                    } else {
                        if( is_page($my_account_page_id) ) {
                            $is_my_account_page_id = true;
                        }
                    }

                    if ( !is_null($my_account_page_id) && $is_my_account_page_id ) {

                        $my_account_permalink = get_permalink($my_account_page_id);
                        if ( false !== $my_account_permalink ) {
                            $tds_dashboard_url = esc_url($my_account_permalink);
                            $tds_subscription_url = esc_url(add_query_arg('subscriptions', '', $my_account_permalink));
                            $tds_account_details_url = esc_url(add_query_arg('account_details', '', $my_account_permalink));
                            $tds_logout_url = esc_url(wp_logout_url($my_account_permalink));
                        }

                    } else {

                                $buffy .= td_util::get_block_error('Page Account', 'This shortcode is intended to be used on My Account page. Please set this as My Account page in ' . '<a href="' . admin_url( 'edit.php?post_type=tds_email&page=td_settings#page' ) . '" target="_blank">Opt-in Builder settings.</a>');
                            $buffy .= '</div>';
                        $buffy .= '</div>';

                        return $buffy;

                    }

                    $current_custom_page = array_filter($pages, function ($page_data) {
                        return isset( $_GET[$page_data['slug']] ) ;
                    });

                    $custom_content_class = '';
                    if (
                        !empty($current_custom_page) ||
                        (
                            ( !isset($_GET['account_details']) && !isset($_GET['subscriptions']) && empty( $current_custom_page ) ) &&
                            $pages[0]['id'] != ''
                        ) ||
                        (
                            ( isset($_GET['account_details']) || ( $is_composer && $show_version_in_composer == 'settings' ) ) &&
                            $pages[6]['id'] != ''
                        )
                    ) {
                        $custom_content_class = 'tds-s-acc-content-custom';
                    }

                    ob_start();
                    ?>

                    <div class="tds-s-acc-sidebar">
                        <div class="tds-s-acc-user">
                            <div class="tds-sau-avatar" style="background-image:url(<?php echo get_avatar_url(wp_get_current_user()->ID, ['size' => 32]) ?>)" title="<?php echo wp_get_current_user()->display_name ?>"></div>
                            <div class="tds-sau-name"><?php echo wp_get_current_user()->display_name ?></div>
                        </div>

                        <nav class="tds-s-acc-nav">
                            <div class="tds-san-item-wrap">
                                <a class="tds-san-item
                                    <?php echo (
                                        ( !isset($_GET['account_details']) && !isset($_GET['subscriptions']) && empty( $current_custom_page ) && !$is_composer )
                                        || ( $is_composer && $show_version_in_composer == '' )
                                    ) ? 'tds-san-item-active' : '' ?>"
                                   href="<?php echo $tds_dashboard_url ?>">
                                    <span class="tds-san-item-icon" <?php echo $pages[0]['icon_data'] ?>> <?php echo $pages[0]['icon_html'] ?></span>
                                    <span class="tds-san-item-txt"> <?php echo $pages[0]['title'] ?></span>
                                </a>

                                <?php echo $pages[0]['admin_btns'] ?>
                            </div>
                            <div class="tds-san-item-wrap">
                                <a class="tds-san-item
                                    <?php echo (
                                                ( isset($_GET['account_details']) )
                                                || ( $is_composer && $show_version_in_composer == 'settings' )
                                               ) ? 'tds-san-item-active' : '' ?>"
                                    href="<?php echo $tds_account_details_url ?>">
                                    <span class="tds-san-item-icon" <?php echo $pages[6]['icon_data'] ?>><?php echo $pages[6]['icon_html'] ?></span>
                                    <span class="tds-san-item-txt"><?php echo $pages[6]['title'] ?></span>
                                </a>

                                <?php echo $pages[6]['admin_btns'] ?>
                            </div>
                            <div class="tds-san-item-wrap">
                                <a class="tds-san-item
                                    <?php echo (
                                                ( isset($_GET['subscriptions']) )
                                                || ( $is_composer && $show_version_in_composer == 'subscriptions' )
                                               ) ? 'tds-san-item-active' : '' ?>"
                                    href="<?php echo $tds_subscription_url ?>">
                                    <span class="tds-san-item-icon"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="22.078" viewBox="0 0 20 22.078"><g transform="translate(-2 -1.002)"><path d="M9,6.19a1,1,0,0,1-.5-.134L-.5.866A1,1,0,0,1-.866-.5,1,1,0,0,1,.5-.866l9,5.19A1,1,0,0,1,9,6.19Z" transform="translate(7.5 4.21)"/><path d="M12,23a3,3,0,0,1-1.5-.4l-7-4A3.011,3.011,0,0,1,2,16V8A3.009,3.009,0,0,1,3.5,5.4l7-4a3,3,0,0,1,3,0l7,4A3.011,3.011,0,0,1,22,8v8a3.009,3.009,0,0,1-1.5,2.6l-7,4A3,3,0,0,1,12,23ZM12,3a1,1,0,0,0-.5.134l-7,4A1,1,0,0,0,4,8v8a1,1,0,0,0,.5.864l7,4a1,1,0,0,0,1,0l7-4A1,1,0,0,0,20,16V8a1,1,0,0,0-.5-.864l-7-4A1.006,1.006,0,0,0,12,3Z"/><path d="M12,13.01a1,1,0,0,1-.5-.134l-8.73-5.05a1,1,0,0,1,1-1.731L12,10.855l8.229-4.76a1,1,0,0,1,1,1.731l-8.73,5.05A1,1,0,0,1,12,13.01Z"/><path d="M0,11.08a1,1,0,0,1-1-1V0A1,1,0,0,1,0-1,1,1,0,0,1,1,0V10.08A1,1,0,0,1,0,11.08Z" transform="translate(12 12)"/></g></svg></span>
                                    <span class="tds-san-item-txt"><?php echo __td('Subscriptions', TD_THEME_NAME) ?></span>
                                </a>
                            </div>

                            <?php foreach ( $pages as $page_data ) {
                                if ( !$page_data['dashboard_page'] && !$page_data['settings_page'] && $page_data['id'] != '' && get_post_type($page_data['id']) == 'page' ) { ?>
                                    <div class="tds-san-item-wrap">
                                        <a class="tds-san-item
                                            <?php echo (
                                                !empty( $current_custom_page ) && $current_custom_page[key($current_custom_page)]['slug'] == $page_data['slug']
                                            ) ? 'tds-san-item-active' : '' ?>"
                                           href="<?php echo esc_url(add_query_arg($page_data['slug'], '', $my_account_permalink)) ?>">
                                            <span class="tds-san-item-icon" <?php echo $page_data['icon_data'] ?>><?php echo $page_data['icon_html'] ?></span>
                                            <span class="tds-san-item-txt"><?php echo $page_data['title'] ?></span>
                                        </a>
                                        <?php echo $page_data['admin_btns'] ?>
                                    </div>
                            <?php }
                            } ?>

                            <div class="tds-san-item-wrap">
                                <a class="tds-san-item" href="<?php echo $tds_logout_url ?>">
                                    <span class="tds-san-item-icon"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><g transform="translate(-2 -2)"><path d="M9,22H5a3,3,0,0,1-3-3V5A3,3,0,0,1,5,2H9A1,1,0,0,1,9,4H5A1,1,0,0,0,4,5V19a1,1,0,0,0,1,1H9a1,1,0,0,1,0,2Z"/><path d="M16,18a1,1,0,0,1-.707-1.707L19.586,12,15.293,7.707a1,1,0,0,1,1.414-1.414l5,5a1,1,0,0,1,0,1.414l-5,5A1,1,0,0,1,16,18Z"/><path d="M12,1H0A1,1,0,0,1-1,0,1,1,0,0,1,0-1H12a1,1,0,0,1,1,1A1,1,0,0,1,12,1Z" transform="translate(9 12)"/></g></svg></span>
                                    <span class="tds-san-item-txt"><?php echo __td('Logout', TD_THEME_NAME) ?></span>
                                </a>
                            </div>
                        </nav>
                    </div>

                    <div class="tds-s-acc-content <?php echo $custom_content_class  ?>">
                        <?php
                        if ( !empty($show_validation) ) {
                            ?>

                            <div class="tds-s-notif tds-s-notif-sm tds-s-notif-error tds-s-notif-acc-activation">
                                <div class="tds-s-notif-descr"><?php echo __td('Please activate your account by following the link sent to your email address.', TD_THEME_NAME) ?></div>
                                <!-- tds-s-notif-js was added only for translation-->
                                <div class="tds-s-notif-js" style="display: none;"><?php echo __td('A new activation link has been sent to your email address!', TD_THEME_NAME) ?></div>
                                <button class="tds-s-btn tds-s-btn-xsm tds-s-btn-red tds-resend-activation-link" data-user="<?php echo get_current_user_id() ?>"><?php echo __td('Resend activation link', TD_THEME_NAME) ?></button>
                            </div>

                            <?php
                        }

                        if( !empty($current_custom_page) ) {

                            echo $this->render_page_content( $current_custom_page[key($current_custom_page)]['id'], $current_custom_page[key($current_custom_page)]['title'] );

                        } else if ( isset($_GET['subscriptions']) || ( $is_composer && $show_version_in_composer == 'subscriptions' ) ) {
                            if ( empty($show_validation) ) {
                                td_global::set_in_element( true );
	                            echo do_shortcode( '[tds_subscription ' . ( $is_composer ? 'show_dummy="yes"' : '' ) . ' enable_pag="' . $this->get_att('enable_pag') . '" per_page="' . $this->get_att('per_page') . '"]' );
                                td_global::set_in_element( false );
                            } else {
                                ?>

                                <div class="tds-s-notif tds-s-notif-info">
                                    <div class="tds-s-notif-descr">
                                        <?php echo __td('In order to have access to this section, you have to activate your account.', TD_THEME_NAME) ?>
                                    </div>
                                </div>

                                <?php
                            }
                        } else if ( isset($_GET['account_details']) || ( $is_composer && $show_version_in_composer == 'settings' ) ) {
                            $show_notif = ( $is_composer && $show_notif_in_composer ) ? 'show_notif="yes"' : '';
                            $custom_page_id = $pages[6]['id'] != '' ? 'custom_page_id="' . $pages[6]['id'] . '"' : '';

                            td_global::set_in_element( true );
                            echo do_shortcode('[tds_account_details ' . $custom_page_id . ' ' . $show_notif  . ']');
                            td_global::set_in_element( false );

                        } else {
                            if( $pages[0]['id'] != '' ) {

                                echo $this->render_page_content( $pages[0]['id'], $pages[0]['title'], __td('Welcome to your account!', TD_THEME_NAME ) );

                            } else {

                                td_global::set_in_element( true );
                                echo do_shortcode('[tds_dashboard]');
                                td_global::set_in_element( false );

                            }
                        }

                        ?>
                    </div>

                    <?php
                    $buffy .= ob_get_clean();

                }
		    $buffy .= '</div>';
		$buffy .= '</div>';

		return $buffy;
	}

    function render_page_content ( $page_id, $page_title = '', $page_descr = '' ) {
        $buffy = '';
        $page_content = '';

        if( $page_id != '' && get_post_type($page_id) == 'page' ) {
            $page = get_post($page_id);

            if ( null !== $page ) {
                td_global::set_in_element(true);
                $page_content = $page->post_content;

                if (is_plugin_active('td-subscription/td-subscription.php') && has_filter('the_content', array(tds_email_locker::instance(), 'lock_content'))) {
                    $has_content_filter = true;
                    remove_filter('the_content', array(tds_email_locker::instance(), 'lock_content'));
                }

                $page_content = preg_replace('/\[tdm_block_popup.*?\]/i', '', $page_content);
                $page_content = apply_filters('the_content', $page_content);
                $page_content = str_replace(']]>', ']]&gt;', $page_content);

                // the has_filter check is made for plugins, like bbpress, who think it's okay to remove all filters on 'the_content'
                if (!has_filter('the_content', 'do_shortcode')) {
                    $page_content = do_shortcode($page_content);
                }

                if (!empty($has_content_filter)) {
                    add_filter('the_content', array(tds_email_locker::instance(), 'lock_content'));
                }

                td_global::set_in_element(false);
            }
        }

        $buffy .= '<div class="tds-s-page-sec tds-s-page-dashboard">';
            $buffy .= '<div class="tds-s-page-sec-header">';
                $buffy .= '<h2 class="tds-spsh-title">' . $page_title .'</h2>';
                if( $page_descr != '' ) {
                    $buffy .= '<div class="tds-spsh-descr">' . $page_descr . '</div>';
                }
            $buffy .= '</div>';

            $buffy .='<div class="tds-s-page-sec-content tds-s-page-sec-content-custom">';
                if( $page_content == '' ) {
                    $buffy .= td_util::get_block_error('Page Account', 'The page ID you entered was either not found or the page does not have any content.');
                } else {
                    $buffy .= $page_content;
                }
            $buffy .='</div>';
        $buffy .='</div>';

        return $buffy;
    }
}
