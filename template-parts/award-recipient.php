<div class ="grid-x recipient">
	<div class="cell">
		<div class="grid-x top">
			<div class="cell">
				<h3 class="name">
					<?php the_sub_field('name'); ?>
				</h3>
			</div>
			<div class="cell">
				<span class="award">
					<?php 
					if (get_sub_field('award')): 
						the_sub_field('award'); 
					endif; 
					?>
				</span>
			</div>
		</div>

		<div class="grid-x bottom">
			<div class="cell medium-7 left-column">
			<?php 
			$image = get_sub_field('photo');
				$size = 'award_recipient'; // (thumbnail, medium, large, full or custom size)
				
				if( $image ) {
					echo wp_get_attachment_image( $image, $size );
				}
				?>
			</div>
			<div class="cell medium-5 right-column">

				<div class="bio">
					<?php the_sub_field('bio'); ?>
				</div>
			</div>
		</div>
	</div>
</div>