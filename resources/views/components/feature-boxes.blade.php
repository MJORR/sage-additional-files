<?php $icons = get_sub_field('icons'); ?>


<?php // set card classes
$card = $cardbody = "";
if (get_sub_field('cards') == 1){
$card = "card";
$cardBody = "card-body";
}
?>

<div class="content-headings">
  <?php if(get_sub_field('title')){ ?><h3><?php the_sub_field('title'); ?></h3><?php } ?>
  <div class="<?php if(get_sub_field('columnise')){ ?>columns<?php } ?>" <?php if(!get_field('disable_content_fade_in')){ ?>data-fade<?php } ?>>
		<?php the_sub_field('description'); ?>
	</div>
</div>

<?php if( have_rows('feature_boxes') ): ?>
  <div class="feature-box-container">
  <div class="row">


  <?php  while ( have_rows('feature_boxes') ) : the_row(); ?>

<div class="col-md-4 col-sm-6 col-12">
        <div class="<?php echo $card;?> my-4">    

            
            <?php if(!$icons && get_sub_field('image')){ ?>


                      <div class="w-100 bg" style="background-image: url(<?php the_sub_field('image'); ?>)">

                      <?php if(get_sub_field('link')){ ?><a href="<?php the_sub_field('link'); ?>"><?php } ?>
                      <img class="w-100" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAMAAAACCAQAAAA3fa6RAAAADklEQVR42mNkAANGCAUAACMAA2w/AMgAAAAASUVORK5CYII=">   
                      <?php if(get_sub_field('link')){ ?></a><?php } ?>

                      </div>

               
            <?php } ?>
            

            <div class="<?php echo $cardBody;?>">    

                <?php if($icons && get_sub_field('image')){ ?>
                <?php if(get_sub_field('link')){ ?><a href="<?php the_sub_field('link'); ?>"><?php } ?>

                  <img class="icon" src="<?php echo the_sub_field('image'); ?>" >

                  <?php if(get_sub_field('link')){ ?></a><?php } ?>
                <?php } ?>

                <?php if(get_sub_field('title')){ ?><h5 class="mt-2"><?php the_sub_field('title'); ?></h5><?php } ?>
                <?php if(get_sub_field('subtitle')){ ?><p class="text-primary"><?php the_sub_field('subtitle'); ?></p><?php } ?>
                <p class="mt-3"><?php the_sub_field('description'); ?></p>
                <?php if(get_sub_field('link')){ ?><a href="<?php the_sub_field('link'); ?>" class="btn btn-sm btn-primary">Read more</a><?php } ?>

            </div>
        </div> 
    </div> 

   

<?php endwhile; ?>

   

  </div>

  </div>

<?php endif; ?>