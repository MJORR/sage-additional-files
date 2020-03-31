<div class="d-none d-md-block">
    <div id="rm-values">
        <?php if(have_rows('principles', 'option')): ?>
            <div id="rm-values-navigation" class="bg-light text-white">
                <?php while (have_rows('principles', 'option')):the_row(); ?>
                    <a href="#<?php echo sanitize_title(get_sub_field('title', 'option')); ?>" class="">
                        <div>
                            <img src="<?php the_sub_field('nav_icon', 'option'); ?>" /><br />
                            <span><?php the_sub_field('nav_title', 'option'); ?></span>
                        </div>
                    </a>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <!-- <img class="mask mask-invert" src="@asset('images/sweep-white.png')" /> -->
        <div id="rm-values-carousel" class="bg-light">
                <?php if(have_rows('principles', 'option')):
                while (have_rows('principles', 'option')):the_row(); ?>
                    <div style="padding: 50px 0 0; background-size:cover; background-image: url(<?php the_sub_field('background_image', 'option'); ?>)">
                        <div class="container-lg">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <h2><?php the_sub_field('title', 'option'); ?></h2>
                                    <p><?php the_sub_field('content', 'option'); ?></p>
                                    <p><a href="<?php the_sub_field('link', 'option'); ?>" class="btn btn-primary">Read more</a></p>
                                </div>
                                <div class="col-12 col-md-6">
                                    <img src="<?php the_sub_field('image', 'option'); ?>" class="w-80"/>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                <?php endwhile;
                endif; ?>
        </div>
    </div>
</div>

<div id="rm-values-navigation-mobile" class="d-md-none bg-light">
    <div class="row">
    <?php if(have_rows('principles', 'option')): ?>
        
            <?php while (have_rows('principles', 'option')):the_row(); ?>
                <div class="col-6">
                <a href="<?php the_sub_field('link', 'option'); ?>" class="">
                    <div>
                        <img src="<?php the_sub_field('nav_icon', 'option'); ?>" /><br />
                        <span><?php the_sub_field('nav_title', 'option'); ?></span>
                    </div>
                </a>
                </div>
            <?php endwhile; ?>
        <
    <?php endif; ?>
    </div>
</div>