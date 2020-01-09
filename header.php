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

	<div class="off-canvas-wrapper">
		<div class="off-canvas position-top" id="offCanvasTop" data-off-canvas>

			<div class="logo-container">
				<div class="grid-container">
					<div class="grid-x off-canvas-close">
						<div class="cell small-1 small-offset-11 text-right">
							<a class="" aria-label="Close menu" type="button" data-close>
								<i class="fas fa-times"></i>
							</a>
						</div>
					</div>

					<div class="grid-x site-title">
						<div class="cell small-12">
							<?php
							printf( '<h1><a href="%s" rel="home">%s</a></h1>',
								esc_url( home_url( '/' ) ),
								esc_html( get_bloginfo( 'name' ) )
							);
							?>
						</div>
					</div>

					<div class="grid-x main-menu">
						<div class="cell small-12 medium-text-center">
							<?php wp_nav_menu( [
								'theme_location' => 'primary',
								'container'      => '',
							] ); ?>
						</div>
					</div>

					<div class="grid-x hand-logo">
						<div class="cell small-12 text-right">
							<?php
							$size = 'hand-logo';
							if (get_field('off_canvas_logo')){
								$image = get_field('off_canvas_logo');
							}
							else {
								$theme_locations = get_nav_menu_locations();
								$menu_obj = get_term( $theme_locations['primary'], 'nav_menu' );
								$image = get_field('default_off_canvas_logo', 'nav_menu_'.$menu_obj->term_id);
							}

							if ($image) {
								?>
								<a href="<?php echo home_url('/');?>" rel="home"><?php echo wp_get_attachment_image( $image, $size )?></a>
								<?php 
							} 
							?>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>

	<header>
		<?php

		$size = 'header-background-image';
		if ( get_field('background_image') ) {
			$image = get_field('background_image');
		}
		else {
			$image = get_field('default_background_image', 'option');
		}

		if( !$image ) {
			die('No default background image set');
		}
		?>
		<div class="background-image" style="background-image: url(<?php echo wp_get_attachment_image_src( $image, $size )[0];?>)">
		</div>
		<div class="grid-container">
			<div class="grid-x off-canvas-opener">
				<div class="cell small-1 small-offset-11 text-right">
					<a href="#" data-toggle="offCanvasTop"><i class="fas fa-bars"></i></a>
				</div>
			</div>
			<div class="grid-x site-title">
				<div class="cell small-12">
					<?php
					printf( '<h1><a href="%s" rel="home">%s</a></h1>',
						esc_url( home_url( '/' ) ),
						esc_html( get_bloginfo( 'name' ) )
					);

					?>
				</div>
			</div>

			<?php
			if (is_front_page()) {
				?>
				<div class="grid-x tagline">
					<div class="cell small-12">
						<h4><?php echo esc_html( get_bloginfo( 'description' ) ); ?></h4>			
					</div>
				</div>
				<?php
			}
			?>
			
		</div>
	</header>

	<main class="grid-container">