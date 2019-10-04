<div class="cell small-12 medium-6">

	<?php
	if (is_front_page())
	{
		$buttonFormat = "front-page";
	}
	else if (is_page())
	{
		$buttonFormat = "services-page";
	} 
	// WP_Query arguments
	$args = array(
		'post_type'              => array( 'austeve-services' ),
		'post_status'            => array( 'publish' ),
		'posts_per_page'         => '-1',
	);

	// The Query
	$servicesquery = new WP_Query( $args );

	// The Loop
	if ( $servicesquery->have_posts() ) {
		while ( $servicesquery->have_posts() ) {
			$servicesquery->the_post();
			echo get_template_part('page-templates/template-parts/service-button', $buttonFormat);
		}
	} else {
		// no posts found
	}

	// Restore original Post Data
	wp_reset_postdata();
	?>	

</div>