<?php
/**
 * Kickoff theme setup and build
 */

namespace Heisenberg;

require_once __DIR__ . '/src/enqueue.php';
require_once __DIR__ . '/src/menu-walker.php';

add_action( 'after_setup_theme', function() {

	add_image_size( 'site_logo', 240, 173, true);
	add_image_size( 'homepage_cta', 1024, 580, true);
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
	register_nav_menu( 'social-media-menu', __( 'Social Media menu', 'heisenberg' ) );
	register_nav_menu( 'news-category-menu', __( 'News Category menu', 'heisenberg' ) );

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

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Mailchimp Settings',
		'menu_title'	=> 'Mailchimp',
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

/* Alter search query so CPTs are displayed before posts (thanks to menu_order being set), and posts are otherwise returned in date order (newest first) */
 add_action( 'pre_get_posts', function ($query) {
 	if ( $query->is_search	) {
 		error_log("Searching: ".print_r($query->get('s'), true));
        $query->set('orderby', array('menu_order' => 'DESC', 'date' => 'DESC'));
     }
 }); 

add_filter('wp_nav_menu_objects', function( $items, $args ) {
	
	// loop
	foreach( $items as &$item ) {
		
		// vars
		$icon = get_field('icon', $item);
		
		// replace title with icon
		if( $icon ) {
			$title = $item->title;
			$item->title = '<i class="fab fa-'.$icon.'" title="'.$title.'"></i>';
			
		}
		
	}
	
	// return
	return $items;
	
}, 10, 2);



