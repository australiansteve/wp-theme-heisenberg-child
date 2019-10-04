<?php
/***
  * Template Name: Services Page
  */

get_header(); ?>

<?php echo get_template_part('page-templates/template-parts/service', 'javascript'); ?>

<main class="grid-container">

	<div class="grid-x grid-padding-x">

		<div class="small-12 cell">
			<?php
			if ( have_posts() ) :

				while ( have_posts() ) :

					the_post();

					?>
					<div class="grid-x">

						<div class="cell small-12 medium-6">

							<div class="grid-x">

								<div class="cell services-text">

									<?php the_content(); ?>

								</div>

								<div class="cell learn-more">

									<a class="button" href="<?php the_field('front_page_services_section_button_link', 'option'); ?>"><?php the_field('front_page_services_section_button_text', 'option'); ?></a>

								</div>

							</div>

						</div>

						<?php echo get_template_part('page-templates/template-parts/services-buttons');?>

					</div>

					<?php

				endwhile;

				the_posts_navigation();

				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endif;
			?>
		</div>

	</div>

	<div class="grid-x grid-padding-x" id="services">

		<?php
			// WP_Query arguments
		$args = array(
			'post_type'              => array( 'austeve-services' ),
			'post_status'            => array( 'publish' ),
			'posts_per_page'         => '-1',
		);

		// The Query
		$servicesquery = new WP_Query( $args );

		// The Loop
		if ( $servicesquery->have_posts() ) {
			while ( $servicesquery->have_posts() ) {
				$servicesquery->the_post();
				echo get_template_part('page-templates/template-parts/service');
			}
		} else {
			// no posts found
		}

		// Restore original Post Data
		wp_reset_postdata();
		?>

	</div>

</main>

<?php
get_footer();
