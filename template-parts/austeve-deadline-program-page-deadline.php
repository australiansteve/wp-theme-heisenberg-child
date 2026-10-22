<?php
?>
<div class="grid-x deadline-program-page" id="deadline-program-page-<?php the_ID();?>">

	<?php 
	$raw = get_field('date');
	$format = "Ymd";
	$dateobj = DateTime::createFromFormat($format, $raw);

	if(ICL_LANGUAGE_CODE=='fr'):
		$dateDisplay = austeve_french_date($dateobj, true);
	else :
		$dateDisplay = $dateobj->format('F d, Y');
	endif;
	?>

	<div class="cell">
		<span class="date"><?php echo $dateDisplay; ?></span>
	</div>

</div>