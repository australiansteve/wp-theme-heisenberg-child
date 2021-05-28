<div class="header-bg video">

	<?php 
		/* grab the video ID from the right spot depending on page type */
		if (is_tax('project-category')) {
			//echo get_queried_object()->taxonomy."_".get_queried_object()->term_id;
			$videoVimeoId = get_field('projects_page_video_background_vimeo_id', get_queried_object()->taxonomy."_".get_queried_object()->term_id);
		}
		elseif (is_archive('austeve-projects')) {
			$videoVimeoId = get_field('projects_page_video_background_vimeo_id', 'option');	
		}
		else {
			$videoVimeoId = get_field('video_background_vimeo_id'); 
		}

	
	if ($videoVimeoId) :
		?>
		<iframe id="headerVideo" src="https://player.vimeo.com/video/<?php echo $videoVimeoId; ?>?color=ef0800&title=0&byline=0&portrait=0&autoplay=1&loop=1&autopause=0&muted=1&controls=0&background=1"  frameborder="0" allow="autoplay; fullscreen; picture-in-picture" muted autoplay></iframe>
		<script src="https://player.vimeo.com/api/player.js"></script>

		<script type="text/javascript">

			jQuery(document).ready(function() {
				var iframe = document.querySelector('iframe');
	    		var player = new Vimeo.Player(iframe);

	    		jQuery(".fa-volume-up").on( 'click', muteVideo );
	    		jQuery(".fa-volume-mute").on( 'click', unmuteVideo );

	    		//in case native controls get used to mute or unmute, update the icons
	    		player.on('volumechange', function() {
			        console.log('volumechange the video!');
			        player.getMuted().then(function(muted) {
			        	if (muted) {
			        		muteVideo();
			        	}
			        	else {
			        		unmuteVideo();
			        	}
			        	
				    });
			    });
			});
			
    		function unmuteVideo() {
    			var iframe = document.querySelector('iframe');
	    		var player = new Vimeo.Player(iframe);

    			player.setMuted(false);
    			jQuery(".fa-volume-up").removeClass('hidden');
    			jQuery(".fa-volume-mute").addClass('hidden');
    		}

    		function muteVideo() {
    			var iframe = document.querySelector('iframe');
	    		var player = new Vimeo.Player(iframe);

				player.setMuted(true);
    			jQuery(".fa-volume-mute").removeClass('hidden');
    			jQuery(".fa-volume-up").addClass('hidden');
    		}
		</script>
		<?php
	endif;
	?>
</div>
<?php 
if ($videoVimeoId) {
	echo get_template_part('page-templates/template-parts/header', 'video-volume'); 
} 
?>
