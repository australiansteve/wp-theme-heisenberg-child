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
		$customLogo = get_field($sectionId.'_header_customization_header_logo');
		include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
		include( locate_template( 'page-templates/template-parts/section-video-with-tagline.php', false, false ) );	
		include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 

		$sectionId = 'section_2';
		$sectionClasses = 'single-block-section';
		$customLogo = get_field($sectionId.'_header_customization_header_logo');
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
		$customLogo = get_field($sectionId.'_header_customization_header_logo');
		include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
		?>
		<div class="section-content">
			<div class="grid-x" style="height: 100%">
				<div class="cell medium-6 large-3 small-half-height">
					<?php
					$sectionId = "section_3_column_1";
					include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
					?>
				</div>
				<div class="cell medium-6 large-3 small-half-height">
					<?php
					$sectionId = "section_3_column_2";
					include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
					?>
				</div>
				<div class="cell medium-6 large-3 small-half-height">
					<?php
					$sectionId = "section_3_column_3";
					include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
					?>
				</div>
				<div class="cell medium-6 large-3 small-half-height">
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
		$customLogo = get_field($sectionId.'_header_customization_header_logo');
		include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
		?>
		<div class="section-content">
			<div class="grid-x" style="height: 100%">
				<div class="cell medium-6 large-3">
					<?php
					$sectionId = "section_4_column_1";
					include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
					?>
				</div>
				<div class="cell medium-4 large-3">
					<?php
					$sectionId = "section_4_column_2";
					include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
					?>
				</div>
				<div class="cell medium-4 large-3">
					<?php
					$sectionId = "section_4_column_3";
					include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
					?>
				</div>
				<div class="cell medium-4 large-3">
					<?php
					$sectionId = "section_4_column_4";
					include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
					?>
				</div>
			</div>
		</div>
		<?php		
		include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 

	endwhile;

	the_posts_navigation();

else :

	echo esc_html( 'Sorry, no posts' );

endif;
?>
<?php
get_footer();
