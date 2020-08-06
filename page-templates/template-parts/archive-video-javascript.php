<script type="text/javascript">
	function skip(value) {
		const media = document.querySelector('section.active video');
		media.currentTime += value;
	} 

	function playVideo(sectionId) {
		var sectionSelector = 'section#'+sectionId;
		var video = document.querySelector(sectionSelector + " video");
		var playButton = document.querySelector(sectionSelector + " .toggle-play");
		video.play();
		jQuery(playButton).removeClass("paused");
	}

	function pauseVideo(sectionId) {
		
		var sectionSelector = 'section#'+sectionId;
		var video = document.querySelector(sectionSelector + " video");
		var playButton = document.querySelector(sectionSelector + " .toggle-play");
		if (video != null) {
			video.pause();
			jQuery(playButton).addClass("paused");
		}
	}

	function stopNonActiveSectionVideos() {
		const sections = document.querySelectorAll('section:not(.active)');
		sections.forEach(function(section) {
			stopAndCloseVideoOverlay(jQuery(section).attr("id"));
		});
	}

	async function loadAndPlayMedia(media, backupUrl) {
		stopNonActiveSectionVideos();
		media.load();

		try {
			await media.play();
		} catch(err) {
			window.location.assign(backupUrl);
		}
		var playButton = document.querySelector("section.active .toggle-play");
		jQuery(playButton).removeClass("paused");
	}

	function togglePlay() {
		if (jQuery(this).hasClass("paused")) {
			stopNonActiveSectionVideos();
			playVideo(jQuery(this).attr('data-section'));
		}
		else {
			pauseVideo(jQuery(this).attr('data-section'));
		}
	}

	function playVideoOnArchivePage(e) {
		e.preventDefault();
		var videoUrl = jQuery(this).attr('data-video-url');
		var videoCaption = jQuery(this).attr('data-video-caption');
		var videoMoreText = jQuery(this).attr('data-video-more-text');
		var videoBackupUrl = jQuery(this).attr('data-backup-url');
		const media = document.querySelector('section.active video');
		if (media) {
			media.src = videoUrl;
			jQuery("section.active .video-section-content-overlay").css({'opacity': '1', "height": "100%", "z-index": "5"});
			var captionAndLink = videoCaption;
			captionAndLink += "<br/><a class='archive-link-to-single' href='" + videoBackupUrl + "'>" + videoMoreText + "</a>";
			jQuery("section.active .video-section-content-overlay .video-caption .text").html(captionAndLink);
			loadAndPlayMedia(media, videoBackupUrl);

			media.addEventListener('ended', endOfVideoHandler, false);
		}
	}


	function closeVideoOverlay(e) {
		e.preventDefault();
		stopAndCloseVideoOverlay(jQuery(this).attr("data-section"));
	}

	function stopAndCloseVideoOverlay(sectionId) {
		pauseVideo(sectionId);
		jQuery("#"+sectionId+" .video-section-content-overlay").css({'opacity': '0', "z-index": "-1"});
		
	}

	function skipAhead() {
		skip(5);
	}

	function skipBack() {
		skip(-5);
	}

	function toggleMute() {
		const media = jQuery('section.active video');
		media.prop('muted', !media.prop('muted'));
		jQuery(this).toggleClass('sound-on');
	}

	function endOfVideoHandler(e) {
		const sections = document.querySelectorAll('section');
		sections.forEach(function(section) {
			stopAndCloseVideoOverlay(jQuery(section).attr("id"));
		});
	}

	/* Listeners that work for dynamically added content */
	jQuery(document).on("click", ".video-link.has-video", playVideoOnArchivePage);
	jQuery(document).on("click", ".close-video-overlay", closeVideoOverlay);
	jQuery(document).on("click", ".forward-5", skipAhead);
	jQuery(document).on("click", ".back-5", skipBack);
	jQuery(document).on("click", ".toggle-mute", toggleMute);
	jQuery(document).on("click", ".toggle-play", togglePlay);

</script>