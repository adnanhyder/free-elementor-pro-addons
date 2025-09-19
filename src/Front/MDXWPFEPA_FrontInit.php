<?php
/**
 * Front Init.
 * Php version 8.0.0
 *
 * @category Plugin
 * @package  mdxwpfepa-Pack
 * @author   Adnan Hyder Pervez <12345adnan@gmail.com>
 * @license  GNU General Public License v3.0
 * @link     #
 */

namespace MDXWPFEPA_Pack\Front;

defined( 'ABSPATH' ) || exit;

/**
 * Front Init class.
 * Php version 8.0.0
 *
 * @category Plugin
 * @package  mdxwpfepa-Pack
 * @author   Adnan Hyder Pervez <12345adnan@gmail.com>
 * @license  GNU General Public License v3.0
 * @link     #
 */
class MDXWPFEPA_FrontInit {


	/**
	 * The single instance of the class.
	 *
	 * @var   MDXWPFEPA_FrontInit|null $instance.
	 * @since 1.0.0
	 */
	protected static $instance = null;

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	protected function __construct() {
		$this->hooks();
	}

	/**
	 * Hooks Loaded.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function hooks() {

		// add_action( 'the_content', array( $this, 'display_voting_feature' ) );.
	}

	/**
	 * FrontInit Instance.
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @return MDXWPFEPA_FrontInit instance.
	 * @since  1.0.0
	 */
	public static function instance(): MDXWPFEPA_FrontInit {

		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Cloning is forbidden.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function __clone() {
		// Override this PHP function to prevent unwanted copies of your instance.
		// Implement your own error or use `wc_doing_it_wrong().
	}

	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function __wakeup() {
		// Override this PHP function to prevent unwanted copies of your instance.
		// Implement your own error or use `wc_doing_it_wrong().
	}
}
