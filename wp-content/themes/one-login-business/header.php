<?php
/**
 * The header for our theme
 *
 * @subpackage One Login Business
 * @since 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}
?>

<div id="page" class="site">
<?php if( get_theme_mod('one_login_business_theme_loader','') != ''){ ?>
	<div class="preloader">
		<div class="load">
		  <hr/><hr/><hr/><hr/>
		</div>
	</div>
<?php }?>
<div id="header">
	<div class="container">
		<div class="business-header">
			<div class="row">
				<div class="col-lg-8 col-md-8 align-self-center">
					<span class="call">
						<?php if( get_theme_mod('one_login_business_topbar_enable') != ''){ ?>
				          <?php if( get_theme_mod('one_login_business_call1') != ''){ ?>
				            <i class="fas fa-phone"></i><span><?php echo esc_html( get_theme_mod('one_login_business_call1','')); ?></span>
				          <?php } ?>
				        </span>
					
						<span class="mail">
				          <?php if( get_theme_mod('one_login_business_mail1') != ''){ ?>
				            <i class="fas fa-envelope"></i><span><?php echo esc_html( get_theme_mod('one_login_business_mail1','')); ?></span>
				          <?php } ?>
				        </span>
					
						<span class="time">
				          <?php if( get_theme_mod('one_login_business_time1') != ''){ ?>
				            <i class="far fa-clock"></i><span><?php echo esc_html( get_theme_mod('one_login_business_time1','')); ?></span>
				          <?php } ?>
				         <?php } ?>
			        </span>
				</div>
				<div class="col-lg-4 col-md-4 align-self-center">
					<div class="social-icons">
						<?php if( get_theme_mod('one_login_business_social_enable') != ''){ ?>
				            <?php if( get_theme_mod( 'one_login_business_facebook_url') != '') { ?>
				              <a href="<?php echo esc_url( get_theme_mod( 'one_login_business_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
				            <?php } ?>
				            <?php if( get_theme_mod( 'one_login_business_twitter_url') != '') { ?>
				              <a href="<?php echo esc_url( get_theme_mod( 'one_login_business_twitter_url','' ) ); ?>"><i class="fab fa-twitter"></i></a>
				            <?php } ?>
				            <?php if( get_theme_mod( 'one_login_business_youtube_url') != '') { ?>
				              <a href="<?php echo esc_url( get_theme_mod( 'one_login_business_youtube_url','' ) ); ?>"><i class="fab fa-youtube"></i></a>
				            <?php } ?>
				            <?php if( get_theme_mod( 'one_login_business_instagram_url') != '') { ?>
				              <a href="<?php echo esc_url( get_theme_mod( 'one_login_business_instagram_url','' ) ); ?>"><i class="fab fa-instagram"></i></a>
				            <?php } ?>
				            <?php if( get_theme_mod( 'one_login_business_linkedin_url') != '') { ?>
				              <a href="<?php echo esc_url( get_theme_mod( 'one_login_business_linkedin_url','' ) ); ?>"><i class="fab fa-linkedin-in"></i></a>
				            <?php } ?>
			            <?php } ?>                 
			          </div> 
				</div>
			</div>
		</div>
	</div>
	<div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','one-login-business'); ?></a></div>
	<div class="container">
		<div class="main-top">
			<div class="row">
				<div class="col-lg-3 col-md-3 align-self-center">
					<div class="logo">
				        <?php if ( has_custom_logo() ) : ?>
		            		<?php the_custom_logo(); ?>
			            <?php endif; ?>
		              	<?php $blog_info = get_bloginfo( 'name' ); ?>
		              		<?php if( get_theme_mod('one_login_business_logo_title',true) != '' ){ ?>
				                <?php if ( ! empty( $blog_info ) ) : ?>
				                  	<?php if ( is_front_page() && is_home() ) : ?>
				                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				                  	<?php else : ?>
			                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			                  		<?php endif; ?>
				                <?php endif; ?>
				            <?php }?>
			                <?php
		                  		$description = get_bloginfo( 'description', 'display' );
			                  	if ( $description || is_customize_preview() ) :
			                ?>
			                <?php if( get_theme_mod('one_login_business_logo_text',true) != '' ){ ?>
			                  	<p class="site-description">
			                    	<?php echo esc_html($description); ?>
			                  	</p>
			                <?php }?>
		              	<?php endif; ?>
				    </div>
				</div>
				<div class="col-lg-6 col-md-6 align-self-center">
				    <div class="nav">
						<?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>	
					</div>
				</div>	
				<div class="col-lg-1 col-md-1 align-self-center">
				    <div class="search-box">
						<span><i class="fas fa-search"></i></span>	
					</div>
				</div>	
				<div class="col-lg-2 col-md-2 align-self-center">
				    <div class="lets-talk">
			          <?php if ( get_theme_mod('one_login_business_free1','') != "" ) {?>
			             <a href="<?php echo esc_url(get_theme_mod('one_login_business_free')); ?>"><?php echo esc_html(get_theme_mod('one_login_business_free1','')); ?></a>
			          <?php } ?>
			        </div>
				</div>
			</div>
			<div class="serach_outer">
	          <div class="closepop"><i class="far fa-window-close"></i></div>
	          <div class="serach_inner">
	            <?php get_search_form(); ?>
	          </div>
	        </div>
		</div>
	</div>
</div>