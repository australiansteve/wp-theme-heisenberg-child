<?php
get_header(); ?>

<script type="text/javascript">
	function updateServiceText(serviceId) {
		jQuery(".services-text")[0].innerHTML = jQuery('.service-description-' + serviceId)[0].innerHTML;
		jQuery('html, body').animate({
			scrollTop: jQuery("#services-section").offset().top
		}, 2000);
	}
</script>

<?php
$servicesBgImageUrl = get_field('front_page_services_section_background_image', 'option');
?>
<div id="services-section" style="background-image:linear-gradient(to bottom, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0.1)), url('<?php echo $servicesBgImageUrl; ?>')">

	<main class="grid-container">

		<div class="grid-x grid-padding-x">

			<div class="cell">

				<div class="grid-x">

					<div class="small-12 cell title">

						<h3><?php the_field('front_page_services_section_title', 'option'); ?></h3>

					</div>

				</div>

				<div class="grid-x">

					<div class="cell small-12 medium-6">

						<div class="grid-x">

							<div class="cell services-text">

								<?php the_field('front_page_services_section_text', 'option'); ?>

							</div>

							<div class="cell learn-more">

								<a class="button" href="<?php the_field('front_page_services_section_button_link', 'option'); ?>"><?php the_field('front_page_services_section_button_text', 'option'); ?></a>

							</div>

						</div>

					</div>

					<div class="cell small-12 medium-6">

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
								echo get_template_part('page-templates/template-parts/service-button', 'front-page');
							}
						} else {
						// no posts found
						}

						// Restore original Post Data
						wp_reset_postdata();
						?>	

					</div>

				</div>

			</div>

		</div>

	</main>

</div>

<div id="projects-section">

	<div class="content-container">

		<div class="grid-x">

			<div class="small-12 cell title">

				<h3><?php the_field('front_page_projects_section_title', 'option'); ?></h3>

			</div>

			<div class="small-12 cell text">

				<?php the_field('front_page_projects_section_text', 'option'); ?>

			</div>

			<div class="small-12 cell projects">

				<?php
				// WP_Query arguments
				$args = array(
					'post_type'              => array( 'austeve-projects' ),
					'post_status'            => array( 'publish' ),
					'posts_per_page'         => '-1',
					'tax_query'              => array(
						array(
							'taxonomy'         => 'project-category',
							'terms'            => 'current',
							'field'            => 'slug',
							'operator'         => 'IN',
						),
					),
				);

				// The Query
				$projectsquery = new WP_Query( $args );

				// The Loop
				if ( $projectsquery->have_posts() ) {
					while ( $projectsquery->have_posts() ) {
						$projectsquery->the_post();
						echo get_template_part('page-templates/template-parts/project', 'front-page');
					}
				} else {
					// no posts found
				}

				// Restore original Post Data
				wp_reset_postdata();
				?>	
			</div>

		</div>

	</div>
</div>


<?php
$clientsBgImageUrl = get_field('front_page_clients_section_background_image', 'option');
?>
<div id="clients-section">

	<div class="background-container" style="background-image: url('<?php echo $clientsBgImageUrl; ?>')">

		<div class="content-container">
			<div class="grid-x">
				<div class="cell">
					<h3><?php the_field('front_page_clients_section_title', 'option'); ?></h3>
				</div>

				<div class="cell">
					<?php the_field('front_page_clients_section_text', 'option'); ?>
				</div>

				<div class="cell scrolling-panel">
					<?php

					// check if the repeater field has rows of data
					if( have_rows('front_page_clients_section_logos', 'option') ):

 						// loop through the rows of data
						while ( have_rows('front_page_clients_section_logos', 'option') ) : the_row();

							echo get_template_part('page-templates/template-parts/client', 'front-page');

						endwhile;

					endif;

					?>
				</div>
			</div>


		</div>

	</div>

</div>


<?php
$contactBgImageUrl = get_field('front_page_contact_section_background_image', 'option');
?>
<div id="contact-section" style="background-image: url('<?php echo $contactBgImageUrl; ?>')">

	<div class="content-container">

		<div class="grid-x text-center">
			<div class="cell">
				<h3><?php the_field('front_page_contact_section_title', 'option'); ?></h3>
			</div>

			<div class="cell">
				<?php the_field('front_page_contact_section_text', 'option'); ?>
			</div>

			<div class="cell">
				<a class="button" href="<?php the_field('front_page_contact_section_button_link', 'option'); ?>"><?php the_field('front_page_contact_section_button_text', 'option'); ?></a>
			</div>
		</div>
	</div>

</div>
<?php
get_footer();
