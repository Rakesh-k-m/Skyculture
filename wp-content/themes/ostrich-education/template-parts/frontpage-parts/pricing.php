<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Ostrich Education
 */

// Get the content type.
$pricing = get_theme_mod( 'ostrich_education_pricing', true );

$pricing_subtitle    = get_theme_mod( 'ostrich_education_pricing_sub_title', __( 'Packages', 'ostrich-education') ) ;
$pricing_title    = get_theme_mod( 'ostrich_education_pricing_title', __( 'Choose Your Perfect Plan', 'ostrich-education') ) ;

$pricing_num = get_theme_mod( 'ostrich_education_pricing_num', 3 ) ;

// Bail if the section is disabled.
if ( false === $pricing ) {
    return;
}

?>

<div id="pricing" class="pt">
    <div class="container">
        <div class="section-header">
        <?php if( !empty( $pricing_subtitle ) ): ?>
            <p class="section-subtitle"><?php echo esc_html( $pricing_subtitle ); ?></p>
        <?php endif;
                if( !empty( $pricing_title ) ):
         ?>
            <h2 class="section-title"><?php echo esc_html( $pricing_title ); ?></h2>
        <?php endif; ?>
        </div><!-- .section-header -->

        <div class="section-content col-<?php echo esc_attr( $pricing_num ); ?>">
            
            <?php for ( $i=1; $i <= $pricing_num; $i++ ){ ?>

            <article>
                <div class="post-wrapper">
                    <div class="entry-container">
                        <header class="entry-header">
                            <?php if( !empty( get_theme_mod( 'ostrich_education_pricing_title_' .$i ) ) ): ?>
                            <h3 class="entry-title"><?php echo esc_html( get_theme_mod( 'ostrich_education_pricing_title_' .$i )  ); ?></h3>
                        <?php endif;

                        if( !empty( get_theme_mod( 'ostrich_education_pricing_price_' .$i ) ) ): ?>
                            <h2 class="entry-value"><?php echo esc_html( get_theme_mod( 'ostrich_education_pricing_price_' .$i )  ); ?></h2>
                        <?php endif;

                        if( !empty( get_theme_mod( 'ostrich_education_pricing_sub_title_' .$i ) ) ): ?>
                            <p class="sub-label"><?php echo esc_html( get_theme_mod( 'ostrich_education_pricing_sub_title_' .$i )  ); ?></p>
                        <?php endif; ?>
                        </header><!-- .entry-header -->
                        <div class="entry-content">
                            <ul class="pricing-list">
                                <?php 
                                $price_lists = ! empty( get_theme_mod( 'ostrich_education_pricing_price_list_' .$i ) ) ? explode( '|', get_theme_mod( 'ostrich_education_pricing_price_list_' .$i ) ) : array();
                                foreach ($price_lists as $price_list ) { 
                                    if ( isset( $price_list ) ) { 
                                        ?>
                                        <li><?php echo esc_html( $price_list ); ?></li>
                                    <?php }  
                                } ?>
                            </ul>
                        </div><!-- .entry-content -->

                        <?php if( !empty( get_theme_mod( 'ostrich_education_pricing_btn_url_' .$i ) ) && !empty( get_theme_mod( 'ostrich_education_pricing_btn_' .$i ) ) ): ?>
                        <div class="read-more">
                            <a href="<?php echo esc_url( get_theme_mod( 'ostrich_education_pricing_btn_url_' .$i )  ); ?>" class="button" tabindex="0"><i class="fa fa-book"></i><?php echo esc_html( get_theme_mod( 'ostrich_education_pricing_btn_' .$i )  ); ?></a>
                        </div>
                    <?php endif; ?>
                    </div><!-- .entry-container -->
                </div><!-- .price-table-wrapper -->
            </article>

        <?php } ?>

        </div><!-- .section-content -->
    </div><!-- .container -->
</div><!-- #pricing -->