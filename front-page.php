<?php
get_header(); ?>

<?php
if ( have_posts() ) :

	while ( have_posts() ) :

		the_post();

		$sectionId = 'landing';
		$section = get_field($sectionId);

		if ($section) {
			include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
			?>
			<h1><?php echo $section['headline'];?></h1>
			<?php
			include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 
		}
		
	endwhile;

endif;
?>

<?php
get_footer();
