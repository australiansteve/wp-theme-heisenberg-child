<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Heisenberg
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class="off-canvas position-right" id="offCanvas" data-off-canvas data-transition="overlap">
		<!-- Your menu or Off-canvas content goes here -->
		<ul id="primary-menu">
			<li class="close">
				<button aria-label="Close menu" type="button" data-close>
					<i class="fas fa-times"></i>
				</button>&nbsp;
			</li>

			<?php
			wp_nav_menu( [
				'theme_location' => 'primary',
				'container'      => '',
				'items_wrap'	=> '%3$s'
			] ); 
			?>
		</ul>
		<ul id="social-menu">
			<?php
			wp_nav_menu( [
				'theme_location' => 'social-media',
				'container'      => '',
				'items_wrap'	=> '%3$s'
			] ); 
			?>
		</ul>
	</div>

	<div class="off-canvas-content" data-off-canvas-content>
		<!-- Your page content lives here -->

		<button type="button" class="button off-canvas-opener" data-open="offCanvas"><i class="fas fa-bars fa-3x"></i><br/><?php the_field('menu_button_text', 'option');?></button>

		<header class="grid-container">



			<?php
			printf( '<h1><a href="%s" rel="home">%s</a></h1>',
				esc_url( home_url( '/' ) ),
				esc_html( get_bloginfo( 'name' ) )
			);

			printf( '<p class="h4">%s</p>', esc_html( get_bloginfo( 'description' ) ) );

			?>
			

		</header>

		<main class="grid-container">