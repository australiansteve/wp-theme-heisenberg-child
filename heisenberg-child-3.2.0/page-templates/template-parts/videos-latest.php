<div class="videos">
	<div class="title"><?php the_title(); ?></div>
	<div class="excerpt"><?php the_excerpt();?></div>
	<a class="button read-more" href="<?php the_permalink()?>"><?php the_field('read_more_button_text');?></a>
</div>