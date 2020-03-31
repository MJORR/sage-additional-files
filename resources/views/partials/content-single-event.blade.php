

<section>

<article @php post_class() @endphp>


  <div class="container-lg">
        <div class="row">
    
            <div class="col-12 mb-5">
                <a class="backlink" href="#">< Back to events</a>
            </div>

        </div>
        <div class="row">
    
            <div class="col-12 col-sm-5 pr-5">

                <h1 class="mb-0">{!! get_the_title() !!} </h1>

                <div class="row ml-1 mt-3">

                    <div class="col-3 p-0">
                                   
                                        <?php 
                                        $rawDate = get_field('date', get_the_ID());
                                        $ukDate = str_replace('/', '-', $rawDate); // convert to uk date
                                        $day = date("d", strtotime($ukDate));
                                        $month = date("M", strtotime($ukDate));
                                        ?>

                                        <div class="circle-background">
                                            <span class="month"><?php echo $month;?></span><br>
                                            <span class="day"><?php echo $day;?></span>
                                        </div>

                    </div>

                    <div class="col-9 p-0 pt-1 event-body">
                                        
                                        <p class="text-primary venue m-0 p-0"><?php echo get_field('venue', get_the_ID())?></p>

                                        <?php 
                                        if (get_field('start-time', get_the_ID())) {
                                            $time = get_field('start-time', $event->ID);

                                            if (get_field('end-time', $event->ID)) {
                                                $time .= " - ".get_field('end-time', get_the_ID());
                                            }
                                        }
                                        if($time){ ?>

                                        <p class="time m-0 p-0"><?php echo $time;?></p>

                    <?php } ?>
                
                    </div>

                </div>













                <div class="mt-3 description">@php  the_content(); @endphp</div>


            </div> 

            <div class="col-12 col-sm-7">
                
                <div class="w-100 bg" style="background-image: url(<?php the_field('feature-photo', get_the_ID()) ?>)">
                <img class="card-img-top" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAMAAAACCAQAAAA3fa6RAAAADklEQVR42mNkAANGCAUAACMAA2w/AMgAAAAASUVORK5CYII=">
                </div>

            </div> 

        </div>
  </div>

</article>

</section>