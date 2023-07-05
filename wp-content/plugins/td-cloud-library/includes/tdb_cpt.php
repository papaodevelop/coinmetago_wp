<?php


add_filter('manage_pages_columns', function($columns) {
    $columns['tdb_mobile_template'] = 'Mobile Page';
    $columns['tdb_is_mobile_template'] = 'Is Mobile Template';

    return $columns;
});

/**
 * Add custom data to the columns on wp-admin page list
 */
add_action('manage_pages_custom_column' , function($column, $post_id) {

    switch( $column ) {

        case 'tdb_mobile_template':

        	$tdc_mobile_template_id = get_post_meta( $post_id, 'tdc_mobile_template_id', true );

	    	if ( !empty($tdc_mobile_template_id ) ) {
		        $mobile_template = get_post($tdc_mobile_template_id);
		        if ( $mobile_template instanceof WP_Post) {

		        	if ( 'publish' !== get_post_status( $tdc_mobile_template_id ) ) {
		        		break;
			        }

		        	$tdb_template_type = get_post_meta( $tdc_mobile_template_id, 'tdb_template_type', true );
					if ( empty( $tdb_template_type ) ) {
						$tdb_template_type = 'page';
					}

		            echo sprintf( '<b><a target="_blank" href="%s">%s</a></b>', get_edit_post_link($mobile_template->ID), $mobile_template->post_title );
		            echo '<br><a target="_blank" href="' . admin_url( 'post.php?post_id=' . $mobile_template->ID . '&td_action=tdc&tdbTemplateType=' . $tdb_template_type . '&prev_url='  . rawurlencode(tdc_util::get_current_url()) ) . '">Edit with TD Composer</a>';
		        }
		    }

	    	break;

	    case 'tdb_is_mobile_template':

	    	$tdc_mobile_template_id = get_post_meta( $post_id, 'tdc_is_mobile_template', true );

		    if ( empty($tdc_mobile_template_id ) ) {
	            echo '-';
		    } else {
	            echo 'Yes';
	        }

	    	break;
    }

}, 10, 2 );


/**
 * Add custom columns on wp-admin cpt list
 */
add_filter('manage_tdb_templates_posts_columns', function($columns) {
    $date = $columns['date'];
    unset($columns['date']);
    $columns['tdb_template_type'] = 'Template Type';
    $columns['tdb_mobile_template'] = 'Mobile Template';
    $columns['tdb_is_mobile_template'] = 'Is Mobile Template';
    $columns['tdb_used_on'] = 'Used On';
    $columns['date'] = $date;

    return $columns;
});


/**
 * Add custom data to the columns on wp-admin cpt list
 */
