<?php
namespace events;

use \events\Main;

/**
 * Settings service
 */
class Settings {

	/**
	 * Nonce
	 */
	const NONCE = 'lf_events_settings';

	/**
	 * Settings page
	 *
	 * @return void
	 */
	public static function page() {
		echo Main::render( array(), 'events-settings' );
	}

	/**
	 * Save settings
	 *
	 * @return void
	 */
	public static function save_settings() {
		Main::check_ajax_referer( self::NONCE, 'nonce' );
		// phpcs:disable
		if ( isset( $_POST['api'] ) ) {
			wp_send_json_success( update_option( self::NONCE . '_google_api', wp_unslash( $_POST['api'] ) ) );
		} else {
			wp_send_json_error( 'API is required!' );
		}
		// phpcs:enable
	}

	/**
	 * Get settings data
	 *
	 * @return array
	 */
	public static function data() {
		return array(
			'nonce'      => wp_create_nonce( self::NONCE ),
			'google_api' => self::api(),
			'ajax_url'   => admin_url( 'admin-ajax.php' ),
		);
	}

	/**
	 * Get google api
	 *
	 * @return string
	 */
	public static function api() {
		return get_option( self::NONCE . '_google_api', 'AIzaSyBXr6Pu3fynyEfRBWnWx1Q6dkSkhVQ-hZU' );
	}
}
