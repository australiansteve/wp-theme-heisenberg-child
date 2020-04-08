import '../sass/app.scss'
import './off-canvas.js'

var currentYPos = 0;
var myElement = null;
var downLock = false;

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
			console.log("Swipe UP - that means go down!");
			scrollThrottle(ev, true);
			break;
			case Hammer.DIRECTION_DOWN:
			console.log("Swipe DOWN - that means go up!");
			scrollThrottle(ev, false);
			break;
		}
		return false;
	});
	mc.on("pan", function(ev) {
		var direction = "";
		switch (ev.direction) {
			case Hammer.DIRECTION_UP:
			console.log("Pan UP - that means go down!");
			scrollThrottle(ev, true);
			break;
			case Hammer.DIRECTION_DOWN:
			console.log("Pan DOWN - that means go up!");
			scrollThrottle(ev, false);
			break;
		}
		return false;
	});

	myElement.onwheel = function(ev) {
		console.log("On wheel");
		if (ev.deltaY > 0) {
			scrollThrottle(ev, true); /* go down */	
		} else {
			scrollThrottle(ev, false); /* go up */
		}
	}

	document.onkeydown = function(ev) {
		ev = ev || window.event;
		if (ev.keyCode == "38") {
			goUp(ev);
		} else if (ev.keyCode == "40") {
			goDown(ev);
		}
	};

	window.addEventListener("resize", repositionAfterResize);

	jQuery(".home-reset-scroll").on("click", resetPagePosition);

	repositionAfterResize(); /* called to initially set the height. */
	insertClickToScrollDownButtons();
});

var goDown = function(event) {
	console.log("go down " + event.type);
	console.log(event);
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
		console.log("do nothing - let the browser scroll");
		if (event.type == "click" || event.type == "keydown") {
			activeSectionContent.scrollTop(activeSectionContent.scrollTop() + 40);
		}
	}
	else if (longSection && atBottomOfSection && nextSection.length > 0) {
		console.log("at bottom of long section, and the next section is not the footer");
		currentYPos -= activeSection.outerHeight();
		jQuery(myElement).css("transform", "translateY(" + currentYPos + "px)");
		activeSection.removeClass("active");
		activeSection.css("transform", "scale(0.75, 0.75)");
		nextSection.addClass("active");
		nextSection.css("transform", "scale(1, 1)");
	}
	else if (longSection && atBottomOfSection && nextSection.length == 0 && activeFooter.length == 0) {
		console.log("at bottom of long section, and the next section is the footer");
		var footer = jQuery("footer");
		var footerHeight = footer.outerHeight();
		currentYPos -= footerHeight;
		jQuery(myElement).css("transform", "translateY(" + currentYPos + "px)");
		activeSection.removeClass("active");
		footer.addClass("active");
		jQuery(".click-to-scroll-down").css('opacity', '0');
	}
	else if (nextSection.length > 0) {
		console.log("not a long section, an there is another section afterwards");
		currentYPos -= activeSection.outerHeight();
		jQuery(myElement).css("transform", "translateY(" + currentYPos + "px)");
		activeSection.removeClass("active");
		activeSection.css("transform", "scale(0.75, 0.75)");
		nextSection.addClass("active");
		nextSection.css("transform", "scale(1, 1)");
	}
	else if (activeFooter.length == 0) {
		console.log("not a long section and the next section is the footer");
		var footer = jQuery("footer");
		//change classes first so that footer height is accurate
		activeSection.removeClass("active");
		footer.addClass("active");

		var footerHeight = footer.outerHeight();
		currentYPos -= footerHeight;
		jQuery(myElement).css("transform", "translateY(" + currentYPos + "px)");

		jQuery(".click-to-scroll-down").css('opacity', '0');
	}	

	jQuery("body").addClass('disable-overscroll');

	//pause video if there is one playing
	var video = document.querySelector('video');
	if (video) {
		video.pause();
		jQuery(".toggle-play").addClass("paused");
	}

}

var goUp = function(event) {
	console.log("scroll up");
	var activeSection = jQuery("section.active");
	var activeFooter = jQuery("footer.active");
	if (activeSection.length > 0) {
		var activeSectionContent = jQuery("section.active .section-content");
		var prevSection = jQuery(
			"section[data-section=" + (activeSection.attr("data-section") - 1) + "]"
			);
		if (prevSection.length > 0) {
			var longSection = activeSectionContent.prop("scrollHeight") > window.innerHeight;
			var atTopOfSection = 0 == activeSectionContent.prop("scrollTop");
			console.log(atTopOfSection + " " + activeSectionContent.prop("scrollTop"));
			if (!longSection || atTopOfSection) {
				currentYPos += prevSection.outerHeight();
				jQuery(myElement).css("transform", "translateY(" + currentYPos + "px)");
				activeSection.removeClass("active");
				activeSection.css("transform", "scale(0.75, 0.75)");
				prevSection.addClass("active");
				prevSection.css("transform", "scale(1, 1)");
			}
			else if (longSection && !atTopOfSection){
				console.log("do nothing - let the browser scroll");
				if (event.type == "click" || event.type == "keydown") {
					activeSectionContent.scrollTop(activeSectionContent.scrollTop() - 40);
				}
			}
			if (prevSection.attr("data-section") == 1) {
				jQuery("body").removeClass('disable-overscroll');
			}
		}
	}
	else if (activeFooter.length > 0) {
		console.log(activeFooter.outerHeight());
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
	console.log("Window resize. " + currentYPos);
	var activeSection = jQuery("section.active");
	var activeFooter = jQuery("footer.active");
	var borderTop = parseInt(activeSection.css("border-top-width"), 10);
	var borderBottom = parseInt(activeSection.css("border-bottom-width"), 10);
	/* Reset window height first */
	jQuery("main").height(window.innerHeight);
	jQuery("section").height(window.innerHeight - borderTop - borderBottom);
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
			console.log(jQuery(sections[s]).outerHeight());
			newYpos += jQuery(sections[s]).outerHeight();
		}
		newYpos += activeFooter.outerHeight();
	}
	currentYPos = newYpos * -1;
	jQuery(myElement).css("transform", "translateY(" + currentYPos + "px)");
	window.focus();
}, 250);

var resetPagePosition = function() {
	console.log("Reset scroll to top of page");
	currentYPos = 0;
	jQuery(myElement).css("transform", "translateY(" + currentYPos + "px)");
	var activeSection = jQuery("section.active");
	var activeFooter = jQuery("footer.active");
	var firstSection = jQuery("section:nth-of-type(1)");
	activeSection.removeClass("active");
	activeSection.css("transform", "scale(0.75, 0.75)");
	firstSection.addClass("active");
	firstSection.css("transform", "scale(1, 1)");
	activeFooter.removeClass("active");

	/* reset all section content to the top */
	jQuery("section .section-content").each(function(){
		this.scrollTop = 0;
	});
	window.focus();
}

var insertClickToScrollDownButtons = function() {
	jQuery(".section-content").each(function() {

		//var string = "<div class="click-to-scroll-down"><a title=\"Scroll down\" href=\"#\"><i class=\"fas fa-chevron-down\"></i></a></div>";
		//jQuery(this).append(string);
	});
	jQuery(".click-to-scroll-down a").on("click", function(event) {
		console.log(event);
		goDown(event);
	});
}