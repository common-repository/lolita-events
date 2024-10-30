<?php
namespace events;

use \LolitaFramework\LF;
use \LolitaFramework\Data\Loc;
/**
 * Assets service
 */
class Assets {

	/**
	 * Base js path
	 *
	 * @return string
	 */
	public static function base_js() {
		return LF::join(
			array(
				LF_EVENTS_URL,
				'app',
				'assets',
				'js',
				'base.js',
			)
		);
	}

	/**
	 * Base js path
	 *
	 * @return string
	 */
	public static function register_block_js() {
		return LF::join(
			array(
				LF_EVENTS_URL,
				'app',
				'assets',
				'js',
				'register-block.js',
			)
		);
	}

	/**
	 * Vendors js path
	 *
	 * @return string
	 */
	public static function events_settings_vendors_js() {
		return LF::join(
			array(
				LF_EVENTS_URL,
				'app',
				'vue',
				'dist',
				'js',
				'chunk-vendors.js',
			)
		);
	}

	/**
	 * Vendors css path
	 *
	 * @return string
	 */
	public static function events_settings_vendors_css() {
		return LF::join(
			array(
				LF_EVENTS_URL,
				'app',
				'vue',
				'dist',
				'css',
				'chunk-vendors.css',
			)
		);
	}

	/**
	 * App js path
	 *
	 * @return string
	 */
	public static function events_settings_js() {
		return LF::join(
			array(
				LF_EVENTS_URL,
				'app',
				'vue',
				'dist',
				'js',
				'app.js',
			)
		);
	}

	/**
	 * App css path
	 *
	 * @return string
	 */
	public static function events_settings_css() {
		return LF::join(
			array(
				LF_EVENTS_URL,
				'app',
				'vue',
				'dist',
				'css',
				'app.css',
			)
		);
	}

	/**
	 * Is events settings condition
	 *
	 * @return boolean
	 */
	public static function is_events_settings() {
		return 'events-settings' === Lf::get( $_GET, 'page', '' ) || 'event' === Lf::get( (array) Loc::post(), 'post_type', '' ) || ! is_admin();
	}

	/**
	 * CSS version
	 *
	 * @return number
	 */
	public static function version() {
		return LF_EVENTS_VERION;
	}
}
