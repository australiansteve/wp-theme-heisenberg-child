<?php
get_header();
?>
<div class="page-content">
	<div class="grid-x grid-padding-x">
		<div class="small-12 cell">
			<h2><?php echo get_the_title( get_option('page_for_posts', true) );	?></h2>
		</div>
	</div>
	<div class="grid-x grid-padding-x" id="field-notes-intro">
		<div class="small-12 cell">
			<?php the_field('fieldnotes_intro', get_option('page_for_posts', true) );?>
		</div>
	</div>
	<div class="grid-x grid-padding-x">

		<?php
		if ( have_posts() ) :

			while ( have_posts() ) :

				the_post();
				?>
				<div class="cell small-12 medium-6">
					<div class="post">
						<a href="<?php the_permalink();?>">
							<div class="image">
								<?php
								$image = get_field('archive_image');
								$size = 'post-archive-image';
								if ($image){
									echo wp_get_attachment_image( $image, $size );
								}
								else if (has_post_thumbnail()){
									the_post_thumbnail('post-archive-image');
								}
								else {
									/* Get one of the default images - randomized */
									$images = get_field('default_archive_images', 'option');
									$size = 'post-archive-image';
									if ($images && count($images) >= 1) {
										$n = rand(0, count($images) - 1);
										echo wp_get_attachment_image( $images[$n], $size );
									}
									else {
										die('No image or default image found');
									}
								}
								?>
							</div>
							<div class="text-center title">
								<h3><?php
								the_title();
								?></h3>
							</div>
						</a>
						<div class="text-center excerpt">
							<?php
							the_excerpt();
							?>
						</div>
						
					</div>
				</div>
				<?php

			endwhile;

			the_posts_navigation();

		else :

			echo esc_html( 'Sorry, no posts found' );

		endif;
		?>

	</div>
</div>

<?php
get_footer();
