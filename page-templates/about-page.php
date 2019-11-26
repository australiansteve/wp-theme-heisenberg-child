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

								if( $images ): ?>

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

								<?php endif; ?>

							</div>
						</div>

						<div class="bling-2">
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

	<div id="our-team"> 

		<div class="grid-x grid-padding-x">

			<div class="cell">
				<h2><?php the_field('our_team_section_title');?></h2>

				<div><?php the_field('our_team_section_text');?></div>

			</div>

		</div>

	</div>

</main>

<script type="text/javascript">

jQuery( document ).ready(function() {

	var bgHeight = jQuery("#profiles .background-container").height();
	jQuery("#profiles .profiles-background").height(bgHeight);

});

</script>

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

<?php
get_footer();
