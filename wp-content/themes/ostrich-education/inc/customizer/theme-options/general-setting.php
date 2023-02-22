<?php
/**
 * General settings
 */
// General settings
$wp_customize->add_section(
	'ostrich_education_general_section',
	array(
		'title' => esc_html__( 'General', 'ostrich-education' ),
		'panel' => 'ostrich_education_general_panel',
	)
);

// Breadcrumb enable setting
$wp_customize->add_setting(
	'ostrich_education_breadcrumb_enable',
	array(
		'sanitize_callback' => 'ostrich_education_sanitize_checkbox',
		'default' => true,
	)
);

$wp_customize->add_control(
	'ostrich_education_breadcrumb_enable',
	array(
		'section'		=> 'ostrich_education_general_section',
		'label'			=> esc_html__( 'Enable breadcrumb.', 'ostrich-education' ),
		'type'			=> 'checkbox',
	)
);