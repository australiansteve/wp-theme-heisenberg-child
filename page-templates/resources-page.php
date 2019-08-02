<?php
/***
  * Template Name: Resources Page
  */

get_header(); ?>

<div class="content-container">
	
	<div class="grid-x grid-padding-x">

		<div class="small-12 cell">

			<h1 class="page-title"><?php the_field('resources_page_title', 'option');?></h1>
			
		</div>

		<?php
		$theSubMenu = 'resources-menu';
		get_template_part( 'template-parts/sub-menu' ); 

		if ( have_posts() ) :

			while ( have_posts() ) :

				the_post();
				?>
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

