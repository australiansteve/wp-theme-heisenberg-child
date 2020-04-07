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

<footer>
	<?php
	$footerSettings = get_field('footer_settings', 'option');
	error_log("Footer Settings: ".print_r($footerSettings, true));
	?>
	<div class="grid-x">

		<div class="cell text-center">
			<div class="background-div" style="height: 100%; background: <?php echo $footerSettings['background']['color'];?>">	
			</div>

			<div id="back-to-top" class="show-for-small-only" style="color: <?php echo $footerSettings['text']['text_color']; ?>">
				<a href="#" class="home-reset-scroll"><?php echo $footerSettings['back_to_top_text']; ?></a>
			</div>

			<?php
			if ($footerSettings['logo']) {
				?>
				<div id="footer-logo">
					<?php echo wp_get_attachment_image( $footerSettings['logo'], 'footer-logo' ); ?>
				</div>
				<?php
			}

			?>
			<div id="footer-content" style="color: <?php echo $footerSettings['text']['text_color']; ?>">
				<?php echo $footerSettings['text']['content']; ?>
			</div>
			<!--<a id="wcc-copyright" href="https://weavercrawford.com" target="blank">
				Website by Weaver Crawford Creative
			</a>-->
		</div>

	</div>

</footer>

</div> <!-- #page-container -->
</div> <!-- .off-canvas-content -->

</main><!-- #content -->

<?php wp_footer(); ?>
</body>
</html>
