<div class ="cell report">
		<?php 
		$image = get_sub_field('image');
		$size = 'report_thumbnail'; // (thumbnail, medium, large, full or custom size)
		
		if( $image ) {
			echo wp_get_attachment_image( $image, $size );
		}
		?>
		<h4 class="name">
			<?php the_sub_field('name'); 
			if (get_sub_field('position')): 
				echo ", ".get_sub_field('position'); 
			endif; 
			?>
		</h4>
		<div class="bio">
			<?php the_sub_field('bio'); ?>
		</div>
	</div>
</div>
