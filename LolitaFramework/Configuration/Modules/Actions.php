<?php
namespace LolitaFramework\Configuration\Modules;

/**
 * Actions configuration module
 */
class Actions {

	/**
	 * Class constructor
	 *
	 * @param mixed $lf Lolita Framework instance.
	 * @param mixed $data config data.
	 */
	public function __construct( $lf, $data = array() ) {
		$data->map( array( &$this, 'add' ) );
	}

	/**
	 * Add action
	 *
	 * @param array $el action data.
	 */
	public function add( $el ) {
		add_action( $el['tag'], $el['function_to_add'], $el['priority'], $el['accepted_args'] );
		return $el;
	}

	/**
	 * Set dafault data
	 *
	 * @param array $item Input.
	 */
	public static function defaults( $item ) {
		return array_merge(
			array(
				'priority'      => 10,
				'accepted_args' => 1,
			),
			$item
		);
	}

	/**
	 * Get required arguments
	 *
	 * @return array
	 */
	public static function required() {
		return array(
			'tag',
			'function_to_add',
		);
	}
}
