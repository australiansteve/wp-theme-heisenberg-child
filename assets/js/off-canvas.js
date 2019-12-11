
jQuery(document).on('opened.zf.offcanvas', function() {	
});

jQuery(document).on('closed.zf.offcanvas', function() {
});

jQuery(document).on('open.zf.drilldown', function() {
	console.log('submenu opened');
	jQuery(".close").css({"background-position": "right bottom", "transition": "all .5s linear"});
});

jQuery(document).on('hide.zf.drilldown', function() {
	console.log('submenu closed');
	jQuery(".close").css({"background-position": "left bottom", "transition": "all .25s linear"});
});
