<?php if(have_rows('events')): ?>

<section>

<div class="container-lg mb-5">


    <div class="content-headings">
    <?php if(get_sub_field('title')){ ?><h4><?php the_sub_field('title'); ?></h4><?php } ?>
    <div class="<?php if(get_sub_field('columnise')){ ?>columns<?php } ?>" <?php if(!get_field('disable_content_fade_in')){ ?>data-fade<?php } ?>>
            <?php the_sub_field('description'); ?>
        </div>
    </div>

    
    <div class="cards-container">
    <div class="row">

        <?php while(have_rows('events')):the_row(); ?>

        <?php  $event= get_sub_field('event'); ?>

            
            <div class="col-12 col-sm-6 col-md-4">
                <div class="event">


                    <div class="card h-100">

                
                            <?php if(get_field('feature-photo', $event->ID)){ ?>


                                   <a href="<?php echo get_permalink($event->ID);?>">

                                    <div class="w-100 bg" style="background-image: url(<?php the_field('feature-photo', $event->ID) ?>)">

                                    <img class="card-img-top" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAMAAAACCAQAAAA3fa6RAAAADklEQVR42mNkAANGCAUAACMAA2w/AMgAAAAASUVORK5CYII=">

                                    </div>

                                    </a>


                            <?php  } ?>


                            <div class="card-body">

                                <div class="container-fluid">
                                <div class="row">

                                    <div class="col-4 p-2">
                                   
                                        <?php 
                                        $rawDate = get_field('date', $event->ID);
                                        $ukDate = str_replace('/', '-', $rawDate); // convert to uk date
                                        $day = date("d", strtotime($ukDate));
                                        $month = date("M", strtotime($ukDate));
                                        ?>

                                        <div class="circle-background">
                                            <span class="month"><?php echo $month;?></span><br>
                                            <span class="day"><?php echo $day;?></span>
                                        </div>

                                    </div>

                                    <div class="col-8 p-0 pt-1 event-body">
                                        
                                        <h5><?php echo get_the_title($event->ID)?></h5>

                                        <p class="text-primary venue m-0 p-0"><?php echo get_field('venue', $event->ID)?></p>

                                        <?php 
                                        if (get_field('start-time', $event->ID)) {
                                            $time = get_field('start-time', $event->ID);

                                            if (get_field('end-time', $event->ID)) {
                                                $time .= " - ".get_field('end-time', $event->ID);
                                            }
                                        }
                                        if($time){ ?>

                                        <p class="time m-0 p-0"><?php echo $time;?></p>

                                        <?php } ?>
                
                                    </div>

                                </div>
                                </div>

                            </div>


                    </div> 




                </div>
            </div>


        <?php endwhile; ?>

    </div>
    </div>
</div>

</section>

<?php endif; ?>