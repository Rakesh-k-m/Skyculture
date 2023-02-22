<?php
/**
 * Theme Ostrich Customizer
 *
 * @package Ostrich Education
 *
 * slider section
 */

$wp_customize->add_section(
	'ostrich_education_slider',
	array(
		'title' => esc_html__( 'Slider Section', 'ostrich-education' ),
		'panel' => 'ostrich_education_home_panel',
	)
);

// slider enable settings
$wp_customize->add_setting(
	'ostrich_education_slider',
	array(
		'sanitize_callback' => 'ostrich_education_sanitize_select',
		'default' => 'disable'
	)
);

$wp_customize->add_control(
	'ostrich_education_slider',
	array(
		'section'		=> 'ostrich_education_slider',
		'label'			=> esc_html__( 'Content type:', 'ostrich-education' ),
		'description'			=> esc_html__( 'Choose where you want to render the content from.', 'ostrich-education' ),
		'type'			=> 'select',
		'choices'		=> array( 
				'disable' => esc_html__( '--Disable--', 'ostrich-education' ),
				'page' => esc_html__( 'Page', 'ostrich-education' ),
		 	)
	)
);

$wp_customize->add_setting(
	'ostrich_education_slider_button_label',
	array(	
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> esc_html__( 'Learn More', 'ostrich-education' ),
	'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'ostrich_education_slider_button_label',
	array(
	'label'       => __('Button Label', 'ostrich-education'),  
	'section'     => 'ostrich_education_slider',   		
	'type'        => 'text',
	'active_callback'	=> 'ostrich_education_if_slider_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'ostrich_education_slider_button_label', 
	array(
        'selector'            => '#hero-slider div.buttons .primary',
		'render_callback'     => 'ostrich_education_slider_partial_button',
	) 
);

for ($i=1; $i <= 3; $i++) { 
	
	// slider page setting
	$wp_customize->add_setting(
		'ostrich_education_slider_page_'.$i,
		array(
			'sanitize_callback' => 'ostrich_education_sanitize_dropdown_pages',
			'default' => 0,
		)
	);

	$wp_customize->add_control(
		'ostrich_education_slider_page_'.$i,
		array(
			'section'		=> 'ostrich_education_slider',
			'label'			=> esc_html__( 'Page ', 'ostrich-education' ).$i,
			'type'			=> 'dropdown-pages',
			'active_callback' => 'ostrich_education_if_slider_page'
		)
	);

	$wp_customize->add_setting(
	'ostrich_education_slider_alt_button_label_'.$i,
	array(	
	'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ostrich_education_slider_alt_button_label_'.$i,
	array(
	'label'       => __('Alternative Button Label ', 'ostrich-education').$i,  
	'section'     => 'ostrich_education_slider',   		
	'type'        => 'text',
	'active_callback'	=> 'ostrich_education_if_slider_enabled',
	)
);

$wp_customize->add_setting(
		'ostrich_education_slider_alt_button_url_'.$i,
		array(
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	
	$wp_customize->add_control(
		'ostrich_education_slider_alt_button_url_'.$i,
		array(
			'section'		=> 'ostrich_education_slider',
			'label'			=> esc_html__( 'Alternative Button Url ', 'ostrich-education' ).$i,
			'type'			=> 'url',
			'active_callback'	=> 'ostrich_education_if_slider_enabled',
		)
	);
}
