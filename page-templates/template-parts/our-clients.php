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

				<div class="cell scrolling-panel">
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
			</div>


		</div>

	</div>

</div>
