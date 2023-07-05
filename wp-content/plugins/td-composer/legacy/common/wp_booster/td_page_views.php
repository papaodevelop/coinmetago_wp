<?php
class td_page_views {

	// the name of the field used for general count
    static $post_view_counter_key = 'post_views_count';

    // the name of the field where 7 days counter are kept(in a serialized array) for the given post
    private static $post_view_counter_7_day_array = 'post_views_count_7_day_arr';

    // the name of the field for the total of 7 days
    static $post_view_counter_7_day_total = 'post_views_count_7_day_total';

    // the name of the field for the 7 days last page view - used on td_data_source to filter the posts with views older than 7 days
    static $post_view_counter_7_day_last_date = 'post_views_count_7_day_last_date';

	// the name of the field for the last day
    private static $post_view_7days_last_day = 'post_view_7days_last_day';

	// the name of the field that stores the total no of views from last 24 hours (last day)
    static $post_views_last_24_hours_total = 'post_views_last_24_hours';

	// the name of the field that stores the total no of views from last 48 hours (last 2 days)
    static $post_views_last_48_hours_total = 'post_views_last_48_hours';

    // used only in single.php to update the views
    static function update_page_views( $postID ) {

        $td_post_theme_settings = td_util::get_post_meta_array( $postID, 'td_post_theme_settings' );
        $is_tdb_template = false;

        if ( ! empty( $td_post_theme_settings[ 'td_post_template' ] ) ) {
            $single_template_id = $td_post_theme_settings[ 'td_post_template' ];
            // make sure the template exists, maybe it was deleted or something
            if ( td_global::is_tdb_template( $single_template_id, true ) ) {
                $is_tdb_template = td_global::is_tdb_template( $single_template_id, true );
            }
        } else {
            // read the global setting
            $default_template_id = td_util::get_option( 'td_default_site_post_template' );
            // make sure the template exists, maybe it was deleted or something
            if ( td_global::is_tdb_template( $default_template_id, true ) ) {
                $is_tdb_template = td_global::is_tdb_template( $default_template_id, true );
            }
        }

        //hide post views from panel only on standard templates
        if ( td_util::get_option('tds_p_show_views' ) == 'hide' && !$is_tdb_template ) {
            return;
        }

        global $page;

        // $page == 1 - fix for yoast
        if ( is_single() and ( empty( $page ) or $page == 1 ) ) {  // do not update the counter only on single posts that are on the first page of the post

            // use general single page count only when `ajax_post_view_count` is disabled
            if( td_util::get_option('tds_ajax_post_view_count') != 'enabled' ) {

                // used for general count
                $count = get_post_meta( $postID, self::$post_view_counter_key, true );

                if ( $count == '' ){
                    update_post_meta( $postID, self::$post_view_counter_key, 1 );
                } else {
                    $count++;
                    update_post_meta( $postID, self::$post_view_counter_key, $count );
                }

            }

            // stop here if
            if ( td_util::get_option('tds_p_enable_7_days_count') != 'enabled' ) {
                return;
            }

            // debug - reset array
            //update_post_meta( $postID, self::$post_view_counter_7_day_array, array() );

            // used for 7 day count array
            $current_day = date("N") - 1;  // get the current day
            $current_date = date("U"); // get the current Unix date
            $current_hour = date("G"); // get the current hour
            $count_7_day_array = td_util::get_post_meta_array( $postID, self::$post_view_counter_7_day_array );  // get the array with day of week -> count

	        //echo '<pre class="td-container">';
	        	//print_r( $count_7_day_array );
	        //echo '</pre>';

            // check if the first entry is an array (used to detect and reset the older themes array)
            if ( isset( $count_7_day_array[0] ) && is_array( $count_7_day_array[0] ) ) {

                if ( isset( $count_7_day_array[$current_day] ) ) { // check to see if the current day is defined - if it's not defined it's not ok.

                    // check if the current day matches the 'date' key inside the count_7_day array
                    $current_day_of_the_year = date('z', $current_date );
                    $count_7_day_of_the_year = date('z', $count_7_day_array[$current_day]['date'] );
                    if ( get_post_meta( $postID, self::$post_view_7days_last_day, true ) == $current_day && $count_7_day_of_the_year == $current_day_of_the_year ) {

                        // the day was not changed since the last update - increment the count
                        $count_7_day_array[$current_day]['count']++;

	                    // increment per hour count
	                    if ( !isset( $count_7_day_array[$current_day]['per_hour_count'][$current_hour] ) ) {
		                    $count_7_day_array[$current_day]['per_hour_count'][$current_hour] = 0;
	                    }
	                    $count_7_day_array[$current_day]['per_hour_count'][$current_hour]++;

                    } else {

                        // the day was changed since the last update - reset the current day
                        $count_7_day_array[$current_day]['count'] = 1;

						// increment per hour count
	                    if ( !isset( $count_7_day_array[$current_day]['per_hour_count'][$current_hour] ) ) {
		                    $count_7_day_array[$current_day]['per_hour_count'][$current_hour] = 0;
	                    }
	                    $count_7_day_array[$current_day]['per_hour_count'][$current_hour]++;

                        // set the current date
                        $count_7_day_array[$current_day]['date'] = $current_date;

                        // reset old entries inside the 7 days array (older than 7 days)
                        $one_week_ago = $current_date - 604800;
                        foreach ( $count_7_day_array as $day => $parameters ) {
                            if ( $parameters['date'] < $one_week_ago ) {
                                $count_7_day_array[$day] = array( 'date' => 0, 'count' => 0 );
                            }
                        }

                        // update last day with the current day
                        update_post_meta( $postID, self::$post_view_7days_last_day, $current_day );

                        // update last date with the current date - it only updates once when the day changes
                        update_post_meta( $postID, self::$post_view_counter_7_day_last_date, $current_date );

                    }

                    // update the array
                    update_post_meta( $postID, self::$post_view_counter_7_day_array, $count_7_day_array );

                    // sum the 7days/24h/48h total count
                    $sum_7_day_count = $sum_24_hours_count = $sum_48_hours_count = 0;
	                $last_day = $current_day - 1;
	                $last_2_days = $current_day - 2;
                    foreach ( $count_7_day_array as $day => $parameters ) {

						// add to the 7 days total count
                        $sum_7_day_count += $parameters['count'];

						// add to the past 24 hours ( last day ) count
	                    if ( $day === $last_day || $day === $current_day ) {

							// the past day
							if ( $day === $last_day ) {

								// if we have per_hour_counts set ( and a valid data type > array ) for the past day
								if ( isset( $parameters['per_hour_count'] ) && is_array( $parameters['per_hour_count'] ) ) {

									// run through yesterday's hours counts
									foreach ( $parameters['per_hour_count'] as $hour => $counts_per_hour ) {

										// add the per hour count from the last day for hours past the current hour
										if ( $hour >= $current_hour ) {

											// add hour count
											$sum_24_hours_count += $counts_per_hour;

										}
									}
								}

							} else {
								// add toady's count
								$sum_24_hours_count += $parameters['count'];
							}

	                    }

						// add to the past 48 hours ( last 2 days ) count
	                    if ( $day === $last_day || $day === $last_2_days || $day === $current_day ) {

							if ( $day === $last_2_days ) { // 2 days ago

								// if we have per_hour_counts set ( and a valid data type > array )
								if ( isset( $parameters['per_hour_count'] ) && is_array( $parameters['per_hour_count'] ) ) {

									// run through hours counts
									foreach ( $parameters['per_hour_count'] as $hour => $counts_per_hour ) {

										// add the per hour count from 2 days ago for hours past the current hour
										if ( $hour >= $current_hour ) {

											// add hour count
											$sum_48_hours_count += $counts_per_hour;

										}
									}
								}

							} else { // today and the past day ( yesterday )
								// add toady's count
								$sum_48_hours_count += $parameters['count'];
							}

	                    }

                    }

	                //echo '<pre class="td-container">24hrs count: ' . print_r( $sum_24_hours_count, true ) . '</pre>';
	                //echo '<pre class="td-container">48hrs count: ' . print_r( $sum_48_hours_count, true ) . '</pre>';

					// update the 7 days total count
                    update_post_meta( $postID, self::$post_view_counter_7_day_total, $sum_7_day_count );

					// update the total count from last 24 hours (last day)
                    update_post_meta( $postID, self::$post_views_last_24_hours_total, $sum_24_hours_count );

					// update the total count from last 48 hours (last 2 days)
                    update_post_meta( $postID, self::$post_views_last_48_hours_total, $sum_48_hours_count );

                }

            } else {

                // the array is not initialized
                $count_7_day_array = array(
                    0 => array( 'date' => 0, 'count' => 0 ),
                    1 => array( 'date' => 0, 'count' => 0 ),
                    2 => array( 'date' => 0, 'count' => 0 ),
                    3 => array( 'date' => 0, 'count' => 0 ),
                    4 => array( 'date' => 0, 'count' => 0 ),
                    5 => array( 'date' => 0, 'count' => 0 ),
                    6 => array( 'date' => 0, 'count' => 0 )
                );
                $count_7_day_array[$current_day]['count'] = 1; // add one view on the current day
                $count_7_day_array[$current_day]['date'] = $current_date; // set the current date

                // update the array
                update_post_meta( $postID, self::$post_view_counter_7_day_array, $count_7_day_array );

                // update last day with the current day
                update_post_meta( $postID, self::$post_view_7days_last_day, $current_day );

                // update last date with the current date
                update_post_meta( $postID, self::$post_view_counter_7_day_last_date, $current_date );

                // update the 7 days total - 1 view :)
                update_post_meta( $postID, self::$post_view_counter_7_day_total, 1 );

            }


            // debug
            //update_post_meta( $postID, self::$post_view_counter_7_day_last_date, ( $current_date - 604800 ) );
	        // last 7 days
			//$count_7_day_array = get_post_meta( $postID, self::$post_view_counter_7_day_array, true );
			//$count_7_day_total = get_post_meta( $postID, self::$post_view_counter_7_day_total, true );
			//$count_7_day_total_all = get_post_meta( $postID, self::$post_view_counter_key, true );
			//$count_7_day_lastday = get_post_meta( $postID, self::$post_view_7days_last_day, true );
			//$count_7_day_lastdate = get_post_meta( $postID, self::$post_view_counter_7_day_last_date, true );
			//echo '<pre class="td-container">';
			//	print_r( $count_7_day_array );
			//	echo "<br>total per week: " . $count_7_day_total;
			//	echo "<br>total all time: " . $count_7_day_total_all;
			//	echo '<br>last day: ' . $count_7_day_lastday;
			//	echo '<br>last date: ' . date('Y-m-d', $count_7_day_lastdate );
			//	echo '<br>$current_date: ' . date('Y-m-d', $current_date );
			//	echo '<br>7 days ago (YYYY-MM-DD): ' . date('Y-m-d', strtotime('-7 day', $current_date ) );
			//	echo '<br>';
			//echo '</pre>';

        }

    }

