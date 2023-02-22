<?php
/**
 * Theme Ostrich 
 *
 * @package Ostrich Education
 * active callbacks.
 * 
 */

/*===================Topbar=========================*/
/**
 * Check if the top_bar is enabled
 */
function ostrich_education_if_top_bar_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'ostrich_education_top_bar' )->value();
}

/**
 * Check if the top_bar is post
 */
function ostrich_education_if_top_bar_post( $control ) {
	return 'post' === $control->manager->get_setting( 'ostrich_education_top_bar' )->value();
}

/*========================slider==============================*/
/**
 * Check if the slider is enabled
 */
function ostrich_education_if_slider_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'ostrich_education_slider' )->value();
}

/**
 * Check if the slider is page
 */
function ostrich_education_if_slider_page( $control ) {
	return 'page' === $control->manager->get_setting( 'ostrich_education_slider' )->value();
}

/*========================service==============================*/

/**
 * Check if the service is enabled
 */
function ostrich_education_if_service_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'ostrich_education_service' )->value();
}

/**
 * Check if the service is post
 */
function ostrich_education_if_service_post( $control ) {
	return 'post' === $control->manager->get_setting( 'ostrich_education_service' )->value();
}

/*==========================About=========================*/
/**
 * Check if the about is enabled
 */
function ostrich_education_if_about_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'ostrich_education_about' )->value();
}

/*==========================CTA=========================*/
/**
 * Check if the cta is enabled
 */
function ostrich_education_if_cta_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'ostrich_education_cta' )->value();
}

/*========================our_courses==============================*/
/**
 * Check if the our_courses is enabled
 */
function ostrich_education_if_our_courses_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'ostrich_education_our_courses' )->value();
}

/**
 * Check if the our_courses is category
 */
function ostrich_education_if_our_courses_cat( $control ) {
	return 'cat' === $control->manager->get_setting( 'ostrich_education_our_courses' )->value();
}

/**
 * Check if the our_courses is post
 */
function ostrich_education_if_our_courses_post( $control ) {
	return 'post' === $control->manager->get_setting( 'ostrich_education_our_courses' )->value();
}

/*==========================video=========================*/
/**
 * Check if the video is enabled
 */
function ostrich_education_if_video_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'ostrich_education_video' )->value();
}

/*========================Team==============================*/
/**
 * Check if the team is enabled
 */
function ostrich_education_if_team_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'ostrich_education_team' )->value();
}

/**
 * Check if the gallery is page
 */
function ostrich_education_if_team_page( $control ) {
	return 'page' === $control->manager->get_setting( 'ostrich_education_team' )->value();
}

/*========================Counter==============================*/
/**
 * Check if the counter is enabled
 */
function ostrich_education_if_counter_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'ostrich_education_counter' )->value();
}

/**
 * Check if the gallery is custom
 */
function ostrich_education_if_counter_custom( $control ) {
	return 'custom' === $control->manager->get_setting( 'ostrich_education_counter' )->value();
}

/*========================recent_news==============================*/
/**
 * Check if the recent_news is enabled
 */
function ostrich_education_if_recent_news_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'ostrich_education_recent_news' )->value();
}

/**
 * Check if the recent_news is category
 */
function ostrich_education_if_recent_news_cat( $control ) {
	return 'cat' === $control->manager->get_setting( 'ostrich_education_recent_news' )->value();
}

/**
 * Check if the recent_news is page
 */
function ostrich_education_if_recent_news_page( $control ) {
	return 'page' === $control->manager->get_setting( 'ostrich_education_recent_news' )->value();
}

/**
 * Check if the recent_news is post
 */
function ostrich_education_if_recent_news_post( $control ) {
	return 'post' === $control->manager->get_setting( 'ostrich_education_recent_news' )->value();
}

/*===================Footer=========================*/

/**
 * Check if custom color scheme is enabled
 */
function ostrich_education_if_custom_color_scheme( $control ) {
	return 'custom' === $control->manager->get_setting( 'ostrich_education_color_scheme' )->value();
}
