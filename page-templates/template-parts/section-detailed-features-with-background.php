<?php
$deatiledFeatures = get_field('feature_categories');
?>
<div class="grid-y align-center" style="height: 100%;">
	<?php
	include( locate_template( 'page-templates/template-parts/section-background.php', false, false ) ); 
	?>
	<div class="cell">
		<h2><?php the_title(); ?></h2>

		<?php
		if( have_rows('feature_categories') ):
			$sectionRandomNumber = rand(); 
			?>
			<script>
				jQuery( function() {
					var icons = {
						header: "ui-icon-caret-1-e",
						activeHeader: "ui-icon-caret-1-s"
					};
					jQuery( "#expandable-sections-<?php echo $sectionRandomNumber;?>" ).accordion({
						heightStyle: "content",
						collapsible: true,
						icons: icons
					});
				} );
			</script>
			<div id="expandable-sections-<?php echo $sectionRandomNumber;?>" class="expandable-sections">
				<?php
				while ( have_rows('feature_categories') ) : the_row();

					?>
					<h3><span><?php the_sub_field('category'); ?></span></h3>
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