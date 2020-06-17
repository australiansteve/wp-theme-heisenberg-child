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

<footer class="grid-container">

	<div class="grid-x">

		<div class="medium-2 cell" id="left-column">
			<?php 
			$image = get_field('footer_logo', 'option');
			$size = 'footer_logo'; // (thumbnail, medium, large, full or custom size)
			
			if( $image ) {
				echo wp_get_attachment_image( $image, $size );
			}
			?>
		</div>
		
		<div class="medium-8 cell" id="center-column">
			<div class="" id="menu-container">
				<?php wp_nav_menu( array( 'theme_location' => 'footer-menu-1'  ) ); ?>
				<div class="medium-text-left">
					<?php wp_nav_menu( array( 'theme_location' => 'footer-menu-2' ) ); ?>
				</div>
			</div>
			
		</div>
		
		<div class="medium-2 cell" id="right-column">
			<a class="button" href="<?php the_field('footer_login_button_link', 'option');?>"><?php the_field('footer_login_button_text', 'option');?></a>
		</div>

	</div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
