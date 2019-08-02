<?php
/***
  * Template Name: Grants Page
  */

get_header(); ?>

<div class="content-container">
	
	<div class="grid-x grid-padding-x">
		
		<div class="small-12 medium-8 cell">

			<h1 class="page-title"><?php the_field('grants_page_title', 'option');?></h1>
			
		</div>

		<div class="small-12 medium-4 cell">

			<a href="<?php the_field('grants_page_apply_button_link', 'option');?>" class="button"><?php the_field('grants_page_apply_button_text', 'option');?></a>
			
		</div>

		<?php
		$theSubMenu = 'grants-menu';
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

