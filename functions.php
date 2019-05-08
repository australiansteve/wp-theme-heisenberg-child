<?php
/**
 * Kickoff theme setup and build
 */

namespace Heisenberg;

require_once __DIR__ . '/src/enqueue.php';

add_action( 'after_setup_theme', function() {
  register_nav_menu( 'about-menu', __( 'About Page submenu', 'heisenberg' ) );
} );
