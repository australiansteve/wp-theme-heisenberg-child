<?php
get_header();
?>
<main class="grid-container">
		
		<div class="grid-x grid-padding-x" data-equalizer="excerpt-height" data-equalize-by-row="true">

			<?php
			if ( have_posts() ) :

				while ( have_posts() ) :

					the_post();
					?>
					<div class="cell small-12 medium-6">
						<div class="post">
							<a href="<?php the_permalink();?>">
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
								<div class="text-center title">
									<h3><?php
									the_title();
									?></h3>
								</div>
							</a>
							<div class="text-center excerpt" data-equalizer-watch="excerpt-height">
								<?php
								the_excerpt();
								?>
							</div>
							<div class="text-center readmore">
								<a class='button' href='<?php
								the_permalink();
								?>'/><?php the_field('read_more_button_text', 'option');?></a>
							</div>
							
						</div>
					</div>
					<?php

				endwhile;

			echo get_template_part('page-templates/template-parts/navigation', 'archive');

			else :

				echo esc_html( 'Sorry, no posts found' );

			endif;
			?>

		</div>

</main>
<?php
get_footer();
