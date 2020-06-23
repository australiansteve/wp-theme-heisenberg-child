import '../sass/app.scss'
import './off-canvas.js'

var currentYPos = 0;
var myElement = null;
var allowCancelableEvent = false;

jQuery( document ).ready(function() {

	jQuery(document).foundation();
	
	myElement = document.getElementById("page-container");

	var mc = Hammer(myElement);
	mc.get("swipe").set({ direction: Hammer.DIRECTION_VERTICAL });
	mc.get("pan").set({ direction: Hammer.DIRECTION_VERTICAL });
	mc.on("swipe", function(ev) {
		var direction = "";
		switch (ev.direction) {
			case Hammer.DIRECTION_UP:
			//console.log("Swipe UP - that means go down!");
			scrollThrottle(ev, true);
			break;
			case Hammer.DIRECTION_DOWN:
			//console.log("Swipe DOWN - that means go up!");
			scrollThrottle(ev, false);
			break;
		}
		return false;
	});
	mc.on("pan", function(ev) {
		var direction = "";
		switch (ev.direction) {
			case Hammer.DIRECTION_UP:
			//console.log("Pan UP - that means go down!");
			scrollThrottle(ev, true);
			break;
			case Hammer.DIRECTION_DOWN:
			//console.log("Pan DOWN - that means go up!");
			scrollThrottle(ev, false);
			break;
		}
		return false;
	});

	document.onkeydown = function(ev) {
		ev = ev || window.event;
		if (ev.keyCode == "38") {
			goUp(ev);
		} else if (ev.keyCode == "40") {
			goDown(ev);
		}
	};

	myElement.addEventListener("wheel", wheelEvent);

	jQuery(document).on("click", ".home-reset-scroll", resetPagePosition);

	window.addEventListener("resize", repositionAfterResize);
	repositionAfterResize(); /* called to initially set the height. */

	window.addEventListener("resize", setQuoteImageWidth);
	setQuoteImageWidth();

	jQuery(".click-to-scroll-down a").on("click", function(event) {
		//console.log(event);
		goDown(event);
	});

	preventPullToRefresh('body');

});

var wheelEvent = function(event) {
	//console.log("wheelEvent " + event.cancelable + " " + event.timeStamp);
	//console.log(event);
	if (event.cancelable || allowCancelableEvent) {
		if (event.deltaY > 0) {
			scrollThrottle(event, true); /* go down */	
		} else {
			scrollThrottle(event, false); /* go up */
		}
	}
}

var goDown = function(event) {
	//console.log("GO DOWN " + event.type);
	//console.log(event);
	var activeSection = jQuery("section.active");
	var nextSection = jQuery("section.active + section");
	var activeFooter = jQuery("footer.active");

	var activeSectionContent = jQuery("section.active .section-content");
	var longSection = activeSectionContent.prop("scrollHeight") > window.innerHeight;

	var borderTop = parseInt(activeSection.css("border-top-width"), 10);
	var borderBottom = parseInt(activeSection.css("border-bottom-width"), 10);
	var atBottomOfSection = Math.ceil(activeSectionContent.prop("scrollTop")) >= activeSectionContent.prop("scrollHeight") - window.innerHeight + borderBottom + borderTop;

	var abosMessage =
	"ABOS: " +
	atBottomOfSection +
	": " +
	(activeSectionContent.prop("scrollHeight") -
		window.innerHeight +
		borderBottom +
		borderTop);

	var debugMessage = "MAIN height: " + jQuery("main").height();
	debugMessage += "<br/>\n" + new Date().toLocaleTimeString() + " " + event.type;
	debugMessage += "<br/>\n" +"scrollHeight: " + activeSectionContent.prop("scrollHeight");
	debugMessage += "<br/>\n" + "window.innerHeight: " + window.innerHeight;
	debugMessage += "<br/>\n" + "scrollTop: " + activeSectionContent.prop("scrollTop");
	debugMessage += "<br/>\n" + "borders: " + borderTop + ", " + borderBottom;
	debugMessage += "<br/>\n" + "ABOS: " + abosMessage;
	
	//console.log(debugMessage);
	//jQuery(".scroll-debug").html(debugMessage);

	if (longSection && !atBottomOfSection) {
		//console.log("do nothing - let the browser scroll - hide the logo and reset throttle");
		if (event.type == "click" || event.type == "keydown") {
			activeSectionContent.scrollTop(activeSectionContent.scrollTop() + 40);
		}
		jQuery("section.active .section-header img").css("opacity", "0");
		scrollThrottle.cancel();
	}
	else if (longSection && atBottomOfSection && nextSection.length > 0) {
		//console.log("at bottom of long section, and the next section is not the footer");
		currentYPos -= activeSection.outerHeight();
		jQuery(myElement).css("transform", "translateY(" + currentYPos + "px)");
		activeSection.removeClass("active");
		activeSection.css("transform", "scale(0.75, 0.75)");
		nextSection.addClass("active");
		nextSection.css("transform", "scale(1, 1)");
	}
	else if (longSection && atBottomOfSection && nextSection.length == 0 && activeFooter.length == 0) {
		//console.log("at bottom of long section, and the next section is the footer");
		var footer = jQuery("footer");
		if (footer.length > 0) {
			var footerHeight = footer.outerHeight();
			currentYPos -= footerHeight;
			jQuery(myElement).css("transform", "translateY(" + currentYPos + "px)");
			activeSection.removeClass("active");
			footer.addClass("active");
			jQuery(".click-to-scroll-down").css('opacity', '0');
		}
		else {
			//console.log("No footer to go to");
		}
	}
	else if (nextSection.length > 0) {
		//console.log("not a long section, and there is another section afterwards");
		currentYPos -= activeSection.outerHeight();
		jQuery(myElement).css("transform", "translateY(" + currentYPos + "px)");
		activeSection.removeClass("active");
		activeSection.css("transform", "scale(0.75, 0.75)");
		nextSection.addClass("active");
		nextSection.css("transform", "scale(1, 1)");
	}
	else if (activeFooter.length == 0) {
		//console.log("not a long section and the next section is the footer");
		var footer = jQuery("footer");
		if (footer.length > 0) {
			//change classes first so that footer height is accurate
			activeSection.removeClass("active");
			footer.addClass("active");

			var footerHeight = footer.outerHeight();
			currentYPos -= footerHeight;
			jQuery(myElement).css("transform", "translateY(" + currentYPos + "px)");

			jQuery(".click-to-scroll-down").css('opacity', '0');
		}
		else {
			//console.log("No footer to go to");
		}
	}	

	jQuery("body").addClass('disable-overscroll');

	if (jQuery("body.blog, body.archive.category, body.search").length)
	{
		console.log("Trigger loading of more posts!");
		jQuery(document).trigger('loadmoreposts');
	}
	//pause video if there is one playing
	var video = document.querySelector('video:not(.self-controlled)');
	if (video && !video.paused) {
		video.pause();
		jQuery(".toggle-play").addClass("paused");
	}
}

