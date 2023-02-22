<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Ostrich Education
 */

// Get the content type.
$service = get_theme_mod( 'ostrich_education_service', 'post' );
// Bail if the section is disabled.
if ( 'disable' === $service ) {
    return;
}

$sub_title = get_theme_mod( 'ostrich_education_service_sub_title', __( 'Services', 'ostrich-education') ) ;

$service_title = get_theme_mod( 'ostrich_education_service_title', __( 'We Provide Online And Offline Courses', 'ostrich-education') );

$service_btn = get_theme_mod( 'ostrich_education_service_btn_label', __( 'Learn More', 'ostrich-education') );

$get_content = ostrich_education_get_section_content( 'service', $service, 4  );

?>

<div id="our-services" class="pt padding">
    <div class="container">
        <div class="section-header">
            <?php if( !empty( $sub_title ) ): ?>
                <p class="section-subtitle"><?php echo esc_html( $sub_title ); ?></p>
            <?php endif;

            if( !empty( $service_title ) ):
                ?>
                <h2 class="section-title"><?php echo esc_html( $service_title ); ?></h2>
            <?php endif; ?>
        </div><!-- .section-header -->

        <div class="col-4 clear">

            <?php $i=1; foreach ( $get_content as $content ): 
            $icon = get_theme_mod( 'ostrich_education_service_icon_'.$i ) ? get_theme_mod( 'ostrich_education_service_icon_'.$i ) : 'fa-free-code-camp';
            ?>
            <article>
                <div class="services-wrap">
                    <div class="icon">
                        <a href="<?php echo esc_url( $content['url'] ); ?>"><i class="fa <?php echo esc_attr( $icon ); ?>"></i></a>
                    </div><!-- .icon -->

                    <div class="entry-container">
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                        </header>

                        <?php if( !empty( $service_btn ) ): ?>

                            <div class="read-more">
                                <a href="<?php echo esc_url( $content['url'] ); ?>" class="button"><?php echo esc_html( $service_btn ); ?></a>
                            </div>

                        <?php endif; ?>

                    </div><!-- .entry-container -->
                </div><!-- .services-wrap -->
            </article>

            <?php $i++; endforeach; ?>

        </div><!-- .section-content -->
    </div><!-- .wrapper -->
</div><!-- #our-services -->