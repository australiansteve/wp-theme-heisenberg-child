<?php
get_header(); ?>

<section class="active"  data-section="<?php global $sectionNumber; echo $sectionNumber++;?>">
	<div class="section-content grid-container">

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

				else :

					echo esc_html( 'Sorry, no posts' );

				endif;
				?>
			</div>

		</div>
	</div>
</section>
<?php
get_footer();
