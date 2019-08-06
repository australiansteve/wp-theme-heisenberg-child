<?php
?>
<div class="grid-x deadline-program-page" id="deadline-program-page-<?php the_ID();?>">

	<?php 
	$raw = get_field('date');
	$format = "Ymd";
	$dateobj = DateTime::createFromFormat($format, $raw);

	?>

	<div class="cell">
		<span class="date"><?php echo $dateobj->format('F d, Y'); ?></span>
	</div>

</div>