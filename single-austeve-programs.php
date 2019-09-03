<?php
/***
  * Archive page for Grant Programs
  */

get_header(); ?>

<div class="container">

	<div class="grid-x grid-padding-x">

		<div class="small-12 medium-8 cell">

			<h1><?php the_field('grants_page_title', 'option');?></h1>

		</div>

		<div class="small-12 medium-4 cell">

			<a href="<?php the_field('oa_system_link', 'option');?>" class="button"><?php the_field('grants_page_apply_button_text', 'option');?></a>

		</div>
	</div>

	<div class="grid-x grid-padding-x">
		<?php
		$theSubMenu = 'grants-menu';
		get_template_part( 'template-parts/sub-menu' ); 
		?>
	</div>

	<div class="grid-x grid-padding-x">
		<?php
		if ( have_posts() ) :

			while ( have_posts() ) :

				the_post();
				?>
				<div class="small-12 cell">
					<div class="container austeve-program">
						<div class="grid-x">
							<div class="cell small-12 medium-8 left-column">
								<h2><?php the_title( ); ?></h2>

								<?php the_content();?>

								<a href="<?php the_field('oa_system_link', 'option');?>" class="button"><?php the_field('grants_page_apply_button_text', 'option');?></a>
							</div>
							<div class="cell small-12 medium-4 right-column">
								<div class="featured-image">
									<?php
									if (has_post_thumbnail())
									{
										the_post_thumbnail('program_featured_image');
									}
									?>
								</div>
								<div class="deadlines">
									<h3><?php the_field('front_page_column_title_3', 'option');?></h3>

									<?php
										//add meta query to only get deadlines AFTER the 'timeout' period'
									$days = get_field('remove_deadlines_after', 'option');
									$startDate = (new DateTime(null, new DateTimeZone('America/Halifax')))->modify('-'.$days.' days');
									$endDate = (new DateTime(null, new DateTimeZone('America/Halifax')))->modify('+2 years');

									//Deadlines are not translatable so always get the en deadlines
									$orig_post = icl_object_id(get_the_ID(), get_post_type(), false, 'en');

										// WP_Query arguments
									$args = array(
										'post_type'              => array( 'austeve-deadline' ),
										'post_status'            => array( 'publish' ),
										'posts_per_page'         => '-1',
										'meta_key'				=> 'date',
										'orderby'	=> 	'meta_value_num',
										'order'		=> 	'ASC',
										'meta_query'			=> array(
											'relation'		=> 'AND',
											array(
												'key' => 'date',
												'value' 	=> $startDate->format('Ymd'),
												'compare' 	=> '>=',
												'type' 	=> 'DATE'
											),
											array(
												'key' => 'date',
												'value' 	=> $endDate->format('Ymd'),
												'compare' 	=> '<',
												'type' 	=> 'DATE'
											),
											array(
												'key' => 'grant-program',
												'value' 	=> $orig_post,
												'compare' 	=> '=',
											)
										)
									);

										// The Query
									$postsquery = new WP_Query( $args );

										// The Loop
									if ( $postsquery->have_posts() ) {
										while ( $postsquery->have_posts() ) {
											$postsquery->the_post();
											echo get_template_part('template-parts/austeve-deadline', 'program-page-deadline');
										}
									} else {
											// no posts found
										the_field('no_deadlines_text', 'option');
									}

										// Restore original Post Data
									wp_reset_postdata();
									?>	

								</div>
							</div>

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
