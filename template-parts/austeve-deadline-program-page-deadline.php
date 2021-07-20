<?php
?>
<div class="grid-x deadline-program-page" id="deadline-program-page-<?php the_ID();?>">

	<?php 
	$raw = get_field('date');
	$format = "Ymd";
	$dateobj = DateTime::createFromFormat($format, $raw);

	if(ICL_LANGUAGE_CODE=='fr'):
		setlocale(LC_TIME, 'fr_FR.UTF-8');
		$dayOfMonth = intval(strftime("%e", $dateobj->getTimestamp()));

		//Only use ordinal on first of month. For some reason the 15th comes out as 15e and artsnb do not want that
		if ($dayOfMonth == 1) {
			$ordinal = new NumberFormatter('fr_FR', NumberFormatter::ORDINAL);
			$ordinal = $ordinal->format(date_format($dateobj, "j"));
			$dateDisplay = strftime("{$ordinal} %B %Y", $dateobj->getTimestamp());
		}
		else {
			$dateDisplay = strftime("%e %B %Y", $dateobj->getTimestamp());
		}

	else :
		$dateDisplay = $dateobj->format('F d, Y');
	endif;
	?>

	<div class="cell">
		<span class="date"><?php echo $dateDisplay; ?></span>
	</div>

</div>