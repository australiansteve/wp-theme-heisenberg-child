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
		?>
		<section class="active" id="<?php echo $sectionId;?>" data-section="<?php global $sectionNumber; echo $sectionNumber++;?>">

			<?php 
			include( locate_template( 'page-templates/template-parts/section-video-with-tagline.php', false, false ) ); 
			?>

		</section>
		<?php		
		$sectionId = 'section_2';
		?>
		<section id="<?php echo $sectionId;?>" data-section="<?php global $sectionNumber; echo $sectionNumber++;?>">
			<div class="section-content text-center" id="<?php echo $sectionId;?>-content">
				<div class="border">
					<?php 
					include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
					?>
				</div>
			</div>
		</section>
		<?php		
		$sectionId = 'section_3';
		?>
		<section id="<?php echo $sectionId;?>" data-section="<?php global $sectionNumber; echo $sectionNumber++;?>">
			<div class="section-content">
				<div class="border">
					<div class="grid-x" style="height: 100%">
						<div class="cell medium-6 large-3">
							<?php
							$sectionId = "section_3_column_1";
							include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
							?>
						</div>
						<div class="cell medium-6 large-3">
							<?php
							$sectionId = "section_3_column_2";
							include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
							?>
						</div>
						<div class="cell medium-6 large-3">
							<?php
							$sectionId = "section_3_column_3";
							include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
							?>
						</div>
						<div class="cell medium-6 large-3">
							<?php
							$sectionId = "section_3_column_4";
							include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
							?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php	
		$sectionId = 'section_4';
		?>
		<section id="<?php echo $sectionId;?>" data-section="<?php global $sectionNumber; echo $sectionNumber++;?>">
			<div class="section-content">
				<div class="border">
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
			</div>
		</section>

		<?php	
		$sectionId = 'section_5';
		?>
		<section id="<?php echo $sectionId;?>" data-section="<?php global $sectionNumber; echo $sectionNumber++;?>">
			<div class="section-content">
				<div class="border">
					<?php
							$sectionId = "section_5_column_1";
							include( locate_template( 'page-templates/template-parts/section-detailed-features-with-background.php', false, false ) ); 
							?>
				</div>
			</div>
		</section>

		<?php	
		$sectionId = 'section_6';
		?>
		<section id="<?php echo $sectionId;?>" data-section="<?php global $sectionNumber; echo $sectionNumber++;?>">
			<div class="section-content">
				<div class="border">
					<?php 
					include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
					?>
				</div>
			</div>
		</section>
		<?php
	endwhile;

else :

	echo esc_html( 'Sorry, no posts' );

endif;
?>
<?php
get_footer();
