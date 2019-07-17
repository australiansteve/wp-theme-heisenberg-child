<?php
/** 
 * Template Name: Team page
 */

get_header(); 

if ( have_posts() ) :

	while ( have_posts() ) :

		the_post();
		?>
		<?php 
		$image = get_field('page_title_background_image', 'option');
		if ($image):
			?>
			<div class="background-div page-title-background" style="background-image:url(<?php echo $image['url'];?>)">
			</div>

			<?php 
		endif; 
		?>

		<div class="page-content">
			<div class="grid-x grid-padding-x page-title">
				<div class="small-12 cell">

					<div class="page-title-container">
						<?php the_title( '<h1>', '</h1>' ); ?>
					</div>

				</div>
			</div>

			<div class="grid-x grid-padding-x" id="team-members">
				<?php
				// WP_Query arguments
				$args = array(
					'post_type' 			=> array( 'austeve-team' ),
					'post_status'			=> array( 'publish' ),
					'posts_per_page'		=> '-1',
					'orderby'				=> 'menu_order',
					'order'					=> 'ASC',
					'tax_query'				=> array(
						array(
							'taxonomy'         => 'team-category',
							'terms'            => 'consultant',
							'field'            => 'slug',
							'operator'         => 'NOT IN',
						),
					),

				);

				// The Query
				$query = new WP_Query( $args );

				// The Loop
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();

						echo get_template_part('template-parts/austeve-team', 'archive');
					}
				} else {
					// no posts found
				}

				// Restore original Post Data
				wp_reset_postdata();
				?>
			</div>

			<?php
			// WP_Query arguments
			$args = array(
				'post_type'				=> array( 'austeve-team' ),
				'post_status'			=> array( 'publish' ),
				'posts_per_page'		=> '-1',
				'orderby'				=> 'menu_order',
				'order'					=> 'ASC',
				'tax_query'				=> array(
					array(
						'taxonomy'         => 'team-category',
						'terms'            => 'consultant',
						'field'            => 'slug',
						'operator'         => 'IN',
					),
				),
			);

			// The Query
			$query = new WP_Query( $args );

			// The Loop
			if ( $query->have_posts() ) {
				?>

				<div class="grid-x grid-padding-x page-title">
					<div class="small-12 cell">
						<h1><?php the_field('team_page_consultants_heading', 'option');?></h1>
					</div>
				</div>

				<div class="grid-x grid-padding-x page-content" id="team-members">
					<?php
					while ( $query->have_posts() ) {
						$query->the_post();

						echo get_template_part('template-parts/austeve-team', 'archive');
					}
					?>

				</div>

			</div>
			<?php
		} else {
			// no posts found
		}

		// Restore original Post Data
		wp_reset_postdata();

	endwhile;

else :

	echo esc_html( 'Sorry, no posts' );

endif;
get_footer();
