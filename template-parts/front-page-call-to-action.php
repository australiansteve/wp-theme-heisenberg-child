<div class="grid-x grid-margin-x" id="call-to-action">

	<div class="small-12 medium-8 cell" id="cta-left">
		<?php 

		$image = get_field('homepage_cta_image');
		$size = 'homepage_cta';

		if( $image) { 
			if (is_numeric($image))
			{
				//this field used to be stored just as an image ID
				echo wp_get_attachment_image( $image, $size );
			}
			else
			{
				//Must be stored in the new form (as flexible content)
				if( have_rows('homepage_cta_image') ):

				     // loop through the rows of data
				    while ( have_rows('homepage_cta_image') ) : the_row();

				        if( get_row_layout() == 'image' ):

				        	echo wp_get_attachment_image( get_sub_field('image'), $size );

				        elseif( get_row_layout() == 'video' ): 

							// get iframe HTML
							$iframe = get_sub_field('video');

							// use preg_match to find iframe src
							preg_match('/src="(.+?)"/', $iframe, $matches);
							$src = $matches[1];

							// add extra params to iframe src
							$params = array(
							    'autoplay'    => get_sub_field('autoplay'),
							    'mute'    => get_sub_field('mute'),
							    'rel'    => 0
							);

							$new_src = add_query_arg($params, $src);

							$iframe = str_replace($src, $new_src, $iframe);

							// add extra attributes to iframe html
							$attributes = 'frameborder="0"';

							$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

							// echo $iframe
							echo $iframe;

				        endif;

				    endwhile;

				endif;
			}
		}

		?>
	</div>

	<div class="small-12 medium-4 cell" id="cta-right">
		
		<div class="container">
			<div class="grid-y" style="height: calc(375px - 2rem)">
				<div class="cell small-2">
					<h3><?php the_field('homepage_cta_heading'); ?></h3>
				</div>
				<div class="cell small-8">
					<?php the_field('homepage_cta_text'); ?>
				</div>
				<div class="cell small-2">
					<a class="button" href="<?php the_field('homepage_cta_link'); ?>"><?php the_field('homepage_cta_link_text'); ?></a>
				</div>
			</div>
		</div>
	</div>

</div>