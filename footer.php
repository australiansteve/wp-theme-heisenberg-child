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

<footer class="grid-container">

	<div class="grid-x">

		<div class="medium-4 cell" id="left-column">
			Left
		</div>
		
		<div class="medium-4 cell" id="center-column">
			<a href="https://weavercrawford.com" target="blank">
				<i class="far fa-copyright"></i> <?php echo date("Y");?> Weaver Crawford Creative
			</a>
		</div>
		
		<div class="medium-4 cell" id="right-column">
			Right
		</div>

	</div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
