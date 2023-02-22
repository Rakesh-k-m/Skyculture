<?php
/**
 *
 *
 * Footer copyright
 *
 *
 */
// Footer copyright
$wp_customize->add_section(
	'ostrich_education_footer_section',
	array(
		'title' => esc_html__( 'Footer', 'ostrich-education' ),
		'panel' => 'ostrich_education_general_panel',
	)
);

// Footer copyright setting
$wp_customize->add_setting(
	'ostrich_education_copyright_txt',
	array(
		'sanitize_callback' => 'ostrich_education_sanitize_html',
		'default' => $default['ostrich_education_copyright_txt'],
	)
);

$wp_customize->add_control(
	'ostrich_education_copyright_txt',
	array(
		'section'		=> 'ostrich_education_footer_section',
		'label'			=> esc_html__( 'Copyright text:', 'ostrich-education' ),
		'type'			=> 'textarea',
	)
);