var goUp = function(event) {
	//console.log("scroll up");
	var activeSection = jQuery("section.active");
	var activeFooter = jQuery("footer.active");
	if (activeSection.length > 0) {
		var activeSectionContent = jQuery("section.active .section-content");
		var prevSection = jQuery(
			"section[data-section=" + (activeSection.attr("data-section") - 1) + "]"
			);
		var longSection = activeSectionContent.prop("scrollHeight") > window.innerHeight;
		var atTopOfSection = 0 == activeSectionContent.prop("scrollTop");
		//console.log(atTopOfSection + " " + activeSectionContent.prop("scrollTop"));

		if (prevSection.length > 0) {
			if (!longSection || atTopOfSection) {
				//console.log("Not a long section ("+!longSection+") - or we are already at the top ("+atTopOfSection+")");
				currentYPos += prevSection.outerHeight();
				jQuery(myElement).css("transform", "translateY(" + currentYPos + "px)");
				activeSection.removeClass("active");
				activeSection.css("transform", "scale(0.75, 0.75)");
				prevSection.addClass("active");
				prevSection.css("transform", "scale(1, 1)");
			}
			else if (longSection && !atTopOfSection){
				//console.log("do nothing - let the browser scroll - reset throttle at end");
				if (event.type == "click" || event.type == "keydown") {
					activeSectionContent.scrollTop(activeSectionContent.scrollTop() - 40);
				}
				scrollThrottle.cancel();
			}
			if (prevSection.attr("data-section") == 1) {
				jQuery("body").removeClass('disable-overscroll');
			}
		}
		setTimeout(showLogoIfAtTop, 500);

	}
	else if (activeFooter.length > 0) {
		var footerHeight = activeFooter.outerHeight();
		var prevSection = jQuery("section:nth-last-of-type(1)");
		currentYPos += footerHeight;
		jQuery(myElement).css("transform", "translateY(" + currentYPos + "px)");
		activeFooter.removeClass("active");
		prevSection.addClass("active");
		prevSection.css("transform", "scale(1, 1)");
		jQuery(".click-to-scroll-down").css('opacity', '1');
	}
}

var showLogoIfAtTop = function() {
	//console.log("Check if at top");
	var activeSectionContent = jQuery("section.active .section-content");
	var atTopOfSection = 0 == activeSectionContent.prop("scrollTop");
	if (atTopOfSection) {
		jQuery("section.active .section-header img").css("opacity", "1");

	}
}

