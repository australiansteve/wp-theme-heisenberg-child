<div class="grid-x">
	<div class="cell medium-6">
		<div class="grid-y">
			<div class="cell medium-6">
				<div class="grid-x">
					<div class="cell medium-6">
						<?php
						$sectionId = "section_3_block_1";
						include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
						?>
					</div>
					<div class="cell medium-6">
						<?php
						$sectionId = "section_3_block_2";
						include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
						?>
					</div>
				</div>
			</div>
			<div class="cell medium-6">
				<?php
				$sectionId = "section_3_block_3";
				include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
				?>
			</div>			
		</div>							
	</div>
	<div class="cell medium-3">
		<?php
		$sectionId = "section_3_block_4";
		include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
		?>
	</div>
	<div class="cell medium-3">
		<?php
		$sectionId = "section_3_block_5";
		include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
		?>
	</div>
</div>