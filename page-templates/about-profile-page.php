<?php
/***
  * Template Name: About Page - With Profiles
  */

get_header(); ?>

<div class="content-container">
	
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
					<div class="small-12 cell" id="profiles">
						<?php
						// check if the repeater field has rows of data
						if( have_rows('board_members') ):

		 					// loop through the rows of data
							while ( have_rows('board_members') ) : the_row();

								get_template_part( 'template-parts/profile' ); 

							endwhile;

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
</div>

<?php
get_footer();

