<?php

get_header(); 
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
				<h1><?php the_field('courses_page_title', 'option'); ?></h1>
				<?php 

				$theSubMenu = 'courses-menu';
				get_template_part( 'template-parts/sub-menu' ); 
				?>
			</div>

		</div>
	</div>


	<div class='no-thumbnail-spacer'></div>
	<div class="grid-x grid-padding-x courses" id="posts">

		<?php
		if ( have_posts() ) :

			while ( have_posts() ) :

				the_post();

						echo get_template_part('template-parts/course', 'archive');
					

			endwhile;

		else :

			echo esc_html( 'Sorry, no posts' );

		endif;
		?>
	</div>
</div>
<?php
get_footer();
