<?php
/** 
 * Template Name: Services sub-page
 */

get_header(); 

if ( have_posts() ) :

	while ( have_posts() ) :

		the_post();
		?>
		<?php 
		$image = get_field('page_title_background_image', 'option');
		if ($image):
			?>
			<div class="background-div page-title-background" style="background-image:url(<?php echo $image['url'];?>)">
			</div>

			<?php 
		endif; 
		?>

		<div class="page-content">
			<div class="grid-x grid-padding-x page-title">
				<div class="small-12 cell">

					<div class="page-title-container">
						<h1><?php echo get_the_title($post->post_parent); ?></h1>
						<?php 

						$theSubMenu = 'services-menu';
						get_template_part( 'template-parts/sub-menu' ); 

						?>


					</div>

				</div>
			</div>

			<div class="grid-x grid-padding-x page-content">

				<div class="small-12 medium-offset-1 cell">

					<div class="content-container">
						<div class="text-shaper">
						</div>
							<h2><?php the_title(); ?></h2>
							<?php
							the_content();
							?>
					</div>

					<div class="client-profile-container">

						<div class="grid-x">
							<div class="cell">
								<div class="border-container">
									<div class="gold-border-div inset">
									</div>
									<div class="grid-x" id="picture-row">
										<div class="cell medium-6 image-horizontal">
											<?php 
											$image = get_field('image_1');
											$size = 'client_horizontal'; // (thumbnail, medium, large, full or custom size)
											
											if( $image ) {
												echo wp_get_attachment_image( $image, $size );
											}
											?>
										</div>
										<div class="cell medium-6 image-vertical">
											<?php 
											$image = get_field('image_2');
											$size = 'client_vertical'; // (thumbnail, medium, large, full or custom size)
											
											if( $image ) {
												echo wp_get_attachment_image( $image, $size );
											}
											?>
										</div>
									</div>
									<div class="client-profile">
										<div class="grid-x" >
											<div class="cell medium-6 medium-offset-6">
												<h3><?php the_field('client_name');?></h3>
												<?php the_field('short_description');?>

												<a class="button" href="<?php the_field('button_url');?>"><?php the_field('button_text');?></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>

		</div>
		<?php


	endwhile;

else :

	echo esc_html( 'Sorry, no posts' );

endif;
get_footer();
