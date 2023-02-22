<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Ostrich Education
 */

// Get the content type.
$our_courses = get_theme_mod( 'ostrich_education_our_courses', 'cat' );
// Bail if the section is disabled.
if ( 'disable' === $our_courses ) {
	return;
}

$our_courses_title    = get_theme_mod( 'ostrich_education_our_courses_title', __( 'Learn Our Most Valuable Courses Here', 'ostrich-education') );
$our_courses_subtitle    = get_theme_mod( 'ostrich_education_our_courses_sub_title', __( 'Our Courses', 'ostrich-education') );

$get_content = ostrich_education_get_section_content( 'our_courses', $our_courses, 3 );
?>

<div id="our-courses" class="pt">
    <div class="container">
        <div class="section-header">
            <?php if( !empty( $our_courses_subtitle ) ): ?>
            <p class="section-subtitle"><?php echo esc_html( $our_courses_subtitle ); ?></p>
        <?php endif;
        if( !empty( $our_courses_title ) ):
         ?>
            <h2 class="section-title"><?php echo esc_html( $our_courses_title ); ?></h2>
        <?php endif; ?>
        </div><!-- .section-header -->

        <div class="section-content col-3 clear">

            <?php foreach ( $get_content as $content ): ?>

            <article>
                <div class="courses-wrapper">
                    <div class="hover-wrapper">
                        <div class="featured-image" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( $content['id'] ) ); ?>');"></div>
                        <span class="cat-links">
                            <?php the_category( '', '', $content['id'] ); ?>
                        </span>
                    </div>

                    <div class="entry-container">
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                        </header>

                        <div class="entry-content">
                            <p><?php echo esc_html( wp_trim_words( $content['content'], 25 ) ); ?></p>
                        </div><!-- .entry-content -->

                        <div class="entry-meta">
                            <?php ostrich_education_post_author() ;

                        ostrich_education_posted_on( $content['id'] ); ?>
                        </div><!-- .entry-meta -->
                    </div><!-- .entry-container -->
                </div><!-- .courses-wrapper -->
            </article>

            <?php endforeach; ?>

        </div><!-- .section-content -->
        
    </div><!-- .container -->
</div><!-- #our-courses -->