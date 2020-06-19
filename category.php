<?php
get_header(); 

$sectionId = 'section_1';
$sectionClasses= '';
include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
include( locate_template( 'page-templates/template-parts/section-video-with-tagline.php', false, false ) ); 
include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 

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
					$ajax_nonce = wp_create_nonce( "blog-page-posts" );
					if ( have_posts() ) :

						while ( have_posts() ) :
							the_post();
							
							if (has_tag('video')) {
								include(locate_template( 'page-templates/template-parts/post-archive-videos.php', false, false ));
							}
							else {
								include(locate_template( 'page-templates/template-parts/post-archive.php', false, false ));
							}

						endwhile;

					else :

						echo esc_html( 'Sorry, no posts' );

					endif;

					?>
				</div>
			</div>
		</div>
		<?php include(locate_template( 'page-templates/template-parts/archive-video-overlay.php', false, false )); ?>
	</div>
</div>
<?php
include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 
?>
<div class="next-section-placeholder" data-next-page="2"></div>
<script type="text/javascript">
	var ajaxLock = false;
	jQuery(document).on('loadmoreposts', function() {
		var pageToLoad = jQuery(".next-section-placeholder").attr('data-next-page');
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
					category: '<?php echo get_queried_object()->term_id; ?>',
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
						ajaxLock = false;
					}
					else {
						console.log("Empty response");
						jQuery(".next-section-placeholder").attr('data-next-page', '0')
					}
				}
			});
		}

	});
</script>
<?php include(locate_template( 'page-templates/template-parts/archive-video-javascript.php', false, false )); ?>
<?php
get_footer();
