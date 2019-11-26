<div>
	<?php 
	$image = get_sub_field('image');
	$size = 'about-profile'; // (thumbnail, medium, large, full or custom size)

	if( $image ) {

		echo wp_get_attachment_image( $image, $size );

	}
	else {
		echo "<img src='https://via.placeholder.com/500'>";
	}
	?>

</div>
<div class="details">
	<div class="bling">
	</div>
	<div>
		<h3 class="name"><?php the_sub_field('name');?></h3>
		<div class="position" data-equalizer-watch="position"><?php the_sub_field('position');?></div>
	</div>
	<div>
		<?php the_sub_field('bio');?>
	</div>
</div>