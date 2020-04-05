<?php
$keyFeatures = get_field('key_features');
$icon = get_field('icon');
$textColor =  get_field($sectionId.'_text_color');
error_log("Text color for ".get_the_title().": ".$textColor);
?>
<div class="grid-y align-center" id="<?php echo $sectionId;?>">
	<?php
	include( locate_template( 'page-templates/template-parts/section-background.php', false, false ) ); 
	?>
	<div class="cell">
		
		<div class="feature-container">
			<?php
			$featureCounter = 0;
			while ( have_rows('key_features') ) : the_row();

				$image = get_sub_field('image');
				$size = 'full'; // (thumbnail, medium, large, full or custom size)
				
				?>
				<div class="feature" data-image="url(<?php echo wp_get_attachment_image_src(get_sub_field('image'), $size )[0];?>)">
					<div class="grid-x">
						<div class="cell small-3 medium-2 large-1 text-center icon">
							<?php
								echo wp_get_attachment_image( $icon, $size );
							?>
						</div>

						<div class="cell small-9 medium-10 large-11 feature-detail" style="color: <?php echo $textColor;?>">
							<h4><?php the_sub_field('feature_name');?></h4>
							<p><?php the_sub_field('description');?>
						</div>
					</div>
				</div>
				<?php 

			endwhile;
			reset_rows();
			?>
		</div>

		<script type="text/javascript">

			jQuery(document).ready(function($) {
				$('.feature').on('click', function(e) {
					e.preventDefault();

					$("#section_4_column_1 .background-div").css('background-image', $(this).attr('data-image'));
				});
			});
		</script>
	</div>
</div>