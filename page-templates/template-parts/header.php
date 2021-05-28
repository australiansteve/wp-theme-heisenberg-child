<?php
	$videoVimeoId = "";	
	if (is_tax('project-category')) {
		//echo get_queried_object()->taxonomy."_".get_queried_object()->term_id;
		$videoVimeoId = get_field('projects_page_video_background_vimeo_id', get_queried_object()->taxonomy."_".get_queried_object()->term_id);
	}
	elseif (is_archive('austeve-projects')) {
		$videoVimeoId = get_field('projects_page_background_image', 'option');	
	}
	else {
		$videoVimeoId = get_field('video_background_vimeo_id'); 
	}

	$videoEmbed = !empty($videoVimeoId);

	if ($videoEmbed) {
		$featured_img_url = "";
		$backgroundClass = "bg-video";
	}
	else {
		$backgroundClass = "bg-image";

		/* grab the url for the full size featured image */
		if (is_tax('project-category')) {
			//echo get_queried_object()->taxonomy."_".get_queried_object()->term_id;
			$featured_img_url = get_field('projects_page_background_image', get_queried_object()->taxonomy."_".get_queried_object()->term_id);
		}
		elseif (is_archive('austeve-projects')) {
			$featured_img_url = get_field('projects_page_background_image', 'option');	
		}
		elseif (has_post_thumbnail()) {
			$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full'); 
		}
		elseif (is_singular('austeve-projects') && !has_post_thumbnail()) {
			$featured_img_url = get_field('projects_page_background_image', 'option');	
		}
		else {
			$featured_img_url = get_field('front_page_background_image', 'option');
		}
	}

	$backgroundImage = !empty($featured_img_url) ? ", url(".$featured_img_url.")" : "";

?>

<div class="header-bg" style="background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(0, 0, 0, 0.5)) <?php echo $backgroundImage?>;">
	<header class="grid-container <?php echo $backgroundClass; ?>">

		<?php 
		if ($videoEmbed) {
			echo get_template_part('page-templates/template-parts/header', 'video'); 
		} 

		if ( has_custom_logo() ) :
			the_custom_logo();
		else:
			printf( '<h1><a href="%s" rel="home">%s</a></h1>',
				esc_url( home_url( '/' ) ),
				esc_html( get_bloginfo( 'name' ) )
			);
			printf( '<p class="h4">%s</p>', esc_html( get_bloginfo( 'description' ) ) );
		endif;

		?>

		<div class="text-container">
			<div class="grid-x">
				<div class="cell">
				<?php
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
				</div>
			</div>
		</div>
	</header>
</div>