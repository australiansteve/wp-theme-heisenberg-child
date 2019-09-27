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