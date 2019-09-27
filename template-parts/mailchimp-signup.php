<div class="reveal" id="mailchimpSignupModal" data-reveal>
	<h2 id="modalTitle"><?php the_field('mc_dialog_title', 'option');?></h2>
	<p><?php the_field('mc_dialog_introduction', 'option');?></p>
	<?php the_field('mc_embed_code', 'option');?>
	<p><?php the_field('mc_dialog_conclusion', 'option');?></p>

	<button class="close-button" data-close aria-label="Close modal" type="button">
		<span aria-hidden="true">&times;</span>
	</button>

</div>