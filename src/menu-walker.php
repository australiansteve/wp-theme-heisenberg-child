<?php

class OffCanvas_Foundation_Menu extends Walker {
    // Tell Walker where to inherit it's parent and id values
	var $db_fields = array(
		'parent' => 'menu_item_parent', 
		'id'     => 'db_id' 
	);
    /**
     * At the start of each element, output a <li> and <a> tag structure.
     * 
     * Note: Menu objects include url and title properties, so we will use those.
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

    	$output .= sprintf( "\n<li><a class='menu-depth-%s %s' %s %s>%s</a>\n",
    		$depth,
    		( $item->object_id === get_the_ID() ) ? 'current' : '',
    		in_array('menu-item-has-children', $item->classes) ? '' : 'href=\''.$item->url.'\'',
    		in_array('menu-item-has-children', $item->classes) ? 'data-toggle=\''.substr($item->url, 1).'\'' : '',
    		$item->title
    	);
    }

    function end_el( &$output, $item, $depth = 0, $args = array() )  {
    	
    	if(in_array('menu-item-has-children', $item->classes)){
	            //do not end list item if it has children
    		$output .= "";
    	}
    	else 
    	{
	            //end list item now if no children present
    		$output .= sprintf( "\n</li>\n");
    	}
    }

    function start_lvl( &$output, $depth = 0, $args = array() ) {
    	$output .= "<ul class='menu vertical nested'>";
    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
    	$output .= "</ul>";
    }
}

?>