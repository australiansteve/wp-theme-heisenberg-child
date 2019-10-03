<?php
?>
<div class="service">
	<a href="javascript:updateServiceText(<?php echo get_the_ID();?>)">
		<div class="grid-x align-middle">
			<div class="cell small-2 service-icon">
				
					<?php 
					$image = get_field('icon');
					$size = 'service-icon'; // (thumbnail, medium, large, full or custom size)

					if( $image ) {

						echo wp_get_attachment_image( $image, $size );

					}
					?>
			</div>
			<div class="cell small-offset-1 small-9 title ">
					<?php the_title(); ?>
			</div>
		</div>
	</a>
</div>	
<div class="service-description-<?php echo get_the_ID();?>" style="display:none !important;">
	<?php the_field('description'); ?>
</div>