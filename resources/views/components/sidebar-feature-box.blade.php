
<div class="sidebar-feature-box panel bg <?php the_sub_field('color'); ?> <?php if(get_sub_field('image')){ ?>sidebar-feature-box-padding<?php } ?> rounded">
    <h4><?php the_sub_field('title'); ?></h4>
    <span><?php the_sub_field('text'); ?></span>
    <img src="<?php the_sub_field('image'); ?>" class="h-100" />
    <?php if(get_sub_field('link')){ ?><a href="<?php the_sub_field('link'); ?>"></a><?php } ?>
</div>