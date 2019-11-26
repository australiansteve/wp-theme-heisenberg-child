<?php
if (is_front_page()) :
	?>
	<script type="text/javascript">
		function updateServiceText(serviceSlug) {
			jQuery('.service-' + serviceSlug).each(function() {

				jQuery(".services-text")[0].innerHTML = jQuery('.service-' + serviceSlug)[0].innerHTML;
				jQuery('html, body').animate({
					scrollTop: jQuery("#services-section").offset().top
				}, 500);
			});
		}
	</script>
	<?php
else :
	?>
	<script type="text/javascript">
		function scrollPageTo(serviceSlug) {
			jQuery('#service-' + serviceSlug).each(function() {
				jQuery('html, body').animate({
					scrollTop: jQuery('#service-' + serviceSlug).offset().top
				}, 2000);
			});
		}
	</script>
	<?php
endif;
?>