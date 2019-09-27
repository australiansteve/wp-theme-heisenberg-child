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

		<div class="small-12 medium-4 show-for-medium cell">

			<a href="<?php the_field('oa_system_link', 'option');?>" class="button"><?php the_field('grants_page_apply_button_text', 'option');?></a>

		</div>
	</div>

	<div class="grid-x grid-padding-x">
		<?php
		$theSubMenu = 'grants-menu';
		get_template_part( 'template-parts/sub-menu' ); 
		?>
	</div>

	<div class="grid-x grid-padding-x">
		<?php
		if ( have_posts() ) :

			while ( have_posts() ) :

				the_post();
				?>
				<div class="small-12 cell">
					<div class="container austeve-program">
						<div class="grid-x">
							<div class="cell small-12 medium-8 left-column">
								<h2><?php the_title( ); ?></h2>

								<?php the_content();?>

								<a href="<?php the_field('oa_system_link', 'option');?>" class="button"><?php the_field('grants_page_apply_button_text', 'option');?></a>
							</div>
							<div class="cell small-12 medium-4 right-column">
								<div class="grid-x">
									<div class="cell small-12 small-order-1 medium-order-2 deadlines">
										<?php echo get_template_part('template-parts/austeve-programs', 'deadlines');?>
									</div>
									<div class="cell small-12 small-order-2 medium-order-1 featured-image">
										<?php echo get_template_part('template-parts/austeve-programs', 'thumbnail');?>
									</div>
								</div>
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
