<div class="client">
	<?php
	$image = get_sub_field('image', 'option');
	$link = get_sub_field('link', 'option');
	$size = 'client-logo'; // (thumbnail, medium, large, full or custom size)

	if( $image ):

		if ($link):
			echo "<a href='".$link."'>";
		endif;
		echo wp_get_attachment_image( $image, $size );

		if ($link):
			echo "</a>";
		endif;

	endif;
	?>
</div>