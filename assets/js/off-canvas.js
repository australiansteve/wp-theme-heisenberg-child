
jQuery(document).on('opened.zf.offcanvas', function($) {
	var off_canvas_icon = jQuery(this).find('i.fa-bars').css("opacity", "0");
});

jQuery(document).on('closed.zf.offcanvas', function() {
    var off_canvas_icon = jQuery(this).find('i.fa-bars').css("opacity", "1");
});