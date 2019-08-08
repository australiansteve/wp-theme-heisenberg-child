<?php
/***
  * Template Name: Embedded Content
  */

get_header(); ?>

<div class="container">

	<div class="grid-x grid-padding-x">

		<div class="small-12 cell">

			<?php

			if ( have_posts() ) :

				while ( have_posts() ) :

					the_post();
					?>
					<iframe src="<?php the_field('embedded_content_url');?>" style="background: #FFFFFF;"></iframe>
					<?php
				endwhile;

			endif;
			?>
		</div>

	</div>

</div>

<?php
get_footer();

