<div class="grid-x" id="sidebar">
	<div class="small-12 cell">
		<?php the_field('fieldnotes_intro', 'option' ); ?>
	</div>
	<div class="small-12 cell">
		<h4><?php the_field('recent_posts_title', 'option'); ?></h4>
		<ul>
			<?php
			$args = array(
				'post_type'              => array( 'post' ),
				'post_status'            => array( 'publish' ),
				'posts_per_page'         => get_field('number_of_recent_posts', 'option'),
				'order'                  => 'DESC',
				'orderby'                => 'date',
			);

			$postsquery = new WP_Query( $args );

			if ( $postsquery->have_posts() ) {
				while ( $postsquery->have_posts() ) {
					$postsquery->the_post();
					echo "<li><a href='".get_the_permalink()."'>".get_the_title()."</a></li>";
				}
			}

			wp_reset_postdata();
			?>
		</ul>
	</div>
	<div class="small-12 cell">
		<?php the_field('subscription_button', 'option' ); ?>
	</div>
</div>