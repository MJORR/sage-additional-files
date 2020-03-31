<ul class="nav nav d-flex justify-content-around" role="tablist">
    <?php
    if(have_rows('tabs')):
    while(have_rows('tabs')):the_row(); ?>

        <li class="nav-item">
            <a class="nav-link" id="<?php echo sanitize_title(get_sub_field('tab_title')); ?>-tab" data-toggle="pill" href="#<?php echo sanitize_title(get_sub_field('tab_title')); ?>" role="tab" aria-controls="<?php echo sanitize_title(get_sub_field('tab_title')); ?>" aria-selected="true"><h5><?php the_sub_field('tab_title'); ?></h5></a>
        </li>

    <?php endwhile;
    endif; ?>
</ul>
<div class="tab-content container">
    <?php
    if(have_rows('tabs')):
    while(have_rows('tabs')):the_row(); ?>
        <div class="tab-pane fade" id="<?php echo sanitize_title(get_sub_field('tab_title')); ?>" role="tabpanel" aria-labelledby="<?php echo sanitize_title(get_sub_field('tab_title')); ?>-tab">
            <div class="row">
                <div class="col-6">
                    <?php the_sub_field('content_title'); ?>
                    <?php the_sub_field('content'); ?>
                </div>
                <div class="col-6">
                    <img src="<?php the_sub_field('image'); ?>" alt="<?php echo $image['content_title']; ?>" class="w-100" />
                </div>
            </div>
        </div>
    <?php endwhile;
    endif; ?>
</div>