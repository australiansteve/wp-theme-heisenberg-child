<?php
get_header(); ?>

<main class="grid-container">
	<div class="grid-x grid-padding-x">

		<div class="small-12 cell">
			<?php
			if ( have_posts() ) :

				while ( have_posts() ) :

					the_post();

					the_title( '<h2>', '</h2>' );
					?>
					<div class="container">
						<?php
						
						$images = get_field('image_gallery');
						$size = 'project-archive-slider';

						if( $images ): ?>
							<div class="image-gallery">
								<ul>
									<?php foreach( $images as $image ): ?>
										<li>
											<?php echo wp_get_attachment_image( $image, $size ); ?>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
						<?php endif; 

						the_content();
						?>
					</div>
					<?php	
				endwhile;

				the_posts_navigation();

				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			endif;
			?>
		</div>

	</div>
</main>
<?php
get_footer();
