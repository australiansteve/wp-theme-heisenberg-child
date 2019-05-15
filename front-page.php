<?php
get_header(); ?>

	<div class="content-container">

		<div class="grid-x grid-margin-x" id="call-to-action">

			<div class="small-12 medium-8 cell" id="cta-left">
				<?php 

				$image = get_field('homepage_cta_image');
				$size = 'homepage_cta';

				if( $image ) {
					echo wp_get_attachment_image( $image, $size );
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

		<div class="grid-x" id="intro">

			<div class="small-12 cell">
				<?php
				if ( have_posts() ) :

					while ( have_posts() ) :

						the_post();

						the_content();

					endwhile;

				endif;
				?>
			</div>

		</div>

	</div>

<?php
get_footer();
