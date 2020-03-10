<?php

/**
 * Enqueue scripts and styles
 */
add_action( 'wp_enqueue_scripts', function() {

	$min_ext = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

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
        array( 'heisenberg_js' ),
        HEISENBERG_VERSION
    );

	wp_enqueue_script( 
		'hammer-js',
        get_stylesheet_directory_uri() . "/dist/hammer.min.js"
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

} );
