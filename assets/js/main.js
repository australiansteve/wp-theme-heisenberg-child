import '../sass/app.scss'
import './off-canvas.js'

jQuery( document ).ready(function() {

	jQuery(document).foundation();

	setTimeout(restrictHeightContainers, 1000);

	jQuery(window).on('resize', restrictHeightContainers);

	/* Append ' (PDF)' to the end of any pdf links */
	jQuery("a[href$='.pdf']").each(function() { 
		var linkText = jQuery(this).html();
		if (!linkText.toLowerCase().endsWith("(pdf)"))
		{
			jQuery(this).html(linkText + " (PDF)");
		}
	});

});

var restrictHeightContainers = debounce(function() {

 	var domContainer = jQuery('.height-dominant-container').first();

 	var heightToSet =  domContainer.css('height') + " - 65px - 1rem";
	jQuery('.height-restricted-container').each(function() {	

		console.log("Updating height: " + heightToSet);
 		jQuery(this).css('max-height', 'calc('+heightToSet+')');
 	});
}, 2000);

window.revealSearch = function revealSearch(id) {
	jQuery("#"+id+" .search-reveal a").each(function() {
		jQuery(this).css({"display": "none", "height": "0"});
	});
	jQuery("#"+id+" #searchForm").each(function() {
		jQuery(this).css({"height": "auto", "visibility": "visible", "opacity": "1", "transition": "opacity 1s linear"});
	});
	jQuery("#"+id+" #searchForm input").focus();
}

// Returns a function, that, as long as it continues to be invoked, will not
// be triggered. The function will be called after it stops being called for
// N milliseconds. If `immediate` is passed, trigger the function on the
// leading edge, instead of the trailing.
function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		var later = function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};
};