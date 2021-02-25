<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Heisenberg
 */

get_header();
?>

<div class="container">

	<?php if ( function_exists('yoast_breadcrumb') ):
		yoast_breadcrumb('<p id="breadcrumbs">','</p>');
	endif; ?>

	<?php printf( '<h1>Search Results for: %s</h1>',
		esc_html( get_search_query() )
	);?>

		<?php
		if ( have_posts() ) :

			while ( have_posts() ) :

				the_post();

				get_template_part( 'template-parts/post', 'archive' ); 

			endwhile;

		else :

			printf( 'Sorry, no results for %s',
				esc_html( get_search_query() )
			);

		endif;
		?>

	<?php if (paginate_links()) : ?>
		<div class="navigation button-container text-center">
			<h2><?php the_field('navigation_title_text', 'option');?></h2>
			<?php posts_nav_link( '<span class="button-separator"></span>', get_field('navigation_previous_page_text', 'option'), get_field('navigation_next_page_text', 'option') ); ?>
		</div>
	<?php endif; ?>

</div>

<?php
get_footer();
