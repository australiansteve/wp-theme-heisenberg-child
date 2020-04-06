<?php
get_header(); 

$sectionId = 'section_1';
$sectionClasses = '';
include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
?>
<div class="section-content">
	<div data-equalizer="product-title-equalizer" data-equalize-on="medium" style="height:100%">
		<div class="grid-x" data-equalizer="product-description-equalizer" data-equalize-on="medium">
			<?php
			if ( have_posts() ) :

				while ( have_posts() ) :

					the_post();
					?>
					<div class="cell medium-4 small-full-height">

						<div class="grid-y align-center" style="height: 100%">
							<div class="cell small-6 medium-7">
								<?php
								$sectionId="section_2_archive";
								include( locate_template( 'page-templates/template-parts/section-img-with-background.php', false, false ) ); 
								?>
							</div>
							<div class="cell small-6 medium-5">
								<?php
								$sectionId="section_1_archive";
								include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
								?>
							</div>
						</div>

					</div>
					<?php

				endwhile;

				the_posts_navigation();

			else :

				echo esc_html( 'Sorry, no posts' );

			endif;
			?>

		</div>
	</div>
</div>
<?php
include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 

get_footer();
