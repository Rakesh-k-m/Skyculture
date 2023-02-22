<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Ostrich Education
 */

// Get the content type.
$about = get_theme_mod( 'ostrich_education_about', 'post' );
// Bail if the section is disabled.
if ( 'disable' === $about ) {
    return;
}

$about_btn    = get_theme_mod( 'ostrich_education_about_btn_title', __( 'Learn More', 'ostrich-education') ) ;
$sub_title    = get_theme_mod( 'ostrich_education_about_sub_title', __( 'About Us', 'ostrich-education') ) ;
$get_content = ostrich_education_get_section_content( 'about', $about, 1  );

?>

<div id="about-us" class="relative pt">
    <div class="container">
        <?php foreach ( $get_content as $content ): ?>
        
        <article class="has-post-thumbnail">
            <div class="featured-image" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( $content['id'] ) ) ; ?>');"></div>

            <div class="entry-container">
                <div class="section-header">
                    <p class="section-subtitle"><?php echo esc_html( $sub_title ); ?></p>
                    <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
                </div>

                <div class="entry-content">
                    <p><?php echo esc_html( wp_trim_words( $content['content'], 75 ) ); ?></p>
                </div><!-- .entry-content -->

                <?php if( !empty( esc_html( $about_btn ) ) ): ?>
                <div class="read-more">
                    <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="button" tabindex="0"><?php echo esc_html( $about_btn ); ?></a>
                </div>
            <?php endif; ?>

            </div><!-- .entry-container -->
        </article>

    <?php endforeach; ?>
    </div><!-- .wrapper -->
</div><!-- #about-us -->