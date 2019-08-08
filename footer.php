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
				</div> <!-- .content-container -->
			</div><!-- #content -->
		</main><!-- .grid-container -->

		<footer class="grid-container">

			<div class="content-container">

				<div class="grid-x align-stretch">

					<div class="medium-4 cell" id="left-column">
						<?php wp_nav_menu( [
							'theme_location' => 'footer-left-menu',
							'container' => '',
							'menu_class' => 'menu vertical',
							]); 
						?>
					</div>
					
					<div class="medium-4 cell" id="center-column">
						<?php wp_nav_menu( [
							'theme_location' => 'footer-center-menu',
							'container' => '',
							'menu_class' => 'menu vertical',
							]); 
						?>
					</div>
					
					<div class="medium-4 cell" id="right-column">
						<?php the_field('footer_right_text', 'option'	); ?>
					</div>

				</div>
				<div class="grid-x">
					<div class="cell" id="logo">
						<a href="/">
<?php 

$image = get_field('footer_logo', 'option');
$size = 'site_logo'; // (thumbnail, medium, large, full or custom size)

if( $image ) {
	echo wp_get_attachment_image( $image, $size );
}

?>
						</a>
					</div>
				</div>
				<div class="grid-x">
					<div class="cell text-center" id="copyright">
						<a href="https://weavercrawford.com" target="blank">
							<i class="far fa-copyright"></i> <?php echo date("Y");?> Weaver Crawford Creative
						</a>
					</div>
				</div>
				
			</div>

		</footer>
	</div><!-- .off-canvas-wrapper -->

<?php wp_footer(); ?>
</body>
</html>
