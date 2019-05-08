<?php
/***
  * Template Name: About Page
  */

get_header(); ?>

	<div class="content-container">
	
		<div class="grid-x grid-padding-x">
			
			<div class="small-12 cell">

				<h1>About</h1>
			
			</div>

<?php
if ( have_posts() ) :

	while ( have_posts() ) :

		the_post();
		$theSubMenu = 'about-menu';
		get_template_part( 'template-parts/sub-menu' ); 
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

