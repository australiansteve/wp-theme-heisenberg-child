<?php
/**
 * Kickoff theme setup and build
 */

require_once __DIR__ . '/src/enqueue.php';
require_once __DIR__ . '/src/menu-walker.php';

/* ACF related options & filters */
if( class_exists('acf') ) :

	acf_add_options_page(array(
		'page_title'	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug'		=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Home Page Settings',
		'menu_title'	=> 'Home Page',
		'parent_slug'	=> 'theme-general-settings',
	));

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

endif; /* End ACF related options & filters */

add_action( 'after_setup_theme', function() {
	/* Navigation menus */
	register_nav_menu( 'social-media', __( 'Social Media Menu', 'heisenberg' ) );
	register_nav_menu( 'footer-main', __( 'Footer Menu', 'heisenberg' ) );

	/* Images sizes & custom logo support */
	add_image_size( 'tiny-logo', 60, 60, false );
	add_image_size( 'medium-logo', 110, 110, false );
	add_image_size( 'service-icon', 110, 110, false );
	add_image_size( 'client-logo', 250, 250, false );
	add_image_size( 'about-profile-featured', 700, 700, array( 'center', 'center') );
	add_image_size( 'about-profile', 500, 500, array( 'center', 'center') );
	add_image_size( 'service-slider', 1200, 800, array( 'center', 'center'));
	add_image_size( 'project-archive-slider', 1200, 800, array( 'center', 'center'));
	add_image_size( 'project-featured', 700, 500, array( 'center', 'center') );

	$customLogoDefaults = array(
		'height'      => 210,
		'width'       => 210,
		'flex-height' => false,
		'flex-width'  => false,
		'header-text' => array( 'site-title', 'site-description' ),
	);
	add_theme_support( 'custom-logo', $customLogoDefaults );

});


/* Filter page title for taxonomy/archive pages */
if ( ! function_exists ( 'austeve_filter_page_title' ) ) {
	function austeve_filter_page_title($title, $id ) {
		if ( !in_the_loop() && is_post_type_archive('austeve-projects') || is_tax('project-category', $id ) ) {
			return get_field('projects_page_title', 'option');
		}

		return $title;
	}
}
add_filter( 'the_title', 'austeve_filter_page_title', 10, 2 );

/* Remove the_title filter before processing menus */
add_filter ('pre_wp_nav_menu', function ($nav_menu, $args ) {
	remove_filter( 'the_title', 'austeve_filter_page_title', 10, 2 );
	return $nav_menu;

}, 10, 2);

/* Add the_title filter back after processing menus */
add_filter ('wp_nav_menu', function ($nav_menu, $args ) {
	add_filter( 'the_title', 'austeve_filter_page_title', 10, 2 );
	return $nav_menu;
}, 10, 2);

/* Order services, projects and testimonials by menu order */
add_action( 'pre_get_posts', function ($query) {

	if ( $query->is_post_type_archive(array('austeve-projects', 'austeve-services', 'austeve-testimonials')) || $query->is_tax('project-category')) {
		$query->set('orderby', array('menu_order' => 'ASC', 'date' => 'DESC'));
	}
}); 
