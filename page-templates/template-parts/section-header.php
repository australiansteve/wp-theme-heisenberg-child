<?php
		$customTextColor = get_field($sectionId.'_header_customization_text_color');
		error_log("Section text color: ". print_r($customTextColor, true));

		?>
<section id="<?php echo $sectionId;?>"  data-section="<?php global $sectionNumber; echo $sectionNumber;?>" class="<?php echo ($sectionNumber == 1) ? 'active' : '';?>">

	<div class="section-header <?php echo ($sectionNumber != 1) ? 'show-for-medium' : '';?>" style="color: <?php echo $customTextColor['text_color'];?>">
		<?php 
		$sectionNumber++;
		$defaultLogoId = get_theme_mod( 'custom_logo' );
		if ($customLogo) {
			$headerImage = wp_get_attachment_image_src( $customLogo , 'full' );
		}
		else {
			$headerImage = wp_get_attachment_image_src( $defaultLogoId , 'full' );
		}
		include( locate_template( 'page-templates/template-parts/header.php', false, false ) ); 
		?>
	</div>