<?php
get_header(); 


$sectionId = 'section_1';
$sectionClasses = '';
include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
?>

<div class="section-content">
	<?php
	if ( have_posts() ) :

		while ( have_posts() ) :

			the_post();
			?>

			<div class="grid-x">

				<div class="small-12 medium-8 large-9 cell">
					<div class="container">
						<div class="image-stretcher">
							<?php
							the_post_thumbnail('full');
							?>
						</div>
						<div class="post-content">
							<?php
							the_title( '<h1>', '</h1>' );
							?>
							<div class="post-meta">
								<?php the_date(); ?> by <?php the_author();?>
							</div>
							<?php
							the_content();
							?>
						</div>
					</div>
				</div>

				<div class="small-12 medium-4 large-3 cell">
					<div class="sidebar">
						<?php get_template_part('page-templates/template-parts/sidebar'); ?>
					</div>
				</div>
			</div>
			<?php
		endwhile;

		the_posts_navigation();

	else :

		echo esc_html( 'Sorry, no posts' );

	endif;
	?>

</div>
<?php		
include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 

get_footer();
