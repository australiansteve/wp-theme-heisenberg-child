<?php
get_header(); 

echo get_template_part('page-templates/template-parts/service', 'javascript'); 

$servicesBgImageUrl = get_field('front_page_services_section_background_image', 'option');
?>
<div id="services-section" style="background-image: <?php echo get_template_part('page-templates/template-parts/background-color', 'white-top-down');?>, url('<?php echo $servicesBgImageUrl; ?>')">

	<main class="grid-container">

		<div class="grid-x grid-margin-x">

			<div class="cell">

				<div class="grid-x">

					<div class="small-12 cell title">

						<h3><?php the_field('front_page_services_section_title', 'option'); ?></h3>

					</div>

				</div>

				<div class="grid-x grid-margin-x">

					<div class="cell small-12 medium-6 medium-order-1">

						<div class="services-text">

							<?php the_field('front_page_services_section_text', 'option'); ?>

						</div>

					</div>

					<div class="cell learn-more medium-6 medium-order-3">

						<a class="button" href="<?php the_field('front_page_services_section_button_link', 'option'); ?>"><?php the_field('front_page_services_section_button_text', 'option'); ?></a>

					</div>

					<?php echo get_template_part('page-templates/template-parts/services-buttons');?>

				</div>

				<div class="grid-x">


				</div>

			</div>

		</div>

	</main>

</div>

<div id="projects-section">

	<div class="content-container">

		<div class="grid-x">

			<div class="small-12 cell title">

				<h3><?php the_field('front_page_projects_section_title', 'option'); ?></h3>

			</div>

			<div class="small-12 cell text">

				<?php the_field('front_page_projects_section_text', 'option'); ?>

			</div>

			<div class="small-12 cell projects">
				<script type="text/javascript">
					jQuery( document ).ready(function() {
						var maxHeight = 0;
						var maxDescriptionHeight = 0;

						jQuery(".featured-project").each(function(){
							if (jQuery(this).height() > maxHeight) { maxHeight = jQuery(this).height(); }
							if (jQuery(this).find(".short-description").height() > maxDescriptionHeight) { maxDescriptionHeight = jQuery(this).find(".short-description").height(); }
						});

						jQuery(".featured-project").height(maxHeight);
						jQuery(".featured-project .short-description").css({'min-height': maxDescriptionHeight});
						
						if (jQuery(".scrolling-panel td.featured-project").length > 2)
						{
							(function scrollProjects() {
								jQuery(".scrolling-panel td.featured-project:first").each(function(){
									jQuery(this).animate({marginLeft:-jQuery(this).outerWidth(true)},3000,function(){
										jQuery(this).insertAfter(".scrolling-panel td.featured-project:last");
										jQuery(this).css({marginLeft:0});
										setTimeout(function(){
											scrollProjects();
										},5000);
									});
								});
							})();
						}
					});
				</script>
				<div class="scrolling-panel" data-scroll="featured-project">
					<table>
						<tbody style="border:none">
							<tr>
								<?php
								// WP_Query arguments
								$args = array(
									'post_type'              => array( 'austeve-projects' ),
									'post_status'            => array( 'publish' ),
									'posts_per_page'         => '-1',
									'tax_query'              => array(
										array(
											'taxonomy'         => 'project-category',
											'terms'            => 'current',
											'field'            => 'slug',
											'operator'         => 'IN',
										),
									),
								);

								// The Query
								$projectsquery = new WP_Query( $args );

								// The Loop
								if ( $projectsquery->have_posts() ) {
									while ( $projectsquery->have_posts() ) {
										$projectsquery->the_post();
										echo get_template_part('page-templates/template-parts/project', 'front-page');
									}
								} else {
									// no posts found
								}

								// Restore original Post Data
								wp_reset_postdata();
								?>	
							</tr>
						</tbody>
					</table>
				</div> 
			</div>

		</div>

	</div>
</div>

<?php echo get_template_part('page-templates/template-parts/our-clients'); ?>

<?php
$contactBgImageUrl = get_field('front_page_contact_section_background_image', 'option');
?>
<div id="contact-section" style="background-image: url('<?php echo $contactBgImageUrl; ?>')">

	<div class="content-container">

		<div class="grid-x text-center">
			<div class="cell">
				<h3><?php the_field('front_page_contact_section_title', 'option'); ?></h3>
			</div>

			<div class="cell">
				<?php the_field('front_page_contact_section_text', 'option'); ?>
			</div>

			<div class="cell">
				<a class="button" href="<?php the_field('front_page_contact_section_button_link', 'option'); ?>"><?php the_field('front_page_contact_section_button_text', 'option'); ?></a>
			</div>
		</div>
	</div>

</div>
<?php
get_footer();
