<script type="text/javascript">
	function skip(value) {
		const media = document.querySelector('section.active video');
		media.currentTime += value;
	} 

	async function loadAndPlayMedia(media, backupUrl) {
		media.load();

		try {
			await media.play();
		} catch(err) {
			window.location.assign(backupUrl);
		}
	}

	function togglePlay() {
		const media = document.querySelector('section.active video');
		if (jQuery(this).hasClass("paused")) {
			media.play();
		}
		else {
			media.pause();
		}

		jQuery(this).toggleClass('paused');
	}

	function playVideoOnArchivePage() {
		var videoUrl = jQuery(this).attr('data-video-url');
		var videoCaption = jQuery(this).attr('data-video-caption');
		var videoMoreText = jQuery(this).attr('data-video-more-text');
		var videoBackupUrl = jQuery(this).attr('data-backup-url');
		const media = document.querySelector('section.active video');
		if (media) {
			media.src = videoUrl;
			jQuery("section.active .video-section-content-overlay").css({'opacity': '1', "height": "100%", "z-index": "1"});
			var captionAndLink = videoCaption;
			captionAndLink += "<br/><a href='" + videoBackupUrl + "'>" + videoMoreText + "</a>";
			jQuery("section.active .video-section-content-overlay .video-caption .text").html(captionAndLink);
			loadAndPlayMedia(media, videoBackupUrl);
		}
	}

	function closeVideoOverlay() {
		if (document.querySelector('footer.active')) {
			console.log("Move up first");
		}

		const mediaItems = document.querySelectorAll('video');
		mediaItems.forEach(function(media) {
			console.log("media: ". media);
			if (media && !media.paused)
				media.pause();
		});

		endOfVideoHandler();
		
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
		jQuery(".video-section-content-overlay").css({'opacity': '0', "z-index": "-1"});
	}

	/* Listeners that work for dynamically added content */
	jQuery(document).on("click", ".video-link.has-video", playVideoOnArchivePage);
	jQuery(document).on("click", ".close-video-overlay", closeVideoOverlay);
	jQuery(document).on("click", ".forward-5", skipAhead);
	jQuery(document).on("click", ".back-5", skipBack);
	jQuery(document).on("click", ".toggle-mute", toggleMute);
	jQuery(document).on("click", ".toggle-play", togglePlay);

	var video = document.querySelector('section.active video');
	if (video) {
		video.addEventListener('ended',endOfVideoHandler, false);
	}

</script>