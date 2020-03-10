<?php
get_header(); ?>

<main class="grid-container">

	<div class="grid-x grid-padding-x">

		<div class="small-12 cell">

			<div class="page-content">
				<?php
				if ( have_posts() ) :

					while ( have_posts() ) :

						the_post();

						the_post_thumbnail('post-featured-image');
						?>
						
						<div class="page-content">
							<?php
							if( is_singular('austeve-projects')) :
								the_title('<h2>', '</h2>');
							endif;
							
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
		</div>

	</div>

</main><!-- #content -->

<?php
get_footer();
