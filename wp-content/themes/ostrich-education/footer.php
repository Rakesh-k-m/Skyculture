<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ostrich Education
 */

$default = ostrich_education_get_default_mods();
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<!-- supports col-1, col-2, col-3 and col-4 -->
		<!-- supports unequal-width and equal-width -->
		<?php  
		$count = 0;
		for ( $i=1; $i <=4 ; $i++ ) { 
			if ( is_active_sidebar( 'footer-' . $i ) ) {
				$count++;
			}
		}
		
		if ( 0 !== $count ) : ?>
			<div class="footer-widgets-area page-section col-<?php echo esc_attr( $count );?>">
			    <div class="container">
					<?php 
					for ( $j=1; $j <=4; $j++ ) { 
						if ( is_active_sidebar( 'footer-' . $j ) ) {
			    			echo '<div class="hentry">';
							dynamic_sidebar( 'footer-' . $j ); 
			    			echo '</div>';
						}
					}
					?>
				</div><!-- .wrapper -->
			</div><!-- .footer-widget-area -->

		<?php endif;
		 $ostrich_education_search = array( '[the-year]', '[site-link]' );

        $replace = array( date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );

        $copyright = str_replace( $ostrich_education_search, $replace, get_theme_mod( 'ostrich_education_copyright_txt', $default['ostrich_education_copyright_txt'] ) );

			?>
		<div class="site-info">
				<!-- supports col-1 and col-2 -->
				<?php 

				?>
				<div class="wrapper">
					<span>	
					<?php echo wp_kses_post(  $copyright ); ?> 	
					<?php echo sprintf( esc_html__( '%1$s by %2$s.', 'ostrich-education' ), 'Ostrich Education', '<a target="_blank" href="' . esc_url( 'http://themeostrich.com/' ) . '">Theme Ostrich</a>' ); ?>	
					</span>	    
				</div><!-- .wrapper -->    
				
			</div><!-- .site-info -->
			
	</footer><!-- #colophon -->
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
