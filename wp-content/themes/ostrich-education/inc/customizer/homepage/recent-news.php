<?php
/**
 * Theme Ostrich Customizer
 *
 * @package Ostrich Education
 *
 * recent_news section
 */

$wp_customize->add_section(
	'ostrich_education_recent_news',
	array(
		'title' => esc_html__( 'Recent News Section', 'ostrich-education' ),
		'panel' => 'ostrich_education_home_panel',
	)
);

// recent_news enable settings
$wp_customize->add_setting(
	'ostrich_education_recent_news',
	array(
		'sanitize_callback' => 'ostrich_education_sanitize_select',
		'default' => 'disable'
	)
);

$wp_customize->add_control(
	'ostrich_education_recent_news',
	array(
		'section'		=> 'ostrich_education_recent_news',
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
	'ostrich_education_recent_news_sub_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'	=> 'postMessage',
		'default'	=>  __('Recent News', 'ostrich-education'),
	)
);

$wp_customize->add_control(
	'ostrich_education_recent_news_sub_title',
	array(
		'section'		=> 'ostrich_education_recent_news',
		'label'			=> esc_html__( 'Sub Title:', 'ostrich-education' ),
		'active_callback' => 'ostrich_education_if_recent_news_enabled',
		
	)
);

$wp_customize->selective_refresh->add_partial( 
	'ostrich_education_recent_news_sub_title', 
	array(
        'selector'            => '#recent-news p.section-subtitle',
		'render_callback'     => 'ostrich_education_recent_news_partial_sub_title',
	) 
);

$wp_customize->add_setting(
	'ostrich_education_recent_news_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'	=> 'postMessage',
		'default'	=>  __('Our Educational Recents News', 'ostrich-education'),
	)
);

$wp_customize->add_control(
	'ostrich_education_recent_news_title',
	array(
		'section'		=> 'ostrich_education_recent_news',
		'label'			=> esc_html__( 'Title:', 'ostrich-education' ),		
		'active_callback' => 'ostrich_education_if_recent_news_enabled',
		
	)
);

$wp_customize->selective_refresh->add_partial( 
	'ostrich_education_recent_news_title', 
	array(
        'selector'            => '#recent-news h2.section-title',
		'render_callback'     => 'ostrich_education_recent_news_partial_title',
	) 
);

for ($i=1; $i <= 3; $i++) { 
	// recent_news post setting
	$wp_customize->add_setting(
		'ostrich_education_recent_news_post_'.$i,
		array(
			'sanitize_callback' => 'ostrich_education_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'ostrich_education_recent_news_post_'.$i,
		array(
			'section'		=> 'ostrich_education_recent_news',
			'label'			=> esc_html__( 'Post ', 'ostrich-education' ).$i,
			'active_callback' => 'ostrich_education_if_recent_news_post',
			'type'			=> 'select',
			'choices'		=> ostrich_education_get_post_choices(),
		)
	);

}

// recent_news category setting
$wp_customize->add_setting(
	'ostrich_education_recent_news_cat',
	array(
		'sanitize_callback' => 'ostrich_education_sanitize_select',
	)
);

$wp_customize->add_control(
	'ostrich_education_recent_news_cat',
	array(
		'section'		=> 'ostrich_education_recent_news',
		'label'			=> esc_html__( 'Category:', 'ostrich-education' ),
		'active_callback' => 'ostrich_education_if_recent_news_cat',
		'type'			=> 'select',
		'choices'		=> ostrich_education_get_post_cat_choices(),
	)
);

$wp_customize->add_setting(
	'ostrich_education_recent_news_button_label',
	array(	
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> esc_html__( 'Learn More', 'ostrich-education' ),
	'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'ostrich_education_recent_news_button_label',
	array(
	'label'       => __('Button Label', 'ostrich-education'),  
	'section'     => 'ostrich_education_recent_news',   		
	'type'        => 'text',
	'active_callback'	=> 'ostrich_education_if_recent_news_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'ostrich_education_recent_news_button_label', 
	array(
        'selector'            => '#recent-news div.read-more a',
		'render_callback'     => 'ostrich_education_recent_news_partial_button',
	) 
);
