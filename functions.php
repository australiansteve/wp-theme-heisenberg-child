<?php
/**
 * Kickoff theme setup and build
 */

namespace Heisenberg;

require_once __DIR__ . '/src/enqueue.php';

add_action( 'after_setup_theme', function() {

	add_image_size( 'footer_logo', 240, 180, true);
	add_image_size( 'homepage_cta', 660, 375, true);

	register_nav_menu( 'about-menu', __( 'About Page submenu', 'heisenberg' ) );
	register_nav_menu( 'footer-left-menu', __( 'Left Footer menu', 'heisenberg' ) );
	register_nav_menu( 'footer-center-menu', __( 'Center Footer menu', 'heisenberg' ) );

	$logoDefaults = array(
		'height'      => 180,
		'width'       => 240,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	);
	add_theme_support( 'custom-logo', $logoDefaults );

} );

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}

if (!function_exists('endsWith'))
{
	function endsWith($haystack, $needle)
	{
	    $length = strlen($needle);
	    if ($length == 0) {
	        return true;
	    }

	    return (substr($haystack, -$length) === $needle);
	}
}

add_filter( 'get_the_excerpt', function( $excerpt ) {
 	if (endsWith($excerpt, ' [&hellip;]'))
 	{
 		error_log("Trim the excerpt!");
 		return substr($excerpt, 0, -11);
 	}
 	return $excerpt;
} );