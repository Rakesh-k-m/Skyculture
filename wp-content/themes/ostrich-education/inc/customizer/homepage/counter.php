<?php
/**
 * Theme Ostrich Customizer
 *
 * @package Ostrich Education
 *
 * Counter section
 */
$wp_customize->add_section(
	'ostrich_education_counter',
	array(
		'title' => esc_html__( 'Counter', 'ostrich-education' ),
		'panel' => 'ostrich_education_home_panel',
	)
);

// blog enable settings
$wp_customize->add_setting(
	'ostrich_education_counter',
	array(
		'sanitize_callback' => 'ostrich_education_sanitize_select',
		'default' => 'disable',
	)
);
$wp_customize->add_control(
	'ostrich_education_counter',
	array(
		'section'		=> 'ostrich_education_counter',
		'label'			=> esc_html__( 'Content type:', 'ostrich-education' ),
		'description'			=> esc_html__( 'Choose where you want to render the content from.', 'ostrich-education' ),
		'type'			=> 'select',
		'choices'		=> array(
				'disable' 	=> esc_html__( '--Disable--', 'ostrich-education' ),
				'custom' 	=> esc_html__( 'Custom', 'ostrich-education' ),
		 	)
	)
);

$wp_customize->add_setting( 
		'ostrich_education_counter_bg_image',
		array(
			'sanitize_callback' => 'ostrich_education_sanitize_image',
		) 
	);

	$wp_customize->add_control( 
		new WP_Customize_Image_Control( $wp_customize, 'ostrich_education_counter_bg_image',
		array(
			'label'       		=> esc_html__( 'Counter Image', 'ostrich-education' ),
			'section'     		=> 'ostrich_education_counter',
			'active_callback'	=> 'ostrich_education_if_counter_enabled',
		)
	) );

for ($i=1; $i <= 4; $i++) {

	$wp_customize->add_setting(
		'ostrich_education_counter_icon_'.$i,
		array(	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'ostrich_education_counter_icon_'.$i,
		array(
		'label'       => __('Icon ', 'ostrich-education').$i,
		'description' => sprintf( __('Please input icon as eg: fa-archive. Find Font-awesome icons %1$shere%2$s', 'ostrich-education'), '<a href="' . esc_url( 'https://fontawesome.com/v4.7.0/cheatsheet/' ) . '" target="_blank">', '</a>' ),
		'section'     => 'ostrich_education_counter',   	
		'type'        => 'text',		
		'active_callback'	=> 'ostrich_education_if_counter_enabled',
		)
	);

$wp_customize->add_setting(
	'ostrich_education_counter_value_'.$i,
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ostrich_education_counter_value_'.$i,
	array(
		'section'		=> 'ostrich_education_counter',
		'label'			=> esc_html__( 'Counter Value ', 'ostrich-education' ).$i,
		'active_callback'	=> 'ostrich_education_if_counter_custom',
	)
);

$wp_customize->add_setting(
	'ostrich_education_counter_title_'.$i,
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ostrich_education_counter_title_'.$i,
	array(
		'section'		=> 'ostrich_education_counter',
		'label'			=> esc_html__( 'Counter Title ', 'ostrich-education' ).$i,
		'active_callback'	=> 'ostrich_education_if_counter_custom',
	)
);

}