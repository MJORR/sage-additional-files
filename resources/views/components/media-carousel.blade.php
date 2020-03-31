
<div style="position:relative">

<?php
    $slides= get_sub_field('slides'); 
    if($slides): ?>

        <div class="d-none d-md-block media-slider-left-fade"></div>
        <div class="d-none d-md-block media-slider-right-fade"></div>

        <div class="media-navigation text-center mb-4">
        <?php foreach($slides as $slide): ?>
            <div class="d-inline-block px-2 icon">
            <a href="#"><img src="<?php echo $slide['nav_image']['url']?>"/></a> 
            <div class="category mt-0 text-center"><?php echo $slide['nav_text']."<br>";?></div>
            </div>
        <?php endforeach; ?>
        </div>


        <div class="media-slider" data-fade  >

            <?php foreach($slides as $slide): ?>

                <div>

                    <div class="container-lg">
                                
                        <div class="row">

                            <div class="col-12 col-md-6">
                               <div class="p-1 p-md-5">
                                <h2><?php echo $slide['title']?></h2>
                                <div><?php echo $slide['description']?></div>
                                <p><a href="<?php echo $slide['link']?>" class="btn btn-primary mt-4"><?php echo $slide['link_text']?></a></p>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="p-1 p-md-5">
                                <div class="w-100 bg" style="background-image: url(<?php echo $slide['image']['url']?>)">
                                <img class="w-100" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAMAAAACCAQAAAA3fa6RAAAADklEQVR42mNkAANGCAUAACMAA2w/AMgAAAAASUVORK5CYII=">   
                                </div>
                                </div>
                          </div>


                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>



    <?php endif; ?>

</div>

