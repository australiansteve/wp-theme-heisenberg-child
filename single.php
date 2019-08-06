<?php
/***
  * Archive page for Grant Programs
  */

get_header(); ?>

<div class="content-container">

	<div class="container">
		<?php
		if ( have_posts() ) :

			while ( have_posts() ) :

				the_post();
				?>
				<div class="grid-x grid-padding-x">

					<div class="small-12 medium-8 cell left-column">

						<h1><?php the_title( ); ?></h1>

						<?php the_content();?>

					</div>

					<div class="small-12 medium-4 cell right-column">

						<div class="featured-image">
							<?php
							if (has_post_thumbnail())
							{
								the_post_thumbnail('medium');
							}
							?>
						</div>

					</div>
				</div>

				<?php
			endwhile;
			
		endif;
		?>

	</div>

</div>

<?php
get_footer();
