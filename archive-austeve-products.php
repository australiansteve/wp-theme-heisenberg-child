<?php
get_header(); 

$sectionId = 'section_1';
		$sectionClasses = '';
		$customLogo = get_field($sectionId.'_header_customization_header_logo');
		include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
		?>
	<div class="section-content">
		<div data-equalizer="product-title-equalizer" data-equalize-on="medium" style="height:100%">
			<div class="grid-x" data-equalizer="product-description-equalizer" data-equalize-on="medium">
				<?php
				if ( have_posts() ) :

					while ( have_posts() ) :

						the_post();
						$sectionId="section_1";
						$htmlContent = get_field($sectionId.'_content');
						$textColor =  get_field($sectionId.'_text_color');
						$textColor = is_array($textColor) ? $textColor[0] : $textColor; /* Default value comes back in an array */
						$textPosition =  get_field($sectionId.'_text_position');	
						error_log($sectionId);
						error_log("Text position: ".print_r($textPosition, true));
						$textPosition = is_array($textPosition) ? $textPosition['vertical'] : 'center';

						?>
						<div class="cell medium-4 small-full-height" id="<?php echo $sectionId;?>">
							
							<div class="grid-y align-<?php echo $textPosition;?> html-block <?php echo $sectionClasses;?>" >
								<?php
								include( locate_template( 'page-templates/template-parts/section-background.php', false, false ) ); 
								?>
								<div class="cell" style="<?php if ($textColor) { echo 'color: '.$textColor; } ?>">
									<?php echo $htmlContent; ?>
								</div>
							</div>

						</div>
						<?php

					endwhile;

					the_posts_navigation();

				else :

					echo esc_html( 'Sorry, no posts' );

				endif;
				?>

			</div>
		</div>
	</div>
<?php
		include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 

get_footer();
