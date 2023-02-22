<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  ostrich-education 1.0.0
 * @access public
 */
final class Ostrich_Education_Go_Pro {

	/**
	 * Returns the instance.
	 *
	 * @since ostrich-education 1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since ostrich-education 1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since ostrich-education 1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since ostrich-education 1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require get_template_directory() . '/inc/customizer/section-go-pro.php';

		// Register custom section types.
		$manager->register_section_type( 'Ostrich_Education_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Ostrich_Education_Customize_Section_Pro(
				$manager,
				'ostrich-education',
				array(
					'title'    => esc_html__( 'Ostrich Education Pro','ostrich-education' ),
					'pro_text' => esc_html__( 'Buy Pro','ostrich-education' ),
					'pro_url'  => esc_url( 'https://themeostrich.com/downloads/ostrich-education-pro/' )
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since ostrich-education 1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'ostrich-education-go-pro-customize-controls', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/go-pro-customize-controls.js', array( 'customize-controls' ) );

	}
}

// Doing this customizer thang!
Ostrich_Education_Go_Pro::get_instance();
