<?php
/**
 * Theme Ostrich Customizer
 *
 * @package Ostrich Education
 *
 * cta section
 */
$wp_customize->add_section(
	'ostrich_education_cta',
	array(
		'title' => esc_html__( 'CTA', 'ostrich-education' ),
		'panel' => 'ostrich_education_home_panel',
	)
);

// blog enable settings
$wp_customize->add_setting(
	'ostrich_education_cta',
	array(
		'sanitize_callback' => 'ostrich_education_sanitize_select',
		'default' => 'disable',
	)
);
$wp_customize->add_control(
	'ostrich_education_cta',
	array(
		'section'		=> 'ostrich_education_cta',
		'label'			=> esc_html__( 'Content type:', 'ostrich-education' ),
		'description'			=> esc_html__( 'Choose where you want to render the content from.', 'ostrich-education' ),
		'type'			=> 'select',
		'choices'		=> array(
				'disable' 	=> esc_html__( '--Disable--', 'ostrich-education' ),
				'post' 		=> esc_html__( 'Post', 'ostrich-education' ),
		 	)
	)
);

$wp_customize->add_setting(
	'ostrich_education_cta_sub_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'GET SOLUTIONS FAST', 'ostrich-education' ),
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'ostrich_education_cta_sub_title',
	array(
		'section'		=> 'ostrich_education_cta',
		'label'			=> esc_html__( 'Sub Title:', 'ostrich-education' ),
		'active_callback'	=> 'ostrich_education_if_cta_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'ostrich_education_cta_sub_title', 
	array(
        'selector'            => '#call-to-action p.section-subtitle',
		'render_callback'     => 'ostrich_education_cta_partial_subtitle',
	) 
);

$wp_customize->add_setting( 
		'ostrich_education_cta_bg_image',
		array(
			'sanitize_callback' => 'ostrich_education_sanitize_image',
		) 
	);

	$wp_customize->add_control( 
		new WP_Customize_Image_Control( $wp_customize, 'ostrich_education_cta_bg_image',
		array(
			'label'       		=> esc_html__( 'cta Image', 'ostrich-education' ),
			'section'     		=> 'ostrich_education_cta',
			'active_callback'	=> 'ostrich_education_if_cta_enabled',
		)
	) );

for ($i=1; $i <= 1 ; $i++) {
	// blog post setting
	$wp_customize->add_setting(
		'ostrich_education_cta_post_'.$i,
		array(
			'sanitize_callback' => 'ostrich_education_sanitize_dropdown_pages',
		)
	);
	$wp_customize->add_control(
		'ostrich_education_cta_post_'.$i,
		array(
			'section'		=> 'ostrich_education_cta',
			'label'			=> esc_html__( 'Post ', 'ostrich-education' ).$i,
			'active_callback' => 'ostrich_education_if_cta_enabled',
			'type'			=> 'select',
			'choices'		=> ostrich_education_get_post_choices(),
		)
	);
}

$wp_customize->add_setting(
	'ostrich_education_cta_btn',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'SEE COURSE', 'ostrich-education' ),
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'ostrich_education_cta_btn',
	array(
		'section'		=> 'ostrich_education_cta',
		'label'			=> esc_html__( 'Button Label:', 'ostrich-education' ),
		'active_callback'	=> 'ostrich_education_if_cta_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'ostrich_education_cta_btn', 
	array(
        'selector'            => '#call-to-action .buttons a',
		'render_callback'     => 'ostrich_education_cta_partial_btn',
	) 
);