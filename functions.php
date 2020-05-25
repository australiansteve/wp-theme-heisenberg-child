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

	if ($query->get('paged') > 1 && ($query->get('post_type')[0] == 'post' || $query->is_search()) && wp_doing_ajax()) {
		error_log("AJAX call: ". print_r($query, true));
		error_log(print_r($query->get('post_type'), true));
		$query->set( 'posts_per_page', '10');
		$query->set( 'paged', $query->get('paged') - 1);
	}

	if ( ($query->is_home() || $query->is_archive('category') || $query->is_search()) && $query->is_main_query() && !is_admin() ) {
		error_log("Restrict posts per page on post archive page");
		if ($query->get('paged') <= 0) {
			$query->set( 'posts_per_page', '4');
			error_log("Four posts per page on first archive page");
		}
	}

}
add_action( 'pre_get_posts', 'austeve_exclude_products_from_archive' );

function austeve_load_image_size_field_choices( $field ) {

	if ($field['type'] == 'select') {

		$field['choices'] = array(); /* reset choices */
		$imageSizes = get_intermediate_image_sizes();
		$field['choices'][ 'full' ] = 'full';

		if( is_array($imageSizes) ) {
			foreach( $imageSizes as $imageSize ) {
				$field['choices'][ $imageSize ] = $imageSize;
			}
		}     
	}
	return $field;

}

add_filter('acf/load_field/name=image_size', 'austeve_load_image_size_field_choices');


function austeve_get_articles() {

	$nonce = $_REQUEST['security'];
	error_log("Get page: ".$_REQUEST['page']);
	error_log("nonce: ".$nonce);
	if (wp_verify_nonce( $nonce, 'press-page-articles')) {

		error_log("nonce verified");
		$page = intval($_REQUEST['page']);

		$args = array(
			'post_type' => array('austeve-articles'),
			'post_status' => array('publish'),
			'nopaging' => false,
			'paged' => $page,
			'order'                  => 'ASC',
			'orderby'                => 'menu_order',
			'posts_per_page'         => 5,
		);

		$ajaxposts = new WP_Query( $args );

		$response = '';

		if ( $ajaxposts->have_posts() ) {
			while ( $ajaxposts->have_posts() ) {
				$ajaxposts->the_post();
				error_log("article");
				$response .= get_template_part('page-templates/template-parts/article');
			}
		}

		echo $response;

		wp_reset_query();
	}

	exit;
}

add_action('wp_ajax_austeve_get_articles', 'austeve_get_articles');
add_action('wp_ajax_nopriv_austeve_get_articles', 'austeve_get_articles');

function austeve_get_posts() {

	$nonce = $_REQUEST['security'];
	error_log("Get page: ".$_REQUEST['page']);
	error_log("nonce: ".$nonce);
	if (wp_verify_nonce( $nonce, 'blog-page-posts')) {
		global $nextSectionId;
		error_log("nonce verified");
		$page = intval($_REQUEST['page']);
		$category = isset($_REQUEST['category']) ? $_REQUEST['category'] : null;
		$search = isset($_REQUEST['search']) ? $_REQUEST['search']: null;
		$nextSectionId = intval($_REQUEST['nextSection']);
		error_log("Next section: ".$nextSectionId);

		$args = array(
			'post_type' => array('post'),
			'post_status' => array('publish'),
			'nopaging' => false,
			'paged' => $page,
			'posts_per_page' => 10,
		);

		if ($category) {
			$args['tax_query'] = array(
				array(
					'taxonomy'         => 'category',
					'terms'            => $category,
					'field'            => 'term_id',
					'operator'         => 'IN',
				)
			);
		}

		if ($search) {
			error_log("SEARCH");
			$args['s'] = $search;
		}

		$ajaxposts = new WP_Query( $args );

		$response = '';
		$ignorePostCount = 0; //we will ignore the first 4 posts since we retrieve 10 at a time and the first 4 load by default 
		if ( $ajaxposts->have_posts() && count($ajaxposts->posts) > 4) {
			error_log("Post count: ".count($ajaxposts->posts));
			error_log(print_r($ajaxposts, true));
			include(locate_template( 'page-templates/template-parts/blog-section-header.php', false, false )); 
			while ( $ajaxposts->have_posts() ) {
				$ajaxposts->the_post();
				if ($ignorePostCount++ >= 4) {
					error_log("article");
					include(locate_template( 'page-templates/template-parts/post-archive.php', false, false ));
				}
			}
			include(locate_template( 'page-templates/template-parts/blog-section-footer.php', false, false )); 

		}

		wp_reset_query();
	}

	exit;
}

add_action('wp_ajax_austeve_get_posts', 'austeve_get_posts');
add_action('wp_ajax_nopriv_austeve_get_posts', 'austeve_get_posts');
