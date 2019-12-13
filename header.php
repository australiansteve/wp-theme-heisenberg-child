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
		<div class="grid-y" style="min-height: 100vh">
			<div class="cell small-1">
				<div class="close text-right">
					<button aria-label="Close menu" type="button" data-close>
						<i class="fas fa-times"></i>
					</button>&nbsp;
				</div>
			</div>
			<div class="cell auto">
				<!-- Your menu or Off-canvas content goes here -->
				<ul id="primary-menu" class="vertical menu drilldown" data-drilldown>

					<?php
					wp_nav_menu( [
						'theme_location' => 'primary',
						'walker' => new OffCanvas_Foundation_Menu(),
						'container'      => '',
						'items_wrap'	=> '%3$s'
					] ); 
					?>
				</ul>
			</div>
			<div class="cell small-1">
				<ul id="social-menu" class="horizontal menu">
					<?php
					wp_nav_menu( [
						'theme_location' => 'social-media',
						'container'      => '',
						'items_wrap'	=> '%3$s'
					] ); 
					?>
				</ul>
			</div>
		</div>
	</div>

	<div class="off-canvas-content" data-off-canvas-content style="position: relative" data-sticky-container>
		<!-- Your page content lives here -->
		<div class="top-bar show-for-small-only">
			<div class="grid-container">
				<div class="top-bar-left">
					<?php if ( has_custom_logo() ) :
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						$logo = wp_get_attachment_image_src( $custom_logo_id , 'medium-logo' );

						?>
						<a href="<?php echo site_url('/');?>">
							<img class="<?php echo $custom_logo_id;?>" src="<?php echo $logo[0];?>" height="<?php echo $logo[1];?>" width="<?php echo $logo[2];?>"/>
						</a>
						<?php
					endif; ?>

				</div>

				<div class="top-bar-right">
					<div class="off-canvas-opener">
						<button type="button" class="button" data-open="offCanvas"><i class="fas fa-bars fa-3x"></i><br/><?php the_field('menu_button_text', 'option');?></button>
					</div>
				</div>
			</div>
		</div>

		<div class="off-canvas-opener show-for-medium">
			<?php if ( has_custom_logo() ) :
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						$logo = wp_get_attachment_image_src( $custom_logo_id , 'tiny-logo' );
						?>
						<img class="<?php echo $custom_logo_id;?>" src="<?php echo $logo[0];?>" height="<?php echo $logo[1];?>" width="<?php echo $logo[2];?>"/>
						<?php
					endif;
						?>		
			<button type="button" class="button" data-open="offCanvas"><i class="fas fa-bars fa-3x"></i><br/><?php the_field('menu_button_text', 'option');?></button>
		</div>

		<?php
		/* grab the url for the full size featured image */
		if (is_tax('project-category')) {
			//echo get_queried_object()->taxonomy."_".get_queried_object()->term_id;
			$featured_img_url = get_field('projects_page_background_image', get_queried_object()->taxonomy."_".get_queried_object()->term_id);
		}
		elseif (is_archive('austeve-projects')) {
			$featured_img_url = get_field('projects_page_background_image', 'option');	
		}
		elseif (has_post_thumbnail()) {
			$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full'); 
		}
		elseif (is_singular('austeve-projects') && !has_post_thumbnail()) {
			$featured_img_url = get_field('projects_page_background_image', 'option');	
		}
		else {
			$featured_img_url = get_field('front_page_background_image', 'option');
		}

		?>
		<div class="header-bg" style="background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(0, 0, 0, 0.5)), url(<?php echo $featured_img_url; ?>);">
			<?php echo get_template_part('page-templates/template-parts/header'); ?>
		</div>
		<?php
		if (is_front_page()):
			?>
			<?php echo get_template_part('page-templates/template-parts/home-page', 'cta');?>
			<?php
		endif;
		?>
