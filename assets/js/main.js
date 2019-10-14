import '../sass/app.scss'
import './off-canvas.js'

jQuery( document ).ready(function() {

	jQuery(document).foundation();

	if (window.location.hash) {
		//console.log("scroll to hash");
		var hash = window.location.hash;
		jQuery(hash).each(function() {
			//console.log(hash);
			jQuery('html, body').delay(1500).animate({
				scrollTop :  jQuery(hash).offset().top
			}, 1500, 'linear');
		});
	}
	
});