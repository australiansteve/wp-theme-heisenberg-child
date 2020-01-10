<?php
/*
 * Template Name: About Page
 */
get_header(); ?>

<div class="grid-x grid-padding-x">

	<div class="small-12 cell">
		<?php
		if ( have_posts() ) :

			while ( have_posts() ) :

				the_post();

				the_title( '<h2>', '</h2>' );

				the_post_thumbnail('post-featured-image');

				?>
				<div class="page-content">

					<div class="grid-x align-middle">

						<div class="cell shrink headshot">
						<?php 
						$image = get_field('headshot');
						$size = 'headshot-image';
						if( $image ) {
							echo wp_get_attachment_image( $image, $size );
						}
						?>
					</div>

						<div class="cell auto">
							<?php
					the_content();
					?>
						</div>

					</div>


					<div class="grid-x" id="section-1">
						<div class="cell">
							<h2><?php the_field('section_1_title'); ?></h2>

							<div class="grid-x">
								<div class="cell medium-6">
									<?php the_field('section_1_text_left');?>
								</div>
								<div class="cell medium-6">
									<?php the_field('section_1_text_right');?>
								</div>
							</div>
						</div>
					</div>

					<div class="grid-x" id="section-2">
						<div class="cell">
							<h2><?php the_field('section_2_title'); ?></h2>

							<div class="grid-x">
								<div class="cell">
									<?php the_field('section_2_text');?>
								</div>
							</div>
						</div>
					</div>

					<div class="grid-x" id="signoff">
						<div class="cell">
							<?php the_field('signoff'); ?>
						</div>
					</div>

				</div>
				<?php

			endwhile;

			echo get_template_part('page-templates/template-parts/navigation');

			if ( comments_open() || get_comments_number() ) :
				comments_template();
		endif;

	else :

		echo esc_html( 'Sorry, no posts' );

	endif;
	?>
</div>

</div>

<?php
get_footer();
