<?php
/***
  * Archive page for Grant Programs
  */

get_header(); ?>

<div class="content-container">

	<div class="container">
		
		<div class="grid-x grid-padding-x">

			<div class="small-12 cell">

				<h1><?php the_field('deadlines_page_title', 'option');?></h1>
				
			</div>

		</div>

		<div class="grid-x grid-padding-x">
			<?php
			if ( have_posts() ) :

				while ( have_posts() ) :

					the_post();

					$programId = get_field('grant-program');
					$programPost = get_post($programId);

					?>
					<div class="small-12 medium-4 cell">
						<div class="container austeve-program">
							<div class="grid-x">
								<div class="cell small-12 featured-image">
									<a href="<?php the_permalink($programId);?>">
										<?php										
										if (has_post_thumbnail($programPost))
										{
											echo get_the_post_thumbnail($programId, 'program_featured_image');
										}
										?>
									</a>
								</div>
								<div class="cell small-12">
									<h3><a href="<?php the_permalink($programId);?>">
										<?php
										echo $programPost->post_title;
										?>
									</a></h3>
									<?php
									$raw = get_field('date');
									$format = "Ymd";
									$dateobj = DateTime::createFromFormat($format, $raw);									
									?>
									<p class="date"><?php echo $dateobj->format('F d, Y'); ?></p>
								</div>
							</div>
						</div>
					</div>

					<?php
				endwhile;

			endif;
			?>

		</div>

	</div>

</div>

<?php
get_footer();
