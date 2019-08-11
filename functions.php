<?php
/**
 * Kickoff theme setup and build
 */

namespace Heisenberg;

require_once __DIR__ . '/src/enqueue.php';

add_action( 'after_setup_theme', function() {

	add_image_size( 'site_logo', 240, 173, true);
	add_image_size( 'homepage_cta', 660, 375, true);
	add_image_size( 'program_featured_image', 400, 267, true);
	add_image_size( 'report_thumbnail', 237, 135, true);
	add_image_size( 'award_recipient', 700, 300, true);
	add_image_size( 'medium_cropped', 300, 300, true);

	register_nav_menu( 'about-menu', __( 'About Page submenu', 'heisenberg' ) );
	register_nav_menu( 'awards-menu', __( 'Awards Page submenu', 'heisenberg' ) );
	register_nav_menu( 'grants-menu', __( 'Grants Page submenu', 'heisenberg' ) );
	register_nav_menu( 'initiatives-menu', __( 'Initiatives Page submenu', 'heisenberg' ) );
	register_nav_menu( 'resources-menu', __( 'Resources Page submenu', 'heisenberg' ) );
	register_nav_menu( 'footer-left-menu', __( 'Left Footer menu', 'heisenberg' ) );
	register_nav_menu( 'footer-center-menu', __( 'Center Footer menu', 'heisenberg' ) );

	$logoDefaults = array(
		'height'      => 173,
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
		'page_title' 	=> 'Home Page Settings',
		'menu_title'	=> 'Home Page',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Grants Page Settings',
		'menu_title'	=> 'Grants Page',
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

// filter


add_filter('posts_where', function ( $where ) {
	
	$where = str_replace("meta_key = 'deadlines_$", "meta_key LIKE 'deadlines_%", $where);

	return $where;
});

add_filter( 'get_the_archive_title', function ( $title ) {

	if( is_home() || is_single() ) {
		$title = the_field('post_archive_page_title', 'option');
	}
    return $title;

});

//Move Yoast metaboxes to bottom
add_filter( 'wpseo_metabox_prio', function() {
    return 'low';
});


// add_action( 'pre_get_posts', function ($query) {
// 	if ( $query->is_home() ) {
//         $query->set( 'posts_per_page', '1' );
//     }
// }); 
