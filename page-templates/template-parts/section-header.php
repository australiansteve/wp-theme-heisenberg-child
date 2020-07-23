<?php
error_log("Section settings: ".print_r($section['settings'], true));

$sectionClasses = $section['settings']['classes'];
$backgroundClasses = $section['settings']['background_classes'];
$backgroundColor = $section['settings']['background_color'];
$backgroundImage = $section['settings']['background_image'];
$backgroundImageUrl = wp_get_attachment_image_src($backgroundImage, 'full');
$backgroundCssValue = array();

if ($backgroundImage) {
	$backgroundCssValue[] = "background-image: url(".$backgroundImageUrl[0].")";
}

if ($backgroundColor) {
	$backgroundCssValue[] = "background-color: ".$backgroundColor;
}

error_log("BackgroundCssValue: ".print_r($backgroundCssValue, true));

$hAlign = $section['settings']['horizontal_alignment'];
$vAlign = $section['settings']['vertical_alignment'];

$explicitHeight = null;
if ($vAlign != 'left') {
	if (is_array($section['settings']['height'])) {
		foreach ($section['settings']['height'] as $height) :
			if ($height['acf_fc_layout'] == 'explicit_value') :
				$explicitHeight = $height['explicit_value'];
			endif;
		endforeach;
	}
}
?>

<section class="<?php echo $sectionClasses;?>" style="<?php echo ($explicitHeight) ? 'height:'.$explicitHeight: '';?>">
	<div class="section-background <?php echo $backgroundClasses;?>" style="<?php echo implode("; ", $backgroundCssValue);?>"></div>
	<div class="section-content">

		<div class="grid-y align-<?php echo $vAlign;?>" style="height: 100%">
			<div class="cell text-<?php echo $hAlign;?>">