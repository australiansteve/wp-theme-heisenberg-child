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
							<div class="show-for-medium">
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

						<div class="medium-4 cell" id="center-column">
							<ul class="menu vertical">
								<?php wp_nav_menu( [
									'theme_location' => 'footer-center-menu',
									'container' => '',
									'items_wrap' 		=> '%3$s',
								]); 
								?>
								<li>
									<span class="mailing-list"><a href="#" data-open="mailchimpSignupModal"><?php the_field('mailing_list_text', 'option')?></a></span>
								</li>
								<li>
									<span class="account-login"><a href="<?php the_field('account_login_link', 'option')?>"><?php the_field('account_login_text', 'option')?></a></span>
								</li>
							</ul>
						</div>

						<div class="medium-4 cell" id="right-column">
							<?php the_field('footer_right_text', 'option'	); ?>

							<?php
							wp_nav_menu( [
								'theme_location' => 'social-media-menu',
								'menu_class' => 'menu horizontal align-center show-for-small-only',
								'menu_id' => 'social-media-menu' ,
								'items_wrap' => '<div id="%1$s" class="%2$s">%3$s</div>'
							] ); 
							?>
							<?php
							wp_nav_menu( [
								'theme_location' => 'social-media-menu',
								'menu_class' => 'menu horizontal show-for-medium',
								'menu_id' => 'social-media-menu' ,
								'items_wrap' => '<div id="%1$s" class="%2$s">%3$s</div>'
							] ); 
							?>

							<?php echo get_template_part('template-parts/search-bar'); ?>

						</div>

					</div>

					<div class="grid-x">
						<div class="cell show-for-small-only" id="logo">
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
