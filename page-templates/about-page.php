<?php
/** 
 * Template Name: About Page
 */
get_header(); ?>
<?php
if ( have_posts() ) :

	while ( have_posts() ) :
		the_post();

		$sectionId = 'section_1';
		$sectionClasses = '';
		include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
		include( locate_template( 'page-templates/template-parts/section-video-with-tagline.php', false, false ) );	
		include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 

		$sectionId = 'section_2';
		$sectionClasses = 'single-block-section';
		include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
		?>
		<div class="section-content text-center" id="<?php echo $sectionId;?>-content">
			<?php 
			include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
			?>
		</div>
		<?php		
		include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 
		
		$sectionId = 'section_3';
		$sectionClasses = '';
		include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
		?>
		<div class="section-content">
			<div class="grid-x" style="height: 100%">
				<div class="cell medium-6 large-3 small-half-height medium-full-height">
					<?php
					$sectionId = "section_3_column_1";
					include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
					?>
				</div>
				<div class="cell medium-6 large-3 small-half-height medium-full-height">
					<?php
					$sectionId = "section_3_column_2";
					include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
					?>
				</div>
				<div class="cell medium-6 large-3 small-half-height medium-full-height">
					<?php
					$sectionId = "section_3_column_3";
					include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
					?>
				</div>
				<div class="cell medium-6 large-3 small-half-height medium-full-height">
					<?php
					$sectionId = "section_3_column_4";
					include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
					?>
				</div>
			</div>
		</div>
		<?php		
		include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 

		$sectionId = 'section_4';
		include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
		?>
		<div class="section-content">
			<div class="grid-x" style="height: 100%">
				<div class="cell medium-6 large-3 small-half-height medium-full-height">
					<?php
					$sectionId = "section_4_column_1";
					include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
					?>
				</div>
				<div class="cell medium-6 large-3 small-half-height medium-full-height">
					<?php
					$sectionId = "section_4_column_2";
					include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
					?>
				</div>
				<div class="cell medium-6 large-3 small-half-height medium-full-height">
					<?php
					$sectionId = "section_4_column_3";
					include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
					?>
				</div>
				<div class="cell medium-6 large-3 small-half-height medium-full-height">
					<?php
					$sectionId = "section_4_column_4";
					include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
					?>
				</div>
			</div>
		</div>
		<?php		
		include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 
		
		$sectionId = 'section_5';
		$sectionClasses = 'single-block-section';
		include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
		?>
		<div class="section-content text-center" id="<?php echo $sectionId;?>-content">
			<?php 
			include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
			?>
		</div>
		<?php		
		include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 

		?>
		<script type="text/javascript">
			function resizeProfiles() {
				var resize = window.innerWidth > 640;
				jQuery("#section_3, #section_4").each(function() {
					var maxHeight = 0;
					var htmlBlocks = jQuery(this).find(".html-block .profile-resizer")
					htmlBlocks.each(function() {
						jQuery(this).css("height", "unset"); /* clear previous resizes */
						
						if (jQuery(this).innerHeight() > maxHeight){
							maxHeight = jQuery(this).innerHeight();
						}
						
					});
					if (resize) {
						htmlBlocks.each(function() {
							jQuery(this).innerHeight(maxHeight);
						});
						console.log("Max Height: " + maxHeight);
					}
				});
			}
			jQuery(document).ready(function() {
				setTimeout(resizeProfiles, 1000);
				
			});
			window.addEventListener("resize", function() {
				setTimeout(resizeProfiles, 1000);
			});

		</script>
		<?php
	endwhile;

	the_posts_navigation();

else :

	echo esc_html( 'Sorry, no posts' );

endif;
?>
<?php
get_footer();
