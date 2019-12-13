<?php
/***
  * Template Name: Contact Page
  */

get_header(); ?>
<?php
if ( have_posts() ) :

	while ( have_posts() ) :

		the_post();

		$contactBgImageUrl = get_field('contact_page_background_image', 'option');
		?>
		<div style="background-image: <?php echo get_template_part('page-templates/template-parts/background-color', 'white-top-down');?>, url(<?php echo $contactBgImageUrl; ?>)">

			<main class="grid-container">

				<div class="grid-x grid-padding-x">

					<div class="small-12 cell">

						<h2 class="subtitle"><?php the_field('contact_page_subtitle', 'option'); ?></h2>

					</div>

				</div>

				<div class="grid-x grid-padding-x">

					<div class="cell small-12 medium-5 medium-order-2">
						<div class="contact-container">
							<?php the_content(); ?>
						</div>
					</div>

					<div class="cell small-12 medium-7 medium-order-1">

						<?php echo do_shortcode("[ninja_form id=".get_field('contact_page_form', 'option')."]"); ?>

					</div>

				</div>

			</main>
		</div>
		<?php

	endwhile;

	the_posts_navigation();

	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

endif;
?>
<?php
get_footer();
