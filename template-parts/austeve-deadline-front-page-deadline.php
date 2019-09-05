<?php
?>
<div class="grid-x deadline-front-page" id="deadline-front-page-<?php the_ID();?>">

	<?php 
	$raw = get_field('date');
	$format = "Ymd";
	$dateobj = DateTime::createFromFormat($format, $raw);

	$program = get_field('grant-program');
	$trans_id = icl_object_id( $program, get_post_type( $program ), true, ICL_LANGUAGE_CODE );

	if(ICL_LANGUAGE_CODE=='fr'):
		setlocale(LC_TIME, 'fr_FR.UTF-8');
		$ordinal = new NumberFormatter('fr_FR', NumberFormatter::ORDINAL);
		$ordinal = $ordinal->format(date_format($dateobj, "j"));
		$dateDisplay = strftime("{$ordinal} %B", $dateobj->getTimestamp());
	else :
		$dateDisplay = $dateobj->format('F d');
	endif;

	?>

	<div class="cell">
		<a href="<?php echo get_permalink($program);?>"><span class="date"><?php echo $dateDisplay; ?>: </span> <?php echo get_the_title($trans_id);?></a>
	</div>

</div>