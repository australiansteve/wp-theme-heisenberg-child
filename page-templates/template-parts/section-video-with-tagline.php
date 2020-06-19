<?php
$pageId = is_home() || is_search() || is_category() ? get_option( 'page_for_posts' ) : get_the_id();
$autoplay = get_field($sectionId.'_video_autoplay', $pageId);
$startMuted = get_field($sectionId.'_video_starts_muted', $pageId);
$videoUrl = get_field($sectionId.'_video_url', $pageId);
$videoCaption = get_field($sectionId.'_video_caption', $pageId);
$placeholderImage = get_field($sectionId.'_placeholder_image', $pageId);
$placeholderOverlayText = get_field($sectionId.'_overlay_text', $pageId);
?>
<div class="section-content">
	<div class="grid-y align-center video-section" style="height: 100%">
		<div class="cell small-9">
			<?php
			if ($placeholderImage){
				$imageUrl = wp_get_attachment_image_src( $placeholderImage, 'full' )[0];
				?>
				<div class="grid-y align-center placeholder-image" style="background-image: url(<?php echo $imageUrl;?>)">
					<div class="cell text-center">
						<?php if ($placeholderOverlayText) { ?>
							<div class="placeholder-overlay"><?php echo $placeholderOverlayText;?></div>
						<?php } ?>
						<?php if ($videoUrl) { ?>
						<a class="placeholder-go <?php echo $videoUrl ? '': 'no-video';?>"><i class="fas fa-play"></i></a>
						<?php } ?>
					</div>
				</div>
				<?php
			}
			?>
		</div>
		<div class="cell small-3">
			<div class="grid-y align-center" style="height: 100%">
				<div class="cell text-center">
					<h2><?php 
					$tagline = is_search() ? "Search Results: ".get_search_query() : get_field($sectionId.'_tagline', $pageId); 
					echo ($tagline == 'Risk4' || $tagline == 'Risk7' || $tagline == 'Channel4') ? $tagline : strtoupper($tagline);
					?></h2>
				</div>
			</div>
		</div>
	</div>
	<div class="video-section-content-overlay">
		<div class="grid-y align-center" style="height: 100%">
			<div class="cell shrink medium-auto">
				<?php
				if ($videoUrl) {
					?>

					<div class="video-wrapper">
						<video id="headerVideo" <?php echo $startMuted ? "muted" : ""; echo (!$placeholderImage && $autoplay) ? "autoplay" : ""; ?> playsInline>
							<source src="<?php echo $videoUrl?>" type="video/mp4"></source>
							Your browser does not support HTML5 video.
						</video>
						<div class="video-controls">
							<a class="toggle-play pause"><i class="fas fa-pause"></i><i class="fas fa-play"></i></a>
							<a class="back-5"><i class="fas fa-backward"></i></a>
							<a class="forward-5"><i class="fas fa-forward"></i></a>
							<a class="toggle-mute <?php echo $startMuted ? "" : "sound-on";?>"><i class="fas fa-volume-mute"></i> <i class="fas fa-volume-up"></i></a>
						</div>
					</div>

					<?php
				}
				?>

				<div class="video-caption">
					<?php echo $videoCaption;?>
					<div class="close-video-overlay">
						<a href="#" title="Close video"><i class="fas fa-times"></i> Close</a>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function skip(value) {
		const media = document.querySelector('video');
		media.currentTime += value;
	} 

	function playMedia(media) {
		media.play();
	}
	function hidePlaceholder() {
		jQuery(".placeholder-image").hide();
	}

	jQuery(".placeholder-image").on('click', function() {
		const media = document.querySelector('video');
		if (media) {
			jQuery(".placeholder-image").css("opacity", "0");
			jQuery(this).hide();
			jQuery(".video-section-content-overlay").css({'opacity': '1', "height": "100%", "z-index": "1"});
			setTimeout(playMedia(media), 1000);
			setTimeout(hidePlaceholder, 2000);
		}
	});
	jQuery(".close-video-overlay").on('click', function() {
		const media = document.querySelector('video');
		if (!media.paused)
			media.pause();
		endOfVideoHandler();
	});

	jQuery(".forward-5").on('click', function() {
		skip(5);
	});
	jQuery(".back-5").on('click', function() {
		skip(-5);
	});

	jQuery(".toggle-mute").on('click', function() {
		const media = jQuery('video');
		media.prop('muted', !media.prop('muted'));
		jQuery(this).toggleClass('sound-on');
	});

	jQuery(".toggle-play").on('click', function() {
		const media = document.querySelector('video');
		if (jQuery(this).hasClass("paused")) 
			media.play();
		else 
			media.pause();

		jQuery(this).toggleClass('paused');
	});

	var video = document.querySelector('video');
	if (video) {
		video.addEventListener('ended',endOfVideoHandler, false);
	}
	function endOfVideoHandler(e) {
		jQuery(".placeholder-image").css("opacity", "1");
		jQuery(".placeholder-image").show();
		jQuery(".placeholder-go").show();
		jQuery(".video-section-content-overlay").css({'opacity': '0', "z-index": "-1"});
	}

</script>