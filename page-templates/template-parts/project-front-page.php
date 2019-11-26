<td class="featured-project">
	<div>
		<?php 
		$size = 'project-featured';
		$image = get_the_post_thumbnail( get_the_ID(), $size);

		if( $image ) {
			echo $image;
		}
		else if (get_field('image_gallery_slider'))
		{
			$image = get_field('image_gallery_slider')[0];
			echo wp_get_attachment_image($image, $size);
		}
		else {
			echo "<img src='https://via.placeholder.com/700x500'>";
		}
		?>
	</div>
	<div class="details">
		<div class="bling">
		</div>
		<div>
			<div class="name"><?php echo the_title(); ?></div>
			<div class="location"><?php the_sub_field('location');?></div>
		</div>
		<div class="short-description">
			<?php the_field('short_description');?>
		</div>
	</div>
</td>