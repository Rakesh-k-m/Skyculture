<?php
/**
 * Theme Ostrich Customizer
 *
 * @package Ostrich Education
 */

/**
 * Get all the default values of the theme mods.
 */
function ostrich_education_get_default_mods() {
	$ostrich_education_default_mods = array(
		// Footer copyright
		'ostrich_education_copyright_txt' => esc_html__( 'Copyright &copy; [the-year] [site-link]  |  ', 'ostrich-education' ),
		'ostrich_education_power_by_txt'	=> sprintf( esc_html__( 'Theme: %1$s by %2$s.', 'ostrich-education' ), 'Ostrich Education', '<a href="' . esc_url( 'http://themeostrich.com/' ) . '">Theme Ostrichs</a>' ),
	);

	return apply_filters( 'ostrich_education_default_mods', $ostrich_education_default_mods );
}

require get_template_directory() . '/inc/customizer/class-go-pro.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ostrich_education_customize_register( $wp_customize ) {

	// Custom Controller
	require get_parent_theme_file_path( '/inc/customizer/custom-controller.php' );

	$default = ostrich_education_get_default_mods();

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'ostrich_education_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'ostrich_education_customize_partial_blogdescription',
		) );
	}

	//Color Panel

	// Header tagline color setting
	$wp_customize->add_setting(	
		'ostrich_education_header_tagline',
		array(
			'sanitize_callback' => 'ostrich_education_sanitize_hex_color',
			'default' => '#929292',
			'transport'	=> 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control( 
		$wp_customize,
			'ostrich_education_header_tagline',
			array(
				'section'		=> 'colors',
				'label'			=> esc_html__( 'Site tagline Color:', 'ostrich-education' ),
			)
		)
	);

	// Header text display setting
	$wp_customize->add_setting(	
		'ostrich_education_header_text_display',
		array(
			'sanitize_callback' => 'ostrich_education_sanitize_checkbox',
			'default' => true,
			'transport'	=> 'postMessage',
		)
	);

	$wp_customize->add_control(
		'ostrich_education_header_text_display',
		array(
			'section'		=> 'title_tagline',
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Display Site Title and Tagline', 'ostrich-education' ),
		)
	);

	// Your latest posts title setting
	$wp_customize->add_setting(	
		'ostrich_education_your_latest_posts_title',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => esc_html__( 'Blogs', 'ostrich-education' ),
			'transport'	=> 'postMessage',
		)
	);

	$wp_customize->add_control(
		'ostrich_education_your_latest_posts_title',
		array(
			'section'		=> 'static_front_page',
			'label'			=> esc_html__( 'Title:', 'ostrich-education' ),
			'active_callback' => 'ostrich_education_is_latest_posts'
		)
	);

	$wp_customize->selective_refresh->add_partial( 
		'ostrich_education_your_latest_posts_title', 
		array(
	        'selector'            => '.home.blog #page-header .page-title',
			'render_callback'     => 'ostrich_education_your_latest_posts_partial_title',
    	) 
    );

	$wp_customize->add_setting( 'ostrich_education_enable_content', array(
		'sanitize_callback'   => 'ostrich_education_sanitize_checkbox',
		'default'             => false,
	) );

	$wp_customize->add_control( 'ostrich_education_enable_content', array(
		'label'       	=> esc_html__( 'Enable Content', 'ostrich-education' ),
		'description' 	=> esc_html__( 'Check to enable content on static front page only.', 'ostrich-education' ),
		'section'     	=> 'static_front_page',
		'type'        	=> 'checkbox',
	) );


	/**
	 * 
	 * Front Section
	 * 
	 */ 

	// Home sections panel
	$wp_customize->add_panel(
		'ostrich_education_home_panel',
		array(
			'title' => esc_html__( 'Homepage Options', 'ostrich-education' ),
			'priority' => 105
		)
	);

	//top-bar
    require get_parent_theme_file_path( '/inc/customizer/homepage/top-bar.php' );

	//slider
    require get_parent_theme_file_path( '/inc/customizer/homepage/slider.php' );

    //service
    require get_parent_theme_file_path( '/inc/customizer/homepage/service.php' );

    //about
	require get_parent_theme_file_path( '/inc/customizer/homepage/about.php' ); 

	//cta
    require get_parent_theme_file_path( '/inc/customizer/homepage/cta.php' );

	//our-courses
    require get_parent_theme_file_path( '/inc/customizer/homepage/our-courses.php' );

    //video
    require get_parent_theme_file_path( '/inc/customizer/homepage/video.php' );
	
	//team
    require get_parent_theme_file_path( '/inc/customizer/homepage/team.php' );
	
	//counter
    require get_parent_theme_file_path( '/inc/customizer/homepage/counter.php' );
	
	//recent-news
    require get_parent_theme_file_path( '/inc/customizer/homepage/recent-news.php' );
  

    // theme options
	$wp_customize->add_panel(
		'ostrich_education_general_panel',
		array(
			'title' => esc_html__( 'Theme Options', 'ostrich-education' ),
			'priority' => 107
		)
	);

	require get_parent_theme_file_path( '/inc/customizer/theme-options/general-setting.php' );

	require get_parent_theme_file_path( '/inc/customizer/theme-options/layout.php' );

	require get_parent_theme_file_path( '/inc/customizer/theme-options/archive.php' );

	require get_parent_theme_file_path( '/inc/customizer/theme-options/footer.php' );

	/**
	 * Reset all settings
	 */
	// Reset settings section
	$wp_customize->add_section(
		'ostrich_education_reset_sections',
		array(
			'title' => esc_html__( 'Reset all', 'ostrich-education' ),
			'description' => esc_html__( 'Reset all settings to default.', 'ostrich-education' ),
			'panel' => 'ostrich_education_general_panel',
		)
	);

	// Reset sortable order setting
	$wp_customize->add_setting(
		'ostrich_education_reset_settings',
		array(
			'sanitize_callback' => 'ostrich_education_sanitize_checkbox',
			'default' => false,
			'transport'	=> 'postMessage',
		)
	);

	$wp_customize->add_control(
		'ostrich_education_reset_settings',
		array(
			'section'		=> 'ostrich_education_reset_sections',
			'label'			=> esc_html__( 'Reset all settings?', 'ostrich-education' ),
			'type'			=> 'checkbox',
		)
	);
}
add_action( 'customize_register', 'ostrich_education_customize_register' );


