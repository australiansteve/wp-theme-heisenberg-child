<?php
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
					<?php
					the_content();
					?>
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
