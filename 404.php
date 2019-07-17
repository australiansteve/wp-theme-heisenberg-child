<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Heisenberg
 */

get_header(); ?>

	<div class="grid-x grid-padding-x page-title">
		<div class="small-12 cell">

			<div class="page-title-container">
				<h1>Page not found</h1>
			</div>
		</div>
	</div>
			

	<div class="grid-x grid-padding-x page-content">

		<div class="small-12 medium-9 medium-offset-3 cell">

			<p>It looks like nothing was found at this location.</p>

			<p><a class="button" href="<?php echo esc_url( home_url( '/' ));?>">Return to homepage</a></p>
			
		</div>

	</div>

<?php
get_footer();
