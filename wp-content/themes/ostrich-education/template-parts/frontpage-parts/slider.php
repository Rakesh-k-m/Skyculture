<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Ostrich Education
 */

// Get the content type.
$slider = get_theme_mod( 'ostrich_education_slider', 'page' );
// Bail if the section is disabled.
if ( 'disable' === $slider ) {
	return;
}

$slider_btn    = get_theme_mod( 'ostrich_education_slider_button_label', __( 'Learn More', 'ostrich-education') );

$get_content = ostrich_education_get_section_content( 'slider', $slider, 3  );
?>

<div id="hero-slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1500, "dots": false, "arrows":true, "autoplay": false, "draggable": true, "fade": false }'>

  <?php $i=1; foreach ( $get_content as $content ): ?>

    <article style="background-image:url('<?php echo esc_url( get_the_post_thumbnail_url( $content['id'] ) ) ; ?>');">
        <div class="overlay"></div>
        <div class="container">
            <div class="hero-slider-wrapper">
                <header class="entry-header">
                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>" tabindex="0"><?php echo esc_html( $content['title'] ); ?></a></h2>
                </header>

                <div class="entry-content">
                    <p><?php echo esc_html( wp_trim_words( $content['content'], 30 ) ); ?></p>
                </div><!-- .entry-content -->

                <div class="buttons">
                    <?php if( !empty( $slider_btn ) ): ?>
                    <a href="<?php echo esc_url( $content['url'] ); ?>" class="button primary"><?php echo esc_html( $slider_btn ); ?></a>
                <?php endif; ?>

                <?php if( !empty( get_theme_mod( 'ostrich_education_slider_alt_button_url_'.$i ) ) && !empty( get_theme_mod( 'ostrich_education_slider_alt_button_label_'.$i ) ) ): ?>

                    <a href="<?php echo esc_url( get_theme_mod( 'ostrich_education_slider_alt_button_url_'.$i, '#' ) ); ?>" class="button transparent"><?php echo esc_html( get_theme_mod( 'ostrich_education_slider_alt_button_label_'.$i ) ); ?></a>

                <?php endif; ?>
                </div>
            </div><!-- .hero-slider-wrapper -->
        </div><!-- .container -->
    </article>

    <?php $i++; endforeach;  ?>

</div><!-- #featured-slider -->