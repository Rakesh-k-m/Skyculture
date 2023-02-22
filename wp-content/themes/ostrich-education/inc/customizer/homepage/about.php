<?php
/**
 * Theme Ostrich Customizer
 *
 * @package Ostrich Education
 *
 * about section
 */
$wp_customize->add_section(
	'ostrich_education_about',
	array(
		'title' => esc_html__( 'About', 'ostrich-education' ),
		'panel' => 'ostrich_education_home_panel',
	)
);

// blog enable settings
$wp_customize->add_setting(
	'ostrich_education_about',
	array(
		'sanitize_callback' => 'ostrich_education_sanitize_select',
		'default' => 'disable',
	)
);
$wp_customize->add_control(
	'ostrich_education_about',
	array(
		'section'		=> 'ostrich_education_about',
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
	'ostrich_education_about_sub_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'About Us', 'ostrich-education' ),
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'ostrich_education_about_sub_title',
	array(
		'section'		=> 'ostrich_education_about',
		'label'			=> esc_html__( 'Sub Title:', 'ostrich-education' ),
		'active_callback'	=> 'ostrich_education_if_about_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'ostrich_education_about_sub_title', 
	array(
        'selector'            => '#about-us p.section-subtitle',
		'render_callback'     => 'ostrich_education_about_partial_subtitle',
	) 
);

for ($i=1; $i <= 1 ; $i++) {
	// blog post setting
	$wp_customize->add_setting(
		'ostrich_education_about_post_'.$i,
		array(
			'sanitize_callback' => 'ostrich_education_sanitize_dropdown_pages',
		)
	);
	$wp_customize->add_control(
		'ostrich_education_about_post_'.$i,
		array(
			'section'		=> 'ostrich_education_about',
			'label'			=> esc_html__( 'Post ', 'ostrich-education' ).$i,
			'active_callback' => 'ostrich_education_if_about_enabled',
			'type'			=> 'select',
			'choices'		=> ostrich_education_get_post_choices(),
		)
	);
}

$wp_customize->add_setting(
	'ostrich_education_about_btn_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'Learn More', 'ostrich-education' ),
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'ostrich_education_about_btn_title',
	array(
		'section'		=> 'ostrich_education_about',
		'label'			=> esc_html__( 'Btn Title:', 'ostrich-education' ),
		'active_callback'	=> 'ostrich_education_if_about_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'ostrich_education_about_btn_title', 
	array(
        'selector'            => '#about-us div.read-more a',
		'render_callback'     => 'ostrich_education_about_partial_btn_title',
	) 
);
