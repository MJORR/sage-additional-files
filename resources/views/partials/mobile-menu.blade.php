<div id="menu" class="menu-panel">
<div class="cd-dropdown-wrapper">
	<nav class="cd-dropdown">
        <?php
             wp_nav_menu(
                array(
                    'menu' => 'Main menu',
                    'container'=> false,
                    'menu_class' => 'cd-dropdown-content',
                    'walker' => new SBC_Mobile_Walker()
                )
            );
         ?>
    </nav> 
    
  
</div>
</div>

<?php

class SBC_Mobile_Walker extends Walker_Nav_Menu {
    
    public $parent = "";

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        
        $output .= '<ul '.$depth;

        if($depth == 0){
            $output .= ' class="cd-secondary-dropdown is-hidden fade-out"';
        }
        
        $output .= '>';
        $output .= '<li class="go-back"><a href="#0">Back</a></li>';
    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= '</ul>';
    }


  function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
  
        if($depth > 0 && $item->post_parent != $this->parent){
            $output .= '<li class="see-all"><a href="'.get_the_permalink($item->post_parent).'">'.get_the_title($item->post_parent).'</a></li>';
            $this->parent = $item->post_parent;
            
        }

        $classes = "";
        foreach($item->classes as $class){
            $classes .= " ".str_replace("menu-item-", "", $class);
        }
        $classes = ltrim($classes);

        $output .= '
            <li class="'.$classes.'">
                <a href="'.$item->url.'">'.$item->title.'</a>'; //get_the_permalink($item->object_id)

    }

   function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= '</li>';
    }
  
}

?>
