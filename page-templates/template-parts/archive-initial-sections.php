<?php
$postCounter = 0;
$sectionId = 'section_2';
$sectionClasses = '';
include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
?>
<div class="section-content video-section">
	<div style="height:100%">
		<div class="grid-x">
			<div class="cell small-12 medium-4">
				<div class="sidebar">
					<?php get_template_part('page-templates/template-parts/sidebar'); ?>
				</div>
			</div>

			<div class="cell small-12 medium-8">
				<div class="blog-grid small-up-1 medium-up-2">

					<?php

					while ( have_posts() && ++$postCounter < 5) :
						the_post();

						/* display first 4 posts separately */
						if (has_tag('video')) {
							include(locate_template( 'page-templates/template-parts/post-archive-videos.php', false, false ));
						}
						else {
							include(locate_template( 'page-templates/template-parts/post-archive.php', false, false ));
						}
					endwhile;
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
include(locate_template( 'page-templates/template-parts/archive-video-overlay.php', false, false ));
include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 

$nextPage = 2;
$nextSectionId = 3;
if ($wp_query->post_count > 4) {
	$sectionCounter = 0;
	while ( have_posts()) :
		the_post();

		$showSectionHeader = ($postCounter % 6) - 5 == 0;
		if ($showSectionHeader) {
			include(locate_template( 'page-templates/template-parts/blog-section-header.php', false, false )); 
		}

		if (has_tag('video')) {
			include(locate_template( 'page-templates/template-parts/post-archive-videos.php', false, false ));
		}
		else {
			include(locate_template( 'page-templates/template-parts/post-archive.php', false, false ));
		}

		$sectionCounter++;
		$showSectionFooter = ($postCounter % 6) - 4 == 0;
		if ($postCounter == $wp_query->post_count && $sectionCounter < 6) {
			include(locate_template( 'page-templates/template-parts/post-archive-return.php', false, false ));
		}
		if ($showSectionFooter || $postCounter == $wp_query->post_count) {
			include(locate_template( 'page-templates/template-parts/blog-section-footer.php', false, false )); 
			$nextPage++;
			$nextSectionId++;
			$sectionCounter = 0;
		}

		$postCounter++;
	endwhile;
}
?>
<div class="next-section-placeholder" data-next-page="<?php echo $nextPage; ?>" data-next-section="<?php echo $nextSectionId; ?>"></div>