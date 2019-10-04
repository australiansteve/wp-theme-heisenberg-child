<?php
get_header(); ?>

<script type="text/javascript">

	jQuery( document ).on('beforeslidechange.zf.orbit', function() {
		jQuery('.project:nth-of-type(odd)').each(function() {
			var galleryHeight = jQuery(this).find('.project-gallery-container').outerHeight();
			jQuery(this).find('.project-detail-container').css("min-height", galleryHeight);
			
			var contentHeight = jQuery(this).find('.project-detail-container').outerHeight();
			var actionHeight = jQuery(this).find('.project-action-container').outerHeight();
			
			var contentSideHeight = contentHeight + 150;
			var gallerySideHeight = galleryHeight + actionHeight + 50;

			if (contentSideHeight > gallerySideHeight)
			{
				var cssVal = "calc(" + contentSideHeight + "px + 2rem)";
			}
			else {
				var cssVal = "calc(" + gallerySideHeight + "px + 4rem)";
			}
			jQuery(this).find('.project-container').css("height", cssVal);

		});
		jQuery('.project:nth-of-type(even)').each(function() {
			var galleryHeight = jQuery(this).find('.project-gallery-container').outerHeight();
			var contentHeight = jQuery(this).find('.project-detail-container').outerHeight();
			var actionHeight = jQuery(this).find('.project-action-container').outerHeight();
			
			var contentSideHeight = contentHeight + 150;
			var gallerySideHeight = galleryHeight + actionHeight + 50;

			if (contentSideHeight > gallerySideHeight)
			{
				var cssVal = "calc(" + contentSideHeight + "px + 2rem)";
			}
			else {
				var cssVal = "calc(" + gallerySideHeight + "px + 4rem)";
			}
			jQuery(this).find('.project-container').css("height", cssVal);

		});
	});

	jQuery( document ).ready(function(){
		jQuery(document).trigger('beforeslidechange.zf.orbit');
	});
</script>

<main class="grid-container">

	<div class="grid-x grid-padding-x">

		<div class="small-12 cell">
			<?php
			if( have_posts() ):

				while( have_posts() ):

					the_post();

					echo get_template_part('page-templates/template-parts/project', 'archive');

				endwhile;

				the_posts_navigation();

				if( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			else :

				echo esc_html( 'Sorry, no posts' );

			endif;
			?>
		</div>

	</div>
</main>
<?php
get_footer();
