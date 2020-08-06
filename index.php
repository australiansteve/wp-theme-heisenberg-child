<?php
get_header();

if ( have_posts() ) :

	while ( have_posts() ) :

		the_post();

		$sectionId = 'section_1';
		$sectionClasses= '';
		include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
		include( locate_template( 'page-templates/template-parts/section-video-with-tagline.php', false, false ) ); 
		include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 


		$sectionId = 'section_2';
		$sectionClasses= '';
		$customLogo = get_field($sectionId.'_header_customization_header_logo');
		include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
		?>
		<div class="section-content text-center" id="<?php echo $sectionId;?>-content">
			<?php 
				include( locate_template( 'page-templates/template-parts/section-the_content-with-background.php', false, false ) ); 
			?>
		</div>
		<?php		
		include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 

	endwhile;

else :

	echo esc_html( 'Sorry, no posts' );

endif;
get_footer();
