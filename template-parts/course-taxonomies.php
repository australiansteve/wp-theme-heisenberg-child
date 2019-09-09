<div class="course-taxonomies">
	<div class="category">
		<?php 
		$terms = wp_get_post_terms(get_the_ID(), array( 'course-category' ) );
		if (count($terms) > 0)
		{
			error_log(print_r($terms[0], true));
			echo get_taxonomy( $terms[0]->taxonomy )->labels->singular_name.": <a href='".get_term_link($terms[0]->term_id)."' title='".$terms[0]->name."' alt='".$terms[0]->name."'>".$terms[0]->name."</a>";
		}
		?>
	</div>
	<div class="tags">
		<?php

		$terms = wp_get_post_terms(get_the_ID(), array( 'course-tag' ) );
		if (count($terms) > 0)
		{
			echo get_taxonomy( $terms[0]->taxonomy )->labels->name.": ";
			$tCount = 0;
			foreach($terms as $term) {
				echo "<a href='".get_term_link($term->term_id)."' title='".$term->name."' alt='".$term->name."'>".$term->name."</a>";
				if ($tCount++ < count($terms) - 1)
				{
					echo ", ";
				}
			}

		}
		?>
	</div>
</div>