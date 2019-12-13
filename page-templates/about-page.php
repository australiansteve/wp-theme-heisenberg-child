<?php
/***
  * Template Name: About Page
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
					<div class="main-content">

						<div class="bling-1">

						</div>

						<div>

							<?php the_content(); ?>

						</div>

						<div id="image-gallery">

							<?php
							$galleryBgImageUrl = get_field('image_gallery_background_image');
							?>
							<div class="background-container" style="background-image: url(<?php echo $galleryBgImageUrl;?>)">
								<?php 
								$images = get_field('image_gallery');
								$size = 'service-slider'; // (thumbnail, medium, large, full or custom size)

								if( $images ): 
									if (count($images) > 1 ): ?>

										<div class="orbit" role="region" aria-label="" data-orbit>
											<div class="orbit-wrapper">
												<div class="orbit-controls">
													<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
													<button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
												</div>
												<ul class="orbit-container">

													<?php foreach( $images as $image ): ?>
														<li class="is-active orbit-slide">
															<figure class="orbit-figure">
																<?php echo wp_get_attachment_image( $image, $size ); ?>
																<?php $caption = wp_get_attachment_caption($image);
																if ($caption) :?>
																	<figcaption class="orbit-caption"><?php echo $caption; ?></figcaption>
																<?php endif; ?>
															</figure>
														</li>
													<?php endforeach; ?>
												</ul>
											</div>
											<nav class="orbit-bullets">
												<?php 
												$imageCounter = 0;
												foreach( $images as $image ): ?>
													<button class="<?php echo ($imageCounter == 0) ? 'is-active' : '';?>" data-slide="<?php echo $imageCounter++;?>">
														<span class="show-for-sr">Slide <?php echo $imageCounter;?></span>
														<?php if ($imageCounter == 1): ?>
															<span class="show-for-sr" data-slide-active-label>Current Slide</span>
														<?php endif; ?>
													</button>
												<?php endforeach; ?>
											</nav>
										</div>

										<?php else: ?>
											<!-- Only 1 image to display -->
											<?php echo wp_get_attachment_image( $images[0], $size ); ?>
										<?php endif; ?>
									<?php endif; ?>

								</div>
							</div>

							<div class="bling-2">
							</div>

						</div>

						<div id="mission-statement">
							<?php the_field('mission_statement'); ?>
						</div>

						<?php

					endwhile;
				}
				?>
			</div>

		</div>

	</main>

	<script type="text/javascript">
		function debounce(func, wait, immediate) {
			var timeout;
			return function() {
				var context = this, args = arguments;
				var later = function() {
					timeout = null;
					if (!immediate) func.apply(context, args);
				};
				var callNow = immediate && !timeout;
				clearTimeout(timeout);
				timeout = setTimeout(later, wait);
				if (callNow) func.apply(context, args);
			};
		};

		var resizeBackground = debounce(function() {
			var bgHeight = jQuery("#profiles .background-container").height();
			jQuery("#profiles .profiles-background").height(bgHeight);
		}, 250);

		window.addEventListener('resize', resizeBackground);

		jQuery( document ).ready(function() {
			resizeBackground();
		});

	</script>


		<div class="grid-container grid-x grid-padding-x">

			<div class="cell">
				<h2><?php the_field('our_team_section_title');?></h2>

				<div><?php the_field('our_team_section_text');?></div>

			</div>

		</div>

	<div id="our-team" class="grid-container no-padding-x no-padding-y"> 

		<div id="profiles">

			<div class="background-container">

				<main class="grid-container">

					<div class="profiles-container" data-equalizer="position" data-equalize-by-row="true">

						<div class="grid-x medium-up-2" id="featured-profiles" data-equalizer="featured" data-equalize-by-row="true">
							<?php
						// check if the repeater field has rows of data
							if( have_rows('profiles') ):

 							// loop through the rows of data
								while ( have_rows('profiles') ) : the_row();

									if (get_sub_field('featured')) :
										?>
										<div class="cell">
											<div class="featured-profile" data-equalizer-watch="featured">
												<?php echo get_template_part('page-templates/template-parts/profile', 'featured'); ?>
											</div>
										</div>
										<?php

									endif;

								endwhile;

							endif;
							?>

						</div>

						<div class="grid-x medium-up-3" id="regular-profiles" data-equalizer data-equalize-by-row="true" data-equalizer="position">
							<?php
						// check if the repeater field has rows of data
							if( have_rows('profiles') ):

 							// loop through the rows of data
								while ( have_rows('profiles') ) : the_row();

									if (!get_sub_field('featured')) :
										?>
										<div class="cell" >
											<div class="profile" data-equalizer-watch>
												<?php echo get_template_part('page-templates/template-parts/profile'); ?>
											</div>
										</div>
										<?php

									endif;

								endwhile;

							endif;
							?>

						</div>

					</main>

					<div class="profiles-background">
					</div>

				</div>

			</div>

		</div>

	</div>

	<?php
	get_footer();
