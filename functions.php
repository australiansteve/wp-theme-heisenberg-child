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

/* Navigation menus */
add_action( 'after_setup_theme', function() {
	register_nav_menu( 'social-media', __( 'Social Media Menu', 'heisenberg' ) );

	add_image_size( 'header-image', 600, 224, true );
	add_image_size( 'footer-logo', 432, 672, true );

});

function austeve_menu_classes($classes, $item, $args) {
	if($args->theme_location == 'primary') {
    //$classes[] = 'cell';
    //$classes[] = 'auto';
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'austeve_menu_classes', 1, 3);

add_filter( 'wpseo_metabox_prio', function() {
	return 'low';
});

function austeve_exclude_products_from_archive($query) {
	if ( $query->is_archive('austeve-products') && $query->is_main_query() && !is_admin() ) {
		$query->set( 'tax_query', array(
			array(
				'taxonomy'         => 'product-category',
				'terms'            => 'exclude-from-archive',
				'field'            => 'slug',
				'operator'         => 'NOT IN',
			),
		));
		error_log("Product ARCHIVE");
	}
}
add_action( 'pre_get_posts', 'austeve_exclude_products_from_archive' );