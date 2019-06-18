<?php
get_header(); ?>

<?php
if ( have_posts() ) :

	while ( have_posts() ) :

		the_post();
?>

<div id="section-welcome" class="front-page-section">
<?php
$image = get_field('homepage_section_welcome_background_image', 'option');
if ($image):
?>
	<div class="background-div" style="background-image:url(<?php echo $image['url'];?>)">
	</div>
<?php endif; ?>

	<div class="grid-container">
		<div class="grid-x">
			<div class="small-12 medium-6 medium-offset-6 cell">
				<?php the_title( '<h1>', '</h1>' );?>
			</div>
		</div>
		<div class="grid-x">
			<div class="small-12 cell medium-text-center">
				<div class="border-container">
					<div class="gold-border-div offset-top-left">
					</div>
<?php 
					if ( has_post_thumbnail() ) {
						the_post_thumbnail();
					}
?>
				</div>
			</div>
		</div>
		<div class="grid-x">
			<div class="small-12 medium-6 medium-offset-6 cell">
					<?php the_content(); ?>
			</div>
		</div>
		<div class="grid-x">
			<div class="small-12 medium-6 medium-offset-6 cell">
				<a class="button" href="<?php the_field('homepage_section_welcome_button_url', 'option'); ?>" title="<?php the_field('homepage_section_welcome_button_text', 'option'); ?>"><?php the_field('homepage_section_welcome_button_text', 'option'); ?></a>
			</div>
		</div>
	</div>
<?php
endwhile;

else :

	echo esc_html( 'No homepage set' );

endif;
?>
</div>

<div id="section-team" class="front-page-section">
<?php
$image = get_field('homepage_section_team_background_image', 'option');
if ($image):
?>
	<div class="background-div" style="background-image:url(<?php echo $image['url'];?>)">
	</div>
<?php endif; ?>
	
	<div class="grid-container">
		<div class="grid-x">

			<div class="small-12 medium-7 cell">
				<div class="border-container">
					<div class="gold-border-div">
					</div>
					<h1><?php the_field('homepage_section_team_title', 'option'); ?></h1>
					<?php the_field('homepage_section_team_text', 'option'); ?>

					<a class="button" href="<?php the_field('homepage_section_team_button_url', 'option'); ?>" title="<?php the_field('homepage_section_team_button_text', 'option'); ?>"><?php the_field('homepage_section_team_button_text', 'option'); ?></a>
				

					<div id="team-member-images">
						<div class="grid-x grid-margin-x">
<?php
// WP_Query arguments
$args = array(
	'post_type'				=> array( 'austeve-team' ),
	'post_status'			=> array( 'publish' ),
	'posts_per_page'		=> '6',
	'orderby'				=> 'menu_order',
	'order'					=> 'ASC',
	'tax_query'				=> array(
		array(
			'taxonomy'         => 'team-category',
			'terms'            => 'consultant',
			'field'            => 'slug',
			'operator'         => 'NOT IN',
		),
	),
	
);

// The Query
$query = new WP_Query( $args );
$count = 0;
// The Loop
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
		$count++;
		echo get_template_part('template-parts/austeve-team', 'front-page');
	}
} else {
	// no posts found
}

// Restore original Post Data
wp_reset_postdata();
?>
						</div>
					</div>
				</div>
			</div>
			
		</div>

		
	</div>
</div> <!-- #section-team -->

<div id="section-services" class="front-page-section">
	<div class="gold-border-div">
	</div>
<?php
$image = get_field('homepage_section_services_background_image', 'option');
if ($image):
?>
	<div class="background-div" style="background-image:url(<?php echo $image['url'];?>)">
	</div>
<?php endif; ?>
	
	<div class="grid-container">
		<div class="grid-x">

			<div class="small-12 cell">
				<div class="front-page-services">
					<div class="container">
						<h1><?php the_field('homepage_section_services_title', 'option'); ?></h1>
						<?php the_field('homepage_section_services_text', 'option'); ?>

						<div class="grid-x">
							<div class="cell text-center medium-text-right">
								<a class="button" href="<?php the_field('homepage_section_services_button_url', 'option'); ?>" title="<?php the_field('homepage_section_services_button_text', 'option'); ?>"><?php the_field('homepage_section_services_button_text', 'option'); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div> <!-- #section-services -->

<div id="section-stories" class="front-page-section">
<?php
$image = get_field('homepage_section_stories_background_image', 'option');
if ($image):
?>
	<div class="background-div" style="background-image:url(<?php echo $image['url'];?>)">
	</div>
<?php endif; ?>
	
	<div class="grid-container">
		<div class="grid-x">

			<div class="small-12 cell">

				<div class="grid-x">
					<div class="cell">
						<h1><?php the_field('homepage_section_stories_title', 'option'); ?></h1>
					</div>
				</div>
				<div class="grid-x grid-margin-x">

<?php
// WP_Query arguments
$args = array(
	'post_type'              => array( 'post' ),
	'post_status'            => array( 'publish' ),
	'posts_per_page'         => '4',
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
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();

		echo get_template_part('template-parts/post', 'front-page');
	}
} else {
	// no posts found
}

// Restore original Post Data
wp_reset_postdata();
?>
				</div>

				<div class="grid-x">
					<div class="cell text-center medium-text-right">
						<a class="button" href="<?php the_field('homepage_section_stories_button_url', 'option'); ?>" title="<?php the_field('homepage_section_stories_button_text', 'option'); ?>"><?php the_field('homepage_section_stories_button_text', 'option'); ?></a>
					</div>
				</div>
				
			</div>

		</div>
	</div>
</div> <!-- #section-services -->

<?php
get_footer();
