<?php
get_header(); ?>

<main class="grid-container">

	<div class="grid-x grid-padding-x">

		<div class="cell medium-7 large-8">
			<?php
			if ( have_posts() ) :

				while ( have_posts() ) :

					the_post();

					the_title('<h2>', '</h2>');

					the_post_thumbnail('post-featured-image');

					?>
					<div class="page-content">
						<?php
						the_content();
						?>
					</div>
					<?php

				endwhile;

				echo get_template_part('page-templates/template-parts/navigation');

			else :

				echo esc_html( 'Sorry, no posts' );

			endif;
			?>
		</div>

		<div class="cell medium-4 medium-offset-1 large-3">
			<?php echo get_template_part('page-templates/template-parts/sidebar');?>
		</div>

	</div>

</main><!-- #content -->

<?php
get_footer();
