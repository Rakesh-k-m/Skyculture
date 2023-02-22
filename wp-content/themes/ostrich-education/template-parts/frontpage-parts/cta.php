<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Ostrich Education
 */

// Get the content type.
$cta = get_theme_mod( 'ostrich_education_cta', 'post' );
// Bail if the section is disabled.
if ( 'disable' === $cta ) {
    return;
}

$get_content = [];
$sub_title    = get_theme_mod( 'ostrich_education_cta_sub_title', __( 'GET SOLUTIONS FAST', 'ostrich-education') ) ;
$button    = get_theme_mod( 'ostrich_education_cta_btn', __( 'SEE COURSE', 'ostrich-education') ) ;
$get_content = ostrich_education_get_section_content( 'cta', $cta, 1  );

?>

<?php foreach ($get_content as $content): ?>
  <div id="call-to-action" class="pt" style="background-image:url('<?php echo esc_url( get_theme_mod( 'ostrich_education_cta_bg_image' ) ); ?>')">
    <div class="container">
      <div class="section-header">
        <?php if( !empty( $sub_title ) ): ?>
          <p class="section-subtitle"><?php echo esc_html( $sub_title ); ?></p>
        <?php endif;

        if( !empty( $content['title'] ) ):
          ?>
          <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
        <?php endif; ?>
      </div><!-- .section-header -->

      <div class="section-content">
        <div class="buttons">
          <?php if( !empty( $content['url'] ) && !empty(  $button ) ): ?>
          <a href="<?php echo esc_url( $content['url'] ) ?>" class="button primary" tabindex="0"><i class="fa fa-book"></i><?php echo esc_html( $button ); ?></a>
        <?php endif; ?>
      </div>
    </div><!-- .section-content -->
  </div> <!-- .container -->
</div><!-- #cta -->
<?php endforeach; ?>