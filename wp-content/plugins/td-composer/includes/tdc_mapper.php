<?php
/**
 * Created by ra.
 * Date: 3/31/2016
 */

class tdc_mapper {


	private static $mapped_shortcodes;

	private static $mapped_block_templates;

	private static $external_shortcodes = array();


	/**
	 * Mapper function - it registers a new shortcode in tagDiv Composer. Please note that you still have to manually register the shortcode
	 * in WordPress
	 * This does not use the 'map_in_visual_composer' attribute. We map anything that is sent here! the atribute is used in tdc_map.php
	 * @param $attributes
	 */
	static function map_shortcode($attributes) {
		// 'base' attribute is required! is used as a key. It's probably some kind of backwards compatibility in VC
		if (!isset($attributes['base'])) {
		    echo 'The base attribute is requiered for all the shortcodes';
		}

		if (isset(self::$mapped_shortcodes[$attributes['base']])) {
		    echo 'Shortcode ' . $attributes['base'] . ' already mapped, please use the update method to update it!';
		}

		if (tdc_state::get_start_composer_for_mobile()) {

			if (!empty($attributes['tdc_start_values'])) {
				$tdc_start_values = json_decode( base64_decode($attributes['tdc_start_values']), true);

				$changed = false;

				if (!empty($tdc_start_values) && count($tdc_start_values)) {

					foreach ($tdc_start_values[0] as $prop_name => &$prop_value) {

						if ( base64_decode( $prop_value, true ) && base64_encode( base64_decode( $prop_value, true ) ) === $prop_value && mb_detect_encoding( base64_decode( $prop_value, true ) ) === mb_detect_encoding( $prop_value ) ) {

							$decoded_values = base64_decode( $prop_value, true );
							$values         = json_decode( $decoded_values, true );

							if ( isset( $values[ 'type' ] ) && 'gradient' === $values[ 'type' ] ) {
								continue;
							}

							$final_values = [];

							if ( ! isset( $values[ 'phone' ] ) && isset( $values[ 'all' ] ) ) {
								$final_values[ 'phone' ] = $values[ 'all' ];
							}

							if ( isset( $values[ 'portrait' ] ) ) {
								$final_values[ 'all' ] = $values[ 'portrait' ];
							} else if ( isset( $values[ 'all' ] ) ) {
								$final_values[ 'all' ] = $values[ 'all' ];
							}

							if ( isset( $values[ 'phone' ] ) ) {
								$final_values[ 'phone' ] = $values[ 'phone' ];
							}

							$prop_value = base64_encode( json_encode( $final_values ) );

							$changed = true;
						}
					}
				}

				if ( $changed ) {
					$attributes[ 'tdc_start_values' ] = base64_encode( json_encode( $tdc_start_values ) );
				}
			}
		}

		self::$mapped_shortcodes[$attributes['base']] = $attributes;
	}


	/**
	 * Save the mapped block templates to the composer (each block mapping being changed according with its block template setting)
	 *
	 * @param $attibutes
	 */
	static function map_block_templates($attibutes) {
		self::$mapped_block_templates = $attibutes;
	}



	/**
	 * @param $base
	 * @return bool
	 */
	static function get_attributes($base) {
		if (isset(self::$mapped_shortcodes[$base])) {
			return self::$mapped_shortcodes[$base];
		}

		echo 'Shortcode with base ' . $base . ' is not mapped!';
		return false;
	}



	static function get_mapped_shortcodes() {
		return self::$mapped_shortcodes;
	}

	static function get_mapped_block_templates() {
		return self::$mapped_block_templates;
	}



	static function set_external_shortcodes( $external_shortcodes ) {
		self::$external_shortcodes = $external_shortcodes;
	}

	static function add_external_shortcodes( $external_shortcodes ) {
		self::$external_shortcodes = array_merge( self::$external_shortcodes, $external_shortcodes );
	}

	static function get_external_shortcodes() {
		return self::$external_shortcodes;
	}




	// @todo this should be removed
	static function _debug_get_all() {
		return self::$mapped_shortcodes;
	}
}
