<div class="call-to-action">
	<div class="content-container">
		<div class="cta-title">
			<h3><?php the_field('front_page_call_to_action_title', 'option');?></h3>
		</div>
		<div class="cta-text">
			<?php the_field('front_page_call_to_action_text', 'option');?>
		</div>
		<div class="cta-button">
			<a class="button" href="<?php the_field('front_page_call_to_action_button_link', 'option');?>"><?php the_field('front_page_call_to_action_button_text', 'option');?></a>
		</div>
	</div>
</div>