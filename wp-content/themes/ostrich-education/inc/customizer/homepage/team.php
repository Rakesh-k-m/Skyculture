<?php
/**
 * Ostrich Theme Customizer
 *
 * @package Ostrich Education Theme
 *
 * Team section
 */

$wp_customize->add_section(
	'ostrich_education_team',
	array(
		'title' => esc_html__( 'Team', 'ostrich-education' ),
		'panel' => 'ostrich_education_home_panel',
	)
);

// team enable settings
$wp_customize->add_setting(
	'ostrich_education_team',
	array(
		'sanitize_callback' => 'ostrich_education_sanitize_select',
		'default' => 'disable'
	)
);

$wp_customize->add_control(
	'ostrich_education_team',
	array(
		'section'		=> 'ostrich_education_team',
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
	'ostrich_education_team_sub_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'	=> 'postMessage',
		'default'	=>  __('Our Members', 'ostrich-education'),
	)
);

$wp_customize->add_control(
	'ostrich_education_team_sub_title',
	array(
		'section'		=> 'ostrich_education_team',
		'label'			=> esc_html__( 'Sub Title:', 'ostrich-education' ),
		'active_callback' => 'ostrich_education_if_team_enabled',
		
	)
);

$wp_customize->selective_refresh->add_partial( 
	'ostrich_education_team_sub_title', 
	array(
        'selector'            => '#our-team p.section-subtitle',
		'render_callback'     => 'ostrich_education_team_partial_sub_title',
	) 
);

$wp_customize->add_setting(
	'ostrich_education_team_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'	=> 'postMessage',
		'default'	=>  __('Here is Our Awesome Team', 'ostrich-education'),
	)
);

$wp_customize->add_control(
	'ostrich_education_team_title',
	array(
		'section'		=> 'ostrich_education_team',
		'label'			=> esc_html__( 'Title:', 'ostrich-education' ),		
		'active_callback' => 'ostrich_education_if_team_enabled',
		
	)
);

$wp_customize->selective_refresh->add_partial( 
	'ostrich_education_team_title', 
	array(
        'selector'            => '#our-team h2.section-title',
		'render_callback'     => 'ostrich_education_team_partial_title',
	) 
);

for ($i=1; $i <= 4; $i++) { 

	// team page setting
	$wp_customize->add_setting(
		'ostrich_education_team_page_'.$i,
		array(
			'sanitize_callback' => 'ostrich_education_sanitize_dropdown_pages',
			'default' => 0,
		)
	);

	$wp_customize->add_control(
		'ostrich_education_team_page_'.$i,
		array(
			'section'		=> 'ostrich_education_team',
			'label'			=> esc_html__( 'Page ', 'ostrich-education' ).$i,
			'type'			=> 'dropdown-pages',
			'active_callback' => 'ostrich_education_if_team_page'
		)
	);

	$wp_customize->add_setting(
		'ostrich_education_team_position_'.$i,
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'transport'	=> 'refresh',
		)
	);

	$wp_customize->add_control(
		'ostrich_education_team_position_'.$i,
		array(
			'section'		=> 'ostrich_education_team',
			'label'			=> esc_html__( 'Members Position:', 'ostrich-education' ). $i,
			'active_callback' => 'ostrich_education_if_team_enabled',		
		)
	);

}