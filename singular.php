<?php
get_header(); 

if ( have_posts() ) :

	while ( have_posts() ) :

		the_post();
?>
<?php 
		$image = get_field('page_title_background_image', 'option');
		if ($image):
?>
	<div class="background-div page-title-background" style="background-image:url(<?php echo $image['url'];?>)">
	</div>

<?php 
		endif; 
?>

	<div class="page-content">
		<div class="grid-x grid-padding-x page-title">
			<div class="small-12 cell">

				<div class="page-title-container">
					<?php the_title( '<h1>', '</h1>' ); ?>
				</div>
			</div>
		</div>

		<div class="grid-x grid-padding-x page-content">

			<div class="small-12 medium-9 medium-offset-3 cell">
				<div class="border-container">
					<div class="gold-border-div inset">
					</div>
<?php 
					if ( has_post_thumbnail() ) {
						the_post_thumbnail();
					}
?>
				</div>
<?php
			the_content();
?>
			</div>

		</div>
	</div>

	<?php if (is_single()): ?>
	<div class="navigation button-container text-center">
		<h2><?php the_field('stories_page_navigation_text', 'option')?></h2>
		<?php previous_post_link('%link'); ?><span class="button-separator"></span><?php next_post_link('%link'); ?>
	</div>
	<?php endif; ?>
<?php


	endwhile;
	
else :

	echo esc_html( 'Sorry, no posts' );

endif;
get_footer();
