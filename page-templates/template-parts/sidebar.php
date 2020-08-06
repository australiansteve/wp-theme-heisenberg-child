<?php 
$returnParams = "";
$searchTerm = "";
$cookie_name = 'returninfo';
if(isset($_COOKIE[$cookie_name])) {
  $returnInfo = json_decode(stripslashes($_COOKIE[$cookie_name]));
  foreach($returnInfo as $key => $value) {
  	if ($key == 's') {
		$searchTerm = $value;
		if ($value != "") {
			$returnParams .= $key."=".$value."&";
		}
	}
	else {
		$returnParams .= $key."=".$value."&";
	}
  }
  $returnParams =  rtrim($returnParams, "&");  
} 

$returnLink = "";
$returnText = "";
if (is_singular('post') && $searchTerm != "") :
	$returnLink = site_url();
	$returnText = get_field("single_post_search_results_back_button_text", "option");
elseif (is_singular('post') && has_category('press-release')) :
	$returnLink = get_field('single_post_press_release_back_button_link', 'option');
	$returnText = get_field('single_post_press_release_back_button_text', 'option');

elseif (is_singular('post')) :
	$returnLink = get_permalink( get_option( 'page_for_posts' ) );
	$returnText = get_field('single_post_back_button_text', 'option');
endif;

?>
<div class="grid-x">
	<div class="cell">
		<?php if ($returnText != "" && $returnLink != "") : ?>
		<div class="text-center">
			<a class="button" href="<?php echo $returnLink;?>?<?php echo $returnParams;?>" style="display: block;"><?php echo $returnText;?></a>
		</div>
		<?php else: ?>

			<div class="blog-description">
				<?php the_field('blog_description', 'option'); ?>
			</div>

			<div class="subscription-form">
				<?php 
				$formId = get_field('subscription_form_id', 'option');
				if ($formId):
					echo do_shortcode("[ninja_form id=".$formId."]");
				endif; ?>
			</div>
		<?php endif;?>
		<?php get_search_form(); ?>
		<?php if (is_search() || is_archive('category')) : ?>
			<div class="clear-filters">
				<a class="button" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>?scrollto=section_2"><?php the_field('clear_filters_button_text', 'option');?></a>
			</div>
		<?php endif; ?>
	</div>
</div>