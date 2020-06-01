<?php

namespace Heisenberg;

/**
 * Enqueue scripts and styles
 */
add_action( 'wp_enqueue_scripts', function() {

	$min_ext = ( defined( 'WP_DEBUG_SCRIPT' ) && WP_DEBUG_SCRIPT ) ? '' : '.min';

	wp_enqueue_script( 
		'hammer-js',
		get_stylesheet_directory_uri() . "/dist/hammer.min.js"
	);

	wp_enqueue_script('jquery-ui',
		'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js',
		array( 'jquery')
	);

	wp_enqueue_style('jquery-ui-css',
		'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css'
	);

	wp_enqueue_script('lodash-js',
		'https://cdn.jsdelivr.net/npm/lodash@4.17.15/lodash.min.js'
	);
	
	// JS
	wp_enqueue_script(
		'heisenberg_js',
		HEISENBERG_URL . "/dist/build{$min_ext}.js",
		[ 'jquery' ],
		HEISENBERG_VERSION,
		true
	);

	wp_enqueue_script( 
		'heisenberg-child_js',
		get_stylesheet_directory_uri() . "/dist/build{$min_ext}.js",
		array( 'heisenberg_js', 'hammer-js' ),
		HEISENBERG_VERSION
	);

	// CSS
	wp_enqueue_style(
		'heisenberg_css',
		HEISENBERG_URL . '/dist/main.css',
		[ 'google_fonts' ],
		HEISENBERG_VERSION,
		''
	);

	wp_enqueue_style( 'heisenberg-child-style',
		get_stylesheet_directory_uri() . '/dist/main.css',
		array( 'heisenberg_css' ),
		HEISENBERG_VERSION
	);

	// Google Fonts
	wp_enqueue_style(
		'google_fonts',
		'https://fonts.googleapis.com/css?family=Noto+Serif:400,700|Roboto:400,700'
	);


	// Add comment script on single posts with comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
} );
