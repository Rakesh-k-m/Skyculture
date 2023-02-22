<?php
/**
 * Global Layout
 */
// Global Layout
$wp_customize->add_section(
	'ostrich_education_global_layout',
	array(
		'title' => esc_html__( 'Global Layout', 'ostrich-education' ),
		'panel' => 'ostrich_education_general_panel',
	)
);

// Global archive layout setting
$wp_customize->add_setting(
	'ostrich_education_archive_sidebar',
	array(
		'sanitize_callback' => 'ostrich_education_sanitize_select',
		'default' => 'right',
	)
);

$wp_customize->add_control(
	'ostrich_education_archive_sidebar',
	array(
		'section'		=> 'ostrich_education_global_layout',
		'label'			=> esc_html__( 'Archive Sidebar', 'ostrich-education' ),
		'description'			=> esc_html__( 'This option works on all archive pages like: 404, search, date, category, "Your latest posts" and so on.', 'ostrich-education' ),
		'type'			=> 'radio',
		'choices'		=> array( 
			'right' => esc_html__( 'Right', 'ostrich-education' ), 
			'no' => esc_html__( 'No Sidebar', 'ostrich-education' ), 
		),
	)
);

// Global page layout setting
$wp_customize->add_setting(
	'ostrich_education_global_page_layout',
	array(
		'sanitize_callback' => 'ostrich_education_sanitize_select',
		'default' => 'right',
	)
);

$wp_customize->add_control(
	'ostrich_education_global_page_layout',
	array(
		'section'		=> 'ostrich_education_global_layout',
		'label'			=> esc_html__( 'Global page sidebar', 'ostrich-education' ),
		'description'			=> esc_html__( 'This option works only on single pages including "Posts page". This setting can be overridden for single page from the metabox too.', 'ostrich-education' ),
		'type'			=> 'radio',
		'choices'		=> array( 
			'right' => esc_html__( 'Right', 'ostrich-education' ), 
			'no' => esc_html__( 'No Sidebar', 'ostrich-education' ), 
		),
	)
);

// Global post layout setting
$wp_customize->add_setting(
	'ostrich_education_global_post_layout',
	array(
		'sanitize_callback' => 'ostrich_education_sanitize_select',
		'default' => 'right',
	)
);

$wp_customize->add_control(
	'ostrich_education_global_post_layout',
	array(
		'section'		=> 'ostrich_education_global_layout',
		'label'			=> esc_html__( 'Global post sidebar', 'ostrich-education' ),
		'description'			=> esc_html__( 'This option works only on single posts. This setting can be overridden for single post from the metabox too.', 'ostrich-education' ),
		'type'			=> 'radio',
		'choices'		=> array( 
			'right' => esc_html__( 'Right', 'ostrich-education' ), 
			'no' => esc_html__( 'No Sidebar', 'ostrich-education' ), 
		),
	)
);