const scrollThrottle = _.throttle(function(event, directionDown = true) {
	if (directionDown) {
		goDown(event);
	}
	else {
		goUp(event);
	}
	repositionAfterResize(); /* called to reset in case anything goes weird. */

}, 1750, {'leading': true, 'trailing': false });

var repositionAfterResize = _.debounce(function() {
	//console.log("Window resize. " + currentYPos);
	var activeSection = jQuery("section.active");
	var activeFooter = jQuery("footer.active");
	
	/* Reset window height first */
	jQuery("main").height(window.innerHeight);
	jQuery("section").each(function() {
		var borderTop = parseInt(jQuery(this).css("border-top-width"), 10);
		var borderBottom = parseInt(jQuery(this).css("border-bottom-width"), 10);
		jQuery(this).height(window.innerHeight - borderTop - borderBottom);
	});

	var newYpos = 0;
	if (activeSection.length > 0) {
		for (var s = 0; s < activeSection.attr("data-section"); s++) {
			var prevSection = jQuery("section[data-section=" + s + "]");

			if (prevSection.length > 0) {
				newYpos += prevSection.outerHeight();
			}
		}
	}
	else if (activeFooter.length > 0) {
		var sections = jQuery("section");
		
		for (var s = 0; s < sections.length - 1; s++) {
			//console.log(jQuery(sections[s]).outerHeight());
			newYpos += jQuery(sections[s]).outerHeight();
		}
		newYpos += activeFooter.outerHeight();
	}
	currentYPos = newYpos * -1;
	jQuery(myElement).css("transform", "translateY(" + currentYPos + "px)");
	window.focus();
}, 250);

var resetPagePosition = function() {
	//console.log("Reset scroll to top of page");
	var nthSectionNumber = jQuery(this).attr("data-section") !== undefined ? jQuery(this).attr("data-section") : 1;
	console.log("Reset to section: " + nthSectionNumber);
	var activeSection = jQuery("section.active");
	var activeFooter = jQuery("footer.active");
	var nthSection = jQuery("section:nth-of-type("+nthSectionNumber+")");
	var firstNSections = jQuery("section").slice(0, nthSectionNumber);
	console.log(firstNSections);
	currentYPos = 0;
	for(var s = 1; s < nthSectionNumber; s++) {
		currentYPos -= jQuery(firstNSections[s]).outerHeight();
	}
	console.log("ypos: " + currentYPos);
	jQuery(myElement).css("transform", "translateY(" + currentYPos + "px)");
	activeSection.removeClass("active");
	activeSection.css("transform", "scale(0.75, 0.75)");
	nthSection.addClass("active");
	nthSection.css("transform", "scale(1, 1)");
	activeFooter.removeClass("active");

	/* reset all section content to the top */
	jQuery("section .section-content").each(function(){
		this.scrollTop = 0;
	});
	window.focus();
}

function preventPullToRefresh(element) {
	var prevent = false;

	document.querySelector(element).addEventListener('touchstart', function(e){
		if (e.touches.length !== 1) { return; }

		var scrollY = jQuery("#section_1.active").length != 1 || window.pageYOffset || document.body.scrollTop || document.documentElement.scrollTop;
		prevent = (scrollY === 0);

	});

	document.querySelector(element).addEventListener('touchmove', function(e){
		if (prevent) {
			prevent = false;
			e.preventDefault();
		}
	});
}

var setQuoteImageWidth = _.debounce(function() {
	jQuery(".has-quote img").each(function() {
		if (window.innerWidth >= 1600) {
			jQuery(this).css("max-width", "min(calc((100vh - 370px) * 0.6), calc(33vw * 0.9))");
		}
		else if (window.innerWidth >= 1024) {
			jQuery(this).css("max-width", "min(calc((100vh - 330px) * 0.6), calc(33vw * 0.9))");
		}
		else if (window.innerWidth >= 640) {
			jQuery(this).css("max-width", "min(calc((100vh - 300px) * 0.6), calc(33vw * 0.9))");
		}
		else {
			jQuery(this).css("max-width", "min(calc((90vh - 345px) * 0.6), calc(100vw * 0.8))");

		}
	});
	jQuery(".home #section_5_block_3 img").each(function() {
		if (window.innerWidth >= 1600) {
			jQuery(this).css("max-width", "min(calc((100vh - 340px) * 0.6), calc(25vw * 0.9))");
		}
		else if (window.innerWidth >= 1024) {
			jQuery(this).css("max-width", "min(calc((100vh - 330px) * 0.6), calc(25vw * 0.9))");
		}
		else if (window.innerWidth >= 640) {
			jQuery(this).css("max-width", "min(calc((100vh - 375px) * 0.6), calc(25vw * 0.9))");
		}
		else {
			jQuery(this).css("max-width", "min(calc((90vh - 300px) * 0.6), calc(100vw * 0.8))");

		}
	});
}, 250);