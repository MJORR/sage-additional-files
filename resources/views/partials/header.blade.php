<header
<?php if(get_field('hero_type') == "hero_none" || is_single()){
    ?>class="no-animate globalNav noDropdownTransition"<?php } else { ?>class="animate globalNav noDropdownTransition"<?php } ?>>


  <div class="container-lg">

   <a href="<?php echo site_url(); ?>" class="logo-container">
      <img src="@asset('images/logo.png')" class="logo">
      <img src="@asset('images/logo.png')" class="logo logo-white">
    </a>

    <nav id="main" class="nav">

    <?php  $menu_items = wp_get_nav_menu_items('Main menu');   ?>

    <ul id='menu-main-menu' class="navRoot">

      <li class="navSection primary">

            <?php

            $dropdown_array = ['dropdown-about','dropdown-community' ];

            foreach ($menu_items as $item) {

                // !! $item->post_excerpt  =  the menu title attribute. 

                if ($item->menu_item_parent ==0 && in_array($item->post_excerpt, $dropdown_array)){
                echo '<a href="'.$item->url.'" class="rootLink hasDropdown" data-dropdown="'.$item->post_excerpt.'">'.$item->title.' </a>';
                }
                elseif ($item->menu_item_parent == 0) {
                echo '<a href="'.$item->url.'"  class="rootLink" >'.$item->title.'</a>';
                }

            }
            ?>


        <a href="https://lift.nes.nhs.scot/login"  class="btn" >My Project Lift</a>


      </li>

     

    </ul>

   </nav>

   <div id="menu-toggle" class="menu-toggle">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>

  </div>

  <div class="dropdownRoot">
    <div class="dropdownBackground" style="transform: translateX(452px) scaleX(0.707692) scaleY(1.1075);"></div>
    <div class="dropdownArrow" style="transform: translateX(636px) rotate(45deg);"></div>
    <div class="dropdownContainer" style="transform: translateX(452px); width: 368px; height: 443px;">

   

    <?php 

        foreach ($menu_items as $item) {
          if ($item->menu_item_parent ==0 && in_array($item->post_excerpt, $dropdown_array)){
        ?>

                    <div class="dropdownSection" data-dropdown="<?php echo $item->post_excerpt?>">
                  
                      <div class="dropdownContent bg-white rounded p-4 small" style="min-width:300px">
                      
                      <?php $partial_name = "partials.".str_replace("dropdown", "menu", $item->post_excerpt );?>

                      @include($partial_name)

                     

                    
                        
                      </div>
                     
                    </div>

                    

      <?php
          }
        }    // end foreach
      ?>

    </div>
  </div>

</header>
