<?php
get_header(); ?>

<main class="grid-container">

<div class="grid-x grid-padding-x">

	<div class="small-12 cell">
		<?php
		if ( have_posts() ) :

			while ( have_posts() ) :

				the_post();

				?>
				<div class="page-content text-center">
					<?php
					the_content();
					?>
				</div>

				<div class="projects">
					<h2><?php the_field('section_1_title'); ?></h2>


					<div class="grid-x align-middle">
						<div class="cell small-12 medium-10 medium-order-2">
							<div class="hide-overflow">
								<?php
								// WP_Query arguments
								$args = array(
									'post_type'              => array( 'austeve-projects' ),
									'post_status'            => array( 'publish' ),
									'order'                  => 'ASC',
									'orderby'                => 'menu_order',
								);

								// The Query
								$projectsquery = new WP_Query( $args );
								?>
								<table>
									<tbody style="border:none">
										<tr id="project-scroll">
											<?php
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
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="cell small-2 medium-1 medium-order-1">
							<a class="previous" href="#">
								<?php
								$image = get_field('left_button_image', 'option');
								$image_url = wp_get_attachment_image_src($image, 'hand-logo')[0];
								echo '<img src=\''.$image_url.'\' title=\'Previous\' />';
								?>

							</a>
						</div>
						<div class="cell small-2 medium-1 small-offset-8 medium-order-3 medium-offset-0">
							<a class="next" href="#"><?php
							$image = get_field('right_button_image', 'option');
							$image_url = wp_get_attachment_image_src($image, 'hand-logo')[0];
							echo '<img src=\''.$image_url.'\' title=\'Next\' />';
							?></a>
						</div>
					</div>
				</div>
				<?php

			endwhile;

		else :

			echo esc_html( 'Sorry, no posts' );

		endif;
		?>
	</div>

</div>

</main>

<?php echo get_template_part('page-templates/template-parts/javascript', 'front-page'); ?>

<?php
get_footer();
