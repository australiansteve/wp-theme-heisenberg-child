<?php
get_header(); ?>

<main class="grid-container">

	<div class="grid-x grid-padding-x">

		<div class="small-12 cell">
			<?php
			if ( have_posts() ) {

				while ( have_posts() ) :

					the_post();

					the_content();

				endwhile;

				the_posts_navigation();

				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			}
			else {
				echo esc_html( 'Sorry, no posts' );
			}

			?>
		</div>

	</div>
</main>
<?php
get_footer();
