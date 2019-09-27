<?php
if (has_post_thumbnail())
{
	the_post_thumbnail('program_featured_image', ['title' => get_the_post_thumbnail_caption()]);

	if (!empty(get_the_post_thumbnail_caption()))
	{
		?>
		<div class="thumbnail-caption"><?php the_post_thumbnail_caption();?></div>
		<?php
	}
}
?>