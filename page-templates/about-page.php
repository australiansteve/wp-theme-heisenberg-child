<?php
/*
 * Template Name: About Page
 */
get_header(); ?>

<main class="grid-container">

	<?php
	if ( have_posts() ) :

		while ( have_posts() ) :

			the_post();

			the_post_thumbnail('post-featured-image');

			?>

			<div class="grid-x grid-padding-x">

				<div class="small-12 cell">

					<div class="page-content">

						<div class="grid-x">

							<div class="cell medium-auto medium-order-2">
								<?php
								the_content();
								?>
							</div>

							<div class="cell medium-shrink headshot medium-order-1">
								<?php 
								$image = get_field('headshot');
								$size = 'headshot-image';
								if( $image ) {
									echo wp_get_attachment_image( $image, $size );
								}
								?>
							</div>

						</div>

					</div>

				</div>

			</div>
			
		</main>

		<div class="grid-x info-sections" data-equalizer="section-title">

			<?php
			$info_sections = get_field('info_sections');
			if( $info_sections ): 
				?>
				<div class="cell medium-4 info-left" style="background-color:<?php echo $info_sections['left']['background_color'];?>">
					<div class="container">
						<div class="section-title" data-equalizer-watch="section-title">
							<h3><?php echo $info_sections['left']['title'];?></h3>	
						</div>	
						<div class="grid-x">
							<div class="cell large-10 xxlarge-6 large-offset-1 xxlarge-offset-3">
								<?php echo $info_sections['left']['text'];?>
							</div>
						</div>
					</div>
				</div>
				<div class="cell medium-4 info-center" style="background-color:<?php echo $info_sections['center']['background_color'];?>">
					<div class="container">
						<div class="section-title"  data-equalizer-watch="section-title">
							<h3><?php echo $info_sections['center']['title'];?></h3>	
						</div>	
						<div class="grid-x">
							<div class="cell large-10 xxlarge-6 large-offset-1 xxlarge-offset-3">
								<?php echo $info_sections['center']['text'];?>
							</div>
						</div>
					</div>
				</div>
				<div class="cell medium-4 info-right" style="background-color:<?php echo $info_sections['right']['background_color'];?>">		
					<div class="container">
						<div class="section-title" data-equalizer-watch="section-title">				
							<h3><?php echo $info_sections['right']['title'];?></h3>		
						</div>
						<div class="grid-x">
							<div class="cell large-10 xxlarge-6 large-offset-1 xxlarge-offset-3">
								<?php echo $info_sections['right']['text'];?>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>

		</div>

		<div class="grid-container">
			<div class="grid-x" id="signoff">
				<div class="cell">
					<?php the_field('signoff'); ?>
				</div>
			</div>
		</div>

		<?php

	endwhile;

else :

	echo esc_html( 'Sorry, no posts' );

endif;
?>

<?php
get_footer();
