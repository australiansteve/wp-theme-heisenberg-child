<?php global $theSubMenu;?>

<div class="small-12 cell" id="sub-menu">

		<ul class="vertical menu accordion-menu show-for-small-only" data-accordion-menu>
		  <li>
		    <a href="#"><?php the_field('submenu_title', 'option');?></a>
			    <?php wp_nav_menu( [
				'theme_location' => $theSubMenu,
				'container' => '',
				'menu_class' => 'menu vertical nested',
				]); 
			?>
		  </li>
		</ul>
		<?php wp_nav_menu( [
			'theme_location' 	=> $theSubMenu,
			'walker' 			=> new EqualSpaceSubMenu() ,
			'container_class'	=> 'border-bottom show-for-medium',
			'menu_class'		=> 'menu grid-x',
			'items_wrap'      	=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
			] ); 
		?>
</div>