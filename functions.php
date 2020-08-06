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
	register_nav_menu( 'secondary-menu', __( 'Secondary Menu', 'heisenberg' ) );

	add_image_size( 'header-image', 600, 224, true );
	add_image_size( 'footer-logo', 432, 672, true );
	add_image_size( 'secondary-menu-footer-logo', 58, 58, true );

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

	if ((($query->is_home() || $query->is_archive('category') || $query->is_search()) && $query->is_main_query() && !is_admin()) || (wp_doing_ajax() && in_array('post', $query->get('post_type')))) {

		error_log("Posts per page: ".$query->get('posts_per_page'));
		$loadInfo = null;
		$cookie_name = 'loadinfo';
		$queries = null;
		if(!wp_doing_ajax() && isset($_COOKIE[$cookie_name])) {
			$loadInfo = json_decode(stripslashes($_COOKIE[$cookie_name]));
			if(array_key_exists('loadposts', $loadInfo)) {
				error_log("Read loadposts from cookie: " . $loadInfo->loadposts);
			}
		}
		else {
			parse_str($_SERVER['QUERY_STRING'], $queries);

		}

		if ($query->get('offset') < 0) {
			//getting more press releases via ajax sets offset to be -1
			$query->set('offset', null);
		}
		else {
			if ($loadInfo != null && $loadInfo->loadposts > 0) {
				$query->set( 'posts_per_page', $loadInfo->loadposts);
				$query->set( 'offset', null);
			}
			else if (is_array($queries) && array_key_exists('loadposts', $queries)) {
				error_log("Setting loadposts from querystring");
				$query->set( 'posts_per_page', $queries['loadposts']);
				$query->set( 'offset', null);
			}
			else {
				$query->set( 'posts_per_page', '6');

				if ($query->get( 'paged') > 0) {
					$offset = (intval($query->get( 'paged'))-1) * 6 -2;
					error_log("offset $offset");
					$query->set( 'offset', $offset); 
				}
				else  {
					$query->set( 'posts_per_page', '4');
				}
			}
		}

		$query->set( 'order', 'ASC');
		$query->set( 'orderby', 'menu_order');

		//exclude some categories from the archive page
		$excludeCatsFromArchive = get_field('exclude_categories_from_archive', 'option');
		$excludeQuery = array(
			'taxonomy'         => 'category',
			'terms'            => $excludeCatsFromArchive,
			'field'            => 'term_id',
			'operator'         => 'NOT IN',
		);
		if ($excludeCatsFromArchive && is_array(($excludeCatsFromArchive))) {
			$newTaxQuery = $query->get( 'tax_query');
			if (is_array($newTaxQuery)) {
				//add to existing array
				$newTaxQuery[] = $excludeQuery;
			}
			else {
				//needs new array
				$newTaxQuery = array(
					$excludeQuery
				);
			}
			$query->set( 'tax_query', $newTaxQuery);
		}

		//error_log("post query: ". print_r($query, true));
	}

	if ($query->is_search && !is_admin()) {
		/* Only search for posts & products, not pages */
		$query->set('post_type', array('austeve-products', 'post'));
	}

}
add_action( 'pre_get_posts', 'austeve_exclude_products_from_archive' );

function austeve_post_offset_pagination( $found_posts, $query ) {
	$offset = -2;

	if( $query->is_home() && $query->is_main_query() ) {
		$found_posts = $found_posts - $offset;
	}
	return $found_posts;
}
add_filter( 'found_posts', 'austeve_post_offset_pagination', 10, 2 );

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

function austeve_load_categories( $field ) {

	if ($field['type'] == 'checkbox') {

		$field['choices'] = array(); /* reset choices */
		$categories = get_categories();

		if( is_array($categories) ) {
			foreach( $categories as $category ) {
				$field['choices'][$category->term_id] = $category->name;
			} 
		}     
	}
	return $field;

}

add_filter('acf/load_field/name=exclude_categories_from_archive', 'austeve_load_categories');
add_filter('acf/load_field/name=categories_to_include', 'austeve_load_categories');


