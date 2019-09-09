<?php
?>
<div class="cell small-12 post-archive">
	<div class="post-archive-container">
		<div class="background-div">
		</div>
		<div class="grid-x grid-margin-x">
			<div class="cell small-12 medium-11 medium-offset-1">
				<div class="post-archive-content-container">
					<div class="grid-x grid-margin-x">
						<div class="cell">

							<?php the_title( '<h2>', '</h2>' );?>
						</div>
					</div>
					<div class="grid-x grid-margin-x">
						<div class="cell small-12 medium-8 auto">

							<!--?php echo get_template_part('template-parts/course', 'taxonomies'); ?-->

							<p><?php the_field('short_description');?></p>

							<a class="button" href="<?php the_permalink(); ?>" title="<?php the_title( );?>"><?php the_field('course_archive_button_text', 'option'); ?></a>
						</div>
						<div class="cell small-12 medium-4 shrink">
							<?php if ( has_post_thumbnail() ) : ?>
								<div class="featured-image">
									<?php the_post_thumbnail('medium'); ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>