add_action('manage_tdb_templates_posts_custom_column' , function($column, $post_id) {

    $tdb_template_type = get_post_meta($post_id, 'tdb_template_type', true);

    switch( $column ) {

        case 'tdb_template_type':

            $args = array(
                'post_type'  => 'tdb_templates',
                'meta_key'   => 'tdb_template_type',
                'meta_value' => $tdb_template_type
            );

            $url = add_query_arg( $args, 'edit.php' );

            echo sprintf( '<a href="%s">%s</a>', esc_url( $url ), $tdb_template_type );

            break;

        case 'tdb_used_on':

            $items_to_display = array();
            $tdb_template_id = 'tdb_template_' . $post_id;

            /*
             * template types
             * 'single', 'category', 'author', 'search', 'date', 'tag', 'attachment', '404'
             */
            switch ( $tdb_template_type ) {

                case 'single':

                    // read the global single template
                    $tdb_single_template = td_util::get_option( 'td_default_site_post_template' );

                    // for global single post templates
                    if ( $tdb_template_id === $tdb_single_template ) {
                        $items_to_display[] = sprintf( '<a href="%s" title="Change this global ' . $tdb_template_type . ' post template from the theme panel." target="_blank">All Posts</a>', esc_url( admin_url('admin.php?page=td_theme_panel#td-panel-post-settings/box=default_post_template_site_wide') ) );
                    }

                    // get all published posts
                    $posts = get_posts(
                        array(
                            'post_status' => 'publish',
                            'numberposts' => 50
                        )
                    );

                    // for individual single post templates
                    foreach ( $posts as $post ) {

                        // read the individual single post settings
                        $tdb_post_theme_settings = td_util::get_post_meta_array($post->ID, 'td_post_theme_settings');

                        if ( !empty( $tdb_post_theme_settings['td_post_template'] ) and $tdb_template_id === $tdb_post_theme_settings['td_post_template'] ) {
                            $items_to_display[] = sprintf(
                                '<a href="%s" title="Change this individual ' . $tdb_template_type . ' post template from the `Post Settings` section." target="_blank">%s</a>',
                                get_edit_post_link( $post->ID ),
                                $post->post_title
                            );
                        }
                    }

                    break;

                case 'category':

                    // read the global categories template
                    $tdb_category_template = td_options::get( 'tdb_category_template' );

                    // for global category templates
                    if ( $tdb_template_id === $tdb_category_template ) {
                        $items_to_display[] = sprintf( '<a href="%s" title="Change this global ' . $tdb_template_type . ' template from the theme panel." target="_blank">All Categories</a>', esc_url( admin_url('admin.php?page=td_theme_panel#td-panel-categories') ) );
                    }

                    // get all categories
                    $categories = get_categories(
                        array(
                            'hide_empty' => false
                        )
                    );

                    // for individual category templates
                    foreach ( $categories as $category ) {

                        // read the individual cat template
                        $tdb_individual_category_template = td_util::get_category_option( $category->cat_ID, 'tdb_category_template' );

                        if ( $tdb_template_id === $tdb_individual_category_template ) {
                            $items_to_display[] = sprintf(
                                '<a href="%s" title="Change this individual ' . $tdb_template_type . ' template from the theme panel." target="_blank">%s</a>',
                                esc_url( admin_url('admin.php?page=td_theme_panel#td-panel-categories/box=category_individual_settings_cat_' . $category->cat_ID ) ),
                                $category->name
                            );
                        }
                    }

                    break;

                case 'author':

                    // read the global author template
                    $tdb_author_template = td_options::get( 'tdb_author_template' );

                    // for global author templates
                    if ( $tdb_template_id === $tdb_author_template ) {
                        $items_to_display[] = sprintf( '<a href="%s" title="Change this global ' . $tdb_template_type . ' template from the theme panel." target="_blank">All Authors</a>', esc_url( admin_url('admin.php?page=td_theme_panel#td-panel-template-settings/box=author_template') ) );
                    }

                    // for individual author templates
                    foreach ( get_users() as $user ) {

                        // username
                        $username = '';
                        if ( $user->first_name && $user->last_name ) {
                            $username .= "$user->first_name $user->last_name";
                        } elseif ( $user->first_name ) {
                            $username .= $user->first_name;
                        } elseif ( $user->last_name ) {
                            $username .= $user->last_name;
                        } else {
                            $username .= $user->user_login;
                        }

                        // user templates
                        $tdb_author_templates = td_util::get_option('tdb_author_templates');

                        // read the individual author template
                        $tdb_individual_author_template = isset( $tdb_author_templates[$user->ID] ) ? $tdb_author_templates[$user->ID] : '';

                        if ( !empty( $tdb_individual_author_template ) and $tdb_template_id === $tdb_individual_author_template ) {
                            $items_to_display[] = sprintf(
                                '<a href="%s" title="Change this `' . $username . '` individual ' . $tdb_template_type . ' template from the theme panel."  target="_blank">%s</a>',
                                esc_url( admin_url('admin.php?page=td_theme_panel#td-panel-template-settings/box=author_template' ) ),
                                $username
                            );
                        }
                    }

                    break;

                case 'search':

                    // read the global search template
                    $tdb_search_template = td_options::get( 'tdb_search_template' );

                    if ( $tdb_template_id === $tdb_search_template ) {
                        $items_to_display[] = sprintf(
                            '<a href="%s" title="Change this global ' . $tdb_template_type . ' template from the theme panel." target="_blank">Site</a>',
                            esc_url( admin_url('admin.php?page=td_theme_panel#td-panel-template-settings/box=search_template' ) )
                        );
                    }

                    break;

                case 'date':

                    // read the global date template
                    $tdb_date_template = td_options::get( 'tdb_date_template' );

                    if ( $tdb_template_id === $tdb_date_template ) {
                        $items_to_display[] = sprintf(
                            '<a href="%s" title="Change this global ' . $tdb_template_type . ' template from the theme panel." target="_blank">Site</a>',
                            esc_url( admin_url('admin.php?page=td_theme_panel#td-panel-template-settings/box=archive_template' ) )
                        );
                    }

                    break;

                case 'tag':

                    // read the global tag template
                    $tdb_tag_template = td_options::get( 'tdb_tag_template' );

                    if ( $tdb_template_id === $tdb_tag_template ) {
                        $items_to_display[] = sprintf(
                            '<a href="%s" title="Change this global ' . $tdb_template_type . ' template from the theme panel." target="_blank">Site</a>',
                            esc_url( admin_url('admin.php?page=td_theme_panel#td-panel-template-settings/box=tag_template' ) )
                        );
                    }

                    break;

                case 'attachment':

                    // read the global attachment template
                    $tdb_attachment_template = td_options::get( 'tdb_attachment_template' );

                    if ( $tdb_template_id === $tdb_attachment_template ) {
                        $items_to_display[] = sprintf(
                            '<a href="%s" title="Change this global ' . $tdb_template_type . ' template from the theme panel." target="_blank">Site</a>',
                            esc_url( admin_url('admin.php?page=td_theme_panel#td-panel-template-settings/box=attachment_template' ) )
                        );
                    }

                    break;

                case '404':

                    // read the global 404 template
                    $tdb_404_template = td_options::get( 'tdb_404_template' );

                    if ( $tdb_template_id === $tdb_404_template ) {
                        $items_to_display[] = sprintf(
                            '<a href="%s" title="Change this global ' . $tdb_template_type . ' template from the theme panel." target="_blank">Site</a>',
                            esc_url( admin_url('admin.php?page=td_theme_panel#td-panel-template-settings/box=404_template' ) )
                        );
                    }

                    break;

            }

            // point to end of the array
            end( $items_to_display );

            // the last element of the array.
            $last_element = key( $items_to_display );

            if ( ! empty( $items_to_display ) ) {
                foreach ( $items_to_display as $item_index => $item ) {
                    if ( $item_index == $last_element ) {
                        echo $item;
                    } else {
                        echo $item . ', ';
                    }
                }
            } else {
                echo '—';
            }

            break;

    }

}, 10, 2 );


