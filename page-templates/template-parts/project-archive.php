<div class="project" id="project-<?php echo get_post_field('post_name');?>">
	<div class="project-container">
		<div class="project-gallery-container">
			<?php 
			$images = get_field('image_gallery');
				$size = 'project-archive-slider'; // (thumbnail, medium, large, full or custom size)
				?>

				<div class="orbit" role="region" aria-label="" data-orbit>
					<div class="orbit-wrapper">
						<div class="orbit-controls">
							<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
							<button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
						</div>
						<ul class="orbit-container">

							<?php if( $images ): ?>
								<?php foreach( $images as $image ): ?>
									<li class="is-active orbit-slide">
										<figure class="orbit-figure">
											<?php echo wp_get_attachment_image( $image, $size ); ?>
										</figure>
									</li>

								<?php endforeach; ?>
								
								<nav class="orbit-bullets">
									<?php 
									$imageCounter = 0;

									if( $images ):
										foreach( $images as $image ): ?>
											<button class="<?php echo ($imageCounter == 0) ? 'is-active' : '';?>" data-slide="<?php echo $imageCounter++;?>">
												<span class="show-for-sr">Slide <?php echo $imageCounter;?></span>
												<?php if ($imageCounter == 1): ?>
													<span class="show-for-sr" data-slide-active-label>Current Slide</span>
												<?php endif; ?>
											</button>
										<?php endforeach; ?>
									<?php endif; ?>
								</nav>

								<?php else: ?>
									<li class="is-active orbit-slide">
										<figure class="orbit-figure">
											<img src="https://via.placeholder.com/1200x	800"/>
										</figure>
									</li>
								<?php endif; ?>
							</ul>
						</div>
						
					</div>

				</div>
				<div class="project-detail-container">
					<div class="meta">
						<h2><?php echo the_title(); ?></h2>
						<div class="type"><?php the_field('project_type'); ?></div>
						<div class="location"><?php the_field('location'); ?></div>
					</div>
					<div class="description">
						<div class="description"><?php the_field('short_description'); ?></div>
					</div>
					<div class="project-action-container">
						<a class="button" href="<?php the_permalink();?>"><?php the_field('project_archive_read_more_button_text', 'option');?></a>
					</div>

				</div>

			</div>
		</div>