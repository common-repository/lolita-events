<?php
/**
 * Plugin Name: Lolita Events
 * Plugin URI:  https://example.com
 * Description: WordPress Event Calendar Plugin.
 * Author:      Eugen Guriev
 * Version:     0.1
 *
 * @package    Events
 * @author     Eugen Guriev
 * @since      0.1
 * @license    GPL-2.0+
 * @copyright  Copyright (c) 2019
 */

// ==============================================================
// Constants
// ==============================================================
if ( ! defined( 'LF_EVENTS_URL' ) ) {
	define( 'LF_EVENTS_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'LF_EVENTS_VERION' ) ) {
	define( 'LF_EVENTS_VERION', '1.0.0' );
}

// ==============================================================
// Bootstraping
// ==============================================================
if ( ! class_exists( '\LolitaFramework\LF' ) ) {
	require_once( 'LolitaFramework/LF.php' );
	\LolitaFramework\LF::get_instance()->addModule( 'Configuration' );
}
