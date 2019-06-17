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
					<div class="gold-border-div offset-top-left">
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
<?php


	endwhile;

	the_posts_navigation();

	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

else :

	echo esc_html( 'Sorry, no posts' );

endif;
get_footer();
