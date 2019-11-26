import '../sass/app.scss'
import './off-canvas.js'

var target = window.location.hash,
    target = target.replace('#', '');

// delete hash so the page won't scroll to it
window.location.hash = "";

jQuery( document ).ready(function() {

	jQuery(document).foundation();

	if (target) {

		//delay scroll by a couple of seconds to allow for page content to load, such as sliders
		setTimeout(function() {
	        jQuery('html, body').animate({
	            scrollTop: jQuery("#" + target).offset().top
	        }, 1500, 'swing', function () {
	        	//add hash back for bookmarking purposes
	        	window.location.hash = target;
	        });
	    }, 2000);
    }

});
