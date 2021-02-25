<?php
/***
  * Archive page for Grant Programs
  */

get_header(); ?>

<div class="container">

	<div class="grid-x grid-padding-x">

		<div class="small-12 medium-8 cell">

			<h1><?php the_field('grants_page_title', 'option');?></h1>

		</div>

		<div class="small-12 medium-4 cell">

			<a href="<?php the_field('oa_system_link', 'option');?>" class="button"><?php the_field('grants_page_apply_button_text', 'option');?></a>

		</div>
	</div>
	
	<div class="grid-x grid-padding-x">
		<?php
		$theSubMenu = 'grants-menu';
		get_template_part( 'template-parts/sub-menu' ); 
		?>
		<div class="small-12 cell" id="sub-title">
			<h2><?php the_field('grants_page_subtitle', 'option');?></h2>
		</div>
	</div>
	
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
										the_post_thumbnail('program_featured_image', ['title' => get_the_post_thumbnail_caption()]);
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
	</div>
</div>
<?php
get_footer();
