
jQuery(document).on('opened.zf.offcanvas', function() {
	var off_canvas_icon = jQuery(this).find('i.fa-bars');

    off_canvas_icon.removeClass('fa-bars').addClass('fa-times');
});

jQuery(document).on('closed.zf.offcanvas', function() {
    var off_canvas_icon = jQuery(this).find('i.fa-times');

    off_canvas_icon.removeClass('fa-times').addClass('fa-bars');
});

jQuery(document).on('open.zf.drilldown', function() {
	console.log('submenu opened');
	jQuery(".close").css({"background-position": "right bottom", "transition": "all .5s linear"});
});

jQuery(document).on('hide.zf.drilldown', function() {
	console.log('submenu closed');
	jQuery(".close").css({"background-position": "left bottom", "transition": "all .25s linear"});
});
