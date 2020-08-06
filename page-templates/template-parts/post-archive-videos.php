<?php
global $post;
$videoDetails = get_field('video_details');
$backgroundImageUrl = isset($videoDetails['placeholder_image']) ? wp_get_attachment_image_src($videoDetails['placeholder_image'], 'full')[0] : get_the_post_thumbnail_url($post, 'full');
$hasVideo = isset($videoDetails['video_url']) && $videoDetails['video_url'] != "";

?>
<div class="cell text-center medium-half-height">
	<a class="archive-link video-link <?php echo $hasVideo ? 'has-video' : ''?>" href="<?php echo $hasVideo ? '' : the_permalink();?>" data-video-url="<?php echo $videoDetails['video_url'];?>" data-video-caption="<?php echo $videoDetails['video_caption'];?>" data-video-more-text="<?php echo get_field('read_more_button_text');?>" data-backup-url="<?php the_permalink();?>">
		<div class="grid-y align-right background" style="background-image: url(<?php echo $backgroundImageUrl;?>); height: 100%; min-height: 300px">
			<div class="cell archive-content">
				<div class="grey-background">					
				</div>
				<div class="title">
					<?php the_title();?>
				</div>
			</div>
			<i class="fas fa-play"></i>
		</div>
	</a>
</div>