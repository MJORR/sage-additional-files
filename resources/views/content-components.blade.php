@while (has_sub_field("content-components"))
  
  <?php

  if(get_sub_field('section_width')){
    $component_width = get_sub_field('section_width');
  }else{
    $component_width = get_field('content_width');
  }

  if(get_sub_field('separate_section')){ ?>

    <section class="
    <?php if(get_sub_field('extra_padding_top')){ ?>section-extra-padding-top<?php } ?>
    <?php if(get_sub_field('extra_padding_bottom')){ ?>section-extra-padding-bottom<?php } ?>
    <?php echo get_row_layout(); ?>-component
    <?php if(get_sub_field('background_image_overlay')){ ?>overlay <?php } ?>
    bg-<?php the_sub_field('background_color'); ?>
    <?php if(get_sub_field('background_image') || get_sub_field('background_color') == "primary" || get_sub_field('background_color') == "secondary"){ ?> bg<?php } ?>
    <?php if(get_sub_field('no_padding')){ ?> no_padding <?php } ?>
    <?php $component_width; ?>
    " 
    <?php if(get_sub_field('background_image')){ ?>style="background-image:url(<?php the_sub_field('background_image'); ?>)"<?php } ?>>

  <div>
    <div class="<?php the_sub_field('section_width'); ?> text-<?php the_sub_field('text_alignment'); ?>">

  <?php }else{ ?>

  <div class="<?php echo get_row_layout(); ?>-component <?php $component_width; ?> text-<?php the_sub_field('text_alignment'); ?>">

  <?php } ?>

  @include('components.'.get_row_layout())
  
  <?php if(get_sub_field('separate_section')){ ?>
       </div>
      </div>
  </section>

  <?php }else{ ?>

      </div>

  <?php } ?>

@endwhile
