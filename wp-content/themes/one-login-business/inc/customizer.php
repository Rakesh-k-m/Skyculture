<?php
/**
 * One Login Business: Customizer
 *
 * @subpackage One Login Business
 * @since 1.0
 */

function one_login_business_customize_register( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_template_directory_uri() ). '/assets/css/customizer.css');

	// Add custom control.
  	require get_parent_theme_file_path( 'inc/customize/customize_toggle.php' );

	// Register the custom control type.
	$wp_customize->register_control_type( 'One_Login_Business_Toggle_Control' );

	$wp_customize->add_section( 'one_login_business_typography_settings', array(
		'title'       => __( 'Typography', 'one-login-business' ),
		'priority'       => 24,
	) );

	$font_choices = array(
			'' => 'Select',
			'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
			'Open Sans:400italic,700italic,400,700' => 'Open Sans',
			'Oswald:400,700' => 'Oswald',
			'Playfair Display:400,700,400italic' => 'Playfair Display',
			'Montserrat:400,700' => 'Montserrat',
			'Raleway:400,700' => 'Raleway',
			'Droid Sans:400,700' => 'Droid Sans',
			'Lato:400,700,400italic,700italic' => 'Lato',
			'Arvo:400,700,400italic,700italic' => 'Arvo',
			'Lora:400,700,400italic,700italic' => 'Lora',
			'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
			'Oxygen:400,300,700' => 'Oxygen',
			'PT Serif:400,700' => 'PT Serif',
			'PT Sans:400,700,400italic,700italic' => 'PT Sans',
			'PT Sans Narrow:400,700' => 'PT Sans Narrow',
			'Cabin:400,700,400italic' => 'Cabin',
			'Fjalla One:400' => 'Fjalla One',
			'Francois One:400' => 'Francois One',
			'Josefin Sans:400,300,600,700' => 'Josefin Sans',
			'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
			'Arimo:400,700,400italic,700italic' => 'Arimo',
			'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
			'Bitter:400,700,400italic' => 'Bitter',
			'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
			'Roboto:400,400italic,700,700italic' => 'Roboto',
			'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
			'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
			'Roboto Slab:400,700' => 'Roboto Slab',
			'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
			'Rokkitt:400' => 'Rokkitt',
		);


	$wp_customize->add_setting( 'one_login_business_headings_text', array(
		'sanitize_callback' => 'one_login_business_sanitize_fonts',
	));

	$wp_customize->add_control( 'one_login_business_headings_text', array(
		'type' => 'select',
		'description' => __('Select your suitable font for the headings.', 'one-login-business'),
		'section' => 'one_login_business_typography_settings',
		'choices' => $font_choices
		
	));

	$wp_customize->add_setting( 'one_login_business_body_text', array(
		'sanitize_callback' => 'one_login_business_sanitize_fonts'
	));

	$wp_customize->add_control( 'one_login_business_body_text', array(
		'type' => 'select',
		'description' => __( 'Select your suitable font for the body.', 'one-login-business' ),
		'section' => 'one_login_business_typography_settings',
		'choices' => $font_choices
	) );

 	$wp_customize->add_section('one_login_business_pro', array(
        'title'    => __('UPGRADE BUSINESS PREMIUM', 'one-login-business'),
        'priority' => 1,
    ));

    $wp_customize->add_setting('one_login_business_pro', array(
        'default'           => null,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new One_Login_Business_Pro_Control($wp_customize, 'one_login_business_pro', array(
        'label'    => __('BUSINESS PREMIUM', 'one-login-business'),
        'section'  => 'one_login_business_pro',
        'settings' => 'one_login_business_pro',
        'priority' => 1,
    )));

	// Theme General Settings
    $wp_customize->add_section('one_login_business_theme_settings',array(
        'title' => __('Theme General Settings', 'one-login-business'),
        'priority' => 1,
    ) );

    $wp_customize->add_setting( 'one_login_business_sticky_header', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'one_login_business_sanitize_checkbox',
	) );
	$wp_customize->add_control( new One_Login_Business_Toggle_Control( $wp_customize, 'one_login_business_sticky_header', array(
		'label'       => esc_html__( 'Show Sticky Header', 'one-login-business' ),
		'section'     => 'one_login_business_theme_settings',
		'type'        => 'toggle',
		'settings'    => 'one_login_business_sticky_header',
	) ) );

    $wp_customize->add_setting( 'one_login_business_theme_loader', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'one_login_business_sanitize_checkbox',
	) );
	$wp_customize->add_control( new One_Login_Business_Toggle_Control( $wp_customize, 'one_login_business_theme_loader', array(
		'label'       => esc_html__( 'Show Site Loader', 'one-login-business' ),
		'section'     => 'one_login_business_theme_settings',
		'type'        => 'toggle',
		'settings'    => 'one_login_business_theme_loader',
	) ) );

	$wp_customize->add_setting( 'one_login_business_scroll_enable', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'one_login_business_sanitize_checkbox',
	) );
	$wp_customize->add_control( new One_Login_Business_Toggle_Control( $wp_customize, 'one_login_business_scroll_enable', array(
		'label'       => esc_html__( 'Show Scroll Top', 'one-login-business' ),
		'section'     => 'one_login_business_theme_settings',
		'type'        => 'toggle',
		'settings'    => 'one_login_business_scroll_enable',
	) ) );

	$wp_customize->add_setting( 'one_login_business_shop_page_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'one_login_business_sanitize_checkbox',
	) );
	$wp_customize->add_control( new One_Login_Business_Toggle_Control( $wp_customize, 'one_login_business_shop_page_sidebar', array(
		'label'       => esc_html__( 'Show Shop Page Sidebar', 'one-login-business' ),
		'section'     => 'one_login_business_theme_settings',
		'type'        => 'toggle',
		'settings'    => 'one_login_business_shop_page_sidebar',
	) ) );

	$wp_customize->add_setting( 'one_login_business_wocommerce_single_page_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'one_login_business_sanitize_checkbox',
	) );
	$wp_customize->add_control( new One_Login_Business_Toggle_Control( $wp_customize, 'one_login_business_wocommerce_single_page_sidebar', array(
		'label'       => esc_html__( 'Show Single Product Page Sidebar', 'one-login-business' ),
		'section'     => 'one_login_business_theme_settings',
		'type'        => 'toggle',
		'settings'    => 'one_login_business_wocommerce_single_page_sidebar',
	) ) );

	//theme width

	$wp_customize->add_section('one_login_business_theme_width_settings',array(
        'title' => __('Theme Width Option', 'one-login-business'),
    ) );

	$wp_customize->add_setting('one_login_business_width_options',array(
        'default' => 'full_width',
        'sanitize_callback' => 'one_login_business_sanitize_choices'
	));
	$wp_customize->add_control('one_login_business_width_options',array(
        'type' => 'select',
        'label' => __('Theme Width Option','one-login-business'),
        'section' => 'one_login_business_theme_width_settings',
        'choices' => array(
            'full_width' => __('Fullwidth','one-login-business'),
            'container' => __('Container','one-login-business'),
            'container_fluid' => __('Container Fluid','one-login-business'),
        ),
	) );

    // Post Layouts
    $wp_customize->add_section('one_login_business_layout',array(
        'title' => __('Post Layout', 'one-login-business'),
        'description' => __( 'Change the post layout from below options', 'one-login-business' ),
    ) );

	$wp_customize->add_setting( 'one_login_business_post_sidebar', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'one_login_business_sanitize_checkbox',
	) );
	$wp_customize->add_control( new One_Login_Business_Toggle_Control( $wp_customize, 'one_login_business_post_sidebar', array(
		'label'       => esc_html__( 'Show Fullwidth', 'one-login-business' ),
		'section'     => 'one_login_business_layout',
		'type'        => 'toggle',
		'settings'    => 'one_login_business_post_sidebar',
	) ) );

	$wp_customize->add_setting( 'one_login_business_single_post_sidebar', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'one_login_business_sanitize_checkbox',
	) );
	$wp_customize->add_control( new One_Login_Business_Toggle_Control( $wp_customize, 'one_login_business_single_post_sidebar', array(
		'label'       => esc_html__( 'Show Single Post Fullwidth', 'one-login-business' ),
		'section'     => 'one_login_business_layout',
		'type'        => 'toggle',
		'settings'    => 'one_login_business_single_post_sidebar',
	) ) );
	
    $wp_customize->add_setting('one_login_business_post_option',array(
		'default' => 'simple_post',
		'sanitize_callback' => 'one_login_business_sanitize_select'
	));
	$wp_customize->add_control('one_login_business_post_option',array(
		'label' => esc_html__('Select Layout','one-login-business'),
		'section' => 'one_login_business_layout',
		'setting' => 'one_login_business_post_option',
		'type' => 'radio',
        'choices' => array(
            'simple_post' => __('Simple Post','one-login-business'),
            'grid_post' => __('Grid Post','one-login-business'),
        ),
	));

    $wp_customize->add_setting('one_login_business_grid_column',array(
		'default' => '3_column',
		'sanitize_callback' => 'one_login_business_sanitize_select'
	));
	$wp_customize->add_control('one_login_business_grid_column',array(
		'label' => esc_html__('Grid Post Per Row','one-login-business'),
		'section' => 'one_login_business_layout',
		'setting' => 'one_login_business_grid_column',
		'type' => 'radio',
        'choices' => array(
            '1_column' => __('1','one-login-business'),
            '2_column' => __('2','one-login-business'),
            '3_column' => __('3','one-login-business'),
            '4_column' => __('4','one-login-business'),
            '5_column' => __('6','one-login-business'),
        ),
	));

	//Top Bar
  	$wp_customize->add_section('one_login_business_topbar',array(
    	'title' => esc_html__('Topbar Section','one-login-business'),
    	'description' => esc_html__('Add topbar content','one-login-business'),
    	'priority'  => null,
  	));

  	$wp_customize->add_setting( 'one_login_business_topbar_enable', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'one_login_business_sanitize_checkbox',
	) );
	$wp_customize->add_control( new One_Login_Business_Toggle_Control( $wp_customize, 'one_login_business_topbar_enable', array(
		'label'       => esc_html__( 'Enable to show contact details', 'one-login-business' ),
		'section'     => 'one_login_business_topbar',
		'type'        => 'toggle',
		'settings'    => 'one_login_business_topbar_enable',
	) ) );

  	$wp_customize->add_setting('one_login_business_call1',array(
    	'default' => '',
    	'sanitize_callback' => 'one_login_business_sanitize_phone_number',
  	));
  	$wp_customize->add_control('one_login_business_call1',array(
    	'label' => esc_html__('Phone Number','one-login-business'),
    	'section' => 'one_login_business_topbar',
    	'type'  => 'text',
    	'active_callback' => 'one_login_business_topbar_dropdown'
  	));

  	$wp_customize->add_setting('one_login_business_mail1',array(
    	'default' => '',
    	'sanitize_callback' => 'sanitize_email',
  	));
  	$wp_customize->add_control('one_login_business_mail1',array(
    	'label' => esc_html__('Mail','one-login-business'),
    	'section' => 'one_login_business_topbar',
    	'type'  => 'text',
    	'active_callback' => 'one_login_business_topbar_dropdown'
  	));

  	$wp_customize->add_setting('one_login_business_time1',array(
    	'default' => '',
    	'sanitize_callback' => 'sanitize_text_field',
  	));
  	$wp_customize->add_control('one_login_business_time1',array(
    	'label' => esc_html__('Timing','one-login-business'),
    	'section' => 'one_login_business_topbar',
    	'type'  => 'text',
    	'active_callback' => 'one_login_business_topbar_dropdown'
  	));

	$wp_customize->add_setting('one_login_business_free1',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('one_login_business_free1',array(
		'label' => esc_html__('Button text','one-login-business'),
		'section' => 'one_login_business_topbar',
		'type'  => 'text',
		'active_callback' => 'one_login_business_topbar_dropdown'
	));

	$wp_customize->add_setting('one_login_business_free',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	)); 
	$wp_customize->add_control('one_login_business_free',array(
		'label' => esc_html__('Add Link','one-login-business'),
		'section' => 'one_login_business_topbar',
		'setting' => 'one_login_business_free',
		'type'  => 'url',
		'active_callback' => 'one_login_business_topbar_dropdown'
	));

	//social icons
 	$wp_customize->add_section('one_login_business_social_icons',array(
	  	'title' => esc_html__('Social Icons ','one-login-business'),
		'description' => esc_html__('Add topbar content','one-login-business'),
		'priority'  => null,
	));

	$wp_customize->add_setting( 'one_login_business_social_enable', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'one_login_business_sanitize_checkbox',
	) );
	$wp_customize->add_control( new One_Login_Business_Toggle_Control( $wp_customize, 'one_login_business_social_enable', array(
		'label'       => esc_html__( 'Enable to show social links', 'one-login-business' ),
		'section'     => 'one_login_business_social_icons',
		'type'        => 'toggle',
		'settings'    => 'one_login_business_social_enable',
	) ) );

	$wp_customize->add_setting('one_login_business_facebook_url',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	)); 
	$wp_customize->add_control('one_login_business_facebook_url',array(
		'label' => esc_html__('Add Facebook link','one-login-business'),
		'section' => 'one_login_business_social_icons',
		'setting' => 'one_login_business_facebook_url',
		'type'  => 'url',
		'active_callback' => 'one_login_business_social_dropdown'
	));

	$wp_customize->add_setting('one_login_business_twitter_url',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	)); 
	$wp_customize->add_control('one_login_business_twitter_url',array(
		'label' => esc_html__('Add Twitter link','one-login-business'),
		'section' => 'one_login_business_social_icons',
		'setting' => 'one_login_business_twitter_url',
		'type'  => 'url',
		'active_callback' => 'one_login_business_social_dropdown'
	));

	$wp_customize->add_setting('one_login_business_youtube_url',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('one_login_business_youtube_url',array(
		'label' => esc_html__('Add Youtube link','one-login-business'),
		'section' => 'one_login_business_social_icons',
		'setting' => 'one_login_business_youtube_url',
		'type'  => 'url',
		'active_callback' => 'one_login_business_social_dropdown'
	));

	$wp_customize->add_setting('one_login_business_instagram_url',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('one_login_business_instagram_url',array(
		'label' => esc_html__('Add Instagram link','one-login-business'),
		'section' => 'one_login_business_social_icons',
		'setting' => 'one_login_business_instagram_url',
		'type'  => 'url',
		'active_callback' => 'one_login_business_social_dropdown'
	));

	$wp_customize->add_setting('one_login_business_linkedin_url',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	)); 
	$wp_customize->add_control('one_login_business_linkedin_url',array(
		'label' => esc_html__('Add Linkedin link','one-login-business'),
		'section' => 'one_login_business_social_icons',
		'setting' => 'one_login_business_linkedin_url',
		'type'  => 'url',
		'active_callback' => 'one_login_business_social_dropdown'
	));

	//home page slider
	$wp_customize->add_section( 'one_login_business_slidersettings' , array(
    	'title'      => esc_html__( 'Slider Settings', 'one-login-business' ),
	) );

	$wp_customize->add_setting('one_login_business_slider_hide_show',array(
       'default' => 'true',
       'sanitize_callback'	=> 'one_login_business_sanitize_checkbox'
	));
	$wp_customize->add_control('one_login_business_slider_hide_show',array(
	   'type' => 'checkbox',
	   'label' => esc_html__('Enable / Disable Slides','one-login-business'),
	   'section' => 'one_login_business_slidersettings',
	));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'one_login_business_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'one_login_business_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'one_login_business_slider_page' . $count, array(
			'label'    => esc_html__( 'Select Slider Page', 'one-login-business' ),
			'section'  => 'one_login_business_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}
	
	// OUR services
	$wp_customize->add_section('one_login_business_service',array(
		'title' => esc_html__('Our Services','one-login-business'),
	));

	$wp_customize->add_setting( 'one_login_business_services_enable', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'one_login_business_sanitize_checkbox',
	) );
	$wp_customize->add_control( new One_Login_Business_Toggle_Control( $wp_customize, 'one_login_business_services_enable', array(
		'label'       => esc_html__( 'Enable to show services', 'one-login-business' ),
		'section'     => 'one_login_business_service',
		'type'        => 'toggle',
		'settings'    => 'one_login_business_services_enable',
	) ) );

	$wp_customize->add_setting('one_login_business_our_services_title',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('one_login_business_our_services_title',array(
		'label' => esc_html__('Section Title','one-login-business'),
		'section' => 'one_login_business_service',
		'setting' => 'one_login_business_our_services_title',
		'type'    => 'text',
		'active_callback' => 'one_login_business_service_dropdown'
	));

	$wp_customize->add_setting('one_login_business_our_services_subtitle',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('one_login_business_our_services_subtitle',array(
		'label' => esc_html__('Section Sub-title','one-login-business'),
		'section' => 'one_login_business_service',
		'setting' => 'one_login_business_our_services_subtitle',
		'type'    => 'text',
		'active_callback' => 'one_login_business_service_dropdown'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
	if($i==0){
	  $default = $category->slug;
	  $i++;
	}
	$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('one_login_business_category_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'one_login_business_sanitize_choices',
	));
	$wp_customize->add_control('one_login_business_category_setting',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => esc_html__('Select Category to display Post','one-login-business'),
		'section' => 'one_login_business_service',
		'active_callback' => 'one_login_business_service_dropdown'
	));

	//Footer
    $wp_customize->add_section( 'one_login_business_footer', array(
    	'title'      => esc_html__( 'Footer Text', 'one-login-business' ),
		'priority'   => null,
	) );

    $wp_customize->add_setting('one_login_business_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('one_login_business_footer_copy',array(
		'label'	=> esc_html__('Footer Text','one-login-business'),
		'section'	=> 'one_login_business_footer',
		'setting'	=> 'one_login_business_footer_copy',
		'type'		=> 'text'
	));

	//Logo
    $wp_customize->add_setting( 'one_login_business_logo_title', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'one_login_business_sanitize_checkbox',
	) );
	$wp_customize->add_control( new One_Login_Business_Toggle_Control( $wp_customize, 'one_login_business_logo_title', array(
		'label'       => esc_html__( 'Show Site Title', 'one-login-business' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'one_login_business_logo_title',
	) ) );

    $wp_customize->add_setting( 'one_login_business_logo_text', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'one_login_business_sanitize_checkbox',
	) );
	$wp_customize->add_control( new One_Login_Business_Toggle_Control( $wp_customize, 'one_login_business_logo_text', array(
		'label'       => esc_html__( 'Show Site Tagline', 'one-login-business' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'one_login_business_logo_text',
	) ) );

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'one_login_business_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'one_login_business_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'one_login_business_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'one_login_business_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'one-login-business' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'one-login-business' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'one_login_business_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'one_login_business_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'one_login_business_customize_register' );

function one_login_business_sanitize_colorscheme( $input ) {
	$valid = array( 'light', 'dark', 'custom' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'light';
}

function one_login_business_customize_partial_blogname() {
	bloginfo( 'name' );
}

function one_login_business_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function one_login_business_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function one_login_business_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

define('ONE_LOGIN_BUSINESS_PRO_LINK',__('https://www.ovationthemes.com/wordpress/wordpress-business-theme/','one-login-business'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('One_Login_Business_Pro_Control')):
    class One_Login_Business_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
	        <div class="col-md-2 col-sm-6 upsell-btn">
                <a href="<?php echo esc_url( ONE_LOGIN_BUSINESS_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE BUSINESS PREMIUM','one-login-business');?> </a>
	        </div>
            <div class="col-md-4 col-sm-6">
                <img class="one_login_business_img_responsive " src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png">
            </div>
	        <div class="col-md-3 col-sm-6">
	            <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('BUSINESS PREMIUM - Features', 'one-login-business'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-one_login_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'one-login-business');?> </li>
                    <li class="upsell-one_login_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'one-login-business');?> </li>
                    <li class="upsell-one_login_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'one-login-business');?> </li>
                    <li class="upsell-one_login_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'one-login-business');?> </li>
                    <li class="upsell-one_login_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'one-login-business');?> </li>
                    <li class="upsell-one_login_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'one-login-business');?> </li>
                    <li class="upsell-one_login_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'one-login-business');?> </li>
                    <li class="upsell-one_login_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'one-login-business');?> </li>
                    <li class="upsell-one_login_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'one-login-business');?> </li>
                    <li class="upsell-one_login_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'one-login-business');?> </li>
                    <li class="upsell-one_login_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'one-login-business');?> </li>
                    <li class="upsell-one_login_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'one-login-business');?> </li>
                    <li class="upsell-one_login_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'one-login-business');?> </li>
                    <li class="upsell-one_login_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'one-login-business');?> </li>
                    <li class="upsell-one_login_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'one-login-business');?> </li>
                    <li class="upsell-one_login_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'one-login-business');?> </li>
                    <li class="upsell-one_login_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'one-login-business');?> </li>
                    <li class="upsell-one_login_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'one-login-business');?> </li>
                    <li class="upsell-one_login_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'one-login-business');?> </li>
                   	<li class="upsell-one_login_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'one-login-business');?> </li>
                   	<li class="upsell-one_login_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'one-login-business');?> </li>
                   	<li class="upsell-one_login_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'one-login-business');?> </li>
                   	<li class="upsell-one_login_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'one-login-business');?> </li>                    
                </ul>
        	</div>
		    <div class="col-md-2 col-sm-6 upsell-btn upsell-btn-bottom">
	            <a href="<?php echo esc_url( ONE_LOGIN_BUSINESS_PRO_LINK ); ?>" target="_blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE BUSINESS PREMIUM','one-login-business');?> </a>
		    </div>
			<p><?php printf(__('Please review us if you love our product on %1$sWordPress.org%2$s. </br></br>  Thank You', 'one-login-business'), '<a target="_blank" href="https://wordpress.org/support/theme/one-login-business/reviews/">', '</a>');
            ?></p>
        </label>
    <?php } }
endif;