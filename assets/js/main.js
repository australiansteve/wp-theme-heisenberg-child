import '../sass/app.scss'
import './off-canvas.js'

jQuery( document ).ready(function() {
	jQuery(document).foundation();

	if (jQuery('header').width() >= 640 ){
		setTimeout(function() {
			//resize margin-top of featured team page so that it looks good on all screen sizes
			var smallHeight = jQuery(".size-team_homepage_size")[0].height;
			console.log("Small:" + smallHeight);
			jQuery(".size-team_homepage_size_bigger").each(function() {
				var thisHeight = this.height;
				console.log("Big:" + thisHeight);

				jQuery(this).css('margin-top', 'calc(' + smallHeight + 'px - ' + thisHeight + 'px)');
			});
		}, 1000);
	}
});