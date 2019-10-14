<script type="text/javascript">

	jQuery( document ).on('beforeslidechange.zf.orbit', function() {

		jQuery('.project:nth-of-type(odd)').each(function() {

			if (jQuery(window).width() > 1024) {
				var galleryHeight = jQuery(this).find('.project-gallery-container').outerHeight();
				jQuery(this).find('.project-detail-container').css("min-height", galleryHeight);
				
				var contentHeight = jQuery(this).find('.project-detail-container').outerHeight();
				
				var contentSideHeight = contentHeight;
				var gallerySideHeight = galleryHeight;

				if (contentSideHeight > gallerySideHeight)
				{
					var cssVal = "calc(" + contentSideHeight + "px + 9rem)";
					var ownHeightVal = "calc(" + (contentSideHeight + 150) +"px + 3rem)";
				}
				else {
					var cssVal = "calc(" + gallerySideHeight + "px + 4rem)";
					var ownHeightVal = "calc(" + (gallerySideHeight + 150) + "px + 4rem)";
				}
				jQuery(this).find('.project-container').css("height", cssVal);
				jQuery(this).css("height", ownHeightVal);
			}

		});
		jQuery('.project:nth-of-type(even)').each(function() {

			if (jQuery(window).width() > 1024) {
				var galleryHeight = jQuery(this).find('.project-gallery-container').outerHeight();
				var contentHeight = jQuery(this).find('.project-detail-container').outerHeight();
				
				var contentSideHeight = contentHeight;
				var gallerySideHeight = galleryHeight;

				if (contentSideHeight > gallerySideHeight)
				{
					var cssVal = "calc(" + (contentSideHeight) + "px + 12rem)";
					var ownHeightVal = "calc(" + (contentSideHeight + 150) + "px + 8rem)";
				}
				else {
					var cssVal = "calc(" + (gallerySideHeight + 50) + "px + 4rem)";
					var ownHeightVal = "calc(" + (gallerySideHeight + 50) + "px + 14rem)";
				}
				jQuery(this).find('.project-container').css("height", cssVal);
				jQuery(this).css("height", ownHeightVal);

			}
		});
	});

	jQuery( document ).ready(function(){
		jQuery(document).trigger('beforeslidechange.zf.orbit');
	});
</script>