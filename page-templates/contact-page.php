<?php
/*
 * Template Name: Contact Page
 */
get_header(); ?>

<div class="grid-x grid-padding-x">

	<div class="small-12 cell">
		<?php
		if ( have_posts() ) :

			while ( have_posts() ) :

				the_post();

				the_title( '<h2>', '</h2>' );

				the_post_thumbnail('post-featured-image');

				?>
				<div class="page-content">

					<div class="grid-x">

						<div class="cell small-12 medium-7 medium-order-2">
							<?php
							the_content();

							if (get_field('newsletter_signup_button_action') && get_field('newsletter_signup_button_text')) :
								?>
								<div class="newsletter-subscribe">
									<a class='button' <?php the_field('newsletter_signup_button_action');?>><?php the_field('newsletter_signup_button_text');?></a>
								</div>
								<?php
							endif;
							
							if( have_rows('social_links') ):
								?>
								<div class="social-links">

									<?php
									while ( have_rows('social_links') ) : the_row();

										echo "<a class='social-link' href='".get_sub_field('link')."' title='".get_sub_field('title')."' target='blank'><i class='fab ".get_sub_field('icon')."'></i></a>";

									endwhile;
									?>
								</div>

								<?php
							endif;
							?>

						</div>


						<div class="cell small-12 medium-5 medium-order-1">
						<div class="contact-ninja">
							<?php 
							$formid = get_field('ninja_form_id');
							if( $formid ) {
								echo do_shortcode("[ninja_form id=".$formid."]");
							}
							?>
						</div>
						</div>

					</div>

				</div>
				<?php

			endwhile;

		else :

			echo esc_html( 'Sorry, no posts' );

		endif;
		?>
	</div>

</div>

<?php
get_footer();
