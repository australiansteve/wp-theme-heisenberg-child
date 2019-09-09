<?php
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
						<h1><?php the_field('courses_page_title', 'option'); ?></h1>
						<?php 

						$theSubMenu = 'courses-menu';
						get_template_part( 'template-parts/sub-menu' ); 
						?>
					</div>

				</div>
			</div>

			<div class="grid-x grid-padding-x page-content">

				<div class="small-12 medium-offset-1 cell">

					<div class="content-container">
						<div class="grid-x">
							<div class="large-7 cell">
								<h2><?php the_title(); ?></h2>

								<!--?php echo get_template_part('template-parts/course', 'taxonomies'); ?-->

								<div class="course-description">
									<?php
									the_content();

									?>
								</div>

								<div class="course-offerings">
									<?php

									$courseOfferings = array();
									// check if the repeater field has rows of data
									if( have_rows('course_offerings') ):

			 							// loop through the rows of data
										while ( have_rows('course_offerings') ) : the_row();

											array_push($courseOfferings, array(get_sub_field('dates'), get_sub_field('location'), get_sub_field('cost')));

											?>
											<div class="course-offering">
												<div class="dates"><span class="strong">Dates:</span> <?php the_sub_field('dates');?></div>
												<div class="location"><span class="strong">Location:</span> <?php the_sub_field('location');?></div>
												<div class="cost"><span class="strong">Cost:</span> <?php the_sub_field('cost');?></div>
											</div>
											<?php
										endwhile;

									endif;
									?>
								</div>

								<div class="course-information">
									<?php

									$moreInformationText = get_field('more_information_button_text');
									$moreInformationLink = get_field('more_information_button_link');

									// check if the repeater field has rows of data
									if( $moreInformationText && $moreInformationLink ):

										?>

										<a class="button" href="<?php echo $moreInformationLink ?>" target="blank" title="<?php the_title( );?>"><?php echo $moreInformationText ?></a>
										<?php

									endif;
									?>
								</div>

							</div>

							<div class="large-5 cell text-right">
								<?php if ( has_post_thumbnail() ) : ?>
									<div class="featured-image">
										<?php the_post_thumbnail('medium'); ?>
									</div>
								<?php endif; ?>
							</div>

						</div>
					</div>

					<div class="course-registration">
						<div class="border-container">
							<div class="gold-border-div show-for-medium">
							</div>

							<div class="course-registration-content">

								<?php

								echo do_shortcode("[ninja_form id=2]");
								?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php

		endwhile;

	else :

		echo esc_html( 'Sorry, no posts' );

	endif;
	get_footer();
