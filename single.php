<?php
/***
  * Archive page for Grant Programs
  */

get_header(); ?>

<div class="content-container">

	<div class="container">
		<?php
		if ( have_posts() ) :

			while ( have_posts() ) :

				the_post();
				?>
				<div class="grid-x grid-padding-x">

					<div class="small-12 medium-8 cell left-column">

						<h1><?php the_title( ); ?></h1>

						<?php the_content();?>

					</div>

					<div class="small-12 medium-4 cell right-column">

						<div class="featured-image">
							<?php
							if (has_post_thumbnail())
							{
								the_post_thumbnail('medium');
							}
							?>
						</div>

						<div class="post-meta">
							<p><?php the_field('published_text', 'option');?> <?php $post_date = get_the_date( 'l F j, Y' ); echo $post_date; ?><br/>
							<?php the_field('by_text', 'option');?> <?php the_author_posts_link(); ?>
							<p><?php the_field('categories_text', 'option'); the_category( ', ', '' ); ?> 
							<br/><?php the_tags( get_field('tags_text', 'option').': ', ', ', '' ); ?> 
						</div>
					</div>
				</div>

				<?php
			endwhile;
			
		endif;
		?>

	</div>

</div>

<?php
get_footer();
