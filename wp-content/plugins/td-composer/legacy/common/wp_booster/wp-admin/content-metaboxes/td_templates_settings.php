<?php
if ( ! class_exists( 'WPAlchemy_MetaBox' ) ){
    include_once TDC_PATH . '/legacy/common/wp_booster/wp-admin/external/wpalchemy/MetaBox.php';
}

add_action('init', 'td_register_post_metaboxes', 9999); // we need to be on init because we use get_post_types - we need the high priority to catch retarded plugins that bind late to the hook to register it's CPT
function td_register_post_metaboxes() {
    $td_template_settings_path = TDC_PATH . '/legacy/common/wp_booster/wp-admin/content-metaboxes/';


    // default page
    new WPAlchemy_MetaBox(array(
        'id' => 'td_page',
        'title' => 'Page Template Settings',
        'types' => array('page'),
        'priority' => 'high',
        'template' => $td_template_settings_path . 'td_set_page.php',
    ));



    // homepage with loop
    new WPAlchemy_MetaBox(array(
        'id' => 'td_homepage_loop',
        'title' => 'Homepage Latest Articles',
        'types' => array('page'),
        'priority' => 'high',
        'template' => $td_template_settings_path . 'td_set_page_with_loop.php',
    ));


    if ( current_user_can('publish_posts' ) ) {

        $excluded_post_types = array( 'acf-field-group', 'acf-field', 'product_variation', 'product', 'shop_order', 'shop_order_refund', 'shop_coupon', 'shop_webhook', 'vc_grid_item', 'tdb_templates', 'amp_validated_url', 'tds_email', 'tds_locker' );
        $post_types = get_post_types( array('_builtin' => false) );

        $metaboxes_post_types = array('post');
        foreach ( $post_types as $post_type ) {
            if( !in_array( $post_type, $excluded_post_types ) && post_type_supports($post_type, 'post-formats') ) {
                $metaboxes_post_types[] = $post_type;
            }
        }

        // featured video
        new WPAlchemy_MetaBox(array(
            'id' => 'td_post_video',
            'title' => 'Featured Video',
            'types' => $metaboxes_post_types,
            'priority' => 'low',
            'context' => 'side',
            'template' => $td_template_settings_path . 'td_set_video_meta.php',
        ));

        if (TD_THEME_NAME === 'Newspaper' ) {
            new WPAlchemy_MetaBox(array(
                'id' => 'td_post_audio',
                'title' => 'Featured Audio',
                'types' => $metaboxes_post_types,
                'priority' => 'low',
                'context' => 'side',
                'template' => $td_template_settings_path . 'td_set_audio_meta.php',
            ));
        }
    }

    /**
     * single posts, Custom Post Types and WooCommerce products all use the same metadata keys!
     * we just switch here the views
     */


    /**
     * 'post' post type / single
     */
    if ( current_user_can('publish_posts') ) {

    	// default post settings meta box setup options
    	$post_settings_mb_setup_options = array(
		    'id' => 'td_post_theme_settings',
		    'title' => 'Post Settings',
		    'types' => array( 'post' ),
		    'priority' => 'high',
		    'template' => TDC_PATH . '/legacy/common/wp_booster/wp-admin/content-metaboxes/td_set_post_settings.php'
	    );

    	// post settings meta box setup options filter (can be used to pass additional options through the td_post_theme_settings meta box)
	    $post_settings_mb_setup_options = apply_filters( 'td_post_theme_settings_mb_setup_options', $post_settings_mb_setup_options );

        new WPAlchemy_MetaBox( $post_settings_mb_setup_options );

    }


    /**
     * Custom Post Types
     */
	// get all the custom post types EXCEPT post page etc.
    $td_custom_post_types = apply_filters( 'td_custom_post_types', get_post_types( array( '_builtin' => false ) ) );

    // remove the AMP Validation URLs post type from the array if it's available and the AMP plugin is installed
    if ( td_util::is_amp_plugin_installed() ) {
        $amp_validated_url = array_search('amp_validated_url', $td_custom_post_types);
        if( $amp_validated_url !== false ) {
            unset($td_custom_post_types[$amp_validated_url]);
        }
    }

    // remove the woo_commerce post type from the array if it's available and the woo_commerce plugin is installed
    if ( td_global::$is_woocommerce_installed === true ) {
        $woo_key = array_search('product', $td_custom_post_types);
        if($woo_key !== false) {
            unset($td_custom_post_types[$woo_key]);
        }
    }

    //remove acf post type from array
    if ( class_exists('ACF') ){
        $acf_cpt = array_search('acf-field-group', $td_custom_post_types);
        if ($acf_cpt !== false) {
            unset($td_custom_post_types[$acf_cpt]);
        }
    }

    // if we have any CPT left, associate them with the metaboxes
    if ( !empty( $td_custom_post_types ) && current_user_can('publish_posts' ) ) {
        new WPAlchemy_MetaBox(array(
            'id' => 'td_post_theme_settings',
            'title' => 'Custom Post Type - Layout Settings',
            'types' => $td_custom_post_types,
            'priority' => 'high',
            'template' => TDC_PATH . '/legacy/common/wp_booster/wp-admin/content-metaboxes/td_set_post_settings_cpt.php',
        ));
    }

    /**
     * woo commerce product post type
     */
    if ( td_global::$is_woocommerce_installed === true ) {
        new WPAlchemy_MetaBox(array(
            'id' => 'td_post_theme_settings',
            'title' => 'WooCommerce - Product Layout Settings',
            'types' => array('product'),
            'priority' => 'default',
            'template' => TDC_PATH . '/legacy/common/wp_booster/wp-admin/content-metaboxes/td_set_post_settings_woo.php',
        ));
    }

    do_action('tdc_register_post_metaboxes', $td_custom_post_types);
}


