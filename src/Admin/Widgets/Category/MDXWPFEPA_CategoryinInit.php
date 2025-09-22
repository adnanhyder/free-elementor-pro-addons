<?php
/**
 * Category Init.
 * Php version 8.0.0
 *
 * @category Plugin
 * @package  mdxwpfepa-Pack
 * @author   Adnan Hyder Pervez <12345adnan@gmail.com>
 * @license  GNU General Public License v3.0
 * @link     #
 */

namespace MDXWPFEPA_Pack\Admin\Widgets\Category;

defined( 'ABSPATH' ) || exit;

/**
 * Class Admin Init.
 * Php version 8.0.0
 *
 * @category Plugin
 * @package  mdxwpfepa-Pack
 * @author   Adnan Hyder Pervez <12345adnan@gmail.com>
 * @license  GNU General Public License v3.0
 * @link     #
 */

class MDXWPFEPA_CategoryinInit {

	/**
	 * The single instance of the class.
	 *
	 * @var   MDXWPFEPA_CategoryinInit|null $instance .
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
	 * @return void
	 * @since  1.0.0
	 */
	public function hooks() {

		// to add widget category.
		add_action( 'elementor/elements/categories_registered', array( $this, 'mdxwpfepa_add_widget_categories' ) );
	}


	/**
	 * register new category for elementor widgets .
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since  1.0.0
	 */
	public function mdxwpfepa_add_widget_categories( $elements_manager ) {
		$elements_manager->add_category(
			'mdxwpfepa-pack',
			array(
				'title' => esc_html__( 'Free Addons Pro Addons', 'mdxwp' ),
				'icon'  => 'fa fa-plug',
			)
		);

	}


	/**
	 * AdminInit Instance.
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @return MDXWPFEPA_CategoryinInit instance.
	 * @since  1.0.0
	 */
	public static function instance(): MDXWPFEPA_CategoryinInit {

		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Cloning is forbidden.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function __clone() {
		// Override this PHP function to prevent unwanted copies of your instance.
		// Implement your own error or use `wc_doing_it_wrong().
	}

	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function __wakeup() {
		// Override this PHP function to prevent unwanted copies of your instance.
		// Implement your own error or use `wc_doing_it_wrong().
	}
}
