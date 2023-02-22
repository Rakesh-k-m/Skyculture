<?php
/**
 * Theme Ostrich Customizer
 *
 * @package Ostrich Education
 *
 * service section
 */

$wp_customize->add_section(
	'ostrich_education_service',
	array(
		'title' => esc_html__( 'Service', 'ostrich-education' ),
		'panel' => 'ostrich_education_home_panel',
	)
);

// service enable settings
$wp_customize->add_setting(
	'ostrich_education_service',
	array(
		'sanitize_callback' => 'ostrich_education_sanitize_select',
		'default' => 'disable'
	)
);

$wp_customize->add_control(
	'ostrich_education_service',
	array(
		'section'		=> 'ostrich_education_service',
		'label'			=> esc_html__( 'Content type:', 'ostrich-education' ),
		'description'			=> esc_html__( 'Choose where you want to render the content from.', 'ostrich-education' ),
		'type'			=> 'select',
		'choices'		=> array( 
				'disable' => esc_html__( '--Disable--', 'ostrich-education' ),
				'post' => esc_html__( 'Post', 'ostrich-education' ),
		 	)
	)
);

$wp_customize->add_setting(
	'ostrich_education_service_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'			=> esc_html__( 'We Provide Online And Offline Courses', 'ostrich-education' ),
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'ostrich_education_service_title',
	array(
		'section'		=> 'ostrich_education_service',
		'label'			=> esc_html__( 'Title:', 'ostrich-education' ),
		'active_callback'	=> 'ostrich_education_if_service_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'ostrich_education_service_title', 
	array(
        'selector'            => '#our-services h2.section-title',
		'render_callback'     => 'ostrich_education_service_partial_title',
	) 
);

$wp_customize->add_setting(
	'ostrich_education_service_sub_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'			=> esc_html__( 'Services', 'ostrich-education' ),
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'ostrich_education_service_sub_title',
	array(
		'section'		=> 'ostrich_education_service',
		'label'			=> esc_html__( 'Sub Title:', 'ostrich-education' ),
		'active_callback'	=> 'ostrich_education_if_service_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'ostrich_education_service_sub_title', 
	array(
        'selector'            => '#our-services p.section-subtitle',
		'render_callback'     => 'ostrich_education_service_partial_subtitle',
	) 
);

for ($i=1; $i <= 4; $i++) { 

	$wp_customize->add_setting(
		'ostrich_education_service_icon_'.$i,
		array(	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'ostrich_education_service_icon_'.$i,
		array(
		'label'       => __('Icon ', 'ostrich-education').$i,
		'description' => sprintf( __('Please input icon as eg: fa-archive. Find Font-awesome icons %1$shere%2$s', 'ostrich-education'), '<a href="' . esc_url( 'https://fontawesome.com/v4.7.0/cheatsheet/' ) . '" target="_blank">', '</a>' ),
		'section'     => 'ostrich_education_service',   	
		'type'        => 'text',		
		'active_callback'	=> 'ostrich_education_if_service_enabled',
		)
	);
	// service post setting
	$wp_customize->add_setting(
		'ostrich_education_service_post_'.$i,
		array(
			'sanitize_callback' => 'ostrich_education_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'ostrich_education_service_post_'.$i,
		array(
			'section'		=> 'ostrich_education_service',
			'label'			=> esc_html__( 'Post ', 'ostrich-education' ).$i,
			'active_callback' => 'ostrich_education_if_service_post',
			'type'			=> 'select',
			'choices'		=> ostrich_education_get_post_choices(),
		)
	);
}

$wp_customize->add_setting(
	'ostrich_education_service_btn_label',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'			=> esc_html__( 'Learn More', 'ostrich-education' ),
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'ostrich_education_service_btn_label',
	array(
		'section'		=> 'ostrich_education_service',
		'label'			=> esc_html__( 'Button label:', 'ostrich-education' ),
		'active_callback'	=> 'ostrich_education_if_service_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'ostrich_education_service_btn_label', 
	array(
        'selector'            => '#our-services .read-more a',
		'render_callback'     => 'ostrich_education_service_partial_btn',
	) 
);

