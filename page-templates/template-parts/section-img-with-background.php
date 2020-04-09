<?php
$image = get_field($sectionId.'_image_id');
$size = get_field($sectionId.'_image_size');
$position =  get_field($sectionId.'_position');	
error_log("Image position: ".print_r($position, true));
$positionV = is_array($position) ? $position['vertical'] : 'center';
$positionH = is_array($position) ? $position['horizontal'] : 'center';
$link = get_field($sectionId.'_image_link');
?>
<div class="grid-y align-<?php echo $positionV;?> img-block <?php echo $sectionClasses;?>" id="<?php echo $sectionId;?>" style="height: 100%">
	<?php
	include( locate_template( 'page-templates/template-parts/section-background.php', false, false ) ); 
	?>
	<div class="cell shrink text-<?php echo $positionH;?>">

		<?php		 
		 if( $link ) {
		 	echo "<a href='".$link."'>";
		 }
		 ?>
		<?php		 
		 if( $image ) {
		 	echo wp_get_attachment_image( $image, $size );
		 }
		 ?>
		<?php		 
		 if( $link ) {
		 	echo "</a>";
		 }
		 ?>
	</div>
</div>