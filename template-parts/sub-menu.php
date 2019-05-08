<?php global $theSubMenu;?>

<div class="small-12 cell" id="sub-menu">
				
	<ul class="vertical menu accordion-menu show-for-small-only" data-accordion-menu>
	  <li>
	    <a href="#"><?php echo the_title();?></a>
		    <?php wp_nav_menu( [
			'theme_location' => $theSubMenu,
			'container' => '',
			'menu_class' => 'menu vertical nested',
			]); 
		?>
	  </li>
	</ul>

	<?php echo strip_tags(wp_nav_menu( [
		'theme_location' 	=> $theSubMenu,
		'echo'            	=> false,
		'container_class'	=> 'border-bottom show-for-medium',
		'menu_class'		=> 'menu grid-x',
		'items_wrap'      	=> '<div id="%1$s" class="%2$s">%3$s</div>',
		'before'     		=> '<div class="cell auto">',
		'after'      		=> '</div>',
		] ), "<div><a>"); 
	?>
	
</div>