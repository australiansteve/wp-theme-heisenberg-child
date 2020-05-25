<?php
$pageId = is_home() || is_search() || is_post_type_archive('category') ? get_option( 'page_for_posts' ) : get_the_id();
$customLogo = get_field($sectionId.'_header_customization_header_logo', $pageId);
$customTextColor = get_field($sectionId.'_header_customization_text_color', $pageId);
?>
<section id="<?php echo $sectionId;?>"  data-section="<?php global $sectionNumber; echo $sectionNumber;?>" class="<?php echo ($sectionNumber == 1) ? 'active' : '';?>">

	<div class="section-header" style="color: <?php echo $customTextColor['text_color'];?>">
		<?php 
		$defaultLogoId = get_field('default_logo', 'option');
		if ($customLogo) {
			$headerImage = wp_get_attachment_image_src( $customLogo , 'header-image' );
		}
		else {
			$headerImage = wp_get_attachment_image_src( $defaultLogoId , 'header-image' );
		}
		include( locate_template( 'page-templates/template-parts/header.php', false, false ) ); 
		$sectionNumber++;
		?>
	</div>