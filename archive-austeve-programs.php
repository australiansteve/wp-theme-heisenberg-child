<?php
/***
  * Archive page for Grant Programs
  */

get_header(); ?>

<div class="content-container">

	<div class="container">
		<div class="grid-x grid-padding-x">

			<div class="small-12 medium-8 cell">

				<h1><?php the_field('grants_page_title', 'option');?></h1>
				
			</div>

			<div class="small-12 medium-4 cell">

				<a href="<?php the_field('oa_system_link', 'option');?>" class="button"><?php the_field('grants_page_apply_button_text', 'option');?></a>
				
			</div>
		</div>
	</div>

	<div class="container">
		<div class="grid-x grid-padding-x">
			<?php
			$theSubMenu = 'grants-menu';
			get_template_part( 'template-parts/sub-menu' ); 
			?>
		</div>
	</div>

	<div class="container">
		<div class="grid-x grid-padding-x">
			<?php
			if ( have_posts() ) :

				while ( have_posts() ) :

					the_post();
					?>
					<div class="small-12 medium-4 cell">
						<div class="container austeve-program">
							<div class="grid-x">
								<div class="cell small-12 featured-image">
									<a href="<?php the_permalink();?>">
										<?php
										
										if (has_post_thumbnail())
										{
											the_post_thumbnail('program_featured_image');
										}
										?>
									</a>
								</div>
								<div class="cell small-12">
									<h3><a href="<?php the_permalink();?>">
										<?php
										the_title( );
										?>
									</a></h3>
								</div>
							</div>
						</div>
					</div>
					<?php

				endwhile;
			endif;
			?>
			<!-- Apply now will always be the last thing -->
			<div class="small-12 medium-4 cell">
				<div class="container austeve-program">
					<div class="grid-x">
						<div class="cell small-12 featured-image">
							<a href="<?php the_field('oa_system_link', 'option');?>"><?php 
							$image = get_field('grants_page_apply_now_link_image', 'option');
								$size = 'full'; // (thumbnail, medium, large, full or custom size)

								if( $image ) {

									echo wp_get_attachment_image( $image, $size );

								}
								?></a>
								<?php
								
								?>
							</div>
							<div class="cell small-12">
								<h3><a href="<?php the_field('oa_system_link', 'option');?>"><?php the_field('grants_page_apply_button_text', 'option');?></a></h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
	get_footer();
