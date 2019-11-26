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
		<div class="close text-right">
				<button aria-label="Close menu" type="button" data-close>
					<i class="fas fa-times"></i>
				</button>&nbsp;
			</div>
			
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

	<div class="off-canvas-content" data-off-canvas-content style="position: relative" data-sticky-container>

		<!-- Your page content lives here -->
		<div class="off-canvas-opener">
			<?php
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$logo = wp_get_attachment_image_src( $custom_logo_id , 'tiny-logo' );

			?>
			<img class="show-for-medium <?php echo $custom_logo_id;?>" src="<?php echo $logo[0];?>" height="<?php echo $logo[1];?>" width="<?php echo $logo[2];?>"/>
			<button type="button" class="button" data-open="offCanvas"><i class="fas fa-bars fa-3x"></i><br/><?php the_field('menu_button_text', 'option');?></button>
		</div>

		<?php
		/* grab the url for the full size featured image */
		if (is_tax('project-category')):
			//echo get_queried_object()->taxonomy."_".get_queried_object()->term_id;
			$featured_img_url = get_field('projects_page_background_image', get_queried_object()->taxonomy."_".get_queried_object()->term_id);
	elseif (is_archive('austeve-projects')):
			$featured_img_url = get_field('projects_page_background_image', 'option');	
	elseif (has_post_thumbnail()) :
		$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full'); 
	elseif (is_singular('austeve-projects') && !has_post_thumbnail()):
		$featured_img_url = get_field('projects_page_background_image', 'option');	
else :
	$featured_img_url = get_field('front_page_background_image', 'option');
endif;


if (is_front_page()):
	?>
	<div class="header-and-cta-background-image" style="background-image: linear-gradient(to top, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.1)), url(<?php echo $featured_img_url; ?>)">
		<?php echo get_template_part('page-templates/template-parts/header'); ?>
		<?php echo get_template_part('page-templates/template-parts/home-page', 'cta');?>
	</div>
	<?php
else:
	?>
	<div class="header-background-image" style="background-image: url(<?php echo $featured_img_url; ?>)">
		<?php echo get_template_part('page-templates/template-parts/header'); ?>
	</div>
	<?php
endif;
?>
