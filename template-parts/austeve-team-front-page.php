<?php
global $count;
$classToAdd = "";
if ($count == 1):
	$classToAdd .= " small-order-".$count." medium-order-3";
elseif ($count < 4):
	$classToAdd .= " small-order-".$count." medium-order-".($count-1);
else:
	$classToAdd .= " small-order-".$count." medium-order-".($count);
endif;
?>
<div class="cell small-12 medium-4 <?php echo $classToAdd;?>">
<?php if ( has_post_thumbnail() ) : ?>
	<div class="featured-image">
			<?php the_post_thumbnail('team_homepage_size'); ?>
	</div>
<?php endif; ?>
</div>