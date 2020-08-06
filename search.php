<?php
get_header(); 

global $nextSectionId;
$sectionId = 'section_1';
$sectionClasses= '';
include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
include( locate_template( 'page-templates/template-parts/section-video-with-tagline.php', false, false ) ); 
include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 

$ajax_nonce = wp_create_nonce( "blog-page-posts" );
if ( have_posts() ) :
	include(locate_template('page-templates/template-parts/archive-initial-sections.php', false, false));
	?>
	<script type="text/javascript">
		var ajaxLock = false;
		jQuery(document).on('loadmoreposts', function() {
			var pageToLoad = jQuery(".next-section-placeholder").attr('data-next-page');
			var nextSection = jQuery(".next-section-placeholder").attr('data-next-section');
			if (pageToLoad > 0 && !ajaxLock) {
				ajaxLock = true;
				jQuery.ajax({
					type: 'POST',
					url: '<?php echo admin_url('admin-ajax.php');?>',
					dataType: "html",  
					data: { 
						action : 'austeve_get_posts', 
						security: '<?php echo $ajax_nonce; ?>', 
						page: pageToLoad,
						search: '<?php echo get_search_query();?>',
						nextSection: <?php global $sectionNumber; echo $sectionNumber++?>,
					},
					error: function (xhr, status, error) {
						console.log("Error: " + error);
						jQuery(".next-section-placeholder").attr('data-next-page', '0')
					},
					success: function( response ) {
						if (response) {
							jQuery( '.next-section-placeholder' ).before( response ); 
							jQuery(".next-section-placeholder").attr('data-next-page', ++pageToLoad);
							jQuery(".next-section-placeholder").attr('data-next-section', ++nextSection);
							ajaxLock = false;
						}
						else {
							//console.log("Empty response");
							jQuery(".next-section-placeholder").attr('data-next-page', '0')
						}
					}
				});
			}

		});
	</script>
	<?php 
	include(locate_template( 'page-templates/template-parts/archive-video-javascript.php', false, false ));

else :
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
					<div class="grid-y align-center text-center" id="no-posts">
						<?php the_field('no_search_results_message', 'option');?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	include(locate_template( 'page-templates/template-parts/blog-section-footer.php', false, false ));
endif;

get_footer();
