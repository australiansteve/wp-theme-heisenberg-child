<div class="grid-x">
	<div class="cell">
		<?php get_search_form(); ?>
		<h2>Categories</h2>
		<ul>
			<?php wp_list_categories(array(
				'title_li' => ''
			)); ?>
		</ul>
	</div>
</div>