<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ostrich Education
 */
?>
<!doctype html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
 
<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ostrich-education' ); ?></a>
    
    <div class="menu-overlay"></div>

    <?php if (get_theme_mod( 'ostrich_education_top_bar', 'post' ) !== 'disable'): ?>
        
        <div id="top-bar" class="relative col-2">
            <div class="container">

                <?php 

                $top_bar_news_title    = get_theme_mod( 'ostrich_education_top_bar_news_title_label', __( 'NEWS', 'ostrich-education') );

                $get_content = ostrich_education_get_section_content( 'top_bar', get_theme_mod( 'ostrich_education_top_bar', 'post' ), 2 );

                ?>

                <div class="latest-news">
                    <span class="latest-news-header">
                        <svg viewBox="0 0 512 512">
                            <circle cx="160" cy="320.021" r="64"/>
                            <path d="M480,160.021H118.944l254.752-97.056c8.288-3.136,12.416-12.384,9.248-20.672c-3.136-8.288-12.384-12.416-20.64-9.248
                            l-336,128c-0.096,0.064-0.16,0.128-0.256,0.192C11.36,164.117,0,176.501,0,192.021v256c0,17.664,14.368,32,32,32h448
                            c17.664,0,32-14.336,32-32v-256C512,174.389,497.664,160.021,480,160.021z M160,416.021c-52.928,0-96-43.072-96-96s43.072-96,96-96
                            s96,43.072,96,96S212.928,416.021,160,416.021z M448,416.021H320v-32h128V416.021z M448,352.021H320v-32h128V352.021z M448,288.021
                            H320v-32h128V288.021z"/></svg>
                            <?php if( !empty( $top_bar_news_title ) ): ?>
                                <span><?php echo esc_html( $top_bar_news_title ); ?></span>
                            <?php endif; ?>
                        </span>

                        <div class="latest-news-slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 800, "dots": false, "arrows":false, "autoplay": false, "draggable": true, "vertical": true, "fade": false }'>

                            <?php foreach ( $get_content as $content ): ?>

                                <div class="slick-item">
                                    <p><?php echo esc_html( $content['title'] ); ?></p>
                                </div><!-- .slick-item -->
                                
                            <?php endforeach; ?>

                        </div><!-- .latest-news-slider-->
                    </div><!-- .latest-news -->
                    
                    <div class="contact-info col-1">
                        
                        <?php 
                        if ( get_theme_mod( 'ostrich_education_top_bar_social_menu', true )) {
                            if ( has_nav_menu( 'social' ) ) :
                                ?>
                                <div class="social-icons">
                                    <?php  
                                    wp_nav_menu( array(
                                        'theme_location' => 'social',
                                        'container' => false,
                                        'menu_class' => 'menu',
                                        'echo' => true,
                                        'depth' => 1,
                                        'link_before' => '<span class="screen-reader-text">',
                                        'link_after' => '</span>',
                                    ) );
                                    ?>
                                </div><!-- .social-icons -->
                                <?php
                            endif;
                        }
                        ?>
                    </div><!-- .contact-info -->

                    <button class="topheader-dropdown">
                        <svg viewBox="0 0 129 129" class="icon-down">
                            <path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z"></path>
                        </svg>
                    </button><!-- .topheader-dropdown -->
                </div><!-- .container -->
            </div>

    <?php endif; ?>    

    <?php get_template_part( 'template-parts/header' );  ?>
    
	<div id="content" class="site-content">
