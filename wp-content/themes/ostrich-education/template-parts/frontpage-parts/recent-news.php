<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Ostrich Education
 */

// Get the content type.
$recent_news = get_theme_mod( 'ostrich_education_recent_news', 'cat' );
// Bail if the section is disabled.
if ( 'disable' === $recent_news ) {
	return;
}

$recent_news_btn    = get_theme_mod( 'ostrich_education_recent_news_button_label', __( 'Learn More', 'ostrich-education') );
$recent_news_title    = get_theme_mod( 'ostrich_education_recent_news_title', __( 'Our Educational Recents News', 'ostrich-education') );
$recent_news_subtitle    = get_theme_mod( 'ostrich_education_recent_news_sub_title', __( 'Recent News', 'ostrich-education') );


$get_content = ostrich_education_get_section_content( 'recent_news', $recent_news, 3  );
?>

<div id="recent-news" class="pt">
    <div class="container">
        <div class="section-header">
            <?php if( !empty( $recent_news_subtitle ) ): ?>
                <p class="section-subtitle"><?php echo esc_html( $recent_news_subtitle ); ?></p>
            <?php endif;

            if( !empty( $recent_news_title ) ):

                ?>
            <h2 class="section-title"><?php echo esc_html( $recent_news_title ); ?></h2>
        <?php endif; ?>
    </div><!-- .section-header -->

    <div class="section-content col-3 clear">

        <?php foreach ( $get_content as $content ): ?>

            <article>
                <div class="recent-news-item">
                    <div class="featured-image">
                        <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( get_the_post_thumbnail_url( $content['id'] ) ) ; ?>" alt="news"></a>
                    </div><!-- .featured-image -->

                    <div class="entry-meta">
                        <?php ostrich_education_post_author() ;

                        ostrich_education_posted_on( $content['id'] ); ?>
                    </div><!-- .entry-meta -->

                    <header class="entry-header">
                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                    </header>

                    <div class="entry-content">
                        <p><?php echo esc_html( wp_trim_words( $content['content'], 30 ) ); ?></p>
                    </div><!-- .entry-content -->

                    <?php if( !empty( $recent_news_btn ) ): ?>
                        <div class="read-more">
                            <a href="<?php echo esc_url( $content['url'] ); ?>" class="button"><?php echo esc_html( $recent_news_btn ); ?></a>
                        </div>
                    <?php endif; ?>
                </div><!-- team-item-wrapper -->
            </article>

        <?php endforeach; ?>

    </div><!-- .section-content -->
</div><!-- .wrapper -->
</div><!-- #recent-news -->