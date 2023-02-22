<?php
/**
 * Blog/Archive section 
 */
// Blog/Archive section 
$wp_customize->add_section(
	'ostrich_education_archive_settings',
	array(
		'title' => esc_html__( 'Archive/Blog', 'ostrich-education' ),
		'description' => esc_html__( 'Settings for archive pages including blog page too.', 'ostrich-education' ),
		'panel' => 'ostrich_education_general_panel',
	)
);

// Archive excerpt length setting
$wp_customize->add_setting(
	'ostrich_education_archive_excerpt_length',
	array(
		'sanitize_callback' => 'ostrich_education_sanitize_number_range',
		'default' => 20,
	)
);

$wp_customize->add_control(
	'ostrich_education_archive_excerpt_length',
	array(
		'section'		=> 'ostrich_education_archive_settings',
		'label'			=> esc_html__( 'Excerpt more length:', 'ostrich-education' ),
		'type'			=> 'number',
		'input_attrs'   => array( 'min' => 5 ),
	)
);

// Pagination type setting
$wp_customize->add_setting(
	'ostrich_education_archive_pagination_type',
	array(
		'sanitize_callback' => 'ostrich_education_sanitize_select',
		'default' => 'numeric',
	)
);

$wp_customize->add_control(
	'ostrich_education_archive_pagination_type',
	array(
		'section'		=> 'ostrich_education_archive_settings',
		'label'			=> esc_html__( 'Pagination type:', 'ostrich-education' ),
		'type'			=> 'select','choices' =>  array( 
			'disable' => esc_html__( '--Disable--', 'ostrich-education' ),
			'numeric' => esc_html__( 'Numeric', 'ostrich-education' ),
			'older_newer' => esc_html__( 'Older / Newer', 'ostrich-education' ),
		),
	)
);

$wp_customize->add_setting(
	'ostrich_education_archive_layout',
	array(
		'sanitize_callback' => 'ostrich_education_sanitize_select',
		'default' => 'col-2',
	)
);

$wp_customize->add_control(
	'ostrich_education_archive_layout',
	array(
		'section'		=> 'ostrich_education_archive_settings',
		'label'			=> esc_html__( 'Archive Layout', 'ostrich-education' ),
		'type'			=> 'select',
		'choices'		=> array(
				'col-1' 		=> esc_html__( 'Column One', 'ostrich-education' ),
				'col-2' 		=> esc_html__( 'Column Two', 'ostrich-education' ),
				'col-3' 		=> esc_html__( 'Column Three', 'ostrich-education' ),
		),
	)
);