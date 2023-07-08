<?php


class tds_admin {

	// constructor
	public function __construct() {

		add_action( 'init', array( $this, 'includes' ) );

		// tds email ctp wp admin editor updates > title field placeholder text
		add_filter( 'enter_title_here', function ( $title, $post ) {

			if( $post->post_type === 'tds_email' ) {
				$title = 'Add email';
			}

			return $title;

		}, 10, 2 );

		// remove the default 'new item' from the admin menu
		add_filter( 'custom_menu_order', '__return_true' );
		add_filter( 'menu_order', function ( $menu ) {
			global $submenu;
			if ( !isset( $submenu['edit.php?post_type=tds_email'] ) )
				return $menu;
			unset( $submenu['edit.php?post_type=tds_email'][10] );
			return $menu;
		});

		// add custom fields data columns on tds_email(leads) cpt
		add_filter( 'manage_tds_email_posts_columns', function ( $defaults ) {

            $defaults['tds_validate_email'] = 'Confirmed email';

			for ( $i = 1; $i <= 3; $i++ ) {
				$defaults["tds_locker_cf_{$i}"] = 'Custom field ' . $i;
			}
			return $defaults;
		});

		// set custom fields data columns values on tds_email(leads) cpt
		add_action( 'manage_tds_email_posts_custom_column', function ( $column_name, $id ) {

            if ( $column_name === "tds_validate_email" ) {
                $tds_validate_email = get_post_meta( $id, 'tds_validate_email', true );

                echo ucfirst( $tds_validate_email );
            }

            for ( $i = 1; $i <= 3; $i++ ) {
				if( $column_name === "tds_locker_cf_{$i}" ) {
					$column_val = get_post_meta( $id, "tds_locker_cf_{$i}", true );
					if ( $column_val === '' ) {
						echo '-';
					} else {

						// get locker id
						$tds_locker_id = get_post_meta( $id, 'tds_locker_id', true );

						// get locker cf name
						$tds_locker_settings_meta = get_post_meta( $tds_locker_id, 'tds_locker_settings', true );

						$locker_cf_name = !empty( $tds_locker_settings_meta["tds_locker_cf_{$i}_name"] ) ? '<div style="font-weight: bold;">' . $tds_locker_settings_meta["tds_locker_cf_{$i}_name"] . '</div>' : '';

						echo $locker_cf_name . $column_val;
					}
				}
			}
		}, 10, 2 );

	}

	// includes
	public function includes() {

		add_action( 'admin_enqueue_scripts', function() {
			if ( $GLOBALS['pagenow'] === 'update-core.php' ||  $GLOBALS['pagenow'] === 'update.php' ) {
                return;
			}

			// load the vue js files
			if ( TDS_DEPLOY_MODE == 'dev' ) {
				tds_util::enqueue_js_files_array( tds_config::$js_vue_files, array( 'jquery', 'underscore' ) );
			} else {
				wp_enqueue_script( 'tds_js_vue_files_last', TDS_URL . '/assets/js/js_vue_files.min.js', array(
					'jquery',
					'underscore'
				), TD_SUBSCRIPTION_VERSION, true );
			}

			// subscriptions
			if ( TDS_DEPLOY_MODE == 'dev' ) {
				wp_register_script(
					'tds-subscriptions',
					TDS_URL . '/assets/js/admin/subscriptions.js',
					array( 'jquery', 'underscore' ),
					TD_SUBSCRIPTION,
					true
				);
			} else {
				wp_register_script(
					'tds-subscriptions',
					TDS_URL . '/assets/js/js_subscriptions.min.js',
					array( 'jquery', 'underscore' ),
                    TD_SUBSCRIPTION_VERSION,
					true
				);
			}
			wp_enqueue_script('tds-subscriptions');
	        wp_localize_script('tds-subscriptions','tds_js_globals',
	            array(
		            'wpRestNonce' => wp_create_nonce('wp_rest'),
		            'wpRestUrl' => rest_url(),
		            'permalinkStructure' => get_option('permalink_structure'),
	            )
	        );
		});


		// metaboxes
		if ( class_exists( 'WPAlchemy_MetaBox' ) ) {

			// lockers preview metabox
			new WPAlchemy_MetaBox(
				array(
					'id'       => 'tds_locker_preview',
					'title'    => 'Preview',
					'types'    => array( 'tds_locker' ),
					'priority' => 'default',
					'template' => TDS_PATH . '/includes/admin/metaboxes/tds_locker_preview.php',
					'init_action' => array( $this, 'enqueue_lockers_preview_script' )
				)
			);

			new WPAlchemy_MetaBox(
				array(
					'id'       => 'tds_locker_settings',
					'title'    => 'Basic Locker Settings',
					'types'    => array( 'tds_locker' ),
					'priority' => 'high',
					'template' => TDS_PATH . '/includes/admin/metaboxes/tds_locker_settings.php'
				)
			);

			new WPAlchemy_MetaBox(
				array(
					'id'       => 'tds_locker_styles',
					'title'    => 'Locker Styles',
					'types'    => array( 'tds_locker' ),
					'priority' => 'high',
					'template' => TDS_PATH . '/includes/admin/metaboxes/tds_locker_styles.php'
				)
			);

            new WPAlchemy_MetaBox(
                array(
                    'id'       => 'tds_locker_types',
                    'title'    => 'Locker Types',
                    'types'    => array( 'tds_locker' ),
                    'context'  => 'side',
                    'priority' => 'default',
                    'template' => TDS_PATH . '/includes/admin/metaboxes/tds_locker_types.php'
                )
            );

			new WPAlchemy_MetaBox(
				array(
					'id'       => 'tds_locker_access_settings',
					'title'    => 'Locker Access Settings',
					'types'    => array( 'tds_locker' ),
                    'context'  => 'side',
					'priority' => 'default',
					'template' => TDS_PATH . '/includes/admin/metaboxes/tds_locker_access_settings.php'
				)
			);

		}

	}

	// load(enqueue) lockers preview script
	function enqueue_lockers_preview_script() {
		if ( TDS_DEPLOY_MODE == 'dev' ) {
			wp_register_script(
				'tds-preview',
				TDS_URL . '/assets/js/admin/lockers.js',
				array( 'jquery', 'underscore' ),
				TD_SUBSCRIPTION,
				true
			);
		} else {
			wp_register_script(
				'tds-preview',
				TDS_URL . '/assets/js/js_lockers_preview.min.js',
				array( 'jquery', 'underscore' ),
                TD_SUBSCRIPTION_VERSION,
				true
			);
		}
		wp_enqueue_script('tds-preview');
		wp_localize_script('tds-preview','tds_js_globals',
			array(
				'wpRestNonce' => wp_create_nonce('wp_rest'),
				'wpRestUrl' => rest_url(),
				'permalinkStructure' => get_option('permalink_structure'),
			)
		);
	}

}

new tds_admin();
