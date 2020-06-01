<?php
$backgroundColor = get_field($sectionId.'_color');
$imageId = get_field($sectionId.'_image');

$size = 'full';

$bgValue = "";
$bgSizeValue = "unset";
$bgSizeSmallValue = "unset";
$bgImageClasses = "";
$bgPosition = "unset";

if( $imageId ) {
	$bgValue = "url(".wp_get_attachment_image_src( $imageId, $size )[0].")";
	error_log($sectionId. " has background image");
	$imageProps = get_field($sectionId.'_background_image_properties');
	error_log("Background Image properties: ".print_r($imageProps, true));
	
	if (is_array($imageProps)) {
		$imageSize = $imageProps['image_size'];
		$imagePosition = $imageProps['image_position'];
		$imageRepeat = $imageProps['image_repeat'];

		switch($imageSize) {
			case 'percentage' :
			$bgSizeValue = $imageProps['image_size_pc'];
			error_log("bgSizeValue: ".print_r($bgSizeValue, true));
			if ($bgSizeValue) {
				$width = $bgSizeValue['width']['percentage'];
				$height = $bgSizeValue['height']['percentage'];
				switch($width) {
					case "10" :
					$bgImageClasses .= ' background-image-pc-w-10';
					break;
					case "20" :
					$bgImageClasses .= ' background-image-pc-w-20';
					break;
					case "30" :
					$bgImageClasses .= ' background-image-pc-w-30';
					break;
					case "40" :
					$bgImageClasses .= ' background-image-pc-w-40';
					break;
					case "50" :
					$bgImageClasses .= ' background-image-pc-w-50';
					break;
					case "60" :
					$bgImageClasses .= ' background-image-pc-w-60';
					break;
					case "70" :
					$bgImageClasses .= ' background-image-pc-w-70';
					break;
					case "80" :
					$bgImageClasses .= ' background-image-pc-w-80';
					break;
					case "90" :
					$bgImageClasses .= ' background-image-pc-w-90';
					break;
					case "100" :
					$bgImageClasses .= ' background-image-pc-w-100';
					break;
					default :
					break;
				}
				switch($height) {
					case "10" :
					$bgImageClasses .= ' background-image-pc-h-10';
					break;
					case "20" :
					$bgImageClasses .= ' background-image-pc-h-20';
					break;
					case "30" :
					$bgImageClasses .= ' background-image-pc-h-30';
					break;
					case "40" :
					$bgImageClasses .= ' background-image-pc-h-40';
					break;
					case "50" :
					$bgImageClasses .= ' background-image-pc-h-50';
					break;
					case "60" :
					$bgImageClasses .= ' background-image-pc-h-60';
					break;
					case "70" :
					$bgImageClasses .= ' background-image-pc-h-70';
					break;
					case "80" :
					$bgImageClasses .= ' background-image-pc-h-80';
					break;
					case "90" :
					$bgImageClasses .= ' background-image-pc-h-90';
					break;
					case "100" :
					$bgImageClasses .= ' background-image-pc-h-100';
					break;
					default :
					break;
				}
			}
			break;
			case 'cover' :
			$bgImageClasses .= ' background-image-size-cover';
			break;
			case 'contain' :
			$bgImageClasses .= ' background-image-size-contain';
			break;
			default :
			$bgSizeValue = $imageSize;
			break;
		}

		switch($imageRepeat) {
			case 'repeat' :
			$bgImageClasses .= ' background-image-repeat';
			break;
			case 'repeat-x' :
			$bgImageClasses .= ' background-image-repeat-x';
			break;
			case 'repeat-y' :
			$bgImageClasses .= ' background-image-repeat-y';
			break;
			default :
			$bgImageClasses .= ' background-image-no-repeat';
			break;
		}

		error_log("Position: ".print_r($imagePosition, true));
		$verticalPosition = 'top';
		if ($imagePosition) {
			switch ($imagePosition['vertical']) {
				case 'left' :
				$verticalPosition = 'top';
				break;
				case 'center' :
				$verticalPosition = 'center';
				break;
				case 'right' :
				$verticalPosition = 'bottom';
				break;
			}
			$bgPosition = $imagePosition['horizontal'].' '.$verticalPosition;
		}
	}

	$imagePropsSmall = get_field($sectionId.'_background_image_properties_small');
	error_log("Background Image properties (small): ".print_r($imagePropsSmall, true));

	if (is_array($imagePropsSmall)) {

		$imageSizeSmall = $imagePropsSmall['image_size_small'];
		$imageRepeatSmall =  $imagePropsSmall['image_repeat_small'];

		switch($imageSizeSmall) {
			case 'percentage' :
			$bgSizeSmallValue = $imagePropsSmall['image_size_pc_small'];

			$width = $bgSizeSmallValue['width']['percentage'];
			$height = $bgSizeSmallValue['height']['percentage'];
			switch($width) {
				case "10" :
				$bgImageClasses .= ' background-image-small-pc-w-10';
				break;
				case "20" :
				$bgImageClasses .= ' background-image-small-pc-w-20';
				break;
				case "30" :
				$bgImageClasses .= ' background-image-small-pc-w-30';
				break;
				case "40" :
				$bgImageClasses .= ' background-image-small-pc-w-40';
				break;
				case "50" :
				$bgImageClasses .= ' background-image-small-pc-w-50';
				break;
				case "60" :
				$bgImageClasses .= ' background-image-small-pc-w-60';
				break;
				case "70" :
				$bgImageClasses .= ' background-image-small-pc-w-70';
				break;
				case "80" :
				$bgImageClasses .= ' background-image-small-pc-w-80';
				break;
				case "90" :
				$bgImageClasses .= ' background-image-small-pc-w-90';
				break;
				case "100" :
				$bgImageClasses .= ' background-image-small-pc-w-100';
				break;
				default :
				break;
			}

			switch($height) {
				case "10" :
				$bgImageClasses .= ' background-image-small-pc-h-10';
				break;
				case "20" :
				$bgImageClasses .= ' background-image-small-pc-h-20';
				break;
				case "30" :
				$bgImageClasses .= ' background-image-small-pc-h-30';
				break;
				case "40" :
				$bgImageClasses .= ' background-image-small-pc-h-40';
				break;
				case "50" :
				$bgImageClasses .= ' background-image-small-pc-h-50';
				break;
				case "60" :
				$bgImageClasses .= ' background-image-small-pc-h-60';
				break;
				case "70" :
				$bgImageClasses .= ' background-image-small-pc-h-70';
				break;
				case "80" :
				$bgImageClasses .= ' background-image-small-pc-h-80';
				break;
				case "90" :
				$bgImageClasses .= ' background-image-small-pc-h-90';
				break;
				case "100" :
				$bgImageClasses .= ' background-image-small-pc-h-100';
				break;
				default :
				break;
			}
			break;
			case 'cover' :
			$bgImageClasses .= ' background-image-small-size-cover';
			break;
			case 'contain' :
			$bgImageClasses .= ' background-image-small-size-contain';
			break;
			default :
			$bgSizeSmallValue = $imageSizeSmall;
			break;
		}

		switch($imageRepeatSmall) {
			case 'repeat' :
			$bgImageClasses .= ' background-image-small-repeat';
			break;
			case 'repeat-x' :
			$bgImageClasses .= ' background-image-small-repeat-x';
			break;
			case 'repeat-y' :
			$bgImageClasses .= ' background-image-small-repeat-y';
			break;
			default :
			$bgImageClasses .= ' background-image-small-no-repeat';
			break;
		}
	}

}
$bgValue .= $backgroundColor && $bgValue ? ", ".$backgroundColor : $backgroundColor ? $backgroundColor : "";

?>
<div class="background-div <?php echo $bgImageClasses;?>" style="height: 100%; background: <?php echo $bgValue;?> <?php if( $imageId ) { ?>; background-position: <?php echo $bgPosition ?><?php } ?>;">	
</div>
<?php

?>