<?php
/***
  * Template Name: Services Page
  */

get_header(); 
$servicesBgImageUrl = get_field('services_page_background_image', 'option');
error_log("servicesBgImageUrl: ".$servicesBgImageUrl);
?>

<?php echo get_template_part('page-templates/template-parts/service', 'javascript'); ?>


<div id="services-section" class="page-section-background-container" style="background-image: <?php echo get_template_part('page-templates/template-parts/background-color', 'white-top-down');?>, url(<?php echo $servicesBgImageUrl; ?>)">

	<main class="grid-container">

		<div class="grid-x grid-margin-x">

			<div class="cell">

				<?php
				if ( have_posts() ) :

					while ( have_posts() ) :

						the_post();

						?>

						<div class="grid-x">

							<div class="small-12 cell title">

								<h3><?php the_field('front_page_services_section_title', 'option'); ?></h3>

							</div>

						</div>

						<div class="grid-x grid-margin-x">

							<div class="cell small-12 medium-6 medium-order-1">

								<div class="services-text">

									<?php the_content(); ?>

								</div>

							</div>

							<div class="cell learn-more medium-6 medium-order-3">

								<a class="button" href="<?php the_field('front_page_services_section_button_link', 'option'); ?>"><?php the_field('front_page_services_section_button_text', 'option'); ?></a>

							</div>



							<?php echo get_template_part('page-templates/template-parts/services-buttons');?>

						</div>

						<?php

					endwhile;

					the_posts_navigation();

					if ( comments_open() || get_comments_number() ){
						comments_template();
					}
				endif;
				?>
			</div>
		</div>
	</main>

</div>

<main class="grid-container no-padding-x">

	<div class="grid-x grid-padding-x" id="services">

		<div class="cell">

			<?php
			// WP_Query arguments
			$args = array(
				'post_type'              => array( 'austeve-services' ),
				'post_status'            => array( 'publish' ),
				'posts_per_page'         => '-1',
				'orderby'         => 'menu_order',
				'order'         => 'ASC',
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

	</div>

</main>

<?php
get_footer();
