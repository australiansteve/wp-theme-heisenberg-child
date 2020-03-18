<div class="section-content">
	<div class="border">
		<div class="video-container" id="<?php echo $sectionId;?>-video">
			<div class="video-wrapper">
				<video autoplay muted loop>
					<source src="<?php the_field($sectionId.'_video_url');?>" type="video/mp4"></source>
					Your browser does not support HTML5 video.
				</video>
			</div>
		</div>

		<div class="text-center" id="<?php echo $sectionId;?>-tagline">
			<div class="grid-y align-center" style="height: 100%">
				<div class="cell">
					<h2><?php the_field($sectionId.'_tagline'); ?></h2>
				</div>
			</div>

		</div>
	</div>
</div>