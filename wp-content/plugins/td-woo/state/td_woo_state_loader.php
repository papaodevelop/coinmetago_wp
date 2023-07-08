<?php

class td_woo_state_loader {

    /**
     * This is used for composer iframe and composer ajax calls to set the state.
     *  - The global wp_query is the template's
     *  - We have to get the content by making a new wp_query
     */
    static function on_tdc_loaded_load_state() {
        if ( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) {

            add_action( 'init', function () {

	            global $td_woo_state_single_product_page, $td_woo_state_archive_product_page, $td_woo_state_search_archive_product_page, $td_woo_state_shop_base_page;

	            // get the content id and content type
	            $tdbLoadDataFromId = tdb_util::get_get_val('tdbLoadDataFromId');
	            $tdbTemplateType = tdb_util::get_get_val('tdbTemplateType');

	            // try to load the content, if we fail to load it, we will ship the default state... ? @todo ?
	            if ( $tdbLoadDataFromId !== false && $tdbTemplateType !== false ) {
		            switch ( $tdbTemplateType ) {
			            case 'woo_product':
				            // get the content wp_query
				            $wp_query_content = new WP_Query( array(
						            'p' => $tdbLoadDataFromId,
						            'post_type' => 'product'
					            )
				            );
				            $td_woo_state_single_product_page->set_wp_query($wp_query_content);
				            break;
			            case 'woo_archive':

							// determine template type
				            $term = get_term( $tdbLoadDataFromId );
							/*
				            WP_Term Object ex:
				            (
					            [term_id] => 61
					            [name] => caca
				                [slug] => caca
				                [term_group] => 0
	                            [term_taxonomy_id] => 61
	                            [taxonomy] => product_tag
			                    [description] =>
							    [parent] => 0
							    [count] => 6
							    [filter] => raw
							)
				            */

				            // get the content wp_query
				            $wp_query_content = new WP_Query( array(
						            //'post_type' => 'product',
						            'tax_query' => array(
							            array(
								            'taxonomy' => $term->taxonomy,
								            'terms' => $tdbLoadDataFromId
							            )
						            )
					            )
				            );
				            $wp_query_content->set( 'wc_query', 'product_query' );
				            $td_woo_state_archive_product_page->set_wp_query($wp_query_content);
				            break;
			            case 'woo_search_archive':
				            // get the content wp_query
				            $wp_query_content = new WP_Query( array(
						            'post_type' => 'product',
						            's' => $tdbLoadDataFromId
					            )
				            );
				            //print_r($wp_query_content);
				            $wp_query_content->set( 'wc_query', 'product_query' );
				            $td_woo_state_search_archive_product_page->set_wp_query($wp_query_content);
				            break;
			            case 'woo_shop_base':
				            // get the content wp_query
				            $wp_query_content = new WP_Query( array(
						            'post_type' => 'product',
					            )
				            );
				            $wp_query_content->set( 'wc_query', 'product_query' );
				            $td_woo_state_shop_base_page->set_wp_query($wp_query_content);
			            	break;
		            }
	            }
            });

        }
    }

    /**
     * Here we build the state for the templates when is accessed on the front end,
     *  - we have to do it on this hook because we want to use the wordpress wp_query from it's main query.
     *  - Why we use two hooks to store the state: when td-composer is editing a single template, the main query is the template's query
     *      so we have to make a new query, unlike here where we already have the global wp_query available
     *
     */
    static function on_template_redirect_load_state() {

        global $wp_query, $td_woo_state_single_product_page, $td_woo_state_archive_product_page, $td_woo_state_search_archive_product_page, $td_woo_state_shop_base_page;

        // we are on the front end on a product
        if ( is_singular( array( 'product' ) ) ) {
	        $td_woo_state_single_product_page->set_wp_query($wp_query);
        }

		// product attribute tax archive query
	    $is_product_attribute = false;
	    $queried_object = get_queried_object();
	    if ( is_tax() && $wp_query->get( 'wc_query' ) && !empty($queried_object) ) {
		    if ( function_exists( 'taxonomy_is_product_attribute' ) && taxonomy_is_product_attribute( $queried_object->taxonomy ) )
				$is_product_attribute = true;
	    }

        // we are on the front end on a product archive, cat/tag/attribute
	    if (
			( function_exists( 'is_product_category' ) && is_product_category() ) ||
			( function_exists( 'is_product_tag' ) && is_product_tag() ) ||
			$is_product_attribute
	    ) {
		    $td_woo_state_archive_product_page->set_wp_query($wp_query);
        }

        // we are on the front end on products search archive
	    if ( is_search() && $wp_query->get( 'wc_query' ) ) {
		    $td_woo_state_search_archive_product_page->set_wp_query($wp_query);
        }

        // we are on the front end on shop base page
	    elseif ( is_shop() ) {
		    $td_woo_state_shop_base_page->set_wp_query($wp_query);
        }

    }
}
