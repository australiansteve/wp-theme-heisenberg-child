<?php
$searchId = rand(1000, 9999);
?>
<script type="text/javascript">
	
</script>
<div id="search-<?php echo $searchId;?>">
	<div class="search-reveal">
		<a href="javascript:revealSearch('search-<?php echo $searchId;?>')"><i class="fas fa-search"></i> <?php the_field('search_button_label', 'option');?></a>
	</div>
	<form id="searchForm" action="<?php echo site_url();?>" method="get" style="visibility: hidden; height: 0; opacity: 0">
		<div class="input-group">
			<input class="" type="hidden" name="lang" value="<?php echo ICL_LANGUAGE_CODE; ?>">
			<input class="input-group-field" type="text" name="s">
			<div class="input-group-button">
				<button type="submit" class="button postfix" name="search_submit" value="<?php the_field('search_button_label', 'option');?>">
					<i class="fas fa-search"></i>
				</button>
			</div>
		</div>
	</form>
</div>