<div class="cell navigation">
	<?php
	if (is_archive(['post', 'austeve-projects'])) {
		?>
		<div class="right">
			<?php
			$image = get_field('right_button_image', 'option');
			$image_url = wp_get_attachment_image_src($image, 'hand-logo')[0];
			echo next_posts_link('<img src=\''.$image_url.'\' title=\'Next\' />');
			?>
		</div>
		<div class="left">
			<?php
			$image = get_field('left_button_image', 'option');
			$image_url = wp_get_attachment_image_src($image, 'hand-logo')[0];
			echo previous_posts_link('<img src=\''.$image_url.'\' title=\'Previous\' />');
			?>
		</div>
		<?php
	}
	?>
</div>