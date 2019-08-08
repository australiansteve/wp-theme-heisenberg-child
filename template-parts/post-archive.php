<div class="grid-x post">
	<div class="cell medium-3 left-column">
		<?php 
		
		$size = 'medium_cropped'; // (thumbnail, medium, large, full or custom size)
		
		if( has_post_thumbnail() ):
			the_post_thumbnail( $size );
		else:
			the_custom_logo();
		endif;
		?>
	</div>
	<div class="cell medium-9 right-column">
		<div class="name">
			<h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2><br/>
			<span class="meta"><?php $post_date = get_the_date( 'l F j, Y' ); echo $post_date; ?></span>
		</div>
		
		<div class="excerpt">
			<p><?php the_excerpt(); ?></p>
		</div>

		<div class="read-more">
			<a class="button" href="<?php the_permalink();?>" title="<?php the_field('front_page_post_button_text', 'option');?>"><?php the_field('front_page_post_button_text', 'option');?></a>
		</div>
	</div>
</div>
