<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Heisenberg
 */

get_header();

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
				<?php
				printf( '<h1>Search Results for: \'%s\'</h1>',
					esc_html( get_search_query() )
				);
				?>
			</div>
		</div>
	</div>


	<div class="grid-x grid-padding-x" id="posts">

		<?php

		if ( have_posts() ) :

			while ( have_posts() ) :

				the_post();

				echo get_template_part('template-parts/post', 'archive');

			endwhile;

		else :

			printf( 'Sorry, no results for %s',
				esc_html( get_search_query() )
			);

		endif;


		if (paginate_links()) : ?>
			<div class="navigation button-container text-center">
				<h2><?php the_field('stories_page_navigation_text', 'option')?></h2>
				<?php posts_nav_link( '<span class="button-separator"></span>', 'Previous page', 'Next page' ); ?>
			</div>
		<?php endif; ?>
	</div>
</div>
<?php
get_footer();