// Sanitize Callback
require get_parent_theme_file_path( '/inc/customizer/sanitize-callback.php' );

// active Callback
require get_parent_theme_file_path( '/inc/customizer/active-callback.php' );

// Partial Refresh
require get_parent_theme_file_path( '/inc/customizer/partial-refresh.php' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function ostrich_education_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function ostrich_education_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ostrich_education_customize_preview_js() {
	wp_enqueue_script( 'ostrich-education-customizer', get_theme_file_uri( '/assets/js/customizer.js' ), array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'ostrich_education_customize_preview_js' );

/**
 * Binds JS handlers for Customizer controls.
 */
function ostrich_education_customize_control_js() {


	wp_enqueue_style( 'ostrich-education-customize-style', get_theme_file_uri( '/assets/css/customize-controls.css' ), array(), '20151215' );

	wp_enqueue_script( 'ostrich-education-customize-control', get_theme_file_uri( '/assets/js/customize-control.js' ), array( 'jquery', 'customize-controls' ), '20151215', true );
	$localized_data = array( 
		'refresh_msg' => esc_html__( 'Refresh the page after Save and Publish.', 'ostrich-education' ),
		'reset_msg' => esc_html__( 'Warning!!! This will reset all the settings. Refresh the page after Save and Publish to reset all.', 'ostrich-education' ),
	);

	wp_localize_script( 'ostrich-education-customize-control', 'localized_data', $localized_data );
}
add_action( 'customize_controls_enqueue_scripts', 'ostrich_education_customize_control_js' );
