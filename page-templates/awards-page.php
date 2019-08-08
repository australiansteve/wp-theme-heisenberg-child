<?php
/***
  * Template Name: Awards Page
  */

get_header(); ?>

<div class="container">

	<div class="grid-x grid-padding-x">

		<div class="small-12 cell">

			<h1 class="page-title"><?php the_field('awards_page_title', 'option');?></h1>

		</div>

		<?php
		$theSubMenu = 'awards-menu';
		get_template_part( 'template-parts/sub-menu' ); 

		if ( have_posts() ) :

			while ( have_posts() ) :

				the_post();
				?>
				<div class="small-12 cell" id="the-content">

					<?php the_content(); ?>

				</div>

				<div class="small-12 cell" id="awards">
					<?php
					// check if the repeater field has rows of data
					if( have_rows('recipient') ):

		 				// loop through the rows of data
						while ( have_rows('recipient') ) : the_row();

							get_template_part( 'template-parts/award-recipient' ); 

						endwhile;

					endif;
					?>
				</div>

				<?php
			endwhile;

		endif;
		?>
	</div>
</div>

<?php
get_footer();

