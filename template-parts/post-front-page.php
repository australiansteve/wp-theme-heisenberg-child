<?php
?>
<div class="cell small-12 medium-3">
<?php if ( has_post_thumbnail() ) : ?>
	<div class="featured-image text-center">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail('post_homepage_size'); ?>
		</a>
	</div>
<?php endif; ?>
</div>