    static function get_page_views( $post_id ) {
        $count = get_post_meta( $post_id, self::$post_view_counter_key, true );

        if ( $count == '' ) {
            delete_post_meta( $post_id, self::$post_view_counter_key );
            add_post_meta( $post_id, self::$post_view_counter_key, '0' );
            return "0";
        }

        return $count;

    }

    static function get_total( $post_id, $timeframe ) {

		switch ( $timeframe ) {
			case '24h':
				$count = get_post_meta( $post_id, self::$post_views_last_24_hours_total, true );
				break;
			case '48h':
				$count = get_post_meta( $post_id, self::$post_views_last_48_hours_total, true );
				break;
			case '7days':
				$count = get_post_meta( $post_id, self::$post_view_counter_7_day_total, true );
				break;
			default:
				$count = '';
		}

        if ( $count == '' ) {
            delete_post_meta( $post_id, self::$post_view_counter_7_day_total );
            add_post_meta( $post_id, self::$post_view_counter_7_day_total, '0' );
            return "0";
        }

        return $count;

    }

    static function on_manage_posts_columns_views( $defaults ) {

        $defaults['td_post_views'] = 'Views'; // total all time

        //$defaults['td_post_views_24h'] = 'last 24 hours';
        //$defaults['td_post_views_48h'] = 'last 48 hours';
        //$defaults['td_post_views_7'] = 'last 7 days';

        return $defaults;
    }

    static function on_manage_posts_custom_column( $column_name, $post_id ) {

        if( $column_name === 'td_post_views' ) {
            echo self::get_page_views( $post_id );
        }

		//if( $column_name === 'td_post_views_24h' ) {
		    //echo self::get_total( $post_id, '24h' );
		//}

		//if( $column_name === 'td_post_views_48h' ) {
		    //echo self::get_total( $post_id, '48h' );
		//}

		//if( $column_name === 'td_post_views_7' ) {
		    //echo self::get_total( $post_id, '7days' );
		//}

    }

}


