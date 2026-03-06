<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Travolo Core Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class Travolo_Extension {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Elementor_Test_Extension The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Elementor_Test_Extension An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'init' ] );


		  //Defined Constants
		  if (!defined('TRAVOLO_BADGE')) {
            define('TRAVOLO_BADGE', '<span class="travolo-core-badge"></span>');
        }

	}


	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Add Plugin actions
		add_action( 'elementor/widgets/register', [ $this, 'init_widgets' ] );

        // Register widget scripts
		add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'widget_scripts' ]);

		// Register Editor scripts
		add_action( 'elementor/editor/after_enqueue_scripts', [$this, 'editor_scripts'], 100 );

        // category register
		add_action( 'elementor/elements/categories_registered',[ $this, 'travolo_elementor_widget_categories' ] );


		

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'travolo' ),
			'<strong>' . esc_html__( 'Travolo Core', 'travolo' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'travolo' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'travolo' ),
			'<strong>' . esc_html__( 'Travolo Core', 'travolo' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'travolo' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'travolo' ),
			'<strong>' . esc_html__( 'Travolo Core', 'travolo' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'travolo' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets() {

		$widgets_manager = \Elementor\Plugin::instance()->widgets_manager;

		// Header Elements
		require_once( TRAVOLO_ADDONS . '/header/travolo-megamenu.php' );
		require_once( TRAVOLO_ADDONS . '/header/travolo-search.php' );
		require_once( TRAVOLO_ADDONS . '/header/travolo-mobile-menu.php' );
		require_once( TRAVOLO_ADDONS . '/header/travolo-offcanvas.php' );
		require_once( TRAVOLO_ADDONS . '/header/travolo-logo.php' );
		require_once( TRAVOLO_ADDONS . '/header/travolo-language-switcher.php' );
		require_once( TRAVOLO_ADDONS . '/header/travolo-minicart.php' );
		require_once( TRAVOLO_ADDONS . '/header/header-info.php' );
 
		// Footer Elements
		require_once( TRAVOLO_ADDONS . '/footer-widgets/newsletter-widget.php' );
		require_once( TRAVOLO_ADDONS . '/footer-widgets/travolo-gallery.php' );
		require_once( TRAVOLO_ADDONS . '/footer-widgets/travolo-footer-menu.php' );
		require_once( TRAVOLO_ADDONS . '/footer-widgets/travolo-social-profile.php' );
		require_once( TRAVOLO_ADDONS . '/footer-widgets/news-text-icon.php' );

   
		// genarel widget
		require_once( TRAVOLO_ADDONS . '/widgets/section-title.php' );
		require_once( TRAVOLO_ADDONS . '/widgets/travolo-feature-box.php' );
		require_once( TRAVOLO_ADDONS . '/widgets/travolo-cta.php' );
		require_once( TRAVOLO_ADDONS . '/widgets/blog-post.php' );
		require_once( TRAVOLO_ADDONS . '/widgets/button.php' );
		// require_once( TRAVOLO_ADDONS . '/widgets/travolo-destinations.php' );
		require_once( TRAVOLO_ADDONS . '/widgets/travolo-testimonial-slider.php' );
		require_once( TRAVOLO_ADDONS . '/widgets/testimonial-two.php' );
		require_once( TRAVOLO_ADDONS . '/widgets/travolo-video-box.php' );
		require_once( TRAVOLO_ADDONS . '/widgets/travolo-shape.php' );
		require_once( TRAVOLO_ADDONS . '/widgets/check-list.php' );
		require_once( TRAVOLO_ADDONS . '/widgets/image-box.php' );
		require_once( TRAVOLO_ADDONS . '/widgets/countdown-box.php' );
		require_once( TRAVOLO_ADDONS . '/widgets/history.php' );
		require_once( TRAVOLO_ADDONS . '/widgets/contact-box.php' );
		require_once( TRAVOLO_ADDONS . '/widgets/brand-list.php' );



		// Sliders
		require_once( TRAVOLO_ADDONS . '/widgets/hero-slider/slider-one.php' );
		require_once( TRAVOLO_ADDONS . '/widgets/hero-slider/slider-two.php' );
		require_once( TRAVOLO_ADDONS . '/widgets/hero-slider/slider-three.php' );
		require_once( TRAVOLO_ADDONS . '/widgets/hero-slider/slider-four.php' );
		


		// Common Widget
		// require_once( TRAVOLO_ADDONS . '/widgets/travolo-featured-image.php' );
		// require_once( TRAVOLO_ADDONS . '/widgets/travolo-list-icon.php' );
	}

    public function widget_scripts() {
        wp_enqueue_script(
            'travolo-frontend-script',
            TRAVOLO_PLUGDIRURI . 'assets/js/travolo-frontend.js',
            array('jquery'),
            false,
            true
		);
		wp_enqueue_style( 
            'travolo-widget-style',
            TRAVOLO_PLUGDIRURI . 'assets/css/style.css',
			microtime()
		);
	}
	public function editor_scripts() {
		wp_enqueue_style(
            'travolo-editor-style',
            TRAVOLO_PLUGDIRURI . 'assets/css/editor.css',
			microtime()
		);
    }




    function travolo_elementor_widget_categories( $elements_manager ) {
        $elements_manager->add_category(
            'travolo',
            [
                'title' => __( 'Travolo', 'travolo' ),
                'icon' 	=> 'fa fa-plug',
            ]
        );
        $elements_manager->add_category(
            'travolo_footer_elements',
            [
                'title' => __( 'Travolo Footer Elements', 'travolo' ),
                'icon' 	=> 'fa fa-plug',
            ]
		);
		$elements_manager->add_category(
            'travolo_header_elements',
            [
                'title' => __( 'Travolo Header Elements', 'travolo' ),
                'icon' 	=> 'fa fa-plug',
            ]
        );

	}

}
Travolo_Extension::instance();