<?php
/**
 * Theme Ostrich Customizer
 *
 * @package Ostrich Education
 *
 * our_courses section
 */

$wp_customize->add_section(
	'ostrich_education_our_courses',
	array(
		'title' => esc_html__( 'Our Courses', 'ostrich-education' ),
		'panel' => 'ostrich_education_home_panel',
	)
);

// our_courses enable settings
$wp_customize->add_setting(
	'ostrich_education_our_courses',
	array(
		'sanitize_callback' => 'ostrich_education_sanitize_select',
		'default' => 'disable'
	)
);

$wp_customize->add_control(
	'ostrich_education_our_courses',
	array(
		'section'		=> 'ostrich_education_our_courses',
		'label'			=> esc_html__( 'Content type:', 'ostrich-education' ),
		'description'			=> esc_html__( 'Choose where you want to render the content from.', 'ostrich-education' ),
		'type'			=> 'select',
		'choices'		=> array( 
				'disable' => esc_html__( '--Disable--', 'ostrich-education' ),
				'post' => esc_html__( 'Post', 'ostrich-education' ),
				'cat' => esc_html__( 'Category', 'ostrich-education' ),
		 	)
	)
);

$wp_customize->add_setting(
	'ostrich_education_our_courses_sub_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'	=> 'postMessage',
		'default'	=>  __('Our Courses', 'ostrich-education'),
	)
);

$wp_customize->add_control(
	'ostrich_education_our_courses_sub_title',
	array(
		'section'		=> 'ostrich_education_our_courses',
		'label'			=> esc_html__( 'Sub Title:', 'ostrich-education' ),
		'active_callback' => 'ostrich_education_if_our_courses_enabled',
		
	)
);

$wp_customize->selective_refresh->add_partial( 
	'ostrich_education_our_courses_sub_title', 
	array(
        'selector'            => '#our-courses p.section-subtitle',
		'render_callback'     => 'ostrich_education_our_courses_partial_sub_title',
	) 
);

$wp_customize->add_setting(
	'ostrich_education_our_courses_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'	=> 'postMessage',
		'default'	=>  __('Learn Our Most Valuable Courses Here', 'ostrich-education'),
	)
);

$wp_customize->add_control(
	'ostrich_education_our_courses_title',
	array(
		'section'		=> 'ostrich_education_our_courses',
		'label'			=> esc_html__( 'Title:', 'ostrich-education' ),		
		'active_callback' => 'ostrich_education_if_our_courses_enabled',
		
	)
);

$wp_customize->selective_refresh->add_partial( 
	'ostrich_education_our_courses_title', 
	array(
        'selector'            => '#our-courses h2.section-title',
		'render_callback'     => 'ostrich_education_our_courses_partial_title',
	) 
);

for ($i=1; $i <= 3; $i++) { 
	// our_courses post setting
	$wp_customize->add_setting(
		'ostrich_education_our_courses_post_'.$i,
		array(
			'sanitize_callback' => 'ostrich_education_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'ostrich_education_our_courses_post_'.$i,
		array(
			'section'		=> 'ostrich_education_our_courses',
			'label'			=> esc_html__( 'Post ', 'ostrich-education' ).$i,
			'active_callback' => 'ostrich_education_if_our_courses_post',
			'type'			=> 'select',
			'choices'		=> ostrich_education_get_post_choices(),
		)
	);

}

// our_courses category setting
$wp_customize->add_setting(
	'ostrich_education_our_courses_cat',
	array(
		'sanitize_callback' => 'ostrich_education_sanitize_select',
	)
);

$wp_customize->add_control(
	'ostrich_education_our_courses_cat',
	array(
		'section'		=> 'ostrich_education_our_courses',
		'label'			=> esc_html__( 'Category:', 'ostrich-education' ),
		'active_callback' => 'ostrich_education_if_our_courses_cat',
		'type'			=> 'select',
		'choices'		=> ostrich_education_get_post_cat_choices(),
	)
);