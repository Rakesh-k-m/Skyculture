<?php
/**
 * Theme Ostrich Customizer
 *
 * @package Ostrich Education
 *
 * top_bar section
 */

$wp_customize->add_section(
	'ostrich_education_top_bar',
	array(
		'title' => esc_html__( 'Topbar Section', 'ostrich-education' ),
		'panel' => 'ostrich_education_home_panel',
	)
);

// top_bar enable settings
$wp_customize->add_setting(
	'ostrich_education_top_bar',
	array(
		'sanitize_callback' => 'ostrich_education_sanitize_select',
		'default' => 'disable'
	)
);

$wp_customize->add_control(
	'ostrich_education_top_bar',
	array(
		'section'		=> 'ostrich_education_top_bar',
		'label'			=> esc_html__( 'Content type:', 'ostrich-education' ),
		'description'			=> esc_html__( 'Choose where you want to render the content from.', 'ostrich-education' ),
		'type'			=> 'select',
		'choices'		=> array( 
				'disable' => esc_html__( '--Disable--', 'ostrich-education' ),
				'post' => esc_html__( 'Post', 'ostrich-education' )
		 	)
	)
);

$wp_customize->add_setting(
	'ostrich_education_top_bar_news_title_label',
	array(	
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> esc_html__( 'NEWS', 'ostrich-education' ),
	'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'ostrich_education_top_bar_news_title_label',
	array(
	'label'       => __('News Title', 'ostrich-education'),  
	'section'     => 'ostrich_education_top_bar',   		
	'type'        => 'text',
	'active_callback'	=> 'ostrich_education_if_top_bar_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'ostrich_education_top_bar_news_title_label', 
	array(
        'selector'            => '#top-bar span.latest-news-header span',
		'render_callback'     => 'ostrich_education_top_bar_partial_button',
	) 
);

for ($i=1; $i <= 2; $i++) { 
	// top_bar post setting
	$wp_customize->add_setting(
		'ostrich_education_top_bar_post_'.$i,
		array(
			'sanitize_callback' => 'ostrich_education_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'ostrich_education_top_bar_post_'.$i,
		array(
			'section'		=> 'ostrich_education_top_bar',
			'label'			=> esc_html__( 'Post ', 'ostrich-education' ).$i,
			'active_callback' => 'ostrich_education_if_top_bar_post',
			'type'			=> 'select',
			'choices'		=> ostrich_education_get_post_choices(),
		)
	);
}

$wp_customize->add_setting(
		'ostrich_education_top_bar_seperator',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( new Ostrich_Education_Pro_Separator_Custom_Control( $wp_customize,
		'ostrich_education_top_bar_seperator',
		array(
			'section'		=> 'ostrich_education_top_bar',
			'type'			=> 'ostrich-education-separator',
			'active_callback' => 'ostrich_education_if_top_bar_enabled',

		) )
);

$wp_customize->add_setting(
	'ostrich_education_top_bar_social_menu',
	array(
		'sanitize_callback' => 'ostrich_education_sanitize_checkbox',
		'default' => true,
	)
);

$wp_customize->add_control(
	'ostrich_education_top_bar_social_menu',
	array(
		'section'		=> 'ostrich_education_top_bar',
		'label'			=> esc_html__( 'Enable Topbar Social Menu', 'ostrich-education' ),
		'type'			=> 'checkbox',
		'active_callback'	=> 'ostrich_education_if_top_bar_enabled',
	)
);