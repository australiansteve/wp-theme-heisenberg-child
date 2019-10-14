<?php
?>
<div class="service" id="service-<?php echo get_post_field( 'post_name');?>">
	
	<div class="bling">
	</div>
	
	<div class="grid-x grid-margin-x">
		<div class="cell service-title">
			<h2><?php the_title(); ?></h2>
		</div>
		<div class="cell service-description">
			<?php the_field('description'); ?>
		</div>
		<div class="cell contact-button">
			<a class="button" href="<?php the_field('link_destination'); ?>"><?php the_field('link_text'); ?></a>
		</div>
		<div class="cell service-gallery">

			<?php
			$serviceBgImageUrl = get_field('gallery_background_image');
			?>
			<div class="background-container" style="background-image: url(<?php echo $serviceBgImageUrl;?>)">
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

				<?php endif; ?>
			</div>

		</div>
	</div>
</div>