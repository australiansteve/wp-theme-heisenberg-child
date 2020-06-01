<?php
$htmlContent = get_field($sectionId.'_content');
$textColor =  get_field($sectionId.'_text_color');
$textColor = is_array($textColor) ? $textColor[0] : $textColor; /* Default value comes back in an array */
$textPosition =  get_field($sectionId.'_text_position');	
error_log($sectionId);
error_log("Text position: ".print_r($textPosition, true));
$textPosition = is_array($textPosition) ? $textPosition['vertical'] : 'center';
?>
<div class="grid-y align-<?php echo $textPosition;?> html-block <?php echo $sectionClasses;?>" id="<?php echo $sectionId;?>">
	<?php
	include( locate_template( 'page-templates/template-parts/section-background.php', false, false ) ); 
	?>
	<div class="cell" style="<?php if ($textColor) { echo 'color: '.$textColor; } ?>">
		<?php echo $htmlContent; ?>
	</div>
</div>