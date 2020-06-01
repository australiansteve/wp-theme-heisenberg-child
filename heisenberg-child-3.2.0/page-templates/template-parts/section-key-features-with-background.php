<?php
$keyFeatures = get_field('key_features');
$icon = get_field('icon');
$hoverIcon = get_field('hover_icon');
$hoverTextColor = get_field('hover_text_text_color');
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
			while ( have_rows('key_features') ) : the_row();

				$image = get_sub_field('image');
				$size = 'full'; // (thumbnail, medium, large, full or custom size)
				?>
				<div class="feature" data-image="url(<?php echo wp_get_attachment_image_src(get_sub_field('image'), $size )[0];?>)" data-active-text-color="<?php echo $hoverTextColor;?>" onmouseover="highlightText(this, true)" onmouseout="highlightText(this, false)">
					<div class="grid-x">
						<div class="cell small-3 medium-1 text-right medium-text-center icon">
							<div class="normal"><?php echo wp_get_attachment_image( $icon, $size ); ?></div>
							<div class="highlight"><?php echo wp_get_attachment_image( $hoverIcon, $size ); ?></div>
						</div>

						<div class="cell small-9 medium-11 feature-detail" style="color: <?php echo $textColor;?>">
							<h4><?php the_sub_field('feature_name');?></h4>
							<div class="description"><p><?php the_sub_field('description');?></p></div>
						</div>
					</div>
					<div style="display: none" class="feature-image">
						<img src="<?php echo wp_get_attachment_image_src(get_sub_field('image'), $size )[0];?>"/>
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

					if (!$(this).hasClass("active")) {
						var content = $(this).find(".feature-image").html();
						$("#section_4_column_1.img-block .cell").css("opacity", "0");
						setTimeout(function() {
							$("#section_4_column_1.img-block .cell").html(content);
						}, 500)
						setTimeout(function() {
							$("#section_4_column_1.img-block .cell").css('opacity', '1');	
						}, 500)
						
						/* reset previous active feature text color */
						$('.feature.active h4').css('color', '');
						$('.feature.active .description').css('color', '');
						$('.feature').removeClass("active");

						var color = $(this).attr('data-active-text-color');
						var colorClass = getColorClass(color);

						/*set new active section text color*/
						$(this).addClass("active " + colorClass);
						$(this).find("h4").css('color', color);
						$(this).find(".description").css('color', color);

						/* gently scroll to top of section - useful for mobile */
						jQuery("section.active .section-content").animate({
							scrollTop: 0
						}, 1500);

					}
				});

				$(".feature").first().trigger('click');
			});

			function highlightText(element, isIn) {
				var color = jQuery(element).attr('data-active-text-color');
				colorClass = getColorClass(color);

				if (isIn)
					jQuery(element).find("h4").addClass(colorClass);
				else
					jQuery(element).find("h4").removeClass(colorClass);
			}

			function getColorClass(rgbValue)
			{
				var colorClass = "";
				switch (rgbValue) {
					case '#FFFFFF':
					colorClass= 'white';
					break;
					case '#123C91':
					colorClass= 'blue';
					break;
					case '#B4D0E5':
					colorClass= 'sky-blue';
					break;
					case '#FFE800':
					colorClass= 'yellow';
					break;
					case '#C01717':
					colorClass= 'cayenne';
					break;
					case '#3DB4A9':
					colorClass= 'teal';
					break;
					case '#F6F5F1':
					colorClass= 'bone';
					break;
					case '#3E3F45':
					colorClass= 'faded-tshirt';
					break;
					case '#F89886':
					colorClass= 'salmon';
					break;
					case '#F8CFBE':
					colorClass= 'blush';
					break;
					case '#A18730':
					colorClass= 'gold';
					break;
					case '#265A55':
					colorClass= 'emarld-green';
					break;
					case '#E4E4E4':
					colorClass= 'light-grey';
					break;
					case '#BBF4EE':
					colorClass= 'mint';
					break;
					case '#FFFBCE':
					colorClass= 'butter';
					break;
					default:
					colorClass= 'black';
					break;
				}
				return colorClass;
			}
		</script>
	</div>
</div>