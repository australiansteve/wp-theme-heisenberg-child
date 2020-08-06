<?php
get_header(); 


$sectionId = 'section_1';
$sectionClasses = '';
include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
?>

<div class="section-content">
	<?php
	if ( have_posts() ) :

		while ( have_posts() ) :

			the_post();
			?>

			<div class="grid-x">

				<div class="small-12 medium-8 large-9 cell">
					<div class="container">
						<?php if( has_tag('video')): ?>
							<div class="image-stretcher">
								<?php
								$videoDetails = get_field('video_details');
								$backgroundImageUrl = isset($videoDetails['placeholder_image']) ? wp_get_attachment_image_src($videoDetails['placeholder_image'], 'full')[0] : get_the_post_thumbnail_url($post, 'full');
								?><img src="<?php echo $backgroundImageUrl; ?>">
							</div>
							<?php else : ?>
								<div class="image-stretcher">
									<?php
									the_post_thumbnail('full');
									?>
								</div>
							<?php endif;?>
							<div class="post-content">
								<?php
								the_title( '<h1>', '</h1>' );
								?>
								<div class="post-meta">
									<?php the_date(); ?> by <?php the_author();?>
								</div>

								<?php if (isset($videoDetails['video_url']) && $videoDetails['video_url'] != "") : ?>
									<div class="video-wrapper">
										<video playsInline controls <?php echo $videoDetails['video_autoplay'] ? 'autoplay': '';?> src="<?php echo $videoDetails['video_url'];?>" class="self-controlled">
											Your browser does not support HTML5 video.
										</video>
									</div>
								<?php endif;?>

								<?php
								the_content();
								?>
							</div>
							<?php 
							$returnParams = "";
							$searchTerm = "";
							$cookie_name = 'returninfo';
							if(isset($_COOKIE[$cookie_name])) {
								error_log($_COOKIE[$cookie_name]);
								$returnInfo = json_decode(stripslashes($_COOKIE[$cookie_name]));
								foreach($returnInfo as $key => $value) {
									if ($key == 's') {
										$searchTerm = $value;
										if ($value != "") {
											$returnParams .= $key."=".$value."&";
										}
									}
									else {
										$returnParams .= $key."=".$value."&";
									}
								}
								$returnParams =  rtrim($returnParams, "&");  
							}
							$returnLink = "";
							$returnText = "";
							if (is_singular('post') && $searchTerm != "") {
								$returnLink = site_url();
								$returnText = "Return to search results";
							}
							elseif (is_singular('post') && has_category('press-release')) {
								$returnLink = get_field('single_post_press_release_back_button_link', 'option');
								$returnText = get_field('single_post_press_release_back_button_text', 'option');
							}
							elseif (is_singular('post')) {
								$returnLink = get_permalink( get_option( 'page_for_posts' ) );
								$returnText = get_field('single_post_back_button_text', 'option');
							}
							?>
							<div class="back-to-button text-center">
								<a class="button" href="<?php echo $returnLink;?>?<?php echo $returnParams;?>"><?php echo $returnText;?></a>
							</div>

						</div>
					</div>

					<div class="small-12 medium-4 large-3 cell">
						<div class="sidebar">
							<?php get_template_part('page-templates/template-parts/sidebar'); ?>
						</div>
					</div>
				</div>
				<?php
			endwhile;

			the_posts_navigation();

		else :

			echo esc_html( 'Sorry, no posts' );

		endif;
		?>

	</div>
	<?php		
	include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 

	get_footer();
