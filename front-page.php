<?php
get_header(); ?>
<?php
if ( have_posts() ) :

	while ( have_posts() ) :
		the_post();

		$sectionId = 'section_1';
		$sectionClasses = '';
		include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
		?>

			<?php 
			include( locate_template( 'page-templates/template-parts/section-video-with-tagline.php', false, false ) ); 
			?>
		<?php		
		include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 

		/* section_2 - CTA removed */

		$sectionId = 'section_3';
		include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
		?>
			<div class="section-content">
				<div data-equalizer="product-title-equalizer" data-equalize-on="medium" style="height: 100%">
					<div class="grid-x" data-equalizer="product-description-equalizer" data-equalize-on="medium">
						<div class="cell medium-4 small-full-height">
							<div class="grid-y align-center" style="height: 100%">
								<div class="cell small-6 medium-7">
									<?php
									$sectionId="section_3_column_1_image";
									include( locate_template( 'page-templates/template-parts/section-img-with-background.php', false, false ) ); 
									?>
								</div>
								<div class="cell small-6 medium-5">
									<?php
									$sectionId="section_3_column_1";
									include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
									?>
								</div>
							</div>
						</div>
						<div class="cell medium-4 small-full-height">
							<div class="grid-y align-center" style="height: 100%">
								<div class="cell small-6 medium-7">
									<?php
									$sectionId="section_3_column_2_image";
									include( locate_template( 'page-templates/template-parts/section-img-with-background.php', false, false ) ); 
									?>
								</div>
								<div class="cell small-6 medium-5">
									<?php
									$sectionId="section_3_column_2";
									include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
									?>
								</div>
							</div>
						</div>
						<div class="cell medium-4 small-full-height">
							<div class="grid-y align-center" style="height: 100%">
								<div class="cell small-6 medium-7">
									<?php
									$sectionId="section_3_column_3_image";
									include( locate_template( 'page-templates/template-parts/section-img-with-background.php', false, false ) ); 
									?>
								</div>
								<div class="cell small-6 medium-5">
									<?php
									$sectionId="section_3_column_3";
									include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			

		<?php	
		include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 

		$sectionId = 'section_4';
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

		$sectionId = 'section_5';
		$sectionClasses = '';
		include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
		?>
			<div class="section-content">
				<div class="grid-x" style="height:100%">
					<div class="cell medium-6 small-full-height">
						<div class="grid-y" style="height:100%">
							<div class="cell small-8 medium-6">
								<?php 
								$sectionId = 'section_5_block_1';
								include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
								?>
							</div>
							<div class="cell small-4 medium-6">
								<?php 
								$sectionId = 'section_5_block_2';
								include( locate_template( 'page-templates/template-parts/section-background.php', false, false ) ); 
								?>
							</div>
						</div>
					</div>
					<div class="cell medium-3 small-full-height">
						<?php 
						$sectionId = 'section_5_block_3';
						include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
						?>
					</div>
					<div class="cell medium-3 small-full-height">
						<?php 
						$sectionId = 'section_5_block_4';
						include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
						?>
					</div>
				</div>
			</div>
		<?php	
		include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 

		$sectionId = 'section_6';
		include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
		?>
			<div class="section-content text-center" id="<?php echo $sectionId;?>-content">
				<div class="grid-x" style="height: 100%">
					<div class="cell medium-6 small-full-height">
						<?php 
						$sectionId = 'section_6_block_1';
						include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
						?>
					</div>
					<div class="cell medium-6 small-full-height">
						<?php 
						$sectionId = 'section_6_block_2';
						include( locate_template( 'page-templates/template-parts/section-background.php', false, false ) ); 
						?>
					</div>
				</div>
			</div>
		<?php	
				include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 

		$sectionId = 'section_7';
		include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
		?>
			<div class="section-content text-center" id="<?php echo $sectionId;?>-content">
				<div class="grid-x" style="height: 100%">
					<div class="cell medium-6 small-full-height">
						<div class="grid-y" style="height:100%">
							<div class="cell small-6">
								<?php 
								$sectionId = 'section_7_block_1';
								include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
								?>
							</div>
							<div class="cell small-6">
								<?php 
								$sectionId = 'section_7_block_2';
								include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
								?>
							</div>
						</div>
					</div>
					<div class="cell medium-3 small-half-height">
						<?php 
						$sectionId = 'section_7_block_3';
						include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
						?>
					</div>
					<div class="cell medium-3 small-full-height">
						<?php 
						$sectionId = 'section_7_block_4';
						include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
						?>
					</div>
				</div>
			</div>
		<?php	
				include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 

		$sectionId = 'section_8';
		include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
		?>
			<div class="section-content text-center" id="<?php echo $sectionId;?>-content">
				<div class="grid-x" style="height: 100%"">
					<div class="cell medium-6 small-half-height">
						<?php 
						$sectionId = 'section_8_block_1';
						include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
						?>
					</div>
					<div class="cell medium-6 small-half-height">
						<?php 
						$sectionId = 'section_8_block_2';
						include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
						?>
					</div>
				</div>
			</div>
		<?php	
				include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 

		$sectionId = 'section_9';
		include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
		?>
			<div class="section-content text-center" id="<?php echo $sectionId;?>-content">
				<div class="grid-x" style="height: 100%">
					<div class="cell medium-6 small-full-height">
						<?php 
						$sectionId = 'section_9_block_1';
						include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
						?>
					</div>
					<div class="cell medium-6 small-full-height">
						<?php
							$sectionId = 'section_9_block_2';
							?>
						<div class="grid-y align-center html-block" id="<?php echo $sectionId;?>">
							<?php
							include( locate_template( 'page-templates/template-parts/section-background.php', false, false ) ); 
							?>
							<div class="cell">
								<?php echo do_shortcode("[ninja_form id='".get_field($sectionId.'_contact_form_id')."']"); ?>
							</div>
						</div>
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
