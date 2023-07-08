<?php


class tds_leads_api {

	/**
	 * tds_leads api method to add a new td subscription email(lead) cpt
	 *
	 * @param array $data_array - the email(lead) cpt data array
	 *
	 *      $data_array = array(
	 *          'tds_email' => , // td subscription email(lead)
	 *          'tds_list_id' => , // tds_list taxonomy id
	 *      )
	 *
	 * @return array - an array containing the response type( success or error ), response id & message
	 *
	 */
	static function add( $data_array = array() ): array {

		if ( !empty( $data_array ) ) {

			$tds_email = $data_array['tds_email'] ? sanitize_email( $data_array['tds_email'] ) : '';

			if ( !empty( $tds_email ) ) {

				// the locker id
				$tds_locker_id = $data_array['tds_locker_id'];

				// confirm email
                $tds_validate_email = isset($data_array['tds_validate_email']) ? $data_array['tds_validate_email'] : '';

                // the list received
				$tds_list_id = $data_array['tds_list_id'];

				// the default list id
				$default_list_id = (int) get_option( 'default_term_tds_list' );

				// the list we'll search, the list id is required ( if not given the default list will be searched.. )
				$tds_list = !empty($tds_list_id) ? (int) $tds_list_id : $default_list_id;

				// the custom fields
				$tds_custom_fields = $data_array['tds_custom_fields'] ?? array();

				// check if the email was already added to the list
				if ( tds_util::exists( $tds_email, $tds_list ) ) {
					return array(
						'type' => 'error',
						'id' => 'email_found_in_list',
						'message' => 'the email is already found in list!'
					);
				}

				// insert new email (as tds_email cpt)
				$new_tds_email_id = wp_insert_post( array(
					'post_title' => $tds_email,
					'post_type' => 'tds_email',
					'post_status' => 'publish'
				), true );

				if ( is_wp_error( $new_tds_email_id ) ) {
					return array(
						'type' => 'error',
						'id' => 'wp_insert_post_wp_error',
						'message' => 'wp error: ' . $new_tds_email_id->get_error_message()
					);
				} else {

					// set locker id
					if ( !empty( $tds_locker_id ) ) {
						add_post_meta( $new_tds_email_id, 'tds_locker_id', $tds_locker_id );
					}

					// set list
					if ( !empty( $tds_list_id ) ) {
						wp_set_object_terms( $new_tds_email_id, (int) $tds_list_id, 'tds_list' );
					}

					// set custom fields
					if ( !empty( $tds_custom_fields ) ) {
						foreach ( $tds_custom_fields as $tds_custom_field_id => $tds_custom_field_val ) {
							add_post_meta( $new_tds_email_id, $tds_custom_field_id, $tds_custom_field_val );
						}
					}

                    if ( !empty( $tds_validate_email ) ) {
                        add_post_meta($new_tds_email_id, 'tds_validate_email', $tds_validate_email);
                    }

					return array(
						'type' => 'success',
						'id' => 'wp_insert_post_success',
						'message' => 'new tds email: "' . $tds_email . '" successfully added to list with id: "' . $tds_list_id . '"!'
					);

				}

			} else {
				return array(
					'type' => 'error',
					'id' => 'email_missing',
					'message' => 'email is required!'
				);
			}

		} else {
			return array(
				'type' => 'error',
				'id' => 'email_data',
				'message' => 'no data received!'
			);
		}

	}

	static function remove_email( $email ) {
		$tds_email = tds_util::get_post_by_title( $email, 'tds_email' );
		if ( null !== $tds_email ) {
			wp_delete_post( $tds_email->ID );
		}
	}

}
