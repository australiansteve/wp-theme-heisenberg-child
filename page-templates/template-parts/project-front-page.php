<td class="featured-project" >
	<div>
		<?php 
		$image = get_the_post_thumbnail( get_the_ID(), 'project-featured');

		if( $image ) {

			echo $image;

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