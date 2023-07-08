<?php

/**
 * Class tds_dashboard
 */

class tds_dashboard extends td_block {

	public function get_custom_css() {

        // $unique_block_class
        $unique_block_class = $this->block_uid;

		$compiled_css = '';

		/** @noinspection CssInvalidAtRule */
		$raw_css =
            "<style>

                /* @tds_logout */
                body .tds_logout {
                    margin-bottom: 0;                    
                }
                body .tds_logout .tds-block-inner {
                    margin: 0 auto;
                    padding: 55px 45px 60px;
                    max-width: 650px;
                    background-color: #fff;
                    text-align: center;
                }
                

            </style>";

		$td_css_res_compiler = new td_css_res_compiler( $raw_css );
		$td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

		$compiled_css .= $td_css_res_compiler->compile_css();

		return $compiled_css;

	}

	static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'tds_logout', 1 );
	}

	function __construct() {
		parent::disable_loop_block_features();
	}

	function render( $atts, $content = null ) {

        parent::render( $atts );

		$buffy = '';
		if (is_user_logged_in()) {

		    ob_start();

            $current_user = '<b>' . wp_get_current_user()->display_name . '</b>';
            $log_out = '<a href="' . wp_logout_url(site_url()) . '">' . __td('Log out', TD_THEME_NAME) . '</a>' ;
            ?>

            <div class="tds-s-page-sec tds-s-page-dashboard">
                <div class="tds-s-page-sec-header">
                    <h2 class="tds-spsh-title"><?php echo __td('Dashboard', TD_THEME_NAME) ?></h2>
                    <div class="tds-spsh-descr"><?php echo __td('Welcome to your account!', TD_THEME_NAME) ?></div>
                </div>

                <div class="tds-s-page-sec-content">
                    <div class="tds-s-notif tds-s-notif-info">
<!--                        <div class="tds-s-notif-descr">Hello <b>--><?php //echo wp_get_current_user()->display_name ?><!--</b> (not <b>--><?php //echo wp_get_current_user()->display_name ?><!--</b>? <a href="--><?php //echo wp_logout_url(site_url()) ?><!--">Log out</a>)! From your account dashboard you can view your subscriptions and manage your account details.</div>-->

<!--                        %1$s: user name; %2$s: username; %3$s: logout link;-->
                        <div class="tds-s-notif-descr"><?php  echo sprintf( __td( 'Hello %1$s (not %2$s? %3$s)! From your account dashboard you can view your subscriptions and manage your account details.' , TD_THEME_NAME), $current_user, $current_user, $log_out ) ?></div>
                    </div>
                </div>
            </div>

            <?php
            $buffy .= ob_get_clean();
		} else {

		    ob_start();

		    wp_login_form();
			?>

			<a href="<?php echo esc_url( add_query_arg('lost_password', '', get_permalink()) ); ?>"><?php echo __td('Lost Password', TD_THEME_NAME) ?></a>

			<?php
            $buffy .= ob_get_clean();
		}

		return $buffy;
	}
}
