<div class="project" id="project-<?php echo get_post_field('post_name');?>">
	<div class="project-container">
		<div class="project-gallery-container">
			<?php 
			$images = get_field('image_gallery_slider');
			$size = 'project-archive-slider'; 

			if( $images ) {
				if (count($images) > 1) {
					?>

					<div class="orbit" role="region" aria-label="" data-orbit data-options="autoPlay:false;">
						<div class="orbit-wrapper">
							<div class="orbit-controls">
								<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span><i class="fas fa-2x fa-chevron-left"></i></button>
								<button class="orbit-next"><span class="show-for-sr">Next Slide</span><i class="fas fa-2x fa-chevron-right"></i></button>
							</div>
							<ul class="orbit-container">

								<?php 
								$imageCounter = 0;

								foreach( $images as $image ): ?>
									<li class="<?php echo ($imageCounter++ == 0) ? 'is-active' : '';?> orbit-slide">
										<figure class="orbit-figure">
											<?php echo wp_get_attachment_image( $image, $size ); ?>
										</figure>
									</li>

								<?php endforeach; ?>

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

							</ul>
						</div>

					</div>

					<?php 
				}
				else { 
					echo wp_get_attachment_image( $images[0], $size );
				} 
			}
			else {
				?>
				<img src="https://via.placeholder.com/1200x800"/>
				<?php 
			} 
			?>
		</div>

		<div class="project-detail-container grid-y">
			<div class="cell meta">
				<h2><?php echo the_title(); ?></h2>
				<div class="type"><?php the_field('project_type'); ?></div>
			</div>
			<div class="cell large-auto description">
				<div class="description"><?php the_field('short_description'); ?></div>
			</div>
			<div class="cell read-more">
				<a href="<?php echo the_permalink();?>" class="button">Read More</a>
			</div>
		</div>

	</div>
</div>