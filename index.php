<?php
get_header(); ?>

	<div class="grid-x grid-padding-x">

		<div class="small-12 cell">
			<?php
			if ( have_posts() ) :

				while ( have_posts() ) :

					the_post();

					the_title( '<h1>', '</h1>' );

					the_content();

				endwhile;

				the_posts_navigation();

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
