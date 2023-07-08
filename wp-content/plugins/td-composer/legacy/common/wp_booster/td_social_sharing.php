<?php


class td_social_sharing {

	private static $show_general_css = false;

	static function get_general_css($show = false) {

		$general_css = '';

		//Mobile Theme loads its own css file
		if ( td_util::is_mobile_theme() ){
		    return;
        }

		if ('Newspaper' === TD_THEME_NAME && !td_util::tdc_is_live_editor_iframe() && !td_util::tdc_is_live_editor_ajax() && self::$show_general_css) {
			if ($show) {
				echo $general_css;
				return;
			}
			return $general_css;
		}

		ob_start();
		?>

		<style>
            .td-post-sharing-classic {
                position: relative;
                height: 20px;
            }
            .td-post-sharing {
                margin-left: -3px;
                margin-right: -3px;
                font-family: 'Open Sans', 'Open Sans Regular', sans-serif;
                z-index: 2;
                white-space: nowrap;
                opacity: 0;
            }
            .td-post-sharing.td-social-show-all {
                white-space: normal;
            }
            .td-js-loaded .td-post-sharing {
                -webkit-transition: opacity 0.3s;
                transition: opacity 0.3s;
                opacity: 1;
            }
            .td-post-sharing-classic + .td-post-sharing {
                margin-top: 15px;
                /* responsive portrait phone */
            }
            @media (max-width: 767px) {
                .td-post-sharing-classic + .td-post-sharing {
                    margin-top: 8px;
                }
            }
            .td-post-sharing-top {
                margin-bottom: 30px;
            }
            @media (max-width: 767px) {
                .td-post-sharing-top {
                    margin-bottom: 20px;
                }
            }
            .td-post-sharing-bottom {
                border-style: solid;
                border-color: #ededed;
                border-width: 1px 0;
                padding: 21px 0;
                margin-bottom: 42px;
            }
            .td-post-sharing-bottom .td-post-sharing {
                margin-bottom: -7px;
            }
            .td-post-sharing-visible,
            .td-social-sharing-hidden {
                display: inline-block;
            }
            .td-social-sharing-hidden ul {
                display: none;
            }
            .td-social-show-all .td-pulldown-filter-list {
                display: inline-block;
            }
            .td-social-network,
            .td-social-handler {
                position: relative;
                display: inline-block;
                margin: 0 3px 7px;
                height: 40px;
                min-width: 40px;
                font-size: 11px;
                text-align: center;
                vertical-align: middle;
            }
            .td-ps-notext .td-social-network .td-social-but-icon,
            .td-ps-notext .td-social-handler .td-social-but-icon {
                border-top-right-radius: 2px;
                border-bottom-right-radius: 2px;
            }
            .td-social-network {
                color: #000;
                overflow: hidden;
            }
            .td-social-network .td-social-but-icon {
                border-top-left-radius: 2px;
                border-bottom-left-radius: 2px;
            }
            .td-social-network .td-social-but-text {
                border-top-right-radius: 2px;
                border-bottom-right-radius: 2px;
            }
            .td-social-network:hover {
                opacity: 0.8 !important;
            }
            .td-social-handler {
                color: #444;
                border: 1px solid #e9e9e9;
                border-radius: 2px;
            }
            .td-social-handler .td-social-but-text {
                font-weight: 700;
            }
            .td-social-handler .td-social-but-text:before {
                background-color: #000;
                opacity: 0.08;
            }
            .td-social-share-text {
                margin-right: 18px;
            }
            .td-social-share-text:before,
            .td-social-share-text:after {
                content: '';
                position: absolute;
                top: 50%;
                -webkit-transform: translateY(-50%);
                transform: translateY(-50%);
                left: 100%;
                width: 0;
                height: 0;
                border-style: solid;
            }
            .td-social-share-text:before {
                border-width: 9px 0 9px 11px;
                border-color: transparent transparent transparent #e9e9e9;
            }
            .td-social-share-text:after {
                border-width: 8px 0 8px 10px;
                border-color: transparent transparent transparent #fff;
            }
            .td-social-but-text,
            .td-social-but-icon {
                display: inline-block;
                position: relative;
            }
            .td-social-but-icon {
                padding-left: 13px;
                padding-right: 13px;
                line-height: 40px;
                z-index: 1;
            }
            .td-social-but-icon i {
                position: relative;
                top: -1px;
                vertical-align: middle;
            }
            .td-social-but-text {
                margin-left: -6px;
                padding-left: 12px;
                padding-right: 17px;
                line-height: 40px;
            }
            .td-social-but-text:before {
                content: '';
                position: absolute;
                top: 12px;
                left: 0;
                width: 1px;
                height: 16px;
                background-color: #fff;
                opacity: 0.2;
                z-index: 1;
            }
            .td-social-handler i,
            .td-social-facebook i,
            .td-social-reddit i,
            .td-social-linkedin i,
            .td-social-tumblr i,
            .td-social-stumbleupon i,
            .td-social-vk i,
            .td-social-viber i,
            .td-social-flipboard i,
            .td-social-koo i {
                font-size: 14px;
            }
            .td-social-telegram i {
                font-size: 16px;
            }
            .td-social-mail i,
            .td-social-line i,
            .td-social-print i {
                font-size: 15px;
            }
            .td-social-handler .td-icon-share {
                top: -1px;
                left: -1px;
            }
            .td-social-twitter .td-icon-twitter {
                font-size: 12px;
            }
            .td-social-pinterest .td-icon-pinterest {
                font-size: 13px;
            }
            .td-social-whatsapp .td-icon-whatsapp,
            .td-social-kakao .td-icon-kakao {
                font-size: 18px;
            }
            .td-social-reddit .td-social-but-icon {
                padding-right: 12px;
            }
            .td-social-reddit .td-icon-reddit {
                left: -1px;
            }
            .td-social-telegram .td-social-but-icon {
                padding-right: 12px;
            }
            .td-social-telegram .td-icon-telegram {
                left: -1px;
            }
            .td-social-stumbleupon .td-social-but-icon {
                padding-right: 11px;
            }
            .td-social-stumbleupon .td-icon-stumbleupon {
                left: -2px;
            }
            .td-social-digg .td-social-but-icon {
                padding-right: 11px;
            }
            .td-social-digg .td-icon-digg {
                left: -2px;
                font-size: 17px;
            }
            .td-social-vk .td-social-but-icon {
                padding-right: 11px;
            }
            .td-social-vk .td-icon-vk {
                left: -2px;
            }
            .td-social-naver .td-icon-naver {
                left: -1px;
                font-size: 16px;
            }
            .td-social-gettr .td-icon-gettr {
                font-size: 25px;
            }
            .td-ps-notext .td-social-gettr .td-icon-gettr {
                left: -5px;
            }
            .td-social-copy_url {
                position: relative;
            }
            .td-social-copy_url-check {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                color: #fff;
                opacity: 0;
                pointer-events: none;
                transition: opacity .2s ease-in-out;
                z-index: 11;
            }
            .td-social-copy_url .td-icon-copy_url {
                left: -1px;
                font-size: 17px;
            }
            .td-social-copy_url-disabled {
                pointer-events: none;
            }
            .td-social-copy_url-disabled .td-icon-copy_url {
                opacity: 0;
            }
            .td-social-copy_url-copied .td-social-copy_url-check {
                opacity: 1;
            }
            @keyframes social_copy_url_loader {
                0% {
                    -webkit-transform: rotate(0);
                    transform: rotate(0)
                }
                100% {
                    -webkit-transform: rotate(360deg);
                    transform: rotate(360deg)
                }
            }
            .td-social-expand-tabs i {
                top: -2px;
                left: -1px;
                font-size: 16px;
            }
            @media (min-width: 767px) {
                .td-social-line,
                .td-social-viber {
                    display: none;
                }
            }
            .td-ps-bg .td-social-network {
                color: #fff;
            }
            .td-ps-bg .td-social-facebook .td-social-but-icon,
            .td-ps-bg .td-social-facebook .td-social-but-text {
                background-color: #516eab;
            }
            .td-ps-bg .td-social-twitter .td-social-but-icon,
            .td-ps-bg .td-social-twitter .td-social-but-text {
                background-color: #29c5f6;
            }
            .td-ps-bg .td-social-pinterest .td-social-but-icon,
            .td-ps-bg .td-social-pinterest .td-social-but-text {
                background-color: #ca212a;
            }
            .td-ps-bg .td-social-whatsapp .td-social-but-icon,
            .td-ps-bg .td-social-whatsapp .td-social-but-text {
                background-color: #7bbf6a;
            }
            .td-ps-bg .td-social-reddit .td-social-but-icon,
            .td-ps-bg .td-social-reddit .td-social-but-text {
                background-color: #f54200;
            }
            .td-ps-bg .td-social-mail .td-social-but-icon,
            .td-ps-bg .td-social-digg .td-social-but-icon,
            .td-ps-bg .td-social-copy_url .td-social-but-icon,
            .td-ps-bg .td-social-mail .td-social-but-text,
            .td-ps-bg .td-social-digg .td-social-but-text,
            .td-ps-bg .td-social-copy_url .td-social-but-text {
                background-color: #000;
            }
            .td-ps-bg .td-social-print .td-social-but-icon,
            .td-ps-bg .td-social-print .td-social-but-text {
                background-color: #333;
            }
            .td-ps-bg .td-social-linkedin .td-social-but-icon,
            .td-ps-bg .td-social-linkedin .td-social-but-text {
                background-color: #0266a0;
            }
            .td-ps-bg .td-social-tumblr .td-social-but-icon,
            .td-ps-bg .td-social-tumblr .td-social-but-text {
                background-color: #3e5a70;
            }
            .td-ps-bg .td-social-telegram .td-social-but-icon,
            .td-ps-bg .td-social-telegram .td-social-but-text {
                background-color: #179cde;
            }
            .td-ps-bg .td-social-stumbleupon .td-social-but-icon,
            .td-ps-bg .td-social-stumbleupon .td-social-but-text {
                background-color: #ee4813;
            }
            .td-ps-bg .td-social-vk .td-social-but-icon,
            .td-ps-bg .td-social-vk .td-social-but-text {
                background-color: #4c75a3;
            }
            .td-ps-bg .td-social-line .td-social-but-icon,
            .td-ps-bg .td-social-line .td-social-but-text {
                background-color: #00b900;
            }
            .td-ps-bg .td-social-viber .td-social-but-icon,
            .td-ps-bg .td-social-viber .td-social-but-text {
                background-color: #5d54a4;
            }
            .td-ps-bg .td-social-naver .td-social-but-icon,
            .td-ps-bg .td-social-naver .td-social-but-text {
                background-color: #3ec729;
            }
            .td-ps-bg .td-social-flipboard .td-social-but-icon,
            .td-ps-bg .td-social-flipboard .td-social-but-text {
                background-color: #f42827;
            }
            .td-ps-bg .td-social-kakao .td-social-but-icon,
            .td-ps-bg .td-social-kakao .td-social-but-text {
                background-color: #dd604a;
            }
            .td-ps-bg .td-social-gettr .td-social-but-icon,
            .td-ps-bg .td-social-gettr .td-social-but-text {
                background-color: #fc223b;
            }
            .td-ps-bg .td-social-koo .td-social-but-icon,
            .td-ps-bg .td-social-koo .td-social-but-text {
                background-color: #facd00;
            }

            .td-ps-dark-bg .td-social-network {
                color: #fff;
            }
            .td-ps-dark-bg .td-social-network .td-social-but-icon,
            .td-ps-dark-bg .td-social-network .td-social-but-text {
                background-color: #000;
            }
            .td-ps-border .td-social-network .td-social-but-icon,
            .td-ps-border .td-social-network .td-social-but-text {
                line-height: 38px;
                border-width: 1px;
                border-style: solid;
            }
            .td-ps-border .td-social-network .td-social-but-text {
                border-left-width: 0;
            }
            .td-ps-border .td-social-network .td-social-but-text:before {
                background-color: #000;
                opacity: 0.08;
            }
            .td-ps-border.td-ps-padding .td-social-network .td-social-but-icon {
                border-right-width: 0;
            }
            .td-ps-border.td-ps-padding .td-social-network.td-social-expand-tabs .td-social-but-icon {
                border-right-width: 1px;
            }
            .td-ps-border-grey .td-social-but-icon,
            .td-ps-border-grey .td-social-but-text {
                border-color: #e9e9e9;
            }
            .td-ps-border-colored .td-social-facebook .td-social-but-icon,
            .td-ps-border-colored .td-social-facebook .td-social-but-text {
                border-color: #516eab;
            }
            .td-ps-border-colored .td-social-twitter .td-social-but-icon,
            .td-ps-border-colored .td-social-twitter .td-social-but-text {
                border-color: #29c5f6;
            }
            .td-ps-border-colored .td-social-pinterest .td-social-but-icon,
            .td-ps-border-colored .td-social-pinterest .td-social-but-text {
                border-color: #ca212a;
            }
            .td-ps-border-colored .td-social-whatsapp .td-social-but-icon,
            .td-ps-border-colored .td-social-whatsapp .td-social-but-text {
                border-color: #7bbf6a;
            }
            .td-ps-border-colored .td-social-reddit .td-social-but-icon,
            .td-ps-border-colored .td-social-reddit .td-social-but-text {
                border-color: #f54200;
            }
            .td-ps-border-colored .td-social-mail .td-social-but-icon,
            .td-ps-border-colored .td-social-digg .td-social-but-icon,
            .td-ps-border-colored .td-social-copy_url .td-social-but-icon,
            .td-ps-border-colored .td-social-mail .td-social-but-text,
            .td-ps-border-colored .td-social-digg .td-social-but-text,
            .td-ps-border-colored .td-social-copy_url .td-social-but-text {
                border-color: #000;
            }
            .td-ps-border-colored .td-social-print .td-social-but-icon,
            .td-ps-border-colored .td-social-print .td-social-but-text {
                border-color: #333;
            }
            .td-ps-border-colored .td-social-linkedin .td-social-but-icon,
            .td-ps-border-colored .td-social-linkedin .td-social-but-text {
                border-color: #0266a0;
            }
            .td-ps-border-colored .td-social-tumblr .td-social-but-icon,
            .td-ps-border-colored .td-social-tumblr .td-social-but-text {
                border-color: #3e5a70;
            }
            .td-ps-border-colored .td-social-telegram .td-social-but-icon,
            .td-ps-border-colored .td-social-telegram .td-social-but-text {
                border-color: #179cde;
            }
            .td-ps-border-colored .td-social-stumbleupon .td-social-but-icon,
            .td-ps-border-colored .td-social-stumbleupon .td-social-but-text {
                border-color: #ee4813;
            }
            .td-ps-border-colored .td-social-vk .td-social-but-icon,
            .td-ps-border-colored .td-social-vk .td-social-but-text {
                border-color: #4c75a3;
            }
            .td-ps-border-colored .td-social-line .td-social-but-icon,
            .td-ps-border-colored .td-social-line .td-social-but-text {
                border-color: #00b900;
            }
            .td-ps-border-colored .td-social-viber .td-social-but-icon,
            .td-ps-border-colored .td-social-viber .td-social-but-text {
                border-color: #5d54a4;
            }
            .td-ps-border-colored .td-social-naver .td-social-but-icon,
            .td-ps-border-colored .td-social-naver .td-social-but-text {
                border-color: #3ec729;
            }
            .td-ps-border-colored .td-social-flipboard .td-social-but-icon,
            .td-ps-border-colored .td-social-flipboard .td-social-but-text {
                border-color: #f42827;
            }
            .td-ps-border-colored .td-social-kakao .td-social-but-icon,
            .td-ps-border-colored .td-social-kakao .td-social-but-text {
                border-color: #dd604a;
            }
            .td-ps-border-colored .td-social-gettr .td-social-but-icon,
            .td-ps-border-colored .td-social-gettr .td-social-but-text {
                border-color: #fc223b;
            }
            .td-ps-border-colored .td-social-koo .td-social-but-icon,
            .td-ps-border-colored .td-social-koo .td-social-but-text {
                border-color: #facd00;
            }
            .td-ps-icon-bg .td-social-but-icon {
                height: 100%;
                border-color: transparent !important;
            }
            .td-ps-icon-bg .td-social-network .td-social-but-icon {
                color: #fff;
            }
            .td-ps-icon-bg .td-social-facebook .td-social-but-icon {
                background-color: #516eab;
            }
            .td-ps-icon-bg .td-social-twitter .td-social-but-icon {
                background-color: #29c5f6;
            }
            .td-ps-icon-bg .td-social-pinterest .td-social-but-icon {
                background-color: #ca212a;
            }
            .td-ps-icon-bg .td-social-whatsapp .td-social-but-icon {
                background-color: #7bbf6a;
            }
            .td-ps-icon-bg .td-social-reddit .td-social-but-icon {
                background-color: #f54200;
            }
            .td-ps-icon-bg .td-social-mail .td-social-but-icon,
            .td-ps-icon-bg .td-social-digg .td-social-but-icon,
            .td-ps-icon-bg .td-social-copy_url .td-social-but-icon {
                background-color: #000;
            }
            .td-ps-icon-bg .td-social-print .td-social-but-icon {
                background-color: #333;
            }
            .td-ps-icon-bg .td-social-linkedin .td-social-but-icon {
                background-color: #0266a0;
            }
            .td-ps-icon-bg .td-social-tumblr .td-social-but-icon {
                background-color: #3e5a70;
            }
            .td-ps-icon-bg .td-social-telegram .td-social-but-icon {
                background-color: #179cde;
            }
            .td-ps-icon-bg .td-social-stumbleupon .td-social-but-icon {
                background-color: #ee4813;
            }
            .td-ps-icon-bg .td-social-vk .td-social-but-icon {
                background-color: #4c75a3;
            }
            .td-ps-icon-bg .td-social-line .td-social-but-icon {
                background-color: #00b900;
            }
            .td-ps-icon-bg .td-social-viber .td-social-but-icon {
                background-color: #5d54a4;
            }
            .td-ps-icon-bg .td-social-naver .td-social-but-icon {
                background-color: #3ec729;
            }
            .td-ps-icon-bg .td-social-flipboard .td-social-but-icon {
                background-color: #f42827;
            }
            .td-ps-icon-bg .td-social-kakao .td-social-but-icon {
                background-color: #dd604a;
            }
            .td-ps-icon-bg .td-social-gettr .td-social-but-icon {
                background-color: #fc223b;
            }
            .td-ps-icon-bg .td-social-koo .td-social-but-icon {
                background-color: #facd00;
            }
            .td-ps-icon-bg .td-social-but-text {
                margin-left: -3px;
            }
            .td-ps-icon-bg .td-social-network .td-social-but-text:before {
                display: none;
            }
            .td-ps-icon-arrow .td-social-network .td-social-but-icon:after {
                content: '';
                position: absolute;
                top: 50%;
                -webkit-transform: translateY(-50%);
                transform: translateY(-50%);
                left: calc(100% + 1px);
                width: 0;
                height: 0;
                border-style: solid;
                border-width: 9px 0 9px 11px;
                border-color: transparent transparent transparent #000;
            }
            .td-ps-icon-arrow .td-social-network .td-social-but-text {
                padding-left: 20px;
            }
            .td-ps-icon-arrow .td-social-network .td-social-but-text:before {
                display: none;
            }
            .td-ps-icon-arrow.td-ps-padding .td-social-network .td-social-but-icon:after {
                left: 100%;
            }
            .td-ps-icon-arrow .td-social-facebook .td-social-but-icon:after {
                border-left-color: #516eab;
            }
            .td-ps-icon-arrow .td-social-twitter .td-social-but-icon:after {
                border-left-color: #29c5f6;
            }
            .td-ps-icon-arrow .td-social-pinterest .td-social-but-icon:after {
                border-left-color: #ca212a;
            }
            .td-ps-icon-arrow .td-social-whatsapp .td-social-but-icon:after {
                border-left-color: #7bbf6a;
            }
            .td-ps-icon-arrow .td-social-reddit .td-social-but-icon:after {
                border-left-color: #f54200;
            }
            .td-ps-icon-arrow .td-social-mail .td-social-but-icon:after,
            .td-ps-icon-arrow .td-social-digg .td-social-but-icon:after,
            .td-ps-icon-arrow .td-social-copy_url .td-social-but-icon:after {
                border-left-color: #000;
            }
            .td-ps-icon-arrow .td-social-print .td-social-but-icon:after {
                border-left-color: #333;
            }
            .td-ps-icon-arrow .td-social-linkedin .td-social-but-icon:after {
                border-left-color: #0266a0;
            }
            .td-ps-icon-arrow .td-social-tumblr .td-social-but-icon:after {
                border-left-color: #3e5a70;
            }
            .td-ps-icon-arrow .td-social-telegram .td-social-but-icon:after {
                border-left-color: #179cde;
            }
            .td-ps-icon-arrow .td-social-stumbleupon .td-social-but-icon:after {
                border-left-color: #ee4813;
            }
            .td-ps-icon-arrow .td-social-vk .td-social-but-icon:after {
                border-left-color: #4c75a3;
            }
            .td-ps-icon-arrow .td-social-line .td-social-but-icon:after {
                border-left-color: #00b900;
            }
            .td-ps-icon-arrow .td-social-viber .td-social-but-icon:after {
                border-left-color: #5d54a4;
            }
            .td-ps-icon-arrow .td-social-naver .td-social-but-icon:after {
                border-left-color: #3ec729;
            }
            .td-ps-icon-arrow .td-social-flipboard .td-social-but-icon:after {
                border-left-color: #f42827;
            }
            .td-ps-icon-arrow .td-social-kakao .td-social-but-icon:after {
                border-left-color: #dd604a;
            }
            .td-ps-icon-arrow .td-social-gettr .td-social-but-icon:after {
                border-left-color: #fc223b;
            }
            .td-ps-icon-arrow .td-social-koo .td-social-but-icon:after {
                border-left-color: #facd00;
            }
            .td-ps-icon-arrow .td-social-expand-tabs .td-social-but-icon:after {
                display: none;
            }
            .td-ps-icon-color .td-social-facebook .td-social-but-icon {
                color: #516eab;
            }
            .td-ps-icon-color .td-social-twitter .td-social-but-icon {
                color: #29c5f6;
            }
            .td-ps-icon-color .td-social-pinterest .td-social-but-icon {
                color: #ca212a;
            }
            .td-ps-icon-color .td-social-whatsapp .td-social-but-icon {
                color: #7bbf6a;
            }
            .td-ps-icon-color .td-social-reddit .td-social-but-icon {
                color: #f54200;
            }
            .td-ps-icon-color .td-social-mail .td-social-but-icon,
            .td-ps-icon-color .td-social-digg .td-social-but-icon,
            .td-ps-icon-color .td-social-copy_url .td-social-but-icon,
            .td-ps-icon-color .td-social-copy_url-check {
                color: #000;
            }
            .td-ps-icon-color .td-social-print .td-social-but-icon {
                color: #333;
            }
            .td-ps-icon-color .td-social-linkedin .td-social-but-icon {
                color: #0266a0;
            }
            .td-ps-icon-color .td-social-tumblr .td-social-but-icon {
                color: #3e5a70;
            }
            .td-ps-icon-color .td-social-telegram .td-social-but-icon {
                color: #179cde;
            }
            .td-ps-icon-color .td-social-stumbleupon .td-social-but-icon {
                color: #ee4813;
            }
            .td-ps-icon-color .td-social-vk .td-social-but-icon {
                color: #4c75a3;
            }
            .td-ps-icon-color .td-social-line .td-social-but-icon {
                color: #00b900;
            }
            .td-ps-icon-color .td-social-viber .td-social-but-icon {
                color: #5d54a4;
            }
            .td-ps-icon-color .td-social-naver .td-social-but-icon {
                color: #3ec729;
            }
            .td-ps-icon-color .td-social-flipboard .td-social-but-icon {
                color: #f42827;
            }
            .td-ps-icon-color .td-social-kakao .td-social-but-icon {
                color: #dd604a;
            }
            .td-ps-icon-color .td-social-gettr .td-social-but-icon {
                color: #fc223b;
            }
            .td-ps-icon-color .td-social-koo .td-social-but-icon {
                color: #facd00;
            }
            .td-ps-text-color .td-social-but-text {
                font-weight: 700;
            }
            .td-ps-text-color .td-social-facebook .td-social-but-text {
                color: #516eab;
            }
            .td-ps-text-color .td-social-twitter .td-social-but-text {
                color: #29c5f6;
            }
            .td-ps-text-color .td-social-pinterest .td-social-but-text {
                color: #ca212a;
            }
            .td-ps-text-color .td-social-whatsapp .td-social-but-text {
                color: #7bbf6a;
            }
            .td-ps-text-color .td-social-reddit .td-social-but-text {
                color: #f54200;
            }
            .td-ps-text-color .td-social-mail .td-social-but-text,
            .td-ps-text-color .td-social-digg .td-social-but-text,
            .td-ps-text-color .td-social-copy_url .td-social-but-text {
                color: #000;
            }
            .td-ps-text-color .td-social-print .td-social-but-text {
                color: #333;
            }
            .td-ps-text-color .td-social-linkedin .td-social-but-text {
                color: #0266a0;
            }
            .td-ps-text-color .td-social-tumblr .td-social-but-text {
                color: #3e5a70;
            }
            .td-ps-text-color .td-social-telegram .td-social-but-text {
                color: #179cde;
            }
            .td-ps-text-color .td-social-stumbleupon .td-social-but-text {
                color: #ee4813;
            }
            .td-ps-text-color .td-social-vk .td-social-but-text {
                color: #4c75a3;
            }
            .td-ps-text-color .td-social-line .td-social-but-text {
                color: #00b900;
            }
            .td-ps-text-color .td-social-viber .td-social-but-text {
                color: #5d54a4;
            }
            .td-ps-text-color .td-social-naver .td-social-but-text {
                color: #3ec729;
            }
            .td-ps-text-color .td-social-flipboard .td-social-but-text {
                color: #f42827;
            }
            .td-ps-text-color .td-social-kakao .td-social-but-text {
                color: #dd604a;
            }
            .td-ps-text-color .td-social-gettr .td-social-but-text {
                color: #fc223b;
            }
            .td-ps-text-color .td-social-koo .td-social-but-text {
                color: #facd00;
            }
            .td-ps-text-color .td-social-expand-tabs .td-social-but-text {
                color: #b1b1b1;
            }
            .td-ps-notext .td-social-but-icon {
                width: 40px;
            }
            .td-ps-notext .td-social-network .td-social-but-text {
                display: none;
            }
            .td-ps-padding .td-social-network .td-social-but-icon {
                padding-left: 17px;
                padding-right: 17px;
            }
            .td-ps-padding .td-social-handler .td-social-but-icon {
                width: 40px;
            }
            .td-ps-padding .td-social-reddit .td-social-but-icon,
            .td-ps-padding .td-social-telegram .td-social-but-icon {
                padding-right: 16px;
            }
            .td-ps-padding .td-social-stumbleupon .td-social-but-icon,
            .td-ps-padding .td-social-digg .td-social-but-icon,
            .td-ps-padding .td-social-expand-tabs .td-social-but-icon {
                padding-right: 13px;
            }
            .td-ps-padding .td-social-vk .td-social-but-icon {
                padding-right: 14px;
            }
            .td-ps-padding .td-social-expand-tabs .td-social-but-icon {
                padding-left: 13px;
            }
            .td-ps-rounded .td-social-network .td-social-but-icon {
                border-top-left-radius: 100px;
                border-bottom-left-radius: 100px;
            }
            .td-ps-rounded .td-social-network .td-social-but-text {
                border-top-right-radius: 100px;
                border-bottom-right-radius: 100px;
            }
            .td-ps-rounded.td-ps-notext .td-social-network .td-social-but-icon {
                border-top-right-radius: 100px;
                border-bottom-right-radius: 100px;
            }
            .td-ps-rounded .td-social-expand-tabs {
                border-radius: 100px;
            }
            .td-ps-bar .td-social-network .td-social-but-icon,
            .td-ps-bar .td-social-network .td-social-but-text {
                -webkit-box-shadow: inset 0px -3px 0px 0px rgba(0, 0, 0, 0.31);
                box-shadow: inset 0px -3px 0px 0px rgba(0, 0, 0, 0.31);
            }
            .td-ps-bar .td-social-mail .td-social-but-icon,
            .td-ps-bar .td-social-digg .td-social-but-icon,
            .td-ps-bar .td-social-copy_url .td-social-but-icon,
            .td-ps-bar .td-social-mail .td-social-but-text,
            .td-ps-bar .td-social-digg .td-social-but-text,
            .td-ps-bar .td-social-copy_url .td-social-but-text {
                -webkit-box-shadow: inset 0px -3px 0px 0px rgba(255, 255, 255, 0.28);
                box-shadow: inset 0px -3px 0px 0px rgba(255, 255, 255, 0.28);
            }
            .td-ps-bar .td-social-print .td-social-but-icon,
            .td-ps-bar .td-social-print .td-social-but-text {
                -webkit-box-shadow: inset 0px -3px 0px 0px rgba(255, 255, 255, 0.2);
                box-shadow: inset 0px -3px 0px 0px rgba(255, 255, 255, 0.2);
            }
            .td-ps-big .td-social-but-icon {
                display: block;
                line-height: 60px;
            }
            .td-ps-big .td-social-but-icon .td-icon-share {
                width: auto;
            }
            .td-ps-big .td-social-handler .td-social-but-text:before {
                display: none;
            }
            .td-ps-big .td-social-share-text .td-social-but-icon {
                width: 90px;
            }
            .td-ps-big .td-social-expand-tabs .td-social-but-icon {
                width: 60px;
            }
            @media (max-width: 767px) {
                .td-ps-big .td-social-share-text {
                    display: none;
                }
            }
            .td-ps-big .td-social-facebook i,
            .td-ps-big .td-social-reddit i,
            .td-ps-big .td-social-mail i,
            .td-ps-big .td-social-linkedin i,
            .td-ps-big .td-social-tumblr i,
            .td-ps-big .td-social-stumbleupon i {
                margin-top: -2px;
            }
            .td-ps-big .td-social-facebook i,
            .td-ps-big .td-social-reddit i,
            .td-ps-big .td-social-linkedin i,
            .td-ps-big .td-social-tumblr i,
            .td-ps-big .td-social-stumbleupon i,
            .td-ps-big .td-social-vk i,
            .td-ps-big .td-social-viber i,
            .td-ps-big .td-social-fliboard i,
            .td-ps-big .td-social-koo i,
            .td-ps-big .td-social-share-text i {
                font-size: 22px;
            }
            .td-ps-big .td-social-telegram i {
                font-size: 24px;
            }
            .td-ps-big .td-social-mail i,
            .td-ps-big .td-social-line i,
            .td-ps-big .td-social-print i {
                font-size: 23px;
            }
            .td-ps-big .td-social-twitter i,
            .td-ps-big .td-social-expand-tabs i {
                font-size: 20px;
            }
            .td-ps-big .td-social-whatsapp i,
            .td-ps-big .td-social-naver i,
            .td-ps-big .td-social-flipboard i,
            .td-ps-big .td-social-kakao i {
                font-size: 26px;
            }
            .td-ps-big .td-social-pinterest .td-icon-pinterest {
                font-size: 21px;
            }
            .td-ps-big .td-social-telegram .td-icon-telegram {
                left: 1px;
            }
            .td-ps-big .td-social-stumbleupon .td-icon-stumbleupon {
                left: -2px;
            }
            .td-ps-big .td-social-digg .td-icon-digg {
                left: -1px;
                font-size: 25px;
            }
            .td-ps-big .td-social-vk .td-icon-vk {
                left: -1px;
            }
            .td-ps-big .td-social-naver .td-icon-naver {
                left: 0;
            }
            .td-ps-big .td-social-gettr .td-icon-gettr {
                left: -1px;
            }
            .td-ps-big .td-social-copy_url .td-icon-copy_url {
                left: 0;
                font-size: 25px;
            }
            .td-ps-big .td-social-copy_url-check {
                font-size: 18px;
            }
            .td-ps-big .td-social-but-text {
                margin-left: 0;
                padding-top: 0;
                padding-left: 17px;
            }
            .td-ps-big.td-ps-notext .td-social-network,
            .td-ps-big.td-ps-notext .td-social-handler {
                height: 60px;
            }
            .td-ps-big.td-ps-notext .td-social-network {
                width: 60px;
            }
            .td-ps-big.td-ps-notext .td-social-network .td-social-but-icon {
                width: 60px;
            }
            .td-ps-big.td-ps-notext .td-social-share-text .td-social-but-icon {
                line-height: 40px;
            }
            .td-ps-big.td-ps-notext .td-social-share-text .td-social-but-text {
                display: block;
                line-height: 1;
            }
            .td-ps-big.td-ps-padding .td-social-network,
            .td-ps-big.td-ps-padding .td-social-handler {
                height: 90px;
                font-size: 13px;
            }
            .td-ps-big.td-ps-padding .td-social-network {
                min-width: 60px;
            }
            .td-ps-big.td-ps-padding .td-social-but-icon {
                border-bottom-left-radius: 0;
                border-top-right-radius: 2px;
            }
            .td-ps-big.td-ps-padding.td-ps-bar .td-social-but-icon {
                -webkit-box-shadow: none;
                box-shadow: none;
            }
            .td-ps-big.td-ps-padding .td-social-but-text {
                display: block;
                padding-bottom: 17px;
                line-height: 1;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
                border-bottom-left-radius: 2px;
            }
            .td-ps-big.td-ps-padding .td-social-but-text:before {
                display: none;
            }
            .td-ps-big.td-ps-padding .td-social-expand-tabs i {
                line-height: 90px;
            }
            .td-ps-nogap {
                margin-left: 0;
                margin-right: 0;
            }
            .td-ps-nogap .td-social-network,
            .td-ps-nogap .td-social-handler {
                margin-left: 0;
                margin-right: 0;
                border-radius: 0;
            }
            .td-ps-nogap .td-social-network .td-social-but-icon,
            .td-ps-nogap .td-social-network .td-social-but-text {
                border-radius: 0;
            }
            .td-ps-nogap .td-social-expand-tabs {
                border-radius: 0;
            }
            .td-post-sharing-style7 .td-social-network .td-social-but-icon {
                height: 100%;
            }
            .td-post-sharing-style7 .td-social-network .td-social-but-icon:before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.31);
            }
            .td-post-sharing-style7 .td-social-network .td-social-but-text {
                padding-left: 17px;
            }
            .td-post-sharing-style7 .td-social-network .td-social-but-text:before {
                display: none;
            }
            .td-post-sharing-style7 .td-social-mail .td-social-but-icon:before,
            .td-post-sharing-style7 .td-social-digg .td-social-but-icon:before,
            .td-post-sharing-style7 .td-social-copy_url .td-social-but-icon:before {
                background-color: rgba(255, 255, 255, 0.2);
            }
            .td-post-sharing-style7 .td-social-print .td-social-but-icon:before {
                background-color: rgba(255, 255, 255, 0.1);
            }
            @media (max-width: 767px) {
                .td-post-sharing-style1 .td-social-share-text .td-social-but-text,
                .td-post-sharing-style3 .td-social-share-text .td-social-but-text,
                .td-post-sharing-style5 .td-social-share-text .td-social-but-text,
                .td-post-sharing-style14 .td-social-share-text .td-social-but-text,
                .td-post-sharing-style16 .td-social-share-text .td-social-but-text {
                    display: none !important;
                }
            }
            @media (max-width: 767px) {
                .td-post-sharing-style2 .td-social-share-text,
                .td-post-sharing-style4 .td-social-share-text,
                .td-post-sharing-style6 .td-social-share-text,
                .td-post-sharing-style7 .td-social-share-text,
                .td-post-sharing-style15 .td-social-share-text,
                .td-post-sharing-style17 .td-social-share-text,
                .td-post-sharing-style18 .td-social-share-text,
                .td-post-sharing-style19 .td-social-share-text,
                .td-post-sharing-style20 .td-social-share-text {
                    display: none !important;
                }
            }

        </style>

		<?php
		$general_css = ob_get_clean();

		self::$show_general_css = true;

		if ($show) {
            echo $general_css;
            return;
        }
        return $general_css;
	}


    /**
     * Used by all the shortcodes + widget to render the social sharing stuff.
     * @param $atts
     *      $atts['services'] = "facebook,vk,etc"
     *      $atts['style'] = "style_1"
     * @param $block_uid
     * @return string
     */
    static function render_generic($atts, $block_uid) {

        $buffy = '';
        $services = array();
        if (isset($atts['services'])) {

            if (is_array($atts['services'])) {
                $services = $atts['services'];
            }
            // not used yet - for shortcodes
//            else {
//                $services = explode(',', $atts['services']);
//                foreach ($services as &$service_id_ref) {
//                    $service_id_ref = trim($service_id_ref);
//                }
//            }


        }

        $post_id = null;

        if (isset($atts['post_id'])) {
        	$post_id = $atts['post_id'];
        }


        $tdb_block_class = '';
        $rel = '';

        if ( isset($atts['is_tdb_block']) && $atts['is_tdb_block'] ) {
	        $tdb_block_class = 'tdb-block ';
	        //add rel attribute on tdb block
            $rel = $atts['social_rel'] ?? '';
        }

        //print_r($services);

        if (empty($atts['style'])) {
            $atts['style'] = 'style1';
        }

        if (empty($atts['el_class'])) {
            $atts['el_class'] = '';
        }

        $config_classes = td_api_social_sharing_styles::get_key($atts['style'], 'wrap_classes');

        if (!empty($services)) {

        	$buffy .= '<div id="' . $block_uid . '" class="td-post-sharing ' . $tdb_block_class . $config_classes . ' td-post-sharing-' . $atts['style'] . $atts['el_class'] . ' ">';

        	$buffy .= self::get_general_css();

                $buffy .= '<div class="td-post-sharing-visible">';

                    if ( $atts['share_text_show'] ) {
                        $buffy .= '<div class="td-social-sharing-button td-social-sharing-button-js td-social-handler td-social-share-text">
                                        <div class="td-social-but-icon"><i class="td-icon-share"></i></div>
                                        <div class="td-social-but-text">' . __td('Share', TD_THEME_NAME) . '</div>
                                    </div>';
                    }

                    foreach ($services as $service_id) {
                        $service_info = self::get_service_share_info($service_id, $post_id );

                        if( empty( $service_info['url'] ) || empty( $service_info['title'] ) ){
                        	continue;
                        }

                        if( $service_id == 'copy_url' && td_util::is_amp() ) {
                            continue;
                        }

                        $buffy .= '<a class="td-social-sharing-button td-social-sharing-button-js td-social-network td-social-' . $service_id . '" href="' . $service_info['url'] . '" title="' . $service_info['title'] . '" ' . $rel . '>';
                            $buffy .= '<div class="td-social-but-icon">';
                                if( $service_id == 'copy_url' ) {
                                    $buffy .= '<div class="td-social-copy_url-check td-icon-check"></div>';
                                }

                                $buffy .= '<i class="td-icon-' . $service_id . '"></i>';
                            $buffy .= '</div>';

                            $buffy .= '<div class="td-social-but-text">' . $service_info['title'] . '</div>';
                        $buffy .= '</a>';
                    }

                $buffy .= '</div>'; // ./td-post-sharing-visible

                $buffy .= '<div class="td-social-sharing-hidden">';
                    // the dropdown list
                    $buffy .= '<ul class="td-pulldown-filter-list"></ul>';
                    $buffy .=  '<a class="td-social-sharing-button td-social-handler td-social-expand-tabs" href="#" data-block-uid="' . $block_uid . '" title="More">
                                    <div class="td-social-but-icon"><i class="td-icon-plus td-social-expand-tabs-icon"></i></div>
                                </a>';
                $buffy .= '</div>'; // ./td-post-sharing-hidden

            $buffy .= '</div>'; // ./td-post-sharing
        }



        return $buffy;
    }



    private static function get_service_share_info($service_id, $post_id = null ) {
    	if ( ! empty( $post_id ) ) {
    		global $post;
    		$post = get_post( $post_id );
	    }
    	$page_permalink = esc_url(get_permalink());
        $page_id = get_the_ID();
        $page_title = get_the_title();
        switch ( $service_id ) {

            case 'facebook':
                return array(
                    'url' => 'https://www.facebook.com/sharer.php?u=' . urlencode($page_permalink),
                    'title' => 'Facebook'
                );
                break;

            case 'twitter':
                $twitter_user = td_util::get_option( 'tds_tweeter_username' );
                return array(
                    'url' => 'https://twitter.com/intent/tweet?text=' . htmlspecialchars(urlencode(html_entity_decode($page_title, ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') . '&url=' . urlencode($page_permalink) . '&via=' . urlencode( $twitter_user ? $twitter_user : html_entity_decode(get_bloginfo( 'name' ), ENT_QUOTES) ) ,
                    'title' => 'Twitter'
                );
                break;

            case 'pinterest':
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'single-post-thumbnail' );

                /**
                 * get Pinterest share description
                 * get it from SEO by Yoast meta (if the plugin is active and the description is set) else use the post title
                 */
                if (class_exists('WPSEO_Options', false) and get_post_meta($page_id, '_yoast_wpseo_metadesc', true) != '') {
                    $td_pinterest_share_description = get_post_meta($page_id, '_yoast_wpseo_metadesc', true);
                } else{
                    $td_pinterest_share_description = htmlspecialchars(urlencode(html_entity_decode($page_title, ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
                }

                return array(
                    'url' => 'https://pinterest.com/pin/create/button/?url=' . $page_permalink . '&amp;media=' . ( ! empty( $image[0] ) ? $image[0] : '' ) . '&description=' . esc_html($td_pinterest_share_description),
                    'title' => 'Pinterest'
                );
                break;

            case 'linkedin':
                return array(
                    'url' => 'https://www.linkedin.com/shareArticle?mini=true&url=' . $page_permalink . '&title=' . htmlspecialchars(urlencode(html_entity_decode($page_title))),
                    'title' => 'Linkedin'
                );
                break;

            case 'tumblr':
                return array(
                    'url' => 'https://www.tumblr.com/share/link?url=' . $page_permalink . '&name=' . $page_title,
                    'title' => 'Tumblr'
                );
                break;

            case 'mail':
                return array(
                    'url' => "mailto:?subject=" . $page_title . "&body=" . $page_permalink,
                    'title' => __td('Email')
                );
                break;

            case 'telegram':
                return array(
                    'url' => 'https://telegram.me/share/url?url=' . $page_permalink . '&text=' . htmlspecialchars(urlencode(html_entity_decode($page_title))),
                    'title' => 'Telegram'
                );
                break;

            case 'whatsapp':
                return array(
                    'url' => 'https://api.whatsapp.com/send?text=' . htmlspecialchars(urlencode(html_entity_decode($page_title))) . ' %0A%0A ' . $page_permalink,
                    'title' => 'WhatsApp'
                );
                break;

            case 'digg':
                return array(
                    'url' => 'https://www.digg.com/submit?url=' . $page_permalink,
                    'title' => 'Digg'
                );
                break;

            case 'reddit':
                return array(
                    'url' => 'https://reddit.com/submit?url=' . $page_permalink . '&title=' . htmlspecialchars(urlencode(html_entity_decode($page_title))),
                    'title' => 'ReddIt'
                );
                break;

            case 'stumbleupon':
                return array(
                    'url' => 'https://www.mix.com/add?url=' . $page_permalink,
                    'title' => 'Mix'
                );
                break;

            case 'vk':
                return array(
                    'url' => 'https://vk.com/share.php?url=' . $page_permalink,
                    'title' => 'VK'
                );
                break;

            case 'line':
                return array(
                    'url' => 'https://line.me/R/msg/text/?' . htmlspecialchars(urlencode(html_entity_decode($page_title))) . '%0D%0A' . $page_permalink,
                    'title' => 'LINE'
                );
                break;

            case 'viber':
                return array(
                    'url' => 'viber://forward?text=' . htmlspecialchars(urlencode(html_entity_decode($page_title))) . ' ' . $page_permalink,
                    'title' => 'Viber'
                );
                break;

            case 'print':
                return array(
                    'url' => '#',
                    'title' => __td('Print', TD_THEME_NAME)
                );
                break;

            case 'naver':
                return array(
                    'url' => 'https://share.naver.com/web/shareView.nhn?url=' . $page_permalink . '&title=' . htmlspecialchars(urlencode(html_entity_decode($page_title))),
                    'title' => 'Naver'
                );
                break;

            case 'flipboard':
                return array(
                    'url' => 'https://share.flipboard.com/bookmarklet/popout?v=2&title=' . htmlspecialchars(urlencode(html_entity_decode($page_title))) . '&url=' . urlencode($page_permalink),
                    'title' => 'Flip'
                );
                break;

            case 'copy_url':
                return array(
                    'url' => $page_permalink,
                    'title' => 'Copy URL'
                );
                break;

            case 'kakao':
                return array(
                    'url' => 'https://story.kakao.com/s/share?url=' . urlencode($page_permalink) . '&text=' . htmlspecialchars(urlencode(html_entity_decode($page_title))),
                    'title' => 'Kakao Story'
                );
                break;

            case 'gettr':
            return array(
                'url' => 'https://gettr.com/share?text=' . htmlspecialchars(urlencode(html_entity_decode($page_title))) . '&url=' . urlencode($page_permalink),
                'title' => 'Gettr'
            );
            break;

            case 'koo':
            return array(
                'url' => 'https://www.kooapp.com/create?title=' . urlencode($page_permalink),
                'title' => 'Koo'
            );
            break;

            default:
	            $services = array();
	            $td_social_sharing_services = apply_filters( 'td_social_sharing_services', $services, $page_permalink, $page_title );

	            if ( !empty($td_social_sharing_services) && isset($td_social_sharing_services[$service_id]) ) {
	            	return $td_social_sharing_services[$service_id];
	            }

	            return array(
		            'url' => '',
		            'title' => ''
	            );
        }

    }

}
