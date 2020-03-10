<div class="post">
	<?php get_template_part('page-templates/template-parts/post-image', 'archive'); ?>
	<div class="text-center title">
		<a href="<?php the_permalink();?>">
			<h3><?php
			the_title();
			?></h3>
		</a>
	</div>
</div>