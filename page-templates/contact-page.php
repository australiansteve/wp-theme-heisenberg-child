<?php
/** 
 * Template Name: Contact Page
 */
get_header(); ?>
<?php
if ( have_posts() ) :

	while ( have_posts() ) :
		the_post();

		$sectionId = 'section_1';
		?>
		<section class="active" id="<?php echo $sectionId;?>" data-section="<?php global $sectionNumber; echo $sectionNumber++;?>">

			<div class="section-content text-center" id="<?php echo $sectionId;?>-content">
				<div class="border">
					<div class="grid-x">
						<div class="cell medium-6">
							<?php 
							$sectionId = 'section_1_column_1';
							include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
							?>
						</div>
						<div class="cell medium-6">
							<div class="grid-y align-center" style="height: 100%;" id="<?php echo $sectionId;?>">
								<?php
								$sectionId = 'section_1_column_2';
								include( locate_template( 'page-templates/template-parts/section-background.php', false, false ) ); 
								?>
								<div class="cell">
									<?php echo do_shortcode("[ninja_form id='".get_field($sectionId.'_contact_form_id')."']"); ?>
								</div>
							</div>
						</div>
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
