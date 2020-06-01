<?php
$deatiledFeatures = get_field('feature_categories');
?>
<div class="grid-y align-left <?php echo $sectionClasses;?>" id="<?php echo $sectionId;?>">
	<?php
	include( locate_template( 'page-templates/template-parts/section-background.php', false, false ) ); 
	?>
	<div class="cell">
		<h2><?php the_field('feature_categories_section_title'); ?></h2>

		<?php
		if( have_rows('feature_categories') ):
			$sectionRandomNumber = rand(); 
			?>
			<script>
				jQuery( function() {
					
					jQuery( "#expandable-sections-<?php echo $sectionRandomNumber;?>" ).accordion({
						heightStyle: "content",
						collapsible: true,
						icons: false
					});
				} );
			</script>
			<div id="expandable-sections-<?php echo $sectionRandomNumber;?>" class="expandable-sections">
				<?php
				$categoryCounter = 1;
				while ( have_rows('feature_categories') ) : the_row();

					?>
					<h3><span><?php echo str_pad($categoryCounter++, 2, '0', STR_PAD_LEFT);?>.</span> <?php the_sub_field('category'); ?></h3>
					<div>
						<table>
							<?php
							if( have_rows('features') ):
								while ( have_rows('features') ) : the_row();

									?>
									<tr>
										<td class="show-for-medium">
										</td>
										<td>
											<?php the_sub_field('feature'); ?>
										</td>
									</tr>

									<?php
								endwhile;
							endif;

							?>
						</table>						
					</div>
					<?php

				endwhile;
				?>
			</div>
			<?php

		endif;
		?>
	</div>
</div>