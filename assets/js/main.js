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
	mc.on("swipe", function(ev) {
		var direction = "";
		switch (ev.direction) {
			case Hammer.DIRECTION_UP:
			console.log("Swipe UP");
			goDown();
			break;
			case Hammer.DIRECTION_DOWN:
			console.log("Swipe DOWN");
			goUp();
			break;
		}
		return false;
	});

	myElement.onwheel = function(ev) {
		console.log("On wheel");
		if (ev.deltaY > 0) {
			goDown();  	
		} else {
			goUp();
		}
	};

	document.onkeydown = function(ev) {
		ev = ev || window.event;
		if (ev.keyCode == "38") {
			goUp();
		} else if (ev.keyCode == "40") {
			goDown();
		}
	};

	window.addEventListener("resize", repositionAfterResize);

});

function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this,
		args = arguments;
		var later = function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};
}


var goDown = debounce(function() {
	console.log("scroll down");
	var activeSection = jQuery("section.active");
	var nextSection = jQuery("section.active + section");

	if (nextSection.length > 0) {
		var activeSectionContent = jQuery("section.active .section-content");
		var longSection = activeSectionContent.outerHeight() > window.innerHeight;
		var atBottomOfSection = activeSectionContent.prop("scrollTop") == activeSectionContent.outerHeight() - window.innerHeight;
		console.log("scrollHeight: " + activeSectionContent.outerHeight());
		console.log("window.innerHeight: " + window.innerHeight);
		console.log("ABOS: " + atBottomOfSection);

		if (!longSection || atBottomOfSection) {
			currentYPos -= activeSection.outerHeight();
			jQuery(myElement).css("transform", "translateY(" + currentYPos + "px)");
			activeSection.removeClass("active");
			activeSection.css("transform", "scale(0.75, 0.75)");
			nextSection.addClass("active");
			nextSection.css("transform", "scale(1, 1)");
		}
	}
}, 100,	true);

var goUp = debounce(function() {
	console.log("scroll up");
	var activeSection = jQuery("section.active");
	var prevSection = jQuery(
		"section[data-section=" + (activeSection.attr("data-section") - 1) + "]"
		);
	if (prevSection.length > 0) {
		var activeSectionContent = jQuery("section.active .section-content");
		var longSection = activeSectionContent.prop("scrollHeight") > window.innerHeight;
		var atTopOfSection = 0 == activeSectionContent.prop("scrollTop");
		console.log(atTopOfSection + " " + activeSectionContent.prop("scrollTop"));
		if (!longSection || atTopOfSection) {
			currentYPos += activeSection.innerHeight();
			jQuery(myElement).css("transform", "translateY(" + currentYPos + "px)");
			activeSection.removeClass("active");
			activeSection.css("transform", "scale(0.75, 0.75)");
			prevSection.addClass("active");
			prevSection.css("transform", "scale(1, 1)");
		}
	}
}, 100, true );

var repositionAfterResize = debounce(function() {
	console.log("Window resize. " + currentYPos);
	var newYpos = 0;
	var activeSection = jQuery("section.active");
	for (var s = 0; s < activeSection.attr("data-section"); s++) {
		var prevSection = jQuery("section[data-section=" + s + "]");

		if (prevSection.length > 0) {
			newYpos += prevSection.outerHeight();
		}
	}
	currentYPos = newYpos * -1;
	jQuery(myElement).css("transform", "translateY(" + currentYPos + "px)");
}, 250);

