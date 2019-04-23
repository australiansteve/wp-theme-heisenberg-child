
jQuery(document).on('opened.zf.offcanvas', function($) {
	var off_canvas_icon = jQuery(this).find('i');

    off_canvas_icon.removeClass('fa-bars').addClass('fa-times');
});

jQuery(document).on('closed.zf.offcanvas', function() {
    var off_canvas_icon = jQuery(this).find('i');

    off_canvas_icon.removeClass('fa-times').addClass('fa-bars');
});