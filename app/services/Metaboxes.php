<?php
namespace events;

use \events\Main;
use \events\EventDecorator;
use \LolitaFramework\Data\Loc;
use \LolitaFramework\LF;

/**
 * Metaboxes service
 */
class Metaboxes {

	/**
	 * Options metaboxes
	 *
	 * @return void
	 */
	public static function options() {
		$p = EventDecorator::set_defaults_meta( EventDecorator::all_meta( Loc::post() ) );
		wp_nonce_field( 'super_secret', 'lf_nonce' );
		echo Main::render(
			array( 'p' => $p ),
			'event-options'
		);
	}

	/**
	 * Save metabox values
	 *
	 * @param  int    $post_id input id.
	 * @param  string $post    input object.
	 * @return void
	 */
	public static function save_post( $post_id, $post = '' ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		$nonce_name   = isset( $_POST['lf_nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['lf_nonce'] ) ) : '';
		$nonce_action = 'super_secret';
		if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) ) {
			return;
		}
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
		// Check if not a revision.
		if ( wp_is_post_revision( $post_id ) ) {
			return;
		}
		if ( array_key_exists( 'post_ID', $_POST ) ) {
			$post_id  = intval( $_POST['post_ID'] );
			$location = isset( $_POST['location'] ) ? sanitize_text_field( wp_unslash( $_POST['location'] ) ) : '';
			$from     = isset( $_POST['from'] ) ? sanitize_text_field( wp_unslash( $_POST['from'] ) ) : '';
			$to       = isset( $_POST['to'] ) ? sanitize_text_field( wp_unslash( $_POST['to'] ) ) : '';

			$meta = array(
				array( $post_id, 'location', $location ),
				array( $post_id, 'from', $from ),
				array( $post_id, 'to', $to ),
			);
			LF::map(
				$meta,
				function( $el ) {
					// phpcs:disable
					list( $post_id, $meta_key, $meta_value ) = $el;
					// phpcs:enable
					update_post_meta( $post_id, $meta_key, $meta_value );
					return $el;
				}
			);
		}
	}
}
