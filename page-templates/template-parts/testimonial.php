<?php
?>
<div class="testimonial" id="testimonial-<?php echo get_post_field('post-name');?>">
	<div class="grid-x align-middle">
		<div class="cell small-12 medium-4 large-6 image">
			<?php
			$image = get_field('image');
			$size = 'about-profile-featured';

			if( $image ) {

				echo wp_get_attachment_image( $image, $size );

			}
			else {
				?>
				<div class="text-center image-replacement">
					<?php the_field('project');?>
				</div>
				<?php
			}
			?>
		</div>
		<div class="cell small-12 medium-8 large-6 details">
			<div class="project"><?php the_field('project');?></div>		
			<div class="comment text-right">
				<blockquote>
				<?php the_field('comment');?>
			</blockquote>
			</div>
			<div class="name text-right">-<?php the_field('name');?></div>
			<div class="company text-right"><?php the_field('company');?></div>		
			
		</div>
	</div>
</div>