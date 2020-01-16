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

<?php echo get_template_part('page-templates/template-parts/mailchimp', 'modal'); ?>

</main><!-- #content -->

<footer class="grid-container">

	<div class="grid-x">

		<div class="medium-4 cell text-center medium-text-left" id="left-column">
			
		</div>
		
		<div class="medium-4 cell text-center" id="center-column">
			<div class="hand-logo">
				<?php
				$size = 'full'; /* Must be 'full to support animated gif */
				if (get_field('off_canvas_logo')){
					$image = get_field('off_canvas_logo');
				}
				else {
					$size ='hand-logo';
					$theme_locations = get_nav_menu_locations();
					$menu_obj = get_term( $theme_locations['primary'], 'nav_menu' );
					$image = get_field('default_off_canvas_logo', 'nav_menu_'.$menu_obj->term_id);
				}

				if ($image) {
					?>
					<a href="<?php echo home_url('/');?>" rel="home"><?php echo wp_get_attachment_image( $image, $size )?></a>
					<?php 
				} 
				?>
			</div>
		</div>
		
		<div class="medium-4 cell text-center medium-text-right" id="right-column">
			
		</div>

	</div>

	<div class="grid-x site-credit">
		<div class="cell text-center">
			<a href="https://weavercrawford.com" target="blank">
				<i class="far fa-copyright"></i> <?php echo date("Y");?> Weaver Crawford Creative
			</a>
		</div>
	</div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
