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
						nextSection: nextSection,
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
		jQuery(document).trigger('loadmoreposts'); //trigger once when page loads to load another section
	</script>
	<?php 
	include(locate_template( 'page-templates/template-parts/archive-video-javascript.php', false, false ));

endif;
?>
<?php
get_footer();
