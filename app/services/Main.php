<?php
namespace events;

use \LolitaFramework\LF;
/**
 * Main service
 */
class Main {
	/**
	 * Render view
	 *
	 * @param  array  $data input data.
	 * @param  string $name view name.
	 * @return string
	 */
	public static function render( $data, $name ) {
		return LF::render(
			$data,
			LF::join(
				array(
					dirname( __DIR__ ),
					'views',
					$name,
				)
			)
		);
	}

	/**
	 * Check ajax referer
	 *
	 * @param  string $action    name.
	 * @param  array  $query_arg input.
	 * @return void
	 */
	public static function check_ajax_referer( $action, $query_arg ) {
		if ( defined( 'WP_DEBUG' ) && true !== WP_DEBUG ) {
			check_ajax_referer( $action, $query_arg );
		}
	}
}
