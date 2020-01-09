<div class="cell navigation">
	<?php
	if (is_singular(['post', 'austeve-projects'])) {
		?>
		<div class="left">
			<?php
			$image = get_field('left_button_image', 'option');
			$image_url = wp_get_attachment_image_src($image, 'hand-logo')[0];
			echo next_post_link('%link', '<img src=\''.$image_url.'\' title=\'%title\' />');
			?>
		</div>
		<div class="right">
			<?php
			$image = get_field('right_button_image', 'option');
			$image_url = wp_get_attachment_image_src($image, 'hand-logo')[0];
			echo previous_post_link('%link', '<img src=\''.$image_url.'\' title=\'%title\' />');
			?>
		</div>
		<div class="back">
			<?php if (is_singular(['post'])) : ?>
			<a href="<?php the_permalink( get_option('page_for_posts', true) );	?>" class="button"><?php the_field('back_to_posts_button_label', 'option'); ?></a>
			<?php elseif (is_singular(['austeve-projects'])) : ?>
			<a href="<?php echo site_url('projects');	?>" class="button"><?php the_field('back_to_projects_button_label', 'option'); ?></a>
			<?php endif; ?>
		</div>
		<?php
	}
	?>
</div>