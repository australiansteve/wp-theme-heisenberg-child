<div class="article">
	<a href="<?php the_field('link');?>" target="blank"><h3><?php the_title();?></h3></a>
	<?php the_content();?>
	<a href="<?php the_field('link');?>"  target="blank"><?php the_field('read_more_link_text');?></a>
</div>