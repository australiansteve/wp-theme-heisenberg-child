<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Heisenberg
 */

get_header(); ?>

<div class="container">

	<div class="grid-x grid-padding-x">

		<div class="small-12 cell">

			<?php the_field('404_page_not_found', 'option');?>
			
		</div>

	</div>

</div>

<?php
get_footer();
