<?php
get_header();
?>
<main class="grid-container">

	<div class="grid-x grid-padding-x">

		<?php
		if ( have_posts() ) :

			while ( have_posts() ) :

				the_post();
				?>
				<div class="cell small-12 medium-6">
					<?php echo get_template_part('page-templates/template-parts/post', 'archive'); ?>
				</div>
				<?php

			endwhile;

			echo get_template_part('page-templates/template-parts/navigation', 'archive');

		else :

			echo esc_html( 'Sorry, no posts found' );

		endif;
		?>

	</div>

</main>

<?php
get_footer();
