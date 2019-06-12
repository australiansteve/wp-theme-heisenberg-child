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
	<script src="https://kit.fontawesome.com/30900d1525.js"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header>
	<?php 
	$image = get_field('header_background_image', 'option');
	if ($image):
	?>
	<div class="background-div" style="background-image:url(<?php echo $image['url'];?>)">
	</div>
	<?php endif; ?>

	<div class="grid-container">
		<div class="grid-x">
			<div class="medium-5 cell">
				<?php
				if ( function_exists( 'the_custom_logo' ) ) {
					the_custom_logo();
				}
				?>
			</div>
			<div class="medium-7 cell text-right show-for-medium">
				<?php
				wp_nav_menu( [
					'theme_location' => 'primary',
					'container_class' => 'inline-block',
					'menu_id' => 'primary-menu' 
				] ); 
				wp_nav_menu( [
					'theme_location' => 'social-menu',
					'container_class' => 'inline-block',
					'menu_id' => 'social-menu' 
				] ); 
				?>
			</div>
		</div>
		<div class="grid-x show-for-small-only">
			<div class="small-12 cell">
				<ul class="vertical menu accordion-menu" data-accordion-menu>
					<?php
					$args = [
						'theme_location' 	=> 'primary',
						'container'			=> false,
						'items_wrap' 		=> '%3$s',
						
					];
					wp_nav_menu( $args ); ?>
				</ul>

				<?php
				wp_nav_menu( [
					'theme_location' => 'social-menu',
					'menu_class' => 'menu horizontal',
					'menu_id' => 'header-social-menu' 
				] ); 
				?>
			</div>
		</div>
	</div>
	
</header>

<main>