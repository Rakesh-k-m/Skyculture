<?php
/**
 * Theme Ostrich Customizer
 *
 * @package Ostrich Education
 *
 * video section
 */
$wp_customize->add_section(
	'ostrich_education_video',
	array(
		'title' => esc_html__( 'Video', 'ostrich-education' ),
		'panel' => 'ostrich_education_home_panel',
	)
);

// blog enable settings
$wp_customize->add_setting(
	'ostrich_education_video',
	array(
		'sanitize_callback' => 'ostrich_education_sanitize_select',
		'default' => 'disable',
	)
);
$wp_customize->add_control(
	'ostrich_education_video',
	array(
		'section'		=> 'ostrich_education_video',
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
		'ostrich_education_video_bg_image',
		array(
			'sanitize_callback' => 'ostrich_education_sanitize_image',
		) 
	);

	$wp_customize->add_control( 
		new WP_Customize_Image_Control( $wp_customize, 'ostrich_education_video_bg_image',
		array(
			'label'       		=> esc_html__( 'video Image', 'ostrich-education' ),
			'section'     		=> 'ostrich_education_video',
			'active_callback'	=> 'ostrich_education_if_video_enabled',
		)
	) );

$wp_customize->add_setting(
	'ostrich_education_video_sub_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'GET SOLUTIONS FAST', 'ostrich-education' ),
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'ostrich_education_video_sub_title',
	array(
		'section'		=> 'ostrich_education_video',
		'label'			=> esc_html__( 'Sub Title:', 'ostrich-education' ),
		'active_callback'	=> 'ostrich_education_if_video_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'ostrich_education_video_sub_title', 
	array(
        'selector'            => '#video p.section-subtitle',
		'render_callback'     => 'ostrich_education_video_partial_subtitle',
	) 
);

for ($i=1; $i <= 1 ; $i++) {
	
	// blog page setting
	$wp_customize->add_setting(
		'ostrich_education_video_page_'.$i,
		array(
			'sanitize_callback' => 'ostrich_education_sanitize_dropdown_pages',
			'default' => 0,
		)
	);
	$wp_customize->add_control(
		'ostrich_education_video_page_'.$i,
		array(
			'section'		=> 'ostrich_education_video',
			'label'			=> esc_html__( 'Page ', 'ostrich-education' ).$i,
			'type'			=> 'dropdown-pages',
			'active_callback' => 'ostrich_education_if_video_enabled'
		)
	);
}

$wp_customize->add_setting(
		'ostrich_education_video_url',
		array(
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	
	$wp_customize->add_control(
		'ostrich_education_video_url',
		array(
			'section'		=> 'ostrich_education_video',
			'label'			=> esc_html__( 'Video Url:', 'ostrich-education' ),
			'type'			=> 'url',
			'active_callback'	=> 'ostrich_education_if_video_enabled',
		)
	);