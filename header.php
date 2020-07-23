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

<header class="grid-container">
	<div class="grid-x">
		<?php if (!is_home()) : ?>
		<div class="cell small-12 medium-4 text-center">
			<?php 
			$image = get_field('header_logo', 'option');
			$size = 'header-logo'; // (thumbnail, medium, large, full or custom size)
			
			if( $image ) {
				echo wp_get_attachment_image( $image, $size );
			}
			?>
		</div>
	<?php endif; ?>
		<div class="cell small-12 medium-auto text-center" id="primary-menu">
			<?php
			wp_nav_menu( [
				'theme_location' => 'primary',
				'container'      => '',
			] ); ?>
		</div>
</header>

<main class="grid-container">