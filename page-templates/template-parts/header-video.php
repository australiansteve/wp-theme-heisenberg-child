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
		<iframe src="https://player.vimeo.com/video/<?php echo $videoVimeoId; ?>?color=ef0800&title=0&byline=0&portrait=0&autoplay=1&loop=1&autopause=0&muted=1&controls=false"  frameborder="0" allow="autoplay; fullscreen; picture-in-picture" muted autoplay></iframe>
		<?php
	endif;
	?>
</div>
