<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Ostrich Education
 */

// Get the content type.
$team = get_theme_mod( 'ostrich_education_team', 'page' );
$subtitle   = get_theme_mod('ostrich_education_team_sub_title',__('Our Members','ostrich-education') );
$team_title   = get_theme_mod('ostrich_education_team_title',__('Here is Our Awesome Team','ostrich-education') );

// Bail if the section is disabled.
if ( 'disable' === $team ) {
	return;
}

$get_content = ostrich_education_get_section_content( 'team', $team, 4 );

?>

<div id="our-team" class="pt">
    <div class="container">
        <div class="section-header">
            <?php if( !empty( $subtitle ) ): ?>
                <p class="section-subtitle"><?php echo esc_html( $subtitle ); ?></p>
            <?php endif; 
            if( !empty( $team_title ) ):
                ?>
                <h2 class="section-title"><?php echo esc_html( $team_title ); ?></h2>
            <?php endif; ?>
        </div><!-- .section-header -->

        <div class="section-content col-4 clear">

            <?php $i=1; foreach ($get_content as $content): ?>

            <article>
                <div class="team-item-wrapper">
                    <div class="featured-image">
                        <a href="<?php echo esc_url($content['url']); ?>"><img src="<?php echo esc_url(get_the_post_thumbnail_url($content['id'],'medium_large')); ?>" alt="<?php echo $content['title']; ?>"></a>
                    </div><!-- .featured-image -->

                    <div class="entry-container">
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php echo esc_url($content['url']); ?>"><?php echo $content['title']; ?></a></h2>

                            <?php if( !empty( get_theme_mod('ostrich_education_team_position_'.$i) ) ): ?>
                                <span class="member-position">
                                    <?php echo esc_html(get_theme_mod('ostrich_education_team_position_'.$i)); ?>
                                </span>
                            <?php endif; ?>
                        </header>

                    </div><!-- .entry-container -->
                </div><!-- .team-item-wrapper -->
            </article>

            <?php $i++; endforeach; ?>

        </div><!-- .section-content -->
    </div><!-- .container -->
</div><!-- #our-team -->