<?php
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
						<div class="cell medium-4">
							<?php
							$sectionId = "section_3_column_1";
							include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
							?>
						</div>
						<div class="cell medium-4">
							<?php
							$sectionId = "section_3_column_2";
							include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
							?>
						</div>
						<div class="cell medium-4">
							<?php
							$sectionId = "section_3_column_3";
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
			<div class="section-content text-center" id="<?php echo $sectionId;?>-content">
				<div class="border">
					<?php 
					include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
					?>
				</div>
			</div>
		</section>
		<?php	
		$sectionId = 'section_5';
		?>
		<section id="<?php echo $sectionId;?>" data-section="<?php global $sectionNumber; echo $sectionNumber++;?>">
			<div class="section-content">
				<div class="border">
					<div class="grid-x" style="height: 100%">
						<div class="cell medium-6">
							<div class="grid-y" style="height: 100%">
								<div class="cell medium-6">
									<?php
									$sectionId = "section_5_block_1";
									include( locate_template( 'page-templates/template-parts/section-background.php', false, false ) ); 
									?>
								</div>
								<div class="cell medium-6">
									<div class="grid-x" style="height: 100%">
										<div class="cell medium-6">
											<?php
											$sectionId = "section_5_block_2";
											include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
											?>
										</div>
										<div class="cell medium-6">
											<?php
											$sectionId = "section_5_block_3";
											include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="cell medium-3">
							<?php
							$sectionId = "section_5_block_4";
							include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
							?>
						</div>
						<div class="cell medium-3">
							<?php
							$sectionId = "section_5_block_5";
							include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
							?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php	
		$sectionId = 'section_6';
		?>
		<section id="<?php echo $sectionId;?>" data-section="<?php global $sectionNumber; echo $sectionNumber++;?>">
			<div class="section-content text-center" id="<?php echo $sectionId;?>-content">
				<div class="border">
					<div class="grid-x">
						<div class="cell medium-6">
							<?php 
							$sectionId = 'section_6_block_1';
							include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
							?>
						</div>
						<div class="cell medium-6">
							<?php 
							$sectionId = 'section_6_block_2';
							include( locate_template( 'page-templates/template-parts/section-background.php', false, false ) ); 
							?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php	
		$sectionId = 'section_7';
		?>
		<section id="<?php echo $sectionId;?>" data-section="<?php global $sectionNumber; echo $sectionNumber++;?>">
			<div class="section-content text-center" id="<?php echo $sectionId;?>-content">
				<div class="border">
					<div class="grid-x">
						<div class="cell medium-6">
							<div class="grid-y">
								<div class="cell medium-6">
									<?php 
									$sectionId = 'section_7_block_1';
									include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
									?>
								</div>
								<div class="cell medium-6">
									<?php 
									$sectionId = 'section_7_block_2';
									include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
									?>
								</div>
							</div>
						</div>
						<div class="cell medium-3">
							<?php 
							$sectionId = 'section_7_block_3';
							include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
							?>
						</div>
						<div class="cell medium-3">
							<?php 
							$sectionId = 'section_7_block_4';
							include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
							?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php	
		$sectionId = 'section_8';
		?>
		<section id="<?php echo $sectionId;?>" data-section="<?php global $sectionNumber; echo $sectionNumber++;?>">
			<div class="section-content text-center" id="<?php echo $sectionId;?>-content">
				<div class="border">
					<div class="grid-x">
						<div class="cell medium-6">
							<?php 
							$sectionId = 'section_8_block_1';
							include( locate_template( 'page-templates/template-parts/section-background.php', false, false ) ); 
							?>
						</div>
						<div class="cell medium-6">
							<?php 
							$sectionId = 'section_8_block_2';
							include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
							?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php	
		$sectionId = 'section_9';
		?>
		<section id="<?php echo $sectionId;?>" data-section="<?php global $sectionNumber; echo $sectionNumber++;?>">
			<div class="section-content text-center" id="<?php echo $sectionId;?>-content">
				<div class="border">
					<div class="grid-x">
						<div class="cell medium-6">
							<?php 
							$sectionId = 'section_9_block_1';
							include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
							?>
						</div>
						<div class="cell medium-6">
							<?php 
							$sectionId = 'section_9_block_2';
							include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
							?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php

	endwhile;

	the_posts_navigation();

else :

	echo esc_html( 'Sorry, no posts' );

endif;
?>
<?php
get_footer();
