<?php		
		$customLogo = get_field($sectionId.'_header_customization_header_logo');
		$customTextColor = get_field($sectionId.'_header_customization_text_color');
		error_log("Section text color: ". print_r($customTextColor, true));

		?>
<section id="<?php echo $sectionId;?>"  data-section="<?php global $sectionNumber; echo $sectionNumber;?>" class="<?php echo ($sectionNumber == 1) ? 'active' : '';?>">

	<div class="section-header <?php echo ($sectionNumber != 1) ? 'show-for-medium' : '';?>" style="color: <?php echo $customTextColor['text_color'];?>">
		<?php 
		$sectionNumber++;
		$defaultLogoId = get_field('default_logo', 'option');
		if ($customLogo) {
			$headerImage = wp_get_attachment_image_src( $customLogo , 'header-image' );
		}
		else {
			$headerImage = wp_get_attachment_image_src( $defaultLogoId , 'header-image' );
		}
		include( locate_template( 'page-templates/template-parts/header.php', false, false ) ); 
		?>
	</div>