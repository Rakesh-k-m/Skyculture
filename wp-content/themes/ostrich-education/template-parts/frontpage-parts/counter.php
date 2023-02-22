<?php
/**
* Template part for displaying front page introduction.
*
* @package Ostrich Education
*/

// Get the content type.
$counter = get_theme_mod( 'ostrich_education_counter', 'custom' );
// Bail if the section is disabled.
if ( 'disable' === $counter ) {
    return;
}

$counter_bg_image = get_theme_mod('ostrich_education_counter_bg_image', '');

$get_content = ostrich_education_get_section_content( 'counter', $counter, 4  );

?>

<div id="counter" class="pt" style="background-image: url('<?php echo esc_url( $counter_bg_image ); ?>');">
    
    <div class="overlay"></div>
    <div class="container">
        <div class="col-4 clear">

            <?php foreach ($get_content as $i=>$content):
                $icon = get_theme_mod( 'ostrich_education_counter_icon_'.($i+1) ) ? get_theme_mod( 'ostrich_education_counter_icon_'.($i+1) ) : 'fa-user';
             ?>

            <article>
                <div class="counter-icon">
                    <i class="fa <?php echo esc_attr( $icon ); ?>"></i>
                </div>

                <div class="counter-item">
                    <h2 class="counter-value"><?php echo esc_html(get_theme_mod('ostrich_education_counter_value_'.($i+1))); ?></h2>
                    <h3 class="counter-title"><?php echo esc_html(get_theme_mod('ostrich_education_counter_title_'.($i+1))); ?></h3>
                </div><!-- .counter-item -->
            </article>

            <?php endforeach; ?>

        </div><!-- .col-4 -->
    </div><!-- .container -->
</div><!-- #counter-section -->
