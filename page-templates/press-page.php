<?php
/** 
 * Template Name: Press Page
 */
get_header(); ?>
<?php
if ( have_posts() ) :

	while ( have_posts() ) :
		the_post();

		$sectionId = 'section_1';
		$sectionClasses= '';
		include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
		include( locate_template( 'page-templates/template-parts/section-video-with-tagline.php', false, false ) ); 
		include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 

		$sectionId = 'section_2';
		$sectionClasses= 'single-block-section';
		$customLogo = get_field($sectionId.'_header_customization_header_logo');
		include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
		?>
		<div class="section-content text-center" id="<?php echo $sectionId;?>-content">
			<?php 
			include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
			?>
		</div>
		<?php		
		include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 

		$sectionId = 'section_3';
		$sectionClasses= '';
		include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
		?>
		<div class="section-content">
			<?php
			$sectionId = 'section_3';
			?>
			<div data-equalizer="product-title-equalizer" data-equalize-on="medium" style="height:100%">
				<div class="grid-x" data-equalizer="product-description-equalizer" data-equalize-on="medium">

					<div class="cell medium-4 small-full-height">
						<div class="grid-y align-center">
							<div class="cell small-6 xlarge-7">
								<?php
								$sectionId="section_3_column_1_top";
								include( locate_template( 'page-templates/template-parts/section-img-with-background.php', false, false ) ); 
								?>
							</div>
							<div class="cell small-6 xlarge-5">
								<?php
								$sectionId="section_3_column_1_bottom";
								include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
								?>
							</div>
						</div>
					</div>


					<div class="cell medium-4 small-full-height">
						<div class="grid-y align-center">
							<div class="cell small-6 xlarge-7">
								<?php
								$sectionId="section_3_column_2_top";
								include( locate_template( 'page-templates/template-parts/section-img-with-background.php', false, false ) ); 
								?>
							</div>
							<div class="cell small-6 xlarge-5">
								<?php
								$sectionId="section_3_column_2_bottom";
								include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
								?>
							</div>
						</div>
					</div>


					<div class="cell medium-4 small-full-height">
						<div class="grid-y align-center">
							<div class="cell small-6 xlarge-7">
								<?php
								$sectionId="section_3_column_3_top";
								include( locate_template( 'page-templates/template-parts/section-img-with-background.php', false, false ) ); 
								?>
							</div>
							<div class="cell small-6 xlarge-5">
								<?php
								$sectionId="section_3_column_3_bottom";
								include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
								?>
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>
		<?php	
		include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 

		$sectionId = 'section_4';
		$sectionClasses= '';
		include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
		?>
		<div class="section-content text-center" id="<?php echo $sectionId;?>-content">
			<div class="grid-x">
				<div class="cell medium-6 small-full-height">
					<?php 
					$sectionId = 'section_4_column_1';
					$htmlContent = get_field($sectionId.'_content');
					$textColor =  get_field($sectionId.'_text_color');
					$textColor = is_array($textColor) ? $textColor[0] : $textColor; /* Default value comes back in an array */
					$textPosition =  get_field($sectionId.'_text_position');
					$textPosition = is_array($textPosition) ? $textPosition['vertical'] : 'center';
					?>
					<div class="grid-y align-<?php echo $textPosition;?> html-block <?php echo $sectionClasses;?>" id="<?php echo $sectionId;?>">
						<?php
						include( locate_template( 'page-templates/template-parts/section-background.php', false, false ) ); 
						?>
						<div class="cell" style="<?php if ($textColor) { echo 'color: '.$textColor; } ?>">
							<?php echo $htmlContent; ?>

							<div class="article-list">
								<?php
								$ajax_nonce = wp_create_nonce( "press-page-articles" );;
								$args = array(
									'post_type'              => array( 'austeve-articles' ),
									'post_status'            => array( 'publish' ),
									'posts_per_page'         => '5',
									'order'                  => 'ASC',
									'orderby'                => 'menu_order',
								);

								$articlesquery = new WP_Query( $args );

								if ( $articlesquery->have_posts() ) {
									while ( $articlesquery->have_posts() ) {
										$articlesquery->the_post();
										include( locate_template( 'page-templates/template-parts/article.php', false, false ) ); 

									}
								}

								wp_reset_postdata();
								?>
							</div>
							<a class="button load-more load-more-articles" data-page="2">Load more articles <span><i class="fas fa-spinner fa-spin"></i></span></a>

							<script type="text/javascript">
								jQuery(".load-more-articles").on('click', function(e) {
									e.preventDefault();
									var link = jQuery(this);
									link.addClass('fetching');
									var page = link.attr('data-page');
									console.log("Load page " + page);

									if (page > 0) {
										jQuery.ajax({
											type: 'POST',
											url: '<?php echo admin_url('admin-ajax.php');?>',
											dataType: "html",  
											data: { 
												action : 'austeve_get_articles', 
												security: '<?php echo $ajax_nonce; ?>', 
												page: page,
											},
											error: function (xhr, status, error) {
												console.log("Error: " + error);
												link.attr('data-page', '-1');
												link.removeClass('fetching');
											},
											success: function( response ) {
												if (response) {
													jQuery( '.article-list' ).append( response ); 
												}
												else {
													console.log("Empty response");
													link.css('display', 'none');
													page = -1;
												}
												link.attr('data-page', ++page);
												link.removeClass('fetching');
											}
										});
									}
								})
							</script>
						</div>
					</div>
				</div>
				<div class="cell medium-6 small-half-height" style="position: relative">
					<?php 
					$sectionId = 'section_4_column_2';
					include( locate_template( 'page-templates/template-parts/section-background.php', false, false ) ); 
					?>
				</div>
			</div>
		</div>
		<?php	
		include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 

	endwhile;

else :

	echo esc_html( 'Sorry, no posts' );

endif;
?>
<?php
get_footer();
