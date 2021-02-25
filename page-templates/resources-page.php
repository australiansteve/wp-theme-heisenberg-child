<?php
/***
  * Template Name: Resources Page
  */

get_header(); ?>

<div class="container">

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

					<?php 
					//Show menu for Toolkit (FR and EN) pages because these aren't linked to from the menus, and might be hard to understand where you're at otherwise
					if(strpos($_SERVER['REQUEST_URI'], '/toolkit/') !== false || strpos($_SERVER['REQUEST_URI'], '/trousse/') !== false) :
						the_title('<h1>', '</h1>');
					endif;
					?>
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

