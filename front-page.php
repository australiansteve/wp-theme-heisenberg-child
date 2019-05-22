<?php
get_header(); ?>

	<div class="content-container">

		<div class="grid-x grid-margin-x" id="call-to-action">

			<div class="small-12 medium-8 cell" id="cta-left">
				<?php 

				$image = get_field('homepage_cta_image');
				$size = 'homepage_cta';

				if( $image ) {
					echo wp_get_attachment_image( $image, $size );
				}

				?>
			</div>

			<div class="small-12 medium-4 cell" id="cta-right">
				
				<div class="container">
					<div class="grid-y" style="height: calc(375px - 2rem)">
						<div class="cell small-2">
							<h3><?php the_field('homepage_cta_heading'); ?></h3>
						</div>
						<div class="cell small-8">
							<?php the_field('homepage_cta_text'); ?>
						</div>
						<div class="cell small-2">
							<a class="button" href="<?php the_field('homepage_cta_link'); ?>"><?php the_field('homepage_cta_link_text'); ?></a>
						</div>
					</div>
				</div>
			</div>

		</div>

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
				
				<div class="container height-dominant-container" data-equalizer-watch="feeds">
					<h3><?php the_field('front_page_column_title_1', 'option');?></h3>
<?php
// WP_Query arguments
$args = array(
	'post_type'              => array( 'post' ),
	'post_status'            => array( 'publish' ),
	'posts_per_page'         => '2',
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

			<div class="small-12 medium-4 cell" id="feature">
				
				<div class="container" data-equalizer-watch="feeds">
					<h3><?php the_field('front_page_column_title_2', 'option');?></h3>
<?php
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
		echo get_template_part('template-parts/post', 'front-page-featured');
	}
} else {
	// no posts found
}

// Restore original Post Data
wp_reset_postdata();
?>	
				</div>

			</div>

			<div class="small-12 medium-4 cell" id="deadlines">
				
				<div class="container" data-equalizer-watch="feeds">
					<h3><?php the_field('front_page_column_title_3', 'option');?></h3>
<?php
?>	
				</div>

			</div>

		</div>

	</div>

<?php
get_footer();
