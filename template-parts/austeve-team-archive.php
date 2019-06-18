<?php
?>
<div class="cell small-12 team-member">
	<div class="team-member-container">
		<div class="background-div">
		</div>
		<div class="grid-x grid-margin-x">
			<div class="cell medium-shrink">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="featured-image">
				<?php the_post_thumbnail('team_archive_size'); ?>
		</div>
	<?php endif; ?>
			</div>
			<div class="cell auto">
				<div class="team-member-content-container">
					<?php the_title( '<h2>', '</h2>' );?>
					<?php the_content();?>

					<div class="contact-info">
						<?php 
						$phone= get_field('team_member_phone_number');
						if ($phone) :
						?>
						Phone: <?php echo $phone; ?><br/>
						<?php 
						endif;
						?>
						<?php 
						$email= get_field('team_member_email_address');
						if ($email) :
						?>
						Email: <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
						<?php 
						endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>