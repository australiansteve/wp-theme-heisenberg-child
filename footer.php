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

			<div class="grid-x align-middle">
				<div class="medium-1 cell text-center medium-text-left" id="left-column">
					<?php
					if ( has_custom_logo() ) :
						$custom_logo_id = get_theme_mod( 'custom_logo' );
			$logo = wp_get_attachment_image_src( $custom_logo_id , 'medium-logo' );

			?>
			<img class="show-for-medium <?php echo $custom_logo_id;?>" src="<?php echo $logo[0];?>" height="<?php echo $logo[1];?>" width="<?php echo $logo[2];?>"/>
			<?php
					endif;
					?>
				</div>
				
				<div class="medium-11 cell text-center" id="center-column">
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
