<?php
/**
 * Template part for displaying front page subscription.
 *
 * @package Moral
 */

if ( ! defined( 'JETPACK__VERSION' ) ) {
	return;
}

$subscription = get_theme_mod( 'ostrich_education_enable_subscription', true );

$subscription_subtitle = get_theme_mod( 'ostrich_education_subscription_subtitle', __( 'Become a Member Today', 'ostrich-education') );

$subscription_title = get_theme_mod( 'ostrich_education_subscription_title', __( 'Our Next Course Starting', 'ostrich-education') );

$subscription_description = get_theme_mod( 'ostrich_education_subscription_description', __( 'Subscribe our newsletter to get the latest news/events delivered right to your inbox.', 'ostrich-education') );

$subscription_btn_text = get_theme_mod( 'ostrich_education_subscription_btn_text', __( 'GET IT NOW', 'ostrich-education') );

if ( ! $subscription ) {
	return;
}

?>

<div id="subscribe-newsletter" class="pt col-2" style="background-image: url('<?php echo esc_url( get_theme_mod( 'ostrich_education_subscription_bg_image' ) ) ; ?>');">
	<div class="overlay"></div>
	<div class="container">
		<article>
			<div class="section-header">
				<?php if( !empty( $subscription_subtitle ) ): ?>
				<h3 class="section-subtitle"><?php echo esc_html( $subscription_subtitle ); ?></h3>
			<?php endif;
			if( !empty( $subscription_title ) ):
			 ?>
				<h2 class="section-title"><?php echo esc_html( $subscription_title ); ?></h2>
			<?php endif; ?>
			</div><!-- .section-header -->
		</article>

		<article>
			<div class="widget jetpack_subscription_widget">
				<?php 
				$subscription_shortcode = '[jetpack_subscription_form title="" subscribe_text="' . esc_html( $subscription_description ) . '" subscribe_button="' . esc_html( $subscription_btn_text ) . '" show_subscribers_total="0"]';
				echo do_shortcode( wp_kses_post( $subscription_shortcode ) ); 
				?>
			</div><!-- .jetpack_subscription_widget -->
		</article>
	</div><!-- .wrapper -->
</div><!-- #subscribe-newsletter -->
