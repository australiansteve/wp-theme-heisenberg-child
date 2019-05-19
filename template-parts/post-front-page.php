<?php
?>
<div class="grid-x post-front-page" id="post-front-page-<?php the_ID();?>">

<?php if ( has_post_thumbnail() ) : ?>
	<div class="cell featured-image">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail(); ?>
		</a>
	</div>
<?php endif; ?>

	<div class="cell title">
		<h4><?php the_title();?></h4>
	</div>
	
	<div class="cell excerpt">
		<?php the_excerpt();?>
	</div>

	<div class="cell read-more">
		<a class="button" href="<?php the_permalink();?>"><?php the_field('front_page_post_button_text', 'option');?></a>
	</div>
</div>