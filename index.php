<?php
get_header(); ?>

<div class="content-container">

	<div class="container">

		<div class="grid-x grid-padding-x">

			<div class="small-12 cell">
				<?php
				if ( have_posts() ) :

					while ( have_posts() ) :

						the_post();

						the_title( '<h1 class=\'page-title\'>', '</h1>' );

						the_content();

					endwhile;

					the_posts_navigation();

				endif;
				?>
			</div>

		</div>

	</div>

</div>

<?php
get_footer();
