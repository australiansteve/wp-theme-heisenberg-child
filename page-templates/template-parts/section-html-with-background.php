<?php
$htmlContent = get_field($sectionId.'_content');
?>
<div class="grid-y align-center" style="height: 100%;" id="<?php echo $sectionId;?>">
	<?php
		include( locate_template( 'page-templates/template-parts/section-background.php', false, false ) ); 
	?>
	<div class="cell">
		<?php echo $htmlContent; ?>
	</div>
</div>