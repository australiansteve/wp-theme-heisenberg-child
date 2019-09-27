import '../sass/app.scss'
import './off-canvas.js'

jQuery( document ).ready(function() {

	jQuery(document).foundation();

	setTimeout(function() {
		var domContainer = jQuery('.height-dominant-container').first();
		var heightToSet = domContainer.css('height') + " - 370px"; //Good for large screens, medium (iPad) sized screens could be ~340 but I haven't worked out exactly why
		jQuery('.height-restricted-container').each(function() {	

			if (domContainer.height() < 400)
			{
				jQuery(this).css('min-height', '500px');
			}

			jQuery(this).css('max-height', 'calc('+heightToSet+')');
		});
	}, 1000);

	/* Append ' (PDF)' to the end of any pdf links */
	jQuery("a[href$='.pdf']").each(function() { 
		var linkText = jQuery(this).html();
		if (!linkText.toLowerCase().endsWith("(pdf)"))
		{
			jQuery(this).html(linkText + " (PDF)");
		}
	});

});

window.revealSearch = function revealSearch(id) {
	jQuery("#"+id+" .search-reveal a").each(function() {
		jQuery(this).css({"display": "none", "height": "0"});
	});
	jQuery("#"+id+" #searchForm").each(function() {
		jQuery(this).css({"height": "auto", "visibility": "visible", "opacity": "1", "transition": "opacity 1s linear"});
	});
	jQuery("#"+id+" #searchForm input").focus();
}