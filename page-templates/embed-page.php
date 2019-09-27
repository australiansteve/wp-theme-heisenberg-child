<?php
/***
  * Template Name: Embedded Content
  */

get_header(); 


if (!function_exists('startsWith'))
{
	function startsWith ($string, $startString) 
	{ 
		$len = strlen($startString); 
		return (substr($string, 0, $len) === $startString); 
	}
}

?>
<script type="text/javascript">
  window.addEventListener('message', event => {
    if (event.origin.startsWith('https://artsnb.ca') || event.origin.startsWith('http://local.artsnb:8888')) { 
        // Message sent from a trusted site. Data is stored in event.data:
        //console.log(event.data); 
        iframe = document.getElementById("embeddedFrame");
        iframe.height = event.data.setHeight + "px";
    } else {
        // Ignore - untrusted origin
        return; 
    } 
}); 
</script>  

<div class="container" id="embedded-content">

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

						//Ensure url to embed is of an allowed domain
						$isOk = false;
						$allowedDomains = array("https://artsnb.ca", "https://staging-artsnb.weavercrawford.com", "http://local.artsnb:8888");
						foreach($allowedDomains as $domain)
						{
							if (startsWith($urlToEmbed, $domain))
							{
								$isOk = true;
								break;
							}
						}
						if (!$isOk)
						{
							//If url is not on the list of approved domains then it gets canned
							$urlToEmbed = get_field('embedded_content_url');; 
						}

					}
					else
					{
						//otherwise default to the theme setting
						$urlToEmbed = get_field('embedded_content_url');; 
					}
					?>
					<iframe id="embeddedFrame" src="<?php echo $urlToEmbed;?>" style="background: #FFFFFF;"></iframe>
					<?php
				endwhile;

			endif;
			?>
		</div>

	</div>

</div>

<?php
get_footer();

