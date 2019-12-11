<div class="term-links">
	<div class="bling">
	</div>

	<?php
	$terms = get_terms( array(
		'taxonomy' => 'project-category',
		'hide_empty' => true,
	) );

	foreach($terms as $term) {
		?>
		<div><a class="<?php echo is_tax('project-category', $term->term_id) ? 'active': ''; ?>" href="<?php echo get_term_link($term);?>"><?php echo $term->name; ?></a></div>
		<?php
	}
	?>
</div>