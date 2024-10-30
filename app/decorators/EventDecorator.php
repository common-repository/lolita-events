<?php
namespace events;

use \LolitaFramework\Data\Chain;

/**
 * Evetn decorator
 */
class EventDecorator {
	/**
	 * Decorate all meta
	 *
	 * @param  stdClass $post input post.
	 * @return stdClass
	 */
	public static function all_meta( $post ) {
		$post->meta = (object) Chain::of( get_post_meta( $post->ID ) )
			->map(
				function( $el ) {
					return $el[0];
				}
			)
			->value();
		return $post;
	}

	/**
	 * Decorate default meta value
	 *
	 * @param stdClass $post input post.
	 */
	public static function set_defaults_meta( $post ) {
		$post->meta = (object) array_merge(
			array(
				'location' => '',
				'from'     => '',
				'to'       => '',
			),
			(array) $post->meta
		);
		return $post;
	}

	/**
	 * Decorate post image
	 *
	 * @param  stdClass $post input post.
	 * @return stdClass
	 */
	public static function image( $post ) {
		$attachment_id = get_post_thumbnail_id( $post );
		$image = wp_get_attachment_image_src( $attachment_id, 'full', false );
		$post->image = array(
			'src'    => '',
			'width'  => '',
			'height' => '',
		);
		if ( $image ) {
			list($src, $width, $height) = $image;
			$post->image['src'] = $src;
			$post->image['width'] = $width;
			$post->image['height'] = $height;
		}
		return $post;
	}
}
