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
	
	<!-- Mailchimp embed styles -->
	<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
	<style type="text/css">
		#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
	</style>
	<!-- END: Mailchimp embed styles -->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php
		$langs = icl_get_languages('skip_missing=1');

		if (is_array($langs) && count($langs) == 2 && array_key_exists('fr', $langs) && array_key_exists('en', $langs)) :
			$frLink = $langs['fr']['url'];
			$enLink = $langs['en']['url'];
		elseif (is_array($langs) && count($langs) == 1 && ICL_LANGUAGE_CODE=='fr' && array_key_exists('fr', $langs)) :
			$frLink = $enLink = $langs['fr']['url'];
		elseif (is_array($langs) && count($langs) == 1 && ICL_LANGUAGE_CODE=='en' &&  array_key_exists('en', $langs)) :
			$frLink = $enLink = $langs['en']['url'];
		else :
			$frLink = $enLink = site_url();
		endif;
	?>
	<div class="off-canvas-wrapper">

		<div class="off-canvas-absolute position-left" id="offCanvasLeft" data-off-canvas data-auto-focus="false">
			<ul class="vertical menu accordion-menu" data-accordion-menu>
				<li class="language-selector">
					<a href="<?php echo $frLink;?>">FR</a> | <a href="<?php echo $enLink;?>">EN</a>
				</li>
				<li class="home">
					<a href="<?php echo site_url();?>"><?php the_field('home_link_text', 'option')?></a>
				</li>
				<?php
				$args = [
					'theme_location' 	=> 'primary',
					'container'			=> false,
					'items_wrap' 		=> '%3$s',
					'walker' 			=> new OffCanvas_Foundation_Menu() ,
					
				];
				wp_nav_menu( $args ); ?>
				<li>
					<span class="mailing-list"><a href="#" data-open="mailchimpSignupModal"><?php the_field('mailing_list_text', 'option')?></a></span>
				</li>
				<li>
					<span class="account-login"><a href="<?php the_field('account_login_link', 'option')?>"><?php the_field('account_login_text', 'option')?></a></span>
				</li>
			</ul>
		</div>

		<header id="header" class="grid-container">
			<div class="content-container" >

				<div class="grid-x">
					<div class="cell medium-8 medium-order-2">
						<div class="grid-x" id="header-language-switch">
							<div class="cell small-12 medium-5 medium-offset-5 medium-text-right">
								<?php echo get_template_part('template-parts/search-bar'); ?>
							</div>
							<div class="cell small-11 medium-2 small-text-left medium-text-right">
								<span class="language-fr"><a href="<?php echo $frLink; ?>">FR</a></span> | 
								<span class="language-en"><a href="<?php echo $enLink; ?>">EN</a></span>
							</div>
							<div class="cell small-1 off-canvas-content hide-for-medium small-text-right" id="hamburger-menu" data-off-canvas-content>
								<a href="#" data-toggle="offCanvasLeft"><i class="fas fa-bars"></i></a>
							</div>			
						</div>

						<div class="grid-x show-for-medium" id="header-contact-information">
							<div class="cell text-right">
								<span class="telephone-number"><?php the_field('telephone_number_text', 'option')?>: <?php if (get_field('telephone_number_link', 'option')) :?> <a href="<?php the_field('telephone_number_link', 'option')?>"><?php endif; ?><?php the_field('telephone_number', 'option')?><?php if (get_field('telephone_number_link', 'option')) :?></a><?php endif; ?></span>
								<span class="email-address"><?php the_field('email_address_text', 'option')?>: <a href="mailto:<?php the_field('email_address', 'option')?>"><?php the_field('email_address', 'option')?></a></span>
							</div>
							<div class="cell text-right">
								<?php
								wp_nav_menu( [
									'theme_location' => 'social-media-menu',
									'menu_class' => 'menu horizontal align-right',
									'menu_id' => 'social-media-menu' ,
									'items_wrap' => '' ,
									'items_wrap' => '<div id="%1$s" class="%2$s">%3$s</div>'
								] ); 
								?>
							</div>
						</div>
						<div class="grid-x show-for-medium" id="header-links">
							<div class="cell text-right">
								<span class="mailing-list"><a href="#" data-open="mailchimpSignupModal"><?php the_field('mailing_list_text', 'option')?></a></span> | 
								<span class="account-login"><a href="<?php the_field('account_login_link', 'option')?>"><?php the_field('account_login_text', 'option')?></a></span>
							</div>
						</div>
					</div>

					<div class="cell medium-4 medium-order-1">
						<div class="grid-x" id="header-logo">
							<div class="cell text-center medium-text-left">
								<?php
								if ( function_exists( 'the_custom_logo' ) ) {
									$custom_logo_id = get_theme_mod( 'custom_logo' );
									$image = wp_get_attachment_image_src( $custom_logo_id , 'site_logo' );
									printf( '<a href="%s" rel="home">',	esc_url( home_url( '/' ) ));
									?>
									<img class="custom-logo" src="<?php echo $image[0];?>" height="173" width="240" alt="<?php bloginfo( 'name' ); ?>"/>
									<?php
									printf( '</a>');
								}
								else
								{
									printf( '<h1><a href="%s" rel="home">%s</a></h1>',
										esc_url( home_url( '/' ) ),
										esc_html( get_bloginfo( 'name' ) )
									);
								}
								?>
							</div>
						</div>
					</div>
					
				</div>

				<div class="grid-x show-for-medium" id="header-menu">
					<div class="cell text-right">
						<?php
						wp_nav_menu( [
							'theme_location' => 'primary',
							'container'      => false,
							'menu_class'	=> 'dropdown menu',
							'items_wrap'      => '<ul id="%1$s" class="%2$s" data-dropdown-menu>%3$s</ul>',
							'walker'		=> new Dropdown_Foundation_Menu(),
						] ); 
						?>
					</div>
				</div>	

				<div class="grid-x show-for-home-only" id="header-tagline">
					<div class="cell">
						<h2><?php the_field('header_tagline_title', 'option'); ?></h2>
						<p><?php the_field('header_tagline_text', 'option'); ?></p>
					</div>
				</div>
			</div>
			<?php echo get_template_part('template-parts/mailchimp-signup'); ?>
		</header>

		<main class="grid-container">

			<div id="content" class="site-content" role="main">

				<div class="content-container">
