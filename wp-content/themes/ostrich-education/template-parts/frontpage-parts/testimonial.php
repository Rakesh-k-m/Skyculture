<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Ostrich Education
 */

// Get the content type.
$testimonial = get_theme_mod( 'ostrich_education_testimonial', 'cat' );
$testimonial_num	= get_theme_mod( 'ostrich_education_testimonial_num', 4 ) ;
$testimonial_excerpt = get_theme_mod( 'ostrich_education_testimonial_excerpt', 35 );
$testimonial_autoplay = get_theme_mod( 'ostrich_education_testimonial_autoplay', false);
$testimonial_subtitle = get_theme_mod( 'ostrich_education_testimonial_sub_title', __( 'Our Testimonial', 'ostrich-education'));
$testimonial_title = get_theme_mod( 'ostrich_education_testimonial_title', __( 'What Our Parents Say', 'ostrich-education'));
// Bail if the section is disabled.
if ( 'disable' === $testimonial ) {
	return;
}

$get_content = ostrich_education_get_section_content( 'testimonial', $testimonial, $testimonial_num );

?>

<div id="testimonial" class="pt">
    <div class="container">
        <div class="section-header">
            <?php if( !empty( $testimonial_subtitle ) ): ?>
                <p class="section-subtitle"><?php echo esc_html( $testimonial_subtitle ); ?></p>
            <?php endif;

            if( !empty( $testimonial_title ) ):
               ?>
               <h2 class="section-title"><?php echo esc_html( $testimonial_title ); ?></h2>
           <?php endif; ?>
       </div><!-- .section-header -->

        <div class="testimonial-slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite": true, "speed": 1500, "dots": true, "arrows": false, "autoplay": <?php echo esc_attr( $testimonial_autoplay ); ?>, "draggable": true, "fade": false }'>

            <?php foreach ($get_content as $i=>$content): ?>

            <article>
                <div class="testimonial-slider-wrapper">
                    <div class="featured-image">
                        <a href="<?php echo esc_url($content['url']); ?>"><img src="<?php echo esc_url( get_the_post_thumbnail_url( $content['id'] ) ) ; ?>" alt="testimonial"></a>
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php echo esc_url($content['url']); ?>"><?php echo $content['title']; ?></a></h2>
                            <span class="position"><?php echo esc_html(get_theme_mod('ostrich_education_testimonial_position_'.($i+1))); ?></span>
                        </header>
                    </div><!-- .featured-image -->

                    <div class="entry-content">
                        <p><?php echo esc_html( wp_trim_words( $content['content'], $testimonial_excerpt ) ); ?></p>                  
                    </div><!-- .entry-content -->
                </div>
            </article>

            <?php endforeach; ?>

        </div><!-- .testimonial-slider -->
    </div><!-- .container -->
</div><!-- #testimonial -->