<?php
global $count;
$classToAdd = "";
$sizeToGet = 'team_homepage_size';
if ($count == 1):
	$sizeToGet  = "team_homepage_size_bigger";
endif;
?>
<div class="cell small-12 medium-4 <?php echo $classToAdd;?>">
<?php if ( has_post_thumbnail() ) : ?>
	<div class="featured-image">
			<?php the_post_thumbnail($sizeToGet); ?>
	</div>
<?php endif; ?>
</div>