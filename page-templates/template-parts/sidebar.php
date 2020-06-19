<div class="grid-x">
	<div class="cell">
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
		<?php get_search_form(); ?>
		<!--
		<h2>Channels</h2>
		<ul>
			<?php wp_list_categories(array(
				'title_li' => ''
			)); ?>
		</ul>
		-->
		<?php if (is_search() || is_archive('category')) : ?>
		<div class="clear-filters">
			<a class="button" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"><?php the_field('clear_filters_button_text', 'option');?></a>
		</div>
		<?php endif; ?>
	</div>
</div>