<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Ostrich Education
 */

// Get the content type.
$top_bar = get_theme_mod( 'ostrich_education_top_bar', 'post' );
// Bail if the section is disabled.
if ( 'disable' === $top_bar ) {
	return;
}
$top_bar_count    = get_theme_mod( 'ostrich_education_top_bar_count', 3 ) ;

$top_bar_btn    = get_theme_mod( 'ostrich_education_top_bar_button_label', __( 'Learn More', 'ostrich-education') );

$top_bar_autoplay = get_theme_mod( 'ostrich_education_top_bar_autoplay', false);

$top_bar_excerpt = get_theme_mod( 'ostrich_education_top_bar_excerpt', 30 );

$get_content = ostrich_education_get_section_content( 'top_bar', $top_bar, $top_bar_count  );
?>

<div id="hero-top_bar" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1500, "dots": false, "arrows":true, "autoplay": <?php echo esc_attr( $top_bar_autoplay ); ?>, "draggable": true, "fade": false }'>

    <?php foreach ( $get_content as $content ): ?>

    <article style="background-image:url('<?php echo esc_url( get_the_post_thumbnail_url( $content['id'] ) ) ; ?>');">
        <div class="overlay"></div>
        <div class="container">
            <div class="hero-top_bar-wrapper">
                <header class="entry-header">
                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>" tabindex="0"><?php echo esc_html( $content['title'] ); ?></a></h2>
                </header>

                <div class="entry-content">
                    <p><?php echo esc_html( wp_trim_words( $content['content'], $top_bar_excerpt ) ); ?></p>
                </div><!-- .entry-content -->

                <?php if( !empty( $top_bar_btn ) ): ?>
                <div class="read-more">
                    <a href="<?php echo esc_url( $content['url'] ); ?>" class="button" tabindex="0"><?php echo esc_html( $top_bar_btn ); ?></a>
                </div>
            <?php endif; ?>
            </div><!-- .hero-top_bar-wrapper -->
        </div><!-- .container -->
    </article>

<?php endforeach; ?>

</div><!-- #featured-top_bar -->