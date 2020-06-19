<?php
	$footerSettings = get_field('footer_settings', 'option');
	$footerLogoUrl = wp_get_attachment_image_src($footerSettings['logo'], 'footer-logo')[0];
?>
<div class="cell text-center medium-half-height">
	<a class="home-reset-scroll" data-section="2">
		<div class="grid-y align-right background" style="background-image: url(<?php echo $footerLogoUrl; ?>); height: 100%; min-height: 300px; background-size: auto 60%; background-repeat: no-repeat;">
			<div class="cell archive-content">
				<div class="grey-background">

				</div>
				<div class="title">
					<?php echo ucwords(strtolower($footerSettings['back_to_top_text'])); ?>
				</div>
			</div>
		</div>
	</a>
</div>