<?php
global $nextSectionId;
global $sectionNumber;
$sectionId = 'section_'.$nextSectionId;
$sectionNumber = $nextSectionId;
$sectionClasses = '';
include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
?>
<div class="section-content video-section">
	<div style="height:100%">
		<div class="grid-x">
			<div class="cell small-12">
				<div class="blog-grid small-up-1 medium-up-3 medium-up-3">