function austeve_get_press_releases() {

	$nonce = $_REQUEST['security'];
	if (wp_verify_nonce( $nonce, 'press-page-posts')) {

		$page = intval($_REQUEST['page']);
		$pageId = intval($_REQUEST['pageId']);

		$catsToInclude = get_field('section_4', $pageId)['categories_to_include'];
		$args = array(
			'post_type'              => array( 'post' ),
			'post_status'            => array( 'publish' ),
			'nopaging' => false,
			'paged' => $page,
			'order'                  => 'ASC',
			'orderby'                => 'menu_order',
			'posts_per_page'         => 5,
			'offset'         => -1,
			'tax_query' => array(
				array(
					'taxonomy'         => 'category',
					'terms'            => $catsToInclude,
					'field'            => 'term_id',
					'operator'         => 'IN',
				),
			),
		);

		$ajaxposts = new WP_Query( $args );

		$response = '';

		if ( $ajaxposts->have_posts() ) {
			while ( $ajaxposts->have_posts() ) {
				$ajaxposts->the_post();
				error_log("article");
				$response .= get_template_part('page-templates/template-parts/post-press-release');
			}
		}

		echo $response;

		wp_reset_query();
	}

	exit;
}

add_action('wp_ajax_austeve_get_press_releases', 'austeve_get_press_releases');
add_action('wp_ajax_nopriv_austeve_get_press_releases', 'austeve_get_press_releases');

function austeve_get_posts() {

	$nonce = $_REQUEST['security'];
	if (wp_verify_nonce( $nonce, 'blog-page-posts')) {
		global $nextSectionId;
		$page = intval($_REQUEST['page']);
		$category = isset($_REQUEST['category']) ? $_REQUEST['category'] : null;
		$search = isset($_REQUEST['search']) ? $_REQUEST['search']: null;
		$nextSectionId = intval($_REQUEST['nextSection']);

		$args = array(
			'post_type' => array('post'),
			'post_status' => array('publish'),
			'nopaging' => false,
			'paged' => $page,
			'order' => 'ASC',
			'orderby' => 'menu_order',
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
			$args['s'] = $search;
		}

		$ajaxposts = new WP_Query( $args );

		$response = '';

		if ( $ajaxposts->have_posts()) {
			
			include(locate_template( 'page-templates/template-parts/blog-section-header.php', false, false )); 
			while ( $ajaxposts->have_posts() ) {
				$ajaxposts->the_post();
				if (has_tag('video')) {
					include(locate_template( 'page-templates/template-parts/post-archive-videos.php', false, false ));
				}
				else {
					include(locate_template( 'page-templates/template-parts/post-archive.php', false, false ));
				}
			}
			if (count($ajaxposts->posts) > 0 && count($ajaxposts->posts) < 6) {
				include(locate_template( 'page-templates/template-parts/post-archive-return.php', false, false ));

			}
			include(locate_template( 'page-templates/template-parts/blog-section-footer.php', false, false )); 

		}

		wp_reset_query();
	}

	exit;
}

add_action('wp_ajax_austeve_get_posts', 'austeve_get_posts');
add_action('wp_ajax_nopriv_austeve_get_posts', 'austeve_get_posts');

function austeve_channel_4_subscription( $form_data ){

	$formKey = isset($form_data['settings']['key']) ? $form_data['settings']['key'] : null;
	if ($formKey && $formKey == 'channel_4_subscription') {
		error_log("Channel 4 subscription");
		$subscriberName = $form_data['fields_by_key']['ch4_full_name']['value'];
		$subscriberEmail = $form_data['fields_by_key']['ch4_email']['value'];
		error_log("Name: ".$subscriberName);
		error_log("Email: ".$subscriberEmail);

		$user_id = username_exists( $subscriberEmail );

		if ( ! $user_id && false == email_exists( $subscriberEmail ) ) {
			$random_password = wp_generate_password(20);
			$user_id = wp_create_user( $subscriberEmail, $random_password, $subscriberEmail );
		}

		if ($user_id) {
			//set full name
			$splitSubscriberName = explode(" ", $subscriberName);
			$user_data = array( 'ID' => $user_id, 
				'display_name' => $subscriberName,
				'first_name' => $splitSubscriberName[0]
			);
			if (count($splitSubscriberName) > 2) {
				array_shift($splitSubscriberName);
				$user_data['last_name'] = implode(" ", $splitSubscriberName);
			}
			else if(count($splitSubscriberName) == 2) {
				$user_data['last_name'] = $splitSubscriberName[1];
			}

			$user_data = wp_update_user( $user_data );

			if ( is_wp_error( $user_data ) ) {
    			// There was an error; possibly this user doesn't exist.
				error_log('Updating user failed.');
			} else {
    			// Success!
				error_log('User profile updated.');
			}

			update_user_meta( $user_id, 'show_admin_bar_front', 'false' );
		}

	}
}
add_action( 'ninja_forms_after_submission', 'austeve_channel_4_subscription' );

