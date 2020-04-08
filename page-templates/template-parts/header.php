
<div class="left <?php echo ($sectionNumber != 1) ? 'show-for-medium' : '';?>">
	<a href="<?php echo is_front_page() ? "#" : "/";?>" class="<?php echo is_front_page() ? "home-reset-scroll" : "";?>" title="<?php echo get_bloginfo('name');?>"><img class="header-logo" src="<?php echo $headerImage[0]; ?>" alt=""></a>
</div>
<div class="right">
	<a type="button" class="button" data-open="offCanvas"><i class="fas fa-bars fa-2x"></i></a>
</div>