<?php
/**
 * Kickoff theme setup and build
 */

namespace Heisenberg;

require_once __DIR__ . '/src/enqueue.php';

add_action('after_setup_theme', function(){
	add_image_size( 'footer_logo_size', 300, 180, true );

	register_nav_menu( 'social-menu', __( 'Social Media Menu', 'heisenberg' ) );
	register_nav_menu( 'footer-menu', __( 'Secondary Footer Menu', 'heisenberg' ) );

});

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


