<?php
get_header(); ?>

<div class="container">

	<?php if ( function_exists('yoast_breadcrumb') ):
		yoast_breadcrumb('<p id="breadcrumbs">','</p>');
	endif; ?>

	<h1 class="page-title"><?php the_archive_title();?></h1>

	<?php
	$theSubMenu = 'news-category-menu';
	get_template_part( 'template-parts/sub-menu' ); 
	?>
	
	<?php
	if ( have_posts() ) :

		while ( have_posts() ) :

			the_post();

			get_template_part( 'template-parts/post', 'archive' ); 

		endwhile;

	endif;
	?>

	<?php if (paginate_links()) : ?>
		<div class="navigation button-container text-center">
			<h2><?php the_field('navigation_title_text', 'option');?></h2>
			<?php posts_nav_link( '<span class="button-separator"></span>', get_field('navigation_previous_page_text', 'option'), get_field('navigation_next_page_text', 'option') ); ?>
		</div>
	<?php endif; ?>

</div>

<?php
get_footer();

