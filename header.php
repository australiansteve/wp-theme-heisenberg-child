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
		<ul id="primary-menu" class="vertical menu drilldown" data-drilldown>
			<li class="close">
				<button aria-label="Close menu" type="button" data-close>
					<i class="fas fa-times"></i>
				</button>&nbsp;
			</li>

			<?php
			wp_nav_menu( [
				'theme_location' => 'primary',
				'walker' => new OffCanvas_Foundation_Menu(),
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

		<?php
		/* grab the url for the full size featured image */
		if (is_front_page() || !has_post_thumbnail()) :
			$featured_img_url = get_field('front_page_background_image', 'option');
		elseif(has_post_thumbnail()) :
			$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full'); 
		else :
			$featured_img_url = "";
		endif;

		?>
		<div class="header-background-image" style="background-image: url(<?php echo $featured_img_url; ?>)">
			<header class="grid-container">

				<?php
				if ( has_custom_logo() ) :
					the_custom_logo();
				else:

					printf( '<h1><a href="%s" rel="home">%s</a></h1>',
						esc_url( home_url( '/' ) ),
						esc_html( get_bloginfo( 'name' ) )
					);

					printf( '<p class="h4">%s</p>', esc_html( get_bloginfo( 'description' ) ) );
				endif;
				
				the_title( '<div id="page-title"><h1>', '</h1></div>' );

				if (is_front_page()) :
					?>
					<h2 class='primary-tagline'><?php the_field('front_page_primary_tagline', 'option');?></h2>
					<h3 class='secondary-tagline'><?php the_field('front_page_secondary_tagline', 'option');?></h3>
					<?php
				endif;

				?>

			</header>
		</div>

		<main class="grid-container">