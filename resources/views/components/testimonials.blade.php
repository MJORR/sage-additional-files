<div class="container">
    <?php
    $slides= get_sub_field('slides'); 
    if($slides): ?>

    

        <div class="row testimonial-navigation text-center mb-5 justify-content-center">

        <?php foreach($slides as $slide): ?>

            <div class="d-inline mx-md-5 px-2">
            
                <a href="#" class="nav-icon">
                <img src="<?php echo $slide['photo']['url']?>"/>
                </a>
            
                <div class="name text-center px-2"><?php echo $slide['name']."<br>";?></div>
                <div class="category mt-0 text-center"><?php echo $slide['category']."<br>";?></div>
            </div>

        
           
          
        <?php endforeach; ?>

        </div>

        
        <div class="testimonial-slider" data-fade>

                <?php foreach($slides as $slide): ?>
                    

                            <div class="text-center">
                            <h5 ><?php echo $slide['testimonial']?></h5>
                            <div class="location"><?php echo $slide['location']?></div>
                            </div>

                      
                <?php endforeach; ?>

        </div>

       

    
    <?php endif; ?>
</div>