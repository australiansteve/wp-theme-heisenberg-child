<?php
/***
  * Template Name: Testimonials Page
  */

get_header(); ?>

<main class="grid-container">

	<div class="grid-x grid-padding-x">

		<div class="small-12 cell">

			<?php
			if ( have_posts() ) {

				while ( have_posts() ) :

					the_post();

					?>
					<div class="grid-x">

						<div class="cell">

							<?php the_content(); ?>

						</div>

					</div>
					<?php

				endwhile;

				the_posts_navigation();

				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			}
			?>
		</div>

	</div>

</main>


<div id="more-testimonials"> 

	<main class="grid-container">
		<div class="section-title">
			<h2><?php the_field('more_testimonials_section_title', 'option');?></h2>
		</div>

		<?php

			// WP_Query arguments
		$args = array(
			'post_type'              => array( 'austeve-testimonials' ),
			'post_status'            => array( 'publish' ),
			'posts_per_page'         => '-1',
			'orderby'         => 'menu_order',
			'order'         => 'ASC',
		);

				// The Query
		$projectsquery = new WP_Query( $args );

				// The Loop
		if ( $projectsquery->have_posts() ) {
			while ( $projectsquery->have_posts() ) {
				$projectsquery->the_post();
				echo get_template_part('page-templates/template-parts/testimonial');
			}
		} else {
					// no posts found
		}

				// Restore original Post Data
		wp_reset_postdata();

		?>
	</main>
</div>

<?php
get_footer();
