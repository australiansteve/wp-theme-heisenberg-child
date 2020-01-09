<td class="project">
	<?php get_template_part('page-templates/template-parts/post-image', 'archive'); ?>
	<div class="overlay-bg"></div>
	<div class="grid-x overlay align-middle">
		<div class="cell text-center">
		<a href="<?php the_permalink();?>"><?php the_title('<h3>', '</h3>'); ?></a>
	</div>
	</div>
</td>