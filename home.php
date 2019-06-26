<?php
/** 
 * Template Name: Team page
 */

get_header(); 

if ( have_posts() ) :

		$image = get_field('page_title_background_image', 'option');
		if ($image):
?>
	<div class="background-div page-title-background" style="background-image:url(<?php echo $image['url'];?>)">
	</div>

<?php 
		endif; 
		?>

	<div class="page-content">

		<div class="grid-x grid-padding-x page-title">
			<div class="small-12 cell">

				<div class="page-title-container">
					<h1><?php the_field('stories_page_heading', 'option')?></h1>
				</div>

			</div>
		</div>

		<div class="grid-x grid-padding-x page-content" id="posts">
		<?php

	while ( have_posts() ) :

		the_post();
?>


<?php

		echo get_template_part('template-parts/post', 'archive');

?>
<?php


	endwhile;
	?>
		</div>
	</div>

	<?php if (paginate_links()) : ?>
	<div class="navigation button-container text-center">
		<h2><?php the_field('stories_page_navigation_text', 'option')?></h2>
		<?php posts_nav_link( '<span class="button-separator"></span>', 'Previous page', 'Next page' ); ?>
	</div>
	<?php endif; ?>
	<?php

else :

	echo esc_html( 'Sorry, no posts' );

endif;
get_footer();
