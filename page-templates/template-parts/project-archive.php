<div class="project" id="project-<?php echo get_post_field('post_name');?>">
	<div class="project-container">
		<div class="project-gallery-container">
			<?php 
				$images = get_field('image_gallery');
				$size = 'project-archive-slider'; // (thumbnail, medium, large, full or custom size)

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
		<div class="project-detail-container">
			<div class="grid-x">
				<div class="cell meta">
					<h2><?php echo the_title(); ?></h2>
					<div class="type"><?php the_field('project_type'); ?></div>
					<div class="location"><?php the_field('location'); ?></div>
				</div>
				<div class="cell description">
					<div class="description"><?php the_field('description'); ?></div>
				</div>
			</div>
		</div>
		<div class="project-action-container">
			<a class="button" href="<?php the_permalink();?>"><?php the_field('project_archive_read_more_button_text', 'option');?></a>
		</div>
	</div>
</div>