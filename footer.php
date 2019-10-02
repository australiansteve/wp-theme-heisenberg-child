<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Heisenberg
 */
?>

</div> <!-- .off-canvas-content -->

</main><!-- #content -->

<div class="full-width-container footer">
	<footer class="grid-container">

		<div class="grid-x">
			<div class="medium-2 cell text-center medium-text-left" id="left-column">
				<?php
				if ( has_custom_logo() ) :
					the_custom_logo();
				endif;
				?>
			</div>
			
			<div class="medium-10 cell text-center" id="center-column">
				<ul id="footer-menu" class="vertical medium-horizontal menu">
					<?php
					wp_nav_menu( [
						'theme_location' => 'footer-main',
						'container'      => '',
						'items_wrap'	=> '%3$s'
					] ); 
					?>
				</ul>
			</div>
		</div>

		<div class="grid-x text-center">
			<div class="cell" id="footer-social">
				<ul id="social-menu" class="horizontal menu">
					<?php
					wp_nav_menu( [
						'theme_location' => 'social-media',
						'container'      => '',
						'items_wrap'	=> '%3$s'
					] ); 
					?>
				</ul>
			</div>
		</div>

	</footer>
</div>

<?php wp_footer(); ?>
</body>
</html>
