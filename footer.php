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

	</main><!-- #content -->

	<footer>
		<div class="grid-container">

			<div class="grid-x">

				<div class="medium-4 large-5 cell" id="left-column">
		<?php 
		$image = get_field('footer_logo', 'option');
		$size = 'footer_logo_size'; // (thumbnail, medium, large, full or custom size)

		if( $image ) {
			echo wp_get_attachment_image( $image, $size );
		}
		?>
				</div>
				
				<div class="medium-4 cell" id="center-column">
					<?php wp_nav_menu( 
							array( 
								'theme_location' => 'primary', 
								'menu_class' => 'menu vertical',
								'container_class' => 'footer-menu',
								'menu_id' => 'footer-menu' 
							) 
						); 
					?>
				</div>
				
				<div class="medium-4 large-3 cell" id="right-column">
					<div class="grid-y" style="min-height: 100%">
						<div class="cell shrink medium-order-3">
					<?php wp_nav_menu( 
							array( 
								'theme_location' => 'footer-menu', 
								'menu_class' => 'menu vertical',
								'container_class' => 'secondary-footer-menu text-left',
								'menu_id' => 'secondary-footer-menu',
								'items_wrap'      => '<ul id="%1$s" class="%2$s medium-text-right">%3$s</ul>',

							) 
						); 
					?>
						</div>
						<div class="cell shrink medium-order-1">
					<?php wp_nav_menu( 
							array( 
								'theme_location' => 'social-menu', 
								'menu_class' => 'menu horizontal',
								'container_class' => 'social-menu',
								'menu_id' => 'social-menu' 
							) 
						); 
					?>
						</div>
						<div class="cell auto filler medium-order-2 show-for-medium">
						</div>
						
					</div>
				</div>

			</div>

			<div class="grid-x copyright">
				<div class="cell" id="center-column">
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
