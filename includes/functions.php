<?php
/**
 * Functions.
 * This file contains all the functions which are used in the plugin.
 *
 * Php version 8.0.0
 *
 * @category Plugin
 * @package  mdxwpfepa-Pack
 * @author   Adnan Hyder Pervez <12345adnan@gmail.com>
 * @license  GNU General Public License v3.0
 * @link     #
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'mdxwpfepa_sanitize_thing' ) ) {
	/**
	 * Recursive sanitation for text, integer or array.
	 *
	 * @param array|string $var Array or string to sanitize.
	 *
	 * @return array
	 * @since  1.0.0
	 */
	function mdxwpfepa_sanitize_thing( $variable ) {

		if ( is_array( $variable ) ) {
			return array_map( 'mdxwpfepa_sanitize_thing', $variable );
		} else {
			return is_scalar( $variable ) ? sanitize_text_field( wp_unslash( $variable ) ) : $variable;
		}
	}
}
