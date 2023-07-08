<?php

class tds_gut {

	public function __construct() {

		// add gutenberg blocks & assets
		add_action( 'init', array( $this, 'register_blocks' ) );

	}

	/**
	 * register tds gutenberg blocks on the backend
	 */
	public function register_blocks() {

		if ( !function_exists('register_block_type' ) )
			return;

		if ( TDS_DEPLOY_MODE === 'deploy' ) {

			wp_register_script('tds-locker-blocks-js',TDS_URL . '/assets/js/js_gutenberg_blocks.min.js',
				array( 'wp-blocks', 'wp-block-editor', 'wp-i18n', 'wp-element', 'wp-components' ),
                TD_SUBSCRIPTION_VERSION
			);

			wp_localize_script(
				'tds-locker-blocks-js',
				'tds_block_editor',
				array(
					'tds_default_locker_id' => (int) get_option( 'tds_default_locker_id' ), // the default locker id
					'tds_lockers' => $this->get_tds_lockers()
				)
			);
		} else {

			wp_register_script(
				'tds-locker-blocks-js',
				TDS_URL . '/assets/js/admin/blocks.js',
				array( 'wp-blocks', 'wp-block-editor', 'wp-i18n', 'wp-element', 'wp-components' ),
				TD_SUBSCRIPTION
			);

			wp_localize_script(
				'tds-locker-blocks-js',
				'tds_block_editor',
				array(
					'tds_default_locker_id' => (int) get_option( 'tds_default_locker_id' ), // the default locker id
					'tds_lockers' => $this->get_tds_lockers()
				)
			);
		}

		wp_register_style('tds-locker-blocks-css',TDS_URL . '/assets/css/tds-blocks.css', array(), TD_SUBSCRIPTION_VERSION );

		$block_types = array(
			'partiallocker',
			'contentlocker',
		);

		foreach( $block_types as $block_type ) {

			register_block_type(
				'tds/' . $block_type,
				array(
					'editor_script' => 'tds-locker-blocks-js',
					'editor_style'  => 'tds-locker-blocks-css',
					'render_callback' => array( $this, 'tds_' . $block_type . '_block_render_callback' ),
					'attributes' => array(
						'id' => array(
							'type' => 'number'
						)
					)
				)
			);

		}

	}

	public function tds_partiallocker_block_render_callback( $attributes, $content ) {
		$attributes['shortcode'] = 'tds_partial_locker';
		return self::tds_block_render_callback( $attributes, $content );
	}

	public function tds_contentlocker_block_render_callback( $attributes, $content ) {
		$attributes['shortcode'] = 'tds_content_locker';
		return self::tds_block_render_callback( $attributes, $content );
	}

	/**
	 * tds block render - builds the block shortcode
	 *
	 * @param array $attributes attributes passed by tds block
	 * @param array $content the tds block content
	 * @return string - the content locker shortcode
	 */
	public function tds_block_render_callback( $attributes, $content ) {

		$tds_locker_id = !empty( $attributes['tdsLockerId'] ) ? (int) $attributes['tdsLockerId'] : ( (int) get_option( 'tds_default_locker_id' ) ? (int) get_option( 'tds_default_locker_id' ) : false );
		$shortcode = !empty( $attributes['shortcode'] ) ? $attributes['shortcode'] : false;

		if ( $tds_locker_id && $shortcode === 'tds_content_locker' ) {
			return "[$shortcode tds_locker_id='$tds_locker_id']" . $content . "[/$shortcode]";
		}

		if ( $tds_locker_id && $shortcode === 'tds_partial_locker' ) {
			return "[$shortcode tds_locker_id='$tds_locker_id']";
		}

		return "[$shortcode]";

	}

	public function get_tds_lockers() {

		$lockers = get_posts( array(
			'post_type' => 'tds_locker',
			'numberposts' => -1
		));

		// the default locker id
		$default_locker_id = (int) get_option( 'tds_default_locker_id' );

		$result = array();
		foreach ( $lockers as $locker ) {
			$result[] = array(
				'id' => $locker->ID,
				'title' => empty( $locker->post_title ) ? '(no titled, ID=' . $locker->ID . ')' : $locker->post_title,
				'isDefault' => ( $locker->ID === $default_locker_id )
			);
		}

		return $result;
	}

}

new tds_gut();