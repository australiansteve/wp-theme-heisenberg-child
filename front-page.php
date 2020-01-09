<?php
get_header(); ?>

<div class="grid-x grid-padding-x">

	<div class="small-12 cell">
		<?php
		if ( have_posts() ) :

			while ( have_posts() ) :

				the_post();

				?>
				<div class="page-content text-center">
					<?php
					the_content();
					?>
				</div>

				<div class="projects">
					<h2><?php the_field('section_1_title'); ?></h2>


					<div class="grid-x align-middle">
						<div class="cell small-1">
							<a class="previous" href="#">
								<?php
								$image = get_field('left_button_image', 'option');
								$image_url = wp_get_attachment_image_src($image, 'hand-logo')[0];
								echo '<img src=\''.$image_url.'\' title=\'Previous\' />';
								?>

							</a>
						</div>
						<div class="cell small-10">
							<div class="hide-overflow">
								<?php
					// WP_Query arguments
								$args = array(
									'post_type'              => array( 'austeve-projects' ),
									'post_status'            => array( 'publish' ),
								);

					// The Query
								$projectsquery = new WP_Query( $args );
								?>
								<table>
									<tbody style="border:none">
										<tr id="project-scroll">
											<?php
								// The Loop
											if ( $projectsquery->have_posts() ) {
												while ( $projectsquery->have_posts() ) {
													$projectsquery->the_post();
													echo get_template_part('page-templates/project', 'front-page');
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
						<div class="cell small-1">
							<a class="next" href="#"><?php
							$image = get_field('right_button_image', 'option');
							$image_url = wp_get_attachment_image_src($image, 'hand-logo')[0];
							echo '<img src=\''.$image_url.'\' title=\'Next\' />';
							?></a>
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
$ajax_nonce = wp_create_nonce( "front-page-projects" );
?>
<script type="text/javascript">
	var firstProjectVisible = 1; //1 based CSS arrays
	var nextPage = 2; //1 based CSS arrays

	jQuery(".next").on('click', function(e) {
		e.preventDefault();
		if (jQuery("#project-scroll td.project:nth-of-type("+(firstProjectVisible+1)+")").next().length == 1) {
			jQuery("#project-scroll td.project:nth-of-type("+firstProjectVisible+")").css('margin-left', '-50%');
			firstProjectVisible++; //Update first project displayed
		}
		else {
			//No more projects to scroll to
		}

		//Try to load more we're getting nearly the end
		if (firstProjectVisible == jQuery("#project-scroll td.project").length - 3 && nextPage >=0)
		{
			jQuery.ajax({
				type: 'POST',
				url: '<?php echo admin_url('admin-ajax.php');?>',
		        dataType: "html", // add data type		        
		        data: { 
		        	action : 'get_ajax_projects', 
		        	security: '<?php echo $ajax_nonce; ?>', 
		        	page: nextPage++,
		        },
		        success: function( response ) {
		        	if (response) {
		        		jQuery( '#project-scroll' ).append( response ); 
		        	}
		        	else {
		        		nextPage = -1; //Don't attempt to load any more
		        	}
		        }
		    });
		}
	});

	jQuery(".previous").on('click', function(e) {
		e.preventDefault();
		if (jQuery("#project-scroll td.project:nth-of-type("+(firstProjectVisible)+")").prev().length == 1) {
			jQuery("#project-scroll td.project:nth-of-type("+(firstProjectVisible-1)+")").css('margin-left', '0');
			firstProjectVisible--; //Update first project displayed
		}
		else {
			//No previous projects to scroll to
		}
	}); 

</script>
<?php
get_footer();
