<?php
/** 
 * Single Product Page
 */
get_header(); ?>
<?php
if ( have_posts() ) :

	while ( have_posts() ) :
		the_post();

		$sectionId = 'section_1';
		$sectionClasses= '';
		include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
		include( locate_template( 'page-templates/template-parts/section-video-with-tagline.php', false, false ) ); 
		include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 

		$sectionId = 'section_2';
		$sectionClasses= 'single-block-section';
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
		$sectionClasses= '';
		include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
		?>
		<div class="section-content">
			<?php
			$sectionId = 'section_3';
			$sectionGroup = get_field($sectionId);

			$layoutTemplate = 'page-templates/template-parts/section-product-testimonial-layout-1.php';

			include( locate_template($layoutTemplate, false, false ) ); 

			?>
		</div>
		<?php	
		include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 

		$sectionId = 'section_4';
		$sectionClasses= '';
		include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
		?>
		<div class="section-content">
			<div class="grid-x" style="height: 100%">
				<div class="cell medium-6">
					<?php
					$sectionId = "section_4_column_1";
					include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
					?>
				</div>
				<div class="cell medium-6">
					<?php
					$sectionId = "section_4_column_2";
					include( locate_template( 'page-templates/template-parts/section-key-features-with-background.php', false, false ) ); 
					?>
				</div>
			</div>
		</div>
		<?php	
		include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 

		$sectionId = 'section_5';
		$sectionClasses= '';
		if( have_rows('feature_categories') ):
			include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
			?>
			<div class="section-content">
				<?php
				$sectionId = "section_5_column_1";
				$sectionClasses= 'single-block-section';
				include( locate_template( 'page-templates/template-parts/section-detailed-features-with-background.php', false, false ) ); 
				?>
			</div>
			<?php	
			include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 
		endif;

		$sectionId = 'section_6';
		$sectionClasses= 'single-block-section';
		include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
		?>
		<div class="section-content">
			<?php 
			include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
			?>
		</div>
		<?php
		include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 

	endwhile;

else :

	echo esc_html( 'Sorry, no posts' );

endif;
?>
<?php
get_footer();
