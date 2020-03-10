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
							$size = 'full'; /* Must be 'full to support animated gif */
							if (get_field('off_canvas_logo')){
								$image = get_field('off_canvas_logo');
							}
							else {
								$size = 'hand-logo';
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
		else if (is_home() && get_field('background_image', get_option( 'page_for_posts' ))) {
			//Specific image for Posts page
			$image = get_field('background_image', get_option( 'page_for_posts' ));
		}
		else if ((is_archive('austeve-projects') || is_singular('austeve-projects') ) && get_field('projects_page_background_image', 'option')) { 
			//Specific image for Projects pages
			$image = get_field('projects_page_background_image', 'option');
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

			if (is_404()) {
				$pageTitle = "";
			}
			else {
				$pageTitle = get_the_title($post->ID);
				if (is_front_page()) {
					$pageTitle = get_bloginfo( 'description' );
				}
				else if (is_home()) {
					$pageTitle = get_the_title( get_option('page_for_posts', true) );
				}
				else if (is_archive()) {
					$pageTitle = get_the_archive_title();
				}
				else if (is_single()) {
					$pageTitle = "";
				}
			}
			if (!empty($pageTitle)) :
			?>
			<div class="grid-x page-title">
				<div class="cell small-12">
					<?php
					printf( '<h2>%s</h2>',
						esc_html( $pageTitle )
					);

					?>
				</div>
			</div>
			<?php
			endif;
			?>
			
		</div>
	</header>
