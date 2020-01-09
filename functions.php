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

	add_image_size( 'hand-logo', 150, 150, true );
	add_image_size( 'post-archive-image', 500, 500, true );
	add_image_size( 'header-background-image', 1600, 900, true );
	add_image_size( 'post-featured-image', 1200, 600, true );
	add_image_size( 'headshot-image', 410, 615, false );
});

add_filter( 'get_the_archive_title', function( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
  
    return $title;
} );

add_action('pre_get_posts', function ( $query ) {
	if( $query->is_archive('austeve-projects')) :
		//$query->set('posts_per_page', 1);
	endif;
});

function get_ajax_projects() {

	$nonce = $_REQUEST['security'];
	error_log("Get page: ".$_REQUEST['page']);
	if (wp_verify_nonce( $nonce, 'front-page-projects')) {

		$page = intval($_REQUEST['page']);
	    // Query Arguments
	    $args = array(
	        'post_type' => array('austeve-projects'),
	        'post_status' => array('publish'),
	        'nopaging' => false,
	        'paged' => $page,
	    );

	    // The Query
	    $ajaxposts = new WP_Query( $args );

	    $response = '';

	    // The Query
	    if ( $ajaxposts->have_posts() ) {
	        while ( $ajaxposts->have_posts() ) {
	            $ajaxposts->the_post();
	            $response .= get_template_part('page-templates/project', 'front-page');
	        }
	    } else {
	        $response .= get_template_part('none');
	    }

	    echo $response;
	}

    exit; // leave ajax call
}

// Fire AJAX action for both logged in and non-logged in users
add_action('wp_ajax_get_ajax_projects', 'get_ajax_projects');
add_action('wp_ajax_nopriv_get_ajax_projects', 'get_ajax_projects');
