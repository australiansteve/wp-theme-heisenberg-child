<div class="cell text-center medium-half-height">
	<a class="archive-link-to-single" href="<?php echo get_permalink();?>">
		<div class="grid-y align-right background" style="background-image: url(<?php global $post; echo get_the_post_thumbnail_url($post, 'full');?>); height: 100%; min-height: 300px">
			<div class="cell archive-content">
				<div class="grey-background">
					
				</div>
				<div class="title">
					<?php the_title();?>
				</div>
			</div>
		</div>
	</a>
</div>