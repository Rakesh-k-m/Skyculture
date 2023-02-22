<?php
/**
 * Template part for displaying front page imtroduction.
 *
 * @package Moral
 */

// Get the content type.
$client       = get_theme_mod( 'ostrich_education_client', 'custom' );
$client_num   = get_theme_mod( 'ostrich_education_client_num', 6 ) ;

// Bail if the section is disabled.
if ( 'disable' === $client ) {
    return;
}
$get_content = [];
if($client == 'custom'){
    for ($i=1; $i<=$client_num ; $i++) { 
        $content['url'] = get_theme_mod('ostrich_education_client_image_url_'.$i, '#');
        $content['image'] = get_theme_mod('ostrich_education_client_image_'.$i, '#');
        if(!empty($content)){
            array_push($get_content, $content);
        }
    }
}else{
    $get_content = ostrich_education_get_section_content( 'client', $client, $client_num );
}

?>

<div id="client" class="pt">
    <div class="container">
        <div class="client-wrapper" data-slick='{"slidesToShow": 5, "slidesToScroll": 1, "infinite": true, "speed": 1500, "dots": false, "arrows": false, "autoplay": true, "draggable": true, "fade": false }'>

            <?php foreach($get_content as $content): ?>

            <article>
                <a href="<?php echo esc_url($content['url']); ?>"><img src="<?php echo esc_url( ($client=='custom') ? $content['image'] : get_the_post_thumbnail_url( $content['id'] ) ); ?>"></a>
            </article>

            <?php endforeach; ?>

        </div><!-- .client-wrapper -->
    </div><!-- .container -->
</div><!-- #client -->