import '../sass/app.scss'
import './off-canvas.js'

jQuery( document ).ready(function() {

	jQuery(document).foundation();

	setTimeout(function() {
		var heightToSet = jQuery('.height-dominant-container').first().css('height') + " - 370px"; //Good for large screens, medium (iPad) sized screens could be ~340 but I haven't worked out exactly why

		jQuery('.height-restricted-container').each(function() {			
			jQuery(this).css('max-height', 'calc('+heightToSet+')');
		});
	}, 1000);
});