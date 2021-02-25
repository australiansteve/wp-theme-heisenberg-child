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
    	//error_log(sprintf("$depth %s", $depth));
        $output .= sprintf( "\n<li><a class='menu-depth-%s' href='%s'%s>%s</a>\n",
            $depth,
            $item->url,
            ( $item->object_id === get_the_ID() ) ? ' class="current"' : '',
            $item->title
        );
    }

    function end_el( &$output, $item, $depth = 0, $args = array() )  {
        if(in_array('menu-item-has-children', $item->classes)){
            //do not end list item if it has children
            $output = $output;
        }
        else 
        {
            //end list item now if no children present
            $output .= sprintf( "\n</li>\n");
        }
    }

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        //error_log(sprintf("LVL Depth: %s - output %s", $depth, $output));
        $output .= sprintf( "\n<ul class='menu vertical nested'>\n");

    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= sprintf( "\n</ul>\n</li>\n");
    }

}

class Dropdown_Foundation_Menu extends Walker {

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
        //error_log(sprintf("EL Depth: %s", $depth));
        $output .= sprintf( "\n<li class='%s'><a class='menu-depth-%s' href='%s'%s>%s</a>\n",
            implode($item->classes, " "),
            $depth,
            $item->url,
            ( $item->object_id === get_the_ID() ) ? ' class="current"' : '',
            $item->title
        );
    }

    function end_el( &$output, $item, $depth = 0, $args = array() )  {
        if(in_array('menu-item-has-children', $item->classes)){
            //do not end list item if it has children
            $output = $output;
        }
        else 
        {
            //end list item now if no children present
            $output .= sprintf( "\n</li>\n");
        }
    }

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        //error_log(sprintf("LVL Depth: %s - output %s", $depth, $output));
        $output .= sprintf( "\n<ul class='menu'>\n");

    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= sprintf( "\n</ul>\n</li>\n");
    }

}


class EqualSpaceSubMenu extends Walker {

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
        
        #region Add current-menu-item to parent pages  
        // Getting the current post details
        global $post;
        
        // Getting the post type of the current post
        $current_post_type = get_post_type_object(get_post_type($post->ID));
        $current_post_type_slug = $current_post_type->rewrite['slug'];
        
        // Getting the URL of the menu item
        $menu_slug = strtolower(trim($item->url));
        
        // If the menu item URL contains the current post types slug add the current-menu-item class
        if (strpos($menu_slug,$current_post_type_slug) !== false) {
           $item->classes[] = 'current-menu-item';
        }
        #endregion 
        
        $output .= sprintf( "\n<li class='cell auto %s'><a href='%s' %s>%s</a></li>\n",
            implode($item->classes, " "),
            $item->url,
            ( $item->object_id === get_the_ID() ) ? ' class="current"' : '',
            $item->title
        );
    }

}

?>