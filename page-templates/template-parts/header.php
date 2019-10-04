<header class="grid-container">

	<?php
	if ( has_custom_logo() ) :
		the_custom_logo();
	else:

		printf( '<h1><a href="%s" rel="home">%s</a></h1>',
			esc_url( home_url( '/' ) ),
			esc_html( get_bloginfo( 'name' ) )
		);

		printf( '<p class="h4">%s</p>', esc_html( get_bloginfo( 'description' ) ) );
	endif;

	if (is_tax('project-category')):
		echo "<div id='page-title'><h1>".get_field('projects_page_title', 'option')."</h1></div>";
	elseif (is_singular('austeve-projects')):
		echo "<div id='page-title'><h1>".get_field('projects_page_title', 'option')."</h1></div>";
	elseif (is_singular('austeve-services')):
		echo "<div id='page-title'><h1>".get_field('services_page_title', 'option')."</h1></div>";
	else:
		the_title( '<div id="page-title"><h1>', '</h1></div>' );
	endif;

	if (is_front_page()) :
		?>
		<h2 class='primary-tagline'><?php the_field('front_page_primary_tagline', 'option');?></h2>
		<div class='secondary-tagline'><?php the_field('front_page_secondary_tagline', 'option');?></div>
		<?php
	endif;

	?>

</header>