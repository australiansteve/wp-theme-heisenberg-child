<?php
?>
<div class="grid-x deadline-program-page" id="deadline-program-page-<?php the_ID();?>">

	<?php 
	$raw = get_field('date');
	$format = "Ymd";
	$dateobj = DateTime::createFromFormat($format, $raw);


	if(ICL_LANGUAGE_CODE=='fr'):
		setlocale(LC_TIME, 'fr_FR.UTF-8');
		$ordinal = new NumberFormatter('fr_FR', NumberFormatter::ORDINAL);
		$ordinal = $ordinal->format(date_format($dateobj, "j"));
		$dateDisplay = strftime("{$ordinal} %B %Y", $dateobj->getTimestamp());
	else :
		$dateDisplay = $dateobj->format('F d, Y');
	endif;

	?>

	<div class="cell">
		<span class="date"><?php echo $dateDisplay; ?></span>
	</div>

</div>