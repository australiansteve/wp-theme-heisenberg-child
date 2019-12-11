<?php
get_header(); ?>

<?php echo get_template_part('page-templates/template-parts/projects', 'javascript'); ?>

<main class="grid-container">

	<div class="grid-x grid-padding-x">

		<div class="cell">
			<?php echo get_template_part('page-templates/template-parts/project', 'category-term-links'); ?>
		</div>

		<div class="small-12 cell taxonomy-details">
			<div class="term-information">
				<?php 
				$term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );
				echo "<h2>".$term->name."</h2>";
				echo "<p>".$term->description."</p>";
				?>
			</div>
		</div>

	</div>

	<div class="grid-x grid-padding-x">

		<div class="small-12 cell">
			<?php
			if( have_posts() ) {

				while( have_posts() ):

					the_post();

					echo get_template_part('page-templates/template-parts/project', 'archive');

				endwhile;

				the_posts_navigation();

				if( comments_open() || get_comments_number() ) {
					comments_template();
				}

			}
			else {

				echo esc_html( 'Sorry, no projects found.' );

			}
			?>
		</div>

	</div>
</main>
<?php
get_footer();
