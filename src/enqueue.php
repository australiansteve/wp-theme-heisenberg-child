<?php

namespace Heisenberg;

/**
 * Enqueue scripts and styles
 */
add_action( 'wp_enqueue_scripts', function() {

	$min_ext = ( defined( 'WP_DEBUG_SCRIPT' ) && WP_DEBUG_SCRIPT ) ? '' : '.min';

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

	// CSS
	wp_enqueue_style(
		'heisenberg_css',
		HEISENBERG_URL . '/dist/main.css',
		[ 'google_fonts', 'adobe_fonts' ],
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

	// Adobe Fonts
	wp_enqueue_style(
		'adobe_fonts',
		'https://use.typekit.net/njl2gqz.css'
	);

	//FontAwesome

	wp_enqueue_script( 
		'font-awesome',
        'https://kit.fontawesome.com/30900d1525.js'
    );
	

	// Add comment script on single posts with comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
} );
