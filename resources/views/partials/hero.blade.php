<?php if(get_field('hero_type') != NULL || is_single()) { ?>

<div class="pl-hero-container">

        <div class="texture w-100">
        <div class="gradient w-100 h-100">
        <div class="mask w-100">

        </div>
        </div>
        </div>

        <div class="pl-hero w-100">


                <?php

                $hero_type = get_field('hero_type');

                if(is_archive()){

                    $hero_type = 'hero_simple';

                    $category = get_queried_object();

                    $hero_title = get_field('hero_title', 'category_'.$category->term_id);
                    $hero_strapline = get_field('hero_strapline', 'category_'.$category->term_id);
                    $hero_image = get_field('hero_image', 'category_'.$category->term_id);
                    $hero_overlay = get_field('hero_overlay', 'category_'.$category->term_id);
                    $hero_short = get_field('hero_short', 'category_'.$category->term_id);

                }elseif(is_singular('post')){

                    $hero_type = 'hero_post';

                    $hero_strapline = get_the_time("d M Y");

                    $hero_title = get_field('hero_title');
                    $hero_strapline = get_field('hero_strapline')."<br />".get_field('date');
                    $hero_image = get_field('hero_image');
                    $hero_overlay = get_field('hero_overlay');
                    $hero_short = get_field('hero_short');

                }elseif(is_page(array('search'))){

                    $hero_title = "Looking for '".$_GET['q']."'?";
                    $hero_strapline = '<a id="search-display" class="button button-primary">New search</a>';

                    $hero_type = get_field('hero_type');

                } else {
                    $hero_title = get_field('hero_title');
                    $hero_strapline = get_field('hero_strapline');
                    $hero_image = get_field('hero_image');
                    $hero_overlay = 1; //get_field('hero_overlay');
                    $hero_short = get_field('hero_short');
                
                }

            

                switch ($hero_type) {

                    case "hero_image": ?>
                        
                        <div class="hero hero-short <?php if (is_front_page()) { ?>hero-frontpage <?php } ?> _overlay _overlay-gradient bg bg-<?php the_field('hero_colour'); ?>">

                            <div>

                            <!-- <div data-fade="right" data-fade-random class="svg-logo fill-white" style="position:absolute; left:<?php echo rand(10, 70); ?>%; top:<?php echo rand(0, 60); ?>%; width: 10%;">@svg('logo', 'logo')</div> -->

                            <div data-fade="left" data-fade-random class="svg-wave fill-white" style="position:absolute; left:0; opacity: 0.3; top:<?php echo rand(0, 60); ?>%; width: 25%;">@svg('wave', 'wave')</div>

                                <div class="container-lg full-screen" style="width:100%">
                                
                                    <img src="<?php the_field('hero_image'); ?>" style="right: 5%; bottom: 0; position: absolute; height: 80%;" />

                                    <div class="hero-content text-body">

                                        <div class="row h-100">

                                            <div class="col-sm-12 my-auto">

                                                <h1><?php the_field('hero_title'); ?></h1>
                                                
                                                <?php if (get_field('hero_strapline')) { ?><p class="strapline"><?php the_field('hero_strapline'); ?></p><?php } ?>

                                                <?php if (get_sub_field('slide_display_buttons')): ?>

                                                    <?php $buttons = get_sub_field('slide_buttons'); ?>

                                                    <?php if ($buttons): ?>
                                                        
                                                        <?php foreach ($buttons['buttons'] as $key => $button) { ?>
                                                            <a data-goto href="<?php echo $button['link']; ?>" <?php if ($button['modal']) { ?>rel="lightbox"<?php } ?> class="btn <?php if ($button['ghost']) { ?> btn-outline-<?php echo $button['colour']; ?><?php } else { ?> btn-<?php echo $button['colour']; } ?>">
                                                                <?php echo $button['text']; ?>
                                                            </a>
                                                        <?php } ?>

                                                    <?php endif; ?>

                                                <?php endif; ?>
                                        
                                            </div>

                                        </div>

                                    </div>

                                </div>
                                
                            </div>

                        </div>


                    <?php break;

                    case "hero_content":

                        if (count(get_field('hero_content')) <= 1) {
                            while (have_rows('hero_content')):the_row(); ?>
                    
                                <div class="container-lg">
                        
                                                <div class="row">
                                                    
                                                    <div class="col col-12 col-md-6">

                                                        <div class="hero-feature-content">

                                                            <h1><?php the_sub_field('slide_title'); ?></h1>

                                                            <?php if (get_sub_field('slide_strapline')) { ?><p class="strapline"><?php the_sub_field('slide_strapline'); ?></p><?php } ?>

                                                            <?php if (get_sub_field('slide_display_buttons')): ?>

                                                                    <?php $buttons = get_sub_field('slide_buttons'); ?>

                                                                    <?php if ($buttons): ?>

                                                                        <div class="mt-4">
                                                                        
                                                                    <?php foreach ($buttons['buttons'] as $key => $button) { ?>
                                                                            <a data-goto href="<?php echo $button['link']; ?>" <?php if ($button['modal']) { ?>rel="lightbox"<?php } ?> class="btn <?php if ($button['ghost']) { ?> btn-outline-<?php echo $button['colour']; ?><?php } else { ?> btn-<?php echo $button['colour']; } ?>">
                                                                                <?php echo $button['text']; ?>
                                                                            </a>
                                                                        <?php } ?>

                                                                        </div>

                                                                    <?php endif; ?>

                                                            <?php endif; ?>

                                                        </div>

                                                    </div>

                                                    <div class="col col-12 col-md-6 mt-3">

                                                        <div class="hero-feature-image justify-content-center text-center">

                                                            <img class="img-fluid" src="<?php the_sub_field('slide_image'); ?>" />

                                                        </div>

                                                    </div>

                                                </div>
                                            
                                        </div>

                                    <!-- <?php if (is_front_page()) { ?><span class="chevron-down"><img src="@asset('images/chevron-down.svg')" class="icon-chevron-down" data-goto /></span><?php } ?> -->

                            </div>
                            
                            </div>
                        
                            <?php endwhile; ?>
                        
                        <?php
                        } else {
                            ?>
                        
                            <div class="hero-carousel">
                        
                            <?php while (have_rows('hero_content')):the_row(); ?>
                        
                                <div class="hero <?php if (is_front_page()) { ?>hero-frontpage <?php } ?> <?php if(get_sub_field('slide_image')){ ?>_overlay _overlay-gradient<?php } ?> bg _bg-primary " style="background-image: url(<?php the_sub_field('slide_image'); ?>)">

                                    <div>

                                        <!-- <div data-fade="right" data-fade-random class="svg-logo fill-white" style="position:absolute; left:<?php echo rand(10, 70); ?>%; top:<?php echo rand(0, 60); ?>%; width: 10%;">@svg('logo', 'logo')</div> -->

                                        <div data-fade="left" data-fade-random class="svg-wave fill-white" style="position:absolute; left:0; opacity: 0.3; top:<?php echo rand(0, 60); ?>%; width: 25%;">@svg('wave', 'wave')</div>

                                        <div class="container-lg" style="width:100%">
                        
                                            <div class="hero-content">

                                                <div class="row no-gutters">
                                                
                                                    <div class="col-12 col-md-6 my-auto">

                                                        <div class="hero-feature-content highlight-left">

                                                            <p class="meta text-primary">Opinion</p>

                                                            <h1><?php the_sub_field('slide_title'); ?></h1>
                                                    
                                                            <?php if (get_sub_field('slide_strapline')) { ?><p class="strapline"><?php the_sub_field('slide_strapline'); ?></p><?php } ?>
                                        
                                                            <?php if (get_sub_field('slide_display_buttons')): ?>

                                                            <?php while (have_rows('slide_buttons')) : the_row(); ?>

                                                            <?php endwhile; ?>
                                            
                                                                    <?php $buttons = get_sub_field('slide_buttons'); ?>
                                            
                                                                    <?php if ($buttons): ?>
                                                                        
                                                                        <?php foreach ($buttons['buttons'] as $key => $button) { ?>
                                                                            <a data-goto href="<?php echo $button['link']; ?>" <?php if ($button['modal']) { ?>rel="lightbox"<?php } ?> class="btn <?php if ($button['ghost']) { ?> btn-outline-<?php echo $button['colour']; ?><?php } else { ?> btn-<?php echo $button['colour']; } ?>">
                                                                            <?php echo $button['text']; ?>
                                                                            </a>
                                                                        <?php } ?>
                                            
                                                                    <?php endif; ?>
                                            
                                                            <?php endif; ?>

                                                        </div>

                                                    </div>
                                                    
                                                </div>

                                            </div> <!-- hero-content -->
                        
                                        </div>
                                        
                                    </div>

                                </div>
                                            
                            <?php endwhile; ?>
                            </div>
                        
                        <?php
                        }

                        break;


                    case "hero_post": ?>

                        <div class="hero hero-post _overlay _overlay-gradient bg _bg-primary" style="background-image: url(<?php echo $hero_image; ?>)">

                            <div data-fade="right" data-fade-random class="svg-wave fill-yellow" style="position:absolute; right:<?php echo rand(10, 60); ?>%; top:<?php echo rand(0, 60); ?>%; width: <?php echo rand(5, 15); ?>%;">@svg('wave', 'wave')</div>

                            <div data-fade="right" data-fade-random class="svg-wave fill-white" style="position:absolute; right:0; opacity: 0.3; top:<?php echo rand(10, 60); ?>%; width: 30%;">@svg('wave', 'wave')</div>

                            <div data-fade="left" data-fade-random class="svg-wave fill-primary" style="position:absolute; left:0; top:<?php echo rand(0, 60); ?>%; width: 25%;">@svg('wave', 'wave')</div>

                        <!-- <div>

                            <div class="container-lg">

                                <div class="hero-content">

                                        <div class="row no-gutters">
                                            
                                            <div class="col-12 col-md-6 my-auto">

                                                <div class="hero-feature-content highlight-left">

                                                    <h1><?php echo $hero_title; ?></h1>

                                                    <?php if ($hero_strapline) { ?><p class="strapline"><?php echo $hero_strapline; ?></p><?php } ?>

                                                </div>

                                            </div>


                                        </div>
                                        
                                    </div>

                                </div>

                                <?php if (is_front_page()) { ?><span class="chevron-down"><img src="@asset('images/chevron-down.svg')" class="icon-chevron-down" data-goto /></span><?php } ?> -->

                        </div>

                        <?php 
                        
                        break;

                        case "hero_simple":
                        default: ?>

                        <div class="hero hero-short _overlay _overlay-gradient bg _bg-primary" style="background-image: url(<?php echo $hero_image; ?>)">

                                <div>

                                    <!-- <div data-fade="right" data-fade-random class="svg-logo fill-white" style="position:absolute; left:<?php echo rand(10, 70); ?>%; top:<?php echo rand(0, 60); ?>%; width: 10%;">@svg('logo', 'logo')</div> -->

                                    <div data-fade="left" data-fade-random class="svg-wave fill-white" style="position:absolute; left:0; opacity: 0.3; top:<?php echo rand(0, 60); ?>%; width: 25%;">@svg('wave', 'wave')</div>

                                    <div class="container-lg">
                            
                                        <div class="hero-content">

                                                <div class="row no-gutters">
                                                    
                                                    <div class="col-12 col-md-6 my-auto">

                                                        <div class="hero-feature-content highlight-left">

                                                            <h1><?php echo $hero_title; ?></h1>

                                                            <?php if ($hero_strapline) { ?><p class="strapline"><?php echo $hero_strapline; ?></p><?php } ?>

                                                        </div>

                                                    </div>


                                                </div>
                                                
                                            </div>
                            
                                        </div>

                                        <!-- <?php if (is_front_page()) { ?><span class="chevron-down"><img src="@asset('images/chevron-down.svg')" class="icon-chevron-down" data-goto /></span><?php } ?> -->

                                </div>

                        <?php  break;
                }

        
                ?>

        </div>
</div>

<?php } ?>