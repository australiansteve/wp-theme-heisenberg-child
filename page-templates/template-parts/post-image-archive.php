<div class="image">
	<?php
	$image = get_field('archive_image');
	$size = 'post-archive-image';
	if ($image){
		echo wp_get_attachment_image( $image, $size );
	}
	else if (has_post_thumbnail()){
		the_post_thumbnail('post-archive-image');
	}
	else {
		/* Get one of the default images - randomized */
		$images = get_field('default_archive_images', 'option');
		$size = 'post-archive-image';
		if ($images && count($images) >= 1) {
			$n = rand(0, count($images) - 1);
			echo wp_get_attachment_image( $images[$n], $size );
		}
		else {
			die('No image or default image found');
		}
	}
	?>
</div>