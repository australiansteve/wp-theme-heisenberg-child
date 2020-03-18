<?php
$backgroundColor = get_field($sectionId.'_color');
$imageId = get_field($sectionId.'_image');
$imageSize = get_field($sectionId.'_image_size');
$imagePosition = get_field($sectionId.'_image_position');
$imageRepeat = get_field($sectionId.'_image_repeat');
$size = 'full';

$bgValue = "";
$bgSizeValue = "unset";

if( $imageId ) {
	$bgValue = "url(".wp_get_attachment_image_src( $imageId, $size )[0].")";

	switch($imageSize) {
		case 'length' :
		$bgSizeValue = get_field($sectionId.'_image_size_px');
		break;
		case 'percentage' :
		$bgSizeValue = get_field($sectionId.'_image_size_pc');
		break;
		default :
		$bgSizeValue = $imageSize;
		break;
	}
}
$bgValue .= $backgroundColor && $bgValue ? ", ".$backgroundColor : $backgroundColor ? $backgroundColor : "";

?>
<div class="background-div" style="height: 100%; background: <?php echo $bgValue;?>; background-size: <?php echo $bgSizeValue;?>;background-repeat: <?php echo $imageRepeat;?>; background-position: <?php echo $imagePosition;?>;">	
</div>
<?php

?>