/**
 * add sorting support on wp-admin cpt list
 */
add_filter('manage_edit-tdb_templates_sortable_columns', function ( $columns ) {
    $columns['tdb_template_type'] = 'tdb_template_type';
    return $columns;
});

/**
 * add filter support on wp-admin cpt list
 */
add_action( 'restrict_manage_posts', 'tdb_restrict_manage_posts' );
function tdb_restrict_manage_posts($post_type) {

    // only display these taxonomy filters on desired custom post_type listings
    if ( 'tdb_templates' === $post_type ) {

        // output select html for templates type dropdown filter
        echo '<select name="template_type" id="template_type" class="postform">';
        echo "<option value=''>All Template Types</option>";

        $filters = array(
	        'header',
            'footer',
            'single',
            '404',
            'attachment',
            'author',
            'category',
            'date',
            'search',
            'tag'
        );

	    $filters = apply_filters( 'tdb_template_types', $filters );

	    foreach ( $filters as $template_type ) {
            $selected = $_GET['template_type'] ?? null;
            $template_name = ucfirst($template_type);
            // output each select option line, check against the last $_GET to show the current option selected
            echo '<option value='. $template_type, $selected == $template_type ? ' selected="selected"' : '','>' . $template_name .'</option>';
        }

        echo "</select>";

	    echo '<select name="is_mobile_template" id="is_mobile_template" class="postform">';
	    echo "<option value=''>Show All Types</option>";

        $mob_template_type_filters = array(
	        'normal',
            'mobile',
        );

        foreach ( $mob_template_type_filters as $template_type ) {
            $selected = $_GET['is_mobile_template'] ?? null;
            // output each select option line, check against the last $_GET to show the current option selected
            echo '<option value='. $template_type, $selected == $template_type ? ' selected="selected"' : '','>' . ucfirst($template_type) .'</option>';
        }

	    echo "</select>";

    } else if ( 'page' === $post_type ) {

    	echo '<select name="is_mobile_template" id="is_mobile_template" class="postform">';
	    echo "<option value=''>All Page Types</option>";

        $page_type_filters = array(
	        'normal',
            'mobile',
        );

        foreach ( $page_type_filters as $page_type ) {
            $selected = $_GET['is_mobile_template'] ?? null;
            // output each select option line, check against the last $_GET to show the current option selected
            echo '<option value='. $page_type, $selected == $page_type ? ' selected="selected"' : '','>' . ucfirst($page_type) .'</option>';
        }

        echo "</select>";
    }
}

