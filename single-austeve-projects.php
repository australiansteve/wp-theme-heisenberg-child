<?php
get_header(); ?>

<main class="grid-container">

	<div class="grid-x grid-padding-x">

		<div class="cell">
			<?php echo get_template_part('page-templates/template-parts/project', 'category-term-links'); ?>
		</div>

	</div>

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
						
						$images = get_field('image_gallery_slider');
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

						?>
						<div class="meta">
							<div class="type"><?php the_field('project_type'); ?></div>
							<div class="consultants"><?php if (get_field('consultants')) : echo "<span>Consultants:</span> ".get_field('consultants'); endif;?></div>
							<div class="location"><?php if (get_field('location')) : echo "<span>Location:</span> ".get_field('location'); endif;?></div>
							<div class="completion"><?php if (get_field('completion')) : echo "<span>Completion:</span> ".get_field('completion'); endif;?></div>
						</div>
						<?php
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
