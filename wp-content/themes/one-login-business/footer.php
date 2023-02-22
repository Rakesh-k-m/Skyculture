<?php
/**
 * The template for displaying the footer
 * @subpackage One Login Business
 * @since 1.0
 */

?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
		</div>
		<div class="clearfix"></div>
		<div class="copyright">
			<div class="container">
				<?php get_template_part( 'template-parts/footer/site', 'info' ); ?>
			</div>
		</div>
		<?php if( get_theme_mod( 'one_login_business_scroll_enable',true) != '') { ?>
			<div class="scroll-top">
				<button type=button id="one-login-business-scroll-to-top" class="scrollup"><i class="fas fa-chevron-up"></i></button>
			</div>	
		<?php }?>
	</footer>
<?php wp_footer(); ?>

</body>
</html>