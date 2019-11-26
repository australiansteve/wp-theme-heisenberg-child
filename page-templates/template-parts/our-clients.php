<?php
$clientsBgImageUrl = get_field('front_page_clients_section_background_image', 'option');
?>
<div id="clients-section">

	<div class="background-container" style="background-image: url('<?php echo $clientsBgImageUrl; ?>')">

		<div class="content-container">
			<div class="grid-x">
				<div class="cell">
					<h3><?php the_field('front_page_clients_section_title', 'option'); ?></h3>
				</div>

				<div class="cell">
					<?php the_field('front_page_clients_section_text', 'option'); ?>
				</div>

				<div class="cell scrolling-panel" data-scroll="client">
					<?php

					// check if the repeater field has rows of data
					if( have_rows('front_page_clients_section_logos', 'option') ):

 						// loop through the rows of data
						while ( have_rows('front_page_clients_section_logos', 'option') ) : the_row();

							echo get_template_part('page-templates/template-parts/client', 'front-page');

						endwhile;

					endif;

					?>
				</div>

				<script>
					(function scrollClients() {
					    jQuery(".scrolling-panel>div.client:first").each(function(){
					        jQuery(this).animate({marginLeft:-jQuery(this).outerWidth(true)},2000,function(){
					            jQuery(this).insertAfter(".scrolling-panel>div.client:last");
					            jQuery(this).css({marginLeft:0});
					            scrollClients();
					        });
					    });
					})();
				</script>
			</div>


		</div>

	</div>

</div>
