<?php
get_header();
?>
<div class="grid-x grid-padding-x">
	<div class="small-12 cell">
		<h2><?php the_archive_title(); ?></h2>
	</div>
</div>
<div class="grid-x grid-padding-x">

	<?php
	if ( have_posts() ) :

		while ( have_posts() ) :

			the_post();
			?>
			<div class="cell small-12 medium-6">
				<?php echo get_template_part('page-templates/post', 'archive'); ?>
			</div>
			<?php

		endwhile;

		echo get_template_part('page-templates/template-parts/navigation', 'archive');


	else :

		echo esc_html( 'Sorry, no posts found' );

	endif;
	?>

</div>

<?php
get_footer();
