<?php
?>
<div class="cell small-12 medium-4">
<?php if ( has_post_thumbnail() ) : ?>
	<div class="featured-image">
			<?php the_post_thumbnail('team_homepage_size'); ?>
	</div>
<?php endif; ?>
</div>