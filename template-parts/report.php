<div class ="cell report">
		<?php 
		$image = get_sub_field('image');
		$size = 'report_thumbnail'; // (thumbnail, medium, large, full or custom size)
		
		?>
		<h4 class="name">
			<?php the_sub_field('title'); ?>
		</h4>
		<?php if( get_sub_field('file') ): ?>

			<a href="<?php echo wp_get_attachment_url(get_sub_field('file')); ?>" target="_blank" >

				<?php 
				if( $image ) {
					echo wp_get_attachment_image( $image, $size );
				}
				the_field('file_download_text', 'option');
				echo " (".round(filesize(get_attached_file(get_sub_field('file'))) / 1024, 0)."kb)"; ?>
					
			</a>

		<?php endif; ?>
</div>
