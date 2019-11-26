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
<script type="text/javascript">

jQuery( document ).ready(function() {

	var headerHeight;
	jQuery("header").first().each(function() {
		headerHeight = jQuery(this).height();
		var ctaTopPadding;

		if (headerHeight < jQuery(window).height()) {
			jQuery(".header-and-cta-background-image .call-to-action").first().each(function() {
				ctaTopPadding = "calc(100vh + 6rem)";
				jQuery(this).css("padding-top", ctaTopPadding);
			});
		}
		else {
			jQuery(".header-and-cta-background-image .call-to-action").first().each(function() {
				ctaTopPadding = "calc("+(headerHeight)+"px + 6rem)";
				jQuery(this).css("padding-top", ctaTopPadding);
			});
		}

		var ctaOuterHeight = jQuery(".header-and-cta-background-image .call-to-action").first().outerHeight();
		jQuery(".header-and-cta-background-image").first().each(function() {
			jQuery(this).css("min-height", ctaOuterHeight);
		});
	});

	//resize background image depending on screen size
	

});
</script>