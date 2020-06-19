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
	<?php 
	global $sectionNumber;
	$sectionNumber = 1;
	?>
	<header>
		<?php 
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$headerImage = wp_get_attachment_image_src( $custom_logo_id , 'full' );

		//include( locate_template( 'page-templates/template-parts/header.php', false, false ) ); 
		?>
	</header>
	<main>

		<div class="off-canvas position-left" id="offCanvas" data-off-canvas data-transition="push">
			<div class="off-canvas-header">
				<div class="grid-x">
					<div class="small-6 text-left">
						<a href="/" title="<?php echo get_bloginfo('name');?>"><img src="<?php echo $headerImage[0]; ?>" width="150" height="56" alt=""></a>
					</div>
					<div class="small-6 text-right">
						<button class="close-button" aria-label="Close menu" type="button" data-close>
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			</div>
			<div class="grid-y align-top">
				<div class="cell shrink">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'container' => false,
					) );
					?>
				</div>
			</div>
			
		</div>
		<div class="off-canvas-content" data-off-canvas-content>
			<div class="click-to-scroll-down"><a title="Scroll down" href="#"><i class="fas fa-chevron-down"></i></a></div>
			<div id="page-container">	
