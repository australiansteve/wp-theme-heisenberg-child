<div class="term-links">
	<div class="bling">
	</div>

	<?php
	$terms = get_terms( array(
		'taxonomy' => 'project-category',
		'hide_empty' => true,
	) );

	if (is_singular('austeve-projects')) {
		$singleProjectTerms = get_the_terms( $post->ID, 'project-category' );
		$singleProjectFirstTermId = array_pop($singleProjectTerms)->term_id;
	}

	foreach($terms as $term) {
		$isactive = is_tax('project-category', $term->term_id) || (is_singular('austeve-projects') && $term->term_id == $singleProjectFirstTermId);
		?>
		<div><a class="<?php echo $isactive ? 'active': ''; ?>" href="<?php echo get_term_link($term);?>"><?php echo $term->name; ?></a></div>
		<?php
	}
	?>
</div>