<?php
namespace events;

use \WP_Widget;
use \events\Main;

/**
 * List Widget
 */
class ListWidget extends WP_Widget {

	/**
	 * Widget constructor
	 */
	public function __construct() {
		parent::__construct(
			'lolita_events',
			'Lolita Events',
			array( 'description' => 'A widget that displays upcoming events.' )
		);
	}

	/**
	 * Show widget
	 *
	 * @param  array $args     widget arguments.
	 * @param  array $instance saved data.
	 * @return void
	 */
	public function widget( $args, $instance ) {
		$args['title'] = apply_filters( 'widget_title', $instance['title'] );
		echo Main::render(
			$args,
			'widget' . DIRECTORY_SEPARATOR . 'widget'
		);
	}

	/**
	 * Update widget options
	 *
	 * @param  array $new_instance input.
	 * @param  array $old_instance old instance.
	 * @return array               output.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

	/**
	 * Show widget options on form
	 *
	 * @param  array $instance saved data.
	 * @return void
	 */
	public function form( $instance ) {
		echo Main::render(
			array(
				'title_id'   => $this->get_field_id( 'title' ),
				'title_name' => $this->get_field_name( 'title' ),
				'title'      => ! empty( $instance['title'] ) ? $instance['title'] : 'Lolita Events',
			),
			'widget' . DIRECTORY_SEPARATOR . 'form'
		);
	}
}
