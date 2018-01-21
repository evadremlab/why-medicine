<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package WHY_Medicine
 */

/**
* Add theme styles. "styles.css" contains the core styles for the _s base theme.
*/
function enqueue_styles() {
	wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css?family=Open+Sans|Fredericka+the+Great');
	wp_enqueue_style( 'why-medicine', get_template_directory_uri() . '/why-medicine.css');
}
add_action( 'wp_enqueue_scripts', 'enqueue_styles' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function why_medicine_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'why_medicine_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function why_medicine_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'why_medicine_pingback_header' );
