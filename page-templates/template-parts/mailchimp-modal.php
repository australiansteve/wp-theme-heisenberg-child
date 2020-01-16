
<!-- The Modal -->
<div id="mcModal" class="reveal modal" data-reveal data-animation-in="fade-in">

<!-- Modal content -->
<div class="modal-content">	

<!-- Begin Mailchimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
	/* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div id="mc_embed_signup">
<form action="<?php the_field('mc_form_action', 'option'); ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
	<h2><?php the_field('mc_dialog_title', 'option'); ?></h2>
	<div class="custom-message">
		<?php the_field('mc_dialog_introduction', 'option'); ?>
	</div>
	<div class="grid-x">
		<div class="cell medium-9">
			<div class="mc-field-group">
				<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Enter your email address">
			</div>
		</div>
		<div class="cell medium-3">
			<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
		</div>
	</div>


	<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_5decc579acd5eca494baab741_d8524ef66f" tabindex="-1" value=""></div>
    
    </div>
</form>
</div>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup-->

</div>
<a class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </a>
</div>

<?php
$ajax_nonce = wp_create_nonce( "get_signup" );
?>
<script>
	function getSignup(callback) {
		jQuery.ajax({
				type: 'POST',
				url: '<?php echo admin_url('admin-ajax.php');?>',
		        dataType: "html", // add data type		        
		        data: { 
		        	action : 'austeve_get_newsletter_signup', 
		        	security: '<?php echo $ajax_nonce; ?>', 
		        },
		        success: function( response ) {
		        	console.log("Response: " + response);
		        	if (response != 'SIGNED UP') {
		        		callback();
		        	}
		        }
		    });
	}
<?php
$ajax_nonce = wp_create_nonce( "set_signup" );
?>
	function doSignup() {
		jQuery.ajax({
				type: 'POST',
				url: '<?php echo admin_url('admin-ajax.php');?>',
		        dataType: "html", // add data type		        
		        data: { 
		        	action : 'austeve_set_newsletter_signup', 
		        	security: '<?php echo $ajax_nonce; ?>', 
		        },
		        success: function( response ) {
		        	console.log("doSignup response: " + response);
		        }
		    });
	}

	function showSignup() {
		setTimeout(function(){
			jQuery(".mc-signup-call").addClass('show');
		}, 5000);
	}

	jQuery(document).ready(function() {
		getSignup(showSignup);
	})
</script>

<fieldset style="border:1px solid grey; padding: 1rem; display: none">
	<div>These buttons won't actually appear until we decide what to do with the signup form exactly</div>
<button class="button" data-open="mcModal">Newsletter</button>
<button class="button" onclick="getSignup(showSignup)">Get Cookie</button>
<button class="button" onclick="doSignup()">Trigger signup success</button>
</fieldset>
<div class="mc-signup-call">
	<a class="button" data-open="mcModal">Newsletter</a>
	</div>