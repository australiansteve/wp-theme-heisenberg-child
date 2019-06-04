<?php
?>
<div class="grid-x deadline-front-page" id="deadline-front-page-<?php the_ID();?>">

	<?php 
	$raw = get_field('date');
	$format = "Ymd";
	$dateobj = DateTime::createFromFormat($format, $raw);

	?>

	<div class="cell">
		<a href="<?php echo get_permalink(get_field('grant-program'));?>"><span class="date"><?php echo $dateobj->format('F d'); ?>: </span> <?php the_title();?></a>
	</div>

</div>