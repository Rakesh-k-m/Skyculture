<?php
/**
* Template part for displaying front page introduction.
*
* @package Ostrich Education
*/

// Get the content type.
$video = get_theme_mod( 'ostrich_education_video', 'page' );
// Bail if the section is disabled.
if ( 'disable' === $video ) {
    return;
}

$sub_title    = get_theme_mod( 'ostrich_education_video_sub_title', __( 'GET SOLUTIONS FAST', 'ostrich-education') ) ;
$get_content = ostrich_education_get_section_content( 'video', $video, 1  );
?>

<?php foreach ( $get_content as $content ): ?>

    <div id="video" class="pt" style="background-image:url('<?php echo esc_url( get_theme_mod('ostrich_education_video_bg_image') ); ?>')">
        <div class="overlay"></div>
        <div class="container">
            <div class="section-header">
                <?php if( !empty( $sub_title ) ): ?>
                    <p class="section-subtitle"><?php echo esc_html( $sub_title ); ?></p>
                <?php endif; ?>
                <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
            </div><!-- .section-header -->

            <?php if( !empty( get_theme_mod( 'ostrich_education_video_url') ) ): ?>
                <div class="section-content">
                    <div class="video-button">
                        <a href="<?php echo esc_url( get_theme_mod( 'ostrich_education_video_url') ); ?>" class="popup-youtube">
                            <svg class="svg-inline--fa fa-play fa-w-14" viewBox="0 0 448 512"><path d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>
                        </a>
                    </div>
                </div><!-- .section-content -->
            <?php endif; ?>
        </div> <!-- .container -->
    </div><!-- #cta -->

<?php endforeach; ?> 