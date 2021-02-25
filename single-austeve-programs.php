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

								<?php 
								$showApplyButton = get_field('show_apply_online_button');
								error_log("showApplyButton: ".print_r($showApplyButton, true));
								if (get_field('show_apply_online_button')) : ?>
								<a href="<?php the_field('oa_system_link', 'option');?>" class="button"><?php the_field('grants_page_apply_button_text', 'option');?></a>
								<?php endif;?>
							</div>
							<div class="cell small-12 medium-4 right-column">
								<div class="grid-x">
									<?php if (get_field('show_deadlines')) : ?>
										<div class="cell small-12 small-order-1 medium-order-2 deadlines">
											<?php echo get_template_part('template-parts/austeve-programs', 'deadlines');?>
										</div>
									<?php endif; ?>
									<div class="cell small-12 small-order-2 medium-order-1 featured-image">
										<?php echo get_template_part('template-parts/austeve-programs', 'thumbnail');?>
									</div>
									<?php 
									$sidebarContent = get_field('sidebar_content');

									if ($sidebarContent) : ?>
										<div class="cell small-12 small-order-1 medium-order-2 sidebar-content">
											<div style="padding: <?php the_field('sidebar_content_padding');?>px; background-color: <?php the_field('sidebar_content_background');?>">
											<?php echo $sidebarContent; ?>
											</div>
										</div>
									<?php endif; ?>
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
