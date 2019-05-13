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
	<div class="content-container">
		<div class="grid-x show-for-medium" id="header-language-switch">
			<div class="cell text-right">
				<span class="language-fr"><a href="/?lang=fr">FR</a></span>
				<span class="language-en"><a href="/?lang=en">EN</a></span>
			</div>
		</div>
		<div class="grid-x show-for-medium" id="header-contact-information">
			<div class="cell text-right">
				<span class="telephone-number"><?php the_field('telephone_number_text', 'option')?>: <a href="<?php the_field('telephone_number_link', 'option')?>"><?php the_field('telephone_number', 'option')?></a></span>
				<span class="email-address"><?php the_field('email_address_text', 'option')?>: <a href="mailto:<?php the_field('email_address', 'option')?>"><?php the_field('email_address', 'option')?></a></span>
			</div>
		</div>
		<div class="grid-x show-for-medium" id="header-links">
			<div class="cell text-right">
				<span class="mailing-list"><a href="<?php the_field('mailing_list_link', 'option')?>"><?php the_field('mailing_list_text', 'option')?></a></span>
				<span class="account-login"><a href="<?php the_field('account_login_link', 'option')?>"><?php the_field('account_login_text', 'option')?></a></span>
			</div>
		</div>
	<?php
	printf( '<h1><a href="%s" rel="home">%s</a></h1>',
		esc_url( home_url( '/' ) ),
		esc_html( get_bloginfo( 'name' ) )
	);

	printf( '<p class="h4">%s</p>', esc_html( get_bloginfo( 'description' ) ) );

	wp_nav_menu( [
		'theme_location' => 'primary',
		'container'      => '',
	] ); ?>
	</div>
</header>

<main class="grid-container">