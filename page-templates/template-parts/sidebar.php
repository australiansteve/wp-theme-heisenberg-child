<div class="grid-x">
	<div class="cell">
		<?php if (is_singular('post') && has_category('press-release')) : ?>
			<div class="back-to-media-room text-center">
				<a class="button" href="<?php the_field('single_post_press_release_back_button_link', 'option');?>" style="display: block;"><?php the_field('single_post_press_release_back_button_text', 'option');?></a>
			</div>
			<?php elseif (is_singular('post')) : ?>
			<div class="back-to-channel-4 text-center">
				<a class="button" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" style="display: block;"><?php the_field('single_post_back_button_text', 'option');?></a>
			</div>
			<?php else: ?>

				<div class="blog-description">
					<?php the_field('blog_description', 'option'); ?>
				</div>

				<div class="subscription-form">
					<?php 
					$formId = get_field('subscription_form_id', 'option');
					if ($formId):
						echo do_shortcode("[ninja_form id=".$formId."]");
					endif; ?>
				</div>
			<?php endif;?>
			<?php get_search_form(); ?>
			<?php if (is_search() || is_archive('category')) : ?>
			<div class="clear-filters">
				<a class="button" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"><?php the_field('clear_filters_button_text', 'option');?></a>
			</div>
		<?php endif; ?>
	</div>
</div>