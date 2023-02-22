<?php
/**
 * Template for displaying search forms
 *
 * @package Theme Ostrichs
 * @subpackage Ostrich Education
 * @since Ostrich Education 1.0.0
 */

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'ostrich-education' ) ?></span>
        <input type="search" class="search-field"
            placeholder="<?php echo esc_attr_x( 'Search ...', 'placeholder', 'ostrich-education' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( 'Search for:', 'label', 'ostrich-education' ) ?>" />
    </label>
    <button type="submit" class="search-submit"
        value="<?php echo esc_attr_x( 'Search', 'submit button', 'ostrich-education' ) ?>"><?php echo ostrich_education_get_svg( array( 'icon' => 'search' ) );?></button>
</form>