/**
 * change the links for each item on wp-admin cpt list
 */
add_filter( 'page_row_actions', function ( $actions, $post ) {
	global $current_screen;

    $post_types_array = array( 'tdb_templates', 'page' );
    if ( ( !empty( $current_screen ) && !in_array( $current_screen->post_type, $post_types_array ) ) || get_post_status( $post ) === 'trash' ) {
        return $actions;
    }
	if ( is_user_logged_in() && current_user_can('publish_pages') && $post->ID !== (int) get_option( 'page_for_posts' ) ) {
		$tdb_template_type = get_post_meta( $post->ID, 'tdb_template_type', true );

		// remove the default td-composer edit
		unset( $actions['edit_tdc_composer'] );

		// WP Page is not a tdb_template
        if ( $tdb_template_type == '' && $current_screen->post_type === 'page' ) {
            $tdb_template_type = 'page';
        }

        $actions = array_merge(
			array(
				'edit_tdc_composer' => '<a href="' . admin_url( 'post.php?post_id=' . $post->ID . '&td_action=tdc&tdbTemplateType=' . $tdb_template_type . '&prev_url=' . rawurlencode( tdc_util::get_current_url() ) ) . '">Edit with TagDiv Composer</a>'
			),
			$actions
		);

        $actions['duplicate'] = '<a data-post-id="' . $post->ID . '" data-template-type="' . $tdb_template_type . '" data-template-name="' . get_the_title( $post->ID ) . '" class="tdb-duplicate-template" href="#" title="Duplicate this template." >Duplicate</a><span class="tdb-working-prompt">Working...</span>';

        if ( 'page' !== $tdb_template_type ) {
            unset($actions['inline hide-if-no-js']); // hide quick edit
        }
	}

    return $actions;

}, 11, 2 );

/**
 * exclude tdb_templates cpt from theme's cpt support
 */
add_filter( 'td_custom_post_types', function ( $td_cpts ) {
	$tdb_templates = array_search( 'tdb_templates', $td_cpts );
	if( $tdb_templates !== false ) {
		unset( $td_cpts[$tdb_templates] );
	}
	return $td_cpts;
}, 10, 1 );

/**
 * ensure statuses are correctly reassigned when restoring cloud templates
 *
 * @param string $new_status      The new status of the post being restored.
 * @param int    $post_id         The ID of the post being restored.
 * @param string $previous_status The status of the post at the point where it was trashed.
 * @return string
 */
add_filter( 'wp_untrash_post_status', function ( $new_status, $post_id, $previous_status ) {

	if ( get_post_type( $post_id ) === 'tdb_templates' ) {
		$new_status = $previous_status;
	}

	return $new_status;

}, 10, 3 );

/**
 * cloud templates wp-admin redesign: new cloud templates manager page
 */
add_action( 'admin_menu', function () {
	add_menu_page(
		'tagDiv Cloud templates',
		'Cloud templates',
		'manage_categories',
		'tdb_cloud_templates',
		function () {
			require_once TDB_TEMPLATE_BUILDER_DIR . '/includes/admin/templates/cloud-templates.php';
		},
		null,
		27
	);
});
