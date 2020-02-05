<?php
/**
 * Kickoff theme setup and build
 */

require_once __DIR__ . '/src/enqueue.php';

add_action('after_setup_theme', function(){
	add_image_size( 'footer_logo_size', 300, 180, true );
	add_image_size( 'post_homepage_size', 300, 300, true );
	add_image_size( 'team_homepage_size', 250, 350, true );
	add_image_size( 'team_homepage_size_bigger', 270, 450, true );
	add_image_size( 'team_archive_size', 300, 400, true );
	add_image_size( 'client_horizontal', 400, 300, true );
	add_image_size( 'client_vertical', 300, 400, true );

	register_nav_menu( 'social-menu', __( 'Social Media Menu', 'heisenberg' ) );
	register_nav_menu( 'footer-menu', __( 'Secondary Footer Menu', 'heisenberg' ) );
	register_nav_menu( 'services-menu', __( 'Services Page Menu', 'heisenberg' ) );
	register_nav_menu( 'courses-menu', __( 'Courses Page Menu', 'heisenberg' ) );

	$defaults = array(
		'height'      => 185,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	);
	add_theme_support( 'custom-logo', $defaults );

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

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Front Page Settings',
		'menu_title'	=> 'Front Page',
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

add_action('pre_get_posts', function($query) {
	if ( $query->is_archive('austeve-course') ) {
		$query->set( 'posts_per_page', '-1' );
		$query->set( 'orderby', 'menu_order');
		$query->set( 'order', 'ASC');

	}
});


function austeve_move_yoast_below_acf() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'austeve_move_yoast_below_acf');

add_action( 'login_enqueue_scripts', function() { 
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	?>
	<style type="text/css">
		body {
			background: #2a2b2b !important;
		}

		#login h1 a, .login h1 a {
			background-image: url(<?php echo $image[0]; ?>);
			height: 190px;
			width: 320px;
			background-size: 320px 190px;
			background-repeat: no-repeat;
		}
	</style>
	<?php 
});

add_filter( 'ninja_forms_render_default_value', function($default_value, $field_type, $field_settings ) {
	
	if('course_id' == $field_settings['key']) :
		$default_value = get_the_ID();
	endif;

	return $default_value;

}, 10, 3 );

add_filter( 'ninja_forms_render_options_listselect', function ( $options, $settings ){
	
	$courseId = -1;

	if (is_admin()) :
		//error_log("ADMIN! ".get_post_type()." ".get_the_ID());
		$sub = Ninja_Forms()->form()->get_sub( get_the_ID() );
		$courseId = $sub->get_field_value( 'course_id' );
	elseif (get_field('course_offerings', get_the_ID())) :
		$courseId = get_the_ID();
	endif;

	if ($courseId >= 0)
	{
		//error_log("Update course offerings!");
		while ( have_rows('course_offerings', $courseId) ) : the_row();

			$offering = array(
				"label"=>get_sub_field('dates', $courseId)." - ".get_sub_field('location', $courseId), 
				"value"=>get_sub_field('dates', $courseId)." - ".get_sub_field('location', $courseId),
				
			);

			array_push($options, $offering);
		endwhile;
	}
	
	//error_log(print_r($options, true));

	return $options;
}, 10, 2 );

add_filter( 'ninja_forms_render_default_value', function( $default_value, $field_type, $field_settings ) {
	if (!is_admin()) :
		$courseId = get_the_ID();

		if ($courseId >= 0)
		{
			if( 'hidden' == $field_type && $field_settings['key'] == 'course_name') {
				//error_log("field_settings".print_r($field_settings, true));
				$default_value = get_the_title();
			}
			return $default_value;
		}
	endif;


}, 10, 3 );



function austeve_menu_classes($classes, $item, $args) {
	if($args->theme_location == 'footer-menu') {
		$classes[] = 'medium-text-right';
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'austeve_menu_classes', 1, 3);


