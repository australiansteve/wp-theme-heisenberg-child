<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Heisenberg
 */

get_header(); ?>

	<div class="grid-x grid-padding-x">

		<div class="small-12 cell">

			<h1>Oops! That page can't be found.</h1>

			<p>It looks like nothing was found at this location.</p>

			<p><a href="<?php echo esc_url( home_url( '/' ));?>">Return to homepage</a></p>
			
		</div>

	</div>

<?php
get_footer();
