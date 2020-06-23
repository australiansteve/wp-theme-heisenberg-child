<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Heisenberg
 */

get_header(); 

$sectionId = '404_page';
$sectionClasses = 'single-block-section';
$customLogo = get_field($sectionId.'_header_customization_header_logo', 'option');
$customTextColor = get_field($sectionId.'_header_customization_text_color', 'option');

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
	<?php
	$htmlContent = get_field($sectionId.'_content', 'option');
	$backgroundColor = get_field($sectionId.'_color', 'option');

	$textColor =  get_field($sectionId.'_text_color', 'option');
	$textColor = is_array($textColor) ? $textColor[0] : $textColor; /* Default value comes back in an array */
	?>
	<div class="section-content text-center" id="<?php echo $sectionId;?>-content">

		<div class="grid-y align-center html-block <?php echo $sectionClasses;?>" id="<?php echo $sectionId;?>" style="height: 100%">
			<div class="background-div" style="height: 100%; background: <?php echo $backgroundColor;?>;">	
			</div>
			<div class="cell" style="<?php if ($textColor) { echo 'color: '.$textColor; } ?>">
				<?php echo $htmlContent; ?>
			</div>
		</div>
	</div>

</section>


<?php
get_footer();
