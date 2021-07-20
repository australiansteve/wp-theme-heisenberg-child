<?php
/***
  * Template Name: About Page - With Reports
  */

get_header(); ?>

<div class="container">

	<div class="grid-x grid-padding-x">

		<div class="small-12 cell">

			<h1 class="page-title"><?php the_field('about_page_title', 'option');?></h1>

		</div>

		<?php
		$theSubMenu = 'about-menu';
		get_template_part( 'template-parts/sub-menu' ); 

		if ( have_posts() ) :

			while ( have_posts() ) :

				the_post();

				?>
				<div class="small-12 cell" id="reports">
					<?php
					// check if the repeater field has rows of data
					if( have_rows('reports') ):
						?>
						<div class="grid-x grid-padding-x">
							<?php
		 					// loop through the rows of data
							while ( have_rows('reports') ) : the_row();

								get_template_part( 'template-parts/report', (get_row_index() == 1 ? 'featured' : '') ); 

							endwhile;
							?>
						</div>
						<?php
					endif;
					?>
				</div>

				<div class="small-12 cell" id="the-content">

					<?php the_content(); ?>

				</div>
				<?php
			endwhile;

		endif;

		?>
	</div>
</div>

<?php
get_footer();

