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

					$queries = array();
					parse_str($_SERVER['QUERY_STRING'], $queries);

					if (array_key_exists('url', $queries))
					{
						//if 'url' querystring parameter is giving then embed that
						$urlToEmbed = urldecode($queries['url']); 
						//error_log("Embedding: ".$urlToEmbed);
					}
					else
					{
						//otherwise default to the theme setting
						$urlToEmbed = get_field('embedded_content_url');; 
					}
					?>
					<iframe src="<?php echo $urlToEmbed;?>" style="background: #FFFFFF;"></iframe>
					<?php
				endwhile;

			endif;
			?>
		</div>

	</div>

</div>

<?php
get_footer();

