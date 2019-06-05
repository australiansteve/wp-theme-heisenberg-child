<div class ="grid-x board-member">
	<div class="cell medium-3 left-column">
		<?php 
		$image = get_sub_field('photo');
		$size = 'medium'; // (thumbnail, medium, large, full or custom size)
		
		if( $image ) {
			echo wp_get_attachment_image( $image, $size );
		}
		?>
	</div>
	<div class="cell medium-9 right-column">
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
