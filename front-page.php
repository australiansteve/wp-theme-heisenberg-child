<?php
get_header(); ?>

<?php echo get_template_part('template-parts/front-page', 'call-to-action'); ?>

<div class="grid-x" id="intro">

	<div class="small-12 cell">
		<?php
		if ( have_posts() ) :

			while ( have_posts() ) :

				the_post();

				the_content();

			endwhile;

		endif;
		?>
	</div>

</div>

<div class="grid-x grid-margin-x" id="feeds" data-equalizer="feeds">

	<div class="small-12 medium-4 cell" id="news">
		
		<div class="container">

			<div class="grid-y">
				<div class="cell small-11">
					<h3><?php the_field('front_page_column_title_1', 'option');?></h3>
					<div class="height-dominant-container">
						<?php
						// WP_Query arguments
						$args = array(
							'post_type'              => array( 'post' ),
							'post_status'            => array( 'publish' ),
							'posts_per_page'         => get_field('front_page_number_of_news_posts', 'option'),
							'tax_query'              => array(
								array(
									'taxonomy'         => 'category',
									'terms'            => 'featured',
									'field'            => 'slug',
									'operator'         => 'NOT IN',
								),
							),
						);

						// The Query
						$postsquery = new WP_Query( $args );

						// The Loop
						if ( $postsquery->have_posts() ) {
							while ( $postsquery->have_posts() ) {
								$postsquery->the_post();

								echo get_template_part('template-parts/post', 'front-page');
							}
						} else {
							// no posts found
						}

						// Restore original Post Data
						wp_reset_postdata();

						?>
					</div>
				</div>
				<div class="cell small-1">
					<div class="grid-x post-front-page read-all">
						<div class="cell read-more">
							<a class="button" href="<?php the_field('front_page_read_all_news_link', 'option');?>"><?php the_field('front_page_read_all_news_text', 'option');?></a>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

	<div class="small-12 medium-4 cell" id="feature">
		
		<div class="container">

			<div class="grid-y">
				<div class="cell">
					<h3><?php the_field('front_page_column_title_2', 'option');?></h3>
					<?php
					$featuredPostId = 0;
			// WP_Query arguments
					$args = array(
						'post_type'              => array( 'post' ),
						'post_status'            => array( 'publish' ),
						'posts_per_page'         => '1',
						'tax_query'              => array(
							array(
								'taxonomy'         => 'category',
								'terms'            => 'featured',
								'field'            => 'slug',
								'operator'         => 'IN',
							),
						),
					);

			// The Query
					$postsquery = new WP_Query( $args );

			// The Loop
					if ( $postsquery->have_posts() ) {
						while ( $postsquery->have_posts() ) {
							$postsquery->the_post();
							$featuredPostId = get_the_ID();
							echo get_template_part('template-parts/post', 'front-page-featured');
						}
					} else {
				// no posts found
					}

			// Restore original Post Data
					wp_reset_postdata();
					?>	
				</div>
				<div class="cell shrink">
					<div class="grid-x post-front-page read-all">

						<div class="cell read-more">
							<a class="button" href="<?php the_permalink($featuredPostId);?>"><?php the_field('front_page_post_button_text', 'option');?></a>
						</div>

						<div class="cell read-more">
							<a class="button" href="<?php the_field('front_page_read_featured_news_link', 'option');?>"><?php the_field('front_page_read_featured_news_text', 'option');?></a>
						</div>
					</div>		
				</div>
			</div>
		</div>
	</div>

	<div class="small-12 medium-4 cell" id="deadlines">
		
		<div class="container">
			
			<div class="">

				<h3><?php the_field('front_page_column_title_3', 'option');?></h3>
				<?php
				//add meta query to only get deadlines AFTER the 'timeout' period'
				$days = get_field('remove_deadlines_after', 'option');
				if (!$days)
					$days = 3; //default to 3 days - 
				$startDate = (new DateTime(null, new DateTimeZone('America/Halifax')))->modify('-'.$days.' days');
				$endDate = (new DateTime(null, new DateTimeZone('America/Halifax')))->modify('+1 years');

				// WP_Query arguments
				$args = array(
					'post_type'              => array( 'austeve-deadline' ),
					'post_status'            => array( 'publish' ),
					'posts_per_page'         => '-1',
					'meta_key'				=> 'date',
					'orderby'	=> 	'meta_value_num',
					'order'		=> 	'ASC',
					'meta_query'			=> array (
						'AND', 
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
						)
					)
				);

				// The Query
				$postsquery = new WP_Query( $args );

				// The Loop
				if ( $postsquery->have_posts() ) {
					while ( $postsquery->have_posts() ) {
						$postsquery->the_post();
						echo get_template_part('template-parts/austeve-deadline', 'front-page-deadline');
					}
				} else {
					// no posts found
					error_log("No deadlines found: ".print_r($postsquery, true));
				}

				// Restore original Post Data
				wp_reset_postdata();
				?>	
			</div>

			<div class="full-calendar">
				<?php 
				$fullCalendarButtonText = get_field('front_page_full_calendar_text', 'option');
				if ($fullCalendarButtonText): ?>
					<a class="button" href="<?php the_field('front_page_full_calendar_link', 'option');?>"><?php echo $fullCalendarButtonText; ?></a>
				<?php endif; ?>
			</div>
		</div>

	</div>

</div>

<?php
get_footer();
