<?php
?>
<div class="cell small-12 post-archive">
	<div class="post-archive-container">
		<div class="background-div">
		</div>
		<div class="grid-x grid-margin-x">
			<div class="cell medium-shrink">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="featured-image">
				<?php the_post_thumbnail('medium'); ?>
		</div>
	<?php endif; ?>
			</div>
			<div class="cell auto">
				<div class="post-archive-content-container">
					<?php the_title( '<h2>', '</h2>' );?>
					<?php the_excerpt();?>

					<a class="button" href="<?php the_permalink(); ?>" title="<?php the_title( );?>">Read more</a>
				</div>
			</div>
		</div>
	</div>
</div>